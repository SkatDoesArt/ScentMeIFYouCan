<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NoCapSeeder extends Seeder
{
    public function run()
    {

        // --- NETTOYAGE ---
        // Cette ligne vide la table 'produit' pour éviter les doublons si on relance le seeder
        $this->db->table('produit')->truncate();

        $data = [
            // Demeter Fragrance Library
            ['name' => 'Dirt', 'price' => 30.00, 'description' => 'Odeur de terre humide', 'niveauPrestige' => 2, 'notation' => 3, 'taille' => 30, 'quantiteRestante' => 15, 'marque' => 'Demeter Fragrance Library', 'categorie' => 'NoCap', 'image_name' => 'Dirt.jpg', 'type' => 'parfums'],
            ['name' => 'Funeral Home', 'price' => 35.00, 'description' => 'Salon funéraire (lys, fleurs, bois ciré)', 'niveauPrestige' => 3, 'notation' => 3, 'taille' => 30, 'quantiteRestante' => 10, 'marque' => 'Demeter Fragrance Library', 'categorie' => 'NoCap', 'image_name' => 'FuneralHome.jpg', 'type' => 'parfums'],
            ['name' => 'Play-Doh', 'price' => 30.00, 'description' => 'Odeur exacte de pâte à modeler', 'niveauPrestige' => 2, 'notation' => 5, 'taille' => 30, 'quantiteRestante' => 30, 'marque' => 'Demeter Fragrance Library', 'categorie' => 'NoCap', 'image_name' => 'PlayDoh.jpg', 'type' => 'parfums'],
            ['name' => 'Pizza', 'price' => 25.00, 'description' => 'Mozzarella, tomate et pâte chaude', 'niveauPrestige' => 1, 'notation' => 2, 'taille' => 30, 'quantiteRestante' => 15, 'marque' => 'Demeter Fragrance Library', 'categorie' => 'NoCap', 'image_name' => 'Pizza.jpg', 'type' => 'parfums'],
            ['name' => 'New Car Smell', 'price' => 20.00, 'description' => 'Odeur de voiture neuve', 'niveauPrestige' => 2, 'notation' => 4, 'taille' => 30, 'quantiteRestante' => 25, 'marque' => 'Demeter Fragrance Library', 'categorie' => 'NoCap', 'image_name' => 'NewCar.jpg', 'type' => 'parfums'],
            // Comme des Garçons
            ['name' => 'Odeur 53', 'price' => 120.00, 'description' => 'Métal chaud, air purifié, poussière', 'niveauPrestige' => 5, 'notation' => 5, 'taille' => 200, 'quantiteRestante' => 4, 'marque' => 'Comme des Garçons', 'categorie' => 'NoCap', 'image_name' => 'Odeur53.png', 'type' => 'parfums'],
            ['name' => 'Odeur 71', 'price' => 130.00, 'description' => 'Photocopieuse chaude, bois brûlé', 'niveauPrestige' => 5, 'notation' => 4, 'taille' => 200, 'quantiteRestante' => 2, 'marque' => 'Comme des Garçons', 'categorie' => 'NoCap', 'image_name' => 'Odeur71.jpg', 'type' => 'parfums'],

            // État Libre d’Orange
            ['name' => 'Sécrétions Magnifiques', 'price' => 90.00, 'description' => 'Sang, lait, sueur, salive', 'niveauPrestige' => 5, 'notation' => 1, 'taille' => 50, 'quantiteRestante' => 6, 'marque' => 'État Libre d’Orange', 'categorie' => 'NoCap', 'image_name' => 'SecretionMagnifique.jpg', 'type' => 'parfums'],
            ['name' => 'Fat Electrician', 'price' => 85.00, 'description' => 'Vétiver, crème de marron, latex', 'niveauPrestige' => 5, 'notation' => 4, 'taille' => 50, 'quantiteRestante' => 3, 'marque' => 'État Libre d’Orange', 'categorie' => 'NoCap', 'image_name' => 'FatElectrician.jpg', 'type' => 'parfums'],

            // Black Phoenix Alchemy Lab
            ['name' => 'Dorian', 'price' => 60.00, 'description' => 'Vieux livres et herbes sèches', 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 100, 'quantiteRestante' => 5, 'marque' => 'Black Phoenix Alchemy Lab', 'categorie' => 'NoCap', 'image_name' => 'Dorian.png', 'type' => 'parfums'],
            // Zoologist Perfumes
            ['name' => 'Bat', 'price' => 160.00, 'description' => 'Grotte humide, terre, fruits écrasés', 'niveauPrestige' => 5, 'notation' => 4, 'taille' => 60, 'quantiteRestante' => 12, 'marque' => 'Zoologist Perfumes', 'categorie' => 'NoCap', 'image_name' => 'Bat.png', 'type' => 'parfums'],
            ['name' => 'Squid', 'price' => 150.00, 'description' => 'Encre, embruns marins, résines sombres', 'niveauPrestige' => 5, 'notation' => 5, 'taille' => 60, 'quantiteRestante' => 3, 'marque' => 'Zoologist Perfumes', 'categorie' => 'NoCap', 'image_name' => 'Squid.png', 'type' => 'parfums'],

            // Food & Fast-Food
            ['name' => 'KFC – Eau de Colonel', 'price' => 25.00, 'description' => 'L’odeur du poulet frit original', 'niveauPrestige' => 1, 'notation' => 2, 'taille' => 50, 'quantiteRestante' => 50, 'marque' => 'KFC', 'categorie' => 'NoCap', 'image_name' => 'KFC.png', 'type' => 'parfums'],
            ['name' => 'Flame', 'price' => 30.00, 'description' => 'L’odeur du Whopper grillé à la flamme', 'niveauPrestige' => 1, 'notation' => 2, 'taille' => 50, 'quantiteRestante' => 20, 'marque' => 'Burger King', 'categorie' => 'NoCap', 'image_name' => 'Flame.jpeg', 'type' => 'parfums'],

            // Autres
            ['name' => 'PaperPassion', 'price' => 95.00, 'description' => 'Odeur de livre neuf et encre fraîche', 'niveauPrestige' => 4, 'notation' => 5, 'taille' => 50, 'quantiteRestante' => 8, 'marque' => 'PaperPassion', 'categorie' => 'NoCap', 'image_name' => 'BookPerfume.jpg', 'type' => 'parfums'],
        ];

        $this->db->table('produit')->insertBatch($data);
    }
}
