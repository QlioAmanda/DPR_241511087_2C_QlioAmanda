<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { margin: 0; }
    .sidebar {
      width: 240px;
      min-height: 100vh;
      background: linear-gradient(180deg,#06b6d4,#7c3aed);
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
      border-radius: 8px;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar text-white">
      <h4 class="p-3">My Dashboard</h4>
      <?php $role = session()->get('role'); ?>
      <ul class="nav flex-column">
        <li><a href="<?= base_url('/dashboard') ?>">🏠 Dashboard</a></li>
        <?php if ($role === 'admin'): ?>
          <li><a href="<?= base_url('/students') ?>">👨‍🎓 Mahasiswa</a></li>
          <li><a href="<?= base_url('/courses') ?>">📘 Mata Kuliah</a></li>
          <li><a href="<?= base_url('/takes') ?>">📝 Data KRS</a></li>
        <?php else: ?>
          <li><a href="<?= base_url('/takes') ?>">📘 KRS Saya</a></li>
        <?php endif; ?>
        <li><a href="<?= base_url('/logout') ?>" class="text-warning">🚪 Logout</a></li>
      </ul>
    </div>

    <!-- Main content -->
    <div class="content">
      <?= $page ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('js/app.js') ?>"></script>
</body>
</html>
