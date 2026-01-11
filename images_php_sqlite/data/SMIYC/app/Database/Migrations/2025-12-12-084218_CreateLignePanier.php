<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLignePanier extends Migration
{
     public function up()
    {
        $this->forge->addField([
            'id_ligne_panier' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_produit' => [
                'type'       => 'INT',
                'nullable'   => false,
            ],
            'id_panier' => [
                'type'       => 'INT',
                'nullable'   => false,
            ],
            'quantite' => [
                'type'       => 'INT',
            ],
            'prix_unitaire' => [
                'type'       => 'FLOAT',
            ],
        ]);

        $this->forge->addKey('id_ligne_panier', true);
        $this->forge->addKey('id_panier');
        $this->forge->addKey('id_produit');

        $this->forge->createTable('ligne_panier');
    }

    public function down()
    {
        $this->forge->dropTable('ligne_panier', true);
    }
}

