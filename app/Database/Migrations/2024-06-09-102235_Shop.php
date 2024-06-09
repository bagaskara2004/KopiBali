<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Shop extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_shop' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'description_shop' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'address_shop' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'location_shop' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'logo_shop' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
        ]);
        $this->forge->addKey('id_shop', true);
        $this->forge->createTable('shop');
    }

    public function down()
    {
        $this->forge->dropTable('shop');
    }
}
