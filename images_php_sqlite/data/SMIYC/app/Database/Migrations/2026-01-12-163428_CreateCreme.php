<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCreme extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_creme'        => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'image_name'       => ['type' => 'VARCHAR', 'constraint' => '255'],
            'name'             => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'description'      => ['type' => 'TEXT', 'null' => true],
            'price'            => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'notation'         => ['type' => 'INT'],
            'taille'           => ['type' => 'INT'],
            'quantiteRestante' => ['type' => 'INT'],
            'marque'           => ['type' => 'VARCHAR', 'constraint' => 255],
            // --- Nouveaux champs ---
            'typePeau'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id_creme', true);
        $this->forge->createTable('creme');
    }

    public function down()
    {
        $this->forge->dropTable('creme', true);
    }
}
