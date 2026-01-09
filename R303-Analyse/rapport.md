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

Le diagramme de cas d’utilisation présente une vue globale et synthétique du périmètre fonctionnel de la plateforme de vente en ligne. Il met en évidence les acteurs principaux du système, à savoir le Visiteur, le Client et l’Administrateur, ainsi que les acteurs externes indispensables au fonctionnement du système, tels que le Système de paiement et le Serveur mail.

Le diagramme illustre également une hiérarchie d’acteurs, où le Client hérite des droits du Visiteur et l’Administrateur de ceux du Client, permettant de factoriser les comportements communs.

Le cas d’utilisation central est « Passer une commande » (UC8). Celui-ci inclut la gestion du panier, la modification de l’adresse de livraison, le choix du mode de paiement ainsi que la consultation de l’état de la commande. Le paiement déclenche, en cas de succès, l’envoi d’une confirmation par e-mail, modélisé par une relation d’inclusion avec le cas d’utilisation correspondant.

Des relations d’inclusion et d’extension ont été utilisées afin de structurer les fonctionnalités, de mutualiser les traitements communs et de représenter les comportements conditionnels, notamment le suivi des commandes et l’envoi de notifications.

![Diagramme de Cas d'Utilisation](/R303-Analyse/DCU/DCU_final.jpg)

---

## 5. Modélisation Dynamique – Diagrammes d’Activités

## 5.0.1 Scénarios non modélisés

Certains scénarios, bien que décrits dans les cas d’utilisation, n’ont pas été représentés par des diagrammes d’activités. Les raisons sont les suivantes :

* Scénarios secondaires ou très simples :
  - UC1 – Mot de passe oublié : la séquence est linéaire et courte, sans décision complexe. Représenter ce scénario dans un diagramme d’activité aurait apporté peu d’information supplémentaire.

* Scénarios d’erreur très ponctuels :
  - UC1 – Identifiants incorrects, UC12 – Adresse e-mail invalide, UC13 – Commande introuvable, :
  Ces scénarios sont des cas d’erreur spécifiques et ne changent pas radicalement la logique principale. 
  Dans les diagrammes, ils ont été intégrés via des décisions ou messages d’erreur plutôt que représentés par un diagramme séparé.

* Scénarios d’extension très ponctuels : 
  - UC17 – Suivi des commandes par un employé : la logique est similaire à UC13, avec ajout d’un filtrage, et ne justifie pas un diagramme distinct.


## 5.0.2 Scénarios modélisés

### 5.1 Objectifs de l’analyse dynamique

Afin de valider la faisabilité des fonctionnalités identifiées et de clarifier la logique métier du système, une analyse dynamique a été menée à l’aide de diagrammes d’activités UML. Ces diagrammes permettent de représenter de manière précise les enchaînements d’actions, les prises de décision, les responsabilités des acteurs ainsi que les interactions avec les systèmes externes.

Les scénarios modélisés correspondent aux cas d’utilisation critiques du système de vente en ligne. Ils traduisent les parcours réels des utilisateurs et mettent en évidence les traitements normaux, alternatifs et d’erreur.

---

### 5.2 Scénario : Créer un compte (UC2)

Ce diagramme décrit le processus d’inscription d’un nouvel utilisateur. Après la saisie des informations requises, le système vérifie la validité des données et l’unicité de l’adresse e-mail.

Si l’adresse e-mail est déjà utilisée ou est invalide ua fomrat attendus, la création du compte est refusée et un message d’erreur est retourné à l’utilisateur. Dans le cas contraire, le compte est créé avec succès et une confirmation est affichée. Les champs facultatifs n’empêchent pas la création du compte, ce qui garantit une inscription fluide tout en respectant les contraintes métier.

![DA_creer_un_compte](https://img.plantuml.biz/plantuml/png/bP9DJiCm48NtFiM8JTiL-sJHLeKT0aGbzgupeIFPas1FAf2wu0vSWfmZD-4aJ1p-XDG5NdaqxxtvDFOgYOtI1M-4n2DSa7s8DWI4QcQTq85awE7zvHLkRKeOeMC4ruHWkK9ZZXjFo78qESOKMZvsgZhRZYfcT8BnFCs8auiKyQnKpRwXHAhPnA7FYMDWAxbvXw7rsgoR63flrQ8Wb5ZThL33fSxSFYSPtW8UJN4_z95gqfI3zLHbM0oMV6ceXZbSZlUfXx241SWU6URN3IyCwFdc7ujYNTVazXg6CMAdX9ETU0fGlb6Mf6aD-eGml-beSOAdejGsJ3loVw6cq2lQHLp-5sYJ5mNuHBfmbXD4EUY7AaTzBdlQD4nJIeDSKVth6OkrSqEV05DhtPSCA8IXhyYgGK-UjbBd-6i-0000)

---

### 5.3 Scénario : Consulter le catalogue (UC3)

Ce diagramme d’activité décrit le processus de consultation du catalogue par un client ou un visiteur. L’utilisateur peut effectuer une recherche en saisissant un nom de produit ou en appliquant différents filtres tels que la marque, la catégorie ou le prix.

Le système reçoit la demande, applique les critères de recherche et analyse les produits disponibles. Si aucun produit ne correspond aux critères saisis, un message informatif indiquant « Aucun produit trouvé » est affiché et le processus s’arrête.

Dans le cas contraire, les résultats de la recherche sont affichés sous forme de liste. L’utilisateur peut alors vérifier si les produits proposés correspondent à ses attentes. S’il souhaite affiner sa recherche, il peut relancer une nouvelle recherche avec d’autres critères. Ce processus se répète jusqu’à ce que l’utilisateur trouve un produit satisfaisant ou décide de quitter le catalogue.

![DA_cconsulter_catalogue](https://img.plantuml.biz/plantuml/png/RL9TJiCm37xFAInUsAHnWKs2JODNGEm4KUjsbj9anCu0QGVQph6BuMHqAx1AhHJN_lxYEOkDaZfdXCGXF99je-qwXFhMLa9RakC1fh0CdfCJZA1DbHNhGflGcDtI4NhPcTtgY-Muxt1dpA1Su4t43LfHcAUcmKgImYIF4B5QOzJNW3xJbIMcGk13Dm5dCz7nq8P82251GqwYZeuw6zyJycJmNm-RI9_ZMO4QY2d8RrZXDcHi2pLsrjVgRy0_C-U-Ko6hO4KCTI9XO7J1br8LDP1zHBvAH0sCNliXYI5jZmSUWwpHm-Wv-77fAeDzG7rX2ekceKBT8RDj4MuMgKg-Lz7ZtSpEConXKmxe664K4fq8qDVKN0tYp96zH1MdTsgbDpFKzCiAXxIsUHDo9lhLBeQ7VyPECbvw6LS4_15XmH5BlejBs1Tx0ozdQJ-RzB4cNHDbJbjqRd2JMHNnGCJTlMwJlsAmX3TN-Bpytm00)

---

### 5.4 Scénario : Gérer le panier (UC5)

Ce diagramme d’activité décrit le fonctionnement de la gestion du panier du point de vue du client. Celui-ci accède à son panier afin d’ajouter de nouveaux articles ou de modifier son contenu.

Si le panier est vide, le système vérifie si le client est authentifié. Dans le cas contraire, un message l’informe qu’il doit se connecter pour pouvoir passer commande. Une fois connecté, le client peut sélectionner un produit et l’ajouter au panier.

Lorsque le panier contient déjà des articles, le client peut choisir de le modifier. Il peut alors ajouter un nouvel article, modifier les caractéristiques d’un produit existant ou le supprimer. À chaque action effectuée, le système met à jour le contenu du panier afin de refléter les changements demandés. Si aucune modification n’est souhaitée, le client peut quitter le panier.

![DA_gerer_panier](/R303-Analyse/DA_swimlanes/Gerer%20Panier.jpg)


---

### 5.5 Scénario : Passer une commande (UC8)

Ce diagramme d’activité décrit le processus de passage d’une commande à partir d’un panier validé. Le client confirme son panier et choisit une adresse de livraison.

Le système crée ensuite la commande et vérifie la disponibilité des produits. En cas de stock suffisant, les articles sont réservés ; sinon, un message d’erreur est affiché et le processus s’arrête.

Une fois la vérification réussie, le client sélectionne un mode de paiement et le système le redirige vers l’étape de paiement pour finaliser la commande.

![DA_passer_commande](https://img.plantuml.biz/plantuml/png/NP5DJiCm48NtFiMe6z8h90kAoXfGAtLluaapmZ_HU189AGlkm2N8EN8JJi8aYAXYxUzzViy-PB4iVV16I3p28zahsn0Gt9sjXGQIUOBlZqzuiJaZGnyHwXI2ZGwD6O-UCCfeLeqfBzQJKwgpaP0hKnxRH9aOh6FKF3W4JmDRoYbMcZ-_Pvc_0ewAyZnfz4-kuSiyCJKg0aUvIv5UoQzzEawk9ybge0QAiwJw3NBVD9Hj5BZVWxGOeNZkQMy0ojCyQVTXARObqMkTuYd5XTXsAFoWchfL5fcnPzZzwYbk5-mgvRAapc1qrDmymxOt9BUExInXqAD_Mq_eYEcgbsYfV4kjseDwbp_v0G00)

---

### 5.6 Scénario : Payer la commande (UC9)

Ce diagramme d’activité décrit le processus de paiement d’une commande. Le client choisit un mode de paiement et le système vérifie sa validité. Si le mode de paiement est invalide, un message d’erreur est affiché et le processus s’arrête.

Si le mode de paiement est valide, le client peut utiliser des informations de paiement déjà enregistrées ou en saisir de nouvelles, puis valide le paiement. La demande est alors transmise au système de paiement externe.

Si le paiement est accepté, la transaction est confirmée et un e-mail de confirmation est envoyé au client. En cas de refus, un e-mail de refus est transmis au client et le paiement est annulé.

![DA_payer_commande](https://img.plantuml.biz/plantuml/png/bLHBRi8m4Dtx51QRmX6QB4f5k-YYBHAY-r6Om4Z-8Dk9X9H5xz1Bb7DmavwajcaIqm1LhKYHdPdtthmPPseT65T9mHmvWVo1O6r0IkIh6oWSrUGEU_xr_i7di4F3AuMyq5A2MY4VBsUt4yQQcI1Khc4HYsLpiDQ7jc4vosORJPP2DfVQ9_fd2uJIP-K-Vx6pxl0fiM5Kyl7phmXUWo2_lvjmjq75nozQJHZtgoCEc-o-BAdOU6A9ri8Qu-beW4RgY3VAOu1rUijGM5_DQqM-cd0OP3ofKXi9ZhIoAK0CG6LmJTQPmnvjhwn76CXhOPUE10LxX4-aXAEBkeRDavKj89egGaUyG8k5GPVtEB6epgnXsWN-i4uQz2zIjQBoQC4P_e4ZVuevA-IQY4J0wNYynQx7f6JsObmxVobRqmt2l9qSA0hSXkjmlYVPJAkIZ0mSm9q1PSCDqYfFHcA1fiRApoYGI6nuLBNUnJiJ8Q89tLUeU14hwHs8Ktl1v0uiS8II39QLlOvoDEtdDVNly4Vu1W00)

---


### 5.7 Scénario : Gérer les produits (UC14)

Ce diagramme d’activité décrit la gestion des produits par l’administrateur. Après s’être connecté, celui-ci accède au module dédié et peut ajouter, modifier, supprimer ou rechercher des produits.

Pour chaque action, le système met à jour les données correspondantes et confirme l’opération lorsque les informations sont valides. En cas d’erreur ou de données incorrectes, la validation est refusée et un message d’erreur est affiché. L’administrateur peut répéter ces actions jusqu’à la fin de la session de gestion.

![DA_gerer_pdt](/R303-Analyse/DA_swimlanes/rapport/gererProduits_colors.png)

---


### 5.8 Scénario : Gérer les utilisateurs (UC15)

Ce diagramme d’activité décrit la gestion des utilisateurs par l’administrateur. Après s’être connecté, celui-ci accède au module de gestion et peut ajouter, modifier, supprimer ou rechercher un utilisateur.

Pour chaque action, le système met à jour la base de données et affiche une confirmation lorsque l’opération est réussie. L’administrateur peut enchaîner plusieurs actions au cours de la même session avant de se déconnecter.

![DA_gerer_user](/R303-Analyse/DA_swimlanes/Gérer%20Users.jpg)

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
Le panier est temporaire et modifiable, tandis que la commande est persistante une fois validée.
- Contrairement à une approche strictement immuable, le système autorise la modification contrôlée de l’état d’une commande.
La traçabilité est assurée par :  
un cycle de vie explicite (statuts successifs),  
des règles métier strictes encadrant les transitions possibles.  

Les données structurelles de la commande (lignes, prix unitaires) restent stables, tandis que seul le statut évolue (ex. : En attente → Payée → Expédiée).
- Gestion des statuts via énumération :
Les statuts des commandes, produits et utilisateurs sont centralisés via des énumérations, assurant une gestion stricte par l’administrateur.
- Attributs relationnels spécifiques :
La ligne de commande stocke prixUnitaire pour maintenir la cohérence des factures, même si le produit subit des modifications ultérieures.

![DC](https://img.plantuml.biz/plantuml/png/bLRDRXCn4BxlKrYvj81ImO5BL2AM9AYHcX3bvm5CTf9QUErWUmC8LU8TU0bwvyQ1Gzw45-0L6DlxuzriHBg7DfuPZsU--MRilxz-lzQ6AfEbd7I6WqvacE50Xenk5KrJ80cGDQTQWoP_ldqdCquDRAJocZq80mG4uMmh88fsTFs1Re6i3EDCesMcDFaQHGI_2_Bgr9VhHzFLPF5VMsS08al9N6AaNztQVd6ICb6k1fnXS6vvx_vM-oRo2uWPPP2YHU2WImQ810Jh6VqoepntScuQyMfvCvekns_7WtWvVZSzBoC7CbbfKBM8ME94FSBoPBmOKieuIXT6CR4D55nkcMXJxD3z9wcI6whlslHqRTW65U-bv85OMOnx3kfAsYr_FYDCEzmldpJtMfKlGbrtx_DrQLrTzNqLU-JwEaEEzVldeZmPBSUZEOa7D_7oCGZ7wpkmlAoXV19EcYX0xj-olQ9CorPaSvktY62cg67jLccDTBqw2TkX1MtYpDoXdcqOj26y1JDEhDvuTN1g3dEPheLwqeYXZhd7Pu6vO0guZve64tFL4HaJRFI1WYBr8QtraDKEGGa62c8asHw3FR9gfctje9KtP_JVS3AUZXVB-QExpp4vJBfRmrg1cYcPPCpeooTDpK2cAHK9jAZ2QPXhpqvcFhfrQPmv5o_8yF303mzRNupaWdbw71xgREWylxfwqS44-oIVBmbms6PGqAbmXsdjf6REcr5KQ3idf130yu5Guqi7VJxjTjt_ygmUMKlqQMbU97NuYJrFTplErXZeniVcm0yYoXni4Dd9MrqjHGMAQyLNBfSs25j8cuGLCcqTaOfzjaZ8x3slCHZqMh7TgSuMI5MQpN0868O1NlWrqPZwozgXnXKb3ohG61m-jGC_PjGLOOukyHU4bCcPkcUwbYoQgz25XHmlksOZjeu6IuQddWokSDPtZoX8C1rdMU3OoIcJRyWDQLJThv6lLb6iiYaQrQ9s6ZIBvOLLhV9hEzXtQryPBPiBl6gRWtr568qJIt7RG0j7b8-aD6_WjS2wPYPmffqWEegyDOoMs2ishWH3SYYeixBvdca4K7b_esI6r9BLgsWaOcFie-tevi6d3bHi6NtUOVa3GIn4ng7aJz78m1sdjOqTPpnepnTVed8QUBp2wWKpmMu8LGrqgnx67MjxHjIeHZbpgbE2OXoVSwgEBITXfbMNl0XCYonmDkh3ZmIYKyqKH0AR3U0J0UD_3IB11tSK_GC0)

---

## 7. Conclusion

Cette phase d'analyse approfondie a permis de définir un périmètre clair et robuste pour la plateforme de vente en ligne.
Le rapport d'analyse constitue une base solide pour continuer la phase de conception détaillée du système. Les prochaines étapes consisteront à définir l’architecture technique (avec les frameworks et design patterns appropriés) et à commencer l’implémentation des fonctionnalités prioritaires identifiées lors de cette analyse, comme la gestion du catalogue, du panier, des commandes et des utilisateurs.

L’approche itérative, combinée à la répartition des rôles MOA/MOE, a garanti une compréhension complète des besoins et une modélisation UML fiable, assurant ainsi un développement futur structuré et efficace.
