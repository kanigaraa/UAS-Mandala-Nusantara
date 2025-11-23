<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kerajaan</title>
    <link rel="stylesheet" href="<?= base_url('styles/admin.css') ?>">
    <style>
        /* Style sederhana (bisa pakai yang lama) */
        body { font-family: 'Poppins', sans-serif; background: #f4f4f4; }
        .form-container { max-width: 800px; margin: 40px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #d4af37; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: bold; margin-bottom: 8px; color: #3d2817; }
        input[type="text"], textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .btn-submit { background: #d4af37; color: white; padding: 12px 24px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .btn-back { text-decoration: none; color: #888; margin-left: 15px; }
        .img-preview { margin-top: 10px; width: 120px; border-radius: 8px; border: 2px solid #eee; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>✏️ Edit Data Kerajaan</h2>

    <?php if($this->session->flashdata('error')): ?>
        <div style="background: #ffdddd; color: red; padding: 10px; margin-bottom: 15px;">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?= form_open_multipart('admin/update_kerajaan'); ?>
    
        <input type="hidden" name="id" value="<?= $kerajaan['id']; ?>">

        <div class="form-group">
            <label>Nama Kerajaan</label>
            <input type="text" name="nama" value="<?= $kerajaan['nama']; ?>" required>
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" value="<?= $kerajaan['lokasi']; ?>" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" value="<?= $kerajaan['kategori']; ?>" required>
        </div>

        <div class="form-group">
            <label>Gambar / Icon</label>
            <input type="file" name="icon" accept=".png, .jpg, .jpeg">
            <small style="display:block; color:#666;">Biarkan kosong jika tidak ingin mengubah gambar.</small>
            
            <?php if(!empty($kerajaan['icon'])): ?>
                <img src="<?= base_url('assets/kerajaan/'.$kerajaan['icon']) ?>" class="img-preview">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="5" required><?= $kerajaan['deskripsi']; ?></textarea>
        </div>

        <button type="submit" class="btn-submit">Update Data</button>
        <a href="<?= site_url('dashboard'); ?>" class="btn-back">Batal</a>

    <?= form_close(); ?>
</div>

</body>
</html>