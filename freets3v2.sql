-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2016 at 05:11 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freets3v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `resettokens`
--

CREATE TABLE `resettokens` (
  `token` varchar(40) NOT NULL COMMENT 'The Unique Token Generated',
  `uid` int(11) NOT NULL COMMENT 'The User Id',
  `requested` varchar(20) NOT NULL COMMENT 'The Date when token was created'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `location` text NOT NULL,
  `ip` varchar(50) NOT NULL,
  `query` varchar(500) NOT NULL,
  `user` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `maxServers` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` tinytext NOT NULL,
  `password` varchar(64) NOT NULL,
  `password_salt` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `attempt` varchar(15) NOT NULL DEFAULT '0',
  `ipaddress` varchar(500) NOT NULL,
  `servermade` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userservers`
--

CREATE TABLE `userservers` (
  `user_id` int(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `port` int(255) NOT NULL,
  `snapshot` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE `user_devices` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT 'The user''s ID',
  `token` varchar(15) NOT NULL COMMENT 'A unique token for the user''s device',
  `last_access` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
