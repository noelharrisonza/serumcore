-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2012 at 12:54 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `serum`
--

-- --------------------------------------------------------

--
-- Table structure for table `global_settings`
--

CREATE TABLE IF NOT EXISTS `global_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(255) DEFAULT NULL,
  `setting_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `localisations_options`
--

CREATE TABLE IF NOT EXISTS `localisations_options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `localisation_strings`
--

CREATE TABLE IF NOT EXISTS `localisation_strings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `language` int(11) DEFAULT NULL,
  `string_value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) DEFAULT NULL,
  `system_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `system_name`) VALUES
(1, 'Contacts', 'contacts'),
(3, 'Groups', 'groups'),
(4, 'Users', 'users');

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE IF NOT EXISTS `nodes` (
  `id` varchar(255) NOT NULL,
  `parent_node_id` varchar(255) DEFAULT NULL,
  `node_key` varchar(255) DEFAULT NULL,
  `node_value` text,
  `date_created` datetime DEFAULT NULL,
  `creator_node` varchar(255) DEFAULT NULL,
  `revison` int(11) DEFAULT NULL,
  `node_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`id`, `parent_node_id`, `node_key`, `node_value`, `date_created`, `creator_node`, `revison`, `node_type`) VALUES
('1', NULL, 'title', 'Noel Harrison', '2012-08-14 20:07:33', '1', 1, 1),
('2', '1', 'mobile', '0718854924', '2012-08-14 21:05:31', NULL, NULL, NULL),
('3', '1', 'email', 'noel.harrison2@gmail.com', '2012-08-14 21:05:35', NULL, NULL, NULL),
('4', NULL, 'title', 'Jonathan Wagener', '2012-08-16 19:27:25', '1', 1, 1),
('502ee699e448911919', '0', 'title', 'Sacha Wagener', '2012-08-18 02:49:29', '502ee699e448911919', 1, 1),
('502ee699e64965404', '502ee699e448911919', 'mobile', '', '2012-08-18 02:49:29', NULL, NULL, NULL),
('502ee699e6b9a13605', '502ee699e448911919', 'email', 'sacha.wagener@gmail.com', '2012-08-18 02:49:29', NULL, NULL, NULL),
('502ee79fa206712125', '0', 'title', 'Savannah Alsatian', '2012-08-18 02:53:51', NULL, 1, 1),
('502ee79fa29ce12498', '502ee79fa206712125', 'mobile', '', '2012-08-18 02:53:51', NULL, 1, 0),
('502ee79fa336b30115', '502ee79fa206712125', 'email', '', '2012-08-18 02:53:51', NULL, 1, 0),
('6', NULL, 'title', 'Pierre Bezuidenhout', '2012-08-16 20:42:51', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `node_settings`
--

CREATE TABLE IF NOT EXISTS `node_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(255) DEFAULT NULL,
  `setting_value` varchar(255) DEFAULT NULL,
  `node_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `node_templates`
--

CREATE TABLE IF NOT EXISTS `node_templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_node_id` int(11) DEFAULT NULL,
  `node_key` varchar(255) DEFAULT NULL,
  `node_key_name` varchar(255) DEFAULT NULL,
  `node_type` int(8) DEFAULT NULL,
  `field_type` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `node_templates`
--

INSERT INTO `node_templates` (`id`, `parent_node_id`, `node_key`, `node_key_name`, `node_type`, `field_type`) VALUES
(1, NULL, 'title', 'Title', 1, 'text'),
(2, 1, 'mobile', 'Mobile Number', NULL, 'text'),
(3, 1, 'email', 'Email Address', NULL, 'text');

-- --------------------------------------------------------

--
-- Table structure for table `node_types`
--

CREATE TABLE IF NOT EXISTS `node_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `node_types`
--

INSERT INTO `node_types` (`id`, `type`) VALUES
(1, 'contacts');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
