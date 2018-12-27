-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 �?12 �?27 �?05:34
-- 服务器版本: 5.5.53
-- PHP 版本: 5.5.38

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `blog`
--
CREATE DATABASE `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- 表的结构 `adress`
--

CREATE TABLE IF NOT EXISTS `adress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `def` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `adress`
--

INSERT INTO `adress` (`id`, `user_id`, `name`, `phone`, `ad`, `def`) VALUES
(2, 20, '测我擦二五', '123456789', '各地v挺有缘分呢', 1),
(3, 20, 'v而成的是v人', '987654321', '符合我后二五i京东', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `creat_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `co_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=164 ;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`cid`, `name`) VALUES
(1, '						日常用品			'),
(2, '电子商品'),
(3, '学习用品');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `post_id_2` (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- 表的结构 `commodity`
--

CREATE TABLE IF NOT EXISTS `commodity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pic` varchar(512) DEFAULT NULL,
  `body` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `commodity`
--

INSERT INTO `commodity` (`id`, `c_id`, `title`, `pic`, `body`, `price`, `data`, `stock`) VALUES
(1, 1, '日常用品1', NULL, '						123456				', 123, '									2018.10.25						', 27),
(2, 1, '日常用品2', NULL, '			dwwsacasw		', 234, '			2018.10.26		', 38),
(3, 2, '电子商品1', NULL, 'frefe', 250, '12375', 75),
(5, 2, '电子商品2', NULL, '27', 250, '717', 105),
(25, 3, 'dwdw', NULL, 'dwadaw', 250, 'dawdwa', 168),
(23, 2, 'fg4e', NULL, 'ferf', 250, 'f4e', 84),
(26, 3, 'dwdw', NULL, 'dwadaw', 250, 'dawdwa', 65),
(27, 3, 'dwdw', NULL, 'dwadaw', 250, 'dawdwa', 45),
(34, 1, 'qwer', 'C:/server/www/uploads/commodity-27452jpg', 'qwer', 250, 'qwer', 25),
(35, 1, '123', 'C:/server/www/uploads/commodity-15828.jpg', '123', 250, '123', 37);

-- --------------------------------------------------------

--
-- 表的结构 `d_comments`
--

CREATE TABLE IF NOT EXISTS `d_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `jj` longtext NOT NULL,
  `body` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `data` longtext NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `details`
--

INSERT INTO `details` (`id`, `c_id`, `title`, `jj`, `body`, `price`, `data`, `stock`) VALUES
(1, 1, '推荐商品1', '									此处为商品简介						', '									此处为商品的详细信息						', 2500, 'xxxx-xx-xx                        ', 50),
(2, 2, '推荐商品2', '			此处为商品简介		', '			此处为商品的详细信息		', 333, 'xxxx-xx-xx        ', 100),
(3, 3, '最近新品1', '此处为商品简介', '此处为商品的详细信息', 757, 'xxxx-xx-xx', 80),
(4, 1, '最近新品2', '此处为商品简介', '此处为商品的详细信息', 5785, 'xxxx-xx-xx', 70);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `creat_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `a_id` int(11) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

-- --------------------------------------------------------

--
-- 表的结构 `orders_ad_histories`
--

CREATE TABLE IF NOT EXISTS `orders_ad_histories` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `creat_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `a_id` int(11) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- 表的结构 `orders_histories`
--

CREATE TABLE IF NOT EXISTS `orders_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `creat_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(128) NOT NULL,
  `password` varchar(512) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `power` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `nickname`, `password`, `money`, `power`) VALUES
(20, 'lmt', '2d82a6da29b9f7c488c45dc355ef98a894cc65528bd65e662d5621c214355b19', 770, 1),
(21, '123456', '2d82a6da29b9f7c488c45dc355ef98a894cc65528bd65e662d5621c214355b19', 0, 0),
(22, '666', '4d51edabeeb116ec863bae0445767918b53c0cfc8f87bfe622e531e5c2724276', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
