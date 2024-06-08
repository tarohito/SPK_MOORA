<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'bobot' => [
                'type' => 'FLOAT',
                'constraint' => '5,2',
            ],
            'jenis' => [
                'type' => 'ENUM ("Benefit", "Cost")',
                'default' => 'Benefit',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('kriteria');
    }

    public function down()
    {
        $this->forge->dropTable('kriteria');
    }
}
