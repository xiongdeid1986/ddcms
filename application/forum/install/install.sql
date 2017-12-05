/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : eb123

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-07-07 23:45:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for {prefix}forum
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}forum`;
CREATE TABLE `{prefix}forum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '节点ID',
  `group` varchar(255) NOT NULL DEFAULT '' COMMENT '分组',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `eb_metatitle` varchar(255) NOT NULL DEFAULT '' COMMENT 'meta标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `eb_ext` text COMMENT '扩展信息',
  `config` text COMMENT '配置',
  `auth` text COMMENT '权限',
  `open` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '开启论坛',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='论坛表';

-- ----------------------------
-- Records of {prefix}forum
-- ----------------------------

-- ----------------------------
-- Table structure for {prefix}forum_moderator
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}forum_moderator`;
CREATE TABLE `{prefix}forum_moderator` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '论坛id',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '评论人id',
  `auth` varchar(255) NOT NULL DEFAULT '' COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='版主权限表';

-- ----------------------------
-- Records of {prefix}forum_moderator
-- ----------------------------

-- ----------------------------
-- Table structure for {prefix}forum_rethread
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}forum_rethread`;
CREATE TABLE `{prefix}forum_rethread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(10) unsigned NOT NULL COMMENT 'FORUM_ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回帖用户ID',
  `content` text,
  `ip` varchar(255) NOT NULL DEFAULT '' COMMENT 'IP',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '推荐',
  PRIMARY KEY (`id`),
  KEY `forum_id` (`thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of {prefix}forum_rethread
-- ----------------------------

-- ----------------------------
-- Table structure for {prefix}forum_thread
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}forum_thread`;
CREATE TABLE `{prefix}forum_thread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '内容ID',
  `forum_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '标题',
  `keywords` char(70) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` char(250) NOT NULL DEFAULT '' COMMENT '内容描述',
  `ip` varchar(255) NOT NULL DEFAULT '' COMMENT 'IP',
  `views` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览数',
  `rethreads` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '跟帖数',
  `eb_cache` text COMMENT '缓存',
  `rethread_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最新跟帖时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '精华等级',
  `best` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '精华等级',
  `top` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '置顶',
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of {prefix}forum_thread
-- ----------------------------

-- ----------------------------
-- Table structure for {prefix}forum_thread_body
-- ----------------------------
DROP TABLE IF EXISTS `{prefix}forum_thread_body`;
CREATE TABLE `{prefix}forum_thread_body` (
  `id` int(11) unsigned NOT NULL,
  `detail` text NOT NULL COMMENT '帖子内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of {prefix}forum_thread_body
-- ----------------------------
