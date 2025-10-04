<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Kelola Komponen Gaji & Tunjangan</h3>
        <a href="/admin/komponengaji/create" class="btn btn-primary">+ Tambah Komponen</a>
    </div>

    <!-- Form Pencarian -->
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="/admin/komponengaji" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari komponen gaji..." name="keyword">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Notifikasi -->
    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <!-- Tabel Data -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Komponen</th>
                            <th>Kategori</th>
                            <th>Jabatan</th>
                            <th>Nominal</th>
                            <th>Satuan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($komponen)): ?>
                        <?php foreach($komponen as $item): ?>
                        <tr>
                            <!-- PERBAIKAN: Gunakan 'id_komponen_gaji' -->
                            <td><?= esc($item['id_komponen_gaji']) ?></td>
                            <td><?= esc($item['nama_komponen']) ?></td>
                            <td><?= esc($item['kategori']) ?></td>
                            <td><?= esc($item['jabatan']) ?></td>
                            <td>Rp <?= number_format($item['nominal'], 0, ',', '.') ?></td>
                            <td><?= esc($item['satuan']) ?></td>
                            <td class="text-center">
                                <!-- PERBAIKAN: Gunakan 'id_komponen_gaji' -->
                                <a href="/admin/komponengaji/edit/<?= $item['id_komponen_gaji'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/admin/komponengaji/delete/<?= $item['id_komponen_gaji'] ?>" 
                                    class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus komponen ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Data tidak ditemukan atau belum ada.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
