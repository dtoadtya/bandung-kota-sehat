<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahStatusVerifikasiSk extends Migration
{
    private array $tables = [
        'tim_pembina_sk',
        'forum_bandung_sehat_sk',
        'forum_kecamatan_sk',
        'pokja_kelurahan_sehat_sk',
    ];

    private array $columns = [
        'status' => [
            'type'       => 'VARCHAR',
            'constraint' => 20,
            'default'    => 'pending',
            'null'       => true,
        ],

        'keterangan_penolakan' => [
            'type' => 'TEXT',
            'null' => true,
        ],

        'verified_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],

        'verified_by' => [
            'type'       => 'INT',
            'constraint' => 11,
            'unsigned'   => true,
            'null'       => true,
        ],
    ];

    public function up()
    {
        foreach ($this->tables as $table) {

            if (!$this->db->tableExists($table)) {
                continue;
            }

            foreach ($this->columns as $name => $definition) {

                if (!$this->db->fieldExists($name, $table)) {
                    $this->forge->addColumn($table, [
                        $name => $definition,
                    ]);
                }
            }
        }
    }

    public function down()
    {
        foreach ($this->tables as $table) {

            if (!$this->db->tableExists($table)) {
                continue;
            }

            foreach (array_keys($this->columns) as $name) {

                if ($this->db->fieldExists($name, $table)) {
                    $this->forge->dropColumn($table, $name);
                }
            }
        }
    }
}
