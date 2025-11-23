<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kerajaan</title>
    <link rel="stylesheet" href="<?= base_url('styles/loader.css') ?>" />
</head>
<body>
    <!-- LOADER -->
    <div id="page-loader"><div class="spinner"></div></div>
    <h1>Daftar Kerajaan</h1>

    <?php if (!empty($kingdoms)) : ?>
        <ul>
            <?php foreach ($kingdoms as $k) : ?>
                <li>
                    <strong><?= $k->nama ?></strong><br>
                    <a href="<?= site_url('kerajaan/detail_rekomendasi/'.$k->id) ?>">
                        Lihat Detail
                    </a>
                </li>
                <hr>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Data kerajaan tidak ditemukan.</p>
    <?php endif; ?>

    <script src="<?= base_url('assets/js/loader.js') ?>"></script>
</body>
</html>
