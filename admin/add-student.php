<?php
include "../koneksi.php";
$nim = $_POST['nim'];
$nm_mhs = $_POST['nama_mhs'];
$no_tlp = $_POST['no_telp'];
$email = $_POST['email'];
$jk = $_POST['jk'];
$pass= md5($_POST['pass']);
mysqli_query($conn,"insert into mahasiswa values ('$nim','$nm_mhs','$no_tlp','$email','$jk','$pass')");
header("location:daftar-mahasiswa.php");
?>