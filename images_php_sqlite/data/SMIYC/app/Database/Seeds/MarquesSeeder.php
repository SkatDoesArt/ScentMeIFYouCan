<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MarquesSeeder extends Seeder
{
    public function run()
    {
        // --- NETTOYAGE ---
        // Désactive les contraintes de clés étrangères pour éviter les erreurs lors du truncate
        // $this->db->query('PRAGMA foreign_keys = OFF;');
        
        // On vide la table
        $this->db->table('marques')->truncate();
        
        // $this->db->query('PRAGMA foreign_keys = ON;');

        $data = [
            [
                'image_name' => 'serge_lutens.png', 
                'title'      => 'Serge Lutens',
                'description'=> 'Féminité du Bois, Ambre Sultan, La Fille de Berlin ...'
            ],
            [
                'image_name' => 'chanel.jpg', 
                'title'      => 'Chanel',
                'description'=> 'N°5, Coco Mademoiselle, Bleu de Chanel ...'
            ],
            [
                'image_name' => 'dior.png', 
                'title'      => 'Dior',
                'description'=> 'J’adore, Sauvage, Miss Dior ...'
            ],
            [
                'image_name' => 'guerlain.jpg', 
                'title'      => 'Guerlain',
                'description'=> 'Shalimar, La Petite Robe Noire, Mon Guerlain ...'
            ],
            [
                'image_name' => 'hermes.jpg', 
                'title'      => 'Hermès',
                'description'=> 'Terre d’Hermès, Twilly d’Hermès, Un Jardin sur le Nil ...'
            ],
            [
                'image_name' => 'prada.jpg', 
                'title'      => 'Prada',
                'description'=> 'Infusion d’Iris, Prada Paradoxe, Luna Rossa ...'
            ],
            [
                'image_name' => 'tom_ford.jpg', 
                'title'      => 'Tom Ford',
                'description'=> 'Black Orchid, Oud Wood, Fucking Fabulous ...'
            ],
            [
                'image_name' => 'valentino.jpg', 
                'title'      => 'Valentino',
                'description'=> 'Donna, Born in Roma, Uomo ...'
            ],
        ];

        $this->db->table('marques')->insertBatch($data);
    }
}
