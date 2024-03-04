<?php 
include 'config.php';
$id = $_GET['id'];

$query = "DELETE FROM barang WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    // Jika query berhasil dieksekusi, redirect ke halaman barang.php
    header("location:barang.php");
} else {
    // Jika terjadi kesalahan dalam query, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
