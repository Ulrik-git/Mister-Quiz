# Mister-Quiz

## Description du Projet

**Mister-Quiz** est un site web de quiz interactif inspiré de l'émission "Qui veut gagner des millions ?". Ce projet a été conçu pour permettre aux utilisateurs de tester leurs connaissances à travers diverses catégories de questions tout en accumulant de l'expérience (XP) en fonction de leurs performances.

## Fonctionnalités Principales

- **Inscription et Connexion des Utilisateurs** : Les utilisateurs peuvent créer un compte, se connecter, et gérer leur profil.
- **Quiz Dynamique** : Les utilisateurs peuvent commencer un quiz, répondre à des questions, et soumettre leurs réponses pour voir leurs résultats.
- **Classement (Leaderboard)** : Affichage des 10 meilleurs joueurs basés sur leurs XP accumulés.
- **Profil Utilisateur** : Consultation des statistiques personnelles telles que l'XP total, le rang, et le pourcentage de bonnes réponses par catégorie.

## Technologies Utilisées

- **PHP & Laravel** : Le cœur du projet est développé en PHP en utilisant le framework Laravel, qui facilite la gestion des routes, des contrôleurs, et des modèles, tout en offrant une architecture robuste pour le développement web.
- **MySQL** : Base de données relationnelle utilisée pour stocker les informations des utilisateurs, les questions, les réponses, et les scores.
- **Blade Templates** : Moteur de template intégré à Laravel pour générer des vues dynamiques en mélangeant HTML et PHP.
- **CSS & JavaScript** : Utilisés pour le design et l'interactivité du site, offrant une expérience utilisateur fluide.
- **phpMyAdmin & XAMPP** : phpMyAdmin a été utilisé pour gérer la base de données MySQL, tandis que XAMPP a servi d'environnement de développement local pour tester et déployer le projet.

## Structure du Projet

### Modèle MVC
- **Controllers** : Situés dans `app/Http/Controllers/`, ces fichiers gèrent la logique côté serveur pour chaque route.
- **Models** : Stockés dans `app/Models/`, ils représentent les données et les règles d'affaires du projet.
- **Views** : Les fichiers de views Blade se trouvent dans `resources/views/`, permettant de créer des interfaces utilisateur dynamiques.
- **Migrations** : Situées dans `database/migrations/`, elles gèrent la structure de la base de données, facilitant les mises à jour et les révisions.

## Conclusion

Mister-Quiz est un projet complet qui illustre l'utilisation de Laravel pour développer une application web interactive et performante. Il démontre une maîtrise des technologies web modernes tout en offrant une plateforme engageante pour les utilisateurs.
