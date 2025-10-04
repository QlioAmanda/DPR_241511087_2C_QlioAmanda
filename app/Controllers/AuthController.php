<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $penggunaModel = new PenggunaModel();
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $penggunaModel->where('username', $username)->first();

        if ($user) {
            $hashedPassword = $user['password'];
            if (password_verify($password, $hashedPassword)) {
                $sessionData = [
                    'id_pengguna'   => $user['id_pengguna'],
                    'username'      => $user['username'],
                    'nama_depan'    => $user['nama_depan'],
                    'role'          => $user['role'], // Pastikan ini dari DB
                    'logged_in'     => TRUE
                ];
                $session->set($sessionData);

                // Pesan sukses yang jelas
                return redirect()->to('/dashboard')->with('success', 'Login berhasil sebagai ' . $user['role']);
            }
        }

        return redirect()->back()->with('error', 'Login gagal! Username atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah berhasil logout.');
    }
}