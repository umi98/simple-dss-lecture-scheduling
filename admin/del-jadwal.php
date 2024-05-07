<?php
include "../koneksi.php";
mysqli_query($conn,"delete from jadwal where kd_jadwal = '$_GET[kode_jadwal]'");
header("location:daftar-jadwal.php");
?>