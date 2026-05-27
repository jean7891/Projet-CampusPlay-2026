# Spécifications fonctionnelles - CampusPlay

## 1. Présentation du projet

CampusPlay est une plateforme web dynamique destinée à une association étudiante.

Elle permet aux étudiants de consulter les événements proposés par l’association, de s’y inscrire, et de réserver certaines ressources comme des salles, du matériel ou des jeux.

L’objectif est de centraliser la gestion des activités étudiantes dans une seule application simple, claire et facile à utiliser.

## 2. Rôles utilisateurs

### Étudiant
L’étudiant peut :
- créer un compte ;
- se connecter ;
- consulter les événements ;
- s’inscrire à un événement ;
- annuler une inscription ;
- consulter les ressources disponibles ;
- faire une demande de réservation.

### Responsable association
Le responsable association peut :
- créer un événement ;
- modifier un événement ;
- supprimer un événement ;
- ajouter une ressource ;
- modifier une ressource ;
- valider ou refuser une réservation.

### Administrateur
L’administrateur peut :
- gérer les utilisateurs ;
- gérer les rôles ;
- superviser les événements ;
- superviser les réservations ;
- accéder au tableau de bord.

## 3. Fonctionnalités principales

### Authentification
Le système permet l’inscription, la connexion et la déconnexion des utilisateurs.

### Gestion des événements
Les événements peuvent être créés, modifiés, supprimés et consultés.

Chaque événement possède :
- un titre ;
- une description ;
- une date ;
- une heure ;
- un lieu ;
- une capacité maximale.

### Inscription aux événements
Un étudiant peut s’inscrire à un événement si :
- il est connecté ;
- l’événement n’est pas complet ;
- il n’est pas déjà inscrit.

### Réservation de ressources
Un étudiant peut demander la réservation d’une ressource.

Une ressource peut être :
- une salle ;
- un jeu ;
- du matériel ;
- un équipement associatif.

La réservation peut avoir plusieurs états :
- en attente ;
- validée ;
- refusée ;
- annulée.

### Tableau de bord
Le tableau de bord permet d’afficher :
- le nombre d’événements ;
- le nombre d’utilisateurs ;
- le nombre de réservations ;
- les demandes en attente.

## 4. Règles métier simples

Un utilisateur non connecté ne peut pas s’inscrire à un événement.

Un étudiant ne peut pas s’inscrire deux fois au même événement.

Un événement ne peut pas dépasser sa capacité maximale.

Une réservation doit être validée par un responsable avant d’être confirmée.

Un administrateur peut modifier ou supprimer les données principales du système.

## 5. Technologies prévues

Le projet utilisera :
- HTML ;
- CSS ;
- JavaScript ;
- PHP ;
- MySQL.

L’application suivra une architecture client-serveur simple :

Utilisateur → Frontend → Backend PHP → Base de données MySQL.