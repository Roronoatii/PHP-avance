-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 17 jan. 2023 à 13:29
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
  `dollar_ratio` decimal(11,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `dollar_ratio`) VALUES
(1, 'EUR', '0.9200'),
(2, 'DOLLAR', '1.0000'),
(3, 'YEN', '129.0000'),
(4, 'BITCOIN', '21239.0000'),
(5, 'RUBLE', '68.6600');

-- --------------------------------------------------------

--
-- Structure de la table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner_id` int(11) NOT NULL,
  `amount` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `amount` decimal(10,0) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `amount` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `iban` varchar(27) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner_id` int(11) NOT NULL,
  `amount` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `owner_id` (`owner_id`);

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
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

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
  ADD KEY `owner_id` (`owner_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

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
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
