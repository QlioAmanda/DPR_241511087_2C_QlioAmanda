<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Detail & Kelola Penggajian</h3>
        <a href="/admin/penggajian" class="btn btn-secondary">← Kembali ke Daftar</a>
    </div>

    <!-- Notifikasi -->
    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Informasi Anggota -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white"><h4>Informasi Anggota</h4></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"><p><strong>Nama:</strong> <?= esc($anggota['nama_depan'] . ' ' . $anggota['nama_belakang']) ?></p></div>
                <div class="col-md-6"><p><strong>Jabatan:</strong> <?= esc($anggota['jabatan']) ?></p></div>
                <div class="col-md-6"><p><strong>Status:</strong> <?= esc($anggota['status_pernikahan']) ?></p></div>
                <div class="col-md-6"><p><strong>Jumlah Anak:</strong> <?= esc($anggota['jumlah_anak'] ?? 0) ?></p></div>
            </div>
        </div>
    </div>

    <!-- Form Tambah Komponen -->
    <div class="card mb-4">
        <div class="card-header"><strong>Tambah Komponen Gaji</strong> (Sesuai Jabatan & Belum Dimiliki)</div>
        <div class="card-body">
            <form action="/admin/penggajian/add/<?= $anggota['id_anggota'] ?>" method="post">
                <?= csrf_field() ?>
                <div class="input-group">
                    <select name="id_komponen_gaji" class="form-select" required>
                        <option value="">-- Pilih Komponen Gaji yang Tersedia --</option>
                        <?php if(!empty($komponen_tersedia)): ?>
                            <?php foreach($komponen_tersedia as $item): ?>
                                <option value="<?= $item['id_komponen_gaji'] ?>">
                                    <?= esc($item['nama_komponen']) ?> (Rp <?= number_format($item['nominal']) ?>)
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <button type="submit" class="btn btn-success">+ Tambahkan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Rincian Komponen Gaji yang Dimiliki -->
    <div class="card">
        <div class="card-header bg-dark text-white"><h4>Rincian Komponen Gaji & Take Home Pay</h4></div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr><th>Nama Komponen</th><th>Kategori</th><th>Nominal</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    <?php 
                        $total_bulanan = 0;
                        $tunjangan_istri = 0;
                        $tunjangan_anak = 0;
                    ?>
                    <?php if (!empty($komponen_dimiliki)): ?>
                        <?php foreach($komponen_dimiliki as $item): ?>
                            <tr>
                                <td><?= esc($item['nama_komponen']) ?></td>
                                <td><?= esc($item['kategori']) ?></td>
                                <td>Rp <?= number_format($item['nominal'], 0, ',', '.') ?></td>
                                <td>
                                    <a href="/admin/penggajian/remove/<?= $anggota['id_anggota'] ?>/<?= $item['id_komponen_gaji'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus komponen ini dari anggota?')">Hapus</a>
                                </td>
                            </tr>
                            <?php
                                if ($item['satuan'] == 'Bulan') {
                                    if (strpos($item['nama_komponen'], 'Istri/Suami') !== false) {
                                        if ($anggota['status_pernikahan'] == 'Kawin') {
                                            $tunjangan_istri = $item['nominal'];
                                        }
                                    } elseif (strpos($item['nama_komponen'], 'Anak') !== false) {
                                        $jumlah_anak = $anggota['jumlah_anak'] ?? 0;
                                        if ($jumlah_anak > 0) {
                                            $anak_dihitung = min((int)$jumlah_anak, 2);
                                            $tunjangan_per_anak = $item['nominal'] / 2; // Asumsi nominal di DB untuk 2 anak
                                            $tunjangan_anak = $tunjangan_per_anak * $anak_dihitung;
                                        }
                                    } else {
                                        $total_bulanan += $item['nominal'];
                                    }
                                }
                            ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="text-center">Belum ada komponen gaji yang ditambahkan.</td></tr>
                    <?php endif; ?>
                </tbody>
                <tfoot class="table-group-divider">
                    <tr class="fw-bold bg-light"><td colspan="2" class="text-end">Total Gaji Pokok & Tunjangan Tetap:</td><td colspan="2">Rp <?= number_format($total_bulanan, 0, ',', '.') ?></td></tr>
                    <tr class="fw-bold bg-light"><td colspan="2" class="text-end">Tunjangan Istri/Suami (Sesuai Status):</td><td colspan="2">Rp <?= number_format($tunjangan_istri, 0, ',', '.') ?></td></tr>
                    <tr class="fw-bold bg-light"><td colspan="2" class="text-end">Tunjangan Anak (Maksimal 2 Anak):</td><td colspan="2">Rp <?= number_format($tunjangan_anak, 0, ',', '.') ?></td></tr>
                    <tr class="fw-bold fs-5 table-dark text-white"><td colspan="2" class="text-end">TOTAL TAKE HOME PAY (BULANAN):</td><td colspan="2">Rp <?= number_format($total_bulanan + $tunjangan_istri + $tunjangan_anak, 0, ',', '.') ?></td></tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>