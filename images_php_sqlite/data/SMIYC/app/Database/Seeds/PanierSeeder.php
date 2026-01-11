<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PanierSeeder extends Seeder
{
    public function run()
    {
        // --- NETTOYAGE ---
        // Cette ligne vide la table pour éviter les doublons si on relance le seeder
        $this->db->table('panier')->truncate();

        $data = [
            ['id_panier' => 1,  'id_user' => 1],
            ['id_panier' => 2, 'id_user' => 2 ]
        ];
        $this->db->table('panier')->insertBatch($data);
    }
}
