CREATE DATABASE campuslands;

USE campuslands;

/*TABLA pais*/

CREATE TABLE pais( idPais INT NOT NULL PRIMARY KEY AUTO_INCREMENT, nombrePais VARCHAR(50) NOT NULL );
CREATE TABLE departamento( idDep INT NOT NULL PRIMARY KEY AUTO_INCREMENT, nombreDep VARCHAR(50) NOT NULL);
CREATE TABLE campers( idCamper VARCHAR(20) NOT NULL PRIMARY KEY, nombreCamper VARCHAR(50) NOT NULL, apellidoCamper VARCHAR(50) NOT NULL, fechaNac DATE NOT NULL);
CREATE TABLE region( idReg INT NOT NULL PRIMARY KEY AUTO_INCREMENT, nombreReg VARCHAR(60) NOT NULL);


/*creacion de llaves foraneas*/

ALTER TABLE departamento ADD idPais INT NOT NULL;
ALTER TABLE campers ADD idReg INT NOT NULL;
ALTER TABLE region ADD idDep INT NOT NULL;



/*relacion llaves foraneas*/

ALTER TABLE departamento ADD CONSTRAINT departamento_pais_fk FOREIGN KEY(idPais) REFERENCES pais(idPais);
ALTER TABLE campers ADD CONSTRAINT campers_region_fk FOREIGN KEY(idReg) REFERENCES region(idReg);
ALTER TABLE region ADD CONSTRAINT region_departamento_fk FOREIGN KEY(idDep) REFERENCES departamento(idDep);

SELECT * FROM region;