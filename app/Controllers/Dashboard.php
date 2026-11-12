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
     * Query builder yang di-scope per-akun.
     *
     * Admin (admin/super_admin/admin_fbs):
     * melihat semua baris.
     *
     * User biasa: hanya baris dengan
     * user_id milik akun login.
     *
     * Jika tabel tidak punya kolom user_id,
     * query dikembalikan tanpa scope.
     */
    private function scopeByUser(
        string $tabel
    ): \CodeIgniter\Database\BaseBuilder {
        $db = db_connect();

        $builder = $db->table($tabel);

        if ($this->isAdmin()) {
            return $builder;
        }

        if (
            !$db->fieldExists(
                'user_id',
                $tabel
            )
        ) {
            return $builder;
        }

        $userId =
            session()->get('user_id');

        if ($userId) {
            $builder->where(
                'user_id',
                $userId
            );
        } else {
            $builder->where('user_id', null);
        }

        return $builder;
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

        /*
         * Kecamatan dengan username khusus
         * (contoh: kec_batununggal)
         * tetap dipetakan ke kecamatannya.
         */
        if (str_starts_with($username, 'kec_')) {
            $username = substr($username, 4);
        }

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
     * Mendapatkan kelurahan berdasarkan username user.
     *
     * Contoh:
     *
     * kel_cipaganti
     * -> Cipaganti
     *
     * kel_dago
     * -> Dago
     */
    private function getUserKelurahan(
        KelurahanModel $kelurahanModel
    ): ?array {
        $username = session()->get('username');

        if (!$username) {
            return null;
        }

        $username = strtolower(
            trim((string) $username)
        );

        /*
         * Kelurahan dengan username khusus
         * (contoh: kel_cipaganti)
         * tetap dipetakan ke kelurahannya.
         */
        if (str_starts_with($username, 'kel_')) {
            $username = substr($username, 4);
        }

        $kelurahanList = $kelurahanModel
            ->orderBy(
                'nama_kelurahan',
                'ASC'
            )
            ->findAll();

        foreach ($kelurahanList as $kelurahan) {

            $mappedUsername = strtolower(
                str_replace(
                    ' ',
                    '_',
                    trim(
                        $kelurahan['nama_kelurahan']
                    )
                )
            );

            if (
                $mappedUsername ===
                $username
            ) {
                return $kelurahan;
            }
        }

        return null;
    }

    /**
     * Cek apakah user saat ini adalah user kecamatan.
     */
    private function isKecamatanUser(): bool
    {
        $username = session()->get('username');

        if (!$username) {
            return false;
        }

        $username = strtolower(
            trim((string) $username)
        );

        if (str_starts_with($username, 'kec_')) {
            $username = substr($username, 4);
        }

        $kecamatanModel = new KecamatanModel();

        $kecamatanList = $kecamatanModel
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

            if ($mappedUsername === $username) {
                return true;
            }
        }

        return false;
    }

    /**
     * Cek apakah user saat ini adalah user kelurahan.
     */
    private function isKelurahanUser(): bool
    {
        $username = session()->get('username');

        if (!$username) {
            return false;
        }

        $username = strtolower(
            trim((string) $username)
        );

        if (str_starts_with($username, 'kel_')) {
            $username = substr($username, 4);
        }

        $kelurahanModel = new KelurahanModel();

        $kelurahanList = $kelurahanModel
            ->findAll();

        foreach ($kelurahanList as $kelurahan) {
            $mappedUsername = strtolower(
                str_replace(
                    ' ',
                    '_',
                    trim(
                        $kelurahan['nama_kelurahan']
                    )
                )
            );

            if ($mappedUsername === $username) {
                return true;
            }
        }

        return false;
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

            $hasil[$key] = (int) $this
                ->scopeByUser($tabel)
                ->countAllResults();
        }

        return $hasil;
    }

    /**
     * Hitung progres per kecamatan/kelurahan.
     *
     * Mengembalikan array:
     * [
     *   'sk'            => [kecamatan_id => jumlah, ...],
     *   'rencana_kerja' => [kecamatan_id => jumlah, ...],
     *   'realisasi'     => [kecamatan_id => jumlah, ...],
     *   'foto'          => [kecamatan_id => jumlah, ...],
     * ]
     */
    private function hitungProgresPerWilayah(
        array $tabels,
        string $kolomWilayah
    ): array {
        $db = db_connect();

        $hasil = [];

        foreach ($tabels as $key => $tabel) {

            $hasil[$key] = [];

            if (!$db->tableExists($tabel)) {
                continue;
            }

            if (!$db->fieldExists($kolomWilayah, $tabel)) {
                continue;
            }

            $baris = $this
                ->scopeByUser($tabel)
                ->select(
                    $kolomWilayah
                    . ', COUNT(*) AS jumlah'
                )
                ->groupBy($kolomWilayah)
                ->get()
                ->getResultArray();

            foreach ($baris as $row) {
                $wilayahId = (int) (
                    $row[$kolomWilayah] ?? 0
                );

                $hasil[$key][$wilayahId] =
                    (int) $row['jumlah'];
            }
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
        // Jumlah baris tabel induk kelembagaan.
        //
        // Tabel induk (tim_pembina, forum_*,
        // pokja_*) tidak memiliki kolom user_id,
        // sehingga angka ini tetap total global.
        //
        // Grafik "Statistik Program" dan
        // "Distribusi Data" TIDAK memakai angka
        // ini; grafik memakai hitungProgres()
        // dan hitungProgresPerWilayah() yang
        // di-scope per-akun: admin melihat
        // semua baris, user biasa hanya baris
        // dengan user_id miliknya sendiri.
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
        // FILTER KHUSUS AKUN TATANAN
        // =====================================================
        //
        // Akun TATANAN_1 s/d TATANAN_9 hanya
        // melihat kelembagaan Tim Pembina,
        // dan di dalamnya hanya Rencana Kerja
        // serta Realisasi Kegiatan.
        //

        $isTatanan =
            (bool) preg_match(
                '/^TATANAN_[1-9]$/i',
                (string) $username
            );

        if ($isTatanan) {

            $progresKelembagaan =
                array_intersect_key(
                    $progresKelembagaan,
                    ['tim_pembina' => true]
                );

            $progresKelembagaan['tim_pembina']['items'] =
                array_intersect_key(
                    $progresKelembagaan['tim_pembina']['items'],
                    [
                        'rencana_kerja' => true,
                        'realisasi'     => true,
                    ]
                );
        }


        // =====================================================
        // TABEL INOVASI DASHBOARD
        // =====================================================
        //
        // Ditampilkan di sebelah kartu Tim Pembina,
        // hanya untuk akun TATANAN dan admin.
        //
        // - TATANAN -> Inovasi Perangkat Daerah saja.
        // - Admin   -> gabungan ketiga inovasi
        //   (Perangkat Daerah + Kecamatan + Kelurahan).
        //
        // Read-only; link menuju modul Inovasi.
        //

        $showTabelInovasi =
            $isTatanan || $role === 'admin';

        $tabelInovasi = null;

        $inovasiGabungan = false;

        if ($showTabelInovasi) {

            $tabelInovasi = [];

            $db = db_connect();


            // -------------------------------------------------
            // INOVASI PERANGKAT DAERAH
            // -------------------------------------------------

            $barisPD = $db
                ->table('inovasi_perangkat_daerah')
                ->select(
                    'nama_perangkat_daerah,'
                    . ' nama_inovasi,'
                    . ' penjelasan,'
                    . ' waktu_awal_penerapan,'
                    . ' dampak_inovasi,'
                    . ' link_data_dukung'
                )
                ->orderBy('nama_perangkat_daerah', 'ASC')
                ->orderBy('nama_inovasi', 'ASC')
                ->get()
                ->getResultArray();

            foreach ($barisPD as $baris) {
                $tabelInovasi[] = [
                    'jenis' => 'Perangkat Daerah',

                    'nama_inovasi' =>
                        $baris['nama_inovasi'] ?? '',

                    'asal' =>
                        $baris['nama_perangkat_daerah']
                        ?? '',

                    'tahun' =>
                        !empty(
                            $baris['waktu_awal_penerapan']
                        )
                            ? date(
                                'Y',
                                strtotime(
                                    $baris['waktu_awal_penerapan']
                                )
                            )
                            : '-',

                    'hasil' =>
                        $baris['dampak_inovasi'] ?? '',

                    'link' =>
                        $baris['link_data_dukung'] ?? '',
                ];
            }


            // -------------------------------------------------
            // ADMIN: GABUNGKAN KECAMATAN & KELURAHAN
            // -------------------------------------------------

            if ($role === 'admin') {

                $inovasiGabungan = true;


                // =============================================
                // INOVASI KECAMATAN
                // =============================================

                $barisKec = $db
                    ->table('inovasi_kecamatan')
                    ->select(
                        'inovasi_kecamatan.nama_inovasi,'
                        . ' inovasi_kecamatan.tahun,'
                        . ' inovasi_kecamatan.manfaat,'
                        . ' inovasi_kecamatan.link_data_dukung,'
                        . ' kecamatan.nama_kecamatan'
                    )
                    ->join(
                        'kecamatan',
                        'kecamatan.id'
                        . ' = inovasi_kecamatan.kecamatan_id'
                    )
                    ->orderBy(
                        'kecamatan.nama_kecamatan',
                        'ASC'
                    )
                    ->orderBy(
                        'inovasi_kecamatan.nama_inovasi',
                        'ASC'
                    )
                    ->get()
                    ->getResultArray();

                foreach ($barisKec as $baris) {
                    $tabelInovasi[] = [
                        'jenis' => 'Kecamatan',

                        'nama_inovasi' =>
                            $baris['nama_inovasi'] ?? '',

                        'asal' =>
                            $baris['nama_kecamatan']
                            ?? '',

                        'tahun' =>
                            $baris['tahun'] ?? '-',

                        'hasil' =>
                            $baris['manfaat'] ?? '',

                        'link' =>
                            $baris['link_data_dukung']
                            ?? '',
                    ];
                }


                // =============================================
                // INOVASI KELURAHAN
                // =============================================

                $barisKel = $db
                    ->table('inovasi_kelurahan')
                    ->select(
                        'inovasi_kelurahan.nama_inovasi,'
                        . ' inovasi_kelurahan.tahun,'
                        . ' inovasi_kelurahan.manfaat,'
                        . ' inovasi_kelurahan.link_data_dukung,'
                        . ' kelurahan.nama_kelurahan'
                    )
                    ->join(
                        'kelurahan',
                        'kelurahan.id'
                        . ' = inovasi_kelurahan.kelurahan_id'
                    )
                    ->orderBy(
                        'kelurahan.nama_kelurahan',
                        'ASC'
                    )
                    ->orderBy(
                        'inovasi_kelurahan.nama_inovasi',
                        'ASC'
                    )
                    ->get()
                    ->getResultArray();

                foreach ($barisKel as $baris) {
                    $tabelInovasi[] = [
                        'jenis' => 'Kelurahan',

                        'nama_inovasi' =>
                            $baris['nama_inovasi'] ?? '',

                        'asal' =>
                            $baris['nama_kelurahan']
                            ?? '',

                        'tahun' =>
                            $baris['tahun'] ?? '-',

                        'hasil' =>
                            $baris['manfaat'] ?? '',

                        'link' =>
                            $baris['link_data_dukung']
                            ?? '',
                    ];
                }
            }
        }


        // =====================================================
        // STATUS KELENGKAPAN TIAP KELEMBAGAAN
        // =====================================================
        //
        // 1/1 jika keempat sub menu (SK, rencana
        // kerja, realisasi, foto) sudah terisi
        // minimal 1 data, selain itu 1/0.
        //
        // Khusus role admin:
        // - Tim Pembina  -> jumlah akun
        //   TATANAN_1 s/d TATANAN_9 (9/0, 9/1)
        // - Forum Bandung Sehat -> tetap 1/x
        // - Forum Kecamatan     -> jumlah kecamatan
        // - Pokja Kelurahan     -> jumlah kelurahan
        //
        // Non-admin: seluruh modul tetap 1/x
        // (kelembagaan milik akun sendiri).
        //
        // jumlah_terisi: berapa sub menu yang
        // sudah terisi (0 - 4), dipakai grafik.
        // Ringkasan sistem memakai
        // status_kelengkapan.
        //

        $jumlahTimPembinaAkun = 0;

        if ($isAdmin) {

            $daftarAkun = db_connect()
                ->table('users')
                ->select('username')
                ->get()
                ->getResultArray();

            foreach ($daftarAkun as $akun) {
                if (
                    preg_match(
                        '/^TATANAN_[1-9]$/i',
                        (string) $akun['username']
                    )
                ) {
                    $jumlahTimPembinaAkun++;
                }
            }
        }

        foreach ($progresKelembagaan as $key => &$modul) {

            $items =
                array_map(
                    'intval',
                    $modul['items'] ?? []
                );

            $terisiSemua =
                count($items) > 0
                && ! in_array(0, $items, true);

            $status = $terisiSemua ? 1 : 0;

            if ($key === 'tim_pembina' && $isAdmin) {
                $modul['status_kelengkapan'] =
                    $jumlahTimPembinaAkun . '/' . $status;
            } elseif ($key === 'forum_kecamatan_sehat') {
                $modul['status_kelengkapan'] =
                    $jumlahKecamatan . '/' . $status;
            } elseif ($key === 'pokja_kelurahan_sehat') {
                $modul['status_kelengkapan'] =
                    $jumlahKelurahan . '/' . $status;
            } else {
                $modul['status_kelengkapan'] =
                    $terisiSemua ? '1/1' : '1/0';
            }

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
        // DAFTAR KECAMATAN & KELURAHAN
        // untuk dropdown filter di panel progres
        // =====================================================

        $daftarKecamatan =
            $kecamatanModel
                ->orderBy('nama_kecamatan', 'ASC')
                ->findAll();

        $daftarKelurahan =
            $kelurahanModel
                ->orderBy('nama_kelurahan', 'ASC')
                ->findAll();


        // =====================================================
        // PROGRES PER WILAYAH
        // Untuk dropdown filter di panel progres.
        // Dipakai saat admin memilih kecamatan
        // (forum kecamatan) atau kelurahan (pokja).
        // =====================================================

        $progresPerKecamatan =
            $this->hitungProgresPerWilayah(
                [
                    'sk'            => 'forum_kecamatan_sk',
                    'rencana_kerja' => 'forum_kecamatan_sehat_rencana_kerja',
                    'realisasi'     => 'forum_kecamatan_sehat_realisasi',
                    'foto'          => 'forum_kecamatan_sehat_foto',
                ],
                'kecamatan_id'
            );

        $progresPerKelurahan =
            $this->hitungProgresPerWilayah(
                [
                    'sk'            => 'pokja_kelurahan_sehat_sk',
                    'rencana_kerja' => 'pokja_kelurahan_sehat_rencana_kerja',
                    'realisasi'     => 'pokja_kelurahan_sehat_realisasi',
                    'foto'          => 'pokja_kelurahan_sehat_foto',
                ],
                'kelurahan_id'
            );


        // =====================================================
        // IDENTITAS WILAYAH USER
        // =====================================================

        $isKecamatanUser =
            $this->isKecamatanUser();

        $isKelurahanUser =
            $this->isKelurahanUser();


        // =====================================================
        // RINGKASAN SISTEM (Khusus User Kecamatan/Kelurahan)
        // Menampilkan status tiap komponen: SK,
        // Rencana Kerja, Realisasi Kegiatan,
        // Foto Sekretariat.
        // 1/1 jika sudah diisi, 1/0 jika belum.
        // =====================================================

        $ringkasanKomponen = [];

        if ($isKecamatanUser || $isKelurahanUser) {

            $labelKomponen = $isTatanan
                ? [
                    'rencana_kerja' => 'Rencana Kerja',
                    'realisasi'     => 'Realisasi Kegiatan',
                ]
                : [
                    'sk'            => 'SK',
                    'rencana_kerja' => 'Rencana Kerja',
                    'realisasi'     => 'Realisasi Kegiatan',
                    'foto'          => 'Foto Sekretariat',
                ];

            foreach ($labelKomponen as $subKey => $label) {

                $terisi = false;

                foreach ($progresKelembagaan as $modul) {

                    $nilai =
                        (int) (
                            $modul['items'][$subKey] ?? 0
                        );

                    if ($nilai > 0) {
                        $terisi = true;
                        break;
                    }
                }

                $ringkasanKomponen[] = [
                    'label' => $label,
                    'nilai' => $terisi ? '1/1' : '1/0',
                ];
            }
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

            'progresKelembagaan' =>
                $progresKelembagaan,

            'nilaiSelfAssessment' =>
                $nilaiSelfAssessment,

            'daftarKecamatan' =>
                $daftarKecamatan,

            'daftarKelurahan' =>
                $daftarKelurahan,

            'progresPerKecamatan' =>
                $progresPerKecamatan,

            'progresPerKelurahan' =>
                $progresPerKelurahan,

            'isTatanan' =>
                $isTatanan,

            'tabelInovasi' =>
                $tabelInovasi,

            'inovasiGabungan' =>
                $inovasiGabungan,

            'urlInovasi' =>
                '/inovasi/perangkat-daerah',

            'isKecamatanUser' =>
                $isKecamatanUser,

            'isKelurahanUser' =>
                $isKelurahanUser,

            'ringkasanKomponen' =>
                $ringkasanKomponen,

            'isAdmin' =>
                $isAdmin,
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