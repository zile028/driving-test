-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8888
-- Generation Time: Nov 24, 2021 at 07:37 PM
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
  `test_id` int(11) DEFAULT NULL,
  `answers` int(10) DEFAULT '1',
  `points` int(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `atach`, `test_id`, `answers`, `points`) VALUES
(1, 'Od saobraćajnog znaka prikazanog na slici se završava:', '8661636996390.jpg', 1, 1, 3),
(4, 'Svetlosni saobraćajni znak - treptuće žuto svetlo koji daje semafor ima značenje:', NULL, NULL, 2, 3),
(14, 'Saobracajni znak prikazan na slici označava:', '5191637153531.jpg', NULL, 1, 3),
(15, 'Ptianje 2', NULL, 1, 1, 3),
(16, 'Непосредно регулисање саобраћаја на путевима врше:', NULL, NULL, 1, 1),
(17, 'Контролу над возачима и возилима у саобраћају на\r\nпутевима ради примене прописа о безбедности\r\nсаобраћаја врше:', NULL, NULL, 2, 1);

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
(9, 1, 'zona usporenog saobraćaja', 0),
(10, 1, 'naselјeno mesto', 0),
(11, 1, 'naselјe', 1),
(20, 4, 'obaveza za sve učesnike u saobraćaju da se kreću uz povećanu opreznost', 1),
(21, 4, 'zabranjen prolaz, osim u slučaju kada se vozilo ne može bezbedno zaustaviti ispred navedenog znaka,', 0),
(79, 4, 'zabranjen prolaz.', 0),
(82, 14, 'prethodno obaveštenje vozaču radi prestrojavanja na raskrsnici na putevima sa više saobraćajnih traka', 0),
(83, 14, 'blizina i položaj puta na koji nema izlaz (slepi put)', 1),
(84, 14, 'blizina mesta ili mesto na kome se nalazi stanica za prvu pomoć', 0),
(95, 15, 'Opcija 1', 0),
(96, 15, 'Opcija 2', 1),
(97, 15, 'Opcija 3', 0),
(98, 4, 'sedi kuci', 1),
(99, 16, 'униформисани комунални полицајци', 0),
(100, 16, 'униформисани полицијски службеници', 1),
(101, 16, 'инспектори за друмски саобраћај', 0),
(102, 17, 'униформисани комунални полицајци', 0),
(103, 17, 'униформисани полицијски службеници', 1),
(104, 17, 'службеници надлежног органа за саобраћај', 1),
(105, 17, 'полицијски службеници у грађанском оделу', 0);

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
(6, 'Test 3', 1);

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
(2, 'C kategorija', '<i class=\"fas fa-truck\"></i>'),
(3, 'A kategorija', '<i class=\"fas fa-motorcycle\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `test_question`
--

CREATE TABLE `test_question` (
  `test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_question`
--

INSERT INTO `test_question` (`test_id`, `question_id`, `points`) VALUES
(1, 1, 3),
(6, 1, 3),
(6, 4, 3),
(6, 14, 3);

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
(1, 'Dejan', 'Živković', '2021-11-08', 'zile028@gmail.com', '$2y$10$Q4LxKZ.O0pxUJVgxuz6G9.SMHi5EQrg5m1TrTFyKduT58MkFjX3K.', '2021-11-08 00:38:49', '2021-11-22 18:50:42', '3991637583489.jpg', 1),
(7, 'Ненад', 'Станојевић', '2021-11-16', 'zile128@gmail.com', '$2y$10$xgdorIODs8Wtr/5j3NFqO.FgD1slqeGzGT9FEoUFXDPlU2Ywx5gli', '2021-11-08 21:33:55', '2021-11-08 21:33:55', NULL, 2),
(9, 'Небојша', 'Васић', '1975-10-11', 'vasic@gmail.com', '$2y$10$5VfPZRhQIq5D9qrs0uOQaOGtevmA2sNx.seQYyX75ikXH9rldIV3.', '2021-11-12 21:04:07', '2021-11-21 20:37:39', '7781636814932.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE `user_answer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `solution_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`id`, `user_id`, `solution_id`, `test_id`) VALUES
(1, 1, 9, 1),
(2, 1, 10, 1),
(3, 1, 15, 1),
(4, 1, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_test`
--

CREATE TABLE `user_test` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `number_correct` int(11) NOT NULL,
  `answer_json` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_test`
--

INSERT INTO `user_test` (`id`, `test_id`, `user_id`, `points`, `number_correct`, `answer_json`) VALUES
(1, 5, 1, 6, 2, '{\"4\": {\"20\": \"20\", \"98\": \"98\"}, \"14\": {\"83\": \"83\"}}'),
(2, 1, 1, 3, 1, '{\"1\": {\"11\": \"11\"}, \"15\": {\"95\": \"95\"}}'),
(3, 1, 9, 3, 1, '{\"1\": {\"11\": \"11\"}, \"15\": {\"95\": \"95\"}}'),
(4, 7, 1, 2, 2, '{\"16\": {\"100\": \"100\"}, \"17\": {\"103\": \"103\", \"104\": \"104\"}}');

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
-- Indexes for table `test_question`
--
ALTER TABLE `test_question`
  ADD PRIMARY KEY (`test_id`,`question_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- Indexes for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_test`
--
ALTER TABLE `user_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `solution`
--
ALTER TABLE `solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test_category`
--
ALTER TABLE `test_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_test`
--
ALTER TABLE `user_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `solution`
--
ALTER TABLE `solution`
  ADD CONSTRAINT `solution_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_question`
--
ALTER TABLE `test_question`
  ADD CONSTRAINT `test_question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_question_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
