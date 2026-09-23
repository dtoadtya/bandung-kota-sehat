<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeragamkanRencanaRealisasiKegiatan extends Migration
{
    public function up()
    {
        /*
        |--------------------------------------------------------------------------
        | TIM PEMBINA - RENCANA KERJA
        |--------------------------------------------------------------------------
        */

        $this->buatTabelJikaBelumAda(
            'tim_pembina_rencana_kerja',
            false
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_rencana_kerja',
            'nama_kegiatan',
            "VARCHAR(255) NULL AFTER tahun"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_rencana_kerja',
            'waktu_kegiatan',
            "DATE NULL AFTER nama_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_rencana_kerja',
            'peserta',
            "VARCHAR(255) NULL AFTER waktu_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_rencana_kerja',
            'hasil_pelaksanaan',
            "TEXT NULL AFTER peserta"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_rencana_kerja',
            'anggaran',
            "BIGINT UNSIGNED NULL AFTER hasil_pelaksanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_rencana_kerja',
            'sumber_pendanaan',
            "VARCHAR(100) NULL AFTER anggaran"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_rencana_kerja',
            'link_drive',
            "TEXT NULL AFTER sumber_pendanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_rencana_kerja',
            'data_dukung',
            "TEXT NULL AFTER link_drive"
        );


        /*
        |--------------------------------------------------------------------------
        | TIM PEMBINA - REALISASI
        |--------------------------------------------------------------------------
        */

        $this->buatTabelJikaBelumAda(
            'tim_pembina_realisasi',
            false
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_realisasi',
            'nama_kegiatan',
            "VARCHAR(255) NULL AFTER tahun"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_realisasi',
            'waktu_kegiatan',
            "DATE NULL AFTER nama_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_realisasi',
            'peserta',
            "VARCHAR(255) NULL AFTER waktu_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_realisasi',
            'hasil_pelaksanaan',
            "TEXT NULL AFTER peserta"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_realisasi',
            'anggaran',
            "BIGINT UNSIGNED NULL AFTER hasil_pelaksanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_realisasi',
            'sumber_pendanaan',
            "VARCHAR(100) NULL AFTER anggaran"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_realisasi',
            'link_drive',
            "TEXT NULL AFTER sumber_pendanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'tim_pembina_realisasi',
            'data_dukung',
            "TEXT NULL AFTER link_drive"
        );


        /*
        |--------------------------------------------------------------------------
        | FORUM KECAMATAN SEHAT - RENCANA KERJA
        |--------------------------------------------------------------------------
        */

        $this->buatTabelJikaBelumAda(
            'forum_kecamatan_sehat_rencana_kerja',
            true
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_rencana_kerja',
            'nama_kegiatan',
            "VARCHAR(255) NULL AFTER tahun"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_rencana_kerja',
            'waktu_kegiatan',
            "DATE NULL AFTER nama_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_rencana_kerja',
            'peserta',
            "VARCHAR(255) NULL AFTER waktu_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_rencana_kerja',
            'hasil_pelaksanaan',
            "TEXT NULL AFTER peserta"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_rencana_kerja',
            'anggaran',
            "BIGINT UNSIGNED NULL AFTER hasil_pelaksanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_rencana_kerja',
            'sumber_pendanaan',
            "VARCHAR(100) NULL AFTER anggaran"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_rencana_kerja',
            'link_drive',
            "TEXT NULL AFTER sumber_pendanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_rencana_kerja',
            'data_dukung',
            "TEXT NULL AFTER link_drive"
        );


        /*
        |--------------------------------------------------------------------------
        | FORUM KECAMATAN SEHAT - REALISASI
        |--------------------------------------------------------------------------
        */

        $this->buatTabelJikaBelumAda(
            'forum_kecamatan_sehat_realisasi',
            true
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_realisasi',
            'nama_kegiatan',
            "VARCHAR(255) NULL AFTER tahun"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_realisasi',
            'waktu_kegiatan',
            "DATE NULL AFTER nama_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_realisasi',
            'peserta',
            "VARCHAR(255) NULL AFTER waktu_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_realisasi',
            'hasil_pelaksanaan',
            "TEXT NULL AFTER peserta"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_realisasi',
            'anggaran',
            "BIGINT UNSIGNED NULL AFTER hasil_pelaksanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_realisasi',
            'sumber_pendanaan',
            "VARCHAR(100) NULL AFTER anggaran"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_realisasi',
            'link_drive',
            "TEXT NULL AFTER sumber_pendanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'forum_kecamatan_sehat_realisasi',
            'data_dukung',
            "TEXT NULL AFTER link_drive"
        );


        /*
        |--------------------------------------------------------------------------
        | POKJA KELURAHAN SEHAT - RENCANA KERJA
        |--------------------------------------------------------------------------
        */

        $this->buatTabelJikaBelumAda(
            'pokja_kelurahan_sehat_rencana_kerja',
            true,
            true
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_rencana_kerja',
            'nama_kegiatan',
            "VARCHAR(255) NULL AFTER tahun"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_rencana_kerja',
            'waktu_kegiatan',
            "DATE NULL AFTER nama_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_rencana_kerja',
            'peserta',
            "VARCHAR(255) NULL AFTER waktu_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_rencana_kerja',
            'hasil_pelaksanaan',
            "TEXT NULL AFTER peserta"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_rencana_kerja',
            'anggaran',
            "BIGINT UNSIGNED NULL AFTER hasil_pelaksanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_rencana_kerja',
            'sumber_pendanaan',
            "VARCHAR(100) NULL AFTER anggaran"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_rencana_kerja',
            'link_drive',
            "TEXT NULL AFTER sumber_pendanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_rencana_kerja',
            'data_dukung',
            "TEXT NULL AFTER link_drive"
        );


        /*
        |--------------------------------------------------------------------------
        | POKJA KELURAHAN SEHAT - REALISASI
        |--------------------------------------------------------------------------
        */

        $this->buatTabelJikaBelumAda(
            'pokja_kelurahan_sehat_realisasi',
            true,
            true
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_realisasi',
            'nama_kegiatan',
            "VARCHAR(255) NULL AFTER tahun"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_realisasi',
            'waktu_kegiatan',
            "DATE NULL AFTER nama_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_realisasi',
            'peserta',
            "VARCHAR(255) NULL AFTER waktu_kegiatan"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_realisasi',
            'hasil_pelaksanaan',
            "TEXT NULL AFTER peserta"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_realisasi',
            'anggaran',
            "BIGINT UNSIGNED NULL AFTER hasil_pelaksanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_realisasi',
            'sumber_pendanaan',
            "VARCHAR(100) NULL AFTER anggaran"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_realisasi',
            'link_drive',
            "TEXT NULL AFTER sumber_pendanaan"
        );

        $this->tambahKolomJikaBelumAda(
            'pokja_kelurahan_sehat_realisasi',
            'data_dukung',
            "TEXT NULL AFTER link_drive"
        );
    }


    public function down()
    {
        /*
         * Tidak menghapus kolom/tabel lama.
         *
         * Tujuannya agar data yang sudah ada tetap aman.
         */
    }


    /*
    |--------------------------------------------------------------------------
    | HELPER
    |--------------------------------------------------------------------------
    */

    private function tambahKolomJikaBelumAda(
        string $table,
        string $column,
        string $definition
    ) {
        $db = $this->db;

        $exists = $db->query(
            "SELECT COUNT(*) AS jumlah
             FROM INFORMATION_SCHEMA.COLUMNS
             WHERE TABLE_SCHEMA = DATABASE()
             AND TABLE_NAME = ?
             AND COLUMN_NAME = ?",
            [$table, $column]
        )->getRow()->jumlah;

        if ((int) $exists === 0) {
            $db->query(
                "ALTER TABLE `{$table}`
                 ADD COLUMN `{$column}` {$definition}"
            );
        }
    }


    private function buatTabelJikaBelumAda(
        string $table,
        bool $kecamatan = false,
        bool $kelurahan = false
    ) {
        $db = $this->db;

        $exists = $db->query(
            "SELECT COUNT(*) AS jumlah
             FROM INFORMATION_SCHEMA.TABLES
             WHERE TABLE_SCHEMA = DATABASE()
             AND TABLE_NAME = ?",
            [$table]
        )->getRow()->jumlah;

        if ((int) $exists > 0) {
            return;
        }

        $wilayah = '';

        if ($kecamatan) {
            $wilayah .= ",
                `kecamatan_id` INT(10) UNSIGNED NULL,
                INDEX `idx_{$table}_kecamatan` (`kecamatan_id`)";
        }

        if ($kelurahan) {
            $wilayah .= ",
                `kelurahan_id` INT(10) UNSIGNED NULL,
                INDEX `idx_{$table}_kelurahan` (`kelurahan_id`)";
        }

        $sql = "
            CREATE TABLE `{$table}` (
                `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                `tahun` VARCHAR(50) NULL,
                {$this->kolomWilayah($kecamatan, $kelurahan)}
                `nama_kegiatan` VARCHAR(255) NULL,
                `waktu_kegiatan` DATE NULL,
                `peserta` VARCHAR(255) NULL,
                `hasil_pelaksanaan` TEXT NULL,
                `anggaran` BIGINT UNSIGNED NULL,
                `sumber_pendanaan` VARCHAR(100) NULL,
                `link_drive` TEXT NULL,
                `data_dukung` TEXT NULL,
                `data_rencana` TEXT NULL,
                `tanggal` DATE NULL,
                `lokasi` VARCHAR(255) NULL,
                `keterangan` TEXT NULL,
                `created_at` DATETIME NULL,
                `updated_at` DATETIME NULL,
                PRIMARY KEY (`id`)
            )
            ENGINE=InnoDB
            DEFAULT CHARSET=utf8mb4
            COLLATE=utf8mb4_general_ci
        ";

        $db->query($sql);
    }


    private function kolomWilayah(
        bool $kecamatan,
        bool $kelurahan
    ): string {
        $hasil = '';

        if ($kecamatan) {
            $hasil .= "
                `kecamatan_id` INT(10) UNSIGNED NULL,
            ";
        }

        if ($kelurahan) {
            $hasil .= "
                `kelurahan_id` INT(10) UNSIGNED NULL,
            ";
        }

        return $hasil;
    }
}