<!DOCTYPE html>
<html>
<head>
    <title>Terjadi Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="alert alert-danger">
        <h4 class="alert-heading">Oops! Terjadi Error</h4>
        <p><strong>Pesan:</strong> <?= esc($message ?? 'Unknown error') ?></p>
        <?php if (ENVIRONMENT !== 'production'): ?>
            <hr>
            <pre><?= esc($exception ?? '') ?></pre>
        <?php endif; ?>
    </div>
    <a href="<?= base_url('/') ?>" class="btn btn-primary">Kembali ke Halaman Utama</a>
</div>
</body>
</html>
