-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2018 at 06:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

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
(3, 'PPS.27042018.0001', '2018-04-27', 1, NULL, 0, '2018-04-27 10:04:32', 1, '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', 0, '', '2018-04-27 10:04:36', 1);

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
(4, 2, 2, 3, 0),
(5, 2, 1, 1, 0),
(6, 3, 2, 1, 0),
(7, 3, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bobin`
--

CREATE TABLE `bobin` (
  `id` int(11) NOT NULL,
  `nama_bobin` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `berat` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobin`
--

INSERT INTO `bobin` (`id`, `nama_bobin`, `ukuran`, `berat`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'BOBIN 1', 'BESAR', 50, 1, '2018-02-25 08:02:13', 1, '2018-02-25 08:02:13', 1),
(2, 'BOBIN 2', 'BESAR', 50, 1, '2018-02-25 08:02:29', 1, '2018-02-25 08:02:29', 1),
(3, 'BOBIN 3', 'KECIL', 10, 0, '2018-02-25 08:02:40', 1, '2018-02-25 08:02:40', 1);

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
  `m_customer_id` int(11) NOT NULL,
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

INSERT INTO `dtr` (`id`, `no_dtr`, `tanggal`, `po_id`, `so_id`, `skb_id`, `m_customer_id`, `jenis_barang`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `reject_remarks`, `status_pembayaran`, `type_retur`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'DTR.15022018.0001', '2018-02-15', 0, 0, 0, 0, 'RONGSOK', '', 1, '2018-02-17 10:02:29', 1, '2018-02-17 10:02:42', 1, 'BERAT KURANG 100 KG, TIMBANG ULANG!', 0, 0, '2018-02-15 10:02:03', 1, '2018-02-17 11:02:53', 1),
(2, 'DTR.19022018.0001', '2018-02-19', 0, 1, 0, 0, 'RONGSOK', '', 1, '2018-02-19 09:02:55', 1, '2018-02-19 09:02:10', 1, 'BERAT TIDAK SESUAI', 0, 0, '2018-02-19 08:02:40', 1, '2018-02-19 09:02:47', 1),
(4, 'DTR.22022018.0001', '2018-02-22', 5, 0, 0, 0, 'AMPAS', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-02-22 01:02:29', 1, '2018-02-22 01:02:29', 1),
(5, 'DTR.24022018.0001', '2018-02-24', 6, 0, 0, 0, 'INGOT RENDAH', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-02-24 10:02:49', 1, '2018-02-24 10:02:49', 1),
(6, 'DTR.25022018.0001', '2018-02-25', 0, 0, 3, 0, 'KAWAT HITAM', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-02-25 12:02:48', 1, '2018-02-25 12:02:48', 1),
(7, 'DTR.25022018.0002', '2018-02-25', 0, 0, 0, 1, 'KAWAT', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 1, 0, '2018-02-25 11:02:08', 1, '2018-02-25 11:02:24', 1),
(8, 'DTR.27042018.0001', '2018-04-27', 9, 0, 0, 0, 'RONGSOK', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-04-27 10:04:48', 1, '2018-04-27 10:04:48', 1),
(9, 'DTR.27042018.0002', '2018-04-27', 0, 2, 0, 0, 'RONGSOK', '', 1, '2018-04-27 10:04:35', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-04-27 10:04:05', 1, '2018-04-27 10:04:05', 1),
(10, 'DTR.15052018.0001', '2018-05-15', 10, 0, 0, 0, 'RONGSOK', '', 1, '2018-05-15 09:05:44', 1, '2018-05-15 08:05:54', 1, 'TIMBANG ULANG, BERAT TIDAK COCOK', 0, 0, '2018-05-15 08:05:38', 1, '2018-05-15 08:05:59', 1),
(11, 'DTR.16052018.0001', '2018-05-16', 7, 0, 0, 0, 'RONGSOK', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-05-16 09:05:36', 1, '2018-05-16 09:05:36', 1),
(12, 'DTR.25022016.0001', '2016-02-25', 0, 3, 0, 0, 'RONGSOK', '', 1, '2016-02-25 07:02:57', 1, '2016-02-25 07:02:14', 1, 'BERAT KURANG', 0, 0, '2016-02-25 07:02:48', 1, '2016-02-25 07:02:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtr_detail`
--

CREATE TABLE `dtr_detail` (
  `id` int(11) NOT NULL,
  `dtr_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `so_detail_id` int(11) NOT NULL,
  `skb_detail_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `ampas_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `no_pallete` varchar(50) NOT NULL,
  `no_batch` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtr_detail`
--

INSERT INTO `dtr_detail` (`id`, `dtr_id`, `po_detail_id`, `so_detail_id`, `skb_detail_id`, `rongsok_id`, `ampas_id`, `qty`, `bruto`, `netto`, `line_remarks`, `no_pallete`, `no_batch`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, 4, 0, 0, 1, 0, 200, 750, 700, '', '200901', '', '0000-00-00 00:00:00', 0, '2018-02-17 11:02:53', 1),
(2, 1, 6, 0, 0, 2, 0, 88, 450, 420, '', '', '', '0000-00-00 00:00:00', 0, '2018-02-17 11:02:53', 1),
(3, 2, 0, 1, 0, 2, 0, 1, 200, 150, '', '200902', '', '0000-00-00 00:00:00', 0, '2018-02-19 09:02:47', 1),
(4, 2, 0, 2, 0, 2, 0, 1, 180, 175, '', '200903', '', '0000-00-00 00:00:00', 0, '2018-02-19 09:02:47', 1),
(5, 4, 7, 0, 0, 0, 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 4, 8, 0, 0, 0, 2, 2, 0, 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 5, 9, 0, 0, 3, 0, 12, 450, 430, '', '', 'BT010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 5, 10, 0, 0, 4, 0, 10, 530, 500, '', '', 'BT011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 6, 0, 0, 5, 1, 0, 100, 450, 440, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 6, 0, 0, 6, 2, 0, 25, 350, 330, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 7, 0, 0, 0, 0, 1, 10, 100, 90, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 7, 0, 0, 0, 0, 2, 5, 60, 58, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 8, 15, 0, 0, 1, 0, 45, 25, 460, '', '200901', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 8, 16, 0, 0, 2, 0, 10, 300, 250, '', '200902', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 9, 0, 3, 0, 1, 0, 2, 0, 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 9, 0, 4, 0, 2, 0, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 10, 17, 0, 0, 1, 0, 40, 400, 390, 'PALET 1', '200902', '', '0000-00-00 00:00:00', 0, '2018-05-15 08:05:59', 1),
(18, 10, 18, 0, 0, 2, 0, 60, 600, 590, 'PALET 2', '200903', '', '0000-00-00 00:00:00', 0, '2018-05-15 08:05:59', 1),
(19, 11, 13, 0, 0, 2, 0, 4, 300, 270, '', '200904R', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 12, 0, 5, 0, 1, 0, 5, 440, 430, '', '200905E', '', '0000-00-00 00:00:00', 0, '2016-02-25 07:02:25', 1);

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
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `jenis_barang`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'RONGSOK', '', '2018-02-14 10:02:58', 1, '2018-02-14 10:02:58', 1),
(2, 'INGOT', '', '2018-02-14 10:02:10', 1, '2018-02-14 10:02:10', 1),
(3, 'AMPAS', '', '2018-02-14 10:02:43', 1, '2018-02-14 10:02:43', 1),
(4, 'TOLLING', '', '2018-02-14 10:02:53', 1, '2018-02-14 10:02:53', 1),
(5, 'KAWAT', '', '2018-02-14 10:02:07', 1, '2018-02-14 10:02:07', 1),
(6, 'KAWAT HITAM', '', '2018-02-25 07:02:52', 1, '2018-02-25 07:02:52', 1);

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
(3, 'BPB.25022016.0002', '2016-02-25', 2, '', 'ANWAR', '2016-02-25 06:02:56', 1, '2016-02-25 06:02:56', 1);

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
(3, 3, 2, 1, 3, '');

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
(68, 1, 'BeliRongsok'),
(69, 68, 'index'),
(70, 68, 'add'),
(71, 68, 'edit'),
(72, 68, 'print_po'),
(73, 68, 'create_dtr'),
(74, 68, 'dtr_list'),
(75, 68, 'print_dtr'),
(76, 68, 'matching'),
(77, 68, 'proses_matching'),
(78, 68, 'approve'),
(79, 68, 'reject'),
(80, 68, 'edit_dtr'),
(81, 68, 'create_ttr'),
(82, 68, 'ttr_list'),
(83, 68, 'print_ttr'),
(84, 68, 'create_voucher_dp'),
(85, 68, 'create_voucher_pelunasan'),
(86, 1, 'PengirimanAmpas'),
(87, 86, 'index'),
(88, 86, 'add'),
(89, 86, 'edit'),
(90, 86, 'add_detail'),
(91, 86, 'delete_detail'),
(92, 86, 'print_po'),
(93, 86, 'create_dtr'),
(94, 86, 'dtr_list'),
(95, 86, 'print_dtr'),
(96, 86, 'surat_jalan'),
(97, 86, 'add_surat_jalan'),
(98, 86, 'edit_surat_jalan'),
(99, 86, 'add_detail_surat_jalan'),
(100, 86, 'edit_detail_surat_jalan'),
(101, 86, 'print_surat_jalan'),
(102, 1, 'Tolling'),
(103, 102, 'index'),
(104, 102, 'add'),
(105, 102, 'edit'),
(106, 102, 'add_detail'),
(107, 102, 'delete_detail'),
(108, 102, 'print_so'),
(109, 102, 'create_dtr'),
(110, 102, 'dtr_list'),
(111, 102, 'print_dtr'),
(112, 102, 'view_dtr'),
(113, 102, 'approve'),
(114, 102, 'reject'),
(115, 102, 'edit_dtr'),
(116, 102, 'create_ttr'),
(117, 102, 'ttr_list'),
(118, 102, 'print_ttr'),
(119, 102, 'produksi_ampas'),
(120, 102, 'add_produksi_ampas'),
(121, 102, 'edit_produksi_ampas'),
(122, 102, 'add_detail_produksi_ampas'),
(123, 102, 'delete_detail_produksi_ampas'),
(124, 102, 'surat_jalan'),
(125, 102, 'add_surat_jalan'),
(126, 102, 'edit_surat_jalan'),
(127, 102, 'add_detail_surat_jalan'),
(128, 102, 'delete_detail_surat_jalan'),
(129, 102, 'print_surat_jalan'),
(130, 1, 'IngotRendah'),
(131, 130, 'index'),
(132, 130, 'add'),
(133, 130, 'edit'),
(134, 130, 'add_detail'),
(135, 130, 'delete_detail'),
(136, 130, 'print_po'),
(137, 130, 'create_dtr'),
(138, 130, 'dtr_list'),
(139, 130, 'print_dtr'),
(140, 130, 'create_ttr'),
(141, 130, 'ttr_list'),
(142, 130, 'print_ttr'),
(143, 130, 'create_voucher_piutang'),
(144, 1, 'RollingKawatHitam'),
(145, 144, 'index'),
(146, 144, 'add'),
(147, 144, 'edit'),
(148, 144, 'add_detail'),
(149, 144, 'delete_detail'),
(150, 144, 'print_spb'),
(151, 144, 'create_skb'),
(152, 144, 'skb_list'),
(153, 144, 'print_skb'),
(154, 144, 'hasil_produksi'),
(155, 144, 'add_produksi'),
(156, 144, 'edit_produksi'),
(157, 144, 'add_detail_produksi'),
(158, 144, 'delete_detail_produksi'),
(159, 1, 'CuciKawatHitam'),
(160, 159, 'index'),
(161, 159, 'add'),
(162, 159, 'edit'),
(163, 159, 'add_detail'),
(164, 159, 'delete_detail'),
(165, 159, 'print_spb'),
(166, 159, 'create_skb'),
(167, 159, 'skb_list'),
(168, 159, 'print_skb'),
(169, 159, 'create_dtr'),
(170, 159, 'dtr_list'),
(171, 159, 'print_dtr'),
(172, 159, 'create_ttr'),
(173, 159, 'ttr_list'),
(174, 159, 'print_ttr'),
(175, 1, 'PengirimanSample'),
(176, 175, 'index'),
(177, 175, 'add'),
(178, 175, 'edit'),
(179, 175, 'add_detail'),
(180, 175, 'delete_detail'),
(181, 175, 'print_rs'),
(182, 175, 'create_skb'),
(183, 175, 'skb_list'),
(184, 175, 'print_skb'),
(185, 175, 'surat_jalan'),
(186, 175, 'add_surat_jalan'),
(187, 175, 'edit_surat_jalan'),
(188, 175, 'add_detail_surat_jalan'),
(189, 175, 'delete_detail_surat_jalan'),
(190, 175, 'print_surat_jalan'),
(191, 53, 'create_voucher'),
(192, 1, 'Ingot'),
(193, 192, 'index'),
(194, 192, 'add'),
(195, 192, 'edit'),
(196, 192, 'add_detail'),
(197, 192, 'delete_detail'),
(198, 192, 'create_spb'),
(199, 192, 'spb_list'),
(200, 192, 'view_spb'),
(201, 192, 'approve_spb'),
(202, 192, 'reject_spb'),
(203, 192, 'edit_spb'),
(204, 192, 'print_spb'),
(205, 192, 'create_skb'),
(206, 192, 'skb_list'),
(207, 192, 'print_skb'),
(208, 192, 'hasil_produksi'),
(209, 192, 'add_produksi'),
(210, 192, 'edit_produksi'),
(211, 192, 'add_detail_produksi'),
(212, 192, 'edit_detail_produksi'),
(213, 144, 'view_spb'),
(214, 144, 'approve_spb'),
(215, 144, 'reject_spb'),
(216, 159, 'view_spb'),
(217, 159, 'approve_spb'),
(218, 159, 'reject_spb'),
(219, 1, 'Retur'),
(220, 219, 'index'),
(221, 219, 'add'),
(222, 219, 'edit'),
(223, 219, 'delete'),
(224, 219, 'load_detail'),
(225, 219, 'add_detail'),
(226, 219, 'delete_detail'),
(227, 219, 'print_dtr'),
(228, 219, 'create_ttr'),
(229, 219, 'ttr_list'),
(230, 219, 'print_ttr'),
(231, 219, 'create_request_barang'),
(232, 219, 'edit_request_barang'),
(233, 219, 'load_detail_request_barang'),
(234, 219, 'add_detail_request_barang'),
(235, 219, 'delete_detail_request_barang'),
(236, 219, 'request_barang_list'),
(237, 219, 'view'),
(238, 219, 'approve'),
(239, 219, 'reject'),
(240, 68, 'close_po'),
(241, 68, 'voucher_list'),
(242, 53, 'view_po'),
(243, 53, 'close_po'),
(244, 53, 'voucher_list');

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
  `m_jenis_packing_id` int(11) NOT NULL,
  `flag_milik` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `m_bobbin_size_id` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `m_bobbin_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_size`
--

CREATE TABLE `m_bobbin_size` (
  `id` int(11) NOT NULL,
  `bobbin_size` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `tipe_packing` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'CV. ANGIN RIBUT', 'AGUS', '022-8909123', '', 'JLN. ASPAL TEBAL NO.22', 7, 4, '', 3, 'SUNTER', '200901', '', '2017-10-05 05:10:23', 1, '2018-01-24 08:01:44', 1);

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
(20, 'VSP', 1, 4, '.', '.');

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
(97, 'SKB.17052018', 1);

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
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `no_po` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `beli_sparepart_id` int(11) NOT NULL,
  `ppn` tinyint(1) NOT NULL,
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

INSERT INTO `po` (`id`, `no_po`, `tanggal`, `beli_sparepart_id`, `ppn`, `supplier_id`, `term_of_payment`, `jenis_po`, `flag_dp`, `flag_pelunasan`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 'POSP.10022018.0001', '2018-02-10', 1, 1, 1, '3 BULAN', 'Sparepart', 0, 0, 1, '2018-02-10 11:02:31', 1, '2016-02-25 06:02:59', 1),
(3, 'POSP.10022018.0002', '2018-02-10', 1, 1, 2, '2 BULAN', 'Sparepart', 1, 1, 0, '2018-02-10 11:02:00', 1, '2018-02-10 11:02:00', 1),
(4, 'PORS.14022018.0001', '2018-02-14', 0, 1, 1, '2 MINGGU', 'Rongsok', 1, 0, 0, '2018-02-14 08:02:10', 1, '2018-02-14 09:02:27', 1),
(5, 'POAPS.22022018.0001', '2018-02-22', 0, 1, 2, '2 BULAN', 'Ampas', 0, 0, 0, '2018-02-22 01:02:07', 1, '2018-02-22 01:02:30', 1),
(6, 'POIR.24022018.0001', '2018-02-24', 0, 1, 1, '2 MINGGU', 'Ingot Rendah', 0, 0, 0, '2018-02-24 10:02:36', 1, '2018-02-24 10:02:19', 1),
(7, 'PORS.25032018.0001', '2018-03-25', 0, 1, 2, '2 BULAN', 'Rongsok', 1, 0, 2, '2018-03-25 07:03:37', 1, '2018-05-16 09:05:36', 1),
(8, 'PORS.200901', '2018-04-16', 0, 1, 1, '2 BULAN', 'Rongsok', 0, 1, 0, '2018-04-16 06:04:31', 1, '2018-04-16 06:04:31', 1),
(9, 'TESTPORONGSOK', '2018-04-27', 0, 1, 2, '2 MINGGU', 'Rongsok', 1, 0, 0, '2018-04-27 09:04:32', 1, '2018-04-27 10:04:01', 1),
(10, 'PORS.2018001', '2018-05-15', 0, 0, 1, '2 BULAN', 'Rongsok', 1, 0, 1, '2018-05-15 07:05:00', 1, '2018-05-16 09:05:34', 1);

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
(2, 2, 2, 1, 0, 0, 23000, 3, 69000, 0, 0, 1, 0),
(3, 3, 3, 2, 0, 0, 150000, 2, 300000, 0, 0, 1, 0),
(4, 4, 0, 0, 1, 0, 25000, 200, 5000000, 0, 0, 0, 0),
(6, 4, 0, 0, 2, 0, 12500, 88, 1100000, 0, 0, 0, 0),
(7, 5, 0, 0, 0, 1, 20000, 1, 20000, 40, 38, 0, 1),
(8, 5, 0, 0, 0, 2, 25000, 2, 50000, 80, 76, 0, 1),
(9, 6, 0, 0, 3, 0, 25000, 12, 300000, 600, 580, 0, 1),
(10, 6, 0, 0, 4, 0, 35000, 10, 350000, 450, 435, 0, 1),
(12, 7, 0, 0, 1, 0, 12500, 2, 25000, 0, 0, 0, 0),
(13, 7, 0, 0, 2, 0, 2500, 4, 10000, 0, 0, 0, 1),
(14, 8, 0, 0, 1, 0, 25000, 50, 1250000, 0, 0, 0, 0),
(15, 9, 0, 0, 1, 0, 40000, 45, 1800000, 0, 0, 0, 1),
(16, 9, 0, 0, 2, 0, 25000, 10, 250000, 0, 0, 0, 1),
(17, 10, 0, 0, 1, 0, 70000, 40, 2800000, 0, 0, 0, 1),
(18, 10, 0, 0, 2, 0, 25000, 60, 1500000, 0, 0, 0, 1);

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
(5, 'PRD.17052018.0002', '2018-05-17', 'INGOT', '', 0, 8, '2018-05-17 05:05:05', 1, '2018-05-17 05:05:05', 1);

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
-- Table structure for table `produksi_ingot`
--

CREATE TABLE `produksi_ingot` (
  `id` int(11) NOT NULL,
  `no_produksi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `remarks` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_ingot`
--

INSERT INTO `produksi_ingot` (`id`, `no_produksi`, `tanggal`, `jenis_barang`, `remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'PRD200220180002', '2018-02-20', 'INGOT', '', '2018-02-20 06:02:47', 1, '2018-02-20 06:02:54', 1),
(2, 'PRD.17052018.0001', '2018-05-17', 'RONGSOK', '', '2018-05-17 05:05:22', 1, '2018-05-17 05:05:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produksi_ingot_detail`
--

CREATE TABLE `produksi_ingot_detail` (
  `id` int(11) NOT NULL,
  `produksi_ingot_id` int(11) NOT NULL,
  `no_pallete` varchar(25) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
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

INSERT INTO `produksi_ingot_detail` (`id`, `produksi_ingot_id`, `no_pallete`, `rongsok_id`, `line_remarks`, `flag_spb`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, '200901', 1, 'AMBIL UTUH', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 1, '200902', 2, 'AMBIL SETENGAH', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 2, '200904R', 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 2, '200905E', 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(128, 7, 208, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rongsok`
--

CREATE TABLE `rongsok` (
  `id` int(11) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
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

INSERT INTO `rongsok` (`id`, `nama_item`, `uom`, `description`, `alias`, `type_barang`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'CANGKUL BEKAS', 'KG', '', '', 'Rongsok', '2018-01-24 09:01:04', 1, '2018-01-24 09:01:04', 1),
(2, 'POTONGAN PIPA BAJA', 'KG', '', 'BAJA', 'Rongsok', '2018-01-24 09:01:36', 1, '2018-01-24 09:01:36', 1),
(3, 'INGOT RENDAH 1', 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:40', 1, '2018-02-24 10:02:40', 1),
(4, 'INGOT RENDAH 2', 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:52', 1, '2018-02-24 10:02:52', 1),
(5, 'INGOT RENDAH 3', 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:02', 1, '2018-02-24 10:02:02', 1),
(6, 'INGOT RENDAH 4', 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:22', 1, '2018-02-24 10:02:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `no_sales_order` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
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

INSERT INTO `sales_order` (`id`, `no_sales_order`, `tanggal`, `m_customer_id`, `jenis_barang`, `flag_ppn`, `marketing_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'SO.18022018.0001', '2018-02-18', 1, 'RONGSOK', 1, 2, '2018-02-18 07:02:23', 1, '2018-02-18 07:02:03', 1),
(2, 'SO.27042018.0001', '2018-04-27', 2, 'RONGSOK', 1, 4, '2018-04-27 10:04:20', 1, '2018-04-27 10:04:44', 1),
(3, 'SO.25022016.0001', '2016-02-25', 2, 'RONGSOK', 0, 2, '2016-02-25 07:02:17', 1, '2016-02-25 07:02:14', 1);

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
(6, 3, 2, 10, 330, 280, 25000, 250000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(8, 'SKB.17052018.0001', '2018-05-17', 'INGOT', 4, 0, '', 0, '2018-05-17 05:05:28', 1, '2018-05-17 05:05:28', 1);

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
(12, 8, 8, 0, 2, 0, '', 0, '2018-05-17 05:05:28', 1, '2018-05-17 05:05:28', 1);

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
  `jenis_barang` varchar(25) NOT NULL,
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

INSERT INTO `spb` (`id`, `no_spb`, `tanggal`, `produksi_ingot_id`, `jenis_barang`, `module`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `reject_remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'SPB.20022018.0001', '2018-02-20', 1, 'INGOT', '', '', 1, '2018-04-17 06:04:48', 1, '2018-04-17 05:04:02', 1, 'TEST REJECT', '2018-02-20 06:02:02', 1, '2018-02-20 06:02:02', 1),
(2, 'SPB.25022018.0001', '2018-02-25', 0, 'KAWAT HITAM', 'Rolling', '', 1, '2018-04-27 09:04:48', 1, '2018-04-27 08:04:29', 1, 'PIPA CUMA ADA 10 BATANG', '2018-02-25 07:02:17', 1, '2018-04-27 09:04:22', 1),
(3, 'SPB.25022018.0002', '2018-02-25', 0, 'KAWAT HITAM', 'Cuci', '', 9, '2018-04-27 09:04:49', 1, '2018-04-27 09:04:35', 1, 'TEST', '2018-02-25 11:02:18', 1, '2018-02-25 11:02:37', 1),
(4, 'SPB.17052018.0001', '2018-05-17', 2, 'INGOT', '', '', 1, '2018-05-17 05:05:28', 1, '0000-00-00 00:00:00', 0, '', '2018-05-17 05:05:03', 1, '2018-05-17 05:05:03', 1);

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
(1, 1, 1, 1, 0, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 1, 2, 2, 0, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 2, 0, 1, 100, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 2, 0, 2, 50, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 3, 0, 1, 100, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 3, 0, 2, 25, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 4, 3, 1, 0, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 4, 4, 2, 0, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttr`
--

INSERT INTO `ttr` (`id`, `no_ttr`, `tanggal`, `dtr_id`, `jmlh_afkiran`, `jmlh_pengepakan`, `jmlh_lain`, `remarks`, `flag_bayar`, `flag_produksi`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'TTR.17022018.0001', '2018-02-17', 1, 10, 15, 0, '', 1, 0, '2018-02-17 02:02:16', 1, '2018-02-17 02:02:16', 1),
(2, 'TTR.19022018.0001', '2018-02-19', 2, 0, 0, 0, '', 0, 0, '2018-02-19 10:02:50', 1, '2018-02-19 10:02:50', 1),
(3, 'TTR.24022018.0001', '2018-02-24', 5, 50, 5, 4, '', 0, 0, '2018-02-24 10:02:08', 1, '2018-02-24 10:02:08', 1),
(4, 'TTR.25022018.0001', '2018-02-25', 6, 40, 10, 0, '', 0, 0, '2018-02-25 05:02:54', 1, '2018-02-25 05:02:54', 1),
(5, 'TTR.25022018.0002', '2018-02-25', 7, 0, 0, 0, '', 0, 0, '2018-02-25 11:02:33', 1, '2018-02-25 11:02:33', 1),
(9, 'TTR.15052018.0001', '2018-05-15', 10, 0, 0, 0, '', 0, 0, '2018-05-15 09:05:44', 1, '2018-05-15 09:05:44', 1),
(11, 'TTR.25022016.0002', '2016-02-25', 12, 0, 0, 0, '', 0, 0, '2016-02-25 07:02:57', 1, '2016-02-25 07:02:57', 1);

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
(14, 11, 20, 1, 0, 5, 440, 430, '', '2016-02-25 07:02:57', 1, '2016-02-25 07:02:57', 1);

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
-- Table structure for table `t_bpb_wip`
--

CREATE TABLE `t_bpb_wip` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_spb` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `m_sumber_wip_id` int(11) NOT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `dibuat_tgl` datetime NOT NULL,
  `disetujui_oleh` int(11) NOT NULL,
  `disetujui_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bpb_wip_detail`
--

CREATE TABLE `t_bpb_wip_detail` (
  `id` int(11) NOT NULL,
  `t_spb_wip_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `m_jenis_brg_wip_id` int(11) NOT NULL,
  `nomor_SPB` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `jenis_barang` int(11) NOT NULL,
  `nomor_SPB` int(11) NOT NULL,
  `nomor_BPB` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `bruto` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `milik` varchar(100) NOT NULL,
  `no_produksi` varchar(255) NOT NULL,
  `no_packing` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `dibuat_tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gudang_fg`
--

INSERT INTO `t_gudang_fg` (`id`, `tanggal`, `jenis_trx`, `jenis_barang`, `nomor_SPB`, `nomor_BPB`, `qty`, `uom`, `berat`, `bruto`, `netto`, `milik`, `no_produksi`, `no_packing`, `keterangan`, `dibuat_oleh`, `dibuat_tgl`) VALUES
(3, '2018-09-28', 0, 0, 0, '', 0, 0, 123, 100, 1000, 'aaaa', '19800', '7597859', 'bbbb', 1, '2018-09-28 16:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `t_gudang_wip`
--

CREATE TABLE `t_gudang_wip` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_trx` int(11) NOT NULL,
  `t_hasil_wip_id` int(11) NOT NULL,
  `m_jenis_brg_wip_id` int(11) NOT NULL,
  `t_spb_wip_detail_id` int(11) NOT NULL,
  `t_bpb_wip_detail_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat_oleh` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dibuat_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `dibuat_oleh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_hasil_wip`
--

CREATE TABLE `t_hasil_wip` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `m_jenis_brg_wip_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `susut` int(11) NOT NULL,
  `keras` int(11) NOT NULL,
  `bs` int(11) NOT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `dibuat_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'BUSI', 'SPARE PART', 3, 3, '2016-02-25 06:02:56', 1, '2016-02-25 06:02:56', 1),
(2, 'CANGKUL BEKAS', 'RONGSOK', 880, 860, '2016-02-25 07:02:08', 1, '2018-05-17 05:05:28', 1),
(3, 'AMPAS 1', 'AMPAS', 200, 190, '2018-05-17 04:05:03', 1, '2018-05-17 05:05:45', 1),
(4, 'AMPAS 2', 'AMPAS', 55, 55, '2018-05-17 05:05:32', 1, '2018-05-17 05:05:32', 1),
(5, 'POTONGAN PIPA BAJA', 'RONGSOK', 0, 0, '2018-05-17 05:05:28', 1, '2018-05-17 05:05:28', 1),
(6, 'CANGKUL BEKAS', 'INGOT', 500, 500, '2018-05-17 05:05:49', 1, '2018-05-17 05:05:49', 1);

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
(9, 6, '2018-05-17 05:05:49', 0, 0, 500, 500, 'Produksi ingot');

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
  `keterangan` text NOT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `dibuat_tgl` date NOT NULL,
  `disetujui_oleh` int(11) NOT NULL,
  `disetujui_tgl` date NOT NULL,
  `diterima_oleh` int(11) NOT NULL,
  `diterima_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_rongsok`
--

CREATE TABLE `t_spb_rongsok` (
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
-- Table structure for table `t_spb_wip`
--

CREATE TABLE `t_spb_wip` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_spb` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `dibuat_tgl` datetime NOT NULL,
  `disetujui_oleh` int(11) NOT NULL,
  `disetujui_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diterima_oleh` int(11) NOT NULL,
  `diterima_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_wip_detail`
--

CREATE TABLE `t_spb_wip_detail` (
  `id` int(11) NOT NULL,
  `t_spb_wip_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `m_jenis_brg_wip_id` int(11) NOT NULL,
  `nomor_SPB` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(11, 'VRSK.15052018.0001', '2018-05-15', 'DP', 10, 0, 0, 0, 'RONGSOK', 400000, 'TANDA JADI', '2018-05-15 08:05:23', 1, '2018-05-15 08:05:23', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ampas`
--
ALTER TABLE `ampas`
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
-- Indexes for table `bobin`
--
ALTER TABLE `bobin`
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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_ampas_detail`
--
ALTER TABLE `produksi_ampas_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_ingot`
--
ALTER TABLE `produksi_ingot`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `beli_sparepart_detail`
--
ALTER TABLE `beli_sparepart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bobin`
--
ALTER TABLE `bobin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dtr_detail`
--
ALTER TABLE `dtr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lpb`
--
ALTER TABLE `lpb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lpb_detail`
--
ALTER TABLE `lpb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_bobbin_size`
--
ALTER TABLE `m_bobbin_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `m_numbering_details`
--
ALTER TABLE `m_numbering_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

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
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `po_detail`
--
ALTER TABLE `po_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produksi_ampas`
--
ALTER TABLE `produksi_ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produksi_ampas_detail`
--
ALTER TABLE `produksi_ampas_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produksi_ingot`
--
ALTER TABLE `produksi_ingot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produksi_ingot_detail`
--
ALTER TABLE `produksi_ingot_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `rongsok`
--
ALTER TABLE `rongsok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skb`
--
ALTER TABLE `skb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skb_detail`
--
ALTER TABLE `skb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spb`
--
ALTER TABLE `spb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spb_detail`
--
ALTER TABLE `spb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
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
-- AUTO_INCREMENT for table `ttr`
--
ALTER TABLE `ttr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ttr_detail`
--
ALTER TABLE `ttr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_bobbin_trx`
--
ALTER TABLE `t_bobbin_trx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `t_bpb_wip`
--
ALTER TABLE `t_bpb_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_bpb_wip_detail`
--
ALTER TABLE `t_bpb_wip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_gudang_wip`
--
ALTER TABLE `t_gudang_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_hasil_masak`
--
ALTER TABLE `t_hasil_masak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_inventory`
--
ALTER TABLE `t_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_inventory_detail`
--
ALTER TABLE `t_inventory_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `t_spb_wip`
--
ALTER TABLE `t_spb_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_spb_wip_detail`
--
ALTER TABLE `t_spb_wip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
