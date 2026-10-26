-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2026 at 02:06 AM
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
-- Database: `db5a`
--

-- --------------------------------------------------------

--
-- Table structure for table `myguests`
--

CREATE TABLE `myguests` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mahasiswa`
--

CREATE TABLE `nilai_mahasiswa` (
  `nim` char(10) NOT NULL,
  `nama_mhsw` varchar(30) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nilai_akhir` float DEFAULT NULL,
  `nilai_huruf` varchar(10) DEFAULT NULL,
  `predikat` varchar(20) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_mahasiswa`
--

INSERT INTO `nilai_mahasiswa` (`nim`, `nama_mhsw`, `foto`, `nilai_akhir`, `nilai_huruf`, `predikat`, `reg_date`, `modify_date`) VALUES
('1231313131', 'test uniqe', NULL, 44.44, 'D', 'Kurang', '2026-10-25 12:36:46', NULL),
('1313212312', 'ronald', NULL, 77.77, 'B', 'Memuaskan', '2026-10-09 16:51:23', '2026-10-25 19:32:10'),
('2423425435', 'test nilaiiii', NULL, 44.45, 'D', 'Kurang', '2026-10-25 12:38:28', NULL),
('3201115044', 'Yan Ondemande', NULL, 95.68, 'A', 'Sangat Memuaskan', '2026-10-25 06:56:01', '2026-10-25 13:56:01'),
('3202015004', 'binjai', NULL, 67.33, 'B', 'Memuaskan', '2026-10-12 07:19:00', '2026-10-18 21:02:59'),
('3202416034', 'Ahmad Halim Arafat', '1111111111_1792936807.jpeg', 99.99, 'A', 'Sangat Memuaskan', '2026-10-25 12:05:21', '2026-10-25 21:00:32'),
('3202416048', 'Saskia Rafina Fitri', '3202416048_1792936679.png', 99.99, 'A', 'Sangat Memuaskan', '2026-10-09 16:52:00', '2026-10-25 20:57:59'),
('3202516062', 'deddy', NULL, 61.55, 'C', 'Cukup', '2026-10-09 16:51:23', '2026-10-09 23:51:23'),
('3202716098', 'budiono wong', NULL, 87.56, 'A', 'sangat memuaskan', '2026-10-12 08:14:06', '2026-10-12 15:14:06'),
('3333333333', 'test uwow', NULL, 33.33, 'E', 'Tidak Lulus', '2026-10-25 12:36:34', NULL),
('4234345342', 'ambatubas', NULL, 67.67, 'B', 'Memuaskan', '2026-10-25 12:38:03', '2026-10-25 20:09:17'),
('4324235423', 'hallo rek', NULL, 55.55, 'C', 'Cukup', '2026-10-25 12:36:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myguests`
--
ALTER TABLE `myguests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
