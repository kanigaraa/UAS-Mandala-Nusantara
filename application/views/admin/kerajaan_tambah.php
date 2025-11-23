<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kerajaan</title>
    <link rel="stylesheet" href="<?= base_url('styles/admin.css') ?>">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; }
        .form-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 { color: #d4af37; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; }
        
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: bold; margin-bottom: 8px; color: #3d2817; }
        input[type="text"], textarea, input[type="file"] {
            width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;
        }
        small { color: #666; font-style: italic; }
        
        .btn-submit {
            background: #d4af37; color: white; padding: 12px 24px; border: none;
            border-radius: 5px; cursor: pointer; font-weight: bold; font-size: 16px; transition: 0.3s;
        }
        .btn-submit:hover { background: #b89628; }
        .btn-back {
            text-decoration: none; color: #888; margin-left: 15px;
        }
        .alert-error { background: #ffdddd; color: #a83232; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>🏰 Tambah Data Kerajaan</h2>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert-error">
            <?= $this->session->flashdata('error'); ?>
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

        <button type="submit" class="btn-submit">Simpan Data</button>
        <a href="<?= site_url('dashboard'); ?>" class="btn-back">Kembali ke Dashboard</a>

    <?= form_close(); ?>
</div>

</body>
</html>