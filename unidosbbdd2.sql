/*
 Navicat Premium Data Transfer

 Source Server         : multiservicios
 Source Server Type    : MySQL
 Source Server Version : 50711
 Source Host           : localhost:3306
 Source Schema         : unidos

 Target Server Type    : MySQL
 Target Server Version : 50711
 File Encoding         : 65001

 Date: 25/09/2021 19:17:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agendados
-- ----------------------------
DROP TABLE IF EXISTS `agendados`;
CREATE TABLE `agendados`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `visitante` int(3) NOT NULL,
  `home` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(0) NOT NULL,
  `temporada` int(5) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `visitante_agenda`(`visitante`) USING BTREE,
  INDEX `home_agenda`(`home`) USING BTREE,
  INDEX `agenda_temporada`(`temporada`) USING BTREE,
  CONSTRAINT `agenda_temporada` FOREIGN KEY (`temporada`) REFERENCES `temporadas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `home_agenda` FOREIGN KEY (`home`) REFERENCES `equipos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `visitante_agenda` FOREIGN KEY (`visitante`) REFERENCES `equipos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of agendados
-- ----------------------------
INSERT INTO `agendados` VALUES (1, 1, 2, '2021-09-11', '17:30:00', NULL);
INSERT INTO `agendados` VALUES (2, 2, 1, '2021-09-19', '19:49:40', NULL);
INSERT INTO `agendados` VALUES (3, 2, 6, '2021-09-20', '10:09:39', 1);

-- ----------------------------
-- Table structure for equipos
-- ----------------------------
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `color` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `logo` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of equipos
-- ----------------------------
INSERT INTO `equipos` VALUES (1, 'A', 'blue', 'licey.jpg');
INSERT INTO `equipos` VALUES (2, 'B', 'yelow', 'aguilas.jpg');
INSERT INTO `equipos` VALUES (3, 'C', NULL, 'pc.jpg');
INSERT INTO `equipos` VALUES (5, 'D', NULL, 'pc.jpg');
INSERT INTO `equipos` VALUES (6, 'E', NULL, 'hipertextual-sony-quiere-que-spider-man-venom-se-enfrenten-nueva-pelicula-2019003668.jpg');

-- ----------------------------
-- Table structure for estadisticas_defensivas
-- ----------------------------
DROP TABLE IF EXISTS `estadisticas_defensivas`;
CREATE TABLE `estadisticas_defensivas`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_temporada` int(5) NOT NULL,
  `id_jugador` int(20) NOT NULL,
  `efectividad` double(5, 2) NOT NULL,
  `cp` int(5) NOT NULL DEFAULT 0,
  `k` int(5) NOT NULL DEFAULT 0,
  `bb` int(5) NOT NULL DEFAULT 0,
  `wp` int(5) NOT NULL DEFAULT 0,
  `entradas` double(5, 1) NOT NULL DEFAULT 0.0,
  `ganados` int(5) NOT NULL DEFAULT 0,
  `perdidos` int(5) NOT NULL,
  `nodecididos` int(5) NOT NULL DEFAULT 0,
  `salvados` int(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `estadisticas_defensivas`(`id_temporada`) USING BTREE,
  INDEX `estasdisticas_pichers`(`id_jugador`) USING BTREE,
  CONSTRAINT `estadisticas_defensivas` FOREIGN KEY (`id_temporada`) REFERENCES `temporadas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estasdisticas_pichers` FOREIGN KEY (`id_jugador`) REFERENCES `jugadores` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estadisticas_defensivas
-- ----------------------------
INSERT INTO `estadisticas_defensivas` VALUES (1, 1, 1, 10.45, 72, 70, 6, 0, 62.0, 6, 4, 0, 0);
INSERT INTO `estadisticas_defensivas` VALUES (2, 1, 2, 4.50, 3, 5, 0, 0, 6.0, 0, 1, 0, 0);

-- ----------------------------
-- Table structure for estadisticas_equipos
-- ----------------------------
DROP TABLE IF EXISTS `estadisticas_equipos`;
CREATE TABLE `estadisticas_equipos`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(3) NOT NULL,
  `ganados` int(5) NOT NULL DEFAULT 0,
  `perdidos` int(5) NOT NULL DEFAULT 0,
  `porcentage` double(10, 2) NOT NULL DEFAULT 0.00,
  `total_juegos` int(5) NOT NULL DEFAULT 0,
  `id_temporada` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `estas_equipo`(`id_equipo`) USING BTREE,
  INDEX `esta_temporada`(`id_temporada`) USING BTREE,
  CONSTRAINT `esta_temporada` FOREIGN KEY (`id_temporada`) REFERENCES `temporadas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estas_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estadisticas_equipos
-- ----------------------------
INSERT INTO `estadisticas_equipos` VALUES (1, 1, 10, 3, 769.23, 13, 1);
INSERT INTO `estadisticas_equipos` VALUES (2, 2, 3, 10, 230.77, 13, 1);

-- ----------------------------
-- Table structure for estadisticas_ofensivas
-- ----------------------------
DROP TABLE IF EXISTS `estadisticas_ofensivas`;
CREATE TABLE `estadisticas_ofensivas`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_temporada` int(5) NOT NULL,
  `id_jugador` int(20) NOT NULL,
  `avg` int(3) NOT NULL DEFAULT 0,
  `ca` int(5) NOT NULL DEFAULT 0,
  `ce` int(5) NOT NULL DEFAULT 0,
  `k` int(5) NOT NULL DEFAULT 0,
  `bb` int(5) NOT NULL DEFAULT 0,
  `h` int(5) NOT NULL DEFAULT 0,
  `h2` int(5) NOT NULL DEFAULT 0,
  `h3` int(5) NOT NULL DEFAULT 0,
  `h4` int(5) NOT NULL DEFAULT 0,
  `vb` int(5) NOT NULL DEFAULT 0,
  `sb` int(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `estadisticas_temporada`(`id_temporada`) USING BTREE,
  INDEX `estadisticas_jugador`(`id_jugador`) USING BTREE,
  CONSTRAINT `estadisticas_jugador` FOREIGN KEY (`id_jugador`) REFERENCES `jugadores` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `estadisticas_temporada` FOREIGN KEY (`id_temporada`) REFERENCES `temporadas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estadisticas_ofensivas
-- ----------------------------
INSERT INTO `estadisticas_ofensivas` VALUES (1, 1, 2, 455, 0, 5, 23, 0, 5, 5, 2, 8, 44, 0);
INSERT INTO `estadisticas_ofensivas` VALUES (2, 1, 3, 1034, 2, 10, 3, 0, 12, 11, 0, 8, 29, 0);
INSERT INTO `estadisticas_ofensivas` VALUES (3, 1, 1, 1222, 0, 0, 5, 0, 12, 11, 0, 0, 18, 0);
INSERT INTO `estadisticas_ofensivas` VALUES (4, 1, 4, 167, 0, 0, 9, 0, 0, 0, 1, 1, 12, 0);

-- ----------------------------
-- Table structure for juego_detalle
-- ----------------------------
DROP TABLE IF EXISTS `juego_detalle`;
CREATE TABLE `juego_detalle`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_juego` int(20) NOT NULL,
  `ining` int(2) NOT NULL,
  `picher` int(20) NOT NULL,
  `bateador` int(20) NOT NULL,
  `jugada` int(3) NOT NULL,
  `CA` int(2) NOT NULL DEFAULT 0,
  `CE` int(2) NOT NULL DEFAULT 0,
  `BR` int(2) NOT NULL DEFAULT 0,
  `turno` int(3) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `juego_detalle`(`id_juego`) USING BTREE,
  INDEX `juego_detalle_picher`(`picher`) USING BTREE,
  INDEX `juego_detalle_bateador`(`bateador`) USING BTREE,
  INDEX `juego_detalle_jugada`(`jugada`) USING BTREE,
  CONSTRAINT `juego_detalle` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `juego_detalle_bateador` FOREIGN KEY (`bateador`) REFERENCES `jugadores` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `juego_detalle_jugada` FOREIGN KEY (`jugada`) REFERENCES `jugadas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `juego_detalle_picher` FOREIGN KEY (`picher`) REFERENCES `jugadores` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of juego_detalle
-- ----------------------------
INSERT INTO `juego_detalle` VALUES (2, 1, 1, 1, 2, 9, 0, 0, 0, 1);
INSERT INTO `juego_detalle` VALUES (3, 1, 2, 1, 2, 10, 0, 1, 0, 2);
INSERT INTO `juego_detalle` VALUES (4, 1, 2, 1, 3, 12, 1, 1, 0, 3);
INSERT INTO `juego_detalle` VALUES (7, 1, 3, 1, 2, 1, 0, 0, 0, 4);
INSERT INTO `juego_detalle` VALUES (8, 1, 6, 1, 3, 1, 0, 0, 0, 5);
INSERT INTO `juego_detalle` VALUES (9, 1, 6, 1, 2, 1, 0, 0, 0, 6);
INSERT INTO `juego_detalle` VALUES (11, 1, 3, 1, 3, 9, 0, 0, 0, 7);
INSERT INTO `juego_detalle` VALUES (12, 1, 3, 1, 3, 9, 0, 0, 0, 8);
INSERT INTO `juego_detalle` VALUES (13, 1, 4, 1, 3, 10, 0, 0, 0, 9);
INSERT INTO `juego_detalle` VALUES (14, 1, 4, 1, 2, 11, 0, 0, 0, 10);
INSERT INTO `juego_detalle` VALUES (17, 1, 2, 1, 2, 1, 0, 0, 0, 11);
INSERT INTO `juego_detalle` VALUES (18, 1, 3, 1, 3, 1, 0, 0, 0, 12);
INSERT INTO `juego_detalle` VALUES (19, 1, 5, 1, 2, 10, 0, 2, 0, 13);
INSERT INTO `juego_detalle` VALUES (20, 1, 1, 1, 2, 12, 0, 3, 0, 14);
INSERT INTO `juego_detalle` VALUES (21, 1, 2, 1, 3, 12, 1, 3, 0, 15);
INSERT INTO `juego_detalle` VALUES (24, 1, 1, 1, 3, 12, 1, 2, 0, 16);
INSERT INTO `juego_detalle` VALUES (25, 1, 1, 1, 2, 1, 0, 0, 0, 17);
INSERT INTO `juego_detalle` VALUES (26, 1, 1, 1, 3, 1, 0, 0, 0, 18);
INSERT INTO `juego_detalle` VALUES (27, 1, 1, 1, 2, 2, 0, 0, 0, 19);
INSERT INTO `juego_detalle` VALUES (28, 1, 2, 1, 2, 3, 0, 0, 0, 20);
INSERT INTO `juego_detalle` VALUES (29, 1, 2, 1, 3, 2, 0, 0, 0, 21);
INSERT INTO `juego_detalle` VALUES (30, 1, 3, 1, 2, 3, 0, 0, 0, 22);
INSERT INTO `juego_detalle` VALUES (31, 1, 3, 1, 3, 4, 0, 0, 0, 23);

-- ----------------------------
-- Table structure for juegos
-- ----------------------------
DROP TABLE IF EXISTS `juegos`;
CREATE TABLE `juegos`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `visitante` int(3) NOT NULL,
  `home` int(3) NOT NULL,
  `arbitro` varchar(5000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha` date NOT NULL,
  `ganador` int(3) NULL DEFAULT NULL,
  `perdedor` int(3) NULL DEFAULT NULL,
  `carreras_ganador` int(3) NULL DEFAULT NULL,
  `carrerar_perdedor` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `juego_visitante`(`visitante`) USING BTREE,
  INDEX `juego_home`(`home`) USING BTREE,
  INDEX `juego_ganador`(`ganador`) USING BTREE,
  INDEX `juego_perdedor`(`perdedor`) USING BTREE,
  CONSTRAINT `juego_ganador` FOREIGN KEY (`ganador`) REFERENCES `equipos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `juego_home` FOREIGN KEY (`home`) REFERENCES `equipos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `juego_perdedor` FOREIGN KEY (`perdedor`) REFERENCES `equipos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `juego_visitante` FOREIGN KEY (`visitante`) REFERENCES `equipos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of juegos
-- ----------------------------
INSERT INTO `juegos` VALUES (1, 1, 2, 'Lima', '2021-07-16', 1, 2, 10, 5);
INSERT INTO `juegos` VALUES (5, 2, 1, 'Naelis', '2021-08-05', 2, 1, 5, 2);
INSERT INTO `juegos` VALUES (6, 2, 2, 'Lima', '2021-08-05', 1, 2, 3, 2);
INSERT INTO `juegos` VALUES (7, 1, 2, 'xx', '2021-08-06', 1, 2, 10, 5);
INSERT INTO `juegos` VALUES (8, 2, 1, 'ss', '2021-08-06', 2, 1, 3, 1);
INSERT INTO `juegos` VALUES (9, 2, 1, 'Lima', '2021-09-25', 1, 2, 3, 5);
INSERT INTO `juegos` VALUES (10, 2, 1, 'Lima', '2021-09-25', 1, 2, 3, 5);
INSERT INTO `juegos` VALUES (11, 2, 1, 'Lima', '2021-09-25', 1, 2, 3, 5);
INSERT INTO `juegos` VALUES (12, 2, 1, 'Lima', '2021-09-25', 1, 2, 3, 5);
INSERT INTO `juegos` VALUES (13, 2, 1, 'Lima', '2021-09-25', 1, 2, 3, 5);
INSERT INTO `juegos` VALUES (14, 2, 1, 'Lima', '2021-09-25', 1, 2, 3, 5);
INSERT INTO `juegos` VALUES (15, 2, 1, 'Lima', '2021-09-25', 1, 2, 3, 5);
INSERT INTO `juegos` VALUES (16, 2, 1, 'Lima', '2021-09-25', 1, 2, 3, 5);

-- ----------------------------
-- Table structure for jugadas
-- ----------------------------
DROP TABLE IF EXISTS `jugadas`;
CREATE TABLE `jugadas`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `tipo` int(1) NOT NULL,
  `jugada` varchar(5000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jugadas
-- ----------------------------
INSERT INTO `jugadas` VALUES (1, 1, 'k');
INSERT INTO `jugadas` VALUES (2, 1, 'out');
INSERT INTO `jugadas` VALUES (3, 1, '2out');
INSERT INTO `jugadas` VALUES (4, 1, '3out');
INSERT INTO `jugadas` VALUES (5, 0, 'sf');
INSERT INTO `jugadas` VALUES (6, 0, 'br');
INSERT INTO `jugadas` VALUES (7, 0, 'bb');
INSERT INTO `jugadas` VALUES (8, 0, 'wp');
INSERT INTO `jugadas` VALUES (9, 2, 'h');
INSERT INTO `jugadas` VALUES (10, 2, 'h2');
INSERT INTO `jugadas` VALUES (11, 2, 'h3');
INSERT INTO `jugadas` VALUES (12, 2, 'h4');
INSERT INTO `jugadas` VALUES (13, 0, 'ca');
INSERT INTO `jugadas` VALUES (14, 0, 'ce');
INSERT INTO `jugadas` VALUES (15, 0, '2ce');
INSERT INTO `jugadas` VALUES (16, 0, '3ce');
INSERT INTO `jugadas` VALUES (17, 0, '4ce');

-- ----------------------------
-- Table structure for jugadores
-- ----------------------------
DROP TABLE IF EXISTS `jugadores`;
CREATE TABLE `jugadores`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_persona` int(20) NOT NULL,
  `id_posicion_primaria` int(20) NULL DEFAULT NULL,
  `id_posicion_secundaria` int(20) NULL DEFAULT NULL,
  `id_equipo` int(3) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jugador_persona`(`id_persona`) USING BTREE,
  INDEX `jugador_pos_1`(`id_posicion_primaria`) USING BTREE,
  INDEX `jugador_pos_2`(`id_posicion_secundaria`) USING BTREE,
  INDEX `jugador_equipo`(`id_equipo`) USING BTREE,
  CONSTRAINT `jugador_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `jugador_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `jugador_pos_1` FOREIGN KEY (`id_posicion_primaria`) REFERENCES `posiciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `jugador_pos_2` FOREIGN KEY (`id_posicion_secundaria`) REFERENCES `posiciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jugadores
-- ----------------------------
INSERT INTO `jugadores` VALUES (1, 1, 1, 3, 1);
INSERT INTO `jugadores` VALUES (2, 2, 2, 3, 2);
INSERT INTO `jugadores` VALUES (3, 3, 4, 6, 1);
INSERT INTO `jugadores` VALUES (4, 5, 4, 9, 2);

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombres` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellidos` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tipdoc` char(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `numdoc` char(22) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono` char(22) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES (1, 'papito', 'peres', 'CED', '11111111111', NULL, '8090000000');
INSERT INTO `persona` VALUES (2, 'pepito', 'peralta', 'ced', '00000000000', NULL, NULL);
INSERT INTO `persona` VALUES (3, 'pipito', 'pina', 'pss', '22222222222', NULL, NULL);
INSERT INTO `persona` VALUES (4, 'adonis', 'vasquez', 'ced', '00122255556', NULL, NULL);
INSERT INTO `persona` VALUES (5, 'francis', 'ferrer', 'CED', '00118329580', NULL, '809-404-1896');

-- ----------------------------
-- Table structure for posiciones
-- ----------------------------
DROP TABLE IF EXISTS `posiciones`;
CREATE TABLE `posiciones`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `siglas` char(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posiciones
-- ----------------------------
INSERT INTO `posiciones` VALUES (1, 'picher', 'P');
INSERT INTO `posiciones` VALUES (2, 'cacher', 'C');
INSERT INTO `posiciones` VALUES (3, 'primera', '1ra');
INSERT INTO `posiciones` VALUES (4, 'segunda', '2da');
INSERT INTO `posiciones` VALUES (5, 'tercera', '3ra');
INSERT INTO `posiciones` VALUES (6, 'shor stop', 'SS');
INSERT INTO `posiciones` VALUES (7, 'jardinero izquierdo', 'LF');
INSERT INTO `posiciones` VALUES (8, 'jardinero central', 'CF');
INSERT INTO `posiciones` VALUES (9, 'jardinero derecho', 'RF');
INSERT INTO `posiciones` VALUES (10, 'designado', 'DH');

-- ----------------------------
-- Table structure for temporadas
-- ----------------------------
DROP TABLE IF EXISTS `temporadas`;
CREATE TABLE `temporadas`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `conmemoracion` varchar(5000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `estado` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of temporadas
-- ----------------------------
INSERT INTO `temporadas` VALUES (1, 'adonis', '2021-07-01', 0);

-- ----------------------------
-- Triggers structure for table juegos
-- ----------------------------
DROP TRIGGER IF EXISTS `estadisticas`;
delimiter ;;
CREATE DEFINER = `root`@`localhost` TRIGGER `estadisticas` BEFORE INSERT ON `juegos` FOR EACH ROW BEGIN
   update unidos.estadisticas_equipos 
	 set unidos.estadisticas_equipos.total_juegos = unidos.estadisticas_equipos.total_juegos + 1
	 where unidos.estadisticas_equipos.id_equipo =  NEW.ganador;
	 
	 update unidos.estadisticas_equipos 
	 set unidos.estadisticas_equipos.ganados = unidos.estadisticas_equipos.ganados + 1
	 where unidos.estadisticas_equipos.id_equipo =  NEW.ganador;
	 
	 update unidos.estadisticas_equipos 
	 set unidos.estadisticas_equipos.total_juegos = unidos.estadisticas_equipos.total_juegos + 1
	 where unidos.estadisticas_equipos.id_equipo =  NEW.perdedor;
	 
	 update unidos.estadisticas_equipos 
	 set unidos.estadisticas_equipos.perdidos = unidos.estadisticas_equipos.perdidos + 1
	 where unidos.estadisticas_equipos.id_equipo =  NEW.perdedor;
	 
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table juegos
-- ----------------------------
DROP TRIGGER IF EXISTS `estadisticas2`;
delimiter ;;
CREATE DEFINER = `root`@`localhost` TRIGGER `estadisticas2` AFTER INSERT ON `juegos` FOR EACH ROW BEGIN
	 update unidos.estadisticas_equipos 
	 set unidos.estadisticas_equipos.porcentage = (unidos.estadisticas_equipos.ganados / total_juegos) * 1000
	 where unidos.estadisticas_equipos.id_equipo =  NEW.ganador;
	 
	 update unidos.estadisticas_equipos 
	 set unidos.estadisticas_equipos.porcentage = (unidos.estadisticas_equipos.ganados / total_juegos) * 1000
	 where unidos.estadisticas_equipos.id_equipo =  NEW.perdedor;	 
	 
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
