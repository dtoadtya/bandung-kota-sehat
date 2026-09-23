<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTimPembinaRealisasi extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('tim_pembina_realisasi')) {
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
            'nama_kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'waktu_kegiatan' => [
                'type'       => 'DATE',
                'null'       => true,
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
        $this->forge->addKey('tahun');

        $this->forge->createTable('tim_pembina_realisasi');
    }

    public function down()
    {
        if ($this->db->tableExists('tim_pembina_realisasi')) {
            $this->forge->dropTable('tim_pembina_realisasi', true);
        }
    }
}