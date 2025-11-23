document.addEventListener("DOMContentLoaded", function () {
  const loader = document.getElementById("page-loader");

  // Fungsi untuk menyembunyikan loader
  function hideLoader() {
    if (loader) {
      loader.classList.add("loaded");
    }
  }

  // Fungsi untuk menampilkan loader
  window.showLoader = function () {
    if (loader) {
      loader.classList.remove("loaded");
    }
  };

  // Menyembunyikan loader pada saat halaman selesai dimuat
  window.addEventListener("load", hideLoader);

  // Fallback: jika load event tidak terjadi dengan cepat, sembunyikan setelah timeout
  setTimeout(hideLoader, 3000);

  // Menangani klik pada link
  document.addEventListener("click", function (e) {
    if (e.defaultPrevented) return; // Menghormati event yang dicegah

    const anchor = e.target.closest("a");

    if (anchor) {
      const href = anchor.getAttribute("href");
      const target = anchor.getAttribute("target");

      // Cek apakah link valid untuk navigasi
      if (
        href &&
        !href.startsWith("#") &&
        !href.startsWith("javascript:") &&
        target !== "_blank" &&
        !e.ctrlKey &&
        !e.metaKey
      ) {
        window.showLoader();
      }
    }
  });

  // Menangani tombol back/forward browser
  window.addEventListener("pageshow", function (event) {
    if (event.persisted) {
      hideLoader();
    }
  });
});
