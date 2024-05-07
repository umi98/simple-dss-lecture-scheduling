<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "sistem_informasi_daftar_matkul";
$conn = mysqli_connect($server,$username,$password,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// mysql_connect($server,$username,$password) or die ("Koneksi Gagal!");
// mysql_select_db($db) or die ("Database tidak tersedia!");
?>