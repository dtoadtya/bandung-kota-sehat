<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTimPembinaSk extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('tim_pembina_sk')) {
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
                'constraint' => 500,
            ],

            'ukuran_file' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
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
        $this->forge->addKey('kecamatan_id');

        $this->forge->createTable(
            'tim_pembina_sk',
            true
        );
    }

    public function down()
    {
        if ($this->db->tableExists('tim_pembina_sk')) {
            $this->forge->dropTable(
                'tim_pembina_sk',
                true
            );
        }
    }
}