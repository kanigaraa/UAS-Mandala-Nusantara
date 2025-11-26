<!DOCTYPE html>
<html>
<head><title>Edit Detail Event</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head>
<body class="p-5" style="background-color: #fdfaf5;">
    <div class="card p-4 shadow-sm">
        <h3>Edit Detail Peristiwa</h3>
        <form action="<?= site_url('admin/update_event') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $e->id ?>">
            <input type="hidden" name="kingdom_id" value="<?= $e->kingdom_id ?>">
            
            <div class="form-group">
                <label>Judul Peristiwa</label>
                <input type="text" name="judul" class="form-control" value="<?= $e->judul ?>" required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Isi Kiri</label>
                        <textarea name="isi_kiri" class="form-control" rows="5"><?= $e->isi_kiri ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ganti Gambar Kiri</label><br>
                        <img src="<?= base_url('assets/peristiwa/'.$e->gambar_kiri) ?>" width="100" class="mb-2">
                        <input type="file" name="gambar_kiri" class="form-control-file">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Isi Kanan</label>
                        <textarea name="isi_kanan" class="form-control" rows="5"><?= $e->isi_kanan ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ganti Gambar Kanan</label><br>
                        <img src="<?= base_url('assets/peristiwa/'.$e->gambar_kanan) ?>" width="100" class="mb-2">
                        <input type="file" name="gambar_kanan" class="form-control-file">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="javascript:history.back()" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>