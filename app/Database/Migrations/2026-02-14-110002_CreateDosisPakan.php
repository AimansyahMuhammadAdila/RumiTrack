<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDosisPakan extends Migration
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
            'pakan_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'jumlah' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'comment' => 'Jumlah pakan per pemberian',
            ],
            'frekuensi' => [
                'type' => 'INT',
                'constraint' => 3,
                'default' => 2,
                'comment' => 'Berapa kali per hari',
            ],
            'waktu_pemberian' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'comment' => 'Contoh: Pagi, Siang, Sore',
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
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
        $this->forge->addForeignKey('pakan_id', 'pakan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dosis_pakan');
    }

    public function down()
    {
        $this->forge->dropTable('dosis_pakan');
    }
}
