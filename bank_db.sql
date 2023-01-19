-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 19 jan. 2023 à 12:58
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bank_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dollar_ratio` decimal(64,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `dollar_ratio`) VALUES
(1, 'EUR', '1.08000000'),
(2, 'DOLLAR', '1.00000000'),
(3, 'YEN', '0.00775190'),
(4, 'BITCOIN', '20748.30000000'),
(5, 'RUBLE', '0.01456450');

-- --------------------------------------------------------

--
-- Structure de la table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner_id` int(11) NOT NULL,
  `amount` decimal(64,8) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `submit` int(3) NOT NULL DEFAULT '1',
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `deposits`
--

INSERT INTO `deposits` (`id`, `date`, `owner_id`, `amount`, `id_currency`, `submit`, `id_author`) VALUES
(8, '2023-01-19 10:10:43', 11, '23.00000000', 2, 2, 11),
(9, '2023-01-19 10:21:03', 11, '1000.00000000', 4, 2, 10),
(10, '2023-01-19 10:28:04', 11, '63.00000000', 5, 2, 10),
(11, '2023-01-19 11:23:33', 11, '1000.00000000', 1, 2, 10),
(12, '2023-01-19 11:24:30', 11, '1000.00000000', 1, 2, 10),
(13, '2023-01-19 11:27:59', 11, '63.00000000', 2, 2, 11);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(0, 'banned'),
(1, 'unverified'),
(10, 'verified'),
(200, 'manager'),
(1000, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `amount` decimal(64,8) NOT NULL DEFAULT '10.00000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `storage`
--

INSERT INTO `storage` (`id`, `id_user`, `id_currency`, `amount`) VALUES
(4, 11, 1, '19232.64814815'),
(5, 11, 2, '0.00000000'),
(6, 11, 3, '10.00000000'),
(7, 11, 4, '7.00000000'),
(8, 11, 5, '10.00000000'),
(9, 12, 1, '10.00000000'),
(10, 12, 2, '10.00000000'),
(11, 12, 3, '10.00000000'),
(12, 12, 4, '10.00000000'),
(13, 12, 5, '10.00000000');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `amount` decimal(64,8) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `date`, `id_sender`, `id_receiver`, `amount`, `id_currency`, `id_author`) VALUES
(1, '2023-01-19 11:23:33', 11, 11, '1000.00000000', 1, 10),
(2, '2023-01-19 11:24:30', 11, 11, '1000.00000000', 1, 10),
(3, '2023-01-19 11:24:55', 11, 11, '1000.00000000', 1, 10),
(4, '2023-01-19 11:26:15', 11, 11, '-1000.00000000', 1, 10),
(5, '2023-01-19 11:28:19', 11, 11, '63.00000000', 2, 11),
(6, '2023-01-19 11:39:30', 12, 11, '34.00000000', 5, 10),
(7, '2023-01-19 11:39:30', 12, 11, '-34.00000000', 5, 10),
(8, '2023-01-19 11:44:09', 11, 12, '1000.00000000', 4, 11),
(9, '2023-01-19 11:44:09', 11, 12, '-1000.00000000', 4, 11),
(10, '2023-01-19 12:01:27', 11, 11, '0.00607593', 3, 11),
(11, '2023-01-19 12:01:27', 11, 11, '-1.00000000', 4, 11),
(12, '2023-01-19 12:03:27', 11, 11, '1.06449243', 5, 11),
(13, '2023-01-19 12:03:27', 11, 11, '-2.00000000', 3, 11),
(14, '2023-01-19 12:15:41', 11, 11, '84.54733678', 3, 11),
(15, '2023-01-19 12:15:41', 11, 11, '-45.00000000', 5, 11),
(16, '2023-01-19 12:17:49', 11, 11, '0.93941485', 3, 11),
(17, '2023-01-19 12:17:49', 11, 11, '-0.50000000', 5, 11),
(18, '2023-01-19 12:18:19', 11, 11, '0.93941485', 3, 11),
(19, '2023-01-19 12:18:19', 11, 11, '-0.50000000', 5, 11),
(20, '2023-01-19 12:19:26', 11, 11, '0.00005120', 1, 11),
(21, '2023-01-19 12:19:26', 11, 11, '-1.00000000', 4, 11),
(22, '2023-01-19 12:24:01', 11, 11, '19211.38888889', 1, 11),
(23, '2023-01-19 12:24:01', 11, 11, '-1.00000000', 4, 11),
(24, '2023-01-19 12:24:56', 11, 11, '19211.38888889', 1, 11),
(25, '2023-01-19 12:24:56', 11, 11, '-1.00000000', 4, 11),
(26, '2023-01-19 12:25:50', 11, 11, '9.25925926', 1, 11),
(27, '2023-01-19 12:25:50', 11, 11, '-10.00000000', 2, 11);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `iban` varchar(27) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `firstname`, `lastname`, `iban`, `birthdate`, `password`, `mail`) VALUES
(10, 1000, 'admin', 'admin', 'FR6184228767292619030615500', '2023-01-12', '$2y$10$/rIIiL0WGqx0dwivTUDfmu/3aW8q.F9dvqfptr.5G0TmKPUzDg7tm', 'admin@admin.admin'),
(11, 10, 'Paul', 'Rivallin', 'FR4949872680771636452072859', '2023-01-12', '$2y$10$2mJUvVxQWYq5p6eMuQPgS.RIVDRiyoDWcoWrZWOPVPL9w/7L/2N8m', 'paul@gmail.com'),
(12, 10, 'Jiji', 'Lefebvre', 'FR5793375612780483143678877', '2023-01-04', '$2y$10$qgUmyy2oQ33x0B5Z92y1hOL5zmnWQX0k1X6mQ6IPF9WaqS04wqOHq', 'jiji@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner_id` int(11) NOT NULL,
  `amount` decimal(64,8) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `submit` int(3) NOT NULL DEFAULT '1',
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `date`, `owner_id`, `amount`, `id_currency`, `submit`, `id_author`) VALUES
(12, '2023-01-19 10:30:37', 11, '63.00000000', 5, 2, 10),
(13, '2023-01-19 10:31:06', 11, '52.00000000', 4, 2, 10),
(14, '2023-01-19 10:31:29', 11, '2000.00000000', 4, 2, 10),
(15, '2023-01-19 10:33:04', 11, '69.42000000', 1, 2, 10),
(16, '2023-01-19 10:33:26', 11, '69.42000000', 1, 2, 10),
(17, '2023-01-19 10:34:02', 11, '64.25520000', 1, 2, 10),
(18, '2023-01-19 11:24:55', 11, '1000.00000000', 1, 2, 10),
(19, '2023-01-19 11:26:15', 11, '1000.00000000', 1, 2, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `id_currency` (`id_currency`),
  ADD KEY `id_author` (`id_author`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_currency` (`id_currency`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_currency` (`id_currency`),
  ADD KEY `id_sender` (`id_sender`) USING BTREE,
  ADD KEY `id_receiver` (`id_receiver`) USING BTREE,
  ADD KEY `id_author` (`id_author`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Index pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `id_currency` (`id_currency`),
  ADD KEY `id_author` (`id_author`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `deposits_ibfk_2` FOREIGN KEY (`id_currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `deposits_ibfk_3` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`id_currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `storage_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_sender`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`id_receiver`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`id_currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `transactions_ibfk_4` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `withdrawals_ibfk_2` FOREIGN KEY (`id_currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `withdrawals_ibfk_3` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
