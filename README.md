# Projet-Baovola

Application avec authentification utilisateurs.

## Stack technique

### Frontend
- React + Next.js

### Backend
- CodeIgniter 4

### Base de données
- PostgreSQL

## Structure

```
backend/     # CodeIgniter 4 API
frontend/    # Next.js React application
```

## Installation

### Backend

```bash
cd backend
composer install
```

Configurer `.env` avec les paramètres PostgreSQL :
```
database.default.hostname = localhost
database.default.database = baovola
database.default.username = postgres
database.default.password = postgres
```

Exécuter les migrations :
```bash
php spark migrate
```

Démarrer le serveur :
```bash
php spark serve
```

### Frontend

```bash
cd frontend
npm install
npm run dev
```

## Fonctionnalités

### Authentification
- Inscription (`/register`) : nom, prénom, email, mot de passe
- Connexion (`/login`) : email, mot de passe
- Déconnexion (`/logout`)