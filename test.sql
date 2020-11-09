/*
 Navicat MySQL Data Transfer

 Source Server         : PHP study MySQL
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 28/06/2020 14:51:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for text
-- ----------------------------
DROP TABLE IF EXISTS `text`;
CREATE TABLE `text`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Theme` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reply` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '回复',
  `time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 44 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of text
-- ----------------------------
INSERT INTO `text` VALUES (1, 'Lily', '迅雷', '迅雷绿色版即可下载，只要去到磁力搜索网站搜你想要关键字', 'fdsafasdfdsfsfsf', '2020-06-28 14:42:32', '127.0.0.1');
INSERT INTO `text` VALUES (2, 'Lily', '测试', '早晨给你一个早安吻，对你说：早安；下午递你一杯温奶茶，对你说：午安；午夜拥你入怀抱，对你说：晚安。亲爱的，时刻都想你。', NULL, '2020-06-28 07:33:31', '127.0.0.1');
INSERT INTO `text` VALUES (3, 'Lily', '测试', '多少痴心的日子通过了你的考验，多少精心的付出博得了你的笑脸，多少细心的照顾为你带去温暖，无数的过往让我觉得今天能通过你的门槛，求你嫁给我是我一生的夙愿。', NULL, '2020-06-28 07:33:34', '127.0.0.1');
INSERT INTO `text` VALUES (4, 'Lily', '测试', '我真的很希望能再和你一起，我不知道能一起走多远，但我知道最后的结局是我一直爱你直到我的生命结束，无论我们是否还在一起。', NULL, '2020-06-28 07:33:36', '127.0.0.1');
INSERT INTO `text` VALUES (5, 'Lily', '测试', '世界因你而美丽，人生因你而美好，生活因你而精彩，想你阳光灿烂，想你碧海蓝天，想你五颜六色，想你日日月月，想你岁岁年年，想你，从早到晚！', NULL, '2020-06-28 07:33:39', '127.0.0.1');
INSERT INTO `text` VALUES (6, 'Lily', '测试', '亲爱的，如果婚姻是坟墓那么今天就是立碑的时候，注定把我们的爱封存千年；亲爱的，如果婚姻是天堂，那么现在就是迈入的时候，注定让我们的爱，永远流唱；嫁给我吧，让我成为你上天入地的另一半！', NULL, '2020-06-28 07:33:41', '127.0.0.1');
INSERT INTO `text` VALUES (7, 'Lily', '测试', '用地平线织一件毛衣送你，不管你到哪，都不出我的视线；用视线织一件毛衣送你，不管你去哪，我都把你看见。', NULL, '2020-06-28 07:33:45', '127.0.0.1');
INSERT INTO `text` VALUES (8, 'Lily', '测试', '爱你深深恋无穷，你的影子在心中；今生今世恋不变，幸福相伴人相拥；天长地久心连心，海枯石烂情永恒；痴心常向你发送，牵手一生乐融融！', NULL, '2020-06-28 07:33:48', '127.0.0.1');
INSERT INTO `text` VALUES (9, 'Lily', '测试', '最爱你的眼，藏着我的深情你的柔情；最爱你的唇，交知着我的热情你的迷情；最爱你的人，给你我的今生你的一生！', NULL, '2020-06-28 07:34:01', '127.0.0.1');
INSERT INTO `text` VALUES (43, 'Tom', '测试', '给你我的今生你的一生！', NULL, '2020-06-28 14:51:20', '127.0.0.1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tel` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ssex` tinyint(1) UNSIGNED ZEROFILL NULL DEFAULT 1,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `face` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `admin` tinyint(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Tom', '123456', '15970131597', 1, '123@qq.com', '1.jpg', 1);
INSERT INTO `user` VALUES (3, 'Lily', '123456', '17770726547', 2, '456@qq.com', '2.jpg', 0);
INSERT INTO `user` VALUES (18, 'Tom4', '123456', '17770725376', 1, '132@qq.com', '2.jpg', 0);

SET FOREIGN_KEY_CHECKS = 1;
