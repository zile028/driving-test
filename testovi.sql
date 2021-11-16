-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8888
-- Generation Time: Nov 16, 2021 at 06:34 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testovi`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `atach` varchar(50) DEFAULT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `atach`, `test_id`) VALUES
(1, 'Od saobraćajnog znaka prikazanog na slici se završava:', '8661636996390.jpg', 1),
(2, 'Kolovozna traka je na slici označena brojem:', '8401636996417.jpg', 1),
(3, 'Svetlosni znak na vozilu policije, prikazan na slici, označava:', '8381636996445.jpg', 1),
(4, 'Svetlosni saobraćajni znak - treptuće žuto svetlo koji daje semafor ima značenje:', NULL, 5),
(5, 'Policijski službenik propisan znak kojim se naređuje ubrzanje kretanja:', NULL, 5),
(6, 'Znak koji daje policijski službenik prikazan na slici, kada se nalazi na kolovozu, označava:', '7581636998566.jpg', 5),
(9, 'Svetlosni saobraćajni znak prikazan na slici ima značenje:', '1221636999337.jpg', 5),
(11, 'Razdelna udvojena kombinovana linija, prikazana na slici,daje mogućnost prelaska preko linije:', '4561636999634.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`) VALUES
(1, 'admin', 'Full access'),
(2, 'user', 'Limited access');

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE `solution` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `solution` varchar(255) NOT NULL,
  `corect` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solution`
--

INSERT INTO `solution` (`id`, `question_id`, `solution`, `corect`) VALUES
(3, 11, 'putanjom označenom brojem 1', 0),
(4, 11, 'putanjom označenom brojem 2', 1),
(5, 11, 'bilo kojom putanjom', 0),
(6, 9, 'zabranjen prolaz', 0),
(7, 9, 'dozvoljen prolaz', 1),
(8, 9, 'obavezu za sve učesnike u saobraćaju da se kreću uz povećanu opreznost', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `test_name` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_name`, `category_id`) VALUES
(1, 'Test 1', 1),
(2, 'Test 2', 2),
(3, 'Test 3', 2),
(4, 'Test 4', 1),
(5, 'Test 2', 1),
(6, 'Test 3', 1),
(7, 'Test 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE `test_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`id`, `category_name`, `icon`) VALUES
(1, 'B ketegorija', '<i class=\"fas fa-car\"></i>'),
(2, 'C kategorija', '<i class=\"fas fa-truck\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_birth` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profil_img` varchar(60) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `date_birth`, `email`, `password`, `created_at`, `last_login`, `profil_img`, `role_id`) VALUES
(1, 'Dejan', 'Živković', '2021-11-08', 'zile028@gmail.com', '$2y$10$SEc5S8nAkfT/vOLOm8zoWOdzhyhPPycY7LJRpXe5BTpfLwxKV90EK', '2021-11-08 00:38:49', '2021-11-15 17:09:49', '8871635536081.jpg', 1),
(7, 'Ненад', 'Станојевић', '2021-11-16', 'zile128@gmail.com', '$2y$10$xgdorIODs8Wtr/5j3NFqO.FgD1slqeGzGT9FEoUFXDPlU2Ywx5gli', '2021-11-08 21:33:55', '2021-11-08 21:33:55', NULL, 2),
(9, 'Небојша', 'Васић', '1975-10-11', 'vasic@gmail.com', '$2y$10$5VfPZRhQIq5D9qrs0uOQaOGtevmA2sNx.seQYyX75ikXH9rldIV3.', '2021-11-12 21:04:07', '2021-11-12 21:04:28', '7781636814932.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `test_category`
--
ALTER TABLE `test_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `solution`
--
ALTER TABLE `solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test_category`
--
ALTER TABLE `test_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
