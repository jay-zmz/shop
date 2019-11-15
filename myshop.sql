/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : myshop

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-11-15 17:25:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for attrs
-- ----------------------------
DROP TABLE IF EXISTS `attrs`;
CREATE TABLE `attrs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attr_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attr_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `attr_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of attrs
-- ----------------------------
INSERT INTO `attrs` VALUES ('1', '2019-11-14 09:11:56', '2019-11-14 09:11:56', '颜色', '红色,蓝色', '1', '1');
INSERT INTO `attrs` VALUES ('2', '2019-11-14 09:18:28', '2019-11-14 09:18:28', '尺寸', '40,41', '2', '1');

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES ('1', '2019-11-14 09:11:19', '2019-11-14 09:11:19', '华为', '华为', 'www.huawei.com', null, '0', '1');
INSERT INTO `brands` VALUES ('2', '2019-11-14 09:17:43', '2019-11-14 09:17:43', '海澜之家', '海澜之家', 'www.huawei.com', null, '0', '1');
INSERT INTO `brands` VALUES ('3', '2019-11-15 07:59:00', '2019-11-15 07:59:00', '苹果', '苹果', 'www.huawei.com', null, '0', '1');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pid` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '服装', '服装', '', '0', '0', '2019-11-14 09:10:32', '2019-11-14 09:10:32');
INSERT INTO `categories` VALUES ('2', '家电', '家电', '', '0', '0', '2019-11-14 09:10:49', '2019-11-14 09:10:49');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `goods_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goods_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `og_thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `big_thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mid_thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sm_thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `market_price` decimal(8,2) NOT NULL,
  `shop_price` decimal(8,2) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `on_sale` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `goods_weight` decimal(8,2) NOT NULL,
  `weight_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_goods_code` (`goods_code`) USING BTREE,
  KEY `idx_cate_type_brand` (`brand_id`,`cate_id`,`type_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5200007 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('5199998', '2019-11-14 09:12:32', '2019-11-14 09:12:32', 'p30', '1573722752212972', 'huawei p30', '', '', '', '', '11111.00', '111.00', '1', '1', '2', '1', '11.00', 'kg');
INSERT INTO `goods` VALUES ('5199999', '2019-11-14 09:12:55', '2019-11-14 09:12:55', 'p30', '1573722775461855', 'huawei p30', '', '', '', '', '11111.00', '111.00', '1', '1', '2', '1', '11.00', 'kg');
INSERT INTO `goods` VALUES ('5200001', '2019-11-14 09:19:51', '2019-11-15 06:29:50', '西服', '1573799390953842', 'asd', '', '', '', '', '111.00', '11.00', '2', '1', '1', '2', '1.00', 'kg');
INSERT INTO `goods` VALUES ('5200003', '2019-11-15 08:01:32', '2019-11-15 08:01:32', 'iphone11', '1573804892976036', '苹果', '', '', '', '', '11111.00', '111.00', '3', '1', '2', '1', '1.00', 'kg');
INSERT INTO `goods` VALUES ('5200004', '2019-11-15 08:04:10', '2019-11-15 08:04:10', 'iphone7', '1573805050839645', '苹果', '', '', '', '', '3333.00', '333.00', '3', '1', '2', '1', '3.00', 'kg');
INSERT INTO `goods` VALUES ('5200005', '2019-11-15 08:54:40', '2019-11-15 08:54:40', 'p40', '1573808080379814', 'aa', '', '', '', '', '112.00', '212.00', '1', '1', '2', '1', '1.00', 'kg');
INSERT INTO `goods` VALUES ('5200006', '2019-11-15 08:58:30', '2019-11-15 08:58:30', 'p40', '1573808310840305', 'aa', '', '', '', '', '112.00', '212.00', '1', '1', '2', '1', '1.00', 'kg');

-- ----------------------------
-- Table structure for goods_attrs
-- ----------------------------
DROP TABLE IF EXISTS `goods_attrs`;
CREATE TABLE `goods_attrs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `goods_id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `attr_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attr_price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods_attrs
-- ----------------------------
INSERT INTO `goods_attrs` VALUES ('1', null, null, '5199998', '1', '红色', '20.00');
INSERT INTO `goods_attrs` VALUES ('2', null, null, '5199999', '1', '蓝色', '20.00');
INSERT INTO `goods_attrs` VALUES ('3', null, null, '5200001', '2', '40', '11.00');
INSERT INTO `goods_attrs` VALUES ('4', null, null, '5200002', '1', '红色', '33.00');
INSERT INTO `goods_attrs` VALUES ('5', null, null, '5200003', '1', '红色', '33.00');
INSERT INTO `goods_attrs` VALUES ('6', null, null, '5200004', '1', '蓝色', '12.00');
INSERT INTO `goods_attrs` VALUES ('7', null, null, '5200005', '1', '红色', '1.00');
INSERT INTO `goods_attrs` VALUES ('8', null, null, '5200006', '1', '红色', '1.00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_02_28_043721_create_category_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_03_01_081057_create_brand_table', '1');
INSERT INTO `migrations` VALUES ('5', '2019_03_01_094040_alter_table_brand_add_brand_url', '1');
INSERT INTO `migrations` VALUES ('6', '2019_03_02_083233_create_types', '1');
INSERT INTO `migrations` VALUES ('7', '2019_03_02_091451_create_attrs', '1');
INSERT INTO `migrations` VALUES ('8', '2019_03_02_131342_create_goods', '1');
INSERT INTO `migrations` VALUES ('9', '2019_03_05_095159_create_goods_attrs', '1');
INSERT INTO `migrations` VALUES ('10', '2019_03_09_070805_create_products', '1');
INSERT INTO `migrations` VALUES ('11', '2019_03_09_141112_alter_products', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `goods_id` int(11) NOT NULL,
  `goods_number` int(11) NOT NULL,
  `goods_attr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku_price` decimal(20,2) DEFAULT NULL,
  `sku_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('2', null, null, '5199998', '100', '1', '20.00', '100000');
INSERT INTO `products` VALUES ('5', null, null, '5200001', '100', '3', '20.00', '24');
INSERT INTO `products` VALUES ('16', null, null, '5200004', '100', '', '20.00', '100000');
INSERT INTO `products` VALUES ('19', null, null, '5200006', '100', '', '20.00', '100000');
INSERT INTO `products` VALUES ('20', null, null, '5199999', '100', '', '20.00', '100000');

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', '2019-11-14 09:11:34', '2019-11-14 09:11:34', '电器');
INSERT INTO `types` VALUES ('2', '2019-11-14 09:11:39', '2019-11-14 09:11:39', '服装');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Procedure structure for goodinsert
-- ----------------------------
DROP PROCEDURE IF EXISTS `goodinsert`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `goodinsert`()
BEGIN
	#Routine body goes here...
DECLARE i INT;

SET i=1;
start TRANSACTION;
WHILE i < 5000000 DO
insert into goods(goods_code,description,goods_name,market_price,shop_price,brand_id,on_sale,cate_id,type_id,goods_weight,weight_unit)
values(1111111+i,'goods-des','goods-name',111,100,1,1,1,1,1,'kg');
SET i=i+1;
end while;
commit;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for goods
-- ----------------------------
DROP PROCEDURE IF EXISTS `goods`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `goods`()
BEGIN
	#Routine body goes here...
DECLARE i INT;

SET i=1;

WHILE i < 100000 DO
insert into goods(goods_code,description,goods_name,market_price,shop_price,brand_id,on_sale,cate_id,type_id,goods_weight,weight_unit)
values(1111111+i,'goods-des','goods-name',111,100,1,1,1,1,1,'kg');
SET i=i+1;
end while;


END
;;
DELIMITER ;
