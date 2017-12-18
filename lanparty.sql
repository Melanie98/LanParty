-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 dec 2017 om 11:07
-- Serverversie: 10.1.13-MariaDB
-- PHP-versie: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lanparty`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `application`
--

CREATE TABLE `application` (
  `applicationId` int(11) NOT NULL,
  `invoiceId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `applicationPayed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `application`
--

INSERT INTO `application` (`applicationId`, `invoiceId`, `userId`, `applicationPayed`) VALUES
(2, 1, 1, 0),
(3, 1, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoice`
--

CREATE TABLE `invoice` (
  `invoiceId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `invoiceAmount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `invoice`
--

INSERT INTO `invoice` (`invoiceId`, `userId`, `invoiceAmount`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `participate`
--

CREATE TABLE `participate` (
  `userId` int(11) NOT NULL,
  `tournooiId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `participate`
--

INSERT INTO `participate` (`userId`, `tournooiId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tournooi`
--

CREATE TABLE `tournooi` (
  `tournooiId` int(11) NOT NULL,
  `tournooiName` varchar(256) NOT NULL,
  `tournooiDesc` text NOT NULL,
  `tournooiMax` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tournooi`
--

INSERT INTO `tournooi` (`tournooiId`, `tournooiName`, `tournooiDesc`, `tournooiMax`) VALUES
(1, 'League of Legends', 'tournooiDesc', 20),
(2, 'Overwatch', 'Soldiers. Scientists. Adventurers. Oddities. \n\nIn a time of global crisis, an international task force of heroes banded together to restore peace to a war-torn world: OVERWATCH.\n\nOverwatch ended the crisis, and helped maintain peace in the decades that followed, inspiring an era of exploration, innovation, and discovery. But, after many years, Overwatchâ€™s influence waned, and it was eventually disbanded.\n\nNow, conflict is rising across the world again, and the call has gone out to heroes old and new. Are you with us?', 50);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userEmail` varchar(256) NOT NULL,
  `userSurname` varchar(256) NOT NULL,
  `userLastName` varchar(256) NOT NULL,
  `userStudentNr` int(7) NOT NULL,
  `userPassword` varchar(256) NOT NULL,
  `userPhoto` varchar(256) NOT NULL,
  `userCB` tinyint(1) NOT NULL DEFAULT '0',
  `userRights` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userId`, `userEmail`, `userSurname`, `userLastName`, `userStudentNr`, `userPassword`, `userPhoto`, `userCB`, `userRights`) VALUES
(1, 'ahermsen0003@student.landstede.nl', 'Anouk', 'Hermsen', 2238341, 'fc5124f4cd99b1e16f265887eff82994', '', 0, 0),
(2, 'konradkajzar@gmail.com', 'Kajzar', 'Kajzar', 8425410, 'cb19cb88a75f0fa37023b84d1058acd6', '4887589-heart-picture.png', 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applicationId`),
  ADD KEY `invoiceId` (`invoiceId`),
  ADD KEY `userId` (`userId`);

--
-- Indexen voor tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceId`),
  ADD KEY `userId` (`userId`);

--
-- Indexen voor tabel `participate`
--
ALTER TABLE `participate`
  ADD KEY `userId` (`userId`),
  ADD KEY `tournooiId` (`tournooiId`);

--
-- Indexen voor tabel `tournooi`
--
ALTER TABLE `tournooi`
  ADD PRIMARY KEY (`tournooiId`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `application`
--
ALTER TABLE `application`
  MODIFY `applicationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `tournooi`
--
ALTER TABLE `tournooi`
  MODIFY `tournooiId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`invoiceId`) REFERENCES `invoice` (`invoiceId`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Beperkingen voor tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Beperkingen voor tabel `participate`
--
ALTER TABLE `participate`
  ADD CONSTRAINT `participate_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `participate_ibfk_2` FOREIGN KEY (`tournooiId`) REFERENCES `tournooi` (`tournooiId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
