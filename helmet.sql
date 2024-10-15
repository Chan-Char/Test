-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 12, 2024 at 10:25 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helmet`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `cart_user_id_foreign` (`user_id`),
  KEY `cart_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` tinyint NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`order_detail_id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `quantity`) VALUES
(1, 1, 10),
(2, 2, 25),
(3, 3, 5),
(4, 4, 15),
(5, 5, 30),
(6, 1, 5),
(7, 2, 10),
(8, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `payment_method` enum('Credit Card','PayPal','Bank Transfer') NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `payments_order_id_foreign` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `images` text NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `products_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `quantity`, `images`) VALUES
(1, 'Nón sơn đen', 'Nón sơn màu đen là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 250000, 1, 'image/1.1.ĐEN.PNG'),
(2, 'Nón sơn tím', 'Nón sơn màu tím là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 250000, 1, 'image/1.2.TIM.png'),
(3, 'Nón sơn vàng chanh', 'Nón sơn màu vàng là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 250000, 1, 'image/1.3.MINO.png'),
(4, 'Nón sơn xanh dương', 'Nón sơn màu xanh dương là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 300000, 1, 'image/1.4.XANHDUONG.png'),
(5, 'Nón sơn xám', 'Nón sơn màu xám là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 250000, 1, 'image/1.5.XAM.png'),
(6, 'Nón sơn đỏ', 'Nón sơn màu đỏ là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 275000, 1, 'image/1.2.TIM.png'),
(7, 'Nón sơn vàng', 'Nón sơn màu vàng là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 280000, 1, 'image/1.2.TIM.png'),
(8, 'Nón sơn hồng', 'Nón sơn màu hồng là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 290000, 1, 'image/1.2.TIM.png'),
(31, 'Nón bảo hiểm 3/4 màu cam', 'Nón sơn màu cam là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/3.1'),
(32, 'Nón bảo hiểm 3/4 màu đen nhám', 'Nón sơn màu đen nhám là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/3.2'),
(33, 'Nón bảo hiểm 3/4 màu đen bóng', 'Nón sơn màu đen bóng là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/3.3'),
(34, 'Nón bảo hiểm 3/4 màu trắng', 'Nón sơn màu trắng là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/3.5'),
(35, '3/4 ne', 'Nón sơn màu đen là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/3.5'),
(41, 'Nón bảo hiểm fullface đỏ lửa đen', 'Nón sơn màu cam là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/4.1'),
(42, 'Nón bảo hiểm fullface đen cam', 'Nón sơn màu đen nhám là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/4.2'),
(43, 'Nón bảo hiểm fullface màu đen bóng', 'Nón sơn màu đen bóng là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/4.3'),
(44, 'Nón bảo hiểm fullface màu đen lửa', 'Nón sơn màu trắng là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/4.4'),
(45, 'Nón bảo hiểm fullface mix đỏ', 'Nón sơn màu đen là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/4.5'),
(51, 'Nón bảo hiểm có kính đen', 'Nón sơn màu cam là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/5.1'),
(52, 'Nón bảo hiểm có kính trắng', 'Nón sơn màu đen nhám là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/5.2'),
(53, 'Nón bảo hiểm có kính đen kính kiểu', 'Nón sơn màu đen bóng là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/5.3'),
(54, 'Nón bảo hiểm có kính đỏ kính kiểu', 'Nón sơn màu trắng là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/5.4'),
(55, 'Nón bảo hiểm có kính xanh', 'Nón sơn màu đen là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, thanh lịch và an toàn. Với thiết kế tinh tế, chất liệu cao cấp, nón mang lại sự thoải mái và bảo vệ tối ưu cho người sử dụng. Sản phẩm được sản xuất từ chất liệu nhựa ABS chất lượng cao, đảm bảo độ bền vượt trội và khả năng chống va đập tốt.\r\nVới nón sơn màu đen, bạn không chỉ có được sự an toàn tuyệt đối khi tham gia giao thông, mà còn thể hiện phong cách thời trang đầy cá tính và đẳng cấp. Đây là món phụ kiện không thể thiếu cho những hành trình dài và những chuyến đi ngắn hàng ngày. Hãy sở hữu ngay để trải nghiệm cảm giác an toàn và phong cách vượt trội!', 500000, 1, 'image/5.5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'ym', '030238220130@st.buh.edu.vn', '1234'),
(2, 'ân', 'an123@gmail.com', '3456');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
