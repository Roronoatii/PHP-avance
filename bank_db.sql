-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2023 at 12:21 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dollar_ratio` decimal(64,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `dollar_ratio`) VALUES
(1, 'EUR', '1.08000000'),
(2, 'DOLLAR', '1.00000000'),
(3, 'YEN', '0.00775190'),
(4, 'BITCOIN', '20748.30000000'),
(5, 'RUBLE', '0.01456450');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(0, 'banned'),
(1, 'unverified'),
(10, 'verified'),
(200, 'manager'),
(1000, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `amount` decimal(64,8) NOT NULL DEFAULT '10.00000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `id_user`, `id_currency`, `amount`) VALUES
(14, 13, 1, '38432.77777778'),
(15, 13, 2, '20753.30000000'),
(16, 13, 3, '8029641.44519410'),
(17, 13, 4, '89.00000000'),
(18, 13, 5, '1424590.31514990'),
(19, 14, 1, '10.00000000'),
(20, 14, 2, '10.00000000'),
(21, 14, 3, '1003.00000000'),
(22, 14, 4, '12.00000000'),
(23, 14, 5, '10.00000000');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_currency` int(11) NOT NULL,
  `amount` decimal(64,8) NOT NULL,
  `id_author` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `id_exchange` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `id_user`, `id_currency`, `amount`, `id_author`, `status`, `id_exchange`, `date`) VALUES
(84, 13, 5, '1424580.31514990', 13, 1, NULL, '2023-01-19 21:47:44'),
(85, 13, 4, '-1.00000000', 13, 1, NULL, '2023-01-19 21:47:44'),
(86, 13, 4, '-2.00000000', 13, 1, NULL, '2023-01-19 21:49:06'),
(87, 13, 3, '5353087.63012940', 13, 1, NULL, '2023-01-19 21:49:06'),
(88, 13, 4, '-10.00000000', 13, 1, 13, '2023-01-19 21:49:44'),
(89, 13, 4, '10.00000000', 13, 1, 13, '2023-01-19 21:49:44'),
(90, 13, 4, '10.00000000', 13, 1, NULL, '2023-01-19 22:22:59'),
(91, 14, 4, '2.00000000', 13, 1, NULL, '2023-01-19 23:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `firstname`, `lastname`, `iban`, `birthdate`, `password`, `mail`) VALUES
(13, 200, 'Jean-Juste', 'LEFEBVRE', 'FR6536435796343846708989115', '2023-01-04', '$2y$10$pnV3aHRNPB/UJfcfl2IpSeFM4HEONsPJww6RaFhSheaEK77TUYolC', 'fraise@gmail.com'),
(14, 10, 'Pierre', 'Saumon', 'FR6667985796631367987257514', '2023-01-01', '$2y$10$9x6xS7wu3S8nl2XeYWRoKunBZZnHQq7EwX6X0m2j3BOF6MshH8KTe', 'cum@cum.cum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_currency` (`id_currency`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_currency` (`id_currency`),
  ADD KEY `id_author` (`id_author`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_exchange` (`id_exchange`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storage_ibfk_2` FOREIGN KEY (`id_currency`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`id_currency`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_4` FOREIGN KEY (`id_exchange`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
