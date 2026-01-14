<link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/add_product.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/preview_photo.js" defer></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/select_input_image.js" defer></script>

<div class="admin-card">
    <h2>Modifier un produit</h2>

    <form method="post" enctype="multipart/form-data">
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


            <!-- Selection du type d'image -->
            <select name="image_type" id="image-type">
                <option value="">-- Choisir le type d’image --</option>
                <option value="file">Fichier</option>
                <option value="url">Lien</option>
            </select>

            <!-- Ancienne image -->
            <div class="form-group image-group">
                <?php if (!empty($produit->image_name) && !filter_var($produit->image_name, FILTER_VALIDATE_URL)): ?>
                    <div class="image-box">
                        <p>Ancienne image (fichier)</p>
                        <div class="image-preview">
                            <img src="<?= base_url('pictures/parfums/NoCap/' . $produit->image_name) ?>" alt="Ancienne image">
                        </div>
                    </div>
                <?php elseif (filter_var($produit->image_name, FILTER_VALIDATE_URL)): ?>
                    <div class="image-box">
                        <p>Ancienne image (lien)</p>
                        <div class="image-preview">
                            <img src="<?= esc($produit->image_name) ?>" alt="Ancienne image lien">
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Image fichier -->
            <div class="form-group image-group" id="file-group" style="display:none;">
                <label>Image du produit (fichier)</label>
                <input type="file" name="image_name" id="image-input" accept="image/*">
                <div class="image-wrapper">
                    <div class="image-box">
                        <p>Nouvelle image</p>
                        <div class="image-preview">
                            <img id="file-preview" src="" alt="Nouvelle image">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image lien -->
            <div class="form-group image-group" id="url-group" style="display:none;">
                <label>Lien de l’image</label>
                <input type="url" name="image_url" id="image-url" placeholder="https://example.com/image.jpg"
                    value="">
                <div class="image-wrapper">
                    <div class="image-box">
                        <p>Nouvelle image</p>
                        <div class="image-preview">
                            <img id="url-preview" src="" alt="Nouvelle image lien">
                        </div>
                    </div>
                </div>
            </div>



            <div class="button-wrapper">
                <button type="submit">Modifier</button>
            </div>
            <!-- Boutton supprimer-->
             <div class="button-wrapper">
            <button type="button" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer ?')) window.location='<?= base_url("admin/delete/".$produit->id_produit) ?>'">
                Supprimer
            </button>
            </div>
        </div>

    </form>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="message success">
            <p><?= esc(session()->getFlashdata('success')) ?></p>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="message error">
            <p><?= esc(session()->getFlashdata('error')) ?></p>
        </div>
    <?php endif; ?>



</div>