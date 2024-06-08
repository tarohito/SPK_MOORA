<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use Faker\Core\Number;

class DataKaryawan extends BaseController
{
    public function index()
    {
        try {
            $uri = service('uri');
            $karyawanModel = new KaryawanModel();
            $data['karyawan'] = $karyawanModel->findAll();
            $data['uri'] = $uri;

            return view('data_karyawan', $data);
        } catch (\Exception $e) {
            $uri = service('uri');
            // Tangani error dengan menampilkan pesan error dalam view
            $errorMessage = $e->getMessage();
            return view('data_karyawan', ['errorMessage' => $errorMessage, 'uri' => $uri]);
        }
    }

    public function store()
    {
        // Validasi input (opsional)
        $validationRules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[karyawan.email]',
            'alamat' => 'required',
            'no_hp' => 'required',
            'divisi' => 'required'
        ];

        $validationMessages = [
            'email.is_unique' => 'Email sudah terdaftar dalam database.'
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            // Jika validasi gagal, kembalikan ke halaman formulir dengan pesan kesalahan
            return redirect()->to(base_url('data_karyawan'))->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data ke database (misalnya menggunakan model)
        $karyawanModel = new KaryawanModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'divisi' => $this->request->getPost('divisi')
        ];
        $karyawanModel->insert($data);

        // Redirect ke halaman sukses atau halaman lain yang Anda inginkan
        return redirect()->to(base_url('data_karyawan'))->with('success', 'Data karyawan berhasil disimpan.');
    }

    public function success()
    {
        // Tampilkan halaman sukses
        return view('data_karyawan');
    }

    public function delete($id)
    {
        $news = new karyawanModel();
        $news->delete($id);
        return redirect()->to(base_url('data_karyawan'));
    }

    public function edit($id)
    {
        try {
            $karyawanModel = new KaryawanModel();
            $data['karyawan'] = $karyawanModel->find($id);

            if (!$data['karyawan']) {
                // Jika data tidak ditemukan, tampilkan pesan error atau redirect ke halaman lain
                return redirect()->to(base_url('data_karyawan'))->with('error', 'Data karyawan tidak ditemukan.');
            }

            return view('data_karyawan', $data);
        } catch (\Exception $e) {
            // Tangani error dengan menampilkan pesan error dalam view
            $errorMessage = $e->getMessage();
            return view('data_karyawan', ['errorMessage' => $errorMessage]);
        }
    }

    public function update($id)
    {
        // Validasi input (opsional)
        $validationRules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'alamat' => 'required',
            'no_hp' => 'required',
            'divisi' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan ke halaman edit dengan pesan kesalahan
            return redirect()->to(base_url("data_karyawan/update/$id"))->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data ke database (misalnya menggunakan model)
        $karyawanModel = new KaryawanModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'divisi' => $this->request->getPost('divisi')
        ];
        $karyawanModel->update($id, $data);

        // Redirect ke halaman sukses atau halaman lain yang Anda inginkan
        return redirect()->to(base_url('data_karyawan'))->with('success', 'Data karyawan berhasil diperbarui.');
    }
}
