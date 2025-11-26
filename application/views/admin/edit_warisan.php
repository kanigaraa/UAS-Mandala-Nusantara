<!DOCTYPE html>
<html>
<head><title>Edit Warisan</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head>
<body class="p-5" style="background-color: #fdfaf5;">
    <div class="card p-4 shadow-sm" style="max-width: 600px; margin: auto;">
        <h3>Edit Warisan</h3>
        <form action="<?= site_url('admin/update_warisan') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $w->id ?>">
            <input type="hidden" name="kingdom_id" value="<?= $w->kingdom_id ?>">
            
            <div class="form-group">
                <label>Nama Warisan</label>
                <input type="text" name="nama" class="form-control" value="<?= $w->nama ?>" required>
            </div>
            <div class="form-group">
                <label>Ganti Ikon (Biarkan kosong jika tidak diganti)</label><br>
                <img src="<?= base_url('assets/warisan/'.$w->ikon) ?>" width="80" class="mb-2">
                <input type="file" name="ikon" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="javascript:history.back()" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>