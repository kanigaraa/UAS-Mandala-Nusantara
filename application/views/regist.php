<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar</title>

    <link rel="stylesheet" href="<?= base_url('styles/regist.css') ?>" />
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
    <div class="registContainer">
        <img src="<?= base_url('assets/logo_mandala1.png') ?>">
        <h2>Buat Akun Baru</h2>
        <div class="login">
            <p>Sudah punya akun? <a href="<?= site_url('login') ?>">Login</a></p>
        </div>
        
        <?php if ($this->session->flashdata('error')): ?>
            <div style="background: #ffebee; color: #c62828; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; border-left: 3px solid #c62828;">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div style="background: #e8f5e9; color: #2e7d32; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; border-left: 3px solid #2e7d32;">
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="inputContainer">
        <form action="<?= site_url('regist/authenticate') ?>" method="post" id="registForm">
            <div class="inputGroup">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required />
            </div>
        <div class="inputGroup">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required />
            <div class="password-requirements">
                <strong>Persyaratan kata sandi:</strong>
                <ul>
                    <li id="req-length">Minimal 8 karakter</li>
                    <li id="req-uppercase">Minimal 1 huruf kapital</li>
                    <li id="req-number">Minimal 1 angka</li>
                </ul>
            </div>
        </div>

        <div class="inputGroup">
            <label for="password_confirm">Konfirmasi Kata Sandi</label>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Konfirmasi kata sandi" required />
            <div id="password-match-error" class="error-message" style="display: none;">Kata sandi tidak cocok</div>
        </div>
        </div>
            <button type="submit" id="submitBtn">Daftar</button>
        </form>
    </div>
    
    <script>
        const passwordInput = document.getElementById('password');
        const passwordConfirm = document.getElementById('password_confirm');
        const submitBtn = document.getElementById('submitBtn');
        const form = document.getElementById('registForm');
        
        const reqLength = document.getElementById('req-length');
        const reqUppercase = document.getElementById('req-uppercase');
        const reqNumber = document.getElementById('req-number');
        const matchError = document.getElementById('password-match-error');
        const passwordRequirements = document.querySelector('.password-requirements');
        
        // Tampilkan persyaratan kata sandi saat focus
        passwordInput.addEventListener('focus', function() {
            passwordRequirements.classList.add('show');
        });
        
        // Sembunyikan persyaratan kata sandi saat blur
        passwordInput.addEventListener('blur', function() {
            passwordRequirements.classList.remove('show');
        });
        
        function validatePassword() {
            const password = passwordInput.value;
            
            // Cek panjang
            const hasLength = password.length >= 8;
            reqLength.className = hasLength ? 'valid' : 'invalid';
            
            // Cek huruf kapital
            const hasUppercase = /[A-Z]/.test(password);
            reqUppercase.className = hasUppercase ? 'valid' : 'invalid';
            
            // Cek angka
            const hasNumber = /[0-9]/.test(password);
            reqNumber.className = hasNumber ? 'valid' : 'invalid';
            
            // Update border input
            if (password.length > 0) {
                if (hasLength && hasUppercase && hasNumber) {
                    passwordInput.classList.remove('invalid');
                    passwordInput.classList.add('valid');
                } else {
                    passwordInput.classList.remove('valid');
                    passwordInput.classList.add('invalid');
                }
            } else {
                passwordInput.classList.remove('valid', 'invalid');
            }
            
            return hasLength && hasUppercase && hasNumber;
        }
        
        function validatePasswordMatch() {
            const password = passwordInput.value;
            const confirm = passwordConfirm.value;
            
            if (confirm.length > 0) {
                if (password === confirm) {
                    passwordConfirm.classList.remove('invalid');
                    passwordConfirm.classList.add('valid');
                    matchError.style.display = 'none';
                    return true;
                } else {
                    passwordConfirm.classList.remove('valid');
                    passwordConfirm.classList.add('invalid');
                    matchError.style.display = 'block';
                    return false;
                }
            } else {
                passwordConfirm.classList.remove('valid', 'invalid');
                matchError.style.display = 'none';
                return false;
            }
        }
        
        passwordInput.addEventListener('input', validatePassword);
        passwordConfirm.addEventListener('input', validatePasswordMatch);
        passwordInput.addEventListener('input', validatePasswordMatch);
        
        form.addEventListener('submit', function(e) {
            const isPasswordValid = validatePassword();
            const isMatchValid = validatePasswordMatch();
            
            if (!isPasswordValid || !isMatchValid) {
                e.preventDefault();
                alert('Pastikan kata sandi memenuhi semua persyaratan dan cocok dengan konfirmasi.');
                return false;
            }
        });
    </script>
    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
  </body>
</html>