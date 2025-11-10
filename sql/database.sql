-- Active: 1761901846028@@127.0.0.1@3306@mini_ecommerce
-- Active: 1761901846028@@127.0.0.1@3306@mysql
CREATE DATABASE mini_ecommerce;
use mini_ecommerce;

CREATE TABLE user(
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    password TEXT
);
SELECT * FROM user;

CREATE TABLE produit(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    prix FLOAT NOT NULL,
    image VARCHAR(225) NULL,
    vendeur INT,
    CONSTRAINT `fk_produit` FOREIGN KEY (`vendeur`) REFERENCES `user` (`id`)
);
SELECT * FROM produit;
SELECT id FROM produit;