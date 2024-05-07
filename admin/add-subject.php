<?php
include "../koneksi.php";
$kode = $_POST['kode'];
$matkul = $_POST['nama_matkul'];
$js = $_POST['js'];
$sks = $_POST['sks'];
$kuota = $_POST['kuota'];
$grade = $_POST['grade'];
mysqli_query($conn,"insert into matkul values ('$kode','$matkul','$js','$sks','$kuota','$grade')");
header("location:daftar-matkul.php");
?>