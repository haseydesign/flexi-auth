/*
Navicat MySQL Data Transfer

Source Server         :  Localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : flexi_auth_demo

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-04-12 22:40:38
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `demo_user_address`
-- ----------------------------
DROP TABLE IF EXISTS `demo_user_address`;
CREATE TABLE `demo_user_address` (
  `uadd_id` int(11) NOT NULL AUTO_INCREMENT,
  `uadd_uacc_fk` int(11) NOT NULL,
  `uadd_alias` varchar(50) NOT NULL,
  `uadd_recipient` varchar(100) NOT NULL,
  `uadd_phone` varchar(25) NOT NULL,
  `uadd_company` varchar(75) NOT NULL,
  `uadd_address_01` varchar(100) NOT NULL,
  `uadd_address_02` varchar(100) NOT NULL,
  `uadd_city` varchar(50) NOT NULL,
  `uadd_county` varchar(50) NOT NULL,
  `uadd_post_code` varchar(25) NOT NULL,
  `uadd_country` varchar(50) NOT NULL,
  PRIMARY KEY (`uadd_id`),
  UNIQUE KEY `uadd_id` (`uadd_id`),
  KEY `uadd_uacc_fk` (`uadd_uacc_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of demo_user_address
-- ----------------------------
INSERT INTO `demo_user_address` VALUES ('1', '4', 'Home', 'Joe Public', '0123456789', '', '123', '', 'My City', 'My County', 'My Post Code', 'My Country');
INSERT INTO `demo_user_address` VALUES ('2', '4', 'Work', 'Joe Public', '0123456789', 'Flexi', '321', '', 'My Work City', 'My Work County', 'My Work Post Code', 'My Work Country');

-- ----------------------------
-- Table structure for `demo_user_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `demo_user_profiles`;
CREATE TABLE `demo_user_profiles` (
  `upro_id` int(11) NOT NULL AUTO_INCREMENT,
  `upro_uacc_fk` int(11) NOT NULL,
  `upro_company` varchar(50) NOT NULL,
  `upro_first_name` varchar(50) NOT NULL,
  `upro_last_name` varchar(50) NOT NULL,
  `upro_phone` varchar(25) NOT NULL,
  `upro_newsletter` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`upro_id`),
  UNIQUE KEY `upro_id` (`upro_id`),
  KEY `upro_uacc_fk` (`upro_uacc_fk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of demo_user_profiles
-- ----------------------------
INSERT INTO `demo_user_profiles` VALUES ('1', '1', '', 'John', 'Admin', '0123456789', '0');
INSERT INTO `demo_user_profiles` VALUES ('2', '2', '', 'Jim', 'Moderator', '0123465798', '0');
INSERT INTO `demo_user_profiles` VALUES ('3', '3', '', 'Joe', 'Public', '0123456789', '0');

-- ----------------------------
-- Table structure for `user_accounts`
-- ----------------------------
DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE `user_accounts` (
  `uacc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uacc_group_fk` smallint(5) unsigned NOT NULL,
  `uacc_email` varchar(100) NOT NULL,
  `uacc_username` varchar(15) NOT NULL,
  `uacc_password` varchar(60) NOT NULL,
  `uacc_ip_address` varchar(40) NOT NULL,
  `uacc_salt` varchar(40) NOT NULL,
  `uacc_activation_token` varchar(40) NOT NULL,
  `uacc_forgotten_password_token` varchar(40) NOT NULL,
  `uacc_forgotten_password_expire` datetime NOT NULL,
  `uacc_update_email_token` varchar(40) NOT NULL,
  `uacc_update_email` varchar(100) NOT NULL,
  `uacc_active` tinyint(1) unsigned NOT NULL,
  `uacc_suspend` tinyint(1) unsigned NOT NULL,
  `uacc_fail_login_attempts` smallint(5) NOT NULL,
  `uacc_fail_login_ip_address` varchar(40) NOT NULL,
  `uacc_date_fail_login_ban` datetime NOT NULL COMMENT 'Time user is banned until due to repeated failed logins',
  `uacc_date_last_login` datetime NOT NULL,
  `uacc_date_added` datetime NOT NULL,
  PRIMARY KEY (`uacc_id`),
  UNIQUE KEY `uacc_id` (`uacc_id`),
  KEY `uacc_group_fk` (`uacc_group_fk`),
  KEY `uacc_email` (`uacc_email`),
  KEY `uacc_username` (`uacc_username`),
  KEY `uacc_fail_login_ip_address` (`uacc_fail_login_ip_address`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_accounts
-- ----------------------------
INSERT INTO `user_accounts` VALUES ('1', '3', 'admin@admin.com', 'admin', '$2a$08$lSOQGNqwBFUEDTxm2Y.hb.mfPEAt/iiGY9kJsZsd4ekLJXLD.tCrq', '0.0.0.0', 'XKVT29q2Jr', '', '', '0000-00-00 00:00:00', '', '', '1', '0', '0', '', '0000-00-00 00:00:00', '2012-04-12 21:15:05', '2011-01-01 00:00:00');
INSERT INTO `user_accounts` VALUES ('2', '2', 'moderator@moderator.com', 'moderator', '$2a$08$q.0ZhovC5ZkVpkBLJ.Mz.O4VjWsKohYckJNx4KM40MXdP/zEZpwcm', '0.0.0.0', 'ZC38NNBPjF', '', '', '0000-00-00 00:00:00', '', '', '1', '0', '0', '', '0000-00-00 00:00:00', '2012-04-10 21:58:02', '2011-08-04 16:49:07');
INSERT INTO `user_accounts` VALUES ('3', '1', 'public@public.com', 'public', '$2a$08$GlxQ00VKlev2t.CpvbTOlepTJljxF2RocJghON37r40mbDl4vJLv2', '0.0.0.0', 'CDNFV6dHmn', '', '', '0000-00-00 00:00:00', '', '', '1', '0', '0', '', '0000-00-00 00:00:00', '2012-04-10 22:01:41', '2011-09-15 12:24:45');

-- ----------------------------
-- Table structure for `user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
  `ugrp_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `ugrp_name` varchar(20) NOT NULL,
  `ugrp_desc` varchar(100) NOT NULL,
  `ugrp_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`ugrp_id`),
  UNIQUE KEY `ugrp_id` (`ugrp_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_groups
-- ----------------------------
INSERT INTO `user_groups` VALUES ('1', 'Public', 'Public User : has no admin access rights.', '0');
INSERT INTO `user_groups` VALUES ('2', 'Moderator', 'Admin Moderator : has partial admin access rights.', '1');
INSERT INTO `user_groups` VALUES ('3', 'Master Admin', 'Master Admin : has full admin access rights.', '1');

-- ----------------------------
-- Table structure for `user_login_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `user_login_sessions`;
CREATE TABLE `user_login_sessions` (
  `usess_uacc_fk` int(11) NOT NULL,
  `usess_series` varchar(40) NOT NULL,
  `usess_token` varchar(40) NOT NULL,
  `usess_login_date` datetime NOT NULL,
  PRIMARY KEY (`usess_token`),
  UNIQUE KEY `usess_token` (`usess_token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_login_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `user_privileges`
-- ----------------------------
DROP TABLE IF EXISTS `user_privileges`;
CREATE TABLE `user_privileges` (
  `upriv_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_name` varchar(20) NOT NULL,
  `upriv_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`upriv_id`),
  UNIQUE KEY `upriv_id` (`upriv_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_privileges
-- ----------------------------
INSERT INTO `user_privileges` VALUES ('1', 'View Users', 'User can view user account details.');
INSERT INTO `user_privileges` VALUES ('2', 'View User Groups', 'User can view user groups.');
INSERT INTO `user_privileges` VALUES ('3', 'View Privileges', 'User can view privileges.');
INSERT INTO `user_privileges` VALUES ('4', 'Insert User Groups', 'User can insert new user groups.');
INSERT INTO `user_privileges` VALUES ('5', 'Insert Privileges', 'User can insert privileges.');
INSERT INTO `user_privileges` VALUES ('6', 'Update Users', 'User can update user account details.');
INSERT INTO `user_privileges` VALUES ('7', 'Update User Groups', 'User can update user groups.');
INSERT INTO `user_privileges` VALUES ('8', 'Update Privileges', 'User can update user privileges.');
INSERT INTO `user_privileges` VALUES ('9', 'Delete Users', 'User can delete user accounts.');
INSERT INTO `user_privileges` VALUES ('10', 'Delete User Groups', 'User can delete user groups.');
INSERT INTO `user_privileges` VALUES ('11', 'Delete Privileges', 'User can delete user privileges.');

-- ----------------------------
-- Table structure for `user_privilege_users`
-- ----------------------------
DROP TABLE IF EXISTS `user_privilege_users`;
CREATE TABLE `user_privilege_users` (
  `upriv_users_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_users_uacc_fk` int(11) NOT NULL,
  `upriv_users_upriv_fk` smallint(5) NOT NULL,
  PRIMARY KEY (`upriv_users_id`),
  UNIQUE KEY `upriv_users_id` (`upriv_users_id`) USING BTREE,
  KEY `upriv_users_uacc_fk` (`upriv_users_uacc_fk`),
  KEY `upriv_users_upriv_fk` (`upriv_users_upriv_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_privilege_users
-- ----------------------------
INSERT INTO `user_privilege_users` VALUES ('1', '1', '1');
INSERT INTO `user_privilege_users` VALUES ('2', '1', '2');
INSERT INTO `user_privilege_users` VALUES ('3', '1', '3');
INSERT INTO `user_privilege_users` VALUES ('4', '1', '4');
INSERT INTO `user_privilege_users` VALUES ('5', '1', '5');
INSERT INTO `user_privilege_users` VALUES ('6', '1', '6');
INSERT INTO `user_privilege_users` VALUES ('7', '1', '7');
INSERT INTO `user_privilege_users` VALUES ('8', '1', '8');
INSERT INTO `user_privilege_users` VALUES ('9', '1', '9');
INSERT INTO `user_privilege_users` VALUES ('10', '1', '10');
INSERT INTO `user_privilege_users` VALUES ('11', '1', '11');
INSERT INTO `user_privilege_users` VALUES ('12', '2', '1');
INSERT INTO `user_privilege_users` VALUES ('13', '2', '2');
INSERT INTO `user_privilege_users` VALUES ('14', '2', '3');
INSERT INTO `user_privilege_users` VALUES ('15', '2', '6');


-- ----------------------------
-- Table structure for `user_privilege_groups`
-- ----------------------------

DROP TABLE IF EXISTS `user_privilege_groups`;
CREATE TABLE `user_privilege_groups` (
  `upriv_groups_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `upriv_groups_ugrp_fk` smallint(5) unsigned NOT NULL,
  `upriv_groups_upriv_fk` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`upriv_groups_id`),
  UNIQUE KEY `upriv_groups_id` (`upriv_groups_id`) USING BTREE,
  KEY `upriv_groups_ugrp_fk` (`upriv_groups_ugrp_fk`),
  KEY `upriv_groups_upriv_fk` (`upriv_groups_upriv_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;


-- ----------------------------
-- Records of user_privilege_groups
-- ----------------------------

INSERT INTO `user_privilege_groups` VALUES(1, 3, 1);
INSERT INTO `user_privilege_groups` VALUES(3, 3, 3);
INSERT INTO `user_privilege_groups` VALUES(4, 3, 4);
INSERT INTO `user_privilege_groups` VALUES(5, 3, 5);
INSERT INTO `user_privilege_groups` VALUES(6, 3, 6);
INSERT INTO `user_privilege_groups` VALUES(7, 3, 7);
INSERT INTO `user_privilege_groups` VALUES(8, 3, 8);
INSERT INTO `user_privilege_groups` VALUES(9, 3, 9);
INSERT INTO `user_privilege_groups` VALUES(10, 3, 10);
INSERT INTO `user_privilege_groups` VALUES(11, 3, 11);
INSERT INTO `user_privilege_groups` VALUES(12, 2, 2);
INSERT INTO `user_privilege_groups` VALUES(13, 2, 4);
INSERT INTO `user_privilege_groups` VALUES(14, 2, 5);