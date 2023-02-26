-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 12:14 PM
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
(1, 'bimo', 'admin', 'admin', '2023-02-24 00:00:00', '2023-02-25 22:52:00', '1'),
(3, '123', '123', '123', '2023-02-26 10:13:17', '2023-02-26 10:13:17', '1'),
(11, 'asd', 'asd', 'kuku', '2023-02-26 12:09:00', NULL, '1'),
(13, 'qwe', 'qwe', '123', '2023-02-26 12:09:00', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `newsTittle` varchar(200) NOT NULL,
  `newsContent` text NOT NULL,
  `newsDirectory` varchar(10) NOT NULL,
  `newsPhoto` varchar(200) NOT NULL,
  `newsAuthor` varchar(100) NOT NULL,
  `newsCreatedAt` datetime NOT NULL,
  `newsDate` date NOT NULL,
  `newsStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `newsTittle`, `newsContent`, `newsDirectory`, `newsPhoto`, `newsAuthor`, `newsCreatedAt`, `newsDate`, `newsStatus`) VALUES
(3, 'gara gara supir mengantuk', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2323', 'foto1.jpg', 'author 1', '2023-02-24 12:12:13', '2023-02-24', '1'),
(4, 'terbitnya buku peluang terbaru', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2424', 'foto2.jpg', 'author 2', '2023-02-24 13:13:13', '2023-02-25', '0');

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
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
