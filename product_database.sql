-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022 年 11 月 23 日 09:58
-- 伺服器版本： 10.4.25-MariaDB
-- PHP 版本： 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `product_database`
--

-- --------------------------------------------------------

--
-- 資料表結構 `product_table`
--

CREATE TABLE `product_table` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_discount` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product_table`
--

INSERT INTO `product_table` (`id`, `product_name`, `product_price`, `product_discount`, `product_image`, `product_description`) VALUES
(1, 'LENOVO', 4998, 3988, '../assets/images/products/items/products_1.jpg', 'IdeaPad 3 15IGL05 15.6 Laptop'),
(2, 'SAMSUNG', 6599, 6298, '../assets/images/products/items/products_2.jpg', 'Galaxy S22 5G (8/256GB) Smartphone'),
(3, 'DELL', 19999, 11999, '../assets/images/products/items/products_3.jpg', 'G15 G5525 RTX3070Ti e-Sports Laptop'),
(4, 'NINTENDO', 2835, 2658, '../assets/images/products/items/products_4.jpg', 'Switch (OLED model) White with Switch Online Personal Plan 12 Months Game Console with Game Set'),
(5, 'SMARTECH', 498, 198, '../assets/images/products/items/products_5.jpg', 'SG-3300A Hand warmer'),
(6, 'CONAIR', 369, 329, '../assets/images/products/items/products_6.jpg', 'High-density memory foam neck pillow'),
(7, 'Flextail Gear', 399, 285, '../assets/images/products/items/products_7.jpg', 'Tiny Pump 2X Lightweight Multifunctional Pump'),
(8, 'Fitbit', 1798, 1598, '../assets/images/products/items/products_8.jpg', 'Versa 4 Smartwatch'),
(9, 'Techo', 699, 378, '../assets/images/products/items/products_9.jpg', 'Autowater Lite intelligent sensor water faucet'),
(10, 'Spotcam', 680, 599, '../assets/images/products/items/products_10.jpg', 'BabyCam 360° Headset Baby AI Surveillance Camera'),
(11, 'KENWOOD', 6988, 5200, '../assets/images/products/items/products_11.jpg', 'KVC85004SI Titanium Chef Baker (Trade-in)'),
(12, 'DYSON', 5680, 3980, '../assets/images/products/items/products_12.jpg', 'HP00 3-in-1 fan warm air freshener'),
(13, 'DELL', 5798, 4498, '../assets/images/products/items/products_13.jpg', 'Vostro 3710 (3-year warranty) Desktop PC'),
(14, 'DJI', 4299, 2999, '../assets/images/products/items/products_14.jpg', 'SAction 2 Dual-Screen Combo'),
(15, 'Ecovacs', 5599, 3999, '../assets/images/products/items/products_15.jpg', 'DBX1131 DEEBOT T8 AIVI + Intelligent vacuum cleaner robot'),
(16, 'DELONGHI', 12588, 4998, '../assets/images/products/items/products_16.jpg', 'ECAM23.460.B Automatic instant coffee machine'),
(17, 'Colgate', 699, 599, '../assets/images/products/items/products_17.jpg', 'Light Sensitive White LED Blue Whitening Teeth Set - Anson Lo Special Edition'),
(18, 'SONY', 2290, 1499, '../assets/images/products/items/products_18.jpg', 'WF-1000XM4 Full Wireless Noise Cancelling Headphones'),
(19, 'KikoSaka', 199, 100, '../assets/images/products/items/products_19.jpg', 'KS-Q1 Hand Warmer'),
(20, 'APPLE', 7699, 7399, '../assets/images/products/items/products_20.jpg', 'iPhone 14 Plus');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
