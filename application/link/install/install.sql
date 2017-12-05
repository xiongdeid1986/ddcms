/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : eb123

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-07-08 16:04:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for {prefix}link_link
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}link_link`;
CREATE TABLE `{prefix}link_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '节点ID',
  `group` varchar(255) NOT NULL DEFAULT '' COMMENT '分组',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `info` varchar(255) NOT NULL DEFAULT '' COMMENT '其他信息',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '连接地址',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '99' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of {prefix}link_link
-- ----------------------------
INSERT INTO `{prefix}link_link` VALUES ('1', '友情链接', '易贝网站管理系统', '', '', '', 'http://www.ebcms.com/', '1479188905', '1479188905', '0', '1');
INSERT INTO `{prefix}link_link` VALUES ('2', '友情链接', '开源CMS', '', '', '', 'http://www.ebcms.com/', '1479189038', '1479188937', '0', '1');
