<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tarif extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tarif' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'daya' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            'tarif_perkwh' => [
                'type' => 'DECIMAL',
                'constraint' => 12,
            ],
        ]);
        $this->forge->addKey('id_tarif', true);
        $this->forge->createTable('tarif');
    }

    public function down()
    {
        $this->forge->dropTable('tarif');
    }
}
