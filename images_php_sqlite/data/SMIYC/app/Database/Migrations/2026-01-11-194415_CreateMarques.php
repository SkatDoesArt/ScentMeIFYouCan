<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMarques extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
        'image_name'  => ['type' => 'VARCHAR', 'constraint' => '255'],
        'title'       => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
        'description' => ['type' => 'TEXT', 'null' => true],

    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('marques');
    }

    public function down()
    {
        $this->forge->dropTable('marques', true);
    }
}
