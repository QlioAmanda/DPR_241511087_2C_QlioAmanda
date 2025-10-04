<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar-custom {
      background-color: #dc3545; /* merah DPR */
    }
    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link {
      color: #fff;
      font-weight: bold;
    }
    .dashboard-header {
      background: #dc3545; /* merah */
      color: #fff; /* teks putih */
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      margin-bottom: 30px;
    }
    .card-custom {
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }
    .card-custom:hover {
      transform: translateY(-5px);
    }
    .btn-custom {
      background: #000; /* hitam */
      color: #fff;
      border: none;
    }
    .btn-custom:hover {
      background: #dc3545; /* hover merah */
    }
  </style>
</head>
<body>

<!-- Navbar dengan tombol logout -->
<nav class="navbar navbar-custom px-3">
  <a class="navbar-brand">DPR Dashboard</a>
  <ul class="navbar-nav ms-auto">
    <li class="nav-item">
      <a href="<?= base_url('/logout') ?>" class="btn btn-light btn-sm" 
         onclick="return confirm('Yakin ingin logout?')">
         Logout
      </a>
    </li>
  </ul>
</nav>

<div class="container mt-4">
  <!-- Header -->
  <div class="dashboard-header">
    <h1>Selamat Datang, Admin</h1>
    <p>APLIKASI PENGHITUNGAN & TRANSPARANSI GAJI DPR</p>
  </div>

  <!-- Cards Menu -->
  <div class="row text-center">
    <!-- Card Kelola Anggota -->
    <div class="col-md-4 mb-4">
      <div class="card card-custom p-4">
        <h4>Kelola Anggota</h4>
        <p>Tambah, ubah, dan lihat data anggota DPR.</p>
        <a href="<?= base_url('admin/anggota') ?>" class="btn btn-custom">Masuk</a>
      </div>
    </div>

    <!-- Card Gaji -->
    <div class="col-md-4 mb-4">
      <div class="card card-custom p-4">
        <h4>Penghitungan Gaji</h4>
        <p>Hitung gaji dan tunjangan anggota DPR.</p>
        <button class="btn btn-custom" disabled>Coming Soon</button>
      </div>
    </div>

    <!-- Card Laporan -->
    <div class="col-md-4 mb-4">
      <div class="card card-custom p-4">
        <h4>Laporan</h4>
        <p>Lihat laporan transparansi gaji DPR.</p>
        <button class="btn btn-custom" disabled>Coming Soon</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
