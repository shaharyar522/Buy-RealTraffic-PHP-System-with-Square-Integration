-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2008 at 06:06 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sawbrcom_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE IF NOT EXISTS `administration` (
  `id` int(2) NOT NULL auto_increment,
  `promote` blob NOT NULL,
  `wcm` blob NOT NULL,
  `indexp` blob NOT NULL,
  `faq` blob NOT NULL,
  `member` blob NOT NULL,
  `joinp` blob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Site settings and content' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `promote`, `wcm`, `indexp`, `faq`, `member`, `joinp`) VALUES
(1, 0x70726f6d6f74652727272727273a29, 0x446561722025757365726e616d65252c0d0a5468616e6b20796f7520666f72206a6f696e696e67210d0a596f752063616d206c6f67696e206e6f7720746f20796f7572206578636c7573697665206d656d62657220617265612e0d0a4265737420726567617264732c0d0a41646d696e, 0x266c743b64697620636c6173733d746578742667743b266c743b7374726f6e672667743b5468616e6b20796f7520666f72207573696e672054686552616e646f6d697a65722e266c743b2f7374726f6e672667743b266c743b62722667743b0d0a596f752063616e2061646420686572652074686520636f6e74656e7420666f7220796f757220696e64657820706167652e266c743b62722667743b20266c743b62722667743b266c743b62722667743b266c743b62722667743b266c743b62722667743b266c743b62722667743b266c743b62722667743b266c743b62722667743b266c743b62722667743b266c743b62722667743b, 0x266c743b64697620616c69676e3d63656e74657220636c6173733d746578742667743b0d0a4661712070616765200d0a266c743b62722667743b0d0a456469742069742066726f6d207468652061646d696e20617265612e0d0a, 0x4d656d62657220616e6e6f756e63656d656e74733a266c743b756c2667743b0d0a266c743b6c692667743b6669727374206974656d2068657265266c743b2f6c692667743b0d0a266c743b6c692667743b7365636f6e64206974656d2068657265266c743b2f6c692667743b0d0a266c743b2f756c2667743b, 0x266c743b64697620636c6173733d746578742667743b4a6f696e206e6f7720);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(5) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `urlto` varchar(100) NOT NULL default '',
  `clicks` mediumint(5) NOT NULL default '0',
  `views` mediumint(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Banners' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `username`, `url`, `urlto`, `clicks`, `views`) VALUES
(1, 'admin', 'http://www.esbhost.com/banners/esb/host1.jpg', 'http://www.esbhost.com/', 11, 397);

-- --------------------------------------------------------

--
-- Table structure for table `chances`
--

CREATE TABLE IF NOT EXISTS `chances` (
  `id` int(4) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL default '',
  `start` int(9) NOT NULL default '0',
  `finish` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Tickets for the randomizer system-DO NOT EDIT' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chances`
--

INSERT INTO `chances` (`id`, `username`, `start`, `finish`) VALUES
(1, 'admin', 1, 2),
(2, 'mdr1463', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chances_temp`
--

CREATE TABLE IF NOT EXISTS `chances_temp` (
  `id` int(5) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL default '',
  `credits` int(3) NOT NULL default '0',
  `status` enum('accepted','rejected','unverified') NOT NULL default 'accepted',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Temporary table containining unverified weight purchases' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chances_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE IF NOT EXISTS `hits` (
  `id` int(20) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `refer` varchar(255) NOT NULL default '',
  `ip` varchar(16) NOT NULL default '',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='hits' AUTO_INCREMENT=195 ;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`id`, `username`, `refer`, `ip`, `date`) VALUES
(1, 'admin', '', '71.237.157.13', '2008-03-25 23:54:46'),
(2, 'admin', 'http://b2quick.com/', '71.237.157.13', '2008-03-26 00:38:37'),
(3, 'admin', '', '66.249.67.186', '2008-03-27 18:27:05'),
(4, 'admin', '', '66.249.73.237', '2008-03-27 21:55:56'),
(5, 'admin', '', '66.249.73.237', '2008-03-27 22:13:50'),
(6, 'admin', '', '194.76.38.235', '2008-03-27 22:21:27'),
(7, 'admin', '', '194.76.38.235', '2008-03-27 22:21:27'),
(8, 'admin', '', '194.76.38.235', '2008-03-27 22:21:28'),
(9, 'admin', '', '194.76.38.235', '2008-03-27 22:21:28'),
(10, 'admin', '', '194.76.38.235', '2008-03-27 22:21:35'),
(11, 'admin', '', '194.76.38.235', '2008-03-27 22:21:36'),
(12, 'admin', '', '194.76.38.235', '2008-03-27 22:21:39'),
(13, 'admin', '', '66.249.73.237', '2008-03-27 22:30:21'),
(14, 'admin', '', '66.249.73.237', '2008-03-27 22:35:54'),
(15, 'admin', '', '66.249.73.237', '2008-03-27 22:37:31'),
(16, 'admin', '', '38.104.58.118', '2008-03-28 01:30:43'),
(17, 'admin', '', '38.104.58.118', '2008-03-28 01:30:44'),
(18, 'admin', '', '66.249.73.237', '2008-03-28 02:11:32'),
(19, 'admin', '', '66.249.73.237', '2008-03-28 02:14:39'),
(20, 'admin', '', '66.249.73.237', '2008-03-28 05:05:59'),
(21, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '65.185.73.210', '2008-03-28 10:04:17'),
(22, 'admin', '', '66.246.218.57', '2008-03-28 15:37:07'),
(23, 'admin', '', '66.246.218.57', '2008-03-28 15:37:07'),
(24, 'admin', '', '66.246.218.57', '2008-03-28 15:37:08'),
(25, 'admin', '', '66.246.218.57', '2008-03-28 15:37:08'),
(26, 'admin', '', '66.246.218.57', '2008-03-28 15:37:14'),
(27, 'admin', '', '66.246.218.57', '2008-03-28 15:37:14'),
(28, 'admin', 'http://b2quick.com/', '71.237.157.13', '2008-03-31 22:21:21'),
(29, 'admin', '', '74.6.29.229', '2008-04-01 10:28:13'),
(30, 'admin', '', '66.249.70.242', '2008-04-03 03:20:11'),
(31, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '82.101.184.41', '2008-04-03 04:04:01'),
(32, 'admin', '', '66.249.70.236', '2008-04-03 13:01:53'),
(33, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '124.13.119.33', '2008-04-03 13:57:32'),
(34, 'admin', 'http://www.b2quick.com/', '38.100.41.112', '2008-04-03 20:55:31'),
(35, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '41.249.47.72', '2008-04-04 01:40:44'),
(36, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '41.249.49.222', '2008-04-04 06:10:55'),
(37, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89&osCsid=0da8dba93b6485b7e3f12c650a8459dc', '83.188.194.78', '2008-04-04 11:58:42'),
(38, 'admin', '', '66.249.70.236', '2008-04-05 08:18:29'),
(39, 'admin', '', '66.249.70.236', '2008-04-06 07:47:42'),
(40, 'admin', '', '66.249.70.236', '2008-04-06 21:43:46'),
(41, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '91.65.83.225', '2008-04-07 20:29:02'),
(42, 'admin', '', '66.249.70.236', '2008-04-08 05:46:40'),
(43, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89&osCsid=b4df80a37262077b574e0553730251ce', '208.44.92.135', '2008-04-08 22:10:56'),
(44, 'admin', '', '66.249.70.236', '2008-04-09 11:41:15'),
(45, 'admin', '', '66.249.70.236', '2008-04-09 11:41:32'),
(46, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '74.92.62.137', '2008-04-09 22:29:26'),
(47, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89&osCsid=6af8503b301258460867d00a6bfffd70', '200.232.239.217', '2008-04-10 01:56:12'),
(48, 'admin', 'http://b2quick.com/', '82.101.184.52', '2008-04-10 21:40:21'),
(49, 'admin', '', '66.249.70.236', '2008-04-11 09:42:59'),
(50, 'admin', '', '65.214.44.129', '2008-04-11 16:54:41'),
(51, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '87.163.233.125', '2008-04-11 17:00:42'),
(52, 'admin', '', '66.249.70.236', '2008-04-12 20:41:43'),
(53, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '79.143.164.45', '2008-04-12 23:58:32'),
(54, 'admin', '', '66.249.70.236', '2008-04-13 04:57:37'),
(55, 'admin', '', '87.196.165.111', '2008-04-13 19:54:33'),
(56, 'admin', '', '66.249.70.236', '2008-04-14 00:16:08'),
(57, 'admin', '', '66.249.70.236', '2008-04-14 00:25:21'),
(58, 'admin', '', '66.249.70.236', '2008-04-14 15:40:55'),
(59, 'admin', '', '65.55.212.212', '2008-04-15 00:12:21'),
(60, 'admin', '', '66.249.70.236', '2008-04-15 21:55:56'),
(61, 'admin', '', '65.55.212.212', '2008-04-15 22:24:44'),
(62, 'admin', '', '65.55.212.212', '2008-04-15 22:30:02'),
(63, 'admin', '', '65.55.212.212', '2008-04-16 00:40:23'),
(64, 'admin', '', '65.55.212.212', '2008-04-16 00:40:26'),
(65, 'admin', '', '65.55.212.212', '2008-04-16 00:59:15'),
(66, 'admin', '', '65.55.212.212', '2008-04-16 01:02:40'),
(67, 'admin', '', '66.249.70.236', '2008-04-16 22:23:30'),
(68, 'admin', '', '66.249.70.236', '2008-04-16 22:29:49'),
(69, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89&osCsid=b5987c001ff0177dcf7741de79e102e9', '89.40.93.84', '2008-04-18 21:34:14'),
(70, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '190.138.181.87', '2008-04-19 11:15:49'),
(71, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '65.75.194.26', '2008-04-19 13:20:09'),
(72, 'admin', '', '66.249.70.236', '2008-04-19 14:15:35'),
(73, 'admin', '', '66.249.70.236', '2008-04-19 14:26:57'),
(74, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '24.123.134.105', '2008-04-20 05:23:20'),
(75, 'admin', '', '66.249.70.236', '2008-04-20 21:31:10'),
(76, 'admin', '', '66.249.70.236', '2008-04-21 07:27:40'),
(77, 'admin', '', '87.229.8.192', '2008-04-21 20:26:55'),
(78, 'admin', '', '195.238.172.13', '2008-04-21 21:36:33'),
(79, 'admin', '', '195.238.172.13', '2008-04-21 21:36:41'),
(80, 'admin', '', '195.238.172.13', '2008-04-21 21:36:41'),
(81, 'admin', '', '209.234.171.40', '2008-04-21 23:42:26'),
(82, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89&osCsid=3030440452dcec6176e6826a13c77651', '41.226.133.236', '2008-04-22 01:17:56'),
(83, 'admin', '', '209.234.171.40', '2008-04-22 23:46:58'),
(84, 'admin', '', '209.234.171.40', '2008-04-23 00:22:02'),
(85, 'admin', '', '209.234.171.40', '2008-04-23 01:25:07'),
(86, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '81.230.68.229', '2008-04-24 01:34:43'),
(87, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '201.252.55.129', '2008-04-24 03:26:39'),
(88, 'admin', '', '66.249.70.236', '2008-04-24 13:40:45'),
(89, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '124.181.207.47', '2008-04-25 16:51:43'),
(90, 'admin', '', '71.212.220.29', '2008-04-27 11:02:27'),
(91, 'admin', '', '58.107.192.195', '2008-04-27 14:19:17'),
(92, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89&osCsid=9f9cf6b6f0a9ba7d299b382236bad396', '86.22.36.2', '2008-04-27 16:10:21'),
(93, 'admin', '', '66.249.70.236', '2008-04-27 22:21:02'),
(94, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '41.219.214.119', '2008-04-28 00:53:12'),
(95, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '216.113.231.187', '2008-04-29 02:21:50'),
(96, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '216.113.231.187', '2008-04-29 03:03:01'),
(97, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '142.167.216.87', '2008-04-29 08:00:10'),
(98, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '76.117.143.194', '2008-04-29 08:29:48'),
(99, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '75.177.169.175', '2008-04-29 10:45:14'),
(100, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '117.3.22.207', '2008-04-29 11:48:00'),
(101, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '65.184.202.112', '2008-04-30 21:07:44'),
(102, 'admin', '', '66.249.70.236', '2008-05-01 16:04:25'),
(103, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '124.217.88.29', '2008-05-01 23:44:03'),
(104, 'admin', '', '66.249.70.236', '2008-05-02 06:10:20'),
(105, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89&osCsid=840f5f90ab280e8037b7163e9bbec72c', '194.126.4.19', '2008-05-02 14:26:21'),
(106, 'admin', 'http://b2quick.com/alertpaystpayegoldrandomizer/', '194.126.4.19', '2008-05-02 14:26:25'),
(107, 'admin', '', '67.15.191.24', '2008-05-03 03:20:41'),
(108, 'admin', '', '67.15.191.24', '2008-05-03 03:20:42'),
(109, 'admin', '', '67.15.191.24', '2008-05-03 03:20:42'),
(110, 'admin', '', '67.15.191.24', '2008-05-03 03:20:42'),
(111, 'admin', '', '67.15.191.24', '2008-05-03 03:20:44'),
(112, 'admin', '', '67.15.191.24', '2008-05-03 03:20:44'),
(113, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '217.151.224.29', '2008-05-04 00:42:07'),
(114, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '65.184.202.112', '2008-05-05 01:18:35'),
(115, 'admin', 'http://b2quick.com/alertpaystpayegoldrandomizer/login.php', '65.184.202.112', '2008-05-05 01:21:45'),
(116, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '129.33.1.37', '2008-05-05 14:52:51'),
(117, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '75.177.169.175', '2008-05-06 10:40:25'),
(118, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '77.100.93.52', '2008-05-06 16:20:15'),
(119, 'admin', '', '66.249.70.219', '2008-05-06 23:20:36'),
(120, 'admin', 'http://www.b2quick.com/', '38.100.41.112', '2008-05-07 14:40:31'),
(121, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '190.138.187.168', '2008-05-07 15:11:19'),
(122, 'admin', '', '74.6.29.229', '2008-05-07 17:09:50'),
(123, 'admin', '', '74.6.25.50', '2008-05-07 17:12:49'),
(124, 'admin', '', '74.6.24.225', '2008-05-07 17:12:51'),
(125, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '24.179.97.82', '2008-05-07 21:01:21'),
(126, 'admin', '', '74.6.11.227', '2008-05-08 09:24:16'),
(127, 'admin', '', '72.30.179.254', '2008-05-08 11:43:58'),
(128, 'admin', '', '66.249.70.219', '2008-05-08 17:13:25'),
(129, 'admin', '', '65.55.211.146', '2008-05-10 06:46:56'),
(130, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '172.131.240.129', '2008-05-10 09:29:11'),
(131, 'admin', '', '74.6.31.103', '2008-05-10 20:18:17'),
(132, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '72.139.22.109', '2008-05-10 20:50:10'),
(133, 'admin', '', '66.249.70.219', '2008-05-11 17:15:22'),
(134, 'admin', '', '66.249.70.219', '2008-05-12 05:57:00'),
(135, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '41.251.4.59', '2008-05-12 18:23:17'),
(136, 'admin', '', '66.249.70.219', '2008-05-13 14:12:53'),
(137, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89&osCsid=9f4ee9e1d60047c1f37effd46250620b', '65.184.202.112', '2008-05-14 07:17:02'),
(138, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '75.177.169.175', '2008-05-14 11:35:38'),
(139, 'admin', '', '66.249.70.20', '2008-05-15 01:08:20'),
(140, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '142.167.197.107', '2008-05-15 08:14:46'),
(141, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '41.219.241.11', '2008-05-15 13:16:57'),
(142, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '65.75.194.26', '2008-05-16 12:22:12'),
(143, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '77.242.145.231', '2008-05-16 19:54:15'),
(144, 'admin', '', '64.27.10.35', '2008-05-17 03:56:18'),
(145, 'admin', '', '64.27.10.35', '2008-05-17 03:56:18'),
(146, 'admin', '', '66.249.73.136', '2008-05-18 06:44:44'),
(147, 'admin', '', '66.249.73.136', '2008-05-18 07:16:28'),
(148, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '190.138.186.84', '2008-05-18 13:07:02'),
(149, 'admin', '', '74.6.29.229', '2008-05-18 15:59:13'),
(150, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '83.83.255.119', '2008-05-18 15:59:28'),
(151, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '41.250.140.24', '2008-05-18 21:54:25'),
(152, 'admin', '', '66.249.73.136', '2008-05-19 09:26:56'),
(153, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '75.177.169.175', '2008-05-19 12:10:38'),
(154, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '220.225.148.68', '2008-05-19 22:44:07'),
(155, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '74.66.242.207', '2008-05-20 01:36:59'),
(156, 'admin', '', '90.32.99.116', '2008-05-20 06:38:42'),
(157, 'admin', '', '66.249.73.136', '2008-05-20 09:33:24'),
(158, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '24.123.134.105', '2008-05-20 20:34:11'),
(159, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '65.35.40.138', '2008-05-21 05:42:44'),
(160, 'admin', '', '66.249.73.136', '2008-05-21 13:00:43'),
(161, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '83.83.255.119', '2008-05-21 21:52:16'),
(162, 'admin', '', '66.249.70.233', '2008-05-22 19:53:34'),
(163, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '87.218.121.227', '2008-05-22 23:51:01'),
(164, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '87.218.121.227', '2008-05-23 00:10:08'),
(165, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '12.217.215.14', '2008-05-23 09:24:19'),
(166, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '190.136.100.222', '2008-05-23 13:44:52'),
(167, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '72.141.217.71', '2008-05-23 17:37:46'),
(168, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '98.215.130.98', '2008-05-23 17:42:47'),
(169, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '98.215.130.98', '2008-05-23 19:05:50'),
(170, 'admin', '', '208.99.195.54', '2008-05-24 00:04:45'),
(171, 'admin', '', '208.99.195.54', '2008-05-24 01:37:47'),
(172, 'admin', '', '208.99.195.54', '2008-05-24 01:38:33'),
(173, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '190.139.212.58', '2008-05-24 12:07:56'),
(174, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '64.53.22.163', '2008-05-25 05:15:56'),
(175, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '66.249.85.65', '2008-05-25 07:00:39'),
(176, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '190.136.103.118', '2008-05-25 21:30:00'),
(177, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '41.219.223.56', '2008-05-26 03:06:47'),
(178, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '12.217.215.14', '2008-05-26 05:33:22'),
(179, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89{1}7', '12.217.215.14', '2008-05-26 07:14:52'),
(180, 'admin', '', '66.249.70.233', '2008-05-26 20:55:15'),
(181, 'admin', 'http://cobrascripts.com/product_info.php?products_id=89', '41.224.227.23', '2008-05-26 21:59:54'),
(182, 'admin', '', '209.234.171.40', '2008-05-27 00:55:25'),
(183, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '12.217.215.14', '2008-05-27 01:15:29'),
(184, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '66.249.85.65', '2008-05-27 05:58:18'),
(185, 'admin', 'http://b2quick.com/alertpaystpayegoldrandomizer', '66.249.85.65', '2008-05-27 05:58:18'),
(186, 'admin', 'http://cobrascripts.com/product_info.php?cPath=24&products_id=89', '66.249.85.65', '2008-05-27 06:11:27'),
(187, 'admin', '', '209.234.171.40', '2008-05-27 09:02:32'),
(188, 'admin', '', '66.249.70.233', '2008-05-27 13:45:31'),
(189, 'admin', '', '66.249.70.233', '2008-05-27 15:00:23'),
(190, 'admin', 'http://cobrascripts.com/oldstore/product_info.php?cPath=24&products_id=89', '71.237.157.13', '2008-05-28 23:38:47'),
(191, 'mdr1463', '', '66.190.245.94', '2008-09-12 05:29:48'),
(192, '', '', '207.200.116.9', '2008-09-12 06:04:27'),
(193, '', 'http://www.sawbucksrandomizer.com/join_now.php', '207.200.116.200', '2008-09-12 06:04:27'),
(194, 'admin', 'http://www.sawbucksrandomizer.com/join_now.php', '207.200.116.8', '2008-09-12 06:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `random_referrals`
--

CREATE TABLE IF NOT EXISTS `random_referrals` (
  `id` int(4) NOT NULL auto_increment,
  `sponsor` varchar(15) NOT NULL default '',
  `username` varchar(15) NOT NULL default '',
  `joindate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='random referrals table' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `random_referrals`
--


-- --------------------------------------------------------

--
-- Table structure for table `textads`
--

CREATE TABLE IF NOT EXISTS `textads` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL default '',
  `text` varchar(150) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `urlto` varchar(100) NOT NULL default '',
  `clicks` mediumint(5) NOT NULL default '0',
  `views` mediumint(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `textads`
--

INSERT INTO `textads` (`id`, `username`, `text`, `url`, `urlto`, `clicks`, `views`) VALUES
(1, 'admin', 'Create your Randomizer site in a few minutes,using ESBHost Randomizer.Accepts more Payment Processors then ever!Rotate banners and text ads!', 'The ESBHost.com', 'http://www.esbhost.com', 12, 1056);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL default '',
  `password` varchar(15) NOT NULL default '',
  `firstname` varchar(30) NOT NULL default '',
  `lastname` varchar(30) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `sponsor` varchar(15) NOT NULL default 'admin',
  `paypal` varchar(60) NOT NULL default 'none',
  `stormpay` varchar(50) NOT NULL default 'none',
  `egold` varchar(50) NOT NULL default 'none',
  `libertyreserve` varchar(50) NOT NULL default 'none',
  `assuredpay` varchar(60) NOT NULL default 'none',
  `solidtrustpay` varchar(75) NOT NULL default 'none',
  `fleetpay` varchar(75) NOT NULL default 'none',
  `dollardeliverys` varchar(75) NOT NULL default 'none',
  `moneybookers` varchar(75) NOT NULL default 'none',
  `weight` int(6) NOT NULL default '1',
  `lastlogin` datetime NOT NULL default '0000-00-00 00:00:00',
  `joindate` datetime NOT NULL default '0000-00-00 00:00:00',
  `last_ip` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='This table contains the users' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `sponsor`, `paypal`, `stormpay`, `egold`, `libertyreserve`, `assuredpay`, `solidtrustpay`, `fleetpay`, `dollardeliverys`, `moneybookers`, `weight`, `lastlogin`, `joindate`, `last_ip`) VALUES
(1, 'admin', 'admin', 'mike', 'rogers', 'mdr1463@yahoo.com', 'admin', 'paypal', 'mdr1463@yahoo.com', '123654', 'U1241133', 'assuredpay', 'mdr1463@yahoo.com', 'fleetpay', 'dollardeliverys', 'service@esbhost.com', 1, '2008-09-12 06:00:19', '2008-03-25 23:51:56', '66.190.245.94');
