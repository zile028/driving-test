-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8888
-- Generation Time: Nov 26, 2021 at 09:23 PM
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
-- Table structure for table `user_test`
--

CREATE TABLE `user_test` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `number_correct` int(11) NOT NULL,
  `percent` int(11) DEFAULT NULL,
  `answer_json` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_test`
--

INSERT INTO `user_test` (`id`, `test_id`, `user_id`, `points`, `number_correct`, `percent`, `answer_json`) VALUES
(7, 1, 1, 24, 10, 100, '{\"1\": {\"11\": \"11\"}, \"4\": {\"20\": \"20\"}, \"14\": {\"83\": \"83\"}, \"16\": {\"100\": \"100\"}, \"17\": {\"103\": \"103\", \"104\": \"104\"}, \"29\": {\"124\": \"124\"}, \"34\": {\"138\": \"138\"}, \"37\": {\"148\": \"148\"}, \"39\": {\"152\": \"152\"}, \"42\": {\"162\": \"162\"}}'),
(8, 6, 1, 22, 8, 79, '{\"4\": {\"20\": \"20\"}, \"14\": {\"83\": \"83\"}, \"17\": {\"103\": \"103\", \"104\": \"104\"}, \"26\": {\"114\": \"114\"}, \"28\": {\"120\": \"120\"}, \"30\": {\"127\": \"127\"}, \"32\": {\"133\": \"133\"}, \"39\": {\"152\": \"152\"}, \"43\": {\"164\": \"164\", \"166\": \"166\"}, \"45\": {\"172\": \"172\", \"176\": \"176\"}}'),
(9, 2, 1, 10, 4, 36, '{\"4\": {\"20\": \"20\"}, \"14\": {\"83\": \"83\"}, \"17\": {\"103\": \"103\", \"104\": \"104\"}, \"26\": {\"115\": \"115\"}, \"27\": {\"118\": \"118\"}, \"32\": {\"134\": \"134\"}, \"36\": {\"145\": \"145\"}, \"39\": {\"152\": \"152\"}, \"41\": {\"158\": \"158\"}, \"44\": {\"170\": \"170\", \"171\": \"171\"}}'),
(10, 1, 9, 18, 7, 75, '{\"1\": {\"11\": \"11\"}, \"4\": {\"21\": \"21\"}, \"14\": {\"83\": \"83\"}, \"16\": {\"101\": \"101\"}, \"17\": {\"103\": \"103\", \"104\": \"104\"}, \"29\": {\"124\": \"124\"}, \"34\": {\"139\": \"139\"}, \"37\": {\"148\": \"148\"}, \"39\": {\"152\": \"152\"}, \"42\": {\"162\": \"162\"}}'),
(11, 3, 9, 15, 6, 58, '{\"4\": {\"20\": \"20\"}, \"14\": {\"83\": \"83\"}, \"17\": {\"103\": \"103\", \"104\": \"104\"}, \"28\": {\"121\": \"121\"}, \"29\": {\"124\": \"124\"}, \"33\": {\"135\": \"135\"}, \"34\": {\"139\": \"139\"}, \"35\": {\"143\": \"143\"}, \"39\": {\"154\": \"154\"}, \"40\": {\"155\": \"155\"}}');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `user_test`
--
ALTER TABLE `user_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
