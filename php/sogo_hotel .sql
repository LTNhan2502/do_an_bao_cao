-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 10:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sogo_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `pass`) VALUES
(1, 'Trọng Nhân', 'admin', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `booked_room_id` varchar(255) NOT NULL,
  `customer_booked_id` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `bill_price` float NOT NULL,
  `bill_arrive` datetime NOT NULL,
  `bill_leave` datetime NOT NULL,
  `bill_checkout_at` datetime NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `booked_room_id`, `customer_booked_id`, `customer_email`, `bill_price`, `bill_arrive`, `bill_leave`, `bill_checkout_at`, `room_name`, `customer_name`, `customer_tel`) VALUES
(1, '0', '', 'dd@gmail.com', 2645, '2024-04-02 14:00:00', '2024-04-06 12:00:00', '2024-04-24 15:34:42', 'Deluxe Window', 'LTN', '0123321123'),
(2, '0', '', 'bbb@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 14:58:16', 'Deluxe Window', 'Trong Nhan', '0394374864'),
(3, '0', '', 'bbb@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 14:58:16', 'Deluxe Window', 'Trong Nhan', '0394374864'),
(4, '0', '', 'bbb@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 14:58:16', 'Deluxe Window', 'Trong Nhan', '0394374864'),
(5, '0', '', 'ccc@gmail.com', 572, '2024-04-26 14:00:00', '2024-04-27 12:00:00', '2024-04-25 15:03:40', 'Superior Double', 'Le Trong Nhan', '0123456789'),
(6, '0', '', 'ddd@gmail.com', 2744, '2024-04-26 14:00:00', '2024-04-28 12:00:00', '2024-04-25 15:12:23', 'Premier Deluxe', 'LTNhan', '0321654987'),
(7, 'ORD_57290744', '', 'ddd@gmail.com', 2744, '2024-04-28 14:00:00', '2024-04-30 12:00:00', '2024-04-25 15:18:54', 'Premier Deluxe', 'LTNhan', '0321654987'),
(8, 'ORD_86047493', '', 'ccc@gmail.com', 572, '2024-04-25 14:00:00', '2024-04-28 12:00:00', '2024-04-25 15:24:08', 'Superior Double', 'Le Trong Nhan', '0123456789'),
(9, 'ORD_79017621', '', 'a@gmail.com', 2645, '2024-04-28 14:00:00', '2024-04-30 12:00:00', '2024-04-25 15:38:15', 'Deluxe Window', 'trongnhan', '0123456987'),
(10, 'ORD_45514958', '', 'a@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 15:45:55', 'Deluxe Window', 'trongnhan', '0123456987'),
(11, 'ORD_20356655', '', 'a@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 15:53:54', 'Deluxe Window', 'trongnhan', '0123456987'),
(12, 'ORD_63574742', '', 'a@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 15:57:37', 'Deluxe Window', 'trongnhan', '0321654987'),
(13, 'ORD_73063762', '', 'a@gmail.com', 2645, '2024-04-26 14:00:00', '2024-04-29 12:00:00', '2024-04-25 16:01:20', 'Deluxe Window', 'trongnhan', '0321654987'),
(14, 'ORD_45304204', '', 'c@gmail.com', 2645, '2024-04-26 14:00:00', '2024-04-29 12:00:00', '2024-04-27 08:47:06', '123123123', 'trongnhanagain', '0321654987'),
(15, 'ORD_91495465', '', '', 2744, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-01 11:40:40', 'Premier Deluxe', '', ''),
(16, 'ORD_73109521', '', 'a@gmail.com', 2744, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-01 11:59:14', 'Premier Deluxe', 'Grand Suite River Front', '0546879213'),
(17, 'ORD_6966521', '', 'a@gmail.com', 2744, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-01 14:11:59', 'Premier Deluxe', 'Test noOne', '0321456987'),
(18, 'ORD_96386567', '', 'a@gmail.com', 2744, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-01 14:22:05', 'Premier Deluxe', 'chisa', ''),
(19, 'ORD_60740626', 'CTM_47528970', 'a@gmail.com', 2744, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-03 11:28:35', 'Premier Deluxe', 'chidsa', '0321456987'),
(20, 'ORD_49328709', 'CTM_69094134', 'aaa@gmail.com', 572, '2024-05-01 14:00:00', '2024-05-04 12:00:00', '2024-05-03 11:29:35', 'Superior Double', 'Trong Nhan', '0123123123'),
(21, 'ORD_23246145', 'CTM_83785432', 'a@gmail.com', 572, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-03 11:32:33', 'Superior Double', 'kfc', '0321456987'),
(22, 'ORD_25305276', 'CTM_42488989', 'a@gmail.com', 2744, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-03 13:44:08', 'Premier Deluxe', 'Mia Suite River Front', '0321456987'),
(23, 'ORD_57118960', 'CTM_12144073', 'a@gmail.com', 572, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-03 13:44:33', 'Superior Double', 'chidsa', '0321456987'),
(24, 'ORD_48684944', 'CTM_89204843', 'a@gmail.com', 2744, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-03 14:12:38', 'Premier Deluxe', 'chidsa', '0321456987'),
(25, 'ORD_8656094', 'CTM_27440252', 'a@gmail.com', 572, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-03 14:12:49', 'Superior Double', 'the last', '0321456987'),
(26, 'ORD_96644050', 'CTM_18828649', 'a@gmail.com', 2644, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-03 14:13:03', 'kakkljl', 'cabcd', '0321456987'),
(27, 'ORD_29469838', 'CTM_10854593', 'a@gmail.com', 2744, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-03 14:49:45', 'Premier Deluxe', 'last of all', '0321456987'),
(28, 'ORD_17267783', 'CTM_53214594', 'a@gmail.com', 2644, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-03 14:49:53', 'kakkljl', 'kfc', '0321456987'),
(29, 'ORD_36224092', 'CTM_29824052', 'a@gmail.com', 2744, '2024-05-03 14:00:00', '2024-05-05 14:00:00', '2024-05-03 15:16:34', 'Premier Deluxe', 'reallasttime', '0321456987'),
(30, 'ORD_73656210', 'CTM_69060703', 'a@gmail.com', 2644, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 15:18:52', 'Deluxe Window', 'test', '0321456987'),
(31, 'ORD_98617167', 'CTM_60726026', 'a@gmail.com', 2644, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 15:49:09', 'Deluxe Window', 'trong nhan', '0321456987'),
(32, 'ORD_98617167', 'CTM_60726026', 'a@gmail.com', 2644, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 15:49:09', 'Deluxe Window', 'trong nhan', '0321456987'),
(33, 'ORD_33367388', 'CTM_70535844', 'a@gmail.com', 572, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 20:37:30', 'Superior Double', 'chidsa', '0321456987'),
(34, 'ORD_71640326', 'CTM_21498629', 'a@gmail.com', 2744, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 20:39:35', 'Premier Deluxe', 'adf', '0321456987'),
(35, 'ORD_89134948', 'CTM_88015192', 'a@gmail.com', 572, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 20:39:41', 'Superior Double', 'adc', '0321456987'),
(36, 'ORD_33882798', 'CTM_31248813', 'a@gmail.com', 2744, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 20:44:35', 'Premier Deluxe', 'adg', '0321456987'),
(37, 'ORD_76165368', 'CTM_68347503', 'a@gmail.com', 572, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 20:41:50', 'Superior Double', 'ads', '0321456987'),
(38, 'ORD_9782514', 'CTM_34528774', 'a@gmail.com', 2644, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 20:44:54', 'Deluxe Window', 'hkhkhk', '0321456987'),
(39, 'ORD_32804188', 'CTM_54169040', 'a@gmail.com', 2744, '2024-05-03 12:00:00', '2024-05-06 14:00:00', '2024-05-03 20:56:23', 'Premier Deluxe', 'kfc', '0321456987'),
(40, 'ORD_43841678', 'CTM_57167752', 'a@gmail.com', 572, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 20:56:29', 'Superior Double', 'aaaaa', '0321456987'),
(41, 'ORD_67088054', 'CTM_13282744', 'a@gmail.com', 1716, '2024-05-03 12:00:00', '2024-05-06 14:00:00', '2024-05-03 21:03:34', 'Superior Double', 'kfc', '0132165458'),
(42, 'ORD_95747181', 'CTM_74886749', 'a@gmail.com', 5665, '2024-05-03 12:00:00', '2024-05-05 14:00:00', '2024-05-03 21:09:20', 'Deluxe Window', 'reallasttime', '0321456987'),
(43, 'ORD_36328145', 'CTM_16709719', 'a@gmail.com', 7932, '2024-05-04 12:00:00', '2024-05-05 14:00:00', '2024-05-04 09:18:54', 'Deluxe Window', 'reallasttime', '0321456987'),
(44, 'ORD_77719309', 'CTM_91773212', 'a@gmail.com', 5200000, '2024-05-06 12:00:00', '2024-05-08 14:00:00', '2024-05-06 14:36:31', 'Deluxe Window', 'trong nhan', '0321456987'),
(45, 'ORD_98185272', 'CTM_29000697', 'a@gmail.com', 5200000, '2024-05-06 12:00:00', '2024-05-08 14:00:00', '2024-05-06 15:06:18', 'Deluxe Window', 'trong nhan', '0321456987'),
(46, 'ORD_40431197', 'CTM_53071143', 'letrongnhan@gmail.com', 1144000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-13 15:52:56', 'Superior Double', 'Le Trong Nhan', '0123123123'),
(47, 'ORD_73024776', 'CTM_61659695', 'a@gmail.com', 10400000, '2024-05-08 12:00:00', '2024-05-12 14:00:00', '2024-05-13 16:28:45', 'Deluxe Window', 'trong nhan', '0321456987'),
(48, 'ORD_45408576', 'CTM_26577599', 'letrongnhan@gmail.com', 520000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-13 16:42:12', 'Deluxe Window', 'Trong Nhan', '0321456987'),
(49, 'ORD_65892773', 'CTM_85585738', 'letrongnhan@gmail.com', 5488000, '2024-06-01 12:00:00', '2024-06-03 14:00:00', '2024-05-13 17:01:53', 'Premier Deluxe', 'trong nhan', '0321456987'),
(50, 'ORD_54947424', 'CTM_79898283', 'letrongnhan@gmail.com', 1144000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-13 17:02:02', 'Superior Double', 'trong nhan', '0321456987'),
(51, 'ORD_87861790', 'CTM_3697281', 'letrongnhan@gmail.com', 520000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-13 17:02:09', 'Deluxe Window', 'trong nhan', '0321456987'),
(52, 'ORD_21577354', 'CTM_82720978', 'letrongnhan@gmail.com', 520000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-13 17:19:44', 'Deluxe Window', 'trong nhan', '0321456987'),
(53, 'ORD_33852182', 'CTM_29369167', 'letrongnhan@gmail.com', 520000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-13 17:23:19', 'Deluxe Window', 'trong nhan', '0321456987'),
(54, 'ORD_55550681', 'CTM_94209837', 'letrongnhan@gmail.com', 1144000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-13 17:29:25', 'Superior Double', 'trong nhan', '0321456987'),
(55, 'ORD_48812742', 'CTM_52214503', 'letrongnhan@gmail.com', 520000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-13 17:29:34', 'Deluxe Window', 'trong nhan', '0321456987'),
(56, 'ORD_9668624', 'CTM_1964490', 'letrongnhan@gmail.com', 5488000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-13 21:53:43', 'Premier Deluxe', 'trong nhan', '0321456987'),
(57, 'ORD_62122085', 'CTM_35961238', 'letrongnhan@gmail.com', 1144000, '2024-05-13 12:00:00', '2024-05-15 14:00:00', '2024-05-13 21:53:49', 'Superior Double', 'trong nhan', '0321456987'),
(58, 'ORD_35338497', 'CTM_8401926', 'letrongnhan@gmail.com', 520000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-13 21:53:55', 'Deluxe Window', 'trong nhan', '0321456987'),
(59, 'ORD_69114274', 'CTM_9754713', 'letrongnhan@gmail.com', 520000000, '2024-05-13 12:00:00', '2024-05-15 14:00:00', '2024-05-13 21:55:02', 'Deluxe Window', 'trong nhan', '0321456987'),
(60, 'ORD_60210344', 'CTM_41879485', 'letrongnhan@gmail.com', 520000000, '2024-05-13 12:00:00', '2024-05-15 14:00:00', '2024-05-13 21:56:05', 'Deluxe Window', 'trong nhan', '0321456987'),
(61, 'ORD_19897416', 'CTM_49235718', 'letrongnhan@gmail.com', 998000, '2024-05-14 12:00:00', '2024-05-16 14:00:00', '2024-05-14 15:32:26', 'Family', 'chidsa', '0321456987'),
(62, 'ORD_60877044', 'CTM_20239592', 'letrongnhan@gmail.com', 10000, '2024-05-14 12:00:00', '2024-05-17 14:00:00', '2024-05-14 15:32:32', 'Premier Deluxe', 'trong nhan', '0321456987'),
(63, 'ORD_9243077', 'CTM_10059623', 'letrongnhan@gmail.com', 100000, '2024-05-14 12:00:00', '2024-05-16 14:00:00', '2024-05-14 15:32:58', 'Deluxe Window', 'trong nhan', '0321456987'),
(64, 'ORD_61854737', 'CTM_6384458', 'letrongnhan@gmail.com', 10000000, '2024-05-14 12:00:00', '2024-05-16 14:00:00', '2024-05-14 15:32:51', 'Superior Double', 'Le Trong Nhan', '0394374868');

-- --------------------------------------------------------

--
-- Table structure for table `booked_room`
--

CREATE TABLE `booked_room` (
  `booked_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_booked_id` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tel` varchar(255) NOT NULL,
  `session` tinyint(1) NOT NULL,
  `done_session` tinyint(1) NOT NULL,
  `sum` float DEFAULT NULL,
  `history` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `room_id`, `customer_booked_id`, `customer_name`, `username`, `email`, `password`, `tel`, `session`, `done_session`, `sum`, `history`) VALUES
(64, 0, 'CTM_3697281', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 520000000, NULL),
(65, 0, 'CTM_79898283', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 1144000, NULL),
(66, 0, 'CTM_85585738', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 5488000, NULL),
(67, 0, 'CTM_82720978', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 520000000, NULL),
(68, 0, 'CTM_29369167', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 520000000, NULL),
(69, 0, 'CTM_52214503', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 520000000, NULL),
(70, 0, 'CTM_94209837', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 1144000, NULL),
(71, 0, 'CTM_8401926', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 520000000, NULL),
(72, 0, 'CTM_35610528', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 520000000, NULL),
(73, 0, 'CTM_35961238', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 1144000, NULL),
(74, 0, 'CTM_1964490', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 5488000, NULL),
(75, 0, 'CTM_9754713', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 520000000, NULL),
(76, 0, 'CTM_41879485', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 520000000, NULL),
(77, 0, 'CTM_10059623', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 100000, NULL),
(78, 0, 'CTM_6384458', 'Le Trong Nhan', NULL, 'letrongnhan@gmail.com', NULL, '0394374868', 0, 0, 10000000, NULL),
(79, 0, 'CTM_20239592', 'trong nhan', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 10000, NULL),
(80, 0, 'CTM_49235718', 'chidsa', NULL, 'letrongnhan@gmail.com', NULL, '0321456987', 0, 0, 998000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_room`
--

CREATE TABLE `detail_room` (
  `detail_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `requirement` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `square_meter` float NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `detail_room`
--

INSERT INTO `detail_room` (`detail_id`, `room_id`, `service_name`, `requirement`, `img_name`, `quantity`, `square_meter`, `description`) VALUES
(1, 1, 'Máy lạnh - Quầy bar mini - Nước đóng chai miễn phí - Két an toàn tại phòng - Bộ vệ sinh cá nhân - Máy sấy tóc - Bàn làm việc - Vòi tắm đứng', 'Không hút thuốc - Không đem theo thú cưng', 'deluxe_window.jpg - deluxe_window_01.jpg - deluxe_window_02.jpg - deluxe_window_03.jpg', 2, 18, 'Chỉ 1 trẻ em (0-11 tuổi) được ở chung với người lớn. - Nếu trẻ em từ 0-5 tuổi dùng chung phòng với người lớn: miễn phí. - Nếu trẻ từ 6-11 tuổi dùng chung phòng với người lớn: 150.000đ/bé/đêm.   '),
(2, 2, 'Vòi tắm đứng - Máy lạnh - Nước nóng - Chiếu phim tại phòng - Két an toàn tại phòng - Nước đóng chai miễn phí - Quầy bar mini - Bàn làm việc - Rèm cửa / màn che - Phòng tắm riêng - Bộ vệ sinh cá nhân', 'Không hút thuốc', 'superior_double.jpg - superior_double_01.jpg - superior_double_02.jpg - superior_double_03.jpg', 2, 22, '1 giường cỡ King, cửa sổ, có thể ngắm thành phố - Ăn sáng bao gồm trong giá phòng và sẽ được phục vụ theo menu.'),
(3, 3, 'Máy lạnh - Tủ lạnh mini - Nước đóng chai miễn phí - TV - Két an toàn tại phòng - Bàn làm việc - Phòng tắm riêng - Vòi tắm đứng - Bồn tắm - Bộ vệ sinh cá nhân - Máy sấy tóc', 'Không hút thuốc - Không mang thú cưng', 'premier_deluxe.jpg - premier_deluxe_01.jpg - premier_deluxe_02.jpg - premier_deluxe_03.jpg', 1, 20, 'Chỉ 1 trẻ em (0-11 tuổi) được ở chung với người lớn. - Nếu trẻ em từ 0-5 tuổi dùng chung phòng với người lớn: miễn phí. - Nếu trẻ từ 6-11 tuổi dùng chung phòng với người lớn: 150.000đ/bé/đêm.   '),
(4, 4, 'Bồn tắm - Vòi tắm đứng - Máy sấy tóc - Tủ lạnh - Máy lạnh - Quầy bar mini - TV - Két an toàn tại phòng - Nước đóng chai miễn phí - Bàn làm việc', 'Không hút thuốc - Không mang theo thú cưng', 'family.jpg - family_01.jpg - family_02.jpg - family_03.jpg', 3, 37, 'Chỉ 1 trẻ em (0-11 tuổi) được ở chung với người lớn. - Nếu trẻ em từ 0-5 tuổi dùng chung phòng với người lớn: miễn phí. - Nếu trẻ từ 6-11 tuổi dùng chung phòng với người lớn: 150.000đ/bé/đêm.  '),
(5, 6, 'Vòi tắm đứng - Máy sấy tóc - Bộ vệ sinh cá nhân - Phòng tắm riêng - Ban công/Sân hiên - Khu ẩm thực riêng biệt - Tủ lạnh - Khu vực chờ - Nước nóng/lạnh - Máy lạnh - Máy pha cà phê/trà - Két an toàn tại phòng - Nước đóng chai miễn phí - Bàn làm việc - Rèm ', 'Không hút thuốc - Không mang theo thú cưng', 'standard_double.jpg - standard_double_01.jpg - standard_double_02.jpg - standard_double_03.jpg', 2, 27, 'Một căn phòng giường đôi ấm cúng với diện tích 27m² cùng ban-công thoáng đãng, một TV 32-inch với cáp truyền hình cho bạn thoái mái lựa chọn các kênh, thêm vào đó là chiếc máy điều hoà đời mới tân tiến nhất, đảm bảo đem lại cảm giác thoải mái nhất cho bạn'),
(6, 8, 'Bồn tắm - Phòng tắm riêng - Vòi tắm đứng - Bộ vệ sinh cá nhân - Máy sấy tóc - Áo choàng tắm - Máy lạnh - Nước nóng - Nước đóng chai miễn phí - Bàn làm việc - Mini-bar - TV - Két an toàn tại phòng', 'Không hút thuốc', 'suite.jpg - suite_01.jpg - suite_02.jpg - suite_03.jpg', 2, 56, 'Mùa hoa quả chào đón - Khách lưu trú tại khách sạn sẽ được giảm giá 10% cho thức ăn tại nhà hàng Sky - Miễn phí cho 1 trẻ em dưới 6 tuổi ngủ chung giường với bố mẹ (bao gồm bữa sáng) - Trẻ em từ 6 đến 11 tuổi ngủ chung phòng với bố mẹ: 150.000đ/bé/đêm'),
(7, 10, 'Ban công/Sân hiên', 'Không hút thuốc', 'mia_suite_river_front.jpg - mia_suite_river_front_01.jpg - mia_suite_river_front_02.jpg - mia_suite_river_front_03.jpg', 1, 66, 'Mia Suite River Front'),
(8, 19, 'Lò vi sóng - Vòi tắm đứng - Nhà bếp mini - Tủ lạnh - Máy giặt - Máy lạnh - Nước đóng chai miễn phí - TV - Mini_Bar - Tủ lạnh - Bàn làm việc', 'Không hút thuốc - Không mang theo thú cưng', 'double_balcony.jpg - double_balcony_01.jpg - double_balcony_02.jpg - double_balcony_03.jpg', 2, 32, 'Double Balcony - Best room ever');

-- --------------------------------------------------------

--
-- Table structure for table `kind`
--

CREATE TABLE `kind` (
  `kind_id` int(11) NOT NULL,
  `kind_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kind`
--

INSERT INTO `kind` (`kind_id`, `kind_name`) VALUES
(1, 'Single'),
(2, 'Family'),
(3, 'Presidential');

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `part_id` int(11) NOT NULL,
  `part_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`part_id`, `part_name`) VALUES
(1, 'Lễ tân'),
(2, 'Quản lí lễ tân'),
(3, 'Lao công'),
(4, 'Bếp trưởng'),
(5, 'Đầu bếp'),
(6, 'Phục vụ'),
(7, 'Pha chế'),
(8, 'Nhân viên giám sát buồng phòng');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `rec_id` int(11) NOT NULL,
  `rec_code` varchar(255) NOT NULL,
  `rec_name` varchar(255) NOT NULL,
  `rec_part` int(11) NOT NULL DEFAULT 1,
  `rec_shift` int(11) NOT NULL DEFAULT 1,
  `rec_tel` varchar(255) DEFAULT NULL,
  `rec_email` varchar(255) DEFAULT NULL,
  `rec_birthday` varchar(255) DEFAULT NULL,
  `rec_salary` float DEFAULT NULL,
  `rec_factor` float NOT NULL DEFAULT 1,
  `rec_bonus` float NOT NULL DEFAULT 0,
  `rec_fine` float NOT NULL DEFAULT 0,
  `rec_startWork` varchar(255) DEFAULT NULL,
  `rec_timeWork` int(11) DEFAULT NULL,
  `rec_timeSalary` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`rec_id`, `rec_code`, `rec_name`, `rec_part`, `rec_shift`, `rec_tel`, `rec_email`, `rec_birthday`, `rec_salary`, `rec_factor`, `rec_bonus`, `rec_fine`, `rec_startWork`, `rec_timeWork`, `rec_timeSalary`) VALUES
(1, 'REC_71682903', 'Le Trong Nhan', 8, 2, '0394374868', 'letrongnhan@gmail.com', '21/03/2002', 8000000, 2, 10000, 100000, '04/05/2024', 8, '2024-05-09 09:47:35'),
(2, 'REC_58855826', 'Hoang Hoa Tham', 6, 3, '0392756873', 'hoanghoatham@gmail.com', '22/02/2004', 5000000, 2, 0, 0, '11/05/2024', 1, NULL),
(3, 'REC_87257983', 'Phan Dang Luu', 6, 2, NULL, NULL, NULL, 10000000, 1, 0, 0, '10/05/2024', 2, NULL),
(4, 'REC_44981250', 'Hoang Van Thu', 1, 3, '0123876987', NULL, NULL, 100000, 2, 10000000, 100000, '04/05/2024', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `kind_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `sale` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL,
  `booked_room_id` varchar(255) DEFAULT NULL,
  `arrive` datetime DEFAULT NULL,
  `quit` datetime DEFAULT NULL,
  `left_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `kind_id`, `name`, `price`, `sale`, `img`, `status_id`, `booked_room_id`, `arrive`, `quit`, `left_at`, `deleted_at`) VALUES
(1, 1, 'Deluxe Window', 2600000, 1190000, 'deluxe_window.jpg', 1, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Superior Double', 572000, 488000, 'superior_double.jpg', 1, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Premier Deluxe', 2744000, 1433000, 'premier_deluxe.jpg', 1, NULL, NULL, NULL, NULL, NULL),
(4, 2, 'Family', 499000, 389000, 'family.jpg', 1, NULL, NULL, NULL, NULL, NULL),
(6, 1, 'Standard Double', 954000, 488000, 'standard_double.jpg', 1, NULL, NULL, NULL, NULL, NULL),
(8, 3, 'Suite', 2435000, 1826000, 'suite.jpg', 1, NULL, NULL, NULL, NULL, NULL),
(10, 3, 'Mia Suite River Front', 10000000, 7556000, 'mia_suite_river_front.jpg', 1, NULL, NULL, NULL, NULL, NULL),
(16, 3, 'Executive Suite', 4190000, 2899000, 'executive_suite.jpg', 1, NULL, NULL, NULL, NULL, NULL),
(18, 1, 'Superior Twin', 2190000, 1790000, 'superior_twin.jpg', 1, NULL, NULL, NULL, NULL, NULL),
(19, 3, 'Double Balcony', 1211000, 730000, 'double_balcony.jpg', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`) VALUES
(1, 'Máy lạnh'),
(2, 'Vòi tắm đứng'),
(3, 'Bộ vệ sinh cá nhân'),
(4, 'Máy sấy tóc'),
(5, 'Phòng tắm riêng'),
(6, 'TV'),
(7, 'Nước đóng chai miễn phí'),
(8, 'Bồn tắm'),
(9, 'Két an toàn tại phòng'),
(10, 'Tủ lạnh'),
(11, 'Quầy bar mini'),
(12, 'Ban công / Sân hiên'),
(13, 'Lò vi sóng'),
(14, 'Áo choàng tắm'),
(15, 'Máy pha cà phê / trà'),
(16, 'Bàn làm việc'),
(17, 'Phòng cách âm'),
(18, 'Máy chơi đĩa DVD');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `shift_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift_name`) VALUES
(1, 'Ca 1 - 06:00 tới 14:00'),
(2, 'Ca 2 - 14:00 tới 22:00'),
(3, 'Ca 3 - 22:00 tới 06:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `act` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `name`, `act`) VALUES
(1, 'Empty', 'set_empty'),
(2, 'Full', 'set_full'),
(3, 'Maintained', 'maintain');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `booked_room`
--
ALTER TABLE `booked_room`
  ADD PRIMARY KEY (`booked_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `detail_room`
--
ALTER TABLE `detail_room`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `FK_detail_id` (`room_id`);

--
-- Indexes for table `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`kind_id`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `FK_rec_part` (`rec_part`),
  ADD KEY `FK_rec_shift` (`rec_shift`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_kind_id` (`kind_id`),
  ADD KEY `FK_status_id` (`status_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `booked_room`
--
ALTER TABLE `booked_room`
  MODIFY `booked_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `detail_room`
--
ALTER TABLE `detail_room`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kind`
--
ALTER TABLE `kind`
  MODIFY `kind_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_room`
--
ALTER TABLE `detail_room`
  ADD CONSTRAINT `FK_detail_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD CONSTRAINT `FK_rec_part` FOREIGN KEY (`rec_part`) REFERENCES `part` (`part_id`),
  ADD CONSTRAINT `FK_rec_shift` FOREIGN KEY (`rec_shift`) REFERENCES `shift` (`shift_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `FK_kind_id` FOREIGN KEY (`kind_id`) REFERENCES `kind` (`kind_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
