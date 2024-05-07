<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SiSAW - Jadwal Dosen</title>
<link rel="icon" href="../image/cat-and-red-book-round.png">
<link rel="stylesheet" href="../css/style.css">
</head>
<?php
session_start();
include "../check.php";
include "../koneksi.php";
?>
<body>
	<div class="navbar-side">
		<ul>
			<li><center><img src="../image/user-128.png" class="img-navbar"> <br> Dosen <br><br></center></li>
			<li><a href="index.php">Home</a></li>
			<li><a href="jadwal-kul.php">Jadwal Kuliah</a></li>
			<li><a href="jadwal-dos.php" class="active">Jadwal Dosen</a></li>
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
			<h3>Detail Jadwal</h3>
			<div class="separate-line"></div>
			<?php
			$detail_mk = mysqli_query($conn,"select matkul.kd_mk, nama_mk from matkul, jadwal where jadwal.kd_mk = matkul.kd_mk and kd_jadwal = '$_GET[kd_jad]'");
			$a = mysqli_fetch_array($detail_mk,MYSQLI_NUM);
			?>
			<p>Kode Matkul    : <?php echo $a[0]; ?></p>
			<p>Nama Matkul    : <?php echo $a[1]; ?></p>
			<br>
			<?php
			$daftar_mhs = mysqli_query($conn,"select distinct krs.nim, nama_mhs from jadwal, mahasiswa, krs, dosen where krs.nim = mahasiswa.nim and jadwal.nip = dosen.nip and dosen.nip = '$_SESSION[uname]' and krs.kd_jadwal = '$_GET[kd_jad]'");
			?>
			<table border="1" class="table">
				<tr>
					<th>No</th><th>NIM</th><th>Nama</th>
				</tr>
				<?php
				$no = 1;
				while ($r = mysqli_fetch_array($daftar_mhs,MYSQLI_NUM)){
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $r['nim']; ?></td>
					<td><?php echo $r['nama_mhs']; ?></td>
				</tr>
				<?php
					$no++;
				}
				?>
			</table>
		</div>
	</div>
</body>
</html>