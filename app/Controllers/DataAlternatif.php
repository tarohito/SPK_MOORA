<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DataAlternatif extends BaseController
{
    public function index()
    {
        return view('data_alternatif');
    }
}
