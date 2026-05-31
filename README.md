# CampusPlay

## Présentation

CampusPlay est un projet de Web dynamique réalisé dans le cadre du module ING2 2026.

L’objectif est de développer une plateforme associative et événementielle permettant aux étudiants de consulter des événements, de s’y inscrire, et de réserver des ressources proposées par une association étudiante.

## Fonctionnalités Principales

- Inscription utilisateur
- Connexion utilisateur
- Déconnexion
- Consultation des événements
- Détail d’un événement
- Inscription à un événement
- Annulation d’une inscription
- Consultation des ressources
- Demande de réservation de ressources
- Consultation de ses réservations
- Tableau de bord administrateur
- Validation ou refus des réservations

## Technologies utilisées

- HTML
- CSS
- JavaScript
- PHP
- MySQL

## Structure du projet

```txt
CampusPlay
├── assets
│   └── style.css
├── backend
│   ├── config.php
│   ├── login.php
│   ├── logout.php
│   ├── register.php
│   ├── register_event.php
│   ├── cancel_registration.php
│   ├── reserve_resource.php
│   ├── cancel_reservation.php
│   └── update_reservation_status.php
├── database
│   └── campusplay.sql
└── frontend
    ├── index.html
    ├── login.html
    ├── register.html
    ├── events.php
    ├── event-detail.php
    ├── resources.php
    ├── my-events.php
    ├── my-reservations.php
    └── dashboard.php

    ## Conseil installation

Voici les étapes pour faire tourner notre projet sur votre machine :

### 1. Prérequis
- Un serveur local classique
- PHP 8 et MySQL.

### 2. Base de données
1. Ouvrez phpMyAdmin.
2. Créez une base de données nommée **`campusplay`**.
3. Importez notre fichier **`database/campusplay.sql`** fourni dans l'archive. On a déjà intégré la structure des tables ainsi que quelques données de test pour que le site ne soit pas vide au lancement.

### 3. Configuration de la BDD
La connexion à la base se trouve dans le fichier `backend/config.php`. 
Pour simplifier, on a laissé les identifiants locaux standards :
- **Hôte :** localhost
- **Utilisateur :** root
- **Mot de passe :** *[vide]* (ou "root" selon votre environnement)


### 4. Lancement
1. Placez le dossier du projet dans le répertoire web de votre serveur.
2. Lancez le projet dans votre navigateur via cette URL : 
   `http://localhost/CampusPlay/frontend/index.html` 

---

## Comptes pour tester

Pour vous faire gagner du temps lors de la correction et éviter de devoir créer des comptes pour chaque rôle, on en a préparé 3 directement dans la base de données :

**Compte Administrateur (pour voir le dashboard et valider/refuser les réservations) :**
- **Email :** admin@campusplay.fr
- **Mot de passe :** admin123

**Compte Responsable Associatif (pour créer les événements) :**
- **Email :** asso@campusplay.fr
- **Mot de passe :** asso123

**Compte Étudiant (pour s'inscrire et demander des ressources) :**
- **Email :** etudiant@campusplay.fr
- **Mot de passe :** etu123
