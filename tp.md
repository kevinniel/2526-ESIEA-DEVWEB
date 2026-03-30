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

## 🧱 Contexte fonctionnel détaillé

L’application à développer est un **outil de gestion de ticketing** utilisé par une société de services (ESN, agence web, société de conseil, etc.) afin de gérer les demandes de ses clients, le temps passé par les collaborateurs et la facturation associée.

L’objectif est de **centraliser l’ensemble des échanges, du suivi et de la validation**, depuis la création d’un ticket jusqu’à sa facturation.

---

### 🏢 Clients

Un **client** représente une entreprise ou une organisation faisant appel aux services de la société.

Pour chaque client, l’application doit permettre de :
- consulter ses projets
- consulter les tickets liés à ses projets
- suivre l’état des tickets (ouverts, en cours, terminés, à valider)
- valider ou refuser les tickets facturables

Un client ne peut **voir et agir que sur ses propres données**.

---

### 📁 Projets

Un **projet** appartient obligatoirement à un client.

Un projet permet de :
- regrouper les tickets par contexte fonctionnel ou technique
- définir un cadre contractuel clair

Pour chaque projet, on doit pouvoir :
- associer un ou plusieurs collaborateurs
- rattacher un contrat (ou une enveloppe d’heures)
- consulter la liste des tickets liés au projet

---

### 📄 Contrats & gestion des heures

Chaque projet est associé à un **contrat** définissant :
- un nombre d’heures incluses (ex : 50h / an)
- une période de validité (optionnelle)
- un taux horaire pour les heures supplémentaires

Le système doit permettre :
- de calculer le **temps consommé**
- d’identifier les **heures restantes**
- de distinguer :
  - les tickets inclus dans le contrat
  - les tickets facturables en supplément

Une fois les heures incluses épuisées :
- les nouveaux tickets peuvent être automatiquement marqués comme **facturables**
- ou laissés au choix du collaborateur (selon implémentation)

---

### 🎫 Tickets

Un **ticket** représente une demande faite par un client sur un projet donné.

Chaque ticket doit contenir au minimum :
- un titre
- une description détaillée
- un statut
- une priorité (optionnelle)
- un type (inclus / facturable)
- un temps estimé (optionnel)
- un temps réel passé
- un ou plusieurs collaborateurs assignés

#### Statuts possibles (exemple)
- Nouveau
- En cours
- En attente client
- Terminé
- À valider (client)
- Validé
- Refusé

Le cycle de vie d’un ticket doit être clairement identifiable.

---

### ⏱️ Suivi du temps

Les collaborateurs doivent pouvoir :
- enregistrer le temps passé sur un ticket
- ajouter plusieurs entrées de temps
- associer chaque entrée à :
  - une date
  - une durée
  - un commentaire (optionnel)

Le système doit :
- agréger automatiquement le temps passé par ticket
- répercuter ce temps sur le contrat du projet
- identifier les heures facturables

---

### 💰 Tickets inclus vs facturables

Chaque ticket doit être clairement identifié comme :
- **inclus dans le contrat**
- ou **facturable en supplément**

Les règles attendues :
- un ticket inclus consomme les heures du contrat
- un ticket facturable génère du temps à facturer
- le passage en facturable peut être :
  - automatique (contrat épuisé)
  - manuel (décision du collaborateur ou administrateur)

---

### ✅ Validation client

Les tickets **facturables** doivent obligatoirement passer par une **validation du client** avant facturation.

Le client doit pouvoir :
- consulter le détail du ticket
- voir le temps passé
- accepter ou refuser la facturation

En cas de refus :
- le ticket repasse dans un état spécifique
- un commentaire peut être ajouté

---

## 👥 Rôles utilisateurs & responsabilités

### 🔑 Administrateur

L’administrateur dispose de **droits complets** sur l’application.

Il peut :
- gérer les utilisateurs (création, modification, rôles)
- gérer les clients
- créer et modifier les projets
- définir les contrats et les enveloppes d’heures
- consulter l’ensemble des tickets
- forcer certains statuts si nécessaire

---

### 🧑‍💻 Collaborateur

Le collaborateur est un utilisateur interne.

Il peut :
- consulter les projets auxquels il est assigné
- créer des tickets pour un projet
- modifier les tickets dont il est responsable
- changer le statut des tickets
- enregistrer le temps passé
- indiquer si un ticket est inclus ou facturable

Il ne peut pas :
- gérer les contrats
- voir les projets auxquels il n’est pas assigné
- valider les tickets facturables

---

### 👤 Client

Le client est un utilisateur externe avec des droits limités.

Il peut :
- consulter ses projets
- consulter les tickets liés à ses projets
- suivre l’état d’avancement
- consulter le temps passé
- valider ou refuser les tickets facturables

Il ne peut pas :
- créer ou modifier des tickets
- voir les données d’autres clients
- modifier les contrats ou projets

---

## 🔒 Contraintes générales

- Chaque utilisateur doit être authentifié
- Les droits d’accès doivent être respectés
- Un utilisateur ne peut accéder qu’aux données autorisées par son rôle
- Les actions critiques (validation, facturation) doivent être tracées

---

## 🧵 Organisation du TP

- Le TP est **unique** et évolue tout au long du module
- Chaque étape correspond aux notions vues en cours
- Des livrables intermédiaires sont attendus
- Le TP final regroupe **toutes les fonctionnalités**

---

# 📌 ÉTAPE 1 — HTML / CSS - jusqu'au 5 Février 2026

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

Pages (plus vraiment optionnelles) supplémentaires : 
- Page d'inscription
- Mot de passe perdu
- Profil utilisateur
- Paramètres
- Détail d'un projet
- Création + Edition d'un projet (formulaire)


Imaginer en plus toutes les autres pages qui vous paraissent nécessaires et pertinentes pour la réalisation du projet, et les réaliser.

### Contraintes
- HTML sémantique
- CSS propre (Flexbox)
- Responsive minimum
- Validation du HTML avec le W3C

## 📦 Livrable
- Dossier contenant les pages HTML/CSS
- Navigation possible entre les pages

---

# 📌 ÉTAPE 2 — JavaScript - jusqu'au 8 Février 2026

## 🎯 Objectifs pédagogiques
- Ajouter de l’interactivité
- Manipuler le DOM
- Valider les données côté client

## 🧪 Travail demandé

Ajouter du **JavaScript natif** pour :

- Validation des formulaires de création de ticket
- Affichage dynamique :
  - ticket inclus / ticket facturable (= filtres comme pour les genres dans l'exemple du cours)
- Affichage de messages d’erreur ou de succès

### Contraintes
- JavaScript natif uniquement
- Aucun framework
- Code clair et commenté

## 📦 Livrable
- Pages HTML/CSS + JS interactives
- Formulaires validés côté client

---

# 📌 ÉTAPE 3 — PHP  - jusqu'au 12 Février 2026

⚠️ Vous devez initialiser un nouveau repository GIT à partir d'ici en repartant de la base que vous avez déjà réalisé jusqu'ici.

## 🎯 Objectifs pédagogiques
- Comprendre le fonctionnement du back-end
- Traiter des données envoyées par le front

## 🧪 Travail demandé

Passer l’application en **PHP procédural** :

- Traitement des formulaires côté serveur
- Affichage dynamique des tickets (à partir d'un tableau PHP)

### Contraintes
- PHP procédural
- Séparation logique / affichage
- Sécurisation minimale (`htmlspecialchars`)

### Optionnel 
- tout passer en PHP Orienté Objet
- Intégration d'un autoloader avec composer par exemple

## 📦 Livrable
- Application PHP fonctionnelle (sans persistance de données)
- Données traitées côté serveur

---

# 📌 ÉTAPE 4 — SQL & Base de données - jusqu'au 10 Mars 2026

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
- Distinction :
  - tickets inclus
  - tickets facturables

### Contraintes
- Requêtes SQL propres
- Requêtes préparées
- Relations simples entre tables

## 📦 Livrable
- Application PHP connectée à la BDD et fonctionnelle

---

# 📌 ÉTAPE 5 — Laravel (bases) - jusqu'au 1O Avril - 8h45

## 🎯 Objectifs pédagogiques
- Structurer une application moderne
- Comprendre l’architecture MVC

## 🧪 Travail demandé

⚠️ IMPORTANT
⚠️ IMPORTANT
⚠️ IMPORTANT

1. Envoyer le lien de votre repo git du projet qui était à réaliser pour aujourd'hui sur cette url : https://docs.google.com/forms/d/e/1FAIpQLSdBAeDlpLw452NtqUQphA1FO8AIdxcqhAQbciUbvVNqfmoLbw/viewform?usp=publish-editor

2. Créez un nouveau repository pour le projet Laravel

⚠️ IMPORTANT
⚠️ IMPORTANT
⚠️ IMPORTANT

Migrer l’application vers **Laravel** :

- Mise en place du projet Laravel
- Routes web
- Contrôleurs
- Vues Blade
- Layout global

### Contraintes
- Respect du MVC
- Code structuré
- Pas encore de BDD

## 📦 Livrable
- Application Laravel navigable et non fonctionnelle (pas de persistence de données)
- Navigation propre

---

# 📌 ÉTAPE 6 — Laravel + BDD (CRUD) - jusqu'au 10 Avril - 8h45

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

# 📌 ÉTAPE 7 — API REST (2 séances) - jusqu'au 10 Avril - 8h45

### API – séance 1
- Création de routes API
- Retour JSON
- GET / POST sur les tickets
- Consommation de l’API en JavaScript (`fetch`)
- Ajout de tickets sans rechargement
- Affichage dynamique depuis l’API

⚠️ OBLIGATOIRE : Au moins 1 route API, avec l'exploitation de cette route dans votre projet en JS avec la méthode `fetch()`
⚠️ ATTENTION : Pour les besoins de connexion, et d'authentification des requêtes sur la partie API, vous pouvez utiliser `SANCTUM`

## 📦 Livrable
- API fonctionnelle
- Front JS connecté à l’API

---

# 📌 ÉTAPE 8 — TP FINAL & amélioration - jusqu'au 10 Avril - 8h45  

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
