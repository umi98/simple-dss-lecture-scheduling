<?php

//echo "select * from matkul where kd_mk = '$kd_mk'";
$cari_mk = mysqli_query($conn,"select * from matkul where kd_mk = '$kd_mk'");
$r_mk = mysqli_fetch_array($cari_mk,MYSQLI_NUM);

$pagi = 0;
$siang = 0;

//DARI GRADE

if ($r_mk['grade_matkul'] == 5){
	$pagi += 50;
	$siang += 10;
}

else if ($r_mk['grade_matkul'] == 4){
	$pagi += 40;
	$siang += 20;
}

else if ($r_mk['grade_matkul'] == 3){
	$pagi += 30;
	$siang += 30;
}

else if ($r_mk['grade_matkul'] == 2){
	$pagi += 20;
	$siang += 40;
}

else if ($r_mk['grade_matkul'] == 1){
	$pagi += 10;
	$siang += 50;
}

//DARI JAM STUDI

if ($r_mk['js'] == 4){
	$pagi += 40;
	$siang += 10; }

else if	($r_mk['js'] == 3){
	$pagi += 30;
	$siang += 20; }

else if	($r_mk['js'] == 2){
	$pagi += 20;
	$siang += 30; }

else if ($r_mk['js'] == 1){
	$pagi += 10;
	$siang += 40; }
//database %siang dan pagi
//select count(id) from tabelRuang
//select * from tabel yg ada %pagi siang where (nilai siang dan pagi terbesar);
//for (sebanyak data yg belum diset)

//MENENTUKAN HARI DAN JAM

$daftar_hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat");

$cari_jadwal = mysqli_query($conn,"select * from jadwal where ruang = '$ruang'");
$hasil_jadwal = mysqli_num_rows($cari_jadwal);
$r_jadwal = mysqli_fetch_array($cari_jadwal,MYSQLI_NUM);

//STEP 1
//	Cari Ruang. Jika ruang belum dipakai langsung simpan sesuai dengan persentase pagi dan siang
//STEP 2
//	Jika ruang sudah dipakai, periksa hari. Jika hari indeks 0 belum dipakai, maka menggunakan indeks 0, dst.
//	Jika indeks sudah dipakai periksa jam.
//STEP 3
//	Simpan!!!

if ($hasil_jadwal == 0){
	$hari = $daftar_hari[0];
	if ($pagi > $siang){
		//if $jam_terisi $jam_m=ambil database
		$jam_m = 1;
	}
	else if ($pagi < $siang){
		$jam_m = 7;
	}
	else if ($pagi == $siang){
		$jam_m = 5;
	}
	$jam_s = $jam_m + $r_mk['js'] - 1;
}
else {
	for($i=0;$i<5;$i++){
//		echo $i;
		if ($r_jadwal['hari'] != $daftar_hari[$i]){
			$hari = $daftar_hari[$i];
			if ($pagi > $siang){
				$jam_m = 1;
			}
			else if ($pagi < $siang){
				$jam_m = 7;
			}
			else if ($pagi == $siang){
				$jam_m = 5;
			}
			$jam_s = $jam_m + $r_mk['js'] - 1;
//			echo $i;
			break;
		}
		else if ($r_jadwal['hari'] == $daftar_hari[$i]){
			$hari = $daftar_hari[$i];
			if ($pagi > $siang){
				for ($j=1;$j<=6;$j++){
					if (($r_jadwal['jam_mulai'] != $j) && ($r_jadwal['jam_selesai'] != $j+$r_mk['js']+1)){
						$jam_m = $j;
						if ($jam_m != $r_jadwal['jam_selesai']){
							$jam_s = $jam_m + $r_mk['js'] - 1;
							break;
						}
					}
				}
			}
			else if ($pagi < $siang){
				for ($j=7;$j<=12;$j++){
					if (($r_jadwal['jam_mulai'] != $j) && ($r_jadwal['jam_selesai'] != $j+$r_mk['js']+1)){
						$jam_m = $j;
						if ($jam_m != $r_jadwal['jam_selesai']){
							$jam_s = $jam_m + $r_mk['js'] - 1;
							break;
						}
					}
				}
			}
			else if ($pagi == $siang){
				for ($j=5;$j<=8;$j++){
					if (($r_jadwal['jam_mulai'] != $j) && ($r_jadwal['jam_selesai'] != $j+$r_mk['js']+1)){
						$jam_m = $j;
						if ($jam_m != $r_jadwal['jam_selesai']){
							$jam_s = $jam_m + $r_mk['js'] - 1;
							break;
						}
					}
				}
			}
			break;
		}
	}
}
//echo $jam_m.$jam_s;
//echo $pagi.$siang;
//menghitung jam terahir 

?>