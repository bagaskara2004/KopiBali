<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PhotoProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_photoProduct' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_product' => [
                'type'           => 'INT',
            ],
            'photo_product' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ]
        ]);
        $this->forge->addKey('id_photoProduct', true);
        $this->forge->addForeignKey('id_product','product','id_product');
        $this->forge->createTable('photoProduct');
    }

    public function down()
    {
        $this->forge->dropTable('photoProduct');
    }
}
