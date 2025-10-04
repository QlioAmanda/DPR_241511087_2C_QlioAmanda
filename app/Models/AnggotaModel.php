<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = [
        'nama_depan',
        'nama_belakang',
        'gelar_depan',
        'gelar_belakang',
        'jabatan',
        'status_pernikahan',
    ];

    /**
     * Fungsi untuk mencari data anggota berdasarkan keyword.
     * @param string $keyword
     * @return array
     */
    // TAMBAHKAN ATAU PASTIKAN FUNGSI INI ADA
    public function search($keyword)
    {
        // Mencari data berdasarkan keyword di beberapa kolom sekaligus
        // menggunakan Query Builder
        return $this->table('anggota')
            ->like('nama_depan', $keyword)
            ->orLike('nama_belakang', $keyword)
            ->orLike('jabatan', $keyword)
            ->orLike('id_anggota', $keyword)
            ->get()->getResultArray();
    }
}