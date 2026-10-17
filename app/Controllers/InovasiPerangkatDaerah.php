<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InovasiPerangkatDaerahModel;

class InovasiPerangkatDaerah extends BaseController
{
    protected $inovasiModel;

    public function __construct()
    {
        $this->inovasiModel = new InovasiPerangkatDaerahModel();
    }

    /**
     * =========================================================
     * DAFTAR INOVASI PERANGKAT DAERAH
     * =========================================================
     */
    public function index()
    {
        $data = [
            'title'   => 'Inovasi Perangkat Daerah',
            'inovasi' => $this->inovasiModel
                ->orderBy('nama_perangkat_daerah', 'ASC')
                ->orderBy('nama_inovasi', 'ASC')
                ->findAll(),
        ];

        return view('inovasi_perangkat_daerah/index', $data);
    }

    /**
     * =========================================================
     * FORM TAMBAH
     * =========================================================
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Inovasi Perangkat Daerah',
        ];

        return view('inovasi_perangkat_daerah/create', $data);
    }

    /**
     * =========================================================
     * SIMPAN DATA
     * =========================================================
     */
    public function store()
    {
        $rules = [
            'nama_perangkat_daerah' => 'required',
            'nama_inovasi'          => 'required',
            'penjelasan'            => 'required',
            'waktu_awal_penerapan'  => 'permit_empty|valid_date[Y-m-d]',
            'waktu_terakhir_pengembangan' => 'permit_empty|valid_date[Y-m-d]',
            'link_data_dukung'      => 'permit_empty|valid_url',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->inovasiModel->insert([
            'nama_perangkat_daerah'       => $this->request->getPost('nama_perangkat_daerah'),
            'nama_inovasi'                => $this->request->getPost('nama_inovasi'),
            'penjelasan'                  => $this->request->getPost('penjelasan'),
            'waktu_awal_penerapan'        => $this->request->getPost('waktu_awal_penerapan') ?: null,
            'waktu_terakhir_pengembangan' => $this->request->getPost('waktu_terakhir_pengembangan') ?: null,
            'dampak_inovasi'              => $this->request->getPost('dampak_inovasi'),
            'link_data_dukung'            => $this->request->getPost('link_data_dukung'),
        ]);

        return redirect()
            ->to('/inovasi/perangkat-daerah')
            ->with('success', 'Data inovasi Perangkat Daerah berhasil ditambahkan.');
    }

    /**
     * =========================================================
     * FORM EDIT
     * =========================================================
     */
    public function edit($id)
    {
        $dataInovasi = $this->inovasiModel->find($id);

        if (!$dataInovasi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data inovasi tidak ditemukan.'
            );
        }

        $data = [
            'title'   => 'Edit Inovasi Perangkat Daerah',
            'inovasi' => $dataInovasi,
        ];

        return view('inovasi_perangkat_daerah/edit', $data);
    }

    /**
     * =========================================================
     * UPDATE DATA
     * =========================================================
     */
    public function update($id)
    {
        $dataInovasi = $this->inovasiModel->find($id);

        if (!$dataInovasi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data inovasi tidak ditemukan.'
            );
        }

        $rules = [
            'nama_perangkat_daerah' => 'required',
            'nama_inovasi'          => 'required',
            'penjelasan'            => 'required',
            'waktu_awal_penerapan'  => 'permit_empty|valid_date[Y-m-d]',
            'waktu_terakhir_pengembangan' => 'permit_empty|valid_date[Y-m-d]',
            'link_data_dukung'      => 'permit_empty|valid_url',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->inovasiModel->update($id, [
            'nama_perangkat_daerah'       => $this->request->getPost('nama_perangkat_daerah'),
            'nama_inovasi'                => $this->request->getPost('nama_inovasi'),
            'penjelasan'                  => $this->request->getPost('penjelasan'),
            'waktu_awal_penerapan'        => $this->request->getPost('waktu_awal_penerapan') ?: null,
            'waktu_terakhir_pengembangan' => $this->request->getPost('waktu_terakhir_pengembangan') ?: null,
            'dampak_inovasi'              => $this->request->getPost('dampak_inovasi'),
            'link_data_dukung'            => $this->request->getPost('link_data_dukung'),
        ]);

        return redirect()
            ->to('/inovasi/perangkat-daerah')
            ->with('success', 'Data inovasi Perangkat Daerah berhasil diperbarui.');
    }

    /**
     * =========================================================
     * HAPUS DATA
     * =========================================================
     */
    public function delete($id)
    {
        $dataInovasi = $this->inovasiModel->find($id);

        if (!$dataInovasi) {
            return redirect()
                ->to('/inovasi/perangkat-daerah')
                ->with('error', 'Data inovasi tidak ditemukan.');
        }

        $this->inovasiModel->delete($id);

        return redirect()
            ->to('/inovasi/perangkat-daerah')
            ->with('success', 'Data inovasi Perangkat Daerah berhasil dihapus.');
    }
}