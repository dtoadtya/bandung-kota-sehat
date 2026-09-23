<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateForumKecamatanSehatRealisasi extends Migration
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

            'nama_kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'waktu_kegiatan' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'peserta' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'hasil_pelaksanaan' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'anggaran' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0,
            ],

            'sumber_pendanaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'link_drive' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'data_dukung' => [
                'type' => 'TEXT',
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

        $this->forge->createTable(
            'forum_kecamatan_sehat_realisasi'
        );
    }

    public function down()
    {
        $this->forge->dropTable(
            'forum_kecamatan_sehat_realisasi',
            true
        );
    }
}