-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 05 月 30 日 20:15
-- 服务器版本: 5.5.36
-- PHP 版本: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `vt_vote`
--

-- --------------------------------------------------------

--
-- 表的结构 `vt_admin`
--

CREATE TABLE IF NOT EXISTS `vt_admin` (
  `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_admin_user` varchar(30) NOT NULL COMMENT '//用户名',
  `vt_admin_pass` char(40) NOT NULL COMMENT '//密码',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vt_admin`
--

INSERT INTO `vt_admin` (`vt_id`, `vt_admin_user`, `vt_admin_pass`) VALUES
(1, 'guojie', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- 表的结构 `vt_guest`
--

CREATE TABLE IF NOT EXISTS `vt_guest` (
  `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//留言标题',
  `vt_content` text NOT NULL COMMENT '//留言内容',
  `vt_time` datetime NOT NULL COMMENT '//留言时间',
  `vt_ip` char(15) NOT NULL COMMENT '//留言ip',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `vt_guest`
--

INSERT INTO `vt_guest` (`vt_id`, `vt_title`, `vt_content`, `vt_time`, `vt_ip`) VALUES
(1, '11', '1111111111', '2014-05-26 22:09:05', '127.0.0.1'),
(2, 'eoiwfo', 'dfdfdffsefwef', '2014-05-27 10:58:10', '127.0.0.1'),
(3, '留言主题', '留言内容，要求大于10个字哦', '2014-05-30 12:33:19', '127.0.0.1'),
(4, '留言主题', '留言内容，测试使用的。。。。。', '2014-05-30 20:06:46', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `vt_ip`
--

CREATE TABLE IF NOT EXISTS `vt_ip` (
  `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//投票主题',
  `vt_listid` tinyint(4) NOT NULL COMMENT '//选项id',
  `vt_ip` char(15) NOT NULL COMMENT '//投票ip',
  `vt_time` datetime NOT NULL COMMENT '//投票时间',
  `vt_timelimit` int(11) NOT NULL COMMENT '//同ip限时投票',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `vt_ip`
--

INSERT INTO `vt_ip` (`vt_id`, `vt_title`, `vt_listid`, `vt_ip`, `vt_time`, `vt_timelimit`) VALUES
(14, 'Which music do you like?', 19, '127.0.0.1', '2014-05-30 20:09:59', 0);

-- --------------------------------------------------------

--
-- 表的结构 `vt_list`
--

CREATE TABLE IF NOT EXISTS `vt_list` (
  `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_vid` tinyint(4) NOT NULL COMMENT '//投票主题id',
  `vt_title` varchar(20) NOT NULL COMMENT '//投票主题',
  `vt_list` varchar(32) NOT NULL COMMENT '//投票选项',
  `vt_count` int(11) NOT NULL COMMENT '//投票单项总数',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `vt_list`
--

INSERT INTO `vt_list` (`vt_id`, `vt_vid`, `vt_title`, `vt_list`, `vt_count`) VALUES
(19, 7, 'Which music do you l', 'One', 1),
(20, 7, 'Which music do you l', 'Second', 0),
(21, 7, 'Which music do you l', 'Thrid', 0);

-- --------------------------------------------------------

--
-- 表的结构 `vt_notice`
--

CREATE TABLE IF NOT EXISTS `vt_notice` (
  `vt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//公告标题',
  `vt_content` varchar(255) NOT NULL COMMENT '//公告内容',
  `vt_admin` varchar(20) NOT NULL COMMENT '//公告发布人',
  `vt_time` datetime NOT NULL COMMENT '//公告时间',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `vt_notice`
--

INSERT INTO `vt_notice` (`vt_id`, `vt_title`, `vt_content`, `vt_admin`, `vt_time`) VALUES
(5, '我是一条系统公告', '测试使用，。。。。。。。。。。。。', 'guojie', '2014-05-30 20:09:35');

-- --------------------------------------------------------

--
-- 表的结构 `vt_theme`
--

CREATE TABLE IF NOT EXISTS `vt_theme` (
  `vt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `vt_title` varchar(30) NOT NULL COMMENT '//投票主题',
  `vt_time` datetime NOT NULL COMMENT '//发起日期',
  `vt_admin` varchar(20) NOT NULL COMMENT '//发起人',
  `vt_type` varchar(20) NOT NULL COMMENT '//投票类型',
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `vt_theme`
--

INSERT INTO `vt_theme` (`vt_id`, `vt_title`, `vt_time`, `vt_admin`, `vt_type`) VALUES
(7, 'Which music do you like?', '2014-05-30 20:08:04', 'guojie', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
