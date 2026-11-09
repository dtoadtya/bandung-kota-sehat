<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahFileTimPembinaRencanaKerja extends Migration
{
    private array $fileFields = [
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
            'constraint' => 10,
            'unsigned'   => true,
            'null'       => false,
            'default'    => 0,
        ],
    ];

    public function up()
    {
        if (
            !$this->db->tableExists(
                'tim_pembina_rencana_kerja'
            )
        ) {
            return;
        }

        $fields = $this->db->getFieldNames(
            'tim_pembina_rencana_kerja'
        );

        $add = [];

        foreach ($this->fileFields as $name => $definition) {
            if (!in_array($name, $fields, true)) {
                $add[$name] = $definition;
            }
        }

        if ($add !== []) {
            $this->forge->addColumn(
                'tim_pembina_rencana_kerja',
                $add
            );
        }
    }

    public function down()
    {
        if (
            !$this->db->tableExists(
                'tim_pembina_rencana_kerja'
            )
        ) {
            return;
        }

        $fields = $this->db->getFieldNames(
            'tim_pembina_rencana_kerja'
        );

        foreach ($this->fileFields as $name => $definition) {
            if (in_array($name, $fields, true)) {
                $this->forge->dropColumn(
                    'tim_pembina_rencana_kerja',
                    $name
                );
            }
        }
    }
}
