-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-15 13:26:58
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
-- 表的结构 `bjy_article`
--

CREATE TABLE IF NOT EXISTS `bjy_article` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章表主键',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `author` varchar(15) NOT NULL DEFAULT '' COMMENT '作者',
  `content` mediumtext NOT NULL COMMENT '文章内容',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` char(255) NOT NULL DEFAULT '' COMMENT '描述',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '文章是否显示 1是 0否',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除 1是 0否',
  `is_top` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否置顶 1是 0否',
  `is_original` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否原创',
  `click` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `cid` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `bjy_article`
--

INSERT INTO `bjy_article` (`aid`, `title`, `author`, `content`, `keywords`, `description`, `is_show`, `is_delete`, `is_top`, `is_original`, `click`, `addtime`, `cid`) VALUES
(17, '测试文章标题', '白俊遥', '&lt;p&gt;测试文章内容&lt;img alt=&quot;白俊遥博客&quot; src=&quot;/Upload/image/ueditor/20150601/1433171136139793.jpg&quot; title=&quot;白俊遥博客&quot;/&gt;&lt;/p&gt;', '关键词,多个', '测试文章描述', 1, 0, 1, 1, 376, 1432649909, 28);

-- --------------------------------------------------------

--
-- 表的结构 `bjy_article_pic`
--

CREATE TABLE IF NOT EXISTS `bjy_article_pic` (
  `ap_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `path` varchar(100) NOT NULL DEFAULT '' COMMENT '图片路径',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属文章id',
  PRIMARY KEY (`ap_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `bjy_article_pic`
--

INSERT INTO `bjy_article_pic` (`ap_id`, `path`, `aid`) VALUES
(11, '/Upload/image/ueditor/20150601/1433171136139793.jpg', 17);

-- --------------------------------------------------------

--
-- 表的结构 `bjy_article_tag`
--

CREATE TABLE IF NOT EXISTS `bjy_article_tag` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '标签id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bjy_article_tag`
--

INSERT INTO `bjy_article_tag` (`aid`, `tid`) VALUES
(17, 20);

-- --------------------------------------------------------

--
-- 表的结构 `bjy_category`
--

CREATE TABLE IF NOT EXISTS `bjy_category` (
  `cid` tinyint(2) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类主键id',
  `cname` varchar(15) NOT NULL DEFAULT '' COMMENT '分类名称',
  `keywords` varchar(255) DEFAULT '' COMMENT '关键词',
  `description` varchar(255) DEFAULT '' COMMENT '描述',
  `sort` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `pid` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '父级栏目id',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `bjy_category`
--

INSERT INTO `bjy_category` (`cid`, `cname`, `keywords`, `description`, `sort`, `pid`) VALUES
(28, '测试分类', '测试分类关键词', '测试分类描述', 0, 0),
(29, '精选文章', '', '', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `bjy_chat`
--

CREATE TABLE IF NOT EXISTS `bjy_chat` (
  `chid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '碎言id',
  `date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表时间',
  `content` text NOT NULL COMMENT '内容',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`chid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `bjy_chat`
--

INSERT INTO `bjy_chat` (`chid`, `date`, `content`, `is_show`, `is_delete`) VALUES
(2, 1432827004, '测试随言碎语', 1, 0),
(3, 1444529995, '测试碎言', 1, 0),
(4, 1497522681, '啦啦啦啊', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `bjy_comment`
--

CREATE TABLE IF NOT EXISTS `bjy_comment` (
  `cmtid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `ouid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论用户id 关联oauth_user表的id',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1：文章评论',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `aid` int(10) unsigned NOT NULL COMMENT '文章id',
  `content` text NOT NULL COMMENT '内容',
  `date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论日期',
  `status` tinyint(1) unsigned NOT NULL COMMENT '1:已审核 0：未审核',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`cmtid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `bjy_comment`
--

INSERT INTO `bjy_comment` (`cmtid`, `ouid`, `type`, `pid`, `aid`, `content`, `date`, `status`, `is_delete`) VALUES
(19, 1, 1, 0, 17, '测试评论&lt;img src=&quot;/Public/emote/tuzki/t_0002.gif&quot; title=&quot;Love&quot; alt=&quot;白俊遥博客&quot;&gt;', 1445747059, 1, 0),
(21, 1, 1, 19, 17, '测试回复', 1447943018, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `bjy_config`
--

CREATE TABLE IF NOT EXISTS `bjy_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '配置项键名',
  `value` text COMMENT '配置项键值 1表示开启 0 关闭',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `bjy_config`
--

INSERT INTO `bjy_config` (`id`, `name`, `value`) VALUES
(1, 'WEB_NAME', ''),
(2, 'WEB_KEYWORDS', ''),
(3, 'WEB_DESCRIPTION', ''),
(4, 'WEB_STATUS', '1'),
(5, 'ADMIN_PASSWORD', '21232f297a57a5a743894a0e4a801fc3'),
(6, 'WATER_TYPE', '2'),
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
(25, 'AUTHOR', ''),
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
-- 表的结构 `bjy_link`
--

CREATE TABLE IF NOT EXISTS `bjy_link` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `lname` varchar(50) NOT NULL DEFAULT '' COMMENT '链接名',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '排序',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '文章是否显示 1是 0否',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除 1是 0否',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `bjy_link`
--

INSERT INTO `bjy_link` (`lid`, `lname`, `url`, `sort`, `is_show`, `is_delete`) VALUES
(2, '白俊遥博客', 'http://baijunyao.com', 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bjy_oauth_user`
--

CREATE TABLE IF NOT EXISTS `bjy_oauth_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联的本站用户id',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '类型 1：QQ  2：新浪微博 3：豆瓣 4：人人 5：开心网',
  `nickname` varchar(30) NOT NULL DEFAULT '' COMMENT '第三方昵称',
  `head_img` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `openid` varchar(40) NOT NULL DEFAULT '' COMMENT '第三方用户id',
  `access_token` varchar(255) NOT NULL DEFAULT '' COMMENT 'access_token token',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '绑定时间',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(16) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `login_times` int(6) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否是admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `bjy_tag`
--

CREATE TABLE IF NOT EXISTS `bjy_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签主键',
  `tname` varchar(10) NOT NULL DEFAULT '' COMMENT '标签名',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `bjy_tag`
--

INSERT INTO `bjy_tag` (`tid`, `tname`) VALUES
(20, '测试标签');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
