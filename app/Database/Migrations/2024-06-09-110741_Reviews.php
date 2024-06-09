<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reviews extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_reviews' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'           => 'INT',
            ],
            'rating' => [
                'type'       => 'INT',
                'constraint' => '1',
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
        ]);
        $this->forge->addKey('id_reviews', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->createTable('reviews');
    }

    public function down()
    {
        $this->forge->dropTable('reviews');
    }
}
