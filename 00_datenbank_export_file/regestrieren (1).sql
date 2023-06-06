-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Jun 2023 um 13:40
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
(47, 'wahba', 'fawzy', 'fawzi.wahba@yahoo.com', '$2y$10$sqLPGN.8kCml6K1OSs0Bp.TVSQFa8dOMIIBEGX4MObMVlfVhPP0Xm', '2023-05-13', 1, 'aktiv');

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
  `beschreibung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `produkte`
--

INSERT INTO `produkte` (`id`, `name`, `preis`, `pfad`, `beschreibung`) VALUES
(1, 'Jordan 1 Royal Blue', 240, '../zzz/images/download_1.jpg', 'beschreibung'),
(2, 'Jordans grey', 150, '../zzz/images/download_2.jpg', 'asdlfk'),
(3, 'jordans 3', 300, '../zzz/images/download_3.jpg', 'kasfdl'),
(4, 'jordans 4', 400, '../zzz/images/download_4.jpg', 'kasfdl'),
(5, 'iwas', 300, 'alksdf', 'askdlf'),
(6, 'iwas', 300, 'alksdf', 'askdlf'),
(7, 'iwas', 300, 'alksdf', 'askdlf'),
(8, 'iwas', 300, 'alksdf', 'askdlf'),
(9, 'iwas', 300, 'alksdf', 'askdlf'),
(10, 'iwas', 300, 'alksdf', 'askdlf'),
(11, 'iwas', 300, 'alksdf', 'askdlf'),
(12, 'iwas', 300, 'alksdf', 'askdlf'),
(13, 'iwas', 300, 'alksdf', 'askdlf'),
(14, 'iwas', 300, 'alksdf', 'askdlf'),
(15, 'iwas', 300, 'alksdf', 'askdlf'),
(16, 'iwas', 300, 'alksdf', 'askdlf');

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
(26, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-05-24 18:49:36', 'storniert', 240),
(27, 'fawzi.wahba@yahoo.com', 47, 3, 'jordans 3', '2023-05-27 17:35:29', 'storniert', 300),
(28, 'fawzi.wahba@yahoo.com', 47, 1, 'Jordan 1 Royal Blue', '2023-05-27 17:35:36', 'storniert', 240),
(29, 'fawzi.wahba@yahoo.com', 47, 4, 'jordans 4', '2023-05-27 17:35:33', 'storniert', 400);

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
-- Indizes der exportierten Tabellen
--

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
-- AUTO_INCREMENT für Tabelle `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT für Tabelle `news_beiträge`
--
ALTER TABLE `news_beiträge`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT für Tabelle `produkte`
--
ALTER TABLE `produkte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `verkaufte_produkte`
--
ALTER TABLE `verkaufte_produkte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT für Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints der exportierten Tabellen
--

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
