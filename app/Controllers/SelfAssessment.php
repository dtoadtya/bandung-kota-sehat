<?php

namespace App\Controllers;

use App\Models\SelfAssessmentModel;
use App\Libraries\ExcelSederhana;

class SelfAssessment extends BaseController
{

    /**
     * Modul kelembagaan yang boleh dinilai
     */
    private array $modulDikenal = [
        'tim_pembina',
        'forum_bandung_sehat',
        'forum_kecamatan_sehat',
        'pokja_kelurahan_sehat',
    ];

    /**
     * Simpan / perbarui nilai self-assessment
     * (status sementara) dari panel progres
     * dashboard.
     */
    public function store()
    {

        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId =
            session()->get('user_id');

        $modul =
            $this->request->getPost('modul');

        $nilai =
            $this->request->getPost('nilai');

        $keterangan =
            $this->request->getPost('keterangan');


        // =====================================================
        // VALIDASI
        // =====================================================

        if (! in_array($modul, $this->modulDikenal, true)) {

            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Modul self-assessment tidak dikenal.'
                );
        }

        if (
            ! is_numeric($nilai)
            || (float) $nilai < 0
            || (float) $nilai > 100
        ) {

            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Nilai self-assessment harus angka 0 - 100.'
                );
        }


        // =====================================================
        // SIMPAN (UPSERT)
        // =====================================================

        $model =
            new SelfAssessmentModel();

        $existing =
            $model
                ->where('user_id', $userId)
                ->where('modul', $modul)
                ->first();

        $data = [
            'nilai' =>
                round((float) $nilai, 2),

            'keterangan' =>
                $keterangan
                    ? mb_substr(trim($keterangan), 0, 255)
                    : null,

            'status' =>
                'sementara',
        ];

        if ($existing) {

            $model->update(
                $existing['id'],
                $data
            );

            $pesan =
                'Nilai self-assessment (sementara) berhasil diperbarui.';

        } else {

            $data['user_id'] =
                $userId;

            $data['modul'] =
                $modul;

            $model->insert($data);

            $pesan =
                'Nilai self-assessment (sementara) berhasil disimpan.';
        }


        // =====================================================
        // REDIRECT KE DASHBOARD
        // =====================================================

        return redirect()
            ->to('/dashboard')
            ->with('success', $pesan);
    }

    /**
     * Unduh semua nilai self-assessment
     * (semua user) sebagai file Excel.
     * Khusus admin.
     */
    public function excel()
    {

        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if (session()->get('role') !== 'admin') {

            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Hanya admin yang bisa mengunduh Excel.'
                );
        }


        // =====================================================
        // AMBIL SEMUA DATA + NAMA USER
        // =====================================================

        $model =
            new SelfAssessmentModel();

        $barisNilai =
            $model
                ->select(
                    'self_assessment.id, '
                    . 'self_assessment.user_id, '
                    . 'self_assessment.modul, '
                    . 'self_assessment.nilai, '
                    . 'self_assessment.status, '
                    . 'self_assessment.created_at, '
                    . 'self_assessment.updated_at, '
                    . 'users.nama AS nama_user, '
                    . 'users.username, '
                    . 'users.role AS role_user'
                )
                ->join(
                    'users',
                    'users.id = self_assessment.user_id'
                )
                ->orderBy('users.nama', 'ASC')
                ->orderBy('self_assessment.modul', 'ASC')
                ->findAll();


        if (empty($barisNilai)) {

            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Belum ada data nilai self-assessment untuk diunduh.'
                );
        }


        // =====================================================
        // SIAPKAN TABEL
        // =====================================================

        $labelModul = [
            'tim_pembina'          => 'Tim Pembina',
            'forum_bandung_sehat'  => 'Forum Bandung Sehat',
            'forum_kecamatan_sehat' => 'Forum Kecamatan Sehat',
            'pokja_kelurahan_sehat' => 'Pokja Kelurahan Sehat',
        ];

        $header = [
            'No',
            'Nama',
            'Username',
            'Role',
            'Modul',
            'Nilai',
            'Status',
            'Dibuat',
            'Diperbarui',
        ];

        $isi = [];
        $no  = 1;

        foreach ($barisNilai as $item) {

            $isi[] = [
                $no++,
                $item['nama_user'],
                $item['username'],
                $item['role_user'],
                $labelModul[$item['modul']]
                    ?? $item['modul'],
                (float) $item['nilai'],
                $item['status'] ?? 'sementara',
                $item['created_at']  ?? '',
                $item['updated_at']  ?? '',
            ];
        }


        // =====================================================
        // KIRIM FILE EXCEL
        // =====================================================

        $excel =
            new ExcelSederhana();

        $excel->unduh(
            'self-assessment-'
            . date('Ymd-His')
            . '.xlsx',
            $header,
            $isi
        );
    }
}
