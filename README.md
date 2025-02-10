Mini-Boncoin  
Un site d'annonces en ligne avec Symfony.

Installation

1. Cloner le projet :  
   `git clone https://github.com/DavidGhidalia/mini_boncoin.git`

2. Installer les dépendances :  
   `composer install`  
   `npm install`

3. Copier le fichier `.env.example` en `.env` et configurer la base de données.

4. Créer la base de données et appliquer les migrations :  
   `php bin/console doctrine:database:create`  
   `php bin/console doctrine:migrations:migrate`

5. Lancer le serveur Symfony :  
   `symfony server:start`

Accéder au site sur : `http://127.0.0.1:8000`

Fonctionnalités

- Filtrage des annonces par ville et catégorie.
- Création et gestion des annonces.
- Authentification avec possibilité de déconnexion.

Auteur  
David Ghidalia
[davidghida.tech@gmail.com]
