<?php

namespace App\Controllers;

use App\Models\ForumBandungSehatRealisasiModel;

class ForumBandungSehatRealisasi extends BaseController
{
    protected $realisasiModel;

    public function __construct()
    {
        $this->realisasiModel = new ForumBandungSehatRealisasiModel();
    }

    private function isAdmin(): bool
    {
        return in_array(session()->get('role'), [
            'admin',
            'user',
        ], true);
    }

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $data = $this->realisasiModel
            ->orderBy('tahun', 'DESC')
            ->orderBy('waktu_kegiatan', 'DESC')
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('forum_bandung_sehat_realisasi/index', [
            'title' => 'Realisasi Kegiatan Forum Bandung Sehat',
            'data'  => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('forum_bandung_sehat_realisasi/create', [
            'title' => 'Tambah Realisasi Kegiatan Forum Bandung Sehat',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store()
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $rules = [
            'tahun' => [
                'label' => 'Tahun',
                'rules' => 'required|regex_match[/^\d{4}$/]',
            ],

            'nama_kegiatan' => [
                'label' => 'Nama Kegiatan',
                'rules' => 'required|max_length[255]',
            ],

            'waktu_kegiatan' => [
                'label' => 'Waktu Kegiatan',
                'rules' => 'permit_empty|valid_date[Y-m-d]',
            ],

            'anggaran' => [
                'label' => 'Anggaran',
                'rules' => 'permit_empty|decimal',
            ],

            'sumber_pendanaan' => [
                'label' => 'Sumber Pendanaan',
                'rules' => 'permit_empty|in_list[APBD Kota,DAK,Swadaya]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $anggaran = $this->request->getPost('anggaran');

        if ($anggaran !== null && $anggaran !== '') {
            $anggaran = str_replace('.', '', $anggaran);
        } else {
            $anggaran = 0;
        }

        $this->realisasiModel->insert([
            'tahun'             => $this->request->getPost('tahun'),
            'nama_kegiatan'     => $this->request->getPost('nama_kegiatan'),
            'waktu_kegiatan'    => $this->request->getPost('waktu_kegiatan') ?: null,
            'peserta'           => $this->request->getPost('peserta'),
            'hasil_pelaksanaan' => $this->request->getPost('hasil_pelaksanaan'),
            'anggaran'          => $anggaran,
            'sumber_pendanaan'  => $this->request->getPost('sumber_pendanaan'),
            'link_drive'        => $this->request->getPost('link_drive'),
            'data_dukung'       => $this->request->getPost('data_dukung'),
        ]);

        return redirect()->to('/forum-bandung-sehat/realisasi')
            ->with('success', 'Data realisasi kegiatan berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $data = $this->realisasiModel->find($id);

        if (!$data) {
            return redirect()->to('/forum-bandung-sehat/realisasi')
                ->with('error', 'Data realisasi tidak ditemukan.');
        }

        return view('forum_bandung_sehat_realisasi/edit', [
            'title' => 'Edit Realisasi Kegiatan Forum Bandung Sehat',
            'data'  => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update($id)
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $dataLama = $this->realisasiModel->find($id);

        if (!$dataLama) {
            return redirect()->to('/forum-bandung-sehat/realisasi')
                ->with('error', 'Data realisasi tidak ditemukan.');
        }

        $rules = [
            'tahun' => [
                'label' => 'Tahun',
                'rules' => 'required|regex_match[/^\d{4}$/]',
            ],

            'nama_kegiatan' => [
                'label' => 'Nama Kegiatan',
                'rules' => 'required|max_length[255]',
            ],

            'waktu_kegiatan' => [
                'label' => 'Waktu Kegiatan',
                'rules' => 'permit_empty|valid_date[Y-m-d]',
            ],

            'anggaran' => [
                'label' => 'Anggaran',
                'rules' => 'permit_empty|decimal',
            ],

            'sumber_pendanaan' => [
                'label' => 'Sumber Pendanaan',
                'rules' => 'permit_empty|in_list[APBD Kota,DAK,Swadaya]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $anggaran = $this->request->getPost('anggaran');

        if ($anggaran !== null && $anggaran !== '') {
            $anggaran = str_replace('.', '', $anggaran);
        } else {
            $anggaran = 0;
        }

        $this->realisasiModel->update($id, [
            'tahun'             => $this->request->getPost('tahun'),
            'nama_kegiatan'     => $this->request->getPost('nama_kegiatan'),
            'waktu_kegiatan'    => $this->request->getPost('waktu_kegiatan') ?: null,
            'peserta'           => $this->request->getPost('peserta'),
            'hasil_pelaksanaan' => $this->request->getPost('hasil_pelaksanaan'),
            'anggaran'          => $anggaran,
            'sumber_pendanaan'  => $this->request->getPost('sumber_pendanaan'),
            'link_drive'        => $this->request->getPost('link_drive'),
            'data_dukung'       => $this->request->getPost('data_dukung'),
        ]);

        return redirect()->to('/forum-bandung-sehat/realisasi')
            ->with('success', 'Data realisasi kegiatan berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $data = $this->realisasiModel->find($id);

        if (!$data) {
            return redirect()->to('/forum-bandung-sehat/realisasi')
                ->with('error', 'Data realisasi tidak ditemukan.');
        }

        $this->realisasiModel->delete($id);

        return redirect()->to('/forum-bandung-sehat/realisasi')
            ->with('success', 'Data realisasi kegiatan berhasil dihapus.');
    }
}