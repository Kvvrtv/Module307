-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Feb 2020 um 11:28
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tieinternational`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event`
--

CREATE TABLE `event` (
  `IDEvent` int(11) NOT NULL COMMENT 'PK',
  `Datum` date NOT NULL COMMENT 'dd.mm.yyyy',
  `Beruf` varchar(28) NOT NULL COMMENT 'Infomatiker EFZ Applikation/Mediamtiker EFZ',
  `freie Plätze` varchar(9) NOT NULL COMMENT '''Zahl'' von ''Zahl'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personen`
--

CREATE TABLE `personen` (
  `IDPerson` int(11) NOT NULL COMMENT 'PK',
  `Geschlecht` varchar(7) DEFAULT NULL COMMENT 'Frau/Mann/anderes',
  `Nachname` varchar(80) NOT NULL,
  `Vorname` varchar(80) NOT NULL,
  `Geburtstag` date NOT NULL COMMENT 'dd.mm.yyyy',
  `Schule` varchar(80) NOT NULL,
  `Klasse` varchar(21) NOT NULL,
  `Niveau` varchar(5) NOT NULL,
  `PLZ` int(11) NOT NULL COMMENT '4 stellig',
  `Ort` varchar(80) NOT NULL,
  `Strasse` varchar(80) NOT NULL,
  `Hausnummer` varchar(5) NOT NULL,
  `Zusatz Strasse` varchar(80) DEFAULT NULL,
  `Telefon` varchar(17) NOT NULL,
  `E-Mail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zusammenfassung`
--

CREATE TABLE `zusammenfassung` (
  `PersonID` int(11) NOT NULL COMMENT 'FK',
  `EventID` int(11) NOT NULL COMMENT 'FK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`IDEvent`);

--
-- Indizes für die Tabelle `personen`
--
ALTER TABLE `personen`
  ADD PRIMARY KEY (`IDPerson`);

--
-- Indizes für die Tabelle `zusammenfassung`
--
ALTER TABLE `zusammenfassung`
  ADD KEY `EventID` (`EventID`),
  ADD KEY `PersonID` (`PersonID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `event`
--
ALTER TABLE `event`
  MODIFY `IDEvent` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK';

--
-- AUTO_INCREMENT für Tabelle `personen`
--
ALTER TABLE `personen`
  MODIFY `IDPerson` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK';

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `zusammenfassung`
--
ALTER TABLE `zusammenfassung`
  ADD CONSTRAINT `zusammenfassung_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`IDEvent`),
  ADD CONSTRAINT `zusammenfassung_ibfk_2` FOREIGN KEY (`PersonID`) REFERENCES `personen` (`IDPerson`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
