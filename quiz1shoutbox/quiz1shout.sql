-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3333
-- Generation Time: Jan 10, 2019 at 06:56 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz1shout`
--

-- --------------------------------------------------------

--
-- Table structure for table `shouts`
--

CREATE TABLE `shouts` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `message` varchar(100) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shouts`
--

INSERT INTO `shouts` (`id`, `name`, `message`, `ts`) VALUES
(1, 'Roberto', 'Hello there', '2019-01-10 16:59:22'),
(2, 'Ror', 'Tester', '2019-01-10 17:01:08'),
(3, 'Joe', 'Bleh', '2019-01-10 17:07:47'),
(4, 'Joe', 'tESTER', '2019-01-10 17:14:40'),
(5, 'frank', 'sdgsgg', '2019-01-10 17:15:01'),
(6, 'frank', 'gdsdfggsd', '2019-01-10 17:15:07'),
(7, 'frank', 'sdgggdsds', '2019-01-10 17:15:10'),
(8, 'frank', 'dfgdsdsfds', '2019-01-10 17:15:13'),
(9, 'frank', 'gjffffd', '2019-01-10 17:15:17'),
(10, 'frank', 'sdfdfshfdhdfhs', '2019-01-10 17:15:20'),
(11, 'frank', 'sffdssdfhdfsh', '2019-01-10 17:15:30'),
(12, 'Roberto', '232', '2019-01-10 17:25:48'),
(13, 'Roberto', 'dfhd', '2019-01-10 17:28:08'),
(14, 'Roberto', 'sdfsdfsd', '2019-01-10 17:34:48'),
(15, 'Roberto', 'fdssdfsfd', '2019-01-10 17:36:02'),
(16, 'Roberto', 'dfgdg', '2019-01-10 17:37:17'),
(17, 'Roberto', 'Tester', '2019-01-10 17:37:48'),
(18, 'Roberto', 'Tester', '2019-01-10 17:38:03'),
(19, 'Roberto', 'Hello there', '2019-01-10 17:40:00'),
(20, 'Tests', 'rwerwre', '2019-01-10 17:40:12'),
(21, 'Joe', 'Hello there', '2019-01-10 17:49:10'),
(22, 'Joe', 'Hello there', '2019-01-10 17:49:27'),
(23, 'Roberto', 'Tester', '2019-01-10 17:50:19'),
(24, 'Roberto', 'sdgsgg', '2019-01-10 17:50:25'),
(25, 'Roberto', 'Tester', '2019-01-10 17:51:13'),
(26, 'Rt', 'Tester', '2019-01-10 17:56:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shouts`
--
ALTER TABLE `shouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shouts`
--
ALTER TABLE `shouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
