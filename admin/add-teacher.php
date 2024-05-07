<?php
include "../koneksi.php";
$nip = $_POST['nip'];
$nidn = $_POST['nidn'];
$nm_dos = $_POST['nama_dos'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
mysqli_query($conn,"insert into dosen values ('$nip','$nidn','$nm_dos','$alamat','$email','$pass')");
header("location:daftar-dosen.php");
?>