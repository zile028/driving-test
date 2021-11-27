-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8888
<<<<<<< HEAD
-- Generation Time: Nov 27, 2021 at 03:12 PM
=======
-- Generation Time: Nov 26, 2021 at 09:25 PM
>>>>>>> fc16804bd8f081fd0613a1f7793f97979cee9f25
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
  `answers` int(10) DEFAULT '1',
  `points` int(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `atach`, `answers`, `points`) VALUES
(1, 'Od saobraćajnog znaka prikazanog na slici se završava:', '8661636996390.jpg', 1, 3),
(4, 'Svetlosni saobraćajni znak - treptuće žuto svetlo koji daje semafor ima značenje:', NULL, 1, 3),
(14, 'Saobracajni znak prikazan na slici označava:', '5191637153531.jpg', 1, 3),
(16, 'Непосредно регулисање саобраћаја на путевима врше:', NULL, 1, 1),
(17, 'Контролу над возачима и возилима у саобраћају на\r\nпутевима ради примене прописа о безбедности\r\nсаобраћаја врше:', NULL, 2, 1),
(26, 'Policijski službenik propisan znak kojim se naređuje ubrzanje kretanja:', NULL, 1, 3),
(27, 'Znak koji daje policijski službenik prikazan na slici, kada se nalazi na kolovozu, označava:', '2781637868121.jpg', 1, 3),
(28, 'Svetlosni saobraćajni znak prikazan na slici ima značenje:', '6971637868413.jpg', 1, 3),
(29, 'Razdelna udvojena kombinovana linija, prikazana na slici,daje mogućnost prelaska preko linije:', '6691637868511.jpg', 1, 3),
(30, 'Boja linije za odvajanje saobraćajnih traka za kretanje vozila javnog prevoza putnika je:', NULL, 1, 3),
(31, 'Dopunske table koje sadrže poruke u obliku simbola, kao u situaciji na slici:', '1971637868793.jpg', 1, 3),
(32, 'Saobracajni znak prikazan na slici označava', '3721637868966.jpg', 1, 3),
(33, 'Znak izričite naredbe se postavlja:', NULL, 1, 3),
(34, 'Saobracajni znak prikazan na slici označava:', '4011637869354.jpg', 1, 2),
(35, 'Saobracajni znak prikazan na slici označava:', '6461637869472.jpg', 1, 2),
(36, 'Svetlosne oznake na putu van naseljenih mesta označavaju:', NULL, 1, 3),
(37, 'U situaciji prikazanoj na slici preticanje:', '6611637869634.jpg', 1, 2),
(38, 'Tramvaj koji se kreće po šinama postavljenim na sredini kolovoza sme da se pretiče:', NULL, 1, 3),
(39, 'Kada policijsko vozilo sa prvenstvom prolaza daje istovremeno i svetlosni znak upozorenja (uzastopno ili naizmenično uključivanje dugih svetala), vozač vozila koje se kreće neposredno ispred policijskog vozila koje daje te znake mora:', NULL, 1, 3),
(40, 'U situaciji prikazanoj na slici:', '5181637869814.jpg', 1, 3),
(41, 'Vozač koji želi da prođe raskrsnicu, na kojoj ima prvenstvo prolaza:', NULL, 1, 3),
(42, 'U situaciji prikazanoj na slici:', '3001637870207.jpg', 1, 3),
(43, 'Vozač je dužan da brzinu kretanja vozila prilagodi tako da:', NULL, 2, 3),
(44, 'Vozač ne sme vozilom da vrši preticanje ili obilaženje:', NULL, 2, 3),
(45, 'Iz saobraćaja će biti isključeno vozilo:', NULL, 2, 3);

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
(99, 16, 'униформисани комунални полицајци', 0),
(100, 16, 'униформисани полицијски службеници', 1),
(101, 16, 'инспектори за друмски саобраћај', 0),
(102, 17, 'униформисани комунални полицајци', 0),
(103, 17, 'униформисани полицијски службеници', 1),
(104, 17, 'службеници надлежног органа за саобраћај', 1),
(105, 17, 'полицијски службеници у грађанском оделу', 0),
(113, 26, 'može davati samo iz vozila sa prvenstvom prolaza', 0),
(114, 26, 'može davati i iz vozila, odnosno sa motocikla, kada policijski službenik, odnosno vozilo, ima vidno obeležje policije', 1),
(115, 26, 'ne može davati iz vozila, odnosno sa motocikla', 0),
(116, 27, 'obavezno zaustavljanje za sve vozače prema kojima je okrenut dlan i prsa policijskog službenika', 1),
(117, 27, 'zabranu prolaza za sve vozače, osim za one vozače čija se vozila, u času kada policijski službenik podigne ruku, ne mogu na bezbedan način zaustaviti,', 0),
(118, 27, 'da vozači koji vozilima dolaze is pravca u kome su okrenuta leđa, odnosno prsa policijskog službenika moraju zaustaviti svoja vozila, a da vozači koji vozilima dolaze sa nejgovih bočinih strana imaju pravo prolaza.', 0),
(119, 28, 'zabranjen prolaz', 0),
(120, 28, 'dozvoljen prolaz', 1),
(121, 28, 'obavezu za sve učesnike u saobraćaju da se kreću uz povećanu opreznost', 0),
(122, 29, 'putanjom označenom brojem 1', 0),
(124, 29, 'putanjom označenom brojem 2', 1),
(125, 29, 'bilo kojom putanjom', 0),
(126, 30, 'bela', 0),
(127, 30, 'žuta', 1),
(128, 30, 'plava', 0),
(129, 31, 'simbolom bliže određuju značenje znakova uz koje se ističu', 1),
(130, 31, 'simbolom daju obaveštenja koja nisu u vezi sa značenjem saobraćajnih znakova', 0),
(131, 31, 'simbolom stavljaju do znanja zabrane, ograničenja i obaveze kojih se učesnici u saobraćaju moraju pridržavati', 0),
(132, 32, 'mesto pred ulazom u raskrsnicu na kome je vozač dužan da zaustavi vozilo i da ustupi prvenstvo prolaza vozilima koja se kreću putem na koji on nailazi', 1),
(133, 32, 'blizinu raskrsnice na kojoj vozač mora da ustupi prvenstvo prolaza vozilima koja se kreću po putu na koji on nailazi', 0),
(134, 32, 'put odnosno deo puta na kome je zabranjen saobraćaj vozila iz smera prema kome je okrenut znak', 0),
(135, 33, 'na udaljenosti od 150 m do 250 m ispred mesta na putu, odakle za učesnike u saobraćaju nastaje obaveza da se pridržavaju naredbe izražene saobraćajnim znakom', 0),
(136, 33, 'na udaljenosti od 100 m ispred mesta na putu odakle za učesnike u saobraćaju nastaje obaveza da se pridržavaju naredbe izražene saobraćajnim znakom', 0),
(137, 33, 'neposredno ispred mesta odakle za učesnike u saobraćaju nastaje obaveza da se pridržavaju naredbe izražene saobraćajnim znakom', 1),
(138, 34, 'blizinu dela puta na kome se nalazi nevaljani tucanik ili koji je posut sitnim kamenjem na tvrdoj podlozi i na kome za druge učesnike u saobraćaju postoji opasnost od prskanja kamena', 1),
(139, 34, 'blizinu dela puta na kome postoji opasnost od kamenja koje pada iliod kamenja koje se nalazi na putu', 0),
(140, 34, 'blizinu dela puta na kome je uz kolovoz neučvršćena bankina', 0),
(141, 35, 'približavanje delu puta sa više opasnih krivina od koja je prva na levo', 0),
(142, 35, 'približavanje delu puta sa više opasnih krivina od koja je prva na desno', 0),
(143, 35, 'približavanje delu puta sa više krivina ili sa uzastopnim krivinama, koje su opasne po svojim fizičkim karakteristikama ili zbog nedostatka preglednosti', 1),
(144, 36, 'ivicu kolovoza', 1),
(145, 36, 'mesto na kome put prelazi preko tramvajske pruge u istom nivou', 0),
(146, 36, 'slobodan profil puta', 0),
(147, 37, 'je dozvoljeno', 0),
(148, 37, 'nije dozvoljeno', 1),
(149, 38, 'samo sa desne strane', 1),
(150, 38, 'sa bilo koje strane, u zavisnosti od saobraćajne situacije', 0),
(151, 38, 'samo sa leve strane', 0),
(152, 39, 'odmah bezbedno da zaustavi svoje vozilo uz desnu ivicu kolovoza,a po mogućnosti i van kolovoza', 1),
(153, 39, 'da uspori kretanje svog vozila i da omogući preticanje vozilu sa pravom prvenstva prolaza', 0),
(154, 39, 'da pomeri svoje vozilo uz desnu ivicu kolovoza i da omogući preticanje vozilu sa pravom prvenstva prolaza', 0),
(155, 40, 'dužni ste da propustite šinsko vozilo', 1),
(156, 40, 'imate prvenstvo prolaza u odnosu na šinsko vozilo', 0),
(157, 41, 'ne sme vozilom da uđe u raskrsnicu, ako će zbog gustine saobraćaja stati u raskrsnici ili na pešačkom prelazu i time ometati ili onemogućiti saobraćaj vozila, odnosno pešaka', 1),
(158, 41, 'mora vozilom da uđe u raskrsnicu, bez obzira na gustinu saobraćaja, da ne bi ometao vozila koja se kreću iza njega', 0),
(159, 41, 'može vozilom ući u raskrsnicu ako mu gustina saobraćaja dozvoljava da ne stane na pešačkom prelazu, iako time ometa saobraćaj vozila', 0),
(160, 42, 'propustićete traktor, a imate prvenstvo prolaza u odnosu na putničko vozilo', 0),
(161, 42, 'propustićete putničko vozilo, a imate prvenstvo prolaza u odnosu na traktor', 0),
(162, 42, 'propustićete oba vozila', 1),
(163, 42, 'imate prednost u odnosu na oba vozila', 0),
(164, 43, 'vozilo može blagovremeno da zaustavi pred svakom preprekom koju pod datim okolnostima može da vidi ili ima razloga da predvidi', 1),
(165, 43, 'što pre bezbedno stigne na odredište', 0),
(166, 43, 'ne ugrožava bezbednost saobraćaja', 1),
(167, 43, 'može ometati, ali ne i ugroziti druge učesnike u saobraćaju', 0),
(168, 44, 'u zoni škole', 0),
(169, 44, 'ako po izvršenom preticanju ili obilaženju ne bi mogao da se vrati u saobraćajnu traku kojom se kretao pre toga bez ometanja ili ugrožavanja ostalih učesnika u saobraćaju', 1),
(170, 44, 'u zoni \"30\"', 0),
(171, 44, 'zaustavnom trakom', 1),
(172, 45, 'na kome registraciona nalepnica nije postavljena na propisan način', 0),
(174, 45, 'koje nije upisano u jedinstveni registar vozila', 1),
(175, 45, 'za koje postoji obaveza označavanja oznakama za duga, teška i spora vozila a nije označeno tim oznakama', 0),
(176, 45, 'čijoj registracionoj nalepnici odnosno potvrdi o korišćenju tablica za privremeno označavanje, je istekao rok važenja', 1);

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
(1, 4, 3),
(1, 14, 3),
(1, 16, 1),
(1, 17, 1),
(1, 29, 3),
(1, 34, 2),
(1, 37, 2),
(1, 39, 3),
(1, 42, 3),
(2, 4, 3),
(2, 14, 3),
(2, 17, 1),
(2, 26, 3),
(2, 27, 3),
(2, 32, 3),
(2, 36, 3),
(2, 39, 3),
(2, 41, 3),
(2, 44, 3),
(3, 4, 3),
(3, 14, 3),
(3, 17, 1),
(3, 28, 3),
(3, 29, 3),
(3, 33, 3),
(3, 34, 2),
(3, 35, 2),
(3, 39, 3),
(3, 40, 3),
(6, 4, 3),
(6, 14, 3),
(6, 17, 1),
(6, 26, 3),
(6, 28, 3),
(6, 30, 3),
(6, 32, 3),
(6, 39, 3),
(6, 43, 3),
(6, 45, 3);

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
<<<<<<< HEAD
(1, 'Dejan', 'Živković', '2021-11-08', 'zile028@gmail.com', '$2y$10$Q4LxKZ.O0pxUJVgxuz6G9.SMHi5EQrg5m1TrTFyKduT58MkFjX3K.', '2021-11-08 00:38:49', '2021-11-27 11:15:11', '9771638024812.jpg', 1),
(7, 'Ненад', 'Станојевић', '2021-11-16', 'zile128@gmail.com', '$2y$10$xgdorIODs8Wtr/5j3NFqO.FgD1slqeGzGT9FEoUFXDPlU2Ywx5gli', '2021-11-08 21:33:55', '2021-11-08 21:33:55', '5821638024781.jpg', 2),
(9, 'Небојша', 'Васић', '1975-10-11', 'vasic@gmail.com', '$2y$10$5VfPZRhQIq5D9qrs0uOQaOGtevmA2sNx.seQYyX75ikXH9rldIV3.', '2021-11-12 21:04:07', '2021-11-25 21:34:51', '7781636814932.jpg', 2);
=======
(1, 'Dejan', 'Živković', '2021-11-08', 'zile028@gmail.com', '$2y$10$Q4LxKZ.O0pxUJVgxuz6G9.SMHi5EQrg5m1TrTFyKduT58MkFjX3K.', '2021-11-08 00:38:49', '2021-11-26 19:55:19', '3991637583489.jpg', 1),
(9, 'Небојша', 'Васић', '1975-10-11', 'vasic@gmail.com', '$2y$10$5VfPZRhQIq5D9qrs0uOQaOGtevmA2sNx.seQYyX75ikXH9rldIV3.', '2021-11-12 21:04:07', '2021-11-26 19:42:29', '7781636814932.jpg', 2);
>>>>>>> fc16804bd8f081fd0613a1f7793f97979cee9f25

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
<<<<<<< HEAD
  `answer_json` text NOT NULL
=======
  `answer_json` text
>>>>>>> fc16804bd8f081fd0613a1f7793f97979cee9f25
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
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `solution`
--
ALTER TABLE `solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test_category`
--
ALTER TABLE `test_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> fc16804bd8f081fd0613a1f7793f97979cee9f25

--
-- AUTO_INCREMENT for table `user_test`
--
ALTER TABLE `user_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
