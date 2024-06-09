<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_shop' => [
                'type'           => 'INT',
            ],
            'email_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'date' => [
                'type'       => 'DATE',
            ]
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->addForeignKey('id_shop', 'shop', 'id_shop');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
