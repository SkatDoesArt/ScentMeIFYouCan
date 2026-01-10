# Rapport R304 - Design Patterns

## Designs Patterns utilisés et implémentés

### Possibilités identifiées

* Delegate
* Factory
* Strategy
* Chain of Responsibility (COR)
* Command (étudié, non implémenté)
* Repository (hors périmètre du diagramme présenté)

---

## 1. Delegate

### Justification du choix

Le pattern **Delegate** a été retenu afin de séparer clairement les responsabilités entre l'identité d’un utilisateur et son rôle métier dans le processus d’achat. Dans le cadre d’une plateforme e-commerce, l’acte d’achat ne doit pas dépendre directement de l’authentification.

L’entité **Acheteur** devient centrale pour le métier, tandis que l’entité **User** est déléguée uniquement lorsque l’acheteur est authentifié.

---

### Avantages

* Découplage fort entre authentification et logique métier
* Support natif des visiteurs (acheteurs non authentifiés)
* Meilleure évolutivité du modèle
* Alignement avec les principes de Clean Architecture

---

### Inconvénients

* Augmentation légère du nombre de classes
* Lecture initiale moins intuitive pour un développeur junior

---

### Illustration et explication du Design Pattern

Le pattern Delegate consiste à confier une partie des responsabilités d’un objet à un autre objet spécialisé. Dans ce projet :

* **Acheteur** délègue l’identité et certaines informations à **User**
* **Admin** délègue les fonctionnalités communes à un objet User

L’objet principal conserve la maîtrise du flux métier tout en s’appuyant sur un délégué.

---

### Présentation de l’implémentation

* `Acheteur` contient une référence optionnelle vers `User`
* Les méthodes d’accès à l’identité utilisent le délégué si présent
* `Admin` possède un `User` délégué pour les fonctionnalités de compte

---

## 2. Strategy

### Justification du choix

Le pattern **Strategy** a été utilisé pour gérer les comportements variables du tri du catalogue produit. Dans un contexte e-commerce, les règles de tri évoluent fréquemment (prix, notation, prestige, etc.) et ne doivent pas être codées en dur dans les contrôleurs.

Le tri est donc externalisé dans des stratégies interchangeables, utilisées par un service applicatif.

---

### Avantages

* Suppression des structures conditionnelles complexes (`if / else`)
* Ajout de nouveaux tris sans modifier le code existant
* Respect du principe Open/Closed
* Logique métier claire et centralisée

---

### Inconvénients

* Augmentation du nombre de classes
* Nécessite une bonne compréhension du pattern pour la maintenance

---

### Illustration et explication du Design Pattern

Le pattern Strategy permet de définir une famille d’algorithmes, de les encapsuler et de les rendre interchangeables.

Dans ce projet :

* Une interface `CatalogSortStrategy`
* Plusieurs implémentations concrètes correspondant à des critères de tri
* Un service qui applique dynamiquement la stratégie choisie

---

### Présentation de l’implémentation

* Interface : `CatalogSortStrategy`
* Stratégies concrètes :

  * `SortByPrice`
  * `SortByRating`
  * `SortByPrestige`
* Service utilisateur : `CatalogueService`

Le contrôleur choisit la stratégie, le service applique le tri.

---

## 3. Chain Of Responsibility

### Justification du choix

Le pattern **Chain of Responsibility** a été retenu pour la validation des commandes lors du processus de checkout. Une commande doit passer par plusieurs règles successives avant d’être validée, et ces règles peuvent évoluer ou changer d’ordre.

Ce pattern permet de modéliser un pipeline de validation clair et extensible.

---

### Avantages

* Découplage fort entre les règles de validation
* Ordre d’exécution configurable
* Ajout ou suppression de règles sans modifier les autres
* Excellente lisibilité du processus métier

---

### Inconvénients

* Débogage parfois plus complexe
* Nécessite une bonne documentation de la chaîne

---

### Illustration et explication du Design Pattern

Le pattern Chain of Responsibility permet de faire circuler une requête à travers une chaîne de traitements. Chaque maillon décide s’il traite la requête ou la transmet au suivant.

Dans ce projet, chaque règle de validation est un maillon indépendant.

---

### Présentation de l’implémentation

* Classe abstraite : `ValidationHandler`
* Handlers concrets :

  * `StockValidationHandler`
  * `PaymentValidationHandler`
  * `AddressValidationHandler`
* Orchestrateur : `CommandeValidator`

La commande est validée uniquement si tous les handlers retournent un succès.

---

## A voir : Pattern Command (non implémenté)

### Justification du choix

Le design pattern **Command** permet de transformer une action en objet, facilitant la gestion, l’historisation et l’annulation d’actions. Il a été étudié pour la gestion du panier, mais non implémenté afin de ne pas complexifier excessivement la première version du projet.

Le pattern Command est souvent comparé à Strategy, mais leurs objectifs diffèrent :

* **Command** encapsule une action
* **Strategy** encapsule un algorithme

---

### Avantages

* Ajout de nouvelles commandes sans modifier le code existant
* Découplage entre l’appelant et l’exécutant
* Possibilité de différer, journaliser ou annuler les actions

---

### Inconvénients

* Complexité accrue
* Ajout d’une couche supplémentaire

---

### Illustration et explication du Design Pattern

Chaque action utilisateur (ajout, suppression, modification de quantité) devient un objet Command possédant ses propres paramètres et une méthode d’exécution.

---

### Présentation de l’implémentation (hypothétique)

* Interface : `Command`
* Méthodes : `execute()`, `undo()`
* Commandes concrètes :

  * `AddToCartCommand`
  * `RemoveFromCartCommand`

Ce pattern reste une évolution possible du projet.
