<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'user_id';
    protected $allowedFields = ['username','password','role','full_name'];
    protected $returnType    = 'array';

    // Matikan timestamps
    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    public function getByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
