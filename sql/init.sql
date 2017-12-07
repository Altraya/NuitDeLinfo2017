SET NAMES 'utf8';

#Création de la BDD
CREATE DATABASE Lamastiroute
CHARACTER SET UTF8
COLLATE utf8_general_ci;

#Utilisation de la BDD
USE Lamastiroute;

CREATE TABLE User(
    idUser INTEGER AUTO_INCREMENT,
    name TEXT,
    mail TEXT,
    password TEXT,
    adminLevel TEXT,
    PRIMARY KEY (idUser)
);

CREATE TABLE Event(
    idEvent INTEGER AUTO_INCREMENT,
    lat FLOAT,
    lon FLOAT,
    zoom INTEGER,
    name TEXT,
    PRIMARY KEY (idEvent)
);

CREATE TABLE Organise(
    idUser INTEGER,
    idEvent INTEGER,
    FOREIGN KEY (idUser)
        REFERENCES User(idUser)
        ON DELETE CASCADE,
    FOREIGN KEY (idEvent)
        REFERENCES Event(idEvent)
        ON DELETE CASCADE
);

CREATE TABLE Type(
    idType INTEGER AUTO_INCREMENT,
    name TEXT,
    icon TEXT,
    PRIMARY KEY (idType)
);

CREATE TABLE Warning(
    idWarning INTEGER AUTO_INCREMENT,
    idType INTEGER,
    idEvent INTEGER,
    name TEXT,
    level INTEGER,
    info  TEXT,
    PRIMARY KEY (idWarning),
    FOREIGN KEY (idType)
        REFERENCES Type(idType)
        ON DELETE CASCADE,
    FOREIGN KEY (idEvent)
        REFERENCES Event (idEvent)
        ON DELETE CASCADE
);