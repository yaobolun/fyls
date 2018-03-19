-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 03 月 17 日 09:46
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `fyls`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(50) NOT NULL COMMENT '账户',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `administration` int(1) NOT NULL COMMENT '0：管理员，1：普通员工',
  `department_id` int(11) NOT NULL COMMENT '部门ID',
  `station_id` int(11) NOT NULL COMMENT '岗位ID',
  `time` datetime NOT NULL COMMENT '创建时间',
  `updatetime` datetime NOT NULL COMMENT '最后修改时间',
  `flag` int(1) NOT NULL COMMENT '是否删除（0：正常，1：删除）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='后台用户' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `password`, `administration`, `department_id`, `station_id`, `time`, `updatetime`, `flag`) VALUES
(1, 'admins', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0, '0000-00-00 00:00:00', '2018-03-14 19:08:36', 0),
(2, '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'qweerr', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 0, '0000-00-00 00:00:00', '2018-03-14 18:49:30', 1),
(4, 'wudishi', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0, '2018-03-14 19:09:42', '2018-03-14 19:09:42', 0),
(5, 'qwert', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0, '2018-03-15 10:37:05', '2018-03-15 10:37:05', 0),
(6, 'qweerr', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 7, '0000-00-00 00:00:00', '2018-03-14 18:49:30', 0),
(7, '发大V发', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 5, '2018-03-16 11:43:02', '2018-03-16 11:43:02', 0),
(8, '而广发染发', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 0, '2018-03-16 11:44:33', '2018-03-16 11:44:33', 1),
(9, '规范化补贴', 'e10adc3949ba59abbe56e057f20f883e', 1, 3, 10, '2018-03-16 11:46:58', '2018-03-16 11:46:58', 0),
(10, 'yaobolun', '96e79218965eb72c92a549dd5a330112', 1, 18, 10, '2018-03-17 14:58:37', '2018-03-17 14:58:37', 0),
(11, '市场一部', '96e79218965eb72c92a549dd5a330112', 1, 1, 5, '2018-03-17 15:24:07', '2018-03-17 15:24:07', 0),
(12, '而无法', '96e79218965eb72c92a549dd5a330112', 1, 1, 10, '2018-03-17 15:40:08', '2018-03-17 15:40:08', 0);

-- --------------------------------------------------------

--
-- 表的结构 `arrival`
--

CREATE TABLE IF NOT EXISTS `arrival` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `arrival_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '到账申请人',
  `arrival_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '到账公司名称',
  `arrival_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '到账公司账号',
  `arrival_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '到账时间',
  `arrival_money` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '到账金额',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '是否删除状态 0正常 1删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='到账' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `authority`
--

CREATE TABLE IF NOT EXISTS `authority` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `authority` varchar(50) NOT NULL COMMENT '权限名称',
  `flag` int(1) NOT NULL COMMENT '是否删除（0：正常，1：删除）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `authority`
--

INSERT INTO `authority` (`id`, `authority`, `flag`) VALUES
(1, '查看', 0),
(2, '1122', 0),
(3, '2233', 1);

-- --------------------------------------------------------

--
-- 表的结构 `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '部门iD',
  `department_name` varchar(50) NOT NULL COMMENT '部门名称',
  `updatetime` datetime NOT NULL COMMENT '时间',
  `flag` int(1) NOT NULL COMMENT '是否删除（0：正常，1：删除）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='部门' AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `updatetime`, `flag`) VALUES
(1, '市场一部', '2018-03-15 10:19:53', 0),
(2, '123x', '2018-03-15 10:55:35', 1),
(3, '而无法', '2018-03-15 10:23:04', 0),
(4, '上档次', '2018-03-15 10:36:38', 1),
(5, 'lknji', '2018-03-15 10:38:51', 1),
(6, 'ewf ', '2018-03-15 10:44:21', 0),
(7, 'rege', '2018-03-15 10:47:03', 1),
(8, '对对对', '2018-03-15 10:52:03', 1),
(9, '34如 ', '2018-03-15 11:10:45', 0),
(10, '沙发乳房', '2018-03-15 14:44:01', 1),
(11, '', '2018-03-15 17:48:46', 1),
(12, '管理员', '2018-03-15 17:50:41', 0),
(13, 'rdgreg', '2018-03-16 09:35:10', 0),
(14, 'dsgfdrg', '2018-03-16 09:38:27', 1),
(15, 'ergfergfe', '2018-03-16 09:38:59', 0),
(16, 'dfgreer', '2018-03-16 09:40:22', 0),
(17, 'admins', '2018-03-16 09:40:55', 0),
(18, '若非个人', '2018-03-16 09:42:54', 0);

-- --------------------------------------------------------

--
-- 表的结构 `expre`
--

CREATE TABLE IF NOT EXISTS `expre` (
  `express_id` char(20) NOT NULL,
  `express_name` varchar(15) NOT NULL COMMENT '收件人姓名',
  `express_phone` varchar(20) NOT NULL COMMENT '收件人电话',
  `express_address` varchar(20) NOT NULL COMMENT '收件人地址',
  `express_Odd Numbers` varchar(30) NOT NULL COMMENT '单号',
  `express_Amount of money` varchar(20) NOT NULL COMMENT '标价金额',
  `express_Delivery express_Delivery time` char(30) DEFAULT NULL COMMENT '发货时间',
  PRIMARY KEY (`express_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='快递';

-- --------------------------------------------------------

--
-- 表的结构 `form_business travel`
--

CREATE TABLE IF NOT EXISTS `form_business travel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `applicant` varchar(255) DEFAULT NULL COMMENT '申请人',
  `out_addr` varchar(255) DEFAULT NULL COMMENT '外出地址',
  `out_time` datetime DEFAULT NULL COMMENT '外出时间',
  `back_time` datetime DEFAULT NULL COMMENT '回公司时间',
  `out_reason` varchar(255) DEFAULT NULL COMMENT '外出原因',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0未审核，1已通过，2未通过，3软删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='外出' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `form_leave`
--

CREATE TABLE IF NOT EXISTS `form_leave` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `applicant` varchar(255) DEFAULT NULL COMMENT '申请人',
  `start_time` datetime DEFAULT NULL COMMENT '请假开始时间',
  `end_time` datetime DEFAULT NULL COMMENT '请假结束时间',
  `leave_reason` varchar(255) DEFAULT NULL COMMENT '请假原因',
  `flag` int(1) DEFAULT '0' COMMENT '0未审核，1已通过，2未通过，软删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='请假' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `have_auth`
--

CREATE TABLE IF NOT EXISTS `have_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID ',
  `auth_id` int(11) NOT NULL COMMENT '权限ID',
  `auth_name` int(11) NOT NULL COMMENT '权限名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='岗位拥有权限' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `journal`
--

CREATE TABLE IF NOT EXISTS `journal` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID ',
  `journal` varchar(100) NOT NULL COMMENT '明确到谁做了什么事情',
  `flag` int(1) NOT NULL COMMENT '是否删除（0：正常，1：删除）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='日志' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `journal`
--

INSERT INTO `journal` (`id`, `journal`, `flag`) VALUES
(1, 'qwert增加了部门若非个人', 0),
(2, 'admins增加了权限11', 0),
(3, 'admins增加了权限22', 0);

-- --------------------------------------------------------

--
-- 表的结构 `parameter`
--

CREATE TABLE IF NOT EXISTS `parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID ',
  `logo` varchar(50) NOT NULL COMMENT '公司logo',
  `name` varchar(50) NOT NULL COMMENT '公司名称',
  `introduce` varchar(255) NOT NULL COMMENT '公司简介',
  `flag` int(1) NOT NULL COMMENT '是否删除（0：正常，1：删除）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司参数' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `stations`
--

CREATE TABLE IF NOT EXISTS `stations` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '岗位ID',
  `station_name` varchar(50) NOT NULL COMMENT '岗位名称',
  `department_id` int(11) NOT NULL COMMENT '部门ID',
  `updatetime` datetime NOT NULL COMMENT '时间',
  `flag` int(1) NOT NULL COMMENT '是否删除（0：正常，1：删除）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='岗位' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `stations`
--

INSERT INTO `stations` (`id`, `station_name`, `department_id`, `updatetime`, `flag`) VALUES
(1, '主管', 1, '2018-03-15 00:00:00', 1),
(2, '员工', 2, '0000-00-00 00:00:00', 1),
(3, '乳房大V', 4, '2018-03-15 16:06:30', 0),
(4, '担任过', 3, '2018-03-15 16:12:31', 1),
(5, '辅导班', 1, '2018-03-15 16:12:54', 0),
(6, '房东沟通', 1, '2018-03-15 16:16:09', 1),
(7, '辅导班', 2, '2018-03-15 16:19:37', 0),
(8, '主管', 2, '2018-03-15 16:19:54', 1),
(10, '主管2', 1, '2018-03-15 17:34:02', 0);

-- --------------------------------------------------------

--
-- 表的结构 `transfer`
--

CREATE TABLE IF NOT EXISTS `transfer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transfer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '转账申请人姓名',
  `transfer_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '转账公司名称',
  `transfer_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '转账公司账号',
  `transfer_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '转账时间',
  `transfer_money` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '转账金额',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '是否删除状态 0正常 1删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='转账表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
