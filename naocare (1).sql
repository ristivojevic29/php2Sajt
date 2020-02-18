-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 09:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naocare`
--

-- --------------------------------------------------------

--
-- Table structure for table `boja`
--

CREATE TABLE `boja` (
  `idBoja` int(11) NOT NULL,
  `boja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `idKategorije` int(10) NOT NULL,
  `naziv_kategorije` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`idKategorije`, `naziv_kategorije`) VALUES
(1, 'Oval'),
(2, 'Round'),
(3, 'Oblong'),
(4, 'Square'),
(5, 'Wayfarer');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(11) NOT NULL,
  `ime_korisnika` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime_korisnika` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `aktivan` bit(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `uloge_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime_korisnika`, `prezime_korisnika`, `email`, `lozinka`, `aktivan`, `created_on`, `uloge_id`) VALUES
(1, 'Baner', 'Ristivojevic', 'baneris98@gmail.com', '8dd1892a16f70d19e3c56fa42f2193f5', b'1', '2020-02-15 00:00:00', 1),
(3, 'Bane', 'Ristivojevic', 'bane@gmail.com', 'a735adbe602165e289c030426fec6c8e', b'0', '2020-02-17 17:07:21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `idKorpa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(10) NOT NULL,
  `meni` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `imeMenija` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `meni`, `imeMenija`) VALUES
(1, 'home', 'Home'),
(2, 'about', 'About'),
(3, 'shop', 'Shop'),
(4, 'contact', 'Contact'),
(5, 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `idProizvoda` int(10) NOT NULL,
  `ime_proizvoda` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cena_proizvoda` decimal(30,2) NOT NULL,
  `slika_proizvoda` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `novo` bit(1) NOT NULL,
  `idKategorije` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`idProizvoda`, `ime_proizvoda`, `cena_proizvoda`, `slika_proizvoda`, `novo`, `idKategorije`) VALUES
(1, 'Farenheit', '575.00', 'app/assets/images/s1.jpg', b'1', 1),
(2, 'Opium', '325.00', 'app/assets/images/s2.jpg', b'0', 2),
(3, 'Kenneth Cole', '450.00', 'app/assets/images/s3.jpg', b'1', 3),
(4, 'Farenheit Oval', '360.00', 'app/assets/images/s4.jpg', b'0', 4),
(5, 'Aislin Wayfarer', '775.00', 'app/assets/images/m1.jpg', b'1', 5),
(6, 'Azmani Round', '520.00', 'app/assets/images/m2.jpg', b'0', 2),
(7, 'Farenheit Wayfarer', '480.00', 'app/assets/images/m3.jpg', b'0', 4),
(8, 'Fossil Wayfarer', '820.00', 'app/assets/images/m4.jpg', b'1', 1),
(9, 'Fossil', '900.00', 'app/assets/images/s9.jpg', b'1', 5),
(10, 'Kenneth Cole', '200.00', 'app/assets/images/s10.jpg', b'0', 3),
(11, 'Quicksilver', '666.00', 'app/assets/images/s11.jpg', b'1', 4),
(12, 'Serengeti', '470.00', 'app/assets/images/s12.jpg', b'1', 2),
(13, 'Atomic', '960.00', 'app/assets/images/s13.jpg', b'0', 4),
(14, 'Under Armour', '400.00', 'app/assets/images/s14.jpg', b'0', 5),
(15, 'Bolle', '300.00', 'app/assets/images/s15.jpg', b'1', 1),
(16, 'Versace', '800.00', 'app/assets/images/s16.jpg', b'0', 2),
(18, 'Sonnenbrille', '120.00', 'app/assets/images/nova_1581969065_s17.jpg', b'1', 1),
(19, 'Sonnenbrille', '122.00', 'app/assets/images/nova_1581969291_s17.jpg', b'1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod_boja`
--

CREATE TABLE `proizvod_boja` (
  `idPB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `idUloge` int(11) NOT NULL,
  `naziv_uloge` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`idUloge`, `naziv_uloge`) VALUES
(1, 'Admin'),
(2, 'Korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boja`
--
ALTER TABLE `boja`
  ADD PRIMARY KEY (`idBoja`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`idKategorije`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idUloge` (`uloge_id`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`idKorpa`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`idProizvoda`),
  ADD KEY `idKategorije` (`idKategorije`);

--
-- Indexes for table `proizvod_boja`
--
ALTER TABLE `proizvod_boja`
  ADD PRIMARY KEY (`idPB`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`idUloge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boja`
--
ALTER TABLE `boja`
  MODIFY `idBoja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `idKategorije` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `idKorpa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `idProizvoda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `proizvod_boja`
--
ALTER TABLE `proizvod_boja`
  MODIFY `idPB` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `idUloge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`uloge_id`) REFERENCES `uloge` (`idUloge`);

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`idKategorije`) REFERENCES `kategorije` (`idKategorije`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
