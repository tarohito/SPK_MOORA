<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hasil extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'karyawan_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'k1' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'k2' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'k3' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'k4' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'k5' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
