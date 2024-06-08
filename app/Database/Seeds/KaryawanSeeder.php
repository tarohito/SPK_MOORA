<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $data = [];
        for ($i = 1; $i <= 63; $i++) {
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'alamat' => $faker->address,
                'no_hp' => $faker->phoneNumber,
                'divisi' =>$faker->jobTitle,
            ];
        }

        // Mendapatkan instance dari database
        $db = \Config\Database::connect();

        // Menyimpan data ke dalam tabel karyawan
        $db->table('karyawan')->insertBatch($data);
    }
}
