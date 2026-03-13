<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTernak extends Migration
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
            'kode_ternak' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'comment' => 'Sapi, Kambing, Ayam, Domba, dll',
            ],
            'ras' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Jantan', 'Betina'],
                'default' => 'Jantan',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'berat_awal' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
                'comment' => 'dalam kg',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Aktif', 'Sakit', 'Terjual', 'Mati'],
                'default' => 'Aktif',
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
        $this->forge->addUniqueKey('kode_ternak');
        $this->forge->createTable('ternak');
    }

    public function down()
    {
        $this->forge->dropTable('ternak');
    }
}
