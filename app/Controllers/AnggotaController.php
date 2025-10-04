<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
// Kita tidak perlu PenggajianModel lagi di sini karena akan pakai Query Builder
use CodeIgniter\Controller;

class AnggotaController extends BaseController
{
    protected $anggotaModel;
    protected $db; // <-- Properti untuk koneksi database

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
        $this->db = \Config\Database::connect(); // <-- Mengambil koneksi database
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $data['anggota'] = $this->anggotaModel->search($keyword);
        } else {
            $data['anggota'] = $this->anggotaModel->findAll();
        }

        return view('anggota/index', $data);
    }

    public function create()
    {
        return view('anggota/create');
    }

    public function store()
    {
        $this->anggotaModel->save($this->request->getPost());
        return redirect()->to('/admin/anggota')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['anggota'] = $this->anggotaModel->find($id);
        return view('anggota/edit', $data);
    }

    public function update($id)
    {
        $this->anggotaModel->update($id, $this->request->getPost());
        return redirect()->to('/admin/anggota')->with('success', 'Data anggota berhasil diperbarui.');
    }

    /**
     * =================================================================
     * ===== REVISI FUNGSI HAPUS DENGAN DATABASE TRANSACTION =====
     * =================================================================
     */
    public function delete($id)
    {
        // Memulai mode transaksi
        $this->db->transStart();

        // Langkah 1: Hapus semua data 'anak' (child) di tabel `penggajian`
        // menggunakan Query Builder secara langsung. Ini lebih pasti.
        $this->db->table('penggajian')->where('id_anggota', $id)->delete();

        // Langkah 2: Hapus data 'induk' (parent) di tabel `anggota`
        $this->anggotaModel->delete($id);

        // Menyelesaikan transaksi
        $this->db->transComplete();

        // Cek apakah transaksi berhasil atau gagal
        if ($this->db->transStatus() === false) {
            // Jika gagal, kembalikan dengan pesan error
            return redirect()->to('/admin/anggota')->with('error', 'Gagal menghapus data anggota.');
        } else {
            // Jika berhasil, kembalikan dengan pesan sukses
            return redirect()->to('/admin/anggota')->with('success', 'Data anggota beserta data gajinya berhasil dihapus.');
        }
    }
}