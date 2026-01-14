<?php
$user = auth()->user();
?>

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
                    <li><strong>Informations personnelles</strong></li>
                </a>
                <a href="<?= base_url(); ?>dashboard/langue_region">
                    <li>Langue et Région</li>
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
            <h2>Informations personnelles</h2>
            <form action="">
                <div>
                    <label for="nom">Nom :</label>
                    <input id="nom" name="nom" type="text" value="<?= $user->username ?>  " readonly>

                    <label for="prenom">Prénom :</label>
                    <input id="prenom" name="prenom" type="text" value="<?= $user->username ?>  " readonly>

                    <label for="email">Adresse mail :</label>
                    <input id="email" name="email" type="email" value="<?= $user->email ?>  " readonly>

                    <label for="num_tel">Numéro de téléphone :</label>
                    <input id="num_tel" name="num_tel" type="email" value="" readonly>

                    <label for="password">Mot de passe :</label>
                    <input id="password" name="password" type="password" value=" " readonly>

                </div>
            </form>

            <button id="modify-info">Modifier vos informations</button>
            <a href="<?= base_url() . "auth/logout/" ?>">LOGOUT</a>
        </div>
    </div>
</div>

<?= view('Pages/partials/footer') ?>
</body>

</html>