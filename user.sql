-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 12 Ara 2022, 13:33:54
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `project`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Uid` int(11) NOT NULL,
  `Email` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Name` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `UserName` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Password` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `City` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `District` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Address` varchar(30) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`Uid`, `Email`, `Name`, `UserName`, `Password`, `City`, `District`, `Address`) VALUES
(1, 'Movielover@gmail.com', 'Jane', 'Movielover', 'Bishop', '', '', ''),
(2, 'Cinefil6263@gmail.com', 'Umut ', 'Cinefil', '123456', 'ANKARA', 'Altındağ', 'cucu sok./ falan mah.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
