<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Kerajaan Nusantara - Mandala Nusantara</title>
    
    <link rel="stylesheet" href="<?= base_url('styles/quiz.css') ?>">
    <link rel="stylesheet" href="<?= base_url('styles/loader.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>">
</head>
<body>
    <!-- LOADER -->
    <div id="page-loader"><div class="spinner"></div></div>

    <!-- POPUP LOGIN -->
    <?php if (!$isLoggedIn): ?>
    <div id="popupLogin" class="popupOverlay">
      <div class="popupBox">
        <h3>Silakan Login Terlebih Dahulu</h3>
        <p>Untuk memulai quiz, kamu harus login.</p>

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
            <a href="<?= $isLoggedIn ? site_url('landing_logged') : site_url('landing') ?>">
                <img src="<?= base_url('assets/logo_mandala1.png') ?>" alt="logo">
            </a>
        </div>

        <nav>
            <ul>
                <li><a href="<?= $isLoggedIn ? site_url('landing_logged') : site_url('landing') ?>">Beranda</a></li>
                <li><a href="<?= $isLoggedIn ? site_url('landing_logged#jelajah') : site_url('landing#jelajah') ?>">Jelajah Kerajaan</a></li>
                <li><a href="<?= site_url('quiz') ?>">Quiz</a></li>
                <li><a href="<?= $isLoggedIn ? site_url('about_logged') : site_url('about') ?>">Tentang Kami</a></li>
            </ul>
        </nav>

        <div class="btnLogout">
            <?php if ($isLoggedIn): ?>
                <button onclick="location.href='<?= site_url('login/logout') ?>'">Logout</button>
            <?php else: ?>
                <button onclick="location.href='<?= site_url('login') ?>'">Login</button>
            <?php endif; ?>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="quizHero">
        <img src="<?= base_url('assets/hero_image.png') ?>" alt="Hero Image">
        <div class="quizHeroContent fadeUp">
            <h1>Quiz Kerajaan Nusantara</h1>
            <p>Uji pengetahuan Anda tentang sejarah kerajaan-kerajaan besar di Indonesia</p>
        </div>
    </section>

    <!-- DIFFICULTY SELECTION SCREEN -->
    <div class="selectionContainer fadeUp" id="selectionContainer">
        <h2 class="selectionTitle">Pilih Tingkat Kesulitan</h2>
        <p class="selectionSubtitle">Setiap tingkat kesulitan berisi 10 pertanyaan tentang sejarah kerajaan Nusantara</p>
        
        <div class="difficultyCards">
            <div class="difficultyCard mudah fadeUp" data-url="<?= site_url('quiz/mudah') ?>" style="cursor: pointer;">
                <h3>Mudah</h3>
                <p>Pertanyaan dasar tentang kerajaan-kerajaan besar Nusantara</p>
                <ul>
                    <li>10 Pertanyaan</li>
                    <li>Cocok untuk pemula</li>
                    <li>Tingkat dasar</li>
                </ul>
            </div>

            <div class="difficultyCard sedang fadeUp" data-url="<?= site_url('quiz/sedang') ?>" style="cursor: pointer;">
                <h3>Sedang</h3>
                <p>Pertanyaan menengah yang memerlukan pemahaman lebih mendalam</p>
                <ul>
                    <li>10 Pertanyaan</li>
                    <li>Cocok untuk yang sudah mengenal sejarah</li>
                    <li>Tingkat menengah</li>
                </ul>
            </div>

            <div class="difficultyCard sulit fadeUp" data-url="<?= site_url('quiz/sulit') ?>" style="cursor: pointer;">
                <h3>Sulit</h3>
                <p>Pertanyaan advanced untuk menguji pengetahuan mendalam Anda</p>
                <ul>
                    <li>10 Pertanyaan</li>
                    <li>Cocok untuk ahli sejarah</li>
                    <li>Tingkat lanjut</li>
                </ul>
            </div>
        </div>

        <div style="margin-top: 40px;">
            <button class="saveBtn" id="btnLeaderboard" data-url="<?= site_url('leaderboard') ?>">
                Lihat Leaderboard
            </button>
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
                    <li><a href="<?= $isLoggedIn ? site_url('about_logged') : site_url('about') ?>">Tentang Kami</a></li>
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
                    <div class="iconCircle">
                        <a href="https://www.youtube.com/">
                            <img src="<?= base_url('assets/icon/youtube.png') ?>" class="socialIcon">
                        </a>
                    </div>
                    <div class="iconCircle">
                        <a href="https://www.tiktok.com/">
                            <img src="<?= base_url('assets/icon/tiktok.png') ?>" class="socialIcon">
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
            const isLoggedIn = <?= $isLoggedIn ? 'true' : 'false' ?>;
            const popup = document.getElementById("popupLogin");
            const closePopup = document.getElementById("closePopup");
            const cards = document.querySelectorAll(".difficultyCard");

            cards.forEach(card => {
                card.addEventListener("click", function (e) {
                    if (!isLoggedIn) {
                        e.preventDefault();
                        if (popup) popup.style.display = "flex";
                    } else {
                        window.location.href = card.dataset.url;
                    }
                });
            });

            const btnLeaderboard = document.getElementById("btnLeaderboard");
            if (btnLeaderboard) {
                btnLeaderboard.addEventListener("click", function(e) {
                    if (!isLoggedIn) {
                        e.preventDefault();
                        if (popup) popup.style.display = "flex";
                    } else {
                        window.location.href = this.dataset.url;
                    }
                });
            }

            if (closePopup) {
                closePopup.addEventListener("click", () => {
                    popup.style.display = "none";
                });
            }

            const fadeItems = document.querySelectorAll(".fadeUp");

            fadeItems.forEach((item, index) => {
                item.style.setProperty("--delay", `${index * 0.1}s`);
                
                if (item.classList.contains('quizHeroContent')) {
                    setTimeout(() => {
                        item.classList.add("show");
                    }, 100);
                }
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

            fadeItems.forEach((item) => {
                if (!item.classList.contains('quizHeroContent')) {
                    observer.observe(item);
                }
            });
        });
    </script>

    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
</body>
</html>
