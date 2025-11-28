<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Sulit - Mandala Nusantara</title>
    
    <link rel="stylesheet" href="<?= base_url('styles/quiz.css?v=' . time()) ?>">
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
    <section class="quizHero" style="height: 40vh; min-height: 300px; position: relative;">
        <img src="<?= base_url('assets/hero_image.png') ?>" alt="Hero Image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
        <div class="quizHeroContent fadeUp" style="position: relative; z-index: 1; padding-top: 80px;">
            <h1>Quiz Tingkat Sulit</h1>
            <p>Tantangan untuk para ahli sejarah Nusantara</p>
        </div>
    </section>

    <!-- QUIZ CONTAINER -->
    <div class="quizContainer" id="quizContainer" style="display: block; margin: 40px auto; position: relative; z-index: 10;">
        <button class="btn-back-selection" onclick="location.href='<?= site_url('quiz') ?>'">← Kembali ke Pilihan Tingkat</button>
        
        <div class="progressBar">
            <div class="progressFill" id="progressFill"></div>
        </div>

        <div class="resultsContainer" id="resultsContainer">
            <h2 class="resultsTitle">Quiz Selesai!</h2>
            <div class="resultsScore" id="resultsScore">0/10</div>
            <p class="resultsMessage" id="resultsMessage">Bagus! Terus tingkatkan pengetahuan Anda tentang sejarah kerajaan Nusantara.</p>
            
            <div>
                <button class="restartBtn" onclick="location.reload()">Ulangi Quiz</button>
                <a href="<?= site_url('quiz') ?>" class="homeBtn">Pilih Tingkat Lain</a>
            </div>

            <form action="<?= site_url('leaderboard/simpan'); ?>" method="POST">
                <input type="hidden" name="skor" id="inputSkor"> 
                <input type="hidden" name="kategori" value="Sulit">
                
                <button type="submit" class="saveBtn">
                    Simpan Skor & Lihat Peringkat
                </button>
            </form>

            <script>
                document.getElementById('inputSkor').value = percentage; 
            </script>
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

    <textarea id="quizData" style="display:none;"><?php echo htmlspecialchars(json_encode($questions), ENT_QUOTES, 'UTF-8'); ?></textarea>

    <!-- QUIZ JAVASCRIPT -->
    <script type="text/javascript">
        let currentQuestion = 1;
        let score = 0;
        let answers = {};
        let filteredQuestions = [];
        
        try {
            const rawData = document.getElementById('quizData').value;
            if (rawData) {
                filteredQuestions = JSON.parse(rawData);
                filteredQuestions = filteredQuestions.map((q, index) => ({
                    ...q,
                    displayId: index + 1
                }));
                console.log('Questions loaded:', filteredQuestions.length);
                
                loadQuestions();
                showQuestion(1);
                updateProgress();
            } else {
                console.error('Quiz data is empty');
                alert('Gagal memuat data quiz.');
            }
        } catch(e) {
            console.error('Error parsing questions:', e);
            alert('Terjadi kesalahan sistem.');
        }

        function loadQuestions() {
            const progressBar = document.querySelector('.progressBar');
            
            filteredQuestions.forEach((q, index) => {
                const questionCard = document.createElement('div');
                questionCard.className = 'questionCard';
                questionCard.dataset.question = q.displayId;
                
                let optionsHTML = '';
                Object.keys(q.options).forEach(key => {
                    optionsHTML += `<button class="optionBtn" data-answer="${key}" data-correct="${q.correct}">
                        <strong>${key}.</strong> ${q.options[key]}
                    </button>`;
                });

                const navHTML = index > 0 
                    ? `<button class="navBtn secondary prevBtn">← Sebelumnya</button>`
                    : '<div></div>';
                
                const actionHTML = index < filteredQuestions.length - 1
                    ? `<button class="navBtn nextBtn" disabled>Selanjutnya →</button>`
                    : `<button class="navBtn finishBtn" disabled>Selesai</button>`;

                questionCard.innerHTML = `
                    <div class="questionNumber">
                        Pertanyaan ${q.displayId} dari ${filteredQuestions.length}
                        <span class="difficultyBadge ${q.difficulty.toLowerCase()}">${q.difficulty}</span>
                    </div>
                    <div class="questionText">${q.question}</div>
                    
                    <div class="optionsContainer">
                        ${optionsHTML}
                    </div>

                    <div class="quizNavigation">
                        ${navHTML}
                        ${actionHTML}
                    </div>
                `;

                progressBar.insertAdjacentElement('afterend', questionCard);
            });

            addEventListeners();
        }

        function addEventListeners() {
            document.querySelectorAll('.optionBtn').forEach(btn => {
                btn.addEventListener('click', function() {
                    selectAnswer(this);
                });
            });

            document.querySelectorAll('.nextBtn').forEach(btn => {
                btn.addEventListener('click', nextQuestion);
            });

            document.querySelectorAll('.prevBtn').forEach(btn => {
                btn.addEventListener('click', prevQuestion);
            });

            document.querySelectorAll('.finishBtn').forEach(btn => {
                btn.addEventListener('click', finishQuiz);
            });
        }

        function showQuestion(num) {
            document.querySelectorAll('.questionCard').forEach(card => {
                card.classList.remove('active');
            });

            const targetCard = document.querySelector(`[data-question="${num}"]`);
            if (targetCard) {
                targetCard.classList.add('active');
                currentQuestion = num;
                updateProgress();

                if (answers[num]) {
                    const selectedBtn = targetCard.querySelector(`[data-answer="${answers[num]}"]`);
                    if (selectedBtn) {
                        selectedBtn.classList.add('selected');
                        enableNavigation(targetCard);
                    }
                }
            }
        }

        function selectAnswer(btn) {
            const card = btn.closest('.questionCard');
            const questionNum = parseInt(card.dataset.question);
            card.querySelectorAll('.optionBtn').forEach(b => {
                b.classList.remove('selected');
            });

            btn.classList.add('selected');
            answers[questionNum] = btn.dataset.answer;
            enableNavigation(card);
        }

        function enableNavigation(card) {
            const nextBtn = card.querySelector('.nextBtn');
            const finishBtn = card.querySelector('.finishBtn');

            if (nextBtn) nextBtn.disabled = false;
            if (finishBtn) finishBtn.disabled = false;
        }

        function nextQuestion() {
            if (currentQuestion < filteredQuestions.length) {
                showQuestion(currentQuestion + 1);
            }
        }

        function prevQuestion() {
            if (currentQuestion > 1) {
                showQuestion(currentQuestion - 1);
            }
        }

        function updateProgress() {
            const progress = (currentQuestion / filteredQuestions.length) * 100;
            document.getElementById('progressFill').style.width = progress + '%';
        }

        function finishQuiz() {
            score = 0;
            document.querySelectorAll('.questionCard').forEach(card => {
                const questionNum = parseInt(card.dataset.question);
                const userAnswer = answers[questionNum];
                const correctAnswer = card.querySelector('.optionBtn').dataset.correct;

                if (userAnswer === correctAnswer) {
                    score++;
                }

                card.querySelectorAll('.optionBtn').forEach(btn => {
                    btn.disabled = true;
                    if (btn.dataset.answer === correctAnswer) {
                        btn.classList.add('correct');
                    } else if (btn.dataset.answer === userAnswer && userAnswer !== correctAnswer) {
                        btn.classList.add('incorrect');
                    }
                });
            });
            showResults();
        }

        function showResults() {
            document.querySelectorAll('.questionCard').forEach(card => {
                card.style.display = 'none';
            });
            document.querySelector('.btn-back-selection').style.display = 'none';

            const percentage = (score / filteredQuestions.length) * 100;
            document.getElementById('resultsScore').textContent = `${score}/${filteredQuestions.length}`;
            
            let message;
            if (percentage >= 80) {
                message = 'Luar biasa! Anda benar-benar ahli sejarah kerajaan Nusantara!';
            } else if (percentage >= 60) {
                message = 'Bagus sekali! Pengetahuan Anda tentang kerajaan Nusantara cukup baik.';
            } else if (percentage >= 40) {
                message = 'Tidak buruk! Terus belajar untuk meningkatkan pengetahuan Anda.';
            } else {
                message = 'Jangan menyerah! Pelajari lebih lanjut tentang kerajaan Nusantara dan coba lagi.';
            }

            document.getElementById('resultsMessage').textContent = message;
            document.getElementById('resultsContainer').classList.add('show');
            document.getElementById('resultsContainer').scrollIntoView({ behavior: 'smooth' });

            // Set nilai input skor untuk form
            document.getElementById('inputSkor').value = percentage;
        }
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const fadeItems = document.querySelectorAll(".fadeUp");
            fadeItems.forEach((item, index) => {
                item.style.setProperty("--delay", `${index * 0.1}s`);
                if (item.classList.contains('quizHeroContent')) {
                    setTimeout(() => { item.classList.add("show"); }, 100);
                }
            });
        });
    </script>
    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
</body>
</html>
