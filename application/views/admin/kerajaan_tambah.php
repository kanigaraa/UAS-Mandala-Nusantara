<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kerajaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('styles/loader.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>" />
    <style>
        body { background-color: #fdfaf5; padding: 20px; font-family: 'Poppins', sans-serif; }
        .card { border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .btn-coklat { background-color: #4a3b2b; color: white; }
        .btn-coklat:hover { background-color: #3d2f22; color: white; }
        h2 { color: #4a3b2b; font-weight: bold; }
    </style>
</head>
<body>
    <!-- LOADER -->
    <div id="page-loader"><div class="spinner"></div></div>

    <div class="container">
        <div class="card p-5">
            <h2 class="mb-4 text-center">Tambah Data Kerajaan</h2>

            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    ⚠️ <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?= form_open_multipart('admin/simpan_kerajaan'); ?>
            
                <div class="form-group">
                    <label>ID Kerajaan (Primary Key)</label>
                    <input type="number" name="id" class="form-control" placeholder="Contoh: 1, 2, 3... (opsional)">
                    <small class="text-muted">*Kosongkan untuk menggunakan ID otomatis (auto-increment).</small>
                </div>

                <div class="form-group">
                    <label>Kingdom ID (Relasi ke Tabel Kingdoms)</label>
                    <input type="number" name="kingdom_id" class="form-control" placeholder="Contoh: 1, 2, 3... (opsional)">
                    <small class="text-muted">*Isi dengan ID dari tabel kingdoms jika ada relasi. Kosongkan jika tidak ada.</small>
                </div>

                <div class="form-group">
                    <label>Nama Kerajaan</label>
                    <input type="text" name="nama" class="form-control" required placeholder="Contoh: Kerajaan Majapahit">
                </div>

                <div class="form-group">
                    <label>Lokasi (Provinsi)</label>
                    <input type="text" name="lokasi" class="form-control" required placeholder="Contoh: Jawa Timur">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" required placeholder="Contoh: Hindu-Buddha">
                </div>

                <div class="form-group">
                    <label>Upload Icon/Gambar</label>
                    <input type="file" name="icon" class="form-control-file" required accept=".png, .jpg, .jpeg">
                    <small class="text-muted">*Format: JPG/PNG. Maksimal 5MB.</small>
                </div>

                <div class="form-group">
                    <label>Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control" rows="5" required placeholder="Tuliskan sejarah singkat kerajaan ini..."></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('dashboard'); ?>" class="btn btn-outline-secondary">← Kembali ke Dashboard</a>
                    <button type="submit" class="btn btn-coklat">Simpan Data</button>
                </div>

            <?= form_close(); ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
</body>
</html>