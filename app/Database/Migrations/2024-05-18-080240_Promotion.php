<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Promotion extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_promotion' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'title_promotion' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'desc_promotion' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'photo_promotion' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
        ]);
        $this->forge->addKey('id_promotion', true);
        $this->forge->addForeignKey('id_admin','admin','id_admin');
        $this->forge->createTable('promotion');
    }

    public function down()
    {
        $this->forge->dropTable('promotion');
    }
}
