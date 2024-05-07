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
			<li><a href="jadwal-kul.php" class="active">Kartu Rencana Studi</a></li>
			<li><a href="jadwal-krs.php">Jadwal Studi</a></li>
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
			$nim = $_SESSION['uname'];
			$daftar_jadwal = mysqli_query($conn,"select * from jadwal inner join dosen on dosen.nip=jadwal.nip 
inner join matkul on matkul.kd_mk=jadwal.kd_mk");
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
				while ($r = mysqli_fetch_array($daftar_jadwal, MYSQLI_ASSOC)){
					$kd_jad = $r['kd_jadwal'];
					$daftar_krs = mysqli_query($conn,"select * from krs where nim = '$nim' and kd_jadwal = '$kd_jad'");
				?>
				<tr>
                <form method="post" action="input-krs.php">
                <input type="hidden" name="kd_jadwal" value="<?php echo $r['kd_jadwal']; ?>" />
					<td><?php echo $no; ?></td>
					<td><?php echo $r["kd_mk"]; ?></td>
					<td><?php echo $r["nama_mk"]; ?></td>
					<td><?php echo $r["nama_dos"]; ?></td>
					<td><?php echo $r["ruang"]; ?></td>
					<td><?php echo $r["hari"]; ?></td>
					<td><?php echo $r["jam_mulai"]; ?></td>
					<td><?php echo $r["jam_selesai"]; ?></td>
                    <td>
                    <?php
                    if (mysqli_num_rows($daftar_krs)!=0)
                    {
						?>
                    <input type="submit" value="Tambah" disabled="disabled" class="btn-krs disabled"/>
                    <?php
					} else 
                    {
?>					<input type="submit" value="Tambah" class="btn-krs"/>
                    <?php
					}
					?>
                    </td>
                </form>
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