CREATE DATABASE creche;

use creche;

create table utilisateur (
id int(11) not null AUTO_INCREMENT,
nom varchar(255) not null,
prenom varchar(255) not null,
email varchar(255) not null unique,
mdp varchar(255) not null,
telephone varchar(255) not null unique,
PRIMARY KEY (id)
)
