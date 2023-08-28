-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 28, 2023 at 04:37 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devsbook2`
--

-- --------------------------------------------------------

--
-- Table structure for table `postcomments`
--

CREATE TABLE `postcomments` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postcomments`
--

INSERT INTO `postcomments` (`id`, `id_post`, `id_user`, `created_at`, `body`) VALUES
(1, 5, 2, '2021-06-24 20:34:53', 'comentario 24-06 quinta'),
(2, 5, 1, '2021-06-25 00:15:19', 'outro comentario 24-06 '),
(3, 5, 1, '2021-06-25 00:16:52', 'terceiro comentario 24-06'),
(4, 4, 1, '2021-06-25 00:18:49', 'que legal 26, quinta'),
(5, 3, 1, '2021-06-25 00:19:12', 'beleza, teste quinta-feira'),
(9, 9, 1, '2021-06-28 17:37:51', 'Legal essa radinha'),
(10, 7, 1, '2021-06-28 17:38:05', 'incrível esses dois mundos');

-- --------------------------------------------------------

--
-- Table structure for table `postlikes`
--

CREATE TABLE `postlikes` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postlikes`
--

INSERT INTO `postlikes` (`id`, `id_post`, `id_user`, `created_at`) VALUES
(7, 5, 1, '2021-06-23 22:12:13'),
(8, 1, 2, '2021-06-23 22:12:59'),
(9, 1, 1, '2021-06-23 22:13:46'),
(10, 4, 1, '2021-06-23 22:14:58'),
(17, 9, 1, '2021-06-28 14:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `type`, `created_at`, `body`) VALUES
(1, 2, 'text', '2021-06-09 02:03:56', 'o q que isso'),
(2, 1, 'text', '2021-06-09 02:05:28', 'entao, primeiro post \"hello world\" de Kaipo'),
(3, 1, 'text', '2021-06-09 15:43:27', 'new Kaipo\'s post 9.06.21-12:43'),
(4, 1, 'text', '2021-06-09 15:44:32', 'Kaipo\'s post \r\n\r\n\r\ndia 9.06.21\r\n\r\n\r\nhora 12:44'),
(5, 1, 'text', '2021-06-21 03:21:50', '20, domingo, feed editor na pasta de perfil'),
(6, 1, 'photo', '2021-06-26 04:06:08', '0c7251289040b2cf1728014d48345520.jpg'),
(7, 1, 'photo', '2021-06-26 04:50:48', '19c3d581c170090899f8718d3fc7311a.jpg'),
(9, 1, 'photo', '2021-06-26 04:52:45', '6589ec3342ad20dcc46a2625ae2da7f0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userrelations`
--

CREATE TABLE `userrelations` (
  `id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrelations`
--

INSERT INTO `userrelations` (`id`, `user_from`, `user_to`) VALUES
(4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `work` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT 'default.jpg',
  `cover` varchar(100) DEFAULT 'default.jpg',
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `birthdate`, `city`, `work`, `avatar`, `cover`, `token`) VALUES
(1, 'kaipo@email.com', '$2y$10$7B77B1RnZv6FR/T/hFydROgu3iSR0kFDVDss84ttfzW.dVAH2aPCa', 'Kaipo Jaquias Surf', '2000-06-23', 'Salvador', 'Empresa de Tecnologia Treinamento Especialização', 'cd9e2d9241ab4d89282a8d1dab491dd0.jpg', 'ad1b3de6de3cd46627be33070c7ae7a9.jpg', '6892034acc938015952d3741cea622cb'),
(2, 'beto@side.com', '$2y$10$/0J5HfcxXKgfcbuNKSGSZ.wjbwZFGWfpYqCavSytSze0sC8.EnyFi', 'betao', '1974-11-04', 'São Paulo', '', 'default.jpg', 'default.jpg', '934a0cdb21ae92c8dcb6b068f773fa91');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `postcomments`
--
ALTER TABLE `postcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postlikes`
--
ALTER TABLE `postlikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrelations`
--
ALTER TABLE `userrelations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postcomments`
--
ALTER TABLE `postcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `postlikes`
--
ALTER TABLE `postlikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userrelations`
--
ALTER TABLE `userrelations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
