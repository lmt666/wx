-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 11 月 15 日 05:53
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

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
-- 表的结构 `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `creat_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
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
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `post_id_2` (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `title`, `body`, `create_at`) VALUES
(20, 1, 'vscs', 'caac', '2018-11-08 06:52:07');

-- --------------------------------------------------------

--
-- 表的结构 `commodity`
--

CREATE TABLE IF NOT EXISTS `commodity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `commodity`
--

INSERT INTO `commodity` (`id`, `c_id`, `title`, `body`, `price`, `data`) VALUES
(1, 1, '日常用品1', 'dwadwadw', 123, 'jtrhr'),
(2, 1, '日常用品2', 'dwwsacasw', 234, 'jhregerr'),
(3, 2, '电子商品1', 'frefe', 250, '12375'),
(4, 0, '', '', 0, ''),
(5, 2, '电子商品2', '27', 250, '717'),
(17, 1, 'zqq', 'xaaa', 250, 'zxxxx'),
(21, 1, 'f43f34', 'f43f43', 250, 'f4ewfew'),
(19, 3, 'fefe', 'fewew', 250, 'dewdw'),
(11, 0, 'dwadaw', 'dwdaw', 250, 'dwadaw'),
(22, 1, 'g54', 'g45', 250, 'g54'),
(23, 2, 'fg4e', 'ferf', 250, 'f4e');

-- --------------------------------------------------------

--
-- 表的结构 `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `jj` longtext NOT NULL,
  `body` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `data` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `details`
--

INSERT INTO `details` (`id`, `title`, `jj`, `body`, `price`, `data`) VALUES
(1, '推荐商品1', '									此处为商品简介						', '									此处为商品的详细信息						', 2500, '									生产日期:xxxx-xx-xx						'),
(2, '推荐商品2', '			此处为商品简介		', '			此处为商品的详细信息		', 333, '			生产日期:xxxx-xx-xx		'),
(3, '最近新品1', '此处为商品简介', '此处为商品的详细信息', 757, '生产日期:xxxx-xx-xx'),
(4, '最近新品2', '此处为商品简介', '此处为商品的详细信息', 5785, '生产日期:xxxx-xx-xx');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
