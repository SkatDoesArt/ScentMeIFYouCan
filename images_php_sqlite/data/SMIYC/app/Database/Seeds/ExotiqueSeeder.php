<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ExotiqueSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // --- LATTAFA ---
            [
                'name' => 'Oud for Glory (Bade\'e Al Oud)', 'price' => 45.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 15, 'marque' => 'Lattafa', 'categorie' => 'Unisexe', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.64948.avif',
                'description' => 'Un boisé intense, mystérieux et fumé.',
                'origine'=>'Exotique'
            ],
            [
                'name' => 'Khamrah', 'price' => 50.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 20, 'marque' => 'Lattafa', 'categorie' => 'Unisexe', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.75805.avif',
                'description' => 'Une fragrance gourmande, mélange chaud d’épices et de vanille.',
                'origine'=>'Exotique'
            ],
            [
                'name' => 'Yara', 'price' => 35.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 25, 'marque' => 'Lattafa', 'categorie' => 'Femme', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.76880.avif',
                'description' => 'Une douceur fruitée et crémeuse très appréciée.',
                'origine'=>'Exotique'
            ],

            // --- ADAAF (Souvent associé à Afnan/Lattafa) ---
            [
                'name' => 'Musk Collection', 'price' => 25.00, 'niveauPrestige' => 3, 'notation' => 4, 'taille' => 100, 'quantiteRestante' => 10, 'marque' => 'Adaaf', 'categorie' => 'Unisexe', 'type' => 'parfums', 'saison' => 'Toute saison',
                'image_name' => 'https://www.parfum-store.fr/wp-content/uploads/2023/12/musk-code-eau-de-parfum-asdaaf.jpg',
                'description' => 'Un musc pur, propre et poudré.',
                'origine'=>'Exotique'
            ],
            [
                'name' => 'Oud Collection', 'price' => 30.00, 'niveauPrestige' => 3, 'notation' => 4, 'taille' => 100, 'quantiteRestante' => 8, 'marque' => 'Adaaf', 'categorie' => 'Unisexe', 'type' => 'parfums', 'saison' => 'Toute saison',
                'image_name' => 'https://www.mon-parfum-dubai.com/wp-content/uploads/2022/06/oud-code-asdaaf.jpg.webp',
                'description' => 'Un oud accessible et équilibré.',
                'origine'=>'Exotique'
            ],

            // --- AL WATANIAH ---
            [
                'name' => 'Arba Wardat', 'price' => 40.00, 'niveauPrestige' => 4, 'notation' => 4, 'taille' => 70, 'quantiteRestante' => 12, 'marque' => 'Al Wataniah', 'categorie' => 'Femme', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.19663.avif',
                'description' => 'Un bouquet floral riche et envoûtant.',
                'origine'=>'Exotique'
            ],
            [
                'name' => 'Velvet Oud', 'price' => 42.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 10, 'marque' => 'Al Wataniah', 'categorie' => 'Unisexe', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQHDL43XImUpRcizs3KXc52dHRFsYF1W3lw3fjG874cRahkTJYPBYs2V0lqomi-22A--am5ZSHa8G89PBhCvubLHIMCMcU1co8HM5AyOT-jig3y6YHj8pdpFQ',
                'description' => 'La douceur du velours mêlée à la force de l\'oud.',
                'origine'=>'Exotique'
            ],

            // --- MAISON ALHAMBRA ---
            [
                'name' => 'Noir Sultan', 'price' => 38.00, 'niveauPrestige' => 4, 'notation' => 4, 'taille' => 100, 'quantiteRestante' => 14, 'marque' => 'Maison Alhambra', 'categorie' => 'Homme', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://scentoria.fr/cdn/shop/files/IMG-1610.jpg?v=1743362681&width=700',
                'description' => 'Un sillage sombre et majestueux.',
                'origine'=>'Exotique'
            ],
            [
                'name' => 'Amber Oud', 'price' => 40.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 18, 'marque' => 'Maison Alhambra', 'categorie' => 'Unisexe', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://www.parfumsmoinschers.com/63176-83478-thickbox/amberley-pure-oud-maison-alhambra-eau-de-parfum-spray-100-ml.jpg',
                'description' => 'L\'ambre chaud rencontre les notes boisées précieuses.',
                'origine'=>'Exotique'
            ],

            // --- ARD AL ZAAFARAN ---
            [
                'name' => 'Shaikh Shuyukh', 'price' => 28.00, 'niveauPrestige' => 4, 'notation' => 4, 'taille' => 100, 'quantiteRestante' => 30, 'marque' => 'Ard Al Zaafaran', 'categorie' => 'Homme', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.25808.avif',
                'description' => 'Un parfum de caractère pour les leaders.',
                'origine'=>'Exotique'
            ],
            [
                'name' => 'Oud Gold', 'price' => 32.00, 'niveauPrestige' => 4, 'notation' => 4, 'taille' => 100, 'quantiteRestante' => 22, 'marque' => 'Ard Al Zaafaran', 'categorie' => 'Unisexe', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.70575.avif',
                'description' => 'L\'or liquide en flacon, riche et brillant.',
                'origine'=>'Exotique'
            ],

            // --- SWISS ARABIAN ---
            [
                'name' => 'Shaghaf Oud', 'price' => 48.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 75, 'quantiteRestante' => 20, 'marque' => 'Swiss Arabian', 'categorie' => 'Unisexe', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.50582.avif',
                'description' => 'Le best-seller associant rose, praline et oud.',
                'origine'=>'Exotique'
            ],
            [
                'name' => 'Layali', 'price' => 35.00, 'niveauPrestige' => 4, 'notation' => 4, 'taille' => 50, 'quantiteRestante' => 15, 'marque' => 'Swiss Arabian', 'categorie' => 'Femme', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.56235.avif',
                'description' => 'Une huile parfumée florale et fruitée.',
                'origine'=>'Exotique'
            ],

            // --- AFNAN ---
            [
                'name' => 'Supremacy Silver', 'price' => 55.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 12, 'marque' => 'Afnan', 'categorie' => 'Homme', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.27352.avif',
                'description' => 'Fraîcheur boisée, élégante et longue durée.',
                'origine'=>'Exotique'
            ],
            [
                'name' => 'Supremacy Gold', 'price' => 55.00, 'niveauPrestige' => 4, 'notation' => 4, 'taille' => 100, 'quantiteRestante' => 9, 'marque' => 'Afnan', 'categorie' => 'Unisexe', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.27351.avif',
                'description' => 'Un sillage épicé et ambré luxueux.',
                'origine'=>'Exotique'
            ],

            // --- RASASI ---
            [
                'name' => 'La Yuqawam', 'price' => 75.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 75, 'quantiteRestante' => 10, 'marque' => 'Rasasi', 'categorie' => 'Homme', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.19668.avif',
                'description' => 'Un cuir sophistiqué, référence absolue.',
                'origine'=>'Exotique'
            ],
            [
                'name' => 'Shuhrah', 'price' => 35.00, 'niveauPrestige' => 4, 'notation' => 4, 'taille' => 90, 'quantiteRestante' => 15, 'marque' => 'Rasasi', 'categorie' => 'Homme', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.53578.avif',
                'description' => 'Un parfum floral et boisé très puissant.',
                'origine'=>'Exotique'
            ],

            // --- AJMAL ---
            [
                'name' => 'Amber Wood', 'price' => 110.00, 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 5, 'marque' => 'Ajmal', 'categorie' => 'Unisexe', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.26016.avif',
                'description' => 'Le chef-d\'œuvre de la collection W Series.',
                'origine'=>'Exotique'
            ],
            [
                'name' => 'Sacrifice for Her', 'price' => 38.00, 'niveauPrestige' => 4, 'notation' => 4, 'taille' => 50, 'quantiteRestante' => 14, 'marque' => 'Ajmal', 'categorie' => 'Femme', 'type' => 'parfums', 'saison' => 'Automne / Hiver',
                'image_name' => 'https://fimgs.net/mdimg/perfume-thumbs/375x500.15097.avif',
                'description' => 'Un floral jasminé avec des notes ambrées.',
                'origine'=>'Exotique'
            ],
        ];

        $this->db->table('produit')->insertBatch($data);
    }
}