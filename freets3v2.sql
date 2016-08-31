-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2016 at 02:22 PM
-- Server version: 5.5.49-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `freets3v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `registerTokens`
--

CREATE TABLE IF NOT EXISTS `registerTokens` (
  `token` varchar(40) NOT NULL COMMENT 'The Unique Token Generated',
  `uid` int(11) NOT NULL COMMENT 'The User Id',
  `requested` varchar(20) NOT NULL COMMENT 'The Date when token was created'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resettokens`
--

CREATE TABLE IF NOT EXISTS `resettokens` (
  `token` varchar(40) NOT NULL COMMENT 'The Unique Token Generated',
  `uid` int(11) NOT NULL COMMENT 'The User Id',
  `requested` varchar(20) NOT NULL COMMENT 'The Date when token was created'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE IF NOT EXISTS `servers` (
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

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `email` tinytext NOT NULL,
  `password` varchar(64) NOT NULL,
  `password_salt` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `attempt` varchar(15) NOT NULL DEFAULT '0',
  `ipaddress` varchar(500) NOT NULL,
  `confirmed` int(1) NOT NULL COMMENT 'Confirmed email address',
  `servermade` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `userservers`
--

CREATE TABLE IF NOT EXISTS `userservers` (
  `user_id` int(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `port` int(255) NOT NULL,
  `snapshot` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE IF NOT EXISTS `user_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT 'The user''s ID',
  `token` varchar(15) NOT NULL COMMENT 'A unique token for the user''s device',
  `last_access` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
