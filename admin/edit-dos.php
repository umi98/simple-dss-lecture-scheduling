<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SiSAW - Edit Dosen</title>
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
			<li><a href="daftar-matkul.php">Matakuliah</a></li>
			<li><a href="daftar-mahasiswa.php">Mahasiswa</a></li>
			<li><a href="daftar-dosen.php" class="active">Dosen</a></li>
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
			<h3>Edit Dosen</h3>
			<div class="separate-line"></div>
			<br>
			<?php
			$cari = mysqli_query($conn,"select * from dosen where nip = '$_GET[nip]'");
			$r = mysqli_fetch_array($cari,MYSQLI_NUM);
			?>
			<form action="edit-teacher.php" method="post">
				<label>NIP : </label> <br> 
				<input type="text" name="nip" value="<?php echo $r[0]; ?>" class="input-text-add-edit" required="required" /><br />
				<label>NIDN : </label> <br> 
				<input type="text" name="nidn" value="<?php echo $r[1]; ?>" class="input-text-add-edit" required="required" /><br />
				<label>Nama Dosen : </label> <br> 
				<input type="text" name="nama_dos" value="<?php echo $r[2]; ?>" class="input-text-add-edit" required="required" /><br />
				<label>Alamat : </label> <br> 
				<input type="text" name="alamat" value="<?php echo $r[3]; ?>" class="input-text-add-edit" required="required" /><br />
				<label>EMail : </label> <br>
				<input type="text" name="email" value="<?php echo $r[4]; ?>" class="input-text-add-edit" required="required" /><br /><br>
				<input type="submit" value="Edit" class="submit-btn"/>
			</form>
		</div>
	</div>
</body>
</html>