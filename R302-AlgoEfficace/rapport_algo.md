# consignes orales

    analyser les couts
    
    pour quelques fonction - PRE, POST claires et complètes
    
    (e.q. admins pour executer function, ...)
    
    donner contexte/intro :
    qu'est ce que le projet.

    faire comme si on avaint un server (dans le cas où ...)


# Rapport de R3.02 Algorithme correct et efficace - SAE3.01
**Groupe 3_02 :**  
Estevan ROLLAND  
Zahra SALOU  
Mathis TONG-HATET  
Yassar YMAMOU*  


## 1. Mise en place de méthodes pour montrer que l'application est correcte

### Fonctionnalités attendues :

### _Parcourir le catalogue_ :

-> _PRECONDITIONS_ :   

    - avoir une liste de produits (table `products` existante)
    - le service de base de données est disponible
    - si pagination : paramètres `page` et `pageSize` valides (entiers > 0)
    - Connexion à la base de données pour récupérer les produits  

-> _POSTCONDITIONS_ :

    - une page de produits est retournée (liste non nulle, taille <= pageSize)
    - métadonnées de pagination renvoyées (total, page, pageSize)
    - aucun effet de bord sur la base (lecture seule)

### _Ajouter un produit au panier_ :

-> _PRECONDITIONS_ :

    - utilisateur authentifié (ou session valide)
    - id produit valide
    - quantité demandée > 0
    - quantité demandée <= stock disponible (optionnel : vérifier à l'ajout ou au paiement)

-> _POSTCONDITIONS_ :

    - le panier de l'utilisateur contient la ligne produit (ajout ou incrément)
    - montant total mis à jour
    - renvoyer nouveau contenu du panier


### _Passer une commande_ : 

-> _PRECONDITIONS_ :   

    - être connecté en tant qu'utilisateur 
    - Avoir un panier non vide
    - Avoir des produits en stock (stock >= quantité pour chaque ligne)
    - Avoir des informations utilisateurs valides (paiement, mail, adresses, ...)
    - moyen de paiement autorisé et valide
  
-> _POSTCONDITIONS_ :   

    - commande réalisée avec succès (status = CONFIRMED)
    - mise à jour atomique du stock des produits commandés pour eviter le surbooking
    - historique des commandes mis à jour
    - panier vidé après la commande



### _Créer un compte_ :
-> _PRECONDITIONS_ :

    - mail : string valide et non utilisé
    - mot de passe :
        - string de minimum 8 caractères
        - ne contient pas d'espaces
        - contient au moins un chiffre
        - ne contient pas l'infos personnelle (nom, prénom, username)
    - username : string non vide

-> _POSTCONDITIONS_ :

    - ajout du compte dans la base de données (hash du mot de passe stocké)
    - être connecté à son compte (session créé)


### _Se connecter_ :

-> _PRECONDITIONS_ :

    - email et mot de passe non vides
    - format email valide

-> _POSTCONDITIONS_ :

    - authentification réussie -> session valide créé
    - authentification échouée -> tentative enregistrée en base de données logs


### _Gérer les produits / utilisateurs (admin)_ :
-> _PRECONDITIONS_ :

    - être connecté en tant qu'administrateur
    - requête validée (champs obligatoires présents et valides)

-> _POSTCONDITIONS_ :

    - produit / utilisateur ajouté, modifié ou supprimé avec succès
    - logs d'action d'administration créés
    - validations d'intégrité (p.ex. pas de suppression d'un produit lié à commandes sans règle)



### Résultats obtenus :

- Nous définissons des contrats (PRE/POST) pour chaque opération critique.
- Ces contrats servent de base pour écrire des assertions et des tests unitaires / d'intégration.


### Assertions :

assertions à placer dans le code/tests :

- Create account :
    - assert email contains "@" and "."
    - assert email not in database_users
    - assert len(password) >= 8
    - assert " " not in password
    - assert contains_digit(password)
    - après création : assert user_in_db(user_id)

- Add to cart :
    - assert auth()->isLoggedIn()
    - assert id_product in database_products
    - assert quantity > 0
    - après ajout : assert cart.total >= 0

- Place order :
    - assert user.is_authenticated
    - assert cart.is_not_empty
    - pour chaque ligne : assert stock(product_id) >= quantity
    - après commande : assert order.status == CONFIRMED
    - et assert stock(product) reduced by ordered quantity



## 2. Montrer que l'application n'est pas coûteuse

Dans cette partie, on analyse les "goulots d'étranglement" (bottlenecks) de notre application, c'est-à-dire les endroits où le code risque de ramer ou de planter si le nombre de produits ou d'utilisateurs augmente.

### Identification des points critiques (Coûts de traitement)

#### Backend et Accès aux données

*   **Filtrage des catégories et pagination (`Catalogue.php`)**
    *   **Problème :** L'usage potentiel de `findAll()` sans limite stricte.
    *   **Analyse :** Si on récupère des milliers de produits d'un coup, on sature la mémoire RAM du serveur. Algorithmiquement, on reste sur du $O(n)$, mais avec un $n$ trop grand, le transfert SQL et l'instanciation des objets deviennent trop lourds.
    *   **Solution :** Forcer la pagination (`paginate(12)`) pour ne charger que ce qui est affiché.

*   **Dashboard Admin : Risque d'explosion mémoire (`Admin.php`)**
    *   **Problème :** Les listes d'utilisateurs et de commandes ne sont pas paginées.
    *   **Risque :** C'est un point critique de scalabilité. Avec 50 000 commandes, faire un `getAllCommande()` provoquera un Memory Exhausted. Le coût est "non borné" : plus le site marche, plus l'admin ralentit jusqu'au crash total.

*   **Redondance des requêtes de détails**
    *   **Problème :** La méthode `detail($id)` peut enchaîner deux requêtes (Table produits puis Table encens).
    *   **Analyse :** On double inutilement les entrées/sorties (I/O). Même si l'accès par ID est en $O(1)$, multiplier les allers-retours avec la BDD est une mauvaise pratique pour la latence.

#### Frontend et Rendu visuel

*   **Poids des médias (Images)**
    *   **Problème :** Affichage direct via `$produit->getUrl()`.
    *   **Impact :** Si l'admin upload des photos de 3 Mo, le client télécharge des Mo de données pour une simple vignette de 200px. Cela sature la bande passante et plombe le score Lighthouse (performance) du site.

*   **Calculs de logique dans les vues**
    *   **Problème :** Construction de filtres (ex: liste des marques) directement dans la vue avec des fonctions comme `array_unique`.
    *   **Analyse :** Ce genre de traitement doit être fait dans le contrôleur ou via une requête `DISTINCT` en SQL pour éviter de manipuler des tableaux de données massifs côté client.

### Analyse de la montée en charge (Scalabilité)

#### Scénario 1 : Pic de trafic (Ex : Soldes ou Black Friday)
Avec 1000 utilisateurs simultanés, le serveur va saturer sur deux points :
*   **Bande passante :** Les images non optimisées vont bloquer le tunnel de téléchargement.
*   **RAM Server :** Si chaque session charge trop de données en mémoire (via les `findAll`), le processeur PHP va saturer la RAM et "tuer" les processus, rendant le site inaccessible.

#### Scénario 2 : Administration à long terme
Après un an d'utilisation, l'historique de commandes sera trop lourd. Sans pagination dans l'interface admin, la page `orders()` renverra systématiquement une erreur 500 (TimeOut ou Memory Limit), rendant la gestion des stocks et des livraisons impossible.

#### Scénario 3 : Concurrence et intégrité (Race Condition)
Lorsqu'il ne reste qu'un seul article et que deux clients cliquent sur "Payer" au même millième de seconde :
*   **Risque :** Si on ne travaille pas avec des Transactions SQL ou des verrous (Locks), les deux scripts vont lire "Stock = 1", les deux vont valider, et le stock finira à -1.
*   **Impact :** Incohérence des stocks et problèmes de SAV (survendu).

