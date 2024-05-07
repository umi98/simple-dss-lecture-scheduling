<?php
include "../koneksi.php";
$nip = $_POST['nip'];
$nidn = $_POST['nidn'];
$nm_dos = $_POST['nama_dos'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
mysqli_query($conn,"update dosen set nip = '$nip', nidn = '$nidn', nama_dos = '$nm_dos', alamat_dos = '$alamat', email_dos = '$email' where nip = '$nip'");
header("location:daftar-dosen.php");
?>