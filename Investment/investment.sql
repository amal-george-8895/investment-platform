-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 12:17 PM
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
-- Database: `investment`
--

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `id` int(11) NOT NULL,
  `instrument_name` varchar(100) NOT NULL,
  `asset_type` varchar(100) NOT NULL,
  `industry_sector_l1` varchar(100) NOT NULL,
  `Ticker` varchar(100) NOT NULL,
  `Issuer` varchar(100) NOT NULL,
  `stock_exchange` varchar(100) NOT NULL,
  `price_currency` varchar(100) NOT NULL,
  `closing_price` varchar(100) NOT NULL,
  `risk_rating` varchar(100) NOT NULL,
  `Country` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `instrument_name`, `asset_type`, `industry_sector_l1`, `Ticker`, `Issuer`, `stock_exchange`, `price_currency`, `closing_price`, `risk_rating`, `Country`) VALUES
(1, 'IBM', '1', 'Technology', 'IBM', 'International Business Machines Corporation', 'NYSE', 'USD', '127.57', '1', 'USA'),
(2, 'AWS', '1', 'Technology', 'AMZN', 'Amazon Web Services, Inc.', 'NASDAQ', 'USD', '128.72', '1', 'USA'),
(3, 'SAP SE', '3', 'Technology', 'SAP', 'SAP SE', 'ETR', 'EUR', '85.30', '1', 'DEU'),
(4, 'Kiniksa', '', 'Healthcare', 'KNSA', 'Kiniksa Pharmaceuticals Ltd', 'NASDAQ', 'USD', '11.46', '3', 'BMU'),
(5, 'Huadong Medicine', '', 'Healthcare', '000963:CH', 'Huadong Medicine Co Ltd', 'SHE', 'CNY', '41.21', '3', 'CHN'),
(6, 'Renaissance IPO', '3', 'Financials', 'IPO', 'Renaissance IPO ETF', 'NYSEARCA', 'USD', 'USD', '5', 'USA'),
(7, 'Natixis Green Note', '2,4,5', 'Financials', 'KNFP 0 08/25/32', 'Natixis Structured Issuance SA', 'OMXH', 'EUR', '30,000.00', '5', 'FIN'),
(8, 'Oracle', '', 'Technology', 'ORCL', 'Oracle Corporation', 'NYSE', 'USD', '74.36', '1', 'USA'),
(9, 'Infosys', '', 'Technology', 'Infy', 'Infosys Ltd', 'NSE', 'INR', '1,462.00', '1', 'IND'),
(10, 'Intellia', '', 'Healthcare', 'NTLA', 'Intellia Therapeutics Inc', 'NASDAQ', 'USD', '57.53', '3', 'USA'),
(11, 'Regeneron', '', 'Healthcare', 'REGN', 'Regeneron Pharmaceuticals Inc', 'NASDAQ', 'USD', '597.76', '3', 'USA'),
(12, 'Atlantica', '', 'Renewable Energy', 'AY', 'Atlantica Sustainable Infrastructure PLC', 'NASDAQ', 'USD', '32.96', '2', 'GBR'),
(13, 'ChargePoint', '', 'Renewable Energy', 'CHPT', 'ChargePoint Holdings Inc', 'NYSE', 'USD', '16.08', '2', 'USA'),
(15, 'IBM', '3', 'Technology', 'AMZN', 'Amazon Web Services, Inc.', 'NYSE', 'a', '1,462.00', '5', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `preference`
--

CREATE TABLE `preference` (
  `id` int(10) NOT NULL,
  `asset_type` varchar(100) NOT NULL,
  `industry_sector` varchar(100) NOT NULL,
  `closing_price` varchar(100) NOT NULL,
  `risk_rating` varchar(100) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `preference`
--

INSERT INTO `preference` (`id`, `asset_type`, `industry_sector`, `closing_price`, `risk_rating`, `client_id`) VALUES
(3, 'Equities-General', 'Technology', '324', '1', 20),
(4, 'Equities-General', 'Technology', '127.57', '2', 7),
(5, 'Equities-General', 'Technology', '127.57', '1', 5),
(6, 'Equities-General', 'Technology', '127.57', '1', 21),
(7, 'Equities', 'Technology', '85.30', '3', 23);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`) VALUES
(1, 'Equities-General', 'Equities -General\r\n'),
(2, 'Equities ETF', 'ETF'),
(3, 'Derivatives', 'Structured products'),
(4, 'Bonds ', 'Sovereign Gold Bonds'),
(5, 'Funds', 'Mutual funds');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phoneno` varchar(100) NOT NULL,
  `recommend_ideas` varchar(100) NOT NULL DEFAULT '',
  `gender` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `country` varchar(10) NOT NULL,
  `assigned_rm` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `emailid`, `password`, `role`, `fname`, `lname`, `phoneno`, `recommend_ideas`, `gender`, `dob`, `country`, `assigned_rm`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', 'ad', 'min', '', '', '', NULL, '', ''),
(2, 'viratkohlirm@gmail.com', 'viratkohli', 'rm', 'Virat ', 'kohli', '+447745632798', '', 'Female', '1989-05-09', 'UK', NULL),
(3, 'rachelzane@gmail.com', 'rachelzane', 'rm', 'Rachel', 'Zane', '+447345698439', '', 'Female', '1980-01-02', 'UK', NULL),
(4, 'amalgeorge@gmail.com', 'amalgeorge', 'client', 'amal', 'george', '+917727679076', '6', 'Female', '1989-09-09', 'UK', '2'),
(5, 'sanjaybalaji@gmail.com', 'sanjaybalaji', 'client', 'Sanjay', 'Balaji', '+917767936589', '1,2,3', 'Female', '1992-08-03', 'UK', '2'),
(6, 'vamsiraya@gmail.com', 'vamsiraya', 'client', 'Vamsi', 'Raya', '+447723487451', '', 'Female', '1972-08-28', 'UK', '2'),
(7, 'edwardlovett@gmail.com', 'edwardlovett', 'client', 'Edward', 'Lovett', '+447989765427', '3', 'Female', '1992-09-13', 'UK', '2'),
(18, 'priyankakapoor@gmail.com', 'priyankakapoor', 'client', 'Priyanka', 'kapoor', '+917453672639', '', 'Female', '1990-06-09', 'UK', '3'),
(19, 'patriciataylor@gmail.com', 'patriciataylor', 'client', 'Patricia', 'Taylor', '+1(443)4801321', '', 'Female', '1986-04-08', 'UK', '3'),
(20, 'donnapaulsen@gmail.com', 'donnapaulsen', 'client', 'Donna ', 'Paulsen', '+1(443)4912412', '1,13,15', 'Female', '1960-03-31', 'UK', '3'),
(21, 'harveyspecter@gmail.com', 'harveyspecter', 'client', 'Harvey', 'specter', '+1(563)5732372', '', 'Female', '1970-11-17', 'UK', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preference`
--
ALTER TABLE `preference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `preference`
--
ALTER TABLE `preference`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
