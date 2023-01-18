-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 12:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `IDmesazhi` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mesazhi` varchar(255) NOT NULL,
  `dataDergeses` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategoriaproduktit`
--

CREATE TABLE `kategoriaproduktit` (
  `kategoriaID` int(11) NOT NULL,
  `emriKategoris` varchar(255) NOT NULL,
  `pershkrimiKategoris` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kompania`
--

CREATE TABLE `kompania` (
  `kompaniaID` int(11) NOT NULL,
  `emriKompanis` varchar(50) NOT NULL,
  `kompaniaLogo` varchar(255) NOT NULL,
  `adresaKompanis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `porosia`
--

CREATE TABLE `porosia` (
  `porosiaID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `produktiID` int(11) NOT NULL,
  `dataPorosis` date NOT NULL DEFAULT current_timestamp(),
  `qmimiTotal` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produkti`
--

CREATE TABLE `produkti` (
  `produktiID` int(11) NOT NULL,
  `emriProduktit` varchar(50) NOT NULL,
  `emriKompanis` varchar(30) NOT NULL,
  `kategoriaProduktit` varchar(50) NOT NULL,
  `fotoProduktit` varchar(50) NOT NULL,
  `emriStafit` varchar(30) NOT NULL,
  `dataKrijimit` date NOT NULL DEFAULT current_timestamp(),
  `qmimiProduktit` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(30) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `aksesi` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `emri`, `mbiemri`, `username`, `email`, `password`, `aksesi`) VALUES
(1, 'Rilind', 'kycyku', 'rkycyku', 'test@rmail.com', '123456789', 0),
(2, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`IDmesazhi`);

--
-- Indexes for table `kategoriaproduktit`
--
ALTER TABLE `kategoriaproduktit`
  ADD PRIMARY KEY (`kategoriaID`);

--
-- Indexes for table `kompania`
--
ALTER TABLE `kompania`
  ADD PRIMARY KEY (`kompaniaID`);

--
-- Indexes for table `porosia`
--
ALTER TABLE `porosia`
  ADD PRIMARY KEY (`porosiaID`);

--
-- Indexes for table `produkti`
--
ALTER TABLE `produkti`
  ADD PRIMARY KEY (`produktiID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `IDmesazhi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoriaproduktit`
--
ALTER TABLE `kategoriaproduktit`
  MODIFY `kategoriaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kompania`
--
ALTER TABLE `kompania`
  MODIFY `kompaniaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `porosia`
--
ALTER TABLE `porosia`
  MODIFY `porosiaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produkti`
--
ALTER TABLE `produkti`
  MODIFY `produktiID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
