<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Mandala</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>"> 
    <style>
        body { background-color: #fdfaf5; }
        .table-header { background-color: #4a3b2b; color: white; }
        .btn-action { margin: 0 2px; }
        .section-title { color: #4a3b2b; font-weight: bold; margin-top: 30px; margin-bottom: 15px; }
        
        /* Category Badge Styles */
        .category-badge {
            font-size: 12px;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 999px;
            display: inline-block;
        }
        
        .kategori-hindu-buddha {
            background: #dce6d5;
            color: #6b8e23;
        }
        
        .kategori-islam {
            background: #dbeafe;
            color: #2563eb;
        }
        
        .kategori-pra-kolonial {
            background: rgba(201, 102, 94, 0.2);
            color: rgba(201, 102, 94, 1);
        }
    </style>
</head>
<body>

    <div class="container-fluid" style="padding: 30px;">
    
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 style="color: #4a3b2b; font-weight: bold;">Dashboard Admin</h2>
            <div>
                <a href="<?= site_url('landing_admin') ?>" class="btn btn-outline-secondary mr-2">← Kembali ke Landing</a>
                <a href="<?= site_url('admin/logout') ?>" class="btn btn-danger">Logout</a>
            </div>
        </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <h3 class="section-title">Data Rekomendasi Kerajaan</h3>
    
    <a href="<?= site_url('admin/tambah_rekomendasi') ?>" class="btn btn-warning text-white font-weight-bold mb-3">
        + Tambah Rekomendasi Baru
    </a>

    <div class="card shadow-sm mb-5">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-header">
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th class="text-center" width="15%">Gambar</th>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th class="text-center" width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if(!empty($rekomendasi)): 
                        foreach($rekomendasi as $r): 
                    ?>
                    <tr>
                        <td class="text-center align-middle"><?= $no++ ?></td>
                        <td class="text-center align-middle">
                            <img src="<?= base_url('assets/rekomendasi/' . $r['gambar']) ?>" width="80" style="border-radius: 6px; object-fit: cover;">
                        </td>
                        <td class="align-middle font-weight-bold"><?= $r['nama'] ?></td>
                        <td class="align-middle"><?= $r['lokasi'] ?></td>
                        <td class="align-middle">
                            <span class="category-badge kategori-<?= strtolower(str_replace(' ', '-', $r['kategori'])) ?>"><?= $r['kategori'] ?></span>
                        </td>
                        <td class="text-center align-middle">
                            <a href="<?= site_url('admin/edit_rekomendasi/' . $r['id_kerajaan']) ?>" class="btn btn-primary btn-sm btn-action">Edit</a>
                            <a href="<?= site_url('admin/hapus_rekomendasi/' . $r['id_kerajaan']) ?>" 
                               class="btn btn-danger btn-sm btn-action" 
                               onclick="return confirm('Yakin ingin menghapus rekomendasi <?= $r['nama'] ?>?')">Hapus
                            </a>
                            <a href="<?= site_url('admin/kelola_detail/' . $r['id_kerajaan']) ?>" class="btn btn-info btn-sm btn-action" style="margin-right: 5px;">
                                Kelola Detail
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; 
                    else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada data rekomendasi.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    <hr style="border-top: 2px dashed #ccc; margin: 40px 0;">


    <h3 class="section-title">Data Kerajaan Nusantara</h3>
    
    <a href="<?= site_url('admin/tambah_kerajaan') ?>" class="btn btn-warning text-white font-weight-bold mb-3">
        + Tambah Kerajaan Baru
    </a>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-header">
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th class="text-center" width="15%">Icon</th>
                        <th>Nama Kerajaan</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th class="text-center" width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no_k = 1;
                    if(!empty($kerajaan)): 
                        foreach($kerajaan as $k): 
                    ?>
                    <tr>
                        <td class="text-center align-middle"><?= $no_k++ ?></td>
                        <td class="text-center align-middle">
                            <img src="<?= base_url('assets/kerajaan/' . $k['icon']) ?>" width="60">
                        </td>
                        <td class="align-middle font-weight-bold"><?= $k['nama'] ?></td>
                        <td class="align-middle"><?= $k['lokasi'] ?></td>
                        <td class="align-middle">
                            <span class="category-badge kategori-<?= strtolower(str_replace(' ', '-', $k['kategori'])) ?>"><?= $k['kategori'] ?></span>
                        </td>
                        <td class="text-center align-middle">
                            <a href="<?= site_url('admin/edit_kerajaan/' . $k['id']) ?>" class="btn btn-primary btn-sm btn-action">Edit</a>
                            <a href="<?= site_url('admin/hapus_kerajaan/' . $k['id']) ?>" 
                               class="btn btn-danger btn-sm btn-action" 
                               onclick="return confirm('Yakin ingin menghapus kerajaan <?= $k['nama'] ?>?')">Hapus
                            </a>
                            <a href="<?= site_url('admin/kelola_detail/' . $k['kingdom_id']) ?>" class="btn btn-info btn-sm btn-action" style="margin-right: 5px;">
                                Kelola Detail
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; 
                    else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada data kerajaan.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div style="height: 100px;"></div>

</div>

</body>
</html>