<?php

namespace App\Controllers;

use App\Models\InovasiKecamatanModel;
use App\Models\KecamatanModel;

class InovasiKecamatan extends BaseController
{
    protected $inovasiModel;
    protected $kecamatanModel;

    public function __construct()
    {
        $this->inovasiModel = new InovasiKecamatanModel();
        $this->kecamatanModel = new KecamatanModel();
    }

    private function checkAccess()
    {
        if (!in_array(session()->get('role'), ['user', 'admin'], true)) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        /*
         * Inovasi Kecamatan hanya untuk
         * admin, user kecamatan, dan user
         * biasa selain akun khusus lain.
         *
         * Akun TATANAN  -> khusus perangkat daerah
         * Akun kelurahan -> khusus inovasi kelurahan
         */
        if ($this->isTatananUser()) {
            return redirect()->to('/inovasi/perangkat-daerah')
                ->with('error', 'Akun TATANAN hanya dapat mengakses Inovasi Perangkat Daerah.');
        }

        if ($this->userKelurahan() !== null) {
            return redirect()->to('/dashboard')
                ->with('error', 'Akun kelurahan hanya dapat mengakses Inovasi Kelurahan.');
        }

        return null;
    }

    /**
     * DAFTAR INOVASI
     */
    public function index()
    {
        if ($redirect = $this->checkAccess()) {
            return $redirect;
        }

        $query = $this->inovasiModel
            ->select('inovasi_kecamatan.*, kecamatan.nama_kecamatan')
            ->join(
                'kecamatan',
                'kecamatan.id = inovasi_kecamatan.kecamatan_id',
                'left'
            )
            ->orderBy('inovasi_kecamatan.tahun', 'DESC')
            ->orderBy('kecamatan.nama_kecamatan', 'ASC');

        /*
         * User kecamatan hanya melihat
         * data kecamatannya sendiri.
         */
        $kecamatanUser = $this->userKecamatan();

        if ($kecamatanUser !== null) {
            $query->where(
                'inovasi_kecamatan.kecamatan_id',
                $kecamatanUser['id']
            );
        }

        $data = $query->findAll();

        return view('inovasi_kecamatan/index', [
            'title' => 'Inovasi Kecamatan',
            'data'  => $data,
        ]);
    }

    /**
     * FORM TAMBAH
     */
    public function create()
    {
        if ($redirect = $this->checkAccess()) {
            return $redirect;
        }

        $kecamatan = $this->kecamatanModel
            ->orderBy('nama_kecamatan', 'ASC')
            ->findAll();

        /*
         * User kecamatan hanya boleh memilih
         * kecamatannya sendiri.
         */
        $kecamatanUser = $this->userKecamatan();

        if ($kecamatanUser !== null) {
            $kecamatan = [$kecamatanUser];
        }

        return view('inovasi_kecamatan/create', [
            'title'     => 'Tambah Inovasi Kecamatan',
            'kecamatan' => $kecamatan,
        ]);
    }

    /**
     * SIMPAN
     */
    public function store()
    {
        if ($redirect = $this->checkAccess()) {
            return $redirect;
        }

        $rules = [
            'kecamatan_id' => [
                'label' => 'Kecamatan',
                'rules' => 'required|is_natural_no_zero',
            ],

            'nama_inovasi' => [
                'label' => 'Nama Inovasi',
                'rules' => 'required|min_length[3]|max_length[255]',
            ],

            'tahun' => [
                'label' => 'Tahun',
                'rules' => 'required|numeric|exact_length[4]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $kecamatanId = $this->request->getPost('kecamatan_id');

        /*
         * User kecamatan dipaksa menyimpan
         * data ke kecamatannya sendiri.
         */
        $kecamatanUser = $this->userKecamatan();

        if ($kecamatanUser !== null) {
            $kecamatanId = $kecamatanUser['id'];
        }

        $this->inovasiModel->insert([
            'kecamatan_id'     => $kecamatanId,
            'nama_inovasi'     => $this->request->getPost('nama_inovasi'),
            'tahun'            => $this->request->getPost('tahun'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'tujuan'           => $this->request->getPost('tujuan'),
            'manfaat'          => $this->request->getPost('manfaat'),
            'link_data_dukung' => $this->request->getPost('link_data_dukung'),
        ]);

        return redirect()
            ->to('/inovasi/kecamatan')
            ->with('success', 'Data inovasi Kecamatan berhasil ditambahkan.');
    }

    /**
     * FORM EDIT
     */
    public function edit($id)
    {
        if ($redirect = $this->checkAccess()) {
            return $redirect;
        }

        $data = $this->inovasiModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/inovasi/kecamatan')
                ->with('error', 'Data inovasi tidak ditemukan.');
        }

        /*
         * User kecamatan hanya boleh mengedit
         * data kecamatannya sendiri.
         */
        $kecamatanUser = $this->userKecamatan();

        if (
            $kecamatanUser !== null
            && (int) $data['kecamatan_id']
                !== (int) $kecamatanUser['id']
        ) {
            return redirect()
                ->to('/inovasi/kecamatan')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        $kecamatan = $this->kecamatanModel
            ->orderBy('nama_kecamatan', 'ASC')
            ->findAll();

        if ($kecamatanUser !== null) {
            $kecamatan = [$kecamatanUser];
        }

        return view('inovasi_kecamatan/edit', [
            'title'     => 'Edit Inovasi Kecamatan',
            'data'      => $data,
            'kecamatan' => $kecamatan,
        ]);
    }

    /**
     * UPDATE
     */
    public function update($id)
    {
        if ($redirect = $this->checkAccess()) {
            return $redirect;
        }

        $data = $this->inovasiModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/inovasi/kecamatan')
                ->with('error', 'Data inovasi tidak ditemukan.');
        }

        $kecamatanUser = $this->userKecamatan();

        if (
            $kecamatanUser !== null
            && (int) $data['kecamatan_id']
                !== (int) $kecamatanUser['id']
        ) {
            return redirect()
                ->to('/inovasi/kecamatan')
                ->with('error', 'Anda tidak memiliki akses untuk mengubah data ini.');
        }

        $rules = [
            'kecamatan_id' => [
                'label' => 'Kecamatan',
                'rules' => 'required|is_natural_no_zero',
            ],

            'nama_inovasi' => [
                'label' => 'Nama Inovasi',
                'rules' => 'required|min_length[3]|max_length[255]',
            ],

            'tahun' => [
                'label' => 'Tahun',
                'rules' => 'required|numeric|exact_length[4]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $kecamatanId = $this->request->getPost('kecamatan_id');

        if ($kecamatanUser !== null) {
            $kecamatanId = $kecamatanUser['id'];
        }

        $this->inovasiModel->update($id, [
            'kecamatan_id'     => $kecamatanId,
            'nama_inovasi'     => $this->request->getPost('nama_inovasi'),
            'tahun'            => $this->request->getPost('tahun'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'tujuan'           => $this->request->getPost('tujuan'),
            'manfaat'          => $this->request->getPost('manfaat'),
            'link_data_dukung' => $this->request->getPost('link_data_dukung'),
        ]);

        return redirect()
            ->to('/inovasi/kecamatan')
            ->with('success', 'Data inovasi Kecamatan berhasil diperbarui.');
    }

    /**
     * HAPUS
     */
    public function delete($id)
    {
        if ($redirect = $this->checkAccess()) {
            return $redirect;
        }

        $data = $this->inovasiModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/inovasi/kecamatan')
                ->with('error', 'Data inovasi tidak ditemukan.');
        }

        $kecamatanUser = $this->userKecamatan();

        if (
            $kecamatanUser !== null
            && (int) $data['kecamatan_id']
                !== (int) $kecamatanUser['id']
        ) {
            return redirect()
                ->to('/inovasi/kecamatan')
                ->with('error', 'Anda tidak memiliki akses untuk menghapus data ini.');
        }

        $this->inovasiModel->delete($id);

        return redirect()
            ->to('/inovasi/kecamatan')
            ->with('success', 'Data inovasi Kecamatan berhasil dihapus.');
    }
}