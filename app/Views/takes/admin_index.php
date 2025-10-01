<div class="container py-4">
  <h3 class="mb-4">Data KRS Mahasiswa</h3>

  <!-- Notifikasi flash message -->
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <?php if (! empty($enrolled)): ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Semester</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($enrolled as $i => $row): ?>
            <tr>
              <td><?= $i + 1 ?></td>
              <td><?= esc($row['nim']) ?></td>
              <td><?= esc($row['full_name']) ?></td>
              <td><?= esc($row['course_name']) ?></td>
              <td><?= esc($row['semester']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-info">Belum ada data KRS mahasiswa.</div>
  <?php endif; ?>
</div>
