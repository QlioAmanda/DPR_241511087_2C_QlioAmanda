<?php

namespace App\Controllers;

use App\Models\AnggotaModel; // Kita tetap pakai model yang sama
use CodeIgniter\Controller;

class PublicController extends BaseController
{
    // Fungsi untuk menampilkan data anggota
    public function anggota()
    {
        $anggotaModel = new AnggotaModel();
        
        // Ambil semua data anggota
        $data['anggota'] = $anggotaModel->findAll();
        
        // Berikan judul untuk halaman
        $data['title'] = 'Data Angota DPR';

        // Tampilkan view khusus untuk publik
        return view('public/anggota', $data);
    }
    
    public function penggajian()
    {
        $penggajianModel = new PenggajianModel();
        
        $data['penggajian'] = $penggajianModel->getTakeHomePay();
        
        $data['title'] = 'Data Penggajian Anggota DPR';

        // Tampilkan view khusus untuk publik
        return view('public/penggajian', $data);
    }
}