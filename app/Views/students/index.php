<div class="card shadow-lg mt-4">
  <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
    <h4 class="mb-0">📚 Data Mahasiswa</h4>
    <a href="<?= base_url('/students/create') ?>" class="btn btn-light btn-sm">
      ➕ Tambah Mahasiswa
    </a>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Angkatan</th>
          <th>Program Studi</th>
          <th width="120">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($students)): ?>
          <?php $i = 1; foreach ($students as $s): ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= esc($s['nim']) ?></td>
              <td><?= esc($s['full_name']) ?></td>
              <td><?= esc($s['entry_year']) ?></td>
              <td>
                <?= $s['major'] ? esc($s['major']) : '<span class="badge bg-secondary">Belum diisi</span>' ?>
              </td>
              <td>
                <a href="<?= base_url('/students/delete/'.$s['student_id']) ?>"
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Yakin hapus <?= esc($s['full_name']) ?> ?')">
                  🗑 Hapus
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center text-muted">Belum ada data mahasiswa</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
