<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Ubah Data Anggota</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/anggota/update/<?= esc($anggota['id_anggota']) ?>">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_depan" class="form-label">Nama Depan</label>
                        <input type="text" name="nama_depan" id="nama_depan" class="form-control" 
                               value="<?= esc($anggota['nama_depan']) ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_belakang" class="form-label">Nama Belakang</label>
                        <input type="text" name="nama_belakang" id="nama_belakang" class="form-control"
                               value="<?= esc($anggota['nama_belakang']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gelar_depan" class="form-label">Gelar Depan</label>
                        <input type="text" name="gelar_depan" id="gelar_depan" class="form-control" 
                               value="<?= esc($anggota['gelar_depan']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
                        <input type="text" name="gelar_belakang" id="gelar_belakang" class="form-control"
                               value="<?= esc($anggota['gelar_belakang']) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-select" required>
                            <option value="Ketua" <?= ($anggota['jabatan'] == 'Ketua') ? 'selected' : '' ?>>Ketua</option>
                            <option value="Wakil Ketua" <?= ($anggota['jabatan'] == 'Wakil Ketua') ? 'selected' : '' ?>>Wakil Ketua</option>
                            <option value="Anggota" <?= ($anggota['jabatan'] == 'Anggota') ? 'selected' : '' ?>>Anggota</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                        <select name="status_pernikahan" id="status_pernikahan" class="form-select" required>
                            <option value="Belum Kawin" <?= ($anggota['status_pernikahan'] == 'Belum Kawin') ? 'selected' : '' ?>>Belum Kawin</option>
                            <option value="Kawin" <?= ($anggota['status_pernikahan'] == 'Kawin') ? 'selected' : '' ?>>Kawin</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Data</button>
                <a href="/admin/anggota" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>