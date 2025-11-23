<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title><?= $kingdom->nama ?></title>
    <link
      rel="stylesheet"
      href="<?= base_url('styles/detail.css') ?>"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>" />
  </head>

  <body>
    <div class="container">
      <a href="<?= site_url('landing_logged') ?>" class="btn-back">
        ← Kembali ke Beranda
      </a>

      <!-- HERO SECTION -->
      <section class="hero-section">
        <div class="hero-content">
          <h1 class="title"><?= $kingdom->nama ?></h1>
          <p class="subtitle"><?= $kingdom->subjudul ?></p>
        </div>
        
        <div class="hero-image">
          <img src="<?= base_url('assets/detail/'.$kingdom->gambar) ?>" alt="<?= $kingdom->nama ?>" />
        </div>
      </section>

      <!-- MAIN CONTENT -->
      <section class="main-content">
        <!-- Deskripsi -->
        <div class="description-box">
          <p class="description"><?= $kingdom->deskripsi ?></p>
        </div>

      <!-- TIMELINE -->
      <div class="box timeline">
        <h2>Timeline</h2>
        <ul class="timeline-list">
          <?php foreach($timeline as $t): ?>
          <li>
            <b><?= $t->tahun ?></b> —
            <?= $t->isi ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- WARISAN BUDAYA -->
      <div class="box warisan">
        <h2>Warisan Budaya</h2>

        <div class="warisan-grid">
          <?php foreach($warisan as $w): ?>
          <div class="warisan-item">
            <img src="<?= base_url('assets/warisan/'.$w->ikon) ?>" alt="<?= $w->nama ?>" />
            <h3><?= $w->nama ?></h3>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      </section>
    </div>
  </body>
</html>
