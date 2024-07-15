<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tagihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tagihan' => [
                'type' => 'INT',
                'constraint' => 15,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_penggunaan' => [
                'type' => 'INT',
                'constraint' => 15,
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
            'jumlah_meter' => [
                'type' => 'INT',
                'constraint' => 20,
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('id_tagihan', true);
        $this->forge->addForeignKey('id_penggunaan', 'penggunaan', 'id_penggunaan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tagihan');
    }

    public function down()
    {
        $this->forge->dropTable('tagihan');
    }
}
