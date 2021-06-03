-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2021 at 09:12 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is an interpreted, high-level and general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant indentation.', '2021-02-27 14:12:46'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. ', '2021-02-27 14:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'You can use python manual to solve your problem', 1, 3, '2021-03-01 10:30:51'),
(2, 'I am testing here', 1, 1, '2021-03-01 10:54:07'),
(3, 'You can use commands from stack overflow', 2, 4, '2021-03-01 10:54:49'),
(4, 'test ka bhi test :)', 4, 2, '2021-03-01 10:55:31'),
(5, 'commenting here', 7, 4, '2021-03-01 18:54:08'),
(6, 'Problem here', 7, 1, '2021-03-01 18:54:43'),
(7, 'can i comment here', 1, 1, '2021-03-01 18:56:17'),
(8, 'I need content for free\r\n', 8, 6, '2021-03-01 18:57:53'),
(9, '&ltscript&gt I am here ', 8, 1, '2021-03-02 13:29:33'),
(10, '&ltscript&gt I am here ', 8, 1, '2021-03-02 13:31:13'),
(11, '&ltscript&gtalert(\"Hello! I am an alert box!!\");&ltscript&gt', 9, 1, '2021-03-02 13:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(8) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_number` varchar(22) NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_name`, `contact_email`, `contact_number`, `contact_message`) VALUES
(1, 'Harry', 'harry@gmail.com', '78944582316', 'I need code of this website'),
(2, 'Kunal D Patil', 'kunnu@gmail.com', '7458623107', 'I want to learn php'),
(3, 'Nikhil Jaiswal', 'nik.j.mit@gmail.com', '7548691234', 'I have created this website using code igniter');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(8) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(8) NOT NULL,
  `thread_user_id` int(8) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to install pyaudio', 'I am having a problem in installing pyaudio. Its giving multiple errors.', 1, 1, '2021-02-27 17:51:05'),
(2, 'unable to run python on ubuntu', 'I am having a trouble in running python on ubuntu', 1, 4, '2021-02-28 18:38:56'),
(3, 'new title', 'new desc', 1, 2, '2021-02-28 18:42:46'),
(4, 'test', 'test', 2, 5, '2021-02-28 18:46:02'),
(5, 'numpy', 'lets learn numpy', 1, 4, '2021-03-01 18:09:52'),
(6, 'testttt', 'testttt', 1, 1, '2021-03-01 18:50:42'),
(7, 'java', 'script', 2, 4, '2021-03-01 18:53:52'),
(8, 'Core Python', 'Want to learn Core python', 1, 6, '2021-03-01 18:57:35'),
(9, '&ltscript&gtalert(\"Hello! I am an alert box!!\");&ltscript&gt', '&ltscript&gtalert(\"Hello! I am an alert box!!\");&ltscript&gt', 1, 1, '2021-03-02 13:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_sno`, `user_email`, `user_pass`, `user_time`) VALUES
(1, 'surya@idiscuss.com', '$2y$10$XOdR2KaCr/jbAez9sAVUxu3xI2J1zeMoyyXAj1UL53x9EeluD/uF6', '2021-03-01 14:26:23'),
(2, 'harry@harry.com', '$2y$10$efgcnRTskFgwGAR992C8huG5XKiI8pi6EshnPbZ394moJD6Rt3gpS', '2021-03-01 14:33:34'),
(3, 'surya.pratap.2181@gmail.com', '$2y$10$/mwYqMAgN8AQ3WFJzUSXp.guv/e.F4qeJJ.81kYXnrUifH.Ps9om2', '2021-03-01 14:53:06'),
(4, 'test@test', '$2y$10$gjTrCKRuDyJwT9b.PiOnZeAx1LDFQ3vJIdsk760TOgtlgc2FmgEnS', '2021-03-01 16:24:21'),
(5, 'dafsaf@adfa', '$2y$10$Y5fsVAlPy2qYtGyHZY3iUu3z8RUzOS435HYZt89elXy30h797agI6', '2021-03-01 16:57:58'),
(6, 'test@testing.com', '$2y$10$gbSFgiYW342jGWLb38./nOJRoVEIPLOOXzGlgxe01T0sjjWbO/4S6', '2021-03-01 18:56:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
