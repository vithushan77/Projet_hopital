-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 16 nov. 2021 à 09:59
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_hopital`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultations`
--

DROP TABLE IF EXISTS `consultations`;
CREATE TABLE IF NOT EXISTS `consultations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `consultations`
--

INSERT INTO `consultations` (`id`, `libelle`) VALUES
(1, 'Première consultation'),
(2, 'Consultation de suivi');

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

DROP TABLE IF EXISTS `dossier`;
CREATE TABLE IF NOT EXISTS `dossier` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_patient` int(10) UNSIGNED NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse_post` varchar(255) COLLATE utf8_bin NOT NULL,
  `mutuelle` varchar(255) COLLATE utf8_bin NOT NULL,
  `num_ss` varchar(255) COLLATE utf8_bin NOT NULL,
  `optn` varchar(255) COLLATE utf8_bin NOT NULL,
  `regime` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_patient` (`id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `heure`
--

DROP TABLE IF EXISTS `heure`;
CREATE TABLE IF NOT EXISTS `heure` (
  `id` int(10) UNSIGNED NOT NULL,
  `heure` time NOT NULL,
  `date_rdv` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `heure`
--

INSERT INTO `heure` (`id`, `heure`, `date_rdv`) VALUES
(1, '09:00:00', '2021-11-24'),
(2, '10:00:00', '2021-11-26'),
(3, '11:00:00', NULL),
(4, '12:00:00', '2021-11-23'),
(5, '13:00:00', '2021-11-24'),
(6, '14:00:00', '2021-12-08'),
(7, '15:00:00', NULL),
(8, '16:00:00', NULL),
(9, '17:00:00', NULL),
(10, '18:00:00', NULL),
(11, '19:00:00', '2021-11-24');

-- --------------------------------------------------------

--
-- Structure de la table `hopitaux`
--

DROP TABLE IF EXISTS `hopitaux`;
CREATE TABLE IF NOT EXISTS `hopitaux` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomHopitaux` varchar(255) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(255) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `hopitaux`
--

INSERT INTO `hopitaux` (`id`, `nomHopitaux`, `adresse`, `telephone`) VALUES
(1, 'Hôpital Albert-Chenevier', '40, rue de Mesly 94000 Créteil', '01 49 81 21 11'),
(2, 'Hôpital Ambroise-Paré', '9 avenue Charles-de-Gaulle 92100 Boulogne-Billancourt', '01 49 09 50 00');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_specialite` int(10) UNSIGNED NOT NULL,
  `telephone` varchar(255) COLLATE utf8_bin NOT NULL,
  `ville` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_user` (`id_user`),
  KEY `fk_id_specialite` (`id_specialite`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `id_user`, `id_specialite`, `telephone`, `ville`) VALUES
(4, 22, 11, '01 94 78 65 48', 'Paris'),
(5, 23, 2, '01 45 98 76 35', 'Paris'),
(6, 25, 6, '01 48 76 53 67', 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

DROP TABLE IF EXISTS `motifs`;
CREATE TABLE IF NOT EXISTS `motifs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `motifs`
--

INSERT INTO `motifs` (`id`, `libelle`) VALUES
(1, 'Le patient vient pour la première fois dans ce service'),
(2, 'Le patient est déjà venu dans ce service');

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

DROP TABLE IF EXISTS `ordonnance`;
CREATE TABLE IF NOT EXISTS `ordonnance` (
  `id` int(11) NOT NULL,
  `nomFichier` int(11) NOT NULL,
  `fichier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_heure` int(11) UNSIGNED NOT NULL,
  `id_patient` int(11) UNSIGNED NOT NULL,
  `id_medecin` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rdvtomedecin` (`id_medecin`),
  KEY `fk_rdvtopatient` (`id_patient`),
  KEY `fk_rdvtoheure` (`id_heure`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `id_heure`, `id_patient`, `id_medecin`) VALUES
(9, 4, 14, 5);

-- --------------------------------------------------------

--
-- Structure de la table `specialites`
--

DROP TABLE IF EXISTS `specialites`;
CREATE TABLE IF NOT EXISTS `specialites` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomSpe` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `specialites`
--

INSERT INTO `specialites` (`id`, `nomSpe`) VALUES
(1, 'Algologie'),
(2, 'Cardiologie'),
(3, 'Dermatologie - Allergologie'),
(4, 'Endocrinologie - Diabétologie'),
(5, 'Gastro-entérologie'),
(6, 'Gynécologie'),
(7, 'Gériartrie'),
(8, 'Hématologie'),
(9, 'Infectiologie'),
(10, 'Kinésithérapie'),
(11, 'Neurologie'),
(12, 'Ophtalmologie - Chirurgie Laser'),
(13, 'ORL - Chirurgie de la face et du cou'),
(14, 'Osthéopathie'),
(15, 'Pneumo-pédiatrie'),
(16, 'Pneunomologie'),
(17, 'Radiologie'),
(18, 'Rhumatologie'),
(19, 'Scintigraphie'),
(20, 'Sophrologie');

-- --------------------------------------------------------

--
-- Structure de la table `urgences`
--

DROP TABLE IF EXISTS `urgences`;
CREATE TABLE IF NOT EXISTS `urgences` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_patient` int(10) UNSIGNED NOT NULL,
  `symptomes` text COLLATE utf8_bin NOT NULL,
  `priorite` int(11) NOT NULL,
  `affectationCabinet` varchar(3) COLLATE utf8_bin NOT NULL,
  `passageHopital` varchar(3) COLLATE utf8_bin NOT NULL,
  `id_hopital` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_patient_to_utilisateur` (`id_patient`),
  KEY `fk_id_hopital_to_hopitaux` (`id_hopital`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8_bin NOT NULL,
  `sexe` varchar(255) COLLATE utf8_bin NOT NULL,
  `mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8_bin NOT NULL,
  `statut` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `sexe`, `mail`, `mdp`, `statut`) VALUES
(11, 'KNIBULER', 'Josselin', 'homme', 'k.josselin@yahoo.fr', '$2y$10$ZBiJCuUjXzIgWnu/0p8ixuEoOOeSEo5iEkXO3yPpoYBI6Tr9wyBr2', 'medecin'),
(12, 'ROZELI', 'Lorenzo', 'homme', 'r.lorenzo@yahoo.fr', '$2y$10$wllfMdJPtoaXyVzhVxrf5./KmE98s5x1HzHfjVkv1xIlkbK6EtokK', 'patient'),
(14, 'CAMBY', 'Nathan', 'homme', 'c.nathan@yahoo.fr', '$2y$10$lK27Jw7fxCEj43IH/1P83Oc7MGI32lI1KAuyBIie/j5ymR95OZQb6', 'admin'),
(15, 'TCHEKOVSKY', 'Adel', 'femme', 't.adel@outlook.fr', '$2y$10$aXbQ7Yywivsqmdh9BIvjCOEtTpr/XzcJdwA6PfLgQanGXGLkp04wu', 'urgence'),
(16, 'NEHLAS', 'Ambrine', 'femme', 'n.ambrine@outlook.fr', '$2y$10$8SPNE1Dah58P7EFaMPZFIOtkoNPeMRZ4lmiQ5SFiSKyrj577RG1my', 'admin'),
(17, 'WALOVSKY', 'Bernard', 'homme', 'w.bernard@outlook.fr', '$2y$10$UOCpVpQM29t5I/W8i0jLR.lzGgpIyYedgY5gpT7jLWJdGpaHTcSN.', 'medecin'),
(18, 'LIGNANI', 'Quentin', 'homme', 'l.quentin@outlook.fr', '$2y$10$gQu57W4C9OKSrsf1cPOkOe/iL3YP.u9cKPyfJ8RXKTlOXVD87sd.O', 'medecin'),
(22, 'NGUYEN', 'Kimmy', 'femme', 'n.kimmy@outlook.fr', '$2y$10$M/r9pTEJHUu4DaNVPoAk2eQg7cR.Uqx6vsdYkhu8Eysfj5Zg0RaYu', 'medecin'),
(23, 'DAUWE', 'Marc', 'homme', 'd.marc@outlook.fr', '$2y$10$glIEQ8OGcFLu/hdettRyIOn6QhSAnz9sNeWBNB6Q1vuRI4mIJ4HFG', 'medecin'),
(24, 'CLAIRVOYANT', 'Marc', 'homme', 'c.marc@yahoo.fr', '$2y$10$o1smcyzspvYaE7pl4kXU8emA6rVd6Od3Jq9fAIfhHaTo/zCvI1TRu', 'patient'),
(25, 'DUCLOS', 'Jean-Marc', 'homme', 'd.jean-marc@outlook.fr', '$2y$10$QzHz0QAqYRUw.R8CIXVNs.h7HqxhEp/yq7GbVOY13BPK9Jt7u.xYu', 'medecin'),
(26, 'GONCALVES', 'Nathan', 'homme', 'g.nathan@outlook.fr', '$2y$10$qIJ1LwkSY79fkh2g5.hlsuqWp43vKD1SRjEcm69BrCQWmNn.4hvBa', 'admin'),
(27, 'CLAUDE', 'Jean-Marc', 'homme', 'c.jean-marc@yahoo.fr', '$2y$10$iZ4s4mSxKpt41kNkVM5vbOvxmwtrRlCzXAsvvdG5/i.wGb6y5hcB.', 'patient'),
(28, 'test', 'test', 'homme', 'test@test.fr', 'test', 'medecin'),
(29, 'test2', 'test2', 'homme', 'test2@test.fr', '$2y$10$u5cxsG5A3wmHceoM1kVw0u1TfShT347Itcvwz/9jnJjDNR0yXdWv6', 'patient');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `fk_id_patient` FOREIGN KEY (`id_patient`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `fk_id_specialite` FOREIGN KEY (`id_specialite`) REFERENCES `specialites` (`id`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `fk_rdvtoheure` FOREIGN KEY (`id_heure`) REFERENCES `heure` (`id`),
  ADD CONSTRAINT `fk_rdvtomedecin` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id`),
  ADD CONSTRAINT `fk_rdvtopatient` FOREIGN KEY (`id_patient`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `urgences`
--
ALTER TABLE `urgences`
  ADD CONSTRAINT `fk_id_hopital_to_hopitaux` FOREIGN KEY (`id_hopital`) REFERENCES `hopitaux` (`id`),
  ADD CONSTRAINT `fk_id_patient_to_utilisateur` FOREIGN KEY (`id_patient`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
