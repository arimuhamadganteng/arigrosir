<?php
$nama_host = "localhost";
$nama_pengguna = "root";
$kata_sandi = "";
$nama_database = "2021-04-muhamadari-grosir";

$koneksi = mysqli_connect($nama_host, $nama_pengguna, $kata_sandi, $nama_database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
