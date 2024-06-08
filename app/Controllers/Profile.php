<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->getUser(session()->get('id')); // Mengambil data pengguna berdasarkan ID pengguna yang sedang login

        return view('profil', ['user' => $user]);
    }

    public function edit()
    {
        $userModel = new UserModel();
        $user = $userModel->getUser(session()->get('id'));

        return view('edit_profil', ['users' => $user]);
    }

    public function update()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $userModel->update(session()->get('id'), $data);

        return redirect()->to('/profil')->with('success', 'Profile berhasil diperbarui');
    }
}
