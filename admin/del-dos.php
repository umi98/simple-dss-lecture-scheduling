<?php
include "../koneksi.php";
mysqli_query($conn,"delete from dosen where nip = '$_GET[nip]'");
header("location:daftar-dosen.php");
?>