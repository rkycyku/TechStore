-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 08:26 PM
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
  `dataDergeses` timestamp NOT NULL DEFAULT current_timestamp(),
  `statusi` varchar(80) NOT NULL DEFAULT 'Eshte Derguar me Sukses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`IDmesazhi`, `emri`, `email`, `mesazhi`, `dataDergeses`, `statusi`) VALUES
(1, 'Rilind', 'r.kycyku.12@gmail.com', 'ssdgadgf', '2023-01-20 23:00:00', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(2, 'Rilind', 'r.kycyku.12@gmail.com', 'test', '2023-01-21 18:50:18', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriaproduktit`
--

CREATE TABLE `kategoriaproduktit` (
  `kategoriaID` int(11) NOT NULL,
  `emriKategoris` varchar(255) NOT NULL,
  `pershkrimiKategoris` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoriaproduktit`
--

INSERT INTO `kategoriaproduktit` (`kategoriaID`, `emriKategoris`, `pershkrimiKategoris`) VALUES
(1, 'Smartphone', 'gsgd'),
(2, 'Laptop', 'aaa'),
(3, 'Smart Watch', 'Ore te menqura te markave te ndryshme'),
(4, 'Foto & Video', ''),
(5, 'Audio', ''),
(6, 'All in One (AiO)', ''),
(7, 'TV & Projektor', ''),
(8, 'Maus & Aksesore', ''),
(9, 'Lodra smart & Dron', ''),
(10, 'Pjesë për kompjuter', ''),
(11, 'Kufje', ''),
(12, 'Wireless Charger', ''),
(13, 'Tablet', ''),
(14, 'Karrige Gaming', ''),
(15, 'Printer', ''),
(16, 'Memorie, Hapesire dhe Akesor Kompjuter', '');

-- --------------------------------------------------------

--
-- Table structure for table `kodizbritjes`
--

CREATE TABLE `kodizbritjes` (
  `kodi` varchar(10) NOT NULL,
  `idProduktit` varchar(11) DEFAULT NULL,
  `dataKrijimit` date NOT NULL DEFAULT current_timestamp(),
  `qmimiZbritjes` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kodizbritjes`
--

INSERT INTO `kodizbritjes` (`kodi`, `idProduktit`, `dataKrijimit`, `qmimiZbritjes`) VALUES
('AB12EE', '45', '2023-02-14', '5.00'),
('SXKD4R', '18', '2023-02-14', '50.00'),
('WNDT3C', '4', '2023-02-14', '560.00');

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

--
-- Dumping data for table `kompania`
--

INSERT INTO `kompania` (`kompaniaID`, `emriKompanis`, `kompaniaLogo`, `adresaKompanis`) VALUES
(1, 'Apple', 'AppleLogo.png', 'cALIFORNIA'),
(2, 'Amd', 'AMDLogo.png', NULL),
(3, 'Asus', 'AsusLogo.png', NULL),
(4, 'JBL', 'JBL.png', NULL),
(5, 'Lenovo', 'Lenovo.png', ''),
(6, 'Logitech', 'Logitech.png', ''),
(7, 'MSI', 'MSI.png', ''),
(8, 'Nvidia', 'Nvidia.png', ''),
(9, 'Razer', 'Razer.png', ''),
(10, 'Samsung', 'SamsungLogo.png', ''),
(11, 'SteelSeries', '63cc8f01dacf35.52923644.png', ''),
(12, 'Thermaltake', '63cc904665b4c8.92639137.png', ''),
(13, 'DJI', '63cc90567d1235.30779652.png', ''),
(14, 'Overmax', '63cc90641f4676.38918423.jpg', ''),
(15, 'G.Skill', '63cc9106dcdca0.15849659.png', ''),
(16, 'Akasa', '63cc916f505f64.49149237.png', ''),
(17, 'Corsair', '63cc919875a410.74994322.png', ''),
(18, 'WD - Western Digital', '63cc923d6652a6.82761403.png', ''),
(19, 'HP', '63cc929ca61d21.63137864.png', ''),
(20, 'Acer', '63cc92dd919978.62580492.png', ''),
(21, 'ZOWIE - BenQ', '63cc933025a1f3.70979396.png', ''),
(22, 'Marvo', '63cc93503bc070.76804317.png', ''),
(23, 'Arctic', '63cc945c98f987.79971283.png', ''),
(24, 'Transcend', '63cc94dc60f873.30313171.png', ''),
(25, 'Dell', '63cc95f0a30e93.21744349.png', ''),
(26, 'Instax', '63eabba55fbfc7.49583109.png', ''),
(27, 'Canon', '63eabbd2c18639.05511269.png', ''),
(28, 'Sony', '63eabc0946e731.30555181.png', ''),
(29, 'SENSE7', '63eabcbde6e353.90404410.jpeg', ''),
(30, 'Preyon', '63eabd4a55ae01.00211971.svg', '');

-- --------------------------------------------------------

--
-- Table structure for table `porosit`
--

CREATE TABLE `porosit` (
  `nrPorosis` int(11) NOT NULL,
  `idKlienti` int(11) DEFAULT NULL,
  `dataPorosis` date NOT NULL DEFAULT current_timestamp(),
  `TotaliPorosis` decimal(10,2) NOT NULL,
  `statusiPorosis` varchar(30) NOT NULL DEFAULT 'Ne Procesim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `porosit`
--

INSERT INTO `porosit` (`nrPorosis`, `idKlienti`, `dataPorosis`, `TotaliPorosis`, `statusiPorosis`) VALUES
(1, 2, '2023-02-13', '2710.49', 'Ne Procesim'),
(2, 1, '2023-02-13', '2710.49', 'Ne Procesim'),
(3, 1, '2023-02-13', '2879.99', 'Ne Procesim'),
(4, 1, '2023-02-13', '1898.00', 'Ne Procesim'),
(5, 1, '2023-02-13', '927.50', 'Ne Procesim'),
(6, 1, '2023-02-13', '6534.98', 'Ne Procesim'),
(7, 2, '2023-02-14', '239.00', 'Ne Procesim'),
(8, 2, '2023-02-14', '89.50', 'Ne Procesim'),
(9, 2, '2023-02-14', '84.50', 'Ne Procesim'),
(10, 2, '2023-02-14', '-5.00', 'Ne Procesim'),
(11, 2, '2023-02-14', '2705.49', 'Ne Procesim'),
(12, 2, '2023-02-14', '234.00', 'Ne Procesim'),
(13, 2, '2023-02-14', '164.00', 'Ne Procesim'),
(14, 2, '2023-02-14', '164.00', 'Ne Procesim'),
(15, 1, '2023-02-14', '164.00', 'Ne Procesim'),
(16, 1, '2023-02-14', '164.00', 'Ne Procesim'),
(17, 1, '2023-02-14', '94.50', 'Ne Procesim'),
(18, 1, '2023-02-14', '4027.13', 'Ne Procesim'),
(19, 1, '2023-02-14', '169.00', 'Ne Procesim'),
(20, 1, '2023-02-14', '0.00', 'Ne Procesim'),
(21, 1, '2023-02-14', '569.00', 'Ne Procesim'),
(22, 1, '2023-02-14', '234.00', 'Ne Procesim'),
(23, 1, '2023-02-14', '164.50', 'Ne Procesim'),
(24, 1, '2023-02-14', '344.00', 'Ne Procesim'),
(25, 1, '2023-02-14', '79.50', 'Ne Procesim'),
(26, 1, '2023-02-14', '894.99', 'Ne Procesim'),
(27, 1, '2023-02-14', '164.00', 'Ne Procesim'),
(28, 1, '2023-02-14', '344.00', 'Ne Procesim'),
(29, 1, '2023-02-14', '164.00', 'Ne Procesim'),
(30, 1, '2023-02-14', '0.00', 'Ne Procesim'),
(31, 1, '2023-02-14', '2794.99', 'Ne Procesim'),
(32, 1, '2023-02-14', '164.00', 'Ne Procesim'),
(33, 1, '2023-02-14', '84.50', 'Ne Procesim'),
(34, 1, '2023-02-14', '0.00', 'Ne Procesim'),
(35, 1, '2023-02-14', '2705.49', 'Ne Procesim'),
(36, 1, '2023-02-14', '2705.49', 'Ne Procesim'),
(37, 1, '2023-02-14', '84.50', 'Ne Procesim'),
(38, 1, '2023-02-14', '169.00', 'Ne Procesim'),
(39, 1, '2023-02-14', '234.00', 'Ne Procesim'),
(40, 1, '2023-02-14', '2972.99', 'Ne Procesim'),
(41, 1, '2023-02-14', '803.00', 'Ne Procesim'),
(42, 1, '2023-02-14', '0.00', 'Ne Procesim'),
(43, 1, '2023-02-14', '2705.49', 'Ne Procesim'),
(44, 1, '2023-02-14', '84.50', 'Ne Procesim'),
(45, 1, '2023-02-14', '0.00', 'Ne Procesim'),
(46, 1, '2023-02-14', '84.50', 'Ne Procesim'),
(47, 1, '2023-02-14', '0.00', 'Ne Procesim'),
(48, 1, '2023-02-14', '84.50', 'Ne Procesim'),
(49, 1, '2023-02-14', '161.00', 'Ne Procesim'),
(50, 1, '2023-02-14', '233.00', 'Ne Procesim'),
(51, 1, '2023-02-14', '234.00', 'Ne Procesim'),
(52, 1, '2023-02-14', '234.00', 'Ne Procesim'),
(53, 1, '2023-02-14', '234.00', 'Ne Procesim'),
(54, 1, '2023-02-14', '231.00', 'Ne Procesim'),
(55, 2, '2023-02-14', '2685.49', 'Ne Procesim');

-- --------------------------------------------------------

--
-- Table structure for table `produkti`
--

CREATE TABLE `produkti` (
  `produktiID` int(11) NOT NULL,
  `emriProduktit` varchar(255) NOT NULL,
  `emriKompanis` varchar(30) NOT NULL,
  `kategoriaProduktit` varchar(50) NOT NULL,
  `fotoProduktit` varchar(50) NOT NULL,
  `emriStafit` varchar(30) NOT NULL,
  `dataKrijimit` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataModifikimit` timestamp NOT NULL DEFAULT current_timestamp(),
  `qmimiProduktit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produkti`
--

INSERT INTO `produkti` (`produktiID`, `emriProduktit`, `emriKompanis`, `kategoriaProduktit`, `fotoProduktit`, `emriStafit`, `dataKrijimit`, `dataModifikimit`, `qmimiProduktit`) VALUES
(1, 'Laptop ASUS TUF Gaming F15 (2021), 15.6\"', 'Asus', 'Laptop', '63e90dd68362c0.14152620.jpg', 'Llogaria', '2023-01-19 22:00:00', '2023-02-12 16:03:54', '758.50'),
(2, 'Laptop Razer Blade 15 Advanced Model', 'Razer', 'Laptop', '63d055e0c57d81.05756611.jpg', 'admin', '2023-01-19 22:00:00', '2023-02-05 11:16:48', '2710.49'),
(3, 'Samsung s22 Ultra, 512GB', 'Samsung', 'Smartphone', '63d055e915be98.37912983.jpg', 'admin', '2023-01-19 22:00:00', '2023-02-05 11:16:55', '899.99'),
(4, 'Lenovo NB IdeaPad 3 15ALC6', 'Lenovo', 'Laptop', '63d055f15d73c8.42300026.jpg', 'admin', '2023-01-19 22:00:00', '2023-02-05 11:17:03', '459.50'),
(5, 'Lenovo ThinkPad P14s Gen 3 (AMD), 14\", AMD Ryzen 7 Pro, 32GB RAM, 1TB SSD, AMD Radeon 680M, i zi', 'Lenovo', 'Laptop', '63d055feb6ffa9.20196181.jpg', 'admin', '2023-01-21 17:24:31', '2023-02-05 11:17:09', '2469.50'),
(6, 'Maus pad SteelSeries QcK Heavy M', 'SteelSeries', 'Maus & Aksesore', '63d05608dd9912.15133010.jpg', 'admin', '2023-01-22 00:37:58', '2023-01-24 22:04:56', '28.50'),
(7, 'Maus pad SteelSeries QcK Edge XL', 'SteelSeries', 'Maus & Aksesore', '63d0561088af36.99850110.jpg', 'admin', '2023-01-22 00:38:30', '2023-01-24 22:05:04', '52.50'),
(8, 'Dron DJI Ryze Tello ED', 'DJI', 'Lodra smart & Dron', '63d0561af0d506.97064987.jpg', 'admin', '2023-01-22 00:39:00', '2023-01-24 22:05:14', '357.99'),
(9, 'Dron Overmax X-Bee, 600 m, i zi', 'Overmax', 'Lodra smart & Dron', '63d056224fcfd5.12230564.jpg', 'admin', '2023-01-22 00:39:38', '2023-01-24 22:05:22', '284.49'),
(10, 'Dron DJI Mavic 3 Classic (DJI RC)(EU)', 'DJI', 'Lodra smart & Dron', '63d0562b618d48.16102205.jpg', 'admin', '2023-01-22 00:40:14', '2023-01-24 22:05:31', '2489.99'),
(11, 'Kasë Thermaltake Core P3, e bardhë', 'Thermaltake', 'Pjesë për kompjuter', '63d056323276c7.81542918.jpg', 'admin', '2023-01-22 00:40:53', '2023-01-24 22:05:38', '210.66'),
(12, 'Flutur ftohëse Arctic P14 PWM - 140 mm', 'Arctic', 'Pjesë për kompjuter', '63d0563b7f0dd0.69298527.jpg', 'admin', '2023-01-22 00:42:17', '2023-01-24 22:05:47', '18.45'),
(13, 'Memorie G. Skill DDR4, 8 GB, 2400 MHz, CL17', 'G.Skill', 'Pjesë për kompjuter', '63d056492e89d5.21517717.jpg', 'admin', '2023-01-22 00:42:52', '2023-01-24 22:06:01', '18.99'),
(14, 'SSD Transcend MTE220S, M.2 - 256GB', 'Transcend', 'Pjesë për kompjuter', '63d0567a1432f3.30627468.jpg', 'admin', '2023-01-22 00:44:40', '2023-01-24 22:06:50', '29.99'),
(15, 'Ftohës Akasa DDR, aRGB LED, pasiv (AK-MX248)', 'Akasa', 'Pjesë për kompjuter', '63d05689da6022.83633684.jpg', 'admin', '2023-01-22 00:45:12', '2023-01-24 22:07:05', '30.00'),
(16, 'Përshtatës i brendshëm Akasa AK-CBUB37-50BK', 'Akasa', 'Pjesë për kompjuter', '63d056a353ba19.29349886.jpg', 'admin', '2023-01-22 00:45:53', '2023-01-24 22:07:31', '9.99'),
(17, 'Ftohës Corsair ML120 PRO RGB, 120mm', 'Corsair', 'Pjesë për kompjuter', '63d056ab22eb80.78302695.jpg', 'admin', '2023-01-22 00:46:19', '2023-01-24 22:07:39', '43.50'),
(18, 'Pastë Arctic MX-4 2019 (4g)', 'Arctic', 'Pjesë për kompjuter', '63d056b3c3cc68.15404951.jpg', 'admin', '2023-01-22 00:46:46', '2023-01-24 22:07:47', '12.99'),
(19, 'Hard disk SSD WD Green SATA III - 240GB 3D NAND', 'WD - Western Digital', 'Pjesë për kompjuter', '63d056bd110280.38041391.jpg', 'admin', '2023-01-22 00:47:16', '2023-01-24 22:07:57', '55.00'),
(20, 'Kompjuter AIO Acer Veriton Essential Z (EZ2740G),23.8\", Intel Core i5-1135G7, 8 GB DDR4, 512GB SSD, Intel UHD Graphics, i argjendtë', 'Acer', 'All in One (AiO)', '63d056c7197425.11040451.jpg', 'admin', '2023-01-22 00:47:50', '2023-01-24 22:08:07', '975.50'),
(21, 'Kompjuter Dell Inspiron 24 (5415), 23.8 \", AMD Ryzen 5, 16GB RAM, 256GB SSD, 1TB HDD, AMD Radeon Graphics, i bardhë', 'Dell', 'All in One (AiO)', '63d056d11496d3.86492053.jpg', 'admin', '2023-01-22 00:48:56', '2023-01-24 22:08:17', '1499.99'),
(22, 'Kompjuter HP ENVY 34-c1001nc, 34\", Intel Core i7, 32GB RAM, 1TB SSD, NVIDIA GeForce RTX 3060, i argjendtë', 'HP', 'All in One (AiO)', '63d056dd5bc157.84233223.jpg', 'admin', '2023-01-22 00:49:23', '2023-01-24 22:08:29', '3499.99'),
(23, 'Apple iMac 24\", M1 8-core, 8GB, 256GB, 8-core GPU, Green', 'Apple', 'All in One (AiO)', '63d056e8dc0484.98868210.jpg', 'admin', '2023-01-22 00:50:00', '2023-01-24 22:08:40', '1779.00'),
(24, 'Projektor Acer C202i', 'Acer', 'TV & Projektor', '63d056f36c8ac5.29677040.jpg', 'admin', '2023-01-22 00:50:56', '2023-01-24 22:08:51', '359.50'),
(25, 'Maus ZOWIE by BenQ S1,i zi', 'Acer', 'Maus & Aksesore', '63d056fddef055.63527829.jpg', 'admin', '2023-01-22 00:52:37', '2023-01-24 22:09:01', '97.50'),
(26, 'Maus Marvo M720W, i zi', 'Marvo', 'Maus & Aksesore', '63d057056d4e38.57263102.jpg', 'admin', '2023-01-22 00:53:15', '2023-01-24 22:09:09', '45.59'),
(27, 'Apple MacBook Pro 16\", M2 Max 12-Core, 32GB, 1TB, 38-Core GPU, Silver', 'Apple', 'Laptop', '63d05c06aa8757.25439961.jpg', 'Llogaria', '2023-01-24 22:15:21', '2023-02-13 22:10:03', '4149.00'),
(28, 'Kufje Logitech G432, të zeza', 'Logitech', 'Kufje', '63eab827ba77c4.71044525.jpg', 'Llogaria', '2023-02-13 22:22:31', '2023-02-13 22:52:39', '84.50'),
(29, 'Hard disk Samsung SSD 970 EVO PLUS, M.2 - 250GB', 'Samsung', 'Memorie, Hapesire dhe Akesor Kompjuter', '63eab84858c8d7.45002641.jpg', 'Llogaria', '2023-02-13 22:23:04', '2023-02-13 22:52:25', '49.50'),
(30, 'Disk portativ WD Elements, 2TB, i zi', 'WD - Western Digital', 'Memorie, Hapesire dhe Akesor Kompjuter', '63eab88a9bae20.95606749.jpg', 'Llogaria', '2023-02-13 22:24:10', '2023-02-13 22:52:01', '84.50'),
(31, 'Disk i jashtëm Transcend Jet 25H3B, 1 TB, i zi / kaltër', 'Transcend', 'Memorie, Hapesire dhe Akesor Kompjuter', '63eab963cfcf35.02921447.jpg', 'Llogaria', '2023-02-13 22:27:47', '2023-02-13 22:51:42', '69.50'),
(32, 'Apple MacBook Pro 16.2\", M1 Max 10-core, 32GB, 1TB, 32-core GPU, Silver', 'Apple', 'Laptop', '63eab99c203254.93655263.jpg', 'Llogaria', '2023-02-13 22:28:44', '2023-02-13 22:28:44', '3299.00'),
(33, 'Apple iPhone 11, 64GB, Black', 'Apple', 'Smartphone', '63eab9e5b821b1.87284331.jpg', 'Llogaria', '2023-02-13 22:29:57', '2023-02-13 22:29:57', '579.00'),
(34, 'Apple Magic Mouse (2022), Black Multi - Touch Surface', 'Apple', 'Maus & Aksesore', '63eab9ff27af71.66828407.jpg', 'Llogaria', '2023-02-13 22:30:23', '2023-02-13 22:30:23', '119.00'),
(35, 'Celular Samsung Galaxy A23 5G, 6.6\" FHD+, 4GB RAM, 128GB, i kaltër', 'Samsung', 'Smartphone', '63eaba204edb24.98379543.jpg', 'Llogaria', '2023-02-13 22:30:56', '2023-02-13 22:30:56', '299.50'),
(36, 'Apple Watch SE2 GPS 44mm, Midnight Aluminium Case me Midnight Sport Band, Regular', 'Apple', 'Smart Watch', '63eaba4ebf5fb1.84174295.jpg', 'Llogaria', '2023-02-13 22:31:42', '2023-02-13 22:31:42', '349.00'),
(37, 'Fotoaparat momental Fujifilm Instax Mini 90, i zi', 'Instax', 'Foto & Video', '63eabd7f7f4296.27491084.jpg', 'Llogaria', '2023-02-13 22:45:19', '2023-02-13 22:45:19', '119.50'),
(38, 'Printer Canon PIXMA TS3150, i zi', 'Canon', 'Printer', '63eabdbea539b0.78235909.jpg', 'Llogaria', '2023-02-13 22:46:22', '2023-02-13 22:46:22', '79.50'),
(39, 'Kufje Sony MDR-RF895RK, të zeza, III', 'Sony', 'Kufje', '63eabdd87c2561.68876767.jpg', 'Llogaria', '2023-02-13 22:46:48', '2023-02-13 22:46:48', '99.50'),
(40, 'Kontroller Sony Playstation 5 DualSense', 'Sony', 'Lodra smart & Dron', '63eabe14e6ab51.91700813.jpg', 'Llogaria', '2023-02-13 22:47:48', '2023-02-13 22:47:48', '89.50'),
(41, 'Karrige SENSE7 Knight, e zezë', 'SENSE7', 'Karrige Gaming', '63eabe31db73d8.09365222.jpg', 'Llogaria', '2023-02-13 22:48:17', '2023-02-13 22:48:17', '169.50'),
(42, 'Maus Preyon Owl Wireless (POW35B)', 'Preyon', 'Maus & Aksesore', '63eabe5a5852e1.52076563.jpg', 'Llogaria', '2023-02-13 22:48:58', '2023-02-13 22:48:58', '49.50'),
(43, 'Apple 10.9-inch iPad (10th) Wi-Fi, 64GB, Silver', 'Apple', 'Tablet', '63eabe72174975.16788497.jpg', 'Llogaria', '2023-02-13 22:49:22', '2023-02-13 22:49:22', '569.00'),
(44, 'Apple MagSafe Duo Charger', 'Apple', 'Wireless Charger', '63eabe936e0523.11456101.jpg', 'Llogaria', '2023-02-13 22:49:55', '2023-02-13 22:49:55', '169.00'),
(45, 'Apple AirPods (3rd generation) with Lightning Charging Case', 'Apple', 'Kufje', '63eabeae767761.75083362.jpg', 'Llogaria', '2023-02-13 22:50:22', '2023-02-13 22:50:39', '239.00');

-- --------------------------------------------------------

--
-- Table structure for table `tedhenatporosis`
--

CREATE TABLE `tedhenatporosis` (
  `idPorosia` int(11) DEFAULT NULL,
  `idProdukti` int(11) DEFAULT NULL,
  `qmimiProd` double(10,2) NOT NULL,
  `sasiaPorositur` int(5) NOT NULL,
  `qmimiTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tedhenatporosis`
--

INSERT INTO `tedhenatporosis` (`idPorosia`, `idProdukti`, `qmimiProd`, `sasiaPorositur`, `qmimiTotal`) VALUES
(1, 2, 2710.49, 1, '2710.49'),
(2, 2, 2710.49, 1, '2710.49'),
(3, 41, 169.50, 1, '169.50'),
(3, 2, 2710.49, 1, '2710.49'),
(4, 34, 119.00, 1, '119.00'),
(4, 23, 1779.00, 1, '1779.00'),
(5, 37, 119.50, 1, '119.50'),
(5, 1, 758.50, 1, '758.50'),
(5, 42, 49.50, 1, '49.50'),
(6, 33, 579.00, 1, '579.00'),
(6, 27, 4149.00, 1, '4149.00'),
(6, 45, 239.00, 1, '239.00'),
(6, 19, 55.00, 1, '55.00'),
(6, 21, 1499.99, 1, '1499.99'),
(6, 18, 12.99, 1, '12.99'),
(7, 45, 239.00, 1, '239.00'),
(8, 40, 89.50, 1, '89.50'),
(9, 40, 89.50, 1, '89.50'),
(11, 2, 2710.49, 1, '2710.49'),
(12, 45, 239.00, 1, '239.00'),
(13, 44, 169.00, 1, '169.00'),
(14, 44, 169.00, 1, '169.00'),
(15, 44, 169.00, 1, '169.00'),
(16, 44, 169.00, 1, '169.00'),
(17, 39, 99.50, 1, '99.50'),
(18, 41, 169.50, 1, '169.50'),
(18, 2, 2710.49, 1, '2710.49'),
(18, 6, 28.50, 1, '28.50'),
(18, 3, 899.99, 1, '899.99'),
(18, 11, 210.66, 1, '210.66'),
(18, 18, 12.99, 1, '12.99'),
(19, 44, 169.00, 1, '169.00'),
(21, 43, 569.00, 1, '569.00'),
(22, 45, 239.00, 1, '239.00'),
(23, 41, 169.50, 1, '169.50'),
(24, 36, 349.00, 1, '349.00'),
(25, 38, 79.50, 1, '79.50'),
(26, 3, 899.99, 1, '899.99'),
(27, 44, 169.00, 1, '169.00'),
(28, 36, 349.00, 1, '349.00'),
(29, 44, 169.00, 1, '169.00'),
(31, 40, 89.50, 1, '89.50'),
(31, 2, 2710.49, 1, '2710.49'),
(32, 44, 169.00, 1, '169.00'),
(33, 40, 89.50, 1, '89.50'),
(35, 2, 2710.49, 1, '2710.49'),
(36, 2, 2710.49, 1, '2710.49'),
(37, 40, 89.50, 1, '89.50'),
(38, 44, 169.00, 1, '169.00'),
(39, 45, 239.00, 1, '239.00'),
(40, 45, 239.00, 1, '239.00'),
(40, 6, 28.50, 1, '28.50'),
(40, 2, 2710.49, 1, '2710.49'),
(41, 43, 569.00, 1, '569.00'),
(41, 45, 239.00, 1, '239.00'),
(43, 2, 2710.49, 1, '2710.49'),
(44, 40, 89.50, 1, '89.50'),
(46, 40, 89.50, 1, '89.50'),
(48, 40, 89.50, 1, '89.50'),
(49, 44, 169.00, 1, '169.00'),
(50, 45, 239.00, 1, '239.00'),
(51, 45, 239.00, 1, '239.00'),
(52, 45, 239.00, 1, '239.00'),
(53, 45, 239.00, 1, '239.00'),
(54, 45, 239.00, 1, '239.00'),
(55, 2, 2710.49, 1, '2710.49');

-- --------------------------------------------------------

--
-- Table structure for table `tedhenatuser`
--

CREATE TABLE `tedhenatuser` (
  `userID` int(11) NOT NULL,
  `nrKontaktit` varchar(30) DEFAULT NULL,
  `qyteti` varchar(30) DEFAULT NULL,
  `zipKodi` varchar(7) DEFAULT NULL,
  `adresa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tedhenatuser`
--

INSERT INTO `tedhenatuser` (`userID`, `nrKontaktit`, `qyteti`, `zipKodi`, `adresa`) VALUES
(1, '044122123', 'Kaçanik', '71000', 'Adresa'),
(2, '043710410', 'Kaçanik', '71000', 'Komandant Zefi 69'),
(3, NULL, NULL, NULL, NULL);

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
(1, 'Llogaria', 'User', 'user', 'test@rmail.com', 'user', 0),
(2, 'Llogaria', 'Adminit', 'admin', 'admin@gmail.com', 'admin', 2),
(3, 'Llogaria', 'Menagjimit', 'menagjim', 'menagjim@gmail.com', 'menagjim', 1);

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
-- Indexes for table `kodizbritjes`
--
ALTER TABLE `kodizbritjes`
  ADD PRIMARY KEY (`kodi`);

--
-- Indexes for table `kompania`
--
ALTER TABLE `kompania`
  ADD PRIMARY KEY (`kompaniaID`);

--
-- Indexes for table `porosit`
--
ALTER TABLE `porosit`
  ADD PRIMARY KEY (`nrPorosis`),
  ADD KEY `FK_KlientiPorosia` (`idKlienti`);

--
-- Indexes for table `produkti`
--
ALTER TABLE `produkti`
  ADD PRIMARY KEY (`produktiID`);

--
-- Indexes for table `tedhenatporosis`
--
ALTER TABLE `tedhenatporosis`
  ADD KEY `FK_PorosiaTeDhenatPorosis` (`idPorosia`),
  ADD KEY `FK_PorosiaProdukti` (`idProdukti`);

--
-- Indexes for table `tedhenatuser`
--
ALTER TABLE `tedhenatuser`
  ADD KEY `FK_UserTeDhenatUser` (`userID`);

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
  MODIFY `IDmesazhi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategoriaproduktit`
--
ALTER TABLE `kategoriaproduktit`
  MODIFY `kategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kompania`
--
ALTER TABLE `kompania`
  MODIFY `kompaniaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `porosit`
--
ALTER TABLE `porosit`
  MODIFY `nrPorosis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `produkti`
--
ALTER TABLE `produkti`
  MODIFY `produktiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `porosit`
--
ALTER TABLE `porosit`
  ADD CONSTRAINT `FK_KlientiPorosia` FOREIGN KEY (`idKlienti`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tedhenatporosis`
--
ALTER TABLE `tedhenatporosis`
  ADD CONSTRAINT `FK_PorosiaProdukti` FOREIGN KEY (`idProdukti`) REFERENCES `produkti` (`produktiID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PorosiaTeDhenatPorosis` FOREIGN KEY (`idPorosia`) REFERENCES `porosit` (`nrPorosis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tedhenatuser`
--
ALTER TABLE `tedhenatuser`
  ADD CONSTRAINT `FK_UserTeDhenatUser` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
