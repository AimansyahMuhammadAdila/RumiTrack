<?php

namespace App\Modules\Ternak\Models;

use CodeIgniter\Model;

class TernakModel extends Model
{
    protected $table = 'ternak';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'user_id',
        'kode_ternak',
        'nama',
        'jenis',
        'ras',
        'jenis_kelamin',
        'tanggal_lahir',
        'berat_awal',
        'status',
        'catatan',
    ];

    protected function initialize(): void
    {
        if (session()->get('userId')) {
            $this->where('ternak.user_id', session()->get('userId'));
        }
    }

    protected $validationRules = [
        'kode_ternak' => 'required|max_length[20]|is_unique[ternak.kode_ternak,id,{id}]',
        'nama' => 'required|max_length[100]',
        'jenis' => 'required|max_length[50]',
        'berat_awal' => 'permit_empty|decimal',
    ];

    protected $validationMessages = [
        'kode_ternak' => [
            'is_unique' => 'Kode ternak sudah digunakan.',
        ],
    ];
}
