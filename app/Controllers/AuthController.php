<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Contoh cek login hardcode (nanti bisa ganti query DB)
        if ($username === 'admin' && $password === 'admin123') {
            session()->set([
                'logged_in' => true,
                'role'      => 'admin',
                'username'  => $username,
            ]);
            return redirect()->to('/dashboard');
        }

        if ($username === 'citizen' && $password === 'citizen123') {
            session()->set([
                'logged_in' => true,
                'role'      => 'client',
                'username'  => $username,
            ]);
            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Login gagal, cek username & password!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
