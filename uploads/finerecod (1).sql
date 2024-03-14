-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2024 at 12:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `finerecod`
--

CREATE TABLE `finerecod` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `library_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `issued_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fine_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paydate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finerecod`
--

INSERT INTO `finerecod` (`id`, `bookid`, `student_name`, `library_id`, `email`, `phone`, `issued_date`, `return_date`, `fine_date`, `amount`, `paydate`) VALUES
(1, 0, '', '', '', '', '0000-00-00', '0000-00-00', '2024-03-05', 100.00, '2024-03-05'),
(2, 0, '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', 0.00, '2024-03-05'),
(3, 0, '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', 0.00, '2024-03-05'),
(4, 11, 'dhruvik', '33', 'john.doe@example.com', '1234567890', '2024-03-05', '2024-02-29', '2024-03-05', 100.00, '2024-03-05'),
(5, 0, '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', 0.00, '2024-03-05'),
(6, 0, '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', 0.00, '2024-03-05'),
(7, 11, 'dhruvik', '33', 'john.doe@example.com', '1234567890', '2024-03-05', '2024-02-29', '2024-03-05', 100.00, '2024-03-05'),
(8, 13, 'dhruvik', '33', 'john.doe@example.com', '1234567890', '2024-03-05', '2024-03-02', '2024-03-05', 100.00, '2024-03-05'),
(9, 13, 'dhruvik', '33', 'john.doe@example.com', '1234567890', '2024-03-05', '2024-03-02', '2024-03-05', 100.00, '2024-03-05'),
(10, 11, 'dhruvik', '33', 'john.doe@example.com', '1234567890', '2024-03-30', '2024-02-28', '2024-03-05', 100.00, '2024-03-05'),
(11, 0, '', '', '', '', '0000-00-00', '0000-00-00', '2024-03-05', 100.00, '2024-03-05'),
(12, 0, '', '', '', '', '0000-00-00', '0000-00-00', '2024-03-05', 100.00, '2024-03-05'),
(13, 12, 'dhruvik', '33', 'john.doe@example.com', '1234567890', '2024-03-05', '2024-02-26', '2024-03-05', 100.00, '2024-03-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finerecod`
--
ALTER TABLE `finerecod`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finerecod`
--
ALTER TABLE `finerecod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
