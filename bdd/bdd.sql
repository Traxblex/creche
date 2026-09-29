CREATE DATABASE creche;

use creche;

create table utilisateur (
id int(11) not null AUTO_INCREMENT,
nom varchar(255) not null,
prenom varchar(255) not null,
email varchar(255) not null unique,
mdp varchar(255) not null,
telephone varchar(255) not null unique,
role varchar(255) not null,
PRIMARY KEY (id)
);
CREATE TABLE  parent (
    id INT PRIMARY KEY,
    profession VARCHAR(255),
    FOREIGN KEY (id) REFERENCES utilisateur(id)
);
CREATE TABLE Animateur (
    id INT PRIMARY KEY,
    annee_exp INT,
    disponible BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (id) REFERENCES Utilisateur(id)
)
