-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2019 at 04:20 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

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

-- --------------------------------------------------------

--
-- Table structure for table `r_dtr_detail`
--

CREATE TABLE `r_dtr_detail` (
  `id` int(11) NOT NULL,
  `r_dtr_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `bruto` decimal(14,2) DEFAULT NULL,
  `berat_pallete` decimal(14,2) DEFAULT NULL,
  `netto` decimal(14,2) DEFAULT NULL,
  `no_pallete` varchar(50) DEFAULT NULL,
  `line_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `r_ttr_detail`
--

CREATE TABLE `r_ttr_detail` (
  `id` int(11) NOT NULL,
  `r_ttr_id` int(11) NOT NULL,
  `r_dtr_detail_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `bruto` decimal(14,2) DEFAULT NULL,
  `netto` decimal(14,2) DEFAULT NULL,
  `line_remarks` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_t_bpb`
--

CREATE TABLE `r_t_bpb` (
  `id` int(11) NOT NULL,
  `no_bpb` varchar(25) NOT NULL,
  `r_invoice_id` int(11) DEFAULT 0,
  `r_so_id` int(11) DEFAULT 0,
  `r_po_id` int(11) DEFAULT 0,
  `r_sj_id` int(11) DEFAULT 0,
  `r_inv_jasa_id` int(11) DEFAULT 0,
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
  `remarks` text DEFAULT NULL,
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
(1, '0002/BPB-BB/IMI/06/19', 2, 0, 1, 1, 0, 0, 0, '2019-06-17', 'RONGSOK', 63, NULL, 'BPB RONGSOK', 0, '', '', '', 3, '2019-06-22 04:06:57', 79, '2019-06-22 04:06:44', 79),
(2, '0049/BPB-BB/SCN/06/19', 3, 0, 3, 2, 0, 0, 0, '2019-06-17', 'RONGSOK', 134, NULL, 'BPB RONGSOK', 0, '', '', '', 5, '2019-06-22 04:06:33', 81, '2019-06-22 04:06:37', 81);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_bpb_bak1`
--

CREATE TABLE `r_t_bpb_bak1` (
  `id` int(11) NOT NULL DEFAULT 0,
  `no_bpb` varchar(25) NOT NULL,
  `r_invoice_id` int(11) DEFAULT 0,
  `r_so_id` int(11) DEFAULT 0,
  `r_po_id` int(11) DEFAULT 0,
  `r_sj_id` int(11) DEFAULT 0,
  `r_inv_jasa_id` int(11) DEFAULT 0,
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
  `remarks` text DEFAULT NULL,
  `reff_cv` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_t_bpb_detail`
--

CREATE TABLE `r_t_bpb_detail` (
  `id` int(11) NOT NULL,
  `bpb_resmi_id` int(11) NOT NULL,
  `sj_resmi_id` int(11) NOT NULL,
  `so_detail_id` int(11) DEFAULT 0,
  `po_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `no_packing` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` decimal(14,2) NOT NULL,
  `netto` decimal(14,2) NOT NULL,
  `nomor_bobbin` varchar(20) DEFAULT NULL,
  `line_remarks` text DEFAULT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_bpb_detail`
--

INSERT INTO `r_t_bpb_detail` (`id`, `bpb_resmi_id`, `sj_resmi_id`, `so_detail_id`, `po_detail_id`, `jenis_barang_id`, `no_packing`, `qty`, `bruto`, `netto`, `nomor_bobbin`, `line_remarks`, `modified_at`, `modified_by`) VALUES
(1, 1, 0, 0, 0, 64, '1054', 0, '915.00', '915.00', NULL, '', '2019-06-22 04:06:19', 79),
(2, 1, 0, 0, 0, 64, '766', 0, '211.00', '211.00', NULL, '', '2019-06-22 04:06:19', 79),
(3, 2, 0, 0, 0, 64, '766', 0, '1065.00', '1065.00', NULL, '', '2019-06-22 04:06:41', 81);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_gudang_fg`
--

CREATE TABLE `r_t_gudang_fg` (
  `id` int(11) NOT NULL,
  `f_invoice_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `bruto` decimal(14,2) NOT NULL,
  `netto` decimal(14,2) NOT NULL,
  `berat_bobbin` decimal(14,2) DEFAULT NULL,
  `no_packing` varchar(50) DEFAULT NULL,
  `bobbin_id` int(11) DEFAULT NULL,
  `nomor_bobbin` varchar(10) DEFAULT NULL,
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
(1, 1, 575, '380.70', '332.50', '48.20', '190529L17300636', 2002, 'L0636', '2019-06-22 00:00:00', 80, NULL, NULL, '2019-05-29', NULL),
(2, 1, 575, '380.60', '332.30', '48.30', '190528L17300909', 2005, 'L0909', '2019-06-22 00:00:00', 80, NULL, NULL, '2019-05-28', NULL),
(3, 1, 575, '382.30', '332.70', '49.60', '190529L17300520', 2020, 'L0520', '2019-06-22 00:00:00', 80, NULL, NULL, '2019-05-29', NULL),
(4, 1, 575, '381.90', '332.40', '49.50', '190529L17300912', 2022, 'L0912', '2019-06-22 00:00:00', 80, NULL, NULL, '2019-05-29', NULL),
(5, 1, 575, '381.20', '332.60', '48.60', '190528L17301220', 2024, 'L1220', '2019-06-22 00:00:00', 80, NULL, NULL, '2019-05-28', NULL),
(6, 1, 575, '382.70', '332.70', '50.00', '190528L17300634', 2025, 'L0634', '2019-06-22 00:00:00', 80, NULL, NULL, '2019-05-28', NULL),
(7, 3, 458, '21.09', '20.01', '1.08', '190517A01804476', NULL, 'A4476', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-17', NULL),
(8, 3, 458, '20.84', '19.76', '1.08', '190517A01804477', NULL, 'A4477', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-17', NULL),
(9, 3, 458, '21.55', '20.47', '1.08', '190517A01804478', NULL, 'A4478', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-17', NULL),
(10, 3, 458, '21.05', '19.97', '1.08', '190517A01804486', NULL, 'A4486', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-17', NULL),
(11, 3, 458, '22.64', '21.56', '1.08', '190521A01804593', NULL, 'A4593', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-21', NULL),
(12, 3, 458, '22.51', '21.43', '1.08', '190521A01804594', NULL, 'A4594', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-21', NULL),
(13, 3, 458, '21.99', '20.91', '1.08', '190521A01804595', NULL, 'A4595', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-21', NULL),
(14, 3, 458, '21.22', '20.14', '1.08', '190517A01804487', NULL, 'A4487', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-17', NULL),
(15, 3, 458, '20.93', '19.85', '1.08', '190517A01804488', NULL, 'A4488', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-17', NULL),
(16, 3, 458, '21.36', '20.28', '1.08', '190517A01804489', NULL, 'A4489', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-17', NULL),
(17, 3, 458, '21.20', '20.12', '1.08', '190517A01804490', NULL, 'A4490', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-17', NULL),
(18, 3, 458, '20.64', '19.56', '1.08', '190520A01804562', NULL, 'A4562', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-20', NULL),
(19, 3, 458, '21.41', '20.33', '1.08', '190515A01804422', NULL, 'A4422', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-15', NULL),
(20, 3, 458, '21.31', '20.23', '1.08', '190515A01804421', NULL, 'A4421', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-15', NULL),
(21, 3, 458, '21.31', '20.23', '1.08', '190513A01804319', NULL, 'A4319', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-13', NULL),
(22, 3, 458, '21.16', '20.08', '1.08', '190510A01804269', NULL, 'A4269', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-10', NULL),
(23, 3, 458, '21.84', '20.76', '1.08', '190510A01804270', NULL, 'A4270', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-10', NULL),
(24, 3, 458, '21.08', '20.00', '1.08', '190510A01804271', NULL, 'A4271', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-10', NULL),
(25, 3, 458, '20.53', '19.45', '1.08', '190520A01804563', NULL, 'A4563', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-20', NULL),
(26, 3, 458, '20.52', '19.44', '1.08', '190514A01804366', NULL, 'A4366', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-14', NULL),
(27, 3, 458, '20.45', '19.37', '1.08', '190514A01804368', NULL, 'A4368', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-14', NULL),
(28, 3, 458, '20.95', '19.87', '1.08', '190513A01804320', NULL, 'A4320', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-13', NULL),
(29, 3, 458, '20.11', '19.03', '1.08', '190509A01804224', NULL, 'A4224', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-09', NULL),
(30, 3, 458, '20.12', '19.04', '1.08', '190509A01804225', NULL, 'A4225', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-09', NULL),
(31, 3, 458, '19.82', '18.74', '1.08', '190509A01804226', NULL, 'A4226', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-09', NULL),
(32, 3, 458, '21.03', '19.95', '1.08', '190514A01804365', NULL, 'A4365', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-14', NULL),
(33, 3, 458, '20.68', '19.60', '1.08', '190514A01804367', NULL, 'A4367', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-14', NULL),
(34, 3, 458, '20.56', '19.48', '1.08', '190514A01804369', NULL, 'A4369', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-14', NULL),
(35, 3, 458, '20.85', '19.77', '1.08', '190508A01804185', NULL, 'A4185', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-08', NULL),
(36, 3, 458, '20.34', '19.26', '1.08', '190506A01804093', NULL, 'A4093', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-06', NULL),
(37, 3, 458, '20.98', '19.90', '1.08', '190506A01804094', NULL, 'A4094', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-06', NULL),
(38, 3, 458, '20.66', '19.58', '1.08', '190506A01804095', NULL, 'A4095', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-06', NULL),
(39, 3, 458, '21.75', '20.67', '1.08', '190527A01804758', NULL, 'A4758', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-27', NULL),
(40, 3, 458, '20.96', '19.88', '1.08', '190524A01804719', NULL, 'A4719', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-24', NULL),
(41, 3, 458, '21.58', '20.50', '1.08', '190523A01804689', NULL, 'A4689', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-23', NULL),
(42, 3, 458, '22.92', '21.84', '1.08', '190522A01804644', NULL, 'A4644', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-22', NULL),
(43, 3, 458, '22.05', '20.97', '1.08', '190522A01804645', NULL, 'A4645', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-22', NULL),
(44, 3, 458, '21.98', '20.90', '1.08', '190527A01804756', NULL, 'A4756', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-27', NULL),
(45, 3, 458, '22.37', '21.29', '1.08', '190527A01804757', NULL, 'A4757', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-27', NULL),
(46, 3, 458, '20.77', '19.69', '1.08', '190524A01804720', NULL, 'A4720', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-24', NULL),
(47, 3, 458, '21.59', '20.51', '1.08', '190523A01804687', NULL, 'A4687', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-23', NULL),
(48, 3, 458, '21.52', '20.44', '1.08', '190523A01804688', NULL, 'A4688', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-23', NULL),
(49, 3, 458, '24.74', '23.66', '1.08', '190529A01804824', NULL, 'A4824', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-29', NULL),
(50, 3, 458, '23.97', '22.89', '1.08', '190529A01804823', NULL, 'A4823', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-29', NULL),
(51, 3, 458, '24.10', '23.02', '1.08', '190529A01804822', NULL, 'A4822', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-29', NULL),
(52, 3, 458, '23.16', '22.08', '1.08', '190528A01804796', NULL, 'A4796', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-28', NULL),
(53, 3, 458, '23.04', '21.96', '1.08', '190528A01804795', NULL, 'A4795', '2019-06-22 00:00:00', 81, NULL, NULL, '2019-05-28', NULL);

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
  `remarks` text DEFAULT NULL,
  `reff_cv` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_invoice`
--

INSERT INTO `r_t_invoice` (`id`, `invoice_id`, `no_invoice_resmi`, `bpb_id`, `r_po_id`, `tanggal`, `jumlah`, `persentase`, `total`, `remarks`, `reff_cv`, `created_by`, `created_at`) VALUES
(1, 1677, '0050/PKM/VI/19', 0, 0, '2019-06-22', 1995, 12, 2267, '', 4, 80, '2019-06-22 02:06:22'),
(2, 1687, '0050/IMI/VI/19', 1, 1, '2019-06-22', 1013, 10, 1126, '', 3, 79, '2019-06-22 02:06:03'),
(3, 1689, '0049/SCN/VI/19', 2, 3, '2019-06-22', 958, 10, 1065, '', 5, 81, '2019-06-22 04:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_invoice_detail`
--

CREATE TABLE `r_t_invoice_detail` (
  `id` int(11) NOT NULL,
  `invoice_resmi_id` int(11) NOT NULL,
  `dtr_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `bruto` decimal(14,2) NOT NULL,
  `netto` decimal(14,2) NOT NULL,
  `berat_pallete` decimal(14,2) NOT NULL,
  `line_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_invoice_detail`
--

INSERT INTO `r_t_invoice_detail` (`id`, `invoice_resmi_id`, `dtr_detail_id`, `jenis_barang_id`, `bruto`, `netto`, `berat_pallete`, `line_remarks`) VALUES
(1, 2, 1, 64, '915.00', '915.00', '0.00', NULL),
(2, 2, 2, 64, '1324.00', '211.00', '0.00', ''),
(5, 3, 2, 64, '1324.00', '1065.00', '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_inv_jasa`
--

CREATE TABLE `r_t_inv_jasa` (
  `id` int(11) NOT NULL,
  `no_invoice_jasa` varchar(50) NOT NULL,
  `nilai_invoice` double DEFAULT 0,
  `term_of_payment` varchar(20) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `sjr_id` int(11) NOT NULL,
  `r_t_so_id` int(11) DEFAULT 0,
  `r_t_po_id` int(11) DEFAULT 0,
  `customer_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL DEFAULT 0,
  `jenis_invoice` varchar(50) DEFAULT NULL,
  `flag_sjr` tinyint(4) NOT NULL DEFAULT 0,
  `tanggal` date NOT NULL,
  `remarks` text DEFAULT NULL,
  `reff_cv` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `bruto` decimal(14,2) NOT NULL,
  `netto` decimal(14,2) NOT NULL,
  `amount` decimal(14,2) DEFAULT NULL,
  `total_amount` decimal(14,2) NOT NULL,
  `line_remarks` text DEFAULT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `flag_bpb` int(1) NOT NULL DEFAULT 0,
  `flag_po_cv` int(1) NOT NULL,
  `flag_so` int(1) NOT NULL,
  `flag_sj` int(1) NOT NULL,
  `flag_dp` int(1) NOT NULL,
  `flag_pelunasan` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `remarks` text DEFAULT NULL,
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
(1, '0050/VI/2019', 1687, 63, 3, '2019-06-17', '30 HARI', 'PO CUSTOMER KE CV', 1, 2, 0, 0, 0, 0, 0, '', 3, '2019-06-22 03:06:48', 79, '2019-06-22 04:06:38', 79),
(2, '0050/PO/IMI/06/19', 1687, 0, 3, '2019-06-17', '30 HARI', 'PO CV KE KMP', 0, 0, 0, 1, 0, 0, 0, '', 3, '2019-06-22 04:06:11', 79, '2019-06-22 04:06:14', 79),
(3, '0049/VI/2019', 1689, 134, 0, '2019-06-17', '30 HARI', 'PO CUSTOMER KE CV', 2, 4, 0, 0, 0, 0, 0, '', 5, '2019-06-22 04:06:18', 81, '2019-06-22 04:06:41', 81),
(4, '0049/PO/SCN/06/19', 1689, 0, 5, '2019-06-17', '30 HARI', 'PO CV KE KMP', 0, 0, 0, 2, 0, 0, 0, '', 5, '2019-06-22 04:06:10', 81, '2019-06-22 04:06:24', 81);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_po_bak1`
--

CREATE TABLE `r_t_po_bak1` (
  `id` int(11) NOT NULL DEFAULT 0,
  `no_po` varchar(25) NOT NULL,
  `f_invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `term_of_payment` varchar(25) NOT NULL,
  `jenis_po` varchar(25) NOT NULL,
  `flag_bpb` int(1) NOT NULL DEFAULT 0,
  `flag_po_cv` int(1) NOT NULL,
  `flag_so` int(1) NOT NULL,
  `flag_sj` int(1) NOT NULL,
  `flag_dp` int(1) NOT NULL,
  `flag_pelunasan` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `remarks` text DEFAULT NULL,
  `reff_cv` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_t_po_detail`
--

CREATE TABLE `r_t_po_detail` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` decimal(14,2) NOT NULL,
  `netto` decimal(14,2) NOT NULL,
  `amount` decimal(14,2) NOT NULL,
  `total_amount` decimal(14,2) NOT NULL,
  `line_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_po_detail`
--

INSERT INTO `r_t_po_detail` (`id`, `po_id`, `jenis_barang_id`, `qty`, `bruto`, `netto`, `amount`, `total_amount`, `line_remarks`) VALUES
(1, 1, 215, 3, '0.00', '1013.10', '13770.00', '13950387.00', ''),
(2, 2, 215, 3, '0.00', '1013.10', '8500.00', '8611350.00', ''),
(3, 3, 458, 47, '0.00', '958.47', '18480.00', '177125256.00', ''),
(4, 4, 458, 47, '0.00', '958.47', '14500.00', '13897815.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_po_detail_bak1`
--

CREATE TABLE `r_t_po_detail_bak1` (
  `id` int(11) NOT NULL DEFAULT 0,
  `po_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `line_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_t_so`
--

CREATE TABLE `r_t_so` (
  `id` int(11) NOT NULL,
  `no_so` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `term_of_payment` varchar(15) NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `sjr_id` int(11) NOT NULL,
  `tgl_po` date NOT NULL,
  `jenis_so` varchar(20) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `remarks` text DEFAULT NULL,
  `reff_cv` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_so`
--

INSERT INTO `r_t_so` (`id`, `no_so`, `tanggal`, `term_of_payment`, `marketing_id`, `cv_id`, `customer_id`, `po_id`, `sjr_id`, `tgl_po`, `jenis_so`, `jenis_barang`, `remarks`, `reff_cv`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, '0050/SO/IMI/06/19', '2019-06-17', '', 79, 0, 63, 1, 0, '2019-06-17', 'SO CV', 'FG', '', 3, '2019-06-22 03:06:48', 79, '0000-00-00 00:00:00', 0),
(2, '0049/SO/SCN/06/19', '2019-06-17', '', 81, 0, 134, 3, 0, '2019-06-17', 'SO CV', 'FG', '', 5, '2019-06-22 04:06:18', 81, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_so_bak1`
--

CREATE TABLE `r_t_so_bak1` (
  `id` int(11) NOT NULL DEFAULT 0,
  `no_so` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `sjr_id` int(11) NOT NULL,
  `tgl_po` date NOT NULL,
  `jenis_so` varchar(20) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `remarks` text DEFAULT NULL,
  `reff_cv` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `netto` decimal(14,2) NOT NULL,
  `amount` decimal(14,2) NOT NULL,
  `total_amount` decimal(14,2) NOT NULL,
  `line_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_so_detail`
--

INSERT INTO `r_t_so_detail` (`id`, `so_id`, `po_detail_id`, `jenis_barang_id`, `qty`, `netto`, `amount`, `total_amount`, `line_remarks`) VALUES
(1, 1, 1, 215, 3, '1013.10', '102000.00', '103336200.00', ''),
(2, 2, 3, 458, 47, '958.47', '18480.00', '177125256.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_so_detail_bak1`
--

CREATE TABLE `r_t_so_detail_bak1` (
  `id` int(11) NOT NULL DEFAULT 0,
  `so_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `netto` float NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `line_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_t_surat_jalan`
--

CREATE TABLE `r_t_surat_jalan` (
  `id` int(11) NOT NULL,
  `no_sj_resmi` varchar(25) NOT NULL,
  `r_invoice_id` int(11) DEFAULT 0,
  `r_so_id` int(11) DEFAULT 0,
  `r_po_id` int(11) DEFAULT 0,
  `r_sj_id` int(11) DEFAULT 0,
  `r_bpb_id` int(11) NOT NULL DEFAULT 0,
  `r_inv_jasa_id` int(11) DEFAULT 0,
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
  `remarks` text DEFAULT NULL,
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
(1, '0050/SJ-BB/IMI/06/19', 2, 0, 2, 0, 1, 0, 0, 0, '2019-06-17', 'RONGSOK', NULL, 3, 'SURAT JALAN CV KE KMP', 0, '', '', '', 3, '2019-06-22 04:06:40', 79, '2019-06-22 04:06:44', 79),
(2, '0049/SJ-BB/SCN/06/19', 3, 0, 4, 0, 2, 0, 0, 0, '2019-06-17', 'RONGSOK', NULL, 5, 'SURAT JALAN CV KE KMP', 0, '', '', '', 5, '2019-06-22 04:06:32', 81, '2019-06-22 04:06:37', 81);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_surat_jalan_detail`
--

CREATE TABLE `r_t_surat_jalan_detail` (
  `id` int(11) NOT NULL,
  `sj_resmi_id` int(11) NOT NULL,
  `so_detail_id` int(11) DEFAULT 0,
  `po_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `no_packing` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `nomor_bobbin` varchar(20) DEFAULT NULL,
  `line_remarks` text DEFAULT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_surat_jalan_detail`
--

INSERT INTO `r_t_surat_jalan_detail` (`id`, `sj_resmi_id`, `so_detail_id`, `po_detail_id`, `jenis_barang_id`, `no_packing`, `qty`, `bruto`, `netto`, `nomor_bobbin`, `line_remarks`, `modified_at`, `modified_by`) VALUES
(1, 1, 0, 0, 64, '1054', 0, 915, 915, NULL, '', '2019-06-22 04:06:44', 79),
(2, 1, 0, 0, 64, '766', 0, 211, 211, NULL, '', '2019-06-22 04:06:44', 79),
(3, 2, 0, 0, 64, '766', 0, 1065, 1065, NULL, '', '2019-06-22 04:06:37', 81);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_dtr_detail`
--
ALTER TABLE `r_dtr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_ttr`
--
ALTER TABLE `r_ttr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_ttr_detail`
--
ALTER TABLE `r_ttr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_t_bpb`
--
ALTER TABLE `r_t_bpb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_t_bpb_detail`
--
ALTER TABLE `r_t_bpb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_t_gudang_fg`
--
ALTER TABLE `r_t_gudang_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `r_t_invoice`
--
ALTER TABLE `r_t_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `r_t_invoice_detail`
--
ALTER TABLE `r_t_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `r_t_inv_jasa`
--
ALTER TABLE `r_t_inv_jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_t_inv_jasa_detail`
--
ALTER TABLE `r_t_inv_jasa_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_t_po`
--
ALTER TABLE `r_t_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_t_po_detail`
--
ALTER TABLE `r_t_po_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_t_so`
--
ALTER TABLE `r_t_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_t_so_detail`
--
ALTER TABLE `r_t_so_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_t_surat_jalan`
--
ALTER TABLE `r_t_surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_t_surat_jalan_detail`
--
ALTER TABLE `r_t_surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
