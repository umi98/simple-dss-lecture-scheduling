<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SiSAW - Tambah Matkul</title>
<link rel="icon" href="../image/cat-and-red-book-round.png">
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<?php
session_start();
include "../check.php";
include "../koneksi.php";
?>
<body>
	<div class="navbar-side">
		<ul>
			<li><center><img src="../image/user-128.png" class="img-navbar"> <br> Admin <br><br></center></li>
			<li><a href="index.php">Home</a></li>
			<li><a href="daftar-matkul.php" class="active">Matakuliah</a></li>
			<li><a href="daftar-mahasiswa.php">Mahasiswa</a></li>
			<li><a href="daftar-dosen.php">Dosen</a></li>
			<li><a href="daftar-jadwal.php">Jadwal</a></li>
			<li></li>
		</ul>
	</div>
	<div class="content">
		<div class="top-nav">
			<ul>
				<li style="float: right"><a href="../logout.php" style="float: right">Logout</a></li>
			</ul>
		</div>
		<div class="container">
		<h3>Tambah Matkul</h3>
			<div class="separate-line"></div>
			<br>
			<form action="add-subject.php" method="post">
				<label>Kode : </label> <br>
				<input type="text" name="kode" class="input-text-add-edit" required="required" /><br />
				<label>Nama Matkul : </label> <br>
				<input type="text" name="nama_matkul" class="input-text-add-edit" required="required" /><br />
				<label>JS : </label> <br>
				<input type="text" name="js" class="input-text-add-edit" required="required" /><br />
				<label>SKS : </label> <br>
				<input type="text" name="sks" class="input-text-add-edit" required="required" /><br />
				<label>Kuota : </label> <br>
				<input type="text" name="kuota" class="input-text-add-edit" required="required" /><br />
				<label>Grade Matakuliah : </label> <br>
				<input type="text" name="grade" class="input-text-add-edit" required="required" /><br /><br>
				<input type="submit" value="Simpan" class="submit-btn"/>
			</form>
		</div>
	</div>
</body>
</html>