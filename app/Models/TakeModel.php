<?php namespace App\Models;

use CodeIgniter\Model;

class TakeModel extends Model
{
    protected $table         = 'takes';
    protected $primaryKey    = 'take_id';
    protected $allowedFields = ['student_id','course_id','semester','enroll_date'];
    protected $returnType    = 'array';

    // Matikan timestamps
    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    public function getByStudent($studentId)
    {
        return $this->select('takes.*, courses.course_name, courses.credits')
                    ->join('courses', 'courses.course_id = takes.course_id')
                    ->where('takes.student_id', $studentId)
                    ->findAll();
    }
}
