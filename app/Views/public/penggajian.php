<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Transparansi Data Penggajian Anggota (Bulanan)</h3>
    </div>

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
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data penggajian.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>