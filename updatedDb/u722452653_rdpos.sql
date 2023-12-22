-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 10:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u722452653_rdpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `acc_code` varchar(255) NOT NULL,
  `acc_created` date NOT NULL,
  `acc_username` varchar(255) NOT NULL,
  `acc_password` varchar(255) NOT NULL,
  `acc_fname` varchar(255) NOT NULL,
  `acc_lname` varchar(255) NOT NULL,
  `acc_birthday` date DEFAULT NULL,
  `acc_type` varchar(255) NOT NULL,
  `acc_status` int(11) NOT NULL,
  `acc_display_status` int(11) NOT NULL,
  `acc_email` varchar(255) NOT NULL,
  `acc_contact` varchar(255) NOT NULL,
  `emp_image` varchar(255) NOT NULL,
  `acc_cover_img` varchar(255) DEFAULT NULL,
  `acc_added` varchar(255) NOT NULL,
  `acc_lastEdit` datetime DEFAULT NULL,
  `Otp` varchar(6) NOT NULL,
  `incorrect_attempts` int(11) DEFAULT NULL,
  `otp_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_code`, `acc_created`, `acc_username`, `acc_password`, `acc_fname`, `acc_lname`, `acc_birthday`, `acc_type`, `acc_status`, `acc_display_status`, `acc_email`, `acc_contact`, `emp_image`, `acc_cover_img`, `acc_added`, `acc_lastEdit`, `Otp`, `incorrect_attempts`, `otp_expiration`) VALUES
(16, '6038616', '2023-06-01', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'joshua admin', 'padilla', '2000-10-03', 'administrator', 0, 0, 'andyanderson12s3@gmail.com', '09770987021', '654f1b294cdda.jpg', '654f1c27e9c6f.gif', '', '2023-11-11 14:16:07', '0', NULL, NULL),
(31, '6038631', '2023-10-18', 'angela denise', 'dfeeb6d86e0182f79454b65e2081bb26ba3a37cb98559f24b3e0c0b8b6edc8a3', 'Angela Denise', 'Flores', '2011-10-03', 'administrator', 2, 0, 'angenise24@gmail.com', '09454454744', '654f3070d8f56.jpg', '', '', '2023-11-11 15:42:40', '833406', NULL, NULL),
(185, '09680185', '2023-11-04', 'zyrine alcarez', '61e36b4d463fcf248af31898805050d4b137bb54e74c4e7e9b95b35ccb0f9753', 'zyrine', 'alcarez', '2000-11-17', 'cashier', 0, 0, 'andersonandy046@gmail.com', '09454454744', '', '', '', '2023-11-07 18:21:50', '0', 0, '2023-11-04 18:46:23'),
(186, '47557186', '2023-11-07', 'ayanna', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 'ayanna', 'misola', '2001-11-08', 'customer', 0, 0, 'perezallyn614@gmail.com', '09454454744', '65522b396c69b.jpg', '', '', '2023-11-13 21:57:13', '', 0, '2023-11-14 23:28:02'),
(187, '16822187', '2023-11-11', 'mike12', 'a51c7d1c92b69e1fbabe19fa27bab5aae20a45e289df28d9802a3bc8867794a5', 'mike', 'love', '1999-06-23', 'customer', 0, 0, 'rickandmorty0224@gmail.com', '09980998872', '', NULL, '', NULL, '0', 0, '2023-11-11 15:25:59'),
(188, '34783188', '2023-11-13', 'deniseEsteban', '5c19a36a67e9062eaa9a0263497c766a93e7d07119104cd6cb7872ddd15b7234', 'Denise', 'Esteban', '2001-11-16', 'customer', 0, 0, 'deniseesteban@gmail.com', '09454454744', '65522c6da2717.jpg', NULL, '', '2023-11-13 22:02:21', '0', 0, '2023-11-13 22:06:30'),
(189, '53231189', '2023-11-14', 'Andyanderson', '60b759b3b6e0065267aa9a85cc72146d2dc1402450f929228d8699a16a8ef807', 'Andy', 'anderson', '2000-11-16', 'customer', 0, 0, 'masterparj@gmail.com', '09454454744', '', NULL, '', NULL, '0', 0, '2023-11-14 23:02:43'),
(190, '02571190', '2023-11-15', 'zyrineAlcarez', 'af6890b7f80b0f2edfcda1c39b35913ed52e919016323acb0c032938deff39a6', 'Zyrine', 'Alcarez', '2000-11-01', 'customer', 0, 0, 'alcarezzyrinearreza.pdm@gmail.com', '09454454744', '', NULL, '', NULL, '0', 0, '2023-11-15 22:53:11'),
(191, '72449191', '2023-11-19', 'mangJuan', '344c7aa7819eb4b193f2301e181fe405f4db2752d98450b1a640f5a4efc85aaa', 'Juan', 'Delacruz', NULL, 'deliveryStaff', 0, 0, 'mangJuan@gmail.com', '09454454744', '6559aab529fe9.jpg', NULL, '', NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_prod_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_prodQty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `category_status` int(11) NOT NULL,
  `category_date_created` varchar(255) NOT NULL,
  `category_date_edited` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_status`, `category_date_created`, `category_date_edited`) VALUES
(1, 'Accessories', 'thing which can be added to something else in order to make it more useful, versatile, or attractive. a range of bathroom accessories', 1, '2023-10-12 14:25:57', '2023-10-22 18:14:05'),
(2, 'foods', 'food, substance consisting essentially of protein, carbohydrate, fat, and other nutrients used in the body of an organism to sustain growth and vital processes and to furnish energy. The absorption and utilization of food by the body is fundamental to nut', 1, '2023-10-12 14:25:57', '2023-10-16 16:02:39'),
(3, 'medicines', 'Medicines are chemicals or compounds used to cure, halt, or prevent disease ease symptoms or help in the diagnosis of illnesses. Advances in medicines have enabled doctors to cure many diseases and save lives.', 1, '2023-10-12 14:25:57', '2023-10-22 18:32:15'),
(23, 'category 1', 'addasdawdasdwad', 0, '2023-10-13 00:05:16', '2023-10-13 00:24:44'),
(24, 'Vitaminss', 'awdwadwadwd', 0, '2023-10-15 21:30:18', '2023-10-16 16:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `discount_name` varchar(255) NOT NULL,
  `discount_rate` float NOT NULL,
  `discount_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `discount_name`, `discount_rate`, `discount_status`) VALUES
(2, 'discount 5 %', 5, 1),
(8, 'discount 2%', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `maintinance`
--

CREATE TABLE `maintinance` (
  `system_id` int(11) NOT NULL,
  `system_name` varchar(255) NOT NULL,
  `system_banner` varchar(255) NOT NULL,
  `system_logo` varchar(255) NOT NULL,
  `system_content` varchar(255) NOT NULL,
  `system_address` varchar(255) NOT NULL,
  `system_contact` varchar(255) NOT NULL,
  `system_tax` float NOT NULL,
  `system_last_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintinance`
--

INSERT INTO `maintinance` (`system_id`, `system_name`, `system_banner`, `system_logo`, `system_content`, `system_address`, `system_contact`, `system_tax`, `system_last_update`) VALUES
(1, 'RDPOS', '6534fbcd9b0f9.jpg', '6534e356c9783.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, error esse, eos necessitatibus saepe temporibus aliquam aperiam quas reiciendis possimus laborum voluptates magni ad. Quam tempore officiis eligendi sed aut', 'Paso bagbaguin near highway road sta.maria bulacan', '09454454744', 1, '2023-11-06 22:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mess_id` int(11) NOT NULL,
  `mess_sender_id` int(11) NOT NULL,
  `mess_content` varchar(255) DEFAULT NULL,
  `mess_type` varchar(255) NOT NULL,
  `mess_status` int(11) NOT NULL,
  `mess_reciever_id` int(11) DEFAULT NULL,
  `mess_date` datetime NOT NULL,
  `mess_seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_payment`
--

CREATE TABLE `mode_of_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_code` varchar(9) NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `payment_number` varchar(255) NOT NULL,
  `payment_image` varchar(255) DEFAULT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_date_added` varchar(255) NOT NULL,
  `payment_date_edited` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mode_of_payment`
--

INSERT INTO `mode_of_payment` (`payment_id`, `payment_code`, `payment_name`, `payment_number`, `payment_image`, `payment_status`, `payment_type`, `payment_date_added`, `payment_date_edited`) VALUES
(57, '002984357', 'Gcash', '09454454744', '364696137_2896008720532733_7482788190110373134_n.jpg', 0, 'ewallet', '2023-10-17 13:31:40', '2023-11-14 09:17:46'),
(58, '006436458', 'MAYA', '09123456785', 'Maya Standee-1.webp', 0, 'ewallet', '2023-10-17 14:10:10', '2023-11-14 09:16:26'),
(67, '006653667', 'BPI', '1000000123', 'bpi.webp', 0, 'bank', '2023-11-11 16:12:42', '2023-11-14 09:04:37'),
(69, '002018069', 'BDO', '1032165498', '7.jpg', 0, 'bank', '2023-11-14 09:12:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `order_transaction_code` varchar(10) NOT NULL,
  `orders_prod_id` int(11) NOT NULL,
  `orders_customer_id` int(11) NOT NULL,
  `orders_nickname` varchar(255) NOT NULL,
  `orders_email` varchar(255) NOT NULL,
  `orders_contact` varchar(255) NOT NULL,
  `orders_paymethod` varchar(255) NOT NULL,
  `orders_proof` varchar(255) DEFAULT NULL,
  `orders_qty` int(11) NOT NULL,
  `orders_stock_id` int(11) NOT NULL,
  `orders_prod_price` double NOT NULL,
  `orders_subtotal` double NOT NULL,
  `orders_gradeTotal` varchar(255) NOT NULL,
  `orders_ship_fee` double NOT NULL,
  `orders_tax` float NOT NULL,
  `orders_voucher_name` varchar(255) DEFAULT NULL,
  `orders_voucher_rate` varchar(255) DEFAULT NULL,
  `orders_address` varchar(255) NOT NULL,
  `orders_latitude` varchar(255) DEFAULT NULL,
  `orders_longitude` varchar(255) DEFAULT NULL,
  `orders_date` datetime NOT NULL,
  `orders_dates_delivered` datetime DEFAULT NULL,
  `orders_status` varchar(255) NOT NULL,
  `display_status` int(11) NOT NULL,
  `order_barcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `order_transaction_code`, `orders_prod_id`, `orders_customer_id`, `orders_nickname`, `orders_email`, `orders_contact`, `orders_paymethod`, `orders_proof`, `orders_qty`, `orders_stock_id`, `orders_prod_price`, `orders_subtotal`, `orders_gradeTotal`, `orders_ship_fee`, `orders_tax`, `orders_voucher_name`, `orders_voucher_rate`, `orders_address`, `orders_latitude`, `orders_longitude`, `orders_date`, `orders_dates_delivered`, `orders_status`, `display_status`, `order_barcode`) VALUES
(1156, 'RD11983', 217, 190, 'Zyrine Alcarez', 'Alcarezzyrinearreza.pdm@gmail.com', '09454454744', 'Cash on Delivery', NULL, 4, 310, 46, 184, '174.8', 59, 1, '5% OffThis Month', '5', 'Region III (Central Luzon) Bulacan Bocaue Duhat balabaran street sapron hills', '', '', '2023-11-18 18:02:53', '2023-11-19 15:15:02', 'To-receive', 0, 'RD11983.png'),
(1158, 'RD61977', 218, 188, 'Denise Esteban', 'Deniseesteban@gmail.com', '09454454744', 'Gcash', '3831dbe2-352e-4409-a2e2-fc87d11cab0a (1).jpg', 1, 309, 1545.5, 1545.5, '1236.4', 100, 1, 'Sale Offer-20% OffThis Week', '20', 'Region IV-A (CALABARZON) Cavite Cavite City Barangay 19 (Gemini) 2600 labuyo street', '', '', '2023-11-19 14:02:40', NULL, 'Pending', 0, 'RD61977.png'),
(1159, 'RD12491', 219, 188, 'Denise Esteban', 'Deniseesteban@gmail.com', '09454454744', 'Gcash', '646162f0f12033590909f1338dcaa748.jpeg', 2, 308, 100, 200, '200', 100, 1, '', '0', 'Region IV-A (CALABARZON) Cavite Cavite City Barangay 19 (Gemini) 2600 labuyo street', '', '', '2023-11-19 14:08:09', NULL, 'To-ship', 0, 'RD12491.png'),
(1160, 'RD12491', 218, 188, 'Denise Esteban', 'Deniseesteban@gmail.com', '09454454744', 'Gcash', '646162f0f12033590909f1338dcaa748.jpeg', 1, 309, 1545.5, 1545.5, '1236.4', 100, 1, 'Sale Offer-20% OffThis Week', '20', 'Region IV-A (CALABARZON) Cavite Cavite City Barangay 19 (Gemini) 2600 labuyo street', '', '', '2023-11-19 14:08:09', NULL, 'To-ship', 0, 'RD12491.png'),
(1161, 'RD12491', 217, 188, 'Denise Esteban', 'Deniseesteban@gmail.com', '09454454744', 'Gcash', '646162f0f12033590909f1338dcaa748.jpeg', 1, 310, 46, 46, '43.7', 100, 1, '5% OffThis Month', '5', 'Region IV-A (CALABARZON) Cavite Cavite City Barangay 19 (Gemini) 2600 labuyo street', '', '', '2023-11-19 14:08:09', NULL, 'To-ship', 0, 'RD12491.png'),
(1162, 'RD12491', 216, 188, 'Denise Esteban', 'Deniseesteban@gmail.com', '09454454744', 'Gcash', '646162f0f12033590909f1338dcaa748.jpeg', 1, 313, 40, 40, '38', 100, 1, '5% OffThis Month', '5', 'Region IV-A (CALABARZON) Cavite Cavite City Barangay 19 (Gemini) 2600 labuyo street', '', '', '2023-11-19 14:08:09', NULL, 'To-ship', 0, 'RD12491.png'),
(1163, 'RD12491', 215, 188, 'Denise Esteban', 'Deniseesteban@gmail.com', '09454454744', 'Gcash', '646162f0f12033590909f1338dcaa748.jpeg', 1, 312, 80, 80, '64', 100, 1, 'Sale Offer-20% OffThis Week', '20', 'Region IV-A (CALABARZON) Cavite Cavite City Barangay 19 (Gemini) 2600 labuyo street', '', '', '2023-11-19 14:08:09', NULL, 'To-ship', 0, 'RD12491.png');

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `pickup_id` int(11) NOT NULL,
  `p_customer_name` varchar(255) NOT NULL,
  `p_date` datetime NOT NULL,
  `p_pickup_date` varchar(255) NOT NULL,
  `p_pickup_time` varchar(255) NOT NULL,
  `p_pickup_code` varchar(12) NOT NULL,
  `p_prod_id` int(11) NOT NULL,
  `p_acc_id` int(11) NOT NULL,
  `p_paymethod` varchar(255) NOT NULL,
  `p_proof` varchar(255) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_stock_id` int(11) NOT NULL,
  `p_prod_price` double NOT NULL,
  `p_subtotal` double NOT NULL,
  `p_grand_total` varchar(255) NOT NULL,
  `p_tax` double NOT NULL,
  `p_voucher_name` varchar(255) DEFAULT NULL,
  `p_voucher_rate` varchar(255) DEFAULT NULL,
  `p_status` varchar(255) NOT NULL,
  `p_display_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_cart`
--

CREATE TABLE `pos_cart` (
  `pos_cart_id` int(11) NOT NULL,
  `pos_cart_prod_id` int(11) NOT NULL,
  `pos_cart_user_id` int(11) NOT NULL,
  `cart_prodQty` int(11) NOT NULL,
  `pos_cart_stock_id` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_orders`
--

CREATE TABLE `pos_orders` (
  `orders_orders_id` int(11) NOT NULL,
  `orders_tcode` varchar(8) NOT NULL,
  `orders_prod_id` int(10) NOT NULL,
  `orders_prod_price` double NOT NULL,
  `orders_prodQty` int(11) NOT NULL,
  `orders_subtotal` double NOT NULL,
  `orders_discount` int(11) DEFAULT NULL,
  `orders_discount_name` varchar(255) DEFAULT NULL,
  `orders_tax` double NOT NULL,
  `orders_date` datetime NOT NULL,
  `orders_final` double NOT NULL,
  `orders_payment` double NOT NULL,
  `orders_change` double NOT NULL,
  `orders_user_id` int(11) NOT NULL,
  `orders_status` int(11) NOT NULL,
  `return_availability` int(11) NOT NULL,
  `orders_barcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_orders`
--

INSERT INTO `pos_orders` (`orders_orders_id`, `orders_tcode`, `orders_prod_id`, `orders_prod_price`, `orders_prodQty`, `orders_subtotal`, `orders_discount`, `orders_discount_name`, `orders_tax`, `orders_date`, `orders_final`, `orders_payment`, `orders_change`, `orders_user_id`, `orders_status`, `return_availability`, `orders_barcode`) VALUES
(852, 'RD72935', 219, 100, 4, 400, 0, '', 74.81, '2023-11-19 11:48:53', 7481, 8000, 519, 16, 0, 0, 'RD72935.png'),
(853, 'RD72935', 217, 46, 5, 230, 0, '', 74.81, '2023-11-19 11:48:53', 7481, 8000, 519, 16, 0, 0, 'RD72935.png'),
(854, 'RD72935', 218, 1545.5, 2, 3091, 0, '', 74.81, '2023-11-19 11:48:53', 7481, 8000, 519, 16, 0, 0, 'RD72935.png'),
(855, 'RD72935', 215, 80, 1, 80, 0, '', 74.81, '2023-11-19 11:48:53', 7481, 8000, 519, 16, 0, 0, 'RD72935.png'),
(856, 'RD72935', 216, 40, 92, 3680, 0, '', 74.81, '2023-11-19 11:48:53', 7481, 8000, 519, 16, 0, 1, 'RD72935.png'),
(857, 'RD94921', 218, 1545.5, 5, 7727.5, 406, 'discount 5 %', 77.21, '2023-11-19 11:49:44', 7721.13, 10000, 2278.87, 16, 0, 0, 'RD94921.png'),
(858, 'RD94921', 216, 40, 10, 400, 406, 'discount 5 %', 77.21, '2023-11-19 11:49:44', 7721.13, 10000, 2278.87, 16, 0, 1, 'RD94921.png'),
(859, 'RD67327', 216, 40, 5, 200, 0, '', 17.46, '2023-11-19 13:50:28', 1745.5, 1750, 4.5, 16, 0, 1, 'RD67327.png'),
(860, 'RD67327', 218, 1545.5, 1, 1545.5, 0, '', 17.46, '2023-11-19 13:50:28', 1745.5, 1750, 4.5, 16, 0, 0, 'RD67327.png'),
(861, 'RD48501', 215, 80, 1, 80, 38, 'discount 2%', 18.73, '2023-11-19 14:05:15', 1873.27, 1900, 26.73, 16, 0, 0, 'RD48501.png'),
(862, 'RD48501', 216, 40, 1, 40, 38, 'discount 2%', 18.73, '2023-11-19 14:05:15', 1873.27, 1900, 26.73, 16, 0, 0, 'RD48501.png'),
(863, 'RD48501', 217, 46, 1, 46, 38, 'discount 2%', 18.73, '2023-11-19 14:05:15', 1873.27, 1900, 26.73, 16, 0, 0, 'RD48501.png'),
(864, 'RD48501', 219, 100, 2, 200, 38, 'discount 2%', 18.73, '2023-11-19 14:05:15', 1873.27, 1900, 26.73, 16, 0, 0, 'RD48501.png'),
(865, 'RD48501', 218, 1545.5, 1, 1545.5, 38, 'discount 2%', 18.73, '2023-11-19 14:05:15', 1873.27, 1900, 26.73, 16, 0, 0, 'RD48501.png'),
(866, 'RD86406', 217, 46, 1, 46, 0, '', 17.32, '2023-11-19 15:38:37', 1731.5, 2000, 268.5, 185, 0, 0, 'RD86406.png'),
(867, 'RD86406', 219, 100, 1, 100, 0, '', 17.32, '2023-11-19 15:38:37', 1731.5, 2000, 268.5, 185, 0, 0, 'RD86406.png'),
(868, 'RD86406', 216, 40, 1, 40, 0, '', 17.32, '2023-11-19 15:38:37', 1731.5, 2000, 268.5, 185, 0, 0, 'RD86406.png'),
(869, 'RD86406', 218, 1545.5, 1, 1545.5, 0, '', 17.32, '2023-11-19 15:38:37', 1731.5, 2000, 268.5, 185, 0, 0, 'RD86406.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_code` varchar(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_currprice` varchar(255) NOT NULL,
  `prod_unit_id` int(11) NOT NULL,
  `prod_category_id` varchar(11) NOT NULL,
  `prod_critical` int(11) NOT NULL,
  `prod_description` varchar(255) DEFAULT NULL,
  `prod_voucher_id` int(11) NOT NULL,
  `prod_image` varchar(255) DEFAULT NULL,
  `prod_added` datetime NOT NULL,
  `prod_edit` datetime DEFAULT NULL,
  `prod_status` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_code`, `prod_name`, `prod_currprice`, `prod_unit_id`, `prod_category_id`, `prod_critical`, `prod_description`, `prod_voucher_id`, `prod_image`, `prod_added`, `prod_edit`, `prod_status`, `barcode`) VALUES
(215, 'PROD33922', 'Bayong', '80', 64, '1', 15, 'Bayong is a Filipinotagalog term which refers to bags made of woven leaves. Depending on the province, these organic materials include buri, pandan, and abaca, the plantsource of which are native to the Philippines.', 26, '65576e0ad9832.jpg', '2023-11-17 21:43:38', NULL, 0, 'PROD33922.png'),
(216, 'PROD28163', 'Chick Booster', '40', 30, '2', 15, 'ChickBoost is an energy booster, formulated for DOC, turkey poults and ducklings. ChickBoost enables chicks to have access to water and feed at hatchery or during transportation. It helps chicks to start feeding quicker after arrival on the farm.', 27, '65576e81c151c.jpeg', '2023-11-17 21:45:37', NULL, 0, 'PROD28163.png'),
(217, 'PROD49518', 'BMEG Enertone', '46', 30, '2', 10, 'Thunderbird Enertone is a specialty feed designed for the maintenance stage of gamebirds made from precleaned choice grains and high quality gamefowl pellets.', 27, '65576ee773a88.jpg', '2023-11-17 21:47:19', NULL, 0, 'PROD49518.png'),
(218, 'PROD22555', 'Power Cat Tuna', '1545.5', 17, '2', 15, 'POWERCAT has designed a formula with beneficial nutrients to support and maintain the good health of your cat. A steady diet of POWERCAT also aids in maintaining a shiny and healthy coat, which is an important indicator of cat health. POWERCAT contains on', 26, '65576f39e117f.jpg', '2023-11-17 21:48:41', NULL, 0, 'PROD22555.png'),
(219, 'PROD54246', 'Dog collar', '100', 64, '1', 10, 'A dog collar is a piece of material put around the neck of a dog. A collar may be used for restraint, identification, fashion, protection, or training although some aversive training collars are illegal in many countries. Identification tags and medical i', 0, '65576f9a641d5.jpg', '2023-11-17 21:50:18', NULL, 0, 'PROD54246.png');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedcart`
--

CREATE TABLE `purchasedcart` (
  `purchase_id` int(11) NOT NULL,
  `purchase_sup_id` int(11) NOT NULL,
  `purchase_prod_id` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `purchase_price` varchar(255) NOT NULL,
  `purchase_expiration` varchar(255) DEFAULT NULL,
  `purchased_discount` varchar(255) DEFAULT NULL,
  `purchased_Tax` varchar(255) DEFAULT NULL,
  `purchased_Tax_Amount` varchar(255) NOT NULL,
  `purchased_Total_Cost` varchar(255) NOT NULL,
  `purchased_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchasedcart`
--

INSERT INTO `purchasedcart` (`purchase_id`, `purchase_sup_id`, `purchase_prod_id`, `purchase_qty`, `purchase_price`, `purchase_expiration`, `purchased_discount`, `purchased_Tax`, `purchased_Tax_Amount`, `purchased_Total_Cost`, `purchased_date`) VALUES
(200, 1, 217, 10, '50', '2023-11-30', '150', '0.02', '10', '350', '2023-11-19 16:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_record`
--

CREATE TABLE `purchased_record` (
  `precord_id` int(11) NOT NULL,
  `precord_sup_id` int(11) NOT NULL,
  `precord_prod_id` int(11) NOT NULL,
  `precord_qty` int(11) NOT NULL,
  `precord_reference` varchar(255) NOT NULL,
  `precord_price` varchar(255) NOT NULL,
  `precord_expiration` date NOT NULL,
  `precord_discount` varchar(255) NOT NULL,
  `precord_Tax` varchar(255) NOT NULL,
  `precord_Tax_Amount` varchar(255) NOT NULL,
  `precord_Total_Cost` varchar(255) NOT NULL,
  `precord_date` datetime NOT NULL,
  `purchased_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchased_record`
--

INSERT INTO `purchased_record` (`precord_id`, `precord_sup_id`, `precord_prod_id`, `precord_qty`, `precord_reference`, `precord_price`, `precord_expiration`, `precord_discount`, `precord_Tax`, `precord_Tax_Amount`, `precord_Total_Cost`, `precord_date`, `purchased_status`) VALUES
(156, 32, 219, 20, 'SUP0001', '90', '0000-00-00', '100', '2%', '36', '1700', '2023-11-17 21:55:58', 0),
(157, 32, 218, 50, 'SUP0001', '1405.00', '2023-12-09', '0', '0', '0', '70250', '2023-11-17 21:55:58', 0),
(158, 32, 217, 100, 'SUP0001', '40.00', '2023-12-09', '0', '10%', '400', '4000', '2023-11-17 21:55:58', 0),
(159, 32, 216, 1000, 'SUP0001', '36.00', '2023-12-08', '35', '2%', '720', '35965', '2023-11-17 21:55:58', 0),
(160, 32, 215, 50, 'SUP0001', '72.00', '0000-00-00', '0', '2%', '72', '3600', '2023-11-17 21:55:58', 0),
(161, 33, 216, 500, 'JSUP0001', '30', '2023-12-09', '0', '2%', '300', '15000', '2023-11-17 21:58:19', 0),
(162, 35, 216, 2, 'JULSUP0001', '25', '2023-11-19', '0', '0', '0', '50', '2023-11-17 21:59:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `returns_pos`
--

CREATE TABLE `returns_pos` (
  `ret_id` int(11) NOT NULL,
  `ret_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ret_datepurchase` datetime NOT NULL,
  `ret_transaction_code` varchar(8) NOT NULL,
  `ret_product_id` int(11) NOT NULL,
  `ret_qty` int(11) NOT NULL,
  `ret_prod_price` double NOT NULL,
  `ret_type` varchar(255) NOT NULL,
  `ret_reason` varchar(255) NOT NULL,
  `ret_cashier_id` int(11) NOT NULL,
  `ret_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returns_pos`
--

INSERT INTO `returns_pos` (`ret_id`, `ret_date`, `ret_datepurchase`, `ret_transaction_code`, `ret_product_id`, `ret_qty`, `ret_prod_price`, `ret_type`, `ret_reason`, `ret_cashier_id`, `ret_status`) VALUES
(257, '2023-11-19 03:56:21', '2023-11-19 11:49:44', 'RD94921', 216, 10, 40, 'replace', 'defective', 16, 0),
(258, '2023-11-19 05:53:56', '2023-11-19 13:50:28', 'RD67327', 216, 2, 40, 'refund', 'defective', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `return_ordering`
--

CREATE TABLE `return_ordering` (
  `ret_ol_id` int(11) NOT NULL,
  `ret_ol_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ret_ol_datepurchase` datetime NOT NULL,
  `ret_ol_transaction_code` varchar(8) NOT NULL,
  `ret_ol_product_code` varchar(11) NOT NULL,
  `ret_ol_qty` int(11) NOT NULL,
  `ret_ol_request` varchar(255) NOT NULL,
  `ret_ol_paymethod` varchar(255) NOT NULL,
  `ret_ol_reason` varchar(255) NOT NULL,
  `ret_ol_customer_name` varchar(255) NOT NULL,
  `ret_ol_contact_number` varchar(255) NOT NULL,
  `ret_ol_address` varchar(255) NOT NULL,
  `ret_ol_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `return_ordering`
--

INSERT INTO `return_ordering` (`ret_ol_id`, `ret_ol_date`, `ret_ol_datepurchase`, `ret_ol_transaction_code`, `ret_ol_product_code`, `ret_ol_qty`, `ret_ol_request`, `ret_ol_paymethod`, `ret_ol_reason`, `ret_ol_customer_name`, `ret_ol_contact_number`, `ret_ol_address`, `ret_ol_status`) VALUES
(4, '2023-07-26 04:28:20', '0000-00-00 00:00:00', 'RD18284', 'PROD20211', 27, 'return', '', 'invalid', 'new new new', '09454454744', 'sta.rosa 2 marilao bulacan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `s_id` int(11) NOT NULL,
  `s_created` datetime NOT NULL DEFAULT current_timestamp(),
  `s_precord_reference` varchar(255) NOT NULL,
  `s_expiration` date DEFAULT NULL,
  `s_prod_id` int(11) NOT NULL,
  `s_amount` int(11) NOT NULL,
  `s_spl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`s_id`, `s_created`, `s_precord_reference`, `s_expiration`, `s_prod_id`, `s_amount`, `s_spl_id`) VALUES
(308, '2023-11-17 21:55:58', 'SUP0001', '0000-00-00', 219, 129, 32),
(309, '2023-11-17 21:55:58', 'SUP0001', '2023-12-09', 218, 13, 32),
(310, '2023-11-17 21:55:58', 'SUP0001', '2023-12-09', 217, 48, 32),
(311, '2023-11-17 21:55:58', 'SUP0001', '2023-12-08', 216, 0, 32),
(312, '2023-11-17 21:55:58', 'SUP0001', '0000-00-00', 215, 37, 32),
(313, '2023-11-17 21:58:19', 'JSUP0001', '2023-12-09', 216, 92, 33),
(314, '2023-11-17 21:59:46', 'JULSUP0001', '2023-11-19', 216, 0, 35);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `spl_id` int(11) NOT NULL,
  `spl_code` varchar(9) NOT NULL,
  `spl_name` varchar(255) NOT NULL,
  `spl_email` varchar(255) NOT NULL,
  `spl_contact` varchar(255) NOT NULL,
  `spl_address` varchar(255) NOT NULL,
  `spl_date_added` varchar(255) NOT NULL,
  `spl_date_edited` varchar(255) NOT NULL,
  `spl_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`spl_id`, `spl_code`, `spl_name`, `spl_email`, `spl_contact`, `spl_address`, `spl_date_added`, `spl_date_edited`, `spl_status`) VALUES
(1, 'SU1289519', 'supplier 1', 'supplier6@gmail.com', '09454454749', 'ZIP codes are also part of the typical Philippine address. Address format Edit. Street, e.g. BLDG 1A5U11 MRH SITE 4 TALA: District, e.g. TALA 1: Barangay', '2023-10-16 12:47:09', '2023-10-18 13:16:38', 0),
(2, 'SU1797120', 'supplier 2', 'supplier2@gmail.com', '09454454744', 'ZIP codes are also part of the typical Philippine address. Address format Edit. Street, e.g. BLDG 1A5U11 MRH SITE 4 TALA: District, e.g. TALA 1: Barangay', '2023-10-16 12:48:37', '', 0),
(3, 'SU0632821', 'supplier 3', 'supplier3@gmail.com', '09454454744', 'ZIP codes are also part of the typical Philippine address. Address format Edit. Street, e.g. BLDG 1A5U11 MRH SITE 4 TALA: District, e.g. TALA 1: Barangay', '2023-10-16 12:48:54', '2023-10-18 13:15:08', 0),
(32, 'SU7467032', 'suppler zyrine', 'supplierzyrine@gmail.com', '09457444444', 'supplier ng feeds', '2023-10-20 11:10:46', '', 0),
(33, 'SU8295633', 'Joshua supplies', 'padillajoshuaanderson.pdm@gmail.com', '09454454744', 'sta.rosa 2 marilao bulacan', '2023-10-20 13:40:40', '', 0),
(34, 'SU5546334', 'supplier jeff', 'jeffersoncarreon22@gmail.com', '09923795722', 'Loma de gato', '2023-10-29 13:03:15', '', 0),
(35, 'SU5898035', 'julliana', 'julianairapadrigon5@gmail.com', '09123456789', 'abangan norte', '2023-11-06 22:51:18', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE `system_log` (
  `sys_id` int(11) NOT NULL,
  `sys_user_id` int(11) NOT NULL,
  `sys_login` datetime NOT NULL,
  `sys_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_log`
--

INSERT INTO `system_log` (`sys_id`, `sys_user_id`, `sys_login`, `sys_logout`) VALUES
(721, 190, '2023-11-18 06:00:00', NULL),
(722, 188, '2023-11-19 10:06:00', NULL),
(723, 190, '2023-11-19 01:35:00', NULL),
(724, 190, '2023-11-19 01:35:00', NULL),
(725, 188, '2023-11-19 02:00:00', NULL),
(726, 190, '2023-11-19 03:52:00', NULL),
(727, 190, '2023-11-19 04:06:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `address_region_id` int(11) NOT NULL,
  `address_psgc_code` varchar(255) NOT NULL,
  `address_region_name` varchar(255) NOT NULL,
  `address_region_code` varchar(255) NOT NULL,
  `address_rate` varchar(255) NOT NULL,
  `address_status` int(11) NOT NULL,
  `address_cod` int(11) NOT NULL,
  `address_paynow` int(11) NOT NULL,
  `address_date_edited` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`address_region_id`, `address_psgc_code`, `address_region_name`, `address_region_code`, `address_rate`, `address_status`, `address_cod`, `address_paynow`, `address_date_edited`) VALUES
(1, '010000000', 'Region I (Ilocos Region)', '01', '50', 0, 0, 0, '2023-11-11 16:10:41'),
(2, '020000000', 'Region II (Cagayan Valley)', '02', '26', 1, 0, 1, '2023-11-11 16:10:43'),
(3, '030000000', 'Region III (Central Luzon)', '03', '59', 0, 0, 0, '2023-11-11 16:10:52'),
(4, '040000000', 'Region IV-A (CALABARZON)', '04', '100', 1, 0, 0, '2023-11-14 23:31:28'),
(5, '170000000', 'MIMAROPA', '17', '20', 0, 1, 0, '2023-11-14 23:31:58'),
(6, '050000000', 'Region V (Bicol Region)', '05', '100', 1, 0, 0, '2023-10-22 11:15:15'),
(8, '060000000', 'Region VI (Western Visayas)', '06', '60', 0, 0, 0, '2023-10-22 11:07:45'),
(10, '070000000', 'Region VII (Central Visayas)', '07', '70', 0, 0, 0, '2023-10-22 02:45:17'),
(12, '080000000', 'Region VIII (Eastern Visayas)', '08', '90', 0, 0, 0, '2023-10-22 02:49:26'),
(13, '090000000', 'Region IX (Zamboanga Peninsula)', '09', '95', 1, 0, 0, '2023-10-22 02:42:31'),
(15, '100000000', 'Region X (Northern Mindanao)', '10', '100', 0, 0, 0, '2023-10-22 02:27:38'),
(17, '110000000', 'Region XI (Davao Region)', '11', '150', 0, 0, 0, '2023-10-22 02:49:28'),
(19, '120000000', 'Region XII (SOCCSKSARGEN)', '12', '120', 0, 0, 0, ''),
(20, '130000000', 'National Capital Region (NCR)', '13', '45', 1, 0, 0, '2023-10-22 02:49:31'),
(22, '140000000', 'Cordillera Administrative Region (CAR)', '14', '140', 0, 0, 0, ''),
(24, '150000000', 'Autonomous Region in Muslim Mindanao (ARMM)', '15', '299', 0, 0, 0, '2023-10-21 18:50:13'),
(26, '160000000', 'Region XIII (Caraga)', '16', '160', 0, 0, 0, '2023-10-22 00:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `unit_description` varchar(255) NOT NULL,
  `unit_status` int(11) NOT NULL,
  `unit_date_added` varchar(255) NOT NULL,
  `unit_date_edited` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`, `unit_description`, `unit_status`, `unit_date_added`, `unit_date_edited`) VALUES
(17, 'Sack', 'a large bag made of a strong material such as burlap, thick paper, or plastic, used for storing and carrying goods.', 1, '', '2023-10-16 21:48:30'),
(24, 'sach', 'a small bag containing a perfumed powder or potpourri used to scent clothes and linens. sacheted.', 1, '', ''),
(25, 'tab', 'A tablet (also known as a pill) is a pharmaceutical oral dosage form (oral solid dosage, or OSD) or solid unit dosage form. Tablets may be defined as the solid unit dosage form of medication with suitable excipients.', 1, '', ''),
(26, 'CAPS', 'Catastrophic antiphospholipid syndrome (CAPS) is a rare life-threatening autoimmune disease characterized by disseminated intravascular thrombosis resulting in multi-organ failure.', 1, '', ''),
(27, 'vial', 'A vial also known as a phial or flacon is a small glass or plastic vessel or bottle, often used to store medication in the form of liquids, powders, or capsules. They can also be used as scientific sample vessels for instance, in autosampler devices in', 1, '', '2023-10-19 12:29:56'),
(30, 'kg', 'kilograms', 1, '', '2023-11-17 21:40:07'),
(31, 'pcs', 'A vial (also known as a phial or flacon) is a small glass or plastic vessel or bottle, often used to store medication in the form of liquids, powders, or capsules. They can also be used as scientific sample vessels; for instance, in autosampler devices in', 2, '', ''),
(63, '10 Kg', 'for zyine product', 1, '2023-10-20 11:13:58', '2023-11-12 01:27:28'),
(64, 'pcs', 'for unit product', 1, '2023-11-06 22:29:26', '2023-11-06 22:30:35'),
(65, '5 kg', '5 kilogram', 1, '2023-11-12 01:27:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_log`
--

CREATE TABLE `users_log` (
  `act_id` int(11) NOT NULL,
  `act_account_id` int(11) NOT NULL,
  `act_activity` varchar(255) DEFAULT NULL,
  `act_date` datetime DEFAULT NULL,
  `act_table` varchar(255) NOT NULL,
  `act_collumn_id` varchar(255) DEFAULT NULL,
  `act_seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_log`
--

INSERT INTO `users_log` (`act_id`, `act_account_id`, `act_activity`, `act_date`, `act_table`, `act_collumn_id`, `act_seen`) VALUES
(2908, 16, 'update `kgggg` changed to `kg`', '2023-11-17 21:40:07', 'unit', '30', 1),
(2909, 16, 'Added new product: Bayong', '2023-11-17 21:43:38', 'product', 'PROD33922', 1),
(2910, 16, 'Added new product: Chick Booster', '2023-11-17 21:45:37', 'product', 'PROD28163', 1),
(2911, 16, 'Added new product: BMEG Enertone', '2023-11-17 21:47:19', 'product', 'PROD49518', 1),
(2912, 16, 'Added new product: Power Cat Tuna', '2023-11-17 21:48:41', 'product', 'PROD22555', 1),
(2913, 16, 'Added new product: Dog collar', '2023-11-17 21:50:18', 'product', 'PROD54246', 1),
(2914, 16, 'Purchased order from supplier: suppler zyrine', '2023-11-17 21:55:58', 'supplier', '32', 1),
(2915, 16, 'Purchased order from supplier: Joshua supplies', '2023-11-17 21:58:19', 'supplier', '33', 1),
(2916, 16, 'Purchased order from supplier: julliana', '2023-11-17 21:59:46', 'supplier', '35', 1),
(2917, 190, 'Request Delivery order on REGION III (CENTRAL LUZON) and their payment via Cash on delivery', '2023-11-18 18:02:53', 'delivery', 'RD11983', 1),
(2918, 188, 'Request Delivery order on REGION IV-A (CALABARZON) and Already Sent their payment on Gcash', '2023-11-19 14:02:40', 'delivery', 'RD61977', 1),
(2919, 188, 'Request Delivery order on REGION IV-A (CALABARZON) and Already Sent their payment on Gcash', '2023-11-19 14:08:09', 'delivery', 'RD12491', 1),
(2920, 16, 'Accept Denise Esteban`s order', '2023-11-19 14:17:22', 'transaction', 'RD12491', 1),
(2921, 16, 'Created account: Juan Delacruz', '2023-11-19 14:27:01', 'account', '191', 1),
(2924, 16, 'Accept Zyrine Alcarez`s order', '2023-11-19 15:14:54', 'transaction', 'RD11983', 1),
(2925, 191, 'Zyrine Alcarez`s order status change to recieve', '2023-11-19 15:15:02', 'transaction', 'RD11983', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_acc_code` varchar(255) NOT NULL,
  `user_address_fullname` varchar(255) NOT NULL,
  `user_address_phone` varchar(255) NOT NULL,
  `user_address_email` varchar(255) NOT NULL,
  `user_region_code` varchar(255) NOT NULL,
  `user_region_name` varchar(255) NOT NULL,
  `user_complete_address` varchar(255) NOT NULL,
  `users_latitude` varchar(255) DEFAULT NULL,
  `users_longitud` varchar(255) DEFAULT NULL,
  `user_active_status` int(11) NOT NULL,
  `user_add_display_status` int(11) NOT NULL,
  `user_add_Default_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_acc_code`, `user_address_fullname`, `user_address_phone`, `user_address_email`, `user_region_code`, `user_region_name`, `user_complete_address`, `users_latitude`, `users_longitud`, `user_active_status`, `user_add_display_status`, `user_add_Default_status`) VALUES
(137, '09680185', 'Joshua padillas', '09454454744', 'Andersonandy046@gmail.com', '14', 'CAR', 'car', '', '', 0, 0, 0),
(138, '09680185', 'Joshua padilla', '09454454744', 'Andersonandy046@gmail.com', '03', 'Central Luzon', 'Santa Rosa II, Marilao, Bulacan, Central Luzon, 3019, Philippines', NULL, NULL, 1, 1, 1),
(139, '47557186', 'Ayanna misola', '09454454744', 'Perezallyn614@gmail.com', '04', 'Region IV-A (CALABARZON)', 'Region IV-A (CALABARZON) Cavite Bacoor City Dulong Bayan 4024', '', '', 1, 1, 0),
(141, '16822187', 'Mike love', '09980998872', 'rickandmorty0224@gmail.com', '06', 'Region VI (Western Visayas)', 'Region VI (Western Visayas) Antique Patnongon Villa Elio kunwair street', '', '', 0, 1, 1),
(142, '34783188', 'Denise Esteban', '09454454744', 'Deniseesteban@gmail.com', '04', 'Region IV-A (CALABARZON)', 'Region IV-A (CALABARZON) Cavite Cavite City Barangay 19 (Gemini) 2600 labuyo street', '', '', 1, 1, 1),
(143, '47557186', 'Ayanna misola', '09454454744', 'Perezallyn614@gmail.com', '17', 'MIMAROPA', 'MIMAROPA Occidental Mindoro Magsaysay Laste talbak na bato ', NULL, NULL, 0, 1, 1),
(144, '53231189', 'Andy anderson', '09454454744', 'masterparj@gmail.com', '03', 'Region III (Central Luzon)', 'Region III (Central Luzon) Bulacan Marilao Santa Rosa II Tibagan Street 634', NULL, NULL, 1, 1, 1),
(145, '16822187', 'Mike love', '09980998872', 'rickandmorty0224@gmail.com', '03', 'Region III (Central Luzon)', 'Region III (Central Luzon) Pampanga Candaba Cuayang Bugtong tibagan 634', '', '', 1, 1, 0),
(146, '02571190', 'Zyrine Alcarez', '09454454744', 'alcarezzyrinearreza.pdm@gmail.com', '03', 'Region III (Central Luzon)', 'Region III (Central Luzon) Bulacan Bocaue Duhat balabaran street sapron hills', NULL, NULL, 1, 1, 1),
(147, '72449191', 'Juan Delacruz', '09454454744', 'mangJuan@gmail.com', '03', 'Region III (Central Luzon)', 'Region III (Central Luzon) Bulacan Bulacan Bambang ', NULL, NULL, 1, 1, 1),
(148, '75944192', 'Juan Delacruz', '09454454744', 'mangJuan@gmail.com', '03', 'Region III (Central Luzon)', 'Region III (Central Luzon) Bulacan Bulacan Bambang ', NULL, NULL, 1, 1, 1),
(149, '23754193', 'Juan Delacruz', '09454454744', 'mangJuan@gmail.com', '03', 'Region III (Central Luzon)', 'Region III (Central Luzon) Bulacan Bulacan Bambang ', NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int(11) NOT NULL,
  `voucher_name` varchar(255) NOT NULL,
  `voucher_discount` float NOT NULL,
  `voucher_created` date NOT NULL,
  `voucher_expiration` date NOT NULL,
  `voucher_maximumLimit` int(11) NOT NULL,
  `voucher_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`voucher_id`, `voucher_name`, `voucher_discount`, `voucher_created`, `voucher_expiration`, `voucher_maximumLimit`, `voucher_status`) VALUES
(21, 'sample voucher', 50, '2027-07-31', '2023-10-07', 70, 1),
(23, 'test', 75, '2023-08-31', '2023-08-25', 94, 1),
(26, 'Sale Offer-20% OffThis Week', 20, '2023-10-31', '2023-12-29', 63, 1),
(27, '5% OffThis Month', 5, '2023-10-31', '2023-12-29', 63, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `maintinance`
--
ALTER TABLE `maintinance`
  ADD PRIMARY KEY (`system_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mess_id`);

--
-- Indexes for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`pickup_id`);

--
-- Indexes for table `pos_cart`
--
ALTER TABLE `pos_cart`
  ADD PRIMARY KEY (`pos_cart_id`);

--
-- Indexes for table `pos_orders`
--
ALTER TABLE `pos_orders`
  ADD PRIMARY KEY (`orders_orders_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `purchasedcart`
--
ALTER TABLE `purchasedcart`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchased_record`
--
ALTER TABLE `purchased_record`
  ADD PRIMARY KEY (`precord_id`);

--
-- Indexes for table `returns_pos`
--
ALTER TABLE `returns_pos`
  ADD PRIMARY KEY (`ret_id`);

--
-- Indexes for table `return_ordering`
--
ALTER TABLE `return_ordering`
  ADD PRIMARY KEY (`ret_ol_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`spl_id`);

--
-- Indexes for table `system_log`
--
ALTER TABLE `system_log`
  ADD PRIMARY KEY (`sys_id`);

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`address_region_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users_log`
--
ALTER TABLE `users_log`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1174;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `maintinance`
--
ALTER TABLE `maintinance`
  MODIFY `system_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1164;

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `pickup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `pos_cart`
--
ALTER TABLE `pos_cart`
  MODIFY `pos_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=933;

--
-- AUTO_INCREMENT for table `pos_orders`
--
ALTER TABLE `pos_orders`
  MODIFY `orders_orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=870;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `purchasedcart`
--
ALTER TABLE `purchasedcart`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `purchased_record`
--
ALTER TABLE `purchased_record`
  MODIFY `precord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `returns_pos`
--
ALTER TABLE `returns_pos`
  MODIFY `ret_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `return_ordering`
--
ALTER TABLE `return_ordering`
  MODIFY `ret_ol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `spl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `system_log`
--
ALTER TABLE `system_log`
  MODIFY `sys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=728;

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `address_region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users_log`
--
ALTER TABLE `users_log`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2926;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
