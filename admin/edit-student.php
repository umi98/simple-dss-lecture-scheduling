<?php
include "../koneksi.php";
$nim = $_POST['nim'];
$nm_mhs = $_POST['nama_mhs'];
$no_tlp = $_POST['no_telp'];
$email = $_POST['email'];
$jk = $_POST['jk'];
mysqli_query($conn,"update mahasiswa set nim = '$nim', nama_mhs = '$nm_mhs', no_telp_mhs = '$no_tlp', email_mhs = '$email', jk = '$jk' where nim = '$nim'");
header("location:daftar-mahasiswa.php");
?>