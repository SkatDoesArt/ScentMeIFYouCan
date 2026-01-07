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

<form action="<?= base_url('admin/add/product') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>


    <label for="name">Nom</label>
    <input type="text" name="name" required>

    <label for="price">Prix</label>
    <input type="number" step="0.01" name="price" required>

    <label for="description">Description</label>
    <input type="text" name="description" required>

    <label for="niveau_prestige">Niveau prestige</label>
    <input type="number" name="niveau_prestige" required>

    <label for="notation">Notation</label>
    <input type="number" min="0" max="5" name="notation" required>

    <label for="taille">Taille</label>
    <input type="text" name="taille" required>

    <label for="quantiteRestante">Quantité</label>
    <input type="number" name="quantiteRestante" required>

    <label for="marque">Marque</label>
    <input type="text" name="marque" required>

    <label for="categorie">Categorie</label>
    <input type="text" name="categorie" required>

    <label for="image">Image du produit</label>
    <input type="file" name="image" id="image" accept="image/png, image/jpeg" required>

    <button type="submit">Ajouter un produit</button>
</form>

