<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel;
use App\Models\PenggajianModel;

class PenggajianController extends BaseController
{
    protected $anggotaModel;
    protected $komponenGajiModel;
    protected $penggajianModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
        $this->komponenGajiModel = new KomponenGajiModel();
        $this->penggajianModel = new PenggajianModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $data['penggajian'] = $this->penggajianModel->searchTakeHomePay($keyword);
            $data['keyword'] = $keyword;
        } else {
            $data['penggajian'] = $this->penggajianModel->getTakeHomePay();
        }

        return view('penggajian/index', $data);
    }

    /**
     * ==========================================================
     * ===== PASTIKAN FUNGSI INI MENGIRIM SEMUA DATA YANG BENAR =====
     * ==========================================================
     */
    public function detail($id_anggota)
    {
        // 1. Dapatkan data anggota
        $anggota = $this->anggotaModel->find($id_anggota);
        if (!$anggota) {
            return redirect()->to('/admin/penggajian')->with('error', 'Data anggota tidak ditemukan.');
        }

        // 2. Siapkan semua data yang dibutuhkan oleh view
        $data = [
            'anggota'           => $anggota,
            'komponen_dimiliki' => $this->penggajianModel->getDetailGaji($id_anggota),
            'komponen_tersedia' => $this->penggajianModel->getAvailableKomponen($anggota['jabatan'], $id_anggota),
        ];

        // 3. Kirim semua data ke view 'penggajian/detail'
        return view('penggajian/detail', $data);
    }

    public function addKomponen($id_anggota)
    {
        $id_komponen = $this->request->getPost('id_komponen_gaji');
        
        if ($id_komponen) {
            $this->penggajianModel->save([
                'id_anggota' => $id_anggota,
                'id_komponen_gaji' => $id_komponen
            ]);
            return redirect()->to('/admin/penggajian/detail/'.$id_anggota)->with('success', 'Komponen berhasil ditambahkan.');
        }
        return redirect()->to('/admin/penggajian/detail/'.$id_anggota)->with('error', 'Gagal menambahkan komponen.');
    }

    public function removeKomponen($id_anggota, $id_komponen_gaji)
    {
        $this->penggajianModel->removeKomponen($id_anggota, $id_komponen_gaji);
        return redirect()->to('/admin/penggajian/detail/'.$id_anggota)->with('success', 'Komponen berhasil dihapus.');
    }
}