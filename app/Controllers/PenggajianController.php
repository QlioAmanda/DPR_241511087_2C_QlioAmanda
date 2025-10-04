<?php

namespace App\Controllers;

use App\Models\PenggajianModel;
use App\Models\AnggotaModel;

class PenggajianController extends BaseController
{
    protected $penggajianModel;
    protected $anggotaModel;

    public function __construct()
    {
        $this->penggajianModel = new PenggajianModel();
        $this->anggotaModel = new AnggotaModel();
    }

    // Menampilkan daftar take home pay untuk Admin
    public function index()
    {
        $data['penggajian'] = $this->penggajianModel->getTakeHomePay();
        return view('penggajian/index', $data);
    }
    public function detail($id_anggota)
    {
        // Ambil data anggota dari AnggotaModel
        $anggota = $this->anggotaModel->find($id_anggota);
        if (!$anggota) {
            return redirect()->to('/admin/penggajian')->with('error', 'Data anggota tidak ditemukan.');
        }

        // Ambil semua komponen gaji yang dimiliki anggota ini
        $komponen = $this->penggajianModel->getDetailGaji($id_anggota);

        $data = [
            'anggota'  => $anggota,
            'komponen' => $komponen,
        ];

        return view('penggajian/detail', $data);
    }
    // Nanti kita akan tambahkan fungsi lain di sini (create, store, detail, dll.)
}