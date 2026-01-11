<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AvisSeeder extends Seeder
{
    public function run()
    {
        // --- NETTOYAGE ---
        // Cette ligne vide la table pour éviter les doublons si on relance le seeder
        $this->db->table('avis')->truncate();

        $data=[
            ['id_user' => 1,'id_produit'=>1, 'titre'=>"Parfum",'contenu'=>"Description5",'date'=>'date'],
            ['id_user' => 1, 'id_produit' => 2,'titre'=>'Parfum4','contenu'=>'Description5','date'=>'date'],
        ];
        $this->db->table('avis')->insertBatch($data);
    }
}
