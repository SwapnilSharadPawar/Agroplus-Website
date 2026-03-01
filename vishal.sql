-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2025 at 02:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vishal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$40xOA3DwyWfeA9dEh98NGet40VuYCF7uVav2BN6U4PRqfNm2Z00c2', '2025-08-24 07:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `career_applications`
--

CREATE TABLE `career_applications` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career_applications`
--

INSERT INTO `career_applications` (`id`, `name`, `email`, `phone`, `resume`, `message`, `created_at`) VALUES
(3, 'swapnil pawar', 'swapnils1893@gmail.com', '08767885310', '1756554731_Swapnil_Pawar-8767885310.pdf', 'hello\r\n', '2025-08-30 11:52:11'),
(4, 'swapnil pawar', 'swapnils1893@gmail.com', '8767885310', '1756554782_Swapnil_Pawar-8767885310.pdf', 'hello', '2025-08-30 11:53:02'),
(5, 'swapnil pawar', 'swapnils1893@gmail.com', '8767885310', '1756554819_Swapnil_Pawar-8767885310.pdf', 'hello', '2025-08-30 11:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `career_form_labels`
--

CREATE TABLE `career_form_labels` (
  `id` int(11) NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `label_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career_form_labels`
--

INSERT INTO `career_form_labels` (`id`, `field_name`, `label_text`) VALUES
(1, 'name', 'Full Name'),
(2, 'email', 'Email Address'),
(3, 'phone', 'Phone Number'),
(4, 'resume', 'Upload Resume'),
(5, 'message', 'Message');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `krishiudyog_gallery`
--

CREATE TABLE `krishiudyog_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `type` enum('image','video') DEFAULT 'image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krishiudyog_gallery`
--

INSERT INTO `krishiudyog_gallery` (`id`, `title`, `file_path`, `type`) VALUES
(2, 'd', '1756526964_urea.jpeg', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `krishiudyog_products`
--

CREATE TABLE `krishiudyog_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krishiudyog_products`
--

INSERT INTO `krishiudyog_products` (`id`, `name`, `image`, `description`) VALUES
(1, 'tomato', '1756183530_tomato.jpeg', 'fertilizer'),
(2, 'urea', '1756477709_urea.jpeg', 'fertilizer');

-- --------------------------------------------------------

--
-- Table structure for table `seedlings`
--

CREATE TABLE `seedlings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seedlings`
--

INSERT INTO `seedlings` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(5, 'Tomato', 'Tomato', '1756476316_tomato.jpeg', '2025-08-29 14:05:16'),
(6, 'Sugarcane', 'Sugarcane', '1756476349_IMG-20250829-WA0022.jpg', '2025-08-29 14:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `seedlings_gallery`
--

CREATE TABLE `seedlings_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `type` enum('image','video') DEFAULT 'image',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seedlings_gallery`
--

INSERT INTO `seedlings_gallery` (`id`, `title`, `file_path`, `type`, `created_at`) VALUES
(6, 'sugarcane', '1756349760_sugarcane.jpeg', 'image', '2025-08-28 02:56:00'),
(7, 'sugarcane', '1756476138_IMG-20250829-WA0022.jpg', 'image', '2025-08-29 14:02:18'),
(8, 'sugarcane', '1756476174_IMG-20250829-WA0029.jpg', 'image', '2025-08-29 14:02:54'),
(9, 'sugarcane', '1756476193_WhatsApp Image 2025-08-29 at 19.20.43_37fe35fb.jpg', 'image', '2025-08-29 14:03:13'),
(10, 'sugarcane', '1756476232_IMG-20250829-WA0025.jpg', 'image', '2025-08-29 14:03:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `career_applications`
--
ALTER TABLE `career_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_form_labels`
--
ALTER TABLE `career_form_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krishiudyog_gallery`
--
ALTER TABLE `krishiudyog_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krishiudyog_products`
--
ALTER TABLE `krishiudyog_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seedlings`
--
ALTER TABLE `seedlings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seedlings_gallery`
--
ALTER TABLE `seedlings_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `career_applications`
--
ALTER TABLE `career_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `career_form_labels`
--
ALTER TABLE `career_form_labels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `krishiudyog_gallery`
--
ALTER TABLE `krishiudyog_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `krishiudyog_products`
--
ALTER TABLE `krishiudyog_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seedlings`
--
ALTER TABLE `seedlings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seedlings_gallery`
--
ALTER TABLE `seedlings_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
