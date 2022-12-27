-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 27 Ara 2022, 18:27:15
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
-- Tablo için tablo yapısı `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `MovieId` int(11) NOT NULL AUTO_INCREMENT,
  `MovieName` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Director` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Year` date NOT NULL,
  `Rate` int(11) NOT NULL,
  `Image` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Description` varchar(700) COLLATE utf8_turkish_ci NOT NULL,
  `Current` date NOT NULL,
  PRIMARY KEY (`MovieId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `movies`
--

INSERT INTO `movies` (`MovieId`, `MovieName`, `Director`, `Year`, `Rate`, `Image`, `Description`, `Current`) VALUES
(1, 'The Dark Knight', 'Christopher Nolan', '2022-12-16', 8, '1672083057_dark.jpg', 'The dark knight The dark knightThe dark knightThe dark knightThe dark knightThe dark knightThe dark knightThe dark knightThe dark knightThe dark knightThe dark knight', '2022-12-26'),
(2, 'Reservoir Dogs', 'Tarantino', '2022-12-24', 8, '1672083097_reservoir.jpg', 'Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir ', '2022-12-26'),
(3, 'Kurak Günler', 'Emin Alper', '2022-12-25', 9, '1672083129_kurak.jpg', 'Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı ', '2022-12-26'),
(4, 'DSFIJFISDSFIODS', 'DSOJFIOSOSFHS', '2022-12-10', 8, '1672084598_bizarre.jpg', 'DSFDSODPSJFIOSHJFDIOSDS', '2022-12-26'),
(5, 'dsfdsojdsfıoodshjdıospds', 'sdfdsodıfhsıouhdsıouds', '2022-12-17', 9, '1672159060_bizarre.jpg', 'Falan filan', '2022-12-27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
