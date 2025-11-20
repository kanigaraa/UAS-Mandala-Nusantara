<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mandala Nusantara</title>

    <link rel="stylesheet" href="<?= base_url('landing.css') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>" />
  </head>

  <body>
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
        <button onclick="location.href='login.php'">Login</button>
      </div>
    </header>

    <main>
    <!-- HERO -->
    <section class="hero" id="home">
      <img src="<?= base_url('assets/hero_image.png') ?>" alt="Hero Image" />

      <div class="heroContent fade-up">
        <h1>Menelusuri Warisan Para Raja:</h1>
        <h1 style="color: #c09f33">Temukan Kisah Agung</h1>
        <h1>Kerajaan Nusantara</h1>

        <p>
          Jelajahi kisah kerajaan-kerajaan megah yang membentuk Indonesia. Dari
          kekuatan maritim Sriwijaya hingga kejayaan Majapahit, temukan warisan
          budaya dan struktur kekuasaan yang menginspirasi.
        </p>

        <div class="btnJelajah">
          <button>Mulai Menjelajah</button>
        </div>
      </div>
    </section>

    <!-- REKOMENDASI -->
    <section class="rekomendasi" id="rekomendasi">
      <div class="rekomendasiContainer fade-up">
        <h1>Kisah yang Wajib Diketahui</h1>
        <p>
          Jelajahi kerajaan-kerajaan paling berpengaruh dalam sejarah Nusantara
        </p>
      </div>

      <div class="rekomendasiGrid">
        <?php foreach ($kerajaan as $k): ?>
        <div class="card-rekomendasi fade-up">
          <!-- GAMBAR -->
          <div class="card-image">
            <img
              src="<?= base_url('assets/kerajaan/' . $k['gambar']) ?>"
              alt="<?= $k['nama'] ?>"
            />
          </div>

          <!-- ISI CARD -->
          <div class="card-content">
            <div class="card-header">
              <span class="tag"><?= $k['kategori'] ?></span>
              <span class="lokasi">
                <span class="lokasi-icon"></span>
                <?= $k['lokasi'] ?>
              </span>
            </div>

            <!-- Judul -->
            <div class="card-title"><?= $k['nama'] ?></div>

            <!-- Deskripsi -->
            <div class="card-desc">
              <?= word_limiter($k['deskripsi'], 20) ?>
            </div>

            <!-- Tombol -->
            <button class="btn-selengkapnya">
              Baca Selengkapnya
              <span class="btn-icon"></span>
            </button>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>
    </main>
    <script>
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) entry.target.classList.add("show");
          });
        },
        { threshold: 0.2 }
      );

      document
        .querySelectorAll(".fade-up")
        .forEach((el) => observer.observe(el));
    </script>
  </body>
</html>