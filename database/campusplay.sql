CREATE DATABASE IF NOT EXISTS campusplay;
USE campusplay;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('etudiant', 'responsable', 'admin') NOT NULL DEFAULT 'etudiant'
);

CREATE TABLE events (
    id_event INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description TEXT,
    date_event DATE NOT NULL,
    heure_event TIME NOT NULL,
    lieu VARCHAR(150) NOT NULL,
    capacite INT NOT NULL,
    id_createur INT,
    FOREIGN KEY (id_createur) REFERENCES users(id_user)
);

CREATE TABLE registrations (
    id_inscription INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_event INT NOT NULL,
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('inscrit', 'annule') DEFAULT 'inscrit',
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    FOREIGN KEY (id_event) REFERENCES events(id_event),
    UNIQUE (id_user, id_event)
);

CREATE TABLE resources (
    id_resource INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150) NOT NULL,
    type VARCHAR(100) NOT NULL,
    disponibilite BOOLEAN DEFAULT TRUE
);

CREATE TABLE reservations (
    id_reservation INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_resource INT NOT NULL,
    date_debut DATETIME NOT NULL,
    date_fin DATETIME NOT NULL,
    statut ENUM('en_attente', 'validee', 'refusee', 'annulee') DEFAULT 'en_attente',
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    FOREIGN KEY (id_resource) REFERENCES resources(id_resource)
);