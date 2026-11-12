<?php

namespace App\Controllers;

use App\Models\TimPembinaRealisasiModel;

class TimPembinaRealisasi extends BaseController
{
    protected $realisasiModel;

    public function __construct()
    {
        $this->realisasiModel =
            new TimPembinaRealisasiModel();
    }

    /**
     * Cek role.
     */
    private function allowedRoles(): bool
    {
        return in_array(
            session()->get('role'),
            ['user', 'admin'],
            true
        );
    }

    /**
     * Validasi periode.
     */
    private function validPeriode($periode): bool
    {
        return in_array(
            $periode,
            ['ganjil', 'genap'],
            true
        );
    }

    /**
     * Nama tampilan periode.
     */
    private function namaPeriode(string $periode): string
    {
        return $periode === 'ganjil'
            ? 'Tahun Ganjil'
            : 'Tahun Genap';
    }

    /*
    |--------------------------------------------------------------------------
    | INDEX - HALAMAN PILIH PERIODE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        return view(
            'tim_pembina_realisasi/index',
            [
                'title' =>
                    'Realisasi Kegiatan Tim Pembina',
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
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        if (!$this->validPeriode($periode)) {
            return redirect()
                ->to('/tim-pembina/realisasi')
                ->with(
                    'error',
                    'Periode tidak valid.'
                );
        }

        $namaPeriode =
            $this->namaPeriode($periode);

        $data = $this->filterByUser(
            $this->realisasiModel
        )
            ->where('periode', $periode)
            ->orderBy('waktu_kegiatan', 'DESC')
            ->orderBy('id', 'DESC')
            ->findAll();

        return view(
            'tim_pembina_realisasi/periode',
            [
                'title' =>
                    'Realisasi Kegiatan Tim Pembina - '
                    . $namaPeriode,

                'periode' => $periode,

                'namaPeriode' => $namaPeriode,

                'data' => $data,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE - FORM TAMBAH
    |--------------------------------------------------------------------------
    */

    public function create($periode)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        if (!$this->validPeriode($periode)) {
            return redirect()
                ->to('/tim-pembina/realisasi')
                ->with(
                    'error',
                    'Periode tidak valid.'
                );
        }

        $namaPeriode =
            $this->namaPeriode($periode);

        return view(
            'tim_pembina_realisasi/create',
            [
                'title' =>
                    'Tambah Realisasi Kegiatan - '
                    . $namaPeriode,

                'periode' => $periode,

                'namaPeriode' => $namaPeriode,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE - SIMPAN
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $periode =
            $this->request->getPost('periode');

        if (!$this->validPeriode($periode)) {
            return redirect()
                ->to('/tim-pembina/realisasi')
                ->with(
                    'error',
                    'Periode tidak valid.'
                );
        }

        $rules = [
            'tahun' => [
                'label' => 'Tahun',

                'rules' =>
                    'required|max_length[20]',

                'errors' => [
                    'required' =>
                        'Tahun wajib diisi.',

                    'max_length' =>
                        'Tahun maksimal 20 karakter.',
                ],
            ],

            'nama_kegiatan' => [
                'label' => 'Nama Kegiatan',

                'rules' => 'required',

                'errors' => [
                    'required' =>
                        'Nama kegiatan wajib diisi.',
                ],
            ],

            'waktu_kegiatan' => [
                'label' => 'Waktu Kegiatan',

                'rules' => 'required',

                'errors' => [
                    'required' =>
                        'Waktu kegiatan wajib diisi.',
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

        $anggaran = trim(
            (string) $this->request->getPost(
                'anggaran'
            )
        );

        /*
        |--------------------------------------------------------------------------
        | FORMAT ANGGARAN
        |--------------------------------------------------------------------------
        |
        | 5.000.000
        | menjadi
        | 5000000
        |
        */

        $anggaran = str_replace(
            '.',
            '',
            $anggaran
        );

        /*
        |--------------------------------------------------------------------------
        | INSERT
        |--------------------------------------------------------------------------
        */

        $this->realisasiModel->insert([
            'user_id' => $this->currentUserId(),

            /*
             * Tidak menggunakan Kecamatan.
             */
            'kecamatan_id' => null,

            'tahun' =>
                trim(
                    (string) $this->request
                        ->getPost('tahun')
                ),

            'periode' => $periode,

            'nama_kegiatan' =>
                trim(
                    (string) $this->request
                        ->getPost('nama_kegiatan')
                ),

            'waktu_kegiatan' =>
                $this->request->getPost(
                    'waktu_kegiatan'
                ),

            'peserta' =>
                trim(
                    (string) $this->request
                        ->getPost('peserta')
                ),

            'hasil_pelaksanaan' =>
                trim(
                    (string) $this->request
                        ->getPost(
                            'hasil_pelaksanaan'
                        )
                ),

            'anggaran' =>
                $anggaran !== '' ? $anggaran : 0,

            'sumber_pendanaan' =>
                trim(
                    (string) $this->request
                        ->getPost(
                            'sumber_pendanaan'
                        )
                ),

            'link_drive' =>
                trim(
                    (string) $this->request
                        ->getPost('link_drive')
                ),

            'data_dukung' =>
                trim(
                    (string) $this->request
                        ->getPost('data_dukung')
                ),
        ]);

        return redirect()
            ->to(
                '/tim-pembina/realisasi/'
                . $periode
            )
            ->with(
                'success',
                'Realisasi kegiatan berhasil ditambahkan.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT - FORM UBAH
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $data = $this->realisasiModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/tim-pembina/realisasi')
                ->with(
                    'error',
                    'Data realisasi kegiatan tidak ditemukan.'
                );
        }

        $periode =
            $data['periode'] ?? 'ganjil';

        if (!$this->validPeriode($periode)) {
            $periode = 'ganjil';
        }

        $namaPeriode =
            $this->namaPeriode($periode);

        return view(
            'tim_pembina_realisasi/edit',
            [
                'title' =>
                    'Edit Realisasi Kegiatan - '
                    . $namaPeriode,

                'data' => $data,

                'periode' => $periode,

                'namaPeriode' => $namaPeriode,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE - SIMPAN UBAH
    |--------------------------------------------------------------------------
    */

    public function update($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $data = $this->realisasiModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/tim-pembina/realisasi')
                ->with(
                    'error',
                    'Data realisasi kegiatan tidak ditemukan.'
                );
        }

        $periode =
            $this->request->getPost('periode');

        if (!$this->validPeriode($periode)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Periode tidak valid.'
                );
        }

        $rules = [
            'tahun' => [
                'label' => 'Tahun',

                'rules' =>
                    'required|max_length[20]',

                'errors' => [
                    'required' =>
                        'Tahun wajib diisi.',

                    'max_length' =>
                        'Tahun maksimal 20 karakter.',
                ],
            ],

            'nama_kegiatan' => [
                'label' => 'Nama Kegiatan',

                'rules' => 'required',

                'errors' => [
                    'required' =>
                        'Nama kegiatan wajib diisi.',
                ],
            ],

            'waktu_kegiatan' => [
                'label' => 'Waktu Kegiatan',

                'rules' => 'required',

                'errors' => [
                    'required' =>
                        'Waktu kegiatan wajib diisi.',
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

        $anggaran = trim(
            (string) $this->request->getPost(
                'anggaran'
            )
        );

        /*
        |--------------------------------------------------------------------------
        | FORMAT ANGGARAN
        |--------------------------------------------------------------------------
        */

        $anggaran = str_replace(
            '.',
            '',
            $anggaran
        );

        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $this->realisasiModel->update(
            $id,
            [
                'kecamatan_id' => null,

                'tahun' =>
                    trim(
                        (string) $this->request
                            ->getPost('tahun')
                    ),

                'periode' => $periode,

                'nama_kegiatan' =>
                    trim(
                        (string) $this->request
                            ->getPost(
                                'nama_kegiatan'
                            )
                    ),

                'waktu_kegiatan' =>
                    $this->request->getPost(
                        'waktu_kegiatan'
                    ),

                'peserta' =>
                    trim(
                        (string) $this->request
                            ->getPost('peserta')
                    ),

                'hasil_pelaksanaan' =>
                    trim(
                        (string) $this->request
                            ->getPost(
                                'hasil_pelaksanaan'
                            )
                    ),

                'anggaran' =>
                    $anggaran !== ''
                        ? $anggaran
                        : 0,

                'sumber_pendanaan' =>
                    trim(
                        (string) $this->request
                            ->getPost(
                                'sumber_pendanaan'
                            )
                    ),

                'link_drive' =>
                    trim(
                        (string) $this->request
                            ->getPost('link_drive')
                    ),

                'data_dukung' =>
                    trim(
                        (string) $this->request
                            ->getPost(
                                'data_dukung'
                            )
                    ),
            ]
        );

        return redirect()
            ->to(
                '/tim-pembina/realisasi/'
                . $periode
            )
            ->with(
                'success',
                'Realisasi kegiatan berhasil diperbarui.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE - HAPUS
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $data = $this->realisasiModel->find($id);

        if (!$data) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data tidak ditemukan.'
                );
        }

        $periode =
            $data['periode'] ?? 'ganjil';

        if (!$this->validPeriode($periode)) {
            $periode = 'ganjil';
        }

        $this->realisasiModel->delete($id);

        return redirect()
            ->to(
                '/tim-pembina/realisasi/'
                . $periode
            )
            ->with(
                'success',
                'Realisasi kegiatan berhasil dihapus.'
            );
    }
}
