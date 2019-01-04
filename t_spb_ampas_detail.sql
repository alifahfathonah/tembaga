-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 07:23 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tembaga`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_ampas_detail`
--

CREATE TABLE `t_spb_ampas_detail` (
  `id` int(11) NOT NULL,
  `t_spb_ampas_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `netto` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spb_ampas_detail`
--

INSERT INTO `t_spb_ampas_detail` (`id`, `t_spb_ampas_id`, `tanggal`, `jenis_barang_id`, `uom`, `netto`, `keterangan`) VALUES
(2, 1, '2018-12-31', 3, 'KG', 1, 'SALES ORDER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_spb_ampas_detail`
--
ALTER TABLE `t_spb_ampas_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_spb_ampas_detail`
--
ALTER TABLE `t_spb_ampas_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
