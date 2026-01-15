# README — Application PHP (R301-PHP)

Ce document décrit les fonctionnalités techniques, la structure et les instructions pour installer, exécuter et
maintenir l'application PHP fournie dans ce dépôt. Il reprend et centralise les informations techniques repérées dans le
projet (sous-dossier principal d'application : images_php_sqlite/data/SMIYC).

Sommaire

- Présentation
- Structure du dépôt
- Base de données (SQLite)

Présentation
-----------
Application web (projet pédagogique) implémentée en PHP. Le code applicatif principal se trouve dans
`images_php_sqlite/data/SMIYC/` et suit une organisation MVC (contrôleurs, modèles, vues). Cette application contient
des fonctionnalités e‑commerce basiques : authentification, gestion du panier, commandes, dashboard, et tests unitaires.

Stack technique
---------------

- Langage : PHP
- Framework / structure : CodeIgniter 4 (indications : présence du script `spark`, dossiers `app/`, `public/`,
  `writable/`)
- Gestionnaire de dépendances : Composer (`composer.json`, `composer.lock`)
- Base de données : SQLite (`database.db`) avec scripts de backup SQL
- Tests : PHPUnit (`phpunit.xml.dist`, dossier `tests/`)
- Conteneurisation : Docker (Dockerfile présent) et docker-compose (fichier `images_php_sqlite/compose.yaml`)

Structure du dépôt (emplacements clés)
-------------------------------------

- images_php_sqlite/data/SMIYC/ -> racine de l'application PHP
    - app/ -> contrôleurs, modèles, vues, services (CodeIgniter)
    - public/ -> point d'entrée web (index.php, assets)
    - writable/ -> logs, cache, sessions, uploads (doit être en écriture)
    - vendor/ -> dépendances Composer (peut être présent dans le dépôt)
    - composer.json -> dépendances PHP
    - composer.lock
    - phpunit.xml.dist -> configuration PHPUnit
    - tests/ -> tests unitaires
    - database.db -> base SQLite embarquée
    - backup_ligne_panier.sql -> script SQL de sauvegarde/restore
    - env/.env or env -> exemples / configuration d'environnement
    - spark -> outil CLI (CodeIgniter)

Base de données
---------------

- Type : SQLite
- Fichier principal : `images_php_sqlite/data/SMIYC/writable/database.db`

Fonctionnalités techniques (extrait depuis controllers & models)
----------------------------------------------------------------
Ci-dessous un inventaire des fonctionnalités observées directement dans les contrôleurs et modèles du dossier
`images_php_sqlite/data/SMIYC/app/` avec leur état d'implémentation.

- Catalogue / navigation produits — Fait
    - Contrôleurs / méthodes : `Catalogue::shop`, `Catalogue::detail`, `Catalogue::all`, `Catalogue::parfums`,
      `Catalogue::encens`, `Catalogue::creme`, `Catalogue::brand`, `Catalogue::marque`, `Catalogue::search`,
      `Catalogue::filters`
    - Modèle(s) : `ProduitModel` (méthodes `getDisponibles`, `getBy*`, `paginate`, etc.)
    - Remarque : recherche, filtres et pagination sont implémentés.

- Affichage fiche produit + avis — Fait
    - Contrôleur : `Catalogue::detail`
    - Modèle(s) : `ProduitModel`, `AvisModel::getAvisByProduit`
    - Remarque : récupération des avis et du produit implémentée.

- Ajouter au panier (utilisateur connecté) — Fait
    - Contrôleur : `Cart::addProduct`
    - Modèle(s) : `PanierModel::getOrCreatePanier`, `LignePanierModel::addProduit` (ou `PanierModel::addProduit`
      délégant)
    - Remarque : si utilisateur non connecté, redirection vers login.

- Voir panier (liste & total) — Fait
    - Contrôleur : `Cart::index`
    - Modèle(s) : `PanierModel::getPanierCompletByUser`, `LignePanierModel` pour détails

- Modifier quantité (augmenter / diminuer) — Fait
    - Contrôleur : `Cart::addQuantite`, `Cart::decrementQuantite`
    - Modèle(s) : `LignePanierModel::incrementQuantite`, `LignePanierModel::decrementQuantite`

- Supprimer une ligne du panier — Fait
    - Contrôleur : `Cart::delete`
    - Modèle(s) : `LignePanierModel::deleteLigne` ou `Model::delete`

- Checkout / processus de commande (utilisateur connecté) — Fait (flux principal)
    - Contrôleur : `Commande::checkout` (affiche le formulaire), `Commande::review` (gestion POST/GET PRG),
      `Commande::create` (création finale)
    - Modèle(s) : `CommandeModel::createCommande` (crée la commande et les lignes via `LigneCommandeModel`)
    - Remarque : flux complet pour utilisateurs authentifiés ; les informations de livraison sont stockées en session
      avant création.

- Visualiser statut / page récap commande — Partiellement
    - Contrôleur : `Commande::status` renvoie la vue `Pages/commande/status` mais ne récupère pas explicitement la
      commande par ID dans le controller.
    - Remarque : la création renvoie vers `commande/status/{id}` ; l'affichage détaillé pourrait être à compléter.

- Achat en tant que visiteur (achat sans compte / checkout visiteur) — Non implémenté
    - Observations : les routes `checkout`, `review` et `create` redirigent vers `auth/login` si l'utilisateur n'est pas
      connecté. Aucun flux explicite pour 'guest checkout'.

- Authentification / gestion des comptes — Partiellement
    - Contrôleur : `Auth::login`, `Auth::register`, `Auth::forgotPassword`, `Auth::profile`, `Auth::logout`
    - Observations : l'app s'appuie sur CodeIgniter Shield / provider pour la gestion des utilisateurs (présence de
      `auth()` utilisé dans d'autres controllers). Les vues existent, mais le traitement complet (création/processAuth)
      semble partiellement externalisé à Shield ou à compléter.

- Gestion des commandes côté admin — Partiellement
    - Contrôleur : `Admin::orders` (TODO), `Admin::editCommandes` (TODO), `Admin::deleteCommande` (TODO)
    - Modèle(s) : `CommandeModel::getCommandeById` existe pour récupérer commandes d'un utilisateur; manque une
      interface/admin list complète des commandes.

- CRUD produits côté admin — Fait
    - Contrôleur : `Admin::products`, `Admin::addProduit`, `Admin::editProduit`, `Admin::deleteProduit`
    - Modèle(s) : `ProduitModel` (méthodes d'insert/update/delete)
    - Remarque : gestion des images incluse (upload / lien), création et édition fonctionnelles.

- Gestion utilisateurs côté admin — Fait (partiel)
    - Contrôleur : `Admin::users`, `Admin::addUser`, `Admin::editUser`, `Admin::deleteUser`, `Admin::editRoleUser`
    - Observations : s'appuie sur Shield (`UserModel`, identités, groupes). L'ajout d'utilisateur crée l'identité email
      et le groupe.

- Gestion des stocks — Partiellement / Fait pour modifications
    - Contrôleur : `Admin::stock` (TODO affichage), `Admin::addStocks`, `Admin::removeStocks`
    - Modèle(s) : `ProduitModel::IncrementQauntite`, `ProduitModel::DecrementQauntite`
    - Remarque : méthodes d'incrément/décrément existent, mais l'interface d'administration pour lister les stocks est
      TODO.

- Création de commandes et lignes (persistées) — Fait
    - Modèle : `CommandeModel::createCommande` insère la commande et utilise `LigneCommandeModel` pour enregistrer les
      lignes.

- Avis (reviews) — Fait (lecture)
    - Modèle : `AvisModel::getAvisByProduit`, `getAvisWithUsersByProduct`
    - Remarque : récupération et affichage des avis implémentés ; fonctionnalité d'ajout d'avis à vérifier côté
      contrôleur/views.

- Tests unitaires — Partiellement
    - Présence de `phpunit.xml.dist` et dossier `tests/` ; la couverture et l'exécution des tests doivent être
      vérifiées (`./vendor/bin/phpunit`).

- Paiement (intégration passerelle / paiement) — Non implémenté
    - Observations : aucune intégration (ex: Stripe/PayPal) détectée dans les controllers ou services. Enum
      `MoyenPaiement` existe mais n'est pas exploité.

- API / endpoints REST — Non détecté
    - Observations : controllers servent principalement des vues; aucune API REST dédiée trouvée.

Remarques générales et recommandations rapides

- Les flux principaux d'un e‑commerce (catalogue, panier, checkout pour utilisateurs authentifiés, création de commande)
  sont présents et cohérents.
- Les éléments à compléter en priorité : support du checkout visiteur (si souhaité), affichage/admin des commandes, et
  intégration d'une solution de paiement si paiement en ligne nécessaire.
- Vérifier les vues associées pour la gestion d'erreurs et la validation côté serveur (ex : `Commande::review` fait une
  validation minimale sur les champs de livraison).
