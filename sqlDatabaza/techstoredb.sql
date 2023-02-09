-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 10:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (
    `IDmesazhi`,
    `emri`,
    `email`,
    `mesazhi`,
    `dataDergeses`,
    `statusi`
  )
VALUES (
    1,
    'Rilind',
    'r.kycyku.12@gmail.com',
    'ssdgadgf',
    '2023-01-20 23:00:00',
    'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'
  ),
  (
    2,
    'Rilind',
    'r.kycyku.12@gmail.com',
    'test',
    '2023-01-21 18:50:18',
    'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email'
  );
-- --------------------------------------------------------
--
-- Table structure for table `kategoriaproduktit`
--

CREATE TABLE `kategoriaproduktit` (
  `kategoriaID` int(11) NOT NULL,
  `emriKategoris` varchar(255) NOT NULL,
  `pershkrimiKategoris` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `kategoriaproduktit`
--

INSERT INTO `kategoriaproduktit` (
    `kategoriaID`,
    `emriKategoris`,
    `pershkrimiKategoris`
  )
VALUES (1, 'Smartphone', ''),
  (2, 'Laptop', ''),
  (
    3,
    'Smart Watch',
    'Ore te menqura te markave te ndryshme'
  ),
  (4, 'Foto & Video', ''),
  (5, 'Audio', ''),
  (8, 'All in One (AiO)', ''),
  (9, 'TV & Projektor', ''),
  (10, 'Maus & Aksesore', ''),
  (11, 'Lodra smart & Dron', ''),
  (12, 'Pjesë për kompjuter', '');
-- --------------------------------------------------------
--
-- Table structure for table `kompania`
--

CREATE TABLE `kompania` (
  `kompaniaID` int(11) NOT NULL,
  `emriKompanis` varchar(50) NOT NULL,
  `kompaniaLogo` varchar(255) NOT NULL,
  `adresaKompanis` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `kompania`
--

INSERT INTO `kompania` (
    `kompaniaID`,
    `emriKompanis`,
    `kompaniaLogo`,
    `adresaKompanis`
  )
VALUES (1, 'Apple', 'AppleLogo.png', ''),
  (2, 'Amd', 'AMDLogo.png', NULL),
  (3, 'Asus', 'AsusLogo.png', NULL),
  (4, 'JBL', 'JBL.png', NULL),
  (5, 'Lenovo', 'Lenovo.png', ''),
  (6, 'Logitech', 'Logitech.png', ''),
  (7, 'MSI', 'MSI.png', ''),
  (8, 'Nvidia', 'Nvidia.png', ''),
  (9, 'Razer', 'Razer.png', ''),
  (10, 'Samsung', 'SamsungLogo.png', ''),
  (
    11,
    'SteelSeries',
    '63cc8f01dacf35.52923644.png',
    ''
  ),
  (
    12,
    'Thermaltake',
    '63cc904665b4c8.92639137.png',
    ''
  ),
  (13, 'DJI', '63cc90567d1235.30779652.png', ''),
  (14, 'Overmax', '63cc90641f4676.38918423.jpg', ''),
  (15, 'G.Skill', '63cc9106dcdca0.15849659.png', ''),
  (17, 'Akasa', '63cc916f505f64.49149237.png', ''),
  (18, 'Corsair', '63cc919875a410.74994322.png', ''),
  (
    19,
    'WD - Western Digital',
    '63cc923d6652a6.82761403.png',
    ''
  ),
  (20, 'HP', '63cc929ca61d21.63137864.png', ''),
  (21, 'Acer', '63cc92dd919978.62580492.png', ''),
  (
    22,
    'ZOWIE - BenQ',
    '63cc933025a1f3.70979396.png',
    ''
  ),
  (23, 'Marvo', '63cc93503bc070.76804317.png', ''),
  (24, 'Arctic', '63cc945c98f987.79971283.png', ''),
  (
    25,
    'Transcend',
    '63cc94dc60f873.30313171.png',
    ''
  ),
  (26, 'Dell', '63cc95f0a30e93.21744349.png', '');
-- --------------------------------------------------------
--
-- Table structure for table `porosia`
--

CREATE TABLE `porosia` (
  `porosiaID` int(11) NOT NULL,
  `produktiID` int(11) NOT NULL,
  `userID` varchar(11) NULL DEFAULT NULL, 
  `emriKlientit` varchar(30) NOT NULL,
  `mbiemriKlientit` varchar(30) NOT NULL,
  `emailKlientit` varchar(55) NOT NULL,
  `nrKontaktit` varchar(30) NOT NULL,
  `qyteti` varchar(30) NOT NULL,
  `adresaKlientit` varchar(255) NOT NULL,
  `dataPorosis` date NOT NULL DEFAULT current_timestamp(),
  `qmimiProd` double(10, 2) NOT NULL,
  `sasiaPorositur` int(5) NOT NULL,
  `qmimiTotal` decimal(10, 2) NOT NULL,
  `statusiPorosis` varchar(30) NOT NULL DEFAULT 'Ne Procesim'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `porosia`
--

INSERT INTO `porosia` (
    `porosiaID`,
    `produktiID`,
    `userID`,
    `emriKlientit`,
    `mbiemriKlientit`,
    `emailKlientit`,
    `nrKontaktit`,
    `qyteti`,
    `adresaKlientit`,
    `dataPorosis`,
    `qmimiProd`,
    `sasiaPorositur`,
    `qmimiTotal`,
    `statusiPorosis`
  )
VALUES (
    1,
    28,
    2,
    'admin',
    'admin',
    'r.kycyku.12@gmail.com',
    '+38343710410',
    'kaqanik',
    'besa',
    '2023-01-23',
    0.00,
    0,
    '5339.00',
    'Pranuar Nga Bleresi'
  ),
  (
    2,
    10,
    1,
    'user',
    'user',
    'test@rmail.com',
    '+38343710410',
    'kaqanik',
    'sdgdags',
    '2023-01-23',
    52.50,
    2,
    '107.00',
    'Pranuar Nga Bleresi'
  ),
  (
    3,
    16,
    1,
    'user',
    'user',
    'test@rmail.com',
    '+38343710410',
    'kaqanik',
    'asdgsdg',
    '2023-01-23',
    18.45,
    4,
    '75.80',
    'Pranuar Nga Bleresi'
  ),
  (
    4,
    23,
    1,
    'user',
    'user',
    'test@rmail.com',
    '+38343710410',
    'kaqanik',
    'dgdgsdfg',
    '2023-01-23',
    12.99,
    9,
    '118.91',
    'Pranuar Nga Bleresi'
  ),
  (
    5,
    14,
    1,
    'user',
    'user',
    'test@rmail.com',
    '+38343710410',
    'kaqanik',
    'zbzb',
    '2023-01-24',
    210.66,
    4,
    '844.64',
    'E Derguar'
  );
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
  `qmimiProduktit` decimal(10, 2) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `produkti`
--

INSERT INTO `produkti` (
    `produktiID`,
    `emriProduktit`,
    `emriKompanis`,
    `kategoriaProduktit`,
    `fotoProduktit`,
    `emriStafit`,
    `dataKrijimit`,
    `dataModifikimit`,
    `qmimiProduktit`
  )
VALUES (
    3,
    'Laptop ASUS TUF Gaming F15 (2021), 15.6\"',
    'Asus',
    'laptop',
    '63d05a950ec7c0.04651424.jpg',
    'admin',
    '2023-01-19 22:00:00',
    '2023-01-24 22:24:21',
    '758.50'
  ),
  (
    4,
    'Laptop Razer Blade 15 Advanced Model',
    'Razer',
    'laptop',
    '63d055e0c57d81.05756611.jpg',
    'admin',
    '2023-01-19 22:00:00',
    '2023-01-24 22:04:16',
    '2710.49'
  ),
  (
    5,
    'Samsung s22 Ultra, 512GB',
    'Samsung',
    'celular',
    '63d055e915be98.37912983.jpg',
    'admin',
    '2023-01-19 22:00:00',
    '2023-01-24 22:04:25',
    '899.99'
  ),
  (
    6,
    'Lenovo NB IdeaPad 3 15ALC6',
    'Lenovo',
    'laptop',
    '63d055f15d73c8.42300026.jpg',
    'admin',
    '2023-01-19 22:00:00',
    '2023-01-24 22:04:33',
    '459.50'
  ),
  (
    8,
    'Lenovo ThinkPad P14s Gen 3 (AMD), 14\", AMD Ryzen 7 Pro, 32GB RAM, 1TB SSD, AMD Radeon 680M, i zi',
    'Lenovo',
    'laptop',
    '63d055feb6ffa9.20196181.jpg',
    'admin',
    '2023-01-21 17:24:31',
    '2023-01-24 22:04:46',
    '2469.50'
  ),
  (
    9,
    'Maus pad SteelSeries QcK Heavy M',
    'SteelSeries',
    'Maus & Aksesore',
    '63d05608dd9912.15133010.jpg',
    'admin',
    '2023-01-22 00:37:58',
    '2023-01-24 22:04:56',
    '28.50'
  ),
  (
    10,
    'Maus pad SteelSeries QcK Edge XL',
    'SteelSeries',
    'Maus & Aksesore',
    '63d0561088af36.99850110.jpg',
    'admin',
    '2023-01-22 00:38:30',
    '2023-01-24 22:05:04',
    '52.50'
  ),
  (
    11,
    'Dron DJI Ryze Tello ED',
    'DJI',
    'Lodra smart & Dron',
    '63d0561af0d506.97064987.jpg',
    'admin',
    '2023-01-22 00:39:00',
    '2023-01-24 22:05:14',
    '357.99'
  ),
  (
    12,
    'Dron Overmax X-Bee, 600 m, i zi',
    'Overmax',
    'Lodra smart & Dron',
    '63d056224fcfd5.12230564.jpg',
    'admin',
    '2023-01-22 00:39:38',
    '2023-01-24 22:05:22',
    '284.49'
  ),
  (
    13,
    'Dron DJI Mavic 3 Classic (DJI RC)(EU)',
    'DJI',
    'Lodra smart & Dron',
    '63d0562b618d48.16102205.jpg',
    'admin',
    '2023-01-22 00:40:14',
    '2023-01-24 22:05:31',
    '2489.99'
  ),
  (
    14,
    'Kasë Thermaltake Core P3, e bardhë',
    'Thermaltake',
    'Pjesë për kompjuter',
    '63d056323276c7.81542918.jpg',
    'admin',
    '2023-01-22 00:40:53',
    '2023-01-24 22:05:38',
    '210.66'
  ),
  (
    16,
    'Flutur ftohëse Arctic P14 PWM - 140 mm',
    'Arctic',
    'Pjesë për kompjuter',
    '63d0563b7f0dd0.69298527.jpg',
    'admin',
    '2023-01-22 00:42:17',
    '2023-01-24 22:05:47',
    '18.45'
  ),
  (
    17,
    'Memorie G. Skill DDR4, 8 GB, 2400 MHz, CL17',
    'G.Skill',
    'Pjesë për kompjuter',
    '63d056492e89d5.21517717.jpg',
    'admin',
    '2023-01-22 00:42:52',
    '2023-01-24 22:06:01',
    '18.99'
  ),
  (
    19,
    'SSD Transcend MTE220S, M.2 - 256GB',
    'Transcend',
    'Pjesë për kompjuter',
    '63d0567a1432f3.30627468.jpg',
    'admin',
    '2023-01-22 00:44:40',
    '2023-01-24 22:06:50',
    '29.99'
  ),
  (
    20,
    'Ftohës Akasa DDR, aRGB LED, pasiv (AK-MX248)',
    'Akasa',
    'Pjesë për kompjuter',
    '63d05689da6022.83633684.jpg',
    'admin',
    '2023-01-22 00:45:12',
    '2023-01-24 22:07:05',
    '30.00'
  ),
  (
    21,
    'Përshtatës i brendshëm Akasa AK-CBUB37-50BK',
    'Akasa',
    'Pjesë për kompjuter',
    '63d056a353ba19.29349886.jpg',
    'admin',
    '2023-01-22 00:45:53',
    '2023-01-24 22:07:31',
    '9.99'
  ),
  (
    22,
    'Ftohës Corsair ML120 PRO RGB, 120mm',
    'Corsair',
    'Pjesë për kompjuter',
    '63d056ab22eb80.78302695.jpg',
    'admin',
    '2023-01-22 00:46:19',
    '2023-01-24 22:07:39',
    '43.50'
  ),
  (
    23,
    'Pastë Arctic MX-4 2019 (4g)',
    'Arctic',
    'Pjesë për kompjuter',
    '63d056b3c3cc68.15404951.jpg',
    'admin',
    '2023-01-22 00:46:46',
    '2023-01-24 22:07:47',
    '12.99'
  ),
  (
    24,
    'Hard disk SSD WD Green SATA III - 240GB 3D NAND',
    'WD - Western Digital',
    'Pjesë për kompjuter',
    '63d056bd110280.38041391.jpg',
    'admin',
    '2023-01-22 00:47:16',
    '2023-01-24 22:07:57',
    '55.00'
  ),
  (
    25,
    'Kompjuter AIO Acer Veriton Essential Z (EZ2740G),23.8\", Intel Core i5-1135G7, 8 GB DDR4, 512GB SSD, Intel UHD Graphics, i argjendtë',
    'Acer',
    'All in One (AiO)',
    '63d056c7197425.11040451.jpg',
    'admin',
    '2023-01-22 00:47:50',
    '2023-01-24 22:08:07',
    '975.50'
  ),
  (
    26,
    'Kompjuter Dell Inspiron 24 (5415), 23.8 \", AMD Ryzen 5, 16GB RAM, 256GB SSD, 1TB HDD, AMD Radeon Graphics, i bardhë',
    'Dell',
    'All in One (AiO)',
    '63d056d11496d3.86492053.jpg',
    'admin',
    '2023-01-22 00:48:56',
    '2023-01-24 22:08:17',
    '1499.99'
  ),
  (
    27,
    'Kompjuter HP ENVY 34-c1001nc, 34\", Intel Core i7, 32GB RAM, 1TB SSD, NVIDIA GeForce RTX 3060, i argjendtë',
    'HP',
    'All in One (AiO)',
    '63d056dd5bc157.84233223.jpg',
    'admin',
    '2023-01-22 00:49:23',
    '2023-01-24 22:08:29',
    '3499.99'
  ),
  (
    28,
    'Apple iMac 24\", M1 8-core, 8GB, 256GB, 8-core GPU, Green',
    'Apple',
    'All in One (AiO)',
    '63d056e8dc0484.98868210.jpg',
    'admin',
    '2023-01-22 00:50:00',
    '2023-01-24 22:08:40',
    '1779.00'
  ),
  (
    29,
    'Projektor Acer C202i',
    'Acer',
    'TV & Projektor',
    '63d056f36c8ac5.29677040.jpg',
    'admin',
    '2023-01-22 00:50:56',
    '2023-01-24 22:08:51',
    '359.50'
  ),
  (
    31,
    'Maus ZOWIE by BenQ S1,i zi',
    'Acer',
    'Maus & Aksesore',
    '63d056fddef055.63527829.jpg',
    'admin',
    '2023-01-22 00:52:37',
    '2023-01-24 22:09:01',
    '97.50'
  ),
  (
    32,
    'Maus Marvo M720W, i zi',
    'Marvo',
    'Maus & Aksesore',
    '63d057056d4e38.57263102.jpg',
    'admin',
    '2023-01-22 00:53:15',
    '2023-01-24 22:09:09',
    '45.59'
  ),
  (
    33,
    'Apple MacBook Pro 16\", M2 Max 12-Core, 32GB, 1TB, 38-Core GPU, Silver',
    'Apple',
    'Laptop',
    '63d05c06aa8757.25439961.jpg',
    'admin',
    '2023-01-24 22:15:21',
    '2023-01-24 22:30:30',
    '4149.00'
  );
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (
    `userID`,
    `emri`,
    `mbiemri`,
    `username`,
    `email`,
    `password`,
    `aksesi`
  )
VALUES (
    1,
    'user',
    'user',
    'user',
    'test@rmail.com',
    'user',
    0
  ),
  (
    2,
    'admin',
    'admin',
    'admin',
    'admin@gmail.com',
    'admin',
    2
  ),
  (
    3,
    'menagjim',
    'Menagjimit',
    'menagjim',
    'menagjim@gmail.com',
    'menagjim',
    1
  ),
  (
    4,
    'Rilind',
    'Kyçyku',
    'rkycyku',
    'r.kycyku.12@gmail.com',
    'Testpw123',
    0
  ),
  (
    5,
    'Perparim',
    'Dardhiushta',
    'papidd',
    'papidardhishta@gmail.com',
    'Papi123@@@',
    0
  ),
  (
    6,
    'TestEmri',
    'test',
    'test',
    'r.kycyku.12@gmail.com',
    'test',
    0
  );
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
MODIFY `IDmesazhi` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT for table `kategoriaproduktit`
--
ALTER TABLE `kategoriaproduktit`
MODIFY `kategoriaID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 13;
--
-- AUTO_INCREMENT for table `kompania`
--
ALTER TABLE `kompania`
MODIFY `kompaniaID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 27;
--
-- AUTO_INCREMENT for table `porosia`
--
ALTER TABLE `porosia`
MODIFY `porosiaID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `produkti`
--
ALTER TABLE `produkti`
MODIFY `produktiID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;