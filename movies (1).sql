-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 28 Ara 2022, 20:09:18
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
  `Owner` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`MovieId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `movies`
--

INSERT INTO `movies` (`MovieId`, `MovieName`, `Director`, `Year`, `Rate`, `Image`, `Description`, `Current`, `Owner`, `Status`) VALUES
(1, 'The Dark Knight Rises', 'Christopher Nolan', '2022-12-16', 8, '1672241220_dark.jpg', 'The dark knight The dark knightThe dark knightThe dark knightThe dark knightThe dark knightThe dark knightThe dark knightThe dark knightThe dark knightThe dark knight', '2022-12-26', 'Ahmet', 1),
(2, 'Reservoir Dogs', 'Tarantino', '2022-12-24', 8, '1672083097_reservoir.jpg', 'Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir Reservoir ', '2022-12-26', '', 1),
(3, 'Kurak Günler', 'Emin Alper', '2022-12-25', 9, '1672083129_kurak.jpg', 'Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı Savcı ', '2022-12-26', 'Ahmet', 1),
(7, 'LightHouse', 'Robert Eggers', '2015-02-12', 8, '1672238059_lighthouse.jpg', 'The Lighthouse is a 2019 film directed and produced by Robert Eggers, from a screenplay he co-wrote with his brother Max Eggers. It stars Willem Dafoe and Robert Pattinson as nineteenth-century wickies (lighthouse keepers) in turmoil after being marooned at a remote New England outpost by a wild storm.', '2022-12-28', 'Umut', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
