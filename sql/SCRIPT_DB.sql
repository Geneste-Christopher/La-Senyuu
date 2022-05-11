-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql-akashi.alwaysdata.net
-- Generation Time: Mar 22, 2022 at 04:17 PM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akashi_senyuu`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_contact`
--

CREATE TABLE `form_contact` (
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `objet_demande` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) UNSIGNED NOT NULL,
  `nom_membre` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom_membre`) VALUES
(1, 'Akashi'),
(2, 'Zatchi'),
(3, 'SaSoHriS'),
(4, 'Kaf Sensei'),
(5, 'Daemondz'),
(6, 'Hakai'),
(7, 'Sensei_LUMiN4XX'),
(8, 'Shimura');

-- --------------------------------------------------------

--
-- Table structure for table `membre_plateforme`
--

CREATE TABLE `membre_plateforme` (
  `id_membre` int(11) UNSIGNED NOT NULL,
  `id_plateforme` int(11) UNSIGNED NOT NULL COMMENT '1=PC, 2=PS, 3=XBOX, 4=NES '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membre_plateforme`
--

INSERT INTO `membre_plateforme` (`id_membre`, `id_plateforme`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 4),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 3),
(5, 2),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `plateforme`
--

CREATE TABLE `plateforme` (
  `id_plateforme` int(11) UNSIGNED NOT NULL,
  `plateforme` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plateforme`
--

INSERT INTO `plateforme` (`id_plateforme`, `plateforme`) VALUES
(1, 'PC'),
(2, 'Playstation'),
(3, 'XBOX'),
(4, 'Nintendo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Indexes for table `membre_plateforme`
--
ALTER TABLE `membre_plateforme`
  ADD PRIMARY KEY (`id_membre`,`id_plateforme`),
  ADD KEY `FK_membre_plateforme_id_plateforme` (`id_plateforme`);

--
-- Indexes for table `plateforme`
--
ALTER TABLE `plateforme`
  ADD PRIMARY KEY (`id_plateforme`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `plateforme`
--
ALTER TABLE `plateforme`
  MODIFY `id_plateforme` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `membre_plateforme`
--
ALTER TABLE `membre_plateforme`
  ADD CONSTRAINT `FK_membre_plateforme_id_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `FK_membre_plateforme_id_plateforme` FOREIGN KEY (`id_plateforme`) REFERENCES `plateforme` (`id_plateforme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
