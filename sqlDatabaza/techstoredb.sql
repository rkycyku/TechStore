-- TechStore - Databaza
-- Versioni i PHP-s:  5.2.0
-- Emri Databazes: `techstoredb`

-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

CREATE TABLE `contactform` (
  `IDmesazhi` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mesazhi` varchar(255) NOT NULL,
  `dataDergeses` timestamp NOT NULL DEFAULT current_timestamp(),
  `statusi` varchar(80) NOT NULL DEFAULT 'Eshte Derguar me Sukses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `contactform` (`IDmesazhi`, `emri`, `email`, `mesazhi`, `dataDergeses`, `statusi`) VALUES
(1, 'Rilind', 'r.kycyku.12@gmail.com', 'ssdgadgf', '2023-01-20 23:00:00', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'),
(2, 'Rilind', 'r.kycyku.12@gmail.com', 'test', '2023-01-21 18:50:18', 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email');

-- --------------------------------------------------------

CREATE TABLE `kategoriaproduktit` (
  `kategoriaID` int(11) NOT NULL,
  `emriKategoris` varchar(255) NOT NULL,
  `pershkrimiKategoris` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kategoriaproduktit` (`kategoriaID`, `emriKategoris`, `pershkrimiKategoris`) VALUES
(1, 'Smartphone', ''),
(2, 'Laptop', ''),
(3, 'Smart Watch', 'Ore te menqura te markave te ndryshme'),
(4, 'Foto & Video', ''),
(5, 'Audio', ''),
(6, 'All in One (AiO)', ''),
(7, 'TV & Projektor', ''),
(8, 'Maus & Aksesore', ''),
(9, 'Lodra smart & Dron', ''),
(10, 'Pjesë për kompjuter', '');

-- --------------------------------------------------------

CREATE TABLE `kompania` (
  `kompaniaID` int(11) NOT NULL,
  `emriKompanis` varchar(50) NOT NULL,
  `kompaniaLogo` varchar(255) NOT NULL,
  `adresaKompanis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(25, 'Dell', '63cc95f0a30e93.21744349.png', '');

-- --------------------------------------------------------

CREATE TABLE `porosit` (
  `nrPorosis` int(11) NOT NULL,
  `idKlienti` int(11) DEFAULT NULL,
  `dataPorosis` date NOT NULL DEFAULT current_timestamp(),
  `TotaliPorosis` decimal(10,2) NOT NULL,
  `statusiPorosis` varchar(30) NOT NULL DEFAULT 'Ne Procesim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

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
(27, 'Apple MacBook Pro 16\", M2 Max 12-Core, 32GB, 1TB, 38-Core GPU, Silver', 'Apple', 'Laptop', '63d05c06aa8757.25439961.jpg', 'admin', '2023-01-24 22:15:21', '2023-01-24 22:30:30', '4149.00');

-- --------------------------------------------------------

CREATE TABLE `tedhenatporosis` (
  `idPorosia` int(11) DEFAULT NULL,
  `idProdukti` int(11) DEFAULT NULL,
  `qmimiProd` double(10,2) NOT NULL,
  `sasiaPorositur` int(5) NOT NULL,
  `qmimiTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

CREATE TABLE `tedhenatuser` (
  `userID` int(11) NOT NULL,
  `nrKontaktit` varchar(30) DEFAULT NULL,
  `qyteti` varchar(30) DEFAULT NULL,
  `zipKodi` varchar(7) DEFAULT NULL,
  `adresa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tedhenatuser` (`userID`, `nrKontaktit`, `qyteti`, `zipKodi`, `adresa`) VALUES
(1, '+38343710410', 'Kaçanik', '', ''),
(2, '043710410', 'Kaçanik', '71000', 'Komandant Zefi 69'),
(3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(30) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `aksesi` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`userID`, `emri`, `mbiemri`, `username`, `email`, `password`, `aksesi`) VALUES
(1, 'Llogaria', 'User', 'user', 'test@rmail.com', 'user', 0),
(2, 'Llogaria', 'Adminit', 'admin', 'admin@gmail.com', 'admin', 2),
(3, 'Llogaria', 'Menagjimit', 'menagjim', 'menagjim@gmail.com', 'menagjim', 1);

ALTER TABLE `contactform`
  ADD PRIMARY KEY (`IDmesazhi`);

ALTER TABLE `kategoriaproduktit`
  ADD PRIMARY KEY (`kategoriaID`);

ALTER TABLE `kompania`
  ADD PRIMARY KEY (`kompaniaID`);

ALTER TABLE `porosit`
  ADD PRIMARY KEY (`nrPorosis`),
  ADD KEY `FK_KlientiPorosia` (`idKlienti`);

ALTER TABLE `produkti`
  ADD PRIMARY KEY (`produktiID`);

ALTER TABLE `tedhenatporosis`
  ADD KEY `FK_PorosiaTeDhenatPorosis` (`idPorosia`),
  ADD KEY `FK_PorosiaProdukti` (`idProdukti`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

ALTER TABLE `contactform`
  MODIFY `IDmesazhi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `kategoriaproduktit`
  MODIFY `kategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `kompania`
  MODIFY `kompaniaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `porosit`
  MODIFY `nrPorosis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `produkti`
  MODIFY `produktiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `porosit`
  ADD CONSTRAINT `FK_KlientiPorosia` FOREIGN KEY (`idKlienti`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `tedhenatporosis`
  ADD CONSTRAINT `FK_PorosiaProdukti` FOREIGN KEY (`idProdukti`) REFERENCES `produkti` (`produktiID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PorosiaTeDhenatPorosis` FOREIGN KEY (`idPorosia`) REFERENCES `porosit` (`nrPorosis`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tedhenatuser`
  ADD CONSTRAINT `FK_UserTeDhenatUser` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

