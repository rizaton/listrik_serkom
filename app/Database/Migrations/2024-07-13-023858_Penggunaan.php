<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penggunaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penggunaan' => [
                'type' => 'INT',
                'constraint' => 15,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            'bulan' => [
                'type' => 'VARCHAR',
                'constraint' => 2,
            ],
            'tahun' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
            ],
            'meter_awal' => [
                'type' => 'INT',
                'constraint' => 20,
            ],
            'meter_akhir' => [
                'type' => 'INT',
                'constraint' => 20,
            ],
        ]);
        $this->forge->addKey('id_penggunaan', true);
        $this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('penggunaan');
    }

    public function down()
    {
        $this->forge->dropTable('penggunaan');
    }
}
