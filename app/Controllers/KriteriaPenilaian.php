<?php

namespace App\Controllers;

use App\Models\KriteriaModel;

class KriteriaPenilaian extends BaseController
{
    public function index()
    {
        $model = new KriteriaModel();
        $data['kriteria'] = $model->findAll();

        return view('kriteria_penilaian', $data);
    }

    public function store()
    {
        $model = new KriteriaModel();

        $data = [
            'kode_kriteria' => $this->request->getPost('kode_kriteria'),
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot' => $this->request->getPost('bobot'),
            'jenis' => $this->request->getPost('jenis')
        ];

        $model->insert($data);

        // Perbaikan pada pengalihan (redirect) setelah menyimpan data
        return redirect()->to('/kriteria_penilaian');
    }

    public function update()
    {
        $model = new KriteriaModel();

        $data = [
            'kode_kriteria' => $this->request->getPost('kode_kriteria'),
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot' => $this->request->getPost('bobot'),
            'jenis' => $this->request->getPost('jenis')
        ];

        $id = $this->request->getPost('id');

        $model->update($id, $data);

        return redirect()->to(base_url('kriteria_penilaian'));
    }

    public function delete($id)
    {
        $model = new KriteriaModel();
        $model->delete($id);
        return redirect()->to(base_url('kriteria_penilaian'));
    }
}
