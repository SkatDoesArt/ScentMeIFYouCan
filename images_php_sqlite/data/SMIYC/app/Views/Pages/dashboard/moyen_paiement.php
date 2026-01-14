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
                        <li>Carnet d'adresses</li>
                    </a>
                    <a href="<?= base_url(); ?>dashboard/moyen_paiement">
                        <li><strong>Informations de paiement</strong></li>
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
                <h2>Informations de payement</h2>
                <form action="">
                    <div>
                        <label for="name">Nom :</label>
                        <label for="card_number">Numéro de carte :</label>
                        <label for="expiration">Expiration (mm/aa) :</label>
                        <label for="code_secu">Code de sécurité :</label>
                    </div>
                    <div>
                        <input id="name" name="name" type="text">
                        <input id="card_number" name="card_number" type="text">
                        <input id="expiration" name="expiration" type="text">
                        <input id="code_secu" name="code_secu" type="text">
                    </div>


                </form>

                <button id="modify-info">Modifier les informations de la carte</button>

            </div>
        </div>
    </div>

    <?= view('Pages/partials/footer') ?>

</body>

</html>