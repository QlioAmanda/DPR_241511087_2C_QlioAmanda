<?php namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\CourseModel;
use App\Models\TakeModel;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to('/dashboard'); 
    }

    public function dashboard()
    {
        $session = session();
        if (! $session->get('user_id')) {
            return redirect()->to('/login');
        }

        $role = $session->get('role');

        if ($role === 'admin') {
            $studentModel = new StudentModel();
            $courseModel  = new CourseModel();

            $totalStudents = $studentModel->countAllResults();
            $totalCourses  = $courseModel->countAllResults();

            return view('layouts/main', [
                'page' => view('home/admin_dashboard', [
                    'totalStudents' => $totalStudents,
                    'totalCourses'  => $totalCourses
                ])
            ]);
        } else {
            // student dashboard
            $studentModel = new StudentModel();
            $user_id = $session->get('user_id');
            $student = $studentModel->where('user_id', $user_id)->first();

            $takeModel = new TakeModel();
            $enrolled = [];
            if ($student) {
                $enrolled = $takeModel->getByStudent($student['student_id']);
            }

            return view('layouts/main', [
                'page' => view('home/student_dashboard', [
                    'student'  => $student,
                    'enrolled' => $enrolled
                ])
            ]);
        }
    }

    public function forbidden()
    {
        return view('layouts/main', [
            'page' => '<div class="container py-5"><h3>403 Forbidden</h3><p>Anda tidak memiliki izin.</p></div>'
        ]);
    }
}
