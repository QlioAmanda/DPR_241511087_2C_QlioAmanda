<?php $isEdit = isset($course); ?>
<div class="card shadow-sm">
  <div class="card-body">
    <h5><?= $isEdit ? 'Edit' : 'Tambah' ?> Mata Kuliah</h5>
    <form action="<?= base_url($isEdit ? '/courses/update/'.$course['course_id'] : '/courses/store') ?>" method="post">
      <div class="mb-3">
        <label>Nama Mata Kuliah</label>
        <input name="course_name" class="form-control" value="<?= $isEdit ? esc($course['course_name']):'' ?>" required>
      </div>
      <div class="mb-3">
        <label>Code</label>
        <input name="code" class="form-control" value="<?= $isEdit ? esc($course['code']):'' ?>" required>
      </div>
      <div class="mb-3">
        <label>SKS</label>
        <input type="number" name="credits" class="form-control" value="<?= $isEdit ? esc($course['credits']):3 ?>" required>
      </div>
      <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control"><?= $isEdit ? esc($course['description']):'' ?></textarea>
      </div>
      <button class="btn btn-primary"><?= $isEdit ? 'Update' : 'Simpan' ?></button>
    </form>
  </div>
</div>
