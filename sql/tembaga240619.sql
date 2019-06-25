-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2019 at 04:22 PM
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_t_bpb_detail`
--
ALTER TABLE `r_t_bpb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_t_gudang_fg`
--
ALTER TABLE `r_t_gudang_fg`
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
