<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Ajouter un produit</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/card_produit.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/header.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/add_product.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/preview_photo_add.js" defer></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/select_input_image.js" defer></script>

</head>

<body>

<?= view('Pages/partials/header', ['showCart' => false, 'showList' => false, 'showSearch' => false]) ?>

<div class="container">
    <div class="admin-card">
        <h2>Ajouter un produit</h2>

        <form method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-grid">

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input id="name" type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label for="price">Prix (€)</label>
                    <input id="price" type="number" step="0.01" name="price" required>
                </div>

                <div class="form-group">
                    <label for="taille">Taille</label>
                    <input id="taille" type="number" name="taille" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" type="text" name="description" required>
                </div>

                <div class="form-group">
                    <label for="niveauPrestige">Niveau prestige</label>
                    <input id="niveauPrestige" type="number" name="niveauPrestige" required>
                </div>

                <div class="form-group">
                    <label for="notation">Notation (0 à 5)</label>
                    <input id="notation" type="number" min="0" max="5" name="notation" required>
                </div>

                <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <input id="categorie" type="text" name="categorie" >
                </div>

                <div class="form-group">
                    <label for="quantiteRestante">Quantité restante</label>
                    <input id="quantiteRestante" type="number" name="quantiteRestante" required>
                </div>

                <div class="form-group">
                    <label for="marque">Marque</label>
                    <input id="marque" type="text" name="marque" required>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input id="type" type="text" name="type" required>
                </div>


                <div class="form-group">
                    <label for="typePeau">Type Peau</label>
                    <input id="typePeau" type="text" name="typePeau" required>
                </div>


                <div class="form-group">
                    <label for="origine">Origine</label>
                    <input id="origine" type="text" name="origine" required>
                </div>


                <div class="form-group">
                    <label for="dureeCombustion">Duree Combustion</label>
                    <input id="dureeCombustion" type="text" name="dureeCombustion" required>
                </div>


                <div class="form-group">
                    <label for="saison">Saison</label>
                    <input id="saison" type="text" name="saison" >
                </div>

                <!-- Selection du type d'image -->
                <div class="form-group" style="grid-column:1 / -1;">
                    <label for="image-type">Type d'image</label>
                    <select id="image-type" name="image_type" required>
                        <option value="">-- Choisir le type d’image --</option>
                        <option value="file">Fichier</option>
                        <option value="url">Lien</option>
                    </select>
                </div>

                <!-- Affichage de l'image -->
                <div class="form-group image-group" id="file-group" style="display:none;">
                    <label for="image-input">Image du produit (fichier)</label>
                    <input id="image-input" type="file" name="image_name" accept="image/*">

                    <div class="image-preview">
                        <img id="file-preview" src="" alt="Aperçu image fichier">
                    </div>
                </div>

                <div class="form-group image-group" id="url-group" style="display:none;">
                    <label for="image-url">Lien de l’image</label>
                    <input id="image-url" type="url" name="image_url" placeholder="https://example.com/image.jpg">

                    <div class="image-preview">
                        <img id="url-preview" src="" alt="Aperçu image lien">
                    </div>
                </div>



                <div class="button-wrapper">
                    <button type="submit">Ajouter</button>
                </div>


            </div>
        </form>

        <!-- Afichage du message renvoyé par le controlleur -->
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
</div>

</body>

</html>
