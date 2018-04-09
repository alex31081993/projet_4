-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 29 mars 2018 à 14:17
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `projet_4`
--
CREATE DATABASE IF NOT EXISTS `projet_4` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projet_4`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `pass`) VALUES
(1, 'alex', '$2y$10$dTErjgGwYCU9pU.6ev0KU.Y.pKT.zOlkqEwv1XFMkIF/tmveeXqOW');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `report` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `report`) VALUES
(4, 87, 'zefaze', 'zefaze', '2018-03-22 13:11:59', 2),
(5, 87, 'fef', 'efe', '2018-03-22 18:14:46', 2),
(6, 90, 'ergezr', 'ergze', '2018-03-22 18:19:44', 0),
(7, 92, 'ff', 'ff', '2018-03-22 21:29:27', 2),
(8, 93, '---', '----', '2018-03-26 21:11:28', 2);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapeau` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `chapeau`, `content`, `creation_date`) VALUES
(83, 'hyrh', '', 'rthsr', '2018-03-21 19:50:31'),
(85, 'zerf', '', 'aezrf', '2018-03-21 20:16:06'),
(86, 'fazef', '', 'azfz', '2018-03-21 20:16:14'),
(87, 'un vrai titre', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel erat scelerisque diam fermentum pharetra a ac nisi. Ut diam mi, mollis eu dolor sit amet, suscipit luctus magna.', '2018-03-22 13:30:59'),
(89, 'ee', '', '<p>tt</p>', '2018-03-22 17:43:59'),
(90, 'rr', '', '<p>rr</p>', '2018-03-22 17:44:08'),
(91, 'jjee', 'dd', '<p>kkee</p>', '2018-03-22 19:41:01'),
(92, 'saa', 'sss', '<p>sssss</p>', '2018-03-22 19:41:17'),
(93, 'èè', 'èèè', '<p>&egrave;&egrave;&egrave;</p>', '2018-03-26 20:51:09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
