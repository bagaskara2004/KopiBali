<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PhotoProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_photo_product' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_product' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'photo_product' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
        ]);
        $this->forge->addKey('id_photo_product', true);
        $this->forge->addForeignKey('id_product', 'product', 'id_product');
        $this->forge->createTable('photo_product');
    }

    public function down()
    {
        $this->forge->dropTable('photo_product');
    }
}
