<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToAllTables extends Migration
{
    private $tables = [
        'kandang',
        'ternak',
        'pakan',
        'dosis_pakan',
        'pertumbuhan',
        'kesehatan',
        'peranakan',
        'keuangan',
        'pengeluaran_pakan',
        'vaksin',
        'pengobatan',
        'catatan_rekomendasi',
    ];

    public function up()
    {
        foreach ($this->tables as $table) {
            $this->forge->addColumn($table, [
                'user_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                    'after' => 'id',
                ],
            ]);

            // Set existing data to user_id = 1 (admin)
            $this->db->table($table)->update(['user_id' => 1]);
        }
    }

    public function down()
    {
        foreach ($this->tables as $table) {
            $this->forge->dropColumn($table, 'user_id');
        }
    }
}
