/*
 Navicat Premium Data Transfer

 Source Server         : Edokon
 Source Server Type    : MySQL
 Source Server Version : 50727
 Source Host           : server146.hosting.reg.ru:3306
 Source Schema         : u1564028_talim

 Target Server Type    : MySQL
 Target Server Version : 50727
 File Encoding         : 65001

 Date: 07/08/2022 19:05:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for actions
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `price` int(11) NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 326 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of actions
-- ----------------------------
INSERT INTO `actions` VALUES (6, 313, 54000, 'group_add', '0', 'admin tomonidan Talaba Miss Pokiza 17.3-J guruxiga qo\'shildi. Bu guruxda oy oxirigacha qolgan 2 ta dars xisobidan 54000 so\'m talabaning xisobidan yechildi', '2022-07-27 11:55:01', '2022-07-27 11:55:01');
INSERT INTO `actions` VALUES (7, 168, 120000, 'payment', '1', 'Talabaning xisobi 120000 so\'mga Naqt orqali Temur tomonidan to\'ldirildi!', '2022-07-27 12:17:19', '2022-07-27 12:17:19');
INSERT INTO `actions` VALUES (8, 312, NULL, 'changePrivilege', NULL, 'Talabaning xolati Oddiy talaba dan Imtiyozli talaba ga Temur tomonidan yangilandi!', '2022-07-27 12:47:41', '2022-07-27 12:47:41');
INSERT INTO `actions` VALUES (9, 312, NULL, 'change_price', NULL, 'Temur tomonidan Talabaning Miss Shahzoda 11.3-T guruxi narxi 300,000 so\'mga o\'zgartirildi', '2022-07-27 12:48:27', '2022-07-27 12:48:27');
INSERT INTO `actions` VALUES (10, 1, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (11, 2, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (12, 3, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (13, 4, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (14, 5, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (15, 6, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (16, 7, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (17, 8, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (18, 9, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (19, 10, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (20, 11, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (21, 12, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (22, 13, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (23, 14, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (24, 15, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (25, 16, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (26, 17, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (27, 18, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (28, 19, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (29, 20, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (30, 21, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (31, 22, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (32, 23, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (33, 24, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (34, 25, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (35, 26, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (36, 27, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (37, 28, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (38, 29, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (39, 30, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (40, 31, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (41, 32, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (42, 33, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (43, 34, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (44, 35, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (45, 36, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (46, 37, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (47, 38, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (48, 39, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (49, 40, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (50, 41, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (51, 42, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (52, 43, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (53, 44, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (54, 45, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (55, 46, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (56, 47, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (57, 48, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (58, 49, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (59, 50, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (60, 51, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (61, 52, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (62, 53, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (63, 54, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (64, 55, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (65, 56, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (66, 57, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (67, 58, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (68, 59, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (69, 60, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (70, 61, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (71, 62, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (72, 63, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (73, 64, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (74, 65, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (75, 66, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (76, 67, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (77, 68, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (78, 69, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (79, 70, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (80, 71, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (81, 72, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (82, 73, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (83, 74, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (84, 75, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (85, 76, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (86, 77, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Maxfuza 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (87, 78, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 8.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (88, 79, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 8.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (89, 80, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 8.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (90, 81, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 8.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (91, 82, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 8.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (92, 83, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 9.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (93, 84, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 9.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (94, 85, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 9.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (95, 86, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 9.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (96, 87, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 9.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (97, 88, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 9.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (98, 89, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 9.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (99, 90, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 9.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (100, 91, 500000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 15.3-J guruxidagi kelgusi darslar uchun 500000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (101, 92, 500000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 16.3-J guruxidagi kelgusi darslar uchun 500000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (102, 93, 500000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 19.0-T guruxidagi kelgusi darslar uchun 500000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (103, 94, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 18.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (104, 95, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 18.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (105, 96, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 18.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (106, 97, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 18.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (107, 98, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 19.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (108, 99, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 19.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (109, 100, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 19.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (110, 101, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 20.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (111, 102, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 20.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (112, 103, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 20.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (113, 104, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Yoldosh 20.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (114, 105, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (115, 106, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (116, 107, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (117, 108, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (118, 109, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (119, 110, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (120, 111, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (121, 112, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (122, 113, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (123, 114, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (124, 115, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (125, 116, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (126, 117, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (127, 118, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (128, 119, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (129, 120, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (130, 121, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (131, 122, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (132, 123, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 18.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (133, 124, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 18.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (134, 125, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 18.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (135, 126, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 18.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (136, 127, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 18.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (137, 128, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Farux 18.3-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (138, 129, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (139, 130, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (140, 131, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (141, 132, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (142, 133, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (143, 134, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (144, 135, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (145, 136, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (146, 137, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (147, 138, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (148, 139, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (149, 140, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (150, 141, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (151, 142, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (152, 143, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (153, 144, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (154, 145, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (155, 146, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (156, 147, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (157, 148, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (158, 149, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (159, 150, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (160, 151, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (161, 152, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (162, 153, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (163, 154, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (164, 155, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (165, 156, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (166, 157, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (167, 158, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (168, 159, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (169, 160, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (170, 161, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (171, 162, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (172, 163, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (173, 164, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (174, 165, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (175, 166, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Temur 17.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (176, 167, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 9.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (177, 168, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 9.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (178, 169, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 9.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (179, 170, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 9.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (180, 171, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 9.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (181, 172, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 9.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (182, 173, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 9.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (183, 174, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 9.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (184, 175, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (185, 176, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (186, 177, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (187, 178, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (188, 179, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (189, 180, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (190, 181, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (191, 182, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (192, 183, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (193, 184, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (194, 185, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (195, 186, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (196, 187, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (197, 188, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (198, 189, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (199, 190, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (200, 191, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (201, 192, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Soxiba 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (202, 193, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (203, 194, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (204, 195, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (205, 196, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (206, 197, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (207, 198, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (208, 199, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (209, 200, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (210, 201, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (211, 202, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (212, 203, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 9.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (213, 204, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (214, 205, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (215, 206, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (216, 207, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (217, 208, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 10.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (218, 209, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (219, 210, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (220, 211, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (221, 212, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (222, 213, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 15.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (223, 214, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (224, 215, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (225, 216, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (226, 217, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (227, 218, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 17.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (228, 219, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (229, 220, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (230, 221, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (231, 222, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (232, 223, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (233, 224, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (234, 225, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (235, 226, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (236, 227, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (237, 228, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (238, 229, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (239, 230, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Durdona 10.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (240, 231, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Elshod 18.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (241, 232, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Elshod 18.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (242, 233, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Elshod 18.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (243, 234, 350000, 'get_balance', '0', 'Talabaning xisobidan Mr Elshod 18.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (244, 235, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 16.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (245, 236, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 16.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (246, 237, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 16.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (247, 238, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 16.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (248, 239, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 18.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (249, 240, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 18.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (250, 241, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 18.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (251, 242, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 18.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (252, 243, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 18.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (253, 244, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (254, 245, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (255, 246, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (256, 247, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (257, 248, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (258, 249, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (259, 250, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (260, 251, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Komila 9.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (261, 252, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Robiya 18.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (262, 253, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Robiya 18.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (263, 254, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Robiya 18.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (264, 255, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Robiya 18.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (265, 256, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Robiya 18.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (266, 257, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Robiya 18.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (267, 258, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 14.0-T  guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (268, 259, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 14.0-T  guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (269, 260, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 14.0-T  guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (270, 261, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 14.0-T  guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (271, 262, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 14.0-T  guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (272, 263, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 14.0-T  guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (273, 264, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 14.0-T  guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (274, 265, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (275, 266, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (276, 267, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (277, 268, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (278, 269, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (279, 270, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (280, 271, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 16.0-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (281, 272, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (282, 273, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (283, 274, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 14.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (284, 275, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 17.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (285, 276, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 17.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (286, 277, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Sayyora 10.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (287, 278, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Sayyora 10.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (288, 279, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Sayyora 10.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (289, 280, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Sayyora 10.3-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (290, 281, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Ro\'za 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (291, 282, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Ro\'za 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (292, 283, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Ro\'za 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (293, 284, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Ro\'za 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (294, 285, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Ro\'za 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (295, 286, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Ro\'za 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (296, 287, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Ro\'za 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (297, 288, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Ro\'za 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (298, 289, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Ro\'za 16.0-T guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (299, 290, 500000, 'get_balance', '0', 'Talabaning xisobidan Miss Ro\'za 15.0-T guruxidagi kelgusi darslar uchun 500000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (300, 291, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (301, 292, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (302, 293, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (303, 294, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (304, 295, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (305, 296, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (306, 297, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (307, 298, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shirin 14.0-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (308, 299, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (309, 300, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (310, 301, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (311, 302, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (312, 303, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (313, 304, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (314, 305, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (315, 306, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (316, 307, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (317, 308, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (318, 309, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (319, 310, 400000, 'get_balance', '0', 'Talabaning xisobidan Mr Maruf 9.0-J guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (320, 311, 400000, 'get_balance', '0', 'Talabaning xisobidan Miss Shahzoda 11.3-T guruxidagi kelgusi darslar uchun 400000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (321, 312, 300000, 'get_balance', '0', 'Talabaning xisobidan Miss Shahzoda 11.3-T guruxidagi kelgusi darslar uchun 300000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (322, 313, 350000, 'get_balance', '0', 'Talabaning xisobidan Miss Pokiza 17.3-J guruxidagi kelgusi darslar uchun 350000 so\'m yechib olindi!', '2022-07-27 12:51:07', '2022-07-27 12:51:07');
INSERT INTO `actions` VALUES (323, 313, 405000, 'payment', '1', 'Talabaning xisobi 405000 so\'mga Naqt orqali Temur tomonidan to\'ldirildi!', '2022-07-27 12:52:40', '2022-07-27 12:52:40');
INSERT INTO `actions` VALUES (324, 312, 300000, 'payment', '1', 'Talabaning xisobi 300000 so\'mga Bank kartasi orqali Temur tomonidan to\'ldirildi!', '2022-07-27 12:53:35', '2022-07-27 12:53:35');
INSERT INTO `actions` VALUES (325, 126, 400000, 'payment', '1', 'Talabaning xisobi 400000 so\'mga Click/Payme/... orqali Temur tomonidan to\'ldirildi!', '2022-07-27 13:01:48', '2022-07-27 13:01:48');

-- ----------------------------
-- Table structure for attachmentable
-- ----------------------------
DROP TABLE IF EXISTS `attachmentable`;
CREATE TABLE `attachmentable`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `attachmentable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachmentable_id` int(10) UNSIGNED NOT NULL,
  `attachment_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `attachmentable_attachmentable_type_attachmentable_id_index`(`attachmentable_type`, `attachmentable_id`) USING BTREE,
  INDEX `attachmentable_attachment_id_foreign`(`attachment_id`) USING BTREE,
  CONSTRAINT `attachmentable_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of attachmentable
-- ----------------------------

-- ----------------------------
-- Table structure for attachments
-- ----------------------------
DROP TABLE IF EXISTS `attachments`;
CREATE TABLE `attachments`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `size` bigint(20) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `alt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `hash` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of attachments
-- ----------------------------

-- ----------------------------
-- Table structure for attandances
-- ----------------------------
DROP TABLE IF EXISTS `attandances`;
CREATE TABLE `attandances`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attand` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 191 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of attandances
-- ----------------------------
INSERT INTO `attandances` VALUES (143, 109, 19, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (144, 109, 20, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (145, 109, 21, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (146, 109, 22, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (147, 109, 23, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (148, 109, 24, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (149, 109, 25, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (150, 109, 26, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (151, 109, 27, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (152, 109, 28, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (153, 109, 29, 1, '2022-07-27 11:32:55', '2022-07-27 11:32:55');
INSERT INTO `attandances` VALUES (154, 110, 105, 1, '2022-07-27 11:58:40', '2022-07-27 11:58:40');
INSERT INTO `attandances` VALUES (155, 110, 106, 1, '2022-07-27 11:58:40', '2022-07-27 11:58:40');
INSERT INTO `attandances` VALUES (156, 110, 107, 1, '2022-07-27 11:58:40', '2022-07-27 11:58:40');
INSERT INTO `attandances` VALUES (157, 110, 108, 0, '2022-07-27 11:58:40', '2022-07-27 11:59:10');
INSERT INTO `attandances` VALUES (158, 110, 109, 1, '2022-07-27 11:58:40', '2022-07-27 11:58:40');
INSERT INTO `attandances` VALUES (159, 110, 110, 1, '2022-07-27 11:58:40', '2022-07-27 11:58:40');
INSERT INTO `attandances` VALUES (160, 111, 111, 1, '2022-07-27 12:02:57', '2022-07-27 12:02:57');
INSERT INTO `attandances` VALUES (161, 111, 112, 1, '2022-07-27 12:02:57', '2022-07-27 12:02:57');
INSERT INTO `attandances` VALUES (162, 111, 113, 1, '2022-07-27 12:02:57', '2022-07-27 12:02:57');
INSERT INTO `attandances` VALUES (163, 111, 114, 1, '2022-07-27 12:02:57', '2022-07-27 12:02:57');
INSERT INTO `attandances` VALUES (164, 111, 115, 1, '2022-07-27 12:02:57', '2022-07-27 12:02:57');
INSERT INTO `attandances` VALUES (165, 112, 167, 1, '2022-07-27 12:10:34', '2022-07-27 12:10:34');
INSERT INTO `attandances` VALUES (166, 112, 168, 1, '2022-07-27 12:10:34', '2022-07-27 12:10:34');
INSERT INTO `attandances` VALUES (167, 112, 169, 1, '2022-07-27 12:10:34', '2022-07-27 12:10:34');
INSERT INTO `attandances` VALUES (168, 112, 170, 1, '2022-07-27 12:10:34', '2022-07-27 12:10:34');
INSERT INTO `attandances` VALUES (169, 112, 171, 1, '2022-07-27 12:10:34', '2022-07-27 12:10:34');
INSERT INTO `attandances` VALUES (170, 112, 172, 1, '2022-07-27 12:10:34', '2022-07-27 12:10:34');
INSERT INTO `attandances` VALUES (171, 112, 173, 1, '2022-07-27 12:10:34', '2022-07-27 12:10:34');
INSERT INTO `attandances` VALUES (172, 112, 174, 1, '2022-07-27 12:10:34', '2022-07-27 12:10:34');
INSERT INTO `attandances` VALUES (173, 113, 219, 1, '2022-07-30 14:17:28', '2022-07-30 14:17:28');
INSERT INTO `attandances` VALUES (174, 113, 220, 1, '2022-07-30 14:17:28', '2022-07-30 14:17:28');
INSERT INTO `attandances` VALUES (175, 113, 221, 1, '2022-07-30 14:17:28', '2022-07-30 14:17:28');
INSERT INTO `attandances` VALUES (176, 113, 222, 1, '2022-07-30 14:17:28', '2022-07-30 14:17:28');
INSERT INTO `attandances` VALUES (177, 113, 223, 1, '2022-07-30 14:17:28', '2022-07-30 14:17:28');
INSERT INTO `attandances` VALUES (178, 114, 111, 1, '2022-07-31 16:23:36', '2022-07-31 16:23:36');
INSERT INTO `attandances` VALUES (179, 114, 112, 1, '2022-07-31 16:23:37', '2022-07-31 16:23:37');
INSERT INTO `attandances` VALUES (180, 114, 113, 1, '2022-07-31 16:23:37', '2022-07-31 16:23:37');
INSERT INTO `attandances` VALUES (181, 114, 114, 1, '2022-07-31 16:23:37', '2022-07-31 16:23:37');
INSERT INTO `attandances` VALUES (182, 114, 115, 1, '2022-07-31 16:23:37', '2022-07-31 16:23:37');
INSERT INTO `attandances` VALUES (183, 115, 277, 1, '2022-07-31 16:23:38', '2022-07-31 16:23:38');
INSERT INTO `attandances` VALUES (184, 116, 277, 1, '2022-07-31 16:23:39', '2022-07-31 16:23:39');
INSERT INTO `attandances` VALUES (185, 115, 278, 1, '2022-07-31 16:23:39', '2022-07-31 16:23:39');
INSERT INTO `attandances` VALUES (186, 116, 278, 1, '2022-07-31 16:23:39', '2022-07-31 16:23:39');
INSERT INTO `attandances` VALUES (187, 115, 279, 1, '2022-07-31 16:23:39', '2022-07-31 16:23:39');
INSERT INTO `attandances` VALUES (188, 116, 279, 1, '2022-07-31 16:23:39', '2022-07-31 16:23:39');
INSERT INTO `attandances` VALUES (189, 115, 280, 1, '2022-07-31 16:23:39', '2022-07-31 16:23:39');
INSERT INTO `attandances` VALUES (190, 116, 280, 1, '2022-07-31 16:23:39', '2022-07-31 16:23:39');

-- ----------------------------
-- Table structure for branches
-- ----------------------------
DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of branches
-- ----------------------------
INSERT INTO `branches` VALUES (3, 'Saxovat talim (Main)', 'monthly', NULL, '2022-07-24 02:32:13', '2022-07-24 02:33:38');

-- ----------------------------
-- Table structure for discounts
-- ----------------------------
DROP TABLE IF EXISTS `discounts`;
CREATE TABLE `discounts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of discounts
-- ----------------------------
INSERT INTO `discounts` VALUES (7, 312, 100000, 'group', '2022-07-27 12:51:07', '2022-07-27 12:51:07');

-- ----------------------------
-- Table structure for expenses
-- ----------------------------
DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `teacher_id` int(11) NULL DEFAULT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of expenses
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for group_rooms
-- ----------------------------
DROP TABLE IF EXISTS `group_rooms`;
CREATE TABLE `group_rooms`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `time` double(8, 2) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 82 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of group_rooms
-- ----------------------------
INSERT INTO `group_rooms` VALUES (37, 56, 1, 10.30, 90, '2022-07-24 22:03:18', '2022-07-24 22:03:18');
INSERT INTO `group_rooms` VALUES (38, 28, 1, 14.00, 90, '2022-07-24 22:04:54', '2022-07-24 22:04:54');
INSERT INTO `group_rooms` VALUES (39, 31, 1, 16.00, 90, '2022-07-24 22:05:39', '2022-07-24 22:05:39');
INSERT INTO `group_rooms` VALUES (40, 32, 1, 17.30, 90, '2022-07-24 22:06:05', '2022-07-24 22:06:05');
INSERT INTO `group_rooms` VALUES (41, 45, 1, 9.00, 90, '2022-07-24 22:09:09', '2022-07-24 22:09:09');
INSERT INTO `group_rooms` VALUES (42, 46, 1, 10.30, 90, '2022-07-24 22:51:51', '2022-07-24 22:51:51');
INSERT INTO `group_rooms` VALUES (43, 24, 1, 18.00, 90, '2022-07-24 22:56:45', '2022-07-24 22:56:45');
INSERT INTO `group_rooms` VALUES (44, 30, 1, 18.30, 90, '2022-07-24 22:58:22', '2022-07-24 22:58:22');
INSERT INTO `group_rooms` VALUES (45, 27, 2, 9.00, 90, '2022-07-24 23:04:11', '2022-07-24 23:04:11');
INSERT INTO `group_rooms` VALUES (46, 52, 2, 14.00, 90, '2022-07-24 23:05:09', '2022-07-24 23:05:09');
INSERT INTO `group_rooms` VALUES (47, 29, 2, 17.00, 90, '2022-07-24 23:12:46', '2022-07-24 23:12:46');
INSERT INTO `group_rooms` VALUES (48, 50, 2, 9.00, 90, '2022-07-24 23:14:56', '2022-07-24 23:14:56');
INSERT INTO `group_rooms` VALUES (49, 33, 2, 10.30, 90, '2022-07-24 23:15:56', '2022-07-24 23:15:56');
INSERT INTO `group_rooms` VALUES (50, 35, 2, 17.30, 90, '2022-07-24 23:20:03', '2022-07-24 23:20:03');
INSERT INTO `group_rooms` VALUES (51, 41, 3, 9.00, 90, '2022-07-24 23:24:35', '2022-07-24 23:24:35');
INSERT INTO `group_rooms` VALUES (52, 42, 3, 10.30, 90, '2022-07-24 23:25:01', '2022-07-24 23:25:01');
INSERT INTO `group_rooms` VALUES (53, 58, 3, 15.00, 60, '2022-07-24 23:29:54', '2022-07-24 23:29:54');
INSERT INTO `group_rooms` VALUES (54, 57, 3, 16.00, 90, '2022-07-24 23:30:31', '2022-07-24 23:30:31');
INSERT INTO `group_rooms` VALUES (55, 23, 3, 19.00, 60, '2022-07-24 23:33:25', '2022-07-24 23:33:25');
INSERT INTO `group_rooms` VALUES (56, 20, 3, 9.30, 120, '2022-07-24 23:40:11', '2022-07-24 23:40:11');
INSERT INTO `group_rooms` VALUES (57, 48, 3, 16.30, 90, '2022-07-24 23:41:58', '2022-07-24 23:41:58');
INSERT INTO `group_rooms` VALUES (60, 49, 3, 18.00, 90, '2022-07-24 23:44:17', '2022-07-24 23:44:17');
INSERT INTO `group_rooms` VALUES (61, 36, 4, 9.00, 90, '2022-07-24 23:45:00', '2022-07-24 23:45:00');
INSERT INTO `group_rooms` VALUES (62, 37, 4, 10.30, 60, '2022-07-24 23:48:08', '2022-07-24 23:48:08');
INSERT INTO `group_rooms` VALUES (63, 61, 4, 11.30, 60, '2022-07-24 23:48:46', '2022-07-24 23:48:46');
INSERT INTO `group_rooms` VALUES (64, 59, 4, 14.00, 90, '2022-07-24 23:49:18', '2022-07-24 23:49:18');
INSERT INTO `group_rooms` VALUES (65, 43, 4, 15.30, 90, '2022-07-24 23:49:58', '2022-07-24 23:49:58');
INSERT INTO `group_rooms` VALUES (66, 44, 4, 17.00, 90, '2022-07-24 23:50:34', '2022-07-24 23:50:34');
INSERT INTO `group_rooms` VALUES (67, 51, 4, 18.30, 90, '2022-07-24 23:51:15', '2022-07-24 23:51:15');
INSERT INTO `group_rooms` VALUES (68, 40, 4, 9.00, 90, '2022-07-24 23:51:49', '2022-07-24 23:51:49');
INSERT INTO `group_rooms` VALUES (69, 38, 4, 10.30, 90, '2022-07-24 23:52:45', '2022-07-24 23:52:45');
INSERT INTO `group_rooms` VALUES (70, 34, 4, 14.30, 90, '2022-07-24 23:53:12', '2022-07-24 23:53:12');
INSERT INTO `group_rooms` VALUES (71, 39, 4, 16.00, 90, '2022-07-24 23:54:52', '2022-07-24 23:54:52');
INSERT INTO `group_rooms` VALUES (72, 14, 5, 9.00, 90, '2022-07-25 00:02:37', '2022-07-25 00:02:37');
INSERT INTO `group_rooms` VALUES (73, 15, 5, 10.30, 90, '2022-07-25 00:03:02', '2022-07-25 00:03:02');
INSERT INTO `group_rooms` VALUES (74, 16, 5, 14.00, 90, '2022-07-25 00:03:28', '2022-07-25 00:03:28');
INSERT INTO `group_rooms` VALUES (75, 17, 5, 15.30, 90, '2022-07-25 00:03:49', '2022-07-25 00:03:49');
INSERT INTO `group_rooms` VALUES (76, 18, 5, 17.00, 90, '2022-07-25 00:04:13', '2022-07-25 00:04:13');
INSERT INTO `group_rooms` VALUES (77, 47, 5, 18.30, 90, '2022-07-25 00:04:47', '2022-07-25 00:04:47');
INSERT INTO `group_rooms` VALUES (78, 60, 5, 9.00, 90, '2022-07-25 00:05:29', '2022-07-25 00:05:29');
INSERT INTO `group_rooms` VALUES (79, 54, 5, 14.30, 90, '2022-07-25 00:06:23', '2022-07-25 00:06:23');
INSERT INTO `group_rooms` VALUES (80, 53, 5, 16.00, 90, '2022-07-25 00:06:46', '2022-07-25 00:06:46');
INSERT INTO `group_rooms` VALUES (81, 55, 5, 17.30, 90, '2022-07-25 00:07:13', '2022-07-25 00:07:13');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `day_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `is_active` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 62 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (14, 'Miss Maxfuza 9.0-T', 9, 7, NULL, 'odd', '2022-07-24 03:03:41', '2022-07-24 03:06:03', 3, 1);
INSERT INTO `groups` VALUES (15, 'Miss Maxfuza 10.3-T', 9, 7, NULL, 'odd', '2022-07-24 03:06:39', '2022-07-24 03:06:39', 3, 1);
INSERT INTO `groups` VALUES (16, 'Miss Maxfuza 14.0-T', 9, 7, NULL, 'odd', '2022-07-24 03:07:46', '2022-07-24 03:07:46', 3, 1);
INSERT INTO `groups` VALUES (17, 'Miss Maxfuza 15.3-T', 9, 7, NULL, 'odd', '2022-07-24 03:08:32', '2022-07-24 03:08:32', 3, 1);
INSERT INTO `groups` VALUES (18, 'Miss Maxfuza 17.0-T', 9, 7, NULL, 'odd', '2022-07-24 03:09:35', '2022-07-24 03:09:35', 3, 1);
INSERT INTO `groups` VALUES (19, 'Mr Yoldosh 8.0-T', 9, 8, NULL, 'odd', '2022-07-24 03:11:21', '2022-07-24 03:11:21', 3, 1);
INSERT INTO `groups` VALUES (20, 'Mr Yoldosh 9.3-J', 9, 8, NULL, 'even', '2022-07-24 03:12:36', '2022-07-24 03:13:55', 3, 1);
INSERT INTO `groups` VALUES (21, 'Mr Yoldosh 15.3-J', 16, 8, NULL, 'even', '2022-07-24 03:14:47', '2022-07-27 03:15:34', 3, 1);
INSERT INTO `groups` VALUES (22, 'Mr Yoldosh 16.3-J', 16, 8, NULL, 'even', '2022-07-24 03:16:19', '2022-07-27 03:15:11', 3, 1);
INSERT INTO `groups` VALUES (23, 'Mr Yoldosh 19.0-T', 16, 8, NULL, 'odd', '2022-07-24 03:18:52', '2022-07-27 03:14:52', 3, 1);
INSERT INTO `groups` VALUES (24, 'Mr Yoldosh 18.0-J', 9, 8, NULL, 'even', '2022-07-24 03:20:31', '2022-07-24 03:20:31', 3, 1);
INSERT INTO `groups` VALUES (25, 'Mr Yoldosh 19.3-J', 9, 8, NULL, 'even', '2022-07-24 03:21:19', '2022-07-24 03:22:49', 3, 1);
INSERT INTO `groups` VALUES (26, 'Mr Yoldosh 20.0-T', 9, 8, NULL, 'odd', '2022-07-24 03:24:05', '2022-07-24 03:24:05', 3, 1);
INSERT INTO `groups` VALUES (27, 'Mr Farux 9.0-T', 9, 9, NULL, 'odd', '2022-07-24 03:25:29', '2022-07-24 03:25:29', 3, 1);
INSERT INTO `groups` VALUES (28, 'Mr Farux 14.0-T', 9, 9, NULL, 'odd', '2022-07-24 03:26:25', '2022-07-24 03:26:25', 3, 1);
INSERT INTO `groups` VALUES (29, 'Mr Farux 17.0-T', 9, 9, NULL, 'odd', '2022-07-24 03:27:37', '2022-07-24 03:27:37', 3, 1);
INSERT INTO `groups` VALUES (30, 'Mr Farux 18.3-J', 9, 9, NULL, 'even', '2022-07-24 03:28:35', '2022-07-24 03:28:35', 3, 1);
INSERT INTO `groups` VALUES (31, 'Mr Temur 16.0-T', 8, 23, NULL, 'odd', '2022-07-24 03:33:12', '2022-07-24 03:33:12', 3, 1);
INSERT INTO `groups` VALUES (32, 'Mr Temur 17.3-T', 8, 23, NULL, 'odd', '2022-07-24 03:34:10', '2022-07-24 03:34:10', 3, 1);
INSERT INTO `groups` VALUES (33, 'Mr Temur 10.3-J', 8, 23, NULL, 'even', '2022-07-24 03:34:57', '2022-07-24 03:34:57', 3, 1);
INSERT INTO `groups` VALUES (34, 'Mr Temur 14.3-J', 8, 23, NULL, 'even', '2022-07-24 03:35:59', '2022-07-24 03:45:33', 3, 1);
INSERT INTO `groups` VALUES (35, 'Mr Temur 17.3-J', 8, 23, NULL, 'even', '2022-07-24 03:36:38', '2022-07-24 03:36:38', 3, 1);
INSERT INTO `groups` VALUES (36, 'Miss Soxiba 9.0-T', 8, 10, NULL, 'odd', '2022-07-24 03:37:39', '2022-07-24 03:37:39', 3, 1);
INSERT INTO `groups` VALUES (37, 'Miss Soxiba 10.3-T', 8, 10, NULL, 'odd', '2022-07-24 03:38:10', '2022-07-24 03:45:09', 3, 1);
INSERT INTO `groups` VALUES (38, 'Miss Soxiba 10.3-J', 8, 10, NULL, 'even', '2022-07-24 03:39:45', '2022-07-24 03:39:45', 3, 1);
INSERT INTO `groups` VALUES (39, 'Miss Soxiba 16.0-J', 8, 10, NULL, 'even', '2022-07-24 03:41:03', '2022-07-24 03:41:03', 3, 1);
INSERT INTO `groups` VALUES (40, 'Miss Shirin 9.0-J', 9, 11, NULL, 'even', '2022-07-24 03:42:21', '2022-07-24 03:44:35', 3, 1);
INSERT INTO `groups` VALUES (41, 'Miss Shirin 9.0-T', 9, 11, NULL, 'odd', '2022-07-24 03:43:15', '2022-07-24 03:44:17', 3, 1);
INSERT INTO `groups` VALUES (42, 'Miss Shirin 10.3-T', 9, 11, NULL, 'odd', '2022-07-24 03:46:34', '2022-07-24 03:46:34', 3, 1);
INSERT INTO `groups` VALUES (43, 'Miss Shirin 15.3-T', 9, 11, NULL, 'odd', '2022-07-24 03:47:44', '2022-07-24 03:47:44', 3, 1);
INSERT INTO `groups` VALUES (44, 'Miss Shirin 17.0-T', 9, 11, NULL, 'odd', '2022-07-24 03:48:33', '2022-07-24 03:48:54', 3, 1);
INSERT INTO `groups` VALUES (45, 'Miss Durdona 9.0-J', 8, 12, NULL, 'even', '2022-07-24 03:50:35', '2022-07-24 03:50:35', 3, 1);
INSERT INTO `groups` VALUES (46, 'Miss Durdona 10.3-J', 8, 12, NULL, 'even', '2022-07-24 03:52:23', '2022-07-24 03:52:23', 3, 1);
INSERT INTO `groups` VALUES (47, 'Mr Elshod 18.3-T', 10, 13, NULL, 'odd', '2022-07-24 03:55:03', '2022-07-24 03:55:03', 3, 1);
INSERT INTO `groups` VALUES (48, 'Miss Komila 16.3-J', 8, 14, NULL, 'even', '2022-07-24 03:56:47', '2022-07-24 03:56:47', 3, 1);
INSERT INTO `groups` VALUES (49, 'Miss Komila 18.0-J', 8, 14, NULL, 'even', '2022-07-24 03:58:23', '2022-07-24 03:58:23', 3, 1);
INSERT INTO `groups` VALUES (50, 'Miss Komila 9.0-J', 8, 14, NULL, 'even', '2022-07-24 03:59:45', '2022-07-24 03:59:45', 3, 1);
INSERT INTO `groups` VALUES (51, 'Miss Robiya 18.3-T', 9, 15, NULL, 'odd', '2022-07-24 04:01:43', '2022-07-24 04:01:43', 3, 1);
INSERT INTO `groups` VALUES (52, 'Miss Pokiza 14.0-T ', 11, 16, NULL, 'odd', '2022-07-24 15:18:48', '2022-07-24 15:18:48', 3, 1);
INSERT INTO `groups` VALUES (53, 'Miss Pokiza 16.0-J', 11, 16, NULL, 'even', '2022-07-24 15:19:48', '2022-07-24 15:19:48', 3, 1);
INSERT INTO `groups` VALUES (54, 'Miss Pokiza 14.3-J', 11, 16, NULL, 'even', '2022-07-24 15:20:54', '2022-07-24 15:20:54', 3, 1);
INSERT INTO `groups` VALUES (55, 'Miss Pokiza 17.3-J', 11, 16, NULL, 'even', '2022-07-24 15:22:38', '2022-07-24 15:22:38', 3, 1);
INSERT INTO `groups` VALUES (56, 'Miss Sayyora 10.3-T', 13, 17, NULL, 'odd', '2022-07-24 15:29:54', '2022-07-24 15:29:54', 3, 1);
INSERT INTO `groups` VALUES (57, 'Miss Ro\'za 16.0-T', 12, 18, NULL, 'odd', '2022-07-24 15:31:56', '2022-07-24 15:31:56', 3, 1);
INSERT INTO `groups` VALUES (58, 'Miss Ro\'za 15.0-T', 19, 18, NULL, 'odd', '2022-07-24 15:37:01', '2022-07-27 03:14:01', 3, 1);
INSERT INTO `groups` VALUES (59, 'Miss Shirin 14.0-T', 9, 11, NULL, 'odd', '2022-07-24 15:41:33', '2022-07-24 15:41:33', 3, 1);
INSERT INTO `groups` VALUES (60, 'Mr Maruf 9.0-J', 9, 20, NULL, 'even', '2022-07-24 15:43:14', '2022-07-24 15:43:14', 3, 1);
INSERT INTO `groups` VALUES (61, 'Miss Shahzoda 11.3-T', 9, 21, NULL, 'odd', '2022-07-24 15:50:12', '2022-07-24 15:50:12', 3, 1);

-- ----------------------------
-- Table structure for lessons
-- ----------------------------
DROP TABLE IF EXISTS `lessons`;
CREATE TABLE `lessons`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `group_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `finish` tinyint(1) NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of lessons
-- ----------------------------

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES (1, 'for_payment_info', 'Talaba uchun oyni oxirida to\'lanadigan sms xabar matni', 'O\'qish uchun to\'lov muddati keldi, tolovni tezroq amalga oshirishingizni soraymiz. Saxovat ta\'lim');
INSERT INTO `messages` VALUES (2, 'not_attand', 'Talaba darsga kelmagan vaqtda boradigan sms', 'Farzandingiz: @name  bugungi darsga kelmadi!  Xurmat bilan Saxovat ta\'lim');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2015_04_12_000000_create_orchid_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2015_10_19_214424_create_orchid_roles_table', 1);
INSERT INTO `migrations` VALUES (5, '2015_10_19_214425_create_orchid_role_users_table', 1);
INSERT INTO `migrations` VALUES (6, '2016_08_07_125128_create_orchid_attachmentstable_table', 1);
INSERT INTO `migrations` VALUES (7, '2017_09_17_125801_create_notifications_table', 1);
INSERT INTO `migrations` VALUES (8, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (9, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_05_28_153720_create_branches_table', 2);
INSERT INTO `migrations` VALUES (11, '2022_05_28_183522_create_subjects_table', 3);
INSERT INTO `migrations` VALUES (12, '2022_05_29_093504_create_groups_table', 4);
INSERT INTO `migrations` VALUES (13, '2022_05_29_115053_create_sources_table', 5);
INSERT INTO `migrations` VALUES (14, '2022_05_29_122110_create_students_table', 6);
INSERT INTO `migrations` VALUES (15, '2022_05_31_063523_create_student_groups_table', 7);
INSERT INTO `migrations` VALUES (17, '2022_06_01_115420_create_payments_table', 8);
INSERT INTO `migrations` VALUES (18, '2022_06_04_084001_create_red_days_table', 9);
INSERT INTO `migrations` VALUES (19, '2022_06_09_080030_create_lessons_table', 10);
INSERT INTO `migrations` VALUES (20, '2022_06_09_080050_create_attandances_table', 10);
INSERT INTO `migrations` VALUES (21, '2018_08_08_100000_create_telescope_entries_table', 11);
INSERT INTO `migrations` VALUES (23, '2022_06_24_095718_create_messages_table', 12);
INSERT INTO `migrations` VALUES (24, '2022_07_10_162551_create_discounts_table', 13);
INSERT INTO `migrations` VALUES (29, '2022_07_10_162602_create_actions_table', 14);
INSERT INTO `migrations` VALUES (30, '2022_07_11_183101_create_expenses_table', 14);
INSERT INTO `migrations` VALUES (31, '2022_07_17_201228_create_rooms_table', 14);
INSERT INTO `migrations` VALUES (33, '2022_07_17_201242_create_group_rooms_table', 15);
INSERT INTO `migrations` VALUES (35, '2022_07_19_145307_create_teachers_table', 16);
INSERT INTO `migrations` VALUES (36, '2022_07_26_133738_create_temporary_groups_table', 17);

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notifications_notifiable_type_notifiable_id_index`(`notifiable_type`, `notifiable_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'paper',
  `branch_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES (28, 168, 120000, 'paper', 3, '2022-07-27 12:17:19', '2022-07-27 12:17:19');
INSERT INTO `payments` VALUES (29, 313, 405000, 'paper', 3, '2022-07-27 12:52:40', '2022-07-27 12:52:40');
INSERT INTO `payments` VALUES (30, 312, 300000, 'card', 3, '2022-07-27 12:53:35', '2022-07-27 12:53:35');
INSERT INTO `payments` VALUES (31, 126, 400000, 'digital', 3, '2022-07-27 13:01:48', '2022-07-27 13:01:48');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`) USING BTREE,
  INDEX `role_users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` json NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'main_director', 'Bosh Direktor', '{\"platform.index\": \"1\", \"platform.groups\": \"0\", \"platform.sources\": \"1\", \"platform.branches\": \"1\", \"platform.students\": \"0\", \"platform.subjects\": \"0\", \"platform.payments.list\": \"1\", \"platform.systems.roles\": \"0\", \"platform.systems.users\": \"1\", \"platform.addStudentToGroup\": \"0\", \"platform.systems.attachment\": \"1\"}', '2022-06-03 10:41:20', '2022-06-03 10:41:20');
INSERT INTO `roles` VALUES (2, 'branch_director', 'Filial Direktor', '{\"platform.index\": \"1\", \"platform.groups\": \"0\", \"platform.redDays\": \"1\", \"platform.sources\": \"1\", \"platform.branches\": \"0\", \"platform.students\": \"0\", \"platform.subjects\": \"0\", \"platform.payments.list\": \"1\", \"platform.systems.roles\": \"0\", \"platform.systems.users\": \"1\", \"platform.addStudentToGroup\": \"0\", \"platform.systems.attachment\": \"1\"}', '2022-06-03 10:42:57', '2022-06-04 19:43:01');
INSERT INTO `roles` VALUES (3, 'branch_admin', 'Filial Administrator', '{\"platform.index\": \"1\", \"platform.groups\": \"1\", \"platform.sources\": \"1\", \"platform.branches\": \"0\", \"platform.students\": \"1\", \"platform.subjects\": \"1\", \"platform.payments.list\": \"1\", \"platform.systems.roles\": \"0\", \"platform.systems.users\": \"0\", \"platform.addStudentToGroup\": \"1\", \"platform.systems.attachment\": \"1\"}', '2022-06-03 11:33:18', '2022-06-03 11:33:18');
INSERT INTO `roles` VALUES (4, 'teacher', 'O\'qituvchi', '{\"platform.index\": \"1\", \"platform.groups\": \"0\", \"platform.sources\": \"0\", \"platform.branches\": \"0\", \"platform.students\": \"0\", \"platform.subjects\": \"0\", \"platform.payments.list\": \"0\", \"platform.systems.roles\": \"0\", \"platform.systems.users\": \"0\", \"platform.addStudentToGroup\": \"0\", \"platform.systems.attachment\": \"1\"}', '2022-06-03 11:33:53', '2022-06-03 11:33:53');

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES (1, 3, '1-Xona', '2022-07-24 21:46:03', '2022-07-24 21:46:03');
INSERT INTO `rooms` VALUES (2, 3, '2-Xona', '2022-07-24 21:46:14', '2022-07-24 21:46:14');
INSERT INTO `rooms` VALUES (3, 3, '3-Xona', '2022-07-24 21:46:24', '2022-07-24 21:46:24');
INSERT INTO `rooms` VALUES (4, 3, '4-Xona', '2022-07-24 21:46:36', '2022-07-24 21:46:36');
INSERT INTO `rooms` VALUES (5, 3, '5-Xona', '2022-07-24 21:46:48', '2022-07-24 21:46:48');

-- ----------------------------
-- Table structure for sources
-- ----------------------------
DROP TABLE IF EXISTS `sources`;
CREATE TABLE `sources`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sources
-- ----------------------------
INSERT INTO `sources` VALUES (6, 'Xar-xil', NULL, '2022-07-24 20:13:42', '2022-07-24 20:13:42');

-- ----------------------------
-- Table structure for student_groups
-- ----------------------------
DROP TABLE IF EXISTS `student_groups`;
CREATE TABLE `student_groups`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `lesson_limit` int(11) NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 314 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of student_groups
-- ----------------------------
INSERT INTO `student_groups` VALUES (1, 1, 14, 12, '2022-07-24 20:46:58', '2022-07-24 20:46:58', NULL);
INSERT INTO `student_groups` VALUES (2, 2, 14, 12, '2022-07-24 20:46:59', '2022-07-24 20:46:59', NULL);
INSERT INTO `student_groups` VALUES (3, 3, 14, 12, '2022-07-24 20:46:59', '2022-07-24 20:46:59', NULL);
INSERT INTO `student_groups` VALUES (4, 4, 14, 12, '2022-07-24 20:46:59', '2022-07-24 20:46:59', NULL);
INSERT INTO `student_groups` VALUES (5, 5, 14, 12, '2022-07-24 20:46:59', '2022-07-24 20:46:59', NULL);
INSERT INTO `student_groups` VALUES (6, 6, 14, 12, '2022-07-24 20:46:59', '2022-07-24 20:46:59', NULL);
INSERT INTO `student_groups` VALUES (7, 7, 14, 12, '2022-07-24 20:47:00', '2022-07-24 20:47:00', NULL);
INSERT INTO `student_groups` VALUES (8, 8, 14, 12, '2022-07-24 20:47:00', '2022-07-24 20:47:00', NULL);
INSERT INTO `student_groups` VALUES (9, 9, 14, 12, '2022-07-24 20:47:00', '2022-07-24 20:47:00', NULL);
INSERT INTO `student_groups` VALUES (10, 10, 14, 12, '2022-07-24 20:47:00', '2022-07-24 20:47:00', NULL);
INSERT INTO `student_groups` VALUES (11, 11, 14, 12, '2022-07-24 20:47:00', '2022-07-24 20:47:00', NULL);
INSERT INTO `student_groups` VALUES (12, 12, 14, 12, '2022-07-24 20:47:01', '2022-07-24 20:47:01', NULL);
INSERT INTO `student_groups` VALUES (13, 13, 14, 12, '2022-07-24 20:47:01', '2022-07-24 20:47:01', NULL);
INSERT INTO `student_groups` VALUES (14, 14, 14, 12, '2022-07-24 20:47:01', '2022-07-24 20:47:01', NULL);
INSERT INTO `student_groups` VALUES (15, 15, 14, 12, '2022-07-24 20:47:01', '2022-07-24 20:47:01', NULL);
INSERT INTO `student_groups` VALUES (16, 16, 14, 12, '2022-07-24 20:47:01', '2022-07-24 20:47:01', NULL);
INSERT INTO `student_groups` VALUES (17, 17, 14, 12, '2022-07-24 20:47:02', '2022-07-24 20:47:02', NULL);
INSERT INTO `student_groups` VALUES (18, 18, 14, 12, '2022-07-24 20:47:02', '2022-07-24 20:47:02', NULL);
INSERT INTO `student_groups` VALUES (19, 19, 15, 12, '2022-07-24 20:47:02', '2022-07-24 20:47:02', NULL);
INSERT INTO `student_groups` VALUES (20, 20, 15, 12, '2022-07-24 20:47:02', '2022-07-24 20:47:02', NULL);
INSERT INTO `student_groups` VALUES (21, 21, 15, 12, '2022-07-24 20:47:03', '2022-07-24 20:47:03', NULL);
INSERT INTO `student_groups` VALUES (22, 22, 15, 12, '2022-07-24 20:47:03', '2022-07-24 20:47:03', NULL);
INSERT INTO `student_groups` VALUES (23, 23, 15, 12, '2022-07-24 20:47:03', '2022-07-24 20:47:03', NULL);
INSERT INTO `student_groups` VALUES (24, 24, 15, 12, '2022-07-24 20:47:03', '2022-07-24 20:47:03', NULL);
INSERT INTO `student_groups` VALUES (25, 25, 15, 12, '2022-07-24 20:47:03', '2022-07-24 20:47:03', NULL);
INSERT INTO `student_groups` VALUES (26, 26, 15, 12, '2022-07-24 20:47:04', '2022-07-24 20:47:04', NULL);
INSERT INTO `student_groups` VALUES (27, 27, 15, 12, '2022-07-24 20:47:04', '2022-07-24 20:47:04', NULL);
INSERT INTO `student_groups` VALUES (28, 28, 15, 12, '2022-07-24 20:47:04', '2022-07-24 20:47:04', NULL);
INSERT INTO `student_groups` VALUES (29, 29, 15, 12, '2022-07-24 20:47:04', '2022-07-24 20:47:04', NULL);
INSERT INTO `student_groups` VALUES (30, 30, 16, 12, '2022-07-24 20:47:04', '2022-07-24 20:47:04', NULL);
INSERT INTO `student_groups` VALUES (31, 31, 16, 12, '2022-07-24 20:47:05', '2022-07-24 20:47:05', NULL);
INSERT INTO `student_groups` VALUES (32, 32, 16, 12, '2022-07-24 20:47:05', '2022-07-24 20:47:05', NULL);
INSERT INTO `student_groups` VALUES (33, 33, 16, 12, '2022-07-24 20:47:05', '2022-07-24 20:47:05', NULL);
INSERT INTO `student_groups` VALUES (34, 34, 16, 12, '2022-07-24 20:47:05', '2022-07-24 20:47:05', NULL);
INSERT INTO `student_groups` VALUES (35, 35, 16, 12, '2022-07-24 20:47:05', '2022-07-24 20:47:05', NULL);
INSERT INTO `student_groups` VALUES (36, 36, 16, 12, '2022-07-24 20:47:06', '2022-07-24 20:47:06', NULL);
INSERT INTO `student_groups` VALUES (37, 37, 16, 12, '2022-07-24 20:47:06', '2022-07-24 20:47:06', NULL);
INSERT INTO `student_groups` VALUES (38, 38, 16, 12, '2022-07-24 20:47:06', '2022-07-24 20:47:06', NULL);
INSERT INTO `student_groups` VALUES (39, 39, 16, 12, '2022-07-24 20:47:06', '2022-07-24 20:47:06', NULL);
INSERT INTO `student_groups` VALUES (40, 40, 16, 12, '2022-07-24 20:47:06', '2022-07-24 20:47:06', NULL);
INSERT INTO `student_groups` VALUES (41, 41, 16, 12, '2022-07-24 20:47:07', '2022-07-24 20:47:07', NULL);
INSERT INTO `student_groups` VALUES (42, 42, 16, 12, '2022-07-24 20:47:07', '2022-07-24 20:47:07', NULL);
INSERT INTO `student_groups` VALUES (43, 43, 16, 12, '2022-07-24 20:47:07', '2022-07-24 20:47:07', NULL);
INSERT INTO `student_groups` VALUES (44, 44, 17, 12, '2022-07-24 20:47:07', '2022-07-24 20:47:07', NULL);
INSERT INTO `student_groups` VALUES (45, 45, 17, 12, '2022-07-24 20:47:08', '2022-07-24 20:47:08', NULL);
INSERT INTO `student_groups` VALUES (46, 46, 17, 12, '2022-07-24 20:47:08', '2022-07-24 20:47:08', NULL);
INSERT INTO `student_groups` VALUES (47, 47, 17, 12, '2022-07-24 20:47:08', '2022-07-24 20:47:08', NULL);
INSERT INTO `student_groups` VALUES (48, 48, 17, 12, '2022-07-24 20:47:08', '2022-07-24 20:47:08', NULL);
INSERT INTO `student_groups` VALUES (49, 49, 17, 12, '2022-07-24 20:47:08', '2022-07-24 20:47:08', NULL);
INSERT INTO `student_groups` VALUES (50, 50, 17, 12, '2022-07-24 20:47:09', '2022-07-24 20:47:09', NULL);
INSERT INTO `student_groups` VALUES (51, 51, 17, 12, '2022-07-24 20:47:09', '2022-07-24 20:47:09', NULL);
INSERT INTO `student_groups` VALUES (52, 52, 17, 12, '2022-07-24 20:47:09', '2022-07-24 20:47:09', NULL);
INSERT INTO `student_groups` VALUES (53, 53, 17, 12, '2022-07-24 20:47:09', '2022-07-24 20:47:09', NULL);
INSERT INTO `student_groups` VALUES (54, 54, 17, 12, '2022-07-24 20:47:09', '2022-07-24 20:47:09', NULL);
INSERT INTO `student_groups` VALUES (55, 55, 17, 12, '2022-07-24 20:47:10', '2022-07-24 20:47:10', NULL);
INSERT INTO `student_groups` VALUES (56, 56, 17, 12, '2022-07-24 20:47:10', '2022-07-24 20:47:10', NULL);
INSERT INTO `student_groups` VALUES (57, 57, 17, 12, '2022-07-24 20:47:10', '2022-07-24 20:47:10', NULL);
INSERT INTO `student_groups` VALUES (58, 58, 17, 12, '2022-07-24 20:47:10', '2022-07-24 20:47:10', NULL);
INSERT INTO `student_groups` VALUES (59, 59, 17, 12, '2022-07-24 20:47:10', '2022-07-24 20:47:10', NULL);
INSERT INTO `student_groups` VALUES (60, 60, 18, 12, '2022-07-24 20:47:11', '2022-07-24 20:47:11', NULL);
INSERT INTO `student_groups` VALUES (61, 61, 18, 12, '2022-07-24 20:47:11', '2022-07-24 20:47:11', NULL);
INSERT INTO `student_groups` VALUES (62, 62, 18, 12, '2022-07-24 20:47:11', '2022-07-24 20:47:11', NULL);
INSERT INTO `student_groups` VALUES (63, 63, 18, 12, '2022-07-24 20:47:11', '2022-07-24 20:47:11', NULL);
INSERT INTO `student_groups` VALUES (64, 64, 18, 12, '2022-07-24 20:47:12', '2022-07-24 20:47:12', NULL);
INSERT INTO `student_groups` VALUES (65, 65, 18, 12, '2022-07-24 20:47:12', '2022-07-24 20:47:12', NULL);
INSERT INTO `student_groups` VALUES (66, 66, 18, 12, '2022-07-24 20:47:12', '2022-07-24 20:47:12', NULL);
INSERT INTO `student_groups` VALUES (67, 67, 18, 12, '2022-07-24 20:47:12', '2022-07-24 20:47:12', NULL);
INSERT INTO `student_groups` VALUES (68, 68, 18, 12, '2022-07-24 20:47:12', '2022-07-24 20:47:12', NULL);
INSERT INTO `student_groups` VALUES (69, 69, 18, 12, '2022-07-24 20:47:13', '2022-07-24 20:47:13', NULL);
INSERT INTO `student_groups` VALUES (70, 70, 18, 12, '2022-07-24 20:47:13', '2022-07-24 20:47:13', NULL);
INSERT INTO `student_groups` VALUES (71, 71, 18, 12, '2022-07-24 20:47:13', '2022-07-24 20:47:13', NULL);
INSERT INTO `student_groups` VALUES (72, 72, 18, 12, '2022-07-24 20:47:13', '2022-07-24 20:47:13', NULL);
INSERT INTO `student_groups` VALUES (73, 73, 18, 12, '2022-07-24 20:47:13', '2022-07-24 20:47:13', NULL);
INSERT INTO `student_groups` VALUES (74, 74, 18, 12, '2022-07-24 20:47:14', '2022-07-24 20:47:14', NULL);
INSERT INTO `student_groups` VALUES (75, 75, 18, 12, '2022-07-24 20:47:14', '2022-07-24 20:47:14', NULL);
INSERT INTO `student_groups` VALUES (76, 76, 18, 12, '2022-07-24 20:47:14', '2022-07-24 20:47:14', NULL);
INSERT INTO `student_groups` VALUES (77, 77, 18, 12, '2022-07-24 20:47:14', '2022-07-24 20:47:14', NULL);
INSERT INTO `student_groups` VALUES (78, 78, 19, 12, '2022-07-24 20:47:14', '2022-07-24 20:47:14', NULL);
INSERT INTO `student_groups` VALUES (79, 79, 19, 12, '2022-07-24 20:47:15', '2022-07-24 20:47:15', NULL);
INSERT INTO `student_groups` VALUES (80, 80, 19, 12, '2022-07-24 20:47:15', '2022-07-24 20:47:15', NULL);
INSERT INTO `student_groups` VALUES (81, 81, 19, 12, '2022-07-24 20:47:15', '2022-07-24 20:47:15', NULL);
INSERT INTO `student_groups` VALUES (82, 82, 19, 12, '2022-07-24 20:47:15', '2022-07-24 20:47:15', NULL);
INSERT INTO `student_groups` VALUES (83, 83, 20, 12, '2022-07-24 20:47:16', '2022-07-24 20:47:16', NULL);
INSERT INTO `student_groups` VALUES (84, 84, 20, 12, '2022-07-24 20:47:16', '2022-07-24 20:47:16', NULL);
INSERT INTO `student_groups` VALUES (85, 85, 20, 12, '2022-07-24 20:47:16', '2022-07-24 20:47:16', NULL);
INSERT INTO `student_groups` VALUES (86, 86, 20, 12, '2022-07-24 20:47:16', '2022-07-24 20:47:16', NULL);
INSERT INTO `student_groups` VALUES (87, 87, 20, 12, '2022-07-24 20:47:16', '2022-07-24 20:47:16', NULL);
INSERT INTO `student_groups` VALUES (88, 88, 20, 12, '2022-07-24 20:47:17', '2022-07-24 20:47:17', NULL);
INSERT INTO `student_groups` VALUES (89, 89, 20, 12, '2022-07-24 20:47:17', '2022-07-24 20:47:17', NULL);
INSERT INTO `student_groups` VALUES (90, 90, 20, 12, '2022-07-24 20:47:17', '2022-07-24 20:47:17', NULL);
INSERT INTO `student_groups` VALUES (91, 91, 21, 12, '2022-07-24 20:47:17', '2022-07-24 20:47:17', NULL);
INSERT INTO `student_groups` VALUES (92, 92, 22, 12, '2022-07-24 20:47:17', '2022-07-24 20:47:17', NULL);
INSERT INTO `student_groups` VALUES (93, 93, 23, 12, '2022-07-24 20:47:18', '2022-07-24 20:47:18', NULL);
INSERT INTO `student_groups` VALUES (94, 94, 24, 12, '2022-07-24 20:47:18', '2022-07-24 20:47:18', NULL);
INSERT INTO `student_groups` VALUES (95, 95, 24, 12, '2022-07-24 20:47:18', '2022-07-24 20:47:18', NULL);
INSERT INTO `student_groups` VALUES (96, 96, 24, 12, '2022-07-24 20:47:18', '2022-07-24 20:47:18', NULL);
INSERT INTO `student_groups` VALUES (97, 97, 24, 12, '2022-07-24 20:47:18', '2022-07-24 20:47:18', NULL);
INSERT INTO `student_groups` VALUES (98, 98, 25, 12, '2022-07-24 20:47:19', '2022-07-24 20:47:19', NULL);
INSERT INTO `student_groups` VALUES (99, 99, 25, 12, '2022-07-24 20:47:19', '2022-07-24 20:47:19', NULL);
INSERT INTO `student_groups` VALUES (100, 100, 25, 12, '2022-07-24 20:47:19', '2022-07-24 20:47:19', NULL);
INSERT INTO `student_groups` VALUES (101, 101, 26, 12, '2022-07-24 20:47:19', '2022-07-24 20:47:19', NULL);
INSERT INTO `student_groups` VALUES (102, 102, 26, 12, '2022-07-24 20:47:19', '2022-07-24 20:47:19', NULL);
INSERT INTO `student_groups` VALUES (103, 103, 26, 12, '2022-07-24 20:47:20', '2022-07-24 20:47:20', NULL);
INSERT INTO `student_groups` VALUES (104, 104, 26, 12, '2022-07-24 20:47:20', '2022-07-24 20:47:20', NULL);
INSERT INTO `student_groups` VALUES (105, 105, 27, 12, '2022-07-24 20:47:20', '2022-07-24 20:47:20', NULL);
INSERT INTO `student_groups` VALUES (106, 106, 27, 12, '2022-07-24 20:47:20', '2022-07-24 20:47:20', NULL);
INSERT INTO `student_groups` VALUES (107, 107, 27, 12, '2022-07-24 20:47:21', '2022-07-24 20:47:21', NULL);
INSERT INTO `student_groups` VALUES (108, 108, 27, 12, '2022-07-24 20:47:21', '2022-07-24 20:47:21', NULL);
INSERT INTO `student_groups` VALUES (109, 109, 27, 12, '2022-07-24 20:47:21', '2022-07-24 20:47:21', NULL);
INSERT INTO `student_groups` VALUES (110, 110, 27, 12, '2022-07-24 20:47:21', '2022-07-24 20:47:21', NULL);
INSERT INTO `student_groups` VALUES (111, 111, 28, 12, '2022-07-24 20:47:21', '2022-07-24 20:47:21', NULL);
INSERT INTO `student_groups` VALUES (112, 112, 28, 12, '2022-07-24 20:47:22', '2022-07-24 20:47:22', NULL);
INSERT INTO `student_groups` VALUES (113, 113, 28, 12, '2022-07-24 20:47:22', '2022-07-24 20:47:22', NULL);
INSERT INTO `student_groups` VALUES (114, 114, 28, 12, '2022-07-24 20:47:22', '2022-07-24 20:47:22', NULL);
INSERT INTO `student_groups` VALUES (115, 115, 28, 12, '2022-07-24 20:47:22', '2022-07-24 20:47:22', NULL);
INSERT INTO `student_groups` VALUES (116, 116, 29, 12, '2022-07-24 20:47:22', '2022-07-24 20:47:22', NULL);
INSERT INTO `student_groups` VALUES (117, 117, 29, 12, '2022-07-24 20:47:23', '2022-07-24 20:47:23', NULL);
INSERT INTO `student_groups` VALUES (118, 118, 29, 12, '2022-07-24 20:47:23', '2022-07-24 20:47:23', NULL);
INSERT INTO `student_groups` VALUES (119, 119, 29, 12, '2022-07-24 20:47:23', '2022-07-24 20:47:23', NULL);
INSERT INTO `student_groups` VALUES (120, 120, 29, 12, '2022-07-24 20:47:23', '2022-07-24 20:47:23', NULL);
INSERT INTO `student_groups` VALUES (121, 121, 29, 12, '2022-07-24 20:47:23', '2022-07-24 20:47:23', NULL);
INSERT INTO `student_groups` VALUES (122, 122, 29, 12, '2022-07-24 20:47:24', '2022-07-24 20:47:24', NULL);
INSERT INTO `student_groups` VALUES (123, 123, 30, 12, '2022-07-24 20:47:24', '2022-07-24 20:47:24', NULL);
INSERT INTO `student_groups` VALUES (124, 124, 30, 12, '2022-07-24 20:47:24', '2022-07-24 20:47:24', NULL);
INSERT INTO `student_groups` VALUES (125, 125, 30, 12, '2022-07-24 20:47:24', '2022-07-24 20:47:24', NULL);
INSERT INTO `student_groups` VALUES (126, 126, 30, 12, '2022-07-24 20:47:25', '2022-07-24 20:47:25', NULL);
INSERT INTO `student_groups` VALUES (127, 127, 30, 12, '2022-07-24 20:47:25', '2022-07-24 20:47:25', NULL);
INSERT INTO `student_groups` VALUES (128, 128, 30, 12, '2022-07-24 20:47:25', '2022-07-24 20:47:25', NULL);
INSERT INTO `student_groups` VALUES (129, 129, 31, 12, '2022-07-24 20:47:25', '2022-07-24 20:47:25', NULL);
INSERT INTO `student_groups` VALUES (130, 130, 31, 12, '2022-07-24 20:47:25', '2022-07-24 20:47:25', NULL);
INSERT INTO `student_groups` VALUES (131, 131, 31, 12, '2022-07-24 20:47:26', '2022-07-24 20:47:26', NULL);
INSERT INTO `student_groups` VALUES (132, 132, 31, 12, '2022-07-24 20:47:26', '2022-07-24 20:47:26', NULL);
INSERT INTO `student_groups` VALUES (133, 133, 31, 12, '2022-07-24 20:47:26', '2022-07-24 20:47:26', NULL);
INSERT INTO `student_groups` VALUES (134, 134, 31, 12, '2022-07-24 20:47:26', '2022-07-24 20:47:26', NULL);
INSERT INTO `student_groups` VALUES (135, 135, 31, 12, '2022-07-24 20:47:26', '2022-07-24 20:47:26', NULL);
INSERT INTO `student_groups` VALUES (136, 136, 31, 12, '2022-07-24 20:47:27', '2022-07-24 20:47:27', NULL);
INSERT INTO `student_groups` VALUES (137, 137, 31, 12, '2022-07-24 20:47:27', '2022-07-24 20:47:27', NULL);
INSERT INTO `student_groups` VALUES (138, 138, 31, 12, '2022-07-24 20:47:27', '2022-07-24 20:47:27', NULL);
INSERT INTO `student_groups` VALUES (139, 139, 32, 12, '2022-07-24 20:47:27', '2022-07-24 20:47:27', NULL);
INSERT INTO `student_groups` VALUES (140, 140, 32, 12, '2022-07-24 20:47:27', '2022-07-24 20:47:27', NULL);
INSERT INTO `student_groups` VALUES (141, 141, 32, 12, '2022-07-24 20:47:28', '2022-07-24 20:47:28', NULL);
INSERT INTO `student_groups` VALUES (142, 142, 32, 12, '2022-07-24 20:47:28', '2022-07-24 20:47:28', NULL);
INSERT INTO `student_groups` VALUES (143, 143, 32, 12, '2022-07-24 20:47:28', '2022-07-24 20:47:28', NULL);
INSERT INTO `student_groups` VALUES (144, 144, 32, 12, '2022-07-24 20:47:28', '2022-07-24 20:47:28', NULL);
INSERT INTO `student_groups` VALUES (145, 145, 33, 12, '2022-07-24 20:47:29', '2022-07-24 20:47:29', NULL);
INSERT INTO `student_groups` VALUES (146, 146, 33, 12, '2022-07-24 20:47:29', '2022-07-24 20:47:29', NULL);
INSERT INTO `student_groups` VALUES (147, 147, 33, 12, '2022-07-24 20:47:29', '2022-07-24 20:47:29', NULL);
INSERT INTO `student_groups` VALUES (148, 148, 33, 12, '2022-07-24 20:47:29', '2022-07-24 20:47:29', NULL);
INSERT INTO `student_groups` VALUES (149, 149, 33, 12, '2022-07-24 20:47:29', '2022-07-24 20:47:29', NULL);
INSERT INTO `student_groups` VALUES (150, 150, 34, 12, '2022-07-24 20:47:30', '2022-07-24 20:47:30', NULL);
INSERT INTO `student_groups` VALUES (151, 151, 34, 12, '2022-07-24 20:47:30', '2022-07-24 20:47:30', NULL);
INSERT INTO `student_groups` VALUES (152, 152, 34, 12, '2022-07-24 20:47:30', '2022-07-24 20:47:30', NULL);
INSERT INTO `student_groups` VALUES (153, 153, 34, 12, '2022-07-24 20:47:30', '2022-07-24 20:47:30', NULL);
INSERT INTO `student_groups` VALUES (154, 154, 34, 12, '2022-07-24 20:47:30', '2022-07-24 20:47:30', NULL);
INSERT INTO `student_groups` VALUES (155, 155, 34, 12, '2022-07-24 20:47:31', '2022-07-24 20:47:31', NULL);
INSERT INTO `student_groups` VALUES (156, 156, 34, 12, '2022-07-24 20:47:31', '2022-07-24 20:47:31', NULL);
INSERT INTO `student_groups` VALUES (157, 157, 34, 12, '2022-07-24 20:47:31', '2022-07-24 20:47:31', NULL);
INSERT INTO `student_groups` VALUES (158, 158, 34, 12, '2022-07-24 20:47:31', '2022-07-24 20:47:31', NULL);
INSERT INTO `student_groups` VALUES (159, 159, 34, 12, '2022-07-24 20:47:31', '2022-07-24 20:47:31', NULL);
INSERT INTO `student_groups` VALUES (160, 160, 35, 12, '2022-07-24 20:47:32', '2022-07-24 20:47:32', NULL);
INSERT INTO `student_groups` VALUES (161, 161, 35, 12, '2022-07-24 20:47:32', '2022-07-24 20:47:32', NULL);
INSERT INTO `student_groups` VALUES (162, 162, 35, 12, '2022-07-24 20:47:32', '2022-07-24 20:47:32', NULL);
INSERT INTO `student_groups` VALUES (163, 163, 35, 12, '2022-07-24 20:47:32', '2022-07-24 20:47:32', NULL);
INSERT INTO `student_groups` VALUES (164, 164, 35, 12, '2022-07-24 20:47:33', '2022-07-24 20:47:33', NULL);
INSERT INTO `student_groups` VALUES (165, 165, 35, 12, '2022-07-24 20:47:33', '2022-07-24 20:47:33', NULL);
INSERT INTO `student_groups` VALUES (166, 166, 35, 12, '2022-07-24 20:47:33', '2022-07-24 20:47:33', NULL);
INSERT INTO `student_groups` VALUES (167, 167, 36, 12, '2022-07-24 20:47:33', '2022-07-24 20:47:33', NULL);
INSERT INTO `student_groups` VALUES (168, 168, 36, 12, '2022-07-24 20:47:33', '2022-07-24 20:47:33', NULL);
INSERT INTO `student_groups` VALUES (169, 169, 36, 12, '2022-07-24 20:47:34', '2022-07-24 20:47:34', NULL);
INSERT INTO `student_groups` VALUES (170, 170, 36, 12, '2022-07-24 20:47:34', '2022-07-24 20:47:34', NULL);
INSERT INTO `student_groups` VALUES (171, 171, 36, 12, '2022-07-24 20:47:34', '2022-07-24 20:47:34', NULL);
INSERT INTO `student_groups` VALUES (172, 172, 36, 12, '2022-07-24 20:47:34', '2022-07-24 20:47:34', NULL);
INSERT INTO `student_groups` VALUES (173, 173, 36, 12, '2022-07-24 20:47:34', '2022-07-24 20:47:34', NULL);
INSERT INTO `student_groups` VALUES (174, 174, 36, 12, '2022-07-24 20:47:35', '2022-07-24 20:47:35', NULL);
INSERT INTO `student_groups` VALUES (175, 175, 37, 12, '2022-07-24 20:47:35', '2022-07-24 20:47:35', NULL);
INSERT INTO `student_groups` VALUES (176, 176, 37, 12, '2022-07-24 20:47:35', '2022-07-24 20:47:35', NULL);
INSERT INTO `student_groups` VALUES (177, 177, 37, 12, '2022-07-24 20:47:35', '2022-07-24 20:47:35', NULL);
INSERT INTO `student_groups` VALUES (178, 178, 38, 12, '2022-07-24 20:47:35', '2022-07-24 20:47:35', NULL);
INSERT INTO `student_groups` VALUES (179, 179, 38, 12, '2022-07-24 20:47:36', '2022-07-24 20:47:36', NULL);
INSERT INTO `student_groups` VALUES (180, 180, 38, 12, '2022-07-24 20:47:36', '2022-07-24 20:47:36', NULL);
INSERT INTO `student_groups` VALUES (181, 181, 38, 12, '2022-07-24 20:47:36', '2022-07-24 20:47:36', NULL);
INSERT INTO `student_groups` VALUES (182, 182, 38, 12, '2022-07-24 20:47:36', '2022-07-24 20:47:36', NULL);
INSERT INTO `student_groups` VALUES (183, 183, 38, 12, '2022-07-24 20:47:36', '2022-07-24 20:47:36', NULL);
INSERT INTO `student_groups` VALUES (184, 184, 38, 12, '2022-07-24 20:47:37', '2022-07-24 20:47:37', NULL);
INSERT INTO `student_groups` VALUES (185, 185, 38, 12, '2022-07-24 20:47:37', '2022-07-24 20:47:37', NULL);
INSERT INTO `student_groups` VALUES (186, 186, 39, 12, '2022-07-24 20:47:37', '2022-07-24 20:47:37', NULL);
INSERT INTO `student_groups` VALUES (187, 187, 39, 12, '2022-07-24 20:47:37', '2022-07-24 20:47:37', NULL);
INSERT INTO `student_groups` VALUES (188, 188, 39, 12, '2022-07-24 20:47:38', '2022-07-24 20:47:38', NULL);
INSERT INTO `student_groups` VALUES (189, 189, 39, 12, '2022-07-24 20:47:38', '2022-07-24 20:47:38', NULL);
INSERT INTO `student_groups` VALUES (190, 190, 39, 12, '2022-07-24 20:47:38', '2022-07-24 20:47:38', NULL);
INSERT INTO `student_groups` VALUES (191, 191, 39, 12, '2022-07-24 20:47:38', '2022-07-24 20:47:38', NULL);
INSERT INTO `student_groups` VALUES (192, 192, 39, 12, '2022-07-24 20:47:38', '2022-07-24 20:47:38', NULL);
INSERT INTO `student_groups` VALUES (193, 193, 40, 12, '2022-07-24 20:47:39', '2022-07-24 20:47:39', NULL);
INSERT INTO `student_groups` VALUES (194, 194, 40, 12, '2022-07-24 20:47:39', '2022-07-24 20:47:39', NULL);
INSERT INTO `student_groups` VALUES (195, 195, 40, 12, '2022-07-24 20:47:39', '2022-07-24 20:47:39', NULL);
INSERT INTO `student_groups` VALUES (196, 196, 40, 12, '2022-07-24 20:47:39', '2022-07-24 20:47:39', NULL);
INSERT INTO `student_groups` VALUES (197, 197, 40, 12, '2022-07-24 20:47:39', '2022-07-24 20:47:39', NULL);
INSERT INTO `student_groups` VALUES (198, 198, 40, 12, '2022-07-24 20:47:40', '2022-07-24 20:47:40', NULL);
INSERT INTO `student_groups` VALUES (199, 199, 40, 12, '2022-07-24 20:47:40', '2022-07-24 20:47:40', NULL);
INSERT INTO `student_groups` VALUES (200, 200, 41, 12, '2022-07-24 20:47:40', '2022-07-24 20:47:40', NULL);
INSERT INTO `student_groups` VALUES (201, 201, 41, 12, '2022-07-24 20:47:40', '2022-07-24 20:47:40', NULL);
INSERT INTO `student_groups` VALUES (202, 202, 41, 12, '2022-07-24 20:47:40', '2022-07-24 20:47:40', NULL);
INSERT INTO `student_groups` VALUES (203, 203, 41, 12, '2022-07-24 20:47:41', '2022-07-24 20:47:41', NULL);
INSERT INTO `student_groups` VALUES (204, 204, 42, 12, '2022-07-24 20:47:41', '2022-07-24 20:47:41', NULL);
INSERT INTO `student_groups` VALUES (205, 205, 42, 12, '2022-07-24 20:47:41', '2022-07-24 20:47:41', NULL);
INSERT INTO `student_groups` VALUES (206, 206, 42, 12, '2022-07-24 20:47:41', '2022-07-24 20:47:41', NULL);
INSERT INTO `student_groups` VALUES (207, 207, 42, 12, '2022-07-24 20:47:42', '2022-07-24 20:47:42', NULL);
INSERT INTO `student_groups` VALUES (208, 208, 42, 12, '2022-07-24 20:47:42', '2022-07-24 20:47:42', NULL);
INSERT INTO `student_groups` VALUES (209, 209, 43, 12, '2022-07-24 20:47:42', '2022-07-24 20:47:42', NULL);
INSERT INTO `student_groups` VALUES (210, 210, 43, 12, '2022-07-24 20:47:42', '2022-07-24 20:47:42', NULL);
INSERT INTO `student_groups` VALUES (211, 211, 43, 12, '2022-07-24 20:47:42', '2022-07-24 20:47:42', NULL);
INSERT INTO `student_groups` VALUES (212, 212, 43, 12, '2022-07-24 20:47:43', '2022-07-24 20:47:43', NULL);
INSERT INTO `student_groups` VALUES (213, 213, 43, 12, '2022-07-24 20:47:43', '2022-07-24 20:47:43', NULL);
INSERT INTO `student_groups` VALUES (214, 214, 44, 12, '2022-07-24 20:47:43', '2022-07-24 20:47:43', NULL);
INSERT INTO `student_groups` VALUES (215, 215, 44, 12, '2022-07-24 20:47:43', '2022-07-24 20:47:43', NULL);
INSERT INTO `student_groups` VALUES (216, 216, 44, 12, '2022-07-24 20:47:43', '2022-07-24 20:47:43', NULL);
INSERT INTO `student_groups` VALUES (217, 217, 44, 12, '2022-07-24 20:47:44', '2022-07-24 20:47:44', NULL);
INSERT INTO `student_groups` VALUES (218, 218, 44, 12, '2022-07-24 20:47:44', '2022-07-24 20:47:44', NULL);
INSERT INTO `student_groups` VALUES (219, 219, 45, 12, '2022-07-24 20:47:44', '2022-07-24 20:47:44', NULL);
INSERT INTO `student_groups` VALUES (220, 220, 45, 12, '2022-07-24 20:47:44', '2022-07-24 20:47:44', NULL);
INSERT INTO `student_groups` VALUES (221, 221, 45, 12, '2022-07-24 20:47:44', '2022-07-24 20:47:44', NULL);
INSERT INTO `student_groups` VALUES (222, 222, 45, 12, '2022-07-24 20:47:45', '2022-07-24 20:47:45', NULL);
INSERT INTO `student_groups` VALUES (223, 223, 45, 12, '2022-07-24 20:47:45', '2022-07-24 20:47:45', NULL);
INSERT INTO `student_groups` VALUES (224, 224, 46, 12, '2022-07-24 20:47:45', '2022-07-24 20:47:45', NULL);
INSERT INTO `student_groups` VALUES (225, 225, 46, 12, '2022-07-24 20:47:45', '2022-07-24 20:47:45', NULL);
INSERT INTO `student_groups` VALUES (226, 226, 46, 12, '2022-07-24 20:47:46', '2022-07-24 20:47:46', NULL);
INSERT INTO `student_groups` VALUES (227, 227, 46, 12, '2022-07-24 20:47:46', '2022-07-24 20:47:46', NULL);
INSERT INTO `student_groups` VALUES (228, 228, 46, 12, '2022-07-24 20:47:46', '2022-07-24 20:47:46', NULL);
INSERT INTO `student_groups` VALUES (229, 229, 46, 12, '2022-07-24 20:47:46', '2022-07-24 20:47:46', NULL);
INSERT INTO `student_groups` VALUES (230, 230, 46, 12, '2022-07-24 20:47:46', '2022-07-24 20:47:46', NULL);
INSERT INTO `student_groups` VALUES (231, 231, 47, 12, '2022-07-24 20:47:47', '2022-07-24 20:47:47', NULL);
INSERT INTO `student_groups` VALUES (232, 232, 47, 12, '2022-07-24 20:47:47', '2022-07-24 20:47:47', NULL);
INSERT INTO `student_groups` VALUES (233, 233, 47, 12, '2022-07-24 20:47:47', '2022-07-24 20:47:47', NULL);
INSERT INTO `student_groups` VALUES (234, 234, 47, 12, '2022-07-24 20:47:47', '2022-07-24 20:47:47', NULL);
INSERT INTO `student_groups` VALUES (235, 235, 48, 12, '2022-07-24 20:47:47', '2022-07-24 20:47:47', NULL);
INSERT INTO `student_groups` VALUES (236, 236, 48, 12, '2022-07-24 20:47:48', '2022-07-24 20:47:48', NULL);
INSERT INTO `student_groups` VALUES (237, 237, 48, 12, '2022-07-24 20:47:48', '2022-07-24 20:47:48', NULL);
INSERT INTO `student_groups` VALUES (238, 238, 48, 12, '2022-07-24 20:47:48', '2022-07-24 20:47:48', NULL);
INSERT INTO `student_groups` VALUES (239, 239, 49, 12, '2022-07-24 20:47:48', '2022-07-24 20:47:48', NULL);
INSERT INTO `student_groups` VALUES (240, 240, 49, 12, '2022-07-24 20:47:48', '2022-07-24 20:47:48', NULL);
INSERT INTO `student_groups` VALUES (241, 241, 49, 12, '2022-07-24 20:47:49', '2022-07-24 20:47:49', NULL);
INSERT INTO `student_groups` VALUES (242, 242, 49, 12, '2022-07-24 20:47:49', '2022-07-24 20:47:49', NULL);
INSERT INTO `student_groups` VALUES (243, 243, 49, 12, '2022-07-24 20:47:49', '2022-07-24 20:47:49', NULL);
INSERT INTO `student_groups` VALUES (244, 244, 50, 12, '2022-07-24 20:47:49', '2022-07-24 20:47:49', NULL);
INSERT INTO `student_groups` VALUES (245, 245, 50, 12, '2022-07-24 20:47:50', '2022-07-24 20:47:50', NULL);
INSERT INTO `student_groups` VALUES (246, 246, 50, 12, '2022-07-24 20:47:50', '2022-07-24 20:47:50', NULL);
INSERT INTO `student_groups` VALUES (247, 247, 50, 12, '2022-07-24 20:47:50', '2022-07-24 20:47:50', NULL);
INSERT INTO `student_groups` VALUES (248, 248, 50, 12, '2022-07-24 20:47:50', '2022-07-24 20:47:50', NULL);
INSERT INTO `student_groups` VALUES (249, 249, 50, 12, '2022-07-24 20:47:50', '2022-07-24 20:47:50', NULL);
INSERT INTO `student_groups` VALUES (250, 250, 50, 12, '2022-07-24 20:47:51', '2022-07-24 20:47:51', NULL);
INSERT INTO `student_groups` VALUES (251, 251, 50, 12, '2022-07-24 20:47:51', '2022-07-24 20:47:51', NULL);
INSERT INTO `student_groups` VALUES (252, 252, 51, 12, '2022-07-24 20:47:51', '2022-07-24 20:47:51', NULL);
INSERT INTO `student_groups` VALUES (253, 253, 51, 12, '2022-07-24 20:47:51', '2022-07-24 20:47:51', NULL);
INSERT INTO `student_groups` VALUES (254, 254, 51, 12, '2022-07-24 20:47:51', '2022-07-24 20:47:51', NULL);
INSERT INTO `student_groups` VALUES (255, 255, 51, 12, '2022-07-24 20:47:52', '2022-07-24 20:47:52', NULL);
INSERT INTO `student_groups` VALUES (256, 256, 51, 12, '2022-07-24 20:47:52', '2022-07-24 20:47:52', NULL);
INSERT INTO `student_groups` VALUES (257, 257, 51, 12, '2022-07-24 20:47:52', '2022-07-24 20:47:52', NULL);
INSERT INTO `student_groups` VALUES (258, 258, 52, 12, '2022-07-24 20:47:52', '2022-07-24 20:47:52', NULL);
INSERT INTO `student_groups` VALUES (259, 259, 52, 12, '2022-07-24 20:47:52', '2022-07-24 20:47:52', NULL);
INSERT INTO `student_groups` VALUES (260, 260, 52, 12, '2022-07-24 20:47:53', '2022-07-24 20:47:53', NULL);
INSERT INTO `student_groups` VALUES (261, 261, 52, 12, '2022-07-24 20:47:53', '2022-07-24 20:47:53', NULL);
INSERT INTO `student_groups` VALUES (262, 262, 52, 12, '2022-07-24 20:47:53', '2022-07-24 20:47:53', NULL);
INSERT INTO `student_groups` VALUES (263, 263, 52, 12, '2022-07-24 20:47:53', '2022-07-24 20:47:53', NULL);
INSERT INTO `student_groups` VALUES (264, 264, 52, 12, '2022-07-24 20:47:53', '2022-07-24 20:47:53', NULL);
INSERT INTO `student_groups` VALUES (265, 265, 53, 12, '2022-07-24 20:47:54', '2022-07-24 20:47:54', NULL);
INSERT INTO `student_groups` VALUES (266, 266, 53, 12, '2022-07-24 20:47:54', '2022-07-24 20:47:54', NULL);
INSERT INTO `student_groups` VALUES (267, 267, 53, 12, '2022-07-24 20:47:54', '2022-07-24 20:47:54', NULL);
INSERT INTO `student_groups` VALUES (268, 268, 53, 12, '2022-07-24 20:47:54', '2022-07-24 20:47:54', NULL);
INSERT INTO `student_groups` VALUES (269, 269, 53, 12, '2022-07-24 20:47:55', '2022-07-24 20:47:55', NULL);
INSERT INTO `student_groups` VALUES (270, 270, 53, 12, '2022-07-24 20:47:55', '2022-07-24 20:47:55', NULL);
INSERT INTO `student_groups` VALUES (271, 271, 53, 12, '2022-07-24 20:47:55', '2022-07-24 20:47:55', NULL);
INSERT INTO `student_groups` VALUES (272, 272, 54, 12, '2022-07-24 20:47:55', '2022-07-24 20:47:55', NULL);
INSERT INTO `student_groups` VALUES (273, 273, 54, 12, '2022-07-24 20:47:55', '2022-07-24 20:47:55', NULL);
INSERT INTO `student_groups` VALUES (274, 274, 54, 12, '2022-07-24 20:47:56', '2022-07-24 20:47:56', NULL);
INSERT INTO `student_groups` VALUES (275, 275, 55, 12, '2022-07-24 20:47:56', '2022-07-24 20:47:56', NULL);
INSERT INTO `student_groups` VALUES (276, 276, 55, 12, '2022-07-24 20:47:56', '2022-07-24 20:47:56', NULL);
INSERT INTO `student_groups` VALUES (277, 277, 56, 12, '2022-07-24 20:47:56', '2022-07-24 20:47:56', NULL);
INSERT INTO `student_groups` VALUES (278, 278, 56, 12, '2022-07-24 20:47:56', '2022-07-24 20:47:56', NULL);
INSERT INTO `student_groups` VALUES (279, 279, 56, 12, '2022-07-24 20:47:57', '2022-07-24 20:47:57', NULL);
INSERT INTO `student_groups` VALUES (280, 280, 56, 12, '2022-07-24 20:47:57', '2022-07-24 20:47:57', NULL);
INSERT INTO `student_groups` VALUES (281, 281, 57, 12, '2022-07-24 20:47:57', '2022-07-24 20:47:57', NULL);
INSERT INTO `student_groups` VALUES (282, 282, 57, 12, '2022-07-24 20:47:57', '2022-07-24 20:47:57', NULL);
INSERT INTO `student_groups` VALUES (283, 283, 57, 12, '2022-07-24 20:47:57', '2022-07-24 20:47:57', NULL);
INSERT INTO `student_groups` VALUES (284, 284, 57, 12, '2022-07-24 20:47:58', '2022-07-24 20:47:58', NULL);
INSERT INTO `student_groups` VALUES (285, 285, 57, 12, '2022-07-24 20:47:58', '2022-07-24 20:47:58', NULL);
INSERT INTO `student_groups` VALUES (286, 286, 57, 12, '2022-07-24 20:47:58', '2022-07-24 20:47:58', NULL);
INSERT INTO `student_groups` VALUES (287, 287, 57, 12, '2022-07-24 20:47:58', '2022-07-24 20:47:58', NULL);
INSERT INTO `student_groups` VALUES (288, 288, 57, 12, '2022-07-24 20:47:59', '2022-07-24 20:47:59', NULL);
INSERT INTO `student_groups` VALUES (289, 289, 57, 12, '2022-07-24 20:47:59', '2022-07-24 20:47:59', NULL);
INSERT INTO `student_groups` VALUES (290, 290, 58, 12, '2022-07-24 20:47:59', '2022-07-24 20:47:59', NULL);
INSERT INTO `student_groups` VALUES (291, 291, 59, 12, '2022-07-24 20:47:59', '2022-07-24 20:47:59', NULL);
INSERT INTO `student_groups` VALUES (292, 292, 59, 12, '2022-07-24 20:47:59', '2022-07-24 20:47:59', NULL);
INSERT INTO `student_groups` VALUES (293, 293, 59, 12, '2022-07-24 20:48:00', '2022-07-24 20:48:00', NULL);
INSERT INTO `student_groups` VALUES (294, 294, 59, 12, '2022-07-24 20:48:00', '2022-07-24 20:48:00', NULL);
INSERT INTO `student_groups` VALUES (295, 295, 59, 12, '2022-07-24 20:48:00', '2022-07-24 20:48:00', NULL);
INSERT INTO `student_groups` VALUES (296, 296, 59, 12, '2022-07-24 20:48:00', '2022-07-24 20:48:00', NULL);
INSERT INTO `student_groups` VALUES (297, 297, 59, 12, '2022-07-24 20:48:00', '2022-07-24 20:48:00', NULL);
INSERT INTO `student_groups` VALUES (298, 298, 59, 12, '2022-07-24 20:48:01', '2022-07-24 20:48:01', NULL);
INSERT INTO `student_groups` VALUES (299, 299, 60, 12, '2022-07-24 20:48:01', '2022-07-24 20:48:01', NULL);
INSERT INTO `student_groups` VALUES (300, 300, 60, 12, '2022-07-24 20:48:01', '2022-07-24 20:48:01', NULL);
INSERT INTO `student_groups` VALUES (301, 301, 60, 12, '2022-07-24 20:48:01', '2022-07-24 20:48:01', NULL);
INSERT INTO `student_groups` VALUES (302, 302, 60, 12, '2022-07-24 20:48:01', '2022-07-24 20:48:01', NULL);
INSERT INTO `student_groups` VALUES (303, 303, 60, 12, '2022-07-24 20:48:02', '2022-07-24 20:48:02', NULL);
INSERT INTO `student_groups` VALUES (304, 304, 60, 12, '2022-07-24 20:48:02', '2022-07-24 20:48:02', NULL);
INSERT INTO `student_groups` VALUES (305, 305, 60, 12, '2022-07-24 20:48:02', '2022-07-24 20:48:02', NULL);
INSERT INTO `student_groups` VALUES (306, 306, 60, 12, '2022-07-24 20:48:02', '2022-07-24 20:48:02', NULL);
INSERT INTO `student_groups` VALUES (307, 307, 60, 12, '2022-07-24 20:48:03', '2022-07-24 20:48:03', NULL);
INSERT INTO `student_groups` VALUES (308, 308, 60, 12, '2022-07-24 20:48:03', '2022-07-24 20:48:03', NULL);
INSERT INTO `student_groups` VALUES (309, 309, 60, 12, '2022-07-24 20:48:03', '2022-07-24 20:48:03', NULL);
INSERT INTO `student_groups` VALUES (310, 310, 60, 12, '2022-07-24 20:48:03', '2022-07-24 20:48:03', NULL);
INSERT INTO `student_groups` VALUES (311, 311, 61, 12, '2022-07-24 20:48:03', '2022-07-24 20:48:03', NULL);
INSERT INTO `student_groups` VALUES (312, 312, 61, 12, '2022-07-24 20:48:04', '2022-07-27 12:48:27', 300000);
INSERT INTO `student_groups` VALUES (313, 313, 55, 12, '2022-07-27 11:55:01', '2022-07-27 11:55:01', NULL);

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `birthday` date NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tg_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `source_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `registered_id` int(11) NOT NULL,
  `come_date` date NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `hobbies` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `balance` int(11) NULL DEFAULT 0,
  `debt` int(11) NULL DEFAULT 0,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'accepted',
  `privilege` tinyint(4) NOT NULL,
  `discount` int(11) NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 315 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, 'Tolipova', 'Zarofat', NULL, '(93) 824-95-59', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:46:58', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (2, 'Sodiqova', 'Gavxar', NULL, '(99) 522-26-21', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:46:58', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (3, 'Ubaeva', 'Maxfuza', NULL, '(99) 794-97-73', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:46:59', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (4, 'Saidmuxtarova', 'Shaxzoda', NULL, '(91) 191-46-43', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:46:59', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (5, 'Zikrillaeva', 'Ozoda', NULL, '(94) 699-31-11', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:46:59', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (6, 'Zuparova', 'Muxabat', NULL, '(71) 222-36-42', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:46:59', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (7, 'Xolmatova', 'Nasiba', NULL, '(99) 837-48-39', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:46:59', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (8, 'Abdusamotov', 'Sadoqat', NULL, '(93) 878-12-18', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:00', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (9, 'Xoshimova', 'Nodira', NULL, '(99) 119-88-51', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:00', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (10, 'Shuxratov', '', NULL, '(99) 906-88-51', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:00', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (11, 'Raxmonova', '', NULL, '(99) 803-51-64', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:00', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (12, 'Toliboyeva', 'Robiya', NULL, '(99) 803-51-64', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:01', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (13, 'Abdujalilova', 'Imona', NULL, '(90) 933-01-88', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:01', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (14, 'Saidmuxtorov', '', NULL, '(91) 191-46-43', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:01', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (15, 'Tolaganxoja', 'Fotima', NULL, '(90) 178-01-02', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:01', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (16, 'Tolaganxoja', 'Jafar', NULL, '(90) 178-01-02', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:01', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (17, 'Matkarimova', 'Ziyoda', NULL, '(93) 544-08-88', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:02', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (18, 'Murotova', 'Zuxra', NULL, '(99) 988-30-27', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:02', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (19, 'Pozilova', '', NULL, '(93) 057-07-77', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:02', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (20, 'Shayxudinova', '', NULL, '(99) 916-88-99', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:02', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (21, 'Abdusalomova', '', NULL, '(90) 937-65-25', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:02', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (22, 'Alimjonova', 'Kamola', NULL, '(99) 857-92-21', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:03', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (23, 'Abduzokirova', 'Nigora', NULL, '(90) 322-03-43', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:03', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (24, 'Abdumalikov', '', NULL, '(93) 509-95-55', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:03', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (25, 'Gulomxojaeva', 'Durdona', NULL, '(94) 652-33-43', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:03', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (26, 'Xakimova', '', NULL, '(93) 577-34-43', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:03', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (27, 'Murodova', '', NULL, '(94) 028-87-78', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:04', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (28, 'Muxamadqodirova', '', NULL, '(93) 580-90-04', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:04', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (29, 'Muxamadqodirova', '', NULL, '(93) 580-90-04', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:04', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (30, 'Tolibjonova', '', NULL, '(95) 025-66-46', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:04', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (31, 'Vosiqova', 'Umida', NULL, '(99) 040-44-53', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:04', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (32, 'Sharipova', 'Sharofaf', NULL, '(99) 794-19-88', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:05', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (33, 'Ganiyev', 'Firdavs', NULL, '(97) 490-43-43', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:05', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (34, 'Avloqulova', 'Feruza', NULL, '(90) 911-34-18', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:05', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (35, 'Abdujalilova', '', NULL, '(99) 040-44-53', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:05', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (36, 'Ubaydullaev', '', NULL, '(97) 740-62-90', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:06', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (37, 'Muzafar', '', NULL, '(99) 999-22-27', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:06', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (38, 'Murodova', 'Muyasar', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:06', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (39, 'Ismoilova', 'Sabrina', NULL, '(97) 786-11-41', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:06', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (40, 'Abubakirivo', '', NULL, '(94) 108-22-22', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:06', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (41, 'Aliakbarova', '', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:07', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (42, 'Tolaganov', '', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:07', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (43, 'Alimuxamedov', '', NULL, '(99) 373-04-50', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:07', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (44, 'Abitova', 'Gulchexra', NULL, '(90) 327-80-98', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:07', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (45, 'Toxirova', 'Xurixon', NULL, '(97) 757-90-54', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:07', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (46, 'Yoldasheva', 'Muxayo', NULL, '(97) 330-00-93', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:08', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (47, 'Gulmonova', 'Lobar', NULL, '(99) 823-41-04', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:08', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (48, 'Xodjiboeva', 'Dilnoza', NULL, '(97) 404-04-45', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:08', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (49, 'Xakimova', 'Gulnoza', NULL, '(97) 342-99-88', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:08', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (50, 'Xakimova', 'Dilnoza', NULL, '(97) 432-11-42', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:08', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (51, 'Raxmonova', 'Gulchexra', NULL, '(99) 819-72-92', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:09', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (52, 'Shermuxamedova', 'Dilshoda', NULL, '(99) 833-62-84', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:09', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (53, 'Shermuxamedov', '', NULL, '(93) 304-64-29', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:09', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (54, 'Raximjonov', 'Oynisa', NULL, '(99) 767-27-27', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:09', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (55, 'Kamolova', 'Gulnoza', NULL, '(93) 169-88-11', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:10', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (56, 'Norqulova', 'Feruza', NULL, '(99) 785-39-74', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:10', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (57, 'Raxmonova', 'Mexribon', NULL, '(99) 838-08-17', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:10', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (58, 'Ergashboyeva', 'Aziza', NULL, '(97) 724-95-57', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:10', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (59, 'Abduraxmonova', '', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:10', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (60, 'Asilova', 'Dilnoza', NULL, '(97) 199-28-58', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:11', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (61, 'Boriyeva', 'Nasiba', NULL, '(99) 889-65-57', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:11', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (62, 'Masharipova', 'Dilnoza', NULL, '(99) 910-77-61', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:11', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (63, 'Rixsiyeva', 'Gulnoza', NULL, '(97) 782-10-03', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:11', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (64, 'Raxmonova', 'Nodira', NULL, '(90) 956-30-04', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:11', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (65, 'Odilov', 'Joxongir', NULL, '(99) 324-11-10', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:12', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (66, 'Qodirova', 'Durdona', NULL, '(99) 863-13-04', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:12', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (67, 'Gulyamova', 'Surayo', NULL, '(94) 624-55-65', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:12', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (68, 'Axmedova', 'Nargiza', NULL, '(99) 005-40-44', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:12', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (69, 'Zoirova', 'Shaxlo', NULL, '(99) 522-19-39', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:12', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (70, 'Xayriddinova', 'Diyora', NULL, '(33) 780-81-08', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:13', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (71, 'Salimjonova', 'Omina', NULL, '(99) 778-03-63', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:13', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (72, 'Faxriddinova', '', NULL, '(33) 031-33-86', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:13', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (73, 'Maratova', '', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:13', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (74, 'Yusupova', 'Muxlisa', NULL, '(97) 410-68-33', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:14', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (75, 'Yusupova', '', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:14', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (76, 'Murodjonova', 'Muslima', NULL, '(99) 680-21-03', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:14', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (77, 'Akmalova', '', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:14', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (78, 'Polatxojaev', 'Odilxoja', NULL, '(99) 814-01-30', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:14', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (79, 'Polatov', '', NULL, '(99) 814-01-30', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:15', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (80, 'Shavkatov', 'Abdumomin', NULL, '(99) 844-18-89', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:15', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (81, 'Normatov', 'Ibroxim', NULL, '(94) 610-42-15', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:15', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (82, 'Utkirov', '', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:15', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (83, 'Anvarova', 'Sarvinoz', NULL, '(99) 000-57-17', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:15', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (84, 'Fayzullaeva', 'Xadicha', NULL, '(99) 785-39-74', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:16', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (85, 'Fayzullaeva', 'Muslima', NULL, '(99) 785-39-74', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:16', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (86, 'Fayzullaeva', 'Ziyoda', NULL, '(99) 785-39-74', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:16', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (87, 'Rixsiboyev', 'Ismoil', NULL, '(99) 886-00-33', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:16', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (88, 'Fayzullaeva', 'Mubina', NULL, '(97) 703-31-59', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:16', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (89, 'NIgmatullaev', '', NULL, '(97) 755-61-05', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:17', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (90, 'NIgmatullaev', '', NULL, '(97) 755-61-05', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:17', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (91, 'Xudoykulova', 'Nargiza', NULL, '(90) 955-48-03', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 500000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:17', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (92, 'Abdulaziz', '', NULL, '(99) 807-00-56', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 500000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:17', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (93, 'Mustafo', '', NULL, '(99) 863-67-52', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 500000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:17', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (94, 'Normametova', 'Nasiba', NULL, '(90) 062-07-70', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:18', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (95, 'Tursunova', 'Mubina', NULL, '(94) 667-31-63', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:18', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (96, 'Tursunova', 'Madina', NULL, '(94) 667-31-63', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:18', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (97, 'Muxtorov', 'MuxamadnAli', NULL, '(93) 516-00-73', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:18', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (98, 'Mavlonov', 'Sherzod', NULL, '(99) 888-88-42', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:19', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (99, 'Muxabbat', '', NULL, '(97) 774-81-44', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:19', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (100, 'Fayziyeva', 'Diyora', NULL, '(99) 844-34-46', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:19', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (101, 'Gaziyeva', 'Dilobar', NULL, '(90) 994-01-78', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:19', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (102, 'Gaziyeva', 'Komila', NULL, '(90) 994-01-78', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:19', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (103, 'Abdusamatov', 'Abdurasul', NULL, '(90) 045-88-52', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:20', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (104, 'Abdusamotova', 'Latofat', NULL, '(90) 045-88-52', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:20', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (105, 'Atxamova', 'Xadicha', NULL, '(99) 831-77-75', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:20', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (106, 'Toirov', 'Amir', NULL, '(99) 444-14-47', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:20', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (107, 'Toirov', 'Firdavs', NULL, '(99) 444-14-47', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:20', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (108, 'Sadulaev', 'Izatila', NULL, '(97) 480-88-42', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:21', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (109, 'Akmalxojaeva', 'Omina', NULL, '(99) 827-52-80', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:21', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (110, 'Erkinov', 'Umid', NULL, '(99) 844-81-24', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:21', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (111, 'Muxamedova', 'Narmina', NULL, '(97) 422-97-42', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:21', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (112, 'Ismatova', 'Mubina', NULL, '(99) 012-66-66', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:21', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (113, 'Ismatova', 'Muxsina', NULL, '(33) 959-44-44', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:22', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (114, 'Davletova', 'Malika', NULL, '(93) 551-44-99', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:22', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (115, 'Abdugafforof', 'ibrohim', NULL, '(93) 599-02-70', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:22', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (116, 'Abdullaeva', 'Gulchexra', NULL, '(97) 735-40-15', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:22', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (117, 'Nurmuxamedova', '', NULL, '(93) 519-44-04', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:23', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (118, 'Nurmuxamedov', 'Xumoyun', NULL, '(93) 519-44-04', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:23', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (119, 'Nurmuxamedova', '', NULL, '(93) 519-44-04', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:23', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (120, 'Tolaganova', 'Sadoqat', NULL, '(99) 247-10-19', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:23', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (121, 'Barnoyev', 'Abduxakim', NULL, '(99) 099-83-68', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:23', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (122, 'Shoaziz', '', NULL, '(99) 855-85-37', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:24', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (123, 'Muxamedov', 'Abdulxamid', NULL, '(93) 523-67-05', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:24', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (124, 'Davletov', 'Qaxramon', NULL, '(93) 595-00-99', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:24', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (125, 'Davletov', 'Ismoil', NULL, '(99) 764-06-51', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:24', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (126, 'Abduvoxidaova', 'Saida', NULL, '(93) 594-95-90', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 0, 'accepted', 0, 0, NULL, '2022-07-24 20:47:24', '2022-07-27 13:01:48');
INSERT INTO `students` VALUES (127, 'Sodiqova', '', NULL, '(99) 862-17-55', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:25', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (128, 'Rustamov', 'Ravshan', NULL, '(97) 769-76-36', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:25', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (129, 'Xabibuloxonova', 'Shoxista', NULL, '(90) 122-39-26', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:25', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (130, 'Gulomxojaev', 'Azam', NULL, '(94) 679-72-72', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:25', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (131, 'Saidulaeva', 'Soliha', NULL, '(90) 393-46-40', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:25', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (132, 'Orifjonova', 'Omina', NULL, '(99) 489-52-05', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:26', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (133, 'Qurbonov', 'Dilmurod', NULL, '(33) 417-17-75', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:26', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (134, 'Axrorova', 'Umida', NULL, '(99) 525-25-22', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:26', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (135, 'Soliyev', 'Kozim', NULL, '(90) 925-08-73', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:26', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (136, 'Alixajaev', 'Komoliddin', NULL, '(90) 908-98-63', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:27', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (137, 'Tolaganxoja', 'Fotima', NULL, '(90) 178-01-02', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:27', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (138, 'Avazov', '', NULL, '(97) 038-06-27', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:27', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (139, 'Abduxakimov', 'Asilbek', NULL, '(90) 919-37-43', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:27', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (140, 'Abdurasulova', 'Diyora', NULL, '(99) 600-05-32', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:27', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (141, 'Alimova', 'Anora', NULL, '(97) 705-95-04', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:28', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (142, 'Saidaxmatov', 'Sardor', NULL, '(90) 091-50-58', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:28', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (143, 'Saotxojaev', 'Ibroxim', NULL, '(99) 022-99-90', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:28', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (144, 'Mirzaaxmedova', 'Shaxzoda', NULL, '(90) 827-06-96', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:28', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (145, 'Toshqunov', 'Ismoil', NULL, '(90) 003-54-66', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:28', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (146, 'Mirsobirov', 'Miraziz', NULL, '(94) 643-16-46', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:29', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (147, 'Raximova', 'Mushtariy', NULL, '(90) 901-01-72', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:29', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (148, 'Axrorov', 'Begzod', NULL, '(90) 974-57-04', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:29', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (149, 'Sayduvaliyeva', 'Sevinch', NULL, '(93) 566-30-00', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:29', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (150, 'Axrorov', 'Abdulaziz', NULL, '(95) 080-20-05', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:29', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (151, 'Baxtiyorov', 'Isroil', NULL, '(95) 069-09-85', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:30', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (152, 'Matkarimov', 'Jovoxir', NULL, '(97) 343-94-14', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:30', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (153, 'Sunnatulaeva', 'Gozal', NULL, '(99) 822-14-30', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:30', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (154, 'Mirzakamalova', 'Zarina', NULL, '(93) 545-05-59', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:30', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (155, 'Avazova', 'Ziyoda', NULL, '(99) 870-05-19', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:31', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (156, 'Azimova', 'Diyora', NULL, '(97) 704-77-77', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:31', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (157, 'Axmedov', 'Mirislom', NULL, '(94) 624-30-07', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:31', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (158, 'Abdujaborov', 'Abdulaziz', NULL, '(93) 574-77-62', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:31', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (159, 'Rustamova', 'Mushtariy', NULL, '(99) 140-19-86', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:31', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (160, 'Mirsultonova', 'Nasiba', NULL, '(90) 352-77-27', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:32', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (161, 'Orifjonova', 'Jamila', NULL, '(99) 489-52-05', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:32', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (162, 'Galimzanova', 'Viktoriya', NULL, '(93) 573-44-48', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:32', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (163, 'Li', 'Veronika', NULL, '(93) 877-37-84', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:32', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (164, 'Ismoilova', 'Ezozaxon', NULL, '(90) 901-33-88', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:32', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (165, 'Abdurashidova', 'Aziza', NULL, '(99) 853-76-55', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:33', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (166, 'Akmalova', 'Farzona', NULL, '(90) 905-95-58', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:33', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (167, 'Maxkamov', 'Atxam', NULL, '(99) 870-66-72', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:33', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (168, 'Asomidinov', 'Asomidin', NULL, '(97) 000-71-10', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 230000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:33', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (169, 'Mirtoraeva', 'Nodira', NULL, '(93) 544-13-94', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:33', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (170, 'Xudoyberganova', 'Farangiz', NULL, '(94) 601-91-35', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:34', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (171, 'Axmedova', 'Nigora', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:34', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (172, 'Abdullayeva', '', NULL, '(99) 801-37-36', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:34', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (173, 'Karimov', 'Xusniddin', NULL, '(93) 569-17-16', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:34', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (174, 'Sobitova', '', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:34', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (175, 'Nurmatova', 'Sevinch', NULL, '(90) 908-98-63', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:35', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (176, 'Uligbekova', 'Shaxina', NULL, '(94) 652-55-55', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:35', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (177, 'Ulugbekova', 'Farzona', NULL, '(94) 652-55-55', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:35', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (178, 'Ismoilova', '', NULL, '(99) 845-92-64', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:35', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (179, 'Xudoyorova', '', NULL, '(90) 986-53-82', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:36', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (180, 'Xudoyorova', '', NULL, '(90) 986-53-82', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:36', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (181, 'Xudoyorov', '', NULL, '(90) 986-53-82', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:36', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (182, 'Sayfulayeva', 'Parizoda', NULL, '(93) 102-40-05', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:36', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (183, 'Yusufxonov', 'Zafar', NULL, '(93) 572-57-17', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:36', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (184, 'Axrorova', 'Xadicha', NULL, '(97) 752-65-35', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:37', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (185, 'Boymatova', 'Rayona', NULL, '(99) 833-81-67', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:37', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (186, 'Nurmatova', 'Komola', NULL, '(90) 908-98-63', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:37', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (187, 'Muxammadqodirova', 'Asmo', NULL, '(94) 014-57-05', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:37', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (188, 'Soxibjonova', 'Mariyam', NULL, '(99) 840-15-18', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:37', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (189, 'Baxtiyorov', 'Bobur', NULL, '(90) 370-00-30', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:38', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (190, 'Abdujalilov', 'Jalolidin', NULL, '(99) 822-66-82', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:38', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (191, 'Rixsiyev', 'Mirsaid', NULL, '(93) 514-90-96', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:38', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (192, 'Abdullayeva', 'Sadiya', NULL, '(99) 409-65-75', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:38', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (193, 'Azimova', 'Durdona', NULL, '(97) 704-77-77', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:38', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (194, 'Saydullaeva', 'Yasmina', NULL, '(97) 480-88-42', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:39', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (195, 'Abdusamatova', 'Maxina', NULL, '(98) 125-24-44', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:39', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (196, 'Abduazizova', 'Laziza', NULL, '(99) 384-92-76', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:39', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (197, 'Jalolov', 'Xumoyun', NULL, '(93) 057-07-77', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:39', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (198, 'Tolaganxoja', 'Xusniya', NULL, '(90) 178-01-02', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:40', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (199, 'Saidmuxtorov', 'Saidakbar', NULL, '(97) 744-01-30', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:40', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (200, 'Zikrillaeva', 'Aziza', NULL, '(94) 699-31-11', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:40', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (201, 'Baxtiyorov', 'Odil', NULL, '(97) 780-55-80', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:40', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (202, 'Yuldashev', 'Ibrohim', NULL, '(90) 903-46-09', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:40', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (203, 'Yakubov', 'Muxamadamin', NULL, '(97) 726-77-10', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:41', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (204, 'Fayziyeva', 'Gulzoda', NULL, '(99) 566-27-32', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:41', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (205, 'Qobiljonova', 'Ezoza', NULL, '(94) 615-10-60', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:41', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (206, 'Xasanova', 'Mushtariy', NULL, '(90) 000-39-09', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:41', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (207, 'Xasanova', 'Omina', NULL, '(90) 920-96-96', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:41', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (208, 'Shkurova', 'Gulchexra', NULL, '(99) 876-05-21', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:42', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (209, 'Komilov', 'Mirsulton', NULL, '(88) 780-38-48', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:42', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (210, 'Qobiljonova', 'Bexruz', NULL, '(91) 162-81-88', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:42', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (211, 'Abdumalikov', 'Abdullox', NULL, '(97) 782-10-03', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:42', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (212, 'Abdumalikov', 'Ibroxim', NULL, '(97) 782-10-03', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:42', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (213, 'Mirguyosiv', 'Abduraxmon', NULL, '(99) 870-32-44', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:43', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (214, 'Soxibjonov', 'Anvarjon', NULL, '(97) 158-25-55', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:43', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (215, 'Rixsiyeva', 'Musliova', NULL, '(99) 910-77-61', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:43', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (216, 'Baxtiyorova', 'Nasiba', NULL, '(71) 212-34-01', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:43', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (217, 'Zoirova', 'Munisa', NULL, '(99) 522-26-21', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:44', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (218, 'Shomurodova', 'Maxbuba', NULL, '(97) 771-56-77', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:44', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (219, 'Tulqunova', 'Ruxshona', NULL, '(93) 524-51-29', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:44', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (220, 'Toirov', 'Amir', NULL, '(99) 444-14-47', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:44', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (221, 'Abdumajidov', 'Dilshod', NULL, '(99) 857-34-33', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:44', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (222, 'Avliyoqulov', 'Abbos', NULL, '(94) 601-91-35', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:45', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (223, 'Abdurashidov', 'Asadbek', NULL, '(99) 848-55-76', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:45', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (224, 'Mirxamdanov', 'Diyorbek', NULL, '(99) 856-70-20', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:45', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (225, 'Mirxamdanov', 'Masuda', NULL, '(99) 856-70-20', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:45', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (226, 'Xoliqova', 'Odina', NULL, '(99) 878-42-41', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:45', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (227, 'Toirov', 'Firdavs', NULL, '(99) 444-14-47', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:46', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (228, 'Xatambekov', 'Maxmud', NULL, '(99) 486-77-57', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:46', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (229, 'Atabaeva', 'Aziza', NULL, '(97) 445-08-55', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:46', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (230, 'Shokirov', 'Ibrohim', NULL, '(97) 441-80-86', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:46', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (231, 'Shovkatov', 'Qodirjon', NULL, '(99) 844-18-89', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:46', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (232, 'Boymayova', 'Rayona', NULL, '(99) 833-81-67', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:47', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (233, 'Botirova', 'Saboxat', NULL, '(99) 819-89-44', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:47', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (234, 'Ravshanova', 'Sevinch', NULL, '(93) 811-21-48', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:47', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (235, 'Ulasheva', 'Farangiz', NULL, '(90) 937-98-30', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:47', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (236, 'Abdujalilova', 'Soxibjamol', NULL, '(99) 822-66-82', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:48', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (237, 'Xamrayeva', 'Maftuna', NULL, '(97) 424-41-08', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:48', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (238, 'Gulomxasanov', 'Ilyos', NULL, '(99) 007-89-19', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:48', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (239, 'Mamutov', 'Arslan', NULL, '(90) 954-42-19', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:48', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (240, 'Rashidov', 'Bobur', NULL, '(93) 146-69-59', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:48', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (241, 'Shodiyev', 'Farxod', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:49', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (242, 'Shodiyev', 'Farux', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:49', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (243, 'Sadullaev', 'Ubaydullo', NULL, '(99) 976-60-45', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:49', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (244, 'Zoirov', 'Yorqin', NULL, '(99) 821-77-54', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:49', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (245, 'Muminov', 'Aburauf', NULL, '(99) 843-66-43', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:49', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (246, 'Tolaganxoja', 'Jafar', NULL, '(90) 178-01-02', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:50', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (247, 'Fayziyev', 'Azizbek', NULL, '(97) 402-66-92', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:50', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (248, 'Orinbayev', 'Abubakir', NULL, '(99) 791-06-41', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:50', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (249, 'Osafxojaev', 'Odilxon', NULL, '(99) 922-42-93', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:50', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (250, 'Mirgiyosov', 'Mirodil', NULL, '(99) 992-54-36', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:50', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (251, 'Shavkatov', 'Shorasul', NULL, '(99) 888-88-99', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:51', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (252, 'Azizova', 'Robiya', NULL, '(99) 658-49-46', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:51', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (253, 'Muxammadmustafo', '', NULL, '(94) 663-40-44', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:51', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (254, 'Abdujalilov', 'Ibrohim', NULL, '(99) 040-44-53', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:51', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (255, 'Xusanov', 'Ziyovuddin', NULL, '(90) 003-14-00', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:51', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (256, 'Sultonov', 'Umarxon', NULL, '(99) 300-20-02', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:52', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (257, 'Ubaydullayeva', 'Muxlisa', NULL, '(97) 740-62-90', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:52', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (258, 'Sayfullayeva', 'Muslima', NULL, '(99) 455-07-70', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:52', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (259, 'Anvarov', 'Aslbek', NULL, '(97) 734-99-03', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:52', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (260, 'Karimov', 'Xusniddin', NULL, '(99) 871-56-26', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:53', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (261, 'Salimov', 'Akbar', NULL, '(99) 880-82-78', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:53', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (262, 'Salimova', 'Muslima', NULL, '(99) 442-82-78', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:53', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (263, 'Abdullayeva', '', NULL, '(99) 826-69-84', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:53', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (264, 'Abqayumov', 'Abduaziz', NULL, '(94) 621-53-93', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:53', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (265, 'Shavkatov', 'Shoislom', NULL, '(99) 888-88-99', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:54', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (266, 'Qodirjonov', 'Odilbek', NULL, '(97) 140-65-17', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:54', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (267, 'Arifxajayeva', 'Madina', NULL, '(99) 008-08-01', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:54', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (268, 'Arifxajayev', 'Axmadxo\'ja', NULL, '(99) 008-08-01', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:54', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (269, 'Karimova', 'Muslima', NULL, '(94) 633-97-97', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:54', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (270, 'Ruxsora', '', NULL, '(99) 868-33-38', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:55', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (271, 'Sobitov', 'Muslim', NULL, '(91) 002-91-80', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:55', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (272, 'Baxtiyorov', 'Begzod', NULL, '(93) 399-57-97', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:55', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (273, 'Baxtiyorova', 'Madina', NULL, '(93) 399-57-97', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:55', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (274, 'Ruhsora', '', NULL, '(97) 900-80-90', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:55', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (275, 'Do\'stmuhammedova', 'Yulduz', NULL, '(94) 899-57-77', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:56', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (276, 'O\'rinboyev', 'Abubakr', NULL, '(99) 791-06-41', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:56', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (277, 'Pirimkulov', 'Hamidulloh', NULL, '(90) 046-08-74', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:56', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (278, 'Karimova', 'Muslima', NULL, '(94) 633-97-97', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:56', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (279, 'Jalolov', 'Xumoyun', NULL, '(93) 057-07-77', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:57', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (280, 'Elshod', '', NULL, '(97) 007-44-52', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:57', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (281, 'Mirhamdamova', 'Madina', NULL, '(99) 856-15-14', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:57', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (282, 'Qobiljonov', 'Husan', NULL, '(91) 162-81-88', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:57', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (283, 'Qobiljonov', 'Hasan', NULL, '(91) 162-81-88', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:57', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (284, 'Ulfatullayev', 'Sunnatilla', NULL, '(99) 644-39-22', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:58', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (285, 'Yuldashev', 'Abubakr', NULL, '(97) 444-46-48', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:58', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (286, 'Yuldasheva', 'Diyora', NULL, '(94) 455-22-83', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:58', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (287, 'Abdullayeva', 'Xadicha', NULL, '(97) 735-40-15', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:58', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (288, 'Asalxon', '', NULL, '(99) 800-32-02', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:58', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (289, 'Muslima', '', NULL, '(99) 831-28-27', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 350000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:59', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (290, 'Sarvinoz', '', NULL, '(99) 484-71-31', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 500000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:59', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (291, 'Abduqahhorova', 'Marhabo', NULL, '(97) 711-06-86', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:59', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (292, 'Abdug\'afforova', 'E\'zoza', NULL, '(93) 599-02-70', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:59', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (293, 'Qobilova', 'Soliha', NULL, '(99) 380-00-10', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:47:59', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (294, 'Pirimkulov', 'Hamidulloh', NULL, '(90) 046-08-74', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:00', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (295, 'Abduqahhorov', 'Nurmuhammad', NULL, '(97) 772-74-85', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:00', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (296, 'Murodov', 'Xojekbar', NULL, '(99) 778-14-34', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:00', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (297, 'Atajanova', 'Safiya', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:00', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (298, 'Atajanova', 'Soliha', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:01', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (299, 'Toxirova', '', NULL, '(97) 443-04-14', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:01', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (300, 'Mirzakamalova', 'Zarina', NULL, '(93) 545-05-59', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:01', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (301, 'Anvarova', 'Mavludaxon', NULL, '(97) 734-99-03', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:01', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (302, 'Samigjonov', 'Suhrobiddin', NULL, '(88) 166-19-76', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:01', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (303, 'Abduazizov', 'Elnur', NULL, '(99) 384-92-76', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:02', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (304, 'Ahmedova', 'Sojida', NULL, '(90) 907-44-73', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:02', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (305, 'O\'tkirova', 'Mubina', NULL, '(94) 421-49-94', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:02', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (306, 'Shavkatov', 'Ibrohim', NULL, '(90) 010-73-84', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:02', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (307, 'Qodirova', '', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:02', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (308, 'Abduvohidova', '', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:03', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (309, 'Islomova', 'Muxlisa', NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:03', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (310, 'Abdusalomova', 'Roziya', NULL, '(90) 353-27-20', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:03', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (311, 'Mirhamdamov', 'Diyorbek', NULL, '(99) 856-70-20', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 400000, 'accepted', 0, 0, NULL, '2022-07-24 20:48:03', '2022-07-27 12:51:07');
INSERT INTO `students` VALUES (312, 'Mirhamdamova', 'Masuda', NULL, '(99) 856-70-20', NULL, NULL, NULL, NULL, 6, 3, 1, '2024-07-20', NULL, NULL, 0, 0, 'accepted', 1, 100000, NULL, '2022-07-24 20:48:03', '2022-07-27 12:53:35');
INSERT INTO `students` VALUES (313, 'asad', 'fefsd', NULL, '(45) 445-45-45', NULL, NULL, NULL, NULL, 6, 3, 1, '2027-07-20', NULL, NULL, 1000, 0, 'accepted', 0, 0, NULL, '2022-07-27 11:54:11', '2022-07-27 12:52:40');
INSERT INTO `students` VALUES (314, 'Admin', 'Abror', NULL, '(99) 894-60-71', NULL, NULL, NULL, NULL, 6, 3, 1, '2031-07-20', NULL, NULL, 0, 0, 'accepted', 0, 0, NULL, '2022-07-31 13:25:26', '2022-07-31 13:25:26');

-- ----------------------------
-- Table structure for subjects
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of subjects
-- ----------------------------
INSERT INTO `subjects` VALUES (7, 'English', 350000, 1, NULL, '2022-07-23 20:40:35', '2022-07-23 20:40:35');
INSERT INTO `subjects` VALUES (8, 'Ingliz tili', 350000, 3, NULL, '2022-07-24 02:44:58', '2022-07-24 02:44:58');
INSERT INTO `subjects` VALUES (9, 'Arab tili', 400000, 3, NULL, '2022-07-24 02:45:19', '2022-07-27 11:37:31');
INSERT INTO `subjects` VALUES (10, 'Matematika', 350000, 3, NULL, '2022-07-24 02:45:43', '2022-07-24 02:45:43');
INSERT INTO `subjects` VALUES (11, 'Rus tili', 350000, 3, NULL, '2022-07-24 02:45:57', '2022-07-24 02:45:57');
INSERT INTO `subjects` VALUES (12, 'Pochemuchka', 350000, 3, NULL, '2022-07-24 02:49:46', '2022-07-24 02:49:46');
INSERT INTO `subjects` VALUES (13, 'Mental arifmetika', 350000, 3, NULL, '2022-07-24 02:50:08', '2022-07-24 02:50:08');
INSERT INTO `subjects` VALUES (14, 'Ingliz tili - Individual', 500000, 3, NULL, '2022-07-27 03:09:00', '2022-07-27 03:09:00');
INSERT INTO `subjects` VALUES (16, 'Arab tili - Individual', 500000, 3, NULL, '2022-07-27 03:11:08', '2022-07-27 03:11:08');
INSERT INTO `subjects` VALUES (17, 'Matematika - Individual', 500000, 3, NULL, '2022-07-27 03:11:24', '2022-07-27 03:11:24');
INSERT INTO `subjects` VALUES (18, 'Rus tili - Individual', 500000, 3, NULL, '2022-07-27 03:11:50', '2022-07-27 03:11:50');
INSERT INTO `subjects` VALUES (19, 'Pochemuchka - Individual', 500000, 3, NULL, '2022-07-27 03:12:17', '2022-07-27 03:12:17');
INSERT INTO `subjects` VALUES (20, 'Mental arifmetika - Individual', 500000, 3, NULL, '2022-07-27 03:12:46', '2022-07-27 03:12:46');

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) NOT NULL,
  `head_teacher_id` int(11) NULL DEFAULT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `percent` int(11) NULL DEFAULT NULL,
  `last_payment` int(11) NOT NULL DEFAULT 0,
  `last_paid_date` date NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (7, 'Miss Maxfuza', 3, NULL, 118462, 40, 0, NULL, NULL, '2022-07-24 02:33:02', '2022-07-27 11:32:55');
INSERT INTO `teachers` VALUES (8, 'Mr Yoldosh', 3, NULL, 0, 40, 0, NULL, NULL, '2022-07-24 02:35:05', '2022-07-24 02:35:05');
INSERT INTO `teachers` VALUES (9, 'Mr Farux', 3, NULL, 179828, 40, 0, NULL, NULL, '2022-07-24 02:35:38', '2022-07-31 16:23:36');
INSERT INTO `teachers` VALUES (10, 'Miss Soxiba', 3, NULL, 86154, 40, 0, NULL, NULL, '2022-07-24 02:36:45', '2022-07-27 12:10:34');
INSERT INTO `teachers` VALUES (11, 'Miss Shirin', 3, NULL, 0, 40, 0, NULL, NULL, '2022-07-24 02:37:12', '2022-07-24 02:37:12');
INSERT INTO `teachers` VALUES (12, 'Miss Durdona', 3, NULL, 53846, 40, 0, NULL, NULL, '2022-07-24 02:37:40', '2022-07-30 14:17:28');
INSERT INTO `teachers` VALUES (13, 'Mr Elshod', 3, NULL, 0, 40, 0, NULL, NULL, '2022-07-24 02:38:10', '2022-07-24 02:38:10');
INSERT INTO `teachers` VALUES (14, 'Miss Komila', 3, NULL, 0, 40, 0, NULL, NULL, '2022-07-24 02:38:56', '2022-07-24 02:38:56');
INSERT INTO `teachers` VALUES (15, 'Miss Robiya', 3, NULL, 0, 40, 0, NULL, NULL, '2022-07-24 02:39:25', '2022-07-24 02:39:25');
INSERT INTO `teachers` VALUES (16, 'Miss Pokiza', 3, NULL, 0, 40, 0, NULL, NULL, '2022-07-24 02:39:52', '2022-07-24 02:39:52');
INSERT INTO `teachers` VALUES (17, 'Miss Sayyora', 3, NULL, 31111, 40, 0, NULL, NULL, '2022-07-24 02:40:48', '2022-07-31 16:23:38');
INSERT INTO `teachers` VALUES (18, 'Miss Ro\'za', 3, NULL, 0, 40, 0, NULL, NULL, '2022-07-24 02:41:56', '2022-07-24 02:41:56');
INSERT INTO `teachers` VALUES (20, 'Mr Maruf', 3, NULL, 0, 40, 0, NULL, NULL, '2022-07-24 02:43:16', '2022-07-24 02:43:16');
INSERT INTO `teachers` VALUES (21, 'Miss Shahzoda', 3, NULL, 0, 40, 0, NULL, NULL, '2022-07-24 02:43:50', '2022-07-24 02:43:50');
INSERT INTO `teachers` VALUES (22, 'Mr Eldosh', 3, NULL, 0, 40, 0, NULL, NULL, '2022-07-24 02:55:12', '2022-07-24 02:55:12');
INSERT INTO `teachers` VALUES (23, 'Mr Temur', 3, 7, 0, 40, 0, NULL, NULL, '2022-07-24 03:32:19', '2022-07-27 12:59:21');

-- ----------------------------
-- Table structure for telescope_entries
-- ----------------------------
DROP TABLE IF EXISTS `telescope_entries`;
CREATE TABLE `telescope_entries`  (
  `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`sequence`) USING BTREE,
  UNIQUE INDEX `telescope_entries_uuid_unique`(`uuid`) USING BTREE,
  INDEX `telescope_entries_batch_id_index`(`batch_id`) USING BTREE,
  INDEX `telescope_entries_family_hash_index`(`family_hash`) USING BTREE,
  INDEX `telescope_entries_created_at_index`(`created_at`) USING BTREE,
  INDEX `telescope_entries_type_should_display_on_index_index`(`type`, `should_display_on_index`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of telescope_entries
-- ----------------------------

-- ----------------------------
-- Table structure for telescope_entries_tags
-- ----------------------------
DROP TABLE IF EXISTS `telescope_entries_tags`;
CREATE TABLE `telescope_entries_tags`  (
  `entry_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  INDEX `telescope_entries_tags_entry_uuid_tag_index`(`entry_uuid`, `tag`) USING BTREE,
  INDEX `telescope_entries_tags_tag_index`(`tag`) USING BTREE,
  CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of telescope_entries_tags
-- ----------------------------

-- ----------------------------
-- Table structure for telescope_monitoring
-- ----------------------------
DROP TABLE IF EXISTS `telescope_monitoring`;
CREATE TABLE `telescope_monitoring`  (
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of telescope_monitoring
-- ----------------------------

-- ----------------------------
-- Table structure for temporary_groups
-- ----------------------------
DROP TABLE IF EXISTS `temporary_groups`;
CREATE TABLE `temporary_groups`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of temporary_groups
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions` json NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Temur', 'admin@admin.com', NULL, '$2y$10$kCD31e36Hqd3kd9xgRDIO.UO81t4I/dAWIvjr6Fr.u/bfAde8lA3.', 'OourmDvoUlGQ3b9rRiMISIiQyne4WlIeMAJ8YmMNu05ricxyYECWLmZyAMBr', '2022-05-28 14:39:26', '2022-07-27 11:56:26', '{\"platform.index\": \"1\", \"platform.rooms\": \"1\", \"platform.groups\": \"1\", \"platform.redDays\": \"1\", \"platform.sources\": \"1\", \"platform.branches\": \"1\", \"platform.expenses\": \"1\", \"platform.payments\": \"1\", \"platform.specialy\": \"1\", \"platform.students\": \"1\", \"platform.subjects\": \"1\", \"platform.teachers\": \"1\", \"platform.groupInfo\": \"1\", \"platform.timetable\": \"1\", \"platform.attandance\": \"1\", \"platform.editLesson\": \"1\", \"platform.getPayment\": \"1\", \"platform.giveSalary\": \"1\", \"platform.paymentInfo\": \"1\", \"platform.teacherInfo\": \"1\", \"platform.editMessages\": \"1\", \"platform.systems.roles\": \"1\", \"platform.systems.users\": \"1\", \"platform.editGroupPrice\": \"1\", \"platform.temporaryStudent\": \"1\", \"platform.addStudentToGroup\": \"1\", \"platform.editStudentStatus\": \"1\", \"platform.systems.attachment\": \"1\", \"platform.rollbackStudentPayment\": \"1\"}', 3, NULL);

SET FOREIGN_KEY_CHECKS = 1;
