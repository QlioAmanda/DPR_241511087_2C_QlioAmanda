<?php

namespace App\Controllers;

// ==========================================================
// ===== PERBAIKAN DI SINI =====
// Kita beritahu Controller di mana letak Model yang benar
// ==========================================================
use App\Models\AnggotaModel;
use App\Models\PenggajianModel; // <-- Pastikan baris ini ada
use CodeIgniter\Controller;

class PublicController extends BaseController
{
    // Fungsi untuk menampilkan data anggota
    public function anggota()
    {
        $anggotaModel = new AnggotaModel();
        $data['anggota'] = $anggotaModel->findAll();
        $data['title'] = 'Data Angota DPR';
        return view('public/anggota', $data);
    }
    
    // Fungsi untuk menampilkan data penggajian
    public function penggajian()
    {
        // Baris ini sekarang akan bekerja dengan benar
        $penggajianModel = new PenggajianModel();
        
        $data['penggajian'] = $penggajianModel->getTakeHomePay();
        
        $data['title'] = 'Data Penggajian Anggota DPR';

        // Tampilkan view khusus untuk publik
        return view('public/penggajian', $data);
    }
}