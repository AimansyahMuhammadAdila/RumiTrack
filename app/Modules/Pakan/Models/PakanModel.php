<?php

namespace App\Modules\Pakan\Models;

use CodeIgniter\Model;

class PakanModel extends Model
{
    protected $table = 'pakan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'user_id',
        'nama_pakan',
        'jenis',
        'satuan',
        'harga_per_satuan',
        'stok',
        'protein',
        'keterangan',
    ];

    protected function initialize(): void
    {
        if (session()->get('userId')) {
            $this->where('pakan.user_id', session()->get('userId'));
        }
    }

    protected $validationRules = [
        'nama_pakan' => 'required|max_length[100]',
        'jenis' => 'required|max_length[50]',
        'satuan' => 'required|max_length[20]',
        'harga_per_satuan' => 'permit_empty|decimal',
        'stok' => 'permit_empty|decimal',
    ];
}
