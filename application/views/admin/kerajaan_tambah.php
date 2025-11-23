<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kerajaan</title>
    <link rel="stylesheet" href="<?= base_url('styles/admin.css') ?>">
    <link rel="stylesheet" href="<?= base_url('styles/loader.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>" />
</head>
<body>
    <!-- LOADER -->
    <div id="page-loader"><div class="spinner"></div></div>

    <div class="form-container">
        <h2>Tambah Data Kerajaan</h2>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert-error">
                ⚠️ <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?= form_open_multipart('admin/simpan_kerajaan'); ?>
        
            <div class="form-group">
                <label>Nama Kerajaan</label>
                <input type="text" name="nama" required placeholder="Contoh: Kerajaan Majapahit">
            </div>

            <div class="form-group">
                <label>Lokasi (Provinsi/Kota)</label>
                <input type="text" name="lokasi" required placeholder="Contoh: Jawa Timur">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" required placeholder="Contoh: Hindu-Buddha">
            </div>

            <div class="form-group">
                <label>Upload Icon/Gambar</label>
                <input type="file" name="icon" required accept=".png, .jpg, .jpeg">
                <small>*Format: JPG/PNG. Maksimal 5MB.</small>
            </div>

            <div class="form-group">
                <label>Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="5" required placeholder="Tuliskan sejarah singkat kerajaan ini..."></textarea>
            </div>

            <button type="submit" class="btn-submit">💾 Simpan Data</button>
            <a href="<?= site_url('dashboard'); ?>" class="btn-back">← Kembali ke Dashboard</a>

        <?= form_close(); ?>
    </div>

    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
</body>
</html>