<?php namespace App\Controllers;
use App\Models\CourseModel;

class Courses extends BaseController
{
    protected $courseModel;
    public function __construct()
    {
        $this->courseModel = new CourseModel();
    }

    // list - untuk semua role
    public function index()
    {
        $courses = $this->courseModel->findAll();
        echo view('layouts/main', ['page' => view('courses/index', ['courses'=>$courses])]);
    }

    // show form create (admin)
    public function create()
    {
        if (session()->get('role') !== 'admin') return redirect()->to('/forbidden');
        echo view('layouts/main', ['page' => view('courses/form')]);
    }

    public function store()
    {
        if (session()->get('role') !== 'admin') return redirect()->to('/forbidden');
        $data = $this->request->getPost(['course_name','credits','code','description']);
        $this->courseModel->insert($data);
        return redirect()->to('/courses');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'admin') return redirect()->to('/forbidden');
        $course = $this->courseModel->find($id);
        echo view('layouts/main', ['page' => view('courses/form', ['course'=>$course])]);
    }

    public function update($id)
    {
        if (session()->get('role') !== 'admin') return redirect()->to('/forbidden');
        $data = $this->request->getPost(['course_name','credits','code','description']);
        $this->courseModel->update($id,$data);
        return redirect()->to('/courses');
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'admin') return redirect()->to('/forbidden');
        $this->courseModel->delete($id);
        return redirect()->to('/courses');
    }
}
