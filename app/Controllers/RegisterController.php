<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save()
    {
        // Include helper form
        helper(['form']);

        // Set rules validation form
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'password' => 'required|max_length[200]',
        ];

        // Validate form data
        if ($this->validate($rules)) {
            // Form data is valid, proceed with registration
            $model = new UserModel();

            // Get form data
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            // Check if username already exists
            if ($model->where('username', $username)->first() == null) {
                // Username is unique, proceed with registration
                $data = [
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                ];

                // Save user data to the database
                $model->save($data);

                // Redirect to login page after successful registration
                return redirect()->to('/login')->with('success', 'Registration successful! Please log in.');
            } else {
                // Username already exists, show error message
                return redirect()->to('/register')->withInput()->with('error', 'Username already exists. Please choose a different one.');
            }
        } else {
            // Form validation failed, show validation errors
            return view('register', [
                'validation' => $this->validator,
            ]);
        }
    }
}
