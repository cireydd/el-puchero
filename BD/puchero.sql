
-- Creación de la base de datos
CREATE DATABASE puchero;

-- Creación del usuario y concesión de permisos
CREATE USER 'cuchara'@'localhost' IDENTIFIED BY 'cuchara';
GRANT ALL PRIVILEGES ON puchero.* TO 'cuchara'@'localhost' WITH GRANT OPTION;

-- Uso de la base de datos
USE puchero;


CREATE TABLE usuarios (
  username varchar(255),
  password varchar(255),
  email varchar(255),
  
  primary key(username)
) ENGINE=INNODB;

CREATE TABLE recetas (
  id int auto_increment,
  titulo varchar(255),
  imagen varchar(255),
  tiempo varchar(255)
  
  primary key (id)
) ENGINE=INNODB;


CREATE TABLE ingredientes  (
  nombre varchar(255), 
  
  primary key (nombre)  

) ENGINE=INNODB;

CREATE TABLE cantidades  (
  nombre_ingred varchar(255),
  id_receta int,
  cantidad varchar(255)
  
  primary key (nombre_ingred,id_receta),  
  foreign key (nombre_ingred) references ingrediente(nombre), 
  foreign key (id_receta) references recetas(id) 
) ENGINE=INNODB;

CREATE TABLE fecha_receta (
  autor varchar(255),
  id_receta int,
  fecha_creacion date
  
  primary key (autor,id_receta),  
  foreign key (autor) references usuarios(username), 
  foreign key (id_receta) references recetas(id)
) ENGINE=INNODB;

CREATE TABLE favoritos  (
  usuario varchar(255),   
  id_receta int
  
  primary key (usuario,id_receta),  
  foreign key (usuario) references usuarios(username) on delete cascade, 
  foreign key (id_receta) references recetas(id) on delete cascade
) ENGINE=INNODB;
