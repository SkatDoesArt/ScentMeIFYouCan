<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier commande</title>

    <link rel="stylesheet" href="<?= base_url() ?>css/header.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/admin_edit_order.css">
</head>

<body>

<?= view('Pages/partials/header', [
    'showCart' => false,
    'showList' => false,
    'showSearch' => false
]) ?>

<div class="container admin-orders">
    <div class="orders-card">

        <h2>Modifier la commande #<?= esc($commande->getIdCommande()) ?></h2>

        <!-- MESSAGES FLASH -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form method="post" class="order-form">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="statut">Statut de la commande</label>
                <select name="statut" id="statut" required>
                    <?php
                    $statuts = [
                        'En cours',
                         'Payé',
                         'Expedié',
                        'Annulée',
                    ];
                    foreach ($statuts as $value ):
                    ?>
                        <option value="<?= esc($value) ?>"
                            <?= $commande->getStatut() === $value ? 'selected' : '' ?>>
                            <?= esc($value) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn primary">
                    Enregistrer
                </button>

                <a href="<?= previous_url() ?>" class="btn secondary">
                    Annuler
                </a>
            </div>
        </form>

    </div>
</div>

</body>
</html>
