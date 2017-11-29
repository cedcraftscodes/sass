-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 03:42 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auditoriumscheddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmins`
--

CREATE TABLE `tbladmins` (
  `userid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `pass_word` varchar(55) NOT NULL,
  `acctype` enum('cashier','admin','','') NOT NULL,
  `deleted` enum('YES','NO','','') NOT NULL,
  `accimg` varchar(255) NOT NULL,
  `dateadded` int(11) NOT NULL,
  `passchange` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmins`
--

INSERT INTO `tbladmins` (`userid`, `fname`, `mname`, `lname`, `user_name`, `gender`, `birthday`, `pass_word`, `acctype`, `deleted`, `accimg`, `dateadded`, `passchange`) VALUES
(22, 'Cedric Don', 'Yatco', 'Coloma', 'admin', 'male', '1997-02-12', 'f5bb0c8de146c67b44babbf4e6584cc0', 'admin', 'NO', 'images/dp/haha@gmail.com_956709.jpg', 234235233, '1'),
(52, 'Emerald', 'Servas', 'De Paz', 'ESDe Paz807', 'female', '1998-09-07', 'f5bb0c8de146c67b44babbf4e6584cc0', 'admin', 'NO', 'images/dp/ESDe Paz807_346723.jpg', 1506078538, '1'),
(53, 'Kaloy', 'Arceo', 'Marinas', 'KAMarinas779', 'male', '1998-05-18', 'f5bb0c8de146c67b44babbf4e6584cc0', 'cashier', 'NO', 'images/dp/KAMarinas779_258097.jpg', 1506082406, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblannouncements`
--

CREATE TABLE `tblannouncements` (
  `annid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `adminid` int(11) NOT NULL,
  `dateadded` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbackups`
--

CREATE TABLE `tblbackups` (
  `BackupId` int(11) NOT NULL,
  `BackupFile` varchar(255) DEFAULT NULL,
  `BackupDate` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbackups`
--

INSERT INTO `tblbackups` (`BackupId`, `BackupFile`, `BackupDate`, `UserId`, `Remarks`) VALUES
(30, 'salesandinv___(14-34-31_22-09-2017)__rand7533773.sql', 1506062071, 22, 'I just want to backup'),
(31, 'salesandinv___(14-45-23_22-09-2017)__rand9080336.sql', 1506062723, 22, 'Backup before restoring: salesandinv___(14-45-23_22-09-2017)__rand9080336.sql at September 22, 2017, 2:45 pm'),
(32, 'salesandinv___(17-09-50_22-09-2017)__rand11054824.sql', 1506071390, 22, 'Test Backup'),
(33, 'salesandinv___(17-10-11_22-09-2017)__rand4489814.sql', 1506071411, 22, 'Backup before restoring: salesandinv___(17-10-11_22-09-2017)__rand4489814.sql at September 22, 2017, 5:10 pm'),
(34, 'salesandinv___(20-29-17_22-09-2017)__rand10561117.sql', 1506083357, 22, 'Before deleting stock.'),
(35, 'salesandinv___(20-30-15_22-09-2017)__rand7315403.sql', 1506083415, 22, 'Before deleting Stock in and Stock out.'),
(36, 'salesandinv___(20-32-42_22-09-2017)__rand5486383.sql', 1506083562, 22, 'Backup before restoring: salesandinv___(20-32-42_22-09-2017)__rand5486383.sql at September 22, 2017, 8:32 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblchatlogs`
--

CREATE TABLE `tblchatlogs` (
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateadded` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcompanyinfo`
--

CREATE TABLE `tblcompanyinfo` (
  `SID` int(11) NOT NULL,
  `settingkey` varchar(255) NOT NULL,
  `settingvalue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcompanyinfo`
--

INSERT INTO `tblcompanyinfo` (`SID`, `settingkey`, `settingvalue`) VALUES
(1, 'name', 'Giga Ohms'),
(2, 'receiver', 'Nick Catimbang'),
(3, 'street', 'Km. 36 National Highway Bgy. Platero'),
(4, 'city', ' BiÃ±an City'),
(5, 'province', 'Laguna'),
(6, 'zipcode', '4024'),
(7, 'phone', '09228335230'),
(8, 'email', 'icorrelate@gmail.com'),
(9, 'voidcode', '244161004191'),
(10, 'tin', '412-252-526');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogins`
--

CREATE TABLE `tbllogins` (
  `LoginID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `LoginDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogins`
--

INSERT INTO `tbllogins` (`LoginID`, `AccountID`, `LoginDate`) VALUES
(26, 22, 1506234714),
(27, 22, 1506244303),
(28, 22, 1506300884),
(29, 22, 1506302767),
(30, 22, 1506494035),
(31, 22, 1506495353),
(32, 22, 1506506975),
(33, 22, 1506580771),
(34, 22, 1506581132),
(35, 22, 1506581327),
(36, 22, 1506658714),
(37, 22, 1506665314),
(38, 22, 1507026273),
(39, 22, 1507798849),
(40, 22, 1508663217),
(41, 22, 1508664973),
(42, 22, 1508665907),
(43, 22, 1508669178),
(44, 22, 1508670734),
(45, 22, 1508724934),
(46, 22, 1508736085),
(47, 22, 1511877158);

-- --------------------------------------------------------

--
-- Table structure for table `tblnewsupdate`
--

CREATE TABLE `tblnewsupdate` (
  `newsid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `adminid` int(11) NOT NULL,
  `Deleted` enum('YES','NO') NOT NULL,
  `dateadded` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnewsupdate`
--

INSERT INTO `tblnewsupdate` (`newsid`, `title`, `content`, `picture`, `adminid`, `Deleted`, `dateadded`) VALUES
(20, 'Dfasadfs', 'agsdagdsadgsgdsdgsdgsadgsdgs', 'images/1508690235_573814.jpg', 22, 'YES', 1508690235),
(21, 'Dfasadfs', 'asfdadfsELDHSGLKDHG:LKSDHG', 'images/1508690250_951772.jpg', 22, 'YES', 1508690250),
(22, 'Another News', 'This is another news', 'images/1508724954_33521.jpg', 22, 'YES', 1508724954),
(23, 'Oust Mocha Uson petition circulates online again', '<p style=\"box-sizing: border-box; margin: 8px 0px 24px; line-height: 1.5;\"><span style=\"color: #4c4c4c; font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif;\"><span style=\"font-size: 16px;\">MANILA, Philippines â€“ After the #FireMocha campaign, a new petition is now circu<strong>lating online to call for the removal of entertainer-turned-blogger Margaux \"Mocha\" Uson as Presidential Communications and Operations Office (PCOO) Assistant Secretary for Social Media for allegedly spreading fake news.The petition, started by Kremlin Pandaan, now has over 36,000 signatures as of Monday, September 25.</strong></span></span></p>', 'images/1508736215_475351.jpg', 22, 'NO', 1508736215),
(24, 'U.S. defense chief Mattis praises PH for success in Marawi', 'CLARK, Philippines â€“ US Defense Secretary James Mattis on Monday, October 23, praised the Philippines for its successes in battling Islamic State (ISIS) supporters, as he began an Asian trip aimed at reaffirming American support for regional allies.', 'images/1508737561_422369.jpg', 22, 'NO', 1508737561),
(25, 'U.S. defense chief Mattis praises PH for success in Marawi', 'CLARK, Philippines â€“ US Defense Secretary James Mattis on Monday, October 23, praised the Philippines for its successes in battling Islamic State (ISIS) supporters, as he began an Asian trip aimed at reaffirming American support for regional allies.', 'images/1508738190_578858.jpg', 22, 'NO', 1508738190);

-- --------------------------------------------------------

--
-- Table structure for table `tblrestore`
--

CREATE TABLE `tblrestore` (
  `RestoreId` int(11) NOT NULL,
  `BackupId` int(11) DEFAULT NULL,
  `RestoreDate` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrestore`
--

INSERT INTO `tblrestore` (`RestoreId`, `BackupId`, `RestoreDate`, `UserId`, `Remarks`) VALUES
(2, 30, 1506062723, 22, ''),
(3, 30, 1506071411, 22, ''),
(4, 35, 1506083562, 22, 'I made mistakes in deleting each stock 1 by 1.');

-- --------------------------------------------------------

--
-- Table structure for table `tblsuppliers`
--

CREATE TABLE `tblsuppliers` (
  `Supplier_id` int(11) NOT NULL,
  `Supplier_name` varchar(150) DEFAULT NULL,
  `Supplier_co_name` varchar(150) DEFAULT NULL,
  `Supplier_street` varchar(150) DEFAULT NULL,
  `Supplier_city` varchar(150) DEFAULT NULL,
  `Supplier_province` varchar(150) DEFAULT NULL,
  `Supplier_zipcode` varchar(150) DEFAULT NULL,
  `Supplier_contact` varchar(150) DEFAULT NULL,
  `Supplier_email` varchar(55) NOT NULL,
  `AddedBy` int(11) DEFAULT NULL,
  `DateAdded` int(11) DEFAULT NULL,
  `Deleted` enum('YES','NO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsuppliers`
--

INSERT INTO `tblsuppliers` (`Supplier_id`, `Supplier_name`, `Supplier_co_name`, `Supplier_street`, `Supplier_city`, `Supplier_province`, `Supplier_zipcode`, `Supplier_contact`, `Supplier_email`, `AddedBy`, `DateAdded`, `Deleted`) VALUES
(1, 'ABC Electronics', 'Gigaohms Electronic Center', '1578 Chico Street Garcia Subdivision', 'Santa Rosa', 'Laguna', '4026', '09357190233', 'abcelectronics@gmail.com', 22, 1506076666, 'NO'),
(2, 'Hextech', 'Gigaohms Electronic Center', '1241 Narra Street Garlic Subdivision', 'Santa Rosa', 'Laguna', '4026', '09348104136', 'hextech@rocketmail.com', 22, 1506076888, 'NO'),
(3, 'Clockworks', 'Gigaohms Electronic Center', '1337 Bark Street Doge Subdivision', 'Santa Rosa', 'Laguna', '4026', '09165133116', 'clockworkES@gmail.com', 22, 1506077023, 'NO'),
(4, 'Steel Trade', 'Gigaohms Electronic Center', '1998 Jackie Street Chan Subdivision', 'Santa Rosa', 'Laguna', '4026', '09357190238', 'SteelTrade1@yahoo.com', 22, 1506077219, 'NO'),
(5, 'KYS Signage', 'Gigaohms Electronic Center', '1215 Wanda Street Pass Subdivision', 'Binan', 'Laguna', '4024', '09346190336', 'KYSsign@gmail.com', 22, 1506077280, 'NO'),
(7, 'MacMac Inc.', 'Bernard Macanlalay', 'Katala', 'Binan', 'Laguna', '4024', '09356461311', 'macmac@gmail.com', 22, 1506661734, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `userid` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `pass_word` varchar(32) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `middle_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` text NOT NULL,
  `dateregistered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`userid`, `username`, `pass_word`, `first_name`, `middle_name`, `last_name`, `mobile`, `address`, `dateregistered`) VALUES
(1, '0', '311814e578cc53be69bc0df5d1921aba', 'dfasfad', 'dfasadf', 'adfsadfs', 337233233, 'fdsaadf', 1508655611),
(2, 'cedric', 'c4de7df1bafd6d9b8f5d35d4328c93b0', 'cedric', 'yatco', 'cedric', 2147483647, 'binan laguna', 1508655708),
(3, 'cass', '3cab68956fa7c8129671ef96bc1adf7c', 'cass', 'cass', 'cass', 2277, 'cass', 1508655778),
(4, 'hello', '5d41402abc4b2a76b9719d911017c592', 'hello', 'hello', 'hello', 435563, 'hello', 1508655853),
(5, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 0, '', 1508659730);

-- --------------------------------------------------------

--
-- Table structure for table `tblwrongtries`
--

CREATE TABLE `tblwrongtries` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwrongtries`
--

INSERT INTO `tblwrongtries` (`id`, `time`, `type`) VALUES
(1, 1506082714, 'cashier'),
(2, 1506086282, 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmins`
--
ALTER TABLE `tbladmins`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tblannouncements`
--
ALTER TABLE `tblannouncements`
  ADD PRIMARY KEY (`annid`);

--
-- Indexes for table `tblbackups`
--
ALTER TABLE `tblbackups`
  ADD PRIMARY KEY (`BackupId`);

--
-- Indexes for table `tblchatlogs`
--
ALTER TABLE `tblchatlogs`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `tblcompanyinfo`
--
ALTER TABLE `tblcompanyinfo`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `tbllogins`
--
ALTER TABLE `tbllogins`
  ADD PRIMARY KEY (`LoginID`);

--
-- Indexes for table `tblnewsupdate`
--
ALTER TABLE `tblnewsupdate`
  ADD PRIMARY KEY (`newsid`);

--
-- Indexes for table `tblrestore`
--
ALTER TABLE `tblrestore`
  ADD PRIMARY KEY (`RestoreId`);

--
-- Indexes for table `tblsuppliers`
--
ALTER TABLE `tblsuppliers`
  ADD PRIMARY KEY (`Supplier_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tblwrongtries`
--
ALTER TABLE `tblwrongtries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbladmins`
--
ALTER TABLE `tbladmins`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tblannouncements`
--
ALTER TABLE `tblannouncements`
  MODIFY `annid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbackups`
--
ALTER TABLE `tblbackups`
  MODIFY `BackupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblchatlogs`
--
ALTER TABLE `tblchatlogs`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcompanyinfo`
--
ALTER TABLE `tblcompanyinfo`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbllogins`
--
ALTER TABLE `tbllogins`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tblnewsupdate`
--
ALTER TABLE `tblnewsupdate`
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblrestore`
--
ALTER TABLE `tblrestore`
  MODIFY `RestoreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblsuppliers`
--
ALTER TABLE `tblsuppliers`
  MODIFY `Supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblwrongtries`
--
ALTER TABLE `tblwrongtries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
