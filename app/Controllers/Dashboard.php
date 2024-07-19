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

        // Menampilkan view dengan data total karyawan
        return view('dashboard', ['totalKaryawan' => $totalKaryawan, 'uri' => $uri]);

        $KriteriaModel = new KriteriaModel();

        $totalKriteria = $KriteriaModel->countAll();

        return view('dashboard', ['totalKriteria' => $totalKriteria, 'uri' => $uri]);
    }

    public function profil(): string
    {
        return view('profil');
    }
}
