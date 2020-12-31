-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 01:27 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyekpisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `ID_FAKULTAS` int(11) NOT NULL,
  `NAMA_FAKULTAS` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`ID_FAKULTAS`, `NAMA_FAKULTAS`) VALUES
(1, 'Adab dan Humaniora'),
(2, 'Dakwah dan Komunikasi'),
(3, 'Syariah dan Hukum'),
(4, 'Sains dan Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `ID_PENGAJUAN` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_FAKULTAS` int(11) DEFAULT NULL,
  `NAMA_UKM` varchar(70) NOT NULL,
  `NAMA_ACARA` varchar(200) NOT NULL,
  `URL_PENGAJUAN` varchar(2000) DEFAULT NULL,
  `TGL_PENGAJUAN` date DEFAULT NULL,
  `TGL_REV_PENGAJUAN` date DEFAULT NULL,
  `JUMLAH_REV` int(11) NOT NULL,
  `TGL_ACARA` date DEFAULT NULL,
  `STATUS_PENGAJUAN` varchar(20) DEFAULT NULL,
  `TGL_P_DISETUJUI` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksipengajuan`
--

CREATE TABLE `transaksipengajuan` (
  `ID_TPENGAJUAN` int(11) NOT NULL,
  `ID_PENGAJUAN` int(11) DEFAULT NULL,
  `STATUS_TPENGAJUAN` varchar(20) DEFAULT NULL,
  `TGL_REV_SPJ` date DEFAULT NULL,
  `JUMLAH_REV_SPJ` int(11) DEFAULT NULL,
  `URL_SPJ` varchar(2000) DEFAULT NULL,
  `TGL_T_DISETUJUI` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `ID_FAKULTAS` int(11) DEFAULT NULL,
  `NAMA_USER` varchar(70) DEFAULT NULL,
  `NIP` int(11) DEFAULT NULL,
  `NIM` int(11) DEFAULT NULL,
  `NO_TLP` varchar(12) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `LEVEL` char(20) DEFAULT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `ID_FAKULTAS`, `NAMA_USER`, `NIP`, `NIM`, `NO_TLP`, `PASSWORD`, `LEVEL`, `ALAMAT`) VALUES
(1, 2, 'Rafi Kemal', NULL, 123, '082334900069', '12345', '2', 'malang'),
(2, 2, 'Yuzrizal Syarief', 334, NULL, '082334900069', '123', '1', 'probolinggo'),
(3, 2, 'Anna Retno', NULL, 82334, '082334900069', '123', '2', 'PROBOLINGG\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`ID_FAKULTAS`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`ID_PENGAJUAN`),
  ADD KEY `FK_FAKULTAS_PENGAJUAN` (`ID_FAKULTAS`),
  ADD KEY `FK_USER_PENGAJUAN` (`ID_USER`);

--
-- Indexes for table `transaksipengajuan`
--
ALTER TABLE `transaksipengajuan`
  ADD PRIMARY KEY (`ID_TPENGAJUAN`),
  ADD KEY `FK_PENGAJUAN_TRANSAKSI` (`ID_PENGAJUAN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `FK_FAKULTAS_USER` (`ID_FAKULTAS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `ID_FAKULTAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `ID_PENGAJUAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `transaksipengajuan`
--
ALTER TABLE `transaksipengajuan`
  MODIFY `ID_TPENGAJUAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `FK_FAKULTAS_PENGAJUAN` FOREIGN KEY (`ID_FAKULTAS`) REFERENCES `fakultas` (`ID_FAKULTAS`),
  ADD CONSTRAINT `FK_USER_PENGAJUAN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `transaksipengajuan`
--
ALTER TABLE `transaksipengajuan`
  ADD CONSTRAINT `FK_PENGAJUAN_TRANSAKSI` FOREIGN KEY (`ID_PENGAJUAN`) REFERENCES `pengajuan` (`ID_PENGAJUAN`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_FAKULTAS_USER` FOREIGN KEY (`ID_FAKULTAS`) REFERENCES `fakultas` (`ID_FAKULTAS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
