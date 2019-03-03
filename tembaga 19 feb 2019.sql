-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2019 at 04:03 AM
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
-- Table structure for table `bak_m_print_barcode`
--

CREATE TABLE `bak_m_print_barcode` (
  `id` int(11) NOT NULL,
  `nama_barcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bak_m_print_barcode`
--

INSERT INTO `bak_m_print_barcode` (`id`, `nama_barcode`) VALUES
(1, 'barcode_fg1');

-- --------------------------------------------------------

--
-- Table structure for table `bak_m_print_barcode_line`
--

CREATE TABLE `bak_m_print_barcode_line` (
  `id` int(11) NOT NULL,
  `m_print_barcode_id` int(11) NOT NULL,
  `line_no` int(11) NOT NULL,
  `string1` varchar(200) NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bak_m_print_barcode_line`
--

INSERT INTO `bak_m_print_barcode_line` (`id`, `m_print_barcode_id`, `line_no`, `string1`, `notes`) VALUES
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
(23, 1, 23, 'BARCODE 612,101,\"39\",41,0,180,2,6,\"SPB-FGT.201901.0001\"', 'barcode_nomor_bobbin'),
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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `kode_bank` varchar(10) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `kode_bank`, `nama_bank`, `nomor_rekening`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'BNI', 'BANK NEGERA INDONESIA 46', '867997664', '2018-01-24 12:01:15', 1, '2018-01-24 12:01:15', 1),
(2, 'BRI', 'BANK RAKYAT INDONESIA', '987302918', '2018-01-24 12:01:35', 1, '2018-01-24 12:01:35', 1),
(3, 'BCA', 'BANK CENTRAL ASIA', '748493021', '2018-01-24 12:01:52', 1, '2018-01-24 12:01:52', 1),
(4, 'MANDIRI', 'BANK MANDIRI', '984738291', '2018-01-24 12:01:12', 1, '2018-01-24 12:01:12', 1),
(5, 'NIAGA', 'BANK NIAGA', '759301938', '2018-01-24 12:01:23', 1, '2018-01-24 12:01:23', 1);

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
(1, 'PPS.201812.0001', '2018-12-28', 1, NULL, 1, '2018-12-28 01:12:06', 1, '2018-12-28 02:12:36', 1, 'FIRST TEST', '0000-00-00 00:00:00', 0, '', '2018-12-28 02:12:22', 1),
(2, 'PPS.201901.0001', '2019-01-15', 1, NULL, 1, '2019-01-15 01:01:17', 1, '2019-01-15 01:01:58', 1, '', '0000-00-00 00:00:00', 0, '', '2019-01-15 01:01:46', 1),
(3, 'PPS.201901.0002', '2019-01-15', 1, NULL, 1, '2019-01-15 01:01:54', 1, '2019-01-15 01:01:36', 1, '', '0000-00-00 00:00:00', 0, '', '2019-01-15 01:01:15', 1),
(4, 'PPS.201901.0003', '2019-01-21', 1, NULL, 1, '2019-01-21 11:01:31', 1, '2019-01-21 11:01:02', 1, '', '0000-00-00 00:00:00', 0, '', '2019-01-21 11:01:57', 1),
(5, 'PPS.201902.0001', '2019-02-11', 1, NULL, 1, '2019-02-11 05:02:19', 3, '2019-02-11 05:02:45', 7, 'USER PEMBELIAN', '0000-00-00 00:00:00', 0, '', '2019-02-11 05:02:36', 3);

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
(1, 1, 2, 20, 1),
(2, 1, 1, 40, 1),
(3, 1, 122, 4, 1),
(4, 1, 104, 8, 1),
(6, 1, 1724, 8, 1),
(7, 1, 1722, 4, 1),
(8, 2, 1730, 5, 1),
(9, 2, 2, 8, 1),
(10, 3, 1731, 10, 1),
(11, 3, 1733, 10, 1),
(12, 4, 1731, 10, 1),
(13, 4, 1733, 20, 1),
(14, 4, 2343, 30, 1),
(15, 5, 1508, 4, 1),
(16, 5, 880, 10, 1),
(17, 5, 2668, 15, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `dtbj`
--

CREATE TABLE `dtbj` (
  `id` int(11) NOT NULL,
  `no_dtbj` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `po_id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `jenis_packing` tinyint(1) NOT NULL,
  `remarks` text,
  `status` tinyint(4) NOT NULL,
  `approved` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `rejected` datetime DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `reject_remarks` text NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `type_retur` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtbj`
--

INSERT INTO `dtbj` (`id`, `no_dtbj`, `tanggal`, `po_id`, `so_id`, `supplier_id`, `jenis_packing`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `reject_remarks`, `status_pembayaran`, `type_retur`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'DTBJ.201902.0001', '2019-02-11', 22, 0, 4, 1, '', 1, '2019-02-11 07:02:26', 3, NULL, NULL, '', 0, 0, '2019-02-11 06:02:27', 5, NULL, NULL),
(2, 'DTBJ.201902.0002', '2019-02-11', 34, 0, 8, 1, '', 1, '2019-02-11 07:02:00', 1, NULL, NULL, '', 0, 0, '2019-02-11 07:02:23', 5, NULL, NULL),
(3, 'DTBJ.201902.0003', '2019-02-11', 34, 0, 8, 1, '', 1, '2019-02-11 07:02:10', 3, NULL, NULL, '', 0, 0, '2019-02-11 07:02:59', 5, NULL, NULL),
(6, 'DTBJ.201902.0004', '2019-02-13', 35, 0, 7, 1, '', 1, '2019-02-18 12:02:52', 1, NULL, NULL, '', 0, 0, '2019-02-13 12:02:44', 1, '2019-02-13 12:02:25', 1),
(7, 'DTBJ.201902.0005', '2019-02-13', 35, 0, 7, 2, 'INI KERANJANG', 1, '2019-02-18 12:02:56', 1, NULL, NULL, '', 0, 0, '2019-02-13 12:02:23', 1, '2019-02-13 12:02:45', 1),
(8, 'DTBJ.201902.0008', '2019-02-15', 35, 0, 7, 3, '', 1, '2019-02-18 12:02:08', 1, NULL, NULL, '', 0, 0, '2019-02-15 10:02:02', 1, '2019-02-18 11:02:45', 1),
(9, 'DTBJ.201902.0009', '2019-02-18', 35, 0, 7, 1, '', 1, '2019-02-18 12:02:28', 1, NULL, NULL, '', 0, 0, '2019-02-18 11:02:57', 1, '2019-02-18 12:02:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtbj_detail`
--

CREATE TABLE `dtbj_detail` (
  `id` int(11) NOT NULL,
  `dtbj_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `so_detail_id` int(11) NOT NULL,
  `spb_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `berat_bobbin` float NOT NULL,
  `netto` float NOT NULL,
  `line_remarks` varchar(100) DEFAULT NULL,
  `no_bobbin` varchar(50) DEFAULT NULL,
  `no_packing` varchar(50) NOT NULL,
  `no_batch` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `flag_taken` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtbj_detail`
--

INSERT INTO `dtbj_detail` (`id`, `dtbj_id`, `po_detail_id`, `so_id`, `so_detail_id`, `spb_id`, `jenis_barang_id`, `qty`, `bruto`, `berat_bobbin`, `netto`, `line_remarks`, `no_bobbin`, `no_packing`, `no_batch`, `created`, `created_by`, `modified`, `modified_by`, `tanggal_masuk`, `tanggal_keluar`, `flag_taken`) VALUES
(1, 1, 57, 0, 0, 0, 451, 0, 60, 5.58, 54.42, '', 'M0003', '190211M00030001', '', '2019-02-11 06:02:27', 5, NULL, NULL, '2019-02-11', '0000-00-00', 0),
(2, 1, 58, 0, 0, 0, 450, 0, 58, 5.36, 52.64, '', 'M0014', '190211M00140001', '', '2019-02-11 06:02:27', 5, NULL, NULL, '2019-02-11', '0000-00-00', 0),
(3, 2, 88, 0, 0, 0, 452, 0, 56, 2.28, 53.72, '', 'S0002', '190211S00020003', '', '2019-02-11 07:02:23', 5, NULL, NULL, '2019-02-11', '0000-00-00', 0),
(4, 3, 88, 0, 0, 0, 452, 0, 52, 2.75, 49.25, '', 'S0003', '190211S00030004', '', '2019-02-11 07:02:59', 5, NULL, NULL, '2019-02-11', '0000-00-00', 0),
(5, 6, 89, 0, 0, 0, 405, 0, 108, 7.56, 100.44, '', 'M0010', '190213M00100005', '', '2019-02-13 12:02:25', 1, NULL, NULL, '2019-02-13', '0000-00-00', 0),
(6, 7, 90, 0, 0, 0, 406, 0, 58, 8.65, 49.35, '', 'P0005', '190213P00050006', '', '2019-02-13 12:02:45', 1, NULL, NULL, '2019-02-13', '0000-00-00', 0),
(7, 7, 90, 0, 0, 0, 406, 0, 60, 9.71, 50.29, '', 'J0002', '190213J00020006', '', '2019-02-13 12:02:45', 1, NULL, NULL, '2019-02-13', '0000-00-00', 0),
(12, 8, 91, 0, 0, 0, 407, 0, 55, 0.47, 54.53, NULL, NULL, '190215A001839', '', '2019-02-18 11:02:45', 1, NULL, NULL, '2019-02-15', '0000-00-00', 0),
(13, 8, 91, 0, 0, 0, 407, 0, 52, 0.77, 51.23, NULL, NULL, '190215A00182', '', '2019-02-18 11:02:45', 1, NULL, NULL, '2019-02-15', '0000-00-00', 0),
(14, 9, 92, 0, 0, 0, 408, 0, 105, 3.5, 101.5, '', 'M0006', '190218M00060010', '', '2019-02-18 12:02:21', 1, NULL, NULL, '2019-02-18', '0000-00-00', 0);

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
  `flag_taken` int(1) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
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

INSERT INTO `dtr` (`id`, `no_dtr`, `tanggal`, `po_id`, `so_id`, `flag_taken`, `supplier_id`, `customer_id`, `jenis_barang`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `reject_remarks`, `status_pembayaran`, `type_retur`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(9, 'DTR.201901.0007', '2019-01-02', 4, 0, 1, 8, 0, 'RONGSOK', '', 1, '2019-01-02 03:01:09', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-02 03:01:54', 1, '2019-01-10 03:01:13', 1),
(10, 'DTR.201901.0008', '2019-01-02', 4, 0, 1, 8, 0, 'RONGSOK', '', 1, '2019-01-02 03:01:49', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-02 03:01:38', 1, '2019-01-02 03:01:38', 1),
(11, 'DTR.201901.0009', '2019-01-02', 4, 0, 1, 8, 0, 'RONGSOK', '', 1, '2019-01-02 03:01:26', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-02 03:01:17', 1, '2019-01-02 03:01:17', 1),
(12, 'DTR.201901.0010', '2019-01-07', 5, 0, 0, 6, 0, 'RONGSOK', '', 1, '2019-01-07 06:01:03', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-07 06:01:55', 1, '2019-01-07 06:01:55', 1),
(13, 'DTR.201901.0011', '2019-01-07', 6, 0, 0, 4, 0, 'RONGSOK', '', 1, '2019-01-07 06:01:04', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-07 06:01:53', 1, '2019-01-07 06:01:53', 1),
(14, 'DTR.201901.0012', '2019-01-09', 0, 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(15, 'DTR.201901.0013', '2019-01-09', 0, 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(16, 'DTR.201901.0014', '2019-01-10', 7, 0, 0, 7, 0, 'RONGSOK', '', 1, '2019-01-10 04:01:32', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-10 04:01:23', 1, '2019-01-10 04:01:23', 1),
(17, 'DTR.201901.0015', '2019-01-10', 7, 0, 0, 7, 0, 'RONGSOK', '', 1, '2019-01-10 04:01:11', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-10 04:01:02', 1, '2019-01-10 04:01:02', 1),
(18, 'DTR.201901.0016', '2019-01-10', 8, 0, 0, 5, 0, 'RONGSOK', '', 1, '2019-01-10 05:01:42', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-10 05:01:37', 1, '2019-01-10 05:01:37', 1),
(19, 'DTR.201901.0017', '2019-01-10', 9, 0, 0, 10, 0, 'RONGSOK', '', 1, '2019-01-10 05:01:26', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-10 05:01:20', 1, '2019-01-10 05:01:20', 1),
(20, 'DTR.201901.0018', '2019-01-14', 11, 0, 0, 3, 0, 'RONGSOK', '', 1, '2019-01-14 10:01:37', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-14 10:01:29', 1, '2019-01-14 10:01:29', 1),
(21, 'DTR.201901.0019', '2019-01-14', 0, 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(22, 'DTR.201901.0020', '2019-01-15', 16, 0, 0, 130, 0, 'RONGSOK', '', 1, '2019-01-15 02:01:09', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-15 02:01:32', 1, '2019-01-15 02:01:32', 1),
(23, 'DTR.201901.0021', '2019-01-15', 17, 0, 0, 4, 0, 'RONGSOK', '', 1, '2019-01-15 02:01:32', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-15 02:01:53', 1, '2019-01-15 02:01:53', 1),
(24, 'DTR.201901.0022', '2019-01-15', 0, 0, 0, 4, 0, 'RONGSOK', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-15 02:01:10', 1, '2019-01-15 02:01:10', 1),
(25, 'DTR.201901.0023', '2019-01-15', 18, 0, 0, 6, 0, 'RONGSOK', '', 1, '2019-01-15 03:01:12', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-15 03:01:04', 1, '2019-01-15 03:01:04', 1),
(26, 'DTR.201901.0024', '2019-01-15', 0, 0, 0, 0, 0, 'RONGSOK', 'BS SISA PRODUKSI WIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(28, 'DTR-T.201901.0001', '2019-01-22', 0, 17, 0, 0, 3, 'RONGSOK', '', 1, '2019-01-23 05:01:33', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-22 04:01:08', 1, '2019-01-22 04:01:08', 1),
(29, 'DTR-T.201901.0002', '2019-01-23', 0, 17, 0, 0, 3, 'RONGSOK', '', 1, '2019-01-23 05:01:23', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-23 05:01:03', 1, '2019-01-23 05:01:03', 1),
(30, 'DTR-T.201901.0003', '2019-01-23', 0, 17, 0, 0, 3, 'RONGSOK', '', 1, '2019-01-23 05:01:56', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-23 05:01:51', 1, '2019-01-23 05:01:51', 1),
(31, 'DTR.201902.0001', '2019-02-04', 17, 0, 0, 8, 0, 'RONGSOK', '', 1, '2019-02-04 05:02:25', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-04 05:02:15', 1, '2019-02-04 05:02:15', 1),
(32, 'DTR.201902.0002', '2019-02-04', 17, 0, 0, 8, 0, 'RONGSOK', '', 1, '2019-02-04 05:02:17', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-04 05:02:07', 1, '2019-02-04 05:02:07', 1),
(33, 'DTR.201902.0003', '2019-02-06', 26, 0, 0, 9, 0, 'RONGSOK', '', 1, '2019-02-06 11:02:32', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-06 11:02:51', 1, '2019-02-06 11:02:51', 1),
(34, 'DTR.201902.0004', '2019-02-06', 26, 0, 0, 9, 0, 'RONGSOK', '', 1, '2019-02-06 11:02:11', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-06 11:02:01', 1, '2019-02-06 11:02:01', 1),
(35, 'DTR.201902.0005', '2019-02-06', 27, 0, 0, 7, 0, 'RONGSOK', '', 1, '2019-02-06 11:02:34', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-06 11:02:25', 1, '2019-02-06 11:02:25', 1),
(36, 'DTR.201902.0006', '2019-02-06', 27, 0, 0, 7, 0, 'RONGSOK', '', 1, '2019-02-06 11:02:14', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-06 11:02:29', 1, '2019-02-06 11:02:29', 1),
(37, 'DTR.201902.0007', '2019-02-06', 28, 0, 0, 76, 0, 'RONGSOK', '', 1, '2019-02-06 11:02:49', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-06 11:02:41', 1, '2019-02-06 11:02:41', 1),
(38, 'DTR.201902.0008', '2019-02-06', 29, 0, 0, 16, 0, 'RONGSOK', '', 1, '2019-02-06 11:02:08', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-06 11:02:15', 1, '2019-02-06 11:02:15', 1),
(41, 'DTR.201902.0009', '2019-02-06', 0, 0, 0, 0, 0, 'RONGSOK', 'BARANG FG TRANSFER KE RONGSOK', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-06 02:02:19', 1, '2019-02-06 02:02:19', 1),
(42, 'DTR.201902.0010', '2019-02-06', 0, 0, 0, 0, 0, 'RONGSOK', 'BARANG FG TRANSFER KE RONGSOK', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-06 03:02:50', 1, '2019-02-06 03:02:50', 1),
(43, 'DTR.201902.0011', '2019-02-06', 0, 0, 0, 0, 0, 'RONGSOK', 'BARANG FG TRANSFER KE RONGSOK', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-06 04:02:08', 1, '2019-02-11 02:02:02', 5),
(44, 'DTR.201902.0012', '2019-02-07', 0, 0, 0, 0, 0, 'RONGSOK', 'BARANG WIP TRANSFER KE RONGSOK', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-07 06:02:10', 1, '2019-02-11 02:02:14', 5),
(45, 'DTR-T.201902.0001', '2019-02-11', 0, 23, 0, 0, 5, 'RONGSOK', '', 1, '2019-02-11 04:02:38', 8, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-11 03:02:06', 1, '2019-02-11 03:02:06', 1),
(50, 'DTR.201902.0014', '2019-02-12', 0, 0, 0, 0, 0, 'RONGSOK', 'BARANG WIP TRANSFER KE RONGSOK', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-12 05:02:59', 1, '2019-02-12 05:02:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtr_detail`
--

CREATE TABLE `dtr_detail` (
  `id` int(11) NOT NULL,
  `dtr_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `rongsok_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `berat_palette` float NOT NULL,
  `netto` float NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `no_pallete` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `flag_taken` tinyint(1) NOT NULL DEFAULT '0',
  `flag_sj` tinyint(4) NOT NULL,
  `flag_resmi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtr_detail`
--

INSERT INTO `dtr_detail` (`id`, `dtr_id`, `po_detail_id`, `so_id`, `rongsok_id`, `qty`, `bruto`, `berat_palette`, `netto`, `line_remarks`, `no_pallete`, `created`, `created_by`, `modified`, `modified_by`, `tanggal_masuk`, `tanggal_keluar`, `flag_taken`, `flag_sj`, `flag_resmi`) VALUES
(9, 9, 12, 0, 43, 0, 78, 13, 65, '', '020119153512ESK', '2019-01-02 03:01:54', 1, '2019-01-10 03:01:13', 1, '2019-01-02', '2019-02-12', 1, 0, 1),
(10, 9, 13, 0, 44, 0, 89, 15, 74, '', '020119153522KVA', '2019-01-02 03:01:54', 1, '2019-01-10 03:01:13', 1, '2019-01-02', '2019-02-12', 1, 0, 1),
(11, 9, 14, 0, 45, 0, 56, 12, 44, '', '020119153534OGB', '2019-01-02 03:01:54', 1, '2019-01-10 03:01:13', 1, '2019-01-02', '2019-02-12', 1, 0, 1),
(12, 10, 16, 0, 61, 0, 20, 3, 17, '', '02011915385IRR', '2019-01-02 03:01:38', 1, NULL, NULL, '2019-01-02', '2019-02-12', 1, 0, 1),
(13, 10, 15, 0, 50, 0, 15, 2, 13, '', '020119153819GZQ', '2019-01-02 03:01:38', 1, NULL, NULL, '2019-01-02', '0000-00-00', 0, 0, 1),
(14, 11, 16, 0, 61, 0, 40, 12, 28, '', '020119154045LJU', '2019-01-02 03:01:17', 1, NULL, NULL, '2019-01-02', '0000-00-00', 0, 0, 1),
(15, 11, 15, 0, 50, 0, 38, 8, 30, '', '02011915415MUY', '2019-01-02 03:01:17', 1, NULL, NULL, '2019-01-02', '0000-00-00', 0, 0, 1),
(16, 12, 17, 0, 48, 0, 50, 4, 46, '', '07011918159QZA', '2019-01-07 06:01:55', 1, NULL, NULL, '2019-01-07', '2019-01-31', 1, 1, 1),
(17, 12, 18, 0, 49, 0, 57, 6, 51, '', '07011918214IDQ', '2019-01-07 06:01:55', 1, NULL, NULL, '2019-01-07', '2019-02-12', 1, 0, 0),
(18, 12, 19, 0, 43, 0, 58, 8, 50, '', '07011918242GFY', '2019-01-07 06:01:55', 1, NULL, NULL, '2019-01-07', '0000-00-00', 0, 0, 1),
(19, 13, 21, 0, 9, 0, 30, 5, 25, '', '070119181022WZH', '2019-01-07 06:01:53', 1, NULL, NULL, '2019-01-07', '2019-01-07', 1, 0, 0),
(20, 13, 22, 0, 10, 0, 27, 3, 24, '', '070119181034IMN', '2019-01-07 06:01:53', 1, NULL, NULL, '2019-01-07', '2019-01-07', 1, 0, 0),
(21, 14, 0, 0, 7, 0, 0, 0, 5, 'SISA PRODUKSI WIP', '090119120848324', '0000-00-00 00:00:00', 0, NULL, NULL, '2019-01-07', '0000-00-00', 0, 0, 0),
(22, 15, 0, 0, 7, 0, 0, 0, 4, 'SISA PRODUKSI WIP', '090119142003D7E', '0000-00-00 00:00:00', 0, NULL, NULL, '2019-01-07', '0000-00-00', 0, 0, 0),
(23, 16, 24, 5, 9, 0, 38, 8, 30, '', '100119165721ZUU', '2019-01-10 04:01:23', 1, NULL, NULL, '2019-01-10', '2019-01-10', 1, 0, 0),
(24, 16, 25, 5, 10, 0, 88, 12, 76, '', '100119165735UGA', '2019-01-10 04:01:23', 1, NULL, NULL, '2019-01-10', '2019-01-10', 1, 0, 0),
(25, 16, 26, 5, 17, 0, 59, 9, 50, '', '100119165751ZJV', '2019-01-10 04:01:23', 1, NULL, NULL, '2019-01-10', '2019-01-10', 1, 0, 0),
(26, 16, 27, 5, 18, 0, 113, 12, 101, '', '10011916584EQO', '2019-01-10 04:01:23', 1, NULL, NULL, '2019-01-10', '2019-01-10', 1, 0, 0),
(27, 17, 27, 5, 18, 0, 115, 12, 103, '', '100119165850TAI', '2019-01-10 04:01:02', 1, NULL, NULL, '2019-01-10', '2019-01-10', 1, 0, 0),
(28, 18, 28, 5, 17, 0, 61, 6, 55, '', '100119171216ZIR', '2019-01-10 05:01:37', 1, NULL, NULL, '2019-01-10', '2019-01-10', 1, 0, 0),
(29, 19, 29, 5, 9, 0, 30, 8, 22, '', '10011917407DGT', '2019-01-10 05:01:20', 1, NULL, NULL, '2019-01-10', '2019-01-10', 1, 0, 0),
(30, 19, 30, 5, 10, 0, 32, 6, 26, '', '100119174045RSN', '2019-01-10 05:01:20', 1, NULL, NULL, '2019-01-10', '2019-01-10', 1, 0, 0),
(31, 19, 31, 5, 17, 0, 65, 12, 53, '', '100119174057RUY', '2019-01-10 05:01:20', 1, NULL, NULL, '2019-01-10', '2019-01-10', 1, 0, 0),
(32, 20, 32, 18, 9, 0, 112, 12, 100, '', '140119104256EEY', '2019-01-14 10:01:29', 1, NULL, NULL, '2019-01-14', '0000-00-00', 0, 0, 0),
(33, 20, 33, 18, 10, 0, 111, 11, 100, '', '14011910433JZI', '2019-01-14 10:01:29', 1, NULL, NULL, '2019-01-14', '0000-00-00', 0, 0, 0),
(34, 20, 34, 0, 48, 0, 108, 8, 100, '', '140119104312LBI', '2019-01-14 10:01:29', 1, NULL, NULL, '2019-01-14', '2019-02-12', 1, 1, 0),
(35, 20, 35, 0, 49, 0, 115, 15, 100, '', '140119104320GAJ', '2019-01-14 10:01:29', 1, NULL, NULL, '2019-01-14', '2019-02-12', 1, 0, 0),
(36, 21, 0, 0, 7, 0, 0, 0, 10, 'SISA PRODUKSI WIP', '140119111631C11', '0000-00-00 00:00:00', 0, NULL, NULL, '2019-01-14', '0000-00-00', 0, 0, 0),
(37, 22, 40, 0, 48, 0, 22, 2, 20, '', '150119141550WAN', '2019-01-15 02:01:32', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(38, 22, 41, 0, 49, 0, 23, 3, 20, '', '15011914161UII', '2019-01-15 02:01:32', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(39, 22, 42, 0, 43, 0, 24, 4, 20, '', '15011914167VCI', '2019-01-15 02:01:32', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(40, 22, 44, 0, 45, 0, 25, 5, 20, '', '150119141613WQA', '2019-01-15 02:01:32', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(41, 22, 43, 0, 44, 0, 26, 6, 20, '', '150119141624EZE', '2019-01-15 02:01:32', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(42, 23, 46, 0, 48, 0, 30, 5, 25, '', '150119142239QTP', '2019-01-15 02:01:53', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(43, 23, 47, 0, 49, 0, 35, 10, 25, '', '150119142246KYI', '2019-01-15 02:01:53', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(44, 24, 0, 0, 43, 0, 30, 5, 25, '', '150119142450MFM', '2019-01-15 02:01:10', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(45, 24, 0, 0, 44, 0, 32, 7, 25, '', '15011914254JEU', '2019-01-15 02:01:10', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(46, 25, 51, 0, 9, 0, 56, 6, 50, '', '15011915945XKT', '2019-01-15 03:01:04', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(47, 25, 52, 0, 10, 0, 60, 10, 50, '', '15011915953TDW', '2019-01-15 03:01:04', 1, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(48, 26, 0, 0, 7, 0, 0, 0, 5, 'SISA PRODUKSI WIP', '150119151927920', '0000-00-00 00:00:00', 0, NULL, NULL, '2019-01-15', '0000-00-00', 0, 0, 0),
(52, 28, 0, 0, 48, 0, 68, 12, 56, '', '220119162345UZE', '2019-01-22 04:01:08', 1, NULL, NULL, '2019-01-22', '0000-00-00', 0, 0, 0),
(53, 28, 0, 0, 49, 0, 58, 12, 46, '', '220119162352KKG', '2019-01-22 04:01:08', 1, NULL, NULL, '2019-01-22', '0000-00-00', 0, 1, 0),
(54, 29, 0, 0, 44, 0, 65, 10, 55, '', '230119175851CLB', '2019-01-23 05:01:03', 1, NULL, NULL, '2019-01-23', '0000-00-00', 0, 0, 0),
(55, 30, 0, 0, 45, 0, 67, 12, 55, '', '230119175938BTH', '2019-01-23 05:01:51', 1, NULL, NULL, '2019-01-23', '0000-00-00', 0, 0, 0),
(56, 31, 49, 0, 44, 0, 68, 8, 60, '', '040219173653ULA', '2019-02-04 05:02:15', 1, NULL, NULL, '2019-02-04', '0000-00-00', 0, 0, 0),
(57, 31, 49, 0, 44, 0, 69, 8, 61, '', '04021917371DDO', '2019-02-04 05:02:15', 1, NULL, NULL, '2019-02-04', '0000-00-00', 0, 0, 0),
(58, 32, 48, 0, 43, 0, 35, 8, 27, '', '040219173855XWZ', '2019-02-04 05:02:07', 1, NULL, NULL, '2019-02-04', '0000-00-00', 0, 0, 0),
(59, 33, 70, 0, 35, 0, 60, 6, 54, '', '060219111210YXV', '2019-02-06 11:02:51', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(60, 33, 70, 0, 35, 0, 68, 12, 56, '', '060219111229CJI', '2019-02-06 11:02:51', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(61, 33, 70, 0, 35, 0, 60, 8, 52, '', '060219111242UKJ', '2019-02-06 11:02:51', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(62, 34, 71, 0, 36, 0, 56, 8, 48, '', '060219112446BOY', '2019-02-06 11:02:01', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(63, 34, 71, 0, 36, 0, 60, 12, 48, '', '060219112453MKD', '2019-02-06 11:02:01', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(64, 35, 73, 0, 32, 0, 58, 6, 52, '', '060219113240AEI', '2019-02-06 11:02:25', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(65, 35, 73, 0, 32, 0, 60, 12, 48, '', '060219113248YQH', '2019-02-06 11:02:25', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(66, 35, 74, 0, 33, 0, 65, 13, 52, '', '060219113310QXE', '2019-02-06 11:02:25', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(67, 36, 75, 0, 39, 0, 108, 12, 96, '', '06021911346ALZ', '2019-02-06 11:02:29', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(68, 37, 77, 0, 71, 0, 100, 12, 88, '', '060219113935ZHL', '2019-02-06 11:02:41', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(69, 38, 78, 0, 12, 56, 112, 8, 104, '', '06021911543FSO', '2019-02-06 11:02:15', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(70, 38, 79, 0, 17, 78, 105, 6, 99, '', '060219115431ABC', '2019-02-06 11:02:15', 1, NULL, NULL, '2019-02-06', '0000-00-00', 0, 0, 0),
(71, 41, 0, 0, 8, 0, 0, 0, 28.16, '', '0602191451195E1', '0000-00-00 00:00:00', 0, NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0),
(72, 42, 0, 0, 8, 0, 0, 0, 24.42, '', '060219153851DE0', '0000-00-00 00:00:00', 0, NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0),
(73, 43, 0, 0, 8, 0, 0, 0, 24.42, '', '0602191632086D7', '0000-00-00 00:00:00', 0, '2019-02-11 02:02:02', 5, '0000-00-00', '0000-00-00', 0, 0, 0),
(74, 44, 0, 0, 8, 32, 0, 0, 32, 'TEST REVISI', '0702191855103A3', '0000-00-00 00:00:00', 0, '2019-02-11 02:02:14', 5, '2019-02-11', '0000-00-00', 0, 0, 0),
(75, 45, 0, 0, 48, 0, 112, 8, 104, '', '11021915336AMT', '2019-02-11 03:02:06', 1, NULL, NULL, '2019-02-11', '0000-00-00', 0, 0, 0),
(76, 45, 0, 0, 49, 0, 108, 6, 102, '', '110219153315FIP', '2019-02-11 03:02:06', 1, NULL, NULL, '2019-02-11', '0000-00-00', 0, 0, 0),
(81, 50, 0, 0, 8, 50, 0, 0, 80, 'Kirim Rongsok dari WIP', '120219170159A27', '0000-00-00 00:00:00', 0, NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0),
(82, 50, 0, 0, 8, 60, 0, 0, 70, 'Kirim Rongsok dari WIP', '120219170159DA2', '0000-00-00 00:00:00', 0, NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dtt`
--

CREATE TABLE `dtt` (
  `id` int(11) NOT NULL,
  `no_dtt` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `po_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `jenis_barang` varchar(10) NOT NULL,
  `remarks` text NOT NULL,
  `status` int(1) NOT NULL,
  `approved` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  `rejected` datetime NOT NULL,
  `rejected_by` int(11) NOT NULL,
  `rejected_remarks` text NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `type_retur` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtt`
--

INSERT INTO `dtt` (`id`, `no_dtt`, `tanggal`, `po_id`, `customer_id`, `jenis_barang`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `rejected_remarks`, `status_pembayaran`, `type_retur`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'DTT.201901.0001', '2019-01-30', 23, 3, 'FG', 'TESET', 1, '2019-02-04 02:02:45', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-30 06:01:29', 1, '0000-00-00 00:00:00', 0),
(2, 'DTT.201901.0002', '2019-01-31', 25, 55, 'WIP', 'DTT WIP', 1, '2019-02-04 04:02:13', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-01-31 10:01:12', 1, '0000-00-00 00:00:00', 0),
(5, 'DTT.201902.0003', '2019-02-04', 23, 3, 'FG', '', 1, '2019-02-04 02:02:14', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-04 02:02:56', 1, '0000-00-00 00:00:00', 0),
(6, 'DTT.201902.0004', '2019-02-04', 25, 55, 'WIP', '', 1, '2019-02-04 04:02:01', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-04 04:02:57', 1, '0000-00-00 00:00:00', 0),
(7, 'DTT.201902.0005', '2019-02-11', 30, 37, 'FG', '', 1, '2019-02-11 05:02:59', 8, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-02-11 04:02:57', 5, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dtt_detail`
--

CREATE TABLE `dtt_detail` (
  `id` int(11) NOT NULL,
  `dtt_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `berat_bobbin` float NOT NULL,
  `netto` float NOT NULL,
  `line_remarks` text NOT NULL,
  `no_bobbin` varchar(10) NOT NULL,
  `no_packing` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `flag_taken` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtt_detail`
--

INSERT INTO `dtt_detail` (`id`, `dtt_id`, `po_detail_id`, `jenis_barang_id`, `qty`, `bruto`, `berat_bobbin`, `netto`, `line_remarks`, `no_bobbin`, `no_packing`, `created`, `created_by`, `modified`, `modified_by`, `tanggal_masuk`, `tanggal_keluar`, `flag_taken`) VALUES
(1, 1, 62, 142, 0, 105, 2.5, 102.5, '0', 'M0007', '190130M00070001', '2019-01-30 07:01:53', 1, '0000-00-00 00:00:00', 0, '2019-01-30', '0000-00-00', 0),
(2, 2, 67, 5, 100, 0, 0, 150, '0', '', '', '2019-01-31 11:01:39', 1, '0000-00-00 00:00:00', 0, '2019-01-31', '0000-00-00', 0),
(5, 5, 63, 143, 0, 110, 12.932, 97.068, '', 'M0009', '190204M00090001', '2019-02-04 02:02:08', 1, '0000-00-00 00:00:00', 0, '2019-02-04', '0000-00-00', 0),
(6, 6, 68, 2, 75, 0, 0, 100, '', '', '', '2019-02-04 04:02:11', 1, '0000-00-00 00:00:00', 0, '2019-02-04', '0000-00-00', 0),
(7, 7, 83, 175, 0, 80, 5.74, 74.26, '', 'M0012', '190211M00120001', '2019-02-11 04:02:59', 5, '0000-00-00 00:00:00', 0, '2019-02-11', '0000-00-00', 0),
(8, 7, 83, 175, 0, 80, 4.92, 75.08, '', 'M0013', '190211M00130001', '2019-02-11 04:02:59', 5, '0000-00-00 00:00:00', 0, '2019-02-11', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dtwip`
--

CREATE TABLE `dtwip` (
  `id` int(11) NOT NULL,
  `no_dtwip` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `po_id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `approved` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `rejected` datetime DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `reject_remarks` text NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `type_retur` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtwip`
--

INSERT INTO `dtwip` (`id`, `no_dtwip`, `tanggal`, `po_id`, `so_id`, `supplier_id`, `jenis_barang`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `reject_remarks`, `status_pembayaran`, `type_retur`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'DTWIP.201901.0001', '2019-01-31', 0, 0, 7, 'WIP', '', 0, NULL, NULL, NULL, NULL, '', 0, 0, '2019-01-31 10:01:20', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dtwip_detail`
--

CREATE TABLE `dtwip_detail` (
  `id` int(11) NOT NULL,
  `dtwip_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `so_detail_id` int(11) NOT NULL,
  `spb_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `line_remarks` varchar(100) NOT NULL,
  `no_batch` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `flag_taken` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtwip_detail`
--

INSERT INTO `dtwip_detail` (`id`, `dtwip_id`, `po_detail_id`, `so_id`, `so_detail_id`, `spb_id`, `jenis_barang_id`, `qty`, `berat`, `line_remarks`, `no_batch`, `created`, `created_by`, `modified`, `modified_by`, `tanggal_masuk`, `tanggal_keluar`, `flag_taken`) VALUES
(1, 1, 0, 0, 0, 0, 2, 150, 200, '', '', '2019-01-31 10:01:20', 1, NULL, NULL, '2019-01-31', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_invoice`
--

CREATE TABLE `f_invoice` (
  `id` int(11) NOT NULL,
  `jenis_trx` tinyint(1) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `flag_matching` int(11) NOT NULL,
  `flag_resmi` int(1) NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_sales_order` int(11) NOT NULL,
  `id_surat_jalan` int(11) NOT NULL,
  `id_retur` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_invoice`
--

INSERT INTO `f_invoice` (`id`, `jenis_trx`, `no_invoice`, `flag_matching`, `flag_resmi`, `tanggal`, `tgl_jatuh_tempo`, `id_customer`, `id_sales_order`, `id_surat_jalan`, `id_retur`, `keterangan`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(3, 0, 'INVOICE-201901.0003', 1, 1, '2019-01-09', '0000-00-00', 3, 3, 3, 0, '', '2019-01-09 07:01:09', 1, '2019-01-16 06:01:23', 1),
(4, 0, 'INVOICE-201901.0004', 0, 0, '2019-01-10', '0000-00-00', 6, 4, 4, 0, '', '2019-01-10 04:01:10', 1, '2019-01-10 04:01:28', 1),
(5, 0, 'INVOICE-201901.0005', 1, 1, '2019-01-10', '0000-00-00', 3, 3, 5, 0, '', '2019-01-10 04:01:15', 1, '2019-01-16 06:01:32', 1),
(6, 0, 'INVOICE-201901.0006', 1, 0, '2019-01-10', '0000-00-00', 3, 5, 6, 0, '', '2019-01-10 06:01:19', 1, '2019-01-16 06:01:50', 1),
(7, 0, 'INVOICE-201901.0007', 1, 0, '2019-01-10', '0000-00-00', 3, 5, 7, 0, '', '2019-01-10 06:01:29', 1, '2019-01-16 07:01:45', 1),
(8, 0, 'INVOICE-201901.0008', 0, 1, '2019-01-14', '0000-00-00', 4, 6, 8, 0, '', '2019-01-14 02:01:42', 1, '2019-01-14 02:01:58', 1),
(9, 0, 'INVOICE-201901.0009', 0, 0, '2019-01-14', '0000-00-00', 4, 6, 9, 0, '', '2019-01-14 02:01:27', 1, '2019-01-14 02:01:36', 1),
(10, 0, 'INVOICE-201901.0010', 1, 0, '2019-01-15', '0000-00-00', 5, 9, 12, 0, '', '2019-01-15 03:01:13', 1, '2019-02-07 05:02:02', 1),
(11, 0, 'INVOICE-201901.0011', 1, 0, '2019-01-21', '2019-01-24', 5, 7, 10, 0, '', '2019-01-21 11:01:06', 1, '2019-02-07 05:02:20', 1),
(12, 0, 'INVOICE-201901.0012', 0, 0, '2019-01-28', '2019-01-28', 6, 8, 13, 0, 'TEST AUTO', '2019-01-28 04:01:48', 1, '2019-01-28 04:01:48', 1),
(13, 0, 'INVOICE-201902.0001', 0, 0, '2019-02-06', '2019-02-06', 6, 18, 18, 0, '', '2019-02-06 01:02:50', 1, '0000-00-00 00:00:00', 0),
(14, 0, 'INVOICE-201902.0002', 0, 0, '2019-02-06', '2019-02-06', 26, 21, 20, 0, '', '2019-02-06 01:02:08', 1, '0000-00-00 00:00:00', 0),
(15, 0, 'INVOICE-201902.0003', 0, 0, '2019-02-06', '2019-02-06', 26, 21, 21, 0, '', '2019-02-06 01:02:47', 1, '0000-00-00 00:00:00', 0),
(16, 0, 'INVOICE-201902.0004', 0, 0, '2019-02-06', '2019-02-06', 3, 22, 22, 0, '', '2019-02-06 01:02:17', 1, '0000-00-00 00:00:00', 0),
(19, 1, 'INV-RTR.201902.0003', 1, 0, '2019-02-07', '2019-02-13', 5, 0, 0, 4, 'BARANG RETUR', '2019-02-07 01:02:21', 1, '2019-02-07 05:02:41', 1),
(20, 0, 'INVOICE-201902.0005', 1, 0, '2019-02-07', '2019-02-07', 5, 7, 11, 0, '', '2019-02-07 05:02:28', 1, '2019-02-07 05:02:41', 1),
(21, 0, 'INVOICE-201902.0006', 0, 0, '2019-02-13', '2019-02-15', 15, 20, 19, 0, '', '2019-02-13 06:02:04', 4, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_invoice_detail`
--

CREATE TABLE `f_invoice_detail` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `netto` float NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_invoice_detail`
--

INSERT INTO `f_invoice_detail` (`id`, `id_invoice`, `jenis_barang_id`, `qty`, `netto`, `harga`, `total_harga`, `keterangan`) VALUES
(3, 3, 409, 1, 128, 130000, 16640000, 'BARANG RONGSOK'),
(4, 3, 409, 1, 60, 130000, 7800000, 'BARANG RONGSOK'),
(5, 4, 5, 30, 50, 56000, 2800000, 'BARANG RONGSOK'),
(6, 4, 6, 40, 80, 100000, 8000000, 'BARANG RONGSOK'),
(7, 5, 450, 1, 35, 100000, 3506800, 'BARANG RONGSOK'),
(8, 5, 450, 1, 24, 100000, 2400000, 'BARANG RONGSOK'),
(9, 5, 450, 1, 33, 100000, 3300000, 'BARANG RONGSOK'),
(10, 6, 9, 0, 22, 78000, 1716000, 'BARANG RONGSOK'),
(11, 6, 9, 0, 30, 78000, 2340000, 'BARANG RONGSOK'),
(12, 6, 10, 0, 76, 92000, 6992000, 'BARANG RONGSOK'),
(13, 6, 10, 0, 26, 92000, 2392000, 'BARANG RONGSOK'),
(14, 7, 17, 0, 50, 103000, 5150000, 'BARANG RONGSOK'),
(15, 7, 17, 0, 55, 103000, 5665000, 'BARANG RONGSOK'),
(16, 7, 17, 0, 53, 103000, 5459000, 'BARANG RONGSOK'),
(17, 7, 18, 0, 101, 103000, 10403000, 'BARANG RONGSOK'),
(18, 7, 18, 0, 103, 103000, 10609000, 'BARANG RONGSOK'),
(19, 8, 11, 1, 56, 35000, 1960000, 'BARANG RONGSOK'),
(20, 9, 174, 1, 50, 45000, 2270250, 'BARANG RONGSOK'),
(21, 9, 174, 1, 52, 45000, 2358900, 'BARANG RONGSOK'),
(22, 10, 401, 1, 57, 70000, 4020800, 'BARANG RONGSOK'),
(23, 11, 455, 1, 51, 14000, 707000, 'BARANG RONGSOK'),
(24, 11, 457, 1, 28, 20000, 550000, 'BARANG RONGSOK'),
(25, 12, 409, 1, 51, 50000, 2560000, ''),
(26, 13, 9, 0, 100, 150000, 15000000, ''),
(27, 13, 10, 0, 100, 112000, 11200000, ''),
(28, 14, 450, 1, 52, 608500, 31666341, ''),
(29, 14, 450, 1, 54, 608500, 32859000, ''),
(30, 15, 455, 1, 110, 950500, 104669063, ''),
(31, 15, 457, 1, 50, 1130500, 56977202, ''),
(32, 15, 457, 1, 55, 1130500, 62254375, ''),
(33, 16, 153, 1, 52, 705000, 36688201, ''),
(36, 19, 457, 1, 24.42, 19000, 463980, 'TEST'),
(37, 20, 457, 1, 51.5, 20000, 1030000, ''),
(38, 21, 5, 80, 100, 380000, 38000000, ''),
(39, 21, 6, 75, 100, 290000, 29000000, '');

-- --------------------------------------------------------

--
-- Table structure for table `f_kas`
--

CREATE TABLE `f_kas` (
  `id` int(11) NOT NULL,
  `jenis_trx` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `no_giro` varchar(50) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_um` int(11) NOT NULL,
  `id_slip_setoran` int(11) NOT NULL,
  `id_vc` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_kas`
--

INSERT INTO `f_kas` (`id`, `jenis_trx`, `tanggal`, `tgl_jatuh_tempo`, `no_giro`, `id_bank`, `id_um`, `id_slip_setoran`, `id_vc`, `currency`, `nominal`, `keterangan`, `created_at`, `created_by`) VALUES
(1, 0, '2019-01-18', '0000-00-00', '', 3, 0, 0, 0, 'IDR', 50000000, 'Saldo Awal', '0000-00-00 00:00:00', 0),
(5, 0, '2019-01-21', '0000-00-00', '', 3, 10, 0, 0, 'IDR', 2000000, '', '2019-01-21 11:01:41', 1),
(6, 0, '2019-01-21', '0000-00-00', '', 1, 13, 0, 0, 'IDR', 3000000, '', '2019-01-21 11:01:40', 1),
(7, 1, '2019-01-22', '2019-01-25', '099896248', 3, 0, 0, 19, 'IDR', 2375000, '', '2019-01-21 07:01:48', 1),
(8, 1, '2019-01-22', '2019-01-25', '099896250', 3, 0, 0, 20, 'IDR', 2375000, '', '2019-01-21 07:01:39', 1),
(9, 1, '2019-01-22', '2019-01-25', '099896251', 3, 0, 0, 21, 'IDR', 1000000, '', '2019-01-22 10:01:48', 1),
(10, 1, '2019-01-22', '2019-01-25', '099896252', 3, 0, 0, 22, 'IDR', 5300000, '', '2019-01-22 10:01:00', 1),
(11, 1, '2019-01-22', '2019-01-25', '099896253', 3, 0, 0, 23, 'IDR', 1000000, '', '2019-01-22 11:01:32', 1),
(12, 1, '2019-01-22', '2019-01-25', '099896253', 3, 0, 0, 24, 'IDR', 6560000, '', '2019-01-22 11:01:39', 1),
(15, 0, '2019-02-08', '0000-00-00', '', 3, 0, 1, 0, 'IDR', 900000, 'TEST', '2019-02-08 02:02:40', 1),
(16, 1, '2019-02-11', '2019-02-11', '', 3, 0, 0, 0, 'IDR', 760000, '', '2019-02-11 05:02:38', 7),
(17, 1, '2019-02-11', '2019-02-11', '2462742588', 3, 0, 0, 0, 'IDR', 600000, '', '2019-02-11 05:02:22', 7),
(18, 1, '2019-02-11', '2019-02-11', '73320380', 3, 0, 0, 0, 'IDR', 300000, '', '2019-02-11 05:02:56', 7),
(19, 0, '2019-02-14', '0000-00-00', '', 3, 0, 2, 0, 'IDR', 1520000, '', '2019-02-14 09:02:42', 4);

-- --------------------------------------------------------

--
-- Table structure for table `f_matching_detail`
--

CREATE TABLE `f_matching_detail` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_hutang` int(11) NOT NULL,
  `id_um` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `used_hutang` int(11) NOT NULL,
  `sisa_um` int(11) NOT NULL,
  `sisa_invoice` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_matching_detail`
--

INSERT INTO `f_matching_detail` (`id`, `customer_id`, `id_invoice`, `id_hutang`, `id_um`, `paid`, `used_hutang`, `sisa_um`, `sisa_invoice`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(18, 3, 3, 0, 2, 24440000, 0, 25560000, 0, '2019-01-16 06:01:23', 1, '0000-00-00 00:00:00', 0),
(19, 3, 5, 0, 2, 9206800, 0, 16353200, 0, '2019-01-16 06:01:32', 1, '0000-00-00 00:00:00', 0),
(20, 3, 6, 0, 2, 13440000, 0, 2913200, 0, '2019-01-16 06:01:50', 1, '0000-00-00 00:00:00', 0),
(21, 3, 7, 0, 8, 7000000, 0, 0, 30286000, '2019-01-16 07:01:00', 1, '0000-00-00 00:00:00', 0),
(22, 3, 7, 0, 2, 2913200, 0, 0, 27372800, '2019-01-16 07:01:18', 1, '0000-00-00 00:00:00', 0),
(23, 3, 7, 0, 6, 12000000, 0, 0, 15372800, '2019-01-16 07:01:31', 1, '0000-00-00 00:00:00', 0),
(24, 3, 7, 0, 3, 15372800, 0, 49627200, 0, '2019-01-16 07:01:45', 1, '0000-00-00 00:00:00', 0),
(25, 4, 8, 0, 9, 1500000, 0, 0, 460000, '2019-01-16 07:01:34', 1, '0000-00-00 00:00:00', 0),
(51, 5, 10, 0, 11, 3000000, 0, 0, 1020800, '2019-02-07 05:02:47', 1, '0000-00-00 00:00:00', 0),
(52, 5, 10, 0, 15, 1020800, 0, 979200, 0, '2019-02-07 05:02:02', 1, '0000-00-00 00:00:00', 0),
(53, 5, 11, 0, 15, 979200, 0, 0, 277800, '2019-02-07 05:02:09', 1, '0000-00-00 00:00:00', 0),
(54, 5, 11, 19, 14, 277800, 277800, 2222200, 0, '2019-02-07 05:02:20', 1, '0000-00-00 00:00:00', 0),
(55, 5, 20, 19, 14, 843820, 186180, 1378380, 0, '2019-02-07 05:02:41', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_pembayaran`
--

CREATE TABLE `f_pembayaran` (
  `id` int(11) NOT NULL,
  `no_pembayaran` varchar(50) NOT NULL,
  `status` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_jalan` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `approved_at` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  `reject_at` datetime NOT NULL,
  `reject_by` int(11) NOT NULL,
  `reject_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_pembayaran`
--

INSERT INTO `f_pembayaran` (`id`, `no_pembayaran`, `status`, `tanggal`, `tanggal_jalan`, `keterangan`, `created_at`, `created_by`, `modified_at`, `modified_by`, `approved_at`, `approved_by`, `reject_at`, `reject_by`, `reject_remarks`) VALUES
(1, 'PMB.201901.0001', 1, '2019-01-08', '2019-01-08', '', '2019-01-08 10:01:21', 1, '2019-01-08 01:01:36', 1, '2019-01-08 00:00:00', 1, '0000-00-00 00:00:00', 0, 'GAGAL CAIR'),
(2, 'PMB.201901.0002', 1, '2019-01-08', '2019-01-11', '', '2019-01-08 01:01:06', 1, '2019-01-11 02:01:37', 1, '2019-01-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 'GAGAL CAIR\r\n'),
(3, 'PMB.201901.0003', 1, '2019-01-08', '2019-01-14', '', '2019-01-08 01:01:53', 1, '2019-01-14 03:01:40', 1, '2019-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, ''),
(4, 'PMB.201901.0004', 1, '2019-01-21', '2019-02-07', '', '2019-01-21 01:01:08', 1, '2019-02-07 01:02:36', 1, '2019-02-07 00:00:00', 1, '0000-00-00 00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `f_pembayaran_detail`
--

CREATE TABLE `f_pembayaran_detail` (
  `id` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `um_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_pembayaran_detail`
--

INSERT INTO `f_pembayaran_detail` (`id`, `id_pembayaran`, `voucher_id`, `um_id`) VALUES
(1, 1, 0, 1),
(2, 1, 0, 2),
(3, 1, 0, 4),
(4, 1, 1, 0),
(5, 1, 2, 0),
(7, 2, 0, 6),
(8, 3, 0, 7),
(9, 3, 0, 3),
(10, 2, 0, 8),
(11, 2, 5, 0),
(12, 2, 6, 0),
(13, 2, 7, 0),
(14, 3, 0, 9),
(15, 3, 4, 0),
(16, 4, 0, 11),
(17, 4, 0, 12),
(18, 4, 0, 14),
(19, 4, 0, 15),
(20, 4, 16, 0),
(21, 4, 17, 0),
(22, 4, 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_slip_setoran`
--

CREATE TABLE `f_slip_setoran` (
  `id` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `id_kas` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_slip_setoran`
--

INSERT INTO `f_slip_setoran` (`id`, `id_pembayaran`, `id_kas`, `nominal`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 15, 900000, '2019-01-08 00:00:00', 1, '2019-02-08 02:02:40', 1),
(2, 2, 19, 1520000, '2019-01-11 00:00:00', 1, '2019-02-14 09:02:42', 4),
(3, 3, 0, 11500000, '2019-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0),
(4, 4, 0, 750000, '2019-02-07 00:00:00', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_uang_masuk`
--

CREATE TABLE `f_uang_masuk` (
  `id` int(11) NOT NULL,
  `no_uang_masuk` varchar(15) NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `flag_matching` int(11) NOT NULL,
  `replace_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `rekening_tujuan` int(11) NOT NULL,
  `jenis_pembayaran` varchar(50) NOT NULL,
  `bank_pembayaran` varchar(25) NOT NULL,
  `rekening_pembayaran` varchar(50) DEFAULT NULL,
  `nomor_cek` varchar(50) DEFAULT NULL,
  `currency` varchar(5) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_cair` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `approved_at` datetime NOT NULL,
  `approved_by` int(3) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `reject_at` datetime NOT NULL,
  `reject_by` int(3) NOT NULL,
  `reject_remarks` text NOT NULL,
  `update_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_uang_masuk`
--

INSERT INTO `f_uang_masuk` (`id`, `no_uang_masuk`, `m_customer_id`, `status`, `flag_matching`, `replace_id`, `tanggal`, `rekening_tujuan`, `jenis_pembayaran`, `bank_pembayaran`, `rekening_pembayaran`, `nomor_cek`, `currency`, `nominal`, `tgl_cair`, `keterangan`, `created_at`, `created_by`, `approved_at`, `approved_by`, `modified_at`, `modified_by`, `reject_at`, `reject_by`, `reject_remarks`, `update_remarks`) VALUES
(1, '0001190108', 3, 1, 0, 0, '2019-01-08', 0, 'Cek Mundur', 'BCA', '', '123456789', 'IDR', 100000000, '2019-01-08', '', '2019-01-08 10:01:05', 1, '2019-01-08 01:01:49', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', ''),
(2, '0002190108', 3, 1, 1, 0, '2019-01-08', 3, 'Giro', 'BCA', '123456766', '', 'IDR', 50000000, '2019-01-08', '', '2019-01-08 10:01:34', 1, '2019-01-08 01:01:49', 1, '2019-01-16 07:01:18', 1, '0000-00-00 00:00:00', 0, '', ''),
(3, '0003190108', 3, 1, 0, 0, '2019-01-08', 0, 'Cek', 'BCA', '', '123456565', 'IDR', 65000000, '2019-01-14', '', '2019-01-08 10:01:20', 1, '2019-01-14 03:01:48', 1, '2019-01-11 08:01:39', 1, '2019-01-11 07:01:29', 1, 'NOMOR CEK SALAH', 'GANTI NOMOR CEK'),
(4, '0004190108', 3, 1, 0, 0, '2019-01-08', 0, 'Cek Mundur', 'BCA', '', '123097549', 'IDR', 80000000, '2019-01-08', '', '2019-01-08 10:01:59', 1, '2019-01-08 01:01:49', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', ''),
(5, '0005190108', 3, 8, 0, 8, '2019-01-08', 0, 'Cek Mundur', 'BCA', '', '1239402590', 'IDR', 7000000, '2019-01-27', '', '2019-01-08 01:01:20', 1, '0000-00-00 00:00:00', 0, '2019-01-08 03:01:44', 1, '2019-01-08 03:01:38', 1, 'REJECT', 'UPDATE'),
(6, '0006190108', 3, 1, 1, 0, '2019-01-08', 0, 'Cek Mundur', 'BCA', '', '0939356489', 'IDR', 12000000, '2019-01-11', '', '2019-01-08 01:01:57', 1, '2019-01-11 02:01:46', 1, '2019-01-16 07:01:31', 1, '0000-00-00 00:00:00', 0, '', ''),
(7, '0007190108', 6, 1, 0, 0, '2019-01-08', 0, 'Cek Mundur', 'BCA', '', '02475930428', 'IDR', 45000000, '2019-01-14', '', '2019-01-08 01:01:47', 1, '2019-01-14 03:01:48', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', ''),
(8, '0008190108', 3, 1, 1, 0, '2019-01-08', 0, 'Cek Mundur', 'BCA', '', '037501385', 'IDR', 7000000, '2019-01-11', '', '2019-01-08 04:01:12', 1, '2019-01-11 02:01:46', 1, '2019-01-16 07:01:00', 1, '0000-00-00 00:00:00', 0, '', ''),
(9, '0009190114', 4, 1, 1, 0, '2019-01-14', 0, 'Cek', 'BCA', '', '02475930430', 'IDR', 1500000, '2019-01-14', '', '2019-01-14 03:01:09', 1, '2019-01-14 03:01:48', 1, '2019-01-16 07:01:34', 1, '0000-00-00 00:00:00', 0, '', ''),
(10, '0010190118', 4, 1, 2, 0, '2019-01-18', 3, 'Transfer', 'BCA', '748029375', '', 'IDR', 2000000, '0000-00-00', '', '2019-01-18 11:01:42', 1, '2019-01-21 11:01:41', 1, '2000-01-21 11:01:27', 1, '0000-00-00 00:00:00', 0, '', ''),
(11, '0011190118', 5, 1, 1, 0, '2019-01-18', 1, 'Transfer', 'BNI', '857797345', '', 'IDR', 3000000, '2019-02-07', '', '2019-01-18 01:01:07', 1, '2019-02-07 01:02:58', 1, '2019-02-07 05:02:47', 1, '0000-00-00 00:00:00', 0, '', ''),
(12, '0012190118', 6, 1, 0, 0, '2019-01-18', 3, 'Transfer', 'BCA', '7548874309', '', 'IDR', 4000000, '2019-02-07', '', '2019-01-18 01:01:41', 1, '2019-02-07 01:02:58', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', ''),
(13, '0013190121', 4, 1, 2, 0, '2019-01-21', 0, 'Cek Mundur', 'BNI', '', '0939356490', 'IDR', 3000000, '2019-01-24', '', '2019-01-21 11:01:43', 1, '2019-01-21 11:01:40', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', ''),
(14, '0014190207', 5, 1, 0, 0, '2019-02-07', 0, 'Cek', 'BCA', '', '9523627942', 'IDR', 2500000, '2019-02-07', '', '2019-02-07 01:02:27', 1, '2019-02-07 01:02:58', 1, '2019-02-07 04:02:34', 1, '0000-00-00 00:00:00', 0, '', ''),
(15, '0015190207', 5, 1, 1, 0, '2019-02-07', 3, 'Transfer', 'BCA', '75488743093', '', 'IDR', 2000000, '2019-02-07', '', '2019-02-07 01:02:50', 1, '2019-02-07 01:02:58', 1, '2019-02-07 05:02:09', 1, '0000-00-00 00:00:00', 0, '', ''),
(16, '0016190213', 5, 0, 0, 0, '2019-02-13', 0, 'Cek Mundur', 'BCA', '', '315701395', 'IDR', 25000000, '2019-02-16', '', '2019-02-13 06:02:33', 4, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '');

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
(2, 'PRODUKSI', '2017-10-01 09:10:02', 1, '2019-02-12 11:02:21', 1),
(3, 'PEMBELIAN', '2018-04-16 10:04:13', 1, '2018-04-16 10:04:13', 1),
(4, 'FINANCE', '2018-04-16 10:04:26', 1, '2018-04-16 10:04:26', 1),
(5, 'TIMBANGAN', '2018-04-16 10:04:37', 1, '2018-04-16 10:04:37', 1),
(6, 'GUDANG', '2018-04-16 10:04:48', 1, '2018-04-16 10:04:48', 1),
(7, 'PROCUREMENT', '2018-04-17 06:04:30', 1, '2018-04-17 06:04:30', 1),
(8, 'SALES', '2018-07-02 11:07:39', 1, '2018-07-02 11:07:39', 1),
(9, 'RESMI', '2019-01-24 10:01:11', 1, '2019-01-24 10:01:11', 1),
(10, 'BOBBIN', '2019-02-13 04:02:44', 1, '2019-02-13 04:02:44', 1),
(11, 'SURAT JALAN', '2019-02-13 04:02:16', 1, '2019-02-13 04:02:16', 1),
(12, 'SDM', '2019-02-13 04:02:40', 1, '2019-02-13 04:02:40', 1),
(13, 'WIP', '2019-02-13 04:02:46', 1, '2019-02-13 04:02:46', 1);

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
(1, 'CUSTOMER', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'SUPPLIER', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'LAINNYA', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(1, 'RONGSOK', '', 'RONGSOK', 'KG', NULL, '', '2018-12-17 13:00:00', 1, '0000-00-00 00:00:00', 0),
(2, 'INGOT', '04I0001', 'WIP', 'BATANG', NULL, '', '2018-02-14 10:02:10', 1, '2018-02-14 10:02:10', 1),
(3, 'AMPAS', '', 'AMPAS', 'KG', NULL, '', '2018-02-14 10:02:43', 1, '2018-10-16 12:10:12', 1),
(4, 'TOLLING', '', '', '', NULL, '', '2018-02-14 10:02:53', 1, '2018-02-14 10:02:53', 1),
(5, 'KAWAT MERAH', '', 'WIP', 'ROLL', NULL, '', '2018-02-14 10:02:07', 1, '2018-02-14 10:02:07', 1),
(6, 'KAWAT HITAM', '', 'WIP', 'ROLL', NULL, '', '2018-02-25 07:02:52', 1, '2018-02-25 07:02:52', 1),
(7, 'BS', '', 'RONGSOK', 'KG', NULL, '', '2018-12-17 13:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'BCW 1,77 MM SOFT old', '', 'FG', 'KG', '0177', 'NON KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(9, 'BCW 1,63 MM SOFT old', '', 'FG', 'KG', '0163', 'NON KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(10, 'BCW 1,40 MM SOFT old', '', 'FG', 'KG', '0140', 'NON KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(11, 'BCW 0,15 MM TMS SOFT old', '', 'FG', 'KG', '0015', 'KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(12, 'BCW 0,16 MM TMS SOFT old', '', 'FG', 'KG', '0016', 'KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(13, 'BCW 0,14 MM TMS SOFT old', '05RT005', 'FG', 'KG', '0014', 'KAWAT RAMBUT', '2018-10-23 12:26:23', 1, '2018-10-23 00:00:00', 1),
(14, 'SERBUK', '', 'FG', 'KG', '', '', '0000-00-00 00:00:00', 1, '2019-01-16 11:01:47', 1),
(15, 'KAWAT HITAM KERAS', '', 'ROLLING', 'ROLL', '', '', '0000-00-00 00:00:00', 0, '2019-01-17 11:01:48', 1),
(141, 'BC WIRE HARD 2,60MM', '05BCH05', 'FG', 'KG', '2600', '', '0000-00-00 00:00:00', 0, '2018-12-28 04:12:53', 1),
(142, 'BCW 2,03 MM HARD', '05BH002', 'FG', 'KG', '0203', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 'BCW 2,05 MM HARD', '05BH003', 'FG', 'KG', '0205', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 'BCW 2,23 MM HARD', '05BH004', 'FG', 'KG', '0223', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 'BCW 2,50 MM HARD', '05BH005', 'FG', 'KG', '0250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 'BCW 2,17 MM HARD', '05BH007', 'FG', 'KG', '0217', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 'BCW 2,21 MM HARD', '05BH009', 'FG', 'KG', '0221', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, 'BCW 2,28 MM HARD', '05BH014', 'FG', 'KG', '0228', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 'BCW 2,40 MM HARD', '05BH018', 'FG', 'KG', '0240', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 'BCW 2,47 MM HARD', '05BH019', 'FG', 'KG', '0247', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 'BCW 2,52 MM HARD', '05BH022', 'FG', 'KG', '0252', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 'BCW 2,60 MM HARD', '05BH024', 'FG', 'KG', '0260', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 'BCW 2,66 MM HARD', '05BH025', 'FG', 'KG', '0266', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 'BCW 2,68 MM HARD', '05BH026', 'FG', 'KG', '0268', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 'BCW 2,70 MM HARD', '05BH027', 'FG', 'KG', '0270', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 'BCW 2,90 MM HARD', '05BH034', 'FG', 'KG', '0290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 'BCW 2,96 MM HARD', '05BH035', 'FG', 'KG', '0296', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 'BCW 3,00 MM HARD', '05BH037', 'FG', 'KG', '0300', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 'BCW 3,20 MM HARD', '05BH038', 'FG', 'KG', '0320', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 'BCW 3,23 MM HARD', '05BH039', 'FG', 'KG', '0323', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 'BCW 3,40 MM HARD', '05BH040', 'FG', 'KG', '0340', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 'BCW 3,48 MM HARD', '05BH041', 'FG', 'KG', '0348', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 'BCW 3,57 MM HARD', '05BH046', 'FG', 'KG', '0357', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 'BCW  3,00 MM HARD 51', '05BH051', 'FG', 'KG', '0 ,0', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 'BCW 3,29 MM HARD', '05BH052', 'FG', 'KG', '0329', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 'BCW 2,78 MM HARD', '05BH054', 'FG', 'KG', '0278', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 'BCW 2,09 MM HARD', '05BH056', 'FG', 'KG', '0209', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 'BCW 2,10 MM HARD', '05BH057', 'FG', 'KG', '0210', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 'BCW 2,48 MM HARD', '05BH058', 'FG', 'KG', '0248', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 'BCW 2,29 MM HARD', '05BH059', 'FG', 'KG', '0229', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 'BCW 2,56 MM HARD', '05BH060', 'FG', 'KG', '0256', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 'BCW 2,90 MM HARD I', '05BHI34', 'FG', 'KG', '0290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 'BCW 2,56 MM HARD I', '05BHI60', 'FG', 'KG', '0256', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 'BCW 2,78 MM HARD TMS', '05BHT01', 'FG', 'KG', '0278', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 'BCW 2,50 MM HARD TMS', '05BHT02', 'FG', 'KG', '0250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 'BCW 2,90 MM HARD TMS', '05BHT03', 'FG', 'KG', '0290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 'BCW 3,57 MM HARD TMS', '05BHT04', 'FG', 'KG', '0357', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 'BCW 2,00 MM HARD TMS', '05BHT05', 'FG', 'KG', '0200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 'BCW 2,76 MM HARD TMS', '05BHT06', 'FG', 'KG', '0276', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 'BCW 3,57 MM HARD TMS', '05BHT07', 'FG', 'KG', '0357', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 'BCW 2,60 MM HARD TMS', '05BHT08', 'FG', 'KG', '0260', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 'BCW 3,58 MM HARD TMS', '05BHT09', 'FG', 'KG', '0358', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 'BCW 2,77 MM HARD TMS', '05BHT10', 'FG', 'KG', '0277', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 'BCW 2,00 MM SOFT  I', '05BI001', 'FG', 'KG', '0200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 'BCW 2,03 MM SOFT I', '05BI002', 'FG', 'KG', '0203', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 'BCW 2,18 MM SOFT  I', '05BI003', 'FG', 'KG', '0218', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 'BCW 2,10 MM SOFT  I', '05BI004', 'FG', 'KG', '0210', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 'BCW 2,13 MM SOFT I', '05BI005', 'FG', 'KG', '0213', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 'BCW 2,14 MM SOFT  I', '05BI006', 'FG', 'KG', '0214', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 'BCW 2,17 MM SOFT  I', '05BI007', 'FG', 'KG', '0217', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 'BCW 2,20 MM SOFT I', '05BI008', 'FG', 'KG', '0220', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 'BCW 2,21 MM SOFT  I', '05BI009', 'FG', 'KG', '0221', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 'BCW 2,26 MM SOFT I', '05BI010', 'FG', 'KG', '0226', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 'BCW 2,25 MM SOFT I', '05BI011', 'FG', 'KG', '0225', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 'BCW 2,26 MM SOFT I', '05BI012', 'FG', 'KG', '0226', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, 'BCW 2,50 MM SOFT I', '05BI021', 'FG', 'KG', '0250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, 'BCW 2,52 MM SOFT  I', '05BI022', 'FG', 'KG', '0252', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, 'BCW 2,80 MM SOFT I', '05BI032', 'FG', 'KG', '0280', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, 'BCW 2,23 MM SOFT I', '05BI036', 'FG', 'KG', '0223', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, 'BCW 3,50 MM SOFT I', '05BI042', 'FG', 'KG', '0350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, 'BCW 2,45 MM SOFT I', '05BI050', 'FG', 'KG', '0245', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, 'BCW 2,16 MM SOFT I', '05BI060', 'FG', 'KG', '0216', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, 'BCW 2,90 MM HARD I', '05BIH34', 'FG', 'KG', '0290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, 'BCW 2,56 MM HARH I', '05BIH60', 'FG', 'KG', '0256', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, 'BCW 2,00 MM SOFT', '05BS001', 'FG', 'KG', '0200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(206, 'BCW 2,03 MM SOFT', '05BS002', 'FG', 'KG', '0203', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(207, 'BCW 2,18 MM SOFT', '05BS003', 'FG', 'KG', '0218', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(208, 'BCW 2,10 MM SOFT', '05BS004', 'FG', 'KG', '0210', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(209, 'BCW 2,13 MM SOFT', '05BS005', 'FG', 'KG', '0213', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(210, 'BCW 2,14 MM SOFT', '05BS006', 'FG', 'KG', '0214', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(211, 'BCW 2,17 MM SOFT', '05BS007', 'FG', 'KG', '0217', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(212, 'BCW 2,20 MM SOFT', '05BS008', 'FG', 'KG', '0220', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(213, 'BCW 2,21 MM SOFT', '05BS009', 'FG', 'KG', '0221', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(214, 'BCW 2,24 MM SOFT', '05BS010', 'FG', 'KG', '0224', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(215, 'BCW 2,25 MM SOFT', '05BS011', 'FG', 'KG', '0225', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(216, 'BCW 2,26 MM SOFT', '05BS012', 'FG', 'KG', '0226', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(217, 'BCW 2,27 MM SOFT', '05BS013', 'FG', 'KG', '0227', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(218, 'BCW 2,28 MM SOFT', '05BS014', 'FG', 'KG', '0228', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(219, 'BCW 2,30 MM SOFT', '05BS015', 'FG', 'KG', '0230', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(220, 'BCW 2,33 MM SOFT', '05BS016', 'FG', 'KG', '0233', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(221, 'BCW 2,34 MM SOFT', '05BS017', 'FG', 'KG', '0234', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(222, 'BCW 2.43 MM SOFT', '05BS018', 'FG', 'KG', '0243', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(223, 'BCW 2,53 MM SOFT', '05BS019', 'FG', 'KG', '0253', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(224, 'BCW 2,49 MM SOFT', '05BS020', 'FG', 'KG', '0249', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(225, 'BCW 2,50 MM SOFT', '05BS021', 'FG', 'KG', '0250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(226, 'BCW 2,52 MM SOFT', '05BS022', 'FG', 'KG', '0252', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(227, 'BCW 2,59 MM SOFT', '05BS023', 'FG', 'KG', '0259', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(228, 'BCW 2,60 MM SOFT', '05BS024', 'FG', 'KG', '0260', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(229, 'BCW 2,66 MM SOFT', '05BS025', 'FG', 'KG', '0266', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(230, 'BCW 2,70 MM SOFT', '05BS027', 'FG', 'KG', '0270', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(231, 'BCW 2,75 MM SOFT ', '05BS028', 'FG', 'KG', '0275', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(232, 'BCW 2,76 MM SOFT', '05BS029', 'FG', 'KG', '0276', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(233, 'BCW 2,77 MM SOFT', '05BS030', 'FG', 'KG', '0277', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(234, 'BCW 2,78 MM SOFT', '05BS031', 'FG', 'KG', '0278', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(235, 'BCW 2,80 MM SOFT', '05BS032', 'FG', 'KG', '0280', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(236, 'BCW 2,89 MM SOFT', '05BS033', 'FG', 'KG', '0289', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(237, 'BCW 2,73 MM SOFT', '05BS034', 'FG', 'KG', '0273', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(238, 'BCW 2,96 MM SOFT', '05BS035', 'FG', 'KG', '0296', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(239, 'BCW 2,23 MM SOFT', '05BS036', 'FG', 'KG', '0223', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(240, 'BCW 3,00 MM SOFT', '05BS037', 'FG', 'KG', '0300', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(241, 'BCW 3,20 MM SOFT', '05BS038', 'FG', 'KG', '0320', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(242, 'BCW 3,40 MM SOFT', '05BS040', 'FG', 'KG', '0340', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(243, 'BCW 3,48 MM SOFT', '05BS041', 'FG', 'KG', '0348', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(244, 'BCW 3,50 MM SOFT', '05BS042', 'FG', 'KG', '0350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(245, 'BCW 3,52 MM SOFT', '05BS043', 'FG', 'KG', '0352', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(246, 'BCW 3,55 MM SOFT', '05BS044', 'FG', 'KG', '0355', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(247, 'BCW 3,56 MM SOFT', '05BS045', 'FG', 'KG', '0356', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(248, 'BCW 3,57 MM SOFT', '05BS046', 'FG', 'KG', '0357', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(249, 'BCW 3,58 MM SOFT', '05BS047', 'FG', 'KG', '0358', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(250, 'BCW 3,45 MM SOFT', '05BS048', 'FG', 'KG', '0345', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(251, 'BCW 3,51 MM SOFT', '05BS049', 'FG', 'KG', '0351', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(252, 'BCW 2,45 MM SOFT', '05BS050', 'FG', 'KG', '0245', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(253, 'BCW 3,70 MM SOFT', '05BS051', 'FG', 'KG', '0370', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(254, 'BCW 2,07 MM SOFT', '05BS052', 'FG', 'KG', '0207', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(255, 'BCW 2,19 MM SOFT', '05BS053', 'FG', 'KG', '0219', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(256, 'BCW 2,67 MM SOFT', '05BS054', 'FG', 'KG', '0267', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(257, 'BCW 2,40 MM SOFT', '05BS055', 'FG', 'KG', '0240', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(258, 'BCW 2,90 MM SOFT', '05BS056', 'FG', 'KG', '0290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(259, 'BCW 3,60 MM SOFT', '05BS057', 'FG', 'KG', '0360', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(260, 'BCW 2,08 MM SOFT', '05BS058', 'FG', 'KG', '0208', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(261, 'BCW 2,15 MM SOFT', '05BS059', 'FG', 'KG', '0215', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(262, 'BCW 2,16 MM SOFT', '05BS060', 'FG', 'KG', '0216', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(263, 'BCW 2,09 MM SOFT', '05BS061', 'FG', 'KG', '0209', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(264, 'BCW 2,48 MM SOFT', '05BS062', 'FG', 'KG', '0248', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(265, 'BCW 2,65 MM SOFT', '05BS063', 'FG', 'KG', '0265', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(266, 'BCW 2,46 MM SOFT', '05BS064', 'FG', 'KG', '0246', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(267, 'BCW 2,098 MM SOFT', '05BS065', 'FG', 'KG', '0209', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(268, 'BCW 3,31 MM SOFT', '05BS066', 'FG', 'KG', '0331', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(269, 'BCW 2,65 MM SOFT TMS', '05BT006', 'FG', 'KG', '0265', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(270, 'BCW 2,17 MM SOFT TMS', '05BT007', 'FG', 'KG', '0217', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(271, 'BCW 2,26 MM SOFT TMS', '05BT010', 'FG', 'KG', '0226', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(272, 'BCW 2,52 MM SOFT TMS', '05BT022', 'FG', 'KG', '0252', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(273, 'BCW 2,60 MM SOFT TMS', '05BT024', 'FG', 'KG', '0260', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(274, 'BCW 3,57 MM SOFT TMS', '05BT046', 'FG', 'KG', '0357', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(275, 'BCW 3,60 MM SOFT TMS', '05BT049', 'FG', 'KG', '0360', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(276, 'BCW 2,88 MM SOFT TMS', '05BT050', 'FG', 'KG', '0288', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(277, 'BCW 2,07 MM SOFT TMS', '05BT051', 'FG', 'KG', '0207', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(278, 'BCW 2,90 MM SOFT TMS', '05BT054', 'FG', 'KG', '0290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(279, 'BCW 2,23 MM SOFT TMS', '05BT055', 'FG', 'KG', '0223', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(280, 'BCW 2,76 MM SOFT TMS', '05BT056', 'FG', 'KG', '0276', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(281, 'BCW 2,78 MM SOFT TMS', '05BT057', 'FG', 'KG', '0278', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(282, 'BCW 2,96 MM SOFT TMS', '05BT058', 'FG', 'KG', '0296', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(283, 'BCW 2,28 MM SOFT TMS', '05BT059', 'FG', 'KG', '0228', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(284, 'BCW 2,05 MM SOFT TMS', '05BT060', 'FG', 'KG', '0205', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(285, 'BCW 2,53 MM SOFT TMS', '05BT061', 'FG', 'KG', '0253', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(286, 'BCW 2,57 MM SOFT TMS', '05BT062', 'FG', 'KG', '0257', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(287, 'BCW 3,02 MM SOFT TMS', '05BT063', 'FG', 'KG', '0302', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(288, 'BCW 2,17 MM SOFT TMS', '05BT064', 'FG', 'KG', '0217', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(289, 'BCW 2,14 MM SOFT TMS', '05BT065', 'FG', 'KG', '0214', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(290, 'BCW 2,25 MM SOFT TMS', '05BT066', 'FG', 'KG', '0225', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(291, 'BCW 2,39 MM SOFT TMS', '05BT067', 'FG', 'KG', '0239', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(292, 'BCW 3,70 MM SOFT TMS', '05BT068', 'FG', 'KG', '0370', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(293, 'BCW 2,20 MM SOFT TMS', '05BT069', 'FG', 'KG', '0220', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(294, 'BCW 2,27 MM SOFT TMS', '05BT070', 'FG', 'KG', '0227', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(295, 'BCW 3,02 MM SOFT TMS', '05BT071', 'FG', 'KG', '0302', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(296, 'BCW 2,19 MM SOFT TMS', '05BT072', 'FG', 'KG', '0219', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(297, 'BCW 2,21 MM SOFT TMS', '05BT073', 'FG', 'KG', '0221', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(298, 'BCW 2,30 MM SOFT TMS', '05BT074', 'FG', 'KG', '0230', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(299, 'EIW 0,28 MM TYPE 1', '05E0001', 'FG', 'KG', '0028', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(300, 'EIW 1,80 MM TYPE 1', '05E0002', 'FG', 'KG', '0180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(301, 'BCW 0,40 MM HARD', '05HH001', 'FG', 'KG', '0040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(302, 'BCW 0,45 MM HARD', '05HH002', 'FG', 'KG', '0045', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(303, 'BCW 0,47 MM HARD', '05HH003', 'FG', 'KG', '0047', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(304, 'BCW 0,50 MM HARD', '05HH004', 'FG', 'KG', '0050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(305, 'BCW 0,51 MM HARD', '05HH005', 'FG', 'KG', '0051', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(306, 'BCW 0,57 MM HARD', '05HH006', 'FG', 'KG', '0057', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(307, 'BCW 0,59 MM HARD', '05HH007', 'FG', 'KG', '0059', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(308, 'BCW 0,60 MM HARD', '05HH008', 'FG', 'KG', '0060', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(309, 'BCW 0,63 MM HARD', '05HH009', 'FG', 'KG', '0063', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(310, 'BCW 0,65 MM HARD', '05HH010', 'FG', 'KG', '0065', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(311, 'BCW 0,67 MM HARD', '05HH012', 'FG', 'KG', '0067', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(312, 'BCW 0,68 MM HARD', '05HH014', 'FG', 'KG', '0068', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(313, 'BCW 0,70 MM HARD', '05HH015', 'FG', 'KG', '0070', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(314, 'BCW 0,72 MM HARD', '05HH016', 'FG', 'KG', '0072', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(315, 'BCW 0,75 MM HARD', '05HH018', 'FG', 'KG', '0075', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(316, 'BCW 0,77 MM HARD', '05HH019', 'FG', 'KG', '0077', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(317, 'BCW 0,78 MM HARD', '05HH020', 'FG', 'KG', '0078', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(318, 'BCW 0,80 MM HARD', '05HH021', 'FG', 'KG', '0080', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(319, 'BCW 0,83 MM HARD', '05HH022', 'FG', 'KG', '0083', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(320, 'BCW 0,85 MM HARD', '05HH024', 'FG', 'KG', '0085', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(321, 'BCW 0,87 MM HARD', '05HH025', 'FG', 'KG', '0087', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(322, 'BCW 0,89 MM HARD', '05HH026', 'FG', 'KG', '0089', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(323, 'BCW 0,90 MM HARD', '05HH027', 'FG', 'KG', '0090', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(324, 'BCW 0,95 MM HARD', '05HH028', 'FG', 'KG', '0095', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(325, 'BCW 0,73 MM HARD', '05HH029', 'FG', 'KG', '0073', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(326, 'BCW 0,97 MM HARD', '05HH030', 'FG', 'KG', '0097', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(327, 'BCW0,98 MM HARD', '05HH031', 'FG', 'KG', '0,8 ', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(328, 'BCW 0,55 MM HARD', '05HH032', 'FG', 'KG', '0055', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(329, 'BCW 0,93 MM HARD', '05HH049', 'FG', 'KG', '0093', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(330, 'BCW 0,52 MM HARD', '05HH056', 'FG', 'KG', '0052', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(331, 'BCW 0,62 MM HARD', '05HH057', 'FG', 'KG', '0062', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(332, 'BCW 0,82 MM HARD', '05HH058', 'FG', 'KG', '0082', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(333, 'BCW 0,53 MM HARD', '05HH059', 'FG', 'KG', '0053', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(334, 'BCW 0,40 MM SOFT I', '05HI001', 'FG', 'KG', '0040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(335, 'BCW 0,50 MM SOFT I', '05HI004', 'FG', 'KG', '0050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(336, 'BCW 0,60 MM SOFT I', '05HI008', 'FG', 'KG', '0060', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(337, 'BCW 0,70 MM SOFT I', '05HI015', 'FG', 'KG', '0070', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(338, 'BCW 0,80 MM SOFT I', '05HI021', 'FG', 'KG', '0080', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(339, 'BCW 0,35 MM SOFT I', '05HI059', 'FG', 'KG', '0035', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(340, 'BCW 0,50 MM 1/2 HARD', '05HN004', 'FG', 'KG', '0050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(341, 'BCW 0,67 1/2 MM HARD', '05HN012', 'FG', 'KG', '0067', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(342, 'BCW 0,70 MM 1/2 HARD', '05HN015', 'FG', 'KG', '0070', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(343, 'BCW 0,75 MM 1/2 HARD', '05HN018', 'FG', 'KG', '0075', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(344, 'BCW 0,80 MM 1/2 HARD', '05HN021', 'FG', 'KG', '0080', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(345, 'BCW 0,83 MM 1/2 HARD', '05HN022', 'FG', 'KG', '0083', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(346, 'BCW 0,89 MM 1/2 HARD', '05HN026', 'FG', 'KG', '0089', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(347, 'BCW 0,90 MM 1/2 HARD', '05HN027', 'FG', 'KG', '0090', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(348, 'BCW 0,40 MM SOFT', '05HS001', 'FG', 'KG', '0040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(349, 'BCW 0,45 MM SOFT', '05HS002', 'FG', 'KG', '0045', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(350, 'BCW 0,47 MM SOFT', '05HS003', 'FG', 'KG', '0047', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(351, 'BCW 0,50 MM SOFT', '05HS004', 'FG', 'KG', '0050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(352, 'BCW 0,51 MM SOFT', '05HS005', 'FG', 'KG', '0051', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(353, 'BCW 0,57 MM SOFT', '05HS006', 'FG', 'KG', '0057', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(354, 'BCW 0,59 MM SOFT', '05HS007', 'FG', 'KG', '0059', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(355, 'BCW 0,60 MM SOFT', '05HS008', 'FG', 'KG', '0060', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(356, 'BCW 0,63 MM SOFT', '05HS009', 'FG', 'KG', '0063', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(357, 'BCW 0,65 MM SOFT', '05HS010', 'FG', 'KG', '0065', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(358, 'BCW 0,67 MM SOFT', '05HS012', 'FG', 'KG', '0067', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(359, 'BCW 0,68 MM SOFT', '05HS014', 'FG', 'KG', '0068', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(360, 'BCW 0,70 MM SOFT', '05HS015', 'FG', 'KG', '0070', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(361, 'BCW 0,72 MM SOFT', '05HS016', 'FG', 'KG', '0072', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(362, 'BCW 0,74 MM SOFT', '05HS017', 'FG', 'KG', '0074', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(363, 'BCW 0,75 MM SOFT', '05HS018', 'FG', 'KG', '0075', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(364, 'BCW 0,77 MM SOFT', '05HS019', 'FG', 'KG', '0077', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(365, 'BCW 0,78 MM SOFT', '05HS020', 'FG', 'KG', '0078', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(366, 'BCW 0,80 MM SOFT', '05HS021', 'FG', 'KG', '0080', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(367, 'BCW 0,83 MM SOFT', '05HS022', 'FG', 'KG', '0083', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(368, 'BCW 0,84 MM SOFT', '05HS023', 'FG', 'KG', '0084', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(369, 'BCW 0,85 MM SOFT', '05HS024', 'FG', 'KG', '0085', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(370, 'BCW 0,87 MM SOFT', '05HS025', 'FG', 'KG', '0087', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(371, 'BCW 0,89 MM SOFT', '05HS026', 'FG', 'KG', '0089', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(372, 'BCW 0,90 MM SOFT', '05HS027', 'FG', 'KG', '0090', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(373, 'BCW 0,95 MM SOFT', '05HS028', 'FG', 'KG', '0095', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(374, 'BCW 0,73 MM SOFT', '05HS029', 'FG', 'KG', '0073', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(375, 'BCW 0,97 MM SOFT', '05HS030', 'FG', 'KG', '0097', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(376, 'BCW 0,98 MM SOFT', '05HS031', 'FG', 'KG', '0098', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(377, 'BCW 0,53 MM SOFT', '05HS032', 'FG', 'KG', '0053', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(378, 'BCW 0,54 MM SOFT', '05HS057', 'FG', 'KG', '0054', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(379, 'BCW 0,55 MM SOFT', '05HS058', 'FG', 'KG', '0055', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(380, 'BCW 0,35 MM SOFT', '05HS059', 'FG', 'KG', '0035', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(381, 'BCW 0,81 MM SOFT', '05HS060', 'FG', 'KG', '0081', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(382, 'BCW 0,76 MM SOFT', '05HS061', 'FG', 'KG', '0076', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(383, 'BCW 0,52 MM SOFT', '05HS062', 'FG', 'KG', '0052', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(384, 'BCW 0,495 MM SOFT', '05HS063', 'FG', 'KG', '0049', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(385, 'BCW 0,40 MM TMS SOFT', '05HT001', 'FG', 'KG', '0040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(386, 'BCW 0,85 MM TMS SOFT', '05HT002', 'FG', 'KG', '0085', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(387, 'BCW 0,50 MM TMS SOFT', '05HT004', 'FG', 'KG', '0050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(388, 'BCW 0.51 MM TMS SOFT', '05HT005', 'FG', 'KG', '0051', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(389, 'BCW 0,60 MM TMS SOFT ', '05HT008', 'FG', 'KG', '0060', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(390, 'BCW 0,80 MM TMS SOFT', '05HT021', 'FG', 'KG', '0080', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(391, 'BCW 0,87 MM TMS SOFT', '05HT025', 'FG', 'KG', '0087', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(392, 'BCW 0,55 MM TMS SOFT', '05HT032', 'FG', 'KG', '0055', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(393, 'BCW 0,41 MM TMS', '05HT056', 'FG', 'KG', '0041', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(394, 'BCW 0,63 MM TMS SOFT', '05HT063', 'FG', 'KG', '0063', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(395, 'BCW 0,61 MM TMS SOFT', '05HT064', 'FG', 'KG', '0061', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(396, 'BCW 0,67 MM TMS SOFT', '05HT065', 'FG', 'KG', '0067', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(397, 'PEW 0,28 MM (TYPE 1)', '05P0001', 'FG', 'KG', '0028', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(398, 'PEW 2,50 MM', '05P0002', 'FG', 'KG', '0250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(399, 'PEW 0,50 MM TYPE 2', '05P0003', 'FG', 'KG', '0050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(400, 'BCW 0,10 MM HARD', '05RH001', 'FG', 'KG', '0010', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(401, 'BCW 0,11 MM HARD', '05RH002', 'FG', 'KG', '0011', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(402, 'BCW 0,12 MM HARD', '05RH003', 'FG', 'KG', '0012', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(403, 'BCW 0,14 MM HARD', '05RH004', 'FG', 'KG', '0014', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(404, 'BCW 0,14 MM 1/2 HARD', '05RH005', 'FG', 'KG', '0014', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(405, 'BCW 0,16 MM HARD', '05RH007', 'FG', 'KG', '0016', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(406, 'BCW 0,17 MM HARD', '05RH008', 'FG', 'KG', '0017', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(407, 'BCW 0,18 MM HARD', '05RH009', 'FG', 'KG', '0018', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(408, 'BCW 0,24 MM HARD', '05RH014', 'FG', 'KG', '0024', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(409, 'BCW 0,10 MM HARD TMS', '05RHT01', 'FG', 'KG', '0010', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(410, 'BCW 0,11 MM HARD TMS', '05RHT02', 'FG', 'KG', '0011', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(411, 'BCW 0,80 MM HARD TMS', '05RHT03', 'FG', 'KG', '0080', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(412, 'BCW 0,18 MM SOFT I', '05RI009', 'FG', 'KG', '0018', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(413, 'BCW 0,20 MM SOFT I', '05RI010', 'FG', 'KG', '0020', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(414, 'BCW 0,25 MM SOFT I', '05RI015', 'FG', 'KG', '0025', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(415, 'BCW 0,255 MM SOFT I', '05RI017', 'FG', 'KG', '0025', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(416, 'BCW 0,31 MM SOFT I', '05RI021', 'FG', 'KG', '0031', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(417, 'BCW 0,32 MM SOFT I', '05RI022', 'FG', 'KG', '0032', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(418, 'BCW 0,40 MM SOFT I', '05RI053', 'FG', 'KG', '0040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(419, 'BCW 0,50 MM SOFT I', '05RI054', 'FG', 'KG', '0050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(420, 'BCW 0,11 MM HARD I', '05RIH02', 'FG', 'KG', '0011', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(421, 'BCW 0,17 MM HARD I', '05RIH08', 'FG', 'KG', '0017', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(422, 'BCW 0,16 MM 1/2 HARD', '05RN007', 'FG', 'KG', '0016', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(423, 'BCW 0,18 MM 1/2 HARD', '05RN009', 'FG', 'KG', '0018', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(424, 'BCW 0,10 MM SOFT', '05RS001', 'FG', 'KG', '0010', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(425, 'BCW 0,11 MM SOFT', '05RS002', 'FG', 'KG', '0011', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(426, 'BCW 0,12 MM SOFT', '05RS003', 'FG', 'KG', '0012', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(427, 'BCW 0,13 MM SOFT', '05RS004', 'FG', 'KG', '0013', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(428, 'BCW 0,14 MM SOFT', '05RS005', 'FG', 'KG', '0014', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(429, 'BCW 0,15 MM SOFT', '05RS006', 'FG', 'KG', '0015', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(430, 'BCW 0,16 MM SOFT', '05RS007', 'FG', 'KG', '0016', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(431, 'BCW 0,17 MM SOFT', '05RS008', 'FG', 'KG', '0017', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(432, 'BCW 0,18 MM SOFT', '05RS009', 'FG', 'KG', '0018', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(433, 'BCW 0,20 MM SOFT', '05RS010', 'FG', 'KG', '0020', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(434, 'BCW 0,21 MM SOFT', '05RS011', 'FG', 'KG', '0021', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(435, 'BCW 0,22 MM SOFT', '05RS012', 'FG', 'KG', '0022', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(436, 'BCW 0,23 MM SOFT', '05RS013', 'FG', 'KG', '0023', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(437, 'BCW 0,24 MM SOFT', '05RS014', 'FG', 'KG', '0024', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(438, 'BCW 0,25 MM SOFT', '05RS015', 'FG', 'KG', '0025', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(439, 'BCW 0,251 MM SOFT', '05RS016', 'FG', 'KG', '0025', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(440, 'BCW 0,255 MM SOFT', '05RS017', 'FG', 'KG', '0025', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(441, 'BCW 0,26 MM SOFT', '05RS018', 'FG', 'KG', '0026', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(442, 'BCW 0,29 MM SOFT', '05RS019', 'FG', 'KG', '0029', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(443, 'BCW 0,30 MM SOFT', '05RS020', 'FG', 'KG', '0030', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(444, 'BCW 0,31 MM SOFT', '05RS021', 'FG', 'KG', '0031', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(445, 'BCW 0,32 MM SOFT', '05RS022', 'FG', 'KG', '0032', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(446, 'BCW 0,35 MM SOFT', '05RS052', 'FG', 'KG', '0035', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(447, 'BCW 0,40 MM SOFT', '05RS053', 'FG', 'KG', '0040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(448, 'BCW 0,50 MM SOFT', '05RS054', 'FG', 'KG', '0050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(449, 'BCW 0,19 MM SOFT', '05RS055', 'FG', 'KG', '0019', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(450, 'BCW 0,10 MM TMS SOFT', '05RT001', 'FG', 'KG', '0010', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(451, 'BCW 0,11 MM TMS SOFT', '05RT002', 'FG', 'KG', '0011', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(452, 'BCW 0,12 MM TMS SOFT', '05RT003', 'FG', 'KG', '0012', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(453, 'BCW 0,13 MM TMS SOFT', '05RT004', 'FG', 'KG', '0013', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(455, 'BCW 0,15 MM TMS SOFT', '05RT006', 'FG', 'KG', '0015', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(456, 'BCW 0,16 MM TMS SOFT NEW', '05RT007', 'FG', 'KG', '0016', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(457, 'BCW 0,17 MM TMS SOFT', '05RT008', 'FG', 'KG', '0017', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(458, 'BCW 0,18 MM TMS SOFT', '05RT009', 'FG', 'KG', '0018', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(459, 'BCW 0,20 MM TMS SOFT', '05RT010', 'FG', 'KG', '0020', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(460, 'BCW 0,21 MM TMS SOFT', '05RT011', 'FG', 'KG', '0021', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(461, 'BCW 0,22 MM TMS SOFT', '05RT012', 'FG', 'KG', '0022', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(462, 'BCW 0,23 MM TMS SOFT', '05RT013', 'FG', 'KG', '0023', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(463, 'BCW 0,24 MM TMS SOFT', '05RT014', 'FG', 'KG', '0024', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(464, 'BCW 0,25 MM TMS SOFT', '05RT015', 'FG', 'KG', '0025', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(465, 'BCW 0,251 MM TMS SOFT', '05RT016', 'FG', 'KG', '0025', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(466, 'BCW 0,255 MM  TMS SOFT', '05RT017', 'FG', 'KG', '0025', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(467, 'BCW 0,26 MM TMS SOFT', '05RT018', 'FG', 'KG', '0026', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(468, 'BCW 0,29 MM TMS SOFT', '05RT019', 'FG', 'KG', '0029', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(469, 'BCW 0,30 MM TMS SOFT', '05RT020', 'FG', 'KG', '0030', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(470, 'BCW 0,31 MM TMS SOFT', '05RT021', 'FG', 'KG', '0031', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(471, 'BCW 0,32 MM TMS SOFT', '05RT022', 'FG', 'KG', '0032', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(472, 'BCW 0,35 MM TMS SOFT', '05RT052', 'FG', 'KG', '0035', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(473, 'BCW 0,40 MM TMS SOFT', '05RT055', 'FG', 'KG', '0040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(474, 'BCW 0,50 MM TMS SOFT', '05RT056', 'FG', 'KG', '0050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(475, 'BCW 0,41 MM TMS SOFT', '05RT057', 'FG', 'KG', '0041', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(476, 'BCW 0,252 MM TMS SOFT', '05RT058', 'FG', 'KG', '0025', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(477, 'BCW 0,175 MM TMS SOFT', '05RT059', 'FG', 'KG', '0017', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(478, 'BCW 0,155 MM TMS SOFT', '05RT060', 'FG', 'KG', '0015', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(479, 'BCW 0,82 MM TMS SOFT', '05RT061', 'FG', 'KG', '0082', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(480, 'BCW 0,19 MM TMS SOFT', '05RT062', 'FG', 'KG', '0019', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(481, 'BCW 1,78 MM TMS HARD', '05TD001', 'FG', 'KG', '0178', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(482, 'BCW 1,00 MM HARD', '05TH001', 'FG', 'KG', '0100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(483, 'BCW 1,05 mm HARD', '05TH002', 'FG', 'KG', '0105', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(484, 'BCW 1,04 MM HARD', '05TH004', 'FG', 'KG', '0104', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(485, 'BCW 1,10 MM HARD', '05TH008', 'FG', 'KG', '0110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(486, 'BCW 1,17 MM 1/2 HARD', '05TH010', 'FG', 'KG', '0117', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(487, 'BCW 1,25 MM HARD', '05TH014', 'FG', 'KG', '0125', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(488, 'BCW 1,40 MM HARD', '05TH022', 'FG', 'KG', '0140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(489, 'BCW 1,42 MM HARD', '05TH023', 'FG', 'KG', '0142', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(490, 'BCW 1,53 MM HARD', '05TH024', 'FG', 'KG', '0153', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(491, 'BCW 1,55 MM HARD', '05TH027', 'FG', 'KG', '0155', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(492, 'BCW 1,65 MM HARD', '05TH032', 'FG', 'KG', '0165', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(493, 'BCW 1,66 MM HARD', '05TH033', 'FG', 'KG', '0166', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(494, 'BCW 1,15 MM HARD', '05TH034', 'FG', 'KG', '0115', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(495, 'BCW 1,83 MM HARD', '05TH045', 'FG', 'KG', '0183', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(496, 'BCW 1,94 MM HARD', '05TH046', 'FG', 'KG', '0194', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(497, 'BCW 1,31 MM HARD', '05TH053', 'FG', 'KG', '0131', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(498, 'BCW 1,12 MM HARD', '05TH054', 'FG', 'KG', '0112', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(499, 'BCW 1,45 MM HARD', '05TH055', 'FG', 'KG', '0145', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(500, 'BCW 1,07 MM HARD', '05TH056', 'FG', 'KG', '0107', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(501, 'BCW 1,45 MM 1/2 HARD', '05TH057', 'FG', 'KG', '0145', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(502, 'BCW 1,17 MM HARD', '05TH058', 'FG', 'KG', '0117', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(503, 'BCW 1,52 MM HARD', '05TH059', 'FG', 'KG', '0152', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(504, 'BCW 1,92 MM HARD', '05TH061', 'FG', 'KG', '0192', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(505, 'BCW 1,00 MM SOFT  I', '05TI001', 'FG', 'KG', '0100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(506, 'BCW 1,08 MM SOFT  I', '05TI007', 'FG', 'KG', '0108', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(507, 'BCW 1,10 MM SOFT  I', '05TI008', 'FG', 'KG', '0110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(508, 'BCW 1,20 MM SOFT  I', '05TI012', 'FG', 'KG', '0120', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(509, 'BCW 1,25 MM SOFT  I', '05TI014', 'FG', 'KG', '0125', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(510, 'BCW 1,30 MM SOFT  I', '05TI016', 'FG', 'KG', '0130', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(511, 'BCW 1,35 MM SOFT  I', '05TI017', 'FG', 'KG', '0135', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(512, 'BCW 1,36 MM SOFT  I', '05TI018', 'FG', 'KG', '0136', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(513, 'BCW 1,38 MM SOFT  I', '05TI020', 'FG', 'KG', '0138', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(514, 'BCW 1,40 MM SOFT  I', '05TI022', 'FG', 'KG', '0140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(515, 'BCW 1,50 MM SOFT  I', '05TI026', 'FG', 'KG', '0150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(516, 'BCW 1,60 MM SOFT  I', '05TI030', 'FG', 'KG', '0160', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(517, 'BCW 1,70 MM SOFT  I', '05TI036', 'FG', 'KG', '0170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(518, 'BCW 1,75 MM SOFT  I', '05TI039', 'FG', 'KG', '0175', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(519, 'BCW 1,76 MM SOFT  I', '05TI040', 'FG', 'KG', '0176', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(520, 'BCW 1,78 MM SOFT  I', '05TI042', 'FG', 'KG', '0178', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(521, 'BCW 1,05 MM SOFT I', '05TI043', 'FG', 'KG', '0105', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(522, 'BCW 0,40 MM 1/2 HARD', '05TN001', 'FG', 'KG', '0040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(523, 'BCW 1,10 MM 1/2 HARD', '05TN008', 'FG', 'KG', '0110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(524, 'BCW 1,15 MM 1/2 HARD', '05TN009', 'FG', 'KG', '0115', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(525, 'BCW 1,17 MM 1/2 HARD', '05TN010', 'FG', 'KG', '0117', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(526, 'BCW 1,20 MM 1/2 HARD', '05TN012', 'FG', 'KG', '0120', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(527, 'BCW  ', '05TN020', 'FG', 'KG', '0 ', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(528, 'BCW 1,57 MM 1/2 HARD', '05TN028', 'FG', 'KG', '0157', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(529, 'BCW 1,60 MM 1/2 HARD', '05TN030', 'FG', 'KG', '0160', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(530, 'BCW 1,00 MM SOFT', '05TS001', 'FG', 'KG', '0100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(531, 'BCW 1,015 MM SOFT', '05TS002', 'FG', 'KG', '0101', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(532, 'BCW 1,02 MM SOFT', '05TS003', 'FG', 'KG', '0102', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(533, 'BCW 1,04 MM SOFT', '05TS004', 'FG', 'KG', '0104', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(534, 'BCW 1,05 MM SOFT', '05TS005', 'FG', 'KG', '0105', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(535, 'BCW 1,07 MM SOFT', '05TS006', 'FG', 'KG', '0107', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(536, 'BCW 1,08 MM SOFT', '05TS007', 'FG', 'KG', '0108', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(537, 'BCW 1,10 MM SOFT ', '05TS008', 'FG', 'KG', '0110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(538, 'BCW 1,15 MM SOFT', '05TS009', 'FG', 'KG', '0115', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(539, 'BCW 1,06 MM SOFT', '05TS010', 'FG', 'KG', '0106', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(540, 'BCW 1,20 MM SOFT', '05TS012', 'FG', 'KG', '0120', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(541, 'BCW 1,24 MM SOFT', '05TS013', 'FG', 'KG', '0124', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(542, 'BCW 1,25 MM SOFT', '05TS014', 'FG', 'KG', '0125', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(543, 'BCW 1,27 MM SOFT ', '05TS015', 'FG', 'KG', '0127', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(544, 'BCW 1,30 MM SOFT', '05TS016', 'FG', 'KG', '0130', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(545, 'BCW 1,35 MM SOFT', '05TS017', 'FG', 'KG', '0135', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(546, 'BCW 1,36 MM SOFT', '05TS018', 'FG', 'KG', '0136', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(547, 'BCW 1,37 MM SOFT', '05TS019', 'FG', 'KG', '0137', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(548, 'BCW 1,38 MM SOFT', '05TS020', 'FG', 'KG', '0138', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(549, 'BCW 1,39 MM SOFT', '05TS021', 'FG', 'KG', '0139', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(550, 'BCW 1,40 MM SOFT', '05TS022', 'FG', 'KG', '0140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(551, 'BCW 1,42 MM SOFT', '05TS023', 'FG', 'KG', '0142', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(552, 'BCW 1,43 MM SOFT', '05TS024', 'FG', 'KG', '0143', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(553, 'BCW 1,46 MM SOFT', '05TS025', 'FG', 'KG', '0146', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(554, 'BCW 1,50 MM SOFT', '05TS026', 'FG', 'KG', '0150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(555, 'BCW 1,59 MM SOFT', '05TS029', 'FG', 'KG', '0159', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(556, 'BCW 1,60 MM SOFT', '05TS030', 'FG', 'KG', '0160', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(557, 'BCW 1,63 MM SOFT', '05TS031', 'FG', 'KG', '0163', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(558, 'BCW 1,65 MM SOFT', '05TS032', 'FG', 'KG', '0165', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(559, 'BCW 1,66 MM SOFT', '05TS033', 'FG', 'KG', '0166', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(560, 'BCW 1,68 MM SOFT', '05TS035', 'FG', 'KG', '0168', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(561, 'BCW 1,70 MM SOFT', '05TS036', 'FG', 'KG', '0170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(562, 'BCW 1,71 MM SOFT', '05TS037', 'FG', 'KG', '0171', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(563, 'BCW 1,74 MM SOFT', '05TS038', 'FG', 'KG', '0174', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(564, 'BCW 1,75 MM SOFT', '05TS039', 'FG', 'KG', '0175', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(565, 'BCW 1,76 MM SOFT', '05TS040', 'FG', 'KG', '0176', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(566, 'BCW 1,77 MM SOFT', '05TS041', 'FG', 'KG', '0177', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `jenis_barang` (`id`, `jenis_barang`, `kode`, `category`, `uom`, `ukuran`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(567, 'BCW 1,78 MM SOFT', '05TS042', 'FG', 'KG', '0178', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(568, 'BCW 1,79 MM SOFT', '05TS043', 'FG', 'KG', '0179', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(569, 'BCW 1,80 MM SOFT', '05TS044', 'FG', 'KG', '0180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(570, 'BCW 1,83 MM SOFT', '05TS045', 'FG', 'KG', '0183', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(571, 'BCW 1,85 MM SOFT', '05TS046', 'FG', 'KG', '0185', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(572, 'BCW 1,84 MM SOFT', '05TS047', 'FG', 'KG', '0184', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(573, 'BCW 1,45 MM SOFT', '05TS055', 'FG', 'KG', '0145', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(574, 'BCW 1,81 MM SOFT', '05TS056', 'FG', 'KG', '0181', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(575, 'BCW 1,73 MM SOFT', '05TS057', 'FG', 'KG', '0173', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(576, 'BCW 1,21 MM SOFT', '05TS058', 'FG', 'KG', '0121', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(577, 'BCW 1,18 MM SOFT', '05TS059', 'FG', 'KG', '0118', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(578, 'BCW 1,89 MM SOFT', '05TS060', 'FG', 'KG', '0189', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(579, 'BCW 1,90 MM SOFT', '05TS061', 'FG', 'KG', '0190', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(580, 'BCW 1,28 MM SOFT', '05TS062', 'FG', 'KG', '0128', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(581, 'BCW 1,52 MM SOFT', '05TS063', 'FG', 'KG', '0152', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(582, 'BCW 1,92 MM SOFT', '05TS064', 'FG', 'KG', '0192', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(583, 'BCW 1,34 MM SOFT', '05TS065', 'FG', 'KG', '0134', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(584, 'BCW 1,00 MM SOFT TMS', '05TT001', 'FG', 'KG', '0100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(585, 'BCW 1,05 MM SOFT TMS', '05TT005', 'FG', 'KG', '0105', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(586, 'BCW 1,10 MM SOFT TMS', '05TT008', 'FG', 'KG', '0110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(587, 'BCW 1,20 MM TMS', '05TT012', 'FG', 'KG', '0120', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(588, 'BCW 1,38 MM SOFT TMS', '05TT020', 'FG', 'KG', '0138', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(589, 'BCW 1,40 MM TMS', '05TT022', 'FG', 'KG', '0140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(590, 'BCW 1,42 MM TMS', '05TT023', 'FG', 'KG', '0142', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(591, 'BCW 1,43 MM TMS SOFT', '05TT024', 'FG', 'KG', '0143', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(592, 'BCW 1,50 MM SOFT TMS', '05TT026', 'FG', 'KG', '0150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(593, 'BCW 1,79 MM SOFT TMS', '05TT043', 'FG', 'KG', '0179', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(594, 'BCW 1,80 MM TMS', '05TT044', 'FG', 'KG', '0180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(595, 'BCW 1,78 MM SOFT TMS', '05TT045', 'FG', 'KG', '0178', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(596, 'BCW 1,35 MM SOFT TMS', '05TT046', 'FG', 'KG', '0135', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(597, 'BCW 1,02 MM SOFT TMS', '05TT048', 'FG', 'KG', '0102', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(598, 'BCW 1,43 MM SOFT TMS', '05TT049', 'FG', 'KG', '0143', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(599, 'BCW 1,84 MM SOFT TMS', '05TT050', 'FG', 'KG', '0184', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(600, 'BCW 1,71 MM SOFT TMS', '05TT051', 'FG', 'KG', '0171', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(601, 'BCW 1,92 MM SOFT TMS', '05TT052', 'FG', 'KG', '0192', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(602, 'BCW 1,36 MM SOFT TMS', '05TT053', 'FG', 'KG', '0136', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(603, 'BCW 1,75 MM SOFT TMS', '05TT054', 'FG', 'KG', '0175', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(604, 'BCW 1,76 MM SOFT TMS', '05TT055', 'FG', 'KG', '0176', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(605, 'BCW 1,73 MM SOFT TMS', '05TT056', 'FG', 'KG', '0173', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(606, 'BCW 1,53 MM SOFT TMS', '05TT060', 'FG', 'KG', '0153', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(607, 'BCW 1,55 MM SOFT TMS', '05TT061', 'FG', 'KG', '0155', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(608, 'BCW 1,37 MM SOFT TMS', '05TT062', 'FG', 'KG', '0137', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(609, 'BCW 1,74 MM SOFT TMS', '05TT063', 'FG', 'KG', '0174', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(610, 'BCW 1,85 MM SOFT TMS', '05TT064', 'FG', 'KG', '0185', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(611, 'UEW 0,40 MM (TYPE 1)', '05U0001', 'FG', 'KG', '0040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(612, 'UEW 0,90 MM (TYPE 1)', '05U0002', 'FG', 'KG', '0090', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(613, 'UEW 0,95 MM (TYPE1)', '05U0003', 'FG', 'KG', '0095', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(614, 'UEW 1,40 MM (TYPE 1)', '05U0004', 'FG', 'KG', '0140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(615, 'UEW 0,37 MM ', '05U0005', 'FG', 'KG', '0037', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(616, 'UEW 1,00 MM (TYPE 1)', '05U0006', 'FG', 'KG', '0100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(652, 'BCW 2,90 MM SOFT TMS', '04BT054', 'WIP', 'KG', '0290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(653, 'COPPER ROD 8,00 MM KERAS', '04C0001', 'WIP', 'KG', '0E R', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(654, 'COPPER ROD 8,00 MM CUCI', '04C0003', 'WIP', 'KG', '0E R', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(655, 'COPPER ROD 8,00 MM TMS', '04C0004', 'WIP', 'KG', '0E R', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(656, 'COPPER ROD 8,00 MM', '04C0006', 'WIP', 'KG', '0E R', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(657, 'COPPER ROD 8,00 MM TMS PRYSMIAN', '04C0007', 'WIP', 'KG', '0E R', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(658, 'COPPER ROD 8,00 MM MTU', '04C0008', 'WIP', 'KG', '0E R', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(659, 'COPPER ROD 20 MM', '04C0009', 'WIP', 'KG', '0E R', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(660, 'COPPER ROD 20 MM CUCI', '04C0010', 'WIP', 'KG', '0E R', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(661, 'COPPER WIRE 15 MM', '04C0011', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(662, 'COPPER WIRE 17,5 MM', '04C0012', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(663, 'COPPER WIRE 13,5 MM', '04C0013', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(664, 'COPPER WIRE 2,80 MM', '04C0014', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(665, 'COPPER WIRE 15,5 MM', '04C0015', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(666, 'COPPER WIRE 0,20 MM', '04C0016', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(667, 'COP 8,00 MM BAKAR ULANG', '04C0017', 'WIP', 'KG', '0800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(668, 'COP 8,00 MM CUCI BAKAR ULANG', '04C0018', 'WIP', 'KG', '0800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(669, 'COPPER WIRE 0,25 MM', '04C0019', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(670, 'COPPER WIRE 1,75 MM TMS', '04C0022', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(671, 'COPPER WIRE 1,76 MM TMS', '04C0023', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(672, 'COPPER WIRE 0,12 MM', '04CW012', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(673, 'COPPER WIRE 0,67 MM', '04CW067', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(674, 'COPPER WIRE 1,38 MM', '04CW138', 'WIP', 'KG', '0E W', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(675, 'TALI CUCI', '04T0001', 'WIP', 'KG', '0 UC', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(1, 'BPB.201812.0001', '2018-12-28', 1, '', 'JOHN', '2018-12-28 02:12:17', 1, '2018-12-28 02:12:17', 1),
(2, 'BPB.201812.0002', '2018-12-28', 2, '', 'BELLO', '2018-12-28 02:12:07', 1, '2018-12-28 02:12:07', 1),
(3, 'BPB.201812.0003', '2018-12-28', 2, '', 'BELLON', '2018-12-28 02:12:16', 1, '2018-12-28 02:12:16', 1),
(4, 'BPB.201901.0001', '2019-01-08', 3, '', 'JOHN', '2019-01-08 01:01:35', 1, '2019-01-08 01:01:35', 1),
(5, 'BPB.201901.0002', '2019-01-15', 12, '', 'BELLO', '2019-01-15 01:01:50', 1, '2019-01-15 01:01:50', 1),
(6, 'BPB.201901.0003', '2019-01-15', 12, '', 'BELLON2', '2019-01-15 01:01:32', 1, '2019-01-15 01:01:32', 1),
(7, 'BPB.201901.0004', '2019-01-15', 13, '', 'JOHN2', '2019-01-15 01:01:21', 1, '2019-01-15 01:01:21', 1),
(8, 'BPB.201901.0005', '2019-01-15', 14, '', 'JOHN', '2019-01-15 02:01:50', 1, '2019-01-15 02:01:50', 1),
(9, 'BPB.201901.0006', '2019-01-15', 15, '', 'JOHN', '2019-01-15 02:01:10', 1, '2019-01-15 02:01:10', 1),
(10, 'BPB.201901.0007', '2019-01-15', 15, '', 'JOHN2', '2019-01-15 02:01:16', 1, '2019-01-15 02:01:16', 1),
(11, 'BPB.201901.0008', '2019-01-21', 19, '', 'BELLO', '2019-01-21 11:01:45', 1, '2019-01-21 11:01:45', 1),
(12, 'BPB.201901.0009', '2019-01-21', 19, '', 'BELLO', '2019-01-21 07:01:12', 1, '2019-01-21 07:01:12', 1),
(13, 'BPB.201901.0010', '2019-01-22', 20, '', 'BELLO', '2019-01-22 10:01:43', 1, '2019-01-22 10:01:43', 1),
(14, 'BPB.201901.0011', '2019-01-22', 20, '', 'BELLO2', '2019-01-22 11:01:53', 1, '2019-01-22 11:01:53', 1),
(15, 'BPB.201902.0001', '2019-02-11', 31, '', 'BELLO', '2019-02-11 05:02:54', 7, '2019-02-11 05:02:54', 7),
(16, 'BPB.201902.0002', '2019-02-11', 32, '', 'JOHN', '2019-02-11 05:02:47', 6, '2019-02-11 05:02:47', 6),
(17, 'BPB.201902.0003', '2019-02-11', 33, '', 'JOHN2', '2019-02-11 05:02:10', 7, '2019-02-11 05:02:10', 7),
(18, 'BPB.201902.0004', '2019-02-11', 33, '', 'BELLON', '2019-02-11 05:02:38', 7, '2019-02-11 05:02:38', 7);

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
(1, 1, 1, 2, 25, ''),
(2, 1, 2, 1, 40, ''),
(3, 2, 3, 122, 4, ''),
(4, 2, 4, 104, 4, ''),
(5, 3, 4, 104, 4, ''),
(6, 3, 5, 1724, 8, ''),
(7, 4, 6, 1722, 4, 'TEST FLAG'),
(8, 5, 36, 1730, 4, ''),
(9, 6, 36, 1730, 2, ''),
(10, 7, 37, 2, 9, ''),
(11, 8, 38, 1731, 10, ''),
(12, 9, 39, 1733, 8, ''),
(13, 10, 39, 1733, 4, ''),
(14, 11, 54, 1731, 5, ''),
(15, 12, 54, 1731, 5, ''),
(16, 13, 55, 1733, 10, ''),
(17, 14, 55, 1733, 12, ''),
(18, 15, 85, 1508, 6, ''),
(19, 16, 86, 880, 10, ''),
(20, 17, 87, 2668, 10, ''),
(21, 18, 87, 2668, 5, '');

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
(13, 1, 'MApolo'),
(14, 13, 'index'),
(15, 13, 'add'),
(16, 13, 'edit'),
(17, 13, 'delete'),
(18, 1, 'MCost'),
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
(33, 1, 'MGroupCost'),
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
(128, 111, 'close_po'),
(129, 111, 'po_list'),
(130, 111, 'create_po'),
(131, 111, 'create_voucher_dp'),
(132, 111, 'print_po'),
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
(227, 1, 'Retur'),
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
(247, 227, 'reject'),
(248, 72, 'revisi_dtr'),
(249, 111, 'matching'),
(250, 111, 'spb_list'),
(251, 1, 'GudangFG'),
(252, 251, 'index'),
(253, 251, 'add'),
(254, 251, 'delete'),
(255, 251, 'edit'),
(256, 251, 'view_spb'),
(257, 251, 'approve_spb'),
(258, 251, 'reject_spb'),
(259, 251, 'spb_list'),
(260, 251, 'print_spb'),
(261, 111, 'add_spb'),
(262, 111, 'dtt_list'),
(263, 1, 'BeliFinishGood'),
(264, 1, 'BeliWIP'),
(265, 263, 'index'),
(266, 264, 'index'),
(267, 263, 'add'),
(268, 263, 'delete'),
(269, 263, 'edit'),
(270, 264, 'add'),
(271, 264, 'delete'),
(272, 264, 'edit'),
(273, 263, 'create_voucher_dp'),
(274, 263, 'print_po'),
(275, 263, 'dtbj_list'),
(276, 263, 'create_dtbj'),
(277, 263, 'close_po'),
(278, 263, 'print_dtbj'),
(279, 263, 'matching'),
(280, 206, 'index'),
(281, 206, 'add'),
(282, 206, 'create_spb'),
(283, 206, 'spb_list'),
(284, 206, 'view_spb'),
(285, 206, 'print_spb'),
(286, 206, 'save_spb'),
(287, 206, 'approve_spb'),
(288, 206, 'reject_spb'),
(289, 206, 'hasil_produksi'),
(290, 206, 'add_produksi'),
(291, 206, 'edit'),
(292, 1, 'GudangWIP'),
(293, 292, 'index'),
(294, 292, 'spb_list'),
(295, 292, 'add_spb'),
(296, 292, 'view_spb'),
(297, 292, 'print_spb'),
(298, 292, 'edit'),
(299, 292, 'bpb_list'),
(300, 292, 'edit_bpb'),
(301, 292, 'print_bpb'),
(302, 292, 'approve_spb'),
(303, 292, 'reject_spb'),
(304, 292, 'add'),
(305, 292, 'hasil_produksi'),
(306, 251, 'create_spb'),
(307, 251, 'bpb_list'),
(308, 251, 'produksi'),
(309, 251, 'edit_bpb'),
(310, 251, 'print_bpb'),
(311, 1, 'GudangBobbin'),
(312, 311, 'index'),
(313, 311, 'add'),
(314, 311, 'view'),
(315, 311, 'spb_list'),
(316, 311, 'add_spb'),
(317, 311, 'view_spb'),
(318, 311, 'approve_spb'),
(319, 311, 'print'),
(320, 311, 'edit'),
(321, 311, 'delete'),
(322, 311, 'reject_spb'),
(323, 1, 'SalesOrder'),
(324, 323, 'index'),
(325, 323, 'add'),
(326, 323, 'edit_so'),
(327, 323, 'view_so'),
(328, 323, 'spb_list'),
(329, 323, 'view_spb'),
(330, 323, 'surat_jalan'),
(331, 323, 'add_surat_jalan'),
(332, 323, 'edit_surat_jalan'),
(333, 323, 'revisi_surat_jalan'),
(334, 323, 'print_so'),
(335, 323, 'print_surat_jalan'),
(336, 323, 'print_spb'),
(337, 323, 'view_surat_jalan'),
(338, 323, 'approve_sj'),
(339, 323, 'reject_sj'),
(340, 1, 'Finance'),
(341, 340, 'index'),
(342, 340, 'add_invoice'),
(343, 340, 'add_um'),
(344, 340, 'view_um'),
(345, 340, 'print_um'),
(346, 340, 'edit_um'),
(347, 340, 'reject_um'),
(348, 340, 'view_invoice'),
(349, 340, 'print_invoice'),
(350, 340, 'approve_pmb'),
(351, 340, 'add_pmb'),
(352, 340, 'view_pmb'),
(353, 340, 'matching'),
(354, 340, 'input_invoice'),
(355, 340, 'list_kas'),
(356, 340, 'add_kas'),
(357, 340, 'view_kas'),
(358, 340, 'voucher_list'),
(359, 340, 'view_vc'),
(360, 227, 'view_retur'),
(361, 227, 'print_retur'),
(362, 227, 'create_invoice'),
(363, 227, 'surat_jalan'),
(364, 227, 'add_surat_jalan'),
(365, 227, 'print_surat_jalan'),
(366, 227, 'edit_surat_jalan'),
(367, 1, 'MSupplier'),
(368, 1, 'MCustomer'),
(369, 1, 'MRongsok'),
(370, 1, 'MSparepart'),
(371, 1, 'MAmpas'),
(372, 1, 'MJenisBarang'),
(373, 1, 'MBank'),
(374, 1, 'MMilik'),
(375, 374, 'index'),
(376, 374, 'add'),
(377, 374, 'edit'),
(378, 374, 'delete');

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
  `borrowed_by_supplier` int(11) NOT NULL,
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

INSERT INTO `m_bobbin` (`id`, `tanggal`, `nomor_bobbin`, `m_jenis_packing_id`, `owner_id`, `borrowed_by`, `borrowed_by_supplier`, `m_bobbin_size_id`, `berat`, `barcode`, `status`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(18, '2018-10-24', 'L0008', 1, 1, 5, 0, 1, 12, '', 2, '2018-10-24 12:36:35', 1, 2019, '0000-00-00 00:00:00'),
(19, '2018-10-24', 'M0009', 1, 2, 0, 0, 2, 12.932, '', 1, '2018-10-24 12:36:59', 1, 2019, '0000-00-00 00:00:00'),
(20, '2018-10-25', 'A0010', 3, 2, 0, 0, 9, 0, '', 3, '2018-10-25 13:54:42', 1, 2019, '0000-00-00 00:00:00'),
(21, '2018-10-25', 'B0011', 3, 2, 0, 0, 10, 0, '', 3, '2018-10-25 13:55:02', 1, 2019, '0000-00-00 00:00:00'),
(22, '2018-10-25', 'C0012', 3, 2, 0, 0, 11, 0, '', 3, '2018-10-25 13:55:18', 1, 2019, '0000-00-00 00:00:00'),
(23, '2018-10-25', 'P0005', 2, 2, 0, 0, 5, 8.65, '', 1, '2018-10-25 13:55:45', 1, 2019, '0000-00-00 00:00:00'),
(24, '2018-10-25', 'Q0003', 2, 2, 0, 0, 6, 7.98, '', 3, '2018-10-25 13:55:57', 1, 2019, '0000-00-00 00:00:00'),
(25, '2018-10-25', 'J0002', 2, 2, 0, 0, 7, 9.71, '', 1, '2018-10-25 13:56:22', 1, 2019, '0000-00-00 00:00:00'),
(26, '2018-10-25', 'R0001', 4, 2, 0, 0, 8, 0, '', 1, '2018-10-25 14:51:17', 1, 2019, '0000-00-00 00:00:00'),
(27, '2018-10-25', 'L0013', 1, 2, 3, 0, 1, 7.88, '', 2, '2018-10-25 14:55:05', 1, 2019, '0000-00-00 00:00:00'),
(28, '2018-10-26', 'L0014', 1, 2, 0, 30, 1, 17.34, '', 2, '2018-10-26 12:44:53', 1, 2019, '0000-00-00 00:00:00'),
(29, '2018-11-26', 'S0015', 1, 2, 0, 0, 3, 11.84, '', 1, '2018-11-26 11:06:17', 1, 2019, '0000-00-00 00:00:00'),
(33, '2019-01-07', 'R0002', 4, 1, 26, 0, 8, 0, '', 2, '2019-01-07 18:41:04', 1, 2019, '0000-00-00 00:00:00'),
(34, '2019-01-07', 'R0003', 4, 1, 0, 0, 8, 0, '', 1, '2019-01-07 19:06:20', 1, 2019, '0000-00-00 00:00:00'),
(35, '2019-01-11', 'M0001', 1, 1, 26, 0, 2, 5.96, '', 2, '2019-01-11 17:04:22', 1, 2019, '0000-00-00 00:00:00'),
(37, '2019-01-14', 'M0002', 1, 1, 0, 0, 2, 5.55, '', 1, '2019-01-14 14:27:40', 1, 2019, '0000-00-00 00:00:00'),
(38, '2019-01-14', 'M0003', 1, 1, 0, 0, 2, 5.58, '', 1, '2019-01-14 14:27:49', 1, 2019, '0000-00-00 00:00:00'),
(39, '2019-01-14', 'M0004', 1, 1, 26, 0, 2, 5.6, '', 2, '2019-01-14 14:27:59', 1, 2019, '0000-00-00 00:00:00'),
(40, '2019-01-14', 'P0001', 2, 1, 0, 0, 5, 0, '', 1, '2019-01-14 14:28:16', 1, 2019, '0000-00-00 00:00:00'),
(41, '2019-01-15', 'M0005', 1, 1, 3, 0, 2, 4.5, '', 2, '2019-01-15 10:41:43', 1, 2019, '0000-00-00 00:00:00'),
(42, '2019-01-15', 'M0006', 1, 1, 0, 0, 2, 3.5, '', 3, '2019-01-15 10:41:52', 1, 2019, '0000-00-00 00:00:00'),
(43, '2019-01-15', 'M0007', 1, 1, 3, 0, 2, 2.5, '', 2, '2019-01-15 10:42:00', 1, 2019, '0000-00-00 00:00:00'),
(44, '2019-01-15', 'M0008', 1, 1, 6, 0, 2, 3.8, '', 2, '2019-01-15 10:42:11', 1, 2019, '0000-00-00 00:00:00'),
(46, '2019-01-15', 'M0010', 1, 1, 0, 0, 2, 7.56, '', 1, '2019-01-15 11:46:46', 1, 2019, '0000-00-00 00:00:00'),
(47, '2019-01-29', 'M0011', 1, 2, 3, 0, 2, 5.96, '', 2, '2019-01-29 16:59:55', 1, 2019, '0000-00-00 00:00:00'),
(48, '2019-02-06', 'S0001', 1, 1, 0, 0, 3, 2.33, '', 1, '2019-02-06 17:04:16', 1, 2019, '0000-00-00 00:00:00'),
(49, '2019-02-11', 'M0012', 1, 2, 0, 0, 2, 5.74, '', 1, '2019-02-11 16:52:18', 1, 2019, '0000-00-00 00:00:00'),
(50, '2019-02-11', 'M0013', 1, 2, 0, 0, 2, 4.92, '', 1, '2019-02-11 16:52:39', 1, 2019, '0000-00-00 00:00:00'),
(51, '2019-02-11', 'M0014', 1, 2, 0, 0, 2, 5.36, '', 1, '2019-02-11 16:53:15', 1, 2019, '0000-00-00 00:00:00'),
(52, '2019-02-11', 'S0002', 1, 2, 0, 0, 3, 2.28, '', 1, '2019-02-11 19:22:21', 1, 2019, '0000-00-00 00:00:00'),
(53, '2019-02-11', 'S0003', 1, 2, 0, 0, 3, 2.75, '', 1, '2019-02-11 19:22:35', 1, 2019, '0000-00-00 00:00:00'),
(54, '2019-02-13', 'M0015', 1, 2, 0, 0, 2, 7.43, '', 3, '2019-02-13 17:03:30', 15, 2019, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_peminjaman`
--

CREATE TABLE `m_bobbin_peminjaman` (
  `id` int(11) NOT NULL,
  `no_surat_peminjaman` varchar(30) NOT NULL,
  `id_surat_jalan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remarks` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bobbin_peminjaman`
--

INSERT INTO `m_bobbin_peminjaman` (`id`, `no_surat_peminjaman`, `id_surat_jalan`, `id_customer`, `supplier_id`, `status`, `remarks`, `created_by`, `created_at`) VALUES
(2, 'BB-BR.201901.0002', 3, 3, 0, 1, 0, 1, '2019-01-09 01:01:35'),
(3, 'BB-BR.201901.0003', 5, 3, 0, 1, 0, 1, '2019-01-10 04:01:30'),
(4, 'BB-BR.201901.0004', 8, 4, 0, 1, 0, 1, '2019-01-14 02:01:59'),
(5, 'BB-BR.201901.0005', 9, 4, 0, 1, 0, 1, '2019-01-14 02:01:12'),
(6, 'BB-BR.201901.0006', 10, 5, 0, 1, 0, 1, '2019-01-15 11:01:20'),
(7, 'BB-BR.201901.0007', 11, 5, 0, 1, 0, 1, '2019-01-15 11:01:17'),
(8, 'BB-BR.201901.0008', 12, 5, 0, 1, 0, 1, '2019-01-15 03:01:49'),
(9, 'BB-BR.201901.0009', 13, 6, 0, 0, 0, 1, '2019-01-21 11:01:59'),
(10, 'BB-BR.201901.0010', 14, 3, 0, 1, 0, 1, '2019-01-23 09:01:07'),
(11, 'BB-BR.201901.0011', 16, 3, 0, 1, 0, 1, '2019-01-23 09:01:39'),
(12, 'BB-BR.201901.0012', 20, 26, 0, 0, 0, 1, '2019-01-29 04:01:19'),
(13, 'BB-BR.201901.0013', 21, 26, 0, 0, 0, 1, '2019-01-29 04:01:09'),
(14, 'BB-BR.201901.0015', 0, 0, 166, 1, 0, 1, '2019-01-29 05:01:34'),
(15, 'BB-BR.201901.0017', 0, 0, 30, 0, 0, 1, '2019-01-29 06:01:54'),
(16, 'BB-BR.201901.0018', 22, 3, 0, 0, 0, 1, '2019-01-30 02:01:25'),
(17, 'BB-BR.201901.0019', 23, 3, 0, 0, 0, 1, '2019-01-30 02:01:15'),
(18, 'BB-BR.201902.0001', 24, 3, 0, 0, 0, 1, '2019-02-01 03:02:00'),
(19, 'BB-BR.201902.0002', 24, 3, 0, 0, 0, 1, '2019-02-01 03:02:32'),
(20, 'BB-BR.201902.0003', 25, 3, 0, 0, 0, 1, '2019-02-01 03:02:21'),
(21, 'BB-BR.201902.0004', 25, 3, 0, 0, 0, 1, '2019-02-01 03:02:07'),
(22, 'BB-BR.201902.0005', 25, 3, 0, 0, 0, 1, '2019-02-01 03:02:24'),
(23, 'BB-BR.201902.0006', 30, 5, 0, 1, 0, 1, '2019-02-06 05:02:29'),
(24, 'BB-BR.201902.0007', 31, 5, 0, 0, 0, 16, '2019-02-13 05:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_peminjaman_detail`
--

CREATE TABLE `m_bobbin_peminjaman_detail` (
  `id` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_penerimaan` int(11) NOT NULL,
  `nomor_bobbin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bobbin_peminjaman_detail`
--

INSERT INTO `m_bobbin_peminjaman_detail` (`id`, `id_peminjaman`, `id_penerimaan`, `nomor_bobbin`) VALUES
(3, 2, 4, 'L0013'),
(4, 2, 4, 'L0014'),
(5, 3, 5, 'M0009'),
(8, 4, 11, 'P0001'),
(9, 5, 12, 'M0002'),
(10, 5, 12, 'M0003'),
(11, 6, 9, 'M0005'),
(12, 6, 9, 'M0007'),
(13, 7, 13, 'M0006'),
(14, 8, 14, 'M0010'),
(15, 9, 0, 'M0008'),
(16, 10, 6, 'M0004'),
(17, 11, 7, 'R0001'),
(18, 12, 0, 'M0001'),
(19, 12, 0, 'R0002'),
(20, 13, 0, 'L0013'),
(21, 13, 0, 'M0004'),
(22, 13, 0, 'M0009'),
(23, 14, 8, 'M0011'),
(24, 15, 0, 'L0014'),
(25, 16, 0, 'M0011'),
(26, 17, 0, 'M0005'),
(27, 18, 0, 'M0007'),
(28, 19, 0, 'M0007'),
(29, 20, 0, 'L0013'),
(30, 21, 0, 'L0013'),
(31, 22, 0, 'L0013'),
(32, 23, 15, 'S0001'),
(33, 24, 0, 'L0008');

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_penerimaan`
--

CREATE TABLE `m_bobbin_penerimaan` (
  `id` int(11) NOT NULL,
  `no_penerimaan` varchar(30) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `surat_jalan` varchar(30) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `received_by` int(11) DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bobbin_penerimaan`
--

INSERT INTO `m_bobbin_penerimaan` (`id`, `no_penerimaan`, `id_peminjaman`, `surat_jalan`, `created_by`, `created_at`, `received_by`, `received_at`, `remarks`) VALUES
(4, 'BB-RC.201901.0004', 2, 'SJ-TRD.201901.0002', 1, '2019-01-29 03:01:00', 1, '2019-01-29 03:01:11', ''),
(5, 'BB-RC.201901.0005', 3, 'SJ-TRD.201901.0003', 1, '2019-01-29 03:01:14', 1, '2019-01-29 03:01:24', ''),
(6, 'BB-RC.201901.0006', 10, 'SJ-TRD.201901.0010', 1, '2019-01-29 03:01:21', 1, '2019-01-29 03:01:26', ''),
(7, 'BB-RC.201901.0007', 11, 'SJ-TRD.201901.0011', 1, '2019-01-29 04:01:41', 1, '2019-01-29 04:01:46', ''),
(8, 'BB-RC.201901.0008', 14, 'SJ-DAMIN.201901.0015', 1, '2019-01-29 07:01:00', 1, '2019-01-29 07:01:29', ''),
(9, 'BB-RC.201901.0009', 6, 'SJ-ARIED.201901.0006', 1, '2019-01-29 07:01:47', 1, '2019-01-29 07:01:53', ''),
(10, 'BB-RC.201902.0001', 5, 'SJ.ANEKA.0009', 1, '2019-02-06 10:02:07', 1, '2019-02-06 10:02:14', ''),
(11, 'BB-RC.201902.0002', 4, '', 1, '2019-02-13 11:02:10', 1, '2019-02-13 11:02:15', ''),
(12, 'BB-RC.201902.0003', 5, 'SJ-ARIED.201901.0008', 1, '2019-02-13 11:02:06', 1, '2019-02-13 11:02:11', ''),
(13, 'BB-RC.201902.0004', 7, 'SJ-ARIES.201913.0001', 1, '2019-02-13 11:02:30', 1, '2019-02-13 11:02:34', ''),
(14, 'BB-RC.201902.0005', 8, 'SJ-ARIES.013358', 1, '2019-02-13 11:02:50', 1, '2019-02-13 11:02:53', ''),
(15, 'BB-RC.201902.0006', 23, 'SJ-ARIES.1390530', 1, '2019-02-13 11:02:09', 1, '2019-02-13 11:02:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_penerimaan_detail`
--

CREATE TABLE `m_bobbin_penerimaan_detail` (
  `id` int(11) NOT NULL,
  `id_bobbin_penerimaan` int(11) NOT NULL,
  `nomor_bobbin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bobbin_penerimaan_detail`
--

INSERT INTO `m_bobbin_penerimaan_detail` (`id`, `id_bobbin_penerimaan`, `nomor_bobbin`) VALUES
(7, 4, 'L0013'),
(8, 4, 'L0014'),
(9, 5, 'M0009'),
(10, 6, 'M0004'),
(11, 7, 'R0001'),
(12, 8, 'M0011'),
(13, 9, 'M0005'),
(14, 9, 'M0007'),
(15, 10, 'M0003'),
(16, 11, 'P0001'),
(17, 12, 'M0002'),
(18, 12, 'M0003'),
(19, 13, 'M0006'),
(20, 14, 'M0010'),
(21, 15, 'S0001');

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
(1, 'L', 'LARGE', 15, 1),
(2, 'M', 'MEDIUM', 9, 1),
(3, 'S', 'SMALL', 16, 1),
(4, 'T', 'TEMBAGA', 0, 1),
(5, 'P', 'KERANJANG P', 6, 2),
(6, 'Q', 'KERANJANG Q', 4, 2),
(7, 'J', 'KERANJANG J', 3, 2),
(8, 'R', 'ROLL', 4, 4),
(9, 'A', 'KARDUS A', 11, 3),
(10, 'B', 'KARDUS B', 12, 3),
(11, 'C', 'KARDUS C', 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_spb`
--

CREATE TABLE `m_bobbin_spb` (
  `id` int(11) NOT NULL,
  `no_spb_bobbin` varchar(50) NOT NULL,
  `keperluan` int(11) NOT NULL,
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

INSERT INTO `m_bobbin_spb` (`id`, `no_spb_bobbin`, `keperluan`, `jenis_packing`, `pemohon`, `status`, `keterangan`, `created_by`, `created_at`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`, `reject_remarks`) VALUES
(1, 'SPB-BB.201901.0001', 0, '1', 'BELOW', 1, 'MINJEM BOBBIN', 1, '2019-01-02 05:01:04', 1, '2019-01-02 06:01:27', NULL, NULL, NULL),
(2, 'SPB-BB.201901.0002', 0, '1', 'JOHN', 1, '', 1, '2019-01-02 06:01:33', 1, '2019-01-08 04:01:54', NULL, NULL, NULL),
(3, 'SPB-BB.201901.0003', 0, '4', 'BELOW', 1, '', 1, '2019-01-07 06:01:37', 1, '2019-01-07 06:01:27', NULL, NULL, NULL),
(4, 'SPB-BB.201901.0004', 0, '4', 'BELOW', 1, '', 1, '2019-01-07 06:01:13', 1, '2019-01-07 06:01:45', NULL, NULL, NULL),
(5, 'SPB-BB.201901.0005', 0, '1', 'BELO', 1, '', 1, '2019-01-14 10:01:19', 1, '2019-01-14 10:01:09', NULL, NULL, NULL),
(6, 'SPB-BB.201901.0006', 0, '2', 'BELO', 1, '', 1, '2019-01-14 02:01:28', 1, '2019-01-14 02:01:37', NULL, NULL, NULL),
(7, 'SPB-BB.201901.0007', 0, '1', 'BELOW', 1, '', 1, '2019-01-14 02:01:43', 1, '2019-01-14 02:01:57', NULL, NULL, NULL),
(8, 'SPB-BB.201901.0008', 0, '1', 'BELO', 1, '', 1, '2019-01-15 10:01:24', 1, '2019-01-15 10:01:40', NULL, NULL, NULL),
(9, 'SPB-BB.201901.0009', 0, '1', 'BELO', 1, '', 1, '2019-01-15 11:01:56', 1, '2019-01-15 11:01:04', NULL, NULL, NULL),
(10, 'SPB-BB.201901.0010', 0, '1', 'BELO', 1, '', 1, '2019-01-29 03:01:39', 1, '2019-01-29 03:01:56', NULL, NULL, NULL),
(11, 'SPB-BB.201901.0011', 2, '1', 'BELLOW', 1, '', 1, '2019-01-29 05:01:07', 1, '2019-01-29 05:01:21', NULL, NULL, NULL),
(12, 'SPB-BB.201901.0012', 2, '1', 'BELLOH', 1, '', 1, '2019-01-29 05:01:28', 1, '2019-01-29 05:01:09', NULL, NULL, NULL),
(13, 'SPB-BB.201901.0013', 0, '1', 'BELLOH', 1, '', 1, '2019-01-29 07:01:13', 1, '2019-01-29 07:01:22', NULL, NULL, NULL),
(14, 'SPB-BB.201901.0014', 0, '1', 'BELO', 1, '', 1, '2019-01-29 07:01:55', 1, '2019-01-29 07:01:11', NULL, NULL, NULL),
(15, 'SPB-BB.201902.0001', 0, '1', 'BELO', 1, '', 1, '2019-02-06 10:02:28', 1, '2019-02-06 10:02:39', NULL, NULL, NULL),
(16, 'SPB-BB.201902.0002', 0, '1', 'BEBE', 1, '', 1, '2019-02-06 05:02:39', 1, '2019-02-06 05:02:50', NULL, NULL, NULL),
(17, 'SPB-BB.201902.0003', 0, '1', 'SELES', 1, '', 1, '2019-02-11 04:02:01', 1, '2019-02-11 04:02:13', NULL, NULL, NULL),
(18, 'SPB-BB.201902.0004', 0, '1', 'EWAN', 1, '', 1, '2019-02-11 07:02:47', 1, '2019-02-11 07:02:58', NULL, NULL, NULL),
(19, 'SPB-BB.201902.0005', 0, '1', 'TARU', 1, '', 1, '2019-02-13 11:02:41', 1, '2019-02-13 11:02:00', NULL, NULL, NULL),
(20, 'SPB-BB.201902.0006', 0, '2', 'KERAN', 1, '', 1, '2019-02-13 12:02:54', 1, '2019-02-13 12:02:13', NULL, NULL, NULL),
(21, 'SPB-BB.201902.0007', 0, '3', 'KARD', 1, '', 1, '2019-02-13 01:02:44', 1, '2019-02-13 01:02:59', NULL, NULL, NULL),
(22, 'SPB-BB.201902.0008', 0, '1', 'GUDANG', 1, '', 6, '2019-02-13 05:02:07', 15, '2019-02-13 05:02:08', NULL, NULL, NULL),
(23, 'SPB-BB.201902.0009', 0, '4', 'SAGJF', 1, '', 1, '2019-02-14 05:02:13', 1, '2019-02-14 05:02:32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_spb_detail`
--

CREATE TABLE `m_bobbin_spb_detail` (
  `id` int(11) NOT NULL,
  `id_spb_bobbin` int(11) NOT NULL,
  `id_bobbin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bobbin_spb_detail`
--

INSERT INTO `m_bobbin_spb_detail` (`id`, `id_spb_bobbin`, `id_bobbin`) VALUES
(11, 1, 28),
(13, 1, 19),
(14, 1, 18),
(15, 2, 27),
(16, 2, 29),
(17, 3, 26),
(18, 4, 33),
(19, 5, 35),
(20, 6, 40),
(21, 7, 37),
(22, 7, 38),
(23, 7, 39),
(24, 8, 41),
(25, 8, 42),
(26, 8, 43),
(27, 8, 44),
(28, 9, 46),
(29, 10, 39),
(30, 10, 19),
(31, 10, 27),
(32, 11, 47),
(33, 12, 28),
(34, 13, 47),
(35, 14, 41),
(36, 14, 43),
(37, 15, 38),
(38, 16, 48),
(39, 17, 49),
(40, 17, 50),
(41, 17, 51),
(42, 18, 52),
(43, 18, 53),
(44, 19, 37),
(45, 19, 38),
(46, 19, 42),
(47, 19, 46),
(48, 19, 48),
(49, 20, 23),
(50, 20, 40),
(51, 20, 24),
(52, 20, 25),
(53, 21, 20),
(54, 21, 21),
(55, 21, 22),
(56, 22, 54),
(57, 23, 26),
(58, 23, 34);

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
(60, 'SPB-RSK', 1, 4, '.', '.'),
(61, 'SPB-BB', 1, 4, '.', '.'),
(62, 'BB-BR', 1, 4, '.', '.'),
(63, 'BB-RC', 1, 4, '.', '.'),
(64, 'INVOICE', 1, 4, '-', '.'),
(65, 'RTR', 1, 4, '.', '.'),
(66, 'BPB-RTR', 1, 4, '.', '.'),
(67, 'BB-FG', 0, 4, '.', '.'),
(68, 'POFG', 1, 4, '.', '.'),
(69, 'POWIP', 1, 4, '.', '.'),
(70, 'DTBJ', 1, 4, '.', '.'),
(71, 'DTWIP', 1, 4, '.', '.'),
(72, 'BPB-PO', 1, 4, '.', '.'),
(73, 'VFG', 1, 4, '.', '.'),
(74, 'VWIP', 1, 4, '.', '.'),
(75, 'M', 0, 4, '.', '.'),
(76, 'DTR-T', 1, 4, '.', '.'),
(79, 'DTR-R', 1, 4, '.', '.'),
(80, 'TTR-R', 1, 4, '.', '.'),
(81, 'PO-T', 1, 4, '.', '.'),
(82, 'DTT', 1, 4, '.', '.'),
(83, 'SPB-FGT', 1, 4, '.', '.'),
(84, 'SPB-WIPT', 1, 4, '.', '.'),
(85, 'SPB-RSKT', 1, 4, '.', '.'),
(86, 'SJ-T', 1, 4, '.', '.'),
(87, 'BPB-PO-T', 1, 4, '.', '.'),
(88, 'VTL', 1, 4, '.', '.'),
(89, 'SPB-FGR', 1, 4, '.', '.'),
(90, 'S', 0, 4, '.', '.'),
(91, 'INV-RTR', 1, 4, '.', '.');

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
(1, 'PPS.201812', 1),
(2, 'POSP.201812', 3),
(3, 'BPB.201812', 3),
(4, 'SPB-SP.201812', 1),
(5, 'SO.201812', 1),
(6, 'PO-201812', 1),
(8, 'DTR.201812', 1),
(9, 'SO.201901', 24),
(10, 'SPB-FG201901', 17),
(11, 'DTR.201901', 24),
(12, 'PO-201901', 10),
(13, 'TTR.201901', 14),
(14, 'VRSK.201901', 10),
(15, 'PRD.201901', 8),
(16, 'SPB.201901', 6),
(17, 'SPB-BB.201901', 14),
(18, 'PRD-SDM.201901', 21),
(19, 'BPB-SDM.201901', 21),
(20, 'R.', 3),
(21, 'PMB.201901', 4),
(22, 'BPB.201901', 11),
(23, 'SJ.201901', 24),
(24, 'BB-BR.201901', 19),
(25, 'INVOICE-201901', 12),
(26, 'VSP.201901', 14),
(27, 'PRD-WIP.201901', 20),
(28, 'BPB-WIP.201901', 24),
(29, 'SPB-WIP.201901', 12),
(30, 'SPB-RSK.201901', 3),
(31, 'BB-FG.', 1),
(32, 'BPB-AMP.201901', 4),
(33, 'M.', 15),
(34, 'P.', 1),
(35, 'PPS.201901', 3),
(36, 'POSP.201901', 7),
(37, 'DTR-T-201901', 1),
(38, 'DTR-T.201901', 3),
(39, 'SJ-R.201901', 3),
(42, 'DTR-R.201901', 7),
(43, 'TTR-R.201901', 7),
(44, 'POFG.201901', 1),
(45, 'BB-RC.201901', 9),
(46, 'PO-T.201901', 2),
(47, 'POWIP.201901', 1),
(48, 'DTT.201901', 2),
(49, 'DTWIP.201901', 1),
(55, 'SPB-RSKT.201901', 3),
(56, 'SPB-WIPT.201901', 3),
(57, 'SPB-FGT.201901', 1),
(58, 'SJ-T.201901', 1),
(59, 'BB-BR.201902', 7),
(60, 'SJ-T.201902', 5),
(61, 'BPB-PO-T.201902', 12),
(62, 'BPB-PO.201902', 14),
(63, 'VTL.201902', 7),
(64, 'DTT.201902', 5),
(65, 'DTR.201902', 14),
(66, 'RTR.201902', 4),
(67, 'BPB-RTR.201902', 2),
(68, 'BB-RC.201902', 6),
(69, 'SPB-BB.201902', 9),
(70, 'PO-201902', 4),
(71, 'VRSK.201902', 12),
(72, 'TTR.201902', 2),
(73, 'INVOICE-201902', 6),
(74, 'SPB-FG201902', 5),
(75, 'SPB-FGR.201902', 2),
(76, 'S.', 3),
(77, 'PRD-SDM.201902', 28),
(78, 'BPB-SDM.201902', 11),
(79, 'SJ.201902', 4),
(80, 'INV-RTR.201902', 3),
(81, 'SPB-WIP.201902', 6),
(82, 'SO.201902', 2),
(83, 'DTR-T.201902', 1),
(84, 'PO-T.201902', 1),
(85, 'PPS.201902', 1),
(86, 'POSP.201902', 3),
(87, 'BPB.201902', 4),
(88, 'VSP.201902', 3),
(89, 'DTBJ.201902', 9),
(90, 'VFG.201902', 5),
(91, 'POFG.201902', 2),
(92, 'PRD.201902', 3),
(93, 'SPB.201902', 2),
(94, 'BPB-WIP.201902', 4),
(95, 'BPB-AMP.201902', 1),
(96, 'PRD-WIP.201902', 3),
(97, 'POAPS.201902', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_print_barcode`
--

CREATE TABLE `m_print_barcode` (
  `id` int(11) NOT NULL,
  `nama_barcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(17, 1, 17, 'TEXT 646,258,\"ROMAN.TTF\",180,1,8,\"No Packing :\"', ''),
(18, 1, 18, 'BARCODE 488,335,\"39\",41,0,180,2,6,\"05RT010\"', 'barcode_kode_barang'),
(19, 1, 19, 'TEXT 386,289,\"ROMAN.TTF\",180,1,8,\"05RT010\"', 'text_barcode_kode_barang'),
(20, 1, 20, 'TEXT 646,217,\"ROMAN.TTF\",180,1,8,\"Qty. Gross    :\"', ''),
(21, 1, 21, 'TEXT 646,182,\"ROMAN.TTF\",180,1,8,\"Brt. Bobbin   :\"', ''),
(22, 1, 22, 'TEXT 647,142,\"ROMAN.TTF\",180,1,8,\"Qty. Net        :\"', ''),
(23, 1, 23, 'BARCODE 612,101,\"39\",41,0,180,2,6,\"SPB-FG2019020004\"', 'barcode_nomor_bobbin'),
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
(3, 'IDK', 'INDOKA'),
(4, 'TRD', 'TRADECO');

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
  `customer_id` int(11) NOT NULL,
  `term_of_payment` varchar(50) NOT NULL,
  `jenis_po` varchar(25) NOT NULL,
  `flag_dp` tinyint(1) NOT NULL,
  `flag_pelunasan` tinyint(1) NOT NULL,
  `status` smallint(6) NOT NULL,
  `remarks` text,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `no_po`, `tanggal`, `beli_sparepart_id`, `ppn`, `diskon`, `materai`, `supplier_id`, `customer_id`, `term_of_payment`, `jenis_po`, `flag_dp`, `flag_pelunasan`, `status`, `remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'POSP.201812.0001', '2018-12-28', 1, 0, 5, 0, 4, 0, 'CASH', 'Sparepart', 1, 1, 1, 'SELESAI', '2018-12-28 02:12:57', 1, '2019-01-10 04:01:30', 1),
(2, 'POSP.201812.0002', '2018-12-28', 1, 0, 5, 0, 6, 0, 'CASH', 'Sparepart', 0, 0, 3, NULL, '2018-12-28 02:12:07', 1, '2018-12-28 02:12:16', 1),
(3, 'POSP.201812.0003', '2018-12-28', 1, 0, 0, 0, 8, 0, 'CASH', 'Sparepart', 0, 0, 3, NULL, '2018-12-28 02:12:48', 1, '2019-01-08 01:01:35', 1),
(4, 'PO-201812.0001', '2018-12-31', 0, 0, 0, 0, 8, 0, 'CASH', 'Rongsok', 0, 1, 1, 'SELESAI', '2018-12-31 10:12:43', 1, '2019-01-07 10:01:21', 1),
(5, 'PO-201901.0002', '2019-01-07', 0, 0, 0, 0, 6, 0, 'CASH', 'Rongsok', 0, 1, 1, 'SELESAI', '2019-01-07 10:01:57', 1, '2019-01-08 01:01:36', 1),
(6, 'PO-201901.0003', '2019-01-07', 0, 0, 0, 0, 4, 0, 'CASH', 'Rongsok', 0, 1, 1, 'SELESAI', '2019-01-07 06:01:02', 1, '2019-01-08 01:01:44', 1),
(7, 'PO-201901.0004', '2019-01-10', 0, 0, 0, 0, 7, 0, 'CASH', 'Rongsok', 0, 1, 1, 'SUDAH SELESAI', '2019-01-10 04:01:16', 1, '2019-02-06 11:02:56', 1),
(8, 'PO-201901.0005', '2019-01-10', 0, 0, 0, 0, 5, 0, 'CASH', 'Rongsok', 0, 1, 1, 'FINISH', '2019-01-10 05:01:42', 1, '2019-02-06 12:02:47', 1),
(9, 'PO-201901.0006', '2019-01-10', 0, 0, 0, 0, 10, 0, 'CASH', 'Rongsok', 0, 1, 1, 'SELESAI', '2019-01-10 05:01:11', 1, '2019-02-06 12:02:02', 1),
(11, 'PO-201901.0007', '2019-01-14', 0, 0, 0, 0, 3, 0, 'CASH', 'Rongsok', 0, 1, 1, 'SELESAI', '2019-01-14 10:01:00', 1, '2019-02-06 12:02:39', 1),
(12, 'POSP.201901.0001', '2019-01-15', 2, 0, 0, 0, 12, 0, 'CASH', 'Sparepart', 0, 1, 3, NULL, '2019-01-15 01:01:36', 1, '2019-01-15 01:01:32', 1),
(13, 'POSP.201901.0002', '2019-01-15', 2, 0, 0, 0, 4, 0, 'CASH', 'Sparepart', 0, 0, 3, NULL, '2019-01-15 01:01:07', 1, '2019-01-15 01:01:21', 1),
(14, 'POSP.201901.0003', '2019-01-15', 3, 0, 0, 0, 10, 0, 'CASH', 'Sparepart', 1, 1, 4, NULL, '2019-01-15 01:01:35', 1, '2019-01-15 02:01:50', 1),
(15, 'POSP.201901.0004', '2019-01-15', 3, 0, 0, 0, 9, 0, 'CASH', 'Sparepart', 1, 1, 4, NULL, '2019-01-15 01:01:43', 1, '2019-01-15 02:01:16', 1),
(16, 'PO-201901.0008', '2019-01-15', 0, 0, 0, 0, 130, 0, 'CASH', 'Rongsok', 0, 1, 1, 'SUDAH SELESAI', '2019-01-15 02:01:25', 1, '2019-02-06 11:02:53', 1),
(17, 'PO-201901.0009', '2019-01-15', 0, 0, 0, 0, 8, 0, 'CASH', 'Rongsok', 0, 1, 1, 'SELESAI', '2019-01-15 02:01:10', 1, '2019-02-06 12:02:56', 1),
(18, 'PO-201901.0010', '2019-01-15', 0, 0, 0, 0, 6, 0, 'CASH', 'Rongsok', 0, 1, 1, 'SELESAI', '2019-01-15 03:01:34', 1, '2019-02-06 11:02:50', 1),
(19, 'POSP.201901.0005', '2019-01-21', 4, 0, 5, 0, 4, 0, 'CASH', 'Sparepart', 0, 1, 4, NULL, '2019-01-21 11:01:29', 1, '2019-01-21 07:01:12', 1),
(20, 'POSP.201901.0006', '2019-01-22', 4, 0, 10, 0, 10, 0, 'CASH', 'Sparepart', 0, 1, 4, NULL, '2019-01-22 10:01:15', 1, '2019-01-22 11:01:53', 1),
(21, 'POSP.201901.0007', '2019-01-24', 4, 0, 0, 0, 7, 0, 'CASH', 'Sparepart', 0, 0, 0, NULL, '2019-01-24 11:01:52', 1, '2019-01-24 11:01:52', 1),
(22, 'POFG.201901.0001', '2019-01-25', 0, 0, 0, 0, 4, 0, 'CASH', 'FG', 0, 1, 1, 'SELESAI', '2019-01-25 02:01:27', 1, '2019-02-11 07:02:02', 3),
(23, 'PO-T.201901.0001', '2019-01-29', 0, 0, 0, 0, 0, 3, 'CASH', 'FG', 0, 1, 1, 'SELESAI', '2019-01-30 03:01:49', 1, '2019-02-04 02:02:42', 1),
(24, 'POWIP.201901.0001', '2019-01-30', 0, 0, 0, 0, 7, 0, 'CASH', 'WIP', 0, 0, 0, NULL, '2019-01-30 03:01:28', 1, '2019-01-30 03:01:46', 1),
(25, 'PO-T.201901.0002', '2019-01-30', 0, 0, 0, 0, 0, 55, 'CASH', 'WIP', 0, 1, 1, 'SELESAI', '2019-01-30 07:01:10', 1, '2019-02-04 04:02:02', 1),
(26, 'PO-201902.0001', '2019-02-06', 0, 0, 0, 0, 9, 0, 'CASH', 'Rongsok', 0, 1, 1, 'SLESAI', '2019-02-06 11:02:08', 1, '2019-02-06 11:02:35', 1),
(27, 'PO-201902.0002', '2019-02-06', 0, 0, 0, 0, 7, 0, '1 BULAN', 'Rongsok', 0, 1, 1, 'CLOSE PO', '2019-02-06 11:02:49', 1, '2019-02-06 11:02:52', 1),
(28, 'PO-201902.0003', '2019-02-06', 0, 0, 0, 0, 76, 0, '1 BULAN', 'Rongsok', 0, 1, 1, 'CUMAN SEGINI YANG BISA DI KIRIM, MANUAL CLOSE', '2019-02-06 11:02:04', 1, '2019-02-06 11:02:45', 1),
(29, 'PO-201902.0004', '2019-02-06', 0, 0, 0, 0, 16, 0, '1 BULAN', 'Rongsok', 0, 0, 2, NULL, '2019-02-06 11:02:42', 1, '2019-02-06 11:02:41', 1),
(30, 'PO-T.201902.0001', '2019-02-11', 0, 0, 0, 0, 0, 37, 'CASH', 'FG', 0, 0, 2, '', '2019-02-11 04:02:18', 8, '0000-00-00 00:00:00', 0),
(31, 'POSP.201902.0001', '2019-02-11', 5, 0, 0, 0, 62, 0, 'CASH', 'Sparepart', 0, 0, 3, NULL, '2019-02-11 05:02:20', 7, '2019-02-11 05:02:54', 7),
(32, 'POSP.201902.0002', '2019-02-11', 5, 0, 5, 0, 76, 0, 'CASH', 'Sparepart', 0, 1, 4, NULL, '2019-02-11 05:02:43', 7, '2019-02-11 05:02:47', 6),
(33, 'POSP.201902.0003', '2019-02-11', 5, 0, 0, 0, 445, 0, 'CASH', 'Sparepart', 0, 1, 4, NULL, '2019-02-11 05:02:59', 7, '2019-02-11 05:02:38', 7),
(34, 'POFG.201902.0001', '2019-02-11', 0, 0, 0, 0, 8, 0, 'CASH', 'FG', 0, 1, 1, 'SELESAI\r\n', '2019-02-11 07:02:57', 3, '2019-02-11 07:02:55', 3),
(35, 'POFG.201902.0002', '2019-02-13', 0, 0, 0, 0, 7, 0, 'CASH', 'FG', 0, 0, 3, NULL, '2019-02-13 11:02:59', 1, '2019-02-13 11:02:08', 1),
(36, 'POAPS.201902.0001', '2019-02-13', 0, 0, 0, 0, 678, 0, 'CASH', 'Ampas', 0, 0, 0, NULL, '2019-02-13 04:02:41', 3, '2019-02-13 04:02:36', 3);

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
  `jenis_barang_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `bruto` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `flag_lpb` tinyint(1) NOT NULL,
  `flag_dtr` tinyint(1) NOT NULL,
  `flag_dtbj` tinyint(1) NOT NULL,
  `flag_dtwip` tinyint(1) NOT NULL,
  `flag_dtt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_detail`
--

INSERT INTO `po_detail` (`id`, `po_id`, `beli_sparepart_detail_id`, `sparepart_id`, `rongsok_id`, `ampas_id`, `jenis_barang_id`, `amount`, `qty`, `total_amount`, `bruto`, `netto`, `flag_lpb`, `flag_dtr`, `flag_dtbj`, `flag_dtwip`, `flag_dtt`) VALUES
(1, 1, 1, 2, 0, 0, 0, 550000, 20, 11000000, 0, 0, 1, 0, 0, 0, 0),
(2, 1, 2, 1, 0, 0, 0, 100000, 40, 4000000, 0, 0, 1, 0, 0, 0, 0),
(3, 2, 3, 122, 0, 0, 0, 300000, 4, 1200000, 0, 0, 1, 0, 0, 0, 0),
(4, 2, 4, 104, 0, 0, 0, 1000000, 8, 8000000, 0, 0, 1, 0, 0, 0, 0),
(5, 2, 6, 1724, 0, 0, 0, 250000, 8, 2000000, 0, 0, 1, 0, 0, 0, 0),
(6, 3, 7, 1722, 0, 0, 0, 350000, 4, 1400000, 0, 0, 1, 0, 0, 0, 0),
(12, 4, 0, 0, 9, 0, 0, 600000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(13, 4, 0, 0, 10, 0, 0, 1000000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(14, 4, 0, 0, 17, 0, 0, 400000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(15, 4, 0, 0, 50, 0, 0, 2000000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(16, 4, 0, 0, 61, 0, 0, 2500000, 250, 625000000, 0, 0, 0, 1, 0, 0, 0),
(17, 5, 0, 0, 48, 0, 0, 80000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(18, 5, 0, 0, 49, 0, 0, 100000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(19, 5, 0, 0, 43, 0, 0, 130000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(20, 5, 0, 0, 62, 0, 0, 150000, 150, 22500000, 0, 0, 0, 1, 0, 0, 0),
(21, 6, 0, 0, 9, 0, 0, 40000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(22, 6, 0, 0, 10, 0, 0, 50000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(23, 6, 0, 0, 63, 0, 0, 60000, 50, 3000000, 0, 0, 0, 1, 0, 0, 0),
(24, 7, 0, 0, 9, 0, 0, 40000, 30, 1200000, 0, 0, 0, 1, 0, 0, 0),
(25, 7, 0, 0, 10, 0, 0, 50000, 75, 3750000, 0, 0, 0, 1, 0, 0, 0),
(26, 7, 0, 0, 17, 0, 0, 56000, 50, 2800000, 0, 0, 0, 1, 0, 0, 0),
(27, 7, 0, 0, 18, 0, 0, 60000, 200, 12000000, 0, 0, 0, 1, 0, 0, 0),
(28, 8, 0, 0, 17, 0, 0, 65000, 50, 3250000, 0, 0, 0, 1, 0, 0, 0),
(29, 9, 0, 0, 9, 0, 0, 35000, 20, 700000, 0, 0, 0, 1, 0, 0, 0),
(30, 9, 0, 0, 10, 0, 0, 50000, 25, 1250000, 0, 0, 0, 1, 0, 0, 0),
(31, 9, 0, 0, 17, 0, 0, 40000, 50, 2000000, 0, 0, 0, 1, 0, 0, 0),
(32, 11, 0, 0, 9, 0, 0, 40000, 100, 4000000, 0, 0, 0, 1, 0, 0, 0),
(33, 11, 0, 0, 10, 0, 0, 45000, 100, 4500000, 0, 0, 0, 1, 0, 0, 0),
(34, 11, 0, 0, 48, 0, 0, 45000, 100, 4500000, 0, 0, 0, 1, 0, 0, 0),
(35, 11, 0, 0, 49, 0, 0, 45000, 100, 4500000, 0, 0, 0, 1, 0, 0, 0),
(36, 12, 8, 1730, 0, 0, 0, 100000, 5, 500000, 0, 0, 1, 0, 0, 0, 0),
(37, 13, 9, 2, 0, 0, 0, 500000, 8, 4000000, 0, 0, 1, 0, 0, 0, 0),
(38, 14, 10, 1731, 0, 0, 0, 600000, 10, 6000000, 0, 0, 1, 0, 0, 0, 0),
(39, 15, 11, 1733, 0, 0, 0, 700000, 10, 7000000, 0, 0, 1, 0, 0, 0, 0),
(40, 16, 0, 0, 48, 0, 0, 45000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(41, 16, 0, 0, 49, 0, 0, 50000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(42, 16, 0, 0, 43, 0, 0, 55000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(43, 16, 0, 0, 44, 0, 0, 60000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(44, 16, 0, 0, 45, 0, 0, 65000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(45, 16, 0, 0, 61, 0, 0, 70000, 100, 7000000, 0, 0, 0, 1, 0, 0, 0),
(46, 17, 0, 0, 48, 0, 0, 45000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(47, 17, 0, 0, 49, 0, 0, 50000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(48, 17, 0, 0, 43, 0, 0, 55000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(49, 17, 0, 0, 44, 0, 0, 60000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(51, 18, 0, 0, 9, 0, 0, 50000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(52, 18, 0, 0, 10, 0, 0, 55000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(53, 18, 0, 0, 62, 0, 0, 70000, 100, 7000000, 0, 0, 0, 1, 0, 0, 0),
(54, 19, 12, 1731, 0, 0, 0, 500000, 10, 5000000, 0, 0, 1, 0, 0, 0, 0),
(55, 20, 13, 1733, 0, 0, 0, 700000, 20, 14000000, 0, 0, 1, 0, 0, 0, 0),
(56, 21, 14, 2343, 0, 0, 0, 600000, 30, 18000000, 0, 0, 0, 0, 0, 0, 0),
(57, 22, 0, 0, 0, 0, 451, 560000, 50, 28000000, 0, 0, 0, 0, 1, 0, 0),
(58, 22, 0, 0, 0, 0, 450, 450000, 50, 22500000, 0, 0, 0, 0, 1, 0, 0),
(59, 24, 0, 0, 0, 0, 2, 75000, 200, 15000000, 0, 0, 0, 0, 0, 0, 0),
(62, 23, 0, 0, 0, 0, 142, 150000, 100, 15000000, 0, 0, 0, 0, 0, 0, 0),
(63, 23, 0, 0, 0, 0, 143, 180000, 100, 18000000, 0, 0, 0, 0, 0, 0, 0),
(67, 25, 0, 0, 0, 0, 5, 200000, 150, 30000000, 0, 0, 0, 0, 0, 0, 0),
(68, 25, 0, 0, 0, 0, 2, 120000, 100, 12000000, 0, 0, 0, 0, 0, 0, 0),
(69, 17, 0, 0, 63, 0, 0, 75000, 200, 15000000, 0, 0, 0, 1, 0, 0, 0),
(70, 26, 0, 0, 35, 0, 0, 100000, 50, 5000000, 0, 0, 0, 1, 0, 0, 0),
(71, 26, 0, 0, 36, 0, 0, 120000, 50, 6000000, 0, 0, 0, 1, 0, 0, 0),
(72, 26, 0, 0, 61, 0, 0, 200000, 150, 30000000, 0, 0, 0, 1, 0, 0, 0),
(73, 27, 0, 0, 32, 0, 0, 160000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(74, 27, 0, 0, 33, 0, 0, 180000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(75, 27, 0, 0, 39, 0, 0, 200000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(76, 27, 0, 0, 61, 0, 0, 220000, 250, 55000000, 0, 0, 0, 1, 0, 0, 0),
(77, 28, 0, 0, 71, 0, 0, 100000, 150, 15000000, 0, 0, 0, 1, 0, 0, 0),
(78, 29, 0, 0, 12, 0, 0, 80000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(79, 29, 0, 0, 17, 0, 0, 90000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(80, 29, 0, 0, 18, 0, 0, 95000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(81, 29, 0, 0, 57, 0, 0, 100000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(82, 29, 0, 0, 61, 0, 0, 150000, 400, 60000000, 0, 0, 0, 1, 0, 0, 0),
(83, 30, 0, 0, 0, 0, 175, 600000, 150, 90000000, 0, 0, 0, 0, 0, 0, 0),
(84, 30, 0, 0, 0, 0, 147, 580000, 150, 87000000, 0, 0, 0, 0, 0, 0, 0),
(85, 31, 15, 1508, 0, 0, 0, 50000, 4, 200000, 0, 0, 1, 0, 0, 0, 0),
(86, 32, 16, 880, 0, 0, 0, 80000, 10, 800000, 0, 0, 1, 0, 0, 0, 0),
(87, 33, 17, 2668, 0, 0, 0, 60000, 15, 900000, 0, 0, 1, 0, 0, 0, 0),
(88, 34, 0, 0, 0, 0, 452, 500000, 100, 50000000, 0, 0, 0, 0, 1, 0, 0),
(89, 35, 0, 0, 0, 0, 405, 700000, 100, 70000000, 0, 0, 0, 0, 1, 0, 0),
(90, 35, 0, 0, 0, 0, 406, 800000, 100, 80000000, 0, 0, 0, 0, 1, 0, 0),
(91, 35, 0, 0, 0, 0, 407, 810000, 100, 81000000, 0, 0, 0, 0, 1, 0, 0),
(92, 35, 0, 0, 0, 0, 408, 850000, 100, 85000000, 0, 0, 0, 0, 1, 0, 0),
(93, 36, 0, 0, 0, 1, 0, 50000, 0, 12500000, 0, 250, 0, 0, 0, 0, 0),
(94, 36, 0, 0, 0, 2, 0, 55000, 0, 13750000, 0, 250, 0, 0, 0, 0, 0);

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
(1, 'PRD-SDM.201901.0001', '2019-01-03', 1, NULL, 400, 1, 1, '2019-01-03 09:01:16', '2019-01-03 09:01:30', 1),
(2, 'PRD-SDM.201901.0002', '2019-01-03', 1, NULL, 409, 1, 1, '2019-01-03 09:01:00', '2019-01-03 09:01:22', 1),
(3, 'PRD-SDM.201901.0003', '2019-01-03', 1, NULL, 424, 1, 1, '2019-01-03 09:01:35', '2019-01-03 09:01:48', 1),
(4, 'PRD-SDM.201901.0004', '2019-01-07', 1, NULL, 424, 1, 1, '2019-01-07 05:01:33', '2019-01-14 10:01:04', 1),
(5, 'PRD-SDM.201901.0005', '2019-01-07', 1, NULL, 450, 2, 1, '2019-01-07 06:01:53', '2019-01-07 06:01:52', 1),
(6, 'PRD-SDM.201901.0006', '2019-01-07', 1, NULL, 450, 4, 1, '2019-01-07 06:01:44', '2019-01-08 04:01:38', 1),
(7, 'PRD-SDM.201901.0007', '2019-01-08', 1, NULL, 409, 1, 1, '2019-01-08 04:01:50', '2019-01-08 04:01:04', 1),
(8, 'PRD-SDM.201901.0008', '2019-01-14', 1, NULL, 429, 2, 1, '2019-01-14 02:01:05', '2019-01-14 02:01:19', 1),
(9, 'PRD-SDM.201901.0009', '2019-01-14', 1, NULL, 166, 1, 1, '2019-01-14 02:01:35', '2019-01-14 02:01:53', 1),
(10, 'PRD-SDM.201901.0010', '2019-01-14', 1, NULL, 174, 1, 1, '2019-01-14 02:01:12', '2019-01-14 02:01:25', 1),
(11, 'PRD-SDM.201901.0011', '2019-01-15', 1, NULL, 429, 1, 1, '2019-01-15 10:01:50', '2019-01-15 10:01:24', 1),
(12, 'PRD-SDM.201901.0012', '2019-01-15', 1, NULL, 457, 1, 1, '2019-01-15 10:01:34', '2019-01-15 10:01:50', 1),
(13, 'PRD-SDM.201901.0013', '2019-01-15', 1, NULL, 431, 1, 1, '2019-01-15 10:01:05', '2019-01-15 10:01:19', 1),
(14, 'PRD-SDM.201901.0014', '2019-01-15', 1, NULL, 400, 1, 1, '2019-01-15 11:01:35', '2019-01-15 11:01:47', 1),
(15, 'PRD-SDM.201901.0015', '2019-01-15', 1, NULL, 401, 1, 1, '2019-01-15 03:01:34', '2019-01-15 03:01:41', 1),
(16, 'PRD-SDM.201901.0016', '2019-01-23', 1, NULL, 400, 1, 1, '2019-01-23 06:01:11', '2019-01-23 06:01:33', 1),
(17, 'PRD-SDM.201901.0017', '2019-01-29', 1, NULL, 429, 1, 1, '2019-01-29 03:01:20', '2019-01-29 03:01:29', 1),
(18, 'PRD-SDM.201901.0018', '2019-01-29', 1, NULL, 431, 1, 1, '2019-01-29 03:01:45', '2019-01-29 03:01:33', 1),
(19, 'PRD-SDM.201901.0019', '2019-01-29', 1, NULL, 153, 1, 1, '2019-01-29 07:01:02', '2019-01-29 07:01:24', 1),
(20, 'PRD-SDM.201901.0020', '2019-01-29', 1, NULL, 154, 1, 1, '2019-01-29 07:01:57', '2019-01-29 07:01:30', 1),
(21, 'PRD-SDM.201901.0021', '2019-01-31', 1, NULL, 427, 1, 1, '2019-01-31 05:01:51', '2019-01-31 05:01:02', 1),
(22, 'PRD-SDM.201902.0001', '2019-02-06', 1, NULL, 457, 1, 1, '2019-02-06 05:02:03', '2019-02-06 05:02:22', 1),
(32, 'PRD-SDM.201902.0018', '2019-02-13', 1, NULL, 455, 1, 14, '2019-02-13 11:02:04', '2019-02-13 11:02:30', 14),
(33, 'PRD-SDM.201902.0019', '2019-02-13', 1, NULL, 463, 2, 1, '2019-02-13 12:02:16', '2019-02-13 12:02:23', 1),
(36, 'PRD-SDM.201902.0022', '2019-02-13', 1, NULL, 400, 3, 1, '2019-02-13 01:02:03', '2019-02-13 01:02:43', 1),
(37, 'PRD-SDM.201902.0023', '2019-02-13', 1, NULL, 410, 3, 1, '2019-02-13 01:02:51', '2019-02-13 01:02:49', 1),
(38, 'PRD-SDM.201902.0024', '2019-02-13', 1, NULL, 405, 4, 1, '2019-02-13 01:02:26', '2019-02-13 04:02:24', 1),
(39, 'PRD-SDM.201902.0025', '2019-02-14', 1, NULL, 438, 4, 1, '2019-02-14 05:02:41', '2019-02-14 05:02:58', 1),
(40, 'PRD-SDM.201902.0026', '2019-02-14', 1, NULL, 405, 4, 1, '2019-02-14 05:02:45', '2019-02-14 05:02:39', 1),
(41, 'PRD-SDM.201902.0027', '2019-02-14', 1, NULL, 424, 3, 1, '2019-02-14 05:02:49', '2019-02-15 10:02:16', 1),
(42, 'PRD-SDM.201902.0028', '2019-02-18', 1, NULL, 431, 3, 1, '2019-02-18 12:02:28', '2019-02-18 04:02:30', 1);

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
(1, 1, '2019-01-03', '190103L0014', 12345, 80, 62.66, 28, ''),
(2, 2, '2019-01-03', '190103L0008', 12346, 87, 75, 18, ''),
(3, 3, '2019-01-03', '190103M0009', 12347, 48, 35.068, 19, ''),
(4, 5, '2019-01-07', '190107R0001', 12345, 54, 54, 26, ''),
(5, 5, '2019-01-07', '190107R0002', 12346, 54, 54, 33, ''),
(6, 6, '2019-01-08', '190108R1234', 1234, NULL, 24, 26, NULL),
(7, 6, '2019-01-08', '190108R1235', 1235, NULL, 28, 26, NULL),
(8, 6, '2019-01-08', '190108R1236', 1236, NULL, 35, 26, NULL),
(9, 6, '2019-01-08', '190108R1237', 1237, NULL, 33, 26, NULL),
(10, 6, '2019-01-08', '190108R1238', 1238, NULL, 38, 26, NULL),
(11, 6, '2019-01-08', '190108R1239', 1239, NULL, 42, 26, NULL),
(12, 7, '2019-01-08', '190108L0013', 143567, 140, 132.12, 27, ''),
(13, 4, '2019-01-14', '190114M0001', 1234555, 58, 52.04, 35, ''),
(14, 8, '2019-01-14', '190114P0001', 1234455, 56, 56, 40, ''),
(15, 9, '2019-01-14', '190114M0002', 1245637, 56, 50.45, 37, ''),
(16, 10, '2019-01-14', '190114M0003', 1243535, 58, 52.42, 38, ''),
(17, 11, '2019-01-15', '190115M0005', 845793, 55, 50.5, 41, ''),
(18, 12, '2019-01-15', '190115M0006', 36835, 55, 51.5, 42, ''),
(19, 13, '2019-01-15', '190115M0007', 425426, 30, 27.5, 43, ''),
(20, 14, '2019-01-15', '190115M0008', 238767, 55, 51.2, 44, ''),
(21, 15, '2019-01-15', '190115M0010', 8795483, 65, 57.44, 46, ''),
(22, 16, '2019-01-23', '190123M0004', 829759, 58, 52.4, 39, ''),
(29, 22, '2019-02-06', '190206S0001', 13155, 30, 27.67, 48, ''),
(24, 18, '2019-01-29', '190129M0004', 39590, 56, 50.4, 39, ''),
(28, 21, '2019-01-31', '190131L0013', 13531, 160, 152.12, 27, ''),
(26, 19, '2019-01-29', '190129M0011', 13567, 58, 52.04, 47, ''),
(27, 20, '2019-01-29', '190129M0005', 653478, 60, 55.5, 41, ''),
(30, 32, '2019-02-13', '190213M0003', 15578, 60, 54.42, 38, ''),
(31, 32, '2019-02-13', '190213M0002', 15579, 64, 58.45, 37, ''),
(32, 32, '2019-02-13', '190213S0001', 15577, 53, 50.67, 48, ''),
(33, 33, '2019-02-13', '190213P0001', 1253316, 50, 50, 40, ''),
(34, 35, '2019-02-13', '190213R2355', 2355, NULL, 45, 26, NULL),
(35, 35, '2019-02-13', '190213R2356', 2356, NULL, 50, 26, NULL),
(36, 36, '2019-02-13', '190213A0101', NULL, NULL, 25, 20, NULL),
(37, 36, '2019-02-13', '190213A01018', NULL, NULL, 26, 20, NULL),
(38, 36, '2019-02-13', '190213A01011', NULL, NULL, 27, 20, NULL),
(46, 37, '2019-02-13', '190213A01016', NULL, NULL, 25, 20, NULL),
(47, 37, '2019-02-13', '190213A01083', NULL, NULL, 26, 20, NULL),
(48, 37, '2019-02-13', '190213A01047', NULL, NULL, 27, 20, NULL),
(49, 37, '2019-02-13', '190213A01052', NULL, NULL, 28, 20, NULL),
(50, 38, '2019-02-13', '190213R1351', 1351, NULL, 45, 26, NULL),
(51, 39, '2019-02-14', '190214R3137', 3137, NULL, 56, 26, NULL),
(52, 39, '2019-02-14', '190214R3138', 3138, NULL, 65, 26, NULL),
(53, 40, '2019-02-14', '190214R0001', 15359, 50, 50, 26, ''),
(54, 40, '2019-02-14', '190214R0003', 15360, 50, 50, 34, ''),
(56, 41, '2019-02-15', '190215A01042', NULL, 54, 53.66, 20, NULL),
(57, 41, '2019-02-15', '190215A01039', NULL, 52, 51.92, 20, NULL),
(58, 41, '2019-02-15', '190215A01058', NULL, 55, 54.36, 20, NULL),
(59, 41, '2019-02-15', '190215B01152', NULL, 53, 52.15, 21, NULL),
(60, 41, '2019-02-15', '190215B01157', NULL, 50, 49.35, 21, NULL),
(61, 41, '2019-02-15', '190215B01138', NULL, 51, 50.15, 21, NULL),
(65, 42, '2019-02-18', '190218A00170014', NULL, 53, 52.69, 20, NULL),
(66, 42, '2019-02-18', '190218A00170015', NULL, 52, 51.18, 20, NULL);

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
  `id_apolo` int(11) NOT NULL,
  `flag_result` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_ingot`
--

INSERT INTO `produksi_ingot` (`id`, `no_produksi`, `tanggal`, `jenis_barang_id`, `remarks`, `id_apolo`, `flag_result`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(3, 'PRD.201901.0003', '2019-01-07', 2, 'TEST  1', 1, 1, '2019-01-07 02:01:37', 1, '0000-00-00 00:00:00', 0),
(4, 'PRD.201901.0004', '2019-01-10', 2, '', 2, 0, '2019-01-10 10:01:20', 1, '0000-00-00 00:00:00', 0),
(5, 'PRD.201901.0005', '2019-01-14', 2, '', 2, 1, '2019-01-14 10:01:54', 1, '0000-00-00 00:00:00', 0),
(6, 'PRD.201901.0006', '2019-01-15', 2, '', 2, 1, '2019-01-15 03:01:24', 1, '0000-00-00 00:00:00', 0),
(7, 'PRD.201901.0007', '2019-01-16', 2, '', 1, 1, '2019-01-16 11:01:14', 1, '0000-00-00 00:00:00', 0),
(11, 'PRD.201902.0002', '2019-02-12', 2, 'TEST AUTO SPB', 2, 1, '2019-02-12 01:02:56', 14, '0000-00-00 00:00:00', 0),
(13, 'PRD.201902.0003', '2019-02-12', 2, '', 3, 0, '2019-02-12 02:02:54', 14, '0000-00-00 00:00:00', 0);

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
(3, 3, 0, 50, '', 1, '0000-00-00 00:00:00', 2019, '0000-00-00 00:00:00', 0),
(4, 4, 0, 50, '', 1, '0000-00-00 00:00:00', 2019, '0000-00-00 00:00:00', 0),
(5, 5, 0, 500, '', 1, '0000-00-00 00:00:00', 2019, '0000-00-00 00:00:00', 0),
(6, 6, 0, 50, '', 1, '0000-00-00 00:00:00', 2019, '0000-00-00 00:00:00', 0),
(7, 7, 0, 50, '', 1, '0000-00-00 00:00:00', 2019, '0000-00-00 00:00:00', 0),
(11, 11, 2, 250, '', 1, '0000-00-00 00:00:00', 2019, '0000-00-00 00:00:00', 0),
(13, 13, 2, 200, '', 1, '0000-00-00 00:00:00', 2019, '0000-00-00 00:00:00', 0);

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
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `id` int(11) NOT NULL,
  `no_retur` varchar(50) NOT NULL,
  `spb_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `jenis_retur` int(11) NOT NULL,
  `flag_taken` tinyint(1) NOT NULL,
  `jenis_packing_id` int(11) NOT NULL,
  `remarks` text,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `approved_by` int(11) NOT NULL,
  `approved_at` datetime NOT NULL,
  `rejected_by` int(11) NOT NULL,
  `rejected_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`id`, `no_retur`, `spb_id`, `customer_id`, `jenis_retur`, `flag_taken`, `jenis_packing_id`, `remarks`, `status`, `created_by`, `created_at`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`) VALUES
(2, 'RTR.201902.0002', 23, 5, 0, 1, 3, 'BARANG RETUR', 1, 1, '2019-02-04 06:02:36', 1, '2019-02-04 06:02:52', 0, '0000-00-00 00:00:00'),
(4, 'RTR.201902.0004', 0, 5, 1, 1, 1, 'BARANG RETUR', 1, 1, '2019-02-06 03:02:49', 1, '2019-02-06 03:02:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `retur_detail`
--

CREATE TABLE `retur_detail` (
  `id` int(11) NOT NULL,
  `retur_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `no_packing` varchar(100) NOT NULL,
  `bobbin_id` int(11) NOT NULL,
  `line_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_detail`
--

INSERT INTO `retur_detail` (`id`, `retur_id`, `jenis_barang_id`, `bruto`, `netto`, `no_packing`, `bobbin_id`, `line_remarks`) VALUES
(2, 2, 457, 40, 28.16, '190204S0015RTR', 29, 'TEST'),
(4, 4, 457, 30, 24.42, '190206M0003RTR', 38, '');

-- --------------------------------------------------------

--
-- Table structure for table `retur_fulfilment`
--

CREATE TABLE `retur_fulfilment` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `retur_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `uom` varchar(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_fulfilment`
--

INSERT INTO `retur_fulfilment` (`id`, `tanggal`, `retur_id`, `jenis_barang_id`, `uom`, `netto`, `keterangan`) VALUES
(2, '2019-02-06', 2, 457, 'KG', 28, '');

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
(9, 5, 72, 1),
(10, 6, 72, 1),
(11, 4, 71, 0),
(12, 4, 70, 0),
(13, 5, 70, 0),
(14, 5, 71, 0),
(15, 6, 70, 0),
(16, 6, 71, 0),
(17, 5, 73, 1),
(18, 5, 74, 0),
(19, 5, 75, 0),
(20, 4, 75, 0),
(21, 4, 74, 0),
(22, 6, 74, 1),
(23, 6, 75, 1),
(24, 3, 76, 1),
(25, 3, 77, 1),
(26, 3, 78, 1),
(27, 3, 79, 1),
(28, 5, 80, 0),
(29, 6, 81, 0),
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
(42, 5, 84, 1),
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
(110, 4, 206, 0),
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
(133, 3, 240, 1),
(134, 3, 3, 0),
(135, 3, 53, 1),
(136, 5, 77, 1),
(137, 5, 78, 1),
(138, 5, 79, 1),
(139, 3, 81, 1),
(140, 3, 80, 1),
(141, 4, 86, 1),
(142, 4, 87, 1),
(143, 3, 88, 0),
(144, 3, 89, 0),
(145, 3, 90, 1),
(146, 3, 91, 1),
(147, 4, 92, 1),
(148, 3, 93, 1),
(149, 3, 94, 1),
(150, 5, 248, 1),
(151, 6, 248, 1),
(152, 5, 86, 1),
(153, 5, 119, 1),
(154, 5, 118, 1),
(155, 5, 120, 1),
(156, 5, 121, 1),
(157, 5, 125, 0),
(158, 5, 126, 1),
(159, 5, 127, 1),
(160, 5, 124, 1),
(161, 8, 112, 1),
(162, 8, 113, 1),
(163, 8, 114, 1),
(164, 8, 115, 1),
(165, 8, 116, 1),
(166, 8, 117, 1),
(167, 8, 122, 1),
(168, 8, 123, 1),
(169, 8, 133, 1),
(170, 5, 133, 1),
(171, 8, 249, 1),
(172, 6, 92, 1),
(173, 6, 93, 1),
(174, 6, 94, 1),
(175, 6, 125, 1),
(176, 6, 126, 1),
(177, 6, 127, 1),
(178, 8, 129, 1),
(179, 8, 130, 1),
(180, 8, 131, 0),
(181, 8, 132, 1),
(182, 8, 128, 1),
(183, 8, 250, 1),
(184, 6, 252, 1),
(185, 6, 254, 0),
(186, 6, 253, 0),
(187, 6, 255, 0),
(188, 6, 256, 1),
(189, 6, 250, 1),
(190, 6, 257, 1),
(191, 6, 258, 1),
(192, 6, 259, 1),
(193, 6, 260, 1),
(194, 6, 261, 1),
(195, 6, 262, 0),
(196, 5, 262, 1),
(197, 4, 112, 1),
(198, 4, 129, 1),
(199, 4, 131, 1),
(200, 4, 88, 1),
(201, 4, 89, 1),
(202, 4, 73, 1),
(203, 7, 72, 1),
(204, 7, 53, 1),
(205, 7, 65, 1),
(206, 6, 53, 1),
(207, 4, 53, 1),
(208, 6, 68, 0),
(209, 7, 68, 1),
(210, 3, 263, 1),
(211, 3, 264, 1),
(212, 5, 263, 1),
(213, 5, 264, 1),
(214, 6, 263, 1),
(215, 6, 264, 1),
(216, 7, 263, 1),
(217, 7, 264, 1),
(218, 3, 265, 1),
(219, 4, 265, 1),
(220, 5, 265, 1),
(221, 6, 265, 1),
(222, 7, 265, 1),
(223, 3, 266, 1),
(224, 4, 266, 1),
(225, 5, 266, 1),
(226, 6, 266, 1),
(227, 7, 266, 1),
(228, 4, 273, 1),
(229, 3, 267, 1),
(230, 3, 268, 1),
(231, 3, 269, 1),
(232, 5, 275, 1),
(233, 5, 276, 1),
(234, 7, 277, 1),
(235, 7, 269, 1),
(236, 7, 279, 0),
(237, 3, 279, 1),
(238, 5, 278, 1),
(239, 4, 263, 1),
(240, 4, 264, 1),
(241, 3, 73, 1),
(242, 3, 75, 1),
(243, 3, 277, 1),
(244, 2, 206, 1),
(245, 2, 280, 1),
(246, 2, 281, 1),
(247, 2, 282, 0),
(248, 6, 280, 1),
(249, 6, 282, 1),
(250, 6, 283, 1),
(251, 6, 284, 1),
(252, 6, 285, 1),
(253, 5, 286, 1),
(254, 6, 287, 1),
(255, 6, 288, 1),
(256, 5, 283, 1),
(257, 5, 284, 1),
(258, 6, 286, 1),
(259, 2, 289, 1),
(260, 2, 290, 1),
(261, 2, 291, 1),
(262, 2, 292, 1),
(263, 2, 251, 1),
(264, 6, 251, 1),
(265, 6, 292, 1),
(266, 2, 293, 1),
(267, 2, 294, 1),
(268, 6, 294, 1),
(269, 5, 294, 0),
(270, 2, 295, 1),
(271, 6, 296, 1),
(272, 2, 297, 1),
(273, 6, 297, 1),
(274, 2, 298, 1),
(275, 6, 299, 1),
(276, 6, 300, 1),
(277, 6, 301, 1),
(278, 6, 302, 1),
(279, 6, 303, 1),
(280, 2, 304, 1),
(281, 2, 305, 1),
(282, 6, 293, 1),
(283, 2, 253, 1),
(284, 2, 254, 1),
(285, 2, 255, 1),
(286, 2, 256, 1),
(287, 2, 259, 1),
(288, 2, 306, 1),
(289, 2, 252, 1),
(290, 6, 307, 1),
(291, 6, 309, 1),
(292, 6, 310, 1),
(293, 2, 308, 1),
(294, 3, 96, 1),
(295, 3, 97, 1),
(296, 3, 98, 1),
(297, 3, 99, 1),
(298, 3, 100, 1),
(299, 3, 101, 1),
(300, 5, 102, 1),
(301, 5, 103, 1),
(302, 5, 104, 1),
(303, 3, 190, 0),
(304, 5, 190, 0),
(305, 3, 95, 1),
(306, 5, 95, 1),
(307, 12, 251, 1),
(308, 13, 292, 1),
(309, 10, 311, 1),
(310, 6, 311, 1),
(311, 10, 312, 1),
(312, 6, 312, 1),
(313, 6, 314, 1),
(314, 10, 314, 1),
(315, 10, 313, 1),
(316, 10, 315, 1),
(317, 6, 315, 1),
(318, 6, 316, 1),
(319, 10, 317, 1),
(320, 6, 317, 1),
(321, 10, 318, 1),
(322, 10, 319, 1),
(323, 6, 319, 1),
(324, 10, 320, 1),
(325, 10, 321, 1),
(326, 10, 322, 1),
(327, 10, 316, 1),
(328, 8, 324, 1),
(329, 11, 324, 1),
(330, 11, 330, 1),
(331, 8, 330, 1),
(332, 11, 331, 1),
(333, 11, 332, 1),
(334, 11, 333, 0),
(335, 11, 335, 1),
(336, 8, 334, 1),
(337, 8, 327, 1),
(338, 8, 326, 1),
(339, 8, 325, 1),
(340, 8, 328, 1),
(341, 4, 323, 1),
(342, 8, 323, 1),
(343, 11, 323, 1),
(344, 8, 336, 1),
(345, 8, 329, 1),
(346, 6, 329, 0),
(347, 6, 323, 0),
(348, 11, 337, 1),
(349, 8, 337, 1),
(350, 11, 338, 1),
(351, 11, 339, 1),
(352, 4, 340, 1),
(353, 4, 324, 1),
(354, 4, 330, 1),
(355, 4, 341, 1),
(356, 4, 342, 1),
(357, 4, 343, 1),
(358, 4, 344, 1),
(359, 4, 345, 1),
(360, 4, 346, 1),
(361, 4, 347, 1),
(362, 4, 348, 1),
(363, 4, 349, 1),
(364, 4, 327, 1),
(365, 4, 337, 0),
(366, 4, 332, 1),
(367, 4, 350, 1),
(368, 4, 351, 1),
(369, 4, 352, 1),
(370, 4, 353, 1),
(371, 4, 354, 1),
(372, 4, 355, 1),
(373, 4, 356, 1),
(374, 4, 357, 1),
(375, 4, 358, 1),
(376, 4, 359, 1),
(377, 6, 227, 1),
(378, 6, 228, 1),
(379, 6, 229, 1),
(380, 6, 230, 1),
(381, 6, 231, 1),
(382, 6, 361, 1),
(383, 6, 360, 1),
(384, 6, 362, 0),
(385, 8, 362, 1),
(386, 8, 228, 1),
(387, 12, 227, 0),
(388, 11, 227, 1),
(389, 11, 228, 1),
(390, 11, 363, 1),
(391, 11, 364, 1),
(392, 11, 365, 1),
(393, 3, 367, 1),
(394, 3, 368, 1),
(395, 3, 370, 1),
(396, 3, 369, 1),
(397, 3, 371, 1),
(398, 3, 372, 1),
(399, 3, 18, 1),
(400, 3, 373, 1),
(401, 3, 375, 1),
(402, 3, 376, 1),
(403, 3, 377, 1),
(404, 3, 378, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rongsok`
--

CREATE TABLE `rongsok` (
  `id` int(11) NOT NULL,
  `kode_rongsok` varchar(25) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `alias` varchar(50) NOT NULL,
  `type_barang` varchar(25) NOT NULL,
  `remarks` text,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rongsok`
--

INSERT INTO `rongsok` (`id`, `kode_rongsok`, `nama_item`, `uom`, `description`, `alias`, `type_barang`, `remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'CAKBE', 'CANGKUL BEKAS', 'KG', '', 'CANGKUL', 'Rongsok', NULL, '2018-01-24 09:01:04', 1, '2018-12-18 11:12:21', 1),
(2, '', 'POTONGAN PIPA BAJA', 'KG', '', 'BAJA', 'Rongsok', NULL, '2018-01-24 09:01:36', 1, '2018-12-18 11:12:21', 1),
(3, '', 'INGOT RENDAH 1', 'KG', '', '', 'Ingot Rendah', NULL, '2018-02-24 10:02:40', 1, '2018-02-24 10:02:40', 1),
(4, '', 'INGOT RENDAH 2', 'KG', '', '', 'Ingot Rendah', NULL, '2018-02-24 10:02:52', 1, '2018-02-24 10:02:52', 1),
(5, '', 'INGOT RENDAH 3', 'KG', '', '', 'Ingot Rendah', NULL, '2018-02-24 10:02:02', 1, '2018-02-24 10:02:02', 1),
(6, '', 'INGOT RENDAH 4', 'KG', '', '', 'Ingot Rendah', NULL, '2018-02-24 10:02:22', 1, '2018-02-24 10:02:22', 1),
(7, '', 'BS', 'KG', '', 'BS', 'BS', NULL, '2018-10-16 09:31:22', 1, '2018-10-01 00:00:00', 0),
(8, '', 'SISA WIP', 'KG', 'SISA MASAK WIP', '', 'WIP', NULL, '2018-10-22 17:49:24', 1, '2018-10-22 18:51:31', 1),
(9, '01A0001', 'A-BCW TIPE 1', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '2019-01-07 07:01:22', 1),
(10, '01A0002', 'A-BCW TIPE 2', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '2019-01-07 07:01:22', 1),
(11, '01AA001', 'ABU APOLLO ', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, '01AR001', 'A - RAMBUT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, '01B0001', 'BC', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, '01B0002', 'TRAVO', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, '01B0003', 'COVERTAPE', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, '01B0004', 'COPPER SCRAP 2,90 MM - 3,20 MM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, '01BB001', 'B-BAKAR', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, '01BL001', 'B-LAUT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, '01BS001', 'BS SDM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, '01BS002', 'BS ROLLING', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, '01BS003', 'BS APOLLO', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, '01BS004', 'BS INGOT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, '01BS005', 'BS PRODUKSI 2.90', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, '01BS007', 'BS QC', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, '01BS008', 'TEMBAGA RONGSOK 8 MM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, '01BS009', 'BS TALI CUCI', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, '01BS010', 'BS KAWAT RAMBUT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, '01BS011', 'AMPAS APOLLO', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, '01BS012', 'SERBUK APOLLO', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, '01BS013', 'SERBUK ROLLING', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, '01BS014', 'SERBUK DRAWING SDM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, '01BS015', 'BCW 0,50 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, '01BS016', 'BCW 0,60 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, '01BS017', 'BCW 1,00 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, '01BS018', 'BCW 1,38 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, '01BS019', 'BCW 1,50 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, '01BS020', 'BCW 1,78 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, '01BS021', 'BCW 2,76 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, '01BS022', 'BCW 0,67 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, '01BS023', 'BCW 0,78 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, '01BS024', 'BCW 0,85 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, '01BS025', 'BCC', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, '01BS026', '0,40 MM TINNED', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, '01BS027', '0,45 MM TINNED', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, '01BS028', '0,50 MM TINNED', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, '01BS029', 'BCW 2,26 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, '01BS030', 'BCW 3,55 MM SOFT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, '01BS031', '0,12 MM TINNED', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, '01BS032', '0,18 MM TINNED', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, '01BS034', 'BCW 0,12 MM SOFT TMS', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, '01BS035', 'BS 8,00 MM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, '01BS036', 'KURASAN ROLLING', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, '01BS037', 'SERBUK CUCIAN 8,00 MM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, '01BS038', 'BLEBEK DRAWING SDM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, '01BS039', 'BS TEMBAGA', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, '01BS040', 'BS 13,50 - 17,50 MM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, '01BT002', 'B-TELPON', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, '01C0001', 'COPPER SCRAP 2,80 MM - 3,20 MM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, '01C0002', 'CU WIRE C/W', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, '01C0003', 'COPPER SCRAP 2,80 MM - 3,20 MM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, '01D0001', 'DINAMO ', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, '01D0002', 'DINAMO BARU', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, '01D0003', 'DINAMO HALUS', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, '01D0004', 'D-KALENG', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, '01DD001', 'DANDANG', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, '01E0001', 'ENAMELL ', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, '01I0001', 'TEMBAGA INGOT RENDAH', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, '01LP001', 'LUMPUR TEMBAGA', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, '01M0001', 'MANGKUK CU', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, '01P0003', 'PLAT', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '2018-12-17 04:12:53', 1),
(71, '01PB001', 'PIPA BARU', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, '01PP001', 'PLAT PANEL', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, '01PR001', 'PIPA RONGSOKAN TEMBAGA', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, '01PT001', 'PLAT TEMBAGA', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, '01S0001', 'SERUTAN', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, '01SD001', 'SERBUK DRAWING', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, '01T0001', 'TEMBAGA PUTIH', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, '01T0005', 'TEMBAGA AFKIR 8 MM', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, '01T0006', 'AMPAS TEMBAGA', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(4, 'DTR-R.201901.0004', '2019-01-27', 20, 3, 3, '2019-01-27 08:01:35', 10),
(6, 'DTR-R.201901.0006', '2019-01-27', 26, 4, 3, '2019-01-27 07:01:08', 10),
(7, 'DTR-R.201901.0007', '2019-01-28', 29, 5, 2, '2019-01-28 10:01:49', 9);

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
(19, 4, 43, 0, 78, 13, 65, '020119153512ESK', ''),
(20, 4, 44, 0, 89, 15, 74, '020119153522KVA', ''),
(21, 4, 45, 0, 56, 12, 44, '020119153534OGB', ''),
(22, 4, 50, 0, 15, 2, 13, '020119153819GZQ', ''),
(26, 6, 61, 0, 20, 3, 17, '02011915385IRR', ''),
(27, 6, 48, 0, 50, 4, 46, '07011918159QZA', ''),
(28, 6, 50, 0, 38, 8, 30, '02011915415MUY', ''),
(29, 7, 61, 0, 40, 12, 28, '020119154045LJU', ''),
(30, 7, 43, 0, 58, 8, 50, '07011918242GFY', '');

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
(4, 'TTR-R.201901.0004', '2019-01-27', 4, 3, '', '2019-01-27 08:01:35', 10),
(6, 'TTR-R.201901.0006', '2019-01-27', 6, 3, '', '2019-01-27 07:01:08', 10),
(7, 'TTR-R.201901.0007', '2019-01-28', 7, 2, '', '2019-01-28 10:01:49', 9);

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
(12, 4, 19, 43, 0, 78, 65, '', '2019-01-27 08:01:35', 10),
(13, 4, 20, 44, 0, 89, 74, '', '2019-01-27 08:01:35', 10),
(14, 4, 21, 45, 0, 56, 44, '', '2019-01-27 08:01:35', 10),
(15, 4, 22, 50, 0, 15, 13, '', '2019-01-27 08:01:35', 10),
(19, 6, 26, 61, 0, 20, 17, '', '2019-01-27 07:01:08', 10),
(20, 6, 27, 48, 0, 50, 46, '', '2019-01-27 07:01:08', 10),
(21, 6, 28, 50, 0, 38, 30, '', '2019-01-27 07:01:08', 10),
(22, 7, 29, 61, 0, 40, 28, '', '2019-01-28 10:01:49', 9),
(23, 7, 30, 43, 0, 58, 50, '', '2019-01-28 10:01:49', 9);

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
  `remarks` text,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_invoice`
--

INSERT INTO `r_t_invoice` (`id`, `invoice_id`, `no_invoice_resmi`, `sjr_id`, `r_po_id`, `tanggal`, `jumlah`, `remarks`, `created_by`, `created_at`) VALUES
(3, 3, 'INV-20192501.0001', 20, 5, '2019-01-25', 188, '', 9, '2019-01-25 06:01:55'),
(4, 5, 'INV-2019.0001', 26, 6, '2019-01-27', 92, '', 9, '2019-01-27 07:01:26'),
(5, 8, 'INV-2019.28.01', 29, 7, '2019-01-28', 56, 'TEST 28', 9, '2019-01-28 10:01:24');

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
(26, 3, 9, 43, 78, 65, 13, ''),
(27, 3, 10, 44, 89, 74, 15, ''),
(28, 3, 11, 45, 56, 44, 12, ''),
(29, 3, 13, 50, 15, 13, 2, ''),
(30, 4, 12, 61, 20, 17, 3, ''),
(33, 4, 16, 48, 50, 46, 4, ''),
(34, 4, 15, 50, 38, 30, 8, ''),
(35, 5, 14, 61, 40, 28, 12, ''),
(36, 5, 18, 43, 58, 50, 8, '');

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

INSERT INTO `r_t_inv_jasa` (`id`, `no_invoice_jasa`, `sjr_id`, `r_t_so_id`, `r_t_po_id`, `customer_id`, `tanggal`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(6, 'INV-J.TRADECO.0001', 22, 3, 0, 3, '2019-01-27', 'SJ DARI SO', '2019-01-27 09:01:11', 11, '2019-01-27 09:01:12', 11),
(10, 'INV-J.TRADECO.0004', 25, 0, 5, 3, '2019-01-27', 'TEST INV JASA PO', '2019-01-27 10:01:33', 11, '2019-01-27 10:01:28', 11),
(11, 'INV-PO.TRD.0002', 27, NULL, 6, 3, '2019-01-27', 'INV PO 2ND', '2019-01-27 07:01:20', 9, '2019-01-27 07:01:22', 9),
(12, 'INV-SO.TRD.0002', 28, 4, NULL, 3, '2019-01-27', 'INV SO 2ND', '2019-01-27 07:01:38', 9, '2019-01-27 07:01:41', 9),
(13, 'INV-J.SO.TRD.0003', 30, 5, NULL, 4, '2019-01-28', '', '2019-01-28 11:01:26', 9, '2019-01-28 11:01:41', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_inv_jasa_detail`
--

CREATE TABLE `r_t_inv_jasa_detail` (
  `id` int(11) NOT NULL,
  `inv_jasa_id` int(11) NOT NULL,
  `so_detail_id` int(11) NOT NULL,
  `po_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `line_remarks` text NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_inv_jasa_detail`
--

INSERT INTO `r_t_inv_jasa_detail` (`id`, `inv_jasa_id`, `so_detail_id`, `po_detail_id`, `jenis_barang_id`, `qty`, `bruto`, `netto`, `amount`, `total_amount`, `line_remarks`, `modified_at`, `modified_by`) VALUES
(7, 6, 5, 0, 409, 0, 0, 128, 130000, 16640000, '', '2019-01-27 09:01:12', 11),
(8, 6, 6, 0, 409, 0, 0, 60, 130000, 7800000, '', '2019-01-27 09:01:12', 11),
(11, 10, 0, 5, 409, 0, 0, 128, 130000, 16640000, 'BARANG RONGSOK', '2019-01-27 10:01:28', 11),
(12, 10, 0, 6, 409, 0, 0, 60, 130000, 7800000, 'BARANG RONGSOK', '2019-01-27 10:01:28', 11),
(13, 11, 0, 7, 450, 0, 0, 35, 100000, 3500000, 'BARANG RONGSOK', '2019-01-27 07:01:22', 9),
(14, 11, 0, 8, 450, 0, 0, 24, 100000, 2400000, 'BARANG RONGSOK', '2019-01-27 07:01:22', 9),
(15, 11, 0, 9, 450, 0, 0, 33, 100000, 3300000, 'BARANG RONGSOK', '2019-01-27 07:01:22', 9),
(16, 12, 7, 0, 450, 0, 0, 35, 100000, 3500000, '', '2019-01-27 07:01:41', 9),
(17, 12, 8, 0, 450, 0, 0, 24, 100000, 2400000, '', '2019-01-27 07:01:41', 9),
(18, 12, 9, 0, 450, 0, 0, 33, 100000, 3300000, '', '2019-01-27 07:01:41', 9),
(19, 13, 10, 0, 11, 0, 0, 56, 35000, 1960000, '', '2019-01-28 11:01:41', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_po`
--

CREATE TABLE `r_t_po` (
  `id` int(11) NOT NULL,
  `no_po` varchar(25) NOT NULL,
  `f_invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `term_of_payment` varchar(25) NOT NULL,
  `jenis_po` varchar(25) NOT NULL,
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

INSERT INTO `r_t_po` (`id`, `no_po`, `f_invoice_id`, `customer_id`, `tanggal`, `term_of_payment`, `jenis_po`, `flag_so`, `flag_sj`, `flag_dp`, `flag_pelunasan`, `status`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(5, 'PO-TRADECO.021931', 3, 3, '2019-01-27', 'CASH', 'JASA', 3, 25, 0, 0, 0, 'TEST PO', '2019-01-27 08:01:53', 9, '2019-01-27 08:01:00', 9),
(6, 'PO.TRADECO', 5, 3, '2019-01-24', 'CASH', 'JASA', 4, 27, 0, 0, 0, 'PO 2ND', '2019-01-27 07:01:11', 9, '2019-01-27 07:01:18', 9),
(7, 'PO-TRD.0003', 8, 4, '2019-01-29', '1 BULAN', 'JASA', 5, 0, 0, 0, 0, '', '2019-01-28 10:01:31', 9, '2019-01-28 11:01:39', 9);

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
(5, 5, 409, 1, 0, 128, 130000, 16640000, 'BARANG RONGSOK'),
(6, 5, 409, 1, 0, 60, 130000, 7800000, 'BARANG RONGSOK'),
(7, 6, 450, 1, 0, 35, 100000, 3506800, 'BARANG RONGSOK'),
(8, 6, 450, 1, 0, 24, 100000, 2400000, 'BARANG RONGSOK'),
(9, 6, 450, 1, 0, 33, 100000, 3300000, 'BARANG RONGSOK'),
(10, 7, 11, 1, 0, 56, 35000, 1960000, 'BARANG FG');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_so`
--

CREATE TABLE `r_t_so` (
  `id` int(11) NOT NULL,
  `no_so` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `marketing_id` int(11) NOT NULL,
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

INSERT INTO `r_t_so` (`id`, `no_so`, `tanggal`, `marketing_id`, `customer_id`, `po_id`, `sjr_id`, `tgl_po`, `jenis_so`, `jenis_barang`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(3, 'TFG.201812.0001', '2019-01-27', 11, 3, 3, 22, '2019-01-27', 'JASA', 'FG', 'TEST SO', '2019-01-27 09:01:38', 11, '2019-01-27 09:01:43', 11),
(4, 'SO.TRD.0002', '2019-01-26', 12, 3, 4, 28, '2019-01-24', 'JASA', 'FG', 'SO 2ND', '2019-01-27 07:01:16', 12, '2019-01-27 07:01:24', 12),
(5, 'SO.TRD.0003', '2019-01-31', 9, 4, 5, 30, '2019-01-29', 'JASA', 'FG', '', '2019-01-28 11:01:35', 9, '2019-01-28 11:01:20', 9);

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
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `line_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_so_detail`
--

INSERT INTO `r_t_so_detail` (`id`, `so_id`, `po_detail_id`, `jenis_barang_id`, `qty`, `bruto`, `netto`, `amount`, `total_amount`, `line_remarks`) VALUES
(5, 3, 5, 409, 0, 0, 128, 130000, 16640000, ''),
(6, 3, 6, 409, 0, 0, 60, 130000, 7800000, ''),
(7, 4, 7, 450, 0, 0, 35, 100000, 3506800, ''),
(8, 4, 8, 450, 0, 0, 24, 100000, 2400000, ''),
(9, 4, 9, 450, 0, 0, 33, 100000, 3300000, ''),
(10, 5, 10, 11, 0, 0, 56, 35000, 1960000, '');

-- --------------------------------------------------------

--
-- Table structure for table `r_t_surat_jalan`
--

CREATE TABLE `r_t_surat_jalan` (
  `id` int(11) NOT NULL,
  `no_sj_resmi` varchar(20) NOT NULL,
  `r_invoice_id` int(11) DEFAULT '0',
  `r_so_id` int(11) DEFAULT '0',
  `r_po_id` int(11) DEFAULT '0',
  `r_inv_jasa_id` int(11) DEFAULT '0',
  `flag_tolling` int(1) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `m_customer_id` int(11) DEFAULT NULL,
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

INSERT INTO `r_t_surat_jalan` (`id`, `no_sj_resmi`, `r_invoice_id`, `r_so_id`, `r_po_id`, `r_inv_jasa_id`, `flag_tolling`, `tanggal`, `jenis_barang`, `m_customer_id`, `m_type_kendaraan_id`, `no_kendaraan`, `supir`, `remarks`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(20, 'SJ.TRADECO.0005', 3, 0, 0, 0, 1, '2019-01-27', 'RONGSOK', 3, 4, 'BE 1938 NE', 'BELO', 'TEST SJ MATCHING', '2019-01-27 08:01:09', 9, '2019-01-27 08:01:21', 9),
(22, 'SJ.TRADECO.0006', 0, 3, 0, 6, 0, '2019-01-27', 'FG', 3, 4, 'BE 1960 NE', 'MICHAEL', 'TEST SJ SO', '2019-01-27 09:01:32', 11, '2019-01-27 10:01:49', 11),
(25, 'SJ.TRADECO.0007', 0, 0, 5, 10, 0, '2019-01-27', 'FG', 3, 3, 'BE 1938 NE', 'BELO', 'TEST SJ DARI PO', '2019-01-27 10:01:33', 11, '2019-01-27 10:01:35', 11),
(26, 'SJ-TRD.0002', 4, 0, 0, 0, 1, '2019-01-27', 'RONGSOK', 3, 4, 'BE 8924 NE', 'BELO', 'SJ 2ND', '2019-01-27 07:01:39', 9, '2019-01-27 07:01:42', 9),
(27, 'SJ.PO-TRD.0002', 0, 0, 6, 11, 0, '2019-01-27', 'FG', 3, 2, 'BE 1956 NE', 'BELLO', 'SJ PO 2ND', '2019-01-27 07:01:49', 12, '2019-01-27 07:01:51', 12),
(28, 'SJ.SO-TRD.0002', 0, 4, 0, 12, 0, '2019-01-27', 'FG', 3, 1, 'BE 1948 NE', 'BELO', 'SJ SO 2ND', '2019-01-27 07:01:00', 9, '2019-01-27 07:01:02', 9),
(29, 'SJ-TRD.0003', 5, 0, 0, 0, 1, '2019-01-28', 'RONGSOK', 2, 4, 'BE 8924 NE', 'BELO', 'TEST SJ.0003 CV KE KMP', '2019-01-28 10:01:59', 9, '2019-01-28 10:01:26', 9),
(30, 'SJ-TRD.0003.4', 0, 5, 0, 13, 0, '2019-01-28', 'FG', 4, 4, 'BE 8924 NE', 'BELLO', 'TESST KMP KE CV', '2019-01-28 11:01:47', 9, '2019-01-28 11:01:02', 9);

-- --------------------------------------------------------

--
-- Table structure for table `r_t_surat_jalan_detail`
--

CREATE TABLE `r_t_surat_jalan_detail` (
  `id` int(11) NOT NULL,
  `sj_resmi_id` int(11) NOT NULL,
  `so_detail_id` int(11) NOT NULL DEFAULT '0',
  `po_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `no_packing` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `bobbin_id` int(11) DEFAULT NULL,
  `line_remarks` text NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_t_surat_jalan_detail`
--

INSERT INTO `r_t_surat_jalan_detail` (`id`, `sj_resmi_id`, `so_detail_id`, `po_detail_id`, `jenis_barang_id`, `no_packing`, `qty`, `bruto`, `netto`, `bobbin_id`, `line_remarks`, `modified_at`, `modified_by`) VALUES
(61, 20, 0, 0, 43, '020119153512ESK', 0, 78, 65, NULL, '', '0000-00-00 00:00:00', 0),
(62, 20, 0, 0, 44, '020119153522KVA', 0, 89, 74, NULL, '', '0000-00-00 00:00:00', 0),
(63, 20, 0, 0, 45, '020119153534OGB', 0, 56, 44, NULL, '', '0000-00-00 00:00:00', 0),
(64, 20, 0, 0, 50, '020119153819GZQ', 0, 15, 13, NULL, '', '0000-00-00 00:00:00', 0),
(65, 22, 5, 0, 409, '', 0, 0, 128, NULL, '', '0000-00-00 00:00:00', 0),
(66, 22, 6, 0, 409, '', 0, 0, 60, NULL, '', '0000-00-00 00:00:00', 0),
(69, 25, 0, 5, 409, '', 0, 0, 128, NULL, 'BARANG RONGSOK', '0000-00-00 00:00:00', 0),
(70, 25, 0, 6, 409, '', 0, 0, 60, NULL, 'BARANG RONGSOK', '0000-00-00 00:00:00', 0),
(71, 26, 0, 0, 61, '02011915385IRR', 0, 20, 17, NULL, '', '0000-00-00 00:00:00', 0),
(72, 26, 0, 0, 48, '07011918159QZA', 0, 50, 46, NULL, '', '0000-00-00 00:00:00', 0),
(73, 26, 0, 0, 50, '02011915415MUY', 0, 38, 30, NULL, '', '0000-00-00 00:00:00', 0),
(74, 27, 0, 7, 450, '', 0, 0, 35, NULL, 'BARANG RONGSOK', '0000-00-00 00:00:00', 0),
(75, 27, 0, 8, 450, '', 0, 0, 24, NULL, 'BARANG RONGSOK', '0000-00-00 00:00:00', 0),
(76, 27, 0, 9, 450, '', 0, 0, 33, NULL, 'BARANG RONGSOK', '0000-00-00 00:00:00', 0),
(77, 28, 7, 0, 450, '', 0, 0, 35, NULL, '', '0000-00-00 00:00:00', 0),
(78, 28, 8, 0, 450, '', 0, 0, 24, NULL, '', '0000-00-00 00:00:00', 0),
(79, 28, 9, 0, 450, '', 0, 0, 33, NULL, '', '0000-00-00 00:00:00', 0),
(80, 29, 0, 0, 61, '020119154045LJU', 0, 40, 28, NULL, '', '0000-00-00 00:00:00', 0),
(81, 29, 0, 0, 43, '07011918242GFY', 0, 58, 50, NULL, '', '0000-00-00 00:00:00', 0),
(82, 30, 10, 0, 11, '', 0, 0, 56, NULL, '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `no_sales_order` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `flag_tolling` int(1) NOT NULL,
  `flag_ppn` tinyint(1) NOT NULL,
  `flag_invoice` int(2) NOT NULL,
  `flag_sj` int(2) NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `no_sales_order`, `tanggal`, `m_customer_id`, `flag_tolling`, `flag_ppn`, `flag_invoice`, `flag_sj`, `marketing_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(3, 'SO.201901.0005', '2019-01-04', 3, 0, 0, 1, 1, 1, '2019-01-04 01:01:55', 1, '2019-01-04 01:01:11', 1),
(4, 'SO.201901.0006', '2019-01-09', 6, 0, 0, 1, 1, 1, '2019-01-09 02:01:39', 1, '2019-01-09 02:01:31', 1),
(5, 'SO.201901.0007', '2019-01-10', 3, 0, 0, 1, 1, 1, '2019-01-10 04:01:51', 1, '2019-01-10 04:01:26', 1),
(6, 'SO.201901.0008', '2019-01-14', 4, 0, 0, 1, 1, 1, '2019-01-14 01:01:46', 1, '2019-01-14 01:01:16', 1),
(7, 'SO.201901.0009', '2019-01-15', 5, 0, 0, 1, 1, 1, '2019-01-15 10:01:42', 1, '2019-01-15 10:01:47', 1),
(8, 'SO.201901.0010', '2019-01-15', 6, 0, 0, 1, 1, 1, '2019-01-15 11:01:29', 1, '2019-01-15 11:01:06', 1),
(9, 'SO.201901.0011', '2019-01-15', 5, 0, 0, 1, 1, 1, '2019-01-15 03:01:13', 1, '2019-01-15 03:01:40', 1),
(11, 'SO.201901.0013', '2019-01-22', 5, 0, 0, 0, 1, 1, '2019-01-22 04:01:35', 1, '2019-01-22 04:01:52', 1),
(17, 'SO.201901.0019', '2019-01-23', 3, 2, 0, 0, 0, 1, '2019-01-23 02:01:24', 1, '2019-01-23 05:01:24', 1),
(18, 'SO.201901.0020', '2019-01-28', 6, 0, 0, 1, 1, 1, '2019-01-28 04:01:25', 1, '2019-01-28 04:01:32', 1),
(19, 'SO.201901.0021', '2019-01-29', 11, 0, 0, 0, 0, 1, '2019-01-29 10:01:13', 1, '2019-01-29 12:01:47', 1),
(20, 'SO.201901.0022', '2019-01-29', 15, 0, 0, 1, 1, 1, '2019-01-29 01:01:34', 1, '2019-02-06 02:02:02', 1),
(21, 'SO.201901.0023', '2019-01-29', 26, 0, 0, 1, 1, 1, '2019-01-29 02:01:22', 1, '2019-01-29 02:01:30', 1),
(22, 'SO.201901.0024', '2019-01-29', 3, 0, 0, 2, 1, 1, '2019-01-29 07:01:55', 1, '2019-01-29 07:01:55', 1),
(23, 'SO.201902.0001', '2019-02-11', 5, 1, 0, 0, 0, 8, '2019-02-11 03:02:15', 8, '2019-02-13 05:02:10', 8),
(24, 'SO.201902.0002', '2019-02-13', 60, 0, 0, 0, 0, 8, '2019-02-13 05:02:43', 8, '2019-02-13 05:02:07', 8);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_detail`
--

CREATE TABLE `sales_order_detail` (
  `id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `no_spb_detail` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_detail`
--

INSERT INTO `sales_order_detail` (`id`, `sales_order_id`, `no_spb_detail`, `jenis_barang_id`, `netto`, `amount`, `total_amount`, `modified`, `modified_by`) VALUES
(9, 17, 14, 450, 150, 300000, 45000000, '0000-00-00 00:00:00', 0),
(10, 17, 15, 400, 50, 500000, 25000000, '0000-00-00 00:00:00', 0),
(11, 23, 29, 400, 150, 200000, 30000000, '0000-00-00 00:00:00', 0),
(12, 23, 30, 424, 200, 250000, 50000000, '0000-00-00 00:00:00', 0);

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
(3, ' @ 25 K', 'KG', '', '06AA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'A', 'KG', '', '06AB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, ' (BUSA) DM 9', 'PAIL', '', '06AF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'AIR KERAS', 'KG', '', '06AK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'ALUM', 'GALON', '', '06AL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'NG MORTAR TYPE TRISET', 'PAIL', '', '06AS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'SK-36 UK.20*114*65 PERSEGI ST', 'BUAH', '', '06BA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'SK-36 UK.230*114*65/55 SERON', 'BUAH', '', '06BA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'NGO', 'KG', '', '06CI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'C-16 @25K', 'KG', '', '06CS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'RC-1 @ 20 LT', 'PAIL', '', '06DL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'K SK 36 @ 5 TO', 'SET', '', '06FB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'K SK 36 @ 10 TO', 'SET', '', '06FB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'K ( INDOPORLEN ) SK-36 @ 10 TO', 'SET', '', '06FB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'K SK-32 TYPE A', 'BUAH', '', '06FB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'K SK-36 TYPE A', 'BUAH', '', '06FB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 'K SK-36 TIPE : C', 'BUAH', '', '06FB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'K SK-36 TYPE : ', 'BUAH', '', '06FB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'RAW WD 410', 'DRUM', '', '06HD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'D', 'COLD', '', '06JP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'GOR UK. 120 X 24 MT', 'ROLL', '', '06KB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'EN', 'BTG', '', '06KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, ' 250', 'DRUM', '', '06LU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'LUBRICANT 200', 'DRUM', '', '06LU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'MASKER PLASTI', 'BUAH', '', '06MP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'MEIDRAW 101', 'DRUM', '', '06MW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'NATRIUM BISULFI', 'GALON', '', '06NB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 'PASIR SILIC', 'KG', '', '06PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'PASIR TAHAN AP', 'KG', '', '06PT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 'REFKAST 155 @ 25 K', 'KG', '', '06RF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 'SEMEN API SK-36 @ 50 K', 'ZAK', '', '06SA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'SABUN CREAM @ 5 K', 'EMBER', '', '06SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'GREASE MPC 3 NLGI ', 'PAIL', '', '07GS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'GREASE LGHP 2/5 SKF @ 5 K', 'GALON', '', '07GS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'GREASE UNICAL 100 ', 'PAIL', '', '07GU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'MINYAK SOLA', 'LITER', '', '07MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'OLI COMPR', 'PAIL', '', '07OC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 'OLI MEDITRAN S SAE 4', 'DRUM', '', '07OM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 'OLI MEDITRAN S SAE 1', 'DRUM', '', '07OM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 'OLI MEDITRAN SAE 9', 'DRUM', '', '07OM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 'OLI MEDITRAN SAE 4', 'DRUM', '', '07OM005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 'OLI MEDITRAN SAE 1', 'DRUM', '', '07OM006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 'OLI COMPRESSOR KOBELCO SCREW @ 20LT', 'PAIL', '', '07OS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 'PEMADAM KEBAKARAN YAMATO ( YAM-20 L ) @', 'TBG', '', '07PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 'PEMADAM KEBAKARAN (CO2/GAS)@3.2 K', 'TBG', '', '07PK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 'SHELL DIESOLINE ( HSD / SOLAR ', 'LITER', '', '07SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 'AC SPLIT 1 P', 'UNIT', '', '08AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 'AC SPLIT 2 P', 'BUAH', '', '08AC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 'AIR FURIPUR MERK SHARP SC 8', 'UNIT', '', '08AP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 'BANGKU LIPA', 'BUAH', '', '08BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, 'CHARGER H', 'BUAH', '', '08CH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, 'CONNECTO', 'BUAH', '', '08CN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 'COMPUTE', 'UNIT', '', '08CO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 'CENTRIFUGAK PUMP MEGAFLO + MOTOR TEC', 'UNIT', '', '08CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, 'FLAS DIS', 'UNIT', '', '08FD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, 'GENTONG AI', 'BUAH', '', '08GA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, 'GEMBOK 50 MM ( LEHER PANJANG ', 'BUAH', '', '08GE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 'GORDEN JENDEL', 'SET', '', '08GJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 'HP NOKI', 'UNIT', '', '08HP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 'HAND PHONE ESI', 'UNIT', '', '08HP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 'HAND PHONE CROS', 'BUAH', '', '08HP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 'HELM PROYEK + BREKET + FC48 HITA', 'SET', '', '08HP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 'HELM PROYEK + BREKET + FC 48 BENIN', 'SET', '', '08HP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 'HP SAMSUN', 'BUAH', '', '08HPS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 'INSTALASI CAMER', 'TITIK', '', '08IC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, 'INSTALSI KABEL TELEPHON', 'TITIK', '', '08IK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 'INSTALASI LA', 'TITIK', '', '08IL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 'IPA', 'UNIT', '', '08IP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 'JUNCTION BOX +INSTALAS', 'UNIT', '', '08JB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 'KIPAS ANGI', 'UNIT', '', '08KA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 'KIPAS ANGIN DINDING 12 ', 'UNIT', '', '08KA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, 'KOMPOR GA', 'UNIT', '', '08KG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, 'KURSI LIPAT', 'BUAH', '', '08KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, 'KARET MONTING TIMBANGA', 'BUAH', '', '08KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, 'LAMPU EMERGENC', 'BUAH', '', '08LH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, 'LEMARI KAY', 'UNIT', '', '08LK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, 'METERAN AIR TYPE:B CAP.7M3 ACTARI', 'UNIT', '', '08MA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, 'MOBIL COLT DIESEL 125 PS + BOX BES', 'UNIT', '', '08MB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, 'MOBIL TOYOTA INNOVA DIESEL ABU-ABU METAL', 'UNIT', '', '08MB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, 'MOBIL TOYOTA INNOVA SILVER METALIK TAHUN', 'UNIT', '', '08MB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, 'MOBIL NISAN TEANA 2,3 AT TAHUN 200', 'UNIT', '', '08MB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, 'MESIN DIESEL MERK MERC', 'UNIT', '', '08MD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, 'MESIN GURINDA POLES CA', 'UNIT', '', '08MG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(86, 'MEJA KANTO', 'SET', '', '08MJ002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(87, 'MEJA TULI', 'BUAH', '', '08MJ003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(88, 'MESIN SAMBUNG TYPE NTC 10', '', '', '08MS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(89, 'MESIN SAMBUNG TYPE NTC 22', 'SET', '', '08MS009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(90, 'NETBOO', 'UNIT', '', '08NB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(91, 'POMPA AIR DA', 'UNIT', '', '08PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(92, 'PINTU ALUMUNIU', 'SET', '', '08PAR01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(93, 'PRINTER EPSON LQ - 219', 'UNIT', '', '08PE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(94, 'PIPA FLEXYBLE STEANLES STEEL 2\" X 3 MT', 'BTG', '', '08PF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(95, 'PRINTER IP 2770 CANO', 'UNIT', '', '08PI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(96, 'PRINTER SCAN EPSON L - 20', 'UNIT', '', '08PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(97, 'PIPA TEMBAGA 1/2*1/', 'METER', '', '08PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(98, 'RICE COOKE', 'BUAH', '', '08RC000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(99, 'ROOSTERS CONTINENTAL 20*20 C', 'BUAH', '', '08RO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(100, 'SEPATU BOO', 'PSG', '', '08SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(101, 'SCANNE', 'UNIT', '', '08SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(102, 'SEPEDA MOTOR HONDA VARIO TECHNO 12', 'UNIT', '', '08SM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(103, 'AC SPLIT PANASONIC CS PC 9 NKJ 1 P', 'UNIT', '', '08SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(104, 'AC SPLIT PANASONIC CSPC 18 NKP 2 P', 'UNIT', '', '08SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(105, 'SERVICE PRINTER TIMBANGA', 'UNIT', '', '08SPT01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(106, 'SENTRAL TELEPHON', 'UNIT', '', '08ST002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(107, 'SOFTWARE WYDE RECEIVING INDIKATOR DIGI D', 'UNIT', '', '08SW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(108, 'TIMBANGAN MANUAL MDL:TBI CAPS. 500 K', 'UNIT', '', '08TB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(109, 'TELEPHONE CONTRO', 'BUAH', '', '08TC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(110, 'TELEPHONE INTERCO', 'UNIT', '', '08TI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(111, 'TELEPHON', 'UNIT', '', '08TL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(112, 'TELEPHONE + PEMASANGA', 'UNIT', '', '08TL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(113, 'UP', 'UNIT', '', '08UP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(114, 'VIDEO SWITCHE', 'UNIT', '', '08VS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(115, 'ELECTRIC WATER HEATER 100 LT', 'UNIT', '', '08WH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(116, 'WERPA', 'BUAH', '', '08WP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(117, 'SERVICE DIES DIAMOND 0,175M', 'BUAH', '', '0901SDD', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(118, 'ALKOHOL 70 ', 'PAIL', '', '09A0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(119, 'ACETYLI', 'TBG', '', '09A0006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(120, 'AIR ACCU SI', 'JRG', '', '09AA012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(121, 'AS BROWN 9\" x 255 M', 'BTG', '', '09AB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(122, 'ACCU 45 A/ 12 ', 'BUAH', '', '09AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(123, 'AIR CYLINDER KCC TYPE:ACMN LB50-82', 'BUAH', '', '09AC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(124, 'AIR CYLINDER AMLN50 - 20 TP', 'BUAH', '', '09AC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(125, 'AIR CYLINDER KCC TYPE:ACMN AC80-S30', 'BUAH', '', '09AC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(126, 'AIR CYLINDER KCC TYPE : ACMN CA80-S2', 'BUAH', '', '09AC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(127, 'AIR CYLINDER BORE 50MM X AS 20MM X STROK', 'BUAH', '', '09AC007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(128, 'ADAPTOR 12 V @ 1 BUA', 'BUAH', '', '09AD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(129, 'AUTO DRAI', 'UNIT', '', '09AD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(130, 'AIR DRYER FR 050 A', 'UNIT', '', '09AD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(131, 'AIR FILTER MDL T 60 ', 'BUAH', '', '09AF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(132, 'AIR FILTER 711-21111-6601', 'BUAH', '', '09AF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(133, 'AIR FILTER (AIR UNIT)1/4\":WDL:AC 2000-0', 'BUAH', '', '09AF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(134, 'AIR FILTER T 60 ', 'UNIT', '', '09AF006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(135, 'AIR FILTER T 60 ', 'UNIT', '', '09AF007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(136, 'AS KUNINGAN 3 3/4\" X 1,1 MTR @ 65 K', 'BTG', '', '09AK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(137, 'AIR KUNINGAN 0 83 M', 'KG', '', '09AK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(138, 'AS KUNINGAN 9\" x 255 M', 'BTG', '', '09AK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(139, 'ANGKUR 3/4 X 60 C', 'BUAH', '', '09AK006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(140, 'AS KUNINGAN AB-2 1/2\" X 2 MT', 'BTG', '', '09AK007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(141, 'AS KUNINGAN AB-2 UK. 76 MM X 50 C', 'BTG', '', '09AK008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(142, 'AMPER METER CLASS 1,5 UK.144X144 WITH C', 'SET', '', '09AM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 'AS NYLON 0 15 MM', 'METER', '', '09AN008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 'AS NYLON 0 20 MM', 'METER', '', '09AN009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 'AS NYLON 0 25 M', 'METER', '', '09AN010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 'AIR PURIFIER MERK SHARP KC 8', 'UNIT', '', '09AP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 'AS PULL', 'BUAH', '', '09AP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, 'AS ROD', 'BUAH', '', '09AR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 'AMPLAS ROLL 3\"*180*50 ', 'ROLL', '', '09AR007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 'AMPLAS ROLL UK-3\"*400*50 METE', 'ROLL', '', '09AR011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 'AMPLAS ROLL UK. 800 X 50 MT', 'ROLL', '', '09AR012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 'AS STENLESS 35 MM*2500 M', 'BTG', '', '09AS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 'AMPLAS NO.100', 'LBR', '', '09AS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 'AMPLAS NO.80', 'LBR', '', '09AS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 'ADAPTER SLEEVES HE 318 3 1/4\" G', 'BUAH', '', '09AS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 'AIR UNIT KCC TYPE:KAU2000M-02G 1/4', 'BUAH', '', '09AU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 'AIR UNIT KCC TYPE:KAU4000M-04G 1/2', 'BUAH', '', '09AU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 'FRL COMBINATION PORT 1/4\" AC2000-02 PB', 'BUAH', '', '09AU003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 'FRL COMBINATION PORT 1/2\" AC4000-04 PB', 'BUAH', '', '09AU004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 'BESI AS ROL', 'BUAH', '', '09BA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 'BAUT 8*1', 'BUAH', '', '09BA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 'BESI AS SAKUR', 'BUAH', '', '09BA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 'BESI AS ANCURAN 200*8', 'BUAH', '', '09BA006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 'BESI AS ANCURAN (FCD PULLEY)12 \" X 50 C', 'BTG', '', '09BA007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 'BESI AS SCM 440 1/2', 'BTG', '', '09BA008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 'BESI BETON O 19 M', 'BTG', '', '09BB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 'BALL BEARING P/N. 9503 003 5291 - ', 'BUAH', '', '09BB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 'BATTERY CHARGER 12 S/D 24 VOL', 'UNIT', '', '09BC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 'BEARING 22216 B0', 'BUAH', '', '09BE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 'BEARING 5110', 'BUAH', '', '09BE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 'BEARING 5131', 'BUAH', '', '09BE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 'BEARING N 220 EC', 'BUAH', '', '09BE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 'BEARING 290', 'BUAH', '', '09BE005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 'BEARING 291', 'BUAH', '', '09BE006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 'BEARING 6007 Z', 'BUAH', '', '09BE007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 'BEARING 6002 Z', 'BUAH', '', '09BE008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 'BEARING 6201 Z', 'BUAH', '', '09BE009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 'BEARING 6202 Z', 'BUAH', '', '09BE010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 'BEARING 6203 Z', 'BUAH', '', '09BE011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 'BEARING 6204 Z', 'BUAH', '', '09BE012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 'BEARING 6205 Z', 'BUAH', '', '09BE013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 'BEARING 6206 Z', 'BUAH', '', '09BE014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 'BEARING 6207 Z', 'BUAH', '', '09BE015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 'BEARING 6209 Z', 'BUAH', '', '09BE016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 'BEARING 6212 Z', 'BUAH', '', '09BE017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 'BEARING 625 Z', 'BUAH', '', '09BE018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 'BEARING 608 Z', 'BUAH', '', '09BE019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 'BEARING UCF 209 FY', 'BUAH', '', '09BE020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 'BEARING UCF 20', 'BUAH', '', '09BE021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 'BEARING 6310 Z', 'BUAH', '', '09BE022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 'BEARING 5120', 'BUAH', '', '09BE023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 'BEARING 6006 Z', 'BUAH', '', '09BE024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 'BEARING 6208 Z', 'BUAH', '', '09BE025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 'BEARING 6306 Z', 'BUAH', '', '09BE026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 'BEARING 6307 Z', 'BUAH', '', '09BE027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, 'BEARING 6311 Z', 'BUAH', '', '09BE028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, 'BEARING 6312 Z', 'BUAH', '', '09BE029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, 'BEARING 6308 Z', 'BUAH', '', '09BE030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, 'BEARING 6309 Z', 'BUAH', '', '09BE031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, 'BEARING 6000 Z', 'BUAH', '', '09BE032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, 'BEARING 6001 Z', 'BUAH', '', '09BE033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, 'BEARING 6210 Z', 'BUAH', '', '09BE034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, 'BEARING 6302 Z', 'BUAH', '', '09BE035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, 'BEARING 7205 Z', 'BUAH', '', '09BE036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, 'BEARING HR 3030', 'BUAH', '', '09BE037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(206, 'BEARING 6313 Z', 'BUAH', '', '09BE038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(207, 'BEARING 6213 Z', 'BUAH', '', '09BE039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(208, 'BEARING 6304 Z', 'BUAH', '', '09BE040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(209, 'BEARING HC 32307 JR', 'BUAH', '', '09BE041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(210, 'BEARING 6200 Z', 'BUAH', '', '09BE042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(211, 'BEARING 6005 Z', 'BUAH', '', '09BE043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(212, 'BEARING 6303 Z', 'BUAH', '', '09BE044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(213, 'BEARING 6305 Z', 'BUAH', '', '09BE045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(214, 'BEARING 6316 Z', 'BUAH', '', '09BE046', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(215, 'BEARING 634 Z', 'BUAH', '', '09BE047', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(216, 'BEARING NU 31', 'BUAH', '', '09BE048', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(217, 'BEARING 3021', 'BUAH', '', '09BE049', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(218, 'BEARING 51309 F A ', 'BUAH', '', '09BE050', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(219, 'BEARING 6211 Z', 'BUAH', '', '09BE051', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(220, 'BEARING 32218 J', 'BUAH', '', '09BE052', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(221, 'BEARING F 605 Z', 'BUAH', '', '09BE053', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(222, 'BEARING 22312 KOY', 'BUAH', '', '09BE054', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(223, 'BEARING 6004 Z', 'BUAH', '', '09BE055', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(224, 'BEARING LBE 2', 'BUAH', '', '09BE056', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(225, 'BEARING 6410 Z', 'BUAH', '', '09BE057', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(226, 'BEARING 5111', 'BUAH', '', '09BE058', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(227, 'BEARING 3021', 'BUAH', '', '09BE059', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(228, 'BEARING 5112', 'BUAH', '', '09BE060', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(229, 'BEARING SKF 23134 ', 'BUAH', '', '09BE061', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(230, 'BEARING 3030', 'BUAH', '', '09BE063', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(231, 'BEARING 6214 Z', 'BUAH', '', '09BE064', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(232, 'BEARING 32214 ', 'BUAH', '', '09BE065', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(233, 'BEARING 3031', 'BUAH', '', '09BE066', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(234, 'BEARING 3021', 'BUAH', '', '09BE067', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(235, 'BEARING 6215 SK', 'BUAH', '', '09BE068', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(236, 'BEARING 23034 C SK', 'BUAH', '', '09BE069', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(237, 'BEARING 6301 Z', 'BUAH', '', '09BE070', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(238, 'BEARING 3205  BTV', 'BUAH', '', '09BE071', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(239, 'BEARING 120', 'BUAH', '', '09BE072', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(240, 'BEARING 5331', 'BUAH', '', '09BE073', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(241, 'BEARING 6318 Z', 'BUAH', '', '09BE074', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(242, 'BEARING UNIT UCF 206 ', 'BUAH', '', '09BE075', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(243, 'BEARING CONUS HE 318 SK', 'BUAH', '', '09BE076', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(244, 'BEARING 6326 SK', 'BUAH', '', '09BE077', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(245, 'BEARING 22330 SK', 'BUAH', '', '09BE078', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(246, 'BEARING 2303', 'BUAH', '', '09BE079', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(247, 'BEARING 21318 C', 'BUAH', '', '09BE080', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(248, 'BEARING 6316 C3 SK', 'BUAH', '', '09BE081', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(249, 'BEARING 6318 C3 SK', 'BUAH', '', '09BE082', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(250, 'BEARING 21312 C3 SK', 'BUAH', '', '09BE083', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(251, 'BEARING 6313 ZZ / C3 SK', 'BUAH', '', '09BE084', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(252, 'BEARING 6315 ZZ SK', 'BUAH', '', '09BE085', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(253, 'BEARING 32209 KOY', 'BUAH', '', '09BE086', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(254, 'BEARING 30312 KOY', 'BUAH', '', '09BE087', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(255, 'BEARING 32307 JR KOY', 'BUAH', '', '09BE088', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(256, 'BEARING YAJ 218 - 2 RF DIA 80 MM SK', 'BUAH', '', '09BE089', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(257, 'BEARING 6218 Z', 'BUAH', '', '09BE090', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(258, 'BEARING 5121', 'BUAH', '', '09BE091', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(259, 'BEARING 22211 RHRW3', 'BUAH', '', '09BE092', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(260, 'BEARING 621', 'BUAH', '', '09BE093', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(261, 'BEARING NU 220 ETVP2 C', 'BUAH', '', '09BE094', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(262, 'BEARING 6204 N', 'BUAH', '', '09BE095', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(263, 'BRAKE FLUI', 'TIN', '', '09BF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(264, 'BOLT ( G ', 'PCS', '', '09BFG01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(265, 'BATTERY GP 210', 'BUAH', '', '09BG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(266, 'BATU GURINDA 4 ', 'BUAH', '', '09BG061', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(267, 'BATU GURINDA 12 ', 'BUAH', '', '09BG063', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(268, 'BATU GURINDA POTONG 4', 'BUAH', '', '09BG064', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(269, 'BUSA HITA', 'MTR', '', '09BH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(270, 'BRUSH HOLDER + KARBON BRUS', 'SET', '', '09BH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(271, 'BEARING HUB P/N ME 62033', 'BUAH', '', '09BHPNM', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(272, 'BESI UNP 100*50*60 METE', 'BTG', '', '09BI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(273, 'BESI PLAT 5 MM 4*', 'LBR', '', '09BI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(274, 'BESI SIKU 50*50*5*6 METE', 'BTG', '', '09BI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(275, 'BESI PLAT 10 MM 4 \" X 8 ', 'LBR', '', '09BI004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(276, 'BESI SIKU 60 X 60 X 5 X 6 METE', 'BTG', '', '09BI005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(277, 'BESI KOTAK UK. 70 X 50 X 5 MM X 6 METE', 'BTG', '', '09BI006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(278, 'BUS', 'BUAH', '', '09BI007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(279, 'BESI PLAT BORDES 5 MM 4 X ', 'LBR', '', '09BI008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(280, 'BESI AS S 45 C 1,5 \" X 6 MT', 'BTG', '', '09BI014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(281, 'BESI AS S 45 C 7/8 \" X 6 MT', 'BTG', '', '09BI015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(282, 'BESI SIKU MILD STEEL 60 X 60 X 5 X 6 MT', 'BTG', '', '09BI016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(283, 'BESI UNP MILD STEEL 100 X 50 X 6 X 6 MT', 'BTG', '', '09BI017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(284, 'BEARING INPUT P/N 30621-5590', 'BUAH', '', '09BIPN1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(285, 'BLOK KUNINGAN MDL ', 'BUAH', '', '09BK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(286, 'BLOCK KUNINGAN MODEL PERSEG', 'BUAH', '', '09BK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(287, 'BAN LUAR 600*9 10 PL', 'BUAH', '', '09BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(288, 'BAUT SHIM ', 'BUAH', '', '09BL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(289, 'BLADE 2 TEETH P/N. 4145 713 3808 - ', 'BUAH', '', '09BL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(290, 'BAUT+MUR 5/8 X 2', 'BUAH', '', '09BM015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(291, 'BAUT MUR 5/8 X 2 1/2', 'BUAH', '', '09BM016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(292, 'BAUT MUR T RING 16*100 M', 'BUAH', '', '09BM064', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(293, 'BAUT MUR + RING PLAT 5/8 x 2', 'BUAH', '', '09BM065', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(294, 'BAUT MUR + RING PLAT 5/8 x 3', 'BUAH', '', '09BM066', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(295, 'BAUT MUR BAJA + RING PLAT 14 x 5', 'BUAH', '', '09BM067', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(296, 'BOUME METER 0-7', 'BUAH', '', '09BM070', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(297, 'BAUT + MUR + RING 5 X 1', 'BUAH', '', '09BM071', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(298, 'BAUT + MUR BAJA UK. 1/2  X 1 1/2', 'SET', '', '09BM072', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(299, 'BAUT MUR 88 FULL DRAT 10 X 11', 'BUAH', '', '09BM075', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(300, 'BAUT MUR 88 FULL DRAT 10 X 7', 'BUAH', '', '09BM076', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(301, 'BAUT MUR + RING PLAT + RING PER 1/2 X 3', 'BUAH', '', '09BM077', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(302, 'BALLAST 400 WATT PHILI', 'BUAH', '', '09BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(303, 'BESI PLAT 6 MM 4 \" X 8 ', 'LBR', '', '09BP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(304, 'BAUT STENLESS 6*4', 'BUAH', '', '09BS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(305, 'BAUT STEANLESS 8*5', 'BUAH', '', '09BS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(306, 'BOX STOP CONTA', 'BUAH', '', '09BS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(307, 'BATTERY SANY', 'SET', '', '09BS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(308, 'BOLT KECI', 'BUAH', '', '09BS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(309, 'BAUT STEANLESS 5/8 \" X 1/2 ', 'BUAH', '', '09BS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(310, 'BALLAST ELECTRIC ( EBE ', 'BUAH', '', '09BT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(311, 'BALLAST ELECTRIC ( EBE ', 'BUAH', '', '09BT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(312, 'BALLAST TL ELECTRICT 2*18 WAT', 'BUAH', '', '09BT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(313, 'BALLAST 20 WAT', 'BUAH', '', '09BT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(314, 'BELT TING @ 30 MT', 'ROLL', '', '09BT005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(315, 'BELT TING 5/16\" 8MM TANE', 'ROLL', '', '09BT006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(316, 'BAUT 8*1', 'BUAH', '', '09BU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(317, 'BAUT L 5/16 x 11/', 'BUAH', '', '09BU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(318, 'BAUT L 1/2 \" X 3 ', 'BUAH', '', '09BU003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(319, 'BOX LAMPU TL TKO 2*18 WAT', 'BUAH', '', '09BX001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(320, 'BATTRY LASER LITHIUM CR 12600-3V (SANYO', 'BUAH', '', '09BY001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(321, 'CARBON BRUSH CB 411 A GURINDA 4\" MAKIT', 'SET', '', '09CB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(322, 'CARBON BRUSH CB 100 A MAKIT', 'SET', '', '09CB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(323, 'CARBON BRUSH UK- 24*32*6', 'BUAH', '', '09CB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(324, 'CARBON BRUSH UK 15*40*7', 'BUAH', '', '09CB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(325, 'CARBON BRUSH UK 10*32*5', 'BUAH', '', '09CB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(326, 'CARBON BRUSH UK 16*25*4', 'BUAH', '', '09CB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(327, 'CARBON BRUSH UK 12,5*12,5*4', 'BUAH', '', '09CB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(328, 'CARBON BRUSH UK 12,5*32*50 M', 'BUAH', '', '09CB008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(329, 'CARBON BRUSH GURINDA HITACHI CB 4', 'BUAH', '', '09CB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(330, 'CARBON BRUSH UK 10*32*5', 'BUAH', '', '09CB010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(331, 'CARBON BRUSH UK 10*40*6', 'BUAH', '', '09CB011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(332, 'CARBON BRUSH UK 20*32*50 M', 'BUAH', '', '09CB012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(333, 'CARBON BRUSH 24*32*6', 'BUAH', '', '09CB013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(334, 'CARBON BRUSH 28*38*7', 'BUAH', '', '09CB015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(335, 'CONTACT BLOCK TC P/N LC 3301604', 'BUAH', '', '09CB016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(336, 'CLEANER BODY P/N. 4145 141 0500 - ', 'BUAH', '', '09CB017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(337, 'CAIN COUPLING KC 501', 'BUAH', '', '09CC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(338, 'CHAIN COUPLING KC 601', 'SET', '', '09CC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(339, 'CHAIN COUPLING KC 801', 'SET', '', '09CC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(340, 'BESI COR UK. 10CM X 10CM X 80CM @ 855K', 'BTG', '', '09CC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(341, 'COMPACT CYLINDER BORE:40MM STROKE:100M', 'UNIT', '', '09CC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(342, 'CERAMIC COATING PULLY DENSER ALUMINIUM 3', 'BUAH', '', '09CC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(343, 'CEILLING EXHAUST FA', 'UNIT', '', '09CE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(344, 'COUNTER LC 4', 'BUAH', '', '09CE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(345, 'COUNTER ( TIMER ) OUTONIC CT 6S - 2 P', 'BUAH', '', '09CE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(346, 'CLEANER ELEMENT P/N. 4145 124 2800 - ', 'BUAH', '', '09CE005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(347, 'COUPLING FALK 1090 T 1', 'UNIT', '', '09CF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(348, 'CLEANER FIXING BASE P/N. 4145 141 0800 -', 'BUAH', '', '09CF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(349, 'CYLINDER HYDRAULI', 'UNIT', '', '09CH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(350, 'CERAMIC ISOLATOR ( CINCIN KERAMIK ', 'BUAH', '', '09CK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(351, 'CUTTING LPG CHIYODA P-350', 'BUAH', '', '09CL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(352, 'CUTTING LPG VICTOR 3 - GP', 'BUAH', '', '09CL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(353, 'CUTTING LPG TYPE A NO. ', 'BUAH', '', '09CL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(354, 'CONTROL LEVER COMPL P/N. 4145 180 0701 -', 'BUAH', '', '09CL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(355, 'CONTAC CLEANER ( CO ', 'KLG', '', '09CO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(356, 'COIL', 'BUAH', '', '09CO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(357, 'CP', 'BUAH', '', '09CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(358, 'COUPLE NM 6', 'BUAH', '', '09CP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(359, 'CONTROL PANEL DU2-6-24 24V DC SE', 'UNIT', '', '09CP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(360, 'COUPLE ROLLIN', 'BUAH', '', '09CR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(361, 'CARD RELAY SOLENOI', 'BUAH', '', '09CR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(362, 'COUPLE ROLLING @ 25 BUA', 'KG', '', '09CR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(363, 'CARBURATOR P/N. 4145 120 0601 - ', 'BUAH', '', '09CR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(364, 'CUSHION RUBBER COMP P/N. 4145 790 9300 -', 'BUAH', '', '09CR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(365, 'CAT SCREW PRINTING INK (HITAM)', 'KLG', '', '09CS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(366, 'CAM SWITCH TYPE QS 5 3 P/ 63', 'BUAH', '', '09CS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(367, 'CAM SWITCH TYPE QS 5 3 P/15', 'BUAH', '', '09CS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(368, 'CAPASITOR 5 MICRO/500 ', 'BUAH', '', '09CS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(369, 'CAPASITOR 275 VA', 'BUAH', '', '09CS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(370, 'CAM SWITCH 100 A 4 POL', 'BUAH', '', '09CS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(371, 'CURRENT TRANSFORMER 50/5', 'BUAH', '', '09CT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(372, 'CURRENT TRANSFORMER 100/5', 'BUAH', '', '09CT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(373, 'CURRENT TRANSFORMER 600/5', 'BUAH', '', '09CT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(374, 'CURRENT TRANSFORMER CIC ICY-2 500/5', 'BUAH', '', '09CT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(375, 'CURRENT TRANSFORMER CIC ICY-3S 1B 300/5', 'BUAH', '', '09CT005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(376, 'CURRENT TRANSFORMER CIC ICY-3S 100/5', 'BUAH', '', '09CT006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(377, 'CURRENT TRANSFORMER CIC ICX-1 600/5', 'BUAH', '', '09CT007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(378, 'DYNABOLT 1/2 \" X 4 \" @ 25 BUA', 'DUS', '', '09DB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(379, 'DYNABOLT 5/8 \" X 4 \" @ 25 BUA', 'DUS', '', '09DB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(380, 'DYNABOLT 3/4\" X 6\" @ 15 PC', 'DUS', '', '09DB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(381, 'DYNABOLT 3/4\" X 7', 'BUAH', '', '09DB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(382, 'DIES BARU 3,55 M', 'BUAH', '', '09DB038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(383, 'DIGITAL COUNTER LC-48H NAI', 'BUAH', '', '09DC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(384, 'DIES DIAMOND 0,93 M', 'BUAH', '', '09DD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(385, 'DOP DRAT PVC 4', 'BUAH', '', '09DD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(386, 'DIOD', 'BUAH', '', '09DD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(387, 'DIES DIAMOND 1,510 M', 'BUAH', '', '09DD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(388, 'DIODA SKB B 500C 1000 LS', 'BUAH', '', '09DD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(389, 'DIODA 30 ', 'BUAH', '', '09DD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(390, 'DOP DRAT LUAR GALFANIS 1', 'BUAH', '', '09DD010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(391, 'DIES DIAMOND 0.255 M', 'BUAH', '', '09DD011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(392, 'DOP DRAT LUAR GALFANIS 3/4', 'BUAH', '', '09DD012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(393, 'BAUT L 11/2 X 5/16 ( DRAT FULL ', 'BUAH', '', '09DF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(394, 'DOP GALFANIS 11/2', 'BUAH', '', '09DG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(395, 'DOOR INTERLOCKED EXTERNAL FRONT SHAF', 'SET', '', '09DI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(396, 'DINAMO MOTOR 1/2 HP/380 V (SERVICE ', 'UNIT', '', '09DM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(397, 'DINAMO MOTOR 2 HP/380 V ( SERVICE ', 'UNIT', '', '09DM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(398, 'DOUBLE NEPLE GALFANIS 1', 'BUAH', '', '09DN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(399, 'DOUBLE NEPLE GALFANIS 1/4', 'BUAH', '', '09DN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(400, 'DOUBLE NEPLE GALFANIS 3/4', 'BUAH', '', '09DN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(401, 'DOUBLE NEPLE GALFANIS 2', 'BUAH', '', '09DN004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(402, 'DOBLE NEPLE GALFANIS 2 1/2', 'BUAH', '', '09DN009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(403, 'DOUBLE NEPLE GALFANIS 2 1/2', 'BUAH', '', '09DN010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(404, 'DOUBLE NEPLE GALFANIS 1 1/2', 'BUAH', '', '09DN011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(405, 'DOUBLE NEPLE GALFANIS 1/2', 'BUAH', '', '09DN012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(406, 'DOP PVC 11/2', 'BUAH', '', '09DP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(407, 'DEPUSOR SANY', 'BUAH', '', '09DS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(408, 'EBONIT 0 15 MM @ 1 METE', 'BUAH', '', '09EB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(409, 'EBONIT 0 20 MM*1 METE', 'BUAH', '', '09EB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(410, 'EBONIT 0 120 MM*1 METE', 'BUAH', '', '09EB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(411, 'EBONIT 10 MM*1 METE', 'BTG', '', '09EB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(412, 'EBONIT 0 30 MM*1 METE', 'BUAH', '', '09EB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(413, 'EBONIT 35 mm x 1 mt', 'BTG', '', '09EB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(414, 'EBONIT 25 mm x 1 mt', 'BTG', '', '09EB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(415, 'EBONIT UK. 100 MM X 1 MT', 'BTG', '', '09EB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(416, 'ELC', 'BUAH', '', '09EC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(417, 'EXHAUST FAN 10', 'BUAH', '', '09EF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(418, 'EXHAUST FAN/COLLING FAN 4\" CF 204/50-6', 'BUAH', '', '09EF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(419, 'ELECTRODE HOLDER TYPE PS-35 CAMSC', 'BUAH', '', '09EH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(420, 'ELPIJ', 'BUAH', '', '09EL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(421, 'ELECTRIC MOTOR TYPE : 2 POLE/380', 'UNIT', '', '09EM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(422, 'FUSE BATU 125 ', 'BUAH', '', '09FB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(423, 'FINISHING DRAWIN', 'BUAH', '', '09FD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(424, 'FIBER KARTON UK 1*1 METE', 'LBR', '', '09FK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(425, 'FLANGE SOK BOBIN 0 20', 'SET', '', '09FL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(426, 'FITTING LAMP', 'BUAH', '', '09FL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(427, 'FOLOCULANT PAC @ 20 K', 'BUAH', '', '09FP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(428, 'FUEL PIPE P/N. 4145 358 7600 - ', 'BUAH', '', '09FP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(429, 'FUEL PIPE CLIP P/N. 4145 358 8900 - ', 'BUAH', '', '09FP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(430, 'FLOUTLES RELAY ANLY TYPE : AF 1-1/220 ', 'BUAH', '', '09FR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(431, 'FLOUTLESS RELAY 61 F6-A', 'BUAH', '', '09FR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(432, 'FILTER REGULATOR PORT 1/4', 'BUAH', '', '09FR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(433, 'FOOTSWITCH FS 3 10 A/250 ', 'BUAH', '', '09FS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(434, 'FITTING LAMPU T', 'SET', '', '09FT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(435, 'FITTING+KAP LAMPU E 2', 'SET', '', '09FT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(436, 'FUEL TANK P/N. 4145 351 0400 - ', 'BUAH', '', '09FT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(437, 'FOOT VALVE PVC 21/2', 'BUAH', '', '09FV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(438, 'FELL WOLL LOX 75*130 C', 'LBR', '', '09FW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(439, 'GERGAJI BESI 12', 'BUAH', '', '09GB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(440, 'GERGAJI BESI 14', 'BUAH', '', '09GB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(441, 'GEAR BOX TYPE : WPA 70 RATIO:1:3', 'UNIT', '', '09GB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(442, 'GEA', '', '', '09GE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(443, 'GEAR M5-Z 1', 'BUAH', '', '09GE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(444, 'GEAR PAYUNG Z-3', 'BUAH', '', '09GE005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(445, 'GEAR PAYUNG Z-1', 'BUAH', '', '09GE006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(446, 'GEAR MESIN SERUT Z-3', 'BUAH', '', '09GE007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(447, 'GEAR MESIN SAMBUNG UK. 205 X 68 X Z3', 'BUAH', '', '09GE008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(448, 'GEAR Z - 45 UK. 327 X 11', 'BUAH', '', '09GE009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(449, 'GEAR Z - 45 UK. 327 X 8', 'BUAH', '', '09GE010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(450, 'GEAR Z - 15 UK. 116 X 6', 'BUAH', '', '09GE011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(451, 'GREASE HAND PU', 'BUAH', '', '09GH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(452, 'GEAR KUNINGAN (WORM GEAR) Z-34 148*60 M', 'BUAH', '', '09GK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(453, 'GEAR KUNINGAN (WORM GEAR) Z34 148*60 M', 'BUAH', '', '09GK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(454, 'GEAR BOX + MOTOR WPDX RATIO 1:30 SIZE 8', 'BUAH', '', '09GM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(455, 'GUNTING MCC 75', 'BUAH', '', '09GM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(456, 'GEAR MS - 21', 'BUAH', '', '09GM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(457, 'GEAR MOTOR SKT TYPE:E + MOTOR FUKUTA 7,5', 'UNIT', '', '09GM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(458, 'GEAR PAYUNG 21', 'BUAH', '', '09GP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(459, 'GEAR PAYUNG 23', 'BUAH', '', '09GP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(460, 'GIGI PAYUNG 19T UK. 250 X 150 VCN 15', 'BUAH', '', '09GP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(461, 'GIGI PAYUNG 31T UK. 400 X 150 VCN 15', 'BUAH', '', '09GP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(462, 'GIGI PAYUNG 25T UK. 330 X 140 VCN 15', 'BUAH', '', '09GP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(463, 'GIGI PAYUNG 22T UK. 290 X 140 VCN 15', 'BUAH', '', '09GP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(464, 'GEAR MOTOR 1/2 HP RATIO 1:3', 'UNIT', '', '09GR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(465, 'GEAR RANTAI UK. 60 X 1 JALUR 39 GIG', 'BUAH', '', '09GR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(466, 'GEAR RANTAI UK. 60 X 2 JALUR X 64 GIG', 'BUAH', '', '09GR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(467, 'GREASE SHELL ALVANIA EP-', 'BUAH', '', '09GS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(468, 'CYLINDER WASHER P/N. 4145 029 2300 - ', 'BUAH', '', '09GS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(469, 'GOOT 4', 'BUAH', '', '09GT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(470, 'GROUND WIRE P/N. 4145 440 1901 - ', 'BUAH', '', '09GW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(471, 'HUB ASSY P/N 91326-1150', 'BUAH', '', '09HAPN1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(472, 'HOLDER CARBON BRUSH ( KECIL ', 'BUAH', '', '09HB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(473, 'HARD CROME PULLY PENSER ALUM. O  250MM', 'BUAH', '', '09HC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(474, 'HOLDER CARBON BRUSH (BESAR', 'BUAH', '', '09HC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(475, 'HARD CROME ROLL ANEALER 97 mm * 600 ', 'BUAH', '', '09HC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(476, 'HARD CROME ROLL CAPSTA', 'BUAH', '', '09HC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(477, 'HOUGHTO DRAW WD 410', 'KG', '', '09HD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(478, 'HOSE HYDROULIK 7/8 R5 26 C', 'BUAH', '', '09HH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(479, 'HOLESAW 30 M', 'BUAH', '', '09HL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(480, 'HANG PUM', 'BUAH', '', '09HP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(481, 'HAND PUM', 'BUAH', '', '09HP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(482, 'HOSE @ 1/2 MT + SLEEVES @ 2 PC', 'SET', '', '09HS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(483, 'HAND VALVE 3/8\" ( MUHC-300/10 A ', 'PAIL', '', '09HV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(484, 'IC 781', 'BUAH', '', '09IC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(485, 'IC 791', 'BUAH', '', '09IC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(486, 'I 35', 'BUAH', '', '09II001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(487, 'INVERTER TOSHIBA TYPE VF S11-200', 'BUAH', '', '09IN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(488, 'INVERTER SANKEN TYPE GF 0,75 K/1 H', 'BUAH', '', '09IN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(489, 'INVERTER 1 HP 380 V BENS PETTERSE', 'UNIT', '', '09IN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(490, 'INVERTER 15HP/220', 'UNIT', '', '09IN004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(491, 'INVERTER 15HP/380', 'UNIT', '', '09IN005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(492, 'IN 400', 'BUAH', '', '09IN006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(493, 'INVERTER BENZ PETER Q5-007-43', 'UNIT', '', '09IN008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(494, 'INVERTER EMCN EC50D75G43', 'UNIT', '', '09IN009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(495, 'INVERTER SANKEN GF 0,75 K-HK 3PHASE 380V', 'UNIT', '', '09IN010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(496, 'INVERTER SANKEN ET 0,75 K-HK 3PHASE 220V', 'UNIT', '', '09IN011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(497, 'ISOLASI NITTO BESAR', 'ROLL', '', '09IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(498, 'ISOLASI 3 M ( SCOTCH ', 'ROLL', '', '09IS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(499, 'ISOLASI TAHAN PANA', 'ROLL', '', '09IS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(500, 'ISOLASI 3M SCOCTH 2', 'ROLL', '', '09IS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(501, 'KABEL SKUN RING 0 1,5 M', 'PAK', '', '09KA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(502, 'KABEL SKUN Y 0 2,5 MM @ 10', 'PAK', '', '09KA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(503, 'KABEL SKUN RING 0 16 M', 'BUAH', '', '09KA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(504, 'KABEL TIES 200 L/20 C', 'PAK', '', '09KA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(505, 'KABEL TIES 100 L/10 C', 'PAK', '', '09KA005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(506, 'KABEL TERMO COUPLE TYPE ', 'METER', '', '09KA006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(507, 'KLEM KABEL 0 12 MM @ 100 PC', 'PAK', '', '09KA007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(508, 'KLEM KABEL NO. ', 'PAK', '', '09KA008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(509, 'KABEL NYHY 2*0,75 @ 50 METE', 'ROLL', '', '09KA009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(510, 'KABEL NYMHY 4 X 1,5 MM ( SERABUT ', 'METER', '', '09KA010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(511, 'KABEL NYMHY 4 X 0,75 MM2 @ 100 MT', 'ROLL', '', '09KA011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(512, 'KABEL NYMHY 4 X 1,50 MM2 @ 100 MT', 'ROLL', '', '09KA012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(513, 'KABEL NYMHY 4 X 2,50 MM2 @ 100 MT', 'ROLL', '', '09KA013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(514, 'KABEL NYY 4 X 35 MM', 'MTR', '', '09KA014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(515, 'KABEL SERABUT 281,2 ( ISI 7 ', 'METER', '', '09KB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(516, 'KABEL 8*06 MM @1 ROL', 'UNIT', '', '09KB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(517, 'KUNCI BIS', 'BUAH', '', '09KB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(518, 'KARET COUPLE NM6', 'BUAH', '', '09KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(519, 'KNEE DRAT GALFANIS 45 3', 'BUAH', '', '09KD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(520, 'KNEE DRAT GALFANIS 3', 'BUAH', '', '09KD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(521, 'KNEE DRAT PVC 1/2', 'BUAH', '', '09KD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(522, 'KNEE DRAT GALFANIS 2', 'BUAH', '', '09KD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(523, 'KNEE DRAT GALFANIS 1', 'BUAH', '', '09KD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(524, 'KANVAS RE', 'SET', '', '09KE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(525, 'KAWAT FLEXYBL', 'BUAH', '', '09KF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(526, 'KNEE GALFANIS 11/4', 'BUAH', '', '09KG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(527, 'KNEE GALFANIS 11/2', 'BUAH', '', '09KG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(528, 'KNEE GALFANIS 1/2', 'BUAH', '', '09KG007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(529, 'KACA KEDOK LAS ( HITAM ', 'BUAH', '', '09KH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(530, 'KNEE GALFANIS 3/8', 'BUAH', '', '09KH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(531, 'KIPAS ANGIN ( WELL FAN ', 'UNIT', '', '09KI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(532, 'KIPAS ANGIN ( POWER FULL ', 'UNIT', '', '09KI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(533, 'KUNCI INGGRI', 'BUAH', '', '09KI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(534, 'KUNCI INGGRIS 15 ', 'BUAH', '', '09KI004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(535, 'KUNCI INGGRIS 18 ', 'BUAH', '', '09KI005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(536, 'KIKIR PLT 8', 'BUAH', '', '09KK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(537, 'KIKIR PLT 12', 'BUAH', '', '09KK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(538, 'KUNCI KONTA', 'BUAH', '', '09KK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(539, 'KIKIR SEGITIGA 4', 'BUAH', '', '09KK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(540, 'KAWAT LAS RB 2,6 M', 'KG', '', '09KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(541, 'KAWAT LAS RB 3,2 M', 'KG', '', '09KL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(542, 'KAWAT LAS KUNINGAN 0 3 M', 'BTG', '', '09KL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(543, 'KAWAT LAS RB 4,0 M', 'KG', '', '09KL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(544, 'KAWAT LAS STEANLESS 0 2,6 M', 'KG', '', '09KL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(545, 'KAWAT LAS B-17 0 3,2 M', 'KG', '', '09KL006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(546, 'KAWAT LAS B-17 0 4,0 M', 'KG', '', '09KL007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(547, 'KAWAT LAS ANCURAN CIN-3 0 3,2 M', 'KG', '', '09KL008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(548, 'KNEE LAS GALFANIS 2 1/2', 'BUAH', '', '09KL010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(549, 'KAWAT LAS STEANLESS 3.2 M', 'KG', '', '09KL011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(550, 'KUNCI L 6 M', 'BUAH', '', '09KL012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(551, 'KUNCI L 5M', 'BUAH', '', '09KL013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(552, 'KUNCI L 4 M', 'BUAH', '', '09KL014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(553, 'KUNCI ', 'SET', '', '09KL015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(554, 'KEDOK LA', 'BUAH', '', '09KL016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(555, 'KNEE LAS 5 \" SCH 4', 'BUAH', '', '09KL017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(556, 'KARET MEMBRA', 'BUAH', '', '09KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(557, 'KNEE PVC 3', 'BUAH', '', '09KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(558, 'KNEE PVC 2', 'BUAH', '', '09KN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(559, 'KAWAT NEKELIN ELEMENT 2M', 'KG', '', '09KN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(560, 'KNEE PVC 4', 'BUAH', '', '09KN004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(561, 'KNEE PVC 11/2', 'BUAH', '', '09KN005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(562, 'KNEE DRAT 3/4\" X 1/2\" PV', 'BUAH', '', '09KN008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(563, 'KUNCI PIPA 24', 'BUAH', '', '09KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(564, 'KUNCI PAS 12 X 13 M', 'BUAH', '', '09KP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(565, 'KUNCI RING PAS UK-0 21 M', 'BUAH', '', '09KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(566, 'KUNCI RING PAS UK-0 24 M', 'BUAH', '', '09KR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(567, 'KUNCI RING PAS 14 M', 'BUAH', '', '09KR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(568, 'KUNCI RING PAS 15 M', 'BUAH', '', '09KR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(569, 'KUNCI RING PAS UK. 19 M', 'BUAH', '', '09KR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(570, 'KUNCI RING PAS UK. 8 S/D 32 MM', 'SET', '', '09KR006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(571, 'KLEM SELANG STEANLESS 1', 'BUAH', '', '09KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(572, 'KLEM SENG', 'BUAH', '', '09KS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(573, 'KLEM SENG', 'BUAH', '', '09KS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(574, 'KLEM SELANG STEANLESS ( SPT CONTOH', 'BUAH', '', '09KS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(575, 'KABEL SERABUT 2*1.2 ( ISI 7', 'MTR', '', '09KS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(576, 'KUNCI SOK ( TEKIRO) UK.8-32m', 'SET', '', '09KS009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(577, 'KLEM SELANG STEANLES', 'BUAH', '', '09KS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(578, 'KABEL SKUN Y 2,5 MM @ 100 / PA', 'PAK', '', '09KS012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(579, 'KLEM SELANG 5/8 ', 'BUAH', '', '09KS013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(580, 'KLEM SELANG STEANLESS 1 1/2 ', 'BUAH', '', '09KS014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(581, 'KABEL SKUN SC 95 - 1', 'BUAH', '', '09KS015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(582, 'KNEE STAINLESS STELL 1', 'BUAH', '', '09KS016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(583, 'KNEE STAINLESS STELL 1 1/2', 'BUAH', '', '09KS017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(584, 'KLEM SELANG STEANLES 1 1/4', 'BUAH', '', '09KS018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(585, 'KLEM SELANG STEANLES 2', 'BUAH', '', '09KS019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(586, 'KLEM SELANG STEANLES 2 1/2', 'BUAH', '', '09KS020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(587, 'KLEM SELING 12 M', 'BUAH', '', '09KS021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(588, 'KAWAT TEMBAGA BCC25 M', 'MTR', '', '09KT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(589, 'KABEL TIES CV 100 @ 10', 'PAK', '', '09KT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(590, 'KABEL TIES CV 150 @ 10', 'PAK', '', '09KT005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(591, 'O/H KIT TRANSMISSION ( G ', 'PCS', '', '09KTG01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(592, 'KUNCI L (1,5-10 MM', 'SET', '', '09KU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(593, 'KUNCI L 14 M', 'BUAH', '', '09KU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(594, 'KUNCI L 5 M', 'BUAH', '', '09KU003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(595, 'KUNCI L 6 M', 'BUAH', '', '09KUNCI', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(596, 'KLEP VALVE KUNINGAN 11/2', 'BUAH', '', '09KV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(597, 'KLEP VALVE KUNINGAN 11/4', 'BUAH', '', '09KV002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(598, 'KLEP VALVE KUNINGAN 21/2', 'BUAH', '', '09KV003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(599, 'KLEP VALVE KUNINGAN 2', 'BUAH', '', '09KV004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(600, 'KLEP VALVE KIT 2', 'BUAH', '', '09KV006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(601, 'KAWAT SELING 10 M', 'METER', '', '09KW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(602, 'KAWAT SELLING 12 M', 'METER', '', '09KW002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(603, 'KABEL WELDING 50 m', 'MTR', '', '09KW003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(604, 'LUBTEN ( 10', 'KLG', '', '09LB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(605, 'LOAD CHANGE OVER SWITCH F MU63/4 4X630 ', 'BUAH', '', '09LC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(606, 'LAMPU CONTROL 30 MM 220 V AC ( MERAH ', 'BUAH', '', '09LC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(607, 'LAMPU CONTROL 30 MM 220 V AC ( HIJAU ', 'BUAH', '', '09LC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(608, 'LAMPU CONTROL 30 MM 220 V AC ( KUNING ', 'BUAH', '', '09LC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(609, 'LEM SEALENT ( MERAH ', 'TUBE', '', '09LE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(610, 'LEM PARALON', 'KLG', '', '09LE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(611, 'LEM LOCTING THREYNG LOCKER ( 262 MERAH ', 'BOTOL', '', '09LE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(612, 'LEM LOCTING THREAY ( 242 BIRU ', 'BOTOL', '', '09LE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(613, 'LEM BESI DEXTON', 'SET', '', '09LE005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(614, 'LEM SEALENT ( KACA ', 'BTL', '', '09LE006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(615, 'LEM GASKET SHELA', 'BOTOL', '', '09LG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(616, 'LAMPU HE 18 WAT', 'BUAH', '', '09LH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(617, 'LIMIT SWITCH OMRO', 'BUAH', '', '09LI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(618, 'LIMIT SWITCH ( OMRON ', 'BUAH', '', '09LI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(619, 'LIMIT SWITCH TYPE V 15- 1 A', 'BUAH', '', '09LI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(620, 'MAGNETIC CONTACTOR SN-35 / 220 ', 'BUAH', '', '09MA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(621, 'MAGNETIC CONTACTOR SN-15', 'BUAH', '', '09MA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(622, 'MAGNETIC CONTACTOR SN-20/220 ', 'BUAH', '', '09MA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(623, 'MAGNETIC CONTACTOR SN-11/220 ', 'BUAH', '', '09MA005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(624, 'MAGNETIC KONTAKTOR SN-50 / 220 ', 'BUAH', '', '09MA007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(625, 'MAGNETIC CONTACTOR SN-8', 'BUAH', '', '09MA008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(626, 'MAGNETIC CONTACTOR SN-65 / 220 ', 'BUAH', '', '09MA009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(627, 'MAL ANGK', 'BUAH', '', '09MA011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(628, 'MAGNETIC CONTACTOR SN-35 COIL 110/13', 'UNIT', '', '09MA012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(629, 'MAGNETIC CONTACTOR SN-50 COIL 380 ', 'BUAH', '', '09MA013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(630, 'MATA BOR 0 16 M', 'BUAH', '', '09MB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(631, 'MATA BOR 0 14 M', 'BUAH', '', '09MB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(632, 'MATA BOR MILLING 0 7 M', 'BUAH', '', '09MB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(633, 'MATA BOR BETON 19 MM*20', 'BUAH', '', '09MB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(634, 'MATA BOR BETON 8 M', 'BUAH', '', '09MB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(635, 'MATA BOR BOR FISE', 'BUAH', '', '09MB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(636, 'MATA BOR 4 MM NACH', 'BUAH', '', '09MB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(637, 'MATA B0R 5 MM NACH', 'BUAH', '', '09MB008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(638, 'MATA BOR 6 MM NACH', 'BUAH', '', '09MB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(639, 'MATA BOR 10 MM NACH', 'BUAH', '', '09MB010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(640, 'MATA BOR 12 MM NACH', 'BUAH', '', '09MB011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(641, 'MATA BOR 8 MM NACH', 'BUAH', '', '09MB012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(642, 'MATA BOR BETON 12 M', 'BUAH', '', '09MB013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(643, 'MATA BOR MILLING 5 MM NACH', 'BUAH', '', '09MB015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(644, 'MATA BOR MILLING 10 MM NACH', 'BUAH', '', '09MB016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(645, 'MATA BOR MILLING 8 MM NACH', '', '', '09MB017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(646, 'MATA BOR HSS 1,5 mm - 13 m', 'SET', '', '09MB018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(647, 'MATA BOR HSS 14m', 'BUAH', '', '09MB019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(648, 'MATA BOR HSS 15,5m', 'BUAH', '', '09MB020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(649, 'MATA BOR HSS 16m', 'BUAH', '', '09MB021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(650, 'MATA BOR BETON 16M', 'BUAH', '', '09MB022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(651, 'MCB 25 ', 'BUAH', '', '09MC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(652, 'MCB IP/2', 'BUAH', '', '09MC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(653, 'MCB 3P/50 ', 'BUAH', '', '09MC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(654, 'MCB 3P/80 ', 'BUAH', '', '09MC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(655, 'MCB 2 P/20 ', 'BUAH', '', '09MC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(656, 'MAGNETIC CONTACTOR SN-80/220 VOL', 'BUAH', '', '09MC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(657, 'MAGNETIC CONTACTOR SN 30', 'UNIT', '', '09MC007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(658, 'MAGNETIC CONTACTOR  SN 40', 'UNIT', '', '09MC008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(659, 'MAGNETIC CONTACTOR HMU-12 24 VA', 'BUAH', '', '09MC009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(660, 'MAGNETIC CONTACTOR SN - 220 / 220 ', 'BUAH', '', '09MC010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(661, 'MCB 3P / 16', 'BUAH', '', '09MC011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(662, 'MAL CETAKAN INGO', 'BUAH', '', '09MCI01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(663, 'MEMORY DDR2 2 G', 'UNIT', '', '09MDDR2', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(664, 'METALL ROLLING R75/10', 'BUAH', '', '09ME001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(665, 'MATA GERGAJI 14\" (MAKITA', 'BUAH', '', '09MG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(666, 'MESIN GURINDA TANGAN 4\" ( MAKITA ', 'UNIT', '', '09MG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(667, 'MODUL ELEKTRONIKON MK5 P/N. 2230 5015 9', 'UNIT', '', '09MK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(668, 'MOUNTING MESI', 'BUAH', '', '09MM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(669, 'MOTOR 10HP TECO+GEAR PUMP KOSHIN GL50-1', 'UNIT', '', '09MP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(670, 'MOTOR 10HP WESTERN+GEAR PUMP KOSHIN GL5', 'UNIT', '', '09MP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(671, 'MOUNTING RELL ( RELL MCB ', 'BUAH', '', '09MR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(672, 'MUR 3/4 ', 'BUAH', '', '09MR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(673, 'MECHANICAL SEAL TYPE : PSEB I', 'BUAH', '', '09MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(674, 'MECHANICAL SEAL TYPE : PEFB I', 'BUAH ', '', '09MS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(675, 'MECHANICAL SEAL 0 53 M', 'BUAH', '', '09MS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(676, 'MECHANICAL SEAL OJSOS ( LACONI ', 'SET', '', '09MS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(677, 'MECHANICAL SEAL 0 32 M', 'SET', '', '09MS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(678, 'MECHANICAL SEAL TYPE 155-15 0 16 M', 'SET', '', '09MS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(679, 'MECANICAL SEAL TYPE :EA 520 3/4', 'SET', '', '09MS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(680, 'MECHANICAL SEAL TYPE 2', 'BUAH', '', '09MS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(681, 'MECANICAL SEAL  560 13/', 'BUAH', '', '09MS010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(682, 'MECANICAL SEAL 28 M', 'BUAH', '', '09MS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(683, 'MECANICAL SEAL TYPE 2', 'BUAH', '', '09MS012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(684, 'MUR STEANLESS 7/8', 'BUAH', '', '09MS013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(685, 'MECANICAL SEAL TYPE EA560 35M', 'SET', '', '09MS014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(686, 'MECANICAL SEA', 'BUAH', '', '09MS015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(687, 'KARET MECANICAL SEAL UK. 54 X 41 X 1', 'BUAH', '', '09MS016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(688, 'METERAN @ 5MT', 'BUAH', '', '09MT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(689, 'MUR 88 1/2', 'BUAH', '', '09MU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(690, 'MINYAK VANBELT ( BELT DREASING ', 'KLG', '', '09MV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(691, 'NICKLE ANEALING BAN', 'BUAH', '', '09NA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(692, 'NFB ( NO FUSE BEAKER ', 'BUAH', '', '09NF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(693, 'NFB ( NO FUSE BREAKER ', 'BUAH', '', '09NF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(694, 'NFB 30 CS/ 10', 'BUAH', '', '09NF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(695, 'NFB NF 250CW/3P 250 ', 'BUAH', '', '09NF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(696, 'NFB ( NO FUSE BREAKER) 50 ', 'BUAH', '', '09NF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(697, 'NFB ( NO FUSE BREAKER ) 63 CW 3 P 50 ', 'BUAH', '', '09NF006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(698, 'NFB ( NO FUSE BREAKER ) 125 CW 3 P 80 ', 'BUAH', '', '09NF007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(699, 'NEPLE SELANG PL ', 'BUAH', '', '09NS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(700, 'NEPEL SELANG 3/8 ', 'BUAH', '', '09NS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(701, 'NEPEL SELANG 1/2 ', 'BUAH', '', '09NS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(702, 'NEPEL SELANG 1/4 ', 'BUAH', '', '09NS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(703, 'NEPEL SAMBUNGAN', 'BUAH', '', '09NS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(704, 'HEATER NIKLIN SPIRAL @ 1 MT', 'BUAH', '', '09NS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(705, 'NUT MB P/N. 9210 261 1140 - ', 'BUAH', '', '09NU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(706, 'NUT P/N. 9210 260 0700 - ', 'BUAH', '', '09NU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(707, 'OBENG MINU', 'BUAH', '', '09OB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(708, 'OBENG PLU', 'BUAH', '', '09OB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(709, 'OLI COMPRO XL - S 3', 'PAIL', '', '09OC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(710, 'OIL FILTER 71151-4693', 'PAIL', '', '09OF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(711, 'OIL FILTER P/N 71121111-48020', 'BUAH', '', '09OF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(712, 'OIL FINE SEPARATOR P/N 71131211-4691', 'BUAH', '', '09OF006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(713, 'OIL FILTER 71121111-4802', 'BUAH', '', '09OF007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(714, 'OIL SEPARATOR 711-312011-4691', 'BUAH', '', '09OI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(715, 'OLI COMPRESOR FUSHEN', 'PAIL', '', '09OI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(716, 'OFFSET LINK 80*', 'BUAH', '', '09OL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(717, 'OIL LUBRICANT P/N 1541-FS 600-2', 'MEKAN', '', '09OL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(718, 'OFFSET LINK 60*3 (SAMBUNGAN RANTAI', 'BUAH', '', '09OL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(719, 'OIL PRESSURE GAUGE 0-5 BAR 52 M', 'BUAH', '', '09OP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(720, 'OIL PRESURE GAUG', 'BUAH', '', '09OP030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(721, 'ORING P 8', 'BUAH', '', '09OR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(722, 'ORING POMPA AS 25', 'BUAH', '', '09OR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(723, 'ORING AS 22', 'BUAH', '', '09OR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(724, 'ORING 26', 'BUAH', '', '09OR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(725, 'ORING 4*23', 'BUAH', '', '09OR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(726, 'ORING AS 22', 'BUAH', '', '09OR006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(727, 'ORING POMPA AS 25', 'BUAH', '', '09OR007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(728, 'O RING DIA 9 M', 'MTR', '', '09OR008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(729, 'ORING 45 X ', 'BUAH', '', '09OR009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(730, 'ORING 25 X 32 X ', 'BUAH', '', '09OR010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(731, 'OIL SEAL TONG ANEALING 0 700*580*40*6', 'BUAH', '', '09OS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(732, 'OIL SEAL TONG ANEALING 0 850*760*40*4', 'BUAH', '', '09OS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(733, 'OIL SEAL TONG ANEALING 0 870*760*40*4', 'BUAH', '', '09OS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(734, 'OIL SEAL TONG ANEALING 0 900*760*40*4', 'BUAH', '', '09OS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(735, 'OIL SEAL 65-82-1', 'BUAH', '', '09OS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(736, 'OIL SEAL TC 60-82-1', 'BUAH', '', '09OS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(737, 'OIL SEAL TC-58-75-1', 'BUAH', '', '09OS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(738, 'OIL SEAL TC-55-72-', 'BUAH', '', '09OS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(739, 'OIL SEAL TC-50-72-1', 'BUAH', '', '09OS009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(740, 'OIL SEAL TC-38-55-', 'BUAH', '', '09OS010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(741, 'OIL SEAL TC-20-47-1', 'BUAH', '', '09OS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(742, 'OIL SEAL 20-40-1', 'BUAH', '', '09OS012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(743, 'OIL SEAL 20-38-1', 'BUAH', '', '09OS013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(744, 'OIL SEAL 58-80-1', 'BUAH', '', '09OS014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(745, 'OIL SEAL 50-30-1', 'BUAH', '', '09OS015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(746, 'OIL SEAL 55-85-1', 'BUAH', '', '09OS016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(747, 'OIL SEAL TC 65-95-1', 'BUAH', '', '09OS017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(748, 'OIL SEAL TC-45-65-1', 'BUAH', '', '09OS018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(749, 'OIL SEAL TC-75-100-1', 'BUAH', '', '09OS019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(750, 'OIL SEAL TC-70*92*1', 'BUAH', '', '09OS020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(751, 'OIL SEAL TC-25*45*', 'BUAH', '', '09OS021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(752, 'OIL SEAL DHS 3', 'BUAH', '', '09OS022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(753, 'OIL SEA UHS 3', 'BUAH', '', '09OS023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(754, 'OIL SEAL 17*30-*', 'BUAH', '', '09OS024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(755, 'OIL SEAL TC 17*30*', 'BUAH', '', '09OS025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(756, 'OIL SEAL 72*95*1', 'BUAH', '', '09OS026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(757, 'OIL SEAL 125*95*1', 'BUAH', '', '09OS027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(758, 'OIL SEAL 55*78*1', 'BUAH', '', '09OS028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(759, 'OBENG SE', 'BUAH', '', '09OS029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(760, 'OIL SEAL 95*120*1', 'BUAH', '', '09OS030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(761, 'OIL SEAL 80*100*1', 'BUAH', '', '09OS031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(762, 'OIL SEAL 17*30*', 'BUAH', '', '09OS032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(763, 'OIL SEAL TC 15*35*1', 'BUAH', '', '09OS033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(764, 'OIL SEAL TC 40*62*1', 'BUAH', '', '09OS034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(765, 'OIL SEAL TC 160*190*1', 'BUAH', '', '09OS035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(766, 'OIL SEAL TC 170*200*1', 'BUAH', '', '09OS036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(767, 'OIL SEAL TC 150*180*1', 'BUAH', '', '09OS037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(768, 'OIL SEAL 70*90*1', 'BUAH', '', '09OS038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(769, 'OIL SEAL 85*105*1', 'BUAH', '', '09OS039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(770, 'OIL SEAL 25*40*1', 'BUAH', '', '09OS040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(771, 'OIL SEAL 25*37*', 'BUAH', '', '09OS041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(772, 'OIL SEAL 55*80*1', 'BUAH', '', '09OS042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(773, 'OIL SEAL TC 45*62*1', 'BUAH', '', '09OS043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(774, 'OIL SEAL 45*62*1', 'BUAH', '', '09OS044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(775, 'OIL SEAL TC 37*57*1', 'BUAH', '', '09OS045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(776, 'OIL SEAL TC 45*62*', 'BUAH', '', '09OS046', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(777, 'OIL SEAL TC 150*180*1', 'BUAH', '', '09OS047', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(778, 'OIL SEAL 52*75*1', 'BUAH', '', '09OS048', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(779, 'OIL SEAL 110*80*1', 'BUAH', '', '09OS049', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(780, 'OIL SEAL 40*50*', 'BUAH', '', '09OS050', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(781, 'OIL SEAL 50*80*1', 'BUAH', '', '09OS051', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(782, 'OIL SEAL TC 80*110*1', 'BUAH', '', '09OS052', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(783, 'OIL SEAL TC 80 X 110 X 1', 'BUAH', '', '09OS053', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(784, 'OIL SEAL TC 58 X 80 X 1', 'BUAH', '', '09OS054', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(785, 'OIL SEAL TC ( NBR ) 80 X 108 X 1', 'BUAH', '', '09OS055', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(786, 'OIL SEAL TC 65 X 88 X 1', 'BUAH', '', '09OS056', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(787, 'OIL SEAL TC 55 X 78 X 1', 'BUAH', '', '09OS057', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(788, 'OIL SEAL TC 130 X 160 X 1', 'BUAH', '', '09OS061', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(789, 'OIL SEAL UHS 3', 'BUAH', '', '09OS062', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(790, 'OIL SEAL 95 X 125 X 1', 'BUAH', '', '09OS063', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(791, 'OIL SEAL TC 95 X 125 X 1', 'BUAH', '', '09OS064', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(792, 'OIL SEAL TC 95 X 115 X 1', 'BUAH', '', '09OS065', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(793, 'OLI TRANSMISSIO', 'LITER', '', '09OT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(794, 'OXYGE', 'TBG', '', '09OX001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(795, 'PAKU 7 C', 'KG', '', '09P0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(796, 'PLAT SEGEL 5/8', 'ROLL', '', '09PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(797, 'PUSH BUTTON HOST ( 4 TOMBOL ', 'BUAH', '', '09PB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(798, 'PISAU BUBUT THMS 160408 N-U', 'BUAH', '', '09PB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(799, 'PISAU BUBUT INSERT ( BEKAS ', 'BUAH', '', '09PB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(800, 'PISAU BUBUT 1/2', 'BUAH', '', '09PB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(801, 'PISAU BUBUT 3/8', 'BUAH', '', '09PB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(802, 'PISAU BUBUT 5/8', 'BUAH', '', '09PB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(803, 'PISAU BUBUT 3/4', 'BUAH', '', '09PB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(804, 'PILLOW BLOCK UCP 20', 'BUAH', '', '09PB008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(805, 'PLAT BORDES 3 M', 'LBR', '', '09PB010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(806, 'PLAT BORDES BESI UK. 5 MM X 4 X ', 'LBR', '', '09PB011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(807, 'PILLOW BLOCK SYJ 516 DIA 80 MM SK', 'BUAH', '', '09PB012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(808, 'POMPA CENTRIFUGAL 11/2\"/HP/3 PH/380 ', 'UNIT', '', '09PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(809, 'PEN COLD POLO', 'BUAH', '', '09PC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(810, 'PEN COLD DRAT PENDE', 'BUAH', '', '09PC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(811, 'PEN COLD DRAT PANJANG', 'BUAH', '', '09PC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(812, 'PET COCK ASSY P/N. 4145 350 1000 - ', 'BUAH', '', '09PC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(813, 'PULLY DENSER ALUMUNIUM 0 20', 'BUAH', '', '09PD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(814, 'PERTEKAN 2,5*15*30 C', 'BUAH', '', '09PE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(815, 'PAS ELECTRONI', 'BUAH', '', '09PE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(816, 'PIPA FLEXIBL', 'BUAH', '', '09PF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(817, 'PRESSUR GAUGE 0 50 MM*1/4*6', 'BUAH', '', '09PG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(818, 'PINION GEAR SHAFT ', 'PCS', '', '09PG006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(819, 'PINION GEAR SHAFT ', 'PCS', '', '09PG007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(820, 'PINION GEAR SHAFT ', 'PCS', '', '09PG008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(821, 'PIPA GALFANIS 21/2\" SCH 4', 'BTG', '', '09PG009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(822, 'PAHAT BUBUT 3/8*4', 'BUAH', '', '09PH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(823, 'PIPA HITAM 11/4 ', 'BTG', '', '09PH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(824, 'PIPA HITAM 5\" X 3,6 M', 'BTG', '', '09PH003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(825, 'PIPA HITAM 3/8\" X 2,1 M', 'BTG', '', '09PH004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(826, 'PILLOW BLOCK P 205 J 0 25 M', 'BUAH', '', '09PI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(827, 'PILLOW BLOCK SY 504 ', 'BUAH', '', '09PI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(828, 'PIPA INJECTO', 'BUAH', '', '09PI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(829, 'PENJEPIT KAWA', 'BUAH', '', '09PJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(830, 'PISAU POTONG KAC', 'BUAH', '', '09PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(831, 'PACKING KARTON 3mm MERK TO,B', '0', '', '09PK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(832, 'PACKING KARTON TBA 1 m', 'MTR', '', '09PK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(833, 'PACKING KARTON 3 mm TB', 'MTR', '', '09PK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(834, 'PLOCK SHOCK GALFANIS 2\"*1', 'BUAH', '', '09PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(835, 'PLOCK TEE GALFANIS 11/4*3/4', 'BUAH', '', '09PL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(836, 'PLOCK SHOCK 3/4*1/2', 'BUAH', '', '09PL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(837, 'PLOCK SHOCK GALFANIS 11/4\"*3/4', 'BUAH', '', '09PL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(838, 'PLOCK SHOCK PVC 11/2 X 11/', 'BUAH', '', '09PL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(839, 'PILLOW BLOCK AS 30 M', 'BUAH', '', '09PL006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(840, 'PILOT LAMP 30MM 220 VA', 'BUAH', '', '09PL007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(841, 'PLOCK TEE GALFANIS 1\" X 3/4', 'BUAH', '', '09PL008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(842, 'PLOCK TEE GALFANIS 2\" X 1', 'BUAH', '', '09PL009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(843, 'PENJEPIT MESIN SAMBUN', 'PSG', '', '09PM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(844, 'PULSE METER MP5W-4N AUTONIC', 'BUAH', '', '09PM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(845, 'PUSH BUTTON EMERGENCY 22 MM 3 NC SIEME', 'BUAH', '', '09PN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(846, 'PUSH BUTTON SWITCH KS 2', 'BUAH', '', '09PN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(847, 'PUSH BUTTON SWITCH 30 MM IDEC 1 NO + N', 'BUAH', '', '09PN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(848, 'PEMBUATAN NOK SEA', 'BUAH', '', '09PNS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(849, 'PIPA STAINLESS 3/4', 'BTG', '', '09PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(850, 'PIPA GALFFANIS 11/2 4', 'BUAH', '', '09PP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(851, 'PIPA PVC 11/2', 'BUAH', '', '09PP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(852, 'PIPA PVC 11/4', 'BTG', '', '09PP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(853, 'PIPA PVC 2', 'BTG', '', '09PP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(854, 'PIPA PVC 4', 'BTG', '', '09PP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(855, 'PIPA PVC 3', 'BTG', '', '09PP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(856, 'PIPA PVC 3/4', 'BTG', '', '09PP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(857, 'PIPA PVC 1/2', 'BTG', '', '09PP009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(858, 'PIPA GALFANIS 1 1/2\" SCH 4', 'BTG', '', '09PP010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(859, 'PIPA STAINLESS STELL 1 1/2\" SCH 4', 'BTG', '', '09PP011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(860, 'PIPA STAINLESS STELL 1\" SCH 4', 'BTG', '', '09PP012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(861, 'PULLY RANTAI T 20 RS 50-', 'BUAH', '', '09PR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(862, 'PAKU RIVE', 'BUAH', '', '09PR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(863, 'PELE ROLLIN', 'BUAH', '', '09PR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(864, 'PAKU RIVE', 'DUS', '', '09PR007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(865, 'PLAT STENLESS 2*90*1300 M', 'BUAH', '', '09PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(866, 'PROXIMITY SWITCH AUTONICT PR12-4D', 'BUAH', '', '09PS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(867, 'PROXIMITY SWITCH AUTONICT PR18-5D', 'BUAH', '', '09PS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(868, 'PLAT STEANLESS 316 3 MM 4*', 'LBR', '', '09PS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(869, 'PROXIMITY SWITCH PR 12 - 4 DP AUTONIC', 'BUAH', '', '09PS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(870, 'PLAT TEMBAGA 0 0,2 MM 36,5*120 C', 'BUAH', '', '09PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(871, 'PIG TAIL RIN', 'BUAH', '', '09PT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(872, 'PULLY TIMING BELT ZR-H 80 MM 20H10', 'BUAH', '', '09PT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(873, 'PULLY TIMING BELT ZR-H 160 MM 40H10', 'BUAH', '', '09PT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(874, 'PER PEGAS ULIR 3,3*31,2*100 M', 'BUAH', '', '09PU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(875, 'PULLY VANBELT TYPE B/2JLR 5', 'BUAH', '', '09PV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(876, 'PULLY VANBELT C / 6 JALUR 6', 'BUAH', '', '09PV002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(877, 'PULLY VANBELT TYPE : C DIA 8\" X 5 JALU', 'BUAH', '', '09PV003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(878, 'PULLY VANBELT TYPE : B DIA 12\" X 4 JALU', 'BUAH', '', '09PV004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(879, 'PULLY VANBELT TYPE : D DIA 12\" X 7 JALU', 'BUAH', '', '09PV005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(880, 'PILOT VALV', 'BUAH', '', '09PV006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(881, 'PULLY TYPE C5 300 M', 'BUAH', '', '09PY001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(882, 'QUART ASILATOR AMANO PJ900', 'BUAH', '', '09QA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(883, 'RELAY ANLY TYPE AHC 2 N/ 220V 24 VD', 'BUAH', '', '09RA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(884, 'RELAY ANLY TYPE AHC 4 N/220 ', 'BUAH', '', '09RA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(885, 'RELAY ANLY 24*PC TYPE AHC 2 ', 'BUAH', '', '09RA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(886, 'RELAY TYPE AHC NAN 220/24', 'BUAH', '', '09RA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(887, 'RING BROWN 222*216*14 M', 'BUAH', '', '09RB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(888, 'RING BROWN 300*284*2', 'BUAH', '', '09RB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(889, 'RING BROWN 225*208*15 M', 'BUAH', '', '09RB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(890, 'RING BROWN 300*285*2', 'BUAH', '', '09RB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(891, 'RING BROWN 225*210*1', 'BUAH', '', '09RB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(892, 'RANTAI DID 80-', 'SET', '', '09RD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(893, 'RANTAI DID 40*', 'SET', '', '09RD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(894, 'ROLL DENSER TYPE ', 'BUAH', '', '09RD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(895, 'ROLL DENSER TYPE B', 'BUAH', '', '09RD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(896, 'ROLL DENSER TYPE ', 'BUAH', '', '09RD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(897, 'RANTAI DID/HITACHI 60*3 3 JALU', 'BOX', '', '09RD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(898, 'REPAIR DRUM COILE', 'UNIT', '', '09RD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(899, 'REL PINTU ROLLING DOOR TYPE:W500/80 2,9', 'BTG', '', '09RE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(900, 'ROLL KERAMI', 'BUAH', '', '09RF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(901, 'RODA REL GANTUNG RD 4 W 500/8', 'BUAH', '', '09RG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(902, 'ROTOR GURINDA TANGAN GA6020 150MM MAKIT', 'BUAH', '', '09RG003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(903, 'RODA LORY 4\" ( HIDUP+MATI ', 'SET', '', '09RL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(904, 'RODA LORY 6\" ( MATI+HIDUP ', 'SET', '', '09RL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(905, 'RODA LORY HAND PALLET ( 70 MM*180MM ', 'BUAH', '', '09RL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(906, 'RODA LORY 10', 'BUAH', '', '09RL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(907, 'REGULATOR LP', 'BUAH', '', '09RL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(908, 'RODA LORY 5\" (KARET) HIDUP + MAT', 'SET', '', '09RL006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(909, 'RODA ROLY HAND PALLET ETZ 080 X 074 X02', 'BUAH', '', '09RL007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(910, 'RODA LORY 8', 'BUAH', '', '09RL008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(911, 'ROLL DENSER ALUMUNIUM 350 M', 'BUAH', '', '09RM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(912, 'RELAY OMRON LY 4 24 VD', 'BUAH', '', '09RO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(913, 'RELAY OMRON LY 2 24 V D', 'BUAH', '', '09RO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(914, 'RING PLAT M 1', 'BUAH', '', '09RP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(915, 'RING PER 5/8', 'BUAH', '', '09RP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(916, 'RING PLAT 5/8', 'BUAH', '', '09RP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(917, 'RING PISTON P/N. 4145 034 3000 - ', 'BUAH', '', '09RP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(918, 'RADAR AIR ST 7', 'BUAH', '', '09RR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(919, 'RING SEFE', 'BUAH', '', '09RS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(920, 'RING SEHER MINYAK', 'BUAH', '', '09RS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(921, 'STANG SEHE', 'BUAH', '', '09RS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(922, 'RING STOPPER', 'BUAH', '', '09RS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(923, 'RANTAI RS 60 X 1 JALU', 'BOX', '', '09RS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(924, 'RING TEMBAGA PLAT 0 108*112*0,', 'BUAH', '', '09RT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(925, 'RING TEMBAGA BULAT 0 115*112*', 'BUAH', '', '09RT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(926, 'RELAY UNIT OMRON 61F-1', 'BUAH', '', '09RU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(927, 'REGULATOR OXYGE', 'UNIT', '', '09RX001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(928, 'SEAL ASBE', 'BUAH', '', '09SA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(929, 'SEAL ASBES 5/8', 'METER', '', '09SA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(930, 'SEAL ASBES / GLAND PACKING 3/4', 'METER', '', '09SA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(931, 'SEAL ASBES / GLAND PACKING 5/16', 'METER', '', '09SA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(932, 'SHAFT ASSY ( JPN ', 'PCS', '', '09SAJ01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(933, 'SEKRING BATU', 'BUAH', '', '09SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(934, 'SHOULDER BELT ASSY P/N. 4145 710 9000 - ', 'BUAH', '', '09SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(935, 'STOP BUTTON COMP P/N. 4145 430 0201 - ', 'BUAH', '', '09SB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(936, 'STOP CONTAC A', 'SET', '', '09SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(937, 'STOP CONTAC ( 2 L BG ', 'BUAH', '', '09SC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(938, 'STOP CONTAC ( 4 LBG ', 'BUAH', '', '09SC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(939, 'STOP CONTAC O', 'BUAH', '', '09SC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(940, 'STOP CONTAC ELEGRA', 'BUAH', '', '09SC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(941, 'SEMPROTAN CA', 'BUAH', '', '09SC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(942, 'STOP CONTAC INBOW CLIPSA', 'BUAH', '', '09SC007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(943, 'STOP KONTA', 'BUAH', '', '09SC008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(944, 'SOCKET P2CF-08 OMRO', 'BUAH', '', '09SC009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(945, 'SPEED CONTROL JVTMBSTER400YN 220V TEC', 'UNIT', '', '09SC010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(946, 'SCREW M4 X 25 P/N. 9050 318 0740 - ', 'BUAH', '', '09SC011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(947, 'SCREW P/N. 9045 319 1020 - ', 'BUAH', '', '09SC012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(948, 'SOCKET RELAY P2 CF-11 OMRO', 'BUAH', '', '09SC013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(949, 'STEP CON DRAWING CAPSTA', 'BUAH', '', '09SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(950, 'SAKLAR DOUBLE AUTBOK', 'SET', '', '09SD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(951, 'SHOCK DRAT DALAM GALFANIS 3', 'BUAH', '', '09SD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(952, 'SAKLAR DOUBLE CLIPSA', 'BUAH', '', '09SD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(953, 'SHOCK DRAT DALAM GALFANIS 2 1/2', 'BUAH', '', '09SD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(954, 'SHOCK DRAT LUAR PVC 1/2', 'BUAH', '', '09SD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(955, 'SEAL DUS', 'BUAH', '', '09SD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(956, 'SHOCK DRAT DALAM GALFANIS 1 1/2', 'BUAH', '', '09SD010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(957, 'SHOCK DRAT LUAR GALFANIS 1 1/2', 'BUAH', '', '09SD011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(958, 'SERVICE DINAMO MOTOR 3/4 HP 3 PH 380', 'UNIT', '', '09SD034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(959, 'STECKER ELEGRAN 32 A/3 PHAS', 'BUAH', '', '09SE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(960, 'STECKER STOP CONTA', 'BUAH', '', '09SE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(961, 'SERVICE FLOW METER TOKICO TYPE ROR 59 M', 'BUAH', '', '09SF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(962, 'SEPARATOR FILTE', 'BUAH', '', '09SF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(963, 'SAKLAR GANTUN', 'BUAH', '', '09SG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(964, 'SEDOTAN GO', 'BUAH', '', '09SG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(965, 'SPROKET GEAR COILE', 'UNIT', '', '09SG004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(966, 'SAFETY GUARD P/N. 4145 713 4500 - ', 'BUAH', '', '09SG007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(967, 'SHOCK DRAT LUAR PVC 3', 'BUAH', '', '09SH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(968, 'STOP KRAN KIT 3/4', 'BUAH', '', '09SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(969, 'STOP KRAN KITT 1/2', 'BUAH', '', '09SK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(970, 'STOP KRAN KITT 1', 'BUAH', '', '09SK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(971, 'STOP KRAN 1/2', 'BUAH', '', '09SK007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(972, 'STOP KRAN KITT 21/2 ', 'BUAH', '', '09SK008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(973, 'SAKLAR KRAN BC 1/2', 'BUAH', '', '09SK009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(974, 'SELONGSONG KERAMIK 14 m', 'BTG', '', '09SK010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(975, 'STOP KRAN KIT 3/8\" (PUTAR', 'BUAH', '', '09SK011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(976, 'SELONGSONG KERAMIK 12 MM X 1,20 MT', 'BTG', '', '09SK012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(977, 'SELANG ANGIN 4*6 M', 'METER', '', '09SL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(978, 'SELANG ANGIN 8,5*14 M', 'METER', '', '09SL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(979, 'SELANG HITAM 1\" ( BS ', 'METER', '', '09SL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(980, 'SELANG ANGIN 6.5*10 m', 'MTR', '', '09SL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(981, 'SELANG 1', 'MTR', '', '09SL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(982, 'SELANG 1 1/2', 'MTR', '', '09SL006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(983, 'SELANG 2', 'MTR', '', '09SL007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(984, 'SELANG 1 1/4', 'MTR', '', '09SL008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(985, 'SELANG GREASE HAND PUM', 'BUAH', '', '09SL009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(986, 'SIKAT KAWAT MANGKOK', 'BUAH', '', '09SM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(987, 'SIN CRONOSPIO SC 3 VI 360/380 V 50 H', 'BUAH', '', '09SN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(988, 'SELANG NYLON 3/4', 'BUAH', '', '09SN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(989, 'SELANG NYLON 3/8', 'MTR', '', '09SN004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(990, 'SELANG DOUBLE 400/OXYGE', 'METER', '', '09SO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(991, 'STOCK PVC 3', 'BUAH', '', '09SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(992, 'SWITCH PUS', 'BUAH', '', '09SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(993, 'SHOCK PVC 3/4', 'BUAH', '', '09SP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(994, 'SHOCK PVC 1/2', 'BUAH', '', '09SP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(995, 'SHOCK PVC 11/2', 'BUAH', '', '09SP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(996, 'SLIDING PER & SLIDIN', 'SET', '', '09SP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(997, 'SPORKET 60 X 3', 'BUAH', '', '09SP010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(998, 'SAMBUNGAN PC - 1', 'BUAH', '', '09SP011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(999, 'SPARK PLUG P/N. 1110 400 700', 'BUAH', '', '09SP012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1000, 'SHOULDER PLATE COMP P/N. 4145 701 1800 -', 'BUAH', '', '09SP013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1001, 'SUPPORT P/N. 4145 432 9201 - ', 'BUAH', '', '09SP014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1002, 'SELONGSONG KABEL PVC 20 M', 'METER', '', '09SQ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1003, 'SELONGSONG KERAMIK 14 MM @ 11/2 METE', 'BTG', '', '09SQ002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1004, 'SAMBUNGAN RANTAI (CORECTING LINK) 80-', 'BUAH', '', '09SR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1005, 'SAMBUNGAN RANTAI RS 50*', 'BUAH', '', '09SR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1006, 'SAMBUNGAN RANTA', 'BUAH', '', '09SR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1007, 'SINGLE RING CAPSTAN 255*230*3', 'BUAH', '', '09SR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1008, 'SINGLE RING CAPSTAN 220*195*3', 'BUAH', '', '09SR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1009, 'SELANG RADIATOR ( BESAR', 'MTR', '', '09SR006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1010, 'SELANG RADIATOR (KECIL', 'MTR', '', '09SR007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1011, 'SINGLE RING CAPSTAN UK. 152 X 132 X H 20', 'BUAH', '', '09SR008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1012, 'STATER S-1', 'BUAH', '', '09SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1013, 'SAKLAR SES', 'SET', '', '09SS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1014, 'SOLENOID STOP ENGIN', 'BUAH', '', '09SS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1015, 'SELANG SPIRAL 2', 'MTR', '', '09SS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1016, 'SELANG SOLA', 'MTR', '', '09SS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1017, 'SELANG SANBLASTING 1 1/4', 'MTR', '', '09SS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1018, 'SEAL TAPE', 'ROLL', '', '09ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1019, 'SOLDERAN TIM', 'BUAH', '', '09ST002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1020, 'SAKLAR TRIPLE CLIPSA', 'BUAH', '', '09ST007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1021, 'STANG TAP SNEE 2 ', 'BUAH', '', '09ST008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1022, 'STANG TAP DRILL 3/8 ', 'BUAH', '', '09ST009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1023, 'SELENOIT VALVE MODEL 4 V210/0', 'BUAH', '', '09SV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1024, 'SELENOID VALVE KURODA AS 2408 220 ', 'BUAH', '', '09SV002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1025, 'SOLENOID VALVE TYPE:4V330-10 220', 'BUAH', '', '09SV003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1026, 'SOLENOID VALVE', 'UNIT', '', '09SV004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1027, 'SOLENOID VALVE KCC TYPE:KS4130-032G 220', 'BUAH', '', '09SV005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1028, 'SOLENOID VALVE VS4130-4G-0', 'BUAH', '', '09SV006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1029, 'SOLENOID VALVE KCC KS320S-2D 5PORT 1/4', 'BUAH', '', '09SV007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1030, 'SOLENOID VALVE PORT 1/4', 'BUAH', '', '09SV008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1031, 'SPIRAL WRAPPING BEND KS ', 'BUAH', '', '09SW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1032, 'STOP WIRE P/N. 4145 440 1103 - ', 'BUAH', '', '09SW003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1033, 'TALI ASBESS 10 M', 'ROLL', '', '09TA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1034, 'TALI ASBESS 12 M', 'ROLL', '', '09TA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1035, 'TIMMING BELT ZR 900 ', 'BUAH', '', '09TB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1036, 'TIMMING BELT 357 ', 'BUAH', '', '09TB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1037, 'TANGKI BENSI', 'BUAH', '', '09TB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1038, 'TUTUP TANGK', 'BUAH', '', '09TB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1039, 'TIMMING BELT 950 H 1', 'BUAH', '', '09TB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1040, 'TIMMING BELT 450 ', 'BUAH', '', '09TB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1041, 'TERMINAL BLOCK 60 ', 'BUAH', '', '09TB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1042, 'TERMINAL BLOCK 30 ', 'BUAH', '', '09TB008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1043, 'TERMINAL KERAMIK 200 ', 'BUAH', '', '09TB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1044, 'THERMO COUPLE TYPE : K 0 5 M', 'BUAH', '', '09TC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1045, 'THERMO COUPLE POSITHEREM TE 13230', 'BUAH', '', '09TC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1046, 'TEMPERATUR CONTRO', 'UNIT', '', '09TC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1047, 'THERMO CONTROL AUTONI', 'BUAH', '', '09TC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1048, 'TC ', 'BUAH', '', '09TC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1049, 'TEE DRAT GALFANIS 3 X 1 1/2', 'BUAH', '', '09TD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1050, 'TAP DRILL 1/2', 'SET', '', '09TD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1051, 'TAP DRILL 3/8', 'SET', '', '09TD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1052, 'TAP M', 'BUAH', '', '09TD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1053, 'TEE DRAT GALFANIS 2\" X 1', 'BUAH', '', '09TD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1054, 'TAP DRILL 28MM X 1 1/2', 'BUAH', '', '09TD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1055, 'TAP DRILL 28MM X 1 1/2', 'SET', '', '09TD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1056, 'TAP DRILL 5/16 ', 'SET', '', '09TD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1057, 'TEE PVC 4', 'BUAH', '', '09TE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1058, 'THERMO FIT 0 2,5 MM', 'ROLL', '', '09TF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1059, 'TEE GALFANIS 1', 'BUAH', '', '09TG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1060, 'TEE GALFANIS 11/2*11/2', 'BUAH', '', '09TG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1061, 'TEE GALFANIS 2\"*1', 'BUAH', '', '09TG003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1062, 'TUBULAR HEATER 0 15,5*700 220 V/400 ', 'BUAH', '', '09TH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1063, 'TIM', 'ROLL', '', '09TI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1064, 'TAKEL/CHAIN HOIST MANUAL CAPS : 1 TO', 'UNIT', '', '09TK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1065, 'TAKEL/CHAIN MANUAL CAPS : 2 TO', 'UNIT', '', '09TK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1066, 'TESPEN KECI', 'BUAH', '', '09TK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1067, 'TERMINAL KABEL SIEMENS 8WA1 012-1DP1', 'BUAH', '', '09TK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1068, 'TAKEL / MANUAL CHAIN HOIST CAPS. 2 TO', 'UNIT', '', '09TK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1069, 'THERMINAL BLOCK 100 A/4 JALU', 'BUAH', '', '09TL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1070, 'TANG LANCIP 5\" (GAGANG MERAH', 'BUAH', '', '09TL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1071, 'TEE LAS GALFANIS 21/2', 'BUAH', '', '09TL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1072, 'TIMER SWITCH SUL 181 B/220 ', 'BUAH', '', '09TM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1073, 'TIMER STPNH NO.3 H3CR A-8 OMRON 110-240', 'BUAH', '', '09TM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1074, 'TIMER H3CR-A8E AC 100-240 OMRO', 'BUAH', '', '09TM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1075, 'TANG COMBINASI 8', 'BUAH', '', '09TN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1076, 'THERMAL OVER LOAD THN-6054 A ( 43-65 A ', 'BUAH', '', '09TO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1077, 'THERMAL OVER LOAD THN-20/0-7A (0,55-0,8', 'BUAH', '', '09TO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1078, 'THERMAL OVERLOAD THN-12 (1,4-2,0 A', 'BUAH', '', '09TO003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1079, 'THERMAL OVERLOAD THN-20/29A (24-34A', 'BUAH', '', '09TO004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1080, 'THERMAL OVER LOAD THN-12/2,1A (1,7-2,5A', 'BUAH', '', '09TO005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1081, 'THERMAL OVERLOAD THN-20/7-II ', 'BUAH', '', '09TO006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1082, 'THERMAL OVERLOAD THN-20/2,1A (1,7-2,5A)', 'BUAH', '', '09TO007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1083, 'THERMAL OVERLOAD THN 20/11A ( 9 - 13 A ', 'BUAH', '', '09TO008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1084, 'THERMAL OVERLOAD THN-60 ( 34-50A', 'BUAH', '', '09TO009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1085, 'THERMAL OVERLOAD THN-120/54A ( 43 - 65 ', 'BUAH', '', '09TO010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1086, 'THERMAL OVERLOAD THN-120/67 A( 54-80A', 'BUAH', '', '09TO011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1087, 'THERMAL OVERLOAD THN 20 - 19 ', 'UNIT', '', '09TO012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1088, 'THERMAL OVERLOAD THN-20/9', 'BUAH', '', '09TO013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1089, 'THERMAL OVERLOAD THN-20 / 15 ', 'BUAH', '', '09TO014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1090, 'THERMAL OVERLOAD THN - 20 / 6,6 ', 'BUAH', '', '09TO015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1091, 'THERMAL OVERLOAD THN - 20 / 3,6 ', 'BUAH', '', '09TO016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1092, 'THERMAL OVERLOAD THN - 20 / 5 ', 'BUAH', '', '09TO017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1093, 'THEMPERATUR CONTROL MDL : 200 110/220 ', 'BUAH', '', '09TP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1094, 'TAPPER PULLEY TYPEC5  300M', 'UNIT', '', '09TP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1095, 'TIMAH PAYUN', 'BUAH', '', '09TP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1096, 'TEE PVC 11/', 'BUAH', '', '09TP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1097, 'TEE PVC 11/2 X 3/', 'BUAH', '', '09TP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1098, 'TEE PVC 11/2\"*1/2', 'BUAH', '', '09TP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1099, 'TEE PVC 1/2', 'BUAH', '', '09TP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1100, 'TEE REDUSER GALFANIS 2 1/2\" X 1 1/2', 'BUAH', '', '09TR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1101, 'TOGLE SWITCH 2 ', 'BUAH', '', '09TS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1102, 'TEE SHOCK PVC 1 1/2\" X 1/2', 'BUAH', '', '09TS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1103, 'TEE STAINLESS STELL 1 1/2\" X 1', 'BUAH', '', '09TS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1104, 'TAP SNEE 1/2 ', 'SET', '', '09TS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1105, 'TAP SNEE 3/8 ', 'SET', '', '09TS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1106, 'TAP SNEE 3/4 ', 'SET', '', '09TS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1107, 'TAP SNEE 5/8 ', 'SET', '', '09TS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1108, 'THERMOSTATIC VALVE P/N. 2901-0074-0', 'SET', '', '09TV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1109, 'THROTTLE WIRE COMPL P/N. 4145 180 1101 -', 'BUAH', '', '09TW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1110, 'VANBELT A-3', 'BUAH', '', '09VA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1111, 'VANBELT A-3', 'BUAH', '', '09VA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1112, 'VANBELT A-5', 'BUAH', '', '09VA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1113, 'VANBELT A-7', 'BUAH', '', '09VA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1114, 'VANBELT A-8', 'BUAH', '', '09VA005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1115, 'VANBELT A-5', 'BUAH', '', '09VA006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1116, 'VANBELT A 5', 'BUAH', '', '09VA007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1117, 'VANBELT A 6', 'BUAH', '', '09VA008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1118, 'VANBELT A - 5', 'BUAH', '', '09VA009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1119, 'VANBELT B-3', 'BUAH', '', '09VB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1120, 'VANBELT B-4', 'BUAH', '', '09VB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1121, 'VANBELT B-5', 'BUAH', '', '09VB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1122, 'VANBELT B-5', 'BUAH', '', '09VB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1123, 'VANBELT B-6', 'BUAH', '', '09VB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1124, 'VANBELT B-6', 'BUAH', '', '09VB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1125, 'VANBELT B-7', 'BUAH', '', '09VB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1126, 'VANBELT B-7', 'BUAH', '', '09VB008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1127, 'VANBELT B-7', 'BUAH', '', '09VB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1128, 'VANBELT B-8', 'BUAH', '', '09VB010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1129, 'VANBELT B-8', 'BUAH', '', '09VB011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1130, 'VANBELT B-4', 'BUAH', '', '09VB012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1131, 'VANBELT B-7', 'BUAH', '', '09VB013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1132, 'VANBELT B-4', 'BUAH', '', '09VB014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1133, 'VANBELT B-5', 'BUAH', '', '09VB015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1134, 'VANBELT B-7', 'BUAH', '', '09VB016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1135, 'VANBELT B 2', 'BUAH', '', '09VB017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1136, 'VANBELT B 3', 'BUAH', '', '09VB018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1137, 'VANBELT B 5', 'BUAH', '', '09VB019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1138, 'VANBELT B 6', 'BUAH', '', '09VB020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1139, 'VANBELT B 6', 'BUAH', '', '09VB021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1140, 'VANBELT B 9', 'BUAH', '', '09VB022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1141, 'VANBELT B-4', 'BUAH', '', '09VB023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1142, 'VANBELT B-4', '', '', '09VB024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1143, 'VANBELT B 4', 'BUAH', '', '09VB028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1144, 'VANBELT C-15', 'BUAH', '', '09VB029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1145, 'VANBELT B-8', 'BUAH', '', '09VB030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1146, 'VANBELT B-5', 'BUAH', '', '09VB031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1147, 'VANBELT B - 12', 'BUAH', '', '09VB032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1148, 'VANBELT KULIT B - 4', 'BUAH', '', '09VB033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1149, 'VANBELT A-4', 'BUAH', '', '09VB035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1150, 'VANBELT A-6', 'BUAH', '', '09VB036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1151, 'VANBELT B-4', 'BUAH', '', '09VB037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1152, 'VANBELT B-13', 'BUAH', '', '09VB038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1153, 'VANBELT A440 ( 12.5 x 1175 LA', 'BUAH', '', '09VB039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1154, 'VANBELT A440 ( 12.5 x 1150 LA ', 'BUAH', '', '09VB040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1155, 'VANBELT B - 10', 'BUAH', '', '09VB041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1156, 'VANBELT B - 6', 'BUAH', '', '09VB042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1157, 'VANBELT B - 9', 'BUAH', '', '09VB043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1158, 'VANBELT A - 2', 'BUAH', '', '09VB044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1159, 'VANBELT A - 4', 'BUAH', '', '09VB045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1160, 'VANBELT C-10', 'BUAH', '', '09VC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1161, 'VANBELT C-13', 'BUAH', '', '09VC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1162, 'VANBELT C-17', 'BUAH', '', '09VC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1163, 'VANBELT C 22', 'BUAH', '', '09VC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1164, 'VANBELT C 9', 'BUAH', '', '09VC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1165, 'VANBELT C 17', 'BUAH', '', '09VC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1166, 'VANBELT C-15', 'BUAH', '', '09VC008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1167, 'VANBELT C- 18', 'BUAH', '', '09VC009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1168, 'VANBELT C - 14', 'BUAH', '', '09VC010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1169, 'VANBELT D-14', 'BUAH', '', '09VD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1170, 'VANBELT D 16', 'BUAH', '', '09VD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1171, 'VANBELT D 15', 'BUAH', '', '09VD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1172, 'VANBELT D - 16', 'BUAH', '', '09VD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1173, 'VACUM GAUGE TYPE:CLASS DIA 3/8\"/100 M', 'BUAH', '', '09VG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1174, 'VANBELT KULIT CHLT 3 4*55*134', 'BUAH', '', '09VK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1175, 'VANBELT KULIT CHLT 3 4*35*172', 'BUAH', '', '09VK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1176, 'VANBELT KULIT CHLT 3 50*135', 'BUAH', '', '09VK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1177, 'VANBELT KULIT CH LT 3 50*136', 'BUAH', '', '09VK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1178, 'VANBELT KULIT CH LT 3 50*112', 'BUAH', '', '09VK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1179, 'VANBELT KULIT CH LT 3 35*115', 'BUAH', '', '09VK006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1180, 'VANBELT KULIT CH LT 3 35*11/', 'BUAH', '', '09VK007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1181, 'VANBELT KULIT CH LT 3 35*136', 'BUAH', '', '09VK008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1182, 'VANBELT KULIT CH LT 3 30*116', 'BUAH', '', '09VK009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1183, 'VANBELT KULIT CALT 3 O AMM*20*95', 'BUAH', '', '09VK010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1184, 'VANBELT  KULIT CHLT 3 65*190', 'BUAH', '', '09VK011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1185, 'VANBELT KULIT CHLT3 40*110', 'BUAH', '', '09VK012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1186, 'VANBELT KULIT CHLT 3 50 X 135', 'BUAH', '', '09VK013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1187, 'VANBELT KULIT CHLT3 35*146', 'BUAH', '', '09VK021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1188, 'VANBELT KULIT CHLT3  30*116', 'BUAH', '', '09VK022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1189, 'VANBELT KULIT CHLT3  35*134', 'BUAH', '', '09VK023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1190, 'VANBELT KULIT CHLT3  65*186', 'BUAH', '', '09VK024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1191, 'VANBELT KULIT CHLT3  35*150', 'BUAH', '', '09VK025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1192, 'VANBELT KULIT CHLT3 35*146', 'BUAH', '', '09VK026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1193, 'VANBELT KULIT CHLT3 50*202', 'BUAH', '', '09VK027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1194, 'VANBELT KULIT CHLT3 35*110', 'BUAH', '', '09VK028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1195, 'VANBELT KULIT CHLT3 30 X 157', 'BUAH', '', '09VK029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1196, 'VANBELT KULIT CHLT3 4 X 60 X 192', 'BUAH', '', '09VK030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1197, 'VANBELT KULIT CHLT3  4 X 65 X 190', 'BUAH', '', '09VK031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1198, 'VANBELT KULIT CHLT3 UK. 35 X 134', 'BUAH', '', '09VK032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1199, 'VANBELT KULIT CHLT3 65 X 188', 'BUAH', '', '09VK033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1200, 'VANBELT KULIT CHLT3 UK. 35 X 109', 'BUAH', '', '09VK034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1201, 'VANBELT O 3*27,5*96', 'BUAH', '', '09VO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1202, 'VANBELT 3  V*75', 'BUAH', '', '09VP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1203, 'VLOCK RING 1/4 \" X 3/8 ', 'BUAH', '', '09VR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1204, 'VARIABLE SPEED DRIVE TYPE D007 A-', 'UNIT', '', '09VS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1205, 'VARIABLE SPEED REDUCER TYPE NMRV 0,3', 'UNIT ', '', '09VS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1206, 'VALVE SETTING EX OM 444 L', 'BUAH', '', '09VS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1207, 'VLOCK TEE GALFANIS 1 1/2\" X 3/4', 'BUAH', '', '09VT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1208, 'VLOCK TEE GALFANIS 1 1/2\" X 1/2', 'BUAH', '', '09VT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1209, 'VLOCK TEE GALFANIS 1 1/2\" X 1', 'BUAH', '', '09VT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1210, 'VINYL WIRE IND CAP BLUE O 16 MM @10', 'PAK', '', '09VW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1211, 'VINYL WIRE END CAP BLACK O 16 MM @10', 'PAK', '', '09VW002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1212, 'VINYL WIRE END CAP YELLOW O 1,5MM @10', 'PAK', '', '09VW003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1213, 'VINYL WIRE ENG CAP KED O 1,5MM @10', 'PAK', '', '09VW004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1214, 'VOLT METER VT-6705 0-100/10 V VICTO', 'PAK', '', '09VW005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1215, 'VINYL WIRE END CAP BLACK O 1,5MM @10', 'PAK', '', '09VW006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1216, 'VINYL WIRE END CAP YELLOW O 2,5MM @10', 'PAK', '', '09VW007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1217, 'VINYL WIRE END CAP RED O 2,5MM @10', 'PAK', '', '09VW008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1218, 'VINYL WIRE END CAP BLUE O 1,5MM @10', 'PAK', '', '09VW009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1219, 'WD 4', 'KLG', '', '09WD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1220, 'WATER MUR GALFANIS 1/2', 'BUAH', '', '09WG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1221, 'WATER MUR GALFANIS 3/4', 'BUAH', '', '09WG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1222, 'WATER MUR GALFANIS 2', 'BUAH', '', '09WG003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1223, 'WATER MUR GALFANIS 11/2', 'BUAH', '', '09WG004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1224, 'WATER MUR GALFANIS 21/2', 'BUAH', '', '09WG006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1225, 'WATER MUR GALFANIS 1', 'BUAH', '', '09WG007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1226, 'WIRE MESS 6 M', 'LBR', '', '09WM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1227, 'WATER METER 1\" MEREK TIRA', 'UNIT', '', '09WM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1228, 'WIRE MESS 5,5 M', 'LBR', '', '09WM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1229, 'WO-4', 'KLG', '', '09WO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1230, 'WATER MUR PVC 1', 'BUAH', '', '09WP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1231, 'WATER PAS 600 mm/24', 'BUAH', '', '09WP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1232, 'WATER MUR STEAM 3/4', 'BUAH', '', '09WS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1233, 'WATER MUR STEAM O 3', 'BUAH', '', '09WS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1234, 'WSD / DRAIN VALV', 'UNIT', '', '09WS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1235, 'WATER MUR STAINLESS STELL 1', 'BUAH', '', '09WS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1236, 'WATER MUR STAINLESS STELL 1 1/2', 'BUAH', '', '09WS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1237, 'WASHER P/N. 9321 630 0180 - ', 'BUAH', '', '09WS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1238, 'WATER TEMPERATURE GAUGE 40-120C 52 M', 'BUAH', '', '09WT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1239, 'SERVICE DINAMO MTR 100HP/75K', 'UNIT', '', '10001SD', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1240, 'SERVICE DINAMO BLOWER RPM 280', 'UNIT', '', '10012DB', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1241, 'SERVICE DINAMO MTR 15 WATT 220 ', 'UNIT', '', '1001SDM', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1242, 'SERVICE MESIN SERUT 220-230', 'UNIT', '', '1001SMS', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1243, 'SERVICE ABSEN AMAN', 'UNIT', '', '1004SAA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1244, 'SERVICE MESIN SAMBUNG 380 ', 'UNIT', '', '1010SS0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1245, 'BONGKAR + PASANG A', 'UNIT', '', '10BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1246, 'CONECTO', 'BUAH', '', '10C0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1247, 'FABRIKASI CYLINDER HEA', 'UNIT', '', '10FC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1248, 'FABRIKASI CRANKSHAF', 'UNIT', '', '10FC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1249, 'FABRIKASI ENGIN', 'UNIT', '', '10FE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1250, 'REPAIR FLYWHEEL GEA', 'UNIT', '', '10FG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1251, 'ISI ANGIN NITROGE', 'RODA', '', '10IA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1252, 'INSTALLASI SERVE', 'UNIT', '', '10ISC01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1253, 'JASA BONGKAR PASAN', 'UNIT', '', '10JB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1254, 'JASA CEK/SERVICE WATER HEATE', 'UNIT', '', '10JCWH1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1255, 'JASA GENERAL OVER HAUL GENSE', 'UNIT', '', '10JG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1256, 'JASA OVERHAUL ENGIN', 'UNIT', '', '10JH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1257, 'JASA KERJA', 'UNIT', '', '10JK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1258, 'JASA OVERHAUL TRANSMISSIO', 'LOT', '', '10JOT01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1259, 'JASA PASANG', 'UNIT', '', '10JP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1260, 'JASA PEMINDAHAN CEROBONG ASA', 'UNIT', '', '10JPCA1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1261, 'JASA PERBAIKAN CEROBONG APOLL', 'UNIT', '', '10JPCA2', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1262, 'JASA SERVIC', 'UNIT', '', '10JS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1263, 'JASA SERVICE FORKLI', 'UNIT', '', '10JS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1264, 'KALIBRASI INJECTION PUMP + PAR', 'UNIT', '', '10KI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1265, 'KALIBRASI NOZZL', 'BUAH', '', '10KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1266, 'KONTRAK SERVICE MESIN FOTO COP', 'UNIT', '', '10KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1267, 'KALIBRASI TIMBANGA', 'UNIT', '', '10KT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1268, 'MESIN SAMBUNG COLD WELDER', 'UNIT', '', '10MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1269, 'PEMINDAHAN INSTALASI COMPUTE', 'TITIK', '', '10PIC01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1270, 'REPAIR AS CAPSTA', 'BUAH', '', '10RA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1271, 'REPAIR AS C / V ( HARD CROOM ', 'BUAH', '', '10RA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1272, 'REPAIR AS COILE', 'BUAH', '', '10RA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1273, 'REPAIR AS ROTOR DINAM', 'BUAH', '', '10RA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1274, 'REPAIR BOS PISTO', 'BUAH', '', '10RB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1275, 'REPAIR BOS PELATU', 'BUAH', '', '10RB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1276, 'REPAIR ROD TILT CYLINDE', 'BUAH', '', '10RC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1277, 'REPAIR + CERAMIC COATING ROLL CAPSTAN 15', 'BUAH', '', '10RC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1278, 'REPAIR CASE', 'PCS', '', '10RCF01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1279, 'REPAIR CLUTCH SYSTE', 'LOT', '', '10RCS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1280, 'REPAIR+HARD CROME ROLL CAPSTAN 16', 'BUAH', '', '10RH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1281, 'REPAIR+HARD CROME ROLL CAPSTAN 18', 'BUAH', '', '10RH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1282, 'REPAIR A', 'BTG', '', '10RP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1283, 'REPAIR PULL', 'BUAH', '', '10RP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1284, 'REPAIR RUMAH BEARIN', 'BUAH', '', '10RR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1285, 'REPAIR DUDUKAN SEA', 'BUAH', '', '10RS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1286, 'SERVICE CUCI AC', 'UNIT', '', '10SA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1287, 'SERVICE A', 'UNIT', '', '10SA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1288, 'SERVICE AIR DRYE', 'UNIT', '', '10SA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1289, 'SERVICE MESIN ABSEN AMAN', 'UNIT', '', '10SA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1290, 'KURAS + STROOM ACC', 'UNIT', '', '10SA005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1291, 'SERVICE AC + SPAREPAR', 'UNIT', '', '10SA006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1292, 'SERVICE BRICK MAGNI', 'UNIT', '', '10SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1293, 'SERVICE BLOWER1/2 HP/380', 'UNIT', '', '10SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1294, 'SERVICE BESAR 2000 HR', 'LOT', '', '10SB200', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1295, 'SERVICE BESAR ( OVERHAUL ) + SPAREPAR', 'UNIT', '', '10SBS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1296, 'SERVICE COMPUTER', 'UNIT', '', '10SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1297, 'SERVICE KOMPRESOR KOBELCO KST 37-5 @ 30', 'UNIT', '', '10SC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1298, 'SERVICE COMPRESOR ATLAS COPCO GA 7', 'UNIT', '', '10SC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1299, 'SERVICE CALCULATOR CASIO HR 224 ', 'BUAH', '', '10SC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1300, 'SEWA CRAN', 'UNIT', '', '10SC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1301, 'SERVICE CALCULATOR CASI', 'BUAH', '', '10SC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1302, 'SERVICE COMPUTE', 'SET', '', '10SC007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1303, 'SERVICE CAMERA CCT', 'UNIT', '', '10SC008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1304, 'SERVICE DINAMO MOTOR 2 HP / 380 ', 'UNIT', '', '10SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1305, 'SERVICE DINAMO MOTOR TRAVES 220 ', 'UNIT', '', '10SD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1306, 'SERVICE DINAMO AMPE', 'UNIT', '', '10SD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1307, 'SERVICE DINAMO STATE', 'UNIT', '', '10SD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1308, 'SERVICE DINAMO MOYOR 15 HP / 380 V', 'UNIT', '', '10SD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1309, 'SERVICE DINAMO MOTOR 7.5 HP/380 ', 'UNIT', '', '10SD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1310, 'SERVICE DINAMO MOTOR BLOWE', 'UNIT', '', '10SD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1311, 'SERVICE DINAMO MOTOR 50 HP/38', 'UNIT', '', '10SD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1312, 'SERVICE DINAMO MOTOR 1/3 HP - 220 ', 'UNIT', '', '10SD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1313, 'SERVICE DINAMO MOTOR 1/4 HP/220-380', 'UNIT', '', '10SD010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1314, 'SERVICE DINAMO MOTOR 30HP/380', 'UNIT', '', '10SD011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1315, 'SERVICE DINAMO MOTOR TRAVES 1/2HP/220', 'UNIT', '', '10SD012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1316, 'SERVICE DINAMO MOTOR 1/2 HP/380 ', 'UNIT', '', '10SD013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1317, 'SERVICE DINAMO MOTOR 1HP/380 ', 'UNIT', '', '10SD014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1318, 'SERVICE DINAMO MOTOR 3/4 HP 6 POL', 'UNIT', '', '10SD015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1319, 'SERVICE DINAMO MOTOR 125 HP + ROTO', 'UNIT', '', '10SD016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1320, 'SERVICE DINAMO GURINDA PTG 220 ', 'UNIT', '', '10SD017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1321, 'SERVICE DINAMO MOTOR 3HP/380', 'UNIT', '', '10SD018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1322, 'SERVICE DINAMO MOTOR BLOWER 1 HP / 380 ', 'UNIT', '', '10SD019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1323, 'SERVICE DINAMO MOTOR BLOWER 1/2 HP /380', 'UNIT', '', '10SD020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1324, 'SERVICE DINAMO TRAVES 1/2 HP 380 ', 'UNIT', '', '10SD021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1325, 'SERVICE DINAMO MOTOR 75 HP 380 ', 'UNIT', '', '10SD022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1326, 'SERVICE DINAMO MOTOR 100 HP 380 ', 'UNIT', '', '10SD023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1327, 'SERVICE DINAMO MOTOR 1/8 HP 380V 100', 'UNIT', '', '10SD024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1328, 'SERVICE DINAMO MOTOR 3/4 HP 380 ', 'UNIT', '', '10SD025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1329, 'SERVICE DINAMO MOTOR 5,5 HP / 380 ', 'UNIT', '', '10SD026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1330, 'SERVICE DINAMO STATE', 'UNIT', '', '10SD027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1331, 'SERVICE DINAMO MOTOR SLIP RING 125 HP / ', 'UNIT', '', '10SD028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1332, 'SERVICE DINAMO MOTOR TRAVES 3 PHASE / 22', 'UNIT', '', '10SD029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1333, 'SERVIS DINAMO BLOWER 3 PASE 380', 'UNIT', '', '10SD030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1334, 'SERVICE DINAMO MOTOR 10 HP/380', 'UNIT', '', '10SD031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1335, 'SERVICE DINAMO MOTOR 1,5 HP/220', 'UNIT', '', '10SD032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1336, 'SERVICE DINAMO MOTOR TRAVES 1 HP/220', 'UNIT', '', '10SD033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1337, 'SERVICE DINAMO MOTOR 4 HP/380', 'UNIT', '', '10SD034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1338, 'SERVICE DINAMO MOTOR 15 HP/220 ', 'UNIT', '', '10SD035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1339, 'SERVICE DINAMO MOTOR 15 HP 220-380 ', 'UNIT', '', '10SD036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1340, 'SERVICE DINAMO MOTOR 1 HP/380 ', 'UNIT', '', '10SD037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1341, 'SERVICE DINAMO MOTOR 1/4 HP 220 ', 'UNIT', '', '10SD038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1342, 'SERVICE DINAMO MOTOR 1/2 HP 220-380', 'UNIT', '', '10SD039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1343, 'SERVICE DVR CCT', 'UNIT', '', '10SD040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1344, 'SERVICE DAPUR ROLLIN', 'UNIT', '', '10SD041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1345, 'SERVICE DINAMO BLOWER 1/2 HP 380 ', 'UNIT', '', '10SDB01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1346, 'SERVICE DINAMO FAN BLOWER 220 ', 'UNIT', '', '10SDFBV', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1347, 'SERVICE DINAMO HOIST 3 PH/380', 'UNIT', '', '10SDH03', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1348, 'SERVICE DINAMO MOTOR 20 HP-3PASE/380', 'UNIT', '', '10SDM01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1349, 'SERVICE DINAMO MOTOR 5 HP/380 ', 'UNIT', '', '10SDM5H', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1350, 'SERVICE DINAMO MOTOR BLOWER 2HP/380', 'UNIT', '', '10SDMB1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1351, 'SERVICE FORKLI', 'UNIT', '', '10SE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1352, 'SEWA FORKLI', 'UNIT', '', '10SF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1353, 'SERVICE GENSET MERCY OM 444 LA 500 KVA', 'UNIT', '', '10SG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1354, 'SERVICE HT ( RADIO PANGGIL', 'UNIT', '', '10SH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1355, 'SERVICE HOLDER CARBON BRUS', 'BUAH', '', '10SHCB1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1356, 'SERVICE INVERTER', 'UNIT', '', '10SI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1357, 'SERVICE INVERTER FUJI TYPE G9', 'UNIT', '', '10SI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1358, 'SERVICE INVERTER  MITSUBISHI 450', 'UNIT', '', '10SI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1359, 'SERVICE INJECTION PUM', 'UNIT', '', '10SI004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1360, 'SERVICE INVERTER FUJI FVR G7S 5,5 K', 'UNIT', '', '10SI005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1361, 'SERVICE INVERTER FUJI FRENIC FVR110G7S 1', 'UNIT', '', '10SI006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1362, 'SERVICE INVERTER MITSUBISHI FR A520-11', 'UNIT', '', '10SI007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1363, 'SERVICE INVERTER SHSY 3P', 'UNIT', '', '10SI008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1364, 'SERVIS INVERTER FUJI FVR G7S 11K', 'UNIT', '', '10SI009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1365, 'SERVICE INVERTER FUJI FRENIC 5000 G9', 'UNT', '', '10SI010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1366, 'SERVICE INVERTER FUJI FVR G7', 'UNT', '', '10SI011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1367, 'SERVICE INDOVISIO', 'UNIT', '', '10SI012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1368, 'SERVICE JO', 'UNIT', '', '10SJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1369, 'SERVICE KNALPOT', 'BUAH', '', '10SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1370, 'SERVICE KIPAS ANGIN 1 PHASE 220', 'UNIT', '', '10SK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1371, 'SERVICE KULKA', 'UNIT', '', '10SK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1372, 'SERVICE SENSOR META', 'UNIT', '', '10SM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1373, 'SERVICE MOBIL', 'UNIT', '', '10SM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1374, 'SERVICE MOTOR EXHAUST FAN 1/2 HP/220 ', 'UNIT', '', '10SM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1375, 'SERVICE MOTOR ROLLING 600 H', 'UNIT', '', '10SM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1376, 'SERVICE EXHAUST FAN 220', 'UNIT', '', '10SM005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1377, 'SERVICE MESIN FOTO COP', 'UNIT', '', '10SM006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1378, 'SERVICE MOBIL + GANTI OL', 'UNIT', '', '10SM007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1379, 'SERVICE MESIN TIK ELECTRI', 'UNIT ', '', '10SM008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1380, 'SERVICE MESIN ROLLIN', 'UNIT', '', '10SMR01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1381, 'SERVICE NOZE', 'SET', '', '10SN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1382, 'SERVICE SEPEDA MOTO', 'UNIT', '', '10SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1383, 'SPOORIN', 'UNIT', '', '10SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1384, 'SERVICE PULLY DENSER ALUMINIU', 'BUAH', '', '10SP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1385, 'SERVICE PRINTE', 'UNIT', '', '10SP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1386, 'SERVICE PANTEK COUPLIN', 'UNIT', '', '10SP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1387, 'SERVICE PE', 'SET', '', '10SP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1388, 'SERVICE PLC', 'UNIT', '', '10SP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1389, 'SERVICE PANEL SINCRO', 'UNIT', '', '10SP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1390, 'SERVICE PRINTER BARCOD', 'UNIT', '', '10SP009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1391, 'SERVICE PARABOL', 'UNIT', '', '10SP010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1392, 'SERVICE SEPED', 'UNIT', '', '10SP011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1393, 'SERVICE POMPA CELUP 1 PHASE 220', 'UNIT', '', '10SPC01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1394, 'SERVICE/GANTI MOTOR POMP', 'UNIT', '', '10SPS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1395, 'SERVICE REM', 'SET', '', '10SR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1396, 'SERVICE RADIATOR', 'UNIT', '', '10SR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1397, 'SERVICE RING CAPSTA', 'PCS', '', '10SRC01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1398, 'SERVICE ROLL CAPSTA', 'PCS', '', '10SRC02', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1399, 'SERVICE REL DAPUR ROLLIN', 'SET', '', '10SRDR1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1400, 'SERVICE ROTOR SLIP RING 800HP/380V/6POL', 'UNIT', '', '10SRSR1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1401, 'SERVICE SPULL BRIC', 'BUAH', '', '10SS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1402, 'SEWA STEGE', 'SET', '', '10SS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1403, 'SERVICE SOLENOID VALV', 'UNIT', '', '10SS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1404, 'SERVICE MESIN SAMBUNG 4 KVA 220 ', 'UNIT', '', '10SS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1405, 'SERVICE SLIP RING 125 HP/380 ', 'UNIT', '', '10SS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1406, 'SEWA FORKLI', 'UNIT', '', '10SS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1407, 'SERVICE SOKBLEKER & PE', 'UNIT', '', '10SSBP1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1408, 'SERVICE SERVE', 'UNIT', '', '10SSC01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1409, 'SERVICE SOKBLEKER', 'UNIT', '', '10SSM01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1410, 'SERVICE SEPEDA MOTO', 'UNIT', '', '10SSM11', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1411, 'SERVICE TELEPHON', 'UNIT', '', '10ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1412, 'SERVICE TRAVO SLIDAK 3 PH/380 ', 'UNIT', '', '10ST002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1413, 'SERVICE TRAVO SLIDAK 10 KVA/380 ', 'UNIT', '', '10ST003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1414, 'SERVICE TRAVO MESIN SAMBUNG 20 KV', 'UNIT', '', '10ST004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1415, 'SERVICE TRAVO 2500 KV', 'UNIT', '', '10ST005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1416, 'SERVICE TRAVO SLIDAK 1A/220', 'UNIT', '', '10ST006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1417, 'SERVICE TIMBANGAN', 'UNIT', '', '10ST007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1418, 'SERVICE TRAVO 2500 KV', 'UNIT', '', '10ST008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1419, 'SERVICE TEMPERATUR CONTRO', 'UNIT', '', '10ST009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1420, 'SERVICE TRAVO SLIDAK 1 KVA/38', 'BUAH', '', '10ST010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1421, 'SERVIC ETRAVO 500 W 380V/220', 'UNIT', '', '10ST011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1422, 'SERVICE TRAVO 2500 KVA + CUBICLE INCOMIN', 'UNIT', '', '10ST012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1423, 'SERVICE TRAVO CHARGER ACCU 220', 'UNIT', '', '10ST013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1424, 'SERVICE 3 PHASE 380/220 V/15 KV', 'UNIT', '', '10ST014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1425, 'SERVICE TRAVO 3 PHASE 380/220 V/15 KV ', 'UNIT', '', '10ST015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1426, 'SERVICE TRAVO MESIN SAMBUNG 10 KVA/380 ', 'UNIT', '', '10ST016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1427, 'SERVICE TRANMISI FORKLI', 'UNIT', '', '10ST017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1428, 'SERVICE TRAVO 2500 KVA & CUBICLE PL', 'UNIT', '', '10ST018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1429, 'SERVICE TRAVO SLIDAK 10 KVA 3 PHASE/380', 'UNIT', '', '10ST019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1430, 'SERVICE TRAVO SLIDAK 5 KVA/220 ', 'UNIT', '', '10ST020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1431, 'SERVICE TIMBANGAN + KALIBRAS', 'UNIT', '', '10STK01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1432, 'SERVICE UP', 'UNIT', '', '10SU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1433, 'SERVICE WHITE BOARD KX-B40', 'UNIT', '', '10SW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1434, 'SERVICE WHERSTANT ROLLIN', 'UNIT', '', '10SWR01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1435, 'TERA KALIBRASI TIMBANGAN', 'SET', '', '10TK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1436, 'TERA + KALIBRASI METERAN AIR 1', 'UNIT', '', '10TK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1437, 'TERA + KALIBRASI METERAN AIR 11/2', 'UNIT', '', '10TK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1438, 'TERA + KALIBRASI FLOW METER AI', 'UNIT', '', '10TK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1439, 'TEST OXYGEN CONTEN', 'BUAH', '', '10TO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1440, 'BEND PLASTIK 5/8', 'ROLL', '', '11BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1441, 'BOBIN PLASTIK 4', 'PCS', '', '11BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1442, 'KARUNG GONI BEKAS', 'BUAH', '', '11KG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1443, 'KARUNG JUMB', 'BUAH', '', '11KJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1444, 'KANTONG PLASTIC UK-2 K', 'KG', '', '11KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1445, 'KARUNG PLASTIC (BEKAS) UK-25 K', 'LBR', '', '11KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1446, 'KLEM SEGEL 5/', 'KG', '', '11KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1447, 'KARTON WARN', 'LBR', '', '11KW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1448, 'LABE', '', '', '11LL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1449, 'LABEL YUPO UK. 90 X 60 MM', 'LBR', '', '11LL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1450, 'PACKING KARTON 1 MM TB', 'LBR', '', '11PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1451, 'PACKING KARTON 2 MM TB', 'LBR', '', '11PK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1452, 'PETI KARTON UK 395*265*130 M', 'SET', '', '11PK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1453, 'PETI KARTON UK 450*26', 'SET', '', '11PK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1454, 'PLASTIC FILM 50 C', 'ROLL', '', '11PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1455, 'STECKER BCW BESAR', 'LBR', '', '11SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1456, 'STICKER BCW KECI', 'LBR', '', '11SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1457, 'SENG PLAT ALUMINIUM 0,25 M', 'MTR', '', '11SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1458, 'STRAPPING BEND MD 15MM BM', 'ROLL', '', '11ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1459, 'TALI RAPIA', 'ROLL', '', '11TR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1460, 'AS STEANLES 22 MM X 6 MT', 'BTG', '', '12AS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1461, 'BESI BETON 12 M', 'BTG', '', '12BB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1462, 'BESI BETON 8 M', 'BTG', '', '12BB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1463, 'BESI BETON 10 M', 'BTG', '', '12BB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1464, 'BESI PLAT STRIP 5 MM X 2', 'BTG', '', '12BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1465, 'BESI PLAT STRIP 3 MM X 2', 'BTG', '', '12BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1466, 'BESI ULIR 30 mm X 6 MT', 'BTG', '', '12BU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1467, 'DRIP ANGKA ( BESAR ) 12', 'SET', '', '12DA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1468, 'DAHRI', 'BUAH', '', '12DH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1469, 'ELECTRIC ENGRAVER 220 VOL', 'BUAH', '', '12EE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1470, 'FLINGKUT SEI', 'KLG', '', '12FS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1471, 'GUNTING KUPU-KUPU', 'BUAH', '', '12GK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1472, 'GERGAJI KAYU ( POTONG ', 'BUAH', '', '12GK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1473, 'GERGAJI LISTRI', 'UNIT', '', '12GL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1474, 'GUNTING MCC 60', 'BUAH', '', '12GM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1475, 'GEAR ROLL HOIS', 'SET', '', '12GR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1476, 'GANTUNGAN TALANG 4', 'BUAH', '', '12GT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1477, 'HEATER BOILE', 'BUAH', '', '12HB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1478, 'INSULATION TESTER(MEGGER) SANWA DM100', 'UNIT', '', '12IT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1479, 'KAMPA', 'BUAH', '', '12KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1480, 'KOTAK OBAT P & ', 'BUAH', '', '12KO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1481, 'KARET PEL + GAGAN', 'BUAH', '', '12KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1482, 'KUNCI RING PAS UK-3', 'BUAH', '', '12KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1483, 'KORAL SPLIT', 'TRUCK', '', '12KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1484, 'LAMPU LALI', 'BUAH', '', '12LL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1485, 'LINNGIS ULI', 'BUAH', '', '12LU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1486, 'MESIN SERUT KAYU ( MAKITA ', 'UNIT', '', '12MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1487, 'METERAN 7,5 METER', 'BUAH', '', '12MT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1488, 'NEW DIGILANCE STD TYPE : S CPU BOAR', 'UNIT', '', '12ND001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1489, 'PIPA HITAM 1 1/4\" X 2,5 M', 'BTG', '', '12PH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1490, 'PALU UK. 1/2 K', 'BUAH', '', '12PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1491, 'PLAT STRIP 5 MM X 2,5 CM X 6 MT', 'BTG', '', '12PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1492, 'PLAT STRIP 3 MM X 2,5 CM X 6 MT', 'BTG', '', '12PS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1493, 'RANTAI KAPAL 10 M', 'METER', '', '12RK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1494, 'ROLL KAWAT MTK PIONEER UK. 60 X 17 M', 'BUAH', '', '12RK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1495, 'SEKOP BES', 'BUAH', '', '12SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1496, 'SARUNG BORGO', 'BUAH', '', '12SB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1497, 'SAPU HIJU', 'BUAH', '', '12SH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1498, 'TRAVO 380 V/240 V 0,5 ', 'BUAH', '', '12TV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1499, 'AMPLOP COKLA', 'PAK', '', '13AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1500, 'AMPLOP COKLAT UK. 1/2 FOLI', 'PAK', '', '13AC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1501, 'AERON AE11 3 AW', 'UNIT', '', '13AE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1502, 'AERON - AC11 3AW', 'UNIT', '', '13AE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1503, 'AMPLOP PUTIH BESAR \" JAYA ', 'DUS', '', '13AJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1504, 'AMPLOP PUTIH KECIL \" JAYA ', 'DUS', '', '13AJ002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1505, 'ACCO PLASTI', 'PAK', '', '13AP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1506, 'AMPLOP PUTIH BESA', 'DUS', '', '13AP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1507, 'AMPLOP PUTIH KECI', 'DUS', '', '13AP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1508, 'AMPLOP ROY', 'DUS', '', '13AR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1509, 'ANTENA HT GP200', 'BUAH', '', '13AT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1510, 'BUKU AGEND', 'PAK', '', '13BA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1511, 'BUKU BANK', 'BUAH', '', '13BB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1512, 'BUKU BUKTI KAS/BAN', 'BUAH', '', '13BB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1513, 'BINDER COMPUTE', 'BUAH', '', '13BC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1514, 'BINDER CLIP 10', 'GROSS', '', '13BC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1515, 'BINDER CLIP 26', 'PAK', '', '13BC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1516, 'BINDER CLIP 10', 'PAK', '', '13BC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1517, 'BINDER CLIP KENKO 11', 'GROSS', '', '13BC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1518, 'COMPUTER BINDER IMAX NO. 130', 'DUS', '', '13BC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1519, 'BUKU EXPEDIS', 'PAK', '', '13BE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1520, 'BUSINESS  FILE ( MAP PALSTIC', 'PAK', '', '13BF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1521, 'BORGO', 'BUAH', '', '13BG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1522, 'BOX ISOLASIP', 'BUAH', '', '13BI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1523, 'BUKU KAS KWART', 'BUAH', '', '13BK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1524, 'BUKU KAS 3 KOLOM FOLI', 'BUAH', '', '13BK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1525, 'BUKU KAS 3 KOLOM QUART', 'BUAH', '', '13BK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1526, 'BUKU KAS 2 KOLOM QUART', 'BUAH', '', '13BK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1527, 'BUKU KAS 2 KOLOM FOLI', 'BUAH', '', '13BK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1528, 'BUKU LAPORAN PERMINTAAN PEMBELIAN (LPB', 'BUAH', '', '13BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1529, 'BUKU PERMINTAAN PEMBELIAN ( BUKU PP ', 'BUAH', '', '13BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1530, 'BAD SECURIT', 'SET', '', '13BS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1531, 'BAJU SERAGAM KAOS TANGAN PENDE', 'LBR', '', '13BS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1532, 'BAJU SERAGAM KAOS TANGAN PANJAN', 'LBR', '', '13BS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1533, 'BAJU SERAGAM KEPALA BAGIA', 'LBR', '', '13BS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1534, 'BAK STEMPE', 'BUAH', '', '13BS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1535, 'BAJU SERAGA', 'LBR', '', '13BS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1536, 'BUKU TULIS B', 'PAK', '', '13BT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1537, 'BUKU TULIS FOLIO 100 LEMBA', 'PAK', '', '13BT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1538, 'BATTERAY HT GP200', 'BUAH', '', '13BT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1539, 'BANTA', 'BUAH', '', '13BT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1540, 'BUKU TANDA TERIMA SEMENTAR', 'BUAH', '', '13BT005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1541, 'BUKU TULIS EKSPEDISI B', 'BUAH', '', '13BT006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1542, 'BUKU TULIS FOLIO B', 'BUAH', '', '13BT007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1543, 'BUKU TULIS KWARTO B', 'BUAH', '', '13BT008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1544, 'BAYGO', 'BOTOL', '', '13BY001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1545, 'CARBON CAILIN', 'PAK', '', '13CC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1546, 'CALCULATOR STRUK MERK CASI', 'UNIT', '', '13CC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1547, 'CERMI', 'UNIT', '', '13CC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1548, 'CALCULATOR CITIZEN SDC - 868 ', 'BUAH', '', '13CC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1549, 'CLOUDCITI SYSTEM ( IAAS PACKAGE ', 'BULAN', '', '13CCD01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1550, 'CONTINIOUS FORM 91/2*11 PL', 'DUS', '', '13CF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1551, 'CONTINIOUS FORM 91/2*11/2 PL', 'DUS', '', '13CF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1552, 'CONTINUS FORM 9,5 x 11/2 8 PL', 'DUS', '', '13CF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1553, 'CONTINUS FORM 9,5 x 11 1 PL', 'DUS', '', '13CF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1554, 'CONTINUS FORM 9,5 x 11 2 PL', 'DUS', '', '13CF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1555, 'CONTINUS FORM 9,5 x 11/2 2 PL', 'DUS', '', '13CF006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1556, 'CONTINUS FORM 9,5 x 11 4 PL', 'DUS', '', '13CF007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1557, 'CONTINUS FORM 9,5 x 11/2 4 PL', 'DUS', '', '13CF008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1558, 'CONTINUS FORM 147/8 x 11 1 PL', 'DUS', '', '13CF009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1559, 'CONTINUS FORM 91/2 *11/2 3 PL', 'DUS', '', '13CF011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1560, 'CORRECTION PEN JOYK', 'LUSIN', '', '13CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1561, 'CLOW UPPE', 'SET', '', '13CU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1562, 'DRUM BLADE', 'UNIT', '', '13DB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1563, 'DRUM BLAD', 'PSG', '', '13DB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1564, 'DOBLE FOLI', 'PAK', '', '13DF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1565, 'DOOR LOCK DIGITA', 'UNIT', '', '13DLD01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1566, 'DISPENSE', 'BUAH', '', '13DP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1567, 'EXPOUSE LAM', 'UNIT', '', '13EL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1568, 'EMBE', 'BUAH', '', '13EM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1569, 'FLAST DISK 2 G', 'BUAH', '', '13FD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1570, 'FLAST DIST 4 G', 'BUAH', '', '13FD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1571, 'FAN PROSESO', 'UNIT', '', '13FP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1572, 'FEED ROL', 'SET', '', '13FR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1573, 'FORM SS', 'PAK', '', '13FS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1574, 'GANTUNGAN BAJ', 'BUAH', '', '13GB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1575, 'GAYUN', 'BUAH', '', '13GG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1576, 'GLUE STICK KENK', 'BUAH', '', '13GS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1577, 'GLUE STIC', 'BUAH', '', '13GS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1578, 'GUNTIN', 'BUAH', '', '13GU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1579, 'HARD DISK 250 G SAT', 'UNIT', '', '13HD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1580, 'HEL', 'BUAH', '', '13HL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1581, 'HUB SWITC', 'UNIT', '', '13HS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1582, 'ISI CUTTER L 15', 'PAK', '', '13IC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1583, 'ISOLASI DOUBLE TAP', 'BUAH', '', '13ID001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1584, 'ISOLASI COKLA', 'PACK', '', '13IL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1585, 'SUPER I/O CARD PC', 'BUAH', '', '13IO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1586, 'ISI STEPLES MAX 1', 'PAK', '', '13IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1587, 'JAM DINDIN', 'BUAH', '', '13JD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1588, 'JAS HUJAN', 'PSG', '', '13JH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1589, 'KARTU ABSE', 'PAK', '', '13KA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1590, 'KASUR BUS', 'BUAH', '', '13KB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1591, 'KERTAS BURA', 'PAK', '', '13KB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1592, 'KAC', 'BUAH', '', '13KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1593, 'KABEL DAT', 'ROLL', '', '13KD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1594, 'KEMOCEN', 'BUAH', '', '13KE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1595, 'KERTAS FAX 210*3', 'ROLL', '', '13KF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1596, 'KERTAS FOTO COPY 70 GR B', 'RIM', '', '13KF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1597, 'KERTAS FOTO COPY 70 GR HV', 'RIM', '', '13KF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1598, 'KACA JENDELA UK. 101,5 X 91,', 'LBR', '', '13KJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1599, 'KESET KAK', 'BUAH', '', '13KK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1600, 'INSTALASI KABEL FAX ( KABEL KU ', 'METER', '', '13KKU01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1601, 'KERTAS LATMU', 'BUAH', '', '13KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1602, 'KABEL LINE BELDEN CAT5', 'ROLL', '', '13KL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1603, 'KULKA', 'UNIT', '', '13KLS01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1604, 'KAMPE', 'BKS', '', '13KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1605, 'KABEL MONITO', 'ROLL', '', '13KM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1606, 'KARTU NAMA BW 2/0 ( POLY + SABLON ', 'BOX', '', '13KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1607, 'KARTU NAM', 'BOX', '', '13KN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1608, 'KUNCI PINT', 'SET', '', '13KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1609, 'KUNCI PAILING KABINE', 'SET', '', '13KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1610, 'KOPE', 'BUAH', '', '13KP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1611, 'KACA POLOS UK. 127,5 X 6', 'LMBR', '', '13KP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1612, 'KACA POLOS UK. 102,5 X 101,', 'LMBR', '', '13KP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1613, 'KARTU PENGENAL KARYAWA', 'BUAH', '', '13KP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1614, 'KERTAS QUARTO 70', 'RIM', '', '13KQ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1615, 'KERANJANG SAMPAH', 'BUAH', '', '13KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1616, 'KOP SURA', 'RIM', '', '13KS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1617, 'KERTAS STRUK UK-48 X 5', 'PAK', '', '13KS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1618, 'KARBON SAILIN', 'PAK', '', '13KS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1619, 'KERTAS SHEET DAITO', 'PAK', '', '13KS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1620, 'LEM KERTA', 'ROLL', '', '13LK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1621, 'LEM STIC', 'BUAH', '', '13LS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1622, 'LAP TANGA', 'BUAH', '', '13LT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1623, 'MATERAI 6000 & 300', 'LBR', '', '13MA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1624, 'MAP BIASA', 'PAK', '', '13MB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1625, 'MODE', 'UNIT', '', '13MD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1626, 'MESIN FA', 'UNIT', '', '13MF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1627, 'MONITOR COMPUTE', 'UNIT', '', '13MN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1628, 'MAP PLASTIC DAICH', 'LUSIN', '', '13MP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1629, 'MAGNET ROLL CANON NP 603', 'SET', '', '13MR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1630, 'ODNER BINDE', 'LUSIN', '', '13OD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1631, 'ODNER BINDEX 777 BLAC', 'LUSIN', '', '13OD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1632, 'ONE WAY CASET', 'BUAH', '', '13OW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1633, 'PRINTER BARCODE + IT SUPPORT TSC 24', 'UNIT', '', '13PB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1634, 'PENGGARIS BUTTERFLY 30 C', 'LUSIN', '', '13PB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1635, 'PAPER CLI', 'PAK', '', '13PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1636, 'PITA CALCULATOR CASI', 'BUAH', '', '13PC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1637, 'PULPEN FASTER C 60', 'LUSIN', '', '13PF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1638, 'PULPEN FASTER C ', 'LUSIN', '', '13PF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1639, 'PENGHAPUS', 'BUAH', '', '13PH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1640, 'KERTAS POST IT 653 NEO', 'BUAH', '', '13PI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1641, 'KERTAS 3M POST IT 654-5P', 'BUAH', '', '13PI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1642, 'PITA MESIN TI', 'BUAH', '', '13PM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1643, 'PITA MESIN TIK ELEKTRI', 'BUAH', '', '13PM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1644, 'PITA MESIN ABSEN AMAN', 'BUAH', '', '13PM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1645, 'PITA PRINTER LQ 2180 + BO', 'BUAH', '', '13PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1646, 'PITA PRINTER LX 30', 'BUAH', '', '13PP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1647, 'PITA PRINTE', 'BUAH', '', '13PP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1648, 'PITA PRINTER TIMBANGAN ( FULLMARK ', 'BUAH', '', '13PP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1649, 'PITA PRINTER LQ 218', 'BUAH', '', '13PP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1650, 'PRINTER EPSON LX 30', 'BUAH', '', '13PR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1651, 'PRINTER EPSON LX 300+I', 'UNIT', '', '13PR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1652, 'PULPEN STANDARD AE-', 'LUSIN', '', '13PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1653, 'PENSIL 2B STEADLE', 'LUSIN', '', '13PS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1654, 'PIN SECURIT', 'BUAH', '', '13PS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1655, 'POWER SUPLL', 'BUAH', '', '13PS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1656, 'PULPEN STANDARD TECNO DELTA TIP 0.3', 'LUSIN', '', '13PS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1657, 'PITA TIMBANGAN EPSON ERC 0', 'BUAH', '', '13PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1658, 'PUNCH JOYKO NO. 30 X', 'BUAH', '', '13PU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1659, 'PAYUN', 'BUAH', '', '13PY001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1660, 'PRINTER ZEBR', 'BUAH', '', '13PZ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1661, 'RIBBO', 'ROLL', '', '13RB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1662, 'RIBBON UK. 11 X 300 M', 'ROLL', '', '13RB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1663, 'RIBBON UK. 100 MM X 300 M RESI', 'ROLL', '', '13RB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1664, 'RIBBON CARTRIDGE EPSON LX 300', 'BUAH', '', '13RC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1665, 'RIBBON CARTRIDGE EPSON LQ 2180 / 219', 'BUAH', '', '13RC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1666, 'RADIO COMP', 'UNIT', '', '13RC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1667, 'RIBBON MAS ( SENG PRINTER ', 'BUAH', '', '13RM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1668, 'REMOVER MA', 'BUAH', '', '13RM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1669, 'SPIDOL ART LINE 10', 'LUSIN', '', '13SA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1670, 'SPIDOL ARTLINE 70 HITA', 'LUSIN', '', '13SA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1671, 'SPIDOL ARTLINE 70 BIR', 'LUSIN', '', '13SA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1672, 'SALON AKTIF', 'SET', '', '13SA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1673, 'SABU', 'BUAH', '', '13SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1674, 'SERAGAM BIRU-BIR', 'STEL', '', '13SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1675, 'SARUNG BANTA', 'BUAH', '', '13SB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1676, 'SPIDOL BOARD MARKE', 'BUAH', '', '13SB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1677, 'KAOS OBLON', 'PCS', '', '13SB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1678, 'SERAGAM CELANA PANJANG PEREMPUA', 'BUAH', '', '13SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1679, 'SERAGAM CELANA PANJANG LAKI-LAK', 'BUAH', '', '13SC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1680, 'SANGKU', 'BUAH', '', '13SG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1681, 'SEAGULL 35', 'PAK', '', '13SG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1682, 'SERAGAM KEMEJA PEREMPUA', 'BUAH', '', '13SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1683, 'SERAGAM KEMEJA LAKI-LAK', 'BUAH', '', '13SK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1684, 'SPIDOL KECIL PW-1', 'LUSIN', '', '13SK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1685, 'SERVER + MONITO', 'UNIT', '', '13SM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1686, 'STEEL MIDSOL', 'PSG', '', '13SM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1687, 'STOP MAP KABIT', 'DUS', '', '13SM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1688, 'STOP MA', 'DUS', '', '13SM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1689, 'SERVICE MESIN FA', 'UNIT', '', '13SMF01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1690, 'SERAGAM PUTIH BIR', 'STEL', '', '13SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1691, 'SPLITTE', 'BUAH', '', '13SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1692, 'SENTE', 'BUAH', '', '13SR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1693, 'SAFETY SHOE', 'PSG', '', '13SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1694, 'SEPATU SERAGAM PD', 'PSG', '', '13SS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1695, 'SEPATU SERAGAM PD', 'PSG', '', '13SS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1696, 'SPIDOL SNOWMAN MARKER KECI', 'BUAH', '', '13SS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1697, 'STEPKESS 30*1 HD 1', 'BUAH', '', '13ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1698, 'STABILL', 'BUAH', '', '13ST003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1699, 'TINTA STEMPEL AR', 'BUAH', '', '13ST004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1700, 'TINTA STEMPEL OTOMATI', 'BUAH', '', '13ST005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1701, 'STEMPE', 'BUAH', '', '13STL01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1702, 'TRIGONAL CLIPS JOYKO NO. ', 'DUS', '', '13TC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1703, 'TINTA DAITO', 'TUBE', '', '13TD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1704, 'TAPE DISPENSE', 'BUAH', '', '13TD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1705, 'TONER FOTO COP', 'BUAH', '', '13TF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1706, 'TINTA SPIDO', 'LUSIN', '', '13TI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1707, 'TIPEX JOYKO ( MDL PULPEN ', 'LUSIN', '', '13TI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1708, 'TIPEX KUA', 'BUAH', '', '13TI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1709, 'TALI KUR & PLUI', 'BUAH', '', '13TK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1710, 'TINTA LIO', 'BTL', '', '13TL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1711, 'TINTA MESIN TI', 'BUAH', '', '13TM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1712, 'TEMPAT SABU', 'BUAH', '', '13TP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1713, 'TISSU', 'DUS', '', '13TS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1714, 'TINTA STEMPE', 'BUAH', '', '13TS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1715, 'TAS RANSE', 'BUAH', '', '13TS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1716, 'TEMPAT TISSU', 'BUAH', '', '13TT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1717, 'TEMPAT SAMPAH TUT', 'BUAH', '', '13TT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1718, 'TV POLYTRON 20', 'UNIT', '', '13TV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1719, 'SIKAT W', 'BUAH', '', '13WC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1720, 'WIRELES', 'BUAH', '', '13WS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1721, 'AIR ACCU @ 1 LITE', 'BOTOL', '', '14AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1722, 'ACCU 65 A / 12 V', 'BUAH', '', '14AC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1723, 'AIR CLEANER/ELEMEN', 'BUAH', '', '14AC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1724, 'ACCU 12 V/200 ', 'UNIT', '', '14AC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1725, 'AIR FILTER J 85-1027-0', 'BUAH', '', '14AF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1726, 'AIR FILTERMB 12038', 'BUAH', '', '14AF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1727, 'AIR FILTER MD T 60 ', 'BUAH', '', '14AF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1728, 'AIR FILTER ( FILTER UDARA ', 'BUAH', '', '14AF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1729, 'AIR FILTER ME 01724', 'BUAH', '', '14AF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1730, 'AIR RADIATOR @ 5 LITE', 'GALON', '', '14AR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1731, 'BAN DALAM 600*', 'BUAH', '', '14BD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1732, 'BAN DALAM 750*1', 'BUAH', '', '14BD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1733, 'BAN DALAM 700*1', 'BUAH', '', '14BD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1734, 'BAN DALAM 750*1', 'BUAH', '', '14BD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1735, 'BAN DALAM 700 x 1', 'BUAH', '', '14BD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1736, 'BAN FLAP 700*1', 'BUAH', '', '14BF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1737, 'BOX FILTER UDAR', 'SET', '', '14BF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1738, 'BAN FLAP 750*1', 'BUAH', '', '14BF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1739, 'BALL JOIN', 'BUAH', '', '14BJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1740, 'BAN LUAR UK. 750*15 12 PL', 'BUAH', '', '14BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1741, 'BAN LUAR 700*15 12 PL', 'BUAH', '', '14BL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1742, 'BAN LUAR TUBLES 185 X 70 R14 B', 'BUAH', '', '14BL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1743, 'BAN LUAR 750 x 16 14 PL', 'BUAH', '', '14BL004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1744, 'BAN LUAR TUBLES 205/60 R 1', 'BUAH', '', '14BL005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1745, 'BAN LUAR', 'BUAH', '', '14BL006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1746, 'BAN LUAR TUBLES 195-70 R 1', 'BUAH', '', '14BL007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1747, 'BAN LUAR 700 x 14 8 PL', 'BUAH', '', '14BL008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1748, 'BAN LUAR TUBLES 205/65 R15 BS B39', 'BUAH', '', '14BL009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1749, 'BAN LUAR TUBLES 215/60 R1', 'BUAH', '', '14BL010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1750, 'BAN LUAR TUBLES 90/90-1', 'BUAH', '', '14BL011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1751, 'BAN LUAR TUBLES 100/80-1', 'BUAH', '', '14BL012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1752, 'BEMPE', 'BUAH', '', '14BM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1753, 'BAUT PAYUNG 3/8 X 11/4', 'BUAH', '', '14BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1754, 'BAUT PAYUNG 3/8 X 21/2', 'BUAH', '', '14BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1755, 'BEARING P/N 42825-31960-7', 'BUAH', '', '14BR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1756, 'BAUT RODA BELAKANG ( DOUBLE ', 'BUAH', '', '14BR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1757, 'BEARING RODA BELAKANG 3021', 'BUAH', '', '14BR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1758, 'BEARING RODA BELAKANG 3021', 'BUAH', '', '14BR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1759, 'BEARING RODA 30207  J', 'BUAH', '', '14BR007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1760, 'BAUT RODA DEPA', 'BUAH', '', '14BR008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1761, 'BAN TUBLES 205 GR 15 PL', 'BUAH', '', '14BT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1762, 'BUSA TIPIS', 'LBR', '', '14BT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1763, 'CALIPER KIT RE', 'SET', '', '14CK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1764, 'COMPO', 'KLG', '', '14CO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1765, 'CAT PERNI', 'KLG', '', '14CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1766, 'DONGKRAK BOTOL CAP 10 TO', 'BUAH', '', '14DB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1767, 'DONGKRAK BOTOL CAPS 20 TO', 'UNIT', '', '14DB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1768, 'DONGKRAK BUAYA CAPS 3 TO', 'UNIT', '', '14DB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1769, 'FUSE BATU 160 AMPE', 'BUAH', '', '14FB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1770, 'FUSE BATU 40 AMPE', 'BUAH', '', '14FB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1771, 'FULL FILTER ( BAWAH ) ME 97155', 'BUAH', '', '14FF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1772, 'FULL FILTER ( ATAS ) ME 00606', 'BUAH ', '', '14FF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1773, 'FULL FILTER 23303-76002-7', 'BUAH', '', '14FF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1774, 'FULL FILTER ( FILTER SOLAR ', 'BUAH', '', '14FF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1775, 'FUSE KACA 10 ', 'BUAH', '', '14FK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1776, 'FUSE KACA 2 AMPER ( 60*30 MM ', 'BUAH', '', '14FK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1777, 'GRILL A', 'BUAH', '', '14GA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1778, 'GEMUK BEARING', 'TUBE', '', '14GB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1779, 'GENDUL KNALPO', 'BUAH', '', '14GK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1780, 'ISI PREO', 'UNIT', '', '14IP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1781, 'ISOLAS', 'ROLL', '', '14IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1782, 'ISI ULANG PARFUM MOBI', 'BTL', '', '14IU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1783, 'JOINT UNIVERSA', 'BUAH', '', '14JU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1784, 'KARET AB', 'BUAH', '', '14KA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1785, 'KUNCI DUPLIKA', 'BUAH', '', '14KD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1786, 'KI', 'KLG', '', '14KI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1787, 'KARPET LUMPU', 'SET', '', '14KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1788, 'KIT MASTER COUPLIN', 'BUAH', '', '14KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1789, 'KARPET MOBI', 'SET', '', '14KM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1790, 'KNALPO', 'SET', '', '14KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1791, 'KUNCI PINTU MOBIL', 'SET', '', '14KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1792, 'KANPAS REM', 'SET', '', '14KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1793, 'KARET RE', 'BUAH', '', '14KR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1794, 'KUNCI RING PAS 8 S/D 24 M', 'SET', '', '14KR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1795, 'KACA SPION', 'SET', '', '14KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1796, 'KLAKSON 24 VOLT ( DOUBLE ', 'SET', '', '14KS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1797, 'KARET SHOCK BLEKE', 'BUAH', '', '14KS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1798, 'KARET STOPE', 'BUAH', '', '14KS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1799, 'LAMPU BULAT 24 ', 'BUAH', '', '14LB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1800, 'LAMPU BEMPE', 'BUAH', '', '14LB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1801, 'LAMPU HOLOGEN 500 WAT', 'BUAH', '', '14LH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1802, 'LAP KANEB', 'BUAH', '', '14LK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1803, 'LEM POWER GLU', 'TUBE', '', '14LP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1804, 'LAMPU REM BELAKAN', 'SET', '', '14LR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1805, 'LAMPU SEIN', 'BUAH', '', '14LS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1806, 'MASTER COUPLING ( BAWAH ', 'BUAH', '', '14MC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1807, 'MASTER CYLINDER RODA BELAKAN', 'BUAH', '', '14MC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1808, 'MINYAK RE', 'BOTOL', '', '14MR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1809, 'MASTER REM DEPA', 'BUAH', '', '14MR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1810, 'MUR 3/8', 'BUAH', '', '14MR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1811, 'MASTER REM DEPA', 'BUAH', '', '14MR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1812, 'MASTER REM BELAKANG ( KANAN ', 'SET', '', '14MR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1813, 'OBAT POLE', 'BTL', '', '14OB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1814, 'OIL FILTER ME 01330', 'BUAH', '', '14OF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1815, 'OIL FILTE', 'BUAH', '', '14OF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1816, 'OLI MESI', 'GALON', '', '14OM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1817, 'OLI MESIN SAE 10', 'LTR', '', '14OM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1818, 'OLI MESIN SAE 10-30 (TOP 1', 'KLG', '', '14OM005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1819, 'OLI POWER STERING', 'KLG', '', '14OP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1820, 'OIL SEAL RODA BELAKANG ( DALAM ', 'BUAH', '', '14OS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1821, 'OIL SEAL RODA BELAKANG ( LUAR ', 'BUAH', '', '14OS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1822, 'OIL VERSNELIN', 'LITER', '', '14OV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1823, 'PACKING A', 'BUAH', '', '14PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1824, 'PER DAU', '', '', '14PD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1825, 'PAPAN DAMAR LAUT 3*20*', 'LBR', '', '14PD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1826, 'PELUK UK.16 750*6', 'BUAH', '', '14PE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1827, 'PEWANGI RUANGAN', 'BTL', '', '14PE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1828, 'PELG UK. 1', 'BUAH', '', '14PG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1829, 'PIPA KNALPOT ( SAMBUNGAN DEPAN ', 'BUAH', '', '14PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1830, 'PER KANPAS RE', 'BUAH', '', '14PK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1831, 'PAPAN KAMPER 3*20*', 'LBR', '', '14PK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1832, 'PAPAN KAMPER UK. 30MM X 20CM X 4MT', 'LBR', '', '14PK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1833, 'POMPA OLI MANUA', 'BUAH', '', '14PO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1834, 'PLASTIC PE', '', '', '14PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1835, 'PLAT PINT', 'LBR', '', '14PP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1836, 'PANTEK PLAT COUPLIN', 'BUAH', '', '14PP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1837, 'PANTEK COUPLIN', 'UNIT', '', '14PP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1838, 'PIRINGAN RE', 'BUAH', '', '14PR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1839, 'SEMIR BA', 'BTL', '', '14SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1840, 'SOK BLEKER DEPAN', 'SET', '', '14SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1841, 'SHAMPO MOBIL', 'BTL', '', '14SM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1842, 'SEAL ROD', 'BUAH', '', '14SR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1843, 'SELANG RADIATO', 'BUAH', '', '14SR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1844, 'TANGKI MOTO', 'UNIT', '', '14TM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1845, 'TUSUKAN PE', '', '', '14TP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1846, 'TUTUP RADIATO', 'BUAH', '', '14TR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1847, 'TEIROD STI', 'BUAH', '', '14TS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1848, 'TANGKI SOLA', 'UNIT', '', '14TS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1849, 'VANBELT A', 'BUAH', '', '14VA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1850, 'VANBLET KIPA', 'BUAH', '', '14VK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1851, 'VELAK UK. 1', 'BUAH', '', '14VL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1852, 'VANBELT PERSENELIN', 'BUAH', '', '14VP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1853, 'SARUNG TANGA', 'LUSIN', '', '15001ST', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1854, 'KAIN LA', 'KG', '', '15KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1855, 'MASKE', 'LUSIN', '', '15MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1856, 'SARUNG TANGAN KULI', 'PSG', '', '15ST002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1857, 'ACRYLIC 5 MM 4\" X 8', 'LBR', '', '16AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1858, 'ASBES GELOMBANG UK-24', 'LBR', '', '16AG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1859, 'ASBES GELOMBANG UK-18', 'LBR', '', '16AG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1860, 'AQUAPROO', 'GLN', '', '16AG004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1861, 'AMPLAS KASA', 'MTR', '', '16AK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1862, 'AQUAPROF @ 1 K', 'KLG', '', '16AP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1863, 'BESI BETON 10 M', 'BTG', '', '16BB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1864, 'BESI BETON 5 M', 'BTG', '', '16BB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1865, 'BESI BETON 19 M', 'BTG', '', '16BB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1866, 'BESI CANAL CNP 125X50X20X3.2X6MT', 'BTG', '', '16BC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1867, 'BESI CANAL C 75*3.2*', 'BTG', '', '16BC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1868, 'BESI CANAL C 60 X 30 X 10 X 2,3 X 6 MT', 'BTG', '', '16BC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1869, 'BESI CANAL U UK-120x55x6 M', 'BTG', '', '16BC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1870, 'BATA BEHEL (PUTIH', 'BUAH', '', '16BH003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1871, 'BESI H BEAM 200 X 200 X 8 X 6 MT', 'BTG', '', '16BH004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1872, 'BESI SIKU 60 X 60 X 6 X 6 MT', 'BTG', '', '16BI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1873, 'BESI SIKU 50 X 50 X 5 X 6 MT', 'BTG', '', '16BI003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1874, 'BATU KAL', 'TRUCK', '', '16BK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1875, 'BETON MIX ( PENGERAS COR ', 'KLG', '', '16BM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1876, 'BATA MERA', 'BUAH', '', '16BM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1877, 'BAK MANDI FIBE', 'BUAH', '', '16BM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1878, 'BESI PLAT 4 M', 'LBR', '', '16BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1879, 'BESI PLAT BORDES 4 M', 'LBR', '', '16BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1880, 'BESI PLAT MS 8 mm 4 X ', 'LBR', '', '16BP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1881, 'BESI PLAT MS 2 mm 4 X ', 'LBR', '', '16BP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1882, 'BESI PLAT STRIP 8 mm 50 X ', 'BTG', '', '16BP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1883, 'BESI PLAT 15 MM 4*', 'LBR', '', '16BP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1884, 'BESI PLAT 12 4*', 'LBR', '', '16BP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1885, 'BESI PLAT 3MM 4*', 'LBR', '', '16BP009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1886, 'BESI SIKU 50 X 50 X 5 X ', 'BTG', '', '16BS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1887, 'BESI SIKU 70 X 70 X 7 X ', 'BTG', '', '16BS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1888, 'BESI SIKU 100*100*', 'BTG', '', '16BS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1889, 'BESI SIKU 40 X 40 X 3,2 MM X 6 MT', 'BTG', '', '16BS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1890, 'BESI SIKU 40 X 40 X 4 X 6 MT', 'BTG', '', '16BS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1891, 'BESI UNP 100 X 50 X ', 'BTG', '', '16BU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1892, 'BESI UNP 150 X 75 X 6.', 'BTG', '', '16BU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1893, 'BESI WF 150 60*6*8*6MT', 'BTG', '', '16BW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1894, 'BESI WF 200*100*5.5*8*1', 'BTG', '', '16BW002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1895, 'BESI WF 150*75*5*7*1', 'BTG', '', '16BW003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1896, 'BESI WF 200*100*5*8*', 'BTG', '', '16BW004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1897, 'BESI WIRE MESH 8 M', 'LBR', '', '16BW005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1898, 'BESI WIRE MESH 6M', 'LBR', '', '16BW006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1899, 'BESI WF 150 X 75 X 5 X 7 X 6 MT', 'BTG', '', '16BW007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1900, 'BESI WF 200 X 100 X 5,5 X 8 X 6 MT', 'BTG', '', '16BW008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1901, 'CAT TEMBOK CATYLA', 'GALON', '', '16CC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1902, 'CONCRETE TYPE : K - 40', 'M3', '', '16CC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1903, 'CONCRETE TYPE : K - 45', 'M3', '', '16CC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1904, 'CAT TEMBOK CATYLAK @ 25 K', 'PAIL', '', '16CC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1905, 'CLOSSED DUDU', 'SET ', '', '16CD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1906, 'CAT EPOX', 'SET', '', '16CE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1907, 'CAT GLOTEX ( ALUMUNIUN PAINT ) @ 1 K', 'KLG', '', '16CG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1908, 'CILINDER KUNC', 'BUAH', '', '16CJ005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1909, 'CAT KANSAI ( ABU-ABU ) @ 1K', 'KLG', '', '16CK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1910, 'CAT KANSAI @ 1 KG ( PUTIH )', 'KLG', '', '16CK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1911, 'CAT KANSAI @ 1 KG ( BIRU TUA ', 'KLG', '', '16CK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1912, 'CAT KANSAI ( KUNING ) @ 1 K', 'KLG', '', '16CK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1913, 'CAT MINYAK KANSAI @ 1K', 'KLG', '', '16CM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1914, 'COMPOU', 'ZAK', '', '16CM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1915, 'CAT METROLITE PUTI', 'PAIL', '', '16CM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1916, 'COMPO', 'KG', '', '16CM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1917, 'CAT PILOX ( PUTIH ', 'KLG', '', '16CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1918, 'CAT PILOK ( HITAM ', 'KLG', '', '16CP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1919, 'CAT TEMBOK METROLIT', 'GALON', '', '16CT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1920, 'CORONG TALANG PVC 3 ', 'BUAH', '', '16CT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1921, 'CAT TEMBOK METROLIT', 'PAIL', '', '16CT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1922, 'CAT TEMBOK VINYLEX (BIRU) NO. 93', 'PAIL', '', '16CT004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1923, 'CAT TEMBOK VINYLEX (KUNING) NO. 24', 'PAIL', '', '16CT005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1924, 'CAT TEMBOK VINYLEX ( PUTIH ', 'PAIL', '', '16CT006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1925, 'CAT ZINCROMAT @ 1K', 'KLG', '', '16CU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1926, 'DEMPUL KAY', 'KLG', '', '16DK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1927, 'DOP PVC 1/2 ', 'BUAH', '', '16DP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1928, 'DOP PVC 3/4 ', 'BUAH', '', '16DP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1929, 'DAUN PINT', 'BUAH', '', '16DP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1930, 'DYNABOL', 'BUAH', '', '16DY001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1931, 'ENGSEL JENDEL', 'SET', '', '16EJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1932, 'ENGSEL PINTU3', 'PSG', '', '16EP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1933, 'ENGSEL PINTU 4', 'PSG', '', '16EP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1934, 'ENGSEL PINT', 'SET', '', '16EP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1935, 'FILTER AI', 'SET', '', '16FA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1936, 'FIBER GLASS PLAT 0,5 M', 'METER', '', '16FG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1937, 'GENTENG ASBE', 'LBR', '', '16GA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1938, 'GEMBOK 50 MM ( LEHER PANJANG ', 'BUAH', '', '16GE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1939, 'GEMBOK 60 m', 'BUAH', '', '16GE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1940, 'GRENDEL JENDEL', 'BUAH', '', '16GJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1941, 'GR', 'LBR', '', '16GR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1942, 'GIVSEN 9 M', 'LBR', '', '16GV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1943, 'KABEL COAXIAL', 'MTR', '', '16KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1944, 'KERAMIK DINDING 20*2', 'DUS', '', '16KD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1945, 'KERAMIK UK. 31 X 40 ( ZIMCONIO REGINA ', 'DUS', '', '16KE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1946, 'KERAMIK UK. 12 X 31 ( LISA COLESEO ', 'BUAH ', '', '16KE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1947, 'KERAMIK 30 X 30 PUTI', 'DUS', '', '16KE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1948, 'KERAMIK 40X4', 'DUS', '', '16KE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1949, 'KERAMIK 15*1', 'BUAH', '', '16KE007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1950, 'KERAMIK 8*3', 'BUAH', '', '16KE008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1951, 'KOMPON KAY', 'KG', '', '16KK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1952, 'KAIN KAS', 'ROLL', '', '16KK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1953, 'KAYU KAS', 'BTG', '', '16KK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1954, 'KERAMIK LANTAI 20*2', 'DUS', '', '16KL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1955, 'KERAMIK LANTAI 30*3', 'DUS', '', '16KL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1956, 'KERAMIK DINDING 20 X 2', 'DUS', '', '16KL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1957, 'KUBAH MUSHOLL', 'BUAH', '', '16KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1958, 'KAPUR MESH 40', 'KG', '', '16KM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1959, 'KNEE PVC 2', 'BUAH', '', '16KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1960, 'KNEE PVC 3/4 ', 'BUAH', '', '16KN003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1961, 'KUNCI PINTU BULA', 'BUAH', '', '16KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1962, 'KABEL POWER SUPPL', 'MTR', '', '16KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1963, 'KACA POLOS 5 m', 'LBR', '', '16KP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1964, 'KNEE PVC 5', 'BUAH', '', '16KP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1965, 'KUAS ROLL', 'BUAH', '', '16KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1966, 'KUNCI ROFIN', 'BUAH', '', '16KR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1967, 'KORAL SPLI', 'TRUK', '', '16KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1968, 'KASTING ( PARIASI LAMPU', 'BUAH', '', '16KS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1969, 'KORAL SPLI', 'COLD', '', '16KS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1970, 'KARPET TALAN', 'MTR', '', '16KT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1971, 'KUAS 2', 'BUAH', '', '16KU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1972, 'KUAS 3', 'BUAH', '', '16KU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1973, 'KUAS 5', 'BUAH', '', '16KU003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1974, 'KABEL VISION RG - 6 90', 'MTR', '', '16KV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1975, 'LEM FOX 1/4 K', 'BTL', '', '16LF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1976, 'LIS GIVSU', 'BTG', '', '16LG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1977, 'LIS JENDEL', 'BTG', '', '16LJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1978, 'LIS KAC', 'BUAH', '', '16LK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1979, 'LIS PLAPO', 'IKAT', '', '16LP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1980, 'LIS SAMBUNGAN ALUMUNIUM UK. 6 MTR X 4 C', 'BTG', '', '16LS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1981, 'LIS SAMBUNGAN ALUMUNIUM UK. 6 MTR X 1 C', 'BTG', '', '16LS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1982, 'METERA', 'BUAH', '', '16ME001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1983, 'NO DRO', 'GALON', '', '16ND001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1984, 'PAKU 3 C', 'KG', '', '16P0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1985, 'PAKU 7 C', 'KG', '', '16P0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1986, 'PASI', 'COLT', '', '16PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1987, 'PASI', 'TRUCK', '', '16PA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1988, 'PINTU PAGAR BRC UK.120*24', 'SET', '', '16PB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1989, 'PINTU BRC + ENGSEL UK. 250 X 12', 'UNIT', '', '16PB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1990, 'PENGERAS CO', 'KLG', '', '16PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1991, 'PAPAN CO', 'LBR', '', '16PC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1992, 'PLASTIC FIBER PLAT', 'METER', '', '16PF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1993, 'PAPAN GRC 4*4*', 'LBR', '', '16PG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1994, 'PAPAN GIVSUN 9 M', 'LBR', '', '16PG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1995, 'PIPA GALF 2 1/2\" X 6 MTR  SCH 4', 'BTG', '', '16PG004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1996, 'PAKU GR', 'KG', '', '16PG005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1997, 'PIPA GALFANIS 5\"SCH 4', 'BTG', '', '16PG006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1998, 'PIPA GALFANIS 1/2 \" SCH 4', 'BTG', '', '16PG007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1999, 'PAPAN GRC 4MM X 120 X 24', 'LBR', '', '16PG008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2000, 'PAHAT BETON 12', 'BUAH', '', '16PH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2001, 'PIPA PVC 2', 'BTG', '', '16PI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2002, 'PIPA PVC 3/4 ', 'BTG', '', '16PI002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2003, 'PINTU + JENDEL', 'SET', '', '16PJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2004, 'PENSIL KAY', 'BUAH', '', '16PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2005, 'PLITUR KAYU', 'KLG', '', '16PK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2006, 'PAKU 5 C', 'KG', '', '16PK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2007, 'PAKU 4 C', 'KG', '', '16PK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2008, 'PAKU 1', 'KG', '', '16PK005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2009, 'PAKU 1', 'KG', '', '16PK006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2010, 'POLI KARBONITE UK. 1180 X 210 5M', 'ROLL', '', '16PK007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2011, 'PAL', 'BUAH', '', '16PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2012, 'PAPAN UK. 3 X 20 X 4 MT', 'LBR', '', '16PM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2013, 'PAKU PANCING/HAK SENG 7 C', 'BUAH', '', '16PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2014, 'PIPA PAYUN', 'KG', '', '16PP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2015, 'PIPA PVC 5', 'BTG', '', '16PP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2016, 'PIPA PVC 1', 'BTG', '', '16PP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2017, 'PH PAPE', 'BUAH', '', '16PP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2018, 'PAC ( PUTIH ', 'KG', '', '16PP009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2019, 'PAKU ROFIN', 'BUAH', '', '16PR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2020, 'PARTISI RUANGAN KANTOR + ONGKO', 'SET', '', '16PR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2021, 'PAKU ROFING 12 X 20 @ 800 BUA', 'DUS', '', '16PR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2022, 'PARTISI RUANGAN KANTO', 'SET', '', '16PRK01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2023, 'PLAT STEANLES STEEL TYPE 304 3 mm 4 x ', 'LBR', '', '16PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2024, 'PLAT STEANLES STEEL TYPE 316 4 mm 4 X ', 'LBR', '', '16PS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2025, 'PLAT STEANLES STEEL TYPE 304 5 mm 4 X ', 'LBR', '', '16PS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2026, 'PLAT STEANLES STEEL TYPE 304 8 mm 4 X ', 'LBR', '', '16PS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2027, 'PLAT STEANLES STEL TYPE 304 DIA 400 X 1', 'LBR', '', '16PS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2028, 'PLAT STRIP S/S 8 mm 50 X 2 TYPE 30', 'LBR', '', '16PS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2029, 'PLAT STEANLES STEL 304 2 MM 4 X ', 'LBR', '', '16PS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2030, 'SIKU STANLESS 5 X 50 X 5', 'BTG', '', '16PS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2031, 'PLOCK SHOCK PVC 3/4 x 1/2 ', 'BUAH', '', '16PS010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2032, 'PLAT STEANLESS STELL 304 4 mm 4*', 'LBR', '', '16PS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2033, 'PLOCK SHOCK PVC 1\" x 3/4', 'BUAH', '', '16PS012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2034, 'PAKU SEKRU', 'DUS', '', '16PS013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2035, 'PAKU TRIPLE', 'KG', '', '16PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2036, 'PLAMUR TEMBO', 'KLG', '', '16PT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2037, 'PINTU PAGAR BRC UK. 120*24', 'SET', '', '16PU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2038, 'PINTU PVC', 'BUAH', '', '16PV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2039, 'RENOVASI BANGUNA', 'UNIT', '', '16RB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2040, 'RISPLANG GRC 20*', 'BTG', '', '16RS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2041, 'RISPLANG GRC 30*240*1', 'LBR', '', '16RS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2042, 'SENG BEKA', 'LBR', '', '16SB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2043, 'STEEL BELT BEKA', 'KG', '', '16SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2044, 'SOWER CLOSSE', 'SET', '', '16SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2045, 'SHOCK DRAT PVC 3/4', 'BUAH', '', '16SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2046, 'SHOCK DRAT LUAR PVC 1', 'BUAH', '', '16SD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2047, 'SEME', 'ZAK', '', '16SE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2048, 'SEMEN M', 'ZAK', '', '16SE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2049, 'SENG FIBER PLASTIC GEL UK-3 METE', 'LBR', '', '16SF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2050, 'SERAT FIBER', 'LBR', '', '16SF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2051, 'SKRUP FISE', 'BUAH', '', '16SF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2052, 'SKRUP GIVSUM', 'PAK', '', '16SG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2053, 'STOP KRAN KIT 3/4 ', 'BUAH', '', '16SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2054, 'SEMEN PUTI', 'KG', '', '16SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2055, 'SPORKET 40*1', 'BUAH', '', '16SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2056, 'SPORKET 40*2', 'BUAH', '', '16SP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2057, 'SELOT PINTU 2', 'BUAH', '', '16SP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2058, 'SENG PLASTI', 'LBR', '', '16SP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2059, 'SENG PLAT ALUMUNIUM 1 M', 'METER', '', '16SP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2060, 'SENG PLASTIC GELOMBANG UK. 24', 'LBR', '', '16SP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2061, 'SENG PLASTIC GELOMBANG UK. 18', 'LBR', '', '16SP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2062, 'SENG PLASTIK GELOMBANG UK. 30', 'LBR', '', '16SP009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2063, 'SENDOK SEME', 'BUAH', '', '16SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2064, 'SIKU S/S TYPE 304 50 X 5  X ', 'BTG', '', '16SS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2065, 'SIKU STEANLES STEL 304 40 X 40 X 4 X ', 'LBR', '', '16SS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2066, 'SENG TALAN', 'MTR', '', '16ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2067, 'SENG TALANG 90 C', 'MTR', '', '16ST002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2068, 'SISI WALDING GIVSU', 'BUAH', '', '16SW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2069, 'SEMEN WATERROOFING @ 5 K', 'ZAK', '', '16SW002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2070, 'SEMEN WATERROOFING @ 25 K', 'ZAK', '', '16SW003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2071, 'TEBANG POHO', 'BUAH', '', '16TB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2072, 'TEE PVC 3/4 ', 'BUAH', '', '16TE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2073, 'TEE PVC 1', 'BUAH', '', '16TE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2074, 'TIANG PAGAR UK-150 C', 'BTG', '', '16TG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2075, 'TARIKAN JENDEL', 'BUAH', '', '16TJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2076, 'TAHANAN JENDEL', 'BUAH', '', '16TJ002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2077, 'TRIPLEK 6 M', 'LBR', '', '16TR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2078, 'TRIPLEK 12 M', 'LBR', '', '16TR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2079, 'TRIPLEK 18 M', 'LBR', '', '16TR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2080, 'TALI TAMBANG 25 M', 'MTR', '', '16TT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2081, 'VLOCK SHOCK PVC 1\" X 1/2', 'BUAH', '', '16VS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2082, 'WATER MUR PVC 11/2', 'BUAH', '', '16WM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2083, 'WATER MUR PVC 11/4', 'BUAH', '', '16WM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2084, 'WIRE MESH STEANLES UK. MESH 20', 'METER', '', '16WM003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2085, 'WIRE MESH STEANLES UK. MESH 30', 'METER', '', '16WM004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2086, 'WASH TAFE', 'SET', '', '16WT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2087, 'BC WIRE HARD 2,60M', 'KG', '', '1701BCW', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2088, 'SERVICE TRAVO PLN 2500 KV', 'UNIT', '', '1701STP', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2089, 'ACCESSORI', 'LOT', '', '17AC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2090, 'BINGKAI KACA UK. 90CM X 60C', 'BUAH', '', '17BK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2091, 'CAMERA CCTV PIH 0422 ( 3,6 MM ', 'UNIT', '', '17CC017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2092, 'CELANA JEANS PANJAN', 'LBR', '', '17CJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2093, 'CHANNELS VIDIO SWITCH SP-60', 'UNIT', '', '17CV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2094, 'DRUM PLASTIK UK-200 LITE', 'BUAH', '', '17DP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2095, 'ELECTRIC ENGRAVER 220 ', 'UNIT', '', '17EE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2096, 'GEMBOK 50 M', 'BUAH', '', '17GE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2097, 'GEMBOK 40 M', 'BUAH', '', '17GE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2098, 'GEMBOK 60 M', 'BUAH', '', '17GE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2099, 'HELM PROYE', 'BUAH', '', '17HP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2100, 'HELM SAFETY', 'BUAH', '', '17HS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2101, 'IMPELER KUNINGAN', 'BUAH', '', '17IK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2102, 'IMPELLER D', 'BUAH', '', '17IK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2103, 'JAKET JEAN', 'LBR', '', '17JJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2104, 'KAWAT LOCKET', 'METER', '', '17KA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2105, 'KABEL COAXIA', 'METER', '', '17KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2106, 'KARTU GUDAN', 'LBR', '', '17KG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2107, 'KARUNG GONI (BEKAS', 'BUAH', '', '17KG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2108, 'KACA MATA LA', 'BUAH', '', '17KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2109, 'KANEB', 'BUAH', '', '17KN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2110, 'KAPUR TULI', 'DUS', '', '17KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2111, 'KIPAS ANGIN (WALL FAN ) 30', 'UNIT', '', '17KP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2112, 'KABEL RG 6 PREMIU', 'METER', '', '17KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2113, 'KABEL POWER SUPPLY 2*1,', 'METER', '', '17KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2114, 'KAP', 'BUAH', '', '17KT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2115, 'KUNCI LACI 80', 'BUAH', '', '17KU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2116, 'LEM AICA AIBON @ 1/2 K', 'KLG', '', '17LA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2117, 'LEM AICA AIBON @ 1 K', 'KLG', '', '17LA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2118, 'LEM GASKET SELA', 'BOTOL', '', '17LG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2119, 'LAMPU HOLOGEN 150 WAT', 'BUAH', '', '17LH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2120, 'LAMPU HOLOGEN 100 WATT / 12 ', 'BUAH', '', '17LH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2121, 'LAMPU TEMBAK 150 WAT', 'BUAH', '', '17LT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2122, 'MESIN POTONG RUMPU', 'UNIT', '', '17MP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2123, 'MOTOR SIRINE MDL : 290 / 220 ', 'BUAH', '', '17MS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2124, 'PLAMPUNG AIR 3/4 ', 'BUAH', '', '17PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2125, 'PH INDICATOR STRIPS 0-1', 'BOX', '', '17PH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2126, 'PENGKI PLASTI', 'BUAH', '', '17PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2127, 'POHON PUCUK MER', 'BTG', '', '17PP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2128, 'POWER SUPPLY 12 V/0,5 ', 'UNIT', '', '17PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2129, 'PAPAN WHITE BOARD 3MM UK. 122 X 24', 'LBR', '', '17PW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2130, 'ROOSTER CONTINENTAL 20*20 C', 'BUAH', '', '17RC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2131, 'REAKTIVE POWER REGULATO', 'BUAH', '', '17RP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2132, 'SERBE', 'LUSIN', '', '17SB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2133, 'SAPU GALA', 'BUAH', '', '17SG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2134, 'SIKAT KAWA', 'BUAH', '', '17SI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2135, 'STICKER BCW KECI', 'LBR', '', '17SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2136, 'SAPU LIDI', 'BUAH', '', '17SL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2137, 'SEPATU SERAGAM ( SAFTY SHOES ', 'PSG', '', '17SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2138, 'SAMBUNGAN TALANG 4', 'BUAH', '', '17ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2139, 'THINNER @ 1 LITE', 'KLG', '', '17TH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2140, 'THINNE', 'LTR', '', '17TH003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2141, 'TALANG PVC 4', 'BTG', '', '17TL000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2142, 'TERMOMETER H19RO ( ELEKTRIK ', 'BUAH', '', '17TM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2143, 'TERMOMETER ANALOG TBS ( MANUAL ', 'BUAH', '', '17TM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2144, 'TERPAL PLASTI', 'LBR', '', '17TP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2145, 'TERPAL PLASTIC UK-6*1', 'LBR', '', '17TP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2146, 'TERPAL PLASTIC UK-6*1', 'LBR', '', '17TP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2147, 'TERPAL PLASTIC UK-4*8', 'LBR', '', '17TP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2148, 'TERPAL PLASTIC UK-4*', 'LBR', '', '17TP005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2149, 'TERPAL PLASTIK UK. 6 X 8 MT', 'LBR', '', '17TP006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2150, 'TERPAL PLASTIK UK. 5 X 8 MT', 'LBR', '', '17TP007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2151, 'TERPAL PLASTIK UK. 12 X 12 MT', 'LBR', '', '17TP008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2152, 'DIES BARU 0,60 M', 'BUAH', '', '18DB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2153, 'DIES BARU 0,63 M', 'BUAH', '', '18DB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2154, 'DIES BARU 0,88 M', 'BUAH', '', '18DB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2155, 'DIES BARU 0,90 MM BUA', 'BUAH', '', '18DB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2156, 'DIES BARU 0,95 M', 'BUAH ', '', '18DB005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2157, 'DIES BARU 1,30 M', 'BUAH', '', '18DB006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2158, 'DIES BARU 1,50 M', 'BUAH', '', '18DB007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2159, 'DIES BARU 1,80 M', 'BUAH', '', '18DB009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2160, 'DIES BARU 2,25 M', 'BUAH', '', '18DB010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2161, 'DIES BARU 2,90 M', 'BUAH', '', '18DB011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2162, 'DIES BARU 2,60 M', 'BUAH', '', '18DB012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2163, 'DIES BARU 3,20 M', 'BUAH', '', '18DB013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2164, 'DIES BARU 3,37 MM', 'BUAH', '', '18DB014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2165, 'DIES BARU 3,50 M', 'BUAH', '', '18DB015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2166, 'DIES BARU 3,84 M', 'BUAH', '', '18DB016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2167, 'DIES BARU 4,00 M', 'BUAH', '', '18DB017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2168, 'DIES BARU 4,24 M', 'BUAH', '', '18DB018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2169, 'DIES BARU 4,38 M', 'BUAH', '', '18DB019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2170, 'DIES BARU 4,50 M', 'BUAH', '', '18DB020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2171, 'DIES BARU 4,60 M', 'BUAH', '', '18DB021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2172, 'DIES BARU 4,66 M', 'BUAH', '', '18DB022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2173, 'DIES BARU 5,00 M', 'BUAH', '', '18DB023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2174, 'DIRS BARU 5,13 M', 'BUAH', '', '18DB024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2175, 'DIES BARU 5,20 M', 'BUAH', '', '18DB025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2176, 'DIES BARU 5,64 M', 'BUAH', '', '18DB026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2177, 'DIES BARU 5,70 M', 'BUAH', '', '18DB027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2178, 'DIES BARU O 6,20 M', 'BUAH', '', '18DB028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2179, 'DIES BARU O 6,50 M', 'BUAH', '', '18DB029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2180, 'DIES BARU O 6,60 M', 'BUAH', '', '18DB030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2181, 'DIES BARU O 7,00 M', 'BUAH', '', '18DB031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2182, 'DIES BARU O 2,70 M', 'BUAH', '', '18DB032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2183, 'DIES BARU O 2,27 M', 'BUAH', '', '18DB033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2184, 'DIES BARU O 2,78 M', 'BUAH', '', '18DB034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2185, 'DIES BARU O 3,59 M', 'BUAH', '', '18DB035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2186, 'DIES BARU 2,28 M', 'BUAH', '', '18DB036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2187, 'DIES BARU O 2,19 M', 'BUAH', '', '18DB037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2188, 'DIES BARU 2,62 M', 'BUAH', '', '18DB038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2189, 'DIES BARU 3,55 M', 'BUAH', '', '18DB039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2190, 'DIES BARU 2,40 MM', 'BUAH', '', '18DB040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2191, 'DIES BARU 3,60 M', 'BUAH', '', '18DB041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2192, 'DIES BARU 6,80 MM W-', 'BUAH', '', '18DB042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2193, 'DIES BARU 2,29 MM W-', 'BUAH', '', '18DB043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2194, 'DIES BARU 2,46 MM W-', 'BUAH', '', '18DB044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2195, 'DIES BARU 3.58 M', 'BUAH', '', '18DB045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2196, 'DIES BARU 2.52 M', 'BUAH', '', '18DB046', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2197, 'DIES BARU 3.15 m', 'BUAH', '', '18DB054', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2198, 'DIES BARU 2.82 m', 'BUAH', '', '18DB055', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2199, 'DIES BARU 2.5', 'BUAH', '', '18DB056', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2200, 'DIES BARU 5,5', 'BUAH', '', '18DB057', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2201, 'DIES BARU 2,30 M', 'BUAH', '', '18DB058', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2202, 'DIES BARU 2.19 M', 'BUAH', '', '18DB059', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2203, 'DIES BARU 3.8', 'BUAH', '', '18DB060', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2204, 'DIES BARU 2.7', 'BUAH', '', '18DB061', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2205, 'DIES BARU 2.5', 'BUAH', '', '18DB062', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2206, 'DIES BARU 2.7', 'BUAH', '', '18DB063', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2207, 'DIES BARU 3,57 M', 'BUAH', '', '18DB064', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2208, 'DIES BARU 3,30 M', 'BUAH', '', '18DB065', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2209, 'DIES BARU 3,10 M', 'BUAH', '', '18DB066', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2210, 'DIES BARU 3,72 M', 'BUAH', '', '18DB067', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2211, 'DIES COLD WELDER 0,790 M', 'BUAH', '', '18DC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2212, 'DIES COLD WELDER 0,690 M', 'BUAH', '', '18DC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2213, 'DIES DIAMOND 1,76 M', 'BUAH', '', '18DD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2214, 'DIES DIAMOND 1,32 M', 'BUAH', '', '18DD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2215, 'DIES DIAMONG 0,93 M', 'BUAH', '', '18DD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2216, 'DIES DIAMOND 1,43 M', 'BUAH', '', '18DD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2217, 'DIES DAIMOND 0.68 M', 'BUAH', '', '18DD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2218, 'DIES SEMI DIAMOND 6,6', 'BUAH', '', '18DD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2219, 'DIES SEMI DIAMOND 5,7', 'BUAH', '', '18DD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2220, 'DIES SEMI DIAMOND 5,05', 'BUAH', '', '18DD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2221, 'DIES SEMI DIAMOND 4,5', 'BUAH', '', '18DD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2222, 'DIES SEMI DIAMOND 3,5', 'BUAH', '', '18DD011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2223, 'DIES DAIMOND 1.07 m', 'BUAH', '', '18DD017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2224, 'DIES DAIMOND 0.1', 'BUAH', '', '18DD018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2225, 'DIES DAIMOND 0.1', 'BUAH', '', '18DD019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2226, 'DIES DAIMOND 0.1', 'BUAH', '', '18DD020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2227, 'DIES DAIMOND 0.10 m', 'BUAH', '', '18DD021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2228, 'DIES DAIMOND 0.1', 'BUAH', '', '18DD022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2229, 'DIES DAIMOND 0.1', 'BUAH', '', '18DD023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2230, 'DIES DAIMOND 1.84', 'BUAH', '', '18DD024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2231, 'DIES DAIMOND 1.22', 'BUAH', '', '18DD025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2232, 'DIES DIAMOND 1,37 MM', 'BUAH', '', '18DD028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2233, 'DIES DIAMOND 1,153 M', 'BUAH', '', '18DD029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2234, 'DIES SERVICE 3,00 M', 'BUAH', '', '18DS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2235, 'DIES SERVICE 3,30 M', 'BUAH', '', '18DS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2236, 'DIES SERVICE 4,10 M', 'BUAH', '', '18DS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2237, 'DIES SERVICE 5,20 M', 'BUAH', '', '18DS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2238, 'DIES SERVICE 5,30 M', 'BUAH', '', '18DS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2239, 'DIES SERVICE 5,50 M', 'BUAH', '', '18DS006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2240, 'DIES SUPER LOY O 1,40 M', 'BUAH', '', '18DS007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2241, 'DIES SUPER LOY 1,30 M', 'BUAH', '', '18DS008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2242, 'DIES SUPER LOY 1,60 M', 'BUAH', '', '18DS009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2243, 'DIES SUPER LOY 2,20 M', 'BUAH', '', '18DS010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2244, 'DIES SUPER LOY 3,00 M', 'BUAH', '', '18DS011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2245, 'DIES SUPER LOY 3,30 M', 'BUAH', '', '18DS012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2246, 'DIES SUPER LOY 3,40 M', 'BUAH', '', '18DS013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2247, 'DIES SUPER LOY 3,60 M', 'BUAH', '', '18DS014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2248, 'DIES SUPER LOY 3,80 M', 'BUAH', '', '18DS015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2249, 'DIES SUPER LOY 5,20 M', 'BUAH', '', '18DS016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2250, 'DIES SUPER LOY 5,30 M', 'BUAH', '', '18DS017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2251, 'DIES SUPER LOY 5,50 M', 'BUAH', '', '18DS018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2252, 'DIES SUPER LOY 6,00 M', 'BUAH', '', '18DS019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2253, 'DIES SUPER LOY 7,00 M', 'BUAH', '', '18DS020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2254, 'DIES SERVICE 6,50 M', 'BUAH', '', '18DS021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2255, 'DIES SERVICE 5,70 M', 'BUAH', '', '18DS022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2256, 'DIES SERVICE 5,00 M', 'BUAH', '', '18DS023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2257, 'DIES SERVICE 4,00 M', 'BUAH', '', '18DS024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2258, 'DIES SERVICE 8,10 M', 'BUAH', '', '18DS027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2259, 'DIES SERVICE 8,20 M', 'BUAH', '', '18DS028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2260, 'DIES SERVICE MM 8,40 M', 'BUAH', '', '18DS029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2261, 'DIES SERVICE 2,50 M', 'BUAH', '', '18DS030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2262, 'DIES SERVICE 2,70 M', 'BUAH', '', '18DS031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2263, 'DIES SERVICE 2,80 M', 'BUAH', '', '18DS032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2264, 'DIES SERVICE 2,90 M', 'BUAH', '', '18DS033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2265, 'DIES SERVICE 3,15 M', 'BUAH', '', '18DS034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2266, 'DIES SERVICE 3,20 M', 'BUAH', '', '18DS035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2267, 'DIES SERVICE 3,37 M', 'BUAH', '', '18DS036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2268, 'DIES SERVICE 3,50 M', 'BUAH', '', '18DS037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2269, 'DIES SERVICE 3,58 M', 'BUAH', '', '18DS038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2270, 'DIES SERVICE 3,60 M', 'BUAH', '', '18DS039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2271, 'DIES SERVICE 3,84 M', 'BUAH', '', '18DS040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2272, 'DIES SERVICE 4,00 M', 'BUAH', '', '18DS041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2273, 'DIES SERVICE 4,38 M', 'BUAH', '', '18DS042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2274, 'DIES SERVICE 4,50 M', 'BUAH', '', '18DS043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2275, 'DIES SERVICE 5,00 M', 'BUAH', '', '18DS044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2276, 'DIES SERVICE 5,70 M', 'BUAH', '', '18DS045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2277, 'DIES SERVICE 6,50 M', 'BUAH', '', '18DS046', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2278, 'DIES SERVICE 6,60 M', 'BUAH', '', '18DS047', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2279, 'DIES SERVICE 6,80 M', 'BUAH', '', '18DS048', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2280, 'DIES SERVICE 7,60 M', 'BUAH', '', '18DS049', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2281, 'DIES SERVICE 8,10 M', 'BUAH', '', '18DS050', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2282, 'DIES SERVICE 8,20 M', 'BUAH', '', '18DS051', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2283, 'DIES SERVICE 8,40 M', 'BUAH', '', '18DS052', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2284, 'DIES SERVICE 8,50 M', 'BUAH', '', '18DS053', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2285, 'DIES SERVICE 2.4', 'BUAH', '', '18DS055', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2286, 'DIES SERVICE 7,50 M', 'BUAH', '', '18DS056', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2287, 'SERVICE DIES 0.10 - 0.1', 'BUAH', '', '18SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2288, 'SERVICE DIES 0.10 - 0.1', 'BUAH', '', '18SD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2289, 'SERVICE DIES 0.10 - 0.1', 'BUAH', '', '18SD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2290, 'SERVICE DIES 0.10 - 0.1', 'BUAH', '', '18SD004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2291, 'SERVICE DIES 0.10 - 0.1', 'BUAH', '', '18SD005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2292, 'SERVICE DIES 0.11 - 0.1', 'BUAH', '', '18SD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2293, 'SERVICE DIES 0.11 - 0.1', 'BUAH', '', '18SD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2294, 'SERVICE DIES 0.11 - 0.1', 'BUAH', '', '18SD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2295, 'SERVICE DIES 0.11 - 0.1', 'BUAH', '', '18SD009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2296, 'SERVICE DIES 0.11 - 0.1', 'BUAH', '', '18SD010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2297, 'SERVICE DIES 2.40 - 2.5', 'BUAH', '', '18SD011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2298, 'SERVICE DIES 2.20 - 2.5', 'BUAH', '', '18SD012', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2299, 'SERVICE DIES DAIMOND 0.26-0.3', 'PCS', '', '18SD013', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2300, 'SERVICE DIES DAIMOND 0.12-0.1', 'PCS', '', '18SD014', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2301, 'SERVICE DIES DAIMOND 0.13-0.1', 'PCS', '', '18SD015', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2302, 'SERVICE DIES DAIMOND 0.14-0.1', 'PCS', '', '18SD016', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2303, 'SERVICE DIES 2.60 MM > 2.90 MM', 'BUAH', '', '18SD017', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2304, 'SERVICE DIES 2.53 MM > 2.80 M', 'BUAH', '', '18SD018', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2305, 'SERVICE DIES 2.40 MM > 2.70 M', 'BUAH', '', '18SD019', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2306, 'SERVICE DIES 2.30 MM > 2.60 M', 'BUAH', '', '18SD020', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2307, 'SERVICE DIES 2.29 MM > 2.54 M', 'BUAH', '', '18SD021', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2308, 'SERVICE DIES 2.26 MM > 2.50 M', 'BUAH', '', '18SD022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2309, 'SERVICE DIES 2.19 MM > 2.40 M', 'BUAH', '', '18SD023', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2310, 'SERVICE DIES 5.70 MM > 6.60 M', 'BUAH', '', '18SD024', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2311, 'SERVICE DIES 5.00 MM > 5.70 M', 'BUAH', '', '18SD025', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2312, 'SERVICE DIES 4.50 MM > 5.00 M', 'BUAH', '', '18SD026', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2313, 'SERVICE DIES 4.00 MM > 4.50 M', 'BUAH', '', '18SD027', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2314, 'SERVICE DIES 3.50 MM > 4.00 M', 'BUAH', '', '18SD028', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2315, 'SERVICE DIES 5,70 MM > 8,50 M', 'BUAH', '', '18SD029', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2316, 'SERVICE DIES 240 MM > 2,90 M', 'BUAH', '', '18SD030', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2317, 'SERVICE DIES 2.90 MM W-', 'BUAH', '', '18SD031', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2318, 'SERVICE DIES 2.70 M', 'BUAH', '', '18SD032', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2319, 'SERVICE DIES 2.62 M', 'BUAH', '', '18SD033', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2320, 'SERVICE DIES 2.39 M', 'BUAH', '', '18SD034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2321, 'SERVICE DIES 6.60 MM W-', 'BUAH', '', '18SD035', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2322, 'SERVICE DIES 2.40 MM W-', 'BUAH', '', '18SD036', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2323, 'SERVICE DIES 5.70 MM W-', 'BUAH', '', '18SD037', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2324, 'SERVICE DIES 5.00 MM W-', 'BUAH', '', '18SD038', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2325, 'SERVICE DIES 4.50 MM W-', 'BUAH', '', '18SD039', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2326, 'SERVICE DIES 4.00 MM W-', 'BUAH', '', '18SD040', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2327, 'SERVICE DIES 3.50 MM W-', 'BUAH', '', '18SD041', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2328, 'SERVICE DIES 2.60 MM W-', 'BUAH', '', '18SD042', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2329, 'SERVICE DIES 2.50 MM W-', 'BUAH', '', '18SD043', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2330, 'SERVICE DIES 3.50 MM W-', 'BUAH', '', '18SD044', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2331, 'SERVICE DIES 2.30 MM W-', 'BUAH', '', '18SD045', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2332, 'SERVICE DIES 2.40 MM W-', 'BUAH', '', '18SD046', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2333, 'SERVICE DIES 2.60 MM W-', 'BUAH', '', '18SD047', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2334, 'SERVICE DIES 5.70 MM W-', 'BUAH', '', '18SD048', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2335, 'ACCU 75/12 VOL', 'UNIT', '', '19AC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2336, 'AIR CLEANER P/N 91361-0090', 'BUAH', '', '19ACPN1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2337, 'AIR FILTER MD 60344', 'BUAH', '', '19AF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2338, 'AIR FILTER J 85-1027-0', 'BUAH', '', '19AF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2339, 'AIR FILTER P/N 1703 - 20B TOYOTA 7FD 3,', 'BUAH', '', '19AF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2340, 'ALTERNATOR ASSY P/N 27060-78301-7', 'BUAH', '', '19AN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2341, 'BEARING CLUTCH P/N ME 62033', 'BUAH', '', '19BC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2342, 'BUSHING CON RO', 'BUAH', '', '19BC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2343, 'BAN DALAM UK. 700*1', 'BUAH', '', '19BD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2344, 'BEARING 307-15-1193', 'BUAH', '', '19BE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2345, 'BEARING 3 EC 24-1131', 'BUAH', '', '19BE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2346, 'BEARING 43826-31960-7', 'BUAH', '', '19BE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2347, 'BEARING P/N 43826-31960-7', 'BUAH', '', '19BE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2348, 'BEARING KOY', 'BUAH', '', '19BE006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2349, 'BEARING NEDLE', 'BUAH', '', '19BE007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2350, 'BRACKET ENGINE LH 91520-2010', 'BUAH', '', '19BE008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2351, 'BRACKET ENGINE RH 91520-1040', 'BUAH', '', '19BE009', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2352, 'BEARING P/N 64343-5040', 'BUAH', '', '19BE010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2353, 'BEARING P/N 91443-0160', 'BUAH', '', '19BE011', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2354, 'BAN FLAP UK. 700*1', 'BUAH', '', '19BF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2355, 'BAN FLAP UK. 600 X ', 'BUAH', '', '19BF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2356, 'BEARING KING PI', 'BUAH', '', '19BK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2357, 'BAN LUAR 700*12*12 PL', 'BUAH', '', '19BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2358, 'BAN LUAR UK. 700*15 12 PL', 'BUAH', '', '19BL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2359, 'BOLT F 1035-1208', 'BUAH', '', '19BL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2360, 'BAN MATI 650 - 10 / 5,0', 'BUAH', '', '19BM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2361, 'BAN MATI 250-15 / 70', 'BUAH', '', '19BM002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2362, 'BEARING NEEDLE B/C P/N. 3EC-24-1135', 'BUAH', '', '19BN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2363, 'BEARING P/N. 34C-24-1193', 'BUAH', '', '19BN002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2364, 'BOLT P/N 300-27-1122', 'BUAH', '', '19BO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2365, 'BOLT 07206-3101', 'BUAH', '', '19BO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2366, 'BEARING PIN KING P/N 91443-0560', 'BUAH', '', '19BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2367, 'BONGKAR PASANG BAN (FORKLIP', 'BUAH', '', '19BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2368, 'BRAKE SHOE 47440-32880-7', 'BUAH', '', '19BR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2369, 'BRAKE SHOE 47430-32880-7', 'BUAH', '', '19BR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2370, 'BRAKE SHOE 47420-32880-7', 'BUAH', '', '19BR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2371, 'BRAKE SHOE 47410-32880-7', 'BUAH', '', '19BR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2372, 'BEARING RELEAS', 'BUAH', '', '19BR005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2373, 'BALL SOCKET 3 EC 24-1160', 'BUAH', '', '19BS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2374, 'BOLT STOPPE', 'BUAH', '', '19BS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2375, 'BOLT STOPER P/N 64343-1880', 'BUAH', '', '19BS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2376, 'BALL SOCKET ASS', 'BUAH', '', '19BS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2377, 'BEARING P/N. 34C-24-1131', 'BUAH', '', '19BT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2378, 'BOX SIKRIN', 'BUAH', '', '19BX001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2379, 'CYLINDER ASS', 'SET', '', '19CA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2380, 'CYLINDER ASSY, MASTER P/N. 91346 - 1030', 'BUAH', '', '19CA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2381, 'CYLINDER ASSY, CLUTCH P/N. 91851 - 2350', 'BUAH', '', '19CA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2382, 'COVER ASSY, ROCKER P/N. 32A04 - 0301', 'BUAH', '', '19CA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2383, 'COVER CLUTCH', 'BUAH', '', '19CC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2384, 'CLUTCH DISK ASSY P/N 304-10-3411', 'BUAH', '', '19CD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2385, 'CLUTCH DISK ASSY P/N 3EC-10-1152', 'BUAH', '', '19CD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2386, 'CLUTCH DISK P/N 91321-1110', 'BUAH', '', '19CD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2387, 'CARTRIDGE P/N. 3ED-66-1133', 'BUAH', '', '19CF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2388, 'CLAMP ( SOLAR ', 'BUAH', '', '19CL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2389, 'CAP SEALING P/N 04826-2200', 'BUAH', '', '19CS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2390, 'CAP  SEALING P/N 04826-2250', 'BUAH', '', '19CS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2391, 'DEKRUP COUPLING ( COVER CLUTCH ', 'BUAH', '', '19DC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2392, 'COVER CLUTCH P/N 91321-0001', 'UNIT', '', '19DC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2393, 'DISK CLUTCH', 'BUAH', '', '19DC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2394, 'DIES SEMI DIAMOND 4,0', 'BUAH', '', '19DD010', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2395, 'DAMPER ENGINE HOD P/N 52230-23000-7', 'BUAH', '', '19DE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2396, 'DRIVE SHAFT P/N. 91324-0006', 'BUAH', '', '19DS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2397, 'END-TEIROD 91423-1530', 'SET', '', '19ET001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2398, 'END TEIROD 91423-1570', 'SET', '', '19ET002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2399, 'FORK ASSY (GARPU FORKLIP', 'UNIT', '', '19FA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2400, 'FLANGE COUPL', 'BUAH', '', '19FC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2401, 'FULL FILTER 16405-V070', 'BUAH', '', '19FF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2402, 'FULL FILTER 34462-0030', 'BUAH', '', '19FF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2403, 'FULL FILTER P/N 2302 - 25 TOYOTA 7FD 3,', 'BUAH', '', '19FF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2404, 'FILTER HYD P/N 91375-0380', 'BUAH', '', '19FHYD1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2405, 'FILTER RETUR', 'BUAH', '', '19FR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2406, 'FILTER SUCTIO', 'BUAH', '', '19FS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2407, 'FORKLIP TOYOTA 3.5 TO', 'UNIT', '', '19FT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2408, 'FLYWHEL', 'BUAH', '', '19FW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2409, 'GASKET 07005-0121', 'BUAH', '', '19GA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2410, 'GASKET 07005-0141', 'BUAH', '', '19GA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2411, 'GASKET HEA', 'SET', '', '19GA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2412, 'GASKER ROCKER P/N. 32A04 - 0320', 'BUAH', '', '19GR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2413, 'GASKET SET O / ', 'SET', '', '19GS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2414, 'HOSE P/STEERING 07123-00215 KOMATSU 3,', 'BUAH', '', '19H3005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2415, 'HEATHER ANEALING L300*200 220 V 2000 ', 'BUAH', '', '19HA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2416, 'HOSE ( AIR CLEANER ', 'BUAH', '', '19HA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2417, 'HOSE BY PAS', 'BUAH', '', '19HB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2418, 'HOLDER CARBON BRUSH ( BESAR ', 'BUAH', '', '19HB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2419, 'HOSE CLAMP STEANLESS HS2', 'BUAH', '', '19HC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2420, 'HOSE 1/2\"*55 C', 'BUAH', '', '19HE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2421, 'HOSE RADIATOR ( ATAS ) P/N 3 EC-04-1511', 'BUAH', '', '19HE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2422, 'HOSE P/N 3EC-04-1511', 'BUAH', '', '19HE003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2423, 'HOSE P/N 3EC-04-1512', 'BUAH', '', '19HE004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2424, 'HOSE P/STEERING 07123-00219 KOMATSU 3,', 'BUAH', '', '19HE006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2425, 'HEAD FUEL FILTER P/N. 6202-73-611', 'BUAH', '', '19HF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2426, 'HELICAL GEAR Z 4', 'BUAH', '', '19HG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2427, 'HOSE HYDROULI', 'BUAH', '', '19HH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2428, 'HOUSING OUTLE', 'BUAH', '', '19HO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2429, 'HOSE RETURN P/N 91375-1310', 'BUAH', '', '19HR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2430, 'HOSE RADIATOR ATA', 'BUAH', '', '19HR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2431, 'HOSE RADIATOR BAWA', 'BUAH', '', '19HR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2432, 'HOSE RETURN NOZZL', 'BUAH', '', '19HR004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2433, 'HOSE 91575-0030', 'SET', '', '19HS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2434, 'INSULATO', 'BUAH', '', '19IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2435, 'JOINT ASSY,UNIVERSAL 91571-0005', 'SET', '', '19JA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2436, 'JOINT COUPL', 'BUAH', '', '19JC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2437, 'JOINT COUPLE ASS', 'BUAH', '', '19JC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2438, 'JOINT UNIVERSAL ASSY P/N. 91324-0003', 'BUAH', '', '19JU001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2439, 'JOINT UNIVERSAL ASSY P/N. 91324-0006', 'BUAH', '', '19JU002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2440, 'KIT CONTROL VALV', 'SET', '', '19KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2441, 'KIT GEAR BO', 'SET', '', '19KG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2442, 'KING PI', 'BUAH', '', '19KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2443, 'KANVAS REM ( BRAKE SHOC ) 91446-3270', 'BUAH', '', '19KR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2444, 'KANVAS REM ( BRAKE SHOC ) 91446-4110', 'BUAH', '', '19KR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2445, 'KIT TILT CYLINDER', 'SET', '', '19KT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2446, 'KITT VALVE ASSY CONTROL MITSUBISHI FD2,', 'SET', '', '19KV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2447, 'LEVER SUB TILTLOCK P/N 45803-23000-7', 'BUAH', '', '19LS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2448, 'LEM TRIBO', 'TUBE', '', '19LT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2449, 'LAMPU TEMBAK 12 VOL', 'BUAH', '', '19LT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2450, 'METAL BULAN', 'SET', '', '19MB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2451, 'MASTER CLUTCH RELEAS', 'BUAH', '', '19MC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2452, 'METAL DUDUK U,S 0.2', 'SET', '', '19MD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2453, 'METAL DUDUK 0,5', 'SET', '', '19MD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2454, 'METAL JALAN U,S 0.5', 'SET', '', '19MJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2455, 'METAL JALAN 0,7', 'SET', '', '19MJ002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2456, 'MINYAK REM', 'BOTOL', '', '19MR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2457, 'NIPLE GREAS', 'BUAH', '', '19NG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2458, 'NEPLE GREASE P/N F33050-1000', 'BUAH', '', '19NG002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2459, 'NUT , JAM P/N F2320-1000', 'BUAH', '', '19NJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2460, 'NOZZLE + SETTING PRESSURE + RIN', 'SET', '', '19NZ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2461, 'OIL ENGIN', 'LITER', '', '19OE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2462, 'OIL FILTER ME 00409', 'BUAH', '', '19OF002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2463, 'OIL FILTER ME 06978', 'BUAH', '', '19OF003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2464, 'OIL FILTER J 86-1124', 'BUAH', '', '19OF004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2465, 'OIL FILTER J 86-1210', 'BUAH', '', '19OF005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2466, 'OIL FILTER P/N 1502 - 20 TOYOTA 7FD 3,', 'BUAH', '', '19OF006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2467, 'OIL HY', 'LITER', '', '19OHYD1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2468, 'OIL PUM', 'BUAH', '', '19OP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2469, 'O RING P/N 07000-1508', 'BUAH', '', '19OR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2470, 'O-RING P/N 07000-0212', 'BUAH', '', '19OR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2471, 'OIL SEAL VB 28*37*', 'BUAH', '', '19OS005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2472, 'OIL TRANSMISSIO', 'LITER', '', '19OT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2473, 'PIN BELL CRANK P/N 91243-0540', 'BUAH', '', '19PB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2474, 'PIN BELL CRANK P/N. 3EC-24-1134', 'BUAH', '', '19PB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2475, 'PLAT COUPLIN', 'BUAH', '', '19PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2476, 'PACKING P/N 3EC-64-1322', 'BUAH', '', '19PC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2477, 'PACKING CARTE', 'BUAH', '', '19PC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2478, 'PELUK UK. 600 x 9 6 HOL', 'BUAH', '', '19PE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2479, 'PLUG GLO', 'BUAH', '', '19PG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2480, 'PIN KING 3 EC-24-1123', 'BUAH', '', '19PK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2481, 'PIN KING P/N 91443-2060', 'BUAH', '', '19PK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2482, 'PLATE P/N 304-01-3115', 'BUAH', '', '19PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2483, 'PIN PISTO', 'BUAH', '', '19PP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2484, 'PIPE 6206-71-581', 'BUAH', '', '19PP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2485, 'PIPE 3 EC-38-1221', 'BUAH', '', '19PP003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2486, 'PANTEK PLAT COUPLIN', 'BUAH', '', '19PP004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2487, 'PIN SPRING P/N F2850-0805', 'BUAH', '', '19PS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2488, 'PALTE THRUST ST', 'SET', '', '19PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2489, 'PLUGH TIGHT P/N 96411-11400-7', 'BUAH', '', '19PT002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2490, 'PLU', 'BUAH', '', '19PT003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2491, 'RING BACK UP P/N 07001-0508', 'BUAH', '', '19RB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2492, 'RUBBER P/N 304-01-3113', 'BUAH', '', '19RB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2493, 'RUBBER P/N 304-01-3114', 'BUAH', '', '19RB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2494, 'RELEASE CLUTCH ASS', 'BUAH', '', '19RC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2495, 'RADIATOR P/N 91301-0030', 'BUAH', '', '19RD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2496, 'RUBBER HOSE 1 1/4', 'MTR', '', '19RH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2497, 'RUMAH ( INJECTOR ) NOZZL', 'BUAH', '', '19RN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2498, 'RING SET PISTON ST', 'SET', '', '19RS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2499, 'SEAL P/N 3EC-14-1113', 'BUAH', '', '19SA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2500, 'STATER ASSY P/N 28100-40291-7', 'BUAH', '', '19SA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2501, 'SOK COUPLE', 'BUAH', '', '19SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2502, 'SEAL DUST P/N 3EC-64-132', 'BUAH', '', '19SD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2503, 'SUPPORT ENGINE 91213-1220', 'BUAH', '', '19SE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2504, 'STAINER P/N. 34B-66-1518', 'BUAH', '', '19SF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2505, 'SHIM 3 EC-24-1123', 'BUAH', '', '19SH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2506, 'SELANG HYROULIK + NEPL', 'BUAH', '', '19SH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2507, 'SHIM P/N 304-01-3116', 'BUAH', '', '19SH003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2508, 'SEAL KIT P/N 94204-1012', 'BUAH', '', '19SK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2509, 'SOKET KE', 'BUAH', '', '19SK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2510, 'SAKLAR TARI', 'BUAH', '', '19SK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2511, 'SELANG 1/4', 'BUAH', '', '19SL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2512, 'SWLANG 5/8', 'METER', '', '19SL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2513, 'SELANG 50 CM + NEPL', 'BUAH', '', '19SL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2514, 'SEAL OIL P/N 07012-009', 'BUAH', '', '19SO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2515, 'SEAL OIL P/N 3EB-13-1247', 'BUAH', '', '19SO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2516, 'SWIT REM 12 VOL', 'BUAH', '', '19SR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2517, 'SWIT STATE', 'BUAH', '', '19SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2518, 'SWITCH TEMPERATUR', 'BUAH', '', '19ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2519, 'TALI GAS/CABLE GA', 'BUAH', '', '19TG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2520, 'TIEROD , END P/N 91243-1530', 'BUAH', '', '19TR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2521, 'TIEROD , END P/N 91243-1570', 'BUAH', '', '19TR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2522, 'V - BEL', 'BUAH', '', '19VB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2523, 'VANBELT 3450-12.5*1175 L', 'BUAH', '', '19VB034', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2524, 'WIRE ASSY FORWARD P/N. 33570-23420-7', 'BUAH', '', '19WA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2525, 'WIRE ASSY P/N. 33580-23420-7', 'BUAH', '', '19WA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2526, 'WATER PUM', 'UNIT', '', '19WP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2527, 'WATER PUMP P/N 16100-78300-7', 'BUAH', '', '19WP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2528, 'WASHE', 'BUAH', '', '19WS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2529, 'WASHE', 'BUAH', '', '19WS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2530, 'WASHER P/N 91443-0310', 'BUAH', '', '19WS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2531, 'WASHER P/N 64343-4420', 'BUAH', '', '19WS004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2532, 'BETADINE 30M', 'BTL', '', '20BD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2533, 'BODRE', 'DUS', '', '20BK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2534, 'BODREX MIGRA', 'PAPAN', '', '20BM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2535, 'BIOPLACENTO', 'BOX', '', '20BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2536, 'DIE DA YAO JIN', 'BTL', '', '20DD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2537, 'DECOLGE', 'PAPAN', '', '20DG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2538, 'ENTROSTO', 'DUS', '', '20EN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2539, 'HANSAPLA', 'BKS', '', '20HS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2540, 'INSIDA', 'STRIP', '', '20IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2541, 'KOYO CAB', 'PAK', '', '20KC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2542, 'KONIDI', 'PAPAN', '', '20KD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2543, 'KOMI', 'DUS', '', '20KM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2544, 'KOYO SALONPA', 'BKS', '', '20KS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2545, 'MINYAK KAYU PUTIH CAP LANG 60M', 'BTL', '', '20MK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2546, 'MINYAK TAWO', 'BTL', '', '20MT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2547, 'NEURALGI', 'DUS', '', '20NR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2548, 'NEO RHEUMACY', 'STRIP', '', '20NR002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2549, 'NEURALGI', 'STRIP', '', '20NR003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2550, 'PO CAI PI', 'DUS', '', '20PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2551, 'PROCOL', 'PAPAN', '', '20PC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2552, 'PANADOL BIR', 'STRIP', '', '20PD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2553, 'PANADOL HIJA', 'STRIP', '', '20PD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2554, 'PANADOL MERA', 'STRIP', '', '20PD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2555, 'PROMA', 'DUS', '', '20PG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2556, 'PONSTA', 'PAPAN', '', '20PN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2557, 'PARAME', 'PAPAN', '', '20PX001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2558, 'TOLAK ANGIN CAI', 'DUS', '', '20TA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2559, 'TOBROSO', 'STRIP', '', '20TB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2560, 'TIEH TA YAU GI', 'BTL', '', '20TT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2561, 'AMPER METER PANEL UK. 96 X 96 ( 0 - 75 A', 'BUAH', '', '21AM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2562, 'BALLAST TL 10 WATT PHILIP', 'BUAH', '', '21BA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2563, 'BALLAST TL 20 WATT PHILIP', 'BUAH', '', '21BA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2564, 'BOHLAM HOLOGE', 'BUAH', '', '21BH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2565, 'BALLAST ELECTRIC ( EBE 1*36) PHILIP', 'BUAH', '', '21BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2566, 'BALLAST ELECTRIC ( EBE 2*36) PHILIP', 'BUAH', '', '21BL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2567, 'BOHLAM TL 10 WATT PHILIP', 'BUAH', '', '21BO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2568, 'BOHLAM TL 20 WATT PHILIP', 'BUAH', '', '21BO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2569, 'BOHLAM TL 40 WATT PHILIP', 'BUAH', '', '21BO003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2570, 'BOHLAM MERCURY 400 WAT', 'BUAH', '', '21BO004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2571, 'BOHLAM 24 VOL', 'BUAH', '', '21BO005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2572, 'CHANGE OVER SWITCH 4 POLE 630A SOCOME', 'BUAH', '', '21CO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2573, 'CAPASITOR 10 MF/400VA', 'BUAH', '', '21CP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2574, 'CAPASITOR 12 MF BQ 2', 'BUAH', '', '21CP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2575, 'EMERGENCY SWITCH 30 MM IDE', 'BUAH', '', '21ES001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2576, 'FITTING LAMPU DOWN LIGHT 5', 'SET', '', '21FL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2577, 'FITTING LAMPU PLAPO', 'BUAH', '', '21FL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2578, 'FLOATLES RELAY OMRON 61F-G-AP', 'BUAH', '', '21FR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2579, 'HOLDER FUSE BATU NH 00 125 ', 'BUAH', '', '21HF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2580, 'ISOLASI BAKAR KABEL 95 M', 'MTR', '', '21IB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2581, 'JOINTING KABEL 95 M', 'BUAH', '', '21JK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2582, 'KABEL NYM 3 x 1,', 'METER', '', '21KA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2583, 'KABEL NYM 2 x 1,', 'METER', '', '21KA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2584, 'KLEM KABEL NO. 1', 'PAK', '', '21KK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2585, 'KLEM KABEL NO.', 'PAK', '', '21KK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2586, 'KWH METER + C', 'UNIT', '', '21KW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2587, 'LAMPU E 40/85 WATT SINYOK', 'BUAH', '', '21LA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2588, 'LAMPU PIJA', 'BUAH', '', '21LA002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2589, 'LAMPU TL 10 WAT', 'SET', '', '21LA003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2590, 'LAMPU DOWN LIGHT PL-5 2P PHILIP', 'BUAH', '', '21LA004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2591, 'LAMPU KEONG E 27/40 WATT SINYOK', 'BUAH', '', '21LA005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2592, 'LAMPU TL 40 WATT PHILI', 'SET', '', '21LA006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2593, 'LAMPU ESSENTIAL HE 11 WATT PHILI', 'BUAH', '', '21LA007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2594, 'LAMPU BESA', 'BUAH', '', '21LB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2595, 'LAMPU B9 6,3V - 1', 'BUAH', '', '21LB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2596, 'LAMPU COOL DAYLIGHT', 'BUAH', '', '21LC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2597, 'LAMPU E10 LED 24V - ', 'BUAH', '', '21LE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2598, 'LAMPU E12 24V - 0 11', 'BUAH', '', '21LE002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2599, 'LIMIT SWITCH CAMSCO AZ-810', 'BUAH', '', '21LI004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2600, 'LAMPU KEONG E40 / 88 WATT HANO', 'BUAH', '', '21LK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2601, 'LAMPU KEONG E27 / 88 WAT', 'BUAH', '', '21LK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2602, 'LAMPU LED 4 WAT', 'BUAH', '', '21LLED4', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2603, 'LAMPU LED 6 WAT', 'BUAH', '', '21LLED6', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2604, 'LAMPU PL-S 11 WATT PHILI', 'BUAH', '', '21LP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2605, 'LAMPU PL-S 9 WATT PHILI', 'BUAH', '', '21LP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2606, 'MCB 1P/10 ', 'BUAH', '', '21MC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2607, 'MCB 32 AMPER / 3 PHAS', 'BUAH', '', '21MC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2608, 'MCB 1 P/ 16 ', 'BUAH', '', '21MC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2609, 'MCB 1P/4 ', 'BUAH', '', '21MC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2610, 'MCB 1 P/25', 'BUAH', '', '21MC005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2611, 'MCB 1 P/ 6 ', 'BUAH', '', '21MC006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2612, 'MCB 2 P / 4 ', 'BUAH', '', '21MC007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2613, 'PIPA PVC 20 M', 'BTG', '', '21PA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2614, 'RELAY OMRON MK3P-I COIL 220 VA', 'BUAH', '', '21RO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2615, 'RELAY OMRON MK 2P-1 220 VA', 'BUAH', '', '21RO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2616, 'SAKLAR ENGKE', 'SET', '', '21SE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2617, 'STECKER + STOP CONTAC ELEGRAN 32A 4 PI', 'SET', '', '21SS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2618, 'STECKER + STOP CONTAC ELEGRAN 32A / 4PI', 'SET', '', '21SS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2619, 'SELECTOR SWITCH 30 MM IDE', 'BUAH', '', '21SW001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2620, 'TEDOS ( 3 LUBANG ', 'BUAH', '', '21TD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2621, 'VOLT METER PANEL UK. 96 X 96 ( 0 - 500 V', 'BUAH', '', '21VM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2622, 'BOBIN PLASTIK 7\"(BEKAS', 'BUAH', '', '2201BP7', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2623, 'BOBIN BESI 12\" ( BEKAS ', 'BUAH', '', '22BB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2624, 'BOBIN BESI 22 \" ( BEKAS ', 'BUAH', '', '22BB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2625, 'BOBIN 1200 M', 'BUAH', '', '22BB003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2626, 'BOBIN BESI O 600 M', 'BUAH', '', '22BB004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2627, 'BOBIN PLASTIK 5\" ( BARU ', 'BUAH', '', '22BP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2628, 'BOBIN PLASTIC 5 \" (BEKAS', 'BUAH', '', '22BP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2629, 'BOBIN PLASTIK BEKAS 10 ', 'BUAH', '', '22BPB01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2630, 'BOBIN PLASTIK BEKAS 8 ', 'BUAH', '', '22BPB10', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2631, 'ALAT CEK DARA', 'BUAH', '', '23ACD01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2632, 'BENDERA LAMBANG KESEHATAN ( JAMSOSTEK', 'LBR', '', '23BL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2633, 'GUNTING RUMPU', 'BUAH', '', '23GR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2634, 'KAIN PEL + GAGAN', 'BUAH', '', '23KP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2635, 'SAPU HIJU', 'BUAH', '', '23SH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2636, 'TIRAI KAY', 'SET', '', '23TKR01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2637, 'TUKAR TAMBAH POMPA SANY', 'UNIT', '', '23TTP01', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2638, 'SUSU', 'KG', '', '25S0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2639, 'AIR ACID (SULFURIC ACID', 'DRUM', '', '26A0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2640, 'ALUMUNIU', 'KG', '', '26A0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2641, 'AFKIRAN RONGSO', 'KG', '', '26A0003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2642, 'BOBIN PLASTIK BEKA', 'KG', '', '26B0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2643, 'BESI BEKA', 'KG', '', '26B0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2644, 'BAN BEKA', 'PCS', '', '26B0003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2645, 'SERPIHAN BATU APOLL', 'KG', '', '26B0004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2646, 'DEBU / BS SORTI', 'KG', '', '26D0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2647, 'DRUM BEKA', 'PCS', '', '26D0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2648, 'JERIGEN BEKA', 'PCS', '', '26J0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2649, 'KULIT PV', 'KG', '', '26K0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2650, 'KARDUS BEKA', 'KG', '', '26K0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2651, 'KULIT PE ( DROP WIRE ', 'KG', '', '26K0003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2652, 'KULIT ISOLASI C', 'KG', '', '26K0004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2653, 'KARUNG BEKA', 'TRUK', '', '26K0005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2654, 'KULIT JFT', 'KG', '', '26K0006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2655, 'KULIT XLP', 'KG', '', '26K0007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2656, 'MESIN BEKA', 'UNIT', '', '26M0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2657, 'OLIE BEKA', 'DRUM', '', '26O0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2658, 'PALET EX TM', 'BUAH', '', '26PE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2659, 'RONGSOKAN AC BEKA', 'UNIT', '', '26R0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2660, 'SENG BEKA', 'KG', '', '26S0001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2661, 'SENG ULI', 'KG', '', '26S0002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2662, 'BAJA BEKA', 'KG', '', '26S0003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2663, 'ANGLE JOIN', 'BUAH', '', '27AJ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2664, 'BAUT ANGLE JOIN', 'BUAH', '', '27BA001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2665, 'BUSHING CON RO', 'BUAH', '', '27BC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2666, 'BEARING CON ROD ST', 'BUAH', '', '27BC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2667, 'BUSHING ROCKER AR', 'BUAH', '', '27BR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2668, 'CONTROL BEARIN', 'BUAH', '', '27CB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2669, 'CENTRING SLEEV', 'BUAH', '', '27CS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2670, 'CLEM STEANLES 3 1/2', 'BUAH', '', '27CS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2671, 'CLEM STEANLES 2 1/2', 'BUAH', '', '27CS003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2672, 'FUEL FILTER KX4', 'BUAH', '', '27FF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2673, 'GASKET KIT OVERHOU', 'SET', '', '27GK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2674, 'GASKET KIT OIL COOLE', 'SET', '', '27GK002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2675, 'GASKET KIT OFFER COOLE', 'SET', '', '27GK003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2676, 'GASKET KIT GENERAL OVERHAU', 'SET', '', '27GK004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2677, 'GUIDE VALVE INLE', 'BUAH', '', '27GV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2678, 'GUIDE VALVE EXHAUS', 'BUAH', '', '27GV002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2679, 'GUIDE VALV', 'BUAH', '', '27GV003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2680, 'HOSE HYDROULIK 1/4 \" X 1 MT', 'BUAH', '', '27HH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2681, 'HOSE HYDROULIK 1/2 \" X 130 C', 'BUAH', '', '27HH002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2682, 'HAND PUMP SOLA', 'UNIT', '', '27HP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2683, 'INSERT /SETTING INLE', 'BUAH', '', '27IS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2684, 'INSERT /SETTING EXHAUS', 'BUAH', '', '27IS002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2685, 'LINE', 'BUAH', '', '27LN001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2686, 'LAS PIPA AI', 'BUAH', '', '27LP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2687, 'MAIN BEARING STD+METAL BULA', 'SET', '', '27MB001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2688, 'MAIN BEARIN', 'BUAH', '', '27MB002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2689, 'NOZZL', 'BUAH', '', '27NZ001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2690, 'OIL FILTER OX 69 ', 'BUAH', '', '27OF001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2691, 'ORING GREEN KECI', 'BUAH', '', '27OG001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2692, 'ORING HIJAU 88 X ', 'BUAH', '', '27OH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2693, 'ORING INJEK PUM', 'BUAH', '', '27OI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2694, 'ORING LINER BESA', 'BUAH', '', '27OL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2695, 'ORING LINER KECIL', 'BUAH', '', '27OL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2696, 'ORING MERAH 62 X ', 'BUAH', '', '27OM001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2697, 'OIL PUMP P/N. D423181012', 'UNIT', '', '27OP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2698, 'ORING RED BESA', 'BUAH', '', '27OR001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2699, 'OIL JET/JET SPRA', 'BUAH', '', '27OS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2700, 'PACKIN', 'BUAH', '', '27PC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2701, 'PLC UNI', 'UNIT', '', '27PL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2702, 'PACKING OVA', 'BUAH', '', '27PO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2703, 'PACKING TOMBO 1 m', 'MTR', '', '27PT001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2704, 'REPAIR KIT TURB', 'BUAH', '', '27RK001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2705, 'RING PISTO', 'BUAH', '', '27RP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2706, 'SEAL CACING', 'BUAH', '', '27SC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2707, 'SEAL CRANKSHAFT FRONT / REA', 'SET', '', '27SC002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2708, 'SEAL LEHER INJEK PUM', 'BUAH', '', '27SL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2709, 'SHIM LINE', 'BUAH', '', '27SL002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2710, 'SEAL LINNE', 'BUAH', '', '27SL003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2711, 'SLANG OVER FLO', 'MTR', '', '27SO001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2712, 'SENDING OIL PRESSUR', 'BUAH', '', '27SO002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2713, 'SEAL PIPA TURB', 'BUAH', '', '27SP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2714, 'SHIM PER KLEP', 'BUAH', '', '27SP002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2715, 'SELANG SOLA', 'BUAH', '', '27SS001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2716, 'SPEASER / SIM TEMBAG', 'BUAH', '', '27ST001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2717, 'SETTING VALVE EXHAUS', 'BUAH', '', '27SV001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2718, 'VALVE COLLET / LOCK VALV', 'BUAH', '', '27VC001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2719, 'VALVE EXHAUS', 'BUAH', '', '27VE001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2720, 'VALVE INLE', 'BUAH', '', '27VI001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
  `flag_tolling` int(1) NOT NULL,
  `jumlah` int(5) NOT NULL,
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

INSERT INTO `spb` (`id`, `no_spb`, `tanggal`, `produksi_ingot_id`, `jenis_barang`, `flag_tolling`, `jumlah`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `reject_remarks`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(3, 'SPB.201901.0002', '2019-01-07', 3, 2, 0, 0, 'TESTT', 1, '2019-01-07 07:01:22', 1, '0000-00-00 00:00:00', 0, '', '2019-01-07 05:01:19', 1, '2019-01-07 05:01:19', 1),
(4, 'SPB.201901.0003', '2019-01-10', 4, 2, 0, 0, 'TEST 2', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2019-01-10 10:01:53', 1, '2019-01-10 10:01:53', 1),
(5, 'SPB-RSK.201901.0001', '2019-01-10', 0, 1, 0, 0, 'SALES ORDER RONGSOK', 1, '2019-01-10 05:01:43', 1, '0000-00-00 00:00:00', 0, '', '2019-01-10 04:01:51', 1, '0000-00-00 00:00:00', 0),
(6, 'SPB.201901.0004', '2019-01-14', 5, 2, 0, 0, 'MASAK ....', 1, '2019-01-14 10:01:41', 1, '0000-00-00 00:00:00', 0, '', '2019-01-14 10:01:19', 1, '2019-01-14 10:01:21', 1),
(7, 'SPB.201901.0005', '2019-01-15', 6, 2, 0, 0, 'TEST', 1, '2019-01-15 03:01:37', 1, '0000-00-00 00:00:00', 0, '', '2019-01-15 03:01:16', 1, '2019-01-15 03:01:29', 1),
(8, 'SPB.201901.0006', '2019-01-16', 7, 2, 0, 0, '3 KE 1', 1, '2019-01-16 11:01:04', 1, '0000-00-00 00:00:00', 0, '', '2019-01-16 11:01:47', 1, '2019-01-16 11:01:36', 1),
(9, 'SPB-RSK.201901.0002', '2019-01-28', 0, 1, 0, 0, 'SALES ORDER RONGSOK', 1, '2019-01-28 05:01:24', 1, '0000-00-00 00:00:00', 0, '', '2019-01-28 04:01:25', 1, '2019-01-28 05:01:46', 1),
(10, 'SPB-RSK.201901.0003', '2019-01-29', 0, 1, 0, 0, 'SALES ORDER RONGSOK', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', '2019-01-29 10:01:13', 1, '0000-00-00 00:00:00', 0),
(13, 'SPB-RSKT.201901.0001', '2019-01-31', 0, 2, 2, 150, 'TEST SPB RSK', 1, '2019-01-31 04:01:47', 1, '0000-00-00 00:00:00', 0, '', '2019-01-31 04:01:18', 1, '2019-01-31 04:01:43', 1),
(14, 'SPB-RSKT.201901.0002', '2019-01-31', 0, 2, 2, 50, 'RSK KECIL', 1, '2019-01-31 04:01:28', 1, '0000-00-00 00:00:00', 0, '', '2019-01-31 04:01:57', 1, '2019-01-31 04:01:24', 1),
(15, 'SPB-RSKT.201901.0003', '2019-01-31', 0, 2, 1, 50, 'SPB RSK ', 1, '2019-01-31 04:01:05', 1, '0000-00-00 00:00:00', 0, '', '2019-01-31 04:01:29', 1, '2019-01-31 04:01:01', 1),
(17, 'SPB.201902.0001', '2019-02-12', 11, 2, 0, 250, 'TEST AUTO SPB', 1, '2019-02-12 01:02:39', 6, '0000-00-00 00:00:00', 0, '', '2019-02-12 01:02:56', 14, '2019-02-12 01:02:29', 6),
(18, 'SPB.201902.0002', '2019-02-12', 13, 2, 0, 200, '', 1, '2019-02-12 02:02:55', 6, '0000-00-00 00:00:00', 0, '', '2019-02-12 02:02:54', 14, '2019-02-12 02:02:08', 6);

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
(3, 3, 0, 9, 25, 'TIPE 1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 3, 0, 10, 25, 'TIPE 2', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 4, 0, 48, 20, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 4, 0, 49, 30, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 5, 0, 9, 45, 'SALES ORDER', 0, '2019-01-10 04:01:12', 1, '0000-00-00 00:00:00', 0),
(8, 5, 0, 10, 100, 'SALES ORDER', 0, '2019-01-10 04:01:24', 1, '0000-00-00 00:00:00', 0),
(9, 5, 0, 17, 150, 'SALES ORDER', 0, '2019-01-10 04:01:42', 1, '0000-00-00 00:00:00', 0),
(10, 5, 0, 18, 200, 'SALES ORDER', 0, '2019-01-10 04:01:23', 1, '0000-00-00 00:00:00', 0),
(11, 6, 0, 9, 100, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 6, 0, 10, 100, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 6, 0, 48, 100, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 6, 0, 49, 100, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 6, 0, 43, 100, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 7, 0, 9, 20, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 7, 0, 10, 20, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 8, 0, 48, 50, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 9, 0, 9, 100, 'SALES ORDER', 0, '2019-01-28 04:01:44', 1, '0000-00-00 00:00:00', 0),
(20, 9, 0, 10, 100, 'SALES ORDER', 0, '2019-01-28 04:01:53', 1, '0000-00-00 00:00:00', 0),
(23, 10, 0, 49, 200, 'SALES ORDER', 0, '2019-01-29 12:01:55', 1, '0000-00-00 00:00:00', 0),
(24, 10, 0, 48, 200, 'SALES ORDER', 0, '2019-01-29 12:01:07', 1, '0000-00-00 00:00:00', 0),
(25, 13, 0, 48, 100, '0,12', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 13, 0, 49, 50, '0,18', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 14, 0, 48, 50, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 15, 0, 48, 50, 'AG', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(3, 3, 19, 13),
(4, 3, 20, 13),
(5, 5, 29, 17),
(6, 5, 23, 14),
(7, 5, 24, 14),
(8, 5, 30, 17),
(9, 5, 25, 14),
(10, 5, 28, 16),
(11, 5, 31, 17),
(12, 5, 26, 14),
(13, 5, 27, 15),
(14, 6, 32, 18),
(15, 6, 33, 18),
(16, 6, 34, 18),
(17, 6, 35, 18),
(18, 6, 9, 9),
(19, 6, 18, 12),
(20, 7, 46, 21),
(21, 7, 47, 21),
(22, 8, 16, 12),
(23, 9, 32, 18),
(24, 9, 33, 18),
(25, 13, 34, 18),
(26, 13, 53, 24),
(27, 14, 16, 12),
(28, 15, 16, 12),
(29, 17, 9, 9),
(30, 17, 10, 9),
(31, 17, 11, 9),
(32, 17, 17, 12),
(33, 17, 12, 10),
(34, 18, 34, 18),
(35, 18, 35, 18);

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
-- Stand-in structure for view `stok_keras`
-- (See below for the actual view)
--
CREATE TABLE `stok_keras` (
`jenis_barang_id` int(11)
,`jenis_barang` varchar(50)
,`total_qty_in` decimal(32,0)
,`total_qty_out` decimal(32,0)
,`total_berat_in` decimal(32,0)
,`total_berat_out` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stok_rsk`
-- (See below for the actual view)
--
CREATE TABLE `stok_rsk` (
`rongsok_id` int(11)
,`nama_item` varchar(50)
,`jumlah_packing` bigint(21)
,`stok` double
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

-- --------------------------------------------------------

--
-- Table structure for table `tolling_fg`
--

CREATE TABLE `tolling_fg` (
  `id` int(11) NOT NULL,
  `no_tolling_fg` varchar(200) NOT NULL,
  `no_po` varchar(50) NOT NULL,
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
(9, 'TTR.201901.0001', '2019-01-02', 9, 0, 0, 0, '', 0, 0, 1, '2019-01-02 03:41:51', 1, '0000-00-00 00:00:00', 0, '2019-01-02 03:01:09', 1, '2019-01-02 03:01:09', 1),
(10, 'TTR.201901.0002', '2019-01-02', 10, 0, 0, 0, '', 0, 0, 1, '2019-01-02 05:52:34', 1, '0000-00-00 00:00:00', 0, '2019-01-02 03:01:49', 1, '2019-01-02 03:01:49', 1),
(11, 'TTR.201901.0003', '2019-01-02', 11, 0, 0, 0, '', 0, 0, 1, '2019-01-02 05:52:40', 1, '0000-00-00 00:00:00', 0, '2019-01-02 03:01:26', 1, '2019-01-02 03:01:26', 1),
(12, '', '2019-01-07', 12, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-01-07 06:01:03', 1, '2019-01-07 06:01:03', 1),
(13, 'TTR.201901.0004', '2019-01-07', 13, 0, 0, 0, '', 0, 0, 1, '2019-01-07 06:11:24', 1, '0000-00-00 00:00:00', 0, '2019-01-07 06:01:04', 1, '2019-01-07 06:01:04', 1),
(14, 'TTR.201901.0005', '2019-01-10', 16, 0, 0, 0, '', 0, 0, 1, '2019-01-10 05:04:44', 1, '0000-00-00 00:00:00', 0, '2019-01-10 04:01:32', 1, '2019-01-10 04:01:32', 1),
(15, 'TTR.201901.0006', '2019-01-10', 17, 0, 0, 0, '', 0, 0, 1, '2019-01-10 05:04:52', 1, '0000-00-00 00:00:00', 0, '2019-01-10 04:01:11', 1, '2019-01-10 04:01:11', 1),
(16, 'TTR.201901.0007', '2019-01-10', 18, 0, 0, 0, '', 0, 0, 1, '2019-01-10 05:12:56', 1, '0000-00-00 00:00:00', 0, '2019-01-10 05:01:42', 1, '2019-01-10 05:01:42', 1),
(17, 'TTR.201901.0008', '2019-01-10', 19, 0, 0, 0, '', 0, 0, 1, '2019-01-10 05:46:39', 1, '0000-00-00 00:00:00', 0, '2019-01-10 05:01:26', 1, '2019-01-10 05:01:26', 1),
(18, 'TTR.201901.0009', '2019-01-14', 20, 0, 0, 0, '', 0, 0, 1, '2019-01-14 10:43:45', 1, '0000-00-00 00:00:00', 0, '2019-01-14 10:01:37', 1, '2019-01-14 10:01:37', 1),
(19, 'TTR.201901.0010', '2019-01-15', 22, 0, 0, 0, '', 0, 0, 1, '2019-01-15 02:19:42', 1, '0000-00-00 00:00:00', 0, '2019-01-15 02:01:09', 1, '2019-01-15 02:01:09', 1),
(20, 'TTR.201902.0001', '2019-01-15', 23, 0, 0, 0, '', 0, 0, 1, '2019-02-06 11:41:54', 1, '0000-00-00 00:00:00', 0, '2019-01-15 02:01:32', 1, '2019-01-15 02:01:32', 1),
(21, 'TTR.201901.0011', '2019-01-15', 25, 0, 0, 0, '', 0, 0, 1, '2019-01-15 03:12:07', 1, '0000-00-00 00:00:00', 0, '2019-01-15 03:01:12', 1, '2019-01-15 03:01:12', 1),
(24, 'TTR.201901.0012', '2019-01-23', 28, 0, 0, 0, '', 0, 0, 1, '2019-01-23 06:08:25', 1, '0000-00-00 00:00:00', 0, '2019-01-23 05:01:33', 1, '2019-01-23 05:01:33', 1),
(25, 'TTR.201901.0013', '2019-01-23', 29, 0, 0, 0, '', 0, 0, 1, '2019-01-23 06:13:08', 1, '0000-00-00 00:00:00', 0, '2019-01-23 05:01:23', 1, '2019-01-23 05:01:23', 1),
(26, 'TTR.201901.0014', '2019-01-23', 30, 0, 0, 0, '', 0, 0, 1, '2019-01-23 06:17:26', 1, '0000-00-00 00:00:00', 0, '2019-01-23 05:01:56', 1, '2019-01-23 05:01:56', 1),
(27, '', '2019-02-04', 31, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-02-04 05:02:25', 1, '2019-02-04 05:02:25', 1),
(28, '', '2019-02-04', 32, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-02-04 05:02:17', 1, '2019-02-04 05:02:17', 1),
(29, '', '2019-02-06', 33, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-02-06 11:02:32', 1, '2019-02-06 11:02:32', 1),
(30, '', '2019-02-06', 34, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-02-06 11:02:11', 1, '2019-02-06 11:02:11', 1),
(31, '', '2019-02-06', 35, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-02-06 11:02:34', 1, '2019-02-06 11:02:34', 1),
(32, '', '2019-02-06', 36, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-02-06 11:02:14', 1, '2019-02-06 11:02:14', 1),
(33, '', '2019-02-06', 37, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-02-06 11:02:49', 1, '2019-02-06 11:02:49', 1),
(34, '', '2019-02-06', 38, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-02-06 11:02:08', 1, '2019-02-06 11:02:08', 1),
(35, '', '2019-02-11', 44, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-02-11 02:02:23', 5, '2019-02-11 02:02:23', 5),
(37, '', '2019-02-11', 43, 0, 0, 0, '', 0, 0, 0, NULL, NULL, '0000-00-00 00:00:00', 0, '2019-02-11 02:02:16', 5, '2019-02-11 02:02:16', 5),
(38, 'TTR.201902.0002', '2019-02-11', 45, 0, 0, 0, '', 0, 0, 1, '2019-02-11 04:12:22', 6, '0000-00-00 00:00:00', 0, '2019-02-11 04:02:38', 8, '2019-02-11 04:02:38', 8);

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
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
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
(17, 9, 9, 43, 0, 0, 78, 65, '', '2019-01-02 03:01:09', 1, '2019-01-10 03:01:13', 1),
(18, 9, 10, 44, 0, 0, 89, 74, '', '2019-01-02 03:01:09', 1, '2019-01-10 03:01:13', 1),
(19, 9, 11, 45, 0, 0, 56, 44, '', '2019-01-02 03:01:09', 1, '2019-01-10 03:01:13', 1),
(20, 10, 12, 61, 0, 0, 20, 17, '', '2019-01-02 03:01:49', 1, '2019-01-02 03:01:49', 1),
(21, 10, 13, 50, 0, 0, 15, 13, '', '2019-01-02 03:01:49', 1, '2019-01-02 03:01:49', 1),
(22, 11, 14, 61, 0, 0, 40, 28, '', '2019-01-02 03:01:26', 1, '2019-01-02 03:01:26', 1),
(23, 11, 15, 50, 0, 0, 38, 30, '', '2019-01-02 03:01:26', 1, '2019-01-02 03:01:26', 1),
(24, 12, 16, 48, 0, 0, 50, 46, '', '2019-01-07 06:01:03', 1, '2019-01-07 06:01:03', 1),
(25, 12, 17, 49, 0, 0, 57, 51, '', '2019-01-07 06:01:03', 1, '2019-01-07 06:01:03', 1),
(26, 12, 18, 43, 0, 0, 58, 50, '', '2019-01-07 06:01:03', 1, '2019-01-07 06:01:03', 1),
(27, 13, 19, 9, 0, 0, 30, 25, '', '2019-01-07 06:01:04', 1, '2019-01-07 06:01:04', 1),
(28, 13, 20, 10, 0, 0, 27, 24, '', '2019-01-07 06:01:04', 1, '2019-01-07 06:01:04', 1),
(29, 14, 23, 9, 0, 0, 38, 30, '', '2019-01-10 04:01:32', 1, '2019-01-10 04:01:32', 1),
(30, 14, 24, 10, 0, 0, 88, 76, '', '2019-01-10 04:01:32', 1, '2019-01-10 04:01:32', 1),
(31, 14, 25, 17, 0, 0, 59, 50, '', '2019-01-10 04:01:32', 1, '2019-01-10 04:01:32', 1),
(32, 14, 26, 18, 0, 0, 113, 101, '', '2019-01-10 04:01:32', 1, '2019-01-10 04:01:32', 1),
(33, 15, 27, 18, 0, 0, 115, 103, '', '2019-01-10 04:01:11', 1, '2019-01-10 04:01:11', 1),
(34, 16, 28, 17, 0, 0, 61, 55, '', '2019-01-10 05:01:42', 1, '2019-01-10 05:01:42', 1),
(35, 17, 29, 9, 0, 0, 30, 22, '', '2019-01-10 05:01:26', 1, '2019-01-10 05:01:26', 1),
(36, 17, 30, 10, 0, 0, 32, 26, '', '2019-01-10 05:01:26', 1, '2019-01-10 05:01:26', 1),
(37, 17, 31, 17, 0, 0, 65, 53, '', '2019-01-10 05:01:26', 1, '2019-01-10 05:01:26', 1),
(38, 18, 32, 9, 0, 0, 112, 100, '', '2019-01-14 10:01:37', 1, '2019-01-14 10:01:37', 1),
(39, 18, 33, 10, 0, 0, 111, 100, '', '2019-01-14 10:01:37', 1, '2019-01-14 10:01:37', 1),
(40, 18, 34, 48, 0, 0, 108, 100, '', '2019-01-14 10:01:37', 1, '2019-01-14 10:01:37', 1),
(41, 18, 35, 49, 0, 0, 115, 100, '', '2019-01-14 10:01:37', 1, '2019-01-14 10:01:37', 1),
(42, 19, 37, 48, 0, 0, 22, 20, '', '2019-01-15 02:01:09', 1, '2019-01-15 02:01:09', 1),
(43, 19, 38, 49, 0, 0, 23, 20, '', '2019-01-15 02:01:09', 1, '2019-01-15 02:01:09', 1),
(44, 19, 39, 43, 0, 0, 24, 20, '', '2019-01-15 02:01:09', 1, '2019-01-15 02:01:09', 1),
(45, 19, 40, 45, 0, 0, 25, 20, '', '2019-01-15 02:01:09', 1, '2019-01-15 02:01:09', 1),
(46, 19, 41, 44, 0, 0, 26, 20, '', '2019-01-15 02:01:09', 1, '2019-01-15 02:01:09', 1),
(47, 20, 42, 48, 0, 0, 30, 25, '', '2019-01-15 02:01:32', 1, '2019-01-15 02:01:32', 1),
(48, 20, 43, 49, 0, 0, 35, 25, '', '2019-01-15 02:01:32', 1, '2019-01-15 02:01:32', 1),
(49, 21, 46, 9, 0, 0, 56, 50, '', '2019-01-15 03:01:12', 1, '2019-01-15 03:01:12', 1),
(50, 21, 47, 10, 0, 0, 60, 50, '', '2019-01-15 03:01:12', 1, '2019-01-15 03:01:12', 1),
(55, 24, 52, 48, 0, 0, 68, 56, '', '2019-01-23 05:01:33', 1, '2019-01-23 05:01:33', 1),
(56, 24, 53, 49, 0, 0, 58, 46, '', '2019-01-23 05:01:33', 1, '2019-01-23 05:01:33', 1),
(57, 25, 54, 44, 0, 0, 65, 55, '', '2019-01-23 05:01:23', 1, '2019-01-23 05:01:23', 1),
(58, 26, 55, 45, 0, 0, 67, 55, '', '2019-01-23 05:01:56', 1, '2019-01-23 05:01:56', 1),
(59, 27, 56, 44, 0, 0, 68, 60, '', '2019-02-04 05:02:25', 1, '2019-02-04 05:02:25', 1),
(60, 27, 57, 44, 0, 0, 69, 61, '', '2019-02-04 05:02:25', 1, '2019-02-04 05:02:25', 1),
(61, 28, 58, 43, 0, 0, 35, 27, '', '2019-02-04 05:02:17', 1, '2019-02-04 05:02:17', 1),
(62, 29, 59, 35, 0, 0, 60, 54, '', '2019-02-06 11:02:32', 1, '2019-02-06 11:02:32', 1),
(63, 29, 60, 35, 0, 0, 68, 56, '', '2019-02-06 11:02:32', 1, '2019-02-06 11:02:32', 1),
(64, 29, 61, 35, 0, 0, 60, 52, '', '2019-02-06 11:02:32', 1, '2019-02-06 11:02:32', 1),
(65, 30, 62, 36, 0, 0, 56, 48, '', '2019-02-06 11:02:11', 1, '2019-02-06 11:02:11', 1),
(66, 30, 63, 36, 0, 0, 60, 48, '', '2019-02-06 11:02:11', 1, '2019-02-06 11:02:11', 1),
(67, 31, 64, 32, 0, 0, 58, 52, '', '2019-02-06 11:02:34', 1, '2019-02-06 11:02:34', 1),
(68, 31, 65, 32, 0, 0, 60, 48, '', '2019-02-06 11:02:34', 1, '2019-02-06 11:02:34', 1),
(69, 31, 66, 33, 0, 0, 65, 52, '', '2019-02-06 11:02:34', 1, '2019-02-06 11:02:34', 1),
(70, 32, 67, 39, 0, 0, 108, 96, '', '2019-02-06 11:02:14', 1, '2019-02-06 11:02:14', 1),
(71, 33, 68, 71, 0, 0, 100, 88, '', '2019-02-06 11:02:49', 1, '2019-02-06 11:02:49', 1),
(72, 34, 69, 12, 0, 56, 112, 104, '', '2019-02-06 11:02:08', 1, '2019-02-06 11:02:08', 1),
(73, 34, 70, 17, 0, 78, 105, 99, '', '2019-02-06 11:02:08', 1, '2019-02-06 11:02:08', 1),
(74, 35, 74, 8, 0, 32, 0, 32, '32', '2019-02-11 02:02:23', 5, '2019-02-11 02:02:14', 5),
(76, 37, 73, 8, 0, 0, 0, 24.42, '', '2019-02-11 02:02:16', 5, '2019-02-11 02:02:02', 5),
(77, 38, 75, 48, 0, 0, 112, 104, '', '2019-02-11 04:02:38', 8, '2019-02-11 04:02:38', 8),
(78, 38, 76, 49, 0, 0, 108, 102, '', '2019-02-11 04:02:38', 8, '2019-02-11 04:02:38', 8);

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
  `hasil_masak_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bpb_ampas`
--

INSERT INTO `t_bpb_ampas` (`id`, `no_bpb`, `status`, `spb_ampas_id`, `keterangan`, `hasil_masak_id`, `created_by`, `created`, `approved_by`, `approved_date`, `rejected_by`, `rejected_at`, `remarks`) VALUES
(1, 'BPB-AMP.201901.0001', 0, 0, '', 1, 1, '2019-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL),
(2, 'BPB-AMP.201901.0002', 0, 0, '', 2, 1, '2019-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL),
(3, 'BPB-AMP.201901.0003', 0, 0, '', 3, 1, '2019-01-16 00:00:00', NULL, NULL, NULL, NULL, NULL),
(4, 'BPB-AMP.201901.0004', 1, 0, '', 4, 1, '2019-01-16 00:00:00', 1, '2019-01-16 03:01:18', NULL, NULL, NULL),
(5, 'BPB-AMP.201902.0001', 0, 0, '', 5, 14, '2019-02-12 00:00:00', NULL, NULL, NULL, NULL, NULL);

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
(1, 1, '2019-01-15', 3, '', 0, 'KG', 2, 'SISA PRODUKSI INGOT', 1),
(2, 2, '2019-01-15', 3, '', 0, 'KG', 3, 'SISA PRODUKSI INGOT', 1),
(3, 3, '2019-01-16', 3, '', 0, 'KG', 2, 'SISA PRODUKSI INGOT', 1),
(4, 4, '2019-01-16', 3, '', 0, 'KG', 3, 'SISA PRODUKSI INGOT', 1),
(5, 5, '2019-02-12', 3, '', 0, 'KG', 3, 'SISA PRODUKSI INGOT', 14);

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
(1, 'BPB-SDM.201901.0001', '2019-01-03', 1, 400, '2019-01-03 09:01:30', 1, NULL, NULL, 1, '', '2019-01-03 09:01:55', 1, NULL, NULL, NULL),
(2, 'BPB-SDM.201901.0002', '2019-01-03', 2, 409, '2019-01-03 09:01:22', 1, NULL, NULL, 1, 'TEST 2', '2019-01-03 09:01:51', 1, NULL, NULL, NULL),
(3, 'BPB-SDM.201901.0003', '2019-01-03', 3, 424, '2019-01-03 09:01:48', 1, NULL, NULL, 1, 'TEST 1', '2019-01-03 09:01:01', 1, NULL, NULL, NULL),
(4, 'BPB-SDM.201901.0004', '2019-01-07', 5, 450, '2019-01-07 06:01:52', 1, NULL, NULL, 1, '', '2019-01-08 04:01:31', 1, NULL, NULL, NULL),
(5, 'BPB-SDM.201901.0005', '2019-01-07', 6, 450, '2019-01-08 04:01:38', 1, NULL, NULL, 1, '', '2019-01-08 04:01:55', 1, NULL, NULL, NULL),
(6, 'BPB-SDM.201901.0006', '2019-01-08', 7, 409, '2019-01-08 04:01:04', 1, NULL, NULL, 1, '', '2019-01-08 04:01:37', 1, NULL, NULL, NULL),
(7, 'BPB-SDM.201901.0007', '2019-01-07', 4, 424, '2019-01-14 10:01:04', 1, NULL, NULL, 1, '', '2019-01-14 02:01:43', 1, NULL, NULL, NULL),
(8, 'BPB-SDM.201901.0008', '2019-01-14', 8, 429, '2019-01-14 02:01:19', 1, NULL, NULL, 1, '', '2019-01-14 02:01:39', 1, NULL, NULL, NULL),
(9, 'BPB-SDM.201901.0009', '2019-01-14', 9, 166, '2019-01-14 02:01:53', 1, NULL, NULL, 1, '', '2019-01-14 02:01:35', 1, NULL, NULL, NULL),
(10, 'BPB-SDM.201901.0010', '2019-01-14', 10, 174, '2019-01-14 02:01:25', 1, NULL, NULL, 1, '', '2019-01-14 02:01:31', 1, NULL, NULL, NULL),
(11, 'BPB-SDM.201901.0011', '2019-01-15', 11, 429, '2019-01-15 10:01:24', 1, NULL, NULL, 1, '', '2019-01-15 10:01:31', 1, NULL, NULL, NULL),
(12, 'BPB-SDM.201901.0012', '2019-01-15', 12, 457, '2019-01-15 10:01:50', 1, NULL, NULL, 1, '', '2019-01-15 10:01:34', 1, NULL, NULL, NULL),
(13, 'BPB-SDM.201901.0013', '2019-01-15', 13, 431, '2019-01-15 10:01:19', 1, NULL, NULL, 1, '', '2019-01-15 10:01:38', 1, NULL, NULL, NULL),
(14, 'BPB-SDM.201901.0014', '2019-01-15', 14, 400, '2019-01-15 11:01:47', 1, NULL, NULL, 1, '', '2019-01-15 11:01:22', 1, NULL, NULL, NULL),
(15, 'BPB-SDM.201901.0015', '2019-01-15', 15, 401, '2019-01-15 03:01:41', 1, NULL, NULL, 1, '', '2019-01-15 03:01:11', 1, NULL, NULL, NULL),
(16, 'BPB-SDM.201901.0016', '2019-01-23', 16, 400, '2019-01-23 06:01:33', 1, NULL, NULL, 1, '', '2019-01-23 06:01:39', 1, NULL, NULL, NULL),
(17, 'BPB-SDM.201901.0017', '2019-01-29', 17, 429, '2019-01-29 03:01:29', 1, NULL, NULL, 1, '', '2019-01-29 03:01:40', 1, NULL, NULL, NULL),
(18, 'BPB-SDM.201901.0018', '2019-01-29', 18, 431, '2019-01-29 03:01:33', 1, NULL, NULL, 1, '', '2019-01-29 03:01:44', 1, NULL, NULL, NULL),
(19, 'BPB-SDM.201901.0019', '2019-01-29', 19, 153, '2019-01-29 07:01:24', 1, NULL, NULL, 1, '', '2019-01-29 07:01:07', 1, NULL, NULL, NULL),
(20, 'BPB-SDM.201901.0020', '2019-01-29', 20, 154, '2019-01-29 07:01:30', 1, NULL, NULL, 1, '', '2019-01-29 07:01:12', 1, NULL, NULL, NULL),
(21, 'BPB-SDM.201901.0021', '2019-01-31', 21, 427, '2019-01-31 05:01:02', 1, NULL, NULL, 1, '', '2019-01-31 05:01:07', 1, NULL, NULL, NULL),
(27, 'BPB-PO-T.201902.0008', '2019-02-04', 0, 142, '2019-02-04 02:02:45', 1, NULL, NULL, 0, 'BARANG PO FG', NULL, NULL, NULL, NULL, NULL),
(28, 'BPB-PO-T.201902.0009', '2019-02-04', 0, 143, '2019-02-04 02:02:14', 1, NULL, NULL, 0, 'BARANG PO FG', NULL, NULL, NULL, NULL, NULL),
(30, 'BPB-RTR.201902.0002', '2019-02-06', 4, 457, '2019-02-06 03:02:00', 1, NULL, NULL, 1, 'BARANG RETUR', '2019-02-06 03:02:58', 1, NULL, NULL, NULL),
(31, 'BPB-SDM.201902.0001', '2019-02-06', 22, 457, '2019-02-06 05:02:22', 1, NULL, NULL, 1, '', '2019-02-06 05:02:28', 1, NULL, NULL, NULL),
(32, 'BPB-PO-T.201902.0012', '2019-02-11', 0, 175, '2019-02-11 05:02:59', 8, NULL, NULL, 1, 'BARANG PO FG', '2019-02-13 11:02:00', 6, NULL, NULL, NULL),
(37, 'BPB-PO.201902.0006', '2019-02-11', 0, 450, '2019-02-11 07:02:26', 3, NULL, NULL, 0, 'BARANG PO FG', NULL, NULL, NULL, NULL, NULL),
(38, 'BPB-PO.201902.0007', '2019-02-11', 0, 451, '2019-02-11 07:02:26', 3, NULL, NULL, 0, 'BARANG PO FG', NULL, NULL, NULL, NULL, NULL),
(40, 'BPB-PO.201902.0009', '2019-02-11', 0, 452, '2019-02-11 07:02:00', 1, NULL, NULL, 0, 'BARANG PO FG', NULL, NULL, NULL, NULL, NULL),
(41, 'BPB-PO.201902.0010', '2019-02-11', 0, 452, '2019-02-11 07:02:10', 3, NULL, NULL, 1, 'BARANG PO FG', '2019-02-13 11:02:14', 6, NULL, NULL, NULL),
(42, 'BPB-SDM.201902.0002', '2019-02-13', 32, 455, '2019-02-13 11:02:30', 14, NULL, NULL, 1, '', '2019-02-13 11:02:07', 6, NULL, NULL, NULL),
(43, 'BPB-SDM.201902.0003', '2019-02-13', 33, 463, '2019-02-13 12:02:23', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'BPB-SDM.201902.0004', '2019-02-13', 35, 439, '2019-02-13 01:02:52', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'BPB-SDM.201902.0005', '2019-02-13', 36, 400, '2019-02-13 01:02:43', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'BPB-SDM.201902.0006', '2019-02-13', 37, 410, '2019-02-13 01:02:49', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'BPB-SDM.201902.0007', '2019-02-13', 38, 405, '2019-02-13 04:02:24', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'BPB-SDM.201902.0008', '2019-02-14', 39, 438, '2019-02-14 05:02:58', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'BPB-SDM.201902.0009', '2019-02-14', 40, 405, '2019-02-14 05:02:39', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'BPB-SDM.201902.0010', '2019-02-14', 41, 424, '2019-02-15 10:02:16', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'BPB-PO.201902.0011', '2019-02-18', 0, 405, '2019-02-18 12:02:52', 1, NULL, NULL, 0, 'BARANG PO FG', NULL, NULL, NULL, NULL, NULL),
(52, 'BPB-PO.201902.0012', '2019-02-18', 0, 406, '2019-02-18 12:02:56', 1, NULL, NULL, 0, 'BARANG PO FG', NULL, NULL, NULL, NULL, NULL),
(53, 'BPB-PO.201902.0013', '2019-02-18', 0, 407, '2019-02-18 12:02:08', 1, NULL, NULL, 0, 'BARANG PO FG', NULL, NULL, NULL, NULL, NULL),
(54, 'BPB-PO.201902.0014', '2019-02-18', 0, 408, '2019-02-18 12:02:28', 1, NULL, NULL, 0, 'BARANG PO FG', NULL, NULL, NULL, NULL, NULL),
(55, 'BPB-SDM.201902.0011', '2019-02-18', 42, 431, '2019-02-18 04:02:30', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 1, 400, '190103L0014', 12345, 80, 62.66, 28, 0),
(2, 2, 409, '190103L0008', 12346, 87, 75, 18, 0),
(3, 3, 424, '190103M0009', 12347, 48, 35.068, 19, 0),
(4, 4, 450, '190107R0001', 12345, 54, 54, 26, 0),
(5, 4, 450, '190107R0002', 12346, 54, 54, 33, 0),
(6, 5, 450, '190108R1234', 1234, 0, 24, 26, 0),
(7, 5, 450, '190108R1235', 1235, 0, 28, 26, 0),
(8, 5, 450, '190108R1236', 1236, 0, 35, 26, 0),
(9, 5, 450, '190108R1237', 1237, 0, 33, 26, 0),
(10, 5, 450, '190108R1238', 1238, 0, 38, 26, 0),
(11, 5, 450, '190108R1239', 1239, 0, 42, 26, 0),
(12, 6, 409, '190108L0013', 143567, 140, 132.12, 27, 0),
(13, 7, 424, '190114M0001', 1234555, 58, 52.04, 35, 0),
(14, 8, 429, '190114P0001', 1234455, 56, 56, 40, 0),
(15, 9, 166, '190114M0002', 1245637, 56, 50.45, 37, 0),
(16, 10, 174, '190114M0003', 1243535, 58, 52.42, 38, 0),
(17, 11, 429, '190115M0005', 845793, 55, 50.5, 41, 0),
(18, 12, 457, '190115M0006', 36835, 55, 51.5, 42, 0),
(19, 13, 431, '190115M0007', 425426, 30, 27.5, 43, 0),
(20, 14, 400, '190115M0008', 238767, 55, 51.2, 44, 0),
(21, 15, 401, '190115M0010', 8795483, 65, 57.44, 46, 0),
(22, 16, 400, '190123M0004', 829759, 58, 52.4, 39, 0),
(23, 17, 429, '190129L0013', 39588, 118, 110.12, 27, 0),
(24, 18, 431, '190129M0004', 39590, 56, 50.4, 39, 0),
(25, 18, 431, '190129M0009', 39591, 68, 55.068, 19, 0),
(26, 19, 153, '190129M0011', 13567, 58, 52.04, 47, 0),
(27, 20, 154, '190129M0005', 653478, 60, 55.5, 41, 0),
(28, 21, 427, '190131L0013', 13531, 160, 152.12, 27, 0),
(34, 27, 142, '190130M00070001', 0, 105, 102.5, 43, 0),
(35, 28, 143, '190204M00090001', 0, 110, 97.068, 19, 0),
(37, 30, 457, '190206M0003RTR', 0, 30, 24.42, 38, 0),
(38, 31, 457, '190206S0001', 13155, 30, 27.67, 48, 0),
(39, 32, 175, '190211M00120001', 0, 80, 74.26, 49, 0),
(40, 32, 175, '190211M00130001', 0, 80, 75.08, 50, 0),
(45, 37, 450, '190211M00140001', 0, 58, 52.64, 51, 0),
(46, 38, 451, '190211M00030001', 0, 60, 54.42, 38, 0),
(48, 40, 452, '190211S00020003', 0, 56, 53.72, 52, 0),
(49, 41, 452, '190211S00030004', 0, 52, 49.25, 53, 0),
(50, 42, 455, '190213M0003', 15578, 60, 54.42, 38, 0),
(51, 42, 455, '190213M0002', 15579, 64, 58.45, 37, 0),
(52, 42, 455, '190213S0001', 15577, 53, 50.67, 48, 0),
(53, 43, 463, '190213P0001', 1253316, 50, 50, 40, 0),
(54, 44, 439, '190213R2355', 2355, 0, 45, 26, 0),
(55, 44, 439, '190213R2356', 2356, 0, 50, 26, 0),
(56, 45, 400, '190213A0101', NULL, 0, 25, 20, 0),
(57, 45, 400, '190213A01018', NULL, 0, 26, 20, 0),
(58, 45, 400, '190213A01011', NULL, 0, 27, 20, 0),
(59, 46, 410, '190213A01016', NULL, 0, 25, 20, 0),
(60, 46, 410, '190213A01083', NULL, 0, 26, 20, 0),
(61, 46, 410, '190213A01047', NULL, 0, 27, 20, 0),
(62, 46, 410, '190213A01052', NULL, 0, 28, 20, 0),
(63, 47, 405, '190213R1351', 1351, 0, 45, 26, 0),
(64, 48, 438, '190214R3137', 3137, 0, 56, 26, 0),
(65, 48, 438, '190214R3138', 3138, 0, 65, 26, 0),
(66, 49, 405, '190214R0001', 15359, 50, 50, 26, 0),
(67, 49, 405, '190214R0003', 15360, 50, 50, 34, 0),
(68, 50, 424, '190215A01042', NULL, 54, 53.66, 20, 0),
(69, 50, 424, '190215A01039', NULL, 52, 51.92, 20, 0),
(70, 50, 424, '190215A01058', NULL, 55, 54.36, 20, 0),
(71, 50, 424, '190215B01152', NULL, 53, 52.15, 21, 0),
(72, 50, 424, '190215B01157', NULL, 50, 49.35, 21, 0),
(73, 50, 424, '190215B01138', NULL, 51, 50.15, 21, 0),
(74, 51, 405, '190213M00100005', 0, 108, 100.44, 46, 0),
(75, 52, 406, '190213P00050006', 0, 58, 49.35, 23, 0),
(76, 52, 406, '190213J00020006', 0, 60, 50.29, 25, 0),
(77, 54, 408, '190218M00060010', 0, 105, 101.5, 42, 0),
(78, 55, 431, '190218A00170014', NULL, 53, 52.69, 20, 0),
(79, 55, 431, '190218A00170015', NULL, 52, 51.18, 20, 0);

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
(1, 'BPB-WIP.201901.0001', 1, 0, 'TEST 1', 1, 1, '2019-01-09 12:01:48', 1, '2019-01-09 12:01:56'),
(2, 'BPB-WIP.201901.0002', 1, 0, '', 2, 1, '2019-01-09 02:01:02', 1, '2019-01-09 02:01:45'),
(3, 'BPB-WIP.201901.0003', 1, 0, '', 3, 1, '2019-01-09 02:01:35', 1, '2019-01-09 02:01:41'),
(4, 'BPB-WIP.201901.0004', 1, 0, '', 4, 1, '2019-01-15 00:00:00', 1, '2019-01-17 03:01:27'),
(5, 'BPB-WIP.201901.0005', 1, 0, '', 5, 1, '2019-01-14 11:01:31', 1, '2019-01-14 11:01:16'),
(6, 'BPB-WIP.201901.0006', 1, 0, '', 6, 1, '2019-01-15 00:00:00', 1, '2019-01-17 10:01:34'),
(7, 'BPB-WIP.201901.0007', 1, 0, '', 7, 1, '2019-01-15 03:01:27', 1, '2019-01-17 10:01:37'),
(8, 'BPB-WIP.201901.0008', 1, 0, '', 8, 1, '2019-01-15 03:01:50', 1, '2019-01-17 10:01:41'),
(9, 'BPB-WIP.201901.0009', 1, 0, '', 9, 1, '2019-01-16 00:00:00', 1, '2019-01-17 10:01:45'),
(10, 'BPB-WIP.201901.0010', 1, 0, '', 10, 1, '2019-01-16 00:00:00', 1, '2019-01-16 03:01:41'),
(11, 'BPB-WIP.201901.0011', 1, 0, '', 11, 1, '2019-01-17 02:01:23', 1, '2019-01-17 03:01:48'),
(12, 'BPB-WIP.201901.0012', 1, 0, '', 12, 1, '2019-01-17 02:01:13', 1, '2019-01-17 03:01:52'),
(13, 'BPB-WIP.201901.0013', 1, 0, '', 13, 1, '2019-01-17 02:01:36', 1, '2019-01-17 03:01:55'),
(14, 'BPB-WIP.201901.0014', 1, 0, '', 14, 1, '2019-01-17 04:01:04', 1, '2019-01-17 04:01:21'),
(15, 'BPB-WIP.201901.0015', 1, 0, '', 15, 1, '2019-01-17 05:01:35', 1, '2019-01-17 05:01:41'),
(16, 'BPB-WIP.201901.0016', 1, 0, '', 16, 1, '2019-01-17 06:01:23', 1, '2019-01-17 06:01:01'),
(17, 'BPB-WIP.201901.0017', 1, 0, '', 17, 1, '2019-01-29 01:01:01', 1, '2019-01-29 01:01:07'),
(18, 'BPB-WIP.201901.0018', 1, 0, '', 18, 1, '2019-01-29 01:01:40', 1, '2019-01-29 01:01:39'),
(24, 'BPB-WIP.201901.0024', 1, 0, '', 24, 1, '2019-01-29 01:01:02', 1, '2019-01-29 02:01:41'),
(32, 'BPB-PO-T.201902.0010', 1, 0, 'BARANG PO WIP', 0, 1, '2019-02-04 04:02:13', 1, '2019-02-07 06:02:40'),
(33, 'BPB-PO-T.201902.0011', 1, 0, 'BARANG PO WIP', 0, 1, '2019-02-04 04:02:01', 1, '2019-02-07 06:02:44'),
(34, 'BPB-WIP.201902.0001', 1, 0, '', 25, 14, '2019-02-12 00:00:00', 6, '2019-02-12 02:02:48'),
(35, 'BPB-WIP.201902.0002', 1, 0, '', 26, 14, '2019-02-12 02:02:48', 6, '2019-02-12 02:02:37'),
(36, 'BPB-WIP.201902.0003', 1, 0, '', 27, 14, '2019-02-12 02:02:21', 6, '2019-02-12 03:02:43'),
(37, 'BPB-WIP.201902.0004', 1, 0, '', 28, 14, '2019-02-12 03:02:44', 6, '2019-02-12 03:02:47');

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
(1, 1, '2019-01-09', 6, 0, 45, 'ROLL', 60, 'TEST 1', 1),
(2, 2, '2019-01-09', 6, 0, 35, 'ROLL', 75, '', 1),
(3, 3, '2019-01-09', 5, 0, 30, 'ROLL', 50, '', 1),
(4, 4, '2019-01-15', 2, 0, 500, 'BATANG', 500, '', 1),
(5, 5, '2019-01-14', 6, 0, 45, 'ROLL', 50, '', 1),
(6, 6, '2019-01-15', 2, 0, 80, 'BATANG', 90, '', 1),
(7, 7, '2019-01-15', 6, 0, 25, 'ROLL', 30, '', 1),
(8, 8, '2019-01-15', 5, 0, 20, 'ROLL', 25, '', 1),
(9, 9, '2019-01-16', 2, 0, 28, 'BATANG', 34, '', 1),
(10, 10, '2019-01-16', 2, 0, 35, 'BATANG', 40, '', 1),
(11, 11, '2019-01-17', 6, 0, 30, 'ROLL', 40, '', 1),
(12, 12, '2019-01-17', 6, 0, 70, 'ROLL', 75, '', 1),
(13, 13, '2019-01-17', 6, 0, 15, 'ROLL', 15, '', 1),
(14, 14, '2019-01-17', 6, 0, 60, 'ROLL', 70, '', 1),
(15, 15, '2019-01-17', 6, 0, 30, 'ROLL', 40, '', 1),
(16, 16, '2019-01-17', 5, 0, 30, 'ROLL', 35, '', 1),
(17, 17, '2019-01-29', 6, 0, 50, 'ROLL', 65, '', 1),
(18, 18, '2019-01-29', 5, 0, 30, 'ROLL', 40, '', 1),
(24, 24, '2019-01-29', 5, 0, 30, 'ROLL', 40, '', 1),
(25, 32, '2019-02-04', 5, 0, 100, 'ROLL', 150, '0', 1),
(26, 33, '2019-02-04', 2, 0, 75, 'BATANG', 100, '', 1),
(27, 34, '2019-02-12', 2, 0, 150, 'BATANG', 223, '', 14),
(28, 35, '2019-02-12', 6, 0, 100, 'ROLL', 150, '', 14),
(29, 36, '2019-02-12', 6, 0, 20, 'ROLL', 30, '', 14),
(30, 37, '2019-02-12', 5, 0, 65, 'ROLL', 80, '', 14);

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
  `jenis_barang_id` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gudang_ampas`
--

INSERT INTO `t_gudang_ampas` (`id`, `tanggal`, `jenis_barang_id`, `berat`, `id_produksi`, `created_by`, `created_at`) VALUES
(1, '2019-01-16', 3, 3, 3, 1, '2019-01-16 03:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `t_gudang_bs`
--

CREATE TABLE `t_gudang_bs` (
  `id` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `jenis_produksi` varchar(5) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gudang_bs`
--

INSERT INTO `t_gudang_bs` (`id`, `id_produksi`, `jenis_produksi`, `jenis_barang_id`, `berat`, `tanggal`, `status`, `created_by`, `created_at`) VALUES
(1, 1, 'INGOT', 31, 4, '2019-01-15', 0, 1, '2019-01-14 10:01:13'),
(2, 2, 'INGOT', 31, 3, '2019-01-15', 0, 1, '2019-01-15 03:01:18'),
(3, 3, 'INGOT', 22, 3, '2019-01-16', 0, 1, '2019-01-16 12:01:12'),
(4, 3, 'INGOT', 31, 3, '2019-01-16', 0, 1, '2019-01-16 12:01:12'),
(7, 4, 'INGOT', 22, 3, '2019-01-16', 0, 1, '2019-01-16 03:01:56'),
(8, 4, 'INGOT', 31, 3, '2019-01-16', 0, 1, '2019-01-16 03:01:56'),
(9, 11, 'WIP', 20, 2, '2019-01-17', 0, 1, '2019-01-17 02:01:23'),
(10, 13, 'WIP', 22, 2, '2019-01-17', 0, 1, '2019-01-17 02:01:36'),
(11, 16, 'WIP', 51, 1, '2019-01-17', 0, 1, '2019-01-17 06:01:23'),
(12, 16, 'WIP', 53, 2, '2019-01-17', 0, 1, '2019-01-17 06:01:23'),
(13, 5, 'INGOT', 22, 10, '2019-02-12', 0, 14, '2019-02-12 02:02:00'),
(14, 5, 'INGOT', 31, 4, '2019-02-12', 0, 14, '2019-02-12 02:02:00'),
(15, 28, 'WIP', 51, 8, '2019-02-12', 0, 14, '2019-02-12 03:02:44'),
(16, 28, 'WIP', 53, 6, '2019-02-12', 0, 14, '2019-02-12 03:02:44');

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
  `modified_by` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gudang_fg`
--

INSERT INTO `t_gudang_fg` (`id`, `tanggal`, `jenis_trx`, `flag_taken`, `jenis_barang_id`, `t_bpb_fg_id`, `t_bpb_fg_detail_id`, `t_spb_fg_id`, `t_spb_fg_detail_id`, `nomor_SPB`, `nomor_BPB`, `bruto`, `netto`, `no_produksi`, `no_packing`, `bobbin_id`, `nomor_bobbin`, `keterangan`, `created_by`, `created_at`, `modified_date`, `modified_by`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(4, '2019-01-03', 1, 1, 424, 3, 3, 3, 0, 'SPB-FG2019010003', 'BPB-SDM.201901.0003', 48, 35.068, '12347', '190103M0009', 19, 'M0009', '', 1, '2019-01-03 09:01:01', '2019-01-08', 1, '2019-01-03', '0000-00-00'),
(5, '2019-01-03', 1, 1, 409, 2, 2, 8, 11, 'SPB-FG2019010008', 'BPB-SDM.201901.0002', 87, 75, '12346', '190103L0008', 18, 'L0008', '', 1, '2019-01-03 09:01:51', '2019-01-23', 1, '2019-01-03', '0000-00-00'),
(6, '2019-01-03', 1, 1, 400, 1, 1, 3, 0, 'SPB-FG2019010003', 'BPB-SDM.201901.0001', 80, 62.66, '12345', '190103L0014', 28, 'L0014', '', 1, '2019-01-03 09:01:55', '2019-01-08', 1, '2019-01-03', '0000-00-00'),
(7, '2019-01-08', 1, 1, 450, 4, 4, 14, 14, 'SPB-FG2019010014', 'BPB-SDM.201901.0004', 54, 54, '12345', '190107R0001', 26, 'R0001', '', 1, '2019-01-08 04:01:31', '2019-01-23', 1, '2019-01-08', '0000-00-00'),
(8, '2019-01-08', 1, 1, 450, 4, 5, 15, 16, 'SPB-FG2019010015', 'BPB-SDM.201901.0004', 54, 54, '12346', '190107R0002', 33, 'R0002', '', 1, '2019-01-08 04:01:31', '2019-01-29', 1, '2019-01-08', '0000-00-00'),
(9, '2019-01-08', 1, 1, 450, 5, 6, 3, 4, 'SPB-FG2019010003', 'BPB-SDM.201901.0005', 0, 24, '1234', '190108R1234', NULL, NULL, '', 1, '2019-01-08 04:01:55', '2019-01-08', 1, '2019-01-08', '0000-00-00'),
(10, '2019-01-08', 1, 0, 450, 5, 7, 14, 14, 'SPB-FG2019010014', 'BPB-SDM.201901.0005', 0, 28, '1235', '190108R1235', NULL, NULL, '', 1, '2019-01-08 04:01:55', '2019-01-23', 1, '2019-01-08', '0000-00-00'),
(11, '2019-01-08', 1, 0, 450, 5, 8, 14, 14, 'SPB-FG2019010014', 'BPB-SDM.201901.0005', 0, 35, '1236', '190108R1236', NULL, NULL, '', 1, '2019-01-08 04:01:55', '2019-01-23', 1, '2019-01-08', '0000-00-00'),
(12, '2019-01-08', 1, 1, 450, 5, 9, 3, 4, 'SPB-FG2019010003', 'BPB-SDM.201901.0005', 0, 33, '1237', '190108R1237', NULL, NULL, '', 1, '2019-01-08 04:01:55', '2019-01-08', 1, '2019-01-08', '0000-00-00'),
(13, '2019-01-08', 1, 0, 450, 5, 10, 14, 14, 'SPB-FG2019010014', 'BPB-SDM.201901.0005', 0, 38, '1238', '190108R1238', NULL, NULL, '', 1, '2019-01-08 04:01:55', '2019-01-23', 1, '2019-01-08', '0000-00-00'),
(14, '2019-01-08', 0, 0, 450, 5, 11, NULL, NULL, NULL, 'BPB-SDM.201901.0005', 0, 42, '1239', '190108R1239', NULL, NULL, '', 1, '2019-01-08 04:01:55', '0000-00-00', 0, '2019-01-08', '0000-00-00'),
(15, '2019-01-08', 1, 1, 409, 6, 12, 3, 3, 'SPB-FG2019010003', 'BPB-SDM.201901.0006', 140, 132.12, '143567', '190108L0013', 27, 'L0013', '', 1, '2019-01-08 04:01:37', '2019-01-08', 1, '2019-01-08', '0000-00-00'),
(16, '2019-01-14', 1, 1, 174, 10, 16, 4, 6, 'SPB-FG2019010004', 'BPB-SDM.201901.0010', 58, 52.42, '1243535', '190114M0003', 38, 'M0003', '', 1, '2019-01-14 02:01:31', '2019-01-14', 1, '2019-01-14', '0000-00-00'),
(17, '2019-01-14', 1, 1, 166, 9, 15, 4, 0, 'SPB-FG2019010004', 'BPB-SDM.201901.0009', 56, 50.45, '1245637', '190114M0002', 37, 'M0002', '', 1, '2019-01-14 02:01:35', '2019-01-14', 1, '2019-01-14', '0000-00-00'),
(18, '2019-01-14', 1, 1, 429, 8, 14, 4, 0, 'SPB-FG2019010004', 'BPB-SDM.201901.0008', 56, 56, '1234455', '190114P0001', 40, 'P0001', '', 1, '2019-01-14 02:01:39', '2019-01-14', 1, '2019-01-14', '0000-00-00'),
(19, '2019-01-14', 1, 1, 424, 7, 13, 15, 0, 'SPB-FG2019010015', 'BPB-SDM.201901.0007', 58, 52.04, '1234555', '190114M0001', 35, 'M0001', '', 1, '2019-01-14 02:01:43', '2019-01-29', 1, '2019-01-14', '0000-00-00'),
(20, '2019-01-15', 1, 1, 429, 11, 17, 5, 0, 'SPB-FG2019010005', 'BPB-SDM.201901.0011', 55, 50.5, '845793', '190115M0005', 41, 'M0005', '', 1, '2019-01-15 10:01:31', '2019-01-15', 1, '2019-01-15', '0000-00-00'),
(21, '2019-01-15', 1, 1, 457, 12, 18, 5, 8, 'SPB-FG2019010005', 'BPB-SDM.201901.0012', 55, 51.5, '36835', '190115M0006', 42, 'M0006', '', 1, '2019-01-15 10:01:34', '2019-01-15', 1, '2019-01-15', '0000-00-00'),
(22, '2019-01-15', 1, 1, 431, 13, 19, 5, 0, 'SPB-FG2019010005', 'BPB-SDM.201901.0013', 30, 27.5, '425426', '190115M0007', 43, 'M0007', '', 1, '2019-01-15 10:01:38', '2019-01-15', 1, '2019-01-15', '0000-00-00'),
(23, '2019-01-15', 1, 1, 400, 14, 20, 6, 0, 'SPB-FG2019010006', 'BPB-SDM.201901.0014', 55, 51.2, '238767', '190115M0008', 44, 'M0008', '', 1, '2019-01-15 11:01:22', '2019-01-15', 1, '2019-01-15', '0000-00-00'),
(24, '2019-01-15', 1, 1, 401, 15, 21, 7, 10, 'SPB-FG2019010007', 'BPB-SDM.201901.0015', 65, 57.44, '8795483', '190115M0010', 46, 'M0010', '', 1, '2019-01-15 03:01:11', '2019-01-15', 1, '2019-01-15', '0000-00-00'),
(25, '2019-01-23', 1, 1, 400, 16, 22, 14, 15, 'SPB-FG2019010014', 'BPB-SDM.201901.0016', 58, 52.4, '829759', '190123M0004', 39, 'M0004', '', 1, '2019-01-23 06:01:39', '2019-01-23', 1, '2019-01-23', '0000-00-00'),
(26, '2019-01-29', 1, 1, 429, 17, 23, 15, 0, 'SPB-FG2019010015', 'BPB-SDM.201901.0017', 118, 110.12, '39588', '190129L0013', 27, 'L0013', '', 1, '2019-01-29 03:01:40', '2019-01-29', 1, '2019-01-29', '0000-00-00'),
(27, '2019-01-29', 1, 1, 431, 18, 24, 15, 0, 'SPB-FG2019010015', 'BPB-SDM.201901.0018', 56, 50.4, '39590', '190129M0004', 39, 'M0004', '', 1, '2019-01-29 03:01:44', '2019-01-29', 1, '2019-01-29', '0000-00-00'),
(28, '2019-01-29', 1, 1, 431, 18, 25, 15, 0, 'SPB-FG2019010015', 'BPB-SDM.201901.0018', 68, 55.068, '39591', '190129M0009', 19, 'M0009', '', 1, '2019-01-29 03:01:44', '2019-01-29', 1, '2019-01-29', '0000-00-00'),
(29, '2019-01-29', 1, 1, 153, 19, 26, 16, 20, 'SPB-FG2019010016', 'BPB-SDM.201901.0019', 58, 52.04, '13567', '190129M0011', 47, 'M0011', '', 1, '2019-01-29 07:01:07', '2019-01-30', 1, '2019-01-29', '0000-00-00'),
(30, '2019-01-29', 1, 1, 154, 20, 27, 16, 21, 'SPB-FG2019010016', 'BPB-SDM.201901.0020', 60, 55.5, '653478', '190129M0005', 41, 'M0005', '', 1, '2019-01-29 07:01:12', '2019-01-30', 1, '2019-01-29', '0000-00-00'),
(31, '2019-01-31', 1, 1, 427, 21, 28, 17, 22, 'SPB-FGT.201901.0001', 'BPB-SDM.201901.0021', 160, 152.12, '13531', '190131L0013', 27, 'L0013', '', 1, '2019-01-31 05:01:07', '2019-01-31', 1, '2019-01-31', '0000-00-00'),
(33, '2019-02-06', 1, 0, 457, 30, 37, 22, 27, 'SPB-FGR.201902.0002', 'BPB-RTR.201902.0002', 30, 24.42, '0', '190206M0003RTR', 38, 'M0003', '', 1, '2019-02-06 03:02:58', '2019-02-06', 1, '2019-02-06', '2019-02-06'),
(34, '2019-02-06', 1, 1, 457, 31, 38, 23, 28, 'SPB-FG2019020004', 'BPB-SDM.201902.0001', 30, 27.67, '13155', '190206S0001', 48, 'S0001', '', 1, '2019-02-06 05:02:28', '2019-02-06', 1, '2019-02-06', '2019-02-06'),
(35, '2019-02-13', 0, 0, 175, 32, 39, NULL, NULL, NULL, 'BPB-PO-T.201902.0012', 80, 74.26, '0', '190211M00120001', 49, 'M0012', 'BARANG PO FG', 6, '2019-02-13 11:02:00', '0000-00-00', 0, '2019-02-13', '0000-00-00'),
(36, '2019-02-13', 0, 0, 175, 32, 40, NULL, NULL, NULL, 'BPB-PO-T.201902.0012', 80, 75.08, '0', '190211M00130001', 50, 'M0013', 'BARANG PO FG', 6, '2019-02-13 11:02:00', '0000-00-00', 0, '2019-02-13', '0000-00-00'),
(37, '2019-02-13', 0, 0, 455, 42, 50, NULL, NULL, NULL, 'BPB-SDM.201902.0002', 60, 54.42, '15578', '190213M0003', 38, 'M0003', '', 6, '2019-02-13 11:02:07', '0000-00-00', 0, '2019-02-13', '0000-00-00'),
(38, '2019-02-13', 0, 0, 455, 42, 51, NULL, NULL, NULL, 'BPB-SDM.201902.0002', 64, 58.45, '15579', '190213M0002', 37, 'M0002', '', 6, '2019-02-13 11:02:07', '0000-00-00', 0, '2019-02-13', '0000-00-00'),
(39, '2019-02-13', 0, 0, 455, 42, 52, NULL, NULL, NULL, 'BPB-SDM.201902.0002', 53, 50.67, '15577', '190213S0001', 48, 'S0001', '', 6, '2019-02-13 11:02:07', '0000-00-00', 0, '2019-02-13', '0000-00-00'),
(40, '2019-02-13', 0, 0, 452, 41, 49, NULL, NULL, NULL, 'BPB-PO.201902.0010', 52, 49.25, '0', '190211S00030004', 53, 'S0003', 'BARANG PO FG', 6, '2019-02-13 11:02:14', '0000-00-00', 0, '2019-02-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `t_gudang_keras`
--

CREATE TABLE `t_gudang_keras` (
  `id` int(11) NOT NULL,
  `jenis_trx` int(2) NOT NULL,
  `t_hasil_wip_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gudang_keras`
--

INSERT INTO `t_gudang_keras` (`id`, `jenis_trx`, `t_hasil_wip_id`, `jenis_barang_id`, `qty`, `berat`, `created_at`, `created_by`) VALUES
(1, 0, 11, 15, 10, 15, '2019-01-17 02:01:23', 1),
(2, 0, 12, 15, 10, 15, '2019-01-17 02:01:13', 1),
(3, 1, 13, 15, 20, 30, '2019-01-17 02:01:36', 1),
(4, 0, 13, 15, 5, 10, '2019-01-17 02:01:36', 1),
(5, 0, 14, 15, 30, 40, '2019-01-17 04:01:04', 1),
(6, 1, 15, 15, 35, 50, '2019-01-17 05:01:35', 1),
(7, 0, 26, 15, 30, 50, '2019-02-12 02:02:48', 14),
(8, 1, 27, 15, 20, 30, '2019-02-12 02:02:21', 14);

-- --------------------------------------------------------

--
-- Table structure for table `t_gudang_wip`
--

CREATE TABLE `t_gudang_wip` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `flag_taken` int(11) NOT NULL,
  `jenis_trx` tinyint(1) DEFAULT '0',
  `t_hasil_wip_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `t_spb_wip_id` int(11) NOT NULL,
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

INSERT INTO `t_gudang_wip` (`id`, `tanggal`, `flag_taken`, `jenis_trx`, `t_hasil_wip_id`, `jenis_barang_id`, `t_spb_wip_id`, `t_spb_wip_detail_id`, `t_bpb_wip_detail_id`, `qty`, `uom`, `berat`, `keterangan`, `created_by`, `created_on`) VALUES
(2, '2019-01-09', 0, 1, 0, 6, 1, 1, 0, 30, 'ROLL', 40, '', 1, '2019-01-09 12:09:58'),
(3, '2019-01-09', 0, 0, 3, 5, 0, 0, 3, 30, 'ROLL', 50, NULL, 1, '2019-01-09 14:20:41'),
(4, '2019-01-09', 0, 0, 2, 6, 0, 0, 2, 35, 'ROLL', 75, NULL, 1, '2019-01-09 14:20:45'),
(7, '2019-01-09', 1, 1, 0, 5, 2, 2, 0, 30, 'ROLL', 50, '', 1, '2019-01-09 14:29:13'),
(8, '2019-01-09', 1, 1, 0, 6, 2, 3, 0, 40, 'ROLL', 80, '', 1, '2019-01-09 14:29:13'),
(9, '2019-01-14', 0, 0, 5, 6, 0, 0, 5, 45, 'ROLL', 50, NULL, 1, '2019-01-14 11:24:16'),
(10, '2019-01-14', 0, 1, 0, 6, 3, 4, 0, 45, 'ROLL', 50, '', 1, '2019-01-14 11:26:11'),
(11, '2019-01-16', 0, 0, 10, 2, 0, 0, 10, 35, 'BATANG', 40, NULL, 1, '2019-01-16 15:46:41'),
(12, '2019-01-17', 0, 0, 6, 2, 0, 0, 6, 80, 'BATANG', 90, NULL, 1, '2019-01-17 10:44:34'),
(13, '2019-01-17', 0, 0, 7, 6, 0, 0, 7, 25, 'ROLL', 30, NULL, 1, '2019-01-17 10:44:37'),
(14, '2019-01-17', 0, 0, 8, 5, 0, 0, 8, 20, 'ROLL', 25, NULL, 1, '2019-01-17 10:44:41'),
(15, '2019-01-17', 0, 0, 9, 2, 0, 0, 9, 28, 'BATANG', 34, NULL, 1, '2019-01-17 10:44:45'),
(16, '2019-01-17', 0, 1, 0, 2, 4, 5, 0, 48, 'BATANG', 55, '', 1, '2019-01-17 10:45:10'),
(17, '2019-01-17', 0, 1, 0, 2, 5, 6, 0, 85, 'BATANG', 90, '', 1, '2019-01-17 14:22:23'),
(18, '2019-01-17', 0, 1, 0, 6, 6, 9, 0, 35, 'ROLL', 45, '', 1, '2019-01-17 15:01:22'),
(20, '2019-01-17', 0, 0, 4, 2, 0, 0, 4, 500, 'BATANG', 500, NULL, 1, '2019-01-17 15:04:27'),
(21, '2019-01-17', 0, 0, 11, 6, 0, 0, 11, 30, 'ROLL', 40, NULL, 1, '2019-01-17 15:04:48'),
(22, '2019-01-17', 0, 0, 12, 6, 0, 0, 12, 70, 'ROLL', 75, NULL, 1, '2019-01-17 15:04:52'),
(23, '2019-01-17', 0, 0, 13, 6, 0, 0, 13, 15, 'ROLL', 15, NULL, 1, '2019-01-17 15:04:55'),
(24, '2019-01-17', 0, 1, 0, 2, 8, 10, 0, 100, 'BATANG', 120, '', 1, '2019-01-17 16:05:08'),
(25, '2019-01-17', 0, 0, 14, 6, 0, 0, 14, 60, 'ROLL', 70, NULL, 1, '2019-01-17 16:06:21'),
(26, '2019-01-17', 0, 1, 0, 2, 9, 11, 0, 50, 'BATANG', 65, '', 1, '2019-01-17 16:58:16'),
(27, '2019-01-17', 0, 0, 15, 6, 0, 0, 15, 30, 'ROLL', 40, NULL, 1, '2019-01-17 17:34:42'),
(28, '2019-01-17', 0, 1, 0, 6, 10, 12, 0, 30, 'ROLL', 40, '', 1, '2019-01-17 17:35:05'),
(29, '2019-01-17', 0, 0, 16, 5, 0, 0, 16, 30, 'ROLL', 35, NULL, 1, '2019-01-17 18:20:01'),
(30, '2019-01-29', 0, 0, 17, 6, 0, 0, 17, 50, 'ROLL', 65, NULL, 1, '2019-01-29 13:24:09'),
(31, '2019-01-29', 0, 1, 0, 6, 12, 15, 0, 75, 'ROLL', 100, '', 1, '2019-01-29 13:26:31'),
(32, '2019-01-29', 0, 0, 18, 5, 0, 0, 18, 30, 'ROLL', 40, NULL, 1, '2019-01-29 13:26:39'),
(33, '2019-01-29', 0, 0, 24, 5, 0, 0, 24, 30, 'ROLL', 40, NULL, 1, '2019-01-29 14:00:41'),
(34, '2019-01-29', 1, 1, 0, 5, 11, 13, 0, 80, 'ROLL', 100, '', 1, '2019-01-29 14:01:06'),
(35, '2019-01-29', 1, 1, 0, 6, 11, 14, 0, 75, 'ROLL', 100, '', 1, '2019-01-29 14:01:06'),
(36, '2019-01-31', 1, 1, 0, 2, 13, 16, 0, 150, 'BATANG', 200, '', 1, '2019-01-31 17:04:08'),
(37, '2019-02-07', 0, 0, 0, 5, 0, 0, 25, 100, 'ROLL', 150, NULL, 1, '2019-02-07 18:55:40'),
(38, '2019-02-07', 0, 0, 0, 2, 0, 0, 26, 75, 'BATANG', 100, NULL, 1, '2019-02-07 18:55:44'),
(39, '2019-02-07', 0, 1, 0, 5, 14, 17, 0, 32, 'ROLL', 32, '', 1, '2019-02-07 18:55:55'),
(40, '2019-02-12', 0, 0, 25, 2, 0, 0, 27, 150, 'BATANG', 223, NULL, 6, '2019-02-12 14:37:48'),
(41, '2019-02-12', 0, 1, 0, 2, 15, 18, 0, 130, 'BATANG', 200, '', 6, '2019-02-12 14:39:25'),
(42, '2019-02-12', 0, 0, 26, 6, 0, 0, 28, 100, 'ROLL', 150, NULL, 6, '2019-02-12 14:53:38'),
(43, '2019-02-12', 0, 1, 0, 6, 16, 19, 0, 80, 'ROLL', 100, '', 6, '2019-02-12 14:53:51'),
(44, '2019-02-12', 0, 0, 27, 6, 0, 0, 29, 20, 'ROLL', 30, NULL, 6, '2019-02-12 15:02:43'),
(45, '2019-02-12', 0, 0, 28, 5, 0, 0, 30, 65, 'ROLL', 80, NULL, 6, '2019-02-12 15:02:47');

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
  `no_spb_rongsok` varchar(255) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `total_rongsok` int(11) NOT NULL,
  `ingot` int(11) NOT NULL,
  `berat_ingot` int(11) NOT NULL,
  `bs` int(11) NOT NULL,
  `susut` int(11) NOT NULL,
  `ampas` int(11) NOT NULL,
  `serbuk` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hasil_masak`
--

INSERT INTO `t_hasil_masak` (`id`, `tanggal`, `mulai`, `selesai`, `kayu`, `gas`, `no_spb_rongsok`, `id_produksi`, `total_rongsok`, `ingot`, `berat_ingot`, `bs`, `susut`, `ampas`, `serbuk`, `created_by`, `modified_at`, `modified_by`, `modified_remarks`) VALUES
(1, '2019-01-15', '09:00:00', '10:00:00', 13, 3, 'SPB.201901.0004', 5, 515, 500, 500, 1, 7, 3, 4, 1, '2019-01-17 11:01:09', 1, 'UPDATE BS'),
(2, '2019-01-15', '10:00:00', '12:00:00', 5, 4, 'SPB.201901.0005', 6, 100, 80, 90, 3, 7, 5, 2, 1, '0000-00-00 00:00:00', 0, ''),
(3, '2019-01-16', '12:00:00', '14:00:00', 4, 3, 'SPB.201901.0006', 7, 46, 28, 34, 3, 4, 2, 3, 1, '2019-01-16 03:01:14', 1, ''),
(4, '2019-01-16', '14:00:00', '16:00:00', 3, 5, 'SPB.201901.0002', 3, 49, 35, 40, 3, 0, 3, 3, 1, '2019-01-16 03:01:56', 1, ''),
(5, '2019-02-12', '09:00:00', '12:00:00', 13, 3, 'PRD.201902.0002', 11, 251, 150, 223, 10, 11, 3, 4, 14, '2019-02-12 02:02:29', 14, 'SALAH BERAT INGOT');

-- --------------------------------------------------------

--
-- Table structure for table `t_hasil_wip`
--

CREATE TABLE `t_hasil_wip` (
  `id` int(11) NOT NULL,
  `no_produksi_wip` varchar(30) NOT NULL,
  `hasil_masak_id` int(11) NOT NULL,
  `t_spb_wip_id` int(11) DEFAULT NULL,
  `jenis_masak` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `susut` int(11) NOT NULL,
  `keras` int(11) NOT NULL,
  `qty_keras` int(11) NOT NULL,
  `bs` int(11) NOT NULL,
  `tali_rolling` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hasil_wip`
--

INSERT INTO `t_hasil_wip` (`id`, `no_produksi_wip`, `hasil_masak_id`, `t_spb_wip_id`, `jenis_masak`, `tanggal`, `jenis_barang_id`, `qty`, `uom`, `berat`, `susut`, `keras`, `qty_keras`, `bs`, `tali_rolling`, `created_by`, `created`) VALUES
(1, 'PRD-WIP.201901.0001', 0, 0, 'ROLLING', '2019-01-09', 6, 45, 'ROLL', 60, 0, 3, 0, 5, 0, 1, '2019-01-09 12:08:48'),
(2, 'PRD-WIP.201901.0002', 0, 0, 'ROLLING', '2019-01-09', 6, 35, 'ROLL', 75, 0, 2, 0, 4, 0, 1, '2019-01-09 14:20:02'),
(3, 'PRD-WIP.201901.0003', 0, 0, 'CUCI', '2019-01-09', 5, 30, 'ROLL', 50, 2, 0, 0, 0, 0, 1, '2019-01-09 14:20:35'),
(4, '', 1, 0, 'INGOT', '2019-01-15', 2, 500, 'BATANG', 500, 0, 0, 0, 0, 0, 1, '2019-01-14 10:51:13'),
(5, 'PRD-WIP.201901.0004', 0, 0, 'ROLLING', '2019-01-14', 6, 45, 'ROLL', 50, 0, 5, 0, 10, 0, 1, '2019-01-14 11:16:31'),
(6, '', 2, 0, 'INGOT', '2019-01-15', 2, 80, 'BATANG', 90, 0, 0, 0, 0, 0, 1, '2019-01-15 15:18:18'),
(7, 'PRD-WIP.201901.0005', 0, 0, 'ROLLING', '2019-01-15', 6, 25, 'ROLL', 30, 0, 5, 0, 5, 0, 1, '2019-01-15 15:19:27'),
(8, 'PRD-WIP.201901.0006', 0, 0, 'CUCI', '2019-01-15', 5, 20, 'ROLL', 25, 3, 0, 0, 0, 0, 1, '2019-01-15 15:19:50'),
(9, '', 3, 0, 'INGOT', '2019-01-16', 2, 28, 'BATANG', 34, 0, 0, 0, 0, 0, 1, '2019-01-16 12:07:12'),
(10, '', 4, 0, 'INGOT', '2019-01-16', 2, 35, 'BATANG', 40, 0, 0, 0, 0, 0, 1, '2019-01-16 15:16:53'),
(11, 'PRD-WIP.201901.0007', 0, 4, 'ROLLING', '2019-01-17', 6, 30, 'ROLL', 40, 0, 15, 10, 2, 3, 1, '2019-01-17 14:20:23'),
(12, 'PRD-WIP.201901.0008', 0, 5, 'ROLLING', '2019-01-17', 6, 70, 'ROLL', 75, 0, 15, 10, 0, 0, 1, '2019-01-17 14:23:13'),
(13, 'PRD-WIP.201901.0009', 0, 0, 'BAKAR ULANG', '2019-01-17', 6, 15, 'ROLL', 15, 0, 10, 5, 2, 0, 1, '2019-01-17 14:59:36'),
(14, 'PRD-WIP.201901.0010', 0, 8, 'ROLLING', '2019-01-17', 6, 60, 'ROLL', 70, 0, 40, 30, 0, 0, 1, '2019-01-17 16:06:04'),
(15, 'PRD-WIP.201901.0011', 0, 0, 'BAKAR ULANG', '2019-01-17', 6, 30, 'ROLL', 40, 0, 0, 0, 0, 0, 1, '2019-01-17 17:34:35'),
(16, 'PRD-WIP.201901.0012', 0, 0, 'CUCI', '2019-01-17', 5, 30, 'ROLL', 35, 2, 0, 0, 1, 0, 1, '2019-01-17 18:19:24'),
(17, 'PRD-WIP.201901.0013', 0, 9, 'ROLLING', '2019-01-29', 6, 50, 'ROLL', 65, 0, 0, 0, 0, 0, 1, '2019-01-29 13:24:01'),
(18, 'PRD-WIP.201901.0014', 0, 0, 'CUCI', '2019-01-29', 5, 30, 'ROLL', 40, 0, 0, 0, 0, 0, 1, '2019-01-29 13:25:40'),
(19, 'PRD-WIP.201901.0015', 0, 0, 'CUCI', '2019-01-29', 5, 30, 'ROLL', 40, 0, 0, 0, 0, 0, 1, '2019-01-29 13:27:18'),
(20, 'PRD-WIP.201901.0016', 0, 0, 'CUCI', '2019-01-29', 5, 30, 'ROLL', 40, 0, 0, 0, 0, 0, 1, '2019-01-29 13:40:57'),
(21, 'PRD-WIP.201901.0017', 0, 0, 'CUCI', '2019-01-29', 5, 30, 'ROLL', 40, 0, 0, 0, 0, 0, 1, '2019-01-29 13:42:48'),
(22, 'PRD-WIP.201901.0018', 0, 0, 'CUCI', '2019-01-29', 5, 30, 'ROLL', 40, 0, 0, 0, 0, 0, 1, '2019-01-29 13:50:54'),
(23, 'PRD-WIP.201901.0019', 0, 0, 'CUCI', '2019-01-29', 5, 30, 'ROLL', 40, 0, 0, 0, 0, 0, 1, '2019-01-29 13:51:33'),
(24, 'PRD-WIP.201901.0020', 0, 10, 'CUCI', '2019-01-29', 5, 30, 'ROLL', 40, 0, 0, 0, 0, 0, 1, '2019-01-29 13:57:02'),
(25, '', 5, NULL, 'INGOT', '2019-02-12', 2, 150, 'BATANG', 223, 0, 0, 0, 0, 0, 14, '2019-02-12 14:03:01'),
(26, 'PRD-WIP.201902.0001', 0, 15, 'ROLLING', '2019-02-12', 6, 100, 'ROLL', 150, 0, 50, 30, 0, 0, 14, '2019-02-12 14:52:49'),
(27, 'PRD-WIP.201902.0002', 0, NULL, 'BAKAR ULANG', '2019-02-12', 6, 20, 'ROLL', 30, 0, 0, 0, 0, 0, 14, '2019-02-12 14:54:21'),
(28, 'PRD-WIP.201902.0003', 0, 16, 'CUCI', '2019-02-12', 5, 65, 'ROLL', 80, 6, 0, 0, 8, 0, 14, '2019-02-12 15:00:44');

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
(1, 'BAN', 'SPARE PART', 26, 26, '2018-12-28 02:12:17', 1, '2019-01-15 01:01:21', 1),
(2, 'BUSI', 'SPARE PART', 40, 40, '2018-12-28 02:12:17', 1, '2018-12-28 02:12:17', 1),
(3, 'ACCU 45 A/ 12 ', 'SPARE PART', 4, 4, '2018-12-28 02:12:07', 1, '2018-12-28 02:12:07', 1),
(4, 'AC SPLIT PANASONIC CSPC 18 NKP 2 P', 'SPARE PART', 8, 8, '2018-12-28 02:12:07', 1, '2018-12-28 02:12:16', 1),
(5, 'ACCU 12 V/200 ', 'SPARE PART', 8, 8, '2018-12-28 02:12:16', 1, '2018-12-28 02:12:16', 1),
(6, 'ACCU 65 A / 12 V', 'SPARE PART', 4, 4, '2019-01-08 01:01:35', 1, '2019-01-08 01:01:35', 1),
(7, 'AIR RADIATOR @ 5 LITE', 'SPARE PART', 6, 6, '2019-01-15 01:01:50', 1, '2019-01-15 01:01:32', 1),
(8, 'BAN DALAM 600*', 'SPARE PART', 20, 20, '2019-01-15 02:01:50', 1, '2019-01-21 07:01:12', 1),
(9, 'BAN DALAM 700*1', 'SPARE PART', 34, 34, '2019-01-15 02:01:10', 1, '2019-01-22 11:01:53', 1),
(10, 'AMPLOP ROY', 'SPARE PART', 6, 6, '2019-02-11 05:02:54', 7, '2019-02-11 05:02:54', 7),
(11, 'PILOT VALV', 'SPARE PART', 10, 10, '2019-02-11 05:02:47', 6, '2019-02-11 05:02:47', 6),
(12, 'CONTROL BEARIN', 'SPARE PART', 15, 15, '2019-02-11 05:02:10', 7, '2019-02-11 05:02:38', 7);

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
(1, 1, '2018-12-28 02:12:17', 25, 25, 0, 0, 'Pembelian spare part'),
(2, 2, '2018-12-28 02:12:17', 40, 40, 0, 0, 'Pembelian spare part'),
(3, 3, '2018-12-28 02:12:07', 4, 4, 0, 0, 'Pembelian spare part'),
(4, 4, '2018-12-28 02:12:07', 4, 4, 0, 0, 'Pembelian spare part'),
(5, 4, '2018-12-28 02:12:16', 4, 4, 0, 0, 'Pembelian spare part'),
(6, 5, '2018-12-28 02:12:16', 8, 8, 0, 0, 'Pembelian spare part'),
(7, 1, '2018-12-28 02:12:31', 0, 0, 8, 8, 'SPB Sparepart'),
(8, 6, '2019-01-08 01:01:35', 4, 4, 0, 0, 'Pembelian spare part'),
(9, 7, '2019-01-15 01:01:50', 4, 4, 0, 0, 'Pembelian spare part'),
(10, 7, '2019-01-15 01:01:32', 2, 2, 0, 0, 'Pembelian spare part'),
(11, 1, '2019-01-15 01:01:21', 9, 9, 0, 0, 'Pembelian spare part'),
(12, 8, '2019-01-15 02:01:50', 10, 10, 0, 0, 'Pembelian spare part'),
(13, 9, '2019-01-15 02:01:10', 8, 8, 0, 0, 'Pembelian spare part'),
(14, 9, '2019-01-15 02:01:16', 4, 4, 0, 0, 'Pembelian spare part'),
(15, 8, '2019-01-21 11:01:45', 5, 5, 0, 0, 'Pembelian spare part'),
(16, 8, '2019-01-21 07:01:12', 5, 5, 0, 0, 'Pembelian spare part'),
(17, 9, '2019-01-22 10:01:43', 10, 10, 0, 0, 'Pembelian spare part'),
(18, 9, '2019-01-22 11:01:53', 12, 12, 0, 0, 'Pembelian spare part'),
(19, 10, '2019-02-11 05:02:54', 6, 6, 0, 0, 'Pembelian spare part'),
(20, 11, '2019-02-11 05:02:47', 10, 10, 0, 0, 'Pembelian spare part'),
(21, 12, '2019-02-11 05:02:10', 10, 10, 0, 0, 'Pembelian spare part'),
(22, 12, '2019-02-11 05:02:38', 5, 5, 0, 0, 'Pembelian spare part');

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
-- Table structure for table `t_sales_order`
--

CREATE TABLE `t_sales_order` (
  `id` int(11) NOT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `so_id` int(50) NOT NULL,
  `no_po` varchar(100) NOT NULL,
  `tgl_po` date NOT NULL,
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

INSERT INTO `t_sales_order` (`id`, `alias`, `so_id`, `no_po`, `tgl_po`, `no_spb`, `jenis_barang`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(2, 'TRADECONIN', 3, 'PO-TRADECO.021931', '0000-00-00', 3, 'FG', '2019-01-04 01:01:55', 1, '2019-01-04 01:01:55', 1),
(3, 'ATLASTIAN', 4, 'PO-WIP-ATLAS.1234', '0000-00-00', 2, 'WIP', '2019-01-09 02:01:39', 1, '2019-01-09 02:01:39', 1),
(4, 'TRADECONIN', 5, 'PO-TRADECO.021931', '0000-00-00', 5, 'RONGSOK', '2019-01-10 04:01:51', 1, '2019-01-10 04:01:51', 1),
(5, 'ARKABEL', 6, 'PO-01112018.0003', '0000-00-00', 4, 'FG', '2019-01-14 01:01:46', 1, '2019-01-14 01:01:46', 1),
(6, 'ARIES', 7, 'PO-201901.0011', '0000-00-00', 5, 'FG', '2019-01-15 10:01:42', 1, '2019-01-15 10:01:42', 1),
(7, 'ATLASTIAN', 8, 'PO-WIP-ATLAS.12345', '0000-00-00', 6, 'FG', '2019-01-15 11:01:29', 1, '2019-01-15 11:01:29', 1),
(8, 'ARKABEL', 9, 'PO-00989904', '0000-00-00', 7, 'FG', '2019-01-15 03:01:13', 1, '2019-01-15 03:01:13', 1),
(9, 'ARKABEL', 11, 'PO-01112018.0005', '2019-01-20', 8, 'FG', '2019-01-22 04:01:35', 1, '2019-01-22 04:01:35', 1),
(14, NULL, 17, 'PO-TRADECO.021934', '2019-01-26', 14, 'FG', '2019-01-23 02:01:24', 1, '2019-01-23 02:01:24', 1),
(15, 'ATLASTIAN', 18, 'PO-ATLANTIK.0010', '2019-01-28', 9, 'RONGSOK', '2019-01-28 04:01:25', 1, '2019-01-28 04:01:25', 1),
(16, 'ALCAR', 19, 'PO-RSK.ALCAR.0001', '0000-00-00', 10, 'RONGSOK', '2019-01-29 10:01:13', 1, '2019-01-29 10:01:13', 1),
(17, 'ACM', 20, 'PO-WIP.ACM.0001', '1970-01-24', 11, 'WIP', '2019-01-29 01:01:34', 1, '2019-02-06 02:02:02', 1),
(18, 'BERDIRI', 21, 'PO-FG.BKDR.0001', '0000-00-00', 15, 'FG', '2019-01-29 02:01:22', 1, '2019-01-29 02:01:22', 1),
(19, 'TRADECONIN', 22, 'PO-TRADECO.05462', '0000-00-00', 16, 'FG', '2019-01-29 07:01:55', 1, '2019-01-29 07:01:55', 1),
(20, 'ARKABEL', 23, 'PO94549027', '2019-02-11', 24, 'FG', '2019-02-11 03:02:15', 8, '2019-02-13 05:02:10', 8),
(21, 'HEYSIANG', 24, 'POTAK.0135701', '2019-02-13', 19, 'WIP', '2019-02-13 05:02:43', 8, '2019-02-13 05:02:07', 8);

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
(3, 2, 3, 409, 1, 0, 200, 130000, 26000000),
(4, 2, 4, 450, 0, 0, 80, 100000, 8000000),
(5, 3, 2, 5, 30, 0, 50, 56000, 2800000),
(6, 3, 3, 6, 40, 0, 80, 100000, 8000000),
(7, 4, 7, 9, 45, 0, 0, 78000, 3510000),
(8, 4, 8, 10, 100, 0, 0, 92000, 9200000),
(9, 4, 9, 17, 150, 0, 0, 103000, 15450000),
(10, 4, 10, 18, 200, 0, 0, 103000, 20600000),
(11, 5, 5, 11, 1, 0, 50, 35000, 1750000),
(12, 5, 6, 174, 0, 0, 100, 45000, 4500000),
(13, 6, 7, 455, 1, 0, 50, 14000, 700000),
(14, 6, 8, 457, 0, 0, 75, 20000, 1500000),
(15, 7, 9, 409, 1, 0, 50, 50000, 2500000),
(16, 8, 10, 401, 1, 0, 55, 70000, 3850000),
(17, 9, 11, 409, 1, 0, 75, 120000, 9000000),
(18, 15, 19, 9, 100, 0, 0, 150000, 15000000),
(19, 15, 20, 10, 100, 0, 0, 112000, 11200000),
(22, 16, 23, 49, 200, 0, 0, 90000, 18000000),
(23, 16, 24, 48, 200, 0, 0, 85000, 17000000),
(27, 17, 13, 5, 80, 0, 100, 380000, 38000000),
(28, 17, 14, 6, 75, 0, 100, 290000, 29000000),
(29, 18, 16, 450, 1, 0, 100, 608500, 60850000),
(30, 18, 17, 455, 0, 0, 100, 950500, 95050000),
(32, 18, 19, 457, 0, 0, 100, 1130500, 113050000),
(33, 19, 20, 153, 1, 0, 50, 705000, 35250000),
(34, 19, 21, 154, 0, 0, 50, 890000, 44500000),
(35, 20, 31, 149, 1, 0, 100, 700000, 70000000),
(36, 21, 22, 2, 200, 0, 300, 100000, 30000000);

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_ampas`
--

CREATE TABLE `t_spb_ampas` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_spb_ampas` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `keterangan` text,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `received_by` int(11) DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `reject_remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_fg`
--

CREATE TABLE `t_spb_fg` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_spb` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `flag_tolling` int(1) NOT NULL,
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

INSERT INTO `t_spb_fg` (`id`, `tanggal`, `no_spb`, `status`, `flag_tolling`, `keterangan`, `created_by`, `created_at`, `modified_by`, `modified_at`, `approved_by`, `approved_at`, `rejected_by`, `rejected_at`, `received_by`, `received_at`, `reject_remarks`) VALUES
(3, '2019-01-04', 'SPB-FG2019010003', 1, 0, 'SALES ORDER FINISH GOOD', 1, '2019-01-04 01:01:55', NULL, NULL, 1, '2019-01-08 04:01:02', NULL, NULL, NULL, NULL, NULL),
(4, '2019-01-14', 'SPB-FG2019010004', 1, 0, 'SALES ORDER FINISH GOOD', 1, '2019-01-14 01:01:46', NULL, NULL, 1, '2019-01-14 02:01:45', NULL, NULL, NULL, NULL, NULL),
(5, '2019-01-15', 'SPB-FG2019010005', 1, 0, 'SALES ORDER FINISH GOOD', 1, '2019-01-15 10:01:42', NULL, NULL, 1, '2019-01-15 10:01:39', NULL, NULL, NULL, NULL, NULL),
(6, '2019-01-15', 'SPB-FG2019010006', 1, 0, 'SALES ORDER FINISH GOOD', 1, '2019-01-15 11:01:29', NULL, NULL, 1, '2019-01-15 11:01:18', NULL, NULL, NULL, NULL, NULL),
(7, '2019-01-15', 'SPB-FG2019010007', 1, 0, 'SALES ORDER FINISH GOOD', 1, '2019-01-15 03:01:13', NULL, NULL, 1, '2019-01-15 03:01:54', NULL, NULL, NULL, NULL, NULL),
(8, '2019-01-22', 'SPB-FG2019010008', 1, 0, 'SALES ORDER FINISH GOOD', 1, '2019-01-22 04:01:35', NULL, NULL, 1, '2019-01-23 09:01:51', NULL, NULL, NULL, NULL, NULL),
(14, '2019-01-23', 'SPB-FG2019010014', 1, 0, 'TOLLING SO FINISH GOOD', 1, '2019-01-23 02:01:24', NULL, NULL, 1, '2019-01-23 07:01:30', NULL, NULL, NULL, NULL, NULL),
(15, '2019-01-29', 'SPB-FG2019010015', 1, 0, 'SALES ORDER FINISH GOOD', 1, '2019-01-29 02:01:22', NULL, NULL, 1, '2019-01-29 04:01:59', NULL, NULL, NULL, NULL, NULL),
(16, '2019-01-29', 'SPB-FG2019010016', 1, 0, 'SALES ORDER FINISH GOOD', 1, '2019-01-29 07:01:55', NULL, NULL, 1, '2019-01-30 02:01:48', NULL, NULL, NULL, NULL, NULL),
(17, '2019-01-31', 'SPB-FGT.201901.0001', 1, 2, 'TOLLING FG', 1, '2019-01-31 05:01:29', 1, '2019-01-31 05:01:38', 1, '2019-01-31 05:01:18', NULL, NULL, NULL, NULL, NULL),
(22, '2019-02-06', 'SPB-FGR.201902.0002', 1, 0, 'BARANG FG TRANSFER KE RONGSOK', 1, '2019-02-06 04:02:08', NULL, NULL, 1, '2019-02-06 04:02:26', NULL, NULL, NULL, NULL, NULL),
(23, '2019-02-06', 'SPB-FG2019020004', 1, 0, 'RETUR FINISHGOOD', 1, '2019-02-06 05:02:33', NULL, NULL, 1, '2019-02-06 05:02:18', NULL, NULL, NULL, NULL, NULL),
(24, '2019-02-11', 'SPB-FG2019020005', 0, 0, 'TOLLING SO FINISH GOOD', 8, '2019-02-11 03:02:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(3, '2019-01-04', 3, 409, 'KG', 200, 'SALES ORDER'),
(4, '2019-01-04', 3, 450, 'KG', 80, 'SALES ORDER'),
(5, '2019-01-14', 4, 11, 'KG', 50, 'SALES ORDER'),
(6, '2019-01-14', 4, 174, 'KG', 100, 'SALES ORDER'),
(7, '2019-01-15', 5, 455, 'KG', 50, 'SALES ORDER'),
(8, '2019-01-15', 5, 457, 'KG', 75, 'SALES ORDER'),
(9, '2019-01-15', 6, 409, 'KG', 50, 'SALES ORDER'),
(10, '2019-01-15', 7, 401, 'KG', 55, 'SALES ORDER'),
(11, '2019-01-22', 8, 409, 'KG', 75, 'SALES ORDER'),
(14, '2019-01-23', 14, 450, 'KG', 150, 'SO TOLLING'),
(15, '2019-01-23', 14, 400, 'KG', 50, 'SO TOLLING'),
(16, '2019-01-29', 15, 450, 'KG', 100, 'SALES ORDER'),
(17, '2019-01-29', 15, 455, 'KG', 100, 'SALES ORDER'),
(19, '2019-01-29', 15, 457, 'KG', 100, 'SALES ORDER'),
(20, '2019-01-29', 16, 153, 'KG', 50, 'SALES ORDER'),
(21, '2019-01-29', 16, 154, 'KG', 50, 'SALES ORDER'),
(22, '2019-01-31', 17, 427, 'KG', 150, 'KIRIM FG KE TOLLING'),
(27, '2019-02-06', 22, 457, 'KG', 24, ''),
(28, '2019-02-06', 23, 457, 'KG', 28, ''),
(29, '2019-02-11', 24, 400, 'KG', 150, 'SO TOLLING'),
(30, '2019-02-11', 24, 424, 'KG', 200, 'SO TOLLING'),
(31, '2019-02-13', 24, 149, 'KG', 100, 'SALES ORDER');

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
(1, '2018-12-28', 'SPB-SP.201812.0001', 1, 'MINTA BAN', '', 1, '2018-12-28 02:12:50', NULL, NULL, 1, '2018-12-28 02:12:31', 0, NULL, 0, NULL, NULL);

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
(1, 1, '2018-12-28', 1, 8, 'BUAH', 'BAN SEREP');

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
(1, 1, 1, 8, 'BUAH', 'PEMENUHAN');

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_wip`
--

CREATE TABLE `t_spb_wip` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_spb_wip` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `flag_produksi` int(2) NOT NULL,
  `flag_tolling` int(1) NOT NULL,
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

INSERT INTO `t_spb_wip` (`id`, `tanggal`, `no_spb_wip`, `status`, `flag_produksi`, `flag_tolling`, `keterangan`, `created_by`, `created`, `modified_by`, `modified_date`, `approved_by`, `approved_at`, `received_by`, `received_at`, `rejected_by`, `rejected_at`, `reject_remarks`) VALUES
(1, '2019-01-09', 'SPB-WIP.201901.0001', 1, 0, 0, '', 1, '2019-01-09 12:01:08', 1, '2019-01-09 12:01:43', 1, '2019-01-09 12:01:58', 0, NULL, 0, NULL, NULL),
(2, '2019-01-09', 'SPB-WIP.201901.0002', 1, 0, 0, 'SALES ORDER WIP', 1, '2019-01-09 02:01:39', NULL, NULL, 1, '2019-01-09 02:01:13', 0, NULL, 0, NULL, NULL),
(3, '2019-01-14', 'SPB-WIP.201901.0003', 1, 0, 0, '', 1, '2019-01-14 11:01:29', 1, '2019-01-14 11:01:47', 1, '2019-01-14 11:01:11', 0, NULL, 0, NULL, NULL),
(4, '2019-01-17', 'SPB-WIP.201901.0004', 1, 1, 0, 'UNTUK PRODUKSI ROLLING', 1, '2019-01-17 10:01:09', 1, '2019-01-17 10:01:21', 1, '2019-01-17 10:01:10', 0, NULL, 0, NULL, NULL),
(5, '2019-01-17', 'SPB-WIP.201901.0005', 1, 1, 0, '', 1, '2019-01-17 01:01:39', 1, '2019-01-17 01:01:13', 1, '2019-01-17 02:01:23', 0, NULL, 0, NULL, NULL),
(6, '2019-01-17', 'SPB-WIP.201901.0006', 1, 0, 0, '', 1, '2019-01-17 03:01:37', 1, '2019-01-17 03:01:06', 1, '2019-01-17 03:01:22', 0, NULL, 0, NULL, NULL),
(8, '2019-01-17', 'SPB-WIP.201901.0008', 1, 1, 0, '', 1, '2019-01-17 03:01:15', 1, '2019-01-17 04:01:59', 1, '2019-01-17 04:01:08', 0, NULL, 0, NULL, NULL),
(9, '2019-01-17', 'SPB-WIP.201901.0009', 1, 1, 0, '', 1, '2019-01-17 04:01:01', 1, '2019-01-17 04:01:07', 1, '2019-01-17 04:01:16', 0, NULL, 0, NULL, NULL),
(10, '2019-01-17', 'SPB-WIP.201901.0010', 1, 1, 0, '', 1, '2019-01-17 05:01:48', 1, '2019-01-17 05:01:54', 1, '2019-01-17 05:01:05', 0, NULL, 0, NULL, NULL),
(11, '2019-01-29', 'SPB-WIP.201901.0011', 1, 0, 0, 'SALES ORDER WIP', 1, '2019-01-29 01:01:34', NULL, NULL, 1, '2019-01-29 02:01:06', 0, NULL, 0, NULL, NULL),
(12, '2019-01-29', 'SPB-WIP.201901.0012', 1, 3, 0, '', 1, '2019-01-29 01:01:01', 1, '2019-01-29 01:01:17', 1, '2019-01-29 01:01:31', 0, NULL, 0, NULL, NULL),
(13, '2019-01-31', 'SPB-WIPT.201901.0003', 1, 4, 2, 'WIP UNTUK TOLLING', 1, '2019-01-31 05:01:13', 1, '2019-01-31 05:01:57', 1, '2019-01-31 05:01:08', 0, NULL, 0, NULL, NULL),
(14, '2019-02-07', 'SPB-WIP.201902.0001', 1, 0, 0, 'BARANG WIP TRANSFER KE RONGSOK', 1, '2019-02-07 06:02:10', NULL, NULL, 1, '2019-02-07 06:02:55', 0, NULL, 0, NULL, NULL),
(15, '2019-02-12', 'SPB-WIP.201902.0002', 1, 1, 0, '', 14, '2019-02-12 02:02:01', 14, '2019-02-12 02:02:19', 6, '2019-02-12 02:02:25', 0, NULL, 0, NULL, NULL),
(16, '2019-02-12', 'SPB-WIP.201902.0003', 1, 1, 0, '', 14, '2019-02-12 02:02:11', 14, '2019-02-12 02:02:22', 6, '2019-02-12 02:02:51', 0, NULL, 0, NULL, NULL),
(18, '2019-02-12', 'SPB-WIP.201902.0005', 0, 5, 0, '', 1, '2019-02-12 03:02:05', 1, '2019-02-12 05:02:59', 0, NULL, 0, NULL, 0, NULL, NULL),
(19, '2019-02-13', 'SPB-WIP.201902.0006', 0, 0, 0, 'SALES ORDER WIP', 8, '2019-02-13 05:02:43', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL);

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
(1, 1, '2019-01-09', 6, 30, 'ROLL', 40, ''),
(2, 2, '2019-01-09', 5, 30, 'ROLL', 50, 'SALES ORDER'),
(3, 2, '2019-01-09', 6, 40, 'ROLL', 80, 'SALES ORDER'),
(4, 3, '2019-01-14', 6, 45, 'ROLL', 50, ''),
(5, 4, '2019-01-17', 2, 48, 'BATANG', 55, ''),
(6, 5, '2019-01-17', 2, 85, 'BATANG', 90, ''),
(9, 6, '2019-01-17', 6, 35, 'ROLL', 45, ''),
(10, 8, '2019-01-17', 2, 100, 'BATANG', 120, ''),
(11, 9, '2019-01-17', 2, 50, 'BATANG', 65, ''),
(12, 10, '2019-01-17', 6, 30, 'ROLL', 40, ''),
(13, 11, '2019-01-29', 5, 80, 'ROLL', 100, 'SALES ORDER'),
(14, 11, '2019-01-29', 6, 75, 'ROLL', 100, 'SALES ORDER'),
(15, 12, '2019-01-29', 6, 75, 'ROLL', 100, ''),
(16, 13, '2019-01-31', 2, 150, 'BATANG', 200, 'KIRIM INGOT KE TOLLING'),
(17, 14, '2019-02-07', 5, 32, 'ROLL', 32, '32'),
(18, 15, '2019-02-12', 2, 130, 'BATANG', 200, ''),
(19, 16, '2019-02-12', 6, 80, 'ROLL', 100, ''),
(20, 18, '2019-02-12', 2, 50, 'BATANG', 80, ''),
(21, 18, '2019-02-12', 2, 60, 'BATANG', 70, ''),
(22, 19, '2019-02-13', 2, 200, 'BATANG', 300, 'SALES ORDER');

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_jalan`
--

CREATE TABLE `t_surat_jalan` (
  `id` int(11) NOT NULL,
  `no_surat_jalan` varchar(50) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `spb_id` int(11) NOT NULL,
  `retur_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `m_customer_id` int(11) NOT NULL,
  `m_type_kendaraan_id` int(11) NOT NULL,
  `no_kendaraan` varchar(12) DEFAULT NULL,
  `supir` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `approved_by` int(11) NOT NULL,
  `approved_at` datetime NOT NULL,
  `rejected_at` datetime NOT NULL,
  `rejected_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_surat_jalan`
--

INSERT INTO `t_surat_jalan` (`id`, `no_surat_jalan`, `sales_order_id`, `po_id`, `spb_id`, `retur_id`, `status`, `tanggal`, `jenis_barang`, `m_customer_id`, `m_type_kendaraan_id`, `no_kendaraan`, `supir`, `remarks`, `created_at`, `created_by`, `approved_by`, `approved_at`, `rejected_at`, `rejected_by`, `modified_at`, `modified_by`) VALUES
(3, 'SJ.201901.0003', 3, 0, 0, 0, 1, '2019-01-09', 'FG', 3, 4, '', 'BELO', 'TEST ALIAS', '2019-01-09 01:01:08', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-09 01:01:35', 1),
(4, 'SJ.201901.0004', 4, 0, 0, 0, 1, '2019-01-09', 'WIP', 6, 4, '', 'BELOWIP', 'TEST WIP', '2019-01-09 02:01:16', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-09 02:01:17', 1),
(5, 'SJ.201901.0005', 3, 0, 0, 0, 1, '2019-01-10', 'FG', 3, 6, '', 'BELO', '', '2019-01-10 04:01:23', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-10 04:01:30', 1),
(6, 'SJ.201901.0006', 5, 0, 0, 0, 1, '2019-01-10', 'RONGSOK', 3, 5, '', 'KIIAI', '', '2019-01-10 05:01:49', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-10 06:01:30', 1),
(7, 'SJ.201901.0007', 5, 0, 0, 0, 1, '2019-01-10', 'RONGSOK', 3, 6, '', 'BELO', '', '2019-01-10 06:01:44', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-10 06:01:59', 1),
(8, 'SJ.201901.0008', 6, 0, 0, 0, 1, '2019-01-14', 'FG', 4, 2, '', 'JOHN', '', '2019-01-14 02:01:05', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-14 02:01:59', 1),
(9, 'SJ.201901.0009', 6, 0, 0, 0, 1, '2019-01-14', 'FG', 4, 1, '', 'MICHAEL', '', '2019-01-14 02:01:15', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-14 02:01:12', 1),
(10, 'SJ.201901.0010', 7, 0, 0, 0, 1, '2019-01-15', 'FG', 5, 5, '', 'BELO', 'TEST', '2019-01-15 10:01:57', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-15 11:01:20', 1),
(11, 'SJ.201901.0011', 7, 0, 0, 0, 0, '2019-01-15', 'FG', 5, 5, '', 'MICHAEL', '', '2019-01-15 11:01:55', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-15 11:01:17', 1),
(12, 'SJ.201901.0012', 9, 0, 0, 0, 1, '2019-01-15', 'FG', 5, 1, '', 'BELO', '', '2019-01-15 03:01:23', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-15 03:01:49', 1),
(13, 'SJ.201901.0013', 8, 0, 0, 0, 1, '2019-01-21', 'FG', 6, 4, 'BE 1938 NE', 'BELO', '', '2019-01-21 11:01:37', 1, 1, '2019-01-21 11:01:59', '0000-00-00 00:00:00', 0, '2019-01-21 11:01:36', 1),
(14, 'SJ.201901.0014', 17, 0, 0, 0, 1, '2019-01-23', 'FG', 3, 4, 'BE 1956 NE', 'BELO', 'TOLLING', '2019-01-23 08:01:19', 1, 1, '2019-01-23 09:01:07', '0000-00-00 00:00:00', 0, '2019-01-23 09:01:21', 1),
(15, 'SJ.201901.0015', 11, 0, 0, 0, 0, '2019-01-23', 'FG', 5, 1, 'BE 1958 NE', 'MICHAEL', '', '2019-01-23 09:01:06', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-01-23 09:01:53', 1),
(16, 'SJ.201901.0016', 17, 0, 0, 0, 1, '2019-01-23', 'FG', 3, 4, 'BE 1960 NE', 'BEEJY', '', '2019-01-23 09:01:49', 1, 1, '2019-01-23 09:01:39', '0000-00-00 00:00:00', 0, '2019-01-23 09:01:11', 1),
(18, 'SJ.201901.0018', 18, 0, 0, 0, 1, '2019-01-29', 'RONGSOK', 6, 4, 'BE 1960 NE', 'MICHAEL', 'SJ RSK', '2019-01-29 01:01:47', 1, 1, '2019-01-29 01:01:27', '0000-00-00 00:00:00', 0, '2019-01-29 01:01:02', 1),
(19, 'SJ.201901.0019', 20, 0, 0, 0, 1, '2019-01-29', 'WIP', 15, 4, 'BE 8924 NE', 'MICHAEL', 'SJ WIP', '2019-01-29 02:01:31', 1, 1, '2019-01-29 02:01:32', '0000-00-00 00:00:00', 0, '2019-01-29 02:01:41', 1),
(20, 'SJ.201901.0020', 21, 0, 0, 0, 1, '2019-01-29', 'FG', 26, 4, 'BE 1960 NE', 'BELLO', 'TEST SPB BELUM DIPENUHI SEMUA', '2019-01-29 03:01:59', 1, 1, '2019-01-29 04:01:19', '0000-00-00 00:00:00', 0, '2019-01-29 03:01:26', 1),
(21, 'SJ.201901.0021', 21, 0, 0, 0, 1, '2019-01-29', 'FG', 26, 4, 'BE 1938 NE', 'MICHAEL', '', '2019-01-29 04:01:38', 1, 1, '2019-01-29 04:01:09', '0000-00-00 00:00:00', 0, '2019-01-29 04:01:59', 1),
(22, 'SJ.201901.0023', 22, 0, 0, 0, 1, '2019-01-30', 'FG', 3, 4, 'BE 1960 NE', 'MICHAEL', 'SPB BELUM DIPENUHI SEMUA', '2019-01-30 12:01:45', 1, 1, '2019-01-30 02:01:25', '0000-00-00 00:00:00', 0, '2019-01-30 01:01:50', 1),
(23, 'SJ.201901.0024', 22, 0, 0, 0, 1, '2019-02-01', 'FG', 3, 1, 'BE 1938 NE', 'BELLO', '', '2019-01-30 02:01:02', 1, 1, '2019-01-30 02:01:15', '0000-00-00 00:00:00', 0, '2019-02-01 05:02:02', 1),
(25, 'SJ-T.201902.0001', 0, 0, 17, 0, 1, '2019-02-01', 'FG', 3, 4, 'BE 1960 NE', 'MICHAEL', '', '2019-02-01 03:02:15', 1, 1, '2019-02-01 03:02:24', '0000-00-00 00:00:00', 0, '2019-02-01 03:02:45', 1),
(26, 'SJ-T.201902.0002', 0, 0, 13, 0, 1, '2019-02-01', 'WIP', 3, 1, 'BE 8924 NE', 'BELLO', 'WIP TEST', '2019-02-01 03:02:26', 1, 1, '2019-02-01 03:02:23', '0000-00-00 00:00:00', 0, '2019-02-01 03:02:54', 1),
(27, 'SJ-T.201902.0003', 0, 0, 13, 0, 1, '2019-02-01', 'RONGSOK', 3, 1, 'BE 1960 NE', 'BELLO', '', '2019-02-01 03:02:10', 1, 1, '2019-02-01 03:05:23', '0000-00-00 00:00:00', 0, '2019-02-01 04:02:28', 1),
(28, 'SJ-T.201902.0004', 0, 23, 13, 0, 1, '2019-02-01', 'RONGSOK', 3, 1, 'BE 1960 NE', 'MICHAEL', '', '2019-02-01 04:02:18', 1, 1, '2019-02-01 04:02:57', '0000-00-00 00:00:00', 0, '2019-02-01 04:02:54', 1),
(29, 'SJ-T.201902.0005', 0, 23, 14, 0, 1, '2019-02-01', 'RONGSOK', 3, 1, 'BE 1938 NE', 'BELLO', '', '2019-02-01 05:02:34', 1, 1, '2019-02-01 05:02:02', '0000-00-00 00:00:00', 0, '2019-02-01 05:02:35', 1),
(30, 'SJ.201902.0003', 0, 0, 0, 2, 0, '2019-02-06', 'RETUR', 5, 1, 'BE 1960 NE', 'MICHAEL', '', '2019-02-06 05:02:31', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'SJ.201902.0004', 11, 0, 0, 0, 1, '2019-02-13', 'FG', 5, 1, 'BE 1960 NE', 'MICHAEL', '', '2019-02-13 05:02:45', 16, 16, '2019-02-13 05:02:14', '0000-00-00 00:00:00', 0, '2019-02-13 05:02:13', 16);

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_jalan_detail`
--

CREATE TABLE `t_surat_jalan_detail` (
  `id` int(11) NOT NULL,
  `t_sj_id` int(11) NOT NULL,
  `gudang_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `jenis_barang_alias` int(11) NOT NULL,
  `no_packing` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `bruto` int(11) NOT NULL,
  `netto` float NOT NULL,
  `netto_r` float NOT NULL,
  `nomor_bobbin` varchar(30) NOT NULL,
  `line_remarks` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_surat_jalan_detail`
--

INSERT INTO `t_surat_jalan_detail` (`id`, `t_sj_id`, `gudang_id`, `jenis_barang_id`, `jenis_barang_alias`, `no_packing`, `qty`, `bruto`, `netto`, `netto_r`, `nomor_bobbin`, `line_remarks`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(3, 3, 0, 409, 0, '190108L0013', 1, 140, 132, 128, 'L0013', '', 1, '2019-01-09', 1, '2019-01-09 06:01:14'),
(4, 3, 0, 400, 409, '190103L0014', 1, 80, 63, 60, 'L0014', '', 1, '2019-01-09', 1, '2019-01-09 06:01:14'),
(5, 4, 0, 5, 0, '0', 30, 0, 50, 0, '0', '', 1, '2019-01-09', 0, '0000-00-00 00:00:00'),
(6, 4, 0, 6, 0, '0', 40, 0, 80, 0, '0', '', 1, '2019-01-09', 0, '0000-00-00 00:00:00'),
(7, 5, 0, 424, 450, '190103M0009', 1, 48, 35.068, 0, 'M0009', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(8, 5, 0, 450, 0, '190108R1234', 1, 0, 24, 0, '', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(9, 5, 0, 450, 0, '190108R1237', 1, 0, 33, 0, '', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(10, 6, 0, 9, 0, '10011917407DGT', 0, 30, 22, 0, '0', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(11, 6, 0, 9, 0, '100119165721ZUU', 0, 38, 30, 0, '0', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(12, 6, 0, 10, 0, '100119165735UGA', 0, 88, 76, 0, '0', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(13, 6, 0, 10, 0, '100119174045RSN', 0, 32, 26, 0, '0', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(14, 7, 0, 17, 0, '100119165751ZJV', 0, 59, 50, 0, '0', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(15, 7, 0, 17, 0, '100119171216ZIR', 0, 61, 55, 0, '0', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(16, 7, 0, 17, 0, '100119174057RUY', 0, 65, 53, 0, '0', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(17, 7, 0, 18, 0, '10011916584EQO', 0, 113, 101, 0, '0', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(18, 7, 0, 18, 0, '100119165850TAI', 0, 115, 103, 0, '0', '', 1, '2019-01-10', 0, '0000-00-00 00:00:00'),
(19, 8, 0, 429, 11, '190114P0001', 1, 56, 56, 0, 'P0001', '', 1, '2019-01-14', 0, '0000-00-00 00:00:00'),
(20, 9, 0, 166, 174, '190114M0002', 1, 56, 50.45, 0, 'M0002', '', 1, '2019-01-14', 0, '0000-00-00 00:00:00'),
(21, 9, 0, 174, 0, '190114M0003', 1, 58, 52.42, 0, 'M0003', '', 1, '2019-01-14', 0, '0000-00-00 00:00:00'),
(22, 10, 0, 429, 455, '190115M0005', 1, 55, 50.5, 0, 'M0005', '', 1, '2019-01-15', 0, '0000-00-00 00:00:00'),
(23, 10, 0, 431, 457, '190115M0007', 1, 30, 27.5, 0, 'M0007', '', 1, '2019-01-15', 0, '0000-00-00 00:00:00'),
(24, 11, 0, 457, 0, '190115M0006', 1, 55, 51.5, 0, 'M0006', '', 1, '2019-01-15', 0, '0000-00-00 00:00:00'),
(25, 12, 0, 401, 0, '190115M0010', 1, 65, 57.44, 0, 'M0010', '', 1, '2019-01-15', 0, '0000-00-00 00:00:00'),
(26, 13, 23, 400, 409, '190115M0008', 1, 55, 51.2, 0, 'M0008', '', 1, '2019-01-21', 0, '0000-00-00 00:00:00'),
(27, 14, 25, 400, 0, '190123M0004', 1, 58, 52.4, 0, 'M0004', '', 1, '2019-01-23', 0, '0000-00-00 00:00:00'),
(28, 15, 5, 409, 0, '190103L0008', 1, 87, 75, 0, 'L0008', '', 1, '2019-01-23', 0, '0000-00-00 00:00:00'),
(29, 16, 7, 450, 0, '190107R0001', 1, 54, 54, 0, 'R0001', '', 1, '2019-01-23', 0, '0000-00-00 00:00:00'),
(30, 18, 32, 9, 0, '140119104256EEY', 0, 112, 100, 0, '0', '', 1, '2019-01-29', 0, '0000-00-00 00:00:00'),
(31, 18, 33, 10, 0, '14011910433JZI', 0, 111, 100, 0, '0', '', 1, '2019-01-29', 0, '0000-00-00 00:00:00'),
(32, 19, 34, 5, 0, '0', 80, 0, 100, 0, '0', '', 1, '2019-01-29', 0, '0000-00-00 00:00:00'),
(33, 19, 35, 6, 0, '0', 75, 0, 100, 0, '0', '', 1, '2019-01-29', 0, '0000-00-00 00:00:00'),
(34, 20, 19, 424, 450, '190114M0001', 1, 58, 52.04, 0, 'M0001', '', 1, '2019-01-29', 0, '0000-00-00 00:00:00'),
(35, 20, 8, 450, 0, '190107R0002', 1, 54, 54, 0, 'R0002', '', 1, '2019-01-29', 0, '0000-00-00 00:00:00'),
(36, 21, 26, 429, 455, '190129L0013', 1, 118, 110.12, 0, 'L0013', '', 1, '2019-01-29', 0, '0000-00-00 00:00:00'),
(37, 21, 27, 431, 457, '190129M0004', 1, 56, 50.4, 0, 'M0004', '', 1, '2019-01-29', 0, '0000-00-00 00:00:00'),
(38, 21, 28, 431, 457, '190129M0009', 1, 68, 55.068, 0, 'M0009', '', 1, '2019-01-29', 0, '0000-00-00 00:00:00'),
(39, 22, 29, 153, 0, '190129M0011', 1, 58, 52.04, 0, 'M0011', '', 1, '2019-01-30', 0, '0000-00-00 00:00:00'),
(40, 23, 30, 154, 0, '190129M0005', 1, 60, 55.5, 0, 'M0005', '', 1, '2019-01-30', 0, '0000-00-00 00:00:00'),
(43, 25, 31, 427, 0, '190131L0013', 1, 160, 152.12, 0, 'L0013', 'TEST ID GUDANG', 1, '2019-02-01', 0, '0000-00-00 00:00:00'),
(44, 26, 36, 2, 0, '0', 150, 0, 200, 0, '0', 'TSETS', 1, '2019-02-01', 0, '0000-00-00 00:00:00'),
(45, 27, 34, 48, 0, '140119104312LBI', 0, 108, 100, 0, '0', '', 1, '2019-02-01', 0, '0000-00-00 00:00:00'),
(46, 28, 53, 49, 0, '220119162352KKG', 0, 58, 46, 0, '0', '', 1, '2019-02-01', 0, '0000-00-00 00:00:00'),
(48, 29, 16, 48, 0, '07011918159QZA', 0, 50, 46, 0, '0', '', 1, '2019-02-01', 0, '0000-00-00 00:00:00'),
(49, 30, 0, 457, 0, '190206S0001', 1, 30, 27.67, 0, 'S0001', '', 1, '2019-02-06', 0, '0000-00-00 00:00:00'),
(50, 31, 5, 409, 0, '190103L0008', 1, 87, 75, 0, 'L0008', '', 16, '2019-02-13', 0, '0000-00-00 00:00:00');

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
(2, 'atry', 'ATRIANTI', 'YXRyeTE4', 1, 1, '', 1, '2017-10-01 09:10:23', 1, '2019-02-08 05:02:33', 1),
(3, 'pembelian', 'PEMBELIAN', 'cGVtYmVsaWFu', 3, 1, '', 0, '2018-04-16 10:04:17', 1, '2018-04-16 10:04:17', 1),
(4, 'finance', 'FINANCE', 'ZmluYW5jZQ==', 4, 1, '', 0, '2018-04-16 10:04:39', 1, '2018-04-16 10:04:39', 1),
(5, 'timbangan', 'TIMBANGAN', 'dGltYmFuZ2Fu', 5, 1, '', 0, '2018-04-16 10:04:59', 1, '2018-04-16 10:04:59', 1),
(6, 'gudang', 'GUDANG', 'Z3VkYW5n', 6, 1, '', 0, '2018-04-16 10:04:20', 1, '2018-04-16 10:04:20', 1),
(7, 'procurement', 'PROCUREMENT', 'cHJvY3VyZW1lbnQ=', 7, 1, '', 0, '2018-04-17 06:04:01', 1, '2018-04-17 06:04:01', 1),
(8, 'sales', 'SALES', 'c2FsZXM=', 8, 1, '', 0, '2018-07-02 11:07:18', 1, '2018-07-02 11:07:18', 1),
(9, 'putri', 'PUTRI', 'cHV0cmk=', 9, 1, '', 2, '2019-01-24 10:01:33', 1, '2019-01-24 10:01:33', 1),
(10, 'enggar', 'ENGGAR', 'ZW5nZ2Fy', 9, 1, '', 2, '2019-01-24 10:01:50', 1, '2019-01-24 10:01:50', 1),
(11, 'buwar_resmi', 'BU WAR', 'YnV3YXI=', 9, 1, '', 2, '2019-01-25 09:01:38', 1, '2019-02-12 11:02:44', 1),
(12, 'linda', 'LINDA', 'bGluZGE=', 9, 1, '', 2, '2019-01-25 09:01:56', 1, '2019-01-25 09:01:56', 1),
(13, 'test', 'TEST ', 'dGVzdDEyMw==', 9, 1, '', 2, '2019-02-08 05:02:35', 1, '2019-02-08 06:02:11', 1),
(14, 'buwar', 'BU WAR', 'YnV3YXI=', 2, 1, '', 0, '2019-02-12 11:02:43', 1, '2019-02-12 11:02:43', 1),
(15, 'arif', 'ARIF', 'YXJpZg==', 10, 1, '', 0, '2019-02-13 04:02:26', 1, '2019-02-13 04:02:26', 1),
(16, 'suratjalan', 'SJ', 'c3VyYXRqYWxhbg==', 11, 1, '', 0, '2019-02-13 05:02:09', 1, '2019-02-13 05:02:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `no_voucher` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_voucher` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
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

INSERT INTO `voucher` (`id`, `no_voucher`, `tanggal`, `jenis_voucher`, `status`, `customer_id`, `supplier_id`, `po_id`, `pembayaran_id`, `ttr_id`, `group_cost_id`, `cost_id`, `jenis_barang`, `amount`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'VRSK.201901.0001', '2019-01-02', 'DP', 1, 0, 0, 4, 1, 0, 0, 0, 'RONGSOK', 129100000, 'DP AWAL', '2019-01-02 05:01:47', 1, '2019-01-08 10:01:31', 1),
(2, 'VRSK.201901.0002', '2019-01-02', 'DP', 1, 0, 0, 4, 1, 0, 0, 0, 'RONGSOK', 100000000, 'DP KEDUA', '2019-01-02 05:01:32', 1, '2019-01-08 10:01:34', 1),
(4, 'VRSK.201901.0004', '2019-01-02', 'Pelunasan', 1, 0, 0, 4, 3, 0, 0, 0, 'RONGSOK', 100000000, 'TERAKHIR', '2019-01-02 05:01:36', 1, '2019-01-08 01:01:57', 1),
(5, 'VRSK.201901.0005', '2019-01-08', 'DP', 1, 0, 0, 5, 2, 0, 0, 0, 'RONGSOK', 10280000, 'DP AWAL', '2019-01-08 01:01:12', 1, '2019-01-08 01:01:10', 1),
(6, 'VRSK.201901.0006', '2019-01-08', 'Pelunasan', 1, 0, 0, 5, 2, 0, 0, 0, 'RONGSOK', 5000000, '', '2019-01-08 01:01:19', 1, '2019-01-08 01:01:13', 1),
(7, 'VRSK.201901.0007', '2019-01-08', 'Pelunasan', 1, 0, 0, 6, 2, 0, 0, 0, 'RONGSOK', 2200000, '', '2019-01-08 01:01:24', 1, '2019-01-08 01:01:48', 1),
(8, 'VSP.201901.0001', '2019-01-08', 'Parsial', 0, 0, 0, 1, 0, 0, 0, 0, 'SPARE PART', 10862500, '', '2019-01-08 05:01:14', 1, '2019-01-08 05:01:14', 1),
(9, 'VSP.201901.0002', '2019-01-08', 'Pelunasan', 0, 0, 0, 1, 0, 0, 0, 0, 'SPARE PART', 6000000, '', '2019-01-08 05:01:19', 1, '2019-01-08 05:01:19', 1),
(10, 'VSP.201901.0003', '2019-01-15', 'Pelunasan', 0, 0, 12, 12, 0, 0, 0, 0, 'SPARE PART', 400000, '', '2019-01-15 01:01:11', 1, '2019-01-15 01:01:11', 1),
(11, 'VSP.201901.0004', '2019-01-15', 'Parsial', 0, 0, 10, 14, 0, 0, 0, 0, 'SPARE PART', 1000000, '', '2019-01-15 02:01:36', 1, '2019-01-15 02:01:36', 1),
(12, 'VSP.201901.0005', '2019-01-15', 'Parsial', 0, 0, 10, 14, 0, 0, 0, 0, 'SPARE PART', 3000000, '', '2019-01-15 02:01:07', 1, '2019-01-15 02:01:07', 1),
(13, 'VSP.201901.0006', '2019-01-15', 'Pelunasan', 0, 0, 10, 14, 0, 0, 0, 0, 'SPARE PART', 2000000, '', '2019-01-15 02:01:29', 1, '2019-01-15 02:01:29', 1),
(14, 'VSP.201901.0007', '2019-01-15', 'Parsial', 0, 0, 9, 15, 0, 0, 0, 0, 'SPARE PART', 4600000, '', '2019-01-15 02:01:50', 1, '2019-01-15 02:01:50', 1),
(15, 'VSP.201901.0008', '2019-01-15', 'Pelunasan', 0, 0, 9, 15, 0, 0, 0, 0, 'SPARE PART', 3800000, '', '2019-01-15 02:01:49', 1, '2019-01-15 02:01:49', 1),
(16, 'VRSK.201901.0008', '2019-01-15', 'DP', 0, 0, 130, 16, 4, 0, 0, 0, 'RONGSOK', 2500000, 'DP 1', '2019-01-15 02:01:22', 1, '2019-02-07 01:02:37', 1),
(17, 'VRSK.201901.0009', '2019-01-15', 'Pelunasan', 0, 0, 130, 16, 4, 0, 0, 0, 'RONGSOK', 3000000, 'LUNAS', '2019-01-15 02:01:33', 1, '2019-02-07 01:02:41', 1),
(18, 'VRSK.201901.0010', '2019-01-15', 'Pelunasan', 0, 0, 6, 18, 4, 0, 0, 0, 'RONGSOK', 5250000, '', '2019-01-15 03:01:39', 1, '2019-02-07 01:02:46', 1),
(19, 'VSP.201901.0009', '2019-01-21', 'Pelunasan', 1, 0, 4, 19, 0, 0, 0, 0, 'SPARE PART', 2375000, 'TEST KAS', '2019-01-21 07:01:48', 1, '2019-01-21 07:01:48', 1),
(20, 'VSP.201901.0010', '2019-01-21', 'Pelunasan', 1, 0, 4, 19, 0, 0, 0, 0, 'SPARE PART', 2375000, '', '2019-01-21 07:01:39', 1, '2019-01-21 07:01:39', 1),
(21, 'VSP.201901.0011', '2019-01-22', 'Pelunasan', 1, 0, 10, 20, 0, 0, 0, 0, 'SPARE PART', 1000000, '', '2019-01-22 10:01:48', 1, '2019-01-22 10:01:48', 1),
(22, 'VSP.201901.0012', '2019-01-22', 'Pelunasan', 1, 0, 10, 20, 0, 0, 0, 0, 'SPARE PART', 5300000, '', '2019-01-22 10:01:00', 1, '2019-01-22 10:01:00', 1),
(23, 'VSP.201901.0013', '2019-01-22', 'Pelunasan', 1, 0, 10, 20, 0, 0, 0, 0, 'SPARE PART', 1000000, '', '2019-01-22 11:01:32', 1, '2019-01-22 11:01:32', 1),
(24, 'VSP.201901.0014', '2019-01-22', 'Pelunasan', 1, 0, 10, 20, 0, 0, 0, 0, 'SPARE PART', 6560000, '', '2019-01-22 11:01:39', 1, '2019-01-22 11:01:39', 1),
(26, 'VTL.201902.0002', '2019-02-04', 'DP', 0, 3, 0, 23, 0, 0, 0, 0, 'FG', 5375000, 'PEMBAYARAN PERTAMA', '2019-02-04 02:02:17', 1, '2019-02-04 02:02:17', 1),
(27, 'VTL.201902.0003', '2019-02-04', 'DP', 0, 3, 0, 23, 0, 0, 0, 0, 'FG', 6450000, 'PEMBAYARAN KEDUA', '2019-02-04 02:02:35', 1, '2019-02-04 02:02:35', 1),
(28, 'VTL.201902.0004', '2019-02-04', 'Pelunasan', 0, 3, 0, 23, 0, 0, 0, 0, 'FG', 21022240, 'LANGSUNG', '2019-02-04 02:02:55', 1, '2019-02-04 02:02:55', 1),
(29, 'VTL.201902.0005', '2019-02-04', 'DP', 0, 55, 0, 25, 0, 0, 0, 0, 'WIP', 22000000, '', '2019-02-04 04:02:08', 1, '2019-02-04 04:02:08', 1),
(30, 'VTL.201902.0006', '2019-02-04', 'Pelunasan', 0, 55, 0, 25, 0, 0, 0, 0, 'WIP', 20000000, '', '2019-02-04 04:02:53', 1, '2019-02-04 04:02:53', 1),
(31, 'VRSK.201902.0001', '2019-02-06', 'Pelunasan', 0, 0, 9, 26, 0, 0, 0, 0, 'RONGSOK', 16200000, 'PEMBAYARAN PENGIRIMAN PERTAMA', '2019-02-06 11:02:09', 1, '2019-02-06 11:02:09', 1),
(32, 'VRSK.201902.0002', '2019-02-06', 'Pelunasan', 0, 0, 9, 26, 0, 0, 0, 0, 'RONGSOK', 11520000, 'PEMBAYARAN KEDUA', '2019-02-06 11:02:26', 1, '2019-02-06 11:02:26', 1),
(33, 'VRSK.201902.0003', '2019-02-06', 'Pelunasan', 0, 0, 7, 27, 0, 0, 0, 0, 'RONGSOK', 25360000, '', '2019-02-06 11:02:42', 1, '2019-02-06 11:02:42', 1),
(34, 'VRSK.201902.0004', '2019-02-06', 'Pelunasan', 0, 0, 7, 27, 0, 0, 0, 0, 'RONGSOK', 19200000, 'PEMBAYARAN TERAKHIR', '2019-02-06 11:02:33', 1, '2019-02-06 11:02:33', 1),
(35, 'VRSK.201902.0005', '2019-02-06', 'Pelunasan', 0, 0, 76, 28, 0, 0, 0, 0, 'RONGSOK', 8800000, '', '2019-02-06 11:02:23', 1, '2019-02-06 11:02:23', 1),
(36, 'VRSK.201902.0006', '2019-02-06', 'Pelunasan', 0, 0, 7, 7, 0, 0, 0, 0, 'RONGSOK', 20040000, '', '2019-02-06 11:02:45', 1, '2019-02-06 11:02:45', 1),
(37, 'VRSK.201902.0007', '2019-02-06', 'Pelunasan', 0, 0, 5, 8, 0, 0, 0, 0, 'RONGSOK', 3575000, '', '2019-02-06 11:02:39', 1, '2019-02-06 11:02:39', 1),
(38, 'VRSK.201902.0008', '2019-02-06', 'Pelunasan', 0, 0, 10, 9, 0, 0, 0, 0, 'RONGSOK', 4190000, '', '2019-02-06 12:02:51', 1, '2019-02-06 12:02:51', 1),
(39, 'VRSK.201902.0009', '2019-02-06', 'Pelunasan', 0, 0, 3, 11, 0, 0, 0, 0, 'RONGSOK', 17500000, '', '2019-02-06 12:02:12', 1, '2019-02-06 12:02:12', 1),
(40, 'VRSK.201902.0010', '2019-02-06', 'Pelunasan', 0, 0, 8, 17, 0, 0, 0, 0, 'RONGSOK', 11120000, '', '2019-02-06 12:02:45', 1, '2019-02-06 12:02:45', 1),
(41, 'VRSK.201902.0011', '2019-02-11', 'DP', 0, 0, 16, 29, 0, 0, 0, 0, 'RONGSOK', 5000000, 'DP AWAL', '2019-02-11 05:02:59', 4, '2019-02-11 05:02:59', 4),
(42, 'VRSK.201902.0012', '2019-02-11', 'DP', 0, 0, 16, 29, 0, 0, 0, 0, 'RONGSOK', 10000000, 'PAYMENT KEDUA', '2019-02-11 05:02:15', 4, '2019-02-11 05:02:15', 4),
(43, 'VTL.201902.0007', '2019-02-11', 'DP', 0, 37, 0, 30, 0, 0, 0, 0, 'FG', 50000000, 'DP AWAL', '2019-02-11 05:02:40', 4, '2019-02-11 05:02:40', 4),
(44, 'VSP.201902.0001', '2019-02-11', 'Pelunasan', 1, 0, 76, 32, 0, 0, 0, 0, 'SPARE PART', 760000, '', '2019-02-11 05:02:38', 7, '2019-02-11 05:02:38', 7),
(45, 'VSP.201902.0002', '2019-02-11', 'Pelunasan', 1, 0, 445, 33, 0, 0, 0, 0, 'SPARE PART', 600000, '', '2019-02-11 05:02:22', 7, '2019-02-11 05:02:22', 7),
(46, 'VSP.201902.0003', '2019-02-11', 'Pelunasan', 1, 0, 445, 33, 0, 0, 0, 0, 'SPARE PART', 300000, '', '2019-02-11 05:02:56', 7, '2019-02-11 05:02:56', 7),
(47, 'VFG.201902.0001', '2019-02-11', 'DP', 0, 0, 4, 22, 0, 0, 0, 0, 'FG', 25000000, '', '2019-02-11 07:02:44', 4, '2019-02-11 07:02:44', 4),
(48, 'VFG.201902.0002', '2019-02-11', 'Pelunasan', 0, 0, 4, 22, 0, 0, 0, 0, 'FG', 29163199, '', '2019-02-11 07:02:00', 4, '2019-02-11 07:02:00', 4),
(50, 'VFG.201902.0004', '2019-02-11', 'Pelunasan', 0, 0, 8, 34, 0, 0, 0, 0, 'FG', 26860001, '', '2019-02-11 07:02:25', 4, '2019-02-11 07:02:25', 4),
(51, 'VFG.201902.0005', '2019-02-11', 'Pelunasan', 0, 0, 8, 34, 0, 0, 0, 0, 'FG', 24625000, '', '2019-02-11 07:02:33', 4, '2019-02-11 07:02:33', 4);

-- --------------------------------------------------------

--
-- Structure for view `stok_fg`
--
DROP TABLE IF EXISTS `stok_fg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_fg`  AS  select `t_gudang_fg`.`jenis_barang_id` AS `jenis_barang_id`,`jb`.`jenis_barang` AS `jenis_barang`,count(`t_gudang_fg`.`jenis_barang_id`) AS `total_qty`,sum(`t_gudang_fg`.`netto`) AS `total_netto` from (`t_gudang_fg` left join `jenis_barang` `jb` on((`jb`.`id` = `t_gudang_fg`.`jenis_barang_id`))) where (`t_gudang_fg`.`jenis_trx` = 0) group by `t_gudang_fg`.`jenis_barang_id` ;

-- --------------------------------------------------------

--
-- Structure for view `stok_keras`
--
DROP TABLE IF EXISTS `stok_keras`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_keras`  AS  select `t_gudang_keras`.`jenis_barang_id` AS `jenis_barang_id`,`jb`.`jenis_barang` AS `jenis_barang`,sum((case when (`t_gudang_keras`.`jenis_trx` = 0) then `t_gudang_keras`.`qty` else 0 end)) AS `total_qty_in`,sum((case when (`t_gudang_keras`.`jenis_trx` = 1) then `t_gudang_keras`.`qty` else 0 end)) AS `total_qty_out`,sum((case when (`t_gudang_keras`.`jenis_trx` = 0) then `t_gudang_keras`.`berat` else 0 end)) AS `total_berat_in`,sum((case when (`t_gudang_keras`.`jenis_trx` = 1) then `t_gudang_keras`.`berat` else 0 end)) AS `total_berat_out` from (`t_gudang_keras` left join `jenis_barang` `jb` on((`jb`.`id` = `t_gudang_keras`.`jenis_barang_id`))) group by `t_gudang_keras`.`jenis_barang_id` ;

-- --------------------------------------------------------

--
-- Structure for view `stok_rsk`
--
DROP TABLE IF EXISTS `stok_rsk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_rsk`  AS  select `dd`.`rongsok_id` AS `rongsok_id`,`rsk`.`nama_item` AS `nama_item`,count(`dd`.`id`) AS `jumlah_packing`,((select sum(`dd`.`netto`) from `dtr_detail` `dd` where ((`dd`.`tanggal_masuk` <> 0) and (`dd`.`rongsok_id` = `rsk`.`id`))) - coalesce((select sum(`dd`.`netto`) from `dtr_detail` `dd` where ((`dd`.`tanggal_keluar` <> 0) and (`dd`.`rongsok_id` = `rsk`.`id`))),0)) AS `stok` from (`dtr_detail` `dd` left join `rongsok` `rsk` on((`rsk`.`id` = `dd`.`rongsok_id`))) where (`rsk`.`type_barang` = 'Rongsok') group by `dd`.`rongsok_id` ;

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
-- Indexes for table `bak_m_print_barcode`
--
ALTER TABLE `bak_m_print_barcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bak_m_print_barcode_line`
--
ALTER TABLE `bak_m_print_barcode_line`
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
-- Indexes for table `dtbj`
--
ALTER TABLE `dtbj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtbj_detail`
--
ALTER TABLE `dtbj_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_bobbin` (`no_bobbin`) USING BTREE,
  ADD KEY `no_bobbin_2` (`no_bobbin`) USING BTREE;

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
-- Indexes for table `dtt`
--
ALTER TABLE `dtt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtt_detail`
--
ALTER TABLE `dtt_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtwip`
--
ALTER TABLE `dtwip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtwip_detail`
--
ALTER TABLE `dtwip_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_invoice`
--
ALTER TABLE `f_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_invoice_detail`
--
ALTER TABLE `f_invoice_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_kas`
--
ALTER TABLE `f_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_matching_detail`
--
ALTER TABLE `f_matching_detail`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `f_slip_setoran`
--
ALTER TABLE `f_slip_setoran`
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
-- Indexes for table `m_bobbin_peminjaman`
--
ALTER TABLE `m_bobbin_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bobbin_peminjaman_detail`
--
ALTER TABLE `m_bobbin_peminjaman_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bobbin_penerimaan`
--
ALTER TABLE `m_bobbin_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bobbin_penerimaan_detail`
--
ALTER TABLE `m_bobbin_penerimaan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bobbin_size`
--
ALTER TABLE `m_bobbin_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bobbin_spb`
--
ALTER TABLE `m_bobbin_spb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bobbin_spb_detail`
--
ALTER TABLE `m_bobbin_spb_detail`
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
-- Indexes for table `m_kendaraan`
--
ALTER TABLE `m_kendaraan`
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
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_detail`
--
ALTER TABLE `retur_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_fulfilment`
--
ALTER TABLE `retur_fulfilment`
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
-- Indexes for table `t_gudang_bs`
--
ALTER TABLE `t_gudang_bs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_gudang_fg`
--
ALTER TABLE `t_gudang_fg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_gudang_keras`
--
ALTER TABLE `t_gudang_keras`
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
  ADD UNIQUE KEY `no_masak` (`id_produksi`),
  ADD KEY `no_masak_2` (`id_produksi`);

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
-- Indexes for table `t_spb_ampas`
--
ALTER TABLE `t_spb_ampas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_spb_ampas_detail`
--
ALTER TABLE `t_spb_ampas_detail`
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
-- AUTO_INCREMENT for table `bak_m_print_barcode`
--
ALTER TABLE `bak_m_print_barcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `beli_sparepart`
--
ALTER TABLE `beli_sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `beli_sparepart_detail`
--
ALTER TABLE `beli_sparepart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtbj`
--
ALTER TABLE `dtbj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dtbj_detail`
--
ALTER TABLE `dtbj_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `dtr_detail`
--
ALTER TABLE `dtr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `dtt`
--
ALTER TABLE `dtt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dtt_detail`
--
ALTER TABLE `dtt_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dtwip`
--
ALTER TABLE `dtwip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dtwip_detail`
--
ALTER TABLE `dtwip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `f_invoice`
--
ALTER TABLE `f_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `f_invoice_detail`
--
ALTER TABLE `f_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `f_kas`
--
ALTER TABLE `f_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `f_matching_detail`
--
ALTER TABLE `f_matching_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `f_pembayaran`
--
ALTER TABLE `f_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `f_pembayaran_detail`
--
ALTER TABLE `f_pembayaran_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `f_slip_setoran`
--
ALTER TABLE `f_slip_setoran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `f_uang_masuk`
--
ALTER TABLE `f_uang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `group_cost`
--
ALTER TABLE `group_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=676;
--
-- AUTO_INCREMENT for table `lpb`
--
ALTER TABLE `lpb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `lpb_detail`
--
ALTER TABLE `lpb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `m_bobbin_peminjaman`
--
ALTER TABLE `m_bobbin_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `m_bobbin_peminjaman_detail`
--
ALTER TABLE `m_bobbin_peminjaman_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `m_bobbin_penerimaan`
--
ALTER TABLE `m_bobbin_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `m_bobbin_penerimaan_detail`
--
ALTER TABLE `m_bobbin_penerimaan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `m_bobbin_size`
--
ALTER TABLE `m_bobbin_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `m_bobbin_spb`
--
ALTER TABLE `m_bobbin_spb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `m_bobbin_spb_detail`
--
ALTER TABLE `m_bobbin_spb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
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
-- AUTO_INCREMENT for table `m_kendaraan`
--
ALTER TABLE `m_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_numberings`
--
ALTER TABLE `m_numberings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `m_numbering_details`
--
ALTER TABLE `m_numbering_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `m_print_barcode`
--
ALTER TABLE `m_print_barcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_provinces`
--
ALTER TABLE `m_provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `m_type_kendaraan`
--
ALTER TABLE `m_type_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `po_detail`
--
ALTER TABLE `po_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `produksi_ampas`
--
ALTER TABLE `produksi_ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produksi_ampas_detail`
--
ALTER TABLE `produksi_ampas_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produksi_fg`
--
ALTER TABLE `produksi_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `produksi_fg_detail`
--
ALTER TABLE `produksi_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `produksi_ingot`
--
ALTER TABLE `produksi_ingot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `produksi_ingot_detail`
--
ALTER TABLE `produksi_ingot_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `retur_detail`
--
ALTER TABLE `retur_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `retur_fulfilment`
--
ALTER TABLE `retur_fulfilment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;
--
-- AUTO_INCREMENT for table `rongsok`
--
ALTER TABLE `rongsok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `r_dtr`
--
ALTER TABLE `r_dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `r_dtr_detail`
--
ALTER TABLE `r_dtr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `r_ttr`
--
ALTER TABLE `r_ttr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `r_ttr_detail`
--
ALTER TABLE `r_ttr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `r_t_invoice`
--
ALTER TABLE `r_t_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `r_t_invoice_detail`
--
ALTER TABLE `r_t_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `r_t_inv_jasa`
--
ALTER TABLE `r_t_inv_jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `r_t_inv_jasa_detail`
--
ALTER TABLE `r_t_inv_jasa_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `r_t_po`
--
ALTER TABLE `r_t_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `r_t_po_detail`
--
ALTER TABLE `r_t_po_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `r_t_so`
--
ALTER TABLE `r_t_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `r_t_so_detail`
--
ALTER TABLE `r_t_so_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `r_t_surat_jalan`
--
ALTER TABLE `r_t_surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `r_t_surat_jalan_detail`
--
ALTER TABLE `r_t_surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
-- AUTO_INCREMENT for table `spb`
--
ALTER TABLE `spb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `spb_detail`
--
ALTER TABLE `spb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `spb_detail_fulfilment`
--
ALTER TABLE `spb_detail_fulfilment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788;
--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surat_jalan_detail`
--
ALTER TABLE `surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tolling_fg`
--
ALTER TABLE `tolling_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tolling_fg_detail`
--
ALTER TABLE `tolling_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ttr`
--
ALTER TABLE `ttr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `ttr_detail`
--
ALTER TABLE `ttr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `t_bpb_ampas`
--
ALTER TABLE `t_bpb_ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_bpb_ampas_detail`
--
ALTER TABLE `t_bpb_ampas_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_bpb_fg`
--
ALTER TABLE `t_bpb_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `t_bpb_fg_detail`
--
ALTER TABLE `t_bpb_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `t_bpb_wip`
--
ALTER TABLE `t_bpb_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `t_bpb_wip_detail`
--
ALTER TABLE `t_bpb_wip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_gudang_bs`
--
ALTER TABLE `t_gudang_bs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `t_gudang_fg`
--
ALTER TABLE `t_gudang_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `t_gudang_keras`
--
ALTER TABLE `t_gudang_keras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_gudang_wip`
--
ALTER TABLE `t_gudang_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `t_hasil_masak`
--
ALTER TABLE `t_hasil_masak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_hasil_wip`
--
ALTER TABLE `t_hasil_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `t_inventory`
--
ALTER TABLE `t_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `t_inventory_detail`
--
ALTER TABLE `t_inventory_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `t_kas`
--
ALTER TABLE `t_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_sales_order`
--
ALTER TABLE `t_sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `t_sales_order_detail`
--
ALTER TABLE `t_sales_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `t_spb_ampas`
--
ALTER TABLE `t_spb_ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_ampas_detail`
--
ALTER TABLE `t_spb_ampas_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_fg`
--
ALTER TABLE `t_spb_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `t_spb_fg_detail`
--
ALTER TABLE `t_spb_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `t_spb_sparepart`
--
ALTER TABLE `t_spb_sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_spb_sparepart_detail`
--
ALTER TABLE `t_spb_sparepart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_spb_sparepart_detail_keluar`
--
ALTER TABLE `t_spb_sparepart_detail_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_spb_wip`
--
ALTER TABLE `t_spb_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `t_spb_wip_detail`
--
ALTER TABLE `t_spb_wip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `t_surat_jalan`
--
ALTER TABLE `t_surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `t_surat_jalan_detail`
--
ALTER TABLE `t_surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
