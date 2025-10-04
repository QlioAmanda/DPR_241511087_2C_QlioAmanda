<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Anggota DPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h3>Tambah Anggota DPR</h3>
    <form method="post" action="/admin/anggota/store">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Gelar Depan</label>
          <input type="text" name="gelar_depan" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
          <label>Gelar Belakang</label>
          <input type="text" name="gelar_belakang" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
          <label>Nama Depan</label>
          <input type="text" name="nama_depan" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Nama Belakang</label>
          <input type="text" name="nama_belakang" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Jabatan</label>
          <input type="text" name="jabatan" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Status Pernikahan</label>
          <select name="status_pernikahan" class="form-control" required>
            <option value="Belum Kawin">Belum Kawin</option>
            <option value="Kawin">Kawin</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="/admin/anggota" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
