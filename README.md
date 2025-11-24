<div align="center">

# Plateforme de Vente en Ligne (SAE BUT2)

Projet académique : développement d'une plateforme e-commerce moderne (achat, réservation, recherche avancée, personnalisation, interactions sociales, gestion des comptes).

</div>

---

## 📌 Sommaire
1. Contexte & Objectifs  
2. Fonctionnalités  
3. Architecture Prévisionnelle  
4. Exigences Fonctionnelles & Techniques  
5. Installation & Lancement  
6. Utilisation  
7. Workflow de Développement  
8. Qualité & Tests  
9. Sécurité & Données  
10. Diagrammes  
11. Roadmap & Évolutions  
12. Contribution  
13. Équipe  
14. Licence  
15. Statut du Projet  
16. FAQ  
17. Ressources  
18. Prochaines Étapes

---

## 1. Contexte & Objectifs
Cette plateforme vise à offrir une expérience d'achat fluide, personnalisable et engageante. Elle intègre : gestion des produits, réservation d'articles indisponibles, favoris, collections, suggestions intelligentes, historique d'achats, et mécanismes sociaux (avis, recherche d'utilisateurs, fidélité).

**Objectifs principaux :**  
- Achat & réservation rapides  
- Recherche efficace (catégories, prix, popularité)  
- Gestion de compte complète  
- Personnalisation (thème clair/sombre)  
- Notifications mail (pré-commande / confirmation)  
- Extensibilité pour fonctionnalités sociales

---

## 2. Fonctionnalités
### Indispensables
- Achat de produits
- Réservation (alerte retour en stock)
- Catalogue + recherche + tri multi-critères
- Création / modification / suppression de compte

### Secondaires
- Favoris (like)
- Collections personnalisées (type Pinterest)
- Thème clair / sombre
- Historique des achats
- Suggestions basées sur favoris + historiques

### Bonus (Évolutions futures)
- Shopping à plusieurs (paiement partagé)
- Avis & notation des produits
- Recherche et suivi d'utilisateurs
- Système de fidélité / points
- Sons de confirmation (UX ludique)

---

## 3. Architecture Prévisionnelle
| Couche | Stack (prévisionnelle) | Rôle |
|-------|------------------------|------|
| Frontend | HTML5, CSS3, JS (React ou Vue) | Interface utilisateur, interactions dynamiques, thème |
| Backend | PHP (Laravel / Symfony) | API REST, logique métier, sécurité |
| Base de données | MySQL / PostgreSQL | Produits, utilisateurs, commandes, favoris, collections, fidélité |
| Communication | API REST JSON | Intégration front / back |
| Notifications | SMTP / Mailer PHP | Alertes stock, confirmations commande |

**Scalabilité :** Découplage front/back, modularité des services futurs (paiement, recommandation).  
**Évolutivité :** Ajout micro-service recommandation ou fidélité possible.

---

## 4. Exigences Fonctionnelles & Techniques
Voir `cahier_des_chargesV1.md` et `Analyse/cahier_charges_exigences.md` pour le détail initial. Synthèse :

| Domaine | Exigences clés |
|---------|----------------|
| Authentification | Connexion, déconnexion, gestion profil, sécurité basique (hash mots de passe) |
| Catalogue | Filtrage (catégorie, prix, popularité), recherche avec historique |
| Panier | Ajout / suppression, persistance par utilisateur |
| Commande | Checkout, adresse livraison, mode de paiement (intégration ultérieure) |
| Pré-commande | Mise en attente + notification mail retour stock |
| Personnalisation | Mode sombre/clair persisté (localStorage / BD) |
| Engagement | Favoris, collections, avis (phase future) |
| Recommandation | Basée sur favoris + achats (phase secondaire) |
| Fidélité | Points, avantages (roadmap) |

---

## 5. Installation & Lancement
Projet encore en phase documentaire. Instructions ci-dessous anticipées.

### Prérequis
- PHP >= 8.x
- Composer
- Node.js + npm / yarn
- Serveur SQL (MySQL ou PostgreSQL)

### Installation (prévisionnel)
```sh
# Cloner le dépôt
git clone https://gitlab.univ-nantes.fr/pub/but/but2/sae/groupe3/eq_3_02_rolland-estevan_salou-zahra_tong-hatet-mathis_ymamou-yassar.git
cd eq_3_02_rolland-estevan_salou-zahra_tong-hatet-mathis_ymamou-yassar

# Backend (exemple Laravel)
composer install
cp .env.example .env
php artisan key:generate
# Configurer DB dans .env puis
php artisan migrate

# Frontend (exemple React)
cd frontend
npm install
npm run dev
```

### Lancement
```sh
# Démarrer backend
php artisan serve
# Démarrer frontend (port indiqué par le framework)
npm run dev
```

---

## 6. Utilisation (Scénarios de base)
1. Créer un compte / se connecter
2. Parcourir le catalogue, filtrer par catégorie
3. Ajouter des produits au panier ou en réservation
4. Passer commande et recevoir confirmation mail
5. Gérer favoris / collections (phase secondaire)

---

## 7. Workflow de Développement
| Étape | Description |
|-------|-------------|
| Branche principale | `main` stable |
| Nouvelles features | Branches `feature/<nom>` |
| Revue | Merge Request + revue pair |
| Tests | Avant merge, exécution tests unitaires & lint |
| Déploiement | Manuel (environnement académique) |

Convention de commits (suggestion): `type(scope): message` (`feat`, `fix`, `docs`, `refactor`, `test`).

---

## 8. Qualité & Tests
| Type | Outils (prévisionnel) |
|------|-----------------------|
| Lint Front | ESLint + Prettier |
| Lint Back | PHP-CS-Fixer / Laravel Pint |
| Tests Back | PHPUnit |
| Tests Front | Vitest / Jest |
| E2E | Playwright / Cypress (phase ultérieure) |

Mesures futures: couverture de code, scan SAST (GitLab CI). CI à définir.

---

## 9. Sécurité & Données
- Hash mot de passe (bcrypt / Argon2)
- Validation serveur + filtrage entrée (prévenir injections)
- Protection CSRF (framework intégré)
- Politique RGPD (limiter données personnelles à l'essentiel)
- Journaux d'activité admin (phase future)

---

## 10. Diagrammes
Les diagrammes UML (cas d'utilisation, activité) sont dans `Analyse/` :
- `DC.puml` (Cas d'utilisation)
- `Diagramme d'activité.puml` (Flux commandes, panier)
Fichiers lisibles restants en cours de rédaction (`*_lisible.txt`).

Rendu graphique générable via PlantUML :
```sh
plantuml Analyse/DC.puml
plantuml Analyse/Diagramme\ d'activité.puml
```

---

## 11. Roadmap & Évolutions
| Phase | Contenu |
|-------|---------|
| Initiale | Auth, catalogue, panier, commande, réservation |
| Secondaire | Favoris, collections, historique, suggestions, thème |
| Bonus | Avis, shopping partagé, fidélité, recherche users |
| Optimisation | Recommandations avancées, micro-services, scaling |

Indicateur de priorité: Haute (Indispensables), Moyenne (Secondaires), Basse (Bonus).

---

## 12. Contribution
Les contributions suivent le workflow branche + Merge Request. Ouvrir une issue avant changements majeurs. Tests et lint requis avant fusion.

Guide rapide :
```sh
git checkout -b feature/favoris
# coder...
git commit -m "feat(favoris): ajout liste favoris"
git push origin feature/favoris
# ouvrir MR GitLab
```

---

## 13. Équipe
| Nom | Rôle (indicatif) |
|-----|------------------|
| Estevan ROLLAND | Frontend / UX |
| Zahra SALOU | Backend / Données |
| Mathis TONG--HATET | Intégration / Tests |
| Yassar YMAMOU | Fonctionnel / Architecture |

Répartition détaillée dans `Divers/repartition des taches .md`.

---

## 14. Licence
Projet académique interne (Université de Nantes). Licence formelle non définie. Ne pas réutiliser publiquement sans accord de l'équipe et de l'encadrement pédagogique.

---

## 15. Statut du Projet
`EN COURS` – Phase de spécification & préparation architecture. Développement imminent.

---

## 16. FAQ (Rapide)
| Question | Réponse |
|----------|---------|
| Framework final choisi ? | À valider (React vs Vue, Laravel vs Symfony) |
| Paiement réel intégré ? | Mock dans première version, passerelle plus tard |
| Recommandations IA ? | Potentiel futur (analyse historique) |

---

## 17. Ressources / Resources
- `cahier_des_chargesV1.md` – Description complète des besoins
- `Analyse/cahier_charges_exigences.md` – Exigences détaillées
- `Analyse/` – UML & documents de conception
- `Divers/` – Aides (palette couleurs, répartition tâches)

---

## 18. Prochaines Étapes / Next Steps
1. Valider stack technique (frameworks)  
2. Initialiser dépôt backend + structure frontend  
3. Mettre en place modèle BD & migrations  
4. Implémenter Auth + Catalogue  
5. Intégrer Panier + Commande + Réservation  
6. Déployer version alpha interne

---

<div align="center">🎯 Merci de contribuer à un projet propre, documenté et évolutif. </div>

