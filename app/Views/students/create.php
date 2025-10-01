<div class="container mt-4">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Tambah Mahasiswa Baru</h4>
    </div>
    <div class="card-body">
      <form method="post" action="<?= base_url('/students/store') ?>">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password (default student123 jika dikosongkan)</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="full_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">NIM</label>
          <input type="text" name="nim" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Program Studi</label>
          <input type="text" name="major" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Tahun Masuk</label>
          <input type="number" name="entry_year" class="form-control" min="2000" max="2099" required>
        </div>
        <button type="submit" class="btn btn-success">💾 Simpan</button>
        <a href="<?= base_url('/students') ?>" class="btn btn-secondary">⬅ Kembali</a>
      </form>
    </div>
  </div>
</div>
