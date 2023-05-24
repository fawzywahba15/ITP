-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Mai 2023 um 12:43
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
(102, 'hotel test', 'test', '2023-01-15 10:29:29', 'thumbnails/resized_63c3d5897aa72.png', 31);

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
-- Tabellenstruktur für Tabelle `reservierungen`
--

CREATE TABLE `reservierungen` (
  `id` int(255) NOT NULL,
  `usermail` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `anreise_datum` date NOT NULL,
  `abreise_datum` date NOT NULL,
  `garage` varchar(255) NOT NULL,
  `frühstück` varchar(255) NOT NULL,
  `Tier` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `preis` int(255) DEFAULT NULL,
  `anzahl_nights` int(255) DEFAULT NULL,
  `fk_person_id` int(255) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `reservierungen`
--

INSERT INTO `reservierungen` (`id`, `usermail`, `room_type`, `anreise_datum`, `abreise_datum`, `garage`, `frühstück`, `Tier`, `status`, `preis`, `anzahl_nights`, `fk_person_id`, `timestamp`) VALUES
(157, 'fawzi.wahba123@hotmail.com', 'single room', '2023-01-15', '2023-01-19', 'nein', 'ja', 'nein', 'neu', 440, 4, 31, '2023-01-15 10:23:32'),
(160, 'fawzi.wahba123@hotmail.com', 'single room', '2023-01-15', '2023-01-27', 'ja', 'nein', 'nein', 'neu', 1632, 12, 31, '2023-01-15 11:03:12'),
(164, 'fawzi.wahba123@hotmail.com', 'suite', '2023-01-15', '2023-01-20', 'nein', 'nein', 'ja', 'neu', 1050, 5, 31, '2023-01-15 13:00:52'),
(165, 'fawzi.wahba123@hotmail.com', 'single room', '2023-01-15', '2023-01-18', 'ja', 'nein', 'nein', 'neu', 408, 3, 31, '2023-01-15 13:02:00'),
(166, 'berkkaitan@gmail.com', 'double room', '2023-01-15', '2023-01-28', 'nein', 'nein', 'nein', 'storniert', 1820, 13, 39, '2023-01-15 20:26:57'),
(167, 'berkkaitan@gmail.com', 'double room', '2023-01-15', '2023-01-17', 'ja', 'nein', 'ja', 'neu', 372, 2, 39, '2023-01-15 20:46:46'),
(168, 'berkkaitan@gmail.com', 'suite', '2023-01-15', '2023-01-27', 'nein', 'ja', 'ja', 'neu', 2760, 12, 39, '2023-01-15 20:47:00'),
(169, 'berkkaitan@gmail.com', 'double room', '2023-01-15', '2023-01-22', 'ja', 'ja', 'ja', 'neu', 1442, 7, 39, '2023-01-15 20:47:51'),
(170, 'chris.bumstead@gmail.com', 'double room', '2023-01-15', '2023-01-22', 'ja', 'ja', 'ja', 'neu', 1442, 7, 32, '2023-01-15 20:49:25'),
(171, 'chris.bumstead@gmail.com', 'suite', '2023-01-27', '2023-01-29', 'ja', 'ja', 'ja', 'neu', 532, 2, 32, '2023-01-15 20:49:49'),
(172, 'chris.bumstead@gmail.com', 'suite', '2023-12-31', '2024-01-16', 'ja', 'nein', 'ja', 'neu', 3936, 16, 32, '2023-01-15 20:50:25'),
(173, 'danijeladjokic@gmx.at', 'double room', '2023-01-15', '2023-01-18', 'ja', 'ja', 'ja', 'neu', 618, 3, 30, '2023-01-15 20:55:47'),
(174, 'danijeladjokic@gmx.at', 'suite', '2023-01-15', '2023-01-27', 'ja', 'nein', 'ja', 'neu', 2952, 12, 30, '2023-01-15 20:55:59'),
(175, 'danijeladjokic@gmx.at', 'double room', '2023-01-15', '2023-01-26', 'ja', 'nein', 'ja', 'neu', 2046, 11, 30, '2023-01-15 20:56:11');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zimmer`
--

CREATE TABLE `zimmer` (
  `id` int(255) NOT NULL,
  `zimmer_kategorie` varchar(255) NOT NULL,
  `anzahl` int(255) NOT NULL,
  `preis` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `zimmer`
--

INSERT INTO `zimmer` (`id`, `zimmer_kategorie`, `anzahl`, `preis`) VALUES
(0, 'single room', 10, 100),
(1, 'double room', 20, 140),
(2, 'suite', 5, 200);

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
-- Indizes für die Tabelle `reservierungen`
--
ALTER TABLE `reservierungen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personen_id` (`fk_person_id`);

--
-- Indizes für die Tabelle `zimmer`
--
ALTER TABLE `zimmer`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT für Tabelle `produkte`
--
ALTER TABLE `produkte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `reservierungen`
--
ALTER TABLE `reservierungen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `news_beiträge`
--
ALTER TABLE `news_beiträge`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`fk_admin_id`) REFERENCES `login` (`id`);

--
-- Constraints der Tabelle `reservierungen`
--
ALTER TABLE `reservierungen`
  ADD CONSTRAINT `fk_personen_id` FOREIGN KEY (`fk_person_id`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
