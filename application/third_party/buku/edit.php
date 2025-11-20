<h2>Edit Buku</h2>
<form method="post">
    Judul: <input type="text" name="judul" value="<?= $buku->judul ?>"><br>
    Pengarang: <input type="text" name="pengarang" value="<?= $buku->pengarang ?>"><br>
    Penerbit: <input type="text" name="penerbit" value="<?= $buku->penerbit ?>"><br>
    Tahun Terbit: <input type="number" name="tahun_terbit" value="<?= $buku->tahun_terbit ?>"><br>
    <button type="submit">Update</button>
</form>
