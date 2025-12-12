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
            ],
            'id_panier' => [
                'type'       => 'INT',
            ],
            'id_user' => [
                'type'       => 'INT',
            ],
            'quantite' => [
                'type'       => 'INT',
            ]
        ]);

        $this->forge->addKey('id_ligne_panier', true);
        $this->forge->addKey('id_user');
        $this->forge->addKey('id_produit');
        $this->forge->addKey('id_panier');

        $this->forge->createTable('ligne_panier');
    }

    public function down()
    {
        $this->forge->dropTable('ligne_panier', true);
    }
}

