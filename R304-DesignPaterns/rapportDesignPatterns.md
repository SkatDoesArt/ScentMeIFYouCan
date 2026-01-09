# Rapport R304 - Design Patterns

## Designs Patterns utilisés et implémentés

## Introduction générale

Dans le cadre du développement de notre site de e-commerce, plusieurs **design patterns** ont été étudiés afin de structurer le code de façon plus simple et efficace.
L’objectif principal est de produire une architecture **modulaire, évolutive et maintenable facilement**, capable de s’adapter à l’évolution des règles métier sans remettre en cause l’existant.

Les patterns retenus ont été sélectionnés en fonction :
- des problématiques concrètes du domaine e-commerce,
- de la séparation des responsabilités,
- du respect de ceratins principes (SOLID / Clean Architecture).

---

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

Dans le contexte du projet, plusieurs types d’utilisateurs existent :
- des visiteurs non authentifiés,
- des acheteurs authentifiés,
- des clients enregistrés,
- des administrateurs.

Ainsi le pattern Delegate permet de **dissocier clairement l’identité (`User`) de l’acteur métier (`Acheteur`, `Client`, `Admin`)**. L’entité `User` devient un support technique d’authentification et d’autorisation, tandis que l’entité métier conserve sa cohérence fonctionnelle indépendamment de l’état de connexion.

L’entité **Acheteur** devient centrale pour le métier, tandis que l’entité **User** est déléguée uniquement lorsque l’acheteur est authentifié.

Grâce à cette approche :
- un **Acheteur** peut exister avec ou sans `User`,
- la logique métier liée au panier ou à la commande ne dépend jamais directement de l’authentification,
- l’évolution des mécanismes de connexion n’impacte pas le cœur métier.

---

### Avantages

* Découplage fort entre authentification et logique métier
* Support natif des visiteurs (acheteurs non authentifiés)
* Réduction des dépendances entre couches techniques et fonctionnelles 
* Meilleure évolutivité du modèle
* Alignement avec les principes de Clean Architecture

---

### Inconvénients

* Augmentation légère du nombre de classes
* Lecture initiale moins intuitive pour un développeur junior
* Nécessite une bonne documentation pour éviter les confusions entre rôles et identités 

---

### Illustration et explication du Design Pattern

But : déléguer les responsabilités liées à l'identité et à l'authentification à un objet `User` réutilisable.

![DC_Delegate](https://img.plantuml.biz/plantuml/png/ZP5D2i8m48NtXTvXbXRf1RgGYXSeWWU8PYY3-IapoKgyZvx3YnbjiQrruMm2xvlCUvdK4XI7Q4sUTUfqLYt28P0XKG4Z2rpoBCyWrSae4JW8yak3eKeW3HMG2rCDhIAJP0bChfqIzWOJsATZbDT0ijMMtAf8xEYzcRET8NJX2rxdmTxtvydYAslrZZoTro8ZD-nrf22hOe5stbhbD7xObrEVvY-hBlMF0tzuDSeHyiAeVqnPRlfzLw0VT_EujN5OsX3XTqEQKgFJwKkV)

Explication concise :
- Problème traité : éviter de dupliquer les informations d'identité et l'authentification dans chaque rôle métier (Admin, Client, Acheteur), et permettre de représenter des visiteurs non authentifiés.
- Solution apportée : centralisation des attributs d'authentification/identité dans `User` ; les objets métiers (ex. `Acheteur`, `Admin`) contiennent ou référencent un `User` et délèguent les opérations pertinentes.
- Pertinence pour le e‑commerce : permet de manipuler des entités métier (panier, commande) indépendamment du mécanisme d'authentification, facilite la gestion des comptes et autorisations sans mélanger la logique métier.

---

### Présentation de l'implémentation

Emplacement réel des classes :

- `app/Entities/Users/User.php`
- `app/Entities/Users/Acheteur.php`
- `app/Entities/Users/Admin.php`
- `app/Entities/Users/Client.php`

Extraits de code pertinents (simplifiés) :

- `app/Entities/Users/User.php` (méthodes d'identité/role)

```php
// ...existing code...
public function isAdmin(): bool
{
    return $this->role === 'Admin';
}

public function isClient(): bool
{
    return $this->role === 'Client';
}
// ...existing code...
```

- `app/Entities/Users/Acheteur.php` (délégation conditionnelle)

```php
// ...existing code...
protected ?User $user = null;

public function estAuthentifie(): bool
{
    return $this->user !== null;
}

public function getIdentite(): string
{
    if ($this->estAuthentifie()) {
        return $this->user->getLogin() . ' (' . $this->user->getEmail() . ')';
    }
    return $this->email;
}

public function getUser(): ?User { return $this->user; }
public function setUser(User $user) { $this->user = $user; }
// ...existing code...
```

- `app/Entities/Users/Admin.php` (utilise un délégué `User`)

```php
// ...existing code...
protected User $userDelegate;

public function __construct(User $userDelegate)
{
    $this->userDelegate = $userDelegate;
}

public function getUserDelegate(): User
{
    return $this->userDelegate;
}
// ...existing code...
```

Choix techniques et adaptations :
- L'implémentation utilise une `Entity` CodeIgniter pour `User` et des entités métier (`Acheteur`, `Admin`) qui contiennent soit une référence optionnelle (`Acheteur::$user`) soit un délégué obligatoire (`Admin::$userDelegate`).
- Adaptation pratique : `Acheteur` expose une API homogène (`getIdentite()`, `estAuthentifie()`) qui masque la présence ou non d'un `User` — utile pour les vues/front-end qui n'ont pas à connaître l'état d'authentification.
- Impact : simplifie la logique des contrôleurs et services qui traitent des paniers/commandes car ils travaillent sur un objet métier stable (`Acheteur`) quel que soit le statut de connexion.

---

## 2. Strategy

### Justification du choix

Le catalogue produit constitue un élément central de toute plateforme e-commerce. Or, les critères de tri applicables à ce catalogue sont :
- nombreux,
- variables,
- dépendants du contexte utilisateur ou métier.

Implémenter ces règles de tri directement dans les contrôleurs ou dans un service unique aurait conduit à :
- une multiplication des structures conditionnelles,
- une forte dépendance entre le tri et le reste du système,
- une difficulté d’évolution à moyen terme.

Le pattern **Strategy** a été utilisé pour gérer les comportements variables du tri du catalogue produit. Dans un contexte e-commerce, les règles de tri évoluent fréquemment (prix, notation, prestige, etc.) et ne doivent pas être codées en dur dans les contrôleurs.

Le tri est donc externalisé dans des stratégies interchangeables, utilisées par un service applicatif.

---

### Avantages

* Suppression des structures conditionnelles complexes (`if / else`)
* Ajout de nouveaux tris sans modifier le code existant
* Respect du principe Open/Closed
* Logique métier claire et centralisée
* Meilleure testabilité des comportements 

---

### Inconvénients

* Augmentation du nombre de classes
* Nécessite une bonne compréhension du pattern pour la maintenance

---

### Illustration et explication du Design Pattern

But : permettre de changer l'algorithme de tri sans modifier `CatalogueService` ni les consommateurs.

![DC_Strategy](https://img.plantuml.biz/plantuml/png/XLBD2e904BuBliCSbR07496eQuV09nXqMfPCOsOCf7htLapH5DpRpdpp_UpiGHHPctlfUm_CRsW8JgXOrgOXUFcUxu4xjbBYA-PZCwjPCsLKCcq7Wz_PWRXEyE2wQAmAn72seicblwVXVw6V_0mwUOaYq94VsmlRd9RbKwTPSxli71chOes7HAsXGMCjGVBUxvUo6yY9tWPoxddJmDnldsLSIaRyT0wdZnw133pn6ljiFJIMWs4gd08CwQWLX7_xMRY8edGrJmoDsjAAI-663rGLxejz0G00)

Explication concise :
- Problème traité : multiples critères de tri qui doivent pouvoir évoluer indépendamment du service de catalogue.
- Solution : encapsuler chaque algorithme dans une implémentation de `CatalogSortStrategy` et injecter la stratégie choisie dans `CatalogueService`.
- Pertinence e‑commerce : permet d'ajouter des tris métier (ex. par popularité ou marques) sans toucher au service ni aux contrôleurs.

---

### Présentation de l'implémentation

Emplacement réel des classes :

- `app/Services/Catalogue/Sorting/CatalogSortStrategy.php`
- `app/Services/Catalogue/Sorting/SortByPrice.php`
- `app/Services/Catalogue/Sorting/SortByBrand.php`
- `app/Services/Catalogue/Sorting/SortByCategory.php`
- `app/Services/Catalogue/Sorting/SortByPrestige.php`
- `app/Services/Catalogue/CatalogueService.php`

Extraits de code pertinents :

- Interface : `CatalogSortStrategy`

```php
// ...existing code...
interface CatalogSortStrategy
{
    /**
     * @param ProduitEntity[] $produits
     * @return ProduitEntity[]
     */
    public function sort(array $produits): array;
}
// ...existing code...
```

- Exemple d'implémentation : `SortByPrice`

```php
// ...existing code...
class SortByPrice implements CatalogSortStrategy
{
    public function sort(array $produits): array
    {
        usort($produits, fn(ProduitEntity $a, ProduitEntity $b) => $a->getPrix() <=> $b->getPrix());
        return $produits;
    }
}
// ...existing code...
```

- `CatalogueService` (points clés)

```php
// ...existing code...
private ?CatalogSortStrategy $strategy = null;

public function setStrategy(CatalogSortStrategy $strategy): void
{
    $this->strategy = $strategy;
}

public function getCatalogue(array $produits): array
{
    if ($this->strategy === null) {
        // tri par défaut
        usort($produits, fn(ProduitEntity $a, ProduitEntity $b) => strcmp($a->getNom(), $b->getNom()));
        return $produits;
    }

    return $this->strategy->sort($produits);
}
// ...existing code...
```

Choix techniques et adaptations :
- Les stratégies sont de simples classes sans dépendances externes — facile à instancier depuis un contrôleur ou via un conteneur DI.
- `CatalogueService` accepte la stratégie par setter ; cela laisse la liberté au contrôleur ou à la couche applicative de choisir la stratégie à l'exécution (par paramètres de requête, préférence utilisateur, etc.).
- Extension : pour un projet plus mature, on proposerait une résolution automatique via un factory ou un container, et des stratégies plus riches (ex. tri combiné multi‑critères) avec configuration.

---

## 3. Chain Of Responsibility

### Justification du choix

Le processus de validation d’une commande est composé de **plusieurs règles successives** :
- disponibilité du stock,
- validité du paiement,
- cohérence des informations de livraison,
- règles métier spécifiques.

Or ces règles peuvent evoluer au fil du temps. 

Le pattern **Chain of Responsibility** a donc été retenu pour la validation des commandes lors du processus de checkout. Une commande doit passer par plusieurs règles successives avant d’être validée, et ces règles peuvent évoluer ou changer d’ordre.

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
* Risque de chaîne trop longue

---

### Illustration et explication du Design Pattern

But : valider une `CommandeEntity` via une suite de validations indépendantes et chaînées.

![DC_COR](https://img.plantuml.biz/plantuml/png/XP9DIaD13CVt0tE7B5jaBb2aLDou4a5mdyv4--Xyb4ai5Us1F8SNwvHvHV5rtiiga5-IVpwqMh5WblVWjTgXtU8RmGlwpg5qASAdLbf1CLopPBG2rYFp7-G1e_EKpoJqPY3IGM0nf7wP6s2InuBDDZKqd-8hDxCfXEBHcL-dv2jolEYiyfubsMsZMYMUy2DGb57cphbCp5UOIWsNSFjbp6ZpHigucaRIbBmwn7s_hnvB_oxrscMMIzc92-nhSF86mvR6BAzCiG3tysqzHRkXrgIjpFACaGE9LgNjYg8h7tm2)

Explication concise :
- Problème traité : validations multiples (stock, paiement, adresse, etc.) avec ordre flexible et possibilité d'ajout/suppression de règles.
- Solution : chaque règle implémente `ValidationHandler` et décide de poursuivre ou non la chaîne ; `CommandeValidator` déclenche la chaîne.
- Pertinence e‑commerce : facilite la composition et le test unitaire des règles (ex. tests isolés pour la vérification stock) et la configuration dynamique de la chaîne.

---

### Présentation de l'implémentation

Emplacement réel des classes :

- `app/Services/Commande/Validation/AbstractValidationHandler.php` (nommage réel : `ValidationHandler`)
- `app/Services/Commande/Validation/StockValidationHandler.php`
- `app/Services/Commande/Validation/PaymentValidationHandler.php`
- `app/Services/Commande/CommandeValidator.php`

Extraits de code pertinents :

- `app/Services/Commande/Validation/AbstractValidationHandler.php` (mécanique de chaîne)

```php
// ...existing code...
protected ?ValidationHandler $next = null;

public function setNext(ValidationHandler $handler): ValidationHandler
{
    $this->next = $handler;
    return $handler;
}

public function handle(CommandeEntity $commande): bool
{
    $result = $this->process($commande);

    if ($result && $this->next !== null) {
        return $this->next->handle($commande);
    }

    return $result;
}

abstract protected function process(CommandeEntity $commande): bool;
// ...existing code...
```

- `app/Services/Commande/Validation/StockValidationHandler.php` (exemple de handler concret)

```php
// ...existing code...
protected function process(CommandeEntity $commande): bool
{
    foreach ($commande->getLignesCommande() as $ligne) {
        if ($ligne->getQuantite() > $ligne->getProduit()->getQuantiteRestante()) {
            return false; // stock insuffisant
        }
    }
    return true;
}
// ...existing code...
```

- `app/Services/Commande/CommandeValidator.php` (orchestrateur)

```php
// ...existing code...
protected ?ValidationHandler $firstHandler = null;

public function setFirstHandler(ValidationHandler $handler): void
{
    $this->firstHandler = $handler;
}

public function validate(CommandeEntity $commande): bool
{
    if ($this->firstHandler === null) {
        throw new \LogicException("Aucun handler défini pour la validation.");
    }

    return $this->firstHandler->handle($commande);
}
// ...existing code...
```

Choix techniques et adaptations :
- Les handlers sont légers et ne conservent aucun état persistant — ils prennent en entrée une `CommandeEntity` et renvoient un booléen ; cela facilite le testing et le chaînage.
- La méthode `setNext()` retourne le handler passé afin de faciliter la construction fluide de la chaîne (ex. `$stock->setNext($payment)->setNext($address);`).
- `CommandeValidator` ne connaît pas le contenu de la chaîne : il se contente de déclencher le premier handler — bonne séparation des responsabilités.
- Extension possible : enrichir les retours par des objets `ValidationResult` contenant un code et un message utilisateur pour expliquer un échec au front.

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
