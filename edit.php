<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span> Edit Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
<?php
$id_brg = $_GET['id'];
$query = "SELECT * FROM barang WHERE id='$id_brg'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    // Jika terjadi kesalahan dalam query, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
} else {
    while ($d = mysqli_fetch_array($result)) {
?>
        <form action="update.php" method="post">
            <table class="table">
                <tr>
                    <td></td>
                    <td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($d['nama']); ?>"></td> <!-- Menggunakan htmlspecialchars() untuk mencegah XSS -->
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td><input type="text" class="form-control" name="jenis" value="<?php echo htmlspecialchars($d['jenis']); ?>"></td> <!-- Menggunakan htmlspecialchars() untuk mencegah XSS -->
                </tr>
                <tr>
                    <td>Suplier</td>
                    <td><input type="text" class="form-control" name="suplier" value="<?php echo htmlspecialchars($d['suplier']); ?>"></td> <!-- Menggunakan htmlspecialchars() untuk mencegah XSS -->
                </tr>
                <tr>
                    <td>Modal</td>
                    <td><input type="text" class="form-control" name="modal" value="<?php echo $d['modal'] ?>"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-info" value="Simpan"></td>
                </tr>
            </table>
        </form>
<?php
    }
}

include 'footer.php';
?>