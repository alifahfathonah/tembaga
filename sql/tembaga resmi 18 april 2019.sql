-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 12:11 PM
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
-- Table structure for table `r_dtr`
--

CREATE TABLE `r_dtr` (
  `id` int(11) NOT NULL,
  `no_dtr_resmi` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `sj_id` int(11) NOT NULL,
  `r_invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_dtr`
--

INSERT INTO `r_dtr` (`id`, `no_dtr_resmi`, `tanggal`, `sj_id`, `r_invoice_id`, `customer_id`, `created_at`, `created_by`) VALUES
(1, 'DTR-KMP.201903.0002', '2019-03-15', 2, 1, 0, '2019-04-15 08:04:28', 9),
(2, 'DTR-KMP.201903.0003', '2019-03-25', 11, 2, 0, '2019-04-18 11:04:07', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_dtr_detail`
--

CREATE TABLE `r_dtr_detail` (
  `id` int(11) NOT NULL,
  `r_dtr_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `berat_pallete` float NOT NULL,
  `netto` float NOT NULL,
  `no_pallete` varchar(50) NOT NULL,
  `line_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_dtr_detail`
--

INSERT INTO `r_dtr_detail` (`id`, `r_dtr_id`, `rongsok_id`, `qty`, `bruto`, `berat_pallete`, `netto`, `no_pallete`, `line_remarks`) VALUES
(1, 1, 9, 0, 560, 45, 515, '26031911415PPJ', ''),
(2, 1, 9, 0, 555, 44, 511, '260319114113LJF', ''),
(3, 1, 9, 0, 250, 45, 205, '08041913561950', ''),
(4, 2, 9, 0, 1100, 71, 1029, '080419105210SHX', ''),
(5, 2, 10, 0, 1089, 77, 1012, '080419105219AQT', ''),
(6, 2, 10, 0, 255, 55, 200, '08041914402071', '');

-- --------------------------------------------------------

--
-- Table structure for table `r_ttr`
--

CREATE TABLE `r_ttr` (
  `id` int(11) NOT NULL,
  `no_ttr_resmi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `r_dtr_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_ttr`
--

INSERT INTO `r_ttr` (`id`, `no_ttr_resmi`, `tanggal`, `r_dtr_id`, `customer_id`, `remarks`, `created_at`, `created_by`) VALUES
(1, 'TTR-KMP.201903.0002', '2019-03-15', 1, 0, '', '2019-04-15 08:04:28', 9),
(2, 'TTR-KMP.201903.0003', '2019-03-25', 2, 0, '', '2019-04-18 11:04:07', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_ttr_detail`
--

CREATE TABLE `r_ttr_detail` (
  `id` int(11) NOT NULL,
  `r_ttr_id` int(11) NOT NULL,
  `r_dtr_detail_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `line_remarks` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_ttr_detail`
--

INSERT INTO `r_ttr_detail` (`id`, `r_ttr_id`, `r_dtr_detail_id`, `rongsok_id`, `qty`, `bruto`, `netto`, `line_remarks`, `created_at`, `created_by`) VALUES
(1, 1, 1, 9, 0, 560, 515, '', '2019-04-15 08:04:28', 9),
(2, 1, 2, 9, 0, 555, 511, '', '2019-04-15 08:04:28', 9),
(3, 1, 3, 9, 0, 250, 205, '', '2019-04-15 08:04:28', 9),
(4, 2, 4, 9, 0, 1100, 1029, '', '2019-04-18 11:04:07', 9),
(5, 2, 5, 10, 0, 1089, 1012, '', '2019-04-18 11:04:07', 9),
(6, 2, 6, 10, 0, 255, 200, '', '2019-04-18 11:04:07', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_gudang_fg`
--

CREATE TABLE `r_t_gudang_fg` (
  `id` int(11) NOT NULL,
  `f_invoice_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `berat_bobbin` float NOT NULL,
  `no_packing` varchar(50) NOT NULL,
  `bobbin_id` int(11) NOT NULL,
  `nomor_bobbin` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_gudang_fg`
--

INSERT INTO `r_t_gudang_fg` (`id`, `f_invoice_id`, `jenis_barang_id`, `bruto`, `netto`, `berat_bobbin`, `no_packing`, `bobbin_id`, `nomor_bobbin`, `created_at`, `created_by`, `modified_at`, `modified_by`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(1, 1, 469, 550, 505, 45, '190326B03000001', 1641, 'B0001', '2019-03-01 00:00:00', 9, NULL, NULL, '2019-03-26', '2019-03-19'),
(2, 1, 469, 552, 506, 46, '190326B03000002', 1641, 'B0001', '2019-03-01 00:00:00', 9, NULL, NULL, '2019-03-26', '2019-03-19'),
(3, 2, 301, 560, 509.6, 50.4, '190327M04000008', 813, 'M0008', '2019-03-18 00:00:00', 9, NULL, NULL, '2019-03-27', '2019-04-18'),
(4, 2, 301, 555, 510.4, 44.6, '190327M04000022', 817, 'M0022', '2019-03-18 00:00:00', 9, NULL, NULL, '2019-03-27', '2019-04-18'),
(5, 2, 372, 560, 496.8, 63.2, '190326L09000005', 104, 'L0005', '2019-03-18 00:00:00', 9, NULL, NULL, '2019-03-26', '2019-04-18'),
(6, 2, 372, 562, 504.2, 57.8, '190326L09000014', 111, 'L0014', '2019-03-18 00:00:00', 9, NULL, NULL, '2019-03-26', '2019-04-18'),
(7, 2, 372, 555, 496.5, 58.5, '190326L09000017', 112, 'L0017', '2019-03-18 00:00:00', 9, NULL, NULL, '2019-03-26', '2019-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_invoice`
--

CREATE TABLE `r_t_invoice` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `no_invoice_resmi` varchar(30) NOT NULL,
  `sjr_id` int(1) NOT NULL,
  `r_po_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `persentase` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `remarks` text,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_invoice`
--

INSERT INTO `r_t_invoice` (`id`, `invoice_id`, `no_invoice_resmi`, `sjr_id`, `r_po_id`, `tanggal`, `jumlah`, `persentase`, `total`, `remarks`, `created_by`, `created_at`) VALUES
(1, 1, 'INV-CV-TEST1', 1, 1, '2019-03-01', 1011, 10, 1112, '', 9, '2019-04-15 08:04:39'),
(2, 2, 'INV-2', 6, 3, '2019-03-18', 1998, 10, 2197, '', 9, '2019-04-18 10:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_invoice_detail`
--

CREATE TABLE `r_t_invoice_detail` (
  `id` int(11) NOT NULL,
  `invoice_resmi_id` int(11) NOT NULL,
  `dtr_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `berat_pallete` float NOT NULL,
  `line_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_invoice_detail`
--

INSERT INTO `r_t_invoice_detail` (`id`, `invoice_resmi_id`, `dtr_detail_id`, `jenis_barang_id`, `bruto`, `netto`, `berat_pallete`, `line_remarks`) VALUES
(1, 1, 30, 9, 560, 515, 45, ''),
(2, 1, 31, 9, 555, 511, 44, ''),
(3, 1, 63, 9, 250, 205, 45, ''),
(4, 2, 59, 9, 1100, 1029, 71, ''),
(5, 2, 60, 10, 1089, 1012, 77, ''),
(6, 2, 64, 10, 255, 200, 55, '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_inv_jasa`
--

CREATE TABLE `r_t_inv_jasa` (
  `id` int(11) NOT NULL,
  `no_invoice_jasa` varchar(50) NOT NULL,
  `sjr_id` int(11) NOT NULL,
  `r_t_so_id` int(11) DEFAULT '0',
  `r_t_po_id` int(11) DEFAULT '0',
  `customer_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `flag_sjr` tinyint(4) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `remarks` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_inv_jasa`
--

INSERT INTO `r_t_inv_jasa` (`id`, `no_invoice_jasa`, `sjr_id`, `r_t_so_id`, `r_t_po_id`, `customer_id`, `cv_id`, `flag_sjr`, `tanggal`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'INV-KMP.201903.0003', 3, 1, NULL, 0, 0, 1, '2019-03-20', '', '2019-04-15 08:04:53', 9, '2019-04-15 08:04:17', 9),
(4, 'INV-KMP.201904.0005', 5, NULL, NULL, 11, 0, 1, '2019-04-15', '', '2019-04-15 08:04:23', 9, '2019-04-15 08:04:30', 9),
(12, 'INV-KMP.201904.0011', 14, 2, NULL, 0, 3, 1, '2019-04-01', '', '2019-04-18 12:04:55', 9, '2019-04-18 02:04:15', 9),
(17, 'INV-AS-0001', 15, NULL, NULL, 17, 0, 1, '2019-04-16', '', '2019-04-18 03:04:17', 9, '2019-04-18 03:04:20', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_inv_jasa_detail`
--

CREATE TABLE `r_t_inv_jasa_detail` (
  `id` int(11) NOT NULL,
  `inv_jasa_id` int(11) NOT NULL,
  `so_detail_id` int(11) DEFAULT NULL,
  `po_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `amount` double DEFAULT NULL,
  `total_amount` double NOT NULL,
  `line_remarks` text NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_inv_jasa_detail`
--

INSERT INTO `r_t_inv_jasa_detail` (`id`, `inv_jasa_id`, `so_detail_id`, `po_detail_id`, `jenis_barang_id`, `qty`, `bruto`, `netto`, `amount`, `total_amount`, `line_remarks`, `modified_at`, `modified_by`) VALUES
(1, 1, NULL, 0, 443, 0, 550, 505, 160000, 80800000, '', '2019-04-15 08:04:17', 9),
(2, 1, NULL, 0, 443, 0, 552, 506, 160000, 80960000, '', '2019-04-15 08:04:17', 9),
(5, 4, 0, 0, 443, 0, 550, 505, 180000, 90900000, '', '2019-04-15 08:04:30', 9),
(6, 4, 0, 0, 443, 0, 552, 506, 180000, 91080000, '', '2019-04-15 08:04:30', 9),
(13, 12, 2, 0, 301, 0, 1115, 1020, 160000, 163200000, '', '2019-04-18 02:04:15', 9),
(14, 12, 3, 0, 372, 0, 1677, 14975, 150000, 224625000, '', '2019-04-18 02:04:15', 9),
(19, 17, 0, 0, 301, 0, 1115, 1020, 160000, 163200000, '', '2019-04-18 03:04:20', 9),
(20, 17, 0, 0, 372, 0, 1677, 14975, 150000, 224625000, '', '2019-04-18 03:04:20', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_po`
--

CREATE TABLE `r_t_po` (
  `id` int(11) NOT NULL,
  `no_po` varchar(25) NOT NULL,
  `f_invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `term_of_payment` varchar(25) NOT NULL,
  `jenis_po` varchar(25) NOT NULL,
  `flag_po_cv` int(1) NOT NULL,
  `flag_so` int(1) NOT NULL,
  `flag_sj` int(1) NOT NULL,
  `flag_dp` int(1) NOT NULL,
  `flag_pelunasan` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `remarks` text,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_po`
--

INSERT INTO `r_t_po` (`id`, `no_po`, `f_invoice_id`, `customer_id`, `cv_id`, `tanggal`, `term_of_payment`, `jenis_po`, `flag_po_cv`, `flag_so`, `flag_sj`, `flag_dp`, `flag_pelunasan`, `status`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'PO-AR-0001', 1, 11, 0, '2019-03-04', 'TUNAI', 'PO CUSTOMER', 2, 0, 1, 0, 0, 0, '', '2019-04-15 08:04:12', 9, '2019-04-15 08:04:25', 9),
(2, 'PO-MEGA-0001', 1, 0, 1, '2019-03-07', 'TUNAI', 'PO CV', 0, 1, 2, 0, 0, 0, '', '2019-04-15 08:04:09', 9, '2019-04-15 08:04:23', 9),
(3, 'PO-AS-0001', 2, 17, 0, '2019-03-19', 'TUNAI', 'PO CUSTOMER', 4, 0, 6, 0, 0, 0, '', '2019-04-18 10:04:15', 9, '2019-04-18 10:04:34', 9),
(4, 'PO-CV-AB-0001', 2, 0, 3, '2019-03-20', 'TUNAI', 'PO CV', 0, 2, 11, 0, 0, 0, '', '2019-04-18 10:04:37', 9, '2019-04-18 10:04:52', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_po_detail`
--

CREATE TABLE `r_t_po_detail` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `line_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_po_detail`
--

INSERT INTO `r_t_po_detail` (`id`, `po_id`, `jenis_barang_id`, `qty`, `bruto`, `netto`, `amount`, `total_amount`, `line_remarks`) VALUES
(1, 1, 443, 2, 0, 1011, 180000, 181980000, ''),
(2, 2, 443, 2, 0, 1011, 160000, 161760000, ''),
(3, 3, 301, 2, 0, 500, 160000, 80000000, ''),
(4, 3, 372, 3, 0, 1497.5, 150000, 224625000, ''),
(5, 4, 301, 2, 0, 500, 150000, 75000000, ''),
(6, 4, 372, 3, 0, 1497.5, 140000, 209650000, '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_so`
--

CREATE TABLE `r_t_so` (
  `id` int(11) NOT NULL,
  `no_so` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `customer_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `sjr_id` int(11) NOT NULL,
  `tgl_po` date NOT NULL,
  `jenis_so` varchar(20) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `remarks` text,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_so`
--

INSERT INTO `r_t_so` (`id`, `no_so`, `tanggal`, `marketing_id`, `cv_id`, `customer_id`, `po_id`, `sjr_id`, `tgl_po`, `jenis_so`, `jenis_barang`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'SO-KMP.201903.0005', '2019-03-18', 9, 1, 0, 2, 3, '2019-03-07', 'SO KMP', 'FG', '', '2019-04-15 08:04:52', 9, '2019-04-15 08:04:06', 9),
(2, 'SO-KMP.201903.0006', '2019-03-26', 9, 3, 0, 4, 14, '2019-03-20', 'SO KMP', 'FG', '', '2019-04-18 11:04:27', 9, '2019-04-18 11:04:41', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_so_detail`
--

CREATE TABLE `r_t_so_detail` (
  `id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `netto` float NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `line_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_so_detail`
--

INSERT INTO `r_t_so_detail` (`id`, `so_id`, `po_detail_id`, `jenis_barang_id`, `qty`, `netto`, `amount`, `total_amount`, `line_remarks`) VALUES
(1, 1, 2, 443, 0, 1011, 160000, 161760000, ''),
(2, 2, 5, 301, 0, 500, 150000, 75000000, ''),
(3, 2, 6, 372, 0, 1497.5, 140000, 209650000, '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_surat_jalan`
--

CREATE TABLE `r_t_surat_jalan` (
  `id` int(11) NOT NULL,
  `no_sj_resmi` varchar(25) NOT NULL,
  `r_invoice_id` int(11) DEFAULT '0',
  `r_so_id` int(11) DEFAULT '0',
  `r_po_id` int(11) DEFAULT '0',
  `r_sj_id` int(11) DEFAULT '0',
  `r_inv_jasa_id` int(11) DEFAULT '0',
  `flag_sj_cv` int(11) NOT NULL,
  `flag_tolling` int(1) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `m_customer_id` int(11) DEFAULT NULL,
  `m_cv_id` int(11) DEFAULT NULL,
  `jenis_surat_jalan` varchar(100) DEFAULT NULL,
  `m_type_kendaraan_id` int(11) DEFAULT NULL,
  `no_kendaraan` varchar(15) DEFAULT NULL,
  `supir` varchar(50) DEFAULT NULL,
  `remarks` text,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_surat_jalan`
--

INSERT INTO `r_t_surat_jalan` (`id`, `no_sj_resmi`, `r_invoice_id`, `r_so_id`, `r_po_id`, `r_sj_id`, `r_inv_jasa_id`, `flag_sj_cv`, `flag_tolling`, `tanggal`, `jenis_barang`, `m_customer_id`, `m_cv_id`, `jenis_surat_jalan`, `m_type_kendaraan_id`, `no_kendaraan`, `supir`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'SJ-AR-0001', 1, 0, 0, 0, 0, 2, 0, '2019-03-05', 'RONGSOK', 11, NULL, 'SURAT JALAN CUSTOMER', 0, '', '', '', '2019-04-15 08:04:44', 9, '2019-04-15 08:04:49', 9),
(2, 'SJ-CV-MEGA-0001', 1, 0, 2, 1, 0, 0, 1, '2019-03-11', 'RONGSOK', NULL, 1, 'SURAT JALAN CV', 0, '', '', '', '2019-04-15 08:04:05', 9, '2019-04-15 08:04:59', 9),
(3, 'SJ-KMP.201903.0004', 0, 1, 0, 0, 1, 5, 0, '2019-03-19', 'FG', NULL, 1, NULL, 0, '', '', '', '2019-04-15 08:04:23', 9, '2019-04-15 08:04:31', 9),
(5, 'SJ-KE-CUSTOMER-NOMOR-1', 0, 0, 0, 3, 4, 0, 0, '2019-04-15', 'FG', 11, NULL, 'SURAT JALAN KE CUSTOMER', 0, '', '', '', '2019-04-15 08:04:01', 9, '2019-04-15 08:04:03', 9),
(6, 'SJ-AS-0001', 2, 0, 0, 0, 0, 11, 0, '2019-03-20', 'RONGSOK', 17, NULL, 'SURAT JALAN CUSTOMER', 0, '', '', '', '2019-04-18 10:04:06', 9, '2019-04-18 10:04:12', 9),
(11, 'SJ-CV-AB-0001', 2, 0, 4, 6, 0, 0, 1, '2019-03-22', 'RONGSOK', NULL, 3, 'SURAT JALAN CV', 0, '', '', '', '2019-04-18 11:04:27', 9, '2019-04-18 11:04:52', 9),
(14, 'SJ-KMP.201904.0007', 0, 2, 0, 0, 12, 15, 0, '2019-03-27', 'FG', NULL, 3, NULL, 0, '', '', '', '2019-04-18 11:04:58', 9, '2019-04-18 11:04:34', 9),
(15, 'SJ-KE-AS-0001', 0, 0, 0, 14, 17, 0, 0, '2019-04-05', 'FG', 17, NULL, 'SURAT JALAN KE CUSTOMER', 0, '', '', '', '2019-04-18 02:04:34', 9, '2019-04-18 02:04:03', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_surat_jalan_detail`
--

CREATE TABLE `r_t_surat_jalan_detail` (
  `id` int(11) NOT NULL,
  `sj_resmi_id` int(11) NOT NULL,
  `so_detail_id` int(11) DEFAULT '0',
  `po_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `no_packing` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `nomor_bobbin` varchar(20) DEFAULT NULL,
  `line_remarks` text NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_surat_jalan_detail`
--

INSERT INTO `r_t_surat_jalan_detail` (`id`, `sj_resmi_id`, `so_detail_id`, `po_detail_id`, `jenis_barang_id`, `no_packing`, `qty`, `bruto`, `netto`, `nomor_bobbin`, `line_remarks`, `modified_at`, `modified_by`) VALUES
(1, 1, 0, 0, 9, '26031911415PPJ', 0, 560, 515, NULL, '', '2019-04-15 08:04:49', 9),
(2, 1, 0, 0, 9, '260319114113LJF', 0, 555, 511, NULL, '', '2019-04-15 08:04:49', 9),
(3, 1, 0, 0, 9, '08041913561950', 0, 250, 205, NULL, '', '2019-04-15 08:04:49', 9),
(4, 2, 0, 0, 9, '26031911415PPJ', 0, 560, 515, NULL, '', '2019-04-15 08:04:59', 9),
(5, 2, 0, 0, 9, '260319114113LJF', 0, 555, 511, NULL, '', '2019-04-15 08:04:59', 9),
(6, 2, 0, 0, 9, '08041913561950', 0, 250, 205, NULL, '', '2019-04-15 08:04:59', 9),
(7, 3, NULL, 0, 443, '190326B03000001', 0, 550, 505, 'B0001', '', '2019-04-15 08:04:31', 9),
(8, 3, NULL, 0, 443, '190326B03000002', 0, 552, 506, 'B0001', '', '2019-04-15 08:04:31', 9),
(11, 5, 0, 0, 443, '190326B03000001', 0, 550, 505, 'B0001', '', '2019-04-15 08:04:03', 9),
(12, 5, 0, 0, 443, '190326B03000002', 0, 552, 506, 'B0001', '', '2019-04-15 08:04:03', 9),
(13, 6, 0, 0, 9, '080419105210SHX', 0, 1100, 1029, NULL, '', '2019-04-18 10:04:12', 9),
(14, 6, 0, 0, 10, '080419105219AQT', 0, 1089, 1012, NULL, '', '2019-04-18 10:04:12', 9),
(15, 6, 0, 0, 10, '08041914402071', 0, 255, 200, NULL, '', '2019-04-18 10:04:12', 9),
(25, 11, 0, 0, 9, '080419105210SHX', 0, 1100, 1029, NULL, '', '2019-04-18 11:04:52', 9),
(26, 11, 0, 0, 10, '080419105219AQT', 0, 1089, 1012, NULL, '', '2019-04-18 11:04:52', 9),
(27, 11, 0, 0, 10, '08041914402071', 0, 255, 200, NULL, '', '2019-04-18 11:04:52', 9),
(32, 14, 2, 0, 301, '190327M04000008', 0, 560, 509.6, 'M0008', '', '2019-04-18 11:04:34', 9),
(33, 14, 2, 0, 301, '190327M04000022', 0, 555, 510.4, 'M0022', '', '2019-04-18 11:04:34', 9),
(34, 14, 3, 0, 372, '190326L09000005', 0, 560, 496.8, 'L0005', '', '2019-04-18 11:04:34', 9),
(35, 14, 3, 0, 372, '190326L09000014', 0, 562, 504.2, 'L0014', '', '2019-04-18 11:04:34', 9),
(36, 14, 3, 0, 372, '190326L09000017', 0, 555, 496.5, 'L0017', '', '2019-04-18 11:04:34', 9),
(37, 15, 0, 0, 301, '190327M04000008', 0, 560, 509.6, 'M0008', '', '2019-04-18 02:04:03', 9),
(38, 15, 0, 0, 301, '190327M04000022', 0, 555, 510.4, 'M0022', '', '2019-04-18 02:04:03', 9),
(39, 15, 0, 0, 372, '190326L09000005', 0, 560, 496.8, 'L0005', '', '2019-04-18 02:04:03', 9),
(40, 15, 0, 0, 372, '190326L09000014', 0, 562, 504.2, 'L0014', '', '2019-04-18 02:04:03', 9),
(41, 15, 0, 0, 372, '190326L09000017', 0, 555, 496.5, 'L0017', '', '2019-04-18 02:04:03', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r_dtr`
--
ALTER TABLE `r_dtr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_dtr_detail`
--
ALTER TABLE `r_dtr_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_ttr`
--
ALTER TABLE `r_ttr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_ttr_detail`
--
ALTER TABLE `r_ttr_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_t_gudang_fg`
--
ALTER TABLE `r_t_gudang_fg`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `r_t_inv_jasa`
--
ALTER TABLE `r_t_inv_jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_t_inv_jasa_detail`
--
ALTER TABLE `r_t_inv_jasa_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_t_po`
--
ALTER TABLE `r_t_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_t_po_detail`
--
ALTER TABLE `r_t_po_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_t_so`
--
ALTER TABLE `r_t_so`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_t_so_detail`
--
ALTER TABLE `r_t_so_detail`
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
-- AUTO_INCREMENT for table `r_dtr`
--
ALTER TABLE `r_dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_dtr_detail`
--
ALTER TABLE `r_dtr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `r_ttr`
--
ALTER TABLE `r_ttr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_ttr_detail`
--
ALTER TABLE `r_ttr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `r_t_gudang_fg`
--
ALTER TABLE `r_t_gudang_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `r_t_invoice`
--
ALTER TABLE `r_t_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_t_invoice_detail`
--
ALTER TABLE `r_t_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `r_t_inv_jasa`
--
ALTER TABLE `r_t_inv_jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `r_t_inv_jasa_detail`
--
ALTER TABLE `r_t_inv_jasa_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `r_t_po`
--
ALTER TABLE `r_t_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_t_po_detail`
--
ALTER TABLE `r_t_po_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `r_t_so`
--
ALTER TABLE `r_t_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_t_so_detail`
--
ALTER TABLE `r_t_so_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_t_surat_jalan`
--
ALTER TABLE `r_t_surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `r_t_surat_jalan_detail`
--
ALTER TABLE `r_t_surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
