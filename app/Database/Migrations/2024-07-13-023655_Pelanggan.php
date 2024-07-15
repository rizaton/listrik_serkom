<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 15,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nomor_kwh' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'id_tarif' => [
                'type' => 'INT',
                'constraint' => 6,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 25,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_pelanggan', true);
        $this->forge->addForeignKey('id_tarif', 'tarif', 'id_tarif', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}
