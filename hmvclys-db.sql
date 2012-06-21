-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2012 at 10:24 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.3-7+squeeze13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('8a9349b86f0427bfa7a6e99bf3c622b3', '192.168.2.2', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1', 1340300156, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_modul`
--

CREATE TABLE IF NOT EXISTS `user_modul` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(30) NOT NULL,
  `soyad` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ceptel` varchar(10) NOT NULL,
  `tarih` date NOT NULL,
  `saat` time NOT NULL,
  `registerIp` varchar(15) NOT NULL,
  `registerHost` varchar(100) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `upass` varchar(32) NOT NULL,
  `logged_in` tinyint(1) NOT NULL,
  `logincount` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_modul`
--

INSERT INTO `user_modul` (`userID`, `ad`, `soyad`, `email`, `ceptel`, `tarih`, `saat`, `registerIp`, `registerHost`, `uname`, `upass`, `logged_in`, `logincount`) VALUES
(9, 'demo', 'demo', 'demo@demo.com', '1234567899', '2012-06-20', '17:05:03', '0', '0', 'demo', '1068813f52ead9d4cc10d7beaaa0076b', 1, 3);
