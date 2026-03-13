<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function loginForm()
    {
        // If already logged in, redirect to dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'userId' => $user['id'],
                'userName' => $user['nama'],
                'userEmail' => $user['email'],
                'username' => $user['username'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to(base_url('dashboard'));
        }

        return redirect()->to(base_url('login'))
            ->with('errors', 'Username atau password salah.')
            ->withInput();
    }

    public function registerForm()
    {
        // If already logged in, redirect to dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('register');
    }

    public function register()
    {
        $userModel = new UserModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        // Validate
        if (!$userModel->validate($data)) {
            return redirect()->to(base_url('register'))
                ->with('errors', $userModel->errors())
                ->withInput();
        }

        // Validate password confirmation
        $passwordConfirm = $this->request->getPost('password_confirm');
        if ($data['password'] !== $passwordConfirm) {
            return redirect()->to(base_url('register'))
                ->with('errors', ['password_confirm' => 'Konfirmasi password tidak cocok.'])
                ->withInput();
        }

        // Hash password & save
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $userModel->insert($data);

        return redirect()->to(base_url('login'))
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
