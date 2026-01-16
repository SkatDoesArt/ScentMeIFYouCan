<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier commande - SMIYC</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/admin_order.css') ?>">

    <style>
        /* --- 1. BASE STRUCTURE --- */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: #f8fafc;
            /* Fond moderne légèrement bleuté */
            font-family: 'Inter', sans-serif;
        }

        .admin-wrapper {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 70px);
            /* Ajusté pour le header */
        }

        /* --- 2. SIDEBAR --- */
        #admin-sidebar {
            width: 260px;
            background: #fff;
            border-right: 1px solid #e2e8f0;
            padding: 2rem 1rem;
            flex-shrink: 0;
            position: sticky;
            top: 0;
        }

        #admin-sidebar ul {
            list-style: none;
            padding: 0;
        }

        #admin-sidebar a {
            display: block;
            padding: 0.8rem 1rem;
            color: #4a5568;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 4px;
            transition: all 0.2s;
        }

        #admin-sidebar a.active {
            background: #ebf4ff;
            color: #2b6cb0;
            font-weight: 600;
        }

        #admin-sidebar a:hover:not(.active) {
            background: #f7fafc;
        }

        /* --- 3. MAIN CONTENT AREA --- */
        .admin-main-content {
            flex-grow: 1;
            padding: 40px;
            overflow-y: auto;
            width: calc(100% - 260px);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-header h1 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 800;
            color: #111827;
        }

        /* --- 4. CARDS & FORMS --- */
        .edit-order-card {
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            max-width: 600px;
            /* Centrage visuel pour formulaire */
            margin: 0 auto;
            border: 1px solid #edf2f7;
        }

        .order-form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #4a5568;
        }

        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .form-group select:focus {
            outline: none;
            border-color: #2b6cb0;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
        }

        /* --- 5. BUTTONS & ACTIONS --- */
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 40px;
        }

        .btn {
            flex: 1;
            padding: 14px 20px;
            border-radius: 8px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .btn.primary {
            background: #111827;
            color: #fff;
        }

        .btn.primary:hover {
            background: #374151;
            transform: translateY(-1px);
        }

        .btn.secondary {
            background: #edf2f7;
            color: #4a5568;
        }

        .btn.secondary:hover {
            background: #e2e8f0;
        }

        /* --- 6. ALERTS --- */
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .alert.success {
            background: #f0fff4;
            color: #22543d;
            border: 1px solid #9ae6b4;
        }

        .alert.error {
            background: #fff5f5;
            color: #822727;
            border: 1px solid #feb2b2;
        }

        /* --- 7. UTILS --- */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.5rem;
        }
    </style>
</head>

<body>

    <?= view('Pages/partials/header', ['showCart' => false, 'showList' => false, 'showSearch' => false]) ?>

    <div class="admin-wrapper">
        <?= view('Pages/partials/admin_sidebar') ?>

        <main class="admin-main-content">
            <div class="edit-order-card">
                <h2 style="font-family: 'Playfair Display', serif; font-size: 28px; margin:0;">
                    Modifier la commande #<?= esc($commande->getIdCommande()) ?>
                </h2>
                <p style="color: #718096; margin-top: 5px;">Mise à jour du statut logistique</p>

                <hr style="border: 0; border-top: 1px solid #eee; margin: 25px 0;">

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert error"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <form method="post" class="order-form">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="statut">Nouveau statut</label>
                        <select name="statut" id="statut" required>
                            <?php
                            $statuts = ['En cours', 'Payé', 'Expédié', 'Annulée'];
                            foreach ($statuts as $value):
                                ?>
                                <option value="<?= esc($value) ?>" <?= $commande->getStatut() === $value ? 'selected' : '' ?>>
                                    <?= esc($value) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn primary">Enregistrer</button>
                        <a href="<?= base_url('admin/commandes') ?>" class="btn secondary">Retour</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>

</html>