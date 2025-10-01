<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Sistem Akademik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #61e7ffff, #2268ebff);
    }
    .card {
      border: none;
      border-radius: 12px;
    }
    .card-title {
      font-weight: bold;
      color: #333;
    }
    .btn-primary {
      background: linear-gradient(90deg,#7c3aed,#06b6d4);
      border: none;
      font-weight: bold;
    }
    .btn-primary:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg p-4">
          <div class="text-center mb-4">
            <h3 class="card-title">🔑 Login Sistem Akademik</h3>
          </div>
          <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
          <?php endif; ?>
          <form action="<?= base_url('/login/attempt') ?>" method="post">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input name="username" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="d-grid">
              <button class="btn btn-primary">Masuk</button>
            </div>
          </form>
          <hr>
          <p class="text-muted small text-center mb-0">
            <strong>Demo:</strong><br>
            Admin: <code>admin / admin123</code><br>
            Student: <code>student1 / student123</code>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
