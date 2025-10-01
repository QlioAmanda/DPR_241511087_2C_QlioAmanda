<div class="card shadow-sm">
  <div class="card-body">
    <h5>Tambah Mahasiswa</h5>
    <form action="<?= base_url('/students/store') ?>" method="post">
      <div class="mb-3"><label>Username</label><input name="username" class="form-control" required></div>
      <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
      <div class="mb-3"><label>Nama Lengkap</label><input name="full_name" class="form-control" required></div>
      <div class="mb-3"><label>NIM</label><input name="nim" class="form-control" required></div>
      <div class="mb-3"><label>Angkatan</label><input name="entry_year" class="form-control" required></div>
      <div class="mb-3"><label>Program Studi</label><input name="major" class="form-control"></div>
      <button class="btn btn-success">Simpan</button>
    </form>
  </div>
</div>
