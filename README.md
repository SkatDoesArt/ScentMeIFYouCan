# Plateforme de Vente en Ligne — README

Résumé
------
Ce dépôt contient le projet académique « Plateforme de Vente en Ligne » (SAE semestre 3). Le dépôt regroupe :

- le frontend statique (HTML/CSS/JS) dans `Dev/` ;
- un backend PHP packagé pour développement dans `images_php_sqlite/app_php/` ;
- documents, diagrammes et ressources dans `Analyse/` et `Divers/`.

Comment lancer le projet :
----------------------------
Etape 1: cloner le projet

```bash
git clone https://gitlab.univ-nantes.fr/pub/but/but2/sae/groupe3/eq_3_02_rolland-estevan_salou-zahra_tong-hatet-mathis_ymamou-yassar.git
cd eq_3_02_rolland-estevan_salou-zahra_tong-hatet-mathis_ymamou-yassar\images_php_sqlite
```

Etape 2: créer le container

```
sur linux : ./scripts/create.sh
sur windows : docker compose up -d
```

Etape 3: push le container

```
sur linux : ./scripts/push.sh
sur windows : docker cp data/. php:/var/www/html/
docker exec php chown -R www-data:www-data /var/www
```

Etape 4: Initialiser la base de données

Aller dans le terminale du container :
sur linux : ```./scripts/terminale.sh```
sur windows : ```docker exec -it php bash```

puis :

```
cd SMIYC
rm writable/database.db     # -> pour supprimer la base de donnée
php spark db:create database.db # -> pour la recréer
php spark migrate " -> pour instancier les tables
php spark migrate --all " -> pour instancier toutes les tables
php spark db:seed AllSeeder # -> pour remplir toutes les tables
php spark db:seed AdminSeeder # -> pour remplir une deuxieme fois la table de admin au cas ca ne fonctionne pas
```

Etape 5: Lancer le site
Accéder au site:  Il suffit de se rendre sur http://localhost:8080/ ou le http://localhost:8080/SMIYC/public/ via un
navigateur web.


But du projet
-------------
Proposer une plateforme e‑commerce pédagogique permettant de gérer produits, utilisateurs, panier, commandes et stocks,
avec une attention portée sur :

- l'expérience utilisateur (navigation et recherche) ;
- la sécurité et la protection des données ;
- la capacité à expliquer et documenter une stratégie de communication pour l'entreprise.

Table des matières
------------------

1. Présentation commerciale (nom, logo, slogan)
2. Stratégie de communication (cible, canaux, relation client)
3. Communication interne (organisation, outils, réunion type)
4. RGPD & sécurité (mesures proposées)
5. Installation et exécution (technique)
6. Points d'intégration utiles (redirection admin/user, dashboard)
7. Fichiers importants & ressources
8. Prochaines étapes

---

1) Présentation commerciale

---------------------------
Nom proposé : L'Essentiel Parfum

- Motivation : court, mémorisable, positionnement premium-accessible sur le segment parfums.

Logo (proposition) :

- Forme : monogramme stylisé "LEP" ou goutte stylisée évoquant parfum.
- Couleurs : violet profond (#6B21A8) + neutre chaud (beige/écru) pour une image élégante.
- Justification : sobriété et élégance pour inspirer confiance et qualité.

Slogan : "Votre parfum, simplement."

- Justification : met l'accent sur la simplicité d'achat et la mise en valeur du produit principal.

Note : ces éléments sont modulables — adaptez-les si vous changez de gamme produits.

---

2) Stratégie de communication externe

-------------------------------------
Cible clientèle (persona exemple) :

- Persona principal : Femme 25–45 ans, habitante urbaine, revenus moyens à élevés, intéressée par parfums de niche et
  découvertes.
- Comportement : recherche d'avis, suit des influenceurs, achète en ligne après lecture de descriptions et photos
  soignées.

Canaux choisis :

- Instagram (visuel & influence) : posts, stories, collaborations avec micro-influenceurs.
- Email marketing : newsletters mensuelles, relances panier abandonné.
- SEO & contenu : fiches produits riches, blog (guides d'achat, conseils parfum).
- Publicité ciblée (Google Ads, Facebook Ads) : acquisition selon intention d'achat.

Politique de relation client :

- Support via formulaire + adresse e‑mail dédiée, FAQ publique, gestionnaire basique de tickets via Google Forms ou
  outil gratuit.
- Chat widget (optionnel) pour heures de pointe.
- KPI à suivre : taux de conversion, taux de réponse support, NPS/CSAT.

---

3) Communication interne & gestion projet

-----------------------------------------
Organisation et rôles (proposition pour 4 personnes) :

- Chef·fe de projet : coordination, planning, livrables (ex. Estevan)
- Développeur·se backend : base, auth, API, sécurité (ex. Zahra)
- Développeur·se frontend : intégration, UI, responsive (ex. Mathis)
- Responsable communication / contenu : rédaction dossier, réseaux (ex. Yassar)

Justification : répartition claire des responsabilités, facilite la gestion et la traçabilité des tâches.

Outils internes recommandés :

- Messagerie : Discord / Slack (communication quotidienne).
- Gestion de tâches : GitLab Issues / Trello.
- Partage de documents : Google Drive.
- Dépôt code : Git (GitLab/GitHub) avec branches `feature/*` et `main`.

Réunion type (30–40 minutes) — Sujet : Revue sprint

- Ordre du jour :
    1. Tour rapide (chaque membre signale accomplissements) — 10 min
    2. Points bloquants & besoins — 10 min
    3. Priorités pour la semaine suivante — 10 min
    4. Assignation des actions & clôture — 5 min
- Suivi : compte rendu court (bullet points) dans l'issue correspondante.

Méthodes de reporting : backlog priorisé, tâches estimées (petits tickets), revue hebdo.

---

4) Respect des contraintes légales et RGPD

-----------------------------------------
Obligations et bonnes pratiques :

- Afficher politique de confidentialité, mentions légales et CGV accessibles depuis le pied de page.
- Collecte minimale : ne demander que les champs nécessaires (nom, email, adresse pour commandes).
- Consentement explicite pour newsletter & cookies (bannière cookie + enregistrement du consentement).
- Droits utilisateurs : prévoir procédure de demande d'accès, rectification et suppression (ex. contact RGPD).

Mesures techniques de sécurité :

- Hachage des mots de passe (password_hash de PHP / Argon2 si disponible).
- Requêtes préparées pour éviter injections SQL.
- Validation côté serveur et côté client des entrées.
- HTTPS obligatoire en production (TLS).
- Sauvegarde régulière de la base (si SQLite en dev, scripts d'export ; en prod, backups DB dédiés).

Traçabilité : conserver l'horodatage du consentement et logs d'accès nécessaires.

---

5) Installation & exécution (rapide)

------------------------------------
Prérequis : PHP 8+, Composer (selon besoin), Docker (optionnel), Git.

Exécution recommandée avec Docker (si vous utilisez `images_php_sqlite/compose.yaml`) :

```sh
cd images_php_sqlite
docker compose up --build -d
```

Tester uniquement le frontend : ouvrir `Dev/html/index.html` ou `Dev/html/admin-dashboard.html` dans un navigateur.

Exécution rapide du backend (sans Docker) :

```sh
php -S 127.0.0.1:8000 -t images_php_sqlite/app_php/public
```

Adapter le chemin si votre point d'entrée est différent.

---

6) Points d'intégration pratiques

---------------------------------
Redirection admin/user après login :

- Le projet contient un modèle de redirection dans `images_php_sqlite/app_php/auth_redirect_example.php`.
- Intégrer la logique dans votre contrôleur d'auth : après vérification des identifiants, lire le rôle (`role`,
  `is_admin` ou équivalent) et `header('Location: ...')` vers la page appropriée.

Dashboard admin :

- Vue exemple créée : `Dev/html/admin-dashboard.html` (+ CSS/JS associés). C'est une grille 2x2 (Produits, Utilisateurs,
  Commandes, Stocks).
- Pour l'instant les chiffres sont factices ; vous pouvez ajouter un endpoint PHP `/api/admin/stats.php` qui lit la base
  SQLite et renvoie JSON pour peupler la vue.

---

7) Fichiers importants

----------------------

- `Dev/` : frontend HTML/CSS/JS
    - `Dev/html/admin-dashboard.html` — dashboard admin
    - `Dev/css/admin-dashboard.css` — styles
    - `Dev/js/admin-dashboard.js` — script
- `images_php_sqlite/app_php/` : backend PHP, Dockerfile, données
    - `images_php_sqlite/app_php/auth_redirect_example.php` — exemple de redirection
    - `images_php_sqlite/compose.yaml` — configuration Docker Compose
- `Analyse/` et `cahier_des_chargesV1.md` : documentation, exigences et diagrammes
- `Divers/` : images, palette et ressources graphiques

---

8) Prochaines étapes recommandées

---------------------------------

- Finaliser le nom, logo et charte graphique (1 séance créative).
- Implémenter l'endpoint `/api/admin/stats.php` et connecter la dashboard aux vraies données.
- Ajouter la gestion RGPD (bannière cookies, page RGPD, procédures de demande).
- Rédiger le dossier de communication en PDF (5–6 pages) à partir des sections 1–4 ci‑dessus.

---

Aide & contact
---------------
Pour toute question sur l'intégration technique ou la rédaction du dossier, ouvrez une issue ou contactez les membres
listés dans `README` (section équipe) et `Divers/repartition des taches .md`.

Merci — bon travail d'équipe !
