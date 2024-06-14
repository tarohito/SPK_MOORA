<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KaryawanModel;
use App\Models\KriteriaModel;
use App\Models\PenilaianKaryawanM;
use App\Models\SubKriteriaM;

class PenilaianKaryawan extends BaseController
{
    public function index()
    {
        $uri = service('uri');

        $PenilaianKaryawanM = new PenilaianKaryawanM();
        $karyawanModel = new KaryawanModel();
        $subkriteriaModel = new SubKriteriaM();
        $kriteriaModel = new KriteriaModel();

        $kriteria = $kriteriaModel->findAll();

        $builder = $PenilaianKaryawanM
            ->select('penilaian_karyawan.*, karyawan.name')
            ->join('karyawan', 'karyawan.id = penilaian_karyawan.karyawan_id');

        foreach ($kriteria as $index => $k) {
            $alias = 'sk' . ($index + 1);
            $column = 'k' . ($index + 1);
            $builder = $builder->join("sub_kriteria as $alias", "$alias.nilai = penilaian_karyawan.$column AND $alias.kriteria_id = {$k['id']}", 'left')
            ->select("$alias.keterangan as {$column}_ket");
        }

        $data['penilaian_karyawan'] = $builder->findAll();

        $data['karyawan'] = $karyawanModel->orderBy('name', 'ASC')->findAll();
        $data['sub_kriteria'] = $subkriteriaModel->ambilNamaAndKodeDariKriteria();
        $data['kriteria'] = $kriteria;

        $data['uri'] = $uri;

        return view('penilaian_karyawan', $data);
    }



    public function store()
    {
        $PenilaianKaryawanM = new PenilaianKaryawanM();

        $validation = \Config\Services::validation();

        $data = [
            'karyawan_id' => $this->request->getPost('karyawan_id'),
            'k1' => $this->request->getPost('k1'),
            'k2' => $this->request->getPost('k2'),
            'k3' => $this->request->getPost('k3'),
            'k4' => $this->request->getPost('k4'),
            'k5' => $this->request->getPost('k5'),
        ];

        $validation->setRules([
            'karyawan_id' => 'required',
            'k1' => 'required',
            'k2' => 'required',
            'k3' => 'required',
            'k4' => 'required',
            'k5' => 'required|numeric',
        ]);

        if ($validation->run($data)) {
            $PenilaianKaryawanM->save($data);
            return redirect()->to('penilaian_karyawan')->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    }



    public function update()
    {
        $PenilaianKaryawanM = new PenilaianKaryawanM();

        $data = [
            'karyawan_id' => $this->request->getPost('edit_karyawan_id'),
            'k1' => $this->request->getPost('edit_sub_kriteria[K1]') ?? null,
            'k2' => $this->request->getPost('edit_sub_kriteria[K2]') ?? null,
            'k3' => $this->request->getPost('edit_sub_kriteria[K3]') ?? null,
            'k4' => $this->request->getPost('edit_sub_kriteria[K4]') ?? null,
            'k5' => $this->request->getPost('k5') ?? null,
        ];

        $id = $this->request->getPost('id');

        $PenilaianKaryawanM->update($id, $data);

        return redirect()->to(base_url('penilaian_karyawan'));
    }


    public function delete($id)
    {
        $a = new PenilaianKaryawanM();
        $a->delete($id);
        return redirect()->to(base_url('penilaian_karyawan'));
    }
}
