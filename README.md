# ⚡ EVolt API

EVolt API est une API REST développée avec **Laravel** pour la gestion des bornes de recharge pour véhicules électriques.
Elle permet aux utilisateurs de rechercher des bornes disponibles, réserver un créneau de recharge et suivre leurs sessions.

---

# 🚀 Fonctionnalités

### 👤 Utilisateurs

* Authentification sécurisée avec **Laravel Sanctum**
* Recherche de bornes disponibles par zone
* Consultation des informations des bornes (connecteur, puissance, disponibilité)
* Réservation d’une borne pour une période donnée
* Modification ou annulation de réservation
* Consultation de l’historique des sessions de recharge

### 🔧 Administrateur

* Ajouter, modifier ou supprimer des bornes
* Gérer le type de connecteur et la puissance
* Consulter les statistiques d’utilisation des bornes

### 👨‍💻 Développement

* Tests unitaires
* Tests API avec Postman
* Documentation des endpoints (Postman / Swagger)

---

# 🛠️ Technologies utilisées

* **Laravel**
* **PHP**
* **MySQL**
* **Laravel Sanctum**
* **REST API**
* **Postman**

---

# ⚙️ Installation

```bash
git clone https://github.com/your-username/evolt-api.git
cd evolt-api
composer install
cp .env.example .env
php artisan key:generate
```

Configurer la base de données dans `.env`, puis :

```bash
php artisan migrate
php artisan serve
```

---

# 📡 Endpoints principaux

### Authentification

```
POST /api/register
POST /api/login
POST /api/logout
```

### Bornes

```
GET /api/stations
GET /api/stations/{id}
POST /api/stations
PUT /api/stations/{id}
DELETE /api/stations/{id}
```

### Réservations

```
GET /api/reservations
POST /api/reservations
PUT /api/reservations/{id}
DELETE /api/reservations/{id}
```

### Sessions de recharge

```
GET /api/sessions
```

---

# 📊 Modèle de données principal

* **Users**
* **Stations**
* **Reservations**
* **ChargingSessions**

Chaque borne possède :

* type de connecteur
* puissance (kW)
* statut de disponibilité

---

# 🚀 Fonctionnalités avancées

* Mise à jour automatique de la disponibilité des bornes avec **Laravel Jobs & Queues**
* Génération de **slugs** pour les bornes (Spatie Laravel Sluggable)
* Suppression en cascade des réservations lors de la suppression d’un utilisateur
* Notifications email ou SMS pour les sessions de recharge

---

# 🧪 Tests

Les tests peuvent être exécutés avec :

```bash
php artisan test
```

Les endpoints peuvent être testés avec **Postman**.

---

# 📄 Documentation

La documentation de l’API peut être générée via :

* **Postman Collection**
* **Swagger / OpenAPI**

---

# 👩‍💻 Auteur

Projet réalisé par **Aya Nakkabi** dans le cadre d’un projet de développement backend avec Laravel.

---
