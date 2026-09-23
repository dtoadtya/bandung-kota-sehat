<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTimPembinaRencanaKerja extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('tim_pembina_rencana_kerja')) {
            return;
        }

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'kecamatan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'data_rencana' => [
                'type' => 'LONGTEXT',
                'null' => true,
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
        $this->forge->addKey('kecamatan_id');
        $this->forge->addKey('tahun');

        $this->forge->createTable(
            'tim_pembina_rencana_kerja',
            true
        );
    }

    public function down()
    {
        if (
            $this->db->tableExists(
                'tim_pembina_rencana_kerja'
            )
        ) {
            $this->forge->dropTable(
                'tim_pembina_rencana_kerja',
                true
            );
        }
    }
}