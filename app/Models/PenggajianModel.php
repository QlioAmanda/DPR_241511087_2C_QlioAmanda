<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table            = 'penggajian';
    protected $allowedFields    = ['id_komponen_gaji', 'id_anggota'];

    public function getTakeHomePay()
    {
        return $this->db->table('anggota a')
            ->select('a.id_anggota, a.gelar_depan, a.nama_depan, a.nama_belakang, a.gelar_belakang, a.jabatan, a.status_pernikahan, SUM(kg.nominal) as take_home_pay')
            ->join('penggajian p', 'a.id_anggota = p.id_anggota', 'left')
            ->join('komponen_gaji kg', 'p.id_komponen_gaji = kg.id_komponen_gaji', 'left')
            ->where('kg.satuan', 'Bulan')
            ->groupBy('a.id_anggota')
            ->orderBy('a.id_anggota', 'ASC')
            ->get()->getResultArray();
    }

    public function getDetailGaji($id_anggota)
    {
        return $this->db->table('penggajian p')
            ->select('kg.*')
            ->join('komponen_gaji kg', 'p.id_komponen_gaji = kg.id_komponen_gaji')
            ->where('p.id_anggota', $id_anggota)
            ->get()->getResultArray();
    }

    /**
     * Mengambil komponen gaji yang BISA ditambahkan untuk seorang anggota.
     * Aturan: Sesuai jabatan + belum dimiliki oleh anggota.
     */
    public function getAvailableKomponen($jabatan, $id_anggota)
    {
        // 1. Dapatkan dulu ID komponen yang sudah dimiliki anggota
        $owned_komponen_ids = $this->where('id_anggota', $id_anggota)
                                   ->findColumn('id_komponen_gaji') ?? [];

        $builder = $this->db->table('komponen_gaji');
        
        // 2. Pilih komponen yang jabatannya sesuai ATAU 'Semua'
        $builder->whereIn('jabatan', [$jabatan, 'Semua']);

        // 3. KECUALIKAN komponen yang sudah dimiliki
        if (!empty($owned_komponen_ids)) {
            $builder->whereNotIn('id_komponen_gaji', $owned_komponen_ids);
        }

        return $builder->get()->getResultArray();
    }

    /**
     * Menghapus komponen gaji dari seorang anggota.
     */
    public function removeKomponen($id_anggota, $id_komponen_gaji)
    {
        return $this->where('id_anggota', $id_anggota)
                    ->where('id_komponen_gaji', $id_komponen_gaji)
                    ->delete();
    }
}