-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 02:28 PM
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
(6, 'Freelancing ', 0);

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
  `demo_video` varchar(191) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `category_id`, `course_title`, `banner`, `short_description`, `description`, `price`, `discount`, `hours`, `total_hit`, `ratting`, `demo_video`, `is_active`, `created_at`) VALUES
(2, 2, 'Animation', 'image/39444b4f95.jpg', '  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s   ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.    ', '2000', '22', '24', 2, 8, NULL, 0, '2022-03-07 17:18:11'),
(3, 3, 'PHP', 'image/e7dc872afa.jpg', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s  ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ', '3000', '5', '20', 0, 0, NULL, 0, '2022-03-08 18:14:24'),
(5, 2, 'Illustration', 'image/a80bbc797a.jpg', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s  ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ', '2000', '10', '30', 0, 0, NULL, 0, '2022-03-08 18:44:25'),
(6, 6, 'Cooking', 'image/26d70f4ac0.png', '          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s              ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.         ', '3000', '20', '20', 0, 0, 'videos/demo/881188b938.mp4', 0, '2022-03-18 09:56:59'),
(9, 3, 'JavaScript', 'image/3e5d4207bc.png', '    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s    ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s    ', '4000', '10', '24', 0, 0, 'videos/demo/55be90103d.mp4', 0, '2022-06-28 16:48:18'),
(11, 3, 'HTML', 'image/0509579550.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '3000', '10', '20', 0, 0, 'videos/12f4dca522.mp4', 0, '2022-06-28 17:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_price` varchar(191) NOT NULL,
  `discount_price` varchar(191) NOT NULL,
  `enroll_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
(1, 6, '1000', '800', '2022-05-11 09:34:07', 2, 'Bkash', '1215469846', '87', 1),
(14, 6, '3000', '2400', '2022-06-30 06:27:00', 1, 'Bkash', '12345678900', '234', 1),
(15, 5, '2000', '1800', '2022-06-29 19:36:00', 1, 'Bkash', '12345678900', '657', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `customer_id`, `rating`, `review`, `course_id`) VALUES
(11, 1, 4, 'Et eaque et distinct', 11),
(12, 2, 5, 'Odio et fugiat dolo', 11),
(13, 3, 3, 'Quae nostrud volupta', 11),
(14, 1, 5, 'Iste excepteur totam', 9),
(15, 1, 5, 'Est qui est obcaeca', 6);

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
(3, 'Mithila', 'Rabbany', 'mithilarabbany12@gmail.com', '01717576087', '12345678', 'user', 0, '2022-05-27 11:03:24'),
(4, 'Supty', 'Ahmed', 'supty@gmail.com', '01346767556', '12345678', 'user', 0, '2022-06-28 13:54:08');

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
(1, 'Japanese', 'videos/course/ca1a92a778.mp4', 6),
(2, 'Chinese', 'videos/course/ddcd943a40.mp4', 6),
(3, 'Italian', 'videos/course/d05a648ccb.mp4', 6),
(4, 'JavaScript', 'videos/course/6ebcfb3646.mp4', 9);

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
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

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
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
