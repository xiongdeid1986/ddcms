/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : eb123

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-07-30 21:27:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for {prefix}superpay
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}superpay`;
CREATE TABLE `{prefix}superpay` (
  `sign` varchar(50) NOT NULL DEFAULT '' COMMENT '标志',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `expire_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='购买记录表';
