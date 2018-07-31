/*
Navicat MySQL Data Transfer

Source Server         : MySQL-Localhost
Source Server Version : 50505
Source Host           : 127.1.1.0:3306
Source Database       : db_pengendalian_kualitas

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-29 05:30:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_berkas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_berkas`;
CREATE TABLE `tbl_berkas` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `tgl_berkas` date DEFAULT NULL,
  `dat_berkas` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_berkas
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_deffect_celana
-- ----------------------------
DROP TABLE IF EXISTS `tbl_deffect_celana`;
CREATE TABLE `tbl_deffect_celana` (
  `kodegarment` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `openseam_at_waistban` int(4) DEFAULT NULL,
  `runup_at_waistban` int(4) DEFAULT NULL,
  `openseam_at_inseam` int(4) DEFAULT NULL,
  `skip_at_inseam` int(4) DEFAULT NULL,
  `runup_at_bottomhem` int(4) DEFAULT NULL,
  `totaldeffect` int(4) DEFAULT NULL,
  `totalbagus` int(4) DEFAULT NULL,
  `persentasi` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`kodegarment`),
  KEY `kd_garment` (`kodegarment`),
  CONSTRAINT `dca` FOREIGN KEY (`kodegarment`) REFERENCES `tbl_sewing_qc` (`kodegarment`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_deffect_celana
-- ----------------------------
INSERT INTO `tbl_deffect_celana` VALUES ('0001', '32', '24', '23', '12', '5', '96', '35', '73.28');
INSERT INTO `tbl_deffect_celana` VALUES ('0004', '23', '3', '34', '52', '234', '346', '23', '93.77');

-- ----------------------------
-- Table structure for tbl_deffect_kemeja
-- ----------------------------
DROP TABLE IF EXISTS `tbl_deffect_kemeja`;
CREATE TABLE `tbl_deffect_kemeja` (
  `kodegarment` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `unevent_at_collar` int(4) DEFAULT NULL,
  `openseam_at_bottomhem` int(4) DEFAULT NULL,
  `skip_at_sideseam` int(4) DEFAULT NULL,
  `openseam_at_sideseam` int(4) DEFAULT NULL,
  `hilo_at_cuff` int(4) DEFAULT NULL,
  `totaldeffect` int(4) DEFAULT NULL,
  `totalbagus` int(4) DEFAULT NULL,
  `persentasi` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`kodegarment`),
  KEY `kd_garment` (`kodegarment`),
  CONSTRAINT `dka` FOREIGN KEY (`kodegarment`) REFERENCES `tbl_sewing_qc` (`kodegarment`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_deffect_kemeja
-- ----------------------------
INSERT INTO `tbl_deffect_kemeja` VALUES ('0002', '3', '2', '5', '66', '1', '77', '6', '13');
INSERT INTO `tbl_deffect_kemeja` VALUES ('0003', '2', '4', '66', '4', '33', '109', '3', '42');

-- ----------------------------
-- Table structure for tbl_garment
-- ----------------------------
DROP TABLE IF EXISTS `tbl_garment`;
CREATE TABLE `tbl_garment` (
  `kodegarment` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama_garment` varchar(8) DEFAULT NULL,
  `style` varchar(8) DEFAULT NULL,
  `buyer` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`kodegarment`),
  CONSTRAINT `ga` FOREIGN KEY (`kodegarment`) REFERENCES `tbl_sewing_qc` (`kodegarment`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_garment
-- ----------------------------
INSERT INTO `tbl_garment` VALUES ('0001', 'Celana', '6', '5');
INSERT INTO `tbl_garment` VALUES ('0002', 'Kemeja', '23', '3');
INSERT INTO `tbl_garment` VALUES ('0003', 'Kemeja', '43', '23');
INSERT INTO `tbl_garment` VALUES ('0004', 'Celana', '4', '2');

-- ----------------------------
-- Table structure for tbl_hak_akses
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hak_akses`;
CREATE TABLE `tbl_hak_akses` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(13) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_hak_akses
-- ----------------------------
INSERT INTO `tbl_hak_akses` VALUES ('001', 'astri', 'astri', 'Admin', 'astri');
INSERT INTO `tbl_hak_akses` VALUES ('002', 'astrilestari', '123456789', 'QA System', 'Astri Lestari');
INSERT INTO `tbl_hak_akses` VALUES ('003', 'cicih', '123', 'SPV. Line', 'Cicicicicih');
INSERT INTO `tbl_hak_akses` VALUES ('004', 'dede', '12345', 'Kepala Bagian', 'Aa Aa Dede Dede ADE');

-- ----------------------------
-- Table structure for tbl_keterangan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_keterangan`;
CREATE TABLE `tbl_keterangan` (
  `kodegarment` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `follow_up` varchar(1) DEFAULT NULL,
  `keterangan` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`kodegarment`),
  CONSTRAINT `tka` FOREIGN KEY (`kodegarment`) REFERENCES `tbl_sewing_qc` (`kodegarment`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_keterangan
-- ----------------------------
INSERT INTO `tbl_keterangan` VALUES ('0001', '1', 'fa');
INSERT INTO `tbl_keterangan` VALUES ('0002', '1', 'as');
INSERT INTO `tbl_keterangan` VALUES ('0003', '1', 'fa');
INSERT INTO `tbl_keterangan` VALUES ('0004', '1', 's');

-- ----------------------------
-- Table structure for tbl_sewing_qc
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sewing_qc`;
CREATE TABLE `tbl_sewing_qc` (
  `kodegarment` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `noline` varchar(2) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `namaspv` varchar(10) DEFAULT NULL,
  `namaqc` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kodegarment`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_sewing_qc
-- ----------------------------
INSERT INTO `tbl_sewing_qc` VALUES ('0001', '1', '2018-07-28', '2e', '34');
INSERT INTO `tbl_sewing_qc` VALUES ('0002', '1', '2018-07-28', 'Anto', 'Rudi');
INSERT INTO `tbl_sewing_qc` VALUES ('0003', '1', '2018-07-28', 'Anto', 'Rudi');
INSERT INTO `tbl_sewing_qc` VALUES ('0004', '3', '2018-07-28', '5', '34');
