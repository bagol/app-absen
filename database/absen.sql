-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 12:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `nama`, `lokasi`) VALUES
(1002020, 'Monitor 1', 'pintu depan 1');

-- --------------------------------------------------------

--
-- Table structure for table `logs_user`
--

CREATE TABLE `logs_user` (
  `id` int(11) NOT NULL,
  `aksi` varchar(50) NOT NULL,
  `waktu` date NOT NULL,
  `nik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(10) NOT NULL,
  `keterangan` tinytext DEFAULT NULL,
  `device` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `nik`, `tanggal`, `jam`, `status`, `keterangan`, `device`) VALUES
(10, '3633171808980003', '2020-12-05', '00:20:44', 'pulang', 'absen pulang', 1002020),
(9, '3633171808980003', '2020-12-05', '00:09:43', 'masuk', 'tepat waktu', 1002020);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `shift` varchar(15) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `shift`, `jam_masuk`, `jam_keluar`) VALUES
(1, 'pagi', '23:00:00', '00:20:00'),
(2, 'siang', '14:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nik` varchar(16) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `level` enum('admin','karyawan') NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nik`, `username`, `password`, `email`, `no_telp`, `level`, `gambar`) VALUES
('3676010407980006', 'admin', '$2y$10$3Lz0dJ1.Z7MtWflPvtgHpukHQIbhW7x0rpdovTuwLOEB9nWDQKmI.', 'admin@admin.com', '081222129621', 'admin', '1606753339.jpg'),
('3276010407980001', 'eMul', '$2y$10$oTV8Mu.UuWvuxOA5h6L6..bQ1Cl2VRJhFzYNsgERlkk82DikCGFiS', 'eMul@gmail.com', '08123123123', 'karyawan', '1606750771.jpg'),
('3676010407980003', 'baek', '$2y$10$Ab2Y9u/mktVhIobcO.eSiuqxeG/5Oz4mxYbCYdvIL88Xa.dOt4yze', 'hildauser@gmail.com', '0812312312312', 'admin', '1606750317.PNG'),
('3676110905990001', 'Siapa aja dah', '$2y$10$qyJWB5Qx58wGlQnYbSMHou0B4pk/5.DNJ4K/p4cM2r8Efb4bj5fqu', 'siapaaja@gmail.com', '0812312312312', 'karyawan', '1606992278.PNG'),
('121345', 'saya', '$2y$10$Sv4SBSDb0W7cXyA2mqTGyeMRzLgZgLFp9M6UZMR.HDEZdG4Li2EnW', 'saya@gmail.com', '089213888621', 'karyawan', '1607100580.jpg'),
('3633171808980003', 'bagas_afk', '$2y$10$NRqlAeaOHvoH1wo2bi.hmeAACXGhazRFZTM0mvS8qaJ5pbrA3JYUG', 'bagaskrnw@gmail.com', '087771542525', 'admin', '1607100589.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs_user`
--
ALTER TABLE `logs_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `nik` (`nik`),
  ADD KEY `device` (`device`),
  ADD KEY `tanggal` (`tanggal`) USING HASH;

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002023;

--
-- AUTO_INCREMENT for table `logs_user`
--
ALTER TABLE `logs_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
