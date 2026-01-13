<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProduitSeeder extends Seeder
{
    public function run()
    {
        // --- NETTOYAGE ---
        $this->db->table('produit')->truncate();

        $data = [
            // --- SERGE LUTENS (Prestige 5) ---
            [
                'name' => 'Féminité du Bois', 'price' => 135.00, 'niveauPrestige' => 5, 'notation' => 5, 'taille' => 50, 'quantiteRestante' => 10, 'marque' => 'Serge Lutens', 'categorie' => 'Unisexe', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'lutens_bois.jpg', 'saison' => 'Hiver',
                'description' => 'Un choc olfactif, le premier boisé féminin.'
            ],
            [
                'name' => 'Ambre Sultan', 'price' => 135.00, 'niveauPrestige' => 5, 'notation' => 5, 'taille' => 50, 'quantiteRestante' => 8, 'marque' => 'Serge Lutens', 'categorie' => 'Unisexe', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'lutens_ambre.jpg', 'saison' => 'Hiver',
                'description' => 'Une référence de l\'ambre, classique et puissant.'
            ],
            [
                'name' => 'La Fille de Berlin', 'price' => 135.00, 'niveauPrestige' => 5, 'notation' => 5, 'taille' => 50, 'quantiteRestante' => 12, 'marque' => 'Serge Lutens', 'categorie' => 'Unisexe', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'lutens_berlin.jpg', 'saison' => 'Hiver',
                'description' => 'Une rose épineuse, métallique et poivrée.'
            ],

            // --- TOM FORD (Prestige 5) ---
            [
                'name' => 'Black Orchid', 'price' => 145.00, 'niveauPrestige' => 5, 'notation' => 5, 'taille' => 50, 'quantiteRestante' => 15, 'marque' => 'Tom Ford', 'categorie' => 'Unisexe', 'type' => 'Parfums', 'origine' => 'USA', 'image_name' => 'tf_black_orchid.jpg', 'saison' => 'Automne/Hiver',
                'description' => 'Sombre, luxueux et sensuel.'
            ],
            [
                'name' => 'Oud Wood', 'price' => 240.00, 'niveauPrestige' => 5, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 5, 'marque' => 'Tom Ford', 'categorie' => 'Unisexe', 'type' => 'Parfums', 'origine' => 'USA', 'image_name' => 'tf_oud_wood.jpg', 'saison' => 'Automne/Hiver',
                'description' => 'L\'un des ingrédients les plus rares au monde.'
            ],
            [
                'name' => 'Fucking Fabulous', 'price' => 320.00, 'niveauPrestige' => 5, 'notation' => 4, 'taille' => 50, 'quantiteRestante' => 3, 'marque' => 'Tom Ford', 'categorie' => 'Unisexe', 'type' => 'Parfums', 'origine' => 'USA', 'image_name' => 'tf_fabulous.jpg', 'saison' => 'Automne/Hiver',
                'description' => 'Un cuir décadent à l\'emprise fatale.'
            ],

            // --- GUERLAIN (Prestige 5) ---
            [
                'name' => 'Shalimar', 'price' => 110.00, 'niveauPrestige' => 5, 'notation' => 5, 'taille' => 75, 'quantiteRestante' => 20, 'marque' => 'Guerlain', 'categorie' => 'Femme', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'guerlain_shalimar.jpg', 'saison' => 'Hiver',
                'description' => 'Mythe absolu des parfums orientaux.'
            ],

            // --- HERMÈS (Prestige 5) ---
            [
                'name' => 'Terre d’Hermès', 'price' => 102.00, 'niveauPrestige' => 5, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 30, 'marque' => 'Hermès', 'categorie' => 'Homme', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'hermes_terre.jpg', 'saison' => 'Printemps/Été',
                'description' => 'La force de la terre et du ciel.'
            ],

            // --- CHANEL (Prestige 5) ---
            [
                'name' => 'Bleu de Chanel', 'price' => 98.00, 'niveauPrestige' => 5, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 50, 'marque' => 'Chanel', 'categorie' => 'Homme', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'chanel_bleu.jpg', 'saison' => 'Toutes saisons',
                'description' => 'L\'éloge de la liberté masculine.'
            ],

            // --- DIOR (Prestige 4) ---
            [
                'name' => 'Sauvage', 'price' => 105.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 60, 'marque' => 'Dior', 'categorie' => 'Homme', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'dior_sauvage.jpg', 'saison' => 'Printemps/Automne',
                'description' => 'L\'esprit sauvage et noble.'
            ],

            // --- VALENTINO (Prestige 4) ---
            [
                'name' => 'Born in Roma', 'price' => 110.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 20, 'marque' => 'Valentino', 'categorie' => 'Unisexe', 'type' => 'Parfums', 'origine' => 'Italie', 'image_name' => 'valentino_roma.jpg', 'saison' => 'Automne',
                'description' => 'L\'irrévérence romaine moderne.'
            ],

            // --- GIVENCHY (Prestige 4) ---
            [
                'name' => 'L’Interdit', 'price' => 105.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 50, 'quantiteRestante' => 20, 'marque' => 'Givenchy', 'categorie' => 'Femme', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'givenchy_interdit.jpg', 'saison' => 'Automne/Hiver',
                'description' => 'L\'hommage à la féminité audacieuse.'
            ],

            // --- JEAN PAUL GAULTIER (Prestige 4) ---
            [
                'name' => 'Le Mâle', 'price' => 85.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 125, 'quantiteRestante' => 40, 'marque' => 'Jean Paul Gaultier', 'categorie' => 'Homme', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'jpg_male.jpg', 'saison' => 'Hiver',
                'description' => 'L\'icône de la parfumerie masculine.'
            ],

            // --- RABANNE (Prestige 4) ---
            [
                'name' => '1 Million', 'price' => 90.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 55, 'marque' => 'Rabanne', 'categorie' => 'Homme', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'rabanne_1m.jpg', 'saison' => 'Hiver',
                'description' => 'L\'objet de toutes les convoitises.'
            ],

            // --- ADOPT' (Prestige 2) ---
            [
                'name' => 'Musc Blanc', 'price' => 10.95, 'niveauPrestige' => 2, 'notation' => 4, 'taille' => 30, 'quantiteRestante' => 100, 'marque' => 'Adopt\'', 'categorie' => 'Femme', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'adopt_musc.jpg', 'saison' => 'Printemps',
                'description' => 'Une fragrance coton-neuse et pure.'
            ],

            // --- ENFANT / PRESTIGE 1 ---
            [
                'name' => 'Musti', 'price' => 15.50, 'niveauPrestige' => 1, 'notation' => 5, 'taille' => 50, 'quantiteRestante' => 60, 'marque' => 'Mustela', 'categorie' => 'Enfant', 'type' => 'Parfums', 'origine' => 'France', 'image_name' => 'mustela_musti.jpg', 'saison' => 'Toutes saisons',
                'description' => 'Eau de soin parfumée sans alcool pour bébé.'
            ],
            [
                'name' => 'Frozen', 'price' => 15.00, 'niveauPrestige' => 1, 'notation' => 3, 'taille' => 50, 'quantiteRestante' => 30, 'marque' => 'Disney', 'categorie' => 'Enfant', 'type' => 'Parfums', 'origine' => 'Espagne', 'image_name' => 'disney_frozen.jpg', 'saison' => 'Toutes saisons',
                'description' => 'La fraîcheur d\'Arendelle pour les enfants.'
            ],
        ];

        $this->db->table('produit')->insertBatch($data);
    }
}