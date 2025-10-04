<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>Dashboard</h2>
    <p>Selamat datang, <?= session()->get('username') ?> (<?= session()->get('role') ?>)</p>

    <?php if(session()->get('role') === 'admin'): ?>
        <a href="/admin/anggota" class="btn btn-success">Kelola Anggota</a>
    <?php else: ?>
        <a href="/client/anggota" class="btn btn-info">Lihat Data Anggota</a>
    <?php endif; ?>
    <a href="/logout" class="btn btn-danger">Logout</a>
</body>
</html>
