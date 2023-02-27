-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 05:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teswb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `adminUsername` varchar(100) NOT NULL,
  `adminPassword` varchar(500) NOT NULL,
  `adminRegistredDate` datetime NOT NULL,
  `adminLastLogin` datetime DEFAULT NULL,
  `adminStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminUsername`, `adminPassword`, `adminRegistredDate`, `adminLastLogin`, `adminStatus`) VALUES
(1, 'bimo', 'admin', 'admin', '2023-02-24 00:00:00', '2023-02-27 22:59:00', '1'),
(3, '123', '123', '123', '2023-02-26 10:13:17', '2023-02-27 01:14:00', '1'),
(16, 'asd', 'asd', 'asdasd', '2023-02-26 19:14:00', '2023-02-27 01:15:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `newsTittle` varchar(200) NOT NULL,
  `newsContent` text NOT NULL,
  `newsDirectory` varchar(10) NOT NULL,
  `newsPhoto` varchar(200) DEFAULT NULL,
  `newsAuthor` varchar(100) NOT NULL,
  `newsCreatedAt` datetime NOT NULL,
  `newsDate` date NOT NULL,
  `newsStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `newsTittle`, `newsContent`, `newsDirectory`, `newsPhoto`, `newsAuthor`, `newsCreatedAt`, `newsDate`, `newsStatus`) VALUES
(18, 'asd', '<p>asd</p>\r\n', '27022023', '476-download (1).jpg', 'asd', '2023-02-27 16:29:00', '2023-02-28', '1'),
(19, 'zxc', '<p>zxc</p>\r\n', '27022023', '998-download (2).jpg', 'zxc', '2023-02-27 16:31:00', '2023-03-01', '1'),
(20, 'dfgdfg', '<p>dfgdfg <s><em><strong>dfgdfgdfg&nbsp;</strong></em></s></p>\r\n', '27022023', '430-download.jpg', 'dfg', '2023-02-27 16:47:00', '2023-03-02', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
