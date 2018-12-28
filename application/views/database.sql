-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2018 at 06:26 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminCode`) VALUES
(101);

-- --------------------------------------------------------

--
-- Table structure for table `auther`
--

CREATE TABLE `auther` (
  `AutherId` int(11) NOT NULL,
  `AutherName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auther`
--

INSERT INTO `auther` (`AutherId`, `AutherName`) VALUES
(1, 'asma'),
(2, 'mohamed'),
(3, 'book'),
(4, 'asma'),
(5, 'book'),
(6, 'hocine'),
(7, 'bb'),
(8, 'dadi'),
(9, 'younes'),
(10, 'mohamed'),
(11, 'mohamed');

-- --------------------------------------------------------

--
-- Table structure for table `auther_has_contant`
--

CREATE TABLE `auther_has_contant` (
  `auther_AutherId` int(11) NOT NULL,
  `contant_IsbnNnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auther_has_contant`
--

INSERT INTO `auther_has_contant` (`auther_AutherId`, `contant_IsbnNnumber`) VALUES
(1, 56),
(1, 57),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 123),
(1, 125),
(2, 0),
(2, 30),
(2, 32),
(2, 48),
(2, 50),
(2, 56),
(2, 60),
(2, 61),
(3, 45),
(3, 54),
(4, 55),
(4, 58),
(4, 59),
(4, 65),
(6, 47),
(6, 49),
(6, 50),
(6, 53),
(6, 57),
(6, 59),
(6, 65),
(7, 49),
(7, 53),
(7, 57),
(7, 59),
(7, 65);

-- --------------------------------------------------------

--
-- Table structure for table `contant`
--

CREATE TABLE `contant` (
  `IsbnNnumber` int(11) NOT NULL,
  `ItemTitle` varchar(100) NOT NULL,
  `NumberPage` int(11) NOT NULL,
  `bestcollection` varchar(45) NOT NULL,
  `PrintDay` date NOT NULL,
  `DateofPublishing` date NOT NULL,
  `isbnNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contant`
--

INSERT INTO `contant` (`IsbnNnumber`, `ItemTitle`, `NumberPage`, `bestcollection`, `PrintDay`, `DateofPublishing`, `isbnNumber`) VALUES
(70, 'dz', 200, 'yes', '2018-12-05', '2018-12-11', 25),
(71, 'hhhhhhh', 200, 'no', '2018-12-05', '2018-12-10', 25);

-- --------------------------------------------------------

--
-- Table structure for table `edition`
--

CREATE TABLE `edition` (
  `EditionNumber` int(11) DEFAULT NULL,
  `EditionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edition`
--

INSERT INTO `edition` (`EditionNumber`, `EditionId`) VALUES
(1, 1),
(5, 2),
(1, 3),
(5, 4),
(3, 5),
(25, 6),
(25, 7),
(25, 8),
(25, 9),
(56, 10),
(1, 11),
(55, 12),
(55, 13),
(54, 14),
(11, 15);

-- --------------------------------------------------------

--
-- Table structure for table `edition_has_contant`
--

CREATE TABLE `edition_has_contant` (
  `edition_EditionId` int(11) NOT NULL,
  `contant_IsbnNnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edition_has_contant`
--

INSERT INTO `edition_has_contant` (`edition_EditionId`, `contant_IsbnNnumber`) VALUES
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 123),
(1, 125),
(2, 30),
(2, 31),
(2, 48),
(2, 50),
(4, 34),
(4, 45),
(4, 47),
(4, 54),
(5, 48),
(5, 50),
(11, 51),
(11, 52),
(11, 55),
(12, 57),
(12, 59),
(12, 65),
(13, 53),
(14, 59),
(14, 62),
(14, 65);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `FormType` varchar(100) NOT NULL,
  `FormId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`FormType`, `FormId`) VALUES
('book', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_has_contant`
--

CREATE TABLE `form_has_contant` (
  `form_FornId` int(11) NOT NULL,
  `contant_IsbnNnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_has_contant`
--

INSERT INTO `form_has_contant` (`form_FornId`, `contant_IsbnNnumber`) VALUES
(1, 63),
(1, 64),
(1, 65),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 123),
(1, 125);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `GenreId` int(11) NOT NULL,
  `GenerType` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GenreId`, `GenerType`) VALUES
(1, 'general'),
(2, 'science'),
(3, 'histoire'),
(4, 'geography'),
(5, 'medecin'),
(6, 'geography'),
(7, 'general');

-- --------------------------------------------------------

--
-- Table structure for table `genre_has_contant`
--

CREATE TABLE `genre_has_contant` (
  `genre_GenreId` int(11) NOT NULL,
  `contant_IsbnNnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre_has_contant`
--

INSERT INTO `genre_has_contant` (`genre_GenreId`, `contant_IsbnNnumber`) VALUES
(1, 64),
(1, 65),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 123),
(2, 32),
(2, 34),
(2, 45),
(2, 47),
(2, 56),
(2, 61),
(2, 125),
(3, 54),
(4, 56),
(4, 62);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(250) NOT NULL,
  `useremail` text NOT NULL,
  `password` text NOT NULL,
  `username` text NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `useremail`, `password`, `username`, `name`) VALUES
(1, 'asma@gmail.com', '123', 'asma11', 'asma'),
(2, 'asma@gmail.com', '123456', 'cazibouche', 'asmazibouche'),
(3, 'dadi@yahoo.com', 'dadichou', 'dadi44', 'dadi '),
(4, 'aya@gmail.com', '123', 'aya123', 'aya'),
(5, 'hocine@hot.com', '123456', 'hocine', 'hocine'),
(6, 'hocine@hot.com', '123456', 'hocine', 'hocine'),
(7, 'hocine@hot.com', '123456', 'hocine', 'hocine'),
(8, 'younes@yahoo.com', '123456', 'younes', 'younes'),
(9, 'asmazibouche', 'asma11', 'dadichou', 'asma@yahoo.com'),
(10, 'asmazibouche@yahoo.com', 'dadichou', 'asma11', 'asma zibouche '),
(11, 'aya@gmail.com', '1997', 'aya1997', 'aya'),
(12, 'aya@gmail.com', '1997', 'aya1997', 'aya'),
(13, 'aya@gmail.com', '123', 'aya12', 'aya');

-- --------------------------------------------------------

--
-- Table structure for table `user12`
--

CREATE TABLE `user12` (
  `UserId` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `UserEmail` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user12`
--

INSERT INTO `user12` (`UserId`, `Name`, `Password`, `Username`, `UserEmail`) VALUES
(1, 'asma', '123', 'asma11', 'asma@gmail.com'),
(2, 'dadi', 'dadichou', 'dadi44', 'd@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminCode`);

--
-- Indexes for table `auther`
--
ALTER TABLE `auther`
  ADD PRIMARY KEY (`AutherId`);

--
-- Indexes for table `auther_has_contant`
--
ALTER TABLE `auther_has_contant`
  ADD PRIMARY KEY (`auther_AutherId`,`contant_IsbnNnumber`);

--
-- Indexes for table `contant`
--
ALTER TABLE `contant`
  ADD PRIMARY KEY (`IsbnNnumber`);

--
-- Indexes for table `edition`
--
ALTER TABLE `edition`
  ADD PRIMARY KEY (`EditionId`);

--
-- Indexes for table `edition_has_contant`
--
ALTER TABLE `edition_has_contant`
  ADD PRIMARY KEY (`edition_EditionId`,`contant_IsbnNnumber`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`FormId`);

--
-- Indexes for table `form_has_contant`
--
ALTER TABLE `form_has_contant`
  ADD PRIMARY KEY (`form_FornId`,`contant_IsbnNnumber`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GenreId`);

--
-- Indexes for table `genre_has_contant`
--
ALTER TABLE `genre_has_contant`
  ADD PRIMARY KEY (`genre_GenreId`,`contant_IsbnNnumber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user12`
--
ALTER TABLE `user12`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auther`
--
ALTER TABLE `auther`
  MODIFY `AutherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contant`
--
ALTER TABLE `contant`
  MODIFY `IsbnNnumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `edition`
--
ALTER TABLE `edition`
  MODIFY `EditionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `FormId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user12`
--
ALTER TABLE `user12`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
