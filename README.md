# ⚡ li-energies

> Site vitrine professionnel pour une entreprise spécialisée dans les énergies renouvelables.

![Symfony](https://img.shields.io/badge/Symfony-000000?style=flat&logo=symfony&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)
![Twig](https://img.shields.io/badge/Twig-339933?style=flat&logo=twig&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)

## 🎯 Aperçu

li-energies est un site vitrine moderne développé pour une entreprise du secteur des énergies renouvelables. Le projet met en avant les services proposés, le processus d'installation et les avantages de l'énergie solaire avec une présentation claire et professionnelle.

## ✨ Fonctionnalités

- 🏠 **Page d'accueil** - Présentation de l'entreprise et de ses services
- ⚡ **Services** - Détail des solutions proposées (panneaux solaires, installation, maintenance)
- 🔄 **Processus** - Explication des étapes d'installation
- 📞 **Contact** - Formulaire de contact pour demandes de devis
- 📱 **Design responsive** - Optimisé pour tous les appareils
- 🎨 **Interface moderne** - Design épuré et professionnel

## 🛠️ Stack Technique

**Backend:**
- Symfony 5
- Twig (moteur de templates)
- PHP 7.4+
- MySQL

**Frontend:**
- HTML5 / CSS3
- JavaScript
- Design responsive

## 📋 Prérequis

- PHP 7.4 ou supérieur
- Composer
- MySQL 5.7 ou supérieur
- Serveur web (Apache/Nginx) ou serveur de développement Symfony

## ⚙️ Installation

### 1. Cloner le repository

```bash
git clone https://github.com/Gagz71/li-energies.git
cd li-energies
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Configuration

Créer un fichier `.env.local` à la racine du projet :

```env
# Configuration de la base de données
DATABASE_URL="mysql://user:password@127.0.0.1:3306/li_energies_db?serverVersion=5.7"

# Configuration du mailer (pour le formulaire de contact)
MAILER_DSN=smtp://localhost:1025
```

### 4. Créer la base de données

```bash
# Créer la base de données
php bin/console doctrine:database:create

# Exécuter les migrations (si disponibles)
php bin/console doctrine:migrations:migrate
```

### 5. Lancer le serveur de développement

```bash
# Serveur Symfony
symfony server:start

# OU serveur PHP
php -S localhost:8000 -t public
```

L'application sera accessible sur `http://localhost:8000`

## 📊 Structure du Projet

```
li-energies/
├── config/              # Configuration Symfony
├── public/             # Point d'entrée et assets publics
├── src/
│   ├── Controller/     # Contrôleurs
│   ├── Entity/        # Entités Doctrine (si BDD)
│   └── Form/          # Formulaires Symfony
├── templates/          # Templates Twig
│   ├── base.html.twig
│   ├── home/
│   ├── services/
│   └── contact/
└── var/               # Cache et logs
```

## 🎨 Pages Disponibles

### Page d'accueil
- Bannière héro avec slogan
- Présentation des services
- Avantages de l'énergie solaire
- Call-to-action pour devis

### Page Services
- Détail des solutions proposées
- Installation de panneaux solaires
- Maintenance et suivi
- Conseils personnalisés

### Page Processus
- Les étapes de l'installation
- Schéma explicatif
- Délais et garanties

### Page Contact
- Formulaire de demande de devis
- Coordonnées de l'entreprise
- Carte de localisation (optionnelle)

## 🌟 Points Forts

- ✅ **Design professionnel** adapté au secteur de l'énergie
- ✅ **Performance optimisée** pour un chargement rapide
- ✅ **SEO-friendly** pour un bon référencement
- ✅ **Responsive** sur tous les appareils
- ✅ **Formulaire de contact** opérationnel
- ✅ **Code maintenable** grâce à Symfony

## 🚀 Déploiement

### Préparation pour la production

```bash
# Installation des dépendances production
composer install --no-dev --optimize-autoloader

# Vider le cache
php bin/console cache:clear --env=prod

# Optimiser l'autoloader
composer dump-autoload --optimize --no-dev --classmap-authoritative
```

### Configuration serveur

Assurez-vous que :
- Le dossier `public/` est le document root
- Les permissions sont correctes sur `var/`
- Les variables d'environnement sont configurées

## 🔒 Sécurité

- Protection CSRF sur les formulaires
- Validation des données utilisateur
- Échappement automatique dans Twig
- Headers de sécurité configurés

## 🤝 À propos

Ce projet a été développé pour une entreprise familiale spécialisée dans l'installation de panneaux solaires et les solutions d'énergies renouvelables.

## 📝 Licence

Ce projet est sous licence MIT.

## 👤 Auteur

**Gagz71**
- GitHub: [@Gagz71](https://github.com/Gagz71)

---

**🌞 Développé pour un avenir plus vert et durable !**
