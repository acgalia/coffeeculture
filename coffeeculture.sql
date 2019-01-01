-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 04:43 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Mill Grinder'),
(2, 'Pot'),
(3, 'Dripper'),
(4, 'Filter'),
(5, 'Coffee Beans');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `description`, `img_path`, `category_id`) VALUES
(1, 'Coffee Mill KH-5', '100.00', 'lorem ipsum description updated', 'https://kalita.pw/img/files/item_main/2/6/2682/image.jpg?20170106173613', 1),
(2, 'Coffee Picnic SB', '150.00', 'lorem ipsum del 2', 'https://kalita.pw/img/files/item_main/4/2/4209/image.jpg?20171129184214', 1),
(3, 'Mini Mill', '160.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/6/2672/image.jpg?20170106173739', 1),
(4, 'Round Slim Mill (Natural)', '170.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/2/2222/image.jpg?20170106174136', 1),
(5, 'Coffee Mill K-1', '180.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/6/2694/image.jpg?20170106173520', 1),
(6, 'Coffee Mill KH-3', '190.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/6/2680/image.jpg?20170106173634', 1),
(7, 'Round Slim Mill (Black)', '200.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/2/2224/image.jpg?20170106174118', 1),
(8, 'Wave Pot 1 liter', '240.00', 'lorem ipsum pot', 'https://kalita.pw/img/files/item_main/2/7/2748/image.jpg?20170106173006', 2),
(9, 'Stainless Electromagnetic Pot 1.0L N', '250.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/7/2750/image.jpg?20170106172946', 2),
(10, 'Drip Pot Slim 700SSW', '260.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/4/0/4085/image.jpg?20170510154403', 2),
(11, 'Copper Pot 900', '270.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/7/2798/image.jpg?20170106172655', 2),
(12, 'Stainless Thin-Spout Pot 0.7L\r\n', '280.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/7/2740/image.jpg?20170106173142', 2),
(13, 'Enamel Thin-Spout Kettle 2L ', '290.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/7/2726/image.jpg?20170106173325', 2),
(14, 'Enamel Thin-Spout Pot 1L', '300.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/7/2736/image.jpg?20170106173201', 2),
(15, '102-D Plastic Dripper', '250.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/7/2790/image.jpg?20160916120345', 3),
(16, 'Siphon Dripper', '260.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/7/2784/image.jpg?20160916131003', 3),
(17, '101 Ceramic Dripper (Black)', '270.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/8/2822/image.jpg?20160916114109', 3),
(18, 'Dual Dripper (Peppermint Green)', '280.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/2/2266/image.jpg?20160916132147', 3),
(19, 'Caffe Tall (Brown)', '290.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/1/2176/image.jpg?20160916115750', 3),
(20, 'KWF-155 Wave Filter (50P)', '100.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/4/1/4131/image.jpg?20171026185920', 4),
(21, 'KWF-185 Wave Filter (50P)', '100.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/4/1/4132/image.jpg?20171026190018', 4),
(22, 'NK102 Coffee Filter White (100P)', '70.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/4/1/4170/image.jpg?20171002143753', 4),
(23, 'NK101 Coffee Filter White (100P)', '60.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/9/2904/image.jpg?20171002143500', 4),
(37, 'Round Filter #1', '100.00', 'lorem ipsum', 'https://kalita.pw/img/files/item_main/2/8/2858/image.jpg?20170501094724', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `payment_mode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_code`, `purchase_date`, `user_id`, `status_id`, `payment_mode_id`) VALUES
(58, '52906-KOMGP', '2018-12-16 11:40:59', 52, 1, 1),
(59, '66522-XUDLR', '2018-12-16 12:24:49', 52, 1, 1),
(60, '14351-YJAQM', '2018-12-16 15:05:42', 52, 1, 1),
(61, '55151-EZNYN', '2018-12-16 15:07:14', 52, 1, 1),
(62, '11054-USOJK', '2018-12-16 15:34:56', 52, 1, 1),
(63, '15319-JNGFB', '2018-12-16 15:34:59', 52, 1, 1),
(64, '37774-CDOIV', '2018-12-16 15:35:40', 52, 1, 1),
(65, '23994-VEVLL', '2018-12-16 15:37:14', 52, 1, 1),
(66, '46818-YYMKS', '2018-12-16 15:38:10', 52, 1, 1),
(67, '46373-NILUP', '2018-12-16 15:40:19', 52, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `quantity`, `price`, `order_id`, `item_id`) VALUES
(50, 40, '7800.00', 59, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`) VALUES
(1, 'COD'),
(2, 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'delivered'),
(3, 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `password`, `address`) VALUES
(36, 'ffsdf', 'dsfsda', 'clairegalia@yahoo.com', '072a93b0ebc3e29a4290a0c61760b4192a13eaa9', 'fsdfa'),
(38, 'safas', 'dsafa', 'cc@coffee.com', '7effac34489ade20910f2605da28c4e5a430df08', 'sfasf'),
(39, 'asdfa', 'fsdf', 'thelma.namanama@gmail.com', 'ff16722a6906ead1c417535d0e5b1b929c83e52a', 'fasdfsa'),
(40, 'fdsf', 'saf', 'jg@yahoo.com', '0c4dae96df5707c18b9aa77c4914c94e9dfc50d7', 'dsfaf'),
(41, 'njkn', 'rotot', 'hh@yahoo.com', '1c88844bc8921e44bd7f4714aa63212784e3431a', 'nk'),
(42, 'fsf', 'fsdf', 'c@y.com', '9439806a41347a17ee0375bfd9f6ec1a5d26315b', 'fdsa'),
(43, 'dfds', 'fdsaf', 'a@a.com', 'cc40d8f62aa37759291bbc2d37728e8f9ad66232', 'fdas'),
(44, 'anthony', 'carmelo', 'ca@nba.com', '7c7b3e85bab4a3488ddacf4de93225c1dcf7e247', 'sadfas'),
(45, 'saf', 'fsa', 'mj@nba.com', 'bb5f85a22c6f8ac982f124198695490b24ffca58', 'fasd'),
(46, 'fsadf', 'fsdas', 'tae@nba.com', 'b299492e764ed244be62779b27537c6f1b5ad9ed', 'safas'),
(47, 'fs', 'fsda', 'd2@d.com', '0d23e72be0377ab0e899791a9cbf2f0613813c18', 'fdsaf'),
(49, 'fsaf', 'fdsaf', 'tae@tae.com', '8abb9d9a56025346e4c18f6f8790cb836308bf0c', 'fsf'),
(50, 'adsaf', 'fsdaf', 'fsadfa', '1257ee4cb238affd46ef15d06714525c2c7c9018', 'fsa'),
(51, 'Galia', 'sdfa', 'fdsatutu@yu.com', 'b6692ea5df920cad691c20319a6fffd7a4a766b8', '3123'),
(52, 'wg', 'wg', 'wg@wg.com', '5aa1976eca1fee4e35c7b71ec8e8a0ebad9da3d1', 'wg password'),
(54, 'd1', 'd1lastname', 'd1@d.com', 'ee17560c8b77385b5bb8d8687820f9b82f3fdcdf', 'd1'),
(55, 'Aaron', 'Galia', 'acgalia@yahoo.com', '7edd1dd232a61b147151d657b4ad5080896f8f0d', 'ag'),
(56, 'strife', 'cloud', 'cs@cs.com', '67f994533a5d976eed69aeae05e381bf6fa851e8', 'cs'),
(57, 'Galia', 'Melo', 'a.carmelo.galia@gmail.com', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'aa at 123445 street aa avenue aa corner blvd.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `payment_mode_id` (`payment_mode_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_modes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
