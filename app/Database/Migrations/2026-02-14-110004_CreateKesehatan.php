<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKesehatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ternak_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'kondisi' => [
                'type' => 'ENUM',
                'constraint' => ['Sehat', 'Sakit', 'Dalam Perawatan', 'Sembuh'],
                'default' => 'Sehat',
            ],
            'gejala' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'diagnosa' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'penanganan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'obat' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'biaya' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2',
                'default' => 0,
            ],
            'dokter' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('ternak_id', 'ternak', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kesehatan');
    }

    public function down()
    {
        $this->forge->dropTable('kesehatan');
    }
}
