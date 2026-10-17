<?php

namespace App\Controllers;

use App\Models\InovasiKelurahanModel;
use App\Models\KelurahanModel;

class InovasiKelurahan extends BaseController
{
    protected $inovasiModel;
    protected $kelurahanModel;

    public function __construct()
    {
        $this->inovasiModel = new InovasiKelurahanModel();
        $this->kelurahanModel = new KelurahanModel();
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
            ->select(
                'inovasi_kelurahan.*,
                 kelurahan.nama_kelurahan,
                 kecamatan.nama_kecamatan'
            )
            ->join(
                'kelurahan',
                'kelurahan.id = inovasi_kelurahan.kelurahan_id',
                'left'
            )
            ->join(
                'kecamatan',
                'kecamatan.id = kelurahan.kecamatan_id',
                'left'
            )
            ->orderBy('inovasi_kelurahan.tahun', 'DESC')
            ->orderBy('kecamatan.nama_kecamatan', 'ASC')
            ->orderBy('kelurahan.nama_kelurahan', 'ASC')
            ->findAll();

        return view('inovasi_kelurahan/index', [
            'title' => 'Inovasi Kelurahan',
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

        $kelurahan = $this->kelurahanModel
            ->select(
                'kelurahan.id,
                 kelurahan.nama_kelurahan,
                 kecamatan.nama_kecamatan'
            )
            ->join(
                'kecamatan',
                'kecamatan.id = kelurahan.kecamatan_id',
                'left'
            )
            ->orderBy('kecamatan.nama_kecamatan', 'ASC')
            ->orderBy('kelurahan.nama_kelurahan', 'ASC')
            ->findAll();

        return view('inovasi_kelurahan/create', [
            'title'     => 'Tambah Inovasi Kelurahan',
            'kelurahan' => $kelurahan,
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
            'kelurahan_id' => [
                'label' => 'Kelurahan',
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
            'kelurahan_id'    => $this->request->getPost('kelurahan_id'),
            'nama_inovasi'    => $this->request->getPost('nama_inovasi'),
            'tahun'           => $this->request->getPost('tahun'),
            'deskripsi'       => $this->request->getPost('deskripsi'),
            'tujuan'          => $this->request->getPost('tujuan'),
            'manfaat'         => $this->request->getPost('manfaat'),
            'link_data_dukung'=> $this->request->getPost('link_data_dukung'),
        ]);

        return redirect()
            ->to('/inovasi/kelurahan')
            ->with('success', 'Data inovasi Kelurahan berhasil ditambahkan.');
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
                ->to('/inovasi/kelurahan')
                ->with('error', 'Data inovasi tidak ditemukan.');
        }

        $kelurahan = $this->kelurahanModel
            ->select(
                'kelurahan.id,
                 kelurahan.nama_kelurahan,
                 kecamatan.nama_kecamatan'
            )
            ->join(
                'kecamatan',
                'kecamatan.id = kelurahan.kecamatan_id',
                'left'
            )
            ->orderBy('kecamatan.nama_kecamatan', 'ASC')
            ->orderBy('kelurahan.nama_kelurahan', 'ASC')
            ->findAll();

        return view('inovasi_kelurahan/edit', [
            'title'     => 'Edit Inovasi Kelurahan',
            'data'      => $data,
            'kelurahan' => $kelurahan,
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
                ->to('/inovasi/kelurahan')
                ->with('error', 'Data inovasi tidak ditemukan.');
        }

        $rules = [
            'kelurahan_id' => [
                'label' => 'Kelurahan',
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
            'kelurahan_id'     => $this->request->getPost('kelurahan_id'),
            'nama_inovasi'     => $this->request->getPost('nama_inovasi'),
            'tahun'            => $this->request->getPost('tahun'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'tujuan'           => $this->request->getPost('tujuan'),
            'manfaat'          => $this->request->getPost('manfaat'),
            'link_data_dukung' => $this->request->getPost('link_data_dukung'),
        ]);

        return redirect()
            ->to('/inovasi/kelurahan')
            ->with('success', 'Data inovasi Kelurahan berhasil diperbarui.');
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
                ->to('/inovasi/kelurahan')
                ->with('error', 'Data inovasi tidak ditemukan.');
        }

        $this->inovasiModel->delete($id);

        return redirect()
            ->to('/inovasi/kelurahan')
            ->with('success', 'Data inovasi Kelurahan berhasil dihapus.');
    }
}