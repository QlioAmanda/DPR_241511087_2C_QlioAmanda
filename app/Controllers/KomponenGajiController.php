<?php

namespace App\Controllers;

use App\Models\KomponenGajiModel;

class KomponenGajiController extends BaseController
{
    protected $komponenGajiModel;

    public function __construct()
    {
        $this->komponenGajiModel = new KomponenGajiModel();
    }

    // Menampilkan semua data
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $data['komponen'] = $this->komponenGajiModel->search($keyword);
        } else {
            $data['komponen'] = $this->komponenGajiModel->findAll();
        }

        return view('komponen_gaji/index', $data);
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('komponen_gaji/create');
    }

    // Menyimpan data baru
    public function store()
    {
        $this->komponenGajiModel->save($this->request->getPost());
        return redirect()->to('/admin/komponengaji')->with('success', 'Komponen gaji berhasil ditambahkan.');
    }

    // Menampilkan form edit data
    public function edit($id)
    {
        $data['komponen'] = $this->komponenGajiModel->find($id);
        return view('komponen_gaji/edit', $data);
    }

    // Memperbarui data
    public function update($id)
    {
        $this->komponenGajiModel->update($id, $this->request->getPost());
        return redirect()->to('/admin/komponengaji')->with('success', 'Komponen gaji berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Gunakan fungsi delete() bawaan dari Model
        $this->komponenGajiModel->delete($id);
        
        // Kembalikan ke halaman daftar dengan pesan sukses
        return redirect()->to('/admin/komponengaji')->with('success', 'Komponen gaji berhasil dihapus.');
    }
}