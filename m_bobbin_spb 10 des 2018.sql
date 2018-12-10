-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 05:47 AM
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
-- Table structure for table `m_bobbin_spb`
--

CREATE TABLE `m_bobbin_spb` (
  `id` int(11) NOT NULL,
  `no_spb_bobbin` varchar(50) NOT NULL,
  `jenis_packing` varchar(255) NOT NULL,
  `pemohon` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` text,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `reject_remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bobbin_spb`
--

INSERT INTO `m_bobbin_spb` (`id`, `no_spb_bobbin`, `jenis_packing`, `pemohon`, `status`, `keterangan`, `created_by`, `created_at`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`, `reject_remarks`) VALUES
(1, 'SPB-BB.201812.0008', '1', 'JP', 9, '2', 1, '2018-12-07 05:12:49', NULL, NULL, 1, '2018-12-10 11:12:35', 'KOSONG'),
(2, 'SPB-BB.201812.0009', '2', 'CIN', 1, 'OK', 1, '2018-12-09 03:12:42', 1, '2018-12-10 11:12:12', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_bobbin_spb`
--
ALTER TABLE `m_bobbin_spb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_bobbin_spb`
--
ALTER TABLE `m_bobbin_spb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
