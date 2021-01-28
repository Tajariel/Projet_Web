-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2021 at 06:22 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simp-land_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `emoji`
--

CREATE TABLE `emoji` (
  `id_user` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `emoji_name` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emoji_count`
--

CREATE TABLE `emoji_count` (
  `id_message` int(11) NOT NULL,
  `emoji_name` varchar(20) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '2021-01-20', 'bonjour sava', ''),
(2, '2021-01-27', 'HAHAHAH', NULL),
(3, '2021-01-27', 'sgf', NULL),
(4, '2021-01-27', 'b vc', NULL),
(5, '2021-01-27', 'b vc', NULL),
(6, '2021-01-27', '55555555555555555555555555555555555555555555555555', NULL),
(7, '2021-01-27', '55555555555555555555555555555555555555555555555555', NULL),
(8, '2021-01-27', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', NULL),
(9, '2021-01-27', 'mmm', NULL),
(10, '2021-01-27', 'ooo', NULL),
(11, '2021-01-27', 'ooo', NULL),
(12, '2021-01-27', 'ooo', NULL),
(13, '2021-01-27', 'ooo', NULL),
(14, '2021-01-27', 'ooo', NULL);

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
(15, 'zz', 'zz', '$2y$10$b9TMlrGzo6AK.WaMHh5gNOXwHyeWkAXZ/OV623K9/3EOjR0sXfsdO', 'MEMBER'),
(16, 'ss', 'ss', '$2y$10$pIrx0Yln46QbvRvqGLWfNeJoTTQKseMAMPkquonUs2XNnIW8PZIaC', 'MEMBER'),
(17, 'gg', 'gg', '$2y$10$uPjA9llSAcdFD7GcdwWGgOzu/wJmnSLp3pzlWp5ZTPprmhT4cpKQe', 'MEMBER'),
(18, 'dd', 'dd', '$2y$10$6/MK0e2cpu1g7ZtrxcWK5.fR9cuWwnXPiFNF5nPd6FRJQsiaUzGZ6', 'MEMBER'),
(19, '11', '11', '$2y$10$Wq.fSKkBH//a2YhlzXwQM.6F3XhCHN.V10td/rjzE/QD.8YjW2hAq', 'MEMBER');

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
  MODIFY `id_Message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
