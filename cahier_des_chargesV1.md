# Cahier des Charges – Plateforme de Vente en Ligne

**Équipe :** Estevan ROLLAND, Zahra SALOU, Mathis TONG--HATET, Yassar YMAMOU

---

## 1. Introduction

### 1.1 Contexte
Notre plateforme de vente en ligne vise à offrir une expérience d'achat fluide et intuitive pour les utilisateurs. Elle intègre des fonctionnalités avancées pour fidéliser la clientèle et optimiser la gestion des produits.

### 1.2 Objectifs
- Permettre aux utilisateurs d'acheter et de réserver des produits.
- Faciliter la recherche et le tri des articles.
- Offrir une gestion de compte complète.
- Intégrer des fonctionnalités sociales et personnalisables.
- Proposer des options de paiement sécurisées et des notifications automatiques.

---

## 2. Fonctionnalités

### 2.1 Fonctionnalités Indispensables

| **Fonctionnalité**               | **Description**                                                                 |
|----------------------------------|---------------------------------------------------------------------------------|
| **Achat de produits**            | Permettre aux utilisateurs d'acheter des articles disponibles en stock.         |
| **Réservation de produits**      | Réserver un article non disponible et recevoir une alerte quand il est de nouveau en stock. |
| **Recherche et tri des articles**| Filtrer les produits par catégories, prix, popularité, etc.                     |
| **Gestion de compte**           | Créer, modifier, supprimer un compte utilisateur.                              |

---

### 2.2 Fonctionnalités Secondaires

| **Fonctionnalité**               | **Description**                                                                 |
|----------------------------------|---------------------------------------------------------------------------------|
| **Liker/Mettre en favoris**      | Ajouter des produits à une liste de favoris.                                   |
| **Collections de produits**      | Créer des collections personnalisées (comme sur Pinterest).                     |
| **Mode clair/sombre**            | Changer l'apparence du site (lightmode/darkmode).                               |
| **Historique des achats**        | Accéder à l'historique des commandes passées.                                  |
| **Suggestions de produits**     | Recevoir des recommandations basées sur les achats et les favoris.              |

---

### 2.3 Fonctionnalités Bonus

| **Fonctionnalité**               | **Description**                                                                 |
|----------------------------------|---------------------------------------------------------------------------------|
| **Shopping à plusieurs**         | Permettre un paiement partagé pour un achat groupé.                             |
| **Avis et notations**            | Laisser des avis sur les produits et les consulter.                            |
| **Recherche d'utilisateurs**     | Trouver et suivre d'autres utilisateurs.                                        |
| **Système de fidélité**          | Accumuler des points pour des réductions ou des avantages.                     |
| **Sons de validation**           | Ajouter des sons pour confirmer les actions (ex: "Merci_pour_le_paiement.wav"). |

---

## 3. Exigences Techniques

### 3.1 Frontend
- **Langages :** HTML5, CSS3, JavaScript (React.js ou Vue.js pour une interface dynamique).
- **Responsive Design :** Adaptation aux mobiles, tablettes et ordinateurs.
- **Personnalisation :** Thèmes light/dark mode.

### 3.2 Backend
- **Langages :** PHP (Laravel ou Symfony) pour la logique métier.
- **Base de données :** MySQL ou PostgreSQL pour stocker les utilisateurs, produits, commandes, etc.
- **API :** Développement d'API RESTful pour la communication entre le frontend et le backend.

---

### 3.3 Fonctionnalités Spécifiques

| **Exigence**                     | **Description**                                                                 |
|----------------------------------|---------------------------------------------------------------------------------|
| **S'identifier/Se déconnecter**  | Formulaire de connexion sécurisé (PHP + Base de données).                       |
| **Recherche de produits**        | Moteur de recherche avec historique (Base de données).                           |
| **Catalogue et filtrage**        | Affichage des produits avec filtres (catégories, prix, etc.).                   |
| **Gestion du panier**            | Ajout/suppression d'articles (PHP + Base de données).                           |
| **Check-out et pré-paiement**    | Ajout d'un mode de paiement et validation de la commande (PHP + Base de données). |
| **Pré-commande**                 | Notification par mail quand un produit est de nouveau disponible.               |

---

## 4. Diagramme de Cas d'Utilisation

Le diagramme de cas d'utilisation illustre les interactions entre les acteurs et les fonctionnalités de la plateforme.

### 4.1 Gestion des Comptes
- **UC1 :** S'authentifier
- **UC2 :** Se déconnecter
- **UC3 :** Créer un compte
- **UC4 :** Supprimer un compte

### 4.2 Catalogue et Commandes
- **UC5 :** Consulter le catalogue
- **UC6 :** Rechercher un produit
- **UC7 :** Gérer le panier
- **UC8 :** Ajouter au panier
- **UC9 :** Supprimer du panier
- **UC10 :** Passer une commande

### 4.3 Paiement
- **UC11 :** Payer la commande
- **UC12 :** Modifier le mode de paiement
- **UC13 :** Modifier l'adresse de livraison

### 4.4 Notifications
- **UC14 :** Recevoir une confirmation par mail

### 4.5 Suivi
- **UC15 :** Consulter l'état de la commande

### 4.6 Administration
- **UC16 :** Gérer les produits
- **UC17 :** Gérer les utilisateurs
- **UC18 :** Gérer les stocks
- **UC19 :** Suivre les commandes

---

## 5. Conclusion

Ce cahier des charges définit les fonctionnalités et les exigences techniques pour le développement de la plateforme de vente en ligne. L'équipe s'engage à livrer un produit de qualité, répondant aux besoins des utilisateurs et des administrateurs.

**Prochaines étapes :**
- Validation du cahier des charges par l'équipe et les parties prenantes.
- Début de la phase de conception.

---
**Document rédigé par :** Estevan ROLLAND, Zahra SALOU, Mathis TONG--HATET, Yassar YMAMOU
**Version :** 1.0
