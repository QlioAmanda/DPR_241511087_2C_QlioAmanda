<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table            = 'penggajian';
    // Karena tabel ini punya composite primary key, kita tidak definisikan satu primary key
    // CI akan menanganinya dengan baik untuk operasi insert dan delete
    protected $allowedFields    = ['id_komponen_gaji', 'id_anggota'];

    /**
     * Mengambil data semua anggota beserta total take home pay bulanan mereka.
     * Fungsi ini melakukan JOIN dan GROUP BY.
     */
    public function getTakeHomePay()
    {
        // Gunakan Query Builder untuk query yang kompleks
        return $this->db->table('anggota a')
            ->select('a.id_anggota, a.gelar_depan, a.nama_depan, a.nama_belakang, a.gelar_belakang, a.jabatan, a.status_pernikahan, SUM(kg.nominal) as take_home_pay')
            ->join('penggajian p', 'a.id_anggota = p.id_anggota', 'left')
            ->join('komponen_gaji kg', 'p.id_komponen_gaji = kg.id_komponen_gaji', 'left')
            ->where('kg.satuan', 'Bulan') // Hanya menjumlahkan komponen dengan satuan 'Bulan'
            ->groupBy('a.id_anggota')
            ->orderBy('a.id_anggota', 'ASC')
            ->get()->getResultArray();
    }
}