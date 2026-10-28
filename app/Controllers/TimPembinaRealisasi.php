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

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $tahun = $this->request->getGet('tahun');

        $builder = $this->filterByUser($this->realisasiModel)
            ->orderBy('waktu_kegiatan', 'DESC')
            ->orderBy('id', 'DESC');

        if ($tahun !== null && $tahun !== '') {
            $builder->where('tahun', $tahun);
        }

        $data = $builder->findAll();

        return view(
            'tim_pembina_realisasi/index',
            [
                'title' => 'Realisasi Kegiatan Tim Pembina',
                'data'  => $data,
                'tahun' => $tahun,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $tahun = $this->request->getGet('tahun');

        if (!in_array($tahun, ['1', '2'], true)) {
            $tahun = '';
        }

        return view(
            'tim_pembina_realisasi/create',
            [
                'title' => 'Tambah Realisasi Kegiatan Tim Pembina',
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
        $tahun = trim(
            (string) $this->request->getPost('tahun')
        );

        $namaKegiatan = trim(
            (string) $this->request->getPost(
                'nama_kegiatan'
            )
        );

        $waktuKegiatan = $this->request->getPost(
            'waktu_kegiatan'
        );

        $peserta = trim(
            (string) $this->request->getPost('peserta')
        );

        $hasilPelaksanaan = trim(
            (string) $this->request->getPost(
                'hasil_pelaksanaan'
            )
        );

        $anggaran = trim(
            (string) $this->request->getPost('anggaran')
        );

        $sumberPendanaan = trim(
            (string) $this->request->getPost(
                'sumber_pendanaan'
            )
        );

        $linkDrive = trim(
            (string) $this->request->getPost(
                'link_drive'
            )
        );

        $dataDukung = trim(
            (string) $this->request->getPost(
                'data_dukung'
            )
        );

        /*
        |--------------------------------------------------------------------------
        | VALIDASI TAHUN
        |--------------------------------------------------------------------------
        */

        if (!in_array($tahun, ['1', '2'], true)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Silakan pilih Tahun 1 atau Tahun 2.'
                );
        }

        if ($namaKegiatan === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Nama kegiatan wajib diisi.'
                );
        }

        if ($waktuKegiatan === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Waktu kegiatan wajib diisi.'
                );
        }

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
            'user_id'              => $this->currentUserId(),

            /*
             * Tidak menggunakan Kecamatan.
             */
            'kecamatan_id'      => null,

            'tahun'             => $tahun,
            'nama_kegiatan'     => $namaKegiatan,
            'waktu_kegiatan'    => $waktuKegiatan,
            'peserta'           => $peserta,
            'hasil_pelaksanaan' => $hasilPelaksanaan,
            'anggaran'          => $anggaran !== ''
                ? $anggaran
                : 0,
            'sumber_pendanaan'  => $sumberPendanaan,
            'link_drive'        => $linkDrive,
            'data_dukung'       => $dataDukung,
        ]);

        return redirect()
            ->to(
                base_url(
                    'tim-pembina/realisasi?tahun=' .
                    $tahun
                )
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
        $data = $this->realisasiModel->find($id);

        if (!$data) {
            return redirect()
                ->to(
                    base_url(
                        'tim-pembina/realisasi'
                    )
                )
                ->with(
                    'error',
                    'Data realisasi kegiatan tidak ditemukan.'
                );
        }

        return view(
            'tim_pembina_realisasi/edit',
            [
                'title' =>
                    'Edit Realisasi Kegiatan Tim Pembina',

                'data'  => $data,

                'tahun' =>
                    $data['tahun'] ?? '',
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
        $data = $this->realisasiModel->find($id);

        if (!$data) {
            return redirect()
                ->to(
                    base_url(
                        'tim-pembina/realisasi'
                    )
                )
                ->with(
                    'error',
                    'Data realisasi kegiatan tidak ditemukan.'
                );
        }

        $tahun = trim(
            (string) $this->request->getPost('tahun')
        );

        $namaKegiatan = trim(
            (string) $this->request->getPost(
                'nama_kegiatan'
            )
        );

        $waktuKegiatan = $this->request->getPost(
            'waktu_kegiatan'
        );

        $peserta = trim(
            (string) $this->request->getPost('peserta')
        );

        $hasilPelaksanaan = trim(
            (string) $this->request->getPost(
                'hasil_pelaksanaan'
            )
        );

        $anggaran = trim(
            (string) $this->request->getPost('anggaran')
        );

        $sumberPendanaan = trim(
            (string) $this->request->getPost(
                'sumber_pendanaan'
            )
        );

        $linkDrive = trim(
            (string) $this->request->getPost(
                'link_drive'
            )
        );

        $dataDukung = trim(
            (string) $this->request->getPost(
                'data_dukung'
            )
        );

        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        if (!in_array($tahun, ['1', '2'], true)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Silakan pilih Tahun 1 atau Tahun 2.'
                );
        }

        if ($namaKegiatan === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Nama kegiatan wajib diisi.'
                );
        }

        if ($waktuKegiatan === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Waktu kegiatan wajib diisi.'
                );
        }

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
                'kecamatan_id'      => null,
                'tahun'             => $tahun,
                'nama_kegiatan'     => $namaKegiatan,
                'waktu_kegiatan'    => $waktuKegiatan,
                'peserta'           => $peserta,
                'hasil_pelaksanaan' => $hasilPelaksanaan,
                'anggaran'          => $anggaran !== ''
                    ? $anggaran
                    : 0,
                'sumber_pendanaan'  => $sumberPendanaan,
                'link_drive'        => $linkDrive,
                'data_dukung'       => $dataDukung,
            ]
        );

        return redirect()
            ->to(
                base_url(
                    'tim-pembina/realisasi?tahun=' .
                    $tahun
                )
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
        $data = $this->realisasiModel->find($id);

        if (!$data) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data tidak ditemukan.'
                );
        }

        $tahun = $data['tahun'] ?? '';

        $this->realisasiModel->delete($id);

        return redirect()
            ->to(
                base_url(
                    'tim-pembina/realisasi?tahun=' .
                    $tahun
                )
            )
            ->with(
                'success',
                'Realisasi kegiatan berhasil dihapus.'
            );
    }
}