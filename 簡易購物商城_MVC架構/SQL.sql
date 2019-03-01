-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2019 年 03 月 01 日 13:27
-- 伺服器版本: 5.7.21
-- PHP 版本： 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mvc_finalwork`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cobol_mvc_finalwork_member`
--

DROP TABLE IF EXISTS `cobol_mvc_finalwork_member`;
CREATE TABLE IF NOT EXISTS `cobol_mvc_finalwork_member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `addr` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `permissions` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `cobol_mvc_finalwork_member`
--

INSERT INTO `cobol_mvc_finalwork_member` (`id`, `username`, `password`, `addr`, `phone`, `permissions`) VALUES
(2, 'manager', '123', '', '', 'admin'),
(4, 'test', '123', '高雄市', '0912345678', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `cobol_mvc_finalwork_order`
--

DROP TABLE IF EXISTS `cobol_mvc_finalwork_order`;
CREATE TABLE IF NOT EXISTS `cobol_mvc_finalwork_order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_username` varchar(32) NOT NULL,
  `order_all_price` int(10) NOT NULL,
  `order_status` varchar(12) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `cobol_mvc_finalwork_order`
--

INSERT INTO `cobol_mvc_finalwork_order` (`order_id`, `order_username`, `order_all_price`, `order_status`) VALUES
(1, 'test', 15, '已出貨');

-- --------------------------------------------------------

--
-- 資料表結構 `cobol_mvc_finalwork_order_content`
--

DROP TABLE IF EXISTS `cobol_mvc_finalwork_order_content`;
CREATE TABLE IF NOT EXISTS `cobol_mvc_finalwork_order_content` (
  `order_content_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `product_id` int(12) NOT NULL,
  `product_name` varchar(32) NOT NULL,
  `product_count` int(8) NOT NULL,
  `product_price` int(32) NOT NULL,
  `product_totalprice` int(32) NOT NULL,
  PRIMARY KEY (`order_content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `cobol_mvc_finalwork_order_content`
--

INSERT INTO `cobol_mvc_finalwork_order_content` (`order_content_id`, `order_id`, `product_id`, `product_name`, `product_count`, `product_price`, `product_totalprice`) VALUES
(1, 1, 1, 'book1', 3, 5, 15);

-- --------------------------------------------------------

--
-- 資料表結構 `cobol_mvc_finalwork_product`
--

DROP TABLE IF EXISTS `cobol_mvc_finalwork_product`;
CREATE TABLE IF NOT EXISTS `cobol_mvc_finalwork_product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(32) NOT NULL,
  `product_stock` int(12) NOT NULL,
  `product_price` int(16) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `cobol_mvc_finalwork_product`
--

INSERT INTO `cobol_mvc_finalwork_product` (`product_id`, `product_name`, `product_stock`, `product_price`) VALUES
(1, 'book1', 10, 5),
(2, 'book2', 20, 300),
(16, 'book3', 41, 500),
(17, 'book4', 49, 500),
(18, 'book5', 50, 60),
(19, 'book6', 60, 300),
(21, 'book7', 0, 80);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
