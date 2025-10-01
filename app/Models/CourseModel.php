<?php namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table         = 'courses';
    protected $primaryKey    = 'course_id';
    protected $allowedFields = ['course_name','credits','code','description'];
    protected $returnType    = 'array';

    // Matikan timestamps
    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';
}
