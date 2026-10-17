<?php

namespace App\Controllers;

class Export extends BaseController
{

    /**
     * Modul kelembagaan untuk kolom Excel
     */
    private array $modul = [
        'tim_pembina',
        'forum_bandung_sehat',
        'forum_kecamatan_sehat',
        'pokja_kelurahan_sehat',
    ];

    private array $labelModul = [
        'Tim Pembina',
        'Forum Bandung Sehat',
        'Forum Kecamatan Sehat',
        'Pokja Kelurahan Sehat',
    ];

    /**
     * Hanya admin yang boleh mengunduh
     */
    private function cekAdmin()
    {

        if (session()->get('role') !== 'admin') {

            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Hanya admin yang bisa mengunduh data.'
                );
        }

        return null;
    }

    /**
     * Unduh Excel nilai self-assessment
     * seluruh user (khusus admin).
     */
    public function selfAssessment()
    {

        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $gagal =
            $this->cekAdmin();

        if ($gagal !== null) {
            return $gagal;
        }


        // =====================================================
        // AMBIL DATA
        // =====================================================

        $db =
            db_connect();

        $baris =
            $db->table('self_assessment')
                ->select(
                    'self_assessment.user_id,'
                    . 'self_assessment.modul,'
                    . 'self_assessment.nilai,'
                    . 'self_assessment.updated_at,'
                    . 'users.nama,'
                    . 'users.username'
                )
                ->join(
                    'users',
                    'users.id = self_assessment.user_id'
                )
                ->orderBy('users.nama', 'ASC')
                ->get()
                ->getResultArray();


        // =====================================================
        // PIVOT: SATU BARIS PER USER
        // =====================================================

        $perUser = [];

        foreach ($baris as $item) {

            $key =
                $item['user_id'];

            if (! isset($perUser[$key])) {

                $perUser[$key] = [
                    'nama' =>
                        $item['nama'],

                    'username' =>
                        $item['username'],

                    'nilai' =>
                        array_fill_keys(
                            $this->modul,
                            null
                        ),

                    'diubah' =>
                        '',
                ];
            }

            $modul =
                $item['modul'];

            if (
                isset($perUser[$key]['nilai'][$modul])
            ) {

                $perUser[$key]['nilai'][$modul] =
                    (float) $item['nilai'];
            }

            if (
                ($item['updated_at'] ?? '')
                > $perUser[$key]['diubah']
            ) {

                $perUser[$key]['diubah'] =
                    $item['updated_at'];
            }
        }


        // =====================================================
        // SUSUN BARIS EXCEL
        // =====================================================

        $judul = array_merge(
            [
                'No',
                'Nama',
                'Username',
            ],
            $this->labelModul,
            [
                'Terakhir Diubah',
            ]
        );

        $rows = [];
        $nomor = 1;

        foreach ($perUser as $data) {

            $rows[] = array_merge(
                [
                    $nomor,
                    $data['nama'],
                    $data['username'],
                ],

                array_values($data['nilai']),

                [
                    $data['diubah'] !== ''
                        ? date(
                            'd/m/Y H:i',
                            strtotime($data['diubah'])
                        )
                        : '-',
                ]
            );

            $nomor++;
        }

        if (empty($rows)) {

            $rows[] = array_merge(
                ['-'],
                array_fill(
                    0,
                    count($judul) - 1,
                    'Belum ada data'
                )
            );
        }


        // =====================================================
        // KIRIM FILE
        // =====================================================

        return buat_xlsx(
            'self-assessment-' . date('Ymd-His'),
            $judul,
            $rows
        );
    }
}
