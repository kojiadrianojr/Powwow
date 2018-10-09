-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 08:40 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `powwow`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_des`) VALUES
(1, 'Gaming', 'All about games.'),
(2, 'Memes', 'All about memes.'),
(3, 'Coding', 'Everything about codes.'),
(4, 'Others', 'Miscellaneous.');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(255) NOT NULL,
  `comment_value` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forum_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forum_id` int(255) NOT NULL,
  `forum_name` varchar(255) NOT NULL,
  `forum_description` varchar(255) NOT NULL,
  `forum_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `forum_views` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `forum_name`, `forum_description`, `forum_date`, `forum_views`, `category_id`, `user_id`) VALUES
(1, 'Wow memes', 'wowo', '2017-10-08 14:27:58', 0, 2, 1),
(2, 'Dota is cancer but with mature players', 'They are the most cancerous players in steam.', '2017-10-08 14:28:44', 0, 1, 1),
(3, 'How to kill Mahatma Ghandi', 'A step by step guide', '2017-10-08 14:31:28', 0, 4, 1),
(4, 'You are as strong as your opponent', 'The steam matchmaking algorithm matches every player with the same statistics even ther reports.', '2017-10-08 14:41:29', 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'jaakosism', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'kojisanity', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_acc_id` int(255) NOT NULL,
  `user_acc_bio` varchar(255) NOT NULL,
  `user_acc_email` varchar(255) NOT NULL,
  `user_acc_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_acc_id`, `user_acc_bio`, `user_acc_email`, `user_acc_date`, `user_acc_pic`, `user_id`) VALUES
(1, '', 'jaako@gmail.com', '2017-10-08 14:14:48.457797', '', 1),
(2, '', 'koji@gmail.com', '2017-10-08 14:36:22.514183', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(255) NOT NULL,
  `vote_cat_id` int(255) NOT NULL,
  `forum_id` int(255) NOT NULL,
  `comment_id` int(255) NOT NULL,
  `vote_com_for` int(255) NOT NULL,
  `vote_active` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vote_category`
--

CREATE TABLE `vote_category` (
  `voter_cat_id` int(255) NOT NULL,
  `vote_cat_name` varchar(255) NOT NULL,
  `vote_cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_ibfk_1` (`forum_id`),
  ADD KEY `comment_ibfk_2` (`user_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `forum_ibfk_1` (`user_id`),
  ADD KEY `forum_ibfk_2` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `vote_ibfk_1` (`vote_cat_id`),
  ADD KEY `vote_ibfk_2` (`forum_id`),
  ADD KEY `vote_ibfk_3` (`comment_id`),
  ADD KEY `vote_ibfk_4` (`user_id`);

--
-- Indexes for table `vote_category`
--
ALTER TABLE `vote_category`
  ADD PRIMARY KEY (`voter_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forum_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_acc_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vote_category`
--
ALTER TABLE `vote_category`
  MODIFY `voter_cat_id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
