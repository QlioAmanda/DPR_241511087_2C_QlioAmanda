<div class="container py-4">
  <h3 class="mb-4">Kartu Rencana Studi (KRS)</h3>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <a href="<?= base_url('/takes/enroll') ?>" class="btn btn-primary mb-3">+ Tambah Mata Kuliah</a>

  <?php if (! empty($enrolled)): ?>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Mata Kuliah</th>
          <th>Semester</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($enrolled as $i => $row): ?>
          <tr>
            <td><?= $i+1 ?></td>
            <td><?= esc($row['course_name']) ?></td>
            <td><?= esc($row['semester']) ?></td>
            <td>
              <a href="<?= base_url('/takes/unenroll/'.$row['take_id']) ?>" 
                 class="btn btn-sm btn-danger btn-delete"
                 data-course="<?= esc($row['course_name']) ?>"
                 data-credits="<?= esc($row['credits'] ?? '-') ?>">
                Batal
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-info">Belum ada mata kuliah yang diambil.</div>
  <?php endif; ?>
</div>
