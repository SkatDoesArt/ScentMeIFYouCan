<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEncens extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_encens'  => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'image_name'  => ['type' => 'VARCHAR', 'constraint' => '255'],
            'name'       => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'description' => ['type' => 'TEXT', 'null' => true],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
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

        ]);
        $this->forge->addKey('id_encens', true);
        $this->forge->createTable('encens');
    }

    public function down()
    {
        $this->forge->dropTable('encens', true);
    }
}
