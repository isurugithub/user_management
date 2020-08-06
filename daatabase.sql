-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 06, 2020 at 07:56 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `password`, `address`) VALUES
(1, 'Isuru', 'sdilgunathilaka@gmail.com', '0775977660', '12345', 'Ingiriya'),
(8, 'namidu', 'namidu@gmail.com', '0778379950', '123', 'ingiriya'),
(12, 'kelum', 'kelum@123', '0778019790', '159', 'ingiriya'),
(14, 'Wajira', 'Wajira@gmail', '0714578456', '0147', 'Ingiriya'),
(18, 'dulan', 'dul@gmail.com', '0775485212', '369', 'maha ingiriya'),
(19, 'Isuru', 'isuru@gmail.com', '012556768867', '123', 'ingiriya'),
(20, 'chamath', 'chamath@gmail.com', '0765496079', '1234', 'maha ingiriya'),
(23, 'Avishka', 'Avishka@gmail.com', '0778717186', '2001', 'Janadipathi Mawatha'),
(24, 'Chandana', 'chandana@gmail.com', '0767887061', '0147', 'Ingiriya'),
(25, 'Viraj', 'viraj@gmail.com', '0765894512', '4563', 'anuradapura'),
(26, 'kaviska', 'kavishka@gmail.com', '0758945632', '7530', 'Pelmadulla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
