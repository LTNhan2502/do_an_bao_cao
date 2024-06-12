-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 04:16 AM
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
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `auth_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `auth_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(64, 'ORD_61854737', 'CTM_6384458', 'letrongnhan@gmail.com', 10000000, '2024-05-14 12:00:00', '2024-05-16 14:00:00', '2024-05-14 15:32:51', 'Superior Double', 'Le Trong Nhan', '0394374868'),
(65, 'ORD_39538006', 'CTM_16770763', 'letrongnhan@gmail.com', 10400000, '2024-12-20 12:00:00', '2024-12-24 14:00:00', '2024-05-21 11:15:54', 'Deluxe Window', 'trong nhan', '0321456987'),
(66, 'ORD_118130', 'CTM_26369186', 'trongnhan@gmail.com', 1144000, '2024-05-22 12:00:00', '2024-05-24 14:00:00', '2024-05-22 13:44:07', 'Superior Double', 'Trọng Nhân', '0321456987'),
(67, 'ORD_49796957', 'CTM_29825641', '', 7800000, '2024-05-22 12:00:00', '2024-05-25 14:00:00', '2024-05-22 14:11:16', 'Deluxe Window', 'Trọng Nhân', '0394374868'),
(68, 'ORD_42417309', 'CTM_60695705', 'trongnhan@gmail.com', 1144000, '2024-05-22 12:00:00', '2024-05-24 14:00:00', '2024-05-22 14:16:52', 'Superior Double', 'Trọng Nhân', '0321456987'),
(69, 'ORD_85072962', 'CTM_91544377', 'ltn@gmail.com', 5488000, '2024-05-25 12:00:00', '2024-05-27 14:00:00', '2024-05-25 09:52:48', 'Premier Deluxe', 'LTN', '0987654321'),
(70, 'ORD_89562149', 'CTM_53915268', 'letrongnhan@gmail.com', 1144000, '2024-05-24 12:00:00', '2024-05-26 14:00:00', '2024-05-25 09:52:57', 'Superior Double', 'Trọng Nhân', '0123123123'),
(71, 'ORD_45874546', 'CTM_60968922', 'ltn@gmail.com', 30000000, '2024-05-27 12:00:00', '2024-05-30 14:00:00', '2024-05-25 10:39:27', 'Mia Suite River Front', 'Superior Twin', '0987654321'),
(72, 'ORD_73839574', 'CTM_92211415', 'ltn@gmail.com', 572000, '2024-05-27 12:00:00', '2024-05-28 14:00:00', '2024-05-25 16:27:27', 'Superior Double', 'trong nhan', '0132165458'),
(73, 'ORD_16536110', 'CTM_2699984', 'ltn@gmail.com', 2744000, '2024-05-28 12:00:00', '2024-05-29 14:00:00', '2024-05-25 16:32:37', 'Premier Deluxe', 'chidsa', '0987654321'),
(74, 'ORD_33891728', 'CTM_37536308', 'ltn@gmail.com', 2600000, '2024-05-25 12:00:00', '2024-05-26 14:00:00', '2024-05-25 16:34:38', 'Deluxe Window', 'kfc', '0123123123'),
(75, 'ORD_26075435', 'CTM_18979300', 'ltn@gmail.com', 572000, '2024-05-25 12:00:00', '2024-05-26 14:00:00', '2024-05-25 16:44:54', 'Superior Double', 'kfc', '0123123132'),
(76, 'ORD_10384045', 'CTM_7851689', 'ltn@gmail.com', 5200000, '2024-05-25 12:00:00', '2024-05-27 14:00:00', '2024-05-27 09:12:26', 'Deluxe Window', 'kfc', '0123123123'),
(77, 'ORD_45287730', 'CTM_5552973', 'trongnhan@gmail.com', 572000, '2024-05-27 12:00:00', '2024-05-28 14:00:00', '2024-05-27 15:31:03', 'Superior Double', 'trọng nhân', ''),
(78, 'ORD_10798411', 'CTM_62963368', '', 2744000, '2024-05-28 12:00:00', '2024-05-29 14:00:00', '2024-05-27 09:40:00', 'Premier Deluxe', 'trọng nhân', ''),
(79, 'ORD_10798411', 'CTM_62963368', '', 2744000, '2024-05-28 12:00:00', '2024-05-29 14:00:00', '2024-05-27 09:40:05', 'Premier Deluxe', 'trọng nhân', ''),
(80, 'ORD_48442241', 'CTM_814363', '', 1144000, '2024-05-27 12:00:00', '2024-05-29 14:00:00', '2024-05-27 09:52:24', 'Superior Double', 'trọng nhân', ''),
(81, 'ORD_1171844', 'CTM_85304407', 'trongnhan@gmail.com', 1144000, '2024-05-27 12:00:00', '2024-05-29 14:00:00', '2024-05-27 10:08:24', 'Superior Double', 'trọng nhân', ''),
(82, 'ORD_92249220', 'CTM_53432955', 'trongnhan@gmail.com', 5488000, '2024-05-28 12:00:00', '2024-05-30 14:00:00', '2024-05-27 10:09:56', 'Premier Deluxe', 'trọng nhân', ''),
(83, 'ORD_21071637', 'CTM_96697750', 'trongnhan@gmail.com', 572000, '2028-05-28 12:00:00', '2028-05-29 14:00:00', '2024-05-28 11:08:55', 'Superior Double', 'trọng nhân', ''),
(84, 'ORD_67274523', 'CTM_74809762', 'trongnhan@gmail.com', 998000, '2024-05-28 12:00:00', '2024-05-30 14:00:00', '2024-05-28 14:12:25', 'Family', 'trọng nhân', ''),
(85, 'ORD_26669109', 'CTM_78513463', 'letrongnhan722@gmail.com', 1144000, '2024-05-28 12:00:00', '2024-05-30 14:00:00', '2024-05-29 09:04:29', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(86, 'ORD_26669109', 'CTM_78513463', 'letrongnhan722@gmail.com', 1144000, '2024-05-28 12:00:00', '2024-05-30 14:00:00', '2024-05-29 09:27:10', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(87, 'ORD_26669109', 'CTM_78513463', 'letrongnhan722@gmail.com', 1144000, '2024-05-28 12:00:00', '2024-05-30 14:00:00', '2024-05-29 09:27:38', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(88, 'ORD_13247234', 'CTM_78513463', 'letrongnhan722@gmail.com', 5200000, '2024-05-29 12:00:00', '2024-05-31 14:00:00', '2024-05-31 13:49:25', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(89, 'ORD_34311183', 'CTM_78513463', 'letrongnhan722@gmail.com', 998000, '2024-05-28 12:00:00', '2024-05-30 14:00:00', '2024-05-31 13:49:33', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(90, 'ORD_72224588', '', 'letrongnhan722@gmail.com', 2600000, '2024-05-31 12:00:00', '2024-06-02 14:00:00', '2024-06-05 15:24:18', 'Deluxe Window', 'Lê Trọng Nhân', '0394374868'),
(91, 'ORD_43843617', '', 'letrongnhan722@gmail.com', 572000, '2024-05-31 12:00:00', '2024-06-02 14:00:00', '2024-06-05 15:25:08', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(92, 'ORD_18770170', '', 'letrongnhan722@gmail.com', 6686000, '2024-06-01 12:00:00', '2024-06-03 14:00:00', '2024-06-05 15:25:15', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(93, 'ORD_49013434', '', 'letrongnhan722@gmail.com', 12110000, '2024-06-08 12:00:00', '2024-06-09 14:00:00', '2024-06-05 15:25:20', 'Deluxe Window', 'Lê Trọng Nhân', ''),
(94, 'ORD_72928865', '', 'letrongnhan722@gmail.com', 1497000, '2024-06-08 12:00:00', '2024-06-11 14:00:00', '2024-06-05 15:25:25', 'Deluxe Window', 'Lê Trọng Nhân', '0123123123'),
(95, 'ORD_90177876', '', 'letrongnhan722@gmail.com', 1908000, '2024-06-01 12:00:00', '2024-06-03 14:00:00', '2024-06-05 15:25:30', 'Deluxe Window', 'Lê Trọng Nhân', ''),
(96, 'ORD_72479182', 'CTM_10284927', 'letrongnhan722@gmail.com', 5998000, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 14:12:33', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(97, 'ORD_45368486', 'CTM_10284927', 'letrongnhan722@gmail.com', 5998000, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 14:12:41', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(98, 'ORD_93789746', 'CTM_10284927', 'letrongnhan722@gmail.com', 5998000, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 14:18:00', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(99, 'ORD_22397439', 'CTM_10284927', 'letrongnhan722@gmail.com', 5998000, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 14:18:03', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(100, 'ORD_54957009', 'CTM_10284927', 'letrongnhan722@gmail.com', 2174000, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 14:26:00', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(101, 'ORD_77978265', 'CTM_10284927', 'letrongnhan722@gmail.com', 2174000, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 16:23:06', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(102, 'ORD_69502874', 'CTM_10284927', 'letrongnhan722@gmail.com', 1144000, '2024-06-07 12:00:00', '2024-06-09 14:00:00', '2024-06-06 17:03:56', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(103, 'ORD_29802140', 'CTM_10284927', 'letrongnhan722@gmail.com', 1087000, '2024-06-08 12:00:00', '2024-06-09 14:00:00', '2024-06-06 17:29:47', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864'),
(104, 'ORD_16157597', 'CTM_10284927', 'letrongnhan722@gmail.com', 5998000, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-07 09:40:28', 'Deluxe Window', 'Lê Trọng Nhân', '0394374864');

-- --------------------------------------------------------

--
-- Table structure for table `booked_room`
--

CREATE TABLE `booked_room` (
  `booked_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `booked_room_id` varchar(255) DEFAULT NULL,
  `booked_customer_id` varchar(255) NOT NULL,
  `booked_customer_name` varchar(255) NOT NULL,
  `booked_tel` varchar(255) DEFAULT NULL,
  `booked_email` varchar(255) NOT NULL,
  `booked_room_name` varchar(255) NOT NULL,
  `booked_price` float NOT NULL,
  `booked_sum` float DEFAULT NULL,
  `booked_time_book` datetime DEFAULT NULL,
  `booked_cancel_time` datetime DEFAULT NULL,
  `booked_arrive` datetime DEFAULT NULL,
  `booked_quit` datetime DEFAULT NULL,
  `booked_left_at` datetime DEFAULT NULL,
  `booked_session` tinyint(1) NOT NULL,
  `booked_done_session` tinyint(1) NOT NULL,
  `booked_unbook` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `booked_room`
--

INSERT INTO `booked_room` (`booked_id`, `room_id`, `customer_id`, `booked_room_id`, `booked_customer_id`, `booked_customer_name`, `booked_tel`, `booked_email`, `booked_room_name`, `booked_price`, `booked_sum`, `booked_time_book`, `booked_cancel_time`, `booked_arrive`, `booked_quit`, `booked_left_at`, `booked_session`, `booked_done_session`, `booked_unbook`) VALUES
(6, 2, 106, 'ORD_26669109', 'CTM_78513463', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 572000, 1144000, NULL, NULL, '2024-05-28 12:00:00', '2024-05-30 14:00:00', '2024-05-29 09:27:39', 0, 1, 0),
(7, 1, 106, 'ORD_13247234', 'CTM_78513463', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 2600000, 5200000, NULL, NULL, '2024-05-29 12:00:00', '2024-05-31 14:00:00', '2024-05-31 13:49:26', 0, 1, 0),
(8, 4, 106, 'ORD_34311183', 'CTM_78513463', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 499000, 998000, NULL, NULL, '2024-05-28 12:00:00', '2024-05-30 14:00:00', '2024-05-31 13:49:34', 0, 1, 0),
(15, 22, 107, 'ORD_72479182', 'CTM_10284927', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 0, 5998000, NULL, NULL, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 14:12:35', 0, 1, 0),
(16, 22, 107, 'ORD_45368486', 'CTM_10284927', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 0, 5998000, NULL, NULL, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 14:12:43', 0, 1, 0),
(17, 22, 107, 'ORD_93789746', 'CTM_10284927', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 0, 5998000, NULL, NULL, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 14:18:01', 0, 1, 0),
(18, 22, 107, 'ORD_22397439', 'CTM_10284927', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 0, 5998000, NULL, NULL, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 14:18:04', 0, 1, 0),
(19, 21, 107, 'ORD_54957009', 'CTM_10284927', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 0, 2174000, NULL, NULL, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 14:26:00', 0, 1, 0),
(20, 21, 107, 'ORD_77978265', 'CTM_10284927', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 1087000, 2174000, NULL, NULL, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-06 16:23:07', 0, 1, 0),
(21, 2, 107, 'ORD_69502874', 'CTM_10284927', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 572000, 1144000, NULL, NULL, '2024-06-07 12:00:00', '2024-06-09 14:00:00', '2024-06-06 17:03:56', 0, 1, 0),
(22, 21, 107, 'ORD_29802140', 'CTM_10284927', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 1087000, 1087000, NULL, NULL, '2024-06-08 12:00:00', '2024-06-09 14:00:00', '2024-06-06 17:29:47', 0, 1, 0),
(23, 22, 107, 'ORD_16157597', 'CTM_10284927', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 2999000, 5998000, NULL, NULL, '2024-06-06 12:00:00', '2024-06-08 14:00:00', '2024-06-07 09:40:31', 0, 1, 0),
(24, 6, 107, 'ORD_19906222', 'CTM_10284927', 'Lê Trọng Nhân', '0394374864', 'letrongnhan722@gmail.com', 'Deluxe Window', 954000, 1908000, '2024-06-07 10:16:12', '2024-06-07 15:09:58', '2024-06-07 12:00:00', '2024-06-09 14:00:00', NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_booked_id` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_gender` int(11) DEFAULT NULL,
  `customer_birthday` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_guest` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `history` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `room_id`, `customer_booked_id`, `customer_name`, `customer_gender`, `customer_birthday`, `email`, `email_guest`, `password`, `tel`, `deleted_at`, `history`) VALUES
(94, 0, 'CTM_74809762', 'trọng nhân', NULL, NULL, 'trongnhan@gmail.com', NULL, '$2y$10$5Z8abpsgxSHvPTWyZIl2e.ZzaPqpxqzoUqKGHMEg4Q4OAf/3KYrrO', '', NULL, NULL),
(95, 0, 'CTM_53915268', 'Trọng Nhân', NULL, NULL, NULL, 'letrongnhan@gmail.com', NULL, '0123123123', NULL, NULL),
(96, 0, 'CTM_7851689', 'kfc', NULL, NULL, NULL, 'ltn@gmail.com', NULL, '0123123123', NULL, NULL),
(107, 0, 'CTM_10284927', 'Lê Trọng Nhân', 1, '05/06/2024', 'letrongnhan722@gmail.com', NULL, '$2y$10$6rltEPFnBqCTPrcKArLNheTtkvCxRJBYdGBa2sDlNZ3aA0/ft2Kku', '0394374864', NULL, '1 - 2 - 20 - 19 - 4 - 6 - 22 - 22 - 22 - 22 - 21 - 21 - 2 - 21 - 22 - 6'),
(108, 0, 'CTM_33652587', 'Nhân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(7, 10, 'Ban công/Sân hiên - Vòi tắm đứng - Bộ vệ sinh cá nhân - Khăn tắm - Bồn tắm - Máy lạnh - TV', 'Không hút thuốc - Không đem theo thú cưng', 'mia_suite_river_front.jpg - mia_suite_river_front_01.jpg - mia_suite_river_front_02.jpg - mia_suite_river_front_03.jpg', 1, 66, 'Mia Suite River Front'),
(8, 19, 'Lò vi sóng - Vòi tắm đứng - Nhà bếp mini - Tủ lạnh - Máy giặt - Máy lạnh - Nước đóng chai miễn phí - TV - Mini_Bar - Tủ lạnh - Bàn làm việc', 'Không hút thuốc - Không mang theo thú cưng', 'double_balcony.jpg - double_balcony_01.jpg - double_balcony_02.jpg - double_balcony_03.jpg', 2, 32, 'Double Balcony - Best room ever'),
(9, 20, 'Bồn tắm - Ban công/Sân hiên - Khu vực chờ - Nước nóng - Máy lạnh - Quầy bar mini - Rèm cửa/màn che - Nước đóng chai miễn phí - TV - Vòi tắm riêng - Áo choàng tắm - Bộ vệ sinh cá nhân - Máy sấy tóc', 'Không hút thuốc - Không đem theo thú cưng', 'premier_family_seaview.jpg - premier_family_seaview_01.jpg - premier_family_seaview_02.jpg - premier_family_seaview_03.jpg', 4, 50, 'Phòng tốt nhất cho gia đình với ban công ngắm biển cực đẹp.'),
(10, 18, 'Vòi tắm đứng - Khu vực chờ - Máy lạnh - Quầy bar mini - Bàn làm việc - Nước đóng chai miễn phí - TV - Két an toàn tại phòng - Rèm cửa/màn che - Vòi tắm đứng - Bộ vệ sinh cá nhân', 'Không hút thuốc - Không đem theo thú cưng', 'superior_twin.jpg - superior_twin_01.jpg - superior_twin_02.jpg - superior_twin_03.jpg', 2, 29, 'Phòng sạch sẽ, thoáng mát, đầy đủ các tiện nghi cần thiết'),
(11, 16, 'Khu ẩm thực riêng biệt - Vòi tắm đứng - Máy sấy tóc - Bộ vệ sinh cá nhân - Tủ lạnh - Khu vực chờ - Máy lạnh - Quầy bar mini - TV - Bàn làm việc - Nước đóng chai miễn phí', 'Không hút thuốc - Không đem theo thú cưng', 'executive_suite.jpg - executive_suite_01.jpg - executive_suite_02.jpg - executive_suite_03.jpg', 2, 55, 'Phòng được thiết kế theo phong cách hiện đại, đảm bảo đem lại cảm giác thoải mái nhất cho khách hàng'),
(12, 21, 'Vòi tắm đứng - Nhà bếp - Tủ lạnh - Nước nóng - Máy lạnh - Wi-Fi miễn phí - Quầy bar mini - Nước đóng chai miễn phí - Bàn làm việc - Nước nóng - Máy sấy tóc - Bộ vệ sinh cá nhân - Phòng tắm riêng', 'Không hút thuốc - Không mang theo thú cưng', 'le_studio_suite.jpg - le_studio_suite_01.jpg - le_studio_suite_02.jpg - le_studio_suite_03.jpg', 2, 36, 'Le Studio Suite'),
(13, 22, 'Vòi tắm đứng - Khu vực chờ - Nước nóng - Máy lạnh - Bữa sáng - WiFi miễn phí - Máy lạnh - Quầy bar mini - Rèm cửa/màn che - Nước đóng chai miễn phí - Két an toàn tại phòng', 'Không hút thuốc - Không mang theo thú cưng', 'premium_deluxe_double_garden_view.jpg - premium_deluxe_double_garden_view_01.jpg - premium_deluxe_double_garden_view_02.jpg - premium_deluxe_double_garden_view_03.jpg', 2, 40, 'Ăn sáng mỗi ngày. - Miễn phí ghế bố, tắm biển, hồ bơi nước biển, hồ bơi nước ngọt và tắm nước ngọt tại resort.\n');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `gender_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `customer_id`, `gender_name`) VALUES
(1, 0, 'Nam'),
(2, 0, 'Nữ'),
(3, 0, 'Khác'),
(4, 0, 'Không muốn tiết lộ');

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
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `per_id` int(11) NOT NULL,
  `per_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`per_id`, `per_name`) VALUES
(1, 'Full'),
(2, 'Admin'),
(3, 'Read only'),
(4, 'Edit'),
(5, 'Create');

-- --------------------------------------------------------

--
-- Table structure for table `per_detail`
--

CREATE TABLE `per_detail` (
  `per_detail_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `action_code` varchar(255) NOT NULL,
  `check_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `per_detail`
--

INSERT INTO `per_detail` (`per_detail_id`, `per_id`, `action_code`, `check_action`) VALUES
(1, 1, 'create', 1),
(2, 1, 'edit', 1),
(3, 1, 'delete', 1),
(4, 1, 'view', 1),
(5, 2, 'create', 1),
(6, 2, 'edit', 1),
(7, 2, 'delete', 0),
(8, 2, 'view', 1),
(9, 3, 'create', 0),
(10, 3, 'edit', 0),
(11, 3, 'delete', 0),
(12, 3, 'view', 1),
(13, 4, 'create', 0),
(14, 4, 'edit', 1),
(15, 4, 'delete', 0),
(16, 4, 'view', 1),
(17, 5, 'create', 1),
(18, 5, 'edit', 0),
(19, 5, 'delete', 0),
(20, 5, 'view', 1);

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
  `rec_timeSalary` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`rec_id`, `rec_code`, `rec_name`, `rec_part`, `rec_shift`, `rec_tel`, `rec_email`, `rec_birthday`, `rec_salary`, `rec_factor`, `rec_bonus`, `rec_fine`, `rec_startWork`, `rec_timeWork`, `rec_timeSalary`, `deleted_at`) VALUES
(1, 'REC_71682903', 'Lê Trọng Nhân', 8, 2, '0394374868', 'letrongnhan@gmail.com', '21/03/2002', 8000000, 2, 10000, 1000000, '05/05/2024', 36, NULL, NULL),
(2, 'REC_58855826', 'Hoàng Hoa Thám', 6, 3, '0392756873', 'hoanghoatham@gmail.com', '22/02/2004', 5000000, 2, 0, 0, '20/05/2024', 18, NULL, NULL),
(3, 'REC_87257983', 'Phan Đăng Lưu', 6, 2, NULL, NULL, NULL, 10000000, 1, 0, 0, '11/05/2024', 27, NULL, NULL),
(4, 'REC_44981250', 'Hoàng Văn Thụ', 1, 3, '0123876987', NULL, NULL, 100000, 2, 10000000, 100000, '05/05/2024', 33, '2024-05-28 11:13:26', NULL),
(5, 'REC_42289105', 'Trọng Nhân', 3, 1, NULL, NULL, '13/11/2004', 8000000, 1, 0, 0, '14/08/2023', 295, NULL, NULL),
(6, 'REC_64083254', 'Nhân', 1, 1, NULL, NULL, NULL, 10000000, 1, 0, 0, NULL, NULL, NULL, NULL);

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
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `kind_id`, `name`, `price`, `sale`, `img`, `status_id`, `booked_room_id`, `deleted_at`) VALUES
(1, 1, 'Deluxe Window', 2600000, 1190000, 'deluxe_window.jpg', 1, NULL, NULL),
(2, 1, 'Superior Double', 572000, 488000, 'superior_double.jpg', 1, NULL, NULL),
(3, 1, 'Premier Deluxe', 2744000, 1433000, 'premier_deluxe.jpg', 1, NULL, NULL),
(4, 2, 'Family', 499000, 389000, 'family.jpg', 1, NULL, NULL),
(6, 1, 'Standard Double', 954000, 488000, 'standard_double.jpg', 1, NULL, NULL),
(8, 3, 'Suite', 2435000, 1826000, 'suite.jpg', 1, NULL, NULL),
(10, 3, 'Mia Suite River Front', 10000000, 7556000, 'mia_suite_river_front.jpg', 1, NULL, NULL),
(16, 3, 'Executive Suite', 4190000, 2899000, 'executive_suite.jpg', 1, NULL, NULL),
(18, 1, 'Superior Twin', 2190000, 1790000, 'superior_twin.jpg', 1, NULL, NULL),
(19, 3, 'Double Balcony', 12110000, 730000, 'double_balcony.jpg', 1, NULL, NULL),
(20, 2, 'Premier Family Seaview', 3343000, 2449000, 'premier_family_seaview.jpg', 1, NULL, NULL),
(21, 1, 'Le Studio Suite', 1087000, 598000, 'le_studio_suite.jpg', 1, NULL, NULL),
(22, 1, 'Premium Deluxe Double Garden View', 2999000, 1899000, 'premium_deluxe_double_garden_view.jpg', 1, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `user_per`
--

CREATE TABLE `user_per` (
  `user_per_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `licensed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_per`
--

INSERT INTO `user_per` (`user_per_id`, `per_id`, `admin_id`, `rec_id`, `licensed`) VALUES
(2, 1, 1, 0, 1),
(3, 2, 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`auth_id`);

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
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

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
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `per_detail`
--
ALTER TABLE `per_detail`
  ADD PRIMARY KEY (`per_detail_id`),
  ADD KEY `FK_per_id` (`per_id`);

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
-- Indexes for table `user_per`
--
ALTER TABLE `user_per`
  ADD PRIMARY KEY (`user_per_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `booked_room`
--
ALTER TABLE `booked_room`
  MODIFY `booked_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `detail_room`
--
ALTER TABLE `detail_room`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `per_detail`
--
ALTER TABLE `per_detail`
  MODIFY `per_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `user_per`
--
ALTER TABLE `user_per`
  MODIFY `user_per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_room`
--
ALTER TABLE `detail_room`
  ADD CONSTRAINT `FK_detail_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `per_detail`
--
ALTER TABLE `per_detail`
  ADD CONSTRAINT `FK_per_id` FOREIGN KEY (`per_id`) REFERENCES `permission` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
