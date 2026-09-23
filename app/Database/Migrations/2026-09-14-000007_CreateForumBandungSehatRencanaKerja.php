<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateForumBandungSehatRencanaKerja extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('forum_bandung_sehat_rencana_kerja')) {
            return;
        }

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
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
        $this->forge->createTable('forum_bandung_sehat_rencana_kerja');
    }

    public function down()
    {
        if ($this->db->tableExists('forum_bandung_sehat_rencana_kerja')) {
            $this->forge->dropTable(
                'forum_bandung_sehat_rencana_kerja',
                true
            );
        }
    }
}