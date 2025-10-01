<div class="card shadow-lg p-4">
    <h3 class="card-title mb-4">➕ Tambah Data Anggota DPR</h3>
    
    <form action="<?= base_url('anggota_dpr/simpan') ?>" method="post">
        <?= csrf_field() ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="gelar_depan" class="form-label">Gelar Depan</label>
                <input type="text" name="gelar_depan" id="gelar_depan" class="form-control" value="<?= old('gelar_depan') ?>">
            </div>
            <div class="col-md-4">
                <label for="nama_depan" class="form-label">Nama Depan <span class="text-danger">*</span></label>
                <input type="text" name="nama_depan" id="nama_depan" class="form-control" value="<?= old('nama_depan') ?>" required>
            </div>
            <div class="col-md-4">
                <label for="nama_belakang" class="form-label">Nama Belakang <span class="text-danger">*</span></label>
                <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" value="<?= old('nama_belakang') ?>" required>
            </div>
            <div class="col-md-1">
                <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
                <input type="text" name="gelar_belakang" id="gelar_belakang" class="form-control" value="<?= old('gelar_belakang') ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                <select name="jabatan" id="jabatan" class="form-select" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <?php 
                        // Ambil ENUM dari DB atau definisikan ulang sesuai Enum jabatan_anggota
                        $jabatan_options = ['Ketua', 'Wakil Ketua', 'Anggota'];
                        foreach ($jabatan_options as $j):
                    ?>
                        <option value="<?= $j ?>" <?= (old('jabatan') == $j) ? 'selected' : '' ?>><?= $j ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="status_kawin" class="form-label">Status Pernikahan <span class="text-danger">*</span></label>
                <select name="status_kawin" id="status_kawin" class="form-select" required onchange="toggleAnak()">
                    <option value="">-- Pilih Status --</option>
                    <?php 
                        // Ambil ENUM dari DB atau definisikan ulang sesuai Enum status_pernikahan
                        $status_options = ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati'];
                        foreach ($status_options as $s):
                    ?>
                        <option value="<?= $s ?>" <?= (old('status_kawin') == $s) ? 'selected' : '' ?>><?= $s ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4" id="div_jumlah_anak">
                <label for="jumlah_anak" class="form-label">Jumlah Anak</label>
                <input type="number" name="jumlah_anak" id="jumlah_anak" class="form-control" value="<?= old('jumlah_anak', 0) ?>" min="0">
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Simpan Data Anggota</button>
        </div>
    </form>
</div>

<script>
    // Fungsi untuk menyembunyikan input Jumlah Anak jika status bukan Kawin
    function toggleAnak() {
        const statusKawin = document.getElementById('status_kawin').value;
        const divAnak = document.getElementById('div_jumlah_anak');
        
        if (statusKawin === 'Kawin') {
            divAnak.style.display = 'block';
        } else {
            divAnak.style.display = 'none';
            // Set nilai ke 0 saat disembunyikan agar data yang tersimpan konsisten
            document.getElementById('jumlah_anak').value = 0; 
        }
    }

    // Panggil saat halaman dimuat
    document.addEventListener('DOMContentLoaded', toggleAnak);
</script>