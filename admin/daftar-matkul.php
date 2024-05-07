<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SiSAW - Daftar Matakuliah</title>
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
			<?php
			$daftar_matkul = mysqli_query($conn,"select * from matkul");
			?>
			<h3>Daftar Matakuliah</h3>
			<div class="separate-line"></div>
			<br />
			<div class="btn-add"><a href="tambah-matkul.php">Tambah Matkul</a></div>
			<br />
			<div style="overflow-x: auto;">
				<table class="table">
					<tr>
						<th>#</th><th>Kode</th><th>Nama Matkul</th><th>JS</th><th>SKS</th><th>Kuota</th><th>Bobot</th><th>Aksi</th>
					</tr>
					<?php
					$no = 1;
					while ($r = mysqli_fetch_array($daftar_matkul,MYSQLI_NUM)){
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r[0]; ?></td>
						<td><?php echo $r[1]; ?></td>
						<td><?php echo $r[2]; ?></td>
						<td><?php echo $r[3]; ?></td>
						<td><?php echo $r[4]; ?></td>
						<td><?php echo $r[5]; ?></td>
						<td><a href="del-matkul.php?kode_mk=<?php echo $r[0]; ?>" title="Hapus"><img src="../image/del.png" class="del-edit-btn1"></a> | <a href="edit-matkul.php?kode_mk=<?php echo $r[0]; ?>" title="Edit"><img src="../image/edit.png" class="del-edit-btn1"></a> </td>
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