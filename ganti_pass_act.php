<?php 
include 'config.php';

$user = $_POST['user'];
$lama = md5($_POST['lama']);
$baru = $_POST['baru'];
$ulang = $_POST['ulang'];

$query = "SELECT * FROM admin WHERE pass='$lama' AND uname='$user'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 1) {
    if ($baru == $ulang) {
        $hashed_password = md5($baru);
        $update_query = "UPDATE admin SET pass='$hashed_password' WHERE uname='$user'";
        if (mysqli_query($koneksi, $update_query)) {
            // Jika query berhasil dieksekusi, redirect ke halaman ganti_pass.php dengan pesan 'oke'
            header("location:ganti_pass.php?pesan=oke");
        } else {
            // Jika terjadi kesalahan dalam query update, tampilkan pesan error
            echo "Error updating record: " . mysqli_error($koneksi);
        }
    } else {
        // Jika password baru dan konfirmasi tidak cocok, redirect ke halaman ganti_pass.php dengan pesan 'tdksama'
        header("location:ganti_pass.php?pesan=tdksama");
    }
} else {
    // Jika password lama tidak cocok, redirect ke halaman ganti_pass.php dengan pesan 'gagal'
    header("location:ganti_pass.php?pesan=gagal");
}

mysqli_close($koneksi);
?>
