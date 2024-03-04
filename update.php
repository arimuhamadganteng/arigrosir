<?php
include 'config.php';

// Pastikan id tersedia sebelum diakses
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $suplier = $_POST['suplier'];
    $modal = $_POST['modal'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    // Perlu lakukan sanitasi terhadap input sebelum memasukkan ke dalam query untuk menghindari SQL Injection
    $nama = mysqli_real_escape_string($koneksi, $nama);
    $jenis = mysqli_real_escape_string($koneksi, $jenis);
    $suplier = mysqli_real_escape_string($koneksi, $suplier);
    $modal = mysqli_real_escape_string($koneksi, $modal);
    $harga = mysqli_real_escape_string($koneksi, $harga);
    $jumlah = mysqli_real_escape_string($koneksi, $jumlah);

    $query = "UPDATE barang SET nama='$nama', jenis='$jenis', suplier='$suplier', modal='$modal', harga='$harga', jumlah='$jumlah' WHERE id='$id'";

    if (mysqli_query($koneksi, $query)) {
        // Jika query berhasil dieksekusi, redirect ke halaman barang.php
        header("location:barang.php");
        exit; // Penting untuk menghentikan eksekusi script setelah redirect
    } else {
        // Jika terjadi kesalahan dalam query, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak tersedia.";
}

mysqli_close($koneksi);
