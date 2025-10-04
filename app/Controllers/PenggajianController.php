<?php

namespace App\Controllers;

use App\Models\PenggajianModel;

class PenggajianController extends BaseController
{
    protected $penggajianModel;

    public function __construct()
    {
        $this->penggajianModel = new PenggajianModel();
    }

    // Menampilkan daftar take home pay untuk Admin
    public function index()
    {
        $data['penggajian'] = $this->penggajianModel->getTakeHomePay();
        return view('penggajian/index', $data);
    }
    
    // Nanti kita akan tambahkan fungsi lain di sini (create, store, detail, dll.)
}