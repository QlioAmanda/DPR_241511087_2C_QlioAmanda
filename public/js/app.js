// === DATA DUMMY (hanya untuk demo JS, bukan untuk DB) ===
const students = [
  { id: 1, name: "Qlio Amanda", nim: "241511087", major: "D3 Teknik Informatika" }
];

let enrolledCourses = []; // hasil KRS (simulasi untuk JS UI)

// === DOM READY ===
document.addEventListener("DOMContentLoaded", () => {
  const totalEl = document.getElementById("total-sks");
  const form = document.getElementById("enroll-form");
  const errorMsg = document.getElementById("error-msg");
  const checkboxes = document.querySelectorAll(".course-checkbox");

  // === 1. Hitung total SKS saat centang ===
  if (checkboxes.length > 0) {
    checkboxes.forEach(cb => {
      cb.addEventListener("change", () => {
        let total = 0;
        checkboxes.forEach(c => {
          if (c.checked) total += parseInt(c.dataset.credits);
        });
        totalEl.textContent = total;
      });
    });
  }

  // === 2. Validasi submit (minimal pilih 1) ===
  if (form) {
    form.addEventListener("submit", (e) => {
      errorMsg.textContent = "";
      let checked = Array.from(checkboxes).some(cb => cb.checked);
      if (!checked) {
        e.preventDefault(); // cegah kirim ke server
        errorMsg.textContent = "⚠️ Pilih minimal 1 mata kuliah!";
      }
      // ❌ tidak pakai preventDefault() lagi di sini,
      // supaya form tetap dikirim ke controller Takes::store
    });
  }

  // === 3. Menu aktif di sidebar ===
  const menuLinks = document.querySelectorAll(".sidebar a");
  menuLinks.forEach(link => {
    if (link.href === window.location.href) {
      link.style.background = "rgba(255,255,255,0.3)";
      link.style.borderRadius = "8px";
    }
  });
});
