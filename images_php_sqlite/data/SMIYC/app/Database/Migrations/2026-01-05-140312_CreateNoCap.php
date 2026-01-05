<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNoCap extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
        'image_name'  => ['type' => 'VARCHAR', 'constraint' => '255'],
        'title'       => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
        'order'       => ['type' => 'INT', 'constraint' => 2, 'default' => 0],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('nocap');
    }

    public function down()
    {
        $this->forge->dropTable('CreateNoCap', true);
    }
}
