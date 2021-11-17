-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8888
-- Generation Time: Nov 17, 2021 at 10:34 PM
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
  `test_id` int(11) NOT NULL,
  `answers` int(10) NOT NULL DEFAULT '1',
  `points` int(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `atach`, `test_id`, `answers`, `points`) VALUES
(1, 'Od saobraćajnog znaka prikazanog na slici se završava:', '8661636996390.jpg', 1, 1, 3),
(2, 'Kolovozna traka je na slici označena brojem:', '8401636996417.jpg', 1, 1, 1),
(3, 'Svetlosni znak na vozilu policije, prikazan na slici, označava:', '8381636996445.jpg', 1, 1, 1),
(4, 'Svetlosni saobraćajni znak - treptuće žuto svetlo koji daje semafor ima značenje:', NULL, 5, 1, 3),
(5, 'Svetlosni saobraćajni znak - treptuće žuto svetlo koji daje semafor ima značenje:', NULL, 5, 1, 3),
(6, 'Znak koji daje policijski službenik prikazan na slici, kada se nalazi na kolovozu, označava:', '7581636998566.jpg', 5, 1, 1),
(9, 'Svetlosni saobraćajni znak prikazan na slici ima značenje:', '1221636999337.jpg', 5, 1, 1),
(11, 'Razdelna udvojena kombinovana linija, prikazana na slici,daje mogućnost prelaska preko linije:', '4561636999634.jpg', 5, 1, 1),
(12, 'Boja linije za odvajanje saobraćajnih traka za kretanje vozila javnog prevoza putnika je:', NULL, 5, 1, 3),
(13, 'Dopunske table koje sadrže poruke u obliku simbola, kao u situaciji na slici:', '3591637069052.jpg', 5, 1, 1),
(14, 'Saobracajni znak prikazan na slici označava:', '5191637153531.jpg', 5, 1, 3);

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
(8, 9, 'obavezu za sve učesnike u saobraćaju da se kreću uz povećanu opreznost', 0),
(9, 1, 'zona usporenog saobraćaja', 0),
(10, 1, 'naselјeno mesto', 0),
(11, 1, 'naselјe', 1),
(12, 1, 'turističko odredište', 0),
(13, 2, '4', 0),
(14, 2, '1', 1),
(15, 2, '2', 0),
(16, 2, '3', 0),
(17, 3, 'da ste dužni da usporite kretanјe, odnosno da se krećete brzinom kojom se kreće policijsko vozilo dok daje taj znak', 1),
(18, 3, 'da ste dužni da usporite kretanјe samo u slučaju ako ste prekoračili dozvolјenu brzinu', 0),
(19, 3, 'preporuku za bezbedno kretanјe', 0),
(20, 4, 'obaveza za sve učesnike u saobraćaju da se kreću uz povećanu opreznost', 1),
(21, 4, 'zabranjen prolaz, osim u slučaju kada se vozilo ne može bezbedno zaustaviti ispred navedenog znaka,', 0),
(23, 5, 'može davati samo iz vozila sa prvenstvom prolaza', 0),
(24, 5, 'može davati i iz vozila, odnosno sa motocikla, kada policijski službenik, odnosno vozilo, ima vidno obeležje policije', 1),
(25, 5, 'ne može davati iz vozila, odnosno sa motocikla', 0),
(26, 6, 'obavezno zaustavljanje za sve vozače prema kojima je okrenut dlan i prsa policijskog službenika', 1),
(27, 6, 'zabranu prolaza za sve vozače, osim za one vozače čija se vozila, u času kada policijski službenik podigne ruku, ne mogu na bezbedan način zaustaviti', 0),
(28, 6, 'da vozači koji vozilima dolaze is pravca u kome su okrenuta leđa, odnosno prsa policijskog službenika moraju zaustaviti svoja vozila, a da vozači koji vozilima dolaze sa nejgovih bočinih strana imaju pravo prolaza', 0),
(29, 12, 'bela', 0),
(30, 12, 'žuta', 1),
(31, 12, 'plava', 0),
(32, 13, 'simbolom bliže određuju značenje znakova uz koje se ističu', 1),
(33, 13, 'simbolom daju obaveštenja koja nisu u vezi sa značenjem saobraćajnih znakova', 0),
(34, 13, 'simbolom stavljaju do znanja zabrane, ograničenja i obaveze kojih se učesnici u saobraćaju moraju pridržavati', 0),
(79, 4, 'zabranjen prolaz.', 0),
(82, 14, 'prethodno obaveštenje vozaču radi prestrojavanja na raskrsnici na putevima sa više saobraćajnih traka', 0),
(83, 14, 'blizina i položaj puta na koji nema izlaz (slepi put)', 1),
(84, 14, 'blizina mesta ili mesto na kome se nalazi stanica za prvu pomoć', 0);

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
(1, 'Dejan', 'Živković', '2021-11-08', 'zile028@gmail.com', '$2y$10$SEc5S8nAkfT/vOLOm8zoWOdzhyhPPycY7LJRpXe5BTpfLwxKV90EK', '2021-11-08 00:38:49', '2021-11-17 09:39:14', '8871635536081.jpg', 1),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `solution`
--
ALTER TABLE `solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
