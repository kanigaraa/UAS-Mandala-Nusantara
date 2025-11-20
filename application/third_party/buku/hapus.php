<h2>Hapus Mahasiswa</h2>
<p>Yakin ingin menghapus data berikut?</p>
<p><strong><?= $mahasiswa->nama ?> (<?= $mahasiswa->nim ?>)</strong></p>

<form method="post">
    <input type="submit" value="Hapus">
    <a href="<?= site_url('mahasiswa') ?>">Batal</a>
</form>
