<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Gaji DPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    body { margin: 0; font-family: Arial, sans-serif; }
    .sidebar {
      width: 220px;
      min-height: 100vh;
      background: linear-gradient(180deg,#14b8a6,#2563eb); /* tosca → biru */
      color: white;
      position: fixed;
      top: 0; left: 0;
      padding-top: 20px;
    }
    .sidebar h4 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .sidebar a {
      color: white;
      padding: 12px 20px;
      display: block;
      text-decoration: none;
      font-weight: 500;
    }
    .sidebar a:hover {
      background: rgba(255,255,255,0.2);
      border-radius: 6px;
    }
    .content {
      margin-left: 220px;
      padding: 40px;
      background: #f8fafc;
      min-height: 100vh;
    }
  </style>
</head>
<body>
  <?php $role = session()->get('role'); ?>
  <?php $full_name = session()->get('full_name'); ?>

  <div class="sidebar">
    <h4>📊 Aplikasi Gaji DPR</h4>
    <p class="text-center small text-light mb-4">
        Hi, <?= esc($full_name) ?> (<?= esc(ucfirst($role)) ?>)
    </p>

    <a href="<?= base_url('/') ?>"><i class="fas fa-home me-2"></i> Home</a>

    <?php if ($role === 'admin'): ?>
      <hr style="border-color: rgba(255,255,255,0.3);">
      <h6 style="padding: 0 20px; margin-bottom: 5px; color: rgba(255,255,255,0.7);">ADMIN MENU</h6>
      <a href="<?= base_url('anggota_dpr') ?>"><i class="fas fa-users me-2"></i> Data Anggota DPR</a>
      <a href="#"><i class="fas fa-cog me-2"></i> Komponen Gaji</a>
      <a href="#"><i class="fas fa-calculator me-2"></i> Data Penggajian</a>
    <?php endif; ?>

    <?php if ($role === 'public'): ?>
      <hr style="border-color: rgba(255,255,255,0.3);">
      <h6 style="padding: 0 20px; margin-bottom: 5px; color: rgba(255,255,255,0.7);">PUBLIC MENU</h6>
      <a href="<?= base_url('anggota_dpr') ?>"><i class="fas fa-search me-2"></i> Cek Anggota DPR</a>
      <a href="#"><i class="fas fa-money-check-alt me-2"></i> Cek Penggajian</a>
    <?php endif; ?>

    <hr style="border-color: rgba(255,255,255,0.3);">
    <a href="<?= base_url('/logout') ?>" class="text-warning">
      <i class="fas fa-sign-out-alt me-2"></i> Logout
    </a>
  </div>

  <div class="content">
    <?= $page ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>