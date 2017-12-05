/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : eb123

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-07-08 13:24:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for {prefix}mbzs
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}mbzs`;
CREATE TABLE `{prefix}mbzs` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `group` varchar(255) NOT NULL DEFAULT '' COMMENT '分组',
  `title` varchar(250) NOT NULL DEFAULT '' COMMENT '标题',
  `name` char(40) NOT NULL DEFAULT '' COMMENT '配置项',
  `value` text COMMENT '配置值',
  `form` varchar(255) NOT NULL DEFAULT '' COMMENT '表单类型',
  `remark` text COMMENT '说明',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `sort` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='核心配置表';

-- ----------------------------
-- Records of {prefix}mbzs
-- ----------------------------
INSERT INTO `{prefix}mbzs` VALUES ('1', '广告', '头部banner', 'header_banner', 'http://static.ebcms.com/img/ad1.gif', 'upload', '首页头部广告', '1479041750', '1479037002', '0', '1');
INSERT INTO `{prefix}mbzs` VALUES ('2', '广告', '首页栏目上方', 'index_panel_ad', 'http://static.ebcms.com/img/ad2.gif', 'upload', '首页栏目面板上方刚搞', '1479041759', '1479037071', '0', '1');
INSERT INTO `{prefix}mbzs` VALUES ('3', '广告', '侧栏广告', 'side_ad', 'http://static.ebcms.com/img/ad3.gif', 'upload', '', '1479041767', '1479037097', '0', '1');
