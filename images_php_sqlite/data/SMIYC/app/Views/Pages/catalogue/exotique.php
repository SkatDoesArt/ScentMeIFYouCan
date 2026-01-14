<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exotiques</title>
    <link rel="stylesheet" href="<?= base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?= base_url(); ?>css/caroussel_horizontale.css">
</head>

<body>
    <?= view('Pages/partials/header') ?>

    <section class="content-wrapper">
        <main class="main-container">
            <div class="carousel-section">
                <button class="nav-arrow left" id="prevBtn" aria-label="Précédent">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <div class="carousel-container">
                    <div class="carousel-track">
                        <?php if (!empty($lesExotiques)): ?>
                            <?php foreach ($lesExotiques as $index => $exotique): ?>
                                <div class="card" data-index="<?= $index ?>">
                                    <img src="<?= $exotique->getUrl() ?>" alt="<?= esc($exotique->getNom()) ?>">
                                    <div class="card-overlay">
                                        <a href="<?= base_url('catalogue/product/' . $exotique->id_produit) ?>" class="btn-view">Voir le produit</a>
                                        <form method="post" action="<?= base_url('cart/add/' . $exotique->id_produit) ?>">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn-plus">+</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <button class="nav-arrow right" id="nextBtn" aria-label="Suivant">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                    <?php if (!empty($lesExotiques)): ?>
                        <?php foreach ($lesExotiques as $index => $exotique): ?>
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
            <?php foreach ($lesExotiques as $exotique): ?> {
                    name: "<?= addslashes($exotique->getNom()) ?>",
                    brand: "<?= addslashes($exotique->getMarque()) ?>",
                    role: "<?= addslashes(substr($exotique->getDescription() ?? '', 0, 120)) ?>...",
                    prestige: "<?= $exotique->getPrestigeStars() ?>",
                    url: "<?= base_url('catalogue/product/' . $exotique->id_produit) ?>"
                },
            <?php endforeach; ?>
        ];
    </script>
    <script src="<?= base_url(); ?>js/caroussel_horizontale.js" defer></script>
</body>

</html>