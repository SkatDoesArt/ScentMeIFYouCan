<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Politique de confidentialité (RGPD) - SMIYC</title>
    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <style>
        body {
            font-family: Inter, Arial, sans-serif;
            color: #222;
            background: #f9f9f9;
        }

        .container {
            max-width: 1000px;
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

        p, li {
            line-height: 1.6
        }

        .small {
            font-size: 0.9rem;
            color: #666
        }

        .toc {
            margin: 1rem 0 1.5rem 0;
            padding-left: 1rem
        }

        .toc li {
            margin: 0.4rem 0
        }
    </style>
</head>
<body>
<?= view('Pages/partials/header') ?>
<div class="container">
    <h1>Politique de confidentialité (RGPD)</h1>
    <p class="small">Dernière mise à jour : <?= date('d/m/Y') ?></p>

    <p>Chez SMIYC, nous attachons une grande importance à la protection de vos données personnelles. Cette Politique de
        confidentialité vous explique comment nous recueillons, utilisons, partageons et protégeons vos informations
        conformément au Règlement général sur la protection des données (RGPD).</p>

    <h2>Table des matières</h2>
    <ul class="toc">
        <li>1. Responsable du traitement</li>
        <li>2. Données collectées</li>
        <li>3. Finalités du traitement</li>
        <li>4. Base juridique</li>
        <li>5. Durée de conservation</li>
        <li>6. Destinataires</li>
        <li>7. Transferts hors UE</li>
        <li>8. Vos droits</li>
        <li>9. Sécurité</li>
        <li>10. Cookies et traceurs</li>
        <li>11. Modifications de la politique</li>
        <li>12. Contact</li>
    </ul>

    <h2>1. Responsable du traitement</h2>
    <p>Le responsable du traitement des données est : SMIYC.<br>
        Adresse : 1 boulevard de l'IUT<br>
        Email : <a href="mailto:contact@smi yc.example">contact@smi yc.example</a>
    </p>

    <h2>2. Données collectées</h2>
    <p>Nous pouvons collecter et traiter les catégories de données personnelles suivantes :</p>
    <ul>
        <li>Informations d’identification : nom, prénom, email, adresse postale, téléphone.</li>
        <li>Informations de compte : identifiant, mot de passe (haché), préférences.</li>
        <li>Données de facturation et livraison : adresse de facturation, adresse de livraison, historique de
            commandes.
        </li>
        <li>Données techniques : adresse IP, identifiants de cookies, type de navigateur, pages visitées, durée de
            visite.
        </li>
        <li>Données commerciales : panier, historique d’achats, interactions marketing (newsletter, offres).</li>
    </ul>

    <h2>3. Finalités du traitement</h2>
    <p>Vos données sont utilisées pour :</p>
    <ul>
        <li>Gérer votre compte client, l’authentification et la sécurité.</li>
        <li>Traiter vos commandes, livraisons et paiements.</li>
        <li>Assurer le service client et la gestion des retours.</li>
        <li>Envoyer des communications commerciales si vous y avez consenti (newsletter, promos).</li>
        <li>Améliorer et analyser l’utilisation du site afin d’optimiser l’expérience utilisateur.</li>
        <li>Se conformer aux obligations légales et fiscales.</li>
    </ul>

    <h2>4. Base juridique</h2>
    <p>Nous traitons vos données sur les bases légales suivantes :</p>
    <ul>
        <li>Exécution d’un contrat (commande, livraison).</li>
        <li>Consentement (inscription newsletter, profilage marketing).</li>
        <li>Intérêt légitime (sécurité, prévention de la fraude, amélioration du service).</li>
        <li>Obligation légale (facturation, conservation comptable).</li>
    </ul>

    <h2>5. Durée de conservation</h2>
    <p>Les données sont conservées pendant la durée nécessaire aux finalités indiquées ci‑dessus, puis archivées
        conformément aux obligations légales (par exemple, conservation des factures pendant 10 ans). Les données
        marketing peuvent être conservées jusqu’à révocation du consentement.</p>

    <h2>6. Destinataires</h2>
    <p>Les destinataires des données peuvent inclure :</p>
    <ul>
        <li>Les services internes habilités (support, comptabilité, logistique).</li>
        <li>Prestataires externes : hébergeur, solution de paiement, transporteurs, solutions emailing, fournisseurs
            d’analytics.
        </li>
        <li>Les autorités compétentes lorsque la loi l’exige.</li>
    </ul>

    <h2>7. Transferts hors UE</h2>
    <p>Si nous transférons des données en dehors de l’Espace économique européen, nous veillons à mettre en place des
        garanties appropriées (clauses contractuelles types, pays avec décision d’adéquation, etc.). Vous pouvez
        demander la liste des sous‑traitants et des garanties appliquées.</p>

    <h2>8. Vos droits</h2>
    <p>Conformément au RGPD vous disposez des droits suivants :</p>
    <ul>
        <li>Droit d’accès : obtenir copie des données vous concernant.</li>
        <li>Droit de rectification : corriger des données inexactes.</li>
        <li>Droit à l’effacement (droit à l’oubli) : sous réserve des obligations légales.</li>
        <li>Droit à la limitation du traitement.</li>
        <li>Droit d’opposition au traitement pour motifs légitimes et au marketing direct.</li>
        <li>Droit à la portabilité des données (lorsque le traitement est basé sur le consentement ou l’exécution d’un
            contrat).
        </li>
        <li>Droit de retirer votre consentement à tout moment (sans remettre en cause la licéité des traitements
            antérieurs).
        </li>
        <li>Droit d’introduire une réclamation auprès d’une autorité de contrôle (CNIL en France).</li>
    </ul>
    <p>Pour exercer vos droits, contactez : <a href="mailto:contact@smi yc.example">contact@smi yc.example</a> (indiquer
        nom, email, preuve d’identité et description de la demande).</p>

    <h2>9. Sécurité</h2>
    <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre
        la destruction accidentelle ou illicite, la perte, l’altération, la divulgation non autorisée ou l’accès non
        autorisé.</p>

    <h2>10. Cookies et traceurs</h2>
    <p>Nous utilisons des cookies pour :</p>
    <ul>
        <li>Garantir le fonctionnement du site (cookies strictement nécessaires).</li>
        <li>Analyser l’utilisation du site (analytics).</li>
        <li>Proposer des contenus et publicités personnalisés (sur la base du consentement).</li>
    </ul>
    <p>Vous pouvez gérer vos préférences cookies via la bannière cookie ou depuis les paramètres de votre navigateur.
        Pour plus de détails, voir notre politique de cookies (disponible sur demande).</p>

    <h2>11. Modifications de la politique</h2>
    <p>Nous pouvons mettre à jour cette politique. En cas de modification substantielle, nous afficherons un avis
        visible sur le site ou vous informerons par email si vous êtes inscrit.</p>

    <h2>12. Contact</h2>
    <p>Pour toute question sur cette politique, contactez :</p>
    <p><strong>SMIYC</strong><br>
        Email : <a href="mailto:contact@smi yc.example">contact@smi yc.example</a><br>
        Adresse : 1 boulevard de l'IUT<br>
        Téléphone : +33 1 23 45 67 89
    </p>

    <p class="small">Ce document vise à fournir des informations générales et n’a pas de valeur contractuelle. Pour des
        conseils juridiques adaptés à votre organisation, contactez un professionnel du droit.</p>
</div>
<?= view('Pages/partials/footer') ?>
</body>
</html>
