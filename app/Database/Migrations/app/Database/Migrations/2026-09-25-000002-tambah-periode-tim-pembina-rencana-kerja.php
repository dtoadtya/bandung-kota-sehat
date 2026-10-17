<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahPeriodeTimPembinaRencanaKerja extends Migration
{
    public function up()
    {
        if (
            $this->db->tableExists(
                'tim_pembina_rencana_kerja'
            )
        ) {
            $fields = $this->db
                ->getFieldNames(
                    'tim_pembina_rencana_kerja'
                );

            if (!in_array('periode', $fields, true)) {
                $this->forge->addColumn(
                    'tim_pembina_rencana_kerja',
                    [
                        'periode' => [
                            'type'       => 'VARCHAR',
                            'constraint' => 20,
                            'null'       => false,
                            'default'    => 'ganjil',
                            'after'      => 'tahun',
                        ],
                    ]
                );
            }
        }
    }

    public function down()
    {
        if (
            $this->db->tableExists(
                'tim_pembina_rencana_kerja'
            )
        ) {
            $fields = $this->db
                ->getFieldNames(
                    'tim_pembina_rencana_kerja'
                );

            if (in_array('periode', $fields, true)) {
                $this->forge->dropColumn(
                    'tim_pembina_rencana_kerja',
                    'periode'
                );
            }
        }
    }
}