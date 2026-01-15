<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sniff&Chill</title>
    <link rel="stylesheet" href="<?= base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?= base_url(); ?>css/caroussel_verticale.css">
</head>

<body>
    <?= view('Pages/partials/header') ?>

    <section class="content-wrapper">
        <main class="main-container">
            <div class="carousel-section">
                <button class="nav-arrow up" id="prevBtn" aria-label="Précédent">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 5V19M12 5L6 11M12 5L18 11" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <div class="carousel-container">
                    <div class="carousel-track">
                        <?php if (!empty($lesEncens)): ?>
                            <?php foreach ($lesEncens as $index => $encens): ?>
                                <div class="card" data-index="<?= $index ?>">
                                    <img src="<?= $encens->getUrl() ?>" alt="<?= esc($encens->getNom()) ?>">
                                    <div class="card-overlay">
                                        <a href="<?= base_url('catalogue/product/' . $encens->id_produit) ?>"
                                            class="btn-view">Voir le produit</a>

                                        <form method="post" action="<?= base_url('cart/add/' . $encens->id_produit) ?>">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn-plus">+</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <button class="nav-arrow down" id="nextBtn" aria-label="Suivant">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 19V5M12 19L6 13M12 19L18 13" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <div class="controls-section">
                <div class="member-info">
                    <h2 class="member-name">Chargement...</h2>
                    <span></span>
                    <p class="member-brand"></p>
                    <span></span>
                    <p class="member-role"></p>
                    <div class="member-prestige"></div>
                </div>

                <div class="real-pagination">
                    <?= $pager->links('group1', 'default_full') ?>
                </div>

                <div class="dots">
                    <?php if (!empty($lesEncens)): ?>
                        <?php foreach ($lesEncens as $index => $encens): ?>
                            <div class="dot" data-index="<?= $index ?>"></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </section>

    <?= view('Pages/partials/footer') ?>

    <script>
        const teamMembers = [
            <?php foreach ($lesEncens as $encens): ?>
                {
                    name: "<?= addslashes($encens->getNom()) ?>",
                    brand: "<?= addslashes($encens->getMarque()) ?>",
                    role: "<?= addslashes(substr($encens->getDescription() ?? '', 0, 120)) ?>...",
                    prestige: "<?= $encens->getPrestigeStars() ?>",
                    url: "<?= base_url('catalogue/product/' . $encens->id_produit) ?>"
                },
            <?php endforeach; ?>
        ];
    </script>
    <script src="<?= base_url(); ?>js/caroussel_verticale.js" defer></script>
</body>

</html>