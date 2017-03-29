-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 28 Mars 2017 à 20:32
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_sri`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descript` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auteur` int(11) DEFAULT NULL,
  `id_categ` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `descript`, `auteur`, `id_categ`) VALUES
(3, 'Batterie externe samsung', 'test description', 1, 2),
(15, 'Table IKEA', 'table de 4 place', 9, 5),
(18, 'TV Samsung LED 12200', 'tv 50 pouces', 9, 3),
(20, 'IPad', 'Tablette apple', 9, 2),
(21, 'sss', 'sss', 9, 2),
(22, 'sss', 'sss', 9, 2),
(24, 'Telephone LG', 'tel LG ', 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categ` int(11) NOT NULL,
  `intitu_categ` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categ`, `intitu_categ`) VALUES
(2, 'Technologie & HighTech'),
(3, 'Electro-menager'),
(5, 'Meubles & Equipements d\'interieur');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comm` int(11) NOT NULL,
  `message` varchar(2000) DEFAULT NULL,
  `when_com` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users` int(11) DEFAULT NULL,
  `article` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id_comm`, `message`, `when_com`, `users`, `article`) VALUES
(6, 'qqqqqq', '2017-03-26 20:12:57', 1, 4),
(17, 'AZAZ', '2017-03-26 20:12:57', 9, 4),
(19, 'TEST ECHO', '2017-03-26 20:12:57', 9, 3),
(8, 'qqqqq', '2017-03-26 20:12:57', 1, NULL),
(9, 'Othman', '2017-03-26 20:12:57', 1, NULL),
(10, 'sss', '2017-03-26 20:12:57', 1, NULL),
(20, 'test', '2017-03-26 20:12:57', 9, 3),
(14, 'aaaa', '2017-03-26 20:12:57', 2, 4),
(32, '', '2017-03-28 20:27:58', 9, 16),
(31, 'tes coment', '2017-03-27 22:22:30', 9, 15),
(25, 'go &gt; tt\r\n', '2017-03-26 20:12:57', 9, 3),
(29, 'rrrrr', '2017-03-27 03:06:06', 9, 14),
(33, 'ff', '2017-03-28 20:28:20', 9, 16),
(34, 'test user comment\r\n', '2017-03-28 22:17:39', 25, 3),
(35, 'Great Product', '2017-03-28 22:29:16', 25, 20);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `intut_profil` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `intut_profil`) VALUES
(1, 'Administrateur'),
(2, 'Standard');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profil_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `login`, `pass`, `profil_type`) VALUES
(1, 'othman', 'bechchar', 'othman', 'a8cebf1698dc14282c507b1e1cfb7f2c9d5216aa7bd0854b50561e02c2b99d9a38945ec0f81e55f9699062b1eac6d0083411c839ba2b27c6a15b494463bc5c73', 1),
(23, 'ALEX', 'DUPONT', 'alex', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 1),
(30, 'Othman', 'Bechchar', 'timobech', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 2)

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_categ` (`id_categ`),
  ADD KEY `fk_user_auteur` (`auteur`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categ`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `FK_comment_1` (`users`),
  ADD KEY `article` (`article`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `profil_type` (`profil_type`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_categ`) REFERENCES `categorie` (`id_categ`),
  ADD CONSTRAINT `fk_user_auteur` FOREIGN KEY (`auteur`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`profil_type`) REFERENCES `profil` (`id_profil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
