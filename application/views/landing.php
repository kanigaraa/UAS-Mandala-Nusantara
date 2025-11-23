<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mandala Nusantara</title>

    <link rel="stylesheet" href="<?= base_url('styles/landing.css?v=' . time()) ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('styles/loader.css') ?>" />
  </head>

  <body>
    <!-- LOADER -->
    <div id="page-loader"><div class="spinner"></div></div>

    <!-- POPUP LOGIN -->
    <?php if (!$isLoggedIn): ?>
    <div id="popupLogin" class="popupOverlay">
      <div class="popupBox">
        <h3>Silakan Login Terlebih Dahulu</h3>
        <p>Untuk mengakses detail kerajaan, kamu harus login.</p>

        <div class="popupButtons">
          <button id="closePopup">Tutup</button>
          <a href="<?= site_url('login') ?>">
            <button class="loginBtn">Login</button>
          </a>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <!-- NAVBAR -->
    <header class="navbar">
      <div class="logo">
        <a href="#home">
          <img src="<?= base_url('assets/logo_mandala1.png') ?>" alt="logo" />
        </a>
      </div>

      <nav>
        <ul>
          <li><a href="#home">Beranda</a></li>
          <li><a href="#jelajah">Jelajah Kerajaan</a></li>
          <li><a href="#about">Tentang Kami</a></li>
        </ul>
      </nav>

      <div class="btnLogin">
        <button onclick="location.href='<?= site_url('login') ?>'">
          Login
        </button>
      </div>
    </header>

    <main>
      <!-- HERO -->
      <section class="hero" id="home">
        <img src="<?= base_url('assets/hero_image.png') ?>" alt="Hero Image" />

        <div class="heroContent fadeUp">
          <h1>Menelusuri Warisan Para Raja:</h1>
          <h1 style="color: #c09f33">Temukan Kisah Agung</h1>
          <h1>Kerajaan Nusantara</h1>

          <p>
            Jelajahi kisah kerajaan-kerajaan megah yang membentuk Indonesia.
            Dari kekuatan maritim Sriwijaya hingga kejayaan Majapahit, temukan
            warisan budaya dan struktur kekuasaan yang menginspirasi.
          </p>

          <div class="btnJelajah">
            <a href="#jelajah">
              <button>Mulai Menjelajah</button>
            </a>
          </div>
        </div>
      </section>

      <!-- REKOMENDASI -->
      <section class="rekomendasi" id="rekomendasi">
        <div class="rekomendasiContainer fadeUp">
          <h1>Kisah yang Wajib Diketahui</h1>
          <p>
            Jelajahi kerajaan-kerajaan paling berpengaruh dalam sejarah
            Nusantara
          </p>
        </div>

        <div class="rekomendasiGrid">
          <?php foreach ($rekomendasi as $r): ?>
          <div class="cardRekomendasi fadeUp">
            <div class="cardImage">
              <img
                src="<?= base_url('assets/kerajaan/' . $r['gambar']) ?>"
                alt="<?= $r['nama'] ?>"
              />
            </div>

            <div class="cardContent">
              <div class="cardHeader">
                <span class="tag"><?= $r['kategori'] ?></span>
                <span class="lokasi">
                  <img
                    src="<?= base_url('assets/icon/location.svg') ?>"
                    class="lokasiIcon"
                  />
                  <?= $r['lokasi'] ?>
                </span>
              </div>

              <div class="cardTitle"><?= $r['nama'] ?></div>

              <div class="cardDesc">
                <?= word_limiter($r['deskripsi'], 20) ?>
              </div>

              <button
                class="btnSelengkapnya"
                data-url="<?= site_url('kerajaan/detail/'.$r['id']) ?>"
              >
                <img
                  src="<?= base_url('assets/icon/book.svg') ?>"
                  class="btnIcon"
                />
                Baca Selengkapnya
              </button>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- SECTION JELAJAH -->
      <section class="jelajahSection" id="jelajah">
        <div class="jelajahContainer fadeUp">
          <h1 class="jelajahSectionTitle">Jelajahi Kerajaan Nusantara</h1>
          <p class="jelajahSubtitle">
            Temukan kisah kerajaan yang paling berpengaruh dalam sejarah
            Indonesia
          </p>
        </div>

        <div class="jelajahGrid fadeUp">
          <?php foreach ($kerajaan as $k): ?>
          <div class="jelajahCard">
            <div class="jelajahTop">
              <div class="jelajahIconWrap">
                <div class="jelajahIcon">
                  <img
                    src="<?= base_url('assets/icon/' . $k['icon']) ?>"
                    class="jelajahIcon"
                    alt="icon kerajaan"
                  />
                </div>
              </div>

              <div
                class="jelajahBadge kategori-<?= strtolower(str_replace(' ', '-', $k['kategori'])) ?>"
              >
                <?= $k['kategori']; ?>
              </div>
            </div>

            <div class="jelajahCardTitle">
              <?= $k['nama']; ?>
            </div>

            <div class="jelajahLocationWrap">
              <img src="<?= base_url('assets/icon/location.svg') ?>" />
              <div class="jelajahLocationText">
                <?= $k['lokasi']; ?>
              </div>
            </div>

            <div class="jelajahDesc">
              <?= $k['deskripsi']; ?>
            </div>

            <a
              class="jelajahLink"
              href="<?= site_url('kerajaan/detail/'.$k['id']) ?>"
            >
              <span>Lihat Detail →</span>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer" id="about">
      <div class="footerContainer">
        <div class="footerCol">
          <img
            src="<?= base_url('assets/logo_footer.png') ?>"
            class="footerLogo"
          />

          <p class="footerDesc">
            Platform edukasi sejarah kerajaan Indonesia yang menyenangkan dan
            informatif untuk semua kalangan.
          </p>
        </div>

        <div class="footerCol">
          <h3 class="footerTitle">Jelajahi</h3>
          <ul class="footerList">
            <li>Semua Kerajaan</li>
            <li>Timeline Era</li>
            <li>Tokoh Bersejarah</li>
          </ul>
        </div>

        <div class="footerCol">
          <h3 class="footerTitle">Informasi</h3>
          <ul class="footerList">
            <li>Tentang Kami</li>
            <li>Referensi & Sumber</li>
            <li>Kontak</li>
          </ul>
        </div>

        <div class="footerCol">
          <h3 class="footerTitle">Ikuti Kami</h3>

          <div class="footerSocial">
            <div class="iconCircle">
              <a href="https://www.instagram.com/">
                <img
                  src="<?= base_url('assets/icon/instagram.png') ?>"
                  class="socialIcon"
                />
              </a>
            </div>

            <div class="iconCircle">
              <a href="https://www.youtube.com/">
                <img
                  src="<?= base_url('assets/icon/youtube.png') ?>"
                  class="socialIcon"
                />
              </a>
            </div>

            <div class="iconCircle">
              <a href="https://www.tiktok.com/">
                <img
                  src="<?= base_url('assets/icon/tiktok.png') ?>"
                  class="socialIcon"
                />
              </a>
            </div>
          </div>

          <p class="footerNote">
            Dapatkan update konten sejarah terbaru dan menarik.
          </p>
        </div>
      </div>
      <hr />
      <div class="footerBottom">© 2025 Mandala. Semua Hak Dilindungi.</div>
    </footer>

    <script>
            document.addEventListener("DOMContentLoaded", function () {
              const fadeItems = document.querySelectorAll(".fadeUp");

              fadeItems.forEach((item, index) => {
                item.style.setProperty("--delay", `${index * 0.05}s`);
              });

              const observer = new IntersectionObserver(
                (entries) => {
                  entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                      entry.target.classList.add("show");
                    }
                  });
                },
                { threshold: 0.2 }
              );

              fadeItems.forEach((item) => observer.observe(item));
            });

      document.addEventListener("DOMContentLoaded", function () {
          const isLoggedIn = <?= $isLoggedIn ? 'true' : 'false' ?>;

          const popup = document.getElementById("popupLogin");
          const closePopup = document.getElementById("closePopup");

          const buttons = document.querySelectorAll(".btnSelengkapnya, .jelajahLink");

          buttons.forEach(btn => {
              btn.addEventListener("click", function (e) {
                  if (!isLoggedIn) {
                      e.preventDefault();
                      popup.style.display = "flex";
                  } else {
                      if (window.showLoader) window.showLoader();
                      window.location.href = btn.dataset.url;
                  }
              });
          });

          if (closePopup) {
              closePopup.addEventListener("click", () => {
                  popup.style.display = "none";
              });
          }
      });
    </script>
    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
  </body>
</html>
