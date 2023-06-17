-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Jun 2023 um 21:24
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `regestrieren`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE `bestellungen` (
  `id` int(11) NOT NULL,
  `bestellung_erstellen_fk` int(11) NOT NULL,
  `person_fk` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'neu',
  `preis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `bestellungen`
--

INSERT INTO `bestellungen` (`id`, `bestellung_erstellen_fk`, `person_fk`, `status`, `preis`) VALUES
(16, 49, 47, 'neu', 600),
(17, 50, 47, 'storniert', 1090),
(22, 55, 47, 'storniert', 390),
(23, 56, 47, 'storniert', 390),
(24, 57, 47, 'storniert', 480),
(25, 58, 47, 'bestätigt', 450);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellung_erstellen`
--

CREATE TABLE `bestellung_erstellen` (
  `id` int(11) NOT NULL,
  `person_fk` int(11) NOT NULL,
  `produkt_1` int(11) NOT NULL,
  `produkt_2` int(11) DEFAULT NULL,
  `produkt_3` int(11) DEFAULT NULL,
  `produkt_4` int(11) DEFAULT NULL,
  `produkt_5` int(11) DEFAULT NULL,
  `produkt_6` int(11) DEFAULT NULL,
  `produkt_7` int(11) DEFAULT NULL,
  `produkt_8` int(11) DEFAULT NULL,
  `produkt_9` int(11) DEFAULT NULL,
  `produkt_10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `bestellung_erstellen`
--

INSERT INTO `bestellung_erstellen` (`id`, `person_fk`, `produkt_1`, `produkt_2`, `produkt_3`, `produkt_4`, `produkt_5`, `produkt_6`, `produkt_7`, `produkt_8`, `produkt_9`, `produkt_10`) VALUES
(48, 47, 5, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 47, 5, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 47, 1, 2, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 47, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 47, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 47, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 47, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 47, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 47, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 47, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 47, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `usermail` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `admin` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'aktiv'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`id`, `username`, `first_name`, `usermail`, `password`, `birthday`, `admin`, `status`) VALUES
(30, 'Djokic', 'Danijela', 'danijeladjokic@gmx.at', '$2y$10$h60HyGAnnG9QdWPxd2VvW.e3tMliS.pAd8G/iBUU7VEdnLSSvHqu.', '01.05.2000', NULL, 'aktiv'),
(31, 'Wahba', 'Fawzy', 'fawzi.wahba123@hotmail.com', '$2y$10$P2ohGf..XJkzn59jB0J96.pdTAGw1gtgbBpq9/f0rWJw/TSwqZGwK', '2022-12-28', 1, 'aktiv'),
(32, 'Bumstead', 'Chris', 'chris.bumstead@gmail.com', '$2y$10$zHAQsLs7prFy9mSmo4GTae0DzQT.tXWQbOdGUG1EXwj0.8EnqR1pu', '2022-12-29', NULL, 'aktiv'),
(33, 'gökmen', 'can', 'can.ok@gmx.at', '$2y$10$H2eYXQyQfrSQ6UbdvTRlauXafRmcynlfmZrJUIOHPVjSh3581Krm6', '2023-01-11', NULL, 'inaktiv'),
(39, 'kai', 'berk', 'berkkaitan@gmail.com', '$2y$10$z3l5KujmbmlLYtIqlZ7f5O.o.LoqmhFwbchY83rBLQECDl15OLoKO', '2023-01-13', 1, 'aktiv'),
(47, 'wahba', 'fawzy', 'fawzi.wahba@yahoo.com', '$2y$10$sqLPGN.8kCml6K1OSs0Bp.TVSQFa8dOMIIBEGX4MObMVlfVhPP0Xm', '2023-05-13', 1, 'aktiv'),
(48, 'admin', 'admin', 'admin@admin.com', '$2y$10$5GsQHBVyefIyGINEbAo2quoPTNJY8G5Q1U7PC5cTN/5J9igN0PZ0m', '2023-03-15', 1, 'aktiv');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news_beiträge`
--

CREATE TABLE `news_beiträge` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_path` text DEFAULT NULL,
  `fk_admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `news_beiträge`
--

INSERT INTO `news_beiträge` (`id`, `title`, `text`, `timestamp`, `file_path`, `fk_admin_id`) VALUES
(89, 'Unser Hotel', 'So schaut unser hotel in echt aus.\nist auf der Blockchain also physisch nicht vorhanden!', '2023-01-11 10:41:45', 'thumbnails/resized_63be926998958.png', 30),
(90, 'ich weiss nd', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?', '2023-01-11 10:53:55', 'thumbnails/resized_63be9543b4202.png', 30),
(91, 'Für Fortnite', 'für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite für fortnite ', '2023-01-11 18:36:41', 'thumbnails/resized_63bf01b9cae51.jpg', 30),
(100, 'Chris Bumstead Arnold Pose', 'This is cbum. 4x Mr Olympia!', '2023-01-13 14:07:10', 'thumbnails/resized_63c1658edc055.png', 30),
(101, 'Ronnie Coleman', 'YEAAAAAAAH BUDDY!\r\nLIGHT WEIGHT!\r\nJUST BASIC STUFF..\r\nYOU GOT YOUR TEST DBOL', '2023-01-13 14:08:40', 'thumbnails/resized_63c165e85bd00.png', 30),
(102, 'hotel test', 'test', '2023-01-15 10:29:29', 'thumbnails/resized_63c3d5897aa72.png', 31),
(103, 'Travis Scott', 'Wir haben bald die Travis Scotts im Stock. Sind aber nur 5 Paare - schnell sein!', '2023-05-24 18:51:13', 'thumbnails/resized_646e5ca118721.jpeg', 47);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkte`
--

CREATE TABLE `produkte` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `preis` int(11) NOT NULL,
  `pfad` varchar(255) NOT NULL,
  `beschreibung` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `produkte`
--

INSERT INTO `produkte` (`id`, `name`, `preis`, `pfad`, `beschreibung`, `stock`) VALUES
(1, 'Jordan 1 Royal Blue', 240, '../zzz/images/download_1.jpg', 'beschreibung', 1000),
(2, 'Jordans grey', 150, '../zzz/images/download_2.jpg', 'asdlfk', 1000),
(3, 'jordans 3', 300, '../zzz/images/download_3.jpg', 'kasfdl', 1000),
(4, 'jordans 4', 400, '../zzz/images/download_4.jpg', 'kasfdl', 1000),
(5, 'article 5', 300, '../zzz/images/download_5.png', 'askdlf', 1000),
(6, 'article 6', 300, '../zzz/images/download_6.png', 'askdlf', 1000),
(7, 'iwas', 300, '../zzz/images/download_7.jpeg', 'askdlf', 1000),
(8, 'iwas', 300, '../zzz/images/download_8.jpeg', 'askdlf', 1000),
(9, 'iwas', 300, '../zzz/images/download_9.jpeg', 'askdlf', 1000),
(11, 'iwas', 300, '../zzz/images/download_10.jpeg', 'askdlf', 1000),
(12, 'iwas', 300, '../zzz/images/download_11.jpeg', 'askdlf', 1000),
(13, 'iwas', 300, '../zzz/images/download_12.jpeg', 'askdlf', 1000),
(14, 'iwas', 300, '../zzz/images/download_13.jpeg', 'askdlf', 1000),
(15, 'iwas', 300, '../zzz/images/download_14.jpeg', 'askdlf', 1000),
(16, 'iwas', 300, '../zzz/images/download_15.jpeg', 'askdlf', 1000);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verkaufte_produkte`
--

CREATE TABLE `verkaufte_produkte` (
  `id` int(11) NOT NULL,
  `usermail` varchar(255) NOT NULL,
  `fk_person_id` int(11) NOT NULL,
  `fk_produkt_id` int(11) NOT NULL,
  `produkt_name` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'neu',
  `produkt_preis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `verkaufte_produkte`
--

INSERT INTO `verkaufte_produkte` (`id`, `usermail`, `fk_person_id`, `fk_produkt_id`, `produkt_name`, `timestamp`, `status`, `produkt_preis`) VALUES
(26, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-11 18:06:08', 'neu', 240),
(27, 'fawzi.wahba@yahoo.com', 47, 3, 'jordans 3', '2023-05-27 17:35:29', 'storniert', 300),
(28, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-05-27 17:35:36', 'storniert', 240),
(29, 'fawzi.wahba@yahoo.com', 47, 4, 'jordans 4', '2023-05-27 17:35:33', 'storniert', 400),
(30, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-06 11:45:25', 'neu', 240),
(31, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', '2023-06-06 11:45:25', 'neu', 150),
(32, 'fawzi.wahba@yahoo.com', 47, 3, 'jordans 3', '2023-06-06 11:45:25', 'neu', 300),
(33, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-06 12:03:03', 'neu', 240),
(34, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', '2023-06-06 12:03:03', 'neu', 150),
(35, 'fawzi.wahba@yahoo.com', 47, 4, 'jordans 4', '2023-06-06 14:59:22', 'neu', 400),
(36, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 14:59:22', 'neu', 300),
(37, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-06 14:59:22', 'neu', 240),
(38, 'fawzi.wahba@yahoo.com', 47, 3, 'jordans 3', '2023-06-06 14:59:22', 'neu', 300),
(39, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-06 15:06:21', 'neu', 240),
(40, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', '2023-06-06 15:06:21', 'neu', 150),
(41, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:06:56', 'neu', 300),
(42, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:06:56', 'neu', 300),
(43, 'fawzi.wahba@yahoo.com', 47, 8, 'iwas', '2023-06-06 15:16:16', 'neu', 300),
(44, 'fawzi.wahba@yahoo.com', 47, 9, 'iwas', '2023-06-06 15:16:17', 'neu', 300),
(45, 'fawzi.wahba@yahoo.com', 47, 8, 'iwas', '2023-06-06 15:17:29', 'neu', 300),
(46, 'fawzi.wahba@yahoo.com', 47, 9, 'iwas', '2023-06-06 15:17:29', 'neu', 300),
(47, 'fawzi.wahba@yahoo.com', 47, 8, 'iwas', '2023-06-06 15:19:34', 'neu', 300),
(48, 'fawzi.wahba@yahoo.com', 47, 9, 'iwas', '2023-06-06 15:19:34', 'neu', 300),
(49, 'fawzi.wahba@yahoo.com', 47, 8, 'iwas', '2023-06-06 15:22:15', 'neu', 300),
(50, 'fawzi.wahba@yahoo.com', 47, 9, 'iwas', '2023-06-06 15:22:16', 'neu', 300),
(51, 'fawzi.wahba@yahoo.com', 47, 4, 'jordans 4', '2023-06-06 15:23:52', 'neu', 400),
(52, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:23:52', 'neu', 300),
(53, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:24:29', 'neu', 300),
(54, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:24:29', 'neu', 300),
(55, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:28:17', 'neu', 300),
(56, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:28:17', 'neu', 300),
(57, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:28:30', 'neu', 300),
(58, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:28:30', 'neu', 300),
(59, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:29:25', 'neu', 300),
(60, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:29:25', 'neu', 300),
(61, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:30:27', 'neu', 300),
(62, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:30:27', 'neu', 300),
(63, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:30:57', 'neu', 300),
(64, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:30:57', 'neu', 300),
(65, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:31:34', 'neu', 300),
(66, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:31:34', 'neu', 300),
(67, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:31:59', 'neu', 300),
(68, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:31:59', 'neu', 300),
(69, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:32:56', 'neu', 300),
(70, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:32:56', 'neu', 300),
(71, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:34:04', 'neu', 300),
(72, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:34:04', 'neu', 300),
(73, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:34:29', 'neu', 300),
(74, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:34:29', 'neu', 300),
(75, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:34:39', 'neu', 300),
(76, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:34:39', 'neu', 300),
(77, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:35:23', 'neu', 300),
(78, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:35:23', 'neu', 300),
(79, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:35:34', 'neu', 300),
(80, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:35:34', 'neu', 300),
(81, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:36:27', 'neu', 300),
(82, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:36:27', 'neu', 300),
(83, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:36:34', 'neu', 300),
(84, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:36:34', 'neu', 300),
(85, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:36:43', 'neu', 300),
(86, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:36:43', 'neu', 300),
(87, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:36:59', 'neu', 300),
(88, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:36:59', 'neu', 300),
(89, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:37:55', 'neu', 300),
(90, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:37:55', 'neu', 300),
(91, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:38:16', 'neu', 300),
(92, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:38:16', 'neu', 300),
(93, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:39:07', 'neu', 300),
(94, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:39:07', 'neu', 300),
(95, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:39:45', 'neu', 300),
(96, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:39:45', 'neu', 300),
(97, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:40:02', 'neu', 300),
(98, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:40:02', 'neu', 300),
(99, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:40:09', 'neu', 300),
(100, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:40:09', 'neu', 300),
(101, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:40:10', 'neu', 300),
(102, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:40:10', 'neu', 300),
(103, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:40:33', 'neu', 300),
(104, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:40:33', 'neu', 300),
(105, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:40:51', 'neu', 300),
(106, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:40:51', 'neu', 300),
(107, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:41:12', 'neu', 300),
(108, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:41:12', 'neu', 300),
(109, 'fawzi.wahba@yahoo.com', 47, 5, 'iwas', '2023-06-06 15:41:28', 'neu', 300),
(110, 'fawzi.wahba@yahoo.com', 47, 6, 'iwas', '2023-06-06 15:41:28', 'neu', 300),
(111, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-07 13:42:37', 'neu', 240),
(112, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', '2023-06-07 13:42:37', 'neu', 150),
(113, 'fawzi.wahba@yahoo.com', 47, 3, 'jordans 3', '2023-06-07 13:42:37', 'neu', 300),
(114, 'fawzi.wahba@yahoo.com', 47, 4, 'jordans 4', '2023-06-07 13:42:37', 'neu', 400),
(115, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-08 13:40:46', 'neu', 240),
(116, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', '2023-06-08 13:40:46', 'neu', 150),
(117, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-08 13:40:46', 'neu', 240),
(118, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-08 13:43:12', 'neu', 240),
(119, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-08 13:45:21', 'neu', 240),
(120, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-08 13:45:43', 'neu', 240),
(121, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', '2023-06-08 13:45:43', 'neu', 150),
(122, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-08 13:46:47', 'neu', 240),
(123, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', '2023-06-08 13:46:47', 'neu', 150),
(124, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-08 20:07:13', 'neu', 240),
(125, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', '2023-06-08 20:07:13', 'neu', 150),
(126, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-11 16:33:55', 'neu', 240),
(127, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-06-11 16:33:55', 'neu', 240),
(128, 'fawzi.wahba@yahoo.com', 47, 3, 'jordans 3', '2023-06-12 13:28:38', 'neu', 300),
(129, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', '2023-06-12 13:28:38', 'neu', 150);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `warenkorb`
--

CREATE TABLE `warenkorb` (
  `id` int(11) NOT NULL,
  `usermail` varchar(255) NOT NULL,
  `fk_person_id` int(11) NOT NULL,
  `fk_produkt_id` int(11) NOT NULL,
  `produkt_name` varchar(255) NOT NULL,
  `produkt_preis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `warenkorb`
--

INSERT INTO `warenkorb` (`id`, `usermail`, `fk_person_id`, `fk_produkt_id`, `produkt_name`, `produkt_preis`) VALUES
(52, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', 150),
(57, 'fawzi.wahba@yahoo.com', 47, 2, 'Jordans grey', 150),
(59, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', 240);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_fk` (`person_fk`),
  ADD KEY `bestellung_erstellen_fk` (`bestellung_erstellen_fk`);

--
-- Indizes für die Tabelle `bestellung_erstellen`
--
ALTER TABLE `bestellung_erstellen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_1` (`produkt_1`),
  ADD KEY `product_id_2` (`produkt_2`),
  ADD KEY `product_id_3` (`produkt_3`),
  ADD KEY `product_id_4` (`produkt_4`),
  ADD KEY `product_id_5` (`produkt_5`),
  ADD KEY `product_id_6` (`produkt_6`),
  ADD KEY `product_id_7` (`produkt_7`),
  ADD KEY `product_id_8` (`produkt_8`),
  ADD KEY `product_id_9` (`produkt_9`),
  ADD KEY `product_id_10` (`produkt_10`),
  ADD KEY `´person_fk` (`person_fk`);

--
-- Indizes für die Tabelle `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_mail` (`usermail`);

--
-- Indizes für die Tabelle `news_beiträge`
--
ALTER TABLE `news_beiträge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_id` (`fk_admin_id`);

--
-- Indizes für die Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `verkaufte_produkte`
--
ALTER TABLE `verkaufte_produkte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_person_id` (`fk_person_id`),
  ADD KEY `fk_produkt_id` (`fk_produkt_id`);

--
-- Indizes für die Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personn_id` (`fk_person_id`),
  ADD KEY `fk_produkt_idd` (`fk_produkt_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `bestellung_erstellen`
--
ALTER TABLE `bestellung_erstellen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT für Tabelle `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT für Tabelle `news_beiträge`
--
ALTER TABLE `news_beiträge`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT für Tabelle `produkte`
--
ALTER TABLE `produkte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT für Tabelle `verkaufte_produkte`
--
ALTER TABLE `verkaufte_produkte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT für Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD CONSTRAINT `bestellung_erstellen_fk` FOREIGN KEY (`bestellung_erstellen_fk`) REFERENCES `bestellung_erstellen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `person_fk` FOREIGN KEY (`person_fk`) REFERENCES `login` (`id`);

--
-- Constraints der Tabelle `bestellung_erstellen`
--
ALTER TABLE `bestellung_erstellen`
  ADD CONSTRAINT `product_id_1` FOREIGN KEY (`produkt_1`) REFERENCES `produkte` (`id`),
  ADD CONSTRAINT `product_id_10` FOREIGN KEY (`produkt_10`) REFERENCES `produkte` (`id`),
  ADD CONSTRAINT `product_id_2` FOREIGN KEY (`produkt_2`) REFERENCES `produkte` (`id`),
  ADD CONSTRAINT `product_id_3` FOREIGN KEY (`produkt_3`) REFERENCES `produkte` (`id`),
  ADD CONSTRAINT `product_id_4` FOREIGN KEY (`produkt_4`) REFERENCES `produkte` (`id`),
  ADD CONSTRAINT `product_id_5` FOREIGN KEY (`produkt_5`) REFERENCES `produkte` (`id`),
  ADD CONSTRAINT `product_id_6` FOREIGN KEY (`produkt_6`) REFERENCES `produkte` (`id`),
  ADD CONSTRAINT `product_id_7` FOREIGN KEY (`produkt_7`) REFERENCES `produkte` (`id`),
  ADD CONSTRAINT `product_id_8` FOREIGN KEY (`produkt_8`) REFERENCES `produkte` (`id`),
  ADD CONSTRAINT `product_id_9` FOREIGN KEY (`produkt_9`) REFERENCES `produkte` (`id`),
  ADD CONSTRAINT `´person_fk` FOREIGN KEY (`person_fk`) REFERENCES `login` (`id`);

--
-- Constraints der Tabelle `news_beiträge`
--
ALTER TABLE `news_beiträge`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`fk_admin_id`) REFERENCES `login` (`id`);

--
-- Constraints der Tabelle `verkaufte_produkte`
--
ALTER TABLE `verkaufte_produkte`
  ADD CONSTRAINT `fk_person_id` FOREIGN KEY (`fk_person_id`) REFERENCES `login` (`id`),
  ADD CONSTRAINT `fk_produkt_id` FOREIGN KEY (`fk_produkt_id`) REFERENCES `produkte` (`id`);

--
-- Constraints der Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  ADD CONSTRAINT `fk_personn_id` FOREIGN KEY (`fk_person_id`) REFERENCES `login` (`id`),
  ADD CONSTRAINT `fk_produkt_idd` FOREIGN KEY (`fk_produkt_id`) REFERENCES `produkte` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
