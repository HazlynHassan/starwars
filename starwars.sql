-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2016 at 01:20 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `starwars`
--

-- --------------------------------------------------------

--
-- Table structure for table `starships`
--

CREATE TABLE IF NOT EXISTS `starships` (
  `id` int(5) NOT NULL,
  `model` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `crew` int(20) NOT NULL,
  `edited` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `starships`
--

INSERT INTO `starships` (`id`, `model`, `manufacturer`, `crew`, `edited`) VALUES
(5, 'Sentinel-class landing craft', 'Sienar Fleet Systems, Cyngus Spaceworks', 5, '2014-12-22T17:35:44.431407Z'),
(9, 'DS-1 Orbital Battle Station', 'Imperial Department of Military Research, Sienar F', 342953, '2014-12-22T17:35:44.452589Z'),
(10, 'YT-1300 light freighter', 'Corellian Engineering Corporation', 4, '2014-12-22T17:35:44.464156Z'),
(11, 'BTL Y-wing', 'Koensayr Manufacturing', 4, '2014-12-22T17:35:44.479706Z'),
(15, 'Executor-class star dreadnought', 'Kuat Drive Yards, Fondor Shipyards', 279144, '2014-12-22T17:35:44.638231Z');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `starships`
--
ALTER TABLE `starships`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
