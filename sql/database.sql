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

INSERT INTO produit (nom,description,prix,image,vendeur)
VALUES
("Casque audio", "Super produit",45, "https://www.monsieurcyberman.com/508839-thickbox_default/micro-casque-music-sound-maxi-2-bluetooth-50-sans-fil-microphone-integre-neuf.jpg", 1),
("Ecran", "Super produit",199,"https://www.cdiscount.com/pdt2/0/1/0/1/700x700/9s63cb45h010/rw/ecran-pc-gamer-incurve-msi-optix-mag301cr2-30.jpg", 1),
("PC portable", "Super produit",2045,"https://www.cdiscount.com/pdt2/0/1/0/1/700x700/9s63cb45h010/rw/ecran-pc-gamer-incurve-msi-optix-mag301cr2-30.jpg", 1);

SELECT * FROM produit;
SELECT id FROM produit;
CREATE TABLE commentaires(
    id INT AUTO_INCREMENT PRIMARY KEY,
    content VARCHAR(200),
    auteur INT,
    produit INT,
    CONSTRAINT fk_user_commentaires FOREIGN KEY (auteur) REFERENCES user(id),
    CONSTRAINT fk_produit_commentaires FOREIGN KEY (produit) REFERENCES produit(id)
);
INSERT INTO commentaires (content,auteur,produit)
VALUES
("super pc je recommande",1,3),
("super casque je recommande",1,1),
("super ecran je recommande",1,2);

SELECT * FROM commentaires;
CREATE TABLE notes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  value INT NOT NULL,
  produit_id INT NOT NULL,
  CONSTRAINT fk_produit_notes FOREIGN KEY (produit_id) REFERENCES produit(id)
);
SELECT * FROM notes;

INSERT INTO notes (value,produit_id)
VALUES
("4",1),
("3",1),
("5",1),
("4",2),
("3",2),
("5",2),
("4",3),
("4",3),
("3",3);