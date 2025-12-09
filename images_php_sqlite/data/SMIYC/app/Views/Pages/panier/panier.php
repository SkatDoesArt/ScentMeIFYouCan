<?php

use App\Models\ProduitModel;
use App\Models\Panier;
use App\Models\User;
use App\Models\Role;

$client = new User(
    2,
    "Martin",
    "Alice",
    "client1",
    "password",
    Role::Client
); // ou $client = null / false si pas connecté

$produitModel = new ProduitModel();
$liste_produits = $produitModel->getDisponibles();


$panier = new Panier(1, $liste_produits);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>SMIYC/public/css/panier.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>SMIYC/public/css/common.css">
</head>

<body>
    <header id="header">
        <div id="header-container">
            <nav id="nav-upper">                
                <h1 id="bigname">SMIYC</h1>
            </nav>
        </div>
    </header>

    <h2>Récapitulatif de votre panier</h2>

</body>

</html>