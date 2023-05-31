CREATE DATABASE proyecto_final;

CREATE TABLE users (
  id_users INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(256),
  dni VARCHAR(256),
  tipo ENUM ('premium', 'classic') NOT NULL
  correo VARCHAR(256),
  url VARCHAR (256)
);

CREATE TABLE compania (
  id_compania INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(256),
  precio_actual VARCHAR(256)
);


CREATE TABLE portafolio (
  id_portafolio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  num_accion VARCHAR(256),
  precio VARCHAR(256),
  fecha date,
  id_compania INT,
  id_users INT,
  FOREIGN KEY (id_compania) REFERENCES compania(id_compania),
  FOREIGN KEY (id_users) REFERENCES users(id_users)
);


