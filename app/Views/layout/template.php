<?php
// Cek jika variabel $hide_navbar dikirim dari view, jika tidak, set default false
$hide_navbar = $hide_navbar ?? false;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Penggajian DPR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; }
        .card { margin-top: 20px; }
    </style>
</head>
<body>

<?php
// Tampilkan navbar hanya jika $hide_navbar adalah false
if (!$hide_navbar):
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="/">ETS-P3</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php
      // Tampilkan menu navigasi hanya jika pengguna sudah login
      if (session()->get('logged_in')):
      ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">Dashboard</a>
          </li>
          <?php
          // Logika untuk menampilkan menu berdasarkan ROLE
          if (session()->get('role') === 'Admin'):
          ?>
            <li class="nav-item">
              <a class="nav-link" href="/admin/anggota">Kelola Anggota</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/komponengaji">Komponen Gaji</a>
            </li>
            <?php else: ?>
             <li class="nav-item">
              <a class="nav-link" href="/anggota">Lihat Anggota</a>
            </li>
          <?php endif; ?>
        </ul>
        <ul class="navbar-nav">
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Selamat Datang, <?= esc(session()->get('nama_depan')) ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
              </ul>
            </li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>
<?php endif; ?>

<main class="container mt-4">
    <?= $this->renderSection('content') ?>
</main>

<?php
// Tampilkan footer hanya jika $hide_navbar adalah false
if (!$hide_navbar):
?>
<footer class="container mt-5 text-center text-muted">
    <p>&copy; <?= date('Y') ?> Proyek ETS Pemrograman Lanjut</p>
</footer>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>