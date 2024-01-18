-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.26 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for eshop
CREATE DATABASE IF NOT EXISTS `eshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `eshop`;

-- Dumping structure for table eshop.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `verification_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.admin: ~2 rows (approximately)
INSERT INTO `admin` (`email`, `fname`, `lname`, `verification_code`) VALUES
	('chalithachamod3031@gmail.com', 'Chalitha', 'Chamod', '6387254d4f118'),
	('chamodnadeeshan91@gmail.com', 'Chamod', 'Chamod', '62b0d0ab58bac');

-- Dumping structure for table eshop.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.brand: ~14 rows (approximately)
INSERT INTO `brand` (`id`, `name`) VALUES
	(2, 'Apple'),
	(6, 'realme'),
	(7, 'OnePlus'),
	(8, 'ASUS ROG'),
	(10, 'oppo'),
	(11, 'acer'),
	(12, 'msi'),
	(13, 'asus'),
	(14, 'Dell'),
	(15, 'Hp'),
	(16, 'camera'),
	(17, 'drone'),
	(18, 'mouse & keyboard'),
	(19, 'back cover');

-- Dumping structure for table eshop.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cart_product` (`product_id`),
  KEY `FK_cart_user` (`user_email`),
  CONSTRAINT `FK_cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_cart_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.cart: ~11 rows (approximately)
INSERT INTO `cart` (`id`, `product_id`, `user_email`, `qty`) VALUES
	(37, 55, 'chamodnadeeshan91@gmail.com', 1),
	(38, 4, 'chamodnadeeshan91@gmail.com', 1),
	(39, 8, 'chamodnadeeshan91@gmail.com', 1),
	(40, 30, 'chamodnadeeshan91@gmail.com', 2),
	(43, 11, 'chalithachamod3031@gmail.com', 1),
	(44, 18, 'chalithachamod3031@gmail.com', 1),
	(45, 26, 'chalithachamod3031@gmail.com', 1),
	(46, 30, 'chalithachamod3031@gmail.com', 2),
	(47, 39, 'chalithachamod3031@gmail.com', 1),
	(48, 2, 'chalithachamod3031@gmail.com', 3),
	(49, 4, 'chalithachamod3031@gmail.com', 1);

-- Dumping structure for table eshop.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.category: ~6 rows (approximately)
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Cell Phone  & Accessries'),
	(2, 'computer & Tablets'),
	(3, 'Cameras'),
	(4, 'Camaera Drones'),
	(5, 'Mouse & Keyboard'),
	(6, 'Mobile Back Covers');

-- Dumping structure for table eshop.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `postal_code` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__district` (`district_id`),
  CONSTRAINT `FK__district` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.city: ~7 rows (approximately)
INSERT INTO `city` (`id`, `name`, `postal_code`, `district_id`) VALUES
	(1, 'alawwa', '60280', 7),
	(2, '	Badulla', '90000', 20),
	(3, 'Moratuwa', '10400', 9),
	(4, 'colombo', '11500', 9),
	(5, 'Dambulla', '21100', 13),
	(6, 'Sri Jayawardenepura', '10100', 9),
	(7, 'Puttalam', '61300', 7);

-- Dumping structure for table eshop.colour
CREATE TABLE IF NOT EXISTS `colour` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.colour: ~9 rows (approximately)
INSERT INTO `colour` (`id`, `name`) VALUES
	(1, 'black'),
	(2, 'white'),
	(3, 'gold'),
	(4, 'blue'),
	(5, 'silver'),
	(6, 'red'),
	(7, 'green'),
	(8, 'Grey'),
	(9, 'Transparent');

-- Dumping structure for table eshop.condition
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.condition: ~2 rows (approximately)
INSERT INTO `condition` (`id`, `name`) VALUES
	(1, 'Brand new'),
	(2, '  Used');

-- Dumping structure for table eshop.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_district_province` (`province_id`),
  CONSTRAINT `FK_district_province` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.district: ~25 rows (approximately)
INSERT INTO `district` (`id`, `name`, `province_id`) VALUES
	(1, 'Jaffna', 3),
	(2, 'Kilinochchi', 3),
	(3, 'Mannar', 3),
	(4, 'Mullaitivu', 3),
	(5, 'Vavuniya', 3),
	(6, 'Puttalam', 6),
	(7, 'Kurunegala', 6),
	(8, 'Gampaha', 5),
	(9, 'Colombo', 5),
	(10, 'Anuradhapura', 7),
	(11, 'Polonnaruwa', 7),
	(12, 'Matale', 1),
	(13, 'Kandy', 1),
	(14, 'Nuwara Eliya', 1),
	(15, 'Kegalle', 9),
	(16, 'Ratnapura', 9),
	(17, 'Trincomalee', 2),
	(18, 'Batticaloa', 2),
	(19, 'Ampara', 2),
	(20, 'Badulla', 8),
	(21, 'Monaragala', 8),
	(22, 'Hambantota', 4),
	(23, 'Matara', 4),
	(24, 'Galle', 4),
	(25, 'kaluthara', 5);

-- Dumping structure for table eshop.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.gender: ~2 rows (approximately)
INSERT INTO `gender` (`id`, `name`) VALUES
	(1, 'male'),
	(2, 'female');

-- Dumping structure for table eshop.images
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(50) NOT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `FK_images_product` (`product_id`),
  CONSTRAINT `FK_images_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.images: ~34 rows (approximately)
INSERT INTO `images` (`code`, `product_id`) VALUES
	('resources//mobile images//realme 7.webp', 1),
	('resources//products//62126fce1a33doppo.jpg', 2),
	('resources//mobile images//iphone 12 pro.jpg', 3),
	('resources//mobile images//asus rog 3.jpg', 4),
	('resources//mobile images//OnePlus 8T.jpg', 5),
	('resources//computer images//acer.jpg', 6),
	('resources//computer images//msi.jpg', 7),
	('resources//computer images//asus.jpg', 8),
	('resources//computer images//hp.jpg', 9),
	('resources//computer images//dell.jpg', 10),
	('resources//camera images//camera nikon.jpg', 11),
	('resources//camera images//canon camera.jpg', 12),
	('resources//camera images//nikon d850.jpg', 13),
	('resources//camera images//nikon d56.jpg', 14),
	('resources//camera images//conon eos.jpg', 15),
	('resources//drone images//drone.jpg', 16),
	('resources//drone images//drone 2.webp', 17),
	('resources//drone images//drone 3.webp', 18),
	('resources//drone images//drone 4.webp', 19),
	('resources//drone images//drone 5.webp', 20),
	('resources//mouse & keyboard//mouse.png', 21),
	('resources//mouse & keyboard//keyboard 1.jpg', 22),
	('resources//mouse & keyboard//mouse 2.jpg', 23),
	('resources//mouse & keyboard//mouse 3.jpg', 24),
	('resources//mouse & keyboard//mouse 4.jpg', 25),
	('resources//back cover//iphone.jpg', 26),
	('resources//back cover//back cover 2.jpg', 27),
	('resources//back cover//cover 3.jpg', 28),
	('resources//back cover//cover 4.jpg', 29),
	('resources//back cover//cover 5.jpg', 30),
	('resources//products//61e3d0c596fe41.jpg', 39),
	('resources//products//622e3225e95e6a.jpg', 55),
	('resources//products//622e3225ea965a2.jpg', 55),
	('resources//products//622e3225eb527a3.jpg', 55);

-- Dumping structure for table eshop.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `qty` int NOT NULL,
  `status` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_email` (`user_email`),
  CONSTRAINT `FK_invoice_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_invoice_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.invoice: ~22 rows (approximately)
INSERT INTO `invoice` (`id`, `order_id`, `product_id`, `user_email`, `date`, `total`, `qty`, `status`) VALUES
	(1, '1', 4, 'chalithachamod3031@gmail.com', '2022-06-21 22:22:22', 15000, 5, 3),
	(2, '2', 22, 'chalithachamod3031@gmail.com', '2022-06-08 21:07:55', 85000, 3, 1),
	(3, '3', 12, 'chalithachamod3031@gmail.com', '2022-05-09 21:08:17', 78552, 8, 1),
	(4, '4', 10, 'chalithachamod3031@gmail.com', '2022-06-22 21:13:24', 10504, 2, 4),
	(5, '5', 12, 'chalithachamod3031@gmail.com', '2022-06-21 01:13:21', 552, 2, 1),
	(6, '6', 12, 'chalithachamod3031@gmail.com', '2022-04-21 01:14:22', 566565, 68, 1),
	(7, '7', 6, 'chalithachamod3031@gmail.com', '2022-06-21 01:19:40', 547588, 10, 2),
	(8, '', 7, 'chalithachamod3031@gmail.com', '2022-07-18 21:29:09', 550000, 1, 0),
	(9, '', 7, 'chalithachamod3031@gmail.com', '2022-07-18 21:29:14', 550000, 1, 0),
	(10, '', 7, 'chalithachamod3031@gmail.com', '2022-07-18 21:32:10', 550000, 1, 0),
	(11, '', 7, 'chalithachamod3031@gmail.com', '2022-07-18 21:33:00', 550000, 1, 0),
	(12, '62d5849b66eff', 7, 'chalithachamod3031@gmail.com', '2022-07-18 21:34:43', 550000, 1, 0),
	(13, '62d584f4efac3', 7, 'chalithachamod3031@gmail.com', '2022-07-18 21:36:12', 550000, 1, 0),
	(14, '62d584f69d273', 7, 'chalithachamod3031@gmail.com', '2022-07-18 21:36:14', 550000, 1, 0),
	(15, '62d584f729d33', 7, 'chalithachamod3031@gmail.com', '2022-07-18 21:36:15', 550000, 1, 0),
	(16, '62d585b4d66e2', 7, 'chalithachamod3031@gmail.com', '2022-07-18 21:39:24', 550000, 1, 0),
	(17, '62d586186ac27', 7, 'chalithachamod3031@gmail.com', '2022-07-18 21:41:04', 550000, 1, 0),
	(18, '62d58702976f0', 15, 'chalithachamod3031@gmail.com', '2022-07-18 21:44:58', 150000, 1, 0),
	(19, '62d5879b146b8', 19, 'chalithachamod3031@gmail.com', '2022-07-18 21:47:31', 50000, 1, 0),
	(20, '62d5884faef77', 21, 'chalithachamod3031@gmail.com', '2022-07-18 21:50:31', 12600, 6, 0),
	(21, '62d5887906d22', 12, 'chalithachamod3031@gmail.com', '2022-07-18 21:51:13', 2520000, 3, 0),
	(24, '63121ecb0116f', 55, 'chalithachamod3031@gmail.com', '2022-09-02 20:48:35', 360000, 1, 0);

-- Dumping structure for table eshop.message
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_message_user` (`from`),
  KEY `FK_message_user_2` (`to`),
  CONSTRAINT `FK_message_user` FOREIGN KEY (`from`) REFERENCES `user` (`email`),
  CONSTRAINT `FK_message_user_2` FOREIGN KEY (`to`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.message: ~0 rows (approximately)

-- Dumping structure for table eshop.model
CREATE TABLE IF NOT EXISTS `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.model: ~31 rows (approximately)
INSERT INTO `model` (`id`, `name`) VALUES
	(1, 'realme 7'),
	(2, 'oppo'),
	(3, 'iphone 12 pro'),
	(4, 'ASUS ROG'),
	(5, 'OnePlus 8T'),
	(6, 'Acer'),
	(8, 'msi'),
	(9, 'asus'),
	(10, 'hp'),
	(11, 'Dell'),
	(12, 'Nikon Camera'),
	(13, 'Canon camera'),
	(14, 'Nikon D850'),
	(15, 'Nikon D5600'),
	(16, 'Canon EOS'),
	(17, 'DJI Mavic 3 Cine'),
	(18, 'Eachine EX5'),
	(19, 'JJRC X19 PRO'),
	(20, 'LS-MIN Mini'),
	(21, 'S89'),
	(22, 'JEDEL m & k'),
	(23, 'Gaming Keyboard'),
	(24, 'lenovo mouse'),
	(25, 'Gaming Mouse'),
	(26, 'Wireless Mouse'),
	(27, 'iphone back cover'),
	(28, 'samsung cover'),
	(29, 'Redmi 9 cover'),
	(30, 'vivo cover'),
	(31, 'cat phone case'),
	(32, 'iphone 12 pro max');

-- Dumping structure for table eshop.model_has_brand
CREATE TABLE IF NOT EXISTS `model_has_brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand_id` int NOT NULL,
  `model_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_model_has_brand_model` (`model_id`),
  KEY `FK_model_has_brand_brand` (`brand_id`) USING BTREE,
  CONSTRAINT `FK_model_has_brand_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `FK_model_has_brand_model` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.model_has_brand: ~31 rows (approximately)
INSERT INTO `model_has_brand` (`id`, `brand_id`, `model_id`) VALUES
	(1, 6, 1),
	(2, 10, 2),
	(3, 2, 3),
	(4, 8, 4),
	(5, 7, 5),
	(6, 11, 6),
	(7, 12, 8),
	(8, 13, 9),
	(9, 14, 10),
	(10, 15, 11),
	(11, 16, 12),
	(12, 16, 13),
	(13, 16, 14),
	(14, 16, 15),
	(15, 16, 16),
	(16, 17, 17),
	(17, 17, 18),
	(18, 17, 19),
	(19, 17, 20),
	(20, 17, 21),
	(21, 18, 22),
	(22, 18, 23),
	(23, 18, 24),
	(24, 18, 25),
	(25, 18, 26),
	(26, 19, 27),
	(27, 19, 28),
	(28, 19, 29),
	(29, 19, 30),
	(30, 19, 31),
	(31, 2, 32);

-- Dumping structure for table eshop.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` int NOT NULL,
  `model_has_brand_id` int NOT NULL,
  `colour_id` int NOT NULL,
  `price` double NOT NULL,
  `qty` int NOT NULL,
  `description` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `condition_id` int NOT NULL,
  `status_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `datetime_added` datetime NOT NULL,
  `delivery_fee_colombo` double NOT NULL,
  `delivery_fee_other` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_product_colour` (`colour_id`) USING BTREE,
  KEY `FK_product_condition` (`condition_id`),
  KEY `FK_product_user` (`user_email`),
  KEY `FK_product_category` (`category`),
  KEY `FK_product_status` (`status_id`),
  KEY `FK_product_model_has_brand` (`model_has_brand_id`) USING BTREE,
  CONSTRAINT `FK_product_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_product_colour` FOREIGN KEY (`colour_id`) REFERENCES `colour` (`id`),
  CONSTRAINT `FK_product_condition` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `FK_product_model_has_brand` FOREIGN KEY (`model_has_brand_id`) REFERENCES `model_has_brand` (`id`),
  CONSTRAINT `FK_product_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `FK_product_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.product: ~32 rows (approximately)
INSERT INTO `product` (`id`, `category`, `model_has_brand_id`, `colour_id`, `price`, `qty`, `description`, `title`, `condition_id`, `status_id`, `user_email`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`) VALUES
	(1, 1, 1, 4, 59000, 5, '7.3 Inch Smartphone Reolme7 Mobile Phones 16GB+512GB Android Telephones Cellphone', 'Realme 7', 2, 1, 'chalithachamod3031@gmail.com', '2021-12-24 21:55:10', 50, 290),
	(2, 1, 2, 4, 0, 3, 'OPPO A72 Single-SIM 128GB (GSM Only | No CDMA) Factory Unlocked 4G/LTE Smartphone (Twilight Black) - International Version', 'OPPO A72', 2, 1, 'chamodnadeeshan91@gmail.com', '2021-12-24 23:24:33', 50, 290),
	(3, 1, 3, 4, 220000, 2, 'Apple iPhone 12 Pro, 256GB, Pacific Blue - Unlocked (Renewed Premium)', 'Iphone 12 Pro', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-24 22:18:46', 50, 290),
	(4, 1, 4, 1, 180000, 1, 'Asus ROG Phone 3 256GB 12GB RAM 5G ZS661KS / I003DD SD865+ Tencent Version - Black', 'ASUS ROG 3', 1, 1, 'chamodnadeeshan91@gmail.com', '2021-12-24 22:30:45', 50, 290),
	(5, 1, 5, 7, 99000, 0, 'OnePlus 8T | 5G Unlocked Android Smartphone | A DayÃ¢â‚¬â„¢s Power in 15 Minutes | Ultra Smooth 120Hz Display | 48MP Quad Camera | 256GB, Aquamarine Green | U.S. Version', 'OnePlus 8T', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-24 22:49:05', 50, 290),
	(6, 2, 6, 1, 280000, 4, 'Acer Predator Helios 300 PH315-54-760S Gaming Laptop | Intel i7-11800H | NVIDIA GeForce RTX 3060 Laptop GPU | 15.6" Full HD 144Hz 3ms IPS Display | 16GB DDR4 | 512GB SSD | Killer WiFi 6 | RGB Keyboard', 'Acer', 1, 1, 'chamodnadeeshan91@gmail.com', '2021-12-24 23:38:52', 50, 290),
	(7, 2, 7, 1, 550000, 5, 'MSI GE76 Raider 17.3" 360Hz FHD Display, Intel Core i7-11800H, NVIDIA GeForce RTX3080, 32GB, 1TB NVMe SSD, Win10 ,Titanium Blue (11UH-245)', 'MSI', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-24 23:40:47', 50, 290),
	(8, 2, 8, 1, 450000, 2, 'ASUS ROG Zephyrus Duo SE 15 Gaming Laptop, 15.6Ã¢â‚¬Â 300Hz IPS Type FHD Display, NVIDIA GeForce RTX 3060, AMD Ryzen 9 5980HX, 16GB DDR4, 1TB PCIe SSD, Per-Key RGB Keyboard, Windows 10 Home, GX551QM-ES96', 'ASUS ROG', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 00:27:56', 50, 290),
	(9, 2, 9, 2, 250000, 8, 'HP Pavilion 15-inch Laptop, 11th Generation Intel Core i7-1165G7, Intel Iris Xe Graphics, 16 GB RAM, 512 GB SSD, Windows 11 Pro (15-eg0025nr, Natural Silver)', 'HP', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 01:03:19', 50, 290),
	(10, 2, 10, 1, 130000, 7, 'Dell Inspiron 15 3000 15.6-inch Full HD 11th Gen Intel Core i5-1135G7 12GB 256GB SSD Laptop', 'Dell', 1, 1, 'chamodnadeeshan91@gmail.com', '2021-12-25 01:09:25', 50, 290),
	(11, 3, 11, 1, 325000, 5, 'Nikon D7500 DSLR Camera with 18-140mm Lens', 'Nikon Camera', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 11:18:24', 50, 290),
	(12, 3, 12, 1, 840000, 3, 'Canon EOS 5D Mark IV DSLR Camera with 24-70mm f/4L Lens', 'Canon Camera', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 11:24:27', 50, 290),
	(13, 3, 13, 1, 740000, 0, 'Nikon D850 DSLR Camera with NIKKOR 24-120mm f/4G', 'Nikon D850', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 11:42:03', 50, 290),
	(14, 3, 14, 1, 156000, 4, 'Nikon D5600 DSLR Camera (Body Only)', 'Nikon D5600', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 11:52:43', 50, 290),
	(15, 3, 15, 1, 150000, 1, 'Canon EOS 77D DSLR Camera (Body Only)', 'Canon EOS 77D', 1, 1, 'chamodnadeeshan91@gmail.com', '2021-12-25 11:56:25', 50, 290),
	(16, 4, 16, 2, 1180000, 2, '3-Axis Gimbal with Dual Cameras / 20MP 5.1K Wide-Angle 4/3 CMOS Hasselblad / Up to 46 Minutes of Flight Time', 'DJI Mavic 3 ', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 12:06:13', 50, 290),
	(17, 4, 17, 2, 180000, 4, 'Eachine EX5 5G WIFI 1KM FPV GPS With 4K HD Camera Servo Gimbal 30mins Flight Time 229g Foldable RC Drone Quadcopter RTF - 5G WIFI One Battery 1000m Without Storage Bag', 'Eachine EX5', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 12:12:44', 50, 290),
	(18, 4, 18, 1, 220000, 6, 'JJRC X19 PRO 5G WIFI FPV GPS with 4K HD Dual Camera 2-Axis EIS Gimbal 360Ã‚Â° Obstacle Avoidance 25mins Flight Time Brushless RC Drone Quadcopter RTF - One Battery Without Obstacle Avoider', 'JJRC X19 PRO', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 12:16:36', 50, 290),
	(19, 4, 19, 1, 50000, 10, 'LS-MIN Mini WiFi FPV with 4K/1080P HD Camera Altitude Hold Mode Foldable RC Drone Quadcopter RTF - Black 1080P One Battery Without Storage Bag', 'LS-MIN Mini', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 12:21:40', 50, 290),
	(20, 4, 20, 1, 70000, 12, 'S89 WIFI FPV with 4K Dual Camera Air Pressure Altitude Hold Gravity Sensing Foldable RC Quadcopter RTF - Black One Battery', 'S89 Mini Drone', 1, 1, 'chamodnadeeshan91@gmail.com', '2021-12-25 12:24:54', 50, 290),
	(21, 5, 21, 1, 2100, 15, 'Gaming Keyboard Mouse Combo JEDEL GK110+', 'Mouse Keyboard', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 12:36:20', 50, 290),
	(22, 5, 22, 1, 2400, 15, 'Fantech K511 Hunter Pro Gaming Keyboard', 'Gaming Keyboard', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 12:41:20', 50, 290),
	(23, 5, 23, 1, 400, 0, 'USB Mouse M20 for PC and Laptops', 'USB  Mouse', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 12:45:57', 50, 290),
	(24, 5, 24, 1, 2200, 10, 'Fantech X9 Thor Gaming Mouse', 'Gaming Mouse', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 12:47:43', 50, 290),
	(25, 5, 25, 8, 6250, 5, 'Logitech M235 Wireless Mouse, 2.4 GHz with USB Unifying Receiver, 1000 DPI Optical Tracking, 12 Month Life Battery, PC / Mac / Laptop - Grey', 'Wireless Mouse', 1, 1, 'chamodnadeeshan91@gmail.com', '2021-12-25 12:56:20', 50, 290),
	(26, 6, 26, 9, 450, 18, 'Ultra Thin Lens Protection Transparent Case For iPhone 13, Soft Clear Silicone Case Back Cover For iPhone13 Pro Max Mini 12 11', 'iPhone  Cover', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 13:10:42', 50, 290),
	(27, 6, 27, 1, 750, 0, 'Manufacturing mobile phone accessories back cover for Samsung s21 Car Shockproof Mobile Phone Case For iphone 12 11 huawei Cover', 'Samsung  Cover', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 13:15:11', 50, 290),
	(28, 6, 28, 2, 750, 8, 'For Redmi 9 Matte Back Cover Soft Edge Full Cover with Magnetic Holder Stand Mobile Phone Case for Xiaomi for Redmi 9C', 'Redmi 9 Cover', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 13:19:53', 50, 290),
	(29, 6, 29, 9, 450, 0, 'Transparent Mobile Phone Case Back Cover For Vivo Y20 Y50 Y30 X21 Y17 Y3 Y12 X50 Pro V20 X50e 5G Y51 2020 Y70s Y20A', 'VIVO Cover', 1, 1, 'chalithachamod3031@gmail.com', '2021-12-25 13:25:16', 50, 290),
	(30, 6, 30, 2, 850, 3, 'Creative back cover tpu shockproof black white 3D Cute cat phone case for iPhone 11 12 13 pro max furry warm Plush Cover', 'Cat Phone Case', 1, 1, 'chamodnadeeshan91@gmail.com', '2021-12-25 13:31:48', 50, 290),
	(39, 1, 1, 1, 10000, 1, 'good', 'phone', 1, 1, 'chalithachamod3031@gmail.com', '2022-01-16 13:31:09', 50, 290),
	(55, 1, 31, 4, 360000, 4, 'The best price of Apple iPhone 13 Pro Max in Sri Lanka is Rs. 306,000 sold at Present Solution with 1 Year Company Warranty.\r\nApple iPhone 13 Pro Max is Also Known as A2643\r\nLTE\r\n6GB RAM\r\n128GB Storage\r\n5G', 'Apple 12 Pro Max', 1, 1, 'chamodnadeeshan91@gmail.com', '2022-03-13 23:34:21', 50, 290);

-- Dumping structure for table eshop.profile_img
CREATE TABLE IF NOT EXISTS `profile_img` (
  `code` varchar(50) NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`code`),
  KEY `FK__user` (`user_email`),
  CONSTRAINT `FK__user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.profile_img: ~2 rows (approximately)
INSERT INTO `profile_img` (`code`, `user_email`) VALUES
	('resources//profiles//61fcf71cc3fc3.jpeg', 'chalithachamod3031@gmail.com'),
	('resources//profiles//61d4970224916.jpeg', 'chamodnadeeshan91@gmail.com');

-- Dumping structure for table eshop.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.province: ~9 rows (approximately)
INSERT INTO `province` (`id`, `name`) VALUES
	(1, 'Central Province '),
	(2, 'Eastern Province'),
	(3, 'Northern Province'),
	(4, 'Southern Province'),
	(5, 'Western Province'),
	(6, 'North Western Province'),
	(7, 'North Central Province'),
	(8, 'Uva Province'),
	(9, 'Sabaragamuwa Province');

-- Dumping structure for table eshop.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Product_id` int NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__product` (`Product_id`),
  KEY `FK__user1` (`user_email`),
  CONSTRAINT `FK__product` FOREIGN KEY (`Product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK__user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.recent: ~42 rows (approximately)
INSERT INTO `recent` (`id`, `Product_id`, `user_email`) VALUES
	(1, 2, 'chalithachamod3031@gmail.com'),
	(2, 14, 'chalithachamod3031@gmail.com'),
	(3, 39, 'chalithachamod3031@gmail.com'),
	(4, 55, 'chalithachamod3031@gmail.com'),
	(5, 2, 'chalithachamod3031@gmail.com'),
	(6, 39, 'chalithachamod3031@gmail.com'),
	(7, 55, 'chalithachamod3031@gmail.com'),
	(8, 7, 'chalithachamod3031@gmail.com'),
	(9, 12, 'chalithachamod3031@gmail.com'),
	(10, 16, 'chalithachamod3031@gmail.com'),
	(11, 28, 'chalithachamod3031@gmail.com'),
	(12, 39, 'chalithachamod3031@gmail.com'),
	(13, 8, 'chalithachamod3031@gmail.com'),
	(14, 30, 'chalithachamod3031@gmail.com'),
	(15, 2, 'chalithachamod3031@gmail.com'),
	(16, 55, 'chalithachamod3031@gmail.com'),
	(17, 28, 'chalithachamod3031@gmail.com'),
	(18, 24, 'chalithachamod3031@gmail.com'),
	(19, 26, 'chalithachamod3031@gmail.com'),
	(20, 9, 'chalithachamod3031@gmail.com'),
	(21, 8, 'chalithachamod3031@gmail.com'),
	(22, 11, 'chalithachamod3031@gmail.com'),
	(23, 4, 'chalithachamod3031@gmail.com'),
	(24, 6, 'chalithachamod3031@gmail.com'),
	(25, 11, 'chalithachamod3031@gmail.com'),
	(26, 55, 'chalithachamod3031@gmail.com'),
	(27, 19, 'chalithachamod3031@gmail.com'),
	(28, 55, 'chalithachamod3031@gmail.com'),
	(29, 8, 'chalithachamod3031@gmail.com'),
	(30, 4, 'chalithachamod3031@gmail.com'),
	(31, 6, 'chalithachamod3031@gmail.com'),
	(32, 55, 'chalithachamod3031@gmail.com'),
	(33, 2, 'chalithachamod3031@gmail.com'),
	(35, 4, 'chalithachamod3031@gmail.com'),
	(36, 21, 'chalithachamod3031@gmail.com'),
	(37, 11, 'chalithachamod3031@gmail.com'),
	(38, 6, 'chalithachamod3031@gmail.com'),
	(39, 18, 'chalithachamod3031@gmail.com'),
	(40, 4, 'chalithachamod3031@gmail.com'),
	(41, 16, 'chalithachamod3031@gmail.com'),
	(42, 14, 'chalithachamod3031@gmail.com'),
	(43, 55, 'chalithachamod3031@gmail.com');

-- Dumping structure for table eshop.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.status: ~2 rows (approximately)
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Deactive');

-- Dumping structure for table eshop.user
CREATE TABLE IF NOT EXISTS `user` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` int NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `register_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `gender` (`gender`),
  CONSTRAINT `FK_user_gender` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.user: ~2 rows (approximately)
INSERT INTO `user` (`fname`, `lname`, `email`, `gender`, `password`, `mobile`, `register_date`, `verification_code`) VALUES
	('Chalitha', 'Chamod', 'chalithachamod3031@gmail.com', 1, '123', '0713772006', '2021-12-08 16:12:07', '6352926b54bbb'),
	('kashmi', 'irodha', 'chamodnadeeshan91@gmail.com', 2, '123456', '0785167588', '2021-12-30 12:44:36', NULL);

-- Dumping structure for table eshop.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `line2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_has_address_user` (`user_email`),
  KEY `FK_user_has_address_city` (`city_id`),
  CONSTRAINT `FK_user_has_address_city` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `FK_user_has_address_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.user_has_address: ~2 rows (approximately)
INSERT INTO `user_has_address` (`id`, `line1`, `line2`, `user_email`, `city_id`) VALUES
	(2, 'Pinnagollawaththa ,Maharachchimull, Alawwa', 'Maharachchimull', 'chalithachamod3031@gmail.com', 4),
	(3, 'badulla', 'haliela', 'chamodnadeeshan91@gmail.com', 2);

-- Dumping structure for table eshop.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_watchlist_product` (`product_id`),
  KEY `FK_watchlist_user` (`user_email`),
  CONSTRAINT `FK_watchlist_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_watchlist_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table eshop.watchlist: ~7 rows (approximately)
INSERT INTO `watchlist` (`id`, `product_id`, `user_email`) VALUES
	(72, 7, 'chalithachamod3031@gmail.com'),
	(73, 9, 'chalithachamod3031@gmail.com'),
	(74, 39, 'chalithachamod3031@gmail.com'),
	(76, 28, 'chalithachamod3031@gmail.com'),
	(77, 55, 'chalithachamod3031@gmail.com'),
	(78, 14, 'chalithachamod3031@gmail.com'),
	(79, 18, 'chalithachamod3031@gmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
