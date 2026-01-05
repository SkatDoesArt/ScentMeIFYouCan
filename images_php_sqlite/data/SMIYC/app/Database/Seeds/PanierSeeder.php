<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PanierSeeder extends Seeder
{
    public function run()
    {
        $data=[

    ['id_panier' => 1,  'id_user' => 1],
    ['id_panier' => 2, 'id_user' => 2 ]
];

        
        $this->db->table('panier')->insertBatch($data);
    }
}
