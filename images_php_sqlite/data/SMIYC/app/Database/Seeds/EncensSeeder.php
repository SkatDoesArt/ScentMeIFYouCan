<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EncensSeeder extends Seeder
{
    public function run()
    {
        // --- NETTOYAGE ---
        // On vide la table avant de la remplir
        $this->db->table('encens')->truncate();

        $data = [
            [
                'image_name'       => 'bakhoor_al_khaleej.png', 
                'name'             => 'Bakhoor Al Khaleej', // Correspond à la colonne 'name'
                'description'      => "Un mélange riche de bois d'agar, de musc et de notes florales orientales.",
                'price'            => 25.50,
                'niveauPrestige'   => 4,
                'notation'         => 5,
                'taille'           => 50, // en grammes par exemple
                'quantiteRestante' => 15,
                'marque'           => 'Lattafa'
            ],
            [
                'image_name'       => 'oud_shaikha.png', 
                'name'             => 'Oud Shaikha',
                'description'      => "Encens traditionnel de prestige aux copeaux de bois d'oud pur.",
                'price'            => 45.00,
                'niveauPrestige'   => 5,
                'notation'         => 4,
                'taille'           => 30,
                'quantiteRestante' => 8,
                'marque'           => 'Al Wataniah'
            ],
            [
                'image_name'       => 'musk_rose_encens.png', 
                'name'             => 'Encens Musc Rose',
                'description'      => "Une ambiance douce et apaisante alliant la rose de Taif et le musc blanc.",
                'price'            => 18.90,
                'niveauPrestige'   => 3,
                'notation'         => 4,
                'taille'           => 40,
                'quantiteRestante' => 20,
                'marque'           => 'Adaaf'
            ],
        ];
        
        // CORRECTION : On insère dans la table 'encens' et non 'marques'
        $this->db->table('encens')->insertBatch($data);
    }
}