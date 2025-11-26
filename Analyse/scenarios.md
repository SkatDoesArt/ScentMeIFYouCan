# Scénarios du Diagramme de Cas d’Utilisation  
## Plateforme de vente en ligne

---

# UC1 – S’authentifier

## Scénario nominal
1. L’utilisateur accède à la page de connexion.
2. Il saisit son identifiant et son mot de passe.
3. Le système vérifie les informations.
4. Il est authentifié et redirigé vers son espace personnel.

## Scénario alternatif – Mot de passe oublié
1. L’utilisateur clique sur “Mot de passe oublié”.
2. Il fournit son adresse e-mail.
3. Le système envoie un lien de réinitialisation.
4. L’utilisateur redéfinit son mot de passe.

## Scénario d’erreur – Identifiants incorrects
1. L’utilisateur saisit des identifiants invalides.
2. Le système affiche “Identifiant ou mot de passe incorrect”.
3. L’utilisateur peut réessayer.

---

# UC2 – Créer un compte

## Scénario nominal
1. L’utilisateur accède au formulaire d’inscription.
2. Il saisit les informations demandées.
3. Le système valide les données.
4. Le compte est créé et un message de confirmation est affiché.

## Scénario alternatif – Informations facultatives ignorées
1. L’utilisateur ne remplit pas les champs facultatifs.
2. Le système crée quand même le compte.

## Scénario d’erreur – Email déjà utilisé
1. L’utilisateur saisit un e-mail déjà enregistré.
2. Le système refuse la création et affiche un message d’erreur.

---

# UC3 – Consulter le catalogue

## Scénario nominal
1. Le client accède au catalogue.
2. Le système charge les produits disponibles.
3. Le client parcourt la liste.
4. Le système affiche les détails d’un produit sélectionné.

## Scénario alternatif – Tri et filtres
1. Le client choisit un filtre (prix, catégorie…).
2. Le système applique le filtre et rafraîchit le catalogue.

## Scénario d’erreur – Aucun produit trouvé
1. Le client effectue une recherche.
2. Aucun produit ne correspond.
3. Le système affiche “Aucun produit trouvé”.

---

# UC5 – Gérer le panier

## Scénario nominal
1. Le client consulte son panier.
2. Il ajoute un produit.
3. Le système met à jour le panier.
4. Le client modifie quantités ou supprime des articles.
5. Le système recalcule le total.

## Scénario alternatif – Produit déjà présent
1. Le client ajoute un produit déjà présent.
2. Le système augmente simplement la quantité.

## Scénario d’erreur – Stock insuffisant
1. Le client tente d’ajouter un produit non disponible.
2. Le système affiche un message de stock insuffisant.

---

# UC8 – Passer une commande

## Scénario nominal
1. Le client valide son panier.
2. Le système vérifie le stock.
3. Le client choisit l’adresse de livraison.
4. Le client sélectionne un mode de paiement.
5. Le système affiche le récapitulatif.
6. Le client confirme la commande.
7. Le système enregistre la commande.

## Scénario alternatif – Adresse préenregistrée
1. Le client sélectionne une adresse déjà enregistrée.
2. Le système l’utilise automatiquement.

## Scénario d’erreur – Stock manquant
1. Le système détecte un produit en rupture.
2. Le client retourne au panier pour ajuster sa commande.

---

# UC9 – Payer la commande

## Scénario nominal
1. Le système envoie la demande de paiement au prestataire.
2. Le client saisit les informations bancaires.
3. Le prestataire valide la transaction.
4. Le système confirme le paiement.
5. Un e-mail de confirmation est envoyé.

## Scénario alternatif – Paiement préenregistré
1. Le client réutilise sa carte enregistrée.
2. Le système évite la saisie complète.

## Scénario d’erreur – Paiement refusé
1. Le prestataire bloque la transaction.
2. Le système affiche un message d’échec.
3. Le client doit choisir un autre moyen de paiement.

---

# UC12 – Recevoir une confirmation par mail

## Scénario nominal
1. La commande est validée.
2. Le système génère un e-mail de confirmation.
3. Le serveur mail envoie le message au client.

## Scénario d’erreur – Adresse invalide
1. L’e-mail n’atteint pas le client.
2. Le serveur renvoie une erreur au système.

---

# UC13 – Consulter l’état de la commande

## Scénario nominal
1. Le client accède à “Mes commandes”.
2. Le système affiche la liste.
3. Le client sélectionne une commande.
4. Le système affiche son statut.

## Scénario alternatif – Commande livrée
1. Le système propose le téléchargement de la facture.

## Scénario d’erreur – Commande introuvable
1. Le client tente d’accéder à une commande qui n’est pas à lui.
2. Le système affiche une erreur.

---

# UC14 – Gérer les produits (Administrateur)

## Scénario nominal
1. L’administrateur accède à la gestion des produits.
2. Il ajoute, modifie ou supprime un produit.
3. Le système enregistre les changements.
4. Le système confirme l’opération.

## Scénario alternatif – Filtrage
1. L’administrateur trie les produits par catégorie.
2. Le système met à jour l’affichage.

## Scénario d’erreur – Données invalides
1. L’administrateur saisit des informations incorrectes.
2. Le système refuse la validation.

---

# UC15 – Gérer les utilisateurs (Administrateur)

## Scénario nominal
1. L’administrateur ouvre le module utilisateurs.
2. Il choisit une action : ajouter, modifier, supprimer.
3. Le système met à jour la base.
4. Un message de confirmation est affiché.

## Scénario alternatif
- Ajout d’un rôle ou permissions supplémentaires.

## Scénario d’erreur
- Tentative de suppression d’un utilisateur critique.

---

# UC17 – Suivre les commandes (Employé / Admin)

## Scénario nominal
1. L'utilisateur interne accède aux commandes.
2. Il sélectionne une commande.
3. Il modifie le statut (préparation, expédiée…).
4. Le système met à jour la commande.

## Scénario alternatif
- Utilisation de filtres (date, statut, client).

## Scénario d’erreur
- Commande introuvable ou déjà traitée par un autre employé.

---
