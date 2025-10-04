<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Komponen Gaji Baru</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/komponengaji/store">
                <?= csrf_field() // Keamanan form CodeIgniter ?>

                <div class="mb-3">
                    <label for="nama_komponen" class="form-label">Nama Komponen</label>
                    <input type="text" name="nama_komponen" id="nama_komponen" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Gaji Pokok">Gaji Pokok</option>
                            <option value="Tunjangan Melekat">Tunjangan Melekat</option>
                            <option value="Tunjangan Lain">Tunjangan Lain</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jabatan" class="form-label">Berlaku Untuk Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-select" required>
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Wakil Ketua">Wakil Ketua</option>
                            <option value="Anggota">Anggota</option>
                            <option value="Semua">Semua</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nominal" class="form-label">Nominal (Rp)</label>
                        <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Contoh: 5000000" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select name="satuan" id="satuan" class="form-select" required>
                            <option value="Bulan">Bulan</option>
                            <option value="Periode">Periode</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="/admin/komponengaji" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
