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
    <?= view('Pages/partials/header', ['showCart' => true, 'showList' => false]) ?>

<div id="body">
    <h1 class="dashboard-title">Votre Compte</h1>
    <div id="body-content">
        <div id="categories">
            <ul>
                <a href="<?= base_url(); ?>dashboard/infos_perso">
                    <li>Informations personnelles</li>
                </a>
                <a href="<?= base_url(); ?>dashboard/langue_region">
                    <li><strong>Langue et Région</strong></li>
                </a>
                <a href="<?= base_url(); ?>dashboard/adresses">
                    <li>Carnet d'adresses</li>
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
            <h2>Langue et Région</h2>
            <form action="">
                <div>
                    <label for="lang">Langue :</label>
                    <input id="lang" name="lang" type="text" value="" readonly>

                    <label for="region">Région :</label>
                    <input id="region" name="region" type="text" readonly>

                </div>
            </form>

                <button id="modify-info">Modifier vos informations</button>
            </div>
        </div>
    </div>

    <?= view('Pages/partials/footer') ?>
</body>

</html>