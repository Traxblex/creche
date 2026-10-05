CREATE DATABASE creche;

use creche;

create table utilisateur (
id int not null AUTO_INCREMENT,
nom varchar(255) not null,
prenom varchar(255) not null,
email varchar(255) not null unique,
mdp varchar(255) not null,
telephone varchar(255) not null unique,
role varchar(255) not null,
PRIMARY KEY (id)
);
CREATE TABLE  parent (
    id int(11) not null AUTO_INCREMENT,
    profession VARCHAR(255),
    id_utilisateur INT,
    foreign key (id_utilisateur) references utilisateur(id)
);
CREATE TABLE Animateur (
    id INT  auto_increment PRIMARY KEY,
    id_utilisateur INT,
    annee_exp INT,
    disponible BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id)
),
CREATE TABLE Inscription_enfant (
    id INT auto_increment PRIMARY KEY,
    date_debut DATE

),
CREATE TABLE Enfant (
    id INT auto_increment PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    date_naissance DATE NOT NULL,
    id_parent INT,
    FOREIGN KEY (id_parent) REFERENCES parent(id)
)
