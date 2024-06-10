<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PenilaianKaryawan extends BaseController
{
    public function index()
    {
        return view('penilaian_karyawan');
    }
}
