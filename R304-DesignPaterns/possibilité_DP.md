## fichier contenant les DP possibles a mettre en place :

### Factory :
#### Catégorie : Création
La Factory centralise la création des objets produits.
- usage: Création automatique des entités à partir des données de la base de données
- pourquoi? : Le reste de l'application ne manipule que l'interface Produit. L'ajout d'un nouveau type de produit (ex: Échantillon, Pack cadeau) ne nécessite aucune modification dans le code des contrôleurs
- implémentation : Classe : ProduitFactory avec une méthode statique build(string $type, array $data)


### Strategy : 
#### Catégorie : Comportement
gérer les differents comportements de la boutique : 
- usage : calcul de frais de port ( standars, express, point relais ) / methode de tri du catalogue ( prix, prestige, notation, marque, categorie)
- pourquoi ? : separer l'algorithme de calcul de l'objet "commande"
- implémentation : Interface : ShippingStrategy avec une méthode calculate(float $weight). Classes concrètes : ExpressShipping, FreeShipping, RelayShipping.

### Command : 
#### Catégorie : Comportement
transformer une action utilisateur en objet
- usage : La gestion du panier (Ajouter, Supprimer, Modifier quantité)
- pourquoi ? : découpler le bouton de l'interface de la logique métier. Si vous voulez un jour ajouter une fonction "Annuler la dernière action" (Undo), c'est le seul pattern qui le permet proprement
- implémentation : Interface : Command avec les méthodes execute() et undo(). Classes concrètes : AddToCartCommand, RemoveFromCartCommand.

### Delegate : 
#### Catégorie : Structure
un admin pourrai avoir un user et utiliser ses fonctions pour
- usage : Un admin possède un objet User et utilise ses fonctions pour les actions communes de compte. un user  possède un objet visiteur et utilise ses fonctions pour les actions communes
- pourquoi ? : Un Admin peut ainsi manipuler les fonctions d'un utilisateur (login, gestion profil) via son délégué tout en gardant ses propres responsabilités (bannissement, gestion des stocks)
- implémentation : La classe Admin contient une instance de User et appelle ses méthodes (ex: $this->userDelegate->getEmail())