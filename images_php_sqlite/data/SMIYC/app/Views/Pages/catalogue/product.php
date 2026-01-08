<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/index.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>js/reloadPage.js" defer></script>

    <title>Document</title>
</head>

<body>
    <header id="header">
        <div id="header-container">
            <div id="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
            <nav id="nav-upper">
                <h1 id="bigname"><a href="<?= base_url() ?>">SMIYC</a></h1>
                <form class="recherche" role="search">
                    <label class="hidden" for="search">Recherche</label>
                    <input type="search" id="search" placeholder="Rechercher un produit, une marque" inputmode="search"
                        interkeyhint="search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                        class="min-h-iconLarge min-w-iconLarge stroke-[0.125rem] text-text-primary" alt="" height="2rem"
                        width="2rem">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M22.067 15a7 7 0 1 1-14 0 7 7 0 0 1 14 0m-1.155 6.844a9 9 0 1 1 1.365-1.456q.045.039.088.082l4.482 4.482c.488.488.567 1.2.176 1.59s-1.102.312-1.59-.176l-4.482-4.482z"
                            clip-rule="evenodd"></path>
                    </svg>
                </form>
                <div id="nav-buttons">
                    <a href="<?=base_url()?>auth/login">
                        <p>Se connecter</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                            class="min-h-iconLarge min-w-iconLarge stroke-[0.125rem]" alt="" height="2rem" width="2rem">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M21 9a5 5 0 1 1-10 0 5 5 0 0 1 10 0m-2 0a3 3 0 1 1-6 0 3 3 0 0 1 6 0M16 16c-4.675 0-7.629 1.413-9.443 3.358-1.79 1.92-2.343 4.222-2.5 5.776C3.884 26.853 5.333 28 6.805 28h18.39c1.471 0 2.92-1.147 2.747-2.866-.156-1.554-.709-3.856-2.499-5.775-1.814-1.946-4.768-3.36-9.443-3.36m-9.953 9.335c.133-1.316.592-3.132 1.972-4.612C9.375 19.268 11.751 18 16 18c4.25 0 6.624 1.268 7.98 2.723 1.381 1.48 1.84 3.296 1.973 4.612a.52.52 0 0 1-.162.442.86.86 0 0 1-.596.223H6.805a.86.86 0 0 1-.597-.223.52.52 0 0 1-.161-.442"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="<?=base_url()?>cart">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                            class="min-h-iconLarge min-w-iconLarge stroke-[0.125rem]" alt="" height="2rem" width="2rem">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M21.997 11q.002-.23.002-.5C22 6.91 19.313 4 16 4s-6 2.91-6 6.5q0 .27.003.5H6.094a2 2 0 0 0-1.984 2.254l1.665 13A2 2 0 0 0 7.76 28h16.478a2 2 0 0 0 1.984-1.747l1.657-13A2 2 0 0 0 25.893 11zM20 10.5l-.001.42c-.167.017-.371.031-.623.043C18.59 11 17.52 11 16 11s-2.59 0-3.376-.037a12 12 0 0 1-.622-.043l-.002-.42C12 7.861 13.938 6 16 6s4 1.861 4 4.5M6.094 13 7.76 26h16.478l1.657-13z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </nav>
        </div>
        <nav id="nav-list">
            <a href="<?= base_url()?>catalogue"><span class="categorie" role="link">Homme</span></a>
            <a href="<?= base_url()?>catalogue"><span class="categorie" role="link">Femme</span></a>
            <a href="<?= base_url()?>catalogue"><span class="categorie" role="link">Unisexe</span></a>
            <a href="<?= base_url()?>catalogue"><span class="categorie" role="link">Enfant</span></a>
            <a href="<?= base_url()?>catalogue"><span class="categorie" role="link">Marques</span></a>
            <a href="<?= base_url()?>catalogue"><span class="categorie" role="link">Saison</span></a>
            <a href="<?= base_url()?>catalogue"><span class="categorie" role="link">Sniff&Chill</span></a>
            <a href="<?= base_url()?>catalogue"><span class="categorie" role="link">Exotique</span></a>
            <a href="<?= base_url()?>catalogue"><span class="categorie" role="link">Crème</span></a>
        </nav>
    </header>

    <h1><?= esc($produit->name) ?></h1>

    <p>Prix : <?= esc($produit->price) ?> €</p>
    <p>Description : <?= esc($produit->description) ?></p>
    <p>Notation : <?= esc($produit->notation) ?>/5</p>
    <p>Taille : <?= esc($produit->taille) ?></p>
    <p>Stock : <?= esc($produit->quantiteRestante) ?></p>
    <p>Marque : <?= esc($produit->marque) ?></p>
    <p>Catégorie : <?= esc($produit->catégorie) ?></p>

    <h1>Avis</h1>
    <?php if (empty($avis)): ?>
        <h3>Aucun avis sur se produit</h3>
    <?php else: ?>
        <?php foreach ($avis as $a): ?>
            <div class="avis">
                <strong><?= esc($a->titre) ?></strong>
                <p><?= esc($a->contenu) ?></p>
                <small><?= esc($a->date) ?></small>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>