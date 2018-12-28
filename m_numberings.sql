-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 07:25 AM
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
(66, 'BPB-RTR', 1, 4, '.', '.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_numberings`
--
ALTER TABLE `m_numberings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_numberings`
--
ALTER TABLE `m_numberings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
