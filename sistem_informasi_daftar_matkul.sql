-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2024 pada 06.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi_daftar_matkul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(18) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `nama_dos` varchar(35) NOT NULL,
  `alamat_dos` text NOT NULL,
  `email_dos` varchar(35) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nidn`, `nama_dos`, `alamat_dos`, `email_dos`, `password`) VALUES
('195803241990011001', '0024036003', 'Setiadi C.P.', 'Malang', 'setiadicp@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
('196509161995121001', '0016096505', 'Hakkun Elmunsyah', 'Malang', 'hakkun@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
('196907171998021001', '0017076907', 'I Made Wirawan', 'Dau', 'wirawan@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
('198108172014041001', '0017088106', 'Agusta Rakhmat Taufani', 'Malang Kucecwara', 'aagusta17@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
('198206042012121001', '0704068201', 'Utomo Pujianto', 'Malang', 'utomo@yahoo.co.id', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `kd_jadwal` varchar(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kd_mk` varchar(10) NOT NULL,
  `ruang` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jam_mulai` int(2) NOT NULL,
  `jam_selesai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `nip`, `kd_mk`, `ruang`, `hari`, `kelas`, `jam_mulai`, `jam_selesai`) VALUES
('JAD0001', '198108172014041001', 'UMPK608', 'G4.202', 'Senin', 'S1 PTI A 2016', 1, 2),
('JAD0002', '198108172014041001', 'UMPK606', 'G4.112', 'Jumat', 'S1 PTI D 2015', 2, 3),
('JAD0003', '195803241990011001', 'FTEK606', 'H5.403', 'Rabu', 'S1 PTI C 2015', 5, 6),
('JAD0004', '196509161995121001', 'FTEK602', 'H5.201', 'Kamis', 'S1 PTI A 2014', 1, 2),
('JAD0005', '198108172014041001', 'FTEK606', 'G4.112', 'Senin', 'S1 PTE C 2015', 7, 8),
('JAD0006', '198108172014041001', 'PTIN607', 'G4.111', 'Senin', 'S1 PTI A 2016', 1, 3),
('JAD0007', '198206042012121001', 'PTIN614', 'H5.211', 'Senin', 'S1 PTI B 2015', 7, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `nim` varchar(12) NOT NULL,
  `kd_jadwal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`nim`, `kd_jadwal`) VALUES
('150533605050', 'JAD0001'),
('150533605050', 'JAD0004'),
('150533605050', 'JAD0002'),
('150533601144', 'JAD0002'),
('150533601144', 'JAD0005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `kd_login` varchar(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`kd_login`, `username`, `password`, `level`) VALUES
('ADM0001', 'admin', '0cc175b9c0f1b6a831c399e269772661', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `nama_mhs` varchar(35) NOT NULL,
  `no_telp_mhs` varchar(15) NOT NULL,
  `email_mhs` varchar(35) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `no_telp_mhs`, `email_mhs`, `jk`, `password`) VALUES
('150533601144', 'Vera Fidiyanti', '089777333555', 'ver@yahoo.co.id', 'P', '0cc175b9c0f1b6a831c399e269772661'),
('150533601993', 'Sitti Rugayah', '087666222333', 'sitti@gmail.com', 'P', '0cc175b9c0f1b6a831c399e269772661'),
('150533603849', 'Tri Rizki Herlambang', '088222999111', 'triherlambang@yahoo.co.id', 'L', '0cc175b9c0f1b6a831c399e269772661'),
('150533604474', 'Septian Adi P', '085444777333', 'yayan@yahoo.co.id', 'L', '0cc175b9c0f1b6a831c399e269772661'),
('150533604784', 'Wisnu Murti Prabowo', '085111222333', 'wisnu@gmail.com', 'L', '0cc175b9c0f1b6a831c399e269772661'),
('150533605050', 'Umi Farida', '082331158777', 'umi@gmail.com', 'P', '0cc175b9c0f1b6a831c399e269772661'),
('150533608130', 'Iqlima Hajar Sugma L', '081222333444', 'iqlima@rocketmail.com', 'P', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `kd_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(30) NOT NULL,
  `sks` int(2) NOT NULL,
  `js` int(2) NOT NULL,
  `kuota` int(2) NOT NULL,
  `grade_matkul` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`kd_mk`, `nama_mk`, `sks`, `js`, `kuota`, `grade_matkul`) VALUES
('FTEK602', 'Metodologi Penelitian', 2, 2, 40, 4),
('FTEK606', 'Pengembangan Sumber Belajar', 2, 2, 40, 3),
('PTIN607', 'Dasar Pemrograman Komputer', 4, 3, 40, 3),
('PTIN614', 'Bahasa Inggris Teknik I', 2, 2, 40, 3),
('UMPK606', 'Pendidikan Pancasila', 2, 2, 40, 4),
('UMPK608', 'Bahasa Indonesia Keilmuan', 2, 2, 40, 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`kd_login`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kd_mk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
