<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { margin: 0; font-family: Arial, sans-serif; background:#f1f5f9; }
    .sidebar {
      width: 240px;
      min-height: 100vh;
      background: linear-gradient(180deg,#14b8a6,#2563eb);
      color: white;
      position: fixed;
      top: 0; left: 0;
      padding: 20px 0;
    }
    .sidebar h4 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .sidebar .nav-link {
      color: white;
      padding: 15px 20px;
      display: flex;
      align-items: center;
      font-weight: 500;
      border-radius: 8px;
      margin: 6px 15px;
      background: rgba(255,255,255,0.05);
      transition: 0.3s;
    }
    .sidebar .nav-link:hover {
      background: rgba(255,255,255,0.25);
    }
    .sidebar i {
      margin-right: 12px;
    }
    .content {
      margin-left: 240px;
      padding: 40px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h4>📊 Dashboard</h4>
    <a href="<?= base_url('/') ?>" class="nav-link"><i>🏠</i> Home</a>
    <a href="<?= base_url('/logout') ?>" class="nav-link text-warning"><i>🚪</i> Logout</a>
  </div>

  <div class="content">
    <?= $page ?>
  </div>
</body>
</html>
