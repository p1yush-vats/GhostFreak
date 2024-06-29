-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2024 at 09:20 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(35) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'piyushvats112', 'piyushvats112@gmail.com', 'piyush1111'),
(5, 'piyushvats469', 'piyushvats469@gmail.com', 'piyush123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(10, 'piyush vats', 'piyushvats469@gmail.com', 'this is a dynamically created website\r\n'),
(11, 'piyush vats', 'dsf@gmai.vom', 'sdfjsjf\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
CREATE TABLE IF NOT EXISTS `stories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `author`, `title`, `content`, `published`) VALUES
(1, 'Jatin Vats', 'The Unrest Stop', 'I was driving across country with my mom and sister when I was 16 and my sister was 20. It was late, but we were well rested still and alert. We were driving along an interstate and needed gas and a bathroom break, so we stopped at the only rest stop in 200 miles. There was a van full of teenagers on a road trip at the gas station, as well as a small grey car parked at the pump in front of us with two young men standing still outside of it.<br>When we got there everything felt wrong. We\'d been on the road for days and seen many rest stops at night and had never been afraid until then. My mom and sister went inside and I stayed in the car. I heard the teenagers say they were creeped out and couldn\'t get the pump to work, and they left in a hurry. I was watching the car in front of us, and the two men had not moved at all. Not an inch. They weren\'t talking. They weren\'t on phones. They were just standing there, still as stone.<br> My sister and mom came running back out to the car and when they got in, the two men slowly turned to look at us while not moving or pivoting the rest of their bodies, and I swear to fucking shit, we all saw the same thing - they had eyes dark as pitch and empty. Truly empty. Not black, not reflecting any light at all, just a void.<br> We sped out of there and didn’t stop until we were in the next city. The worst thing about the entire experience? We couldn\'t find the place on any map. We knew exactly which spot on the interstate to look, and we couldn\'t find it on Google maps or any paper map we had. We even asked locals about the creepy gas station out on that stretch of road and got only confused looks. We\'ve traveled on that interstate since, and there is no rest stop', 1),
(10, 'dsfbh', 'dsjbfhsd', 'dsjbfhsdf', 0),
(9, 'sbfhdsf', 'sdfjds', 'sdjbfhds', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(35) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`) VALUES
(5, 'piyushvats469', 'piyush123', 'piyush vats', 'piyushvats469@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
