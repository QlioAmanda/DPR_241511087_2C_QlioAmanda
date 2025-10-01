<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Kalau sudah login → jangan bisa akses login page lagi
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        // login pakai layout auth (tanpa sidebar)
        return view('layouts/auth', [
            'page' => view('auth/login')
        ]);
    }

    public function attempt()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'   => $user['user_id'],
                'username'  => $user['username'],
                'full_name' => $user['full_name'],
                'role'      => $user['role'],
                'logged_in' => true
            ]);

            return redirect()->to('/');
        }

        // kalau gagal
        session()->setFlashdata('error', '⚠️ Username atau password salah.');
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}