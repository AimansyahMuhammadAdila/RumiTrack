<?php

namespace App\Modules\Kandang\Models;

use CodeIgniter\Model;

class KandangModel extends Model
{
    protected $table = 'kandang';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'user_id',
        'nama_kandang',
        'jenis_ruminan',
        'kode_kandang',
        'tanggal_perolehan',
        'tujuan',
        'kapasitas',
        'catatan',
    ];

    protected function initialize(): void
    {
        if (session()->get('userId')) {
            $this->where('kandang.user_id', session()->get('userId'));
        }
    }

    protected $validationRules = [
        'nama_kandang' => 'required|max_length[100]',
        'jenis_ruminan' => 'required|max_length[50]',
        'kode_kandang' => 'required|max_length[20]|is_unique[kandang.kode_kandang,id,{id}]',
    ];

    protected $validationMessages = [
        'kode_kandang' => [
            'is_unique' => 'Kode kandang sudah digunakan.',
        ],
    ];

    public function getWithCount($userId = null)
    {
        $builder = $this->select('kandang.*, COUNT(peranakan.id) as jumlah_ternak')
            ->join('peranakan', 'peranakan.kandang_id = kandang.id', 'left')
            ->groupBy('kandang.id');
        if ($userId) {
            $builder->where('kandang.user_id', $userId);
        }
        return $builder->findAll();
    }
}
