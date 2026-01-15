<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommande extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_commande' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                // 'constraint' => 9,
                'unsigned'   => true,
            ],
            'date_commande' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'statut' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'En cours',
            ],
            'total_prix' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
            ],
            'nom_complet' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'adresse' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tel' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'ville' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'code_postal' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'pays' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_commande', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('commandes');
    }

    public function down()
    {
        $this->forge->dropTable('commandes', true);
    }
}




