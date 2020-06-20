-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 09:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesdashboard`
--
CREATE DATABASE IF NOT EXISTS `salesdashboard` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `salesdashboard`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`) VALUES
(1, 'Bob', 'Dylan', 'bob@dylan.org'),
(2, 'And', 'Anderson', 'and@anderson.com'),
(3, 'Petyo', 'Zhechev', 'petyozh@yahoo.com'),
(4, 'Albert', 'Einstein', 'e@mc.squared'),
(5, 'Bruce', 'Wayne', 'batman@orphan.com');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `EAN` varchar(12) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `EAN`, `quantity`, `price`, `name`) VALUES
(1, '274568122321', 212, 1.25, 'Sewing needle B3'),
(2, '585493382194', 12, 300, 'Space-X rocketship model'),
(3, '805263003095', 200, 9.5, 'Plain White T-Shirt'),
(4, '329094328085', 10, 920, 'Designer dress'),
(5, '198783910090', 2000, 3.5, 'socks'),
(6, '126460888739', 9001, 1, 'CD 700mb'),
(7, '127679633791', 28, 250, 'bicycle helmet'),
(8, '130473533802', 4, 9000, 'royal piano'),
(9, '161101561629', 1000, 0.05, 'candy wrapper'),
(10, '122510636367', 45, 9.99, 'USB drive 1000 GB (made in china)');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `device_info` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `purchase_date`, `device_info`) VALUES
(1, 1, '2020-06-10', 'Googlebot/2.1 (+http://www.google.com/bot.html)\r\n'),
(2, 1, '2020-06-01', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0)\r\n'),
(3, 3, '2020-06-09', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Mobile/15E148 Safari/604.1'),
(4, 3, '2020-06-12', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Mobile/15E148 Safari/604.1'),
(5, 1, '2020-06-09', 'Mozilla/5.0 (Windows NT 6.2; rv:20.0) Gecko/20121202 Firefox/20.0'),
(6, 1, '2020-06-07', 'Opera/9.80 (Macintosh; Intel Mac OS X; U; en) Presto/2.2.15 Version/10.00'),
(7, 2, '2020-06-10', 'Mozilla/5.0 (Windows NT 6.2; rv:20.0) Gecko/20121202 Firefox/20.0'),
(8, 3, '2020-06-08', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36'),
(9, 2, '2020-06-11', 'Mozilla/5.0 (Windows NT 6.2; rv:20.0) Gecko/20121202 Firefox/20.0'),
(10, 3, '2020-06-03', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36'),
(11, 1, '2020-06-05', 'Mozilla/5.0 (Windows NT 6.2; rv:20.0) Gecko/20121202 Firefox/20.0'),
(12, 2, '2020-06-03', 'Opera/9.80 (Macintosh; Intel Mac OS X; U; en) Presto/2.2.15 Version/10.00'),
(13, 1, '2020-06-09', 'Opera/9.80 (Macintosh; Intel Mac OS X; U; en) Presto/2.2.15 Version/10.00'),
(14, 2, '2020-06-11', 'Mozilla/5.0 (Windows NT 6.2; rv:20.0) Gecko/20121202 Firefox/20.0'),
(15, 5, '2020-05-29', 'batmobile tablet'),
(16, 5, '2020-06-02', 'batmobile tablet'),
(17, 5, '2020-06-11', 'batmobile tablet'),
(18, 5, '2020-06-09', 'batmobile tablet'),
(19, 5, '2020-06-18', 'batmobile tablet'),
(20, 5, '2020-06-07', 'batmobile tablet');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `item_id`, `quantity`) VALUES
(1, 1, 4),
(1, 4, 2),
(1, 3, 1),
(2, 1, 2),
(3, 3, 5),
(3, 4, 2),
(4, 2, 1),
(4, 4, 2),
(5, 10, 1),
(5, 6, 1),
(6, 9, 2),
(7, 8, 1),
(8, 8, 2),
(8, 2, 4),
(9, 2, 3),
(10, 9, 1),
(10, 3, 1),
(10, 2, 2),
(10, 5, 11),
(11, 10, 3),
(12, 7, 7),
(13, 2, 12),
(13, 5, 3),
(14, 5, 2),
(15, 5, 2),
(17, 5, 1),
(18, 7, 1),
(19, 10, 3),
(19, 6, 1),
(20, 8, 3),
(16, 8, 4),
(18, 3, 1),
(16, 4, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rich_order_view`
-- (See below for the actual view)
--
CREATE TABLE `rich_order_view` (
`order_id` int(11)
,`item_id` int(11)
,`quantity` int(11)
,`customer_id` int(11)
,`purchase_date` date
,`EAN` varchar(12)
,`price` float
,`name` varchar(255)
,`item_stock` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `rich_order_view`
--
DROP TABLE IF EXISTS `rich_order_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rich_order_view`  AS  select `order_items`.`order_id` AS `order_id`,`order_items`.`item_id` AS `item_id`,`order_items`.`quantity` AS `quantity`,`orders`.`customer_id` AS `customer_id`,`orders`.`purchase_date` AS `purchase_date`,`items`.`EAN` AS `EAN`,`items`.`price` AS `price`,`items`.`name` AS `name`,`items`.`quantity` AS `item_stock` from ((`orders` join `items`) join `order_items`) where `orders`.`id` = `order_items`.`order_id` and `items`.`id` = `order_items`.`item_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `cfk_item_id` (`item_id`),
  ADD KEY `cfk_order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `cfk_item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `cfk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
