<div class="row">
  <!-- Kiri: Profile + KRS -->
  <div class="col-md-8">
    <!-- Card sapaan -->
    <div class="card shadow-lg border-0 mb-3" style="background: linear-gradient(90deg,#06b6d4,#7c3aed);">
      <div class="card-body text-white">
        <h4 class="mb-1">Halo, <?= esc(session()->get('full_name')) ?></h4>
        <p class="mb-2">
          NIM: <strong><?= esc($student['nim'] ?? '-') ?></strong><br>
          Program Studi: <strong><?= esc($student['major'] ?? 'Teknik Informatika') ?></strong>
        </p>
        <a href="<?= base_url('/takes/enroll') ?>" class="btn btn-light btn-sm fw-bold">+ Ambil Mata Kuliah (KRS)</a>
      </div>
    </div>

    <!-- Card daftar KRS -->
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="mb-3">📘 Mata Kuliah yang Diambil</h5>
        <?php if (empty($enrolled)): ?>
          <p class="text-muted">Belum ada mata kuliah yang diambil.</p>
        <?php else: ?>
          <div class="list-group">
            <?php foreach($enrolled as $e): ?>
              <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <strong><?= esc($e['course_name']) ?></strong><br>
                  <small class="text-muted">Semester: <?= esc($e['semester']) ?></small>
                </div>
                <span class="badge bg-gradient text-white px-3 py-2"
                      style="background: linear-gradient(90deg,#7c3aed,#06b6d4);">
                  <?= esc($e['credits']) ?> SKS
                </span>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Kanan: Detail akun -->
  <div class="col-md-4">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-gradient text-white fw-bold"
           style="background: linear-gradient(90deg,#7c3aed,#06b6d4);">
        👤 Detail Akun
      </div>
      <div class="card-body">
        <p><strong>Nama:</strong> <?= esc(session()->get('full_name')) ?></p>
        <p><strong>Username:</strong> <?= esc(session()->get('username')) ?></p>
        <p><strong>Role:</strong> <?= ucfirst(session()->get('role')) ?></p>
      </div>
    </div>
  </div>
</div>
