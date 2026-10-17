<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UbahTimPembinaRencanaKerja extends Migration
{
    public function up()
    {
        /*
         * Jika tabel lama masih memiliki foreign key
         * kecamatan_id, hapus terlebih dahulu.
         */
        $foreignKeys = $this->db->getForeignKeyData(
            'tim_pembina_rencana_kerja'
        );

        foreach ($foreignKeys as $foreignKey) {
            if (
                isset($foreignKey->constraint_name)
                && $foreignKey->constraint_name
            ) {
                try {
                    $this->db->query(
                        "ALTER TABLE `tim_pembina_rencana_kerja`
                         DROP FOREIGN KEY `{$foreignKey->constraint_name}`"
                    );
                } catch (\Throwable $e) {
                    // Abaikan jika foreign key tidak ditemukan.
                }
            }
        }

        /*
         * Hapus tabel lama.
         */
        if ($this->db->tableExists('tim_pembina_rencana_kerja')) {
            $this->forge->dropTable(
                'tim_pembina_rencana_kerja',
                true
            );
        }

        /*
         * Buat tabel baru.
         */
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],

            'nama_file' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],

            'nama_asli' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],

            'file_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => false,
            ],

            'ukuran_file' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
                'null'       => false,
                'default'    => 0,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable(
            'tim_pembina_rencana_kerja',
            true
        );
    }

    public function down()
    {
        if ($this->db->tableExists('tim_pembina_rencana_kerja')) {
            $this->forge->dropTable(
                'tim_pembina_rencana_kerja',
                true
            );
        }
    }
}