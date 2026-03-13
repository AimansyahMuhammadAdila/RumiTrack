<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKandang extends Migration
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
            'nama_kandang' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jenis_ruminan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'comment' => 'Sapi, Kambing, Domba, Kerbau, dll',
            ],
            'kode_kandang' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'tanggal_perolehan' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tujuan' => [
                'type' => 'ENUM',
                'constraint' => ['Produksi Daging', 'Bibit/Reproduksi', 'Produksi Kulit/Produk Samping', 'Pemanfaatan Kotoran'],
                'default' => 'Produksi Daging',
            ],
            'kapasitas' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
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
        $this->forge->addUniqueKey('kode_kandang');
        $this->forge->createTable('kandang');
    }

    public function down()
    {
        $this->forge->dropTable('kandang');
    }
}
