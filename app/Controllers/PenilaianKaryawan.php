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

        $data['penilaian_karyawan'] = $PenilaianKaryawanM
            ->select('penilaian_karyawan.*, karyawan.name')
            ->join('karyawan', 'karyawan.id = penilaian_karyawan.karyawan_id')
            ->findAll();

        $data['penilaian_karyawan'] = $PenilaianKaryawanM->getPenilaianKaryawan();
        $data['karyawan'] = $karyawanModel->orderBy('name', 'ASC')->findAll();
        $data['sub_kriteria'] = $subkriteriaModel->ambilNamaAndKodeDariKriteria();
        $data['kriteria'] = $kriteriaModel->findAll();

        $data['uri'] = $uri;

        return view('penilaian_karyawan', $data);
    }

    public function store()
    {
        $PenilaianKaryawanM = new PenilaianKaryawanM();

        $data = [
            'karyawan_id' => $this->request->getPost('karyawan_id'),
            'k1' => $this->request->getPost('sub_kriteria[K1]') ?? null,
            'k2' => $this->request->getPost('sub_kriteria[K2]') ?? null,
            'k3' => $this->request->getPost('sub_kriteria[K3]') ?? null,
            'k4' => $this->request->getPost('sub_kriteria[K4]') ?? null,
            'k5' => $this->request->getPost('sub_kriteria[K5]') ?? null,
        ];

        $PenilaianKaryawanM->save($data);

        return redirect()->to('penilaian_karyawan');
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
            'k5' => $this->request->getPost('edit_sub_kriteria[K5]') ?? null,
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
