-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2023. Aug 17. 11:36
-- Kiszolgáló verziója: 8.0.17
-- PHP verzió: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `gyakorlas5`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kviz`
--

CREATE TABLE `kviz` (
  `id` int(11) NOT NULL,
  `kerdes` text,
  `valasz1` varchar(60) DEFAULT NULL,
  `valasz2` varchar(60) DEFAULT NULL,
  `valasz3` varchar(60) DEFAULT NULL,
  `valasz4` varchar(60) DEFAULT NULL,
  `jovalasz` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `kviz`
--

INSERT INTO `kviz` (`id`, `kerdes`, `valasz1`, `valasz2`, `valasz3`, `valasz4`, `jovalasz`) VALUES
(1, 'Az alábbiak közül melyik nem a madarak osztályába tartozik?', 'Bölömbika', 'Fülemüle', 'Harkály', 'Jak', 'Jak');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kviz`
--
ALTER TABLE `kviz`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kviz`
--
ALTER TABLE `kviz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
