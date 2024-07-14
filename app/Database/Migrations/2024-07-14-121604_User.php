<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'email' => [
                'type'           => 'VARCHAR',
                'constraint' => '200',
            ],
            'id_shop' => [
                'type'           => 'INT',
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'comment' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'post' => [
                'type'       => 'BOOLEAN',
            ],
            'date' => [
                'type'       => 'DATETIME',
            ]
        ]);
        $this->forge->addKey('email', true);
        $this->forge->addForeignKey('id_shop', 'shop', 'id_shop');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
