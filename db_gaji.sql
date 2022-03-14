-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 02:24 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(1, 'Staff Finance', '4000000', '800000', '300000'),
(2, 'Staff Production', '4000000', '500000', '300000'),
(3, 'Staff Marketing', '4500000', '800000', '300000'),
(5, 'Admin', '4500000', '800000', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `nis`, `nama_siswa`, `jenis_kelamin`, `nama_sekolah`, `hadir`, `sakit`, `alpha`) VALUES
(21, '022022', '12425143736', 'Doni', 'Laki-Laki', 'SMK Negri 10 Batam', 20, 1, 0),
(22, '022022', '123456789', 'Rita', 'perempuan', 'SMK Negri 10 Batam', 20, 2, 0),
(23, '022022', '23542736434', 'Siti', 'perempuan', 'SMK Negri 10 Batam', 20, 3, 0),
(24, '012022', '12425143736', 'Doni', 'Laki-Laki', 'SMK Negri 10 Batam', 20, 0, 0),
(25, '012022', '123456789', 'Rita', 'perempuan', 'SMK Negri 10 Batam', 20, 0, 0),
(26, '012022', '23542736434', 'Siti', 'perempuan', 'SMK Negri 10 Batam', 20, 0, 0),
(33, '042022', '12425143736', 'Doni', 'Laki-Laki', 'SMK Negri 10 Batam', 20, 1, 0),
(34, '042022', '123456789', 'Rita', 'perempuan', 'SMK Negri 10 Batam', 20, 1, 0),
(35, '042022', '23542736434', 'Siti', 'perempuan', 'SMK Negri 10 Batam', 20, 0, 1),
(37, '022022', '1121122224313', 'Admin', 'perempuan', 'admin', 20, 1, 0),
(38, '012022', '1121122224313', 'Admin', 'perempuan', 'admin', 20, 0, 0),
(39, '012022', '1096135364747', 'Dino', 'Laki-Laki', 'SEKOLAH MENENGAH KEJURUAN', 20, 1, 0),
(40, '022022', '1096135364747', 'Dino', 'Laki-Laki', 'SEKOLAH MENENGAH KEJURUAN', 20, 0, 1),
(41, '042022', '1121122224313', 'Admin', 'perempuan', 'admin', 20, 0, 0),
(42, '042022', '1096135364747', 'Dino', 'Laki-Laki', 'SEKOLAH MENENGAH KEJURUAN', 20, 0, 0),
(43, '032022', '1121122224313', 'Admin', 'perempuan', 'admin', 20, 0, 0),
(44, '032022', '1096135364747', 'Dino', 'Laki-Laki', 'SEKOLAH MENENGAH KEJURUAN', 20, 1, 2),
(45, '032022', '12425143736', 'Doni', 'Laki-Laki', 'SMK Negri 10 Batam', 20, 0, 1),
(46, '032022', '123456789', 'Rita', 'perempuan', 'SMK Negri 10 Batam', 20, 1, 0),
(47, '032022', '23542736434', 'Siti', 'perempuan', 'SMK Negri 10 Batam', 20, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `id_user`, `nik`, `nama_pegawai`, `username`, `password`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `photo`, `hak_akses`) VALUES
(1, 0, '1234567890', 'Rita', 'test', '098f6bcd4621d373cade4e832627b4f6', 'perempuan', 'Staff Finance', '2012-12-27', 'Pegawai Tetap', 'rita2.png', 1),
(2, 0, '1234567812', 'Doni', 'doni', '2da9cd653f63c010b6d6c5a5ad73fe32', 'Laki-Laki', 'Staff Production', '2017-01-11', 'Pegawai Tidak Tetap', 'dodi_jpg.jpg', 2),
(6, 0, '500514255', 'Sina', 'sina', 'f3cd3a30041fb6bb38da8bda843de5ba', 'perempuan', 'Staff Finance', '2009-09-09', 'Pegawai Tidak Tetap', 'doni3.png', 2),
(7, 0, '12345145256', 'Angga', 'angga', '8479c86c7afcb56631104f5ce5d6de62', 'Laki-Laki', 'Staff Production', '2010-10-10', 'Pegawai Tetap', 'dodi_jpg3.jpg', 2),
(8, 0, '1536277728', 'Amad', 'amad', '8563b29d53ea5bf15057f27d7cccedd5', 'Laki-Laki', 'Admin', '2012-12-12', 'Pegawai Tidak Tetap', 'dodi_jpg4.jpg', 1),
(9, 0, '234567765434', 'Rona', 'rona', '689b6f533e39e77830b46315ab4cb501', 'perempuan', 'Staff Production', '2012-02-02', 'Pegawai Tidak Tetap', 'avatar01.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_sekolah`
--

CREATE TABLE `data_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` varchar(225) NOT NULL,
  `tahun_ajaran` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_sekolah`
--

INSERT INTO `data_sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `tahun_ajaran`) VALUES
(2, 'SMK Negri 10 Batam', 'jln.tengku blok F batam kota', '2021/2022'),
(3, 'SMK Kartini Batam', 'jln. Tengku Umar', '2021/2022'),
(4, 'SMK Negeri 30 Batam', 'Jln.Imam Syafi\'i', '2021/2022'),
(5, 'SEKOLAH MENENGAH KEJURUAN', 'jln.engku putri', '2021/2022'),
(7, 'admin', 'Jln.Imamunm', '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(225) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `photo` varchar(225) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `id_user`, `nis`, `nama_siswa`, `username`, `password`, `kelas`, `jurusan`, `jenis_kelamin`, `sekolah`, `tanggal_masuk`, `photo`, `hak_akses`) VALUES
(3, 0, '23542736434', 'Siti', 'siti', 'db04eb4b07e0aaf8d1d477ae342bdff9', 'IX', 'Akuntasi', 'perempuan', 'SMK Negri 10 Batam', '2022-02-02', 'avatar011.png', 2),
(4, 0, '123456789', 'Rita', 'test', '098f6bcd4621d373cade4e832627b4f6', 'IX', 'TKJ', 'perempuan', 'SMK Negri 10 Batam', '2022-02-02', 'avatar02.png', 1),
(5, 0, '12425143736', 'Doni', 'doni', '2da9cd653f63c010b6d6c5a5ad73fe32', 'IX', 'Multimedia', 'Laki-Laki', 'SMK Negri 10 Batam', '2022-02-02', 'avatar1.jpg', 2),
(7, 0, '1096135364747', 'Dino', 'dino', 'b246ff693d453c3b1a3049752da2bc75', 'IX', 'RPL', 'Laki-Laki', 'SEKOLAH MENENGAH KEJURUAN', '2022-02-20', 'avatar2.jpg', 2),
(8, 0, '1121122224313', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'IX', 'Admin', 'perempuan', 'admin', '2010-10-10', 'avatar012.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'siswa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `potongan`, `jml_potongan`) VALUES
(1, 'Alpha', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('''admin'',''pegawai'',''siswa''') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `data_sekolah`
--
ALTER TABLE `data_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_sekolah`
--
ALTER TABLE `data_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
