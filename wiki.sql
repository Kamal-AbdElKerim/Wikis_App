-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 jan. 2024 à 17:30
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wiki`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `created_at`) VALUES
(1, 'islam@gmail.com', '1', '2024-01-08 08:58:11');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `auteur_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`auteur_id`, `email`, `name`, `password`, `created_at`) VALUES
(1, 'islam', 'karim', '12', '2024-01-06 20:17:53'),
(2, 'yasmin@gmail.jcom', 'islam', '1', '2024-01-08 10:29:00'),
(3, 'kamal@gmail.com', 'kamal', '1', '2024-01-10 09:41:03'),
(4, 'yasmin@gmail.com', 'sdc', '12345678', '2024-01-10 20:43:15'),
(5, 'nadia@gmail.com', 'nadia', '123456789', '2024-01-10 21:00:23');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `name` varchar(255) NOT NULL,
  `Bio` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`name`, `Bio`, `created_at`) VALUES
('Cars', 'best cars', '2024-01-10 08:06:49'),
('development', 'development js php html css', '2024-01-10 08:01:47'),
('games', 'games Pc / Ps5 / Xbox ', '2024-01-10 09:47:05'),
('machina', 'rrr', '2024-01-09 14:16:38'),
('new technologyd', 'Biodsc', '2024-01-09 13:49:36'),
('Robot', 'hello', '2024-01-09 13:49:36');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(7, 'iphone'),
(8, 'pc'),
(10, 'php'),
(11, 'css'),
(12, 'engine'),
(13, 'Game'),
(14, 'programming'),
(15, 'data-science'),
(16, 'web-development'),
(17, 'machine-learning'),
(18, 'cloud-computing'),
(21, 'sql'),
(22, 'frontend'),
(23, 'backend'),
(24, 'artificial-intelligence'),
(25, 'mobile-development'),
(28, 'docker'),
(29, 'kubernetes'),
(30, 'big-data'),
(31, 'cybersecurity'),
(36, 'android'),
(37, 'ios'),
(38, 'angular'),
(39, 'typescript'),
(40, 'blockchain'),
(41, 'devops'),
(42, 'networking'),
(43, 'game-development'),
(44, 'internet-of-things'),
(45, 'finance'),
(46, 'marketing'),
(47, 'business-strategy'),
(48, 'entrepreneurship'),
(49, 'startup'),
(50, 'leadership'),
(51, 'management'),
(52, 'human-resources'),
(53, 'sales'),
(54, 'customer-service'),
(55, 'productivity'),
(56, 'health'),
(57, 'fitness'),
(58, 'nutrition'),
(59, 'cooking'),
(60, 'travel'),
(61, 'photography'),
(62, 'music'),
(63, 'art'),
(64, 'literature'),
(65, 'science-fiction'),
(66, 'history'),
(67, 'philosophy'),
(68, 'languages'),
(69, 'sports'),
(70, 'yoga'),
(71, 'gardening'),
(72, 'pets'),
(73, 'environment'),
(74, 'architecture');

-- --------------------------------------------------------

--
-- Structure de la table `wikis`
--

CREATE TABLE `wikis` (
  `id_wiki` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `catg_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `auteur_id` int(255) DEFAULT NULL,
  `is_Active` int(255) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `wikis`
--

INSERT INTO `wikis` (`id_wiki`, `title`, `contenu`, `img`, `catg_name`, `created_at`, `auteur_id`, `is_Active`) VALUES
(15, 'MVC', 'Modèle-vue-contrôleur ou MVC est un motif d\'architecture logicielle destiné aux interfaces graphiques, lancé en 1978 et très populaire pour les applications web. Le motif est composé de trois types de modules ayant trois responsabilités différentes : les modèles, les vues et les contrôleurs.\r\n\r\nUn modèle (Model) contient les données à afficher ;\r\nUne vue (View) contient la présentation de l\'interface graphique ;\r\nUn contrôleur (Controller) contient la logique concernant les actions effectuées par l\'utilisateur.', 'public\\img_wikisarchitecture-mvc.jpg', 'development', '2024-01-11 14:22:44', 2, 1),
(31, 'car', 'Cars have controls for driving, parking, passenger comfort, and a variety of lamps. Over the decades, additional features and controls have been added to vehicles, making them progressively more complex. These include rear-reversing cameras, air conditioning, navigation systems, and in-car entertainment. Most cars in use in the early 2020s are propelled by an internal combustion engine, fueled by the combustion of fossil fuels. Electric cars, which were invented early in the history of the car, became commercially available in the 2000s and are predicted to cost less to buy than petrol-driven cars before 2025.[5][6] The transition from fossil fuel-powered cars to electric cars features prominently in most climate change mitigation scenarios,[7] such as Project Drawdown\'s 100 actionable solutions for climate change.[8]', 'public\\img_wikis\\1704874117_fb0c050bf53d8791.jpg', 'Cars', '2024-01-10 16:10:30', 2, 1),
(32, 'Call of Duty: Modern Warfaree', 'The stakes have never been higher as players take on the role of lethal Tier One operators in a heart-racing saga that will affect the global balance of power. Call of Duty®: Modern Warfare® engulfs fans in an incredibly raw, gritty, provocative narrative that brings unrivaled intensity and shines a light on the changing nature of modern war. Developed by the studio that started it all, Infinity Ward delivers an epic reimagining of the iconic Modern Warfare® series from the ground up. In the visceral and dramatic single-player story campaign, Call of Duty: Modern Warfare pushes boundaries and breaks rules the way only Modern Warfare can.', 'public\\img_wikis\\1704880118_4763ac46bfa5c5de.jpg', 'games', '2024-01-11 14:22:03', 3, 1),
(44, 'm', 'm', 'public\\img_wikis\\1704986679_413e767b36198b4c.png', 'machina', '2024-01-11 15:58:49', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `wiki_tags`
--

CREATE TABLE `wiki_tags` (
  `wiki_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `wiki_tags`
--

INSERT INTO `wiki_tags` (`wiki_id`, `tag_id`) VALUES
(15, 10),
(15, 11),
(15, 21),
(15, 23),
(15, 25),
(31, 12),
(32, 13),
(44, 11);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`auteur_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`name`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Index pour la table `wikis`
--
ALTER TABLE `wikis`
  ADD PRIMARY KEY (`id_wiki`),
  ADD KEY `wikis_ctgfk` (`catg_name`),
  ADD KEY `wiki_id` (`auteur_id`);

--
-- Index pour la table `wiki_tags`
--
ALTER TABLE `wiki_tags`
  ADD PRIMARY KEY (`wiki_id`,`tag_id`),
  ADD KEY `wiki_tags_ibfk_2` (`tag_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `auteur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `wikis`
--
ALTER TABLE `wikis`
  MODIFY `id_wiki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `wikis`
--
ALTER TABLE `wikis`
  ADD CONSTRAINT `wikis_ibfk_2` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`auteur_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wikis_ibfk_3` FOREIGN KEY (`catg_name`) REFERENCES `categories` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wiki_tags`
--
ALTER TABLE `wiki_tags`
  ADD CONSTRAINT `wiki_tags_ibfk_1` FOREIGN KEY (`wiki_id`) REFERENCES `wikis` (`id_wiki`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
