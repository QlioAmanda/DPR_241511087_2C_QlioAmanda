<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Detail Penggajian Anggota</h3>
        <a href="/admin/penggajian" class="btn btn-secondary">← Kembali ke Daftar</a>
    </div>

    <!-- Informasi Anggota -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h4>Informasi Anggota</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nama Lengkap:</strong> <?= trim(esc($anggota['gelar_depan']) . ' ' . esc($anggota['nama_depan']) . ' ' . esc($anggota['nama_belakang']) . ', ' . esc($anggota['gelar_belakang']), ' ,') ?></p>
                    <p><strong>ID Anggota:</strong> <?= esc($anggota['id_anggota']) ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Jabatan:</strong> <?= esc($anggota['jabatan']) ?></p>
                    <p><strong>Status Pernikahan:</strong> <?= esc($anggota['status_pernikahan']) ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Rincian Komponen Gaji -->
    <div class="card">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4>Rincian Komponen Gaji</h4>
            <!-- Nanti tombol ini akan kita fungsikan -->
            <button class="btn btn-sm btn-success disabled">+ Tambah Komponen</button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Komponen</th>
                        <th>Kategori</th>
                        <th>Nominal</th>
                        <th>Satuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $total_bulanan = 0;
                        $total_periode = 0;
                    ?>
                    <?php if (!empty($komponen)): ?>
                        <?php foreach($komponen as $item): ?>
                            <tr>
                                <td><?= esc($item['nama_komponen']) ?></td>
                                <td><?= esc($item['kategori']) ?></td>
                                <td>Rp <?= number_format($item['nominal'], 0, ',', '.') ?></td>
                                <td><?= esc($item['satuan']) ?></td>
                                <td>
                                    <!-- Nanti tombol ini akan kita fungsikan -->
                                    <button class="btn btn-sm btn-danger disabled">Hapus</button>
                                </td>
                            </tr>
                            <?php
                                if ($item['satuan'] == 'Bulan') {
                                    $total_bulanan += $item['nominal'];
                                } else {
                                    $total_periode += $item['nominal'];
                                }
                            ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Anggota ini belum memiliki komponen gaji.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr class="table-group-divider fw-bold">
                        <td colspan="2" class="text-end">Total Pendapatan Bulanan</td>
                        <td colspan="3">Rp <?= number_format($total_bulanan, 0, ',', '.') ?></td>
                    </tr>
                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total Pendapatan Lain (Per Periode)</td>
                        <td colspan="3">Rp <?= number_format($total_periode, 0, ',', '.') ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>