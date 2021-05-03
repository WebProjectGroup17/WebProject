-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-05-03 20:31:12
-- 服务器版本： 5.5.29
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `work_shop_ershou`
--

-- --------------------------------------------------------

--
-- 表的结构 `cate`
--

CREATE TABLE `cate` (
  `id` int(11) NOT NULL,
  `title` char(20) NOT NULL,
  `type` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cate`
--

INSERT INTO `cate` (`id`, `title`, `type`) VALUES
(1, 'clothing', 1),
(2, 'Toys', 1),
(3, 'Book', 1),
(4, 'Card', 1),
(6, 'Computer', 1),
(5, 'Phone', 1),
(11, 'other', 1);

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `goodsName` varchar(500) NOT NULL,
  `desc` text,
  `price` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `catid` int(11) NOT NULL,
  `uid` int(10) DEFAULT '0',
  `addTime` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `goodsName`, `desc`, `price`, `image`, `catid`, `uid`, `addTime`) VALUES
(1, 't-shirt', 'Men‘s t-shirt men‘s fashion brand summer short sleeve 2021 new half sleeve men‘s clothing casual bottom coat loose top', '20', '8fd9b6737a0a78726e0d2d9715c5573b.png', 1, 1, '2021-05-03 17:55'),
(3, 'Meizu 18 Xiaolong 888', 'Meizu 18 Xiaolong 888 anti shake 5g mobile phone 2K screen curved screen photo music game official flagship store genuine smart', '399', '7d92e1bc2524c4afe253235852301daa.png', 5, 1, '2021-05-03 18:00'),
(2, '男士t恤男潮牌夏季短袖2021新款半袖男装衣服休闲', '产品参数：\r\n\r\n品牌: DZH面料分类: 其他货号: FGZX-T23基础风格: 青春流行上市年份季节: 2021年夏季厚薄: 常规销售渠道类型: 纯电商(只在线上销售)材质成分: 棉100%', '20', '897793f111fd87cf6787e0e747941463.png', 1, 6, '2021-05-03 17:48'),
(4, 'Lenovo thinkbook 15-57cd', 'Lenovo thinkbook 15-57cd\r\n【王源代言】联想ThinkBook 15-57CD 2021新款11代酷睿i5 15.6英寸商务办公ibm笔记本电脑ThinkPad官方旗舰店', '1899', '7fcd5d2fa9ff97f9e84f77cb8c43706c.jpg', 6, 11, '2021-05-03 20:30');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `isAdmin`) VALUES
(1, 'admin@a.com', 'admin', 1),
(2, 'user', 'user', 0),
(3, 'xiaowei', '123456', 0),
(5, '31201346', '123456', 0),
(6, '买买买', '123456', 0),
(7, '吃货', '123456', 0),
(8, 'kaka', '123456', 0),
(9, 'buybuy', '123456', 0),
(10, 'lililili', '123456', 0),
(11, 'ckk321@qq.com', '123456', 0);

--
-- 转储表的索引
--

--
-- 表的索引 `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cate`
--
ALTER TABLE `cate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
