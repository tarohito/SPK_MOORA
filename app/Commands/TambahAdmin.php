<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\UserModel;

class TambahAdmin extends BaseCommand
{
    protected $usage = 'tambah:admin [arguments] [options]';

    protected $arguments = [];

    protected $options = [];

    protected $group       = 'Custom Commands';
    protected $name        = 'tambah:admin';
    protected $description = 'Tambah admin ke tabel users co';

    public function run(array $params)
    {
        $model = new UserModel();

        // Ambil input dari pengguna
        $username = CLI::prompt('Masukkan username:');
        $password = CLI::prompt('Masukkan password:');

        // Verifikasi jika username sudah ada
        if ($model->where('username', $username)->first() == null) {
            $data = [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                // Tambahkan kolom atau data lain sesuai kebutuhan
            ];

            // Simpan ke database
            $model->insert($data);

            echo "Admin berhasil ditambahkan!\n";
        } else {
            echo "Username sudah ada. Coba dengan username lain.\n";
        }
    }
}
