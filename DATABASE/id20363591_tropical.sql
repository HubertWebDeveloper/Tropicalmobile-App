-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2023 at 10:47 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20363591_tropical`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `items` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `shipping_place` varchar(255) NOT NULL,
  `shipping_fee` int(10) NOT NULL,
  `Total_Amount` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `invoice_no`, `customer_email`, `items`, `price`, `shipping_place`, `shipping_fee`, `Total_Amount`, `status`) VALUES
(12, '183751', 'hirwa1998.hubert@gmail.com', 2, 660, 'tana river', 450, 1110, 'delived'),
(13, '679552', 'wiz@gmail.com', 2, 370, 'busia', 700, 1070, 'received'),
(17, '866464', 'remy@gmail.com', 2, 500, 'busia', 700, 1200, 'received'),
(18, '994502', 'new@gmail.com', 3, 750, 'nanyuki', 150, 900, 'approved'),
(19, '786797', 'peter@gmail.com', 2, 500, 'thika', 100, 600, 'received');

-- --------------------------------------------------------

--
-- Table structure for table `cart_pending`
--

CREATE TABLE `cart_pending` (
  `id` int(10) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `product_remain` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_pending`
--

INSERT INTO `cart_pending` (`id`, `customer_email`, `product_title`, `product_image`, `price`, `qty`, `product_remain`, `total`, `status`) VALUES
(58, 'peter@gmail.com', 'TROPIKAL AIR FRESHENER', 'ThumbTropical.jpg', 250, 2, 1, 500, 'pending'),
(59, 'remy@gmail.com', 'FRUIT PARADISE JUICE', 'Thumb_Fruit-Paradise.jpg', 240, 1, 3, 240, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `receiver`, `message`) VALUES
(9, 'hirwa1998.hubert@gmail.com', 'driver', 'I have received my order thank you.'),
(25, 'wiz@gmail.com', 'driver', 'I have received my order thank you.'),
(40, 'remy@gmail.com', 'driver', 'I have received my order thank you.'),
(45, 'shipping manager', 'remy@gmail.com', 'Your Order has been signed to driver hubert contact him on 711111111'),
(46, 'shipping manager', 'remy@gmail.com', 'Your Order has been signed to driver hubert contact him on 711111111'),
(47, 'remy@gmail.com', 'driver', 'I have received my order thank you.'),
(48, 'remy@gmail.com', 'shippingmanager', 'I have received my order thank you.'),
(50, 'new@gmail.com', 'shipping manager', 'Thank you'),
(51, 'shipping manager', 'peter@gmail.com', 'Your Order has been signed to driver hubert contact him on 711111111'),
(52, 'peter@gmail.com', 'driver', 'I have received my order thank you.'),
(53, 'peter@gmail.com', 'shippingmanager', 'I have received my order thank you.'),
(55, 'shipping manager', 'peter@gmail.com', 'Welcome');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(10) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `product_remain` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `customer_email`, `product_title`, `product_image`, `price`, `qty`, `product_remain`, `total`, `status`) VALUES
(42, 'hirwa1998.hubert@gmail.com', ' TROPIKAL 2 IN 1 CAR DASHBOARD CLEANER', 'Thumb_dashboard.jpg', 460, 1, 5, 460, 'pending'),
(43, 'hirwa1998.hubert@gmail.com', 'COW AND GATE', 'Thumb_Cow-and-Gate.jpg', 200, 1, 8, 200, 'pending'),
(47, 'wiz@gmail.com', 'NUTRIPRO PORRIDGE', 'Thumb_Nutripro-Porridge.jpg', 170, 1, 9, 170, 'pending'),
(48, 'wiz@gmail.com', 'TRISA TOOTHBRUSHES', 'Thumb_trisa.jpg', 200, 1, 6, 200, 'pending'),
(53, 'remy@gmail.com', 'TROPIKAL AIR FRESHENER', 'ThumbTropical.jpg', 250, 2, 8, 500, 'pending'),
(55, 'new@gmail.com', 'TROPIKAL AIR FRESHENER', 'ThumbTropical.jpg', 250, 3, 5, 750, 'pending'),
(56, 'peter@gmail.com', 'TROPIKAL AIR FRESHENER', 'ThumbTropical.jpg', 250, 2, 3, 500, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer_rating`
--

CREATE TABLE `customer_rating` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_rating`
--

INSERT INTO `customer_rating` (`id`, `name`, `email`, `rating`) VALUES
(1, 'Remmy Remezo', 'remmy@gmail.com', '3'),
(6, 'Remmy remezo', 'remy@gmail.com', '2.5'),
(7, 'Remmy remezo', 'remy@gmail.com', '4.5'),
(8, 'Peter wiz', 'peter@gmail.com', '3.5');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `order_id`, `driver`, `status`) VALUES
(6, 183751, 'driver 2', 'okay'),
(7, 679552, 'driver 1', 'okay'),
(8, 561611, 'driver 2', 'okay'),
(11, 380157, 'driver hubert', 'okay'),
(12, 183751, 'driver hubert', 'okay'),
(13, 866464, 'driver hubert', 'okay'),
(14, 994502, 'driver hubert', 'okay'),
(15, 786797, 'driver hubert', 'okay');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `amount` int(10) NOT NULL,
  `transaction_code` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_id`, `customer_email`, `amount`, `transaction_code`, `date`, `status`) VALUES
(10, '897074', 'Hubert', 1110, 'AGS6547TB6', '2023-03-06', 'approved'),
(11, '767323', 'Remy wiz', 1070, 'PC262849T4', '2023-03-07', 'approved'),
(14, '218715', 'Remmy remezo', 1200, 'PC262849I7', '2023-04-04', 'approved'),
(15, '349757', 'New wiz', 900, 'PC262849A7', '2023-04-05', 'approved'),
(16, '639876', 'Peter wiz', 600, 'PC262849Y6', '2023-04-05', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `remain` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`, `remain`, `status`) VALUES
(1, 'TROPIKAL AIR FRESHENER', 'ThumbTropical.jpg', 250, 'Tropikal Air freshener is made from a permutation of the best perfumes from around the world. Suitable for use in bathrooms, toilets, living rooms, kitchen and store rooms.', 1, 'InStock'),
(2, 'TROPIKAL DISHWASHING SOAP', 'Thumb_Dishwashing.jpg', 150, '\r\nTropikal dishwashing Soap is a concentrated formulation with excellent cleansing and wetting properties.', 10, 'OutStock'),
(3, 'COW AND GATE', 'Thumb_Cow-and-Gate.jpg', 200, 'As your baby grows, their nutritional needs change too.', 10, 'InStock'),
(4, 'COW AND GATE CEREALS', 'Thumb_Cerial_Cow-and-Gate.jpg', 370, 'Great healthy and nutritious option for babies, giving them strength and powering them as they grow', 10, 'OutStock'),
(5, 'FRUIT PARADISE JUICE', 'Thumb_Fruit-Paradise.jpg', 240, 'Fruit Paradise is a great quality nectar-based fruit juice with a great formulation that acquires it’s great taste and has no preservatives.', 3, 'InStock'),
(6, 'MAYA ISOTONIC WATER', 'Thumb_Maya-Isotonoc-Water.jpg', 200, 'Maya Isotonic Water is a healthy, quality and great tasting drink that is filled with electrolytes which help replenish your body with minerals and nutrients that we lose while doing daily tasks.', 6, 'InStock'),
(7, 'MAYA PURIFIED WATER', 'Thumb_Maya-Purified-Water.jpg', 300, 'Maya Purified Water is refreshing and fresh', 2, 'InStock'),
(8, 'NUTRIPRO PORRIDGE', 'Thumb_Nutripro-Porridge.jpg', 170, 'NutriPro Porridge is flour milled from high quality grain hence its richness in natural flavor, presents nutritional value of 13 vitamins, ', 9, 'InStock'),
(9, 'SELINA SPAGHETTI', 'Thumb_Selina-spaghetti.jpg', 200, 'Selina Spaghetti made from Wheat flour enriched with vitamins and minerals.', 6, 'InStock'),
(10, 'TRISA TOOTHBRUSHES', 'Thumb_trisa.jpg', 200, 'Trisa is a premium oral care brand that offers a wide range of toothbrushes.', 6, 'InStock'),
(11, 'SEBAMED FACE AND BODY WASH', 'Thumb_sebamed_Body-Wash.jpg', 1200, 'Tropikal Air freshener is made from a permutation of the best perfumes from around the world. Suitable for use in bathrooms, toilets, living rooms, kitchen and store rooms.', 13, 'InStock'),
(12, ' TROPIKAL 2 IN 1 CAR DASHBOARD CLEANER', 'Thumb_dashboard.jpg', 460, 'ropikal Air freshener is made from a permutation of the best perfumes from around the world. Suitable for use in bathrooms,', 5, 'InStock'),
(13, 'TROPIKAL HAND-SANITIZER', 'Thumb_Handsanitizer.jpg', 200, 'Tropikal instant hand-sanitizer contains 70% alcohol, kills germs that cause illness.', 6, 'InStock');

-- --------------------------------------------------------

--
-- Table structure for table `send_order`
--

CREATE TABLE `send_order` (
  `id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `send_order`
--

INSERT INTO `send_order` (`id`, `product_name`, `qty`, `price`, `total`, `date`, `status`) VALUES
(5, 'COW AND GATE', 5, 120, 600, '2023-03-12', 'payed'),
(6, 'SEBAMED FACE AND BODY WASH', 2, 200, 400, '2023-04-04', 'payed'),
(7, 'SEBAMED FACE AND BODY WASH', 8, 100, 800, '2023-04-05', 'payed');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_order`
--

CREATE TABLE `supplier_order` (
  `id` int(10) NOT NULL,
  `supplier_det` varchar(150) NOT NULL,
  `product` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_order`
--

INSERT INTO `supplier_order` (`id`, `supplier_det`, `product`, `qty`, `status`) VALUES
(4, 'supplier new', 'COW AND GATE', 5, 'order received'),
(5, 'supplier Peter', 'SEBAMED FACE AND BODY WASH', 2, 'order received'),
(6, 'supplier Peter', 'SEBAMED FACE AND BODY WASH', 8, 'order received');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment`
--

CREATE TABLE `supplier_payment` (
  `id` int(10) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `Data` date NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier_payment`
--

INSERT INTO `supplier_payment` (`id`, `supplier_name`, `amount`, `Data`, `note`) VALUES
(1, 'supplier Peter', 600, '2023-03-12', 'Payment received.'),
(3, 'supplier Peter', 400, '2023-04-04', 'Payment received.'),
(4, 'supplier Peter', 800, '2023-04-05', 'Payment received.');

-- --------------------------------------------------------

--
-- Table structure for table `usermember`
--

CREATE TABLE `usermember` (
  `id` int(10) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermember`
--

INSERT INTO `usermember` (`id`, `user_type`, `email`, `name`, `county`, `phone`, `password`, `status`) VALUES
(2, 'stockmanager', 'stockmanager@gmail.com', 'stock Manager', 'meru', 788888888, '123', 'approved'),
(3, 'financemanager', 'financemanager@gmail.com', 'finance Manager', 'meru', 799999999, '123', 'approved'),
(4, 'shippingmanager', 'shippingmanager@gmail.com', 'shipping Manager', 'meru', 744444444, '123', 'approved'),
(5, 'driver', 'driver1@gmail.com', 'driver hubert', 'meru', 711111111, '123', 'approved'),
(6, 'supplier', 'supplier@gmail.com', 'supplier Peter', 'meru', 781794795, '123', 'approved'),
(7, 'driver', 'driver2@gmail.com', 'driver yolly', 'meru', 722222222, '123', 'approved'),
(8, 'admin', 'admin123@gmail.com', 'admin', 'meru', 700011101, '123', 'approved'),
(12, 'customer', 'hirwa1998.hubert@gmail.com', 'Hubert', 'meru', 781794795, '123', 'approved'),
(13, 'customer', 'wiz@gmail.com', 'Remy wiz', 'embu', 787878787, '123', 'approved'),
(16, 'customer', 'remy@gmail.com', 'Remmy remezo', 'machakos', 787878787, '123', 'approved'),
(18, 'customer', 'new@gmail.com', 'New wiz', 'chuka', 723232323, '1234', 'approved'),
(19, 'customer', 'peter@gmail.com', 'Peter wiz', 'chuka', 756565656, '123', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `view_chat`
--

CREATE TABLE `view_chat` (
  `id` int(10) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `view_chat`
--

INSERT INTO `view_chat` (`id`, `sender`, `receiver`, `message`) VALUES
(5, 'shipping manager', 'gakubafraco@gmail.com', 'Your Order has been signed to driver1@gmail.com contact him on 711111111'),
(6, 'gakubafraco@gmail.com', 'shipping manager', 'thank you'),
(7, 'shipping manager', 'gakubafraco@gmail.com', 'your welcome.'),
(49, 'shipping manager', 'new@gmail.com', 'Your Order has been signed to driver hubert contact him on 711111111'),
(54, 'peter@gmail.com', 'shippingmanager', 'Thank you, I have received product.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_pending`
--
ALTER TABLE `cart_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_rating`
--
ALTER TABLE `customer_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_order`
--
ALTER TABLE `send_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_order`
--
ALTER TABLE `supplier_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermember`
--
ALTER TABLE `usermember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_chat`
--
ALTER TABLE `view_chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart_pending`
--
ALTER TABLE `cart_pending`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `customer_rating`
--
ALTER TABLE `customer_rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `send_order`
--
ALTER TABLE `send_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier_order`
--
ALTER TABLE `supplier_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usermember`
--
ALTER TABLE `usermember`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `view_chat`
--
ALTER TABLE `view_chat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
