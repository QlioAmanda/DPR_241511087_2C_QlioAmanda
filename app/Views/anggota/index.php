<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Kelola Data Anggota DPR</h3>
        <a href="/admin/anggota/create" class="btn btn-primary">+ Tambah Data Anggota</a>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="/admin/anggota" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari berdasarkan Nama, Jabatan, atau ID..." name="keyword">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

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
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($anggota)): ?>
                        <?php foreach($anggota as $row): ?>
                        <tr>
                            <td><?= esc($row['id_anggota']) ?></td>
                            <td>
                                <?= trim(esc($row['gelar_depan']) . ' ' . esc($row['nama_depan']) . ' ' . esc($row['nama_belakang']) . ', ' . esc($row['gelar_belakang']), ' ,') ?>
                            </td>
                            <td><?= esc($row['jabatan']) ?></td>
                            <td><?= esc($row['status_pernikahan']) ?></td>
                            <td class="text-center">
                                <a href="/admin/anggota/edit/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/admin/anggota/delete/<?= $row['id_anggota'] ?>" 
                                    class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Data tidak ditemukan atau belum ada.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>