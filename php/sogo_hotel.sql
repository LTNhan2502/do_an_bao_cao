-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 13, 2024 lúc 12:43 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sogo_hotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `pass`) VALUES
(1, 'Trọng Nhân', 'admin', '123123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `psssword` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_room`
--

CREATE TABLE `detail_room` (
  `detail_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `square_meter` float NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_room`
--

INSERT INTO `detail_room` (`detail_id`, `room_id`, `quantity`, `square_meter`, `description`) VALUES
(1, 1, 1, 17, 'Only 1 child (0 to 11y) can sharing room with parents: - If children from 0 to 5 yrs shared Existing Bedding: Free. - If children 6-11 yrs shared Existing Bedding: VND 150,000Net/child/night.   ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kind`
--

CREATE TABLE `kind` (
  `kind_id` int(11) NOT NULL,
  `kind_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kind`
--

INSERT INTO `kind` (`kind_id`, `kind_name`) VALUES
(1, 'Single'),
(2, 'Family'),
(3, 'Presidential');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `kind_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `sale` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id`, `kind_id`, `name`, `price`, `sale`, `img`, `status_id`, `deleted_at`) VALUES
(1, 1, 'Deluxe Window', 2645, 1190, 'deluxe_window.jpg', 1, NULL),
(2, 1, 'Superior Double', 572, 550, 'superior_double.jpg', 1, NULL),
(3, 1, 'Premier Deluxe', 2744, 1433, 'premier_deluxe.jpg', 1, NULL),
(4, 2, 'Family', 499, 389, 'family.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`status_id`, `name`) VALUES
(1, 'Empty'),
(2, 'Full'),
(3, 'Maintained');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `detail_room`
--
ALTER TABLE `detail_room`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `FK_detail_id` (`room_id`);

--
-- Chỉ mục cho bảng `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`kind_id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_kind_id` (`kind_id`),
  ADD KEY `FK_status_id` (`status_id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detail_room`
--
ALTER TABLE `detail_room`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `kind`
--
ALTER TABLE `kind`
  MODIFY `kind_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `detail_room`
--
ALTER TABLE `detail_room`
  ADD CONSTRAINT `FK_detail_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `FK_kind_id` FOREIGN KEY (`kind_id`) REFERENCES `kind` (`kind_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
