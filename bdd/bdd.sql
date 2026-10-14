CREATE DATABASE IF NOT EXISTS creche CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE creche;

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    telephone VARCHAR(255) NOT NULL UNIQUE,
    role ENUM('parent', 'animateur', 'admin') NOT NULL
);

CREATE TABLE parent (
    id INT AUTO_INCREMENT PRIMARY KEY,
    profession VARCHAR(255),
    id_utilisateur INT NOT NULL UNIQUE,
    CONSTRAINT parent_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id) ON DELETE CASCADE
);

CREATE TABLE animateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    experience INT DEFAULT 0,
    disponible BOOLEAN NOT NULL DEFAULT TRUE,
    capacite INT NOT NULL DEFAULT 8,
    id_utilisateur INT NOT NULL UNIQUE,
    CONSTRAINT fk_animateur_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id) ON DELETE CASCADE
);

CREATE TABLE enfant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    date_naissance DATE NOT NULL,
    pai BOOLEAN NOT NULL DEFAULT FALSE,
    detail_pai TEXT NULL,
    id_parent INT NOT NULL,
    id_animateur INT NULL,
    CONSTRAINT fk_enfant_parent FOREIGN KEY (id_parent) REFERENCES parent(id) ON DELETE CASCADE,
    CONSTRAINT fk_enfant_animateur FOREIGN KEY (id_animateur) REFERENCES animateur(id) ON DELETE SET NULL
);

CREATE TABLE inscription_enfant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_debut DATE NOT NULL,
    id_enfant INT NOT NULL,
    CONSTRAINT fk_inscription_enfant FOREIGN KEY (id_enfant) REFERENCES enfant(id) ON DELETE CASCADE
)
