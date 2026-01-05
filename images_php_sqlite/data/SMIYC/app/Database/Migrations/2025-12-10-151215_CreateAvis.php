<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAvis extends Migration
{
    // Création de la table php spark migrate:refresh 
    public function up()
    {
        $this->forge->addField([
            'id_avis' => ['type' => 'INT', 'auto_increment' => true, 'unsigned'       => true,],
            'id_user' => ['type' => 'INT'],
            'id_produit' => ['type' => 'INT'],
            'titre' => ['type' => 'VARCHAR', 'constraint' => 255],
            'contenu' => ['type' => 'TEXT'],
            'date' => ['type' => 'DATETIME'],
        ]);

        $this->forge->addKey('id_avis', true);

        $this->forge->addKey('id_user');       // index
        $this->forge->addKey('id_produit');    // index

        


        $this->forge->createTable('avis');
    }
    //Pour suuprimer les tables php spark migrate:rollback
    public function down()
    {
        $this->forge->dropTable('avis', true);
    }
}
