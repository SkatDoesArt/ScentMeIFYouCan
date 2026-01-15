<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestCommandeSeeder extends Seeder

{
    public function run()
    {
        $data = [
            [
                'user_id'        => 2,
                'date_commande'  => date('Y-m-d H:i:s'),
                'statut'         => 'En cours',
                'total_prix'     => 129.99,
                'nom_complet'    => 'Jean Dupont',
                'adresse'        => '12 rue de Paris',
                'tel'            => '0612345678',
                'ville'          => 'Paris',
                'code_postal'    => '75001',
                'pays'           => 'France',
            ],
            [
                'user_id'        => 2,
                'date_commande'  => date('Y-m-d H:i:s', strtotime('-1 day')),
                'statut'         => 'Payée',
                'total_prix'     => 59.50,
                'nom_complet'    => 'Marie Martin',
                'adresse'        => '8 avenue Victor Hugo',
                'tel'            => '0698765432',
                'ville'          => 'Lyon',
                'code_postal'    => '69000',
                'pays'           => 'France',
            ],
            [
                'user_id'        => 2,
                'date_commande'  => date('Y-m-d H:i:s', strtotime('-2 days')),
                'statut'         => 'Livrée',
                'total_prix'     => 249.00,
                'nom_complet'    => 'Paul Bernard',
                'adresse'        => '5 boulevard Sud',
                'tel'            => '0701020304',
                'ville'          => 'Marseille',
                'code_postal'    => '13000',
                'pays'           => 'France',
            ],
        ];

        // Insertion multiple
        $this->db->table('commandes')->insertBatch($data);
    }
}


