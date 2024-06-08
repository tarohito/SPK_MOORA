<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $data = [];
        for ($i = 1; $i <= 5; $i++) {
            $data[] = [
                'kode_kriteria' => $faker->numberBetween(0, 100),
                'nama_kriteria' => $faker->cityPrefix,
                'bobot' => $faker->randomFloat(null, 1, 9),
                'jenis' => $faker->randomElement(['Benefit', 'Cost']),
            ];
        }

        $db = \Config\Database::connect();

        $db->table('kriteria')->insertBatch($data);
    }
}
