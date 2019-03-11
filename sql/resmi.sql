-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2019 at 04:43 AM
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
-- Table structure for table `r_t_invoice`
--

CREATE TABLE `r_t_invoice` (
  `id` int(11) NOT NULL,
  `no_invoice_resmi` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `remarks` text,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_invoice`
--

INSERT INTO `r_t_invoice` (`id`, `no_invoice_resmi`, `tanggal`, `jumlah`, `remarks`, `created_by`, `created_at`) VALUES
(1, 'INVOICE-201901.0011', '2019-01-21', 100, 'TEST', 9, '2019-01-21 02:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_invoice_detail`
--

CREATE TABLE `r_t_invoice_detail` (
  `id` int(11) NOT NULL,
  `invoice_resmi_id` int(11) NOT NULL,
  `dtr_detail_id` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `berat_pallete` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_invoice_detail`
--

INSERT INTO `r_t_invoice_detail` (`id`, `invoice_resmi_id`, `dtr_detail_id`, `bruto`, `netto`, `berat_pallete`) VALUES
(68, 1, 9, 78, 65, 13),
(77, 1, 10, 89, 74, 15),
(78, 1, 11, 56, 44, 12);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_surat_jalan`
--

CREATE TABLE `r_t_surat_jalan` (
  `id` int(11) NOT NULL,
  `no_sj_resmi` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `m_type_kendaraan_id` int(11) DEFAULT NULL,
  `no_kendaraan` varchar(15) DEFAULT NULL,
  `supir` varchar(50) DEFAULT NULL,
  `remarks` text,
  `created_at` int(11) NOT NULL,
  `created_by` datetime NOT NULL,
  `modified_at` int(11) NOT NULL,
  `modified_by` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_surat_jalan`
--

INSERT INTO `r_t_surat_jalan` (`id`, `no_sj_resmi`, `tanggal`, `jenis_barang`, `m_customer_id`, `m_type_kendaraan_id`, `no_kendaraan`, `supir`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(3, 'SJ-R.201901.0003', '2019-01-23', 'FG', 110, 2, 'B 9822 EJZ', 'JOKI', '', 2019, '0000-00-00 00:00:00', 2019, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_surat_jalan_detail`
--

CREATE TABLE `r_t_surat_jalan_detail` (
  `id` int(11) NOT NULL,
  `sj_resmi_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `no_packing` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `bobbin_id` int(11) DEFAULT NULL,
  `line_remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r_t_invoice`
--
ALTER TABLE `r_t_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_t_invoice_detail`
--
ALTER TABLE `r_t_invoice_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_t_surat_jalan`
--
ALTER TABLE `r_t_surat_jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_t_surat_jalan_detail`
--
ALTER TABLE `r_t_surat_jalan_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_t_invoice`
--
ALTER TABLE `r_t_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r_t_invoice_detail`
--
ALTER TABLE `r_t_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `r_t_surat_jalan`
--
ALTER TABLE `r_t_surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_t_surat_jalan_detail`
--
ALTER TABLE `r_t_surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
