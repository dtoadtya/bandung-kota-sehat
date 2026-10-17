<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PerbaikiKecamatanIdTimPembinaKegiatan extends Migration
{
    public function up()
    {
        /*
         * Tim Pembina Rencana Kerja
         * kecamatan_id dibuat nullable karena
         * form Tim Pembina tidak menggunakan Kecamatan.
         */
        if ($this->db->tableExists('tim_pembina_rencana_kerja')) {
            $this->db->query(
                "ALTER TABLE `tim_pembina_rencana_kerja`
                 MODIFY `kecamatan_id`
                 INT(10) UNSIGNED NULL"
            );
        }

        /*
         * Tim Pembina Realisasi
         * kecamatan_id dibuat nullable karena
         * form Tim Pembina tidak menggunakan Kecamatan.
         */
        if ($this->db->tableExists('tim_pembina_realisasi')) {
            $this->db->query(
                "ALTER TABLE `tim_pembina_realisasi`
                 MODIFY `kecamatan_id`
                 INT(10) UNSIGNED NULL"
            );
        }
    }

    public function down()
    {
        if ($this->db->tableExists('tim_pembina_rencana_kerja')) {
            $this->db->query(
                "ALTER TABLE `tim_pembina_rencana_kerja`
                 MODIFY `kecamatan_id`
                 INT(10) UNSIGNED NOT NULL"
            );
        }

        if ($this->db->tableExists('tim_pembina_realisasi')) {
            $this->db->query(
                "ALTER TABLE `tim_pembina_realisasi`
                 MODIFY `kecamatan_id`
                 INT(10) UNSIGNED NOT NULL"
            );
        }
    }
}