-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2023 at 11:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET FOREIGN_KEY_CHECKS=0;
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
-- Creation: Feb 26, 2023 at 10:15 PM
-- Last update: Feb 26, 2023 at 10:22 PM
--

DROP TABLE IF EXISTS `contactform`;
CREATE TABLE IF NOT EXISTS `contactform` (
  `IDmesazhi` int(11) NOT NULL AUTO_INCREMENT,
  `emri` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mesazhi` text NOT NULL,
  `dataDergeses` timestamp NOT NULL DEFAULT current_timestamp(),
  `statusi` varchar(80) NOT NULL DEFAULT 'Eshte Derguar me Sukses',
  PRIMARY KEY (`IDmesazhi`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `contactform`:
--

--
-- Truncate table before insert `contactform`
--

TRUNCATE TABLE `contactform`;
--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`IDmesazhi`, `emri`, `email`, `mesazhi`, `dataDergeses`, `statusi`) VALUES
(1, 'Rilind', 'r.kycyku.12@gmail.com', 'Ky eshte nje testim', '2023-01-20 23:00:00', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(2, 'Rilind', 'r.kycyku.12@gmail.com', 'Ky eshte nje email', '2023-01-21 18:50:18', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(3, 'Edona Sula', 'edonas@rocketmail.com', 'Unë kam pranuar një porosi dhe kam qenë shumë i kënaqur me produktin dhe shërbimin e klientit.', '2023-02-26 22:20:22', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(4, 'Ardian Qorraj', 'ardianq@aol.com', 'Produkti ishte i dërguar shpejt dhe në një paketim të sigurtë, gjë që e bëri përvojën time të blerjes shumë të këndshme.', '2023-02-26 22:20:30', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(5, 'Vesa Shala', 'vesas@ymail.com', 'Stafi i shërbimit në klientë ishte shumë i kujdesshëm dhe ndihmës, duke më ndihmuar të zgjidhja shqetësimet e mia.', '2023-02-26 22:20:46', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(6, 'Labinot Gashi', 'labig@live.com', 'Produkti ishte saktësisht siç u shfaq në faqen e internetit dhe ishte i lartë cilësisht.', '2023-02-26 22:20:57', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(7, 'Flaka Krasniqi', 'flakak@icloud.com', 'Kostoja e produktit ishte shumë e arsyeshme dhe unë ndjeva se kisha bërë një blerje të mirë.', '2023-02-26 22:21:05', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(8, 'Besmir Sula', 'besmirs@protonmail.com', 'Porosia ishte e lehtë për t\'u ndjekur dhe unë isha në gjendje të dija gjithmonë ku ndodhej porosia ime.', '2023-02-26 22:21:17', 'Eshte Derguar me Sukses'),
(9, 'Elona Qorraj', 'elonaq@outlook.com', 'Në përgjithësi, unë kam qenë shumë i kënaqur me porosinë dhe do ta rekomandoja këtë biznes të tjerëve.', '2023-02-26 22:21:24', 'Eshte Derguar me Sukses'),
(10, 'Drita Gashi', 'dritag@hotmail.com', 'Blerja ishte shumë e thjeshtë dhe e lehtë për t\'u bërë.', '2023-02-26 22:21:33', 'Eshte Derguar me Sukses'),
(11, 'Arber Krasniqi', 'arberk@gmail.com', 'Transporti ishte shumë i shpejtë dhe produkti mbërriti në kohën e duhur.', '2023-02-26 22:21:40', 'Eshte Derguar me Sukses'),
(12, 'Lirim Shala', 'lirimsh@yahoo.com', 'Gjithçka ishte e përsosur dhe unë nuk mund të kisha kërkuar një përvojë të blerjes më të mirë.', '2023-02-26 22:21:47', 'Eshte Derguar me Sukses');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriaproduktit`
--
-- Creation: Feb 26, 2023 at 07:05 PM
--

DROP TABLE IF EXISTS `kategoriaproduktit`;
CREATE TABLE IF NOT EXISTS `kategoriaproduktit` (
  `kategoriaID` int(11) NOT NULL AUTO_INCREMENT,
  `emriKategoris` varchar(255) NOT NULL,
  `pershkrimiKategoris` text DEFAULT NULL,
  PRIMARY KEY (`kategoriaID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `kategoriaproduktit`:
--

--
-- Truncate table before insert `kategoriaproduktit`
--

TRUNCATE TABLE `kategoriaproduktit`;
--
-- Dumping data for table `kategoriaproduktit`
--

INSERT INTO `kategoriaproduktit` (`kategoriaID`, `emriKategoris`, `pershkrimiKategoris`) VALUES
(1, 'Smartphone dhe Aksesore', ''),
(2, 'Laptope', ''),
(3, 'Smart Watch dhe Aksesore', 'Ore te menqura te markave te ndryshme'),
(4, 'Foto & Video', ''),
(5, 'Audio dhe Kufje', ''),
(6, 'All in One (AiO) PC', ''),
(7, 'TV & Projektor', ''),
(8, 'Maus & Aksesore', ''),
(9, 'Lodra smart & Dron', ''),
(10, 'Pjesë për kompjuter', 'Pjese te ndryshme per kompjuter, si: Ram, Procesor, GPU etj.'),
(11, 'Wireless Charger', ''),
(12, 'Tablet dhe Aksesore', ''),
(13, 'Paisje Gaming', 'Fanella, Karrige dhe te tjera'),
(14, 'Printer dhe Paisje per Printer', ''),
(15, 'Kabllo te ndryshme & Adapter', ''),
(16, 'Monitor', '');

-- --------------------------------------------------------

--
-- Table structure for table `kodizbritjes`
--
-- Creation: Feb 26, 2023 at 07:05 PM
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
-- Truncate table before insert `kodizbritjes`
--

TRUNCATE TABLE `kodizbritjes`;
--
-- Dumping data for table `kodizbritjes`
--

INSERT INTO `kodizbritjes` (`kodi`, `idProduktit`, `dataKrijimit`, `qmimiZbritjes`) VALUES
('1GYOLV', '3', '2023-02-17', 30.00),
('5B7IKW', '23', '2023-02-15', 600.00),
('AB12EE', '45', '2023-02-14', 5.00),
('CI6RZ9', '21', '2023-02-15', 250.00),
('FGNBSQ', '20', '2023-02-15', 123.00);

-- --------------------------------------------------------

--
-- Table structure for table `kompania`
--
-- Creation: Feb 26, 2023 at 07:05 PM
--

DROP TABLE IF EXISTS `kompania`;
CREATE TABLE IF NOT EXISTS `kompania` (
  `kompaniaID` int(11) NOT NULL AUTO_INCREMENT,
  `emriKompanis` varchar(50) NOT NULL,
  `kompaniaLogo` varchar(255) NOT NULL,
  `adresaKompanis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kompaniaID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `kompania`:
--

--
-- Truncate table before insert `kompania`
--

TRUNCATE TABLE `kompania`;
--
-- Dumping data for table `kompania`
--

INSERT INTO `kompania` (`kompaniaID`, `emriKompanis`, `kompaniaLogo`, `adresaKompanis`) VALUES
(1, 'Apple', 'AppleLogo.png', ''),
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
(30, 'Preyon', '63eabd4a55ae01.00211971.svg', ''),
(31, 'Gjirafa50', '63f5ea779c6482.16567878.png', ''),
(32, 'Lenuo', '63f5ea98f28fb2.30089124.jpg', ''),
(33, 'Intel', '63f5eaa81a4847.00442944.png', ''),
(34, 'AXAGON', '63f5eab4b1f247.31552576.jpg', ''),
(35, 'FIXED', '63f5ebb63fe7d9.83256153.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `porosit`
--
-- Creation: Feb 26, 2023 at 07:05 PM
-- Last update: Feb 26, 2023 at 10:16 PM
--

DROP TABLE IF EXISTS `porosit`;
CREATE TABLE IF NOT EXISTS `porosit` (
  `nrPorosis` int(11) NOT NULL AUTO_INCREMENT,
  `idKlienti` int(11) DEFAULT NULL,
  `dataPorosis` date NOT NULL DEFAULT current_timestamp(),
  `TotaliPorosis` decimal(14,2) NOT NULL,
  `kodiZbritjes` char(6) DEFAULT NULL,
  `statusiPorosis` varchar(30) NOT NULL DEFAULT 'Ne Procesim',
  PRIMARY KEY (`nrPorosis`),
  KEY `FK_KlientiPorosia` (`idKlienti`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `porosit`:
--   `idKlienti`
--       `user` -> `userID`
--

--
-- Truncate table before insert `porosit`
--

TRUNCATE TABLE `porosit`;
--
-- Dumping data for table `porosit`
--

INSERT INTO `porosit` (`nrPorosis`, `idKlienti`, `dataPorosis`, `TotaliPorosis`, `kodiZbritjes`, `statusiPorosis`) VALUES
(1, 12, '2023-02-08', 235.00, 'AB12EE', 'Pranuar Nga Bleresi'),
(2, 1, '2023-02-09', 817.50, NULL, 'Pranuar Nga Bleresi'),
(3, 14, '2023-02-10', 240.00, NULL, 'Pranuar Nga Bleresi'),
(4, 4, '2023-02-14', 169.00, NULL, 'Pranuar Nga Bleresi'),
(5, 9, '2023-02-16', 9252.00, '5B7IKW', 'Pranuar Nga Bleresi'),
(6, 7, '2023-02-16', 3299.00, NULL, 'Pranuar Nga Bleresi'),
(7, 4, '2023-02-16', 89.50, NULL, 'Pranuar Nga Bleresi'),
(8, 8, '2023-02-17', 379.00, NULL, 'Pranuar Nga Bleresi'),
(9, 8, '2023-02-18', 239.00, NULL, 'Pranuar Nga Bleresi'),
(10, 1, '2023-02-18', 69.50, NULL, 'Pranuar Nga Bleresi'),
(11, 10, '2023-02-18', 1179.00, '5B7IKW', 'Pranuar Nga Bleresi'),
(12, 9, '2023-02-21', 569.00, NULL, 'E Derguar'),
(13, 11, '2023-02-21', 149.50, NULL, 'E Derguar'),
(14, 11, '2023-02-22', 49.50, NULL, 'E Derguar'),
(15, 12, '2023-02-22', 969.50, 'Y1V2CE', 'E Derguar'),
(16, 7, '2023-02-23', 907.50, NULL, 'E Derguar'),
(17, 13, '2023-02-24', 1199.50, NULL, 'E Derguar'),
(18, 13, '2023-02-25', 396.50, NULL, 'E Derguar'),
(19, 14, '2023-02-26', 3999.96, 'PBJQAE', 'Ne Procesim'),
(20, 8, '2023-02-26', 1714.00, NULL, 'Ne Procesim'),
(21, 10, '2023-02-26', 13632.00, '5B7IKW', 'Ne Procesim'),
(22, 10, '2023-02-26', 396.50, NULL, 'Ne Procesim');

-- --------------------------------------------------------

--
-- Table structure for table `produkti`
--
-- Creation: Feb 26, 2023 at 07:05 PM
--

DROP TABLE IF EXISTS `produkti`;
CREATE TABLE IF NOT EXISTS `produkti` (
  `produktiID` int(11) NOT NULL AUTO_INCREMENT,
  `emriProduktit` varchar(255) NOT NULL,
  `emriKompanis` int(11) DEFAULT NULL,
  `kategoriaProduktit` int(11) DEFAULT NULL,
  `pershkrimiProd` text DEFAULT NULL,
  `fotoProduktit` varchar(50) NOT NULL,
  `emriStafit` varchar(30) NOT NULL,
  `dataKrijimit` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataModifikimit` timestamp NOT NULL DEFAULT current_timestamp(),
  `qmimiProduktit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`produktiID`),
  KEY `FK_Kompania_Produkti` (`emriKompanis`),
  KEY `FK_Kategoria_Produkti` (`kategoriaProduktit`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `produkti`:
--   `kategoriaProduktit`
--       `kategoriaproduktit` -> `kategoriaID`
--   `emriKompanis`
--       `kompania` -> `kompaniaID`
--

--
-- Truncate table before insert `produkti`
--

TRUNCATE TABLE `produkti`;
--
-- Dumping data for table `produkti`
--

INSERT INTO `produkti` (`produktiID`, `emriProduktit`, `emriKompanis`, `kategoriaProduktit`, `pershkrimiProd`, `fotoProduktit`, `emriStafit`, `dataKrijimit`, `dataModifikimit`, `qmimiProduktit`) VALUES
(1, 'Laptop ASUS TUF Gaming F15 (2021), 15.6\"', 3, 2, 'Ky laptop është i pajisur me karakteristika të shkëlqyeshme. Ai mundësohet nga një procesor 6-core Intel Core i5 11400H që funksionon me një frekuencë 2.7 GHz deri në 4.5 GHz. Procesori plotësohet me 16 GB DDR4 SODIMM (slot). Hard disku 512 GB SSD M.2 PCIe NVMe shërben për të dhënat. Disku optik mungon. Të dhënat e figurës për ekranin 15.6 \" IPS me rezolucion 1920 x 1080 (Full HD) piksel janë siguruar nga kartela grafike NVIDIA GeForce RTX 3050Ti. Prej ndërfaqeve përfshin HDMI 2.0, mbështetje DisplayPort, RJ-45, 3 porte USB 3.0/3.1/3.2 Gen 1 Type-A dhe 1x Thunderbolt 4/USB4. Poashtu, laptopi mbështet standardet Wi-Fi a / b / g / n / ac / ax dhe Bluetooth v5.2. Lloji i kartës së rrjetit GLAN, WLAN. Ndër karakteristikat e tjera laptopi ka një tastierë me ndriçim dhe me taste numerike. Poashtu, përfshihen 2 altoparlantë 2W. Bateria ka kapacitet 3-cell, 48Wh. Fuqia maksimale e furnizimit me energji 180 W. Laptopi vjen me sistemin operativ Windows 11 Home.', '63e90dd68362c0.14152620.webp', 'Llogaria', '2023-01-19 22:00:00', '2023-02-22 10:24:16', 758.50),
(2, 'Laptop Razer Blade 15 Advanced Model', 9, 2, '', '63d055e0c57d81.05756611.webp', 'Llogaria', '2023-01-19 22:00:00', '2023-02-22 10:26:36', 2710.49),
(3, 'Celular Samsung Galaxy S22 Ultra, 6.8\", 12GB RAM, 512GB, i zi', 10, 1, 'Dizajni i hollë dhe elegant i Galaxy S22 Ultra fsheh fotografi të pafundme ditën dhe natën, një studio pune profesionale dhe veçori novatore që ju mbajnë larg duarve. Çipi grafik përdor arkitekturën e avancuar RDNA 2 të AMD dhe teknologjinë Ray Tracing për të ofruar një përvojë vizuale të nivelit të lartë me ndriçim realist të skenës. Me një maksimum verbues prej 1750 nits, Galaxy S22 Ultra është një nga telefonat më të ndritshëm nga Samsung ndonjëherë dhe ekran Dynamic AMOLED 2X me Vision Booster, bllokon në mënyrë efektive shkëlqimin e bezdisshëm në ekran. Kamera e pasme ka një rezolucion prej 108 + 12 + 10 + 10 Mpx, kurse kamera e përparme 40 Mpx.', '63d055e915be98.37912983.webp', 'Llogaria', '2023-01-19 22:00:00', '2023-02-22 10:27:58', 899.99),
(4, 'Lenovo NB IdeaPad 3 15ALC6', 5, 2, '', '63d055f15d73c8.42300026.webp', 'Llogaria', '2023-01-19 22:00:00', '2023-02-22 10:28:08', 459.50),
(5, 'Lenovo ThinkPad P14s Gen 3 (AMD), 14\", AMD Ryzen 7 Pro, 32GB RAM, 1TB SSD, AMD Radeon 680M, i zi', 5, 2, '', '63d055feb6ffa9.20196181.webp', 'Llogaria', '2023-01-21 17:24:31', '2023-02-22 10:28:16', 2469.50),
(6, 'Maus pad SteelSeries QcK Heavy M', 11, 8, '', '63d05608dd9912.15133010.webp', 'Llogaria', '2023-01-22 00:37:58', '2023-02-22 10:28:34', 28.50),
(7, 'Maus pad SteelSeries QcK Edge XL', 11, 8, '', '63d0561088af36.99850110.webp', 'Llogaria', '2023-01-22 00:38:30', '2023-02-22 10:28:45', 52.50),
(8, 'Dron DJI Ryze Tello ED', 13, 9, '', '63d0561af0d506.97064987.webp', 'Llogaria', '2023-01-22 00:39:00', '2023-02-22 10:28:57', 357.99),
(9, 'Dron Overmax X-Bee, 600 m, i zi', 14, 9, '', '63d056224fcfd5.12230564.webp', 'Llogaria', '2023-01-22 00:39:38', '2023-02-22 10:29:09', 284.49),
(10, 'Dron DJI Mavic 3 Classic (DJI RC)(EU)', 13, 9, 'Mavic 3 Classic me performancë të lartë fluturimi dhe një kamerë Hasselblad përfaqëson cilësinë më të lartë të imazhit. Për të kapur ngjyrat natyrale të Mavic 3 Classic si kamerat e tjera Hasselblad, lentja L2D-20c përdor të njëjtat standarde kërkuese dhe ka kalibruar çdo piksel sensori me HNCS të integruar. Modaliteti video Night Images optimizon fotot në dritë të ulët, të tilla si perëndimet dhe lindjet e diellit, dhe redukton zhurmën për shkrepje më të pastra. Kjo jo vetëm që e bën më të lehtë fluturimin në distanca të gjata, por gjithashtu ndihmon në reduktimin e lëkundjeve manuale dhe siguron lëvizje më të qetë të kamerës. Mavic 3 Classic mund të fluturojë në një lartësi të caktuar dhe më pas të gjejë një rrugë të sigurt dhe efikase të kthimit në pikën e tij fillestare, duke kombinuar avantazhet e RTH të avancuar dhe RTH tradicionale dhe duke i lejuar përdoruesit të zgjedhin opsionin më të mirë sipas mjedisit.', '63d0562b618d48.16102205.webp', 'Llogaria', '2023-01-22 00:40:14', '2023-02-22 10:29:20', 2489.99),
(11, 'Kasë Thermaltake Core P3, e bardhë', 12, 10, 'Core P3 TG është një kasë me kornizë të hapur me aftësi të jashtëzakonshme shikimi. Paneli i përparmë i xhamit të kalbur me trashësi 5 mm garanton qëndrueshmërinë e dritares dhe e shfaq ndërtimin tuaj me qartësi të qartë. Përdoruesit mund të shikojnë plotësisht çdo komponent të sistemit dhe të tregojnë përkushtimin dhe grupin e aftësive të tyre. Kasa është e përshtatshme me pllakat amë ATX, Micro ATX (uATX), Mini ITX. Mund të instaloni kartë grafike me gjatësi maksimale 45cm. Në panelin e përparmë kasa ka 2x USB 2.0, 2x USB 3.0, lidhës për kufje dhe mikrofon.', '63d056323276c7.81542918.webp', 'Llogaria', '2023-01-22 00:40:53', '2023-02-22 10:29:32', 210.66),
(12, 'Flutur ftohëse Arctic P14 PWM - 140 mm', 23, 10, '', '63d0563b7f0dd0.69298527.webp', 'Llogaria', '2023-01-22 00:42:17', '2023-02-22 10:29:42', 18.45),
(13, 'Memorie G. Skill DDR4, 8 GB, 2400 MHz, CL17', 15, 10, 'Memoria e tillë G.Skill RAM prej 8 GB do të garantojë komoditet të lartë përdorimi për shumë aplikacione. Njerëzit që presin performancë maksimale dhe kursime të larta të energjisë duhet të arrijnë te memoria DDR4. Një memorie e tillë do t\'ju lejojë të argëtoheni me performancë të shkëlqyer të operimit. Nëse kompjuteri ngadalësohet pas njëfarë kohe, do të jetë e mundur të zgjerohet memoria RAM. Vonesa CL17 do t\'ju lejojë të punoni rehat me programet e zyrës, si dhe me shumë lojëra kërkuese. Tensioni prej 1.2 V fuqizon çipat e memories DDR4, që do të thotë 20% konsum më të ulët të energjisë në krahasim me DDR3 dhe gjerësi bande më të lartë. Ky variant do të jetë një zgjidhje perfekte për përdoruesit që presin punë të rehatshme dhe, në të njëjtën kohë, kursime të larta të energjisë.', '63d056492e89d5.21517717.webp', 'Llogaria', '2023-01-22 00:42:52', '2023-02-22 10:29:54', 18.99),
(14, 'SSD Transcend MTE220S, M.2 - 256GB', 24, 10, '', '63d0567a1432f3.30627468.webp', 'Llogaria', '2023-01-22 00:44:40', '2023-02-22 10:30:08', 29.99),
(15, 'Ftohës Akasa DDR, aRGB LED, pasiv (AK-MX248)', 16, 10, '', '63d05689da6022.83633684.webp', 'Llogaria', '2023-01-22 00:45:12', '2023-02-22 10:30:32', 30.00),
(16, 'Përshtatës i brendshëm Akasa AK-CBUB37-50BK', 16, 15, '', '63d056a353ba19.29349886.webp', 'Llogaria', '2023-01-22 00:45:53', '2023-02-22 10:30:43', 9.99),
(17, 'Ftohës Corsair ML120 PRO RGB, 120mm', 17, 10, '', '63d056ab22eb80.78302695.webp', 'Llogaria', '2023-01-22 00:46:19', '2023-02-22 10:30:55', 43.50),
(18, 'Pastë Arctic MX-4 2019 (4g)', 23, 10, '', '63d056b3c3cc68.15404951.webp', 'Llogaria', '2023-01-22 00:46:46', '2023-02-22 10:31:08', 12.99),
(19, 'Hard disk SSD WD Green SATA III - 240GB 3D NAND', 23, 10, 'WD Green është hard disk SSD për kompjuter apo laptop që ju sjell performancë të shpejtë të transferimit të të dhënave dhe ruajtjes së tyre me siguri të plotë. Luajtja e videolojërave, qasja në internet apo ndezja e sistemit operativ arrihen disa herë më shpejtë sesa hard disqet HDD. Aksesori vjen me kapacitet prej 240GB, mund të lidhet me kompjuter nëpërmjet platformës SATA III 6 Gb / s dhe është ndërtuar për konsumim të ulët të energjisë dhe operim afatgjatë. Formati i produktit është 2.5\" dhe mund të arrijë deri në 545 MB / s shpejtësi.', '63d056bd110280.38041391.webp', 'Llogaria', '2023-01-22 00:47:16', '2023-02-22 10:31:25', 55.00),
(20, 'Kompjuter AIO Acer Veriton Essential Z (EZ2740G),23.8\", Intel Core i5-1135G7, 8 GB DDR4, 512GB SSD, Intel UHD Graphics, i argjendtë', 20, 6, '', '63d056c7197425.11040451.webp', 'Llogaria', '2023-01-22 00:47:50', '2023-02-22 10:31:47', 975.50),
(21, 'Kompjuter Dell Inspiron 24 (5415), 23.8 \", AMD Ryzen 5, 16GB RAM, 256GB SSD, 1TB HDD, AMD Radeon Graphics, i bardhë', 25, 6, '', '63d056d11496d3.86492053.webp', 'Llogaria', '2023-01-22 00:48:56', '2023-02-22 10:31:57', 1499.99),
(22, 'Kompjuter HP ENVY 34-c1001nc, 34\", Intel Core i7, 32GB RAM, 1TB SSD, NVIDIA GeForce RTX 3060, i argjendtë', 19, 6, '', '63d056dd5bc157.84233223.webp', 'Llogaria', '2023-01-22 00:49:23', '2023-02-22 10:32:05', 3499.99),
(23, 'Apple iMac 24\", M1 8-core, 8GB, 256GB, 8-core GPU, Green', 1, 6, 'IMac i ri është një hap i madh përpara në ekosistemin e ri të Apple me përdorimin e platformës së fuqishme M1, i cili ka një performancë të shkëlqyeshme në një dizajn të ri me teknologji të lehtë për tu përdorur. Pikërisht atë që prisni nga një iMac i ri.\r\n\r\nPoashtu, ky kompjuter posedon një ekran Apple iMac 24 4.5K Retina AiO me diagonale 24\" dhe një rezolucion 4.5K prej 4480 × 2520 pikselë. Performanca e tij është e ndërtuar në një procesor 8-bërthamor Apple M1 me GPU 8-bërthamë dhe 16-core Neural Engine dhe gjithashtu përfshin 8 GB RAM. Ndërsa, për sistemin, të dhënat dhe aplikacionin janë të dizajnuara 256 GB SSD, kamera të integruar FaceTime HD 1080p dhe WiFi për komunikim wireless Gigabit Ethernet, duke përfshirë Bluetooth 5.0 2x Thunderbolt 4 / Type-C. Përveç kësaj, Apple iMac 24 \"4.5K Retina M1 posedon 2 porte USB Type-C 3.1 / 3.2 Gen 2 dhe 3.5 mm për kufje, si dhe operon me sistemin operativ Big Sur.', '63d056e8dc0484.98868210.webp', 'Llogaria', '2023-01-22 00:50:00', '2023-02-22 10:32:12', 1779.00),
(24, 'Projektor Acer C202i', 20, 7, 'The Acer C202i projector offers high-quality visual performance with 300 lumens and 5000:1 contrast ratio using DLP technology for 3D viewing, smooth video, and high color contrast. It has an HDMI port for quick and convenient connection to various high-resolution sources, a built-in USB port for external media players, and can project at a short distance of 0.73 meters with a WVGA resolution of 854x480 and a 16:9 aspect ratio. The projector has a lamp life of up to 30,000 hours in Eco mode, with a 1x2W internal speaker and an integrated battery for up to 5 hours of operation. It also features USB, HDMI, and 3.5mm Jack interfaces.', '63d056f36c8ac5.29677040.webp', 'Llogaria', '2023-01-22 00:50:56', '2023-02-22 10:32:21', 359.50),
(25, 'Maus ZOWIE by BenQ S1,i zi', 21, 8, '', '63d056fddef055.63527829.webp', 'Llogaria', '2023-01-22 00:52:37', '2023-02-22 10:32:34', 97.50),
(26, 'Maus Marvo M720W, i zi', 22, 8, '', '63d057056d4e38.57263102.webp', 'Llogaria', '2023-01-22 00:53:15', '2023-02-22 10:32:51', 45.59),
(27, 'Apple MacBook Pro 16\", M2 Max 12-Core, 32GB, 1TB, 38-Core GPU, Silver', 1, 2, 'Performanca e përshtatur për profesionistët. MacBook Pro 16 M2 Max i ri vjen me një ekran 16\" dhe performanca e tij i shtyn kufijtë imagjinarë në një nivel të ri. Arkitektura e përmirësuar ndjeshëm e M2 Max thjesht ka fuqi brutale për të gjitha idetë tuaja krijuese. Dhe ajo që vëreni në shikim të parë është dizajn elegant me theks në cilësinë e përpunimit.', '63d05c06aa8757.25439961.webp', 'Llogaria', '2023-01-24 22:15:21', '2023-02-22 10:32:59', 4149.00),
(28, 'Kufje Logitech G432, të zeza', 6, 15, 'Kufje të fuqishme por shumë të rehatshme 50mm. X 2.0 mbështetja e zërit shtesë e gjeneratës së ardhshme. Dizajnuar për përdorim me të gjitha platformat e lojërave dhe pajisjet mobile, USB DAC dhe lidhës 3.5mm. Ata janë në përputhje me PC, Mac, PS4, Xbox One, Nintendo Switch dhe gjithashtu me pajisje të lëvizshme. Mikrofoni 6mm me funksionin \"mute\". 107 dB ndjeshmëri SPL / MW. Përgjigjja frekuencore 20 - 20,000 Hz. Impedancë 39 Ohm (pasive), 5 kiloohm (aktive). Gjatësia e kabllit 2 m. Të lehta me peshë prej 303 g (me kabllo). Përmasat 172 x 81.7 x 182 mm.', '63eab827ba77c4.71044525.webp', 'Llogaria', '2023-02-13 22:22:31', '2023-02-22 10:33:11', 84.50),
(29, 'Hard disk Samsung SSD 970 EVO PLUS, M.2 - 250GB', 10, 10, '', '63eab84858c8d7.45002641.webp', 'Llogaria', '2023-02-13 22:23:04', '2023-02-22 10:33:22', 49.50),
(30, 'Disk portativ WD Elements, 2TB, i zi', 18, 10, 'WD Elements ofron një hard disk portativ dhe modern. Me kapacitet 2 TB dhe peshë të lehtë (vetëm 230 gram), ofron shumë hapësirë për një sërë të dhënash. Pjesa e tij përbërëse është një mbulesë e fortë, duke e bërë diskun më rezistent ndaj dëmtimit. Ruajtja mbështet pa probleme pajisjet e fundit USB 3.0 dhe gjithashtu është i pajtueshëm me kompjuterët USB 2.0. Pajisja në modalitetin USB 3.0 transferon deri në 5 Gb / s, nëse e lidhni atë me një kompjuter që mbështet USB 2.0, do të duhet të jeni më i ngadaltë, por gjithsesi i mjaftueshëm i shpejtë maksimal teorik deri në 480 Mb / s. Disku është i formatuar nga fabrika me NTFS dhe është në përputhje me Windows 8, Windows 7, Windows Vista dhe Windows XP. Ato mund të riformatohen pa vështirësi për sistemet Mac. Kjo bën të mundur që pronarët e kompjuterave me sisteme të ndryshme operative të përdorin diskun. Dimensionet e tij janë 21 x 111 x 82mm.', '63eab88a9bae20.95606749.webp', 'Llogaria', '2023-02-13 22:24:10', '2023-02-22 10:33:34', 84.50),
(31, 'Disk i jashtëm Transcend Jet 25H3B, 1 TB, i zi / kaltër', 24, 10, '', '63eab963cfcf35.02921447.webp', 'Llogaria', '2023-02-13 22:27:47', '2023-02-22 10:33:46', 69.50),
(32, 'Apple MacBook Pro 16.2\", M1 Max 10-core, 32GB, 1TB, 32-core GPU, Silver', 1, 2, '', '63eab99c203254.93655263.webp', 'Llogaria', '2023-02-13 22:28:44', '2023-02-22 10:33:54', 3299.00),
(33, 'Apple iPhone 11, 64GB, Black', 1, 1, '', '63eab9e5b821b1.87284331.webp', 'Llogaria', '2023-02-13 22:29:57', '2023-02-22 10:34:05', 579.00),
(34, 'Apple Magic Mouse (2022), Black Multi - Touch Surface', 1, 8, '', '63eab9ff27af71.66828407.webp', 'Llogaria', '2023-02-13 22:30:23', '2023-02-22 10:34:14', 119.00),
(35, 'Celular Samsung Galaxy A23 5G, 6.6\" FHD+, 4GB RAM, 128GB, i kaltër', 10, 1, 'This is a mobile phone with a 6.6\" Full HD+ display and a 120 Hz refresh rate. It has a 50 MPx camera, an ultra-wide-angle lens, macro and depth sensors, and an 8 MPx front camera. It is powered by a Qualcomm Snapdragon 695 processor with 8 cores and 4 GB RAM, and has 128 GB of storage with the option to add up to 1 TB with a micro SD card. It supports LTE, Wi-Fi, Bluetooth v5.1, 5G, NF, GPS, BeiDou, QZSS, GLONASS, and Galileo. It runs on Android OS, has a 5000 mAh battery with Super Fast Charging 25W, and weighs 197 g with dimensions of 165.4 x 76.9 x 8.4 mm.', '63eaba204edb24.98379543.webp', 'Llogaria', '2023-02-13 22:30:56', '2023-02-22 10:34:22', 299.50),
(36, 'Apple Watch SE2 GPS 44mm, Midnight Aluminium Case me Midnight Sport Band, Regular', 1, 3, '', '63eaba4ebf5fb1.84174295.webp', 'Llogaria', '2023-02-13 22:31:42', '2023-02-22 10:34:29', 349.00),
(37, 'Fotoaparat momental Fujifilm Instax Mini 90, i zi', 26, 4, '', '63eabd7f7f4296.27491084.webp', 'Llogaria', '2023-02-13 22:45:19', '2023-02-22 10:34:47', 119.50),
(38, 'Printer Canon PIXMA TS3150, i zi', 27, 14, 'Printeri CANON PIXMA TS3150 është zgjidhja ideale për printim dhe skanim në zyrën apo shtëpinë tuaj. Pjesët përbërëse të printerit përfshijnë printimin me rezolucion 4800 x 1200 dpi, portin USB 2.0, teknologjinë Wi-Fi dhe ka madhësi 435 × 316 × 145 mm. Falë lidhjes me WI-FI ju mund të printoni edhe nga telefonët tuaj qoftë ai Android apo IOS. Në pako përfshihet : PG-545 (i zi ) CL-546 (me ngjyrë ) PG-545XL (i zi ) - opsional CL-546XL (me ngjyrë ) - opsional', '63eabdbea539b0.78235909.webp', 'Llogaria', '2023-02-13 22:46:22', '2023-02-22 10:34:57', 79.50),
(39, 'Kufje Sony MDR-RF895RK, të zeza, III', 28, 5, '', '63eabdd87c2561.68876767.webp', 'Llogaria', '2023-02-13 22:46:48', '2023-02-22 10:35:07', 99.50),
(40, 'Kontroller Sony Playstation 5 DualSense', 28, 13, '', '63eabe14e6ab51.91700813.webp', 'Llogaria', '2023-02-13 22:47:48', '2023-02-22 10:35:42', 89.50),
(41, 'Karrige SENSE7 Knight, e zezë', 29, 13, '', '63eabe31db73d8.09365222.webp', 'Llogaria', '2023-02-13 22:48:17', '2023-02-22 10:35:57', 169.50),
(42, 'Maus Preyon Owl Wireless (POW35B)', 30, 8, 'Mouse Preyon Owl është mouse gaming pa kabllo, mirëpo asgjë nuk pengon lidhjen e tij me një kabllo. Nëse bateria harxhohet, vetëm lidheni dhe mund të vazhdoni përdorimin e tij. Me 50milion klikime në përdorimin e këtij mausi që tregon për sigurinë që jepet kualitetit të këtij mausi. Me butona shtesë shumë lehtë kontrolloni vlerat DPI dhe frekuencën e përdorur. Me LED që tregojnë vlerën e selektuar lehtë.', '63eabe5a5852e1.52076563.webp', 'Llogaria', '2023-02-13 22:48:58', '2023-02-22 10:36:15', 49.50),
(43, 'Apple 10.9-inch iPad (10th) Wi-Fi, 64GB, Silver', 1, 12, '', '63eabe72174975.16788497.webp', 'Llogaria', '2023-02-13 22:49:22', '2023-02-22 10:26:17', 569.00),
(44, 'Apple MagSafe Duo Charger', 1, 11, '', '63eabe936e0523.11456101.webp', 'Llogaria', '2023-02-13 22:49:55', '2023-02-22 10:26:06', 169.00),
(45, 'Apple AirPods (3rd generation) with Lightning Charging Case', 1, 5, 'AirPods janë të lehta dhe ofrojnë një dizajn të konturuar. Mikrofonat me pamje nga brenda zbulojnë atë që po dëgjoni, më pas rregullojnë frekuencat e rangut të ulët dhe të mesëm për të ofruar detaje të pasura në çdo këngë.\r\n\r\nAirPods kanë një jetëgjatësi shtesë të baterisë në krahasim me AirPods (gjenerata e dytë) deri në 6 orë kohë dëgjimi dhe deri në 4 orë kohë bisede. Dhe me kutinë e karikimit Lightning, mund të shijoni deri në 30 orë kohë totale të dëgjimit. Si AirPods ashtu edhe kasa e karikimit të Rrufesë janë vlerësuar me IPX4 rezistente ndaj ujit – kështu që do të përballojnë çdo gjë, nga shiu deri tek stërvitjet e rënda.', '63eabeae767761.75083362.webp', 'Llogaria', '2023-02-13 22:50:22', '2023-02-22 10:25:54', 240.00),
(46, 'Karrige SENSE7 Spellcaster, e zezë/e kaltër', 29, 13, 'Karrigia SENSE7 Spellcaster ka një formë që i përshtatet lakimit natyror të shtyllës kurrizore dhe, si rezultat, siguron pozicionin e duhur përpara kompjuterit kur jeni duke luajtur ose duke punuar. Ajo plotësohet nga një mbushje sfungjer me dendësi optimale, e cila përshtatet me trupin dhe siguron rehati. Është projektuar për njerëzit me peshë maksimale 150 kg. Karrigia peshon 17.5kg.', '63f23b534f5c52.87433500.webp', 'Llogaria', '2023-02-19 15:06:48', '2023-02-22 10:25:45', 149.50),
(47, 'Kamerë Logitech StreamCam C980, e hirtë', 6, 4, 'Kjo është një kamerë transmetimi me cilësi të lartë. Ajo ofron një cilësi maksimale të regjistrimit prej 1080p në 60 korniza për sekondë. Ajo përdor ndërfaqen USB 3.2 Gen 1 lloji C për t\'u lidhur me pajisjen. Është e pajisur me një lente f / 2.0 me një gjatësi fokale prej 3.7 mm dhe një fushë shikimi prej 78 ° (diagonale). Ofron autofokus në një distancë prej 10 cm deri në pafundësi. Ka një mikrofon të dyfishtë gjithëpërfshirës të integruar me funksion të zvogëlimit të zhurmës. Gjatësia e kabllos është 1.5 m. Paketa përfshin një mbajtës për vendosjen e saj në monitor dhe një mbajtës statik.', '63f5de70338ea0.03180620.webp', 'Llogaria', '2023-02-22 09:20:48', '2023-02-22 10:25:32', 149.50),
(48, 'Altoparlant JBL CLIP 4, i kaltër i hapur', 4, 5, 'Altoparlant unik portativ me fuqi dalëse 5 W RMS, përgjigje frekuence prej 100 Hz deri 20 kHz, raport sinjal-zhurmë > 85 dB, teknologji Bluetooth 5.1. Bateria e tij polimer litium-jon karikohet për 3 orë dhe zgjat deri në 10 orë. Përmasat e altoparlantit janë: 86.3 x 134.5 x 46 mm, pesha 239 g.', '63f5deb8055346.05332264.webp', 'Llogaria', '2023-02-22 09:22:00', '2023-02-22 10:25:20', 59.50),
(49, 'Ngjyrë për printer Canon PGI-571, e kaltërt', 27, 14, 'Ngjyra e kaltër Canon CLI-571 është në përputhje me printera Canon PIXMA MG5750, MG5751, MG5752, MG5753, MG6850, MG6851, MG6852, MG6853, MG7750, MG7751, MG7752, MG7753. Kjo ngjyrë ka një vëllim prej 7 ml.', '63f5df0fe61cf8.49070509.webp', 'Llogaria', '2023-02-22 09:23:27', '2023-02-22 10:24:50', 19.50),
(50, 'Maus Razer Pro Click, i bardhë', 9, 8, 'Ky është një maus wireless i krijuar për përdoruesit e djathtë. Mausi ka lidhës USB, 8 butona dhe një rrotë mekanike. Ai ka teknologji wireless Bluetooth, sensor optik dhe ndjeshmëri maksimale 16,000 DPI.', '63f5e0272928f8.99239124.webp', 'Llogaria', '2023-02-22 09:28:07', '2023-02-22 10:24:38', 127.50),
(51, 'Karikues Samsung EP-TA12 për Samsung micro USB, i zi', 10, 15, '', '63f5e741d05b48.11483682.webp', 'Llogaria', '2023-02-22 09:58:25', '2023-02-22 09:58:25', 18.50),
(52, 'Apple 20W USB-C Power Adapter', 1, 15, 'Ky është një karikues i fuqishëm 20W, i cili përdoret për karikim të shpejtë dhe efikas në shtëpi, në zyrë dhe gjatë lëvizjes. Është i pajtueshëm me çdo pajisje USB-C, por për një performancë optimale të karikimit, Apple rekomandon përdorimin e tij me iPad Pro 11\'\' ose iPad Pro 12,9\'\' (gjenerata e tretë). Ai gjithashtu mbështet karikimin e shpejtë të iPhone 8.', '63f5e7a904efe1.07954376.webp', 'Llogaria', '2023-02-22 10:00:09', '2023-02-22 10:00:09', 30.00),
(53, 'Gjirafa50 Bad News Eagles Jersey (Rio Edition) - XXL', 31, 13, 'Ndjeni emocionin e kualifikimit të dytë në Major me fanellën e Rio Edition të Bad News Eagles.\r\n\r\nKjo fanellë e cilësisë së lartë me dizajn modern, e krijuar posaçërisht për lojtarët pasionantë të sporteve elektronike, është krijuar me krenari krahas Gjirafa50.\r\n\r\nNgjyra e saj kryesore është e gjelbër, e njohur si ngjyra dominuese e flamurit kombëtar të Brazilit.\r\n\r\nFanella ka logon e personalizuar të ekipit BNE dhe është prej 100% poliestër.', '63f5ec27d0f672.76058981.webp', 'Llogaria', '2023-02-22 10:19:19', '2023-02-22 10:19:19', 49.50),
(54, 'Gjirafa50 Bad News Eagles Jersey Legends Edition - L', 31, 13, 'Ndjeni emocionet e lojës me këtë fanellë të Legends Stage të Bad News Eagles të krijuar posaçërisht për lojtarët e apasionuar pas sporteve elektronike. Ngjyra kryesore e saj është e kuqja e kombinuar me detaje bardh e zi dhe ka logon e personalizuar të ekipit BNE. Fanella është prej 100% poliestër. Dimensionet janë 71 x 57 x 25.5 cm.\r\n\r\nKjo fanellë e cilësisë së lartë me dizajn modern është krijuar me krenari përkrah Gjirafa50.', '63f5ec4e91ff92.01429806.webp', 'Llogaria', '2023-02-22 10:19:58', '2023-02-22 10:19:58', 59.50),
(55, 'Rrip metalik FIXED për Apple Watch 38/40/41mm, i argjendtë', 35, 3, 'Rrip metalik zëvendësues që është i pajtueshëm me Apple Watch 38/40 / 41mm. Ky rrip e kthen orën në një aksesor elegant që mund ta kombinoni lehtësisht me çdo veshje.', '63f5ec798adb88.56368457.webp', 'Llogaria', '2023-02-22 10:20:41', '2023-02-22 10:20:41', 32.50),
(56, 'Mbrojtëse Lenuo Leshield për iPhone 13, e kuqe', 32, 1, 'Mbrojtëse për pjesën e pasme dhe anësore të celularit iPhone 13. Mbrojtësja është prej plastike të qëndrueshme dhe do të sigurojë mbrojtje të besueshme të celularit nga gërvishtjet dhe papastërtitë. Natyrisht, mbrojtësja ka prerje për kamerën, butonat dhe portin e karikimit. Ajo është e këndshme në prekje dhe e ruajtur mirë.', '63f5ec9fb0aa89.27408325.webp', 'Llogaria', '2023-02-22 10:21:19', '2023-02-22 10:21:19', 19.50),
(57, 'Procesor Intel Core i7-12700F', 33, 10, 'Ky është një procesor i gjeneratës së 12-të Alder Lake i krijuar për prizën LGA 1700. Ofron 8+4 bërthama fizike (8 performancë + 4 efektive, 20 threads). Frekuenca e tyre është 1.6/2.1 GHz dhe deri në 3.6/4.8 GHz në modalitetin Turbo (bërthama efikase/performancë). Frekuenca maksimale Turbo Boost është deri në 4.9 GHz. Ai ofron një memorie buffer 25 MB SmartCache dhe një proces prodhimi 10 nm është përdorur për krijimin e tij. Mbështet memorie deri në DDR5 4800 MHz dhe DDR4 3200 MHz. Mbështet ndërfaqen PCI-Express 5.0/4.0. TDP e deklaruar nga prodhuesi është 65 W (maksimumi 180 W).', '63f5ecdb56b5d2.54488204.webp', 'Llogaria', '2023-02-22 10:22:19', '2023-02-22 10:22:19', 396.50),
(58, 'Monitor Dell U3223QE - LED 31.5\", 4K UHD, i zi / argjendtë', 25, 16, 'Dell U3223QE është një monitor 31.5\" me rezolucion të lartë që do t\'ju rrëmbejë me ngjyrën dhe elegancën e tij. Rezolucioni 4K (3840 x 2160) me më shumë se 8 milionë piksele ka një rezolucion 4 herë më të lartë se një monitor klasik Full HD. Ngjyrat janë të qarta dhe të qëndrueshme përgjatë këndit të shikimit. Dell UltraSharp P3222QE është një monitor që mendon gjithashtu për shëndetin tuaj. Falë funksionit ComfortView Plus, i cili garanton emetimin vazhdimisht të ulët të dritës blu, ju do të shijoni ngjyra të shkëlqyera.\r\n\r\nKarakteristikat e tjera të monitorit përfshijnë raporti i pamjes 16: 9, kontrasti 2000: 1, shpejtësia e rifreskimit 60 Hz, ndriçimi 400 cd / m2, koha e përgjigjes 8 ms në modalitetin normal ose 5 ms në modalitetin e shpejtë. Lidhësit: 1x DP, 1x HDMI, USB-C, 6x USB, 1x RJ-45, pivot. Dimensionet 71.26 cm x 61.88 cm x 23.32 cm, pesha 10.36 k', '63f5ecf98f3534.93172253.webp', 'Llogaria', '2023-02-22 10:22:49', '2023-02-22 10:22:49', 1199.50),
(59, 'Kabllo AXAGON USB-A - micro USB 3.2 Gen 1 SPEED, 3A, 1m, e zezë', 34, 15, 'Kablloja AXAGON është e përshtatshme për laptopë, telefont, tabletë dhe pajisje e tjera celulare. Mbështet shpejtësinë e transferimit të të dhënave deri në 5 Gb / s dhe karikimin deri në 3A.', '63f5ed187916e2.65869096.webp', 'Llogaria', '2023-02-22 10:23:20', '2023-02-22 10:23:20', 9.50);

-- --------------------------------------------------------

--
-- Table structure for table `tedhenatporosis`
--
-- Creation: Feb 26, 2023 at 07:05 PM
-- Last update: Feb 26, 2023 at 10:12 PM
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
-- Truncate table before insert `tedhenatporosis`
--

TRUNCATE TABLE `tedhenatporosis`;
--
-- Dumping data for table `tedhenatporosis`
--

INSERT INTO `tedhenatporosis` (`idPorosia`, `idProdukti`, `qmimiProd`, `sasiaPorositur`, `qmimiTotal`) VALUES
(5, 44, 169.00, 1, 169.00),
(5, 45, 239.00, 1, 239.00),
(5, 32, 3299.00, 1, 3299.00),
(5, 27, 4149.00, 1, 4149.00),
(5, 25, 97.50, 1, 97.50),
(5, 23, 1779.00, 1, 1779.00),
(5, 37, 119.50, 1, 119.50),
(7, 40, 89.50, 1, 89.50),
(16, 39, 99.50, 1, 99.50),
(16, 43, 569.00, 1, 569.00),
(16, 45, 239.00, 1, 239.00),
(6, 32, 3299.00, 1, 3299.00),
(20, 45, 239.00, 1, 239.00),
(20, 44, 169.00, 1, 169.00),
(20, 43, 569.00, 1, 569.00),
(20, 42, 49.50, 1, 49.50),
(20, 41, 169.50, 1, 169.50),
(20, 36, 349.00, 1, 349.00),
(20, 31, 69.50, 1, 69.50),
(20, 39, 99.50, 1, 99.50),
(8, 35, 299.50, 1, 299.50),
(8, 38, 79.50, 1, 79.50),
(2, 36, 349.00, 1, 349.00),
(2, 39, 99.50, 1, 99.50),
(2, 31, 69.50, 1, 69.50),
(2, 35, 299.50, 1, 299.50),
(9, 45, 239.00, 1, 239.00),
(10, 31, 69.50, 1, 69.50),
(12, 43, 569.00, 1, 569.00),
(4, 44, 169.00, 1, 169.00),
(11, 23, 1779.00, 1, 1779.00),
(21, 23, 1779.00, 8, 14232.00),
(13, 46, 149.50, 1, 149.50),
(14, 53, 49.50, 1, 49.50),
(1, 45, 240.00, 1, 240.00),
(15, 58, 1199.50, 1, 1199.50),
(17, 58, 1199.50, 1, 1199.50),
(18, 57, 396.50, 1, 396.50),
(3, 45, 240.00, 1, 240.00),
(19, 22, 3499.99, 4, 13999.96),
(22, 57, 396.50, 1, 396.50);

-- --------------------------------------------------------

--
-- Table structure for table `tedhenatuser`
--
-- Creation: Feb 26, 2023 at 09:30 PM
-- Last update: Feb 26, 2023 at 09:37 PM
--

DROP TABLE IF EXISTS `tedhenatuser`;
CREATE TABLE IF NOT EXISTS `tedhenatuser` (
  `userID` int(11) NOT NULL,
  `nrKontaktit` varchar(30) DEFAULT NULL,
  `qyteti` varchar(30) DEFAULT NULL,
  `zipKodi` varchar(7) DEFAULT NULL,
  `adresa` varchar(50) DEFAULT NULL,
  UNIQUE KEY `userID` (`userID`),
  KEY `FK_UserTeDhenatUser` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tedhenatuser`:
--   `userID`
--       `user` -> `userID`
--

--
-- Truncate table before insert `tedhenatuser`
--

TRUNCATE TABLE `tedhenatuser`;
--
-- Dumping data for table `tedhenatuser`
--

INSERT INTO `tedhenatuser` (`userID`, `nrKontaktit`, `qyteti`, `zipKodi`, `adresa`) VALUES
(1, '045234567', 'Peja', '30000', 'Xhemajl Kada 3'),
(2, '044123456', 'Prishtina', '10000 ', 'Kadri Zeka 6'),
(3, '045987654', 'Gjilan ', '60000 ', 'Rexhep Luci 12'),
(4, '045234567', 'Prizren ', '20000 ', 'Bedri Pejani 5'),
(5, '049876543', 'Kaçanik', '71000', 'Bedri Pejani 7'),
(6, '044123456', 'Kaçanik', '71000', 'Rexhep Luci 6'),
(7, '049234567', 'Ferizaj', '70000 ', 'Naim Frasheri 14'),
(8, '044765432', 'Prizren ', '20000 ', 'Perparim Krasniqi 7'),
(9, '045876543', 'Gjilan ', '60000 ', 'Rruga e Kavajes 36'),
(10, '045234567', 'Gjakova ', '50000 ', 'Bajram Kelmendi 33'),
(11, '044987654', 'Peja ', '30000 ', 'Hivzi Sulejmani 8'),
(12, '049876543', 'Ferizaj ', '70000 ', '29 Nentori 19'),
(13, '043345678', 'Prizren ', '20000 ', 'Skenderbeu 2'),
(14, '046234567', 'Mitrovica ', '40000 ', 'Adem Jashari 11'),
(15, '045987654', 'Gjilan ', '60000 ', 'Rruga e Kavajes 24'),
(16, '044123456', 'Prishtina ', '10000 ', 'Rruga e Dibres 3'),
(17, '045876543', 'Prizren ', '20000 ', 'Shaban Shala 9');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Feb 26, 2023 at 07:05 PM
-- Last update: Feb 26, 2023 at 09:51 PM
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(30) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `aksesi` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `emri`, `mbiemri`, `username`, `email`, `password`, `aksesi`) VALUES
(1, 'Llogaria', 'User', 'user', 'test@rmail.com', '$2y$10$juI.BOzWW1giyHJ1D9.Hje.mOPSGAFDgB..C9ACJkSZ1cKZchCTPa', 0),
(2, 'Llogaria', 'Adminit', 'admin', 'admin@gmail.com', '$2y$10$bWkaCvfxf/k4bZMSbP2rbOHEk7NTOx9UmBjSrpOYnyMACCEq99rNa', 2),
(3, 'Llogaria', 'Menagjimit', 'menagjim', 'menagjim@gmail.com', '$2y$10$eepxMAnYPktEBl0dWRhOU.oC7S2FO2GrlxTOJuTk8YhUFNcIIRYcy', 1),
(4, 'Filan', 'Fisteku', 'filani', 'filan@gmail.com', '$2y$10$fdiuTd/R7hN.oKAaZHycoeVd.cIgIJiNriOjMlyvOhnO6xFKwGAn.', 0),
(5, 'Perparim', 'Dardhishta', 'perparimd', 'perparim.dardhishta@gmail.com', '$2y$10$X/IwYW7TA.iSqgOKNDEoaejZUUn1Qv7.Xt4.ZnWYFPYDyrrNQPClC', 2),
(6, 'Rilind', 'Kyçyku', 'rkycyku', 'r.kycyku.12@gmail.com', '$2y$10$RU7djgxAPPVNRR1A0uIOZuELNOsTGryD37nm4u3Mcc/5nWAfkp3m2', 2),
(7, 'Filane', 'Fisteku', 'filane', 'filane.fistekuu@hotmail.com', '$2y$10$cCLaFjhVB84TiwYrbPsuFObh3VN/r62GstzGcMcuW3InIQIEeu3cK', 0),
(8, 'Arber', 'Krasniqi', 'arberk', 'arberk@gmail.com', '$2y$10$cPSrPpH.gX/F/YuhkUbzveGNPYCPFLT.ZvVLhqxSYhSWsXy462vYC', 0),
(9, 'Drita', 'Gashi', 'dritag', 'dritag@hotmail.com', '$2y$10$BcFj6o3kdwyaQUNSU6zxdOqpFwcS291SzyA8weEj8cWJA465qvByK', 0),
(10, 'Lirim', 'Shala', 'lirimsh', 'lirimsh@yahoo.com', '$2y$10$MQq.GzmgUpIc04m6qRL2fuCG6Pbr9v.DvAe82p3bRt2GWWooRnU6S', 0),
(11, 'Elona', 'Qorraj', 'elonaq', 'elonaq@outlook.com', '$2y$10$xrOGFueQq4xM3SMYPmaM7eXy5zNgZUu70alQJUEOsdLfaBgU6kkB2', 0),
(12, 'Besmir', 'Sula', 'besmirs', 'besmirs@protonmail.com', '$2y$10$jW9nYJ5bLVXQRVonUAWEdeS8GH2BApaYgpnwbHKFxXsnh9uArFkya', 0),
(13, 'Flaka', 'Krasniqi', 'flakak', 'flakak@icloud.com', '$2y$10$AOpIj4UlUcaX46NVrKNl5OFjryUxyczzlk0rz6NuDTuu3nFOP2jlC', 0),
(14, 'Labinot', 'Gashi', 'labinotg', 'labig@live.com', '$2y$10$005CoHNvo74QkunTxvbMieBpksoA3XI80YHyk/UAnJ/N3P/z5HYZi', 0),
(15, 'Vesa', 'Shala', 'vesash', 'vesas@ymail.com', '$2y$10$lgJP5oGdRLFVCevycDXTk.RrJTENht9AD2UC9p2fIz2nHml/WgC7.', 1),
(16, 'Ardian', 'Qorraj', 'ardianq', 'ardianq@aol.com', '$2y$10$aX0hjrVGqnmabaoIIG17pOJeiSrBqxa3Rak6LuJX6gpZkrEMAtR.C', 0),
(17, 'Edona', 'Sula', 'edonas', 'edonas@rocketmail.com', '$2y$10$ttnZDkeekdeFQbz/YcV3BO5FpYwsDn24QTlI3LR6.0CHzWkC4ydui', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `porosit`
--
ALTER TABLE `porosit`
  ADD CONSTRAINT `FK_KlientiPorosia` FOREIGN KEY (`idKlienti`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `produkti`
--
ALTER TABLE `produkti`
  ADD CONSTRAINT `FK_Kategoria_Produkti` FOREIGN KEY (`kategoriaProduktit`) REFERENCES `kategoriaproduktit` (`kategoriaID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Kompania_Produkti` FOREIGN KEY (`emriKompanis`) REFERENCES `kompania` (`kompaniaID`) ON DELETE SET NULL ON UPDATE CASCADE;

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


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table contactform
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table kategoriaproduktit
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table kodizbritjes
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table kompania
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table porosit
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'techstoredb', 'porosit', '{\"sorted_col\":\"`porosit`.`nrPorosis` ASC\"}', '2023-02-26 22:25:20');

--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table produkti
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table tedhenatporosis
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table tedhenatuser
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'techstoredb', 'tedhenatuser', '{\"sorted_col\":\"`tedhenatuser`.`userID` ASC\"}', '2023-02-26 22:26:17');

--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table user
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'techstoredb', 'user', '{\"sorted_col\":\"`user`.`userID` ASC\"}', '2023-01-24 21:31:36');

--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for database techstoredb
--

--
-- Truncate table before insert `pma__bookmark`
--

TRUNCATE TABLE `pma__bookmark`;
--
-- Truncate table before insert `pma__relation`
--

TRUNCATE TABLE `pma__relation`;
--
-- Truncate table before insert `pma__savedsearches`
--

TRUNCATE TABLE `pma__savedsearches`;
--
-- Truncate table before insert `pma__central_columns`
--

TRUNCATE TABLE `pma__central_columns`;SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
