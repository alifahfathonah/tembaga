-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2019 at 06:19 AM
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
  `kode_bank` varchar(25) NOT NULL,
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
(1, 'MANDIRI', 'BANK MANDIRI ', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'EKONOMI US$ DAAN MOGOT', 'BANK EKONOMI US$ DAAN MOGOT', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'EKONOMI RPK', 'BANK EKONOMI PRK', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'INDOVETS', 'BANK INDOVETS', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'MANDIRI US$', 'BANK MANDIRI US$', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'MASHILL', 'BANK MASHILL', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'SUPREME', 'BANK SUPREME', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'BAHARI TH', 'BANK BAHARI TAHAPAN', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'LIPPO', 'LIPPO BANK', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'LIPPO TH', 'BANK LIPPO TAHAPAN', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'INDOVETS US$', 'BANK INDOVEST US$', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'BALI', 'BANK BALI', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'BALI US$', 'BANK BALI US$', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'ABN AMRO US$', 'BANK ABN AMRO US$', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'DANAMON', 'BANK DANAMON', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'BCA', 'BANK CENTRAL ASIA (BCA)', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'LIPPO US$', 'BANK LIPPO US$', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'BCA R/K', 'BANK CENTRAL ASIA (BCA R/K)', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 'LIPPO US$ R/K', 'BANK LIPPO US$ R/K', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'BCA BS', 'BANK BCA BS', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'BCA US$', 'BANK BCA US$', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'EKONOMI', 'BANK EKONOMI', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'EKONOMI US$', 'BANK EKONOMI USD', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'EKONOMI USD S/B', 'BANK EKONOMI USD S/B', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 'BANK ', 'BANK EKONOMI B/F', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'EKONOMI USD M/S', 'BANK EKONOMI USD M/S', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'EKONOMI RP M/S', 'BANK EKONOMI RP M/S', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'BCA RP M/S', 'BCA RP M/S', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'EKONOMI US$ DM', 'BANK EKONOMI US$ DM', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 'ALLIANZ', 'TABUNGAN  ALLIANZ', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'EKONOMI R/T', 'BANK EKONOMI R/T', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 'EKONOMI R/B', 'EKONOMI R/B', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 'SENKIAWAN', 'BCA SENKIAWAN', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'BCA  ROBERT TEDJA', 'BCA  ROBERT TEDJA', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'BCA  MICHAEL', 'BCA  MICHAEL', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'EKONOMI BUDINATA', 'EKONOMI BUDINATA', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'BCA FRANS TJ', 'BCA FRANS TJ', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'MAYORA', 'BANK MAYORA', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'AGRIS', 'BANK AGRIS', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(1, 'DTR.201903.0002', '2019-03-19', 1, 0, 0, 499, 0, 'RONGSOK', '', 1, '2019-03-19 02:03:17', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-03-19 02:03:53', 1, '2019-03-19 02:03:53', 1),
(3, 'DTR.201903.0004', '2019-03-19', 2, 0, 0, 370, 0, 'RONGSOK', '', 1, '2019-03-19 03:03:30', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-03-19 03:03:09', 1, '2019-03-19 03:03:09', 1),
(4, 'DTR.201903.0005', '2019-03-19', 3, 0, 0, 336, 0, 'RONGSOK', '', 1, '2019-03-19 04:03:50', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-03-19 04:03:42', 1, '2019-03-19 04:03:42', 1),
(6, 'DTR.201903.0007', '2019-03-19', 0, 0, 0, 0, 0, 'RONGSOK', 'BARANG BS TRANSFER KE RONGSOK', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-03-19 05:03:42', 1, '2019-03-19 05:03:12', 1),
(8, 'DTR-T.201903.0002', '2019-03-20', 0, 5, 0, 0, 7, 'RONGSOK', '', 1, '2019-03-20 04:03:36', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-03-20 04:03:14', 1, '2019-03-20 04:03:14', 1),
(9, 'DTR-T.201903.0003', '2019-03-20', 0, 5, 0, 0, 7, 'RONGSOK', '', 1, '2019-03-20 04:03:07', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-03-20 04:03:44', 1, '2019-03-20 04:03:44', 1),
(10, 'DTR-T.201903.0004', '2019-03-21', 0, 11, 0, 0, 21, 'RONGSOK', '', 1, '2019-03-21 10:03:55', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-03-21 10:03:43', 1, '2019-03-21 10:03:43', 1);

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
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `flag_taken` tinyint(1) NOT NULL DEFAULT '0',
  `flag_sj` tinyint(4) NOT NULL,
  `flag_resmi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtr_detail`
--

INSERT INTO `dtr_detail` (`id`, `dtr_id`, `po_detail_id`, `so_id`, `rongsok_id`, `qty`, `bruto`, `berat_palette`, `netto`, `line_remarks`, `no_pallete`, `created`, `created_by`, `modified`, `modified_by`, `tanggal_masuk`, `tanggal_keluar`, `flag_taken`, `flag_sj`, `flag_resmi`) VALUES
(1, 1, 4, 0, 12, 0, 941, 127, 814, '', '190319144317IID', '2019-03-19 02:03:53', 1, NULL, NULL, '2019-03-19', '2019-03-19', 1, 0, 0),
(2, 1, 6, 0, 64, 0, 981, 136, 845, '', '190319144346XJF', '2019-03-19 02:03:53', 1, NULL, NULL, '2019-03-19', NULL, 0, 0, 0),
(3, 1, 6, 0, 64, 0, 1674, 135, 1539, '', '190319144356DHW', '2019-03-19 02:03:53', 1, NULL, NULL, '2019-03-19', NULL, 0, 0, 0),
(4, 1, 6, 0, 64, 0, 1436, 141, 1295, '', '190319144412ZEQ', '2019-03-19 02:03:53', 1, NULL, NULL, '2019-03-19', '2019-03-19', 1, 0, 0),
(5, 1, 6, 0, 64, 0, 344, 73, 271, '', '190319144426THW', '2019-03-19 02:03:53', 1, NULL, NULL, '2019-03-19', NULL, 0, 0, 0),
(6, 1, 6, 0, 64, 0, 851, 138, 713, '', '190319144438CLC', '2019-03-19 02:03:53', 1, NULL, NULL, '2019-03-19', '2019-03-21', 1, 1, 0),
(12, 3, 14, 0, 64, 0, 1542, 137, 1405, '', '190319155555MJR', '2019-03-19 03:03:09', 1, NULL, NULL, '2019-03-19', NULL, 0, 0, 0),
(13, 3, 14, 0, 64, 0, 2000, 137, 1863, '', '19031915567ZYF', '2019-03-19 03:03:09', 1, NULL, NULL, '2019-03-19', '2019-03-19', 1, 0, 0),
(14, 3, 12, 0, 12, 0, 1109, 146, 963, '', '190319155625NAK', '2019-03-19 03:03:09', 1, NULL, NULL, '2019-03-19', '2019-03-19', 1, 0, 0),
(15, 3, 10, 0, 17, 0, 1232, 142, 1090, '', '190319155657FHL', '2019-03-19 03:03:09', 1, NULL, NULL, '2019-03-19', NULL, 0, 0, 0),
(16, 4, 17, 0, 12, 0, 1735, 127, 1608, '', '190319161548CEZ', '2019-03-19 04:03:42', 1, NULL, NULL, '2019-03-19', NULL, 0, 0, 0),
(17, 4, 19, 0, 64, 0, 1463, 135, 1328, '', '19031916161EVJ', '2019-03-19 04:03:42', 1, NULL, NULL, '2019-03-19', NULL, 0, 0, 0),
(18, 4, 17, 0, 12, 0, 2533, 134, 2399, '', '190319161610OXM', '2019-03-19 04:03:42', 1, NULL, NULL, '2019-03-19', '2019-03-21', 1, 1, 0),
(19, 4, 19, 0, 64, 0, 683, 115, 568, '', '190319161630TJH', '2019-03-19 04:03:42', 1, NULL, NULL, '2019-03-19', '2019-03-19', 1, 0, 0),
(21, 6, 0, 0, 19, 581, 0, 0, 581, 'BARANG BS TRANSFER KE RONGSOK', '1903191731424E2', '2019-03-19 05:03:42', 1, '2019-03-19 05:03:42', 1, NULL, NULL, 0, 0, 0),
(28, 8, 0, 0, 74, 0, 560, 58.36, 501.64, '', '200319162635BPV', '2019-03-20 04:03:14', 1, NULL, NULL, '2019-03-20', NULL, 0, 0, 0),
(29, 8, 0, 0, 74, 0, 578, 54.87, 523.13, '', '200319162643MAW', '2019-03-20 04:03:14', 1, NULL, NULL, '2019-03-20', NULL, 0, 0, 0),
(30, 8, 0, 0, 74, 0, 555, 50.23, 504.77, '', '20031916277DNX', '2019-03-20 04:03:14', 1, NULL, NULL, '2019-03-20', NULL, 0, 0, 0),
(31, 8, 0, 0, 63, 0, 256, 27.36, 228.64, '', '200319162719CNA', '2019-03-20 04:03:14', 1, NULL, NULL, '2019-03-20', NULL, 0, 0, 0),
(32, 8, 0, 0, 63, 0, 278, 30.81, 247.19, '', '200319162733IXI', '2019-03-20 04:03:14', 1, NULL, NULL, '2019-03-20', NULL, 0, 0, 0),
(33, 8, 0, 0, 63, 0, 250, 26.95, 223.05, '', '200319162742NUD', '2019-03-20 04:03:14', 1, NULL, NULL, '2019-03-20', NULL, 0, 0, 0),
(34, 9, 0, 0, 64, 0, 560, 59.67, 500.33, '', '200319163920ARJ', '2019-03-20 04:03:44', 1, NULL, NULL, '2019-03-20', NULL, 0, 0, 0),
(35, 9, 0, 0, 64, 0, 550, 45.76, 504.24, '', '200319163934TQL', '2019-03-20 04:03:44', 1, NULL, NULL, '2019-03-20', NULL, 0, 0, 0),
(36, 10, 0, 0, 72, 0, 560, 58.78, 501.22, '', '21031910230GUF', '2019-03-21 10:03:43', 1, NULL, NULL, '2019-03-21', NULL, 0, 0, 0),
(37, 10, 0, 0, 63, 0, 300, 52.46, 247.54, '', '210319102311AAA', '2019-03-21 10:03:43', 1, NULL, NULL, '2019-03-21', NULL, 0, 0, 0),
(38, 10, 0, 0, 63, 0, 325, 55.78, 269.22, '', '210319102327LYV', '2019-03-21 10:03:43', 1, NULL, NULL, '2019-03-21', NULL, 0, 0, 0);

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
  `jenis_packing` tinyint(1) DEFAULT NULL,
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

INSERT INTO `dtt` (`id`, `no_dtt`, `tanggal`, `po_id`, `customer_id`, `jenis_barang`, `jenis_packing`, `remarks`, `status`, `approved`, `approved_by`, `rejected`, `rejected_by`, `rejected_remarks`, `status_pembayaran`, `type_retur`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'DTT.201903.0001', '2019-03-21', 4, 22, 'WIP', NULL, '', 1, '2019-03-21 12:03:19', 1, '0000-00-00 00:00:00', 0, '', 0, 0, '2019-03-21 11:03:56', 1, '0000-00-00 00:00:00', 0);

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
  `line_remarks` text,
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
(1, 1, 20, 5, 1500, 0, 0, 1500, '', '', '', '2019-03-21 12:03:10', 1, '0000-00-00 00:00:00', 0, '2019-03-21', '0000-00-00', 0),
(2, 1, 21, 6, 1500, 0, 0, 1500, '', '', '', '2019-03-21 12:03:10', 1, '0000-00-00 00:00:00', 0, '2019-03-21', '0000-00-00', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `f_invoice`
--

CREATE TABLE `f_invoice` (
  `id` int(11) NOT NULL,
  `jenis_trx` tinyint(1) NOT NULL,
  `term_of_payment` varchar(20) DEFAULT NULL,
  `bank_id` int(3) NOT NULL,
  `diskon` int(11) NOT NULL,
  `add_cost` int(11) NOT NULL,
  `materai` int(11) NOT NULL,
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

INSERT INTO `f_invoice` (`id`, `jenis_trx`, `term_of_payment`, `bank_id`, `diskon`, `add_cost`, `materai`, `no_invoice`, `flag_matching`, `flag_resmi`, `tanggal`, `tgl_jatuh_tempo`, `id_customer`, `id_sales_order`, `id_surat_jalan`, `id_retur`, `keterangan`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(3, 0, '1 BULAN', 12, 0, 0, 0, 'INVOICE-201903.0002', 0, 0, '2019-03-20', '2019-03-20', 8, 2, 1, 0, '', '2019-03-20 02:03:45', 1, '0000-00-00 00:00:00', 0),
(4, 0, 'TUNAI', 16, 0, 0, 0, 'INVOICE-201903.0003', 0, 0, '2019-03-20', '2019-03-21', 7, 5, 3, 0, '', '2019-03-20 06:03:12', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_invoice_detail`
--

CREATE TABLE `f_invoice_detail` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `sj_detail_id` int(11) NOT NULL,
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

INSERT INTO `f_invoice_detail` (`id`, `id_invoice`, `sj_detail_id`, `jenis_barang_id`, `qty`, `netto`, `harga`, `total_harga`, `keterangan`) VALUES
(1, 3, 1, 216, 2, 522.5, 104000, 54340000, ''),
(2, 3, 1, 426, 2, 519.3, 150000, 77894998, ''),
(3, 4, 3, 470, 5, 1233.32, 200000, 246663998, '');

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

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `flag_group` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `flag_group`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'ADMINISTRATOR', 0, '2017-10-01 00:00:00', 1, '2017-10-01 00:00:00', 1),
(2, 'PRODUKSI', 0, '2017-10-01 09:10:02', 1, '2019-02-12 11:02:21', 1),
(3, 'PEMBELIAN', 0, '2018-04-16 10:04:13', 1, '2018-04-16 10:04:13', 1),
(4, 'FINANCE', 0, '2018-04-16 10:04:26', 1, '2018-04-16 10:04:26', 1),
(5, 'TIMBANGAN', 0, '2018-04-16 10:04:37', 1, '2018-04-16 10:04:37', 1),
(6, 'GUDANG', 0, '2018-04-16 10:04:48', 1, '2018-04-16 10:04:48', 1),
(7, 'PROCUREMENT', 0, '2018-04-17 06:04:30', 1, '2018-04-17 06:04:30', 1),
(8, 'SALES', 0, '2018-07-02 11:07:39', 1, '2018-07-02 11:07:39', 1),
(9, 'RESMI', 1, '2019-01-24 10:01:11', 1, '2019-01-24 10:01:11', 1),
(10, 'BOBBIN', 0, '2019-02-13 04:02:44', 1, '2019-02-13 04:02:44', 1),
(11, 'SURAT JALAN', 0, '2019-02-13 04:02:16', 1, '2019-02-13 04:02:16', 1),
(12, 'SDM', 0, '2019-02-13 04:02:40', 1, '2019-02-13 04:02:40', 1),
(13, 'WIP', 0, '2019-02-13 04:02:46', 1, '2019-02-13 04:02:46', 1),
(14, 'CV 1', 1, '2019-03-05 04:03:32', 1, '2019-03-11 09:03:34', 1),
(15, 'CV 2', 1, '2019-03-05 04:03:59', 1, '2019-03-11 09:03:06', 1),
(16, 'KMP 1', 1, '2019-03-06 10:03:55', 1, '2019-03-11 09:03:19', 1),
(17, 'KMP 2', 1, '2019-03-06 10:03:02', 1, '2019-03-11 09:03:26', 1),
(18, 'CV 3', 1, '2019-03-06 10:03:10', 1, '2019-03-11 09:03:11', 1);

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
(1, 'RONGSOK', '', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0),
(2, 'INGOT', '04I0001', 'WIP', 'BATANG', NULL, '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(3, 'AMPAS', '', 'AMPAS', 'KG', NULL, '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(4, 'TOLLING', '', '', '', NULL, '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(5, 'KAWAT MERAH', '', 'WIP', 'ROLL', NULL, '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(6, 'KAWAT HITAM', '', 'WIP', 'ROLL', NULL, '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(7, 'BS', '', 'RONGSOK', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'TALI CUCI', '04T0001', 'WIP', 'KG', NULL, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'SERBUK', '', 'FG', 'KG', '', '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(15, 'KAWAT HITAM KERAS', '', 'ROLLING', 'ROLL', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(141, 'BC WIRE HARD 2,60MM', '05BCH05', 'FG', 'KG', '2600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(142, 'BCW 2,03 MM HARD', '05BH002', 'FG', 'KG', '2030', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 'BCW 2,05 MM HARD', '05BH003', 'FG', 'KG', '2050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 'BCW 2,23 MM HARD', '05BH004', 'FG', 'KG', '2230', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 'BCW 2,50 MM HARD', '05BH005', 'FG', 'KG', '2500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 'BCW 2,17 MM HARD', '05BH007', 'FG', 'KG', '2170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 'BCW 2,21 MM HARD', '05BH009', 'FG', 'KG', '2210', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, 'BCW 2,28 MM HARD', '05BH014', 'FG', 'KG', '2280', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 'BCW 2,40 MM HARD', '05BH018', 'FG', 'KG', '2400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 'BCW 2,47 MM HARD', '05BH019', 'FG', 'KG', '2470', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 'BCW 2,52 MM HARD', '05BH022', 'FG', 'KG', '2520', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 'BCW 2,60 MM HARD', '05BH024', 'FG', 'KG', '2600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 'BCW 2,66 MM HARD', '05BH025', 'FG', 'KG', '2660', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 'BCW 2,68 MM HARD', '05BH026', 'FG', 'KG', '2680', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 'BCW 2,70 MM HARD', '05BH027', 'FG', 'KG', '2700', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 'BCW 2,90 MM HARD', '05BH034', 'FG', 'KG', '2900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 'BCW 2,96 MM HARD', '05BH035', 'FG', 'KG', '2960', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 'BCW 3,00 MM HARD', '05BH037', 'FG', 'KG', '3000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 'BCW 3,20 MM HARD', '05BH038', 'FG', 'KG', '3200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 'BCW 3,23 MM HARD', '05BH039', 'FG', 'KG', '3230', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 'BCW 3,40 MM HARD', '05BH040', 'FG', 'KG', '3400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 'BCW 3,48 MM HARD', '05BH041', 'FG', 'KG', '3480', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 'BCW 3,57 MM HARD', '05BH046', 'FG', 'KG', '3570', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 'BCW 3,00 MM HARD', '05BH051', 'FG', 'KG', '3000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 'BCW 3,29 MM HARD', '05BH052', 'FG', 'KG', '3290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 'BCW 2,78 MM HARD', '05BH054', 'FG', 'KG', '2780', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 'BCW 2,09 MM HARD', '05BH056', 'FG', 'KG', '2090', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 'BCW 2,10 MM HARD', '05BH057', 'FG', 'KG', '2100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 'BCW 2,48 MM HARD', '05BH058', 'FG', 'KG', '2480', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 'BCW 2,29 MM HARD', '05BH059', 'FG', 'KG', '2290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 'BCW 2,56 MM HARD', '05BH060', 'FG', 'KG', '2560', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 'BCW 2,90 MM HARD I', '05BHI34', 'FG', 'KG', '2900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 'BCW 2,56 MM HARD I', '05BHI60', 'FG', 'KG', '2560', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 'BCW 2,78 MM HARD TMS', '05BHT01', 'FG', 'KG', '2780', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 'BCW 2,50 MM HARD TMS', '05BHT02', 'FG', 'KG', '2500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 'BCW 2,90 MM HARD TMS', '05BHT03', 'FG', 'KG', '2900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 'BCW 3,57 MM HARD TMS', '05BHT04', 'FG', 'KG', '3570', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 'BCW 2,00 MM HARD TMS', '05BHT05', 'FG', 'KG', '2000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 'BCW 2,76 MM HARD TMS', '05BHT06', 'FG', 'KG', '2760', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 'BCW 3,57 MM HARD TMS', '05BHT07', 'FG', 'KG', '3570', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 'BCW 2,60 MM HARD TMS', '05BHT08', 'FG', 'KG', '2600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 'BCW 3,58 MM HARD TMS', '05BHT09', 'FG', 'KG', '3580', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 'BCW 2,77 MM HARD TMS', '05BHT10', 'FG', 'KG', '2770', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 'BCW 2,00 MM SOFT  I', '05BI001', 'FG', 'KG', '2000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 'BCW 2,03 MM SOFT I', '05BI002', 'FG', 'KG', '2030', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 'BCW 2,18 MM SOFT  I', '05BI003', 'FG', 'KG', '2180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 'BCW 2,10 MM SOFT  I', '05BI004', 'FG', 'KG', '2100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 'BCW 2,13 MM SOFT I', '05BI005', 'FG', 'KG', '2130', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 'BCW 2,14 MM SOFT  I', '05BI006', 'FG', 'KG', '2140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 'BCW 2,17 MM SOFT  I', '05BI007', 'FG', 'KG', '2170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 'BCW 2,20 MM SOFT I', '05BI008', 'FG', 'KG', '2200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 'BCW 2,21 MM SOFT  I', '05BI009', 'FG', 'KG', '2210', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 'BCW 2,26 MM SOFT I', '05BI010', 'FG', 'KG', '2260', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 'BCW 2,25 MM SOFT I', '05BI011', 'FG', 'KG', '2250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 'BCW 2,26 MM SOFT I', '05BI012', 'FG', 'KG', '2260', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, 'BCW 2,50 MM SOFT I', '05BI021', 'FG', 'KG', '2500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, 'BCW 2,52 MM SOFT  I', '05BI022', 'FG', 'KG', '2520', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, 'BCW 2,80 MM SOFT I', '05BI032', 'FG', 'KG', '2800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, 'BCW 2,23 MM SOFT I', '05BI036', 'FG', 'KG', '2230', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, 'BCW 3,50 MM SOFT I', '05BI042', 'FG', 'KG', '3500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, 'BCW 2,45 MM SOFT I', '05BI050', 'FG', 'KG', '2450', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, 'BCW 2,16 MM SOFT I', '05BI060', 'FG', 'KG', '2160', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, 'BCW 2,90 MM HARD I', '05BIH34', 'FG', 'KG', '2900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, 'BCW 2,56 MM HARH I', '05BIH60', 'FG', 'KG', '2560', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, 'BCW 2,00 MM SOFT', '05BS001', 'FG', 'KG', '2000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(206, 'BCW 2,03 MM SOFT', '05BS002', 'FG', 'KG', '2030', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(207, 'BCW 2,18 MM SOFT', '05BS003', 'FG', 'KG', '2180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(208, 'BCW 2,10 MM SOFT', '05BS004', 'FG', 'KG', '2100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(209, 'BCW 2,13 MM SOFT', '05BS005', 'FG', 'KG', '2130', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(210, 'BCW 2,14 MM SOFT', '05BS006', 'FG', 'KG', '2140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(211, 'BCW 2,17 MM SOFT', '05BS007', 'FG', 'KG', '2170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(212, 'BCW 2,20 MM SOFT', '05BS008', 'FG', 'KG', '2200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(213, 'BCW 2,21 MM SOFT', '05BS009', 'FG', 'KG', '2210', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(214, 'BCW 2,24 MM SOFT', '05BS010', 'FG', 'KG', '2240', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(215, 'BCW 2,25 MM SOFT', '05BS011', 'FG', 'KG', '2250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(216, 'BCW 2,26 MM SOFT', '05BS012', 'FG', 'KG', '2260', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(217, 'BCW 2,27 MM SOFT', '05BS013', 'FG', 'KG', '2270', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(218, 'BCW 2,28 MM SOFT', '05BS014', 'FG', 'KG', '2280', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(219, 'BCW 2,30 MM SOFT', '05BS015', 'FG', 'KG', '2300', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(220, 'BCW 2,33 MM SOFT', '05BS016', 'FG', 'KG', '2330', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(221, 'BCW 2,34 MM SOFT', '05BS017', 'FG', 'KG', '2340', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(222, 'BCW 2.43 MM SOFT', '05BS018', 'FG', 'KG', '2430', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(223, 'BCW 2,53 MM SOFT', '05BS019', 'FG', 'KG', '2530', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(224, 'BCW 2,49 MM SOFT', '05BS020', 'FG', 'KG', '2490', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(225, 'BCW 2,50 MM SOFT', '05BS021', 'FG', 'KG', '2500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(226, 'BCW 2,52 MM SOFT', '05BS022', 'FG', 'KG', '2520', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(227, 'BCW 2,59 MM SOFT', '05BS023', 'FG', 'KG', '2590', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(228, 'BCW 2,60 MM SOFT', '05BS024', 'FG', 'KG', '2600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(229, 'BCW 2,66 MM SOFT', '05BS025', 'FG', 'KG', '2660', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(230, 'BCW 2,70 MM SOFT', '05BS027', 'FG', 'KG', '2700', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(231, 'BCW 2,75 MM SOFT ', '05BS028', 'FG', 'KG', '2750', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(232, 'BCW 2,76 MM SOFT', '05BS029', 'FG', 'KG', '2760', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(233, 'BCW 2,77 MM SOFT', '05BS030', 'FG', 'KG', '2770', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(234, 'BCW 2,78 MM SOFT', '05BS031', 'FG', 'KG', '2780', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(235, 'BCW 2,80 MM SOFT', '05BS032', 'FG', 'KG', '2800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(236, 'BCW 2,89 MM SOFT', '05BS033', 'FG', 'KG', '2890', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(237, 'BCW 2,73 MM SOFT', '05BS034', 'FG', 'KG', '2730', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(238, 'BCW 2,96 MM SOFT', '05BS035', 'FG', 'KG', '2960', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(239, 'BCW 2,23 MM SOFT', '05BS036', 'FG', 'KG', '2230', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(240, 'BCW 3,00 MM SOFT', '05BS037', 'FG', 'KG', '3000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(241, 'BCW 3,20 MM SOFT', '05BS038', 'FG', 'KG', '3200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(242, 'BCW 3,40 MM SOFT', '05BS040', 'FG', 'KG', '3400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(243, 'BCW 3,48 MM SOFT', '05BS041', 'FG', 'KG', '3480', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(244, 'BCW 3,50 MM SOFT', '05BS042', 'FG', 'KG', '3500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(245, 'BCW 3,52 MM SOFT', '05BS043', 'FG', 'KG', '3520', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(246, 'BCW 3,55 MM SOFT', '05BS044', 'FG', 'KG', '3550', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(247, 'BCW 3,56 MM SOFT', '05BS045', 'FG', 'KG', '3560', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(248, 'BCW 3,57 MM SOFT', '05BS046', 'FG', 'KG', '3570', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(249, 'BCW 3,58 MM SOFT', '05BS047', 'FG', 'KG', '3580', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(250, 'BCW 3,45 MM SOFT', '05BS048', 'FG', 'KG', '3450', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(251, 'BCW 3,51 MM SOFT', '05BS049', 'FG', 'KG', '3510', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(252, 'BCW 2,45 MM SOFT', '05BS050', 'FG', 'KG', '2450', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(253, 'BCW 3,70 MM SOFT', '05BS051', 'FG', 'KG', '3700', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(254, 'BCW 2,07 MM SOFT', '05BS052', 'FG', 'KG', '2070', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(255, 'BCW 2,19 MM SOFT', '05BS053', 'FG', 'KG', '2190', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(256, 'BCW 2,67 MM SOFT', '05BS054', 'FG', 'KG', '2670', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(257, 'BCW 2,40 MM SOFT', '05BS055', 'FG', 'KG', '2400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(258, 'BCW 2,90 MM SOFT', '05BS056', 'FG', 'KG', '2900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(259, 'BCW 3,60 MM SOFT', '05BS057', 'FG', 'KG', '3600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(260, 'BCW 2,08 MM SOFT', '05BS058', 'FG', 'KG', '2080', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(261, 'BCW 2,15 MM SOFT', '05BS059', 'FG', 'KG', '2150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(262, 'BCW 2,16 MM SOFT', '05BS060', 'FG', 'KG', '2160', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(263, 'BCW 2,09 MM SOFT', '05BS061', 'FG', 'KG', '2090', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(264, 'BCW 2,48 MM SOFT', '05BS062', 'FG', 'KG', '2480', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(265, 'BCW 2,65 MM SOFT', '05BS063', 'FG', 'KG', '2650', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(266, 'BCW 2,46 MM SOFT', '05BS064', 'FG', 'KG', '2460', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(267, 'BCW 2,098 MM SOFT', '05BS065', 'FG', 'KG', '2090', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(268, 'BCW 3,31 MM SOFT', '05BS066', 'FG', 'KG', '3310', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(269, 'BCW 2,65 MM SOFT TMS', '05BT006', 'FG', 'KG', '2650', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(270, 'BCW 2,17 MM SOFT TMS', '05BT007', 'FG', 'KG', '2170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(271, 'BCW 2,26 MM SOFT TMS', '05BT010', 'FG', 'KG', '2260', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(272, 'BCW 2,52 MM SOFT TMS', '05BT022', 'FG', 'KG', '2520', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(273, 'BCW 2,60 MM SOFT TMS', '05BT024', 'FG', 'KG', '2600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(274, 'BCW 3,57 MM SOFT TMS', '05BT046', 'FG', 'KG', '3570', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(275, 'BCW 3,60 MM SOFT TMS', '05BT049', 'FG', 'KG', '3600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(276, 'BCW 2,88 MM SOFT TMS', '05BT050', 'FG', 'KG', '2880', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(277, 'BCW 2,07 MM SOFT TMS', '05BT051', 'FG', 'KG', '2070', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(278, 'BCW 2,90 MM SOFT TMS', '05BT054', 'FG', 'KG', '2900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(279, 'BCW 2,23 MM SOFT TMS', '05BT055', 'FG', 'KG', '2230', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(280, 'BCW 2,76 MM SOFT TMS', '05BT056', 'FG', 'KG', '2760', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(281, 'BCW 2,78 MM SOFT TMS', '05BT057', 'FG', 'KG', '2780', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(282, 'BCW 2,96 MM SOFT TMS', '05BT058', 'FG', 'KG', '2960', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(283, 'BCW 2,28 MM SOFT TMS', '05BT059', 'FG', 'KG', '2280', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(284, 'BCW 2,05 MM SOFT TMS', '05BT060', 'FG', 'KG', '2050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(285, 'BCW 2,53 MM SOFT TMS', '05BT061', 'FG', 'KG', '2530', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(286, 'BCW 2,57 MM SOFT TMS', '05BT062', 'FG', 'KG', '2570', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(287, 'BCW 3,02 MM SOFT TMS', '05BT063', 'FG', 'KG', '3020', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(288, 'BCW 2,17 MM SOFT TMS', '05BT064', 'FG', 'KG', '2170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(289, 'BCW 2,14 MM SOFT TMS', '05BT065', 'FG', 'KG', '2140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(290, 'BCW 2,25 MM SOFT TMS', '05BT066', 'FG', 'KG', '2250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(291, 'BCW 2,39 MM SOFT TMS', '05BT067', 'FG', 'KG', '2390', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(292, 'BCW 3,70 MM SOFT TMS', '05BT068', 'FG', 'KG', '3700', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(293, 'BCW 2,20 MM SOFT TMS', '05BT069', 'FG', 'KG', '2200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(294, 'BCW 2,27 MM SOFT TMS', '05BT070', 'FG', 'KG', '2270', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(295, 'BCW 3,02 MM SOFT TMS', '05BT071', 'FG', 'KG', '3020', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(296, 'BCW 2,19 MM SOFT TMS', '05BT072', 'FG', 'KG', '2190', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(297, 'BCW 2,21 MM SOFT TMS', '05BT073', 'FG', 'KG', '2210', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(298, 'BCW 2,30 MM SOFT TMS', '05BT074', 'FG', 'KG', '2300', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(299, 'EIW 0,28 MM TYPE 1', '5.00E+01', 'FG', 'KG', '0280', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(300, 'EIW 1,80 MM TYPE 1', '5.00E+02', 'FG', 'KG', '1800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(301, 'BCW 0,40 MM HARD', '05HH001', 'FG', 'KG', '0400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(302, 'BCW 0,45 MM HARD', '05HH002', 'FG', 'KG', '0450', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(303, 'BCW 0,47 MM HARD', '05HH003', 'FG', 'KG', '0470', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(304, 'BCW 0,50 MM HARD', '05HH004', 'FG', 'KG', '0500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(305, 'BCW 0,51 MM HARD', '05HH005', 'FG', 'KG', '0510', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(306, 'BCW 0,57 MM HARD', '05HH006', 'FG', 'KG', '0570', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(307, 'BCW 0,59 MM HARD', '05HH007', 'FG', 'KG', '0590', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(308, 'BCW 0,60 MM HARD', '05HH008', 'FG', 'KG', '0600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(309, 'BCW 0,63 MM HARD', '05HH009', 'FG', 'KG', '0630', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(310, 'BCW 0,65 MM HARD', '05HH010', 'FG', 'KG', '0650', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(311, 'BCW 0,67 MM HARD', '05HH012', 'FG', 'KG', '0670', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(312, 'BCW 0,68 MM HARD', '05HH014', 'FG', 'KG', '0680', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(313, 'BCW 0,70 MM HARD', '05HH015', 'FG', 'KG', '0700', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(314, 'BCW 0,72 MM HARD', '05HH016', 'FG', 'KG', '0720', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(315, 'BCW 0,75 MM HARD', '05HH018', 'FG', 'KG', '0750', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(316, 'BCW 0,77 MM HARD', '05HH019', 'FG', 'KG', '0770', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(317, 'BCW 0,78 MM HARD', '05HH020', 'FG', 'KG', '0780', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(318, 'BCW 0,80 MM HARD', '05HH021', 'FG', 'KG', '0800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(319, 'BCW 0,83 MM HARD', '05HH022', 'FG', 'KG', '0830', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(320, 'BCW 0,85 MM HARD', '05HH024', 'FG', 'KG', '0850', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(321, 'BCW 0,87 MM HARD', '05HH025', 'FG', 'KG', '0870', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(322, 'BCW 0,89 MM HARD', '05HH026', 'FG', 'KG', '0890', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(323, 'BCW 0,90 MM HARD', '05HH027', 'FG', 'KG', '0900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(324, 'BCW 0,95 MM HARD', '05HH028', 'FG', 'KG', '0950', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(325, 'BCW 0,73 MM HARD', '05HH029', 'FG', 'KG', '0730', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(326, 'BCW 0,97 MM HARD', '05HH030', 'FG', 'KG', '0970', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(327, 'BCW 0,98 MM HARD', '05HH031', 'FG', 'KG', '0980', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(328, 'BCW 0,55 MM HARD', '05HH032', 'FG', 'KG', '0550', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(329, 'BCW 0,93 MM HARD', '05HH049', 'FG', 'KG', '0930', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(330, 'BCW 0,52 MM HARD', '05HH056', 'FG', 'KG', '0520', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(331, 'BCW 0,62 MM HARD', '05HH057', 'FG', 'KG', '0620', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(332, 'BCW 0,82 MM HARD', '05HH058', 'FG', 'KG', '0820', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(333, 'BCW 0,53 MM HARD', '05HH059', 'FG', 'KG', '0530', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(334, 'BCW 0,40 MM SOFT I', '05HI001', 'FG', 'KG', '0400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(335, 'BCW 0,50 MM SOFT I', '05HI004', 'FG', 'KG', '0500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(336, 'BCW 0,60 MM SOFT I', '05HI008', 'FG', 'KG', '0600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(337, 'BCW 0,70 MM SOFT I', '05HI015', 'FG', 'KG', '0700', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(338, 'BCW 0,80 MM SOFT I', '05HI021', 'FG', 'KG', '0800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(339, 'BCW 0,35 MM SOFT I', '05HI059', 'FG', 'KG', '0350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(340, 'BCW 0,50 MM 1/2 HARD', '05HN004', 'FG', 'KG', '0500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(341, 'BCW 0,67 1/2 MM HARD', '05HN012', 'FG', 'KG', '0670', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(342, 'BCW 0,70 MM 1/2 HARD', '05HN015', 'FG', 'KG', '0700', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(343, 'BCW 0,75 MM 1/2 HARD', '05HN018', 'FG', 'KG', '0750', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(344, 'BCW 0,80 MM 1/2 HARD', '05HN021', 'FG', 'KG', '0800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(345, 'BCW 0,83 MM 1/2 HARD', '05HN022', 'FG', 'KG', '0830', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(346, 'BCW 0,89 MM 1/2 HARD', '05HN026', 'FG', 'KG', '0890', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(347, 'BCW 0,90 MM 1/2 HARD', '05HN027', 'FG', 'KG', '0900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(348, 'BCW 0,40 MM SOFT', '05HS001', 'FG', 'KG', '0400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(349, 'BCW 0,45 MM SOFT', '05HS002', 'FG', 'KG', '0450', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(350, 'BCW 0,47 MM SOFT', '05HS003', 'FG', 'KG', '0470', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(351, 'BCW 0,50 MM SOFT', '05HS004', 'FG', 'KG', '0500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(352, 'BCW 0,51 MM SOFT', '05HS005', 'FG', 'KG', '0510', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(353, 'BCW 0,57 MM SOFT', '05HS006', 'FG', 'KG', '0570', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(354, 'BCW 0,59 MM SOFT', '05HS007', 'FG', 'KG', '0590', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(355, 'BCW 0,60 MM SOFT', '05HS008', 'FG', 'KG', '0600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(356, 'BCW 0,63 MM SOFT', '05HS009', 'FG', 'KG', '0630', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(357, 'BCW 0,65 MM SOFT', '05HS010', 'FG', 'KG', '0650', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(358, 'BCW 0,67 MM SOFT', '05HS012', 'FG', 'KG', '0670', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(359, 'BCW 0,68 MM SOFT', '05HS014', 'FG', 'KG', '0680', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(360, 'BCW 0,70 MM SOFT', '05HS015', 'FG', 'KG', '0700', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(361, 'BCW 0,72 MM SOFT', '05HS016', 'FG', 'KG', '0720', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(362, 'BCW 0,74 MM SOFT', '05HS017', 'FG', 'KG', '0740', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(363, 'BCW 0,75 MM SOFT', '05HS018', 'FG', 'KG', '0750', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(364, 'BCW 0,77 MM SOFT', '05HS019', 'FG', 'KG', '0770', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(365, 'BCW 0,78 MM SOFT', '05HS020', 'FG', 'KG', '0780', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(366, 'BCW 0,80 MM SOFT', '05HS021', 'FG', 'KG', '0800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(367, 'BCW 0,83 MM SOFT', '05HS022', 'FG', 'KG', '0830', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(368, 'BCW 0,84 MM SOFT', '05HS023', 'FG', 'KG', '0840', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(369, 'BCW 0,85 MM SOFT', '05HS024', 'FG', 'KG', '0850', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(370, 'BCW 0,87 MM SOFT', '05HS025', 'FG', 'KG', '0870', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(371, 'BCW 0,89 MM SOFT', '05HS026', 'FG', 'KG', '0890', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(372, 'BCW 0,90 MM SOFT', '05HS027', 'FG', 'KG', '0900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(373, 'BCW 0,95 MM SOFT', '05HS028', 'FG', 'KG', '0950', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(374, 'BCW 0,73 MM SOFT', '05HS029', 'FG', 'KG', '0730', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(375, 'BCW 0,97 MM SOFT', '05HS030', 'FG', 'KG', '0970', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(376, 'BCW 0,98 MM SOFT', '05HS031', 'FG', 'KG', '0980', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(377, 'BCW 0,53 MM SOFT', '05HS032', 'FG', 'KG', '0530', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(378, 'BCW 0,54 MM SOFT', '05HS057', 'FG', 'KG', '0540', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(379, 'BCW 0,55 MM SOFT', '05HS058', 'FG', 'KG', '0550', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(380, 'BCW 0,35 MM SOFT', '05HS059', 'FG', 'KG', '0350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(381, 'BCW 0,81 MM SOFT', '05HS060', 'FG', 'KG', '0810', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(382, 'BCW 0,76 MM SOFT', '05HS061', 'FG', 'KG', '0760', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(383, 'BCW 0,52 MM SOFT', '05HS062', 'FG', 'KG', '0520', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(384, 'BCW 0,495 MM SOFT', '05HS063', 'FG', 'KG', '0495', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(385, 'BCW 0,40 MM TMS SOFT', '05HT001', 'FG', 'KG', '0400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(386, 'BCW 0,85 MM TMS SOFT', '05HT002', 'FG', 'KG', '0850', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(387, 'BCW 0,50 MM TMS SOFT', '05HT004', 'FG', 'KG', '0500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(388, 'BCW 0.51 MM TMS SOFT', '05HT005', 'FG', 'KG', '0510', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(389, 'BCW 0,60 MM TMS SOFT ', '05HT008', 'FG', 'KG', '0600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(390, 'BCW 0,80 MM TMS SOFT', '05HT021', 'FG', 'KG', '0800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(391, 'BCW 0,87 MM TMS SOFT', '05HT025', 'FG', 'KG', '0870', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(392, 'BCW 0,55 MM TMS SOFT', '05HT032', 'FG', 'KG', '0550', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(393, 'BCW 0,41 MM TMS', '05HT056', 'FG', 'KG', '0410', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(394, 'BCW 0,63 MM TMS SOFT', '05HT063', 'FG', 'KG', '0630', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(395, 'BCW 0,61 MM TMS SOFT', '05HT064', 'FG', 'KG', '0610', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(396, 'BCW 0,67 MM TMS SOFT', '05HT065', 'FG', 'KG', '0670', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(397, 'PEW 0,28 MM (TYPE 1)', '05P0001', 'FG', 'KG', '0280', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(398, 'PEW 2,50 MM', '05P0002', 'FG', 'KG', '2500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(399, 'PEW 0,50 MM TYPE 2', '05P0003', 'FG', 'KG', '0500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(400, 'BCW 0,10 MM HARD', '05RH001', 'FG', 'KG', '0100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(401, 'BCW 0,11 MM HARD', '05RH002', 'FG', 'KG', '0110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(402, 'BCW 0,12 MM HARD', '05RH003', 'FG', 'KG', '0120', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(403, 'BCW 0,14 MM HARD', '05RH004', 'FG', 'KG', '0140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(404, 'BCW 0,14 MM 1/2 HARD', '05RH005', 'FG', 'KG', '0140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(405, 'BCW 0,16 MM HARD', '05RH007', 'FG', 'KG', '0160', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(406, 'BCW 0,17 MM HARD', '05RH008', 'FG', 'KG', '0170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(407, 'BCW 0,18 MM HARD', '05RH009', 'FG', 'KG', '0180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(408, 'BCW 0,24 MM HARD', '05RH014', 'FG', 'KG', '0240', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(409, 'BCW 0,10 MM HARD TMS', '05RHT01', 'FG', 'KG', '0100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(410, 'BCW 0,11 MM HARD TMS', '05RHT02', 'FG', 'KG', '0110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(411, 'BCW 0,80 MM HARD TMS', '05RHT03', 'FG', 'KG', '0800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(412, 'BCW 0,18 MM SOFT I', '05RI009', 'FG', 'KG', '0180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(413, 'BCW 0,20 MM SOFT I', '05RI010', 'FG', 'KG', '0200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(414, 'BCW 0,25 MM SOFT I', '05RI015', 'FG', 'KG', '0250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(415, 'BCW 0,255 MM SOFT I', '05RI017', 'FG', 'KG', '0255', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(416, 'BCW 0,31 MM SOFT I', '05RI021', 'FG', 'KG', '0310', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(417, 'BCW 0,32 MM SOFT I', '05RI022', 'FG', 'KG', '0320', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(418, 'BCW 0,40 MM SOFT I', '05RI053', 'FG', 'KG', '0400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(419, 'BCW 0,50 MM SOFT I', '05RI054', 'FG', 'KG', '0500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(420, 'BCW 0,11 MM HARD I', '05RIH02', 'FG', 'KG', '0110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(421, 'BCW 0,17 MM HARD I', '05RIH08', 'FG', 'KG', '0170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(422, 'BCW 0,16 MM 1/2 HARD', '05RN007', 'FG', 'KG', '0160', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(423, 'BCW 0,18 MM 1/2 HARD', '05RN009', 'FG', 'KG', '0180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(424, 'BCW 0,10 MM SOFT', '05RS001', 'FG', 'KG', '0100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(425, 'BCW 0,11 MM SOFT', '05RS002', 'FG', 'KG', '0110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(426, 'BCW 0,12 MM SOFT', '05RS003', 'FG', 'KG', '0120', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(427, 'BCW 0,13 MM SOFT', '05RS004', 'FG', 'KG', '0130', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(428, 'BCW 0,14 MM SOFT', '05RS005', 'FG', 'KG', '0140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(429, 'BCW 0,15 MM SOFT', '05RS006', 'FG', 'KG', '0150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(430, 'BCW 0,16 MM SOFT', '05RS007', 'FG', 'KG', '0160', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(431, 'BCW 0,17 MM SOFT', '05RS008', 'FG', 'KG', '0170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(432, 'BCW 0,18 MM SOFT', '05RS009', 'FG', 'KG', '0180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(433, 'BCW 0,20 MM SOFT', '05RS010', 'FG', 'KG', '0200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(434, 'BCW 0,21 MM SOFT', '05RS011', 'FG', 'KG', '0210', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(435, 'BCW 0,22 MM SOFT', '05RS012', 'FG', 'KG', '0220', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(436, 'BCW 0,23 MM SOFT', '05RS013', 'FG', 'KG', '0230', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(437, 'BCW 0,24 MM SOFT', '05RS014', 'FG', 'KG', '0240', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(438, 'BCW 0,25 MM SOFT', '05RS015', 'FG', 'KG', '0250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(439, 'BCW 0,251 MM SOFT', '05RS016', 'FG', 'KG', '0251', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(440, 'BCW 0,255 MM SOFT', '05RS017', 'FG', 'KG', '0255', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(441, 'BCW 0,26 MM SOFT', '05RS018', 'FG', 'KG', '0260', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(442, 'BCW 0,29 MM SOFT', '05RS019', 'FG', 'KG', '0290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(443, 'BCW 0,30 MM SOFT', '05RS020', 'FG', 'KG', '0300', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(444, 'BCW 0,31 MM SOFT', '05RS021', 'FG', 'KG', '0310', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(445, 'BCW 0,32 MM SOFT', '05RS022', 'FG', 'KG', '0320', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(446, 'BCW 0,35 MM SOFT', '05RS052', 'FG', 'KG', '0350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(447, 'BCW 0,40 MM SOFT', '05RS053', 'FG', 'KG', '0400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(448, 'BCW 0,50 MM SOFT', '05RS054', 'FG', 'KG', '0500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(449, 'BCW 0,19 MM SOFT', '05RS055', 'FG', 'KG', '0190', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(450, 'BCW 0,10 MM TMS SOFT', '05RT001', 'FG', 'KG', '0100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(451, 'BCW 0,11 MM TMS SOFT', '05RT002', 'FG', 'KG', '0110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(452, 'BCW 0,12 MM TMS SOFT', '05RT003', 'FG', 'KG', '0120', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(453, 'BCW 0,13 MM TMS SOFT', '05RT004', 'FG', 'KG', '0130', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(454, 'BCW 0,14 MM TMS SOFT', '05RT005', 'FG', 'KG', '0140', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(455, 'BCW 0,15 MM TMS SOFT', '05RT006', 'FG', 'KG', '0150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(456, 'BCW 0,16 MM TMS SOFT', '05RT007', 'FG', 'KG', '0160', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(457, 'BCW 0,17 MM TMS SOFT', '05RT008', 'FG', 'KG', '0170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(458, 'BCW 0,18 MM TMS SOFT', '05RT009', 'FG', 'KG', '0180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(459, 'BCW 0,20 MM TMS SOFT', '05RT010', 'FG', 'KG', '0200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(460, 'BCW 0,21 MM TMS SOFT', '05RT011', 'FG', 'KG', '0210', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(461, 'BCW 0,22 MM TMS SOFT', '05RT012', 'FG', 'KG', '0220', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(462, 'BCW 0,23 MM TMS SOFT', '05RT013', 'FG', 'KG', '0230', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(463, 'BCW 0,24 MM TMS SOFT', '05RT014', 'FG', 'KG', '0240', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(464, 'BCW 0,25 MM TMS SOFT', '05RT015', 'FG', 'KG', '0250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(465, 'BCW 0,251 MM TMS SOFT', '05RT016', 'FG', 'KG', '0251', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(466, 'BCW 0,255 MM  TMS SOFT', '05RT017', 'FG', 'KG', '0255', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(467, 'BCW 0,26 MM TMS SOFT', '05RT018', 'FG', 'KG', '0260', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(468, 'BCW 0,29 MM TMS SOFT', '05RT019', 'FG', 'KG', '0290', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(469, 'BCW 0,30 MM TMS SOFT', '05RT020', 'FG', 'KG', '0300', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(470, 'BCW 0,31 MM TMS SOFT', '05RT021', 'FG', 'KG', '0310', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(471, 'BCW 0,32 MM TMS SOFT', '05RT022', 'FG', 'KG', '0320', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(472, 'BCW 0,35 MM TMS SOFT', '05RT052', 'FG', 'KG', '0350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(473, 'BCW 0,40 MM TMS SOFT', '05RT055', 'FG', 'KG', '0400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(474, 'BCW 0,50 MM TMS SOFT', '05RT056', 'FG', 'KG', '0500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(475, 'BCW 0,41 MM TMS SOFT', '05RT057', 'FG', 'KG', '0410', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(476, 'BCW 0,252 MM TMS SOFT', '05RT058', 'FG', 'KG', '0252', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(477, 'BCW 0,175 MM TMS SOFT', '05RT059', 'FG', 'KG', '0175', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(478, 'BCW 0,155 MM TMS SOFT', '05RT060', 'FG', 'KG', '0155', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(479, 'BCW 0,82 MM TMS SOFT', '05RT061', 'FG', 'KG', '0820', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(480, 'BCW 0,19 MM TMS SOFT', '05RT062', 'FG', 'KG', '0190', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(481, 'BCW 1,78 MM TMS HARD', '05TD001', 'FG', 'KG', '1780', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(482, 'BCW 1,00 MM HARD', '05TH001', 'FG', 'KG', '1000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(483, 'BCW 1,05 mm HARD', '05TH002', 'FG', 'KG', '1050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(484, 'BCW 1,04 MM HARD', '05TH004', 'FG', 'KG', '1040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(485, 'BCW 1,10 MM HARD', '05TH008', 'FG', 'KG', '1100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(486, 'BCW 1,17 MM 1/2 HARD', '05TH010', 'FG', 'KG', '1170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(487, 'BCW 1,25 MM HARD', '05TH014', 'FG', 'KG', '1250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(488, 'BCW 1,40 MM HARD', '05TH022', 'FG', 'KG', '1400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(489, 'BCW 1,42 MM HARD', '05TH023', 'FG', 'KG', '1420', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(490, 'BCW 1,53 MM HARD', '05TH024', 'FG', 'KG', '1530', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(491, 'BCW 1,55 MM HARD', '05TH027', 'FG', 'KG', '1550', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(492, 'BCW 1,65 MM HARD', '05TH032', 'FG', 'KG', '1650', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(493, 'BCW 1,66 MM HARD', '05TH033', 'FG', 'KG', '1660', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(494, 'BCW 1,15 MM HARD', '05TH034', 'FG', 'KG', '1150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(495, 'BCW 1,83 MM HARD', '05TH045', 'FG', 'KG', '1830', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(496, 'BCW 1,94 MM HARD', '05TH046', 'FG', 'KG', '1940', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(497, 'BCW 1,31 MM HARD', '05TH053', 'FG', 'KG', '1310', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(498, 'BCW 1,12 MM HARD', '05TH054', 'FG', 'KG', '1120', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(499, 'BCW 1,45 MM HARD', '05TH055', 'FG', 'KG', '1450', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(500, 'BCW 1,07 MM HARD', '05TH056', 'FG', 'KG', '1070', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(501, 'BCW 1,45 MM 1/2 HARD', '05TH057', 'FG', 'KG', '1450', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(502, 'BCW 1,17 MM HARD', '05TH058', 'FG', 'KG', '1170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(503, 'BCW 1,52 MM HARD', '05TH059', 'FG', 'KG', '1520', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(504, 'BCW 1,92 MM HARD', '05TH061', 'FG', 'KG', '1920', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(505, 'BCW 1,00 MM SOFT  I', '05TI001', 'FG', 'KG', '1000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(506, 'BCW 1,08 MM SOFT  I', '05TI007', 'FG', 'KG', '1080', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(507, 'BCW 1,10 MM SOFT  I', '05TI008', 'FG', 'KG', '1100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(508, 'BCW 1,20 MM SOFT  I', '05TI012', 'FG', 'KG', '1200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(509, 'BCW 1,25 MM SOFT  I', '05TI014', 'FG', 'KG', '1250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(510, 'BCW 1,30 MM SOFT  I', '05TI016', 'FG', 'KG', '1300', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(511, 'BCW 1,35 MM SOFT  I', '05TI017', 'FG', 'KG', '1350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(512, 'BCW 1,36 MM SOFT  I', '05TI018', 'FG', 'KG', '1360', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(513, 'BCW 1,38 MM SOFT  I', '05TI020', 'FG', 'KG', '1380', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(514, 'BCW 1,40 MM SOFT  I', '05TI022', 'FG', 'KG', '1400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(515, 'BCW 1,50 MM SOFT  I', '05TI026', 'FG', 'KG', '1500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(516, 'BCW 1,60 MM SOFT  I', '05TI030', 'FG', 'KG', '1600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(517, 'BCW 1,70 MM SOFT  I', '05TI036', 'FG', 'KG', '1700', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(518, 'BCW 1,75 MM SOFT  I', '05TI039', 'FG', 'KG', '1750', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(519, 'BCW 1,76 MM SOFT  I', '05TI040', 'FG', 'KG', '1760', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(520, 'BCW 1,78 MM SOFT  I', '05TI042', 'FG', 'KG', '1780', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(521, 'BCW 1,05 MM SOFT I', '05TI043', 'FG', 'KG', '1050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(522, 'BCW 0,40 MM 1/2 HARD', '05TN001', 'FG', 'KG', '400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(523, 'BCW 1,10 MM 1/2 HARD', '05TN008', 'FG', 'KG', '1100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(524, 'BCW 1,15 MM 1/2 HARD', '05TN009', 'FG', 'KG', '1150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(525, 'BCW 1,17 MM 1/2 HARD', '05TN010', 'FG', 'KG', '1170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(526, 'BCW 1,20 MM 1/2 HARD', '05TN012', 'FG', 'KG', '1200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(527, 'BCW  ', '05TN020', 'FG', 'KG', '0000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(528, 'BCW 1,57 MM 1/2 HARD', '05TN028', 'FG', 'KG', '1570', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(529, 'BCW 1,60 MM 1/2 HARD', '05TN030', 'FG', 'KG', '1600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(530, 'BCW 1,00 MM SOFT', '05TS001', 'FG', 'KG', '1000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(531, 'BCW 1,015 MM SOFT', '05TS002', 'FG', 'KG', '1010', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(532, 'BCW 1,02 MM SOFT', '05TS003', 'FG', 'KG', '1020', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(533, 'BCW 1,04 MM SOFT', '05TS004', 'FG', 'KG', '1040', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(534, 'BCW 1,05 MM SOFT', '05TS005', 'FG', 'KG', '1050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(535, 'BCW 1,07 MM SOFT', '05TS006', 'FG', 'KG', '1070', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(536, 'BCW 1,08 MM SOFT', '05TS007', 'FG', 'KG', '1080', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(537, 'BCW 1,10 MM SOFT ', '05TS008', 'FG', 'KG', '1100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(538, 'BCW 1,15 MM SOFT', '05TS009', 'FG', 'KG', '1150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(539, 'BCW 1,06 MM SOFT', '05TS010', 'FG', 'KG', '1060', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(540, 'BCW 1,20 MM SOFT', '05TS012', 'FG', 'KG', '1200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(541, 'BCW 1,24 MM SOFT', '05TS013', 'FG', 'KG', '1240', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(542, 'BCW 1,25 MM SOFT', '05TS014', 'FG', 'KG', '1250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(543, 'BCW 1,27 MM SOFT ', '05TS015', 'FG', 'KG', '1270', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(544, 'BCW 1,30 MM SOFT', '05TS016', 'FG', 'KG', '1300', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(545, 'BCW 1,35 MM SOFT', '05TS017', 'FG', 'KG', '1350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(546, 'BCW 1,36 MM SOFT', '05TS018', 'FG', 'KG', '1360', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(547, 'BCW 1,37 MM SOFT', '05TS019', 'FG', 'KG', '1370', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(548, 'BCW 1,38 MM SOFT', '05TS020', 'FG', 'KG', '1380', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(549, 'BCW 1,39 MM SOFT', '05TS021', 'FG', 'KG', '1390', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(550, 'BCW 1,40 MM SOFT', '05TS022', 'FG', 'KG', '1400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(551, 'BCW 1,42 MM SOFT', '05TS023', 'FG', 'KG', '1420', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(552, 'BCW 1,43 MM SOFT', '05TS024', 'FG', 'KG', '1430', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(553, 'BCW 1,46 MM SOFT', '05TS025', 'FG', 'KG', '1460', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(554, 'BCW 1,50 MM SOFT', '05TS026', 'FG', 'KG', '1500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(555, 'BCW 1,59 MM SOFT', '05TS029', 'FG', 'KG', '1590', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(556, 'BCW 1,60 MM SOFT', '05TS030', 'FG', 'KG', '1600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(557, 'BCW 1,63 MM SOFT', '05TS031', 'FG', 'KG', '1630', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(558, 'BCW 1,65 MM SOFT', '05TS032', 'FG', 'KG', '1650', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(559, 'BCW 1,66 MM SOFT', '05TS033', 'FG', 'KG', '1660', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(560, 'BCW 1,68 MM SOFT', '05TS035', 'FG', 'KG', '1680', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(561, 'BCW 1,70 MM SOFT', '05TS036', 'FG', 'KG', '1700', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(562, 'BCW 1,71 MM SOFT', '05TS037', 'FG', 'KG', '1710', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(563, 'BCW 1,74 MM SOFT', '05TS038', 'FG', 'KG', '1740', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(564, 'BCW 1,75 MM SOFT', '05TS039', 'FG', 'KG', '1750', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(565, 'BCW 1,76 MM SOFT', '05TS040', 'FG', 'KG', '1760', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(566, 'BCW 1,77 MM SOFT', '05TS041', 'FG', 'KG', '1770', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(567, 'BCW 1,78 MM SOFT', '05TS042', 'FG', 'KG', '1780', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(568, 'BCW 1,79 MM SOFT', '05TS043', 'FG', 'KG', '1790', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(569, 'BCW 1,80 MM SOFT', '05TS044', 'FG', 'KG', '1800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(570, 'BCW 1,83 MM SOFT', '05TS045', 'FG', 'KG', '1830', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(571, 'BCW 1,85 MM SOFT', '05TS046', 'FG', 'KG', '1850', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `jenis_barang` (`id`, `jenis_barang`, `kode`, `category`, `uom`, `ukuran`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(572, 'BCW 1,84 MM SOFT', '05TS047', 'FG', 'KG', '1840', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(573, 'BCW 1,45 MM SOFT', '05TS055', 'FG', 'KG', '1450', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(574, 'BCW 1,81 MM SOFT', '05TS056', 'FG', 'KG', '1810', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(575, 'BCW 1,73 MM SOFT', '05TS057', 'FG', 'KG', '1730', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(576, 'BCW 1,21 MM SOFT', '05TS058', 'FG', 'KG', '1210', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(577, 'BCW 1,18 MM SOFT', '05TS059', 'FG', 'KG', '1180', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(578, 'BCW 1,89 MM SOFT', '05TS060', 'FG', 'KG', '1890', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(579, 'BCW 1,90 MM SOFT', '05TS061', 'FG', 'KG', '1900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(580, 'BCW 1,28 MM SOFT', '05TS062', 'FG', 'KG', '1280', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(581, 'BCW 1,52 MM SOFT', '05TS063', 'FG', 'KG', '1520', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(582, 'BCW 1,92 MM SOFT', '05TS064', 'FG', 'KG', '1920', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(583, 'BCW 1,34 MM SOFT', '05TS065', 'FG', 'KG', '1340', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(584, 'BCW 1,00 MM SOFT TMS', '05TT001', 'FG', 'KG', '1000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(585, 'BCW 1,05 MM SOFT TMS', '05TT005', 'FG', 'KG', '1050', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(586, 'BCW 1,10 MM SOFT TMS', '05TT008', 'FG', 'KG', '1100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(587, 'BCW 1,20 MM TMS', '05TT012', 'FG', 'KG', '1200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(588, 'BCW 1,38 MM SOFT TMS', '05TT020', 'FG', 'KG', '1380', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(589, 'BCW 1,40 MM TMS', '05TT022', 'FG', 'KG', '1400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(590, 'BCW 1,42 MM TMS', '05TT023', 'FG', 'KG', '1420', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(591, 'BCW 1,43 MM TMS SOFT', '05TT024', 'FG', 'KG', '1430', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(592, 'BCW 1,50 MM SOFT TMS', '05TT026', 'FG', 'KG', '1500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(593, 'BCW 1,79 MM SOFT TMS', '05TT043', 'FG', 'KG', '1790', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(594, 'BCW 1,80 MM TMS', '05TT044', 'FG', 'KG', '1800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(595, 'BCW 1,78 MM SOFT TMS', '05TT045', 'FG', 'KG', '1780', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(596, 'BCW 1,35 MM SOFT TMS', '05TT046', 'FG', 'KG', '1350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(597, 'BCW 1,02 MM SOFT TMS', '05TT048', 'FG', 'KG', '1020', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(598, 'BCW 1,43 MM SOFT TMS', '05TT049', 'FG', 'KG', '1430', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(599, 'BCW 1,84 MM SOFT TMS', '05TT050', 'FG', 'KG', '1840', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(600, 'BCW 1,71 MM SOFT TMS', '05TT051', 'FG', 'KG', '1710', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(601, 'BCW 1,92 MM SOFT TMS', '05TT052', 'FG', 'KG', '1920', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(602, 'BCW 1,36 MM SOFT TMS', '05TT053', 'FG', 'KG', '1360', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(603, 'BCW 1,75 MM SOFT TMS', '05TT054', 'FG', 'KG', '1750', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(604, 'BCW 1,76 MM SOFT TMS', '05TT055', 'FG', 'KG', '1760', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(605, 'BCW 1,73 MM SOFT TMS', '05TT056', 'FG', 'KG', '1730', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(606, 'BCW 1,53 MM SOFT TMS', '05TT060', 'FG', 'KG', '1530', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(607, 'BCW 1,55 MM SOFT TMS', '05TT061', 'FG', 'KG', '1550', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(608, 'BCW 1,37 MM SOFT TMS', '05TT062', 'FG', 'KG', '1370', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(609, 'BCW 1,74 MM SOFT TMS', '05TT063', 'FG', 'KG', '1740', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(610, 'BCW 1,85 MM SOFT TMS', '05TT064', 'FG', 'KG', '1850', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(611, 'UEW 0,40 MM (TYPE 1)', '05U0001', 'FG', 'KG', '0400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(612, 'UEW 0,90 MM (TYPE 1)', '05U0002', 'FG', 'KG', '0900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(613, 'UEW 0,95 MM (TYPE1)', '05U0003', 'FG', 'KG', '0950', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(614, 'UEW 1,40 MM (TYPE 1)', '05U0004', 'FG', 'KG', '1400', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(615, 'UEW 0,37 MM ', '05U0005', 'FG', 'KG', '0370', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(616, 'UEW 1,00 MM (TYPE 1)', '05U0006', 'FG', 'KG', '1000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(652, 'BCW 2,90 MM SOFT TMS', '04BT054', 'WIP', 'KG', '2900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(653, 'COPPER ROD 8,00 MM KERAS', '04C0001', 'WIP', 'KG', '8000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(654, 'COPPER ROD 8,00 MM CUCI', '04C0003', 'WIP', 'KG', '8000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(655, 'COPPER ROD 8,00 MM TMS', '04C0004', 'WIP', 'KG', '8000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(656, 'COPPER ROD 8,00 MM', '04C0006', 'WIP', 'KG', '8000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(657, 'COPPER ROD 8,00 MM TMS PRYSMIAN', '04C0007', 'WIP', 'KG', '8000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(658, 'COPPER ROD 8,00 MM MTU', '04C0008', 'WIP', 'KG', '8000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(659, 'COPPER ROD 20 MM', '04C0009', 'WIP', 'KG', '2000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(660, 'COPPER ROD 20 MM CUCI', '04C0010', 'WIP', 'KG', '2000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(661, 'COPPER WIRE 15 MM', '04C0011', 'WIP', 'KG', '1500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(662, 'COPPER WIRE 17,5 MM', '04C0012', 'WIP', 'KG', '1750', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(663, 'COPPER WIRE 13,5 MM', '04C0013', 'WIP', 'KG', '1350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(664, 'COPPER WIRE 2,80 MM', '04C0014', 'WIP', 'KG', '2800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(665, 'COPPER WIRE 15,5 MM', '04C0015', 'WIP', 'KG', '1550', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(666, 'COPPER WIRE 0,20 MM', '04C0016', 'WIP', 'KG', '0200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(667, 'COP 8,00 MM BAKAR ULANG', '04C0017', 'WIP', 'KG', '8000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(668, 'COP 8,00 MM CUCI BAKAR ULANG', '04C0018', 'WIP', 'KG', '8000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(669, 'COPPER WIRE 0,25 MM', '04C0019', 'WIP', 'KG', '0250', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(670, 'COPPER WIRE 1,75 MM TMS', '04C0022', 'WIP', 'KG', '1750', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(671, 'COPPER WIRE 1,76 MM TMS', '04C0023', 'WIP', 'KG', '1760', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(672, 'COPPER WIRE 0,12 MM', '04CW012', 'WIP', 'KG', '120', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(673, 'COPPER WIRE 0,67 MM', '04CW067', 'WIP', 'KG', '0670', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(674, 'COPPER WIRE 1,38 MM', '04CW138', 'WIP', 'KG', '1380', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(676, 'ALUMINIUM ROD EC GRADE DIA 7,6 MM', '28A0001', 'WIP', 'KG', '7600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(677, 'ALUMINIUM ROD EC GRADE DIA 9,5 MM', '28A0002', 'WIP', 'KG', '9500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(678, 'ALUMINIUM A2C 7,6 MM EC GRADE', '28A0003', 'WIP', 'KG', '7600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(679, 'ALUMINIUM AAC 7,6 MM EC GRADE', '28A0004', 'WIP', 'KG', '7600', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(680, 'A2C 1,35 MM', '29A1002', 'FG', 'KG', '1350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(681, 'A2C 1,15 MM', '29A1003', 'FG', 'KG', '1150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(682, 'A2C 1,10 MM', '29A1005', 'FG', 'KG', '1100', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(683, 'A2C 2,50 MM', '29A2001', 'FG', 'KG', '2500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(684, 'A2C 3,20 MM', '29A3001', 'FG', 'KG', '3200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(685, 'A2C 3,50 MM', '29A3002', 'FG', 'KG', '3500', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(686, 'A2C 7,20 MM', '29A7001', 'FG', 'KG', '7200', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(687, 'A2C 7 X 1,15 MM', '29AT701', 'FG', 'KG', '7115', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(688, 'A2C 7 X 1,10 MM', '29AT702', 'FG', 'KG', '7110', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(689, 'BCW 2,54 MM SOFT TMS', '05BT075', 'FG', 'KG', '2540', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(690, 'COPPER ROD 8,00 MM', '05BH061', 'FG', 'KG', '8000', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(691, 'EIW 0,28 MM TYPE 1', '05E0001', 'FG', 'KG', '0280', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(692, 'EIW 1,80 MM TYPE 1', '05E0002', 'FG', 'KG', '1800', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(693, 'BCW 0,90 MM SOFT I', '05HI060', 'FG', 'KG', '0900', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(694, 'BCW 0,30 MM SOFT I', '05HI061', 'FG', 'KG', '0300', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(695, 'BCW 0,76 MM SOFT I', '05HI062', 'FG', 'KG', '0760', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(696, 'BCW 0,67 MM SOFT I', '05HI063', 'FG', 'KG', '0670', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(697, 'BCW 0,53 MM TMS SOFT', '05HT066', 'FG', 'KG', '0530', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(698, 'BCW 0,52 MM TMS SOFT', '05HT067', 'FG', 'KG', '0520', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(699, 'BCW 0,16 MM SOFT I', '05RI055', 'FG', 'KG', '0160', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(700, 'BCW 0,30 MM SOFT I', '05RI056', 'FG', 'KG', '0300', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(701, 'BCW 0,17 MM SOFT I', '05RI057', 'FG', 'KG', '0170', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(702, 'BCW 1,35 MM SOFT TMS', '05TT065', 'FG', 'KG', '1350', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(703, 'BCW 1,15 MM SOFT TMS', '05TT066', 'FG', 'KG', '1150', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(704, 'BCW 0,76 MM SOFT TMS', '05HT068', 'FG', 'KG', '0760', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(378, 374, 'delete'),
(379, 292, 'save_spb'),
(380, 1, 'R_Matching'),
(381, 380, 'index'),
(382, 380, 'add'),
(383, 380, 'edit'),
(384, 380, 'view'),
(385, 380, 'create_sj'),
(386, 380, 'create_po'),
(387, 380, 'update'),
(388, 380, 'print'),
(389, 1, 'R_InvoiceJasa'),
(390, 389, 'index'),
(391, 389, 'view'),
(392, 389, 'edit'),
(393, 389, 'print_po'),
(394, 389, 'add'),
(395, 1, 'R_PurchaseOrder'),
(396, 395, 'index'),
(397, 395, 'edit'),
(398, 395, 'view'),
(399, 395, 'create_so'),
(400, 395, 'create_sj'),
(401, 395, 'print'),
(402, 1, 'R_SO'),
(403, 402, 'index'),
(404, 402, 'edit'),
(405, 402, 'view'),
(406, 402, 'print'),
(407, 402, 'create_sj_so'),
(408, 402, 'add'),
(409, 1, 'R_TollingResmi'),
(410, 409, 'index'),
(411, 409, 'add'),
(412, 409, 'view_tolling'),
(413, 409, 'print'),
(415, 1, 'R_SuratJalan'),
(416, 415, 'index'),
(417, 415, 'add_surat_jalan'),
(418, 415, 'edit_surat_jalan'),
(419, 415, 'print'),
(420, 415, 'create_tolling'),
(421, 415, 'create_invoice_jasa'),
(422, 395, 'add'),
(423, 415, 'view_surat_jalan');

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
  `nomor_urut` varchar(5) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bobbin`
--

INSERT INTO `m_bobbin` (`id`, `tanggal`, `nomor_bobbin`, `m_jenis_packing_id`, `owner_id`, `borrowed_by`, `borrowed_by_supplier`, `m_bobbin_size_id`, `berat`, `nomor_urut`, `status`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, '2012-12-12', 'KA001', 1, 0, 0, 0, 10, 58.9, 'A001', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(2, '2012-12-12', 'KA002', 1, 0, 0, 0, 10, 59.3, 'A002', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(3, '2012-12-12', 'KA003', 1, 0, 0, 0, 10, 59.1, 'A003', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(4, '2012-12-12', 'KA004', 1, 0, 0, 0, 10, 59.6, 'A004', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(5, '2012-12-12', 'KA005', 1, 0, 0, 0, 10, 59.4, 'A005', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(6, '2012-12-12', 'KA006', 1, 0, 0, 0, 10, 59.3, 'A006', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(7, '2012-12-12', 'KA007', 1, 0, 0, 0, 10, 59, 'A007', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(8, '2012-12-12', 'KA008', 1, 0, 0, 0, 10, 58.7, 'A008', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(9, '2012-12-12', 'KA009', 1, 0, 0, 0, 10, 59.2, 'A009', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(10, '2012-12-12', 'KA010', 1, 0, 0, 0, 10, 60.3, 'A010', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(11, '2012-12-12', 'KA011', 1, 0, 0, 0, 10, 58.9, 'A011', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(12, '2012-12-12', 'KA012', 1, 0, 0, 0, 10, 58.6, 'A012', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(13, '2012-12-12', 'KA013', 1, 0, 0, 0, 10, 58.5, 'A013', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(14, '2012-12-12', 'KA014', 1, 0, 0, 0, 10, 59.1, 'A014', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(15, '2012-12-12', 'KA015', 1, 0, 0, 0, 10, 57.9, 'A015', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(16, '2012-12-12', 'KA016', 1, 0, 0, 0, 10, 59.4, 'A016', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(17, '2012-12-12', 'KA017', 1, 0, 0, 0, 10, 58.3, 'A017', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(18, '2012-12-12', 'KA018', 1, 0, 0, 0, 10, 58.7, 'A018', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(19, '2012-12-12', 'KA019', 1, 0, 0, 0, 10, 57.8, 'A019', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(20, '2012-12-12', 'KA020', 1, 0, 0, 0, 10, 59.3, 'A020', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(21, '2012-12-12', 'KA021', 1, 0, 0, 0, 10, 58.6, 'A021', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(22, '2012-12-12', 'KA022', 1, 0, 0, 0, 10, 58.8, 'A022', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(23, '2012-12-12', 'KA023', 1, 0, 0, 0, 10, 58.8, 'A023', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(24, '2012-12-12', 'KA024', 1, 0, 0, 0, 10, 59.3, 'A024', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(25, '2012-12-12', 'KA025', 1, 0, 0, 0, 10, 58.6, 'A025', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(26, '2012-12-12', 'KA026', 1, 0, 0, 0, 10, 60.1, 'A026', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(27, '2012-12-12', 'KA027', 1, 0, 0, 0, 10, 58.8, 'A027', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(28, '2012-12-12', 'KA028', 1, 0, 0, 0, 10, 58.7, 'A028', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(29, '2012-12-12', 'KA029', 1, 0, 0, 0, 10, 58.6, 'A029', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(30, '2012-12-12', 'KA030', 1, 0, 0, 0, 10, 58.8, 'A030', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(31, '2012-12-12', 'KA031', 1, 0, 0, 0, 10, 59.8, 'A031', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(32, '2012-12-12', 'KA032', 1, 0, 0, 0, 10, 59.6, 'A032', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(33, '2012-12-12', 'KA033', 1, 0, 0, 0, 10, 58.8, 'A033', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(34, '2012-12-12', 'KA034', 1, 0, 0, 0, 10, 59.1, 'A034', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(35, '2012-12-12', 'KA035', 1, 0, 0, 0, 10, 59.2, 'A035', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(36, '2012-12-12', 'KA036', 1, 0, 0, 0, 10, 58.2, 'A036', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(37, '2012-12-12', 'KA037', 1, 0, 0, 0, 10, 58.8, 'A037', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(38, '2012-12-12', 'KA038', 1, 0, 0, 0, 10, 58.1, 'A038', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(39, '2012-12-12', 'KA039', 1, 0, 0, 0, 10, 58.5, 'A039', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(40, '2012-12-12', 'KA040', 1, 0, 0, 0, 10, 59.3, 'A040', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(41, '2012-12-20', 'KA041', 1, 0, 0, 0, 10, 58.5, 'A041', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(42, '2012-12-20', 'KA042', 1, 0, 0, 0, 10, 59.3, 'A042', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(43, '2012-12-20', 'KA043', 1, 0, 0, 0, 10, 58.6, 'A043', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(44, '2012-12-20', 'KA044', 1, 0, 0, 0, 10, 59.2, 'A044', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(45, '2012-12-20', 'KA045', 1, 0, 0, 0, 10, 60.8, 'A045', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(46, '2012-12-20', 'KA046', 1, 0, 0, 0, 10, 59.5, 'A046', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(47, '2012-12-20', 'KA047', 1, 0, 0, 0, 10, 59.2, 'A047', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(48, '2012-12-20', 'KA048', 1, 0, 0, 0, 10, 59.2, 'A048', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(49, '2012-12-20', 'KA049', 1, 0, 0, 0, 10, 58.9, 'A049', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(50, '2012-12-20', 'KA050', 1, 0, 0, 0, 10, 59.5, 'A050', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(51, '2012-12-20', 'KA051', 1, 0, 0, 0, 10, 59.2, 'A051', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(52, '2012-12-20', 'KA052', 1, 0, 0, 0, 10, 59.4, 'A052', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(53, '2012-12-20', 'KA053', 1, 0, 0, 0, 10, 58.6, 'A053', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(54, '2012-12-20', 'KA054', 1, 0, 0, 0, 10, 59.2, 'A054', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(55, '2012-12-20', 'KA055', 1, 0, 0, 0, 10, 59, 'A055', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(56, '2012-12-20', 'KA056', 1, 0, 0, 0, 10, 58.6, 'A056', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(57, '2012-12-20', 'KA057', 1, 0, 0, 0, 10, 61.2, 'A057', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(58, '2012-12-20', 'KA058', 1, 0, 0, 0, 10, 58.4, 'A058', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(59, '2012-12-20', 'KA059', 1, 0, 0, 0, 10, 58.7, 'A059', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(60, '2012-12-20', 'KA060', 1, 0, 0, 0, 10, 58.7, 'A060', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(61, '2012-12-27', 'KA061', 1, 0, 0, 0, 10, 59.2, 'A061', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(62, '2012-12-27', 'KA062', 1, 0, 0, 0, 10, 59.1, 'A062', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(63, '2012-12-27', 'KA063', 1, 0, 0, 0, 10, 59.7, 'A063', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(64, '2012-12-27', 'KA064', 1, 0, 0, 0, 10, 62.1, 'A064', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(65, '2012-12-27', 'KA065', 1, 0, 0, 0, 10, 59.3, 'A065', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(66, '2012-12-27', 'KA066', 1, 0, 0, 0, 10, 59.2, 'A066', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(67, '2012-12-27', 'KA067', 1, 0, 0, 0, 10, 59.6, 'A067', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(68, '2012-12-27', 'KA068', 1, 0, 0, 0, 10, 61.8, 'A068', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(69, '2012-12-27', 'KA069', 1, 0, 0, 0, 10, 59.4, 'A069', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(70, '2012-12-27', 'KA070', 1, 0, 0, 0, 10, 59.8, 'A070', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(71, '2012-12-27', 'KA071', 1, 0, 0, 0, 10, 58.7, 'A071', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(72, '2012-12-27', 'KA072', 1, 0, 0, 0, 10, 59.5, 'A072', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(73, '2012-12-27', 'KA073', 1, 0, 0, 0, 10, 59, 'A073', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(74, '2012-12-27', 'KA074', 1, 0, 0, 0, 10, 59.6, 'A074', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(75, '2012-12-27', 'KA075', 1, 0, 0, 0, 10, 58.9, 'A075', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(76, '2012-12-27', 'KA076', 1, 0, 0, 0, 10, 58.9, 'A076', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(77, '2012-12-27', 'KA077', 1, 0, 0, 0, 10, 59.3, 'A077', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(78, '2012-12-27', 'KA078', 1, 0, 0, 0, 10, 58.9, 'A078', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(79, '2012-12-27', 'KA079', 1, 0, 0, 0, 10, 58.9, 'A079', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(80, '2012-12-27', 'KA080', 1, 0, 0, 0, 10, 59.3, 'A080', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(81, '2013-01-03', 'KA081', 1, 0, 0, 0, 10, 59.9, 'A081', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(82, '2013-01-03', 'KA082', 1, 0, 0, 0, 10, 60.5, 'A082', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(83, '2013-01-03', 'KA083', 1, 0, 0, 0, 10, 59.4, 'A083', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(84, '2013-01-03', 'KA084', 1, 0, 0, 0, 10, 59.2, 'A084', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(85, '2013-01-03', 'KA085', 1, 0, 0, 0, 10, 59.3, 'A085', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(86, '2013-01-03', 'KA086', 1, 0, 0, 0, 10, 59.1, 'A086', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(87, '2013-01-03', 'KA087', 1, 0, 0, 0, 10, 59.6, 'A087', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(88, '2013-01-03', 'KA088', 1, 0, 0, 0, 10, 59.4, 'A088', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(89, '2013-01-03', 'KA089', 1, 0, 0, 0, 10, 59.1, 'A089', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(90, '2013-01-03', 'KA090', 1, 0, 0, 0, 10, 59.3, 'A090', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(91, '2013-01-03', 'KA091', 1, 0, 0, 0, 10, 58.5, 'A091', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(92, '2013-01-03', 'KA092', 1, 0, 0, 0, 10, 59.2, 'A092', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(93, '2013-01-03', 'KA093', 1, 0, 0, 0, 10, 59.1, 'A093', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(94, '2013-01-03', 'KA094', 1, 0, 0, 0, 10, 59.7, 'A094', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(95, '2013-01-03', 'KA095', 1, 0, 0, 0, 10, 59.1, 'A095', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(96, '2013-01-03', 'KA096', 1, 0, 0, 0, 10, 58.2, 'A096', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(97, '2013-01-03', 'KA097', 1, 0, 0, 0, 10, 59.3, 'A097', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(98, '2013-01-03', 'KA098', 1, 0, 0, 0, 10, 59.1, 'A098', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(99, '2013-01-03', 'KA099', 1, 0, 0, 0, 10, 58.6, 'A099', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(100, '2013-01-03', 'KA100', 1, 0, 0, 0, 10, 59.4, 'A100', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(101, '2010-12-31', 'L0002', 1, 0, 0, 0, 11, 56.9, '0002', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(102, '2010-12-31', 'L0003', 1, 0, 0, 0, 11, 55.2, '0003', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(103, '2010-12-31', 'L0004', 1, 0, 0, 0, 11, 64.2, '0004', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(104, '2010-12-31', 'L0005', 1, 0, 0, 0, 11, 63.2, '0005', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(105, '2010-12-31', 'L0006', 1, 0, 8, 0, 11, 64.5, '0006', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(106, '2010-12-31', 'L0009', 1, 0, 0, 0, 11, 64.2, '0009', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(107, '2010-12-31', 'L0010', 1, 0, 0, 0, 11, 56.5, '0010', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(108, '2010-12-31', 'L0011', 1, 0, 0, 0, 11, 55.8, '0011', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(109, '2010-12-31', 'L0012', 1, 0, 0, 0, 11, 59.6, '0012', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(110, '2010-12-31', 'L0013', 1, 0, 0, 0, 11, 63.4, '0013', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(111, '2010-12-31', 'L0014', 1, 0, 0, 0, 11, 57.8, '0014', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(112, '2010-12-31', 'L0017', 1, 0, 0, 0, 11, 58.5, '0017', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(113, '2010-12-31', 'L0019', 1, 0, 0, 0, 11, 53.8, '0019', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(114, '2010-12-31', 'L0026', 1, 0, 8, 0, 11, 59.8, '0026', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(115, '2010-12-31', 'L0027', 1, 0, 0, 0, 11, 58.9, '0027', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(116, '2010-12-31', 'L0029', 1, 0, 0, 0, 11, 63.7, '0029', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(117, '2010-12-31', 'L0030', 1, 0, 0, 0, 11, 59.6, '0030', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(118, '2010-12-31', 'L0031', 1, 0, 0, 0, 11, 56.1, '0031', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(119, '2010-12-31', 'L0033', 1, 0, 0, 0, 11, 63, '0033', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(120, '2010-12-31', 'L0034', 1, 0, 8, 0, 11, 63.8, '0034', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(121, '2010-12-31', 'L0036', 1, 0, 0, 0, 11, 54.5, '0036', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(122, '2010-12-31', 'L0038', 1, 0, 0, 0, 11, 55.2, '0038', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(123, '2010-12-31', 'L0040', 1, 0, 8, 0, 11, 63.5, '0040', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(124, '2010-12-31', 'L0041', 1, 0, 0, 0, 11, 59.5, '0041', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(125, '2010-12-31', 'L0042', 1, 0, 0, 0, 11, 61.3, '0042', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(126, '2010-12-31', 'L0043', 1, 0, 0, 0, 11, 56.1, '0043', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(127, '2010-12-31', 'L0044', 1, 0, 0, 0, 11, 59.9, '0044', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(128, '2010-12-31', 'L0059', 1, 0, 0, 0, 11, 63.9, '0059', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(129, '2010-12-31', 'L0060', 1, 0, 0, 0, 11, 57, '0060', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(130, '2010-12-31', 'L0084', 1, 0, 0, 0, 11, 48.7, '0084', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(131, '2010-12-31', 'L0085', 1, 0, 0, 0, 11, 49.3, '0085', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(132, '2010-12-31', 'L0086', 1, 0, 0, 0, 11, 49.2, '0086', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(133, '2010-12-31', 'L0087', 1, 0, 0, 0, 11, 50.4, '0087', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(134, '2010-12-31', 'L0088', 1, 0, 0, 0, 11, 51.7, '0088', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(135, '2010-12-31', 'L0089', 1, 0, 0, 0, 11, 50, '0089', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(136, '2010-12-31', 'L0090', 1, 0, 0, 0, 11, 49.9, '0090', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(137, '2010-12-31', 'L0092', 1, 0, 0, 0, 11, 58.5, '0092', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(138, '2010-12-31', 'L0093', 1, 0, 0, 0, 11, 64.4, '0093', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(139, '2010-12-31', 'L0094', 1, 0, 0, 0, 11, 64.2, '0094', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(140, '2010-12-31', 'L0097', 1, 0, 0, 0, 11, 57.3, '0097', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(141, '2010-12-31', 'L0102', 1, 0, 0, 0, 11, 60, '0102', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(142, '2010-12-31', 'L0104', 1, 0, 0, 0, 11, 57.4, '0104', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(143, '2010-12-31', 'L0105', 1, 0, 0, 0, 11, 61.9, '0105', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(144, '2010-12-31', 'L0106', 1, 0, 0, 0, 11, 49.9, '0106', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(145, '2010-12-31', 'L0107', 1, 0, 0, 0, 11, 49, '0107', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(146, '2010-12-31', 'L0108', 1, 0, 0, 0, 11, 47.6, '0108', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(147, '2010-12-31', 'L0109', 1, 0, 0, 0, 11, 49.8, '0109', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(148, '2010-12-31', 'L0110', 1, 0, 0, 0, 11, 49.6, '0110', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(149, '2010-12-31', 'L0112', 1, 0, 0, 0, 11, 49.6, '0112', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(150, '2010-12-31', 'L0113', 1, 0, 0, 0, 11, 48.6, '0113', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(151, '2010-12-31', 'L0117', 1, 0, 0, 0, 11, 64.3, '0117', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(152, '2010-12-31', 'L0118', 1, 0, 0, 0, 11, 50.1, '0118', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(153, '2010-12-31', 'L0119', 1, 0, 0, 0, 11, 49.4, '0119', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(154, '2010-12-31', 'L0121', 1, 0, 0, 0, 11, 62.8, '0121', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(155, '2010-12-31', 'L0123', 1, 0, 0, 0, 11, 54.3, '0123', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(156, '2010-12-31', 'L0124', 1, 0, 0, 0, 11, 56.3, '0124', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(157, '2010-12-31', 'L0127', 1, 0, 0, 0, 11, 63.6, '0127', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(158, '2010-12-31', 'L0128', 1, 0, 0, 0, 11, 58.1, '0128', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(159, '2010-12-31', 'L0129', 1, 0, 0, 0, 11, 57.6, '0129', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(160, '2010-12-31', 'L0130', 1, 0, 0, 0, 11, 56.4, '0130', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(161, '2010-12-31', 'L0133', 1, 0, 0, 0, 11, 54.6, '0133', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(162, '2010-12-31', 'L0134', 1, 0, 0, 0, 11, 57.7, '0134', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(163, '2010-12-31', 'L0135', 1, 0, 0, 0, 11, 64.2, '0135', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(164, '2010-12-31', 'L0136', 1, 0, 0, 0, 11, 63.9, '0136', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(165, '2010-12-31', 'L0140', 1, 0, 0, 0, 11, 57.7, '0140', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(166, '2010-12-31', 'L0142', 1, 0, 0, 0, 11, 55.9, '0142', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(167, '2010-12-31', 'L0144', 1, 0, 0, 0, 11, 64.1, '0144', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(168, '2010-12-31', 'L0147', 1, 0, 0, 0, 11, 63.7, '0147', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(169, '2010-12-31', 'L0148', 1, 0, 0, 0, 11, 64, '0148', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(170, '2010-12-31', 'L0149', 1, 0, 0, 0, 11, 54.1, '0149', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(171, '2010-12-31', 'L0152', 1, 0, 0, 0, 11, 51.4, '0152', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(172, '2010-12-31', 'L0160', 1, 0, 0, 0, 11, 58, '0160', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(173, '2010-12-31', 'L0161', 1, 0, 0, 0, 11, 56.8, '0161', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(174, '2010-12-31', 'L0163', 1, 0, 0, 0, 11, 57.1, '0163', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(175, '2010-12-31', 'L0169', 1, 0, 0, 0, 11, 55.6, '0169', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(176, '2010-12-31', 'L0170', 1, 0, 0, 0, 11, 55.6, '0170', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(177, '2010-12-31', 'L0171', 1, 0, 0, 0, 11, 57.5, '0171', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(178, '2010-12-31', 'L0172', 1, 0, 0, 0, 11, 55.6, '0172', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(179, '2010-12-31', 'L0173', 1, 0, 0, 0, 11, 58.5, '0173', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(180, '2010-12-31', 'L0175', 1, 0, 0, 0, 11, 64, '0175', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(181, '2010-12-31', 'L0176', 1, 0, 0, 0, 11, 62.5, '0176', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(182, '2010-12-31', 'L0178', 1, 0, 0, 0, 11, 55.7, '0178', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(183, '2010-12-31', 'L0179', 1, 0, 0, 0, 11, 55.2, '0179', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(184, '2010-12-31', 'L0180', 1, 0, 0, 0, 11, 53.8, '0180', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(185, '2010-12-31', 'L0181', 1, 0, 0, 0, 11, 54.5, '0181', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(186, '2010-12-31', 'L0186', 1, 0, 0, 0, 11, 63.7, '0186', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(187, '2010-12-31', 'L0188', 1, 0, 0, 0, 11, 63.4, '0188', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(188, '2010-12-31', 'L0189', 1, 0, 0, 0, 11, 64, '0189', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(189, '2010-12-31', 'L0196', 1, 0, 0, 0, 11, 54.9, '0196', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(190, '2010-12-31', 'L0203', 1, 0, 0, 0, 11, 56.8, '0203', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(191, '2010-12-31', 'L0205', 1, 0, 0, 0, 11, 59, '0205', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(192, '2010-12-31', 'L0208', 1, 0, 0, 0, 11, 55.4, '0208', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(193, '2010-12-31', 'L0210', 1, 0, 0, 0, 11, 54.9, '0210', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(194, '2010-12-31', 'L0211', 1, 0, 0, 0, 11, 53.8, '0211', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(195, '2010-12-31', 'L0213', 1, 0, 0, 0, 11, 60, '0213', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(196, '2010-12-31', 'L0215', 1, 0, 0, 0, 11, 63.6, '0215', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(197, '2010-12-31', 'L0222', 1, 0, 0, 0, 11, 57.6, '0222', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(198, '2010-12-31', 'L0224', 1, 0, 0, 0, 11, 58.5, '0224', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(199, '2010-12-31', 'L0225', 1, 0, 0, 0, 11, 61.9, '0225', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(200, '2010-12-31', 'L0229', 1, 0, 0, 0, 11, 64.9, '0229', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(201, '2010-12-31', 'L0232', 1, 0, 0, 0, 11, 63, '0232', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(202, '2010-12-31', 'L0248', 1, 0, 0, 0, 11, 55, '0248', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(203, '2010-12-31', 'L0255', 1, 0, 0, 0, 11, 48.8, '0255', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(204, '2010-12-31', 'L0259', 1, 0, 0, 0, 11, 55.5, '0259', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(205, '2010-12-31', 'L0260', 1, 0, 0, 0, 11, 56.7, '0260', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(206, '2010-12-31', 'L0261', 1, 0, 0, 0, 11, 64.3, '0261', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(207, '2010-12-31', 'L0263', 1, 0, 0, 0, 11, 63.2, '0263', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(208, '2010-12-31', 'L0281', 1, 0, 0, 0, 11, 55.3, '0281', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(209, '2010-12-31', 'L0282', 1, 0, 0, 0, 11, 58, '0282', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(210, '2010-12-31', 'L0285', 1, 0, 0, 0, 11, 59.3, '0285', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(211, '2010-12-31', 'L0286', 1, 0, 0, 0, 11, 59, '0286', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(212, '2010-12-31', 'L0290', 1, 0, 0, 0, 11, 57, '0290', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(213, '2010-12-31', 'L0291', 1, 0, 0, 0, 11, 64.1, '0291', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(214, '2010-12-31', 'L0293', 1, 0, 0, 0, 11, 64.1, '0293', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(215, '2010-12-31', 'L0296', 1, 0, 0, 0, 11, 57.2, '0296', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(216, '2010-12-31', 'L0299', 1, 0, 0, 0, 11, 64.2, '0299', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(217, '2010-12-31', 'L0300', 1, 0, 0, 0, 11, 55, '0300', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(218, '2010-12-31', 'L0304', 1, 0, 0, 0, 11, 56.6, '0304', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(219, '2010-12-31', 'L0305', 1, 0, 0, 0, 11, 56.6, '0305', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(220, '2010-12-31', 'L0307', 1, 0, 0, 0, 11, 63, '0307', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(221, '2010-12-31', 'L0308', 1, 0, 0, 0, 11, 58, '0308', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(222, '2010-12-31', 'L0309', 1, 0, 0, 0, 11, 64.6, '0309', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(223, '2010-12-31', 'L0311', 1, 0, 0, 0, 11, 57, '0311', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(224, '2010-12-31', 'L0312', 1, 0, 0, 0, 11, 64, '0312', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(225, '2010-12-31', 'L0314', 1, 0, 0, 0, 11, 64.7, '0314', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(226, '2010-12-31', 'L0317', 1, 0, 0, 0, 11, 63.5, '0317', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(227, '2010-12-31', 'L0321', 1, 0, 0, 0, 11, 56.3, '0321', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(228, '2010-12-31', 'L0344', 1, 0, 0, 0, 11, 58.4, '0344', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(229, '2010-12-31', 'L0346', 1, 0, 0, 0, 11, 56.4, '0346', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(230, '2010-12-31', 'L0347', 1, 0, 0, 0, 11, 63.6, '0347', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(231, '2010-12-31', 'L0351', 1, 0, 0, 0, 11, 49.3, '0351', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(232, '2010-12-31', 'L0352', 1, 0, 0, 0, 11, 56.1, '0352', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(233, '2010-12-31', 'L0354', 1, 0, 0, 0, 11, 50.4, '0354', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(234, '2010-12-31', 'L0355', 1, 0, 0, 0, 11, 64.8, '0355', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(235, '2010-12-31', 'L0356', 1, 0, 0, 0, 11, 56.8, '0356', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(236, '2010-12-31', 'L0357', 1, 0, 0, 0, 11, 52.6, '0357', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(237, '2010-12-31', 'L0358', 1, 0, 0, 0, 11, 56.4, '0358', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(238, '2010-12-31', 'L0359', 1, 0, 0, 0, 11, 63.8, '0359', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(239, '2010-12-31', 'L0360', 1, 0, 0, 0, 11, 64.3, '0360', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(240, '2010-12-31', 'L0361', 1, 0, 0, 0, 11, 54.2, '0361', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(241, '2010-12-31', 'L0362', 1, 0, 0, 0, 11, 60.2, '0362', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(242, '2010-12-31', 'L0363', 1, 0, 0, 0, 11, 63.8, '0363', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(243, '2010-12-31', 'L0364', 1, 0, 0, 0, 11, 64, '0364', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(244, '2010-12-31', 'L0368', 1, 0, 0, 0, 11, 57.9, '0368', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(245, '2010-12-31', 'L0369', 1, 0, 0, 0, 11, 63.6, '0369', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(246, '2010-12-31', 'L0374', 1, 0, 0, 0, 11, 56.3, '0374', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(247, '2010-12-31', 'L0375', 1, 0, 0, 0, 11, 57.4, '0375', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(248, '2010-12-31', 'L0377', 1, 0, 0, 0, 11, 55.3, '0377', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(249, '2010-12-31', 'L0381', 1, 0, 0, 0, 11, 64.5, '0381', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(250, '2010-12-31', 'L0384', 1, 0, 0, 0, 11, 57.3, '0384', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(251, '2010-12-31', 'L0385', 1, 0, 0, 0, 11, 55.4, '0385', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(252, '2010-12-31', 'L0387', 1, 0, 0, 0, 11, 57, '0387', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(253, '2010-12-31', 'L0389', 1, 0, 0, 0, 11, 57.5, '0389', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(254, '2010-12-31', 'L0391', 1, 0, 0, 0, 11, 63.1, '0391', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(255, '2010-12-31', 'L0393', 1, 0, 0, 0, 11, 63.7, '0393', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(256, '2010-12-31', 'L0394', 1, 0, 0, 0, 11, 55.3, '0394', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(257, '2010-12-31', 'L0398', 1, 0, 0, 0, 11, 64.1, '0398', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(258, '2010-12-31', 'L0400', 1, 0, 0, 0, 11, 64.3, '0400', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(259, '2010-12-31', 'L0402', 1, 0, 0, 0, 11, 61.2, '0402', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(260, '2010-12-31', 'L0406', 1, 0, 0, 0, 11, 64.1, '0406', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(261, '2010-12-31', 'L0408', 1, 0, 0, 0, 11, 55, '0408', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(262, '2010-12-31', 'L0409', 1, 0, 0, 0, 11, 57.7, '0409', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(263, '2010-12-31', 'L0411', 1, 0, 0, 0, 11, 57, '0411', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(264, '2010-12-31', 'L0412', 1, 0, 0, 0, 11, 60, '0412', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(265, '2010-12-31', 'L0413', 1, 0, 0, 0, 11, 55, '0413', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(266, '2010-12-31', 'L0415', 1, 0, 0, 0, 11, 56.7, '0415', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(267, '2010-12-31', 'L0416', 1, 0, 0, 0, 11, 64, '0416', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(268, '2010-12-31', 'L0418', 1, 0, 0, 0, 11, 64.1, '0418', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(269, '2010-12-31', 'L0419', 1, 0, 0, 0, 11, 56, '0419', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(270, '2010-12-31', 'L0420', 1, 0, 0, 0, 11, 58.8, '0420', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(271, '2010-12-31', 'L0422', 1, 0, 0, 0, 11, 57.4, '0422', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(272, '2010-12-31', 'L0423', 1, 0, 0, 0, 11, 58.3, '0423', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(273, '2010-12-31', 'L0425', 1, 0, 0, 0, 11, 63.7, '0425', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(274, '2010-12-31', 'L0426', 1, 0, 0, 0, 11, 55.1, '0426', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(275, '2010-12-31', 'L0428', 1, 0, 0, 0, 11, 59.3, '0428', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(276, '2010-12-31', 'L0429', 1, 0, 0, 0, 11, 63.7, '0429', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(277, '2013-01-16', 'L0434', 1, 0, 0, 0, 11, 58.7, '0434', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(278, '2010-12-31', 'L0437', 1, 0, 0, 0, 11, 54.5, '0437', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(279, '2010-12-31', 'L0440', 1, 0, 0, 0, 11, 62.5, '0440', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(280, '2010-12-31', 'L0450', 1, 0, 0, 0, 11, 62.8, '0450', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(281, '2010-12-31', 'L0451', 1, 0, 0, 0, 11, 64, '0451', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(282, '2010-12-31', 'L0453', 1, 0, 0, 0, 11, 62.7, '0453', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(283, '2010-12-31', 'L0456', 1, 0, 0, 0, 11, 48.6, '0456', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(284, '2010-12-31', 'L0461', 1, 0, 0, 0, 11, 57.5, '0461', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(285, '2010-12-31', 'L0463', 1, 0, 0, 0, 11, 58, '0463', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(286, '2010-12-31', 'L0470', 1, 0, 0, 0, 11, 64, '0470', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(287, '2010-12-31', 'L0473', 1, 0, 0, 0, 11, 49.4, '0473', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(288, '2010-12-31', 'L0474', 1, 0, 0, 0, 11, 50.8, '0474', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(289, '2010-12-31', 'L0475', 1, 0, 0, 0, 11, 47.6, '0475', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(290, '2010-12-31', 'L0476', 1, 0, 0, 0, 11, 50.1, '0476', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(291, '2010-12-31', 'L0477', 1, 0, 0, 0, 11, 50.5, '0477', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(292, '2010-12-31', 'L0478', 1, 0, 0, 0, 11, 49.7, '0478', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(293, '2010-12-31', 'L0479', 1, 0, 0, 0, 11, 49.9, '0479', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(294, '2010-12-31', 'L0480', 1, 0, 0, 0, 11, 50, '0480', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(295, '2010-12-31', 'L0481', 1, 0, 0, 0, 11, 50, '0481', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(296, '2010-12-31', 'L0482', 1, 0, 0, 0, 11, 49.8, '0482', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(297, '2010-12-31', 'L0483', 1, 0, 0, 0, 11, 49.3, '0483', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(298, '2010-12-31', 'L0484', 1, 0, 0, 0, 11, 49.5, '0484', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(299, '2010-12-31', 'L0485', 1, 0, 0, 0, 11, 49.4, '0485', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(300, '2010-12-31', 'L0486', 1, 0, 0, 0, 11, 49.2, '0486', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(301, '2010-12-31', 'L0487', 1, 0, 0, 0, 11, 49.6, '0487', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(302, '2010-12-31', 'L0488', 1, 0, 0, 0, 11, 50.3, '0488', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(303, '2010-12-31', 'L0496', 1, 0, 0, 0, 11, 59.4, '0496', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(304, '2010-12-31', 'L0497', 1, 0, 0, 0, 11, 55.8, '0497', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(305, '2010-12-31', 'L0498', 1, 0, 0, 0, 11, 58.8, '0498', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(306, '2010-12-31', 'L0512', 1, 0, 0, 0, 11, 49, '0512', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(307, '2010-12-31', 'L0513', 1, 0, 0, 0, 11, 49.8, '0513', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(308, '2010-12-31', 'L0515', 1, 0, 0, 0, 11, 49.1, '0515', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(309, '2010-12-31', 'L0518', 1, 0, 0, 0, 11, 50.5, '0518', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(310, '2010-12-31', 'L0520', 1, 0, 0, 0, 11, 49.6, '0520', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(311, '2010-12-31', 'L0522', 1, 0, 0, 0, 11, 49.5, '0522', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(312, '2010-12-31', 'L0523', 1, 0, 0, 0, 11, 49.4, '0523', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(313, '2010-12-31', 'L0524', 1, 0, 0, 0, 11, 49.9, '0524', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(314, '2010-12-31', 'L0525', 1, 0, 0, 0, 11, 50.2, '0525', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(315, '2010-12-31', 'L0526', 1, 0, 0, 0, 11, 50.6, '0526', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(316, '2010-12-31', 'L0539', 1, 0, 0, 0, 11, 63.5, '0539', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(317, '2010-12-31', 'L0540', 1, 0, 0, 0, 11, 63.4, '0540', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(318, '2010-12-31', 'L0545', 1, 0, 0, 0, 11, 63.1, '0545', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(319, '2010-12-31', 'L0546', 1, 0, 0, 0, 11, 57.9, '0546', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(320, '2010-12-31', 'L0561', 1, 0, 0, 0, 11, 54.3, '0561', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(321, '2010-12-31', 'L0564', 1, 0, 0, 0, 11, 63.1, '0564', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(322, '2010-12-31', 'L0567', 1, 0, 0, 0, 11, 55.4, '0567', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(323, '2010-12-31', 'L0568', 1, 0, 0, 0, 11, 57.9, '0568', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(324, '2010-12-31', 'L0569', 1, 0, 0, 0, 11, 63.6, '0569', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(325, '2010-12-31', 'L0570', 1, 0, 0, 0, 11, 58.1, '0570', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(326, '2010-12-31', 'L0571', 1, 0, 0, 0, 11, 56.2, '0571', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(327, '2010-12-31', 'L0573', 1, 0, 0, 0, 11, 64, '0573', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(328, '2010-12-31', 'L0577', 1, 0, 0, 0, 11, 64.2, '0577', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(329, '2010-12-31', 'L0584', 1, 0, 0, 0, 11, 63, '0584', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(330, '2010-12-31', 'L0594', 1, 0, 0, 0, 11, 64.1, '0594', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(331, '2010-12-31', 'L0600', 1, 0, 0, 0, 11, 63.2, '0600', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(332, '2010-12-31', 'L0601', 1, 0, 0, 0, 11, 64, '0601', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(333, '2010-12-31', 'L0602', 1, 0, 0, 0, 11, 54.9, '0602', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(334, '2010-12-31', 'L0604', 1, 0, 0, 0, 11, 56, '0604', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(335, '2010-12-31', 'L0607', 1, 0, 0, 0, 11, 63.7, '0607', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(336, '2010-12-31', 'L0614', 1, 0, 0, 0, 11, 64.4, '0614', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(337, '2010-12-31', 'L0615', 1, 0, 0, 0, 11, 57.6, '0615', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(338, '2010-12-31', 'L0616', 1, 0, 0, 0, 11, 62.6, '0616', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(339, '2010-12-31', 'L0625', 1, 0, 0, 0, 11, 49.2, '0625', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(340, '2010-12-31', 'L0626', 1, 0, 0, 0, 11, 56.4, '0626', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(341, '2010-12-31', 'L0627', 1, 0, 0, 0, 11, 64.4, '0627', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(342, '2010-12-31', 'L0631', 1, 0, 0, 0, 11, 63.1, '0631', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(343, '2010-12-31', 'L0632', 1, 0, 0, 0, 11, 48.2, '0632', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(344, '2010-12-31', 'L0633', 1, 0, 0, 0, 11, 63.6, '0633', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(345, '2010-12-31', 'L0634', 1, 0, 0, 0, 11, 50, '0634', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(346, '2010-12-31', 'L0636', 1, 0, 0, 0, 11, 48.2, '0636', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(347, '2010-12-31', 'L0637', 1, 0, 0, 0, 11, 47.6, '0637', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(348, '2010-12-31', 'L0638', 1, 0, 0, 0, 11, 48.4, '0638', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(349, '2010-12-31', 'L0639', 1, 0, 0, 0, 11, 64, '0639', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(350, '2010-12-31', 'L0640', 1, 0, 0, 0, 11, 63.6, '0640', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(351, '2010-12-31', 'L0644', 1, 0, 0, 0, 11, 49.4, '0644', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(352, '2012-10-16', 'L0645', 1, 0, 0, 0, 11, 50.2, '0645', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(353, '2010-12-31', 'L0646', 1, 0, 0, 0, 11, 49.1, '0646', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(354, '2012-10-16', 'L0647', 1, 0, 0, 0, 11, 50.2, '0647', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(355, '2010-12-31', 'L0648', 1, 0, 0, 0, 11, 49.9, '0648', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(356, '2010-12-31', 'L0649', 1, 0, 0, 0, 11, 49.6, '0649', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(357, '2010-12-31', 'L0650', 1, 0, 0, 0, 11, 55.6, '0650', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(358, '2010-12-31', 'L0651', 1, 0, 0, 0, 11, 63.8, '0651', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(359, '2012-10-17', 'L0652', 1, 0, 0, 0, 11, 63.9, '0652', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(360, '2010-12-31', 'L0663', 1, 0, 0, 0, 11, 49.7, '0663', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(361, '2010-12-31', 'L0668', 1, 0, 0, 0, 11, 54.5, '0668', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(362, '2010-12-31', 'L0680', 1, 0, 0, 0, 11, 63.9, '0680', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(363, '2010-12-31', 'L0683', 1, 0, 0, 0, 11, 56, '0683', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(364, '2010-12-31', 'L0688', 1, 0, 0, 0, 11, 55.9, '0688', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(365, '2010-12-31', 'L0691', 1, 0, 0, 0, 11, 63.4, '0691', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(366, '2010-12-31', 'L0710', 1, 0, 0, 0, 11, 63.4, '0710', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(367, '2010-12-31', 'L0712', 1, 0, 0, 0, 11, 58.1, '0712', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(368, '2010-12-31', 'L0714', 1, 0, 0, 0, 11, 63.7, '0714', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(369, '2010-12-31', 'L0723', 1, 0, 0, 0, 11, 56.1, '0723', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(370, '2010-12-31', 'L0725', 1, 0, 0, 0, 11, 63.3, '0725', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(371, '2010-12-31', 'L0727', 1, 0, 0, 0, 11, 56.4, '0727', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(372, '2010-12-31', 'L0732', 1, 0, 0, 0, 11, 57.9, '0732', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(373, '2010-12-31', 'L0734', 1, 0, 0, 0, 11, 64.6, '0734', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(374, '2010-12-31', 'L0735', 1, 0, 0, 0, 11, 49, '0735', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(375, '2010-12-31', 'L0770', 1, 0, 0, 0, 11, 57.2, '0770', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(376, '2010-12-31', 'L0772', 1, 0, 0, 0, 11, 48, '0772', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(377, '2010-12-31', 'L0773', 1, 0, 0, 0, 11, 49.4, '0773', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(378, '2010-12-31', 'L0777', 1, 0, 0, 0, 11, 57.4, '0777', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(379, '2010-12-31', 'L0782', 1, 0, 0, 0, 11, 64, '0782', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(380, '2010-12-31', 'L0788', 1, 0, 0, 0, 11, 63.9, '0788', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(381, '2010-12-31', 'L0789', 1, 0, 0, 0, 11, 58.1, '0789', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(382, '2010-12-31', 'L0794', 1, 0, 0, 0, 11, 63.6, '0794', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(383, '2010-12-31', 'L0797', 1, 0, 0, 0, 11, 62.7, '0797', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(384, '2010-12-31', 'L0799', 1, 0, 0, 0, 11, 63.4, '0799', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(385, '2010-12-31', 'L0800', 1, 0, 0, 0, 11, 55.3, '0800', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(386, '2010-12-31', 'L0801', 1, 0, 0, 0, 11, 64.5, '0801', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(387, '2010-12-31', 'L0807', 1, 0, 0, 0, 11, 50.1, '0807', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(388, '2010-12-31', 'L0808', 1, 0, 0, 0, 11, 48.5, '0808', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(389, '2010-12-31', 'L0809', 1, 0, 0, 0, 11, 50.3, '0809', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(390, '2013-10-28', 'L0810', 1, 0, 0, 0, 11, 49.9, '0810', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(391, '2010-12-31', 'L0811', 1, 0, 0, 0, 11, 49.7, '0811', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(392, '2010-12-31', 'L0812', 1, 0, 0, 0, 11, 49.7, '0812', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(393, '2010-12-31', 'L0813', 1, 0, 0, 0, 11, 50.5, '0813', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(394, '2010-12-31', 'L0814', 1, 0, 0, 0, 11, 50.2, '0814', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(395, '2010-12-31', 'L0816', 1, 0, 0, 0, 11, 49.9, '0816', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(396, '2010-12-31', 'L0817', 1, 0, 0, 0, 11, 49.5, '0817', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(397, '2010-12-31', 'L0818', 1, 0, 0, 0, 11, 49.2, '0818', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(398, '2010-12-31', 'L0819', 1, 0, 0, 0, 11, 50.8, '0819', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(399, '2010-12-31', 'L0820', 1, 0, 0, 0, 11, 49, '0820', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(400, '2010-12-31', 'L0824', 1, 0, 0, 0, 11, 63.7, '0824', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(401, '2010-12-31', 'L0832', 1, 0, 0, 0, 11, 63.7, '0832', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(402, '2010-12-31', 'L0835', 1, 0, 0, 0, 11, 49.1, '0835', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(403, '2010-12-31', 'L0836', 1, 0, 0, 0, 11, 48.5, '0836', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(404, '2010-12-31', 'L0837', 1, 0, 0, 0, 11, 48.8, '0837', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(405, '2010-12-31', 'L0838', 1, 0, 0, 0, 11, 49.5, '0838', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(406, '2010-12-31', 'L0839', 1, 0, 0, 0, 11, 48.8, '0839', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(407, '2010-12-31', 'L0840', 1, 0, 0, 0, 11, 50.2, '0840', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(408, '2010-12-31', 'L0841', 1, 0, 0, 0, 11, 50.2, '0841', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(409, '2010-12-31', 'L0842', 1, 0, 0, 0, 11, 49.6, '0842', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(410, '2010-12-31', 'L0843', 1, 0, 0, 0, 11, 48.1, '0843', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(411, '2010-12-31', 'L0844', 1, 0, 0, 0, 11, 50.6, '0844', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(412, '2010-12-31', 'L0845', 1, 0, 0, 0, 11, 48.8, '0845', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(413, '2010-12-31', 'L0846', 1, 0, 0, 0, 11, 50.1, '0846', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(414, '2010-12-31', 'L0848', 1, 0, 0, 0, 11, 49.9, '0848', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(415, '2010-12-31', 'L0849', 1, 0, 0, 0, 11, 49, '0849', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(416, '2010-12-31', 'L0850', 1, 0, 0, 0, 11, 49.9, '0850', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(417, '2010-12-31', 'L0855', 1, 0, 0, 0, 11, 56.4, '0855', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(418, '2010-12-31', 'L0856', 1, 0, 0, 0, 11, 63.4, '0856', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(419, '2010-12-31', 'L0858', 1, 0, 0, 0, 11, 54.1, '0858', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(420, '2010-12-31', 'L0861', 1, 0, 0, 0, 11, 56.5, '0861', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(421, '2010-12-31', 'L0866', 1, 0, 0, 0, 11, 60.6, '0866', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(422, '2010-12-31', 'L0872', 1, 0, 0, 0, 11, 46.8, '0872', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(423, '2010-12-31', 'L0884', 1, 0, 0, 0, 11, 59, '0884', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(424, '2010-12-31', 'L0898', 1, 0, 0, 0, 11, 60.3, '0898', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(425, '2010-12-31', 'L0904', 1, 0, 0, 0, 11, 64, '0904', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(426, '2010-12-31', 'L0906', 1, 0, 0, 0, 11, 58.9, '0906', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(427, '2010-12-31', 'L0907', 1, 0, 0, 0, 11, 43, '0907', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(428, '2010-12-31', 'L0908', 1, 0, 0, 0, 11, 49, '0908', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(429, '2010-12-31', 'L0909', 1, 0, 0, 0, 11, 48.3, '0909', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(430, '2010-12-31', 'L0910', 1, 0, 0, 0, 11, 48.8, '0910', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(431, '2010-12-31', 'L0911', 1, 0, 0, 0, 11, 49.2, '0911', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(432, '2010-12-31', 'L0912', 1, 0, 0, 0, 11, 49.5, '0912', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(433, '2010-12-31', 'L0913', 1, 0, 0, 0, 11, 49.2, '0913', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(434, '2010-12-31', 'L0914', 1, 0, 0, 0, 11, 49.9, '0914', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(435, '2010-12-31', 'L0915', 1, 0, 0, 0, 11, 49.3, '0915', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(436, '2010-12-31', 'L0916', 1, 0, 0, 0, 11, 51, '0916', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(437, '2010-12-31', 'L0917', 1, 0, 0, 0, 11, 49.4, '0917', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(438, '2010-12-31', 'L0920', 1, 0, 0, 0, 11, 49.5, '0920', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(439, '2010-12-31', 'L0921', 1, 0, 0, 0, 11, 48.6, '0921', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(440, '2012-10-16', 'L0922', 1, 0, 0, 0, 11, 50.1, '0922', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(441, '2010-12-31', 'L0923', 1, 0, 0, 0, 11, 49.5, '0923', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(442, '2010-12-31', 'L0924', 1, 0, 0, 0, 11, 49.8, '0924', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(443, '2010-12-31', 'L0925', 1, 0, 0, 0, 11, 50, '0925', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(444, '2010-12-31', 'L0926', 1, 0, 0, 0, 11, 50.3, '0926', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(445, '2010-12-31', 'L0927', 1, 0, 0, 0, 11, 49.6, '0927', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(446, '2010-12-31', 'L0928', 1, 0, 0, 0, 11, 50, '0928', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(447, '2010-12-31', 'L0939', 1, 0, 0, 0, 11, 65.3, '0939', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(448, '2010-12-31', 'L0949', 1, 0, 0, 0, 11, 51.1, '0949', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(449, '2010-12-31', 'L0950', 1, 0, 0, 0, 11, 49, '0950', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(450, '2010-12-31', 'L0951', 1, 0, 0, 0, 11, 50.1, '0951', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(451, '2010-12-31', 'L0952', 1, 0, 0, 0, 11, 48.8, '0952', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(452, '2010-12-31', 'L0953', 1, 0, 0, 0, 11, 49.8, '0953', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(453, '2010-12-31', 'L0954', 1, 0, 0, 0, 11, 50.1, '0954', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(454, '2010-12-31', 'L0955', 1, 0, 0, 0, 11, 49.5, '0955', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(455, '2010-12-31', 'L0956', 1, 0, 0, 0, 11, 49.3, '0956', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(456, '2010-12-31', 'L0961', 1, 0, 0, 0, 11, 48.5, '0961', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(457, '2010-12-31', 'L0962', 1, 0, 0, 0, 11, 47.7, '0962', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(458, '2010-12-31', 'L0963', 1, 0, 0, 0, 11, 47.7, '0963', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(459, '2010-12-31', 'L0964', 1, 0, 0, 0, 11, 48.2, '0964', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(460, '2010-12-31', 'L0965', 1, 0, 0, 0, 11, 48.9, '0965', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(461, '2010-12-31', 'L0966', 1, 0, 0, 0, 11, 47.8, '0966', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(462, '2010-12-31', 'L0967', 1, 0, 0, 0, 11, 48.3, '0967', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(463, '2010-12-31', 'L0968', 1, 0, 0, 0, 11, 48.4, '0968', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(464, '2010-12-31', 'L0969', 1, 0, 0, 0, 11, 49, '0969', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(465, '2010-12-31', 'L0970', 1, 0, 0, 0, 11, 48.7, '0970', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(466, '2010-12-31', 'L0972', 1, 0, 0, 0, 11, 46.7, '0972', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(467, '2010-12-31', 'L0973', 1, 0, 0, 0, 11, 46.2, '0973', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(468, '2010-12-31', 'L0974', 1, 0, 0, 0, 11, 46, '0974', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(469, '2010-12-31', 'L0975', 1, 0, 0, 0, 11, 46.1, '0975', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(470, '2010-12-31', 'L0976', 1, 0, 0, 0, 11, 45.1, '0976', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(471, '2010-12-31', 'L0977', 1, 0, 0, 0, 11, 45.6, '0977', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(472, '2010-12-31', 'L0978', 1, 0, 0, 0, 11, 45, '0978', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(473, '2010-12-31', 'L0979', 1, 0, 0, 0, 11, 46.2, '0979', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(474, '2010-12-31', 'L0980', 1, 0, 0, 0, 11, 45.9, '0980', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(475, '2010-12-31', 'L0981', 1, 0, 0, 0, 11, 44.8, '0981', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(476, '2010-12-31', 'L0982', 1, 0, 0, 0, 11, 45.6, '0982', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(477, '2010-12-31', 'L0983', 1, 0, 0, 0, 11, 46.6, '0983', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(478, '2010-12-31', 'L0984', 1, 0, 0, 0, 11, 44, '0984', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(479, '2010-12-31', 'L0985', 1, 0, 0, 0, 11, 46, '0985', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(480, '2010-12-31', 'L0986', 1, 0, 0, 0, 11, 47, '0986', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(481, '2010-12-31', 'L0987', 1, 0, 0, 0, 11, 58.6, '0987', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(482, '2012-07-06', 'L0989', 1, 0, 0, 0, 11, 47.5, '0989', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(483, '2012-07-06', 'L0990', 1, 0, 0, 0, 11, 45.1, '0990', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(484, '2012-07-06', 'L0991', 1, 0, 0, 0, 11, 46.3, '0991', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(485, '2012-08-13', 'L0992', 1, 0, 0, 0, 11, 46.9, '0992', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(486, '2012-07-06', 'L0993', 1, 0, 0, 0, 11, 45.7, '0993', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(487, '2012-07-06', 'L0994', 1, 0, 0, 0, 11, 46.4, '0994', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(488, '2012-07-06', 'L0995', 1, 0, 0, 0, 11, 45.5, '0995', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(489, '2012-07-06', 'L0996', 1, 0, 0, 0, 11, 45.9, '0996', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(490, '2012-07-06', 'L0997', 1, 0, 0, 0, 11, 46.7, '0997', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(491, '2012-07-06', 'L0998', 1, 0, 0, 0, 11, 46.1, '0998', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(492, '2012-07-06', 'L0999', 1, 0, 0, 0, 11, 45.2, '0999', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(493, '2012-07-06', 'L1000', 1, 0, 0, 0, 11, 45.9, '1000', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(494, '2012-07-06', 'L1001', 1, 0, 0, 0, 11, 45.8, '1001', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(495, '2012-07-06', 'L1002', 1, 0, 0, 0, 11, 45.8, '1002', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(496, '2012-07-06', 'L1003', 1, 0, 0, 0, 11, 45.5, '1003', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(497, '2012-07-06', 'L1004', 1, 0, 0, 0, 11, 46.5, '1004', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(498, '2012-07-06', 'L1005', 1, 0, 0, 0, 11, 46.7, '1005', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(499, '2012-07-13', 'L1008', 1, 0, 0, 0, 11, 46, '1008', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(500, '2012-07-13', 'L1009', 1, 0, 0, 0, 11, 47.2, '1009', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(501, '2012-07-13', 'L1010', 1, 0, 0, 0, 11, 44.8, '1010', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(502, '2010-12-31', 'L1011', 1, 0, 0, 0, 11, 45.5, '1011', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(503, '2012-07-13', 'L1012', 1, 0, 0, 0, 11, 46.6, '1012', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(504, '2012-07-13', 'L1013', 1, 0, 0, 0, 11, 45.7, '1013', 0, '0000-00-00 00:00:00', 0, NULL, NULL);
INSERT INTO `m_bobbin` (`id`, `tanggal`, `nomor_bobbin`, `m_jenis_packing_id`, `owner_id`, `borrowed_by`, `borrowed_by_supplier`, `m_bobbin_size_id`, `berat`, `nomor_urut`, `status`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(505, '2012-07-13', 'L1014', 1, 0, 0, 0, 11, 45.4, '1014', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(506, '2012-07-19', 'L1015', 1, 0, 0, 0, 11, 61.5, '1015', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(507, '2012-07-19', 'L1016', 1, 0, 0, 0, 11, 60.5, '1016', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(508, '2012-07-19', 'L1017', 1, 0, 0, 0, 11, 61.7, '1017', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(509, '2012-07-19', 'L1018', 1, 0, 0, 0, 11, 60.1, '1018', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(510, '2012-07-19', 'L1019', 1, 0, 0, 0, 11, 60.2, '1019', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(511, '2012-07-19', 'L1020', 1, 0, 0, 0, 11, 61.2, '1020', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(512, '2012-07-19', 'L1021', 1, 0, 0, 0, 11, 61.3, '1021', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(513, '2012-07-19', 'L1022', 1, 0, 0, 0, 11, 61.7, '1022', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(514, '2012-07-19', 'L1023', 1, 0, 0, 0, 11, 60.8, '1023', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(515, '2012-07-19', 'L1024', 1, 0, 0, 0, 11, 60.2, '1024', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(516, '2012-07-19', 'L1025', 1, 0, 0, 0, 11, 60.3, '1025', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(517, '2012-07-19', 'L1026', 1, 0, 0, 0, 11, 62, '1026', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(518, '2012-07-19', 'L1027', 1, 0, 0, 0, 11, 60.5, '1027', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(519, '2012-07-19', 'L1028', 1, 0, 0, 0, 11, 60.2, '1028', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(520, '2012-07-19', 'L1029', 1, 0, 0, 0, 11, 60.8, '1029', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(521, '2012-07-19', 'L1030', 1, 0, 0, 0, 11, 61.1, '1030', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(522, '2012-07-19', 'L1031', 1, 0, 0, 0, 11, 61.8, '1031', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(523, '2012-07-19', 'L1032', 1, 0, 0, 0, 11, 61.4, '1032', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(524, '2012-07-19', 'L1033', 1, 0, 0, 0, 11, 61, '1033', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(525, '2012-07-19', 'L1034', 1, 0, 0, 0, 11, 60.3, '1034', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(526, '2012-07-20', 'L1035', 1, 0, 0, 0, 11, 46, '1035', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(527, '2012-07-20', 'L1036', 1, 0, 0, 0, 11, 45.2, '1036', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(528, '2012-07-20', 'L1037', 1, 0, 0, 0, 11, 46.6, '1037', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(529, '2012-07-20', 'L1038', 1, 0, 0, 0, 11, 46.2, '1038', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(530, '2012-07-20', 'L1039', 1, 0, 0, 0, 11, 46.3, '1039', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(531, '2012-07-20', 'L1040', 1, 0, 0, 0, 11, 45.9, '1040', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(532, '2012-07-20', 'L1041', 1, 0, 0, 0, 11, 46.3, '1041', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(533, '2012-07-20', 'L1042', 1, 0, 0, 0, 11, 47, '1042', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(534, '2012-07-20', 'L1043', 1, 0, 0, 0, 11, 46.9, '1043', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(535, '2012-07-20', 'L1044', 1, 0, 0, 0, 11, 60.1, '1044', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(536, '2012-07-20', 'L1045', 1, 0, 0, 0, 11, 62.1, '1045', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(537, '2012-07-20', 'L1046', 1, 0, 0, 0, 11, 60.4, '1046', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(538, '2012-07-20', 'L1047', 1, 0, 0, 0, 11, 60.5, '1047', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(539, '2012-07-20', 'L1048', 1, 0, 0, 0, 11, 60, '1048', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(540, '2012-07-20', 'L1049', 1, 0, 0, 0, 11, 61.4, '1049', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(541, '2012-07-20', 'L1050', 1, 0, 0, 0, 11, 60.9, '1050', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(542, '2012-07-20', 'L1051', 1, 0, 0, 0, 11, 61.9, '1051', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(543, '2012-07-20', 'L1052', 1, 0, 0, 0, 11, 60.7, '1052', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(544, '2012-07-20', 'L1053', 1, 0, 0, 0, 11, 61.6, '1053', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(545, '2012-07-20', 'L1054', 1, 0, 0, 0, 11, 61.2, '1054', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(546, '2012-07-20', 'L1055', 1, 0, 0, 0, 11, 60.1, '1055', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(547, '2012-07-20', 'L1056', 1, 0, 0, 0, 11, 59.9, '1056', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(548, '2012-07-20', 'L1057', 1, 0, 0, 0, 11, 61.1, '1057', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(549, '2012-07-20', 'L1058', 1, 0, 0, 0, 11, 61, '1058', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(550, '2012-07-20', 'L1059', 1, 0, 0, 0, 11, 60.2, '1059', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(551, '2012-07-20', 'L1060', 1, 0, 0, 0, 11, 61.4, '1060', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(552, '2010-12-31', 'L1061', 1, 0, 0, 0, 11, 60.6, '1061', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(553, '2012-07-20', 'L1062', 1, 0, 0, 0, 11, 61, '1062', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(554, '2012-07-20', 'L1063', 1, 0, 0, 0, 11, 60.9, '1063', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(555, '2012-07-20', 'L1064', 1, 0, 0, 0, 11, 61.1, '1064', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(556, '2012-07-20', 'L1065', 1, 0, 0, 0, 11, 61, '1065', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(557, '2012-07-20', 'L1066', 1, 0, 0, 0, 11, 59.9, '1066', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(558, '2012-07-20', 'L1067', 1, 0, 0, 0, 11, 60.3, '1067', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(559, '2012-07-20', 'L1068', 1, 0, 0, 0, 11, 61, '1068', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(560, '2012-07-20', 'L1069', 1, 0, 0, 0, 11, 62.2, '1069', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(561, '2012-07-20', 'L1070', 1, 0, 0, 0, 11, 61.4, '1070', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(562, '2012-07-20', 'L1071', 1, 0, 0, 0, 11, 61.2, '1071', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(563, '2012-07-20', 'L1072', 1, 0, 0, 0, 11, 62, '1072', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(564, '2012-07-20', 'L1073', 1, 0, 0, 0, 11, 60.8, '1073', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(565, '2012-07-22', 'L1075', 1, 0, 0, 0, 11, 61.4, '1075', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(566, '2012-07-22', 'L1076', 1, 0, 0, 0, 11, 61.3, '1076', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(567, '2012-07-22', 'L1077', 1, 0, 0, 0, 11, 61.8, '1077', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(568, '2012-07-22', 'L1078', 1, 0, 0, 0, 11, 61.2, '1078', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(569, '2012-07-22', 'L1079', 1, 0, 0, 0, 11, 61.4, '1079', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(570, '2012-07-22', 'L1080', 1, 0, 0, 0, 11, 61.2, '1080', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(571, '2012-07-22', 'L1081', 1, 0, 0, 0, 11, 62, '1081', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(572, '2012-07-22', 'L1082', 1, 0, 0, 0, 11, 60.7, '1082', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(573, '2012-07-22', 'L1083', 1, 0, 0, 0, 11, 61.6, '1083', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(574, '2012-07-22', 'L1084', 1, 0, 0, 0, 11, 61.5, '1084', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(575, '2012-07-22', 'L1085', 1, 0, 0, 0, 11, 61.3, '1085', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(576, '2012-07-22', 'L1086', 1, 0, 0, 0, 11, 61.6, '1086', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(577, '2012-07-22', 'L1087', 1, 0, 0, 0, 11, 62.2, '1087', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(578, '2012-07-22', 'L1088', 1, 0, 0, 0, 11, 61.4, '1088', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(579, '2012-07-22', 'L1089', 1, 0, 0, 0, 11, 61.6, '1089', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(580, '2012-07-22', 'L1090', 1, 0, 0, 0, 11, 62, '1090', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(581, '2012-07-22', 'L1091', 1, 0, 0, 0, 11, 62, '1091', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(582, '2012-07-22', 'L1092', 1, 0, 0, 0, 11, 61, '1092', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(583, '2012-07-22', 'L1093', 1, 0, 0, 0, 11, 61.1, '1093', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(584, '2012-07-22', 'L1094', 1, 0, 0, 0, 11, 61.4, '1094', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(585, '2012-07-22', 'L1095', 1, 0, 0, 0, 11, 61, '1095', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(586, '2012-07-22', 'L1096', 1, 0, 0, 0, 11, 61.8, '1096', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(587, '2012-07-22', 'L1097', 1, 0, 0, 0, 11, 61.2, '1097', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(588, '2012-07-22', 'L1098', 1, 0, 0, 0, 11, 61.1, '1098', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(589, '2012-07-22', 'L1099', 1, 0, 0, 0, 11, 61.8, '1099', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(590, '2012-07-22', 'L1100', 1, 0, 0, 0, 11, 62.3, '1100', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(591, '2012-07-22', 'L1101', 1, 0, 0, 0, 11, 63.2, '1101', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(592, '2012-07-22', 'L1102', 1, 0, 0, 0, 11, 61.1, '1102', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(593, '2012-07-22', 'L1103', 1, 0, 0, 0, 11, 61.1, '1103', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(594, '2012-07-22', 'L1104', 1, 0, 0, 0, 11, 62.4, '1104', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(595, '2012-07-27', 'L1105', 1, 0, 0, 0, 11, 63.3, '1105', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(596, '2012-07-27', 'L1106', 1, 0, 0, 0, 11, 62.7, '1106', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(597, '2012-07-27', 'L1107', 1, 0, 0, 0, 11, 61.4, '1107', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(598, '2012-07-27', 'L1108', 1, 0, 0, 0, 11, 64.3, '1108', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(599, '2012-07-27', 'L1109', 1, 0, 0, 0, 11, 63, '1109', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(600, '2012-07-27', 'L1110', 1, 0, 0, 0, 11, 62.2, '1110', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(601, '2012-07-27', 'L1111', 1, 0, 0, 0, 11, 63.2, '1111', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(602, '2012-07-27', 'L1112', 1, 0, 0, 0, 11, 61.7, '1112', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(603, '2012-07-27', 'L1113', 1, 0, 0, 0, 11, 61.8, '1113', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(604, '2012-07-27', 'L1114', 1, 0, 0, 0, 11, 63, '1114', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(605, '2012-07-27', 'L1115', 1, 0, 0, 0, 11, 62.3, '1115', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(606, '2012-07-27', 'L1116', 1, 0, 0, 0, 11, 61.8, '1116', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(607, '2012-07-27', 'L1117', 1, 0, 0, 0, 11, 62, '1117', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(608, '2012-07-27', 'L1118', 1, 0, 0, 0, 11, 63.8, '1118', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(609, '2012-07-27', 'L1119', 1, 0, 0, 0, 11, 61.2, '1119', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(610, '2012-07-27', 'L1120', 1, 0, 0, 0, 11, 61.3, '1120', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(611, '2012-07-27', 'L1121', 1, 0, 0, 0, 11, 62.1, '1121', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(612, '2012-07-27', 'L1122', 1, 0, 0, 0, 11, 62.9, '1122', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(613, '2012-07-27', 'L1123', 1, 0, 0, 0, 11, 62.5, '1123', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(614, '2012-07-27', 'L1124', 1, 0, 0, 0, 11, 61.5, '1124', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(615, '2012-07-27', 'L1125', 1, 0, 0, 0, 11, 62.2, '1125', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(616, '2012-07-27', 'L1126', 1, 0, 0, 0, 11, 62.7, '1126', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(617, '2012-07-27', 'L1127', 1, 0, 0, 0, 11, 61.2, '1127', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(618, '2012-07-27', 'L1128', 1, 0, 0, 0, 11, 62.6, '1128', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(619, '2012-07-27', 'L1129', 1, 0, 0, 0, 11, 62.4, '1129', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(620, '2012-08-09', 'L1130', 1, 0, 0, 0, 11, 61.5, '1130', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(621, '2012-08-09', 'L1131', 1, 0, 0, 0, 11, 62.1, '1131', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(622, '2012-08-09', 'L1132', 1, 0, 0, 0, 11, 63.6, '1132', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(623, '2012-08-09', 'L1133', 1, 0, 0, 0, 11, 62.6, '1133', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(624, '2012-08-09', 'L1134', 1, 0, 0, 0, 11, 61.7, '1134', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(625, '2012-08-09', 'L1135', 1, 0, 0, 0, 11, 62.9, '1135', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(626, '2012-08-09', 'L1136', 1, 0, 0, 0, 11, 62.2, '1136', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(627, '2012-08-09', 'L1137', 1, 0, 0, 0, 11, 60.8, '1137', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(628, '2012-08-09', 'L1138', 1, 0, 0, 0, 11, 62.9, '1138', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(629, '2012-08-09', 'L1139', 1, 0, 0, 0, 11, 61.3, '1139', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(630, '2012-08-09', 'L1140', 1, 0, 0, 0, 11, 63.1, '1140', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(631, '2012-08-09', 'L1141', 1, 0, 0, 0, 11, 62.4, '1141', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(632, '2012-08-09', 'L1142', 1, 0, 0, 0, 11, 61.5, '1142', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(633, '2012-08-09', 'L1143', 1, 0, 0, 0, 11, 60.9, '1143', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(634, '2012-08-09', 'L1144', 1, 0, 0, 0, 11, 62.9, '1144', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(635, '2012-08-09', 'L1145', 1, 0, 0, 0, 11, 62.7, '1145', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(636, '2012-08-09', 'L1146', 1, 0, 0, 0, 11, 62.5, '1146', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(637, '2012-08-09', 'L1147', 1, 0, 0, 0, 11, 62.3, '1147', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(638, '2012-08-09', 'L1148', 1, 0, 0, 0, 11, 62.7, '1148', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(639, '2012-08-09', 'L1149', 1, 0, 0, 0, 11, 63.3, '1149', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(640, '2012-08-09', 'L1150', 1, 0, 0, 0, 11, 62.5, '1150', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(641, '2012-08-09', 'L1151', 1, 0, 0, 0, 11, 61.5, '1151', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(642, '2012-08-09', 'L1152', 1, 0, 0, 0, 11, 60.6, '1152', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(643, '2012-08-09', 'L1153', 1, 0, 0, 0, 11, 61.7, '1153', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(644, '2012-08-09', 'L1154', 1, 0, 0, 0, 11, 61.4, '1154', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(645, '2012-08-09', 'L1155', 1, 0, 0, 0, 11, 63.2, '1155', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(646, '2012-08-09', 'L1156', 1, 0, 0, 0, 11, 62, '1156', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(647, '2012-08-09', 'L1157', 1, 0, 0, 0, 11, 61.8, '1157', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(648, '2012-08-09', 'L1158', 1, 0, 0, 0, 11, 61.5, '1158', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(649, '2012-08-09', 'L1159', 1, 0, 0, 0, 11, 63.3, '1159', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(650, '2012-08-09', 'L1160', 1, 0, 0, 0, 11, 62, '1160', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(651, '2012-08-09', 'L1161', 1, 0, 0, 0, 11, 62.7, '1161', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(652, '2012-08-09', 'L1162', 1, 0, 0, 0, 11, 63.3, '1162', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(653, '2012-08-09', 'L1163', 1, 0, 0, 0, 11, 63, '1163', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(654, '2012-08-09', 'L1164', 1, 0, 0, 0, 11, 62.1, '1164', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(655, '2012-08-09', 'L1165', 1, 0, 0, 0, 11, 62.1, '1165', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(656, '2012-08-09', 'L1166', 1, 0, 0, 0, 11, 61, '1166', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(657, '2012-08-09', 'L1167', 1, 0, 0, 0, 11, 62.8, '1167', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(658, '2012-08-09', 'L1168', 1, 0, 0, 0, 11, 62.8, '1168', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(659, '2012-08-09', 'L1169', 1, 0, 0, 0, 11, 63.4, '1169', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(660, '2012-08-09', 'L1170', 1, 0, 0, 0, 11, 61.4, '1170', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(661, '2012-08-09', 'L1171', 1, 0, 0, 0, 11, 62.5, '1171', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(662, '2012-08-09', 'L1172', 1, 0, 0, 0, 11, 62.5, '1172', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(663, '2012-08-09', 'L1173', 1, 0, 0, 0, 11, 62.4, '1173', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(664, '2012-08-09', 'L1174', 1, 0, 0, 0, 11, 61.6, '1174', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(665, '2012-08-13', 'L1175', 1, 0, 0, 0, 11, 46.3, '1175', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(666, '2012-08-13', 'L1176', 1, 0, 0, 0, 11, 47.3, '1176', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(667, '2012-08-13', 'L1177', 1, 0, 0, 0, 11, 46.4, '1177', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(668, '2012-08-13', 'L1178', 1, 0, 0, 0, 11, 46.9, '1178', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(669, '2012-08-13', 'L1179', 1, 0, 0, 0, 11, 46, '1179', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(670, '2012-08-13', 'L1180', 1, 0, 0, 0, 11, 46.4, '1180', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(671, '2012-08-13', 'L1181', 1, 0, 0, 0, 11, 46.3, '1181', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(672, '2010-12-31', 'L1182', 1, 0, 0, 0, 11, 46.9, '1182', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(673, '2012-08-13', 'L1183', 1, 0, 0, 0, 11, 46.6, '1183', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(674, '2012-08-13', 'L1184', 1, 0, 0, 0, 11, 46.2, '1184', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(675, '2012-08-13', 'L1185', 1, 0, 0, 0, 11, 47.6, '1185', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(676, '2012-08-13', 'L1186', 1, 0, 0, 0, 11, 46.1, '1186', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(677, '2012-08-13', 'L1187', 1, 0, 0, 0, 11, 46.6, '1187', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(678, '2012-08-13', 'L1188', 1, 0, 0, 0, 11, 45.7, '1188', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(679, '2012-08-13', 'L1189', 1, 0, 0, 0, 11, 46.4, '1189', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(680, '2012-08-13', 'L1190', 1, 0, 0, 0, 11, 45.8, '1190', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(681, '2012-08-13', 'L1191', 1, 0, 0, 0, 11, 45.5, '1191', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(682, '2012-08-13', 'L1192', 1, 0, 0, 0, 11, 46.4, '1192', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(683, '2012-08-13', 'L1193', 1, 0, 0, 0, 11, 45.7, '1193', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(684, '2012-08-13', 'L1194', 1, 0, 0, 0, 11, 45.2, '1194', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(685, '2012-08-13', 'L1195', 1, 0, 0, 0, 11, 46, '1195', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(686, '2012-08-13', 'L1196', 1, 0, 0, 0, 11, 47.1, '1196', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(687, '2012-08-13', 'L1197', 1, 0, 0, 0, 11, 45.7, '1197', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(688, '2012-08-13', 'L1198', 1, 0, 0, 0, 11, 46.6, '1198', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(689, '2012-08-13', 'L1199', 1, 0, 0, 0, 11, 45.8, '1199', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(690, '2012-08-13', 'L1200', 1, 0, 0, 0, 11, 45.9, '1200', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(691, '2012-08-13', 'L1201', 1, 0, 0, 0, 11, 46, '1201', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(692, '2012-08-13', 'L1202', 1, 0, 0, 0, 11, 46.3, '1202', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(693, '2012-08-13', 'L1203', 1, 0, 0, 0, 11, 46.8, '1203', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(694, '2012-08-30', 'L1204', 1, 0, 0, 0, 11, 45, '1204', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(695, '2012-08-30', 'L1205', 1, 0, 0, 0, 11, 46.6, '1205', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(696, '2012-08-30', 'L1206', 1, 0, 0, 0, 11, 46.3, '1206', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(697, '2012-08-30', 'L1207', 1, 0, 0, 0, 11, 50.2, '1207', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(698, '2012-08-30', 'L1208', 1, 0, 0, 0, 11, 48.9, '1208', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(699, '2012-08-30', 'L1209', 1, 0, 0, 0, 11, 45.7, '1209', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(700, '2012-08-30', 'L1210', 1, 0, 0, 0, 11, 45.5, '1210', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(701, '2012-08-30', 'L1211', 1, 0, 0, 0, 11, 47.3, '1211', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(702, '2012-08-30', 'L1212', 1, 0, 0, 0, 11, 45.7, '1212', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(703, '2010-12-31', 'L1213', 1, 0, 0, 0, 11, 64.6, '1213', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(704, '2010-12-31', 'L1219', 1, 0, 0, 0, 11, 64, '1219', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(705, '2010-12-31', 'L1220', 1, 0, 0, 0, 11, 48.6, '1220', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(706, '2010-12-31', 'L1230', 1, 0, 0, 0, 11, 54.3, '1230', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(707, '2010-12-31', 'L1247', 1, 0, 0, 0, 11, 46, '1247', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(708, '2010-12-31', 'L1324', 1, 0, 0, 0, 11, 58.1, '1324', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(709, '2010-12-31', 'L1325', 1, 0, 0, 0, 11, 59.6, '1325', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(710, '2010-12-31', 'L1326', 1, 0, 0, 0, 11, 59.4, '1326', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(711, '2010-12-31', 'L1327', 1, 0, 0, 0, 11, 58.6, '1327', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(712, '2010-12-31', 'L1328', 1, 0, 0, 0, 11, 58.8, '1328', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(713, '2010-12-31', 'L1329', 1, 0, 0, 0, 11, 59, '1329', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(714, '2010-12-31', 'L1330', 1, 0, 0, 0, 11, 59.2, '1330', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(715, '2010-12-31', 'L1331', 1, 0, 0, 0, 11, 57.7, '1331', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(716, '2010-12-31', 'L1332', 1, 0, 0, 0, 11, 58.8, '1332', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(717, '2010-12-31', 'L1333', 1, 0, 0, 0, 11, 59.3, '1333', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(718, '2010-12-31', 'L1334', 1, 0, 0, 0, 11, 59.4, '1334', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(719, '2010-12-31', 'L1335', 1, 0, 0, 0, 11, 58.5, '1335', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(720, '2010-12-31', 'L1336', 1, 0, 0, 0, 11, 59.4, '1336', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(721, '2010-12-31', 'L1337', 1, 0, 0, 0, 11, 59.8, '1337', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(722, '2010-12-31', 'L1338', 1, 0, 0, 0, 11, 59.1, '1338', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(723, '2010-12-31', 'L1339', 1, 0, 0, 0, 11, 59.2, '1339', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(724, '2010-12-31', 'L1340', 1, 0, 0, 0, 11, 60.1, '1340', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(725, '2010-12-31', 'L1341', 1, 0, 0, 0, 11, 58.2, '1341', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(726, '2010-12-31', 'L1342', 1, 0, 0, 0, 11, 57.8, '1342', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(727, '2010-12-31', 'L1343', 1, 0, 0, 0, 11, 59.2, '1343', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(728, '2010-12-31', 'L1344', 1, 0, 0, 0, 11, 59, '1344', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(729, '2010-12-31', 'L1345', 1, 0, 0, 0, 11, 59.9, '1345', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(730, '2010-12-31', 'L1346', 1, 0, 0, 0, 11, 59.6, '1346', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(731, '2010-12-31', 'L1347', 1, 0, 0, 0, 11, 59.5, '1347', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(732, '2010-12-31', 'L1348', 1, 0, 0, 0, 11, 58.1, '1348', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(733, '2010-12-31', 'L1349', 1, 0, 0, 0, 11, 58.3, '1349', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(734, '2010-12-31', 'L1350', 1, 0, 0, 0, 11, 58.8, '1350', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(735, '2010-12-31', 'L1351', 1, 0, 0, 0, 11, 59.1, '1351', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(736, '2010-12-31', 'L1352', 1, 0, 0, 0, 11, 59.2, '1352', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(737, '2010-12-31', 'L1353', 1, 0, 0, 0, 11, 60.2, '1353', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(738, '2010-12-31', 'L1354', 1, 0, 0, 0, 11, 59, '1354', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(739, '2010-12-31', 'L1355', 1, 0, 0, 0, 11, 56.9, '1355', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(740, '2010-12-31', 'L1356', 1, 0, 0, 0, 11, 59.2, '1356', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(741, '2010-12-31', 'L1357', 1, 0, 0, 0, 11, 59, '1357', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(742, '2010-12-31', 'L1358', 1, 0, 0, 0, 11, 59.5, '1358', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(743, '2010-12-31', 'L1359', 1, 0, 0, 0, 11, 58.9, '1359', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(744, '2010-12-31', 'L1360', 1, 0, 0, 0, 11, 59.5, '1360', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(745, '2010-12-31', 'L1361', 1, 0, 0, 0, 11, 59.2, '1361', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(746, '2010-12-31', 'L1362', 1, 0, 0, 0, 11, 57.5, '1362', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(747, '2010-12-31', 'L1363', 1, 0, 0, 0, 11, 59.3, '1363', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(748, '2010-12-31', 'L1364', 1, 0, 0, 0, 11, 57.7, '1364', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(749, '2010-12-31', 'L1365', 1, 0, 0, 0, 11, 54.8, '1365', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(750, '2010-12-31', 'L1366', 1, 0, 0, 0, 11, 59.3, '1366', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(751, '2010-12-31', 'L1367', 1, 0, 0, 0, 11, 59.5, '1367', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(752, '2010-12-31', 'L1368', 1, 0, 0, 0, 11, 58.7, '1368', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(753, '2010-12-31', 'L1369', 1, 0, 0, 0, 11, 58.6, '1369', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(754, '2010-12-31', 'L1370', 1, 0, 0, 0, 11, 58.6, '1370', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(755, '2010-12-31', 'L1371', 1, 0, 0, 0, 11, 58.5, '1371', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(756, '2010-12-31', 'L1372', 1, 0, 0, 0, 11, 59.8, '1372', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(757, '2010-12-31', 'L1373', 1, 0, 0, 0, 11, 59.5, '1373', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(758, '2010-12-31', 'L1374', 1, 0, 0, 0, 11, 58.7, '1374', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(759, '2010-12-31', 'L1375', 1, 0, 0, 0, 11, 59.2, '1375', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(760, '2010-12-31', 'L1376', 1, 0, 0, 0, 11, 58.7, '1376', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(761, '2010-12-31', 'L1377', 1, 0, 0, 0, 11, 58.2, '1377', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(762, '2010-12-31', 'L1378', 1, 0, 0, 0, 11, 58.6, '1378', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(763, '2010-12-31', 'L1379', 1, 0, 0, 0, 11, 59.9, '1379', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(764, '2010-12-31', 'L1380', 1, 0, 0, 0, 11, 59.4, '1380', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(765, '2010-12-31', 'L1381', 1, 0, 0, 0, 11, 58.8, '1381', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(766, '2010-12-31', 'L1382', 1, 0, 0, 0, 11, 58.7, '1382', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(767, '2010-12-31', 'L1383', 1, 0, 0, 0, 11, 58.5, '1383', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(768, '2010-12-31', 'L1384', 1, 0, 0, 0, 11, 60.1, '1384', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(769, '2010-12-31', 'L1385', 1, 0, 0, 0, 11, 59, '1385', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(770, '2010-12-31', 'L1386', 1, 0, 0, 0, 11, 59.2, '1386', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(771, '2010-12-31', 'L1387', 1, 0, 0, 0, 11, 60.1, '1387', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(772, '2010-12-31', 'L1388', 1, 0, 0, 0, 11, 58.4, '1388', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(773, '2010-12-31', 'L1389', 1, 0, 0, 0, 11, 57.6, '1389', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(774, '2010-12-31', 'L1390', 1, 0, 0, 0, 11, 58.3, '1390', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(775, '2010-12-31', 'L1391', 1, 0, 0, 0, 11, 58.2, '1391', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(776, '2010-12-31', 'L1392', 1, 0, 0, 0, 11, 59.1, '1392', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(777, '2010-12-31', 'L1393', 1, 0, 0, 0, 11, 59, '1393', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(778, '2010-12-31', 'L1394', 1, 0, 0, 0, 11, 59.9, '1394', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(779, '2010-12-31', 'L1395', 1, 0, 0, 0, 11, 58.9, '1395', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(780, '2010-12-31', 'L1396', 1, 0, 0, 0, 11, 58.5, '1396', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(781, '2010-12-31', 'L1397', 1, 0, 0, 0, 11, 59.2, '1397', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(782, '2010-12-31', 'L1398', 1, 0, 0, 0, 11, 59.5, '1398', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(783, '2010-12-31', 'L1399', 1, 0, 0, 0, 11, 59, '1399', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(784, '2010-12-31', 'L1400', 1, 0, 0, 0, 11, 59.6, '1400', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(785, '2010-12-31', 'L1401', 1, 0, 0, 0, 11, 58.7, '1401', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(786, '2010-12-31', 'L1402', 1, 0, 0, 0, 11, 59.1, '1402', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(787, '2010-12-31', 'L1403', 1, 0, 0, 0, 11, 60.6, '1403', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(788, '2010-12-31', 'L1404', 1, 0, 0, 0, 11, 59.4, '1404', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(789, '2010-12-31', 'L1405', 1, 0, 0, 0, 11, 58.4, '1405', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(790, '2010-12-31', 'L1406', 1, 0, 0, 0, 11, 59.6, '1406', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(791, '2010-12-31', 'L1407', 1, 0, 0, 0, 11, 57.1, '1407', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(792, '2010-12-31', 'L1408', 1, 0, 0, 0, 11, 58.2, '1408', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(793, '2010-12-31', 'L1409', 1, 0, 0, 0, 11, 59, '1409', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(794, '2010-12-31', 'L1410', 1, 0, 0, 0, 11, 59.5, '1410', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(795, '2010-12-31', 'L1411', 1, 0, 0, 0, 11, 58.4, '1411', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(796, '2010-12-31', 'L1412', 1, 0, 0, 0, 11, 59.5, '1412', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(797, '2010-12-31', 'L1413', 1, 0, 0, 0, 11, 59.5, '1413', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(798, '2010-12-31', 'L1414', 1, 0, 0, 0, 11, 58.8, '1414', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(799, '2010-12-31', 'L1415', 1, 0, 0, 0, 11, 58.3, '1415', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(800, '2010-12-31', 'L1416', 1, 0, 0, 0, 11, 58.3, '1416', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(801, '2010-12-31', 'L1417', 1, 0, 0, 0, 11, 58.8, '1417', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(802, '2010-12-31', 'L1418', 1, 0, 0, 0, 11, 58.9, '1418', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(803, '2010-12-31', 'L1419', 1, 0, 0, 0, 11, 59.4, '1419', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(804, '2010-12-31', 'L1420', 1, 0, 0, 0, 11, 59.7, '1420', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(805, '2010-12-31', 'L1421', 1, 0, 0, 0, 11, 59.5, '1421', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(806, '2010-12-31', 'L1422', 1, 0, 0, 0, 11, 58.3, '1422', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(807, '2010-12-31', 'L1423', 1, 0, 0, 0, 11, 60, '1423', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(808, '2010-12-31', 'L1448', 1, 0, 0, 0, 11, 60.1, '1448', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(809, '2010-12-31', 'L1454', 1, 0, 0, 0, 11, 59.4, '1454', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(810, '2010-12-31', 'L1462', 1, 0, 0, 0, 11, 63.3, '1462', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(811, '2010-12-31', 'M0001', 1, 0, 0, 0, 12, 58.4, '0001', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(812, '2010-12-31', 'M0007', 1, 0, 7, 0, 12, 47, '0007', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(813, '2010-12-31', 'M0008', 1, 0, 0, 0, 12, 50.4, '0008', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(814, '2010-12-31', 'M0015', 1, 0, 0, 0, 12, 52.5, '0015', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(815, '2010-12-31', 'M0018', 1, 0, 0, 0, 12, 57.6, '0018', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(816, '2010-12-31', 'M0021', 1, 0, 0, 0, 12, 48.8, '0021', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(817, '2010-12-31', 'M0022', 1, 0, 0, 0, 12, 44.6, '0022', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(818, '2010-12-31', 'M0023', 1, 0, 0, 0, 12, 43.8, '0023', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(819, '2010-12-31', 'M0024', 1, 0, 0, 0, 12, 42.5, '0024', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(820, '2010-12-31', 'M0028', 1, 0, 0, 0, 12, 42.8, '0028', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(821, '2010-12-31', 'M0032', 1, 0, 0, 0, 12, 58.3, '0032', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(822, '2010-12-31', 'M0035', 1, 0, 0, 0, 12, 50.2, '0035', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(823, '2010-12-31', 'M0037', 1, 0, 0, 0, 12, 49.5, '0037', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(824, '2010-12-31', 'M0039', 1, 0, 0, 0, 12, 42.8, '0039', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(825, '2010-12-31', 'M0045', 1, 0, 0, 0, 12, 47.6, '0045', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(826, '2010-12-31', 'M0046', 1, 0, 0, 0, 12, 49.7, '0046', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(827, '2010-12-31', 'M0047', 1, 0, 0, 0, 12, 51.1, '0047', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(828, '2010-12-31', 'M0048', 1, 0, 0, 0, 12, 52.1, '0048', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(829, '2010-12-31', 'M0049', 1, 0, 0, 0, 12, 42.2, '0049', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(830, '2010-12-31', 'M0050', 1, 0, 0, 0, 12, 45.6, '0050', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(831, '2010-12-31', 'M0051', 1, 0, 0, 0, 12, 49, '0051', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(832, '2010-12-31', 'M0052', 1, 0, 0, 0, 12, 53.3, '0052', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(833, '2010-12-31', 'M0053', 1, 0, 0, 0, 12, 50.8, '0053', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(834, '2010-12-31', 'M0054', 1, 0, 0, 0, 12, 48.4, '0054', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(835, '2010-12-31', 'M0055', 1, 0, 0, 0, 12, 40.7, '0055', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(836, '2010-12-31', 'M0057', 1, 0, 0, 0, 12, 58.6, '0057', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(837, '2010-12-31', 'M0058', 1, 0, 0, 0, 12, 53.6, '0058', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(838, '2010-12-31', 'M0061', 1, 0, 0, 0, 12, 58.4, '0061', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(839, '2010-12-31', 'M0062', 1, 0, 0, 0, 12, 42.8, '0062', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(840, '2010-12-31', 'M0063', 1, 0, 0, 0, 12, 48.1, '0063', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(841, '2010-12-31', 'M0066', 1, 0, 0, 0, 12, 49.2, '0066', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(842, '2010-12-31', 'M0067', 1, 0, 0, 0, 12, 54.3, '0067', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(843, '2010-12-31', 'M0068', 1, 0, 0, 0, 12, 58.1, '0068', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(844, '2010-12-31', 'M0069', 1, 0, 0, 0, 12, 57.4, '0069', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(845, '2010-12-31', 'M0070', 1, 0, 0, 0, 12, 42.4, '0070', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(846, '2010-12-31', 'M0071', 1, 0, 0, 0, 12, 47.8, '0071', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(847, '2010-12-31', 'M0072', 1, 0, 0, 0, 12, 59.8, '0072', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(848, '2010-12-31', 'M0074', 1, 0, 0, 0, 12, 47, '0074', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(849, '2010-12-31', 'M0076', 1, 0, 0, 0, 12, 47.4, '0076', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(850, '2010-12-31', 'M0077', 1, 0, 0, 0, 12, 48, '0077', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(851, '2010-12-31', 'M0079', 1, 0, 0, 0, 12, 50.3, '0079', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(852, '2010-12-31', 'M0080', 1, 0, 0, 0, 12, 50.6, '0080', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(853, '2018-06-28', 'M0083', 1, 0, 0, 0, 12, 48.8, '0083', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(854, '2010-12-31', 'M0095', 1, 0, 0, 0, 12, 49.9, '0095', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(855, '2010-12-31', 'M0096', 1, 0, 0, 0, 12, 50.8, '0096', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(856, '2010-12-31', 'M0098', 1, 0, 0, 0, 12, 49.8, '0098', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(857, '2010-12-31', 'M0100', 1, 0, 0, 0, 12, 55.8, '0100', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(858, '2010-12-31', 'M0103', 1, 0, 0, 0, 12, 49.4, '0103', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(859, '2010-12-31', 'M0114', 1, 0, 0, 0, 12, 59.1, '0114', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(860, '2010-12-31', 'M0116', 1, 0, 0, 0, 12, 58, '0116', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(861, '2010-12-31', 'M0131', 1, 0, 0, 0, 12, 49.4, '0131', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(862, '2010-12-31', 'M0132', 1, 0, 0, 0, 12, 57, '0132', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(863, '2010-12-31', 'M0138', 1, 0, 0, 0, 12, 50.4, '0138', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(864, '2010-12-31', 'M0141', 1, 0, 0, 0, 12, 49.8, '0141', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(865, '2010-12-31', 'M0143', 1, 0, 0, 0, 12, 46.9, '0143', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(866, '2010-12-31', 'M0146', 1, 0, 0, 0, 12, 43.5, '0146', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(867, '2010-12-31', 'M0150', 1, 0, 0, 0, 12, 57.3, '0150', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(868, '2010-12-31', 'M0151', 1, 0, 0, 0, 12, 59.3, '0151', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(869, '2010-12-31', 'M0153', 1, 0, 0, 0, 12, 47.1, '0153', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(870, '2010-12-31', 'M0157', 1, 0, 0, 0, 12, 50.4, '0157', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(871, '2010-12-31', 'M0158', 1, 0, 0, 0, 12, 47.6, '0158', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(872, '2010-12-31', 'M0159', 1, 0, 0, 0, 12, 49, '0159', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(873, '2010-12-31', 'M0162', 1, 0, 0, 0, 12, 49.6, '0162', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(874, '2010-12-31', 'M0164', 1, 0, 0, 0, 12, 49, '0164', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(875, '2010-12-31', 'M0165', 1, 0, 0, 0, 12, 55.2, '0165', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(876, '2010-12-31', 'M0166', 1, 0, 0, 0, 12, 48.4, '0166', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(877, '2010-12-31', 'M0183', 1, 0, 0, 0, 12, 49.4, '0183', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(878, '2010-12-31', 'M0192', 1, 0, 0, 0, 12, 58.5, '0192', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(879, '2010-12-31', 'M0194', 1, 0, 0, 0, 12, 53.1, '0194', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(880, '2010-12-31', 'M0195', 1, 0, 0, 0, 12, 57.8, '0195', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(881, '2010-12-31', 'M0197', 1, 0, 0, 0, 12, 57.6, '0197', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(882, '2010-12-31', 'M0198', 1, 0, 0, 0, 12, 50.1, '0198', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(883, '2010-12-31', 'M0199', 1, 0, 0, 0, 12, 50.7, '0199', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(884, '2010-12-31', 'M0200', 1, 0, 0, 0, 12, 51, '0200', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(885, '2010-12-31', 'M0201', 1, 0, 0, 0, 12, 50.7, '0201', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(886, '2010-12-31', 'M0202', 1, 0, 0, 0, 12, 47, '0202', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(887, '2010-12-31', 'M0204', 1, 0, 0, 0, 12, 49, '0204', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(888, '2010-12-31', 'M0206', 1, 0, 0, 0, 12, 54, '0206', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(889, '2010-12-31', 'M0207', 1, 0, 0, 0, 12, 48.5, '0207', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(890, '2010-12-31', 'M0214', 1, 0, 0, 0, 12, 47.8, '0214', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(891, '2010-12-31', 'M0219', 1, 0, 0, 0, 12, 54.8, '0219', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(892, '2010-12-31', 'M0223', 1, 0, 0, 0, 12, 48, '0223', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(893, '2010-12-31', 'M0226', 1, 0, 0, 0, 12, 50.4, '0226', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(894, '2010-12-31', 'M0227', 1, 0, 0, 0, 12, 49.4, '0227', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(895, '2010-12-31', 'M0228', 1, 0, 0, 0, 12, 49.4, '0228', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(896, '2010-12-31', 'M0230', 1, 0, 0, 0, 12, 49.4, '0230', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(897, '2010-12-31', 'M0231', 1, 0, 0, 0, 12, 49.1, '0231', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(898, '2010-12-31', 'M0233', 1, 0, 0, 0, 12, 49.9, '0233', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(899, '2010-12-31', 'M0234', 1, 0, 0, 0, 12, 49.6, '0234', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(900, '2010-12-31', 'M0235', 1, 0, 0, 0, 12, 49, '0235', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(901, '2010-12-31', 'M0236', 1, 0, 0, 0, 12, 50.2, '0236', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(902, '2010-12-31', 'M0237', 1, 0, 0, 0, 12, 51.5, '0237', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(903, '2010-12-31', 'M0238', 1, 0, 0, 0, 12, 50, '0238', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(904, '2010-12-31', 'M0241', 1, 0, 0, 0, 12, 50.2, '0241', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(905, '2010-12-31', 'M0242', 1, 0, 0, 0, 12, 48.6, '0242', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(906, '2010-12-31', 'M0244', 1, 0, 0, 0, 12, 49.2, '0244', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(907, '2010-12-31', 'M0246', 1, 0, 0, 0, 12, 49.4, '0246', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(908, '2010-12-31', 'M0247', 1, 0, 0, 0, 12, 50.8, '0247', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(909, '2010-12-31', 'M0249', 1, 0, 0, 0, 12, 50.5, '0249', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(910, '2010-12-31', 'M0250', 1, 0, 0, 0, 12, 50.2, '0250', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(911, '2010-12-31', 'M0251', 1, 0, 0, 0, 12, 50.3, '0251', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(912, '2010-12-31', 'M0252', 1, 0, 0, 0, 12, 49, '0252', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(913, '2010-12-31', 'M0256', 1, 0, 0, 0, 12, 48.8, '0256', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(914, '2010-12-31', 'M0257', 1, 0, 0, 0, 12, 52, '0257', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(915, '2010-12-31', 'M0258', 1, 0, 0, 0, 12, 49.8, '0258', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(916, '2010-12-31', 'M0262', 1, 0, 0, 0, 12, 50.2, '0262', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(917, '2010-12-31', 'M0267', 1, 0, 0, 0, 12, 58.4, '0267', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(918, '2010-12-31', 'M0268', 1, 0, 0, 0, 12, 50.8, '0268', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(919, '2010-12-31', 'M0269', 1, 0, 0, 0, 12, 50.2, '0269', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(920, '2010-12-31', 'M0270', 1, 0, 0, 0, 12, 49.6, '0270', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(921, '2010-12-31', 'M0272', 1, 0, 0, 0, 12, 48.3, '0272', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(922, '2010-12-31', 'M0273', 1, 0, 0, 0, 12, 45.3, '0273', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(923, '2010-12-31', 'M0275', 1, 0, 0, 0, 12, 44.5, '0275', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(924, '2010-12-31', 'M0276', 1, 0, 0, 0, 12, 45.3, '0276', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(925, '2010-12-31', 'M0277', 1, 0, 0, 0, 12, 50.6, '0277', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(926, '2010-12-31', 'M0278', 1, 0, 0, 0, 12, 50.4, '0278', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(927, '2010-12-31', 'M0279', 1, 0, 0, 0, 12, 44.4, '0279', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(928, '2010-12-31', 'M0283', 1, 0, 0, 0, 12, 49.2, '0283', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(929, '2010-12-31', 'M0287', 1, 0, 0, 0, 12, 58.4, '0287', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(930, '2010-12-31', 'M0288', 1, 0, 0, 0, 12, 49.4, '0288', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(931, '2010-12-31', 'M0292', 1, 0, 0, 0, 12, 52.6, '0292', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(932, '2010-12-31', 'M0294', 1, 0, 0, 0, 12, 45.7, '0294', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(933, '2010-12-31', 'M0297', 1, 0, 0, 0, 12, 49.2, '0297', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(934, '2010-12-31', 'M0298', 1, 0, 0, 0, 12, 44.7, '0298', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(935, '2010-12-31', 'M0301', 1, 0, 0, 0, 12, 49.3, '0301', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(936, '2010-12-31', 'M0302', 1, 0, 0, 0, 12, 52.8, '0302', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(937, '2013-01-16', 'M0303', 1, 0, 0, 0, 12, 52.4, '0303', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(938, '2010-12-31', 'M0306', 1, 0, 0, 0, 12, 55.8, '0306', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(939, '2010-12-31', 'M0313', 1, 0, 0, 0, 12, 50.4, '0313', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(940, '2010-12-31', 'M0315', 1, 0, 0, 0, 12, 57.1, '0315', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(941, '2010-12-31', 'M0316', 1, 0, 0, 0, 12, 51.9, '0316', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(942, '2010-12-31', 'M0318', 1, 0, 0, 0, 12, 56, '0318', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(943, '2010-12-31', 'M0319', 1, 0, 0, 0, 12, 57.3, '0319', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(944, '2010-12-31', 'M0323', 1, 0, 0, 0, 12, 48.4, '0323', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(945, '2010-12-31', 'M0324', 1, 0, 0, 0, 12, 48, '0324', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(946, '2010-12-31', 'M0325', 1, 0, 0, 0, 12, 52.4, '0325', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(947, '2010-12-31', 'M0328', 1, 0, 0, 0, 12, 55.8, '0328', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(948, '2010-12-31', 'M0329', 1, 0, 0, 0, 12, 49.8, '0329', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(949, '2010-12-31', 'M0331', 1, 0, 0, 0, 12, 47.5, '0331', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(950, '2010-12-31', 'M0333', 1, 0, 0, 0, 12, 49.2, '0333', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(951, '2010-12-31', 'M0335', 1, 0, 0, 0, 12, 50.4, '0335', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(952, '2010-12-31', 'M0336', 1, 0, 0, 0, 12, 58, '0336', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(953, '2010-12-31', 'M0337', 1, 0, 0, 0, 12, 47.4, '0337', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(954, '2010-12-31', 'M0338', 1, 0, 0, 0, 12, 45.5, '0338', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(955, '2010-12-31', 'M0339', 1, 0, 0, 0, 12, 56, '0339', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(956, '2010-12-31', 'M0340', 1, 0, 0, 0, 12, 51.3, '0340', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(957, '2010-12-31', 'M0341', 1, 0, 0, 0, 12, 51.7, '0341', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(958, '2010-12-31', 'M0345', 1, 0, 0, 0, 12, 50.5, '0345', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(959, '2010-12-31', 'M0348', 1, 0, 0, 0, 12, 55, '0348', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(960, '2010-12-31', 'M0350', 1, 0, 0, 0, 12, 51.1, '0350', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(961, '2010-12-31', 'M0353', 1, 0, 0, 0, 12, 50.4, '0353', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(962, '2010-12-31', 'M0365', 1, 0, 0, 0, 12, 54.6, '0365', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(963, '2010-12-31', 'M0366', 1, 0, 0, 0, 12, 49.6, '0366', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(964, '2010-12-31', 'M0371', 1, 0, 0, 0, 12, 48.6, '0371', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(965, '2010-12-31', 'M0372', 1, 0, 0, 0, 12, 57.3, '0372', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(966, '2010-12-31', 'M0373', 1, 0, 0, 0, 12, 60.8, '0373', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(967, '2010-12-31', 'M0376', 1, 0, 0, 0, 12, 53.6, '0376', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(968, '2010-12-31', 'M0378', 1, 0, 0, 0, 12, 51, '0378', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(969, '2010-12-31', 'M0379', 1, 0, 0, 0, 12, 50.4, '0379', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(970, '2010-12-31', 'M0382', 1, 0, 0, 0, 12, 49.2, '0382', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(971, '2010-12-31', 'M0383', 1, 0, 0, 0, 12, 51.8, '0383', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(972, '2010-12-31', 'M0386', 1, 0, 0, 0, 12, 50.8, '0386', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(973, '2010-12-31', 'M0388', 1, 0, 0, 0, 12, 46.2, '0388', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(974, '2010-12-31', 'M0390', 1, 0, 0, 0, 12, 57.8, '0390', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(975, '2012-10-16', 'M0395', 1, 0, 0, 0, 12, 54.1, '0395', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(976, '2010-12-31', 'M0397', 1, 0, 0, 0, 12, 51.4, '0397', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(977, '2010-12-31', 'M0399', 1, 0, 0, 0, 12, 50.3, '0399', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(978, '2010-12-31', 'M0401', 1, 0, 0, 0, 12, 49.7, '0401', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(979, '2010-12-31', 'M0403', 1, 0, 0, 0, 12, 47.5, '0403', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(980, '2010-12-31', 'M0404', 1, 0, 0, 0, 12, 50.5, '0404', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(981, '2010-12-31', 'M0405', 1, 0, 0, 0, 12, 50, '0405', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(982, '2010-12-31', 'M0407', 1, 0, 0, 0, 12, 51.4, '0407', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(983, '2010-12-31', 'M0410', 1, 0, 0, 0, 12, 45.7, '0410', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(984, '2010-12-31', 'M0414', 1, 0, 0, 0, 12, 50.2, '0414', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(985, '2010-12-31', 'M0424', 1, 0, 0, 0, 12, 49.2, '0424', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(986, '2010-12-31', 'M0427', 1, 0, 0, 0, 12, 58, '0427', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(987, '2010-12-31', 'M0431', 1, 0, 0, 0, 12, 49.8, '0431', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(988, '2010-12-31', 'M0433', 1, 0, 0, 0, 12, 48.8, '0433', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(989, '2010-12-31', 'M0438', 1, 0, 0, 0, 12, 50.6, '0438', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(990, '2010-12-31', 'M0439', 1, 0, 0, 0, 12, 59.6, '0439', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(991, '2010-12-31', 'M0442', 1, 0, 0, 0, 12, 60, '0442', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(992, '2010-12-31', 'M0443', 1, 0, 0, 0, 12, 48.8, '0443', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(993, '2010-12-31', 'M0444', 1, 0, 0, 0, 12, 48.4, '0444', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(994, '2010-12-31', 'M0445', 1, 0, 0, 0, 12, 55.8, '0445', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(995, '2010-12-31', 'M0448', 1, 0, 0, 0, 12, 60.2, '0448', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(996, '2010-12-31', 'M0452', 1, 0, 0, 0, 12, 58.3, '0452', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(997, '2010-12-31', 'M0454', 1, 0, 0, 0, 12, 55.6, '0454', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(998, '2010-12-31', 'M0457', 1, 0, 0, 0, 12, 55.2, '0457', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(999, '2010-12-31', 'M0458', 1, 0, 0, 0, 12, 50.8, '0458', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1000, '2010-12-31', 'M0459', 1, 0, 0, 0, 12, 48.6, '0459', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1001, '2010-12-31', 'M0460', 1, 0, 0, 0, 12, 57.6, '0460', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1002, '2010-12-31', 'M0462', 1, 0, 0, 0, 12, 52.2, '0462', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1003, '2010-12-31', 'M0466', 1, 0, 0, 0, 12, 52.2, '0466', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1004, '2010-12-31', 'M0468', 1, 0, 0, 0, 12, 50.6, '0468', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1005, '2010-12-31', 'M0469', 1, 0, 0, 0, 12, 54.5, '0469', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1006, '2010-12-31', 'M0471', 1, 0, 0, 0, 12, 51.4, '0471', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1007, '2010-12-31', 'M0489', 1, 0, 0, 0, 12, 55.9, '0489', 0, '0000-00-00 00:00:00', 0, NULL, NULL);
INSERT INTO `m_bobbin` (`id`, `tanggal`, `nomor_bobbin`, `m_jenis_packing_id`, `owner_id`, `borrowed_by`, `borrowed_by_supplier`, `m_bobbin_size_id`, `berat`, `nomor_urut`, `status`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1008, '2010-12-31', 'M0490', 1, 0, 0, 0, 12, 50.4, '0490', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1009, '2010-12-31', 'M0491', 1, 0, 0, 0, 12, 53.8, '0491', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1010, '2010-12-31', 'M0492', 1, 0, 0, 0, 12, 41.3, '0492', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1011, '2010-12-31', 'M0493', 1, 0, 0, 0, 12, 48.2, '0493', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1012, '2010-12-31', 'M0494', 1, 0, 0, 0, 12, 49.6, '0494', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1013, '2010-12-31', 'M0499', 1, 0, 0, 0, 12, 50, '0499', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1014, '2010-12-31', 'M0501', 1, 0, 0, 0, 12, 56, '0501', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1015, '2010-12-31', 'M0502', 1, 0, 0, 0, 12, 56.3, '0502', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1016, '2010-12-31', 'M0503', 1, 0, 0, 0, 12, 48.5, '0503', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1017, '2010-12-31', 'M0505', 1, 0, 0, 0, 12, 54.8, '0505', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1018, '2010-12-31', 'M0508', 1, 0, 0, 0, 12, 49.6, '0508', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1019, '2010-12-31', 'M0509', 1, 0, 0, 0, 12, 51, '0509', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1020, '2010-12-31', 'M0510', 1, 0, 0, 0, 12, 50.2, '0510', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1021, '2010-12-31', 'M0514', 1, 0, 0, 0, 12, 46, '0514', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1022, '2010-12-31', 'M0517', 1, 0, 0, 0, 12, 46.8, '0517', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1023, '2010-12-31', 'M0519', 1, 0, 0, 0, 12, 42.8, '0519', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1024, '2010-12-31', 'M0521', 1, 0, 0, 0, 12, 53.3, '0521', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1025, '2010-12-31', 'M0527', 1, 0, 0, 0, 12, 60.8, '0527', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1026, '2010-12-31', 'M0528', 1, 0, 0, 0, 12, 47.5, '0528', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1027, '2010-12-31', 'M0534', 1, 0, 0, 0, 12, 54.2, '0534', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1028, '2010-12-31', 'M0535', 1, 0, 0, 0, 12, 49, '0535', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1029, '2010-12-31', 'M0536', 1, 0, 0, 0, 12, 58.6, '0536', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1030, '2010-12-31', 'M0537', 1, 0, 0, 0, 12, 48.8, '0537', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1031, '2010-12-31', 'M0541', 1, 0, 0, 0, 12, 49.9, '0541', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1032, '2010-12-31', 'M0543', 1, 0, 0, 0, 12, 54.8, '0543', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1033, '2010-12-31', 'M0544', 1, 0, 0, 0, 12, 47.6, '0544', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1034, '2010-12-31', 'M0549', 1, 0, 0, 0, 12, 45.7, '0549', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1035, '2010-12-31', 'M0554', 1, 0, 0, 0, 12, 57.6, '0554', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1036, '2010-12-31', 'M0555', 1, 0, 0, 0, 12, 58.2, '0555', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1037, '2010-12-31', 'M0557', 1, 0, 0, 0, 12, 56, '0557', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1038, '2010-12-31', 'M0558', 1, 0, 0, 0, 12, 49.2, '0558', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1039, '2010-12-31', 'M0559', 1, 0, 0, 0, 12, 50.7, '0559', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1040, '2010-12-31', 'M0560', 1, 0, 0, 0, 12, 50.5, '0560', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1041, '2010-12-31', 'M0563', 1, 0, 0, 0, 12, 51, '0563', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1042, '2010-12-31', 'M0565', 1, 0, 0, 0, 12, 48.9, '0565', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1043, '2010-12-31', 'M0566', 1, 0, 0, 0, 12, 51.1, '0566', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1044, '2010-12-31', 'M0575', 1, 0, 0, 0, 12, 50.7, '0575', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1045, '2010-12-31', 'M0576', 1, 0, 0, 0, 12, 52, '0576', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1046, '2010-12-31', 'M0579', 1, 0, 0, 0, 12, 49.4, '0579', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1047, '2010-12-31', 'M0582', 1, 0, 0, 0, 12, 47.4, '0582', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1048, '2010-12-31', 'M0583', 1, 0, 0, 0, 12, 51.8, '0583', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1049, '2010-12-31', 'M0586', 1, 0, 0, 0, 12, 54.2, '0586', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1050, '2010-12-31', 'M0595', 1, 0, 0, 0, 12, 47.8, '0595', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1051, '2010-12-31', 'M0596', 1, 0, 0, 0, 12, 49.1, '0596', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1052, '2010-12-31', 'M0597', 1, 0, 0, 0, 12, 47.5, '0597', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1053, '2010-12-31', 'M0598', 1, 0, 0, 0, 12, 57.3, '0598', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1054, '2010-12-31', 'M0599', 1, 0, 0, 0, 12, 50.3, '0599', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1055, '2010-12-31', 'M0605', 1, 0, 0, 0, 12, 52.6, '0605', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1056, '2010-12-31', 'M0606', 1, 0, 0, 0, 12, 50.8, '0606', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1057, '2010-12-31', 'M0608', 1, 0, 0, 0, 12, 51.2, '0608', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1058, '2010-12-31', 'M0609', 1, 0, 0, 0, 12, 50.3, '0609', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1059, '2010-12-31', 'M0610', 1, 0, 0, 0, 12, 53.4, '0610', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1060, '2010-12-31', 'M0611', 1, 0, 0, 0, 12, 56.5, '0611', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1061, '2010-12-31', 'M0612', 1, 0, 0, 0, 12, 51.9, '0612', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1062, '2010-12-31', 'M0617', 1, 0, 0, 0, 12, 45.9, '0617', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1063, '2010-12-31', 'M0618', 1, 0, 0, 0, 12, 51.8, '0618', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1064, '2010-12-31', 'M0620', 1, 0, 0, 0, 12, 50.8, '0620', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1065, '2010-12-31', 'M0621', 1, 0, 0, 0, 12, 50.1, '0621', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1066, '2010-12-31', 'M0622', 1, 0, 0, 0, 12, 44.3, '0622', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1067, '2010-12-31', 'M0623', 1, 0, 0, 0, 12, 51.4, '0623', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1068, '2010-12-31', 'M0624', 1, 0, 0, 0, 12, 49.7, '0624', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1069, '2010-12-31', 'M0628', 1, 0, 0, 0, 12, 58.2, '0628', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1070, '2010-12-31', 'M0630', 1, 0, 0, 0, 12, 58, '0630', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1071, '2010-12-31', 'M0641', 1, 0, 0, 0, 12, 51.1, '0641', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1072, '2010-12-31', 'M0642', 1, 0, 0, 0, 12, 45.4, '0642', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1073, '2010-12-31', 'M0643', 1, 0, 0, 0, 12, 58.4, '0643', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1074, '2010-12-31', 'M0653', 1, 0, 0, 0, 12, 58.6, '0653', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1075, '2010-12-31', 'M0654', 1, 0, 0, 0, 12, 56.4, '0654', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1076, '2010-12-31', 'M0657', 1, 0, 0, 0, 12, 50.9, '0657', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1077, '2010-12-31', 'M0658', 1, 0, 0, 0, 12, 54.3, '0658', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1078, '2010-12-31', 'M0661', 1, 0, 0, 0, 12, 49.5, '0661', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1079, '2010-12-31', 'M0665', 1, 0, 0, 0, 12, 48.8, '0665', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1080, '2010-12-31', 'M0666', 1, 0, 0, 0, 12, 42.8, '0666', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1081, '2010-12-31', 'M0667', 1, 0, 0, 0, 12, 52.4, '0667', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1082, '2010-12-31', 'M0669', 1, 0, 0, 0, 12, 50.2, '0669', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1083, '2010-12-31', 'M0670', 1, 0, 0, 0, 12, 51.1, '0670', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1084, '2010-12-31', 'M0671', 1, 0, 0, 0, 12, 51, '0671', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1085, '2010-12-31', 'M0673', 1, 0, 0, 0, 12, 44.3, '0673', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1086, '2010-12-31', 'M0674', 1, 0, 0, 0, 12, 45, '0674', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1087, '2010-12-31', 'M0675', 1, 0, 0, 0, 12, 51, '0675', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1088, '2010-12-31', 'M0676', 1, 0, 0, 0, 12, 46.3, '0676', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1089, '2010-12-31', 'M0677', 1, 0, 0, 0, 12, 49.4, '0677', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1090, '2010-12-31', 'M0679', 1, 0, 0, 0, 12, 49, '0679', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1091, '2010-12-31', 'M0681', 1, 0, 0, 0, 12, 53, '0681', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1092, '2010-12-31', 'M0684', 1, 0, 0, 0, 12, 59.4, '0684', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1093, '2010-12-31', 'M0685', 1, 0, 0, 0, 12, 52.9, '0685', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1094, '2010-12-31', 'M0687', 1, 0, 0, 0, 12, 58.8, '0687', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1095, '2010-12-31', 'M0690', 1, 0, 0, 0, 12, 54.9, '0690', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1096, '2010-12-31', 'M0709', 1, 0, 0, 0, 12, 57.1, '0709', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1097, '2012-10-18', 'M0719', 1, 0, 0, 0, 12, 44.1, '0719', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1098, '2010-12-31', 'M0720', 1, 0, 0, 0, 12, 56.4, '0720', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1099, '2010-12-31', 'M0722', 1, 0, 0, 0, 12, 41.8, '0722', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1100, '2010-12-31', 'M0728', 1, 0, 0, 0, 12, 50, '0728', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1101, '2010-12-31', 'M0729', 1, 0, 0, 0, 12, 48.3, '0729', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1102, '2010-12-31', 'M0737', 1, 0, 0, 0, 12, 30.5, '0737', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1103, '2010-12-31', 'M0738', 1, 0, 0, 0, 12, 50.4, '0738', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1104, '2010-12-31', 'M0746', 1, 0, 0, 0, 12, 43.4, '0746', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1105, '2010-12-31', 'M0747', 1, 0, 0, 0, 12, 52.6, '0747', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1106, '2010-12-31', 'M0748', 1, 0, 0, 0, 12, 57.6, '0748', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1107, '2010-12-31', 'M0749', 1, 0, 0, 0, 12, 46.6, '0749', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1108, '2010-12-31', 'M0750', 1, 0, 0, 0, 12, 53.3, '0750', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1109, '2010-12-31', 'M0751', 1, 0, 0, 0, 12, 41.2, '0751', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1110, '2010-12-31', 'M0752', 1, 0, 0, 0, 12, 44.6, '0752', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1111, '2010-12-31', 'M0753', 1, 0, 0, 0, 12, 48.7, '0753', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1112, '2010-12-31', 'M0754', 1, 0, 0, 0, 12, 52.2, '0754', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1113, '2010-12-31', 'M0756', 1, 0, 0, 0, 12, 49.6, '0756', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1114, '2010-12-31', 'M0757', 1, 0, 0, 0, 12, 54.8, '0757', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1115, '2010-12-31', 'M0758', 1, 0, 0, 0, 12, 59.4, '0758', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1116, '2010-12-31', 'M0759', 1, 0, 0, 0, 12, 55, '0759', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1117, '2010-12-31', 'M0760', 1, 0, 0, 0, 12, 49.6, '0760', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1118, '2010-12-31', 'M0762', 1, 0, 0, 0, 12, 54, '0762', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1119, '2010-12-31', 'M0763', 1, 0, 0, 0, 12, 56.4, '0763', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1120, '2010-12-31', 'M0764', 1, 0, 0, 0, 12, 49.1, '0764', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1121, '2010-12-31', 'M0765', 1, 0, 0, 0, 12, 50.2, '0765', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1122, '2010-12-31', 'M0769', 1, 0, 0, 0, 12, 54, '0769', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1123, '2010-12-31', 'M0771', 1, 0, 0, 0, 12, 53.8, '0771', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1124, '2010-12-31', 'M0775', 1, 0, 0, 0, 12, 50, '0775', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1125, '2010-12-31', 'M0779', 1, 0, 0, 0, 12, 45.9, '0779', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1126, '2010-12-31', 'M0780', 1, 0, 0, 0, 12, 56.6, '0780', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1127, '2010-12-31', 'M0781', 1, 0, 0, 0, 12, 52, '0781', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1128, '2010-12-31', 'M0784', 1, 0, 0, 0, 12, 48.4, '0784', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1129, '2010-12-31', 'M0785', 1, 0, 0, 0, 12, 52.2, '0785', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1130, '2010-12-31', 'M0786', 1, 0, 0, 0, 12, 55.2, '0786', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1131, '2010-12-31', 'M0787', 1, 0, 0, 0, 12, 50.5, '0787', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1132, '2010-12-31', 'M0792', 1, 0, 0, 0, 12, 54.8, '0792', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1133, '2010-12-31', 'M0793', 1, 0, 0, 0, 12, 50.6, '0793', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1134, '2010-12-31', 'M0796', 1, 0, 0, 0, 12, 48.7, '0796', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1135, '2010-12-31', 'M0798', 1, 0, 0, 0, 12, 54, '0798', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1136, '2010-12-31', 'M0803', 1, 0, 0, 0, 12, 50.1, '0803', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1137, '2010-12-31', 'M0805', 1, 0, 0, 0, 12, 54, '0805', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1138, '2010-12-31', 'M0806', 1, 0, 0, 0, 12, 46.7, '0806', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1139, '2010-12-31', 'M0821', 1, 0, 0, 0, 12, 57.1, '0821', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1140, '2010-12-31', 'M0822', 1, 0, 0, 0, 12, 49.3, '0822', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1141, '2010-12-31', 'M0823', 1, 0, 0, 0, 12, 49.8, '0823', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1142, '2010-12-31', 'M0825', 1, 0, 0, 0, 12, 48.3, '0825', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1143, '2010-12-31', 'M0826', 1, 0, 0, 0, 12, 56.2, '0826', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1144, '2010-12-31', 'M0827', 1, 0, 0, 0, 12, 49.1, '0827', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1145, '2010-12-31', 'M0829', 1, 0, 0, 0, 12, 49.5, '0829', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1146, '2010-12-31', 'M0831', 1, 0, 0, 0, 12, 50.5, '0831', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1147, '2010-12-31', 'M0853', 1, 0, 0, 0, 12, 49.5, '0853', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1148, '2010-12-31', 'M0859', 1, 0, 0, 0, 12, 45.4, '0859', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1149, '2010-12-31', 'M0860', 1, 0, 0, 0, 12, 50.6, '0860', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1150, '2010-12-31', 'M0862', 1, 0, 0, 0, 12, 49.8, '0862', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1151, '2010-12-31', 'M0863', 1, 0, 0, 0, 12, 48.6, '0863', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1152, '2010-12-31', 'M0865', 1, 0, 0, 0, 12, 50.9, '0865', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1153, '2010-12-31', 'M0868', 1, 0, 0, 0, 12, 40.6, '0868', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1154, '2010-12-31', 'M0869', 1, 0, 0, 0, 12, 53, '0869', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1155, '2010-12-31', 'M0870', 1, 0, 0, 0, 12, 52, '0870', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1156, '2010-12-31', 'M0871', 1, 0, 0, 0, 12, 49.8, '0871', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1157, '2010-12-31', 'M0883', 1, 0, 0, 0, 12, 50, '0883', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1158, '2010-12-31', 'M0892', 1, 0, 0, 0, 12, 44.9, '0892', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1159, '2010-12-31', 'M0899', 1, 0, 0, 0, 12, 42.1, '0899', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1160, '2010-12-31', 'M0900', 1, 0, 0, 0, 12, 53.3, '0900', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1161, '2010-12-31', 'M0902', 1, 0, 0, 0, 12, 37, '0902', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1162, '2010-12-31', 'M0905', 1, 0, 0, 0, 12, 43.7, '0905', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1163, '2010-12-31', 'M0918', 1, 0, 0, 0, 12, 41.4, '0918', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1164, '2010-12-31', 'M0929', 1, 0, 0, 0, 12, 40.2, '0929', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1165, '2010-12-31', 'M0930', 1, 0, 0, 0, 12, 37.3, '0930', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1166, '2010-12-31', 'M0931', 1, 0, 0, 0, 12, 43.6, '0931', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1167, '2010-12-31', 'M0932', 1, 0, 0, 0, 12, 51.2, '0932', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1168, '2010-12-31', 'M0933', 1, 0, 0, 0, 12, 42.7, '0933', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1169, '2010-12-31', 'M0934', 1, 0, 0, 0, 12, 59, '0934', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1170, '2010-12-31', 'M0935', 1, 0, 0, 0, 12, 50.9, '0935', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1171, '2010-12-31', 'M0936', 1, 0, 0, 0, 12, 53.2, '0936', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1172, '2010-12-31', 'M0938', 1, 0, 0, 0, 12, 53.2, '0938', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1173, '2010-12-31', 'M0940', 1, 0, 0, 0, 12, 49.4, '0940', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1174, '2010-12-31', 'M0941', 1, 0, 0, 0, 12, 38.3, '0941', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1175, '2010-12-31', 'M0943', 1, 0, 0, 0, 12, 42.5, '0943', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1176, '2010-12-31', 'M0945', 1, 0, 0, 0, 12, 41.4, '0945', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1177, '2010-12-31', 'M0946', 1, 0, 0, 0, 12, 47.8, '0946', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1178, '2010-12-31', 'M0957', 1, 0, 0, 0, 12, 50.7, '0957', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1179, '2010-12-31', 'M0958', 1, 0, 0, 0, 12, 55.2, '0958', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1180, '2010-12-31', 'M0959', 1, 0, 0, 0, 12, 55.3, '0959', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1181, '2010-12-31', 'M0960', 1, 0, 0, 0, 12, 49.6, '0960', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1182, '2010-12-31', 'M0971', 1, 0, 0, 0, 12, 50.6, '0971', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1183, '2010-12-31', 'M0988', 1, 0, 0, 0, 12, 57.9, '0988', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1184, '2012-07-07', 'M1006', 1, 0, 0, 0, 12, 54.8, '1006', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1185, '2010-12-31', 'M1007', 1, 0, 0, 0, 12, 52.4, '1007', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1186, '2010-12-31', 'M1221', 1, 0, 0, 0, 12, 53.9, '1221', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1187, '2010-12-31', 'M1237', 1, 0, 0, 0, 12, 55.4, '1237', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1188, '2010-12-31', 'M1239', 1, 0, 0, 0, 12, 54.5, '1239', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1189, '2010-12-31', 'M1248', 1, 0, 0, 0, 12, 48.2, '1248', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1190, '2010-12-31', 'M1249', 1, 0, 0, 0, 12, 49.1, '1249', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1191, '2010-12-31', 'M1252', 1, 0, 0, 0, 12, 44.1, '1252', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1192, '2010-12-31', 'M1265', 1, 0, 0, 0, 12, 54.6, '1265', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1193, '2010-12-31', 'M1274', 1, 0, 0, 0, 12, 41.2, '1274', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1194, '2010-12-31', 'M1278', 1, 0, 0, 0, 12, 50.3, '1278', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1195, '2010-12-31', 'M1299', 1, 0, 0, 0, 12, 55.6, '1299', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1196, '2010-12-31', 'M1312', 1, 0, 0, 0, 12, 57.9, '1312', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1197, '2010-12-31', 'M1323', 1, 0, 0, 0, 12, 60.5, '1323', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1198, '2013-10-16', 'M1441', 1, 0, 0, 0, 12, 41.9, '1441', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1199, '2010-12-31', 'M1446', 1, 0, 0, 0, 12, 50.7, '1446', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1200, '2010-12-31', 'M1456', 1, 0, 0, 0, 12, 43.6, '1456', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1201, '2010-12-31', 'M1457', 1, 0, 0, 0, 12, 49.7, '1457', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1202, '2010-12-31', 'P0001', 2, 0, 0, 0, 13, 5.2, '0001', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1203, '2010-12-31', 'P0002', 2, 0, 0, 0, 13, 6, '0002', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1204, '2010-12-31', 'P0003', 2, 0, 0, 0, 13, 5.8, '0003', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1205, '2010-12-31', 'P0004', 2, 0, 0, 0, 13, 8.6, '0004', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1206, '2010-12-31', 'P0005', 2, 0, 0, 0, 13, 7.8, '0005', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1207, '2010-12-31', 'P0006', 2, 0, 0, 0, 13, 6.9, '0006', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1208, '2010-12-31', 'P0007', 2, 0, 0, 0, 13, 7.1, '0007', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1209, '2010-12-31', 'P0008', 2, 0, 0, 0, 13, 6.8, '0008', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1210, '2010-12-31', 'P0009', 2, 0, 0, 0, 13, 7.6, '0009', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1211, '2010-12-31', 'P0010', 2, 0, 0, 0, 13, 7.2, '0010', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1212, '2010-12-31', 'P0011', 2, 0, 0, 0, 13, 8.2, '0011', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1213, '2010-12-31', 'P0012', 2, 0, 0, 0, 13, 7, '0012', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1214, '2010-12-31', 'P0013', 2, 0, 0, 0, 13, 5.8, '0013', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1215, '2010-12-31', 'P0014', 2, 0, 0, 0, 13, 6.8, '0014', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1216, '2010-12-31', 'P0015', 2, 0, 0, 0, 13, 7.8, '0015', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1217, '2010-12-31', 'P0016', 2, 0, 0, 0, 13, 7.6, '0016', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1218, '2010-12-31', 'P0017', 2, 0, 0, 0, 13, 7.2, '0017', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1219, '2010-12-31', 'P0018', 2, 0, 0, 0, 13, 7.2, '0018', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1220, '2010-12-31', 'P0019', 2, 0, 0, 0, 13, 7.2, '0019', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1221, '2010-12-31', 'P0020', 2, 0, 0, 0, 13, 7.8, '0020', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1222, '2010-12-31', 'P0021', 2, 0, 0, 0, 13, 14.4, '0021', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1223, '2010-12-31', 'P0022', 2, 0, 0, 0, 13, 8, '0022', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1224, '2010-12-31', 'P0023', 2, 0, 0, 0, 13, 7, '0023', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1225, '2010-12-31', 'P0024', 2, 0, 0, 0, 13, 7.7, '0024', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1226, '2010-12-31', 'P0025', 2, 0, 0, 0, 13, 5.6, '0025', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1227, '2010-12-31', 'P0026', 2, 0, 0, 0, 13, 5.7, '0026', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1228, '2010-12-31', 'P0027', 2, 0, 0, 0, 13, 6, '0027', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1229, '2010-12-31', 'P0028', 2, 0, 0, 0, 13, 6, '0028', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1230, '2010-12-31', 'P0029', 2, 0, 0, 0, 13, 7.2, '0029', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1231, '2010-12-31', 'P0030', 2, 0, 0, 0, 13, 9, '0030', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1232, '2010-12-31', 'P0031', 2, 0, 0, 0, 13, 7, '0031', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1233, '2010-12-31', 'P0032', 2, 0, 0, 0, 13, 6, '0032', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1234, '2010-12-31', 'P0033', 2, 0, 0, 0, 13, 5.6, '0033', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1235, '2010-12-31', 'P0034', 2, 0, 0, 0, 13, 7.8, '0034', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1236, '2010-12-31', 'P0035', 2, 0, 0, 0, 13, 5.8, '0035', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1237, '2010-12-31', 'P0036', 2, 0, 0, 0, 13, 7.6, '0036', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1238, '2010-12-31', 'P0037', 2, 0, 0, 0, 13, 5.6, '0037', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1239, '2010-12-31', 'P0038', 2, 0, 0, 0, 13, 5.6, '0038', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1240, '2010-12-31', 'P0039', 2, 0, 0, 0, 13, 7.2, '0039', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1241, '2010-12-31', 'P0040', 2, 0, 0, 0, 13, 7.2, '0040', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1242, '2010-12-31', 'P0041', 2, 0, 0, 0, 13, 5.8, '0041', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1243, '2010-12-31', 'P0042', 2, 0, 0, 0, 13, 6, '0042', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1244, '2010-12-31', 'P0043', 2, 0, 0, 0, 13, 5.8, '0043', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1245, '2010-12-31', 'P0044', 2, 0, 0, 0, 13, 7.4, '0044', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1246, '2010-12-31', 'P0045', 2, 0, 0, 0, 13, 6, '0045', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1247, '2010-12-31', 'P0046', 2, 0, 0, 0, 13, 5.7, '0046', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1248, '2010-12-31', 'P0047', 2, 0, 0, 0, 13, 5.2, '0047', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1249, '2010-12-31', 'P0048', 2, 0, 0, 0, 13, 6, '0048', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1250, '2010-12-31', 'P0049', 2, 0, 0, 0, 13, 7.6, '0049', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1251, '2010-12-31', 'P0050', 2, 0, 0, 0, 13, 7.6, '0050', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1252, '2010-12-31', 'P0051', 2, 0, 0, 0, 13, 7.2, '0051', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1253, '2010-12-31', 'P0052', 2, 0, 0, 0, 13, 6.7, '0052', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1254, '2010-12-31', 'P0053', 2, 0, 0, 0, 13, 7.8, '0053', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1255, '2010-12-31', 'P0054', 2, 0, 0, 0, 13, 6.8, '0054', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1256, '2010-12-31', 'P0055', 2, 0, 0, 0, 13, 7.4, '0055', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1257, '2010-12-31', 'P0056', 2, 0, 0, 0, 13, 7.2, '0056', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1258, '2010-12-31', 'P0057', 2, 0, 0, 0, 13, 7.8, '0057', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1259, '2010-12-31', 'P0058', 2, 0, 0, 0, 13, 6.4, '0058', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1260, '2010-12-31', 'P0059', 2, 0, 0, 0, 13, 9.6, '0059', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1261, '2010-12-31', 'P0060', 2, 0, 0, 0, 13, 6.4, '0060', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1262, '2010-12-31', 'P0061', 2, 0, 0, 0, 13, 5.8, '0061', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1263, '2010-12-31', 'P0062', 2, 0, 0, 0, 13, 7.8, '0062', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1264, '2010-12-31', 'P0063', 2, 0, 0, 0, 13, 6.8, '0063', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1265, '2010-12-31', 'P0064', 2, 0, 0, 0, 13, 5.2, '0064', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1266, '2010-12-31', 'P0065', 2, 0, 0, 0, 13, 7.8, '0065', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1267, '2010-12-31', 'P0066', 2, 0, 0, 0, 13, 6.8, '0066', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1268, '2010-12-31', 'P0067', 2, 0, 0, 0, 13, 5.8, '0067', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1269, '2010-12-31', 'P0068', 2, 0, 0, 0, 13, 7.2, '0068', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1270, '2010-12-31', 'P0069', 2, 0, 0, 0, 13, 7.6, '0069', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1271, '2010-12-31', 'P0070', 2, 0, 0, 0, 13, 7, '0070', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1272, '2010-12-31', 'P0071', 2, 0, 0, 0, 13, 6.8, '0071', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1273, '2010-12-31', 'P0072', 2, 0, 0, 0, 13, 5.2, '0072', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1274, '2010-12-31', 'P0073', 2, 0, 0, 0, 13, 6.8, '0073', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1275, '2010-12-31', 'P0074', 2, 0, 0, 0, 13, 6, '0074', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1276, '2010-12-31', 'P0075', 2, 0, 0, 0, 13, 7.2, '0075', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1277, '2010-12-31', 'P0076', 2, 0, 0, 0, 13, 5.8, '0076', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1278, '2010-12-31', 'P0077', 2, 0, 0, 0, 13, 7.2, '0077', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1279, '2010-12-31', 'P0078', 2, 0, 0, 0, 13, 7.2, '0078', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1280, '2010-12-31', 'P0079', 2, 0, 0, 0, 13, 7.8, '0079', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1281, '2010-12-31', 'P0080', 2, 0, 0, 0, 13, 7.8, '0080', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1282, '2010-12-31', 'P0081', 2, 0, 0, 0, 13, 7.2, '0081', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1283, '2010-12-31', 'P0082', 2, 0, 0, 0, 13, 8.6, '0082', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1284, '2010-12-31', 'P0083', 2, 0, 0, 0, 13, 5.8, '0083', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1285, '2010-12-31', 'P0084', 2, 0, 0, 0, 13, 6.8, '0084', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1286, '2010-12-31', 'P0085', 2, 0, 0, 0, 13, 5.8, '0085', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1287, '2010-12-31', 'P0086', 2, 0, 0, 0, 13, 7, '0086', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1288, '2010-12-31', 'P0087', 2, 0, 0, 0, 13, 7.4, '0087', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1289, '2010-12-31', 'P0088', 2, 0, 0, 0, 13, 5.6, '0088', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1290, '2010-12-31', 'P0089', 2, 0, 0, 0, 13, 6, '0089', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1291, '2010-12-31', 'P0090', 2, 0, 0, 0, 13, 5.6, '0090', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1292, '2010-12-31', 'P0091', 2, 0, 0, 0, 13, 7.2, '0091', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1293, '2010-12-31', 'P0092', 2, 0, 0, 0, 13, 7.8, '0092', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1294, '2010-12-31', 'P0093', 2, 0, 0, 0, 13, 7, '0093', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1295, '2010-12-31', 'P0094', 2, 0, 0, 0, 13, 6.4, '0094', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1296, '2010-12-31', 'P0095', 2, 0, 0, 0, 13, 7.4, '0095', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1297, '2010-12-31', 'P0096', 2, 0, 0, 0, 13, 5.8, '0096', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1298, '2010-12-31', 'P0097', 2, 0, 0, 0, 13, 5.8, '0097', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1299, '2010-12-31', 'P0098', 2, 0, 0, 0, 13, 7.4, '0098', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1300, '2010-12-31', 'P0099', 2, 0, 0, 0, 13, 7.6, '0099', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1301, '2010-12-31', 'P0100', 2, 0, 0, 0, 13, 6, '0100', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1302, '2010-12-31', 'P0101', 2, 0, 0, 0, 13, 6.6, '0101', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1303, '2010-12-31', 'P0102', 2, 0, 0, 0, 13, 7.8, '0102', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1304, '2010-12-31', 'P0103', 2, 0, 0, 0, 13, 5.2, '0103', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1305, '2010-12-31', 'P0104', 2, 0, 0, 0, 13, 7, '0104', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1306, '2010-12-31', 'P0105', 2, 0, 0, 0, 13, 7.2, '0105', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1307, '2010-12-31', 'P0106', 2, 0, 0, 0, 13, 5.6, '0106', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1308, '2010-12-31', 'P0107', 2, 0, 0, 0, 13, 8.2, '0107', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1309, '2010-12-31', 'P0108', 2, 0, 0, 0, 13, 5.8, '0108', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1310, '2010-12-31', 'P0109', 2, 0, 0, 0, 13, 7.2, '0109', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1311, '2010-12-31', 'P0110', 2, 0, 0, 0, 13, 7.2, '0110', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1312, '2010-12-31', 'P0111', 2, 0, 0, 0, 13, 5.8, '0111', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1313, '2010-12-31', 'P0112', 2, 0, 0, 0, 13, 6.8, '0112', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1314, '2010-12-31', 'P0113', 2, 0, 0, 0, 13, 7.8, '0113', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1315, '2010-12-31', 'P0114', 2, 0, 0, 0, 13, 7.2, '0114', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1316, '2010-12-31', 'P0115', 2, 0, 0, 0, 13, 8.2, '0115', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1317, '2010-12-31', 'P0116', 2, 0, 0, 0, 13, 5.8, '0116', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1318, '2010-12-31', 'P0117', 2, 0, 0, 0, 13, 5.6, '0117', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1319, '2010-12-31', 'P0118', 2, 0, 0, 0, 13, 7, '0118', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1320, '2010-12-31', 'P0119', 2, 0, 0, 0, 13, 5.8, '0119', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1321, '2010-12-31', 'P0120', 2, 0, 0, 0, 13, 9, '0120', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1322, '2010-12-31', 'P0121', 2, 0, 0, 0, 13, 7.2, '0121', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1323, '2010-12-31', 'P0122', 2, 0, 0, 0, 13, 5.7, '0122', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1324, '2010-12-31', 'P0123', 2, 0, 0, 0, 13, 7, '0123', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1325, '2010-12-31', 'P0124', 2, 0, 0, 0, 13, 7.8, '0124', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1326, '2010-12-31', 'P0125', 2, 0, 0, 0, 13, 6, '0125', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1327, '2010-12-31', 'P0126', 2, 0, 0, 0, 13, 5.2, '0126', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1328, '2010-12-31', 'P0127', 2, 0, 0, 0, 13, 7.6, '0127', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1329, '2010-12-31', 'P0128', 2, 0, 0, 0, 13, 7.2, '0128', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1330, '2010-12-31', 'P0129', 2, 0, 0, 0, 13, 5.8, '0129', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1331, '2010-12-31', 'P0130', 2, 0, 0, 0, 13, 5, '0130', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1332, '2010-12-31', 'P0131', 2, 0, 0, 0, 13, 6, '0131', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1333, '2010-12-31', 'P0132', 2, 0, 0, 0, 13, 7.2, '0132', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1334, '2010-12-31', 'P0133', 2, 0, 0, 0, 13, 5.8, '0133', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1335, '2010-12-31', 'P0134', 2, 0, 0, 0, 13, 5.6, '0134', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1336, '2010-12-31', 'P0135', 2, 0, 0, 0, 13, 6.8, '0135', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1337, '2010-12-31', 'P0136', 2, 0, 0, 0, 13, 7.8, '0136', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1338, '2010-12-31', 'P0137', 2, 0, 0, 0, 13, 7.8, '0137', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1339, '2010-12-31', 'P0138', 2, 0, 0, 0, 13, 5.8, '0138', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1340, '2010-12-31', 'P0139', 2, 0, 0, 0, 13, 7.2, '0139', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1341, '2010-12-31', 'P0140', 2, 0, 0, 0, 13, 5.2, '0140', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1342, '2010-12-31', 'P0141', 2, 0, 0, 0, 13, 7.2, '0141', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1343, '2010-12-31', 'P0142', 2, 0, 0, 0, 13, 7.8, '0142', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1344, '2010-12-31', 'P0143', 2, 0, 0, 0, 13, 5.7, '0143', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1345, '2010-12-31', 'P0144', 2, 0, 0, 0, 13, 7.8, '0144', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1346, '2010-12-31', 'P0145', 2, 0, 0, 0, 13, 6.8, '0145', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1347, '2010-12-31', 'P0146', 2, 0, 0, 0, 13, 6, '0146', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1348, '2010-12-31', 'P0147', 2, 0, 0, 0, 13, 7.8, '0147', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1349, '2010-12-31', 'P0148', 2, 0, 0, 0, 13, 7.2, '0148', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1350, '2010-12-31', 'P0149', 2, 0, 0, 0, 13, 6.8, '0149', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1351, '2010-12-31', 'P0150', 2, 0, 0, 0, 13, 7.2, '0150', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1352, '2010-12-31', 'P0151', 2, 0, 0, 0, 13, 6.8, '0151', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1353, '2010-12-31', 'P0152', 2, 0, 0, 0, 13, 7.8, '0152', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1354, '2010-12-31', 'P0153', 2, 0, 0, 0, 13, 7.7, '0153', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1355, '2010-12-31', 'P0154', 2, 0, 0, 0, 13, 8.4, '0154', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1356, '2010-12-31', 'P0155', 2, 0, 0, 0, 13, 7.8, '0155', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1357, '2010-12-31', 'P0156', 2, 0, 0, 0, 13, 6.4, '0156', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1358, '2010-12-31', 'P0157', 2, 0, 0, 0, 13, 7, '0157', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1359, '2010-12-31', 'P0158', 2, 0, 0, 0, 13, 6.8, '0158', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1360, '2010-12-31', 'P0159', 2, 0, 0, 0, 13, 8.1, '0159', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1361, '2010-12-31', 'P0160', 2, 0, 0, 0, 13, 7.2, '0160', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1362, '2010-12-31', 'P0161', 2, 0, 0, 0, 13, 7.8, '0161', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1363, '2010-12-31', 'P0162', 2, 0, 0, 0, 13, 7.8, '0162', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1364, '2010-12-31', 'P0163', 2, 0, 0, 0, 13, 8.2, '0163', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1365, '2010-12-31', 'P0164', 2, 0, 0, 0, 13, 5.8, '0164', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1366, '2010-12-31', 'P0165', 2, 0, 0, 0, 13, 6, '0165', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1367, '2010-12-31', 'P0166', 2, 0, 0, 0, 13, 6.8, '0166', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1368, '2010-12-31', 'P0167', 2, 0, 0, 0, 13, 7.8, '0167', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1369, '2010-12-31', 'P0168', 2, 0, 0, 0, 13, 7.8, '0168', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1370, '2010-12-31', 'P0169', 2, 0, 0, 0, 13, 7.6, '0169', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1371, '2010-12-31', 'P0170', 2, 0, 0, 0, 13, 7.2, '0170', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1372, '2010-12-31', 'P0171', 2, 0, 0, 0, 13, 5.2, '0171', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1373, '2010-12-31', 'P0172', 2, 0, 0, 0, 13, 5.8, '0172', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1374, '2010-12-31', 'P0173', 2, 0, 0, 0, 13, 5.2, '0173', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1375, '2010-12-31', 'P0174', 2, 0, 0, 0, 13, 7.8, '0174', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1376, '2010-12-31', 'P0175', 2, 0, 0, 0, 13, 7.8, '0175', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1377, '2010-12-31', 'P0176', 2, 0, 0, 0, 13, 5.8, '0176', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1378, '2010-12-31', 'P0177', 2, 0, 0, 0, 13, 7.8, '0177', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1379, '2010-12-31', 'P0178', 2, 0, 0, 0, 13, 6.8, '0178', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1380, '2010-12-31', 'P0179', 2, 0, 0, 0, 13, 5.8, '0179', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1381, '2010-12-31', 'P0180', 2, 0, 0, 0, 13, 5.8, '0180', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1382, '2010-12-31', 'P0181', 2, 0, 0, 0, 13, 6, '0181', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1383, '2010-12-31', 'P0182', 2, 0, 0, 0, 13, 7.4, '0182', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1384, '2010-12-31', 'P0183', 2, 0, 0, 0, 13, 7, '0183', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1385, '2010-12-31', 'P0184', 2, 0, 0, 0, 13, 7.8, '0184', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1386, '2010-12-31', 'P0185', 2, 0, 0, 0, 13, 7.2, '0185', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1387, '2010-12-31', 'P0186', 2, 0, 0, 0, 13, 7.7, '0186', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1388, '2010-12-31', 'P0187', 2, 0, 0, 0, 13, 8, '0187', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1389, '2010-12-31', 'P0188', 2, 0, 0, 0, 13, 5.6, '0188', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1390, '2010-12-31', 'P0189', 2, 0, 0, 0, 13, 5.8, '0189', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1391, '2010-12-31', 'P0190', 2, 0, 0, 0, 13, 5.2, '0190', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1392, '2010-12-31', 'P0191', 2, 0, 0, 0, 13, 7.3, '0191', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1393, '2010-12-31', 'P0192', 2, 0, 0, 0, 13, 7.2, '0192', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1394, '2010-12-31', 'P0193', 2, 0, 0, 0, 13, 7.8, '0193', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1395, '2010-12-31', 'P0194', 2, 0, 0, 0, 13, 5.2, '0194', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1396, '2010-12-31', 'P0195', 2, 0, 0, 0, 13, 6.8, '0195', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1397, '2010-12-31', 'P0196', 2, 0, 0, 0, 13, 6.2, '0196', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1398, '2010-12-31', 'P0197', 2, 0, 0, 0, 13, 5.6, '0197', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1399, '2010-12-31', 'P0198', 2, 0, 0, 0, 13, 5.8, '0198', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1400, '2010-12-31', 'P0199', 2, 0, 0, 0, 13, 7.2, '0199', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1401, '2010-12-31', 'P0200', 2, 0, 0, 0, 13, 7.8, '0200', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1402, '2010-12-31', 'P0201', 2, 0, 0, 0, 13, 7, '0201', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1403, '2010-12-31', 'P0202', 2, 0, 0, 0, 13, 7.8, '0202', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1404, '2010-12-31', 'P0203', 2, 0, 0, 0, 13, 7, '0203', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1405, '2010-12-31', 'P0204', 2, 0, 0, 0, 13, 5.2, '0204', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1406, '2010-12-31', 'P0205', 2, 0, 0, 0, 13, 7.2, '0205', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1407, '2010-12-31', 'P0206', 2, 0, 0, 0, 13, 7.8, '0206', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1408, '2010-12-31', 'P0207', 2, 0, 0, 0, 13, 7, '0207', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1409, '2010-12-31', 'P0208', 2, 0, 0, 0, 13, 7.2, '0208', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1410, '2010-12-31', 'P0209', 2, 0, 0, 0, 13, 5.6, '0209', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1411, '2010-12-31', 'P0210', 2, 0, 0, 0, 13, 7.8, '0210', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1412, '2010-12-31', 'P0211', 2, 0, 0, 0, 13, 5.2, '0211', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1413, '2010-12-31', 'P0212', 2, 0, 0, 0, 13, 7.3, '0212', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1414, '2010-12-31', 'P0213', 2, 0, 0, 0, 13, 5.8, '0213', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1415, '2010-12-31', 'P0214', 2, 0, 0, 0, 13, 7.2, '0214', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1416, '2010-12-31', 'P0215', 2, 0, 0, 0, 13, 5.7, '0215', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1417, '2010-12-31', 'P0216', 2, 0, 0, 0, 13, 7, '0216', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1418, '2010-12-31', 'P0217', 2, 0, 0, 0, 13, 5.8, '0217', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1419, '2010-12-31', 'Q0001', 2, 0, 0, 0, 14, 19, '0001', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1420, '2010-12-31', 'Q0002', 2, 0, 0, 0, 14, 20.4, '0002', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1421, '2010-12-31', 'Q0003', 2, 0, 0, 0, 14, 20.3, '0003', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1422, '2010-12-31', 'Q0004', 2, 0, 0, 0, 14, 18.4, '0004', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1423, '2010-12-31', 'Q0005', 2, 0, 0, 0, 14, 18.2, '0005', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1424, '2010-12-31', 'Q0006', 2, 0, 0, 0, 14, 18.4, '0006', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1425, '2010-12-31', 'Q0007', 2, 0, 0, 0, 14, 18.4, '0007', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1426, '2010-12-31', 'Q0008', 2, 0, 0, 0, 14, 18.2, '0008', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1427, '2010-12-31', 'Q0009', 2, 0, 0, 0, 14, 18.1, '0009', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1428, '2014-09-29', 'Q0010', 2, 0, 0, 0, 14, 18, '0010', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1429, '2014-09-29', 'Q0011', 2, 0, 0, 0, 14, 18.5, '0011', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1430, '2014-09-29', 'Q0012', 2, 0, 0, 0, 14, 18.2, '0012', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1431, '2014-09-29', 'Q0013', 2, 0, 0, 0, 14, 18.4, '0013', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1432, '2010-12-31', 'S0342', 1, 0, 0, 0, 16, 37.3, '0342', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1433, '2010-12-31', 'S0472', 1, 0, 0, 0, 16, 39.2, '0472', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1434, '2010-12-31', 'S0506', 1, 0, 0, 0, 16, 40.3, '0506', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1435, '2010-12-31', 'S0507', 1, 0, 0, 0, 16, 44.2, '0507', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1436, '2010-12-31', 'S0529', 1, 0, 0, 0, 16, 43.6, '0529', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1437, '2010-12-31', 'S0530', 1, 0, 0, 0, 16, 43.8, '0530', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1438, '2010-12-31', 'S0531', 1, 0, 0, 0, 16, 43.2, '0531', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1439, '2010-12-31', 'S0532', 1, 0, 0, 0, 16, 42.8, '0532', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1440, '2010-12-31', 'S0547', 1, 0, 0, 0, 16, 43.9, '0547', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1441, '2010-12-31', 'S0548', 1, 0, 0, 0, 16, 40.9, '0548', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1442, '2010-12-31', 'S0550', 1, 0, 0, 0, 16, 40.5, '0550', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1443, '2010-12-31', 'S0551', 1, 0, 0, 0, 16, 43.8, '0551', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1444, '2010-12-31', 'S0552', 1, 0, 0, 0, 16, 42.8, '0552', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1445, '2010-12-31', 'S0572', 1, 0, 0, 0, 16, 38.6, '0572', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1446, '2010-12-31', 'S0580', 1, 0, 0, 0, 16, 40, '0580', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1447, '2010-12-31', 'S0581', 1, 0, 0, 0, 16, 44.2, '0581', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1448, '2010-12-31', 'S0588', 1, 0, 0, 0, 16, 40.6, '0588', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1449, '2010-12-31', 'S0589', 1, 0, 0, 0, 16, 41.2, '0589', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1450, '2010-12-31', 'S0591', 1, 0, 0, 0, 16, 45.3, '0591', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1451, '2010-12-31', 'S0660', 1, 0, 0, 0, 16, 39, '0660', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1452, '2010-12-31', 'S0664', 1, 0, 0, 0, 16, 37.7, '0664', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1453, '2010-12-31', 'S0678', 1, 0, 0, 0, 16, 41.8, '0678', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1454, '2010-12-31', 'S0689', 1, 0, 0, 0, 16, 43.7, '0689', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1455, '2010-12-31', 'S0692', 1, 0, 0, 0, 16, 45, '0692', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1456, '2010-12-31', 'S0693', 1, 0, 0, 0, 16, 42.7, '0693', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1457, '2010-12-31', 'S0694', 1, 0, 0, 0, 16, 42.8, '0694', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1458, '2010-12-31', 'S0695', 1, 0, 0, 0, 16, 43.6, '0695', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1459, '2010-12-31', 'S0696', 1, 0, 0, 0, 16, 42.4, '0696', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1460, '2010-12-31', 'S0697', 1, 0, 0, 0, 16, 39.1, '0697', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1461, '2010-12-31', 'S0698', 1, 0, 0, 0, 16, 40.2, '0698', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1462, '2010-12-31', 'S0699', 1, 0, 0, 0, 16, 43.4, '0699', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1463, '2010-12-31', 'S0701', 1, 0, 0, 0, 16, 42.3, '0701', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1464, '2010-12-31', 'S0702', 1, 0, 0, 0, 16, 40.2, '0702', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(1465, '2010-12-31', 'S0704', 1, 0, 0, 0, 16, 41.1, '0704', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1466, '2010-12-31', 'S0705', 1, 0, 0, 0, 16, 42.5, '0705', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1467, '2010-12-31', 'S0706', 1, 0, 0, 0, 16, 40.3, '0706', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1468, '2010-12-31', 'S0707', 1, 0, 0, 0, 16, 42.6, '0707', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1469, '2010-12-31', 'S0708', 1, 0, 0, 0, 16, 39.9, '0708', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1470, '2010-12-31', 'S0715', 1, 0, 0, 0, 16, 36.6, '0715', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1471, '2010-12-31', 'S0717', 1, 0, 0, 0, 16, 40, '0717', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1472, '2010-12-31', 'S0718', 1, 0, 0, 0, 16, 44.1, '0718', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1473, '2010-12-31', 'S0721', 1, 0, 0, 0, 16, 44.2, '0721', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1474, '2010-12-31', 'S0739', 1, 0, 0, 0, 16, 41.2, '0739', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1475, '2010-12-31', 'S0740', 1, 0, 0, 0, 16, 41.7, '0740', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1476, '2010-12-31', 'S0741', 1, 0, 0, 0, 16, 41, '0741', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1477, '2010-12-31', 'S0742', 1, 0, 0, 0, 16, 45.3, '0742', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1478, '2010-12-31', 'S0743', 1, 0, 0, 0, 16, 39.8, '0743', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1479, '2010-12-31', 'S0744', 1, 0, 0, 0, 16, 38.8, '0744', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1480, '2010-12-31', 'S0745', 1, 0, 0, 0, 16, 46.5, '0745', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1481, '2010-12-31', 'S0768', 1, 0, 0, 0, 16, 38.4, '0768', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1482, '2010-12-31', 'S0778', 1, 0, 0, 0, 16, 40.2, '0778', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1483, '2010-12-31', 'S0790', 1, 0, 0, 0, 16, 39.2, '0790', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1484, '2010-12-31', 'S0795', 1, 0, 0, 0, 16, 42.6, '0795', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1485, '2010-12-31', 'S0802', 1, 0, 0, 0, 16, 39.8, '0802', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1486, '2010-12-31', 'S0804', 1, 0, 0, 0, 16, 43.6, '0804', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1487, '2010-12-31', 'S0864', 1, 0, 0, 0, 16, 47, '0864', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1488, '2010-12-31', 'S0873', 1, 0, 0, 0, 16, 46.7, '0873', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1489, '2010-12-31', 'S0874', 1, 0, 0, 0, 16, 37.4, '0874', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1490, '2010-12-31', 'S0875', 1, 0, 0, 0, 16, 47.3, '0875', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1491, '2010-12-31', 'S0876', 1, 0, 0, 0, 16, 41.3, '0876', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1492, '2010-12-31', 'S0877', 1, 0, 0, 0, 16, 44.1, '0877', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1493, '2010-12-31', 'S0878', 1, 0, 0, 0, 16, 41.3, '0878', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1494, '2010-12-31', 'S0879', 1, 0, 0, 0, 16, 43.2, '0879', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1495, '2010-12-31', 'S0880', 1, 0, 0, 0, 16, 44.1, '0880', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1496, '2010-12-31', 'S0881', 1, 0, 0, 0, 16, 38.2, '0881', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1497, '2010-12-31', 'S0882', 1, 0, 0, 0, 16, 38, '0882', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1498, '2010-12-31', 'S0885', 1, 0, 0, 0, 16, 44.7, '0885', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1499, '2010-12-31', 'S0886', 1, 0, 0, 0, 16, 42.2, '0886', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1500, '2010-12-31', 'S0887', 1, 0, 0, 0, 16, 47.4, '0887', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1501, '2010-12-31', 'S0888', 1, 0, 0, 0, 16, 39.3, '0888', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1502, '2010-12-31', 'S0890', 1, 0, 0, 0, 16, 45.6, '0890', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1503, '2010-12-31', 'S0891', 1, 0, 0, 0, 16, 46.4, '0891', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1504, '2010-12-31', 'S0893', 1, 0, 0, 0, 16, 46.7, '0893', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1505, '2010-12-31', 'S0894', 1, 0, 0, 0, 16, 47, '0894', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1506, '2010-12-31', 'S0895', 1, 0, 0, 0, 16, 40.7, '0895', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1507, '2010-12-31', 'S0901', 1, 0, 0, 0, 16, 39.2, '0901', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1508, '2010-12-31', 'S0947', 1, 0, 0, 0, 16, 40, '0947', 2, '0000-00-00 00:00:00', 0, NULL, NULL);
INSERT INTO `m_bobbin` (`id`, `tanggal`, `nomor_bobbin`, `m_jenis_packing_id`, `owner_id`, `borrowed_by`, `borrowed_by_supplier`, `m_bobbin_size_id`, `berat`, `nomor_urut`, `status`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1509, '2010-12-31', 'S0948', 1, 0, 0, 0, 16, 44.9, '0948', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1510, '2010-12-31', 'S1074', 1, 0, 0, 0, 16, 45.7, '1074', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1511, '2010-12-31', 'S1217', 1, 0, 0, 0, 16, 42.3, '1217', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1512, '1900-01-09', 'S1439', 1, 0, 0, 0, 16, 42, '1439', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1513, '2010-12-31', 'S1440', 1, 0, 0, 0, 16, 41.4, '1440', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1514, '2010-12-31', 'S1442', 1, 0, 0, 0, 16, 41.7, '1442', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1515, '2010-12-31', 'S1443', 1, 0, 0, 0, 16, 41.5, '1443', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1516, '2010-12-31', 'T0516', 1, 0, 0, 0, 17, 37.7, '0516', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1517, '2010-12-31', 'T1214', 1, 0, 0, 0, 17, 32.3, '1214', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1518, '2010-12-31', 'T1215', 1, 0, 0, 0, 17, 31.4, '1215', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1519, '2010-12-31', 'T1216', 1, 0, 0, 0, 17, 34.1, '1216', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1520, '2010-12-31', 'T1218', 1, 0, 0, 0, 17, 26, '1218', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1521, '2010-12-31', 'T1222', 1, 0, 0, 0, 17, 31.8, '1222', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1522, '2010-12-31', 'T1223', 1, 0, 0, 0, 17, 33.1, '1223', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1523, '2010-12-31', 'T1224', 1, 0, 0, 0, 17, 31.7, '1224', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1524, '2010-12-31', 'T1225', 1, 0, 0, 0, 17, 32.8, '1225', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1525, '2010-12-31', 'T1226', 1, 0, 0, 0, 17, 32.6, '1226', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1526, '2010-12-31', 'T1227', 1, 0, 0, 0, 17, 31.6, '1227', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1527, '2010-12-31', 'T1228', 1, 0, 0, 0, 17, 32.6, '1228', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1528, '2010-12-31', 'T1229', 1, 0, 0, 0, 17, 33, '1229', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1529, '2010-12-31', 'T1231', 1, 0, 0, 0, 17, 31.2, '1231', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1530, '2010-12-31', 'T1232', 1, 0, 0, 0, 17, 31.6, '1232', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1531, '2010-12-31', 'T1233', 1, 0, 0, 0, 17, 34.8, '1233', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1532, '2010-12-31', 'T1234', 1, 0, 0, 0, 17, 34.3, '1234', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1533, '2010-12-31', 'T1235', 1, 0, 0, 0, 17, 34.4, '1235', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1534, '2010-12-31', 'T1236', 1, 0, 0, 0, 17, 33, '1236', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1535, '2010-12-31', 'T1238', 1, 0, 0, 0, 17, 37.8, '1238', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1536, '2010-12-31', 'T1240', 1, 0, 0, 0, 17, 31.4, '1240', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1537, '2010-12-31', 'T1241', 1, 0, 0, 0, 17, 31.7, '1241', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1538, '2010-12-31', 'T1242', 1, 0, 0, 0, 17, 33.2, '1242', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1539, '2010-12-31', 'T1243', 1, 0, 0, 0, 17, 32, '1243', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1540, '2010-12-31', 'T1244', 1, 0, 0, 0, 17, 32.2, '1244', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1541, '2010-12-31', 'T1245', 1, 0, 0, 0, 17, 32.3, '1245', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1542, '2010-12-31', 'T1246', 1, 0, 0, 0, 17, 32.6, '1246', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1543, '2010-12-31', 'T1250', 1, 0, 0, 0, 17, 31.6, '1250', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1544, '2010-12-31', 'T1251', 1, 0, 0, 0, 17, 25.2, '1251', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1545, '2010-12-31', 'T1253', 1, 0, 0, 0, 17, 36.7, '1253', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1546, '2010-12-31', 'T1254', 1, 0, 0, 0, 17, 32.9, '1254', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1547, '2010-12-31', 'T1255', 1, 0, 0, 0, 17, 33.9, '1255', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1548, '2012-10-16', 'T1256', 1, 0, 0, 0, 17, 33, '1256', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1549, '2012-10-16', 'T1257', 1, 0, 0, 0, 17, 31.4, '1257', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1550, '2012-10-16', 'T1258', 1, 0, 0, 0, 17, 31.6, '1258', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1551, '2012-10-16', 'T1259', 1, 0, 0, 0, 17, 37.8, '1259', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1552, '2012-10-16', 'T1260', 1, 0, 0, 0, 17, 37.8, '1260', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1553, '2012-10-16', 'T1261', 1, 0, 0, 0, 17, 30.2, '1261', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1554, '2012-10-16', 'T1262', 1, 0, 0, 0, 17, 37.7, '1262', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1555, '2012-10-16', 'T1263', 1, 0, 0, 0, 17, 34.4, '1263', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1556, '2010-12-31', 'T1264', 1, 0, 0, 0, 17, 32.3, '1264', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1557, '2010-12-31', 'T1266', 1, 0, 0, 0, 17, 31.6, '1266', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1558, '2010-12-31', 'T1267', 1, 0, 0, 0, 17, 23.5, '1267', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1559, '2010-12-31', 'T1268', 1, 0, 0, 0, 17, 32.4, '1268', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1560, '2010-12-31', 'T1269', 1, 0, 0, 0, 17, 33.8, '1269', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1561, '2010-12-31', 'T1270', 1, 0, 0, 0, 17, 34.4, '1270', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1562, '2010-12-31', 'T1271', 1, 0, 0, 0, 17, 33, '1271', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1563, '2010-12-31', 'T1272', 1, 0, 0, 0, 17, 31.2, '1272', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1564, '2010-12-31', 'T1273', 1, 0, 0, 0, 17, 32.4, '1273', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1565, '2010-12-31', 'T1275', 1, 0, 0, 0, 17, 37.7, '1275', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1566, '2010-12-31', 'T1276', 1, 0, 0, 0, 17, 31.2, '1276', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1567, '2010-12-31', 'T1277', 1, 0, 0, 0, 17, 25.8, '1277', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1568, '2011-12-31', 'T1279', 1, 0, 0, 0, 17, 25.8, '1279', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1569, '2011-12-31', 'T1280', 1, 0, 0, 0, 17, 31.2, '1280', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1570, '2010-12-31', 'T1281', 1, 0, 0, 0, 17, 31.7, '1281', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1571, '2010-12-31', 'T1282', 1, 0, 0, 0, 17, 32.3, '1282', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1572, '2010-12-31', 'T1283', 1, 0, 0, 0, 17, 34.5, '1283', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1573, '2010-12-31', 'T1284', 1, 0, 0, 0, 17, 33.7, '1284', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1574, '2010-12-31', 'T1285', 1, 0, 0, 0, 17, 25.8, '1285', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1575, '2010-12-31', 'T1286', 1, 0, 0, 0, 17, 33.2, '1286', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1576, '2010-12-31', 'T1287', 1, 0, 0, 0, 17, 37.7, '1287', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1577, '2010-12-31', 'T1288', 1, 0, 0, 0, 17, 37.2, '1288', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1578, '2010-12-31', 'T1289', 1, 0, 0, 0, 17, 25.2, '1289', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1579, '2010-12-31', 'T1290', 1, 0, 0, 0, 17, 31.4, '1290', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1580, '2010-12-31', 'T1291', 1, 0, 0, 0, 17, 31.6, '1291', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1581, '2010-12-31', 'T1292', 1, 0, 0, 0, 17, 26, '1292', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1582, '2010-12-31', 'T1293', 1, 0, 0, 0, 17, 32.3, '1293', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1583, '2010-12-31', 'T1294', 1, 0, 0, 0, 17, 37.4, '1294', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1584, '2010-12-31', 'T1295', 1, 0, 0, 0, 17, 33.8, '1295', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1585, '2010-12-31', 'T1296', 1, 0, 0, 0, 17, 34.6, '1296', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1586, '2010-12-31', 'T1297', 1, 0, 0, 0, 17, 37.8, '1297', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1587, '2010-12-31', 'T1298', 1, 0, 0, 0, 17, 37.8, '1298', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1588, '2013-01-09', 'T1300', 1, 0, 0, 0, 17, 32.4, '1300', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1589, '2013-01-10', 'T1301', 1, 0, 0, 0, 17, 29.4, '1301', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1590, '2013-01-10', 'T1302', 1, 0, 0, 0, 17, 34.5, '1302', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1591, '2013-01-10', 'T1303', 1, 0, 0, 0, 17, 38, '1303', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1592, '2013-01-10', 'T1304', 1, 0, 0, 0, 17, 37.8, '1304', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1593, '2013-01-10', 'T1305', 1, 0, 0, 0, 17, 37.7, '1305', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1594, '2013-01-10', 'T1306', 1, 0, 0, 0, 17, 37.4, '1306', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1595, '2013-01-10', 'T1307', 1, 0, 0, 0, 17, 36.6, '1307', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1596, '2013-01-10', 'T1308', 1, 0, 0, 0, 17, 33.4, '1308', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1597, '2013-01-10', 'T1309', 1, 0, 0, 0, 17, 33.9, '1309', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1598, '2010-12-31', 'T1310', 1, 0, 0, 0, 17, 37.8, '1310', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1599, '2010-12-31', 'T1311', 1, 0, 0, 0, 17, 36.2, '1311', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1600, '2010-12-31', 'T1313', 1, 0, 0, 0, 17, 34.4, '1313', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1601, '2010-12-31', 'T1314', 1, 0, 0, 0, 17, 34.2, '1314', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1602, '2010-12-31', 'T1315', 1, 0, 0, 0, 17, 31.7, '1315', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1603, '2010-12-31', 'T1316', 1, 0, 0, 0, 17, 30.3, '1316', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1604, '2010-12-31', 'T1317', 1, 0, 0, 0, 17, 31.9, '1317', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1605, '2010-12-31', 'T1318', 1, 0, 0, 0, 17, 36, '1318', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1606, '2010-12-31', 'T1319', 1, 0, 0, 0, 17, 37.9, '1319', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1607, '2010-12-31', 'T1320', 1, 0, 0, 0, 17, 37.8, '1320', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1608, '2010-12-31', 'T1321', 1, 0, 0, 0, 17, 31.6, '1321', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1609, '2010-12-31', 'T1322', 1, 0, 0, 0, 17, 33.4, '1322', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1610, '2010-12-31', 'T1424', 1, 0, 0, 0, 17, 34.3, '1424', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1611, '2010-12-31', 'T1425', 1, 0, 0, 0, 17, 31.6, '1425', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1612, '2010-12-31', 'T1426', 1, 0, 0, 0, 17, 32.3, '1426', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1613, '2010-12-31', 'T1427', 1, 0, 0, 0, 17, 33, '1427', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1614, '2010-12-31', 'T1428', 1, 0, 0, 0, 17, 32.5, '1428', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1615, '2010-12-31', 'T1429', 1, 0, 0, 0, 17, 31.9, '1429', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1616, '2010-12-31', 'T1430', 1, 0, 0, 0, 17, 34.3, '1430', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1617, '2010-12-31', 'T1432', 1, 0, 0, 0, 17, 34.5, '1432', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1618, '2010-12-31', 'T1433', 1, 0, 0, 0, 17, 33, '1433', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1619, '2010-12-31', 'T1434', 1, 0, 0, 0, 17, 34.4, '1434', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1620, '2010-12-31', 'T1435', 1, 0, 0, 0, 17, 33.6, '1435', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1621, '2010-12-31', 'T1436', 1, 0, 0, 0, 17, 34.5, '1436', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1622, '2010-12-31', 'T1437', 1, 0, 0, 0, 17, 34.9, '1437', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1623, '2010-12-31', 'T1438', 1, 0, 0, 0, 17, 34.8, '1438', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1624, '2010-12-31', 'T1444', 1, 0, 0, 0, 17, 31.2, '1444', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1625, '2010-12-31', 'T1447', 1, 0, 0, 0, 17, 26, '1447', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1626, '2010-12-31', 'T1449', 1, 0, 0, 0, 17, 30.6, '1449', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1627, '2010-12-31', 'T1450', 1, 0, 0, 0, 17, 31.9, '1450', 3, '0000-00-00 00:00:00', 0, NULL, NULL),
(1628, '2010-12-31', 'T1451', 1, 0, 0, 0, 17, 32, '1451', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1629, '2010-12-31', 'T1452', 1, 0, 0, 0, 17, 29.7, '1452', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1630, '2010-12-31', 'T1453', 1, 0, 0, 0, 17, 37.7, '1453', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1631, '2010-12-31', 'T1455', 1, 0, 0, 0, 17, 32, '1455', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1632, '2010-12-31', 'T1458', 1, 0, 0, 0, 17, 38.2, '1458', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1633, '2010-12-31', 'T1459', 1, 0, 0, 0, 17, 31.6, '1459', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1634, '2010-12-31', 'T1460', 1, 0, 0, 0, 17, 31.1, '1460', 2, '0000-00-00 00:00:00', 0, NULL, NULL),
(1635, '2010-12-31', 'T1461', 1, 0, 0, 0, 17, 33.2, '1461', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1636, '2010-12-31', 'T1463', 1, 0, 0, 0, 17, 25.5, '1463', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1637, '2010-12-31', 'T1464', 1, 0, 0, 0, 17, 25.6, '1464', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1638, '2010-12-31', 'T1465', 1, 0, 0, 0, 17, 31.6, '1465', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1639, '2010-12-31', 'T1466', 1, 0, 0, 0, 17, 25.8, '1466', 0, '0000-00-00 00:00:00', 0, NULL, NULL),
(1640, '2019-03-11', 'A0001', 3, 0, 7, 0, 1, 0, '0001', 2, '2019-03-11 18:56:26', 1, NULL, NULL),
(1641, '2019-03-11', 'B0001', 3, 0, 0, 0, 2, 0, '0001', 3, '2019-03-11 18:56:34', 1, NULL, NULL),
(1642, '2019-03-11', 'C0001', 3, 0, 0, 0, 3, 0, '0001', 3, '2019-03-11 18:56:41', 1, NULL, NULL);

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
(1, 'BB-BR.201903.0001', 1, 11, 0, 0, 0, 1, '2019-03-15 10:03:36'),
(2, 'BB-BR.201903.0002', 1, 8, 0, 0, 0, 1, '2019-03-19 07:03:27'),
(3, 'BB-BR.201903.0003', 2, 8, 0, 0, 0, 1, '2019-03-19 08:03:55'),
(4, 'BB-BR.201903.0004', 3, 7, 0, 0, 0, 1, '2019-03-20 06:03:15');

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
(1, 1, 0, 'A0001'),
(2, 2, 0, 'B0001'),
(3, 2, 0, 'B0001'),
(4, 2, 0, 'L0006'),
(5, 2, 0, 'L0026'),
(6, 3, 0, 'C0001'),
(7, 3, 0, 'C0001'),
(8, 3, 0, 'C0001'),
(9, 3, 0, 'L0034'),
(10, 3, 0, 'L0040'),
(11, 4, 0, 'A0001'),
(12, 4, 0, 'A0001'),
(13, 4, 0, 'A0001'),
(14, 4, 0, 'A0001'),
(15, 4, 0, 'M0007');

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

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_penerimaan_detail`
--

CREATE TABLE `m_bobbin_penerimaan_detail` (
  `id` int(11) NOT NULL,
  `id_bobbin_penerimaan` int(11) NOT NULL,
  `nomor_bobbin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_size`
--

CREATE TABLE `m_bobbin_size` (
  `id` int(11) NOT NULL,
  `bobbin_size` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `penomoran` int(5) NOT NULL DEFAULT '0',
  `jenis_packing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bobbin_size`
--

INSERT INTO `m_bobbin_size` (`id`, `bobbin_size`, `keterangan`, `penomoran`, `jenis_packing_id`) VALUES
(1, 'A', 'Tipe Kardus A', 1, 3),
(2, 'B', 'Tipe Kardus B', 1, 3),
(3, 'C', 'Tipe Kardus C', 1, 3),
(4, 'D', 'Bobin Besi 12 inch', 0, 1),
(5, 'E', 'Bobin Besi 12 inch AL', 0, 1),
(6, 'F', 'Bobin Besi 16 inch AL', 0, 1),
(7, 'G', 'Bobin Besi 20 inch AL', 0, 1),
(8, 'H', 'Haspel Kayu', 0, 0),
(9, 'J', 'Keranjang', 1, 2),
(10, 'K', 'Bobin Besi 24 Inch AL', 100, 1),
(11, 'L', 'Bobin Besi 24 Inch', 1462, 1),
(12, 'M', 'Bobin Besi 22 Inch', 1441, 1),
(13, 'P', 'Keranjang', 217, 2),
(14, 'Q', 'Keranjang Besar', 13, 2),
(15, 'R', 'ROLL', 1, 4),
(16, 'S', 'Bobin Besi 20 Inch', 1439, 1),
(17, 'T', 'Bobin Besi 16 Inch', 1466, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `m_bobbin_spb_detail`
--

CREATE TABLE `m_bobbin_spb_detail` (
  `id` int(11) NOT NULL,
  `id_spb_bobbin` int(11) NOT NULL,
  `id_bobbin` int(11) NOT NULL
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
  `kode_customer` varchar(10) NOT NULL,
  `nama_customer` varchar(150) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `npwp` varchar(25) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `jenis_customer` varchar(8) NOT NULL,
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

INSERT INTO `m_customers` (`id`, `kode_customer`, `nama_customer`, `pic`, `npwp`, `telepon`, `hp`, `fax`, `alamat`, `e_mail`, `jenis_customer`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'A001', 'ANEKA KABEL ELEKTRIK, P. T.', 'SAMSUDIN', '01.699.183.8.401.000', '', '', '', 'Jl. Raya Serang KM 60 Leuwilimus RT/RW : 07/03 Cikande Serang .\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'A002', 'ARIES KABEL INDONESIA, P. T.', 'GONDO', '01.495.201.4.402.000', '(021) 5324318', '', '(021) 5324317', 'Wisma Sejahtera Jl. Letjen S. Parman Kav. 75 Jakarta\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'A003', 'ATLANTIK KARYA MANUNGGAL, P.T.', 'YUSMIN', '__.___.___._.___.___', '(021) 5640885', '', '(021)5640884', 'Jl. Kepa Duri Mas Blok XX No. 28 Jakarta Barat\r\n\r\narat\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'A004', 'ANAM, P. T.', 'ANAM', '__.___.___._.___.___', '(021) 5552888', '', '', 'Jl. Prepedan RT/RW : 06/07 No. 26 Kamal Kali Deres Jakarta barat.\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'A005', 'AYUNG', '', '__.___.___._.___.___', '', '', '', 'Jl. Prepedan 3 No. 38 Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'A006', 'ANUGRAH JAYA LESTARI, C. V.', '', '__.___.___._.___.___', '(021) 55929202', '', '(021) 55929202', 'Pergudangan Dadap Indah Blok BH No.45 Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'A007', 'ALPHA RADIANT, P. T.', '', '__.___.___._.___.___', '', '', '', 'Pondok Gede Jakarta Timur\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'A008', 'ALCARINDO PRIMA, P. T.', 'YOGI', '01.060.252.2.055.000', '', '', '', 'Jl. Tapir, Cakung KM 3,3 Sukapura Cilincing Jakarta Utara\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'A009', 'ANGKA WIJAYA SAKTI', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'A010', 'ATIKA', '', '__.___.___._.___.___', '', '', '', '', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'A011', 'ABD. ROHMAN', '', '__.___.___._.___.___', '', '', '', '', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'A012', 'ALUM CENTRAL MANDIRI LESTARI, P. T.', '', '__.___.___._.___.___', '', '', '', 'Desa Kaluwung No.8 Kelurahan Cisereh Kecamatan Tigar\r\naksa Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'A013', 'APOLLO', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'A014', 'ALPHA TRANS CABLE, P. T.', 'BP. DEWA', '__.___.___._.___.___', '021-47866434', '', '', 'JL. DJATI RAYA 3 A RAWAMANGUN, JAKARTA TIMUR. 13220.\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'A015', 'ANTAR NUSA SAKTI JAYA, P.T.', '', '__.___.___._.___.___', '', '', '', 'JL. RAYA SALEMBARAN NO. 1 RT 37 RW 18\r\nKP. GARDU, KOSAMBI TANGERANG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'A016', 'ANGGUN, TN', '', '__.___.___._.___.___', '', '', '', 'TANGERANG\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'A017', 'AGUS SALIM', '', '__.___.___._.___.___', '', '', '', 'TANGERANG\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'A018', 'AUTORINDO SUKSES MANDIRI, P.T.', '', '__.___.___._.___.___', '', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 'A019', 'ALI RINDHO', '', '__.___.___._.___.___', '', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'A020', 'AULIA AZIZA', '', '__.___.___._.___.___', '', '', '', '', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'A021', 'ARSHIYA METAL JAYA', '', '82.880.402.1.031.000', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'B001', 'BAJA MAS, P.T.', '', '__.___.___._.___.___', '(021) 5550861', '', '', '\r\nTegal Alur No. 83 Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'B002', 'BICC BERCA CABLES, P. T.', '', '01.071.350.1.055.000', '', '', '', 'Jl. Raya Serang KM. 28 Cangkudu Balaraja Tangerang Bnaten', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'B003', 'BERKAH KEDIRI, U. D.', '', '__.___.___._.___.___', '', '', '', 'Jl. Cokro Aminoto 79 Kediri\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 'B004', 'BAGUS ACCES MULTI SARANA, P. T.', '', '__.___.___._.___.___', '', '', '', 'Jl. 8 Kecamatan Cicurug Sukabumi Jawa Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'B005', 'BERKAH LOGAM MAKMUR, PT.', '', '02.288.248.4.415.000', '', '', '', 'Jl. Industri Raya III Blok AF No. 1-2, Bunder, Cikupa. Kabupaten Tangerang, Banten\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'B006', 'BILLY SETIAWAN', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'B007', 'BAGUS RAHARDJO', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'C001', 'CAHAYA ANGKASA ABADI, P. T.', 'HADI', '01.439.813.5.641.000', '(031)8432004,8432010', '', '(021) 8432042', 'JL. BERBEK INDUSTRI NO.06, BERBEK, WARU SIDOARJO, JAWA TIMUR\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 'C002', 'CITRA HANDAL PERKASA, P. T.', 'APIO', '01.775.572.9.411.000', '(021) 5960183', '', '(021) 5960184', 'Kp.Cikupa RT/RW ; 01/01 Suka Mulya Cikupa Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'C003', 'CIKUPA MEGAH KENCANA, P. T.', '', '01.120.449.2.411.000', '', '', '', 'Jl. Raya Tangerang Serang KM 11 Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 'C004', 'CHEN. MR', 'MR. CHEN', '__.___.___._.___.___', '', '', '', 'TANGERANG\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 'C005', 'CHEN HSI FA INTERNATIONAL CO, LTD.', '', '__.___.___._.___.___', '', '', '', 'No. 2 LANE 192 GAO FUNG RD., HSIN CHU CITY, TAIWAN, R. O. C.\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'C006', 'CHANG MING ENVIROR MENT PROTECTION CO, LTD.', '', '__.___.___._.___.___', '', '', '', '1F No.8, Lane156, Shou Tsuo 1 ST, FU Hsing Hsiang, Chang HuaHsien, Taiwan R> O.', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'C007', 'CENTRAL MULTI PRIMA, P. T.', 'BP. HADI', '__.___.___._.___.___', '021-5252528', '', '021-52920710', 'Jl. Anggrek 1 No. 34 RT 010/01 Karet Kuningan Jakarta Selatan.\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'C008', 'CUCI', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'C009', 'COI SANJAYA', '', '__.___.___._.___.___', '', '', '', '\r\nJAKARTA.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'C010', 'CHEN HSI JAYA PERKASA, P. T.', '', '__.___.___._.___.___', '021.5903614-18', '', '', 'JL. BARU PASAR KEMIS, KAWASAN INDUSTRI KERONCONG, NO. 8 JATIUWUNG - TANGERANG.', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'C011', 'CORNELIS', '', '__.___.___._.___.___', '', '', '', 'BOGOR\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 'C012', 'CENTRAL WIRE INDUSTRIAL, P.T.', '', '__.___.___._.___.___', '', '', '', 'Jl. Rungkut Industri Raya 17-A Surabaya\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 'C013', 'CRIS', '', '__.___.___._.___.___', '', '', '', 'Semarang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 'C014', 'COSCO ELECTRIC, PT.', '', '__.___.___._.___.___', '024-8444447', '', '', 'Jl. Kijang Selatan No. 8 Semarang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 'C015', 'CAHAYA  KEMENANGAN, PT.', '', '__.___.___._.___.___', '', '', '', 'Jl. Pergudangan Kosambi Permai D4 Dadap Kosambi Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 'D001', 'DUNIA BARU, P. T.', '', '__.___.___._.___.___', '', '', '', 'Jl. Raya Prancis Perum Dadap Indah B 9/9 Kosambi Tangerang.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 'D002', 'DALTO ELECTRINDO, P. T.', '', '__.___.___._.___.___', '', '', '', 'Kawasan Industri Jababeka, Phase II, Jl. Industri Selatan Blok PP-2E\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 'E001', 'ERA MITRA, P. T.', 'IBU ANA', '__.___.___._.___.___', '(021) 5551945', '', '', 'Jl. Prepedan Dalam No. 3 Jakarta Barat.\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 'E002', 'ELEQ CABLE INDONESIA, PT.', '', '72.135.787.9.402.000', '', '', '', 'Kawasan Industri Manis Jl. Manis V No. 11 Kel. Manisjaya Jati Uwung Tangerang Banten\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 'F001', 'FURIN JAYA, P. T.', 'WIWI', '__.___.___._.___.___', '(021) 6616736,37', '', '', 'Jl. Bidara No. 30 A Jelambar Dalam II Jakarta\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 'F003', 'FU YUAN METAL CO, LTD', '', '__.___.___._.___.___', '', '', '', '15 Lane 37 DA Wei Road Dali City Taichung Taiwan\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 'F004', 'FIRST BASE CO., LTD', '', '__.___.___._.___.___', '', '', '', '\r\nIF, NO.14, ALLEY 5, LANE 182, SEC 5 NANJHU RD, LUJHU OWNSHIP.\r', '', 'E', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 'F005', 'FAJAR ZIPPINDO, P. T.', '', '01.606.013.9.402.000', '(021) 5407234', '', '(021) 6192314', '\r\nJl. Daan Mogot KM. 19 Kp. Rawa Bamban No. 22 RT.006 RW. 003 Jurumudi Baru.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 'F006', 'FEDERAL MARDHIKA CITRAMANDIRI, P.T.', '', '01.371.197.3.403.001', '', '', '', 'JL. Tajung Udik Gunung Putri Bogor\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, 'F007', 'FHOSAN NANHAI HENGYE TRADING CO.', 'MS. YE/ MS.HO.', '__.___.___._.___.___', '86-0757.86-260316', '', '86-0757.86-319863', 'STORE 23, BL HEJI GARDEN, HAILIU RD, GUICHANG, NANHAI DISTRICT,  FHOSAN CITY, GUANGDONG PROVINCE, CHINA.\r', 'fshengye@163.com', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, 'G001', 'GALAXY PERSADA, P. T.', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 'G002', 'GANAMAS PRIMA, P. T.', '', '01.223.453.0.407.000', '', '', '', 'Kp. Ciketing Udik Pangkalan V Bantar Gebang Bekasi\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 'G999', 'GUDANG RONGSOK', 'DIANA', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, 'H001', 'HENCOTAMA DINAMIKA, P. T.', '', '01.891.824.3.041.000', '(021) 6402066', '', '', 'Jl. Pademangan IV RT 14/01 Jakarta Utara\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, 'H003', 'HIDUP LANCAR SEJAHTERA, P. T.', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, 'H004', 'HSIANG YUEH METALS CO,. LTD', '', '__.___.___._.___.___', '', '', '', '1 F , No. 14, Alley 5, Lane 182, SEC 5 Nanjhu RD,Lujhu Township\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 'H005', 'HENDRA', '', '__.___.___._.___.___', '', '', '', 'JAKARTA\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 'H006', 'HALIM', 'BP. HALIM', '__.___.___._.___.___', '', '', '', 'SURABAYA\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 'H007', 'HANWA THAILAND CO, LTD.', 'MR. ASAI/MR. YAMADA/ MR. OE', '__.___.___._.___.___', '662-6351230', '', '', '12 TH FLOOR UNIT 1204 Q. HOUSE LUMPIN, BLD. ISOUTH SATHORN ROAD. TUNGMA HAMEK. SATHORN BANGKOK 10120. THAILAND.\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 'H008', 'HABINDO SATRIA PERKASA, P.T.', '', '__.___.___._.___.___', '', '', '', '', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 'H010', 'H. ABD. IBROHIM', 'BP. IBROHIM', '__.___.___._.___.___', '', '', '', 'TANGERANG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 'H011', 'HERI', 'HERI', '__.___.___._.___.___', '', '', '', 'TANGERANG\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 'H012', 'HAKIMAN', 'HAKIMAN', '__.___.___._.___.___', '', '', '', 'KLOUSTER RIVIERA NO. 15 PALEM SEMI TANGERANG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 'H013', 'HANWA ROYAL METALS, PT.', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, 'H014', 'HUTAMA CIPTA SENTOSA, PT.', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 'H015', 'HARYANTO', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 'H016', 'HUTAMA SINERGI, PT.', '', '__.___.___._.___.___', '', '', '', 'Jakarta\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 'I001', 'INTIMETALINDO SUKSES, P. T.', '', '01.495.361.6.451.000', '', '', '', 'Jl. Kp. Bulakan RT/RW : 010/002 Bitung Jaya-Cikupa Tangerang.\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 'I002', 'INDOKA JAYA, P. T.', '', '__.___.___._.___.___', '', '', '', 'Kawasan Industri Manis II No. 25 Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 'I003', 'INTIMITRA MANDIRI, P. T.', '', '__.___.___._.___.___', '', '', '', 'Jakarta\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, 'I004', 'INDRA ERAMULTI  INDUSTRI', '', '__.___.___._.___.___', '(62-21)5407222', '', '(62-21)5417505', 'Komp. Daan Mogot Baru Jl. Utan Jati b No. 12a Jakarta Barat 11840 Indonesia\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, 'I005', 'INTI KARYA PRATAMA, P. T', '', '__.___.___._.___.___', '', '', '', 'PERDAGANGAN PANTAI INDAH DADAP BB NO. 35 TANGERANG.\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, 'I006', 'INTAN SAMUDRA RAYA, CV', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, 'I007', 'INCAP ALTIN UTAMA, P.T.', '', '__.___.___._.___.___', '', '', '', 'Jl. Rawa Bali II/9 Kawasan Industri Pulo Gadung Jakarta', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, 'I008', 'INTIKARYA PERMAI, PT.', '', '__.___.___._.___.___', '', '', '', 'Pergudangan Centra Kosambi Blok I 2/28 Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, 'I009', 'INDRA', '', '__.___.___._.___.___', '', '', '', 'JAKARTA\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, 'I010', 'ISHIKAWA METALS INDONESIA, CV.', '', '82.341.140.0.047.000', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, 'J001', 'JASHA LESTARI MANDIRI, P. T.', '', '01.495.022.4.431.000', '', '', '', 'Jl. Melati RT/RW ; 028/008 Wanaherang Gunung Putri Kab. Bogor Jawa Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, 'J002', 'JAWA INDAH, P. T.', '', '__.___.___._.___.___', '(021)7341658,7325694', '', '', 'Jl. Raya Satelit Utara \r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, 'J003', 'JAKARTA PLASTIK, P. T.', '', '__.___.___._.___.___', '', '', '', 'Jl. Mangobi Kapuk Muara Jakarta Barat\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, 'J004', 'JIUN JIH ENTERPRISE CO., LTD', '', '__.___.___._.___.___', '', '', '', 'No.30, Lane 465,SEC.2,Jhongshan RD, Pan-Chiao City Taipei County, Taiwan ROC\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, 'J005', 'JOY (BENGKEL  ENDAH)', 'JOY', '__.___.___._.___.___', '', '', '', 'PADALARANG BANDUNG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(86, 'J006', 'JOHANA SAERAN', '', '__.___.___._.___.___', '', '', '', 'JAKARTA\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(87, 'J007', 'JOHN RANTUNG', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(88, 'J008', 'JACKTOR', '', '__.___.___._.___.___', '', '', '', 'KEPADURI JAKARTA BARAT\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(89, 'K001', 'KEPOH MANDIRI ELEKTRIKATAMA, P. T.', '', '01.940.160.3.407.000', '', '', '', 'Per. Harapan Indah Blok OF No. 12 RT/RW :007/017 Pejuang Bekasi Barat 17131\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(90, 'K002', 'KARUNIA ELECTRINDO, P. T.', '', '__.___.___._.___.___', '(021) 66693611', '', '', 'Muara Karang Blok B Vi Utara Jakarta Utara\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(91, 'K003', 'KITCO INTERNATIONAL METALSS CO,. LTD', '', '__.___.___._.___.___', '', '', '', 'No.2 Lane 192, Gao Fung  RD., HSIN CHU City, Taiwan, ROC\r\n\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(92, 'K004', 'KARUNIA JAMBU DIPA', 'AAN', '__.___.___._.___.___', '', '', '', 'CIMAHI, BANDUNG.\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(93, 'K005', 'KERAMIK INDAH, PT.', '', '__.___.___._.___.___', '', '', '', 'TANGERANG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(94, 'K006', 'KARYA INDO TUNGGAL ABADI. PT.', '', '__.___.___._.___.___', '031-7458029', '', '', 'Jl. Manukan Wetan No. 60 Blok D 34 Tandes Surabaya\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(95, 'K007', 'KANO ROD AND WIRE, CV.', '', '82.926.618.8.016.000', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(96, 'L001', 'LEO', '', '__.___.___._.___.___', '', '', '', 'Jl. Raya Telajung Udik Gunung Putri Bogor.\r\n\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(97, 'L002', 'LOGAM NIAGA, C.V.', '', '__.___.___._.___.___', '', '', '', 'SERPONG. TANGERANG-BANTEN\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(98, 'L003', 'LING YING SEJAHTERA, CV.', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(99, 'M001', 'MAKITA MEGA MAKMUR PERKASA, P. T.', 'PRAWIRA', '01.738.786.1.414.001', '', '', '', 'Jl. Jababeka III C 18-AB Cikarang.\r\n\r\nHarco Mangga Dua Blok M 20 Sunter Jakarta', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(100, 'M002', 'MUSTIKA, P. T.', 'AMIANG', '__.___.___._.___.___', '(021) 6504907', '', '', 'Komplek Metro Blok M Sunter Jakarta\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(101, 'M003', 'MULIA JADI JAKARTA, P. T.', '', '02.095.274.3.402.000', '', '', '', 'Jl. Abadi No. 1 Daan Mogot KM 19,80 Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(102, 'M004', 'MITRATAMA SEJATI, P. T.', 'YANSEN', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(103, 'M005', 'MEGA KABEL, P. T.', '', '__.___.___._.___.___', '', '', '', '\r\nKomplek Pergudangan Miami Blok D No. 3 Kapuk Jakarta Barat.\r', '', 'L', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(104, 'M006', 'MANDIRI JAYA KABELINDO, P. T.', '', '01.892.040.5.041.000', '', '', '', 'Jl. Kapuk Muara RT/RW:007/001 Kapuk Muara Penjaringan Jakarta \r\n \r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(105, 'M007', 'MANDANI', '', '__.___.___._.___.___', '', '', '', 'Glodok Plaza Blok F/29 Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(106, 'M008', 'MAGMA ELEKTRIK, P. T.', '', '__.___.___._.___.___', '', '', '', 'Kapuk Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(107, 'M009', 'MING HSI INTERNATIONAL', '', '__.___.___._.___.___', '886-3-5248488', '', '886-3-5223796', 'NO. 2 LANE 192, GAO FUNG RD., HSIN CHU CITY, TAIWAN, ROC.\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(108, 'M010', 'MULTI MAKMUR INDAH INDUSTRI, P. T.', '', '01.300.010.4.415.000', '', '', '', 'Jl. Gatot Subroto KM 5,3 Jatiuwung Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(109, 'M011', 'MITRA KARYA', '', '__.___.___._.___.___', '', '', '', 'Pergudangan Pantai Indah DadapBlok BB/35\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(110, 'M012', 'MTU', '', '__.___.___._.___.___', '', '', '', 'TANGERANG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(111, 'M013', 'MULTI TRADING, P. T.', '', '__.___.___._.___.___', '021-55960284/85', '818811307', '021-55959432', 'JL. RUKO FANTASI BLOK W/20A CENGKARENG JAKARTA.\r', 'unilestari2004@yahoo', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(112, 'M014', 'MITRA JAYA ABADI, CV', '', '__.___.___._.___.___', '', '', '', 'Jl. Raya Penggilingan Komp.PIK Blok a 145-147 Pulo Gadung jak Tim\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(113, 'M015', 'MULTI KENCANA NIAGATAMA, P.T.', '', '__.___.___._.___.___', '', '', '', 'JL. KOPO MAJA NO. 97 CIKANDE SERANG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(114, 'M016', 'MASTERINDO LOGAM TEHNIK JAYA, PT.', '', '__.___.___._.___.___', '', '', '', 'JL. PASIR GEDE NO. 137 PADALARANG BANDUNG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(115, 'M017', 'MARDIYONO', '', '__.___.___._.___.___', '', '', '', 'TANGERANG\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(116, 'M018', 'MANDIRI PLAS , UD.', '', '__.___.___._.___.___', '', '', '', 'Perumahan Buana Gardenia Blok D I no. 12 Pinang Tangerang', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(117, 'M019', 'MULYONO', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(118, 'M020', 'MITSUI INDONESIA, PT.', '', '01.069.119.4.059.000', '', '', '', 'Menara BCA Lt. 52 Grand Indonesia Jl. MH. Thamrin No. 1 Menteng, Menteng Jakarta Pusat DKI Jakarta Raya\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(119, 'M021', 'MICHAEL KAIRUPAN', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(120, 'M022', 'MARK ROUWELL', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(121, 'M023', 'MARIO', '', '__.___.___._.___.___', '', '', '', 'JAKARTA\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(122, 'M024', 'MULTI ARTA SEKAWAN, PT.', '', '31.223.245.7.451.000', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(123, 'M025', 'MITRA TEMBAGA UNGGUL, CV.', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(124, 'M026', 'MAVICA MAJU BERSAMA, PT.', '', '__.___.___._.___.___', '', '', '', '\r\nJl. Kijang Selatan No. 8 RT 002 RW 005 Gayamsari, Gayamsari Kota Semarang Jawa Tengah\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(125, 'M027', 'MARDEDY HIDAYAT', '', '__.___.___._.___.___', '', '', '', 'JAKARTA TIMUR\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(126, 'N001', 'NIPSEA PAINT AND CHEMICALS, P. T.', 'CHRISTINE', '01.001.769.7.092.000', '', '', '', 'Jl. Ancol Barat I/A5/C No. 12 Jakarta 14430\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(127, 'N002', 'NAZARETH TEKNIK ,PT.', 'ISKANDAR MULTAWAN', '__.___.___._.___.___', '', '', '', 'Jl. Peta No. 206 Bandung\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(128, 'P001', 'PRABHA WIRADEWATA, P. T.', 'HADI', '01.490.699.4.643.000', '(031) 8963801', '', '(031) 8963803', 'Desa Wadungasih Buduran Sidoarjo Jawa Timur\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(129, 'P002', 'PRYSMIAN CABLES INDONESIA, P. T.', 'YUSI', '01.071.233.9.055.000', '(0264) 351222', '', '(0264) 351215', 'Kota Bukit Indah Kawasan Industry Indotaisei Blok G1 Cikampek 41373 Jawa Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(130, 'P003', 'PRIMA CABLE INDO, P. T.', '', '02.250.185.2.402.001', '(021) 5901453', '', '', 'Desa Gebang Raya Zona Industri Jatiuwung Gebang Raya Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(131, 'P004', 'PRISMACABLE MITRATAMA INDUSTRIES, P. T.', 'SANTI', '01.679.386.1.402.000', '', '', '', 'Jl. Arya Kemuning RT/RW : 003/003 Periuk Jaya Jatiuwung Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(132, 'P005', 'POPULAR CAN UTAMA, P. T.', '', '01.302.799.0.029.000', '', '', '', 'Komp. Duta Merlin Blok E/37 Jl. Gajah Mada No.3-5 Petojo Utara Gambir Jakarta.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(133, 'P006', 'PELANGI INDAH CANINDO TBK, P. T.', '', '01.367.344.7.054.000', '', '', '', 'Jl. Daan Mogot KM 14 No.700 Jakarta Barat\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(134, 'P007', 'PAWI', '', '__.___.___._.___.___', '', '', '', '\r\nJurumudi Kebon Besar, Tangerang - Banten.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(135, 'P008', 'PANCA MITRA, P. T.', 'ENWARDI', '__.___.___._.___.___', '(021) 55955044', '', '', 'Komp. Pergudangan Pantai Indah Dadap Blok BB, Jl. Raya Prancis No.2.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(136, 'P009', 'PROFON ELECTRIC CABLE , P. T.', '', '__.___.___._.___.___', '', '', '', 'Kawasan Industri Dan Pergudangan Pantai Indah Dadap Blok CJ/2 Tangerang\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(137, 'P010', 'PRIMA MITRA  ELEKTRINDO, P. T.', '', '02.189.159.3.037.000', '', '', '', 'Jl. Gajah Mada No.199 RT/RW : 003/004 Glodok Taman Sari Jakarta Barat.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(138, 'P011', 'PUTRA DHARMA, P. T.', '', '01.104.778.4.004.000', '', '', '', 'Jl. Raya Bali No. 1 Rawa Terate Cakung Jakarta Timur   \r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(139, 'P012', 'PANI, P. T.', '', '__.___.___._.___.___', '', '', '', 'Jl. Raya Prancis No. 2 Blok M.30 KP. Pantai Indah Dadap Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(140, 'P013', 'PUJI CAHAYA, P. T.', '', '__.___.___._.___.___', '', '', '', 'Jl. K.L. Yos Sudarso No. 1212 A Medan\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(141, 'P014', 'PLASTIC INJECTION INDONESIA ,PT.', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(142, 'P015', 'PRIMA INDAH LESTARI, PT.', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 'P016', 'POWER CABLE INDONESIA , PT.', '', '21.094.645.5.418.000', '', '', '', 'Jl. Raya Dadap Perg. Sentra Kosambi Blok H6 H Kosambi Timur Kosambi Tangerang Banten\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 'P017', 'PCM KABEL INDONESIA, PT.', '', '31.785.579.9.418.000', '', '', '', 'Komp. Industri Mekarjaya Jl. Karet Raya No. 288\r\nMekar Jaya Sepatan Tangerang Banten\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 'P018', 'PULUNG CABLE INDONESIA , PT.', '', '__.___.___._.___.___', '', '', '', 'Jl. Kopo Maja No. 99 Cikande Serang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 'P019', 'PANDE WUNGSU WYASA', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 'P020', 'PRIMA KAWAT MANDIRI, CV.', '', '82.870.427.0.071.000', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, 'R001', 'ROFA ELECTRIC, P. D.', 'AHMAD', '__.___.___._.___.___', '(021) 5551766', '', '(021) 39107926', 'Komplek Pertokoan Kenari Mas Blok F 34 Jakarta\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 'R002', 'RICH TOP UNIVERSAL INC.', '', '__.___.___._.___.___', '', '', '', 'Simmonds Building Wickhams Cayi PO.BOX 963, Road Town, Tortola, British Virgin I', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 'R003', 'RAMON STAR, CV.', '', '__.___.___._.___.___', '', '', '', 'Karanggan Desa Puspa Sari RT/RW : 003/002 NO. 46 Citerep, Bogor.\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 'R004', 'ROLLING', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 'R005', 'RAGA MANDIRI, CV.', '', '02.446.590.8.402.000', '', '', '', 'TANGERANG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 'R006', 'REGINA TAMPUBOLON', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 'R007', 'ROY', '', '__.___.___._.___.___', '', '', '', 'KARAWACI TANGERANG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 'S001', 'SUMACO JAYA ABADI, P. T.', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 'S002', 'SINAR MAHA SURYA, P. T.', 'DANIEL', '__.___.___._.___.___', '(021) 5551766', '', '(021) 5551765', 'Benda Raya No.3 Jakarta\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 'S003', 'SUKSES SETIA, P. T.', 'ALAMSYAH', '01.495.347.5.402.000', '(021) 6619913', '', '(021) 6614586', 'Jl. Bandengan Utara No. 91 S Jakarta Utara\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 'S004', 'SINAR INTAN PUTRA NUSA, P.T.', 'EDI', '01.338.015.9.034.000', '', '', '', 'Jl. Kapuk Kayu Besar No. 37 RT/RW:013/004 Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 'S005', 'SUMBER BARU, P. T.', '', '__.___.___._.___.___', '(021) 6697173', '', '', 'Terusan Bandengan Utara 89 No.17 Pangeran Jayakarta\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 'S006', 'SINAR PLASTIK, P. T.', '', '__.___.___._.___.___', '(021) 6195205', '', '', 'Rawa Lele Pergudangan No.50 Warung Gantung \r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 'S007', 'SURYA BUANA SAKTI, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 'S008', 'SURYA UNGGUL, P. T.', '', '__.___.___._.___.___', '(021)5686868', '', '', 'Jelambar Baru No.11 Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 'S009', 'SARIHON ELECTRIC, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 'S010', 'SARIFUDIN', '', '__.___.___._.___.___', '', '', '', '\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 'S011', 'SURYA TEGUH JAYA, P. T.', '', '01.286.879.0.402.000', '', '', '', 'Jl. Prabu Kiansantang No. 20, Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 'S012', 'SUPREME JAYA ABADI, P. T.', '', '__.___.___._.___.___', '(021) 5446355', '', '', 'Jl. Kapuk RT 004/001 Kapuk Cengkareng Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 'S013', 'SANTIGI JAYA SAKTI', '', '__.___.___._.___.___', '(021) 56968857', '', '', '\r\nJl. Jelambar Selatan 16 No. 4A-4B Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 'S014', 'SUMBER REJEKI, P. T.', 'IBU YANI', '__.___.___._.___.___', '', '', '', 'JL. PETA BARAT NO. 33 JAKARTA BARAT.\r\n\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 'S015', 'SUTANTO ARIF CHANDRA ELEKTRONIK , PT.', 'BP. SUTANTO', '__.___.___._.___.___', '', '', '', 'Jl. Pinangsia Raya Blok G No. 3 B Komplek Pertokoan Glodok Plaza Jakarta.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 'S017', 'SUN NUR LOGAM JAYA', '', '__.___.___._.___.___', '', '', '', 'BEKASI\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 'S018', 'SUNARI, TN', '', '__.___.___._.___.___', '', '', '', 'TANGERANG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 'S019', 'SALIM', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 'S020', 'SAIFUL', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 'S021', 'SURYA PLASTIK, CV.', '', '__.___.___._.___.___', '', '', '', 'KP. BUNGUR JAYA RT 001/004 DESA SERDANG WETAN LEGOK CURUG TANGERANG\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 'S022', 'SUBUR JAYA ELECTRIC, PT.', '', '__.___.___._.___.___', '', '', '', 'Palm Paradice Park Residance Blok C No. 10 Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 'S023', 'SINERGI METAL UTAMA, PT.', '', '__.___.___._.___.___', '', '', '', 'JAKARTA\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 'S024', 'SUPER METAL BANGKA JAYA, PT.', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 'S025', 'SUNAWAN', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 'S026', 'SINERGI PRIMA SEJAHTERA, PT.', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 'S027', 'SUGIH COPPER, CV', '', '82.595.399.5.452.000', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 'S028', 'STAR COPPER NUSANTARA, CV.', '', '82.517.332.1.043.000', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 'S999', 'SDM', 'DIANA', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 'T001', 'TELAGA METALINDO, P. T.', '', '__.___.___._.___.___', '(021) 5963441', '', '(021) 55771597', 'Jl. Raya Serang KM. 16,8 Telaga Cikupa Tangerang.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 'T002', 'TRIMUSTIKA, P. T.', 'FREDY', '__.___.___._.___.___', '(021) 54372950', '', '', 'Komplek Citra Extension Blok BF III No. 3 Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 'T003', 'TOKO 88', '', '__.___.___._.___.___', '', '', '', 'Pasar Kenari\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 'T005', 'TEMBAGA MULIA SEMANAN TBK, P.T.', 'YUNG LIE', '01.000.137.8.092.000', '', '', '', '', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 'T006', 'TITANINDO REKATAMA, PT.', '', '__.___.___._.___.___', '', '', '', 'Kp. Pengasinan RT/RW 001/03 Periuk Jaya, Jatiuwung,Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 'T007', 'TANGERANG JAYA PLASTIK, PT.', 'EVA', '__.___.___._.___.___', '', '', '', 'Jl. Sasmita Blok F No. 13 Tangerang\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 'T008', 'TRITUNGGAL, P.T.', '', '__.___.___._.___.___', '', '', '', 'Jl. benda Raya Kamal No.2 Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 'T009', 'THE THUMMD CO, LTD', '', '__.___.___._.___.___', '', '', '', 'IF NO. 08, SIUN SHENG 50 LANE SHIN GUANG RD. TAI PYNG SHYH, THAICHUNG SHIANN TAIWAN\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 'T010', 'THREE LINES INDONESIA, PT', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 'T011', 'THOMAS', '', '__.___.___._.___.___', '', '', '', 'JAKARTA\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 'U001', 'UNGGUL CIPTA PERKASA, P. T.', 'ABUN', '01.775.275.9.411.000', '(021) 5851940', '', '(021) 5842638', 'Komplek Taman Kebun Jeruk Blok Q2 No. 11 Jakarta\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 'U002', 'UTIKON, P. T.', 'TERESIA', '__.___.___._.___.___', '(021) 6605843,44', '', '(021) 6605683', 'Duta Harapan Indah Kapuk Jakarta Barat\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 'U003', 'UNI STAR UTAMA, P. T.', '', '__.___.___._.___.___', '(024) 7623554', '', '', 'Jl. Kawasan Industri Candi Semarang \r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, 'U004', 'UD. COKRO', 'IBU ALAY', '__.___.___._.___.___', '', '', '', 'J\r\nJakarta.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, 'U005', 'UNIKAWAT', 'BP. WILLY SUGIANTO', '__.___.___._.___.___', '021-55960284-85', '818811307', '021-55959432', 'Jl. Ruko Fantasi Blok W/20A Cengkareng Jakarta Barat.\r', 'unilestari2004@yahoo', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, 'U006', 'UNILOGAM JAYA, PT.', '', '__.___.___._.___.___', '', '', '', '\r', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, 'V001', 'VOKSEL ELECTRIC, P. T.', 'ANGELA', '01.000.784.7.054.000', '(021) 8230525', '', '(021) 8230526', 'Menara Karya Lantai 3, Unit D Jl.H.R. Rasuna Said, Blok X.5, Kav. 1-2.\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, 'V002', 'VCS COPPER INDUSTRY SDN BHD', '', '__.___.___._.___.___', '60-3-33412686', '', '60-3-33437986', 'NO.14, Jl. Keluli 2 Kawasan Industri Bukit Raja, 41050 Klang Malaysia.\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, 'W001', 'WILLSON SURYA UNGGUL', 'IRAWAN', '__.___.___._.___.___', '(021) 5686868', '', '(021)5679974', 'Jl. Jelambar Baru No. 11 Jakarta \r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, 'W002', 'WILLY', '', '__.___.___._.___.___', '', '', '', '', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, 'W003', 'WORD METALS RECYCLING CO, LTD', '', '__.___.___._.___.___', '886-3-3131809', '', '886-3-323-362', 'No. 14, Alley 5, Lane 182, Sec. 5, NAN Chu RD., Luchu Hsiang, Taoyuanhsien\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, 'Y001', 'YIN QIN CO. LTD', '', '__.___.___._.___.___', '757-86758761', '', '757-86715772', 'Freight Station Room A101 Sanshan Port District Nanhai City, China\r', '', 'Export', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, 'Z001', 'ZULKARNAIN', '', '__.___.___._.___.___', '', '', '', '\r', '', 'Lokal', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_cv`
--

CREATE TABLE `m_cv` (
  `id` int(11) NOT NULL,
  `nama_cv` varchar(150) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
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
-- Dumping data for table `m_cv`
--

INSERT INTO `m_cv` (`id`, `nama_cv`, `pic`, `telepon`, `npwp`, `hp`, `alamat`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'CV. MEGALOMAN', 'MEGA', '', '', '', 'Megalodon Sea', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'CV. STEINMETZ', 'METZI', '', '', '', 'SteamCommunity', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'CV. ARK BROTO', 'ARTO', '', '', '', 'Ark 24363', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'CV. MICROGRANT', 'MIGRANT', '', '', '', 'Silicon Valley', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'CV. RIBUT ANGIN', 'PAK RIBUT', '', '', '', 'Tornado', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'CV. BELLO RICHMAN', 'BELO', '', '', '', 'Mansion of Rich', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'CV. STEAMMON', 'MONNA', '', '', '', 'Faceit Ban', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'CV. BRADERINARMS', 'RAZI', '', '', '', 'Warrazi', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(91, 'INV-RTR', 1, 4, '.', '.'),
(92, 'A', 0, 4, '.', '.'),
(93, 'B', 0, 4, '.', '.'),
(94, 'C', 0, 4, '.', '.'),
(95, 'L', 0, 4, '.', '.'),
(96, 'K', 0, 4, '.', '.'),
(97, 'T', 0, 4, '.', '.'),
(98, 'SO-T', 1, 4, '.', '.');

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
(1, 'A.', 2),
(2, 'B.', 2),
(3, 'C.', 2),
(4, 'PO-201903', 4),
(5, 'DTR.201903', 7),
(6, 'SO.201903', 9),
(7, 'SPB-FG201903', 9),
(8, 'PRD-SDM.201903', 8),
(9, 'BPB-SDM.201903', 8),
(10, 'SJ.201903', 8),
(11, 'BB-BR.201903', 4),
(12, 'INVOICE-201903', 3),
(13, 'TTR.201903', 8),
(14, 'VRSK.201903', 2),
(15, 'PRD.201903', 1),
(16, 'SPB.201903', 1),
(17, 'BPB-WIP.201903', 3),
(18, 'BPB-AMP.201903', 1),
(19, 'L.', 1462),
(20, 'K.', 100),
(21, 'J.', 1),
(22, 'M.', 1441),
(23, 'P.', 217),
(24, 'Q.', 13),
(25, 'R.', 1),
(26, 'S.', 1439),
(27, 'T.', 1466),
(28, 'DTR-T.201903', 4),
(29, 'SPB-WIP.201903', 7),
(30, 'SO-T.201903', 5),
(31, 'PRD-WIP.201903', 2),
(32, 'PO-T.201903', 1),
(33, 'SPB-RSKT.201903', 1),
(34, 'SJ-T.201903', 1),
(35, 'DTT.201903', 1),
(36, 'BPB-PO-T.201903', 1);

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
(1, 'barcode_barang'),
(2, 'barcode_bobbin');

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
(34, 1, 34, 'PRINT 1,1', ''),
(35, 2, 1, 'SIZE 87.5 mm, 60.1 mm', ''),
(36, 2, 2, 'GAP 3 mm, 0 mm', ''),
(37, 2, 3, 'DIRECTION 0,0', ''),
(38, 2, 4, 'REFERENCE 0,0', ''),
(39, 2, 5, 'OFFSET 0 mm', ''),
(40, 2, 6, 'SET PEEL OFF', ''),
(41, 2, 7, 'SET CUTTER OFF', ''),
(42, 2, 8, 'SET PARTIAL_CUTTER OFF', ''),
(43, 2, 9, 'SET TEAR ON', ''),
(44, 2, 10, 'CLS', ''),
(45, 2, 11, 'BOX 28,39,672,447,3', ''),
(46, 2, 12, 'BAR 29,418, 641, 3', ''),
(57, 2, 13, 'BAR 29,335, 641, 3', ''),
(58, 2, 14, 'CODEPAGE 1252', ''),
(59, 2, 15, 'TEXT 654,415,\"ROMAN.TTF\",180,1,12,\"Kode Bobin  :\"', ''),
(60, 2, 16, 'TEXT 655,375,\"ROMAN.TTF\",180,1,12,\"Deskripsi      :\"', ''),
(61, 2, 17, 'TEXT 651,198,\"ROMAN.TTF\",180,1,12,\"Bobbin No        :\"', ''),
(62, 2, 18, 'BARCODE 576,324,\"39\",79,0,180,3,9,\"05RT010\"', ''),
(63, 2, 19, 'TEXT 403,240,\"ROMAN.TTF\",180,1,8,\"05RT010\"', ''),
(64, 2, 20, 'TEXT 648,145,\"ROMAN.TTF\",180,1,12,\"Berat Bobbin   :\"', ''),
(65, 2, 21, 'TEXT 648,91,\"ROMAN.TTF\",180,1,12,\"Tgl. Produksi   :\"', ''),
(66, 2, 22, 'TEXT 398,144,\"ROMAN.TTF\",180,1,14,\"2.00\"', ''),
(67, 2, 23, 'TEXT 400,90,\"0\",180,14,14,\"03/20/2019\"', ''),
(68, 2, 24, 'TEXT 315,144,\"0\",180,12,12,\"KG\"', ''),
(69, 2, 25, 'TEXT 446,368,\"1\",180,2,2,\"BCW 0.20 MM TMS SOFT\"', ''),
(70, 2, 26, 'TEXT 446,409,\"4\",180,1,1,\"05RT010\"', ''),
(72, 2, 27, 'TEXT 399,196,\"ROMAN.TTF\",180,1,14,\"2.00\"', ''),
(73, 2, 28, 'PRINT 1,1', '');

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
(1, 'PO-201903.0002', '2019-03-19', 0, 0, 0, 0, 499, 0, 'CASH', 'Rongsok', 0, 1, 4, NULL, '2019-03-19 02:03:27', 1, '2019-03-19 02:03:40', 1),
(2, 'PO-201903.0003', '2019-03-19', 0, 0, 0, 0, 370, 0, '1 BULAN', 'Rongsok', 0, 1, 4, NULL, '2019-03-19 02:03:02', 1, '2019-03-19 02:03:46', 1),
(3, 'PO-201903.0004', '2019-03-19', 0, 0, 0, 0, 336, 0, 'CASH', 'Rongsok', 0, 0, 3, NULL, '2019-03-19 03:03:41', 1, '2019-03-19 03:03:50', 1),
(4, 'PO-T.201903.0001', '2019-03-21', 0, 0, 0, 0, 0, 22, 'CASH', 'WIP', 0, 0, 3, '', '2019-03-21 11:03:05', 1, '0000-00-00 00:00:00', 0);

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
(2, 1, 0, 0, 9, 0, 0, 80500, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(3, 1, 0, 0, 17, 0, 0, 74500, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(4, 1, 0, 0, 12, 0, 0, 77000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(5, 1, 0, 0, 63, 0, 0, 75500, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(6, 1, 0, 0, 64, 0, 0, 74500, 5000, 372500000, 0, 0, 0, 1, 0, 0, 0),
(7, 2, 0, 0, 74, 0, 0, 74500, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(8, 2, 0, 0, 9, 0, 0, 81000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(9, 2, 0, 0, 10, 0, 0, 78500, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(10, 2, 0, 0, 17, 0, 0, 75000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(12, 2, 0, 0, 12, 0, 0, 77500, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(13, 2, 0, 0, 63, 0, 0, 76000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(14, 2, 0, 0, 64, 0, 0, 75000, 5000, 375000000, 0, 0, 0, 1, 0, 0, 0),
(15, 3, 0, 0, 9, 0, 0, 80000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(16, 3, 0, 0, 17, 0, 0, 74000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(17, 3, 0, 0, 12, 0, 0, 76500, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(18, 3, 0, 0, 63, 0, 0, 75000, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(19, 3, 0, 0, 64, 0, 0, 74000, 5500, 407000000, 0, 0, 0, 1, 0, 0, 0),
(20, 4, 0, 0, 0, 0, 5, 100000, 1500, 150000000, 0, 0, 0, 0, 0, 0, 0),
(21, 4, 0, 0, 0, 0, 6, 75000, 1500, 112500000, 0, 0, 0, 0, 0, 0, 0);

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
(1, 'PRD-SDM.201903.0003', '2019-03-19', 1, NULL, 452, 3, 1, '2019-03-19 06:03:16', '2019-03-19 06:03:04', 1),
(2, 'PRD-SDM.201903.0004', '2019-03-19', 1, NULL, 216, 1, 1, '2019-03-19 06:03:41', '2019-03-19 06:03:03', 1),
(3, 'PRD-SDM.201903.0005', '2019-03-19', 1, NULL, 426, 3, 1, '2019-03-19 07:03:45', '2019-03-19 07:03:48', 1),
(4, 'PRD-SDM.201903.0006', '2019-03-19', 1, NULL, 216, 1, 1, '2019-03-19 07:03:16', '2019-03-19 07:03:19', 1),
(5, 'PRD-SDM.201903.0007', '2019-03-20', 1, NULL, 444, 3, 1, '2019-03-20 05:03:14', '2019-03-20 05:03:22', 1),
(6, 'PRD-SDM.201903.0008', '2019-03-20', 1, NULL, 470, 1, 1, '2019-03-20 05:03:19', '2019-03-20 05:03:58', 1);

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
  `berat_bobbin` float NOT NULL,
  `bobbin_id` int(11) NOT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_fg_detail`
--

INSERT INTO `produksi_fg_detail` (`id`, `produksi_fg_id`, `tanggal`, `no_packing_barcode`, `no_produksi`, `bruto`, `netto`, `berat_bobbin`, `bobbin_id`, `keterangan`) VALUES
(1, 1, '2019-03-19', '190319B120001', 522, 310.5, 260.9, 49.6, 1641, NULL),
(2, 1, '2019-03-19', '190319B120002', 521, 309.6, 258.4, 51.2, 1641, NULL),
(3, 1, '2019-03-19', '190319B120003', 524, 294.9, 246.9, 48, 1641, NULL),
(4, 1, '2019-03-19', '190319B120004', 531, 347.2, 288.8, 58.4, 1641, NULL),
(5, 2, '2019-03-19', '190319L22600006', 2, 309, 244.5, 64.5, 105, ''),
(6, 2, '2019-03-19', '190319L22600026', 1, 337.8, 278, 59.8, 114, ''),
(7, 3, '2019-03-19', '190319C120005', 20, 560.35, 500, 60.35, 1642, NULL),
(8, 3, '2019-03-19', '190319C120006', 21, 512.58, 461.72, 50.86, 1642, NULL),
(9, 3, '2019-03-19', '190319C120007', 22, 630.24, 573.63, 56.61, 1642, NULL),
(10, 4, '2019-03-19', '190319L22600034', 24, 560, 496.2, 63.8, 120, ''),
(11, 4, '2019-03-19', '190319L22600040', 25, 578, 514.5, 63.5, 123, ''),
(12, 5, '2019-03-20', '190320A03100008', 26, 280, 253.53, 26.47, 1640, NULL),
(13, 5, '2019-03-20', '190320A03100009', 27, 278, 252.93, 25.07, 1640, NULL),
(14, 5, '2019-03-20', '190320A03100010', 28, 260, 233.22, 26.78, 1640, NULL),
(15, 5, '2019-03-20', '190320A03100011', 29, 256, 228.64, 27.36, 1640, NULL),
(16, 6, '2019-03-20', '190320M03100007', 30, 312, 265, 47, 812, '');

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
(1, 'PRD.201903.0001', '2019-03-19', 2, '', 1, 1, '2019-03-19 04:03:56', 1, '0000-00-00 00:00:00', 0);

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
(1, 1, 2, 5500, '', 1, '0000-00-00 00:00:00', 2019, '0000-00-00 00:00:00', 0);

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
(404, 3, 378, 1),
(405, 6, 379, 1),
(406, 8, 7, 1),
(407, 9, 7, 1),
(408, 10, 7, 1),
(409, 11, 7, 1),
(410, 12, 7, 1),
(411, 13, 7, 1),
(412, 14, 381, 1),
(413, 9, 415, 0),
(414, 14, 415, 1),
(415, 14, 395, 1),
(416, 15, 415, 1),
(417, 16, 402, 1),
(418, 17, 415, 1),
(419, 14, 380, 1),
(420, 18, 389, 1),
(421, 18, 415, 1),
(422, 14, 382, 1),
(423, 14, 383, 1),
(424, 14, 384, 1),
(425, 14, 386, 1),
(426, 14, 385, 1),
(427, 14, 387, 1),
(428, 14, 388, 1),
(429, 14, 396, 1),
(430, 14, 398, 1),
(431, 14, 397, 1),
(432, 15, 395, 1),
(433, 15, 396, 1),
(434, 15, 400, 1),
(435, 15, 409, 1),
(436, 14, 416, 1),
(437, 14, 417, 1),
(438, 14, 418, 1),
(439, 15, 420, 1),
(440, 14, 422, 1),
(441, 15, 416, 1),
(442, 15, 410, 1),
(443, 15, 411, 1),
(444, 15, 412, 1),
(445, 15, 413, 1),
(446, 15, 423, 1),
(447, 15, 417, 0),
(448, 15, 418, 0),
(449, 16, 403, 1),
(450, 16, 404, 1),
(451, 16, 405, 1),
(452, 16, 406, 1),
(453, 16, 408, 1),
(454, 16, 396, 1),
(455, 16, 395, 1),
(456, 16, 399, 1),
(457, 17, 416, 1),
(458, 17, 417, 1),
(459, 17, 418, 1),
(460, 17, 419, 1),
(461, 17, 423, 1),
(462, 15, 419, 1),
(463, 17, 402, 1),
(464, 17, 403, 1),
(465, 17, 407, 1),
(466, 17, 405, 1),
(467, 18, 390, 1),
(468, 18, 391, 1),
(469, 18, 392, 1),
(470, 18, 393, 1),
(471, 18, 394, 1),
(472, 18, 416, 1),
(473, 18, 421, 1);

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
(1, '', 'RONGSOK FG', 'KG', '', '', 'FG', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, '', 'BS', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, '', 'SISA WIP', 'KG', '', '', 'WIP', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, '01A0001', 'A-BCW TIPE 1', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, '01A0002', 'A-BCW TIPE 2', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, '01AR001', 'A - RAMBUT', 'KG', '', '', 'Rongsok', '', '2008-03-19 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, '01B0001', 'BC', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, '01B0002', 'TRAVO', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, '01B0003', 'COVERTAPE', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, '01B0004', 'COPPER SCRAP 2,90 MM - 3,20 MM', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, '01B0005', 'BARE WIRE SCRAP', 'KG', '', '', 'Rongsok', '', '2010-11-01 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, '01BB001', 'B-BAKAR', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, '01BL001', 'B-LAUT', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, '01BS001', 'BS SDM', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, '01BS002', 'BS ROLLING', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, '01BS003', 'BS APOLLO', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, '01BS004', 'BS INGOT', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, '01BS005', 'BS PRODUKSI 2.90', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, '01BS007', 'BS QC', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, '01BS008', 'TEMBAGA RONGSOK 8 MM', 'KG', '', '', 'Rongsok', '', '2008-03-12 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, '01BS009', 'BS TALI CUCI', 'KG', '', '', 'Rongsok', '', '2008-03-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, '01BS010', 'BS KAWAT RAMBUT', 'KG', '', '', 'Rongsok', '', '2008-09-05 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, '01BS011', 'AMPAS APOLLO', 'KG', '', '', 'Rongsok', '', '2009-09-03 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, '01BS012', 'SERBUK APOLLO', 'KG', '', '', 'Rongsok', '', '2009-09-03 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, '01BS013', 'SERBUK ROLLING', 'KG', '', '', 'Rongsok', '', '2009-09-03 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, '01BS014', 'SERBUK DRAWING SDM', 'KG', '', '', 'Rongsok', '', '2009-09-03 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, '01BS015', 'BCW 0,50 MM SOFT', 'KG', '', '', 'Rongsok', '', '2009-12-14 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, '01BS016', 'BCW 0,60 MM SOFT', 'KG', '', '', 'Rongsok', '', '2009-12-14 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, '01BS017', 'BCW 1,00 MM SOFT', 'KG', '', '', 'Rongsok', '', '2009-12-14 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, '01BS018', 'BCW 1,38 MM SOFT', 'KG', '', '', 'Rongsok', '', '2009-12-14 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, '01BS019', 'BCW 1,50 MM SOFT', 'KG', '', '', 'Rongsok', '', '2009-12-14 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, '01BS020', 'BCW 1,78 MM SOFT', 'KG', '', '', 'Rongsok', '', '2009-12-14 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, '01BS021', 'BCW 2,76 MM SOFT', 'KG', '', '', 'Rongsok', '', '2009-12-14 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, '01BS022', 'BCW 0,67 MM SOFT', 'KG', '', '', 'Rongsok', '', '2009-12-16 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, '01BS023', 'BCW 0,78 MM SOFT', 'KG', '', '', 'Rongsok', '', '2009-12-16 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, '01BS024', 'BCW 0,85 MM SOFT', 'KG', '', '', 'Rongsok', '', '2009-12-16 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, '01BS025', 'BCC', 'KG', '', '', 'Rongsok', '', '2009-12-17 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, '01BS026', '0,40 MM TINNED', 'KG', '', '', 'Rongsok', '', '2009-12-23 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, '01BS027', '0,45 MM TINNED', 'KG', '', '', 'Rongsok', '', '2009-12-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, '01BS028', '0,50 MM TINNED', 'KG', '', '', 'Rongsok', '', '2009-12-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, '01BS029', 'BCW 2,26 MM SOFT', 'KG', '', '', 'Rongsok', '', '2011-04-13 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, '01BS030', 'BCW 3,55 MM SOFT', 'KG', '', '', 'Rongsok', '', '2010-02-10 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, '01BS031', '0,12 MM TINNED', 'KG', '', '', 'Rongsok', '', '2010-03-18 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, '01BS032', '0,18 MM TINNED', 'KG', '', '', 'Rongsok', '', '2010-03-18 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, '01BS033', 'BLEBEK KURASAN SDM', 'KG', '', '', 'Rongsok', '', '2010-12-01 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, '01BS034', 'BCW 0,12 MM SOFT TMS', 'KG', '', '', 'Rongsok', '', '2011-02-24 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, '01BS035', 'BS 8,00 MM', 'KG', '', '', 'Rongsok', '', '2011-10-13 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, '01BS036', 'KURASAN ROLLING', 'KG', '', '', 'Rongsok', '', '2012-03-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, '01BS037', 'SERBUK CUCIAN 8,00 MM', 'KG', '', '', 'Rongsok', '', '2012-03-02 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, '01BS038', 'BLEBEK DRAWING SDM', 'KG', '', '', 'Rongsok', '', '2012-12-27 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, '01BS039', 'BS TEMBAGA', 'KG', '', '', 'Rongsok', '', '2016-02-10 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, '01BS040', 'BS 13,50 - 17,50 MM', 'KG', '', '', 'Rongsok', '', '2017-06-13 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, '01BT002', 'B-TELPON', 'KG', '', '', 'Rongsok', '', '2008-03-05 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, '01C0001', 'COPPER SCRAP 2,80 MM - 3,20 MM', 'KG', '', '', 'Rongsok', '', '2013-03-22 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, '01C0002', 'CU WIRE C/W', 'KG', '', '', 'Rongsok', '', '2009-03-18 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, '01C0003', 'COPPER SCRAP 2,80 MM - 3,20 MM', 'KG', '', '', 'Rongsok', '', '2013-03-25 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, '01D0001', 'DINAMO', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, '01D0002', 'DINAMO BARU', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, '01D0003', 'DINAMO HALUS', 'KG', '', '', 'Rongsok', '', '2010-09-22 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, '01D0004', 'D-KALENG', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, '01DD001', 'DANDANG', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, '1,00E+01', 'ENAMELL', 'KG', '', '', 'Rongsok', '', '2010-09-04 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, '01I0001', 'TEMBAGA INGOT RENDAH', 'KG', '', '', 'Rongsok', '', '2011-09-27 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, '01LP001', 'LUMPUR TEMBAGA', 'KG', '', '', 'Rongsok', '', '2010-01-27 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, '01M0001', 'MANGKUK CU', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, '01P0003', 'PLAT', 'KG', '', '', 'Rongsok', '', '2008-02-01 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, '01PB001', 'PIPA BARU', 'KG', '', '', 'Rongsok', '', '2008-02-01 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, '01PP001', 'PLAT PANEL', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, '01PR001', 'PIPA RONGSOKAN TEMBAGA', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, '01PT001', 'PLAT TEMBAGA', 'KG', '', '', 'Rongsok', '', '2009-02-19 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, '01S0001', 'SERUTAN', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, '01SD001', 'SERBUK DRAWING', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, '01T0001', 'TEMBAGA PUTIH', 'KG', '', '', 'Rongsok', '', '2009-07-17 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, '01T0005', 'TEMBAGA AFKIR 8 MM', 'KG', '', '', 'Rongsok', '', '2010-04-06 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, '01T0006', 'AMPAS TEMBAGA', 'KG', '', '', 'Rongsok', '', '2010-06-18 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, '02I0001', 'INGOT RENDAH', 'KG', '', '', 'Rongsok', '', '2011-06-27 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, '03DW001', 'KABEL DROP WIRE', 'KG', '', '', 'Rongsok', '', '2010-02-08 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, '03J0001', 'KABEL JFTA', 'KG', '', '', 'Rongsok', '', '2008-01-29 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, '03KI001', 'KABEL ISOLASI ( CU ) JRCU', 'KG', '', '', 'Rongsok', '', '2010-04-27 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, '03KM001', 'KABEL MARKET BESAR', 'KG', '', '', 'Rongsok', '', '2009-11-17 00:00:00', 0, '0000-00-00 00:00:00', 0),
(86, '03KM002', 'KABEL MARKET KECIL', 'KG', '', '', 'Rongsok', '', '2009-11-17 00:00:00', 0, '0000-00-00 00:00:00', 0),
(87, '03KT001', 'KABEL BW', 'KG', '', '', 'Rongsok', '', '2011-11-18 00:00:00', 0, '0000-00-00 00:00:00', 0),
(88, '03S0001', 'SINGLE CORE', 'KG', '', '', 'Rongsok', '', '2009-11-17 00:00:00', 0, '0000-00-00 00:00:00', 0),
(89, '03S0002', 'SINGLE CORE POWER', 'KG', '', '', 'Rongsok', '', '2011-07-05 00:00:00', 0, '0000-00-00 00:00:00', 0),
(90, '03S0003', 'SINGLE CORE JELLY', 'KG', '', '', 'Rongsok', '', '2011-07-05 00:00:00', 0, '0000-00-00 00:00:00', 0),
(91, '30A0002', 'BS ALUMINIUM A2C', 'KG', '', '', 'Rongsok', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `berat_pallete` float NOT NULL,
  `netto` float NOT NULL,
  `no_pallete` varchar(50) NOT NULL,
  `line_remarks` text NOT NULL
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
  `qty` int(11) NOT NULL,
  `bruto` float NOT NULL,
  `netto` float NOT NULL,
  `line_remarks` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `r_t_so`
--

CREATE TABLE `r_t_so` (
  `id` int(11) NOT NULL,
  `no_so` varchar(25) NOT NULL,
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
  `nomor_bobbin` varchar(20) DEFAULT NULL,
  `line_remarks` text NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `keterangan` text,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `no_sales_order`, `tanggal`, `m_customer_id`, `flag_tolling`, `flag_ppn`, `flag_invoice`, `flag_sj`, `marketing_id`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 'SO.201903.0005', '2019-03-19', 8, 0, 0, 2, 1, 14, '', '2019-03-19 06:03:50', 1, '2019-03-19 06:03:36', 1),
(5, 'SO.201903.0008', '2019-03-21', 7, 2, 0, 1, 0, 8, 'SO TOLLING ALPHA', '2019-03-20 03:03:52', 1, '2019-03-20 04:03:45', 1),
(6, 'SO.201903.0009', '2019-03-20', 12, 0, 0, 0, 0, 8, '', '2019-03-20 06:03:57', 1, '2019-03-20 07:03:55', 1),
(11, 'SO-T.201903.0005', '2019-03-20', 21, 2, 0, 0, 1, 8, '', '2019-03-20 07:03:32', 1, '2019-03-20 07:03:02', 1);

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
(478, 'HOSE HYDROULIK 7/8 R5 26 C', 'BUAH', '', '09HH001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(479, 'HOLESAW 30 M', 'BUAH', '', '09HL001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(480, 'HANG PUM', 'BUAH', '', '09HP001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
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
(952, 'SAKLAR DOUBLE CLIPSA', 'BUAH', '', '09SD006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(953, 'SHOCK DRAT DALAM GALFANIS 2 1/2', 'BUAH', '', '09SD007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(954, 'SHOCK DRAT LUAR PVC 1/2', 'BUAH', '', '09SD008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
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
(1416, 'SERVICE TRAVO SLIDAK 1A/220', 'UNIT', '', '10ST006', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1417, 'SERVICE TIMBANGAN', 'UNIT', '', '10ST007', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1418, 'SERVICE TRAVO 2500 KV', 'UNIT', '', '10ST008', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
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
(1903, 'CONCRETE TYPE : K - 45', 'M3', '', '16CC003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1904, 'CAT TEMBOK CATYLAK @ 25 K', 'PAIL', '', '16CC004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(1905, 'CLOSSED DUDU', 'SET ', '', '16CD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
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
(2384, 'CLUTCH DISK ASSY P/N 304-10-3411', 'BUAH', '', '19CD001', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2385, 'CLUTCH DISK ASSY P/N 3EC-10-1152', 'BUAH', '', '19CD002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2386, 'CLUTCH DISK P/N 91321-1110', 'BUAH', '', '19CD003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `sparepart` (`id`, `nama_item`, `uom`, `description`, `alias`, `created`, `created_by`, `modified`, `modified_by`) VALUES
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
(1, 'SPB.201903.0001', '2019-03-19', 1, 2, 0, 5500, '', 1, '2019-03-19 04:03:45', 1, '0000-00-00 00:00:00', 0, '', '2019-03-19 04:03:56', 1, '2019-03-19 04:03:39', 1),
(2, 'SPB-RSKT.201903.0001', '2019-03-21', 0, 2, 1, 3000, 'KIRIM UNTUK TOLLING KELUAR', 1, '2019-03-21 11:03:37', 1, '0000-00-00 00:00:00', 0, '', '2019-03-21 11:03:10', 1, '2019-03-21 11:03:32', 1);

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
(1, 1, 14, 3),
(2, 1, 1, 1),
(3, 1, 13, 3),
(4, 1, 19, 4),
(5, 1, 4, 1),
(6, 2, 18, 4),
(7, 2, 6, 1);

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
,`total_berat_in` double
,`total_berat_out` double
);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode_supplier` varchar(8) NOT NULL,
  `nama_supplier` varchar(150) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `npwp` varchar(30) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
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

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `pic`, `npwp`, `telepon`, `hp`, `fax`, `e_mail`, `alamat`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'A001', 'ANUGRAH LESTARI, P.T.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'A002', 'ATLAS COPCO, P.T.', 'FINANI', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'A003', 'ANEKA KABEL ELECTRICT, P.T.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'A004', 'ADHINUSA LESTARI JAYA', 'SONNY', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'A005', 'ASTRAGRAPHIA, P.T.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'A006', 'ALIF SEJAHTERA', 'IBU SRIYANI', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'A007', 'ATIKA', 'YONGKI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'A008', 'ALAM JAYA', 'ALAM', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'A009', 'ARIES KABEL', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'A010', 'ALCARINDO PRIMA, P.T.', 'FINANI', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'A011', 'AKRAM', 'BP. ORLIKON', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'A012', 'AKUN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'A013', 'AMAN ABADI', 'S. ANWAR', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'A014', 'ALIONG', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'A015', 'AWI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'A016', 'ANTONY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'A017', 'ASNAWI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'A018', 'ABENG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 'A019', 'ARMAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'A020', 'ASUI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'A021', 'AMIR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'A022', 'ARIF', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'A023', 'ANTONO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'A024', 'AGUS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 'A025', 'ASUNG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'A026', 'AFONG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'A027', 'AMANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'A028', 'ALVIN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'A029', 'ANUGRAH MEGA TERATAI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 'A030', 'ANGSANA PUTERA MAKMUR, P.T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'A031', 'ARI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 'A032', 'AYUNG', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 'A033', 'ANUGRAH PUTRA CEMERLANG', 'BP. SUMARYOTO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'A034', 'ARIFIN', 'BP. ARIFIN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'A035', 'AGUSALIM', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'A036', 'ANWAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'A037', 'ASBUN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'A038', 'AMAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'A039', 'AHONG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 'A040', 'ARYATAMA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 'A041', 'ANTONIUS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 'A042', 'AKBAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 'A043', 'ALEX', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 'A044', 'ANTON', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 'A045', 'ANJAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 'A046', 'ANTORO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 'A047', 'ATEX', 'IBU SOETIASEM', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 'A048', 'ALUNG', 'BP. ALUNG', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 'A049', 'ARIFIN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 'A050', 'ASMAMAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 'A051', 'ABADI BARU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 'A052', 'ASENG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, 'A053', 'AGUS SURYANA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, 'A054', 'ANDRY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 'A055', 'ANDICO LESTARI MANDIRI', 'ANWARDI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 'A057', 'ALFA TEKNIK', 'BP. DEDI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, 'A058', 'ALFA DATA COMPUTER', 'BP. AKWET', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, 'A059', 'ALFRES', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, 'A060', 'ANAS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 'A061', 'ANWAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 'A062', 'ABDUL SUKUR', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 'A063', 'AWIE', 'BP. AWIE', '__.___.___._.___.___', '', '', '', '', 'SUNTER\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 'A072', 'AKA. P. T', 'DEDE', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 'A073', 'ASIKIN', '', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 'A074', 'ARIKO LOGAM', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 'A075', 'AGUS PURWOKERTO', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 'A076', 'ANDI MERI S.', 'ANDI', '__.___.___._.___.___', '', '', '', '', 'BANDUNG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, 'A077', 'ALDO TOKO', 'IBU VINA', '__.___.___._.___.___', '021-62306655', '081513017827', '', '', 'PUSAT GROSIR PASAR PAGI MANGGA DUA LT DASAR BLOK D 002B JAKARTA UTARA 14430\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 'A078', 'ABU', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 'A079', 'ADI LOGAM , UD', 'ADI PUTRA S.', '__.___.___._.___.___', '', '', '', '', 'CIBINONG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 'A080', 'ATLANTIK', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 'A081', 'ABDUL ROHMAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 'A082', 'ASMOYASARI JAYA, UD', 'H. ARSIK', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, 'A083', 'ASTRA INTERNATIONAL TBK, PT.', 'BAPAK MARIANTO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, 'A084', 'AYUB KUSUMA', 'AYUB', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, 'A085', 'ANWAR SUPRIYANTO', '', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, 'A086', 'ALPO SEJAHTERA, PT.', '', '__.___.___._.___.___', '', '', '', '', 'PECENONGAN RAYA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, 'A087', 'AKANG', 'AKANG', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, 'A088', 'AMENG', '', '__.___.___._.___.___', '', '', '', '', 'PEKAN BARU\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, 'A090', 'AYONG', '', '__.___.___._.___.___', '', '', '', '', 'MEDAN\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, 'A091', 'A BOK', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, 'A092', 'ANDI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, 'A093', 'ANTO', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, 'A094', 'ANGGA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, 'A095', 'AULIA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(86, 'A096', 'ANWAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(87, 'A097', 'ARSHIYA METAL JAYA, CV.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(88, 'A098', 'ANG SUN PLASTIK, PT.', '', '03.325.089.5.416.000', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(89, 'A099', 'ANDI ANTO', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(90, 'A100', 'AFIT JAYA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(91, 'A101', 'ALI LOGAM, UD', '', '__.___.___._.___.___', '', '', '', '', 'SEMARANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(92, 'A102', 'ANUGRAH BANGUN PERKASA, CV', 'JOKO W', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(93, 'A103', 'ANDIKA TEGUGSETYA, PT.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(94, 'A104', 'ASMOYA JAYA', 'ARDIAN SHAH', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(95, 'A888', 'ADJUSMENT', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(96, 'A999', 'APOLLO', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(97, 'B001', 'BARA LOGAM, P.T.', 'HALIM', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(98, 'B002', 'BONA INDAH', '', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(99, 'B003', 'BENGKEL TJOKRO, P.T.', 'NANDANG', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(100, 'B004', 'BANGKA JAYA TEKNIK', 'AMIAW', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(101, 'B005', 'BENGKEL BUBUT BUDAYA', 'BP. EDO, IBU AMYLIA', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(102, 'B006', 'BANDUNG', 'BP. MINTARDJA SALIM', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(103, 'B007', 'BAMBANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(104, 'B008', 'BAHRUDIN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(105, 'B009', 'BERKAT PARAM BAKTI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(106, 'B010', 'BUDIONO', 'BUDIONO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(107, 'B011', 'BUANA BINTANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(108, 'B012', 'BERDIKARI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(109, 'B013', 'BERINDO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(110, 'B014', 'BUDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(111, 'B015', 'BAHRI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(112, 'B016', 'BUDINATA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(113, 'B017', 'BAJA ABADI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(114, 'B018', 'BAYU', 'ERWIN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(115, 'B019', 'BICC BERCA CABLES, P.T', 'ANDRE', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(116, 'B020', 'BINTANG BARU', 'ANDI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(117, 'B021', 'BAJA MAS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(118, 'B022', 'BINTANG MAS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(119, 'B023', 'BUDIONO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(120, 'B024', 'BUDI LOGAM', 'BP. ASUN/SONI', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(121, 'B025', 'BENI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(122, 'B026', 'BANGUN JAYA', 'BP. AKIONG', '__.___.___._.___.___', '', '', '', '', '\r\nCIKARANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(123, 'B029', 'BUANA SUKSES BERSAMA, P. T.', 'IBU NADINE', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(124, 'B030', 'BEST SUN INDONESIA PT', 'LINCE/DEWI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(125, 'B031', 'BRONZEDIOR DAYA MANDIRI', 'NITA/OMAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(126, 'B032', 'BENGKEL ENDAH', 'JOY SANJAYA', '__.___.___._.___.___', '', '', '', '', 'BANDUNG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(127, 'B033', 'BENGKEL SHANGHAI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(128, 'B034', 'BANGKIT TRI FAMILY, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(129, 'B035', 'BINTANG SERAYU, C. V', 'BPK DIDI', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(130, 'B036', 'BAROKAH MANDIRI LOGAM', 'MULYATRIES', '__.___.___._.___.___', '', '', '', '', 'BOGOR\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(131, 'B037', 'BADRUS SHOLEH', 'BADRUS SHOLEH', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(132, 'B038', 'BUMI WIJAYA INDORAIL, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(133, 'B040', 'BIMANTIO', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(134, 'B041', 'BUANA SUKSES BERSAMA, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(135, 'C001', 'CANGGIH PRESISI, P.T.', 'DEWI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(136, 'C003', 'CIPTA CETAK, P.T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(137, 'C004', 'CHEMTRACO SENTOSA, P. T.', 'ENY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(138, 'C005', 'CASH', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(139, 'C006', 'CATUR MITRA', 'MULIA', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(140, 'C007', 'CHEMACO CEMICAL', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(141, 'C008', 'COKRO', 'ALAY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(142, 'C009', 'C.V. ECHO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 'C010', 'CIPTA PRINTING', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 'C011', 'CAHAYA BARU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 'C012', 'CHARLES', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 'C013', 'COKY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 'C014', 'CKE TEKNIK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, 'C015', 'CAHAYA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 'C016', 'CV. CITRA NUSANTARA MANDIRI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 'C017', 'CAHAYA CROME, P.T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 'C018', 'CAHYADI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 'C019', 'CHANDRA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 'C020', 'CIPTO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 'C021', 'CAHAYA TERANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 'C022', 'CITRA SELARAS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 'C023', 'CITRA NUSA CEMERLANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 'C024', 'CEMERLANG', 'NUZWAR', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 'C025', 'CAHAYA PRIMA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 'C026', 'CAHYO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 'C027', 'CIKUPA MEGAH KENCANA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 'C028', 'CIPTA BARU', 'BP. IWAN', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 'C029', 'CHEN HSI JAYA PERKASA', 'JIMMY', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 'C030', 'CITRA NIAGA', 'DEWI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 'C031', 'CENTRAL CRANE', 'ERIK', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 'C033', 'CENTRAL DIESEL', 'SOBIRIN', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 'C034', 'COMETAL, C. V', 'BPK LUTFI', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 'C035', 'CAKRA JAYA (BEWOK)', '', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 'C036', 'CENTRAL METAL', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 'C037', 'CCTV 21.COM', '', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 'C038', 'CRISTINE', 'CRISTINE', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 'D001', 'DAYA CIPTA TEKNIK, P.T.', 'YUSUF', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 'D002', 'DUTA MANDIRI', 'GANDI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 'D003', 'DUTA BAN CENTER', 'BUDIMAN', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 'D004', 'DAMINDO, P. T.', 'LUCY', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 'D005', 'DUNIA JAYA', 'HERIANTO', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 'D006', 'DEDEN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 'D007', 'DIGI INDONESIA NUSANTARA, P. T.', 'ROHIM', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 'D008', 'DUDUNG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 'D009', 'DONI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 'D010', 'DWI JAYA, C.V.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 'D011', 'DARMADI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 'D012', 'DUTA CARBON', 'UTORO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 'D013', 'DAIM', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 'D014', 'DIHAN PUTRA PERKLASA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 'D015', 'DESVANTRI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 'D016', 'DANANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 'D017', 'DEWI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 'D018', 'DICKY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 'D019', 'DIDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 'D020', 'DADANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 'D021', 'DADI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 'D022', 'DASUKI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 'D023', 'DEMI SANTOSO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 'D024', 'DUTA MANDIRI MOTOR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 'D025', 'DUTA MANDIRI TEKNIK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, 'D026', 'DARMA UTAMA, P.D.', 'JUNAEDI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, 'D027', 'DARMINTO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, 'D028', 'DENKY SHOJI', 'BP.SOFYAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, 'D032', 'DWI CENTRO PERKASA PT.', 'LIBRI ANTIKA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, 'D034', 'DUASATU CCTV', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, 'D035', 'DENKI SHOJI CO.,LTD,', 'BPK EFENDI', '__.___.___._.___.___', '', '', '', '', 'JAPAN\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, 'D036', 'DIESEL JAYA', 'BPK ACENG', '__.___.___._.___.___', '', '', '', '', 'JL. TAMAN SARI RAYA NO. 10 JAKARTA 11160\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, 'D037', 'DAAN MOGOT BAN', 'JOHN YOSEF', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, 'D038', 'DUTA LISTRIK GRAHA PRIMA, PT.', 'ANDRI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, 'D040', 'DEYANG JIECHUANG WIRE & CABLE MACHINERY CO.,LTD', 'MA JIA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(206, 'D041', 'DSL INDONESIA , PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(207, 'D043', 'DYAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(208, 'D044', 'DIANA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(209, 'D045', 'DATACOMM DIANGRAHA, PT', 'JUWITA NATASIA', '__.___.___._.___.___', '021-29979797', '081325464519', '', '', 'JL.KAPTEN TENDEAN NO.18 A \r\nJAKARTA 12790\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(210, 'E001', 'EKO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(211, 'E002', 'ERASINDO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(212, 'E003', 'ENDANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(213, 'E004', 'EFENDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(214, 'E005', 'ENDRO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(215, 'E006', 'ELKOM NUSANTARA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(216, 'E007', 'EDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(217, 'E008', 'ENI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(218, 'E009', 'EAGLE EXPRESS LINES OF MERALCO STA MESA, MANILA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(219, 'E011', 'EKATAMA MANDALAWIRA, P. T', 'BPK SETIAWAN', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(220, 'E012', 'EKASAPTA HIDUPMAJU, PT.', '', '__.___.___._.___.___', '', '', '', '', 'SURABAYA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(221, 'E013', 'EKA JAYA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(222, 'F001', 'FREDY CHANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(223, 'F002', 'FIRDAUS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(224, 'F003', 'FUSENG INDONESIA', 'ROSMA', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(225, 'F004', 'FANDY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(226, 'F005', 'FUJI ELECTRIC', 'BP. DWI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(227, 'F006', 'FAJAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(228, 'F007', 'FREDY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(229, 'F008', 'FATUR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(230, 'F009', 'FAN TEKNIK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(231, 'F010', 'FAJRI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(232, 'F011', 'FAI JAYA', 'BP.ABDUL FAKKAR', '__.___.___._.___.___', '021-8231335', '', '', '', 'JL. CILEUNGSI SETU RT/RW.01/01 DS. LIMUSNUNGGAL CILEUNGSI BOGOR\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(233, 'F012', 'FASA ABADI TEKNIK', 'SUBAKIR/AGUSTINUS', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(234, 'F013', 'FORUM INDONESIA', '-', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(235, 'F014', 'FATEK SOLUSINDO, P. T', 'BPK SUTRISNO', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(236, 'F015', 'PETRA ERKA PERKASA, P. T', 'BPK HERU', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(237, 'F016', 'FURIN JAYA, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(238, 'F017', 'FRAJI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(239, 'G001', 'GORA MITRA SEJATI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(240, 'G002', 'GUNADI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(241, 'G003', 'GUNAWAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(242, 'G004', 'GLEN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(243, 'G005', 'GRACIA LOGAM', 'DANIL', '__.___.___._.___.___', '', '', '', '', '\r\nPALEM\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(244, 'G006', 'GUNUNG BARU', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(245, 'G007', 'GRAFINDO ARTAPERSADA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(246, 'G008', 'GLOBISSYS INDONESIA', 'BUDI.', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(247, 'G009', 'GAYA ABADI SEMPURNA, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(248, 'G010', 'GEGANA PUTRA LOGAM, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(249, 'G011', 'GRACIA ABADI PT.', 'BP.DAVID', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(250, 'G012', 'GRACIA TEHNIK', 'BPK. HENDI', '__.___.___._.___.___', '021-99700032', '021-33777072', '', '', 'JL. HALIM PERDANA KUSUMA NO. 85 JURUMUDI BENDA TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(251, 'G013', 'GRAFINDO', '', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(252, 'G014', 'GARUDA GEARING', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(253, 'G015', 'GANAMAS PRIMA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(254, 'G017', 'GUNAWAN WIJAYA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(255, 'G999', 'GUDANG BARANG JADI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(256, 'H001', 'HIDUP BARU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(257, 'H002', 'HASTAR PRINTING', 'HENNY', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(258, 'H003', 'HERMANTO', 'HERMANTO', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(259, 'H004', 'HENNY', 'IBU SARI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(260, 'H005', 'HARYONO', 'HARYONO', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(261, 'H006', 'HARAPAN JAYA', 'SAEJI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(262, 'H007', 'HAJI USMAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(263, 'H008', 'HERMAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(264, 'H009', 'HASAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(265, 'H010', 'H. SUTAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(266, 'H011', 'H. RAMLI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(267, 'H012', 'H. IBNU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(268, 'H013', 'H. WAHIDIN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(269, 'H014', 'HENDRI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(270, 'H015', 'HENDRA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(271, 'H016', 'H. AHMAD', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(272, 'H017', 'HIMAWAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(273, 'H018', 'HAM,BALI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(274, 'H019', 'H.P METALS INDONESIA', 'BP. RONNY', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(275, 'H020', 'H. ANSORO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(276, 'H021', 'HASBULAH', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(277, 'H022', 'H. ABDULLAH', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(278, 'H023', 'HUSNI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(279, 'H024', 'HANDOYO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(280, 'H025', 'HASIDIN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(281, 'H026', 'HASAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(282, 'H027', 'HAMBYAH', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(283, 'H028', 'HEMEL ELECTRICK', 'LIA/HERMAN', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(284, 'H029', 'HUTAMA AGUNG LESTARI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(285, 'H030', 'HAKIM', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(286, 'H031', 'HENGKY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(287, 'H032', 'HALIM', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(288, 'H033', 'HARYADI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(289, 'H034', 'HARTA PERINDO SEJAHTERA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(290, 'H035', 'HERU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(291, 'H036', 'HJ. NIDI', '', '__.___.___._.___.___', '', '', '', '', 'TANGERANG.\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(292, 'H037', 'HARTONO SUBAGYO', '', '__.___.___._.___.___', '', '', '', '', 'SURABAYA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(293, 'H038', 'HJ. SOLEH', 'HJ. SOLEH', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(294, 'H039', 'HAKIMAN', 'BP. HAKIMAN', '__.___.___._.___.___', '', '', '', '', 'tangerang\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(295, 'H040', 'H.IBRAHIM', 'H.IBRAHIM', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(296, 'H041', 'HAO SENG PT', 'ROSMA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(297, 'H043', 'HENRY TEKNIK UTAMA PT', 'SUPRATMAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(298, 'H044', 'HIAN STEEL PERKASA', 'SUPRATMAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(299, 'H045', 'HUGO METAL LANCAR JAYA, P. T', 'IBU LIA', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(300, 'H046', 'HENDRA PRATAMA, CV.', '', '__.___.___._.___.___', '', '', '', '', 'PALEMBANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(301, 'H047', 'HILMAWAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(302, 'H048', 'HARYANTO', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(303, 'H049', 'HANWA ROYAL METALS, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(304, 'H050', 'HERRIE', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(305, 'H051', 'HAIRUL', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(306, 'H052', 'H. JASULI', 'JAKARTA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(307, 'I001', 'IKA WIRA NIAGA', 'AGUS', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(308, 'I002', 'INDO SUPER KENCANA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(309, 'I003', 'INDAH JAYA', 'HANI', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(310, 'I004', 'INTI GELORA SETIA', 'BPK ADI', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(311, 'I005', 'INDO LOGAM', 'BP. JHONI SETIAWAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(312, 'I006', 'IMAM', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `pic`, `npwp`, `telepon`, `hp`, `fax`, `e_mail`, `alamat`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(313, 'I007', 'IWAN', 'HARRIES CANDRA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(314, 'I008', 'INDO BATA  API', 'HENDRA', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(315, 'I009', 'IRWAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(316, 'I010', 'INNOVA INDONESIA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(317, 'I011', 'INDOPORLEN, P.T.', 'MUCHLIS', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(318, 'I012', 'IMRAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(319, 'I013', 'IRNA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(320, 'I014', 'IDEALFORMICA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(321, 'I015', 'INDOKA JAYA, P.T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(322, 'I016', 'INDOKA KARYA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(323, 'I017', 'IPUNG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(324, 'I018', 'ISMOYO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(325, 'I019', 'IMORA, P.T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(326, 'I020', 'IVAN', 'BP. IVAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(327, 'I021', 'INDO KAWAT', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(328, 'I022', 'INDO KAWAT SUKSES, P.T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(329, 'I023', 'IBNU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(330, 'I024', 'INDOVISION', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(331, 'I025', 'INDAH LESTARI LOGAM, P.T.', 'IBU LENNA WATI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(332, 'I026', 'INDO CITRA BAJA SEMPANA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(333, 'I027', 'INTERINDO UTAMA, CV.', 'SYAHRUL', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(334, 'I028', 'INCAP ALTIN UTAMA, P.T.', '', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(335, 'I029', 'INDUSTRIAL MULTI FAN', 'TAUFIK', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(336, 'I030', 'INTAN MANDIRI, CV', 'NURHASAN', '__.___.___._.___.___', '', '', '', '', 'BEKASI\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(337, 'I031', 'INDOKARYA MANDIRI', 'IBU THERESIA', '__.___.___._.___.___', '021-55775515', '021-55774473', '021-55774902', '', 'KOMP RUKO BANJAR WIJAYA BLOK B1/28 JLN. KH. HASYIM ASHARI\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(338, 'I032', 'INTI LINGGA SUKSES, P. T', 'RUDY ANTO', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(339, 'I033', 'INDOKITA MAKMUR, P. T', 'IBU SILVIA', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(340, 'I036', 'IFAN HERMAWAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(341, 'I037', 'IZAKUIKI TEHNIK SOLUSI, CV', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(342, 'I038', 'IRAWAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(343, 'I039', 'INTAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(344, 'I040', 'ISHIKAWA METALS INDONESIA, CV.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(345, 'J001', 'JAYACON PANEL UTAMA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(346, 'J003', 'JAYA READY MIX, P.T.', 'IBU YENI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(347, 'J004', 'JALI INDONESIA UTAMA', 'VANY', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(348, 'J005', 'JAYA MANDIRI', 'BAYU', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(349, 'J006', 'JECCO UTAMA MANDIRI, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(350, 'J007', 'JOKO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(351, 'J008', 'JIMMY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(352, 'J009', 'JATI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(353, 'J010', 'JALY INDONESIA UTAMA, P. T.', 'FANI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(354, 'J011', 'JASA SCRAFOLDING', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(355, 'J012', 'JENI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(356, 'J013', 'JASA LESTARI, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(357, 'J014', 'JAYATAMA MEGAH PERKASA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(358, 'J016', 'JAYA BERSAMA TEKNIK', 'BP. IWAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(359, 'J017', 'JC UTAMA TEKNIK INDONESIA PT', 'ANTON', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(360, 'J018', 'JOY ( BENGKEL ENDAH )', '', '__.___.___._.___.___', '', '', '', '', 'Jl. Padalarang No. 54 Bandung\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(361, 'J019', 'JUNG LIE', 'JUNG LIE', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(362, 'J020', 'JASA SARANA TEHNIK', 'BPK SOBIRIN', '__.___.___._.___.___', '021-33354837', '', '021-53671460/5362803', '', 'BINONG LIPPO KARAWACI BLOK BB 38/8 TANGERANG BANTEN\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(363, 'J021', 'JUANA LOGAM', 'SABAR', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(364, 'J022', 'JUDA TERUNA, P. T', 'IBU YANNI', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(365, 'J023', 'JAYA HATI, UD', 'UJANG', '__.___.___._.___.___', '', '', '', '', 'CAKUNG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(366, 'J024', 'JUANA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(367, 'J025', 'JOHNI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(368, 'J026', 'JAYA REFRACTORINDO UTAMA, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(369, 'J027', 'JACK LESMANA', 'IBU ASIAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(370, 'J028', 'JAYA LOGAM, CV.', 'MINARTO', '__.___.___._.___.___', '', '', '', '', 'PEKAN BARU', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(371, 'K001', 'KARYA METAL, P. T.', 'SRI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(372, 'K002', 'KAWI MAS', 'TITI, AMIAW', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(373, 'K003', 'KHARISMA ABADI', 'IBU SELFI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(374, 'K004', 'KARYA NUSA', 'ACHMAD', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(375, 'K005', 'KUSNAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(376, 'K006', 'KUAT', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(377, 'K007', 'KRISTI JAYA', 'IBU SRI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(378, 'K008', 'KRANTZ THERMO TECHNOLOGY INTERNATIONAL', 'MERLYN', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(379, 'K010', 'KURNIA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(380, 'K011', 'KASTOR & WHEEL INDONESIA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(381, 'K012', 'KOLIK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(382, 'K013', 'KARYA MOTOR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(383, 'K014', 'KEMBAR TEKNIK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(384, 'K015', 'KOMIKO JAYA IMEXINDO, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(385, 'K016', 'KANU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(386, 'K017', 'KARYADINAMIKA ANUGRAHPRIMA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(387, 'K018', 'KARUNIA JAMBU DIPA', 'BP. VINCENTIUS AAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(388, 'K019', 'BP. KUSWANDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(389, 'K020', 'KARUNIA ELEKTRINDO, P. T', 'BP. LEO', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r\n\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(390, 'K022', 'KUARTA PUTRA PRATAMA', 'ANTON', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(391, 'K023', 'KHARISMA BEARING', 'MIRA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(392, 'K024', 'KUMALA JAYA INTERNUSA PT.', 'RETNO', '__.___.___._.___.___', '021-65303174', '', '021-6516174', '', 'COMPLEKS RUKO NIRWANA ASRI BLOK J2 NO.35 SUNTER PARADISE  JAKARTA UTARA\r\n\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(393, 'K025', 'KARBINDO ALAM PRIMA PT', 'EVA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(394, 'K028', 'KAMAJAYA ANEKA LESTARI, P.T', '', '__.___.___._.___.___', '02175881838', '', '02175881839', '', 'TAMAN TEKNO BSD TAHAP III SEKTOR 11 BLOK A1 NO. 7 SERPONG TANGERANG 15314\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(395, 'K029', 'KUMALA SAKTI, PD', 'BPK EDI', '__.___.___._.___.___', '', '', '', '', 'JAKPUS\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(396, 'K071', 'KALASINDO PRIMA SEJAHTERA, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(397, 'K072', 'KARYA TEGUH METAL JAYA, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(398, 'K073', 'KLOVA GLOBAL MANDIRI, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(399, 'K074', 'KANO ROD AND WIRE, CV.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(400, 'K075', 'KALIMAN, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(401, 'K999', 'KUPAS', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(402, 'L001', 'LAUTAN LUAS/INDONESIAN ACIDS INDUSTRY', 'LINA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(403, 'L002', 'LAUTAN BERLIAN', 'SUPRIYONO', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(404, 'L003', 'LOGAM KENCANA', 'IBU YETTY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(405, 'L004', 'LOGAM HENDASY PUTRA', 'HENDRA N.', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(406, 'L005', 'LOGAM MANDIRI', 'BP. TEDDY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(407, 'L006', 'LUMBUNG BERKAH', 'ECI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(408, 'L007', 'LUCKY STAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(409, 'L008', 'LEO TEKNINDO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(410, 'L009', 'LIA LINTAS, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(411, 'L010', 'LOGAM KARISMA, PT.', 'BP.AKIONG', '__.___.___._.___.___', '', '', '', '', 'CIKARANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(412, 'L011', 'LOGAM NIAGA, C.V.', 'BP. SUKIANTO. S.', '__.___.___._.___.___', '', '', '', '', 'SERPONG - TANGERANG. BANTEN.\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(413, 'L012', 'LILI', 'LILI', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(414, 'L013', 'LITA JAYA', 'KIK', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(415, 'L014', 'LEO', 'LEO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(416, 'L015', 'LORINA COLLECTION', '', '__.___.___._.___.___', '021-62300895', '', '021-6016540', '', 'JL. MANGGA DUA RAYA ( ITC ) LT 1 BLOK D NO. 14 JAKARTA UTARA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(417, 'L016', 'LESTARI ELECTRIC', 'IBU LINA', '__.___.___._.___.___', '021-5389857', '', '021-53156785', '', 'RUKO VILLA MELATI MAS BLOK B10 NO. 20 SERPONG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(418, 'L017', 'LESMANA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(419, 'L018', 'LUBIS', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(420, 'L019', 'LING YING SEJAHTERA, CV.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(421, 'M001', 'MASA ELECTRONIC', 'AFAT', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(422, 'M002', 'MULIA', 'ASENG', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(423, 'M003', 'MENARA RAJAWALI', 'DEBY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(424, 'M004', 'MULTI TEKNIK, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(425, 'M005', 'MATRAMAN TIRTA MURNI', 'BP. GUNARTO', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(426, 'M006', 'MITRA SEJUK SELARAS', 'JEMI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(427, 'M007', 'MR. CHEN', 'MR. CHEN AN LAO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(428, 'M008', 'MAKMUR SEJAHTERA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(429, 'M009', 'MULTI SUKSES', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(430, 'M010', 'MULYADI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(431, 'M011', 'MUGI,P.T.', 'PRAPTO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(432, 'M012', 'MEIWA PACK INDONESIA', 'LILI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(433, 'M013', 'MANDANI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(434, 'M014', 'MEKAR JAYA ABADI, P.T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(435, 'M015', 'MULTI METALINDO, P. T.', 'CLAUDIA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(436, 'M016', 'MARELLI TEHNIK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(437, 'M017', 'MULYONO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(438, 'M018', 'MALIK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(439, 'M019', 'MAKMUR INDAH KEMASINDO, P.T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(440, 'M020', 'MULA SAKTI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(441, 'M021', 'MARKUS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(442, 'M022', 'MUHAMAD', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(443, 'M023', 'MASKUN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(444, 'M024', 'MANTAP', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(445, 'M025', 'MEITA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(446, 'M026', 'MANSYUR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(447, 'M027', 'MUMUNG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(448, 'M028', 'MITRA LOGAM', 'BP. HALIM', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(449, 'M029', 'MAJU BERSAMA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(450, 'M030', 'MAKMUR SENTOSA', 'WILLIAM', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(451, 'M031', 'MAKMUR ABADI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(452, 'M032', 'MITRA MANDIRI', 'TOUFIK', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(453, 'M033', 'MEGA SAKTI,P. D.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(454, 'M034', 'MITRA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(455, 'M035', 'MULTILAP ADISURYA MANDIRI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(456, 'M036', 'MAKFUD', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(457, 'M037', 'MUNAWAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(458, 'M038', 'MINCE', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(459, 'M039', 'MAKITA MEGA MAKMUR, P. T', '', '__.___.___._.___.___', '', '', '', '', 'JAKARTA.\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(460, 'M045', 'MEGA WIJAYA', 'BP. FAISAL', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(461, 'M047', 'MESINDO TEHNIK', 'BAMBANG', '__.___.___._.___.___', '', '', '', '', 'JAKARTA TIMUR\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(462, 'M048', 'MASTRAINCO SURYA DAYA', 'ROHIM', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(463, 'M051', 'MW CHEMINDO PT', 'DHONY SUSANTO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(464, 'M052', 'MULTI LOGAM', 'MURATNO (ADE)', '__.___.___._.___.___', '', '', '', '', 'SURABAYA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(465, 'M053', 'MITRA KERJA', 'TAN PENG AN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(466, 'M054', 'MITRA USAHA LOGAM', 'TATANG', '__.___.___._.___.___', '', '', '', '', 'CIBODAS TANGERANG', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(467, 'M055', 'MARUTO', 'MOH. MARUTO', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(468, 'M056', 'MULTI ARTA ABADI', 'UPI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(469, 'M057', 'MULTI STEELINDO PERKASA', 'SUPRATMAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(470, 'M059', 'MANDIRI LOGAM', 'YAYAN', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(471, 'M060', 'METAL RECYCLING INDONESIA, CV', 'BENNY', '__.___.___._.___.___', '', '', '', '', 'TANJUNG PRIUK\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(472, 'M061', 'MUHDI', '', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(473, 'M062', 'MULIA PRATAMA BEARINDO, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(474, 'M063', 'METAL ALL HASIL , UD', 'ARIF EFENDI', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(475, 'M064', 'MEDYANTO', 'MEDYANTO', '__.___.___._.___.___', '', '', '', '', 'PALEMBANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(476, 'M065', 'MITRA LOGAM CV.', 'BP. ASAN', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(477, 'M066', 'MAJU ELECTRIC GIRINDO, PT.', 'HALIM', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(478, 'M067', 'MEYDI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(479, 'M068', 'MASTERINDO LOGAM TEHNIK JAYA, PT.', '', '__.___.___._.___.___', '', '', '', '', 'PADALARANG\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(480, 'M070', 'MINANG', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(481, 'M071', 'MULTICOM PERSADA INTERNASIONAL, PT.', 'ZIPORA ARNI', '__.___.___._.___.___', '021-29516202', '', '', '', 'JLN.DAAN MOGOT KM 21 NO.1\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(482, 'M072', 'MITRA TEMBAGA UNGGUL, CV.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(483, 'M073', 'MENEMBUS BATAS, PT.', 'JAY KUMAS', '__.___.___._.___.___', '', '', '', '', 'JL. HUSEN SASTRANEGARA NO. 100 BENDA TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(484, 'N001', 'NEW ASIA', 'ANTHONY CHANG', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(485, 'N002', 'NANANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(486, 'N003', 'NUGROHO', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(487, 'N004', 'NANAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(488, 'N005', 'NURDIN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(489, 'N006', 'NURHADI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(490, 'N007', 'NASIMA PERSADA NUSANTARA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(491, 'N008', 'NAGASENA ADILESTARI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(492, 'N009', 'NUSA ABADI,P.T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(493, 'N010', 'NUGRAH TAMA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(494, 'N011', 'NAUFALINDO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(495, 'N012', 'NANCY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(496, 'N013', 'NUR', 'BP. NUR', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(497, 'N015', 'NURHAYATI LOGAM MANDIRI', 'HJ. HARUN', '__.___.___._.___.___', '', '', '', '', 'Jl. Raya cacing no. 61 Jakarta Utara\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(498, 'N017', 'NOVINDOJAYA PRATAMA MANDIRI, P. T', 'IBU KANTI', '__.___.___._.___.___', '021-55952326', '', '021-55951790', '', 'JLN. KAMAL RAYA (OUTER RING ROAD) TAMAN PALEM LESTARI BLOK AA1 NO. 6A CENGKARANG BARAT JAKARTA BARAT\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(499, 'N018', 'NAWIR RAMLI', 'BP. MUKTAR', '__.___.___._.___.___', '', '081932336446', '', '', 'TANJUNG PRIOK\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(500, 'N019', 'NURHAYATI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(501, 'N020', 'NANDA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(502, 'O001', 'OMETRACO ARYA SAMTA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(503, 'O002', 'ONE HEART', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(504, 'O003', 'ORLIKON', 'BP. ORLIKON', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(505, 'O004', 'OCEAN BEARING', 'IBU MERLIN', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(506, 'O006', 'OKAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(507, 'O007', 'OKI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(508, 'P001', 'POMALA BINA TAMA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(509, 'P002', 'PERTAMINA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(510, 'P004', 'PUJI LESTARI', 'ROBERT', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(511, 'P005', 'PURI COMPUTER', 'LIMANTORO', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(512, 'P006', 'PRIMA INDAH LESTARI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(513, 'P007', 'PRABA WIRA DEWATA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(514, 'P008', 'PRISMA CABLE MITRATAMA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(515, 'P009', 'PALM SEMESTA', 'HERRY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(516, 'P010', 'PANCADAYA MANUNGGAL SENTOSA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(517, 'P011', 'PRESISI, P. T.', 'WATI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(518, 'P012', 'PURNAMA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(519, 'P013', 'PIPIT', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(520, 'P014', 'PRIMA LOGAM', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(521, 'P015', 'PENTA NIAGA CEMERLANG, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(522, 'P016', 'PRIMA JASA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(523, 'P017', 'PETROMITRA PACIFIC, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(524, 'P018', 'PRIMA MITRA ELEKTRINDO, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(525, 'P019', 'PAJA RAYA MOTOR, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(526, 'P020', 'PRYSMIAN CABLES INDUSTRI, P. T.', '', '__.___.___._.___.___', '(021) 5901453', '', '', '(021) 5901455', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(527, 'P021', 'PUTRA GESANG', 'ABDUL SYUKUR', '__.___.___._.___.___', '', '', '', '', 'BATU JAYA - TANGERANG. BANTEN\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(528, 'P025', 'PRIMA CABLE INDO, P.T.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(529, 'P026', 'PUTRA USAHA', 'BP. LASDIANTO', '__.___.___._.___.___', '', '', '', '', 'DESA PATI, JAWA TENGAH\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(530, 'P027', 'PUTRA TEKNIK', 'YULIANTO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(531, 'P028', 'PUTRA ABADI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(532, 'P029', 'PRIMA MEGAH CV', 'ROMY LIMIJAYA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(533, 'P030', 'PROTEKINDO MITRA UTAMA PT', 'BPK IVAN', '__.___.___._.___.___', '021-32714774', '', '021-70917233', 'pmu2008@yahoo.com', '\r\nJLN. RADEN SALEH NO. 14 LT. 3 KENARI SENEN JAKARTA 10430\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(534, 'P031', 'PRIMA JAYA MAKMUR, C.V', 'BPK ACHMAD', '__.___.___._.___.___', '95869663, 59431324', '081219555516', '59430326', '', '\r\nVILLA BALARAJA BLOK F1 NO. 1 TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(535, 'P032', 'PROTECH JAYA ABADI', 'BPK HADI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(536, 'P033', 'PUSACO INTERNATIONAL, P. T', 'BPK RAHMADI', '__.___.___._.___.___', '021-29374188', '', '021-29374288', '', 'JL. RE MARTADINATA RUKO MAHKOTA ANCOL BLOK B NO. 9 JAKUT \r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(537, 'P035', 'PARAHITA PRIMA SENTOSA, PT.', 'WINDY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(538, 'P036', 'PANI, P. T.', 'CHRISTINE', '__.___.___._.___.___', '', '', '', '', 'JL. RAYA PRANCIS NO. 2 BLOK M 30 KP PANTAI INDAH DADAP\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(539, 'P037', 'PANDAWA  UD', 'TEDI', '__.___.___._.___.___', '', '08122131214', '', '', 'JL. IRIGASI DESA CIKULAK - CIREBON\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(540, 'P038', 'PRIMA KAWAT MANDIRI, CV.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(541, 'P039', 'PINEM DAIRI LOGAM, UD', '', '__.___.___._.___.___', '', '', '', '', 'SEMARANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(542, 'P999', 'PUNGUTAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(543, 'Q001', 'QUARTO SKALA INDONESIA', 'SYAHRUL', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(544, 'R001', 'RICKY', 'BP. RICKY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(545, 'R002', 'RUSDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(546, 'R003', 'RUDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(547, 'R004', 'RUSLAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(548, 'R005', 'RIDWAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(549, 'R006', 'RONI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(550, 'R007', 'RUSMIN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(551, 'R008', 'RUSMANTO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(552, 'R009', 'RUSLI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(553, 'R010', 'RANITA SALI KABELTAMA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(554, 'R011', 'RINTO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(555, 'R012', 'ROBERT', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(556, 'R013', 'RIANTO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(557, 'R014', 'RITA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(558, 'R015', 'RICKY YUNARA', 'BP. RICKY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(559, 'R016', 'RUSTAM', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(560, 'R017', 'RINA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(561, 'R018', 'RAMLI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(562, 'R019', 'RIA M', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(563, 'R020', 'RIA SARANA', 'IBU SELVI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(564, 'R021', 'RAFLI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(565, 'R022', 'RIAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(566, 'R023', 'RAJAWALI NUSINDO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(567, 'R024', 'SUMBER MAKMUR, P.T', 'BP. RUDY', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(568, 'R025', 'PD. ROFA ELECTRIC', '', '__.___.___._.___.___', '021.46833571', '', '', '', 'JL.DR. KART RAJIMAN WIDYODININGRAT\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(569, 'R030', 'RIZKI LOGAM', '', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(570, 'R031', 'RIZKI MANDIRI', 'NUR KHOLIS', '__.___.___._.___.___', '', '', '', '', 'PONDOK GEDE\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(571, 'R032', 'ROYAL PLASTIK', 'BPK EDI', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(572, 'R033', 'RANDAVE JAYA, P. D', 'BPK EDI', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(573, 'R034', 'RONALD', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(574, 'R035', 'ROSIM', '', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(575, 'R036', 'RASI', '', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(576, 'R037', 'REAGAN', '', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(577, 'R038', 'RIFKY', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(578, 'R039', 'ROSMALA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(579, 'R040', 'REGAND', 'JAKARTA', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(580, 'R999', 'ROLLING', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(581, 'S001', 'SABAR', 'HENI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(582, 'S002', 'SADIKUN NIAGAMAS RAYA, P. T.', 'SRI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(583, 'S003', 'SRIWIJAYA', 'PIE LIE', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(584, 'S004', 'SUMBER BUDI SAKTI', 'LISI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(585, 'S005', 'SUMI INDO, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(586, 'S006', 'SURYA UNGGUL', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(587, 'S007', 'SEMEN BOX, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(588, 'S008', 'SAMA JAYA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(589, 'S010', 'SUMBER JAYA', 'AFUK', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(590, 'S011', 'SELATAN TOKO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(591, 'S012', 'SETIA AGUNG SEAL', 'DESY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(592, 'S013', 'SERBA INDUSTRIAL', 'AKWET', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(593, 'S014', 'SENG LIP', 'IBU AIRIN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(594, 'S015', 'SUMBER LANCAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(595, 'S016', 'SUTARNO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(596, 'S017', 'SUTANTO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(597, 'S018', 'SULAIMAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(598, 'S019', 'SINAR BARU SURABAYA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(599, 'S020', 'SIBALEC, P. T', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(600, 'S021', 'SUMBER DAYA SINAR BARU, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(601, 'S022', 'SUMBER METALINDO INTINUSA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(602, 'S023', 'SETIA SAPTA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(603, 'S024', 'SURYA KENCANA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(604, 'S025', 'SIBALEC POWEL CABLE & E.S, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(605, 'S030', 'SINAR BARU TETAP AGUNG, P. T', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(606, 'S031', 'SIGNAL LINK NUSANTARA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(607, 'S032', 'SUCACO, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(608, 'S033', 'SURYA MITRA TEKNIK', 'LILI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(609, 'S034', 'SINAR INDAH', 'IWAN', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(610, 'S035', 'SUMBER BARU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(611, 'S036', 'SUNAN KENCANA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `pic`, `npwp`, `telepon`, `hp`, `fax`, `e_mail`, `alamat`, `m_province_id`, `m_city_id`, `kode_pos`, `m_bank_id`, `kcp`, `no_rekening`, `keterangan`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(612, 'S037', 'SANLI PARTA', 'ARIP', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(613, 'S038', 'SLS BERINDO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(614, 'S039', 'SURYANADI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(615, 'S040', 'SINAR PLASTIK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(616, 'S041', 'SURYATAMA ARTA MEGAH', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(617, 'S042', 'SUNDORO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(618, 'S043', 'SUKARDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(619, 'S044', 'SUKOCO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(620, 'S045', 'SUGANDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(621, 'S046', 'SUWARNO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(622, 'S047', 'SURYA TERANG, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(623, 'S048', 'SAMSUL', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(624, 'S049', 'SUTRISNO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(625, 'S050', 'SARANA TEKNIK INDUSTRI, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(626, 'S051', 'STEFANI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(627, 'S052', 'SUTOMO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(628, 'S053', 'SURYA INTI PRATAMA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(629, 'S054', 'SUGIMAN TINDJAU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(630, 'S055', 'SARTI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(631, 'S056', 'SINAR BARU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(632, 'S057', 'SUGENG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(633, 'S058', 'SUSILO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(634, 'S059', 'SUYANTO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(635, 'S060', 'SUTEJO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(636, 'S061', 'SUTRADO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(637, 'S062', 'SUTRA KABEL INTIMANDIRI, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(638, 'S063', 'SIGIT', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(639, 'S064', 'SURYONO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(640, 'S065', 'SUGITO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(641, 'S066', 'SEPTIAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(642, 'S067', 'SINAR BAHAGIA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(643, 'S068', 'SYSCONINDO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(644, 'S069', 'STARION', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(645, 'S070', 'SARANA MAKMUR BERSAMA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(646, 'S071', 'SINAR MAKMUR JAYA', 'KO ACUN', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(647, 'S072', 'SUKANDAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(648, 'S073', 'SUMBER REJEKI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(649, 'S074', 'SETIA MOTOR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(650, 'S075', 'SINAR SURYA ABADI', 'AHMAD', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(651, 'S076', 'SHANGHAI BENGKEL', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(652, 'S077', 'SAHABAT INDONESIA INTIMANDIRI, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(653, 'S078', 'SINAR TIMUR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(654, 'S079', 'SURYADI', 'BP. SURYADI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(655, 'S080', 'SUNARYO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(656, 'S081', 'SUPOMO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(657, 'S082', 'SIBIYANTO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(658, 'S083', 'SEMBADA MANDIRI LESTARI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(659, 'S084', 'SURYA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(660, 'S085', 'SAMSUDIN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(661, 'S086', 'SUTOPO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(662, 'S087', 'SUNARDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(663, 'S088', 'SUBROTO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(664, 'S089', 'SINAR PURNAMA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(665, 'S090', 'SUTANTO ARIFCHANDRA ELECTRIC, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(666, 'S091', 'SUMARNO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(667, 'S092', 'SUKANDAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(668, 'S093', 'SUHARNI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(669, 'S094', 'SUMBER NIAGAMAS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(670, 'S095', 'SATUMAN', 'BP. SATUMAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(671, 'S096', 'SURYA MANDIRI LOGAM, P.T.', 'BP. MURADNO', '__.___.___._.___.___', '', '', '', '', 'SURABAYA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(672, 'S097', 'SRI REJEKI, P. T.', 'IBU SOLEHA', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(673, 'S104', 'SETIA KAWAN', 'ERIK', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(674, 'S105', 'SMOOTH JAYA MANDIRI, P. T', 'BPK LUCKY', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(675, 'S106', 'SUN KING HING', 'MR.LIE', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(676, 'S108', 'SUMBER GLOBALINDO MINING , P.T.', 'INDRA', '__.___.___._.___.___', '', '', '', '', 'CIREBON\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(677, 'S109', 'SAYAP MAS PT', 'DENNY SETIAWAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(678, 'S110', 'SWIFONG MACHINERY CO.LTD', 'MEI LING LIN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(679, 'S111', 'SURYA MAKMUR SEJATI', 'OSCAR', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(680, 'S112', 'SUHERMAN', 'BP. SUHERMAN', '__.___.___._.___.___', '', '', '', '', 'PEKAN BARU\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(681, 'S116', 'SINAR JAYA', 'ANNA', '__.___.___._.___.___', '', '', '', '', 'TANJUNG PRIOK\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(682, 'S117', 'SPEEDY PRINTING', 'BPK YUDI', '__.___.___._.___.___', '021-54357004', '08561675880', '021-54356974', '', 'KOMP MUTIARA TAMAN PALEM BLOK C2/33 JAKARTA BARAT 11730 INDONESIA \r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(683, 'S118', 'SUMBER PERKASA JAYATAMA, P.T', 'BPK MARHENDI', '__.___.___._.___.___', '', '', '', '', 'GLODOK\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(684, 'S119', 'SAIMIN', 'BPK SAIMIN', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(685, 'S120', 'SARLOM SAKTI, P. T', '', '__.___.___._.___.___', '', '', '', '', 'MEDAN\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(686, 'S121', 'SANTO RUBBER FACTORY', 'IBU MARINA / BPK JUSUF SIDIK', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(687, 'S122', 'SAHABAT MITRA INTRABUANA, P. T', 'IBU NIA', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(688, 'S123', 'SEMANGAT RAYA', 'BPK JIMMY', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(689, 'S124', 'SURYA ABADI', 'BPK ANTONIO', '__.___.___._.___.___', '', '', '', '', 'JAKBAR\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(690, 'S125', 'SINAR INTI INDOPRATAMA, P. T', 'BPK ZAKARIA', '__.___.___._.___.___', '', '', '', '', 'JAKBAR\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(691, 'S126', 'SINAR SURYA P.T.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(692, 'S127', 'SURYA PLASCO, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(693, 'S128', 'SUGIH JAYA', 'SUGIARTO', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(694, 'S129', 'SIN SIN', 'BP. DANIEL', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(695, 'S130', 'SUPER METAL BANGKA JAYA ABADI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(696, 'S131', 'SINAR INTAN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(697, 'S132', 'SARANA CIPTA PERKASA, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(698, 'S133', 'SINAR ARTHA NUSA, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(699, 'S134', 'SINAR SUBUR', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(700, 'S135', 'SINAR LOGAM', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(701, 'S136', 'SAMPOERNA PRINTPACK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(702, 'S139', 'SULIS', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(703, 'S140', 'SUKMA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(704, 'S141', 'SANTI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(705, 'S142', 'SANJAYA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(706, 'S143', 'SUMBER REJEKI ALUMUNIUM', 'BP. SUNARYO', '__.___.___._.___.___', '', '', '', '', 'JL.PETA SELATAN JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(707, 'S144', 'SINAR DEWI', 'PAK AAN', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(708, 'S145', 'SABRINA', 'SABRINA', '__.___.___._.___.___', '', '', '', '', 'JAKARTA BARAT\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(709, 'S147', 'SUGIH COPPER, CV.', '', '__.___.___._.___.___', '', '', '', '', 'TANGERANG\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(710, 'S148', 'STAR COPPER NUSANTARA, CV.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(711, 'S149', 'SUKSES MITRA CHEMINDO, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(712, 'S150', 'SUARDI', '', '__.___.___._.___.___', '', '', '', '', 'SURABAYA', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(713, 'S999', 'SDM', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(714, 'T001', 'TISA, P. T.', 'BAHRI', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(715, 'T002', 'TEMBAGA MULIA SEMANAN, P. T.', 'MAN LIE/BP.HANDY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(716, 'T003', 'TALIMAS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(717, 'T004', 'TEKNIK MAKMUR', 'AGUS', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(718, 'T005', 'TUNAS PUTRA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(719, 'T006', 'TEKNO BANGKIT', 'SWARTO', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(720, 'T007', 'TRAVINDO PRIMA PERKASA', 'ACHMAD', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(721, 'T008', 'TIARA SERVICE', 'AFAT', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(722, 'T009', 'TEKKINDO CENTRA DAYA', 'ARIYANTO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(723, 'T010', 'TIRTA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(724, 'T011', 'TRITECH/BENGKEL SHANGHAI', 'ALEN', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(725, 'T012', 'THOMAS', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(726, 'T013', 'TUGU PAKULONANTHOMAS', 'BUDI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(727, 'T014', 'TONY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(728, 'T015', 'TIGAPUTRA ADHI MANDIRI, P. T', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(729, 'T016', 'TRANKA KABEL PT', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(730, 'T017', 'TIGA PUTRA JAYA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(731, 'T018', 'TIRA ANDALAN STEEL', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(732, 'T019', 'TUNGGAL JAYA PARI, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(733, 'T020', 'TONO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(734, 'T021', 'TANTOWI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(735, 'T022', 'TARUNA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(736, 'T023', 'TAMING DINAMIKA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(737, 'T024', 'TOFIK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(738, 'T025', 'TELITI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(739, 'T026', 'TEGUH', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(740, 'T027', 'TATANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(741, 'T028', 'TEBING MAS JAYAUTAMA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(742, 'T029', 'TERINDA BAKTI UTAMA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(743, 'T030', 'TRI KARYA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(744, 'T031', 'TIRTA TEKNOSYS', 'BP. SAM/BP. BOY', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(745, 'T032', 'TIGA SAUDAR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(746, 'T033', 'TERANG KITA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(747, 'T034', 'TRISNO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(748, 'T035', 'TARMIZI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(749, 'T036', 'TATANG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(750, 'T037', 'TUNAS RUANG MESIN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(751, 'T039', 'TERUS JAYA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(752, 'T040', 'TRIMUSTIKA', 'FREDY', '__.___.___._.___.___', '', '', '', '', 'JAKARTA BARAT\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(753, 'T041', 'TEGMARCO UTAMA', 'MEILY S', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(754, 'T042', 'TJOKRO BERSAUDARA', 'SUTRISNO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(755, 'T043', 'TAMAKO ENGENERING PT.', 'IR.HENRY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(756, 'T044', 'TUNAS JAYA PT', 'VIVI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(757, 'T045', 'TRI R JAYA PURNAMA', 'RATMI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(758, 'T046', 'TECHNO BANGKIT MANDIRI', 'SUWARTO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(759, 'T048', 'TOYO DIES INDONESIA, PT.', 'BPK MARKIM', '__.___.___._.___.___', '0267-440362/364', '081385063137', '0267-440528/363', '', 'JL. SURYA MADYA KAV. 1-15B SURYACIPTA CITY OF INDUSTRY TELUK JAMBE KARAWANG 41361\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(760, 'T049', 'TECO MULTIGUNA ELEKTRO, P. T', 'BPK BASUKI', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(761, 'T051', 'TRIAS KEMAS UTAMA, PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(762, 'T052', 'THEA THEO STATIONARY', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(763, 'T053', 'TIKNO', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(764, 'T054', 'TONY', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(765, 'T055', 'TIFRA', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(766, 'T056', 'TADIN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(767, 'T057', 'THE 4 TEAM', 'FANDY', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(768, 'U001', 'UTAMA MAKMUR', 'ADILA', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(769, 'U002', 'USAHA BARU,UD', 'HAJI BAHAR', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(770, 'U003', 'UNGGUL CIPTA INDRA MEGAH, P. T', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(771, 'U004', 'UNITAMA, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(772, 'U005', 'USMAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(773, 'U006', 'UTOMO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(774, 'U007', 'UNTUNG', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(775, 'U008', 'UNI STAR UTAMA, PT.', 'BP. ARIF', '__.___.___._.___.___', '(024)7623554,7611910', '', '', '', 'KAWASAN INDUSTRI CANDI JL. GATOT SUBROTO I/10 SEMARANG.\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(776, 'U009', 'UD. 3AN BRE I', 'BP. ANDI ANTO T.', '__.___.___._.___.___', '( 021 ) 55962420', '08179114466', '', '', 'Jl. Raya Prancis, Kp> Bendungan Rt. 02 Rw. 012 No. 99, Dadap - Tangerang.\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(777, 'U010', 'USAHA SARANA ELECTRICAL', 'ULLIE', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(778, 'U011', 'USAHA BARU', 'YADI', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(779, 'U012', 'USAHA BARU', 'SUHERMAN', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(780, 'U013', 'USAHA BERSAMA', 'SYAFI I', '__.___.___._.___.___', '', '', '', '', 'JARTA TIMUR\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(781, 'U014', 'USAHA KEKER MANDIRI', 'SUPOMO', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(782, 'U015', 'UTAMA SERVICE', 'BP. YASIR', '__.___.___._.___.___', '', '', '', '', '\r\n\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(783, 'U016', 'UNICAL GREASE INDONESIA , PT.', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(784, 'V001', 'VOKSEL ELECTRIC , P.T.', 'LUSI/WULAN', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(785, 'V002', 'VERIA MOTOR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(786, 'V003', 'VEKTORIA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(787, 'V004', 'VINSEN', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(788, 'V005', 'VGA SCALE INDONESIA, P. T', 'BPK ABDUL SYUKUR', '__.___.___._.___.___', '', '', '', '', 'JAKARTA\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(789, 'W001', 'WEMPY', 'WEMPY', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(790, 'W002', 'WAWAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(791, 'W003', 'WALUYO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(792, 'W004', 'WAHYU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(793, 'W005', 'WISNU', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(794, 'W006', 'WIDODO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(795, 'W007', 'WILLY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(796, 'W008', 'WAHANA RAKSA KENCANA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(797, 'W009', 'WASPAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(798, 'W010', 'WICAKSOSO', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(799, 'W011', 'WENY', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(800, 'W013', 'WIJAYA SAKTI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(801, 'W014', 'WILSON, P. T.', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(802, 'W015', 'WAHYUDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(803, 'W017', 'WAHANA WIRAWAN, P. T', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(804, 'W018', 'WINTECH PT', 'BPK.ADWINC', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(805, 'W020', 'WAHANA MAS MULIA, P. T', 'IBU AMY', '__.___.___._.___.___', '', '', '', '', 'JAKBAR\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(806, 'W021', 'WAHYU JAYA KESUMA', 'BP. WAHYU', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(807, 'Y001', 'YOSA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(808, 'Y002', 'YAHYA', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(809, 'Y003', 'YOYOK', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(810, 'Y004', 'YANCE', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(811, 'Y005', 'YUDI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(812, 'Y007', 'YESI', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(813, 'Y008', 'YAYAN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(814, 'Y009', 'YULIS TIRAS ANDALAS', 'BP. BAMBANG', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(815, 'Y010', 'YETI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(816, 'Y011', 'YASIR', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(817, 'Z001', 'ZE-ZEN', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(818, 'Z002', 'ZAENAL', '', '__.___.___._.___.___', '', '', '', '', '', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(819, 'Z004', 'ZULKIPLI', '', '__.___.___._.___.___', '', '', '', '', '\r', 0, 0, '', 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
  `jmlh_afkiran` float NOT NULL,
  `jmlh_pengepakan` float NOT NULL,
  `jmlh_lain` float NOT NULL,
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
(1, 'TTR.201903.0001', '2019-03-19', 1, 0, 750, 0, '', 0, 0, 1, '2019-03-19 03:27:40', 1, '0000-00-00 00:00:00', 0, '2019-03-19 02:03:17', 1, '2019-03-19 02:03:17', 1),
(3, 'TTR.201903.0003', '2019-03-19', 3, 0, 562, 0, '', 0, 0, 1, '2019-03-19 04:16:57', 1, '0000-00-00 00:00:00', 0, '2019-03-19 03:03:30', 1, '2019-03-19 03:03:30', 1),
(4, 'TTR.201903.0004', '2019-03-19', 4, 0, 511, 0, '', 0, 0, 1, '2019-03-19 04:17:03', 1, '0000-00-00 00:00:00', 0, '2019-03-19 04:03:50', 1, '2019-03-19 04:03:50', 1),
(5, 'TTR.201903.0005', '2019-03-19', 6, 0, 0, 0, '', 0, 0, 1, '2019-03-19 05:32:18', 1, '0000-00-00 00:00:00', 0, '2019-03-19 05:03:12', 1, '2019-03-19 05:03:12', 1),
(8, 'TTR.201903.0007', '2019-03-20', 8, 0, 248.58, 0, '', 0, 0, 1, '2019-03-20 05:30:46', 1, '0000-00-00 00:00:00', 0, '2019-03-20 04:03:36', 1, '2019-03-20 04:03:36', 1),
(10, 'TTR.201903.0006', '2019-03-20', 9, 0, 105.43, 0, '', 0, 0, 1, '2019-03-20 05:30:38', 1, '0000-00-00 00:00:00', 0, '2019-03-20 04:03:07', 1, '2019-03-20 04:03:07', 1),
(11, 'TTR.201903.0008', '2019-03-21', 10, 0, 167.02, 0, '', 0, 0, 1, '2019-03-21 10:24:04', 1, '0000-00-00 00:00:00', 0, '2019-03-21 10:03:55', 1, '2019-03-21 10:03:55', 1);

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
(1, 1, 1, 12, 0, 0, 941, 814, '', '2019-03-19 02:03:17', 1, '2019-03-19 02:03:17', 1),
(2, 1, 2, 64, 0, 0, 981, 845, '', '2019-03-19 02:03:17', 1, '2019-03-19 02:03:17', 1),
(3, 1, 3, 64, 0, 0, 1674, 1539, '', '2019-03-19 02:03:17', 1, '2019-03-19 02:03:17', 1),
(4, 1, 4, 64, 0, 0, 1436, 1295, '', '2019-03-19 02:03:17', 1, '2019-03-19 02:03:17', 1),
(5, 1, 5, 64, 0, 0, 344, 271, '', '2019-03-19 02:03:17', 1, '2019-03-19 02:03:17', 1),
(6, 1, 6, 64, 0, 0, 851, 713, '', '2019-03-19 02:03:17', 1, '2019-03-19 02:03:17', 1),
(12, 3, 12, 64, 0, 0, 1542, 1405, '', '2019-03-19 03:03:30', 1, '2019-03-19 03:03:30', 1),
(13, 3, 13, 64, 0, 0, 2000, 1863, '', '2019-03-19 03:03:30', 1, '2019-03-19 03:03:30', 1),
(14, 3, 14, 12, 0, 0, 1109, 963, '', '2019-03-19 03:03:30', 1, '2019-03-19 03:03:30', 1),
(15, 3, 15, 17, 0, 0, 1232, 1090, '', '2019-03-19 03:03:30', 1, '2019-03-19 03:03:30', 1),
(16, 4, 16, 12, 0, 0, 1735, 1608, '', '2019-03-19 04:03:50', 1, '2019-03-19 04:03:50', 1),
(17, 4, 17, 64, 0, 0, 1463, 1328, '', '2019-03-19 04:03:50', 1, '2019-03-19 04:03:50', 1),
(18, 4, 18, 12, 0, 0, 2533, 2399, '', '2019-03-19 04:03:50', 1, '2019-03-19 04:03:50', 1),
(19, 4, 19, 64, 0, 0, 683, 568, '', '2019-03-19 04:03:50', 1, '2019-03-19 04:03:50', 1),
(20, 5, 21, 19, 0, 581, 0, 581, 'BARANG BS TRANSFER KE RONGSOK', '2019-03-19 05:03:12', 1, '2019-03-19 05:03:12', 1),
(33, 8, 28, 74, 0, 0, 560, 501.64, '', '2019-03-20 04:03:36', 1, '2019-03-20 04:03:36', 1),
(34, 8, 29, 74, 0, 0, 578, 523.13, '', '2019-03-20 04:03:36', 1, '2019-03-20 04:03:36', 1),
(35, 8, 30, 74, 0, 0, 555, 504.77, '', '2019-03-20 04:03:36', 1, '2019-03-20 04:03:36', 1),
(36, 8, 31, 63, 0, 0, 256, 228.64, '', '2019-03-20 04:03:36', 1, '2019-03-20 04:03:36', 1),
(37, 8, 32, 63, 0, 0, 278, 247.19, '', '2019-03-20 04:03:36', 1, '2019-03-20 04:03:36', 1),
(38, 8, 33, 63, 0, 0, 250, 223.05, '', '2019-03-20 04:03:36', 1, '2019-03-20 04:03:36', 1),
(41, 10, 34, 64, 0, 0, 560, 500.33, '', '2019-03-20 04:03:07', 1, '2019-03-20 04:03:07', 1),
(42, 10, 35, 64, 0, 0, 550, 504.24, '', '2019-03-20 04:03:07', 1, '2019-03-20 04:03:07', 1),
(43, 11, 36, 72, 0, 0, 560, 501.22, '', '2019-03-21 10:03:55', 1, '2019-03-21 10:03:55', 1),
(44, 11, 37, 63, 0, 0, 300, 247.54, '', '2019-03-21 10:03:55', 1, '2019-03-21 10:03:55', 1),
(45, 11, 38, 63, 0, 0, 325, 269.22, '', '2019-03-21 10:03:55', 1, '2019-03-21 10:03:55', 1);

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
(1, 'BPB-AMP.201903.0001', 1, 0, '', 1, 1, '2019-03-19 00:00:00', 1, '2019-03-19 05:03:03', NULL, NULL, NULL);

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
(1, 1, '2019-03-19', 3, '', 0, 'KG', 106, 'SISA PRODUKSI INGOT', 1);

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
(1, 'BPB-SDM.201903.0003', '2019-03-19', 1, 452, '2019-03-19 06:03:04', 1, NULL, NULL, 1, '', '2019-03-19 06:03:15', 1, NULL, NULL, NULL),
(2, 'BPB-SDM.201903.0004', '2019-03-19', 2, 216, '2019-03-19 06:03:03', 1, NULL, NULL, 1, '', '2019-03-19 06:03:54', 1, NULL, NULL, NULL),
(3, 'BPB-SDM.201903.0005', '2019-03-19', 3, 426, '2019-03-19 07:03:48', 1, NULL, NULL, 1, '', '2019-03-19 07:03:12', 1, NULL, NULL, NULL),
(4, 'BPB-SDM.201903.0006', '2019-03-19', 4, 216, '2019-03-19 07:03:19', 1, NULL, NULL, 1, '', '2019-03-19 07:03:28', 1, NULL, NULL, NULL),
(5, 'BPB-SDM.201903.0007', '2019-03-20', 5, 444, '2019-03-20 05:03:22', 1, NULL, NULL, 1, '', '2019-03-20 05:03:10', 1, NULL, NULL, NULL),
(6, 'BPB-SDM.201903.0008', '2019-03-20', 6, 470, '2019-03-20 05:03:58', 1, NULL, NULL, 1, '', '2019-03-20 05:03:22', 1, NULL, NULL, NULL);

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
  `berat_bobbin` float NOT NULL,
  `bobbin_id` int(11) NOT NULL,
  `flag_taken` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bpb_fg_detail`
--

INSERT INTO `t_bpb_fg_detail` (`id`, `t_bpb_fg_id`, `jenis_barang_id`, `no_packing_barcode`, `no_produksi`, `bruto`, `netto`, `berat_bobbin`, `bobbin_id`, `flag_taken`) VALUES
(1, 1, 452, '190319B120001', 522, 310, 260.9, 49.6, 1641, 0),
(2, 1, 452, '190319B120002', 521, 309, 258.4, 51.2, 1641, 0),
(3, 1, 452, '190319B120003', 524, 294, 246.9, 48, 1641, 0),
(4, 1, 452, '190319B120004', 531, 347, 288.8, 58.4, 1641, 0),
(5, 2, 216, '190319L22600006', 2, 309, 244.5, 64.5, 105, 0),
(6, 2, 216, '190319L22600026', 1, 337, 278, 59.8, 114, 0),
(7, 3, 426, '190319C120005', 20, 560, 500, 60.35, 1642, 0),
(8, 3, 426, '190319C120006', 21, 512, 461.72, 50.86, 1642, 0),
(9, 3, 426, '190319C120007', 22, 630, 573.63, 56.61, 1642, 0),
(10, 4, 216, '190319L22600034', 24, 560, 496.2, 63.8, 120, 0),
(11, 4, 216, '190319L22600040', 25, 578, 514.5, 63.5, 123, 0),
(12, 5, 444, '190320A03100008', 26, 280, 253.53, 26.47, 1640, 0),
(13, 5, 444, '190320A03100009', 27, 278, 252.93, 25.07, 1640, 0),
(14, 5, 444, '190320A03100010', 28, 260, 233.22, 26.78, 1640, 0),
(15, 5, 444, '190320A03100011', 29, 256, 228.64, 27.36, 1640, 0),
(16, 6, 470, '190320M03100007', 30, 312, 265, 47, 812, 0);

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
(1, 'BPB-WIP.201903.0001', 1, 0, '', 1, 1, '2019-03-19 00:00:00', 1, '2019-03-19 05:03:22'),
(2, 'BPB-WIP.201903.0002', 1, 0, '', 2, 1, '2019-03-21 10:03:45', 1, '2019-03-21 10:03:18'),
(3, 'BPB-WIP.201903.0003', 1, 0, '', 3, 1, '2019-03-21 10:03:20', 1, '2019-03-21 10:03:26'),
(4, 'BPB-PO-T.201903.0001', 0, 0, 'BARANG PO WIP', 0, 1, '2019-03-21 12:03:19', 0, '0000-00-00 00:00:00'),
(5, 'BPB-PO-T.201903.0001', 0, 0, 'BARANG PO WIP', 0, 1, '2019-03-21 12:03:19', 0, '0000-00-00 00:00:00');

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
(1, 1, '2019-03-19', 2, 0, 3890, 'BATANG', 4780, '', 1),
(2, 2, '2019-03-21', 6, 0, 1000, 'ROLL', 1100, '', 1),
(3, 3, '2019-03-21', 5, 0, 1000, 'ROLL', 1000, '', 1),
(4, 4, '2019-03-21', 6, 0, 1500, 'ROLL', 1500, '', 1),
(5, 5, '2019-03-21', 5, 0, 1500, 'ROLL', 1500, '', 1);

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
(1, '2019-03-19', 3, 106, 1, 1, '2019-03-19 05:03:03');

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
(1, 1, 'INGOT', 22, 473, '2019-03-19', 1, 1, '2019-03-19 05:03:19'),
(2, 1, 'INGOT', 31, 108, '2019-03-19', 1, 1, '2019-03-19 05:03:19');

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
  `berat_bobbin` float NOT NULL,
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

INSERT INTO `t_gudang_fg` (`id`, `tanggal`, `jenis_trx`, `flag_taken`, `jenis_barang_id`, `t_bpb_fg_id`, `t_bpb_fg_detail_id`, `t_spb_fg_id`, `t_spb_fg_detail_id`, `nomor_SPB`, `nomor_BPB`, `bruto`, `netto`, `berat_bobbin`, `no_produksi`, `no_packing`, `bobbin_id`, `nomor_bobbin`, `keterangan`, `created_by`, `created_at`, `modified_date`, `modified_by`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(1, '2019-03-19', 1, 1, 452, 1, 1, 2, NULL, 'SPB-FG2019030005', 'BPB-SDM.201903.0003', 310, 260.9, 49.6, '522', '190319B120001', 1641, 'B0001', NULL, 1, '2019-03-19 06:03:15', '2019-03-19', 1, '2019-03-19', '2019-03-19'),
(2, '2019-03-19', 1, 1, 452, 1, 2, 2, NULL, 'SPB-FG2019030005', 'BPB-SDM.201903.0003', 309, 258.4, 51.2, '521', '190319B120002', 1641, 'B0001', NULL, 1, '2019-03-19 06:03:15', '2019-03-19', 1, '2019-03-19', '2019-03-19'),
(3, '2019-03-19', 0, 0, 452, 1, 3, NULL, NULL, NULL, 'BPB-SDM.201903.0003', 294, 246.9, 48, '524', '190319B120003', 1641, 'B0001', '', 1, '2019-03-19 06:03:15', '0000-00-00', 0, '2019-03-19', '0000-00-00'),
(4, '2019-03-19', 0, 0, 452, 1, 4, NULL, NULL, NULL, 'BPB-SDM.201903.0003', 347, 288.8, 58.4, '531', '190319B120004', 1641, 'B0001', '', 1, '2019-03-19 06:03:15', '0000-00-00', 0, '2019-03-19', '0000-00-00'),
(5, '2019-03-19', 1, 1, 216, 2, 5, 2, NULL, 'SPB-FG2019030005', 'BPB-SDM.201903.0004', 309, 244.5, 64.5, '2', '190319L22600006', 105, 'L0006', NULL, 1, '2019-03-19 06:03:54', '2019-03-19', 1, '2019-03-19', '2019-03-19'),
(6, '2019-03-19', 1, 1, 216, 2, 6, 2, NULL, 'SPB-FG2019030005', 'BPB-SDM.201903.0004', 337, 278, 59.8, '1', '190319L22600026', 114, 'L0026', NULL, 1, '2019-03-19 06:03:54', '2019-03-19', 1, '2019-03-19', '2019-03-19'),
(7, '2019-03-19', 1, 1, 426, 3, 7, 2, NULL, 'SPB-FG2019030005', 'BPB-SDM.201903.0005', 560, 500, 60.35, '20', '190319C120005', 1642, 'C0001', NULL, 1, '2019-03-19 07:03:12', '2019-03-19', 1, '2019-03-19', '2019-03-19'),
(8, '2019-03-19', 1, 1, 426, 3, 8, 2, NULL, 'SPB-FG2019030005', 'BPB-SDM.201903.0005', 512, 461.72, 50.86, '21', '190319C120006', 1642, 'C0001', NULL, 1, '2019-03-19 07:03:12', '2019-03-19', 1, '2019-03-19', '2019-03-19'),
(9, '2019-03-19', 1, 1, 426, 3, 9, 2, NULL, 'SPB-FG2019030005', 'BPB-SDM.201903.0005', 630, 573.63, 56.61, '22', '190319C120007', 1642, 'C0001', NULL, 1, '2019-03-19 07:03:12', '2019-03-19', 1, '2019-03-19', '2019-03-19'),
(10, '2019-03-19', 1, 1, 216, 4, 10, 2, NULL, 'SPB-FG2019030005', 'BPB-SDM.201903.0006', 560, 496.2, 63.8, '24', '190319L22600034', 120, 'L0034', '', 1, '2019-03-19 07:03:28', '2019-03-19', 1, '2019-03-19', '2019-03-19'),
(11, '2019-03-19', 1, 1, 216, 4, 11, 2, NULL, 'SPB-FG2019030005', 'BPB-SDM.201903.0006', 578, 514.5, 63.5, '25', '190319L22600040', 123, 'L0040', '', 1, '2019-03-19 07:03:28', '2019-03-19', 1, '2019-03-19', '2019-03-19'),
(12, '2019-03-20', 1, 1, 444, 5, 12, 5, NULL, 'SPB-FG2019030008', 'BPB-SDM.201903.0007', 280, 253.53, 26.47, '26', '190320A03100008', 1640, 'A0001', '', 1, '2019-03-20 05:03:10', '2019-03-20', 1, '2019-03-20', '2019-03-20'),
(13, '2019-03-20', 1, 1, 444, 5, 13, 5, NULL, 'SPB-FG2019030008', 'BPB-SDM.201903.0007', 278, 252.93, 25.07, '27', '190320A03100009', 1640, 'A0001', '', 1, '2019-03-20 05:03:10', '2019-03-20', 1, '2019-03-20', '2019-03-20'),
(14, '2019-03-20', 1, 1, 444, 5, 14, 5, NULL, 'SPB-FG2019030008', 'BPB-SDM.201903.0007', 260, 233.22, 26.78, '28', '190320A03100010', 1640, 'A0001', '', 1, '2019-03-20 05:03:10', '2019-03-20', 1, '2019-03-20', '2019-03-20'),
(15, '2019-03-20', 1, 1, 444, 5, 15, 5, NULL, 'SPB-FG2019030008', 'BPB-SDM.201903.0007', 256, 228.64, 27.36, '29', '190320A03100011', 1640, 'A0001', '', 1, '2019-03-20 05:03:10', '2019-03-20', 1, '2019-03-20', '2019-03-20'),
(16, '2019-03-20', 1, 1, 470, 6, 16, 5, NULL, 'SPB-FG2019030008', 'BPB-SDM.201903.0008', 312, 265, 47, '30', '190320M03100007', 812, 'M0007', '', 1, '2019-03-20 05:03:22', '2019-03-20', 1, '2019-03-20', '2019-03-20');

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
(1, 0, 2, 15, 200, 200, '2019-03-21 10:03:45', 1);

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
  `berat` float NOT NULL,
  `keterangan` text,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gudang_wip`
--

INSERT INTO `t_gudang_wip` (`id`, `tanggal`, `flag_taken`, `jenis_trx`, `t_hasil_wip_id`, `jenis_barang_id`, `t_spb_wip_id`, `t_spb_wip_detail_id`, `t_bpb_wip_detail_id`, `qty`, `uom`, `berat`, `keterangan`, `created_by`, `created_on`) VALUES
(2, '2019-03-19', 0, 0, 1, 2, 0, 0, 1, 3890, 'BATANG', 4780, NULL, 1, '2019-03-19 17:56:22'),
(3, '2019-03-21', 0, 1, 0, 2, 4, 8, 0, 1200, 'BATANG', 1500, '', 1, '2019-03-21 10:25:54'),
(4, '2019-03-21', 0, 0, 2, 6, 0, 0, 2, 1000, 'ROLL', 1100, NULL, 1, '2019-03-21 10:28:18'),
(5, '2019-03-21', 0, 1, 0, 6, 5, 9, 0, 1000, 'ROLL', 1000, '', 1, '2019-03-21 10:29:58'),
(6, '2019-03-21', 0, 0, 3, 5, 0, 0, 3, 1000, 'ROLL', 1000, NULL, 1, '2019-03-21 10:30:26'),
(7, '2019-03-21', 1, 1, 0, 5, 3, 7, 0, 1000, 'ROLL', 1000, '', 1, '2019-03-21 10:30:54');

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
(1, '2019-03-19', '09:00:00', '11:00:00', 45, 130, 'SPB.201903.0001', 1, 5503, 3890, 4780, 473, 36, 106, 108, 1, '0000-00-00 00:00:00', 0, '');

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
(1, '', 1, NULL, 'INGOT', '2019-03-19', 2, 3890, 'BATANG', 4780, 0, 0, 0, 0, 0, 1, '2019-03-19 17:07:19'),
(2, 'PRD-WIP.201903.0001', 0, 4, 'ROLLING', '2019-03-21', 6, 1000, 'ROLL', 1100, 0, 200, 200, 0, 35, 1, '2019-03-21 10:27:45'),
(3, 'PRD-WIP.201903.0002', 0, 5, 'CUCI', '2019-03-21', 5, 1000, 'ROLL', 1000, 0, 0, 0, 0, 0, 1, '2019-03-21 10:30:20');

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
(2, 'ALCAR PRIMA', 2, '0001/ALCAR/FG', '2019-03-19', 2, 'FG', '2019-03-19 06:03:50', 1, '2019-03-19 06:03:36', 1),
(5, NULL, 5, 'PO-TL.ALPHANT.0001', '2019-03-25', 5, 'FG', '2019-03-20 03:03:52', 1, '2019-03-20 03:03:52', 1),
(6, 'ACM', 6, 'PO-WIP.ACM.0001', '2019-03-20', 1, 'WIP', '2019-03-20 06:03:57', 1, '2019-03-20 07:03:55', 1),
(8, NULL, 10, 'PO-TL.WIP.0001', '2019-03-20', 2, 'WIP', '2019-03-20 07:03:37', 1, '2019-03-20 07:03:37', 1),
(9, NULL, 11, 'PO-TL.WIP.0001', '2019-03-17', 3, 'WIP', '2019-03-20 07:03:32', 1, '2019-03-20 07:03:32', 1);

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
(3, 2, 3, 426, 1, 0, 2000, 150000, 300000000),
(4, 2, 4, 216, 0, 0, 1500, 104000, 156000000),
(7, 5, 10, 470, NULL, 0, 1200, 200000, 240000000),
(8, 5, 11, 469, NULL, 0, 1000, 180000, 180000000),
(9, 5, 12, 468, NULL, 0, 1000, 160000, 160000000),
(12, 6, 2, 5, NULL, 0, 1000, 200000, 200000000),
(18, 11, 7, 5, NULL, 0, 1000, 180000, 180000000);

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
(2, '2019-03-19', 'SPB-FG2019030005', 1, 0, 'SALES ORDER FINISH GOOD', 1, '2019-03-19 06:03:50', 1, '2019-03-19 07:03:49', 1, '2019-03-19 07:03:16', NULL, NULL, NULL, NULL, NULL),
(5, '2019-03-20', 'SPB-FG2019030008', 4, 0, 'TOLLING SO FINISH GOOD', 1, '2019-03-20 03:03:52', 1, '2019-03-20 05:03:17', 1, '2019-03-20 05:03:25', NULL, NULL, NULL, NULL, NULL);

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
(3, '2019-03-19', 2, 426, 'KG', 2000, NULL),
(4, '2019-03-19', 2, 216, 'KG', 1500, 'SALES ORDER'),
(10, '2019-03-20', 5, 470, 'KG', 1200, 'SO TOLLING'),
(11, '2019-03-20', 5, 469, 'KG', 1000, 'SO TOLLING'),
(12, '2019-03-20', 5, 468, 'KG', 1000, 'SO TOLLING');

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
(1, '2019-03-20', 'SPB-WIP.201903.0001', 0, 0, 0, 'SALES ORDER WIP', 1, '2019-03-20 06:03:57', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, NULL),
(3, '2019-03-20', 'SPB-WIP.201903.0005', 1, 0, 0, 'TOLLING SO WIP', 1, '2019-03-20 07:03:32', 1, '2019-03-21 10:03:50', 1, '2019-03-21 10:03:54', 0, NULL, 0, NULL, NULL),
(4, '2019-03-21', 'SPB-WIP.201903.0006', 1, 1, 0, 'UNTUK ROLLING', 1, '2019-03-21 10:03:20', 1, '2019-03-21 10:03:47', 1, '2019-03-21 10:03:54', 0, NULL, 0, NULL, NULL),
(5, '2019-03-21', 'SPB-WIP.201903.0007', 1, 1, 0, '', 1, '2019-03-21 10:03:28', 1, '2019-03-21 10:03:51', 1, '2019-03-21 10:03:57', 0, NULL, 0, NULL, NULL);

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
(2, 1, '2019-03-20', 5, 1000, 'ROLL', 1000, 'SALES ORDER'),
(7, 3, '2019-03-20', 5, 1000, 'ROLL', 1000, 'SO TOLLING'),
(8, 4, '2019-03-21', 2, 1500, 'BATANG', 1500, ''),
(9, 5, '2019-03-21', 6, 1000, 'ROLL', 1000, '');

-- --------------------------------------------------------

--
-- Table structure for table `t_spb_wip_fulfilment`
--

CREATE TABLE `t_spb_wip_fulfilment` (
  `id` int(11) NOT NULL,
  `t_spb_wip_id` int(11) NOT NULL,
  `t_spb_wip_detail_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `berat` float NOT NULL,
  `keterangan` text NOT NULL,
  `approved_by` int(11) NOT NULL,
  `approved_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spb_wip_fulfilment`
--

INSERT INTO `t_spb_wip_fulfilment` (`id`, `t_spb_wip_id`, `t_spb_wip_detail_id`, `jenis_barang_id`, `qty`, `berat`, `keterangan`, `approved_by`, `approved_at`) VALUES
(1, 4, 8, 2, 1200, 1500, '', 1, '2019-03-21 10:03:54'),
(2, 5, 9, 6, 1000, 1000, '', 1, '2019-03-21 10:03:57'),
(3, 3, 7, 5, 1000, 1000, '', 1, '2019-03-21 10:03:54');

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
(1, 'SJ.201903.0003', 2, 0, 0, 0, 1, '2019-03-19', 'FG', 8, 1, 'BE 1960 NE', 'MICHAEL', '', '2019-03-19 07:03:53', 1, 1, '2019-03-19 07:03:27', '0000-00-00 00:00:00', 0, '2019-03-19 07:03:08', 1),
(2, 'SJ.201903.0004', 2, 0, 0, 0, 1, '2019-03-19', 'FG', 8, 3, 'BE 1960 NE', 'BELO', '', '2019-03-19 07:03:39', 1, 1, '2019-03-19 08:03:55', '0000-00-00 00:00:00', 0, '2019-03-19 08:03:47', 1),
(3, 'SJ.201903.0005', 5, 0, 0, 0, 1, '2019-03-20', 'FG', 7, 1, 'BE 1960 NE', 'MICHAEL', '', '2019-03-20 05:03:02', 1, 1, '2019-03-20 06:03:15', '0000-00-00 00:00:00', 0, '2019-03-20 05:03:42', 1),
(6, 'SJ.201903.0008', 11, 0, 0, 0, 1, '2019-03-21', 'WIP', 21, 1, 'BE 1938 NE', 'MICHAEL', '', '2019-03-21 11:03:45', 1, 1, '2019-03-21 11:03:16', '0000-00-00 00:00:00', 0, '2019-03-21 11:03:02', 1),
(7, 'SJ-T.201903.0001', 0, 4, 2, 0, 1, '2019-03-21', 'RONGSOK', 22, 3, 'BE 1938 NE', 'BELO', 'SJ KELUAR UNTUK TOLLING', '2019-03-21 11:03:52', 1, 1, '2019-03-21 11:03:22', '0000-00-00 00:00:00', 0, '2019-03-21 11:03:11', 1);

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
  `bruto` float NOT NULL,
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
(1, 1, 1, 452, 426, '190319B012001', 1, 310, 260.9, 0, 'B0001', '', 1, '2019-03-19', 0, '0000-00-00 00:00:00'),
(2, 1, 2, 452, 426, '190319B120002', 1, 309, 258.4, 0, 'B0001', '', 1, '2019-03-19', 0, '0000-00-00 00:00:00'),
(3, 1, 5, 216, 0, '190319L22600006', 1, 309, 244.5, 0, 'L0006', '', 1, '2019-03-19', 0, '0000-00-00 00:00:00'),
(4, 1, 6, 216, 0, '190319L22600026', 1, 337, 278, 0, 'L0026', '', 1, '2019-03-19', 0, '0000-00-00 00:00:00'),
(5, 2, 7, 426, 0, '190319C120005', 1, 560, 500, 0, 'C0001', '', 1, '2019-03-19', 0, '0000-00-00 00:00:00'),
(6, 2, 8, 426, 0, '190319C120006', 1, 512, 461.72, 0, 'C0001', '', 1, '2019-03-19', 0, '0000-00-00 00:00:00'),
(7, 2, 9, 426, 0, '190319C120007', 1, 630, 573.63, 0, 'C0001', '', 1, '2019-03-19', 0, '0000-00-00 00:00:00'),
(8, 2, 10, 216, 0, '190319L22600034', 1, 560, 496.2, 0, 'L0034', '', 1, '2019-03-19', 0, '0000-00-00 00:00:00'),
(9, 2, 11, 216, 0, '190319L22600040', 1, 578, 514.5, 0, 'L0040', '', 1, '2019-03-19', 0, '0000-00-00 00:00:00'),
(10, 3, 12, 444, 470, '190320A03100008', 1, 280, 253.53, 0, 'A0001', '', 1, '2019-03-20', 0, '0000-00-00 00:00:00'),
(11, 3, 13, 444, 470, '190320A03100009', 1, 278, 252.93, 0, 'A0001', '', 1, '2019-03-20', 0, '0000-00-00 00:00:00'),
(12, 3, 14, 444, 470, '190320A03100010', 1, 260, 233.22, 0, 'A0001', '', 1, '2019-03-20', 0, '0000-00-00 00:00:00'),
(13, 3, 15, 444, 470, '190320A03100011', 1, 256, 228.64, 0, 'A0001', '', 1, '2019-03-20', 0, '0000-00-00 00:00:00'),
(14, 3, 16, 470, 0, '190320M03100007', 1, 312, 265, 0, 'M0007', '', 1, '2019-03-20', 0, '0000-00-00 00:00:00'),
(19, 6, 7, 5, 0, '0', 1000, 0, 1000, 0, '0', '', 1, '2019-03-21', 0, '0000-00-00 00:00:00'),
(20, 7, 18, 12, 0, '190319161610OXM', 0, 2533, 2399, 0, '0', '', 1, '2019-03-21', 0, '0000-00-00 00:00:00'),
(21, 7, 6, 64, 0, '190319144438CLC', 0, 851, 713, 0, '0', '', 1, '2019-03-21', 0, '0000-00-00 00:00:00');

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
(9, 'resmi', 'ADMIN RESMI', 'cmVzbWk=', 9, 1, '', 2, '2019-01-24 10:01:33', 1, '2019-03-06 10:03:03', 1),
(10, 'arif', 'ARIF', 'YXJm', 2, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'arif-n', 'ARIF-N', 'YXJpZg==', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'control1', 'CONTROL1', 'a21w', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'control2', 'CONTROL2', 'a21w', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'didi', 'DIDI', 'ZGlkaQ==', 6, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'didi-n', 'DIDI-N', 'ZGlkaQ==', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'dina', 'DINA', 'ZGluYQ==', 6, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'dina-n', 'DINA-N', 'ZGluYQ==', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'enggar', 'ENGGAR', 'ZWdy', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 'enggar-n', 'ENGGAR-N', 'ZWdy', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'eva', 'EVA', 'ZXZh', 6, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'eva-n', 'EVA-N', 'ZXZh', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'gts', 'GTS', 'Z3Rz', 6, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'gts-n', 'GTS-N', 'Z3Rz', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'gunawan', 'GUNAWAN', 'Z3Vu', 6, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 'gunawan-n', 'GUNAWAN-N', 'Z3Vu', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'herman', 'HERMAN', 'aGVybWFu', 6, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'herman-n', 'HERMAN-N', 'aGVybWFu', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'hrd', 'HRD', 'aHJk', 0, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'ida', 'IDA', 'MWQ0', 6, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 'ida-n', 'IDA-N', 'MWQ0', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'it', 'IT', 'aXQ=', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 'jatmi', 'JATMI', 'amF0bWk=', 4, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 'jatmi-n', 'JATMI-N', 'amF0bWk=', 4, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'khomsa', 'KHOMSA', 'a2htcw==', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'khomsa-n', 'KHOMSA', 'a2htcw==', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'leni', 'LENI', 'a21wNTE=', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'leni-n', 'LENI-N', 'a21wNTE=', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'lia', 'LIA', 'bGlh', 8, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'lia-n', 'LIA-N', 'bGlh', 8, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 'lieza', 'LIEZA', 'bGllemE=', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 'lieza-n', 'LIEZA-N', 'bGllemE=', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 'linda', 'LINDA', 'bGlu', 6, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 'linda-n', 'LINDA-N', 'bGlu', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 'Ling ling', 'LING LING', 'bGluZw==', 3, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 'Ling ling-n', 'LING LING-N', 'bGluZw==', 3, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 'mirna', 'MIRNA', 'MTIz', 7, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 'mirna-n', 'MIRNA-N', 'MTIz', 7, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 'namin', 'NAMIN', 'bmFtaW4=', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 'nova', 'NOVA', 'a21wNTE=', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 'nova-n', 'NOVA-N', 'a21wNTE=', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 'pack', 'PACK', 'cGFjaw==', 5, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 'po', 'PO', 'cG8=', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, 'po-n', 'PO-N', 'cG8=', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, 'poniran', 'PONIRAN', 'cG9uaXJhbg==', 6, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 'poniran-n', 'PONIRAN-N', 'cG9uaXJhbg==', 6, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 'ramdan', 'RAMDAN', 'cmFtZGFu', 6, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, 'rendy', 'RENDY', 'cmVuZHk=', 2, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, 'robert', 'ROBERT', 'cm9iZXJ0', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, 'robert-n', 'ROBERT-N', 'cm9iZXJ0', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 'sp', 'SP', 'MTI1', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 'sp-n', 'SP-N', 'MTI1', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 'sri', 'SRI', 'YWt1', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 'sri-n', 'SRI-N', 'YWt1', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 'sri-p', 'SRI-P', 'YWt1', 1, 1, '', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 'tatu', 'TATU', 'dGF0dQ==', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 'ttr', 'TTR', 'bGluZw==', 5, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 'war', 'WAR', 'd2Fy', 2, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, 'warsinem', 'WARSINEM', 'd2Fy', 2, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 'wiwik', 'WIWIK', 'NDU2', 4, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 'yansen', 'YANSEN', 'eWFuc2Vu', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 'yansen-n', 'YANSEN-N', 'eWFuc2Vu', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 'yordan', 'YORDAN', 'eXJk', 1, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 'yordan-n', 'YORDAN-N', 'eXJk', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(1, 'VRSK.201903.0001', '2019-03-19', 'Pelunasan', 0, 0, 499, 1, 0, 0, 0, 0, 'RONGSOK', 410071500, '', '2019-03-19 03:03:18', 1, '2019-03-19 03:03:18', 1),
(2, 'VRSK.201903.0002', '2019-03-19', 'Pelunasan', 0, 0, 370, 2, 0, 0, 0, 0, 'RONGSOK', 401482500, '', '2019-03-19 03:03:57', 1, '2019-03-19 03:03:57', 1);

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
-- Indexes for table `m_cv`
--
ALTER TABLE `m_cv`
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
-- Indexes for table `t_spb_wip_fulfilment`
--
ALTER TABLE `t_spb_wip_fulfilment`
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
-- AUTO_INCREMENT for table `bak_m_print_barcode`
--
ALTER TABLE `bak_m_print_barcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `beli_sparepart`
--
ALTER TABLE `beli_sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `beli_sparepart_detail`
--
ALTER TABLE `beli_sparepart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtbj`
--
ALTER TABLE `dtbj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtbj_detail`
--
ALTER TABLE `dtbj_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dtr_detail`
--
ALTER TABLE `dtr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `dtt`
--
ALTER TABLE `dtt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dtt_detail`
--
ALTER TABLE `dtt_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dtwip`
--
ALTER TABLE `dtwip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtwip_detail`
--
ALTER TABLE `dtwip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_invoice`
--
ALTER TABLE `f_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `f_invoice_detail`
--
ALTER TABLE `f_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `f_kas`
--
ALTER TABLE `f_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_matching_detail`
--
ALTER TABLE `f_matching_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_pembayaran`
--
ALTER TABLE `f_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_pembayaran_detail`
--
ALTER TABLE `f_pembayaran_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_slip_setoran`
--
ALTER TABLE `f_slip_setoran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_uang_masuk`
--
ALTER TABLE `f_uang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `group_cost`
--
ALTER TABLE `group_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=705;
--
-- AUTO_INCREMENT for table `lpb`
--
ALTER TABLE `lpb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lpb_detail`
--
ALTER TABLE `lpb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1658;
--
-- AUTO_INCREMENT for table `m_bobbin_peminjaman`
--
ALTER TABLE `m_bobbin_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_bobbin_peminjaman_detail`
--
ALTER TABLE `m_bobbin_peminjaman_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `m_bobbin_penerimaan`
--
ALTER TABLE `m_bobbin_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_bobbin_penerimaan_detail`
--
ALTER TABLE `m_bobbin_penerimaan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_bobbin_size`
--
ALTER TABLE `m_bobbin_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `m_bobbin_spb`
--
ALTER TABLE `m_bobbin_spb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_bobbin_spb_detail`
--
ALTER TABLE `m_bobbin_spb_detail`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `m_cv`
--
ALTER TABLE `m_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `m_numbering_details`
--
ALTER TABLE `m_numbering_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `m_print_barcode`
--
ALTER TABLE `m_print_barcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_print_barcode_line`
--
ALTER TABLE `m_print_barcode_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `po_detail`
--
ALTER TABLE `po_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produksi_fg_detail`
--
ALTER TABLE `produksi_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `produksi_ingot`
--
ALTER TABLE `produksi_ingot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produksi_ingot_detail`
--
ALTER TABLE `produksi_ingot_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `request_sample`
--
ALTER TABLE `request_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request_sample_detail`
--
ALTER TABLE `request_sample_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retur_detail`
--
ALTER TABLE `retur_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retur_fulfilment`
--
ALTER TABLE `retur_fulfilment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=474;
--
-- AUTO_INCREMENT for table `rongsok`
--
ALTER TABLE `rongsok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
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
-- AUTO_INCREMENT for table `r_t_invoice`
--
ALTER TABLE `r_t_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `r_t_invoice_detail`
--
ALTER TABLE `r_t_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `r_t_po_detail`
--
ALTER TABLE `r_t_po_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `r_t_so`
--
ALTER TABLE `r_t_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `r_t_so_detail`
--
ALTER TABLE `r_t_so_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `r_t_surat_jalan`
--
ALTER TABLE `r_t_surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `r_t_surat_jalan_detail`
--
ALTER TABLE `r_t_surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skb`
--
ALTER TABLE `skb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skb_detail`
--
ALTER TABLE `skb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2721;
--
-- AUTO_INCREMENT for table `spb`
--
ALTER TABLE `spb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `spb_detail`
--
ALTER TABLE `spb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spb_detail_fulfilment`
--
ALTER TABLE `spb_detail_fulfilment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=820;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ttr_detail`
--
ALTER TABLE `ttr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
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
-- AUTO_INCREMENT for table `t_bpb_fg`
--
ALTER TABLE `t_bpb_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_bpb_fg_detail`
--
ALTER TABLE `t_bpb_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `t_bpb_wip`
--
ALTER TABLE `t_bpb_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_bpb_wip_detail`
--
ALTER TABLE `t_bpb_wip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_delivery_order`
--
ALTER TABLE `t_delivery_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_delivery_order_detail`
--
ALTER TABLE `t_delivery_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_gudang_ampas`
--
ALTER TABLE `t_gudang_ampas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_gudang_bs`
--
ALTER TABLE `t_gudang_bs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_gudang_fg`
--
ALTER TABLE `t_gudang_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `t_gudang_keras`
--
ALTER TABLE `t_gudang_keras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_gudang_wip`
--
ALTER TABLE `t_gudang_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_hasil_masak`
--
ALTER TABLE `t_hasil_masak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_hasil_wip`
--
ALTER TABLE `t_hasil_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_inventory`
--
ALTER TABLE `t_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_inventory_detail`
--
ALTER TABLE `t_inventory_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_kas`
--
ALTER TABLE `t_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_sales_order`
--
ALTER TABLE `t_sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `t_sales_order_detail`
--
ALTER TABLE `t_sales_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_spb_fg_detail`
--
ALTER TABLE `t_spb_fg_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `t_spb_sparepart`
--
ALTER TABLE `t_spb_sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_sparepart_detail`
--
ALTER TABLE `t_spb_sparepart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_sparepart_detail_keluar`
--
ALTER TABLE `t_spb_sparepart_detail_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_spb_wip`
--
ALTER TABLE `t_spb_wip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_spb_wip_detail`
--
ALTER TABLE `t_spb_wip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `t_spb_wip_fulfilment`
--
ALTER TABLE `t_spb_wip_fulfilment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_surat_jalan`
--
ALTER TABLE `t_surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_surat_jalan_detail`
--
ALTER TABLE `t_surat_jalan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
