<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan Peringkat - Mandala Nusantara</title>
    
    <link rel="stylesheet" href="<?= base_url('styles/leaderboard.css?v=' . time()) ?>">
    <link rel="stylesheet" href="<?= base_url('styles/loader.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>">
</head>
<body>
    <!-- LOADER -->
    <div id="page-loader"><div class="spinner"></div></div>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="logo">
            <a href="<?= site_url('landing_logged') ?>">
                <img src="<?= base_url('assets/logo_mandala1.png') ?>" alt="logo">
            </a>
        </div>

        <nav>
            <ul>
                <li><a href="<?= site_url('landing_logged') ?>">Beranda</a></li>
                <li><a href="<?= site_url('landing_logged#jelajah') ?>">Jelajah Kerajaan</a></li>
                <li><a href="<?= site_url('quiz') ?>">Quiz</a></li>
                <li><a href="<?= site_url('about_logged') ?>">Tentang Kami</a></li>
            </ul>
        </nav>

        <div class="btnLogout">
            <button onclick="location.href='<?= site_url('login/logout') ?>'">
                Logout
            </button>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="leaderboardHero">
        <img src="<?= base_url('assets/hero_image.png') ?>" alt="Hero Image">
        <div class="heroContent fadeUp">
            <h1>Papan Peringkat</h1>
            <p>Para pejuang sejarah terbaik yang telah membuktikan pengetahuannya tentang Nusantara</p>
        </div>
    </section>

    <!-- LEADERBOARD CONTAINER -->
    <div class="leaderboardContainer fadeUp">
        <div class="leaderboardCard">
            <div class="tableWrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Peringkat</th>
                            <th>Nama Pejuang</th>
                            <th>Kategori</th>
                            <th>Skor</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($top_skor)): ?>
                            <?php $no = 1; foreach($top_skor as $row): ?>
                            <tr class="<?= $no <= 3 ? 'rank-' . $no : '' ?>">
                                <td data-label="Peringkat">
                                    <?php if($no == 1): ?>
                                        <span class="rank-icon">🥇</span>
                                    <?php elseif($no == 2): ?>
                                        <span class="rank-icon">🥈</span>
                                    <?php elseif($no == 3): ?>
                                        <span class="rank-icon">🥉</span>
                                    <?php else: ?>
                                        #
                                    <?php endif; ?>
                                    <?= $no++; ?>
                                </td>
                                <td data-label="Nama Pejuang"><?= $format_nama($row['email']); ?></td>
                                <td data-label="Kategori"><?= $row['kategori']; ?></td>
                                <td data-label="Skor"><?= $row['skor']; ?></td>
                                <td data-label="Tanggal"><?= date('d M Y', strtotime($row['tanggal'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 40px;">
                                    Belum ada data skor. Jadilah yang pertama menaklukkan tantangan ini!
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div style="text-align: center;">
                <a href="<?= site_url('quiz'); ?>" class="btn-back">← Kembali ke Quiz</a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footerContainer">
            <div class="footerCol">
                <img src="<?= base_url('assets/logo_footer.png') ?>" class="footerLogo">
                <p class="footerDesc">
                    Platform edukasi sejarah kerajaan Indonesia yang menyenangkan dan informatif untuk semua kalangan.
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
                    <li><a href="<?= site_url('about_logged') ?>">Tentang Kami</a></li>
                    <li>Referensi & Sumber</li>
                    <li>Kontak</li>
                </ul>
            </div>
            <div class="footerCol">
                <h3 class="footerTitle">Ikuti Kami</h3>
                <div class="footerSocial">
                    <div class="iconCircle">
                        <a href="https://www.instagram.com/">
                            <img src="<?= base_url('assets/icon/instagram.png') ?>" class="socialIcon">
                        </a>
                    </div>
                </div>
                <p class="footerNote">
                    Dapatkan update konten sejarah terbaru dan menarik.
                </p>
            </div>
        </div>
        <hr>
        <div class="footerBottom">© 2025 Mandala. Semua Hak Dilindungi.</div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const fadeItems = document.querySelectorAll(".fadeUp");
            fadeItems.forEach((item, index) => {
                item.style.setProperty("--delay", `${index * 0.1}s`);
                setTimeout(() => { item.classList.add("show"); }, 100);
            });
        });
    </script>
    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
</body>
</html>