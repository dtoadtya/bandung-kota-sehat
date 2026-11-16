<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
        return in_array(
            session()->get('role'),
            ['admin', 'admin_fbs'],
            true
        );
    }

    /*
    |--------------------------------------------------------------------------
    | INDEX - HALAMAN PILIH PERIODE
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        return view(
            'forum_bandung_sehat_realisasi/index',
            [
                'title' => 'Realisasi Kegiatan Forum Bandung Sehat',
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PERIODE - DAFTAR DATA
    |--------------------------------------------------------------------------
    */
    public function periode($periode)
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        if (!in_array($periode, ['ganjil', 'genap'], true)) {
            return redirect()
                ->to('/forum-bandung-sehat/realisasi')
                ->with('error', 'Periode tidak valid.');
        }

        $tahun = $periode === 'ganjil' ? 'Ganjil' : 'Genap';

        $data = $this->filterByUser($this->realisasiModel)
            ->where('tahun', $tahun)
            ->orderBy('waktu_kegiatan', 'DESC')
            ->orderBy('id', 'DESC')
            ->findAll();

        return view(
            'forum_bandung_sehat_realisasi/periode',
            [
                'title' => 'Realisasi Kegiatan Forum Bandung Sehat - '
                    . 'Tahun ' . $tahun,

                'periode' => $periode,
                'tahun'   => $tahun,
                'data'    => $data,
            ]
        );
    }

    /**
     * URL periode dari nilai tahun.
     */
    private function periodeDariTahun($tahun): string
    {
        $nilai = strtolower(trim((string) $tahun));

        if (!in_array($nilai, ['ganjil', 'genap'], true)) {
            return '';
        }

        return '/' . $nilai;
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $tahun = $this->request->getGet('tahun');

        if (!in_array($tahun, ['Ganjil', 'Genap'], true)) {
            return redirect()
                ->to('/forum-bandung-sehat/realisasi')
                ->with(
                    'error',
                    'Pilih terlebih dahulu Tahun Ganjil atau Tahun Genap.'
                );
        }

        return view(
            'forum_bandung_sehat_realisasi/create',
            [
                'title' => 'Tambah Realisasi Kegiatan',
                'tahun' => $tahun,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store()
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $rules = [
            'tahun' => [
                'rules' => 'required|in_list[Ganjil,Genap]',
                'errors' => [
                    'required' =>
                        'Tahun wajib dipilih.',
                    'in_list' =>
                        'Tahun hanya dapat dipilih Tahun Ganjil atau Tahun Genap.',
                ],
            ],

            'nama_kegiatan' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' =>
                        'Nama kegiatan wajib diisi.',
                    'max_length' =>
                        'Nama kegiatan terlalu panjang.',
                ],
            ],

            'waktu_kegiatan' => [
                'rules' => 'permit_empty|valid_date[Y-m-d]',
                'errors' => [
                    'valid_date' =>
                        'Format waktu kegiatan tidak valid.',
                ],
            ],

            'peserta' => [
                'rules' => 'permit_empty',
            ],

            'sumber_pendanaan' => [
                'rules' =>
                    'permit_empty|in_list[APBD Kota,DAK,Swadaya]',
                'errors' => [
                    'in_list' =>
                        'Sumber pendanaan tidak valid.',
                ],
            ],

            'link_drive' => [
                'rules' => 'permit_empty|valid_url',
                'errors' => [
                    'valid_url' =>
                        'Link Drive/Cloud tidak valid.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    $this->validator->getErrors()
                );
        }

        $anggaran = $this->request->getPost('anggaran');

        if ($anggaran !== null && $anggaran !== '') {

            $anggaran = preg_replace(
                '/\D/',
                '',
                $anggaran
            );

            if ($anggaran === '') {
                $anggaran = 0;
            }

        } else {
            $anggaran = 0;
        }

        $data = [
            'user_id'           => $this->currentUserId(),

            'tahun'             => trim(
                (string) $this->request->getPost('tahun')
            ),

            'nama_kegiatan'     => trim(
                (string) $this->request->getPost('nama_kegiatan')
            ),

            'waktu_kegiatan'    =>
                $this->request->getPost('waktu_kegiatan') ?: null,

            'peserta'           =>
                $this->request->getPost('peserta'),

            'hasil_pelaksanaan' =>
                $this->request->getPost('hasil_pelaksanaan'),

            'anggaran'          =>
                $anggaran,

            'sumber_pendanaan'  =>
                $this->request->getPost('sumber_pendanaan'),

            'link_drive'        =>
                $this->request->getPost('link_drive'),

            'data_dukung'       =>
                $this->request->getPost('data_dukung'),
        ];

        $this->realisasiModel->insert($data);

        return redirect()
            ->to(
                '/forum-bandung-sehat/realisasi'
                . $this->periodeDariTahun($data['tahun'])
            )
            ->with(
                'success',
                'Realisasi kegiatan berhasil ditambahkan.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $data = $this->realisasiModel->find((int) $id);

        if (!$data) {
            return redirect()
                ->to('/forum-bandung-sehat/realisasi')
                ->with(
                    'error',
                    'Data realisasi kegiatan tidak ditemukan.'
                );
        }

        return view(
            'forum_bandung_sehat_realisasi/edit',
            [
                'title' => 'Edit Realisasi Kegiatan',
                'data'  => $data,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update($id)
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $dataLama = $this->realisasiModel->find((int) $id);

        if (!$dataLama) {
            return redirect()
                ->to('/forum-bandung-sehat/realisasi')
                ->with(
                    'error',
                    'Data realisasi kegiatan tidak ditemukan.'
                );
        }

        $rules = [
            'tahun' => [
                'rules' => 'required|in_list[Ganjil,Genap]',
                'errors' => [
                    'required' =>
                        'Tahun wajib dipilih.',
                    'in_list' =>
                        'Tahun hanya dapat dipilih Tahun Ganjil atau Tahun Genap.',
                ],
            ],

            'nama_kegiatan' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' =>
                        'Nama kegiatan wajib diisi.',
                    'max_length' =>
                        'Nama kegiatan terlalu panjang.',
                ],
            ],

            'waktu_kegiatan' => [
                'rules' => 'permit_empty|valid_date[Y-m-d]',
                'errors' => [
                    'valid_date' =>
                        'Format waktu kegiatan tidak valid.',
                ],
            ],

            'peserta' => [
                'rules' => 'permit_empty',
            ],

            'sumber_pendanaan' => [
                'rules' =>
                    'permit_empty|in_list[APBD Kota,DAK,Swadaya]',
                'errors' => [
                    'in_list' =>
                        'Sumber pendanaan tidak valid.',
                ],
            ],

            'link_drive' => [
                'rules' => 'permit_empty|valid_url',
                'errors' => [
                    'valid_url' =>
                        'Link Drive/Cloud tidak valid.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    $this->validator->getErrors()
                );
        }

        $anggaran = $this->request->getPost('anggaran');

        if ($anggaran !== null && $anggaran !== '') {

            $anggaran = preg_replace(
                '/\D/',
                '',
                $anggaran
            );

            if ($anggaran === '') {
                $anggaran = 0;
            }

        } else {
            $anggaran = 0;
        }

        $data = [
            'tahun'             => trim(
                (string) $this->request->getPost('tahun')
            ),

            'nama_kegiatan'     => trim(
                (string) $this->request->getPost('nama_kegiatan')
            ),

            'waktu_kegiatan'    =>
                $this->request->getPost('waktu_kegiatan') ?: null,

            'peserta'           =>
                $this->request->getPost('peserta'),

            'hasil_pelaksanaan' =>
                $this->request->getPost('hasil_pelaksanaan'),

            'anggaran'          =>
                $anggaran,

            'sumber_pendanaan'  =>
                $this->request->getPost('sumber_pendanaan'),

            'link_drive'        =>
                $this->request->getPost('link_drive'),

            'data_dukung'       =>
                $this->request->getPost('data_dukung'),
        ];

        $this->realisasiModel->update(
            (int) $id,
            $data
        );

        return redirect()
            ->to(
                '/forum-bandung-sehat/realisasi'
                . $this->periodeDariTahun($data['tahun'])
            )
            ->with(
                'success',
                'Realisasi kegiatan berhasil diperbarui.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $data = $this->realisasiModel->find((int) $id);

        if (!$data) {
            return redirect()
                ->to('/forum-bandung-sehat/realisasi')
                ->with(
                    'error',
                    'Data tidak ditemukan.'
                );
        }

        $tahun = $data['tahun'] ?? '';

        $this->realisasiModel->delete((int) $id);

        return redirect()
            ->to(
                '/forum-bandung-sehat/realisasi'
                . $this->periodeDariTahun($tahun)
            )
            ->with(
                'success',
                'Realisasi kegiatan berhasil dihapus.'
            );
    }
}