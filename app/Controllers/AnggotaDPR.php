<?php namespace App\Controllers;

use App\Models\AnggotaDPRModel;

class AnggotaDPR extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        // Pengecekan Akses (Role Admin)
        if (session()->get('role') !== 'admin') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $this->anggotaModel = new AnggotaDPRModel();
    }

    // [METODE INDEX (LIHAT) - TIDAK BERUBAH]
    public function index()
    {
        $dataAnggota = $this->anggotaModel->findAll();

        return view('layouts/main', [
            'page' => view('anggota_dpr/index', [
                'dataAnggota' => $dataAnggota
            ])
        ]);
    }

    // 1. Tampilkan Form Tambah Data
    public function create()
    {
        return view('layouts/main', [
            'page' => view('anggota_dpr/create')
        ]);
    }

    // 2. Proses Simpan Data Anggota
    public function store()
    {
        // Aturan validasi (sesuai kebutuhan "Create: input & simpan data dengan validasi/rule" [cite: 103])
        if (! $this->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jabatan' => 'required',
            'status_kawin' => 'required',
            'jumlah_anak' => 'required|integer|greater_than_equal_to[0]',
        ])) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        // Ambil data dari form
        $data = [
            // Pastikan nama form sesuai dengan nama kolom di DB
            'gelar_depan' => $this->request->getPost('gelar_depan'), 
            'nama_depan' => $this->request->getPost('nama_depan'),
            'nama_belakang' => $this->request->getPost('nama_belakang'),
            'gelar_belakang' => $this->request->getPost('gelar_belakang'),
            'jabatan' => $this->request->getPost('jabatan'),
            'status_kawin' => $this->request->getPost('status_kawin'),
            // Pastikan jumlah anak hanya diisi jika status = Kawin
            'jumlah_anak' => ($this->request->getPost('status_kawin') === 'Kawin') 
                             ? $this->request->getPost('jumlah_anak') 
                             : 0,
        ];
        
        // Simpan data
        $this->anggotaModel->insert($data);

        session()->setFlashdata('success', '✅ Data anggota DPR baru berhasil ditambahkan.');
        return redirect()->to('/anggota_dpr');
    }
}