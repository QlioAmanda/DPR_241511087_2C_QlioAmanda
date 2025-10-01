<div class="card shadow-lg p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="card-title">📝 Data Anggota DPR</h3>
        <a href="<?= base_url('anggota_dpr/tambah') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Anggota
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Jml Anak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($dataAnggota)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data anggota DPR.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($dataAnggota as $anggota): ?>
                        <tr>
                            <td><?= esc($anggota['anggota_id']) ?></td>
                            <td>
                                <?= esc($anggota['gelar_depan']) ?> <?= esc($anggota['nama_depan']) ?> <?= esc($anggota['nama_belakang']) ?> <?= esc($anggota['gelar_belakang']) ?>
                            </td>
                            <td><?= esc($anggota['jabatan']) ?></td>
                            <td><?= esc($anggota['status_kawin']) ?></td>
                            <td><?= esc($anggota['jumlah_anak']) ?></td>
                            <td>
                                <a href="<?= base_url('anggota_dpr/ubah/' . $anggota['anggota_id']) ?>" class="btn btn-sm btn-warning">Ubah</a>
                                <a href="<?= base_url('anggota_dpr/hapus/' . $anggota['anggota_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>