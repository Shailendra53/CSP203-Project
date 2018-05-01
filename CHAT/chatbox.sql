-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2018 at 03:38 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `msg`) VALUES
(0, 'asd', 'asd'),
(0, 'Ben', 'Ben'),
(0, 'Ben', 'Ben'),
(0, 'Ben', 'Ben'),
(0, 'Harry', 'Harry'),
(0, 'harry', 'harry'),
(0, 'Harry', 'Harry'),
(0, 'ghh', 'ghh'),
(0, 'asd', 'sdkjasjdk'),
(0, 'Ben', 'Hey'),
(0, 'Ben', 'Hello Doctor...I am Suffering from cough.'),
(0, 'Rajesh', 'Hello'),
(0, 'Ben', 'can you prefer me some medicines'),
(0, 'Ben', 'Gentle reminder'),
(0, 'Rajesh', 'We have to check and conduct few tests. So plz be available.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
