<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LignePanierSeeder extends Seeder
{
    public function run()
    {
        // --- NETTOYAGE ---
        // Cette ligne vide la table pour éviter les doublons si on relance le seeder
        $this->db->table('ligne_panier')->truncate();

        $data = [
            ['id_produit' => 50, 'id_panier' => 1, 'quantite' => 50, 'prix_unitaire' => 2.5],
            ['id_produit' => 50, 'id_panier' => 1, 'quantite' => 20, 'prix_unitaire' => 5.0],
            ['id_produit' => 51, 'id_panier' => 2, 'quantite' => 15, 'prix_unitaire' => 7.5],
            ['id_produit' => 49, 'id_panier' => 1, 'quantite' => 10, 'prix_unitaire' => 2.5],
        ];

        /*
         * 'id_ligne_panier' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_produit' => [
                'type'       => 'INT',
            ],
            'id_panier' => [
                'type'       => 'INT',
            ],
            'quantite' => [
                'type'       => 'INT',
            ],
            'prix_unitaire' => [
                'type'       => 'FLOAT',
            ]*/
        $this->db->table('ligne_panier')->insertBatch($data);
    }
}
