<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\TimPembinaModel;
use App\Models\ForumBandungSehatModel;
use App\Models\ForumKecamatanSehatModel;
use App\Models\PokjaKelurahanSehatModel;
use App\Models\SelfAssessmentModel;

class Dashboard extends BaseController
{
    /**
     * Cek apakah role saat ini adalah admin
     * atau super_admin.
     */
    private function isAdmin(): bool
    {
        $role = session()->get('role');

        return in_array(
            $role,
            ['admin', 'super_admin', 'admin_fbs'],
            true
        );
    }

    /**
     * Mendapatkan kecamatan berdasarkan username user.
     *
     * Contoh:
     *
     * andir
     * -> Andir
     *
     * babakan_ciparay
     * -> Babakan Ciparay
     *
     * bandung_kidul
     * -> Bandung Kidul
     */
    private function getUserKecamatan(
        KecamatanModel $kecamatanModel
    ): ?array {
        $username = session()->get('username');

        if (!$username) {
            return null;
        }

        $username = strtolower(
            trim((string) $username)
        );

        $kecamatanList = $kecamatanModel
            ->orderBy(
                'nama_kecamatan',
                'ASC'
            )
            ->findAll();

        foreach ($kecamatanList as $kecamatan) {

            $mappedUsername = strtolower(
                str_replace(
                    ' ',
                    '_',
                    trim(
                        $kecamatan['nama_kecamatan']
                    )
                )
            );

            if (
                $mappedUsername ===
                $username
            ) {
                return $kecamatan;
            }
        }

        return null;
    }

    /**
     * Menghitung jumlah data tiap sub menu
     * kelembagaan (SK, rencana kerja,
     * realisasi kegiatan, foto sekretariat).
     *
     * Contoh tabel:
     *
     * tim_pembina_sk
     * tim_pembina_rencana_kerja
     * ...
     */
    private function hitungProgres(
        array $tabels
    ): array {
        $db = db_connect();

        $hasil = [];

        foreach ($tabels as $key => $tabel) {

            $hasil[$key] = 0;

            if (!$db->tableExists($tabel)) {
                continue;
            }

            $hasil[$key] = (int) $db
                ->table($tabel)
                ->countAllResults();
        }

        return $hasil;
    }

    /**
     * Dashboard
     */
    public function index()
    {
        // =====================================================
        // CEK LOGIN
        // =====================================================

        if (
            session()->get('logged_in')
            !== true
        ) {
            return redirect()->to('/login');
        }


        // =====================================================
        // NON-CACHE DASHBOARD
        // =====================================================

        $this->response->setHeader(
            'Cache-Control',
            'no-store, no-cache, must-revalidate, max-age=0'
        );

        $this->response->setHeader(
            'Pragma',
            'no-cache'
        );

        $this->response->setHeader(
            'Expires',
            '0'
        );


        // =====================================================
        // MODEL
        // =====================================================

        $kecamatanModel =
            new KecamatanModel();

        $kelurahanModel =
            new KelurahanModel();

        $timPembinaModel =
            new TimPembinaModel();

        $forumBandungModel =
            new ForumBandungSehatModel();

        $forumKecamatanModel =
            new ForumKecamatanSehatModel();

        $pokjaModel =
            new PokjaKelurahanSehatModel();


        // =====================================================
        // SESSION
        // =====================================================

        $role =
            session()->get('role');

        $username =
            session()->get('username');

        $isAdmin =
            $this->isAdmin();


        // =====================================================
        // DEFAULT
        // =====================================================

        $jumlahKecamatan = 0;

        $jumlahKelurahan = 0;

        $jumlahTimPembina = 0;

        $jumlahForumBandung = 0;

        $jumlahForumKecamatan = 0;

        $jumlahPokja = 0;

        $namaKecamatanUser = null;

        $kecamatanId = null;


        // =====================================================
        // ADMIN / SUPER ADMIN
        // =====================================================

        if ($isAdmin) {

            /*
             * Admin dan super_admin melihat
             * seluruh kecamatan.
             */
            $jumlahKecamatan =
                $kecamatanModel->countAll();


            /*
             * Seluruh kelurahan.
             */
            $jumlahKelurahan =
                $kelurahanModel->countAll();
        }


        // =====================================================
        // USER KECAMATAN
        // =====================================================

        else {

            /*
             * Cari kecamatan berdasarkan username.
             */
            $userKecamatan =
                $this->getUserKecamatan(
                    $kecamatanModel
                );


            /*
             * Jika username berhasil dipetakan
             * ke kecamatan.
             */
            if ($userKecamatan) {

                $kecamatanId =
                    (int) $userKecamatan['id'];

                $namaKecamatanUser =
                    $userKecamatan['nama_kecamatan'];


                // =================================================
                // KECAMATAN
                // =================================================
                //
                // User hanya melihat kecamatannya sendiri.
                //

                $jumlahKecamatan = 1;


                // =================================================
                // KELURAHAN
                // =================================================
                //
                // Hanya kelurahan milik kecamatan user.
                //

                $jumlahKelurahan =
                    $kelurahanModel
                        ->where(
                            'kecamatan_id',
                            $kecamatanId
                        )
                        ->countAllResults();
            }

            /*
             * Jika username tidak cocok dengan
             * kecamatan mana pun, data wilayah
             * tetap 0.
             */
        }


        // =====================================================
        // KEEMPAT KOMPONEN KELEMBAGAAN
        // =====================================================
        //
        // Dihitung total untuk semua role agar
        // grafik "Statistik Program" dan
        // "Distribusi Data" selalu mengikuti
        // data yang diisi pada keempat komponen:
        //
        // - Tim Pembina
        // - Forum Bandung Sehat
        // - Forum Kecamatan Sehat
        // - Pokja Kelurahan Sehat
        //

        $jumlahTimPembina =
            $timPembinaModel->countAll();

        $jumlahForumBandung =
            $forumBandungModel->countAll();

        $jumlahForumKecamatan =
            $forumKecamatanModel->countAll();

        $jumlahPokja =
            $pokjaModel->countAll();


        // =====================================================
        // PROGRES TIAP KELEMBAGAAN
        // =====================================================
        //
        // Jumlah data pada 4 sub menu:
        //
        // - SK
        // - Rencana Kerja
        // - Realisasi Kegiatan
        // - Foto Sekretariat
        //

        $progresKelembagaan = [

            'tim_pembina' => [
                'label' => 'Tim Pembina',

                'items' =>
                    $this->hitungProgres([
                        'sk'            => 'tim_pembina_sk',
                        'rencana_kerja' => 'tim_pembina_rencana_kerja',
                        'realisasi'     => 'tim_pembina_realisasi',
                        'foto'          => 'tim_pembina_foto',
                    ]),
            ],

            'forum_bandung_sehat' => [
                'label' => 'Forum Bandung Sehat',

                'items' =>
                    $this->hitungProgres([
                        'sk'            => 'forum_bandung_sehat_sk',
                        'rencana_kerja' => 'forum_bandung_sehat_rencana_kerja',
                        'realisasi'     => 'forum_bandung_sehat_realisasi',
                        'foto'          => 'forum_bandung_sehat_foto',
                    ]),
            ],

            'forum_kecamatan_sehat' => [
                'label' => 'Forum Kecamatan Sehat',

                'items' =>
                    $this->hitungProgres([
                        'sk'            => 'forum_kecamatan_sk',
                        'rencana_kerja' => 'forum_kecamatan_sehat_rencana_kerja',
                        'realisasi'     => 'forum_kecamatan_sehat_realisasi',
                        'foto'          => 'forum_kecamatan_sehat_foto',
                    ]),
            ],

            'pokja_kelurahan_sehat' => [
                'label' => 'Pokja Kelurahan Sehat',

                'items' =>
                    $this->hitungProgres([
                        'sk'            => 'pokja_kelurahan_sehat_sk',
                        'rencana_kerja' => 'pokja_kelurahan_sehat_rencana_kerja',
                        'realisasi'     => 'pokja_kelurahan_sehat_realisasi',
                        'foto'          => 'pokja_kelurahan_sehat_foto',
                    ]),
            ],
        ];


        // =====================================================
        // STATUS KELENGKAPAN TIAP KELEMBAGAAN
        // =====================================================
        //
        // 1/1 jika keempat sub menu (SK, rencana
        // kerja, realisasi, foto) sudah terisi
        // minimal 1 data, selain itu 1/0.
        //
        // jumlah_terisi: berapa sub menu yang
        // sudah terisi (0 - 4), dipakai grafik
        // dan ringkasan sistem.
        //

        foreach ($progresKelembagaan as &$modul) {

            $items =
                array_map(
                    'intval',
                    $modul['items'] ?? []
                );

            $terisiSemua =
                count($items) === 4
                && ! in_array(0, $items, true);

            $modul['status_kelengkapan'] =
                $terisiSemua ? '1/1' : '1/0';

            $modul['jumlah_terisi'] =
                count(
                    array_filter(
                        $items,
                        static fn ($nilai) => $nilai > 0
                    )
                );
        }
        unset($modul);


        // =====================================================
        // NILAI SELF-ASSESSMENT (SEMENTARA)
        // Nilai per modul milik user yang sedang
        // login, dipakai form di panel progres.
        // =====================================================

        $userId =
            session()->get('user_id');

        $nilaiSelfAssessment = [];

        if ($userId) {

            $modelSelfAssessment =
                new SelfAssessmentModel();

            $barisNilai =
                $modelSelfAssessment
                    ->where('user_id', $userId)
                    ->findAll();

            foreach ($barisNilai as $item) {
                $nilaiSelfAssessment[$item['modul']] =
                    $item;
            }
        }

        foreach ($progresKelembagaan as $key => &$modul) {
            $modul['nilai_self_assessment'] =
                $nilaiSelfAssessment[$key] ?? null;
        }
        unset($modul);


        // =====================================================
        // DATA DASHBOARD
        // =====================================================

        $data = [

            'title' =>
                'Bandung Kota Sehat',

            'username' =>
                $username,

            'role' =>
                $role,

            'namaKecamatanUser' =>
                $namaKecamatanUser,

            'jumlahKecamatan' =>
                $jumlahKecamatan,

            'jumlahKelurahan' =>
                $jumlahKelurahan,

            'jumlahTimPembina' =>
                $jumlahTimPembina,

            'jumlahForumBandung' =>
                $jumlahForumBandung,

            'jumlahForumKecamatan' =>
                $jumlahForumKecamatan,

            'jumlahPokja' =>
                $jumlahPokja,

            'progresKelembagaan' =>
                $progresKelembagaan,

            'nilaiSelfAssessment' =>
                $nilaiSelfAssessment,
        ];


        // =====================================================
        // TAMPILKAN VIEW
        // =====================================================

        return view(
            'dashboard/index',
            $data
        );
    }
}