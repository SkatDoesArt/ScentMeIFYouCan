# Rapport R304 - Design Patterns

## Designs Patterns utilisés et implémentés

### 1. Commande
### 2. dd
### 3. dd

## 1. Commande
### Justification du choix :
Le design pattern Commande permet de simplifier l'utilisation de fonctions et réduire la redondance de code. 
Lorsque l'on a plusieurs classes implémentant une même fonction, on peut créer un super-classe ayant cette fonction.

Commande ressemble à Strategie mais leur but est différent.
On peut utiliser Commande pour convertir un traitement en un objet et les paramètres du traitement deviennent des attributs de cet objet. La conversion permet de différer le lancement du traitement, le mettre dans une file d’attente, stocker l’historique des commandes, etc.

Stratégie quant à elle, décrit différentes manières de faire la même chose et nous laisse permuter entre ces algorithmes à l’intérieur d’une unique classe.

#### Avantages :
- On peut ajouter de nouvelles commandes dans le programme sans endommager le code existant
- Permet de séparer les classes qui appellent les traitements de celles qui les exécutent.
- Possibilité de différer l'exéctution des traitements

#### Inconvénients :
- Le code peut devenir plus compliqué car on ajoute une couche entre les demandeurs et les recepteurs


### Illustration et explication du Design Pattern :


### Présentation de l'implémentation :



## 2.
### Justification du choix :


### Illustration et explication du Design Pattern :


### Présentation de l'implémentation :



## 3.
### Justification du choix :


### Illustration et explication du Design Pattern :


### Présentation de l'implémentation :

