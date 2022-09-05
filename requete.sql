CREATE DATABASE literie3000;

USE literie3000;

CREATE TABLE lit (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_marque INT,
    id_taille INT,
    nom VARCHAR(100),
    image VARCHAR(255) NOT NULL,
    prix DECIMAL(6,2) NOT NULL,
    prix_reduit DECIMAL(6,2)
);

CREATE TABLE marque (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_marque VARCHAR(50) NOT null
);

CREATE TABLE dimension (
    id INT PRIMARY KEY AUTO_INCREMENT,
    taille VARCHAR(10) NOT NULL
);

ALTER TABLE lit
ADD FOREIGN KEY (id_marque)
REFERENCES marque(id);

ALTER TABLE lit
ADD FOREIGN KEY (id_taille)
REFERENCES dimension(id);

INSERT INTO marque 
(nom_marque)
VALUES 
("Epeda"),
("Dreamway"),
("Bultex"),
("Dorsoline"),
("MemoryLine");

INSERT INTO dimension 
(taille)
VALUES 
("90x190"),
("140x190"),
("160x200"),
("180x200"),
("200x200");

INSERT INTO lit (
    id_marque, id_taille, nom, image, prix, prix_reduit
)
VALUES (
    1, 1, "Matelas Isamel", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsO1agg_G3N95gtpQdyR7dNfpDob5rhYuhBA&usqp=CAU", 759.00, 529.00 
),
(
    2, 1, "Matelas José", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2quQc32W_G4zNmKooYHisXvP7F9ofCQFmcQ&usqp=CAU", 809.00, 709.00 
),
(
    3, 2, "Matelas VMC", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwuOlUr6DoqCRcz5UET0HDvvylgJYaVAWFtg&usqp=CAU", 759.00, 529.00 
),
(
    4, 3, "Matelas Jeanne", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6QQICeZcJBJlhaOm3o34x7U4RRHscd6L8LA&usqp=CAU", 1019.00, 509.00 
);