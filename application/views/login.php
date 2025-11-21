<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <link rel="stylesheet" href="<?= base_url('loading.css') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>" />
  </head>
  <body>
    <div class="loginContainer">
        <img src="<?= base_url('assets/logo_mandala1.png') ?>">
        <h2>Selamat Datang!</h2>
        <div class="register">
            <p>Belum punya akun? <a href="<?= site_url('regist') ?>">Daftar</a></p>
        </div>
        <div class="inputContainer">
        <form action="<?= site_url('login/authenticate') ?>" method="post">
            <div class="inputGroup">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required />
            </div>
            <div class="inputGroup">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required />
            </div>
            </div>
            <button type="submit">Login</button>
            <button type="button" class="adminBtn" onclick="location.href='<?= site_url('admin') ?>'">
              Login sebagai Admin
            </button>
        </form>
    </div>
  </body>
</html>