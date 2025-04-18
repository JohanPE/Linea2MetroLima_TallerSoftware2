CREATE DATABASE bdMetro;
drop database bdmetro;

USE bdMetro;

-- Crear la tabla estadotarifa
CREATE TABLE estadotarifa (
  idestadotarifa INT NOT NULL,
  nombre VARCHAR(100) DEFAULT NULL,
  glosa VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (idestadotarifa)
);

-- Crear la tabla tarifa
CREATE TABLE tarifa (
  idtarifa INT NOT NULL,
  nombre VARCHAR(100) NULL,
  precio DECIMAL(10, 2) DEFAULT 0.00,
  idestadotarifa INT NULL,
  PRIMARY KEY (idtarifa),
  FOREIGN KEY (idestadotarifa) REFERENCES estadotarifa(idestadotarifa)
);
INSERT INTO estadotarifa (idestadotarifa, nombre, glosa) VALUES (1, 'Publico en general', 'Tarifa regular para adultos');
INSERT INTO estadotarifa (idestadotarifa, nombre, glosa) VALUES (2, 'Estudiante', 'Tarifa reducida para estudiantes');

INSERT INTO tarifa (idtarifa, nombre, precio, idestadotarifa) VALUES (1, 'Tarifa General', 1.50, 1);
INSERT INTO tarifa (idtarifa, nombre, precio, idestadotarifa) VALUES (2, 'Tarifa Estudiante', 0.75, 2);


-- Crear la tabla tipodedocumento
CREATE TABLE tipodedocumento (
	idtipodoc VARCHAR(8) PRIMARY KEY,
    nombre_tipodoc VARCHAR(500),
    glosa_tipodoc VARCHAR(500)
);

INSERT INTO tipodedocumento (idtipodoc, nombre_tipodoc, glosa_tipodoc) VALUES ('01', 'Documento Nacional de Identidad', 'DNI');
INSERT INTO tipodedocumento (idtipodoc, nombre_tipodoc, glosa_tipodoc) VALUES ('02', 'Registro Único de Contribuyentes', 'RUC');
INSERT INTO tipodedocumento (idtipodoc, nombre_tipodoc, glosa_tipodoc) VALUES ('03', 'Carnet de Extranjería', 'CE');

CREATE TABLE distrito (
  distrito VARCHAR(50) NOT NULL,
  nombre_distrito varchar(100) DEFAULT NULL,
  PRIMARY KEY (distrito)
);

INSERT INTO distrito VALUES ('01','Ancón'),('02','Ate'),('03','Barranco'),('04','Breña'),('05','Carabayllo'),('06','Cercado de Lima'),('07','Chaclacayo'),('08','Chorrillos'),('09','Cieneguilla'),('10','Comas'),('11','El Agustino'),('12','Independencia'),('13','Jesus María'),('14','La Molina'),('15','La victoria'),('16','Lince'),('17','Los Olivos'),('18','Lurigancho'),('19','Lurín'),('20','Magdalena del Mar'),('21','Miraflores'),('22','Pachacamac'),('23','Pucusana'),('24','Pueblo libre'),('25','Puente piedra'),('26','Punta hermosa'),('27','Punta negra'),('28','Rímac'),('29','San bartolo'),('30','San Borja'),('31','San Isidro'),('32','San Juan de Lurigancho'),('33','San Juan de Miraflores'),('34','San Luis'),('35','San Martin de Porres'),('36','San Miguel'),('37','Santa Anita'),('38','Santa María del Mar'),('39','Santa Rosa'),('40','Santiago de Surco'),('41','Surquillo'),('42','Villa el Salvador'),('43','Villa María del Triunfo');


-- Crear la tabla pasajeros
CREATE TABLE pasajeros (
	numero_pasajero INT AUTO_INCREMENT UNIQUE,
	idtipodoc VARCHAR(8),
    N_identificacion INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    id_distrito VARCHAR(50) NOT NULL,
    domicilio VARCHAR(100),
    telefono BIGINT,
    fechanac DATE,
    estudiante VARCHAR(10),
    id_tarifa INT,
    FOREIGN KEY (idtipodoc) REFERENCES tipodedocumento(idtipodoc),
    FOREIGN KEY (id_tarifa) REFERENCES tarifa(idtarifa),
	FOREIGN KEY (id_distrito) REFERENCES distrito(distrito) -- Clave foránea a la tabla distrito
);

-- Crear la tabla usuario
CREATE TABLE usuario (
	id_usuario VARCHAR(100) PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE,
    contrasenia VARCHAR(100) NOT NULL,
    saldo DECIMAL(10, 2) DEFAULT 0.00,
    dni INT UNIQUE,
    FOREIGN KEY (dni) REFERENCES pasajeros(N_identificacion)
);

-- Crear la tabla recorrido
CREATE TABLE recorrido (
	id_recorrido INT AUTO_INCREMENT PRIMARY KEY,
    gastos DECIMAL(10, 2) DEFAULT 0.00,
    fecha_viaje DATETIME,
    id_usuario VARCHAR(100),
    id_tarifa INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_tarifa) REFERENCES tarifa(idtarifa)
);

/*---------------------------------------------------------------*/
CREATE TABLE trabajador (
	idtrabajador INT AUTO_INCREMENT UNIQUE,
	idtipodoc VARCHAR(8),
    N_identificacion INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    id_distrito VARCHAR(50) NOT NULL,
    domicilio VARCHAR(100),
    telefono BIGINT,
    fechanac DATE,
    FOREIGN KEY (idtipodoc) REFERENCES tipodedocumento(idtipodoc),
	FOREIGN KEY (id_distrito) REFERENCES distrito(distrito) 
);

CREATE TABLE usuariotrabajador (
	idtrabajador int NOT NULL,
	usuario varchar(500) NULL unique,
	clave varchar(500) NULL,
	CONSTRAINT usuariotrabajador_pk PRIMARY KEY (idtrabajador),
	CONSTRAINT usuariotrabajador_FK FOREIGN KEY (idtrabajador) REFERENCES trabajador(idtrabajador)
);

CREATE TABLE rol (
	idrol INT NOT NULL,
	nombrerol varchar(100) NULL,
	CONSTRAINT rol_pk PRIMARY KEY (idrol)
);

ALTER TABLE usuariotrabajador ADD idrol INT NULL;

ALTER TABLE usuariotrabajador ADD CONSTRAINT usuariotrabajador_FK_1 FOREIGN KEY (idrol) REFERENCES rol(idrol);

INSERT INTO rol
(idrol, nombrerol)
VALUES(1, 'administrador');
INSERT INTO rol
(idrol, nombrerol)
VALUES(2, 'trabajador');


CREATE TABLE horario(
	idhorario INT NOT NULL auto_increment PRIMARY KEY,
    hora TIME
);

INSERT INTO horario (hora) VALUES 
('05:00:00'), ('05:05:00'), ('05:10:00'), ('05:15:00'), ('05:20:00'), ('05:25:00'), ('05:30:00'), ('05:35:00'), ('05:40:00'), ('05:45:00'), ('05:50:00'), ('05:55:00'),
('06:00:00'), ('06:05:00'), ('06:10:00'), ('06:15:00'), ('06:20:00'), ('06:25:00'), ('06:30:00'), ('06:35:00'), ('06:40:00'), ('06:45:00'), ('06:50:00'), ('06:55:00'),
('07:00:00'), ('07:05:00'), ('07:10:00'), ('07:15:00'), ('07:20:00'), ('07:25:00'), ('07:30:00'), ('07:35:00'), ('07:40:00'), ('07:45:00'), ('07:50:00'), ('07:55:00'),
('08:00:00'), ('08:05:00'), ('08:10:00'), ('08:15:00'), ('08:20:00'), ('08:25:00'), ('08:30:00'), ('08:35:00'), ('08:40:00'), ('08:45:00'), ('08:50:00'), ('08:55:00'),
('09:00:00'), ('09:05:00'), ('09:10:00'), ('09:15:00'), ('09:20:00'), ('09:25:00'), ('09:30:00'), ('09:35:00'), ('09:40:00'), ('09:45:00'), ('09:50:00'), ('09:55:00'),
('10:00:00'), ('10:05:00'), ('10:10:00'), ('10:15:00'), ('10:20:00'), ('10:25:00'), ('10:30:00'), ('10:35:00'), ('10:40:00'), ('10:45:00'), ('10:50:00'), ('10:55:00'),
('11:00:00'), ('11:05:00'), ('11:10:00'), ('11:15:00'), ('11:20:00'), ('11:25:00'), ('11:30:00'), ('11:35:00'), ('11:40:00'), ('11:45:00'), ('11:50:00'), ('11:55:00'),
('12:00:00'), ('12:05:00'), ('12:10:00'), ('12:15:00'), ('12:20:00'), ('12:25:00'), ('12:30:00'), ('12:35:00'), ('12:40:00'), ('12:45:00'), ('12:50:00'), ('12:55:00'),
('13:00:00'), ('13:05:00'), ('13:10:00'), ('13:15:00'), ('13:20:00'), ('13:25:00'), ('13:30:00'), ('13:35:00'), ('13:40:00'), ('13:45:00'), ('13:50:00'), ('13:55:00'),
('14:00:00'), ('14:05:00'), ('14:10:00'), ('14:15:00'), ('14:20:00'), ('14:25:00'), ('14:30:00'), ('14:35:00'), ('14:40:00'), ('14:45:00'), ('14:50:00'), ('14:55:00'),
('15:00:00'), ('15:05:00'), ('15:10:00'), ('15:15:00'), ('15:20:00'), ('15:25:00'), ('15:30:00'), ('15:35:00'), ('15:40:00'), ('15:45:00'), ('15:50:00'), ('15:55:00'),
('16:00:00'), ('16:05:00'), ('16:10:00'), ('16:15:00'), ('16:20:00'), ('16:25:00'), ('16:30:00'), ('16:35:00'), ('16:40:00'), ('16:45:00'), ('16:50:00'), ('16:55:00'),
('17:00:00'), ('17:05:00'), ('17:10:00'), ('17:15:00'), ('17:20:00'), ('17:25:00'), ('17:30:00'), ('17:35:00'), ('17:40:00'), ('17:45:00'), ('17:50:00'), ('17:55:00'),
('18:00:00'), ('18:05:00'), ('18:10:00'), ('18:15:00'), ('18:20:00'), ('18:25:00'), ('18:30:00'), ('18:35:00'), ('18:40:00'), ('18:45:00'), ('18:50:00'), ('18:55:00'),
('19:00:00'), ('19:05:00'), ('19:10:00'), ('19:15:00'), ('19:20:00'), ('19:25:00'), ('19:30:00'), ('19:35:00'), ('19:40:00'), ('19:45:00'), ('19:50:00'), ('19:55:00'),
('20:00:00'), ('20:05:00'), ('20:10:00'), ('20:15:00'), ('20:20:00'), ('20:25:00'), ('20:30:00'), ('20:35:00'), ('20:40:00'), ('20:45:00'), ('20:50:00'), ('20:55:00'),
('21:00:00'), ('21:05:00'), ('21:10:00'), ('21:15:00'), ('21:20:00'), ('21:25:00'), ('21:30:00'), ('21:35:00'), ('21:40:00'), ('21:45:00'), ('21:50:00'), ('21:55:00'),
('22:00:00'), ('22:05:00'), ('22:10:00'), ('22:15:00'), ('22:20:00'), ('22:25:00'), ('22:30:00'), ('22:35:00'), ('22:40:00'), ('22:45:00'), ('22:50:00'), ('22:55:00'),
('23:00:00');


CREATE TABLE mensaje(
	idmensaje INT NOT NULL auto_increment PRIMARY KEY,
    nombre_persona VARCHAR(500) NOT NULL,
    email_persona VARCHAR(500) NOT NULL,
    mensaje VARCHAR(3000) NOT NULL
);

