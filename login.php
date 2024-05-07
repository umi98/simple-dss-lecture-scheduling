<?php
session_start();
include "koneksi.php";
$uname = $_POST['uname'];
$pword = md5($_POST['pword']);
$_SESSION['uname'] = $uname;
$_SESSION['pword'] = $pword;
$digit = strlen($uname);
if ($digit == 18){
	$login = mysqli_query($conn,"select * from dosen where nip = '$_SESSION[uname]' and password = '$_SESSION[pword]'");
	$hasil = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login,MYSQLI_ASSOC);
	if ($hasil > 0){
		header("location: dosen/index.php");
		$_SESSION['nama'] = $r['nama_dos'];
	}
	else {
		echo "<script language='javascript'>
		alert('Inputan tidak sesuai');
		window.location='index.html';
		</script>";
	}
}
else if ($digit == 12){
	$login = mysqli_query($conn,"select * from mahasiswa where nim = '$_SESSION[uname]' and password = '$_SESSION[pword]'");
	$hasil = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login,MYSQLI_ASSOC);
	if ($hasil > 0){
		header("location: mahasiswa/index.php");
		$_SESSION['nama'] = $r['nama_mhs'];
	}
	else {
		echo "<script language='javascript'>
		alert('Inputan tidak sesuai');
		window.location='index.html';
		</script>";
	}
}
else {
	$login = mysqli_query($conn,"select * from login where username = '$_SESSION[uname]' and password = '$_SESSION[pword]'");
	$hasil = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login,MYSQLI_NUM);
	if ($hasil > 0){
		header("location: admin/index.php");
	}
	else {
		echo "<script language='javascript'>
		alert('Inputan tidak sesuai');
		window.location='index.html';
		</script>";
	}
}
?>
