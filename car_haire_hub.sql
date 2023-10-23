-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2023 at 02:56 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_haire_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `emp_ID` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`emp_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_ID` int NOT NULL AUTO_INCREMENT,
  `Owner_ID` int DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `comment` text,
  `states` varchar(20) DEFAULT NULL,
  `is_replied` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`comment_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `offer_ID` int NOT NULL AUTO_INCREMENT,
  `Offer_title` varchar(100) DEFAULT NULL,
  `Offer_content` text,
  `Offer_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`offer_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

DROP TABLE IF EXISTS `orders_status`;
CREATE TABLE IF NOT EXISTS `orders_status` (
  `order_ID` int NOT NULL AUTO_INCREMENT,
  `user_ID` int DEFAULT NULL,
  `seler_ID` int DEFAULT NULL,
  `vehical_ID` int DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_ID` int NOT NULL AUTO_INCREMENT,
  `OrderID` int DEFAULT NULL,
  `UserID` int DEFAULT NULL,
  `SellerID` int DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`payment_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `reply_ID` int NOT NULL AUTO_INCREMENT,
  `CommentID` int DEFAULT NULL,
  `Reply` text,
  PRIMARY KEY (`reply_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `review_ID` int NOT NULL AUTO_INCREMENT,
  `user_ID` int DEFAULT NULL,
  `review_comment` text,
  `stars` int DEFAULT NULL,
  PRIMARY KEY (`review_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `seller_ID` int NOT NULL AUTO_INCREMENT,
  `user_ID` int NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_holder_name` varchar(200) NOT NULL,
  `NIC_front_IMG` varchar(255) NOT NULL,
  `NIC_back_img` varchar(255) NOT NULL,
  PRIMARY KEY (`seller_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellervehicle`
--

DROP TABLE IF EXISTS `sellervehicle`;
CREATE TABLE IF NOT EXISTS `sellervehicle` (
  `VehicleID` int NOT NULL AUTO_INCREMENT,
  `SellerID` int DEFAULT NULL,
  `BrandName` varchar(50) DEFAULT NULL,
  `RentalCategory` varchar(20) DEFAULT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `YearOfManufacture` int DEFAULT NULL,
  `LicensePlateNumber` varchar(15) DEFAULT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `FuelType` varchar(20) DEFAULT NULL,
  `TransmissionType` varchar(20) DEFAULT NULL,
  `NumberOfPassengers` int DEFAULT NULL,
  `RentalRates` decimal(10,2) DEFAULT NULL,
  `VehicleDescriptions` text,
  `VehicleDistrict` varchar(50) DEFAULT NULL,
  `VehicleCity` varchar(50) DEFAULT NULL,
  `DriverStatus` varchar(10) DEFAULT NULL,
  `BabySeatStatus` varchar(10) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`VehicleID`),
  KEY `SellerID` (`SellerID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_ID` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `NIC` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_mobile`
--

DROP TABLE IF EXISTS `user_mobile`;
CREATE TABLE IF NOT EXISTS `user_mobile` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `user_ID` int NOT NULL,
  `mobile` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehical_images`
--

DROP TABLE IF EXISTS `vehical_images`;
CREATE TABLE IF NOT EXISTS `vehical_images` (
  `gallary_ID` int NOT NULL AUTO_INCREMENT,
  `vehicle_ID` int NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `img5` varchar(255) NOT NULL,
  `img6` varchar(255) NOT NULL,
  `img7` varchar(255) NOT NULL,
  `img8` varchar(255) NOT NULL,
  `img9` varchar(255) NOT NULL,
  PRIMARY KEY (`gallary_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
