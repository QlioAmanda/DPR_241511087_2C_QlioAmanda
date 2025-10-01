<?php namespace App\Models;

use CodeIgniter\Model;

class AnggotaDPRModel extends Model
{
    protected $table         = 'anggota_dpr';
    protected $primaryKey    = 'anggota_id';
    
    // Kolom-kolom yang diperbolehkan untuk diisi
    protected $allowedFields = [
        'gelar_depan', 
        'nama_depan', 
        'nama_belakang', 
        'gelar_belakang', 
        'jabatan', 
        'status_kawin', 
        'jumlah_anak'
    ];
    
    protected $returnType    = 'array';

    protected $useTimestamps = false; // Karena tidak ada kolom created_at/updated_at
}