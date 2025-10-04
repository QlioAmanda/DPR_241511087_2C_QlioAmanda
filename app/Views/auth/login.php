<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Aplikasi DPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #dc3545; /* merah */
    }
    .login-container {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-box {
      background: #fff; /* putih */
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 400px;
    }
    .title {
      text-align: center;
      font-weight: bold;
      font-size: 1.1rem;
      color: #000; /* hitam */
      margin-bottom: 1.5rem;
      border-bottom: 3px solid #dc3545; /* aksen merah */
      padding-bottom: 0.5rem;
    }
    .btn-custom {
      background-color: #000; /* hitam */
      border: none;
      color: #fff; /* putih */
      font-weight: bold;
    }
    .btn-custom:hover {
      background-color: #dc3545; /* merah saat hover */
      color: #fff;
    }
  </style>
</head>
<body>

  <div class="container login-container">
    <div class="login-box">
      <h2 class="title">
        APLIKASI PENGHITUNGAN & TRANSPARANSI GAJI DPR BERBASIS WEB
      </h2>

      <!-- Form Login -->
      <form action="<?= base_url('/login') ?>" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-custom w-100">Login</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
