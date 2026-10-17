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

        $data = $this->inovasiModel
            ->select('inovasi_kecamatan.*, kecamatan.nama_kecamatan')
            ->join(
                'kecamatan',
                'kecamatan.id = inovasi_kecamatan.kecamatan_id',
                'left'
            )
            ->orderBy('inovasi_kecamatan.tahun', 'DESC')
            ->orderBy('kecamatan.nama_kecamatan', 'ASC')
            ->findAll();

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

        $this->inovasiModel->insert([
            'kecamatan_id'     => $this->request->getPost('kecamatan_id'),
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

        $kecamatan = $this->kecamatanModel
            ->orderBy('nama_kecamatan', 'ASC')
            ->findAll();

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

        $this->inovasiModel->update($id, [
            'kecamatan_id'     => $this->request->getPost('kecamatan_id'),
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

        $this->inovasiModel->delete($id);

        return redirect()
            ->to('/inovasi/kecamatan')
            ->with('success', 'Data inovasi Kecamatan berhasil dihapus.');
    }
}