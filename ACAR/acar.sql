-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2018 at 03:37 PM
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
-- Database: `acar`
--

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `Facultate` varchar(20) NOT NULL,
  `An` int(11) NOT NULL,
  `Semestru` int(11) NOT NULL,
  `Materie` varchar(20) NOT NULL,
  `Profesor` varchar(20) NOT NULL,
  `Review` varchar(1000) NOT NULL,
  `ID` mediumint(9) NOT NULL,
  `path_img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`Facultate`, `An`, `Semestru`, `Materie`, `Profesor`, `Review`, `ID`, `path_img`) VALUES
('informatica', 2, 2, 'Matematica', 'Tiplea', 'asasavsavsavsdsavsdv', 4, NULL),
('a', 0, 0, 'a', 'a', 'a', 6, NULL),
('a', 0, 0, 'a', 'a', 'a', 7, '800373'),
('a', 0, 0, 'a', 'a', 'asda', 8, '386339'),
('zz', 0, 0, 'sdsa', 'asdasa', 'sdas', 9, '939018');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `parola` varchar(65) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `parola`, `email`) VALUES
('rafa', '67023cda456b9844abf8a9a3992799093bbfb69f', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `ID` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
