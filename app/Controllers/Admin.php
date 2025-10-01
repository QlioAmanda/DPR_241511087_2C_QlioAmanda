<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\StudentModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $studentModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->studentModel = new StudentModel();
    }

    public function students()
    {
        $students = $this->studentModel->getWithUser();
        return view('layouts/main', [
            'page' => view('students/index', ['students' => $students])
        ]);
    }

    public function createStudent()
    {
        if ($this->request->getMethod() === 'post') {
            $username   = $this->request->getPost('username');
            $password   = $this->request->getPost('password');
            $full_name  = $this->request->getPost('full_name');
            $nim        = $this->request->getPost('nim');
            $entry_year = $this->request->getPost('entry_year');
            $major      = $this->request->getPost('major');

            // Buat akun user baru
            $userId = $this->userModel->insert([
                'username'  => $username,
                'password'  => password_hash($password, PASSWORD_DEFAULT),
                'role'      => 'student',
                'full_name' => $full_name
            ]);

            // Buat data mahasiswa terkait user tersebut
            $this->studentModel->insert([
                'user_id'    => $userId,
                'nim'        => $nim,
                'entry_year' => $entry_year,
                'major'      => $major
            ]);

            return redirect()->to('/students')->with('success', 'Mahasiswa berhasil ditambahkan.');
        }

        return view('layouts/main', [
            'page' => view('students/create')
        ]);
    }
}
