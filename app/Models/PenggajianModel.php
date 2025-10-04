<?php

// Pastikan namespace adalah App\Models
namespace App\Models;

use CodeIgniter\Model;

// Pastikan nama Class sama persis dengan nama file
class PenggajianModel extends Model
{
    protected $table            = 'penggajian';
    protected $allowedFields    = ['id_komponen_gaji', 'id_anggota'];

    public function getTakeHomePay()
    {
        $builder = $this->db->table('anggota a');
        $builder->select('a.id_anggota, a.gelar_depan, a.nama_depan, a.nama_belakang, a.gelar_belakang, a.jabatan, a.status_pernikahan');
        $builder->select("SUM(CASE WHEN kg.satuan = 'Bulan' THEN kg.nominal ELSE 0 END) as take_home_pay", false);
        $builder->join('penggajian p', 'a.id_anggota = p.id_anggota', 'left');
        $builder->join('komponen_gaji kg', 'p.id_komponen_gaji = kg.id_komponen_gaji', 'left');
        $builder->groupBy('a.id_anggota');
        $builder->orderBy('a.id_anggota', 'ASC');
        return $builder->get()->getResultArray();
    }

    public function getDetailGaji($id_anggota)
    {
        return $this->db->table('penggajian p')
            ->select('kg.*')
            ->join('komponen_gaji kg', 'p.id_komponen_gaji = kg.id_komponen_gaji')
            ->where('p.id_anggota', $id_anggota)
            ->get()->getResultArray();
    }
    
    public function getAvailableKomponen($jabatan, $id_anggota)
    {
        $owned_komponen_ids = $this->where('id_anggota', $id_anggota)
                                   ->findColumn('id_komponen_gaji') ?? [];
        $builder = $this->db->table('komponen_gaji');
        $builder->whereIn('jabatan', [$jabatan, 'Semua']);
        if (!empty($owned_komponen_ids)) {
            $builder->whereNotIn('id_komponen_gaji', $owned_komponen_ids);
        }
        return $builder->get()->getResultArray();
    }

    public function removeKomponen($id_anggota, $id_komponen_gaji)
    {
        return $this->where('id_anggota', $id_anggota)
                    ->where('id_komponen_gaji', $id_komponen_gaji)
                    ->delete();
    }
    
    public function searchTakeHomePay($keyword)
    {
        $subquery = $this->db->table('anggota a')
            ->select('a.id_anggota, a.gelar_depan, a.nama_depan, a.nama_belakang, a.gelar_belakang, a.jabatan, a.status_pernikahan, SUM(CASE WHEN kg.satuan = "Bulan" THEN kg.nominal ELSE 0 END) as take_home_pay')
            ->join('penggajian p', 'a.id_anggota = p.id_anggota', 'left')
            ->join('komponen_gaji kg', 'p.id_komponen_gaji = kg.id_komponen_gaji', 'left')
            ->groupBy('a.id_anggota');

        $builder = $this->db->newQuery()->fromSubquery($subquery, 'sq');

        if ($keyword) {
            $builder->like('sq.nama_depan', $keyword)
                    ->orLike('sq.nama_belakang', $keyword)
                    ->orLike('sq.jabatan', $keyword)
                    ->orLike('sq.id_anggota', $keyword)
                    ->orLike('sq.take_home_pay', $keyword);
        }
        
        $builder->orderBy('sq.id_anggota', 'ASC');
        return $builder->get()->getResultArray();
    }
}