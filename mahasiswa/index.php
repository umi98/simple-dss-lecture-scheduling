<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SiSAW - Home</title>
<link rel="icon" href="../image/cat-and-red-book-round.png">
<link rel="stylesheet" href="../style.css">
</head>
<?php
session_start();
include "../check.php";
include "../koneksi.php";
?>
<body>
	<div class="navbar-side">
		<ul>
			<li><center><img src="../image/user-128.png" class="img-navbar"> <br>
			Mahasiswa<br><br></center></li>
			<li><a href="index.php" class="active">Home</a></li>
			<li><a href="jadwal-kul.php">Kartu Rencana Studi</a></li>
			<li><a href="jadwal-krs.php"> Jadwal Studi</a></li>
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
			<p>Selamat Datang, <?php echo $_SESSION['nama']; ?>!</p>
		</div>
	</div>
</body>
</html>