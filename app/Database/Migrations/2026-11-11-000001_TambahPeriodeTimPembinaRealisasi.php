<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahPeriodeTimPembinaRealisasi extends Migration
{
    public function up()
    {
        if (
            $this->db->tableExists(
                'tim_pembina_realisasi'
            )
        ) {
            $fields = $this->db
                ->getFieldNames(
                    'tim_pembina_realisasi'
                );

            if (!in_array('periode', $fields, true)) {
                $this->forge->addColumn(
                    'tim_pembina_realisasi',
                    [
                        'periode' => [
                            'type'       => 'ENUM',
                            'constraint' => [
                                'ganjil',
                                'genap',
                            ],
                            'null'    => false,
                            'default' => 'ganjil',
                            'after'   => 'tahun',
                        ],
                    ]
                );
            }

            /*
             * Konversi data lama:
             * tahun '1' -> ganjil
             * tahun '2' -> genap
             */
            $this->db
                ->table('tim_pembina_realisasi')
                ->where('tahun', '1')
                ->update(['periode' => 'ganjil']);

            $this->db
                ->table('tim_pembina_realisasi')
                ->where('tahun', '2')
                ->update(['periode' => 'genap']);
        }
    }

    public function down()
    {
        if (
            $this->db->tableExists(
                'tim_pembina_realisasi'
            )
        ) {
            $fields = $this->db
                ->getFieldNames(
                    'tim_pembina_realisasi'
                );

            if (in_array('periode', $fields, true)) {
                $this->forge->dropColumn(
                    'tim_pembina_realisasi',
                    'periode'
                );
            }
        }
    }
}
