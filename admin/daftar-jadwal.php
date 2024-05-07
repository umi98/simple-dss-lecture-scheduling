<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SiSAW - Daftar Jadwal Kuliah</title>
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
			<?php
			$daftar_jadwal = mysqli_query($conn,"select * from jadwal, matkul, dosen where jadwal.kd_mk = matkul.kd_mk and jadwal.nip = dosen.nip");
			?>
			<h3>Daftar Jadwal Kuliah</h3>
			<div class="separate-line"></div>
			<br />
			<div class="btn-add"><a href="tambah-jadwal.php">Tambah Jadwal</a></div>
			<br />
			<div style="overflow-x: auto;">
				<table class="table">
					<tr>
						<th>#</th><th>Kode Jadwal</th><th>Dosen</th><th>Matakuliah</th><th>Ruang</th><th>Hari</th><th>Kelas</th><th>Jam Mulai</th><th>Jam Selesai</th><th>Aksi</th>
					</tr>
					<?php
					$no = 1;
					while ($r = mysqli_fetch_array($daftar_jadwal,MYSQLI_ASSOC)){
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r['kd_jadwal']; ?></td>
						<td><?php echo $r['nama_dos']; ?></td>
						<td><?php echo $r['nama_mk']; ?></td>
						<td><?php echo $r['ruang']; ?></td>
						<td><?php echo $r['hari']; ?></td>
						<td><?php echo $r['kelas']; ?></td>
						<td><?php echo $r['jam_mulai']; ?></td>
						<td><?php echo $r['jam_selesai']; ?></td>
						<td><a href="del-jadwal.php?kode_jadwal=<?php echo $r[0]; ?>" title="Hapus"><img src="../image/del.png" class="del-edit-btn1"></a> | <a href="edit-jadwal.php?kd_jad=<?php echo $r[0]; ?>" title="Edit"><img src="../image/edit.png" class="del-edit-btn1"></a> </td>
					</tr>
					<?php
						$no++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>