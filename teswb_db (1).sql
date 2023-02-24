-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Feb 2023 pada 18.22
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `adminUsername` varchar(100) NOT NULL,
  `adminPassword` varchar(500) NOT NULL,
  `adminRegistredDate` datetime NOT NULL,
  `adminLastLogin` datetime NOT NULL,
  `adminStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminUsername`, `adminPassword`, `adminRegistredDate`, `adminLastLogin`, `adminStatus`) VALUES
(1, 'bimo', 'admin', 'admin', '2023-02-24 00:00:00', '2023-02-24 00:00:00', '1'),
(2, 'agung', '123', '123', '2023-02-24 00:00:00', '2023-02-24 00:00:00', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `NewsTittle` varchar(200) NOT NULL,
  `NewsContent` text NOT NULL,
  `newsDirectory` varchar(10) NOT NULL,
  `newsPhoto` varchar(200) NOT NULL,
  `newsAuthor` varchar(100) NOT NULL,
  `newsCreatedAt` datetime NOT NULL,
  `newsDate` date NOT NULL,
  `newsStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`newsId`, `NewsTittle`, `NewsContent`, `newsDirectory`, `newsPhoto`, `newsAuthor`, `newsCreatedAt`, `newsDate`, `newsStatus`) VALUES
(3, 'berita 1', 'ini isi berita 1', '2323', 'foto1.jpg', 'author 1', '2023-02-24 12:12:13', '2023-02-24', '1'),
(4, 'berita 2', 'isi berita 2', '2424', 'foto2.jpg', 'author 2', '2023-02-24 13:13:13', '2023-02-25', '1');

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
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
