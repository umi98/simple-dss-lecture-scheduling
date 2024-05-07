<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SiSAW - Tambah Jadwal Kuliah</title>
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
		<h3>Tambah Jadwal Kuliah</h3>
			<?php
				$r = mysqli_query($conn,"select max(kd_jadwal) from jadwal");
				$a = mysqli_fetch_array($r,MYSQLI_ASSOC);
				$o = $a['max(kd_jadwal)'];
				$n = (int) substr($o,3,4);
				$x = $n +1;
				if ($n < 9){
					$m = "JAD000".$x;
				}
				else if ($n>=9 AND $n<99){
					$m = "JAD00".$x;
				}
				else if ($n>=99 AND $n<=999){
					$m = "JAD0".$x;
				}
				else if ($n>=999 AND $n<=9999){
					$m = "JAD".$x;
				}
				
				$dos = mysqli_query($conn, "select * from dosen");
				$mk = mysqli_query($conn, "select * from matkul");
			?>
			<div class="separate-line"></div>
			<br>
			<form action="add-schedule.php" method="post">
				<label>Kode Jadwal : </label> <br>
				<input type="text" name="kode" class="input-text-add-edit" value="<?php echo $m; ?>" readonly required="required" /><br />
				<label>Dosen : </label> <br>
				<select name="nip" class="input-text-add-edit">
					<option value="">Pilih dosen ...</option>
					<?php
						while ($r_dos = mysqli_fetch_array($dos,MYSQLI_ASSOC)){
					?>
					<option value="<?php echo $r_dos['nip']; ?>"><?php echo $r_dos['nama_dos'] ?></option>
					<?php
						}
					?>
				</select>
				<br />
				<label>Matakuliah : </label> <br>
				<select name="kd_mk" class="input-text-add-edit">
					<option value="">Pilih matakuliah ...</option>
					<?php
						while ($r_mk = mysqli_fetch_array($mk, MYSQLI_ASSOC)){
					?>
					<option value="<?php echo $r_mk['kd_mk']; ?>"><?php echo $r_mk['nama_mk'] ?></option>
					<?php
						}
					?>
				</select>
				<br />
				<label>Ruang : </label> <br>
				<input type="text" name="ruang" class="input-text-add-edit" required="required" /><br />
				<label>Kelas : </label> <br>
				<input type="text" name="kls" class="input-text-add-edit" required="required" /><br />
<!--
				<label>Hari : </label> <br>
				<input type="text" name="hari" class="input-text-add-edit" required="required" /><br />
				<label>Jam Mulai : </label> <br>
				<input type="text" name="jam_m" class="input-text-add-edit" required="required" /><br />
				<label>Jam Selesai : </label> <br>
				<input type="text" name="jam_s" class="input-text-add-edit" required="required" /><br />
-->
				<br> 
				<input type="submit" value="Simpan" class="submit-btn"/>
			</form>
		</div>
	</div>
</body>
</html>