<?php
session_start();
include "../koneksi.php";
$kode = $_POST['kd_jadwal'];
$nim = $_SESSION['uname'];
mysqli_query($conn,"insert into krs values ('$nim','$kode')");
header("location:jadwal-krs.php");
?>