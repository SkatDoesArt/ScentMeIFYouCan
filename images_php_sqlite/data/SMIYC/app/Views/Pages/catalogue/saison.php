<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisons</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/season_card.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/index.js" defer></script>
</head>

<body>
    <?= view('Pages/partials/header') ?>

    <div class="wrapper">
        <div class="title-container">
            <span></span>
            <h1>Découvrez nos parfums par saison</h1>
            <span></span>
        </div>

        <div class="cols">

            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front"
                        style="background-image: url('https://i.pinimg.com/736x/c1/47/4b/c1474b0463d741f9460b659c7fedac61.jpg')">
                        <div class="inner">
                            <p>Printemps</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <h1>Printemps</h1>
                            <p>Fleurs blanches, cerisiers et fraîcheur poudrée.</p>
                            <div class="more">
                                <a href="<?= base_url('catalogue/season/Printemps') ?>">Voir la sélection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front"
                        style="background-image: url('https://i.pinimg.com/736x/7a/8e/16/7a8e16fb1f5bc9b7126c2eac238a3340.jpg')">
                        <div class="inner">
                            <p>Été</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <h1>Été</h1>
                            <p>Notes marines, agrumes et brises légères.</p>
                            <div class="more">
                                <a href="<?= base_url('catalogue/season/Été') ?>">Voir la sélection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front"
                        style="background-image: url('https://i.pinimg.com/736x/d9/a1/0f/d9a10f45cc2c299721516c466cc967c7.jpg')">
                        <div class="inner">
                            <p>Automne</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <h1>Automne</h1>
                            <p>Bois de oud, cuir et senteurs aromatiques.</p>
                            <div class="more">
                                <a href="<?= base_url('catalogue/season/Automne') ?>">Voir la sélection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front"
                        style="background-image: url('https://i.pinimg.com/736x/8c/9e/2a/8c9e2a8a9c47425af08a729f1d64b2f8.jpg')">
                        <div class="inner">
                            <p>Hiver</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <h1>Hiver</h1>
                            <p>Vanille gourmande, ambre et épices chaudes.</p>
                            <div class="more">
                                <a href="<?= base_url('catalogue/season/Hiver') ?>">Voir la sélection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front"
                        style="background-image: url('https://i.pinimg.com/736x/11/8b/fb/118bfb92808d1641fbb06a43ede5847b.jpg')">
                        <div class="inner">
                            <p>Toutes Saisons</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <h1>Toutes Saisons</h1>
                            <p>Des soins polyvalents et des fragrances intemporelles qui vous accompagnent avec élégance, peu importe la météo</p>
                            <div class="more">
                                <a href="<?= base_url('catalogue/season/Toutes Saisons') ?>">Voir la sélection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?= view('Pages/partials/footer') ?>
</body>

</html>