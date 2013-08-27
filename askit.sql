/*
Navicat MySQL Data Transfer

Source Server         : wamp
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : askit

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-08-26 22:59:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `answers`
-- ----------------------------
DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `answer` bigint(10) NOT NULL AUTO_INCREMENT,
  `question` bigint(10) DEFAULT NULL,
  `up1down2` int(1) DEFAULT NULL,
  `ipaddress` varchar(19) DEFAULT NULL,
  PRIMARY KEY (`answer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of answers
-- ----------------------------
INSERT INTO `answers` VALUES ('1', '1', '1', '10.5.5.5.1');

-- ----------------------------
-- Table structure for `questionlookup`
-- ----------------------------
DROP TABLE IF EXISTS `questionlookup`;
CREATE TABLE `questionlookup` (
  `question` bigint(10) NOT NULL AUTO_INCREMENT,
  `answerId` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`question`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of questionlookup
-- ----------------------------
INSERT INTO `questionlookup` VALUES ('1', '1');
