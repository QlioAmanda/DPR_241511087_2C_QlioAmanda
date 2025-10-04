<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<style>
    .dashboard-header {
      background: #dc3545; color: #fff; padding: 20px;
      border-radius: 10px; text-align: center; margin-bottom: 30px;
    }
    .card-custom {
      border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }
    .card-custom:hover { transform: translateY(-5px); }
</style>

<div class="container">
  <div class="dashboard-header">
    <h1>Selamat Datang, <?= esc(session()->get('nama_depan')) ?>!</h1>
    <p>APLIKASI PENGHITUNGAN & TRANSPARANSI GAJI DPR</p>
  </div>

  <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card card-custom">
        <div class="card-body text-center">
          <h4 class="card-title">Data Anggota</h4>
          <p class="card-text">Lihat atau kelola data anggota DPR.</p>
          
          <?php if (session()->get('role') === 'Admin'): ?>
            <a href="/admin/anggota" class="btn btn-primary">Kelola Data (Admin)</a>
          <?php else: ?>
            <a href="/anggota" class="btn btn-secondary">Lihat Data (Publik)</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    </div>
</div>
<?= $this->endSection() ?>