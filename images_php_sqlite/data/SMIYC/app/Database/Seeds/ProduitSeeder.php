<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProduitSeeder extends Seeder
{
    public function run()
    {
        $data=[
            ['name' => 'Produit A', 'price' => 19.99,'description'=>"Parfum",'niveauPrestige'=>5,'notation'=>5,'taille'=>4,'quantiteRestante'=>9,'marque'=>'Dior','catégorie'=>'Homme'],
            ['name' => 'Produit A', 'price' => 19.99,'description'=>"Parfum",'niveauPrestige'=>4,'notation'=>5,'taille'=>4,'quantiteRestante'=>9,'marque'=>'Dior','catégorie'=>'Homme'],
        ];
        $this->db->table('produit')->insertBatch($data);
    }
}
