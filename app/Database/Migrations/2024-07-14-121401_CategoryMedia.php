<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryMedia extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categoryMedia' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'name_categoryMedia' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'icon_categoryMedia' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
        $this->forge->addKey('id_categoryMedia', true);
        $this->forge->createTable('categoryMedia');
    }

    public function down()
    {
        $this->forge->dropTable('categoryMedia');
    }
}
