<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'       => 'INT',
                'auto_increment' => true,
            ],
            'id_shop' => [
                'type'       => 'INT',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'comment' => [
                'type'       => 'VARCHAR',
                'constraint' => '1000',
            ],
            'post' => [
                'type'       => 'BOOLEAN',
            ],
            'date' => [
                'type'       => 'datetime',
                'null'       => True
            ],
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
