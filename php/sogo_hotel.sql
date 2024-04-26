-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 03:49 AM
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

INSERT INTO `bill` (`bill_id`, `booked_room_id`, `customer_email`, `bill_price`, `bill_arrive`, `bill_leave`, `bill_checkout_at`, `room_name`, `customer_name`, `customer_tel`) VALUES
(1, '0', 'dd@gmail.com', 2645, '2024-04-02 14:00:00', '2024-04-06 12:00:00', '2024-04-24 15:34:42', 'Deluxe Window', 'LTN', '0123321123'),
(2, '0', 'bbb@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 14:58:16', 'Deluxe Window', 'Trong Nhan', '0394374864'),
(3, '0', 'bbb@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 14:58:16', 'Deluxe Window', 'Trong Nhan', '0394374864'),
(4, '0', 'bbb@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 14:58:16', 'Deluxe Window', 'Trong Nhan', '0394374864'),
(5, '0', 'ccc@gmail.com', 572, '2024-04-26 14:00:00', '2024-04-27 12:00:00', '2024-04-25 15:03:40', 'Superior Double', 'Le Trong Nhan', '0123456789'),
(6, '0', 'ddd@gmail.com', 2744, '2024-04-26 14:00:00', '2024-04-28 12:00:00', '2024-04-25 15:12:23', 'Premier Deluxe', 'LTNhan', '0321654987'),
(7, 'ORD_57290744', 'ddd@gmail.com', 2744, '2024-04-28 14:00:00', '2024-04-30 12:00:00', '2024-04-25 15:18:54', 'Premier Deluxe', 'LTNhan', '0321654987'),
(8, 'ORD_86047493', 'ccc@gmail.com', 572, '2024-04-25 14:00:00', '2024-04-28 12:00:00', '2024-04-25 15:24:08', 'Superior Double', 'Le Trong Nhan', '0123456789'),
(9, 'ORD_79017621', 'a@gmail.com', 2645, '2024-04-28 14:00:00', '2024-04-30 12:00:00', '2024-04-25 15:38:15', 'Deluxe Window', 'trongnhan', '0123456987'),
(10, 'ORD_45514958', 'a@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 15:45:55', 'Deluxe Window', 'trongnhan', '0123456987'),
(11, 'ORD_20356655', 'a@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 15:53:54', 'Deluxe Window', 'trongnhan', '0123456987'),
(12, 'ORD_63574742', 'a@gmail.com', 2645, '2024-04-25 14:00:00', '2024-04-27 12:00:00', '2024-04-25 15:57:37', 'Deluxe Window', 'trongnhan', '0321654987'),
(13, 'ORD_73063762', 'a@gmail.com', 2645, '2024-04-26 14:00:00', '2024-04-29 12:00:00', '2024-04-25 16:01:20', 'Deluxe Window', 'trongnhan', '0321654987');

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
  `customer_name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tel` varchar(255) NOT NULL,
  `session` tinyint(1) NOT NULL,
  `done_session` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `room_id`, `customer_name`, `username`, `email`, `password`, `tel`, `session`, `done_session`) VALUES
(19, 0, 'trongnhan', NULL, 'a@gmail.com', NULL, '0321654987', 0, 0),
(20, 0, 'trongnhanAgain', NULL, 'b@gmail.com', NULL, '0321654987', 0, 0),
(21, 1, 'trongnhanagain', NULL, 'c@gmail.com', NULL, '0321654987', 0, 0);

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
(1, 1, 'Vòi tắm đứng - Máy lạnh - Quầy bar mini - Nước đóng chai miễn phí - Bàn làm việc - Két an toàn tại phòng - TV - Bộ vệ sinh cá nhân - Máy sấy tóc', 'Không hút thuốc - Không mang theo thú cưng', 'deluxe_window_01.jpg - deluxe_window_02.jpg - deluxe_window_03.jpg', 1, 17, 'Only 1 child (0 to 11y) can sharing room with parents: - If children from 0 to 5 yrs shared Existing Bedding: Free. - If children 6-11 yrs shared Existing Bedding: VND 150,000Net/child/night.   '),
(2, 2, 'Vòi tắm đứng - Máy lạnh - Nước nóng - Chiếu phim tại phòng - Két an toàn tại phòng - TV - Nước đóng chai miễn phí - Quầy bar mini - Bàn làm việc - Rèm cửa / màn che - Phòng tắm riêng - Bộ vệ sinh cá nhân - Máy sấy tóc', 'Không hút thuốc', 'superior_double_01.jpg - superior_double_02.jpg - superior_double_03.jpg', 2, 22, '01 King-size bed, Window, City View - Breakfast will be served by A la Carte Menu. (Ăn sáng bao gồm trong giá phòng và sẽ được phục vụ theo menu).'),
(3, 3, 'Máy lạnh - Tủ lạnh mini - Nước đóng chai miễn phí - TV - Két an toàn tại phòng - Bàn làm việc - Phòng tắm riêng - Vòi tắm đứng - Bồn tắm - Bộ vệ sinh cá nhân - Máy sấy tóc', 'Không hút thuốc - Không mang thú cưng', 'premier_deluxe_01.jpg - premier_deluxe_02.jpg - premier_deluxe_03.jpg', 1, 20, 'Only 1 child (0 to 11y) can sharing room with parents: - If children from 0 to 5 yrs shared Existing Bedding: Free. - If children 6-11 yrs shared Existing Bedding: VND 150,000Net/child/night.  ');

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
  `left_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `kind_id`, `name`, `price`, `sale`, `img`, `status_id`, `booked_room_id`, `arrive`, `quit`, `left_at`) VALUES
(1, 2, 'Deluxe Window', 2645, 1190, 'deluxe_window.jpg', 2, 'ORD_45304204', '2024-04-26 14:00:00', '2024-04-29 12:00:00', NULL),
(2, 1, 'Superior Double', 572, 555, 'superior_double.jpg', 1, NULL, NULL, NULL, NULL),
(3, 1, 'Premier Deluxe', 2744, 1433, 'premier_deluxe.jpg', 1, NULL, NULL, NULL, NULL),
(4, 2, 'Family', 499, 389, 'family.jpg', 1, '0', NULL, NULL, NULL),
(6, 1, 'Standard Double', 954, 488, 'standard_double.jpg', 2, '0', NULL, NULL, NULL);

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
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `booked_room`
--
ALTER TABLE `booked_room`
  MODIFY `booked_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `detail_room`
--
ALTER TABLE `detail_room`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kind`
--
ALTER TABLE `kind`
  MODIFY `kind_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `FK_kind_id` FOREIGN KEY (`kind_id`) REFERENCES `kind` (`kind_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
