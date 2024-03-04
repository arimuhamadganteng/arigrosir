<?php 
session_start();
include 'admin/config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$pas=md5($pass);
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE uname='$uname' AND pass='$pas'") or die(mysqli_error($koneksi));

if(mysqli_num_rows($query) == 1) {
	$_SESSION['uname'] = $uname;
	header("location: admin/index.php");
	exit(); // exit setelah header untuk menghentikan eksekusi lebih lanjut
} else {
	header("location: index.php?pesan=gagal");
	exit(); // exit setelah header untuk menghentikan eksekusi lebih lanjut
}

 ?>