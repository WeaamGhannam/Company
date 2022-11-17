-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 06:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `headingOne` varchar(255) NOT NULL,
  `headingTwo` varchar(255) NOT NULL,
  `ParagraphOne` varchar(255) NOT NULL,
  `ParagraphTwo` varchar(255) NOT NULL,
  `list` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `headingOne`, `headingTwo`, `ParagraphOne`, `ParagraphTwo`, `list`, `status`) VALUES
(1, 'EUM IPSAM LABORUM DELENITI VELITENA\r\n', 'Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave\r\n', 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Ullamco laboris nisi ut aliquip ex ea commodo consequa,\r\nDuis aute irure dolor in reprehenderit in voluptate velit,\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `img`, `status`, `created_at`) VALUES
(1, 'assets\\img\\clients\\client-1.png', 1, '2022-11-12 12:07:01'),
(2, 'assets\\img\\clients\\client-2.png', 1, '2022-11-12 12:07:01'),
(3, 'assets\\img\\clients\\client-3.png', 1, '2022-11-12 12:07:01'),
(4, 'assets\\img\\clients\\client-4.png', 1, '2022-11-12 12:07:01'),
(5, 'assets\\img\\clients\\client-5.png', 1, '2022-11-12 12:07:01'),
(6, 'assets\\img\\clients\\client-6.png', 1, '2022-11-12 12:07:01'),
(7, 'assets\\img\\clients\\client-7.png', 1, '2022-11-12 12:07:01'),
(8, 'assets\\img\\clients\\client-8.png', 1, '2022-11-12 12:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `address1`, `address2`, `address3`, `phone`, `email`, `status`, `created_at`) VALUES
(1, 'A108 Adam Street', 'New York, NY 535022', 'United States', '+1 5589 55488 55', ' info@example.com', 1, '2022-11-15 03:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'App', 1, '2022-11-13 10:29:29'),
(2, 'Card', 1, '2022-11-13 10:29:29'),
(3, 'Web', 1, '2022-11-13 10:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `portfolio_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `img`, `name`, `portfolio_id`, `status`, `created_at`) VALUES
(1, 'assets/img/portfolio/portfolio-1.jpg', 'App1', 1, 1, '2022-11-13 15:52:40'),
(2, 'assets/img/portfolio/portfolio-2.jpg', 'web3', 3, 1, '2022-11-14 09:30:47'),
(3, 'assets/img/portfolio/portfolio-3.jpg', 'App2', 1, 1, '2022-11-14 09:30:47'),
(4, 'assets/img/portfolio/portfolio-4.jpg', 'card2', 2, 1, '2022-11-14 09:30:47'),
(5, 'assets/img/portfolio/portfolio-5.jpg', 'web2', 3, 1, '2022-11-14 09:30:47'),
(6, 'assets/img/portfolio/portfolio-6.jpg', 'App3', 1, 1, '2022-11-14 09:30:47'),
(7, 'assets/img/portfolio/portfolio-7.jpg', 'card1', 2, 1, '2022-11-14 09:30:47'),
(8, 'assets/img/portfolio/portfolio-7.jpg', 'card3', 2, 1, '2022-11-14 09:30:47'),
(9, 'assets/img/portfolio/portfolio-8.jpg', 'web3', 3, 1, '2022-11-14 09:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `icon`, `description`, `status`, `created_at`) VALUES
(1, 'Lorem Ipsum', 'fa-brands fa-dribbble', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi', 1, '2022-11-14 18:14:16'),
(2, 'Sed Perspiciatis', 'fa-solid fa-file', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', 1, '2022-11-14 18:14:16'),
(3, 'Magni Dolores', 'fa-solid fa-gauge-simple-high', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia', 1, '2022-11-14 18:14:16'),
(4, 'Nemo Enim', 'fa-solid fa-layer-group', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis', 1, '2022-11-14 18:14:16'),
(5, 'Dele Cardo', 'fa-brands fa-slideshare', 'Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur', 1, '2022-11-14 18:14:16'),
(6, 'Divera Don', 'fa-solid fa-archway', 'Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur', 1, '2022-11-14 18:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `img`, `description`, `link`, `status`, `created_at`) VALUES
(1, 'Welcome to Company', 'assets/img/slide/slide-1.jpg', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.', 'Read More', 1, '2022-11-12 10:49:08'),
(2, 'Lorem Ipsum Dolor', 'assets/img/slide/slide-2.jpg', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.', 'Read More', 1, '2022-11-12 10:49:08'),
(3, 'Sequi ea ut et est quaerat', 'assets/img/slide/slide-3.jpg', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.', 'Read More', 1, '2022-11-12 10:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `icon`, `name`, `status`, `created_at`) VALUES
(1, 'fa-brands fa-square-twitter', 'twitter', 1, '2022-11-15 06:15:48'),
(2, 'fa-brands fa-square-facebook', 'facebook  ', 1, '2022-11-15 06:15:48'),
(3, 'fa-brands fa-square-instagram', 'instagram', 1, '2022-11-15 06:15:48'),
(4, 'fa-brands fa-skype', 'skype', 1, '2022-11-15 06:15:48'),
(5, 'fa-brands fa-linkedin', 'linkedIn', 1, '2022-11-15 06:15:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `headingOne` (`headingOne`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address1` (`address1`),
  ADD KEY `address2` (`address2`),
  ADD KEY `address3` (`address3`),
  ADD KEY `phone` (`phone`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_id` (`portfolio_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
