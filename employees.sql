-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 08:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `position`, `created_at`) VALUES
(1, 'John Smith', 'john.smith@example.com', 'Software Developer', '2025-07-31 13:38:30'),
(2, 'Emily Johnson', 'emily.johnson@example.com', 'Project Manager', '2025-07-31 13:38:30'),
(3, 'Michael Williams', 'michael.williams@example.com', 'HR Specialist', '2025-07-31 13:38:30'),
(4, 'Sarah Brown', 'sarah.brown@example.com', 'Marketing Coordinator', '2025-07-31 13:38:30'),
(5, 'David Jones', 'david.jones@example.com', 'Systems Administrator', '2025-07-31 13:38:30'),
(6, 'Jennifer Garcia', 'jennifer.garcia@example.com', 'Data Analyst', '2025-07-31 13:38:30'),
(7, 'Robert Miller', 'robert.miller@example.com', 'Graphic Designer', '2025-07-31 13:38:30'),
(8, 'Lisa Davis', 'lisa.davis@example.com', 'Accountant', '2025-07-31 13:38:30'),
(9, 'James Rodriguez', 'james.rodriguez@example.com', 'Sales Representative', '2025-07-31 13:38:30'),
(10, 'Patricia Martinez', 'patricia.martinez@example.com', 'Customer Support', '2025-07-31 13:38:30'),
(11, 'Thomas Wilson', 'thomas.wilson@example.com', 'Operations Manager', '2025-07-31 13:38:30'),
(12, 'Linda Anderson', 'linda.anderson@example.com', 'Product Manager', '2025-07-31 13:38:30'),
(13, 'Christopher Taylor', 'christopher.taylor@example.com', 'UX Designer', '2025-07-31 13:38:30'),
(14, 'Barbara Thomas', 'barbara.thomas@example.com', 'Network Engineer', '2025-07-31 13:38:30'),
(15, 'Daniel Hernandez', 'daniel.hernandez@example.com', 'Content Writer', '2025-07-31 13:38:30'),
(16, 'Jessica Moore', 'jessica.moore@example.com', 'Recruiter', '2025-07-31 13:38:30'),
(17, 'Matthew Martin', 'matthew.martin@example.com', 'Financial Analyst', '2025-07-31 13:38:30'),
(18, 'Susan Jackson', 'susan.jackson@example.com', 'Business Analyst', '2025-07-31 13:38:30'),
(19, 'Andrew Thompson', 'andrew.thompson@example.com', 'DevOps Engineer', '2025-07-31 13:38:30'),
(20, 'Nancy White', 'nancy.white@example.com', 'Quality Assurance', '2025-07-31 13:38:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
