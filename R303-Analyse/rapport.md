# Rapport d’Analyse Approfondi – SAE R3.03

## Conception et Modélisation d’un Système de Vente en Ligne

**Groupe_1_03**

**Membres :**

* ROLLAND Estevan
* SALOU Zahra
* TONG-HATET Mathis
* YMAMOU Yassar

---

## 1. Introduction et Contexte

Ce document constitue le livrable final de la phase d'analyse pour le projet de conception d'une plateforme de vente en ligne de parfums ( type e-commerce ). 
L'objectif est de développer une marketplace dynamique et évolutive, spécialisée dans les parfums de marques originales ou alternatives, ainsi que des produits complémentaires tels que des crèmes parfumées et de l’encens.

Cette architecture complexe a pour vocation de mettre en relation des vendeurs spécialisés avec une clientèle recherchant des produits authentiques et de qualité. Le système centralise l’offre via une interface unique tout en permettant aux admins du site de gérer les utilisateurs et les produits du site avec une supervision stricte pour garantir la cohérence et la qualité de la marketplace.

La phase d’analyse vise à formaliser les besoins fonctionnels et techniques, identifier les acteurs et définir le périmètre du système. 
Les modèles UML produits permettent de fournir une base solide et exploitable pour la conception détaillée et le développement futur de la plateforme.

---

## 2. Démarche Méthodologique et Organisation

### 2.1 Organisation et rôles au sein de l’équipe

Afin de respecter les consignes pédagogiques et de reproduire une situation proche d’un contexte professionnel, l’équipe a été divisée dès le début du projet en deux sous-groupes, simulant une relation **Maîtrise d’Ouvrage (MOA)** / **Maîtrise d’Œuvre (MOE)**.

* **Groupe « Client » (MOA – Maîtrise d’Ouvrage)**
  Composé de *ROLLAND Estevan* et *SALOU Zahra*, ce groupe avait pour rôle de représenter le client final. Il était chargé de :

  * Définir les objectifs globaux du système
  * Exprimer les besoins fonctionnels attendus
  * Préciser les règles de gestion (panier, commande, stock, paiement)
  * Valider les choix proposés par le groupe Analyste

* **Groupe « Analyste » (MOE – Maîtrise d’Œuvre)**
  Composé de *TONG-HATET Mathis* et *YMAMOU Yassar*, ce groupe avait pour mission de traduire les besoins métier en spécifications exploitables. Il s’est occupé de :

  * Identifier et structurer les exigences fonctionnelles et non-fonctionnelles
  * Produire les diagrammes UML (cas d’utilisation, activités, classes)
  * Vérifier la cohérence globale du modèle

Une phase commune a ensuite permis de consolider l’analyse et de valider collectivement l’ensemble des modèles produits.
Ainsi tout les membres ont pus tout de meme modifier et toucher a tout les diagrammes produits.

### 2.2 Démarche itérative et incrémentale

Conformément aux principes de l’**Unified Process**, notre travail s’est inscrit dans une démarche itérative et incrémentale. L’analyse a été construite progressivement selon les phases suivantes :

* **Phase de recueil et de cadrage** : identification des acteurs (client, administrateur, systèmes externes) et délimitation précise du périmètre fonctionnel du système, ainsi que d'un cahier d'éxigence qui nous a servit de premiere base pour pouvoir definir un cahier des charges par la suite.
* **Phase de formalisation** : rédaction des exigences fonctionnelles et non-fonctionnelles à partir des échanges client/analyste et du cahier des charges.
* **Phase de modélisation fonctionnelle** : élaboration du diagramme de cas d’utilisation afin de représenter les interactions entre les acteurs et le système.
* **Phase d’analyse détaillée** : approfondissement de l’analyse à travers les diagrammes d’activités (vision dynamique) et le diagramme de classes d’analyse (vision structurelle).

Chaque itération a permis de valider un incrément avant de passer au suivant, garantissant ainsi la cohérence et la solidité du modèle final.

---

## 3. Identification et Analyse des Besoins

### 3.1 Besoins fonctionnels détaillés

Lors du Brainstorming, nous avons etablis les specificités que le sites devait avoir.
Le système doit répondre aux besoins de plusieurs catégories d’utilisateurs.

**Pour le Visiteur (utilisateur non authentifié) :**

* Accéder au catalogue des produits
* Effectuer des recherches par mots-clés/filtres/catégories
* Consulter les fiches produits détaillées
* Créer un compte client

**Pour le Client (utilisateur authentifié) :**

* S’authentifier et gérer son profil (infos personnelles, adresses, paiement, ...)
* Gérer un panier (ajout, modification, suppression d’articles)
* Passer une commande via un processus structuré
* Choisir une adresse de livraison et un mode de paiement
* Payer la commande via un système de paiement externe
* Consulter et suivre l’état de ses commandes
* Consulter l'historique des commandes

**Pour l’Administrateur :**

* Gérer les produits (création, modification, suppression)
* Gérer les utilisateurs
* Suivre et mettre à jour le statut des commandes

### 3.3 Besoins secondaires et tertiaire ( bonus )

**Pour le Client (utilisateur authentifié) :**

* Pouvoir liker/mettre en favoris des produits
* Shopping à plusieurs (paiement partagé)
* Pouvoir faire des collections de produits (comme sur Pinterest)
* Pouvoir mettre un avis
* Pouvoir chercher des Users
* Système de points de fidélités
* Sons de validations ( lors du paiement et de l'achat )
* Recevoir des suggestions de produits

### 3.3 Besoins non-fonctionnels et contraintes

* **Sécurité et confidentialité** :

  * Authentification forte des utilisateurs, chiffrement des données sensibles (mots de passe, données bancaires), conformité stricte au RGPD.
  * Gestion des rôles et des droits d’accès

* **Fiabilité et intégrité des données** :

  * Vérification du stock avant validation d’une commande
  * Mise à jour des stocks en temps réel juste après l’achat.

* **Traçabilité** :

  * Conservation de l’historique des commandes et de leurs statuts
  * Contrainte {addOnly} appliquée à l'historique des commandes.

* **Ergonomie et accessibilité** :

  * Interface claire et intuitive
  * Compatibilité avec différents supports

---

## 4. Modélisation Fonctionnelle – Diagramme de Cas d’Utilisation

Le diagramme de cas d’utilisation fournit une vision synthétique du périmètre fonctionnel du système. 
Il met en évidence les acteurs principaux (Client, Administrateur) ainsi que les acteurs secondaires externes (Système de paiement, Serveur mail).

Le cas d’utilisation central est **« Passer une commande »**, qui inclut la gestion du panier, la sélection des informations de livraison et le paiement. Des relations d’inclusion et d’extension ont été utilisées afin de factoriser les comportements communs et de représenter les scénarios conditionnels, notamment l’envoi de notifications par e-mail.

![Diagramme de Cas d'Utilisation](https://img.plantuml.biz/plantuml/png/VPLTQXin4CVV3Rx3u1Ut3qwx_aZi4apC5leKC0tnkzWTEofQQT67QMWBlKClqPp3D-b9EfAyNgyIZ36Cz__xQqSp8_dEMAQjgqI_PxaL29yvssbMLGWbGiuCbCD7omKtp78buT_lFx0MpE9MwSZiKLe4b23uJYAyOtiie6OSAn80BKXb-PONmM_Uzti2jnQi0irtJnPAhh7mKh_72giq33RSS0e6G2_Vd9xcWjDwuM5-UhWgAowviPeISj6nEeaFpyOU_iOactm2icuHr7ioGiMu2D9zlxU1sv-ZaNz97YDQqQV8v8xAqrcrk_K1_EZt09p1WXaY7_CCHl0mPCu-4KWrm9WY2Gau9Z3NXnVKu2GKggej7j5nWauyIeLqmX9D6L5XcL0xrnWcYM5AXgzOFA7sNxz-hLNfk3toquIV4V_byABZwZMJRTgp1BqcTFLDEPy9SrtsEc5lV2rSNMjU4Lqcz4r2pubUCsD2mkWhKZ5PDbkS9_GYqCy-OvQoYxGd7mc-LsLeXzzXfShN8-Avr9XrZ4DMQgG4lLNmlMRSADbuq_vcuzW4t2lUx4XkkQxYeQhPsGXwEhKdJHyUNYopuSslzfkb_S-cvmqrJVTDmwVzpsPTtXrFFvsJauS68NN5_b8XCBYQh4wMq67_7L8XHBmCwEXOxIVOtpAklMKyvWVnwchf9ma-mUqjbuLmjDvosLLltbJdHtLsKLrSL6bIBihPPNdofhnevF4hEG9Ko0w1totACW2_-htpuj4Tvdi27zugO0wZqJBUD9jZE6x3IHjEMtRMXlEp5IPdCNLnrSJJipWCnFhuYuxSVIFGI-ye__074p__0G00)

---

## 5. Modélisation Dynamique – Diagrammes d’Activités

### 5.1 Objectifs de l’analyse dynamique

Afin de valider la faisabilité des fonctionnalités identifiées et de clarifier la logique métier du système, une analyse dynamique a été menée à l’aide de diagrammes d’activités UML. Ces diagrammes permettent de représenter de manière précise les enchaînements d’actions, les prises de décision, les responsabilités des acteurs ainsi que les interactions avec les systèmes externes.

Les scénarios modélisés correspondent aux cas d’utilisation critiques du système de vente en ligne. Ils traduisent les parcours réels des utilisateurs et mettent en évidence les traitements normaux, alternatifs et d’erreur.


### 5.2 Scénario : Créer un compte (UC2)

Ce diagramme décrit le processus d’inscription d’un nouvel utilisateur. Après la saisie des informations requises, le système vérifie la validité des données et l’unicité de l’adresse e-mail.

Si l’adresse e-mail est déjà utilisée, la création du compte est refusée et un message d’erreur est retourné à l’utilisateur. Dans le cas contraire, le compte est créé avec succès et une confirmation est affichée. Les champs facultatifs n’empêchent pas la création du compte, ce qui garantit une inscription fluide tout en respectant les contraintes métier.



### 5.4 Scénario : Consulter le catalogue (UC3)

Ce diagramme modélise la navigation d’un client ou d’un visiteur au sein du catalogue de produits. Le système charge les produits disponibles et les affiche sous forme de liste.

Le diagramme intègre des décisions permettant l’application de filtres (prix, catégorie) et la gestion des cas où aucun produit ne correspond aux critères de recherche. Dans ce cas, un message informatif est affiché à l’utilisateur.

### 5.5 Scénario : Gérer le panier (UC5)

Ce diagramme représente les différentes actions possibles lors de la gestion du panier. Le client peut ajouter un produit, modifier les quantités ou supprimer des articles.

Lors de l’ajout d’un produit, le système vérifie la disponibilité du stock. Si le produit est déjà présent dans le panier, la quantité est simplement incrémentée. En cas de stock insuffisant, le système bloque l’ajout et affiche un message d’erreur. À chaque modification, le total du panier est automatiquement recalculé afin de garantir la cohérence des montants affichés.

### 5.6 Scénario : Passer une commande (UC8)

Ce diagramme d’activité modélise le flux principal de transformation d’un panier en commande. Le client valide son panier, puis le système effectue une vérification finale des stocks.

Le client choisit ensuite une adresse de livraison (préenregistrée ou nouvelle) ainsi qu’un mode de paiement. Un récapitulatif détaillé est affiché avant confirmation. En cas de rupture de stock détectée à cette étape, le client est redirigé vers son panier afin d’ajuster sa commande.

### 5.7 Scénario : Payer la commande (UC9)

Ce diagramme décrit l’interaction entre le système et le prestataire de paiement externe. Une demande de paiement est transmise, puis le client saisit ses informations bancaires.

Si le paiement est accepté, le système valide la transaction, enregistre la commande comme payée et déclenche l’envoi d’un e-mail de confirmation. En cas de refus, un message d’échec est affiché et le client doit sélectionner un autre moyen de paiement.

### 5.8 Scénario : Recevoir une confirmation par e-mail (UC12)

Ce diagramme modélise le processus automatique d’envoi d’un e-mail de confirmation après la validation d’une commande. Le système génère le message et le transmet au serveur de messagerie.

Le diagramme prend en compte le cas d’erreur où l’adresse e-mail serait invalide ou inaccessible, situation dans laquelle une erreur est remontée au système.

### 5.9 Scénario : Consulter l’état d’une commande (UC13)

Ce diagramme décrit le suivi des commandes depuis l’espace personnel du client. Le client accède à la liste de ses commandes et peut sélectionner l’une d’entre elles pour en consulter le détail et le statut.

Si la commande est livrée, le système propose le téléchargement de la facture. En cas de commande introuvable ou non attribuée au client, un message d’erreur est affiché et l’accès est refusé.

### 5.10 Scénario : Gérer les produits (UC14)

Ce diagramme décrit l’interaction entre l’administrateur et le système pour la gestion des produits. L’administrateur peut ajouter, modifier ou supprimer un produit depuis le module de gestion.

Si les données saisies sont valides, le système enregistre les modifications et confirme l’opération. En cas d’erreur (données invalides), le système refuse la validation et affiche un message d’erreur. L’administrateur peut également appliquer des filtres pour trier ou rechercher des produits existants.

### 5.11 Scénario : Gérer les utilisateurs (UC15)

Ce diagramme décrit la gestion des utilisateurs par l’administrateur. L’administrateur peut ajouter, modifier, supprimer ou rechercher un utilisateur depuis le module correspondant.

Si l’action est valide, le système met à jour la base de données et affiche un message de confirmation. En cas de tentative de suppression d’un utilisateur critique ou de données invalides, le système bloque l’opération et affiche un message d’erreur. L’administrateur peut également ajouter des rôles ou permissions supplémentaires.

### 5.12 Scénario : Suivre les commandes (UC17)

Ce diagramme décrit le suivi des commandes par l’administrateur ou un employé interne. L’utilisateur sélectionne une commande pour modifier son statut (préparation, expédiée, annulée, etc.).

Si le statut est mis à jour correctement, le système enregistre la modification et affiche la commande actualisée. En cas de commande introuvable ou déjà traitée par un autre employé, un message d’erreur est affiché. L’utilisateur peut appliquer des filtres pour visualiser les commandes par date, statut ou client.

---

## 6. Modélisation Structurelle – Diagramme de Classes d’Analyse

Le diagramme de classes d’analyse représente la structure statique des données et formalise les règles métier principales du système. Il est organisé en plusieurs packages afin de clarifier les responsabilités et les relations entre les classes.

### 6.1 Packages et classes principales

#### Package Utilisateurs :

- User : classe de base pour tous les utilisateurs, contenant les informations de connexion et le rôle (Admin ou Client).

- Acheteur : héritier de User, gère les informations de facturation, de livraison et le mode de paiement.

- Admin : héritier de User, responsable de la gestion des produits, utilisateurs et suivi des commandes.

- SessionAchat : représente une session de navigation et de panier temporaire.

#### Package Produits :

- Produit : informations principales (nom, description, prix, niveau de prestige, quantité disponible, etc.).

- Avis : note et commentaire rédigé par un client après réception d’un produit.

#### Package Commandes :

- Panier : panier temporaire du client.

- LignePanier : chaque produit ajouté avec sa quantité.

- Commande : structure persistante représentant une commande validée.

- LigneCommande : détails des produits commandés, prix et quantité figés au moment de l’achat.

- StatutCommande : énumération des différents statuts (Brouillon, EnAttentePaiement, Payee, Expediee, Annulee).

### 6.2 Relations et associations clés

- Délégation d’identité : un Acheteur déléguant son identité à un User.

- Composition transactionnelle : SessionAchat contient exactement un Acheteur.

- Possession et commandes : un Acheteur possède un Panier et peut effectuer plusieurs Commandes.

- Association produit / avis : un produit peut avoir plusieurs avis, chaque avis est rédigé par un client.

- Composition commande / ligne de commande : une Commande contient une ou plusieurs LigneCommande, chacune liée à un Produit.

### 6.3 Choix de conception majeurs

- Distinction Panier / Commande :
Le panier est temporaire et modifiable, tandis que la commande est persistante et figée une fois validée.

- Traçabilité ({addOnly}) :
L’historique des commandes est immuable : seules de nouvelles commandes peuvent être ajoutées, garantissant l’intégrité des données.

- Immuabilité des commandes ({frozen}) :
Les lignes de commande sont figées après validation pour garantir la cohérence avec la facturation et le stock.

- Gestion des statuts via énumération :
Les statuts des commandes, produits et utilisateurs sont centralisés via des énumérations, assurant une gestion stricte par l’administrateur.

- Attributs relationnels spécifiques :
La ligne de commande stocke prixUnitaire pour maintenir la cohérence des factures, même si le produit subit des modifications ultérieures.

---

## 7. Conclusion

Cette phase d'analyse approfondie a permis de définir un périmètre clair et robuste pour la plateforme de vente en ligne.
Le rapport d'analyse constitue une base solide pour continuer la phase de conception détaillée du système. Les prochaines étapes consisteront à définir l’architecture technique (avec les frameworks et design patterns appropriés) et à commencer l’implémentation des fonctionnalités prioritaires identifiées lors de cette analyse, comme la gestion du catalogue, du panier, des commandes et des utilisateurs.

L’approche itérative, combinée à la répartition des rôles MOA/MOE, a garanti une compréhension complète des besoins et une modélisation UML fiable, assurant ainsi un développement futur structuré et efficace.
