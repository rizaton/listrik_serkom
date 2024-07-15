<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Level extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_level' => [
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_level' => [
                'type' => 'VARCHAR',
                'constraint' => 35,
            ],
        ]);
        $this->forge->addKey('id_level', true);
        $this->forge->createTable('level');
    }

    public function down()
    {
        $this->forge->dropTable('level');
    }
}
