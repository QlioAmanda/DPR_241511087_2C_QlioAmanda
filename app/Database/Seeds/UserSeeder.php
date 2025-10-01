<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'  => 'admin',
                'password'  => password_hash('admin123', PASSWORD_DEFAULT),
                'role'      => 'admin',
                'full_name' => 'Administrator',
            ],
            [
                'username'  => 'student1',
                'password'  => password_hash('student123', PASSWORD_DEFAULT),
                'role'      => 'student',
                'full_name' => 'Mahasiswa Satu',
            ],
        ];

        // insert batch ke tabel users
        $this->db->table('users')->insertBatch($data);
    }
}
