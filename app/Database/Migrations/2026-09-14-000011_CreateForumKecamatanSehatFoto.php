<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateForumKecamatanSehatFoto extends Migration
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

            'nama_file' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'nama_asli' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'file_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
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

        $this->forge->createTable(
            'forum_kecamatan_sehat_foto'
        );
    }

    public function down()
    {
        $this->forge->dropTable(
            'forum_kecamatan_sehat_foto',
            true
        );
    }
}