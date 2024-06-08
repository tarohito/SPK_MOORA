<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_kriteria' => 'K1',
                'nama_kriteria' => 'Sikap dan Etika Kerja',
                'bobot' => '0.25',
                'jenis' => 'Benefit',
            ],
            [
                'kode_kriteria' => 'K2',
                'nama_kriteria' => 'Absensi',
                'bobot' => '0.15',
                'jenis' => 'Cost',
            ],
            [
                'kode_kriteria' => 'K3',
                'nama_kriteria' => 'Target Pekerjaan',
                'bobot' => '0.30',
                'jenis' => 'Benefit',
            ],
            [
                'kode_kriteria' => 'K4',
                'nama_kriteria' => 'Inisiatif Pekerjaan',
                'bobot' => '0.20',
                'jenis' => 'Benefit',
            ],
            [
                'kode_kriteria' => 'K5',
                'nama_kriteria' => 'Lama Kerja',
                'bobot' => '0.1',
                'jenis' => 'Benefit',
            ]
        ];

        $db = \Config\Database::connect();

        $db->table('kriteria')->insertBatch($data);
    }
}
