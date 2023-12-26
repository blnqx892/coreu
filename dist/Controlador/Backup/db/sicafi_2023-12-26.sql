SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS asignacion_activo CASCADE;

CREATE TABLE `asignacion_activo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_asignacion` date NOT NULL,
  `codigo_institucional` varchar(225) NOT NULL,
  `encargado_bien` varchar(225) NOT NULL,
  `estado` enum('Activo','Inactivo') DEFAULT 'Activo',
  `estado_bien` enum('Buen Estado','Descartado') DEFAULT 'Buen Estado',
  `fk_ingreso_entradas` bigint(20) NOT NULL,
  `fk_usuarios` bigint(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `asignacion_activo_pk` (`codigo_institucional`),
  KEY `asignacion_activo_usuarios_id_fk` (`fk_usuarios`),
  KEY `asignacion_activo_ingreso_entradas_id_fk` (`fk_ingreso_entradas`),
  CONSTRAINT `asignacion_activo_ingreso_entradas_id_fk` FOREIGN KEY (`fk_ingreso_entradas`) REFERENCES `ingreso_entradas` (`id`),
  CONSTRAINT `asignacion_activo_usuarios_id_fk` FOREIGN KEY (`fk_usuarios`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO asignacion_activo VALUES("54","2023-12-06","01-060-20-01-313","GUILLERMO ESCOBAR","Activo","Buen Estado","169","76","2023-12-06 17:41:02");
INSERT INTO asignacion_activo VALUES("55","2023-12-06","01-100-10-19-190","GUILLERMO ESCOBAR","Activo","Buen Estado","165","76","2023-12-06 17:42:44");
INSERT INTO asignacion_activo VALUES("56","2023-12-06","01-052-01-04-401","JUANA ELIAS","Activo","Buen Estado","168","69","2023-12-06 17:43:35");
INSERT INTO asignacion_activo VALUES("57","2023-12-07","01-100-20-30-300","HILDA ELIAS","Activo","Buen Estado","163","69","2023-12-06 19:36:57");
INSERT INTO asignacion_activo VALUES("58","2023-12-07","98-678-98-77-123","ROLANDO PERÉZ","Activo","Buen Estado","172","76","2023-12-07 08:42:02");
INSERT INTO asignacion_activo VALUES("59","2023-12-15","223-333-22-22-999","Garcia","Activo","Buen Estado","171","77","2023-12-15 12:26:59");
INSERT INTO asignacion_activo VALUES("60","2023-12-19","12-34-56-789","Magaly","Activo","Buen Estado","177","77","2023-12-19 11:31:33");
INSERT INTO asignacion_activo VALUES("61","2023-12-19","21-34-56-543","prueba","Activo","Buen Estado","180","78","2023-12-19 11:39:30");


DROP TABLE IF EXISTS bitacora CASCADE;

CREATE TABLE `bitacora` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `evento` text NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO bitacora VALUES("1","Inicio Sesión","Admin Todo","2023-12-19 14:15:35");
INSERT INTO bitacora VALUES("2","Se modifico la información de un suministro","Admin Todo","2023-12-19 14:20:17");
INSERT INTO bitacora VALUES("3","Se modifico la información de un suministro","Admin Todo","2023-12-19 14:28:13");
INSERT INTO bitacora VALUES("4","Se registro un nuevo inmueble","Admin Todo","2023-12-19 14:30:55");
INSERT INTO bitacora VALUES("5","Se modifico la información de un inmueble","Admin Todo","2023-12-19 14:31:21");
INSERT INTO bitacora VALUES("6","Se modifico la información de unidad","Admin Todo","2023-12-19 14:34:13");
INSERT INTO bitacora VALUES("7","Se agrego una nueva unidad","Admin Todo","2023-12-19 14:35:45");
INSERT INTO bitacora VALUES("8","Se registro un usuario","Admin Todo","2023-12-19 14:56:06");
INSERT INTO bitacora VALUES("9","Se modifico información de un usuario","Admin Todo","2023-12-19 15:01:46");
INSERT INTO bitacora VALUES("10","Se dio de alta a un usuario"," ","2023-12-19 15:04:29");
INSERT INTO bitacora VALUES("11","Se dio de alta a un usuario","Admin Todo","2023-12-19 15:05:31");
INSERT INTO bitacora VALUES("12","Se dio de baja a un usuario"," ","2023-12-19 15:06:47");
INSERT INTO bitacora VALUES("13","Se dio de baja a un usuario","Admin Todo","2023-12-19 15:07:43");
INSERT INTO bitacora VALUES("14","Se dio de alta a un usuario","Admin Todo","2023-12-19 15:08:22");
INSERT INTO bitacora VALUES("15","Cerro Sesión","Admin Todo","2023-12-19 15:10:20");
INSERT INTO bitacora VALUES("16","Inicio Sesión","Admin Todo","2023-12-19 15:10:32");
INSERT INTO bitacora VALUES("17","Cerro Sesión","Admin Todo","2023-12-19 15:19:48");
INSERT INTO bitacora VALUES("18","Inicio Sesión","ESTHEPHANIE CONCENCION CASTILLO ELIAS","2023-12-19 15:20:03");
INSERT INTO bitacora VALUES("19","Cerro Sesión","ESTHEPHANIE CONCENCION CASTILLO ELIAS","2023-12-19 15:25:02");
INSERT INTO bitacora VALUES("20","Inicio Sesión","BENJAMÍN GARCÍA","2023-12-19 15:25:22");
INSERT INTO bitacora VALUES("21","Cerro Sesión","BENJAMÍN GARCÍA","2023-12-19 15:25:43");
INSERT INTO bitacora VALUES("22","Inicio Sesión","BLANCA LISSETTE MELARA LAINEZ","2023-12-19 15:26:56");
INSERT INTO bitacora VALUES("23","Cerro Sesión","BLANCA LISSETTE MELARA LAINEZ","2023-12-19 15:36:28");
INSERT INTO bitacora VALUES("24","Inicio Sesión","OSCAR ARMANDO CASTILLO QUINTANILLA","2023-12-19 15:36:41");
INSERT INTO bitacora VALUES("25","Cerro Sesión","OSCAR ARMANDO CASTILLO QUINTANILLA","2023-12-19 15:36:48");
INSERT INTO bitacora VALUES("26","Inicio Sesión","ANTONIO UMAÑA","2023-12-19 15:38:05");
INSERT INTO bitacora VALUES("27","Cerro Sesión","ANTONIO UMAÑA","2023-12-19 15:40:56");
INSERT INTO bitacora VALUES("28","Inicio Sesión","ANTONIO UMAÑA","2023-12-19 15:42:06");
INSERT INTO bitacora VALUES("29","Cerro Sesión","ANTONIO UMAÑA","2023-12-19 15:42:28");
INSERT INTO bitacora VALUES("30","Inicio Sesión","BLANCA LISSETTE MELARA LAINEZ","2023-12-19 15:43:11");
INSERT INTO bitacora VALUES("31","Inicio Sesión","ANTONIO UMAÑA","2024-01-03 15:47:55");
INSERT INTO bitacora VALUES("32","Inicio Sesión","ESTHEPHANIE CONCENCION CASTILLO ELIAS","2024-01-03 15:51:10");
INSERT INTO bitacora VALUES("33","Inicio Sesión","ESTHEPHANIE CONCENCION CASTILLO ELIAS","2024-01-03 15:52:02");
INSERT INTO bitacora VALUES("34","Cerro Sesión","ESTHEPHANIE CONCENCION CASTILLO ELIAS","2024-01-03 15:55:30");
INSERT INTO bitacora VALUES("35","Cerro Sesión","ANTONIO UMAÑA","2024-01-03 15:55:35");
INSERT INTO bitacora VALUES("36","Cerro Sesión","BLANCA LISSETTE MELARA LAINEZ","2024-01-03 15:55:38");
INSERT INTO bitacora VALUES("37","Inicio Sesión","Admin Todo","2023-12-20 09:07:44");
INSERT INTO bitacora VALUES("38","Inicio Sesión","Admin Todo","2023-12-23 13:38:43");
INSERT INTO bitacora VALUES("39","Inicio Sesión","Admin Todo","2023-12-23 14:19:36");
INSERT INTO bitacora VALUES("40","Cerro Sesión","Admin Todo","2023-12-23 14:35:18");
INSERT INTO bitacora VALUES("41","Inicio Sesión","ESTHEPHANIE CONCENCION CASTILLO ELIAS","2023-12-23 14:35:32");
INSERT INTO bitacora VALUES("42","Cerro Sesión","ESTHEPHANIE CONCENCION CASTILLO ELIAS","2023-12-23 14:49:51");
INSERT INTO bitacora VALUES("43","Inicio Sesión","Admin Todo","2023-12-23 14:50:10");
INSERT INTO bitacora VALUES("44","Inicio Sesión","Admin Todo","2023-12-26 11:59:46");


DROP TABLE IF EXISTS categorias CASCADE;

CREATE TABLE `categorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(225) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `vida_util` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO categorias VALUES("13","MOBILIARIO","2023-12-06 16:38:04","5");
INSERT INTO categorias VALUES("14","EQUIPO REFRIGERANTE","2023-12-06 16:44:33","8");
INSERT INTO categorias VALUES("15","EQUIPO VISUAL Y FOTOGRÁFICO","2023-12-06 17:03:08","10");
INSERT INTO categorias VALUES("16","TRANSPORTE","2023-12-06 17:04:30","10");
INSERT INTO categorias VALUES("17","EQUIPO INFORMATICO","2023-12-06 17:06:15","10");


DROP TABLE IF EXISTS categorias_suministros CASCADE;

CREATE TABLE `categorias_suministros` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_categoria` varchar(25) NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO categorias_suministros VALUES("1","Alimentos");
INSERT INTO categorias_suministros VALUES("2","Materiales de Oficina");
INSERT INTO categorias_suministros VALUES("3","Materiales Pegamento");
INSERT INTO categorias_suministros VALUES("4","Papel");
INSERT INTO categorias_suministros VALUES("5","Desechables");


DROP TABLE IF EXISTS detalle_requisicion CASCADE;

CREATE TABLE `detalle_requisicion` (
  `id` bigint(20) NOT NULL,
  `requisicion_id` int(11) NOT NULL,
  `suministro_id` bigint(20) NOT NULL,
  `cantidad_solicitada` int(11) NOT NULL,
  `cantidad_aprobada` int(11) DEFAULT NULL,
  `cantidad_despachada` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `detalle_requisicion_id_uindex` (`id`),
  KEY `detalle_requisicion_ingreso_suministros_id_fk` (`suministro_id`),
  KEY `detalle_requisicion_requisicion_suministro_id_fk` (`requisicion_id`),
  CONSTRAINT `detalle_requisicion_ingreso_suministros_id_fk` FOREIGN KEY (`suministro_id`) REFERENCES `ingreso_suministros` (`id`),
  CONSTRAINT `detalle_requisicion_requisicion_suministro_id_fk` FOREIGN KEY (`requisicion_id`) REFERENCES `requisicion_suministro` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO detalle_requisicion VALUES("1701961106755183","1701961106","1701906637","3","3","1");
INSERT INTO detalle_requisicion VALUES("1704318212215747","1704318212","1701906479","3","3","3");


DROP TABLE IF EXISTS estado_requisicion CASCADE;

CREATE TABLE `estado_requisicion` (
  `id` int(11) NOT NULL,
  `nombre_estado` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `codigo` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estado_requisicion_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO estado_requisicion VALUES("1","Pendiente de aprobación","pendiente.aprobacion");
INSERT INTO estado_requisicion VALUES("2","Pendiente de despacho","pendiente.despacho");
INSERT INTO estado_requisicion VALUES("3","Finalizado","finalizado");


DROP TABLE IF EXISTS ingreso_entradas CASCADE;

CREATE TABLE `ingreso_entradas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_adquisicion` date NOT NULL,
  `numero_factura` varchar(225) DEFAULT NULL,
  `costo_adquisicion` float NOT NULL COMMENT 'esta columna guarda el costo en centavos de dolares',
  `nombre_adquisicion` varchar(250) NOT NULL,
  `serie_adquisicion` varchar(225) DEFAULT NULL,
  `marca` varchar(225) NOT NULL,
  `modelo` varchar(225) NOT NULL,
  `color` varchar(225) NOT NULL,
  `descripcion_adquisicion` varchar(225) DEFAULT NULL,
  `boolean_transporte` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'esto es para el switch de la vista',
  `numero_motor` varchar(225) DEFAULT NULL,
  `numero_placa` varchar(225) DEFAULT NULL,
  `numero_chasis` varchar(225) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `cargo` enum('Donado','Comprado','Otros') NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'esta sirve para cambiar el estado para saber si es verdadero o no',
  `vida_util` int(11) DEFAULT NULL,
  `fk_categoria` bigint(20) NOT NULL,
  `fk_proveedores` bigint(20) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `valor_rescate` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ingreso_entradas_proveedores_id_fk` (`fk_proveedores`),
  KEY `ingreso_entradas_categorias_id_fk` (`fk_categoria`),
  CONSTRAINT `ingreso_entradas_categorias_id_fk` FOREIGN KEY (`fk_categoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `ingreso_entradas_proveedores_id_fk` FOREIGN KEY (`fk_proveedores`) REFERENCES `proveedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO ingreso_entradas VALUES("163","2023-12-06","0001","159","OASIS","","FRIGIDAIR","FQF153MBIN","BLANCO","undefined","0","","","","0","Comprado","1","","14","18","2023-12-06 10:14:07","20");
INSERT INTO ingreso_entradas VALUES("165","2023-12-06","0002","2100","AIRE ACONDICIONADO","139263","CHIVOs","GP-S24000INV","BLANCO","undefined","0","","","","0","Comprado","1","","14","20","2023-12-06 10:46:57","263");
INSERT INTO ingreso_entradas VALUES("167","0000-00-00","0003","1350","MESA OVALADA DE VIDRIO","459002","CONCEPTos","AUSTRIA OVALADA","NEGRO","undefined","0","","","","0","Comprado","1","0","13","20","2023-12-06 10:57:13","270");
INSERT INTO ingreso_entradas VALUES("168","2023-12-06","0004","95","SILLA EJECUTIVA ","31796","MOBELT","21964 - GRAY","NEGRO","undefined","0","","","","0","Comprado","1","","13","14","2023-12-06 11:02:06","19");
INSERT INTO ingreso_entradas VALUES("169","2023-12-06","0005","75","PANTALLA DE PROYECCIÓN ","234","KLIP","KPS-102","BLANCO","undefined","0","","","","0","Comprado","1","","15","17","2023-12-06 11:12:16","8");
INSERT INTO ingreso_entradas VALUES("170","2023-12-06","0006","19800","TOYOTA TACOMA sr5 2017","","TOYOTA","TACOMA","NEGRO","undefined","1","89661OKC60","P246182","9BRB43BR","6","Comprado","1","","16","15","2023-12-06 12:28:24","1980");
INSERT INTO ingreso_entradas VALUES("171","0000-00-00","000701","139","ARCHIVERO ROBOT LINEA PRESIDENCIAL","ewfew","MODUTEC","MT-P007","NEGRO","undefined","0","","","","0","Comprado","1","0","16","14","2023-12-06 15:23:58","14");
INSERT INTO ingreso_entradas VALUES("172","0000-00-00","1290","250","ARCHIVERO 3 GAVETAS","124","MAX MOBILET","M7-AROOS","BLANCO","undefined","0","","","","0","Comprado","1","0","13","21","2023-12-07 08:40:48","50");
INSERT INTO ingreso_entradas VALUES("173","2023-12-19","12","34.78","Silla de Escritorio","123","Xtreme","ax1","Negra","undefined","0","","","","0","Comprado","1","","13","14","2023-12-19 10:52:08","7");
INSERT INTO ingreso_entradas VALUES("174","2023-12-19","13","23.89","Teclado","123","Dell","del opx","negro","undefined","0","","","","0","Comprado","1","","17","14","2023-12-19 10:55:18","2");
INSERT INTO ingreso_entradas VALUES("175","2023-12-19","14","89.9","Escritorio","567","Xtreme","xd1","Cafe","undefined","0","","","","0","Comprado","1","","13","19","2023-12-19 10:58:46","18");
INSERT INTO ingreso_entradas VALUES("176","2023-12-19","15","100.9","Estante de metal","123","Warrior","xqa12","Gris","undefined","0","","","","0","Comprado","1","","13","21","2023-12-19 11:02:33","20");
INSERT INTO ingreso_entradas VALUES("177","0000-00-00","1980","460.99","COMPUTADORA DE ESCRITORIO","1234","LENOVO","IDEAPAD 3","BLANCA","undefined","0","","","","0","Comprado","1","0","17","19","2023-12-19 11:12:45","46");
INSERT INTO ingreso_entradas VALUES("178","2023-12-19","123","76543","wer","rtyuytr","sdcfghj","hjkjhg","hjgcx","undefined","0","","","","0","Comprado","1","","13","19","2023-12-19 11:14:14","15309");
INSERT INTO ingreso_entradas VALUES("179","0000-00-00","23456789","98765","prueba","ejemplo editado","fghgg","fghgkjh","hgjkhj","undefined","0","","","","0","Comprado","1","0","17","16","2023-12-19 11:16:52","9877");
INSERT INTO ingreso_entradas VALUES("180","2023-12-19","2345","678.9","PRUEBA","PRUEBA","PRUEBA","PRUEBA","PRUEBA","undefined","0","","","","0","Comprado","1","","13","19","2023-12-19 11:27:59","136");


DROP TABLE IF EXISTS ingreso_suministros CASCADE;

CREATE TABLE `ingreso_suministros` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_suministro` date NOT NULL,
  `nombre_suministro` varchar(225) NOT NULL,
  `marca` varchar(225) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL COMMENT 'se manejara en centavos',
  `descripcion` varchar(225) DEFAULT NULL,
  `presentacion` varchar(50) DEFAULT NULL,
  `unidad_medida` varchar(225) DEFAULT NULL,
  `existencia_minima` int(11) DEFAULT NULL,
  `existencia_maxima` int(11) DEFAULT NULL,
  `almacen` varchar(50) DEFAULT NULL,
  `estante` varchar(25) DEFAULT NULL,
  `entrepano` varchar(25) DEFAULT NULL,
  `casilla` varchar(25) DEFAULT NULL,
  `numero_tarjeta` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `stock_suministros` int(11) NOT NULL,
  `ubicacion` varchar(225) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `codigo_barra` varchar(225) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1703007794 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO ingreso_suministros VALUES("1701906479","0000-00-00","Ampo/archivador t835","","0","0","","Individual","","10","20","","","","","0","0","0","","2","7441046359418","2023-12-06 17:47:59");
INSERT INTO ingreso_suministros VALUES("1701906637","0000-00-00","Folder manila t/ carta","","0","0","","Paquete","","10","25","","","","","0","0","0","","2","20401702","2023-12-06 17:50:37");
INSERT INTO ingreso_suministros VALUES("1701907096","0000-00-00","Cafe Coex Canela 10 - 400gr","","0","0","","Bolsa","","6","10","","","","","0","0","0","","1","7411801101446","2023-12-06 17:58:16");
INSERT INTO ingreso_suministros VALUES("1701907210","0000-00-00","Cinta adhesiva doble cara 1x720 pulgadas","","0","0","","Individual","","5","10","","","","","0","0","0","","3","764608009260","2023-12-06 18:00:10");
INSERT INTO ingreso_suministros VALUES("1701907306","0000-00-00","Azucar Blanca Del Canal - 500Gr","","0","0","","Individual","","4","6","","","","","0","0","0","","1","7411500000927","2023-12-06 18:01:46");
INSERT INTO ingreso_suministros VALUES("1701907487","0000-00-00","Papel Bond T/C","","0","0","","Resma","","10","30","","","","","0","0","0","","2","20402280","2023-12-06 18:04:47");
INSERT INTO ingreso_suministros VALUES("1701907650","0000-00-00","Bolígrafos básicos, Pen+Gear, color Azul","","0","0","","Caja","","6","20","","","","","0","0","0","","2","6941288754855","2023-12-06 18:07:30");
INSERT INTO ingreso_suministros VALUES("1701907716","0000-00-00","Vaso Supermax Desechable N12 24Ea","","0","0","","Paquete","","6","10","","","","","0","0","0","","5","7441078222841","2023-12-06 18:08:36");
INSERT INTO ingreso_suministros VALUES("1701960830","0000-00-00","Bote de Pegamento","","0","0","","Bote Individual","","5","7","","","","","0","0","0","","3","17754388100","2023-12-07 08:53:50");
INSERT INTO ingreso_suministros VALUES("1703007793","0000-00-00","PRUEBA editar","","0","0","","PRUEBA","","10","40","","","","","0","0","0","","5","12345","2023-12-19 11:43:13");


DROP TABLE IF EXISTS kardex CASCADE;

CREATE TABLE `kardex` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `concepto` varchar(225) NOT NULL,
  `movimiento` int(11) NOT NULL,
  `cantidad_entrada` int(11) NOT NULL,
  `precio_entrada` float NOT NULL,
  `cantidad_salida` int(11) NOT NULL,
  `saldo_articulos` int(11) NOT NULL,
  `fondos_procedencia` int(11) NOT NULL,
  `precio_salida` float NOT NULL,
  `fk_ingreso_suministros` bigint(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `kardex_ingreso_suministros_id_fk` (`fk_ingreso_suministros`),
  CONSTRAINT `kardex_ingreso_suministros_id_fk` FOREIGN KEY (`fk_ingreso_suministros`) REFERENCES `ingreso_suministros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1704318900146021 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO kardex VALUES("1701906513","2023-12-07","Compra Ampo/Archivador T835 Palanca T/Oficio","0","8","3.75","0","0","1","0","1701906479","2023-12-06 17:48:33");
INSERT INTO kardex VALUES("1701906546","2023-12-07","compra Ampo/Archivador T835 Palanca T/Oficio","0","6","3.75","0","0","1","0","1701906479","2023-12-06 17:49:06");
INSERT INTO kardex VALUES("1701906664","2023-12-07","Compra Folder Manila T/ Carta","0","12","0.15","0","0","1","0","1701906637","2023-12-06 17:51:04");
INSERT INTO kardex VALUES("1701907128","2023-12-07","Compra Cafe Coex Canela 10 - 400gr","0","7","3.89","0","0","1","0","1701907096","2023-12-06 17:58:48");
INSERT INTO kardex VALUES("1701907237","2023-12-07","Compra Cinta adhesiva doble cara 1x720 pulgadas","0","6","2.5","0","0","1","0","1701907210","2023-12-06 18:00:37");
INSERT INTO kardex VALUES("1701907326","2023-12-07","Compra Azucar Blanca Del Canal - 500Gr","0","5","0.54","0","0","1","0","1701907306","2023-12-06 18:02:06");
INSERT INTO kardex VALUES("1701907548","2023-12-07","Compra Papel Bond T/C","0","12","2.15","0","0","1","0","1701907487","2023-12-06 18:05:48");
INSERT INTO kardex VALUES("1701907670","2023-12-07","Compra","0","8","2","0","0","1","0","1701907650","2023-12-06 18:07:50");
INSERT INTO kardex VALUES("1701907738","2023-12-07","Compra Vaso Supermax Desechable N12 24Ea","0","8","1.02","0","0","1","0","1701907716","2023-12-06 18:08:58");
INSERT INTO kardex VALUES("1701960883","2023-12-07","Compra de bote de pegamento","0","6","3.5","0","0","1","0","1701960830","2023-12-07 08:54:43");
INSERT INTO kardex VALUES("1701961823","2023-12-07","nueva compra de folder","0","3","0.2","0","0","1","0","1701907487","2023-12-07 09:10:23");
INSERT INTO kardex VALUES("1702662866","2023-12-15","Salida de emergencia","0","0","0","3","0","1","3.75","1701906479","2023-12-15 11:54:26");
INSERT INTO kardex VALUES("1702662940","2023-12-15","Compra de ampos","0","5","1.75","0","0","1","0","1701906479","2023-12-15 11:55:40");
INSERT INTO kardex VALUES("1702663025","2023-12-15","Salida de emergencia","0","0","0","2","0","1","1.75","1701906479","2023-12-15 11:57:05");
INSERT INTO kardex VALUES("1702665161","2023-12-15","Compra de pegamento","0","8","1.5","0","0","1","0","1701960830","2023-12-15 12:32:41");
INSERT INTO kardex VALUES("1703007910","2023-12-19","COMPRA","0","30","1.5","0","0","1","0","1703007793","2023-12-19 11:45:10");
INSERT INTO kardex VALUES("1703014394","2023-12-19","Salida de emergencia","0","0","0","3","0","1","1.02","1701907716","2023-12-19 13:33:14");
INSERT INTO kardex VALUES("1703014501","2023-12-19","Salida","0","0","0","2","0","1","1.02","1701907716","2023-12-19 13:35:01");
INSERT INTO kardex VALUES("1703014619","2023-12-19","compra","0","10","1.5","0","0","2","0","1701907716","2023-12-19 13:36:59");
INSERT INTO kardex VALUES("1703014646","2023-12-19","salida","0","0","0","2","0","2","1.5","1701907716","2023-12-19 13:37:26");
INSERT INTO kardex VALUES("1703015218","2023-12-19","salida","0","0","0","5","0","2","1.5","1701907716","2023-12-19 13:46:58");
INSERT INTO kardex VALUES("1703015585","2023-12-19","compra","0","12","1","0","0","1","0","1701907716","2023-12-19 13:53:05");
INSERT INTO kardex VALUES("1703015968","2023-12-19","salida","0","0","0","4","0","1","1.5","1701960830","2023-12-19 13:59:28");
INSERT INTO kardex VALUES("1703016798","2023-12-19","salida","0","0","0","7","0","1","1.5","1701960830","2023-12-19 14:13:19");
INSERT INTO kardex VALUES("1701961596615938","2023-12-07","Salida de requisicion: 1701961106","0","0","0","1","0","1","0.15","1701906637","2023-12-07 16:06:36");
INSERT INTO kardex VALUES("1704318900146020","2024-01-03","Salida de requisicion: 1704318212","0","0","0","3","0","1","9.67105","1701906479","2024-01-03 22:55:00");


DROP TABLE IF EXISTS mantenimiento_activos CASCADE;

CREATE TABLE `mantenimiento_activos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_movimiento` date NOT NULL,
  `tipo_movimiento` enum('Prestamo','TrasladoDefinitivo','Reparación','Inservible','Robo y/o Hurto','Obsoleto') NOT NULL,
  `observaciones` varchar(225) DEFAULT NULL,
  `tipo_registro` enum('Mantenimiento','Descargo') NOT NULL DEFAULT 'Mantenimiento' COMMENT 'se usara para identificar entre moviminetos de activo y descargo de activo se tomara el nombre para indicar que es moviento de activo y para descargo de activo ',
  `fk_asignacion_activo` bigint(20) NOT NULL,
  `fk_unidades` bigint(20) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `mantenimiento_activos_unidades_id_fk` (`fk_unidades`),
  KEY `mantenimiento_activos_ingreso_entradas_id_fk` (`fk_asignacion_activo`),
  CONSTRAINT `mantenimiento_activos_asignacion_activo_id_fk` FOREIGN KEY (`fk_asignacion_activo`) REFERENCES `asignacion_activo` (`id`),
  CONSTRAINT `mantenimiento_activos_unidades_id_fk` FOREIGN KEY (`fk_unidades`) REFERENCES `unidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO mantenimiento_activos VALUES("1","2023-12-07","Prestamo","ESTA A PRESTAMO A CONTABILIDAD","Mantenimiento","56","33","2023-12-06 19:38:26");
INSERT INTO mantenimiento_activos VALUES("2","2023-12-07","Prestamo","PRESTAMO A UNIDA DE CONTABILIDAD","Mantenimiento","54","33","2023-12-07 08:44:04");
INSERT INTO mantenimiento_activos VALUES("3","2023-12-07","Inservible","DAÑO POR FUGA","Descargo","57","51","2023-12-07 08:46:47");
INSERT INTO mantenimiento_activos VALUES("4","2023-12-19","Prestamo","PRESTAMO","Mantenimiento","54","55","2023-12-19 11:35:13");
INSERT INTO mantenimiento_activos VALUES("5","2023-12-19","Inservible","OBSOLETO","Descargo","60","2","2023-12-19 11:37:08");
INSERT INTO mantenimiento_activos VALUES("6","2023-12-19","Robo y/o Hurto","desaparecido","Descargo","61","37","2023-12-19 11:40:02");


DROP TABLE IF EXISTS mobiliario_otros CASCADE;

CREATE TABLE `mobiliario_otros` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `nombre` varchar(225) NOT NULL,
  `modelo` varchar(225) NOT NULL,
  `valor` int(11) NOT NULL,
  `descripcion` varchar(225) NOT NULL,
  `estado_mobi` enum('Activo','Inactivo') DEFAULT 'Activo',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO mobiliario_otros VALUES("1","2023-12-06","ESCRITORIO PERSONAL ","NOA","101","gales wengueMaterial: aglomerado de madera recubierto con melamina","Activo","2023-12-15 12:23:38");
INSERT INTO mobiliario_otros VALUES("2","2023-12-06","LOCKER DE 3 PUERTAS NEGRO","MT-CA3","189","HECHO DEMETAL DE ALTO CALIBRE, DE TRESCUERPOS CON LLAVE. ","Activo","2023-12-06 17:35:34");
INSERT INTO mobiliario_otros VALUES("3","2023-12-06","SILLA SECRETARIAL MESH BICOLOR","LKC-21001","179","RESPALDO DE MESHASIENTO DE TELA CON ESPONJA DE ALTA DENSIDAD","Activo","2023-12-06 17:36:56");
INSERT INTO mobiliario_otros VALUES("4","2023-12-19","PRUEBA V","PRUEBA","567891","PRUEBA","Activo","2023-12-19 14:31:21");


DROP TABLE IF EXISTS proveedores CASCADE;

CREATE TABLE `proveedores` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(225) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO proveedores VALUES("13","FREUND","2023-12-06 10:07:41");
INSERT INTO proveedores VALUES("14","OFFICE DEPOT","2023-12-06 10:08:06");
INSERT INTO proveedores VALUES("15","TOYOTA","2023-12-06 10:08:12");
INSERT INTO proveedores VALUES("16","RADIOSHACK","2023-12-06 10:10:00");
INSERT INTO proveedores VALUES("17","STB COMPUTERS","2023-12-06 10:11:03");
INSERT INTO proveedores VALUES("18","WALMART","2023-12-06 10:13:36");
INSERT INTO proveedores VALUES("19","PRADO","2023-12-06 10:21:47");
INSERT INTO proveedores VALUES("20","VIDRI","2023-12-06 10:24:24");
INSERT INTO proveedores VALUES("21","TROPIGAS","2023-12-07 08:39:19");


DROP TABLE IF EXISTS requisicion_suministro CASCADE;

CREATE TABLE `requisicion_suministro` (
  `id` int(11) NOT NULL,
  `unidad_id` bigint(20) NOT NULL,
  `fecha_requisicion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `aprobado_por` int(11) DEFAULT NULL,
  `despachado_por` int(11) DEFAULT NULL,
  `fecha_aprobacion` datetime DEFAULT NULL,
  `fecha_despacho` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `requisicion_suministro_id_uindex` (`id`),
  KEY `requisicion_suministro_estado_requisicion_id_fk` (`estado_id`),
  KEY `requisicion_suministro_unidades_id_fk` (`unidad_id`),
  CONSTRAINT `requisicion_suministro_estado_requisicion_id_fk` FOREIGN KEY (`estado_id`) REFERENCES `estado_requisicion` (`id`),
  CONSTRAINT `requisicion_suministro_unidades_id_fk` FOREIGN KEY (`unidad_id`) REFERENCES `unidades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO requisicion_suministro VALUES("1701961106","53","2023-12-07 00:00:00","2023-12-07 15:58:26","73","3","78","71","2023-12-07 16:04:09","2023-12-07 16:06:36");
INSERT INTO requisicion_suministro VALUES("1704318212","53","2023-12-19 00:00:00","2024-01-03 22:43:32","73","3","78","71","2024-01-03 22:49:31","2024-01-03 22:55:00");


DROP TABLE IF EXISTS requisicion_suministros CASCADE;

CREATE TABLE `requisicion_suministros` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_solicitud` datetime NOT NULL,
  `unidad_medida` varchar(225) DEFAULT NULL,
  `descripcion_suminstro` varchar(250) NOT NULL,
  `cantidad` int(11) NOT NULL COMMENT 'tiene que ser igual o menor que ingreso de suministros',
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `aprobacion` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'siempre y cuando se tengan disponibles los suministros que se esten solicitando',
  `fk_unidades` bigint(20) NOT NULL,
  `fk_ingreso_suminitros` bigint(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `requisicion_suministros_unidades_id_fk` (`fk_unidades`),
  KEY `requisicion_suministros_ingreso_suministros_id_fk` (`fk_ingreso_suminitros`),
  CONSTRAINT `requisicion_suministros_ingreso_suministros_id_fk` FOREIGN KEY (`fk_ingreso_suminitros`) REFERENCES `ingreso_suministros` (`id`),
  CONSTRAINT `requisicion_suministros_unidades_id_fk` FOREIGN KEY (`fk_unidades`) REFERENCES `unidades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



DROP TABLE IF EXISTS roles CASCADE;

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rol` enum('Administrador','Activo','Almacen','UACI','Unidad','Seguridad') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO roles VALUES("1","Administrador");
INSERT INTO roles VALUES("2","Activo");
INSERT INTO roles VALUES("3","Almacen");
INSERT INTO roles VALUES("4","UACI");
INSERT INTO roles VALUES("5","Unidad");
INSERT INTO roles VALUES("6","Seguridad");


DROP TABLE IF EXISTS unidades CASCADE;

CREATE TABLE `unidades` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_unidad` varchar(225) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unidades_pk2` (`nombre_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO unidades VALUES("2","INFORMATICA","2023-06-25 19:21:43");
INSERT INTO unidades VALUES("28","ACTIVO FIJ0","2023-12-06 15:47:11");
INSERT INTO unidades VALUES("29","SALA DE REUNIONES","2023-12-06 15:50:27");
INSERT INTO unidades VALUES("30","MEDIO AMBIENTE","2023-12-06 15:52:40");
INSERT INTO unidades VALUES("31","CEMENTERIO","2023-12-06 15:53:13");
INSERT INTO unidades VALUES("32","RECURSOS HUMANOS","2023-12-06 15:54:47");
INSERT INTO unidades VALUES("33","CONTABILIDAD","2023-12-06 16:02:30");
INSERT INTO unidades VALUES("35","TESORERIA","2023-12-06 16:03:13");
INSERT INTO unidades VALUES("37","GANADERIA","2023-12-06 16:03:46");
INSERT INTO unidades VALUES("39","CATASTRO","2023-12-06 16:04:01");
INSERT INTO unidades VALUES("41","CARNET DE MINORIDAD","2023-12-06 16:04:18");
INSERT INTO unidades VALUES("43","PROYECCIÓN SOCIAL","2023-12-06 16:04:41");
INSERT INTO unidades VALUES("45","ALMACÉN","2023-12-06 16:05:25");
INSERT INTO unidades VALUES("47","UCP","2023-12-06 16:05:30");
INSERT INTO unidades VALUES("49","GERENCIA","2023-12-06 16:05:46");
INSERT INTO unidades VALUES("51","REGISTRO FAMILIAR","2023-12-06 16:12:35");
INSERT INTO unidades VALUES("53","CUENTAS CORRIENTES","2023-12-06 16:15:20");
INSERT INTO unidades VALUES("55","CAM","2023-12-07 09:14:31");
INSERT INTO unidades VALUES("57","MERCADO","2023-12-19 14:35:45");


DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(225) NOT NULL,
  `apellido` varchar(225) NOT NULL,
  `usuario` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contrasena` varchar(225) NOT NULL,
  `fk_rol` bigint(20) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') DEFAULT 'Activo',
  `fk_unidades` bigint(20) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(25) DEFAULT NULL,
  `token` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `token_password` int(100) DEFAULT NULL,
  `password_request` int(100) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_pk` (`email`),
  KEY `usuarios_unidades_id_fk` (`fk_unidades`),
  KEY `usuarios_roles_id_fk` (`fk_rol`),
  CONSTRAINT `usuarios_roles_id_fk` FOREIGN KEY (`fk_rol`) REFERENCES `roles` (`id`),
  CONSTRAINT `usuarios_unidades_id_fk` FOREIGN KEY (`fk_unidades`) REFERENCES `unidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuarios VALUES("50","Admin","Todo","admin","Administrador@gmail.com","$2y$10$5PaItFkyq1dE/bO4/EnR0evCjh1khcOTcw2FNeWbw4ssJzRydlM/K","1","Activo","2","","","","","","2023-10-12 16:31:34");
INSERT INTO usuarios VALUES("69","JUANA HILDA","ELIAS BARRERA","HILDA","BARERRA@GMAIL.COM","$2y$10$cIkuLjr27n5vJZF1PrR5oOLWKst7Ak7JoJu42oypn2zXGsKTAaaVy","5","Activo","51","","","","","","2023-12-06 16:14:04");
INSERT INTO usuarios VALUES("70","OSCAR ARMANDO","CASTILLO QUINTANILLA","OSCAR","OSCAR@GMAIL.COM","$2y$10$YX/SLTqvwPlJdpJyQHPaouQ533MaoQYjZ6YKpmaQr7pLIzU3FDDCm","2","Activo","28","","","","","","2023-12-06 16:32:52");
INSERT INTO usuarios VALUES("71","ESTHEPHANIE CONCENCION","CASTILLO ELIAS","FANY","FANY@GMAIL.COM","$2y$10$ERu6tmh6AakKpj8njRuPf.XZc4o2UL1wS.nTld1zDDSx1mvnsmqO6","3","Activo","45","","","","","","2023-12-06 16:34:34");
INSERT INTO usuarios VALUES("72","NATALIE JOSABETH","CASTILLO ELIAS","NATALIE17","castillonatalie72@gmail,com","$2y$10$0Lak0PEq6mu9pwB43ulh4uGwXUSsghQIjr0VBYKvtuuxCp/Qdvb36","4","Activo","47","","","","","","2023-12-06 16:43:43");
INSERT INTO usuarios VALUES("73","BLANCA LISSETTE","MELARA LAINEZ","MELZ","483melz@gmail.com","$2y$10$db015jj4iezWGGbA/UQHteUEMIfGoGQih9TfwB3ELZD8c1jpcKUGq","5","Activo","53","","","","0","0","2023-12-06 17:04:18");
INSERT INTO usuarios VALUES("74","DANIELA CECILIA","ORELLANA CASTILLO","DANIELA","josabethcastillo72@gmail.com","$2y$10$x3TW/uxRcTBop./8JHJjKeWUkWoBnCGbD8iufnH87oEgpacDlAW.O","5","Activo","49","","","","","","2023-12-06 17:29:22");
INSERT INTO usuarios VALUES("75","ESTEBAN XAVIER","ORELLANA CASTILLO","ESTEBAN","ESTABAN@gmail.com","$2y$10$RoNxiZjXKqpGSo.b2bg5E.UK7e5PDyx/Rf0sYlqPbTK5fv56qFJCq","5","Activo","41","","","","","","2023-12-06 17:30:22");
INSERT INTO usuarios VALUES("76","GUILLERMO ARNOLDO ","ESCOBAR","ARNOLDO ","arnoldo@gmail.com","$2y$10$xx5g.EqdSIUD62EWOHxmeOBMin5c.PZa2pErYjoedcfmv53KBSDk6","5","Activo","29","","","","","","2023-12-06 17:39:20");
INSERT INTO usuarios VALUES("77","BENJAMÍN","GARCÍA","bgarcia","bgarcia@gmail.com","$2y$10$EQTrOcIn387MR6sRkL0lu.e5Og36OQMoOp.qGmyPBpyqpjJQuitpa","6","Activo","2","","","","","","2023-12-07 00:28:11");
INSERT INTO usuarios VALUES("78","ANTONIO","UMAÑA","ANTONIO","antonio@gmail.com","$2y$10$UW5gjnr/9DHlE1OUipp6O.RMNUDYtsen4Ln.9kUoMbz/EOFCDoI1y","4","Activo","37","","","","","","2023-12-07 09:03:17");
INSERT INTO usuarios VALUES("79","HOLA","MUNDO","hola","hola@gmail.com","$2y$10$iKLsxZUlwh7/kmupxQag7.GnGZLsagkL.WcHDyM5uvG6R.kftGOoO","5","Inactivo","57","","","","","","2023-12-19 14:36:31");
INSERT INTO usuarios VALUES("80","asdf","fdhnhg","fdhngf","gfhg@gfhd.com","$2y$10$2Sd/S550xazj9JZojUcOoOpVNC7mt7OB1i79J9Ix5nKxkqVs2KzCG","5","Activo","31","","","","","","2023-12-19 14:38:43");
INSERT INTO usuarios VALUES("81","qwertyu","fghjnm,.","fghjk","gfhjk@hsajsa.com","$2y$10$FHMvngacbu1QDcUlI1o8au1uZ6fn1L/3KAxMQ5NRpxWzoSNlhFrUK","5","Activo","33","","","","","","2023-12-19 14:56:06");


SET FOREIGN_KEY_CHECKS=1;

