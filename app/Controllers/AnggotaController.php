<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class AnggotaController extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        
        if ($keyword) {
            $data['anggota'] = $this->anggotaModel->search($keyword);
        } else {
            $data['anggota'] = $this->anggotaModel->findAll();
        }
        
        // PASTIKAN BARIS INI MEMUAT VIEW 'anggota/index'
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

    public function delete($id)
    {
        $this->anggotaModel->delete($id);
        return redirect()->to('/admin/anggota')->with('success', 'Data anggota berhasil dihapus.');
    }
}