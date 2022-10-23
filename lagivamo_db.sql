-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2022 at 08:22 PM
-- Server version: 5.7.39-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lagivamo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorieId` int(12) NOT NULL,
  `categorieName` varchar(255) NOT NULL,
  `categorieDesc` text NOT NULL,
  `categorieCreateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorieId`, `categorieName`, `categorieDesc`, `categorieCreateDate`) VALUES
(1, 'VEG PIZZA', 'A delight for veggie lovers! Choose from our wide range of delicious vegetarian pizzas, it\'s softer and tastier', '2021-03-17 18:16:28'),
(2, 'NON-VEG PIZZA', 'Choose your favourite non-veg pizzas from the Domino\'s Pizza menu. Get fresh non-veg pizza with your choice of crusts & toppings', '2021-03-17 18:17:14'),
(4, 'SIDES ORDERS', 'Complement your pizza with wide range of sides available at Domino\'s Pizza India', '2021-03-17 18:19:10'),
(5, 'BEVERAGES', 'Complement your pizza with wide range of beverages available at Domino\'s Pizza India', '2021-03-17 21:58:58'),
(6, 'CHOICE OF CRUSTS', 'Fresh Pan Pizza Tastiest Pan Pizza. ... Domino\'s freshly made pan-baked pizza; deliciously soft ,buttery,extra cheesy and delightfully crunchy.', '2021-03-18 07:55:28'),
(7, 'BURGER PIZZA', 'Domino’s Pizza Introducing all new Burger Pizza with the tag line looks like a burger, tastes like a pizza. Burger Pizza is burger sized but comes in a small pizza box. It is come with pizza toppings such as herbs, vegetables, tomato sauce and mozzarella,', '2021-03-18 08:06:30'),
(8, 'CHOICE OF TOPPINGS', 'CHOICE OF TOPPINGS', '2021-03-18 08:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `orderId` int(21) NOT NULL DEFAULT '0' COMMENT 'If problem is not related to the order then order id = 0',
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactreply`
--

CREATE TABLE `contactreply` (
  `id` int(21) NOT NULL,
  `contactId` int(21) NOT NULL,
  `userId` int(23) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deliverydetails`
--

CREATE TABLE `deliverydetails` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `deliveryBoyName` varchar(35) NOT NULL,
  `deliveryBoyPhoneNo` bigint(25) NOT NULL,
  `deliveryTime` int(200) NOT NULL COMMENT 'Time in minutes',
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliverydetails`
--

INSERT INTO `deliverydetails` (`id`, `orderId`, `deliveryBoyName`, `deliveryBoyPhoneNo`, `deliveryTime`, `dateTime`) VALUES
(1, 1, 'Tman', 745103359, 72, '2022-03-15 18:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `l_prices`
--

CREATE TABLE `l_prices` (
  `id` int(5) NOT NULL,
  `item_id` int(5) NOT NULL,
  `large_price` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_prices`
--

INSERT INTO `l_prices` (`id`, `item_id`, `large_price`) VALUES
(1, 75, 20),
(2, 76, 20),
(3, 77, 18),
(4, 78, 20),
(5, 79, 20),
(6, 82, 65),
(7, 83, 35),
(8, 84, 35);

-- --------------------------------------------------------

--
-- Table structure for table `ml_prices`
--

CREATE TABLE `ml_prices` (
  `id` int(5) NOT NULL,
  `item_id` int(5) NOT NULL,
  `medium_price` int(12) NOT NULL,
  `large_price` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ml_prices`
--

INSERT INTO `ml_prices` (`id`, `item_id`, `medium_price`, `large_price`) VALUES
(1, 2, 40, 60),
(2, 5, 50, 100),
(3, 5, 50, 100),
(4, 7, 50, 100),
(5, 12, 45, 85),
(6, 13, 60, 89),
(7, 14, 60, 89),
(9, 16, 64, 102),
(10, 17, 68, 115),
(11, 18, 60, 89);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `pizzaId` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderId`, `pizzaId`, `itemQuantity`) VALUES
(1, 1, 14, 6),
(2, 1, 38, 1),
(3, 1, 53, 1),
(4, 2, 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `amount` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=cash on delivery, \r\n1=online ',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `orderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES
(1, 2, '1234main street, maharaj town', 40044, 745103359, 1549, '0', '4', '2022-03-15 17:56:24'),
(2, 4, '1234main street, maharaj town', 40044, 745103359, 139, '0', '0', '2022-04-18 17:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `pizzaId` int(12) NOT NULL,
  `pizzaName` varchar(255) NOT NULL,
  `pizzaPrice` int(12) NOT NULL,
  `pizzaDesc` text NOT NULL,
  `pizzaCategorieId` int(12) NOT NULL,
  `pizzaPubDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price_branch` varchar(3) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`pizzaId`, `pizzaName`, `pizzaPrice`, `pizzaDesc`, `pizzaCategorieId`, `pizzaPubDate`, `price_branch`) VALUES
(2, 'Double Cheese Hommie', 20, 'The ever-popular Mozzarella- loaded with extra cheese... oodies of it', 1, '2021-03-17 21:20:58', 'ml'),
(5, 'Mexican Green Wave Island', 25, 'A pizza loaded with crunchy onions, crisp capsicum, juicy tomatoes and jalapeno with a liberal sprinkling of exotic Mexican herbs.\r\n\r\n', 1, '2021-03-17 21:23:48', 'ml'),
(7, 'Veg Extravaganza', 25, 'A pizza that decidedly staggers under an overload of golden corn, exotic black olives, crunchy onions, crisp capsicum, succulent mushrooms, juicyfresh tomatoes and jalapeno - with extra cheese to go all around.\r\n\r\n', 1, '2021-03-17 21:25:42', 'ml'),
(12, 'Indian Queen Tongue', 25, 'It is hot. It is spicy. It is oh-so-Indian. Jalapeno with capsicum I red paprika I mint mayo\r\n\r\n', 1, '2021-03-17 21:29:41', 'ml'),
(13, 'PEPPER BARBECUE CHICKEN', 29, 'Pepper Barbecue, Chicken & Cheese', 2, '2021-03-17 21:34:37', 'ml'),
(14, 'BEEF SAUSAGE', 29, 'Beef Sausage & Cheese', 2, '2021-03-17 21:35:31', 'ml'),
(16, 'Awesome Supreme', 32, 'Bite into supreme delight of Black Olives, Onions, Grilled Mushrooms, Pepper BBQ Chicken, Peri-Peri Chicken, Grilled Chicken Strips\r\n\r\n', 2, '2021-03-17 21:37:21', 'ml'),
(17, 'Beef & Chicken Dominator ', 35, 'Treat your taste buds with Double Pepper Barbecue Chicken, Peri-Peri Chicken, Beef Sausage & Grilled Chicken Strips', 2, '2021-03-17 21:38:13', 'ml'),
(18, 'PEPPER BARBECUE & ONION', 29, 'Pepper Barbecue Chicken & Onion', 2, '2021-03-17 21:39:49', 'ml'),
(42, 'Cheese Burst', 10, 'Crust with oodles of yummy liquid cheese filled inside.', 6, '2021-03-18 07:57:27', 'n'),
(43, 'Classic Hand Tossed', 8, 'Dominos traditional hand stretched crust, crisp on outside, soft & light inside.', 6, '2021-03-18 07:59:52', 'n'),
(44, 'Wheat Thin Crust', 6, 'Presenting the light healthier and delicious light wheat thin crust from Dominos.', 6, '2021-03-18 08:00:39', 'n'),
(45, 'Fresh Pan Pizza', 5, 'Tastiest Pan Pizza.Ever.\r\nDominoï¿½s freshly made pan-baked pizza; deliciously soft ,buttery,extra cheesy and delightfully crunchy.', 6, '2021-03-18 08:01:29', 'n'),
(47, 'BURGER PIZZA - INDIAN QUEEN TONGUE', 45, 'Bite into delight! Witness the epic Burger Pizza made with Jalapeno with capsicum I red paprika I mint mayo', 7, '2021-03-18 08:09:17', 'n'),
(48, 'BURGER PIZZA - AWESOME SUPREME', 50, 'The good just got better! Treat yourself to the premium taste of the Burger Pizza ,Bite into supreme delight of Black Olives, Onions, Grilled Mushrooms, Pepper BBQ Chicken, Peri-Peri Chicken, Grilled Chicken Strips', 7, '2021-03-18 08:09:59', 'n'),
(49, 'BURGER PIZZA- BEEF & CHICKEN DOMINATOR ', 53, 'Treat your taste buds with Double Pepper Barbecue Chicken, Peri-Peri Chicken, Beef Sausage & Grilled Chicken Strips', 7, '2021-03-18 08:10:37', 'n'),
(50, 'Extra Cheese', 8, 'Extra Cheese', 8, '2021-03-18 08:14:52', 'n'),
(51, 'veg toppings', 12, 'Crisp Capsicum,  Jalapenos, Mushroom, Golden Corn, Cherry Tomatoes, Jalapeno, Red Pepper & Babycorn.', 8, '2021-03-18 08:15:36', 'n'),
(52, 'Non Veg Toppings', 16, 'Barbeque Chicken,  beef sausage , chunky chicken, bacon, russian sausage, and ham or mince.', 8, '2021-03-18 08:16:29', 'n'),
(53, 'Packaged Drinking Water', 10, '500ml Drinking Water	', 5, '2021-03-18 08:20:40', 'n'),
(69, 'Steak & Kidney', 18, 'mmmmmhmmmm wow indeed it is a mouth watering palatable yummy when you bite our steak and kidney within your pie.', 4, '2022-06-22 15:53:36', 'n'),
(70, 'Pepper Steak', 18, 'Indeed it\'s a small world of being a foodie, one bite, more palatable taste.', 4, '2022-06-22 16:18:12', 'n'),
(71, 'Chicken & Mushroom', 16, 'One bite, can tell that indeed it is a small world, because chiken is everywhere', 4, '2022-06-22 16:36:59', 'n'),
(72, 'Chocolate Donut', 7, '', 4, '2022-06-22 16:44:47', 'n'),
(73, 'Vanilla Donut', 7, '', 4, '2022-06-22 16:44:47', 'n'),
(74, 'Plain Donut', 7, '', 4, '2022-06-22 16:44:47', 'n'),
(75, 'Bubblegum Milkshake', 15, 'Bubblegum flavor', 4, '2022-06-22 16:51:00', 'l'),
(76, 'Banana Milkshake', 15, 'Banana flavor', 4, '2022-06-22 16:51:00', 'l'),
(77, 'Vanilla Milkshake', 14, 'Vanilla flavor', 4, '2022-06-22 16:51:00', 'l'),
(78, 'Strawberry Milkshake', 15, 'Strawberry flavor', 4, '2022-06-22 16:51:00', 'l'),
(79, 'Chocolate Milkshake', 15, 'Chocolate flavor', 4, '2022-06-22 16:51:00', 'l'),
(80, 'Fruit Salad Desert', 18, 'Dessert make with chocolate and vanilla ice-cream, topped with sliced strawberries. ', 4, '2022-06-22 17:17:29', 'n'),
(81, 'Fruit Punch Dessert', 15, 'Dessert made with mixed fruits(Kiwi, Orange, Strawberry & Pineapple).', 4, '2022-06-22 17:17:29', 'n'),
(82, 'Gourmet Donut Ice-Cream ', 30, 'Ice-cream made with donut, chocolate sprinkles, Oreos biscuits & cone ice-cream. ', 4, '2022-06-22 17:39:33', 'l'),
(83, 'Choco Fruity Ice-cream ', 25, 'Vanilla & chocolate ice-cream made with red berries, slim chocolate, sliced orange, drizzled with chocolate & bubblegum sauce.', 4, '2022-06-22 17:50:43', 'l'),
(84, 'Oreo & Caramel Ice-cream', 25, 'Vanilla & caramel flavoured ice-cram served with Oreos biscuits, sprinkled with chocolate. ', 4, '2022-06-22 17:50:43', 'l');

-- --------------------------------------------------------

--
-- Table structure for table `sitedetail`
--

CREATE TABLE `sitedetail` (
  `tempId` int(11) NOT NULL,
  `systemName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact1` bigint(21) NOT NULL,
  `contact2` bigint(21) DEFAULT NULL COMMENT 'Optional',
  `address` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitedetail`
--

INSERT INTO `sitedetail` (`tempId`, `systemName`, `email`, `contact1`, `contact2`, `address`, `dateTime`) VALUES
(1, 'Pizza World', 'info@lagivamonatepizza.co.za', 745103359, 814498919, '6880 Block F4.<br> New Eersterus, Hammanskraal 0400', '2021-03-23 19:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`, `joinDate`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1111111111, '1', '$2y$10$AAfxRFOYbl7FdN17rN3fgeiPu/xQrx6MnvRGzqjVHlGqHAM4d9T1i', '2021-04-11 11:40:58'),
(2, 'thabo5636', 'Thabo', 'Tshabalala', '47thabo@gmail.com', 745103359, '0', '$2y$10$DQ4BVpcJupfXt0NFpRuxUuoOVjCnKOkFuPkNl1lXZ15KljIc5B/wm', '2022-03-14 23:53:04'),
(3, 'phumlani', 'phumzile', 'jollof', '47thabo@gmail.com', 745103359, '0', '$2y$10$f3gsp.EY5EKp332PIqFNb.jXVKKttOUmFQ1TXJFXKGlw290nfRGim', '2022-03-15 17:54:48'),
(4, 'lagiva', 'Gift Nkaxa', 'Nyoni', 'giftnkaxanyonign@gmail.com', 814498919, '0', '$2y$10$4muDpM.FiocH1AonMlVu/u6qyK4J8WtnVch05qFg93ii8/j2UD2SS', '2022-04-18 17:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

CREATE TABLE `viewcart` (
  `cartItemId` int(11) NOT NULL,
  `pizzaId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorieId`);
ALTER TABLE `categories` ADD FULLTEXT KEY `categorieName` (`categorieName`,`categorieDesc`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `contactreply`
--
ALTER TABLE `contactreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderId` (`orderId`);

--
-- Indexes for table `l_prices`
--
ALTER TABLE `l_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ml_prices`
--
ALTER TABLE `ml_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizzaId`);
ALTER TABLE `pizza` ADD FULLTEXT KEY `pizzaName` (`pizzaName`,`pizzaDesc`);

--
-- Indexes for table `sitedetail`
--
ALTER TABLE `sitedetail`
  ADD PRIMARY KEY (`tempId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`cartItemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorieId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactreply`
--
ALTER TABLE `contactreply`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizzaId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `sitedetail`
--
ALTER TABLE `sitedetail`
  MODIFY `tempId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
