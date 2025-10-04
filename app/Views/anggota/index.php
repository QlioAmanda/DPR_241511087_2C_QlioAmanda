<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Anggota DPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h2 class="mb-3">Data Anggota DPR</h2>

    <!-- Tombol kembali ke Dashboard -->
    <a href="<?= base_url('/dashboard') ?>" class="btn btn-danger mb-3">
      ← Kembali ke Dashboard
    </a>

    <!-- Flash message -->
    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <!-- Tombol tambah anggota -->
    <a href="/admin/anggota/create" class="btn btn-primary mb-3">+ Tambah Anggota</a>

    <!-- Tabel Data Anggota -->
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Gelar Depan</th>
          <th>Nama Depan</th>
          <th>Nama Belakang</th>
          <th>Gelar Belakang</th>
          <th>Jabatan</th>
          <th>Status Pernikahan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($anggota)): ?>
          <?php foreach($anggota as $row): ?>
          <tr>
            <td><?= $row['id_anggota'] ?></td>
            <td><?= $row['gelar_depan'] ?></td>
            <td><?= $row['nama_depan'] ?></td>
            <td><?= $row['nama_belakang'] ?></td>
            <td><?= $row['gelar_belakang'] ?></td>
            <td><?= $row['jabatan'] ?></td>
            <td><?= $row['status_pernikahan'] ?></td>
            <td>
              <a href="/admin/anggota/edit/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="/admin/anggota/delete/<?= $row['id_anggota'] ?>" 
                 class="btn btn-sm btn-danger" 
                 onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="8" class="text-center">Belum ada data anggota.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
