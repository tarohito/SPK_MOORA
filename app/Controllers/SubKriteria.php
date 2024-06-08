<?php

namespace App\Controllers;

use App\Database\Migrations\Kriteria;
use App\Models\KriteriaModel;
use App\Models\SubKriteriaM;

class SubKriteria extends BaseController
{
    public function index()
    {
        $uri = service('uri');
        $SubKriteriaM = new SubKriteriaM();
        $data['sub_kriteria'] = $SubKriteriaM->select('sub_kriteria.*, kriteria.nama_kriteria')
        ->join('kriteria', 'kriteria.id = sub_kriteria.kriteria_id')
        ->findAll();

        $kriteria = new KriteriaModel();
        $data['kriteria'] = $kriteria->findAll();
        $data['uri'] = $uri;

        return view('sub_kriteria', $data);
    }

    public function store()
    {
        $SubKriteriaM = new SubKriteriaM();

        $data = [
            'kriteria_id' => $this->request->getPost('kriteria_id'),
            'keterangan' => $this->request->getPost('keterangan'),
            'nilai' => $this->request->getPost('nilai')
        ];

        $SubKriteriaM->save($data);

        return redirect()->to('/sub_kriteria');
    }

    public function update()
    {
        $SubKriteriaM = new SubKriteriaM();

        $data = [
            'kriteria_id' => $this->request->getPost('kriteria_id'),
            'keterangan' => $this->request->getPost('keterangan'),
            'nilai' => $this->request->getPost('nilai')
        ];

        $id = $this->request->getPost('id');

        $SubKriteriaM->update($id, $data);

        return redirect()->to(base_url('sub_kriteria'));
    }

    public function delete($id)
    {
        $a = new SubKriteriaM();
        $a->delete($id);
        return redirect()->to(base_url('sub_kriteria'));
    }
}
