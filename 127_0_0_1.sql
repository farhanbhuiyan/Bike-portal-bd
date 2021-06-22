-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 07:00 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike_portal_bd`
--
CREATE DATABASE IF NOT EXISTS `bike_portal_bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bike_portal_bd`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_username` varchar(30) NOT NULL,
  `a_password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_username`, `a_password`) VALUES
('admin', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE `case` (
  `Case_no` varchar(20) NOT NULL,
  `Case_Date` date NOT NULL,
  `Amount` int(5) NOT NULL,
  `u_username_fk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `position` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `Badge_no` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Police_Station` varchar(40) NOT NULL,
  `p_username` varchar(30) NOT NULL,
  `p_password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`Badge_no`, `Name`, `Police_Station`, `p_username`, `p_password`) VALUES
('11223344', 'police vai', 'mirpur', 'police', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_username` varchar(30) NOT NULL,
  `Driving_Licence_no` varchar(15) NOT NULL,
  `u_password` varchar(16) NOT NULL,
  `Phone_number` int(11) NOT NULL,
  `NID` int(17) NOT NULL,
  `Name` text NOT NULL,
  `verification` int(1) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_username`, `Driving_Licence_no`, `u_password`, `Phone_number`, `NID`, `Name`, `verification`, `image`) VALUES
('', '', '', 0, 0, '', 2, ''),
('abid420', '123', '345', 9988, 345, 'abid', 0, '0'),
('ayon', '121212', '12345', 789728373, 87754, 'sabrina ayon', 1, 'FB_IMG_1550687748087.jpg'),
('hasan', '00986', '12345', 998808, 78778, 'hasan', 0, 'FB_IMG_1550687728472.jpg'),
('pavel007', '00998877', '123456', 1683748734, 98765, 'pavel', 0, '0'),
('refatx360', '944', 'abcd', 1521430457, 9987, 'refat', 0, '0'),
('sir', '4444', '1234', 87987, 5555, 'sir', 0, 'FB_IMG_1550687785682.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Serial_no` varchar(50) NOT NULL,
  `Taxtoken_no` varchar(20) NOT NULL,
  `Case_Count` int(1) NOT NULL,
  `Insurance_no` varchar(20) NOT NULL,
  `u_username_fk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Serial_no`, `Taxtoken_no`, `Case_Count`, `Insurance_no`, `u_username_fk`) VALUES
('11223', '1111', 0, '3333', 'refatx360'),
('1234', '334455', 2, '4564', 'abid420'),
('1234567', '99887766', 1, '947347', 'pavel007'),
('44567', '5766', 0, '68', 'hasan'),
('489384', '2989038', 0, '92383', 'ayon'),
('9999', '8888', 3, '4444', 'abid420');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_username`);

--
-- Indexes for table `case`
--
ALTER TABLE `case`
  ADD PRIMARY KEY (`Case_no`),
  ADD KEY `u_username_fk` (`u_username_fk`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`p_username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_username`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Serial_no`),
  ADD KEY `u_username_fk` (`u_username_fk`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case`
--
ALTER TABLE `case`
  ADD CONSTRAINT `case_ibfk_1` FOREIGN KEY (`u_username_fk`) REFERENCES `user` (`u_username`) ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`u_username_fk`) REFERENCES `user` (`u_username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
