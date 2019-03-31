-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2019. Már 31. 15:24
-- Kiszolgáló verziója: 5.7.23
-- PHP verzió: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `where_to_go`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `routes`
--

DROP TABLE IF EXISTS `routes`;
CREATE TABLE IF NOT EXISTS `routes` (
  `agency_id` varchar(50) DEFAULT NULL,
  `route_id` varchar(50) NOT NULL,
  `route_short_name` varchar(10) NOT NULL,
  `route_long_name` varchar(100) DEFAULT NULL,
  `route_type` int(11) DEFAULT NULL,
  `route_desc` varchar(100) NOT NULL,
  `route_color` varchar(6) DEFAULT NULL,
  `route_text_color` varchar(6) DEFAULT NULL,
  `processed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`route_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `route_temps`
--

DROP TABLE IF EXISTS `route_temps`;
CREATE TABLE IF NOT EXISTS `route_temps` (
  `agency_id` varchar(50) DEFAULT NULL,
  `route_id` varchar(50) NOT NULL,
  `route_short_name` varchar(10) NOT NULL,
  `route_long_name` varchar(100) DEFAULT NULL,
  `route_type` int(11) DEFAULT NULL,
  `route_desc` varchar(100) NOT NULL,
  `route_color` varchar(6) DEFAULT NULL,
  `route_text_color` varchar(6) DEFAULT NULL,
  `processed` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`route_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `stops`
--

DROP TABLE IF EXISTS `stops`;
CREATE TABLE IF NOT EXISTS `stops` (
  `stop_id` varchar(50) NOT NULL,
  `stop_name` varchar(100) NOT NULL,
  `stop_lat` double NOT NULL,
  `stop_lon` double NOT NULL,
  `stop_code` varchar(50) DEFAULT NULL,
  `location_type` int(11) DEFAULT NULL,
  `parent_station` varchar(50) DEFAULT NULL,
  `wheelchair_boarding` int(11) DEFAULT NULL,
  `stop_direction` int(11) DEFAULT NULL,
  `processed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stop_id`),
  KEY `idx_stops_stop_id` (`stop_id`),
  KEY `idx_stops_stop_name` (`stop_name`),
  KEY `idx_stop_location` (`stop_lat`,`stop_lon`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `stop_temps`
--

DROP TABLE IF EXISTS `stop_temps`;
CREATE TABLE IF NOT EXISTS `stop_temps` (
  `stop_id` varchar(50) NOT NULL,
  `stop_name` varchar(100) NOT NULL,
  `stop_lat` double NOT NULL,
  `stop_lon` double NOT NULL,
  `stop_code` varchar(50) DEFAULT NULL,
  `location_type` int(11) DEFAULT NULL,
  `parent_station` varchar(50) DEFAULT NULL,
  `wheelchair_boarding` int(11) DEFAULT NULL,
  `stop_direction` int(11) DEFAULT NULL,
  `processed` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`stop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `route_id` varchar(50) NOT NULL,
  `trip_id` varchar(50) NOT NULL,
  `service_id` varchar(50) DEFAULT NULL,
  `trip_headsign` varchar(50) DEFAULT NULL,
  `direction_id` int(11) DEFAULT NULL,
  `block_id` varchar(50) DEFAULT NULL,
  `shape_id` varchar(10) DEFAULT NULL,
  `wheelchair_accessible` int(11) DEFAULT NULL,
  `bikes_allowed` int(11) DEFAULT NULL,
  `boarding_door` int(11) DEFAULT NULL,
  `processed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`trip_id`),
  UNIQUE KEY `idx_trips_trip_id` (`trip_id`) USING BTREE,
  KEY `idx_trips_route_id` (`route_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `trip_temps`
--

DROP TABLE IF EXISTS `trip_temps`;
CREATE TABLE IF NOT EXISTS `trip_temps` (
  `route_id` varchar(50) NOT NULL,
  `trip_id` varchar(50) NOT NULL,
  `service_id` varchar(50) DEFAULT NULL,
  `trip_headsign` varchar(50) DEFAULT NULL,
  `direction_id` int(11) DEFAULT NULL,
  `block_id` varchar(50) DEFAULT NULL,
  `shape_id` varchar(10) DEFAULT NULL,
  `wheelchair_accessible` int(11) DEFAULT NULL,
  `bikes_allowed` int(11) DEFAULT NULL,
  `boarding_door` int(11) DEFAULT NULL,
  `processed` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`trip_id`),
  UNIQUE KEY `idx_trip_temps_trip_id` (`trip_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
