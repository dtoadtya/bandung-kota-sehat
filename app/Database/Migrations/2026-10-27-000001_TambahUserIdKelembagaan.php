<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahUserIdKelembagaan extends Migration
{
    private array $tables = [
        // Tim Pembina
        'tim_pembina_sk',
        'tim_pembina_rencana_kerja',
        'tim_pembina_realisasi',
        'tim_pembina_foto',

        // Forum Bandung Sehat
        'forum_bandung_sehat_sk',
        'forum_bandung_sehat_rencana_kerja',
        'forum_bandung_sehat_realisasi',
        'forum_bandung_sehat_foto',

        // Forum Kecamatan Sehat
        'forum_kecamatan_sk',
        'forum_kecamatan_sehat_rencana_kerja',
        'forum_kecamatan_sehat_realisasi',
        'forum_kecamatan_sehat_foto',

        // Pokja Kelurahan Sehat
        'pokja_kelurahan_sehat_sk',
        'pokja_kelurahan_sehat_rencana_kerja',
        'pokja_kelurahan_sehat_realisasi',
        'pokja_kelurahan_sehat_foto',
    ];

    public function up()
    {
        foreach ($this->tables as $table) {

            if (!$this->db->tableExists($table)) {
                continue;
            }

            if (!$this->db->fieldExists('user_id', $table)) {
                $this->forge->addColumn($table, [
                    'user_id' => [
                        'type'       => 'INT',
                        'constraint' => 11,
                        'unsigned'   => true,
                        'null'       => true,
                    ],
                ]);
            }
        }
    }

    public function down()
    {
        foreach ($this->tables as $table) {

            if (!$this->db->tableExists($table)) {
                continue;
            }

            if ($this->db->fieldExists('user_id', $table)) {
                $this->forge->dropColumn($table, 'user_id');
            }
        }
    }
}
