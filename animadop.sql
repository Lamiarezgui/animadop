-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 12:45 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animadop`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(8) NOT NULL,
  `password` varchar(220) NOT NULL,
  `username` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id`, `password`, `username`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_magasin`
--

CREATE TABLE `admin_magasin` (
  `id` int(11) NOT NULL,
  `username` varchar(220) NOT NULL,
  `password` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_magasin`
--

INSERT INTO `admin_magasin` (`id`, `username`, `password`) VALUES
(5, 'lamia', 'd7fc091101da5a3e40b5fcecd2952ad9'),
(6, 'adminm', 'c8d32c2a41fc240a82ea6e2d1566e8ef'),
(7, 'lamia', '4a7d1ed414474e4033ac29ccb8653d9b');

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(8) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `race` varchar(200) NOT NULL,
  `famille` varchar(100) NOT NULL,
  `img` varchar(220) NOT NULL,
  `description` text NOT NULL,
  `sexe` varchar(100) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `img5` varchar(255) NOT NULL,
  `img6` varchar(255) NOT NULL,
  `img7` varchar(255) NOT NULL,
  `img8` varchar(255) NOT NULL,
  `img9` varchar(255) NOT NULL,
  `id_user` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `nome`, `race`, `famille`, `img`, `description`, `sexe`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`, `id_user`) VALUES
(1, 'blacke', 'chien', 'accouplement', '20150113_120655', 'chien gentil aime les enfants, sportif', 'male', '', '', '', '', '', '', '', '', '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(8) NOT NULL,
  `name` varchar(200) NOT NULL,
  `prix` float NOT NULL,
  `reference` varchar(200) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL,
  `descr` text NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `img4` varchar(100) NOT NULL,
  `img5` varchar(100) NOT NULL,
  `img6` varchar(100) NOT NULL,
  `img7` varchar(100) NOT NULL,
  `img8` varchar(100) NOT NULL,
  `img9` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `name`, `prix`, `reference`, `categorie`, `img`, `descr`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`) VALUES
(1, 'pc1', 501, '1254fsd', 'apple', '', '', 'download.png', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(8) NOT NULL,
  `id_user` int(8) NOT NULL,
  `prixtot` float NOT NULL,
  `date` date NOT NULL,
  `valide` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commande_detail`
--

CREATE TABLE `commande_detail` (
  `id` int(8) NOT NULL,
  `commande_id` int(8) NOT NULL,
  `article_id` int(8) NOT NULL,
  `quantite` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signalisation`
--

CREATE TABLE `signalisation` (
  `id` int(10) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `blasa` varchar(220) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(8) NOT NULL,
  `nom` varchar(220) NOT NULL,
  `prenom` varchar(220) NOT NULL,
  `num_telephone` int(8) NOT NULL,
  `mail` varchar(220) NOT NULL,
  `password` varchar(220) NOT NULL,
  `adresse` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `num_telephone`, `mail`, `password`, `adresse`, `img`) VALUES
(16, 'Rezgui', 'Lamia', 90631838, 'rezguilamia1401@gmail.com', '04fc6d58f3a7f1968dd8a89d1f44e511', '01 rue el kehna Salambo', '');

-- --------------------------------------------------------

--
-- Table structure for table `veterinaire`
--

CREATE TABLE `veterinaire` (
  `id` int(8) NOT NULL,
  `description` text NOT NULL,
  `nom` varchar(220) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `mail` varchar(220) NOT NULL,
  `num_telephone` int(8) NOT NULL,
  `password` varchar(220) NOT NULL,
  `adresse` text NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `img5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veterinaire`
--

INSERT INTO `veterinaire` (`id`, `description`, `nom`, `prenom`, `mail`, `num_telephone`, `password`, `adresse`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES
(2, '', 'Rezgui', 'Lamia', 'rezguilamia1401@gmail.com', 90631838, 'e10adc3949ba59abbe56e057f20f883e', '01 rue el kehna Salambo', '', '', '', '', ''),
(4, '', 'Rezgui', 'Lamia', 'rezguilamia1401@gmail.com', 90631838, '81dc9bdb52d04dc20036dbd8313ed055', '01 rue el kehna Salambo', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_magasin`
--
ALTER TABLE `admin_magasin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_e` (`id_user`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `commande_detail`
--
ALTER TABLE `commande_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_c` (`commande_id`),
  ADD KEY `fk_art` (`article_id`);

--
-- Indexes for table `signalisation`
--
ALTER TABLE `signalisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veterinaire`
--
ALTER TABLE `veterinaire`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_magasin`
--
ALTER TABLE `admin_magasin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commande_detail`
--
ALTER TABLE `commande_detail`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signalisation`
--
ALTER TABLE `signalisation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `veterinaire`
--
ALTER TABLE `veterinaire`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `FK_e` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `commande_detail`
--
ALTER TABLE `commande_detail`
  ADD CONSTRAINT `fk_art` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `fk_c` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
