<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateForumKecamatanSk extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('forum_kecamatan_sk')) {
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

            'no_sk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'periode' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
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
                'constraint' => 11,
                'null'       => true,
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

        $this->forge->createTable('forum_kecamatan_sk');
    }

    public function down()
    {
        if ($this->db->tableExists('forum_kecamatan_sk')) {
            $this->forge->dropTable('forum_kecamatan_sk', true);
        }
    }
}