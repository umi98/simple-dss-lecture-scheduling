<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SiSAW - Jadwal Kuliah</title>
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
			Mahasiswa <br><br></center></li>
			<li><a href="index.php">Home</a></li>
			<li><a href="jadwal-kul.php">Kartu Rencana Studi</a></li>
			<li><a href="jadwal-krs.php" class="active">Jadwal Studi</a></li>
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
			<h3>Daftar Jadwal Kuliah</h3>
			<div class="separate-line"></div>
			<br>
			<?php
			$daftar_jadwal = mysqli_query($conn,"select * from krs inner join jadwal on krs.kd_jadwal=jadwal.kd_jadwal inner join dosen on dosen.nip=jadwal.nip inner join matkul on matkul.kd_mk=jadwal.kd_mk where krs.nim = '$_SESSION[uname]'");
			?>
			<table border="1" class="table">
				<tr>
					<th>No</th>
					<th>Kode Mata Kuliah</th>
					<th>Nama Mata kuliah</th>
					<th>Nama Dosen</th>
                    <th>Ruang</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th></th>
				</tr>
				<?php
				$no = 1;
				while ($r = mysqli_fetch_array($daftar_jadwal,MYSQLI_ASSOC)){
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $r["kd_mk"]; ?></td>
					<td><?php echo $r["nama_mk"]; ?></td>
					<td><?php echo $r["nama_dos"]; ?></td>
					<td><?php echo $r["ruang"]; ?></td>
					<td><?php echo $r["hari"]; ?></td>
					<td><?php echo $r["jam_mulai"]; ?></td>
					<td><?php echo $r["jam_selesai"]; ?></td>
					<td><a href="hapus-krs.php?nim=<?php echo $r['nim']; ?>&kd_jadwal=<?php echo $r['kd_jadwal']; ?>" title="Hapus"><img src="../image/del.png" class="del-edit-btn1"></a></td>
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