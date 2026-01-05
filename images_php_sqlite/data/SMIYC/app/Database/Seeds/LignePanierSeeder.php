<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LignePanierSeeder extends Seeder
{
    public function run()
    {
        $data=[
            ['id_produit' =>1, 'id_panier'=>1,'id_user' => 1,'quantite'=>50],
            ['id_produit' => 1, 'id_panier'=>1,'id_user' => 1,'quantite'=>10]
        ];
        $this->db->table('ligne_panier')->insertBatch($data);
    }
    
}
