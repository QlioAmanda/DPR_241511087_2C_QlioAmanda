<?php namespace App\Controllers;

use App\Models\TakeModel;
use App\Models\CourseModel;
use App\Models\StudentModel;

class Takes extends BaseController
{
    protected $takeModel;

    public function __construct()
    {
        $this->takeModel = new TakeModel();
    }

    /**
     * Halaman daftar KRS
     */
    public function index()
    {
        $session = session();
        $role = $session->get('role');

        if ($role === 'student') {
            $studentModel = new StudentModel();
            $student = $studentModel->where('user_id', $session->get('user_id'))->first();

            if (! $student) {
                return redirect()->to('/forbidden')->with('error', 'Data mahasiswa tidak ditemukan.');
            }

            $enrolled = $this->takeModel
                ->select('takes.*, courses.course_name, courses.credits')
                ->join('courses', 'courses.course_id = takes.course_id')
                ->where('takes.student_id', $student['student_id'])
                ->findAll();

            return view('layouts/main', [
                'page' => view('takes/index', [
                    'enrolled' => $enrolled,
                    'student'  => $student
                ])
            ]);
        } elseif ($role === 'admin') {
            $enrolled = $this->takeModel
                ->select('takes.*, students.nim, users.full_name, courses.course_name, courses.credits, takes.semester')
                ->join('students', 'students.student_id = takes.student_id')
                ->join('users', 'users.user_id = students.user_id')
                ->join('courses', 'courses.course_id = takes.course_id')
                ->orderBy('students.nim', 'ASC')
                ->findAll();

            return view('layouts/main', [
                'page' => view('takes/admin_index', ['enrolled' => $enrolled])
            ]);
        }

        return redirect()->to('/forbidden')->with('error', 'Akses ditolak.');
    }

    /**
     * Halaman untuk mahasiswa memilih mata kuliah (checklist)
     */
    public function enroll()
    {
        $session = session();
        if ($session->get('role') !== 'student') {
            return redirect()->to('/forbidden');
        }

        $courseModel = new CourseModel();
        $courses = $courseModel->findAll();

        return view('layouts/main', [
            'page' => view('takes/enroll', ['courses' => $courses])
        ]);
    }

    /**
     * Simpan KRS (multiple checklist)
     */
    public function store()
    {
        $session = session();
        $studentModel = new StudentModel();

        $student = $studentModel->where('user_id', $session->get('user_id'))->first();

        if (! $student) {
            return redirect()->to('/forbidden')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // ⬇️ FIX: harus pakai 'course_ids' karena dari form checkbox
        $course_ids = $this->request->getPost('course_ids');  
        $semester   = $this->request->getPost('semester') ?: (date('Y') . '-1');

        if (empty($course_ids)) {
            return redirect()->back()->with('error', 'Pilih minimal satu mata kuliah.');
        }

        try {
            $inserted = 0;
            $skipped  = 0;

            foreach ($course_ids as $course_id) {
                $exists = $this->takeModel
                    ->where('student_id', $student['student_id'])
                    ->where('course_id', $course_id)
                    ->where('semester', $semester)
                    ->first();

                if ($exists) {
                    $skipped++;
                    continue;
                }

                $this->takeModel->insert([
                    'student_id' => $student['student_id'],
                    'course_id'  => $course_id,
                    'semester'   => $semester
                ]);
                $inserted++;
            }

            if ($inserted > 0) {
                session()->setFlashdata('success', "✅ $inserted mata kuliah berhasil ditambahkan.");
            }
            if ($skipped > 0) {
                session()->setFlashdata('error', "⚠️ $skipped mata kuliah sudah pernah diambil, dilewati.");
            }
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal enroll: ' . $e->getMessage());
        }

        return redirect()->to('/takes');
    }

    /**
     * Batalkan mata kuliah yang sudah diambil
     */
    public function unenroll($id)
    {
        try {
            $this->takeModel->delete($id);
            session()->setFlashdata('success', 'Berhasil batal enroll.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal batal enroll: ' . $e->getMessage());
        }

        return redirect()->to('/takes');
    }
}
