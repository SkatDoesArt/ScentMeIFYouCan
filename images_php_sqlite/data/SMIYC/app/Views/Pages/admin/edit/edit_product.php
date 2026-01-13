
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/add_product.css">

<div class="admin-card">
    <h2>Modifier un produit</h2>

    <form  method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-grid">

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="name" value="<?= esc($produit->name) ?>" required>
            </div>

            <div class="form-group">
                <label>Prix</label>
                <input type="number" step="0.01" name="price" value="<?= esc($produit->price) ?>" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" value="<?= esc($produit->description) ?>" required>
            </div>

            <div class="form-group">
                <label>Niveau prestige</label>
                <input type="number" name="niveauPrestige" value="<?= esc($produit->niveauPrestige) ?>" required>
            </div>

            <div class="form-group">
                <label>Notation</label>
                <input type="number" min="0" max="5" name="notation" value="<?= esc($produit->notation) ?>" required>
            </div>

            <div class="form-group">
                <label>Taille</label>
                <input type="number" name="taille" value="<?= esc($produit->taille) ?>" required>
            </div>

            <div class="form-group">
                <label>Quantité</label>
                <input type="number" name="quantiteRestante" value="<?= esc($produit->quantiteRestante) ?>" required>
            </div>

            <div class="form-group">
                <label>Marque</label>
                <input type="text" name="marque" value="<?= esc($produit->marque) ?>" required>
            </div>

            <div class="form-group">
                <label>Catégorie</label>
                <input type="text" name="categorie" value="<?= esc($produit->categorie) ?>" required>
            </div>

          <div class="form-group image-group">
                <label>Image</label>
                <input type="file" name="image_name" required>
                <div class="image-preview">
                    <img src="<?= esc($produit->image_name) ?>" alt="">
                </div>
            </div>


            <div class="button-wrapper">
                <button type="submit">Modifier</button>
            </div>

        </div>

    </form>
</div>
