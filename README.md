# 🎥 Le Clap - Application de gestion de films

 **Le Clap**, une application Laravel 12 qui permet de :

* Ajouter / modifier / supprimer des films
* Gérer un dashboard admin
* Distinguer les types : films, séries, animés
* Offrir une interface utilisateur et admin stylée
* Utiliser une authentification via Laravel Breeze (Blade)

---

## 📁 Installation

### Prérequis :

* PHP 8.1+
* Composer
* XAMPP ou autre serveur local
---

## 🔑 Authentification Laravel Breeze (Blade)

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run dev
php artisan migrate
```

---

## 💪 Fonctionnalités principales

### Pages publiques

* `home` : Affichage de films en cartes
* `movies`, `Series`, `Animes` : navigation par type
* `movie-details` : page de détails de chaque film

### Admin

* Dashboard accessible uniquement au `role = admin`
* Liste des films (tableau)
* Boutons éditer / supprimer
* Page création avec formulaire validé

### Authentification

* Inscription / Connexion / Déconnexion avec dropdown custom
* Accès restreint aux routes admin avec middleware `is_admin`

---



## ⚖️ Middleware `is_admin`

Créé via :

```bash
php artisan make:middleware IsAdmin
```

