



## **Prérequis**

Avant d’utiliser ce projet, assurez-vous d’avoir installé :

- PHP >= 7.3 (PHP 8.x recommandé)  
 ```bash
   sudo apt install php8.3-xml
````

- Composer  

```bash
apt install composer

````



---

## **Installation**

### 1️⃣ Cloner le projet

```bash
git clone git@gitlab.com:ton-utilisateur/nom-du-repo.git
cd nom-du-repo
````

### 2️⃣ Installer les dépendances avec Composer

```bash
composer install
```

> ⚠️ Si vous avez des erreurs liées à `ext-dom`, installez l’extension PHP XML :
>
> ```bash
> sudo apt install php-xml
> ```

### 3️⃣ Configurer la base de données

1. Créez une base de données MySQL (exemple : `codeigniter_db`)
2. Modifiez le fichier `app/Config/Database.php` :(Sauter pour l'instant)

```php
public $default = [
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'codeigniter_db',
    'DBDriver' => 'MySQLi',
    'charset'  => 'utf8',
    'DBCollat' => 'utf8_general_ci',
    'pConnect' => false,
    'DBDebug'  => (ENVIRONMENT !== 'production'),
    'port'     => 3306,
];
```

### 4️⃣ Configurer le serveur web

* **Lancement du serveur en local**

```bash
php spark serve
```


---

## **Utilisation**

* Ouvrez le navigateur à l’adresse :

  ```
  http://localhost:8080
  ```
* Vous pouvez créer un compte client, vous connecter, parcourir le catalogue, ajouter au panier et passer des commandes (paiement simulé).

---


## **Structure du projet**

```
app/        -> Code applicatif (Controllers, Models, Views)
public/     -> Point d’entrée, fichiers publics (index.php)
system/     -> Framework CodeIgniter
writable/   -> Fichiers temporaires et logs
spark       -> Script CLI de CodeIgniter
```

---


