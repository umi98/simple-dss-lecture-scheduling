<?php
include "../koneksi.php";
$kode = $_POST['kode'];
$nip = $_POST['nip'];
$kd_mk = $_POST['kd_mk'];
$ruang = $_POST['ruang'];
$kelas = $_POST['kelas'];
//$hari = $_POST['hari'];
//$jam_m = $_POST['jam_m'];
//$jam_s = $_POST['jam_s'];

include "dss.php";

mysqli_query($conn,"update jadwal set kd_jadwal = '$kode', nip = '$nip', kd_mk = '$kd_mk', ruang = '$ruang', hari = '$hari',kelas = '$kelas', jam_mulai = '$jam_m', jam_selesai = '$jam_s' where kd_jadwal = '$kode'");
header("location:daftar-jadwal.php");
?>