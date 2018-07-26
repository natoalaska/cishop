-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2018 at 02:01 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `site_sessions`
--

DROP TABLE IF EXISTS `site_sessions`;
CREATE TABLE `site_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_accounts`
--

DROP TABLE IF EXISTS `store_accounts`;
CREATE TABLE `store_accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `company` varchar(150) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `town` varchar(50) NOT NULL,
  `country` varchar(40) NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `telnum` varchar(30) NOT NULL,
  `email` varchar(65) NOT NULL,
  `date_made` int(11) DEFAULT NULL,
  `pword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_accounts`
--

INSERT INTO `store_accounts` (`id`, `firstname`, `lastname`, `company`, `address1`, `address2`, `town`, `country`, `postcode`, `telnum`, `email`, `date_made`, `pword`) VALUES
(4, 'Nathan', 'Vandermartin', '', '832 E 78th Ave', '', 'Anchorage', 'United States', '99518', '9078303093', 'natoalaska@gmail.com', 1532148336, '$2y$11$42A3kScKFF6iR7nhHUDJteKMfWZZegS55ZohM58Gc75BmE5xYwxvq'),
(5, 'Rachel', 'Martin', '', '832 E 78th Ave', '', 'Anchorage', 'United States', '99518', '9078303229', 'test@email.com', 1532148336, '$2y$11$GpPFSa/zvMWXkSyIqeDw6OwA1KrUMyH8RDKW2NUYvUvIqhOG/ZBHa');

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

DROP TABLE IF EXISTS `store_categories`;
CREATE TABLE `store_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `parent_cat_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `title`, `url`, `parent_cat_id`, `priority`) VALUES
(1, 'Bags', 'Bags', 0, 1),
(2, 'Reusable', 'Reusable', 1, 2),
(3, 'Parent Category 1', 'Parent-Category-1', 0, 2),
(4, 'Sub Category', 'Sub-Category', 3, 3),
(5, 'Sub Category 1', 'Sub-Category-1', 3, 2),
(6, 'Test', 'Test', 1, 1),
(7, 'Test Another', 'Test-Another', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

DROP TABLE IF EXISTS `store_items`;
CREATE TABLE `store_items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `description` text NOT NULL,
  `big_pic` varchar(255) NOT NULL,
  `small_pic` varchar(255) NOT NULL,
  `was_price` decimal(7,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `title`, `url`, `price`, `description`, `big_pic`, `small_pic`, `was_price`, `status`) VALUES
(1, 'First Item', 'First-Item', '100.00', 'This is a test.', 'rachel.jpg', 'rachel.jpg', '0.00', 1),
(4, 'Second Item', 'Second-Item', '100.00', 'Test', '', '', '200.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_item_categories`
--

DROP TABLE IF EXISTS `store_item_categories`;
CREATE TABLE `store_item_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_categories`
--

INSERT INTO `store_item_categories` (`id`, `category_id`, `item_id`) VALUES
(5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_item_colors`
--

DROP TABLE IF EXISTS `store_item_colors`;
CREATE TABLE `store_item_colors` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `color` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_colors`
--

INSERT INTO `store_item_colors` (`id`, `item_id`, `color`) VALUES
(1, 1, 'White'),
(2, 1, 'Black'),
(4, 1, 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_sizes`
--

DROP TABLE IF EXISTS `store_item_sizes`;
CREATE TABLE `store_item_sizes` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `size` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_sizes`
--

INSERT INTO `store_item_sizes` (`id`, `item_id`, `size`) VALUES
(1, 1, 'Small'),
(2, 1, 'Medium'),
(3, 1, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `webpages`
--

DROP TABLE IF EXISTS `webpages`;
CREATE TABLE `webpages` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webpages`
--

INSERT INTO `webpages` (`id`, `url`, `title`, `keywords`, `description`, `content`) VALUES
(1, '', 'Home', '', '', 'This is the Home Page'),
(2, 'contactus', 'Contact Us', '', '', '<h1>Contact Us</h1><div>Here is the contact us page.</div>'),
(5, 'First-Page', 'First Page', '', '', 'This is the first page');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `site_sessions`
--
ALTER TABLE `site_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `store_accounts`
--
ALTER TABLE `store_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_categories`
--
ALTER TABLE `store_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_items`
--
ALTER TABLE `store_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_categories`
--
ALTER TABLE `store_item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_colors`
--
ALTER TABLE `store_item_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_sizes`
--
ALTER TABLE `store_item_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webpages`
--
ALTER TABLE `webpages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store_accounts`
--
ALTER TABLE `store_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store_categories`
--
ALTER TABLE `store_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_item_categories`
--
ALTER TABLE `store_item_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store_item_colors`
--
ALTER TABLE `store_item_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_item_sizes`
--
ALTER TABLE `store_item_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webpages`
--
ALTER TABLE `webpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
