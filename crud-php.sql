-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 03:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE `administrasi` (
  `id_administrasi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `gol` varchar(50) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `berangkat` date NOT NULL,
  `kembali` date NOT NULL,
  `lama` varchar(255) NOT NULL,
  `transport` float NOT NULL,
  `uangHarian` float NOT NULL,
  `penginapan` float NOT NULL,
  `jumlah` float NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`id_administrasi`, `nama`, `nip`, `gol`, `jabatan`, `instansi`, `asal`, `tujuan`, `berangkat`, `kembali`, `lama`, `transport`, `uangHarian`, `penginapan`, `jumlah`, `tanggal`) VALUES
(7, 'Retno Agung Prasetyo K., M..Si', '198010032006041006', 'III-C', 'PMG Muda', 'Puslitbang BMKG', 'Jakarta', 'Bandung', '2024-05-21', '2024-05-23', '2 Hari', 600000, 1290000, 1360000, 3250000, '2024-05-16 03:27:37'),
(8, 'Tapish Rama', '252645789132456125', 'III-D', 'PMG Muda', 'Puslitbang MBKG', 'Jakarta', 'Bogor', '2024-05-16', '2024-05-19', '3 Hari', 1000000, 500000, 2500000, 10000000, '2024-05-16 13:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(5, 'Administrator Utama', 'adminutama', 'adminutama@gmail.com', '$2y$10$JWXYhx.6MivAw1uhp9pk.uFarMNmwyNUEWN7pwYX5YaDlZbCvdnZ2', '1'),
(6, 'Administrator', 'admin', 'adminbiasa@gmail.com', '$2y$10$QgmKpjQz0f1H/lfoW2liKuUgf.9Meu88f6KfibJadlFdD8b2CTokm', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `prodi`, `jk`, `telepon`, `email`, `foto`) VALUES
(4, 'Tahfiz Ramadhan', 'Teknik Informatika', 'Laki-Laki', '081234567890', 'tahfiz@gmail.com', '660e267097cdb.jpg'),
(6, 'Ajis', 'Teknik Informatika', 'Laki-Laki', '08123456789', 'ahmad@gmail.com', '660e543f18e4d.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`id_administrasi`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `id_administrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
