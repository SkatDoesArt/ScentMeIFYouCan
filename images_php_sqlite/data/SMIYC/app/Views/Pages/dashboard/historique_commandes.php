<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?= base_url(); ?>css/card_produit.css">
    <link rel="stylesheet" href="<?= base_url(); ?>css/dashboard.css">

    <title>Historique des commandes</title>
</head>

<style>
    body {
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
    }

    .container {
        min-height: 70vh;
    }
</style>

<body>
<?= view('Pages/partials/header', ['showCart' => true, 'showList' => false]) ?>

<div class="container">
    <h1 style="margin-bottom:12px;">Historique de commandes</h1>

    <?php $orders = $list_commande ?? []; ?>

    <?php if (!empty($orders)): ?>
        <div class="grid">
            <?php foreach ($orders as $order): ?>
                <?php
                // Assure existence des champs (adaptable selon le modèle)
                $id = isset($order->id) ? $order->id : (isset($order['id']) ? $order['id'] : null);
                $date = isset($order->date) ? $order->date : (isset($order['created_at']) ? $order['created_at'] : null);
                $status = isset($order->status) ? $order->status : (isset($order['status']) ? $order['status'] : '—');
                $total = isset($order->total) ? $order->total : (isset($order['prix']) ? $order['prix'] : null);
                ?>
                <div class="product-card">
                    <a href="<?= base_url('dashboard/commande/' . urlencode($id)) ?>" class="card">
                        <div class="info">
                            <span class="product-name">Commande #<?= esc($id) ?></span>
                            <div class="product-price" style="font-size:0.95rem; margin-top:6px; color:var(--muted);">
                                <?= $date ? esc($date) : 'Date inconnue' ?>
                            </div>
                            <div style="margin-top:8px;">
                                <strong>Statut:</strong> <span class="text-muted"><?= esc($status) ?></span>
                            </div>
                            <?php if ($total !== null): ?>
                                <div style="margin-top:8px; color:var(--accent); font-weight:700;">
                                    Total: <?= number_format((float)$total, 2, ',', ' ') ?> €
                                </div>
                            <?php endif; ?>
                        </div>
                    </a>

                    <div class="card-bottom">
                        <div style="display:flex; gap:8px; align-items:center;">
                            <a class="btn" href="<?= base_url('dashboard/commande/' . urlencode($id)) ?>">Voir
                                détails</a>
                            <form action="<?= base_url('commande/reorder/' . urlencode($id)) ?>" method="post"
                                  style="display:inline;">
                                <?= csrf_field() ?>
                                <button type="submit" class="qty-btn plus" title="Commander à nouveau"
                                        style="background:#2563eb;">↻
                                </button>
                            </form>
                        </div>
                        <div style="color:var(--muted); font-size:0.95rem;">ID interne: <?= esc($id) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="no-results">
            <p>Vous n'avez encore passé aucune commande.</p>
            <a href="<?= base_url('catalogue') ?>" class="btn">Voir le catalogue</a>
        </div>
    <?php endif; ?>

</div>

<?= view('Pages/partials/footer') ?>

</body>

</html>