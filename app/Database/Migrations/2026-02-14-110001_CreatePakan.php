<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePakan extends Migration
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
            'nama_pakan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'comment' => 'Hijauan, Konsentrat, Vitamin, dll',
            ],
            'satuan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'kg',
            ],
            'harga_per_satuan' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2',
                'default' => 0,
            ],
            'stok' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'protein' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => true,
                'comment' => 'Persentase protein',
            ],
            'keterangan' => [
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
        $this->forge->createTable('pakan');
    }

    public function down()
    {
        $this->forge->dropTable('pakan');
    }
}
