<div class="container">
  <!-- Blok Opsi di Atas -->
  <div class="row mb-4 text-center">
    <div class="col-md-4">
      <div class="card shadow-sm p-4" style="border-radius:12px; background:#06b6d4; color:white;">
        <h2>📚</h2>
        <h6>Data</h6>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm p-4" style="border-radius:12px; background:#3b82f6; color:white;">
        <h2>⚙️</h2>
        <h6>Pengaturan</h6>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm p-4" style="border-radius:12px; background:#9333ea; color:white;">
        <h2>👤</h2>
        <h6>Profil</h6>
      </div>
    </div>
  </div>

  <!-- Card Welcome -->
  <div class="d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-5 text-center" style="border-radius:16px; max-width:600px; width:100%; background:white;">
      <h1 class="mb-3">👋 Selamat Datang</h1>
      <h3 class="fw-bold text-primary"><?= esc($full_name) ?></h3>
      <p class="text-muted">Anda berhasil login ke sistem 🚀</p>
    </div>
  </div>
</div>
