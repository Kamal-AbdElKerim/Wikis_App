# Wiki CMS - Système de Gestionnaire de Contenu

## Description

Le Wiki CMS est un système de gestion de contenu conçu pour offrir une plateforme où les administrateurs, auteurs et utilisateurs peuvent collaborer efficacement. Il permet de créer, modifier, supprimer et organiser des wikis, catégories et tags de manière intuitive, tout en offrant une expérience utilisateur fluide côté front office.

L'objectif est de fournir une interface simple et fonctionnelle pour partager et consulter du contenu wiki.

## Fonctionnalités Clés

### Partie Back Office (Gestion par l'administrateur et les auteurs)

- **Gestion des Catégories (Admin)** :
  - Créer, modifier et supprimer des catégories pour organiser les wikis.
  - Associer plusieurs wikis à une catégorie.

- **Gestion des Tags (Admin)** :
  - Créer, modifier et supprimer des tags pour affiner la recherche.
  - Associer des tags aux wikis.

- **Inscription des Auteurs** :
  - Inscription des auteurs avec nom, email et mot de passe sécurisé.

- **Gestion des Wikis (Auteurs et Admin)** :
  - Créer, modifier et supprimer des wikis.
  - Associer une catégorie et plusieurs tags à chaque wiki.
  - Archiver les wikis inappropriés (Admin).

- **Tableau de Bord (Dashboard)** :
  - Vue d'ensemble des statistiques des entités (wikis, catégories, tags, auteurs).

### Partie Front Office (Accessible par tous les utilisateurs)

- **Login et Register** :
  - Création de compte pour les nouveaux utilisateurs.
  - Connexion pour les utilisateurs existants, avec redirection vers le dashboard pour les admins ou vers la page d'accueil pour les autres utilisateurs.

- **Barre de Recherche** :
  - Recherche en temps réel (AJAX) de wikis, catégories et tags sans rechargement de page.

- **Affichage des Derniers Wikis et Catégories** :
  - Affichage dynamique des derniers wikis ajoutés et des catégories mises à jour sur la page d'accueil.

- **Redirection vers la Page Unique des Wikis** :
  - Détail complet d'un wiki sélectionné avec son contenu, les catégories associées, les tags et les informations sur l'auteur.

### Bonus

- **Upload d'Images** :
  - Fonctionnalité d'upload d'images pour enrichir le contenu des wikis (validation des formats, stockage sécurisé).

- **Architecture MVC** :
  - Système de routage basé sur l'architecture MVC.
  - Utilisation de namespace pour l'organisation des classes.

## Technologies Utilisées

- **Frontend** :
  - HTML5, CSS (Framework CSS), JavaScript.
  
- **Backend** :
  - PHP 8 avec architecture MVC, système de routage.
  
- **Base de Données** :
  - MySQL avec driver PDO pour une gestion sécurisée des données.

## Installation

1. Clonez ce dépôt GitHub :
   ```bash
   git clone https://github.com/username/wiki-cms.git
