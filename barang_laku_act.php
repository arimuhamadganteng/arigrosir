<?php
include 'config.php';
$tgl = $_POST['tgl'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

if (empty($tgl)) {
    echo "<script>alert('data harus di isi');</script>";
    header("location:barang_laku.php");
} elseif (empty($nama)) {
    echo "<script>alert('data harus di isi');</script>";
    header("location:barang_laku.php");
} elseif (empty($harga)) {
    echo "<script>alert('data harus di isi');</script>";
    header("location:barang_laku.php");
} elseif (empty($jumlah)) {
    echo "<script>alert('data harus di isi');</script>";
    header("location:barang_laku.php");
} else {
    $dt = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama='$nama'");
    $data = mysqli_fetch_array($dt);
    $sisa = $data['jumlah'] - $jumlah;
    mysqli_query($koneksi, "UPDATE barang SET jumlah='$sisa' WHERE nama='$nama'");

    $modal = $data['modal'];
    $laba = $harga - $modal;
    $labaa = $laba * $jumlah;
    $total_harga = $harga * $jumlah;
    mysqli_query($koneksi, "INSERT INTO barang_laku VALUES('', '$tgl', '$nama', '$jumlah', '$harga', '$total_harga', '$labaa')") or die(mysqli_error($koneksi));
    header("location:barang_laku.php");
}
