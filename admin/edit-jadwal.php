<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SiSAW - Edit Jadwal Kuliah</title>
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
			<li><a href="daftar-dosen.php">Dosen</a></li>
			<li><a href="daftar-jadwal.php" class="active">Jadwal</a></li>
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
			<h3>Edit Jadwal Kuliah</h3>
			<div class="separate-line"></div>
			<br>
			<?php
			$dos = mysqli_query($conn,"select * from dosen");
			$mk = mysqli_query($conn,"select * from matkul");
			$cari = mysqli_query($conn,"select * from jadwal,dosen,matkul where kd_jadwal = '$_GET[kd_jad]' and jadwal.kd_mk = matkul.kd_mk and jadwal.nip = dosen.nip");
			$r = mysqli_fetch_array($cari,MYSQLI_NUM);
			?>
			<form action="edit-schedule.php" method="post">
				<label>Kode Jadwal : </label> <br>
				<input type="text" name="kode" value="<?php echo $r['kd_jadwal']; ?>" class="input-text-add-edit" readonly required="required" /><br />
				<label>Dosen : </label> <br>
				<select name="nip" class="input-text-add-edit">
					<option value="<?php echo $r['nip']; ?>"><?php echo $r['nama_dos'] ?></option>
					<?php
						while ($r_dos = mysql_fetch_array($dos)){
					?>
					<option value="<?php echo $r_dos['nip']; ?>"><?php echo $r_dos['nama_dos'] ?></option>
					<?php
						}
					?>
				</select><br>
				<label>Matakuliah : </label> <br>
				<select name="kd_mk" class="input-text-add-edit">
					<option value="<?php echo $r['kd_mk']; ?>"><?php echo $r['nama_mk'] ?></option>
					<?php
						while ($r_mk = mysql_fetch_array($mk)){
					?>
					<option value="<?php echo $r_mk['kd_mk']; ?>"><?php echo $r_mk['nama_mk'] ?></option>
					<?php
						}
					?>
				</select>
				<br />
				<label>Ruang : </label> <br>
				<input type="text" name="ruang" value="<?php echo $r['ruang']; ?>" class="input-text-add-edit" required="required" /><br />
				<label>Kelas : </label> <br>
				<input type="text" name="ruang" value="<?php echo $r['kelas']; ?>" class="input-text-add-edit" required="required" /><br />
				<br>
<!--
				<label>Hari : </label> <br>
				<input type="text" name="hari" value="<?php echo $r[4]; ?>" class="input-text-add-edit" required="required" /><br />
				<label>Jam Mulai : </label> <br>
				<input type="text" name="jam_m" value="<?php echo $r[5]; ?>" class="input-text-add-edit" required="required" /><br />
				<label>Jam Selesai : </label> <br>
				<input type="text" name="jam_s" value="<?php echo $r[6]; ?>" class="input-text-add-edit" required="required" /><br /><br> 
-->
				<input type="submit" value="Simpan" class="submit-btn"/>
			</form>
		</div>
	</div>
	
</body>
</html>