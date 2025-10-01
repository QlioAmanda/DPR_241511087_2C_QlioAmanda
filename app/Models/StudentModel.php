<?php namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table         = 'students';
    protected $primaryKey    = 'student_id';
    protected $allowedFields = ['user_id','entry_year','nim','major'];
    protected $returnType    = 'array';

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    public function getWithUser()
    {
        return $this->select('students.*, users.username, users.full_name')
                    ->join('users','users.user_id = students.user_id')
                    ->orderBy('students.student_id','ASC')
                    ->findAll();
    }
}
