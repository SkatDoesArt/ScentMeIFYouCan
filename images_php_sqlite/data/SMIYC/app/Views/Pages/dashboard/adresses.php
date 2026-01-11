<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/index.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/dashboard.css">

    <title>Document</title>
</head>

<body>
    <?= view('Pages/partials/header', ['showCart' => true]) ?>

    <div id="body">
        <h1>Votre Compte</h1>
        <div id="body-content">
            <div id="categories">
                <ul>
                    <a href="<?= base_url(); ?>dashboard/infos_perso">
                        <li>Informations personnelles</li>
                    </a>
                    <a href="<?= base_url(); ?>dashboard/langue_region">
                        <li>Langue et Région</li>
                    </a>
                    <a href="<?= base_url(); ?>dashboard/adresses">
                        <li><strong>Carnet d'adresses</strong></li>
                    </a>
                    <a href="<?= base_url(); ?>dashboard/moyen_paiement">
                        <li>Informations de paiement</li>
                    </a>
                    <a href="<?= base_url(); ?>dashboard/suivi_commande">
                        <li>Suivis de commande</li>
                    </a>
                    <a href="<?= base_url(); ?>dashboard/historique_commandes">
                        <li>Historique de commandes</li>
                    </a>
                </ul>
            </div>
            <div id="infos">
                <h2>Carnet d'adresses</h2>
                <!-- <div id="list-adress">

                </div> -->
                
                <form action="">
                    <div>
                        <label for="destinataire">Destinataire :</label>
                        <label for="adress">Adresse :</label>
                        <label for="ville">Ville :</label>
                        <label for="region">Région :</label>
                        <label for="code-postal">Code Postal :</label>
                        <label for="pays">Pays :</label>
                    </div>
                    <div>
                        <input id="destinataire" name="destinataire" type="text">
                        <input id="adress" name="adress" type="text">
                        <input id="ville" name="ville" type="text">
                        <input id="region" name="region" type="text">
                        <input id="code-postal" name="code-postal" type="text">
                        <input id="pays" name="pays" type="text">
                    </div>
                </form>

                <button id="modify-info">Modifier vos informations</button>
            </div>
        </div>
    </div>
</body>

</html>