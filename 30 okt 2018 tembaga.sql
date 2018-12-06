-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 03:20 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(3, 'PPS.27042018.0001', '2018-04-27', 1, NULL, 1, '2018-04-27 10:04:32', 1, '2018-10-08 05:10:57', 1, '', '0000-00-00 00:00:00', 0, '', '2018-10-05 03:10:01', 1),
(4, 'PPS.05102018.0001', '2018-10-05', 1, NULL, 0, '2018-10-05 03:10:33', 1, '0000-00-00 00:00:00', 0, 'LKHL', '0000-00-00 00:00:00', 0, '', '2018-10-05 03:10:33', 1),
(5, 'PPS.08102018.0001', '2018-10-08', 1, NULL, 0, '2018-10-08 05:10:35', 1, '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', 0, '', '2018-10-08 05:10:43', 1),
(6, 'PPS.11102018.0001', '2018-10-11', 1, NULL, 0, '2018-10-11 09:10:52', 1, '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', 0, '', '2018-10-11 09:10:52', 1);

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
(6, 3, 2, 1, 1),
(7, 3, 1, 1, 1),
(8, 4, 2, 2, 0),
(9, 4, 1, 3, 0),
(10, 5, 2, 2, 0);

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
(22, 'DTR.05102018.0005', '2018-10-05', 14, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-08 11:10:05', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-05 06:10:50', 1, '2018-10-05 06:10:50', 1),
(23, 'DTR.05102018.0006', '2018-10-05', 14, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-08 11:10:09', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-05 06:10:40', 1, '2018-10-05 06:10:40', 1),
(24, 'DTR.08102018.0001', '2018-10-08', 15, 0, 0, 0, 'RONGSOK', '', 9, '0000-00-00 00:00:00', 0, '2018-10-08 12:10:29', 1, 'TIDAK ADA NETTO', 0, 0, '2018-10-08 12:10:05', 1, '2018-10-08 12:10:05', 1),
(25, 'DTR.08102018.0002', '2018-10-08', 15, 0, 0, 0, 'RONGSOK', '', 9, '0000-00-00 00:00:00', 0, '2018-10-08 01:10:59', 1, 'GAGAL', 0, 0, '2018-10-08 01:10:35', 1, '2018-10-08 01:10:35', 1),
(26, 'DTR.08102018.0003', '2018-10-08', 15, 0, 0, 0, 'RONGSOK', '', 9, '2018-10-08 03:10:26', 1, '2018-10-08 15:28:00', 1, 'KOSONG NETTO', 0, 0, '2018-10-08 02:10:07', 1, '2018-10-08 02:10:07', 1),
(27, 'DTR.08102018.0004', '2018-10-08', 15, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-08 03:10:42', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-08 03:10:29', 1, '2018-10-08 03:10:29', 1),
(28, 'DTR.08102018.0005', '2018-10-08', 14, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-08 03:10:57', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-08 03:10:31', 1, '2018-10-08 03:10:31', 1),
(29, 'DTR.10102018.0001', '2018-10-10', 19, 0, 0, 0, 'RONGSOK', '', 1, '2018-10-10 02:10:38', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2018-10-10 02:10:57', 1, '2018-10-10 02:10:57', 1),
(32, 'DTR.23102018.0002', '2018-10-23', 0, 0, 0, 0, 'RONGSOK', 'DTR SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0);

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
  `modified_by` int(11) NOT NULL,
  `flag_taken` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtr_detail`
--

INSERT INTO `dtr_detail` (`id`, `dtr_id`, `po_detail_id`, `so_detail_id`, `skb_detail_id`, `rongsok_id`, `ampas_id`, `qty`, `bruto`, `netto`, `line_remarks`, `no_pallete`, `no_batch`, `created`, `created_by`, `modified`, `modified_by`, `flag_taken`) VALUES
(46, 22, 26, 0, 0, 1, 0, 200, 10, 5, '', 'HH123', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(47, 22, 27, 0, 0, 2, 0, 250, 20, 10, '', 'HT123', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(49, 23, 26, 0, 0, 1, 0, 200, 20, 15, '', '17GGHG', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(50, 23, 27, 0, 0, 2, 0, 250, 20, 18, '', '17HJGG', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(51, 24, 28, 0, 0, 1, 0, 175, 0, 0, '', '08101812145RRQ', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(52, 24, 28, 0, 0, 1, 0, 175, 0, 0, '', '081018121438ZND', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(53, 25, 28, 0, 0, 1, 0, 175, 10, 10, '', '08101813422TUO', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(54, 26, 28, 0, 0, 1, 0, 175, 0, 0, '', '08101814242PXB', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(55, 27, 28, 0, 0, 1, 0, 175, 200, 158, 'OKE', '081018152945MRD', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(56, 28, 26, 0, 0, 1, 0, 200, 200, 180, 'SUKSES', '08101815317JXR', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(57, 29, 35, 0, 0, 1, 0, 150, 100, 20, '', '101018141239BPA', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(58, 29, 34, 0, 0, 2, 0, 100, 20, 10, '', '101018141249ICP', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1),
(59, 30, 0, 0, 0, 7, 0, 0, 0, 10, 'SISA PRODUKSI INGOT', '1610181915557B2', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(61, 32, 0, 0, 0, 7, 0, 0, 0, 1, 'SISA PRODUKSI WIP', '231018105523886', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0);

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
(28, '2018-10-26', 'L0014', 1, 2, 0, 1, 17.34, '', 0, '2018-10-26 12:44:53', 1, NULL, NULL);

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
(52, 'BPB-SDM', 1, 4, '.', '.');

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
(146, 'BB-FG.', 14),
(147, 'J.', 2),
(148, 'PRD-SDM.24102018', 9),
(149, 'PRD-SDM.25102018', 2),
(150, 'R.', 1),
(151, 'PRD-SDM.26102018', 2),
(152, 'BPB-SDM.24102018', 1),
(153, 'BPB-SDM.25102018', 2),
(154, 'BPB-SDM.26102018', 2),
(155, 'PRD-SDM.29102018', 4),
(156, 'BPB-SDM.29102018', 1);

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
(14, 'PO-05102018.1839', '2018-10-05', 0, 0, 1, '1 TAHUN', 'Rongsok', 1, 0, 2, '2018-10-05 06:10:53', 1, '2018-10-08 03:10:31', 1),
(15, 'PO-05102018.2023', '2018-10-05', 0, 0, 2, '2 BULAN', 'Rongsok', 1, 0, 1, '2018-10-05 08:10:59', 1, '2018-10-08 03:10:28', 1),
(16, 'PO-08102018.1644', '2018-10-08', 0, 0, 2, '1 BULAN', 'Rongsok', 1, 0, 0, '2018-10-08 03:10:52', 1, '2018-10-08 03:10:13', 1),
(17, 'PO-08102018.1716', '2018-10-08', 0, 0, 1, '2 TAHUN', 'Rongsok', 0, 0, 0, '2018-10-08 05:10:05', 1, '2018-10-08 05:10:26', 1),
(18, 'POSP.08102018.0001', '2018-10-08', 3, 0, 1, '1 BULAN', 'Sparepart', 1, 0, 0, '2018-10-08 05:10:16', 1, '2018-10-08 05:10:16', 1),
(19, 'PO-10102018.1411', '2018-10-10', 0, 0, 2, '6 BULAN', 'Rongsok', 0, 0, 2, '2018-10-10 02:10:58', 1, '2018-10-10 02:10:57', 1);

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
(32, 18, 6, 2, 0, 0, 20000, 1, 20000, 0, 0, 0, 0),
(33, 18, 7, 1, 0, 0, 30000, 1, 30000, 0, 0, 0, 0),
(34, 19, 0, 0, 2, 0, 5750, 100, 575000, 0, 0, 0, 1),
(35, 19, 0, 0, 1, 0, 2750, 150, 412500, 0, 0, 0, 1);

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
(8, 'PRD.08102018.0003', '2018-10-08', 'INGOT', '', 0, 1, '2018-10-08 03:10:39', 1, '2018-10-08 03:10:39', 1);

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
(9, 'PRD-SDM.29102018.0002', '2018-10-29', 0, NULL, 0, 2, 1, '2018-10-29 11:10:19', NULL, NULL),
(10, 'PRD-SDM.29102018.0003', '2018-10-29', 0, NULL, 10, 4, 1, '2018-10-29 11:10:47', NULL, NULL),
(11, 'PRD-SDM.29102018.0004', '2018-10-29', 0, NULL, 12, 3, 1, '2018-10-29 11:10:21', NULL, NULL);

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
(45, 5, '2018-10-26', '181026R00151235', 1235, NULL, 22.12, 26, NULL),
(44, 5, '2018-10-26', '181026R00150321', 321, NULL, 19.33, 26, NULL),
(46, 6, '2018-10-26', '181026L01630013', 123, 72.22, 64.34, 27, 'OK'),
(47, 6, '2018-10-26', '181026L01630014', 312, 90.22, 72.88, 28, 'SIP'),
(48, 7, '2018-10-26', '181026B00150117', NULL, NULL, 12.33, 21, NULL),
(49, 7, '2018-10-26', '181026B00150118', NULL, NULL, 12.77, 21, NULL),
(50, 7, '2018-10-26', '181026B00150117', NULL, NULL, 27.88, 21, NULL),
(51, 7, '2018-10-26', '181026B00150119', NULL, NULL, 21.33, 21, NULL),
(52, 8, '2018-10-29', '181029L01400008', 235, 25, 13, 18, '');

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
(23, 'PRD.18102018.0001', '2018-10-18', 2, '', 0, '2018-10-18 01:10:03', 1, '2018-10-18 01:10:35', 1);

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
(30, 23, 1, 2, 'OK', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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

INSERT INTO `rongsok` (`id`, `nama_item`, `stok`, `uom`, `description`, `alias`, `type_barang`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'CANGKUL BEKAS', 564, 'KG', '', '', 'Rongsok', '2018-01-24 09:01:04', 1, '2018-01-24 09:01:04', 1),
(2, 'POTONGAN PIPA BAJA', 200, 'KG', '', 'BAJA', 'Rongsok', '2018-01-24 09:01:36', 1, '2018-01-24 09:01:36', 1),
(3, 'INGOT RENDAH 1', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:40', 1, '2018-02-24 10:02:40', 1),
(4, 'INGOT RENDAH 2', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:52', 1, '2018-02-24 10:02:52', 1),
(5, 'INGOT RENDAH 3', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:02', 1, '2018-02-24 10:02:02', 1),
(6, 'INGOT RENDAH 4', 0, 'KG', '', '', 'Ingot Rendah', '2018-02-24 10:02:22', 1, '2018-02-24 10:02:22', 1),
(7, 'BS', 0, 'KG', '', 'BS', 'BS', '2018-10-16 09:31:22', 1, '2018-10-01 00:00:00', 0),
(8, 'SISA WIP', 0, 'KG', 'SISA MASAK WIP', '', 'WIP', '2018-10-22 17:49:24', 1, '2018-10-22 18:51:31', 1);

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
(1, 'SO.18022018.0001', '2018-02-18', 1, 4, 1, 2, '2018-02-18 07:02:23', 1, '2018-02-18 07:02:03', 1),
(2, 'SO.27042018.0001', '2018-04-27', 2, 4, 1, 4, '2018-04-27 10:04:20', 1, '2018-04-27 10:04:44', 1),
(3, 'SO.25022016.0001', '2016-02-25', 2, 4, 0, 2, '2016-02-25 07:02:17', 1, '2016-02-25 07:02:14', 1),
(4, 'SO.12102018.0001', '2018-10-12', 2, 4, 0, 1, '2018-10-12 03:10:06', 1, '2018-10-12 03:10:53', 1),
(5, 'SO.12102018.0003', '2018-10-12', 1, 3, 0, 4, '2018-10-12 06:10:39', 1, '2018-10-12 06:10:39', 1);

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
(6, 3, 2, 10, 330, 280, 25000, 250000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 4, 1, 200, 100, 50, 1200, 240000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 4, 2, 250, 150, 100, 2400, 600000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(12, 'SPB.04102018.0004', '2018-10-04', 14, 2, '', '', 1, '2018-10-15 02:10:42', 1, '2018-10-01 00:00:00', 0, '', '2018-10-04 10:10:58', 1, '2018-10-04 10:10:58', 1),
(13, 'SPB.15102018.0001', '2018-10-15', 17, 2, '', '', 1, '2018-10-15 04:10:49', 1, '0000-00-00 00:00:00', 0, '', '2018-10-15 04:10:26', 1, '2018-10-15 04:10:26', 1),
(14, 'SPB.16102018.0001', '2018-10-16', 18, 2, '', '', 1, '2018-10-16 12:10:12', 1, '0000-00-00 00:00:00', 0, '', '2018-10-16 11:10:06', 1, '2018-10-16 11:10:06', 1),
(15, 'SPB.16102018.0002', '2018-10-16', 20, 2, '', '', 1, '2018-10-16 01:10:18', 1, '0000-00-00 00:00:00', 0, '', '2018-10-16 11:10:13', 1, '2018-10-16 11:10:13', 1),
(16, 'SPB.16102018.0003', '2018-10-16', 21, 2, '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-10-16 11:10:18', 1, '2018-10-16 11:10:18', 1),
(17, 'SPB.16102018.0004', '2018-10-16', 22, 2, '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2018-10-16 11:10:24', 1, '2018-10-16 11:10:24', 1);

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
(29, 17, 29, 2, 5, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(14, 15, 49, 39);

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
(44, 'TTR.10102018.0007', '2018-10-10', 29, 0, 0, 0, '', 0, 0, 1, '2018-10-10 05:48:37', 1, '0000-00-00 00:00:00', 0, '2018-10-10 02:10:38', 1, '2018-10-10 02:10:38', 1);

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
(66, 44, 58, 2, 0, 100, 20, 10, '', '2018-10-10 02:10:38', 1, '2018-10-10 02:10:38', 1);

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
(1, 'BPB-AMP.16102018.0001', 0, 0, '', 11, 1, '2018-10-16 00:00:00', 0, '0000-00-00 00:00:00');

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
(1, 1, '2018-10-16', 3, '', 0, 'KG', 10, 'SISA PRODUKSI INGOT', 1);

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
(11, 'BPB-SDM.29102018.0001', '2018-10-29', 8, 10, '2018-10-29 07:10:16', 1, NULL, NULL, 9, NULL, NULL, NULL, '2018-10-29 07:10:04', 1, 'TOLAK');

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
(22, 11, 10, '181029L01400008', 235, 25, 13, 18, 0);

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
(8, 'BPB-WIP.16102018.0005', 1, 0, '', 10, 1, '2018-10-16 00:00:00', 1, '2018-10-17 03:10:01');

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
(7, 8, '2018-10-16', 2, 0, 20, 'BATANG', 166, '', 1);

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
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gudang_fg`
--

INSERT INTO `t_gudang_fg` (`id`, `tanggal`, `jenis_trx`, `flag_taken`, `jenis_barang_id`, `t_bpb_fg_id`, `t_bpb_fg_detail_id`, `t_spb_fg_detail_id`, `nomor_SPB`, `nomor_BPB`, `bruto`, `netto`, `no_produksi`, `no_packing`, `bobbin_id`, `nomor_bobbin`, `keterangan`, `created_by`, `created_at`) VALUES
(19, '2018-10-29', 0, 0, 8, 6, 6, NULL, NULL, 'BPB-SDM.24102018.0001', 28, 26.89, '123', '251018L01770008', 18, 'L0008', NULL, 1, '2018-10-29 02:10:48'),
(20, '2018-10-29', 0, 0, 8, 6, 7, NULL, NULL, 'BPB-SDM.24102018.0001', 29, 28.71, '321', '251018M01770009', 19, 'M0009', NULL, 1, '2018-10-29 02:10:48'),
(21, '2018-10-29', 0, 0, 8, 6, 8, NULL, NULL, 'BPB-SDM.24102018.0001', 58, 45.948, '222', '251018M01770009', 19, 'M0009', NULL, 1, '2018-10-29 02:10:48'),
(22, '2018-10-29', 0, 0, 8, 6, 9, NULL, NULL, 'BPB-SDM.24102018.0001', 79, 67.9, '111', '251018L01770008', 18, 'L0008', NULL, 1, '2018-10-29 02:10:48'),
(23, '2018-10-29', 0, 0, 8, 6, 10, NULL, NULL, 'BPB-SDM.24102018.0001', 92, 79.068, '333', '251018M01770009', 19, 'M0009', NULL, 1, '2018-10-29 02:10:48'),
(24, '2018-10-29', 0, 0, 11, 7, 11, NULL, NULL, 'BPB-SDM.25102018.0001', 0, 12.22, NULL, '181025B00150011', NULL, NULL, NULL, 1, '2018-10-29 03:10:51'),
(25, '2018-10-29', 0, 0, 11, 7, 12, NULL, NULL, 'BPB-SDM.25102018.0001', 0, 11.28, NULL, '181025B00150011', NULL, NULL, NULL, 1, '2018-10-29 03:10:51'),
(26, '2018-10-29', 0, 0, 11, 7, 13, NULL, NULL, 'BPB-SDM.25102018.0001', 0, 9.33, NULL, '181025A00150010', NULL, NULL, NULL, 1, '2018-10-29 03:10:51'),
(27, '2018-10-29', 0, 0, 11, 7, 11, NULL, NULL, 'BPB-SDM.25102018.0001', 0, 12.22, NULL, '181025B00150011', NULL, NULL, NULL, 1, '2018-10-29 03:10:40'),
(28, '2018-10-29', 0, 0, 11, 7, 12, NULL, NULL, 'BPB-SDM.25102018.0001', 0, 11.28, NULL, '181025B00150011', NULL, NULL, NULL, 1, '2018-10-29 03:10:40'),
(29, '2018-10-29', 0, 0, 11, 7, 13, NULL, NULL, 'BPB-SDM.25102018.0001', 0, 9.33, NULL, '181025A00150010', NULL, NULL, NULL, 1, '2018-10-29 03:10:40'),
(30, '2018-10-29', 0, 0, 11, 8, 14, NULL, NULL, 'BPB-SDM.25102018.0002', 0, 19.33, '321', '181026R00150321', NULL, NULL, NULL, 1, '2018-10-29 03:10:50'),
(31, '2018-10-29', 0, 0, 11, 8, 15, NULL, NULL, 'BPB-SDM.25102018.0002', 0, 22.12, '1235', '181026R00151235', NULL, NULL, NULL, 1, '2018-10-29 03:10:50'),
(32, '2018-10-29', 0, 0, 11, 9, 16, NULL, NULL, 'BPB-SDM.26102018.0001', 0, 12.33, NULL, '181026B00150117', NULL, NULL, NULL, 1, '2018-10-29 03:10:07'),
(33, '2018-10-29', 0, 0, 11, 9, 17, NULL, NULL, 'BPB-SDM.26102018.0001', 0, 12.77, NULL, '181026B00150118', NULL, NULL, NULL, 1, '2018-10-29 03:10:07'),
(34, '2018-10-29', 0, 0, 11, 9, 18, NULL, NULL, 'BPB-SDM.26102018.0001', 0, 27.88, NULL, '181026B00150117', NULL, NULL, NULL, 1, '2018-10-29 03:10:07'),
(35, '2018-10-29', 0, 0, 11, 9, 19, NULL, NULL, 'BPB-SDM.26102018.0001', 0, 21.33, NULL, '181026B00150119', NULL, NULL, NULL, 1, '2018-10-29 03:10:07'),
(36, '2018-10-29', 0, 0, 9, 10, 20, NULL, NULL, 'BPB-SDM.26102018.0002', 72, 64.34, '123', '181026L01630013', 27, 'L0013', NULL, 1, '2018-10-29 03:10:48'),
(37, '2018-10-29', 0, 0, 9, 10, 21, NULL, NULL, 'BPB-SDM.26102018.0002', 90, 72.88, '312', '181026L01630014', 28, 'L0014', NULL, 1, '2018-10-29 03:10:48');

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
(7, '2018-10-19', 0, 1, 0, 5, 5, 0, 1, 'ROLL', 3, 'OKE KAWAT MERAH', 1, '2018-10-19 16:21:43');

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
(13, '2018-10-16', '09:09:00', '00:44:00', 25, 13, 'SPB.16102018.0001', 'PRD.16102018.0001', 180, 20, 166, 10, 4, 2, 1);

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
(17, 'PRD-WIP.23102018.0002', 0, 'BAKAR ULANG', '2018-10-23', 5, 5, 'ROLL', 3, 0, 2, 1, 1, '2018-10-23 10:55:22');

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
(2, 'CANGKUL BEKAS', 'RONGSOK', 1777, 5559, '2016-02-25 07:02:08', 1, '2018-10-08 03:10:57', 1),
(3, 'AMPAS 1', 'AMPAS', 200, 190, '2018-05-17 04:05:03', 1, '2018-05-17 05:05:45', 1),
(4, 'AMPAS 2', 'AMPAS', 55, 55, '2018-05-17 05:05:32', 1, '2018-05-17 05:05:32', 1),
(5, 'POTONGAN PIPA BAJA', 'RONGSOK', 3283, 2749, '2018-05-17 05:05:28', 1, '2018-10-08 11:10:09', 1),
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
(57, 2, '2018-10-08 03:10:57', 200, 180, 0, 0, 'Pembelian rongsok');

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
  `received_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_fg_detail`
--

CREATE TABLE `t_spb_fg_detail` (
  `id` int(11) NOT NULL,
  `t_spb_fg_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `jenis_packing_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` int(11) DEFAULT NULL
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
(3, '2018-10-01', 'SPB-WIP.01102018.0001', 0, NULL, 1, '2018-10-19 06:10:15', 1, '2018-10-25 12:10:49', 0, NULL, 0, NULL, 0, NULL, NULL),
(4, '2018-10-11', 'SPB-WIP.11102018.0001', 9, 'SPB DITAMBAHKAN TGL 11-OKT-2018', 1, '2018-10-19 06:10:52', 1, '2018-10-19 06:10:21', 0, NULL, 0, NULL, 1, '2018-10-19 06:10:36', 'KURANG STOK'),
(5, '2018-10-22', 'SPB-WIP.22102018.0001', 0, 'BARANG WIP TRANSFER KE RONGSOK', 1, '2018-10-22 02:10:07', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL);

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
(10, 5, '2018-10-22', 2, 1, 'BATANG', 1, '1');

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
(18, 'VSP.08102018.0001', '2018-10-08', 'Parsial', 18, 0, 0, 0, 'SPARE PART', 10000, '', '2018-10-08 05:10:03', 1, '2018-10-08 05:10:03', 1);

-- --------------------------------------------------------

--
-- Structure for view `stok_wip`
--
DROP TABLE IF EXISTS `stok_wip`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_wip`  AS  select `t_gudang_wip`.`jenis_barang_id` AS `jenis_barang_id`,`jb`.`jenis_barang` AS `jenis_barang`,sum((case when ((`t_gudang_wip`.`jenis_trx` = 0) and (`t_gudang_wip`.`flag_taken` = 0)) then `t_gudang_wip`.`qty` else 0 end)) AS `total_qty_in`,sum((case when (`t_gudang_wip`.`jenis_trx` = 1) then `t_gudang_wip`.`qty` else 0 end)) AS `total_qty_out`,sum((case when ((`t_gudang_wip`.`jenis_trx` = 0) and (`t_gudang_wip`.`flag_taken` = 0)) then `t_gudang_wip`.`berat` else 0 end)) AS `total_berat_in`,sum((case when (`t_gudang_wip`.`jenis_trx` = 1) then `t_gudang_wip`.`berat` else 0 end)) AS `total_berat_out` from (`t_gudang_wip` left join `jenis_barang` `jb` on((`jb`.`id` = `t_gudang_wip`.`jenis_barang_id`))) group by `t_gudang_wip`.`jenis_barang_id` ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `beli_sparepart_detail`
--
ALTER TABLE `beli_sparepart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `dtr_detail`
--
ALTER TABLE `dtr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `m_numbering_details`
--
ALTER TABLE `m_numbering_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `po_detail`
--
ALTER TABLE `po_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `produksi_ampas`
--
ALTER TABLE `produksi_ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produksi_ampas_detail`
--
ALTER TABLE `produksi_ampas_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `produksi_fg`
--
ALTER TABLE `produksi_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `produksi_fg_detail`
--
ALTER TABLE `produksi_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `produksi_ingot`
--
ALTER TABLE `produksi_ingot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `produksi_ingot_detail`
--
ALTER TABLE `produksi_ingot_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `spb`
--
ALTER TABLE `spb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `spb_detail`
--
ALTER TABLE `spb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `spb_detail_fulfilment`
--
ALTER TABLE `spb_detail_fulfilment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `ttr_detail`
--
ALTER TABLE `ttr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `t_bobbin_trx`
--
ALTER TABLE `t_bobbin_trx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_bpb_ampas`
--
ALTER TABLE `t_bpb_ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_bpb_ampas_detail`
--
ALTER TABLE `t_bpb_ampas_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `t_bpb_fg_detail`
--
ALTER TABLE `t_bpb_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `t_bpb_wip`
--
ALTER TABLE `t_bpb_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_bpb_wip_detail`
--
ALTER TABLE `t_bpb_wip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `t_gudang_wip`
--
ALTER TABLE `t_gudang_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_hasil_masak`
--
ALTER TABLE `t_hasil_masak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `t_hasil_wip`
--
ALTER TABLE `t_hasil_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `t_inventory`
--
ALTER TABLE `t_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_inventory_detail`
--
ALTER TABLE `t_inventory_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
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
-- AUTO_INCREMENT for table `t_spb_fg_detail`
--
ALTER TABLE `t_spb_fg_detail`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_spb_wip_detail`
--
ALTER TABLE `t_spb_wip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
