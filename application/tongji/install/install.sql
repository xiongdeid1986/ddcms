/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : eb123

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-09-22 12:55:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for {prefix}tongji_tongji
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}tongji_tongji`;
CREATE TABLE `{prefix}tongji_tongji` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '节点ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '网页标题',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `from` varchar(255) NOT NULL DEFAULT '' COMMENT '来源地址',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `ip` varchar(255) NOT NULL DEFAULT '' COMMENT 'ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='操作日志表';

-- ----------------------------
-- Records of {prefix}tongji_tongji
-- ----------------------------
