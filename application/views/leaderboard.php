<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan Peringkat - Mandala</title>
    <link rel="stylesheet" href="<?= base_url('styles/landing.css'); ?>">
    <link rel="icon" href="<?= base_url('assets/icon_mandala.png') ?>">
    <style>
        .leaderboard-container {
            max_width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box_shadow: 0 4px 15px rgba(0,0,0,0.2);
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #8B4513; /* Warna tema kayu/sejarah */
            color: white;
        }
        tr:nth-child(1) td { font-weight: bold; color: #d4af37; } /* Emas untuk Juara 1 */
        tr:nth-child(2) td { font-weight: bold; color: #c0c0c0; } /* Perak */
        tr:nth-child(3) td { font-weight: bold; color: #cd7f32; } /* Perunggu */
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #8B4513;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="leaderboard-container">
        <h1>🏆 Papan Peringkat Mandala 🏆</h1>
        <p>Pejuang sejarah terbaik minggu ini</p>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pejuang</th>
                    <th>Kategori</th>
                    <th>Skor</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($top_skor)): ?>
                    <?php $no = 1; foreach($top_skor as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $format_nama($row['email']); ?></td>
                        <td><?= $row['kategori']; ?></td>
                        <td><?= $row['skor']; ?></td>
                        <td><?= date('d M Y', strtotime($row['tanggal'])); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Belum ada data skor. Jadilah yang pertama!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="<?= base_url('landing_logged'); ?>" class="btn-back">Kembali ke Beranda</a>
    </div>

</body>
</html>