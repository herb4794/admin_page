-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023 年 01 月 15 日 05:07
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
-- 資料庫： `useradminform`
--

-- --------------------------------------------------------

--
-- 資料表結構 `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activationcode` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `userregistration`
--

INSERT INTO `userregistration` (`id`, `name`, `email`, `password`, `activationcode`, `status`, `postingdate`) VALUES
(0, 'lawrence cheng', 'adminstrator@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '5defd8f4d8db58382d792aaf751b6171', 0, '2023-01-04 05:54:48'),
(0, 'lawrence cheng', 'adminstrator@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '9715899556a21f3698a4d604c68530dc', 0, '2023-01-04 05:55:25'),
(0, 'lawrence cheng', 'adminstrator@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '56ebc685910aaadcf53c2af5e02ae4ac', 0, '2023-01-04 05:57:39'),
(0, 'lawrence cheng', 'adminstrator@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '891723f4f8171ef44e87f2acef19e7c8', 0, '2023-01-04 05:59:51'),
(0, 'lawrence cheng', 'adminstrator@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'a2d29137e0dc4fa4c50236f313415f7a', 0, '2023-01-04 06:00:22'),
(0, 'lawrence cheng', 'adminstrator@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'dcdc03b8c36b0b732c8c04f64eafc256', 0, '2023-01-04 06:01:21'),
(0, 'lawrence cheng', 'adminstrator@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'c68301641de52c13ac1119509e0460b7', 0, '2023-01-04 06:01:23'),
(0, 'lawrence cheng', 'onesimushon@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '62499c5725c3ffd5092c84f6c4dfae1d', 0, '2023-01-04 06:01:58'),
(0, 'lawrence cheng', 'onesimushon@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1d759da82b97eb45736c1653feb084e8', 0, '2023-01-04 06:06:02');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `create_at` timestamp NULL DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `activationcode` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `forgotPasswordCode` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `phone`, `user_type`, `create_at`, `image`, `activationcode`, `status`, `forgotPasswordCode`) VALUES
(92, 'adminstrator', 'admin', 'admin@gmail.com', '55443322', 'admin', NULL, '../assets/images/products/items/5k-colorful-galaxy-ko.jpg', '', 0, '5aea1ee85615e049c0f01ec0185efff9'),
(100, 'user', 'user', 'user@gmail.com', '3434', 'user', NULL, '../assets/images/products/items/5k-colorful-galaxy-ko.jpg', '', 0, NULL),
(106, 'herb', 'lawrence', 'lawrence@gmail.com', '12341234', 'user', NULL, '../assets/images/products/items/217-2179741_neucom-incorporated-is-one-of-the-worlds-leading-corporations-neucom-ace-combat.png', '', 0, NULL),
(120, 'herb4794', 'admin', 'onesimushon@gmail.com', '66411668', 'admin', NULL, NULL, 'b7b462f36ff6cc6587be2f4d059ff229', 1, '02ab23628759a7101d067a1b4588d032');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
