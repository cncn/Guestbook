/*
MySQL Data Transfer
Source Host: localhost
Source Database: hdcms
Target Host: localhost
Target Database: hdcms
Date: 2014-06-15 14:34:07
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for hd_guestbook
-- ----------------------------
CREATE TABLE `hd_guestbook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `yhm` varchar(255) DEFAULT NULL COMMENT '用户名',
  `email` char(255) DEFAULT NULL COMMENT ' 邮箱',
  `content` text,
  `addtime` int(10) DEFAULT NULL COMMENT '留言时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '留言状态  1、审核   0、未审核',
  `qq` char(20) DEFAULT NULL COMMENT 'QQ',
  `url` varchar(255) DEFAULT NULL COMMENT '网址',
  `addip` char(20) DEFAULT NULL COMMENT 'IP地址',
  `flag` tinyint(1) DEFAULT '0' COMMENT '站长回复  1、回复  0、默认无回复',
  `hfcontent` text COMMENT '回复内容',
  `hftime` int(10) DEFAULT NULL COMMENT '回复时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
