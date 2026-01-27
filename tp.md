# 🧪 TP FIL ROUGE — Application de Gestion de Ticketing

## 🎯 Objectif du TP

L’objectif de ce TP est de développer **progressivement**, tout au long du module, une **application web complète de gestion de ticketing**, proche d’un cas réel en entreprise.

À la fin du module, vous devrez être capables de :
- concevoir une application web structurée
- gérer des utilisateurs et des droits d’accès
- manipuler des données côté front et côté back
- persister des données en base
- exposer et consommer une API REST
- appliquer des bonnes pratiques de développement

Ce TP est **évolutif** : chaque nouvelle notion vue en cours doit être intégrée au projet.

---

## 🧱 Contexte fonctionnel

L’application permet à une société de gérer les demandes (tickets) de ses clients.

Chaque client possède :
- un ou plusieurs **projets**
- un **contrat** incluant un certain nombre d’heures

Les collaborateurs peuvent :
- créer et traiter des tickets
- enregistrer le **temps passé**
- indiquer si un ticket est inclus dans le contrat ou facturable en supplément

Les clients peuvent :
- consulter leurs tickets
- **valider les tickets facturables** avant facturation

---

## 👥 Rôles utilisateurs

| Rôle | Description |
|---|---|
| Administrateur | Gère les utilisateurs, clients, projets et contrats |
| Collaborateur | Crée et traite les tickets, saisit le temps |
| Client | Consulte ses tickets et valide les tickets facturables |

---

## 🧵 Organisation du TP

- Le TP est **unique** et évolue tout au long du module
- Chaque étape correspond aux notions vues en cours
- Des livrables intermédiaires sont attendus
- Le TP final regroupe **toutes les fonctionnalités**

---

# 📌 ÉTAPE 1 — HTML / CSS  
📅 Début du module (janvier)

## 🎯 Objectifs pédagogiques
- Structurer une interface web
- Concevoir l’architecture des pages
- Travailler l’UX sans logique métier

## 🧪 Travail demandé

Créer les pages **statiques** suivantes :

- Page de connexion
- Tableau de bord
- Liste des projets
- Liste des tickets
- Détail d’un ticket
- Formulaire de création de ticket

### Contraintes
- HTML sémantique
- CSS propre (Flexbox)
- Responsive minimum
- Pas de JavaScript à ce stade

## 📦 Livrable
- Dossier contenant les pages HTML/CSS
- Navigation possible entre les pages

---

# 📌 ÉTAPE 2 — JavaScript (journée intensive du 6 février)

## 🎯 Objectifs pédagogiques
- Ajouter de l’interactivité
- Manipuler le DOM
- Valider les données côté client

## 🧪 Travail demandé

Ajouter du **JavaScript natif** pour :

- Validation des formulaires de création de ticket
- Affichage dynamique :
  - ticket inclus / ticket facturable
- Ajout dynamique de temps passé sur un ticket
- Affichage de messages d’erreur ou de succès
- Interactions sans rechargement (UI uniquement)

### Contraintes
- JavaScript natif uniquement
- Aucun framework
- Code clair et commenté

## 📦 Livrable
- Pages HTML/CSS + JS interactives
- Formulaires validés côté client

---

# 📌 ÉTAPE 3 — PHP (traitement serveur)  
📅 13 février

## 🎯 Objectifs pédagogiques
- Comprendre le fonctionnement du back-end
- Traiter des données envoyées par le front

## 🧪 Travail demandé

Passer l’application en **PHP procédural** :

- Traitement des formulaires côté serveur
- Création de tickets côté PHP
- Affichage dynamique des tickets
- Gestion simple des utilisateurs (sans authentification avancée)

### Contraintes
- PHP procédural
- Séparation logique / affichage
- Sécurisation minimale (`htmlspecialchars`)

## 📦 Livrable
- Application PHP fonctionnelle
- Données traitées côté serveur

---

# 📌 ÉTAPE 4 — SQL & Base de données  
📅 11 mars

## 🎯 Objectifs pédagogiques
- Persister les données
- Concevoir un modèle de données simple

## 🧪 Travail demandé

Créer une base de données permettant de gérer :

- Utilisateurs
- Clients
- Projets
- Tickets
- Temps passé
- Contrats (heures incluses)

### Fonctionnalités attendues
- Création / lecture des tickets depuis la BDD
- Calcul du temps consommé
- Distinction :
  - tickets inclus
  - tickets facturables

### Contraintes
- Requêtes SQL propres
- Requêtes préparées
- Relations simples entre tables

## 📦 Livrable
- Schéma de base de données
- Application PHP connectée à la BDD

---

# 📌 ÉTAPE 5 — Laravel (bases)  
📅 13 mars

## 🎯 Objectifs pédagogiques
- Structurer une application moderne
- Comprendre l’architecture MVC

## 🧪 Travail demandé

Migrer l’application vers **Laravel** :

- Mise en place du projet Laravel
- Routes web
- Contrôleurs
- Vues Blade
- Layout global

### Contraintes
- Respect du MVC
- Code structuré
- Pas encore de BDD complexe

## 📦 Livrable
- Application Laravel fonctionnelle
- Navigation propre

---

# 📌 ÉTAPE 6 — Laravel + BDD (CRUD)  
📅 18 mars

## 🎯 Objectifs pédagogiques
- Utiliser l’ORM Eloquent
- Implémenter un CRUD complet

## 🧪 Travail demandé

Ajouter :
- Migrations
- Modèles
- CRUD complet des tickets
- Gestion du temps passé
- Calcul automatique :
  - heures restantes
  - heures à facturer

## 📦 Livrable
- Application Laravel avec BDD
- CRUD fonctionnel

---

# 📌 ÉTAPE 7 — API REST (2 séances)

## 🎯 Objectifs pédagogiques
- Comprendre l’architecture API
- Séparer front et back

### API – séance 1
- Création de routes API
- Retour JSON
- GET / POST sur les tickets

### API – séance 2
- Consommation de l’API en JavaScript (`fetch`)
- Ajout de tickets sans rechargement
- Affichage dynamique depuis l’API

## 📦 Livrable
- API REST fonctionnelle
- Front JS connecté à l’API

---

# 📌 ÉTAPE 8 — TP FINAL & amélioration  
📅 Fin mars

## 🎯 Objectifs pédagogiques
- Consolider les acquis
- Approfondir selon le niveau

## 🧪 Travail demandé (au choix / bonus)
- Validation des tickets facturables par le client
- Gestion des rôles utilisateurs
- Sécurité basique
- Amélioration UX
- Documentation (README)

## 📦 Livrable final
- Application complète et fonctionnelle
- Code propre et structuré
- Base de données opérationnelle
- API intégrée
- README explicatif

---

## 🏁 Critères d’évaluation

- Fonctionnalités implémentées
- Qualité du code
- Respect des concepts vus en cours
- Autonomie et progression
- Clarté du rendu final

---

Bon travail 🚀  
Ce TP vous accompagne sur **tout le module** et reflète un **cas réel du monde professionnel**.
