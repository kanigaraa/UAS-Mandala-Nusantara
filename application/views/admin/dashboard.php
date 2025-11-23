<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('styles/admin.css') ?>">
    <style>
        /* CSS Dashboard */
        .dashboard-container { max-width: 1200px; margin: 40px auto; padding: 20px; font-family: 'Poppins', sans-serif; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #d4af37; padding-bottom: 20px; margin-bottom: 30px; }
        
        /* Tombol Logout & Tambah */
        .btn-logout { background: #a83232; color: white; padding: 8px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .btn-tambah { background: #d4af37; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block; margin-bottom: 20px; }
        
        /* Styling Tabel */
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 10px; overflow: hidden; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #3d2817; color: white; }
        tr:hover { background-color: #f9f9f9; }
        
        /* Gambar Kecil di Tabel */
        .thumb-img { width: 50px; height: 50px; object-fit: cover; border-radius: 5px; }

        /* Tombol Aksi */
        .btn-action { padding: 5px 10px; border-radius: 4px; text-decoration: none; color: white; font-size: 14px; margin-right: 5px; }
        .edit { background-color: #2980b9; }
        .delete { background-color: #c0392b; }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <div class="header">
            <div>
                <h1 style="margin:0;">Dashboard Admin</h1>
                <p style="margin:5px 0 0; color:#666;">Selamat Datang di Panel Mandala</p>
            </div>
            <a href="<?= site_url('dashboard/logout'); ?>" class="btn-logout">Logout</a>
        </div>

        <a href="<?= site_url('admin/tambah_kerajaan'); ?>" class="btn-tambah">+ Tambah Kerajaan Baru</a>
        <a href="<?= base_url(); ?>" target="_blank" class="btn-tambah" style="background:#27ae60;">Lihat Website</a>

        <?php if($this->session->flashdata('success')): ?>
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Icon</th>
                    <th>Nama Kerajaan</th>
                    <th>Lokasi</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($kerajaan as $k): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <?php if(!empty($k['icon'])): ?>
                            <img src="<?= base_url('assets/kerajaan/' . $k['icon']); ?>" class="thumb-img">
                        <?php else: ?>
                            <span>-</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $k['nama']; ?></td>
                    <td><?= $k['lokasi']; ?></td>
                    <td><?= $k['kategori'] ?? '-'; ?></td> <td>
                        <a href="<?= site_url('admin/edit_kerajaan/' . $k['id']); ?>" class="btn-action edit">Edit</a>
                        
                        <a href="<?= site_url('admin/hapus_kerajaan/' . $k['id']); ?>" 
                           onclick="return confirm('Yakin ingin menghapus <?= $k['nama']; ?>?');" 
                           class="btn-action delete">
                           Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if(empty($kerajaan)): ?>
            <p style="text-align:center; padding: 20px; background:white;">Belum ada data kerajaan.</p>
        <?php endif; ?>

    </div>

</body>
</html>