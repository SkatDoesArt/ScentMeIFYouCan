<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Marques | SMIYC</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/brand_card.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/index.js" defer></script>
</head>
<body>
    <?= view('Pages/partials/header') ?>

    <div class="wrapper">
        <h1>Nos Marques d'Exception</h1>
        
        <div class="cols">
            <?php if (!empty($liste_marques) && is_array($liste_marques)): ?>
                <?php foreach ($liste_marques as $marque): ?>
                    
                    <div class="col" ontouchstart="this.classList.toggle('hover');">
                        <div class="container">
                            <div class="front" style="background-image: url('<?= $marque->getUrl() ?>')">
                                <div class="inner">
                                    <p><?= esc($marque->getFullTitle()) ?></p>
                                    <span>Découvrir</span>
                                </div>
                            </div>
                            
                            <div class="back">
                                <div class="inner">
                                    <p><?= esc($marque->description) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune marque n'a été trouvée dans la base de données.</p>
            <?php endif; ?>
        </div>
    </div>

    <?= view('Pages/partials/footer') ?>
</body>
</html>