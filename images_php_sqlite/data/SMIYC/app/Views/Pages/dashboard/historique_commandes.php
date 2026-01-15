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

    <?php $orders = $commandes ?? []; ?>

    <?php if (!empty($orders)): ?>
        <div class="grid">
            <?php foreach ($orders as $order): ?>
                <?php
                // Supporte les résultats en tableau ou en objet
                if (is_array($order)) {
                    $id = $order['id_commande'] ?? $order['id'] ?? null;
                    $date = $order['date_commande'] ?? $order['created_at'] ?? null;
                    $status = $order['statut'] ?? $order['status'] ?? '—';
                    $total = $order['total_prix'] ?? $order['total'] ?? null;
                    $lignes = $order['lignes'] ?? [];
                } else {
                    $id = $order->id_commande ?? $order->id ?? null;
                    $date = $order->date_commande ?? $order->created_at ?? null;
                    $status = $order->statut ?? $order->status ?? '—';
                    $total = $order->total_prix ?? $order->total ?? null;
                    $lignes = property_exists($order, 'lignes') ? $order->lignes : [];
                }
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

                    <?php if (!empty($lignes)): ?>
                        <div class="commande-lines" style="padding:12px; border-top:1px solid #eee;">
                            <strong>Lignes de la commande :</strong>
                            <table class="table-commande" style="width:100%; margin-top:8px;">
                                <thead>
                                <tr>
                                    <th style="text-align:left">Produit</th>
                                    <th>Quantité</th>
                                    <th>Prix unitaire</th>
                                    <th>Total ligne</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($lignes as $ligne): ?>
                                    <?php
                                    if (is_array($ligne)) {
                                        $prodName = $ligne['produit_name'] ?? $ligne['produit_id'] ?? '';
                                        $quantite = $ligne['quantite'] ?? '';
                                        $prixUnit = $ligne['prix_unitaire'] ?? '';
                                        $totalL = $ligne['total_ligne'] ?? '';
                                    } else {
                                        $prodName = $ligne->produit_name ?? $ligne->produit_id ?? '';
                                        $quantite = $ligne->quantite ?? '';
                                        $prixUnit = $ligne->prix_unitaire ?? '';
                                        $totalL = $ligne->total_ligne ?? '';
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align:left"><?= esc($prodName) ?></td>
                                        <td style="text-align:center"><?= esc($quantite) ?></td>
                                        <td style="text-align:center"><?= $prixUnit !== '' ? number_format((float)$prixUnit, 2, ',', ' ') . ' €' : '' ?></td>
                                        <td style="text-align:center"><?= $totalL !== '' ? number_format((float)$totalL, 2, ',', ' ') . ' €' : '' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>

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