<?php

namespace App\Modules\Pakan\Models;

use CodeIgniter\Model;

class PengeluaranPakanModel extends Model
{
    protected $table = 'pengeluaran_pakan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'user_id',
        'pakan_id',
        'jumlah',
        'satuan',
        'tanggal',
        'catatan',
    ];

    protected function initialize(): void
    {
        if (session()->get('userId')) {
            $this->where('pengeluaran_pakan.user_id', session()->get('userId'));
        }
    }

    protected $validationRules = [
        'pakan_id' => 'required|integer',
        'jumlah' => 'required|decimal',
        'tanggal' => 'required|valid_date',
    ];

    public function getWithPakan()
    {
        return $this->select('pengeluaran_pakan.*, pakan.nama_pakan')
            ->join('pakan', 'pakan.id = pengeluaran_pakan.pakan_id')
            ->orderBy('pengeluaran_pakan.tanggal', 'DESC')
            ->findAll();
    }
}
