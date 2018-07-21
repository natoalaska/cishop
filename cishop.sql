-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `site_sessions`;
CREATE TABLE `site_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `store_accounts`;
CREATE TABLE `store_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `company` varchar(150) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `town` varchar(50) NOT NULL,
  `country` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `telnum` varchar(30) NOT NULL,
  `email` varchar(65) NOT NULL,
  `date_made` int(11) DEFAULT NULL,
  `pword` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `store_accounts` (`id`, `firstname`, `lastname`, `company`, `address1`, `address2`, `town`, `country`, `postcode`, `telnum`, `email`, `date_made`, `pword`) VALUES
(4, 'Nathan', 'Vandermartin', '', '832 E 78th Ave', '', 'Anchorage',  'United States',  '99518',  '9078303093', 'natoalaska@gmail.com', 1532146619, NULL),
(5, 'Rachel', 'Martin', '', '832 E 78th Ave', '', 'Anchorage',  'United States',  '99518',  '9078303229', '', 1532148336, NULL);

DROP TABLE IF EXISTS `store_item_colors`;
CREATE TABLE `store_item_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `color` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `store_item_colors` (`id`, `item_id`, `color`) VALUES
(1, 1,  'White'),
(2, 1,  'Black'),
(4, 1,  'Red');

DROP TABLE IF EXISTS `store_item_sizes`;
CREATE TABLE `store_item_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `size` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `store_item_sizes` (`id`, `item_id`, `size`) VALUES
(1, 1,  'Small'),
(2, 1,  'Medium'),
(3, 1,  'Large');

DROP TABLE IF EXISTS `store_items`;
CREATE TABLE `store_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `description` text NOT NULL,
  `big_pic` varchar(255) NOT NULL,
  `small_pic` varchar(255) NOT NULL,
  `was_price` decimal(7,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `store_items` (`id`, `title`, `url`, `price`, `description`, `big_pic`, `small_pic`, `was_price`, `status`) VALUES
(1, 'First Item', 'First-Item', 100.00, 'This is a test.',  'rachel.jpg', 'rachel.jpg', 0.00, 1),
(3, 'Second Item',  'Second-Item',  150.00, 'Second item description.', '', '', 200.00, 0);

-- 2018-07-21 04:55:42