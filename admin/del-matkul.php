<?php
include "../koneksi.php";
mysqli_query($conn,"delete from matkul where kd_mk = '$_GET[kode_mk]'");
header("location:daftar-matkul.php");
?>