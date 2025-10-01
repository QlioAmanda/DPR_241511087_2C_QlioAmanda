<div class="row">
  <div class="col-md-8">
    <div class="card mb-3 shadow-sm">
      <div class="card-body">
        <h4 class="card-title">Dashboard Admin</h4>
        <p>Selamat datang, <?= esc(session()->get('full_name')) ?>. Gunakan menu untuk mengelola data mahasiswa dan mata kuliah.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card text-white" style="background: linear-gradient(90deg,#06b6d4,#7c3aed);">
          <div class="card-body">
            <h5>Mahasiswa</h5>
            <p class="display-6"><?= $totalStudents ?></p>
            <a class="btn btn-sm btn-light" href="<?= base_url('/students') ?>">Kelola Mahasiswa</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-white" style="background: linear-gradient(90deg,#ff7a18,#af002d);">
          <div class="card-body">
            <h5>Mata Kuliah</h5>
            <p class="display-6"><?= $totalCourses ?></p>
            <a class="btn btn-sm btn-light" href="<?= base_url('/courses') ?>">Kelola Mata Kuliah</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5>Info Cepat</h5>
        <ul class="list-unstyled">
          <li><strong>User:</strong> <?= esc(session()->get('username')) ?></li>
          <li><strong>Role:</strong> <?= esc(session()->get('role')) ?></li>
          <li><strong>Waktu:</strong> <?= date('Y-m-d H:i') ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
