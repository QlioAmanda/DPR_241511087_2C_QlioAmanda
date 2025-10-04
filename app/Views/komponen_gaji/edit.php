<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Ubah Komponen Gaji</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/komponengaji/update/<?= esc($komponen['id_komponen_gaji']) ?>">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="nama_komponen" class="form-label">Nama Komponen</label>
                    <input type="text" name="nama_komponen" id="nama_komponen" class="form-control" 
                           value="<?= esc($komponen['nama_komponen']) ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                            <option value="Gaji Pokok" <?= ($komponen['kategori'] == 'Gaji Pokok') ? 'selected' : '' ?>>Gaji Pokok</option>
                            <option value="Tunjangan Melekat" <?= ($komponen['kategori'] == 'Tunjangan Melekat') ? 'selected' : '' ?>>Tunjangan Melekat</option>
                            <option value="Tunjangan Lain" <?= ($komponen['kategori'] == 'Tunjangan Lain') ? 'selected' : '' ?>>Tunjangan Lain</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jabatan" class="form-label">Berlaku Untuk Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-select" required>
                            <option value="Ketua" <?= ($komponen['jabatan'] == 'Ketua') ? 'selected' : '' ?>>Ketua</option>
                            <option value="Wakil Ketua" <?= ($komponen['jabatan'] == 'Wakil Ketua') ? 'selected' : '' ?>>Wakil Ketua</option>
                            <option value="Anggota" <?= ($komponen['jabatan'] == 'Anggota') ? 'selected' : '' ?>>Anggota</option>
                            <option value="Semua" <?= ($komponen['jabatan'] == 'Semua') ? 'selected' : '' ?>>Semua</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nominal" class="form-label">Nominal (Rp)</label>
                        <input type="number" name="nominal" id="nominal" class="form-control" 
                               value="<?= esc($komponen['nominal']) ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select name="satuan" id="satuan" class="form-select" required>
                            <option value="Bulan" <?= ($komponen['satuan'] == 'Bulan') ? 'selected' : '' ?>>Bulan</option>
                            <option value="Periode" <?= ($komponen['satuan'] == 'Periode') ? 'selected' : '' ?>>Periode</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Perbarui Data</button>
                <a href="/admin/komponengaji" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
