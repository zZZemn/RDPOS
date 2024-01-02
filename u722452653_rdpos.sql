-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 05:06 PM
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
(16, 'ACC6038616', '2023-06-01', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'joshua admin', 'padilla', '2000-10-03', 'administrator', 0, 0, 'andyanderson12s3@gmail.com', '09770987021', '6574557bbc999.jpg', '6574556abd008.jpeg', '', '2023-12-09 19:54:35', '0', NULL, NULL),
(202, 'ACC82770202', '2023-11-21', 'alden', 'ac865ea651e9a001476196748beaf3e0e678b39314258a08cd022c0922d74ae7', 'alden', 'richard', '1992-01-02', 'customer', 0, 0, 'rann5425@gmail.com', '09454454744', '655e017813ae3.jpg', NULL, '', '2023-11-22 21:26:16', '0', 0, '2023-11-21 09:53:16'),
(203, '00352203', '2023-11-23', 'angenise@gmail.com', 'bb2f2661ee3a34b17d8474e396aa65f41e290ebe3f156dc3932180010adc48f5', 'angenise', 'angenise', NULL, 'cashier', 0, 0, 'angenise@gmail.com', '09454454744', '655ecf5ca0f66.jpg', NULL, '', NULL, '', NULL, NULL),
(204, '29952204', '2023-11-23', 'awdwadwad', '5ad31993aa67f0e0402636c1bff3ad8d0dc1d0dba2a959c45a7ccb7df5f76907', 'awdwadaw', 'awdwadwad', NULL, 'deliveryStaff', 0, 0, 'wadawd@gmail.com', '09454445454', '655ed7e77200f.gif', NULL, '', NULL, '', NULL, NULL),
(205, 'ACC90954205', '2023-11-28', 'dodongdodong', '748c5b47232f523e2b56776c326283d14f9759b63b74fed17396e47ffc2ff8cd', 'dodong', 'dodong', '2000-02-28', 'customer', 0, 0, 'dodong@gmail.com', '09454454744', '', NULL, '', NULL, '6927', NULL, '2023-11-28 01:32:01'),
(206, 'ACC03927206', '2023-11-28', 'testtest', '2e42df16bbadf1373787f7c8bd80e204a49b68c89abbf0ed68b04f418b3374cc', 'test', 'test', '2000-12-23', 'customer', 0, 0, 'andersonandy04wadwad6@gmail.com', '09454454744', '', NULL, '', NULL, '', 0, NULL),
(207, 'ACC95060207', '2023-12-09', 'joshua', '61e36b4d463fcf248af31898805050d4b137bb54e74c4e7e9b95b35ccb0f9753', 'joshua', 'padilla', '2000-01-06', 'customer', 0, 0, 'andersonandy046@gmail.com', '09454454744', '', NULL, '', NULL, '', 0, '2023-12-09 18:48:44');

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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_prod_id`, `cart_user_id`, `cart_prodQty`) VALUES
(1177, 216, 188, 4);

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
(24, 'Vitaminss', 'awdwadwadwd', 0, '2023-10-15 21:30:18', '2023-10-16 16:05:31'),
(25, 'category 1', 'awdawdwadaw', 1, '2023-11-24 22:12:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `discount_name` varchar(255) NOT NULL,
  `discount_description` varchar(255) NOT NULL,
  `discount_rate` float NOT NULL,
  `discount_added` datetime NOT NULL,
  `discount_edited` datetime DEFAULT NULL,
  `discount_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `discount_name`, `discount_description`, `discount_rate`, `discount_added`, `discount_edited`, `discount_status`) VALUES
(39, 'joshua', 'awadwad', 10, '2023-11-25 10:47:36', '2023-11-25 10:48:51', 2),
(40, '10 sakos', 'we give 20% discount', 20, '2023-11-25 11:24:40', '2023-11-25 11:24:55', 1),
(41, 'suki ', 'exclusive for regular customers only', 2, '2023-11-25 19:24:57', NULL, 1),
(42, 'PWD', 'Discount for PWD', 5, '2023-11-25 19:25:51', NULL, 1),
(43, 'Senior', 'basta senior ', 6, '2023-11-25 19:26:14', NULL, 1);

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
(1, 'RDPOS', '6534fbcd9b0f9.jpg', '6534e356c9783.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, error esse, eos necessitatibus saepe temporibus aliquam aperiam quas reiciendis possimus laborum voluptates magni ad. Quam tempore officiis eligendi sed aut', 'Paso bagbaguin near highway road sta.maria bulacan', '09876543211', 1, '2023-11-19 21:54:31');

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mess_id`, `mess_sender_id`, `mess_content`, `mess_type`, `mess_status`, `mess_reciever_id`, `mess_date`, `mess_seen`) VALUES
(183, 202, 'hey', 'texts', 0, NULL, '2023-11-22 23:14:56', 2),
(184, 16, 'g', 'texts', 0, 202, '2023-11-23 00:02:56', 1),
(185, 16, 'i', 'texts', 0, 202, '2023-11-23 00:04:00', 1),
(186, 16, '7', 'texts', 0, 202, '2023-11-23 00:04:04', 1),
(187, 202, '6560373da10b2.jpeg', 'image', 0, NULL, '2023-11-24 13:40:13', 2),
(188, 202, '65603765cd053.jpg', 'image', 0, NULL, '2023-11-24 13:40:53', 2),
(189, 202, '    ', 'texts', 0, NULL, '2023-11-24 13:43:34', 2),
(190, 16, 's', 'texts', 0, 202, '2023-11-24 13:54:18', 1),
(191, 202, 'my i request to deliver in sta rosa 2 marilao bulacan', 'texts', 0, NULL, '2023-11-24 16:04:39', 2),
(192, 202, 'my i request to deliver in sta rosa 2 marilao bulacan', 'texts', 0, NULL, '2023-11-24 16:04:39', 2),
(193, 16, 'ok', 'texts', 0, 202, '2023-11-24 16:05:03', 1),
(194, 16, 'hello', 'texts', 0, 202, '2023-12-09 17:51:20', 0),
(195, 16, '657438d68fed8.docx', 'document', 0, 202, '2023-12-09 17:52:22', 0);

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
(57, '002984357', 'Gcash', '09214563278', '364696137_2896008720532733_7482788190110373134_n.jpg', 0, 'ewallet', '2023-10-17 13:31:40', '2023-11-19 21:52:08'),
(58, '006436458', 'MAYA', '09123456785', 'Maya Standee-1.webp', 0, 'ewallet', '2023-10-17 14:10:10', '2023-11-14 09:16:26'),
(67, '006653667', 'BPI', '1000000120', 'bpi.webp', 0, 'bank', '2023-11-11 16:12:42', '2023-11-19 21:53:20'),
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
  `orders_date` datetime NOT NULL,
  `orders_dates_delivered` datetime DEFAULT NULL,
  `orders_status` varchar(255) NOT NULL,
  `display_status` int(11) NOT NULL,
  `order_barcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `order_transaction_code`, `orders_prod_id`, `orders_customer_id`, `orders_nickname`, `orders_email`, `orders_contact`, `orders_paymethod`, `orders_proof`, `orders_qty`, `orders_stock_id`, `orders_prod_price`, `orders_subtotal`, `orders_gradeTotal`, `orders_ship_fee`, `orders_tax`, `orders_voucher_name`, `orders_voucher_rate`, `orders_address`, `orders_date`, `orders_dates_delivered`, `orders_status`, `display_status`, `order_barcode`) VALUES
(1191, 'RD87316', 243, 205, 'dodong dodong', 'dodong@gmail.com', '09454454744', 'Gcash', 'presentation.jpg', 5, 406, 35, 175, '175', 100, 1, '', '0', 'Region III (Central Luzon) Bulacan Marilao Santa Rosa II Tibagan ', '2023-12-21 20:23:40', NULL, 'To-ship', 0, 'RD87316.png'),
(1192, 'RD87316', 244, 205, 'dodong dodong', 'dodong@gmail.com', '09454454744', 'Gcash', 'presentation.jpg', 5, 408, 100, 500, '500', 100, 1, '', '0', 'Region III (Central Luzon) Bulacan Marilao Santa Rosa II Tibagan ', '2023-12-21 20:23:40', NULL, 'To-ship', 0, 'RD87316.png');

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

--
-- Dumping data for table `pos_cart`
--

INSERT INTO `pos_cart` (`pos_cart_id`, `pos_cart_prod_id`, `pos_cart_user_id`, `cart_prodQty`, `pos_cart_stock_id`, `subtotal`) VALUES
(945, 222, 16, 7, 321, 1018.5);

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

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_code` varchar(11) NOT NULL,
  `prod_name` varchar(30) NOT NULL,
  `prod_currprice` double NOT NULL,
  `prod_kg` decimal(10,0) DEFAULT NULL,
  `prod_ml` decimal(10,0) DEFAULT NULL,
  `prod_g` decimal(10,0) DEFAULT NULL,
  `prod_category_id` int(11) NOT NULL,
  `prod_critical` int(11) NOT NULL,
  `prod_description` varchar(255) DEFAULT NULL,
  `prod_voucher_id` int(11) NOT NULL,
  `prod_image` varchar(30) DEFAULT NULL,
  `prod_added` datetime NOT NULL,
  `prod_edit` datetime DEFAULT NULL,
  `prod_status` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `prod_sell_onlline` tinyint(1) NOT NULL,
  `prod_vatable` tinyint(1) NOT NULL,
  `prod_expirationStatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_code`, `prod_name`, `prod_currprice`, `prod_kg`, `prod_ml`, `prod_g`, `prod_category_id`, `prod_critical`, `prod_description`, `prod_voucher_id`, `prod_image`, `prod_added`, `prod_edit`, `prod_status`, `barcode`, `prod_sell_onlline`, `prod_vatable`, `prod_expirationStatus`) VALUES
(242, 'PROD35228', 'painuman', 100, 0, 0, 0, 1, 10, 'painuman ng manok', 0, '65811fc5d68c6.jpg', '2023-12-19 12:44:53', NULL, 0, 'PROD35228.png', 1, 0, 'N/A'),
(243, 'PROD55296', 'ambroxitil', 35, 0, 100, 0, 3, 1, 'adawdawdwad', 0, '65811fe688ba7.jpeg', '2023-12-19 12:45:26', NULL, 0, 'PROD55296.png', 1, 0, 'withExpi'),
(244, 'PROD41785', 'painuman kulay pula', 100, 0, 0, 0, 1, 20, 'dwadawdwdwad', 0, '65812019de6a3.jpg', '2023-12-19 12:46:17', NULL, 0, 'PROD41785.png', 1, 0, 'N/A'),
(245, 'PROD90256', 'fedegree', 100, 0, 0, 10, 2, 10, 'qqqqqqqqqq', 0, '658120483a1f8.jpg', '2023-12-19 12:47:04', NULL, 0, 'PROD90256.png', 1, 0, 'withExpi');

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
  `replace_prod_id` int(11) NOT NULL,
  `ret_reason` varchar(255) NOT NULL,
  `ret_cashier_id` int(11) NOT NULL,
  `ret_status` int(11) NOT NULL,
  `ret_return_approval_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `s_id` int(11) NOT NULL,
  `s_stockin_date` date NOT NULL DEFAULT current_timestamp(),
  `s_invoice` varchar(255) NOT NULL,
  `s_expiration` date DEFAULT NULL,
  `s_prod_id` int(11) NOT NULL,
  `s_amount` int(11) NOT NULL,
  `s_supplierPrice` double NOT NULL,
  `s_spl_id` int(11) NOT NULL,
  `s_edited` datetime DEFAULT NULL,
  `s_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`s_id`, `s_stockin_date`, `s_invoice`, `s_expiration`, `s_prod_id`, `s_amount`, `s_supplierPrice`, `s_spl_id`, `s_edited`, `s_status`) VALUES
(406, '2023-12-21', 'SPL00001', '2023-12-30', 243, 3, 20, 1, NULL, 1),
(407, '2023-12-21', 'SPL200002', '2024-01-06', 243, 5, 18, 2, NULL, 1),
(408, '2023-12-21', 'SPL00001', '0000-00-00', 244, 5, 5, 1, NULL, 1),
(409, '2023-12-21', 'SPL00001', '2023-12-30', 243, 10, 5, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stocks_details`
--

CREATE TABLE `stocks_details` (
  `ns_id` int(11) NOT NULL,
  `ns_stock_id` int(11) NOT NULL,
  `ns_supplier_code` varchar(255) NOT NULL,
  `ns_invoice` varchar(255) NOT NULL,
  `ns_stockin_date` date NOT NULL,
  `ns_product_code` varchar(255) NOT NULL,
  `ns_expirationDate` date NOT NULL,
  `ns_qty` int(11) NOT NULL,
  `ns_supplierPrice` double NOT NULL,
  `ns_edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks_details`
--

INSERT INTO `stocks_details` (`ns_id`, `ns_stock_id`, `ns_supplier_code`, `ns_invoice`, `ns_stockin_date`, `ns_product_code`, `ns_expirationDate`, `ns_qty`, `ns_supplierPrice`, `ns_edited`) VALUES
(86, 406, 'SU1289519', 'SPL00001', '2023-12-21', 'PROD55296', '2023-12-30', 8, 20, NULL),
(87, 407, 'SU1797120', 'SPL200002', '2023-12-21', 'PROD55296', '2024-01-06', 5, 18, NULL),
(88, 408, 'SU1289519', 'SPL00001', '2023-12-21', 'PROD41785', '0000-00-00', 10, 5, NULL),
(89, 409, 'SU1289519', 'SPL00001', '2023-12-21', 'PROD55296', '2023-12-30', 10, 5, NULL);

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
(1, 'SU1289519', 'supplier 1', 'supplier6@gmail.com', '09454454749', 'ZIP codes are also part of the typical Philippine address. Address format Edit. Street, e.g. BLDG 1A5U11 MRH SITE 4 TALA: District, e.g. TALA 1: ', '2023-10-16 12:47:09', '2023-11-20 08:17:43', 0),
(2, 'SU1797120', 'supplier 2', 'supplier2@gmail.com', '09454454744', 'ZIP codes are also part of the typical Philippine address. Address format Edit. Street, e.g. BLDG 1A5U11 MRH SITE 4 TALA: District, e.g. TALA 1: Barangay', '2023-10-16 12:48:37', '', 0),
(3, 'SU0632821', 'supplier 3', 'supplier3@gmail.com', '09454454744', 'ZIP codes are also part of the typical Philippine address. Address format Edit. Street, e.g. BLDG 1A5U11 MRH SITE 4 TALA: District, e.g. TALA 1: Barangay', '2023-10-16 12:48:54', '2023-10-18 13:15:08', 0),
(32, 'SU7467032', 'suppler zyrine', 'supplierzyrine@gmail.com', '09457444444', 'supplier ng feeds', '2023-10-20 11:10:46', '', 0),
(33, 'SU8295633', 'Joshua supplies', 'padillajoshuaanderson.pdm@gmail.com', '09454454744', 'sta.rosa 2 marilao bulacan', '2023-10-20 13:40:40', '', 0),
(34, 'SU5546334', 'supplier jeff', 'jeffersoncarreon22@gmail.com', '09923795722', 'Loma de gato', '2023-10-29 13:03:15', '', 0),
(35, 'SU5898035', 'julliana', 'julianairapadrigon5@gmail.com', '09123456789', 'abangan norte', '2023-11-06 22:51:18', '', 0),
(36, 'SU3688436', 'supply Jonald', 'xjonald11@gmail.com', '09454444444', 'taga dito aaaaaa', '2023-12-09 18:34:18', '2023-12-09 18:35:26', 0),
(37, 'SU9668537', 'sypplier andy', 'andersonandy046@gmail.com', '09454454744', 'stwdwadwadwadwad', '2023-12-09 18:36:09', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `address_id` int(11) NOT NULL,
  `address_code` varchar(255) NOT NULL,
  `address_complete_name` varchar(255) NOT NULL,
  `address_rate` double NOT NULL,
  `address_status` int(11) NOT NULL,
  `address_cod` int(11) NOT NULL,
  `address_paynow` int(11) NOT NULL,
  `address_date_added` varchar(255) NOT NULL,
  `address_date_edited` varchar(255) DEFAULT NULL,
  `address_display_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`address_id`, `address_code`, `address_complete_name`, `address_rate`, `address_status`, `address_cod`, `address_paynow`, `address_date_added`, `address_date_edited`, `address_display_status`) VALUES
(49, '031411014', 'Region III (Central Luzon) Bulacan Marilao Santa Rosa II', 100, 1, 1, 1, '2023-11-20 23:48:31', '2023-12-21 01:40:03', 1),
(51, '035404003', 'Region III (Central Luzon) Pampanga Bacolor Cabambangan (Pob.)', 66, 1, 1, 1, '2023-11-21 14:20:13', '2023-12-09 19:58:33', 1),
(52, '036903003', 'Region III (Central Luzon) Tarlac Camiling Anoling 3rd', 30, 1, 1, 1, '2023-11-21 14:22:55', '2023-11-22 16:00:45', 0),
(53, '031411012', 'Region III (Central Luzon) Bulacan Marilao Prenza II', 5555, 1, 1, 1, '2023-11-22 15:00:26', '2023-11-24 16:06:15', 1),
(55, '031411011', 'Region III (Central Luzon) Bulacan Marilao Prenza I', 122, 1, 1, 1, '2023-11-22 18:37:45', NULL, 1),
(56, '031411008', 'Region III (Central Luzon) Bulacan Marilao Patubig', 30, 1, 1, 1, '2023-11-24 16:11:21', '2023-11-24 16:11:30', 1),
(57, '031411013', 'Region III (Central Luzon) Bulacan Marilao Santa Rosa I', 1222, 1, 1, 1, '2023-12-09 19:59:11', NULL, 1),
(58, '031411005', 'Region III (Central Luzon) Bulacan Marilao Lias', 50, 1, 1, 1, '2023-12-21 01:38:25', NULL, 1);

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
(30, 'kg', 'basta kilogram', 1, '', '2023-11-24 00:26:44'),
(31, 'pcs', 'A vial (also known as a phial or flacon) is a small glass or plastic vessel or bottle, often used to store medication in the form of liquids, powders, or capsules. They can also be used as scientific sample vessels; for instance, in autosampler devices in', 2, '', ''),
(63, '10 Kg', 'for zyine product', 1, '2023-10-20 11:13:58', '2023-11-12 01:27:28'),
(64, 'pcs', 'for unit product', 1, '2023-11-06 22:29:26', '2023-11-06 22:30:35'),
(65, '5 kg', '5 kilogram', 1, '2023-11-12 01:27:55', NULL),
(66, 'tests', 'asdasd', 2, '2023-11-19 21:56:29', NULL);

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
(3311, 16, 'Remove discount: ', '2023-11-25 11:00:41', 'discount', '39', 1),
(3312, 16, 'Remove discount: ', '2023-11-25 11:01:04', 'discount', '39', 1),
(3313, 16, 'Remove discount: joshua', '2023-11-25 11:01:47', 'discount', '39', 1),
(3314, 16, 'Add new discount named: 10 sako', '2023-11-25 11:24:40', 'discount', '40', 1),
(3315, 16, 'Disabled unit: 10 sako', '2023-11-25 11:24:47', 'unit', '40', 1),
(3316, 16, 'update `10 sako` name changed to `10 sakos`', '2023-11-25 11:24:55', 'discount', '40', 1),
(3317, 16, 'Add new discount named: wadwad', '2023-11-25 13:00:37', 'discount', '30', 1),
(3318, 16, 'Add new discount named: test', '2023-11-25 13:05:48', 'discount', '31', 1),
(3319, 16, 'Add new discount named: test', '2023-11-25 13:06:19', 'discount', '32', 1),
(3320, 16, 'Enabled unit: 10 sakos', '2023-11-25 19:21:32', 'unit', '40', 1),
(3321, 16, 'Add new discount named: suki ', '2023-11-25 19:24:57', 'discount', '41', 1),
(3322, 16, 'Add new discount named: PWD', '2023-11-25 19:25:51', 'discount', '42', 1),
(3323, 16, 'Add new discount named: Senior', '2023-11-25 19:26:14', 'discount', '43', 1),
(3324, 16, 'Add new discount named: christmass sales', '2023-11-25 19:29:21', 'discount', '33', 1),
(3325, 16, 'Add new discount named: hollyweek', '2023-11-25 19:30:31', 'discount', '34', 1),
(3326, 16, 'update hollyweek from Dsiabled changed to Dsiabled ', '2023-11-25 20:26:17', 'voucher', '34', 1),
(3327, 16, 'Remove discount: hollyweek', '2023-11-25 20:36:58', 'discount', '34', 1),
(3328, 16, 'Remove discount: christmass sales', '2023-11-25 20:37:08', 'discount', '33', 1),
(3329, 16, 'Remove discount: hollyweek', '2023-11-25 20:39:37', 'discount', '34', 1),
(3330, 16, 'Remove discount: hollyweek', '2023-11-25 20:39:58', 'discount', '34', 1),
(3331, 16, 'Remove discount: hollyweek', '2023-11-25 20:40:21', 'discount', '34', 1),
(3332, 16, 'Remove discount: christmass sales', '2023-11-25 20:40:58', 'discount', '33', 1),
(3333, 16, 'Add new discount named: Mike Discount', '2023-11-25 20:42:33', 'discount', '35', 1),
(3334, 16, 'Bayong changed product description Bayong is a Filipinotagalog term which refers to bags made of woven leaves. Depending on the province, these organic materials include buri, pandan, and abaca, the plantsource of which are native to the Philippines. to B', '2023-11-26 13:16:50', 'product', 'PROD33922', 1),
(3335, 16, 'Bayong changed voucher  to hollyweek', '2023-11-26 13:16:50', 'product', 'PROD33922', 1),
(3336, 0, 'Remove product: Wooden Bird Box Big', '2023-11-27 18:27:06', 'product', 'PROD1164', 1),
(3337, 205, 'Created their account: dodong dodong', '2023-11-28 01:27:01', 'account', '205', 1),
(3338, 206, 'Created their account: test test', '2023-11-28 02:45:11', 'account', '206', 1),
(3339, 206, 'Successfully verified their account', '2023-11-28 02:45:29', 'account', '206', 1),
(3340, 16, 'Added new product: dawdwad', '2023-12-01 18:29:28', 'product', 'PROD42526', 1),
(3341, 16, 'Added new product: awdawd', '2023-12-01 18:30:33', 'product', 'PROD20458', 1),
(3342, 16, 'awdawd changed product image', '2023-12-01 20:36:37', 'product', 'PROD20458', 1),
(3343, 16, 'awdawd changed critical level 1 to 10', '2023-12-01 20:37:24', 'product', 'PROD20458', 1),
(3344, 0, 'Remove product: awdawd', '2023-12-02 14:41:25', 'product', 'PROD20458', 1),
(3345, 16, 'Restore product: awdawd', '2023-12-02 14:41:35', 'product', 'PROD20458', 1),
(3346, 16, 'Added new product: sample', '2023-12-02 15:56:52', 'product', 'PROD88457', 1),
(3347, 16, 'Added new product: kulungan ng manok', '2023-12-09 13:57:22', 'product', 'PROD13923', 1),
(3348, 16, 'Added new product: enerthone', '2023-12-09 13:58:38', 'product', 'PROD30403', 1),
(3349, 16, 'Added new supplier: `supply`', '2023-12-09 18:34:18', 'supplier', 'SU3688436', 1),
(3350, 16, 'Updated supplier name:`supply` change to `supply Jonald`', '2023-12-09 18:35:26', 'supplier', 'SU0001616', 1),
(3351, 16, 'Added new supplier: `sypplier andy`', '2023-12-09 18:36:09', 'supplier', 'SU9668537', 1),
(3352, 16, 'Request stocks from: sypplier andy', '2023-12-09 18:37:51', 'requestSupplies', '16', 1),
(3353, 207, 'Created their account: joshua padilla', '2023-12-09 18:41:22', 'account', '207', 1),
(3354, 207, 'Successfully verified their account', '2023-12-09 18:42:04', 'account', '207', 1),
(3355, 207, 'Their account successfully recovered', '2023-12-09 18:44:10', 'account', '207', 1),
(3356, 207, 'RECOVER ACCOUNT', '2023-12-09 06:44:00', '', NULL, 1),
(3357, 16, 'Added new product: tinda ni jonald', '2023-12-09 19:48:54', 'product', 'PROD56467', 1),
(3358, 16, 'Update cover photo 6574556abd008.jpeg', '2023-12-09 19:54:18', 'account', '16', 1),
(3359, 16, 'Update Joshua admin Padilla`s Profile picture', '2023-12-09 19:54:35', 'account', '16', 1),
(3360, 0, 'Remove product: tinda ni jonald', '2023-12-09 19:56:30', 'product', 'PROD56467', 1),
(3361, 0, 'Remove product: kulungan ng Baboy', '2023-12-09 19:56:37', 'product', 'PROD13923', 1),
(3362, 16, 'Restore product: kulungan ng Baboy', '2023-12-09 19:57:28', 'product', 'PROD13923', 1),
(3363, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Not Allowed cash on delivery(COD)', '2023-12-09 19:58:27', 'shipping', '49', 1),
(3364, 16, 'Set `Region III (Central Luzon) Pampanga Bacolor Cabambangan (Pob.)` Not Allowed cash on delivery(COD)', '2023-12-09 19:58:29', 'shipping', '51', 1),
(3365, 16, 'Set `Region III (Central Luzon) Pampanga Bacolor Cabambangan (Pob.)` Allowed cash on delivery(COD)', '2023-12-09 19:58:33', 'shipping', '51', 1),
(3366, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Allowed cash on delivery(COD)', '2023-12-09 19:58:47', 'shipping', '49', 1),
(3367, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Not Allowed cash on delivery(COD)', '2023-12-09 19:58:49', 'shipping', '49', 1),
(3368, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Allowed cash on delivery(COD)', '2023-12-09 19:58:50', 'shipping', '49', 1),
(3369, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Not Allowed cash on delivery(COD)', '2023-12-09 19:58:51', 'shipping', '49', 1),
(3370, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Allowed cash on delivery(COD)', '2023-12-09 19:58:51', 'shipping', '49', 1),
(3371, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Not Allowed cash on delivery(COD)', '2023-12-09 19:58:51', 'shipping', '49', 1),
(3372, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Allowed cash on delivery(COD)', '2023-12-09 19:58:52', 'shipping', '49', 1),
(3373, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Not Allowed cash on delivery(COD)', '2023-12-09 19:58:52', 'shipping', '49', 1),
(3374, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Allowed cash on delivery(COD)', '2023-12-09 19:58:53', 'shipping', '49', 1),
(3375, 16, 'Added new address: Region III (Central Luzon) Bulacan Marilao Santa Rosa I', '2023-12-09 19:59:11', 'address', '031411013', 1),
(3376, 16, 'Restore product: tinda ni jonald', '2023-12-09 20:18:40', 'product', 'PROD56467', 1),
(3377, 16, 'Request stocks from: sypplier andy', '2023-12-10 09:49:41', 'requestSupplies', '16', 1),
(3378, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Not Allowed Payment first', '2023-12-10 10:17:43', 'shipping', '49', 1),
(3379, 16, 'Added new product: product name', '2023-12-15 01:28:36', 'product', 'PROD27209', 1),
(3380, 16, 'Added new product: product name', '2023-12-15 01:29:24', 'product', 'PROD46452', 1),
(3381, 16, 'Added new product: sample product', '2023-12-15 01:58:25', 'product', 'PROD5550', 1),
(3382, 16, 'Added new product: sample product 2', '2023-12-15 01:58:55', 'product', 'PROD7950', 1),
(3383, 16, 'Added new product: patukaan ng manok', '2023-12-18 18:19:33', 'product', 'PROD55644', 1),
(3384, 16, 'Added new product: ambrox', '2023-12-18 18:21:43', 'product', 'PROD15464', 1),
(3385, 16, 'Added new product: burger', '2023-12-18 18:23:14', 'product', 'PROD95533', 1),
(3386, 16, 'Added new product: painuman', '2023-12-19 12:44:53', 'product', 'PROD35228', 1),
(3387, 16, 'Added new product: ambroxitil', '2023-12-19 12:45:26', 'product', 'PROD55296', 1),
(3388, 16, 'Added new product: painuman kulay pula', '2023-12-19 12:46:17', 'product', 'PROD41785', 1),
(3389, 16, 'Added new product: fedegree', '2023-12-19 12:47:04', 'product', 'PROD90256', 1),
(3390, 16, 'Accept joshua padilla`s order', '2023-12-21 01:29:00', 'transaction', 'RD89383', 1),
(3391, 16, 'joshua padilla`s order status change to recieve', '2023-12-21 01:29:13', 'transaction', 'RD89383', 1),
(3392, 16, 'Added new address: Region III (Central Luzon) Bulacan Marilao Lias', '2023-12-21 01:38:25', 'address', '031411005', 1),
(3393, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Not Allowed cash on delivery(COD)', '2023-12-21 01:39:05', 'shipping', '49', 1),
(3394, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Allowed cash on delivery(COD)', '2023-12-21 01:39:06', 'shipping', '49', 1),
(3395, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Allowed Payment first', '2023-12-21 01:39:09', 'shipping', '49', 1),
(3396, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Not Allowed Payment first', '2023-12-21 01:39:14', 'shipping', '49', 1),
(3397, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Allowed Payment first', '2023-12-21 01:39:59', 'shipping', '49', 1),
(3398, 16, 'Set `Region III (Central Luzon) Bulacan Marilao Santa Rosa II` Not Allowed Payment first', '2023-12-21 01:40:03', 'shipping', '49', 1),
(3399, 16, 'Accept joshua padilla`s order', '2023-12-21 19:58:37', 'transaction', 'RD89383', 1),
(3400, 16, 'Accept dodong dodong`s order', '2023-12-21 20:26:16', 'transaction', 'RD87316', 1);

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
  `user_address_code` varchar(255) NOT NULL,
  `user_complete_address` varchar(255) NOT NULL,
  `user_active_status` int(11) NOT NULL,
  `user_add_display_status` int(11) NOT NULL,
  `user_add_Default_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_acc_code`, `user_address_fullname`, `user_address_phone`, `user_address_email`, `user_address_code`, `user_complete_address`, `user_active_status`, `user_add_display_status`, `user_add_Default_status`) VALUES
(170, 'ACC82770202', 'zyrine', '09454454744', 'zyrine123@gmail.com', '031411008', 'Region III (Central Luzon) Bulacan Marilao Patubig bonifactio', 0, 1, 0),
(183, 'ACC82770202', 'Alden richard', '09454454744', 'rann5425@gmail.com', '012802007', 'Region I (Ilocos Region) Ilocos Norte Bacarra Calioet-Libong ', 0, 1, 0),
(184, 'ACC82770202', 'Alden richard', '09454454744', 'rann5425@gmail.com', '031411001', 'Region III (Central Luzon) Bulacan Marilao Abangan Norte sa tabi ng kalsada', 0, 1, 0),
(185, 'ACC82770202', 'Alden richard', '09454454744', 'rann5425@gmail.com', '035404003', 'Region III (Central Luzon) Pampanga Bacolor Cabambangan (Pob.) sitio gilid', 0, 1, 0),
(186, 'ACC82770202', 'Alden richard', '09454454744', 'rann5425@gmail.com', '012802003', 'Region I (Ilocos Region) Ilocos Norte Bacarra Cabaruan nanana', 0, 1, 0),
(187, 'ACC82770202', 'Alden richard', '09454454744', 'rann5425@gmail.com', '012809012', 'Region I (Ilocos Region) Ilocos Norte Dingras Foz ', 0, 1, 0),
(188, 'ACC82770202', 'Alden richard', '09454454744', 'rann5425@gmail.com', '012802012', 'Region I (Ilocos Region) Ilocos Norte Bacarra Ganagan ddd', 0, 1, 0),
(189, 'ACC90954205', 'dodong dodong', '09454454744', 'dodong@gmail.com', '031411014', 'Region III (Central Luzon) Bulacan Marilao Santa Rosa II Tibagan ', 1, 1, 0),
(190, 'ACC82770202', 'awdawdawd', '09454454744', 'Daw@gmail.com', '012817005', 'Region I (Ilocos Region) Ilocos Norte Pasuquin Carusikis sdsadawdawdwa', 0, 1, 0),
(191, 'ACC90954205', 'Dodong dodong', '09454454744', 'dodong@gmail.com', '', 'Region I (Ilocos Region) Ilocos Norte Laoag City (Capital) Bgy. No. 32-B, La Paz West wadawd ', 0, 1, 1),
(192, 'ACC03927206', 'test test', '09454454744', 'testtest@gmail.com', '023105007', 'Region II (Cagayan Valley) Isabela Burgos Cullalabo San Antonio wadwadwad', 0, 1, 0),
(193, 'ACC82770202', 'Alden richard', '09454454744', 'rann5425@gmail.com', '012809012', 'Region I (Ilocos Region) Ilocos Norte Dingras Foz aawdwadwad', 0, 1, 1),
(194, 'ACC95060207', 'joshua padilla', '09454454744', 'andersonandy046@gmail.com', '031411014', 'Region III (Central Luzon) Bulacan Marilao Santa Rosa II tibagan', 0, 1, 1),
(195, 'ACC90954205', 'Dodong dodong', '09454454744', 'dodong@gmail.com', '031411005', 'Region III (Central Luzon) Bulacan Marilao Lias looban', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int(11) NOT NULL,
  `voucher_name` varchar(255) NOT NULL,
  `voucher_discount` float NOT NULL,
  `voucher_desciption` varchar(255) NOT NULL,
  `voucher_created` date NOT NULL,
  `voucher_expiration` date NOT NULL,
  `voucher_maximumLimit` int(11) NOT NULL,
  `voucher_date_edit` datetime DEFAULT NULL,
  `voucher_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`voucher_id`, `voucher_name`, `voucher_discount`, `voucher_desciption`, `voucher_created`, `voucher_expiration`, `voucher_maximumLimit`, `voucher_date_edit`, `voucher_status`) VALUES
(33, 'christmass sales', 20, 'discount every pasko', '2023-11-25', '2023-12-07', 997, '2023-11-26 13:15:23', 1),
(34, 'hollyweek', 55, 'hollyweekhollyweekhollyweek', '2023-11-25', '2023-12-09', 100, '2023-11-26 13:15:02', 1),
(35, 'Mike Discount', 5, 'dsdsdd', '2023-11-25', '2024-02-12', 10, NULL, 1);

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
-- Indexes for table `stocks_details`
--
ALTER TABLE `stocks_details`
  ADD PRIMARY KEY (`ns_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`spl_id`);

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`address_id`);

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
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1205;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `maintinance`
--
ALTER TABLE `maintinance`
  MODIFY `system_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1195;

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `pickup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `pos_cart`
--
ALTER TABLE `pos_cart`
  MODIFY `pos_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946;

--
-- AUTO_INCREMENT for table `pos_orders`
--
ALTER TABLE `pos_orders`
  MODIFY `orders_orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=879;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `returns_pos`
--
ALTER TABLE `returns_pos`
  MODIFY `ret_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `return_ordering`
--
ALTER TABLE `return_ordering`
  MODIFY `ret_ol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `stocks_details`
--
ALTER TABLE `stocks_details`
  MODIFY `ns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `spl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users_log`
--
ALTER TABLE `users_log`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3401;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
