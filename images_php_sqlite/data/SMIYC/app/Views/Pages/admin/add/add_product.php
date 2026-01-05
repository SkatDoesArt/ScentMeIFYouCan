<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= base_url(relativePath:'SMIYC/public/admin/add/product') ?>" method="post">
    <?= csrf_field() ?>

    <label>Nom</label>
    <input type="text" name="name" required>

    <label>Prix</label>
    <input type="number" step="0.01" name="price" required>

    <label>Description</label>
    <input type="text" name="description" required>

    <label>Niveau prestige</label>
    <input type="number" name="niveau_prestige" required>

    <label>Notation</label>
    <input type="number" min="0" max="5" name="notation" required>

    <label>Taille</label>
    <input type="text" name="taille" required>

    <label>Quantité</label>
    <input type="number" name="quantiteRestante" required>

    <label>Marque</label>
    <input type="text" name="marque" required>

    <label>Categorie</label>
    <input type="text" name="categorie" required>

    

    <button type="submit">Ajouter un produit</button>
</form>
