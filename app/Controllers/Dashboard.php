<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\TimPembinaModel;
use App\Models\ForumBandungSehatModel;
use App\Models\ForumKecamatanSehatModel;
use App\Models\PokjaKelurahanSehatModel;

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
            ['admin', 'super_admin'],
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


            /*
             * Seluruh Tim Pembina.
             */
            $jumlahTimPembina =
                $timPembinaModel->countAll();


            /*
             * Seluruh Forum Bandung Sehat.
             */
            $jumlahForumBandung =
                $forumBandungModel->countAll();


            /*
             * Seluruh Forum Kecamatan Sehat.
             */
            $jumlahForumKecamatan =
                $forumKecamatanModel->countAll();


            /*
             * Seluruh Pokja Kelurahan Sehat.
             */
            $jumlahPokja =
                $pokjaModel->countAll();
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


                // =================================================
                // TIM PEMBINA
                // =================================================
                //
                // Tim Pembina sekarang memiliki kecamatan_id.
                //

                $jumlahTimPembina =
                    $timPembinaModel
                        ->where(
                            'kecamatan_id',
                            $kecamatanId
                        )
                        ->countAllResults();


                // =================================================
                // FORUM BANDUNG SEHAT
                // =================================================
                //
                // Modul Forum Bandung hanya untuk admin.
                //
                // User biasa tidak melihat statistiknya.
                //

                $jumlahForumBandung = 0;


                // =================================================
                // FORUM KECAMATAN SEHAT
                // =================================================
                //
                // Hanya data milik kecamatan user.
                //

                $jumlahForumKecamatan =
                    $forumKecamatanModel
                        ->where(
                            'kecamatan_id',
                            $kecamatanId
                        )
                        ->countAllResults();


                // =================================================
                // POKJA KELURAHAN SEHAT
                // =================================================
                //
                // Pokja tidak memiliki kecamatan_id langsung.
                //
                // Relasi:
                //
                // pokja
                // -> kelurahan
                // -> kecamatan
                //

                $jumlahPokja =
                    $pokjaModel
                        ->select(
                            'pokja_kelurahan_sehat.id'
                        )
                        ->join(
                            'kelurahan',
                            'kelurahan.id = pokja_kelurahan_sehat.kelurahan_id'
                        )
                        ->where(
                            'kelurahan.kecamatan_id',
                            $kecamatanId
                        )
                        ->countAllResults();
            }

            /*
             * Jika username tidak cocok dengan
             * kecamatan mana pun, semua data wilayah
             * tetap 0.
             */
        }


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