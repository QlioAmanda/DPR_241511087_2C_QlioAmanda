<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Anggota DPR (Public View)</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Status Pernikahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($anggota)): ?>
                        <?php foreach($anggota as $row): ?>
                        <tr>
                            <td><?= $row['id_anggota'] ?></td>
                            <td>
                                <?= trim($row['gelar_depan'] . ' ' . $row['nama_depan'] . ' ' . $row['nama_belakang'] . ', ' . $row['gelar_belakang'], ' ,') ?>
                            </td>
                            <td><?= $row['jabatan'] ?></td>
                            <td><?= $row['status_pernikahan'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data anggota.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>