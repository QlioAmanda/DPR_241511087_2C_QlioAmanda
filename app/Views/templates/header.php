<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Aplikasi Gaji DPR') ?></title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url() ?>">GajiDPR</a>
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarsExample"
            aria-controls="navbarsExample" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample">
      <ul class="navbar-nav ms-auto">
        <?php if(session()->get('isLoggedIn')): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/dashboard') ?>">Dashboard</a>
          </li>
          <li class="nav-item">
            <span class="nav-link">Hi, <?= esc(session()->get('nama_depan')) ?></span>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="<?= base_url('/logout') ?>">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/login') ?>">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
