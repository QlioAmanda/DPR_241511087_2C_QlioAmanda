<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use CodeIgniter\Controller;

class AnggotaController extends Controller
{
    protected $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $data['anggota'] = $this->anggotaModel->findAll();
        return view('anggota/index', $data);
    }

    public function create()
    {
        return view('anggota/create');
    }

    public function store()
    {
        $this->anggotaModel->save([
            'nama_depan'       => $this->request->getPost('nama_depan'),
            'nama_belakang'    => $this->request->getPost('nama_belakang'),
            'gelar_depan'      => $this->request->getPost('gelar_depan'),
            'gelar_belakang'   => $this->request->getPost('gelar_belakang'),
            'jabatan'          => $this->request->getPost('jabatan'),
            'status_pernikahan'=> $this->request->getPost('status_pernikahan'),
        ]);
        return redirect()->to('/admin/anggota')->with('success', 'Data anggota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['anggota'] = $this->anggotaModel->find($id);
        return view('anggota/edit', $data);
    }

    public function update($id)
    {
        $this->anggotaModel->update($id, [
            'nama_depan'       => $this->request->getPost('nama_depan'),
            'nama_belakang'    => $this->request->getPost('nama_belakang'),
            'gelar_depan'      => $this->request->getPost('gelar_depan'),
            'gelar_belakang'   => $this->request->getPost('gelar_belakang'),
            'jabatan'          => $this->request->getPost('jabatan'),
            'status_pernikahan'=> $this->request->getPost('status_pernikahan'),
        ]);
        return redirect()->to('/admin/anggota')->with('success', 'Data anggota berhasil diperbarui');
    }

    public function delete($id)
    {

    }
}
