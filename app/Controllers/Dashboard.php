<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\KriteriaModel;
use App\Models\PenilaianKaryawanM;
use App\Models\SubKriteriaM; // ⬅️ Tambahkan ini

class Dashboard extends BaseController
{
    public function index()
    {
        $uri = service('uri');

        // Instance model
        $karyawanModel = new KaryawanModel();
        $kriteriaModel = new KriteriaModel();
        $penilaianModel = new PenilaianKaryawanM();
        $subKriteriaModel = new SubKriteriaM(); // ⬅️ Tambahkan ini

        // Hitung total data
        $totalKaryawan = $karyawanModel->countAll();
        $totalKriteria = $kriteriaModel->countAll();
        $totalPenilaian = $penilaianModel->countAll();
        $totalSubKriteria = $subKriteriaModel->getTotalSubKriteria(); // ⬅️ Panggil fungsi ini dari model

        return view('dashboard', [
            'totalKaryawan'     => $totalKaryawan,
            'totalKriteria'     => $totalKriteria,
            'totalPenilaian'    => $totalPenilaian,
            'totalSubKriteria'  => $totalSubKriteria, // ⬅️ Kirim ke view
            'uri'               => $uri
        ]);
    }

    public function profil(): string
    {
        return view('profil');
    }
}
