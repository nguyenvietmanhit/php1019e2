/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100410
 Source Host           : localhost:3306
 Source Schema         : mvc_demo

 Target Server Type    : MySQL
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 10/06/2020 12:37:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tên danh mục',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên file ảnh danh mục',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mô tả chi tiết cho danh mục',
  `status` tinyint(3) NULL DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Ngày tạo danh mục',
  `updated_at` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `test` int(255) NULL DEFAULT 1111,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, '1', 'dsa', '<p>a</p>\r\n', 1, '2020-03-18 18:05:06', '2020-04-07 12:39:32', NULL);
INSERT INTO `categories` VALUES (2, '1sdadsadsa', '', '', 0, '2020-03-18 18:09:54', NULL, NULL);
INSERT INTO `categories` VALUES (3, '1dsadsa', '', '<p>dsadsadsa</p>\r\n', 1, '2020-03-18 18:10:34', NULL, NULL);
INSERT INTO `categories` VALUES (4, '1dsadsadsa', '1584530089-1.JPEG', '<p>sadsa</p>\r\n', 1, '2020-03-18 18:14:49', NULL, NULL);
INSERT INTO `categories` VALUES (5, 'dsadsadsa', '1585039182-1.JPEG', '<p>dsa</p>\r\n', 0, '2020-03-24 15:39:42', NULL, NULL);
INSERT INTO `categories` VALUES (6, 'dsad', '', '<p>sadsadsa</p>\r\n', 0, '2020-03-24 15:47:27', NULL, 1111);
INSERT INTO `categories` VALUES (7, 'dsadsadsa', '', '', 0, '2020-03-24 15:49:57', NULL, 0);
INSERT INTO `categories` VALUES (8, 'dsadsadasdsa', '', '', 0, '2020-03-24 15:50:24', NULL, 2147483647);
INSERT INTO `categories` VALUES (9, 'dsadsa', '', '', 0, '2020-03-24 15:50:42', NULL, 2);
INSERT INTO `categories` VALUES (10, '1212', '1590116260-14.jpg', '12121', 1, '2020-05-22 09:57:40', NULL, 1111);
INSERT INTO `categories` VALUES (11, '12121', '', 'dsadsa', 1, '2020-05-22 09:58:52', NULL, 1111);
INSERT INTO `categories` VALUES (12, 'Thể thao', '', '<p>Danh mục thể thao</p>\r\n', 0, '2020-06-03 10:49:00', NULL, 1111);
INSERT INTO `categories` VALUES (13, 'Điện thoại', '', '<p>Danh mục về điện thoại</p>\r\n', 0, '2020-06-03 10:50:06', NULL, 1111);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NULL DEFAULT NULL COMMENT 'Id của danh mục mà tin tức thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tiêu đề tin tức',
  `summary` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mô tả ngắn cho tin tức',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên file ảnh tin tức',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) NULL DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Ngày tạo',
  `updated_at` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `order_id` int(11) NULL DEFAULT NULL COMMENT 'Id của order tương ứng, là khóa ngoại liên kết với bảng orders',
  `product_id` int(11) NULL DEFAULT NULL COMMENT 'Id của product tương ứng, là khóa ngoại liên kết với bảng products',
  `quality` int(11) NULL DEFAULT NULL COMMENT 'Số sản phẩm đã đặt'
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (1, 2, 1);
INSERT INTO `order_details` VALUES (1, 3, 1);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `mobile` int(11) NULL DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Ghi chú từ khách hàng',
  `price_total` int(11) NULL DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint(2) NULL DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Ngày tạo đơn',
  `updated_at` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, NULL, 'Mạnh Viết', 'N/A', 987599921, 'nguyenvietmanhit@gmail.com', '', 89009, 0, '2020-06-10 12:33:25', NULL);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NULL DEFAULT NULL COMMENT 'Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories',
  `news_id` int(11) NULL DEFAULT NULL COMMENT 'Id của tin tức mà gắn với sản phẩm, là khóa ngoại liên kết với bảng news',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tên sản phẩm',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên file ảnh sản phẩm',
  `price` int(11) NULL DEFAULT NULL COMMENT 'Giá sản phẩm',
  `summary` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mô tả ngắn cho sản phẩm',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) NULL DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Ngày tạo',
  `updated_at` date NULL DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 1, NULL, 'dsadsadsa', '1588739145-product-2.jpg', 12, 'dsadas', '<p>12121</p>\r\n', 0, '2020-05-06 11:25:45', '2020-05-06');
INSERT INTO `products` VALUES (2, 12, NULL, 'Vợt cầu lông', '1584528663-1.JPEG', 121, '12', '<p>121</p>\r\n', 1, '2020-06-03 10:49:25', NULL);
INSERT INTO `products` VALUES (3, 12, NULL, 'Giày cầu lông', '1584528663-1.JPEG', 88888, 'sdsa', '<p>dsadas</p>\r\n', 1, '2020-06-03 10:49:41', NULL);
INSERT INTO `products` VALUES (4, 1, NULL, 'Sam Sung', '1584529206-1', 666, '66', '<p>6</p>\r\n', 1, '2020-06-03 10:50:28', NULL);
INSERT INTO `products` VALUES (5, 13, NULL, 'Iphone X', '1584529206-1', 999, '99', '<p>999</p>\r\n', 1, '2020-06-03 10:50:41', NULL);

-- ----------------------------
-- Table structure for slides
-- ----------------------------
DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NULL DEFAULT NULL COMMENT 'Id của tin tức sẽ hiển thị trong slide, là khóa ngoại liên kết với bảng news',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'File ảnh slide',
  `position` tinyint(3) NULL DEFAULT NULL COMMENT 'Vị trí hiển thị của slide, ví dụ: = 0 hiển thị đầu tiên...',
  `status` tinyint(3) NULL DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Ngày tạo',
  `updated_at` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Mật khẩu đăng nhập',
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Fist name',
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Last name',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'File ảnh đại diện',
  `jobs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Nghề nghiệp',
  `last_login` datetime(0) NULL DEFAULT NULL COMMENT 'Lần đăng nhập gần đây nhất',
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Link facebook',
  `status` tinyint(3) NULL DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Ngày tạo',
  `updated_at` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'viết', 'mạnh', NULL, 'jobs', '2020-05-12 11:24:07', NULL, 0, '2020-05-06 11:24:13', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, '1', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-05-11 12:25:20', NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
