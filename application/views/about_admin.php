<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Kami - Mandala Nusantara</title>

    <link rel="stylesheet" href="<?= base_url('styles/about_admin.css?v=' . time()) ?>" />
    <link rel="stylesheet" href="<?= base_url('styles/about_admin_extra.css?v=' . time()) ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('styles/loader.css') ?>" />
  </head>

  <body>
    <!-- LOADER -->
    <div id="page-loader"><div class="spinner"></div></div>

    <!-- NAVBAR -->
    <header class="navbar">
      <div class="logo">
        <a href="<?= site_url('landing') ?>">
          <img src="<?= base_url('assets/logo_mandala1.png') ?>" alt="logo" />
        </a>
      </div>

      <nav class="navMenu">
        <ul>
          <li><a href="<?= site_url('landing_admin') ?>">Beranda</a></li>
          <li><a href="<?= site_url('landing_admin') ?>#jelajah">Jelajah Kerajaan</a></li>
          <li><a href="<?= site_url('about_admin') ?>" class="active">Tentang Kami</a></li>
        </ul>
      </nav>

      <div class="navRight">
        <div class="btnDashboard">
          <button onclick="location.href='<?= site_url('dashboard') ?>'">
            Dashboard
          </button>
        </div>

        <div class="btnLogout">
          <button onclick="location.href='<?= site_url('landing') ?>'">
            Logout
          </button>
        </div>
      </div>
    </header>

    <main>
      <!-- HERO -->
      <section class="hero">
        <div class="heroContent fadeUp">
          <h1>Tentang Kami</h1>
          <p>
            Kenali lebih dekat tim di balik Mandala Nusantara dan misi kami dalam
            melestarikan warisan sejarah Indonesia
          </p>
        </div>
      </section>

      <!-- ABOUT WEBSITE -->
      <section class="aboutWebsite">
        <div class="aboutContainer fadeUp">
          <h2 class="fadeUp">Tentang Mandala Nusantara</h2>
          <div class="aboutContent fadeUp">
            <p>
              <strong>Mandala Nusantara</strong> adalah platform edukasi sejarah yang 
              didedikasikan untuk menelusuri dan melestarikan warisan kerajaan-kerajaan 
              megah yang pernah berdiri di Nusantara. Dari kekuatan maritim Sriwijaya 
              hingga kejayaan Majapahit, kami menghadirkan kisah-kisah agung yang 
              membentuk identitas Indonesia.
            </p>
            <p>
              Platform ini dirancang untuk memberikan pengalaman belajar sejarah yang 
              menyenangkan dan informatif bagi semua kalangan. Melalui Mandala Nusantara, 
              kami berharap dapat menginspirasi generasi muda untuk lebih mengenal dan 
              menghargai warisan budaya leluhur.
            </p>
            <p>
              Kami menyajikan informasi lengkap tentang berbagai kerajaan Nusantara, 
              termasuk sejarah, peristiwa penting, tokoh berpengaruh, dan warisan budaya 
              yang ditinggalkan. Semua dikemas dalam antarmuka yang modern dan mudah 
              diakses.
            </p>
          </div>
        </div>
      </section>

      <!-- TEAM -->
      <section class="teamSection">
        <div class="teamContainer fadeUp">
          <h2 class="fadeUp">Tim Pengembang</h2>
          <p class="teamSubtitle fadeUp">
            Kenali orang-orang hebat di balik Mandala Nusantara
          </p>
        </div>

        <div class="teamGrid fadeUp">
          <div class="teamCard fadeUp">
            <div class="teamImageWrapper">
              <img
                src="<?= base_url('assets/developers/dev1.png') ?>"
                alt="Khaliz Kanigara F. G."
                class="teamImage"
              />
            </div>
            <div class="teamInfo">
              <h3 class="teamName">Khaliz Kanigara</h3>
              <p class="teamRole">Frontend Developer</p>
            </div>
          </div>

          <div class="teamCard fadeUp">
            <div class="teamImageWrapper">
              <img
                src="<?= base_url('assets/developers/dev2.png') ?>"
                alt="Iqlimma Salsabilla N."
                class="teamImage"
              />
            </div>
            <div class="teamInfo">
              <h3 class="teamName">Iqlimma Salsabilla</h3>
              <p class="teamRole">Backend Developer</p>
            </div>
          </div>

          <div class="teamCard fadeUp">
            <div class="teamImageWrapper">
              <img
                src="<?= base_url('assets/developers/dev3.png') ?>"
                alt="Saskia Bunga F."
                class="teamImage"
              />
            </div>
            <div class="teamInfo">
              <h3 class="teamName">Saskia Bunga</h3>
              <p class="teamRole">UI/UX Designer</p>
            </div>
          </div>

          <div class="teamCard fadeUp">
            <div class="teamImageWrapper">
              <img
                src="<?= base_url('assets/developers/dev4.png') ?>"
                alt="Nayla Cahya K."
                class="teamImage"
              />
            </div>
            <div class="teamInfo">
              <h3 class="teamName">Nayla Cahya</h3>
              <p class="teamRole">UI/UX Designer</p>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
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
            <li><a href="<?= site_url('about') ?>">Tentang Kami</a></li>
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
          item.style.setProperty("--delay", `${index * 0.1}s`);
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
    </script>
    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
  </body>
</html>
