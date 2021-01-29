-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-mfa.alwaysdata.net
-- Generation Time: Jan 29, 2021 at 06:52 AM
-- Server version: 10.5.8-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mfa_simp-land_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `emoji`
--

CREATE TABLE `emoji` (
  `id_user` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `emoji_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emoji`
--

INSERT INTO `emoji` (`id_user`, `id_message`, `emoji_name`) VALUES
(1, 34, 'cute'),
(1, 52, 'cute'),
(1, 55, 'love'),
(1, 58, 'love'),
(1, 59, 'love'),
(1, 60, 'trop_style'),
(1, 61, 'cute'),
(1, 62, 'trop_style'),
(1, 63, 'swag'),
(1, 64, 'cute'),
(1, 65, 'cute'),
(27, 52, 'love'),
(29, 54, 'trop_style'),
(29, 55, 'trop_style'),
(30, 59, 'swag'),
(30, 60, 'trop_style'),
(30, 61, 'cute'),
(31, 59, 'trop_style'),
(31, 60, 'love');

-- --------------------------------------------------------

--
-- Table structure for table `emoji_count`
--

CREATE TABLE `emoji_count` (
  `id_message` int(11) NOT NULL,
  `emoji_name` varchar(20) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emoji_count`
--

INSERT INTO `emoji_count` (`id_message`, `emoji_name`, `quantite`) VALUES
(34, 'cute', 1),
(52, 'cute', 1),
(52, 'love', 1),
(52, 'swag', 0),
(52, 'trop_style', 0),
(54, 'trop_style', 1),
(55, 'cute', 0),
(55, 'love', 1),
(55, 'swag', 0),
(55, 'trop_style', 1),
(58, 'love', 1),
(59, 'cute', 0),
(59, 'love', 1),
(59, 'swag', 1),
(59, 'trop_style', 1),
(60, 'cute', 0),
(60, 'love', 1),
(60, 'swag', 0),
(60, 'trop_style', 2),
(61, 'cute', 2),
(61, 'love', 0),
(61, 'swag', 0),
(61, 'trop_style', 0),
(62, 'cute', 0),
(62, 'love', 0),
(62, 'swag', 0),
(62, 'trop_style', 1),
(63, 'cute', 0),
(63, 'love', 0),
(63, 'swag', 1),
(64, 'cute', 1),
(64, 'love', 0),
(64, 'swag', 0),
(64, 'trop_style', 0),
(65, 'cute', 1),
(65, 'trop_style', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_Message` int(11) NOT NULL,
  `date` date NOT NULL,
  `contenu` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_Message`, `date`, `contenu`, `photo`) VALUES
(52, '2021-01-29', 'Salut les Vanefans! Bienvenu sur mon site!', NULL),
(54, '2021-01-29', 'Comment ça va ??????????????', NULL),
(55, '2021-01-29', 'Salut les coupaings ', NULL),
(58, '2021-01-29', 'Salut mes amis', NULL),
(59, '2021-01-29', 'Rendez vous sur nordvpn.com :))', NULL),
(60, '2021-01-29', 'J aime le pudding', NULL),
(61, '2021-01-29', 'Bonjour la famille', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `email` varchar(254) NOT NULL,
  `mdp` varchar(128) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `email`, `mdp`, `type`) VALUES
(1, 'Vanestarre', 'Vanestarre', '$2y$10$gFFpc6nwiN8YdVWT2foKY.I5WRgg./EOVfoTfU2VgYMetMqoruF6i', 'SUPER_ADMIN'),
(27, 'Vanefandu83', 'Vanefandu83@gmail.com', '$2y$10$hcJhzMmeEJDXfsOSMcOge.LyglpwNZLHO3bmd2PRGG4r8blaQW2Ee', 'MEMBER'),
(30, 'Manuel', 'Manuel', '$2y$10$qxWPTNjPD.PSVkS/TtS0..gZIsgZjZtqUJhPkBo.xrJnZcS.faoPu', 'MEMBER'),
(31, 'Ugo', 'ugo.larsonneur0@gmail.com', '$2y$10$j6Qy68NkFEF38057Tvvfuu8/IsuyMvcvwMNxg3PTXdVP1KXzxCdwq', 'MEMBER'),
(32, 'Gaetan', 'gaetan.trinca-pupet@etu.univ-amu.fr', '$2y$10$asTe6V7HkcbSFGAlLEiTQuiRBOQvOYI02jnSmrvbEMJdW8gNv2vAa', 'MEMBER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emoji`
--
ALTER TABLE `emoji`
  ADD PRIMARY KEY (`id_user`,`id_message`,`emoji_name`);

--
-- Indexes for table `emoji_count`
--
ALTER TABLE `emoji_count`
  ADD PRIMARY KEY (`id_message`,`emoji_name`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_Message`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_Message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
