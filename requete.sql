CREATE DATABASE literie3000;

USE literie3000;

CREATE TABLE lit (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    id_marque INT NOT NULL,
    id_dimension INT NOT NULL,
    prix DECIMAL NOT NULL,
    prix_reduit DECIMAL,
    FOREIGN KEY (id_marque) REFERENCES marque(id)
);

CREATE TABLE marque (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_marque VARCHAR(50) NOT NULL
);

CREATE TABLE dimension (
    id INT PRIMARY KEY AUTO_INCREMENT,
    taille VARCHAR(10) NOT NULL
);

CREATE TABLE lit_dimaension (
    id_lit INT,
    id_dimension INT,
    PRIMARY KEY (id_lit, id_dimension),
    FOREIGN KEY (id_lit) REFERENCES lit(id),
    FOREIGN KEY (id_dimension) REFERENCES dimension(id)
);