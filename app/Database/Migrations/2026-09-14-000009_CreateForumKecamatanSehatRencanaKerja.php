<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateForumKecamatanSehatRencanaKerja extends Migration
{
    public function up()
    {
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
        $this->forge->addUniqueKey([
            'kecamatan_id',
            'tahun',
        ]);

        $this->forge->createTable('forum_kecamatan_sehat_rencana_kerja');
    }

    public function down()
    {
        $this->forge->dropTable(
            'forum_kecamatan_sehat_rencana_kerja',
            true
        );
    }
}