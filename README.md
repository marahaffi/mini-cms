# Mini-CMS

Projet fil rouge de l'Atelier Framework Côté Serveur (Laravel 13, PHP 8.3+), 3e année MDW, ISET Sidi Bouzid.

Auteur : Marah Affi, groupe MDW32.

Mini-CMS évoluera au fil du semestre vers une petite plateforme de publication : pages publiques, back-office authentifié, API JSON et tests Pest. Chaque session se termine par un tag Git (`lab-01`, `lab-01b`, puis un tag par session).

## État actuel (tag lab-02b)

- Pages construites avec des composants Blade anonymes : `x-navbar`, `x-nav-link`, `x-post-card`, `x-alert`, `x-page-header`.
- Lien actif dans la navigation avec `request()->routeIs()`.
- Articles toujours stockés dans un tableau PHP, sans base de données pour l'instant.

## Routes disponibles

| Méthode | URI | Nom |
|---|---|---|
| GET | `/` | `home` |
| GET | `/a-propos` | `about` |
| GET | `/heure` | `time` |
| GET | `/posts` | `posts.index` |
| GET | `/posts/archive/{year}` | `posts.archive` |
| GET | `/posts/{slug}` | `posts.show` |

## Prérequis

- PHP 8.3 ou plus, avec les extensions `curl`, `fileinfo`, `mbstring`, `openssl`, `pdo_sqlite`, `sqlite3` et `zip` activées dans `php.ini`. Téléchargement : https://www.php.net/downloads
- Composer : https://getcomposer.org
- Node.js LTS et npm.
- Git.

## Installation

### Bash (Git Bash, macOS, Linux)

```bash
git clone https://github.com/marahaffi/mini-cms.git
cd mini-cms
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
composer run dev
```

### PowerShell (Windows)

```powershell
git clone https://github.com/marahaffi/mini-cms.git
cd mini-cms
composer install
npm install
Copy-Item .env.example .env
php artisan key:generate
New-Item database\database.sqlite -ItemType File
php artisan migrate
composer run dev
```

Ouvrir ensuite http://localhost:8000 (adresse de l'application, différente de celle de Vite sur le port 5173).

## Captures d'écran

### Page d'accueil

![Page d'accueil de Mini-CMS](screenshots/s01-accueil.png)

### Page Bienvenue

![Page Bienvenue](screenshots/s01-bienvenue.png)

### Liste des routes

![Sortie de php artisan route:list](screenshots/s01-route-list.png)

### Page À propos

![Page À propos](screenshots/s02-a-propos.png)

### Session 04

![Liste des articles](screenshots/s04-articles.png)