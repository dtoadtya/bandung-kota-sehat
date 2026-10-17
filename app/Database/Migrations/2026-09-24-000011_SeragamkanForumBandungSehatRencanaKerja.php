<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeragamkanForumBandungSehatRencanaKerja extends Migration
{
    public function up()
    {
        $table = 'forum_bandung_sehat_rencana_kerja';

        if (!$this->db->tableExists($table)) {
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Nama Kegiatan
        |--------------------------------------------------------------------------
        */
        if (!$this->db->fieldExists('nama_kegiatan', $table)) {
            $this->forge->addColumn($table, [
                'nama_kegiatan' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'tahun',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Waktu Kegiatan
        |--------------------------------------------------------------------------
        */
        if (!$this->db->fieldExists('waktu_kegiatan', $table)) {
            $this->forge->addColumn($table, [
                'waktu_kegiatan' => [
                    'type' => 'DATE',
                    'null' => true,
                    'after' => 'nama_kegiatan',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Peserta
        |--------------------------------------------------------------------------
        */
        if (!$this->db->fieldExists('peserta', $table)) {
            $this->forge->addColumn($table, [
                'peserta' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'waktu_kegiatan',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Hasil Pelaksanaan
        |--------------------------------------------------------------------------
        */
        if (!$this->db->fieldExists('hasil_pelaksanaan', $table)) {
            $this->forge->addColumn($table, [
                'hasil_pelaksanaan' => [
                    'type'  => 'TEXT',
                    'null'  => true,
                    'after' => 'peserta',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Anggaran
        |--------------------------------------------------------------------------
        */
        if (!$this->db->fieldExists('anggaran', $table)) {
            $this->forge->addColumn($table, [
                'anggaran' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '15,2',
                    'default'    => '0.00',
                    'null'       => false,
                    'after'      => 'hasil_pelaksanaan',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Sumber Pendanaan
        |--------------------------------------------------------------------------
        */
        if (!$this->db->fieldExists('sumber_pendanaan', $table)) {
            $this->forge->addColumn($table, [
                'sumber_pendanaan' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                    'after'      => 'anggaran',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Link Drive
        |--------------------------------------------------------------------------
        */
        if (!$this->db->fieldExists('link_drive', $table)) {
            $this->forge->addColumn($table, [
                'link_drive' => [
                    'type'  => 'TEXT',
                    'null'  => true,
                    'after' => 'sumber_pendanaan',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Data Dukung
        |--------------------------------------------------------------------------
        */
        if (!$this->db->fieldExists('data_dukung', $table)) {
            $this->forge->addColumn($table, [
                'data_dukung' => [
                    'type'  => 'TEXT',
                    'null'  => true,
                    'after' => 'link_drive',
                ],
            ]);
        }
    }

    public function down()
    {
        $table = 'forum_bandung_sehat_rencana_kerja';

        if (!$this->db->tableExists($table)) {
            return;
        }

        $fields = [
            'nama_kegiatan',
            'waktu_kegiatan',
            'peserta',
            'hasil_pelaksanaan',
            'anggaran',
            'sumber_pendanaan',
            'link_drive',
            'data_dukung',
        ];

        foreach ($fields as $field) {
            if ($this->db->fieldExists($field, $table)) {
                $this->forge->dropColumn($table, $field);
            }
        }
    }
}