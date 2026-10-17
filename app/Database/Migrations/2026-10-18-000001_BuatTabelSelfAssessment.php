<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatTabelSelfAssessment extends Migration
{
    public function up()
    {

        if ($this->db->tableExists('self_assessment')) {
            return;
        }

        $this->forge->addField([

            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'modul' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
            ],

            'nilai' => [
                'type'       => 'DECIMAL',
                'constraint' => [5, 2],
                'default'    => 0,
            ],

            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'sementara',
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

        $this->forge->addUniqueKey([
            'user_id',
            'modul',
        ]);

        $this->forge->createTable(
            'self_assessment',
            true
        );
    }

    public function down()
    {
        $this->forge->dropTable(
            'self_assessment',
            true
        );
    }
}
