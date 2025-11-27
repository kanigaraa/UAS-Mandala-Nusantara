<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Rekomendasi Kerajaan</title>
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
        <h2>Edit Data Rekomendasi Kerajaan</h2>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert-error">
                ⚠️ <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?= form_open_multipart('admin/update_rekomendasi'); ?>
        
            <input type="hidden" name="id" value="<?= $rekomendasi->id ?>">

            <div class="form-group">
                <label>Nama Kerajaan</label>
                <input type="text" name="nama" value="<?= $rekomendasi->nama; ?>" required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" value="<?= $rekomendasi->kategori; ?>" required>
            </div>

            <div class="form-group">
                <label>Lokasi (Provinsi)</label>
                <input type="text" name="lokasi" value="<?= $rekomendasi->lokasi; ?>" required>
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" accept=".png, .jpg, .jpeg">
                <small>Biarkan kosong jika tidak ingin mengubah gambar.</small>
                
                <?php if(!empty($rekomendasi->gambar)): ?>
                    <img src="<?= base_url('assets/rekomendasi/'.$rekomendasi->gambar) ?>" class="img-preview" alt="Preview">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="5" required><?= $rekomendasi->deskripsi; ?></textarea>
            </div>

            <button type="submit" class="btn-submit">Update Data</button>
            <a href="<?= site_url('dashboard'); ?>" class="btn-back">← Batal</a>

        <?= form_close(); ?>
    </div>

    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
</body>
</html>