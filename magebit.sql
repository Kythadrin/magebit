-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2021 at 03:58 PM
-- Server version: 8.0.24
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magebit`
--

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`email`, `date`) VALUES
('aniramt67@gmail.com', '2021-12-16'),
('annastanevica@inbox.lv', '2021-12-16'),
('asd@gmail.com', '2021-12-16'),
('dadad@sda.com', '2021-12-16'),
('dimas@yahoo.com', '2021-12-01'),
('dsfsgsdgsfs@gmail.com', '2021-12-16'),
('flexer@gmail.com', '2021-12-16'),
('kirill@mail.com', '2021-05-05'),
('kscerato@yahoo.com', '2021-12-16'),
('kythadrin@gmail.com', '2021-12-16'),
('kythadrinn@gmail.com', '2021-12-16'),
('lena@yahoo.com', '2021-12-05'),
('nikita@yahoo.com', '2021-12-16'),
('vadimsiric@gmail.com', '2021-12-15'),
('vadimsiric@gmail.lv', '2021-12-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
