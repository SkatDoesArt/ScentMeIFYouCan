<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePanier extends Migration
{
    public function up()
    {   
                   // Création de la table php spark migrate:refresh 
        $this->forge->addField([
            'id_panier' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 255,
            ],
            
            ]);
        $this->forge->createTable('panier');

    }

    public function down()
    {
        $this->forge->dropTable('panier', true);
    }
}
