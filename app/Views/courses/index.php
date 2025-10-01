<div class="d-flex justify-content-between align-items-center mb-3">
  <h4>Daftar Mata Kuliah</h4>
  <?php if(session()->get('role') === 'admin'): ?>
    <a href="<?= base_url('/courses/create') ?>" class="btn btn-primary btn-sm">
      + Tambah Mata Kuliah
    </a>
  <?php endif; ?>
</div>

<?php if(session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php elseif(session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<table class="table table-striped table-bordered shadow-sm">
  <thead class="table-dark">
    <tr class="text-center">
      <th style="width: 60px;">#</th>
      <th>Code</th>
      <th>Nama Mata Kuliah</th>
      <th style="width: 80px;">SKS</th>
      <th style="width: 180px;">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($courses)): ?>
      <?php $no = 1; ?> <!-- ✅ Counter manual mulai dari 1 -->
      <?php foreach($courses as $c): ?>
        <tr>
          <!-- Gunakan counter manual agar urutan selalu berurutan -->
          <td class="text-center"><?= $no++ ?></td>
          <td><?= esc($c['code']) ?></td>
          <td><?= esc($c['course_name']) ?></td>
          <td class="text-center"><?= esc($c['credits']) ?></td>
          <td class="text-center">
            <?php if(session()->get('role') === 'admin'): ?>
              <a href="<?= base_url('/courses/edit/'.$c['course_id']) ?>" 
                 class="btn btn-sm btn-warning">
                ✏ Edit
              </a>
              <a href="<?= base_url('/courses/delete/'.$c['course_id']) ?>" 
                 class="btn btn-sm btn-danger"
                 onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                🗑 Hapus
              </a>
            <?php else: ?>
              <a href="<?= base_url('/takes/enroll') ?>" 
                 class="btn btn-sm btn-success">
                ➕ Ambil
              </a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="5" class="text-center text-muted">Belum ada data mata kuliah.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
