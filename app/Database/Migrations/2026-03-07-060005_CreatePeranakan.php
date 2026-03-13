<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePeranakan extends Migration
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
            'kandang_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'kode_ternak' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'jenis_ruminan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Jantan', 'Betina'],
                'default' => 'Jantan',
            ],
            'tanggal_perolehan' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'umur_bulan' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
                'comment' => 'Umur dalam bulan',
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
        $this->forge->addForeignKey('kandang_id', 'kandang', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('peranakan');
    }

    public function down()
    {
        $this->forge->dropTable('peranakan');
    }
}
