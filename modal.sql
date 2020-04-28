-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2020 at 11:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modal`
--

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `modal_id` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `h_perawatan` double NOT NULL,
  `l_perawatan` double NOT NULL,
  `t_tidur` double NOT NULL,
  `h_rawat` double NOT NULL,
  `p_keluar` double NOT NULL,
  `m_lebih` double NOT NULL,
  `m_kurang` double NOT NULL,
  `bor` double NOT NULL,
  `alos` double NOT NULL,
  `toi` double NOT NULL,
  `bto` double NOT NULL,
  `gdr` double NOT NULL,
  `ndr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`modal_id`, `id_ruangan`, `bulan`, `tahun`, `h_perawatan`, `l_perawatan`, `t_tidur`, `h_rawat`, `p_keluar`, `m_lebih`, `m_kurang`, `bor`, `alos`, `toi`, `bto`, `gdr`, `ndr`) VALUES
(12, 1, 'Januari', '2020', 399, 475, 18, 31, 124, 0, 1, 71.51, 3.83, 1.28, 6.89, 1, 0),
(14, 2, 'Januari', '2020', 341, 430, 21, 31, 124, 0, 0, 52.38, 3.47, 2.5, 5.9, 0, 0),
(15, 3, 'Januari', '2020', 256, 331, 18, 31, 102, 5, 1, 45.88, 3.25, 2.96, 5.67, 6, 5),
(23, 4, 'Januari', '2020', 121, 160, 14, 31, 40, 0, 0, 27.88, 4, 7.83, 2.86, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'Muzdalifah'),
(2, 'Arofah'),
(3, 'Jabal Rahman'),
(4, 'Perinatologi'),
(5, 'Ashofa Ibu'),
(6, 'Ashofa Bayi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`modal_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `modal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
