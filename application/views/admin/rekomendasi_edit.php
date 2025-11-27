<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Rekomendasi Kerajaan</title>
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
            <h2 class="mb-4 text-center">Edit Data Rekomendasi Kerajaan</h2>

            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    ⚠️ <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?= form_open_multipart('admin/update_rekomendasi'); ?>
            
                <input type="hidden" name="id" value="<?= $rekomendasi->id ?>">

                <div class="form-group">
                    <label>ID Kerajaan (Primary Key)</label>
                    <input type="number" name="id_kerajaan" class="form-control" value="<?= $rekomendasi->id_kerajaan ?>" readonly style="background-color: #f0f0f0; cursor: not-allowed;">
                    <small class="text-muted">*ID tidak dapat diubah setelah data dibuat.</small>
                </div>

                <div class="form-group">
                    <label>Nama Kerajaan</label>
                    <input type="text" name="nama" class="form-control" value="<?= $rekomendasi->nama; ?>" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="<?= $rekomendasi->kategori; ?>" required>
                </div>

                <div class="form-group">
                    <label>Lokasi (Provinsi)</label>
                    <input type="text" name="lokasi" class="form-control" value="<?= $rekomendasi->lokasi; ?>" required>
                </div>

                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control-file" accept=".png, .jpg, .jpeg">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    
                    <?php if(!empty($rekomendasi->gambar)): ?>
                        <div class="mt-2">
                            <img src="<?= base_url('assets/rekomendasi/'.$rekomendasi->gambar) ?>" class="img-thumbnail" width="150" alt="Preview">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control" rows="5" required><?= $rekomendasi->deskripsi; ?></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('dashboard'); ?>" class="btn btn-outline-secondary">← Batal</a>
                    <button type="submit" class="btn btn-coklat">Update Data</button>
                </div>

            <?= form_close(); ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
</body>
</html>