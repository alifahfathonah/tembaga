-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 06:31 AM
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

CREATE TABLE IF NOT EXISTS `r_dtr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_dtr_resmi` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `sj_id` int(11) NOT NULL,
  `r_invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_dtr`
--

INSERT INTO `r_dtr` (`id`, `no_dtr_resmi`, `tanggal`, `sj_id`, `r_invoice_id`, `customer_id`, `created_at`, `created_by`) VALUES
(1, 'DTR-1', '2019-04-24', 5, 2, 2, '2019-04-24 11:04:18', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_dtr_detail`
--

CREATE TABLE IF NOT EXISTS `r_dtr_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_dtr_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `berat_pallete` float NOT NULL,
  `netto` float NOT NULL,
  `no_pallete` varchar(50) NOT NULL,
  `line_remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_dtr_detail`
--

INSERT INTO `r_dtr_detail` (`id`, `r_dtr_id`, `rongsok_id`, `qty`, `bruto`, `berat_pallete`, `netto`, `no_pallete`, `line_remarks`) VALUES
(1, 1, 9, 0, 1100, 89, 1011, '120419184251XEZ', ''),
(2, 1, 9, 0, 1100, 71, 1029, '080419105210SHX', ''),
(3, 1, 10, 0, 255, 55, 200, '08041914402071', '');

-- --------------------------------------------------------

--
-- Table structure for table `r_ttr`
--

CREATE TABLE IF NOT EXISTS `r_ttr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_ttr_resmi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `r_dtr_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_ttr`
--

INSERT INTO `r_ttr` (`id`, `no_ttr_resmi`, `tanggal`, `r_dtr_id`, `customer_id`, `remarks`, `created_at`, `created_by`) VALUES
(1, 'TTR-1', '2019-04-24', 1, 2, '', '2019-04-24 11:04:18', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_ttr_detail`
--

CREATE TABLE IF NOT EXISTS `r_ttr_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_ttr_id` int(11) NOT NULL,
  `r_dtr_detail_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `line_remarks` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_ttr_detail`
--

INSERT INTO `r_ttr_detail` (`id`, `r_ttr_id`, `r_dtr_detail_id`, `rongsok_id`, `qty`, `bruto`, `netto`, `line_remarks`, `created_at`, `created_by`) VALUES
(1, 1, 1, 9, 0, 1100, 1011, '', '2019-04-24 11:04:18', 9),
(2, 1, 2, 9, 0, 1100, 1029, '', '2019-04-24 11:04:18', 9),
(3, 1, 3, 10, 0, 255, 200, '', '2019-04-24 11:04:18', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_bpb`
--

CREATE TABLE IF NOT EXISTS `r_t_bpb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_bpb` varchar(25) NOT NULL,
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
  `jenis_bpb` varchar(100) DEFAULT NULL,
  `m_type_kendaraan_id` int(11) DEFAULT NULL,
  `no_kendaraan` varchar(15) DEFAULT NULL,
  `supir` varchar(50) DEFAULT NULL,
  `remarks` text,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_bpb`
--

INSERT INTO `r_t_bpb` (`id`, `no_bpb`, `r_invoice_id`, `r_so_id`, `r_po_id`, `r_sj_id`, `r_inv_jasa_id`, `flag_sj_cv`, `flag_tolling`, `tanggal`, `jenis_barang`, `m_customer_id`, `m_cv_id`, `jenis_bpb`, `m_type_kendaraan_id`, `no_kendaraan`, `supir`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'BPB-CS-CV.0001', 1, 0, 1, 3, 0, 0, 0, '2019-04-02', 'RONGSOK', 11, NULL, 'BPB RONGSOK', 0, '', '', '', '2019-04-23 02:04:10', 9, '2019-04-23 02:04:16', 9),
(2, 'BPB-CS-CV.0002', 2, 0, 3, 5, 0, 0, 0, '2019-03-04', 'RONGSOK', 17, NULL, 'BPB RONGSOK', 0, '', '', '', '2019-04-23 04:04:00', 9, '2019-04-23 04:04:06', 9),
(3, 'BPB-KMP-CV.0001', 0, 0, 0, 8, 0, 0, 0, '2019-04-10', 'FG', 17, NULL, 'BPB FG', 0, '', '', 'TEST', '2019-04-23 05:04:00', 9, '2019-04-23 10:04:52', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_bpb_detail`
--

CREATE TABLE IF NOT EXISTS `r_t_bpb_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bpb_resmi_id` int(11) NOT NULL,
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
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_bpb_detail`
--

INSERT INTO `r_t_bpb_detail` (`id`, `bpb_resmi_id`, `sj_resmi_id`, `so_detail_id`, `po_detail_id`, `jenis_barang_id`, `no_packing`, `qty`, `bruto`, `netto`, `nomor_bobbin`, `line_remarks`, `modified_at`, `modified_by`) VALUES
(1, 1, 0, 0, 0, 9, '12041918430KWR', 0, 1080, 1009, NULL, '', '2019-04-23 02:04:16', 9),
(2, 1, 0, 0, 0, 9, '08041913561950', 0, 250, 205, NULL, '', '2019-04-23 02:04:16', 9),
(3, 2, 0, 0, 0, 9, '120419184251XEZ', 0, 1100, 1011, NULL, '', '2019-04-23 04:04:06', 9),
(4, 2, 0, 0, 0, 9, '080419105210SHX', 0, 1100, 1029, NULL, '', '2019-04-23 04:04:06', 9),
(5, 2, 0, 0, 0, 10, '08041914402071', 0, 255, 200, NULL, '', '2019-04-23 04:04:06', 9),
(6, 3, 8, 0, 0, 301, '190327M04000008', 0, 560, 509.6, 'M0008', '', '0000-00-00 00:00:00', 0),
(7, 3, 8, 0, 0, 301, '190327M04000022', 0, 555, 510.4, 'M0022', '', '0000-00-00 00:00:00', 0),
(8, 3, 8, 0, 0, 372, '190326L09000005', 0, 560, 496.8, 'L0005', '', '0000-00-00 00:00:00', 0),
(9, 3, 8, 0, 0, 372, '190326L09000014', 0, 562, 504.2, 'L0014', '', '0000-00-00 00:00:00', 0),
(10, 3, 8, 0, 0, 372, '190326L09000017', 0, 555, 496.5, 'L0017', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_gudang_fg`
--

CREATE TABLE IF NOT EXISTS `r_t_gudang_fg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `tanggal_keluar` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_gudang_fg`
--

INSERT INTO `r_t_gudang_fg` (`id`, `f_invoice_id`, `jenis_barang_id`, `bruto`, `netto`, `berat_bobbin`, `no_packing`, `bobbin_id`, `nomor_bobbin`, `created_at`, `created_by`, `modified_at`, `modified_by`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(1, 1, 469, 550, 505, 45, '190326B03000001', 1641, 'B0001', '2019-04-01 00:00:00', 9, NULL, NULL, '2019-03-26', '2019-04-10'),
(2, 1, 469, 552, 506, 46, '190326B03000002', 1641, 'B0001', '2019-04-01 00:00:00', 9, NULL, NULL, '2019-03-26', '2019-04-10'),
(3, 2, 301, 560, 509.6, 50.4, '190327M04000008', 813, 'M0008', '2019-03-01 00:00:00', 9, NULL, NULL, '2019-03-27', '2019-03-14'),
(4, 2, 301, 555, 510.4, 44.6, '190327M04000022', 817, 'M0022', '2019-03-01 00:00:00', 9, NULL, NULL, '2019-03-27', '2019-03-14'),
(5, 2, 372, 560, 496.8, 63.2, '190326L09000005', 104, 'L0005', '2019-03-01 00:00:00', 9, NULL, NULL, '2019-03-26', '2019-03-14'),
(6, 2, 372, 562, 504.2, 57.8, '190326L09000014', 111, 'L0014', '2019-03-01 00:00:00', 9, NULL, NULL, '2019-03-26', '2019-03-14'),
(7, 2, 372, 555, 496.5, 58.5, '190326L09000017', 112, 'L0017', '2019-03-01 00:00:00', 9, NULL, NULL, '2019-03-26', '2019-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_invoice`
--

CREATE TABLE IF NOT EXISTS `r_t_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `no_invoice_resmi` varchar(30) NOT NULL,
  `bpb_id` int(1) NOT NULL,
  `r_po_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `persentase` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `remarks` text,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_invoice`
--

INSERT INTO `r_t_invoice` (`id`, `invoice_id`, `no_invoice_resmi`, `bpb_id`, `r_po_id`, `tanggal`, `jumlah`, `persentase`, `total`, `remarks`, `created_by`, `created_at`) VALUES
(1, 1, 'M.0001', 1, 1, '2019-04-01', 1011, 10, 1112, '', 9, '2019-04-23 01:04:09'),
(2, 2, 'M.0002', 2, 3, '2019-03-01', 1998, 10, 2197, '', 9, '2019-04-23 04:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_invoice_detail`
--

CREATE TABLE IF NOT EXISTS `r_t_invoice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_resmi_id` int(11) NOT NULL,
  `dtr_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `berat_pallete` float NOT NULL,
  `line_remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_invoice_detail`
--

INSERT INTO `r_t_invoice_detail` (`id`, `invoice_resmi_id`, `dtr_detail_id`, `jenis_barang_id`, `bruto`, `netto`, `berat_pallete`, `line_remarks`) VALUES
(1, 1, 77, 9, 1080, 1009, 71, ''),
(2, 1, 63, 9, 250, 205, 45, ''),
(3, 2, 76, 9, 1100, 1011, 89, ''),
(4, 2, 59, 9, 1100, 1029, 71, ''),
(5, 2, 64, 10, 255, 200, 55, '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_inv_jasa`
--

CREATE TABLE IF NOT EXISTS `r_t_inv_jasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice_jasa` varchar(50) NOT NULL,
  `sjr_id` int(11) NOT NULL,
  `r_t_so_id` int(11) DEFAULT '0',
  `r_t_po_id` int(11) DEFAULT '0',
  `customer_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `jenis_invoice` varchar(50) DEFAULT NULL,
  `flag_sjr` tinyint(4) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `remarks` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_inv_jasa`
--

INSERT INTO `r_t_inv_jasa` (`id`, `no_invoice_jasa`, `sjr_id`, `r_t_so_id`, `r_t_po_id`, `customer_id`, `cv_id`, `jenis_invoice`, `flag_sjr`, `tanggal`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'INV-KMP.201903.0002', 6, 3, NULL, 0, 2, 'INVOICE KMP KE CV', 1, '2019-03-14', '', '2019-04-23 04:04:47', 9, '2019-04-23 04:04:52', 9),
(2, 'INV-AS.0001', 8, NULL, NULL, 17, 0, 'INVOICE CV KE CUSTOMER', 1, '2019-04-23', '', '2019-04-23 10:04:14', 9, '2019-04-23 10:04:19', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_inv_jasa_detail`
--

CREATE TABLE IF NOT EXISTS `r_t_inv_jasa_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_inv_jasa_detail`
--

INSERT INTO `r_t_inv_jasa_detail` (`id`, `inv_jasa_id`, `so_detail_id`, `po_detail_id`, `jenis_barang_id`, `qty`, `bruto`, `netto`, `amount`, `total_amount`, `line_remarks`, `modified_at`, `modified_by`) VALUES
(1, 1, 4, 0, 301, 0, 560, 5096, 14000, 7134400, '', '2019-04-23 04:04:52', 9),
(2, 1, 4, 0, 301, 0, 555, 510.4, 14000, 7145600, '', '0000-00-00 00:00:00', 0),
(3, 1, 5, 0, 372, 0, 560, 4968, 13000, 6458400, '', '2019-04-23 04:04:52', 9),
(4, 1, 5, 0, 372, 0, 562, 504.2, 13000, 6554600, '', '0000-00-00 00:00:00', 0),
(5, 1, 5, 0, 372, 0, 555, 496.5, 13000, 6454500, '', '0000-00-00 00:00:00', 0),
(6, 2, 0, 0, 301, 0, 1115, 1020, 16000, 16320000, '', '2019-04-23 10:04:19', 9),
(7, 2, 0, 0, 372, 0, 1677, 14975, 15000, 22462500, '', '2019-04-23 10:04:19', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_po`
--

CREATE TABLE IF NOT EXISTS `r_t_po` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(25) NOT NULL,
  `f_invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `term_of_payment` varchar(25) NOT NULL,
  `jenis_po` varchar(25) NOT NULL,
  `flag_bpb` int(1) NOT NULL DEFAULT '0',
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
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_po`
--

INSERT INTO `r_t_po` (`id`, `no_po`, `f_invoice_id`, `customer_id`, `cv_id`, `tanggal`, `term_of_payment`, `jenis_po`, `flag_bpb`, `flag_po_cv`, `flag_so`, `flag_sj`, `flag_dp`, `flag_pelunasan`, `status`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'PO-AR.0001', 1, 11, 0, '2019-04-02', 'TUNAI', 'PO CUSTOMER KE CV', 1, 2, 0, 0, 0, 0, 0, '', '2019-04-23 01:04:34', 9, '2019-04-23 01:04:52', 9),
(2, 'PO-CV-KMP.0001', 1, 0, 1, '2019-04-05', 'TUNAI', 'PO CV KE KMP', 0, 0, 1, 3, 0, 0, 0, 'ONGKOS KERJA', '2019-04-23 02:04:27', 9, '2019-04-23 02:04:40', 9),
(3, 'PO-AS.0001', 2, 17, 0, '2019-03-01', 'TUNAI', 'PO CUSTOMER KE CV', 2, 4, 0, 0, 0, 0, 0, '', '2019-04-23 04:04:13', 9, '2019-04-23 04:04:13', 9),
(4, 'PO-CV-KMP.0002', 2, 0, 2, '2019-03-06', 'TUNAI', 'PO CV KE KMP', 0, 0, 3, 5, 0, 0, 0, '', '2019-04-23 04:04:53', 9, '2019-04-23 04:04:02', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_po_detail`
--

CREATE TABLE IF NOT EXISTS `r_t_po_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `line_remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_po_detail`
--

INSERT INTO `r_t_po_detail` (`id`, `po_id`, `jenis_barang_id`, `qty`, `bruto`, `netto`, `amount`, `total_amount`, `line_remarks`) VALUES
(1, 1, 443, 2, 0, 1011, 180000, 181980000, ''),
(2, 2, 443, 2, 0, 1011, 18000, 18198000, ''),
(3, 3, 301, 2, 0, 500, 16000, 8000000, ''),
(4, 3, 372, 3, 0, 1497.5, 15000, 22462500, ''),
(5, 4, 301, 2, 0, 500, 14000, 7000000, ''),
(6, 4, 372, 3, 0, 1497.5, 13000, 19467500, '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_so`
--

CREATE TABLE IF NOT EXISTS `r_t_so` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_so`
--

INSERT INTO `r_t_so` (`id`, `no_so`, `tanggal`, `marketing_id`, `cv_id`, `customer_id`, `po_id`, `sjr_id`, `tgl_po`, `jenis_so`, `jenis_barang`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'SO-KMP.201904.0002', '2019-04-10', 9, 1, 0, 2, 4, '2019-04-05', 'SO KMP', 'FG', '', '2019-04-23 03:04:37', 9, '2019-04-23 03:04:44', 9),
(2, 'SO-CV.0001', '2019-04-23', 9, 0, 17, 3, 0, '2019-03-01', 'SO CV', 'FG', NULL, '2019-04-23 04:04:13', 9, '0000-00-00 00:00:00', 0),
(3, 'SO-KMP.201903.0003', '2019-03-12', 9, 2, 0, 4, 6, '2019-03-06', 'SO KMP', 'FG', '', '2019-04-23 04:04:51', 9, '2019-04-23 04:04:55', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_so_detail`
--

CREATE TABLE IF NOT EXISTS `r_t_so_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `netto` float NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `line_remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_so_detail`
--

INSERT INTO `r_t_so_detail` (`id`, `so_id`, `po_detail_id`, `jenis_barang_id`, `qty`, `netto`, `amount`, `total_amount`, `line_remarks`) VALUES
(1, 1, 2, 443, 0, 1011, 18000, 18198000, ''),
(2, 2, 3, 301, 2, 500, 16000, 8000000, ''),
(3, 2, 3, 301, 3, 500, 16000, 8000000, ''),
(4, 3, 5, 301, 0, 500, 14000, 7000000, ''),
(5, 3, 6, 372, 0, 1497.5, 13000, 19467500, '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_surat_jalan`
--

CREATE TABLE IF NOT EXISTS `r_t_surat_jalan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_sj_resmi` varchar(25) NOT NULL,
  `r_invoice_id` int(11) DEFAULT '0',
  `r_so_id` int(11) DEFAULT '0',
  `r_po_id` int(11) DEFAULT '0',
  `r_sj_id` int(11) DEFAULT '0',
  `r_bpb_id` int(11) NOT NULL DEFAULT '0',
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
  `modified_by` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_surat_jalan`
--

INSERT INTO `r_t_surat_jalan` (`id`, `no_sj_resmi`, `r_invoice_id`, `r_so_id`, `r_po_id`, `r_sj_id`, `r_bpb_id`, `r_inv_jasa_id`, `flag_sj_cv`, `flag_tolling`, `tanggal`, `jenis_barang`, `m_customer_id`, `m_cv_id`, `jenis_surat_jalan`, `m_type_kendaraan_id`, `no_kendaraan`, `supir`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(3, 'SJ-CV-KMP.0001', 1, 0, 2, 0, 1, 0, 0, 0, '2019-04-08', 'RONGSOK', NULL, 1, 'SURAT JALAN CV KE KMP', 0, '', '', '', '2019-04-23 03:04:10', 9, '2019-04-23 03:04:42', 9),
(4, 'SJ-KMP.201904.0004', 0, 1, 0, 0, 0, 0, 0, 0, '2019-04-10', 'FG', NULL, 1, 'SURAT JALAN KMP KE CV', 0, '', '', '', '2019-04-23 04:04:28', 9, '2019-04-23 04:04:35', 9),
(5, 'SJ-CV-KMP.0002', 2, 0, 4, 0, 2, 0, 0, 1, '2019-03-11', 'RONGSOK', NULL, 2, 'SURAT JALAN CV KE KMP', 0, '', '', '', '2019-04-23 04:04:24', 9, '2019-04-23 04:04:28', 9),
(6, 'SJ-KMP.201903.0003', 0, 3, 0, 0, 0, 1, 8, 0, '2019-03-14', 'FG', NULL, 2, 'SURAT JALAN KMP KE CV', 0, '', '', '', '2019-04-23 04:04:19', 9, '2019-04-23 04:04:28', 9),
(8, 'SJ-CV-CS.0001', 0, 0, 0, 6, 3, 2, 0, 0, '2019-04-23', 'FG', 17, NULL, 'SURAT JALAN CV KE CUSTOMER', 0, '', '', 'TEST', '2019-04-23 05:04:00', 9, '2019-04-23 10:04:52', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_surat_jalan_detail`
--

CREATE TABLE IF NOT EXISTS `r_t_surat_jalan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_surat_jalan_detail`
--

INSERT INTO `r_t_surat_jalan_detail` (`id`, `sj_resmi_id`, `so_detail_id`, `po_detail_id`, `jenis_barang_id`, `no_packing`, `qty`, `bruto`, `netto`, `nomor_bobbin`, `line_remarks`, `modified_at`, `modified_by`) VALUES
(3, 3, 0, 0, 9, '12041918430KWR', 0, 1080, 1009, NULL, '', '2019-04-23 03:04:42', 9),
(4, 3, 0, 0, 9, '08041913561950', 0, 250, 205, NULL, '', '2019-04-23 03:04:42', 9),
(5, 4, NULL, 0, 469, '190326B03000001', 0, 550, 505, 'B0001', '', '2019-04-23 04:04:35', 9),
(6, 4, NULL, 0, 469, '190326B03000002', 0, 552, 506, 'B0001', '', '2019-04-23 04:04:35', 9),
(7, 5, 0, 0, 9, '120419184251XEZ', 0, 1100, 1011, NULL, '', '2019-04-23 04:04:28', 9),
(8, 5, 0, 0, 9, '080419105210SHX', 0, 1100, 1029, NULL, '', '2019-04-23 04:04:28', 9),
(9, 5, 0, 0, 10, '08041914402071', 0, 255, 200, NULL, '', '2019-04-23 04:04:28', 9),
(10, 6, 4, 0, 301, '190327M04000008', 0, 560, 509.6, 'M0008', '', '2019-04-23 04:04:28', 9),
(11, 6, 4, 0, 301, '190327M04000022', 0, 555, 510.4, 'M0022', '', '2019-04-23 04:04:28', 9),
(12, 6, 5, 0, 372, '190326L09000005', 0, 560, 496.8, 'L0005', '', '2019-04-23 04:04:28', 9),
(13, 6, 5, 0, 372, '190326L09000014', 0, 562, 504.2, 'L0014', '', '2019-04-23 04:04:28', 9),
(14, 6, 5, 0, 372, '190326L09000017', 0, 555, 496.5, 'L0017', '', '2019-04-23 04:04:28', 9),
(16, 8, 0, 0, 301, '190327M04000008', 0, 560, 509.6, 'M0008', '', '2019-04-23 10:04:52', 9),
(17, 8, 0, 0, 301, '190327M04000022', 0, 555, 510.4, 'M0022', '', '2019-04-23 10:04:52', 9),
(18, 8, 0, 0, 372, '190326L09000005', 0, 560, 496.8, 'L0005', '', '2019-04-23 10:04:52', 9),
(19, 8, 0, 0, 372, '190326L09000014', 0, 562, 504.2, 'L0014', '', '2019-04-23 10:04:52', 9),
(20, 8, 0, 0, 372, '190326L09000017', 0, 555, 496.5, 'L0017', '', '2019-04-23 10:04:52', 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
