<?php 
include 'config.php';
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$suplier = $_POST['suplier'];
$modal = $_POST['modal'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$sisa = $_POST['jumlah']; // Memperbarui variabel $sisa dengan menggunakan nilai dari $_POST['jumlah']

$query = "INSERT INTO barang (nama, jenis, suplier, modal, harga, jumlah, sisa) VALUES ('$nama', '$jenis', '$suplier', '$modal', '$harga', '$jumlah', '$sisa')";

if (mysqli_query($koneksi, $query)) {
    // Jika query berhasil dieksekusi, redirect ke halaman barang.php
    header("location:barang.php");
} else {
    // Jika terjadi kesalahan dalam query, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
