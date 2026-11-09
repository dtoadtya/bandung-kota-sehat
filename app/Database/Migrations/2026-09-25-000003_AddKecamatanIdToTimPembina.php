<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKecamatanIdToTimPembina extends Migration
{
    public function up()
    {
        /*
         * Tambahkan kecamatan_id jika belum ada.
         */
        if (
            !$this->db->fieldExists(
                'kecamatan_id',
                'tim_pembina'
            )
        ) {

            $this->forge->addColumn(
                'tim_pembina',
                [
                    'kecamatan_id' => [
                        'type'       => 'INT',
                        'constraint' => 11,
                        'null'       => true,
                        'after'      => 'id',
                    ],
                ]
            );
        }


        /*
         * Tambahkan index hanya jika belum ada.
         *
         * Ini dibuat aman supaya migration tidak
         * gagal karena index sudah pernah dibuat.
         */
        $indexes = $this->db
            ->getIndexData('tim_pembina');

        $indexExists = false;

        foreach ($indexes as $index) {

            if (
                isset($index->name)
                &&
                $index->name ===
                'idx_tim_pembina_kecamatan_id'
            ) {

                $indexExists = true;

                break;
            }
        }


        if (!$indexExists) {

            $this->db->query(
                'ALTER TABLE `tim_pembina`
                 ADD INDEX
                 `idx_tim_pembina_kecamatan_id`
                 (`kecamatan_id`)'
            );
        }
    }


    public function down()
    {
        /*
         * Hapus index jika ada.
         */
        $indexes = $this->db
            ->getIndexData('tim_pembina');

        foreach ($indexes as $index) {

            if (
                isset($index->name)
                &&
                $index->name ===
                'idx_tim_pembina_kecamatan_id'
            ) {

                $this->db->query(
                    'ALTER TABLE `tim_pembina`
                     DROP INDEX
                     `idx_tim_pembina_kecamatan_id`'
                );

                break;
            }
        }


        /*
         * Hapus kolom jika ada.
         */
        if (
            $this->db->fieldExists(
                'kecamatan_id',
                'tim_pembina'
            )
        ) {

            $this->forge->dropColumn(
                'tim_pembina',
                'kecamatan_id'
            );
        }
    }
}