-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 04:34 PM
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
CREATE DATABASE IF NOT EXISTS `techstoredb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `techstoredb`;

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--
-- Creation: Feb 12, 2023 at 10:50 PM
--

DROP TABLE IF EXISTS `contactform`;
CREATE TABLE IF NOT EXISTS `contactform` (
  `IDmesazhi` int(11) NOT NULL AUTO_INCREMENT,
  `emri` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mesazhi` varchar(255) NOT NULL,
  `dataDergeses` timestamp NOT NULL DEFAULT current_timestamp(),
  `statusi` varchar(80) NOT NULL DEFAULT 'Eshte Derguar me Sukses',
  PRIMARY KEY (`IDmesazhi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `contactform`:
--

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`IDmesazhi`, `emri`, `email`, `mesazhi`, `dataDergeses`, `statusi`) VALUES
(1, 'Rilind', 'r.kycyku.12@gmail.com', 'ssdgadgf', '2023-01-20 23:00:00', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(2, 'Rilind', 'r.kycyku.12@gmail.com', 'test', '2023-01-21 18:50:18', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(3, 'safsaf', 'a.ku@gmail.com', 'asfafa\r\n\r\n', '2023-02-18 15:11:51', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriaproduktit`
--
-- Creation: Feb 12, 2023 at 10:50 PM
--

DROP TABLE IF EXISTS `kategoriaproduktit`;
CREATE TABLE IF NOT EXISTS `kategoriaproduktit` (
  `kategoriaID` int(11) NOT NULL AUTO_INCREMENT,
  `emriKategoris` varchar(255) NOT NULL,
  `pershkrimiKategoris` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kategoriaID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `kategoriaproduktit`:
--

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
-- Creation: Feb 15, 2023 at 10:42 AM
--

DROP TABLE IF EXISTS `kodizbritjes`;
CREATE TABLE IF NOT EXISTS `kodizbritjes` (
  `kodi` char(6) NOT NULL,
  `idProduktit` varchar(11) DEFAULT NULL,
  `dataKrijimit` date NOT NULL DEFAULT current_timestamp(),
  `qmimiZbritjes` decimal(10,2) NOT NULL,
  PRIMARY KEY (`kodi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `kodizbritjes`:
--

--
-- Dumping data for table `kodizbritjes`
--

INSERT INTO `kodizbritjes` (`kodi`, `idProduktit`, `dataKrijimit`, `qmimiZbritjes`) VALUES
('1GYOLV', '3', '2023-02-17', '30.00'),
('5B7IKW', '23', '2023-02-15', '600.00'),
('AB12EE', '45', '2023-02-14', '5.00'),
('CI6RZ9', '21', '2023-02-15', '250.00'),
('FGNBSQ', '20', '2023-02-15', '123.00');

-- --------------------------------------------------------

--
-- Table structure for table `kompania`
--
-- Creation: Feb 12, 2023 at 10:50 PM
--

DROP TABLE IF EXISTS `kompania`;
CREATE TABLE IF NOT EXISTS `kompania` (
  `kompaniaID` int(11) NOT NULL AUTO_INCREMENT,
  `emriKompanis` varchar(50) NOT NULL,
  `kompaniaLogo` varchar(255) NOT NULL,
  `adresaKompanis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kompaniaID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `kompania`:
--

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
-- Creation: Feb 15, 2023 at 10:41 AM
--

DROP TABLE IF EXISTS `porosit`;
CREATE TABLE IF NOT EXISTS `porosit` (
  `nrPorosis` int(11) NOT NULL AUTO_INCREMENT,
  `idKlienti` int(11) DEFAULT NULL,
  `dataPorosis` date NOT NULL DEFAULT current_timestamp(),
  `TotaliPorosis` decimal(10,2) NOT NULL,
  `kodiZbritjes` char(6) DEFAULT NULL,
  `statusiPorosis` varchar(30) NOT NULL DEFAULT 'Ne Procesim',
  PRIMARY KEY (`nrPorosis`),
  KEY `FK_KlientiPorosia` (`idKlienti`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `porosit`:
--   `idKlienti`
--       `user` -> `userID`
--

--
-- Dumping data for table `porosit`
--

INSERT INTO `porosit` (`nrPorosis`, `idKlienti`, `dataPorosis`, `TotaliPorosis`, `kodiZbritjes`, `statusiPorosis`) VALUES
(73, 1, '2023-02-16', '9252.00', '5B7IKW', 'Pranuar Nga Bleresi'),
(74, 1, '2023-02-16', '89.50', NULL, 'E Derguar'),
(75, 1, '2023-02-16', '907.50', NULL, 'E Derguar'),
(76, 1, '2023-02-16', '3299.00', NULL, 'Ne Procesim'),
(77, 2, '2023-02-17', '1714.00', NULL, 'Ne Procesim'),
(78, 2, '2023-02-17', '379.00', NULL, 'Ne Procesim'),
(79, 2, '2023-02-17', '817.50', NULL, 'Ne Procesim'),
(80, 2, '2023-02-18', '239.00', NULL, 'Ne Procesim'),
(81, 2, '2023-02-18', '69.50', NULL, 'Ne Procesim'),
(82, 2, '2023-02-18', '569.00', NULL, 'Ne Procesim'),
(83, 2, '2023-02-18', '0.00', NULL, 'Ne Procesim'),
(84, 2, '2023-02-18', '169.00', NULL, 'Ne Procesim'),
(85, 2, '2023-02-18', '0.00', NULL, 'Ne Procesim'),
(86, 2, '2023-02-18', '169.00', NULL, 'Ne Procesim'),
(87, 2, '2023-02-18', '0.00', NULL, 'Ne Procesim'),
(88, 2, '2023-02-18', '169.00', NULL, 'Ne Procesim'),
(89, 2, '2023-02-18', '169.00', NULL, 'Ne Procesim'),
(90, 2, '2023-02-18', '169.00', NULL, 'Ne Procesim'),
(91, 2, '2023-02-18', '234.00', 'AB12EE', 'Ne Procesim'),
(92, 2, '2023-02-18', '234.00', 'AB12EE', 'Ne Procesim'),
(93, 2, '2023-02-18', '1179.00', '5B7IKW', 'Pranuar Nga Bleresi'),
(94, 2, '2023-02-18', '13632.00', '5B7IKW', 'Ne Procesim');

-- --------------------------------------------------------

--
-- Table structure for table `produkti`
--
-- Creation: Feb 17, 2023 at 05:03 PM
-- Last update: Feb 19, 2023 at 03:08 PM
--

DROP TABLE IF EXISTS `produkti`;
CREATE TABLE IF NOT EXISTS `produkti` (
  `produktiID` int(11) NOT NULL AUTO_INCREMENT,
  `emriProduktit` varchar(255) NOT NULL,
  `emriKompanis` varchar(30) NOT NULL,
  `kategoriaProduktit` varchar(50) NOT NULL,
  `pershkrimiProd` text DEFAULT NULL,
  `fotoProduktit` varchar(50) NOT NULL,
  `emriStafit` varchar(30) NOT NULL,
  `dataKrijimit` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataModifikimit` timestamp NOT NULL DEFAULT current_timestamp(),
  `qmimiProduktit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`produktiID`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `produkti`:
--

--
-- Dumping data for table `produkti`
--

INSERT INTO `produkti` (`produktiID`, `emriProduktit`, `emriKompanis`, `kategoriaProduktit`, `pershkrimiProd`, `fotoProduktit`, `emriStafit`, `dataKrijimit`, `dataModifikimit`, `qmimiProduktit`) VALUES
(1, 'Laptop ASUS TUF Gaming F15 (2021), 15.6\"', 'Asus', 'Laptop', 'Ky laptop është i pajisur me karakteristika të shkëlqyeshme. Ai mundësohet nga një procesor 6-core Intel Core i5 11400H që funksionon me një frekuencë 2.7 GHz deri në 4.5 GHz. Procesori plotësohet me 16 GB DDR4 SODIMM (slot). Hard disku 512 GB SSD M.2 PCIe NVMe shërben për të dhënat. Disku optik mungon. Të dhënat e figurës për ekranin 15.6 \" IPS me rezolucion 1920 x 1080 (Full HD) piksel janë siguruar nga kartela grafike NVIDIA GeForce RTX 3050Ti. Prej ndërfaqeve përfshin HDMI 2.0, mbështetje DisplayPort, RJ-45, 3 porte USB 3.0/3.1/3.2 Gen 1 Type-A dhe 1x Thunderbolt 4/USB4. Poashtu, laptopi mbështet standardet Wi-Fi a / b / g / n / ac / ax dhe Bluetooth v5.2. Lloji i kartës së rrjetit GLAN, WLAN. Ndër karakteristikat e tjera laptopi ka një tastierë me ndriçim dhe me taste numerike. Poashtu, përfshihen 2 altoparlantë 2W. Bateria ka kapacitet 3-cell, 48Wh. Fuqia maksimale e furnizimit me energji 180 W. Laptopi vjen me sistemin operativ Windows 11 Home.', '63e90dd68362c0.14152620.jpg', 'Llogaria', '2023-01-19 22:00:00', '2023-02-18 10:13:36', '758.50'),
(2, 'Laptop Razer Blade 15 Advanced Model', 'Razer', 'Laptop', NULL, '63d055e0c57d81.05756611.jpg', 'admin', '2023-01-19 22:00:00', '2023-02-05 11:16:48', '2710.49'),
(3, 'Celular Samsung Galaxy S22 Ultra, 6.8\", 12GB RAM, 512GB, i zi', 'Samsung', 'Smartphone', 'Dizajni i hollë dhe elegant i Galaxy S22 Ultra fsheh fotografi të pafundme ditën dhe natën, një studio pune profesionale dhe veçori novatore që ju mbajnë larg duarve. Çipi grafik përdor arkitekturën e avancuar RDNA 2 të AMD dhe teknologjinë Ray Tracing për të ofruar një përvojë vizuale të nivelit të lartë me ndriçim realist të skenës. Me një maksimum verbues prej 1750 nits, Galaxy S22 Ultra është një nga telefonat më të ndritshëm nga Samsung ndonjëherë dhe ekran Dynamic AMOLED 2X me Vision Booster, bllokon në mënyrë efektive shkëlqimin e bezdisshëm në ekran. Kamera e pasme ka një rezolucion prej 108 + 12 + 10 + 10 Mpx, kurse kamera e përparme 40 Mpx.', '63d055e915be98.37912983.jpg', 'Llogaria', '2023-01-19 22:00:00', '2023-02-18 11:59:44', '899.99'),
(4, 'Lenovo NB IdeaPad 3 15ALC6', 'Lenovo', 'Laptop', NULL, '63d055f15d73c8.42300026.jpg', 'admin', '2023-01-19 22:00:00', '2023-02-05 11:17:03', '459.50'),
(5, 'Lenovo ThinkPad P14s Gen 3 (AMD), 14\", AMD Ryzen 7 Pro, 32GB RAM, 1TB SSD, AMD Radeon 680M, i zi', 'Lenovo', 'Laptop', NULL, '63d055feb6ffa9.20196181.jpg', 'admin', '2023-01-21 17:24:31', '2023-02-05 11:17:09', '2469.50'),
(6, 'Maus pad SteelSeries QcK Heavy M', 'SteelSeries', 'Maus & Aksesore', NULL, '63d05608dd9912.15133010.jpg', 'admin', '2023-01-22 00:37:58', '2023-01-24 22:04:56', '28.50'),
(7, 'Maus pad SteelSeries QcK Edge XL', 'SteelSeries', 'Maus & Aksesore', NULL, '63d0561088af36.99850110.jpg', 'admin', '2023-01-22 00:38:30', '2023-01-24 22:05:04', '52.50'),
(8, 'Dron DJI Ryze Tello ED', 'DJI', 'Lodra smart & Dron', NULL, '63d0561af0d506.97064987.jpg', 'admin', '2023-01-22 00:39:00', '2023-01-24 22:05:14', '357.99'),
(9, 'Dron Overmax X-Bee, 600 m, i zi', 'Overmax', 'Lodra smart & Dron', NULL, '63d056224fcfd5.12230564.jpg', 'admin', '2023-01-22 00:39:38', '2023-01-24 22:05:22', '284.49'),
(10, 'Dron DJI Mavic 3 Classic (DJI RC)(EU)', 'DJI', 'Lodra smart & Dron', 'Mavic 3 Classic me performancë të lartë fluturimi dhe një kamerë Hasselblad përfaqëson cilësinë më të lartë të imazhit. Për të kapur ngjyrat natyrale të Mavic 3 Classic si kamerat e tjera Hasselblad, lentja L2D-20c përdor të njëjtat standarde kërkuese dhe ka kalibruar çdo piksel sensori me HNCS të integruar. Modaliteti video Night Images optimizon fotot në dritë të ulët, të tilla si perëndimet dhe lindjet e diellit, dhe redukton zhurmën për shkrepje më të pastra. Kjo jo vetëm që e bën më të lehtë fluturimin në distanca të gjata, por gjithashtu ndihmon në reduktimin e lëkundjeve manuale dhe siguron lëvizje më të qetë të kamerës. Mavic 3 Classic mund të fluturojë në një lartësi të caktuar dhe më pas të gjejë një rrugë të sigurt dhe efikase të kthimit në pikën e tij fillestare, duke kombinuar avantazhet e RTH të avancuar dhe RTH tradicionale dhe duke i lejuar përdoruesit të zgjedhin opsionin më të mirë sipas mjedisit.', '63d0562b618d48.16102205.jpg', 'Llogaria', '2023-01-22 00:40:14', '2023-02-18 12:00:39', '2489.99'),
(11, 'Kasë Thermaltake Core P3, e bardhë', 'Thermaltake', 'Pjesë për kompjuter', 'Core P3 TG është një kasë me kornizë të hapur me aftësi të jashtëzakonshme shikimi. Paneli i përparmë i xhamit të kalbur me trashësi 5 mm garanton qëndrueshmërinë e dritares dhe e shfaq ndërtimin tuaj me qartësi të qartë. Përdoruesit mund të shikojnë plotësisht çdo komponent të sistemit dhe të tregojnë përkushtimin dhe grupin e aftësive të tyre. Kasa është e përshtatshme me pllakat amë ATX, Micro ATX (uATX), Mini ITX. Mund të instaloni kartë grafike me gjatësi maksimale 45cm. Në panelin e përparmë kasa ka 2x USB 2.0, 2x USB 3.0, lidhës për kufje dhe mikrofon.', '63d056323276c7.81542918.jpg', 'Llogaria', '2023-01-22 00:40:53', '2023-02-18 12:02:55', '210.66'),
(12, 'Flutur ftohëse Arctic P14 PWM - 140 mm', 'Arctic', 'Pjesë për kompjuter', NULL, '63d0563b7f0dd0.69298527.jpg', 'admin', '2023-01-22 00:42:17', '2023-01-24 22:05:47', '18.45'),
(13, 'Memorie G. Skill DDR4, 8 GB, 2400 MHz, CL17', 'G.Skill', 'Pjesë për kompjuter', 'Memoria e tillë G.Skill RAM prej 8 GB do të garantojë komoditet të lartë përdorimi për shumë aplikacione. Njerëzit që presin performancë maksimale dhe kursime të larta të energjisë duhet të arrijnë te memoria DDR4. Një memorie e tillë do t\'ju lejojë të argëtoheni me performancë të shkëlqyer të operimit. Nëse kompjuteri ngadalësohet pas njëfarë kohe, do të jetë e mundur të zgjerohet memoria RAM. Vonesa CL17 do t\'ju lejojë të punoni rehat me programet e zyrës, si dhe me shumë lojëra kërkuese. Tensioni prej 1.2 V fuqizon çipat e memories DDR4, që do të thotë 20% konsum më të ulët të energjisë në krahasim me DDR3 dhe gjerësi bande më të lartë. Ky variant do të jetë një zgjidhje perfekte për përdoruesit që presin punë të rehatshme dhe, në të njëjtën kohë, kursime të larta të energjisë.', '63d056492e89d5.21517717.jpg', 'Llogaria', '2023-01-22 00:42:52', '2023-02-18 11:57:41', '18.99'),
(14, 'SSD Transcend MTE220S, M.2 - 256GB', 'Transcend', 'Pjesë për kompjuter', NULL, '63d0567a1432f3.30627468.jpg', 'admin', '2023-01-22 00:44:40', '2023-01-24 22:06:50', '29.99'),
(15, 'Ftohës Akasa DDR, aRGB LED, pasiv (AK-MX248)', 'Akasa', 'Pjesë për kompjuter', NULL, '63d05689da6022.83633684.jpg', 'admin', '2023-01-22 00:45:12', '2023-01-24 22:07:05', '30.00'),
(16, 'Përshtatës i brendshëm Akasa AK-CBUB37-50BK', 'Akasa', 'Pjesë për kompjuter', NULL, '63d056a353ba19.29349886.jpg', 'admin', '2023-01-22 00:45:53', '2023-01-24 22:07:31', '9.99'),
(17, 'Ftohës Corsair ML120 PRO RGB, 120mm', 'Corsair', 'Pjesë për kompjuter', NULL, '63d056ab22eb80.78302695.jpg', 'admin', '2023-01-22 00:46:19', '2023-01-24 22:07:39', '43.50'),
(18, 'Pastë Arctic MX-4 2019 (4g)', 'Arctic', 'Pjesë për kompjuter', NULL, '63d056b3c3cc68.15404951.jpg', 'admin', '2023-01-22 00:46:46', '2023-01-24 22:07:47', '12.99'),
(19, 'Hard disk SSD WD Green SATA III - 240GB 3D NAND', 'WD - Western Digital', 'Pjesë për kompjuter', 'WD Green është hard disk SSD për kompjuter apo laptop që ju sjell performancë të shpejtë të transferimit të të dhënave dhe ruajtjes së tyre me siguri të plotë. Luajtja e videolojërave, qasja në internet apo ndezja e sistemit operativ arrihen disa herë më shpejtë sesa hard disqet HDD. Aksesori vjen me kapacitet prej 240GB, mund të lidhet me kompjuter nëpërmjet platformës SATA III 6 Gb / s dhe është ndërtuar për konsumim të ulët të energjisë dhe operim afatgjatë. Formati i produktit është 2.5\" dhe mund të arrijë deri në 545 MB / s shpejtësi.', '63d056bd110280.38041391.jpg', 'Llogaria', '2023-01-22 00:47:16', '2023-02-18 12:04:21', '55.00'),
(20, 'Kompjuter AIO Acer Veriton Essential Z (EZ2740G),23.8\", Intel Core i5-1135G7, 8 GB DDR4, 512GB SSD, Intel UHD Graphics, i argjendtë', 'Acer', 'All in One (AiO)', NULL, '63d056c7197425.11040451.jpg', 'admin', '2023-01-22 00:47:50', '2023-01-24 22:08:07', '975.50'),
(21, 'Kompjuter Dell Inspiron 24 (5415), 23.8 \", AMD Ryzen 5, 16GB RAM, 256GB SSD, 1TB HDD, AMD Radeon Graphics, i bardhë', 'Dell', 'All in One (AiO)', NULL, '63d056d11496d3.86492053.jpg', 'admin', '2023-01-22 00:48:56', '2023-01-24 22:08:17', '1499.99'),
(22, 'Kompjuter HP ENVY 34-c1001nc, 34\", Intel Core i7, 32GB RAM, 1TB SSD, NVIDIA GeForce RTX 3060, i argjendtë', 'HP', 'All in One (AiO)', NULL, '63d056dd5bc157.84233223.jpg', 'admin', '2023-01-22 00:49:23', '2023-01-24 22:08:29', '3499.99'),
(23, 'Apple iMac 24\", M1 8-core, 8GB, 256GB, 8-core GPU, Green', 'Apple', 'All in One (AiO)', 'IMac i ri është një hap i madh përpara në ekosistemin e ri të Apple me përdorimin e platformës së fuqishme M1, i cili ka një performancë të shkëlqyeshme në një dizajn të ri me teknologji të lehtë për tu përdorur. Pikërisht atë që prisni nga një iMac i ri.\r\n\r\nPoashtu, ky kompjuter posedon një ekran Apple iMac 24 4.5K Retina AiO me diagonale 24\" dhe një rezolucion 4.5K prej 4480 × 2520 pikselë. Performanca e tij është e ndërtuar në një procesor 8-bërthamor Apple M1 me GPU 8-bërthamë dhe 16-core Neural Engine dhe gjithashtu përfshin 8 GB RAM. Ndërsa, për sistemin, të dhënat dhe aplikacionin janë të dizajnuara 256 GB SSD, kamera të integruar FaceTime HD 1080p dhe WiFi për komunikim wireless Gigabit Ethernet, duke përfshirë Bluetooth 5.0 2x Thunderbolt 4 / Type-C. Përveç kësaj, Apple iMac 24 \"4.5K Retina M1 posedon 2 porte USB Type-C 3.1 / 3.2 Gen 2 dhe 3.5 mm për kufje, si dhe operon me sistemin operativ Big Sur.', '63d056e8dc0484.98868210.jpg', 'Llogaria', '2023-01-22 00:50:00', '2023-02-18 10:13:53', '1779.00'),
(24, 'Projektor Acer C202i', 'Acer', 'TV & Projektor', 'The Acer C202i projector offers high-quality visual performance with 300 lumens and 5000:1 contrast ratio using DLP technology for 3D viewing, smooth video, and high color contrast. It has an HDMI port for quick and convenient connection to various high-resolution sources, a built-in USB port for external media players, and can project at a short distance of 0.73 meters with a WVGA resolution of 854x480 and a 16:9 aspect ratio. The projector has a lamp life of up to 30,000 hours in Eco mode, with a 1x2W internal speaker and an integrated battery for up to 5 hours of operation. It also features USB, HDMI, and 3.5mm Jack interfaces.', '63d056f36c8ac5.29677040.jpg', 'Llogaria', '2023-01-22 00:50:56', '2023-02-18 12:03:58', '359.50'),
(25, 'Maus ZOWIE by BenQ S1,i zi', 'Acer', 'Maus & Aksesore', NULL, '63d056fddef055.63527829.jpg', 'admin', '2023-01-22 00:52:37', '2023-01-24 22:09:01', '97.50'),
(26, 'Maus Marvo M720W, i zi', 'Marvo', 'Maus & Aksesore', NULL, '63d057056d4e38.57263102.jpg', 'admin', '2023-01-22 00:53:15', '2023-01-24 22:09:09', '45.59'),
(27, 'Apple MacBook Pro 16\", M2 Max 12-Core, 32GB, 1TB, 38-Core GPU, Silver', 'Apple', 'Laptop', 'Performanca e përshtatur për profesionistët. MacBook Pro 16 M2 Max i ri vjen me një ekran 16\" dhe performanca e tij i shtyn kufijtë imagjinarë në një nivel të ri. Arkitektura e përmirësuar ndjeshëm e M2 Max thjesht ka fuqi brutale për të gjitha idetë tuaja krijuese. Dhe ajo që vëreni në shikim të parë është dizajn elegant me theks në cilësinë e përpunimit.', '63d05c06aa8757.25439961.jpg', 'Llogaria', '2023-01-24 22:15:21', '2023-02-18 10:12:34', '4149.00'),
(28, 'Kufje Logitech G432, të zeza', 'Logitech', 'Kufje', 'Kufje të fuqishme por shumë të rehatshme 50mm. X 2.0 mbështetja e zërit shtesë e gjeneratës së ardhshme. Dizajnuar për përdorim me të gjitha platformat e lojërave dhe pajisjet mobile, USB DAC dhe lidhës 3.5mm. Ata janë në përputhje me PC, Mac, PS4, Xbox One, Nintendo Switch dhe gjithashtu me pajisje të lëvizshme. Mikrofoni 6mm me funksionin \"mute\". 107 dB ndjeshmëri SPL / MW. Përgjigjja frekuencore 20 - 20,000 Hz. Impedancë 39 Ohm (pasive), 5 kiloohm (aktive). Gjatësia e kabllit 2 m. Të lehta me peshë prej 303 g (me kabllo). Përmasat 172 x 81.7 x 182 mm.', '63eab827ba77c4.71044525.jpg', 'Llogaria', '2023-02-13 22:22:31', '2023-02-18 10:11:31', '84.50'),
(29, 'Hard disk Samsung SSD 970 EVO PLUS, M.2 - 250GB', 'Samsung', 'Memorie, Hapesire dhe Akesor Kompjuter', NULL, '63eab84858c8d7.45002641.jpg', 'Llogaria', '2023-02-13 22:23:04', '2023-02-13 22:52:25', '49.50'),
(30, 'Disk portativ WD Elements, 2TB, i zi', 'WD - Western Digital', 'Memorie, Hapesire dhe Akesor Kompjuter', 'WD Elements ofron një hard disk portativ dhe modern. Me kapacitet 2 TB dhe peshë të lehtë (vetëm 230 gram), ofron shumë hapësirë për një sërë të dhënash. Pjesa e tij përbërëse është një mbulesë e fortë, duke e bërë diskun më rezistent ndaj dëmtimit. Ruajtja mbështet pa probleme pajisjet e fundit USB 3.0 dhe gjithashtu është i pajtueshëm me kompjuterët USB 2.0. Pajisja në modalitetin USB 3.0 transferon deri në 5 Gb / s, nëse e lidhni atë me një kompjuter që mbështet USB 2.0, do të duhet të jeni më i ngadaltë, por gjithsesi i mjaftueshëm i shpejtë maksimal teorik deri në 480 Mb / s. Disku është i formatuar nga fabrika me NTFS dhe është në përputhje me Windows 8, Windows 7, Windows Vista dhe Windows XP. Ato mund të riformatohen pa vështirësi për sistemet Mac. Kjo bën të mundur që pronarët e kompjuterave me sisteme të ndryshme operative të përdorin diskun. Dimensionet e tij janë 21 x 111 x 82mm.', '63eab88a9bae20.95606749.jpg', 'Llogaria', '2023-02-13 22:24:10', '2023-02-18 10:14:18', '84.50'),
(31, 'Disk i jashtëm Transcend Jet 25H3B, 1 TB, i zi / kaltër', 'Transcend', 'Memorie, Hapesire dhe Akesor Kompjuter', NULL, '63eab963cfcf35.02921447.jpg', 'Llogaria', '2023-02-13 22:27:47', '2023-02-13 22:51:42', '69.50'),
(32, 'Apple MacBook Pro 16.2\", M1 Max 10-core, 32GB, 1TB, 32-core GPU, Silver', 'Apple', 'Laptop', NULL, '63eab99c203254.93655263.jpg', 'Llogaria', '2023-02-13 22:28:44', '2023-02-13 22:28:44', '3299.00'),
(33, 'Apple iPhone 11, 64GB, Black', 'Apple', 'Smartphone', NULL, '63eab9e5b821b1.87284331.jpg', 'Llogaria', '2023-02-13 22:29:57', '2023-02-13 22:29:57', '579.00'),
(34, 'Apple Magic Mouse (2022), Black Multi - Touch Surface', 'Apple', 'Maus & Aksesore', NULL, '63eab9ff27af71.66828407.jpg', 'Llogaria', '2023-02-13 22:30:23', '2023-02-13 22:30:23', '119.00'),
(35, 'Celular Samsung Galaxy A23 5G, 6.6\" FHD+, 4GB RAM, 128GB, i kaltër', 'Samsung', 'Smartphone', 'This is a mobile phone with a 6.6\" Full HD+ display and a 120 Hz refresh rate. It has a 50 MPx camera, an ultra-wide-angle lens, macro and depth sensors, and an 8 MPx front camera. It is powered by a Qualcomm Snapdragon 695 processor with 8 cores and 4 GB RAM, and has 128 GB of storage with the option to add up to 1 TB with a micro SD card. It supports LTE, Wi-Fi, Bluetooth v5.1, 5G, NF, GPS, BeiDou, QZSS, GLONASS, and Galileo. It runs on Android OS, has a 5000 mAh battery with Super Fast Charging 25W, and weighs 197 g with dimensions of 165.4 x 76.9 x 8.4 mm.', '63eaba204edb24.98379543.jpg', 'Llogaria', '2023-02-13 22:30:56', '2023-02-18 12:02:19', '299.50'),
(36, 'Apple Watch SE2 GPS 44mm, Midnight Aluminium Case me Midnight Sport Band, Regular', 'Apple', 'Smart Watch', NULL, '63eaba4ebf5fb1.84174295.jpg', 'Llogaria', '2023-02-13 22:31:42', '2023-02-13 22:31:42', '349.00'),
(37, 'Fotoaparat momental Fujifilm Instax Mini 90, i zi', 'Instax', 'Foto & Video', NULL, '63eabd7f7f4296.27491084.jpg', 'Llogaria', '2023-02-13 22:45:19', '2023-02-13 22:45:19', '119.50'),
(38, 'Printer Canon PIXMA TS3150, i zi', 'Canon', 'Printer', 'Printeri CANON PIXMA TS3150 është zgjidhja ideale për printim dhe skanim në zyrën apo shtëpinë tuaj. Pjesët përbërëse të printerit përfshijnë printimin me rezolucion 4800 x 1200 dpi, portin USB 2.0, teknologjinë Wi-Fi dhe ka madhësi 435 × 316 × 145 mm. Falë lidhjes me WI-FI ju mund të printoni edhe nga telefonët tuaj qoftë ai Android apo IOS. Në pako përfshihet : PG-545 (i zi ) CL-546 (me ngjyrë ) PG-545XL (i zi ) - opsional CL-546XL (me ngjyrë ) - opsional', '63eabdbea539b0.78235909.jpg', 'Llogaria', '2023-02-13 22:46:22', '2023-02-18 10:11:15', '79.50'),
(39, 'Kufje Sony MDR-RF895RK, të zeza, III', 'Sony', 'Kufje', NULL, '63eabdd87c2561.68876767.jpg', 'Llogaria', '2023-02-13 22:46:48', '2023-02-13 22:46:48', '99.50'),
(40, 'Kontroller Sony Playstation 5 DualSense', 'Sony', 'Lodra smart & Dron', NULL, '63eabe14e6ab51.91700813.jpg', 'Llogaria', '2023-02-13 22:47:48', '2023-02-13 22:47:48', '89.50'),
(41, 'Karrige SENSE7 Knight, e zezë', 'SENSE7', 'Karrige Gaming', NULL, '63eabe31db73d8.09365222.jpg', 'Llogaria', '2023-02-13 22:48:17', '2023-02-13 22:48:17', '169.50'),
(42, 'Maus Preyon Owl Wireless (POW35B)', 'Preyon', 'Maus & Aksesore', 'Mouse Preyon Owl është mouse gaming pa kabllo, mirëpo asgjë nuk pengon lidhjen e tij me një kabllo. Nëse bateria harxhohet, vetëm lidheni dhe mund të vazhdoni përdorimin e tij. Me 50milion klikime në përdorimin e këtij mausi që tregon për sigurinë që jepet kualitetit të këtij mausi. Me butona shtesë shumë lehtë kontrolloni vlerat DPI dhe frekuencën e përdorur. Me LED që tregojnë vlerën e selektuar lehtë.', '63eabe5a5852e1.52076563.jpg', 'Llogaria', '2023-02-13 22:48:58', '2023-02-18 10:10:49', '49.50'),
(43, 'Apple 10.9-inch iPad (10th) Wi-Fi, 64GB, Silver', 'Apple', 'Tablet', NULL, '63eabe72174975.16788497.jpg', 'Llogaria', '2023-02-13 22:49:22', '2023-02-13 22:49:22', '569.00'),
(44, 'Apple MagSafe Duo Charger', 'Apple', 'Wireless Charger', NULL, '63eabe936e0523.11456101.jpg', 'Llogaria', '2023-02-13 22:49:55', '2023-02-13 22:49:55', '169.00'),
(45, 'Apple AirPods (3rd generation) with Lightning Charging Case', 'Apple', 'Kufje', 'AirPods janë të lehta dhe ofrojnë një dizajn të konturuar. Mikrofonat me pamje nga brenda zbulojnë atë që po dëgjoni, më pas rregullojnë frekuencat e rangut të ulët dhe të mesëm për të ofruar detaje të pasura në çdo këngë.\r\n\r\nAirPods kanë një jetëgjatësi shtesë të baterisë në krahasim me AirPods (gjenerata e dytë) deri në 6 orë kohë dëgjimi dhe deri në 4 orë kohë bisede. Dhe me kutinë e karikimit Lightning, mund të shijoni deri në 30 orë kohë totale të dëgjimit. Si AirPods ashtu edhe kasa e karikimit të Rrufesë janë vlerësuar me IPX4 rezistente ndaj ujit – kështu që do të përballojnë çdo gjë, nga shiu deri tek stërvitjet e rënda.', '63eabeae767761.75083362.jpg', 'Llogaria', '2023-02-13 22:50:22', '2023-02-18 09:53:03', '239.00'),
(46, 'Karrige SENSE7 Spellcaster, e zezë/e kaltër', 'SENSE7', 'Karrige Gaming', 'Karrigia SENSE7 Spellcaster ka një formë që i përshtatet lakimit natyror të shtyllës kurrizore dhe, si rezultat, siguron pozicionin e duhur përpara kompjuterit kur jeni duke luajtur ose duke punuar. Ajo plotësohet nga një mbushje sfungjer me dendësi optimale, e cila përshtatet me trupin dhe siguron rehati. Është projektuar për njerëzit me peshë maksimale 150 kg. Karrigia peshon 17.5kg.', '63f23b534f5c52.87433500.jpg', 'Llogaria', '2023-02-19 15:06:48', '2023-02-19 15:08:03', '149.50');

-- --------------------------------------------------------

--
-- Table structure for table `tedhenatporosis`
--
-- Creation: Feb 12, 2023 at 10:50 PM
--

DROP TABLE IF EXISTS `tedhenatporosis`;
CREATE TABLE IF NOT EXISTS `tedhenatporosis` (
  `idPorosia` int(11) DEFAULT NULL,
  `idProdukti` int(11) DEFAULT NULL,
  `qmimiProd` double(10,2) NOT NULL,
  `sasiaPorositur` int(5) NOT NULL,
  `qmimiTotal` decimal(10,2) NOT NULL,
  KEY `FK_PorosiaTeDhenatPorosis` (`idPorosia`),
  KEY `FK_PorosiaProdukti` (`idProdukti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tedhenatporosis`:
--   `idProdukti`
--       `produkti` -> `produktiID`
--   `idPorosia`
--       `porosit` -> `nrPorosis`
--

--
-- Dumping data for table `tedhenatporosis`
--

INSERT INTO `tedhenatporosis` (`idPorosia`, `idProdukti`, `qmimiProd`, `sasiaPorositur`, `qmimiTotal`) VALUES
(73, 44, 169.00, 1, '169.00'),
(73, 45, 239.00, 1, '239.00'),
(73, 32, 3299.00, 1, '3299.00'),
(73, 27, 4149.00, 1, '4149.00'),
(73, 25, 97.50, 1, '97.50'),
(73, 23, 1779.00, 1, '1779.00'),
(73, 37, 119.50, 1, '119.50'),
(74, 40, 89.50, 1, '89.50'),
(75, 39, 99.50, 1, '99.50'),
(75, 43, 569.00, 1, '569.00'),
(75, 45, 239.00, 1, '239.00'),
(76, 32, 3299.00, 1, '3299.00'),
(77, 45, 239.00, 1, '239.00'),
(77, 44, 169.00, 1, '169.00'),
(77, 43, 569.00, 1, '569.00'),
(77, 42, 49.50, 1, '49.50'),
(77, 41, 169.50, 1, '169.50'),
(77, 36, 349.00, 1, '349.00'),
(77, 31, 69.50, 1, '69.50'),
(77, 39, 99.50, 1, '99.50'),
(78, 35, 299.50, 1, '299.50'),
(78, 38, 79.50, 1, '79.50'),
(79, 36, 349.00, 1, '349.00'),
(79, 39, 99.50, 1, '99.50'),
(79, 31, 69.50, 1, '69.50'),
(79, 35, 299.50, 1, '299.50'),
(80, 45, 239.00, 1, '239.00'),
(81, 31, 69.50, 1, '69.50'),
(82, 43, 569.00, 1, '569.00'),
(84, 44, 169.00, 1, '169.00'),
(86, 44, 169.00, 1, '169.00'),
(88, 44, 169.00, 1, '169.00'),
(89, 44, 169.00, 1, '169.00'),
(90, 44, 169.00, 1, '169.00'),
(91, 45, 239.00, 1, '239.00'),
(92, 45, 239.00, 1, '239.00'),
(93, 23, 1779.00, 1, '1779.00'),
(94, 23, 1779.00, 8, '14232.00');

-- --------------------------------------------------------

--
-- Table structure for table `tedhenatuser`
--
-- Creation: Feb 12, 2023 at 10:50 PM
--

DROP TABLE IF EXISTS `tedhenatuser`;
CREATE TABLE IF NOT EXISTS `tedhenatuser` (
  `userID` int(11) NOT NULL,
  `nrKontaktit` varchar(30) DEFAULT NULL,
  `qyteti` varchar(30) DEFAULT NULL,
  `zipKodi` varchar(7) DEFAULT NULL,
  `adresa` varchar(50) DEFAULT NULL,
  KEY `FK_UserTeDhenatUser` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tedhenatuser`:
--   `userID`
--       `user` -> `userID`
--

--
-- Dumping data for table `tedhenatuser`
--

INSERT INTO `tedhenatuser` (`userID`, `nrKontaktit`, `qyteti`, `zipKodi`, `adresa`) VALUES
(1, '044122123', 'Kaçanik', '71000', 'Komandant Zefi 69'),
(2, '043710410', 'Kaçanik', '71000', 'Komandant Zefi 69'),
(3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Feb 12, 2023 at 10:50 PM
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(30) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `aksesi` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `emri`, `mbiemri`, `username`, `email`, `password`, `aksesi`) VALUES
(1, 'Llogaria', 'User', 'user', 'test@rmail.com', 'user', 0),
(2, 'Llogaria', 'Adminit', 'admin', 'admin@gmail.com', 'admin', 2),
(3, 'Llogaria', 'Menagjimit', 'menagjim', 'menagjim@gmail.com', 'menagjim', 1);

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
