<?php
include "../koneksi.php";
$kode = $_POST['kode'];
$nip = $_POST['nip'];
$kd_mk = $_POST['kd_mk'];
$ruang = $_POST['ruang'];
$kelas = $_POST['kls'];
//$hari = $_POST['hari'];
//$jam_m = $_POST['jam_m'];
//$jam_s = $_POST['jam_s'];

include "dss.php";


//echo "insert into jadwal values ('$kode','$nip','$kd_mk','$ruang','$hari','$kelas','$jam_m','$jam_s')";
mysqli_query($conn,"insert into jadwal values ('$kode','$nip','$kd_mk','$ruang','$hari','$kelas','$jam_m','$jam_s')");
header("location:daftar-jadwal.php");
?>