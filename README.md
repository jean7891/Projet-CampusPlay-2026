# CampusPlay

## Présentation

CampusPlay est un projet de Web dynamique réalisé dans le cadre du module ING2 2026.

L’objectif est de développer une plateforme associative et événementielle permettant aux étudiants de consulter des événements, de s’y inscrire, et de réserver des ressources proposées par une association étudiante.

## Fonctionnalités principales

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
├── docs
│   ├── architecture
│   ├── mcd
│   ├── specifications
│   ├── storyboard
│   └── wireframes
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