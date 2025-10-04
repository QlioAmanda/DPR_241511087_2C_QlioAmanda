<?php

namespace App\Models;

use CodeIgniter\Model;

class KomponenGajiModel extends Model
{
    protected $table            = 'komponen_gaji';
    protected $primaryKey       = 'id_komponen';
    protected $allowedFields    = ['nama_komponen', 'kategori', 'jabatan', 'nominal', 'satuan'];

    /**
     * Fungsi untuk mencari data komponen gaji berdasarkan keyword.
     * @param string $keyword
     * @return array
     */
    public function search($keyword)
    {
        // PERBAIKAN: Mencari berdasarkan keyword di semua kolom yang relevan
        return $this->table('komponen_gaji')
            ->like('nama_komponen', $keyword)
            ->orLike('kategori', $keyword)
            ->orLike('jabatan', $keyword) // <-- Diperbaiki
            ->orLike('nominal', $keyword)
            ->orLike('satuan', $keyword)  // <-- Diperbaiki
            ->orLike('id_komponen', $keyword)
            ->get()->getResultArray();
    }
}
