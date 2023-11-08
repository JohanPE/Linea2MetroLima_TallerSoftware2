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
-- Crear la tabla pasajeros
CREATE TABLE pasajeros (
    N_identificacion INT PRIMARY KEY,
    numero_pasajero INT AUTO_INCREMENT UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    distrito VARCHAR(50) NOT NULL,
    domicilio VARCHAR(100),
    telefono BIGINT,
    fechanac DATE,
    estudiante VARCHAR(10),
    idtipodoc VARCHAR(8),
    id_tarifa INT,
    FOREIGN KEY (idtipodoc) REFERENCES tipodedocumento(idtipodoc),
    FOREIGN KEY (id_tarifa) REFERENCES tarifa(idtarifa)
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
	idtrabajador INT NOT NULL,
	idtipodoc VARCHAR(8) NULL,
	numdocidentidad varchar(100) NULL,
	apepat varchar(400) NULL,
	apemat varchar(400) NULL,
	nombre varchar(400) NULL,
	email varchar(400) NULL,
	fechanacimiento DATE NULL,
	telefono varchar(100) NULL,
	CONSTRAINT trabajador_pk PRIMARY KEY (idtrabajador),
	CONSTRAINT trabajador_FK FOREIGN KEY (idtipodoc) REFERENCES tipodedocumento(idtipodoc)
);

CREATE TABLE usuariotrabajador (
	idtrabajador int NOT NULL,
	usuario varchar(500) NULL,
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

INSERT INTO trabajador
(idtrabajador, idtipodoc, numdocidentidad, apepat, apemat, nombre, email, fechanacimiento, telefono)
VALUES(1, 1, '12312343', 'PEREZ', 'PEREZ', 'JUAN', 'jperez@gmail.com', NULL, '123123123');
INSERT INTO trabajador
(idtrabajador, idtipodoc, numdocidentidad, apepat, apemat, nombre, email, fechanacimiento, telefono)
VALUES(2, 1, '32132112', 'DIAZ', 'DIAZ', 'JORGE', 'jdiaz@gmail.com', NULL, '32132123');

insert into usuariotrabajador(idtrabajador, usuario, clave, idrol) 
values(1, 'jperez',md5(12345678),1);

insert into usuariotrabajador(idtrabajador, usuario, clave, idrol) 
values(2, 'jdiaz',md5(12345678),2);
