<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subscribe extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_subscribe' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
        ]);
        $this->forge->addKey('id_subscribe', true);
        $this->forge->createTable('subscribe');
    }

    public function down()
    {
        $this->forge->dropTable('subscribe');
    }
}
