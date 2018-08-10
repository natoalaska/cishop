-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 05:38 PM
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
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `date_published` int(11) NOT NULL,
  `author` varchar(65) NOT NULL,
  `picture` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `url`, `title`, `keywords`, `description`, `content`, `date_published`, `author`, `picture`) VALUES
(1, 'asdfasf', 'asdfasf', 'asdfasdf', 'afssadf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fermentum malesuada magna, vel auctor sem euismod quis. Quisque ac tristique massa. Nulla facilisi. Sed in nibh ipsum. Quisque congue molestie diam non aliquet. In ullamcorper laoreet porta. In ullamcorper felis et ex ultrices, ac congue sem varius. Nulla id mi sit amet nisi mattis consectetur. Suspendisse iaculis augue turpis, vel placerat augue aliquam eget. Nulla aliquam, nisl eget maximus sollicitudin, diam ligula tincidunt lectus, sit amet consectetur diam turpis eu quam. Duis in pulvinar velit, sit amet fringilla magna. Maecenas non orci mattis, sollicitudin risus et, congue tortor. Vivamus imperdiet rhoncus massa vitae volutpat. In a fermentum mi. In porttitor sagittis mi auctor faucibus. Sed consectetur erat sit amet ex tempus ultrices.\r\n\r\nNullam eu urna vitae nibh tincidunt iaculis. Sed pretium ut diam sed sagittis. Nunc sollicitudin ante quis felis aliquet mollis. Aenean maximus porttitor sagittis. Donec accumsan, nibh nec faucibus iaculis, enim eros rhoncus urna, eget dapibus felis sapien nec augue. Ut aliquam velit vel risus sollicitudin, quis dignissim ex consectetur. Cras varius sapien sed laoreet ornare. Phasellus commodo, quam in pellentesque tempus, ante arcu congue ipsum, ac luctus mi nulla nec mauris. Curabitur vitae mattis magna. Integer id venenatis urna. Proin auctor est nec dictum fringilla. Donec semper nunc ut ligula malesuada accumsan. Donec velit enim, dictum at vehicula in, tincidunt et nibh. Mauris cursus euismod tortor ac tristique.\r\n\r\nSuspendisse quis pretium turpis. Fusce non ante erat. Curabitur et purus sodales, volutpat velit eget, laoreet felis. Aliquam suscipit nibh eget felis sodales accumsan. Pellentesque sed porttitor nibh. Integer non facilisis dolor. Ut ac nulla enim. Duis dictum orci massa, ac lobortis sapien ornare ac. Aenean congue turpis eu urna molestie, porta blandit lectus aliquam. Mauris nec risus nec mi aliquet pharetra. Vivamus non aliquet neque. Nulla finibus in erat feugiat lobortis. Fusce justo enim, ultricies ac nulla non, porta dapibus ipsum.', 1532558700, 'Nate V.', 'JGF38wVCeQQDhQHF.jpg'),
(2, 'Second-Post', 'Second Post', 'asdfsadf', 'asdfsaf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fermentum malesuada magna, vel auctor sem euismod quis. Quisque ac tristique massa. Nulla facilisi. Sed in nibh ipsum. Quisque congue molestie diam non aliquet. In ullamcorper laoreet porta. In ullamcorper felis et ex ultrices, ac congue sem varius. Nulla id mi sit amet nisi mattis consectetur. Suspendisse iaculis augue turpis, vel placerat augue aliquam eget. Nulla aliquam, nisl eget maximus sollicitudin, diam ligula tincidunt lectus, sit amet consectetur diam turpis eu quam. Duis in pulvinar velit, sit amet fringilla magna. Maecenas non orci mattis, sollicitudin risus et, congue tortor. Vivamus imperdiet rhoncus massa vitae volutpat. In a fermentum mi. In porttitor sagittis mi auctor faucibus. Sed consectetur erat sit amet ex tempus ultrices.\r\n\r\nNullam eu urna vitae nibh tincidunt iaculis. Sed pretium ut diam sed sagittis. Nunc sollicitudin ante quis felis aliquet mollis. Aenean maximus porttitor sagittis. Donec accumsan, nibh nec faucibus iaculis, enim eros rhoncus urna, eget dapibus felis sapien nec augue. Ut aliquam velit vel risus sollicitudin, quis dignissim ex consectetur. Cras varius sapien sed laoreet ornare. Phasellus commodo, quam in pellentesque tempus, ante arcu congue ipsum, ac luctus mi nulla nec mauris. Curabitur vitae mattis magna. Integer id venenatis urna. Proin auctor est nec dictum fringilla. Donec semper nunc ut ligula malesuada accumsan. Donec velit enim, dictum at vehicula in, tincidunt et nibh. Mauris cursus euismod tortor ac tristique.\r\n\r\nSuspendisse quis pretium turpis. Fusce non ante erat. Curabitur et purus sodales, volutpat velit eget, laoreet felis. Aliquam suscipit nibh eget felis sodales accumsan. Pellentesque sed porttitor nibh. Integer non facilisis dolor. Ut ac nulla enim. Duis dictum orci massa, ac lobortis sapien ornare ac. Aenean congue turpis eu urna molestie, porta blandit lectus aliquam. Mauris nec risus nec mi aliquet pharetra. Vivamus non aliquet neque. Nulla finibus in erat feugiat lobortis. Fusce justo enim, ultricies ac nulla non, porta dapibus ipsum.', 1532645520, 'Nate V.', 'NVmBwBMX7pAUksmN.jpg'),
(8, 'Test', 'Test', 'asdfasdfsafsafsdfsafsafasfsdaf', 'afasdfsadfsadfsdafsdafsdafsadfsdafsdaf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fermentum malesuada magna, vel auctor sem euismod quis. Quisque ac tristique massa. Nulla facilisi. Sed in nibh ipsum. Quisque congue molestie diam non aliquet. In ullamcorper laoreet porta. In ullamcorper felis et ex ultrices, ac congue sem varius. Nulla id mi sit amet nisi mattis consectetur. Suspendisse iaculis augue turpis, vel placerat augue aliquam eget. Nulla aliquam, nisl eget maximus sollicitudin, diam ligula tincidunt lectus, sit amet consectetur diam turpis eu quam. Duis in pulvinar velit, sit amet fringilla magna. Maecenas non orci mattis, sollicitudin risus et, congue tortor. Vivamus imperdiet rhoncus massa vitae volutpat. In a fermentum mi. In porttitor sagittis mi auctor faucibus. Sed consectetur erat sit amet ex tempus ultrices.\r\n\r\nNullam eu urna vitae nibh tincidunt iaculis. Sed pretium ut diam sed sagittis. Nunc sollicitudin ante quis felis aliquet mollis. Aenean maximus porttitor sagittis. Donec accumsan, nibh nec faucibus iaculis, enim eros rhoncus urna, eget dapibus felis sapien nec augue. Ut aliquam velit vel risus sollicitudin, quis dignissim ex consectetur. Cras varius sapien sed laoreet ornare. Phasellus commodo, quam in pellentesque tempus, ante arcu congue ipsum, ac luctus mi nulla nec mauris. Curabitur vitae mattis magna. Integer id venenatis urna. Proin auctor est nec dictum fringilla. Donec semper nunc ut ligula malesuada accumsan. Donec velit enim, dictum at vehicula in, tincidunt et nibh. Mauris cursus euismod tortor ac tristique.\r\n\r\nSuspendisse quis pretium turpis. Fusce non ante erat. Curabitur et purus sodales, volutpat velit eget, laoreet felis. Aliquam suscipit nibh eget felis sodales accumsan. Pellentesque sed porttitor nibh. Integer non facilisis dolor. Ut ac nulla enim. Duis dictum orci massa, ac lobortis sapien ornare ac. Aenean congue turpis eu urna molestie, porta blandit lectus aliquam. Mauris nec risus nec mi aliquet pharetra. Vivamus non aliquet neque. Nulla finibus in erat feugiat lobortis. Fusce justo enim, ultricies ac nulla non, porta dapibus ipsum.', 1532647020, 'Nate V.', 'vzxdWXRPxDndPWNE.jpg'),
(9, 'Reusable', 'Reusable', 'asdfasfsafdasf', 'asdfasdfasdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fermentum malesuada magna, vel auctor sem euismod quis. Quisque ac tristique massa. Nulla facilisi. Sed in nibh ipsum. Quisque congue molestie diam non aliquet. In ullamcorper laoreet porta. In ullamcorper felis et ex ultrices, ac congue sem varius. Nulla id mi sit amet nisi mattis consectetur. Suspendisse iaculis augue turpis, vel placerat augue aliquam eget. Nulla aliquam, nisl eget maximus sollicitudin, diam ligula tincidunt lectus, sit amet consectetur diam turpis eu quam. Duis in pulvinar velit, sit amet fringilla magna. Maecenas non orci mattis, sollicitudin risus et, congue tortor. Vivamus imperdiet rhoncus massa vitae volutpat. In a fermentum mi. In porttitor sagittis mi auctor faucibus. Sed consectetur erat sit amet ex tempus ultrices.\r\n\r\nNullam eu urna vitae nibh tincidunt iaculis. Sed pretium ut diam sed sagittis. Nunc sollicitudin ante quis felis aliquet mollis. Aenean maximus porttitor sagittis. Donec accumsan, nibh nec faucibus iaculis, enim eros rhoncus urna, eget dapibus felis sapien nec augue. Ut aliquam velit vel risus sollicitudin, quis dignissim ex consectetur. Cras varius sapien sed laoreet ornare. Phasellus commodo, quam in pellentesque tempus, ante arcu congue ipsum, ac luctus mi nulla nec mauris. Curabitur vitae mattis magna. Integer id venenatis urna. Proin auctor est nec dictum fringilla. Donec semper nunc ut ligula malesuada accumsan. Donec velit enim, dictum at vehicula in, tincidunt et nibh. Mauris cursus euismod tortor ac tristique.\r\n\r\nSuspendisse quis pretium turpis. Fusce non ante erat. Curabitur et purus sodales, volutpat velit eget, laoreet felis. Aliquam suscipit nibh eget felis sodales accumsan. Pellentesque sed porttitor nibh. Integer non facilisis dolor. Ut ac nulla enim. Duis dictum orci massa, ac lobortis sapien ornare ac. Aenean congue turpis eu urna molestie, porta blandit lectus aliquam. Mauris nec risus nec mi aliquet pharetra. Vivamus non aliquet neque. Nulla finibus in erat feugiat lobortis. Fusce justo enim, ultricies ac nulla non, porta dapibus ipsum.', 1531692000, 'Nate V.', 'T6qVssWFMygMgg4a.jpg');

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
(1, 'First Item', 'First-Item', '100.00', 'This is a test.', '005_Charmeleon3.jpg', '005_Charmeleon3.jpg', '0.00', 1),
(4, 'Second Item', 'Second-Item', '100.00', 'Test', '005_Charmeleon.jpg', '005_Charmeleon.jpg', '200.00', 1),
(5, 'Third Item', 'Third-Item', '50.00', '<div xss=removed><font face=\"Arial, Verdana\"><span xss=removed>$query = \"SELECT store_items.title, store_items.url, store.items_price, store_items.small_pic, store_items.was_price</span></font></div><div xss=removed><font face=\"Arial, Verdana\"><span xss=removed>                FROM store_item_categories INNER JOIN store_items ON store_item_categories.item_id = store_items.id</span></font></div><div xss=removed><font face=\"Arial, Verdana\"><span xss=removed>                WHERE store_item_categories.category_id = $id AND store_items.status = 1\"</span></font></div>', '004_Charmander.jpg', '004_Charmander.jpg', '75.00', 1),
(6, 'Forth Item', 'Forth-Item', '10.00', '<p xss=removed>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras orci lacus, mattis a arcu a, aliquet vulputate ex. Phasellus ac felis eu elit semper eleifend. Cras volutpat dapibus sem eget volutpat. In id purus tincidunt, hendrerit dui ut, consectetur purus. Pellentesque fermentum dictum ullamcorper. Mauris pharetra facilisis diam, vel pulvinar quam pellentesque sed. Vivamus bibendum elit eget tellus maximus, a convallis tortor feugiat. Donec quis est leo.</p><p xss=removed>Proin facilisis vulputate urna, ac pharetra sapien auctor in. Etiam eu felis ut enim ornare convallis. Proin imperdiet augue ac quam interdum efficitur. Aenean dignissim ullamcorper arcu, sit amet lacinia justo ultricies iaculis. Aenean convallis facilisis erat sit amet convallis. Vivamus placerat rutrum erat quis viverra. Nunc ac sem sed enim convallis porta ut ut velit. Mauris eget nulla arcu. Nulla nec consectetur nunc. Proin tristique enim vitae augue sodales semper. Proin a libero lorem. Nulla pretium maximus nunc, eget placerat lectus iaculis scelerisque. Maecenas mollis consequat dapibus.</p><p xss=removed>Nunc elit est, vehicula vitae cursus nec, finibus ac magna. Sed felis dui, feugiat nec justo et, commodo feugiat quam. Nunc rutrum consequat metus, vitae vestibulum diam aliquet a. Duis magna mauris, malesuada vitae porta nec, dapibus ut nulla. Etiam condimentum convallis vestibulum. Suspendisse facilisis aliquam mauris, sit amet porttitor ligula molestie eu. Mauris eros ligula, eleifend ac facilisis eget, porta at risus. Cras volutpat magna sed scelerisque accumsan. Maecenas non porttitor ante. Quisque et neque in arcu tempor euismod in vitae nisl. Donec ut metus dolor. Sed eget odio porttitor, gravida magna vel, tincidunt nulla.</p>', '005_Charmeleon1.jpg', '005_Charmeleon1.jpg', '20.00', 1),
(7, 'Fifth Item', 'Fifth-Item', '10.00', '<p xss=removed>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras orci lacus, mattis a arcu a, aliquet vulputate ex. Phasellus ac felis eu elit semper eleifend. Cras volutpat dapibus sem eget volutpat. In id purus tincidunt, hendrerit dui ut, consectetur purus. Pellentesque fermentum dictum ullamcorper. Mauris pharetra facilisis diam, vel pulvinar quam pellentesque sed. Vivamus bibendum elit eget tellus maximus, a convallis tortor feugiat. Donec quis est leo.</p><p xss=removed>Proin facilisis vulputate urna, ac pharetra sapien auctor in. Etiam eu felis ut enim ornare convallis. Proin imperdiet augue ac quam interdum efficitur. Aenean dignissim ullamcorper arcu, sit amet lacinia justo ultricies iaculis. Aenean convallis facilisis erat sit amet convallis. Vivamus placerat rutrum erat quis viverra. Nunc ac sem sed enim convallis porta ut ut velit. Mauris eget nulla arcu. Nulla nec consectetur nunc. Proin tristique enim vitae augue sodales semper. Proin a libero lorem. Nulla pretium maximus nunc, eget placerat lectus iaculis scelerisque. Maecenas mollis consequat dapibus.</p><p xss=removed>Nunc elit est, vehicula vitae cursus nec, finibus ac magna. Sed felis dui, feugiat nec justo et, commodo feugiat quam. Nunc rutrum consequat metus, vitae vestibulum diam aliquet a. Duis magna mauris, malesuada vitae porta nec, dapibus ut nulla. Etiam condimentum convallis vestibulum. Suspendisse facilisis aliquam mauris, sit amet porttitor ligula molestie eu. Mauris eros ligula, eleifend ac facilisis eget, porta at risus. Cras volutpat magna sed scelerisque accumsan. Maecenas non porttitor ante. Quisque et neque in arcu tempor euismod in vitae nisl. Donec ut metus dolor. Sed eget odio porttitor, gravida magna vel, tincidunt nulla.</p>', '005_Charmeleon2.jpg', '005_Charmeleon2.jpg', '0.00', 1),
(8, 'Sixth Item', 'Sixth-Item', '10.00', '<p xss=removed>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras orci lacus, mattis a arcu a, aliquet vulputate ex. Phasellus ac felis eu elit semper eleifend. Cras volutpat dapibus sem eget volutpat. In id purus tincidunt, hendrerit dui ut, consectetur purus. Pellentesque fermentum dictum ullamcorper. Mauris pharetra facilisis diam, vel pulvinar quam pellentesque sed. Vivamus bibendum elit eget tellus maximus, a convallis tortor feugiat. Donec quis est leo.</p><p xss=removed>Proin facilisis vulputate urna, ac pharetra sapien auctor in. Etiam eu felis ut enim ornare convallis. Proin imperdiet augue ac quam interdum efficitur. Aenean dignissim ullamcorper arcu, sit amet lacinia justo ultricies iaculis. Aenean convallis facilisis erat sit amet convallis. Vivamus placerat rutrum erat quis viverra. Nunc ac sem sed enim convallis porta ut ut velit. Mauris eget nulla arcu. Nulla nec consectetur nunc. Proin tristique enim vitae augue sodales semper. Proin a libero lorem. Nulla pretium maximus nunc, eget placerat lectus iaculis scelerisque. Maecenas mollis consequat dapibus.</p><p xss=removed>Nunc elit est, vehicula vitae cursus nec, finibus ac magna. Sed felis dui, feugiat nec justo et, commodo feugiat quam. Nunc rutrum consequat metus, vitae vestibulum diam aliquet a. Duis magna mauris, malesuada vitae porta nec, dapibus ut nulla. Etiam condimentum convallis vestibulum. Suspendisse facilisis aliquam mauris, sit amet porttitor ligula molestie eu. Mauris eros ligula, eleifend ac facilisis eget, porta at risus. Cras volutpat magna sed scelerisque accumsan. Maecenas non porttitor ante. Quisque et neque in arcu tempor euismod in vitae nisl. Donec ut metus dolor. Sed eget odio porttitor, gravida magna vel, tincidunt nulla.</p>', '004_Charmander1.jpg', '004_Charmander1.jpg', '0.00', 1),
(9, 'Seventh Item', 'Seventh-Item', '1000.00', '<p xss=removed>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras orci lacus, mattis a arcu a, aliquet vulputate ex. Phasellus ac felis eu elit semper eleifend. Cras volutpat dapibus sem eget volutpat. In id purus tincidunt, hendrerit dui ut, consectetur purus. Pellentesque fermentum dictum ullamcorper. Mauris pharetra facilisis diam, vel pulvinar quam pellentesque sed. Vivamus bibendum elit eget tellus maximus, a convallis tortor feugiat. Donec quis est leo.</p><p xss=removed>Proin facilisis vulputate urna, ac pharetra sapien auctor in. Etiam eu felis ut enim ornare convallis. Proin imperdiet augue ac quam interdum efficitur. Aenean dignissim ullamcorper arcu, sit amet lacinia justo ultricies iaculis. Aenean convallis facilisis erat sit amet convallis. Vivamus placerat rutrum erat quis viverra. Nunc ac sem sed enim convallis porta ut ut velit. Mauris eget nulla arcu. Nulla nec consectetur nunc. Proin tristique enim vitae augue sodales semper. Proin a libero lorem. Nulla pretium maximus nunc, eget placerat lectus iaculis scelerisque. Maecenas mollis consequat dapibus.</p><p xss=removed>Nunc elit est, vehicula vitae cursus nec, finibus ac magna. Sed felis dui, feugiat nec justo et, commodo feugiat quam. Nunc rutrum consequat metus, vitae vestibulum diam aliquet a. Duis magna mauris, malesuada vitae porta nec, dapibus ut nulla. Etiam condimentum convallis vestibulum. Suspendisse facilisis aliquam mauris, sit amet porttitor ligula molestie eu. Mauris eros ligula, eleifend ac facilisis eget, porta at risus. Cras volutpat magna sed scelerisque accumsan. Maecenas non porttitor ante. Quisque et neque in arcu tempor euismod in vitae nisl. Donec ut metus dolor. Sed eget odio porttitor, gravida magna vel, tincidunt nulla.</p>', '004_Charmander2.jpg', '004_Charmander2.jpg', '1500.00', 1);

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
(5, 2, 1),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 2, 8),
(11, 2, 9);

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
(5, 'First-Page', 'First Page', '', '', 'This is the first page'),
(6, 'First-Post', 'First Post', 'Keywords', 'Descriptions', 'Here is my first blog post');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store_item_categories`
--
ALTER TABLE `store_item_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
