<?php if ($this->session->flashdata('error')): ?>
    <p style="color:red"><?= $this->session->flashdata('error') ?></p>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <p style="color:green"><?= $this->session->flashdata('success') ?></p>
<?php endif; ?>

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
        <div class="inputContainer">
        <form action="<?= site_url('regist/authenticate') ?>" method="post">
            <div class="inputGroup">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required />
            </div>
        <div class="inputGroup">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required />
        </div>

        <div class="inputGroup">
            <label for="password_confirm">Konfirmasi Kata Sandi</label>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Konfirmasi kata sandi" required />
        </div>
        </div>
            <button type="submit">Daftar</button>
        </form>
    </div>
    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
  </body>
</html>