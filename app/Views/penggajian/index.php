<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Penggajian Anggota (Bulanan)</h3>
        <!-- Nanti bisa ditambahkan tombol seperti "Tambah Penggajian" jika perlu -->
    </div>

    <!-- Notifikasi -->
    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Anggota</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Take Home Pay (Bulanan)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($penggajian)): ?>
                        <?php foreach($penggajian as $item): ?>
                        <tr>
                            <td><?= esc($item['id_anggota']) ?></td>
                            <td><?= trim(esc($item['gelar_depan']) . ' ' . esc($item['nama_depan']) . ' ' . esc($item['nama_belakang']) . ', ' . esc($item['gelar_belakang']), ' ,') ?></td>
                            <td><?= esc($item['jabatan']) ?></td>
                            <td>Rp <?= number_format($item['take_home_pay'] ?? 0, 0, ',', '.') ?></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-info disabled">Detail</a>
                                <a href="#" class="btn btn-sm btn-warning disabled">Kelola</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data penggajian.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>