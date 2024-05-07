<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SiSAW - Jadwal Dosen</title>
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
			<h3>Daftar Jadwal Dosen</h3>
			<div class="separate-line"></div>
			<br>
			<?php
			$daftar_jadwal = mysqli_query($conn,"select * from jadwal, matkul, dosen where jadwal.nip = '$_SESSION[uname]' and jadwal.kd_mk = matkul.kd_mk and jadwal.nip = dosen.nip");
			?>
			<table border="1" class="table">
				<tr>
					<th>#</th><th>Kode Jadwal</th><th>Nama Dosen</th><th>Mata Kuliah</th><th>Ruang</th><th>Hari</th><th>Kelas</th><th>Jam Mulai</th><th>Jam Selesai</th>
				</tr>
				<?php
				$no = 1;
				while ($r = mysqli_fetch_array($daftar_jadwal,MYSQLI_ASSOC)){
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><a href="detail-jadwal.php?kd_jad=<?php echo $r['kd_jadwal']; ?>"> <?php echo $r['kd_jadwal']; ?> </a></td>
					<td><?php echo $r['nama_dos']; ?></td>
					<td><?php echo $r['nama_mk']; ?></td>
					<td><?php echo $r['ruang']; ?></td>
					<td><?php echo $r['hari']; ?></td>
					<td><?php echo $r['kelas']; ?></td>
					<td><?php echo $r['jam_mulai']; ?></td>
					<td><?php echo $r['jam_selesai']; ?></td>
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