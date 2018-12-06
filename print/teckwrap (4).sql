-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 01:39 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teckwrap`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id` int(5) NOT NULL,
  `product_inquery_id` int(11) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `po_line_id` int(11) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qty` tinyint(1) NOT NULL,
  `so_line_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id`, `product_inquery_id`, `barcode`, `po_line_id`, `createdon`, `qty`, `so_line_id`) VALUES
(1, 2, '1808ECHS010001', 2, '2018-08-29 14:00:25', 0, 4),
(2, 2, '1808ECHS010002', 2, '2018-08-29 14:00:25', 0, 3),
(3, 2, '1808ECHS010003', 2, '2018-08-29 14:00:25', 0, 2),
(4, 2, '1808ECHS010004', 2, '2018-08-29 14:00:25', 1, NULL),
(5, 2, '1808ECHS010005', 2, '2018-08-29 14:00:25', 0, 9),
(6, 2, '1808ECHS010006', 2, '2018-08-29 14:00:25', 1, NULL),
(7, 2, '1808ECHS010007', 2, '2018-08-29 14:00:25', 1, NULL),
(8, 2, '1808ECHS010008', 2, '2018-08-29 14:00:25', 1, NULL),
(9, 2, '1808ECHS010009', 2, '2018-08-29 14:00:25', 1, NULL),
(10, 2, '1808ECHS010010', 2, '2018-08-29 14:00:25', 1, NULL),
(11, 1, '1808ECHS020001', 1, '2018-08-29 14:00:32', 0, 1),
(12, 1, '1808ECHS020002', 1, '2018-08-29 14:00:32', 1, NULL),
(13, 1, '1808ECHS020003', 1, '2018-08-29 14:00:32', 1, NULL),
(14, 1, '1808ECHS020004', 1, '2018-08-29 14:00:32', 1, NULL),
(15, 1, '1808ECHS020005', 1, '2018-08-29 14:00:32', 1, NULL),
(16, 1, '1808ECHS020006', 1, '2018-08-29 14:00:32', 1, NULL),
(17, 1, '1808ECHS020007', 1, '2018-08-29 14:00:32', 1, NULL),
(18, 1, '1808ECHS020008', 1, '2018-08-29 14:00:32', 1, NULL),
(19, 1, '1808ECHS020009', 1, '2018-08-29 14:00:32', 1, NULL),
(20, 1, '1808ECHS020010', 1, '2018-08-29 14:00:32', 1, NULL),
(21, 1, '1808ECHS020011', 3, '2018-08-29 14:21:09', 1, NULL),
(22, 1, '1808ECHS020012', 3, '2018-08-29 14:21:09', 1, NULL),
(23, 1, '1808ECHS020013', 3, '2018-08-29 14:21:09', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_unit`
--

CREATE TABLE `business_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `prefix` varchar(2) NOT NULL,
  `ware_house` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_unit`
--

INSERT INTO `business_unit` (`id`, `name`, `address`, `prefix`, `ware_house`) VALUES
(1, 'TOKO', 'tanah abang', 'TK', 0),
(2, 'Warehouse', 'warehouse', 'WS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `updatedby` varchar(50) NOT NULL,
  `createdon` date NOT NULL,
  `updatedon` date NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone`, `note`, `createdby`, `updatedby`, `createdon`, `updatedon`, `active`) VALUES
(1, 'Diamond.', 'jakarta', '08977', 'test', 'yung fei', 'yung fei', '2018-03-29', '2018-03-28', 1),
(2, 'Customer 1', 'alamat customer 1, jawa vbarat', '11111', 'toko pertama', 'admin', '', '2018-08-27', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transaction`
--

CREATE TABLE `inventory_transaction` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `type` int(1) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `createdon` date NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `business_unit_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_transaction`
--

INSERT INTO `inventory_transaction` (`id`, `transaction_number`, `status`, `type`, `reference`, `createdon`, `createdby`, `business_unit_id`, `transaction_date`, `total`) VALUES
(1, 'IVRTK2018080001', 2, 1, 'POTK2018080001', '2018-08-29', 'admin', 1, '2018-08-29', 30000000),
(2, 'IVSTK2018080001', 2, 2, 'SOTK2018080001', '2018-08-29', 'admin', 1, '2018-08-29', 5000000),
(3, 'IVRTK29080001', 2, 1, 'CSOTK29080001', '2018-08-29', 'admin', 1, '2018-08-29', 5000000),
(4, 'IVRTK2018080002', 2, 1, 'POTK2018080002', '2018-08-29', 'admin', 1, '2018-08-29', 1500000),
(5, 'IVSTK2018080002', 2, 2, 'SOTK2018080002', '2018-08-29', 'admin', 1, '2018-08-29', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transaction_line`
--

CREATE TABLE `inventory_transaction_line` (
  `id` int(11) NOT NULL,
  `inventory_transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_transaction_line`
--

INSERT INTO `inventory_transaction_line` (`id`, `inventory_transaction_id`, `product_id`, `price`, `qty`, `discount`, `total`) VALUES
(1, 1, 2, 2000000, 10, 0, 20000000),
(2, 1, 1, 1000000, 10, 0, 10000000),
(3, 2, 2, 2000000, 1, 0, 2000000),
(4, 2, 1, 1000000, 1, 0, 1000000),
(5, 2, 1, 1000000, 1, 0, 1000000),
(6, 2, 1, 1000000, 1, 0, 1000000),
(7, 3, 1, 1000000, 1, 0, 1000000),
(8, 3, 1, 1000000, 1, 0, 1000000),
(9, 3, 1, 1000000, 1, 0, 1000000),
(10, 3, 2, 2000000, 1, 0, 2000000),
(11, 4, 2, 500000, 3, 0, 1500000),
(12, 5, 1, 1000000, 1, 0, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transaction_type`
--

CREATE TABLE `inventory_transaction_type` (
  `id` int(11) NOT NULL,
  `description` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transfer`
--

CREATE TABLE `inventory_transfer` (
  `id` int(11) NOT NULL,
  `inventory_transfer_number` varchar(20) NOT NULL,
  `from_business_id` int(11) NOT NULL,
  `to_business_id` int(11) NOT NULL,
  `transfer_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `createdon` date NOT NULL,
  `createdby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transfer_line`
--

CREATE TABLE `inventory_transfer_line` (
  `id` int(11) NOT NULL,
  `inventory_transfer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_print_barcode`
--

CREATE TABLE `m_print_barcode` (
  `id` int(11) NOT NULL,
  `nama_barcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_print_barcode`
--

INSERT INTO `m_print_barcode` (`id`, `nama_barcode`) VALUES
(1, 'barcode_fg1'),
(2, 'barcode_palete_dtr'),
(3, 'barcode_palete_ttr');

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
(23, 1, 23, 'BARCODE 612,101,\"39\",41,0,180,2,6,\"171102A02007700\"', 'barcode_nomor_bobbin'),
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
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `description`, `bank_account`, `active`) VALUES
(1, 'Cash', '', 1),
(2, 'Bank Bca', '3312233441', 1),
(3, 'Bank Mandiri', '7738484995\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `description`, `active`) VALUES
(1, 'Super User', 1),
(2, 'admin', 1),
(3, 'gudang', 1),
(4, 'penjaga toko', 1),
(5, 'fake user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `barcode_code` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `createdon` date DEFAULT NULL,
  `createdby` varchar(50) NOT NULL,
  `updatedon` date DEFAULT NULL,
  `updatedby` varchar(50) NOT NULL,
  `product_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_type_id`, `description`, `color`, `size`, `barcode_code`, `price`, `createdon`, `createdby`, `updatedon`, `updatedby`, `product_code`) VALUES
(1, 1, 'sticker', 'maroon', '', '', 1000000, '2018-08-29', 'admin', NULL, '', 'ECHS01'),
(2, 1, 'sticker', 'maroon metallic', '', '', 2000000, '2018-08-29', 'admin', NULL, '', 'ECHS02');

-- --------------------------------------------------------

--
-- Table structure for table `product_inquery`
--

CREATE TABLE `product_inquery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `business_unit_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `updatedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_inquery`
--

INSERT INTO `product_inquery` (`id`, `product_id`, `business_unit_id`, `qty`, `updatedon`) VALUES
(1, 2, 1, 13, '2018-08-29 07:20:54'),
(2, 1, 1, 9, '2018-08-29 12:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `createdon` date DEFAULT NULL,
  `updatedon` date DEFAULT NULL,
  `createdby` varchar(20) NOT NULL,
  `updatedby` varchar(20) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `barcode_generated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `description`, `alias`, `createdon`, `updatedon`, `createdby`, `updatedby`, `active`, `barcode_generated`) VALUES
(1, 'sticker', 'sticker', '2018-03-26', '2018-08-23', 'yung fei', 'yung fei', 1, 1),
(2, 'Spidol', 'spidol', '2018-03-27', '2018-08-23', 'yung fei', 'yung fei', 1, 0),
(3, 'dress', 'dress', '2018-03-27', NULL, 'yung fei', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `purchase_order_number` varchar(15) NOT NULL,
  `total` double NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `business_unit_id` int(5) NOT NULL,
  `transaction_date` date NOT NULL,
  `referrence` varchar(15) NOT NULL,
  `updatedon` datetime DEFAULT NULL,
  `updatedby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `purchase_order_number`, `total`, `createdon`, `createdby`, `status`, `supplier_id`, `business_unit_id`, `transaction_date`, `referrence`, `updatedon`, `updatedby`) VALUES
(1, 'POTK2018080001', 30000000, '2018-08-29 14:00:16', 'admin', 2, 1, 1, '2018-08-29', '', NULL, NULL),
(2, 'POTK2018080002', 1500000, '2018-08-29 14:20:54', 'admin', 2, 1, 1, '2018-08-29', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_line`
--

CREATE TABLE `purchase_order_line` (
  `id` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL,
  `barcoded` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_line`
--

INSERT INTO `purchase_order_line` (`id`, `purchase_order_id`, `product_id`, `price`, `qty`, `total`, `barcoded`) VALUES
(1, 1, 2, 2000000, 10, 20000000, 1),
(2, 1, 1, 1000000, 10, 10000000, 1),
(3, 2, 2, 500000, 3, 1500000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `sales_order_number` varchar(50) NOT NULL,
  `transaction_date` date NOT NULL,
  `total_before_discount` float NOT NULL,
  `total_discount` float NOT NULL,
  `total_after_discount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` varchar(50) NOT NULL,
  `business_unit_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `referrence` varchar(15) NOT NULL,
  `updatedby` varchar(50) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `sales_order_number`, `transaction_date`, `total_before_discount`, `total_discount`, `total_after_discount`, `status`, `createdon`, `createdby`, `business_unit_id`, `customer_id`, `payment_method`, `referrence`, `updatedby`, `updatedon`) VALUES
(1, 'SOTK2018080001', '2018-08-29', 5000000, 0, 5000000, 4, '2018-08-29 14:01:37', 'admin', 1, 2, NULL, 'CSOTK29080001', 'admin', '2018-08-29 07:02:14'),
(2, 'CSOTK29080001', '2018-08-29', 5000000, 0, 5000000, 2, '2018-08-29 14:02:14', 'admin', 1, 2, NULL, 'SOTK2018080001', NULL, NULL),
(3, 'SOTK2018080002', '2018-08-29', 1000000, 0, 1000000, 2, '2018-08-29 19:18:32', 'admin', 1, 2, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_line`
--

CREATE TABLE `sales_order_line` (
  `id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `total_before_discount` double NOT NULL,
  `discount` double NOT NULL,
  `total_after_discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_line`
--

INSERT INTO `sales_order_line` (`id`, `sales_order_id`, `product_id`, `qty`, `price`, `total_before_discount`, `discount`, `total_after_discount`) VALUES
(1, 1, 2, 1, 2000000, 2000000, 0, 2000000),
(2, 1, 1, 1, 1000000, 1000000, 0, 1000000),
(3, 1, 1, 1, 1000000, 1000000, 0, 1000000),
(4, 1, 1, 1, 1000000, 1000000, 0, 1000000),
(5, 2, 1, 1, 1000000, 1000000, 0, 1000000),
(6, 2, 1, 1, 1000000, 1000000, 0, 1000000),
(7, 2, 1, 1, 1000000, 1000000, 0, 1000000),
(8, 2, 2, 1, 2000000, 2000000, 0, 2000000),
(9, 3, 1, 1, 1000000, 1000000, 0, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `description`) VALUES
(1, 'open'),
(2, 'release'),
(3, 'need approved'),
(4, 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `createdon` date NOT NULL,
  `updatedon` date NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `updatedby` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `alias`, `address`, `phone`, `createdon`, `updatedon`, `createdby`, `updatedby`, `active`) VALUES
(1, 'PT ABC', 'ABC', 'jakarta', '0883987', '2018-03-28', '2018-03-28', 'yung fei', 'yung fei', 1),
(2, 'ttt', 'dd', 'ds', '2233', '2018-03-29', '0000-00-00', 'yung fei', '', 1),
(3, 'yf', '', 'jakarta', '0887889', '2018-03-29', '0000-00-00', 'yung fei', '', 1),
(4, 'f', '', 'jakarta', '9008', '2018-03-29', '0000-00-00', 'yung fei', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barcode_code`
--

CREATE TABLE `tb_barcode_code` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nama_barcode` text NOT NULL,
  `line_no` int(2) NOT NULL,
  `string` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_printer_code`
--

CREATE TABLE `tb_printer_code` (
  `id` int(11) NOT NULL,
  `string` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_printer_code`
--

INSERT INTO `tb_printer_code` (`id`, `string`) VALUES
(1, '^Q46,3,0+'),
(2, '^W73'),
(3, '^H10'),
(4, '^P3'),
(5, '^S2'),
(6, '^AD'),
(7, '^C2'),
(8, '^R5'),
(9, '~Q+5'),
(10, '^O0'),
(11, '^D0'),
(12, '^E35'),
(13, '~R200'),
(14, '^L'),
(15, 'Dy2-me-dd'),
(16, 'Th:m:s'),
(17, 'C0,0011,+1,Prompt'),
(18, 'BA,20,100,2,5,200,0,3,1808ECHS02^C0'),
(19, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `id` int(11) NOT NULL,
  `description` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`id`, `description`) VALUES
(1, 'in'),
(2, 'out');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `business_unit_id` int(5) DEFAULT NULL,
  `privilege` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `isdelete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `business_unit_id`, `privilege`, `name`, `phone`, `active`, `isdelete`) VALUES
(1, 'yungfei', '794885428ddb12e1b64e52fb6650de0e', NULL, 1, 'yung fei', '000000000', 1, 0),
(2, 'admin', '794885428ddb12e1b64e52fb6650de0e', 1, 2, 'admin', '0898', 1, 0),
(3, 'test', 'd7fbf683b7b23db6bb08447cf9e18995', NULL, 1, 'test', '772828', 1, 0),
(4, 'icupid', '794885428ddb12e1b64e52fb6650de0e', 1, 2, 'aaaa', '23424', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_unit`
--
ALTER TABLE `business_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_transaction`
--
ALTER TABLE `inventory_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_transaction_line`
--
ALTER TABLE `inventory_transaction_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_transaction_type`
--
ALTER TABLE `inventory_transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_transfer`
--
ALTER TABLE `inventory_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_transfer_line`
--
ALTER TABLE `inventory_transfer_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_inquery`
--
ALTER TABLE `product_inquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_line`
--
ALTER TABLE `purchase_order_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_line`
--
ALTER TABLE `sales_order_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_printer_code`
--
ALTER TABLE `tb_printer_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_unit_id` (`business_unit_id`),
  ADD KEY `privilege` (`privilege`),
  ADD KEY `active` (`active`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `business_unit`
--
ALTER TABLE `business_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_transaction`
--
ALTER TABLE `inventory_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory_transaction_line`
--
ALTER TABLE `inventory_transaction_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory_transaction_type`
--
ALTER TABLE `inventory_transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_transfer`
--
ALTER TABLE `inventory_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_transfer_line`
--
ALTER TABLE `inventory_transfer_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_inquery`
--
ALTER TABLE `product_inquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_order_line`
--
ALTER TABLE `purchase_order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_order_line`
--
ALTER TABLE `sales_order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_printer_code`
--
ALTER TABLE `tb_printer_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
