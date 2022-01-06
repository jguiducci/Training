CREATE DATABASE web_idea;

use web_idea;

CREATE TABLE `actividadinscripciones` (
 `Id_Cliente` bigint(20) NOT NULL,
 `nombre` varchar(150) NOT NULL,
 `email` varchar(150) NOT NULL,
 `empresa` varchar(150) NOT NULL,
 `Nombre_Fantasia` varchar(150) NOT NULL,
 `app_usuario` varchar(50) NOT NULL,
 `app_clave` varchar(8) NOT NULL,
 `cargo` varchar(150) NOT NULL,
 `apellido` varchar(75) NOT NULL,
 `nombre_solo` varchar(75) NOT NULL,
 `Area_Desempenio` int(2) NOT NULL,
 `Id_Producto` varchar(10) NOT NULL,
 `Id_Trans` bigint(8) NOT NULL,
 `desc_AreaDesemp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DESCRIBE actividadinscripciones;

CREATE TABLE `areadesempidea` (
 `cod` int(11) NOT NULL,
 `descrip` varchar(100) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DESCRIBE `areadesempidea`;

INSERT INTO `areadesempidea` (cod,descrip) VALUES (	1	,'Abastecimiento');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	2	,'Juridica Legales');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	3	,'Auditoria Interna');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	4	,'Recursos Humanos (general)');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	5	,'RRHH Formacion Desarrollo');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	6	,'RRHH Seleccion de Personal');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	7	,'RRHH Relaciones Laborales y Compensaciones');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	8	,'RRHH CCII Clima Cultura');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	9	,'Comercializacion y Marketing');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	10	,'Finanzas Economia y Negocios');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	11	,'Gobierno Corporativo');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	12	,'Impuestos');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	13	,'Relaciones Institucionales');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	14	,'Sustentabilidad & RSE');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	24	,'Sin Area Asignada');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	16	,'Compliance');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	17	,'Higiene y Seguridad');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	18	,'IT / Sistemas');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	19	,'Produccion');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	20	,'Logistica y Distribucion');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	21	,'Operaciones');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	22	,'Investigacion y Desarrollo');
INSERT INTO `areadesempidea` (cod,descrip) VALUES (	23	,'Direccion General');



CREATE TABLE `productoIdea` (
 `cod` varchar(15) NOT NULL,
 `descrip` varchar(100) NOT NULL,
 `importar` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DESCRIBE `productoIdea`;

INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211240'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - MATRÍCULAS INDIVIDUALES'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211241'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - MATRICULAS PARA SPONSORS'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211242'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - BECADOS PACK MATRICULAS 10x7'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211243'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - PACK MATRICULAS 10x7'	,	0	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211244'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - INVITADOS ESPECIALES'	,	0	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211245'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - SPEAKERS Y MODERADORES'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211246'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - STAFF IDEA'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211247'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - PROVEEDORES'	,	0	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211248'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - AUTORIDADES'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211249'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - COMITÉ DEL EVENTO'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211250'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - INVITADOS SIN CARGO'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211252'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - BECADOS POR INVITACIONES ESPECIALES'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211253'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - INSTITUCIONES LOCALES'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211254'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - MATRÍCULAS PYME'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211255'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - PRENSA'	,	1	);
INSERT INTO `productoIdeaidea` (cod,descrip,importar) VALUES (	'0502211256'	,	'2021 - IEMP - EXPERIENCIA IDEA MANAGEMENT 2021 - INSCRIPTOS AL AFTER'	,	0	);
