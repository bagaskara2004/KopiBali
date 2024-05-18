<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_product' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'title_product' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'desc_product' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'price_product' => [
                'type'       => 'INT',
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id_product', true);
        $this->forge->addForeignKey('id_admin','admin','id_admin');
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
