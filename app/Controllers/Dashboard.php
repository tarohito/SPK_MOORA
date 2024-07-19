<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\KriteriaModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $uri = service('uri');

        // Instance model KaryawanModel
        $karyawanModel = new KaryawanModel();

        // Hitung jumlah data karyawan
        $totalKaryawan = $karyawanModel->countAll(); // Menghitung total karyawan

        // Instance model KriteriaModel
        $kriteriaModel = new KriteriaModel();

        // Hitung jumlah data kriteria
        $totalKriteria = $kriteriaModel->countAll(); // Menghitung total kriteria

        // Menampilkan view dengan data total karyawan dan total kriteria
        return view('dashboard', [
            'totalKaryawan' => $totalKaryawan,
            'totalKriteria' => $totalKriteria,
            'uri' => $uri
        ]);
    }

    public function profil(): string
    {
        return view('profil');
    }
}
