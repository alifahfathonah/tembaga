-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 04:49 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
-- Table structure for table `ampas`
--

CREATE TABLE `ampas` (
  `id` int(11) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `uom` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ampas`
--

INSERT INTO `ampas` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'AMPAS 1', 'KG', '', '', '2018-02-19 08:02:19', 1, '2018-02-19 08:02:19', 1),
(2, 'AMPAS 2', 'KG', '', '', '2018-02-19 08:02:28', 1, '2018-02-19 08:02:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `apolo`
--

CREATE TABLE `apolo` (
  `id` int(11) NOT NULL,
  `tipe_apolo` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apolo`
--

INSERT INTO `apolo` (`id`, `tipe_apolo`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'APOLO 3 KE 1', '0000-00-00 00:00:00', 0, '2018-11-29 07:11:58', 1),
(2, 'APOLO 3 KE 2', '2018-11-29 07:11:18', 1, '2018-11-29 07:11:18', 1),
(3, 'APOLO 4 KE 1', '2018-11-29 07:11:28', 1, '2018-11-29 07:11:28', 1),
(4, 'APOLO 4 KE 2', '2018-11-29 07:11:39', 1, '2018-11-29 07:11:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_proses_resmi`
--

CREATE TABLE `app_proses_resmi` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_proses_resmi`
--

INSERT INTO `app_proses_resmi` (`id`, `kode_barang`, `nama_barang`, `qty`, `harga_satuan`, `total_harga`, `ppn`, `created`) VALUES
(2, 'BRG.0001', 'Kawat', 12, 1000, 10000, 10, '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `app_resmi_barcode`
--

CREATE TABLE `app_resmi_barcode` (
  `id` int(11) NOT NULL,
  `id_app_voucher` varchar(100) NOT NULL,
  `id_app_resmi` varchar(100) NOT NULL,
  `kode_barcode` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_resmi_barcode`
--

INSERT INTO `app_resmi_barcode` (`id`, `id_app_voucher`, `id_app_resmi`, `kode_barcode`, `date`, `description`) VALUES
(3, 'voc.0001', 'BRG.0001', 'BC.00011', '2018-06-28', 'Data Barcode');

-- --------------------------------------------------------

--
-- Table structure for table `app_resmi_voucher`
--

CREATE TABLE `app_resmi_voucher` (
  `id` int(11) NOT NULL,
  `kode_voucher` varchar(100) NOT NULL,
  `id_app_resmi` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` date NOT NULL,
  `request` enum('Y','N') DEFAULT 'N',
  `flag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_resmi_voucher`
--

INSERT INTO `app_resmi_voucher` (`id`, `kode_voucher`, `id_app_resmi`, `name`, `amount`, `date`, `request`, `flag`) VALUES
(2, 'voc.0001', 'BRG.0001', 'KAWAT', 50, '2018-06-28', 'Y', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `kode_bank` varchar(10) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `kode_bank`, `nama_bank`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'BNI', 'BANK NEGERA INDONESIA 46', '2018-01-24 12:01:15', 1, '2018-01-24 12:01:15', 1),
(2, 'BRI', 'BANK RAKYAT INDONESIA', '2018-01-24 12:01:35', 1, '2018-01-24 12:01:35', 1),
(3, 'BCA', 'BANK CENTRAL ASIA', '2018-01-24 12:01:52', 1, '2018-01-24 12:01:52', 1),
(4, 'MANDIRI', 'BANK MANDIRI', '2018-01-24 12:01:12', 1, '2018-01-24 12:01:12', 1),
(5, 'NIAGA', 'BANK NIAGA', '2018-01-24 12:01:23', 1, '2018-01-24 12:01:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `beli_sparepart`
--

CREATE TABLE `beli_sparepart` (
  `id` int(11) NOT NULL,
  `no_pengajuan` varchar(50) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jenis_kebutuhan` tinyint(1) NOT NULL,
  `tgl_sparepart_dibutuhkan` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `approved` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `rejected` datetime NOT NULL,
  `rejected_by` int(11) NOT NULL,
  `reject_remarks` text NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli_sparepart`
--

INSERT INTO `beli_sparepart` (`id`, `no_pengajuan`, `tgl_pengajuan`, `jenis_kebutuhan`, `tgl_sparepart_dibutuhkan`, `status`, `created`, `created_by`, `approved`, `approved_by`, `remarks`, `rejected`, `rejected_by`, `reject_remarks`, `modified`, `modified_by`) VALUES
(1, 'PPS.25012018.0002', '2018-01-25', 1, NULL, 1, '2018-01-25 10:01:10', 1, '2018-01-26 06:01:28', 1, 'ALAT SUDAH RUSAK, PERLU DIPERBAIKI SEGERA', '2018-01-26 07:01:22', 1, 'ALAT LAMA MASIH BISA DIPERBAIKI', '2018-04-16 08:04:36', 1),
(2, 'PPS.16042018.0001', '2018-04-16', 1, NULL, 1, '2018-04-16 08:04:16', 1, '2018-04-16 09:04:44', 1, 'BUTUH SEGERA DIGANTI', '2018-04-16 08:04:24', 1, 'BAN SATU AJA, YG SATU MASIH BISA DIPAKE', '2018-04-16 08:04:23', 1),
(3, 'PPS.27042018.0001', '2018-04-27', 1, NULL, 1, '2018-04-27 10:04:32', 1, '2018-10-08 05:10:57', 1, '', '0000-00-00 00:00:00', 0, '', '2018-10-05 03:10:01', 1),
(4, 'PPS.05102018.0001', '2018-10-05', 1, NULL, 0, '2018-10-05 03:10:33', 1, '0000-00-00 00:00:00', 0, 'LKHL', '0000-00-00 00:00:00', 0, '', '2018-10-05 03:10:33', 1),
(5, 'PPS.08102018.0001', '2018-10-08', 1, NULL, 1, '2018-10-08 05:10:35', 1, '2018-11-28 01:11:51', 1, '', '0000-00-00 00:00:00', 0, '', '2018-10-08 05:10:43', 1),
(7, 'PPS.05112018.0001', '2018-11-05', 0, '2018-11-08', 1, '2018-11-05 02:11:25', 1, '2018-11-05 02:11:13', 1, '', '0000-00-00 00:00:00', 0, '', '2018-11-05 02:11:49', 1),
(8, 'PPS.05112018.0002', '2018-11-05', 1, NULL, 1, '2018-11-05 04:11:13', 1, '2018-11-05 04:11:57', 1, 'BUTUH BESOK', '0000-00-00 00:00:00', 0, '', '2018-11-05 04:11:27', 1),
(9, 'PPS.06112018.0001', '2018-11-06', 1, NULL, 1, '2018-11-06 03:11:47', 1, '2018-11-06 03:11:06', 1, 'BUTUH BANYAK', '0000-00-00 00:00:00', 0, '', '2018-11-28 02:11:23', 1),
(10, 'PPS.22112018.0001', '2018-11-22', 0, '2018-11-21', 1, '2018-11-22 09:11:36', 1, '2018-11-28 01:11:35', 1, '', '0000-00-00 00:00:00', 0, '', '2018-11-28 01:11:20', 1),
(11, 'PPS.22112018.0002', '2018-11-22', 0, '2018-11-27', 1, '2018-11-22 10:11:38', 1, '2018-11-22 10:11:59', 1, 'MINTA SPAREPART', '0000-00-00 00:00:00', 0, '', '2018-11-22 10:11:53', 1),
(12, 'PPS.28112018.0001', '2018-11-28', 1, NULL, 1, '2018-11-28 02:11:43', 1, '2018-11-29 03:11:47', 1, '', '0000-00-00 00:00:00', 0, '', '2018-11-28 02:11:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `beli_sparepart_detail`
--

CREATE TABLE `beli_sparepart_detail` (
  `id` int(11) NOT NULL,
  `beli_sparepart_id` int(11) NOT NULL,
  `sparepart_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `flag_po` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli_sparepart_detail`
--

INSERT INTO `beli_sparepart_detail` (`id`, `beli_sparepart_id`, `sparepart_id`, `qty`, `flag_po`) VALUES
(2, 1, 1, 3, 1),
(3, 1, 2, 2, 1),
(4, 2, 2, 3, 1),
(5, 2, 1, 1, 1),
(6, 3, 2, 1, 1),
(7, 3, 1, 1, 1),
(8, 4, 2, 2, 0),
(9, 4, 1, 3, 0),
(10, 5, 2, 2, 0),
(11, 7, 2, 20, 1),
(12, 7, 1, 50, 1),
(13, 8, 2, 15, 1),
(14, 8, 1, 20, 1),
(15, 9, 2, 20, 1),
(16, 9, 1, 40, 1),
(18, 10, 16, 7, 1),
(20, 11, 15, 10, 1),
(21, 11, 14, 5, 1),
(22, 11, 3, 25, 1),
(23, 11, 4, 5, 1),
(24, 11, 5, 7, 1),
(25, 11, 8, 2, 1),
(26, 12, 13, 6, 1),
(27, 12, 14, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `id` int(11) NOT NULL,
  `nama_cost` varchar(100) NOT NULL,
  `group_cost_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `nama_cost`, `group_cost_id`, `remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'AIR MINUM AQUA', 1, '', '2018-02-25 06:02:22', 1, '2018-02-25 06:02:22', 1),
(2, 'AIR MINUM AIRA', 1, '', '2018-02-25 06:02:42', 1, '2018-02-25 06:02:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `id` int(11) NOT NULL,
  `no_dtr` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `po_id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `skb_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `approved` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  `rejected` datetime NOT NULL,
  `rejected_by` int(11) NOT NULL,
  `reject_remarks` text NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `type_retur` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`id`, `no_dtr`, `tanggal`, `po_id`, `so_id`, `skb_id`, `supplier_id`, `jenis_barang`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `reject_remarks`, `status_pembayaran`, `type_retur`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(22, 'DTR.05102018.0005', '2018-10-05', 14, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-08 11:10:05', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-05 06:10:50', 1, '2018-10-05 06:10:50', 1),
(23, 'DTR.05102018.0006', '2018-10-05', 14, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-08 11:10:09', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-05 06:10:40', 1, '2018-10-05 06:10:40', 1),
(24, 'DTR.08102018.0001', '2018-10-08', 15, 0, 0, 0, 'RONGSOK', '', 9, '0000-00-00 00:00:00', 0, '2018-10-08 12:10:29', 1, 'TIDAK ADA NETTO', 0, 0, '2018-10-08 12:10:05', 1, '2018-10-08 12:10:05', 1),
(25, 'DTR.08102018.0002', '2018-10-08', 15, 0, 0, 0, 'RONGSOK', '', 9, '0000-00-00 00:00:00', 0, '2018-10-08 01:10:59', 1, 'GAGAL', 0, 0, '2018-10-08 01:10:35', 1, '2018-10-08 01:10:35', 1),
(26, 'DTR.08102018.0003', '2018-10-08', 15, 0, 0, 0, 'RONGSOK', '', 9, '2018-10-08 03:10:26', 1, '2018-10-08 15:28:00', 1, 'KOSONG NETTO', 0, 0, '2018-10-08 02:10:07', 1, '2018-10-08 02:10:07', 1),
(27, 'DTR.08102018.0004', '2018-10-08', 15, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-08 03:10:42', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-08 03:10:29', 1, '2018-10-08 03:10:29', 1),
(28, 'DTR.08102018.0005', '2018-10-08', 14, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-08 03:10:57', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-08 03:10:31', 1, '2018-10-08 03:10:31', 1),
(29, 'DTR.10102018.0001', '2018-10-10', 19, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-10 02:10:38', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-10 02:10:57', 1, '2018-10-10 02:10:57', 1),
(32, 'DTR.23102018.0002', '2018-10-23', 0, 0, 0, 0, 'RONGSOK', 'DTR SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(33, 'DTR.31102018.0001', '2018-10-31', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI INGOT', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '2018-10-31 03:10:39', 1),
(34, 'DTR.31102018.0002', '2018-10-31', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '2018-10-31 04:10:57', 1),
(39, 'DTR.31102018.0005', '2018-10-31', 20, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-31 04:10:10', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-31 03:10:12', 1, '2018-10-31 03:10:12', 1),
(46, 'DTR.01112018.0001', '2018-11-01', 20, 0, 0, 0, 'RONGSOK', '', 1, '2018-11-22 09:11:36', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-01 03:11:00', 1, '2018-11-01 03:11:00', 1),
(47, 'DTR.01112018.0002', '2018-11-01', 21, 0, 0, 0, 'RONGSOK', '', 1, '2018-11-01 03:11:19', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-01 03:11:20', 1, '2018-11-01 03:11:20', 1),
(50, 'DTR.01112018.0003', '2018-11-01', 26, 0, 0, 0, 'RONGSOK', 'COBA TIMBANG', 1, '2018-11-27 03:11:29', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-01 04:11:31', 1, '2018-11-01 04:11:31', 1),
(51, 'DTR.01112018.0004', '2018-11-01', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI INGOT', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(52, 'DTR.13112018.0001', '2018-11-13', 0, 3, 0, 0, 'RONGSOK', '', 1, '2018-11-13 01:11:35', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-13 01:11:18', 1, '2018-11-13 01:11:18', 1),
(53, 'DTR.19112018.0001', '2018-11-19', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(54, 'DTR.19112018.0002', '2018-11-19', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(63, 'DTR.19112018.0008', '2018-11-19', 0, 4, 0, 0, 'RONGSOK', '', 1, '2018-11-21 12:11:24', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-19 05:11:59', 1, '2018-11-19 05:11:59', 1),
(64, 'DTR.19112018.0009', '2018-11-19', 0, 8, 0, 0, 'RONGSOK', '', 1, '2018-11-21 04:11:46', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-19 05:11:15', 1, '2018-11-19 05:11:15', 1),
(65, 'DTR.22112018.0001', '2018-11-22', 26, 0, 0, 0, 'RONGSOK', '', 1, '2018-11-22 09:11:08', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-22 09:11:40', 1, '2018-11-22 09:11:40', 1),
(66, 'DTR.22112018.0002', '2018-11-22', 35, 0, 0, 0, 'RONGSOK', '', 1, '2018-11-22 11:11:13', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-22 11:11:13', 1, '2018-11-22 11:11:13', 1),
(67, 'DTR.22112018.0003', '2018-11-22', 36, 0, 0, 0, 'RONGSOK', '', 1, '2018-11-22 01:11:01', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-22 01:11:07', 1, '2018-11-22 01:11:07', 1),
(68, 'DTR.23112018.0001', '2018-11-23', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI INGOT', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(69, 'DTR.23112018.0002', '2018-11-23', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(70, 'DTR.23112018.0003', '2018-11-23', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI INGOT', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(71, 'DTR.23112018.0004', '2018-11-23', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(72, 'DTR.23112018.0004', '2018-11-23', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(73, 'DTR.27112018.0001', '2018-11-27', 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI INGOT', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '2018-12-03 04:12:50', 1),
(75, 'DTR.201811.0002', '2018-11-30', 16, 0, 0, 2, 'RONGSOK', 'OLD', 1, '2018-11-30 05:11:19', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-30 05:11:46', 1, '2018-11-30 05:11:46', 1),
(76, 'DTR.201811.0003', '2018-11-30', 17, 0, 0, 1, 'RONGSOK', '', 1, '2018-11-30 06:11:57', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-30 06:11:05', 1, '2018-11-30 06:11:05', 1),
(77, 'DTR.201811.0004', '2018-11-30', 27, 0, 0, 2, 'RONGSOK', '', 1, '2018-11-30 07:11:32', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-30 06:11:57', 1, '2018-11-30 06:11:57', 1),
(78, 'DTR.201811.0005', '2018-11-30', 42, 0, 0, 9, 'RONGSOK', '', 1, '2018-11-30 07:11:39', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-30 07:11:18', 1, '2018-11-30 07:11:18', 1),
(79, 'DTR.201811.0006', '2018-11-30', 42, 0, 0, 9, 'RONGSOK', '', 1, '2018-11-30 07:11:43', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-11-30 07:11:45', 1, '2018-11-30 07:11:45', 1),
(80, 'DTR.201812.0001', '2018-12-03', 32, 0, 0, 9, 'RONGSOK', '', 1, '2018-12-03 10:12:51', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-12-03 10:12:40', 1, '2018-12-03 10:12:40', 1),
(81, 'DTR.201812.0002', '2018-12-03', 43, 0, 0, 2, 'RONGSOK', '', 1, '2018-12-03 12:12:19', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-12-03 10:12:19', 1, '2018-12-03 10:12:19', 1),
(82, 'DTR.201812.0003', '2018-12-03', 43, 0, 0, 2, 'RONGSOK', '', 1, '2018-12-03 01:12:27', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-12-03 01:12:52', 1, '2018-12-03 01:12:52', 1),
(83, 'DTR.201812.0004', '2018-12-03', 43, 0, 0, 2, 'RONGSOK', '', 1, '2018-12-03 01:12:12', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-12-03 01:12:06', 1, '2018-12-03 01:12:06', 1),
(84, 'DTR.201812.0005', '2018-12-03', 43, 0, 0, 2, 'RONGSOK', 'LAST', 1, '2018-12-03 01:12:07', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-12-03 01:12:01', 1, '2018-12-03 01:12:01', 1),
(85, 'DTR.201812.0006', '2018-12-04', 44, 0, 0, 4, 'RONGSOK', '', 1, '2018-12-04 02:12:06', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-12-04 02:12:53', 1, '2018-12-04 02:12:53', 1),
(86, 'DTR.201812.0007', '2018-12-04', 0, 15, 0, 0, 'RONGSOK', '', 1, '2018-12-04 05:12:36', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-12-04 05:12:05', 1, '2018-12-04 05:12:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtr_detail`
--

CREATE TABLE `dtr_detail` (
  `id` int(11) NOT NULL,
  `dtr_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `so_detail_id` int(11) NOT NULL,
  `spb_detail_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `ampas_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` int(11) NOT NULL,
  `berat_palette` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `no_pallete` varchar(50) NOT NULL,
  `no_batch` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `flag_taken` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtr_detail`
--

INSERT INTO `dtr_detail` (`id`, `dtr_id`, `po_detail_id`, `so_id`, `so_detail_id`, `spb_detail_id`, `rongsok_id`, `ampas_id`, `qty`, `bruto`, `berat_palette`, `netto`, `line_remarks`, `no_pallete`, `no_batch`, `created`, `created_by`, `modified`, `modified_by`, `flag_taken`) VALUES
(46, 22, 26, 0, 0, 0, 1, 0, 200, 10, 0, 5, '', 'HH123', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(47, 22, 27, 0, 0, 0, 2, 0, 250, 20, 0, 10, '', 'HT123', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(49, 23, 26, 0, 0, 0, 1, 0, 200, 20, 0, 15, '', '17GGHG', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(50, 23, 27, 0, 0, 0, 2, 0, 250, 20, 0, 18, '', '17HJGG', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(51, 24, 28, 0, 0, 0, 1, 0, 175, 0, 0, 0, '', '08101812145RRQ', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(52, 24, 28, 0, 0, 0, 1, 0, 175, 0, 0, 0, '', '081018121438ZND', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(53, 25, 28, 0, 0, 0, 1, 0, 175, 10, 0, 10, '', '08101813422TUO', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(54, 26, 28, 0, 0, 0, 1, 0, 175, 0, 0, 0, '', '08101814242PXB', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(55, 27, 28, 0, 0, 0, 1, 0, 175, 200, 0, 158, 'OKE', '081018152945MRD', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(56, 28, 26, 0, 0, 0, 1, 0, 200, 200, 0, 180, 'SUKSES', '08101815317JXR', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(57, 29, 35, 0, 0, 0, 1, 0, 150, 100, 0, 20, '', '101018141239BPA', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(58, 29, 34, 0, 0, 0, 2, 0, 100, 20, 0, 10, '', '101018141249ICP', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(59, 30, 0, 0, 0, 0, 7, 0, 0, 0, 0, 10, 'SISA PRODUKSI INGOT', '1610181915557B2', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(61, 32, 0, 0, 0, 0, 7, 0, 0, 0, 0, 1, 'SISA PRODUKSI WIP', '231018105523886', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(62, 33, 0, 0, 0, 0, 7, 0, 0, 0, 0, 1, 'SISA PRODUKSI INGOT', '311018105010E11', '', '0000-00-00 00:00:00', 0, '2018-10-31 03:10:39', 1, 0),
(63, 34, 0, 0, 0, 0, 7, 0, 0, 0, 0, 30, 'SISA PRODUKSI WIP', '311018112303999', '', '0000-00-00 00:00:00', 0, '2018-10-31 04:10:57', 1, 0),
(66, 39, 37, 0, 0, 0, 1, 0, 75, 122, 0, 100, '', '311018153842XOO', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(67, 46, 36, 0, 0, 0, 2, 0, 150, 330, 0, 300, '', '011118151857UGB', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(68, 47, 38, 0, 0, 0, 2, 0, 100, 130, 0, 100, 'MANUAL TIMBANGAN', '011118153159CIC', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(69, 50, 40, 0, 0, 0, 2, 0, 100, 130, 30, 100, 'TEST TIMBANG', '011118165129RZB', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(70, 51, 0, 0, 0, 0, 7, 0, 0, 0, 0, 2, 'SISA PRODUKSI INGOT', '0111181704230CE', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(71, 52, 0, 0, 5, 0, 1, 0, 5, 100, 0, 80, '', '12345678', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(72, 52, 0, 0, 6, 0, 2, 0, 10, 200, 0, 180, '', '12345679', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(73, 53, 0, 0, 0, 0, 7, 0, 0, 0, 0, 12, 'SISA PRODUKSI WIP', '191118132220361', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(74, 54, 0, 0, 0, 0, 7, 0, 0, 0, 0, 12, 'SISA PRODUKSI WIP', '191118132221A9E', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(76, 63, 0, 4, 0, 0, 1, 0, 100, 50, 2, 25, 'TEST 1', '8645228', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(83, 63, 0, 4, 0, 0, 1, 0, 100, 50, 2, 25, 'TEST 2', '8645229', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(84, 63, 0, 4, 0, 0, 2, 0, 200, 100, 23, 77, 'PPT 1', '8645330', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(85, 63, 0, 4, 0, 0, 2, 0, 50, 50, 23, 23, 'PPT 2', '8645331', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(86, 64, 0, 8, 0, 0, 1, 0, 12, 120, 12, 108, 'TEST', '665439', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(88, 65, 40, 0, 0, 0, 2, 0, 100, 100, 20, 80, '', '22111894018LHQ', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(89, 66, 54, 0, 0, 0, 32, 0, 7, 70, 12, 58, '', '221118111627GOM', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(90, 66, 53, 0, 0, 0, 34, 0, 10, 100, 16, 84, '', '221118111645KJY', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(91, 66, 52, 0, 0, 0, 36, 0, 15, 150, 10, 140, '', '221118111918XDB', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(92, 66, 55, 0, 0, 0, 46, 0, 3, 30, 5, 25, '', '221118111929CJU', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(93, 66, 56, 0, 0, 0, 38, 0, 4, 80, 8, 72, '', '221118112052WLI', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(94, 66, 57, 0, 0, 0, 47, 0, 3, 60, 9, 51, '', '22111811211TBP', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(95, 67, 58, 0, 0, 0, 71, 0, 15, 60, 33, 27, '', '22111813406EQX', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(96, 67, 59, 0, 0, 0, 73, 0, 10, 50, 11, 39, '', '221118134018XSM', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(97, 67, 60, 0, 0, 0, 70, 0, 3, 30, 3, 27, '', '221118134035GDV', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(98, 68, 0, 0, 0, 0, 7, 0, 0, 0, 0, 2, 'SISA PRODUKSI INGOT', '231118131628429', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(99, 69, 0, 0, 0, 0, 7, 0, 0, 0, 0, 18, 'SISA PRODUKSI WIP', '231118131934193', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(100, 70, 0, 0, 0, 0, 7, 0, 0, 0, 0, 3, 'SISA PRODUKSI INGOT', '231118135121ADC', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(101, 71, 0, 0, 0, 0, 7, 0, 0, 0, 0, 3, 'SISA PRODUKSI WIP', '2311181414145FF', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(102, 72, 0, 0, 0, 0, 7, 0, 0, 0, 0, 3, 'SISA PRODUKSI WIP', '2311181414141A1', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(103, 73, 0, 0, 0, 0, 7, 0, 0, 0, 0, 2, 'SISA PRODUKSI INGOT', '2711181159251C5', '', '0000-00-00 00:00:00', 0, '2018-12-03 04:12:50', 1, 0),
(106, 75, 0, 0, 0, 0, 1, 0, 250, 250, 32, 218, '', '301118174018RAF', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(107, 75, 0, 0, 0, 0, 2, 0, 200, 200, 38, 162, '', '301118174028UGA', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(108, 76, 0, 0, 0, 0, 1, 0, 100, 100, 5, 95, '', '30111818353IVB', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(109, 77, 0, 0, 0, 0, 1, 0, 40, 50, 6, 44, '', '301118184019YNQ', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(110, 78, 0, 0, 0, 0, 12, 0, 3, 4, 1, 3, '', '301118192820UCU', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(111, 78, 0, 0, 0, 0, 76, 0, 10, 12, 2, 10, '', '301118192846UPX', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(112, 79, 0, 0, 0, 0, 76, 0, 5, 6, 1, 5, '', '301118192927ZIN', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(113, 80, 0, 0, 0, 0, 45, 0, 3, 60, 11, 49, '', '031218103910QOH', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(114, 81, 71, 0, 0, 0, 12, 0, 60, 75, 12, 63, '', '031218105031FVQ', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(115, 82, 72, 0, 0, 0, 9, 0, 50, 62, 12, 50, '', '031218131619LMT', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(116, 83, 72, 0, 0, 0, 9, 0, 25, 30, 5, 25, '', '031218133050NQX', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(117, 84, 72, 0, 0, 0, 9, 0, 25, 30, 5, 25, '', '031218133144GID', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(118, 85, 78, 0, 0, 0, 10, 0, 50, 70, 16, 54, '', '04121814722TGM', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(119, 86, 0, 15, 0, 0, 48, 0, 40, 418, 18, 400, '', '6678910', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(120, 86, 0, 15, 0, 0, 43, 0, 40, 432, 20, 412, '', '6678911', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_pembayaran`
--

CREATE TABLE `f_pembayaran` (
  `id` int(11) NOT NULL,
  `no_pembayaran` varchar(50) NOT NULL,
  `status` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modifed_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_pembayaran`
--

INSERT INTO `f_pembayaran` (`id`, `no_pembayaran`, `status`, `tanggal`, `keterangan`, `created_at`, `created_by`, `modified_at`, `modifed_by`) VALUES
(8, 'PMB.23112018.0003', 1, '2018-11-23', 'TEST 1', '2018-11-23', 1, '0000-00-00 00:00:00', 0),
(9, 'PMB.23112018.0004', 1, '2018-11-23', '', '2018-11-23', 1, '0000-00-00 00:00:00', 0),
(10, 'PMB.27112018.0001', 1, '2018-11-27', '', '2018-11-27', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_pembayaran_detail`
--

CREATE TABLE `f_pembayaran_detail` (
  `id` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_pembayaran_detail`
--

INSERT INTO `f_pembayaran_detail` (`id`, `id_pembayaran`, `voucher_id`, `amount`) VALUES
(4, 8, 1, 500000),
(7, 9, 8, 100000),
(8, 9, 12, 10000),
(9, 9, 19, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `f_uang_masuk`
--

CREATE TABLE `f_uang_masuk` (
  `id` int(11) NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `rekening_tujuan` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
  `jenis_pembayaran` varchar(50) NOT NULL,
  `bank_pembayaran` varchar(25) NOT NULL,
  `rekening_pembayaran` varchar(50) NOT NULL,
  `nomor_cek` varchar(50) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_cair` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_uang_masuk`
--

INSERT INTO `f_uang_masuk` (`id`, `m_customer_id`, `tanggal`, `rekening_tujuan`, `pembayaran_id`, `jenis_pembayaran`, `bank_pembayaran`, `rekening_pembayaran`, `nomor_cek`, `currency`, `nominal`, `tgl_cair`, `keterangan`, `created_at`, `created_by`) VALUES
(4, 3, '2018-11-22', 0, 8, 'Cash', '', '', '', 'IDR', 700000, '0000-00-00', 'TEST 1', '2018-11-22 10:11:14', 1),
(5, 3, '2018-11-22', 3, 9, 'Giro', 'BCA', '123456789', '', 'USD', 750606, '0000-00-00', 'TEST 2', '2018-11-22 10:11:37', 1),
(6, 3, '2018-11-22', 0, 10, 'Cek', 'BCA', '', '123456', 'IDR', 900000, '0000-00-00', 'TEST 3', '2018-11-22 10:11:26', 1),
(7, 3, '2018-11-22', 1, 0, 'Giro', 'BNI', '456789032', '', 'IDR', 50000000, '0000-00-00', 'TEST 4', '2018-11-22 10:11:58', 1),
(8, 6, '2018-11-23', 3, 0, 'Giro', 'BCA', '12345678', '', 'IDR', 15000000, '0000-00-00', '', '2018-11-23 10:11:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'ADMINISTRATOR', '2017-10-01 00:00:00', 1, '2017-10-01 00:00:00', 1),
(2, 'OPERATOR', '2017-10-01 09:10:02', 1, '2017-10-01 09:10:02', 1),
(3, 'PEMBELIAN', '2018-04-16 10:04:13', 1, '2018-04-16 10:04:13', 1),
(4, 'FINANCE', '2018-04-16 10:04:26', 1, '2018-04-16 10:04:26', 1),
(5, 'TIMBANGAN', '2018-04-16 10:04:37', 1, '2018-04-16 10:04:37', 1),
(6, 'GUDANG', '2018-04-16 10:04:48', 1, '2018-04-16 10:04:48', 1),
(7, 'PROCUREMENT', '2018-04-17 06:04:30', 1, '2018-04-17 06:04:30', 1),
(8, 'SALES', '2018-07-02 11:07:39', 1, '2018-07-02 11:07:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_cost`
--

CREATE TABLE `group_cost` (
  `id` int(11) NOT NULL,
  `nama_group_cost` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_cost`
--

INSERT INTO `group_cost` (`id`, `nama_group_cost`, `remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'AIR MINUM', '', '2018-02-25 06:02:03', 1, '2018-02-25 06:02:03', 1),
(2, 'UANG SAYUR', '', '2018-02-25 06:02:11', 1, '2018-02-25 06:02:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `ukuran` varchar(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `jenis_barang`, `kode`, `category`, `uom`, `ukuran`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'RONGSOK', '', 'RONGSOK', 'KG', NULL, '', '2018-02-14 10:02:58', 1, '2018-02-14 10:02:58', 1),
(2, 'INGOT', '04I0001', 'WIP', 'BATANG', NULL, '', '2018-02-14 10:02:10', 1, '2018-02-14 10:02:10', 1),
(3, 'AMPAS', '', 'AMPAS', 'KG', NULL, '', '2018-02-14 10:02:43', 1, '2018-10-16 12:10:12', 1),
(4, 'TOLLING', '', '', '', NULL, '', '2018-02-14 10:02:53', 1, '2018-02-14 10:02:53', 1),
(5, 'KAWAT MERAH', '', 'WIP', 'ROLL', NULL, '', '2018-02-14 10:02:07', 1, '2018-02-14 10:02:07', 1),
(6, 'KAWAT HITAM', '', 'WIP', 'ROLL', NULL, '', '2018-02-25 07:02:52', 1, '2018-02-25 07:02:52', 1),
(7, 'BS', '', 'RONGSOK', 'KG', NULL, '', '2018-10-18 11:25:14', 1, '2018-10-18 00:00:00', 0),
(8, 'BCW 1,77 MM SOFT', '', 'FG', 'KG', '0177', 'NON KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(9, 'BCW 1,63 MM SOFT', '', 'FG', 'KG', '0163', 'NON KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(10, 'BCW 1,40 MM SOFT', '', 'FG', 'KG', '0140', 'NON KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(11, 'BCW 0,15 MM TMS SOFT', '', 'FG', 'KG', '0015', 'KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(12, 'BCW 0,16 MM TMS SOFT', '', 'FG', 'KG', '0016', 'KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(13, 'BCW 0,14 MM TMS SOFT', '05RT005', 'FG', 'KG', '0014', 'KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(14, 'A-BCW TIPE 1', '01A0001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'A-BCW TIPE 2', '01A0002', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'ABU APOLLO ', '01AA001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'A - RAMBUT', '01AR001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'BC', '01B0001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 'TRAVO', '01B0002', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'COVERTAPE', '01B0003', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'COPPER SCRAP 2,90 MM - 3,20 MM', '01B0004', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'B-BAKAR', '01BB001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'B-LAUT', '01BL001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'BS SDM', '01BS001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 'BS ROLLING', '01BS002', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'BS APOLLO', '01BS003', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'BS INGOT', '01BS004', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'BS PRODUKSI 2.90', '01BS005', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'BS QC', '01BS007', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 'TEMBAGA RONGSOK 8 MM', '01BS008', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'BS TALI CUCI', '01BS009', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 'BS KAWAT RAMBUT', '01BS010', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 'AMPAS APOLLO', '01BS011', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'SERBUK APOLLO', '01BS012', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'SERBUK ROLLING', '01BS013', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'SERBUK DRAWING SDM', '01BS014', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'BCW 0,50 MM SOFT', '01BS015', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'BCW 0,60 MM SOFT', '01BS016', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'BCW 1,00 MM SOFT', '01BS017', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 'BCW 1,38 MM SOFT', '01BS018', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 'BCW 1,50 MM SOFT', '01BS019', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 'BCW 1,78 MM SOFT', '01BS020', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 'BCW 2,76 MM SOFT', '01BS021', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 'BCW 0,67 MM SOFT', '01BS022', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 'BCW 0,78 MM SOFT', '01BS023', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 'BCW 0,85 MM SOFT', '01BS024', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 'BCC', '01BS025', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, '0,40 MM TINNED', '01BS026', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, '0,45 MM TINNED', '01BS027', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, '0,50 MM TINNED', '01BS028', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 'BCW 2,26 MM SOFT', '01BS029', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 'BCW 3,55 MM SOFT', '01BS030', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, '0,12 MM TINNED', '01BS031', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, '0,18 MM TINNED', '01BS032', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 'BCW 0,12 MM SOFT TMS', '01BS034', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 'BS 8,00 MM', '01BS035', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, 'KURASAN ROLLING', '01BS036', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, 'SERBUK CUCIAN 8,00 MM', '01BS037', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, 'BLEBEK DRAWING SDM', '01BS038', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 'BS TEMBAGA', '01BS039', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 'BS 13,50 - 17,50 MM', '01BS040', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 'B-TELPON', '01BT002', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 'COPPER SCRAP 2,80 MM - 3,20 MM', '01C0001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 'CU WIRE C/W', '01C0002', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 'COPPER SCRAP 2,80 MM - 3,20 MM', '01C0003', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 'DINAMO ', '01D0001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 'DINAMO BARU', '01D0002', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, 'DINAMO HALUS', '01D0003', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 'D-KALENG', '01D0004', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 'DANDANG', '01DD001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 'ENAMELL ', '01E0001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 'TEMBAGA INGOT RENDAH', '01I0001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 'LUMPUR TEMBAGA', '01LP001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, 'MANGKUK CU', '01M0001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, 'PLAT', '01P0003', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, 'PIPA BARU', '01PB001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, 'PLAT PANEL', '01PP001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, 'PIPA RONGSOKAN TEMBAGA', '01PR001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, 'PLAT TEMBAGA', '01PT001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, 'SERUTAN', '01S0001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, 'SERBUK DRAWING', '01SD001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, 'TEMBAGA PUTIH', '01T0001', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, 'TEMBAGA AFKIR 8 MM', '01T0005', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, 'AMPAS TEMBAGA', '01T0006', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(141, 'BC WIRE HARD 2,60MM', '05BCH05', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(142, 'BCW 2,03 MM HARD', '05BH002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 'BCW 2,05 MM HARD', '05BH003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 'BCW 2,23 MM HARD', '05BH004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 'BCW 2,50 MM HARD', '05BH005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 'BCW 2,17 MM HARD', '05BH007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 'BCW 2,21 MM HARD', '05BH009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, 'BCW 2,28 MM HARD', '05BH014', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 'BCW 2,40 MM HARD', '05BH018', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 'BCW 2,47 MM HARD', '05BH019', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 'BCW 2,52 MM HARD', '05BH022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 'BCW 2,60 MM HARD', '05BH024', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 'BCW 2,66 MM HARD', '05BH025', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 'BCW 2,68 MM HARD', '05BH026', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 'BCW 2,70 MM HARD', '05BH027', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 'BCW 2,90 MM HARD', '05BH034', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 'BCW 2,96 MM HARD', '05BH035', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 'BCW 3,00 MM HARD', '05BH037', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 'BCW 3,20 MM HARD', '05BH038', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 'BCW 3,23 MM HARD', '05BH039', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 'BCW 3,40 MM HARD', '05BH040', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 'BCW 3,48 MM HARD', '05BH041', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 'BCW 3,57 MM HARD', '05BH046', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 'BCW  3,00 MM HARD', '05BH051', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 'BCW 3,29 MM HARD', '05BH052', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 'BCW 2,78 MM HARD', '05BH054', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 'BCW 2,09 MM HARD', '05BH056', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 'BCW 2,10 MM HARD', '05BH057', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 'BCW 2,48 MM HARD', '05BH058', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 'BCW 2,29 MM HARD', '05BH059', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 'BCW 2,56 MM HARD', '05BH060', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 'BCW 2,90 MM HARD I', '05BHI34', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 'BCW 2,56 MM HARD I', '05BHI60', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 'BCW 2,78 MM HARD TMS', '05BHT01', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 'BCW 2,50 MM HARD TMS', '05BHT02', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 'BCW 2,90 MM HARD TMS', '05BHT03', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 'BCW 3,57 MM HARD TMS', '05BHT04', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 'BCW 2,00 MM HARD TMS', '05BHT05', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 'BCW 2,76 MM HARD TMS', '05BHT06', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 'BCW 3,57 MM HARD TMS', '05BHT07', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 'BCW 2,60 MM HARD TMS', '05BHT08', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 'BCW 3,58 MM HARD TMS', '05BHT09', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 'BCW 2,77 MM HARD TMS', '05BHT10', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 'BCW 2,00 MM SOFT  I', '05BI001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 'BCW 2,03 MM SOFT I', '05BI002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 'BCW 2,18 MM SOFT  I', '05BI003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 'BCW 2,10 MM SOFT  I', '05BI004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 'BCW 2,13 MM SOFT I', '05BI005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 'BCW 2,14 MM SOFT  I', '05BI006', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 'BCW 2,17 MM SOFT  I', '05BI007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 'BCW 2,20 MM SOFT I', '05BI008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 'BCW 2,21 MM SOFT  I', '05BI009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 'BCW 2,26 MM SOFT I', '05BI010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 'BCW 2,25 MM SOFT I', '05BI011', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 'BCW 2,26 MM SOFT I', '05BI012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, 'BCW 2,50 MM SOFT I', '05BI021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, 'BCW 2,52 MM SOFT  I', '05BI022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, 'BCW 2,80 MM SOFT I', '05BI032', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, 'BCW 2,23 MM SOFT I', '05BI036', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, 'BCW 3,50 MM SOFT I', '05BI042', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, 'BCW 2,45 MM SOFT I', '05BI050', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, 'BCW 2,16 MM SOFT I', '05BI060', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, 'BCW 2,90 MM HARD I', '05BIH34', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, 'BCW 2,56 MM HARH I', '05BIH60', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, 'BCW 2,00 MM SOFT', '05BS001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(206, 'BCW 2,03 MM SOFT', '05BS002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(207, 'BCW 2,18 MM SOFT', '05BS003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(208, 'BCW 2,10 MM SOFT', '05BS004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(209, 'BCW 2,13 MM SOFT', '05BS005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(210, 'BCW 2,14 MM SOFT', '05BS006', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(211, 'BCW 2,17 MM SOFT', '05BS007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(212, 'BCW 2,20 MM SOFT', '05BS008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(213, 'BCW 2,21 MM SOFT', '05BS009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(214, 'BCW 2,24 MM SOFT', '05BS010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(215, 'BCW 2,25 MM SOFT', '05BS011', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(216, 'BCW 2,26 MM SOFT', '05BS012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(217, 'BCW 2,27 MM SOFT', '05BS013', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(218, 'BCW 2,28 MM SOFT', '05BS014', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(219, 'BCW 2,30 MM SOFT', '05BS015', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(220, 'BCW 2,33 MM SOFT', '05BS016', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(221, 'BCW 2,34 MM SOFT', '05BS017', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(222, 'BCW 2.43 MM SOFT', '05BS018', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(223, 'BCW 2,53 MM SOFT', '05BS019', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(224, 'BCW 2,49 MM SOFT', '05BS020', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(225, 'BCW 2,50 MM SOFT', '05BS021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(226, 'BCW 2,52 MM SOFT', '05BS022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(227, 'BCW 2,59 MM SOFT', '05BS023', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(228, 'BCW 2,60 MM SOFT', '05BS024', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(229, 'BCW 2,66 MM SOFT', '05BS025', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(230, 'BCW 2,70 MM SOFT', '05BS027', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(231, 'BCW 2,75 MM SOFT ', '05BS028', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(232, 'BCW 2,76 MM SOFT', '05BS029', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(233, 'BCW 2,77 MM SOFT', '05BS030', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(234, 'BCW 2,78 MM SOFT', '05BS031', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(235, 'BCW 2,80 MM SOFT', '05BS032', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(236, 'BCW 2,89 MM SOFT', '05BS033', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(237, 'BCW 2,73 MM SOFT', '05BS034', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(238, 'BCW 2,96 MM SOFT', '05BS035', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(239, 'BCW 2,23 MM SOFT', '05BS036', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(240, 'BCW 3,00 MM SOFT', '05BS037', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(241, 'BCW 3,20 MM SOFT', '05BS038', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(242, 'BCW 3,40 MM SOFT', '05BS040', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(243, 'BCW 3,48 MM SOFT', '05BS041', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(244, 'BCW 3,50 MM SOFT', '05BS042', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(245, 'BCW 3,52 MM SOFT', '05BS043', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(246, 'BCW 3,55 MM SOFT', '05BS044', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(247, 'BCW 3,56 MM SOFT', '05BS045', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(248, 'BCW 3,57 MM SOFT', '05BS046', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(249, 'BCW 3,58 MM SOFT', '05BS047', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(250, 'BCW 3,45 MM SOFT', '05BS048', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(251, 'BCW 3,51 MM SOFT', '05BS049', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(252, 'BCW 2,45 MM SOFT', '05BS050', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(253, 'BCW 3,70 MM SOFT', '05BS051', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(254, 'BCW 2,07 MM SOFT', '05BS052', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(255, 'BCW 2,19 MM SOFT', '05BS053', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(256, 'BCW 2,67 MM SOFT', '05BS054', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(257, 'BCW 2,40 MM SOFT', '05BS055', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(258, 'BCW 2,90 MM SOFT', '05BS056', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(259, 'BCW 3,60 MM SOFT', '05BS057', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(260, 'BCW 2,08 MM SOFT', '05BS058', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(261, 'BCW 2,15 MM SOFT', '05BS059', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(262, 'BCW 2,16 MM SOFT', '05BS060', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(263, 'BCW 2,09 MM SOFT', '05BS061', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(264, 'BCW 2,48 MM SOFT', '05BS062', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(265, 'BCW 2,65 MM SOFT', '05BS063', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(266, 'BCW 2,46 MM SOFT', '05BS064', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(267, 'BCW 2,098 MM SOFT', '05BS065', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(268, 'BCW 3,31 MM SOFT', '05BS066', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(269, 'BCW 2,65 MM SOFT TMS', '05BT006', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(270, 'BCW 2,17 MM SOFT TMS', '05BT007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(271, 'BCW 2,26 MM SOFT TMS', '05BT010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(272, 'BCW 2,52 MM SOFT TMS', '05BT022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(273, 'BCW 2,60 MM SOFT TMS', '05BT024', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(274, 'BCW 3,57 MM SOFT TMS', '05BT046', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(275, 'BCW 3,60 MM SOFT TMS', '05BT049', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(276, 'BCW 2,88 MM SOFT TMS', '05BT050', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(277, 'BCW 2,07 MM SOFT TMS', '05BT051', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(278, 'BCW 2,90 MM SOFT TMS', '05BT054', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(279, 'BCW 2,23 MM SOFT TMS', '05BT055', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(280, 'BCW 2,76 MM SOFT TMS', '05BT056', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(281, 'BCW 2,78 MM SOFT TMS', '05BT057', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(282, 'BCW 2,96 MM SOFT TMS', '05BT058', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(283, 'BCW 2,28 MM SOFT TMS', '05BT059', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(284, 'BCW 2,05 MM SOFT TMS', '05BT060', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(285, 'BCW 2,53 MM SOFT TMS', '05BT061', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(286, 'BCW 2,57 MM SOFT TMS', '05BT062', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(287, 'BCW 3,02 MM SOFT TMS', '05BT063', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(288, 'BCW 2,17 MM SOFT TMS', '05BT064', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(289, 'BCW 2,14 MM SOFT TMS', '05BT065', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(290, 'BCW 2,25 MM SOFT TMS', '05BT066', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(291, 'BCW 2,39 MM SOFT TMS', '05BT067', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(292, 'BCW 3,70 MM SOFT TMS', '05BT068', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(293, 'BCW 2,20 MM SOFT TMS', '05BT069', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(294, 'BCW 2,27 MM SOFT TMS', '05BT070', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(295, 'BCW 3,02 MM SOFT TMS', '05BT071', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(296, 'BCW 2,19 MM SOFT TMS', '05BT072', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(297, 'BCW 2,21 MM SOFT TMS', '05BT073', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(298, 'BCW 2,30 MM SOFT TMS', '05BT074', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(299, 'EIW 0,28 MM TYPE 1', '05E0001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(300, 'EIW 1,80 MM TYPE 1', '05E0002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(301, 'BCW 0,40 MM HARD', '05HH001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(302, 'BCW 0,45 MM HARD', '05HH002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(303, 'BCW 0,47 MM HARD', '05HH003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(304, 'BCW 0,50 MM HARD', '05HH004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(305, 'BCW 0,51 MM HARD', '05HH005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(306, 'BCW 0,57 MM HARD', '05HH006', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(307, 'BCW 0,59 MM HARD', '05HH007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(308, 'BCW 0,60 MM HARD', '05HH008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(309, 'BCW 0,63 MM HARD', '05HH009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(310, 'BCW 0,65 MM HARD', '05HH010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(311, 'BCW 0,67 MM HARD', '05HH012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(312, 'BCW 0,68 MM HARD', '05HH014', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(313, 'BCW 0,70 MM HARD', '05HH015', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(314, 'BCW 0,72 MM HARD', '05HH016', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(315, 'BCW 0,75 MM HARD', '05HH018', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(316, 'BCW 0,77 MM HARD', '05HH019', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(317, 'BCW 0,78 MM HARD', '05HH020', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(318, 'BCW 0,80 MM HARD', '05HH021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(319, 'BCW 0,83 MM HARD', '05HH022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(320, 'BCW 0,85 MM HARD', '05HH024', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(321, 'BCW 0,87 MM HARD', '05HH025', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(322, 'BCW 0,89 MM HARD', '05HH026', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(323, 'BCW 0,90 MM HARD', '05HH027', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(324, 'BCW 0,95 MM HARD', '05HH028', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(325, 'BCW 0,73 MM HARD', '05HH029', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(326, 'BCW 0,97 MM HARD', '05HH030', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(327, 'BCW0,98 MM HARD', '05HH031', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(328, 'BCW 0,55 MM HARD', '05HH032', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(329, 'BCW 0,93 MM HARD', '05HH049', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(330, 'BCW 0,52 MM HARD', '05HH056', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(331, 'BCW 0,62 MM HARD', '05HH057', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(332, 'BCW 0,82 MM HARD', '05HH058', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(333, 'BCW 0,53 MM HARD', '05HH059', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(334, 'BCW 0,40 MM SOFT I', '05HI001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(335, 'BCW 0,50 MM SOFT I', '05HI004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(336, 'BCW 0,60 MM SOFT I', '05HI008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(337, 'BCW 0,70 MM SOFT I', '05HI015', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(338, 'BCW 0,80 MM SOFT I', '05HI021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(339, 'BCW 0,35 MM SOFT I', '05HI059', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(340, 'BCW 0,50 MM 1/2 HARD', '05HN004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(341, 'BCW 0,67 1/2 MM HARD', '05HN012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(342, 'BCW 0,70 MM 1/2 HARD', '05HN015', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(343, 'BCW 0,75 MM 1/2 HARD', '05HN018', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(344, 'BCW 0,80 MM 1/2 HARD', '05HN021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(345, 'BCW 0,83 MM 1/2 HARD', '05HN022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(346, 'BCW 0,89 MM 1/2 HARD', '05HN026', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(347, 'BCW 0,90 MM 1/2 HARD', '05HN027', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(348, 'BCW 0,40 MM SOFT', '05HS001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(349, 'BCW 0,45 MM SOFT', '05HS002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(350, 'BCW 0,47 MM SOFT', '05HS003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(351, 'BCW 0,50 MM SOFT', '05HS004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(352, 'BCW 0,51 MM SOFT', '05HS005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(353, 'BCW 0,57 MM SOFT', '05HS006', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(354, 'BCW 0,59 MM SOFT', '05HS007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(355, 'BCW 0,60 MM SOFT', '05HS008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(356, 'BCW 0,63 MM SOFT', '05HS009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(357, 'BCW 0,65 MM SOFT', '05HS010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(358, 'BCW 0,67 MM SOFT', '05HS012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(359, 'BCW 0,68 MM SOFT', '05HS014', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(360, 'BCW 0,70 MM SOFT', '05HS015', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(361, 'BCW 0,72 MM SOFT', '05HS016', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(362, 'BCW 0,74 MM SOFT', '05HS017', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(363, 'BCW 0,75 MM SOFT', '05HS018', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(364, 'BCW 0,77 MM SOFT', '05HS019', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(365, 'BCW 0,78 MM SOFT', '05HS020', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(366, 'BCW 0,80 MM SOFT', '05HS021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(367, 'BCW 0,83 MM SOFT', '05HS022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(368, 'BCW 0,84 MM SOFT', '05HS023', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(369, 'BCW 0,85 MM SOFT', '05HS024', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(370, 'BCW 0,87 MM SOFT', '05HS025', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(371, 'BCW 0,89 MM SOFT', '05HS026', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(372, 'BCW 0,90 MM SOFT', '05HS027', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(373, 'BCW 0,95 MM SOFT', '05HS028', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(374, 'BCW 0,73 MM SOFT', '05HS029', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(375, 'BCW 0,97 MM SOFT', '05HS030', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(376, 'BCW 0,98 MM SOFT', '05HS031', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(377, 'BCW 0,53 MM SOFT', '05HS032', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(378, 'BCW 0,54 MM SOFT', '05HS057', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(379, 'BCW 0,55 MM SOFT', '05HS058', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(380, 'BCW 0,35 MM SOFT', '05HS059', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(381, 'BCW 0,81 MM SOFT', '05HS060', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(382, 'BCW 0,76 MM SOFT', '05HS061', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(383, 'BCW 0,52 MM SOFT', '05HS062', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(384, 'BCW 0,495 MM SOFT', '05HS063', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(385, 'BCW 0,40 MM TMS SOFT', '05HT001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(386, 'BCW 0,85 MM TMS SOFT', '05HT002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(387, 'BCW 0,50 MM TMS SOFT', '05HT004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(388, 'BCW 0.51 MM TMS SOFT', '05HT005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(389, 'BCW 0,60 MM TMS SOFT ', '05HT008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(390, 'BCW 0,80 MM TMS SOFT', '05HT021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(391, 'BCW 0,87 MM TMS SOFT', '05HT025', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(392, 'BCW 0,55 MM TMS SOFT', '05HT032', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(393, 'BCW 0,41 MM TMS', '05HT056', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(394, 'BCW 0,63 MM TMS SOFT', '05HT063', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(395, 'BCW 0,61 MM TMS SOFT', '05HT064', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(396, 'BCW 0,67 MM TMS SOFT', '05HT065', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(397, 'PEW 0,28 MM (TYPE 1)', '05P0001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(398, 'PEW 2,50 MM', '05P0002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(399, 'PEW 0,50 MM TYPE 2', '05P0003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(400, 'BCW 0,10 MM HARD', '05RH001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(401, 'BCW 0,11 MM HARD', '05RH002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(402, 'BCW 0,12 MM HARD', '05RH003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(403, 'BCW 0,14 MM HARD', '05RH004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(404, 'BCW 0,14 MM 1/2 HARD', '05RH005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(405, 'BCW 0,16 MM HARD', '05RH007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(406, 'BCW 0,17 MM HARD', '05RH008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(407, 'BCW 0,18 MM HARD', '05RH009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(408, 'BCW 0,24 MM HARD', '05RH014', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(409, 'BCW 0,10 MM HARD TMS', '05RHT01', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(410, 'BCW 0,11 MM HARD TMS', '05RHT02', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(411, 'BCW 0,80 MM HARD TMS', '05RHT03', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(412, 'BCW 0,18 MM SOFT I', '05RI009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(413, 'BCW 0,20 MM SOFT I', '05RI010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(414, 'BCW 0,25 MM SOFT I', '05RI015', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(415, 'BCW 0,255 MM SOFT I', '05RI017', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(416, 'BCW 0,31 MM SOFT I', '05RI021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(417, 'BCW 0,32 MM SOFT I', '05RI022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(418, 'BCW 0,40 MM SOFT I', '05RI053', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(419, 'BCW 0,50 MM SOFT I', '05RI054', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(420, 'BCW 0,11 MM HARD I', '05RIH02', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(421, 'BCW 0,17 MM HARD I', '05RIH08', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(422, 'BCW 0,16 MM 1/2 HARD', '05RN007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(423, 'BCW 0,18 MM 1/2 HARD', '05RN009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(424, 'BCW 0,10 MM SOFT', '05RS001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(425, 'BCW 0,11 MM SOFT', '05RS002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(426, 'BCW 0,12 MM SOFT', '05RS003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(427, 'BCW 0,13 MM SOFT', '05RS004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(428, 'BCW 0,14 MM SOFT', '05RS005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(429, 'BCW 0,15 MM SOFT', '05RS006', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(430, 'BCW 0,16 MM SOFT', '05RS007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(431, 'BCW 0,17 MM SOFT', '05RS008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(432, 'BCW 0,18 MM SOFT', '05RS009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(433, 'BCW 0,20 MM SOFT', '05RS010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(434, 'BCW 0,21 MM SOFT', '05RS011', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(435, 'BCW 0,22 MM SOFT', '05RS012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(436, 'BCW 0,23 MM SOFT', '05RS013', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(437, 'BCW 0,24 MM SOFT', '05RS014', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(438, 'BCW 0,25 MM SOFT', '05RS015', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(439, 'BCW 0,251 MM SOFT', '05RS016', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(440, 'BCW 0,255 MM SOFT', '05RS017', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(441, 'BCW 0,26 MM SOFT', '05RS018', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(442, 'BCW 0,29 MM SOFT', '05RS019', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(443, 'BCW 0,30 MM SOFT', '05RS020', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(444, 'BCW 0,31 MM SOFT', '05RS021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(445, 'BCW 0,32 MM SOFT', '05RS022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(446, 'BCW 0,35 MM SOFT', '05RS052', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(447, 'BCW 0,40 MM SOFT', '05RS053', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(448, 'BCW 0,50 MM SOFT', '05RS054', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(449, 'BCW 0,19 MM SOFT', '05RS055', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(450, 'BCW 0,10 MM TMS SOFT', '05RT001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(451, 'BCW 0,11 MM TMS SOFT', '05RT002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(452, 'BCW 0,12 MM TMS SOFT', '05RT003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(453, 'BCW 0,13 MM TMS SOFT', '05RT004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(455, 'BCW 0,15 MM TMS SOFT', '05RT006', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(456, 'BCW 0,16 MM TMS SOFT NEW', '05RT007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(457, 'BCW 0,17 MM TMS SOFT', '05RT008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(458, 'BCW 0,18 MM TMS SOFT', '05RT009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(459, 'BCW 0,20 MM TMS SOFT', '05RT010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(460, 'BCW 0,21 MM TMS SOFT', '05RT011', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(461, 'BCW 0,22 MM TMS SOFT', '05RT012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(462, 'BCW 0,23 MM TMS SOFT', '05RT013', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(463, 'BCW 0,24 MM TMS SOFT', '05RT014', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(464, 'BCW 0,25 MM TMS SOFT', '05RT015', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(465, 'BCW 0,251 MM TMS SOFT', '05RT016', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(466, 'BCW 0,255 MM  TMS SOFT', '05RT017', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(467, 'BCW 0,26 MM TMS SOFT', '05RT018', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(468, 'BCW 0,29 MM TMS SOFT', '05RT019', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(469, 'BCW 0,30 MM TMS SOFT', '05RT020', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(470, 'BCW 0,31 MM TMS SOFT', '05RT021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(471, 'BCW 0,32 MM TMS SOFT', '05RT022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(472, 'BCW 0,35 MM TMS SOFT', '05RT052', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(473, 'BCW 0,40 MM TMS SOFT', '05RT055', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(474, 'BCW 0,50 MM TMS SOFT', '05RT056', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(475, 'BCW 0,41 MM TMS SOFT', '05RT057', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(476, 'BCW 0,252 MM TMS SOFT', '05RT058', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(477, 'BCW 0,175 MM TMS SOFT', '05RT059', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(478, 'BCW 0,155 MM TMS SOFT', '05RT060', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(479, 'BCW 0,82 MM TMS SOFT', '05RT061', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(480, 'BCW 0,19 MM TMS SOFT', '05RT062', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(481, 'BCW 1,78 MM TMS HARD', '05TD001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(482, 'BCW 1,00 MM HARD', '05TH001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(483, 'BCW 1,05 mm HARD', '05TH002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(484, 'BCW 1,04 MM HARD', '05TH004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(485, 'BCW 1,10 MM HARD', '05TH008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(486, 'BCW 1,17 MM 1/2 HARD', '05TH010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(487, 'BCW 1,25 MM HARD', '05TH014', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(488, 'BCW 1,40 MM HARD', '05TH022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(489, 'BCW 1,42 MM HARD', '05TH023', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(490, 'BCW 1,53 MM HARD', '05TH024', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(491, 'BCW 1,55 MM HARD', '05TH027', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(492, 'BCW 1,65 MM HARD', '05TH032', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(493, 'BCW 1,66 MM HARD', '05TH033', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(494, 'BCW 1,15 MM HARD', '05TH034', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(495, 'BCW 1,83 MM HARD', '05TH045', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(496, 'BCW 1,94 MM HARD', '05TH046', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(497, 'BCW 1,31 MM HARD', '05TH053', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(498, 'BCW 1,12 MM HARD', '05TH054', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(499, 'BCW 1,45 MM HARD', '05TH055', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(500, 'BCW 1,07 MM HARD', '05TH056', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(501, 'BCW 1,45 MM 1/2 HARD', '05TH057', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(502, 'BCW 1,17 MM HARD', '05TH058', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(503, 'BCW 1,52 MM HARD', '05TH059', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(504, 'BCW 1,92 MM HARD', '05TH061', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(505, 'BCW 1,00 MM SOFT  I', '05TI001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `jenis_barang` (`id`, `jenis_barang`, `kode`, `category`, `uom`, `ukuran`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(506, 'BCW 1,08 MM SOFT  I', '05TI007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(507, 'BCW 1,10 MM SOFT  I', '05TI008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(508, 'BCW 1,20 MM SOFT  I', '05TI012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(509, 'BCW 1,25 MM SOFT  I', '05TI014', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(510, 'BCW 1,30 MM SOFT  I', '05TI016', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(511, 'BCW 1,35 MM SOFT  I', '05TI017', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(512, 'BCW 1,36 MM SOFT  I', '05TI018', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(513, 'BCW 1,38 MM SOFT  I', '05TI020', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(514, 'BCW 1,40 MM SOFT  I', '05TI022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(515, 'BCW 1,50 MM SOFT  I', '05TI026', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(516, 'BCW 1,60 MM SOFT  I', '05TI030', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(517, 'BCW 1,70 MM SOFT  I', '05TI036', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(518, 'BCW 1,75 MM SOFT  I', '05TI039', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(519, 'BCW 1,76 MM SOFT  I', '05TI040', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(520, 'BCW 1,78 MM SOFT  I', '05TI042', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(521, 'BCW 1,05 MM SOFT I', '05TI043', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(522, 'BCW 0,40 MM 1/2 HARD', '05TN001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(523, 'BCW 1,10 MM 1/2 HARD', '05TN008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(524, 'BCW 1,15 MM 1/2 HARD', '05TN009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(525, 'BCW 1,17 MM 1/2 HARD', '05TN010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(526, 'BCW 1,20 MM 1/2 HARD', '05TN012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(527, 'BCW  ', '05TN020', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(528, 'BCW 1,57 MM 1/2 HARD', '05TN028', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(529, 'BCW 1,60 MM 1/2 HARD', '05TN030', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(530, 'BCW 1,00 MM SOFT', '05TS001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(531, 'BCW 1,015 MM SOFT', '05TS002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(532, 'BCW 1,02 MM SOFT', '05TS003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(533, 'BCW 1,04 MM SOFT', '05TS004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(534, 'BCW 1,05 MM SOFT', '05TS005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(535, 'BCW 1,07 MM SOFT', '05TS006', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(536, 'BCW 1,08 MM SOFT', '05TS007', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(537, 'BCW 1,10 MM SOFT ', '05TS008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(538, 'BCW 1,15 MM SOFT', '05TS009', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(539, 'BCW 1,06 MM SOFT', '05TS010', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(540, 'BCW 1,20 MM SOFT', '05TS012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(541, 'BCW 1,24 MM SOFT', '05TS013', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(542, 'BCW 1,25 MM SOFT', '05TS014', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(543, 'BCW 1,27 MM SOFT ', '05TS015', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(544, 'BCW 1,30 MM SOFT', '05TS016', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(545, 'BCW 1,35 MM SOFT', '05TS017', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(546, 'BCW 1,36 MM SOFT', '05TS018', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(547, 'BCW 1,37 MM SOFT', '05TS019', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(548, 'BCW 1,38 MM SOFT', '05TS020', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(549, 'BCW 1,39 MM SOFT', '05TS021', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(550, 'BCW 1,40 MM SOFT', '05TS022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(551, 'BCW 1,42 MM SOFT', '05TS023', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(552, 'BCW 1,43 MM SOFT', '05TS024', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(553, 'BCW 1,46 MM SOFT', '05TS025', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(554, 'BCW 1,50 MM SOFT', '05TS026', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(555, 'BCW 1,59 MM SOFT', '05TS029', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(556, 'BCW 1,60 MM SOFT', '05TS030', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(557, 'BCW 1,63 MM SOFT', '05TS031', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(558, 'BCW 1,65 MM SOFT', '05TS032', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(559, 'BCW 1,66 MM SOFT', '05TS033', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(560, 'BCW 1,68 MM SOFT', '05TS035', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(561, 'BCW 1,70 MM SOFT', '05TS036', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(562, 'BCW 1,71 MM SOFT', '05TS037', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(563, 'BCW 1,74 MM SOFT', '05TS038', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(564, 'BCW 1,75 MM SOFT', '05TS039', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(565, 'BCW 1,76 MM SOFT', '05TS040', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(566, 'BCW 1,77 MM SOFT', '05TS041', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(567, 'BCW 1,78 MM SOFT', '05TS042', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(568, 'BCW 1,79 MM SOFT', '05TS043', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(569, 'BCW 1,80 MM SOFT', '05TS044', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(570, 'BCW 1,83 MM SOFT', '05TS045', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(571, 'BCW 1,85 MM SOFT', '05TS046', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(572, 'BCW 1,84 MM SOFT', '05TS047', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(573, 'BCW 1,45 MM SOFT', '05TS055', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(574, 'BCW 1,81 MM SOFT', '05TS056', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(575, 'BCW 1,73 MM SOFT', '05TS057', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(576, 'BCW 1,21 MM SOFT', '05TS058', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(577, 'BCW 1,18 MM SOFT', '05TS059', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(578, 'BCW 1,89 MM SOFT', '05TS060', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(579, 'BCW 1,90 MM SOFT', '05TS061', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(580, 'BCW 1,28 MM SOFT', '05TS062', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(581, 'BCW 1,52 MM SOFT', '05TS063', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(582, 'BCW 1,92 MM SOFT', '05TS064', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(583, 'BCW 1,34 MM SOFT', '05TS065', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(584, 'BCW 1,00 MM SOFT TMS', '05TT001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(585, 'BCW 1,05 MM SOFT TMS', '05TT005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(586, 'BCW 1,10 MM SOFT TMS', '05TT008', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(587, 'BCW 1,20 MM TMS', '05TT012', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(588, 'BCW 1,38 MM SOFT TMS', '05TT020', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(589, 'BCW 1,40 MM TMS', '05TT022', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(590, 'BCW 1,42 MM TMS', '05TT023', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(591, 'BCW 1,43 MM TMS SOFT', '05TT024', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(592, 'BCW 1,50 MM SOFT TMS', '05TT026', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(593, 'BCW 1,79 MM SOFT TMS', '05TT043', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(594, 'BCW 1,80 MM TMS', '05TT044', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(595, 'BCW 1,78 MM SOFT TMS', '05TT045', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(596, 'BCW 1,35 MM SOFT TMS', '05TT046', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(597, 'BCW 1,02 MM SOFT TMS', '05TT048', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(598, 'BCW 1,43 MM SOFT TMS', '05TT049', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(599, 'BCW 1,84 MM SOFT TMS', '05TT050', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(600, 'BCW 1,71 MM SOFT TMS', '05TT051', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(601, 'BCW 1,92 MM SOFT TMS', '05TT052', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(602, 'BCW 1,36 MM SOFT TMS', '05TT053', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(603, 'BCW 1,75 MM SOFT TMS', '05TT054', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(604, 'BCW 1,76 MM SOFT TMS', '05TT055', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(605, 'BCW 1,73 MM SOFT TMS', '05TT056', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(606, 'BCW 1,53 MM SOFT TMS', '05TT060', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(607, 'BCW 1,55 MM SOFT TMS', '05TT061', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(608, 'BCW 1,37 MM SOFT TMS', '05TT062', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(609, 'BCW 1,74 MM SOFT TMS', '05TT063', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(610, 'BCW 1,85 MM SOFT TMS', '05TT064', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(611, 'UEW 0,40 MM (TYPE 1)', '05U0001', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(612, 'UEW 0,90 MM (TYPE 1)', '05U0002', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(613, 'UEW 0,95 MM (TYPE1)', '05U0003', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(614, 'UEW 1,40 MM (TYPE 1)', '05U0004', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(615, 'UEW 0,37 MM ', '05U0005', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(616, 'UEW 1,00 MM (TYPE 1)', '05U0006', 'FG', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(652, 'BCW 2,90 MM SOFT TMS', '04BT054', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(653, 'COPPER ROD 8,00 MM KERAS', '04C0001', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(654, 'COPPER ROD 8,00 MM CUCI', '04C0003', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(655, 'COPPER ROD 8,00 MM TMS', '04C0004', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(656, 'COPPER ROD 8,00 MM', '04C0006', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(657, 'COPPER ROD 8,00 MM TMS PRYSMIAN', '04C0007', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(658, 'COPPER ROD 8,00 MM MTU', '04C0008', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(659, 'COPPER ROD 20 MM', '04C0009', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(660, 'COPPER ROD 20 MM CUCI', '04C0010', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(661, 'COPPER WIRE 15 MM', '04C0011', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(662, 'COPPER WIRE 17,5 MM', '04C0012', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(663, 'COPPER WIRE 13,5 MM', '04C0013', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(664, 'COPPER WIRE 2,80 MM', '04C0014', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(665, 'COPPER WIRE 15,5 MM', '04C0015', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(666, 'COPPER WIRE 0,20 MM', '04C0016', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(667, 'COP 8,00 MM BAKAR ULANG', '04C0017', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(668, 'COP 8,00 MM CUCI BAKAR ULANG', '04C0018', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(669, 'COPPER WIRE 0,25 MM', '04C0019', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(670, 'COPPER WIRE 1,75 MM TMS', '04C0022', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(671, 'COPPER WIRE 1,76 MM TMS', '04C0023', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(672, 'COPPER WIRE 0,12 MM', '04CW012', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(673, 'COPPER WIRE 0,67 MM', '04CW067', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(674, 'COPPER WIRE 1,38 MM', '04CW138', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(675, 'TALI CUCI', '04T0001', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang_old`
--

CREATE TABLE `jenis_barang_old` (
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `ukuran` varchar(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang_old`
--

INSERT INTO `jenis_barang_old` (`id`, `jenis_barang`, `kode`, `category`, `uom`, `ukuran`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'RONGSOK', '', 'RONGSOK', 'KG', NULL, '', '2018-02-14 10:02:58', 1, '2018-02-14 10:02:58', 1),
(2, 'INGOT', '', 'WIP', 'BATANG', NULL, '', '2018-02-14 10:02:10', 1, '2018-02-14 10:02:10', 1),
(3, 'AMPAS', '', 'AMPAS', 'KG', NULL, '', '2018-02-14 10:02:43', 1, '2018-10-16 12:10:12', 1),
(4, 'TOLLING', '', '', '', NULL, '', '2018-02-14 10:02:53', 1, '2018-02-14 10:02:53', 1),
(5, 'KAWAT MERAH', '', 'WIP', 'ROLL', NULL, '', '2018-02-14 10:02:07', 1, '2018-02-14 10:02:07', 1),
(6, 'KAWAT HITAM', '', 'WIP', 'ROLL', NULL, '', '2018-02-25 07:02:52', 1, '2018-02-25 07:02:52', 1),
(7, 'BS', '', 'RONGSOK', 'KG', NULL, '', '2018-10-18 11:25:14', 1, '2018-10-18 00:00:00', 0),
(8, 'BCW 1,77 MM SOFT', '', 'FG', 'KG', '0177', 'NON KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(9, 'BCW 1,63 MM SOFT', '', 'FG', 'KG', '0163', 'NON KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(10, 'BCW 1,40 MM SOFT', '', 'FG', 'KG', '0140', 'NON KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(11, 'BCW 0,15 MM TMS SOFT', '', 'FG', 'KG', '0015', 'KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(12, 'BCW 0,16 MM TMS SOFT', '', 'FG', 'KG', '0016', 'KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(13, 'BCW 0,14 MM TMS SOFT', '', 'FG', 'KG', '0014', 'KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lpb`
--

CREATE TABLE `lpb` (
  `id` int(11) NOT NULL,
  `no_bpb` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `po_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpb`
--

INSERT INTO `lpb` (`id`, `no_bpb`, `tanggal`, `po_id`, `remarks`, `pengirim`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'BPB.11022018.0001', '2018-02-11', 3, '', 'SOBIRIN', '2018-02-11 11:02:44', 1, '2018-02-11 11:02:44', 1),
(3, 'BPB.25022016.0002', '2016-02-25', 2, '', 'ANWAR', '2016-02-25 06:02:56', 1, '2016-02-25 06:02:56', 1),
(4, 'BPB.05112018.0001', '2018-11-05', 28, '', 'JOHN', '2018-11-05 03:11:37', 1, '2018-11-05 03:11:37', 1),
(5, 'BPB.05112018.0002', '2018-11-05', 29, '', 'MICHAEL', '2018-11-05 04:11:23', 1, '2018-11-05 04:11:23', 1),
(7, 'BPB.05112018.0004', '2018-11-05', 30, '', 'JON1', '2018-11-05 07:11:19', 1, '2018-11-05 07:11:19', 1),
(8, 'BPB.05112018.0005', '2018-11-05', 30, '', 'JON2', '2018-11-05 07:11:29', 1, '2018-11-05 07:11:29', 1),
(10, 'BPB.06112018.0002', '2018-11-06', 30, '', 'JON3', '2018-11-06 03:11:33', 1, '2018-11-06 03:11:33', 1),
(11, 'BPB.06112018.0003', '2018-11-06', 30, '', 'JON4', '2018-11-06 03:11:03', 1, '2018-11-06 03:11:03', 1),
(13, 'BPB.06112018.0005', '2018-11-06', 30, '', 'MICHAEL1', '2018-11-06 03:11:02', 1, '2018-11-06 03:11:02', 1),
(14, 'BPB.06112018.0006', '2018-11-06', 30, '', 'MICHAEL2', '2018-11-06 03:11:52', 1, '2018-11-06 03:11:52', 1),
(15, 'BPB.06112018.0007', '2018-11-06', 30, '', 'MICHAEL3', '2018-11-06 03:11:21', 1, '2018-11-06 03:11:21', 1),
(16, 'BPB.06112018.0008', '2018-11-06', 31, '', 'JONI', '2018-11-06 03:11:22', 1, '2018-11-06 03:11:22', 1),
(17, 'BPB.06112018.0009', '2018-11-06', 31, '', 'JONI2', '2018-11-06 03:11:28', 1, '2018-11-06 03:11:28', 1),
(18, 'BPB.06112018.0010', '2018-11-06', 31, '', 'JONI3', '2018-11-06 03:11:54', 1, '2018-11-06 03:11:54', 1),
(19, 'BPB.06112018.0011', '2018-11-06', 31, '', 'JONI4', '2018-11-06 03:11:15', 1, '2018-11-06 03:11:15', 1),
(20, 'BPB.22112018.0001', '2018-11-22', 33, '', 'JOHN', '2018-11-22 10:11:15', 1, '2018-11-22 10:11:15', 1),
(21, 'BPB.23112018.0001', '2018-11-23', 33, '', 'JOHN2', '2018-11-22 10:11:15', 1, '2018-11-22 10:11:15', 1),
(22, 'BPB.26112018.0001', '2018-11-26', 34, '', 'JOHN', '2018-11-26 11:11:19', 1, '2018-11-26 11:11:19', 1),
(25, 'BPB.28112018.0001', '2018-11-28', 37, '', 'BELLO', '2018-11-28 11:11:51', 1, '2018-11-28 11:11:51', 1),
(26, 'BPB.28112018.0002', '2018-11-28', 18, '', 'BELLON', '2018-11-28 11:11:17', 1, '2018-11-28 11:11:17', 1),
(27, 'BPB.28112018.0003', '2018-11-28', 18, '', 'BELLON2', '2018-11-28 11:11:26', 1, '2018-11-28 11:11:26', 1),
(28, 'BPB.28112018.0004', '2018-11-28', 38, '', 'BELLO', '2018-11-28 01:11:30', 1, '2018-11-28 01:11:30', 1),
(29, 'BPB.28112018.0005', '2018-11-28', 39, '', 'BELLON', '2018-11-28 01:11:18', 1, '2018-11-28 01:11:18', 1),
(30, 'BPB.201812.0001', '2018-12-04', 41, '', 'JOHN', '2018-12-04 03:12:01', 1, '2018-12-04 03:12:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lpb_detail`
--

CREATE TABLE `lpb_detail` (
  `id` int(11) NOT NULL,
  `lpb_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `sparepart_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `line_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpb_detail`
--

INSERT INTO `lpb_detail` (`id`, `lpb_id`, `po_detail_id`, `sparepart_id`, `qty`, `line_remarks`) VALUES
(1, 1, 3, 2, 2, ''),
(3, 3, 2, 1, 3, ''),
(4, 4, 42, 2, 20, 'TERIMA SEMUA'),
(5, 5, 43, 1, 50, 'MEMENUHI BUSI'),
(7, 7, 44, 2, 5, '1'),
(8, 8, 44, 2, 3, '2'),
(10, 10, 44, 2, 5, ''),
(11, 11, 44, 2, 2, ''),
(13, 13, 45, 1, 10, ''),
(14, 14, 45, 1, 5, ''),
(15, 15, 45, 1, 5, ''),
(16, 16, 46, 2, 5, ''),
(17, 16, 47, 1, 10, ''),
(18, 17, 46, 2, 10, ''),
(19, 17, 47, 1, 10, ''),
(20, 18, 46, 2, 5, ''),
(21, 19, 47, 1, 20, ''),
(22, 20, 48, 15, 5, ''),
(23, 20, 49, 14, 5, ''),
(24, 21, 48, 15, 5, ''),
(25, 22, 50, 3, 25, ''),
(26, 22, 51, 4, 5, ''),
(31, 25, 61, 5, 7, ''),
(32, 25, 62, 8, 2, ''),
(33, 26, 32, 2, 1, ''),
(34, 27, 33, 1, 1, ''),
(35, 28, 63, 16, 7, ''),
(36, 29, 64, 2, 3, ''),
(37, 30, 68, 14, 24, '');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `parent_id`, `alias`) VALUES
(1, 0, 'Controllers'),
(2, 1, 'Users'),
(3, 2, 'index'),
(4, 2, 'add'),
(5, 2, 'edit'),
(6, 2, 'delete'),
(7, 2, 'change_password'),
(8, 1, 'Groups'),
(9, 8, 'index'),
(10, 8, 'add'),
(11, 8, 'edit'),
(12, 8, 'delete'),
(13, 1, 'MAgen'),
(14, 13, 'index'),
(15, 13, 'add'),
(16, 13, 'edit'),
(17, 13, 'delete'),
(18, 1, 'MBiaya'),
(19, 18, 'index'),
(20, 18, 'add'),
(21, 18, 'edit'),
(22, 18, 'delete'),
(23, 1, 'MCities'),
(24, 23, 'index'),
(25, 23, 'add'),
(26, 23, 'edit'),
(27, 23, 'delete'),
(28, 1, 'MKendaraan'),
(29, 28, 'index'),
(30, 28, 'add'),
(31, 28, 'edit'),
(32, 28, 'delete'),
(33, 1, 'MMuatan'),
(34, 33, 'index'),
(35, 33, 'add'),
(36, 33, 'edit'),
(37, 33, 'delete'),
(38, 1, 'MNumberings'),
(39, 38, 'index'),
(40, 38, 'add'),
(41, 38, 'edit'),
(42, 38, 'delete'),
(43, 1, 'MProvinces'),
(44, 43, 'index'),
(45, 43, 'add'),
(46, 43, 'edit'),
(47, 43, 'delete'),
(48, 1, 'MTypeKendaraan'),
(49, 48, 'index'),
(50, 48, 'add'),
(51, 48, 'edit'),
(52, 48, 'delete'),
(53, 1, 'BeliSparePart'),
(54, 53, 'index'),
(55, 53, 'add'),
(56, 53, 'delete'),
(57, 53, 'edit'),
(58, 53, 'delete_detail'),
(59, 53, 'view'),
(60, 53, 'approve'),
(61, 53, 'reject'),
(62, 53, 'create_po'),
(63, 53, 'po_list'),
(64, 53, 'print_po'),
(65, 53, 'create_lpb'),
(66, 53, 'bpb_list'),
(67, 53, 'print_bpb'),
(68, 53, 'create_voucher'),
(69, 53, 'view_po'),
(70, 53, 'close_po'),
(71, 53, 'voucher_list'),
(72, 1, 'BeliRongsok'),
(73, 72, 'index'),
(74, 72, 'add'),
(75, 72, 'edit'),
(76, 72, 'print_po'),
(77, 72, 'create_dtr'),
(78, 72, 'dtr_list'),
(79, 72, 'print_dtr'),
(80, 72, 'matching'),
(81, 72, 'proses_matching'),
(82, 72, 'approve'),
(83, 72, 'reject'),
(84, 72, 'edit_dtr'),
(85, 72, 'create_ttr'),
(86, 72, 'ttr_list'),
(87, 72, 'print_ttr'),
(88, 72, 'create_voucher_dp'),
(89, 72, 'create_voucher_pelunasan'),
(90, 72, 'close_po'),
(91, 72, 'voucher_list'),
(92, 72, 'review_ttr'),
(93, 72, 'approve_ttr'),
(94, 72, 'reject_ttr'),
(95, 1, 'PengirimanAmpas'),
(96, 95, 'index'),
(97, 95, 'add'),
(98, 95, 'edit'),
(99, 95, 'add_detail'),
(100, 95, 'delete_detail'),
(101, 95, 'print_po'),
(102, 95, 'create_dtr'),
(103, 95, 'dtr_list'),
(104, 95, 'print_dtr'),
(105, 95, 'surat_jalan'),
(106, 95, 'add_surat_jalan'),
(107, 95, 'edit_surat_jalan'),
(108, 95, 'add_detail_surat_jalan'),
(109, 95, 'edit_detail_surat_jalan'),
(110, 95, 'print_surat_jalan'),
(111, 1, 'Tolling'),
(112, 111, 'index'),
(113, 111, 'add'),
(114, 111, 'edit'),
(115, 111, 'add_detail'),
(116, 111, 'delete_detail'),
(117, 111, 'print_so'),
(118, 111, 'create_dtr'),
(119, 111, 'dtr_list'),
(120, 111, 'print_dtr'),
(121, 111, 'view_dtr'),
(122, 111, 'approve'),
(123, 111, 'reject'),
(124, 111, 'edit_dtr'),
(125, 111, 'create_ttr'),
(126, 111, 'ttr_list'),
(127, 111, 'print_ttr'),
(128, 111, 'produksi_ampas'),
(129, 111, 'add_produksi_ampas'),
(130, 111, 'edit_produksi_ampas'),
(131, 111, 'add_detail_produksi_ampas'),
(132, 111, 'delete_detail_produksi_ampas'),
(133, 111, 'surat_jalan'),
(134, 111, 'add_surat_jalan'),
(135, 111, 'edit_surat_jalan'),
(136, 111, 'add_detail_surat_jalan'),
(137, 111, 'delete_detail_surat_jalan'),
(138, 111, 'print_surat_jalan'),
(139, 1, 'IngotRendah'),
(140, 139, 'index'),
(141, 139, 'add'),
(142, 139, 'edit'),
(143, 139, 'add_detail'),
(144, 139, 'delete_detail'),
(145, 139, 'print_po'),
(146, 139, 'create_dtr'),
(147, 139, 'dtr_list'),
(148, 139, 'print_dtr'),
(149, 139, 'create_ttr'),
(150, 139, 'ttr_list'),
(151, 139, 'print_ttr'),
(152, 139, 'create_voucher_piutang'),
(153, 1, 'RollingKawatHitam'),
(154, 153, 'index'),
(155, 153, 'add'),
(156, 153, 'edit'),
(157, 153, 'add_detail'),
(158, 153, 'delete_detail'),
(159, 153, 'print_spb'),
(160, 153, 'create_skb'),
(161, 153, 'skb_list'),
(162, 153, 'print_skb'),
(163, 153, 'hasil_produksi'),
(164, 153, 'add_produksi'),
(165, 153, 'edit_produksi'),
(166, 153, 'add_detail_produksi'),
(167, 153, 'delete_detail_produksi'),
(168, 153, 'view_spb'),
(169, 153, 'approve_spb'),
(170, 153, 'reject_spb'),
(171, 1, 'CuciKawatHitam'),
(172, 168, 'index'),
(173, 168, 'add'),
(174, 168, 'edit'),
(175, 168, 'add_detail'),
(176, 168, 'delete_detail'),
(177, 168, 'print_spb'),
(178, 168, 'create_skb'),
(179, 168, 'skb_list'),
(180, 168, 'print_skb'),
(181, 168, 'create_dtr'),
(182, 168, 'dtr_list'),
(183, 168, 'print_dtr'),
(184, 168, 'create_ttr'),
(185, 168, 'ttr_list'),
(186, 168, 'print_ttr'),
(187, 168, 'view_spb'),
(188, 168, 'approve_spb'),
(189, 168, 'reject_spb'),
(190, 1, 'PengirimanSample'),
(191, 184, 'index'),
(192, 184, 'add'),
(193, 184, 'edit'),
(194, 184, 'add_detail'),
(195, 184, 'delete_detail'),
(196, 184, 'print_rs'),
(197, 184, 'create_skb'),
(198, 184, 'skb_list'),
(199, 184, 'print_skb'),
(200, 184, 'surat_jalan'),
(201, 184, 'add_surat_jalan'),
(202, 184, 'edit_surat_jalan'),
(203, 184, 'add_detail_surat_jalan'),
(204, 184, 'delete_detail_surat_jalan'),
(205, 184, 'print_surat_jalan'),
(206, 1, 'Ingot'),
(207, 200, 'index'),
(208, 200, 'add'),
(209, 200, 'edit'),
(210, 200, 'add_detail'),
(211, 200, 'delete_detail'),
(212, 200, 'create_spb'),
(213, 200, 'spb_list'),
(214, 200, 'view_spb'),
(215, 200, 'approve_spb'),
(216, 200, 'reject_spb'),
(217, 200, 'edit_spb'),
(218, 200, 'print_spb'),
(219, 200, 'create_skb'),
(220, 200, 'skb_list'),
(221, 200, 'print_skb'),
(222, 200, 'hasil_produksi'),
(223, 200, 'add_produksi'),
(224, 200, 'edit_produksi'),
(225, 200, 'add_detail_produksi'),
(226, 200, 'edit_detail_produksi'),
(227, 1, 'retur'),
(228, 227, 'index'),
(229, 227, 'add'),
(230, 227, 'edit'),
(231, 227, 'delete'),
(232, 227, 'load_detail'),
(233, 227, 'add_detail'),
(234, 227, 'delete_detail'),
(235, 227, 'print_dtr'),
(236, 227, 'create_ttr'),
(237, 227, 'ttr_list'),
(238, 227, 'print_ttr'),
(239, 227, 'create_request_barang'),
(240, 227, 'edit_request_barang'),
(241, 227, 'load_detail_request_barang'),
(242, 227, 'add_detail_request_barang'),
(243, 227, 'delete_detail_request_barang'),
(244, 227, 'request_barang_list'),
(245, 227, 'view'),
(246, 227, 'approve'),
(247, 227, 'reject');

-- --------------------------------------------------------

--
-- Table structure for table `m_agen`
--

CREATE TABLE `m_agen` (
  `id` int(11) NOT NULL,
  `nama_agen` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pic` varchar(75) NOT NULL,
  `telepon` varchar(75) NOT NULL,
  `jenis_agen` varchar(5) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_agen`
--

INSERT INTO `m_agen` (`id`, `nama_agen`, `alamat`, `pic`, `telepon`, `jenis_agen`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'GUNANTO', 'LAMPUNG TENGAH', 'GUNANTO', '087880813730', 'Luar', '2017-10-01 11:10:36', 1, '2017-10-01 11:10:36', 1),
(2, 'WASKITO', 'LAMPUNG BARAT', 'WASKITO', '087880812880', 'Lokal', '2017-10-01 11:10:15', 1, '2017-10-01 11:10:15', 1),
(3, 'RIANTI', 'JAKARTA', 'RIANTI', '021-87908790', 'Luar', '2017-10-01 11:10:43', 1, '2017-10-01 11:10:43', 1),
(4, 'CV MAJU LANCAR', 'JAKARTA', 'JESSICA', '021-879087978', 'Luar', '2017-10-01 02:10:19', 1, '2017-10-01 02:10:19', 1),
(5, 'DANU WIJAYA', 'LAMPUNG BARAT', 'TABRI', '087880812871', 'Lokal', '2017-10-04 01:10:58', 1, '2017-10-04 01:10:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_biaya`
--

CREATE TABLE `m_biaya` (
  `id` int(11) NOT NULL,
  `jenis_transaksi` varchar(100) NOT NULL,
  `nama_biaya` varchar(255) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `type_biaya` varchar(4) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `jumlah` double NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_biaya`
--

INSERT INTO `m_biaya` (`id`, `jenis_transaksi`, `nama_biaya`, `kategori`, `parameter`, `keterangan`, `type_biaya`, `satuan`, `jumlah`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'PEMBELIAN SINGKONG', 'HARGA SINGKONG', 'Harga Item', 'jenis_agen=Lokal', 'HARGA SINGKONG UNTUK AGEN LOKAL', 'Qty', 'Kg', 560, '2017-10-01 10:10:37', 1, '2017-10-15 08:10:11', 1),
(2, 'PEMBELIAN SINGKONG', 'HARGA SINGKONG', 'Harga Item', 'jenis_agen=Luar', 'HARGA SINGKONG UNTUK AGEN LUAR', 'Qty', 'Kg', 525, '2017-10-01 10:10:57', 1, '2017-10-15 08:10:22', 1),
(3, 'PEMBELIAN SINGKONG', 'ONGKOS BONGKAR', 'Ongkos', 'type_kendaraan=TRUCK ENGKEL', 'ONGKOS BONGKAR SINGKONG UNTUK KENDARAAN SELAIN DUMP TRUCK', 'Qty', 'Kg', 6, '2017-10-08 04:10:11', 1, '2017-10-08 05:10:42', 1),
(4, 'PEMBELIAN SINGKONG', 'BONUS SUPIR', 'Ongkos', 'jenis_agen=Lokal', 'BONUS SUPIR TRUCK MUATAN SINGKONG KHUSUS AGEN LOKAL', 'Qty', 'Kg', 20, '2017-10-08 04:10:32', 1, '2017-10-08 05:10:01', 1),
(5, 'PEMBELIAN SINGKONG', 'ONGKOS BONGKAR', 'Ongkos', 'type_kendaraan=CRIST GROUP', '', 'Qty', 'Kg', 6, '2017-10-08 05:10:27', 1, '2017-10-08 05:10:27', 1),
(6, 'PEMBELIAN CANGKANG', 'HARGA CANGKANG', 'Harga Item', '', '', 'Qty', 'Kg', 100, '2017-10-10 02:10:21', 1, '2017-10-10 02:10:21', 1),
(7, 'PEMBELIAN CANGKANG', 'ONGKOS BONGKAR CANGKANG', 'Ongkos', '', 'ONGKOS BURUH/ KULI UNTUK BONGKAR MUATAN CANGKANG', 'Qty', 'Kg', 7, '2017-10-10 02:10:52', 1, '2017-10-10 10:10:02', 1),
(8, 'PAKAI CANGKANG', 'ONGKOS SOPIR', 'Ongkos', '', 'ONGKOS SUPIR INTERNAL PABRIK UNTUK PAKAI CANGKANG', 'Qty', 'Kg', 3, '2017-10-10 10:10:06', 1, '2017-10-10 11:10:43', 1),
(9, 'PAKAI CANGKANG', 'ONGKOS BONGKAR CANGKANG', 'Ongkos', '', 'ONGKOS BURUH/KULI UNTUK BONGKAR MUATAN CANGKANG', 'Qty', 'Kg', 7, '2017-10-10 10:10:02', 1, '2017-10-10 10:10:02', 1),
(10, 'PEMBELIAN MERAH', 'HARGA MERAH', 'Harga Item', '', '', 'Qty', 'Kg', 1500, '2017-10-10 01:10:16', 1, '2017-10-10 01:10:16', 1),
(11, 'PROSES OVEN', 'ONGKOS KULI OVEN SAK 25 KG', 'Ongkos', 'sak=25', 'ONGKOS KULI OVEN UNTUK SAK 25 KG', 'Qty', 'Sak', 1000, '2017-10-11 03:10:19', 1, '2017-10-11 04:10:18', 1),
(12, 'PROSES OVEN', 'ONGKOS KULI OVEN SAK 50 KG', 'Ongkos', 'sak=50', 'ONGKOS KULI OVEN UNTUK SAK 50 KG', 'Qty', 'Sak', 1240, '2017-10-11 03:10:20', 1, '2017-10-11 03:10:20', 1),
(13, 'PROSES OVEN', 'ONGKOS KIRIM KULI OVEN', 'Ongkos', 'oven=1', '', 'Qty', 'Sak', 1070, '2017-10-11 03:10:49', 1, '2017-10-11 04:10:52', 1),
(14, 'PROSES OVEN', 'ONGKOS KIRIM KULI OVEN', 'Ongkos', 'oven=2', '', 'Qty', 'Sak', 1070, '2017-10-11 03:10:39', 1, '2017-10-11 03:10:39', 1),
(15, 'PENJUALAN', 'HARGA SAGU PULAU', 'Harga Item', 'sak=25', 'HARGA SAGU PULAU UNTUK SAK 25 KG', 'Qty', 'Sak', 125000, '2017-10-12 02:10:27', 1, '2017-10-12 02:10:27', 1),
(16, 'PENJUALAN', 'HARGA SAGU PULAU', 'Harga Item', 'sak=50', 'HARGA SAGU PULAU UNTUK SAK 50 KG', 'Qty', 'Sak', 240000, '2017-10-12 02:10:19', 1, '2017-10-12 02:10:19', 1),
(17, 'PENJUALAN', 'HARGA SAGU KWR', 'Harga Item', 'sak=25', 'HARGA SAGU KWR UNTUK SAK 25 KG', 'Qty', 'Sak', 122000, '2017-10-12 02:10:15', 1, '2017-10-12 02:10:15', 1),
(18, 'PENJUALAN', 'HARGA SAGU KWR', 'Harga Item', 'sak=50', 'HARGA SAGU KWR UNTUK SAK 50 KG', 'Qty', 'Sak', 135000, '2017-10-12 02:10:50', 1, '2017-10-12 02:10:50', 1),
(19, 'PENJUALAN', 'HARGA SAGU PH', 'Harga Item', 'sak=25', 'HARGA SAGU PH UNTUK SAK 25 KG', 'Qty', 'Sak', 124000, '2017-10-12 02:10:52', 1, '2017-10-12 02:10:52', 1),
(20, 'PENJUALAN', 'HARGA SAGU PH', 'Harga Item', 'sak=50', 'HARGA SAGU PH UNTUK SAK 50 KG', 'Qty', 'Sak', 220000, '2017-10-12 02:10:36', 1, '2017-10-12 02:10:36', 1),
(21, 'PENJUALAN', 'HARGA SAGU POLOS', 'Harga Item', 'sak=25', 'HARGA SAGU POLOS UNTUK SAK 25 KG', 'Qty', 'Sak', 118000, '2017-10-12 02:10:33', 1, '2017-10-12 02:10:33', 1),
(22, 'PENJUALAN', 'HARGA SAGU POLOS', 'Harga Item', 'sak=50', 'HARGA SAGU POLOS UNTUK SAK 50 KG', 'Qty', 'Sak', 228000, '2017-10-12 02:10:08', 1, '2017-10-12 02:10:08', 1),
(23, 'PENJUALAN SAGU', 'ONGKOS MUAT PENJUALAN', 'Ongkos', 'sak=25', 'ONGKOS KULI MUAT SAGU UNTUK SAK 25 KG', 'Qty', 'Sak', 100, '2017-10-13 08:10:10', 1, '2017-10-13 08:10:10', 1),
(24, 'PENJUALAN SAGU', 'ONGKOS MUAT PENJUALAN', 'Ongkos', 'sak=50', 'ONGKOS KULI MUAT SAGU UNTUK SAK 50 KG', 'Qty', 'Sak', 220, '2017-10-13 08:10:53', 1, '2017-10-13 08:10:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_biaya_detail`
--

CREATE TABLE `m_biaya_detail` (
  `id` int(11) NOT NULL,
  `m_biaya_id` int(11) NOT NULL,
  `jenis_transaksi` varchar(100) NOT NULL,
  `nama_biaya` varchar(255) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `type_biaya` varchar(4) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `jumlah` double NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_biaya_detail`
--

INSERT INTO `m_biaya_detail` (`id`, `m_biaya_id`, `jenis_transaksi`, `nama_biaya`, `kategori`, `parameter`, `keterangan`, `type_biaya`, `satuan`, `jumlah`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 2, 'PEMBELIAN SINGKONG', 'HARGA SINGKONG', 'Harga Item', 'jenis_agen=Luar', 'HARGA SINGKONG UNTUK AGEN LUAR', 'Qty', 'Kg', 550, '2017-10-15 08:10:22', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin`
--

CREATE TABLE `m_bobbin` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nomor_bobbin` varchar(30) NOT NULL,
  `m_jenis_packing_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `borrowed_by` int(11) NOT NULL,
  `m_bobbin_size_id` int(11) NOT NULL,
  `berat` float NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` int(11) DEFAULT NULL,
  `modified_by` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bobbin`
--

INSERT INTO `m_bobbin` (`id`, `tanggal`, `nomor_bobbin`, `m_jenis_packing_id`, `owner_id`, `borrowed_by`, `m_bobbin_size_id`, `berat`, `barcode`, `status`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(18, '2018-10-24', 'L0008', 1, 1, 0, 1, 12, '', 0, '2018-10-24 12:36:35', 1, NULL, NULL),
(19, '2018-10-24', 'M0009', 1, 2, 0, 2, 12.932, '', 0, '2018-10-24 12:36:59', 1, NULL, NULL),
(20, '2018-10-25', 'A0010', 3, 2, 0, 9, 0, '', 0, '2018-10-25 13:54:42', 1, NULL, NULL),
(21, '2018-10-25', 'B0011', 3, 2, 0, 10, 0, '', 0, '2018-10-25 13:55:02', 1, NULL, NULL),
(22, '2018-10-25', 'C0012', 3, 2, 0, 11, 0, '', 0, '2018-10-25 13:55:18', 1, NULL, NULL),
(23, '2018-10-25', 'P0005', 2, 2, 0, 5, 8.65, '', 0, '2018-10-25 13:55:45', 1, NULL, NULL),
(24, '2018-10-25', 'Q0003', 2, 2, 0, 6, 7.98, '', 0, '2018-10-25 13:55:57', 1, NULL, NULL),
(25, '2018-10-25', 'J0002', 2, 2, 0, 7, 9.71, '', 0, '2018-10-25 13:56:22', 1, NULL, NULL),
(26, '2018-10-25', 'R0001', 4, 2, 0, 8, 0, '', 0, '2018-10-25 14:51:17', 1, NULL, NULL),
(27, '2018-10-25', 'L0013', 1, 2, 0, 1, 7.88, '', 0, '2018-10-25 14:55:05', 1, NULL, NULL),
(28, '2018-10-26', 'L0014', 1, 2, 0, 1, 17.34, '', 0, '2018-10-26 12:44:53', 1, NULL, NULL),
(29, '2018-11-26', 'S0015', 1, 2, 0, 3, 11.84, '', 0, '2018-11-26 11:06:17', 1, NULL, NULL),
(30, '2018-11-27', 'A0016', 3, 2, 0, 9, 10, '', 0, '2018-11-27 17:31:21', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_size`
--

CREATE TABLE `m_bobbin_size` (
  `id` int(11) NOT NULL,
  `bobbin_size` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `penomoran` tinyint(1) NOT NULL DEFAULT '0',
  `jenis_packing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bobbin_size`
--

INSERT INTO `m_bobbin_size` (`id`, `bobbin_size`, `keterangan`, `penomoran`, `jenis_packing_id`) VALUES
(1, 'L', 'LARGE', 0, 1),
(2, 'M', 'MEDIUM', 0, 1),
(3, 'S', 'SMALL', 0, 1),
(4, 'T', 'TEMBAGA', 0, 1),
(5, 'P', 'KERANJANG P', 1, 2),
(6, 'Q', 'KERANJANG Q', 1, 2),
(7, 'J', 'KERANJANG J', 1, 2),
(8, 'R', 'ROLL', 1, 4),
(9, 'A', 'KARDUS A', 0, 3),
(10, 'B', 'KARDUS B', 0, 3),
(11, 'C', 'KARDUS C', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_status`
--

CREATE TABLE `m_bobbin_status` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_cities`
--

CREATE TABLE `m_cities` (
  `id` int(11) NOT NULL,
  `city_code` varchar(10) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `m_province_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_cities`
--

INSERT INTO `m_cities` (`id`, `city_code`, `city_name`, `m_province_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'BTA', 'BATURAJA', 1, '2017-10-05 03:10:47', 1, '2017-10-05 03:10:47', 1),
(2, 'MPA', 'MARTAPURA', 1, '2017-10-05 03:10:03', 1, '2017-10-05 03:10:03', 1),
(3, 'BTM', 'BATUMARTA', 1, '2017-10-05 03:10:20', 1, '2017-10-05 03:10:20', 1),
(4, 'DPK', 'DEPOK', 7, '2017-10-05 03:10:35', 1, '2017-10-05 03:10:35', 1),
(5, 'CRB', 'CIREBON', 7, '2017-10-05 03:10:51', 1, '2017-10-05 03:10:51', 1),
(6, 'SRG', 'SEMARANG', 9, '2017-10-05 04:10:49', 1, '2017-10-05 04:10:49', 1),
(7, 'SBY', 'SURABAYA', 8, '2017-10-05 04:10:03', 1, '2017-10-05 04:10:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_customers`
--

CREATE TABLE `m_customers` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(150) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `m_province_id` int(11) NOT NULL,
  `m_city_id` int(11) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `m_bank_id` int(11) NOT NULL,
  `kcp` varchar(50) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_customers`
--

INSERT INTO `m_customers` (`id`, `nama_customer`, `pic`, `telepon`, `hp`, `alamat`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'RUSDI', 'RUSDI', '0735 808137', '', 'JL. MERPATI NO.72', 1, 1, '', 0, '', '', '', '2017-10-05 05:10:16', 1, '2017-10-05 05:10:16', 1),
(2, 'CV. ANGIN RIBUT', 'AGUS', '022-8909123', '', 'JLN. ASPAL TEBAL NO.22', 7, 4, '', 3, 'SUNTER', '200901', '', '2017-10-05 05:10:23', 1, '2018-01-24 08:01:44', 1),
(3, 'TRADECO', 'ERGAN', '021 387485', '', 'JALAN RAYA BOGOR', 7, 4, '', 3, 'CIMANGGIS', '200902', '', '2018-11-13 12:11:55', 1, '2018-11-13 12:11:06', 1),
(4, 'A001 - ANEKA KABEL ELEKTRIK, P. T.', 'SAMSUDIN', '', '', 'Jl. Raya Serang KM 60 Leuwilimus RT/RW : 07/03 Cikande Serang .\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'A002 - ARIES KABEL INDONESIA, P. T.', 'GONDO', '', '', 'Wisma Sejahtera Jl. Letjen S. Parman Kav. 75 Jakarta\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'A003 - ATLANTIK KARYA MANUNGGAL, P.T.', 'YUSMIN', '', '', 'Jl. Kepa Duri Mas Blok XX No. 28 Jakarta Barat\r\n\r\narat\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'A004 - ANAM, P. T.', 'ANAM', '', '', 'Jl. Prepedan RT/RW : 06/07 No. 26 Kamal Kali Deres Jakarta barat.\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'A005 - AYUNG', '', '', '', 'Jl. Prepedan 3 No. 38 Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'A006 - ANUGRAH JAYA LESTARI, C. V.', '', '', '', 'Pergudangan Dadap Indah Blok BH No.45 Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'A007 - ALPHA RADIANT, P. T.', '', '', '', 'Pondok Gede Jakarta Timur\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'A008 - ALCARINDO PRIMA, P. T.', 'YOGI', '', '', 'Jl. Tapir, Cakung KM 3,3 Sukapura Cilincing Jakarta Utara\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'A009 - ANGKA WIJAYA SAKTI', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'A010 - ATIKA', 'HENDRA KLOVA', '', '999999999', '12345', 7, 4, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '2018-11-22 09:11:45', 1),
(14, 'A011 - ABD. ROHMAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'A012 - ALUM CENTRAL MANDIRI LESTARI, P. T.', '', '', '', 'Desa Kaluwung No.8 Kelurahan Cisereh Kecamatan Tigar\r\naksa Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'A013 - APOLLO', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'A014 - ALPHA TRANS CABLE, P. T.', 'BP. DEWA ', '', '', 'JL. DJATI RAYA 3 A RAWAMANGUN, JAKARTA TIMUR. 13220.\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'A015 - ANTAR NUSA SAKTI JAYA, P.T.', ' ', '', '', 'JL. RAYA SALEMBARAN NO. 1 RT 37 RW 18\r\nKP. GARDU, KOSAMBI TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 'A016 - ANGGUN, TN', '', '', '', 'TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'A017 - AGUS SALIM', '', '', '', 'TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'A018 - AUTORINDO SUKSES MANDIRI, P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'A019 - ALI RINDHO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'A020 - AULIA AZIZA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'B001 - BAJA MAS, P.T.', '', '', '', '\r\nTegal Alur No. 83 Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 'B002 - BICC BERCA CABLES, P. T.', '', '', '', 'Jl. Raya Serang KM. 28 Cangkudu Balaraja Tangerang Bnaten', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'B003 - BERKAH KEDIRI, U. D.', '', '', '', 'Jl. Cokro Aminoto 79 Kediri\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'B004 - BAGUS ACCES MULTI SARANA, P. T.', '', '', '', 'Jl. 8 Kecamatan Cicurug Sukabumi Jawa Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'B005 - BERKAH LOGAM MAKMUR, PT.', '', '', '', 'Jl. Industri Raya III Blok AF No. 1-2, Bunder, Cikupa. Kabupaten Tangerang, Banten\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'B006 - BILLY SETIAWAN', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 'B007 - BAGUS RAHARDJO', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'C001 - CAHAYA ANGKASA ABADI, P. T.', 'HADI', '', '', 'JL. BERBEK INDUSTRI NO.06, BERBEK, WARU SIDOARJO, JAWA TIMUR\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 'C002 - CITRA HANDAL PERKASA, P. T.', 'APIO', '', '', 'Kp.Cikupa RT/RW ; 01/01 Suka Mulya Cikupa Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 'C003 - CIKUPA MEGAH KENCANA, P. T.', '', '', '', 'Jl. Raya Tangerang Serang KM 11 Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'C004 - CHEN. MR', 'MR. CHEN', '', '', 'TANGERANG\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'C005 - CHEN HSI FA INTERNATIONAL CO, LTD.', '', '', '', 'No. 2 LANE 192 GAO FUNG RD., HSIN CHU CITY, TAIWAN, R. O. C.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'C006 - CHANG MING ENVIROR MENT PROTECTION CO, LTD.', '', '', '', '1F No.8, Lane156, Shou Tsuo 1 ST, FU Hsing Hsiang, Chang HuaHsien, Taiwan R> O. ', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'C007 - CENTRAL MULTI PRIMA, P. T.', 'BP. HADI', '', '', 'Jl. Anggrek 1 No. 34 RT 010/01 Karet Kuningan Jakarta Selatan.\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'C008 - CUCI', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'C009 - COI SANJAYA', '', '', '', '\r\nJAKARTA.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 'C010 - CHEN HSI JAYA PERKASA, P. T.', '', '', '', 'JL. BARU PASAR KEMIS, KAWASAN INDUSTRI KERONCONG, NO. 8 JATIUWUNG - TANGERANG.', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 'C011 - CORNELIS', '', '', '', 'BOGOR\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 'C012 - CENTRAL WIRE INDUSTRIAL, P.T.', '', '', '', 'Jl. Rungkut Industri Raya 17-A Surabaya\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 'C013 - CRIS', '', '', '', 'Semarang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 'C014 - COSCO ELECTRIC, PT.', '', '', '', 'Jl. Kijang Selatan No. 8 Semarang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 'D001 - DUNIA BARU, P. T.', '', '', '', 'Jl. Raya Prancis Perum Dadap Indah B 9/9 Kosambi Tangerang.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 'D002 - DALTO ELECTRINDO, P. T. ', '', '', '', 'Kawasan Industri Jababeka, Phase II, Jl. Industri Selatan Blok PP-2E\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 'E001 - ERA MITRA, P. T.', 'IBU ANA', '', '', 'Jl. Prepedan Dalam No. 3 Jakarta Barat.\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 'E002 - ENDANG', '', '', '', 'TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 'F001 - FURIN JAYA, P. T.', 'WIWI', '', '', 'Jl. Bidara No. 30 A Jelambar Dalam II Jakarta\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 'F003 - FU YUAN METAL CO, LTD', '', '', '', '15 Lane 37 DA Wei Road Dali City Taichung Taiwan\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 'F004 - FIRST BASE CO., LTD', '', '', '', '\r\nIF, NO.14, ALLEY 5, LANE 182, SEC 5 NANJHU RD, LUJHU OWNSHIP.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 'F005 - FAJAR ZIPPINDO, P. T. ', '', '', '', '\r\nJl. Daan Mogot KM. 19 Kp. Rawa Bamban No. 22 RT.006 RW. 003 Jurumudi Baru.\r\n ', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, 'F006 - FEDERAL MARDHIKA CITRAMANDIRI, P.T.', '', '', '', 'JL. Tajung Udik Gunung Putri Bogor\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, 'F007 - FHOSAN NANHAI HENGYE TRADING CO.', 'MS. YE/ MS.HO.', '', '', 'STORE 23, BL HEJI GARDEN, HAILIU RD, GUICHANG, NANHAI DISTRICT,  FHOSAN CITY, GUANGDONG PROVINCE, CHINA.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 'G001 - GALAXY PERSADA, P. T.', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 'G002 - GANAMAS PRIMA, P. T.', '', '', '', 'Kp. Ciketing Udik Pangkalan V Bantar Gebang Bekasi\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, 'G999 - GUDANG RONGSOK', 'DIANA', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, 'H001 - HENCOTAMA DINAMIKA, P. T.', '', '', '', 'Jl. Pademangan IV RT 14/01 Jakarta Utara\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, 'H003 - HIDUP LANCAR SEJAHTERA, P. T.', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 'H004 - HSIANG YUEH METALS CO,. LTD', '', '', '', '1 F , No. 14, Alley 5, Lane 182, SEC 5 Nanjhu RD,Lujhu Township\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 'H005 - HENDRA', '', '', '', 'JAKARTA\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 'H006 - HALIM', 'BP. HALIM', '', '', 'SURABAYA\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 'H007 - HANWA THAILAND CO, LTD.', 'MR. ASAI/MR. YAMADA/ MR. OE', '', '', '12 TH FLOOR UNIT 1204 Q. HOUSE LUMPIN, BLD. ISOUTH SATHORN ROAD. TUNGMA HAMEK. SATHORN BANGKOK 10120. THAILAND.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 'H008 - HABINDO SATRIA PERKASA, P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 'H010 - H. ABD. IBROHIM', 'BP. IBROHIM', '', '', 'TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 'H011 - HERI', 'HERI', '', '', 'TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 'H012 - HAKIMAN', 'HAKIMAN', '', '', 'KLOUSTER RIVIERA NO. 15 PALEM SEMI TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, 'H013 - HANWA ROYAL METALS, PT.', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 'H014 - HUTAMA CIPTA SENTOSA, PT.', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 'H015 - HARYANTO', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 'I001 - INTIMETALINDO SUKSES, P. T.', '', '', '', 'Jl. Kp. Bulakan RT/RW : 010/002 Bitung Jaya-Cikupa Tangerang.\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 'I002 - INDOKA JAYA, P. T.', '', '', '', 'Kawasan Industri Manis II No. 25 Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 'I003 - INTIMITRA MANDIRI, P. T.', '', '', '', 'Jakarta\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, 'I004 - INDRA ERAMULTI  INDUSTRI', '', '', '', 'Komp. Daan Mogot Baru Jl. Utan Jati b No. 12a Jakarta Barat 11840 Indonesia\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, 'I005 - INTI KARYA PRATAMA, P. T', '', '', '', 'PERDAGANGAN PANTAI INDAH DADAP BB NO. 35 TANGERANG.\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, 'I006 - INTAN SAMUDRA RAYA, CV', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, 'I007 - INCAP ALTIN UTAMA, P.T.', '', '', '', 'Jl. Rawa Bali II/9 Kawasan Industri Pulo Gadung Jakarta', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, 'I008 - INTIKARYA PERMAI, PT.', '', '', '', 'Pergudangan Centra Kosambi Blok I 2/28 Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, 'I009 - INDRA', '', '', '', 'JAKARTA\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, 'J001 - JASHA LESTARI MANDIRI, P. T.', '', '', '', 'Jl. Melati RT/RW ; 028/008 Wanaherang Gunung Putri Kab. Bogor Jawa Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, 'J002 - JAWA INDAH, P. T.', '', '', '', 'Jl. Raya Satelit Utara \r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, 'J003 - JAKARTA PLASTIK, P. T.', '', '', '', 'Jl. Mangobi Kapuk Muara Jakarta Barat\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, 'J004 - JIUN JIH ENTERPRISE CO., LTD ', '', '', '', 'No.30, Lane 465,SEC.2,Jhongshan RD, Pan-Chiao City Taipei County, Taiwan ROC\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, 'J005 - JOY (BENGKEL  ENDAH)', 'JOY', '', '', 'PADALARANG BANDUNG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, 'J006 - JOHANA SAERAN', '', '', '', 'JAKARTA\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(86, 'J007 - JOHN RANTUNG', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(87, 'J008 - JACKTOR', '', '', '', 'KEPADURI JAKARTA BARAT\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(88, 'K001 - KEPOH MANDIRI ELEKTRIKATAMA, P. T. ', '', '', '', 'Per. Harapan Indah Blok OF No. 12 RT/RW :007/017 Pejuang Bekasi Barat 17131\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(89, 'K002 - KARUNIA ELECTRINDO, P. T.', '', '', '', 'Muara Karang Blok B Vi Utara Jakarta Utara\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(90, 'K003 - KITCO INTERNATIONAL METALSS CO,. LTD', '', '', '', 'No.2 Lane 192, Gao Fung  RD., HSIN CHU City, Taiwan, ROC\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(91, 'K004 - KARUNIA JAMBU DIPA', 'AAN', '', '', 'CIMAHI, BANDUNG.\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(92, 'K005 - KERAMIK INDAH, PT.', '', '', '', 'TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(93, 'K006 - KARYA INDO TUNGGAL ABADI. PT.', '', '', '', 'Jl. Manukan Wetan No. 60 Blok D 34 Tandes Surabaya\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(94, 'L001 - LEO', '', '', '', 'Jl. Raya Telajung Udik Gunung Putri Bogor.\r\n\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(95, 'L002 - LOGAM NIAGA, C.V.', '', '', '', 'SERPONG. TANGERANG-BANTEN\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(96, 'L999 - LAIN-LAIN', 'DIANA', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(97, 'M001 - MAKITA MEGA MAKMUR PERKASA, P. T.', 'PRAWIRA', '', '', 'Jl. Jababeka III C 18-AB Cikarang.\r\n\r\nHarco Mangga Dua Blok M 20 Sunter Jakarta ', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(98, 'M002 - MUSTIKA, P. T. ', 'AMIANG', '', '', 'Komplek Metro Blok M Sunter Jakarta\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(99, 'M003 - MULIA JADI JAKARTA, P. T.', '', '', '', 'Jl. Abadi No. 1 Daan Mogot KM 19,80 Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(100, 'M004 - MITRATAMA SEJATI, P. T.', 'YANSEN', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(101, 'M005 - MEGA KABEL, P. T.', '', '', '', '\r\nKomplek Pergudangan Miami Blok D No. 3 Kapuk Jakarta Barat.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(102, 'M006 - MANDIRI JAYA KABELINDO, P. T.', '', '', '', 'Jl. Kapuk Muara RT/RW:007/001 Kapuk Muara Penjaringan Jakarta \r\n \r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(103, 'M007 - MANDANI', '', '', '', 'Glodok Plaza Blok F/29 Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(104, 'M008 - MAGMA ELEKTRIK, P. T.', '', '', '', 'Kapuk Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(105, 'M009 - MING HSI INTERNATIONAL', '', '', '', 'NO. 2 LANE 192, GAO FUNG RD., HSIN CHU CITY, TAIWAN, ROC.\r\n ', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(106, 'M010 - MULTI MAKMUR INDAH INDUSTRI, P. T.', '', '', '', 'Jl. Gatot Subroto KM 5,3 Jatiuwung Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(107, 'M011 - MITRA KARYA', '', '', '', 'Pergudangan Pantai Indah DadapBlok BB/35\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(108, 'M012 - MTU', '', '', '', 'TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(109, 'M013 - MULTI TRADING, P. T.', '', '', '', 'JL. RUKO FANTASI BLOK W/20A CENGKARENG JAKARTA.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(110, 'M014 - MITRA JAYA ABADI, CV', '', '', '', 'Jl. Raya Penggilingan Komp.PIK Blok a 145-147 Pulo Gadung jak Tim\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(111, 'M015 - MULTI KENCANA NIAGATAMA, P.T.', '', '', '', 'JL. KOPO MAJA NO. 97 CIKANDE SERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(112, 'M016 - MASTERINDO LOGAM TEHNIK JAYA, PT.', '', '', '', 'JL. PASIR GEDE NO. 137 PADALARANG BANDUNG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(113, 'M017 - MARDIYONO', '', '', '', 'TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(114, 'M018 - MANDIRI PLAS , UD.', '', '', '', 'Perumahan Buana Gardenia Blok D I no. 12 Pinang Tangerang', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(115, 'M019 - MULYONO', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(116, 'M020 - MITSUI INDONESIA, PT.', '', '', '', 'Menara BCA Lt. 52 Grand Indonesia Jl. MH. Thamrin No. 1 Menteng, Menteng Jakarta Pusat DKI Jakarta Raya\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(117, 'M021 - MICHAEL KAIRUPAN', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(118, 'M022 - MARK ROUWELL', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(119, 'M023 - MARIO', '', '', '', 'JAKARTA\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(120, 'N001 - NIPSEA PAINT AND CHEMICALS, P. T.', 'CHRISTINE', '', '', 'Jl. Ancol Barat I/A5/C No. 12 Jakarta 14430\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(121, 'N002 - NAZARETH TEKNIK ,PT.', 'ISKANDAR MULTAWAN', '', '', 'Jl. Peta No. 206 Bandung\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(122, 'P001 - PRABHA WIRADEWATA, P. T.', 'HADI', '', '', 'Desa Wadungasih Buduran Sidoarjo Jawa Timur\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(123, 'P002 - PRYSMIAN CABLES INDONESIA, P. T.', 'YUSI', '', '', 'Kota Bukit Indah Kawasan Industry Indotaisei Blok G1 Cikampek 41373 Jawa Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(124, 'P003 - PRIMA CABLE INDO, P. T.', '   ', '', '', 'Desa Gebang Raya Zona Industri Jatiuwung Gebang Raya Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(125, 'P004 - PRISMACABLE MITRATAMA INDUSTRIES, P. T.', 'SANTI', '', '', 'Jl. Arya Kemuning RT/RW : 003/003 Periuk Jaya Jatiuwung Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(126, 'P005 - POPULAR CAN UTAMA, P. T.', '', '', '', 'Komp. Duta Merlin Blok E/37 Jl. Gajah Mada No.3-5 Petojo Utara Gambir Jakarta.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(127, 'P006 - PELANGI INDAH CANINDO TBK, P. T.', '', '', '', 'Jl. Daan Mogot KM 14 No.700 Jakarta Barat\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(128, 'P007 - PAWI', '', '', '', '\r\nJurumudi Kebon Besar, Tangerang - Banten.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(129, 'P008 - PANCA MITRA, P. T.', 'ENWARDI', '', '', 'Komp. Pergudangan Pantai Indah Dadap Blok BB, Jl. Raya Prancis No.2.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(130, 'P009 - PROTON ELECTRIC , P. T.', '', '', '', 'Kawasan Industri Dan Pergudangan Pantai Indah Dadap Blok CJ/2 Tangerang\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(131, 'P010 - PRIMA MITRA  ELEKTRINDO, P. T.', '', '', '', 'Jl. Gajah Mada No.199 RT/RW : 003/004 Glodok Taman Sari Jakarta Barat.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(132, 'P011 - PUTRA DHARMA, P. T.', '', '', '', 'Jl. Raya Bali No. 1 Rawa Terate Cakung Jakarta Timur   \r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(133, 'P012 - PANI, P. T.', '', '', '', 'Jl. Raya Prancis No. 2 Blok M.30 KP. Pantai Indah Dadap Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(134, 'P013 - PUJI CAHAYA, P. T.', '', '', '', 'Jl. K.L. Yos Sudarso No. 1212 A Medan\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(135, 'P014 - PLASTIC INJECTION INDONESIA ,PT.', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(136, 'P015 - PRIMA INDAH LESTARI, PT.', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(137, 'P016 - POWER CABLE INDONESIA , PT.', '', '', '', 'Jl. Raya Dadap Perg. Sentra Kosambi Blok H6 H Kosambi Timur Kosambi Tangerang Banten\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(138, 'P017 - PCM KABEL INDONESIA, PT.', '', '', '', 'Komp. Industri Mekarjaya Jl. Karet Raya No. 288\r\nMekar Jaya Sepatan Tangerang Banten\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(139, 'P018 - PULUNG CABLE INDONESIA , PT.', '', '', '', 'Jl. Kopo Maja No. 99 Cikande Serang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(140, 'P019 - PANDE WUNGSU WYASA', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(141, 'R001 - ROFA ELECTRIC, P. D.', 'AHMAD ', '', '', 'Komplek Pertokoan Kenari Mas Blok F 34 Jakarta\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(142, 'R002 - RICH TOP UNIVERSAL INC.', '', '', '', 'Simmonds Building Wickhams Cayi PO.BOX 963, Road Town, Tortola, British Virgin I', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 'R003 - RAMON STAR, CV.', '', '', '', 'Karanggan Desa Puspa Sari RT/RW : 003/002 NO. 46 Citerep, Bogor.\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 'R004 - ROLLING', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 'R005 - RAGA MANDIRI, CV.', '', '', '', 'TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 'R006 - REGINA TAMPUBOLON', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 'R007 - ROY', '', '', '', 'KARAWACI TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, 'S001 - SUMACO JAYA ABADI, P. T. ', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 'S002 - SINAR MAHA SURYA, P. T.', 'DANIEL', '', '', 'Benda Raya No.3 Jakarta\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 'S003 - SUKSES SETIA, P. T.', 'ALAMSYAH', '', '', 'Jl. Bandengan Utara No. 91 S Jakarta Utara\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 'S004 - SINAR INTAN PUTRA NUSA, P.T.', 'EDI', '', '', 'Jl. Kapuk Kayu Besar No. 37 RT/RW:013/004 Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 'S005 - SUMBER BARU, P. T.', '', '', '', 'Terusan Bandengan Utara 89 No.17 Pangeran Jayakarta\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 'S006 - SINAR PLASTIK, P. T.', '', '', '', 'Rawa Lele Pergudangan No.50 Warung Gantung \r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 'S007 - SURYA BUANA SAKTI, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 'S008 - SURYA UNGGUL, P. T.', '', '', '', 'Jelambar Baru No.11 Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 'S009 - SARIHON ELECTRIC, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 'S010 - SARIFUDIN', '', '', '', '\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 'S011 - SURYA TEGUH JAYA, P. T.', '', '', '', 'Jl. Prabu Kiansantang No. 20, Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 'S012 - SUPREME JAYA ABADI, P. T.', '', '', '', 'Jl. Kapuk RT 004/001 Kapuk Cengkareng Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 'S013 - SANTIGI JAYA SAKTI', '', '', '', '\r\nJl. Jelambar Selatan 16 No. 4A-4B Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 'S014 - SUMBER REJEKI, P. T.', 'IBU YANI', '', '', 'JL. PETA BARAT NO. 33 JAKARTA BARAT.\r\n\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 'S015 - SUTANTO ARIF CHANDRA ELEKTRONIK , PT.', 'BP. SUTANTO', '', '', 'Jl. Pinangsia Raya Blok G No. 3 B Komplek Pertokoan Glodok Plaza Jakarta.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 'S017 - SUN NUR LOGAM JAYA', '', '', '', 'BEKASI\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 'S018 - SUNARI, TN', '', '', '', 'TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 'S019 - SALIM', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 'S020 - SAIFUL', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 'S021 - SURYA PLASTIK, CV.', '', '', '', 'KP. BUNGUR JAYA RT 001/004 DESA SERDANG WETAN LEGOK CURUG TANGERANG\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 'S022 - SUBUR JAYA ELECTRIC, PT.', '', '', '', 'Palm Paradice Park Residance Blok C No. 10 Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 'S023 - SINERGI METAL UTAMA, PT.', '', '', '', 'JAKARTA\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 'S024 - SUPER METAL BANGKA JAYA, PT.', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 'S025 - SUNAWAN', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 'S026 - SINERGI PRIMA SEJAHTERA, PT.', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 'S999 - SDM', 'DIANA', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 'T001 - TELAGA METALINDO, P. T.', '', '', '', 'Jl. Raya Serang KM. 16,8 Telaga Cikupa Tangerang.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 'T002 - TRIMUSTIKA, P. T.', 'FREDY', '', '', 'Komplek Citra Extension Blok BF III No. 3 Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 'T003 - TOKO 88', '', '', '', 'Pasar Kenari\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 'T005 - TEMBAGA MULIA SEMANAN TBK, P.T.', 'YUNG LIE', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 'T006 - TITANINDO REKATAMA, PT.', '', '', '', 'Kp. Pengasinan RT/RW 001/03 Periuk Jaya, Jatiuwung,Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 'T007 - TANGERANG JAYA PLASTIK, PT.', 'EVA', '', '', 'Jl. Sasmita Blok F No. 13 Tangerang\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 'T008 - TRITUNGGAL, P.T.', '', '', '', 'Jl. benda Raya Kamal No.2 Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 'T009 - THE THUMMD CO, LTD', '', '', '', 'IF NO. 08, SIUN SHENG 50 LANE SHIN GUANG RD. TAI PYNG SHYH, THAICHUNG SHIANN TAIWAN\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 'T010 - THREE LINES INDONESIA, PT', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 'U001 - UNGGUL CIPTA PERKASA, P. T.', 'ABUN', '', '', 'Komplek Taman Kebun Jeruk Blok Q2 No. 11 Jakarta\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 'U002 - UTIKON, P. T.', 'TERESIA', '', '', 'Duta Harapan Indah Kapuk Jakarta Barat\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 'U003 - UNI STAR UTAMA, P. T.', '', '', '', 'Jl. Kawasan Industri Candi Semarang \r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 'U004 - UD. COKRO', 'IBU ALAY', '', '', 'J\r\nJakarta.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 'U005 - UNIKAWAT', 'BP. WILLY SUGIANTO', '', '', 'Jl. Ruko Fantasi Blok W/20A Cengkareng Jakarta Barat.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 'U006 - UNILOGAM JAYA, PT.', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 'V001 - VOKSEL ELECTRIC, P. T.', 'ANGELA', '', '', 'Menara Karya Lantai 3, Unit D Jl.H.R. Rasuna Said, Blok X.5, Kav. 1-2.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 'V002 - VCS COPPER INDUSTRY SDN BHD ', '', '', '', 'NO.14, Jl. Keluli 2 Kawasan Industri Bukit Raja, 41050 Klang Malaysia.\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 'W001 - WILLSON SURYA UNGGUL', 'IRAWAN', '', '', 'Jl. Jelambar Baru No. 11 Jakarta \r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 'W002 - WILLY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 'W003 - WORD METALS RECYCLING CO, LTD', '', '', '', 'No. 14, Alley 5, Lane 182, Sec. 5, NAN Chu RD., Luchu Hsiang, Taoyuanhsien\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 'Y001 - YIN QIN CO. LTD', '', '', '', 'Freight Station Room A101 Sanshan Port District Nanhai City, China\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 'Z001 - ZULKARNAIN', '', '', '', '\r\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_customers_old`
--

CREATE TABLE `m_customers_old` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(150) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `m_province_id` int(11) NOT NULL,
  `m_city_id` int(11) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `m_bank_id` int(11) NOT NULL,
  `kcp` varchar(50) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_customers_old`
--

INSERT INTO `m_customers_old` (`id`, `nama_customer`, `pic`, `telepon`, `hp`, `alamat`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'RUSDI', 'RUSDI', '0735 808137', '', 'JL. MERPATI NO.72', 1, 1, '', 0, '', '', '', '2017-10-05 05:10:16', 1, '2017-10-05 05:10:16', 1),
(2, 'CV. ANGIN RIBUT', 'AGUS', '022-8909123', '', 'JLN. ASPAL TEBAL NO.22', 7, 4, '', 3, 'SUNTER', '200901', '', '2017-10-05 05:10:23', 1, '2018-01-24 08:01:44', 1),
(3, 'TRADECO', 'ERGAN', '021 387485', '', 'JALAN RAYA BOGOR', 7, 4, '', 3, 'CIMANGGIS', '200902', '', '2018-11-13 12:11:55', 1, '2018-11-13 12:11:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_jenis_brg_fg`
--

CREATE TABLE `m_jenis_brg_fg` (
  `id` int(11) NOT NULL,
  `jenis barang` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_jenis_brg_wip`
--

CREATE TABLE `m_jenis_brg_wip` (
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_jenis_packing`
--

CREATE TABLE `m_jenis_packing` (
  `id` int(11) NOT NULL,
  `jenis_packing` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jenis_packing`
--

INSERT INTO `m_jenis_packing` (`id`, `jenis_packing`, `keterangan`) VALUES
(1, 'BOBBIN', ''),
(2, 'KERANJANG', ''),
(3, 'KARDUS', ''),
(4, 'ROLL', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_jenis_trx`
--

CREATE TABLE `m_jenis_trx` (
  `id` int(11) NOT NULL,
  `jenis_trx` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_jns_req_bb`
--

CREATE TABLE `m_jns_req_bb` (
  `id` int(11) NOT NULL,
  `jenis_request_bobbin` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_kendaraan`
--

CREATE TABLE `m_kendaraan` (
  `id` int(11) NOT NULL,
  `no_kendaraan` varchar(11) NOT NULL,
  `m_type_kendaraan_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kendaraan`
--

INSERT INTO `m_kendaraan` (`id`, `no_kendaraan`, `m_type_kendaraan_id`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'B 3159 TLF', 1, '', '2017-10-01 11:10:29', 1, '2017-10-01 11:10:29', 1),
(2, 'BE 4589 HL', 3, '', '2017-10-01 11:10:56', 1, '2017-10-01 11:10:12', 1),
(3, 'BG 2289 PIS', 1, '', '2017-10-01 02:10:59', 1, '2017-10-01 02:10:20', 1),
(4, 'BE 2678 KIS', 1, '', '2017-10-04 01:10:33', 1, '2017-10-04 01:10:33', 1),
(5, 'B 8815 TES', 2, '', '2017-10-06 08:10:50', 1, '2017-10-06 08:10:50', 1),
(6, 'BE 3481 CAT', 2, '', '2017-10-13 02:10:00', 1, '2017-10-13 02:10:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_milik`
--

CREATE TABLE `m_milik` (
  `id` int(11) NOT NULL,
  `milik` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_muatan`
--

CREATE TABLE `m_muatan` (
  `id` int(11) NOT NULL,
  `nama_muatan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `flag_in` tinyint(1) NOT NULL,
  `flag_out` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_muatan`
--

INSERT INTO `m_muatan` (`id`, `nama_muatan`, `keterangan`, `flag_in`, `flag_out`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'SINGKONG', 'SINGKONG', 1, 0, '2017-10-01 12:10:17', 1, '2017-10-07 08:10:48', 1),
(2, 'CANGKANG', 'CANGKANG', 1, 1, '2017-10-01 12:10:32', 1, '2017-10-07 08:10:56', 1),
(3, 'SAGU', 'SAGU', 0, 1, '2017-10-01 12:10:51', 1, '2017-10-07 08:10:04', 1),
(4, 'ELOT', 'ELOT', 0, 1, '2017-10-01 12:10:15', 1, '2017-10-07 08:10:32', 1),
(5, 'MERAH', 'MERAH (SOLAR)', 1, 0, '2017-10-01 12:10:34', 1, '2017-10-07 08:10:45', 1),
(6, 'ONGGOK BASAH', 'ONGGOK BASAH', 0, 1, '2017-10-07 07:10:17', 1, '2017-10-07 08:10:28', 1),
(7, 'ONGGOK PRESS', 'ONGGOK PRESS', 0, 1, '2017-10-07 07:10:31', 1, '2017-10-07 08:10:44', 1),
(8, 'ONGGOK KERING', 'ONGGOK KERING', 0, 1, '2017-10-07 07:10:46', 1, '2017-10-07 08:10:57', 1),
(9, 'WASTE', 'WASTE', 0, 1, '2017-10-07 07:10:56', 1, '2017-10-07 08:10:05', 1),
(10, 'LAIN-LAIN', 'MUATAN LAIN, CONTOH : BATU, KERIKIL', 1, 0, '2017-10-07 07:10:21', 1, '2017-10-07 08:10:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_numberings`
--

CREATE TABLE `m_numberings` (
  `id` int(11) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `date_info` tinyint(1) NOT NULL,
  `padding` smallint(6) NOT NULL,
  `prefix_separator` varchar(1) NOT NULL,
  `date_separator` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_numberings`
--

INSERT INTO `m_numberings` (`id`, `prefix`, `date_info`, `padding`, `prefix_separator`, `date_separator`) VALUES
(1, 'PPS', 1, 4, '.', '.'),
(2, 'TB', 1, 5, '', ''),
(3, 'SO', 1, 4, '.', '.'),
(4, 'DO', 1, 4, '.', '.'),
(5, 'PRD', 1, 4, '.', '.'),
(6, 'BPB', 1, 4, '.', '.'),
(7, 'PORS', 1, 4, '.', '.'),
(8, 'VRSK', 1, 4, '.', '.'),
(9, 'DTR', 1, 4, '.', '.'),
(10, 'SJ', 1, 4, '.', '.'),
(11, 'TTR', 1, 4, '.', '.'),
(12, 'SPB', 1, 4, '.', '.'),
(13, 'POSP', 1, 4, '.', '.'),
(14, 'SKB', 1, 4, '.', '.'),
(15, 'POAPS', 1, 4, '.', '.'),
(16, 'POIR', 1, 4, '.', '.'),
(17, 'VIGT', 1, 4, '.', '.'),
(18, 'VCOST', 1, 4, '.', '.'),
(19, 'REQ', 1, 4, '.', '.'),
(20, 'VSP', 1, 4, '.', '.'),
(21, 'BPB-WIP', 1, 4, '.', '.'),
(22, 'BPB-AMP', 1, 4, '.', '.'),
(23, 'SPB-WIP', 1, 4, '.', '.'),
(24, 'PRD-WIP', 1, 4, '.', '.'),
(25, 'BB', 0, 4, '.', '.'),
(26, 'BB', 0, 4, '.', '.'),
(27, 'BB', 0, 4, '.', '.'),
(28, 'BB', 0, 4, '.', '.'),
(29, 'BB', 0, 4, '.', '.'),
(30, 'BB', 0, 4, '.', '.'),
(31, 'BB', 0, 4, '.', '.'),
(32, 'P', 0, 4, '.', '.'),
(33, 'Q', 0, 4, '.', '.'),
(34, 'BB', 0, 4, '.', '.'),
(35, 'BB-FG', 0, 4, '.', '.'),
(36, 'BB-FG', 0, 4, '.', '.'),
(37, 'BB-FG', 0, 4, '.', '.'),
(38, 'BB-FG', 0, 4, '.', '.'),
(39, 'BB-FG', 0, 4, '.', '.'),
(40, 'BB-FG', 0, 4, '.', '.'),
(41, 'BB-FG', 0, 4, '.', '.'),
(42, 'J', 0, 4, '.', '.'),
(43, 'BB-FG', 0, 4, '.', '.'),
(44, 'BB-FG', 0, 4, '.', '.'),
(45, 'PRD-SDM', 1, 4, '.', '.'),
(46, 'BB-FG', 0, 4, '.', '.'),
(47, 'BB-FG', 0, 4, '.', '.'),
(48, 'BB-FG', 0, 4, '.', '.'),
(49, 'R', 0, 4, '.', '.'),
(50, 'BB-FG', 0, 4, '.', '.'),
(51, 'BB-FG', 0, 4, '.', '.'),
(52, 'BPB-SDM', 1, 4, '.', '.'),
(53, 'SPB-FG', 1, 4, '', ''),
(54, 'PO', 1, 4, '-', '.'),
(55, 'SPB-SP', 1, 4, '.', '.'),
(56, 'TFG', 1, 4, '.', '.'),
(57, 'PMB', 1, 4, '.', '.'),
(58, 'BB-FG', 0, 4, '.', '.'),
(59, 'BB-FG', 0, 4, '.', '.'),
(60, 'SPB-RSK', 1, 4, '.', '.');

-- --------------------------------------------------------

--
-- Table structure for table `m_numbering_details`
--

CREATE TABLE `m_numbering_details` (
  `id` int(11) NOT NULL,
  `prefix` varchar(20) NOT NULL,
  `last_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_numbering_details`
--

INSERT INTO `m_numbering_details` (`id`, `prefix`, `last_number`) VALUES
(1, 'GI10042017', 5),
(2, 'SO06102017', 1),
(3, 'IFS06102017', 1),
(5, 'IFS08102017', 2),
(6, 'IFS10102017', 3),
(8, 'NDMRH.10102017', 1),
(9, 'NDOKS.10102017', 1),
(10, 'NDSKG.11102017', 1),
(11, 'GI.10112017', 1),
(12, 'SO12102017', 1),
(13, 'DO.12102017', 1),
(17, 'INVSG.13102017', 1),
(18, 'NDSKG.15102017', 2),
(19, 'NDOKS.15102017', 1),
(20, 'NDMNL.15102017', 1),
(21, 'NDMRH.15102017', 1),
(22, 'NDCKG.16102017', 2),
(23, 'NDOKS.16102017', 3),
(24, 'GI.01011970', 2),
(25, 'GI.16102017', 1),
(30, 'DO.PBRK.17102017', 1),
(31, 'INVSG.17102017', 1),
(32, 'NDOKS.17102017', 2),
(33, 'PPS.25012018', 2),
(36, 'POSP.10022018', 2),
(37, 'BPB.11022018', 1),
(38, 'PORS.14022018', 1),
(39, 'VRSK.14022018', 1),
(40, 'DTR.15022018', 1),
(42, 'TTR.17022018', 1),
(43, 'VRSK.17022018', 1),
(44, 'SO.18022018', 1),
(45, 'DTR.19022018', 1),
(46, 'TTR.19022018', 1),
(47, 'PRD20022018', 2),
(48, 'SJ.20022018', 1),
(49, 'SPB.20022018', 1),
(50, 'SKB.21022018', 1),
(51, 'PRD22022018', 1),
(52, 'POAPS.22022018', 1),
(54, 'DTR.22022018', 1),
(55, 'SJ.22022018', 1),
(56, 'POIR.24022018', 1),
(57, 'DTR.24022018', 1),
(58, 'TTR.24022018', 1),
(59, 'SPB.25022018', 2),
(61, 'SKB.25022018', 3),
(62, 'PRD25022018', 1),
(63, 'DTR.25022018', 2),
(64, 'TTR.25022018', 2),
(65, 'VCOST.25022018', 1),
(66, 'REQ.25022018', 1),
(67, 'SJ.25022018', 1),
(68, 'REQ.26022018', 1),
(69, 'PORS.25032018', 1),
(70, 'VRSK.25032018', 1),
(71, 'VRSK.16042018', 2),
(72, 'PPS.16042018', 1),
(73, 'VSP.16042018', 2),
(74, 'REQ.27042018', 1),
(75, 'VRSK.27042018', 2),
(76, 'DTR.27042018', 2),
(77, 'PPS.27042018', 1),
(78, 'SO.27042018', 1),
(79, 'VRSK.15052018', 1),
(80, 'DTR.15052018', 1),
(84, 'TTR.15052018', 1),
(85, 'DTR.16052018', 1),
(86, 'BPB.25022016', 2),
(87, 'SO.25022016', 1),
(88, 'DTR.25022016', 1),
(89, 'TTR.25022016', 2),
(90, 'PRD.16052018', 1),
(91, 'SJ.17052018', 1),
(92, 'PRD.17052018', 2),
(93, 'SPB.17052018', 1),
(97, 'SKB.17052018', 1),
(98, 'PRD.03102018', 10),
(99, 'SPB.03102018', 4),
(100, 'SKB.03102018', 2),
(101, 'PRD.04102018', 3),
(102, 'SPB.04102018', 4),
(106, 'TTR.04102018', 17),
(107, 'VRSK.04102018', 2),
(108, 'DTR.04102018', 4),
(109, 'PPS.05102018', 1),
(110, 'VRSK.05102018', 2),
(112, 'DTR.05102018', 6),
(113, 'TTR.08102018', 5),
(114, 'VRSK.08102018', 2),
(115, 'DTR.08102018', 5),
(116, 'PRD.08102018', 3),
(117, 'PPS.08102018', 1),
(118, 'POSP.08102018', 1),
(119, 'VSP.08102018', 1),
(120, 'DTR.10102018', 1),
(121, 'TTR.10102018', 10),
(123, 'TTR.11102018', 1),
(124, 'PPS.11102018', 1),
(125, 'SO.12102018', 3),
(126, 'PRD.15102018', 5),
(127, 'SPB.15102018', 1),
(128, 'PRD.16102018', 3),
(130, 'SPB.16102018', 4),
(131, 'BPBWIP.16102018', 3),
(132, 'BPB-WIP.16102018', 6),
(133, 'DTR.16102018', 1),
(134, 'BPB-AMP.16102018', 1),
(135, 'SPB-WIP.18102018', 3),
(136, 'PRD.18102018', 1),
(137, 'SPB-WIP.01102018', 1),
(138, 'SPB-WIP.11102018', 1),
(139, 'SPB-WIP.22102018', 2),
(140, 'PRD-WIP.22102018', 6),
(141, 'PRD-WIP.23102018', 2),
(142, 'DTR.23102018', 2),
(143, 'BB.', 8),
(144, 'P.', 5),
(145, 'Q.', 3),
(146, 'BB-FG.', 16),
(147, 'J.', 2),
(148, 'PRD-SDM.24102018', 9),
(149, 'PRD-SDM.25102018', 2),
(150, 'R.', 1),
(151, 'PRD-SDM.26102018', 2),
(152, 'BPB-SDM.24102018', 1),
(153, 'BPB-SDM.25102018', 2),
(154, 'BPB-SDM.26102018', 2),
(155, 'PRD-SDM.29102018', 4),
(156, 'BPB-SDM.29102018', 3),
(157, 'SO.30102018', 1),
(158, 'SPB-WIP.30102018', 5),
(159, 'SPB-FG30102018', 3),
(160, 'SPB-FG31102018', 3),
(161, 'PRD.31102018', 3),
(162, 'SPB.31102018', 3),
(163, 'BPB-WIP.31102018', 1),
(164, 'DTR.31102018', 5),
(165, 'BPB-AMP.31102018', 1),
(166, 'PRD-WIP.31102018', 3),
(167, 'PRD-SDM.31102018', 3),
(168, 'BPB-SDM.31102018', 3),
(169, 'SPB-WIP.31102018', 11),
(170, 'TTR.31102018', 1),
(171, 'PRD-SDM.01112018', 4),
(172, 'BPB-SDM.01112018', 1),
(173, 'SPB-WIP.01112018', 4),
(174, 'SPB-FG01112018', 1),
(175, 'PRD.01112018', 1),
(176, 'SPB.01112018', 1),
(177, 'DTR.01112018', 4),
(179, 'TTR.01112018', 1),
(180, 'PO01112018', 1),
(181, 'PO-01112018', 2),
(182, 'PO-02112018', 3),
(183, 'BPB-WIP.01112018', 1),
(184, 'BPB-AMP.01112018', 1),
(185, 'SPB-FG05112018', 2),
(186, 'PPS.05112018', 3),
(187, 'POSP.05112018', 3),
(188, 'BPB.05112018', 5),
(189, 'BPB.06112018', 11),
(190, 'PPS.06112018', 1),
(191, 'POSP.06112018', 1),
(192, 'VSP.06112018', 1),
(193, 'SPB-SP.07112018', 2),
(194, 'SPB-WIP.07112018', 1),
(195, 'SPB-FG07112018', 2),
(196, 'SPB-SP.08112018', 1),
(197, 'SO.12112018', 1),
(198, 'PRD.12112018', 1),
(199, 'SPB.12112018', 1),
(200, 'PRD-WIP.12112018', 1),
(201, 'PRD-SDM.12112018', 8),
(202, 'SPB-FG12112018', 3),
(203, 'BPB-SDM.12112018', 5),
(204, 'SPB-WIP.13112018', 4),
(205, 'DTR.13112018', 1),
(206, 'TTR.13112018', 1),
(207, 'SJ.13112018', 1),
(208, 'SO.13112018', 5),
(209, 'SPB-FG13112018', 4),
(210, 'SO.14112018', 1),
(211, 'SPB-WIP.14112018', 1),
(212, 'PRD.16112018', 1),
(213, 'SO.16112018', 1),
(214, 'SJ.16112018', 1),
(215, 'PRD-WIP.19112018', 2),
(216, 'DTR.19112018', 9),
(217, 'SO.19112018', 1),
(218, 'TFG.19112018', 4),
(219, 'TFG.20112018', 1),
(220, 'SPB-FG20112018', 1),
(221, 'TFG.21112018', 3),
(222, 'SPB-FG21112018', 7),
(223, 'TTR.21112018', 2),
(224, 'SJ.21112018', 4),
(225, 'SO.21112018', 4),
(226, 'PRD-SDM.21112018', 1),
(227, 'BPB-SDM.21112018', 1),
(228, 'SO.22112018', 1),
(229, 'DTR.22112018', 3),
(230, 'TTR.22112018', 2),
(231, 'VRSK.22112018', 6),
(232, 'PO-22112018', 3),
(233, 'PPS.22112018', 2),
(234, 'POSP.22112018', 2),
(235, 'BPB.22112018', 1),
(236, 'BPB.23112018', 1),
(237, 'SPB-SP.22112018', 1),
(238, 'VSP.22112018', 1),
(239, 'PRD.22112018', 3),
(240, 'SPB.22112018', 2),
(241, 'PMB.22112018', 5),
(242, 'PMB.23112018', 4),
(243, 'SPB-WIP.23112018', 1),
(244, 'PRD.23112018', 3),
(245, 'SPB.23112018', 2),
(246, 'BPB-WIP.23112018', 2),
(247, 'DTR.23112018', 4),
(248, 'BPB-AMP.23112018', 2),
(249, 'PRD-WIP.23112018', 3),
(250, 'PRD-SDM.23112018', 1),
(251, 'BPB-SDM.23112018', 1),
(252, 'SJ.26112018', 3),
(253, 'PRD-SDM.26112018', 2),
(254, 'BPB-SDM.26112018', 2),
(255, 'SPB-WIP.26112018', 1),
(256, 'SPB-FG26112018', 5),
(257, 'BPB.26112018', 1),
(258, 'SO.26112018', 4),
(259, 'SO.27112018', 1),
(260, 'SPB-WIP.27112018', 1),
(261, 'PRD.27112018', 5),
(262, 'SPB.27112018', 2),
(263, 'BPB-WIP.27112018', 1),
(264, 'DTR.27112018', 1),
(265, 'BPB-AMP.27112018', 1),
(266, 'VSP.27112018', 2),
(267, 'VRSK.27112018', 1),
(268, 'PMB.27112018', 1),
(269, 'PRD-SDM.27112018', 1),
(270, 'BPB-SDM.27112018', 1),
(271, 'POSP.28112018', 3),
(274, 'BPB.28112018', 5),
(275, 'VSP.28112018', 10),
(276, 'PPS.28112018', 1),
(277, 'SPB-SP.28112018', 1),
(278, 'POSP.201811', 2),
(279, 'PRD-SDM.201811', 3),
(280, 'BPB-SDM.201811', 3),
(281, 'SPB.201811', 2),
(282, 'PRD.201811', 2),
(283, 'SO.201811', 1),
(284, 'SPB-FG201811', 1),
(285, 'PO-201811', 1),
(286, 'VRSK.201811', 1),
(287, 'TTR.201811', 1),
(288, 'DTR.201811', 6),
(289, 'DTR.201812', 7),
(290, 'PO-201812', 2),
(291, 'VRSK.201812', 16),
(292, 'TTR.201812', 3),
(293, 'SO.201812', 4),
(294, 'SPB-RSK.201812', 2),
(295, 'SPB-WIP.201812', 2),
(296, 'PRD.201812', 1),
(297, 'SPB-SP.201812', 1),
(298, 'BPB.201812', 1),
(299, 'SJ.201812', 2),
(300, 'PRD-SDM.201812', 2),
(301, 'BPB-SDM.201812', 2),
(302, 'TFG.201812', 1),
(303, 'SPB-FG201812', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_print_barcode`
--

CREATE TABLE `m_print_barcode` (
  `id` int(11) NOT NULL,
  `nama_barcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_print_barcode`
--

INSERT INTO `m_print_barcode` (`id`, `nama_barcode`) VALUES
(1, 'barcode_fg1');

-- --------------------------------------------------------

--
-- Table structure for table `m_print_barcode_line`
--

CREATE TABLE `m_print_barcode_line` (
  `id` int(11) NOT NULL,
  `m_print_barcode_id` int(11) NOT NULL,
  `line_no` int(11) NOT NULL,
  `string1` varchar(200) NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_print_barcode_line`
--

INSERT INTO `m_print_barcode_line` (`id`, `m_print_barcode_id`, `line_no`, `string1`, `notes`) VALUES
(1, 1, 1, 'SIZE 87.5 mm, 60.1 mm', ''),
(2, 1, 2, 'GAP 3 mm, 0 mm', ''),
(3, 1, 3, 'DIRECTION 0,0', ''),
(4, 1, 4, 'REFERENCE 0,0', ''),
(5, 1, 5, 'OFFSET 0 mm', ''),
(6, 1, 6, 'SET PEEL OFF', ''),
(7, 1, 7, 'SET CUTTER OFF', ''),
(8, 1, 8, 'SET PARTIAL_CUTTER OFF', ''),
(9, 1, 9, 'SET TEAR ON', ''),
(10, 1, 10, 'CLS', ''),
(11, 1, 11, 'BOX 23,27,672,458,3', ''),
(12, 1, 12, 'BAR 24,414, 645, 3', ''),
(13, 1, 13, 'BAR 27,347, 643, 3', ''),
(14, 1, 14, 'CODEPAGE 1252', ''),
(15, 1, 15, 'TEXT 645,408,\"ROMAN.TTF\",180,1,8,\"Inventory ID  :\"', ''),
(16, 1, 16, 'TEXT 644,375,\"ROMAN.TTF\",180,1,8,\"Description   :\"', ''),
(17, 1, 17, 'TEXT 646,258,\"ROMAN.TTF\",180,1,8,\"Bobbin No    :\"', ''),
(18, 1, 18, 'BARCODE 488,335,\"39\",41,0,180,2,6,\"05RT010\"', 'barcode_kode_barang'),
(19, 1, 19, 'TEXT 386,289,\"ROMAN.TTF\",180,1,8,\"05RT010\"', 'text_barcode_kode_barang'),
(20, 1, 20, 'TEXT 646,217,\"ROMAN.TTF\",180,1,8,\"Qty. Gross    :\"', ''),
(21, 1, 21, 'TEXT 646,182,\"ROMAN.TTF\",180,1,8,\"Brt. Bobbin   :\"', ''),
(22, 1, 22, 'TEXT 647,142,\"ROMAN.TTF\",180,1,8,\"Qty. Net        :\"', ''),
(23, 1, 23, 'BARCODE 612,101,\"39\",41,0,180,2,6,\"SPB-FG131120180004\"', 'barcode_nomor_bobbin'),
(24, 1, 24, 'TEXT 426,55,\"ROMAN.TTF\",180,1,8,\"171102A02007700\"', 'text_barcode_nomor_bobbin'),
(25, 1, 25, 'TEXT 499,260,\"4\",180,1,1,\"171102A02007700\"', 'nomor_bobbin'),
(26, 1, 26, 'TEXT 495,226,\"ROMAN.TTF\",180,1,14,\"240.86\"', 'berat_gross'),
(27, 1, 27, 'TEXT 495,188,\"ROMAN.TTF\",180,1,14,\"20.00\"', 'berat_palete'),
(28, 1, 28, 'TEXT 495,147,\"0\",180,14,14,\"220.86\"', 'berat_netto'),
(29, 1, 29, 'TEXT 352,220,\"ROMAN.TTF\",180,1,8,\"KG\"', ''),
(30, 1, 30, 'TEXT 351,183,\"ROMAN.TTF\",180,1,9,\"KG\"', ''),
(31, 1, 31, 'TEXT 352,140,\"ROMAN.TTF\",180,1,8,\"KG\"', ''),
(32, 1, 32, 'TEXT 496,373,\"2\",180,1,1,\"BCW 0.20 MM TMS SOFT\"', 'nama_barang'),
(33, 1, 33, 'TEXT 497,407,\"4\",180,1,1,\"05RT010\"', 'kode_barang'),
(34, 1, 34, 'PRINT 1,1', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_provinces`
--

CREATE TABLE `m_provinces` (
  `id` int(11) NOT NULL,
  `province_code` varchar(10) NOT NULL,
  `province_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_provinces`
--

INSERT INTO `m_provinces` (`id`, `province_code`, `province_name`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'SUMSEL', 'SUMATERA SELATAN', '2017-10-05 03:10:56', 1, '2017-10-05 03:10:56', 1),
(2, 'SUMUT', 'SUMATERA UTARA', '2017-10-05 03:10:12', 1, '2017-10-05 03:10:12', 1),
(3, 'SUMBAR', 'SUMATERA BARAT', '2017-10-05 03:10:27', 1, '2017-10-05 03:10:27', 1),
(4, 'KALBAR', 'KALIMANTAN BARAT', '2017-10-05 03:10:41', 1, '2017-10-05 03:10:41', 1),
(5, 'KALTIM', 'KALIMANTAN TIMUR', '2017-10-05 03:10:53', 1, '2017-10-05 03:10:53', 1),
(6, 'BABEL', 'BANGKA BELITUNG', '2017-10-05 03:10:06', 1, '2017-10-05 03:10:06', 1),
(7, 'JABAR', 'JAWA BARAT', '2017-10-05 03:10:16', 1, '2017-10-05 03:10:16', 1),
(8, 'JATIM', 'JAWA TIMUR', '2017-10-05 03:10:26', 1, '2017-10-05 03:10:26', 1),
(9, 'JATENG', 'JAWA TENGAH', '2017-10-05 03:10:40', 1, '2017-10-05 03:10:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_sumber_fg`
--

CREATE TABLE `m_sumber_fg` (
  `id` int(11) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_sumber_wip`
--

CREATE TABLE `m_sumber_wip` (
  `id` int(11) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_sumber_wip`
--

INSERT INTO `m_sumber_wip` (`id`, `sumber`, `keterangan`) VALUES
(2, 'abc', 'keterangan abc');

-- --------------------------------------------------------

--
-- Table structure for table `m_type_kendaraan`
--

CREATE TABLE `m_type_kendaraan` (
  `id` int(11) NOT NULL,
  `type_kendaraan` varchar(75) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_type_kendaraan`
--

INSERT INTO `m_type_kendaraan` (`id`, `type_kendaraan`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'DUMP TRUCK', 'DUMP TRUCK', '2017-10-01 10:10:53', 1, '2017-10-01 10:10:44', 1),
(2, 'TRUCK ENGKEL', 'TRUCK ENGKEL', '2017-10-01 10:10:57', 1, '2017-10-01 10:10:57', 1),
(3, 'CRIST GROUP', 'CRIST GROUP', '2017-10-01 10:10:15', 1, '2017-10-01 10:10:15', 1),
(4, 'FUSO', '', '2018-02-20 03:02:02', 1, '2018-02-20 03:02:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `kode_owner` varchar(4) NOT NULL,
  `nama_owner` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `kode_owner`, `nama_owner`) VALUES
(1, 'TMS', 'TMS'),
(2, 'KMP', 'KMP'),
(3, 'IDK', 'INDOKA');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `no_po` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `beli_sparepart_id` int(11) NOT NULL,
  `ppn` tinyint(1) NOT NULL,
  `diskon` int(11) NOT NULL,
  `materai` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `term_of_payment` varchar(50) NOT NULL,
  `jenis_po` varchar(25) NOT NULL,
  `flag_dp` tinyint(1) NOT NULL,
  `flag_pelunasan` tinyint(1) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `no_po`, `tanggal`, `beli_sparepart_id`, `ppn`, `diskon`, `materai`, `supplier_id`, `term_of_payment`, `jenis_po`, `flag_dp`, `flag_pelunasan`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(14, 'PO-05102018.1839', '2018-10-05', 0, 0, 0, 0, 1, '1 TAHUN', 'Rongsok', 1, 0, 1, '2018-10-05 06:10:53', 1, '2018-11-30 06:11:42', 1),
(15, 'PO-05102018.2023', '2018-10-05', 0, 0, 0, 0, 2, '2 BULAN', 'Rongsok', 1, 0, 1, '2018-10-05 08:10:59', 1, '2018-10-08 03:10:28', 1),
(16, 'PO-08102018.1644', '2018-10-08', 0, 0, 0, 0, 2, '1 BULAN', 'Rongsok', 1, 1, 1, '2018-10-08 03:10:52', 1, '2018-11-30 06:11:32', 1),
(17, 'PO-08102018.1716', '2018-10-08', 0, 0, 0, 0, 1, '2 TAHUN', 'Rongsok', 0, 0, 1, '2018-10-08 05:10:05', 1, '2018-11-30 06:11:50', 1),
(18, 'POSP.08102018.0001', '2018-10-08', 3, 0, 0, 0, 1, '1 BULAN', 'Sparepart', 1, 1, 4, '2018-10-08 05:10:16', 1, '2018-11-28 11:11:26', 1),
(19, 'PO-10102018.1411', '2018-10-10', 0, 0, 0, 0, 2, '6 BULAN', 'Rongsok', 0, 1, 4, '2018-10-10 02:10:58', 1, '2018-10-10 02:10:57', 1),
(20, 'PO-31102018.0918', '2018-10-31', 0, 0, 0, 0, 2, '2 BULAN', 'Rongsok', 1, 0, 4, '2018-10-31 03:10:18', 1, '2018-11-01 03:11:00', 1),
(21, 'PO-01112018.0001', '2018-11-01', 0, 0, 0, 0, 2, '3 BULAN', 'Rongsok', 1, 0, 4, '2018-11-01 03:11:38', 1, '2018-11-01 03:11:20', 1),
(26, 'PO-02112018.0002', '2018-11-02', 0, 0, 0, 0, 1, '3 BULAN', 'Rongsok', 0, 1, 1, '2018-11-01 04:11:01', 1, '2018-11-22 09:11:27', 1),
(27, 'PO-02112018.0003', '2018-11-02', 0, 0, 0, 0, 2, '4 BULAN', 'Rongsok', 0, 1, 4, '2018-11-02 02:11:36', 1, '2018-11-30 07:11:32', 1),
(28, 'POSP.05112018.0001', '2018-11-05', 7, 0, 0, 0, 1, 'CASH', 'Sparepart', 0, 1, 4, '2018-11-05 02:11:02', 1, '2018-11-05 03:11:37', 1),
(29, 'POSP.05112018.0002', '2018-11-05', 7, 0, 0, 0, 2, 'CASH', 'Sparepart', 0, 1, 4, '2018-11-05 03:11:02', 1, '2018-11-05 04:11:23', 1),
(30, 'POSP.05112018.0003', '2018-11-05', 8, 0, 0, 0, 2, 'CASH', 'Sparepart', 0, 1, 4, '2018-11-05 04:11:39', 1, '2018-11-06 03:11:21', 1),
(31, 'POSP.06112018.0001', '2018-11-06', 9, 0, 0, 0, 1, 'CASH', 'Sparepart', 1, 1, 4, '2018-11-06 03:11:58', 1, '2018-11-06 03:11:15', 1),
(32, 'PO-22112018.0001', '2018-11-22', 0, 0, 0, 0, 9, 'CASH', 'Rongsok', 1, 0, 4, '2018-11-22 09:11:54', 1, '2018-12-03 10:12:51', 1),
(33, 'POSP.22112018.0001', '2018-11-22', 11, 0, 0, 0, 3, 'CASH', 'Sparepart', 0, 1, 4, '2018-11-22 10:11:43', 1, '2018-11-22 10:11:15', 1),
(34, 'POSP.22112018.0002', '2018-11-22', 11, 0, 0, 0, 4, 'CASH', 'Sparepart', 1, 1, 4, '2018-11-22 10:11:16', 1, '2018-11-26 11:11:19', 1),
(35, 'PO-22112018.0002', '2018-11-22', 0, 0, 0, 0, 8, 'CASH', 'Rongsok', 0, 1, 4, '2018-11-22 11:11:20', 1, '2018-11-22 11:11:13', 1),
(36, 'PO-22112018.0003', '2018-11-22', 0, 0, 0, 0, 10, 'CASH', 'Rongsok', 1, 1, 4, '2018-11-22 01:11:51', 1, '2018-11-22 01:11:07', 1),
(37, 'POSP.28112018.0001', '2018-11-28', 11, 1, 5, 6000, 4, 'CASH', 'Sparepart', 1, 1, 4, '2018-11-28 11:11:49', 1, '2018-11-28 11:11:51', 1),
(38, 'POSP.28112018.0002', '2018-11-28', 10, 0, 5, 3000, 9, 'CASH', 'Sparepart', 1, 1, 1, '2018-11-28 01:11:01', 1, '2018-11-28 01:11:35', 1),
(39, 'POSP.28112018.0003', '2018-11-28', 2, 0, 0, 0, 50, 'CASH', 'Sparepart', 0, 0, 2, '2018-11-28 01:11:57', 1, '2018-11-28 01:11:18', 1),
(40, 'POSP.201811.0001', '2018-11-29', 12, 0, 0, 6000, 50, 'CASH', 'Sparepart', 0, 0, 0, '2018-11-29 03:11:12', 1, '2018-11-29 03:11:12', 1),
(41, 'POSP.201811.0002', '2018-11-29', 12, 0, 0, 0, 156, 'CASH', 'Sparepart', 0, 0, 3, '2018-11-29 03:11:35', 1, '2018-12-04 03:12:01', 1),
(42, 'PO-201811.0001', '2018-11-30', 0, 1, 0, 0, 9, 'CASH', 'Rongsok', 0, 0, 3, '2018-11-30 11:11:07', 2, '2018-11-30 07:11:43', 1),
(43, 'PO-201812.0001', '2018-12-03', 0, 0, 0, 0, 2, 'CASH', 'Rongsok', 0, 0, 3, '2018-12-03 10:12:57', 1, '2018-12-03 10:12:57', 1),
(44, 'PO-201812.0002', '2018-12-03', 0, 0, 0, 0, 4, 'CASH', 'Rongsok', 0, 0, 2, '2018-12-03 03:12:16', 1, '2018-12-04 02:12:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `po_detail`
--

CREATE TABLE `po_detail` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `beli_sparepart_detail_id` int(11) NOT NULL,
  `sparepart_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `ampas_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `bruto` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `flag_lpb` tinyint(1) NOT NULL,
  `flag_dtr` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_detail`
--

INSERT INTO `po_detail` (`id`, `po_id`, `beli_sparepart_detail_id`, `sparepart_id`, `rongsok_id`, `ampas_id`, `amount`, `qty`, `total_amount`, `bruto`, `netto`, `flag_lpb`, `flag_dtr`) VALUES
(26, 14, 0, 0, 1, 0, 1500, 200, 300000, 0, 0, 0, 0),
(27, 14, 0, 0, 2, 0, 2500, 250, 625000, 0, 0, 0, 1),
(28, 15, 0, 0, 1, 0, 2500, 175, 437500, 0, 0, 0, 0),
(29, 16, 0, 0, 1, 0, 6500, 250, 1625000, 0, 0, 0, 1),
(30, 16, 0, 0, 2, 0, 5500, 200, 1100000, 0, 0, 0, 1),
(31, 17, 0, 0, 1, 0, 5000, 100, 500000, 0, 0, 0, 1),
(32, 18, 6, 2, 0, 0, 20000, 1, 20000, 0, 0, 1, 0),
(33, 18, 7, 1, 0, 0, 30000, 1, 30000, 0, 0, 1, 0),
(34, 19, 0, 0, 2, 0, 5750, 100, 575000, 0, 0, 0, 1),
(35, 19, 0, 0, 1, 0, 2750, 150, 412500, 0, 0, 0, 1),
(36, 20, 0, 0, 2, 0, 3000, 150, 450000, 0, 0, 0, 1),
(37, 20, 0, 0, 1, 0, 1500, 75, 112500, 0, 0, 0, 1),
(38, 21, 0, 0, 2, 0, 5000, 100, 500000, 0, 0, 0, 1),
(40, 26, 0, 0, 2, 0, 4000, 100, 400000, 0, 0, 0, 1),
(41, 27, 0, 0, 1, 0, 3000, 40, 120000, 0, 0, 0, 0),
(42, 28, 11, 2, 0, 0, 20000, 20, 400000, 0, 0, 1, 0),
(43, 29, 12, 1, 0, 0, 15000, 50, 750000, 0, 0, 1, 0),
(44, 30, 13, 2, 0, 0, 30000, 15, 450000, 0, 0, 1, 0),
(45, 30, 14, 1, 0, 0, 15000, 20, 300000, 0, 0, 1, 0),
(46, 31, 15, 2, 0, 0, 70000, 20, 1400000, 0, 0, 1, 0),
(47, 31, 16, 1, 0, 0, 20000, 40, 800000, 0, 0, 1, 0),
(48, 33, 20, 15, 0, 0, 7000, 10, 70000, 0, 0, 1, 0),
(49, 33, 21, 14, 0, 0, 10000, 5, 50000, 0, 0, 1, 0),
(50, 34, 22, 3, 0, 0, 5000, 25, 125000, 0, 0, 1, 0),
(51, 34, 23, 4, 0, 0, 10000, 5, 50000, 0, 0, 1, 0),
(52, 35, 0, 0, 36, 0, 900000, 15, 13500000, 0, 0, 0, 1),
(53, 35, 0, 0, 34, 0, 1000000, 10, 10000000, 0, 0, 0, 1),
(54, 35, 0, 0, 32, 0, 700000, 7, 4900000, 0, 0, 0, 1),
(55, 35, 0, 0, 46, 0, 500000, 3, 1500000, 0, 0, 0, 1),
(56, 35, 0, 0, 38, 0, 600000, 4, 2400000, 0, 0, 0, 1),
(57, 35, 0, 0, 47, 0, 500000, 3, 1500000, 0, 0, 0, 1),
(58, 36, 0, 0, 71, 0, 20000, 15, 300000, 0, 0, 0, 1),
(59, 36, 0, 0, 73, 0, 35000, 10, 350000, 0, 0, 0, 1),
(60, 36, 0, 0, 70, 0, 50000, 3, 150000, 0, 0, 0, 1),
(61, 37, 24, 5, 0, 0, 30000, 7, 210000, 0, 0, 1, 0),
(62, 37, 25, 8, 0, 0, 50000, 2, 100000, 0, 0, 1, 0),
(63, 38, 18, 16, 0, 0, 60000, 7, 420000, 0, 0, 1, 0),
(64, 39, 4, 2, 0, 0, 30000, 3, 90000, 0, 0, 1, 0),
(65, 39, 5, 1, 0, 0, 20000, 1, 20000, 0, 0, 0, 0),
(66, 32, 0, 0, 45, 0, 60000, 3, 180000, 0, 0, 0, 0),
(67, 40, 26, 13, 0, 0, 90000, 6, 540000, 0, 0, 0, 0),
(68, 41, 27, 14, 0, 0, 0, 24, 0, 0, 0, 1, 0),
(69, 42, 0, 0, 12, 0, 90000, 3, 270000, 0, 0, 0, 0),
(70, 42, 0, 0, 76, 0, 10000, 15, 150000, 0, 0, 0, 0),
(71, 43, 0, 0, 12, 0, 60000, 60, 3600000, 0, 0, 0, 0),
(72, 43, 0, 0, 9, 0, 40000, 100, 4000000, 0, 0, 0, 0),
(75, 44, 0, 0, 17, 0, 16000, 30, 480000, 0, 0, 0, 1),
(76, 44, 0, 0, 18, 0, 36000, 30, 1080000, 0, 0, 0, 1),
(77, 44, 0, 0, 57, 0, 55000, 50, 2750000, 0, 0, 0, 1),
(78, 44, 0, 0, 10, 0, 30000, 50, 1500000, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produksi_ampas`
--

CREATE TABLE `produksi_ampas` (
  `id` int(11) NOT NULL,
  `no_produksi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `remarks` text NOT NULL,
  `ttr_id` int(11) NOT NULL,
  `skb_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_ampas`
--

INSERT INTO `produksi_ampas` (`id`, `no_produksi`, `tanggal`, `jenis_barang`, `remarks`, `ttr_id`, `skb_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'PRD200220180001', '2018-02-20', 'AMPAS', '', 2, 0, '2018-02-20 02:02:52', 1, '2018-02-20 02:02:54', 1),
(2, 'PRD220220180001', '2018-02-22', 'INGOT', '', 0, 1, '2018-02-22 12:02:30', 1, '2018-02-22 12:02:01', 1),
(3, 'PRD250220180001', '2018-02-25', 'KAWAT HITAM', '', 0, 2, '2018-02-25 10:02:56', 1, '2018-02-25 11:02:34', 1),
(4, 'PRD.16052018.0001', '2018-05-16', 'AMPAS', '', 11, 0, '2018-05-16 08:05:29', 1, '2018-05-16 08:05:29', 1),
(5, 'PRD.17052018.0002', '2018-05-17', 'INGOT', '', 0, 8, '2018-05-17 05:05:05', 1, '2018-05-17 05:05:05', 1),
(6, 'PRD.03102018.0003', '2018-10-03', 'INGOT', '', 0, 1, '2018-10-03 04:10:34', 1, '2018-10-03 04:10:34', 1),
(7, 'PRD.08102018.0002', '2018-10-08', 'INGOT', '', 0, 8, '2018-10-08 03:10:20', 1, '2018-10-08 03:10:20', 1),
(8, 'PRD.08102018.0003', '2018-10-08', 'INGOT', '', 0, 1, '2018-10-08 03:10:39', 1, '2018-10-08 03:10:39', 1),
(9, 'PRD.16112018.0001', '2018-11-16', 'KAWAT HITAM', '', 0, 2, '2018-11-16 01:11:41', 1, '2018-11-16 01:11:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produksi_ampas_detail`
--

CREATE TABLE `produksi_ampas_detail` (
  `id` int(11) NOT NULL,
  `produksi_ampas_id` int(11) NOT NULL,
  `ampas_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `hasil_produksi` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `bobin_id` int(11) NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_ampas_detail`
--

INSERT INTO `produksi_ampas_detail` (`id`, `produksi_ampas_id`, `ampas_id`, `rongsok_id`, `hasil_produksi`, `sisa`, `bobin_id`, `line_remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 1, 0, 250, 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 1, 2, 0, 330, 10, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 2, 0, 1, 550, 420, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 2, 0, 2, 720, 440, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 3, 0, 1, 350, 0, 1, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 3, 0, 2, 170, 0, 2, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 4, 1, 0, 200, 5, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 5, 0, 1, 500, 10, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produksi_fg`
--

CREATE TABLE `produksi_fg` (
  `id` int(11) NOT NULL,
  `no_laporan_produksi` varchar(35) NOT NULL,
  `tanggal` date NOT NULL,
  `flag_result` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` text,
  `jenis_barang_id` int(11) NOT NULL,
  `jenis_packing_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_fg`
--

INSERT INTO `produksi_fg` (`id`, `no_laporan_produksi`, `tanggal`, `flag_result`, `remarks`, `jenis_barang_id`, `jenis_packing_id`, `created_by`, `created_at`, `modified_date`, `modified_by`) VALUES
(3, 'PRD-SDM.24102018.0009', '2018-10-24', 1, NULL, 8, 1, 1, '2018-10-24 03:10:33', '2018-10-26 05:10:15', 1),
(4, 'PRD-SDM.25102018.0001', '2018-10-25', 1, NULL, 11, 3, 1, '2018-10-25 01:10:34', '2018-10-26 05:10:21', 1),
(5, 'PRD-SDM.25102018.0002', '2018-10-25', 1, NULL, 11, 4, 1, '2018-10-25 06:10:17', '2018-10-26 05:10:38', 1),
(6, 'PRD-SDM.26102018.0001', '2018-10-26', 1, NULL, 9, 2, 1, '2018-10-26 01:10:43', '2018-10-29 03:10:23', 1),
(7, 'PRD-SDM.26102018.0002', '2018-10-26', 1, NULL, 11, 3, 1, '2018-10-26 06:10:43', '2018-10-26 06:10:33', 1),
(8, 'PRD-SDM.29102018.0001', '2018-10-29', 1, NULL, 10, 1, 1, '2018-10-29 11:10:32', '2018-10-29 07:10:16', 1),
(9, 'PRD-SDM.29102018.0002', '2018-10-29', 1, NULL, 0, 2, 1, '2018-10-29 11:10:19', '2018-10-31 11:10:08', 1),
(10, 'PRD-SDM.29102018.0003', '2018-10-29', 1, NULL, 10, 4, 1, '2018-10-29 11:10:47', '2018-10-31 11:10:39', 1),
(11, 'PRD-SDM.29102018.0004', '2018-10-29', 0, NULL, 12, 3, 1, '2018-10-29 11:10:21', NULL, NULL),
(13, 'PRD-SDM.31102018.0002', '2018-10-31', 1, NULL, 8, 1, 1, '2018-10-31 02:10:14', '2018-10-31 02:10:43', 1),
(14, 'PRD-SDM.31102018.0003', '2018-10-31', 1, NULL, 9, 1, 1, '2018-10-31 02:10:04', '2018-10-31 02:10:32', 1),
(15, 'PRD-SDM.01112018.0001', '2018-11-01', 0, NULL, 11, 3, 1, '2018-11-01 09:11:28', NULL, NULL),
(16, 'PRD-SDM.01112018.0002', '2018-11-01', 0, NULL, 8, 1, 1, '2018-11-01 09:11:13', NULL, NULL),
(17, 'PRD-SDM.01112018.0003', '2018-11-01', 0, NULL, 8, 1, 1, '2018-11-01 09:11:57', NULL, NULL),
(18, 'PRD-SDM.01112018.0004', '2018-11-01', 1, NULL, 12, 3, 1, '2018-11-01 09:11:21', '2018-11-01 09:11:11', 1),
(19, 'PRD-SDM.12112018.0001', '2018-11-12', 0, NULL, 10, 1, 1, '2018-11-12 05:11:38', NULL, NULL),
(20, 'PRD-SDM.12112018.0002', '2018-11-12', 0, NULL, 10, 2, 1, '2018-11-12 05:11:16', NULL, NULL),
(21, 'PRD-SDM.12112018.0003', '2018-11-12', 0, NULL, 10, 3, 1, '2018-11-12 05:11:31', NULL, NULL),
(25, 'PRD-SDM.12112018.0007', '2018-11-12', 1, NULL, 10, 1, 1, '2018-11-12 06:11:42', '2018-11-12 07:11:49', 1),
(26, 'PRD-SDM.12112018.0008', '2018-11-12', 1, NULL, 12, 4, 1, '2018-11-12 06:11:51', '2018-11-12 06:11:03', 1),
(27, 'PRD-SDM.21112018.0001', '2018-11-21', 1, NULL, 9, 1, 1, '2018-11-21 08:11:55', '2018-11-21 08:11:46', 1),
(28, 'PRD-SDM.23112018.0001', '2018-11-23', 1, NULL, 12, 1, 1, '2018-11-23 01:11:51', '2018-11-23 01:11:11', 1),
(29, 'PRD-SDM.26112018.0001', '2018-11-26', 1, NULL, 400, 3, 1, '2018-11-26 10:11:58', '2018-11-26 10:11:24', 1),
(30, 'PRD-SDM.26112018.0002', '2018-11-26', 1, NULL, 164, 1, 1, '2018-11-26 10:11:55', '2018-11-26 10:11:45', 1),
(31, 'PRD-SDM.27112018.0001', '2018-11-27', 1, NULL, 13, 3, 1, '2018-11-27 05:11:55', '2018-11-27 05:11:10', 1),
(32, 'PRD-SDM.201811.0001', '2018-11-29', 1, NULL, 402, 4, 1, '2018-11-29 03:11:54', '2018-11-29 04:11:46', 1),
(33, 'PRD-SDM.201811.0002', '2018-11-29', 1, NULL, 438, 3, 1, '2018-11-29 04:11:17', '2018-11-29 05:11:26', 1),
(34, 'PRD-SDM.201811.0003', '2018-11-29', 1, NULL, 533, 2, 1, '2018-11-29 05:11:49', '2018-12-04 04:12:36', 1),
(35, 'PRD-SDM.201812.0001', '2018-12-04', 1, NULL, 142, 1, 1, '2018-12-04 05:12:32', '2018-12-04 05:12:10', 1),
(36, 'PRD-SDM.201812.0002', '2018-12-04', 1, NULL, 148, 4, 1, '2018-12-04 05:12:37', '2018-12-04 05:12:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produksi_fg_detail`
--

CREATE TABLE `produksi_fg_detail` (
  `id` int(11) NOT NULL,
  `produksi_fg_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_packing_barcode` varchar(100) NOT NULL,
  `no_produksi` int(11) DEFAULT NULL,
  `bruto` float DEFAULT NULL,
  `netto` float NOT NULL,
  `bobbin_id` int(11) NOT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_fg_detail`
--

INSERT INTO `produksi_fg_detail` (`id`, `produksi_fg_id`, `tanggal`, `no_packing_barcode`, `no_produksi`, `bruto`, `netto`, `bobbin_id`, `keterangan`) VALUES
(25, 3, '2018-10-25', '251018L01770008', 123, 28.98, 26.89, 18, 'OK'),
(26, 3, '2018-10-25', '251018M01770009', 321, 29.99, 28.71, 19, 'SIP'),
(28, 3, '2018-10-25', '251018L01770008', 111, 79.9, 67.9, 18, 'AYE'),
(27, 3, '2018-10-25', '251018M01770009', 222, 58.88, 45.948, 19, 'NETTO OK'),
(33, 3, '2018-10-25', '251018M01770009', 333, 92, 79.068, 19, 'SIP'),
(40, 4, '2018-10-25', '181025B00150011', NULL, NULL, 11.28, 21, NULL),
(39, 4, '2018-10-25', '181025B00150011', NULL, NULL, 12.22, 21, NULL),
(41, 4, '2018-10-25', '181025A00150010', NULL, NULL, 9.33, 20, NULL),
(55, 14, '2018-10-31', '181031l01630008', 334, 333, 300, 18, ''),
(44, 5, '2018-10-26', '181026R00150321', 321, NULL, 19.33, 26, NULL),
(46, 6, '2018-10-26', '181026L01630013', 123, 72.22, 64.34, 27, 'OK'),
(48, 7, '2018-10-26', '181026B00150117', NULL, NULL, 12.33, 21, NULL),
(49, 7, '2018-10-26', '181026B00150118', NULL, NULL, 12.77, 21, NULL),
(50, 7, '2018-10-26', '181026B00150117', NULL, NULL, 27.88, 21, NULL),
(52, 8, '2018-10-29', '181029L01400008', 235, 25, 13, 18, ''),
(54, 13, '2018-10-31', '181031l01770013', 332, 117, 100, 27, 'NEW'),
(56, 17, '2018-11-01', '181101M01770009', 335, 20000, 19987.1, 19, ''),
(57, 18, '2018-11-01', '181101B00160114', NULL, NULL, 30, 21, NULL),
(58, 18, '2018-11-01', '181101B00160111', NULL, NULL, 50, 21, NULL),
(59, 18, '2018-11-01', '181101B00160116', NULL, NULL, 40, 21, NULL),
(60, 18, '2018-11-01', '181101B00160112', NULL, NULL, 70, 21, NULL),
(67, 28, '2018-11-23', '181123M00160009', 351, 150, 137.068, 19, ''),
(66, 27, '2018-11-21', '181121M01630009', 467, 40, 27.068, 19, ''),
(65, 25, '2018-11-12', '181112M01400009', 338, 80, 67.068, 19, ''),
(64, 26, '2018-11-12', '181112R00160336', 336, NULL, 30, 26, NULL),
(68, 29, '2018-11-26', '181126A0106', NULL, NULL, 100, 20, NULL),
(69, 29, '2018-11-26', '181126A0105', NULL, NULL, 50, 20, NULL),
(70, 30, '2018-11-26', '181126M0009', 5555, 70, 57.068, 19, ''),
(71, 30, '2018-11-26', '181126M0009', 5556, 78, 65.068, 19, ''),
(72, 31, '2018-11-27', '181127A00140167', NULL, NULL, 40, 30, NULL),
(73, 31, '2018-11-27', '181127A00140161', NULL, NULL, 45, 30, NULL),
(74, 32, '2018-11-29', '181129R5558', 5558, NULL, 30, 26, NULL),
(75, 32, '2018-11-29', '181129R5559', 5559, NULL, 60, 26, NULL),
(84, 33, '2018-11-29', '181129B0111', NULL, NULL, 80, 21, NULL),
(87, 33, '2018-11-29', '181129B0113', NULL, NULL, 70, 21, NULL),
(80, 33, '2018-11-29', '181129B0116', NULL, NULL, 90, 21, NULL),
(88, 33, '2018-11-29', '181129B01119', NULL, NULL, 60, 21, NULL),
(91, 34, '2018-12-04', '181204M0009', 6678, 46, 33.068, 19, ''),
(92, 35, '2018-12-04', '181204M0009', 6679, 60, 47.068, 19, ''),
(94, 36, '2018-12-04', '181204R6681', 6681, NULL, 15, 26, NULL),
(95, 36, '2018-12-04', '181204R6682', 6682, NULL, 35, 26, NULL),
(96, 36, '2018-12-04', '181204R6683', 6683, NULL, 45, 26, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produksi_ingot`
--

CREATE TABLE `produksi_ingot` (
  `id` int(11) NOT NULL,
  `no_produksi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `flag_result` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_ingot`
--

INSERT INTO `produksi_ingot` (`id`, `no_produksi`, `tanggal`, `jenis_barang_id`, `remarks`, `flag_result`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(14, 'PRD.04102018.0003', '2018-10-04', 2, 'COBA INGOT', 1, '2018-10-04 10:10:11', 1, '2018-10-04 10:10:32', 1),
(17, 'PRD.15102018.0002', '2018-10-15', 2, '', 1, '2018-10-15 04:10:50', 1, '2018-10-15 04:10:04', 1),
(18, 'PRD.15102018.0003', '2018-10-15', 2, '', 1, '2018-10-15 04:10:36', 1, '2018-10-15 04:10:46', 1),
(19, 'PRD.15102018.0005', '2018-10-15', 2, '', 0, '2018-10-15 04:10:55', 1, '2018-10-15 04:10:55', 1),
(20, 'PRD.16102018.0001', '2018-10-16', 2, 'COBA PRODUKSI INGOT', 1, '2018-10-16 11:10:55', 1, '2018-10-16 11:10:24', 1),
(21, 'PRD.16102018.0002', '2018-10-16', 2, 'INGOT BARU LAGI', 0, '2018-10-16 11:10:55', 1, '2018-10-16 11:10:09', 1),
(22, 'PRD.16102018.0003', '2018-10-16', 2, '', 0, '2018-10-16 11:10:09', 1, '2018-10-16 11:10:15', 1),
(23, 'PRD.18102018.0001', '2018-10-18', 2, '', 0, '2018-10-18 01:10:03', 1, '2018-10-18 01:10:35', 1),
(24, 'PRD.31102018.0001', '2018-10-31', 2, 'BUAT INGOT 1', 0, '2018-10-31 10:10:22', 1, '2018-10-31 10:10:38', 1),
(25, 'PRD.31102018.0002', '2018-10-31', 6, 'NAMBAH STOK KAWAT HITAM', 0, '2018-10-31 03:10:06', 1, '2018-10-31 03:10:17', 1),
(26, 'PRD.31102018.0003', '2018-10-31', 5, 'STOK KAWAT  MERAH', 0, '2018-10-31 03:10:11', 1, '2018-10-31 03:10:27', 1),
(27, 'PRD.01112018.0001', '2018-11-01', 2, 'BUAT INGOT', 1, '2018-11-01 03:11:49', 1, '2018-11-01 03:11:04', 1),
(28, 'PRD.12112018.0001', '2018-11-12', 6, '', 0, '2018-11-12 04:11:29', 1, '2018-11-12 04:11:45', 1),
(29, 'PRD.22112018.0001', '2018-11-22', 14, '', 0, '2018-11-22 02:11:27', 1, '2018-11-22 02:11:59', 1),
(30, 'PRD.22112018.0002', '2018-11-22', 2, '', 1, '2018-11-22 02:11:46', 1, '2018-11-22 02:11:58', 1),
(31, 'PRD.22112018.0003', '2018-11-22', 17, '', 0, '2018-11-22 02:11:59', 1, '2018-11-22 02:11:59', 1),
(32, 'PRD.23112018.0001', '2018-11-23', 2, '', 1, '2018-11-23 01:11:22', 1, '2018-11-23 01:11:52', 1),
(33, 'PRD.23112018.0002', '2018-11-23', 12, '', 0, '2018-11-23 01:11:32', 1, '2018-11-23 01:11:42', 1),
(34, 'PRD.23112018.0003', '2018-11-23', 15, '', 0, '2018-11-23 03:11:12', 1, '2018-11-23 03:11:12', 1),
(35, 'PRD.27112018.0001', '2018-11-27', 2, '', 1, '2018-11-27 11:11:52', 1, '2018-11-27 11:11:11', 1),
(36, 'PRD.27112018.0002', '2018-11-27', 164, '', 0, '2018-11-27 12:11:05', 1, '2018-11-27 12:11:32', 1),
(37, 'PRD.27112018.0003', '2018-11-27', 49, '', 0, '2018-11-27 02:11:54', 1, '2018-11-27 02:11:54', 1),
(38, 'PRD.27112018.0004', '2018-11-27', 50, '', 0, '2018-11-27 02:11:44', 1, '2018-11-27 02:11:09', 1),
(39, 'PRD.27112018.0005', '2018-11-27', 48, '', 0, '2018-11-27 02:11:39', 1, '2018-11-27 02:11:39', 1),
(40, 'PRD.201811.0001', '2018-11-29', 6, '', 0, '2018-11-29 07:11:03', 1, '2018-11-29 07:11:17', 1),
(41, 'PRD.201811.0002', '2018-11-29', 48, '', 0, '2018-11-29 07:11:50', 1, '2018-11-29 07:11:03', 1),
(42, 'PRD.201812.0001', '2018-12-04', 15, '', 0, '2018-12-04 01:12:51', 1, '2018-12-04 02:12:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produksi_ingot_detail`
--

CREATE TABLE `produksi_ingot_detail` (
  `id` int(11) NOT NULL,
  `produksi_ingot_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `flag_spb` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_ingot_detail`
--

INSERT INTO `produksi_ingot_detail` (`id`, `produksi_ingot_id`, `rongsok_id`, `qty`, `line_remarks`, `flag_spb`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(17, 14, 1, 28, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 14, 2, 33, 'BISA KURANG', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 16, 1, 20, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 16, 1, 50, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 17, 2, 50, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 17, 1, 20, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 18, 1, 25, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 20, 2, 20, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 20, 1, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 21, 2, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 21, 1, 15, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 22, 1, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 22, 2, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 23, 1, 2, 'OK', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 24, 2, 10, 'UNTUK STOK', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 25, 2, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 26, 1, 5, 'STOK', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 27, 2, 5, 'BAHAN BAKU', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 28, 1, 8, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 29, 34, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 29, 41, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 30, 1, 15, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 32, 1, 90, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 32, 2, 100, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 33, 9, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 33, 34, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 33, 1, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 33, 58, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 33, 2, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 35, 2, 50, 'PRODUKSI', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 36, 1, 70, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 38, 18, 32, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 38, 57, 33, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 40, 32, 9, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 40, 50, 7, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 41, 42, 24, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, 41, 32, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, 42, 10, 50, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_sample`
--

CREATE TABLE `request_sample` (
  `id` int(11) NOT NULL,
  `no_request` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `approved` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  `rejected` datetime NOT NULL,
  `rejected_by` int(11) NOT NULL,
  `reject_remarks` text NOT NULL,
  `ttr_id` int(11) NOT NULL,
  `module` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_sample`
--

INSERT INTO `request_sample` (`id`, `no_request`, `tanggal`, `m_customer_id`, `marketing_id`, `jenis_barang`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `reject_remarks`, `ttr_id`, `module`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'REQ.25022018.0001', '2018-02-25', 1, 1, 'KAWAT', '', 9, '0000-00-00 00:00:00', 0, '2018-04-27 09:04:17', 1, 'TEST', 0, 'PengirimanSample', '2018-02-25 08:02:46', 1, '2018-02-25 08:02:07', 1),
(2, 'REQ.26022018.0001', '2018-02-26', 1, 1, 'KAWAT', '', 1, '2018-04-27 09:04:27', 1, '0000-00-00 00:00:00', 0, '', 5, 'PengirimanSample', '2018-02-26 12:02:56', 1, '2018-02-26 12:02:15', 1),
(3, 'REQ.27042018.0001', '2018-04-27', 1, 0, 'KAWAT', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 5, 'Retur', '2018-04-27 10:04:44', 1, '2018-04-27 10:04:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_sample_detail`
--

CREATE TABLE `request_sample_detail` (
  `id` int(11) NOT NULL,
  `request_sample_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `flag_skb` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_sample_detail`
--

INSERT INTO `request_sample_detail` (`id`, `request_sample_id`, `rongsok_id`, `qty`, `line_remarks`, `flag_skb`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 1, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 1, 2, 3, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 2, 1, 20, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 2, 2, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 3, 1, 25, 'KAWAT', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 3, 2, 12, 'BAJA', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `group_id`, `module_id`, `akses`) VALUES
(1, 3, 69, 1),
(2, 4, 69, 1),
(3, 5, 69, 1),
(4, 6, 69, 1),
(5, 3, 70, 1),
(6, 3, 71, 1),
(7, 3, 72, 1),
(8, 4, 72, 1),
(9, 5, 72, 0),
(10, 6, 72, 0),
(11, 4, 71, 0),
(12, 4, 70, 0),
(13, 5, 70, 0),
(14, 5, 71, 0),
(15, 6, 70, 0),
(16, 6, 71, 0),
(17, 5, 73, 1),
(18, 5, 74, 1),
(19, 5, 75, 1),
(20, 4, 75, 1),
(21, 4, 74, 1),
(22, 6, 74, 1),
(23, 6, 75, 1),
(24, 3, 76, 1),
(25, 3, 77, 1),
(26, 3, 78, 1),
(27, 3, 79, 1),
(28, 5, 80, 1),
(29, 6, 81, 1),
(30, 6, 82, 1),
(31, 5, 82, 1),
(32, 4, 82, 1),
(33, 3, 82, 1),
(34, 3, 83, 1),
(35, 4, 83, 1),
(36, 5, 83, 1),
(37, 6, 83, 1),
(38, 4, 84, 1),
(39, 4, 85, 1),
(40, 3, 84, 0),
(41, 3, 85, 0),
(42, 5, 84, 0),
(43, 5, 85, 0),
(44, 6, 84, 0),
(45, 6, 85, 0),
(46, 3, 54, 1),
(47, 4, 54, 1),
(48, 5, 54, 1),
(49, 6, 54, 1),
(50, 3, 55, 1),
(51, 3, 56, 1),
(52, 3, 57, 1),
(53, 3, 58, 1),
(54, 4, 55, 0),
(55, 3, 59, 1),
(56, 4, 59, 1),
(57, 5, 59, 1),
(58, 6, 59, 1),
(59, 3, 7, 1),
(60, 4, 7, 1),
(61, 5, 7, 1),
(62, 6, 7, 1),
(63, 7, 7, 1),
(64, 7, 54, 1),
(65, 7, 59, 1),
(66, 7, 60, 1),
(67, 7, 61, 1),
(68, 7, 62, 1),
(69, 7, 63, 1),
(70, 6, 63, 1),
(71, 5, 63, 0),
(72, 4, 63, 1),
(73, 4, 64, 1),
(74, 6, 64, 1),
(75, 7, 64, 1),
(76, 3, 63, 1),
(77, 3, 64, 1),
(78, 6, 65, 1),
(79, 6, 66, 1),
(80, 7, 66, 1),
(81, 4, 66, 1),
(82, 3, 66, 1),
(83, 3, 67, 1),
(84, 4, 67, 1),
(85, 6, 67, 1),
(86, 7, 67, 1),
(87, 4, 191, 1),
(88, 3, 193, 1),
(89, 3, 194, 1),
(90, 3, 195, 1),
(91, 3, 196, 1),
(92, 3, 197, 1),
(93, 3, 198, 1),
(94, 3, 199, 1),
(95, 3, 200, 1),
(96, 5, 200, 1),
(97, 5, 199, 1),
(98, 6, 199, 1),
(99, 6, 200, 1),
(100, 6, 201, 1),
(101, 6, 202, 1),
(102, 3, 203, 1),
(103, 3, 204, 1),
(104, 6, 204, 1),
(105, 6, 205, 1),
(106, 6, 206, 1),
(107, 3, 206, 1),
(108, 3, 207, 1),
(109, 4, 207, 1),
(110, 4, 206, 1),
(111, 5, 206, 1),
(112, 5, 207, 1),
(113, 7, 206, 1),
(114, 7, 207, 1),
(115, 6, 207, 1),
(116, 4, 199, 1),
(117, 4, 200, 1),
(118, 7, 199, 1),
(119, 7, 200, 1),
(120, 3, 208, 1),
(121, 3, 209, 1),
(122, 3, 210, 1),
(123, 3, 211, 1),
(124, 3, 212, 1),
(125, 4, 208, 1),
(126, 5, 208, 1),
(127, 6, 208, 1),
(128, 7, 208, 1),
(129, 6, 245, 1),
(130, 6, 246, 1),
(131, 6, 247, 1),
(132, 4, 241, 1),
(133, 3, 240, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rongsok`
--

CREATE TABLE `rongsok` (
  `id` int(11) NOT NULL,
  `kode_rongsok` varchar(25) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `uom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `alias` varchar(50) NOT NULL,
  `type_barang` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rongsok`
--

INSERT INTO `rongsok` (`id`, `kode_rongsok`, `nama_item`, `stok`, `uom`, `description`, `alias`, `type_barang`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'CAKBE', 'CANGKUL BEKAS', 664, 'KG', '', 'CANGKUL', 'Rongsok', '2018-01-24 09:01:04', 1, '2018-11-15 07:11:29', 1),
(2, '', 'POTONGAN PIPA BAJA', 380, 'KG', '', 'BAJA', 'Rongsok', '2018-01-24 09:01:36', 1, '2018-01-24 09:01:36', 1),
(3, '', 'INGOT RENDAH 1', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:40', 1, '2018-02-24 10:02:40', 1),
(4, '', 'INGOT RENDAH 2', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:52', 1, '2018-02-24 10:02:52', 1),
(5, '', 'INGOT RENDAH 3', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:02', 1, '2018-02-24 10:02:02', 1),
(6, '', 'INGOT RENDAH 4', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:22', 1, '2018-02-24 10:02:22', 1),
(7, '', 'BS', 0, 'KG', '', 'BS', 'BS', '2018-10-16 09:31:22', 1, '2018-10-01 00:00:00', 0),
(8, '', 'SISA WIP', 0, 'KG', 'SISA MASAK WIP', '', 'WIP', '2018-10-22 17:49:24', 1, '2018-10-22 18:51:31', 1),
(9, '01A0001', 'A-BCW TIPE 1', 75, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, '01A0002', 'A-BCW TIPE 2', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, '01AA001', 'ABU APOLLO ', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, '01AR001', 'A - RAMBUT', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, '01B0001', 'BC', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, '01B0002', 'TRAVO', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, '01B0003', 'COVERTAPE', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, '01B0004', 'COPPER SCRAP 2,90 MM - 3,20 MM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, '01BB001', 'B-BAKAR', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, '01BL001', 'B-LAUT', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, '01BS001', 'BS SDM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, '01BS002', 'BS ROLLING', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, '01BS003', 'BS APOLLO', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, '01BS004', 'BS INGOT', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, '01BS005', 'BS PRODUKSI 2.90', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, '01BS007', 'BS QC', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, '01BS008', 'TEMBAGA RONGSOK 8 MM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, '01BS009', 'BS TALI CUCI', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, '01BS010', 'BS KAWAT RAMBUT', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, '01BS011', 'AMPAS APOLLO', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, '01BS012', 'SERBUK APOLLO', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, '01BS013', 'SERBUK ROLLING', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, '01BS014', 'SERBUK DRAWING SDM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, '01BS015', 'BCW 0,50 MM SOFT', 58, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, '01BS016', 'BCW 0,60 MM SOFT', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, '01BS017', 'BCW 1,00 MM SOFT', 84, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, '01BS018', 'BCW 1,38 MM SOFT', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, '01BS019', 'BCW 1,50 MM SOFT', 140, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, '01BS020', 'BCW 1,78 MM SOFT', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, '01BS021', 'BCW 2,76 MM SOFT', 72, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, '01BS022', 'BCW 0,67 MM SOFT', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, '01BS023', 'BCW 0,78 MM SOFT', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, '01BS024', 'BCW 0,85 MM SOFT', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, '01BS025', 'BCC', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, '01BS026', '0,40 MM TINNED', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, '01BS027', '0,45 MM TINNED', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, '01BS028', '0,50 MM TINNED', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, '01BS029', 'BCW 2,26 MM SOFT', 25, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, '01BS030', 'BCW 3,55 MM SOFT', 51, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, '01BS031', '0,12 MM TINNED', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, '01BS032', '0,18 MM TINNED', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, '01BS034', 'BCW 0,12 MM SOFT TMS', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, '01BS035', 'BS 8,00 MM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, '01BS036', 'KURASAN ROLLING', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, '01BS037', 'SERBUK CUCIAN 8,00 MM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, '01BS038', 'BLEBEK DRAWING SDM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, '01BS039', 'BS TEMBAGA', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, '01BS040', 'BS 13,50 - 17,50 MM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, '01BT002', 'B-TELPON', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, '01C0001', 'COPPER SCRAP 2,80 MM - 3,20 MM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, '01C0002', 'CU WIRE C/W', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, '01C0003', 'COPPER SCRAP 2,80 MM - 3,20 MM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, '01D0001', 'DINAMO ', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, '01D0002', 'DINAMO BARU', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, '01D0003', 'DINAMO HALUS', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, '01D0004', 'D-KALENG', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, '01DD001', 'DANDANG', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, '01E0001', 'ENAMELL ', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, '01I0001', 'TEMBAGA INGOT RENDAH', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, '01LP001', 'LUMPUR TEMBAGA', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, '01M0001', 'MANGKUK CU', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, '01P0003', 'PLAT', 27, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, '01PB001', 'PIPA BARU', 27, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, '01PP001', 'PLAT PANEL', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, '01PR001', 'PIPA RONGSOKAN TEMBAGA', 39, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, '01PT001', 'PLAT TEMBAGA', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, '01S0001', 'SERUTAN', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, '01SD001', 'SERBUK DRAWING', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, '01T0001', 'TEMBAGA PUTIH', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, '01T0005', 'TEMBAGA AFKIR 8 MM', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, '01T0006', 'AMPAS TEMBAGA', 0, 'KG', '', '', 'Rongsok', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rongsok_old`
--

CREATE TABLE `rongsok_old` (
  `id` int(11) NOT NULL,
  `kode_rongsok` varchar(25) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `uom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `alias` varchar(50) NOT NULL,
  `type_barang` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rongsok_old`
--

INSERT INTO `rongsok_old` (`id`, `kode_rongsok`, `nama_item`, `stok`, `uom`, `description`, `alias`, `type_barang`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'CAKBE', 'CANGKUL BEKAS', 664, 'KG', '', 'CANGKUL', 'Rongsok', '2018-01-24 09:01:04', 1, '2018-11-15 07:11:29', 1),
(2, '', 'POTONGAN PIPA BAJA', 300, 'KG', '', 'BAJA', 'Rongsok', '2018-01-24 09:01:36', 1, '2018-01-24 09:01:36', 1),
(3, '', 'INGOT RENDAH 1', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:40', 1, '2018-02-24 10:02:40', 1),
(4, '', 'INGOT RENDAH 2', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:52', 1, '2018-02-24 10:02:52', 1),
(5, '', 'INGOT RENDAH 3', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:02', 1, '2018-02-24 10:02:02', 1),
(6, '', 'INGOT RENDAH 4', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:22', 1, '2018-02-24 10:02:22', 1),
(7, '', 'BS', 0, 'KG', '', 'BS', 'BS', '2018-10-16 09:31:22', 1, '2018-10-01 00:00:00', 0),
(8, '', 'SISA WIP', 0, 'KG', 'SISA MASAK WIP', '', 'WIP', '2018-10-22 17:49:24', 1, '2018-10-22 18:51:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `no_sales_order` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `flag_ppn` tinyint(1) NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `no_sales_order`, `tanggal`, `m_customer_id`, `jenis_barang_id`, `flag_ppn`, `marketing_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'SO.18022018.0001', '2018-11-13', 3, 4, 1, 1, '2018-02-18 07:02:23', 1, '2018-11-14 01:11:29', 1),
(2, 'SO.27042018.0001', '2018-04-27', 2, 4, 1, 4, '2018-04-27 10:04:20', 1, '2018-04-27 10:04:44', 1),
(3, 'SO.25022016.0001', '2016-02-25', 2, 4, 0, 2, '2016-02-25 07:02:17', 1, '2016-02-25 07:02:14', 1),
(4, 'SO.12102018.0001', '2018-10-12', 2, 4, 0, 1, '2018-10-12 03:10:06', 1, '2018-10-12 03:10:53', 1),
(5, 'SO.12102018.0003', '2018-10-12', 1, 3, 0, 4, '2018-10-12 06:10:39', 1, '2018-11-13 12:11:19', 1),
(6, 'SO.30102018.0001', '2018-11-21', 3, 2, 0, 1, '2018-10-30 02:10:58', 1, '2018-11-21 08:11:23', 1),
(7, 'SO.12112018.0001', '2018-11-26', 3, 2, 0, 1, '2018-11-12 04:11:38', 1, '2018-11-26 11:11:59', 1),
(8, 'SO.16112018.0001', '2018-11-26', 3, 4, 0, 1, '2018-11-16 03:11:04', 1, '2018-11-26 11:11:14', 1),
(14, 'SO.21112018.0004', '2018-11-21', 3, 0, 0, 1, '2018-11-21 08:11:19', 1, '2018-11-21 08:11:19', 1),
(15, 'SO.22112018.0001', '2018-12-04', 6, 4, 0, 1, '2018-11-22 05:11:14', 1, '2018-12-04 11:12:07', 1),
(16, 'SO.26112018.0001', '2018-11-26', 3, 0, 0, 1, '2018-11-26 11:11:40', 1, '2018-11-26 11:11:40', 1),
(17, 'SO.26112018.0002', '2018-11-26', 3, 0, 0, 1, '2018-11-26 11:11:00', 1, '2018-11-26 11:11:00', 1),
(18, 'SO.26112018.0003', '2018-11-26', 6, 0, 0, 1, '2018-11-26 11:11:19', 1, '2018-11-26 11:11:19', 1),
(19, 'SO.26112018.0004', '2018-11-26', 6, 0, 0, 1, '2018-11-26 01:11:50', 1, '2018-11-26 01:11:50', 1),
(20, 'SO.27112018.0001', '2018-11-27', 5, 0, 0, 1, '2018-11-27 11:11:38', 1, '2018-11-27 11:11:38', 1),
(21, 'SO.201811.0001', '2018-11-29', 6, 0, 0, 1, '2018-11-29 08:11:04', 1, '2018-11-29 08:11:04', 1),
(22, 'SO.201812.0002', '2018-12-03', 5, 0, 0, 1, '2018-12-03 04:12:59', 1, '2018-12-04 02:12:29', 1),
(23, 'SO.201812.0003', '2018-12-04', 6, 0, 0, 1, '2018-12-04 11:12:13', 1, '2018-12-04 11:12:13', 1),
(24, 'SO.201812.0004', '2018-12-04', 6, 0, 0, 1, '2018-12-04 11:12:23', 1, '2018-12-04 11:12:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_detail`
--

CREATE TABLE `sales_order_detail` (
  `id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `flag_dtr` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_detail`
--

INSERT INTO `sales_order_detail` (`id`, `sales_order_id`, `rongsok_id`, `qty`, `bruto`, `netto`, `amount`, `total_amount`, `flag_dtr`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 2, 1, 50, 0, 25000, 25000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 1, 2, 1, 15, 0, 35000, 35000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 2, 1, 2, 0, 0, 25000, 50000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 2, 2, 1, 0, 0, 13000, 13000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 3, 1, 5, 340, 320, 30000, 150000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 3, 2, 10, 330, 280, 25000, 250000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 4, 1, 200, 100, 50, 1200, 240000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 4, 2, 250, 150, 100, 2400, 600000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 6, 2, 3, 320, 250, 500000, 1500000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 6, 2, 2, 220, 150, 300000, 600000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 7, 2, 1, 12, 10, 30000, 30000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 5, 2, 13, 43, 35, 40000, 520000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 8, 1, 12, 120, 108, 70000, 840000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 15, 48, 40, 418, 400, 300000, 12000000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 15, 43, 40, 432, 412, 400000, 16000000, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skb`
--

CREATE TABLE `skb` (
  `id` int(11) NOT NULL,
  `no_skb` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `spb_id` int(11) NOT NULL,
  `request_sample_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `flag_produksi` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skb`
--

INSERT INTO `skb` (`id`, `no_skb`, `tanggal`, `jenis_barang`, `spb_id`, `request_sample_id`, `remarks`, `flag_produksi`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'SKB.21022018.0001', '2018-02-21', 'INGOT', 1, 0, '', 0, '2018-02-21 11:02:00', 1, '2018-02-21 11:02:00', 1),
(2, 'SKB.25022018.0001', '2018-02-25', 'KAWAT HITAM', 2, 0, '', 0, '2018-02-25 08:02:00', 1, '2018-02-25 08:02:00', 1),
(3, 'SKB.25022018.0002', '2018-02-25', 'KAWAT HITAM', 3, 0, '', 0, '2018-02-25 11:02:13', 1, '2018-02-25 11:02:13', 1),
(4, 'SKB.25022018.0003', '2018-02-25', 'KAWAT', 0, 1, '', 0, '2018-02-25 09:02:29', 1, '2018-02-25 09:02:29', 1),
(8, 'SKB.17052018.0001', '2018-05-17', 'INGOT', 4, 0, '', 0, '2018-05-17 05:05:28', 1, '2018-05-17 05:05:28', 1),
(9, 'SKB.03102018.0001', '2018-10-03', 'INGOT', 7, 0, '', 0, '2018-10-03 04:10:16', 1, '2018-10-03 04:10:16', 1),
(10, 'SKB.03102018.0002', '2018-10-03', 'INGOT', 6, 0, '', 0, '2018-10-03 04:10:23', 1, '2018-10-03 04:10:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skb_detail`
--

CREATE TABLE `skb_detail` (
  `id` int(11) NOT NULL,
  `skb_id` int(11) NOT NULL,
  `spb_detail_id` int(11) NOT NULL,
  `request_sample_detail_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `flag_dtr` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skb_detail`
--

INSERT INTO `skb_detail` (`id`, `skb_id`, `spb_detail_id`, `request_sample_detail_id`, `rongsok_id`, `qty`, `line_remarks`, `flag_dtr`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 1, 0, 1, 500, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 1, 2, 0, 2, 200, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 2, 3, 0, 1, 100, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 2, 4, 0, 2, 50, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 3, 5, 0, 1, 100, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 3, 6, 0, 2, 25, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 4, 0, 1, 1, 2, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 4, 0, 2, 2, 3, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 8, 7, 0, 1, 0, '', 0, '2018-05-17 05:05:28', 1, '2018-05-17 05:05:28', 1),
(12, 8, 8, 0, 2, 0, '', 0, '2018-05-17 05:05:28', 1, '2018-05-17 05:05:28', 1),
(13, 9, 12, 0, 1, 0, '', 0, '2018-10-03 04:10:16', 1, '2018-10-03 04:10:16', 1),
(14, 9, 13, 0, 2, 0, '', 0, '2018-10-03 04:10:16', 1, '2018-10-03 04:10:16', 1),
(15, 10, 10, 0, 1, 0, '', 0, '2018-10-03 04:10:23', 1, '2018-10-03 04:10:23', 1),
(16, 10, 11, 0, 2, 0, '', 0, '2018-10-03 04:10:23', 1, '2018-10-03 04:10:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id` int(11) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `alias` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'BUSI', 'BUAH', '', '', '2018-01-24 09:01:23', 1, '2018-01-24 09:01:23', 1),
(2, 'BAN', 'BUAH', '', '', '2018-01-24 09:01:38', 1, '2018-01-24 09:01:38', 1),
(3, '06AA002- ABU ARANG @ 25 KG', 'KG', '', '06AA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, '06AB001- ARANG BAKAR', 'KG', '', '06AB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, '06AF001- ANTI FOAM (BUSA) DM 97', 'PAIL', '', '06AF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, '06AK003- AIR KERAS', 'KG', '', '06AK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, '06AL001- ALUM', 'GALON', '', '06AL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, '06AS001- AIR SETTING MORTAR TYPE TRISET ', 'PAIL', '', '06AS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, '06BA001- BATA API SK-36 UK.20*114*65 PERSEGI STD', 'BUAH', '', '06BA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, '06BA002- BATA API SK-36 UK.230*114*65/55 SERONG', 'BUAH', '', '06BA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, '06CI001- CETAKAN INGOT', 'KG', '', '06CI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, '06CS001- CASTABLE C-16 @25KG', 'KG', '', '06CS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, '06DL001- DRAW LUB RC-1 @ 20 LTR', 'PAIL', '', '06DL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, '06FB001- FIRE BRICK SK 36 @ 5 TON', 'SET', '', '06FB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, '06FB002- FIRE BRICK SK 36 @ 10 TON', 'SET', '', '06FB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, '06FB003- FIRE BRICK ( INDOPORLEN ) SK-36 @ 10 TON', 'SET', '', '06FB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, '06FB004- FIRE BRICK SK-32 TYPE AI', 'BUAH', '', '06FB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, '06FB005- FIRE BRICK SK-36 TYPE AI', 'BUAH', '', '06FB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, '06FB006- FIRE BRICK SK-36 TIPE : CX', 'BUAH', '', '06FB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, '06FB007- FIRE BRICK SK-36 TYPE : D', 'BUAH', '', '06FB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, '06HD001- HOUGHTO DRAW WD 4100', 'DRUM', '', '06HD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, '06JP001- JERAMI PADI', 'COLD', '', '06JP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, '06KB001- KARUNG BAGOR UK. 120 X 24 MTR', 'ROLL', '', '06KB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, '06KP001- KAYU PALLENT', 'BTG', '', '06KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, '06LU001- LUBRICANT 2500', 'DRUM', '', '06LU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, '06LU002- LUBRICANT 2000', 'DRUM', '', '06LU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, '06MP001- MASKER PLASTIC', 'BUAH', '', '06MP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, '06MW001- MEIDRAW 1010', 'DRUM', '', '06MW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, '06NB001- NATRIUM BISULFIT', 'GALON', '', '06NB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, '06PS001- PASIR SILICA', 'KG', '', '06PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, '06PT002- PASIR TAHAN API', 'KG', '', '06PT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, '06RF001- REFKAST 155 @ 25 KG', 'KG', '', '06RF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, '06SA001- SEMEN API SK-36 @ 50 KG', 'ZAK', '', '06SA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, '06SC001- SABUN CREAM @ 5 KG', 'EMBER', '', '06SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, '07GS001- GREASE MPC 3 NLGI 3', 'PAIL', '', '07GS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, '07GS002- GREASE LGHP 2/5 SKF @ 5 KG', 'GALON', '', '07GS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, '07GU001- GREASE UNICAL 100 A', 'PAIL', '', '07GU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, '07MS001- MINYAK SOLAR', 'LITER', '', '07MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, '07OC001- OLI COMPRO', 'PAIL', '', '07OC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, '07OM001- OLI MEDITRAN S SAE 40', 'DRUM', '', '07OM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, '07OM002- OLI MEDITRAN S SAE 10', 'DRUM', '', '07OM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, '07OM004- OLI MEDITRAN SAE 90', 'DRUM', '', '07OM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, '07OM005- OLI MEDITRAN SAE 40', 'DRUM', '', '07OM005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, '07OM006- OLI MEDITRAN SAE 10', 'DRUM', '', '07OM006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, '07OS001- OLI COMPRESSOR KOBELCO SCREW @ 20LTR', 'PAIL', '', '07OS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, '07PK001- PEMADAM KEBAKARAN YAMATO ( YAM-20 L ) @ ', 'TBG', '', '07PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, '07PK005- PEMADAM KEBAKARAN (CO2/GAS)@3.2 KG', 'TBG', '', '07PK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, '07SD001- SHELL DIESOLINE ( HSD / SOLAR )', 'LITER', '', '07SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, '08AC001- AC SPLIT 1 PK', 'UNIT', '', '08AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, '08AC002- AC SPLIT 2 PK', 'BUAH', '', '08AC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, '08AP001- AIR FURIPUR MERK SHARP SC 86', 'UNIT', '', '08AP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, '08BL001- BANGKU LIPAT', 'BUAH', '', '08BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, '08CH001- CHARGER HT', 'BUAH', '', '08CH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, '08CN001- CONNECTOR', 'BUAH', '', '08CN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, '08CO001- COMPUTER', 'UNIT', '', '08CO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, '08CP001- CENTRIFUGAK PUMP MEGAFLO + MOTOR TECO', 'UNIT', '', '08CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, '08FD001- FLAS DISK', 'UNIT', '', '08FD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, '08GA001- GENTONG AIR', 'BUAH', '', '08GA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, '08GE001- GEMBOK 50 MM ( LEHER PANJANG )', 'BUAH', '', '08GE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, '08GJ001- GORDEN JENDELA', 'SET', '', '08GJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, '08HP001- HP NOKIA', 'UNIT', '', '08HP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, '08HP002- HAND PHONE ESIA', 'UNIT', '', '08HP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, '08HP003- HAND PHONE CROSS', 'BUAH', '', '08HP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, '08HP004- HELM PROYEK + BREKET + FC48 HITAM', 'SET', '', '08HP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, '08HP005- HELM PROYEK + BREKET + FC 48 BENING', 'SET', '', '08HP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, '08HPS01- HP SAMSUNG', 'BUAH', '', '08HPS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, '08IC001- INSTALASI CAMERA', 'TITIK', '', '08IC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, '08IK001- INSTALSI KABEL TELEPHONE', 'TITIK', '', '08IK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, '08IL001- INSTALASI LAN', 'TITIK', '', '08IL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, '08IP001- IPAD', 'UNIT', '', '08IP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, '08JB001- JUNCTION BOX +INSTALASI', 'UNIT', '', '08JB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, '08KA001- KIPAS ANGIN', 'UNIT', '', '08KA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, '08KA002- KIPAS ANGIN DINDING 12 \"', 'UNIT', '', '08KA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, '08KG001- KOMPOR GAS', 'UNIT', '', '08KG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, '08KL001- KURSI LIPAT ', 'BUAH', '', '08KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, '08KM001- KARET MONTING TIMBANGAN', 'BUAH', '', '08KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, '08LH001- LAMPU EMERGENCY', 'BUAH', '', '08LH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, '08LK001- LEMARI KAYU', 'UNIT', '', '08LK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, '08MA001- METERAN AIR TYPE:B CAP.7M3 ACTARIS', 'UNIT', '', '08MA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, '08MB002- MOBIL COLT DIESEL 125 PS + BOX BESI', 'UNIT', '', '08MB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, '08MB005- MOBIL TOYOTA INNOVA DIESEL ABU-ABU METALI', 'UNIT', '', '08MB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, '08MB006- MOBIL TOYOTA INNOVA SILVER METALIK TAHUN ', 'UNIT', '', '08MB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, '08MB007- MOBIL NISAN TEANA 2,3 AT TAHUN 2005', 'UNIT', '', '08MB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, '08MD001- MESIN DIESEL MERK MERCY', 'UNIT', '', '08MD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, '08MG001- MESIN GURINDA POLES CAT', 'UNIT', '', '08MG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(86, '08MJ002- MEJA KANTOR', 'SET', '', '08MJ002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(87, '08MJ003- MEJA TULIS', 'BUAH', '', '08MJ003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(88, '08MS008- MESIN SAMBUNG TYPE NTC 104', '', '', '08MS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(89, '08MS009- MESIN SAMBUNG TYPE NTC 220', 'SET', '', '08MS009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(90, '08NB002- NETBOOK', 'UNIT', '', '08NB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(91, '08PA001- POMPA AIR DAP', 'UNIT', '', '08PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(92, '08PAR01- PINTU ALUMUNIUM', 'SET', '', '08PAR01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(93, '08PE001- PRINTER EPSON LQ - 2190', 'UNIT', '', '08PE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(94, '08PF001- PIPA FLEXYBLE STEANLES STEEL 2\" X 3 MTR', 'BTG', '', '08PF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(95, '08PI001- PRINTER IP 2770 CANON', 'UNIT', '', '08PI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(96, '08PS001- PRINTER SCAN EPSON L - 200', 'UNIT', '', '08PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(97, '08PT001- PIPA TEMBAGA 1/2*1/4', 'METER', '', '08PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(98, '08RC000- RICE COOKER', 'BUAH', '', '08RC000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(99, '08RO001- ROOSTERS CONTINENTAL 20*20 CM', 'BUAH', '', '08RO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(100, '08SB001- SEPATU BOOT', 'PSG', '', '08SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(101, '08SC001- SCANNER', 'UNIT', '', '08SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(102, '08SM001- SEPEDA MOTOR HONDA VARIO TECHNO 125', 'UNIT', '', '08SM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(103, '08SP001- AC SPLIT PANASONIC CS PC 9 NKJ 1 PK', 'UNIT', '', '08SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(104, '08SP002- AC SPLIT PANASONIC CSPC 18 NKP 2 PK', 'UNIT', '', '08SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(105, '08SPT01- SERVICE PRINTER TIMBANGAN', 'UNIT', '', '08SPT01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(106, '08ST002- SENTRAL TELEPHONE', 'UNIT', '', '08ST002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(107, '08SW001- SOFTWARE WYDE RECEIVING INDIKATOR DIGI DI', 'UNIT', '', '08SW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(108, '08TB002- TIMBANGAN MANUAL MDL:TBI CAPS. 500 KG', 'UNIT', '', '08TB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(109, '08TC001- TELEPHONE CONTROL', 'BUAH', '', '08TC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(110, '08TI001- TELEPHONE INTERCOM', 'UNIT', '', '08TI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(111, '08TL002- TELEPHONE', 'UNIT', '', '08TL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(112, '08TL003- TELEPHONE + PEMASANGAN', 'UNIT', '', '08TL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(113, '08UP001- UPS', 'UNIT', '', '08UP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(114, '08VS001- VIDEO SWITCHER', 'UNIT', '', '08VS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(115, '08WH001- ELECTRIC WATER HEATER 100 LTR', 'UNIT', '', '08WH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(116, '08WP001- WERPAK', 'BUAH', '', '08WP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(117, '0901SDD- SERVICE DIES DIAMOND 0,175MM', 'BUAH', '', '0901SDD', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(118, '09A0001- ALKOHOL 70 %', 'PAIL', '', '09A0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(119, '09A0006- ACETYLIN', 'TBG', '', '09A0006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(120, '09AA012- AIR ACCU SIR', 'JRG', '', '09AA012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(121, '09AB001- AS BROWN 9\" x 255 MM', 'BTG', '', '09AB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(122, '09AC001- ACCU 45 A/ 12 V', 'BUAH', '', '09AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(123, '09AC002- AIR CYLINDER KCC TYPE:ACMN LB50-820', 'BUAH', '', '09AC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(124, '09AC003- AIR CYLINDER AMLN50 - 20 TPC', 'BUAH', '', '09AC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(125, '09AC004- AIR CYLINDER KCC TYPE:ACMN AC80-S300', 'BUAH', '', '09AC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(126, '09AC006- AIR CYLINDER KCC TYPE : ACMN CA80-S25', 'BUAH', '', '09AC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(127, '09AC007- AIR CYLINDER BORE 50MM X AS 20MM X STROKE', 'BUAH', '', '09AC007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(128, '09AD001- ADAPTOR 12 V @ 1 BUAH', 'BUAH', '', '09AD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(129, '09AD002- AUTO DRAIN', 'UNIT', '', '09AD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(130, '09AD003- AIR DRYER FR 050 AP', 'UNIT', '', '09AD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(131, '09AF002- AIR FILTER MDL T 60 P', 'BUAH', '', '09AF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(132, '09AF003- AIR FILTER 711-21111-66010', 'BUAH', '', '09AF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(133, '09AF005- AIR FILTER (AIR UNIT)1/4\":WDL:AC 2000-02', 'BUAH', '', '09AF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(134, '09AF006- AIR FILTER T 60 U', 'UNIT', '', '09AF006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(135, '09AF007- AIR FILTER T 60 P', 'UNIT', '', '09AF007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(136, '09AK003- AS KUNINGAN 3 3/4\" X 1,1 MTR @ 65 KG', 'BTG', '', '09AK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(137, '09AK004- AIR KUNINGAN 0 83 MM', 'KG', '', '09AK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(138, '09AK005- AS KUNINGAN 9\" x 255 MM', 'BTG', '', '09AK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(139, '09AK006- ANGKUR 3/4 X 60 CM', 'BUAH', '', '09AK006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(140, '09AK007- AS KUNINGAN AB-2 1/2\" X 2 MTR', 'BTG', '', '09AK007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(141, '09AK008- AS KUNINGAN AB-2 UK. 76 MM X 50 CM', 'BTG', '', '09AK008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(142, '09AM001- AMPER METER CLASS 1,5 UK.144X144 WITH CT', 'SET', '', '09AM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, '09AN008- AS NYLON 0 15 MM ', 'METER', '', '09AN008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, '09AN009- AS NYLON 0 20 MM ', 'METER', '', '09AN009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, '09AN010- AS NYLON 0 25 MM', 'METER', '', '09AN010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, '09AP001- AIR PURIFIER MERK SHARP KC 86', 'UNIT', '', '09AP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, '09AP002- AS PULLY', 'BUAH', '', '09AP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, '09AR003- AS RODA', 'BUAH', '', '09AR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, '09AR007- AMPLAS ROLL 3\"*180*50 M', 'ROLL', '', '09AR007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, '09AR011- AMPLAS ROLL UK-3\"*400*50 METER', 'ROLL', '', '09AR011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, '09AR012- AMPLAS ROLL UK. 800 X 50 MTR', 'ROLL', '', '09AR012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, '09AS001- AS STENLESS 35 MM*2500 MM', 'BTG', '', '09AS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, '09AS002- AMPLAS NO.1000', 'LBR', '', '09AS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, '09AS003- AMPLAS NO.800', 'LBR', '', '09AS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, '09AS004- ADAPTER SLEEVES HE 318 3 1/4\" GP', 'BUAH', '', '09AS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, '09AU001- AIR UNIT KCC TYPE:KAU2000M-02G 1/4\"', 'BUAH', '', '09AU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, '09AU002- AIR UNIT KCC TYPE:KAU4000M-04G 1/2\"', 'BUAH', '', '09AU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, '09AU003- FRL COMBINATION PORT 1/4\" AC2000-02 PBC', 'BUAH', '', '09AU003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, '09AU004- FRL COMBINATION PORT 1/2\" AC4000-04 PBC', 'BUAH', '', '09AU004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, '09BA001- BESI AS ROLL', 'BUAH', '', '09BA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, '09BA002- BAUT 8*10', 'BUAH', '', '09BA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, '09BA003- BESI AS SAKURA', 'BUAH', '', '09BA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, '09BA006- BESI AS ANCURAN 200*85', 'BUAH', '', '09BA006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, '09BA007- BESI AS ANCURAN (FCD PULLEY)12 \" X 50 CM', 'BTG', '', '09BA007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, '09BA008- BESI AS SCM 440 1/2\"', 'BTG', '', '09BA008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, '09BB001- BESI BETON O 19 MM', 'BTG', '', '09BB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, '09BB002- BALL BEARING P/N. 9503 003 5291 - A', 'BUAH', '', '09BB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, '09BC001- BATTERY CHARGER 12 S/D 24 VOLT', 'UNIT', '', '09BC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, '09BE001- BEARING 22216 B01', 'BUAH', '', '09BE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, '09BE002- BEARING 51107', 'BUAH', '', '09BE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, '09BE003- BEARING 51310', 'BUAH', '', '09BE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, '09BE004- BEARING N 220 ECP', 'BUAH', '', '09BE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, '09BE005- BEARING 2907', 'BUAH', '', '09BE005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, '09BE006- BEARING 2913', 'BUAH', '', '09BE006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, '09BE007- BEARING 6007 ZZ', 'BUAH', '', '09BE007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, '09BE008- BEARING 6002 ZZ', 'BUAH', '', '09BE008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, '09BE009- BEARING 6201 ZZ', 'BUAH', '', '09BE009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, '09BE010- BEARING 6202 ZZ', 'BUAH', '', '09BE010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, '09BE011- BEARING 6203 ZZ', 'BUAH', '', '09BE011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, '09BE012- BEARING 6204 ZZ', 'BUAH', '', '09BE012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, '09BE013- BEARING 6205 ZZ', 'BUAH', '', '09BE013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, '09BE014- BEARING 6206 ZZ', 'BUAH', '', '09BE014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, '09BE015- BEARING 6207 ZZ', 'BUAH', '', '09BE015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, '09BE016- BEARING 6209 ZZ', 'BUAH', '', '09BE016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, '09BE017- BEARING 6212 ZZ', 'BUAH', '', '09BE017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, '09BE018- BEARING 625 ZZ', 'BUAH', '', '09BE018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, '09BE019- BEARING 608 ZZ', 'BUAH', '', '09BE019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, '09BE020- BEARING UCF 209 FYH', 'BUAH', '', '09BE020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, '09BE021- BEARING UCF 208', 'BUAH', '', '09BE021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, '09BE022- BEARING 6310 ZZ', 'BUAH', '', '09BE022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, '09BE023- BEARING 51205', 'BUAH', '', '09BE023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, '09BE024- BEARING 6006 ZZ', 'BUAH', '', '09BE024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, '09BE025- BEARING 6208 ZZ', 'BUAH', '', '09BE025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, '09BE026- BEARING 6306 ZZ', 'BUAH', '', '09BE026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, '09BE027- BEARING 6307 ZZ', 'BUAH', '', '09BE027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, '09BE028- BEARING 6311 ZZ', 'BUAH', '', '09BE028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, '09BE029- BEARING 6312 ZZ', 'BUAH', '', '09BE029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, '09BE030- BEARING 6308 ZZ', 'BUAH', '', '09BE030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, '09BE031- BEARING 6309 ZZ', 'BUAH', '', '09BE031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, '09BE032- BEARING 6000 ZZ', 'BUAH', '', '09BE032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, '09BE033- BEARING 6001 ZZ', 'BUAH', '', '09BE033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, '09BE034- BEARING 6210 ZZ', 'BUAH', '', '09BE034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, '09BE035- BEARING 6302 ZZ', 'BUAH', '', '09BE035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, '09BE036- BEARING 7205 ZZ', 'BUAH', '', '09BE036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, '09BE037- BEARING HR 30307', 'BUAH', '', '09BE037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(206, '09BE038- BEARING 6313 ZZ', 'BUAH', '', '09BE038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(207, '09BE039- BEARING 6213 ZZ', 'BUAH', '', '09BE039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(208, '09BE040- BEARING 6304 ZZ', 'BUAH', '', '09BE040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(209, '09BE041- BEARING HC 32307 JR ', 'BUAH', '', '09BE041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(210, '09BE042- BEARING 6200 ZZ', 'BUAH', '', '09BE042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(211, '09BE043- BEARING 6005 ZZ', 'BUAH', '', '09BE043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(212, '09BE044- BEARING 6303 ZZ', 'BUAH', '', '09BE044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(213, '09BE045- BEARING 6305 ZZ', 'BUAH', '', '09BE045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(214, '09BE046- BEARING 6316 ZZ', 'BUAH', '', '09BE046', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(215, '09BE047- BEARING 634 ZZ', 'BUAH', '', '09BE047', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(216, '09BE048- BEARING NU 312', 'BUAH', '', '09BE048', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(217, '09BE049- BEARING 30210', 'BUAH', '', '09BE049', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(218, '09BE050- BEARING 51309 F A G', 'BUAH', '', '09BE050', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(219, '09BE051- BEARING 6211 ZZ', 'BUAH', '', '09BE051', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(220, '09BE052- BEARING 32218 JR', 'BUAH', '', '09BE052', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(221, '09BE053- BEARING F 605 ZZ', 'BUAH', '', '09BE053', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(222, '09BE054- BEARING 22312 KOYO', 'BUAH', '', '09BE054', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(223, '09BE055- BEARING 6004 ZZ', 'BUAH', '', '09BE055', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(224, '09BE056- BEARING LBE 20', 'BUAH', '', '09BE056', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(225, '09BE057- BEARING 6410 ZZ', 'BUAH', '', '09BE057', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(226, '09BE058- BEARING 51110', 'BUAH', '', '09BE058', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(227, '09BE059- BEARING 30213', 'BUAH', '', '09BE059', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(228, '09BE060- BEARING 51120', 'BUAH', '', '09BE060', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(229, '09BE061- BEARING SKF 23134 C', 'BUAH', '', '09BE061', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(230, '09BE063- BEARING 30307', 'BUAH', '', '09BE063', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(231, '09BE064- BEARING 6214 ZZ', 'BUAH', '', '09BE064', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(232, '09BE065- BEARING 32214 J', 'BUAH', '', '09BE065', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(233, '09BE066- BEARING 30313', 'BUAH', '', '09BE066', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(234, '09BE067- BEARING 30216', 'BUAH', '', '09BE067', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(235, '09BE068- BEARING 6215 SKF', 'BUAH', '', '09BE068', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(236, '09BE069- BEARING 23034 C SKF', 'BUAH', '', '09BE069', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(237, '09BE070- BEARING 6301 ZZ', 'BUAH', '', '09BE070', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(238, '09BE071- BEARING 3205  BTVH', 'BUAH', '', '09BE071', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(239, '09BE072- BEARING 1209', 'BUAH', '', '09BE072', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(240, '09BE073- BEARING 53311', 'BUAH', '', '09BE073', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(241, '09BE074- BEARING 6318 ZZ', 'BUAH', '', '09BE074', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(242, '09BE075- BEARING UNIT UCF 206 J', 'BUAH', '', '09BE075', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(243, '09BE076- BEARING CONUS HE 318 SKF', 'BUAH', '', '09BE076', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(244, '09BE077- BEARING 6326 SKF', 'BUAH', '', '09BE077', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(245, '09BE078- BEARING 22330 SKF', 'BUAH', '', '09BE078', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(246, '09BE079- BEARING 23030', 'BUAH', '', '09BE079', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(247, '09BE080- BEARING 21318 CE', 'BUAH', '', '09BE080', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(248, '09BE081- BEARING 6316 C3 SKF', 'BUAH', '', '09BE081', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(249, '09BE082- BEARING 6318 C3 SKF', 'BUAH', '', '09BE082', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(250, '09BE083- BEARING 21312 C3 SKF', 'BUAH', '', '09BE083', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(251, '09BE084- BEARING 6313 ZZ / C3 SKF', 'BUAH', '', '09BE084', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(252, '09BE085- BEARING 6315 ZZ SKF', 'BUAH', '', '09BE085', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(253, '09BE086- BEARING 32209 KOYO', 'BUAH', '', '09BE086', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(254, '09BE087- BEARING 30312 KOYO', 'BUAH', '', '09BE087', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(255, '09BE088- BEARING 32307 JR KOYO', 'BUAH', '', '09BE088', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(256, '09BE089- BEARING YAJ 218 - 2 RF DIA 80 MM SKF', 'BUAH', '', '09BE089', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(257, '09BE090- BEARING 6218 ZZ', 'BUAH', '', '09BE090', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(258, '09BE091- BEARING 51213', 'BUAH', '', '09BE091', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(259, '09BE092- BEARING 22211 RHRW33', 'BUAH', '', '09BE092', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(260, '09BE093- BEARING 6219', 'BUAH', '', '09BE093', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(261, '09BE094- BEARING NU 220 ETVP2 C3', 'BUAH', '', '09BE094', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(262, '09BE095- BEARING 6204 NR', 'BUAH', '', '09BE095', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(263, '09BF001- BRAKE FLUID', 'TIN', '', '09BF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(264, '09BFG01- BOLT ( G )', 'PCS', '', '09BFG01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(265, '09BG001- BATTERY GP 2100', 'BUAH', '', '09BG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(266, '09BG061- BATU GURINDA 4 \"', 'BUAH', '', '09BG061', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(267, '09BG063- BATU GURINDA 12 \"', 'BUAH', '', '09BG063', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(268, '09BG064- BATU GURINDA POTONG 4\"', 'BUAH', '', '09BG064', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(269, '09BH001- BUSA HITAM', 'MTR', '', '09BH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(270, '09BH002- BRUSH HOLDER + KARBON BRUSH', 'SET', '', '09BH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(271, '09BHPNM- BEARING HUB P/N ME 620330', 'BUAH', '', '09BHPNM', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(272, '09BI001- BESI UNP 100*50*60 METER', 'BTG', '', '09BI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(273, '09BI002- BESI PLAT 5 MM 4*8', 'LBR', '', '09BI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(274, '09BI003- BESI SIKU 50*50*5*6 METER', 'BTG', '', '09BI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(275, '09BI004- BESI PLAT 10 MM 4 \" X 8 \"', 'LBR', '', '09BI004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(276, '09BI005- BESI SIKU 60 X 60 X 5 X 6 METER', 'BTG', '', '09BI005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(277, '09BI006- BESI KOTAK UK. 70 X 50 X 5 MM X 6 METER', 'BTG', '', '09BI006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(278, '09BI007- BUSI', 'BUAH', '', '09BI007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(279, '09BI008- BESI PLAT BORDES 5 MM 4 X 8', 'LBR', '', '09BI008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(280, '09BI014- BESI AS S 45 C 1,5 \" X 6 MTR', 'BTG', '', '09BI014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(281, '09BI015- BESI AS S 45 C 7/8 \" X 6 MTR', 'BTG', '', '09BI015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(282, '09BI016- BESI SIKU MILD STEEL 60 X 60 X 5 X 6 MTR', 'BTG', '', '09BI016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(283, '09BI017- BESI UNP MILD STEEL 100 X 50 X 6 X 6 MTR', 'BTG', '', '09BI017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(284, '09BIPN1- BEARING INPUT P/N 30621-55900', 'BUAH', '', '09BIPN1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(285, '09BK001- BLOK KUNINGAN MDL T', 'BUAH', '', '09BK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(286, '09BK002- BLOCK KUNINGAN MODEL PERSEGI', 'BUAH', '', '09BK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(287, '09BL001- BAN LUAR 600*9 10 PLY', 'BUAH', '', '09BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(288, '09BL002- BAUT SHIM L', 'BUAH', '', '09BL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(289, '09BL003- BLADE 2 TEETH P/N. 4145 713 3808 - A', 'BUAH', '', '09BL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(290, '09BM015- BAUT+MUR 5/8 X 2\"', 'BUAH', '', '09BM015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(291, '09BM016- BAUT MUR 5/8 X 2 1/2\"', 'BUAH', '', '09BM016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(292, '09BM064- BAUT MUR T RING 16*100 MM', 'BUAH', '', '09BM064', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(293, '09BM065- BAUT MUR + RING PLAT 5/8 x 2\"', 'BUAH', '', '09BM065', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(294, '09BM066- BAUT MUR + RING PLAT 5/8 x 3\"', 'BUAH', '', '09BM066', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(295, '09BM067- BAUT MUR BAJA + RING PLAT 14 x 50', 'BUAH', '', '09BM067', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(296, '09BM070- BOUME METER 0-70', 'BUAH', '', '09BM070', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(297, '09BM071- BAUT + MUR + RING 5 X 15', 'BUAH', '', '09BM071', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(298, '09BM072- BAUT + MUR BAJA UK. 1/2  X 1 1/2\"', 'SET', '', '09BM072', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(299, '09BM075- BAUT MUR 88 FULL DRAT 10 X 110', 'BUAH', '', '09BM075', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(300, '09BM076- BAUT MUR 88 FULL DRAT 10 X 70', 'BUAH', '', '09BM076', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(301, '09BM077- BAUT MUR + RING PLAT + RING PER 1/2 X 3\"', 'BUAH', '', '09BM077', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(302, '09BP001- BALLAST 400 WATT PHILIP', 'BUAH', '', '09BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(303, '09BP008- BESI PLAT 6 MM 4 \" X 8 \"', 'LBR', '', '09BP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(304, '09BS001- BAUT STENLESS 6*45', 'BUAH', '', '09BS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(305, '09BS002- BAUT STEANLESS 8*50', 'BUAH', '', '09BS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(306, '09BS004- BOX STOP CONTAC', 'BUAH', '', '09BS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(307, '09BS005- BATTERY SANYO', 'SET', '', '09BS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(308, '09BS006- BOLT KECIL', 'BUAH', '', '09BS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(309, '09BS007- BAUT STEANLESS 5/8 \" X 1/2 \"', 'BUAH', '', '09BS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(310, '09BT001- BALLAST ELECTRIC ( EBE )', 'BUAH', '', '09BT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(311, '09BT002- BALLAST ELECTRIC ( EBE )', 'BUAH', '', '09BT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(312, '09BT003- BALLAST TL ELECTRICT 2*18 WATT', 'BUAH', '', '09BT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(313, '09BT004- BALLAST 20 WATT', 'BUAH', '', '09BT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(314, '09BT005- BELT TING @ 30 MTR', 'ROLL', '', '09BT005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(315, '09BT006- BELT TING 5/16\" 8MM TANEX', 'ROLL', '', '09BT006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(316, '09BU001- BAUT 8*10', 'BUAH', '', '09BU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(317, '09BU002- BAUT L 5/16 x 11/2', 'BUAH', '', '09BU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(318, '09BU003- BAUT L 1/2 \" X 3 \"', 'BUAH', '', '09BU003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(319, '09BX001- BOX LAMPU TL TKO 2*18 WATT', 'BUAH', '', '09BX001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(320, '09BY001- BATTRY LASER LITHIUM CR 12600-3V (SANYO)', 'BUAH', '', '09BY001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(321, '09CB001- CARBON BRUSH CB 411 A GURINDA 4\" MAKITA', 'SET', '', '09CB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(322, '09CB002- CARBON BRUSH CB 100 A MAKITA', 'SET', '', '09CB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(323, '09CB003- CARBON BRUSH UK- 24*32*60', 'BUAH', '', '09CB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(324, '09CB004- CARBON BRUSH UK 15*40*70', 'BUAH', '', '09CB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(325, '09CB005- CARBON BRUSH UK 10*32*50', 'BUAH', '', '09CB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(326, '09CB006- CARBON BRUSH UK 16*25*40', 'BUAH', '', '09CB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(327, '09CB007- CARBON BRUSH UK 12,5*12,5*40', 'BUAH', '', '09CB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(328, '09CB008- CARBON BRUSH UK 12,5*32*50 MM', 'BUAH', '', '09CB008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(329, '09CB009- CARBON BRUSH GURINDA HITACHI CB 43', 'BUAH', '', '09CB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(330, '09CB010- CARBON BRUSH UK 10*32*55', 'BUAH', '', '09CB010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(331, '09CB011- CARBON BRUSH UK 10*40*60', 'BUAH', '', '09CB011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(332, '09CB012- CARBON BRUSH UK 20*32*50 MM', 'BUAH', '', '09CB012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(333, '09CB013- CARBON BRUSH 24*32*60', 'BUAH', '', '09CB013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(334, '09CB015- CARBON BRUSH 28*38*70', 'BUAH', '', '09CB015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(335, '09CB016- CONTACT BLOCK TC P/N LC 33016045', 'BUAH', '', '09CB016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(336, '09CB017- CLEANER BODY P/N. 4145 141 0500 - A', 'BUAH', '', '09CB017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(337, '09CC001- CAIN COUPLING KC 5016', 'BUAH', '', '09CC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(338, '09CC002- CHAIN COUPLING KC 6018', 'SET', '', '09CC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(339, '09CC003- CHAIN COUPLING KC 8018', 'SET', '', '09CC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(340, '09CC004- BESI COR UK. 10CM X 10CM X 80CM @ 855KG', 'BTG', '', '09CC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(341, '09CC005- COMPACT CYLINDER BORE:40MM STROKE:100MM', 'UNIT', '', '09CC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(342, '09CC006- CERAMIC COATING PULLY DENSER ALUMINIUM 35', 'BUAH', '', '09CC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(343, '09CE001- CEILLING EXHAUST FAN', 'UNIT', '', '09CE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(344, '09CE003- COUNTER LC 48', 'BUAH', '', '09CE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(345, '09CE004- COUNTER ( TIMER ) OUTONIC CT 6S - 2 P ', 'BUAH', '', '09CE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(346, '09CE005- CLEANER ELEMENT P/N. 4145 124 2800 - A', 'BUAH', '', '09CE005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(347, '09CF001- COUPLING FALK 1090 T 10', 'UNIT', '', '09CF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(348, '09CF002- CLEANER FIXING BASE P/N. 4145 141 0800 - ', 'BUAH', '', '09CF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(349, '09CH001- CYLINDER HYDRAULIC', 'UNIT', '', '09CH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(350, '09CK001- CERAMIC ISOLATOR ( CINCIN KERAMIK )', 'BUAH', '', '09CK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(351, '09CL001- CUTTING LPG CHIYODA P-3500', 'BUAH', '', '09CL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(352, '09CL003- CUTTING LPG VICTOR 3 - GPN', 'BUAH', '', '09CL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(353, '09CL004- CUTTING LPG TYPE A NO. 3', 'BUAH', '', '09CL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(354, '09CL005- CONTROL LEVER COMPL P/N. 4145 180 0701 - ', 'BUAH', '', '09CL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(355, '09CO001- CONTAC CLEANER ( CO )', 'KLG', '', '09CO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(356, '09CO002- COILL', 'BUAH', '', '09CO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(357, '09CP001- CPJ', 'BUAH', '', '09CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(358, '09CP002- COUPLE NM 67', 'BUAH', '', '09CP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(359, '09CP003- CONTROL PANEL DU2-6-24 24V DC SEG', 'UNIT', '', '09CP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(360, '09CR001- COUPLE ROLLING', 'BUAH', '', '09CR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(361, '09CR002- CARD RELAY SOLENOID', 'BUAH', '', '09CR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(362, '09CR003- COUPLE ROLLING @ 25 BUAH', 'KG', '', '09CR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(363, '09CR004- CARBURATOR P/N. 4145 120 0601 - A', 'BUAH', '', '09CR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(364, '09CR005- CUSHION RUBBER COMP P/N. 4145 790 9300 - ', 'BUAH', '', '09CR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(365, '09CS001- CAT SCREW PRINTING INK (HITAM) ', 'KLG', '', '09CS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(366, '09CS002- CAM SWITCH TYPE QS 5 3 P/ 63A', 'BUAH', '', '09CS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(367, '09CS003- CAM SWITCH TYPE QS 5 3 P/15A', 'BUAH', '', '09CS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(368, '09CS004- CAPASITOR 5 MICRO/500 V', 'BUAH', '', '09CS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(369, '09CS005- CAPASITOR 275 VAC', 'BUAH', '', '09CS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(370, '09CS006- CAM SWITCH 100 A 4 POLE', 'BUAH', '', '09CS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(371, '09CT001- CURRENT TRANSFORMER 50/5A', 'BUAH', '', '09CT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(372, '09CT002- CURRENT TRANSFORMER 100/5A', 'BUAH', '', '09CT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(373, '09CT003- CURRENT TRANSFORMER 600/5A', 'BUAH', '', '09CT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(374, '09CT004- CURRENT TRANSFORMER CIC ICY-2 500/5A', 'BUAH', '', '09CT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(375, '09CT005- CURRENT TRANSFORMER CIC ICY-3S 1B 300/5A', 'BUAH', '', '09CT005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(376, '09CT006- CURRENT TRANSFORMER CIC ICY-3S 100/5A', 'BUAH', '', '09CT006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(377, '09CT007- CURRENT TRANSFORMER CIC ICX-1 600/5A', 'BUAH', '', '09CT007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(378, '09DB001- DYNABOLT 1/2 \" X 4 \" @ 25 BUAH', 'DUS', '', '09DB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(379, '09DB002- DYNABOLT 5/8 \" X 4 \" @ 25 BUAH', 'DUS', '', '09DB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(380, '09DB003- DYNABOLT 3/4\" X 6\" @ 15 PCS', 'DUS', '', '09DB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(381, '09DB004- DYNABOLT 3/4\" X 7\"', 'BUAH', '', '09DB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(382, '09DB038- DIES BARU 3,55 MM', 'BUAH', '', '09DB038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(383, '09DC001- DIGITAL COUNTER LC-48H NAIS', 'BUAH', '', '09DC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(384, '09DD003- DIES DIAMOND 0,93 MM', 'BUAH', '', '09DD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(385, '09DD005- DOP DRAT PVC 4\"', 'BUAH', '', '09DD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(386, '09DD006- DIODA', 'BUAH', '', '09DD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(387, '09DD007- DIES DIAMOND 1,510 MM', 'BUAH', '', '09DD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(388, '09DD008- DIODA SKB B 500C 1000 LSB', 'BUAH', '', '09DD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(389, '09DD009- DIODA 30 A', 'BUAH', '', '09DD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(390, '09DD010- DOP DRAT LUAR GALFANIS 1\"', 'BUAH', '', '09DD010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(391, '09DD011- DIES DIAMOND 0.255 MM', 'BUAH', '', '09DD011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(392, '09DD012- DOP DRAT LUAR GALFANIS 3/4\"', 'BUAH', '', '09DD012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(393, '09DF001- BAUT L 11/2 X 5/16 ( DRAT FULL )', 'BUAH', '', '09DF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(394, '09DG001- DOP GALFANIS 11/2\"', 'BUAH', '', '09DG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(395, '09DI001- DOOR INTERLOCKED EXTERNAL FRONT SHAFT', 'SET', '', '09DI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(396, '09DM001- DINAMO MOTOR 1/2 HP/380 V (SERVICE )', 'UNIT', '', '09DM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(397, '09DM002- DINAMO MOTOR 2 HP/380 V ( SERVICE )', 'UNIT', '', '09DM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(398, '09DN001- DOUBLE NEPLE GALFANIS 1\"', 'BUAH', '', '09DN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(399, '09DN002- DOUBLE NEPLE GALFANIS 1/4\"', 'BUAH', '', '09DN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(400, '09DN003- DOUBLE NEPLE GALFANIS 3/4\"', 'BUAH', '', '09DN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(401, '09DN004- DOUBLE NEPLE GALFANIS 2\"', 'BUAH', '', '09DN004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(402, '09DN009- DOBLE NEPLE GALFANIS 2 1/2\"', 'BUAH', '', '09DN009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(403, '09DN010- DOUBLE NEPLE GALFANIS 2 1/2\"', 'BUAH', '', '09DN010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(404, '09DN011- DOUBLE NEPLE GALFANIS 1 1/2\"', 'BUAH', '', '09DN011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(405, '09DN012- DOUBLE NEPLE GALFANIS 1/2\"', 'BUAH', '', '09DN012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(406, '09DP001- DOP PVC 11/2\"', 'BUAH', '', '09DP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(407, '09DS001- DEPUSOR SANYO', 'BUAH', '', '09DS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(408, '09EB001- EBONIT 0 15 MM @ 1 METER', 'BUAH', '', '09EB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(409, '09EB002- EBONIT 0 20 MM*1 METER', 'BUAH', '', '09EB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(410, '09EB003- EBONIT 0 120 MM*1 METER', 'BUAH', '', '09EB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(411, '09EB004- EBONIT 10 MM*1 METER', 'BTG', '', '09EB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(412, '09EB005- EBONIT 0 30 MM*1 METER', 'BUAH', '', '09EB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(413, '09EB006- EBONIT 35 mm x 1 mtr', 'BTG', '', '09EB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(414, '09EB007- EBONIT 25 mm x 1 mtr', 'BTG', '', '09EB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(415, '09EB009- EBONIT UK. 100 MM X 1 MTR', 'BTG', '', '09EB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(416, '09EC001- ELCO', 'BUAH', '', '09EC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(417, '09EF001- EXHAUST FAN 10\"', 'BUAH', '', '09EF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(418, '09EF002- EXHAUST FAN/COLLING FAN 4\" CF 204/50-60', 'BUAH', '', '09EF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(419, '09EH001- ELECTRODE HOLDER TYPE PS-35 CAMSCO', 'BUAH', '', '09EH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(420, '09EL001- ELPIJI', 'BUAH', '', '09EL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(421, '09EM002- ELECTRIC MOTOR TYPE : 2 POLE/380V', 'UNIT', '', '09EM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(422, '09FB001- FUSE BATU 125 A', 'BUAH', '', '09FB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(423, '09FD001- FINISHING DRAWING', 'BUAH', '', '09FD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(424, '09FK001- FIBER KARTON UK 1*1 METER', 'LBR', '', '09FK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(425, '09FL001- FLANGE SOK BOBIN 0 20\"', 'SET', '', '09FL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(426, '09FL002- FITTING LAMPU', 'BUAH', '', '09FL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(427, '09FP001- FOLOCULANT PAC @ 20 KG', 'BUAH', '', '09FP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(428, '09FP002- FUEL PIPE P/N. 4145 358 7600 - A', 'BUAH', '', '09FP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(429, '09FP003- FUEL PIPE CLIP P/N. 4145 358 8900 - A', 'BUAH', '', '09FP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(430, '09FR001- FLOUTLES RELAY ANLY TYPE : AF 1-1/220 V', 'BUAH', '', '09FR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(431, '09FR002- FLOUTLESS RELAY 61 F6-AD', 'BUAH', '', '09FR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(432, '09FR003- FILTER REGULATOR PORT 1/4\"', 'BUAH', '', '09FR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(433, '09FS001- FOOTSWITCH FS 3 10 A/250 V', 'BUAH', '', '09FS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(434, '09FT001- FITTING LAMPU TL', 'SET', '', '09FT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(435, '09FT002- FITTING+KAP LAMPU E 27', 'SET', '', '09FT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(436, '09FT003- FUEL TANK P/N. 4145 351 0400 - A', 'BUAH', '', '09FT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(437, '09FV001- FOOT VALVE PVC 21/2\"', 'BUAH', '', '09FV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(438, '09FW001- FELL WOLL LOX 75*130 CM', 'LBR', '', '09FW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(439, '09GB001- GERGAJI BESI 12\"', 'BUAH', '', '09GB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(440, '09GB002- GERGAJI BESI 14\"', 'BUAH', '', '09GB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(441, '09GB003- GEAR BOX TYPE : WPA 70 RATIO:1:30', 'UNIT', '', '09GB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(442, '09GE001- GEAR', '', '', '09GE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(443, '09GE004- GEAR M5-Z 15', 'BUAH', '', '09GE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(444, '09GE005- GEAR PAYUNG Z-30', 'BUAH', '', '09GE005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(445, '09GE006- GEAR PAYUNG Z-15', 'BUAH', '', '09GE006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(446, '09GE007- GEAR MESIN SERUT Z-36', 'BUAH', '', '09GE007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(447, '09GE008- GEAR MESIN SAMBUNG UK. 205 X 68 X Z30', 'BUAH', '', '09GE008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(448, '09GE009- GEAR Z - 45 UK. 327 X 110', 'BUAH', '', '09GE009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(449, '09GE010- GEAR Z - 45 UK. 327 X 80', 'BUAH', '', '09GE010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(450, '09GE011- GEAR Z - 15 UK. 116 X 60', 'BUAH', '', '09GE011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(451, '09GH001- GREASE HAND PUM', 'BUAH', '', '09GH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(452, '09GK001- GEAR KUNINGAN (WORM GEAR) Z-34 148*60 MM', 'BUAH', '', '09GK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(453, '09GK002- GEAR KUNINGAN (WORM GEAR) Z34 148*60 MM', 'BUAH', '', '09GK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(454, '09GM001- GEAR BOX + MOTOR WPDX RATIO 1:30 SIZE 80', 'BUAH', '', '09GM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(455, '09GM002- GUNTING MCC 750', 'BUAH', '', '09GM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(456, '09GM003- GEAR MS - 215', 'BUAH', '', '09GM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(457, '09GM004- GEAR MOTOR SKT TYPE:E + MOTOR FUKUTA 7,5 ', 'UNIT', '', '09GM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(458, '09GP001- GEAR PAYUNG 215', 'BUAH', '', '09GP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(459, '09GP002- GEAR PAYUNG 230', 'BUAH', '', '09GP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(460, '09GP005- GIGI PAYUNG 19T UK. 250 X 150 VCN 150', 'BUAH', '', '09GP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(461, '09GP006- GIGI PAYUNG 31T UK. 400 X 150 VCN 150', 'BUAH', '', '09GP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(462, '09GP007- GIGI PAYUNG 25T UK. 330 X 140 VCN 150', 'BUAH', '', '09GP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(463, '09GP008- GIGI PAYUNG 22T UK. 290 X 140 VCN 150', 'BUAH', '', '09GP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(464, '09GR001- GEAR MOTOR 1/2 HP RATIO 1:35', 'UNIT', '', '09GR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(465, '09GR003- GEAR RANTAI UK. 60 X 1 JALUR 39 GIGI', 'BUAH', '', '09GR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(466, '09GR004- GEAR RANTAI UK. 60 X 2 JALUR X 64 GIGI', 'BUAH', '', '09GR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(467, '09GS001- GREASE SHELL ALVANIA EP-2', 'BUAH', '', '09GS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(468, '09GS002- CYLINDER WASHER P/N. 4145 029 2300 - A', 'BUAH', '', '09GS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(469, '09GT001- GOOT 4O', 'BUAH', '', '09GT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(470, '09GW001- GROUND WIRE P/N. 4145 440 1901 - A', 'BUAH', '', '09GW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(471, '09HAPN1- HUB ASSY P/N 91326-11501', 'BUAH', '', '09HAPN1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(472, '09HB001- HOLDER CARBON BRUSH ( KECIL )', 'BUAH', '', '09HB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(473, '09HC001- HARD CROME PULLY PENSER ALUM. O  250MM ', 'BUAH', '', '09HC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(474, '09HC002- HOLDER CARBON BRUSH (BESAR)', 'BUAH', '', '09HC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(475, '09HC003- HARD CROME ROLL ANEALER 97 mm * 600 M', 'BUAH', '', '09HC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(476, '09HC004- HARD CROME ROLL CAPSTAN', 'BUAH', '', '09HC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(477, '09HD001- HOUGHTO DRAW WD 4100', 'KG', '', '09HD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(478, '09HH001- HOSE HYDROULIK 7/8 R5 26 CM', 'BUAH', '', '09HH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(479, '09HL001- HOLESAW 30 MM', 'BUAH', '', '09HL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(480, '09HP001- HANG PUMP', 'BUAH', '', '09HP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(481, '09HP002- HAND PUMP', 'BUAH', '', '09HP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(482, '09HS001- HOSE @ 1/2 MT + SLEEVES @ 2 PCS', 'SET', '', '09HS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(483, '09HV001- HAND VALVE 3/8\" ( MUHC-300/10 A )', 'PAIL', '', '09HV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(484, '09IC001- IC 7815', 'BUAH', '', '09IC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(485, '09IC002- IC 7915', 'BUAH', '', '09IC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(486, '09II001- I 358', 'BUAH', '', '09II001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(487, '09IN001- INVERTER TOSHIBA TYPE VF S11-2007', 'BUAH', '', '09IN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(488, '09IN002- INVERTER SANKEN TYPE GF 0,75 K/1 HP', 'BUAH', '', '09IN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(489, '09IN003- INVERTER 1 HP 380 V BENS PETTERSEN', 'UNIT', '', '09IN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(490, '09IN004- INVERTER 15HP/220V', 'UNIT', '', '09IN004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(491, '09IN005- INVERTER 15HP/380V', 'UNIT', '', '09IN005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(492, '09IN006- IN 4007', 'BUAH', '', '09IN006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(493, '09IN008- INVERTER BENZ PETER Q5-007-43A', 'UNIT', '', '09IN008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(494, '09IN009- INVERTER EMCN EC50D75G43B', 'UNIT', '', '09IN009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(495, '09IN010- INVERTER SANKEN GF 0,75 K-HK 3PHASE 380VA', 'UNIT', '', '09IN010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(496, '09IN011- INVERTER SANKEN ET 0,75 K-HK 3PHASE 220VA', 'UNIT', '', '09IN011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(497, '09IS001- ISOLASI NITTO BESAR ', 'ROLL', '', '09IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(498, '09IS002- ISOLASI 3 M ( SCOTCH )', 'ROLL', '', '09IS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(499, '09IS003- ISOLASI TAHAN PANAS', 'ROLL', '', '09IS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(500, '09IS004- ISOLASI 3M SCOCTH 27', 'ROLL', '', '09IS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(501, '09KA001- KABEL SKUN RING 0 1,5 MM', 'PAK', '', '09KA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(502, '09KA002- KABEL SKUN Y 0 2,5 MM @ 100', 'PAK', '', '09KA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(503, '09KA003- KABEL SKUN RING 0 16 MM', 'BUAH', '', '09KA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(504, '09KA004- KABEL TIES 200 L/20 CM', 'PAK', '', '09KA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(505, '09KA005- KABEL TIES 100 L/10 CM', 'PAK', '', '09KA005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(506, '09KA006- KABEL TERMO COUPLE TYPE K', 'METER', '', '09KA006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(507, '09KA007- KLEM KABEL 0 12 MM @ 100 PCS', 'PAK', '', '09KA007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(508, '09KA008- KLEM KABEL NO. 7', 'PAK', '', '09KA008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(509, '09KA009- KABEL NYHY 2*0,75 @ 50 METER', 'ROLL', '', '09KA009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(510, '09KA010- KABEL NYMHY 4 X 1,5 MM ( SERABUT )', 'METER', '', '09KA010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(511, '09KA011- KABEL NYMHY 4 X 0,75 MM2 @ 100 MTR', 'ROLL', '', '09KA011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(512, '09KA012- KABEL NYMHY 4 X 1,50 MM2 @ 100 MTR', 'ROLL', '', '09KA012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(513, '09KA013- KABEL NYMHY 4 X 2,50 MM2 @ 100 MTR', 'ROLL', '', '09KA013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(514, '09KA014- KABEL NYY 4 X 35 MM3', 'MTR', '', '09KA014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(515, '09KB001- KABEL SERABUT 281,2 ( ISI 7 )', 'METER', '', '09KB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(516, '09KB002- KABEL 8*06 MM @1 ROLL', 'UNIT', '', '09KB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(517, '09KB003- KUNCI BISI', 'BUAH', '', '09KB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(518, '09KC001- KARET COUPLE NM67', 'BUAH', '', '09KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(519, '09KD001- KNEE DRAT GALFANIS 45 3\"', 'BUAH', '', '09KD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(520, '09KD002- KNEE DRAT GALFANIS 3\"', 'BUAH', '', '09KD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(521, '09KD003- KNEE DRAT PVC 1/2\"', 'BUAH', '', '09KD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(522, '09KD004- KNEE DRAT GALFANIS 2\"', 'BUAH', '', '09KD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(523, '09KD005- KNEE DRAT GALFANIS 1\"', 'BUAH', '', '09KD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(524, '09KE001- KANVAS REM', 'SET', '', '09KE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(525, '09KF001- KAWAT FLEXYBLE', 'BUAH', '', '09KF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(526, '09KG001- KNEE GALFANIS 11/4\"', 'BUAH', '', '09KG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(527, '09KG002- KNEE GALFANIS 11/2\"', 'BUAH', '', '09KG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(528, '09KG007- KNEE GALFANIS 1/2\"', 'BUAH', '', '09KG007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(529, '09KH001- KACA KEDOK LAS ( HITAM )', 'BUAH', '', '09KH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(530, '09KH002- KNEE GALFANIS 3/8\"', 'BUAH', '', '09KH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(531, '09KI001- KIPAS ANGIN ( WELL FAN )', 'UNIT', '', '09KI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(532, '09KI002- KIPAS ANGIN ( POWER FULL )', 'UNIT', '', '09KI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(533, '09KI003- KUNCI INGGRIS', 'BUAH', '', '09KI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(534, '09KI004- KUNCI INGGRIS 15 \"', 'BUAH', '', '09KI004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(535, '09KI005- KUNCI INGGRIS 18 \"', 'BUAH', '', '09KI005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(536, '09KK001- KIKIR PLT 8\"', 'BUAH', '', '09KK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(537, '09KK002- KIKIR PLT 12\"', 'BUAH', '', '09KK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(538, '09KK003- KUNCI KONTAK', 'BUAH', '', '09KK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(539, '09KK004- KIKIR SEGITIGA 4\"', 'BUAH', '', '09KK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(540, '09KL001- KAWAT LAS RB 2,6 MM', 'KG', '', '09KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(541, '09KL002- KAWAT LAS RB 3,2 MM', 'KG', '', '09KL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(542, '09KL003- KAWAT LAS KUNINGAN 0 3 MM', 'BTG', '', '09KL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(543, '09KL004- KAWAT LAS RB 4,0 MM', 'KG', '', '09KL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(544, '09KL005- KAWAT LAS STEANLESS 0 2,6 MM', 'KG', '', '09KL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(545, '09KL006- KAWAT LAS B-17 0 3,2 MM', 'KG', '', '09KL006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(546, '09KL007- KAWAT LAS B-17 0 4,0 MM', 'KG', '', '09KL007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(547, '09KL008- KAWAT LAS ANCURAN CIN-3 0 3,2 MM', 'KG', '', '09KL008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(548, '09KL010- KNEE LAS GALFANIS 2 1/2\"', 'BUAH', '', '09KL010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(549, '09KL011- KAWAT LAS STEANLESS 3.2 MM', 'KG', '', '09KL011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(550, '09KL012- KUNCI L 6 MM', 'BUAH', '', '09KL012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(551, '09KL013- KUNCI L 5MM', 'BUAH', '', '09KL013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(552, '09KL014- KUNCI L 4 MM', 'BUAH', '', '09KL014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(553, '09KL015- KUNCI L', 'SET', '', '09KL015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(554, '09KL016- KEDOK LAS', 'BUAH', '', '09KL016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(555, '09KL017- KNEE LAS 5 \" SCH 40', 'BUAH', '', '09KL017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(556, '09KM001- KARET MEMBRAN', 'BUAH', '', '09KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(557, '09KN001- KNEE PVC 3\"', 'BUAH', '', '09KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(558, '09KN002- KNEE PVC 2\"', 'BUAH', '', '09KN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(559, '09KN003- KAWAT NEKELIN ELEMENT 2MM', 'KG', '', '09KN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(560, '09KN004- KNEE PVC 4\"', 'BUAH', '', '09KN004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(561, '09KN005- KNEE PVC 11/2\"', 'BUAH', '', '09KN005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(562, '09KN008- KNEE DRAT 3/4\" X 1/2\" PVC', 'BUAH', '', '09KN008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(563, '09KP001- KUNCI PIPA 24\"', 'BUAH', '', '09KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(564, '09KP003- KUNCI PAS 12 X 13 MM', 'BUAH', '', '09KP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(565, '09KR001- KUNCI RING PAS UK-0 21 MM', 'BUAH', '', '09KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(566, '09KR002- KUNCI RING PAS UK-0 24 MM', 'BUAH', '', '09KR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(567, '09KR003- KUNCI RING PAS 14 MM', 'BUAH', '', '09KR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(568, '09KR004- KUNCI RING PAS 15 MM', 'BUAH', '', '09KR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(569, '09KR005- KUNCI RING PAS UK. 19 MM', 'BUAH', '', '09KR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(570, '09KR006- KUNCI RING PAS UK. 8 S/D 32 MM ', 'SET', '', '09KR006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(571, '09KS001- KLEM SELANG STEANLESS 1\"', 'BUAH', '', '09KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(572, '09KS002- KLEM SENG ', 'BUAH', '', '09KS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(573, '09KS003- KLEM SENG ', 'BUAH', '', '09KS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(574, '09KS004- KLEM SELANG STEANLESS ( SPT CONTOH)', 'BUAH', '', '09KS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(575, '09KS008- KABEL SERABUT 2*1.2 ( ISI 7)', 'MTR', '', '09KS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(576, '09KS009- KUNCI SOK ( TEKIRO) UK.8-32mm', 'SET', '', '09KS009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(577, '09KS011- KLEM SELANG STEANLESS', 'BUAH', '', '09KS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(578, '09KS012- KABEL SKUN Y 2,5 MM @ 100 / PAK', 'PAK', '', '09KS012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(579, '09KS013- KLEM SELANG 5/8 \"', 'BUAH', '', '09KS013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(580, '09KS014- KLEM SELANG STEANLESS 1 1/2 \"', 'BUAH', '', '09KS014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(581, '09KS015- KABEL SKUN SC 95 - 12', 'BUAH', '', '09KS015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(582, '09KS016- KNEE STAINLESS STELL 1\"', 'BUAH', '', '09KS016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(583, '09KS017- KNEE STAINLESS STELL 1 1/2\"', 'BUAH', '', '09KS017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(584, '09KS018- KLEM SELANG STEANLES 1 1/4\"', 'BUAH', '', '09KS018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(585, '09KS019- KLEM SELANG STEANLES 2\"', 'BUAH', '', '09KS019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(586, '09KS020- KLEM SELANG STEANLES 2 1/2\"', 'BUAH', '', '09KS020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(587, '09KS021- KLEM SELING 12 MM', 'BUAH', '', '09KS021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(588, '09KT001- KAWAT TEMBAGA BCC25 MM', 'MTR', '', '09KT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(589, '09KT004- KABEL TIES CV 100 @ 100', 'PAK', '', '09KT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(590, '09KT005- KABEL TIES CV 150 @ 100', 'PAK', '', '09KT005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(591, '09KTG01- O/H KIT TRANSMISSION ( G )', 'PCS', '', '09KTG01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(592, '09KU001- KUNCI L (1,5-10 MM)', 'SET', '', '09KU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(593, '09KU002- KUNCI L 14 MM', 'BUAH', '', '09KU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(594, '09KU003- KUNCI L 5 MM', 'BUAH', '', '09KU003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(595, '09KUNCI- KUNCI L 6 MM', 'BUAH', '', '09KUNCI', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(596, '09KV001- KLEP VALVE KUNINGAN 11/2\"', 'BUAH', '', '09KV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(597, '09KV002- KLEP VALVE KUNINGAN 11/4\"', 'BUAH', '', '09KV002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(598, '09KV003- KLEP VALVE KUNINGAN 21/2\"', 'BUAH', '', '09KV003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(599, '09KV004- KLEP VALVE KUNINGAN 2\"', 'BUAH', '', '09KV004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(600, '09KV006- KLEP VALVE KIT 2\"', 'BUAH', '', '09KV006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(601, '09KW001- KAWAT SELING 10 MM', 'METER', '', '09KW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(602, '09KW002- KAWAT SELLING 12 MM', 'METER', '', '09KW002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(603, '09KW003- KABEL WELDING 50 mm', 'MTR', '', '09KW003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(604, '09LB001- LUBTEN ( 10)', 'KLG', '', '09LB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(605, '09LC001- LOAD CHANGE OVER SWITCH F MU63/4 4X630 A', 'BUAH', '', '09LC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(606, '09LC002- LAMPU CONTROL 30 MM 220 V AC ( MERAH )', 'BUAH', '', '09LC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(607, '09LC003- LAMPU CONTROL 30 MM 220 V AC ( HIJAU )', 'BUAH', '', '09LC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(608, '09LC004- LAMPU CONTROL 30 MM 220 V AC ( KUNING )', 'BUAH', '', '09LC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(609, '09LE001- LEM SEALENT ( MERAH )', 'TUBE', '', '09LE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(610, '09LE002- LEM PARALON ', 'KLG', '', '09LE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(611, '09LE003- LEM LOCTING THREYNG LOCKER ( 262 MERAH )', 'BOTOL', '', '09LE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(612, '09LE004- LEM LOCTING THREAY ( 242 BIRU )', 'BOTOL', '', '09LE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(613, '09LE005- LEM BESI DEXTON ', 'SET', '', '09LE005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(614, '09LE006- LEM SEALENT ( KACA )', 'BTL', '', '09LE006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(615, '09LG001- LEM GASKET SHELAC', 'BOTOL', '', '09LG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(616, '09LH001- LAMPU HE 18 WATT', 'BUAH', '', '09LH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(617, '09LI001- LIMIT SWITCH OMRON', 'BUAH', '', '09LI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(618, '09LI002- LIMIT SWITCH ( OMRON )', 'BUAH', '', '09LI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(619, '09LI003- LIMIT SWITCH TYPE V 15- 1 A5', 'BUAH', '', '09LI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(620, '09MA002- MAGNETIC CONTACTOR SN-35 / 220 V', 'BUAH', '', '09MA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(621, '09MA003- MAGNETIC CONTACTOR SN-150', 'BUAH', '', '09MA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(622, '09MA004- MAGNETIC CONTACTOR SN-20/220 V', 'BUAH', '', '09MA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(623, '09MA005- MAGNETIC CONTACTOR SN-11/220 V', 'BUAH', '', '09MA005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(624, '09MA007- MAGNETIC KONTAKTOR SN-50 / 220 V', 'BUAH', '', '09MA007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(625, '09MA008- MAGNETIC CONTACTOR SN-80', 'BUAH', '', '09MA008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(626, '09MA009- MAGNETIC CONTACTOR SN-65 / 220 V', 'BUAH', '', '09MA009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(627, '09MA011- MAL ANGKA', 'BUAH', '', '09MA011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(628, '09MA012- MAGNETIC CONTACTOR SN-35 COIL 110/135', 'UNIT', '', '09MA012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(629, '09MA013- MAGNETIC CONTACTOR SN-50 COIL 380 V', 'BUAH', '', '09MA013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(630, '09MB001- MATA BOR 0 16 MM', 'BUAH', '', '09MB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(631, '09MB002- MATA BOR 0 14 MM', 'BUAH', '', '09MB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(632, '09MB003- MATA BOR MILLING 0 7 MM', 'BUAH', '', '09MB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(633, '09MB004- MATA BOR BETON 19 MM*200', 'BUAH', '', '09MB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(634, '09MB005- MATA BOR BETON 8 MM', 'BUAH', '', '09MB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(635, '09MB006- MATA BOR BOR FISER', 'BUAH', '', '09MB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(636, '09MB007- MATA BOR 4 MM NACHI', 'BUAH', '', '09MB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(637, '09MB008- MATA B0R 5 MM NACHI', 'BUAH', '', '09MB008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(638, '09MB009- MATA BOR 6 MM NACHI', 'BUAH', '', '09MB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(639, '09MB010- MATA BOR 10 MM NACHI', 'BUAH', '', '09MB010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(640, '09MB011- MATA BOR 12 MM NACHI', 'BUAH', '', '09MB011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(641, '09MB012- MATA BOR 8 MM NACHI', 'BUAH', '', '09MB012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(642, '09MB013- MATA BOR BETON 12 MM', 'BUAH', '', '09MB013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(643, '09MB015- MATA BOR MILLING 5 MM NACHI', 'BUAH', '', '09MB015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(644, '09MB016- MATA BOR MILLING 10 MM NACHI', 'BUAH', '', '09MB016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(645, '09MB017- MATA BOR MILLING 8 MM NACHI', '', '', '09MB017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(646, '09MB018- MATA BOR HSS 1,5 mm - 13 mm', 'SET', '', '09MB018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(647, '09MB019- MATA BOR HSS 14mm', 'BUAH', '', '09MB019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(648, '09MB020- MATA BOR HSS 15,5mm', 'BUAH', '', '09MB020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(649, '09MB021- MATA BOR HSS 16mm', 'BUAH', '', '09MB021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(650, '09MB022- MATA BOR BETON 16MM', 'BUAH', '', '09MB022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(651, '09MC001- MCB 25 A', 'BUAH', '', '09MC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(652, '09MC002- MCB IP/2A', 'BUAH', '', '09MC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(653, '09MC003- MCB 3P/50 A', 'BUAH', '', '09MC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(654, '09MC004- MCB 3P/80 A', 'BUAH', '', '09MC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(655, '09MC005- MCB 2 P/20 A', 'BUAH', '', '09MC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(656, '09MC006- MAGNETIC CONTACTOR SN-80/220 VOLT', 'BUAH', '', '09MC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(657, '09MC007- MAGNETIC CONTACTOR SN 300', 'UNIT', '', '09MC007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(658, '09MC008- MAGNETIC CONTACTOR  SN 400', 'UNIT', '', '09MC008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(659, '09MC009- MAGNETIC CONTACTOR HMU-12 24 VAC', 'BUAH', '', '09MC009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(660, '09MC010- MAGNETIC CONTACTOR SN - 220 / 220 V', 'BUAH', '', '09MC010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(661, '09MC011- MCB 3P / 16A', 'BUAH', '', '09MC011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(662, '09MCI01- MAL CETAKAN INGOT', 'BUAH', '', '09MCI01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(663, '09MDDR2- MEMORY DDR2 2 GB', 'UNIT', '', '09MDDR2', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(664, '09ME001- METALL ROLLING R75/10\"', 'BUAH', '', '09ME001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(665, '09MG001- MATA GERGAJI 14\" (MAKITA)', 'BUAH', '', '09MG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(666, '09MG002- MESIN GURINDA TANGAN 4\" ( MAKITA )', 'UNIT', '', '09MG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(667, '09MK001- MODUL ELEKTRONIKON MK5 P/N. 2230 5015 90', 'UNIT', '', '09MK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(668, '09MM002- MOUNTING MESIN', 'BUAH', '', '09MM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(669, '09MP001- MOTOR 10HP TECO+GEAR PUMP KOSHIN GL50-10', 'UNIT', '', '09MP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(670, '09MP002- MOTOR 10HP WESTERN+GEAR PUMP KOSHIN GL50', 'UNIT', '', '09MP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(671, '09MR001- MOUNTING RELL ( RELL MCB )', 'BUAH', '', '09MR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(672, '09MR003- MUR 3/4 \"', 'BUAH', '', '09MR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(673, '09MS001- MECHANICAL SEAL TYPE : PSEB IA', 'BUAH', '', '09MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(674, '09MS002- MECHANICAL SEAL TYPE : PEFB IA', 'BUAH ', '', '09MS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(675, '09MS003- MECHANICAL SEAL 0 53 MM', 'BUAH', '', '09MS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(676, '09MS004- MECHANICAL SEAL OJSOS ( LACONI )', 'SET', '', '09MS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(677, '09MS005- MECHANICAL SEAL 0 32 MM', 'SET', '', '09MS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(678, '09MS006- MECHANICAL SEAL TYPE 155-15 0 16 MM', 'SET', '', '09MS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(679, '09MS007- MECANICAL SEAL TYPE :EA 520 3/4\"', 'SET', '', '09MS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(680, '09MS008- MECHANICAL SEAL TYPE 21', 'BUAH', '', '09MS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(681, '09MS010- MECANICAL SEAL  560 13/8', 'BUAH', '', '09MS010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(682, '09MS011- MECANICAL SEAL 28 MM', 'BUAH', '', '09MS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(683, '09MS012- MECANICAL SEAL TYPE 21', 'BUAH', '', '09MS012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(684, '09MS013- MUR STEANLESS 7/8\"', 'BUAH', '', '09MS013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(685, '09MS014- MECANICAL SEAL TYPE EA560 35MM', 'SET', '', '09MS014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(686, '09MS015- MECANICAL SEAL', 'BUAH', '', '09MS015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(687, '09MS016- KARET MECANICAL SEAL UK. 54 X 41 X 10', 'BUAH', '', '09MS016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(688, '09MT001- METERAN @ 5MTR', 'BUAH', '', '09MT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(689, '09MU001- MUR 88 1/2\"', 'BUAH', '', '09MU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(690, '09MV001- MINYAK VANBELT ( BELT DREASING )', 'KLG', '', '09MV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(691, '09NA001- NICKLE ANEALING BAND', 'BUAH', '', '09NA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(692, '09NF001- NFB ( NO FUSE BEAKER )', 'BUAH', '', '09NF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(693, '09NF002- NFB ( NO FUSE BREAKER )', 'BUAH', '', '09NF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(694, '09NF003- NFB 30 CS/ 10A', 'BUAH', '', '09NF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(695, '09NF004- NFB NF 250CW/3P 250 A', 'BUAH', '', '09NF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(696, '09NF005- NFB ( NO FUSE BREAKER) 50 A', 'BUAH', '', '09NF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(697, '09NF006- NFB ( NO FUSE BREAKER ) 63 CW 3 P 50 A', 'BUAH', '', '09NF006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(698, '09NF007- NFB ( NO FUSE BREAKER ) 125 CW 3 P 80 A', 'BUAH', '', '09NF007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(699, '09NS001- NEPLE SELANG PL 6', 'BUAH', '', '09NS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(700, '09NS002- NEPEL SELANG 3/8 \"', 'BUAH', '', '09NS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(701, '09NS003- NEPEL SELANG 1/2 \"', 'BUAH', '', '09NS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(702, '09NS004- NEPEL SELANG 1/4 \"', 'BUAH', '', '09NS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(703, '09NS005- NEPEL SAMBUNGAN ', 'BUAH', '', '09NS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(704, '09NS006- HEATER NIKLIN SPIRAL @ 1 MTR', 'BUAH', '', '09NS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(705, '09NU001- NUT MB P/N. 9210 261 1140 - A', 'BUAH', '', '09NU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(706, '09NU002- NUT P/N. 9210 260 0700 - A', 'BUAH', '', '09NU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(707, '09OB001- OBENG MINUS', 'BUAH', '', '09OB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(708, '09OB002- OBENG PLUS', 'BUAH', '', '09OB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(709, '09OC001- OLI COMPRO XL - S 32', 'PAIL', '', '09OC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(710, '09OF004- OIL FILTER 71151-46930', 'PAIL', '', '09OF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(711, '09OF005- OIL FILTER P/N 71121111-48020A', 'BUAH', '', '09OF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(712, '09OF006- OIL FINE SEPARATOR P/N 71131211-46910', 'BUAH', '', '09OF006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(713, '09OF007- OIL FILTER 71121111-48020', 'BUAH', '', '09OF007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(714, '09OI001- OIL SEPARATOR 711-312011-46910', 'BUAH', '', '09OI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(715, '09OI002- OLI COMPRESOR FUSHENG', 'PAIL', '', '09OI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(716, '09OL001- OFFSET LINK 80*2', 'BUAH', '', '09OL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(717, '09OL002- OIL LUBRICANT P/N 1541-FS 600-20', 'MEKAN', '', '09OL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(718, '09OL003- OFFSET LINK 60*3 (SAMBUNGAN RANTAI)', 'BUAH', '', '09OL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(719, '09OP001- OIL PRESSURE GAUGE 0-5 BAR 52 MM', 'BUAH', '', '09OP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(720, '09OP030- OIL PRESURE GAUGE', 'BUAH', '', '09OP030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(721, '09OR001- ORING P 80', 'BUAH', '', '09OR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(722, '09OR002- ORING POMPA AS 252', 'BUAH', '', '09OR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(723, '09OR003- ORING AS 223', 'BUAH', '', '09OR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(724, '09OR004- ORING 264', 'BUAH', '', '09OR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(725, '09OR005- ORING 4*230', 'BUAH', '', '09OR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(726, '09OR006- ORING AS 223', 'BUAH', '', '09OR006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(727, '09OR007- ORING POMPA AS 252', 'BUAH', '', '09OR007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(728, '09OR008- O RING DIA 9 MM', 'MTR', '', '09OR008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(729, '09OR009- ORING 45 X 2', 'BUAH', '', '09OR009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(730, '09OR010- ORING 25 X 32 X 4', 'BUAH', '', '09OR010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(731, '09OS001- OIL SEAL TONG ANEALING 0 700*580*40*65', 'BUAH', '', '09OS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(732, '09OS002- OIL SEAL TONG ANEALING 0 850*760*40*40', 'BUAH', '', '09OS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(733, '09OS003- OIL SEAL TONG ANEALING 0 870*760*40*40', 'BUAH', '', '09OS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(734, '09OS004- OIL SEAL TONG ANEALING 0 900*760*40*40', 'BUAH', '', '09OS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(735, '09OS005- OIL SEAL 65-82-12', 'BUAH', '', '09OS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(736, '09OS006- OIL SEAL TC 60-82-12', 'BUAH', '', '09OS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(737, '09OS007- OIL SEAL TC-58-75-12', 'BUAH', '', '09OS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(738, '09OS008- OIL SEAL TC-55-72-9', 'BUAH', '', '09OS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(739, '09OS009- OIL SEAL TC-50-72-12', 'BUAH', '', '09OS009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(740, '09OS010- OIL SEAL TC-38-55-8', 'BUAH', '', '09OS010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(741, '09OS011- OIL SEAL TC-20-47-12', 'BUAH', '', '09OS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(742, '09OS012- OIL SEAL 20-40-11', 'BUAH', '', '09OS012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(743, '09OS013- OIL SEAL 20-38-12', 'BUAH', '', '09OS013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(744, '09OS014- OIL SEAL 58-80-12', 'BUAH', '', '09OS014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(745, '09OS015- OIL SEAL 50-30-10', 'BUAH', '', '09OS015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(746, '09OS016- OIL SEAL 55-85-12', 'BUAH', '', '09OS016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(747, '09OS017- OIL SEAL TC 65-95-14', 'BUAH', '', '09OS017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(748, '09OS018- OIL SEAL TC-45-65-12', 'BUAH', '', '09OS018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(749, '09OS019- OIL SEAL TC-75-100-13', 'BUAH', '', '09OS019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(750, '09OS020- OIL SEAL TC-70*92*12', 'BUAH', '', '09OS020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(751, '09OS021- OIL SEAL TC-25*45*8', 'BUAH', '', '09OS021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(752, '09OS022- OIL SEAL DHS 30', 'BUAH', '', '09OS022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(753, '09OS023- OIL SEA UHS 30', 'BUAH', '', '09OS023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(754, '09OS024- OIL SEAL 17*30-*8', 'BUAH', '', '09OS024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(755, '09OS025- OIL SEAL TC 17*30*6', 'BUAH', '', '09OS025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(756, '09OS026- OIL SEAL 72*95*12', 'BUAH', '', '09OS026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(757, '09OS027- OIL SEAL 125*95*13', 'BUAH', '', '09OS027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(758, '09OS028- OIL SEAL 55*78*12', 'BUAH', '', '09OS028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(759, '09OS029- OBENG SET', 'BUAH', '', '09OS029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(760, '09OS030- OIL SEAL 95*120*13', 'BUAH', '', '09OS030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(761, '09OS031- OIL SEAL 80*100*12', 'BUAH', '', '09OS031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(762, '09OS032- OIL SEAL 17*30*7', 'BUAH', '', '09OS032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(763, '09OS033- OIL SEAL TC 15*35*10', 'BUAH', '', '09OS033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(764, '09OS034- OIL SEAL TC 40*62*12', 'BUAH', '', '09OS034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(765, '09OS035- OIL SEAL TC 160*190*15', 'BUAH', '', '09OS035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(766, '09OS036- OIL SEAL TC 170*200*15', 'BUAH', '', '09OS036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(767, '09OS037- OIL SEAL TC 150*180*15', 'BUAH', '', '09OS037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(768, '09OS038- OIL SEAL 70*90*10', 'BUAH', '', '09OS038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(769, '09OS039- OIL SEAL 85*105*12', 'BUAH', '', '09OS039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(770, '09OS040- OIL SEAL 25*40*10', 'BUAH', '', '09OS040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(771, '09OS041- OIL SEAL 25*37*7', 'BUAH', '', '09OS041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(772, '09OS042- OIL SEAL 55*80*12', 'BUAH', '', '09OS042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(773, '09OS043- OIL SEAL TC 45*62*12', 'BUAH', '', '09OS043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(774, '09OS044- OIL SEAL 45*62*12', 'BUAH', '', '09OS044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(775, '09OS045- OIL SEAL TC 37*57*10', 'BUAH', '', '09OS045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(776, '09OS046- OIL SEAL TC 45*62*8', 'BUAH', '', '09OS046', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(777, '09OS047- OIL SEAL TC 150*180*14', 'BUAH', '', '09OS047', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(778, '09OS048- OIL SEAL 52*75*12', 'BUAH', '', '09OS048', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(779, '09OS049- OIL SEAL 110*80*13', 'BUAH', '', '09OS049', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(780, '09OS050- OIL SEAL 40*50*8', 'BUAH', '', '09OS050', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(781, '09OS051- OIL SEAL 50*80*10', 'BUAH', '', '09OS051', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(782, '09OS052- OIL SEAL TC 80*110*12', 'BUAH', '', '09OS052', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(783, '09OS053- OIL SEAL TC 80 X 110 X 12', 'BUAH', '', '09OS053', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(784, '09OS054- OIL SEAL TC 58 X 80 X 12', 'BUAH', '', '09OS054', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(785, '09OS055- OIL SEAL TC ( NBR ) 80 X 108 X 12', 'BUAH', '', '09OS055', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(786, '09OS056- OIL SEAL TC 65 X 88 X 12', 'BUAH', '', '09OS056', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(787, '09OS057- OIL SEAL TC 55 X 78 X 12', 'BUAH', '', '09OS057', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(788, '09OS061- OIL SEAL TC 130 X 160 X 14', 'BUAH', '', '09OS061', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(789, '09OS062- OIL SEAL UHS 30', 'BUAH', '', '09OS062', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(790, '09OS063- OIL SEAL 95 X 125 X 13', 'BUAH', '', '09OS063', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(791, '09OS064- OIL SEAL TC 95 X 125 X 13', 'BUAH', '', '09OS064', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(792, '09OS065- OIL SEAL TC 95 X 115 X 12', 'BUAH', '', '09OS065', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(793, '09OT001- OLI TRANSMISSION', 'LITER', '', '09OT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(794, '09OX001- OXYGEN', 'TBG', '', '09OX001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(795, '09P0002- PAKU 7 CM', 'KG', '', '09P0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(796, '09PA001- PLAT SEGEL 5/8\"', 'ROLL', '', '09PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(797, '09PB001- PUSH BUTTON HOST ( 4 TOMBOL )', 'BUAH', '', '09PB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(798, '09PB002- PISAU BUBUT THMS 160408 N-UX', 'BUAH', '', '09PB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(799, '09PB003- PISAU BUBUT INSERT ( BEKAS )', 'BUAH', '', '09PB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(800, '09PB004- PISAU BUBUT 1/2\"', 'BUAH', '', '09PB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(801, '09PB005- PISAU BUBUT 3/8\"', 'BUAH', '', '09PB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(802, '09PB006- PISAU BUBUT 5/8\"', 'BUAH', '', '09PB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(803, '09PB007- PISAU BUBUT 3/4\"', 'BUAH', '', '09PB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(804, '09PB008- PILLOW BLOCK UCP 208', 'BUAH', '', '09PB008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(805, '09PB010- PLAT BORDES 3 MM', 'LBR', '', '09PB010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(806, '09PB011- PLAT BORDES BESI UK. 5 MM X 4 X 8', 'LBR', '', '09PB011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(807, '09PB012- PILLOW BLOCK SYJ 516 DIA 80 MM SKF', 'BUAH', '', '09PB012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(808, '09PC001- POMPA CENTRIFUGAL 11/2\"/HP/3 PH/380 V', 'UNIT', '', '09PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(809, '09PC003- PEN COLD POLOS', 'BUAH', '', '09PC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(810, '09PC004- PEN COLD DRAT PENDEK', 'BUAH', '', '09PC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(811, '09PC005- PEN COLD DRAT PANJANG ', 'BUAH', '', '09PC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(812, '09PC006- PET COCK ASSY P/N. 4145 350 1000 - A', 'BUAH', '', '09PC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(813, '09PD001- PULLY DENSER ALUMUNIUM 0 205', 'BUAH', '', '09PD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(814, '09PE001- PERTEKAN 2,5*15*30 CM', 'BUAH', '', '09PE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(815, '09PE002- PAS ELECTRONIC', 'BUAH', '', '09PE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(816, '09PF001- PIPA FLEXIBLE', 'BUAH', '', '09PF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(817, '09PG001- PRESSUR GAUGE 0 50 MM*1/4*60', 'BUAH', '', '09PG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(818, '09PG006- PINION GEAR SHAFT 1', 'PCS', '', '09PG006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(819, '09PG007- PINION GEAR SHAFT 2', 'PCS', '', '09PG007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(820, '09PG008- PINION GEAR SHAFT 3', 'PCS', '', '09PG008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(821, '09PG009- PIPA GALFANIS 21/2\" SCH 40', 'BTG', '', '09PG009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(822, '09PH001- PAHAT BUBUT 3/8*4\"', 'BUAH', '', '09PH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(823, '09PH002- PIPA HITAM 11/4 \"', 'BTG', '', '09PH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(824, '09PH003- PIPA HITAM 5\" X 3,6 MM', 'BTG', '', '09PH003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(825, '09PH004- PIPA HITAM 3/8\" X 2,1 MM', 'BTG', '', '09PH004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(826, '09PI001- PILLOW BLOCK P 205 J 0 25 MM', 'BUAH', '', '09PI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(827, '09PI002- PILLOW BLOCK SY 504 M', 'BUAH', '', '09PI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(828, '09PI003- PIPA INJECTOR', 'BUAH', '', '09PI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(829, '09PJ001- PENJEPIT KAWAT', 'BUAH', '', '09PJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(830, '09PK001- PISAU POTONG KACA', 'BUAH', '', '09PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(831, '09PK002- PACKING KARTON 3mm MERK TO,BO', '0', '', '09PK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(832, '09PK003- PACKING KARTON TBA 1 mm', 'MTR', '', '09PK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(833, '09PK005- PACKING KARTON 3 mm TBA', 'MTR', '', '09PK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(834, '09PL001- PLOCK SHOCK GALFANIS 2\"*1\"', 'BUAH', '', '09PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(835, '09PL002- PLOCK TEE GALFANIS 11/4*3/4\"', 'BUAH', '', '09PL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(836, '09PL003- PLOCK SHOCK 3/4*1/2\"', 'BUAH', '', '09PL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(837, '09PL004- PLOCK SHOCK GALFANIS 11/4\"*3/4\"', 'BUAH', '', '09PL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(838, '09PL005- PLOCK SHOCK PVC 11/2 X 11/4', 'BUAH', '', '09PL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(839, '09PL006- PILLOW BLOCK AS 30 MM', 'BUAH', '', '09PL006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(840, '09PL007- PILOT LAMP 30MM 220 VAC', 'BUAH', '', '09PL007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(841, '09PL008- PLOCK TEE GALFANIS 1\" X 3/4\"', 'BUAH', '', '09PL008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(842, '09PL009- PLOCK TEE GALFANIS 2\" X 1\"', 'BUAH', '', '09PL009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(843, '09PM001- PENJEPIT MESIN SAMBUNG', 'PSG', '', '09PM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(844, '09PM002- PULSE METER MP5W-4N AUTONICS', 'BUAH', '', '09PM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(845, '09PN001- PUSH BUTTON EMERGENCY 22 MM 3 NC SIEMEN', 'BUAH', '', '09PN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(846, '09PN002- PUSH BUTTON SWITCH KS 22', 'BUAH', '', '09PN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(847, '09PN003- PUSH BUTTON SWITCH 30 MM IDEC 1 NO + NC', 'BUAH', '', '09PN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(848, '09PNS01- PEMBUATAN NOK SEAL', 'BUAH', '', '09PNS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(849, '09PP001- PIPA STAINLESS 3/4\"', 'BTG', '', '09PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(850, '09PP002- PIPA GALFFANIS 11/2 40', 'BUAH', '', '09PP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(851, '09PP003- PIPA PVC 11/2\"', 'BUAH', '', '09PP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(852, '09PP004- PIPA PVC 11/4\"', 'BTG', '', '09PP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(853, '09PP005- PIPA PVC 2\"', 'BTG', '', '09PP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(854, '09PP006- PIPA PVC 4\"', 'BTG', '', '09PP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(855, '09PP007- PIPA PVC 3\"', 'BTG', '', '09PP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(856, '09PP008- PIPA PVC 3/4\"', 'BTG', '', '09PP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(857, '09PP009- PIPA PVC 1/2\"', 'BTG', '', '09PP009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(858, '09PP010- PIPA GALFANIS 1 1/2\" SCH 40', 'BTG', '', '09PP010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(859, '09PP011- PIPA STAINLESS STELL 1 1/2\" SCH 40', 'BTG', '', '09PP011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(860, '09PP012- PIPA STAINLESS STELL 1\" SCH 40', 'BTG', '', '09PP012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(861, '09PR001- PULLY RANTAI T 20 RS 50-3', 'BUAH', '', '09PR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(862, '09PR004- PAKU RIVET', 'BUAH', '', '09PR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(863, '09PR005- PELE ROLLING', 'BUAH', '', '09PR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(864, '09PR007- PAKU RIVET', 'DUS', '', '09PR007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(865, '09PS001- PLAT STENLESS 2*90*1300 MM', 'BUAH', '', '09PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(866, '09PS002- PROXIMITY SWITCH AUTONICT PR12-4DN', 'BUAH', '', '09PS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(867, '09PS003- PROXIMITY SWITCH AUTONICT PR18-5DN', 'BUAH', '', '09PS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(868, '09PS004- PLAT STEANLESS 316 3 MM 4*8', 'LBR', '', '09PS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(869, '09PS005- PROXIMITY SWITCH PR 12 - 4 DP AUTONICS', 'BUAH', '', '09PS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(870, '09PT001- PLAT TEMBAGA 0 0,2 MM 36,5*120 CM', 'BUAH', '', '09PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(871, '09PT002- PIG TAIL RING', 'BUAH', '', '09PT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(872, '09PT003- PULLY TIMING BELT ZR-H 80 MM 20H100', 'BUAH', '', '09PT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(873, '09PT004- PULLY TIMING BELT ZR-H 160 MM 40H100', 'BUAH', '', '09PT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(874, '09PU001- PER PEGAS ULIR 3,3*31,2*100 MM', 'BUAH', '', '09PU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(875, '09PV001- PULLY VANBELT TYPE B/2JLR 5\"', 'BUAH', '', '09PV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(876, '09PV002- PULLY VANBELT C / 6 JALUR 6\"', 'BUAH', '', '09PV002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(877, '09PV003- PULLY VANBELT TYPE : C DIA 8\" X 5 JALUR', 'BUAH', '', '09PV003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(878, '09PV004- PULLY VANBELT TYPE : B DIA 12\" X 4 JALUR', 'BUAH', '', '09PV004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(879, '09PV005- PULLY VANBELT TYPE : D DIA 12\" X 7 JALUR', 'BUAH', '', '09PV005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(880, '09PV006- PILOT VALVE', 'BUAH', '', '09PV006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(881, '09PY001- PULLY TYPE C5 300 MM', 'BUAH', '', '09PY001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(882, '09QA001- QUART ASILATOR AMANO PJ9000', 'BUAH', '', '09QA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(883, '09RA001- RELAY ANLY TYPE AHC 2 N/ 220V 24 VDC', 'BUAH', '', '09RA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(884, '09RA002- RELAY ANLY TYPE AHC 4 N/220 V', 'BUAH', '', '09RA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(885, '09RA003- RELAY ANLY 24*PC TYPE AHC 2 N', 'BUAH', '', '09RA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(886, '09RA004- RELAY TYPE AHC NAN 220/240', 'BUAH', '', '09RA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(887, '09RB001- RING BROWN 222*216*14 MM', 'BUAH', '', '09RB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(888, '09RB002- RING BROWN 300*284*25', 'BUAH', '', '09RB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(889, '09RB003- RING BROWN 225*208*15 MM', 'BUAH', '', '09RB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(890, '09RB004- RING BROWN 300*285*25', 'BUAH', '', '09RB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(891, '09RB005- RING BROWN 225*210*18', 'BUAH', '', '09RB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(892, '09RD001- RANTAI DID 80-2', 'SET', '', '09RD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(893, '09RD002- RANTAI DID 40*1', 'SET', '', '09RD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(894, '09RD003- ROLL DENSER TYPE A', 'BUAH', '', '09RD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(895, '09RD004- ROLL DENSER TYPE B ', 'BUAH', '', '09RD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(896, '09RD005- ROLL DENSER TYPE C', 'BUAH', '', '09RD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(897, '09RD006- RANTAI DID/HITACHI 60*3 3 JALUR', 'BOX', '', '09RD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(898, '09RD007- REPAIR DRUM COILER', 'UNIT', '', '09RD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(899, '09RE001- REL PINTU ROLLING DOOR TYPE:W500/80 2,90', 'BTG', '', '09RE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(900, '09RF001- ROLL KERAMIK', 'BUAH', '', '09RF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(901, '09RG001- RODA REL GANTUNG RD 4 W 500/80', 'BUAH', '', '09RG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(902, '09RG003- ROTOR GURINDA TANGAN GA6020 150MM MAKITA', 'BUAH', '', '09RG003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(903, '09RL001- RODA LORY 4\" ( HIDUP+MATI )', 'SET', '', '09RL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(904, '09RL002- RODA LORY 6\" ( MATI+HIDUP )', 'SET', '', '09RL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(905, '09RL003- RODA LORY HAND PALLET ( 70 MM*180MM )', 'BUAH', '', '09RL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(906, '09RL004- RODA LORY 10\"', 'BUAH', '', '09RL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(907, '09RL005- REGULATOR LPG', 'BUAH', '', '09RL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(908, '09RL006- RODA LORY 5\" (KARET) HIDUP + MATI', 'SET', '', '09RL006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(909, '09RL007- RODA ROLY HAND PALLET ETZ 080 X 074 X020', 'BUAH', '', '09RL007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(910, '09RL008- RODA LORY 8\"', 'BUAH', '', '09RL008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(911, '09RM001- ROLL DENSER ALUMUNIUM 350 MM', 'BUAH', '', '09RM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(912, '09RO001- RELAY OMRON LY 4 24 VDC', 'BUAH', '', '09RO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(913, '09RO002- RELAY OMRON LY 2 24 V DC', 'BUAH', '', '09RO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(914, '09RP001- RING PLAT M 10', 'BUAH', '', '09RP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(915, '09RP005- RING PER 5/8\"', 'BUAH', '', '09RP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(916, '09RP006- RING PLAT 5/8\"', 'BUAH', '', '09RP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(917, '09RP008- RING PISTON P/N. 4145 034 3000 - A', 'BUAH', '', '09RP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(918, '09RR001- RADAR AIR ST 70', 'BUAH', '', '09RR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(919, '09RS001- RING SEFER', 'BUAH', '', '09RS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(920, '09RS002- RING SEHER MINYAK ', 'BUAH', '', '09RS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(921, '09RS003- STANG SEHER', 'BUAH', '', '09RS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(922, '09RS005- RING STOPPER ', 'BUAH', '', '09RS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(923, '09RS006- RANTAI RS 60 X 1 JALUR', 'BOX', '', '09RS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(924, '09RT001- RING TEMBAGA PLAT 0 108*112*0,5', 'BUAH', '', '09RT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(925, '09RT002- RING TEMBAGA BULAT 0 115*112*4', 'BUAH', '', '09RT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(926, '09RU001- RELAY UNIT OMRON 61F-11', 'BUAH', '', '09RU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(927, '09RX001- REGULATOR OXYGEN', 'UNIT', '', '09RX001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(928, '09SA001- SEAL ASBES', 'BUAH', '', '09SA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(929, '09SA002- SEAL ASBES 5/8\"', 'METER', '', '09SA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(930, '09SA003- SEAL ASBES / GLAND PACKING 3/4\"', 'METER', '', '09SA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(931, '09SA004- SEAL ASBES / GLAND PACKING 5/16\"', 'METER', '', '09SA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(932, '09SAJ01- SHAFT ASSY ( JPN )', 'PCS', '', '09SAJ01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(933, '09SB001- SEKRING BATU ', 'BUAH', '', '09SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(934, '09SB002- SHOULDER BELT ASSY P/N. 4145 710 9000 - A', 'BUAH', '', '09SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(935, '09SB003- STOP BUTTON COMP P/N. 4145 430 0201 - A', 'BUAH', '', '09SB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(936, '09SC001- STOP CONTAC AC', 'SET', '', '09SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(937, '09SC002- STOP CONTAC ( 2 L BG )', 'BUAH', '', '09SC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(938, '09SC003- STOP CONTAC ( 4 LBG )', 'BUAH', '', '09SC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(939, '09SC004- STOP CONTAC OB', 'BUAH', '', '09SC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(940, '09SC005- STOP CONTAC ELEGRAN', 'BUAH', '', '09SC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(941, '09SC006- SEMPROTAN CAT', 'BUAH', '', '09SC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(942, '09SC007- STOP CONTAC INBOW CLIPSAL', 'BUAH', '', '09SC007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(943, '09SC008- STOP KONTAK', 'BUAH', '', '09SC008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(944, '09SC009- SOCKET P2CF-08 OMRON', 'BUAH', '', '09SC009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(945, '09SC010- SPEED CONTROL JVTMBSTER400YN 220V TECO', 'UNIT', '', '09SC010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(946, '09SC011- SCREW M4 X 25 P/N. 9050 318 0740 - A', 'BUAH', '', '09SC011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(947, '09SC012- SCREW P/N. 9045 319 1020 - A', 'BUAH', '', '09SC012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(948, '09SC013- SOCKET RELAY P2 CF-11 OMRON', 'BUAH', '', '09SC013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(949, '09SD001- STEP CON DRAWING CAPSTAN', 'BUAH', '', '09SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(950, '09SD002- SAKLAR DOUBLE AUTBOKS', 'SET', '', '09SD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(951, '09SD004- SHOCK DRAT DALAM GALFANIS 3\"', 'BUAH', '', '09SD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(952, '09SD006- SAKLAR DOUBLE CLIPSAL', 'BUAH', '', '09SD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(953, '09SD007- SHOCK DRAT DALAM GALFANIS 2 1/2\"', 'BUAH', '', '09SD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(954, '09SD008- SHOCK DRAT LUAR PVC 1/2\"', 'BUAH', '', '09SD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(955, '09SD009- SEAL DUST', 'BUAH', '', '09SD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(956, '09SD010- SHOCK DRAT DALAM GALFANIS 1 1/2\"', 'BUAH', '', '09SD010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(957, '09SD011- SHOCK DRAT LUAR GALFANIS 1 1/2\"', 'BUAH', '', '09SD011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(958, '09SD034- SERVICE DINAMO MOTOR 3/4 HP 3 PH 380V', 'UNIT', '', '09SD034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(959, '09SE001- STECKER ELEGRAN 32 A/3 PHASE', 'BUAH', '', '09SE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(960, '09SE002- STECKER STOP CONTAC', 'BUAH', '', '09SE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(961, '09SF001- SERVICE FLOW METER TOKICO TYPE ROR 59 MM', 'BUAH', '', '09SF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(962, '09SF002- SEPARATOR FILTER', 'BUAH', '', '09SF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(963, '09SG001- SAKLAR GANTUNG', 'BUAH', '', '09SG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(964, '09SG002- SEDOTAN GOT', 'BUAH', '', '09SG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(965, '09SG004- SPROKET GEAR COILER', 'UNIT', '', '09SG004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(966, '09SG007- SAFETY GUARD P/N. 4145 713 4500 - A', 'BUAH', '', '09SG007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(967, '09SH001- SHOCK DRAT LUAR PVC 3\"', 'BUAH', '', '09SH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(968, '09SK001- STOP KRAN KIT 3/4\"', 'BUAH', '', '09SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(969, '09SK002- STOP KRAN KITT 1/2\"', 'BUAH', '', '09SK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(970, '09SK003- STOP KRAN KITT 1\"', 'BUAH', '', '09SK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(971, '09SK007- STOP KRAN 1/2\"', 'BUAH', '', '09SK007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(972, '09SK008- STOP KRAN KITT 21/2 \"', 'BUAH', '', '09SK008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(973, '09SK009- SAKLAR KRAN BC 1/2\"', 'BUAH', '', '09SK009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(974, '09SK010- SELONGSONG KERAMIK 14 mm', 'BTG', '', '09SK010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(975, '09SK011- STOP KRAN KIT 3/8\" (PUTAR)', 'BUAH', '', '09SK011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(976, '09SK012- SELONGSONG KERAMIK 12 MM X 1,20 MTR', 'BTG', '', '09SK012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(977, '09SL001- SELANG ANGIN 4*6 MM', 'METER', '', '09SL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(978, '09SL002- SELANG ANGIN 8,5*14 MM', 'METER', '', '09SL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(979, '09SL003- SELANG HITAM 1\" ( BS )', 'METER', '', '09SL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(980, '09SL004- SELANG ANGIN 6.5*10 mm', 'MTR', '', '09SL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(981, '09SL005- SELANG 1\"', 'MTR', '', '09SL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(982, '09SL006- SELANG 1 1/2\"', 'MTR', '', '09SL006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(983, '09SL007- SELANG 2\"', 'MTR', '', '09SL007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(984, '09SL008- SELANG 1 1/4\"', 'MTR', '', '09SL008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(985, '09SL009- SELANG GREASE HAND PUMP', 'BUAH', '', '09SL009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(986, '09SM001- SIKAT KAWAT MANGKOK ', 'BUAH', '', '09SM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(987, '09SN001- SIN CRONOSPIO SC 3 VI 360/380 V 50 HZ', 'BUAH', '', '09SN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(988, '09SN003- SELANG NYLON 3/4\"', 'BUAH', '', '09SN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(989, '09SN004- SELANG NYLON 3/8\"', 'MTR', '', '09SN004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(990, '09SO001- SELANG DOUBLE 400/OXYGEN', 'METER', '', '09SO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(991, '09SP001- STOCK PVC 3\"', 'BUAH', '', '09SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(992, '09SP002- SWITCH PUSH', 'BUAH', '', '09SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(993, '09SP004- SHOCK PVC 3/4\"', 'BUAH', '', '09SP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(994, '09SP005- SHOCK PVC 1/2\"', 'BUAH', '', '09SP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(995, '09SP006- SHOCK PVC 11/2\"', 'BUAH', '', '09SP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(996, '09SP007- SLIDING PER & SLIDING', 'SET', '', '09SP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(997, '09SP010- SPORKET 60 X 33', 'BUAH', '', '09SP010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(998, '09SP011- SAMBUNGAN PC - 10', 'BUAH', '', '09SP011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(999, '09SP012- SPARK PLUG P/N. 1110 400 7005', 'BUAH', '', '09SP012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1000, '09SP013- SHOULDER PLATE COMP P/N. 4145 701 1800 - ', 'BUAH', '', '09SP013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1001, '09SP014- SUPPORT P/N. 4145 432 9201 - A', 'BUAH', '', '09SP014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1002, '09SQ001- SELONGSONG KABEL PVC 20 MM', 'METER', '', '09SQ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1003, '09SQ002- SELONGSONG KERAMIK 14 MM @ 11/2 METER', 'BTG', '', '09SQ002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1004, '09SR001- SAMBUNGAN RANTAI (CORECTING LINK) 80-2', 'BUAH', '', '09SR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1005, '09SR002- SAMBUNGAN RANTAI RS 50*3', 'BUAH', '', '09SR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1006, '09SR003- SAMBUNGAN RANTAI', 'BUAH', '', '09SR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1007, '09SR004- SINGLE RING CAPSTAN 255*230*31', 'BUAH', '', '09SR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1008, '09SR005- SINGLE RING CAPSTAN 220*195*31', 'BUAH', '', '09SR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1009, '09SR006- SELANG RADIATOR ( BESAR)', 'MTR', '', '09SR006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1010, '09SR007- SELANG RADIATOR (KECIL)', 'MTR', '', '09SR007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1011, '09SR008- SINGLE RING CAPSTAN UK. 152 X 132 X H 20 ', 'BUAH', '', '09SR008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1012, '09SS001- STATER S-10', 'BUAH', '', '09SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1013, '09SS002- SAKLAR SESI', 'SET', '', '09SS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1014, '09SS003- SOLENOID STOP ENGINE', 'BUAH', '', '09SS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1015, '09SS004- SELANG SPIRAL 2\"', 'MTR', '', '09SS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1016, '09SS005- SELANG SOLAR', 'MTR', '', '09SS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1017, '09SS006- SELANG SANBLASTING 1 1/4\"', 'MTR', '', '09SS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1018, '09ST001- SEAL TAPE ', 'ROLL', '', '09ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1019, '09ST002- SOLDERAN TIMA', 'BUAH', '', '09ST002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1020, '09ST007- SAKLAR TRIPLE CLIPSAL', 'BUAH', '', '09ST007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1021, '09ST008- STANG TAP SNEE 2 \"', 'BUAH', '', '09ST008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1022, '09ST009- STANG TAP DRILL 3/8 \"', 'BUAH', '', '09ST009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1023, '09SV001- SELENOIT VALVE MODEL 4 V210/08', 'BUAH', '', '09SV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1024, '09SV002- SELENOID VALVE KURODA AS 2408 220 V', 'BUAH', '', '09SV002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1025, '09SV003- SOLENOID VALVE TYPE:4V330-10 220V', 'BUAH', '', '09SV003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1026, '09SV004- SOLENOID VALVE ', 'UNIT', '', '09SV004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1027, '09SV005- SOLENOID VALVE KCC TYPE:KS4130-032G 220V', 'BUAH', '', '09SV005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1028, '09SV006- SOLENOID VALVE VS4130-4G-03', 'BUAH', '', '09SV006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1029, '09SV007- SOLENOID VALVE KCC KS320S-2D 5PORT 1/4\"', 'BUAH', '', '09SV007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1030, '09SV008- SOLENOID VALVE PORT 1/4\"', 'BUAH', '', '09SV008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1031, '09SW001- SPIRAL WRAPPING BEND KS 6', 'BUAH', '', '09SW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1032, '09SW003- STOP WIRE P/N. 4145 440 1103 - A', 'BUAH', '', '09SW003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1033, '09TA001- TALI ASBESS 10 MM', 'ROLL', '', '09TA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1034, '09TA002- TALI ASBESS 12 MM', 'ROLL', '', '09TA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1035, '09TB001- TIMMING BELT ZR 900 H', 'BUAH', '', '09TB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1036, '09TB002- TIMMING BELT 357 L', 'BUAH', '', '09TB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1037, '09TB003- TANGKI BENSIN', 'BUAH', '', '09TB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1038, '09TB004- TUTUP TANGKI', 'BUAH', '', '09TB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1039, '09TB005- TIMMING BELT 950 H 1\"', 'BUAH', '', '09TB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1040, '09TB006- TIMMING BELT 450 H', 'BUAH', '', '09TB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1041, '09TB007- TERMINAL BLOCK 60 A', 'BUAH', '', '09TB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1042, '09TB008- TERMINAL BLOCK 30 A', 'BUAH', '', '09TB008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1043, '09TB009- TERMINAL KERAMIK 200 A', 'BUAH', '', '09TB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1044, '09TC001- THERMO COUPLE TYPE : K 0 5 MM', 'BUAH', '', '09TC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1045, '09TC003- THERMO COUPLE POSITHEREM TE 132306', 'BUAH', '', '09TC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1046, '09TC004- TEMPERATUR CONTROL', 'UNIT', '', '09TC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1047, '09TC005- THERMO CONTROL AUTONIC', 'BUAH', '', '09TC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1048, '09TC006- TC 5', 'BUAH', '', '09TC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1049, '09TD001- TEE DRAT GALFANIS 3 X 1 1/2\"', 'BUAH', '', '09TD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1050, '09TD003- TAP DRILL 1/2\"', 'SET', '', '09TD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1051, '09TD004- TAP DRILL 3/8\"', 'SET', '', '09TD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1052, '09TD005- TAP M5', 'BUAH', '', '09TD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1053, '09TD006- TEE DRAT GALFANIS 2\" X 1\"', 'BUAH', '', '09TD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1054, '09TD007- TAP DRILL 28MM X 1 1/2\"', 'BUAH', '', '09TD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1055, '09TD008- TAP DRILL 28MM X 1 1/2\"', 'SET', '', '09TD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1056, '09TD009- TAP DRILL 5/16 \"', 'SET', '', '09TD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1057, '09TE001- TEE PVC 4\"', 'BUAH', '', '09TE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1058, '09TF001- THERMO FIT 0 2,5 MM ', 'ROLL', '', '09TF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1059, '09TG001- TEE GALFANIS 1\"', 'BUAH', '', '09TG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1060, '09TG002- TEE GALFANIS 11/2*11/2\"', 'BUAH', '', '09TG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1061, '09TG003- TEE GALFANIS 2\"*1\"', 'BUAH', '', '09TG003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1062, '09TH001- TUBULAR HEATER 0 15,5*700 220 V/400 W', 'BUAH', '', '09TH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1063, '09TI001- TIMA', 'ROLL', '', '09TI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1064, '09TK001- TAKEL/CHAIN HOIST MANUAL CAPS : 1 TON', 'UNIT', '', '09TK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1065, '09TK002- TAKEL/CHAIN MANUAL CAPS : 2 TON', 'UNIT', '', '09TK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1066, '09TK003- TESPEN KECIL', 'BUAH', '', '09TK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1067, '09TK004- TERMINAL KABEL SIEMENS 8WA1 012-1DP14', 'BUAH', '', '09TK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1068, '09TK005- TAKEL / MANUAL CHAIN HOIST CAPS. 2 TON', 'UNIT', '', '09TK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1069, '09TL001- THERMINAL BLOCK 100 A/4 JALUR', 'BUAH', '', '09TL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1070, '09TL003- TANG LANCIP 5\" (GAGANG MERAH)', 'BUAH', '', '09TL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1071, '09TL004- TEE LAS GALFANIS 21/2\"', 'BUAH', '', '09TL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1072, '09TM001- TIMER SWITCH SUL 181 B/220 V', 'BUAH', '', '09TM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1073, '09TM002- TIMER STPNH NO.3 H3CR A-8 OMRON 110-240V', 'BUAH', '', '09TM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1074, '09TM003- TIMER H3CR-A8E AC 100-240 OMRON', 'BUAH', '', '09TM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1075, '09TN001- TANG COMBINASI 8\"', 'BUAH', '', '09TN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1076, '09TO001- THERMAL OVER LOAD THN-6054 A ( 43-65 A )', 'BUAH', '', '09TO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1077, '09TO002- THERMAL OVER LOAD THN-20/0-7A (0,55-0,86', 'BUAH', '', '09TO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1078, '09TO003- THERMAL OVERLOAD THN-12 (1,4-2,0 A)', 'BUAH', '', '09TO003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1079, '09TO004- THERMAL OVERLOAD THN-20/29A (24-34A)', 'BUAH', '', '09TO004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1080, '09TO005- THERMAL OVER LOAD THN-12/2,1A (1,7-2,5A ', 'BUAH', '', '09TO005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1081, '09TO006- THERMAL OVERLOAD THN-20/7-II A', 'BUAH', '', '09TO006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1082, '09TO007- THERMAL OVERLOAD THN-20/2,1A (1,7-2,5A) ', 'BUAH', '', '09TO007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1083, '09TO008- THERMAL OVERLOAD THN 20/11A ( 9 - 13 A )', 'BUAH', '', '09TO008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1084, '09TO009- THERMAL OVERLOAD THN-60 ( 34-50A)', 'BUAH', '', '09TO009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1085, '09TO010- THERMAL OVERLOAD THN-120/54A ( 43 - 65 A', 'BUAH', '', '09TO010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1086, '09TO011- THERMAL OVERLOAD THN-120/67 A( 54-80A)', 'BUAH', '', '09TO011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1087, '09TO012- THERMAL OVERLOAD THN 20 - 19 A', 'UNIT', '', '09TO012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1088, '09TO013- THERMAL OVERLOAD THN-20/9A', 'BUAH', '', '09TO013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1089, '09TO014- THERMAL OVERLOAD THN-20 / 15 A', 'BUAH', '', '09TO014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1090, '09TO015- THERMAL OVERLOAD THN - 20 / 6,6 A', 'BUAH', '', '09TO015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1091, '09TO016- THERMAL OVERLOAD THN - 20 / 3,6 A', 'BUAH', '', '09TO016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1092, '09TO017- THERMAL OVERLOAD THN - 20 / 5 A', 'BUAH', '', '09TO017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1093, '09TP001- THEMPERATUR CONTROL MDL : 200 110/220 V', 'BUAH', '', '09TP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1094, '09TP002- TAPPER PULLEY TYPEC5  300MM', 'UNIT', '', '09TP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1095, '09TP003- TIMAH PAYUNG', 'BUAH', '', '09TP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1096, '09TP004- TEE PVC 11/2', 'BUAH', '', '09TP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1097, '09TP005- TEE PVC 11/2 X 3/4', 'BUAH', '', '09TP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1098, '09TP007- TEE PVC 11/2\"*1/2\"', 'BUAH', '', '09TP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1099, '09TP008- TEE PVC 1/2\"', 'BUAH', '', '09TP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1100, '09TR001- TEE REDUSER GALFANIS 2 1/2\" X 1 1/2\"', 'BUAH', '', '09TR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1101, '09TS001- TOGLE SWITCH 2 P', 'BUAH', '', '09TS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1102, '09TS003- TEE SHOCK PVC 1 1/2\" X 1/2\"', 'BUAH', '', '09TS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1103, '09TS004- TEE STAINLESS STELL 1 1/2\" X 1\"', 'BUAH', '', '09TS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1104, '09TS005- TAP SNEE 1/2 \"', 'SET', '', '09TS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1105, '09TS006- TAP SNEE 3/8 \"', 'SET', '', '09TS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1106, '09TS007- TAP SNEE 3/4 \"', 'SET', '', '09TS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1107, '09TS008- TAP SNEE 5/8 \"', 'SET', '', '09TS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1108, '09TV001- THERMOSTATIC VALVE P/N. 2901-0074-00', 'SET', '', '09TV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1109, '09TW001- THROTTLE WIRE COMPL P/N. 4145 180 1101 - ', 'BUAH', '', '09TW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1110, '09VA001- VANBELT A-30', 'BUAH', '', '09VA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1111, '09VA002- VANBELT A-32', 'BUAH', '', '09VA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1112, '09VA003- VANBELT A-53', 'BUAH', '', '09VA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1113, '09VA004- VANBELT A-71', 'BUAH', '', '09VA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1114, '09VA005- VANBELT A-88', 'BUAH', '', '09VA005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1115, '09VA006- VANBELT A-56', 'BUAH', '', '09VA006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1116, '09VA007- VANBELT A 57', 'BUAH', '', '09VA007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1117, '09VA008- VANBELT A 63', 'BUAH', '', '09VA008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1118, '09VA009- VANBELT A - 59', 'BUAH', '', '09VA009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1119, '09VB001- VANBELT B-36', 'BUAH', '', '09VB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1120, '09VB002- VANBELT B-46', 'BUAH', '', '09VB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1121, '09VB003- VANBELT B-56', 'BUAH', '', '09VB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1122, '09VB004- VANBELT B-57', 'BUAH', '', '09VB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1123, '09VB005- VANBELT B-65', 'BUAH', '', '09VB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1124, '09VB006- VANBELT B-69', 'BUAH', '', '09VB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1125, '09VB007- VANBELT B-71', 'BUAH', '', '09VB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1126, '09VB008- VANBELT B-73', 'BUAH', '', '09VB008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1127, '09VB009- VANBELT B-76', 'BUAH', '', '09VB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1128, '09VB010- VANBELT B-80', 'BUAH', '', '09VB010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1129, '09VB011- VANBELT B-81', 'BUAH', '', '09VB011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1130, '09VB012- VANBELT B-40', 'BUAH', '', '09VB012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1131, '09VB013- VANBELT B-70', 'BUAH', '', '09VB013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1132, '09VB014- VANBELT B-47', 'BUAH', '', '09VB014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1133, '09VB015- VANBELT B-52', 'BUAH', '', '09VB015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1134, '09VB016- VANBELT B-77', 'BUAH', '', '09VB016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1135, '09VB017- VANBELT B 28', 'BUAH', '', '09VB017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1136, '09VB018- VANBELT B 33', 'BUAH', '', '09VB018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1137, '09VB019- VANBELT B 52', 'BUAH', '', '09VB019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1138, '09VB020- VANBELT B 64', 'BUAH', '', '09VB020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1139, '09VB021- VANBELT B 68', 'BUAH', '', '09VB021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1140, '09VB022- VANBELT B 94', 'BUAH', '', '09VB022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1141, '09VB023- VANBELT B-49', 'BUAH', '', '09VB023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1142, '09VB024- VANBELT B-48', '', '', '09VB024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1143, '09VB028- VANBELT B 43', 'BUAH', '', '09VB028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1144, '09VB029- VANBELT C-154', 'BUAH', '', '09VB029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1145, '09VB030- VANBELT B-86', 'BUAH', '', '09VB030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1146, '09VB031- VANBELT B-54', 'BUAH', '', '09VB031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1147, '09VB032- VANBELT B - 124', 'BUAH', '', '09VB032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1148, '09VB033- VANBELT KULIT B - 45', 'BUAH', '', '09VB033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1149, '09VB035- VANBELT A-49', 'BUAH', '', '09VB035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1150, '09VB036- VANBELT A-63', 'BUAH', '', '09VB036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1151, '09VB037- VANBELT B-47', 'BUAH', '', '09VB037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1152, '09VB038- VANBELT B-138', 'BUAH', '', '09VB038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1153, '09VB039- VANBELT A440 ( 12.5 x 1175 LA)', 'BUAH', '', '09VB039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1154, '09VB040- VANBELT A440 ( 12.5 x 1150 LA )', 'BUAH', '', '09VB040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1155, '09VB041- VANBELT B - 105', 'BUAH', '', '09VB041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1156, '09VB042- VANBELT B - 68', 'BUAH', '', '09VB042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1157, '09VB043- VANBELT B - 94', 'BUAH', '', '09VB043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1158, '09VB044- VANBELT A - 25', 'BUAH', '', '09VB044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1159, '09VB045- VANBELT A - 40', 'BUAH', '', '09VB045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1160, '09VC001- VANBELT C-100', 'BUAH', '', '09VC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1161, '09VC002- VANBELT C-138', 'BUAH', '', '09VC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1162, '09VC003- VANBELT C-177', 'BUAH', '', '09VC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1163, '09VC004- VANBELT C 225', 'BUAH', '', '09VC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1164, '09VC005- VANBELT C 90', 'BUAH', '', '09VC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1165, '09VC006- VANBELT C 170', 'BUAH', '', '09VC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1166, '09VC008- VANBELT C-152', 'BUAH', '', '09VC008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1167, '09VC009- VANBELT C- 187', 'BUAH', '', '09VC009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1168, '09VC010- VANBELT C - 140', 'BUAH', '', '09VC010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1169, '09VD001- VANBELT D-145', 'BUAH', '', '09VD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1170, '09VD002- VANBELT D 160', 'BUAH', '', '09VD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1171, '09VD004- VANBELT D 150', 'BUAH', '', '09VD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1172, '09VD005- VANBELT D - 160', 'BUAH', '', '09VD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1173, '09VG001- VACUM GAUGE TYPE:CLASS DIA 3/8\"/100 MM', 'BUAH', '', '09VG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1174, '09VK001- VANBELT KULIT CHLT 3 4*55*1340', 'BUAH', '', '09VK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1175, '09VK002- VANBELT KULIT CHLT 3 4*35*1720', 'BUAH', '', '09VK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1176, '09VK003- VANBELT KULIT CHLT 3 50*1355', 'BUAH', '', '09VK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1177, '09VK004- VANBELT KULIT CH LT 3 50*1365', 'BUAH', '', '09VK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1178, '09VK005- VANBELT KULIT CH LT 3 50*1120', 'BUAH', '', '09VK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1179, '09VK006- VANBELT KULIT CH LT 3 35*1150', 'BUAH', '', '09VK006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1180, '09VK007- VANBELT KULIT CH LT 3 35*11/2', 'BUAH', '', '09VK007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1181, '09VK008- VANBELT KULIT CH LT 3 35*1360', 'BUAH', '', '09VK008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1182, '09VK009- VANBELT KULIT CH LT 3 30*1166', 'BUAH', '', '09VK009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1183, '09VK010- VANBELT KULIT CALT 3 O AMM*20*955', 'BUAH', '', '09VK010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1184, '09VK011- VANBELT  KULIT CHLT 3 65*1900', 'BUAH', '', '09VK011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1185, '09VK012- VANBELT KULIT CHLT3 40*1100', 'BUAH', '', '09VK012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1186, '09VK013- VANBELT KULIT CHLT 3 50 X 1350', 'BUAH', '', '09VK013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1187, '09VK021- VANBELT KULIT CHLT3 35*1465', 'BUAH', '', '09VK021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1188, '09VK022- VANBELT KULIT CHLT3  30*1160', 'BUAH', '', '09VK022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1189, '09VK023- VANBELT KULIT CHLT3  35*1345', 'BUAH', '', '09VK023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1190, '09VK024- VANBELT KULIT CHLT3  65*1860', 'BUAH', '', '09VK024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1191, '09VK025- VANBELT KULIT CHLT3  35*1500', 'BUAH', '', '09VK025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1192, '09VK026- VANBELT KULIT CHLT3 35*1465', 'BUAH', '', '09VK026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1193, '09VK027- VANBELT KULIT CHLT3 50*2025', 'BUAH', '', '09VK027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1194, '09VK028- VANBELT KULIT CHLT3 35*1100', 'BUAH', '', '09VK028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1195, '09VK029- VANBELT KULIT CHLT3 30 X 1570', 'BUAH', '', '09VK029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1196, '09VK030- VANBELT KULIT CHLT3 4 X 60 X 1925', 'BUAH', '', '09VK030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1197, '09VK031- VANBELT KULIT CHLT3  4 X 65 X 1900', 'BUAH', '', '09VK031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1198, '09VK032- VANBELT KULIT CHLT3 UK. 35 X 1340', 'BUAH', '', '09VK032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1199, '09VK033- VANBELT KULIT CHLT3 65 X 1885', 'BUAH', '', '09VK033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1200, '09VK034- VANBELT KULIT CHLT3 UK. 35 X 1090', 'BUAH', '', '09VK034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1201, '09VO001- VANBELT O 3*27,5*965', 'BUAH', '', '09VO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1202, '09VP001- VANBELT 3  V*750', 'BUAH', '', '09VP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1203, '09VR001- VLOCK RING 1/4 \" X 3/8 \"', 'BUAH', '', '09VR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1204, '09VS001- VARIABLE SPEED DRIVE TYPE D007 A-M', 'UNIT', '', '09VS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1205, '09VS002- VARIABLE SPEED REDUCER TYPE NMRV 0,37', 'UNIT ', '', '09VS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1206, '09VS003- VALVE SETTING EX OM 444 LA', 'BUAH', '', '09VS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1207, '09VT001- VLOCK TEE GALFANIS 1 1/2\" X 3/4\"', 'BUAH', '', '09VT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1208, '09VT002- VLOCK TEE GALFANIS 1 1/2\" X 1/2\"', 'BUAH', '', '09VT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1209, '09VT003- VLOCK TEE GALFANIS 1 1/2\" X 1\"', 'BUAH', '', '09VT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1210, '09VW001- VINYL WIRE IND CAP BLUE O 16 MM @100', 'PAK', '', '09VW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1211, '09VW002- VINYL WIRE END CAP BLACK O 16 MM @100', 'PAK', '', '09VW002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1212, '09VW003- VINYL WIRE END CAP YELLOW O 1,5MM @100', 'PAK', '', '09VW003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1213, '09VW004- VINYL WIRE ENG CAP KED O 1,5MM @100', 'PAK', '', '09VW004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1214, '09VW005- VOLT METER VT-6705 0-100/10 V VICTOR', 'PAK', '', '09VW005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1215, '09VW006- VINYL WIRE END CAP BLACK O 1,5MM @100', 'PAK', '', '09VW006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1216, '09VW007- VINYL WIRE END CAP YELLOW O 2,5MM @100', 'PAK', '', '09VW007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1217, '09VW008- VINYL WIRE END CAP RED O 2,5MM @100', 'PAK', '', '09VW008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1218, '09VW009- VINYL WIRE END CAP BLUE O 1,5MM @100', 'PAK', '', '09VW009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1219, '09WD001- WD 40', 'KLG', '', '09WD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1220, '09WG001- WATER MUR GALFANIS 1/2\"', 'BUAH', '', '09WG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1221, '09WG002- WATER MUR GALFANIS 3/4\"', 'BUAH', '', '09WG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1222, '09WG003- WATER MUR GALFANIS 2\"', 'BUAH', '', '09WG003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1223, '09WG004- WATER MUR GALFANIS 11/2\"', 'BUAH', '', '09WG004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1224, '09WG006- WATER MUR GALFANIS 21/2\"', 'BUAH', '', '09WG006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1225, '09WG007- WATER MUR GALFANIS 1\"', 'BUAH', '', '09WG007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1226, '09WM001- WIRE MESS 6 MM', 'LBR', '', '09WM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1227, '09WM002- WATER METER 1\" MEREK TIRAS', 'UNIT', '', '09WM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1228, '09WM003- WIRE MESS 5,5 MM', 'LBR', '', '09WM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1229, '09WO001- WO-40', 'KLG', '', '09WO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1230, '09WP001- WATER MUR PVC 1\"', 'BUAH', '', '09WP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1231, '09WP002- WATER PAS 600 mm/24\"', 'BUAH', '', '09WP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1232, '09WS001- WATER MUR STEAM 3/4\"', 'BUAH', '', '09WS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1233, '09WS002- WATER MUR STEAM O 3\"', 'BUAH', '', '09WS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1234, '09WS003- WSD / DRAIN VALVE', 'UNIT', '', '09WS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1235, '09WS004- WATER MUR STAINLESS STELL 1\"', 'BUAH', '', '09WS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1236, '09WS005- WATER MUR STAINLESS STELL 1 1/2\"', 'BUAH', '', '09WS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1237, '09WS006- WASHER P/N. 9321 630 0180 - A', 'BUAH', '', '09WS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1238, '09WT001- WATER TEMPERATURE GAUGE 40-120C 52 MM', 'BUAH', '', '09WT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1239, '10001SD- SERVICE DINAMO MTR 100HP/75KW', 'UNIT', '', '10001SD', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1240, '10012DB- SERVICE DINAMO BLOWER RPM 2800', 'UNIT', '', '10012DB', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1241, '1001SDM- SERVICE DINAMO MTR 15 WATT 220 V', 'UNIT', '', '1001SDM', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1242, '1001SMS- SERVICE MESIN SERUT 220-230V', 'UNIT', '', '1001SMS', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1243, '1004SAA- SERVICE ABSEN AMANO', 'UNIT', '', '1004SAA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1244, '1010SS0- SERVICE MESIN SAMBUNG 380 V', 'UNIT', '', '1010SS0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1245, '10BP001- BONGKAR + PASANG AC', 'UNIT', '', '10BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1246, '10C0001- CONECTOR', 'BUAH', '', '10C0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1247, '10FC001- FABRIKASI CYLINDER HEAD', 'UNIT', '', '10FC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1248, '10FC002- FABRIKASI CRANKSHAFT', 'UNIT', '', '10FC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1249, '10FE001- FABRIKASI ENGINE', 'UNIT', '', '10FE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1250, '10FG001- REPAIR FLYWHEEL GEAR', 'UNIT', '', '10FG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1251, '10IA001- ISI ANGIN NITROGEN', 'RODA', '', '10IA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1252, '10ISC01- INSTALLASI SERVER', 'UNIT', '', '10ISC01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1253, '10JB001- JASA BONGKAR PASANG', 'UNIT', '', '10JB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1254, '10JCWH1- JASA CEK/SERVICE WATER HEATER', 'UNIT', '', '10JCWH1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1255, '10JG001- JASA GENERAL OVER HAUL GENSET', 'UNIT', '', '10JG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1256, '10JH001- JASA OVERHAUL ENGINE', 'UNIT', '', '10JH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1257, '10JK001- JASA KERJA ', 'UNIT', '', '10JK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1258, '10JOT01- JASA OVERHAUL TRANSMISSION', 'LOT', '', '10JOT01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1259, '10JP001- JASA PASANG ', 'UNIT', '', '10JP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1260, '10JPCA1- JASA PEMINDAHAN CEROBONG ASAP', 'UNIT', '', '10JPCA1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1261, '10JPCA2- JASA PERBAIKAN CEROBONG APOLLO', 'UNIT', '', '10JPCA2', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1262, '10JS001- JASA SERVICE', 'UNIT', '', '10JS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1263, '10JS002- JASA SERVICE FORKLIP', 'UNIT', '', '10JS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1264, '10KI001- KALIBRASI INJECTION PUMP + PART', 'UNIT', '', '10KI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1265, '10KN001- KALIBRASI NOZZLE', 'BUAH', '', '10KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1266, '10KS001- KONTRAK SERVICE MESIN FOTO COPY', 'UNIT', '', '10KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1267, '10KT001- KALIBRASI TIMBANGAN', 'UNIT', '', '10KT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1268, '10MS001- MESIN SAMBUNG COLD WELDER ', 'UNIT', '', '10MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1269, '10PIC01- PEMINDAHAN INSTALASI COMPUTER', 'TITIK', '', '10PIC01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1270, '10RA001- REPAIR AS CAPSTAN', 'BUAH', '', '10RA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1271, '10RA002- REPAIR AS C / V ( HARD CROOM )', 'BUAH', '', '10RA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1272, '10RA003- REPAIR AS COILER', 'BUAH', '', '10RA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1273, '10RA004- REPAIR AS ROTOR DINAMO', 'BUAH', '', '10RA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1274, '10RB001- REPAIR BOS PISTON', 'BUAH', '', '10RB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1275, '10RB002- REPAIR BOS PELATUK', 'BUAH', '', '10RB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1276, '10RC001- REPAIR ROD TILT CYLINDER', 'BUAH', '', '10RC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1277, '10RC002- REPAIR + CERAMIC COATING ROLL CAPSTAN 155', 'BUAH', '', '10RC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1278, '10RCF01- REPAIR CASE ', 'PCS', '', '10RCF01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1279, '10RCS01- REPAIR CLUTCH SYSTEM', 'LOT', '', '10RCS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1280, '10RH001- REPAIR+HARD CROME ROLL CAPSTAN 16\"', 'BUAH', '', '10RH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1281, '10RH002- REPAIR+HARD CROME ROLL CAPSTAN 18\"', 'BUAH', '', '10RH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1282, '10RP001- REPAIR AS', 'BTG', '', '10RP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1283, '10RP002- REPAIR PULLY', 'BUAH', '', '10RP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1284, '10RR001- REPAIR RUMAH BEARING', 'BUAH', '', '10RR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1285, '10RS001- REPAIR DUDUKAN SEAL', 'BUAH', '', '10RS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1286, '10SA001- SERVICE CUCI AC ', 'UNIT', '', '10SA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1287, '10SA002- SERVICE AC', 'UNIT', '', '10SA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1288, '10SA003- SERVICE AIR DRYER', 'UNIT', '', '10SA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1289, '10SA004- SERVICE MESIN ABSEN AMANO', 'UNIT', '', '10SA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1290, '10SA005- KURAS + STROOM ACCU', 'UNIT', '', '10SA005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1291, '10SA006- SERVICE AC + SPAREPART', 'UNIT', '', '10SA006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1292, '10SB001- SERVICE BRICK MAGNIT', 'UNIT', '', '10SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1293, '10SB002- SERVICE BLOWER1/2 HP/380V', 'UNIT', '', '10SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1294, '10SB200- SERVICE BESAR 2000 HRS', 'LOT', '', '10SB200', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1295, '10SBS01- SERVICE BESAR ( OVERHAUL ) + SPAREPART', 'UNIT', '', '10SBS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1296, '10SC001- SERVICE COMPUTER ', 'UNIT', '', '10SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1297, '10SC002- SERVICE KOMPRESOR KOBELCO KST 37-5 @ 300', 'UNIT', '', '10SC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1298, '10SC003- SERVICE COMPRESOR ATLAS COPCO GA 75', 'UNIT', '', '10SC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1299, '10SC004- SERVICE CALCULATOR CASIO HR 224 A', 'BUAH', '', '10SC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1300, '10SC005- SEWA CRANE', 'UNIT', '', '10SC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1301, '10SC006- SERVICE CALCULATOR CASIO', 'BUAH', '', '10SC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1302, '10SC007- SERVICE COMPUTER', 'SET', '', '10SC007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1303, '10SC008- SERVICE CAMERA CCTV', 'UNIT', '', '10SC008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1304, '10SD001- SERVICE DINAMO MOTOR 2 HP / 380 V', 'UNIT', '', '10SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1305, '10SD002- SERVICE DINAMO MOTOR TRAVES 220 V', 'UNIT', '', '10SD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1306, '10SD003- SERVICE DINAMO AMPER', 'UNIT', '', '10SD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1307, '10SD004- SERVICE DINAMO STATER', 'UNIT', '', '10SD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1308, '10SD005- SERVICE DINAMO MOYOR 15 HP / 380 V ', 'UNIT', '', '10SD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1309, '10SD006- SERVICE DINAMO MOTOR 7.5 HP/380 V', 'UNIT', '', '10SD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1310, '10SD007- SERVICE DINAMO MOTOR BLOWER', 'UNIT', '', '10SD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1311, '10SD008- SERVICE DINAMO MOTOR 50 HP/380', 'UNIT', '', '10SD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1312, '10SD009- SERVICE DINAMO MOTOR 1/3 HP - 220 V', 'UNIT', '', '10SD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1313, '10SD010- SERVICE DINAMO MOTOR 1/4 HP/220-380V', 'UNIT', '', '10SD010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1314, '10SD011- SERVICE DINAMO MOTOR 30HP/380V', 'UNIT', '', '10SD011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1315, '10SD012- SERVICE DINAMO MOTOR TRAVES 1/2HP/220V', 'UNIT', '', '10SD012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1316, '10SD013- SERVICE DINAMO MOTOR 1/2 HP/380 V', 'UNIT', '', '10SD013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1317, '10SD014- SERVICE DINAMO MOTOR 1HP/380 V', 'UNIT', '', '10SD014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1318, '10SD015- SERVICE DINAMO MOTOR 3/4 HP 6 POLE', 'UNIT', '', '10SD015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1319, '10SD016- SERVICE DINAMO MOTOR 125 HP + ROTOR', 'UNIT', '', '10SD016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1320, '10SD017- SERVICE DINAMO GURINDA PTG 220 V', 'UNIT', '', '10SD017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1321, '10SD018- SERVICE DINAMO MOTOR 3HP/380V', 'UNIT', '', '10SD018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1322, '10SD019- SERVICE DINAMO MOTOR BLOWER 1 HP / 380 V', 'UNIT', '', '10SD019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1323, '10SD020- SERVICE DINAMO MOTOR BLOWER 1/2 HP /380V', 'UNIT', '', '10SD020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1324, '10SD021- SERVICE DINAMO TRAVES 1/2 HP 380 V', 'UNIT', '', '10SD021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1325, '10SD022- SERVICE DINAMO MOTOR 75 HP 380 V', 'UNIT', '', '10SD022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1326, '10SD023- SERVICE DINAMO MOTOR 100 HP 380 V', 'UNIT', '', '10SD023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1327, '10SD024- SERVICE DINAMO MOTOR 1/8 HP 380V 100W', 'UNIT', '', '10SD024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1328, '10SD025- SERVICE DINAMO MOTOR 3/4 HP 380 V', 'UNIT', '', '10SD025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1329, '10SD026- SERVICE DINAMO MOTOR 5,5 HP / 380 V', 'UNIT', '', '10SD026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1330, '10SD027- SERVICE DINAMO STATER', 'UNIT', '', '10SD027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1331, '10SD028- SERVICE DINAMO MOTOR SLIP RING 125 HP / 3', 'UNIT', '', '10SD028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1332, '10SD029- SERVICE DINAMO MOTOR TRAVES 3 PHASE / 220', 'UNIT', '', '10SD029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1333, '10SD030- SERVIS DINAMO BLOWER 3 PASE 380V', 'UNIT', '', '10SD030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1334, '10SD031- SERVICE DINAMO MOTOR 10 HP/380V', 'UNIT', '', '10SD031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1335, '10SD032- SERVICE DINAMO MOTOR 1,5 HP/220V', 'UNIT', '', '10SD032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1336, '10SD033- SERVICE DINAMO MOTOR TRAVES 1 HP/220V', 'UNIT', '', '10SD033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1337, '10SD034- SERVICE DINAMO MOTOR 4 HP/380V', 'UNIT', '', '10SD034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1338, '10SD035- SERVICE DINAMO MOTOR 15 HP/220 V', 'UNIT', '', '10SD035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1339, '10SD036- SERVICE DINAMO MOTOR 15 HP 220-380 V', 'UNIT', '', '10SD036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1340, '10SD037- SERVICE DINAMO MOTOR 1 HP/380 V', 'UNIT', '', '10SD037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1341, '10SD038- SERVICE DINAMO MOTOR 1/4 HP 220 V', 'UNIT', '', '10SD038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1342, '10SD039- SERVICE DINAMO MOTOR 1/2 HP 220-380V', 'UNIT', '', '10SD039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1343, '10SD040- SERVICE DVR CCTV', 'UNIT', '', '10SD040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1344, '10SD041- SERVICE DAPUR ROLLING', 'UNIT', '', '10SD041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1345, '10SDB01- SERVICE DINAMO BLOWER 1/2 HP 380 V', 'UNIT', '', '10SDB01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1346, '10SDFBV- SERVICE DINAMO FAN BLOWER 220 V', 'UNIT', '', '10SDFBV', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1347, '10SDH03- SERVICE DINAMO HOIST 3 PH/380V', 'UNIT', '', '10SDH03', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1348, '10SDM01- SERVICE DINAMO MOTOR 20 HP-3PASE/380V', 'UNIT', '', '10SDM01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1349, '10SDM5H- SERVICE DINAMO MOTOR 5 HP/380 V', 'UNIT', '', '10SDM5H', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1350, '10SDMB1- SERVICE DINAMO MOTOR BLOWER 2HP/380V', 'UNIT', '', '10SDMB1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1351, '10SE001- SERVICE FORKLIP', 'UNIT', '', '10SE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1352, '10SF001- SEWA FORKLIP', 'UNIT', '', '10SF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1353, '10SG001- SERVICE GENSET MERCY OM 444 LA 500 KVA ', 'UNIT', '', '10SG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1354, '10SH001- SERVICE HT ( RADIO PANGGIL)', 'UNIT', '', '10SH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1355, '10SHCB1- SERVICE HOLDER CARBON BRUSH', 'BUAH', '', '10SHCB1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1356, '10SI001- SERVICE INVERTER ', 'UNIT', '', '10SI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1357, '10SI002- SERVICE INVERTER FUJI TYPE G9S', 'UNIT', '', '10SI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1358, '10SI003- SERVICE INVERTER  MITSUBISHI 4500', 'UNIT', '', '10SI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1359, '10SI004- SERVICE INJECTION PUMP', 'UNIT', '', '10SI004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1360, '10SI005- SERVICE INVERTER FUJI FVR G7S 5,5 KW', 'UNIT', '', '10SI005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1361, '10SI006- SERVICE INVERTER FUJI FRENIC FVR110G7S 11', 'UNIT', '', '10SI006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1362, '10SI007- SERVICE INVERTER MITSUBISHI FR A520-11K', 'UNIT', '', '10SI007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1363, '10SI008- SERVICE INVERTER SHSY 3PH', 'UNIT', '', '10SI008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1364, '10SI009- SERVIS INVERTER FUJI FVR G7S 11KW', 'UNIT', '', '10SI009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1365, '10SI010- SERVICE INVERTER FUJI FRENIC 5000 G9S', 'UNT', '', '10SI010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1366, '10SI011- SERVICE INVERTER FUJI FVR G7S', 'UNT', '', '10SI011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1367, '10SI012- SERVICE INDOVISION', 'UNIT', '', '10SI012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1368, '10SJ001- SERVICE JOK', 'UNIT', '', '10SJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1369, '10SK001- SERVICE KNALPOT ', 'BUAH', '', '10SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1370, '10SK002- SERVICE KIPAS ANGIN 1 PHASE 220V', 'UNIT', '', '10SK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1371, '10SK003- SERVICE KULKAS', 'UNIT', '', '10SK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1372, '10SM001- SERVICE SENSOR METAL', 'UNIT', '', '10SM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1373, '10SM002- SERVICE MOBIL ', 'UNIT', '', '10SM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1374, '10SM003- SERVICE MOTOR EXHAUST FAN 1/2 HP/220 V', 'UNIT', '', '10SM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1375, '10SM004- SERVICE MOTOR ROLLING 600 HP', 'UNIT', '', '10SM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1376, '10SM005- SERVICE EXHAUST FAN 220V', 'UNIT', '', '10SM005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1377, '10SM006- SERVICE MESIN FOTO COPY', 'UNIT', '', '10SM006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1378, '10SM007- SERVICE MOBIL + GANTI OLI', 'UNIT', '', '10SM007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1379, '10SM008- SERVICE MESIN TIK ELECTRIK', 'UNIT ', '', '10SM008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1380, '10SMR01- SERVICE MESIN ROLLING', 'UNIT', '', '10SMR01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1381, '10SN001- SERVICE NOZEL', 'SET', '', '10SN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1382, '10SP001- SERVICE SEPEDA MOTOR', 'UNIT', '', '10SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1383, '10SP002- SPOORING', 'UNIT', '', '10SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1384, '10SP003- SERVICE PULLY DENSER ALUMINIUM', 'BUAH', '', '10SP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1385, '10SP004- SERVICE PRINTER', 'UNIT', '', '10SP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1386, '10SP005- SERVICE PANTEK COUPLING', 'UNIT', '', '10SP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1387, '10SP006- SERVICE PER', 'SET', '', '10SP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1388, '10SP007- SERVICE PLC ', 'UNIT', '', '10SP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1389, '10SP008- SERVICE PANEL SINCRON', 'UNIT', '', '10SP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1390, '10SP009- SERVICE PRINTER BARCODE', 'UNIT', '', '10SP009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1391, '10SP010- SERVICE PARABOLA', 'UNIT', '', '10SP010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1392, '10SP011- SERVICE SEPEDA', 'UNIT', '', '10SP011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1393, '10SPC01- SERVICE POMPA CELUP 1 PHASE 220V', 'UNIT', '', '10SPC01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1394, '10SPS01- SERVICE/GANTI MOTOR POMPA', 'UNIT', '', '10SPS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1395, '10SR001- SERVICE REM ', 'SET', '', '10SR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1396, '10SR002- SERVICE RADIATOR ', 'UNIT', '', '10SR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1397, '10SRC01- SERVICE RING CAPSTAN', 'PCS', '', '10SRC01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1398, '10SRC02- SERVICE ROLL CAPSTAN', 'PCS', '', '10SRC02', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1399, '10SRDR1- SERVICE REL DAPUR ROLLING', 'SET', '', '10SRDR1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1400, '10SRSR1- SERVICE ROTOR SLIP RING 800HP/380V/6POLE', 'UNIT', '', '10SRSR1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1401, '10SS002- SERVICE SPULL BRICK', 'BUAH', '', '10SS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1402, '10SS003- SEWA STEGER', 'SET', '', '10SS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1403, '10SS004- SERVICE SOLENOID VALVE', 'UNIT', '', '10SS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1404, '10SS005- SERVICE MESIN SAMBUNG 4 KVA 220 V', 'UNIT', '', '10SS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1405, '10SS006- SERVICE SLIP RING 125 HP/380 V', 'UNIT', '', '10SS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1406, '10SS007- SEWA FORKLIP', 'UNIT', '', '10SS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1407, '10SSBP1- SERVICE SOKBLEKER & PER', 'UNIT', '', '10SSBP1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1408, '10SSC01- SERVICE SERVER', 'UNIT', '', '10SSC01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1409, '10SSM01- SERVICE SOKBLEKER ', 'UNIT', '', '10SSM01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1410, '10SSM11- SERVICE SEPEDA MOTOR', 'UNIT', '', '10SSM11', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1411, '10ST001- SERVICE TELEPHONE', 'UNIT', '', '10ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1412, '10ST002- SERVICE TRAVO SLIDAK 3 PH/380 V', 'UNIT', '', '10ST002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1413, '10ST003- SERVICE TRAVO SLIDAK 10 KVA/380 V', 'UNIT', '', '10ST003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1414, '10ST004- SERVICE TRAVO MESIN SAMBUNG 20 KVA', 'UNIT', '', '10ST004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1415, '10ST005- SERVICE TRAVO 2500 KVA', 'UNIT', '', '10ST005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1416, '10ST006- SERVICE TRAVO SLIDAK 1A/220V', 'UNIT', '', '10ST006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1417, '10ST007- SERVICE TIMBANGAN ', 'UNIT', '', '10ST007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1418, '10ST008- SERVICE TRAVO 2500 KVA', 'UNIT', '', '10ST008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1419, '10ST009- SERVICE TEMPERATUR CONTROL', 'UNIT', '', '10ST009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1420, '10ST010- SERVICE TRAVO SLIDAK 1 KVA/380', 'BUAH', '', '10ST010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1421, '10ST011- SERVIC ETRAVO 500 W 380V/220V', 'UNIT', '', '10ST011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1422, '10ST012- SERVICE TRAVO 2500 KVA + CUBICLE INCOMING', 'UNIT', '', '10ST012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1423, '10ST013- SERVICE TRAVO CHARGER ACCU 220V', 'UNIT', '', '10ST013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1424, '10ST014- SERVICE 3 PHASE 380/220 V/15 KVA', 'UNIT', '', '10ST014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1425, '10ST015- SERVICE TRAVO 3 PHASE 380/220 V/15 KV A', 'UNIT', '', '10ST015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1426, '10ST016- SERVICE TRAVO MESIN SAMBUNG 10 KVA/380 V', 'UNIT', '', '10ST016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1427, '10ST017- SERVICE TRANMISI FORKLIP', 'UNIT', '', '10ST017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1428, '10ST018- SERVICE TRAVO 2500 KVA & CUBICLE PLN', 'UNIT', '', '10ST018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1429, '10ST019- SERVICE TRAVO SLIDAK 10 KVA 3 PHASE/380V', 'UNIT', '', '10ST019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1430, '10ST020- SERVICE TRAVO SLIDAK 5 KVA/220 V', 'UNIT', '', '10ST020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1431, '10STK01- SERVICE TIMBANGAN + KALIBRASI', 'UNIT', '', '10STK01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1432, '10SU001- SERVICE UPS', 'UNIT', '', '10SU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1433, '10SW001- SERVICE WHITE BOARD KX-B401', 'UNIT', '', '10SW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1434, '10SWR01- SERVICE WHERSTANT ROLLING', 'UNIT', '', '10SWR01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1435, '10TK001- TERA KALIBRASI TIMBANGAN ', 'SET', '', '10TK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1436, '10TK002- TERA + KALIBRASI METERAN AIR 1\"', 'UNIT', '', '10TK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1437, '10TK003- TERA + KALIBRASI METERAN AIR 11/2\"', 'UNIT', '', '10TK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1438, '10TK004- TERA + KALIBRASI FLOW METER AIR', 'UNIT', '', '10TK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1439, '10TO001- TEST OXYGEN CONTENT', 'BUAH', '', '10TO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1440, '11BP001- BEND PLASTIK 5/8\"', 'ROLL', '', '11BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1441, '11BP002- BOBIN PLASTIK 4\"', 'PCS', '', '11BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1442, '11KG001- KARUNG GONI BEKAS ', 'BUAH', '', '11KG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1443, '11KJ001- KARUNG JUMBO', 'BUAH', '', '11KJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1444, '11KP001- KANTONG PLASTIC UK-2 KG', 'KG', '', '11KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1445, '11KP002- KARUNG PLASTIC (BEKAS) UK-25 KG', 'LBR', '', '11KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1446, '11KS001- KLEM SEGEL 5/8', 'KG', '', '11KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1447, '11KW001- KARTON WARNA', 'LBR', '', '11KW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1448, '11LL001- LABEL', '', '', '11LL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1449, '11LL002- LABEL YUPO UK. 90 X 60 MM ', 'LBR', '', '11LL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1450, '11PK001- PACKING KARTON 1 MM TBA', 'LBR', '', '11PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1451, '11PK002- PACKING KARTON 2 MM TBA', 'LBR', '', '11PK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1452, '11PK003- PETI KARTON UK 395*265*130 MM', 'SET', '', '11PK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1453, '11PK004- PETI KARTON UK 450*265', 'SET', '', '11PK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1454, '11PL001- PLASTIC FILM 50 CM', 'ROLL', '', '11PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1455, '11SB001- STECKER BCW BESAR ', 'LBR', '', '11SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1456, '11SC001- STICKER BCW KECIL', 'LBR', '', '11SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1457, '11SP001- SENG PLAT ALUMINIUM 0,25 MM', 'MTR', '', '11SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1458, '11ST001- STRAPPING BEND MD 15MM BMS', 'ROLL', '', '11ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1459, '11TR001- TALI RAPIAH', 'ROLL', '', '11TR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1460, '12AS003- AS STEANLES 22 MM X 6 MTR', 'BTG', '', '12AS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1461, '12BB002- BESI BETON 12 MM', 'BTG', '', '12BB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1462, '12BB003- BESI BETON 8 MM', 'BTG', '', '12BB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1463, '12BB004- BESI BETON 10 MM', 'BTG', '', '12BB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1464, '12BP001- BESI PLAT STRIP 5 MM X 25', 'BTG', '', '12BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1465, '12BP002- BESI PLAT STRIP 3 MM X 25', 'BTG', '', '12BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1466, '12BU001- BESI ULIR 30 mm X 6 MTR', 'BTG', '', '12BU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1467, '12DA001- DRIP ANGKA ( BESAR ) 12\"', 'SET', '', '12DA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1468, '12DH001- DAHRIM', 'BUAH', '', '12DH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1469, '12EE001- ELECTRIC ENGRAVER 220 VOLT', 'BUAH', '', '12EE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1470, '12FS001- FLINGKUT SEIX', 'KLG', '', '12FS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1471, '12GK001- GUNTING KUPU-KUPU ', 'BUAH', '', '12GK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1472, '12GK002- GERGAJI KAYU ( POTONG )', 'BUAH', '', '12GK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1473, '12GL001- GERGAJI LISTRIK', 'UNIT', '', '12GL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1474, '12GM001- GUNTING MCC 600', 'BUAH', '', '12GM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1475, '12GR001- GEAR ROLL HOIST', 'SET', '', '12GR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1476, '12GT001- GANTUNGAN TALANG 4\"', 'BUAH', '', '12GT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1477, '12HB001- HEATER BOILER', 'BUAH', '', '12HB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1478, '12IT001- INSULATION TESTER(MEGGER) SANWA DM1008', 'UNIT', '', '12IT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1479, '12KM001- KAMPAK', 'BUAH', '', '12KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1480, '12KO001- KOTAK OBAT P & K', 'BUAH', '', '12KO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1481, '12KP002- KARET PEL + GAGANG', 'BUAH', '', '12KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1482, '12KR001- KUNCI RING PAS UK-33', 'BUAH', '', '12KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1483, '12KS001- KORAL SPLIT ', 'TRUCK', '', '12KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1484, '12LL001- LAMPU LALIN', 'BUAH', '', '12LL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1485, '12LU001- LINNGIS ULIR', 'BUAH', '', '12LU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1486, '12MS001- MESIN SERUT KAYU ( MAKITA )', 'UNIT', '', '12MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1487, '12MT001- METERAN 7,5 METER ', 'BUAH', '', '12MT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1488, '12ND001- NEW DIGILANCE STD TYPE : S CPU BOARD', 'UNIT', '', '12ND001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1489, '12PH001- PIPA HITAM 1 1/4\" X 2,5 MM', 'BTG', '', '12PH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1490, '12PL001- PALU UK. 1/2 KG', 'BUAH', '', '12PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1491, '12PS001- PLAT STRIP 5 MM X 2,5 CM X 6 MTR', 'BTG', '', '12PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1492, '12PS002- PLAT STRIP 3 MM X 2,5 CM X 6 MTR', 'BTG', '', '12PS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1493, '12RK001- RANTAI KAPAL 10 MM', 'METER', '', '12RK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1494, '12RK002- ROLL KAWAT MTK PIONEER UK. 60 X 17 MM', 'BUAH', '', '12RK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1495, '12SB001- SEKOP BESI', 'BUAH', '', '12SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1496, '12SB003- SARUNG BORGOL', 'BUAH', '', '12SB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1497, '12SH001- SAPU HIJUK', 'BUAH', '', '12SH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1498, '12TV001- TRAVO 380 V/240 V 0,5 A', 'BUAH', '', '12TV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1499, '13AC001- AMPLOP COKLAT', 'PAK', '', '13AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1500, '13AC003- AMPLOP COKLAT UK. 1/2 FOLIO', 'PAK', '', '13AC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1501, '13AE001- AERON AE11 3 AWC', 'UNIT', '', '13AE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1502, '13AE002- AERON - AC11 3AWB', 'UNIT', '', '13AE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1503, '13AJ001- AMPLOP PUTIH BESAR \" JAYA \"', 'DUS', '', '13AJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1504, '13AJ002- AMPLOP PUTIH KECIL \" JAYA \"', 'DUS', '', '13AJ002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1505, '13AP001- ACCO PLASTIC', 'PAK', '', '13AP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1506, '13AP002- AMPLOP PUTIH BESAR', 'DUS', '', '13AP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1507, '13AP003- AMPLOP PUTIH KECIL', 'DUS', '', '13AP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1508, '13AR001- AMPLOP ROYA', 'DUS', '', '13AR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1509, '13AT001- ANTENA HT GP2000', 'BUAH', '', '13AT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1510, '13BA001- BUKU AGENDA', 'PAK', '', '13BA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1511, '13BB001- BUKU BANK ', 'BUAH', '', '13BB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1512, '13BB002- BUKU BUKTI KAS/BANK', 'BUAH', '', '13BB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1513, '13BC001- BINDER COMPUTER', 'BUAH', '', '13BC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1514, '13BC002- BINDER CLIP 107', 'GROSS', '', '13BC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1515, '13BC003- BINDER CLIP 260', 'PAK', '', '13BC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1516, '13BC004- BINDER CLIP 105', 'PAK', '', '13BC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1517, '13BC005- BINDER CLIP KENKO 111', 'GROSS', '', '13BC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1518, '13BC006- COMPUTER BINDER IMAX NO. 1301', 'DUS', '', '13BC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1519, '13BE001- BUKU EXPEDISI', 'PAK', '', '13BE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1520, '13BF001- BUSINESS  FILE ( MAP PALSTIC)', 'PAK', '', '13BF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1521, '13BG001- BORGOL', 'BUAH', '', '13BG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1522, '13BI001- BOX ISOLASIPE', 'BUAH', '', '13BI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1523, '13BK001- BUKU KAS KWARTO', 'BUAH', '', '13BK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1524, '13BK002- BUKU KAS 3 KOLOM FOLIO', 'BUAH', '', '13BK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1525, '13BK003- BUKU KAS 3 KOLOM QUARTO', 'BUAH', '', '13BK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1526, '13BK004- BUKU KAS 2 KOLOM QUARTO', 'BUAH', '', '13BK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1527, '13BK005- BUKU KAS 2 KOLOM FOLIO', 'BUAH', '', '13BK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1528, '13BL001- BUKU LAPORAN PERMINTAAN PEMBELIAN (LPB)', 'BUAH', '', '13BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1529, '13BP001- BUKU PERMINTAAN PEMBELIAN ( BUKU PP )', 'BUAH', '', '13BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1530, '13BS001- BAD SECURITY', 'SET', '', '13BS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1531, '13BS002- BAJU SERAGAM KAOS TANGAN PENDEK', 'LBR', '', '13BS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1532, '13BS003- BAJU SERAGAM KAOS TANGAN PANJANG', 'LBR', '', '13BS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1533, '13BS004- BAJU SERAGAM KEPALA BAGIAN', 'LBR', '', '13BS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1534, '13BS005- BAK STEMPEL', 'BUAH', '', '13BS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1535, '13BS006- BAJU SERAGAM', 'LBR', '', '13BS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1536, '13BT001- BUKU TULIS BO', 'PAK', '', '13BT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1537, '13BT002- BUKU TULIS FOLIO 100 LEMBAR', 'PAK', '', '13BT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1538, '13BT003- BATTERAY HT GP2000', 'BUAH', '', '13BT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1539, '13BT004- BANTAL', 'BUAH', '', '13BT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1540, '13BT005- BUKU TANDA TERIMA SEMENTARA', 'BUAH', '', '13BT005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1541, '13BT006- BUKU TULIS EKSPEDISI BO', 'BUAH', '', '13BT006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1542, '13BT007- BUKU TULIS FOLIO BO', 'BUAH', '', '13BT007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1543, '13BT008- BUKU TULIS KWARTO BO', 'BUAH', '', '13BT008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1544, '13BY001- BAYGON', 'BOTOL', '', '13BY001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1545, '13CC001- CARBON CAILING', 'PAK', '', '13CC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1546, '13CC002- CALCULATOR STRUK MERK CASIO', 'UNIT', '', '13CC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1547, '13CC003- CERMIN', 'UNIT', '', '13CC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1548, '13CC004- CALCULATOR CITIZEN SDC - 868 L', 'BUAH', '', '13CC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1549, '13CCD01- CLOUDCITI SYSTEM ( IAAS PACKAGE )', 'BULAN', '', '13CCD01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1550, '13CF001- CONTINIOUS FORM 91/2*11 PLY', 'DUS', '', '13CF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1551, '13CF002- CONTINIOUS FORM 91/2*11/2 PLY', 'DUS', '', '13CF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1552, '13CF003- CONTINUS FORM 9,5 x 11/2 8 PLY', 'DUS', '', '13CF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1553, '13CF004- CONTINUS FORM 9,5 x 11 1 PLY', 'DUS', '', '13CF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1554, '13CF005- CONTINUS FORM 9,5 x 11 2 PLY', 'DUS', '', '13CF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1555, '13CF006- CONTINUS FORM 9,5 x 11/2 2 PLY', 'DUS', '', '13CF006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1556, '13CF007- CONTINUS FORM 9,5 x 11 4 PLY', 'DUS', '', '13CF007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1557, '13CF008- CONTINUS FORM 9,5 x 11/2 4 PLY', 'DUS', '', '13CF008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1558, '13CF009- CONTINUS FORM 147/8 x 11 1 PLY', 'DUS', '', '13CF009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1559, '13CF011- CONTINUS FORM 91/2 *11/2 3 PLY', 'DUS', '', '13CF011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1560, '13CP001- CORRECTION PEN JOYKO', 'LUSIN', '', '13CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1561, '13CU001- CLOW UPPER', 'SET', '', '13CU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1562, '13DB001- DRUM BLADE ', 'UNIT', '', '13DB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1563, '13DB002- DRUM BLADE', 'PSG', '', '13DB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1564, '13DF001- DOBLE FOLIO', 'PAK', '', '13DF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1565, '13DLD01- DOOR LOCK DIGITAL', 'UNIT', '', '13DLD01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1566, '13DP001- DISPENSER', 'BUAH', '', '13DP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1567, '13EL001- EXPOUSE LAMP', 'UNIT', '', '13EL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1568, '13EM001- EMBER', 'BUAH', '', '13EM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1569, '13FD001- FLAST DISK 2 GB', 'BUAH', '', '13FD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1570, '13FD002- FLAST DIST 4 GB', 'BUAH', '', '13FD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1571, '13FP001- FAN PROSESOR', 'UNIT', '', '13FP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1572, '13FR001- FEED ROLL', 'SET', '', '13FR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1573, '13FS001- FORM SSP', 'PAK', '', '13FS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1574, '13GB001- GANTUNGAN BAJU', 'BUAH', '', '13GB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1575, '13GG001- GAYUNG', 'BUAH', '', '13GG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1576, '13GS001- GLUE STICK KENKO', 'BUAH', '', '13GS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1577, '13GS002- GLUE STICK', 'BUAH', '', '13GS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1578, '13GU001- GUNTING', 'BUAH', '', '13GU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1579, '13HD001- HARD DISK 250 G SATA', 'UNIT', '', '13HD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1580, '13HL001- HELM', 'BUAH', '', '13HL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1581, '13HS001- HUB SWITCH', 'UNIT', '', '13HS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1582, '13IC001- ISI CUTTER L 150', 'PAK', '', '13IC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1583, '13ID001- ISOLASI DOUBLE TAPE', 'BUAH', '', '13ID001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1584, '13IL001- ISOLASI COKLAT', 'PACK', '', '13IL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1585, '13IO001- SUPER I/O CARD PCI', 'BUAH', '', '13IO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1586, '13IS001- ISI STEPLES MAX 10', 'PAK', '', '13IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1587, '13JD001- JAM DINDING', 'BUAH', '', '13JD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1588, '13JH001- JAS HUJAN ', 'PSG', '', '13JH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1589, '13KA001- KARTU ABSEN', 'PAK', '', '13KA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1590, '13KB002- KASUR BUSA', 'BUAH', '', '13KB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1591, '13KB003- KERTAS BURAM', 'PAK', '', '13KB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1592, '13KC001- KACA', 'BUAH', '', '13KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1593, '13KD001- KABEL DATA', 'ROLL', '', '13KD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1594, '13KE001- KEMOCENG', 'BUAH', '', '13KE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1595, '13KF001- KERTAS FAX 210*30', 'ROLL', '', '13KF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1596, '13KF002- KERTAS FOTO COPY 70 GR BD', 'RIM', '', '13KF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1597, '13KF003- KERTAS FOTO COPY 70 GR HVS', 'RIM', '', '13KF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1598, '13KJ001- KACA JENDELA UK. 101,5 X 91,5', 'LBR', '', '13KJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1599, '13KK001- KESET KAKI', 'BUAH', '', '13KK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1600, '13KKU01- INSTALASI KABEL FAX ( KABEL KU )', 'METER', '', '13KKU01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1601, '13KL001- KERTAS LATMUS', 'BUAH', '', '13KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1602, '13KL002- KABEL LINE BELDEN CAT5E', 'ROLL', '', '13KL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1603, '13KLS01- KULKAS', 'UNIT', '', '13KLS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1604, '13KM001- KAMPER', 'BKS', '', '13KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1605, '13KM002- KABEL MONITOR', 'ROLL', '', '13KM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1606, '13KN001- KARTU NAMA BW 2/0 ( POLY + SABLON )', 'BOX', '', '13KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1607, '13KN002- KARTU NAMA', 'BOX', '', '13KN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1608, '13KP001- KUNCI PINTU', 'SET', '', '13KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1609, '13KP002- KUNCI PAILING KABINET', 'SET', '', '13KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1610, '13KP003- KOPEL', 'BUAH', '', '13KP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1611, '13KP006- KACA POLOS UK. 127,5 X 60', 'LMBR', '', '13KP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1612, '13KP007- KACA POLOS UK. 102,5 X 101,5', 'LMBR', '', '13KP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1613, '13KP008- KARTU PENGENAL KARYAWAN', 'BUAH', '', '13KP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1614, '13KQ001- KERTAS QUARTO 70g', 'RIM', '', '13KQ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1615, '13KS001- KERANJANG SAMPAH ', 'BUAH', '', '13KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1616, '13KS002- KOP SURAT', 'RIM', '', '13KS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1617, '13KS003- KERTAS STRUK UK-48 X 58', 'PAK', '', '13KS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1618, '13KS004- KARBON SAILING', 'PAK', '', '13KS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1619, '13KS005- KERTAS SHEET DAITO ', 'PAK', '', '13KS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1620, '13LK001- LEM KERTAS', 'ROLL', '', '13LK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1621, '13LS001- LEM STICK', 'BUAH', '', '13LS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1622, '13LT001- LAP TANGAN', 'BUAH', '', '13LT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1623, '13MA001- MATERAI 6000 & 3000', 'LBR', '', '13MA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1624, '13MB001- MAP BIASA ', 'PAK', '', '13MB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1625, '13MD001- MODEM', 'UNIT', '', '13MD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1626, '13MF001- MESIN FAX', 'UNIT', '', '13MF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1627, '13MN001- MONITOR COMPUTER', 'UNIT', '', '13MN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1628, '13MP001- MAP PLASTIC DAICHI', 'LUSIN', '', '13MP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1629, '13MR001- MAGNET ROLL CANON NP 6035', 'SET', '', '13MR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1630, '13OD001- ODNER BINDEK', 'LUSIN', '', '13OD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1631, '13OD002- ODNER BINDEX 777 BLACK', 'LUSIN', '', '13OD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1632, '13OW001- ONE WAY CASET ', 'BUAH', '', '13OW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1633, '13PB001- PRINTER BARCODE + IT SUPPORT TSC 247', 'UNIT', '', '13PB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1634, '13PB002- PENGGARIS BUTTERFLY 30 CM', 'LUSIN', '', '13PB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1635, '13PC001- PAPER CLIP', 'PAK', '', '13PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1636, '13PC002- PITA CALCULATOR CASIO', 'BUAH', '', '13PC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1637, '13PF001- PULPEN FASTER C 600', 'LUSIN', '', '13PF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1638, '13PF002- PULPEN FASTER C 6', 'LUSIN', '', '13PF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1639, '13PH001- PENGHAPUS ', 'BUAH', '', '13PH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1640, '13PI001- KERTAS POST IT 653 NEON', 'BUAH', '', '13PI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1641, '13PI002- KERTAS 3M POST IT 654-5PN', 'BUAH', '', '13PI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1642, '13PM002- PITA MESIN TIK', 'BUAH', '', '13PM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1643, '13PM003- PITA MESIN TIK ELEKTRIK', 'BUAH', '', '13PM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1644, '13PM004- PITA MESIN ABSEN AMANO', 'BUAH', '', '13PM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1645, '13PP001- PITA PRINTER LQ 2180 + BOX', 'BUAH', '', '13PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1646, '13PP002- PITA PRINTER LX 300', 'BUAH', '', '13PP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1647, '13PP003- PITA PRINTER', 'BUAH', '', '13PP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1648, '13PP004- PITA PRINTER TIMBANGAN ( FULLMARK )', 'BUAH', '', '13PP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1649, '13PP005- PITA PRINTER LQ 2180', 'BUAH', '', '13PP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1650, '13PR001- PRINTER EPSON LX 300', 'BUAH', '', '13PR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1651, '13PR002- PRINTER EPSON LX 300+II', 'UNIT', '', '13PR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1652, '13PS001- PULPEN STANDARD AE-7', 'LUSIN', '', '13PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1653, '13PS002- PENSIL 2B STEADLER', 'LUSIN', '', '13PS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1654, '13PS003- PIN SECURITY', 'BUAH', '', '13PS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1655, '13PS004- POWER SUPLLY', 'BUAH', '', '13PS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1656, '13PS005- PULPEN STANDARD TECNO DELTA TIP 0.38', 'LUSIN', '', '13PS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1657, '13PT001- PITA TIMBANGAN EPSON ERC 05', 'BUAH', '', '13PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1658, '13PU001- PUNCH JOYKO NO. 30 XL', 'BUAH', '', '13PU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1659, '13PY001- PAYUNG', 'BUAH', '', '13PY001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1660, '13PZ001- PRINTER ZEBRA', 'BUAH', '', '13PZ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1661, '13RB001- RIBBON', 'ROLL', '', '13RB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1662, '13RB002- RIBBON UK. 11 X 300 MM', 'ROLL', '', '13RB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1663, '13RB003- RIBBON UK. 100 MM X 300 M RESIN', 'ROLL', '', '13RB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1664, '13RC001- RIBBON CARTRIDGE EPSON LX 300+', 'BUAH', '', '13RC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1665, '13RC002- RIBBON CARTRIDGE EPSON LQ 2180 / 2190', 'BUAH', '', '13RC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1666, '13RC003- RADIO COMPO', 'UNIT', '', '13RC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1667, '13RM001- RIBBON MAS ( SENG PRINTER )', 'BUAH', '', '13RM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1668, '13RM002- REMOVER MAX', 'BUAH', '', '13RM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1669, '13SA001- SPIDOL ART LINE 100', 'LUSIN', '', '13SA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1670, '13SA002- SPIDOL ARTLINE 70 HITAM', 'LUSIN', '', '13SA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1671, '13SA003- SPIDOL ARTLINE 70 BIRU', 'LUSIN', '', '13SA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1672, '13SA004- SALON AKTIF ', 'SET', '', '13SA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1673, '13SB001- SABUK', 'BUAH', '', '13SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1674, '13SB002- SERAGAM BIRU-BIRU', 'STEL', '', '13SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1675, '13SB004- SARUNG BANTAL', 'BUAH', '', '13SB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1676, '13SB005- SPIDOL BOARD MARKER', 'BUAH', '', '13SB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1677, '13SB006- KAOS OBLONG', 'PCS', '', '13SB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1678, '13SC001- SERAGAM CELANA PANJANG PEREMPUAN', 'BUAH', '', '13SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1679, '13SC002- SERAGAM CELANA PANJANG LAKI-LAKI', 'BUAH', '', '13SC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1680, '13SG001- SANGKUR', 'BUAH', '', '13SG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1681, '13SG002- SEAGULL 350', 'PAK', '', '13SG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1682, '13SK001- SERAGAM KEMEJA PEREMPUAN', 'BUAH', '', '13SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1683, '13SK002- SERAGAM KEMEJA LAKI-LAKI', 'BUAH', '', '13SK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1684, '13SK003- SPIDOL KECIL PW-1A', 'LUSIN', '', '13SK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1685, '13SM001- SERVER + MONITOR', 'UNIT', '', '13SM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1686, '13SM002- STEEL MIDSOLE', 'PSG', '', '13SM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1687, '13SM003- STOP MAP KABITA', 'DUS', '', '13SM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1688, '13SM004- STOP MAP', 'DUS', '', '13SM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1689, '13SMF01- SERVICE MESIN FAX', 'UNIT', '', '13SMF01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1690, '13SP001- SERAGAM PUTIH BIRU', 'STEL', '', '13SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1691, '13SP002- SPLITTER', 'BUAH', '', '13SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1692, '13SR001- SENTER', 'BUAH', '', '13SR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1693, '13SS001- SAFETY SHOES', 'PSG', '', '13SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1694, '13SS002- SEPATU SERAGAM PDH', 'PSG', '', '13SS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1695, '13SS003- SEPATU SERAGAM PDL', 'PSG', '', '13SS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1696, '13SS004- SPIDOL SNOWMAN MARKER KECIL', 'BUAH', '', '13SS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1697, '13ST001- STEPKESS 30*1 HD 10', 'BUAH', '', '13ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1698, '13ST003- STABILLO', 'BUAH', '', '13ST003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1699, '13ST004- TINTA STEMPEL ART', 'BUAH', '', '13ST004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1700, '13ST005- TINTA STEMPEL OTOMATIS', 'BUAH', '', '13ST005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1701, '13STL01- STEMPEL', 'BUAH', '', '13STL01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1702, '13TC001- TRIGONAL CLIPS JOYKO NO. 3', 'DUS', '', '13TC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1703, '13TD001- TINTA DAITO ', 'TUBE', '', '13TD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1704, '13TD002- TAPE DISPENSER', 'BUAH', '', '13TD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1705, '13TF001- TONER FOTO COPY', 'BUAH', '', '13TF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1706, '13TI001- TINTA SPIDOL', 'LUSIN', '', '13TI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1707, '13TI002- TIPEX JOYKO ( MDL PULPEN )', 'LUSIN', '', '13TI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1708, '13TI003- TIPEX KUAS', 'BUAH', '', '13TI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1709, '13TK001- TALI KUR & PLUIT', 'BUAH', '', '13TK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1710, '13TL001- TINTA LION', 'BTL', '', '13TL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1711, '13TM001- TINTA MESIN TIK', 'BUAH', '', '13TM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1712, '13TP001- TEMPAT SABUN', 'BUAH', '', '13TP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1713, '13TS001- TISSUE', 'DUS', '', '13TS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1714, '13TS002- TINTA STEMPEL', 'BUAH', '', '13TS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1715, '13TS011- TAS RANSEL', 'BUAH', '', '13TS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1716, '13TT001- TEMPAT TISSUE', 'BUAH', '', '13TT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1717, '13TT002- TEMPAT SAMPAH TUTU', 'BUAH', '', '13TT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1718, '13TV001- TV POLYTRON 20\"', 'UNIT', '', '13TV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1719, '13WC001- SIKAT WC', 'BUAH', '', '13WC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1720, '13WS001- WIRELESS', 'BUAH', '', '13WS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1721, '14AC001- AIR ACCU @ 1 LITER', 'BOTOL', '', '14AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1722, '14AC002- ACCU 65 A / 12 V ', 'BUAH', '', '14AC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1723, '14AC003- AIR CLEANER/ELEMENT', 'BUAH', '', '14AC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1724, '14AC004- ACCU 12 V/200 A', 'UNIT', '', '14AC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1725, '14AF001- AIR FILTER J 85-1027-01', 'BUAH', '', '14AF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1726, '14AF002- AIR FILTERMB 120389', 'BUAH', '', '14AF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1727, '14AF003- AIR FILTER MD T 60 P', 'BUAH', '', '14AF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1728, '14AF004- AIR FILTER ( FILTER UDARA )', 'BUAH', '', '14AF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1729, '14AF005- AIR FILTER ME 017246', 'BUAH', '', '14AF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1730, '14AR001- AIR RADIATOR @ 5 LITER', 'GALON', '', '14AR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1731, '14BD001- BAN DALAM 600*9', 'BUAH', '', '14BD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1732, '14BD002- BAN DALAM 750*15', 'BUAH', '', '14BD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1733, '14BD003- BAN DALAM 700*15', 'BUAH', '', '14BD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1734, '14BD005- BAN DALAM 750*16', 'BUAH', '', '14BD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1735, '14BD006- BAN DALAM 700 x 14', 'BUAH', '', '14BD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1736, '14BF001- BAN FLAP 700*15', 'BUAH', '', '14BF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1737, '14BF002- BOX FILTER UDARA', 'SET', '', '14BF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1738, '14BF004- BAN FLAP 750*16', 'BUAH', '', '14BF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1739, '14BJ001- BALL JOINT', 'BUAH', '', '14BJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1740, '14BL001- BAN LUAR UK. 750*15 12 PLY', 'BUAH', '', '14BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1741, '14BL002- BAN LUAR 700*15 12 PLY', 'BUAH', '', '14BL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1742, '14BL003- BAN LUAR TUBLES 185 X 70 R14 BS', 'BUAH', '', '14BL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1743, '14BL004- BAN LUAR 750 x 16 14 PLY', 'BUAH', '', '14BL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1744, '14BL005- BAN LUAR TUBLES 205/60 R 16', 'BUAH', '', '14BL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1745, '14BL006- BAN LUAR ', 'BUAH', '', '14BL006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1746, '14BL007- BAN LUAR TUBLES 195-70 R 14', 'BUAH', '', '14BL007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1747, '14BL008- BAN LUAR 700 x 14 8 PLY', 'BUAH', '', '14BL008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1748, '14BL009- BAN LUAR TUBLES 205/65 R15 BS B390', 'BUAH', '', '14BL009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1749, '14BL010- BAN LUAR TUBLES 215/60 R16', 'BUAH', '', '14BL010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1750, '14BL011- BAN LUAR TUBLES 90/90-14', 'BUAH', '', '14BL011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1751, '14BL012- BAN LUAR TUBLES 100/80-14', 'BUAH', '', '14BL012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1752, '14BM001- BEMPER', 'BUAH', '', '14BM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1753, '14BP001- BAUT PAYUNG 3/8 X 11/4\"', 'BUAH', '', '14BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1754, '14BP002- BAUT PAYUNG 3/8 X 21/2\"', 'BUAH', '', '14BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1755, '14BR001- BEARING P/N 42825-31960-71', 'BUAH', '', '14BR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1756, '14BR002- BAUT RODA BELAKANG ( DOUBLE )', 'BUAH', '', '14BR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1757, '14BR003- BEARING RODA BELAKANG 30211', 'BUAH', '', '14BR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1758, '14BR004- BEARING RODA BELAKANG 30212', 'BUAH', '', '14BR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1759, '14BR007- BEARING RODA 30207  JR', 'BUAH', '', '14BR007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1760, '14BR008- BAUT RODA DEPAN', 'BUAH', '', '14BR008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1761, '14BT003- BAN TUBLES 205 GR 15 PLY', 'BUAH', '', '14BT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1762, '14BT004- BUSA TIPIS ', 'LBR', '', '14BT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1763, '14CK001- CALIPER KIT REM', 'SET', '', '14CK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1764, '14CO001- COMPON', 'KLG', '', '14CO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1765, '14CP001- CAT PERNIS', 'KLG', '', '14CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1766, '14DB001- DONGKRAK BOTOL CAP 10 TON', 'BUAH', '', '14DB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1767, '14DB002- DONGKRAK BOTOL CAPS 20 TON', 'UNIT', '', '14DB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1768, '14DB003- DONGKRAK BUAYA CAPS 3 TON', 'UNIT', '', '14DB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1769, '14FB002- FUSE BATU 160 AMPER', 'BUAH', '', '14FB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1770, '14FB003- FUSE BATU 40 AMPER', 'BUAH', '', '14FB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1771, '14FF001- FULL FILTER ( BAWAH ) ME 971553', 'BUAH', '', '14FF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1772, '14FF002- FULL FILTER ( ATAS ) ME 006066', 'BUAH ', '', '14FF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1773, '14FF003- FULL FILTER 23303-76002-71', 'BUAH', '', '14FF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1774, '14FF004- FULL FILTER ( FILTER SOLAR )', 'BUAH', '', '14FF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1775, '14FK001- FUSE KACA 10 A', 'BUAH', '', '14FK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1776, '14FK002- FUSE KACA 2 AMPER ( 60*30 MM )', 'BUAH', '', '14FK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1777, '14GA001- GRILL AC', 'BUAH', '', '14GA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1778, '14GB001- GEMUK BEARING ', 'TUBE', '', '14GB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1779, '14GK001- GENDUL KNALPOT', 'BUAH', '', '14GK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1780, '14IP002- ISI PREON', 'UNIT', '', '14IP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1781, '14IS001- ISOLASI', 'ROLL', '', '14IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1782, '14IU001- ISI ULANG PARFUM MOBIL', 'BTL', '', '14IU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1783, '14JU001- JOINT UNIVERSAL', 'BUAH', '', '14JU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1784, '14KA003- KARET ABU', 'BUAH', '', '14KA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1785, '14KD001- KUNCI DUPLIKAT', 'BUAH', '', '14KD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1786, '14KI001- KIT', 'KLG', '', '14KI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1787, '14KL001- KARPET LUMPUR', 'SET', '', '14KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1788, '14KM001- KIT MASTER COUPLING', 'BUAH', '', '14KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1789, '14KM002- KARPET MOBIL', 'SET', '', '14KM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1790, '14KN001- KNALPOT', 'SET', '', '14KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1791, '14KP002- KUNCI PINTU MOBIL ', 'SET', '', '14KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1792, '14KR001- KANPAS REM ', 'SET', '', '14KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1793, '14KR002- KARET REM', 'BUAH', '', '14KR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1794, '14KR003- KUNCI RING PAS 8 S/D 24 MM', 'SET', '', '14KR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1795, '14KS001- KACA SPION ', 'SET', '', '14KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1796, '14KS004- KLAKSON 24 VOLT ( DOUBLE )', 'SET', '', '14KS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1797, '14KS005- KARET SHOCK BLEKER', 'BUAH', '', '14KS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1798, '14KS006- KARET STOPER', 'BUAH', '', '14KS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1799, '14LB001- LAMPU BULAT 24 V', 'BUAH', '', '14LB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1800, '14LB002- LAMPU BEMPER', 'BUAH', '', '14LB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1801, '14LH001- LAMPU HOLOGEN 500 WATT', 'BUAH', '', '14LH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1802, '14LK001- LAP KANEBO', 'BUAH', '', '14LK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1803, '14LP001- LEM POWER GLUE', 'TUBE', '', '14LP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1804, '14LR001- LAMPU REM BELAKANG', 'SET', '', '14LR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1805, '14LS001- LAMPU SEIN ', 'BUAH', '', '14LS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1806, '14MC001- MASTER COUPLING ( BAWAH )', 'BUAH', '', '14MC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1807, '14MC002- MASTER CYLINDER RODA BELAKANG', 'BUAH', '', '14MC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1808, '14MR001- MINYAK REM', 'BOTOL', '', '14MR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1809, '14MR002- MASTER REM DEPAN', 'BUAH', '', '14MR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1810, '14MR003- MUR 3/8\"', 'BUAH', '', '14MR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1811, '14MR004- MASTER REM DEPAN', 'BUAH', '', '14MR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1812, '14MR005- MASTER REM BELAKANG ( KANAN )', 'SET', '', '14MR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1813, '14OB001- OBAT POLES', 'BTL', '', '14OB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1814, '14OF001- OIL FILTER ME 013307', 'BUAH', '', '14OF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1815, '14OF005- OIL FILTER', 'BUAH', '', '14OF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1816, '14OM003- OLI MESIN', 'GALON', '', '14OM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1817, '14OM004- OLI MESIN SAE 10W', 'LTR', '', '14OM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1818, '14OM005- OLI MESIN SAE 10-30 (TOP 1)', 'KLG', '', '14OM005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1819, '14OP001- OLI POWER STERING ', 'KLG', '', '14OP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1820, '14OS001- OIL SEAL RODA BELAKANG ( DALAM )', 'BUAH', '', '14OS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1821, '14OS002- OIL SEAL RODA BELAKANG ( LUAR )', 'BUAH', '', '14OS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1822, '14OV001- OIL VERSNELING', 'LITER', '', '14OV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1823, '14PA001- PACKING AS', 'BUAH', '', '14PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1824, '14PD001- PER DAUN', '', '', '14PD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1825, '14PD002- PAPAN DAMAR LAUT 3*20*4', 'LBR', '', '14PD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1826, '14PE001- PELUK UK.16 750*66', 'BUAH', '', '14PE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1827, '14PE002- PEWANGI RUANGAN ', 'BTL', '', '14PE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1828, '14PG001- PELG UK. 14', 'BUAH', '', '14PG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1829, '14PK001- PIPA KNALPOT ( SAMBUNGAN DEPAN )', 'BUAH', '', '14PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1830, '14PK002- PER KANPAS REM', 'BUAH', '', '14PK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1831, '14PK003- PAPAN KAMPER 3*20*4', 'LBR', '', '14PK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1832, '14PK004- PAPAN KAMPER UK. 30MM X 20CM X 4MTR', 'LBR', '', '14PK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1833, '14PO001- POMPA OLI MANUAL', 'BUAH', '', '14PO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1834, '14PP001- PLASTIC PER', '', '', '14PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1835, '14PP002- PLAT PINTU', 'LBR', '', '14PP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1836, '14PP003- PANTEK PLAT COUPLING', 'BUAH', '', '14PP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1837, '14PP004- PANTEK COUPLING', 'UNIT', '', '14PP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1838, '14PR001- PIRINGAN REM', 'BUAH', '', '14PR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1839, '14SB001- SEMIR BAN', 'BTL', '', '14SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1840, '14SB002- SOK BLEKER DEPAN ', 'SET', '', '14SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1841, '14SM001- SHAMPO MOBIL ', 'BTL', '', '14SM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1842, '14SR001- SEAL RODA', 'BUAH', '', '14SR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1843, '14SR002- SELANG RADIATOR', 'BUAH', '', '14SR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1844, '14TM001- TANGKI MOTOR', 'UNIT', '', '14TM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1845, '14TP001- TUSUKAN PER', '', '', '14TP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1846, '14TR001- TUTUP RADIATOR', 'BUAH', '', '14TR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1847, '14TS001- TEIROD STIR', 'BUAH', '', '14TS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1848, '14TS002- TANGKI SOLAR', 'UNIT', '', '14TS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1849, '14VA001- VANBELT AC', 'BUAH', '', '14VA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1850, '14VK001- VANBLET KIPAS', 'BUAH', '', '14VK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1851, '14VL001- VELAK UK. 15', 'BUAH', '', '14VL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1852, '14VP001- VANBELT PERSENELING', 'BUAH', '', '14VP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1853, '15001ST- SARUNG TANGAN', 'LUSIN', '', '15001ST', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1854, '15KL001- KAIN LAP', 'KG', '', '15KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1855, '15MS001- MASKER', 'LUSIN', '', '15MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1856, '15ST002- SARUNG TANGAN KULIT', 'PSG', '', '15ST002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1857, '16AC001- ACRYLIC 5 MM 4\" X 8\"', 'LBR', '', '16AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1858, '16AG001- ASBES GELOMBANG UK-240', 'LBR', '', '16AG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1859, '16AG002- ASBES GELOMBANG UK-180', 'LBR', '', '16AG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1860, '16AG004- AQUAPROOF', 'GLN', '', '16AG004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1861, '16AK001- AMPLAS KASAR', 'MTR', '', '16AK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1862, '16AP001- AQUAPROF @ 1 KG', 'KLG', '', '16AP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1863, '16BB002- BESI BETON 10 MM', 'BTG', '', '16BB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1864, '16BB003- BESI BETON 5 MM', 'BTG', '', '16BB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1865, '16BB004- BESI BETON 19 MM', 'BTG', '', '16BB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1866, '16BC003- BESI CANAL CNP 125X50X20X3.2X6MTR', 'BTG', '', '16BC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1867, '16BC004- BESI CANAL C 75*3.2*6', 'BTG', '', '16BC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1868, '16BC005- BESI CANAL C 60 X 30 X 10 X 2,3 X 6 MTR', 'BTG', '', '16BC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1869, '16BC006- BESI CANAL U UK-120x55x6 MM', 'BTG', '', '16BC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1870, '16BH003- BATA BEHEL (PUTIH)', 'BUAH', '', '16BH003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1871, '16BH004- BESI H BEAM 200 X 200 X 8 X 6 MTR', 'BTG', '', '16BH004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1872, '16BI002- BESI SIKU 60 X 60 X 6 X 6 MTR', 'BTG', '', '16BI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1873, '16BI003- BESI SIKU 50 X 50 X 5 X 6 MTR', 'BTG', '', '16BI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1874, '16BK003- BATU KALI', 'TRUCK', '', '16BK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1875, '16BM001- BETON MIX ( PENGERAS COR )', 'KLG', '', '16BM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1876, '16BM002- BATA MERAH', 'BUAH', '', '16BM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1877, '16BM003- BAK MANDI FIBER', 'BUAH', '', '16BM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1878, '16BP001- BESI PLAT 4 MM', 'LBR', '', '16BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1879, '16BP002- BESI PLAT BORDES 4 MM', 'LBR', '', '16BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1880, '16BP003- BESI PLAT MS 8 mm 4 X 8', 'LBR', '', '16BP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1881, '16BP004- BESI PLAT MS 2 mm 4 X 8', 'LBR', '', '16BP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1882, '16BP005- BESI PLAT STRIP 8 mm 50 X 2', 'BTG', '', '16BP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1883, '16BP007- BESI PLAT 15 MM 4*8', 'LBR', '', '16BP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1884, '16BP008- BESI PLAT 12 4*8', 'LBR', '', '16BP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1885, '16BP009- BESI PLAT 3MM 4*8', 'LBR', '', '16BP009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1886, '16BS001- BESI SIKU 50 X 50 X 5 X 6', 'BTG', '', '16BS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1887, '16BS002- BESI SIKU 70 X 70 X 7 X 6', 'BTG', '', '16BS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1888, '16BS006- BESI SIKU 100*100*6', 'BTG', '', '16BS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1889, '16BS007- BESI SIKU 40 X 40 X 3,2 MM X 6 MTR', 'BTG', '', '16BS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1890, '16BS008- BESI SIKU 40 X 40 X 4 X 6 MTR', 'BTG', '', '16BS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1891, '16BU001- BESI UNP 100 X 50 X 5', 'BTG', '', '16BU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1892, '16BU002- BESI UNP 150 X 75 X 6.5', 'BTG', '', '16BU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1893, '16BW001- BESI WF 150 60*6*8*6MTR', 'BTG', '', '16BW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1894, '16BW002- BESI WF 200*100*5.5*8*12', 'BTG', '', '16BW002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1895, '16BW003- BESI WF 150*75*5*7*12', 'BTG', '', '16BW003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1896, '16BW004- BESI WF 200*100*5*8*6', 'BTG', '', '16BW004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1897, '16BW005- BESI WIRE MESH 8 MM', 'LBR', '', '16BW005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1898, '16BW006- BESI WIRE MESH 6MM', 'LBR', '', '16BW006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1899, '16BW007- BESI WF 150 X 75 X 5 X 7 X 6 MTR', 'BTG', '', '16BW007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1900, '16BW008- BESI WF 200 X 100 X 5,5 X 8 X 6 MTR', 'BTG', '', '16BW008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1901, '16CC001- CAT TEMBOK CATYLAK', 'GALON', '', '16CC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1902, '16CC002- CONCRETE TYPE : K - 400', 'M3', '', '16CC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1903, '16CC003- CONCRETE TYPE : K - 450', 'M3', '', '16CC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1904, '16CC004- CAT TEMBOK CATYLAK @ 25 KG', 'PAIL', '', '16CC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1905, '16CD001- CLOSSED DUDUK', 'SET ', '', '16CD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1906, '16CE001- CAT EPOXY', 'SET', '', '16CE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1907, '16CG001- CAT GLOTEX ( ALUMUNIUN PAINT ) @ 1 KG', 'KLG', '', '16CG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1908, '16CJ005- CILINDER KUNCI', 'BUAH', '', '16CJ005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1909, '16CK001- CAT KANSAI ( ABU-ABU ) @ 1KG', 'KLG', '', '16CK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1910, '16CK002- CAT KANSAI @ 1 KG ( PUTIH ) ', 'KLG', '', '16CK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1911, '16CK003- CAT KANSAI @ 1 KG ( BIRU TUA )', 'KLG', '', '16CK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1912, '16CK004- CAT KANSAI ( KUNING ) @ 1 KG', 'KLG', '', '16CK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1913, '16CM001- CAT MINYAK KANSAI @ 1KG', 'KLG', '', '16CM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1914, '16CM002- COMPOUN', 'ZAK', '', '16CM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1915, '16CM003- CAT METROLITE PUTIH', 'PAIL', '', '16CM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1916, '16CM004- COMPON', 'KG', '', '16CM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1917, '16CP001- CAT PILOX ( PUTIH )', 'KLG', '', '16CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1918, '16CP004- CAT PILOK ( HITAM )', 'KLG', '', '16CP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1919, '16CT001- CAT TEMBOK METROLITE', 'GALON', '', '16CT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1920, '16CT002- CORONG TALANG PVC 3 \"', 'BUAH', '', '16CT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1921, '16CT003- CAT TEMBOK METROLITE', 'PAIL', '', '16CT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1922, '16CT004- CAT TEMBOK VINYLEX (BIRU) NO. 937', 'PAIL', '', '16CT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1923, '16CT005- CAT TEMBOK VINYLEX (KUNING) NO. 242', 'PAIL', '', '16CT005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1924, '16CT006- CAT TEMBOK VINYLEX ( PUTIH )', 'PAIL', '', '16CT006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1925, '16CU001- CAT ZINCROMAT @ 1KG', 'KLG', '', '16CU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1926, '16DK001- DEMPUL KAYU', 'KLG', '', '16DK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1927, '16DP001- DOP PVC 1/2 \"', 'BUAH', '', '16DP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1928, '16DP002- DOP PVC 3/4 \"', 'BUAH', '', '16DP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1929, '16DP004- DAUN PINTU', 'BUAH', '', '16DP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1930, '16DY001- DYNABOLT', 'BUAH', '', '16DY001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1931, '16EJ001- ENGSEL JENDELA', 'SET', '', '16EJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1932, '16EP001- ENGSEL PINTU3\"', 'PSG', '', '16EP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1933, '16EP002- ENGSEL PINTU 4\"', 'PSG', '', '16EP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1934, '16EP003- ENGSEL PINTU', 'SET', '', '16EP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1935, '16FA001- FILTER AIR', 'SET', '', '16FA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1936, '16FG001- FIBER GLASS PLAT 0,5 MM', 'METER', '', '16FG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1937, '16GA001- GENTENG ASBES', 'LBR', '', '16GA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1938, '16GE001- GEMBOK 50 MM ( LEHER PANJANG )', 'BUAH', '', '16GE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1939, '16GE002- GEMBOK 60 mm', 'BUAH', '', '16GE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1940, '16GJ001- GRENDEL JENDELA', 'BUAH', '', '16GJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1941, '16GR001- GRC', 'LBR', '', '16GR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1942, '16GV001- GIVSEN 9 MM', 'LBR', '', '16GV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1943, '16KC001- KABEL COAXIAL ', 'MTR', '', '16KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1944, '16KD001- KERAMIK DINDING 20*25', 'DUS', '', '16KD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1945, '16KE001- KERAMIK UK. 31 X 40 ( ZIMCONIO REGINA )', 'DUS', '', '16KE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1946, '16KE002- KERAMIK UK. 12 X 31 ( LISA COLESEO )', 'BUAH ', '', '16KE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1947, '16KE003- KERAMIK 30 X 30 PUTIH', 'DUS', '', '16KE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1948, '16KE004- KERAMIK 40X40', 'DUS', '', '16KE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1949, '16KE007- KERAMIK 15*15', 'BUAH', '', '16KE007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1950, '16KE008- KERAMIK 8*31', 'BUAH', '', '16KE008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1951, '16KK001- KOMPON KAYU', 'KG', '', '16KK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1952, '16KK002- KAIN KASA', 'ROLL', '', '16KK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1953, '16KK003- KAYU KASO', 'BTG', '', '16KK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1954, '16KL001- KERAMIK LANTAI 20*20', 'DUS', '', '16KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1955, '16KL002- KERAMIK LANTAI 30*30', 'DUS', '', '16KL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1956, '16KL003- KERAMIK DINDING 20 X 25', 'DUS', '', '16KL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1957, '16KM001- KUBAH MUSHOLLA', 'BUAH', '', '16KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1958, '16KM002- KAPUR MESH 400', 'KG', '', '16KM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1959, '16KN001- KNEE PVC 2\"', 'BUAH', '', '16KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1960, '16KN003- KNEE PVC 3/4 \"', 'BUAH', '', '16KN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1961, '16KP001- KUNCI PINTU BULAT', 'BUAH', '', '16KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1962, '16KP002- KABEL POWER SUPPLY', 'MTR', '', '16KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1963, '16KP003- KACA POLOS 5 mm', 'LBR', '', '16KP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1964, '16KP004- KNEE PVC 5\"', 'BUAH', '', '16KP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1965, '16KR001- KUAS ROLL ', 'BUAH', '', '16KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1966, '16KR002- KUNCI ROFING', 'BUAH', '', '16KR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1967, '16KS001- KORAL SPLIT', 'TRUK', '', '16KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1968, '16KS002- KASTING ( PARIASI LAMPU)', 'BUAH', '', '16KS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1969, '16KS003- KORAL SPLIT', 'COLD', '', '16KS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1970, '16KT001- KARPET TALANG', 'MTR', '', '16KT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1971, '16KU001- KUAS 2\"', 'BUAH', '', '16KU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1972, '16KU002- KUAS 3\"', 'BUAH', '', '16KU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1973, '16KU003- KUAS 5\"', 'BUAH', '', '16KU003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1974, '16KV001- KABEL VISION RG - 6 90%', 'MTR', '', '16KV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1975, '16LF001- LEM FOX 1/4 KG', 'BTL', '', '16LF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1976, '16LG001- LIS GIVSUM', 'BTG', '', '16LG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1977, '16LJ001- LIS JENDELA', 'BTG', '', '16LJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1978, '16LK001- LIS KACA', 'BUAH', '', '16LK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1979, '16LP001- LIS PLAPON', 'IKAT', '', '16LP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1980, '16LS001- LIS SAMBUNGAN ALUMUNIUM UK. 6 MTR X 4 CM', 'BTG', '', '16LS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1981, '16LS002- LIS SAMBUNGAN ALUMUNIUM UK. 6 MTR X 1 CM', 'BTG', '', '16LS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1982, '16ME001- METERAN', 'BUAH', '', '16ME001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1983, '16ND001- NO DROP', 'GALON', '', '16ND001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1984, '16P0001- PAKU 3 CM', 'KG', '', '16P0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1985, '16P0002- PAKU 7 CM', 'KG', '', '16P0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1986, '16PA001- PASIR', 'COLT', '', '16PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1987, '16PA002- PASIR', 'TRUCK', '', '16PA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1988, '16PB001- PINTU PAGAR BRC UK.120*240', 'SET', '', '16PB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1989, '16PB002- PINTU BRC + ENGSEL UK. 250 X 120', 'UNIT', '', '16PB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1990, '16PC001- PENGERAS COR', 'KLG', '', '16PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1991, '16PC002- PAPAN COR', 'LBR', '', '16PC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1992, '16PF001- PLASTIC FIBER PLAT ', 'METER', '', '16PF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1993, '16PG001- PAPAN GRC 4*4*8', 'LBR', '', '16PG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1994, '16PG002- PAPAN GIVSUN 9 MM', 'LBR', '', '16PG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1995, '16PG004- PIPA GALF 2 1/2\" X 6 MTR  SCH 40', 'BTG', '', '16PG004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1996, '16PG005- PAKU GRC', 'KG', '', '16PG005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1997, '16PG006- PIPA GALFANIS 5\"SCH 40', 'BTG', '', '16PG006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1998, '16PG007- PIPA GALFANIS 1/2 \" SCH 40', 'BTG', '', '16PG007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1999, '16PG008- PAPAN GRC 4MM X 120 X 240', 'LBR', '', '16PG008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2000, '16PH001- PAHAT BETON 12\"', 'BUAH', '', '16PH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2001, '16PI001- PIPA PVC 2\"', 'BTG', '', '16PI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2002, '16PI002- PIPA PVC 3/4 \"', 'BTG', '', '16PI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2003, '16PJ001- PINTU + JENDELA', 'SET', '', '16PJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2004, '16PK001- PENSIL KAYU', 'BUAH', '', '16PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2005, '16PK002- PLITUR KAYU.', 'KLG', '', '16PK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2006, '16PK003- PAKU 5 CM', 'KG', '', '16PK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2007, '16PK004- PAKU 4 CM', 'KG', '', '16PK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2008, '16PK005- PAKU 10', 'KG', '', '16PK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2009, '16PK006- PAKU 1\"', 'KG', '', '16PK006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2010, '16PK007- POLI KARBONITE UK. 1180 X 210 5MM', 'ROLL', '', '16PK007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2011, '16PL001- PALU', 'BUAH', '', '16PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2012, '16PM001- PAPAN UK. 3 X 20 X 4 MTR', 'LBR', '', '16PM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2013, '16PP001- PAKU PANCING/HAK SENG 7 CM', 'BUAH', '', '16PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2014, '16PP005- PIPA PAYUNG', 'KG', '', '16PP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2015, '16PP006- PIPA PVC 5\"', 'BTG', '', '16PP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2016, '16PP007- PIPA PVC 1\"', 'BTG', '', '16PP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2017, '16PP008- PH PAPER', 'BUAH', '', '16PP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2018, '16PP009- PAC ( PUTIH )', 'KG', '', '16PP009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2019, '16PR001- PAKU ROFING', 'BUAH', '', '16PR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2020, '16PR002- PARTISI RUANGAN KANTOR + ONGKOS', 'SET', '', '16PR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2021, '16PR003- PAKU ROFING 12 X 20 @ 800 BUAH', 'DUS', '', '16PR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2022, '16PRK01- PARTISI RUANGAN KANTOR', 'SET', '', '16PRK01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2023, '16PS001- PLAT STEANLES STEEL TYPE 304 3 mm 4 x 8', 'LBR', '', '16PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2024, '16PS002- PLAT STEANLES STEEL TYPE 316 4 mm 4 X 8', 'LBR', '', '16PS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2025, '16PS003- PLAT STEANLES STEEL TYPE 304 5 mm 4 X 8', 'LBR', '', '16PS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2026, '16PS004- PLAT STEANLES STEEL TYPE 304 8 mm 4 X 8', 'LBR', '', '16PS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2027, '16PS005- PLAT STEANLES STEL TYPE 304 DIA 400 X 18', 'LBR', '', '16PS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2028, '16PS006- PLAT STRIP S/S 8 mm 50 X 2 TYPE 304', 'LBR', '', '16PS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2029, '16PS007- PLAT STEANLES STEL 304 2 MM 4 X 8', 'LBR', '', '16PS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2030, '16PS008- SIKU STANLESS 5 X 50 X 50', 'BTG', '', '16PS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2031, '16PS010- PLOCK SHOCK PVC 3/4 x 1/2 \"', 'BUAH', '', '16PS010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2032, '16PS011- PLAT STEANLESS STELL 304 4 mm 4*8', 'LBR', '', '16PS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2033, '16PS012- PLOCK SHOCK PVC 1\" x 3/4\"', 'BUAH', '', '16PS012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2034, '16PS013- PAKU SEKRUP', 'DUS', '', '16PS013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2035, '16PT001- PAKU TRIPLEK', 'KG', '', '16PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2036, '16PT002- PLAMUR TEMBOK', 'KLG', '', '16PT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2037, '16PU001- PINTU PAGAR BRC UK. 120*240', 'SET', '', '16PU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2038, '16PV001- PINTU PVC ', 'BUAH', '', '16PV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2039, '16RB001- RENOVASI BANGUNAN', 'UNIT', '', '16RB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2040, '16RS001- RISPLANG GRC 20*4', 'BTG', '', '16RS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2041, '16RS002- RISPLANG GRC 30*240*10', 'LBR', '', '16RS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2042, '16SB001- SENG BEKAS', 'LBR', '', '16SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2043, '16SB002- STEEL BELT BEKAS', 'KG', '', '16SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2044, '16SC001- SOWER CLOSSED', 'SET', '', '16SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2045, '16SD001- SHOCK DRAT PVC 3/4\"', 'BUAH', '', '16SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2046, '16SD002- SHOCK DRAT LUAR PVC 1\"', 'BUAH', '', '16SD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2047, '16SE001- SEMEN', 'ZAK', '', '16SE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2048, '16SE002- SEMEN MU', 'ZAK', '', '16SE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2049, '16SF001- SENG FIBER PLASTIC GEL UK-3 METER', 'LBR', '', '16SF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2050, '16SF002- SERAT FIBER ', 'LBR', '', '16SF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2051, '16SF004- SKRUP FISER', 'BUAH', '', '16SF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2052, '16SG001- SKRUP GIVSUM.', 'PAK', '', '16SG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2053, '16SK001- STOP KRAN KIT 3/4 \"', 'BUAH', '', '16SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2054, '16SP001- SEMEN PUTIH', 'KG', '', '16SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2055, '16SP002- SPORKET 40*13', 'BUAH', '', '16SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2056, '16SP003- SPORKET 40*25', 'BUAH', '', '16SP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2057, '16SP004- SELOT PINTU 2\"', 'BUAH', '', '16SP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2058, '16SP005- SENG PLASTIC', 'LBR', '', '16SP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2059, '16SP006- SENG PLAT ALUMUNIUM 1 MM', 'METER', '', '16SP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2060, '16SP007- SENG PLASTIC GELOMBANG UK. 240', 'LBR', '', '16SP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2061, '16SP008- SENG PLASTIC GELOMBANG UK. 180', 'LBR', '', '16SP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2062, '16SP009- SENG PLASTIK GELOMBANG UK. 300', 'LBR', '', '16SP009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2063, '16SS001- SENDOK SEMEN', 'BUAH', '', '16SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2064, '16SS002- SIKU S/S TYPE 304 50 X 5  X 6', 'BTG', '', '16SS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2065, '16SS003- SIKU STEANLES STEL 304 40 X 40 X 4 X 6', 'LBR', '', '16SS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2066, '16ST001- SENG TALANG', 'MTR', '', '16ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2067, '16ST002- SENG TALANG 90 CM', 'MTR', '', '16ST002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2068, '16SW001- SISI WALDING GIVSUN', 'BUAH', '', '16SW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2069, '16SW002- SEMEN WATERROOFING @ 5 KG', 'ZAK', '', '16SW002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2070, '16SW003- SEMEN WATERROOFING @ 25 KG', 'ZAK', '', '16SW003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2071, '16TB001- TEBANG POHON', 'BUAH', '', '16TB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2072, '16TE001- TEE PVC 3/4 \"', 'BUAH', '', '16TE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2073, '16TE003- TEE PVC 1\"', 'BUAH', '', '16TE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2074, '16TG001- TIANG PAGAR UK-150 CM', 'BTG', '', '16TG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2075, '16TJ001- TARIKAN JENDELA', 'BUAH', '', '16TJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2076, '16TJ002- TAHANAN JENDELA', 'BUAH', '', '16TJ002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2077, '16TR001- TRIPLEK 6 MM', 'LBR', '', '16TR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2078, '16TR002- TRIPLEK 12 MM', 'LBR', '', '16TR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2079, '16TR004- TRIPLEK 18 MM', 'LBR', '', '16TR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2080, '16TT001- TALI TAMBANG 25 MM', 'MTR', '', '16TT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2081, '16VS001- VLOCK SHOCK PVC 1\" X 1/2\"', 'BUAH', '', '16VS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2082, '16WM001- WATER MUR PVC 11/2\"', 'BUAH', '', '16WM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2083, '16WM002- WATER MUR PVC 11/4\"', 'BUAH', '', '16WM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2084, '16WM003- WIRE MESH STEANLES UK. MESH 200', 'METER', '', '16WM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2085, '16WM004- WIRE MESH STEANLES UK. MESH 300', 'METER', '', '16WM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2086, '16WT001- WASH TAFEL', 'SET', '', '16WT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2087, '1701BCW- BC WIRE HARD 2,60MM', 'KG', '', '1701BCW', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2088, '1701STP- SERVICE TRAVO PLN 2500 KVA', 'UNIT', '', '1701STP', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2089, '17AC001- ACCESSORIS', 'LOT', '', '17AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2090, '17BK001- BINGKAI KACA UK. 90CM X 60CM', 'BUAH', '', '17BK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2091, '17CC017- CAMERA CCTV PIH 0422 ( 3,6 MM )', 'UNIT', '', '17CC017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2092, '17CJ001- CELANA JEANS PANJANG', 'LBR', '', '17CJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2093, '17CV001- CHANNELS VIDIO SWITCH SP-604', 'UNIT', '', '17CV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2094, '17DP001- DRUM PLASTIK UK-200 LITER', 'BUAH', '', '17DP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2095, '17EE001- ELECTRIC ENGRAVER 220 V', 'UNIT', '', '17EE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2096, '17GE001- GEMBOK 50 MM', 'BUAH', '', '17GE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2097, '17GE002- GEMBOK 40 MM', 'BUAH', '', '17GE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2098, '17GE003- GEMBOK 60 MM', 'BUAH', '', '17GE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2099, '17HP001- HELM PROYEK', 'BUAH', '', '17HP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2100, '17HS001- HELM SAFETY ', 'BUAH', '', '17HS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2101, '17IK001- IMPELER KUNINGAN ', 'BUAH', '', '17IK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2102, '17IK002- IMPELLER D5', 'BUAH', '', '17IK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2103, '17JJ001- JAKET JEANS', 'LBR', '', '17JJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2104, '17KA001- KAWAT LOCKET ', 'METER', '', '17KA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2105, '17KC001- KABEL COAXIAL', 'METER', '', '17KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2106, '17KG001- KARTU GUDANG', 'LBR', '', '17KG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2107, '17KG002- KARUNG GONI (BEKAS)', 'BUAH', '', '17KG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2108, '17KM001- KACA MATA LAS', 'BUAH', '', '17KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2109, '17KN001- KANEBO', 'BUAH', '', '17KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2110, '17KP001- KAPUR TULIS', 'DUS', '', '17KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2111, '17KP002- KIPAS ANGIN (WALL FAN ) 30\"', 'UNIT', '', '17KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2112, '17KR001- KABEL RG 6 PREMIUM', 'METER', '', '17KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2113, '17KS001- KABEL POWER SUPPLY 2*1,5', 'METER', '', '17KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2114, '17KT001- KAPE', 'BUAH', '', '17KT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2115, '17KU001- KUNCI LACI 808', 'BUAH', '', '17KU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2116, '17LA001- LEM AICA AIBON @ 1/2 KG', 'KLG', '', '17LA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2117, '17LA002- LEM AICA AIBON @ 1 KG', 'KLG', '', '17LA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2118, '17LG001- LEM GASKET SELAG', 'BOTOL', '', '17LG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2119, '17LH001- LAMPU HOLOGEN 150 WATT', 'BUAH', '', '17LH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2120, '17LH002- LAMPU HOLOGEN 100 WATT / 12 V', 'BUAH', '', '17LH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2121, '17LT003- LAMPU TEMBAK 150 WATT', 'BUAH', '', '17LT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2122, '17MP001- MESIN POTONG RUMPUT', 'UNIT', '', '17MP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2123, '17MS001- MOTOR SIRINE MDL : 290 / 220 V', 'BUAH', '', '17MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2124, '17PA001- PLAMPUNG AIR 3/4 \"', 'BUAH', '', '17PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2125, '17PH001- PH INDICATOR STRIPS 0-14', 'BOX', '', '17PH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2126, '17PP001- PENGKI PLASTIC', 'BUAH', '', '17PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2127, '17PP002- POHON PUCUK MERA', 'BTG', '', '17PP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2128, '17PS001- POWER SUPPLY 12 V/0,5 A', 'UNIT', '', '17PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2129, '17PW001- PAPAN WHITE BOARD 3MM UK. 122 X 244', 'LBR', '', '17PW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2130, '17RC001- ROOSTER CONTINENTAL 20*20 CM', 'BUAH', '', '17RC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2131, '17RP001- REAKTIVE POWER REGULATOR', 'BUAH', '', '17RP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2132, '17SB002- SERBET', 'LUSIN', '', '17SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2133, '17SG001- SAPU GALAH', 'BUAH', '', '17SG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2134, '17SI001- SIKAT KAWAT', 'BUAH', '', '17SI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2135, '17SK001- STICKER BCW KECIL', 'LBR', '', '17SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2136, '17SL001- SAPU LIDI ', 'BUAH', '', '17SL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2137, '17SS001- SEPATU SERAGAM ( SAFTY SHOES )', 'PSG', '', '17SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2138, '17ST001- SAMBUNGAN TALANG 4\"', 'BUAH', '', '17ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2139, '17TH001- THINNER @ 1 LITER', 'KLG', '', '17TH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2140, '17TH003- THINNER', 'LTR', '', '17TH003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2141, '17TL000- TALANG PVC 4\"', 'BTG', '', '17TL000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2142, '17TM001- TERMOMETER H19RO ( ELEKTRIK )', 'BUAH', '', '17TM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2143, '17TM002- TERMOMETER ANALOG TBS ( MANUAL )', 'BUAH', '', '17TM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2144, '17TP001- TERPAL PLASTIK', 'LBR', '', '17TP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2145, '17TP002- TERPAL PLASTIC UK-6*10', 'LBR', '', '17TP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2146, '17TP003- TERPAL PLASTIC UK-6*15', 'LBR', '', '17TP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2147, '17TP004- TERPAL PLASTIC UK-4*8 ', 'LBR', '', '17TP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2148, '17TP005- TERPAL PLASTIC UK-4*6', 'LBR', '', '17TP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2149, '17TP006- TERPAL PLASTIK UK. 6 X 8 MTR', 'LBR', '', '17TP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2150, '17TP007- TERPAL PLASTIK UK. 5 X 8 MTR', 'LBR', '', '17TP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2151, '17TP008- TERPAL PLASTIK UK. 12 X 12 MTR', 'LBR', '', '17TP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2152, '18DB001- DIES BARU 0,60 MM', 'BUAH', '', '18DB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2153, '18DB002- DIES BARU 0,63 MM', 'BUAH', '', '18DB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2154, '18DB003- DIES BARU 0,88 MM', 'BUAH', '', '18DB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2155, '18DB004- DIES BARU 0,90 MM BUAH', 'BUAH', '', '18DB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2156, '18DB005- DIES BARU 0,95 MM', 'BUAH ', '', '18DB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2157, '18DB006- DIES BARU 1,30 MM', 'BUAH', '', '18DB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2158, '18DB007- DIES BARU 1,50 MM', 'BUAH', '', '18DB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2159, '18DB009- DIES BARU 1,80 MM', 'BUAH', '', '18DB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2160, '18DB010- DIES BARU 2,25 MM', 'BUAH', '', '18DB010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2161, '18DB011- DIES BARU 2,90 MM', 'BUAH', '', '18DB011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2162, '18DB012- DIES BARU 2,60 MM', 'BUAH', '', '18DB012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2163, '18DB013- DIES BARU 3,20 MM', 'BUAH', '', '18DB013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2164, '18DB014- DIES BARU 3,37 MM ', 'BUAH', '', '18DB014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2165, '18DB015- DIES BARU 3,50 MM', 'BUAH', '', '18DB015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2166, '18DB016- DIES BARU 3,84 MM', 'BUAH', '', '18DB016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2167, '18DB017- DIES BARU 4,00 MM', 'BUAH', '', '18DB017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2168, '18DB018- DIES BARU 4,24 MM', 'BUAH', '', '18DB018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2169, '18DB019- DIES BARU 4,38 MM', 'BUAH', '', '18DB019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2170, '18DB020- DIES BARU 4,50 MM', 'BUAH', '', '18DB020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2171, '18DB021- DIES BARU 4,60 MM', 'BUAH', '', '18DB021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2172, '18DB022- DIES BARU 4,66 MM', 'BUAH', '', '18DB022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2173, '18DB023- DIES BARU 5,00 MM', 'BUAH', '', '18DB023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2174, '18DB024- DIRS BARU 5,13 MM', 'BUAH', '', '18DB024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2175, '18DB025- DIES BARU 5,20 MM', 'BUAH', '', '18DB025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2176, '18DB026- DIES BARU 5,64 MM', 'BUAH', '', '18DB026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2177, '18DB027- DIES BARU 5,70 MM', 'BUAH', '', '18DB027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2178, '18DB028- DIES BARU O 6,20 MM', 'BUAH', '', '18DB028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2179, '18DB029- DIES BARU O 6,50 MM', 'BUAH', '', '18DB029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2180, '18DB030- DIES BARU O 6,60 MM', 'BUAH', '', '18DB030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2181, '18DB031- DIES BARU O 7,00 MM', 'BUAH', '', '18DB031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2182, '18DB032- DIES BARU O 2,70 MM', 'BUAH', '', '18DB032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2183, '18DB033- DIES BARU O 2,27 MM', 'BUAH', '', '18DB033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2184, '18DB034- DIES BARU O 2,78 MM', 'BUAH', '', '18DB034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2185, '18DB035- DIES BARU O 3,59 MM', 'BUAH', '', '18DB035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2186, '18DB036- DIES BARU 2,28 MM', 'BUAH', '', '18DB036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2187, '18DB037- DIES BARU O 2,19 MM', 'BUAH', '', '18DB037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2188, '18DB038- DIES BARU 2,62 MM', 'BUAH', '', '18DB038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2189, '18DB039- DIES BARU 3,55 MM', 'BUAH', '', '18DB039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2190, '18DB040- DIES BARU 2,40 MM ', 'BUAH', '', '18DB040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2191, '18DB041- DIES BARU 3,60 MM', 'BUAH', '', '18DB041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2192, '18DB042- DIES BARU 6,80 MM W-5', 'BUAH', '', '18DB042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2193, '18DB043- DIES BARU 2,29 MM W-3', 'BUAH', '', '18DB043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2194, '18DB044- DIES BARU 2,46 MM W-3', 'BUAH', '', '18DB044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2195, '18DB045- DIES BARU 3.58 MM', 'BUAH', '', '18DB045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2196, '18DB046- DIES BARU 2.52 MM', 'BUAH', '', '18DB046', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2197, '18DB054- DIES BARU 3.15 mm', 'BUAH', '', '18DB054', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2198, '18DB055- DIES BARU 2.82 mm', 'BUAH', '', '18DB055', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2199, '18DB056- DIES BARU 2.53', 'BUAH', '', '18DB056', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2200, '18DB057- DIES BARU 5,50', 'BUAH', '', '18DB057', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2201, '18DB058- DIES BARU 2,30 MM', 'BUAH', '', '18DB058', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2202, '18DB059- DIES BARU 2.19 MM', 'BUAH', '', '18DB059', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2203, '18DB060- DIES BARU 3.85', 'BUAH', '', '18DB060', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2204, '18DB061- DIES BARU 2.78', 'BUAH', '', '18DB061', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2205, '18DB062- DIES BARU 2.54', 'BUAH', '', '18DB062', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2206, '18DB063- DIES BARU 2.70', 'BUAH', '', '18DB063', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2207, '18DB064- DIES BARU 3,57 MM', 'BUAH', '', '18DB064', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2208, '18DB065- DIES BARU 3,30 MM', 'BUAH', '', '18DB065', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2209, '18DB066- DIES BARU 3,10 MM', 'BUAH', '', '18DB066', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2210, '18DB067- DIES BARU 3,72 MM', 'BUAH', '', '18DB067', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2211, '18DC001- DIES COLD WELDER 0,790 MM', 'BUAH', '', '18DC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2212, '18DC002- DIES COLD WELDER 0,690 MM', 'BUAH', '', '18DC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2213, '18DD001- DIES DIAMOND 1,76 MM', 'BUAH', '', '18DD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2214, '18DD002- DIES DIAMOND 1,32 MM', 'BUAH', '', '18DD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2215, '18DD003- DIES DIAMONG 0,93 MM', 'BUAH', '', '18DD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2216, '18DD004- DIES DIAMOND 1,43 MM', 'BUAH', '', '18DD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2217, '18DD005- DIES DAIMOND 0.68 MM', 'BUAH', '', '18DD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2218, '18DD006- DIES SEMI DIAMOND 6,60', 'BUAH', '', '18DD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2219, '18DD007- DIES SEMI DIAMOND 5,70', 'BUAH', '', '18DD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2220, '18DD008- DIES SEMI DIAMOND 5,05 ', 'BUAH', '', '18DD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2221, '18DD009- DIES SEMI DIAMOND 4,50', 'BUAH', '', '18DD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2222, '18DD011- DIES SEMI DIAMOND 3,55', 'BUAH', '', '18DD011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2223, '18DD017- DIES DAIMOND 1.07 mm', 'BUAH', '', '18DD017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2224, '18DD018- DIES DAIMOND 0.11', 'BUAH', '', '18DD018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2225, '18DD019- DIES DAIMOND 0.14', 'BUAH', '', '18DD019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2226, '18DD020- DIES DAIMOND 0.18', 'BUAH', '', '18DD020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2227, '18DD021- DIES DAIMOND 0.10 mm', 'BUAH', '', '18DD021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2228, '18DD022- DIES DAIMOND 0.13', 'BUAH', '', '18DD022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2229, '18DD023- DIES DAIMOND 0.16', 'BUAH', '', '18DD023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2230, '18DD024- DIES DAIMOND 1.845', 'BUAH', '', '18DD024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2231, '18DD025- DIES DAIMOND 1.225', 'BUAH', '', '18DD025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2232, '18DD028- DIES DIAMOND 1,37 MM ', 'BUAH', '', '18DD028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2233, '18DD029- DIES DIAMOND 1,153 MM', 'BUAH', '', '18DD029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2234, '18DS001- DIES SERVICE 3,00 MM', 'BUAH', '', '18DS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2235, '18DS002- DIES SERVICE 3,30 MM', 'BUAH', '', '18DS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2236, '18DS003- DIES SERVICE 4,10 MM', 'BUAH', '', '18DS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2237, '18DS004- DIES SERVICE 5,20 MM', 'BUAH', '', '18DS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2238, '18DS005- DIES SERVICE 5,30 MM', 'BUAH', '', '18DS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2239, '18DS006- DIES SERVICE 5,50 MM', 'BUAH', '', '18DS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2240, '18DS007- DIES SUPER LOY O 1,40 MM', 'BUAH', '', '18DS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2241, '18DS008- DIES SUPER LOY 1,30 MM', 'BUAH', '', '18DS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2242, '18DS009- DIES SUPER LOY 1,60 MM', 'BUAH', '', '18DS009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2243, '18DS010- DIES SUPER LOY 2,20 MM', 'BUAH', '', '18DS010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2244, '18DS011- DIES SUPER LOY 3,00 MM', 'BUAH', '', '18DS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2245, '18DS012- DIES SUPER LOY 3,30 MM', 'BUAH', '', '18DS012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2246, '18DS013- DIES SUPER LOY 3,40 MM', 'BUAH', '', '18DS013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2247, '18DS014- DIES SUPER LOY 3,60 MM', 'BUAH', '', '18DS014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2248, '18DS015- DIES SUPER LOY 3,80 MM', 'BUAH', '', '18DS015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2249, '18DS016- DIES SUPER LOY 5,20 MM', 'BUAH', '', '18DS016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2250, '18DS017- DIES SUPER LOY 5,30 MM', 'BUAH', '', '18DS017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2251, '18DS018- DIES SUPER LOY 5,50 MM', 'BUAH', '', '18DS018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2252, '18DS019- DIES SUPER LOY 6,00 MM', 'BUAH', '', '18DS019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2253, '18DS020- DIES SUPER LOY 7,00 MM', 'BUAH', '', '18DS020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2254, '18DS021- DIES SERVICE 6,50 MM', 'BUAH', '', '18DS021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2255, '18DS022- DIES SERVICE 5,70 MM', 'BUAH', '', '18DS022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2256, '18DS023- DIES SERVICE 5,00 MM', 'BUAH', '', '18DS023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2257, '18DS024- DIES SERVICE 4,00 MM', 'BUAH', '', '18DS024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2258, '18DS027- DIES SERVICE 8,10 MM', 'BUAH', '', '18DS027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2259, '18DS028- DIES SERVICE 8,20 MM', 'BUAH', '', '18DS028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2260, '18DS029- DIES SERVICE MM 8,40 MM', 'BUAH', '', '18DS029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2261, '18DS030- DIES SERVICE 2,50 MM', 'BUAH', '', '18DS030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2262, '18DS031- DIES SERVICE 2,70 MM', 'BUAH', '', '18DS031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2263, '18DS032- DIES SERVICE 2,80 MM', 'BUAH', '', '18DS032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2264, '18DS033- DIES SERVICE 2,90 MM', 'BUAH', '', '18DS033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2265, '18DS034- DIES SERVICE 3,15 MM', 'BUAH', '', '18DS034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2266, '18DS035- DIES SERVICE 3,20 MM', 'BUAH', '', '18DS035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2267, '18DS036- DIES SERVICE 3,37 MM', 'BUAH', '', '18DS036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2268, '18DS037- DIES SERVICE 3,50 MM', 'BUAH', '', '18DS037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2269, '18DS038- DIES SERVICE 3,58 MM', 'BUAH', '', '18DS038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2270, '18DS039- DIES SERVICE 3,60 MM', 'BUAH', '', '18DS039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2271, '18DS040- DIES SERVICE 3,84 MM', 'BUAH', '', '18DS040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2272, '18DS041- DIES SERVICE 4,00 MM', 'BUAH', '', '18DS041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2273, '18DS042- DIES SERVICE 4,38 MM', 'BUAH', '', '18DS042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2274, '18DS043- DIES SERVICE 4,50 MM', 'BUAH', '', '18DS043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2275, '18DS044- DIES SERVICE 5,00 MM', 'BUAH', '', '18DS044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2276, '18DS045- DIES SERVICE 5,70 MM', 'BUAH', '', '18DS045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2277, '18DS046- DIES SERVICE 6,50 MM', 'BUAH', '', '18DS046', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2278, '18DS047- DIES SERVICE 6,60 MM', 'BUAH', '', '18DS047', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2279, '18DS048- DIES SERVICE 6,80 MM', 'BUAH', '', '18DS048', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2280, '18DS049- DIES SERVICE 7,60 MM', 'BUAH', '', '18DS049', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2281, '18DS050- DIES SERVICE 8,10 MM', 'BUAH', '', '18DS050', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2282, '18DS051- DIES SERVICE 8,20 MM', 'BUAH', '', '18DS051', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2283, '18DS052- DIES SERVICE 8,40 MM', 'BUAH', '', '18DS052', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2284, '18DS053- DIES SERVICE 8,50 MM', 'BUAH', '', '18DS053', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2285, '18DS055- DIES SERVICE 2.40', 'BUAH', '', '18DS055', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2286, '18DS056- DIES SERVICE 7,50 MM', 'BUAH', '', '18DS056', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2287, '18SD001- SERVICE DIES 0.10 - 0.11', 'BUAH', '', '18SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2288, '18SD002- SERVICE DIES 0.10 - 0.12', 'BUAH', '', '18SD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2289, '18SD003- SERVICE DIES 0.10 - 0.16', 'BUAH', '', '18SD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2290, '18SD004- SERVICE DIES 0.10 - 0.14', 'BUAH', '', '18SD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2291, '18SD005- SERVICE DIES 0.10 - 0.13', 'BUAH', '', '18SD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2292, '18SD006- SERVICE DIES 0.11 - 0.16', 'BUAH', '', '18SD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2293, '18SD007- SERVICE DIES 0.11 - 0.14', 'BUAH', '', '18SD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2294, '18SD008- SERVICE DIES 0.11 - 0.15', 'BUAH', '', '18SD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2295, '18SD009- SERVICE DIES 0.11 - 0.13', 'BUAH', '', '18SD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2296, '18SD010- SERVICE DIES 0.11 - 0.12', 'BUAH', '', '18SD010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2297, '18SD011- SERVICE DIES 2.40 - 2.55', 'BUAH', '', '18SD011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2298, '18SD012- SERVICE DIES 2.20 - 2.55', 'BUAH', '', '18SD012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2299, '18SD013- SERVICE DIES DAIMOND 0.26-0.30', 'PCS', '', '18SD013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2300, '18SD014- SERVICE DIES DAIMOND 0.12-0.14', 'PCS', '', '18SD014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2301, '18SD015- SERVICE DIES DAIMOND 0.13-0.15', 'PCS', '', '18SD015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2302, '18SD016- SERVICE DIES DAIMOND 0.14-0.16', 'PCS', '', '18SD016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2303, '18SD017- SERVICE DIES 2.60 MM > 2.90 MM ', 'BUAH', '', '18SD017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2304, '18SD018- SERVICE DIES 2.53 MM > 2.80 MM', 'BUAH', '', '18SD018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2305, '18SD019- SERVICE DIES 2.40 MM > 2.70 MM', 'BUAH', '', '18SD019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2306, '18SD020- SERVICE DIES 2.30 MM > 2.60 MM', 'BUAH', '', '18SD020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2307, '18SD021- SERVICE DIES 2.29 MM > 2.54 MM', 'BUAH', '', '18SD021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2308, '18SD022- SERVICE DIES 2.26 MM > 2.50 MM', 'BUAH', '', '18SD022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2309, '18SD023- SERVICE DIES 2.19 MM > 2.40 MM', 'BUAH', '', '18SD023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2310, '18SD024- SERVICE DIES 5.70 MM > 6.60 MM', 'BUAH', '', '18SD024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2311, '18SD025- SERVICE DIES 5.00 MM > 5.70 MM', 'BUAH', '', '18SD025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2312, '18SD026- SERVICE DIES 4.50 MM > 5.00 MM', 'BUAH', '', '18SD026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2313, '18SD027- SERVICE DIES 4.00 MM > 4.50 MM', 'BUAH', '', '18SD027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2314, '18SD028- SERVICE DIES 3.50 MM > 4.00 MM', 'BUAH', '', '18SD028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2315, '18SD029- SERVICE DIES 5,70 MM > 8,50 MM', 'BUAH', '', '18SD029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2316, '18SD030- SERVICE DIES 240 MM > 2,90 MM', 'BUAH', '', '18SD030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2317, '18SD031- SERVICE DIES 2.90 MM W-3', 'BUAH', '', '18SD031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2318, '18SD032- SERVICE DIES 2.70 MM', 'BUAH', '', '18SD032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2319, '18SD033- SERVICE DIES 2.62 MM', 'BUAH', '', '18SD033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2320, '18SD034- SERVICE DIES 2.39 MM', 'BUAH', '', '18SD034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2321, '18SD035- SERVICE DIES 6.60 MM W-5', 'BUAH', '', '18SD035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2322, '18SD036- SERVICE DIES 2.40 MM W-3', 'BUAH', '', '18SD036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2323, '18SD037- SERVICE DIES 5.70 MM W-5', 'BUAH', '', '18SD037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2324, '18SD038- SERVICE DIES 5.00 MM W-4', 'BUAH', '', '18SD038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2325, '18SD039- SERVICE DIES 4.50 MM W-4', 'BUAH', '', '18SD039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2326, '18SD040- SERVICE DIES 4.00 MM W-4', 'BUAH', '', '18SD040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2327, '18SD041- SERVICE DIES 3.50 MM W-4', 'BUAH', '', '18SD041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2328, '18SD042- SERVICE DIES 2.60 MM W-3', 'BUAH', '', '18SD042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2329, '18SD043- SERVICE DIES 2.50 MM W-3', 'BUAH', '', '18SD043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2330, '18SD044- SERVICE DIES 3.50 MM W-3', 'BUAH', '', '18SD044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2331, '18SD045- SERVICE DIES 2.30 MM W-3', 'BUAH', '', '18SD045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2332, '18SD046- SERVICE DIES 2.40 MM W-3', 'BUAH', '', '18SD046', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2333, '18SD047- SERVICE DIES 2.60 MM W-3', 'BUAH', '', '18SD047', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2334, '18SD048- SERVICE DIES 5.70 MM W-4', 'BUAH', '', '18SD048', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2335, '19AC002- ACCU 75/12 VOLT', 'UNIT', '', '19AC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2336, '19ACPN1- AIR CLEANER P/N 91361-00900', 'BUAH', '', '19ACPN1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2337, '19AF001- AIR FILTER MD 603446', 'BUAH', '', '19AF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2338, '19AF002- AIR FILTER J 85-1027-01', 'BUAH', '', '19AF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2339, '19AF003- AIR FILTER P/N 1703 - 20B TOYOTA 7FD 3,5', 'BUAH', '', '19AF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2340, '19AN001- ALTERNATOR ASSY P/N 27060-78301-71', 'BUAH', '', '19AN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2341, '19BC001- BEARING CLUTCH P/N ME 620330', 'BUAH', '', '19BC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2342, '19BC002- BUSHING CON ROD', 'BUAH', '', '19BC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2343, '19BD001- BAN DALAM UK. 700*12', 'BUAH', '', '19BD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2344, '19BE001- BEARING 307-15-11930', 'BUAH', '', '19BE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2345, '19BE002- BEARING 3 EC 24-11310', 'BUAH', '', '19BE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2346, '19BE003- BEARING 43826-31960-71', 'BUAH', '', '19BE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2347, '19BE004- BEARING P/N 43826-31960-71', 'BUAH', '', '19BE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2348, '19BE006- BEARING KOYO', 'BUAH', '', '19BE006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2349, '19BE007- BEARING NEDLE ', 'BUAH', '', '19BE007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2350, '19BE008- BRACKET ENGINE LH 91520-20100', 'BUAH', '', '19BE008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2351, '19BE009- BRACKET ENGINE RH 91520-10400', 'BUAH', '', '19BE009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2352, '19BE010- BEARING P/N 64343-50400', 'BUAH', '', '19BE010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2353, '19BE011- BEARING P/N 91443-01600', 'BUAH', '', '19BE011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2354, '19BF001- BAN FLAP UK. 700*12', 'BUAH', '', '19BF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2355, '19BF002- BAN FLAP UK. 600 X 9', 'BUAH', '', '19BF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2356, '19BK001- BEARING KING PIN', 'BUAH', '', '19BK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2357, '19BL001- BAN LUAR 700*12*12 PLY', 'BUAH', '', '19BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2358, '19BL002- BAN LUAR UK. 700*15 12 PLY', 'BUAH', '', '19BL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2359, '19BL003- BOLT F 1035-12085', 'BUAH', '', '19BL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2360, '19BM001- BAN MATI 650 - 10 / 5,00', 'BUAH', '', '19BM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2361, '19BM002- BAN MATI 250-15 / 700', 'BUAH', '', '19BM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2362, '19BN001- BEARING NEEDLE B/C P/N. 3EC-24-11350', 'BUAH', '', '19BN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2363, '19BN002- BEARING P/N. 34C-24-11930', 'BUAH', '', '19BN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2364, '19BO001- BOLT P/N 300-27-11221', 'BUAH', '', '19BO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2365, '19BO002- BOLT 07206-31014', 'BUAH', '', '19BO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2366, '19BP001- BEARING PIN KING P/N 91443-05600', 'BUAH', '', '19BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2367, '19BP002- BONGKAR PASANG BAN (FORKLIP)', 'BUAH', '', '19BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2368, '19BR001- BRAKE SHOE 47440-32880-71', 'BUAH', '', '19BR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2369, '19BR002- BRAKE SHOE 47430-32880-71', 'BUAH', '', '19BR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2370, '19BR003- BRAKE SHOE 47420-32880-71', 'BUAH', '', '19BR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2371, '19BR004- BRAKE SHOE 47410-32880-71', 'BUAH', '', '19BR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2372, '19BR005- BEARING RELEASE', 'BUAH', '', '19BR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2373, '19BS001- BALL SOCKET 3 EC 24-11600', 'BUAH', '', '19BS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2374, '19BS002- BOLT STOPPER', 'BUAH', '', '19BS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2375, '19BS003- BOLT STOPER P/N 64343-18801', 'BUAH', '', '19BS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2376, '19BS004- BALL SOCKET ASSY', 'BUAH', '', '19BS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2377, '19BT001- BEARING P/N. 34C-24-11310', 'BUAH', '', '19BT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2378, '19BX001- BOX SIKRING', 'BUAH', '', '19BX001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2379, '19CA001- CYLINDER ASSY', 'SET', '', '19CA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2380, '19CA002- CYLINDER ASSY, MASTER P/N. 91346 - 10300', 'BUAH', '', '19CA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2381, '19CA003- CYLINDER ASSY, CLUTCH P/N. 91851 - 23500', 'BUAH', '', '19CA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2382, '19CA004- COVER ASSY, ROCKER P/N. 32A04 - 03011', 'BUAH', '', '19CA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2383, '19CC001- COVER CLUTCH ', 'BUAH', '', '19CC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2384, '19CD001- CLUTCH DISK ASSY P/N 304-10-34110', 'BUAH', '', '19CD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2385, '19CD002- CLUTCH DISK ASSY P/N 3EC-10-11520', 'BUAH', '', '19CD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2386, '19CD003- CLUTCH DISK P/N 91321-11100', 'BUAH', '', '19CD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2387, '19CF001- CARTRIDGE P/N. 3ED-66-11330', 'BUAH', '', '19CF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2388, '19CL001- CLAMP ( SOLAR )', 'BUAH', '', '19CL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2389, '19CS001- CAP SEALING P/N 04826-22000', 'BUAH', '', '19CS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2390, '19CS002- CAP  SEALING P/N 04826-22500', 'BUAH', '', '19CS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2391, '19DC001- DEKRUP COUPLING ( COVER CLUTCH )', 'BUAH', '', '19DC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2392, '19DC002- COVER CLUTCH P/N 91321-00010', 'UNIT', '', '19DC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2393, '19DC003- DISK CLUTCH ', 'BUAH', '', '19DC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2394, '19DD010- DIES SEMI DIAMOND 4,00', 'BUAH', '', '19DD010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2395, '19DE001- DAMPER ENGINE HOD P/N 52230-23000-71', 'BUAH', '', '19DE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2396, '19DS001- DRIVE SHAFT P/N. 91324-00061', 'BUAH', '', '19DS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2397, '19ET001- END-TEIROD 91423-15301', 'SET', '', '19ET001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2398, '19ET002- END TEIROD 91423-15701', 'SET', '', '19ET002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2399, '19FA001- FORK ASSY (GARPU FORKLIP)', 'UNIT', '', '19FA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2400, '19FC001- FLANGE COUPLE', 'BUAH', '', '19FC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2401, '19FF001- FULL FILTER 16405-V0701', 'BUAH', '', '19FF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2402, '19FF002- FULL FILTER 34462-00300', 'BUAH', '', '19FF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2403, '19FF003- FULL FILTER P/N 2302 - 25 TOYOTA 7FD 3,5', 'BUAH', '', '19FF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2404, '19FHYD1- FILTER HYD P/N 91375-03800', 'BUAH', '', '19FHYD1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2405, '19FR001- FILTER RETURN', 'BUAH', '', '19FR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2406, '19FS001- FILTER SUCTION', 'BUAH', '', '19FS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2407, '19FT001- FORKLIP TOYOTA 3.5 TON', 'UNIT', '', '19FT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2408, '19FW001- FLYWHELL', 'BUAH', '', '19FW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2409, '19GA001- GASKET 07005-01212', 'BUAH', '', '19GA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2410, '19GA002- GASKET 07005-01412', 'BUAH', '', '19GA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2411, '19GA003- GASKET HEAD', 'SET', '', '19GA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2412, '19GR001- GASKER ROCKER P/N. 32A04 - 03200', 'BUAH', '', '19GR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2413, '19GS001- GASKET SET O / H', 'SET', '', '19GS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2414, '19H3005- HOSE P/STEERING 07123-00215 KOMATSU 3,5', 'BUAH', '', '19H3005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2415, '19HA001- HEATHER ANEALING L300*200 220 V 2000 W', 'BUAH', '', '19HA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2416, '19HA002- HOSE ( AIR CLEANER )', 'BUAH', '', '19HA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2417, '19HB001- HOSE BY PASS', 'BUAH', '', '19HB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2418, '19HB002- HOLDER CARBON BRUSH ( BESAR )', 'BUAH', '', '19HB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2419, '19HC001- HOSE CLAMP STEANLESS HS24', 'BUAH', '', '19HC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2420, '19HE001- HOSE 1/2\"*55 CM', 'BUAH', '', '19HE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2421, '19HE002- HOSE RADIATOR ( ATAS ) P/N 3 EC-04-15110', 'BUAH', '', '19HE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2422, '19HE003- HOSE P/N 3EC-04-15110', 'BUAH', '', '19HE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2423, '19HE004- HOSE P/N 3EC-04-15121', 'BUAH', '', '19HE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2424, '19HE006- HOSE P/STEERING 07123-00219 KOMATSU 3,5', 'BUAH', '', '19HE006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2425, '19HF001- HEAD FUEL FILTER P/N. 6202-73-6110', 'BUAH', '', '19HF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2426, '19HG001- HELICAL GEAR Z 44', 'BUAH', '', '19HG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2427, '19HH001- HOSE HYDROULIK', 'BUAH', '', '19HH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2428, '19HO001- HOUSING OUTLET', 'BUAH', '', '19HO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2429, '19HR001- HOSE RETURN P/N 91375-13100', 'BUAH', '', '19HR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2430, '19HR002- HOSE RADIATOR ATAS', 'BUAH', '', '19HR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2431, '19HR003- HOSE RADIATOR BAWAH', 'BUAH', '', '19HR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2432, '19HR004- HOSE RETURN NOZZLE', 'BUAH', '', '19HR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2433, '19HS001- HOSE 91575-00300', 'SET', '', '19HS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2434, '19IS001- INSULATOR', 'BUAH', '', '19IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2435, '19JA001- JOINT ASSY,UNIVERSAL 91571-00050', 'SET', '', '19JA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2436, '19JC001- JOINT COUPLE', 'BUAH', '', '19JC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2437, '19JC002- JOINT COUPLE ASSY', 'BUAH', '', '19JC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2438, '19JU001- JOINT UNIVERSAL ASSY P/N. 91324-00030', 'BUAH', '', '19JU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2439, '19JU002- JOINT UNIVERSAL ASSY P/N. 91324-00061', 'BUAH', '', '19JU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2440, '19KC001- KIT CONTROL VALVE', 'SET', '', '19KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2441, '19KG001- KIT GEAR BOX', 'SET', '', '19KG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2442, '19KP001- KING PIN', 'BUAH', '', '19KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2443, '19KR001- KANVAS REM ( BRAKE SHOC ) 91446-32700', 'BUAH', '', '19KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2444, '19KR002- KANVAS REM ( BRAKE SHOC ) 91446-41100', 'BUAH', '', '19KR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2445, '19KT001- KIT TILT CYLINDER ', 'SET', '', '19KT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2446, '19KV001- KITT VALVE ASSY CONTROL MITSUBISHI FD2,5', 'SET', '', '19KV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2447, '19LS001- LEVER SUB TILTLOCK P/N 45803-23000-71', 'BUAH', '', '19LS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2448, '19LT001- LEM TRIBON', 'TUBE', '', '19LT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2449, '19LT002- LAMPU TEMBAK 12 VOLT', 'BUAH', '', '19LT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2450, '19MB001- METAL BULAN ', 'SET', '', '19MB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2451, '19MC001- MASTER CLUTCH RELEASE', 'BUAH', '', '19MC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2452, '19MD001- METAL DUDUK U,S 0.25', 'SET', '', '19MD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2453, '19MD002- METAL DUDUK 0,50', 'SET', '', '19MD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2454, '19MJ001- METAL JALAN U,S 0.50', 'SET', '', '19MJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2455, '19MJ002- METAL JALAN 0,75', 'SET', '', '19MJ002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2456, '19MR001- MINYAK REM ', 'BOTOL', '', '19MR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2457, '19NG001- NIPLE GREASE', 'BUAH', '', '19NG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2458, '19NG002- NEPLE GREASE P/N F33050-10000', 'BUAH', '', '19NG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2459, '19NJ001- NUT , JAM P/N F2320-10000', 'BUAH', '', '19NJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2460, '19NZ001- NOZZLE + SETTING PRESSURE + RING', 'SET', '', '19NZ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2461, '19OE001- OIL ENGINE', 'LITER', '', '19OE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2462, '19OF002- OIL FILTER ME 004099', 'BUAH', '', '19OF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2463, '19OF003- OIL FILTER ME 069782', 'BUAH', '', '19OF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2464, '19OF004- OIL FILTER J 86-11240', 'BUAH', '', '19OF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2465, '19OF005- OIL FILTER J 86-12100', 'BUAH', '', '19OF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2466, '19OF006- OIL FILTER P/N 1502 - 20 TOYOTA 7FD 3,5', 'BUAH', '', '19OF006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2467, '19OHYD1- OIL HYD', 'LITER', '', '19OHYD1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2468, '19OP001- OIL PUMP', 'BUAH', '', '19OP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2469, '19OR001- O RING P/N 07000-15080', 'BUAH', '', '19OR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2470, '19OR002- O-RING P/N 07000-02120', 'BUAH', '', '19OR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2471, '19OS005- OIL SEAL VB 28*37*6', 'BUAH', '', '19OS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2472, '19OT001- OIL TRANSMISSION', 'LITER', '', '19OT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2473, '19PB001- PIN BELL CRANK P/N 91243-05400', 'BUAH', '', '19PB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2474, '19PB002- PIN BELL CRANK P/N. 3EC-24-11340', 'BUAH', '', '19PB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2475, '19PC001- PLAT COUPLING', 'BUAH', '', '19PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2476, '19PC002- PACKING P/N 3EC-64-13220', 'BUAH', '', '19PC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2477, '19PC003- PACKING CARTER', 'BUAH', '', '19PC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2478, '19PE001- PELUK UK. 600 x 9 6 HOLE', 'BUAH', '', '19PE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2479, '19PG001- PLUG GLOW', 'BUAH', '', '19PG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2480, '19PK001- PIN KING 3 EC-24-11230', 'BUAH', '', '19PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2481, '19PK002- PIN KING P/N 91443-20600', 'BUAH', '', '19PK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2482, '19PL001- PLATE P/N 304-01-31150', 'BUAH', '', '19PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2483, '19PP001- PIN PISTON', 'BUAH', '', '19PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2484, '19PP002- PIPE 6206-71-5810', 'BUAH', '', '19PP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2485, '19PP003- PIPE 3 EC-38-12211', 'BUAH', '', '19PP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2486, '19PP004- PANTEK PLAT COUPLING', 'BUAH', '', '19PP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2487, '19PS001- PIN SPRING P/N F2850-08050', 'BUAH', '', '19PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2488, '19PT001- PALTE THRUST STD', 'SET', '', '19PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2489, '19PT002- PLUGH TIGHT P/N 96411-11400-71', 'BUAH', '', '19PT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2490, '19PT003- PLUG', 'BUAH', '', '19PT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2491, '19RB001- RING BACK UP P/N 07001-05080', 'BUAH', '', '19RB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2492, '19RB003- RUBBER P/N 304-01-31130', 'BUAH', '', '19RB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2493, '19RB004- RUBBER P/N 304-01-31140', 'BUAH', '', '19RB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2494, '19RC001- RELEASE CLUTCH ASSY', 'BUAH', '', '19RC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2495, '19RD001- RADIATOR P/N 91301-00300', 'BUAH', '', '19RD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2496, '19RH001- RUBBER HOSE 1 1/4\"', 'MTR', '', '19RH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2497, '19RN001- RUMAH ( INJECTOR ) NOZZLE', 'BUAH', '', '19RN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2498, '19RS001- RING SET PISTON STD', 'SET', '', '19RS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2499, '19SA001- SEAL P/N 3EC-14-11130', 'BUAH', '', '19SA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2500, '19SA002- STATER ASSY P/N 28100-40291-71', 'BUAH', '', '19SA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2501, '19SC001- SOK COUPLE ', 'BUAH', '', '19SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2502, '19SD001- SEAL DUST P/N 3EC-64-1323', 'BUAH', '', '19SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2503, '19SE001- SUPPORT ENGINE 91213-12200', 'BUAH', '', '19SE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2504, '19SF001- STAINER P/N. 34B-66-15180', 'BUAH', '', '19SF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2505, '19SH001- SHIM 3 EC-24-11230', 'BUAH', '', '19SH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2506, '19SH002- SELANG HYROULIK + NEPLE', 'BUAH', '', '19SH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2507, '19SH003- SHIM P/N 304-01-31160', 'BUAH', '', '19SH003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2508, '19SK001- SEAL KIT P/N 94204-10120', 'BUAH', '', '19SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2509, '19SK002- SOKET KET', 'BUAH', '', '19SK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2510, '19SK003- SAKLAR TARIK', 'BUAH', '', '19SK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2511, '19SL001- SELANG 1/4\"', 'BUAH', '', '19SL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2512, '19SL002- SWLANG 5/8\"', 'METER', '', '19SL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2513, '19SL003- SELANG 50 CM + NEPLE', 'BUAH', '', '19SL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2514, '19SO001- SEAL OIL P/N 07012-0095', 'BUAH', '', '19SO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2515, '19SO002- SEAL OIL P/N 3EB-13-12470', 'BUAH', '', '19SO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2516, '19SR001- SWIT REM 12 VOLT', 'BUAH', '', '19SR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2517, '19SS001- SWIT STATER', 'BUAH', '', '19SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2518, '19ST001- SWITCH TEMPERATUR ', 'BUAH', '', '19ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2519, '19TG001- TALI GAS/CABLE GAS', 'BUAH', '', '19TG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2520, '19TR001- TIEROD , END P/N 91243-15301', 'BUAH', '', '19TR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2521, '19TR002- TIEROD , END P/N 91243-15701', 'BUAH', '', '19TR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2522, '19VB001- V - BELT', 'BUAH', '', '19VB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2523, '19VB034- VANBELT 3450-12.5*1175 LA', 'BUAH', '', '19VB034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2524, '19WA001- WIRE ASSY FORWARD P/N. 33570-23420-71', 'BUAH', '', '19WA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2525, '19WA002- WIRE ASSY P/N. 33580-23420-71', 'BUAH', '', '19WA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2526, '19WP001- WATER PUMP', 'UNIT', '', '19WP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2527, '19WP002- WATER PUMP P/N 16100-78300-71', 'BUAH', '', '19WP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2528, '19WS001- WASHER', 'BUAH', '', '19WS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2529, '19WS002- WASHER', 'BUAH', '', '19WS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2530, '19WS003- WASHER P/N 91443-03100', 'BUAH', '', '19WS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2531, '19WS004- WASHER P/N 64343-44200', 'BUAH', '', '19WS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2532, '20BD001- BETADINE 30ML', 'BTL', '', '20BD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2533, '20BK001- BODREK', 'DUS', '', '20BK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2534, '20BM001- BODREX MIGRAN', 'PAPAN', '', '20BM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2535, '20BP001- BIOPLACENTON', 'BOX', '', '20BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2536, '20DD001- DIE DA YAO JING', 'BTL', '', '20DD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2537, '20DG001- DECOLGEN', 'PAPAN', '', '20DG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2538, '20EN001- ENTROSTOP', 'DUS', '', '20EN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2539, '20HS001- HANSAPLAS', 'BKS', '', '20HS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2540, '20IS001- INSIDAL', 'STRIP', '', '20IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2541, '20KC001- KOYO CABE', 'PAK', '', '20KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2542, '20KD001- KONIDIN', 'PAPAN', '', '20KD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2543, '20KM001- KOMIX', 'DUS', '', '20KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2544, '20KS001- KOYO SALONPAS', 'BKS', '', '20KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2545, '20MK001- MINYAK KAYU PUTIH CAP LANG 60ML', 'BTL', '', '20MK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2546, '20MT001- MINYAK TAWON', 'BTL', '', '20MT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2547, '20NR001- NEURALGIN', 'DUS', '', '20NR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2548, '20NR002- NEO RHEUMACYL', 'STRIP', '', '20NR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2549, '20NR003- NEURALGIN', 'STRIP', '', '20NR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2550, '20PC001- PO CAI PIL', 'DUS', '', '20PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2551, '20PC002- PROCOLD', 'PAPAN', '', '20PC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2552, '20PD001- PANADOL BIRU', 'STRIP', '', '20PD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2553, '20PD002- PANADOL HIJAU', 'STRIP', '', '20PD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2554, '20PD003- PANADOL MERAH', 'STRIP', '', '20PD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2555, '20PG001- PROMAG', 'DUS', '', '20PG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2556, '20PN001- PONSTAN', 'PAPAN', '', '20PN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2557, '20PX001- PARAMEX', 'PAPAN', '', '20PX001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2558, '20TA001- TOLAK ANGIN CAIR', 'DUS', '', '20TA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2559, '20TB001- TOBROSON', 'STRIP', '', '20TB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2560, '20TT001- TIEH TA YAU GIN', 'BTL', '', '20TT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2561, '21AM001- AMPER METER PANEL UK. 96 X 96 ( 0 - 75 A ', 'BUAH', '', '21AM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2562, '21BA001- BALLAST TL 10 WATT PHILIPS', 'BUAH', '', '21BA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2563, '21BA002- BALLAST TL 20 WATT PHILIPS', 'BUAH', '', '21BA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2564, '21BH001- BOHLAM HOLOGEN', 'BUAH', '', '21BH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2565, '21BL001- BALLAST ELECTRIC ( EBE 1*36) PHILIPS', 'BUAH', '', '21BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2566, '21BL002- BALLAST ELECTRIC ( EBE 2*36) PHILIPS', 'BUAH', '', '21BL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2567, '21BO001- BOHLAM TL 10 WATT PHILIPS', 'BUAH', '', '21BO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2568, '21BO002- BOHLAM TL 20 WATT PHILIPS', 'BUAH', '', '21BO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2569, '21BO003- BOHLAM TL 40 WATT PHILIPS', 'BUAH', '', '21BO003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2570, '21BO004- BOHLAM MERCURY 400 WATT', 'BUAH', '', '21BO004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2571, '21BO005- BOHLAM 24 VOLT', 'BUAH', '', '21BO005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2572, '21CO001- CHANGE OVER SWITCH 4 POLE 630A SOCOMEC', 'BUAH', '', '21CO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2573, '21CP001- CAPASITOR 10 MF/400VAC', 'BUAH', '', '21CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2574, '21CP002- CAPASITOR 12 MF BQ 28', 'BUAH', '', '21CP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2575, '21ES001- EMERGENCY SWITCH 30 MM IDEC', 'BUAH', '', '21ES001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2576, '21FL001- FITTING LAMPU DOWN LIGHT 5\'', 'SET', '', '21FL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2577, '21FL002- FITTING LAMPU PLAPON', 'BUAH', '', '21FL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2578, '21FR001- FLOATLES RELAY OMRON 61F-G-AP ', 'BUAH', '', '21FR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2579, '21HF001- HOLDER FUSE BATU NH 00 125 A', 'BUAH', '', '21HF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2580, '21IB001- ISOLASI BAKAR KABEL 95 MM', 'MTR', '', '21IB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2581, '21JK001- JOINTING KABEL 95 MM', 'BUAH', '', '21JK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2582, '21KA001- KABEL NYM 3 x 1,5', 'METER', '', '21KA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2583, '21KA002- KABEL NYM 2 x 1,5', 'METER', '', '21KA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2584, '21KK002- KLEM KABEL NO. 10', 'PAK', '', '21KK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2585, '21KK003- KLEM KABEL NO.8', 'PAK', '', '21KK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2586, '21KW001- KWH METER + CT', 'UNIT', '', '21KW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2587, '21LA001- LAMPU E 40/85 WATT SINYOKU', 'BUAH', '', '21LA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2588, '21LA002- LAMPU PIJAR', 'BUAH', '', '21LA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2589, '21LA003- LAMPU TL 10 WATT', 'SET', '', '21LA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2590, '21LA004- LAMPU DOWN LIGHT PL-5 2P PHILIPS', 'BUAH', '', '21LA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2591, '21LA005- LAMPU KEONG E 27/40 WATT SINYOKU', 'BUAH', '', '21LA005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2592, '21LA006- LAMPU TL 40 WATT PHILIP', 'SET', '', '21LA006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2593, '21LA007- LAMPU ESSENTIAL HE 11 WATT PHILIP', 'BUAH', '', '21LA007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2594, '21LB001- LAMPU BESAR', 'BUAH', '', '21LB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2595, '21LB002- LAMPU B9 6,3V - 1W', 'BUAH', '', '21LB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2596, '21LC001- LAMPU COOL DAYLIGHT ', 'BUAH', '', '21LC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2597, '21LE001- LAMPU E10 LED 24V - 4', 'BUAH', '', '21LE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2598, '21LE002- LAMPU E12 24V - 0 11A', 'BUAH', '', '21LE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2599, '21LI004- LIMIT SWITCH CAMSCO AZ-8104', 'BUAH', '', '21LI004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2600, '21LK001- LAMPU KEONG E40 / 88 WATT HANOG', 'BUAH', '', '21LK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2601, '21LK002- LAMPU KEONG E27 / 88 WATT', 'BUAH', '', '21LK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2602, '21LLED4- LAMPU LED 4 WATT', 'BUAH', '', '21LLED4', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2603, '21LLED6- LAMPU LED 6 WATT', 'BUAH', '', '21LLED6', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2604, '21LP001- LAMPU PL-S 11 WATT PHILIP', 'BUAH', '', '21LP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2605, '21LP002- LAMPU PL-S 9 WATT PHILIP', 'BUAH', '', '21LP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2606, '21MC001- MCB 1P/10 A', 'BUAH', '', '21MC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2607, '21MC002- MCB 32 AMPER / 3 PHASE', 'BUAH', '', '21MC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2608, '21MC003- MCB 1 P/ 16 A', 'BUAH', '', '21MC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2609, '21MC004- MCB 1P/4 A', 'BUAH', '', '21MC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2610, '21MC005- MCB 1 P/25A', 'BUAH', '', '21MC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2611, '21MC006- MCB 1 P/ 6 A', 'BUAH', '', '21MC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2612, '21MC007- MCB 2 P / 4 A', 'BUAH', '', '21MC007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2613, '21PA001- PIPA PVC 20 MM', 'BTG', '', '21PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2614, '21RO001- RELAY OMRON MK3P-I COIL 220 VAC', 'BUAH', '', '21RO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2615, '21RO002- RELAY OMRON MK 2P-1 220 VAC', 'BUAH', '', '21RO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2616, '21SE001- SAKLAR ENGKEL', 'SET', '', '21SE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2617, '21SS002- STECKER + STOP CONTAC ELEGRAN 32A 4 PIN', 'SET', '', '21SS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2618, '21SS003- STECKER + STOP CONTAC ELEGRAN 32A / 4PIN', 'SET', '', '21SS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2619, '21SW001- SELECTOR SWITCH 30 MM IDEC', 'BUAH', '', '21SW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2620, '21TD001- TEDOS ( 3 LUBANG )', 'BUAH', '', '21TD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2621, '21VM001- VOLT METER PANEL UK. 96 X 96 ( 0 - 500 VA', 'BUAH', '', '21VM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2622, '2201BP7- BOBIN PLASTIK 7\"(BEKAS)', 'BUAH', '', '2201BP7', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2623, '22BB001- BOBIN BESI 12\" ( BEKAS )', 'BUAH', '', '22BB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2624, '22BB002- BOBIN BESI 22 \" ( BEKAS )', 'BUAH', '', '22BB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2625, '22BB003- BOBIN 1200 MM', 'BUAH', '', '22BB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2626, '22BB004- BOBIN BESI O 600 MM', 'BUAH', '', '22BB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2627, '22BP001- BOBIN PLASTIK 5\" ( BARU )', 'BUAH', '', '22BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2628, '22BP002- BOBIN PLASTIC 5 \" (BEKAS)', 'BUAH', '', '22BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2629, '22BPB01- BOBIN PLASTIK BEKAS 10 \"', 'BUAH', '', '22BPB01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2630, '22BPB10- BOBIN PLASTIK BEKAS 8 \"', 'BUAH', '', '22BPB10', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2631, '23ACD01- ALAT CEK DARAH', 'BUAH', '', '23ACD01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2632, '23BL001- BENDERA LAMBANG KESEHATAN ( JAMSOSTEK)', 'LBR', '', '23BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2633, '23GR001- GUNTING RUMPUT', 'BUAH', '', '23GR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2634, '23KP001- KAIN PEL + GAGANG', 'BUAH', '', '23KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2635, '23SH001- SAPU HIJUK', 'BUAH', '', '23SH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2636, '23TKR01- TIRAI KAYU', 'SET', '', '23TKR01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2637, '23TTP01- TUKAR TAMBAH POMPA SANYO', 'UNIT', '', '23TTP01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2638, '25S0001- SUSUT', 'KG', '', '25S0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2639, '26A0001- AIR ACID (SULFURIC ACID)', 'DRUM', '', '26A0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2640, '26A0002- ALUMUNIUM', 'KG', '', '26A0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2641, '26A0003- AFKIRAN RONGSOK', 'KG', '', '26A0003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2642, '26B0001- BOBIN PLASTIK BEKAS', 'KG', '', '26B0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2643, '26B0002- BESI BEKAS', 'KG', '', '26B0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2644, '26B0003- BAN BEKAS', 'PCS', '', '26B0003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2645, '26B0004- SERPIHAN BATU APOLLO', 'KG', '', '26B0004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2646, '26D0001- DEBU / BS SORTIR', 'KG', '', '26D0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2647, '26D0002- DRUM BEKAS', 'PCS', '', '26D0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2648, '26J0001- JERIGEN BEKAS', 'PCS', '', '26J0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2649, '26K0001- KULIT PVC', 'KG', '', '26K0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2650, '26K0002- KARDUS BEKAS', 'KG', '', '26K0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2651, '26K0003- KULIT PE ( DROP WIRE )', 'KG', '', '26K0003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2652, '26K0004- KULIT ISOLASI CU', 'KG', '', '26K0004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2653, '26K0005- KARUNG BEKAS', 'TRUK', '', '26K0005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2654, '26K0006- KULIT JFTA', 'KG', '', '26K0006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2655, '26K0007- KULIT XLPE', 'KG', '', '26K0007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2656, '26M0001- MESIN BEKAS', 'UNIT', '', '26M0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2657, '26O0001- OLIE BEKAS', 'DRUM', '', '26O0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2658, '26PE001- PALET EX TMS', 'BUAH', '', '26PE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2659, '26R0001- RONGSOKAN AC BEKAS', 'UNIT', '', '26R0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2660, '26S0001- SENG BEKAS', 'KG', '', '26S0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2661, '26S0002- SENG ULIR', 'KG', '', '26S0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2662, '26S0003- BAJA BEKAS', 'KG', '', '26S0003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2663, '27AJ001- ANGLE JOINT', 'BUAH', '', '27AJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2664, '27BA001- BAUT ANGLE JOINT', 'BUAH', '', '27BA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2665, '27BC001- BUSHING CON ROD', 'BUAH', '', '27BC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2666, '27BC002- BEARING CON ROD STD', 'BUAH', '', '27BC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2667, '27BR001- BUSHING ROCKER ARM', 'BUAH', '', '27BR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2668, '27CB001- CONTROL BEARING', 'BUAH', '', '27CB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2669, '27CS001- CENTRING SLEEVE', 'BUAH', '', '27CS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2670, '27CS002- CLEM STEANLES 3 1/2\"', 'BUAH', '', '27CS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2671, '27CS003- CLEM STEANLES 2 1/2\"', 'BUAH', '', '27CS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2672, '27FF001- FUEL FILTER KX44', 'BUAH', '', '27FF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2673, '27GK001- GASKET KIT OVERHOUL', 'SET', '', '27GK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2674, '27GK002- GASKET KIT OIL COOLER', 'SET', '', '27GK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2675, '27GK003- GASKET KIT OFFER COOLER', 'SET', '', '27GK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2676, '27GK004- GASKET KIT GENERAL OVERHAUL', 'SET', '', '27GK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2677, '27GV001- GUIDE VALVE INLET', 'BUAH', '', '27GV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2678, '27GV002- GUIDE VALVE EXHAUST', 'BUAH', '', '27GV002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2679, '27GV003- GUIDE VALVE', 'BUAH', '', '27GV003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2680, '27HH001- HOSE HYDROULIK 1/4 \" X 1 MTR', 'BUAH', '', '27HH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2681, '27HH002- HOSE HYDROULIK 1/2 \" X 130 CM', 'BUAH', '', '27HH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2682, '27HP001- HAND PUMP SOLAR', 'UNIT', '', '27HP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2683, '27IS001- INSERT /SETTING INLET', 'BUAH', '', '27IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2684, '27IS002- INSERT /SETTING EXHAUST', 'BUAH', '', '27IS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2685, '27LN001- LINER', 'BUAH', '', '27LN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2686, '27LP001- LAS PIPA AIR', 'BUAH', '', '27LP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2687, '27MB001- MAIN BEARING STD+METAL BULAN', 'SET', '', '27MB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2688, '27MB002- MAIN BEARING', 'BUAH', '', '27MB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2689, '27NZ001- NOZZLE', 'BUAH', '', '27NZ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2690, '27OF001- OIL FILTER OX 69 D', 'BUAH', '', '27OF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2691, '27OG001- ORING GREEN KECIL', 'BUAH', '', '27OG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2692, '27OH001- ORING HIJAU 88 X 8', 'BUAH', '', '27OH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2693, '27OI001- ORING INJEK PUMP', 'BUAH', '', '27OI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2694, '27OL001- ORING LINER BESAR', 'BUAH', '', '27OL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2695, '27OL002- ORING LINER KECIL ', 'BUAH', '', '27OL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2696, '27OM001- ORING MERAH 62 X 8', 'BUAH', '', '27OM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2697, '27OP001- OIL PUMP P/N. D4231810120', 'UNIT', '', '27OP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2698, '27OR001- ORING RED BESAR', 'BUAH', '', '27OR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2699, '27OS001- OIL JET/JET SPRAY', 'BUAH', '', '27OS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2700, '27PC001- PACKING', 'BUAH', '', '27PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2701, '27PL001- PLC UNIT', 'UNIT', '', '27PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2702, '27PO001- PACKING OVAL', 'BUAH', '', '27PO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2703, '27PT001- PACKING TOMBO 1 mm', 'MTR', '', '27PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2704, '27RK001- REPAIR KIT TURBO', 'BUAH', '', '27RK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2705, '27RP001- RING PISTON', 'BUAH', '', '27RP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2706, '27SC001- SEAL CACING ', 'BUAH', '', '27SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2707, '27SC002- SEAL CRANKSHAFT FRONT / REAR', 'SET', '', '27SC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2708, '27SL001- SEAL LEHER INJEK PUMP', 'BUAH', '', '27SL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2709, '27SL002- SHIM LINER', 'BUAH', '', '27SL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2710, '27SL003- SEAL LINNER', 'BUAH', '', '27SL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2711, '27SO001- SLANG OVER FLOW', 'MTR', '', '27SO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2712, '27SO002- SENDING OIL PRESSURE', 'BUAH', '', '27SO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2713, '27SP001- SEAL PIPA TURBO', 'BUAH', '', '27SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2714, '27SP002- SHIM PER KLEP ', 'BUAH', '', '27SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2715, '27SS001- SELANG SOLAR', 'BUAH', '', '27SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2716, '27ST001- SPEASER / SIM TEMBAGA', 'BUAH', '', '27ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2717, '27SV001- SETTING VALVE EXHAUST', 'BUAH', '', '27SV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2718, '27VC001- VALVE COLLET / LOCK VALVE', 'BUAH', '', '27VC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2719, '27VE001- VALVE EXHAUST', 'BUAH', '', '27VE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2720, '27VI001- VALVE INLET', 'BUAH', '', '27VI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart_old`
--

CREATE TABLE `sparepart_old` (
  `id` int(11) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `alias` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sparepart_old`
--

INSERT INTO `sparepart_old` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'BUSI', 'BUAH', '', '', '2018-01-24 09:01:23', 1, '2018-01-24 09:01:23', 1),
(2, 'BAN', 'BUAH', '', '', '2018-01-24 09:01:38', 1, '2018-01-24 09:01:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spb`
--

CREATE TABLE `spb` (
  `id` int(11) NOT NULL,
  `no_spb` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `produksi_ingot_id` int(11) NOT NULL,
  `jenis_barang` int(11) NOT NULL,
  `id_apolo` int(11) NOT NULL,
  `module` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0',
  `approved` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  `rejected` datetime NOT NULL,
  `rejected_by` int(11) NOT NULL,
  `reject_remarks` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spb`
--

INSERT INTO `spb` (`id`, `no_spb`, `tanggal`, `produksi_ingot_id`, `jenis_barang`, `id_apolo`, `module`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `reject_remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(12, 'SPB.04102018.0004', '2018-10-04', 14, 2, 0, '', '', 1, '2018-10-15 02:10:42', 1, '2018-10-01 00:00:00', 0, '', '2018-10-04 10:10:58', 1, '2018-10-04 10:10:58', 1),
(13, 'SPB.15102018.0001', '2018-10-15', 17, 2, 0, '', '', 1, '2018-10-15 04:10:49', 1, '0000-00-00 00:00:00', 0, '', '2018-10-15 04:10:26', 1, '2018-10-15 04:10:26', 1),
(14, 'SPB.16102018.0001', '2018-10-16', 18, 2, 0, '', '', 1, '2018-10-16 12:10:12', 1, '0000-00-00 00:00:00', 0, '', '2018-10-16 11:10:06', 1, '2018-10-16 11:10:06', 1),
(15, 'SPB.16102018.0002', '2018-10-16', 20, 2, 0, '', '', 1, '2018-10-16 01:10:18', 1, '0000-00-00 00:00:00', 0, '', '2018-10-16 11:10:13', 1, '2018-10-16 11:10:13', 1),
(16, 'SPB.16102018.0003', '2018-10-16', 21, 2, 0, '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-10-16 11:10:18', 1, '2018-10-16 11:10:18', 1),
(17, 'SPB.16102018.0004', '2018-10-16', 22, 2, 0, '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-10-16 11:10:24', 1, '2018-10-16 11:10:24', 1),
(18, 'SPB.31102018.0001', '2018-10-31', 24, 2, 0, '', 'DIKIRIM UNTUK PRODUKSI', 1, '2018-10-31 03:10:49', 1, '0000-00-00 00:00:00', 0, '', '2018-10-31 10:10:04', 1, '2018-10-31 10:10:04', 1),
(19, 'SPB.31102018.0002', '2018-10-31', 25, 6, 0, '', 'TAMBAH STOK', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-10-31 03:10:31', 1, '2018-10-31 03:10:31', 1),
(20, 'SPB.31102018.0003', '2018-10-31', 26, 5, 0, '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-10-31 04:10:12', 1, '2018-10-31 04:10:12', 1),
(21, 'SPB.01112018.0001', '2018-11-01', 27, 2, 0, '', '', 1, '2018-11-01 03:11:18', 1, '0000-00-00 00:00:00', 0, '', '2018-11-01 03:11:32', 1, '2018-11-01 03:11:32', 1),
(22, 'SPB.12112018.0001', '2018-11-12', 28, 6, 0, '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-11-12 04:11:58', 1, '2018-11-12 04:11:58', 1),
(23, 'SPB.22112018.0001', '2018-11-22', 29, 14, 0, '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-11-22 02:11:27', 1, '2018-11-22 02:11:27', 1),
(24, 'SPB.22112018.0002', '2018-11-22', 30, 2, 0, '', '', 1, '2018-11-23 01:11:41', 1, '0000-00-00 00:00:00', 0, '', '2018-11-22 02:11:05', 1, '2018-11-22 02:11:05', 1),
(25, 'SPB.23112018.0001', '2018-11-23', 32, 2, 0, '', '', 1, '2018-11-23 01:11:31', 1, '0000-00-00 00:00:00', 0, '', '2018-11-23 01:11:59', 1, '2018-11-23 01:11:59', 1),
(26, 'SPB.23112018.0002', '2018-11-23', 33, 12, 0, '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-11-23 01:11:10', 1, '2018-11-23 01:11:10', 1),
(27, 'SPB.27112018.0001', '2018-11-27', 35, 2, 0, '', '', 1, '2018-11-27 11:11:40', 1, '0000-00-00 00:00:00', 0, '', '2018-11-27 11:11:37', 1, '2018-11-27 11:11:37', 1),
(28, 'SPB.27112018.0002', '2018-11-27', 36, 164, 0, '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-11-27 12:11:11', 1, '2018-11-27 12:11:11', 1),
(29, 'SPB.201811.0001', '2018-11-29', 38, 50, 1, '', 'TEST', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-11-29 07:11:47', 1, '2018-11-29 07:11:47', 1),
(30, 'SPB.201811.0002', '2018-11-29', 40, 6, 2, '', 'TJJHO', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-11-29 07:11:27', 1, '2018-11-29 07:11:27', 1),
(31, 'SPB-RSK.201812.0002', '2018-12-03', 0, 1, 0, '', 'SALES ORDER RONGSOK', 1, '2018-12-04 02:12:07', 1, '0000-00-00 00:00:00', 0, '', '2018-12-03 04:12:59', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spb_detail`
--

CREATE TABLE `spb_detail` (
  `id` int(11) NOT NULL,
  `spb_id` int(11) NOT NULL,
  `produksi_ingot_detail_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `flag_skb` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spb_detail`
--

INSERT INTO `spb_detail` (`id`, `spb_id`, `produksi_ingot_detail_id`, `rongsok_id`, `qty`, `line_remarks`, `flag_skb`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(19, 12, 17, 1, 28, 'coba', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 12, 18, 2, 33, 'keterangan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 13, 21, 2, 50, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 13, 22, 1, 20, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 14, 23, 1, 25, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 15, 24, 2, 20, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 15, 25, 1, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 16, 26, 2, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 16, 27, 1, 15, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 17, 28, 1, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 17, 29, 2, 5, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 18, 31, 2, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 19, 32, 2, 5, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 20, 33, 1, 5, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 21, 34, 2, 5, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 22, 35, 1, 8, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 23, 36, 34, 5, 'BUTUH BCW 1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 23, 37, 41, 10, 'BUTUH BCW 0,85', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 24, 38, 1, 15, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 25, 39, 1, 90, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 25, 40, 2, 100, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 26, 41, 9, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 26, 42, 34, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 26, 43, 1, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 26, 44, 58, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 26, 45, 2, 10, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 27, 46, 2, 50, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 28, 47, 1, 70, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 29, 48, 18, 32, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 29, 49, 57, 33, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 30, 50, 32, 9, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 30, 51, 50, 7, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 31, 0, 9, 25, 'SALES ORDER', 0, '2018-12-04 02:12:12', 1, '0000-00-00 00:00:00', 0),
(57, 31, 0, 10, 50, 'SALES ORDER', 0, '2018-12-04 02:12:28', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spb_detail_fulfilment`
--

CREATE TABLE `spb_detail_fulfilment` (
  `id` int(11) NOT NULL,
  `spb_id` int(11) NOT NULL,
  `dtr_detail_id` int(11) NOT NULL,
  `ttr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spb_detail_fulfilment`
--

INSERT INTO `spb_detail_fulfilment` (`id`, `spb_id`, `dtr_detail_id`, `ttr_id`) VALUES
(5, 12, 46, 38),
(8, 12, 58, 44),
(9, 12, 57, 44),
(10, 13, 50, 39),
(11, 13, 53, 0),
(12, 14, 56, 43),
(13, 15, 47, 38),
(14, 15, 49, 39),
(15, 18, 59, 0),
(16, 21, 68, 46),
(17, 25, 71, 47),
(18, 25, 88, 51),
(19, 24, 76, 48),
(20, 27, 84, 48),
(21, 31, 116, 64),
(22, 31, 118, 66);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stok_fg`
-- (See below for the actual view)
--
CREATE TABLE `stok_fg` (
`jenis_barang_id` int(11)
,`jenis_barang` varchar(50)
,`total_qty` bigint(21)
,`total_netto` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stok_sparepart`
-- (See below for the actual view)
--
CREATE TABLE `stok_sparepart` (
`id` int(11)
,`nama_produk` varchar(100)
,`total_bruto_masuk` decimal(32,0)
,`total_netto_masuk` decimal(32,0)
,`total_bruto_keluar` decimal(32,0)
,`total_netto_keluar` decimal(32,0)
,`stok_bruto` decimal(33,0)
,`stok_netto` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stok_wip`
-- (See below for the actual view)
--
CREATE TABLE `stok_wip` (
`jenis_barang_id` int(11)
,`jenis_barang` varchar(50)
,`total_qty_in` decimal(32,0)
,`total_qty_out` decimal(32,0)
,`total_berat_in` decimal(32,0)
,`total_berat_out` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(150) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `m_province_id` int(11) NOT NULL,
  `m_city_id` int(11) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `m_bank_id` int(11) NOT NULL,
  `kcp` varchar(50) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `pic`, `telepon`, `hp`, `alamat`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'ANUGERAH JAYA', 'ISKANDAR', '', '087880813732', 'SLIPI - JAKARTA BARAT', 1, 3, '32152', 3, 'SLIPI JAYA', '200901', '', '2018-01-24 08:01:28', 1, '2018-01-24 08:01:28', 1),
(2, 'BAHRUN LOGISTIK', 'YAHYA KURNIAWAN', '', '087880813730', 'SUNTER - JAKARTA UTARA', 9, 6, '32100', 4, 'SUNTER', '200901', '', '2018-01-24 08:01:32', 1, '2018-01-24 08:01:32', 1),
(3, 'A001- ANUGRAH LESTARI, P.T.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'A002- ATLAS COPCO, P.T.', 'FINANI', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'A003- ANEKA KABEL ELECTRICT, P.T.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'A004- ADHINUSA LESTARI JAYA', 'SONNY', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'A005- ASTRAGRAPHIA, P.T.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'A006- ALIF SEJAHTERA', 'IBU SRIYANI ', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'A007- ATIKA', 'YONGKI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'A008- ALAM JAYA', 'ALAM', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'A009- ARIES KABEL', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'A010- ALCARINDO PRIMA, P.T.', 'FINANI', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'A011- AKRAM', 'BP. ORLIKON', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'A012- AKUN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'A013- AMAN ABADI ', 'S. ANWAR', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'A014- ALIONG', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'A015- AWI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'A016- ANTONY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 'A017- ASNAWI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'A018- ABENG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'A019- ARMAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'A020- ASUI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'A021- AMIR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'A022- ARIF', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 'A023- ANTONO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'A024- AGUS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'A025- ASUNG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'A026- AFONG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'A027- AMANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 'A028- ALVIN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'A029- ANUGRAH MEGA TERATAI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 'A030- ANGSANA PUTERA MAKMUR, P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 'A031- ARI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'A032- AYUNG', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'A033- ANUGRAH PUTRA CEMERLANG', 'BP. SUMARYOTO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'A034- ARIFIN', 'BP. ARIFIN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'A035- AGUSALIM', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'A036- ANWAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'A037- ASBUN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 'A038- AMAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 'A039- AHONG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 'A040- ARYATAMA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 'A041- ANTONIUS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 'A042- AKBAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 'A043- ALEX', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 'A044- ANTON', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 'A045- ANJAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 'A046- ANTORO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 'A047- ATEX', 'IBU SOETIASEM', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 'A048- ALUNG', 'BP. ALUNG', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 'A049- ARIFIN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 'A050- ASMAMAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, 'A051- ABADI BARU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, 'A052- ASENG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 'A053- AGUS SURYANA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 'A054- ANDRY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, 'A055- ANDICO LESTARI MANDIRI', 'ANWARDI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, 'A057- ALFA TEKNIK', 'BP. DEDI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, 'A058- ALFA DATA COMPUTER', 'BP. AKWET', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 'A059- ALFRES', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 'A060- ANAS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 'A061- ANWAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 'A062- ABDUL SUKUR', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 'A063- AWIE', 'BP. AWIE', '', '', 'SUNTER\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 'A072- AKA. P. T', 'DEDE', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 'A073- ASIKIN ', '', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 'A074- ARIKO LOGAM', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, 'A075- AGUS PURWOKERTO', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 'A076- ANDI MERI S.', 'ANDI', '', '', 'BANDUNG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 'A077- ALDO TOKO', 'IBU VINA', '', '', 'PUSAT GROSIR PASAR PAGI MANGGA DUA LT DASAR BLOK D 002B JAKARTA UTARA 14430\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 'A078- ABU', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 'A079- ADI LOGAM , UD', 'ADI PUTRA S.', '', '', 'CIBINONG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 'A080- ATLANTIK', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, 'A081- ABDUL ROHMAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, 'A082- ASMOYASARI JAYA, UD', 'H. ARSIK', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, 'A083- ASTRA INTERNATIONAL TBK, PT.', 'BAPAK MARIANTO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, 'A084- AYUB KUSUMA', 'AYUB', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, 'A085- ANWAR SUPRIYANTO', '', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, 'A086- ALPO SEJAHTERA, PT.', '', '', '', 'PECENONGAN RAYA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, 'A087- AKANG', 'AKANG', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, 'A088- AMENG', '', '', '', 'PEKAN BARU\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, 'A090- AYONG', '', '', '', 'MEDAN\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, 'A091- A BOK', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, 'A092- ANDI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, 'A093- ANTO', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(86, 'A094- ANGGA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(87, 'A095- AULIA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(88, 'A096- ANWAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(89, 'A888- ADJUSMENT', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(90, 'A999- APOLLO', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(91, 'B001- BARA LOGAM, P.T.', 'HALIM', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(92, 'B002- BONA INDAH', '', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(93, 'B003- BENGKEL TJOKRO, P.T.', 'NANDANG', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(94, 'B004- BANGKA JAYA TEKNIK', 'AMIAW', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(95, 'B005- BENGKEL BUBUT BUDAYA', 'BP. EDO, IBU AMYLIA', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(96, 'B006- BANDUNG', 'BP. MINTARDJA SALIM', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(97, 'B007- BAMBANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(98, 'B008- BAHRUDIN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(99, 'B009- BERKAT PARAM BAKTI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(100, 'B010- BUDIONO', 'BUDIONO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(101, 'B011- BUANA BINTANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(102, 'B012- BERDIKARI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(103, 'B013- BERINDO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(104, 'B014- BUDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(105, 'B015- BAHRI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(106, 'B016- BUDINATA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(107, 'B017- BAJA ABADI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(108, 'B018- BAYU', 'ERWIN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(109, 'B019- BICC BERCA CABLES, P.T', 'ANDRE', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(110, 'B020- BINTANG BARU', 'ANDI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(111, 'B021- BAJA MAS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(112, 'B022- BINTANG MAS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(113, 'B023- BUDIONO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(114, 'B024- BUDI LOGAM', 'BP. ASUN/SONI', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(115, 'B025- BENI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(116, 'B026- BANGUN JAYA', 'BP. AKIONG', '', '', '\nCIKARANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(117, 'B029- BUANA SUKSES BERSAMA, P. T.', 'IBU NADINE', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(118, 'B030- BEST SUN INDONESIA PT', 'LINCE/DEWI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(119, 'B031- BRONZEDIOR DAYA MANDIRI', 'NITA/OMAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(120, 'B032- BENGKEL ENDAH', 'JOY SANJAYA', '', '', 'BANDUNG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(121, 'B033- BENGKEL SHANGHAI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(122, 'B034- BANGKIT TRI FAMILY, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(123, 'B035- BINTANG SERAYU, C. V', 'BPK DIDI', '', '', 'TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(124, 'B036- BAROKAH MANDIRI LOGAM', 'MULYATRIES', '', '', 'BOGOR\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(125, 'B037- BADRUS SHOLEH', 'BADRUS SHOLEH', '', '', 'JAKARTA\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(126, 'B038- BUMI WIJAYA INDORAIL, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(127, 'B040- BIMANTIO', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(128, 'C001- CANGGIH PRESISI, P.T.', 'DEWI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(129, 'C003- CIPTA CETAK, P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(130, 'C004- CHEMTRACO SENTOSA, P. T.', 'ENY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(131, 'C005- CASH', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(132, 'C006- CATUR MITRA', 'MULIA', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(133, 'C007- CHEMACO CEMICAL', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(134, 'C008- COKRO', 'ALAY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(135, 'C009- C.V. ECHO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(136, 'C010- CIPTA PRINTING', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(137, 'C011- CAHAYA BARU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(138, 'C012- CHARLES', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(139, 'C013- COKY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(140, 'C014- CKE TEKNIK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(141, 'C015- CAHAYA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(142, 'C016- CV. CITRA NUSANTARA MANDIRI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 'C017- CAHAYA CROME, P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 'C018- CAHYADI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 'C019- CHANDRA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 'C020- CIPTO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 'C021- CAHAYA TERANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, 'C022- CITRA SELARAS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 'C023- CITRA NUSA CEMERLANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 'C024- CEMERLANG', 'NUZWAR', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 'C025- CAHAYA PRIMA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 'C026- CAHYO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 'C027- CIKUPA MEGAH KENCANA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 'C028- CIPTA BARU', 'BP. IWAN', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 'C029- CHEN HSI JAYA PERKASA', 'JIMMY', '', '', 'TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 'C030- CITRA NIAGA', 'DEWI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 'C031- CENTRAL CRANE', 'ERIK', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 'C033- CENTRAL DIESEL ', 'SOBIRIN', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 'C034- COMETAL, C. V', 'BPK LUTFI', '', '', 'TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 'C035- CAKRA JAYA (BEWOK)', '', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 'C036- CENTRAL METAL', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 'C037- CCTV 21.COM', '', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 'D001- DAYA CIPTA TEKNIK, P.T.', 'YUSUF', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 'D002- DUTA MANDIRI', 'GANDI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 'D003- DUTA BAN CENTER', 'BUDIMAN', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 'D004- DAMINDO, P. T.', 'LUCY', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 'D005- DUNIA JAYA', 'HERIANTO', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 'D006- DEDEN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 'D007- DIGI INDONESIA NUSANTARA, P. T.', 'ROHIM', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 'D008- DUDUNG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 'D009- DONI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 'D010- DWI JAYA, C.V.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 'D011- DARMADI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 'D012- DUTA CARBON', 'UTORO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 'D013- DAIM', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 'D014- DIHAN PUTRA PERKLASA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 'D015- DESVANTRI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 'D016- DANANG ', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 'D017- DEWI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 'D018- DICKY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 'D019- DIDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 'D020- DADANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 'D021- DADI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 'D022- DASUKI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 'D023- DEMI SANTOSO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 'D024- DUTA MANDIRI MOTOR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 'D025- DUTA MANDIRI TEKNIK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 'D026- DARMA UTAMA, P.D.', 'JUNAEDI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 'D027- DARMINTO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 'D028- DENKY SHOJI', 'BP.SOFYAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 'D032- DWI CENTRO PERKASA PT.', 'LIBRI ANTIKA', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 'D034- DUASATU CCTV', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 'D035- DENKI SHOJI CO.,LTD,', 'BPK EFENDI', '', '', 'JAPAN\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 'D036- DIESEL JAYA', 'BPK ACENG', '', '', 'JL. TAMAN SARI RAYA NO. 10 JAKARTA 11160\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 'D037- DAAN MOGOT BAN', 'JOHN YOSEF', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, 'D038- DUTA LISTRIK GRAHA PRIMA, PT.', 'ANDRI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, 'D040- DEYANG JIECHUANG WIRE & CABLE MACHINERY CO.,LTD', 'MA JIA', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, 'D041- DSL INDONESIA , PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, 'D043- DYAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, 'D044- DIANA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, 'D045- DATACOMM DIANGRAHA, PT', 'JUWITA NATASIA', '', '', 'JL.KAPTEN TENDEAN NO.18 A \nJAKARTA 12790\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, 'E001- EKO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, 'E002- ERASINDO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, 'E003- ENDANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, 'E004- EFENDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(206, 'E005- ENDRO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(207, 'E006- ELKOM NUSANTARA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(208, 'E007- EDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(209, 'E008- ENI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(210, 'E009- EAGLE EXPRESS LINES OF MERALCO STA MESA, MANILA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(211, 'E011- EKATAMA MANDALAWIRA, P. T', 'BPK SETIAWAN', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(212, 'E012- EKASAPTA HIDUPMAJU, PT.', '', '', '', 'SURABAYA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(213, 'E013- EKA JAYA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(214, 'F001- FREDY CHANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(215, 'F002- FIRDAUS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(216, 'F003- FUSENG INDONESIA', 'ROSMA', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(217, 'F004- FANDY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(218, 'F005- FUJI ELECTRIC', 'BP. DWI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(219, 'F006- FAJAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(220, 'F007- FREDY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(221, 'F008- FATUR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(222, 'F009- FAN TEKNIK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(223, 'F010- FAJRI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(224, 'F011- FAI JAYA', 'BP.ABDUL FAKKAR', '', '', 'JL. CILEUNGSI SETU RT/RW.01/01 DS. LIMUSNUNGGAL CILEUNGSI BOGOR\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(225, 'F012- FASA ABADI TEKNIK', 'SUBAKIR/AGUSTINUS', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(226, 'F013- FORUM INDONESIA', '-', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(227, 'F014- FATEK SOLUSINDO, P. T', 'BPK SUTRISNO', '', '', 'JAKARTA\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(228, 'F015- PETRA ERKA PERKASA, P. T', 'BPK HERU', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(229, 'F016- FURIN JAYA, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(230, 'F017- FRAJI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(231, 'G001- GORA MITRA SEJATI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(232, 'G002- GUNADI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(233, 'G003- GUNAWAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(234, 'G004- GLEN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(235, 'G005- GRACIA LOGAM', 'DANIL', '', '', '\nPALEM\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(236, 'G006- GUNUNG BARU', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(237, 'G007- GRAFINDO ARTAPERSADA, P. T.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(238, 'G008- GLOBISSYS INDONESIA', 'BUDI.', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(239, 'G009- GAYA ABADI SEMPURNA, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(240, 'G010- GEGANA PUTRA LOGAM, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(241, 'G011- GRACIA ABADI PT.', 'BP.DAVID', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(242, 'G012- GRACIA TEHNIK', 'BPK. HENDI', '', '', 'JL. HALIM PERDANA KUSUMA NO. 85 JURUMUDI BENDA TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(243, 'G013- GRAFINDO', '', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(244, 'G014- GARUDA GEARING', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(245, 'G015- GANAMAS PRIMA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(246, 'G999- GUDANG BARANG JADI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(247, 'H001- HIDUP BARU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(248, 'H002- HASTAR PRINTING', 'HENNY', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(249, 'H003- HERMANTO', 'HERMANTO', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(250, 'H004- HENNY', 'IBU SARI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(251, 'H005- HARYONO', 'HARYONO', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(252, 'H006- HARAPAN JAYA', 'SAEJI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(253, 'H007- HAJI USMAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(254, 'H008- HERMAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(255, 'H009- HASAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(256, 'H010- H. SUTAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(257, 'H011- H. RAMLI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(258, 'H012- H. IBNU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(259, 'H013- H. WAHIDIN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(260, 'H014- HENDRI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(261, 'H015- HENDRA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(262, 'H016- H. AHMAD', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(263, 'H017- HIMAWAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(264, 'H018- HAM,BALI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(265, 'H019- H.P METALS INDONESIA', 'BP. RONNY', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(266, 'H020- H. ANSORO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(267, 'H021- HASBULAH', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(268, 'H022- H. ABDULLAH', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(269, 'H023- HUSNI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(270, 'H024- HANDOYO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(271, 'H025- HASIDIN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(272, 'H026- HASAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(273, 'H027- HAMBYAH', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(274, 'H028- HEMEL ELECTRICK', 'LIA/HERMAN', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(275, 'H029- HUTAMA AGUNG LESTARI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(276, 'H030- HAKIM', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(277, 'H031- HENGKY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(278, 'H032- HALIM', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(279, 'H033- HARYADI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(280, 'H034- HARTA PERINDO SEJAHTERA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(281, 'H035- HERU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(282, 'H036- HJ. NIDI', '', '', '', 'TANGERANG.\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(283, 'H037- HARTONO SUBAGYO', '', '', '', 'SURABAYA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(284, 'H038- HJ. SOLEH', 'HJ. SOLEH', '', '', 'TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(285, 'H039- HAKIMAN', 'BP. HAKIMAN', '', '', 'tangerang\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(286, 'H040- H.IBRAHIM', 'H.IBRAHIM', '', '', 'TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(287, 'H041- HAO SENG PT', 'ROSMA', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(288, 'H043- HENRY TEKNIK UTAMA PT', 'SUPRATMAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(289, 'H044- HIAN STEEL PERKASA', 'SUPRATMAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(290, 'H045- HUGO METAL LANCAR JAYA, P. T', 'IBU LIA', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(291, 'H046- HENDRA PRATAMA, CV.', '', '', '', 'PALEMBANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(292, 'H047- HILMAWAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(293, 'H048- HARYANTO', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(294, 'H049- HANWA ROYAL METALS, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(295, 'H050- HERRIE', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(296, 'H051- HAIRUL', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(297, 'H052- H. JASULI', 'JAKARTA', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(298, 'I001- IKA WIRA NIAGA ', 'AGUS', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(299, 'I002- INDO SUPER KENCANA ', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(300, 'I003- INDAH JAYA', 'HANI', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(301, 'I004- INTI GELORA SETIA', 'BPK ADI', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(302, 'I005- INDO LOGAM', 'BP. JHONI SETIAWAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(303, 'I006- IMAM', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(304, 'I007- IWAN', 'HARRIES CANDRA', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(305, 'I008- INDO BATA  API', 'HENDRA', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(306, 'I009- IRWAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(307, 'I010- INNOVA INDONESIA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(308, 'I011- INDOPORLEN, P.T.', 'MUCHLIS', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(309, 'I012- IMRAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(310, 'I013- IRNA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(311, 'I014- IDEALFORMICA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(312, 'I015- INDOKA JAYA, P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(313, 'I016- INDOKA KARYA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(314, 'I017- IPUNG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(315, 'I018- ISMOYO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(316, 'I019- IMORA, P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(317, 'I020- IVAN', 'BP. IVAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(318, 'I021- INDO KAWAT', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(319, 'I022- INDO KAWAT SUKSES, P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(320, 'I023- IBNU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(321, 'I024- INDOVISION', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(322, 'I025- INDAH LESTARI LOGAM, P.T.', 'IBU LENNA WATI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(323, 'I026- INDO CITRA BAJA SEMPANA, P. T.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(324, 'I027- INTERINDO UTAMA, CV.', 'SYAHRUL', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(325, 'I028- INCAP ALTIN UTAMA, P.T.', '', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(326, 'I029- INDUSTRIAL MULTI FAN', 'TAUFIK', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(327, 'I030- INTAN MANDIRI, CV', 'NURHASAN', '', '', 'BEKASI\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(328, 'I031- INDOKARYA MANDIRI', 'IBU THERESIA', '', '', 'KOMP RUKO BANJAR WIJAYA BLOK B1/28 JLN. KH. HASYIM ASHARI\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(329, 'I032- INTI LINGGA SUKSES, P. T', 'RUDY ANTO', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(330, 'I033- INDOKITA MAKMUR, P. T', 'IBU SILVIA', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(331, 'I036- IFAN HERMAWAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(332, 'I037- IZAKUIKI TEHNIK SOLUSI, CV', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(333, 'I038- IRAWAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(334, 'I039- INTAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(335, 'I040- INTAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(336, 'J001- JAYACON PANEL UTAMA ', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(337, 'J003- JAYA READY MIX, P.T.', 'IBU YENI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(338, 'J004- JALI INDONESIA UTAMA', 'VANY', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(339, 'J005- JAYA MANDIRI', 'BAYU', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(340, 'J006- JECCO UTAMA MANDIRI, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(341, 'J007- JOKO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(342, 'J008- JIMMY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(343, 'J009- JATI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(344, 'J010- JALY INDONESIA UTAMA, P. T.', 'FANI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(345, 'J011- JASA SCRAFOLDING', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(346, 'J012- JENI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(347, 'J013- JASA LESTARI, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(348, 'J014- JAYATAMA MEGAH PERKASA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(349, 'J016- JAYA BERSAMA TEKNIK', 'BP. IWAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(350, 'J017- JC UTAMA TEKNIK INDONESIA PT', 'ANTON', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(351, 'J018- JOY ( BENGKEL ENDAH ) ', '', '', '', 'Jl. Padalarang No. 54 Bandung\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(352, 'J019- JUNG LIE', 'JUNG LIE', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(353, 'J020- JASA SARANA TEHNIK', 'BPK SOBIRIN', '', '', 'BINONG LIPPO KARAWACI BLOK BB 38/8 TANGERANG BANTEN\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(354, 'J021- JUANA LOGAM', 'SABAR', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(355, 'J022- JUDA TERUNA, P. T', 'IBU YANNI', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(356, 'J023- JAYA HATI, UD', 'UJANG', '', '', 'CAKUNG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(357, 'J024- JUANA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(358, 'J025- JOHNI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(359, 'K001- KARYA METAL, P. T.', 'SRI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(360, 'K002- KAWI MAS', 'TITI, AMIAW', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(361, 'K003- KHARISMA ABADI', 'IBU SELFI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(362, 'K004- KARYA NUSA ', 'ACHMAD', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(363, 'K005- KUSNAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(364, 'K006- KUAT', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(365, 'K007- KRISTI JAYA', 'IBU SRI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(366, 'K008- KRANTZ THERMO TECHNOLOGY INTERNATIONAL', 'MERLYN', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(367, 'K010- KURNIA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(368, 'K011- KASTOR & WHEEL INDONESIA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(369, 'K012- KOLIK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(370, 'K013- KARYA MOTOR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(371, 'K014- KEMBAR TEKNIK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(372, 'K015- KOMIKO JAYA IMEXINDO, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(373, 'K016- KANU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(374, 'K017- KARYADINAMIKA ANUGRAHPRIMA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(375, 'K018- KARUNIA JAMBU DIPA', 'BP. VINCENTIUS AAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(376, 'K019- BP. KUSWANDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(377, 'K020- KARUNIA ELEKTRINDO, P. T', 'BP. LEO', '', '', 'JAKARTA\n\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(378, 'K022- KUARTA PUTRA PRATAMA', 'ANTON', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(379, 'K023- KHARISMA BEARING', 'MIRA', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(380, 'K024- KUMALA JAYA INTERNUSA PT.', 'RETNO', '', '', 'COMPLEKS RUKO NIRWANA ASRI BLOK J2 NO.35 SUNTER PARADISE  JAKARTA UTARA\n\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(381, 'K025- KARBINDO ALAM PRIMA PT', 'EVA', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(382, 'K028- KAMAJAYA ANEKA LESTARI, P.T ', '', '', '', 'TAMAN TEKNO BSD TAHAP III SEKTOR 11 BLOK A1 NO. 7 SERPONG TANGERANG 15314\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(383, 'K029- KUMALA SAKTI, PD', 'BPK EDI', '', '', 'JAKPUS\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(384, 'K071- KALASINDO PRIMA SEJAHTERA, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(385, 'K999- KUPAS', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(386, 'L001- LAUTAN LUAS/INDONESIAN ACIDS INDUSTRY', 'LINA', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(387, 'L002- LAUTAN BERLIAN', 'SUPRIYONO', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(388, 'L003- LOGAM KENCANA', 'IBU YETTY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(389, 'L004- LOGAM HENDASY PUTRA', 'HENDRA N.', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(390, 'L005- LOGAM MANDIRI', 'BP. TEDDY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(391, 'L006- LUMBUNG BERKAH', 'ECI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(392, 'L007- LUCKY STAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(393, 'L008- LEO TEKNINDO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(394, 'L009- LIA LINTAS, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `supplier` (`id`, `nama_supplier`, `pic`, `telepon`, `hp`, `alamat`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(395, 'L010- LOGAM KARISMA, PT.', 'BP.AKIONG', '', '', 'CIKARANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(396, 'L011- LOGAM NIAGA, C.V.', 'BP. SUKIANTO. S.', '', '', 'SERPONG - TANGERANG. BANTEN.\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(397, 'L012- LILI', 'LILI', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(398, 'L013- LITA JAYA', 'KIK', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(399, 'L014- LEO', 'LEO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(400, 'L015- LORINA COLLECTION', '', '', '', 'JL. MANGGA DUA RAYA ( ITC ) LT 1 BLOK D NO. 14 JAKARTA UTARA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(401, 'L016- LESTARI ELECTRIC', 'IBU LINA', '', '', 'RUKO VILLA MELATI MAS BLOK B10 NO. 20 SERPONG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(402, 'L017- LESMANA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(403, 'L018- LUBIS', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(404, 'M001- MASA ELECTRONIC', 'AFAT', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(405, 'M002- MULIA', 'ASENG', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(406, 'M003- MENARA RAJAWALI', 'DEBY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(407, 'M004- MULTI TEKNIK, P. T. ', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(408, 'M005- MATRAMAN TIRTA MURNI', 'BP. GUNARTO', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(409, 'M006- MITRA SEJUK SELARAS', 'JEMI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(410, 'M007- MR. CHEN', 'MR. CHEN AN LAO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(411, 'M008- MAKMUR SEJAHTERA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(412, 'M009- MULTI SUKSES', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(413, 'M010- MULYADI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(414, 'M011- MUGI,P.T.', 'PRAPTO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(415, 'M012- MEIWA PACK INDONESIA', 'LILI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(416, 'M013- MANDANI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(417, 'M014- MEKAR JAYA ABADI, P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(418, 'M015- MULTI METALINDO, P. T.', 'CLAUDIA', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(419, 'M016- MARELLI TEHNIK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(420, 'M017- MULYONO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(421, 'M018- MALIK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(422, 'M019- MAKMUR INDAH KEMASINDO, P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(423, 'M020- MULA SAKTI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(424, 'M021- MARKUS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(425, 'M022- MUHAMAD', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(426, 'M023- MASKUN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(427, 'M024- MANTAP', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(428, 'M025- MEITA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(429, 'M026- MANSYUR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(430, 'M027- MUMUNG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(431, 'M028- MITRA LOGAM', 'BP. HALIM', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(432, 'M029- MAJU BERSAMA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(433, 'M030- MAKMUR SENTOSA', 'WILLIAM', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(434, 'M031- MAKMUR ABADI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(435, 'M032- MITRA MANDIRI', 'TOUFIK', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(436, 'M033- MEGA SAKTI,P. D.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(437, 'M034- MITRA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(438, 'M035- MULTILAP ADISURYA MANDIRI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(439, 'M036- MAKFUD', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(440, 'M037- MUNAWAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(441, 'M038- MINCE', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(442, 'M039- MAKITA MEGA MAKMUR, P. T', '', '', '', 'JAKARTA.\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(443, 'M045- MEGA WIJAYA', 'BP. FAISAL', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(444, 'M047- MESINDO TEHNIK', 'BAMBANG', '', '', 'JAKARTA TIMUR\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(445, 'M048- MASTRAINCO SURYA DAYA', 'ROHIM', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(446, 'M051- MW CHEMINDO PT', 'DHONY SUSANTO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(447, 'M052- MULTI LOGAM', 'MURATNO (ADE)', '', '', 'SURABAYA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(448, 'M053- MITRA KERJA', 'TAN PENG AN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(449, 'M054- MITRA USAHA LOGAM', 'TATANG', '', '', 'CIBODAS TANGERANG', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(450, 'M055- MARUTO', 'MOH. MARUTO', '', '', 'TANGERANG\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(451, 'M056- MULTI ARTA ABADI', 'UPI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(452, 'M057- MULTI STEELINDO PERKASA', 'SUPRATMAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(453, 'M059- MANDIRI LOGAM', 'YAYAN', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(454, 'M060- METAL RECYCLING INDONESIA, CV', 'BENNY', '', '', 'TANJUNG PRIUK\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(455, 'M061- MUHDI', '', '', '', 'TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(456, 'M062- MULIA PRATAMA BEARINDO, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(457, 'M063- METAL ALL HASIL , UD', 'ARIF EFENDI', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(458, 'M064- MEDYANTO', 'MEDYANTO', '', '', 'PALEMBANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(459, 'M065- MITRA LOGAM CV.', 'BP. ASAN', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(460, 'M066- MAJU ELECTRIC GIRINDO, PT.', 'HALIM', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(461, 'M067- MEYDI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(462, 'M068- MASTERINDO LOGAM TEHNIK JAYA, PT.', '', '', '', 'PADALARANG\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(463, 'M070- MINANG', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(464, 'M071- PT.MULTICOM PERSADA INTERNASIONAL', 'ZIPORA ARNI', '', '', 'JLN.DAAN MOGOT KM 21 NO.1\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(465, 'N001- NEW ASIA', 'ANTHONY CHANG', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(466, 'N002- NANANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(467, 'N003- NUGROHO', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(468, 'N004- NANAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(469, 'N005- NURDIN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(470, 'N006- NURHADI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(471, 'N007- NASIMA PERSADA NUSANTARA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(472, 'N008- NAGASENA ADILESTARI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(473, 'N009- NUSA ABADI,P.T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(474, 'N010- NUGRAH TAMA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(475, 'N011- NAUFALINDO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(476, 'N012- NANCY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(477, 'N013- NUR', 'BP. NUR', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(478, 'N015- NURHAYATI LOGAM MANDIRI', 'HJ. HARUN', '', '', 'Jl. Raya cacing no. 61 Jakarta Utara\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(479, 'N017- NOVINDOJAYA PRATAMA MANDIRI, P. T', 'IBU KANTI', '', '', 'JLN. KAMAL RAYA (OUTER RING ROAD) TAMAN PALEM LESTARI BLOK AA1 NO. 6A CENGKARANG BARAT JAKARTA BARAT\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(480, 'N018- NAWIR RAMLI', 'BP. MUKTAR', '', '', 'TANJUNG PRIOK\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(481, 'N019- NURHAYATI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(482, 'N020- NANDA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(483, 'O001- OMETRACO ARYA SAMTA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(484, 'O002- ONE HEART', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(485, 'O003- ORLIKON', 'BP. ORLIKON', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(486, 'O004- OCEAN BEARING', 'IBU MERLIN', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(487, 'O006- OKAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(488, 'O007- OKI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(489, 'P001- POMALA BINA TAMA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(490, 'P002- PERTAMINA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(491, 'P004- PUJI LESTARI', 'ROBERT', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(492, 'P005- PURI COMPUTER', 'LIMANTORO', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(493, 'P006- PRIMA INDAH LESTARI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(494, 'P007- PRABA WIRA DEWATA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(495, 'P008- PRISMA CABLE MITRATAMA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(496, 'P009- PALM SEMESTA', 'HERRY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(497, 'P010- PANCADAYA MANUNGGAL SENTOSA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(498, 'P011- PRESISI, P. T.', 'WATI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(499, 'P012- PURNAMA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(500, 'P013- PIPIT', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(501, 'P014- PRIMA LOGAM', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(502, 'P015- PENTA NIAGA CEMERLANG, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(503, 'P016- PRIMA JASA ', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(504, 'P017- PETROMITRA PACIFIC, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(505, 'P018- PRIMA MITRA ELEKTRINDO, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(506, 'P019- PAJA RAYA MOTOR, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(507, 'P020- PRYSMIAN CABLES INDUSTRI, P. T.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(508, 'P021- PUTRA GESANG ', 'ABDUL SYUKUR', '', '', 'BATU JAYA - TANGERANG. BANTEN\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(509, 'P025- PRIMA CABLE INDO, P.T.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(510, 'P026- PUTRA USAHA ', 'BP. LASDIANTO', '', '', 'DESA PATI, JAWA TENGAH\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(511, 'P027- PUTRA TEKNIK', 'YULIANTO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(512, 'P028- PUTRA ABADI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(513, 'P029- PRIMA MEGAH CV', 'ROMY LIMIJAYA', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(514, 'P030- PROTEKINDO MITRA UTAMA PT', 'BPK IVAN', '', '', '\nJLN. RADEN SALEH NO. 14 LT. 3 KENARI SENEN JAKARTA 10430\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(515, 'P031- PRIMA JAYA MAKMUR, C.V', 'BPK ACHMAD', '', '', '\nVILLA BALARAJA BLOK F1 NO. 1 TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(516, 'P032- PROTECH JAYA ABADI', 'BPK HADI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(517, 'P033- PUSACO INTERNATIONAL, P. T', 'BPK RAHMADI', '', '', 'JL. RE MARTADINATA RUKO MAHKOTA ANCOL BLOK B NO. 9 JAKUT \n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(518, 'P035- PARAHITA PRIMA SENTOSA, PT.', 'WINDY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(519, 'P036- PANI, P. T.', 'CHRISTINE', '', '', 'JL. RAYA PRANCIS NO. 2 BLOK M 30 KP PANTAI INDAH DADAP\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(520, 'P999- PUNGUTAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(521, 'Q001- QUARTO SKALA INDONESIA', 'SYAHRUL', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(522, 'R001- RICKY', 'BP. RICKY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(523, 'R002- RUSDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(524, 'R003- RUDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(525, 'R004- RUSLAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(526, 'R005- RIDWAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(527, 'R006- RONI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(528, 'R007- RUSMIN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(529, 'R008- RUSMANTO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(530, 'R009- RUSLI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(531, 'R010- RANITA SALI KABELTAMA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(532, 'R011- RINTO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(533, 'R012- ROBERT', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(534, 'R013- RIANTO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(535, 'R014- RITA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(536, 'R015- RICKY YUNARA', 'BP. RICKY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(537, 'R016- RUSTAM', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(538, 'R017- RINA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(539, 'R018- RAMLI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(540, 'R019- RIA M', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(541, 'R020- RIA SARANA', 'IBU SELVI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(542, 'R021- RAFLI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(543, 'R022- RIAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(544, 'R023- RAJAWALI NUSINDO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(545, 'R024- SUMBER MAKMUR, P.T', 'BP. RUDY', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(546, 'R025- PD. ROFA ELECTRIC', '', '', '', 'JL.DR. KART RAJIMAN WIDYODININGRAT\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(547, 'R030- RIZKI LOGAM', '', '', '', 'TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(548, 'R031- RIZKI MANDIRI', 'NUR KHOLIS', '', '', 'PONDOK GEDE\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(549, 'R032- ROYAL PLASTIK', 'BPK EDI', '', '', 'TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(550, 'R033- RANDAVE JAYA, P. D', 'BPK EDI', '', '', 'TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(551, 'R034- RONALD', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(552, 'R035- ROSIM', '', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(553, 'R036- RASI', '', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(554, 'R037- REAGAN', '', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(555, 'R038- RIFKY', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(556, 'R039- ROSMALA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(557, 'R999- ROLLING', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(558, 'S001- SABAR', 'HENI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(559, 'S002- SADIKUN NIAGAMAS RAYA, P. T.', 'SRI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(560, 'S003- SRIWIJAYA', 'PIE LIE', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(561, 'S004- SUMBER BUDI SAKTI', 'LISI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(562, 'S005- SUMI INDO, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(563, 'S006- SURYA UNGGUL', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(564, 'S007- SEMEN BOX, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(565, 'S008- SAMA JAYA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(566, 'S010- SUMBER JAYA', 'AFUK', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(567, 'S011- SELATAN TOKO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(568, 'S012- SETIA AGUNG SEAL', 'DESY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(569, 'S013- SERBA INDUSTRIAL', 'AKWET', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(570, 'S014- SENG LIP', 'IBU AIRIN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(571, 'S015- SUMBER LANCAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(572, 'S016- SUTARNO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(573, 'S017- SUTANTO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(574, 'S018- SULAIMAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(575, 'S019- SINAR BARU SURABAYA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(576, 'S020- SIBALEC, P. T', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(577, 'S021- SUMBER DAYA SINAR BARU, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(578, 'S022- SUMBER METALINDO INTINUSA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(579, 'S023- SETIA SAPTA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(580, 'S024- SURYA KENCANA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(581, 'S025- SIBALEC POWEL CABLE & E.S, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(582, 'S030- SINAR BARU TETAP AGUNG, P. T ', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(583, 'S031- SIGNAL LINK NUSANTARA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(584, 'S032- SUCACO, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(585, 'S033- SURYA MITRA TEKNIK', 'LILI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(586, 'S034- SINAR INDAH', 'IWAN', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(587, 'S035- SUMBER BARU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(588, 'S036- SUNAN KENCANA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(589, 'S037- SANLI PARTA', 'ARIP', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(590, 'S038- SLS BERINDO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(591, 'S039- SURYANADI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(592, 'S040- SINAR PLASTIK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(593, 'S041- SURYATAMA ARTA MEGAH', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(594, 'S042- SUNDORO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(595, 'S043- SUKARDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(596, 'S044- SUKOCO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(597, 'S045- SUGANDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(598, 'S046- SUWARNO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(599, 'S047- SURYA TERANG, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(600, 'S048- SAMSUL', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(601, 'S049- SUTRISNO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(602, 'S050- SARANA TEKNIK INDUSTRI, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(603, 'S051- STEFANI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(604, 'S052- SUTOMO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(605, 'S053- SURYA INTI PRATAMA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(606, 'S054- SUGIMAN TINDJAU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(607, 'S055- SARTI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(608, 'S056- SINAR BARU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(609, 'S057- SUGENG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(610, 'S058- SUSILO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(611, 'S059- SUYANTO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(612, 'S060- SUTEJO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(613, 'S061- SUTRADO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(614, 'S062- SUTRA KABEL INTIMANDIRI, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(615, 'S063- SIGIT', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(616, 'S064- SURYONO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(617, 'S065- SUGITO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(618, 'S066- SEPTIAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(619, 'S067- SINAR BAHAGIA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(620, 'S068- SYSCONINDO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(621, 'S069- STARION', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(622, 'S070- SARANA MAKMUR BERSAMA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(623, 'S071- SINAR MAKMUR JAYA', 'KO ACUN', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(624, 'S072- SUKANDAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(625, 'S073- SUMBER REJEKI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(626, 'S074- SETIA MOTOR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(627, 'S075- SINAR SURYA ABADI', 'AHMAD', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(628, 'S076- SHANGHAI BENGKEL', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(629, 'S077- SAHABAT INDONESIA INTIMANDIRI, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(630, 'S078- SINAR TIMUR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(631, 'S079- SURYADI', 'BP. SURYADI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(632, 'S080- SUNARYO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(633, 'S081- SUPOMO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(634, 'S082- SIBIYANTO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(635, 'S083- SEMBADA MANDIRI LESTARI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(636, 'S084- SURYA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(637, 'S085- SAMSUDIN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(638, 'S086- SUTOPO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(639, 'S087- SUNARDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(640, 'S088- SUBROTO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(641, 'S089- SINAR PURNAMA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(642, 'S090- SUTANTO ARIFCHANDRA ELECTRIC, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(643, 'S091- SUMARNO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(644, 'S092- SUKANDAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(645, 'S093- SUHARNI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(646, 'S094- SUMBER NIAGAMAS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(647, 'S095- SATUMAN', 'BP. SATUMAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(648, 'S096- SURYA MANDIRI LOGAM, P.T.', 'BP. MURADNO', '', '', 'SURABAYA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(649, 'S097- SRI REJEKI, P. T.', 'IBU SOLEHA', '', '', 'TANGERANG\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(650, 'S104- SETIA KAWAN', 'ERIK', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(651, 'S105- SMOOTH JAYA MANDIRI, P. T', 'BPK LUCKY', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(652, 'S106- SUN KING HING', 'MR.LIE', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(653, 'S108- SUMBER GLOBALINDO MINING , P.T.', 'INDRA', '', '', 'CIREBON\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(654, 'S109- SAYAP MAS PT', 'DENNY SETIAWAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(655, 'S110- SWIFONG MACHINERY CO.LTD', 'MEI LING LIN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(656, 'S111- SURYA MAKMUR SEJATI', 'OSCAR', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(657, 'S112- SUHERMAN', 'BP. SUHERMAN', '', '', 'PEKAN BARU\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(658, 'S116- SINAR JAYA', 'ANNA', '', '', 'TANJUNG PRIOK\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(659, 'S117- SPEEDY PRINTING', 'BPK YUDI', '', '', 'KOMP MUTIARA TAMAN PALEM BLOK C2/33 JAKARTA BARAT 11730 INDONESIA \n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(660, 'S118- SUMBER PERKASA JAYATAMA, P.T', 'BPK MARHENDI', '', '', 'GLODOK\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(661, 'S119- SAIMIN', 'BPK SAIMIN', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(662, 'S120- SARLOM SAKTI, P. T', '', '', '', 'MEDAN\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(663, 'S121- SANTO RUBBER FACTORY', 'IBU MARINA / BPK JUSUF SIDIK', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(664, 'S122- SAHABAT MITRA INTRABUANA, P. T', 'IBU NIA', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(665, 'S123- SEMANGAT RAYA', 'BPK JIMMY', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(666, 'S124- SURYA ABADI', 'BPK ANTONIO', '', '', 'JAKBAR\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(667, 'S125- SINAR INTI INDOPRATAMA, P. T', 'BPK ZAKARIA', '', '', 'JAKBAR\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(668, 'S126- SINAR SURYA P.T.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(669, 'S127- SURYA PLASCO, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(670, 'S128- SUGIH JAYA', 'SUGIARTO', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(671, 'S129- SIN SIN', 'BP. DANIEL', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(672, 'S130- SUPER METAL BANGKA JAYA ABADI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(673, 'S131- SINAR INTAN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(674, 'S132- SARANA CIPTA PERKASA, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(675, 'S133- SINAR ARTHA NUSA, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(676, 'S134- SINAR SUBUR', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(677, 'S135- SINAR LOGAM', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(678, 'S136- SAMPOERNA PRINTPACK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(679, 'S139- SULIS', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(680, 'S140- SUKMA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(681, 'S141- SANTI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(682, 'S142- SANJAYA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(683, 'S143- SUMBER REJEKI ALUMUNIUM', 'BP. SUNARYO', '', '', 'JL.PETA SELATAN JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(684, 'S144- SINAR DEWI', 'PAK AAN', '', '', 'TANGERANG\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(685, 'S145- SABRINA', 'SABRINA', '', '', 'JAKARTA BARAT\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(686, 'S999- SDM', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(687, 'T001- TISA, P. T.', 'BAHRI', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(688, 'T002- TEMBAGA MULIA SEMANAN, P. T.', 'MAN LIE/BP.HANDY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(689, 'T003- TALIMAS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(690, 'T004- TEKNIK MAKMUR', 'AGUS', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(691, 'T005- TUNAS PUTRA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(692, 'T006- TEKNO BANGKIT', 'SWARTO', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(693, 'T007- TRAVINDO PRIMA PERKASA', 'ACHMAD', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(694, 'T008- TIARA SERVICE', 'AFAT', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(695, 'T009- TEKKINDO CENTRA DAYA', 'ARIYANTO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(696, 'T010- TIRTA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(697, 'T011- TRITECH/BENGKEL SHANGHAI', 'ALEN', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(698, 'T012- THOMAS', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(699, 'T013- TUGU PAKULONANTHOMAS', 'BUDI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(700, 'T014- TONY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(701, 'T015- TIGAPUTRA ADHI MANDIRI, P. T', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(702, 'T016- TRANKA KABEL PT', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(703, 'T017- TIGA PUTRA JAYA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(704, 'T018- TIRA ANDALAN STEEL', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(705, 'T019- TUNGGAL JAYA PARI, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(706, 'T020- TONO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(707, 'T021- TANTOWI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(708, 'T022- TARUNA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(709, 'T023- TAMING DINAMIKA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(710, 'T024- TOFIK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(711, 'T025- TELITI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(712, 'T026- TEGUH', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(713, 'T027- TATANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(714, 'T028- TEBING MAS JAYAUTAMA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(715, 'T029- TERINDA BAKTI UTAMA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(716, 'T030- TRI KARYA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(717, 'T031- TIRTA TEKNOSYS', 'BP. SAM/BP. BOY', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(718, 'T032- TIGA SAUDAR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(719, 'T033- TERANG KITA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(720, 'T034- TRISNO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(721, 'T035- TARMIZI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(722, 'T036- TATANG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(723, 'T037- TUNAS RUANG MESIN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(724, 'T039- TERUS JAYA ', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(725, 'T040- TRIMUSTIKA', 'FREDY', '', '', 'JAKARTA BARAT\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(726, 'T041- TEGMARCO UTAMA', 'MEILY S', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(727, 'T042- TJOKRO BERSAUDARA', 'SUTRISNO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(728, 'T043- TAMAKO ENGENERING PT.', 'IR.HENRY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(729, 'T044- TUNAS JAYA PT', 'VIVI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(730, 'T045- TRI R JAYA PURNAMA', 'RATMI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(731, 'T046- TECHNO BANGKIT MANDIRI', 'SUWARTO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(732, 'T048- TOYO DIES INDONESIA, PT.', 'BPK MARKIM', '', '', 'JL. SURYA MADYA KAV. 1-15B SURYACIPTA CITY OF INDUSTRY TELUK JAMBE KARAWANG 41361\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(733, 'T049- TECO MULTIGUNA ELEKTRO, P. T', 'BPK BASUKI', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(734, 'T051- TRIAS KEMAS UTAMA, PT.', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(735, 'T052- THEA THEO STATIONARY', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(736, 'T053- TIKNO', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(737, 'T054- TONY', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(738, 'T055- TIFRA', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(739, 'U001- UTAMA MAKMUR', 'ADILA', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(740, 'U002- USAHA BARU,UD', 'HAJI BAHAR', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(741, 'U003- UNGGUL CIPTA INDRA MEGAH, P. T', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(742, 'U004- UNITAMA, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(743, 'U005- USMAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(744, 'U006- UTOMO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(745, 'U007- UNTUNG', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(746, 'U008- UNI STAR UTAMA, PT.', 'BP. ARIF', '', '', 'KAWASAN INDUSTRI CANDI JL. GATOT SUBROTO I/10 SEMARANG.\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(747, 'U009- UD. 3AN BRE I', 'BP. ANDI ANTO T.', '', '', 'Jl. Raya Prancis, Kp> Bendungan Rt. 02 Rw. 012 No. 99, Dadap - Tangerang.\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(748, 'U010- USAHA SARANA ELECTRICAL', 'ULLIE', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(749, 'U011- USAHA BARU', 'YADI', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(750, 'U012- USAHA BARU', 'SUHERMAN', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(751, 'U013- USAHA BERSAMA', 'SYAFI I', '', '', 'JARTA TIMUR\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(752, 'U014- USAHA KEKER MANDIRI', 'SUPOMO', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(753, 'U015- UTAMA SERVICE', 'BP. YASIR', '', '', '\n\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(754, 'V001- VOKSEL ELECTRIC , P.T.', 'LUSI/WULAN', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(755, 'V002- VERIA MOTOR', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(756, 'V003- VEKTORIA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(757, 'V004- VINSEN', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(758, 'V005- VGA SCALE INDONESIA, P. T', 'BPK ABDUL SYUKUR', '', '', 'JAKARTA\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(759, 'W001- WEMPY', 'WEMPY', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(760, 'W002- WAWAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(761, 'W003- WALUYO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(762, 'W004- WAHYU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(763, 'W005- WISNU', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(764, 'W006- WIDODO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(765, 'W007- WILLY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(766, 'W008- WAHANA RAKSA KENCANA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(767, 'W009- WASPAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(768, 'W010- WICAKSOSO', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(769, 'W011- WENY', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(770, 'W013- WIJAYA SAKTI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(771, 'W014- WILSON, P. T.', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(772, 'W015- WAHYUDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(773, 'W017- WAHANA WIRAWAN, P. T', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(774, 'W018- WINTECH PT', 'BPK.ADWINC', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(775, 'W020- WAHANA MAS MULIA, P. T', 'IBU AMY', '', '', 'JAKBAR\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(776, 'W021- WAHYU JAYA KESUMA', 'BP. WAHYU', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(777, 'Y001- YOSA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(778, 'Y002- YAHYA', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(779, 'Y003- YOYOK', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(780, 'Y004- YANCE', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(781, 'Y005- YUDI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(782, 'Y007- YESI', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `supplier` (`id`, `nama_supplier`, `pic`, `telepon`, `hp`, `alamat`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(783, 'Y008- YAYAN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(784, 'Y009- YULIS TIRAS ANDALAS', 'BP. BAMBANG', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(785, 'Z001- ZE-ZEN', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(786, 'Z002- ZAENAL', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(787, 'Z004- ZULKIPLI', '', '', '', '\n', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_old`
--

CREATE TABLE `supplier_old` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(150) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `m_province_id` int(11) NOT NULL,
  `m_city_id` int(11) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `m_bank_id` int(11) NOT NULL,
  `kcp` varchar(50) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_old`
--

INSERT INTO `supplier_old` (`id`, `nama_supplier`, `pic`, `telepon`, `hp`, `alamat`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'ANUGERAH JAYA', 'ISKANDAR', '', '087880813732', 'SLIPI - JAKARTA BARAT', 1, 3, '32152', 3, 'SLIPI JAYA', '200901', '', '2018-01-24 08:01:28', 1, '2018-01-24 08:01:28', 1),
(2, 'BAHRUN LOGISTIK', 'YAHYA KURNIAWAN', '', '087880813730', 'SUNTER - JAKARTA UTARA', 9, 6, '32100', 4, 'SUNTER', '200901', '', '2018-01-24 08:01:32', 1, '2018-01-24 08:01:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id` int(11) NOT NULL,
  `no_surat_jalan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `request_sample_id` int(11) NOT NULL,
  `m_kendaraan_id` int(11) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_jalan`
--

INSERT INTO `surat_jalan` (`id`, `no_surat_jalan`, `tanggal`, `jenis_barang`, `m_customer_id`, `sales_order_id`, `po_id`, `request_sample_id`, `m_kendaraan_id`, `supir`, `remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'SJ.20022018.0001', '2018-02-20', 'AMPAS', 1, 1, 0, 0, 5, 'ANDI', '', '2018-02-20 04:02:13', 1, '2018-02-20 05:02:00', 1),
(2, 'SJ.22022018.0001', '2018-02-22', 'AMPAS', 1, 0, 5, 0, 4, 'KADIR', '', '2018-02-22 09:02:19', 1, '2018-02-22 09:02:38', 1),
(3, 'SJ.25022018.0001', '2018-02-25', 'KAWAT', 1, 0, 0, 1, 6, 'CHANDRA', '', '2018-02-25 09:02:27', 1, '2018-02-25 10:02:24', 1),
(4, 'SJ.17052018.0001', '2018-05-17', 'AMPAS', 2, 3, 0, 0, 5, 'JONO', '', '2018-05-17 04:05:05', 1, '2018-05-17 04:05:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan_detail`
--

CREATE TABLE `surat_jalan_detail` (
  `id` int(11) NOT NULL,
  `surat_jalan_id` int(11) NOT NULL,
  `ampas_id` int(11) NOT NULL,
  `bruto` int(11) NOT NULL,
  `produksi_ampas_id` int(11) NOT NULL,
  `no_packing` varchar(50) NOT NULL,
  `bobin` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_jalan_detail`
--

INSERT INTO `surat_jalan_detail` (`id`, `surat_jalan_id`, `ampas_id`, `bruto`, `produksi_ampas_id`, `no_packing`, `bobin`, `netto`, `line_remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 1, 70, 1, '200901', 10, 70, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 1, 2, 150, 1, '200902', 5, 145, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 2, 1, 50, 1, '200905', 2, 48, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 2, 2, 89, 2, '200906', 9, 80, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 3, 1, 110, 0, 'PL01', 1, 100, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 3, 2, 55, 0, 'PL02', 5, 50, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 4, 1, 30, 4, 'PCK01', 10, 20, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 4, 2, 60, 4, 'PCK02', 5, 55, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `temporary`
--

CREATE TABLE `temporary` (
  `id` int(11) NOT NULL,
  `qty` varchar(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temporary`
--

INSERT INTO `temporary` (`id`, `qty`, `tanggal`) VALUES
(1, '200', '2018-02-17'),
(4, '200', '2018-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `tolling_fg`
--

CREATE TABLE `tolling_fg` (
  `id` int(11) NOT NULL,
  `no_tolling_fg` varchar(200) NOT NULL,
  `status` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `so_id` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `no_spb_fg` int(11) NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tolling_fg`
--

INSERT INTO `tolling_fg` (`id`, `no_tolling_fg`, `status`, `tanggal`, `so_id`, `netto`, `no_spb_fg`, `marketing_id`, `m_customer_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(3, 'TFG.20112018.0001', 1, '2018-11-20', 3, 260, 26, 1, 2, '2018-11-20', 1, '2018-11-20', 1),
(5, 'TFG.21112018.0002', 0, '2018-11-21', 4, 150, 28, 1, 2, '2018-11-21', 1, '2018-11-21', 1),
(6, 'TFG.21112018.0003', 1, '2018-11-21', 8, 108, 29, 3, 3, '2018-11-21', 1, '2018-11-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tolling_fg_detail`
--

CREATE TABLE `tolling_fg_detail` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tolling_fg_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tolling_fg_detail`
--

INSERT INTO `tolling_fg_detail` (`id`, `tanggal`, `tolling_fg_id`, `jenis_barang_id`, `harga`, `netto`, `keterangan`) VALUES
(1, '2018-11-20', 3, 8, 25000000, 200, 'PERMINTAAN BANYAK'),
(3, '2018-11-20', 3, 11, 15000000, 50, 'PERMINTAAN KEDUA'),
(4, '2018-11-21', 5, 8, 10000000, 150, ''),
(5, '2018-11-21', 5, 9, 65000000, 150, ''),
(6, '2018-11-21', 6, 9, 18000000, 108, '');

-- --------------------------------------------------------

--
-- Table structure for table `ttr`
--

CREATE TABLE `ttr` (
  `id` int(11) NOT NULL,
  `no_ttr` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `dtr_id` int(11) NOT NULL,
  `jmlh_afkiran` int(11) NOT NULL,
  `jmlh_pengepakan` int(11) NOT NULL,
  `jmlh_lain` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `flag_bayar` tinyint(1) NOT NULL,
  `flag_produksi` tinyint(1) NOT NULL,
  `ttr_status` tinyint(1) NOT NULL DEFAULT '0',
  `tgl_approve` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `tgl_rejected` datetime NOT NULL,
  `rejected_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttr`
--

INSERT INTO `ttr` (`id`, `no_ttr`, `tanggal`, `dtr_id`, `jmlh_afkiran`, `jmlh_pengepakan`, `jmlh_lain`, `remarks`, `flag_bayar`, `flag_produksi`, `ttr_status`, `tgl_approve`, `approved_by`, `tgl_rejected`, `rejected_by`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'TTR.17022018.0001', '2018-02-17', 1, 10, 15, 0, '', 1, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-02-17 02:02:16', 1, '2018-02-17 02:02:16', 1),
(2, 'TTR.19022018.0001', '2018-02-19', 2, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-02-19 10:02:50', 1, '2018-02-19 10:02:50', 1),
(3, 'TTR.24022018.0001', '2018-02-24', 5, 50, 5, 4, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-02-24 10:02:08', 1, '2018-02-24 10:02:08', 1),
(4, 'TTR.25022018.0001', '2018-02-25', 6, 40, 10, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-02-25 05:02:54', 1, '2018-02-25 05:02:54', 1),
(5, 'TTR.25022018.0002', '2018-02-25', 7, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-02-25 11:02:33', 1, '2018-02-25 11:02:33', 1),
(9, 'TTR.15052018.0001', '2018-05-15', 10, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-05-15 09:05:44', 1, '2018-05-15 09:05:44', 1),
(11, 'TTR.25022016.0002', '2016-02-25', 12, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2016-02-25 07:02:57', 1, '2016-02-25 07:02:57', 1),
(15, 'TTR.04102018.0001', '2018-10-04', 11, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-10-04 01:10:48', 1, '2018-10-04 01:10:48', 1),
(35, 'TTR.04102018.0015', '2018-10-04', 14, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-10-04 02:10:16', 1, '2018-10-04 02:10:16', 1),
(36, 'TTR.04102018.0016', '2018-10-04', 15, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-10-04 02:10:19', 1, '2018-10-04 02:10:19', 1),
(37, 'TTR.04102018.0017', '2018-10-04', 16, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-10-04 02:10:15', 1, '2018-10-04 02:10:15', 1),
(38, 'TTR.08102018.0001', '2018-10-08', 22, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-10-08 11:10:05', 1, '2018-10-08 11:10:05', 1),
(39, 'TTR.11102018.0001', '2018-10-08', 23, 0, 0, 0, '', 0, 0, 1, '2018-10-11 02:10:03', 1, '0000-00-00 00:00:00', 0, '2018-10-08 11:10:09', 1, '2018-10-08 11:10:09', 1),
(41, '', '2018-10-08', 26, 0, 0, 0, '', 0, 0, 9, NULL, NULL, '2018-10-10 06:10:58', 1, '2018-10-08 03:10:26', 1, '2018-10-08 03:10:26', 1),
(42, 'TTR.10102018.0010', '2018-10-08', 27, 0, 0, 0, '', 0, 0, 1, '2018-10-10 06:16:35', 1, '0000-00-00 00:00:00', 0, '2018-10-08 03:10:42', 1, '2018-10-08 03:10:42', 1),
(43, '', '2018-10-08', 28, 0, 0, 0, '', 0, 0, 9, '2018-10-10 06:04:04', 1, '2018-10-10 06:10:10', 1, '2018-10-08 03:10:57', 1, '2018-10-08 03:10:57', 1),
(44, 'TTR.10102018.0007', '2018-10-10', 29, 0, 0, 0, '', 0, 0, 1, '2018-10-10 05:48:37', 1, '0000-00-00 00:00:00', 0, '2018-10-10 02:10:38', 1, '2018-10-10 02:10:38', 1),
(45, 'TTR.31102018.0001', '2018-10-31', 39, 0, 0, 0, '', 0, 0, 1, '2018-10-31 04:55:39', 1, '0000-00-00 00:00:00', 0, '2018-10-31 04:10:10', 1, '2018-10-31 04:10:10', 1),
(46, 'TTR.01112018.0001', '2018-11-01', 47, 0, 0, 0, '', 0, 0, 1, '2018-11-01 03:42:56', 1, '0000-00-00 00:00:00', 0, '2018-11-01 03:11:19', 1, '2018-11-01 03:11:19', 1),
(47, 'TTR.13112018.0001', '2018-11-13', 52, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-11-13 01:11:35', 1, '2018-11-13 01:11:35', 1),
(48, 'TTR.21112018.0001', '2018-11-21', 63, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-11-21 12:11:24', 1, '2018-11-21 12:11:24', 1),
(49, 'TTR.21112018.0002', '2018-11-21', 64, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-11-21 04:11:46', 1, '2018-11-21 04:11:46', 1),
(50, '', '2018-11-22', 46, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-11-22 09:11:36', 1, '2018-11-22 09:11:36', 1),
(51, 'TTR.22112018.0001', '2018-11-22', 65, 0, 0, 0, '', 0, 0, 1, '2018-11-22 09:43:21', 1, '0000-00-00 00:00:00', 0, '2018-11-22 09:11:08', 1, '2018-11-22 09:11:08', 1),
(52, 'TTR.22112018.0002', '2018-11-22', 66, 0, 0, 0, '', 0, 0, 1, '2018-11-22 11:26:16', 1, '0000-00-00 00:00:00', 0, '2018-11-22 11:11:13', 1, '2018-11-22 11:11:13', 1),
(53, 'TTR.201811.0001', '2018-11-22', 67, 0, 0, 0, '', 0, 0, 1, '2018-11-30 03:05:52', 1, '0000-00-00 00:00:00', 0, '2018-11-22 01:11:01', 1, '2018-11-22 01:11:01', 1),
(54, '', '2018-11-27', 50, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-11-27 03:11:29', 1, '2018-11-27 03:11:29', 1),
(56, '', '2018-11-30', 75, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-11-30 05:11:19', 1, '2018-11-30 05:11:19', 1),
(57, '', '2018-11-30', 76, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-11-30 06:11:57', 1, '2018-11-30 06:11:57', 1),
(58, '', '2018-11-30', 77, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-11-30 07:11:32', 1, '2018-11-30 07:11:32', 1),
(59, '', '2018-11-30', 78, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-11-30 07:11:39', 1, '2018-11-30 07:11:39', 1),
(60, '', '2018-11-30', 79, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-11-30 07:11:43', 1, '2018-11-30 07:11:43', 1),
(61, '', '2018-12-03', 80, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-12-03 10:12:51', 1, '2018-12-03 10:12:51', 1),
(62, '', '2018-12-03', 81, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-12-03 12:12:19', 1, '2018-12-03 12:12:19', 1),
(63, '', '2018-12-03', 82, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-12-03 01:12:27', 1, '2018-12-03 01:12:27', 1),
(64, '', '2018-12-03', 83, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-12-03 01:12:12', 1, '2018-12-03 01:12:12', 1),
(65, 'TTR.201812.0001', '2018-12-03', 84, 0, 0, 0, '', 0, 0, 1, '2018-12-03 03:46:25', 1, '0000-00-00 00:00:00', 0, '2018-12-03 01:12:07', 1, '2018-12-03 01:12:07', 1),
(66, 'TTR.201812.0002', '2018-12-04', 85, 0, 0, 0, '', 0, 0, 1, '2018-12-04 02:24:06', 1, '0000-00-00 00:00:00', 0, '2018-12-04 02:12:06', 1, '2018-12-04 02:12:06', 1),
(67, 'TTR.201812.0003', '2018-12-04', 86, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2018-12-04 05:12:36', 1, '2018-12-04 05:12:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ttr_detail`
--

CREATE TABLE `ttr_detail` (
  `id` int(11) NOT NULL,
  `ttr_id` int(11) NOT NULL,
  `dtr_detail_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `ampas_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttr_detail`
--

INSERT INTO `ttr_detail` (`id`, `ttr_id`, `dtr_detail_id`, `rongsok_id`, `ampas_id`, `qty`, `bruto`, `netto`, `line_remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 1, 1, 0, 200, 750, 700, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 1, 2, 2, 0, 88, 450, 420, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 2, 3, 2, 0, 1, 200, 150, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 2, 4, 2, 0, 1, 180, 175, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 3, 7, 3, 0, 12, 450, 430, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 3, 8, 4, 0, 10, 530, 500, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 4, 9, 1, 0, 100, 450, 440, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 4, 10, 2, 0, 25, 350, 330, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 5, 11, 0, 1, 10, 100, 90, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 5, 12, 0, 2, 5, 60, 58, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 9, 17, 1, 0, 40, 400, 390, 'PALET 1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 9, 18, 2, 0, 60, 600, 590, 'PALET 2', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 11, 20, 1, 0, 5, 440, 430, '', '2016-02-25 07:02:57', 1, '2016-02-25 07:02:57', 1),
(18, 15, 19, 2, 0, 4, 300, 270, '', '2018-10-04 01:10:48', 1, '2018-10-04 01:10:48', 1),
(36, 27, 14, 2, 0, 10, 300, 250, '', '2018-10-04 02:10:59', 1, '2018-10-04 02:10:59', 1),
(37, 28, 13, 1, 0, 45, 25, 460, '', '2018-10-04 02:10:36', 1, '2018-10-04 02:10:36', 1),
(38, 28, 14, 2, 0, 10, 300, 250, '', '2018-10-04 02:10:36', 1, '2018-10-04 02:10:36', 1),
(39, 29, 13, 1, 0, 45, 25, 460, '', '2018-10-04 02:10:22', 1, '2018-10-04 02:10:22', 1),
(40, 29, 14, 2, 0, 10, 300, 250, '', '2018-10-04 02:10:22', 1, '2018-10-04 02:10:22', 1),
(41, 30, 13, 1, 0, 45, 25, 460, '', '2018-10-04 02:10:30', 1, '2018-10-04 02:10:30', 1),
(42, 30, 14, 2, 0, 10, 300, 250, '', '2018-10-04 02:10:30', 1, '2018-10-04 02:10:30', 1),
(43, 31, 21, 1, 0, 88, 60, 50, '', '2018-10-04 02:10:44', 1, '2018-10-04 02:10:44', 1),
(48, 33, 22, 2, 0, 77, 60, 50, '', '2018-10-04 02:10:14', 1, '2018-10-04 02:10:14', 1),
(49, 34, 21, 1, 0, 88, 60, 50, '', '2018-10-04 02:10:17', 1, '2018-10-04 02:10:17', 1),
(50, 34, 22, 2, 0, 77, 60, 50, '', '2018-10-04 02:10:17', 1, '2018-10-04 02:10:17', 1),
(51, 35, 23, 1, 0, 188, 50, 40, '', '2018-10-04 02:10:16', 1, '2018-10-04 02:10:16', 1),
(52, 35, 24, 2, 0, 66, 60, 50, '', '2018-10-04 02:10:16', 1, '2018-10-04 02:10:16', 1),
(53, 36, 25, 1, 0, 45, 30, 20, '', '2018-10-04 02:10:19', 1, '2018-10-04 02:10:19', 1),
(54, 36, 26, 2, 0, 10, 5, 3, '', '2018-10-04 02:10:19', 1, '2018-10-04 02:10:19', 1),
(55, 36, 27, 1, 0, 55, 40, 30, '', '2018-10-04 02:10:19', 1, '2018-10-04 02:10:19', 1),
(56, 37, 28, 1, 0, 2, 2, 1, '', '2018-10-04 02:10:15', 1, '2018-10-04 02:10:15', 1),
(57, 37, 29, 2, 0, 4, 3, 1, '', '2018-10-04 02:10:15', 1, '2018-10-04 02:10:15', 1),
(58, 38, 46, 1, 0, 200, 10, 5, '', '2018-10-08 11:10:05', 1, '2018-10-08 11:10:05', 1),
(59, 38, 47, 2, 0, 250, 20, 10, '', '2018-10-08 11:10:05', 1, '2018-10-08 11:10:05', 1),
(60, 39, 49, 1, 0, 200, 20, 15, '', '2018-10-08 11:10:09', 1, '2018-10-08 11:10:09', 1),
(61, 39, 50, 2, 0, 250, 20, 18, '', '2018-10-08 11:10:09', 1, '2018-10-08 11:10:09', 1),
(62, 41, 54, 1, 0, 175, 0, 0, '', '2018-10-08 03:10:26', 1, '2018-10-08 03:10:26', 1),
(63, 42, 55, 1, 0, 175, 200, 158, 'OKE', '2018-10-08 03:10:42', 1, '2018-10-08 03:10:42', 1),
(64, 43, 56, 1, 0, 200, 200, 180, 'SUKSES', '2018-10-08 03:10:57', 1, '2018-10-08 03:10:57', 1),
(65, 44, 57, 1, 0, 150, 100, 20, '', '2018-10-10 02:10:38', 1, '2018-10-10 02:10:38', 1),
(66, 44, 58, 2, 0, 100, 20, 10, '', '2018-10-10 02:10:38', 1, '2018-10-10 02:10:38', 1),
(67, 45, 66, 1, 0, 75, 122, 100, '', '2018-10-31 04:10:10', 1, '2018-10-31 04:10:10', 1),
(68, 46, 68, 2, 0, 100, 130, 100, 'MANUAL TIMBANGAN', '2018-11-01 03:11:19', 1, '2018-11-01 03:11:19', 1),
(69, 47, 71, 1, 0, 5, 100, 80, '', '2018-11-13 01:11:35', 1, '2018-11-13 01:11:35', 1),
(70, 47, 72, 2, 0, 10, 200, 180, '', '2018-11-13 01:11:35', 1, '2018-11-13 01:11:35', 1),
(71, 48, 76, 1, 0, 100, 50, 25, 'TEST 1', '2018-11-21 12:11:24', 1, '2018-11-21 12:11:24', 1),
(72, 48, 83, 1, 0, 100, 50, 25, 'TEST 2', '2018-11-21 12:11:24', 1, '2018-11-21 12:11:24', 1),
(73, 48, 84, 2, 0, 200, 100, 77, 'PPT 1', '2018-11-21 12:11:24', 1, '2018-11-21 12:11:24', 1),
(74, 48, 85, 2, 0, 50, 50, 23, 'PPT 2', '2018-11-21 12:11:24', 1, '2018-11-21 12:11:24', 1),
(75, 49, 86, 1, 0, 12, 120, 108, 'TEST', '2018-11-21 04:11:46', 1, '2018-11-21 04:11:46', 1),
(76, 50, 67, 2, 0, 150, 330, 300, '', '2018-11-22 09:11:36', 1, '2018-11-22 09:11:36', 1),
(77, 51, 88, 2, 0, 100, 100, 80, '', '2018-11-22 09:11:08', 1, '2018-11-22 09:11:08', 1),
(78, 52, 89, 32, 0, 7, 70, 58, '', '2018-11-22 11:11:13', 1, '2018-11-22 11:11:13', 1),
(79, 52, 90, 34, 0, 10, 100, 84, '', '2018-11-22 11:11:13', 1, '2018-11-22 11:11:13', 1),
(80, 52, 91, 36, 0, 15, 150, 140, '', '2018-11-22 11:11:13', 1, '2018-11-22 11:11:13', 1),
(81, 52, 92, 46, 0, 3, 30, 25, '', '2018-11-22 11:11:13', 1, '2018-11-22 11:11:13', 1),
(82, 52, 93, 38, 0, 4, 80, 72, '', '2018-11-22 11:11:13', 1, '2018-11-22 11:11:13', 1),
(83, 52, 94, 47, 0, 3, 60, 51, '', '2018-11-22 11:11:13', 1, '2018-11-22 11:11:13', 1),
(84, 53, 95, 71, 0, 15, 60, 27, '', '2018-11-22 01:11:01', 1, '2018-11-22 01:11:01', 1),
(85, 53, 96, 73, 0, 10, 50, 39, '', '2018-11-22 01:11:01', 1, '2018-11-22 01:11:01', 1),
(86, 53, 97, 70, 0, 3, 30, 27, '', '2018-11-22 01:11:01', 1, '2018-11-22 01:11:01', 1),
(87, 54, 69, 2, 0, 100, 130, 100, 'TEST TIMBANG', '2018-11-27 03:11:29', 1, '2018-11-27 03:11:29', 1),
(90, 56, 106, 1, 0, 250, 250, 218, '', '2018-11-30 05:11:19', 1, '2018-11-30 05:11:19', 1),
(91, 56, 107, 2, 0, 200, 200, 162, '', '2018-11-30 05:11:19', 1, '2018-11-30 05:11:19', 1),
(92, 57, 108, 1, 0, 100, 100, 95, '', '2018-11-30 06:11:57', 1, '2018-11-30 06:11:57', 1),
(93, 58, 109, 1, 0, 40, 50, 44, '', '2018-11-30 07:11:32', 1, '2018-11-30 07:11:32', 1),
(94, 59, 110, 12, 0, 3, 4, 3, '', '2018-11-30 07:11:39', 1, '2018-11-30 07:11:39', 1),
(95, 59, 111, 76, 0, 10, 12, 10, '', '2018-11-30 07:11:39', 1, '2018-11-30 07:11:39', 1),
(96, 60, 112, 76, 0, 5, 6, 5, '', '2018-11-30 07:11:43', 1, '2018-11-30 07:11:43', 1),
(97, 61, 113, 45, 0, 3, 60, 49, '', '2018-12-03 10:12:51', 1, '2018-12-03 10:12:51', 1),
(98, 62, 114, 12, 0, 60, 75, 63, '', '2018-12-03 12:12:19', 1, '2018-12-03 12:12:19', 1),
(99, 63, 115, 9, 0, 50, 62, 50, '', '2018-12-03 01:12:27', 1, '2018-12-03 01:12:27', 1),
(100, 64, 116, 9, 0, 25, 30, 25, '', '2018-12-03 01:12:12', 1, '2018-12-03 01:12:12', 1),
(101, 65, 117, 9, 0, 25, 30, 25, '', '2018-12-03 01:12:07', 1, '2018-12-03 01:12:07', 1),
(102, 66, 118, 10, 0, 50, 70, 54, '', '2018-12-04 02:12:06', 1, '2018-12-04 02:12:06', 1),
(103, 67, 119, 48, 0, 40, 418, 400, '', '2018-12-04 05:12:36', 1, '2018-12-04 05:12:36', 1),
(104, 67, 120, 43, 0, 40, 432, 412, '', '2018-12-04 05:12:36', 1, '2018-12-04 05:12:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_bobbin_trx`
--

CREATE TABLE `t_bobbin_trx` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bobbin_id` int(11) NOT NULL,
  `m_bobbin_status_id` int(11) NOT NULL,
  `doc_number` varchar(255) NOT NULL,
  `doc_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bpb_ampas`
--

CREATE TABLE `t_bpb_ampas` (
  `id` int(11) NOT NULL,
  `no_bpb` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `spb_ampas_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `hasil_wip_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  `approved_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bpb_ampas`
--

INSERT INTO `t_bpb_ampas` (`id`, `no_bpb`, `status`, `spb_ampas_id`, `keterangan`, `hasil_wip_id`, `created_by`, `created`, `approved_by`, `approved_date`) VALUES
(1, 'BPB-AMP.16102018.0001', 0, 0, '', 11, 1, '2018-10-16 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'BPB-AMP.31102018.0001', 0, 0, '', 18, 1, '2018-10-31 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'BPB-AMP.01112018.0001', 0, 0, '', 22, 1, '2018-11-01 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'BPB-AMP.23112018.0001', 0, 0, '', 26, 1, '2018-11-23 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 'BPB-AMP.23112018.0002', 0, 0, '', 28, 1, '2018-11-23 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 'BPB-AMP.27112018.0001', 0, 0, '', 32, 1, '2018-11-27 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_bpb_ampas_detail`
--

CREATE TABLE `t_bpb_ampas_detail` (
  `id` int(11) NOT NULL,
  `bpb_ampas_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `nomor_spb` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bpb_ampas_detail`
--

INSERT INTO `t_bpb_ampas_detail` (`id`, `bpb_ampas_id`, `created`, `jenis_barang_id`, `nomor_spb`, `qty`, `uom`, `berat`, `keterangan`, `created_by`) VALUES
(1, 1, '2018-10-16', 3, '', 0, 'KG', 10, 'SISA PRODUKSI INGOT', 1),
(2, 2, '2018-10-31', 3, '', 0, 'KG', 1, 'SISA PRODUKSI INGOT', 1),
(3, 3, '2018-11-01', 3, '', 0, 'KG', 2, 'SISA PRODUKSI INGOT', 1),
(4, 4, '2018-11-23', 3, '', 0, 'KG', 2, 'SISA PRODUKSI INGOT', 1),
(5, 5, '2018-11-23', 3, '', 0, 'KG', 3, 'SISA PRODUKSI INGOT', 1),
(6, 6, '2018-11-27', 3, '', 0, 'KG', 2, 'SISA PRODUKSI INGOT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_bpb_bobbin`
--

CREATE TABLE `t_bpb_bobbin` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nomor_BPB` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `dibuat_tgl` datetime NOT NULL,
  `disetujui_oleh` int(11) NOT NULL,
  `disetujui_tgl` datetime NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bpb_bobbin_detail`
--

CREATE TABLE `t_bpb_bobbin_detail` (
  `id` int(11) NOT NULL,
  `t_bpb_bobbin_id` int(11) NOT NULL,
  `m_jenis_packing_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `m_bobbin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bpb_fg`
--

CREATE TABLE `t_bpb_fg` (
  `id` int(11) NOT NULL,
  `no_bpb_fg` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `produksi_fg_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `keterangan` text,
  `approved_at` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `reject_remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bpb_fg`
--

INSERT INTO `t_bpb_fg` (`id`, `no_bpb_fg`, `tanggal`, `produksi_fg_id`, `jenis_barang_id`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`, `keterangan`, `approved_at`, `approved_by`, `rejected_at`, `rejected_by`, `reject_remarks`) VALUES
(6, 'BPB-SDM.24102018.0001', '2018-10-24', 3, 8, '2018-10-26 05:10:15', 1, NULL, NULL, 1, '', '2018-10-29 02:10:48', 1, NULL, NULL, NULL),
(7, 'BPB-SDM.25102018.0001', '2018-10-25', 4, 11, '2018-10-26 05:10:21', 1, NULL, NULL, 1, '', '2018-10-29 03:10:40', 1, NULL, NULL, NULL),
(8, 'BPB-SDM.25102018.0002', '2018-10-25', 5, 11, '2018-10-26 05:10:38', 1, NULL, NULL, 1, '', '2018-10-29 03:10:50', 1, NULL, NULL, NULL),
(9, 'BPB-SDM.26102018.0001', '2018-10-26', 7, 11, '2018-10-26 06:10:33', 1, NULL, NULL, 1, '', '2018-10-29 03:10:07', 1, NULL, NULL, NULL),
(10, 'BPB-SDM.26102018.0002', '2018-10-26', 6, 9, '2018-10-29 03:10:23', 1, NULL, NULL, 1, '', '2018-10-29 03:10:48', 1, NULL, NULL, NULL),
(14, 'BPB-SDM.31102018.0001', '2018-10-31', 12, 8, '2018-10-31 11:10:46', 1, NULL, NULL, 1, '', '2018-10-31 11:10:01', 1, NULL, NULL, NULL),
(15, 'BPB-SDM.31102018.0002', '2018-10-31', 13, 8, '2018-10-31 02:10:43', 1, NULL, NULL, 1, '', '2018-10-31 04:10:51', 1, NULL, NULL, NULL),
(16, 'BPB-SDM.31102018.0003', '2018-10-31', 14, 9, '2018-10-31 02:10:32', 1, NULL, NULL, 1, '', '2018-11-12 06:11:44', 1, NULL, NULL, NULL),
(17, 'BPB-SDM.01112018.0001', '2018-11-01', 18, 12, '2018-11-01 09:11:11', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'BPB-SDM.12112018.0004', '2018-11-12', 26, 12, '2018-11-12 06:11:03', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'BPB-SDM.12112018.0005', '2018-11-12', 25, 10, '2018-11-12 07:11:49', 1, NULL, NULL, 1, '', '2018-11-12 07:11:59', 1, NULL, NULL, NULL),
(23, 'BPB-SDM.21112018.0001', '2018-11-21', 27, 9, '2018-11-21 08:11:46', 1, NULL, NULL, 1, '', '2018-11-21 08:11:16', 1, NULL, NULL, NULL),
(24, 'BPB-SDM.23112018.0001', '2018-11-23', 28, 12, '2018-11-23 01:11:11', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'BPB-SDM.26112018.0001', '2018-11-26', 29, 400, '2018-11-26 10:11:24', 1, NULL, NULL, 1, '', '2018-11-26 10:11:10', 1, NULL, NULL, NULL),
(26, 'BPB-SDM.26112018.0002', '2018-11-26', 30, 164, '2018-11-26 10:11:45', 1, NULL, NULL, 1, '', '2018-11-26 10:11:44', 1, NULL, NULL, NULL),
(27, 'BPB-SDM.27112018.0001', '2018-11-27', 31, 13, '2018-11-27 05:11:10', 1, NULL, NULL, 1, '', '2018-12-03 04:12:02', 1, NULL, NULL, NULL),
(28, 'BPB-SDM.201811.0001', '2018-11-29', 32, 402, '2018-11-29 04:11:46', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'BPB-SDM.201811.0002', '2018-11-29', 33, 438, '2018-11-29 05:11:26', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'BPB-SDM.201811.0003', '2018-11-29', 34, 533, '2018-12-04 04:12:36', 1, NULL, NULL, 1, '', '2018-12-04 04:12:48', 1, NULL, NULL, NULL),
(31, 'BPB-SDM.201812.0001', '2018-12-04', 35, 142, '2018-12-04 05:12:10', 1, NULL, NULL, 1, '', '2018-12-04 05:12:19', 1, NULL, NULL, NULL),
(32, 'BPB-SDM.201812.0002', '2018-12-04', 36, 148, '2018-12-04 05:12:03', 1, NULL, NULL, 1, '', '2018-12-04 05:12:13', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_bpb_fg_detail`
--

CREATE TABLE `t_bpb_fg_detail` (
  `id` int(11) NOT NULL,
  `t_bpb_fg_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `no_packing_barcode` varchar(100) NOT NULL,
  `no_produksi` int(11) DEFAULT NULL,
  `bruto` float NOT NULL DEFAULT '0',
  `netto` float NOT NULL,
  `bobbin_id` int(11) NOT NULL,
  `flag_taken` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bpb_fg_detail`
--

INSERT INTO `t_bpb_fg_detail` (`id`, `t_bpb_fg_id`, `jenis_barang_id`, `no_packing_barcode`, `no_produksi`, `bruto`, `netto`, `bobbin_id`, `flag_taken`) VALUES
(6, 6, 8, '251018L01770008', 123, 28, 26.89, 18, 0),
(7, 6, 8, '251018M01770009', 321, 29, 28.71, 19, 0),
(8, 6, 8, '251018M01770009', 222, 58, 45.948, 19, 0),
(9, 6, 8, '251018L01770008', 111, 79, 67.9, 18, 0),
(10, 6, 8, '251018M01770009', 333, 92, 79.068, 19, 0),
(11, 7, 11, '181025B00150011', NULL, 0, 12.22, 21, 0),
(12, 7, 11, '181025B00150011', NULL, 0, 11.28, 21, 0),
(13, 7, 11, '181025A00150010', NULL, 0, 9.33, 20, 0),
(14, 8, 11, '181026R00150321', 321, 0, 19.33, 26, 0),
(15, 8, 11, '181026R00151235', 1235, 0, 22.12, 26, 0),
(16, 9, 11, '181026B00150117', NULL, 0, 12.33, 21, 0),
(17, 9, 11, '181026B00150118', NULL, 0, 12.77, 21, 0),
(18, 9, 11, '181026B00150117', NULL, 0, 27.88, 21, 0),
(19, 9, 11, '181026B00150119', NULL, 0, 21.33, 21, 0),
(20, 10, 9, '181026L01630013', 123, 72, 64.34, 27, 0),
(21, 10, 9, '181026L01630014', 312, 90, 72.88, 28, 0),
(23, 14, 8, '1810310177', 333, 10, 45, 19, 0),
(24, 15, 8, '181031l01770013', 332, 117, 100, 27, 0),
(25, 16, 9, '181031l01630008', 334, 333, 300, 18, 0),
(26, 17, 12, '181101B00160114', NULL, 0, 30, 21, 0),
(27, 17, 12, '181101B00160111', NULL, 0, 50, 21, 0),
(28, 17, 12, '181101B00160116', NULL, 0, 40, 21, 0),
(29, 17, 12, '181101B00160112', NULL, 0, 70, 21, 0),
(33, 21, 12, '181112R00160336', 336, 0, 30, 26, 0),
(34, 22, 10, '181112M01400009', 338, 80, 67.068, 19, 0),
(35, 23, 9, '181121M01630009', 467, 40, 27.068, 19, 0),
(36, 24, 12, '181123M00160009', 351, 150, 137.068, 19, 0),
(37, 25, 400, '181126A0106', NULL, 0, 100, 20, 0),
(38, 25, 400, '181126A0105', NULL, 0, 50, 20, 0),
(39, 26, 164, '181126M0009', 5555, 70, 57.068, 19, 0),
(40, 26, 164, '181126M0009', 5556, 78, 65.068, 19, 0),
(41, 27, 13, '181127A00140167', NULL, 0, 40, 30, 0),
(42, 27, 13, '181127A00140161', NULL, 0, 45, 30, 0),
(43, 28, 402, '181129R5558', 5558, 0, 30, 26, 0),
(44, 28, 402, '181129R5559', 5559, 0, 60, 26, 0),
(45, 29, 438, '181129B0116', NULL, 0, 90, 21, 0),
(46, 29, 438, '181129B0111', NULL, 0, 80, 21, 0),
(47, 29, 438, '181129B0113', NULL, 0, 70, 21, 0),
(48, 29, 438, '181129B01119', NULL, 0, 60, 21, 0),
(49, 30, 533, '181204M0009', 6678, 46, 33.068, 19, 0),
(50, 31, 142, '181204M0009', 6679, 60, 47.068, 19, 0),
(51, 32, 148, '181204R6681', 6681, 0, 15, 26, 0),
(52, 32, 148, '181204R6682', 6682, 0, 35, 26, 0),
(53, 32, 148, '181204R6683', 6683, 0, 45, 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_bpb_wip`
--

CREATE TABLE `t_bpb_wip` (
  `id` int(11) NOT NULL,
  `no_bpb` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `spb_wip_id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `hasil_wip_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  `approved_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bpb_wip`
--

INSERT INTO `t_bpb_wip` (`id`, `no_bpb`, `status`, `spb_wip_id`, `keterangan`, `hasil_wip_id`, `created_by`, `created`, `approved_by`, `approved_date`) VALUES
(8, 'BPB-WIP.16102018.0005', 1, 0, '', 10, 1, '2018-10-16 00:00:00', 1, '2018-10-17 03:10:01'),
(9, 'BPB-WIP.31102018.0001', 1, 0, '', 18, 1, '2018-10-31 00:00:00', 1, '2018-10-31 02:10:20'),
(10, 'BPB-WIP.01112018.0001', 1, 0, 'DITERIMA UNTUK STOK INGOT WIP', 22, 1, '2018-11-01 00:00:00', 1, '2018-11-01 05:11:05'),
(11, 'BPB-WIP.23112018.0001', 1, 0, '', 26, 1, '2018-11-23 00:00:00', 1, '2018-11-23 01:11:46'),
(12, 'BPB-WIP.23112018.0002', 1, 0, '', 28, 1, '2018-11-23 00:00:00', 1, '2018-11-23 02:11:45'),
(13, 'BPB-WIP.27112018.0001', 1, 0, '', 32, 1, '2018-11-27 00:00:00', 1, '2018-11-27 11:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `t_bpb_wip_detail`
--

CREATE TABLE `t_bpb_wip_detail` (
  `id` int(11) NOT NULL,
  `bpb_wip_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `spb_wip_detail_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bpb_wip_detail`
--

INSERT INTO `t_bpb_wip_detail` (`id`, `bpb_wip_id`, `created`, `jenis_barang_id`, `spb_wip_detail_id`, `qty`, `uom`, `berat`, `keterangan`, `created_by`) VALUES
(5, 6, '2018-10-16', 2, 0, 7, 'BATANG', 20, '', 1),
(6, 7, '2018-10-16', 2, 0, 4, 'BATANG', 15, '', 1),
(7, 8, '2018-10-16', 2, 0, 20, 'BATANG', 166, '', 1),
(8, 9, '2018-10-31', 2, 0, 2, 'BATANG', 10, '', 1),
(9, 10, '2018-11-01', 2, 0, 5, 'BATANG', 50, '', 1),
(10, 11, '2018-11-23', 2, 0, 50, 'BATANG', 100, '', 1),
(11, 12, '2018-11-23', 2, 0, 15, 'BATANG', 20, '', 1),
(12, 13, '2018-11-27', 2, 0, 120, 'BATANG', 60, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_delivery_order`
--

CREATE TABLE `t_delivery_order` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_delivery_order` varchar(50) NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `m_agen_id` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_delivery_order`
--

INSERT INTO `t_delivery_order` (`id`, `tanggal`, `no_delivery_order`, `m_customer_id`, `m_agen_id`, `catatan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(4, '2017-10-17', 'DO.PBRK.17102017.0001', 0, 4, '', '2017-10-17 12:10:47', 1, '2017-10-17 12:10:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_delivery_order_detail`
--

CREATE TABLE `t_delivery_order_detail` (
  `id` int(11) NOT NULL,
  `t_delivery_order_id` int(11) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `sak` int(2) NOT NULL,
  `jumlah_sak` int(11) NOT NULL,
  `harga` double NOT NULL,
  `total_harga` double NOT NULL,
  `catatan` varchar(75) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_delivery_order_detail`
--

INSERT INTO `t_delivery_order_detail` (`id`, `t_delivery_order_id`, `merek`, `sak`, `jumlah_sak`, `harga`, `total_harga`, `catatan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(6, 4, 'PULAU', 25, 100, 125000, 12500000, '', '2017-10-17 12:10:47', 1, '2017-10-17 12:10:47', 1),
(7, 4, 'KWR', 25, 25, 122000, 3050000, '', '2017-10-17 12:10:47', 1, '2017-10-17 12:10:47', 1),
(8, 4, 'POLOS', 50, 20, 228000, 4560000, '', '2017-10-17 12:10:47', 1, '2017-10-17 12:10:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_gudang_ampas`
--

CREATE TABLE `t_gudang_ampas` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `berat` int(11) NOT NULL,
  `asal proses` varchar(255) NOT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `dibuat_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_gudang_fg`
--

CREATE TABLE `t_gudang_fg` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_trx` int(11) NOT NULL,
  `flag_taken` tinyint(1) NOT NULL DEFAULT '0',
  `jenis_barang_id` int(11) NOT NULL,
  `t_bpb_fg_id` int(11) NOT NULL,
  `t_bpb_fg_detail_id` int(11) DEFAULT NULL,
  `t_spb_fg_id` int(11) DEFAULT NULL,
  `t_spb_fg_detail_id` int(11) DEFAULT NULL,
  `nomor_SPB` varchar(50) DEFAULT NULL,
  `nomor_BPB` varchar(50) DEFAULT NULL,
  `bruto` float NOT NULL DEFAULT '0',
  `netto` float NOT NULL DEFAULT '0',
  `no_produksi` varchar(50) DEFAULT NULL,
  `no_packing` varchar(50) NOT NULL,
  `bobbin_id` int(11) DEFAULT NULL,
  `nomor_bobbin` varchar(35) DEFAULT NULL,
  `keterangan` text,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_date` date NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gudang_fg`
--

INSERT INTO `t_gudang_fg` (`id`, `tanggal`, `jenis_trx`, `flag_taken`, `jenis_barang_id`, `t_bpb_fg_id`, `t_bpb_fg_detail_id`, `t_spb_fg_id`, `t_spb_fg_detail_id`, `nomor_SPB`, `nomor_BPB`, `bruto`, `netto`, `no_produksi`, `no_packing`, `bobbin_id`, `nomor_bobbin`, `keterangan`, `created_by`, `created_at`, `modified_date`, `modified_by`) VALUES
(19, '2018-10-29', 1, 0, 8, 6, 6, 17, 6, 'SPB-FG051120180002', 'BPB-SDM.24102018.0001', 28, 26.89, '123', '251018L01770008', 18, 'L0008', '1 CUKUP', 1, '2018-10-29 02:10:48', '2018-11-05', 1),
(20, '2018-10-29', 1, 0, 8, 6, 7, 18, 6, 'SPB-FG071120180001', 'BPB-SDM.24102018.0001', 29, 28.71, '322', '251018M01770009', 19, 'M0009', '', 1, '2018-10-29 02:10:48', '2018-11-07', 1),
(21, '2018-10-29', 1, 1, 8, 6, 8, 33, 36, 'SPB-FG211120180007', 'BPB-SDM.24102018.0001', 58, 45.948, '222', '251018M01770009', 19, 'M0009', '', 1, '2018-10-29 02:10:48', '2018-11-21', 1),
(22, '2018-10-29', 1, 1, 8, 6, 9, 37, 41, 'SPB-FG261120180003', 'BPB-SDM.24102018.0001', 79, 67.9, '111', '251018L01770008', 18, 'L0008', '', 1, '2018-10-29 02:10:48', '2018-11-26', 1),
(23, '2018-10-29', 1, 1, 8, 6, 10, 26, 31, 'SPB-FG201120180001', 'BPB-SDM.24102018.0001', 92, 79.068, '333', '251018M01770009', 19, 'M0009', 'PACK 2', 1, '2018-10-29 02:10:48', '2018-11-21', 1),
(24, '2018-10-29', 1, 0, 11, 7, 11, 15, 8, 'SPB-FG011120180001', 'BPB-SDM.25102018.0001', 0, 12.22, NULL, '181025B00150011', NULL, NULL, 'TEST 1', 1, '2018-10-29 03:10:51', '2018-11-05', 1),
(25, '2018-10-29', 1, 0, 11, 7, 12, 15, 8, 'SPB-FG011120180001', 'BPB-SDM.25102018.0001', 0, 11.28, NULL, '181025B00150011', NULL, NULL, 'TEST 2', 1, '2018-10-29 03:10:51', '2018-11-05', 1),
(26, '2018-10-29', 1, 0, 11, 7, 13, 15, 8, 'SPB-FG011120180001', 'BPB-SDM.25102018.0001', 0, 9.33, NULL, '181025A00150010', NULL, NULL, 'TEST 3', 1, '2018-10-29 03:10:51', '2018-11-05', 1),
(27, '2018-10-29', 1, 0, 11, 7, 11, 17, 8, 'SPB-FG051120180002', 'BPB-SDM.25102018.0001', 0, 12.22, NULL, '181025B00150011', NULL, NULL, 'LEBIH DIKIT', 1, '2018-10-29 03:10:40', '2018-11-05', 1),
(28, '2018-10-29', 1, 0, 11, 7, 12, 18, 8, 'SPB-FG071120180001', 'BPB-SDM.25102018.0001', 0, 11.28, NULL, '181025B00150011', NULL, NULL, '', 1, '2018-10-29 03:10:40', '2018-11-07', 1),
(29, '2018-10-29', 1, 1, 11, 7, 13, 26, 32, 'SPB-FG201120180001', 'BPB-SDM.25102018.0001', 0, 9.33, NULL, '181025A00150010', NULL, NULL, '0.15 PACK 3', 1, '2018-10-29 03:10:40', '2018-11-21', 1),
(30, '2018-10-29', 0, 0, 11, 8, 14, NULL, NULL, NULL, 'BPB-SDM.25102018.0002', 0, 19.33, '321', '181026R00150321', NULL, NULL, NULL, 1, '2018-10-29 03:10:50', '2018-11-29', 1),
(31, '2018-10-29', 0, 0, 11, 8, 15, NULL, NULL, NULL, 'BPB-SDM.25102018.0002', 0, 22.12, '1235', '181026R00151235', NULL, NULL, '', 1, '2018-10-29 03:10:50', '2018-11-14', 1),
(32, '2018-10-29', 1, 1, 11, 9, 16, 26, 32, 'SPB-FG201120180001', 'BPB-SDM.26102018.0001', 0, 12.33, NULL, '181026B00150117', NULL, NULL, '0.15 PACK 2', 1, '2018-10-29 03:10:07', '2018-11-21', 1),
(33, '2018-10-29', 0, 0, 11, 9, 17, NULL, NULL, NULL, 'BPB-SDM.26102018.0001', 0, 12.77, NULL, '181026B00150118', NULL, NULL, NULL, 1, '2018-10-29 03:10:07', '0000-00-00', 0),
(34, '2018-10-29', 1, 1, 11, 9, 18, 26, 32, 'SPB-FG201120180001', 'BPB-SDM.26102018.0001', 0, 27.88, NULL, '181026B00150117', NULL, NULL, '0.15 PACK 1', 1, '2018-10-29 03:10:07', '2018-11-21', 1),
(35, '2018-10-29', 0, 0, 11, 9, 19, NULL, NULL, NULL, 'BPB-SDM.26102018.0001', 0, 21.33, NULL, '181026B00150119', NULL, NULL, '', 1, '2018-10-29 03:10:07', '2018-11-14', 1),
(36, '2018-10-29', 1, 0, 9, 10, 20, 21, 16, 'SPB-FG121120180002', 'BPB-SDM.26102018.0002', 72, 64.34, '124', '181026L01630013', 27, 'L0013', '', 1, '2018-10-29 03:10:48', '2018-11-12', 1),
(37, '2018-10-29', 1, 1, 9, 10, 21, 29, 35, 'SPB-FG211120180003', 'BPB-SDM.26102018.0002', 90, 72.88, '312', '181026L01630014', 28, 'L0014', '', 1, '2018-10-29 03:10:48', '2018-11-21', 1),
(38, '2018-10-31', 1, 0, 8, 14, 23, 20, 15, 'SPB-FG121120180001', 'BPB-SDM.31102018.0001', 10, 45, '343', '1810310177', 19, 'M0009', '', 1, '2018-10-31 11:10:01', '2018-11-12', 1),
(39, '2018-10-31', 1, 1, 8, 15, 24, 26, 31, 'SPB-FG201120180001', 'BPB-SDM.31102018.0002', 117, 100, '332', '181031l01770013', 27, 'L0013', 'PACK 1', 1, '2018-10-31 04:10:51', '2018-11-21', 1),
(40, '2018-11-12', 1, 1, 9, 16, 25, 39, 43, 'SPB-FG261120180005', 'BPB-SDM.31102018.0003', 333, 300, '334', '181031l01630008', 18, 'L0008', '', 1, '2018-11-12 06:11:44', '2018-11-26', 1),
(44, '2018-11-12', 1, 0, 10, 22, 34, 21, 17, 'SPB-FG121120180002', 'BPB-SDM.12112018.0005', 80, 67.068, '338', '181112M01400009', 19, 'M0009', '', 1, '2018-11-12 07:11:59', '2018-11-12', 1),
(45, '2018-11-21', 1, 1, 9, 23, 35, 33, 37, 'SPB-FG211120180007', 'BPB-SDM.21112018.0001', 40, 27.068, '467', '181121M01630009', 19, 'M0009', '', 1, '2018-11-21 08:11:16', '2018-11-21', 1),
(46, '2018-11-26', 0, 0, 400, 25, 37, NULL, NULL, NULL, 'BPB-SDM.26112018.0001', 0, 100, NULL, '181126A0106', NULL, NULL, NULL, 1, '2018-11-26 10:11:10', '0000-00-00', 0),
(47, '2018-11-26', 1, 0, 400, 25, 38, 35, 39, 'SPB-FG261120180001', 'BPB-SDM.26112018.0001', 0, 50, NULL, '181126A0105', NULL, NULL, '', 1, '2018-11-26 10:11:10', '2018-11-26', 1),
(48, '2018-11-26', 1, 0, 164, 26, 39, 35, 38, 'SPB-FG261120180001', 'BPB-SDM.26112018.0002', 70, 57.068, '5555', '181126M0009', 19, 'M0009', '', 1, '2018-11-26 10:11:44', '2018-11-26', 1),
(49, '2018-11-26', 0, 0, 164, 26, 40, NULL, NULL, NULL, 'BPB-SDM.26112018.0002', 78, 65.068, '5556', '181126M0009', 19, 'M0009', NULL, 1, '2018-11-26 10:11:44', '0000-00-00', 0),
(50, '2018-12-03', 0, 0, 13, 27, 41, NULL, NULL, NULL, 'BPB-SDM.27112018.0001', 0, 40, NULL, '181127A00140167', NULL, NULL, NULL, 1, '2018-12-03 04:12:02', '0000-00-00', 0),
(51, '2018-12-03', 0, 0, 13, 27, 42, NULL, NULL, NULL, 'BPB-SDM.27112018.0001', 0, 45, NULL, '181127A00140161', NULL, NULL, NULL, 1, '2018-12-03 04:12:02', '0000-00-00', 0),
(52, '2018-12-04', 0, 0, 533, 30, 49, NULL, NULL, NULL, 'BPB-SDM.201811.0003', 46, 33.068, '6678', '181204M0009', 19, 'M0009', NULL, 1, '2018-12-04 04:12:48', '0000-00-00', 0),
(53, '2018-12-04', 1, 0, 148, 32, 51, 40, 45, 'SPB-FG2018110001', 'BPB-SDM.201812.0002', 0, 15, '6681', '181204R6681', NULL, NULL, '', 1, '2018-12-04 05:12:13', '2018-12-04', 1),
(54, '2018-12-04', 0, 0, 148, 32, 52, NULL, NULL, NULL, 'BPB-SDM.201812.0002', 0, 35, '6682', '181204R6682', NULL, NULL, NULL, 1, '2018-12-04 05:12:13', '0000-00-00', 0),
(55, '2018-12-04', 0, 0, 148, 32, 53, NULL, NULL, NULL, 'BPB-SDM.201812.0002', 0, 45, '6683', '181204R6683', NULL, NULL, NULL, 1, '2018-12-04 05:12:13', '0000-00-00', 0),
(56, '2018-12-04', 1, 0, 142, 31, 50, 40, 44, 'SPB-FG2018110001', 'BPB-SDM.201812.0001', 60, 47.068, '6679', '181204M0009', 19, 'M0009', '', 1, '2018-12-04 05:12:19', '2018-12-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_gudang_wip`
--

CREATE TABLE `t_gudang_wip` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `flag_taken` int(11) NOT NULL,
  `jenis_trx` tinyint(1) DEFAULT NULL,
  `t_hasil_wip_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `t_spb_wip_detail_id` int(11) NOT NULL,
  `t_bpb_wip_detail_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` text,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gudang_wip`
--

INSERT INTO `t_gudang_wip` (`id`, `tanggal`, `flag_taken`, `jenis_trx`, `t_hasil_wip_id`, `jenis_barang_id`, `t_spb_wip_detail_id`, `t_bpb_wip_detail_id`, `qty`, `uom`, `berat`, `keterangan`, `created_by`, `created_on`) VALUES
(1, '2018-10-17', 0, 0, 11, 2, 0, 7, 20, 'BATANG', 166, NULL, 1, '2018-10-17 15:38:26'),
(6, '2018-10-19', 0, 1, 0, 2, 4, 0, 2, 'BATANG', 5, 'OKE INGOT', 1, '2018-10-19 16:21:43'),
(7, '2018-10-19', 0, 1, 0, 5, 5, 0, 1, 'ROLL', 3, 'OKE KAWAT MERAH', 1, '2018-10-19 16:21:43'),
(8, '2018-10-30', 0, 1, 0, 2, 7, 0, 1, 'BATANG', 1, '', 1, '2018-10-30 14:48:58'),
(9, '2018-10-31', 0, NULL, 18, 2, 0, 8, 2, 'BATANG', 10, NULL, 1, '2018-10-31 14:03:20'),
(11, '2018-11-01', 0, 1, 0, 2, 7, 0, 2, 'BATANG', 3, '', 1, '2018-11-01 14:35:15'),
(12, '2018-11-01', 0, 1, 0, 5, 5, 0, 1, 'ROLL', 2, '', 1, '2018-11-01 14:35:15'),
(13, '2018-11-01', 0, 1, 0, 2, 18, 0, 2, 'BATANG', 30, '', 1, '2018-11-01 14:46:52'),
(14, '2018-11-01', 0, NULL, 22, 2, 0, 9, 5, 'BATANG', 50, NULL, 1, '2018-11-01 17:05:05'),
(15, '2018-11-08', 0, 1, 0, 2, 7, 0, 2, 'BATANG', 2, 'OKEE', 1, '2018-11-08 10:51:12'),
(16, '2018-11-13', 0, 1, 0, 2, 20, 0, 1, 'BATANG', 2, '', 1, '2018-11-13 11:33:09'),
(17, '2018-11-13', 0, 1, 0, 2, 0, 0, 0, '', 0, '', 1, '2018-11-13 11:33:09'),
(18, '2018-11-13', 0, 1, 0, 2, 21, 0, 1, 'BATANG', 10, '', 1, '2018-11-13 11:35:29'),
(19, '2018-11-13', 0, 1, 0, 2, 22, 0, 1, 'BATANG', 13, '', 1, '2018-11-13 11:43:41'),
(20, '2018-11-13', 0, 1, 0, 2, 23, 0, 2, 'BATANG', 22, '', 1, '2018-11-13 12:25:47'),
(21, '2018-11-15', 0, 1, 0, 2, 30, 0, 20, 'BATANG', 102, '', 1, '2018-11-15 12:53:05'),
(22, '2018-11-23', 0, NULL, 26, 2, 0, 10, 50, 'BATANG', 100, NULL, 1, '2018-11-23 13:17:46'),
(23, '2018-11-23', 0, NULL, 28, 2, 0, 11, 15, 'BATANG', 20, NULL, 1, '2018-11-23 14:02:45'),
(24, '2018-11-27', 0, NULL, 32, 2, 0, 12, 120, 'BATANG', 60, NULL, 1, '2018-11-27 11:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `t_hasil_masak`
--

CREATE TABLE `t_hasil_masak` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `kayu` int(11) NOT NULL,
  `gas` int(11) NOT NULL,
  `no_bpb_rongsok` varchar(255) NOT NULL,
  `no_masak` varchar(255) NOT NULL,
  `total_rongsok` int(11) NOT NULL,
  `ingot` int(11) NOT NULL,
  `berat_ingot` int(11) NOT NULL,
  `bs` int(11) NOT NULL,
  `susut` int(11) NOT NULL,
  `ampas` int(11) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hasil_masak`
--

INSERT INTO `t_hasil_masak` (`id`, `tanggal`, `mulai`, `selesai`, `kayu`, `gas`, `no_bpb_rongsok`, `no_masak`, `total_rongsok`, `ingot`, `berat_ingot`, `bs`, `susut`, `ampas`, `created_by`) VALUES
(3, '2018-10-15', '08:15:00', '10:15:00', 100, 10, 'SPB.04102018.0004', '14', 35, 3, 10, 10, 15, 5, 1),
(4, '2018-10-15', '11:10:00', '14:40:00', 175, 40, 'SPB.15102018.0001', '17', 28, 4, 20, 5, 3, 2, 1),
(12, '2018-10-16', '07:22:00', '11:54:00', 31, 13, 'SPB.16102018.0002', 'asds', 25, 4, 15, 4, 6, 3, 1),
(13, '2018-10-16', '09:09:00', '00:44:00', 25, 13, 'SPB.16102018.0001', 'PRD.16102018.0001', 180, 20, 166, 10, 4, 2, 1),
(15, '2018-11-01', '09:00:00', '11:00:00', 13, 5, 'SPB.01112018.0001', '27', 100, 5, 50, 2, 48, 2, 1),
(16, '2018-11-23', '09:00:00', '10:00:00', 44, 30, 'SPB.23112018.0001', '32', 160, 50, 100, 2, 58, 3, 1),
(17, '2018-11-23', '09:00:00', '11:00:00', 13, 5, 'SPB.22112018.0002', '30', 25, 15, 20, 3, 2, 5, 1),
(18, '2018-11-27', '11:00:00', '12:00:00', 13, 10, 'SPB.27112018.0001', '35', 77, 120, 60, 2, 15, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_hasil_wip`
--

CREATE TABLE `t_hasil_wip` (
  `id` int(11) NOT NULL,
  `no_produksi_wip` varchar(30) NOT NULL,
  `hasil_masak_id` int(11) NOT NULL,
  `jenis_masak` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `susut` int(11) NOT NULL,
  `keras` int(11) NOT NULL,
  `bs` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hasil_wip`
--

INSERT INTO `t_hasil_wip` (`id`, `no_produksi_wip`, `hasil_masak_id`, `jenis_masak`, `tanggal`, `jenis_barang_id`, `qty`, `uom`, `berat`, `susut`, `keras`, `bs`, `created_by`, `created`) VALUES
(1, '', 0, 'BAKAR ULANG', '2018-10-16', 5, 10, 'ROLL', 5, 3, 0, 0, 1, '2018-10-16 12:44:57'),
(2, '', 0, 'ROLLING', '2018-10-16', 6, 17, 'ROLL', 15, 0, 5, 3, 1, '2018-10-16 12:45:42'),
(10, '', 12, 'INGOT', '2018-10-16', 2, 4, 'BATANG', 15, 0, 0, 0, 1, '2018-10-16 18:33:33'),
(11, '', 13, 'INGOT', '2018-10-16', 2, 20, 'BATANG', 166, 0, 0, 0, 1, '2018-10-16 19:15:55'),
(12, '', 0, 'CUCI', '2018-10-16', 5, 10, 'ROLL', 5, 3, 0, 0, 1, '2018-10-16 12:44:57'),
(13, 'PRD-WIP.22102018.0003', 0, 'ROLLING', '2018-10-22', 5, 0, 'ROLL', 0, 0, 3, 2, 1, '2018-10-22 21:31:22'),
(14, 'PRD-WIP.22102018.0005', 0, 'ROLLING', '2018-10-22', 5, 9, 'ROLL', 8, 0, 2, 1, 1, '2018-10-22 21:35:40'),
(15, 'PRD-WIP.22102018.0006', 0, 'CUCI', '2018-10-22', 5, 5, 'ROLL', 4, 3, 0, 0, 1, '2018-10-22 21:36:09'),
(16, 'PRD-WIP.23102018.0001', 0, 'ROLLING', '2018-10-23', 5, 9, 'ROLL', 8, 0, 2, 1, 1, '2018-10-23 10:50:58'),
(17, 'PRD-WIP.23102018.0002', 0, 'BAKAR ULANG', '2018-10-23', 5, 5, 'ROLL', 3, 0, 2, 1, 1, '2018-10-23 10:55:22'),
(18, '', 14, 'INGOT', '2018-10-31', 2, 2, 'BATANG', 10, 0, 0, 0, 1, '2018-10-31 10:50:10'),
(19, 'PRD-WIP.31102018.0001', 0, 'ROLLING', '2018-10-31', 5, 5, 'ROLL', 3, 0, 50, 30, 1, '2018-10-31 11:23:03'),
(20, 'PRD-WIP.31102018.0002', 0, 'ROLLING', '2018-10-31', 5, 5, 'ROLL', 10, 0, 2, 2, 1, '2018-10-31 14:40:26'),
(21, 'PRD-WIP.31102018.0003', 0, 'ROLLING', '2018-10-31', 5, 6, 'ROLL', 10, 0, 2, 2, 1, '2018-10-31 14:52:21'),
(22, '', 15, 'INGOT', '2018-11-01', 2, 5, 'BATANG', 50, 0, 0, 0, 1, '2018-11-01 17:04:23'),
(23, 'PRD-WIP.12112018.0001', 0, 'ROLLING', '2018-11-12', 5, 6, 'ROLL', 12, 0, 15, 0, 1, '2018-11-12 16:56:25'),
(24, 'PRD-WIP.19112018.0001', 0, 'ROLLING', '2018-11-19', 5, 50, 'ROLL', 100, 0, 5, 12, 1, '2018-11-19 13:22:20'),
(25, 'PRD-WIP.19112018.0002', 0, 'ROLLING', '2018-11-19', 5, 50, 'ROLL', 100, 0, 5, 12, 1, '2018-11-19 13:22:21'),
(26, '', 16, 'INGOT', '2018-11-23', 2, 50, 'BATANG', 100, 0, 0, 0, 1, '2018-11-23 13:16:28'),
(27, 'PRD-WIP.23112018.0001', 0, 'BAKAR ULANG', '2018-11-23', 5, 30, 'ROLL', 60, 0, 78, 18, 1, '2018-11-23 13:19:34'),
(28, '', 17, 'INGOT', '2018-11-23', 2, 15, 'BATANG', 20, 0, 0, 0, 1, '2018-11-23 13:51:21'),
(29, 'PRD-WIP.23112018.0002', 0, 'ROLLING', '2018-11-23', 5, 10, 'ROLL', 0, 0, 40, 3, 1, '2018-11-23 14:14:14'),
(30, 'PRD-WIP.23112018.0002', 0, 'ROLLING', '2018-11-23', 5, 10, 'ROLL', 0, 0, 40, 3, 1, '2018-11-23 14:14:14'),
(31, 'PRD-WIP.23112018.0003', 0, 'CUCI', '2018-11-23', 5, 11, 'ROLL', 24, 2, 0, 0, 1, '2018-11-23 14:18:44'),
(32, '', 18, 'INGOT', '2018-11-27', 2, 120, 'BATANG', 60, 0, 0, 0, 1, '2018-11-27 11:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `t_inventory`
--

CREATE TABLE `t_inventory` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jenis_item` varchar(100) NOT NULL,
  `stok_bruto` double NOT NULL,
  `stok_netto` double NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_inventory`
--

INSERT INTO `t_inventory` (`id`, `nama_produk`, `jenis_item`, `stok_bruto`, `stok_netto`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'BUSI', 'SPARE PART', 92, 92, '2016-02-25 06:02:56', 1, '2018-11-28 11:11:26', 1),
(2, 'CANGKUL BEKAS', 'RONGSOK', 2097, 5797, '2016-02-25 07:02:08', 1, '2018-11-21 04:11:46', 1),
(3, 'AMPAS 1', 'AMPAS', 170, 160, '2018-05-17 04:05:03', 1, '2018-11-13 02:11:54', 1),
(4, 'AMPAS 2', 'AMPAS', 55, 55, '2018-05-17 05:05:32', 1, '2018-05-17 05:05:32', 1),
(5, 'POTONGAN PIPA BAJA', 'RONGSOK', 3633, 3029, '2018-05-17 05:05:28', 1, '2018-11-21 12:11:24', 1),
(6, 'CANGKUL BEKAS', 'INGOT', 500, 500, '2018-05-17 05:05:49', 1, '2018-05-17 05:05:49', 1),
(7, 'BAN', 'SPARE PART', 55, 55, '2018-11-05 03:11:37', 1, '2018-11-28 01:11:18', 1),
(8, '06FB002- FIRE BRICK SK 36 @ 10 TON', 'SPARE PART', 10, 10, '2018-11-22 10:11:15', 1, '2018-11-22 10:11:15', 1),
(9, '06FB001- FIRE BRICK SK 36 @ 5 TON', 'SPARE PART', 21, 21, '2018-11-22 10:11:15', 1, '2018-12-04 03:12:01', 1),
(10, '06AA002- ABU ARANG @ 25 KG', 'SPARE PART', 15, 15, '2018-11-26 11:11:19', 1, '2018-11-28 04:11:06', 1),
(11, '06AB001- ARANG BAKAR', 'SPARE PART', 0, 0, '2018-11-26 11:11:19', 1, '2018-11-28 04:11:06', 1),
(16, '06AF001- ANTI FOAM (BUSA) DM 97', 'SPARE PART', 7, 7, '2018-11-28 11:11:51', 1, '2018-11-28 11:11:51', 1),
(17, '06AS001- AIR SETTING MORTAR TYPE TRISET ', 'SPARE PART', 2, 2, '2018-11-28 11:11:51', 1, '2018-11-28 11:11:51', 1),
(18, '06FB003- FIRE BRICK ( INDOPORLEN ) SK-36 @ 10 TON', 'SPARE PART', 7, 7, '2018-11-28 01:11:30', 1, '2018-11-28 01:11:30', 1),
(19, '0,12 MM TINNED', 'RONGSOK', 418, 400, '2018-12-04 05:12:36', 1, '2018-12-04 05:12:36', 1),
(20, '0,40 MM TINNED', 'RONGSOK', 432, 412, '2018-12-04 05:12:36', 1, '2018-12-04 05:12:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_inventory_detail`
--

CREATE TABLE `t_inventory_detail` (
  `id` int(11) NOT NULL,
  `t_inventory_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `bruto_masuk` int(11) NOT NULL,
  `netto_masuk` int(11) NOT NULL,
  `bruto_keluar` int(11) NOT NULL,
  `netto_keluar` int(11) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_inventory_detail`
--

INSERT INTO `t_inventory_detail` (`id`, `t_inventory_id`, `tanggal`, `bruto_masuk`, `netto_masuk`, `bruto_keluar`, `netto_keluar`, `remarks`) VALUES
(1, 1, '2016-02-25 00:00:00', 3, 3, 0, 0, 'Pembelian spare part'),
(2, 2, '2016-02-25 07:02:08', 440, 430, 0, 0, 'Tolling titipan'),
(3, 2, '2016-02-25 07:02:57', 440, 430, 0, 0, 'Tolling titipan'),
(4, 3, '2018-05-17 04:05:03', 200, 200, 0, 0, 'Produksi ampas tolling titipan'),
(6, 4, '2018-05-17 05:05:32', 0, 0, 55, 55, 'Surat jalan tolling titipan'),
(7, 2, '2018-05-17 05:05:28', 0, 0, 0, 0, 'SKB produksi ingot'),
(8, 5, '2018-05-17 05:05:28', 0, 0, 0, 0, 'SKB produksi ingot'),
(9, 6, '2018-05-17 05:05:49', 0, 0, 500, 500, 'Produksi ingot'),
(10, 2, '2018-10-03 04:10:16', 0, 0, 0, 0, 'SKB produksi ingot'),
(11, 5, '2018-10-03 04:10:16', 0, 0, 0, 0, 'SKB produksi ingot'),
(12, 2, '2018-10-03 04:10:23', 0, 0, 0, 0, 'SKB produksi ingot'),
(13, 5, '2018-10-03 04:10:23', 0, 0, 0, 0, 'SKB produksi ingot'),
(17, 5, '2018-10-04 01:10:48', 300, 270, 0, 0, 'Pembelian rongsok'),
(23, 2, '2018-10-04 02:10:25', 25, 460, 0, 0, 'Pembelian rongsok'),
(24, 5, '2018-10-04 02:10:25', 300, 250, 0, 0, 'Pembelian rongsok'),
(25, 2, '2018-10-04 02:10:40', 25, 460, 0, 0, 'Pembelian rongsok'),
(26, 5, '2018-10-04 02:10:40', 300, 250, 0, 0, 'Pembelian rongsok'),
(27, 2, '2018-10-04 02:10:00', 25, 460, 0, 0, 'Pembelian rongsok'),
(28, 5, '2018-10-04 02:10:00', 300, 250, 0, 0, 'Pembelian rongsok'),
(29, 2, '2018-10-04 02:10:16', 25, 460, 0, 0, 'Pembelian rongsok'),
(30, 5, '2018-10-04 02:10:16', 300, 250, 0, 0, 'Pembelian rongsok'),
(31, 2, '2018-10-04 02:10:52', 25, 460, 0, 0, 'Pembelian rongsok'),
(32, 5, '2018-10-04 02:10:52', 300, 250, 0, 0, 'Pembelian rongsok'),
(33, 2, '2018-10-04 02:10:59', 25, 460, 0, 0, 'Pembelian rongsok'),
(34, 5, '2018-10-04 02:10:59', 300, 250, 0, 0, 'Pembelian rongsok'),
(35, 2, '2018-10-04 02:10:36', 25, 460, 0, 0, 'Pembelian rongsok'),
(36, 5, '2018-10-04 02:10:36', 300, 250, 0, 0, 'Pembelian rongsok'),
(37, 2, '2018-10-04 02:10:22', 25, 460, 0, 0, 'Pembelian rongsok'),
(38, 5, '2018-10-04 02:10:22', 300, 250, 0, 0, 'Pembelian rongsok'),
(39, 2, '2018-10-04 02:10:30', 25, 460, 0, 0, 'Pembelian rongsok'),
(40, 5, '2018-10-04 02:10:30', 300, 250, 0, 0, 'Pembelian rongsok'),
(41, 2, '2018-10-04 02:10:44', 60, 50, 0, 0, 'Pembelian rongsok'),
(42, 5, '2018-10-04 02:10:44', 60, 50, 0, 0, 'Pembelian rongsok'),
(43, 2, '2018-10-04 02:10:03', 60, 50, 0, 0, 'Pembelian rongsok'),
(44, 5, '2018-10-04 02:10:03', 60, 50, 0, 0, 'Pembelian rongsok'),
(45, 2, '2018-10-04 02:10:14', 60, 50, 0, 0, 'Pembelian rongsok'),
(46, 5, '2018-10-04 02:10:14', 60, 50, 0, 0, 'Pembelian rongsok'),
(47, 2, '2018-10-04 02:10:17', 60, 50, 0, 0, 'Pembelian rongsok'),
(48, 5, '2018-10-04 02:10:17', 60, 50, 0, 0, 'Pembelian rongsok'),
(49, 2, '2018-10-04 02:10:15', 2, 1, 0, 0, 'Pembelian rongsok'),
(50, 5, '2018-10-04 02:10:15', 3, 1, 0, 0, 'Pembelian rongsok'),
(51, 2, '2018-10-08 11:10:05', 10, 5, 0, 0, 'Pembelian rongsok'),
(52, 5, '2018-10-08 11:10:05', 20, 10, 0, 0, 'Pembelian rongsok'),
(53, 2, '2018-10-08 11:10:09', 20, 15, 0, 0, 'Pembelian rongsok'),
(54, 5, '2018-10-08 11:10:09', 20, 18, 0, 0, 'Pembelian rongsok'),
(55, 2, '2018-10-08 03:10:26', 0, 0, 0, 0, 'Pembelian rongsok'),
(56, 2, '2018-10-08 03:10:42', 200, 158, 0, 0, 'Pembelian rongsok'),
(57, 2, '2018-10-08 03:10:57', 200, 180, 0, 0, 'Pembelian rongsok'),
(58, 7, '2018-11-05 03:11:37', 20, 20, 0, 0, 'Pembelian spare part'),
(59, 1, '2018-11-05 04:11:23', 50, 50, 0, 0, 'Pembelian spare part'),
(60, 7, '2018-11-05 06:11:12', 15, 15, 0, 0, 'Pembelian spare part'),
(61, 7, '2018-11-05 07:11:19', 0, 0, 0, 0, 'Pembelian spare part'),
(62, 7, '2018-11-05 07:11:29', 0, 0, 0, 0, 'Pembelian spare part'),
(63, 7, '2018-11-06 01:11:15', 7, 7, 0, 0, 'Pembelian spare part'),
(64, 7, '2018-11-06 03:11:33', 7, 7, 0, 0, 'Pembelian spare part'),
(65, 7, '2018-11-06 03:11:03', 2, 2, 0, 0, 'Pembelian spare part'),
(67, 1, '2018-11-06 03:11:02', 20, 20, 0, 0, 'Pembelian spare part'),
(68, 1, '2018-11-06 03:11:52', 5, 5, 0, 0, 'Pembelian spare part'),
(69, 1, '2018-11-06 03:11:21', 5, 5, 0, 0, 'Pembelian spare part'),
(70, 7, '2018-11-06 03:11:22', 5, 5, 0, 0, 'Pembelian spare part'),
(71, 1, '2018-11-06 03:11:22', 10, 10, 0, 0, 'Pembelian spare part'),
(72, 7, '2018-11-06 03:11:28', 10, 10, 0, 0, 'Pembelian spare part'),
(73, 1, '2018-11-06 03:11:28', 10, 10, 0, 0, 'Pembelian spare part'),
(74, 7, '2018-11-06 03:11:54', 5, 5, 0, 0, 'Pembelian spare part'),
(75, 1, '2018-11-06 03:11:15', 20, 20, 0, 0, 'Pembelian spare part'),
(76, 7, '2018-11-08 01:11:41', 0, 0, 12, 12, 'SPB Sparepart'),
(77, 1, '2018-11-08 01:11:41', 0, 0, 24, 24, 'SPB Sparepart'),
(78, 7, '2018-11-08 03:11:13', 0, 0, 4, 4, 'SPB Sparepart'),
(79, 1, '2018-11-08 03:11:13', 0, 0, 8, 8, 'SPB Sparepart'),
(80, 2, '2018-11-13 01:11:35', 100, 80, 0, 0, 'Tolling titipan'),
(81, 5, '2018-11-13 01:11:35', 200, 180, 0, 0, 'Tolling titipan'),
(82, 3, '2018-11-13 02:11:54', 0, 0, 30, 30, 'Surat jalan tolling titipan'),
(83, 2, '2018-11-21 12:11:24', 50, 25, 0, 0, 'Tolling titipan'),
(84, 2, '2018-11-21 12:11:24', 50, 25, 0, 0, 'Tolling titipan'),
(85, 5, '2018-11-21 12:11:24', 100, 77, 0, 0, 'Tolling titipan'),
(86, 5, '2018-11-21 12:11:24', 50, 23, 0, 0, 'Tolling titipan'),
(87, 2, '2018-11-21 04:11:46', 120, 108, 0, 0, 'Tolling titipan'),
(88, 8, '2018-11-22 10:11:15', 5, 5, 0, 0, 'Pembelian spare part'),
(89, 9, '2018-11-22 10:11:15', 5, 5, 0, 0, 'Pembelian spare part'),
(90, 8, '2018-11-22 10:11:15', 5, 5, 0, 0, 'Pembelian spare part'),
(91, 7, '2018-11-22 10:11:24', 0, 0, 4, 4, 'SPB Sparepart'),
(92, 9, '2018-11-22 10:11:24', 0, 0, 8, 8, 'SPB Sparepart'),
(93, 10, '2018-11-26 11:11:19', 25, 25, 0, 0, 'Pembelian spare part'),
(94, 11, '2018-11-26 11:11:19', 5, 5, 0, 0, 'Pembelian spare part'),
(99, 16, '2018-11-28 11:11:51', 7, 7, 0, 0, 'Pembelian spare part'),
(100, 17, '2018-11-28 11:11:51', 2, 2, 0, 0, 'Pembelian spare part'),
(101, 7, '2018-11-28 11:11:17', 1, 1, 0, 0, 'Pembelian spare part'),
(102, 1, '2018-11-28 11:11:26', 1, 1, 0, 0, 'Pembelian spare part'),
(103, 18, '2018-11-28 01:11:30', 7, 7, 0, 0, 'Pembelian spare part'),
(104, 7, '2018-11-28 01:11:18', 3, 3, 0, 0, 'Pembelian spare part'),
(105, 10, '2018-11-28 04:11:06', 0, 0, 10, 10, 'SPB Sparepart'),
(106, 11, '2018-11-28 04:11:06', 0, 0, 5, 5, 'SPB Sparepart'),
(107, 9, '2018-12-04 03:12:01', 24, 24, 0, 0, 'Pembelian spare part'),
(108, 19, '2018-12-04 05:12:36', 418, 400, 0, 0, 'Tolling titipan'),
(109, 20, '2018-12-04 05:12:36', 432, 412, 0, 0, 'Tolling titipan');

-- --------------------------------------------------------

--
-- Table structure for table `t_kas`
--

CREATE TABLE `t_kas` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `uraian` text NOT NULL,
  `dk` varchar(1) NOT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL,
  `no_referensi` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kas`
--

INSERT INTO `t_kas` (`id`, `tanggal`, `uraian`, `dk`, `debet`, `kredit`, `no_referensi`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, '2017-08-10', 'Pembelian Singkong Lokal dari Agen <strong>WASKITO</strong> sebanyak 664 menggunakan DUMP TRUCK dengan nomor polisi <strong>B 3159 TLF</strong> pada tanggal <strong>08/10/2017</strong>', 'D', 371840, 0, 'IFS081020170001', '2017-10-08 04:10:20', 1, '2017-10-08 04:10:20', 1),
(3, '2017-08-10', 'Bayar uang ONGKOS BONGKAR agen <strong>RIANTI</strong> dengan nomor polisi <strong>BE 4589 HL</strong> sebanyak 2.531 @Kg = Rp. 15.186pada tanggal <strong>08/10/2017', 'D', 15186, 0, 'IFS081020170001', '2017-10-09 01:10:16', 1, '2017-10-09 01:10:16', 1),
(4, '2017-10-11', 'Pembayaran nota gelondongan sebesar Rp. 978.000 untuk nota bayar dengan nomor : NDMRH.10102017.0001 (Rp. 600.000), NDSKG.11102017.0001 (Rp. 378.000), ', 'D', 978000, 0, 'NOTA GELONDONGAN', '2017-10-11 10:10:53', 1, '2017-10-11 10:10:53', 1),
(5, '2017-10-13', 'Penjualan Sagu ke Customer <strong>CV. ANGIN RIBUT</strong> sebesar Rp. 9.270.000 untuk total order 1.875 Kg, dengan No.Delivery Order <strong>DO.12102017.0001</strong> ke CV <strong>CV ABADI MEKAR SARI</strong> menggunakan ekspedisi TIKI dengan nomor polisi <strong>BE 3481 CAT</strong> pada tanggal <strong>13/10/2017</strong>', 'K', 0, 9270000, 'INVSG.13102017.0001', '2017-10-13 10:10:15', 1, '2017-10-13 10:10:15', 1),
(6, '1970-01-01', 'Pembelian Singkong Luar dari Agen <strong>WASKITO</strong> sebanyak 1.100 Kg menggunakan DUMP TRUCK dengan nomor polisi <strong>BE 2678 KIS</strong> pada tanggal <strong>15/10/2017</strong>', 'D', 577500, 0, 'NDSKG.15102017.0001', '2017-10-15 01:10:24', 1, '2017-10-15 01:10:24', 1),
(7, '1970-01-01', 'Pembelian Singkong Luar dari Agen <strong>WASKITO</strong> sebanyak 1.100 Kg menggunakan DUMP TRUCK dengan nomor polisi <strong>BE 2678 KIS</strong> pada tanggal <strong>15/10/2017</strong>', 'D', 577500, 0, 'NDSKG.15102017.0001', '2017-10-15 01:10:46', 1, '2017-10-15 01:10:46', 1),
(8, '2017-10-15', 'Bayar uang sayur untuk kuli bongkar tanggal 15-10-2017 sebanyak 10 orang', 'D', 150000, 0, 'NDMNL.15102017.0001', '2017-10-15 02:10:19', 1, '2017-10-15 02:10:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_saldo`
--

CREATE TABLE `t_saldo` (
  `id` int(11) NOT NULL,
  `saldo_awal` double NOT NULL,
  `saldo_sekarang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_saldo`
--

INSERT INTO `t_saldo` (`id`, `saldo_awal`, `saldo_sekarang`) VALUES
(1, 5000000, 11971814);

-- --------------------------------------------------------

--
-- Table structure for table `t_sales_order`
--

CREATE TABLE `t_sales_order` (
  `id` int(11) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `so_id` int(50) NOT NULL,
  `no_po` varchar(100) NOT NULL,
  `no_spb` int(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sales_order`
--

INSERT INTO `t_sales_order` (`id`, `alias`, `so_id`, `no_po`, `no_spb`, `jenis_barang`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(6, '', 14, '', 33, 'FG', '2018-11-21 08:11:19', 1, '2018-11-21 08:11:19', 1),
(7, '', 16, '', 36, 'FG', '2018-11-26 11:11:40', 1, '2018-11-26 11:11:40', 1),
(8, '', 17, '', 37, 'FG', '2018-11-26 11:11:00', 1, '2018-11-26 11:11:00', 1),
(9, '', 18, '', 38, 'FG', '2018-11-26 11:11:19', 1, '2018-11-26 11:11:19', 1),
(10, '', 19, '', 39, 'FG', '2018-11-26 01:11:50', 1, '2018-11-26 01:11:50', 1),
(11, '', 20, '', 23, 'WIP', '2018-11-27 11:11:38', 1, '2018-11-27 11:11:38', 1),
(12, '', 21, 'PO-R.TRADECO.0019', 40, 'FG', '2018-11-29 08:11:04', 1, '2018-11-29 08:11:04', 1),
(13, 'ARKABEL', 22, 'RONGSOK-123456', 31, 'RONGSOK', '2018-12-03 04:12:59', 1, '2018-12-03 04:12:59', 1),
(15, 'ATLASTIAN', 24, 'PO-WIP-ATLAS.1234', 25, 'WIP', '2018-12-04 11:12:23', 1, '2018-12-04 11:12:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_sales_order_detail`
--

CREATE TABLE `t_sales_order_detail` (
  `id` int(11) NOT NULL,
  `t_so_id` int(11) NOT NULL,
  `no_spb_detail` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `bruto` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sales_order_detail`
--

INSERT INTO `t_sales_order_detail` (`id`, `t_so_id`, `no_spb_detail`, `jenis_barang_id`, `qty`, `bruto`, `netto`, `amount`, `total_amount`) VALUES
(15, 6, 36, 8, 1, 0, 50, 5000000, 5000000),
(16, 6, 37, 9, 1, 0, 20, 4000000, 4000000),
(17, 7, 40, 158, 1, 0, 50, 600000, 600000),
(18, 8, 41, 8, 1, 0, 34, 500000, 500000),
(19, 9, 42, 11, 1, 0, 40, 500000, 500000),
(20, 10, 43, 9, 1, 0, 20, 600000, 600000),
(21, 11, 26, 2, 15, 26, 15, 60000, 900000),
(22, 12, 44, 142, 1, 0, 34, 7000, 238000),
(23, 12, 45, 148, 1, 0, 15, 10000, 150000),
(28, 15, 28, 2, 30, 40, 30, 60000, 1800000),
(29, 15, 29, 5, 20, 30, 20, 70000, 1400000),
(32, 13, 56, 9, 25, 0, 0, 25000, 625000),
(33, 13, 57, 10, 50, 0, 0, 10000, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_bobbin`
--

CREATE TABLE `t_spb_bobbin` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_spb` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `dibuat_tgl` datetime NOT NULL,
  `disetujui_oleh` int(11) NOT NULL,
  `disetujui_tgl` datetime NOT NULL,
  `diterima_oleh` int(11) NOT NULL,
  `diterima_tgl` datetime NOT NULL,
  `m_jns_req_bb_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_bobbin_detail`
--

CREATE TABLE `t_spb_bobbin_detail` (
  `id` int(11) NOT NULL,
  `t_spb_bobbin_id` int(11) NOT NULL,
  `m_jenis_packing_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `m_bobbin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_bobbin_rq`
--

CREATE TABLE `t_spb_bobbin_rq` (
  `id` int(11) NOT NULL,
  `t_spb_bobbin_id` int(11) NOT NULL,
  `m_jenis_packing_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_fg`
--

CREATE TABLE `t_spb_fg` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_spb` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `keterangan` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `received_by` int(11) DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `reject_remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spb_fg`
--

INSERT INTO `t_spb_fg` (`id`, `tanggal`, `no_spb`, `status`, `keterangan`, `created_by`, `created_at`, `modified_by`, `modified_at`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`, `received_by`, `received_at`, `reject_remarks`) VALUES
(8, '2018-10-31', 'SPB-FG311020180003', 9, 'TEST NEWW', 1, '2018-10-31 11:10:55', 1, '2018-11-01 12:11:37', NULL, NULL, 1, '2018-11-05 01:11:05', NULL, NULL, 'BCM 1,40 MM TIDAK ADA STOK'),
(15, '2018-11-01', 'SPB-FG011120180001', 1, 'TEST KEDUA', 1, '2018-11-01 02:11:08', 1, '2018-11-01 02:11:44', 1, '2018-11-05 11:11:29', NULL, NULL, NULL, NULL, ''),
(16, '2018-11-05', 'SPB-FG051120180001', 9, 'TEST', 1, '2018-11-05 11:11:39', 1, '2018-11-05 11:11:53', NULL, NULL, 1, '2018-11-05 01:11:48', NULL, NULL, 'BCW 0,15 MM SUDAH KELUAR BANYAK'),
(17, '2018-11-05', 'SPB-FG051120180002', 1, 'FINALE', 1, '2018-11-05 02:11:12', 1, '2018-11-05 02:11:10', 1, '2018-11-05 02:11:16', NULL, NULL, NULL, NULL, NULL),
(18, '2018-11-07', 'SPB-FG071120180001', 1, '', 1, '2018-11-07 02:11:43', 1, '2018-11-07 02:11:15', 1, '2018-11-07 02:11:07', NULL, NULL, NULL, NULL, NULL),
(19, '2018-11-07', 'SPB-FG071120180002', 9, '', 1, '2018-11-07 02:11:54', 1, '2018-11-07 02:11:03', NULL, NULL, 1, '2018-11-12 06:11:24', NULL, NULL, 'TIDAK BUTUH SAAT INI'),
(20, '2018-11-12', 'SPB-FG121120180001', 1, '', 1, '2018-11-12 05:11:09', 1, '2018-11-12 05:11:10', 1, '2018-11-12 06:11:26', NULL, NULL, NULL, NULL, NULL),
(21, '2018-11-12', 'SPB-FG121120180002', 1, '1,63 MINTA', 1, '2018-11-12 06:11:20', 1, '2018-11-12 06:11:40', 1, '2018-11-12 07:11:20', NULL, NULL, NULL, NULL, NULL),
(22, '2018-11-12', 'SPB-FG121120180003', 0, '', 1, '2018-11-12 07:11:23', 1, '2018-11-12 07:11:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2018-11-20', 'SPB-FG201120180001', 1, 'UNTUK TOLLING TITIPAN FG', 1, '2018-11-20 11:11:56', 1, '2018-11-20 11:11:56', 1, '2018-11-21 12:11:31', NULL, NULL, NULL, NULL, NULL),
(28, '2018-11-21', 'SPB-FG211120180002', 0, 'UNTUK TOLLING TITIPAN FG', 1, '2018-11-21 12:11:16', 1, '2018-11-21 12:11:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2018-11-21', 'SPB-FG211120180003', 1, 'UNTUK TOLLING TITIPAN FG', 1, '2018-11-21 04:11:12', 1, '2018-11-21 04:11:12', 1, '2018-11-21 04:11:30', NULL, NULL, NULL, NULL, NULL),
(33, '2018-11-21', 'SPB-FG211120180007', 1, 'SALES ORDER FINISH GOOD', 1, '2018-11-21 08:11:19', NULL, NULL, 1, '2018-11-21 08:11:38', NULL, NULL, NULL, NULL, NULL),
(35, '2018-11-26', 'SPB-FG261120180001', 1, '', 1, '2018-11-26 10:11:05', 1, '2018-11-26 10:11:33', 1, '2018-11-26 10:11:02', NULL, NULL, NULL, NULL, NULL),
(36, '2018-11-26', 'SPB-FG261120180002', 0, 'SALES ORDER FINISH GOOD', 1, '2018-11-26 11:11:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2018-11-26', 'SPB-FG261120180003', 1, 'SALES ORDER FINISH GOOD', 1, '2018-11-26 11:11:00', NULL, NULL, 1, '2018-11-26 11:11:02', NULL, NULL, NULL, NULL, NULL),
(38, '2018-11-26', 'SPB-FG261120180004', 0, 'SALES ORDER FINISH GOOD', 1, '2018-11-26 11:11:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2018-11-26', 'SPB-FG261120180005', 1, 'SALES ORDER FINISH GOOD', 1, '2018-11-26 01:11:50', NULL, NULL, 1, '2018-11-26 02:11:27', NULL, NULL, NULL, NULL, NULL),
(40, '2018-11-29', 'SPB-FG2018110001', 1, 'SALES ORDER FINISH GOOD', 1, '2018-11-29 08:11:04', NULL, NULL, 1, '2018-12-04 05:12:48', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_fg_detail`
--

CREATE TABLE `t_spb_fg_detail` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `t_spb_fg_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `netto` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spb_fg_detail`
--

INSERT INTO `t_spb_fg_detail` (`id`, `tanggal`, `t_spb_fg_id`, `jenis_barang_id`, `uom`, `netto`, `keterangan`) VALUES
(6, '2018-11-01', 8, 8, 'KG', 30, '0'),
(7, '2018-11-01', 8, 10, 'KG', 20, 'COBA'),
(8, '2018-11-01', 15, 11, 'KG', 73, 'MINTA 0.15'),
(9, '2018-11-05', 16, 11, 'KG', 30, 'TEST'),
(10, '2018-11-05', 17, 8, 'KG', 30, 'MINTA 1,77'),
(11, '2018-11-05', 17, 11, 'KG', 12, 'MINTA 0,15'),
(12, '2018-11-07', 18, 8, 'KG', 13, ''),
(13, '2018-11-07', 18, 11, 'KG', 10, ''),
(14, '2018-11-07', 19, 8, 'KG', 40, ''),
(15, '2018-11-12', 20, 8, 'KG', 30, ''),
(16, '2018-11-12', 21, 9, 'KG', 50, ''),
(17, '2018-11-12', 21, 10, 'KG', 40, ''),
(18, '2018-11-12', 22, 8, 'KG', 44, ''),
(19, '2018-11-12', 22, 9, 'KG', 33, ''),
(20, '2018-11-12', 22, 10, 'KG', 34, ''),
(21, '2018-11-12', 22, 11, 'KG', 25, ''),
(22, '2018-11-12', 22, 12, 'KG', 23, ''),
(23, '2018-11-12', 22, 13, 'KG', 27, ''),
(31, '2018-11-20', 26, 8, 'KG', 200, 'PERMINTAAN BANYAK'),
(32, '2018-11-20', 26, 11, 'KG', 50, 'PERMINTAAN KEDUA'),
(33, '2018-11-21', 28, 8, 'KG', 150, ''),
(34, '2018-11-21', 28, 9, 'KG', 150, ''),
(35, '2018-11-21', 29, 9, 'KG', 108, ''),
(36, '2018-11-21', 33, 8, 'KG', 50, 'SALES ORDER'),
(37, '2018-11-21', 33, 9, 'KG', 20, 'SALES ORDER'),
(38, '2018-11-26', 35, 164, 'KG', 50, ''),
(39, '2018-11-26', 35, 400, 'KG', 45, ''),
(40, '2018-11-26', 36, 158, 'KG', 50, 'SALES ORDER'),
(41, '2018-11-26', 37, 8, 'KG', 34, 'SALES ORDER'),
(42, '2018-11-26', 38, 11, 'KG', 40, 'SALES ORDER'),
(43, '2018-11-26', 39, 9, 'KG', 20, 'SALES ORDER'),
(44, '2018-11-29', 40, 142, 'KG', 34, 'SALES ORDER'),
(45, '2018-11-29', 40, 148, 'KG', 15, 'SALES ORDER');

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_rongsok`
--

CREATE TABLE `t_spb_rongsok` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_spb` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `approve_by` int(11) NOT NULL,
  `approved_at` datetime NOT NULL,
  `accepted_by` int(11) NOT NULL,
  `accepted_at` datetime NOT NULL,
  `m_jns_req_bb_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_rongsok_detail`
--

CREATE TABLE `t_spb_rongsok_detail` (
  `id` int(11) NOT NULL,
  `t_spb_bobbin_id` int(11) NOT NULL,
  `m_jenis_packing_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `m_bobbin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_rongsok_rq`
--

CREATE TABLE `t_spb_rongsok_rq` (
  `id` int(11) NOT NULL,
  `t_spb_bobbin_id` int(11) NOT NULL,
  `m_jenis_packing_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_sparepart`
--

CREATE TABLE `t_spb_sparepart` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_spb_sparepart` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) DEFAULT NULL,
  `request_by` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `approved_by` int(11) NOT NULL,
  `approved_at` datetime DEFAULT NULL,
  `received_by` int(11) NOT NULL,
  `received_at` datetime DEFAULT NULL,
  `rejected_by` int(11) NOT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `reject_remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spb_sparepart`
--

INSERT INTO `t_spb_sparepart` (`id`, `tanggal`, `no_spb_sparepart`, `status`, `keterangan`, `request_by`, `created_by`, `created_at`, `modified_by`, `modified_at`, `approved_by`, `approved_at`, `received_by`, `received_at`, `rejected_by`, `rejected_at`, `reject_remarks`) VALUES
(2, '2018-11-07', 'SPB-SP.07112018.0002', 1, 'FIRST TEST', '', 1, '2018-11-07 12:11:25', 1, '2018-11-07 02:11:27', 1, '2018-11-08 01:11:41', 0, NULL, 0, NULL, NULL),
(3, '2018-11-08', 'SPB-SP.08112018.0001', 1, '', '', 1, '2018-11-08 01:11:14', 1, '2018-11-08 01:11:34', 1, '2018-11-08 03:11:13', 0, NULL, 0, NULL, NULL),
(4, '2018-11-22', 'SPB-SP.22112018.0001', 1, '', '', 1, '2018-11-22 10:11:14', 1, '2018-11-22 10:11:35', 1, '2018-11-22 10:11:24', 0, NULL, 0, NULL, NULL),
(5, '2018-11-28', 'SPB-SP.28112018.0001', 1, '', 'BELLON', 1, '2018-11-28 03:11:45', 1, '2018-11-28 03:11:30', 1, '2018-11-28 04:11:06', 0, NULL, 0, NULL, NULL),
(6, '2018-12-04', 'SPB-SP.201812.0001', 0, '', 'BELLON', 1, '2018-12-04 03:12:30', 1, '2018-12-04 03:12:27', 0, NULL, 0, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_sparepart_detail`
--

CREATE TABLE `t_spb_sparepart_detail` (
  `id` int(11) NOT NULL,
  `t_spb_sparepart_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_inventory_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spb_sparepart_detail`
--

INSERT INTO `t_spb_sparepart_detail` (`id`, `t_spb_sparepart_id`, `tanggal`, `jenis_inventory_id`, `qty`, `uom`, `keterangan`) VALUES
(2, 2, '2018-11-07', 7, 12, 'BUAH', 'BUAT BAN SEREP TRUK'),
(3, 2, '2018-11-07', 1, 24, 'BUAH', 'BUAT BENERIN TRUK'),
(4, 3, '2018-11-08', 7, 4, 'BUAH', 'UNTUK MOBIL'),
(5, 3, '2018-11-08', 1, 8, 'BUAH', 'UNTUK MOBIL'),
(6, 4, '2018-11-22', 9, 4, 'SET', ''),
(7, 4, '2018-11-22', 7, 8, 'BUAH', ''),
(8, 5, '2018-11-28', 11, 8, 'KG', 'TEST'),
(9, 5, '2018-11-28', 10, 10, 'KG', 'TESTTT'),
(10, 6, '2018-12-04', 1, 10, 'BUAH', ''),
(11, 6, '2018-12-04', 7, 8, 'BUAH', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_sparepart_detail_keluar`
--

CREATE TABLE `t_spb_sparepart_detail_keluar` (
  `id` int(11) NOT NULL,
  `t_spb_sparepart_id` int(11) NOT NULL,
  `jenis_inventory_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spb_sparepart_detail_keluar`
--

INSERT INTO `t_spb_sparepart_detail_keluar` (`id`, `t_spb_sparepart_id`, `jenis_inventory_id`, `qty`, `uom`, `keterangan`) VALUES
(2, 2, 7, 12, 'BUAH', 'PEMENUHAN BAN'),
(3, 2, 1, 24, 'BUAH', 'PEMENUHAN BUSI'),
(4, 3, 7, 4, 'BUAH', 'BERES'),
(5, 3, 1, 8, 'BUAH', 'OKEE'),
(6, 4, 7, 4, 'BUAH', 'BERES'),
(7, 4, 9, 8, 'SET', 'OKEE'),
(9, 5, 10, 10, 'KG', ''),
(10, 5, 11, 5, 'KG', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_wip`
--

CREATE TABLE `t_spb_wip` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_spb_wip` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `approved_by` int(11) NOT NULL,
  `approved_at` datetime DEFAULT NULL,
  `received_by` int(11) NOT NULL,
  `received_at` datetime DEFAULT NULL,
  `rejected_by` int(11) NOT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `reject_remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spb_wip`
--

INSERT INTO `t_spb_wip` (`id`, `tanggal`, `no_spb_wip`, `status`, `keterangan`, `created_by`, `created`, `modified_by`, `modified_date`, `approved_by`, `approved_at`, `received_by`, `received_at`, `rejected_by`, `rejected_at`, `reject_remarks`) VALUES
(1, '2018-10-18', 'SPB-WIP.18102018.0002', 9, '', 1, '2018-10-18 01:10:33', NULL, NULL, 0, NULL, 0, NULL, 1, '2018-10-19 05:10:46', 'LENGKAPI PERMINTAAN'),
(2, '2018-10-18', 'SPB-WIP.18102018.0003', 1, '', 1, '2018-10-18 01:10:43', 1, '2018-10-18 02:10:18', 1, '2018-10-19 04:10:42', 0, NULL, 0, NULL, NULL),
(3, '2018-10-01', 'SPB-WIP.01102018.0001', 1, '', 1, '2018-10-19 06:10:15', 1, '2018-10-25 12:10:49', 1, '2018-11-08 10:11:11', 0, NULL, 0, NULL, NULL),
(4, '2018-10-11', 'SPB-WIP.11102018.0001', 9, 'SPB DITAMBAHKAN TGL 11-OKT-2018', 1, '2018-10-19 06:10:52', 1, '2018-10-19 06:10:21', 0, NULL, 0, NULL, 1, '2018-10-19 06:10:36', 'KURANG STOK'),
(5, '2018-10-22', 'SPB-WIP.22102018.0001', 1, 'BARANG WIP TRANSFER KE RONGSOK', 1, '2018-10-22 02:10:07', NULL, NULL, 1, '2018-10-30 02:10:58', 0, NULL, 0, NULL, NULL),
(9, '2018-10-31', 'SPB-WIP.31102018.0004', 9, 'COBA', 1, '2018-10-31 02:10:01', 1, '2018-10-31 02:10:13', 0, NULL, 0, NULL, 1, '2018-10-31 03:10:07', 'TIDAK ADA STOK\r\n'),
(10, '2018-10-31', 'SPB-WIP.31102018.0005', 0, '', 1, '2018-10-31 02:10:20', 1, '2018-10-31 02:10:33', 0, NULL, 0, NULL, 0, NULL, NULL),
(14, '2018-11-01', 'SPB-WIP.01112018.0001', 1, '', 1, '2018-11-01 10:11:39', 1, '2018-11-01 11:11:13', 1, '2018-11-01 02:11:52', 0, NULL, 0, NULL, NULL),
(16, '2018-11-01', 'SPB-WIP.01112018.0003', 9, '', 1, '2018-11-01 03:11:18', NULL, NULL, 0, NULL, 0, NULL, 1, '2018-11-01 05:11:25', 'TIDAK ADA ITEM'),
(17, '2018-11-07', 'SPB-WIP.07112018.0001', 9, '', 1, '2018-11-07 12:11:10', 1, '2018-11-09 10:11:27', 0, NULL, 0, NULL, 1, '2018-11-09 11:11:13', 'INGOT KURANG'),
(18, '2018-11-13', 'SPB-WIP.13112018.0001', 1, '', 1, '2018-11-13 11:11:41', 1, '2018-11-13 11:11:48', 1, '2018-11-13 11:11:09', 0, NULL, 0, NULL, NULL),
(19, '2018-11-13', 'SPB-WIP.13112018.0002', 1, '', 1, '2018-11-13 11:11:13', 1, '2018-11-13 11:11:19', 1, '2018-11-13 11:11:28', 0, NULL, 0, NULL, NULL),
(20, '2018-11-13', 'SPB-WIP.13112018.0003', 1, '', 1, '2018-11-13 11:11:18', 1, '2018-11-13 11:11:28', 1, '2018-11-13 11:11:41', 0, NULL, 0, NULL, NULL),
(21, '2018-11-13', 'SPB-WIP.13112018.0004', 1, '', 1, '2018-11-13 12:11:32', 1, '2018-11-13 12:11:49', 1, '2018-11-13 12:11:47', 0, NULL, 0, NULL, NULL),
(22, '2018-11-23', 'SPB-WIP.23112018.0001', 0, '', 1, '2018-11-23 01:11:19', 1, '2018-11-23 01:11:49', 0, NULL, 0, NULL, 0, NULL, NULL),
(23, '2018-11-27', 'SPB-WIP.27112018.0001', 0, 'SALES ORDER WIP', 1, '2018-11-27 11:11:38', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL),
(25, '2018-12-04', 'SPB-WIP.201812.0002', 0, 'SALES ORDER WIP', 1, '2018-12-04 11:12:23', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_wip_detail`
--

CREATE TABLE `t_spb_wip_detail` (
  `id` int(11) NOT NULL,
  `t_spb_wip_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spb_wip_detail`
--

INSERT INTO `t_spb_wip_detail` (`id`, `t_spb_wip_id`, `tanggal`, `jenis_barang_id`, `qty`, `uom`, `berat`, `keterangan`) VALUES
(5, 2, '0000-00-00', 5, 1, 'ROLL', 3, 'OK'),
(7, 3, '2018-10-19', 2, 2, 'BATANG', 2, 'OKE'),
(8, 4, '2018-10-19', 5, 3, 'ROLL', 2, 'KM MURAH'),
(9, 4, '2018-10-19', 2, 1, 'BATANG', 1, 'RINGAN'),
(10, 5, '2018-10-22', 2, 1, 'BATANG', 1, '1'),
(13, 9, '2018-10-31', 5, 6, 'ROLL', 60, ''),
(14, 10, '2018-10-31', 6, 3, 'ROLL', 10, ''),
(18, 14, '2018-11-01', 2, 2, 'BATANG', 30, ''),
(19, 17, '2018-11-09', 2, 20, 'BATANG', 20, ''),
(20, 18, '2018-11-13', 2, 1, 'BATANG', 2, ''),
(21, 19, '2018-11-13', 2, 1, 'BATANG', 10, ''),
(22, 20, '2018-11-13', 2, 1, 'BATANG', 13, ''),
(23, 21, '2018-11-13', 2, 2, 'BATANG', 22, ''),
(24, 22, '2018-11-23', 6, 5, 'ROLL', 50, ''),
(25, 22, '2018-11-23', 2, 30, 'BATANG', 60, ''),
(26, 23, '2018-11-27', 2, 15, 'BATANG', 15, 'SALES ORDER'),
(28, 25, '2018-12-04', 2, 30, 'BATANG', 30, 'SALES ORDER'),
(29, 25, '2018-12-04', 5, 20, 'ROLL', 20, 'SALES ORDER');

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_jalan`
--

CREATE TABLE `t_surat_jalan` (
  `id` int(11) NOT NULL,
  `no_surat_jalan` varchar(50) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `m_kendaraan_id` int(11) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_surat_jalan`
--

INSERT INTO `t_surat_jalan` (`id`, `no_surat_jalan`, `sales_order_id`, `tanggal`, `jenis_barang`, `m_customer_id`, `m_kendaraan_id`, `supir`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(2, 'SJ.21112018.0001', 3, '2018-11-21', 'TOLLING', 2, 6, 'BELO', 'KIRIM TOLLING FG', '2018-11-21 01:11:49', 1, '2018-11-21 03:11:25', 1),
(3, 'SJ.21112018.0002', 3, '2018-11-21', 'TOLLING', 2, 2, 'FERGUSO', 'PENGIRIMAN TOLLING FG KEDUA', '2018-11-21 03:11:32', 1, '2018-11-21 04:11:34', 1),
(4, 'SJ.21112018.0003', 8, '2018-11-21', 'TOLLING', 3, 3, 'BAMBANG', 'UNTUK TRADECO', '2018-11-21 04:11:51', 1, '2018-11-21 04:11:12', 1),
(5, 'SJ.21112018.0004', 3, '2018-11-21', 'TOLLING', 2, 4, 'MICHAEL', 'KIRIMAN TERAKHIR', '2018-11-21 05:11:16', 1, '2018-11-21 05:11:23', 1),
(6, 'SJ.26112018.0001', 14, '2018-11-26', 'FG', 3, 6, 'BELLON', 'TEST SO', '2018-11-26 05:11:43', 1, '2018-11-26 05:11:43', 1),
(7, 'SJ.26112018.0002', 17, '2018-11-26', 'FG', 3, 2, 'MICHAEL', 'TESTT', '2018-11-26 11:11:43', 1, '2018-11-26 11:11:43', 1),
(8, 'SJ.26112018.0003', 19, '2018-11-26', 'FG', 6, 6, 'MICHAEL', 'TEST 45', '2018-11-26 02:11:43', 1, '2018-11-26 02:11:43', 1),
(9, 'SJ.201812.0001', 22, '2018-12-04', 'RONGSOK', 5, 4, 'BELO', 'TEST 1', '2018-12-04 03:12:36', 1, '2018-12-04 03:12:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_jalan_detail`
--

CREATE TABLE `t_surat_jalan_detail` (
  `id` int(11) NOT NULL,
  `t_sj_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `t_gudang_fg_id` int(11) NOT NULL,
  `no_packing` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `line_remarks` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_surat_jalan_detail`
--

INSERT INTO `t_surat_jalan_detail` (`id`, `t_sj_id`, `jenis_barang_id`, `t_gudang_fg_id`, `no_packing`, `qty`, `bruto`, `netto`, `line_remarks`, `created_by`, `created_at`) VALUES
(6, 2, 8, 23, '251018M01770009', 1, 92, 79, 'BCW 1,77 PACK 1', 1, '2018-11-21'),
(8, 2, 8, 39, '181031l01770013', 1, 117, 100, 'BCW 1,77 PACK 2', 1, '2018-11-21'),
(9, 3, 11, 29, '181025A00150010', 1, 0, 9, 'PACK 1', 1, '2018-11-21'),
(10, 3, 11, 32, '181026B00150117', 1, 0, 12, 'PACK 2', 1, '2018-11-21'),
(12, 4, 9, 37, '181026L01630014', 1, 90, 73, 'KURANG BANYAK ITS OK', 1, '2018-11-21'),
(13, 5, 11, 34, '181026B00150117', 1, 0, 28, '', 1, '2018-11-21'),
(17, 6, 8, 21, '251018M01770009', 1, 58, 46, '', 1, '2018-11-26'),
(18, 6, 9, 45, '181121M01630009', 1, 40, 27, 'TEST 2', 1, '2018-11-26'),
(19, 7, 8, 22, '251018L01770008', 1, 79, 68, '', 1, '2018-11-26'),
(20, 8, 9, 40, '181031l01630008', 1, 333, 300, '', 1, '2018-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `photo_profile_url` varchar(255) NOT NULL,
  `user_ppn` smallint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `realname`, `password`, `group_id`, `active`, `photo_profile_url`, `user_ppn`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'admin', 'TARUNA', 'YWRtaW4=', 1, 1, '', 0, '2017-10-01 00:00:00', 1, '2017-10-01 00:00:00', 1),
(2, 'atry', 'ATRIANTI', 'YXRyeTE4', 1, 1, '', 1, '2017-10-01 09:10:23', 1, '2018-05-13 06:05:23', 1),
(3, 'pembelian', 'PEMBELIAN', 'cGVtYmVsaWFu', 3, 1, '', 0, '2018-04-16 10:04:17', 1, '2018-04-16 10:04:17', 1),
(4, 'finance', 'FINANCE', 'ZmluYW5jZQ==', 4, 1, '', 0, '2018-04-16 10:04:39', 1, '2018-04-16 10:04:39', 1),
(5, 'timbangan', 'TIMBANGAN', 'dGltYmFuZ2Fu', 5, 1, '', 0, '2018-04-16 10:04:59', 1, '2018-04-16 10:04:59', 1),
(6, 'gudang', 'GUDANG', 'Z3VkYW5n', 6, 1, '', 0, '2018-04-16 10:04:20', 1, '2018-04-16 10:04:20', 1),
(7, 'procurement', 'PROCUREMENT', 'cHJvY3VyZW1lbnQ=', 7, 1, '', 0, '2018-04-17 06:04:01', 1, '2018-04-17 06:04:01', 1),
(8, 'sales', 'SALES', 'c2FsZXM=', 8, 1, '', 0, '2018-07-02 11:07:18', 1, '2018-07-02 11:07:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `no_voucher` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_voucher` varchar(15) NOT NULL,
  `po_id` int(11) NOT NULL,
  `ttr_id` int(11) NOT NULL,
  `group_cost_id` int(11) NOT NULL,
  `cost_id` int(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `no_voucher`, `tanggal`, `jenis_voucher`, `po_id`, `ttr_id`, `group_cost_id`, `cost_id`, `jenis_barang`, `amount`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'VRSK.14022018.0001', '2018-02-14', 'DP', 4, 0, 0, 0, 'RONGSOK', 500000, 'BAYAR UANG MUKA', '2018-02-14 11:02:10', 1, '2018-02-14 11:02:10', 1),
(2, 'VRSK.17022018.0001', '2018-02-17', 'Pelunasan', 4, 1, 0, 0, 'RONGSOK', 5600000, '', '2018-02-17 06:02:17', 1, '2018-02-17 06:02:17', 1),
(3, 'VCOST.25022018.0001', '2018-02-25', 'Manual', 0, 0, 1, 1, '', 25000, '', '2018-02-25 07:02:59', 1, '2018-02-25 07:02:59', 1),
(4, 'VRSK.25032018.0001', '2018-03-25', 'DP', 7, 0, 0, 0, 'RONGSOK', 550000, '', '2018-03-25 07:03:31', 1, '2018-03-25 07:03:31', 1),
(6, 'VRSK.16042018.0002', '2018-04-16', 'Pelunasan', 8, 0, 0, 0, 'RONGSOK', 1250000, 'TEST PELUNASAN', '2018-04-16 08:04:30', 1, '2018-04-16 08:04:30', 1),
(7, 'VSP.16042018.0001', '2018-04-16', 'Parsial', 3, 0, 0, 0, 'SPARE PART', 200000, '', '2018-04-16 09:04:23', 1, '2018-04-16 09:04:23', 1),
(8, 'VSP.16042018.0002', '2018-04-16', 'Pelunasan', 3, 0, 0, 0, 'SPARE PART', 100000, 'PELUNASAN', '2018-04-16 09:04:54', 1, '2018-04-16 09:04:54', 1),
(10, 'VRSK.27042018.0002', '2018-04-27', 'DP', 9, 0, 0, 0, 'RONGSOK', 300000, '', '2018-04-27 10:04:13', 1, '2018-04-27 10:04:13', 1),
(11, 'VRSK.15052018.0001', '2018-05-15', 'DP', 10, 0, 0, 0, 'RONGSOK', 400000, 'TANDA JADI', '2018-05-15 08:05:23', 1, '2018-05-15 08:05:23', 1),
(12, 'VRSK.04102018.0001', '2018-10-04', 'DP', 11, 0, 0, 0, 'RONGSOK', 10000, '', '2018-10-04 02:10:06', 1, '2018-10-04 02:10:06', 1),
(13, 'VRSK.04102018.0002', '2018-10-04', 'DP', 12, 0, 0, 0, 'RONGSOK', 1000000, '', '2018-10-04 02:10:31', 1, '2018-10-04 02:10:31', 1),
(14, 'VRSK.05102018.0001', '2018-10-05', 'DP', 13, 0, 0, 0, 'RONGSOK', 500000, 'DP AWAL', '2018-10-05 04:10:59', 1, '2018-10-05 04:10:59', 1),
(15, 'VRSK.05102018.0002', '2018-10-05', 'DP', 14, 0, 0, 0, 'RONGSOK', 100000, '', '2018-10-05 06:10:25', 1, '2018-10-05 06:10:25', 1),
(16, 'VRSK.08102018.0001', '2018-10-08', 'DP', 15, 0, 0, 0, 'RONGSOK', 200000, '', '2018-10-08 11:10:13', 1, '2018-10-08 11:10:13', 1),
(17, 'VRSK.08102018.0002', '2018-10-08', 'DP', 16, 0, 0, 0, 'RONGSOK', 500000, '', '2018-10-08 03:10:02', 1, '2018-10-08 03:10:02', 1),
(18, 'VSP.08102018.0001', '2018-10-08', 'Parsial', 18, 0, 0, 0, 'SPARE PART', 10000, '', '2018-10-08 05:10:03', 1, '2018-10-08 05:10:03', 1),
(19, 'VSP.06112018.0001', '2018-11-06', 'Parsial', 31, 0, 0, 0, 'SPARE PART', 500000, 'TEST', '2018-11-06 04:11:51', 1, '2018-11-06 04:11:51', 1),
(20, 'VRSK.22112018.0001', '2018-11-22', 'Pelunasan', 26, 0, 0, 0, 'RONGSOK', 400000, '', '2018-11-22 09:11:45', 1, '2018-11-22 09:11:45', 1),
(21, 'VSP.22112018.0001', '2018-11-22', 'Pelunasan', 33, 0, 0, 0, 'SPARE PART', 120000, '', '2018-11-22 11:11:03', 1, '2018-11-22 11:11:03', 1),
(25, 'VRSK.22112018.0002', '2018-11-22', 'Pelunasan', 35, 0, 0, 0, 'RONGSOK', 33800000, '', '2018-11-22 11:11:54', 1, '2018-11-22 11:11:54', 1),
(29, 'VRSK.22112018.0003', '2018-11-22', 'DP', 21, 0, 0, 0, 'RONGSOK', 50000, '', '2018-11-22 12:11:41', 1, '2018-11-22 12:11:41', 1),
(36, 'VRSK.22112018.0004', '2018-11-22', 'DP', 21, 0, 0, 0, 'RONGSOK', 60000, '', '2018-11-22 01:11:53', 1, '2018-11-22 01:11:53', 1),
(37, 'VRSK.22112018.0005', '2018-11-22', 'DP', 21, 0, 0, 0, 'RONGSOK', 30000, '', '2018-11-22 04:11:59', 1, '2018-11-22 04:11:59', 1),
(38, 'VRSK.22112018.0006', '2018-11-22', 'Pelunasan', 16, 0, 0, 0, 'RONGSOK', 2225000, '', '2018-11-22 04:11:20', 1, '2018-11-22 04:11:20', 1),
(39, 'VSP.27112018.0001', '2018-11-27', 'Parsial', 34, 0, 0, 0, 'SPARE PART', 75000, '', '2018-11-27 01:11:43', 1, '2018-11-27 01:11:43', 1),
(40, 'VSP.27112018.0002', '2018-11-27', 'Pelunasan', 34, 0, 0, 0, 'SPARE PART', 100000, '', '2018-11-27 01:11:58', 1, '2018-11-27 01:11:58', 1),
(41, 'VRSK.27112018.0001', '2018-11-27', 'DP', 36, 0, 0, 0, 'RONGSOK', 500000, '', '2018-11-27 02:11:03', 1, '2018-11-27 02:11:03', 1),
(42, 'VSP.28112018.0001', '2018-11-28', 'Parsial', 37, 0, 0, 0, 'SPARE PART', 100000, '', '2018-11-28 12:11:22', 1, '2018-11-28 12:11:22', 1),
(43, 'VSP.28112018.0002', '2018-11-28', 'Pelunasan', 37, 0, 0, 0, 'SPARE PART', 229950, '', '2018-11-28 12:11:30', 1, '2018-11-28 12:11:30', 1),
(44, 'VSP.28112018.0003', '2018-11-28', 'Parsial', 31, 0, 0, 0, 'SPARE PART', 400000, '', '2018-11-28 12:11:23', 1, '2018-11-28 12:11:23', 1),
(45, 'VSP.28112018.0004', '2018-11-28', 'Pelunasan', 18, 0, 0, 0, 'SPARE PART', 40000, '', '2018-11-28 12:11:16', 1, '2018-11-28 12:11:16', 1),
(46, 'VSP.28112018.0005', '2018-11-28', 'Pelunasan', 30, 0, 0, 0, 'SPARE PART', 750000, '', '2018-11-28 01:11:20', 1, '2018-11-28 01:11:20', 1),
(47, 'VSP.28112018.0006', '2018-11-28', 'Pelunasan', 31, 0, 0, 0, 'SPARE PART', 1300000, '', '2018-11-28 01:11:28', 1, '2018-11-28 01:11:28', 1),
(48, 'VSP.28112018.0007', '2018-11-28', 'Pelunasan', 29, 0, 0, 0, 'SPARE PART', 750000, '', '2018-11-28 01:11:34', 1, '2018-11-28 01:11:34', 1),
(49, 'VSP.28112018.0008', '2018-11-28', 'Pelunasan', 28, 0, 0, 0, 'SPARE PART', 400000, '', '2018-11-28 01:11:42', 1, '2018-11-28 01:11:42', 1),
(50, 'VSP.28112018.0009', '2018-11-28', 'Parsial', 38, 0, 0, 0, 'SPARE PART', 32000, '', '2018-11-28 01:11:12', 1, '2018-11-28 01:11:12', 1),
(51, 'VSP.28112018.0010', '2018-11-28', 'Pelunasan', 38, 0, 0, 0, 'SPARE PART', 370000, '', '2018-11-28 01:11:20', 1, '2018-11-28 01:11:20', 1),
(52, 'VRSK.201811.0001', '2018-11-30', 'DP', 20, 0, 0, 0, 'RONGSOK', 100000, 'DP 1', '2018-11-30 01:11:29', 1, '2018-11-30 01:11:29', 1),
(53, 'VRSK.201812.0001', '2018-12-03', 'Pelunasan', 19, 0, 0, 0, 'RONGSOK', 987500, '', '2018-12-03 01:12:17', 1, '2018-12-03 01:12:17', 1),
(56, 'VRSK.201812.0004', '2018-12-03', 'DP', 20, 0, 0, 0, 'RONGSOK', 462500, '', '2018-12-03 01:12:58', 1, '2018-12-03 01:12:58', 1),
(57, 'VRSK.201812.0005', '2018-12-03', 'DP', 27, 0, 0, 0, 'RONGSOK', 60000, '', '2018-12-03 01:12:42', 1, '2018-12-03 01:12:42', 1),
(58, 'VRSK.201812.0006', '2018-12-03', 'Pelunasan', 27, 0, 0, 0, 'RONGSOK', 60000, '', '2018-12-03 01:12:48', 1, '2018-12-03 01:12:48', 1),
(59, 'VRSK.201812.0007', '2018-12-03', 'DP', 32, 0, 0, 0, 'RONGSOK', 80000, '', '2018-12-03 01:12:56', 1, '2018-12-03 01:12:56', 1),
(60, 'VRSK.201812.0008', '2018-12-03', 'DP', 32, 0, 0, 0, 'RONGSOK', 100000, '', '2018-12-03 01:12:02', 1, '2018-12-03 01:12:02', 1),
(61, 'VRSK.201812.0009', '2018-12-03', 'DP', 43, 0, 0, 0, 'RONGSOK', 600000, '', '2018-12-03 01:12:18', 1, '2018-12-03 01:12:18', 1),
(65, 'VRSK.201812.0013', '2018-12-03', 'DP', 21, 0, 0, 0, 'RONGSOK', 360000, '', '2018-12-03 02:12:26', 1, '2018-12-03 02:12:26', 1),
(66, 'VRSK.201812.0014', '2018-12-03', 'DP', 32, 0, 0, 0, 'RONGSOK', 10000, '', '2018-12-03 02:12:02', 1, '2018-12-03 02:12:02', 1),
(67, 'VRSK.201812.0015', '2018-12-03', 'DP', 36, 0, 0, 0, 'RONGSOK', 200000, '', '2018-12-03 02:12:10', 1, '2018-12-03 02:12:10', 1),
(68, 'VRSK.201812.0016', '2018-12-03', 'Pelunasan', 36, 0, 0, 0, 'RONGSOK', 100000, '', '2018-12-03 02:12:12', 1, '2018-12-03 02:12:12', 1);

-- --------------------------------------------------------

--
-- Structure for view `stok_fg`
--
DROP TABLE IF EXISTS `stok_fg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_fg`  AS  select `t_gudang_fg`.`jenis_barang_id` AS `jenis_barang_id`,`jb`.`jenis_barang` AS `jenis_barang`,count(`t_gudang_fg`.`jenis_barang_id`) AS `total_qty`,sum(`t_gudang_fg`.`netto`) AS `total_netto` from (`t_gudang_fg` left join `jenis_barang` `jb` on((`jb`.`id` = `t_gudang_fg`.`jenis_barang_id`))) where (`t_gudang_fg`.`jenis_trx` = 0) group by `t_gudang_fg`.`jenis_barang_id` ;

-- --------------------------------------------------------

--
-- Structure for view `stok_sparepart`
--
DROP TABLE IF EXISTS `stok_sparepart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_sparepart`  AS  select `ti`.`id` AS `id`,`ti`.`nama_produk` AS `nama_produk`,sum(`tid`.`bruto_masuk`) AS `total_bruto_masuk`,sum(`tid`.`netto_masuk`) AS `total_netto_masuk`,sum(`tid`.`bruto_keluar`) AS `total_bruto_keluar`,sum(`tid`.`netto_keluar`) AS `total_netto_keluar`,(sum(`tid`.`bruto_masuk`) - sum(`tid`.`bruto_keluar`)) AS `stok_bruto`,(sum(`tid`.`netto_masuk`) - sum(`tid`.`netto_keluar`)) AS `stok_netto` from (`t_inventory` `ti` left join `t_inventory_detail` `tid` on((`tid`.`t_inventory_id` = `ti`.`id`))) where (`ti`.`jenis_item` = 'SPARE PART') group by `ti`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `stok_wip`
--
DROP TABLE IF EXISTS `stok_wip`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_wip`  AS  select `t_gudang_wip`.`jenis_barang_id` AS `jenis_barang_id`,`jb`.`jenis_barang` AS `jenis_barang`,sum((case when (`t_gudang_wip`.`jenis_trx` = 0) then `t_gudang_wip`.`qty` else 0 end)) AS `total_qty_in`,sum((case when (`t_gudang_wip`.`jenis_trx` = 1) then `t_gudang_wip`.`qty` else 0 end)) AS `total_qty_out`,sum((case when (`t_gudang_wip`.`jenis_trx` = 0) then `t_gudang_wip`.`berat` else 0 end)) AS `total_berat_in`,sum((case when (`t_gudang_wip`.`jenis_trx` = 1) then `t_gudang_wip`.`berat` else 0 end)) AS `total_berat_out` from (`t_gudang_wip` left join `jenis_barang` `jb` on((`jb`.`id` = `t_gudang_wip`.`jenis_barang_id`))) group by `t_gudang_wip`.`jenis_barang_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ampas`
--
ALTER TABLE `ampas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apolo`
--
ALTER TABLE `apolo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_proses_resmi`
--
ALTER TABLE `app_proses_resmi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_resmi_barcode`
--
ALTER TABLE `app_resmi_barcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_resmi_voucher`
--
ALTER TABLE `app_resmi_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beli_sparepart`
--
ALTER TABLE `beli_sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beli_sparepart_detail`
--
ALTER TABLE `beli_sparepart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtr_detail`
--
ALTER TABLE `dtr_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_pallete` (`no_pallete`),
  ADD KEY `no_pallete_2` (`no_pallete`);

--
-- Indexes for table `f_pembayaran`
--
ALTER TABLE `f_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_pembayaran_detail`
--
ALTER TABLE `f_pembayaran_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_uang_masuk`
--
ALTER TABLE `f_uang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_cost`
--
ALTER TABLE `group_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_barang` (`jenis_barang`,`kode`,`category`);

--
-- Indexes for table `jenis_barang_old`
--
ALTER TABLE `jenis_barang_old`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_barang` (`jenis_barang`);

--
-- Indexes for table `lpb`
--
ALTER TABLE `lpb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lpb_detail`
--
ALTER TABLE `lpb_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_agen`
--
ALTER TABLE `m_agen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_biaya`
--
ALTER TABLE `m_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_biaya_detail`
--
ALTER TABLE `m_biaya_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bobbin`
--
ALTER TABLE `m_bobbin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bobbin_size`
--
ALTER TABLE `m_bobbin_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bobbin_status`
--
ALTER TABLE `m_bobbin_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_cities`
--
ALTER TABLE `m_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_customers`
--
ALTER TABLE `m_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_customers_old`
--
ALTER TABLE `m_customers_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jenis_brg_fg`
--
ALTER TABLE `m_jenis_brg_fg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jenis_brg_wip`
--
ALTER TABLE `m_jenis_brg_wip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jenis_packing`
--
ALTER TABLE `m_jenis_packing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jenis_trx`
--
ALTER TABLE `m_jenis_trx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jns_req_bb`
--
ALTER TABLE `m_jns_req_bb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kendaraan`
--
ALTER TABLE `m_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_milik`
--
ALTER TABLE `m_milik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_muatan`
--
ALTER TABLE `m_muatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_numberings`
--
ALTER TABLE `m_numberings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_numbering_details`
--
ALTER TABLE `m_numbering_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_print_barcode`
--
ALTER TABLE `m_print_barcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_print_barcode_line`
--
ALTER TABLE `m_print_barcode_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_provinces`
--
ALTER TABLE `m_provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_sumber_fg`
--
ALTER TABLE `m_sumber_fg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_sumber_wip`
--
ALTER TABLE `m_sumber_wip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_type_kendaraan`
--
ALTER TABLE `m_type_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_detail`
--
ALTER TABLE `po_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_ampas`
--
ALTER TABLE `produksi_ampas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_produksi` (`no_produksi`),
  ADD KEY `no_produksi_2` (`no_produksi`);

--
-- Indexes for table `produksi_ampas_detail`
--
ALTER TABLE `produksi_ampas_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_fg`
--
ALTER TABLE `produksi_fg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_fg_detail`
--
ALTER TABLE `produksi_fg_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_ingot`
--
ALTER TABLE `produksi_ingot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_produksi` (`no_produksi`),
  ADD KEY `no_produksi_2` (`no_produksi`);

--
-- Indexes for table `produksi_ingot_detail`
--
ALTER TABLE `produksi_ingot_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_sample`
--
ALTER TABLE `request_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_sample_detail`
--
ALTER TABLE `request_sample_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rongsok`
--
ALTER TABLE `rongsok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rongsok_old`
--
ALTER TABLE `rongsok_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skb`
--
ALTER TABLE `skb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skb_detail`
--
ALTER TABLE `skb_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparepart_old`
--
ALTER TABLE `sparepart_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spb`
--
ALTER TABLE `spb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spb_detail`
--
ALTER TABLE `spb_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spb_detail_fulfilment`
--
ALTER TABLE `spb_detail_fulfilment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_old`
--
ALTER TABLE `supplier_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_jalan_detail`
--
ALTER TABLE `surat_jalan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary`
--
ALTER TABLE `temporary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tolling_fg`
--
ALTER TABLE `tolling_fg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tolling_fg_detail`
--
ALTER TABLE `tolling_fg_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttr`
--
ALTER TABLE `ttr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttr_detail`
--
ALTER TABLE `ttr_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bobbin_trx`
--
ALTER TABLE `t_bobbin_trx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bpb_ampas`
--
ALTER TABLE `t_bpb_ampas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bpb_ampas_detail`
--
ALTER TABLE `t_bpb_ampas_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bpb_bobbin`
--
ALTER TABLE `t_bpb_bobbin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bpb_bobbin_detail`
--
ALTER TABLE `t_bpb_bobbin_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bpb_fg`
--
ALTER TABLE `t_bpb_fg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bpb_fg_detail`
--
ALTER TABLE `t_bpb_fg_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bpb_wip`
--
ALTER TABLE `t_bpb_wip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bpb_wip_detail`
--
ALTER TABLE `t_bpb_wip_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_delivery_order`
--
ALTER TABLE `t_delivery_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_delivery_order_detail`
--
ALTER TABLE `t_delivery_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_gudang_ampas`
--
ALTER TABLE `t_gudang_ampas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_gudang_fg`
--
ALTER TABLE `t_gudang_fg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_gudang_wip`
--
ALTER TABLE `t_gudang_wip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_hasil_masak`
--
ALTER TABLE `t_hasil_masak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_masak` (`no_masak`),
  ADD KEY `no_masak_2` (`no_masak`);

--
-- Indexes for table `t_hasil_wip`
--
ALTER TABLE `t_hasil_wip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_inventory`
--
ALTER TABLE `t_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_inventory_detail`
--
ALTER TABLE `t_inventory_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_kas`
--
ALTER TABLE `t_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_saldo`
--
ALTER TABLE `t_saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sales_order`
--
ALTER TABLE `t_sales_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sales_order_detail`
--
ALTER TABLE `t_sales_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_bobbin`
--
ALTER TABLE `t_spb_bobbin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_bobbin_detail`
--
ALTER TABLE `t_spb_bobbin_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_bobbin_rq`
--
ALTER TABLE `t_spb_bobbin_rq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_fg`
--
ALTER TABLE `t_spb_fg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_fg_detail`
--
ALTER TABLE `t_spb_fg_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_rongsok`
--
ALTER TABLE `t_spb_rongsok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_rongsok_detail`
--
ALTER TABLE `t_spb_rongsok_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_rongsok_rq`
--
ALTER TABLE `t_spb_rongsok_rq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_sparepart`
--
ALTER TABLE `t_spb_sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_sparepart_detail`
--
ALTER TABLE `t_spb_sparepart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_sparepart_detail_keluar`
--
ALTER TABLE `t_spb_sparepart_detail_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_wip`
--
ALTER TABLE `t_spb_wip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_wip_detail`
--
ALTER TABLE `t_spb_wip_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_surat_jalan`
--
ALTER TABLE `t_surat_jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_surat_jalan_detail`
--
ALTER TABLE `t_surat_jalan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ampas`
--
ALTER TABLE `ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `apolo`
--
ALTER TABLE `apolo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `app_proses_resmi`
--
ALTER TABLE `app_proses_resmi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `app_resmi_barcode`
--
ALTER TABLE `app_resmi_barcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `app_resmi_voucher`
--
ALTER TABLE `app_resmi_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `beli_sparepart`
--
ALTER TABLE `beli_sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `beli_sparepart_detail`
--
ALTER TABLE `beli_sparepart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `dtr_detail`
--
ALTER TABLE `dtr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `f_pembayaran`
--
ALTER TABLE `f_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `f_pembayaran_detail`
--
ALTER TABLE `f_pembayaran_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `f_uang_masuk`
--
ALTER TABLE `f_uang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `group_cost`
--
ALTER TABLE `group_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=676;
--
-- AUTO_INCREMENT for table `jenis_barang_old`
--
ALTER TABLE `jenis_barang_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lpb`
--
ALTER TABLE `lpb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `lpb_detail`
--
ALTER TABLE `lpb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `m_agen`
--
ALTER TABLE `m_agen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_biaya`
--
ALTER TABLE `m_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `m_biaya_detail`
--
ALTER TABLE `m_biaya_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_bobbin`
--
ALTER TABLE `m_bobbin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `m_bobbin_size`
--
ALTER TABLE `m_bobbin_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `m_bobbin_status`
--
ALTER TABLE `m_bobbin_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_cities`
--
ALTER TABLE `m_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `m_customers`
--
ALTER TABLE `m_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
--
-- AUTO_INCREMENT for table `m_customers_old`
--
ALTER TABLE `m_customers_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_jenis_brg_fg`
--
ALTER TABLE `m_jenis_brg_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_jenis_brg_wip`
--
ALTER TABLE `m_jenis_brg_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_jenis_packing`
--
ALTER TABLE `m_jenis_packing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_jenis_trx`
--
ALTER TABLE `m_jenis_trx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_jns_req_bb`
--
ALTER TABLE `m_jns_req_bb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_kendaraan`
--
ALTER TABLE `m_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_milik`
--
ALTER TABLE `m_milik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_muatan`
--
ALTER TABLE `m_muatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `m_numberings`
--
ALTER TABLE `m_numberings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `m_numbering_details`
--
ALTER TABLE `m_numbering_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;
--
-- AUTO_INCREMENT for table `m_print_barcode`
--
ALTER TABLE `m_print_barcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_provinces`
--
ALTER TABLE `m_provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `m_sumber_fg`
--
ALTER TABLE `m_sumber_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_sumber_wip`
--
ALTER TABLE `m_sumber_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_type_kendaraan`
--
ALTER TABLE `m_type_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `po_detail`
--
ALTER TABLE `po_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `produksi_ampas`
--
ALTER TABLE `produksi_ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `produksi_ampas_detail`
--
ALTER TABLE `produksi_ampas_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `produksi_fg`
--
ALTER TABLE `produksi_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `produksi_fg_detail`
--
ALTER TABLE `produksi_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `produksi_ingot`
--
ALTER TABLE `produksi_ingot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `produksi_ingot_detail`
--
ALTER TABLE `produksi_ingot_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `request_sample`
--
ALTER TABLE `request_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `request_sample_detail`
--
ALTER TABLE `request_sample_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `rongsok`
--
ALTER TABLE `rongsok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `rongsok_old`
--
ALTER TABLE `rongsok_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `skb`
--
ALTER TABLE `skb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `skb_detail`
--
ALTER TABLE `skb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2721;
--
-- AUTO_INCREMENT for table `sparepart_old`
--
ALTER TABLE `sparepart_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `spb`
--
ALTER TABLE `spb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `spb_detail`
--
ALTER TABLE `spb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `spb_detail_fulfilment`
--
ALTER TABLE `spb_detail_fulfilment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788;
--
-- AUTO_INCREMENT for table `supplier_old`
--
ALTER TABLE `supplier_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `surat_jalan_detail`
--
ALTER TABLE `surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `temporary`
--
ALTER TABLE `temporary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tolling_fg`
--
ALTER TABLE `tolling_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tolling_fg_detail`
--
ALTER TABLE `tolling_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ttr`
--
ALTER TABLE `ttr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `ttr_detail`
--
ALTER TABLE `ttr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `t_bobbin_trx`
--
ALTER TABLE `t_bobbin_trx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_bpb_ampas`
--
ALTER TABLE `t_bpb_ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_bpb_ampas_detail`
--
ALTER TABLE `t_bpb_ampas_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_bpb_bobbin`
--
ALTER TABLE `t_bpb_bobbin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_bpb_bobbin_detail`
--
ALTER TABLE `t_bpb_bobbin_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_bpb_fg`
--
ALTER TABLE `t_bpb_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `t_bpb_fg_detail`
--
ALTER TABLE `t_bpb_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `t_bpb_wip`
--
ALTER TABLE `t_bpb_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `t_bpb_wip_detail`
--
ALTER TABLE `t_bpb_wip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `t_delivery_order`
--
ALTER TABLE `t_delivery_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_delivery_order_detail`
--
ALTER TABLE `t_delivery_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_gudang_ampas`
--
ALTER TABLE `t_gudang_ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_gudang_fg`
--
ALTER TABLE `t_gudang_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `t_gudang_wip`
--
ALTER TABLE `t_gudang_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `t_hasil_masak`
--
ALTER TABLE `t_hasil_masak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `t_hasil_wip`
--
ALTER TABLE `t_hasil_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `t_inventory`
--
ALTER TABLE `t_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `t_inventory_detail`
--
ALTER TABLE `t_inventory_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `t_kas`
--
ALTER TABLE `t_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_saldo`
--
ALTER TABLE `t_saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_sales_order`
--
ALTER TABLE `t_sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `t_sales_order_detail`
--
ALTER TABLE `t_sales_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `t_spb_bobbin`
--
ALTER TABLE `t_spb_bobbin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_bobbin_detail`
--
ALTER TABLE `t_spb_bobbin_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_bobbin_rq`
--
ALTER TABLE `t_spb_bobbin_rq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_fg`
--
ALTER TABLE `t_spb_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `t_spb_fg_detail`
--
ALTER TABLE `t_spb_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `t_spb_rongsok`
--
ALTER TABLE `t_spb_rongsok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_rongsok_detail`
--
ALTER TABLE `t_spb_rongsok_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_rongsok_rq`
--
ALTER TABLE `t_spb_rongsok_rq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_sparepart`
--
ALTER TABLE `t_spb_sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_spb_sparepart_detail`
--
ALTER TABLE `t_spb_sparepart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `t_spb_sparepart_detail_keluar`
--
ALTER TABLE `t_spb_sparepart_detail_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_spb_wip`
--
ALTER TABLE `t_spb_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `t_spb_wip_detail`
--
ALTER TABLE `t_spb_wip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `t_surat_jalan`
--
ALTER TABLE `t_surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_surat_jalan_detail`
--
ALTER TABLE `t_surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
