<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Conditions Générales d'Utilisation - SMIYC</title>
    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <style>
        body {
            font-family: Inter, Arial, sans-serif;
            color: #222;
            background: #f9f9f9;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 28px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, .06);
        }

        h1 {
            margin-bottom: 8px
        }

        h2 {
            margin-top: 20px
        }

        p {
            line-height: 1.6
        }
    </style>
</head>
<body>
<?= view('Pages/partials/header'); ?>

<div class="container">
    <h1>Conditions Générales d'Utilisation (CGU)</h1>
    <p>Dernière mise à jour : <?= date('d/m/Y') ?></p>

    <p>Bienvenue sur SMIYC. En utilisant notre site (https://example.local), vous acceptez les présentes Conditions
        Générales d'Utilisation. Merci de les lire attentivement.</p>

    <h2>1. Objet</h2>
    <p>Les présentes CGU définissent les conditions d'accès et d'utilisation des services proposés par SMIYC.</p>

    <h2>2. Inscription</h2>
    <p>Pour créer un compte, vous devez fournir des informations exactes et à jour. L'acceptation des CGU est
        obligatoire pour l'inscription.</p>

    <h2>3. Utilisation du service</h2>
    <p>Vous acceptez de ne pas utiliser le site à des fins illicites, ni de perturber son fonctionnement. Les contenus
        (textes, images, marques) restent la propriété de leurs auteurs respectifs.</p>

    <h2>4. Données personnelles</h2>
    <p>Les données collectées lors de l'inscription sont utilisées pour la gestion de votre compte et le traitement des
        commandes; elles sont soumises à notre politique de confidentialité.</p>

    <h2>5. Modifications</h2>
    <p>Nous pouvons modifier ces CGU à tout moment; les utilisateurs seront informés lors de leur prochaine
        connexion.</p>

    <h2>6. Contact</h2>
    <p>Pour toute question relative aux CGU, contactez-nous via la page « Contact » du site.</p>

    <p style="margin-top:18px;">Merci d'utiliser SMIYC.</p>
</div>
<?= view('Pages/partials/footer'); ?>
</body>
</html>

