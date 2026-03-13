<?php

namespace App\Modules\Pertumbuhan\Models;

use CodeIgniter\Model;

class PertumbuhanModel extends Model
{
    protected $table = 'pertumbuhan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'user_id',
        'ternak_id',
        'tanggal',
        'berat',
        'tinggi',
        'lingkar_dada',
        'catatan',
    ];

    protected function initialize(): void
    {
        if (session()->get('userId')) {
            $this->where('pertumbuhan.user_id', session()->get('userId'));
        }
    }

    protected $validationRules = [
        'ternak_id' => 'required|integer',
        'tanggal' => 'required|valid_date',
        'berat' => 'required|decimal',
    ];

    public function getWithTernak()
    {
        return $this->select('pertumbuhan.*, ternak.nama as nama_ternak, ternak.kode_ternak, ternak.jenis as jenis_ternak')
            ->join('ternak', 'ternak.id = pertumbuhan.ternak_id')
            ->orderBy('pertumbuhan.tanggal', 'DESC')
            ->findAll();
    }

    public function getByIdWithTernak($id)
    {
        return $this->select('pertumbuhan.*, ternak.nama as nama_ternak, ternak.kode_ternak')
            ->join('ternak', 'ternak.id = pertumbuhan.ternak_id')
            ->find($id);
    }

    public function getByTernak($ternakId)
    {
        return $this->where('ternak_id', $ternakId)
            ->orderBy('tanggal', 'ASC')
            ->findAll();
    }
}
