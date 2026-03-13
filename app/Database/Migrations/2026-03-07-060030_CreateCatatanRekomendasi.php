<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCatatanRekomendasi extends Migration
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
            'bulan' => [
                'type' => 'INT',
                'constraint' => 2,
            ],
            'tahun' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'kesimpulan' => [
                'type' => 'ENUM',
                'constraint' => ['Baik', 'Cukup Baik', 'Obesitas', 'Kekurangan Nutrisi', 'Inbreeding', 'Lainnya'],
                'default' => 'Baik',
            ],
            'analisis' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'rekomendasi' => [
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
        $this->forge->createTable('catatan_rekomendasi');
    }

    public function down()
    {
        $this->forge->dropTable('catatan_rekomendasi');
    }
}
