<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVaksin extends Migration
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
            'jenis_vaksin' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'dosis' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'tanggal' => [
                'type' => 'DATE',
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
        $this->forge->createTable('vaksin');
    }

    public function down()
    {
        $this->forge->dropTable('vaksin');
    }
}
