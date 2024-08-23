/*
 Navicat Premium Data Transfer

 Source Server         : ServerPortal
 Source Server Type    : MySQL
 Source Server Version : 50554
 Source Host           : 192.168.10.26:3306
 Source Schema         : db_portal

 Target Server Type    : MySQL
 Target Server Version : 50554
 File Encoding         : 65001

 Date: 23/08/2024 22:58:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_menu
-- ----------------------------
DROP TABLE IF EXISTS `tb_menu`;
CREATE TABLE `tb_menu`  (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_parent` int(11) NULL DEFAULT NULL,
  `id_viewer` int(11) NULL DEFAULT NULL,
  `urutan` int(11) NULL DEFAULT NULL,
  `publish` int(2) NULL DEFAULT NULL,
  `pembuat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ts` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_menu
-- ----------------------------
INSERT INTO `tb_menu` VALUES (1, 'Finance', 0, 1, 1, 1, 'Andrian', '2024-08-23');
INSERT INTO `tb_menu` VALUES (2, 'Akademik', 0, 2, 2, 0, '7998870515d3564d07d95b4034621735', '2024-08-23');

-- ----------------------------
-- Table structure for tb_workspace
-- ----------------------------
DROP TABLE IF EXISTS `tb_workspace`;
CREATE TABLE `tb_workspace`  (
  `pk_link_api` int(11) NOT NULL AUTO_INCREMENT,
  `departement_link` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `api_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `client_id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `client_secret` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`pk_link_api`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_workspace
-- ----------------------------
INSERT INTO `tb_workspace` VALUES (1, 'https://bpm.asihputera.or.id:8888/sysasihputera/en/neoclassic', 'https://bpm.asihputera.or.id:8888/api/1.0/asihputera/', 'QKQYKIBJUXFRMGITBPKXVBWOVMFYPWWF', '2922119675d440616c9a613026663027');

SET FOREIGN_KEY_CHECKS = 1;
