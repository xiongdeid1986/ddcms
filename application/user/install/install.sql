/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : eb123

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-07-18 16:45:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for {prefix}user
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}user`;
CREATE TABLE `{prefix}user` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `nickname` char(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `motto` varchar(255) NOT NULL DEFAULT '' COMMENT '座右铭',
  `grade` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员等级',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `login_times` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `login_ip` char(15) NOT NULL DEFAULT '' COMMENT '登陆ip地址',
  `login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `sort` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `ext` text COMMENT '扩展信息',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of {prefix}user
-- ----------------------------

-- ----------------------------
-- Table structure for {prefix}user_comment
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}user_comment`;
CREATE TABLE `{prefix}user_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(255) NOT NULL DEFAULT '' COMMENT '分组',
  `key` varchar(255) NOT NULL DEFAULT '' COMMENT '标识',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论人id',
  `to_user_id` int(10) unsigned DEFAULT '0' COMMENT '回复对象id',
  `top_id` int(10) unsigned DEFAULT '0' COMMENT '顶级评论id',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父评论id',
  `content` text NOT NULL COMMENT '评论内容',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '推荐',
  `ip` varchar(255) NOT NULL DEFAULT '' COMMENT 'ip地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='内容评论表';

-- ----------------------------
-- Records of {prefix}user_comment
-- ----------------------------

-- ----------------------------
-- Table structure for {prefix}user_currency
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}user_currency`;
CREATE TABLE `{prefix}user_currency` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '后台人员ID',
  `jifen` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '积分',
  `jinbi` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '金币',
  `yuan` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '元',
  `bi1` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT '币种1',
  `bi2` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT '币种2',
  `bi3` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT '币种3',
  `bi4` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT '币种4',
  `bi5` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT '币种5',
  `bi6` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT '币种6',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户财富表';

-- ----------------------------
-- Records of {prefix}user_currency
-- ----------------------------

-- ----------------------------
-- Table structure for {prefix}user_currency_log
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}user_currency_log`;
CREATE TABLE `{prefix}user_currency_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '节点ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `num` int(11) NOT NULL DEFAULT '0' COMMENT '数量',
  `currency` varchar(255) NOT NULL DEFAULT '' COMMENT '货币类型',
  `manager_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作人id',
  `ip` varchar(255) NOT NULL DEFAULT '' COMMENT 'ip',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '99' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='财富日志表';

-- ----------------------------
-- Records of {prefix}user_currency_log
-- ----------------------------

-- ----------------------------
-- Table structure for {prefix}user_message
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}user_message`;
CREATE TABLE `{prefix}user_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '节点ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `topic` varchar(255) NOT NULL DEFAULT '' COMMENT '主题',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text COMMENT '消息内容',
  `isread` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否已读',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '99' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='消息通知表';

-- ----------------------------
-- Records of {prefix}user_message
-- ----------------------------
