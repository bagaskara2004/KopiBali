<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Media extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_media' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_categoryMedia' => [
                'type'           => 'INT',
            ],
            'id_shop' => [
                'type'           => 'INT',
            ],
            'link_media' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ]
        ]);
        $this->forge->addKey('id_media', true);
        $this->forge->addForeignKey('id_shop', 'shop', 'id_shop');
        $this->forge->addForeignKey('id_categoryMedia', 'categoryMedia', 'id_categoryMedia');
        $this->forge->createTable('media');
    }

    public function down()
    {
        $this->forge->dropTable('media');
    }
}
