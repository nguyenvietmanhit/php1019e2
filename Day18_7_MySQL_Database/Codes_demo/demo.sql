/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : database_demo

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 30/10/2019 16:13:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khóa chính',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'tên danh mục',
  `status` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Trạng thái danh mục: 0 - Disabled, 1 - Active',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Điện thoại', '1');
INSERT INTO `categories` VALUES (2, 'Tivi', '1');
INSERT INTO `categories` VALUES (3, 'Điều hòa', '0');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khóa chính, mỗi sản phẩm có 1 id duy nhất',
  `category_id` int(11) NULL DEFAULT NULL COMMENT 'sản phẩm này thuộc về danh mục nào',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'tên sản phẩm',
  `price` int(11) NULL DEFAULT NULL COMMENT 'giá sản phẩm',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'mô tả chi tiết sản phẩm',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT 'trạng thái sản phẩm: 0 - Disabled, 1 - Active',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'ngày tạo sản phẩm',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 1, 'Samsung S6', 1200000, 'Nội dung điện thoại sam sung s6', 1, '2019-10-16 16:08:53');
INSERT INTO `products` VALUES (2, 1, 'Samsung Note 10', 4200000, 'Nội dung điện thoại sam sung note 10', 1, '2019-04-16 16:08:53');
INSERT INTO `products` VALUES (3, 1, 'Samsung Note 11', 8200000, 'Nội dung điện thoại sam sung note 11', 1, '2019-04-16 16:08:53');
INSERT INTO `products` VALUES (4, 2, 'Tivi Samsung', 500000, 'Nội dung tivi sam sung ', 0, '2015-04-16 16:08:53');
INSERT INTO `products` VALUES (5, 2, 'Tivi Sony', 500000, 'Nội dung tivi sony ', 1, '2015-04-09 16:08:53');
INSERT INTO `products` VALUES (6, 2, 'Tivi Sharp', 500000, 'Nội dung tivi sharp ', 1, '2015-01-09 16:08:53');
INSERT INTO `products` VALUES (7, 3, 'Điều hòa Daikin', 100000, 'Nội dung điều hòa Daikin ', 1, '2011-01-01 16:08:53');
INSERT INTO `products` VALUES (8, 3, 'Điều hòa Panasonic', 500000, 'Nội dung điều hòa Panasonic ', 1, '2011-04-09 16:08:53');
INSERT INTO `products` VALUES (9, 1, 'Điện thoại Sky', 12345, 'Nội dung điện thoại Sky', 1, '2011-04-09 16:08:53');

SET FOREIGN_KEY_CHECKS = 1;
