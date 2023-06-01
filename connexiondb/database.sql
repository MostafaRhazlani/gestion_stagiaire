-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 01:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_stage`
--

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `idFiliere` int(4) NOT NULL,
  `nomFiliere` varchar(50) DEFAULT NULL,
  `niveau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`idFiliere`, `nomFiliere`, `niveau`) VALUES
(1, 'TSDI', 'TS'),
(2, 'TSGE', 'TS'),
(3, 'TGI', 'T'),
(4, 'TSRI', 'TS'),
(5, 'TCE', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `idStagiaires` int(4) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `civilite` varchar(1) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `idFiliere` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stagiaire`
--

INSERT INTO `stagiaire` (`idStagiaires`, `nom`, `prenom`, `civilite`, `photo`, `idFiliere`) VALUES
(1, 'SAADAOUI', 'MOHAMMED', 'M', 'images.png', 1),
(2, 'CHAFIK', 'OMAR', 'M', 'images.png', 1),
(3, 'SALIM', 'RACHIDA', 'F', 'images.png', 1),
(4, 'FAOUZI', 'NABILA', 'F', '#', 1),
(5, 'ETTAOUSSI', 'KAMAL', 'M', '#', 2),
(6, 'EZZAKI', 'ABDELKARIM', 'M', '#', 3),
(7, 'SAADAOUI', 'MOHAMMED', 'M', 'Mostafa.jpg', 1),
(8, 'CHAFIK', 'OMAR', 'M', '#', 2),
(9, 'SALIM', 'RACHIDA', 'F', '#', 3),
(10, 'FAOUZI', 'NABILA', 'F', '#', 1),
(11, 'ETTAOUSSI', 'KAMAL', 'M', '#', 2),
(12, 'EZZAKI', 'ABDELKARIM', 'M', '#', 3),
(13, 'SAADAOUI', 'MOHAMMED', 'M', 'Mostafa.jpg', 1),
(14, 'CHAFIK', 'OMAR', 'M', '#', 2),
(15, 'SALIM', 'RACHIDA', 'F', '#', 3),
(16, 'FAOUZI', 'NABILA', 'F', '#', 1),
(17, 'ETTAOUSSI', 'KAMAL', 'M', '#', 2),
(18, 'EZZAKI', 'ABDELKARIM', 'M', '#', 3);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `iduser` int(4) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `etat` int(1) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `login`, `email`, `role`, `etat`, `pwd`) VALUES
(1, 'admin', 'gh.morocco0000@gmail.com', 'ADMIN', 1, '4a7d1ed414474e4033ac29ccb8653d9b'),
(2, 'othmane', 'oghazlani0@gmail.com', 'VISITEUR', 0, '4a7d1ed414474e4033ac29ccb8653d9b'),
(3, 'azdin', 'rhazlaniazdin@test.com', 'VISITEUR', 1, '202cb962ac59075b964b07152d234b70'),
(4, 'user4', 'user4@gmail.com', 'VISITEUR', 1, '4a7d1ed414474e4033ac29ccb8653d9b'),
(5, 'user5', 'user5@gmail.com', 'VISITEUR', 1, '202cb962ac59075b964b07152d234b70'),
(6, 'user6', 'user6@gmail.com', 'VISITEUR', 1, '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`idFiliere`);

--
-- Indexes for table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`idStagiaires`),
  ADD KEY `idFiliere` (`idFiliere`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `idFiliere` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stagiaire`
--
ALTER TABLE `stagiaire`
  MODIFY `idStagiaires` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `iduser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `stagiaire_ibfk_1` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`idFiliere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
