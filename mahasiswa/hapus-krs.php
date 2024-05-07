<?php
include "../koneksi.php";
$kode = $_GET['kd_jadwal'];
$nim = $_GET['nim'];
mysqli_query($conn,"delete from krs where kd_jadwal='$kode' and nim='$nim'");
header("location:jadwal-krs.php");
?>