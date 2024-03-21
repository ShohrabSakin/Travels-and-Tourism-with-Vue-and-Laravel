-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 07:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `react`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookid` varchar(200) NOT NULL,
  `pkgid` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Number` varchar(100) NOT NULL,
  `NID` varchar(100) NOT NULL,
  `chooseGuests` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `chooseDestination` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookid`, `pkgid`, `type`, `Name`, `Number`, `NID`, `chooseGuests`, `date`, `chooseDestination`) VALUES
('38f04e6a-e035-11ee-8b9f-1c1b0d2e42f8', 'none', 'none', 'k', '5', 'none', '2', '2024-03-29', 'Italy, Roma'),
('6287883a-e028-11ee-859b-1c1b0d2e42f8', 'none', 'none', 'xxx', '010', 'none', '2', '2024-03-27', 'Engaland, London'),
('B1', 'P1', 'Personal', 'Abir', '0791756441', 'N1', '3', '2023-09-05', 'Switzerland'),
('B2', 'P2', 'Personal', 'Shahed', '0791756441', 'N2', '3', '2023-09-05', 'Switzerland'),
('B3', 'P3', 'Religion', 'Murad', '0124252525', 'N3', '2', '2023-09-14', 'KSA');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` varchar(50) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`, `picture`) VALUES
('C1', 'Adventure Travel', 'V9.jpg'),
('C2', 'Business Trip', 'V2.jpg'),
('C3', 'Cultural Travel', 'CULTURAL.jpg'),
('C4', 'Holiday Camps', 'VP3.jpg'),
('C5', 'Migration', 'MIGRATION.jpg'),
('C6', 'Hajj-Umra', 'V11.jpg'),
('C7', 'none', 'V11.jpg'),
('C8', 'none2', 'V11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `bookid` varchar(50) NOT NULL,
  `date` varchar(30) NOT NULL,
  `fromdate` varchar(30) NOT NULL,
  `todate` varchar(30) NOT NULL,
  `roomno` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `totalservice` varchar(100) NOT NULL,
  `linetotal` varchar(100) NOT NULL,
  `linediscount` varchar(100) NOT NULL,
  `linenet` varchar(100) NOT NULL,
  `linepaid` varchar(100) NOT NULL,
  `linedue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`bookid`, `date`, `fromdate`, `todate`, `roomno`, `price`, `day`, `total`, `totalservice`, `linetotal`, `linediscount`, `linenet`, `linepaid`, `linedue`) VALUES
('B1', '02/19/2024', '2023-02-02', '2023-02-06', 'R1', '20000', '80000', '80000', '40500', '120500', '500', '120000', '120000', '0'),
('B2', '03/05/2024', '2023-04-03', '2023-04-07', 'R2', '30000', '120000', '120000', '20500', '140500', '5000', '135500', '135500', '0'),
('B3', '03/13/2024', '2023-04-03', '2023-04-09', 'R3', '50000', '300000', '300000', '500', '300500', '500', '300000', '30000', '270000');

-- --------------------------------------------------------

--
-- Table structure for table `feecollection`
--

CREATE TABLE `feecollection` (
  `collectionid` varchar(50) NOT NULL,
  `bookingdate` date NOT NULL,
  `date` date DEFAULT NULL,
  `bookid` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feecollection`
--

INSERT INTO `feecollection` (`collectionid`, `bookingdate`, `date`, `bookid`, `Name`, `amount`) VALUES
('087c7299-da98-11ee-b7db-1c1b0d2e42f8', '2023-09-14', '2024-03-05', 'B3', 'Murad', '400'),
('095bc54e-af77-11ee-9fb0-1c1b0d2e42f8', '2023-09-05', '2024-01-10', 'B1', 'Abir', '1000'),
('109ef225-da98-11ee-b7db-1c1b0d2e42f8', '2023-09-14', '2024-03-05', 'B2', 'Murad', '1000'),
('14238e45-e02d-11ee-8b9f-1c1b0d2e42f8', '2023-09-14', '2024-03-12', 'B3', '', '10'),
('1ade4129-b8ce-11ee-a9b0-1c1b0d2e42f8', '2023-09-14', '2024-01-22', 'B3', 'Murad', '1600'),
('1b46e332-e02d-11ee-8b9f-1c1b0d2e42f8', '2023-09-14', '2024-03-12', 'B2', '', '25'),
('1e0b9fc9-af75-11ee-9fb0-1c1b0d2e42f8', '2023-09-14', '2024-01-10', 'B3', 'Murad', '10000'),
('207b6156-b8ce-11ee-a9b0-1c1b0d2e42f8', '2023-09-14', '2024-01-22', 'B3', 'Murad', '2500'),
('29648fad-c3da-11ee-b3fe-1c1b0d2e42f8', '2023-12-31', '2024-02-05', 'f6921338-c3d9-11ee-b3fe-1c1b0d2e42f8', 'ddd', '6000'),
('3079f6d8-c3da-11ee-b3fe-1c1b0d2e42f8', '2023-12-31', '2024-02-05', 'f6921338-c3d9-11ee-b3fe-1c1b0d2e42f8', 'ddd', '2000'),
('3d108ac9-af76-11ee-9fb0-1c1b0d2e42f8', '2023-09-14', '2024-01-10', 'B3', 'Murad', '2000'),
('57a65405-b74f-11ee-8e90-1c1b0d2e42f8', '2023-09-05', '2024-01-20', 'B1', 'Abir', '9000'),
('5c836450-b74f-11ee-8e90-1c1b0d2e42f8', '2023-09-05', '2024-01-20', 'B1', 'Abir', '8000'),
('75534bac-b1d3-11ee-a292-1c1b0d2e42f8', '2023-09-05', '2024-01-13', 'B2', 'Shahed', '10'),
('761aa040-be61-11ee-a697-1c1b0d2e42f8', '2023-09-14', '2024-01-29', 'B3', 'Murad', '900'),
('78980b13-be61-11ee-a697-1c1b0d2e42f8', '2023-09-14', '2024-01-29', 'B3', 'Murad', '900'),
('78c6e770-b99c-11ee-bbc9-1c1b0d2e42f8', '2023-09-05', '2024-01-23', 'B2', 'Shahed', '100'),
('80ea7b84-b99c-11ee-bbc9-1c1b0d2e42f8', '2023-09-05', '2024-01-23', 'B2', 'Shahed', '400'),
('950415cf-dab4-11ee-b7db-1c1b0d2e42f8', '2023-09-05', '2024-03-05', '', '', '1400'),
('9a588c99-af79-11ee-9fb0-1c1b0d2e42f8', '2023-09-05', '2024-01-10', 'B2', 'Shahed', '700'),
('9f195986-af76-11ee-9fb0-1c1b0d2e42f8', '2023-09-05', '2024-01-10', 'B1', 'Abir', '500'),
('a543477c-af78-11ee-9fb0-1c1b0d2e42f8', '2023-09-14', '2024-01-10', 'B3', 'Murad', '2000'),
('aacb5c9a-be61-11ee-a697-1c1b0d2e42f8', '2023-09-14', '2024-01-29', 'B3', 'Murad', '1400'),
('aad932d5-dabf-11ee-b7db-1c1b0d2e42f8', '2024-01-23', '2024-03-05', '760e8663-b9cd-11ee-8663-1c1b0d2e42f8', '', '900'),
('afe16939-be61-11ee-a697-1c1b0d2e42f8', '2023-09-14', '2024-01-29', 'B3', 'Murad', '1800'),
('b0ad80d6-aebf-11ee-874d-1c1b0d2e42f8', '2023-09-05', '0000-00-00', 'B2', 'Shahed', '3000'),
('b4700591-b9cd-11ee-8663-1c1b0d2e42f8', '2023-09-05', '2024-01-23', 'B1', 'Abir', '1000'),
('ba1bed4e-db6a-11ee-ba44-1c1b0d2e42f8', '2023-09-14', '2024-03-06', 'B3', '', '2000'),
('C1', '2023-05-09', NULL, 'B1', 'Rahim', '50000'),
('C2', '2023-05-10', NULL, 'B2', 'Karim', '70000'),
('C3', '2023-05-11', NULL, 'B3', 'Ahil', '90000'),
('C4', '2023-05-12', NULL, 'B4', 'Samiya', '11000'),
('C5', '2023-05-13', NULL, 'B5', 'Rahat', '15000'),
('c896eb19-af74-11ee-9fb0-1c1b0d2e42f8', '2023-09-05', '2024-01-10', 'B2', 'Shahed', '8000'),
('d06dc92a-aebf-11ee-874d-1c1b0d2e42f8', '2023-09-05', '2024-01-09', 'B2', 'Shahed', '3000'),
('ded97538-b1d2-11ee-a292-1c1b0d2e42f8', '2023-09-14', '2024-01-13', 'B3', 'Murad', '1600'),
('e3741bee-c4b3-11ee-8d45-1c1b0d2e42f8', '2023-09-14', '2024-02-06', 'B3', 'Murad', '1000'),
('e825b1f6-c4b3-11ee-8d45-1c1b0d2e42f8', '2023-09-14', '2024-02-06', 'B3', 'Murad', '2000'),
('e8ffe69d-dabf-11ee-b7db-1c1b0d2e42f8', '2023-09-14', '2024-03-05', 'B3', '', '1500'),
('ec94f787-aebf-11ee-874d-1c1b0d2e42f8', '2023-09-14', '2024-01-09', 'B3', 'Murad', '9000'),
('f0f706cf-da99-11ee-b7db-1c1b0d2e42f8', '2023-09-14', '2024-03-05', 'B3', 'Murad', '900'),
('f2aa11cd-db84-11ee-a835-1c1b0d2e42f8', '2023-09-14', '2024-03-06', 'B3', '', '1000'),
('f754b285-b8cd-11ee-a9b0-1c1b0d2e42f8', '2023-09-05', '2024-01-22', 'B1', 'Abir', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flightid` varchar(50) NOT NULL,
  `fromwhere` varchar(100) NOT NULL,
  `towhere` varchar(100) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flightid`, `fromwhere`, `towhere`, `fromdate`, `todate`, `price`) VALUES
('F1', 'Paris', 'London', '2023-05-09', '2023-06-02', '20000'),
('F10', 'Italy', 'Germany', '2023-03-21', '2023-09-21', '70000'),
('F11', 'Berlin', 'Mozambik', '2023-03-07', '2023-09-08', '40000'),
('F12', 'Abu Dhabi', 'Muscat', '2023-03-15', '2023-08-16', '80000'),
('F2', 'New York', 'Brazil', '2023-05-09', '2023-06-02', '20000'),
('F3', 'Germany', 'London', '2023-05-09', '2023-06-02', '20000'),
('F4', 'Dhaka', 'Cox Bazar', '2023-05-09', '2023-06-02', '30000'),
('F5', 'Dubai', 'Qatar', '2023-05-01', '2023-06-22', '80000'),
('F6', 'Oman', 'Spain', '2023-03-15', '2023-08-24', '20000'),
('F7', 'Egypt', 'Brazil', '2023-03-06', '2023-07-25', '70000'),
('F8', 'Malaysia', 'Argentina', '2023-04-06', '2023-08-26', '60000'),
('F9', 'India', 'Jordan', '2023-03-05', '2023-08-31', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `name`) VALUES
('F1', '1st-floor'),
('F2', '2nd-floor'),
('F3', '3rd-floor'),
('F4', '4th-floor'),
('F5', '5th-floor');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `fdid` varchar(50) NOT NULL,
  `fdname` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`fdid`, `fdname`, `price`, `rating`, `picture`) VALUES
('F1', 'Continental Dishes', '1000-3000 ', '5-Star', 'F1.jpg'),
('F2', 'Appatizer Items', '500-1000 ', '5-Star', 'F9.jpg'),
('F3', 'Fast Food Menu', '200-600', '4-Star', 'F3.jpg'),
('F4', 'Sea Food Items', '900-2000', '4/5-Star', 'F6.jpg'),
('F5', 'Drinks ', '500-1200', '4/5-Star', 'F2.jpg'),
('F6', 'Snacks Menus', '300-900', '3/4-Star', 'F10.jpg'),
('F7', 'Dessert Menus', '400-1000', '3/5-Star', 'F5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotelbooking`
--

CREATE TABLE `hotelbooking` (
  `bookid` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `guardian` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `roomno` varchar(100) NOT NULL,
  `regid` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelbooking`
--

INSERT INTO `hotelbooking` (`bookid`, `date`, `fromdate`, `todate`, `name`, `guardian`, `nid`, `address`, `mobile`, `roomno`, `regid`, `picture`) VALUES
('B1', '2023-06-05', '2023-02-02', '2023-02-06', 'Ahil', '3', '3', 'Chittagong', '012', 'R1', 'R1', 'HB2.jpg'),
('B2', '2023-07-08', '2023-04-03', '2023-04-07', 'Econ', '4', '3', 'Dhaka', '7559', 'R2', 'R2', 'HB1.jpg'),
('B3', '2023-09-11', '2023-04-03', '2023-04-09', 'Evan', '5', '4', 'Sylhet', '6547', 'R3', 'R3', 'HB3.jpg'),
('B4', '2024-03-19', '2024-03-10', '2024-03-11', 'ccc', '55', 'undefined', 'ctg', '000', 'hh', 'undefined', 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotelid` varchar(50) NOT NULL,
  `hotelname` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotelid`, `hotelname`, `price`, `rating`, `picture`) VALUES
('H1', 'Radisson Blu', '50000', '5-Star', 'H1.jpg'),
('H2', 'The Westin', '40000', '4-Star', 'H5.jpg'),
('H3', 'Inter Continental', '30000', '5-Star', 'H2.jpg'),
('H4', 'The Peninsula', '20000', '3-Star', 'H7.jpg'),
('H5', 'Hotel Sheraton', '60000', '5-Star', 'H4.jpg'),
('H6', 'Bruz Khalifa', '90000', '7-Star', 'H11.jpg'),
('H7', 'The Plaza Hotel', '80000', '5-Star', 'H12.jpg'),
('H8', 'Agrabad Hotels', '40000', '3-Star', 'HA.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-12-27-034735', 'App\\Database\\Migrations\\AddProject', 'default', 'App', 1703649474, 1),
(2, '2023-12-27-055035', 'App\\Database\\Migrations\\AddProject', 'default', 'App', 1703656437, 2);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pkgid` varchar(50) NOT NULL,
  `pkgname` varchar(100) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `fromwhere` varchar(100) NOT NULL,
  `towhere` varchar(100) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pkgid`, `pkgname`, `destination`, `duration`, `price`, `picture`, `type`, `fromwhere`, `towhere`, `fromdate`, `todate`) VALUES
('P1', 'Beyond The Blues', 'Spain', '3-Days', '1000', 'beyond-the-blues.png', 'Seasonal', 'Paris', 'London', '2023-05-09', '2023-06-02'),
('P2', 'Canals', 'Turkey', '5-Days', '2000', 'canals.png', 'Personal', 'New York', 'Brazil', '2023-05-09', '2023-06-02'),
('P3', 'Queen Gambit', 'KSA', '15-Days', '7000', 'queens-gambit.png', 'Personal', 'New York', 'KSA', '2023-01-09', '2023-09-19'),
('P4', 'Sky The Limit', 'KSA', '15-Days', '6000', 'sky-the-limit.png', 'Personal', 'New York', 'KSA', '2023-01-09', '2023-09-19'),
('P5', 'Mountain Venture', 'KSA', '15-Days', '4000', 'mountain-venture.png', 'Personal', 'New York', 'KSA', '2023-01-09', '2023-09-19'),
('P6', 'Green', 'KSA', '15-Days', '8000', 'green.png', 'Personal', 'New York', 'KSA', '2023-01-09', '2023-09-19'),
('P8', 'Cultural', 'Thailand', '5-Days', '3000', 'CULTURAL.jpg', 'Personal', 'New York', 'KSA', '2023-01-09', '2023-09-19'),
('P9', 'Holiday Camps', 'Sweden', '15-Days', '37000', 'TC2.jpg', 'Personal', 'New York', 'KSA', '2023-01-09', '2023-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Karim', 'a mad', '2023-12-27 00:15:26', '2023-12-27 00:15:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomno` varchar(50) NOT NULL,
  `floorid` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomno`, `floorid`, `title`, `price`, `picture`) VALUES
('R1', 'F1', 'Super Delux', '20000', 'R2.jpg'),
('R2', 'F2', 'Super Delux', '30000', 'R5.jpeg'),
('R3', 'F3', 'Super Delux', '50000', 'R4.jpg'),
('R4', 'F4', 'Super Delux', '70000', 'R3.jpg'),
('R5', 'F5', 'Super Delux', '90000', 'R1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `servicepayment`
--

CREATE TABLE `servicepayment` (
  `serviceid` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `bookid` varchar(100) NOT NULL,
  `regid` varchar(100) NOT NULL,
  `roomno` varchar(100) NOT NULL,
  `servicename` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicepayment`
--

INSERT INTO `servicepayment` (`serviceid`, `date`, `bookid`, `regid`, `roomno`, `servicename`, `price`) VALUES
('S1', '2024-02-11', 'B1', 'R1', 'R1', 'Safe Travels', '20000'),
('S2', '2023-01-01', 'B2', 'R2', 'R2', 'Food', '20000'),
('S3', '2024-02-11', 'B3', 'R3', 'R3', 'Taxi To Airport', '500'),
('S4', '2024-02-11', 'B2', 'R2', 'R2', 'Online Flight Booking', '500');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `servid` varchar(50) NOT NULL,
  `servname` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`servid`, `servname`, `picture`) VALUES
('S1', 'Luxury Hotels', 'HS.jpg'),
('S2', 'Delicious Foods', 'F8.jpg'),
('S3', 'Safe Travels', 'V2.jpeg'),
('S4', '24/7 Customer Service', 'CS.jpg'),
('S5', 'Online Flight Booking', 'FB.jpg'),
('S6', 'Taxi To Airport', 'TA.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services2`
--

CREATE TABLE `services2` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services2`
--

INSERT INTO `services2` (`id`, `name`, `description`, `price`) VALUES
('S1', 'Hotels', 'Luxury-Hotels', '2000'),
('S2', 'Foods', 'Delicious Foods', '800'),
('S3', 'Travels', 'Safe Vehicle', '8000'),
('S4', 'Customer Care ', '24/7 Customer Service', '700'),
('S5', 'Booking', 'Taxi to Airport', '1200');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `class`, `picture`, `updated_at`, `created_at`) VALUES
('AC-001', 'Karim', 'Six', NULL, NULL, NULL),
('AC-002', 'Rahim', 'Six', 'ca.jpg', '2024-01-12 22:38:03', NULL),
('AC-003', 'Jamal', 'Six', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `todayfee`
--

CREATE TABLE `todayfee` (
  `collectionid` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `bookid` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todayfee`
--

INSERT INTO `todayfee` (`collectionid`, `date`, `bookid`, `Name`, `amount`) VALUES
('C1', '2023-05-09', 'B1', 'Iqbal', '50000'),
('C2', '2023-06-10', 'B2', 'Iqbal', '40000'),
('C3', '2023-07-11', 'B3', 'Murad', '70000'),
('C4', '2023-08-12', 'B4', 'Ahil', '80000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL DEFAULT 0,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(2, 'cashier', 'cashier', 'Cashier Pharmacy', 'Cashier'),
(3, 'admin', 'admin123', 'Administrator', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vhid` varchar(50) NOT NULL,
  `vhname` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vhid`, `vhname`, `price`, `rating`, `picture`) VALUES
('V1', 'Limusine', '1000', '5-Star', 'V2.jpeg'),
('V2', 'Rolls Royce', '5000', '5-Star', 'V5.jpg'),
('V3', 'Bus ( 40 Person )', '50000', '3-Star', 'BUS.jpg'),
('V4', 'Bus ( 50 Person )', '65000', '4-Star', 'V8.jpg'),
('V5', 'Family Van ( 15 Person )', '2500', '4-Star', 'V9.jpeg'),
('V6', 'Family Van ( 10 Person )', '2000', '3-Star', 'V17.jpg'),
('V7', 'Rent A Car  Service', '3000', '4-Star', 'V15.jpg'),
('V8', 'Small,Medium,Heavy  Package', '3000-5000', '3/4-Star', 'V3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `visitingplaces`
--

CREATE TABLE `visitingplaces` (
  `visitid` varchar(50) NOT NULL,
  `catid` varchar(50) NOT NULL,
  `placename` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `route` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitingplaces`
--

INSERT INTO `visitingplaces` (`visitid`, `catid`, `placename`, `country`, `route`, `picture`) VALUES
('V1', 'C1', 'Sydney', 'Australia', 'By-Air', 'V10.jpg'),
('V2', 'C2', 'Paris', 'France', 'By-Air', 'V14.jpg'),
('V3', 'C3', 'Dubai', 'U.A.E', 'By-Air', 'V6.jpg'),
('V4', 'C4', 'Willington', 'Aucland', 'By-Air', 'V2.jpg'),
('V5', 'C5', 'Agra', 'India', 'By-Air', 'V1.jpeg'),
('V6', 'C6', 'Kremlin', 'Russia', 'By-Air', 'V9.jpg'),
('V7', 'C7', 'New York', 'USA', 'By-Air', 'V12.jpg'),
('V8', 'C8', 'Venice', 'Italy', 'By-Air', 'V8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `feecollection`
--
ALTER TABLE `feecollection`
  ADD PRIMARY KEY (`collectionid`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flightid`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`fdid`);

--
-- Indexes for table `hotelbooking`
--
ALTER TABLE `hotelbooking`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotelid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pkgid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomno`);

--
-- Indexes for table `servicepayment`
--
ALTER TABLE `servicepayment`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`servid`);

--
-- Indexes for table `services2`
--
ALTER TABLE `services2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todayfee`
--
ALTER TABLE `todayfee`
  ADD PRIMARY KEY (`collectionid`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vhid`);

--
-- Indexes for table `visitingplaces`
--
ALTER TABLE `visitingplaces`
  ADD PRIMARY KEY (`visitid`),
  ADD KEY `catid` (`catid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visitingplaces`
--
ALTER TABLE `visitingplaces`
  ADD CONSTRAINT `visitingplaces_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `category` (`catid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
