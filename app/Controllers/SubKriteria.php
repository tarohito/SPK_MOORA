<?php

namespace App\Controllers;

use App\Models\KriteriaModel;

class SubKriteria extends BaseController
{
    protected $kriteriaModel;

    public function __construct()
    {
        // Inisialisasi model KriteriaModel
        $this->kriteriaModel = new KriteriaModel();
    }

    public function index()
    {
        $uri = service('uri');
        // Mengambil data dari model KriteriaModel
        $data['kriteria'] = $this->kriteriaModel->getAll();
        $data['uri'] = $uri;

        // Menampilkan view 'sub_kriteria' dan melewatkan data kriteria ke view tersebut
        return view('sub_kriteria', $data);
    }
}
