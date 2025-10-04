<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Aplikasi DPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      /* Gradasi merah tua → merah muda → putih */
      background: linear-gradient(to bottom, #8B0000, #DC143C, #ffffff);
      min-height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-box {
      background: #fff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 400px;
    }
    /* Judul dengan aksen hitam */
    .title {
      text-align: center;
      font-weight: bold;
      font-size: 1.1rem;
      color: #000;
      margin-bottom: 1.5rem;
      border-bottom: 2px solid #000; /* aksen hitam */
      padding-bottom: 0.5rem;
    }
    /* Tombol login merah */
    .btn-red {
      background-color: #dc3545; /* merah */
      border: none;
      color: #fff; /* teks putih */
      font-weight: bold;
    }
    .btn-red:hover {
      background-color: #b02a37; /* merah lebih gelap */
    }
  </style>
</head>
<body>

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

      <button type="submit" class="btn btn-red w-100">Login</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
