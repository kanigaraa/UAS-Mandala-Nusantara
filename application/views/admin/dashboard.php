<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
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

    <div class="dashboard-container">
        <div class="header">
            <div>
                <h1>Dashboard Admin</h1>
                <p>Selamat Datang di Panel Mandala Nusantara</p>
            </div>
            <a href="<?= site_url('dashboard/logout'); ?>" class="btn-logout">Logout</a>
        </div>

        <div style="margin-bottom: 20px;">
            <a href="<?= site_url('admin/tambah_kerajaan'); ?>" class="btn-tambah">+ Tambah Kerajaan Baru</a>
            <a href="<?= base_url('index.php/landing_admin'); ?>" target="_blank" class="btn-tambah btn-lihat">Lihat Website</a>
        </div>

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert-success">
                ✓ <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($kerajaan)): ?>
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
                            <img src="<?= base_url('assets/kerajaan/' . $k['icon']); ?>" class="thumb-img" alt="<?= $k['nama']; ?>">
                        <?php else: ?>
                            <span style="color: #ccc;">-</span>
                        <?php endif; ?>
                    </td>
                    <td><strong><?= $k['nama']; ?></strong></td>
                    <td><?= $k['lokasi']; ?></td>
                    <td>
                        <span style="background: #f0f0f0; padding: 4px 10px; border-radius: 6px; font-size: 12px; color: #666;">
                            <?= $k['kategori'] ?? '-'; ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?= site_url('admin/edit_kerajaan/' . $k['id']); ?>" class="btn-action edit">Edit</a>
                        <a href="<?= site_url('admin/hapus_kerajaan/' . $k['id']); ?>" 
                           onclick="return confirm('⚠️ Yakin ingin menghapus <?= $k['nama']; ?>?\n\nData yang dihapus tidak dapat dikembalikan!');" 
                           class="btn-action delete">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <div class="empty-state">
                <p style="font-size: 48px; margin-bottom: 10px;">📭</p>
                <p>Belum ada data kerajaan.</p>
                <p style="font-size: 14px; margin-top: 10px;">Klik tombol "Tambah Kerajaan Baru" untuk memulai.</p>
            </div>
        <?php endif; ?>

    </div>

    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
</body>
</html>