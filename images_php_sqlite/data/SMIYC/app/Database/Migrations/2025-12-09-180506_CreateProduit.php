<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class CreateProduit extends Migration
{
    public function up()
    {


        // Création de la table php spark migrate:refresh 
        $this->forge->addField([
            'id_produit' => [
                'type'           => 'INT',
                'auto_increment' => true,
                 'unsigned'       => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'niveauPrestige' => [
                'type' => 'INT',
            ],
            'notation' => [
                'type' => 'INT',
            ],
            'taille' => [
                'type' => 'INT',
            ],
            'quantiteRestante' => [
                'type' => 'INT',
            ],
            'marque'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'catégorie'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
            ]
        ]);

        // Clé primaire
        $this->forge->addKey('id_produit', true);
        // Création de la table
        $this->forge->createTable('produit');
    }
    //php spark migrate:rollback
    public function down()
    {
        $this->forge->dropTable('produit', true);
    }
}

