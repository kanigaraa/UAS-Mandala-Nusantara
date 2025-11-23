<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kerajaan</title>
</head>
<body>
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

</body>
</html>
