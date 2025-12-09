<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProduit extends Migration
{
    public function up()
    {
        // Supprime la table si elle existe
        $this->forge->dropTable('produit', true);

        // Recréation de la table
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'auto_increment' => true],
            'name'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'price'            => ['type' => 'FLOAT'],
            'description'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'notation'   => ['type' => 'INT'],
            'taille'           => ['type' => 'INT'],
            'quantiteRestante' => ['type' => 'INT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('produit');
    }

    public function down()
    {
        // Supprime la table pour rollback
        $this->forge->dropTable('produit', true);
    }
}
