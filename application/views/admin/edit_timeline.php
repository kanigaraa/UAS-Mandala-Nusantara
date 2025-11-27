<!DOCTYPE html>
<html>
<head>
    <title>Edit Timeline</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>">
</head>
<body class="p-5" style="background-color: #fdfaf5;">
    <div class="card p-4 shadow-sm" style="max-width: 600px; margin: auto;">
        <h3>Edit Timeline</h3>
        <form action="<?= site_url('admin/update_timeline') ?>" method="post">
            <input type="hidden" name="id" value="<?= $t->id ?>">
            <input type="hidden" name="kingdom_id" value="<?= $t->kingdom_id ?>">
            
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" name="tahun" class="form-control" value="<?= $t->tahun ?>" required>
            </div>
            <div class="form-group">
                <label>Isi Kejadian</label>
                <textarea name="isi" class="form-control" rows="4" required><?= $t->isi ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="javascript:history.back()" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>