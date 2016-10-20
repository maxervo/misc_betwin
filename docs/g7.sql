-- phpMyAdmin SQL Dump
-- version 4.5.5.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2016 at 07:31 PM
-- Server version: 10.0.24-MariaDB-7
-- PHP Version: 5.6.21-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g7`
--
CREATE DATABASE IF NOT EXISTS `g7` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `g7`;

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE `bets` (
  `id_users` int(11) NOT NULL,
  `id_events` int(11) NOT NULL,
  `betting_money` int(11) NOT NULL,
  `odds` float NOT NULL,
  `which_team` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table des paris des menbres';

--
-- Dumping data for table `bets`
--

INSERT INTO `bets` (`id_users`, `id_events`, `betting_money`, `odds`, `which_team`, `result`) VALUES
(48, 23, 100, 2.05, 'Spurs', ''),
(48, 24, 300, 2.79, 'Lakers', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `team1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `odds1_init` float NOT NULL,
  `odds2_init` float NOT NULL,
  `bettors1` int(11) NOT NULL,
  `bettors2` int(11) NOT NULL,
  `sport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `championship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateofbet` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table des rencontres en cours';

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `team1`, `team2`, `odds1_init`, `odds2_init`, `bettors1`, `bettors2`, `sport`, `championship`, `dateofbet`) VALUES
(23, 'Spurs', 'Chicago Bulls', 1.28, 1.89, 111, 89, 'Basket', 'NBA', '2016-05-17'),
(24, 'Lakers', 'Miami heat', 1.56, 1.48, 212, 242, 'Basket', 'NBA', '2016-05-17'),
(25, 'France', 'USA', 1.22, 1.11, 127, 101, 'Basket', 'JO', '2016-05-17'),
(26, 'PSG', 'Real Madrid', 1.1, 1.26, 102, 71, 'Football', 'Coupes des champions', '2016-05-17'),
(27, 'St-Etienne	\r\n', 'LOSC', 1.47, 2.14, 135, 116, 'Football', 'Ligue 1', '2016-05-17'),
(28, 'Arsenal', 'Manchester United', 1.58, 1.42, 84, 94, 'Football', 'Coupes des champions', '2016-05-17'),
(29, 'Tsonga', 'Nadal', 1.27, 1.24, 98, 103, 'Tennis', 'Roland Garros', '2016-05-17'),
(30, 'Serena Williams', 'Venus Williams', 1.32, 1.89, 77, 81, 'Tennis', 'Wimbledon', '2016-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `gender` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table des users inscrits';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `address`, `email`, `money`, `gender`) VALUES
(48, 'hello', '35072c1ae546350e0bfa7ab11d49dc6f129e72ccd57ec7eb671225bbd197c8f1', 'hello', 'hello', 'hello', 'hello@gmail.com', 1600, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`id_users`,`id_events`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
