<?php namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;

class Students extends BaseController
{
    protected $studentModel;
    protected $userModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->userModel    = new UserModel();
    }

    // daftar mahasiswa
    public function index()
    {
        $students = $this->studentModel->getWithUser();
        return view('layouts/main', [
            'page' => view('students/index', ['students' => $students])
        ]);
    }

    // form tambah mahasiswa
    public function create()
    {
        return view('layouts/main', [
            'page' => view('students/create')
        ]);
    }

    // simpan mahasiswa baru (otomatis buat user account)
    public function store()
    {
        $username   = $this->request->getPost('username');
        $password   = $this->request->getPost('password') ?: 'student123'; // default kalau kosong
        $fullName   = $this->request->getPost('full_name');
        $nim        = $this->request->getPost('nim');
        $entryYear  = $this->request->getPost('entry_year');
        $major      = $this->request->getPost('major');

        try {
            // 🔹 buat akun user di tabel users
            $this->userModel->insert([
                'username'  => $username,
                'password'  => password_hash($password, PASSWORD_DEFAULT),
                'role'      => 'student',
                'full_name' => $fullName
            ]);
            $userId = $this->userModel->getInsertID();

            // 🔹 buat data mahasiswa di tabel students
            $this->studentModel->insert([
                'user_id'    => $userId,
                'nim'        => $nim,
                'entry_year' => $entryYear,
                'major'      => $major
            ]);

            session()->setFlashdata('success', 'Mahasiswa baru berhasil ditambahkan beserta akun login.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menambahkan mahasiswa: '.$e->getMessage());
        }

        return redirect()->to('/students');
    }

    // hapus mahasiswa + akun user nya
    public function delete($id)
    {
        try {
            // hapus student (karena foreign key ON DELETE CASCADE, user bisa ikut dihapus kalau kamu set relasinya)
            $this->studentModel->delete($id);
            session()->setFlashdata('success', 'Mahasiswa berhasil dihapus.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menghapus mahasiswa.');
        }
        return redirect()->to('/students');
    }
}
