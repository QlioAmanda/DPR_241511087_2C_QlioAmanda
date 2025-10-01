<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('user_id')) {
            return redirect()->to('/dashboard');
        }

        // ✅ login jangan pakai layout/main
        return view('auth/login');
    }

    public function attempt()
    {
        $session  = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // set session
            $session->set([
                'user_id'   => $user['user_id'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'full_name' => $user['full_name'],
                'logged_in' => true
            ]);

            return redirect()->to('/dashboard'); // ✅ redirect ke dashboard
        } else {
            $session->setFlashdata('error', 'Username atau password salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login'); 
    }
}
