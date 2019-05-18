-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 03:58 PM
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
(15, 'POAMP', 1, 4, '.', '.'),
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
(53, 'SPB-FG', 1, 4, '.', '.'),
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
(98, 'SO-T', 1, 4, '.', '.'),
(99, 'POFG-KMP', 1, 4, '.', '.'),
(100, 'POW-KMP', 1, 4, '.', '.'),
(101, 'PO-KMP', 1, 4, '.', '.'),
(102, 'SO-KMP', 1, 4, '.', '.'),
(103, 'SJ-KMP', 1, 4, '.', '.'),
(104, 'INV-KMP', 1, 4, '.', '.'),
(105, 'CM', 2, 5, '.', '.'),
(106, 'CM-KMP', 2, 5, '.', '.'),
(107, 'CK', 2, 5, '.', '.'),
(108, 'CK-KMP', 2, 5, '.', '.'),
(109, 'BM', 2, 5, '.', '.'),
(110, 'BM-KMP', 2, 5, '.', '.'),
(111, 'BK', 2, 5, '.', '.'),
(112, 'BK-KMP', 2, 5, '.', '.'),
(113, 'KM', 2, 5, '.', '.'),
(114, 'KM-KMP', 2, 5, '.', '.'),
(115, 'KK', 2, 5, '.', '.'),
(116, 'KK-KMP', 2, 5, '.', '.'),
(117, 'MTCH', 1, 4, '.', '.'),
(118, 'MTCH-KMP', 1, 4, '.', '.'),
(119, 'VC-KMP', 1, 4, '.', '.'),
(120, 'VSP-KMP', 1, 4, '.', '.'),
(121, 'DTR-TKMP', 1, 4, '.', '.'),
(122, 'DTR-KMP', 1, 4, '.', '.'),
(123, 'TTR-KMP', 1, 4, '.', '.'),
(124, 'DTR-RTR', 1, 4, '.', '.'),
(125, 'BPB-WIPR', 1, 4, '.', '.'),
(126, 'RTR-KMP', 1, 4, '.', '.'),
(127, 'VK', 1, 4, '.', '.'),
(128, 'PPS-KMP', 1, 4, '.', '.'),
(129, 'POSP-KMP', 1, 4, '.', '.'),
(130, 'BPB-KMP', 1, 4, '.', '.'),
(131, 'VRSK-KMP', 1, 4, '.', '.'),
(132, 'VK-KMP', 1, 4, '.', '.'),
(133, 'DTBJ-KMP', 1, 4, '.', '.'),
(134, 'DTWP-KMP', 1, 4, '.', '.'),
(135, 'VFG-KMP', 1, 4, '.', '.'),
(136, 'VWIP-KMP', 1, 4, '.', '.'),
(137, 'RB', 1, 3, '', ''),
(138, 'RK', 1, 3, '', ''),
(139, 'KARDUS', 1, 4, '', ''),
(140, 'RONGSOK', 1, 4, '', ''),
(141, 'INVR-KMP', 1, 4, '.', '.'),
(142, 'SPB-AMP', 1, 4, '.', '.'),
(143, 'DTA', 1, 4, '.', '.'),
(144, 'DTA-KMP', 1, 4, '.', '.'),
(145, 'BOBBIN', 1, 4, '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
