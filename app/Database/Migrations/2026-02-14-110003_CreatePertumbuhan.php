<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePertumbuhan extends Migration
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
            'berat' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'comment' => 'Berat dalam kg',
            ],
            'tinggi' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
                'comment' => 'Tinggi dalam cm',
            ],
            'lingkar_dada' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
                'comment' => 'Lingkar dada dalam cm',
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
        $this->forge->createTable('pertumbuhan');
    }

    public function down()
    {
        $this->forge->dropTable('pertumbuhan');
    }
}
