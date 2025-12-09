<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProduitSeeder extends Seeder
{
    public function run()
    {
        $data=[
            ['name' => 'Produit A', 'price' => 19.99,'description'=>"Parfum",'notation'=>5,'taille'=>4,'quantiteRestante'=>9],
            ['name' => 'Produit A', 'price' => 19.99,'description'=>"Parfum",'notation'=>5,'taille'=>4,'quantiteRestante'=>9],
        ];
        $this->db->table('produit')->insertBatch($data);

        
    }
}
