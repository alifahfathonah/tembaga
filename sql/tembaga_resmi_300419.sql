-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 08:07 AM
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
(1, 'DTR-0001', '2019-04-29', 1, 1, 1, '2019-04-29 05:04:11', 84),
(2, 'DTR-2', '2019-04-30', 5, 2, 2, '2019-04-30 12:04:10', 84);

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
(1, 1, 48, 0, 250, 23, 227, '18041911055231', ''),
(2, 1, 48, 0, 250, 45, 205, '09041914032512', ''),
(3, 1, 48, 0, 560, 50, 510, '090419111827NIK', ''),
(4, 1, 48, 0, 560, 390, 170, '060419132221QYG', ''),
(5, 2, 62, 0, 1100, 87, 1013, '150419191219YVB', '');

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
(1, 'TTR-0001', '2019-04-29', 1, 1, '', '2019-04-29 05:04:11', 84),
(2, 'TTR-2', '2019-04-30', 2, 2, '', '2019-04-30 12:04:10', 84);

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
(1, 1, 1, 48, 0, 250, 227, '', '2019-04-29 05:04:11', 84),
(2, 1, 2, 48, 0, 250, 205, '', '2019-04-29 05:04:11', 84),
(3, 1, 3, 48, 0, 560, 510, '', '2019-04-29 05:04:11', 84),
(4, 1, 4, 48, 0, 560, 170, '', '2019-04-29 05:04:11', 84),
(5, 2, 5, 62, 0, 1100, 1013, '', '2019-04-30 12:04:10', 84);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_bpb`
--

CREATE TABLE `r_t_bpb` (
  `id` int(11) NOT NULL,
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
  `reff_cv` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_bpb`
--

INSERT INTO `r_t_bpb` (`id`, `no_bpb`, `r_invoice_id`, `r_so_id`, `r_po_id`, `r_sj_id`, `r_inv_jasa_id`, `flag_sj_cv`, `flag_tolling`, `tanggal`, `jenis_barang`, `m_customer_id`, `m_cv_id`, `jenis_bpb`, `m_type_kendaraan_id`, `no_kendaraan`, `supir`, `remarks`, `reff_cv`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'SJ-SC.0001', 1, 0, 1, 1, 0, 0, 0, '2019-04-29', 'RONGSOK', 7, NULL, 'BPB RONGSOK', 0, '', '', '', 1, '2019-04-29 04:04:30', 77, '2019-04-29 04:04:43', 77),
(3, 'BPB-KMP-SC.0001', 0, 0, 1, 4, 0, 0, 0, '2019-04-30', 'FG', 7, NULL, 'BPB FG', 0, '', '', '', 1, '2019-04-30 09:04:18', 77, '2019-04-30 09:04:32', 77),
(4, 'BPB-B-LY.0001', 2, 0, 3, 5, 0, 0, 0, '2019-04-30', 'RONGSOK', 9, NULL, 'BPB RONGSOK', 0, '', '', '', 2, '2019-04-30 12:04:57', 78, '2019-04-30 12:04:38', 78),
(5, 'BPB-KMP-LY.0001', 0, 0, 3, 7, 0, 0, 0, '2019-04-30', 'FG', 9, NULL, 'BPB FG', 0, '', '', '', 2, '2019-04-30 12:04:03', 78, '2019-04-30 12:04:17', 78);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_bpb_detail`
--

CREATE TABLE `r_t_bpb_detail` (
  `id` int(11) NOT NULL,
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
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_bpb_detail`
--

INSERT INTO `r_t_bpb_detail` (`id`, `bpb_resmi_id`, `sj_resmi_id`, `so_detail_id`, `po_detail_id`, `jenis_barang_id`, `no_packing`, `qty`, `bruto`, `netto`, `nomor_bobbin`, `line_remarks`, `modified_at`, `modified_by`) VALUES
(1, 1, 0, 0, 0, 48, '18041911055231', 0, 250, 227, NULL, '', '2019-04-29 04:04:36', 77),
(2, 1, 0, 0, 0, 48, '09041914032512', 0, 250, 205, NULL, '', '2019-04-29 04:04:36', 77),
(3, 1, 0, 0, 0, 48, '090419111827NIK', 0, 560, 510, NULL, '', '2019-04-29 04:04:36', 77),
(4, 1, 0, 0, 0, 48, '060419132221QYG', 0, 560, 170, NULL, '', '2019-04-29 04:04:36', 77),
(7, 3, 4, 0, 0, 443, '190326B03000001', 0, 550, 505, 'B0001', '', '0000-00-00 00:00:00', 0),
(8, 3, 4, 0, 0, 443, '190326B03000002', 0, 552, 506, 'B0001', '', '0000-00-00 00:00:00', 0),
(9, 4, 0, 0, 0, 62, '150419191219YVB', 0, 1100, 1013, NULL, '', '2019-04-30 12:04:13', 78),
(10, 4, 0, 0, 0, 62, '150419191110OCB', 0, 1102, 1028, NULL, '', '0000-00-00 00:00:00', 0),
(11, 4, 0, 0, 0, 62, '150419185816LZW', 0, 592, 156, NULL, '', '0000-00-00 00:00:00', 0),
(12, 5, 7, 0, 0, 301, '190327M04000008', 0, 560, 509.6, 'M0008', '', '0000-00-00 00:00:00', 0),
(13, 5, 7, 0, 0, 301, '190327M04000022', 0, 555, 510.4, 'M0022', '', '0000-00-00 00:00:00', 0),
(14, 5, 7, 0, 0, 372, '190326L09000005', 0, 560, 496.8, 'L0005', '', '0000-00-00 00:00:00', 0),
(15, 5, 7, 0, 0, 372, '190326L09000014', 0, 562, 504.2, 'L0014', '', '0000-00-00 00:00:00', 0),
(16, 5, 7, 0, 0, 372, '190326L09000017', 0, 555, 496.5, 'L0017', '', '0000-00-00 00:00:00', 0);

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
(1, 1, 469, 550, 505, 45, '190326B03000001', 1641, 'B0001', '2019-04-29 00:00:00', 77, NULL, NULL, '2019-03-26', '2019-04-29'),
(2, 1, 469, 552, 506, 46, '190326B03000002', 1641, 'B0001', '2019-04-29 00:00:00', 77, NULL, NULL, '2019-03-26', '2019-04-29'),
(3, 2, 301, 560, 509.6, 50.4, '190327M04000008', 813, 'M0008', '2019-04-30 00:00:00', 78, NULL, NULL, '2019-03-27', '2019-04-30'),
(4, 2, 301, 555, 510.4, 44.6, '190327M04000022', 817, 'M0022', '2019-04-30 00:00:00', 78, NULL, NULL, '2019-03-27', '2019-04-30'),
(5, 2, 372, 560, 496.8, 63.2, '190326L09000005', 104, 'L0005', '2019-04-30 00:00:00', 78, NULL, NULL, '2019-03-26', '2019-04-30'),
(6, 2, 372, 562, 504.2, 57.8, '190326L09000014', 111, 'L0014', '2019-04-30 00:00:00', 78, NULL, NULL, '2019-03-26', '2019-04-30'),
(7, 2, 372, 555, 496.5, 58.5, '190326L09000017', 112, 'L0017', '2019-04-30 00:00:00', 78, NULL, NULL, '2019-03-26', '2019-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_invoice`
--

CREATE TABLE `r_t_invoice` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `no_invoice_resmi` varchar(30) NOT NULL,
  `bpb_id` int(1) NOT NULL,
  `r_po_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `persentase` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `remarks` text,
  `reff_cv` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_invoice`
--

INSERT INTO `r_t_invoice` (`id`, `invoice_id`, `no_invoice_resmi`, `bpb_id`, `r_po_id`, `tanggal`, `jumlah`, `persentase`, `total`, `remarks`, `reff_cv`, `created_by`, `created_at`) VALUES
(1, 1, 'M.0001', 1, 1, '2019-04-29', 1011, 10, 1112, '', 1, 77, '2019-04-29 04:04:06'),
(2, 2, 'M.0002', 4, 3, '2019-04-30', 1998, 10, 2197, '', 2, 78, '2019-04-30 12:04:29');

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
(1, 1, 99, 48, 250, 227, 23, ''),
(2, 1, 66, 48, 250, 205, 45, ''),
(3, 1, 65, 48, 560, 510, 50, ''),
(4, 1, 56, 48, 560, 170, 58, ''),
(5, 2, 98, 62, 1100, 1013, 87, ''),
(6, 2, 97, 62, 1102, 1028, 74, ''),
(7, 2, 89, 62, 592, 156, 73, '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_inv_jasa`
--

CREATE TABLE `r_t_inv_jasa` (
  `id` int(11) NOT NULL,
  `no_invoice_jasa` varchar(50) NOT NULL,
  `term_of_payment` varchar(20) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `sjr_id` int(11) NOT NULL,
  `r_t_so_id` int(11) DEFAULT '0',
  `r_t_po_id` int(11) DEFAULT '0',
  `customer_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `jenis_invoice` varchar(50) DEFAULT NULL,
  `flag_sjr` tinyint(4) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `remarks` text NOT NULL,
  `reff_cv` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_inv_jasa`
--

INSERT INTO `r_t_inv_jasa` (`id`, `no_invoice_jasa`, `term_of_payment`, `jatuh_tempo`, `sjr_id`, `r_t_so_id`, `r_t_po_id`, `customer_id`, `cv_id`, `jenis_invoice`, `flag_sjr`, `tanggal`, `remarks`, `reff_cv`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'INV-KMP.201904.0007', 'TUNAI', '2019-04-30', 2, 2, NULL, 0, 1, 'INVOICE KMP KE CV', 1, '2019-04-29', '', 0, '2019-04-29 05:04:46', 84, '2019-04-30 10:04:59', 84),
(5, 'INV-SC.0001', 'TUNAI', '2019-05-22', 4, NULL, 1, 7, 1, 'INVOICE CV KE CUSTOMER', 1, '2019-04-30', '', 1, '2019-04-30 10:04:07', 77, '2019-04-30 10:04:23', 77),
(6, 'INV-KMP.201904.0008', 'TUNAI', '2019-05-31', 6, 4, NULL, 0, 2, 'INVOICE KMP KE CV', 1, '2019-04-30', '', 0, '2019-04-30 12:04:13', 84, '2019-04-30 12:04:16', 84),
(7, 'INV-LY.0001', 'TUNAI', '2019-05-31', 7, NULL, 3, 9, 2, 'INVOICE CV KE CUSTOMER', 1, '2019-04-30', '', 2, '2019-04-30 12:04:39', 78, '2019-04-30 12:04:43', 78);

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
(1, 1, NULL, 0, 443, 0, 550, 505, 15000, 7575000, '', '2019-04-30 10:04:59', 84),
(2, 1, NULL, 0, 443, 0, 552, 506, 15000, 7590000, '', '0000-00-00 00:00:00', 0),
(6, 5, 0, 0, 443, 0, 1102, 1011, 18000, 18198000, '', '2019-04-30 10:04:23', 77),
(7, 6, 5, 0, 301, 0, 560, 5096, 13000, 6624800, '', '2019-04-30 12:04:16', 84),
(8, 6, 5, 0, 301, 0, 555, 510.4, 13000, 6635200, '', '0000-00-00 00:00:00', 0),
(9, 6, 6, 0, 372, 0, 560, 4968, 12000, 5961600, '', '2019-04-30 12:04:16', 84),
(10, 6, 6, 0, 372, 0, 562, 504.2, 12000, 6050400, '', '0000-00-00 00:00:00', 0),
(11, 6, 6, 0, 372, 0, 555, 496.5, 12000, 5958000, '', '0000-00-00 00:00:00', 0),
(12, 7, 0, 0, 301, 0, 1115, 1020, 16000, 16320000, '', '2019-04-30 12:04:43', 78),
(13, 7, 0, 0, 372, 0, 1677, 14975, 15000, 22462500, '', '2019-04-30 12:04:43', 78);

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
  `flag_bpb` int(1) NOT NULL DEFAULT '0',
  `flag_po_cv` int(1) NOT NULL,
  `flag_so` int(1) NOT NULL,
  `flag_sj` int(1) NOT NULL,
  `flag_dp` int(1) NOT NULL,
  `flag_pelunasan` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `remarks` text,
  `reff_cv` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_po`
--

INSERT INTO `r_t_po` (`id`, `no_po`, `f_invoice_id`, `customer_id`, `cv_id`, `tanggal`, `term_of_payment`, `jenis_po`, `flag_bpb`, `flag_po_cv`, `flag_so`, `flag_sj`, `flag_dp`, `flag_pelunasan`, `status`, `remarks`, `reff_cv`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'PO-SC.0001', 1, 7, 0, '2019-04-29', 'TUNAI', 'PO CUSTOMER KE CV', 1, 2, 0, 4, 0, 0, 0, 'ONGKOS KERJA', 1, '2019-04-29 04:04:02', 77, '2019-04-29 04:04:16', 77),
(2, 'PO-SC-KMP.0001', 1, 0, 1, '2019-04-29', 'TUNAI', 'PO CV KE KMP', 0, 0, 2, 1, 0, 0, 0, 'TOLLING TITIPAN', 1, '2019-04-29 04:04:56', 77, '2019-04-29 04:04:08', 77),
(3, 'PO-LY.0001', 2, 9, 0, '2019-04-30', 'TUNAI', 'PO CUSTOMER KE CV', 4, 4, 0, 7, 0, 0, 0, 'ONGKOS KERJA', 2, '2019-04-30 12:04:14', 78, '2019-04-30 12:04:35', 78),
(4, 'PO-LY-KMP.0001', 2, 0, 2, '2019-04-30', 'TUNAI', 'PO CV KE KMP', 0, 0, 4, 5, 0, 0, 0, 'JASA TOLLING', 2, '2019-04-30 12:04:40', 78, '2019-04-30 12:04:09', 78);

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
(1, 1, 443, 2, 0, 1011, 18000, 18198000, ''),
(2, 2, 443, 2, 0, 1011, 15000, 15165000, ''),
(3, 3, 301, 2, 0, 500, 16000, 8000000, ''),
(4, 3, 372, 3, 0, 1497.5, 15000, 22462500, ''),
(5, 4, 301, 2, 0, 500, 13000, 6500000, ''),
(6, 4, 372, 3, 0, 1497.5, 12000, 17970000, '');

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
  `reff_cv` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_so`
--

INSERT INTO `r_t_so` (`id`, `no_so`, `tanggal`, `marketing_id`, `cv_id`, `customer_id`, `po_id`, `sjr_id`, `tgl_po`, `jenis_so`, `jenis_barang`, `remarks`, `reff_cv`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'SO-SC.0001', '2019-04-29', 77, 7, 7, 1, 0, '2019-04-29', 'SO CV', 'FG', 'ONGKOS KERJA', 1, '2019-04-29 04:04:02', 77, '2019-04-30 11:04:55', 77),
(2, 'SO-KMP.201904.0006', '2019-04-29', 84, 1, 0, 2, 2, '2019-04-29', 'SO KMP', 'FG', 'JASA TOLLING', 0, '2019-04-29 05:04:03', 84, '2019-04-29 05:04:12', 84),
(3, 'SO-LY.0001', '2019-04-30', 78, 0, 9, 3, 0, '2019-04-30', 'SO CV', 'FG', 'ONGKOS KERJA', 2, '2019-04-30 12:04:14', 78, '0000-00-00 00:00:00', 0),
(4, 'SO-KMP.201904.0007', '2019-04-30', 84, 2, 0, 4, 6, '2019-04-30', 'SO KMP', 'FG', '', 0, '2019-04-30 12:04:31', 84, '2019-04-30 12:04:35', 84);

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
(1, 1, 1, 443, 2, 1011, 18000, 18198000, ''),
(2, 2, 2, 443, 0, 1011, 15000, 15165000, ''),
(3, 3, 3, 301, 2, 500, 16000, 8000000, ''),
(4, 3, 3, 301, 3, 500, 16000, 8000000, ''),
(5, 4, 5, 301, 0, 500, 13000, 6500000, ''),
(6, 4, 6, 372, 0, 1497.5, 12000, 17970000, '');

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
  `reff_cv` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_surat_jalan`
--

INSERT INTO `r_t_surat_jalan` (`id`, `no_sj_resmi`, `r_invoice_id`, `r_so_id`, `r_po_id`, `r_sj_id`, `r_bpb_id`, `r_inv_jasa_id`, `flag_sj_cv`, `flag_tolling`, `tanggal`, `jenis_barang`, `m_customer_id`, `m_cv_id`, `jenis_surat_jalan`, `m_type_kendaraan_id`, `no_kendaraan`, `supir`, `remarks`, `reff_cv`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'SJ-SC-KMP.0001', 1, 0, 2, 0, 1, 0, 0, 1, '2019-04-29', 'RONGSOK', NULL, 1, 'SURAT JALAN CV KE KMP', 0, '', '', '', 1, '2019-04-29 04:04:38', 77, '2019-04-29 04:04:43', 77),
(2, 'SJ-KMP.201904.0008', 0, 2, 0, 0, 0, 1, 4, 0, '2019-04-29', 'FG', NULL, 1, 'SURAT JALAN KMP KE CV', 0, '', '', '', 0, '2019-04-29 05:04:23', 84, '2019-04-29 05:04:40', 84),
(4, 'SJ-SC-CS.0001', 0, 0, 1, 2, 3, 5, 0, 0, '2019-04-30', 'FG', 7, NULL, 'SURAT JALAN CV KE CUSTOMER', 0, '', '', '', 1, '2019-04-30 09:04:18', 77, '2019-04-30 09:04:32', 77),
(5, 'SJ-LY-KMP.0001', 2, 0, 4, 0, 4, 0, 0, 1, '2019-04-30', 'RONGSOK', NULL, 2, 'SURAT JALAN CV KE KMP', 0, '', '', '', 2, '2019-04-30 12:04:27', 78, '2019-04-30 12:04:38', 78),
(6, 'SJ-KMP.201904.0009', 0, 4, 0, 0, 0, 6, 7, 0, '2019-04-30', 'FG', NULL, 2, 'SURAT JALAN KMP KE CV', 0, '', '', '', 0, '2019-04-30 12:04:54', 84, '2019-04-30 12:04:59', 84),
(7, 'SJ-LY-B.0001', 0, 0, 3, 6, 5, 7, 0, 0, '2019-04-30', 'FG', 9, NULL, 'SURAT JALAN CV KE CUSTOMER', 0, '', '', '', 2, '2019-04-30 12:04:03', 78, '2019-04-30 12:04:17', 78);

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
(1, 1, 0, 0, 48, '18041911055231', 0, 250, 227, NULL, '', '2019-04-29 04:04:43', 77),
(2, 1, 0, 0, 48, '09041914032512', 0, 250, 205, NULL, '', '2019-04-29 04:04:43', 77),
(3, 1, 0, 0, 48, '090419111827NIK', 0, 560, 510, NULL, '', '2019-04-29 04:04:43', 77),
(4, 1, 0, 0, 48, '060419132221QYG', 0, 560, 170, NULL, '', '2019-04-29 04:04:43', 77),
(5, 2, NULL, 0, 443, '190326B03000001', 0, 550, 505, 'B0001', '', '2019-04-29 05:04:40', 84),
(6, 2, NULL, 0, 443, '190326B03000002', 0, 552, 506, 'B0001', '', '2019-04-29 05:04:40', 84),
(9, 4, 0, 0, 443, '190326B03000001', 0, 550, 505, 'B0001', '', '2019-04-30 09:04:32', 77),
(10, 4, 0, 0, 443, '190326B03000002', 0, 552, 506, 'B0001', '', '2019-04-30 09:04:32', 77),
(11, 5, 0, 0, 62, '150419191219YVB', 0, 1100, 1013, NULL, '', '2019-04-30 12:04:38', 78),
(12, 6, 5, 0, 301, '190327M04000008', 0, 560, 509.6, 'M0008', '', '2019-04-30 12:04:59', 84),
(13, 6, 5, 0, 301, '190327M04000022', 0, 555, 510.4, 'M0022', '', '2019-04-30 12:04:59', 84),
(14, 6, 6, 0, 372, '190326L09000005', 0, 560, 496.8, 'L0005', '', '2019-04-30 12:04:59', 84),
(15, 6, 6, 0, 372, '190326L09000014', 0, 562, 504.2, 'L0014', '', '2019-04-30 12:04:59', 84),
(16, 6, 6, 0, 372, '190326L09000017', 0, 555, 496.5, 'L0017', '', '2019-04-30 12:04:59', 84),
(17, 7, 0, 0, 301, '190327M04000008', 0, 560, 509.6, 'M0008', '', '2019-04-30 12:04:17', 78),
(18, 7, 0, 0, 301, '190327M04000022', 0, 555, 510.4, 'M0022', '', '2019-04-30 12:04:17', 78),
(19, 7, 0, 0, 372, '190326L09000005', 0, 560, 496.8, 'L0005', '', '2019-04-30 12:04:17', 78),
(20, 7, 0, 0, 372, '190326L09000014', 0, 562, 504.2, 'L0014', '', '2019-04-30 12:04:17', 78),
(21, 7, 0, 0, 372, '190326L09000017', 0, 555, 496.5, 'L0017', '', '2019-04-30 12:04:17', 78);

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
-- Indexes for table `r_t_bpb`
--
ALTER TABLE `r_t_bpb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_t_bpb_detail`
--
ALTER TABLE `r_t_bpb_detail`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `r_ttr`
--
ALTER TABLE `r_ttr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_ttr_detail`
--
ALTER TABLE `r_ttr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `r_t_bpb`
--
ALTER TABLE `r_t_bpb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `r_t_bpb_detail`
--
ALTER TABLE `r_t_bpb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `r_t_inv_jasa`
--
ALTER TABLE `r_t_inv_jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `r_t_inv_jasa_detail`
--
ALTER TABLE `r_t_inv_jasa_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_t_so_detail`
--
ALTER TABLE `r_t_so_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `r_t_surat_jalan`
--
ALTER TABLE `r_t_surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `r_t_surat_jalan_detail`
--
ALTER TABLE `r_t_surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
