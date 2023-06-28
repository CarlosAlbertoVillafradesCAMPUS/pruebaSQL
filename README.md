# **BASE DE DATOS CAMPUSLANDS**

A continuacion nos encontraremos con los pasos a seguir para la creacion de nuestra base de datos, la creacion de las tablas y las relaciones.

### 1-CREACION DATABASE Y USO

`CREATE DATABASE campuslands;`

`USE campuslands;`

### 2-CREACION DE TABLAS

`/*TABLA pais*/`

`CREATE TABLE pais( idPais INT NOT NULL PRIMARY KEY AUTO_INCREMENT, nombrePais VARCHAR(50) NOT NULL );`

`/*TABLA departamento*/`

`CREATE TABLE departamento( idDep INT NOT NULL PRIMARY KEY AUTO_INCREMENT, nombreDep VARCHAR(50) NOT NULL);`

`/*TABLA campers*/`

`CREATE TABLE campers( idCamper VARCHAR(20) NOT NULL PRIMARY KEY, nombreCamper VARCHAR(50) NOT NULL, apellidoCamper VARCHAR(50) NOT NULL, fechaNac DATE NOT NULL);`

`/*TABLA region*/`

`CREATE TABLE region( idReg INT NOT NULL PRIMARY KEY AUTO_INCREMENT, nombreReg VARCHAR(60) NOT NULL);`

### 3-CREACION LLAVES FORANEAS

`/*creacion de llaves foraneas*/`

`ALTER TABLE departamento ADD idPais INT NOT NULL;`

`ALTER TABLE campers ADD idReg INT NOT NULL;`

`ALTER TABLE region ADD idDep INT NOT NULL;`



### 4-RELACION CON LAS LLAVES FORANEAS

`/*relacion llaves foraneas*`

`ALTER TABLE departamento ADD CONSTRAINT departamento_pais_fk FOREIGN KEY(idPais) REFERENCES pais(idPais);`

`ALTER TABLE campers ADD CONSTRAINT campers_region_fk FOREIGN KEY(idReg) REFERENCES region(idReg);`

`ALTER TABLE region ADD CONSTRAINT region_departamento_fk FOREIGN KEY(idDep) REFERENCES departamento(idDep);`



## CONTACT

cualquier duda o aporte super el proyecto, a continuacion se encontrara mi linea de contacto.

**NombreDevelopment:** Carlos Villafrades Pinilla.

**Curso:** SPUTNIK.

**Email:** cavillafrades@gmail.com.