<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Detail - <?= $k->nama ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #fdfaf5; padding: 20px; }
        .card { border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .nav-tabs .nav-link.active { background-color: #4a3b2b; color: white !important; border: none; }
        .nav-tabs .nav-link { color: #4a3b2b; font-weight: bold; }
        .btn-coklat { background-color: #4a3b2b; color: white; }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between mb-3 align-items-center">
        <h3>Kelola Detail: <span style="color: #d4a373;"><?= $k->nama ?></span></h3>
        <a href="<?= site_url('dashboard') ?>" class="btn btn-outline-dark">Kembali</a>
    </div>

    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="utama-tab" data-toggle="tab" href="#utama" role="tab">1. Info Utama</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab">2. Timeline</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="warisan-tab" data-toggle="tab" href="#warisan" role="tab">3. Warisan</a>
        </li>
        <?php if($is_rekomendasi): ?>
        <li class="nav-item">
            <a class="nav-link" id="event-tab" data-toggle="tab" href="#event" role="tab">4. Peristiwa</a>
        </li>
        <?php endif; ?>
    </ul>

    <div class="tab-content" id="myTabContent">
        
        <div class="tab-pane fade show active" id="utama" role="tabpanel">
            <div class="card p-4">
                <form action="<?= site_url('admin/update_info_utama') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $k->id ?>">
                    <div class="form-group">
                        <label>Nama Kerajaan</label>
                        <input type="text" name="nama" class="form-control" value="<?= $k->nama ?>">
                    </div>
                    <div class="form-group">
                        <label>Subjudul</label>
                        <input type="text" name="subjudul" class="form-control" value="<?= $k->subjudul ?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4"><?= $k->deskripsi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ganti Gambar Utama</label><br>
                        <img src="<?= base_url('assets/kerajaan/'.$k->gambar) ?>" width="100" class="mb-2 rounded">
                        <input type="file" name="gambar" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-coklat">Simpan Perubahan</button>
                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="timeline" role="tabpanel">
            <div class="card p-4">
                <h5>Tambah Timeline Baru</h5>
                <form action="<?= site_url('admin/tambah_timeline') ?>" method="post" class="form-inline mb-4">
                    <input type="hidden" name="kingdom_id" value="<?= $k->id ?>">
                    <input type="text" name="tahun" class="form-control mr-2" placeholder="Tahun (Misal: 1293)" required>
                    <input type="text" name="isi" class="form-control mr-2 w-50" placeholder="Isi Kejadian" required>
                    <button type="submit" class="btn btn-success">+ Tambah</button>
                </form>

                <table class="table table-bordered">
                    <thead><tr><th>Tahun</th><th>Isi</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php foreach($timelines as $t): ?>
                        <tr>
                            <td><?= $t->tahun ?></td>
                            <td><?= $t->isi ?></td>
                            <td><a href="<?= site_url('admin/edit_timeline/'.$t->id) ?>" class="btn btn-primary btn-sm">Edit</a></td>
                            <td><a href="<?= site_url('admin/hapus_timeline/'.$t->id.'/'.$k->id) ?>" class="text-danger" onclick="return confirm('Hapus?')">Hapus</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="warisan" role="tabpanel">
            <div class="card p-4">
                <h5>Tambah Warisan (Ikon + Nama)</h5>
                <form action="<?= site_url('admin/tambah_warisan') ?>" method="post" enctype="multipart/form-data" class="form-inline mb-4">
                    <input type="hidden" name="kingdom_id" value="<?= $k->id ?>">
                    <input type="text" name="nama" class="form-control mr-2" placeholder="Nama Warisan (Misal: Candi Borobudur)" required>
                    <input type="file" name="ikon" class="form-control-file mr-2">
                    <button type="submit" class="btn btn-success">Simpan Warisan</button>
                </form>

                <div class="row">
                    <?php foreach($warisan as $w): ?>
                    <div class="col-md-3 text-center mb-3">
                        <div class="border p-2 rounded">
                            <img src="<?= base_url('assets/warisan/'.$w->ikon) ?>" width="50" class="mb-2">
                            <h6><?= $w->nama ?></h6>
                            <a href="<?= site_url('admin/edit_warisan/'.$w->id) ?>" class="btn btn-primary btn-sm ml-auto">Edit</a>
                            <a href="<?= site_url('admin/hapus_warisan/'.$w->id.'/'.$k->id) ?>" class="text-danger small" onclick="return confirm('Hapus?')">Hapus</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php if($is_rekomendasi): ?>
        <div class="tab-pane fade" id="event" role="tabpanel">
            <div class="card p-4">
                <h5>Tambah Detail Peristiwa (Kompleks)</h5>
                <form action="<?= site_url('admin/tambah_event') ?>" method="post" enctype="multipart/form-data" class="mb-4 border p-3 bg-light rounded">
                    <input type="hidden" name="kingdom_id" value="<?= $k->id ?>">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <input type="text" name="judul" class="form-control" placeholder="Judul Peristiwa (Misal: Sumpah Palapa)" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <textarea name="isi_kiri" class="form-control" placeholder="Penjelasan Kiri"></textarea>
                            <small>Gambar Kiri:</small> <input type="file" name="gambar_kiri">
                        </div>
                        <div class="col-md-6 mb-2">
                            <textarea name="isi_kanan" class="form-control" placeholder="Penjelasan Kanan"></textarea>
                            <small>Gambar Kanan:</small> <input type="file" name="gambar_kanan">
                        </div>
                        <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-success btn-block">Simpan Detail</button>
                        </div>
                    </div>
                </form>

                <?php foreach($events as $e): ?>
                <div class="media border p-3 mb-2 bg-white rounded">
                    <div class="media-body">
                        <h5 class="mt-0"><?= $e->judul ?></h5>
                        <p class="mb-0 text-muted">Kiri: <?= substr($e->isi_kiri, 0, 50) ?>... | Kanan: <?= substr($e->isi_kanan, 0, 50) ?>...</p>
                    </div>
                    <a href="<?= site_url('admin/edit_event/'.$e->id) ?>" class="btn btn-primary btn-sm ml-auto">Edit</a>
                    <a href="<?= site_url('admin/hapus_event/'.$e->id.'/'.$k->id) ?>" class="btn btn-danger btn-sm ml-3" onclick="return confirm('Hapus?')">Hapus</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>