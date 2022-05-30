-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 11:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_sell`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(191) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `is_active`) VALUES
(2, 'Design', 0),
(3, 'Programming', 0),
(5, 'Accounting', 0),
(6, 'freelancing ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `course_title` varchar(191) NOT NULL,
  `banner` varchar(191) NOT NULL,
  `short_description` text NOT NULL,
  `description` longtext NOT NULL,
  `price` varchar(191) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `hours` varchar(100) NOT NULL,
  `total_hit` int(11) NOT NULL,
  `ratting` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `category_id`, `course_title`, `banner`, `short_description`, `description`, `price`, `discount`, `hours`, `total_hit`, `ratting`, `is_active`, `created_at`) VALUES
(2, 2, 'course ione ', 'image/39444b4f95.jpg', ' Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci. ', 'Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci. ', '222', '22', '23', 2, 8, 0, '2022-03-07 17:18:11'),
(3, 3, 'Php', 'image/e7dc872afa.jpg', '  Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.  ', 'Fusce interdum, elit sit amet vehicula malesuada, eros libero elementum orci.  ', '3000', '5', '2', 0, 0, 0, '2022-03-08 18:14:24'),
(4, 2, 'Illustration', 'image/35c39be52b.jpg', '  ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci.', '  ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci.vv', '2000', '10', '120', 0, 0, 0, '2022-03-08 18:43:35'),
(5, 2, 'Illustration', 'image/a80bbc797a.jpg', '   ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ', '  ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci. ffffff interdum, elit sit amet hg uk kkjl ojjoi , eros libero elementum orci.vv ', '2000', '10', '120', 0, 0, 0, '2022-03-08 18:44:25'),
(6, 6, 'Cooking', 'image/11dbc911ec.jpg', ' cook first ', ' expert cook ', '1200', '20', '60', 0, 0, 0, '2022-03-18 09:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_price` varchar(191) NOT NULL,
  `discount_price` varchar(191) NOT NULL,
  `enroll_at` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `payment_type` varchar(191) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `ref` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `course_id`, `course_price`, `discount_price`, `enroll_at`, `customer_id`, `payment_type`, `account_no`, `ref`, `status`) VALUES
(1, 6, '1000', '800', '2022-05-11 15:34:07', 2, 'Bkash', '1215469846', '87', 0),
(9, 4, '2000', '1800', '0000-00-00 00:00:00', 3, 'Bkash', '1215469846', '43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `role`, `is_active`, `created_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '01632315608', '12345678', 'admin', 0, '2022-03-01 16:53:03'),
(2, 'Mahjuba', 'Tasrin', 'mahjubatasrin420@gmail.com', '01920069653', 'mithshan777', 'admin', 0, '2022-03-18 09:41:54'),
(3, 'Mithila', 'Rabbany', 'mithilarabbany12@gmail.com', '01717576087', '12345678', 'user', 0, '2022-05-27 11:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_title`, `video_url`, `course_id`) VALUES
(1, 'test one', 'video1.mp4', 6),
(2, 'test two', 'video2.mp4', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `categor table` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `categor table` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
