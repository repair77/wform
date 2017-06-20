-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-20 05:36:10
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `wf_article`
--

CREATE TABLE IF NOT EXISTS `wf_article` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '表单表主键',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `author` varchar(15) NOT NULL DEFAULT '' COMMENT '作者',
  `content` mediumtext NOT NULL COMMENT '文章内容',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` char(255) NOT NULL DEFAULT '' COMMENT '描述',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '文章是否显示 1是 0否',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除 1是 0否',
  `click` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `cid` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `wf_article`
--

INSERT INTO `wf_article` (`aid`, `title`, `author`, `content`, `keywords`, `description`, `is_show`, `is_delete`, `click`, `addtime`, `cid`) VALUES
(17, '测试表单标题', 'test', '&lt;p&gt;测试文章内容&lt;img alt=&quot;白俊遥博客&quot; src=&quot;/Upload/image/ueditor/20150601/1433171136139793.jpg&quot; title=&quot;白俊遥博客&quot;/&gt;&lt;/p&gt;', '关键词,多个', '测试表单描述', 1, 0, 378, 1432649909, 28),
(18, '111', '', '', '', '', 1, 0, 2, 1497581499, 28);

-- --------------------------------------------------------

--
-- 表的结构 `wf_article_pic`
--

CREATE TABLE IF NOT EXISTS `wf_article_pic` (
  `ap_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `path` varchar(100) NOT NULL DEFAULT '' COMMENT '图片路径',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属表单id',
  PRIMARY KEY (`ap_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wf_article_tag`
--

CREATE TABLE IF NOT EXISTS `wf_article_tag` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '标签id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wf_article_tag`
--

INSERT INTO `wf_article_tag` (`aid`, `tid`) VALUES
(17, 20);

-- --------------------------------------------------------

--
-- 表的结构 `wf_category`
--

CREATE TABLE IF NOT EXISTS `wf_category` (
  `cid` tinyint(2) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类主键id',
  `cname` varchar(15) NOT NULL DEFAULT '' COMMENT '分类名称',
  `keywords` varchar(255) DEFAULT '' COMMENT '关键词',
  `description` varchar(255) DEFAULT '' COMMENT '描述',
  `sort` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `pid` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '父级栏目id',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '分类状态(0,隐藏;1,显示)',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `wf_category`
--

INSERT INTO `wf_category` (`cid`, `cname`, `keywords`, `description`, `sort`, `pid`, `status`) VALUES
(28, '测试分类', '测试分类关键词', '测试分类描述', 0, 0, 1),
(29, '集合表单', '', '测试表单集合', 1, 0, 1),
(30, '深度好文', '', '', 12, 29, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wf_config`
--

CREATE TABLE IF NOT EXISTS `wf_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '配置项键名',
  `value` text COMMENT '配置项键值 1表示开启 0 关闭',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `wf_config`
--

INSERT INTO `wf_config` (`id`, `name`, `value`) VALUES
(1, 'WEB_NAME', ''),
(2, 'WEB_KEYWORDS', ''),
(3, 'WEB_DESCRIPTION', ''),
(4, 'WEB_STATUS', '1'),
(5, 'ADMIN_PASSWORD', '21232f297a57a5a743894a0e4a801fc3'),
(6, 'WATER_TYPE', '0'),
(7, 'TEXT_WATER_WORD', ''),
(8, 'TEXT_WATER_TTF_PTH', './Public/static/font/ariali.ttf'),
(9, 'TEXT_WATER_FONT_SIZE', '15'),
(10, 'TEXT_WATER_COLOR', '#008CBA'),
(11, 'TEXT_WATER_ANGLE', '0'),
(12, 'TEXT_WATER_LOCATE', '9'),
(13, 'IMAGE_WATER_PIC_PTAH', './Upload/image/logo/logo.png'),
(14, 'IMAGE_WATER_LOCATE', '9'),
(15, 'IMAGE_WATER_ALPHA', '80'),
(16, 'WEB_CLOSE_WORD', '网站升级中，请稍后访问。'),
(17, 'WEB_ICP_NUMBER', ''),
(18, 'ADMIN_EMAIL', ''),
(19, 'COPYRIGHT_WORD', ''),
(20, 'QQ_APP_ID', ''),
(21, 'CHANGYAN_APP_ID', 'cyrKRbJ5N'),
(22, 'CHANGYAN_CONF', 'prod_c654661caf5ab6da98742d040413815b'),
(23, 'WEB_STATISTICS', ''),
(24, 'CHANGEYAN_RETURN_COMMENT', ''),
(25, 'AUTHOR', 'admin'),
(26, 'QQ_APP_KEY', ''),
(27, 'CHANGYAN_COMMENT', ''),
(28, 'BAIDU_SITE_URL', ''),
(29, 'DOUBAN_API_KEY', ''),
(30, 'DOUBAN_SECRET', ''),
(31, 'RENREN_API_KEY', ''),
(32, 'RENREN_SECRET', ''),
(33, 'SINA_API_KEY', ''),
(34, 'SINA_SECRET', ''),
(35, 'KAIXIN_API_KEY', ''),
(36, 'KAIXIN_SECRET', ''),
(37, 'SOHU_API_KEY', ''),
(38, 'SOHU_SECRET', ''),
(39, 'GITHUB_CLIENT_ID', ''),
(40, 'GITHUB_CLIENT_SECRET', ''),
(41, 'IMAGE_TITLE_ALT_WORD', ''),
(42, 'EMAIL_SMTP', ''),
(43, 'EMAIL_USERNAME', ''),
(44, 'EMAIL_PASSWORD', ''),
(45, 'EMAIL_FROM_NAME', ''),
(46, 'COMMENT_REVIEW', '1'),
(47, 'COMMENT_SEND_EMAIL', '0'),
(48, 'EMAIL_RECEIVE', '');

-- --------------------------------------------------------

--
-- 表的结构 `wf_content`
--

CREATE TABLE IF NOT EXISTS `wf_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) unsigned NOT NULL COMMENT '所属分类id',
  `title` varchar(60) NOT NULL COMMENT '标题',
  `author` varchar(15) NOT NULL DEFAULT ' ' COMMENT '作者',
  `summary` varchar(255) NOT NULL COMMENT '简介',
  `process` varchar(60) NOT NULL COMMENT '处理文件',
  `views` int(10) unsigned NOT NULL COMMENT '访问量',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `addtime` int(10) unsigned NOT NULL COMMENT '添加时间',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(1是,0否)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='内容表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `wf_content`
--

INSERT INTO `wf_content` (`id`, `cid`, `title`, `author`, `summary`, `process`, `views`, `status`, `addtime`, `is_delete`) VALUES
(1, 29, '继续测试', '发撒', '范德薩', 'test.php', 0, 1, 1497696512, 1),
(2, 28, '测试', '安抚 ', '', 'test.php', 0, 1, 1497696658, 0),
(3, 28, '还是测试', 'tester', '什么都没', 'tea.php', 0, 0, 1497698310, 1),
(4, 29, '啦啦啦啦', '尼克', '放大', 'aaa.teee', 0, 1, 1497833766, 0),
(5, 29, '测试标题619', 'admin', '神推送', 'tttaaa', 0, 0, 1497837820, 0),
(9, 30, '好文推荐', 'admin2', '地方', 'sf', 0, 1, 1497839412, 0),
(10, 28, 'fdas', 'f ds', ' ds', 'fg', 0, 1, 1497855282, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wf_fields`
--

CREATE TABLE IF NOT EXISTS `wf_fields` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) unsigned NOT NULL COMMENT '所属内容id',
  `num` int(10) unsigned NOT NULL COMMENT '序号',
  `fieldstype` text NOT NULL COMMENT '字段类型',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(1是,0否)',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='字段表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wf_tag`
--

CREATE TABLE IF NOT EXISTS `wf_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签主键',
  `tname` varchar(10) NOT NULL DEFAULT '' COMMENT '标签名',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `wf_tag`
--

INSERT INTO `wf_tag` (`tid`, `tname`) VALUES
(20, '测试标签'),
(21, '萨法');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
