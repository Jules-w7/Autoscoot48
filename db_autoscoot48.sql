-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 30 avr. 2024 à 08:59
-- Version du serveur :  5.7.11
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_autoscoot48`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_carbrand`
--

CREATE TABLE `t_carbrand` (
  `idCarBrand` int(1) NOT NULL,
  `cbrName` char(13) NOT NULL,
  `cbrCreationDate` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_carbrand`
--

INSERT INTO `t_carbrand` (`idCarBrand`, `cbrName`, `cbrCreationDate`) VALUES
(1, 'Mercedes', '1926'),
(2, 'VW', '1937'),
(3, 'Hyundai', '1967'),
(4, 'Audi', '1909'),
(5, 'KIA', '1944'),
(6, 'Ferrari', '1939'),
(7, 'Aston Martin', '1913'),
(8, 'BMW', '1916'),
(9, 'Porsche', '1931'),
(10, 'Nissan', '1933'),
(11, 'Ford', '1903');

-- --------------------------------------------------------

--
-- Structure de la table `t_carengtype`
--

CREATE TABLE `t_carengtype` (
  `idCarEngType` int(1) NOT NULL,
  `cetType` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_carengtype`
--

INSERT INTO `t_carengtype` (`idCarEngType`, `cetType`) VALUES
(1, 'Diesel'),
(2, 'Inline'),
(3, 'Eight Cylinders and Above'),
(4, 'Six Cylinder'),
(5, 'Five Cylinder'),
(6, 'Four Cylinder'),
(7, 'Three Cylinder'),
(8, 'Twin Cylinder'),
(9, 'V-Engine Layout'),
(10, 'Flat Engine Layout');

-- --------------------------------------------------------

--
-- Structure de la table `t_cars`
--

CREATE TABLE `t_cars` (
  `idCar` int(1) NOT NULL,
  `carColor` char(255) NOT NULL,
  `carPrice` int(11) NOT NULL,
  `carModel` char(255) NOT NULL,
  `carDist` int(11) NOT NULL,
  `carDealerAd` char(255) NOT NULL,
  `carDescription` char(255) NOT NULL,
  `idCarEngType` varchar(255) NOT NULL,
  `idCarBrand` varchar(255) NOT NULL,
  `carImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_cars`
--

INSERT INTO `t_cars` (`idCar`, `carColor`, `carPrice`, `carModel`, `carDist`, `carDealerAd`, `carDescription`, `idCarEngType`, `idCarBrand`, `carImage`) VALUES
(5, 'Violet', 30000, 'Polo', 100000, 'Rue du sebeillon 12', 'Grosse rayure sur tout le cote droit de la voiture', '1', '2', ''),
(6, 'Bleu', 15000, 'Amg E53', 300000, 'Rue du sebeillon 14', 'Voiture en parfait etat', '2', '1', ''),
(14, 'Vert', 400000, 'Sportage', 0, 'Rue du sÃ©beillon 12', 'Voiture refaite entierement', '1', '5', ''),
(15, 'Rouge', 1000, '125d M sport', 1500000, 'Rue du sÃ©beillon 15', 'Expertise faite', '1', '8', ''),
(16, 'Gris avec ligne noir', 300000, '911 GT2 RS', 10, 'Rue de la gare 2, Nyon', 'La voiture est neuve', '8', '9', ''),
(18, 'Gris', 7000, 'Golf', 300000, 'Rue de la colombiÃ¨re 12', 'La voiture marche parfaitement', '1', '2', ''),
(19, 'Bleu', 27800, 'Qashqai', 370000, 'Route de la dÃ´le 19', 'La voiture est en parfait etat', '1', '10', ''),
(20, 'Grey', 5000, 'Qashqai', 300000, 'Route de crassier 25', 'En parfait etat', '1', '10', ''),
(29, 'Bleu', 20000, 'Focus', 300000, 'Rue du sÃ©beillon 15', 'La voiture a ete refaite', '1', '11', '../images/carPictures/TestFordFocus.jpeg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_carbrand`
--
ALTER TABLE `t_carbrand`
  ADD PRIMARY KEY (`idCarBrand`),
  ADD UNIQUE KEY `ID_t_carBrand_IND` (`idCarBrand`);

--
-- Index pour la table `t_carengtype`
--
ALTER TABLE `t_carengtype`
  ADD PRIMARY KEY (`idCarEngType`),
  ADD UNIQUE KEY `ID_t_carEngType_IND` (`idCarEngType`);

--
-- Index pour la table `t_cars`
--
ALTER TABLE `t_cars`
  ADD PRIMARY KEY (`idCar`),
  ADD UNIQUE KEY `ID_t_cars_IND` (`idCar`),
  ADD KEY `REF_t_car_t_car_1_IND` (`idCarEngType`),
  ADD KEY `REF_t_car_t_car_IND` (`idCarBrand`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_carbrand`
--
ALTER TABLE `t_carbrand`
  MODIFY `idCarBrand` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `t_carengtype`
--
ALTER TABLE `t_carengtype`
  MODIFY `idCarEngType` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `t_cars`
--
ALTER TABLE `t_cars`
  MODIFY `idCar` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
