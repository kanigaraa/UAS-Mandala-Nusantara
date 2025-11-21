<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar</title>

    <link rel="stylesheet" href="<?= base_url('regist.css') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>" />
  </head>
  <body>
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
            <label for="password">Konfirmasi Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="Konfirmasi kata sandi" required />
            </div>
            </div>
            <button type="submit">Daftar</button>
        </form>
    </div>
  </body>
</html>