<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        $session = session();
        // Periksa apakah pengguna sudah login
        if ($session->get('logged_in')) {
            // Jika sudah login, arahkan ke halaman dashboard atau halaman lain yang sesuai
            return redirect()->to('/dashboard');
        }

        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'username'    => $data['username'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Username atau Password Anda salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username atau Password Anda salah');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
