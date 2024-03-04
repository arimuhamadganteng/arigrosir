<?php
include 'config.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$tanggal = $_POST['tgl'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

$query = "UPDATE barang_laku SET nama='$nama', tanggal='$tanggal', harga='$harga', jumlah='$jumlah' WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    // Jika query berhasil dieksekusi, redirect ke halaman barang.php
    header("location:barang_laku.php");
} else {
    // Jika terjadi kesalahan dalam query, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
