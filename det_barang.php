<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg = $_GET['id']; // Menggunakan $_GET['id'] langsung tanpa menggunakan mysql_real_escape_string()

$query = "SELECT * FROM barang WHERE id='$id_brg'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    // Jika terjadi kesalahan dalam query, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
} else {
    while ($d = mysqli_fetch_array($result)) {
        ?>              
        <table class="table">
            <tr>
                <td>Nama</td>
                <td><?php echo htmlspecialchars($d['nama']) ?></td> <!-- Menggunakan htmlspecialchars() untuk mencegah XSS -->
            </tr>
            <tr>
                <td>Jenis</td>
                <td><?php echo htmlspecialchars($d['jenis']) ?></td> <!-- Menggunakan htmlspecialchars() untuk mencegah XSS -->
            </tr>
            <tr>
                <td>Suplier</td>
                <td><?php echo htmlspecialchars($d['suplier']) ?></td> <!-- Menggunakan htmlspecialchars() untuk mencegah XSS -->
            </tr>
            <tr>
                <td>Modal</td>
                <td>Rp.<?php echo number_format($d['modal']); ?>,-</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><?php echo $d['jumlah'] ?></td>
            </tr>
            <tr>
                <td>Sisa</td>
                <td><?php echo $d['sisa'] ?></td>
            </tr>
        </table>
        <?php 
    }
}

include 'footer.php';
