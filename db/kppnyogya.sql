-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Feb 19, 2023 at 12:21 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kppnyogya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pegawai`
--

CREATE TABLE `tabel_pegawai` (
  `id` int(11) NOT NULL,
  `role` enum('admin','pegawai') NOT NULL,
  `nip` char(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nik` char(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `nohp` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_pegawai`
--

INSERT INTO `tabel_pegawai` (`id`, `role`, `nip`, `password`, `name`, `nik`, `unit`, `email`, `status`, `nohp`) VALUES
(1, 'admin', '198507162006021002', '198507162006021002', 'Moh Ali Imron', '3317141607850002', 'Sub Bagian Umum', 'moh.aliimron@kemenkeu.go.id', 'Aktif', '085878482196'),
(2, 'pegawai', '1234', '1234', 'Anggi', '3317141607850002', 'Sub Bagian Umum', 'moh.aliimron@kemenkeu.go.id', 'Tidak Aktif', '085878482196'),
(3, 'pegawai', '12345', '123', 'anshori', '123456778', 'Seksi Bank', 'anshori@gmail.com', 'Aktif', '0987651');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
