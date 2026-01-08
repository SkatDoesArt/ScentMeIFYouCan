# Rapport d’Analyse Approfondi – SAE R3.03

## Conception et Modélisation d’un Système de Vente en Ligne

**Groupe_X_Y**

**Membres :**

* ROLLAND Estevan
* SALOU Zahra
* TONG-HATET Mathis
* YMAMOU Yassar

---

## 1. Introduction et Contexte

Ce document constitue le livrable final de la phase d’analyse de la SAE R3.03. Il a pour objectif de formaliser de manière rigoureuse les exigences nécessaires à la conception d’une plateforme de vente en ligne. Avant toute phase de développement, il est indispensable de comprendre précisément les attentes du client, d’identifier les acteurs impliqués et de définir clairement le périmètre fonctionnel et technique du système.

Le système étudié correspond à une plateforme e-commerce classique permettant à des clients de consulter un catalogue de produits, de gérer un panier, de passer commande et d’effectuer un paiement en ligne. Il intègre également un volet administratif permettant la gestion des produits, des utilisateurs et le suivi des commandes. Des systèmes externes, tels qu’un prestataire de paiement et un serveur de messagerie, complètent l’architecture afin d’assurer un fonctionnement réaliste et cohérent.

Cette phase d’analyse vise à produire une base solide et exploitable pour la suite du projet, en s’appuyant sur des modèles UML normalisés et une démarche méthodologique structurée.

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

### 2.2 Démarche itérative et incrémentale

Conformément aux principes de l’**Unified Process**, notre travail s’est inscrit dans une démarche itérative et incrémentale. L’analyse a été construite progressivement selon les phases suivantes :

* **Phase de recueil et de cadrage** : identification des acteurs (client, administrateur, systèmes externes) et délimitation précise du périmètre fonctionnel du système.
* **Phase de formalisation** : rédaction des exigences fonctionnelles et non-fonctionnelles à partir des échanges client/analyste et du cahier des charges.
* **Phase de modélisation fonctionnelle** : élaboration du diagramme de cas d’utilisation afin de représenter les interactions entre les acteurs et le système.
* **Phase d’analyse détaillée** : approfondissement de l’analyse à travers les diagrammes d’activités (vision dynamique) et le diagramme de classes d’analyse (vision structurelle).

Chaque itération a permis de valider un incrément avant de passer au suivant, garantissant ainsi la cohérence et la solidité du modèle final.

---

## 3. Identification et Analyse des Besoins

### 3.1 Besoins fonctionnels détaillés

Le système doit répondre aux besoins de plusieurs catégories d’utilisateurs.

**Pour le Visiteur (utilisateur non authentifié) :**

* Accéder au catalogue des produits
* Effectuer des recherches par mots-clés et filtres
* Consulter les fiches produits détaillées
* Créer un compte client

**Pour le Client (utilisateur authentifié) :**

* S’authentifier et gérer son profil
* Gérer un panier (ajout, modification, suppression d’articles)
* Passer une commande via un processus structuré
* Choisir une adresse de livraison et un mode de paiement
* Payer la commande via un système de paiement externe
* Consulter et suivre l’état de ses commandes
* Recevoir une confirmation par e-mail

**Pour l’Administrateur :**

* Gérer les produits (création, modification, suppression)
* Gérer les utilisateurs
* Suivre et mettre à jour le statut des commandes

### 3.2 Besoins non-fonctionnels et contraintes

* **Sécurité et confidentialité** :

  * Stockage sécurisé des mots de passe par hachage
  * Gestion des rôles et des droits d’accès

* **Fiabilité et intégrité des données** :

  * Vérification du stock avant validation d’une commande
  * Réservation des produits afin d’éviter le sur-achat

* **Traçabilité** :

  * Conservation de l’historique des commandes et de leurs statuts

* **Ergonomie et accessibilité** :

  * Interface claire et intuitive
  * Compatibilité avec différents supports

---

## 4. Modélisation Fonctionnelle – Diagramme de Cas d’Utilisation

Le diagramme de cas d’utilisation fournit une vision synthétique du périmètre fonctionnel du système. Il met en évidence les acteurs principaux (Client, Administrateur) ainsi que les acteurs secondaires externes (Système de paiement, Serveur mail).

Le cas d’utilisation central est **« Passer une commande »**, qui inclut la gestion du panier, la sélection des informations de livraison et le paiement. Des relations d’inclusion et d’extension ont été utilisées afin de factoriser les comportements communs et de représenter les scénarios conditionnels, notamment l’envoi de notifications par e-mail.

---

## 5. Modélisation Dynamique – Diagrammes d’Activités

Les diagrammes d’activités permettent de décrire le comportement dynamique du système pour les processus critiques, tels que :

* La consultation du catalogue
* La gestion du panier
* La passation et le paiement d’une commande
* Les opérations d’administration

Ces diagrammes mettent en évidence les décisions importantes, les boucles de traitement et les interactions avec les systèmes externes.

---

## 6. Modélisation Structurelle – Diagramme de Classes d’Analyse

Le diagramme de classes d’analyse est organisé en plusieurs packages afin d’améliorer la lisibilité :

* **Utilisateurs** : User, Acheteur, Admin, SessionAchat
* **Produits** : Produit, Avis
* **Commandes** : Panier, LignePanier, Commande, LigneCommande, StatutCommande

Un choix de conception important consiste à distinguer clairement le panier (structure temporaire) de la commande (structure persistante). Le prix unitaire est stocké dans la ligne de commande afin de garantir la cohérence des factures, même en cas de modification ultérieure du catalogue.

---

## 7. Conclusion

Cette phase d’analyse a permis d’identifier précisément les exigences du client et de modéliser le système de vente en ligne de manière cohérente et structurée. L’approche itérative inspirée de l’Unified Process, combinée à une organisation en sous-groupes Client/Analyste, a favorisé une compréhension approfondie du besoin et une modélisation UML robuste.

Le travail réalisé constitue une base fiable pour la phase de conception et de développement du système.
