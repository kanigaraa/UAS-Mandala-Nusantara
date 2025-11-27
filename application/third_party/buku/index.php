<h2>Daftar Buku</h2>
<a href="<?= site_url('buku/tambah') ?>">Tambah Buku</a>
<table border="1" cellpadding="8">
    <tr>
        <th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun</th><th>Aksi</th>
    </tr>
    <?php foreach ($buku as $b): ?>
    <tr>
        <td><?= $b->judul ?></td>
        <td><?= $b->pengarang ?></td>
        <td><?= $b->penerbit ?></td>
        <td><?= $b->tahun_terbit ?></td>
        <td>
            <a href="<?= site_url('buku/edit/'.$b->id) ?>">Edit</a> | 
            <a href="<?= site_url('buku/hapus/'.$b->id) ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
