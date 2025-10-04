<?php

namespace App\Controllers;

use App\Models\PenggajianModel;
use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel; // <-- Tambahkan ini

class PenggajianController extends BaseController
{
    protected $penggajianModel;
    protected $anggotaModel;
    protected $komponenGajiModel; // <-- Tambahkan ini

    public function __construct()
    {
        $this->penggajianModel = new PenggajianModel();
        $this->anggotaModel = new AnggotaModel();
        $this->komponenGajiModel = new KomponenGajiModel(); // <-- Tambahkan ini
    }

    public function index()
    {
        $data['penggajian'] = $this->penggajianModel->getTakeHomePay();
        return view('penggajian/index', $data);
    }

    public function detail($id_anggota)
    {
        $anggota = $this->anggotaModel->find($id_anggota);
        if (!$anggota) {
            return redirect()->to('/admin/penggajian')->with('error', 'Data anggota tidak ditemukan.');
        }

        $data = [
            'anggota'           => $anggota,
            'komponen_dimiliki' => $this->penggajianModel->getDetailGaji($id_anggota),
            'komponen_tersedia' => $this->penggajianModel->getAvailableKomponen($anggota['jabatan'], $id_anggota),
        ];

        return view('penggajian/detail', $data);
    }

    // Fungsi untuk menambah komponen ke anggota
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

    // Fungsi untuk menghapus komponen dari anggota
    public function removeKomponen($id_anggota, $id_komponen_gaji)
    {
        $this->penggajianModel->removeKomponen($id_anggota, $id_komponen_gaji);
        return redirect()->to('/admin/penggajian/detail/'.$id_anggota)->with('success', 'Komponen berhasil dihapus.');
    }
}