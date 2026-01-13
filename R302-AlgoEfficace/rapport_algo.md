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
