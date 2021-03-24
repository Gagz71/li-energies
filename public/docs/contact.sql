-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2020 at 12:16 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `li_energies`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_date` datetime NOT NULL,
  `subject` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `phone`, `city`, `zip_code`, `contact_date`, `subject`, `message`) VALUES
(1, 'amigos', 'adios', 'adios.amigos@amigos.fr', '0754895541', 'Autun', '71400', '2020-08-24 14:59:01', 'Adios Amigos', 'Hola jayyyyy'),
(3, 'Karl', 'Benz', 'karl.benz@mercedes.amg', '0547887410', 'Stuttgart', '54788', '2020-08-24 15:02:04', 'Deutshe kalitat', 'Mercedes'),
(4, 'kjhk', 'kjh', 'tes@d.h', '0514779632', 'allez', '75441', '2020-08-24 15:09:13', 'lcjkjd', 'hdiuhioueio'),
(5, 'jdsfh', 'sjdlkg', 'dmanhouli@gmail.com', '0777735742', 'Montceau-les-Mines', '71300', '2020-08-24 15:21:16', 'allez marche', 'stpppppp'),
(6, 'yhggh', 'adios', 'a@k.l', '0514220100', 'lyon', '69001', '2020-08-24 15:27:15', 'iuhiuh', 'ttygh uyb'),
(7, 'salut', 'manhs', 'oizef@h.jj', '0754888874', 'Montceau-les-Mines', '71300', '2020-08-24 15:48:31', 'salutsalutsalut', 'qsojfoizfa'),
(8, 'ca v', 'ayooo', 't@ta.race', '5478663214', 'Bourg-en-bresse', '01458', '2020-08-24 16:03:23', 'stp marche', 'allllleeeeeez'),
(9, 'Douns', 'manhs', 'dounia@stp.marche', '0321457785', 'Ici', '34511', '2020-08-24 16:36:34', 'Allez cette fois', 'Maaaarche'),
(10, 'marche', 'alleeeez', 'maintentant@faut.marcher', '0145774120', 'Autun', '71400', '2020-08-24 16:39:54', 'allelz', 'yen a marre'),
(11, 'Neymar', 'Jean', 'mdr@dahkous.fr', '0154789962', 'Montceau-les-Mines', '71300', '2020-08-24 16:43:01', 'Allez encore', 'vas y'),
(12, 'Perceval', 'De Galles', 'Percy@kaamelott.fr', '0101010101', 'La Taverne', '34000', '2020-08-25 13:04:30', 'Produire son électricité', 'Bonjour, \r\nje souhaiterai avoir de plus amples informations concernant les tarifs de votre offre.\r\nMerci de bien vouloir me recontacter. \r\n\r\nCordialement.'),
(13, 'Karadoc', 'De Vannes', 'c@g.h', '0465874413', 'La Taverne', '71400', '2020-08-25 19:23:04', 'dddd', 'dddddd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4C62E638E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_4C62E638444F97DD` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
