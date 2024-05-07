<?php
include "../koneksi.php";
$kode = $_POST['kode'];
$matkul = $_POST['nama_matkul'];
$js = $_POST['js'];
$sks = $_POST['sks'];
$kuota = $_POST['kuota'];
mysqli_query($conn,"update matkul set kd_mk = '$kode', nama_mk = '$matkul', js = '$js', sks = '$sks', kuota = '$kuota' where kd_mk = '$kode'");
header("location:daftar-matkul.php");
?>