<div class="container py-4">
  <h3 class="mb-4">Ambil Mata Kuliah (KRS)</h3>

  <form method="post" action="<?= base_url('/takes/store') ?>" id="enroll-form">
    <div class="mb-3">
      <label class="form-label">Pilih Mata Kuliah</label>
      <div class="list-group">
        <?php foreach ($courses as $course): ?>
          <label class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <input 
                type="checkbox" 
                name="course_ids[]" 
                value="<?= $course['course_id'] ?>" 
                data-credits="<?= $course['credits'] ?>"
                class="form-check-input me-2 course-checkbox">
              <?= esc($course['course_name']) ?>
            </div>
            <span class="badge bg-primary"><?= esc($course['credits']) ?> SKS</span>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Pesan Error -->
    <p id="error-msg" class="text-danger fw-bold"></p>

    <!-- Total SKS -->
    <div class="mb-3 alert alert-info">
      <strong>Total SKS: <span id="total-sks">0</span></strong>
    </div>

    <div class="mb-3">
      <label for="semester" class="form-label">Semester</label>
      <select name="semester" id="semester" class="form-select" required>
        <option value="">-- Pilih Semester --</option>
        <optgroup label="Semester Ganjil">
          <option value="1">1 (Ganjil)</option>
          <option value="3">3 (Ganjil)</option>
          <option value="5">5 (Ganjil)</option>
          <option value="7">7 (Ganjil)</option>
        </optgroup>
        <optgroup label="Semester Genap">
          <option value="2">2 (Genap)</option>
          <option value="4">4 (Genap)</option>
          <option value="6">6 (Genap)</option>
          <option value="8">8 (Genap)</option>
        </optgroup>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('/takes') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("enroll-form");
    const checkboxes = document.querySelectorAll(".course-checkbox");
    const totalEl = document.getElementById("total-sks");
    const errorMsg = document.getElementById("error-msg");
    const semester = document.getElementById("semester");

    // Hitung total SKS real-time
    checkboxes.forEach(cb => {
      cb.addEventListener("change", () => {
        let total = 0;
        checkboxes.forEach(c => {
          if (c.checked) total += parseInt(c.dataset.credits);
        });
        totalEl.textContent = total;
      });
    });

    // Validasi sebelum submit
    form.addEventListener("submit", (e) => {
      let checked = Array.from(checkboxes).some(cb => cb.checked);
      errorMsg.textContent = "";
      semester.classList.remove("is-invalid");

      if (!checked) {
        e.preventDefault();
        errorMsg.textContent = "⚠️ Pilih minimal 1 mata kuliah!";
        return;
      }

      if (!semester.value) {
        e.preventDefault();
        errorMsg.textContent = "⚠️ Semester wajib dipilih!";
        semester.classList.add("is-invalid");
        return;
      }
    });
  });
</script>
