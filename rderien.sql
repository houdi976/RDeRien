-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 mars 2023 à 16:19
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rderien`
--

-- --------------------------------------------------------
--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(80) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `phone_number` int(10) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `type_user` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------
--
-- Structure de la table `recyclers`
--

CREATE TABLE IF NOT EXISTS `recyclers` (
  `recycler_id` int(11) PRIMARY KEY NOT NULL,
  `num_siret` varchar(30) DEFAULT NULL,
  `tva` int(11) DEFAULT NULL,
   FOREIGN KEY (recycler_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Structure de la table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `admin_id` int(11)  PRIMARY KEY NOT NULL,
   FOREIGN KEY (admin_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `collectors`
--

CREATE TABLE IF NOT EXISTS `collectors` (
  `collector_id` int(11) PRIMARY KEY NOT NULL,
  FOREIGN KEY (collector_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Structure de la table `consumers`
--

CREATE TABLE IF NOT EXISTS `consumers` (
  `consumer_id` int(11) PRIMARY KEY NOT NULL,
  FOREIGN KEY (consumer_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Structure de la table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `city` varchar(80) NOT NULL,
  `id_user` int(11) NOT NULL,
   FOREIGN KEY (id_user) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `waste`
--

CREATE TABLE IF NOT EXISTS `waste` (
  `waste_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `waste_name` varchar(30) NOT NULL,
  `waste_photo` varchar(255) NOT NULL,
  `waste_description` varchar(80) NOT NULL,
  `id_category` int(11) NOT NULL,
   FOREIGN KEY (id_category) REFERENCES category(category_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `collector_waste`
--
CREATE TABLE IF NOT EXISTS `collector_waste` (
  `id_collector` int(11) NOT NULL,
  `id_waste` int(11) NOT NULL,
   FOREIGN KEY (id_collector) REFERENCES collectors(collector_id),
   FOREIGN KEY (id_waste) REFERENCES waste(waste_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Structure de la table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `code_adresse` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `qte_max` int(11) NOT NULL,
  `qte_collectee` int(11) NOT NULL,
  `id_consumer` int(11) NOT NULL,
   FOREIGN KEY (id_consumer) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Structure de la table `appointment_collector_waste`
--

CREATE TABLE IF NOT EXISTS `appointment_collector_waste` (
  `id_waste` int(11) NOT NULL,
  `id_collector` int(11) NOT NULL,
  `id_appointment` int(11) NOT NULL,
   FOREIGN KEY (id_waste) REFERENCES waste (waste_id),
   FOREIGN KEY (id_collector) REFERENCES collectors (collector_id),
   FOREIGN KEY (id_appointment) REFERENCES appointment (appointment_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `sexe` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `libelleSexe` varchar(80) NOT NULL,
  `sexe` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `typeUser` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `libelleTypeUser` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Notification*/
CREATE TABLE notifications (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  texte VARCHAR(255) NOT NULL,
  id_utilisateur INT(11) NOT NULL,
  etat ENUM('non lue', 'lue') NOT NULL DEFAULT 'non lue',
  date_creation DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_utilisateur) REFERENCES users(id)
);

INSERT INTO `typeUser` ( `libelleTypeUser`) VALUES
('Consommateur'), ('Collecteur'), ('Recycleur');

INSERT INTO `sexe` ( `libelleSexe`, `sexe`) VALUES
('Masculin', 'M'),
('Féminin', 'F');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
