-- Active: 1700674265634@@127.0.0.1@3306@cuisine

CREATE TABLE
    IF NOT EXISTS user (
        idUser INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        avatar VARCHAR(250),
        pseudo VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(50) NOT NULL UNIQUE,
        pwd TEXT NOT NULL
    );

DROP TABLE recette, user;

CREATE TABLE
    recette (
        idRecette INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        img VARCHAR(250),
        titre VARCHAR(50) NOT NULL UNIQUE,
        contenu VARCHAR(50) NOT NULL UNIQUE,
        idUser INT,
        FOREIGN KEY (idUser) REFERENCES user(idUser)
    );