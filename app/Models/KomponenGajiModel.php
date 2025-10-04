<?php

namespace App\Models;

use CodeIgniter\Model;

class KomponenGajiModel extends Model
{
    protected $table            = 'komponen_gaji';
    protected $primaryKey       = 'id_komponen_gaji'; 
    protected $allowedFields    = ['nama_komponen', 'kategori', 'jabatan', 'nominal', 'satuan'];

    public function search($keyword)
    {

        return $this->table('komponen_gaji')
            ->like('nama_komponen', $keyword)
            ->orLike('kategori', $keyword)
            ->orLike('jabatan', $keyword) // <-- DIUBAH
            ->orLike('nominal', $keyword)
            ->orLike('satuan', $keyword) // <-- DIUBAH
            ->orLike('id_komponen_gaji', $keyword)
            ->get()->getResultArray();
    }
}