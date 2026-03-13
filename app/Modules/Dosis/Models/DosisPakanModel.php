<?php

namespace App\Modules\Dosis\Models;

use CodeIgniter\Model;

class DosisPakanModel extends Model
{
    protected $table = 'dosis_pakan';
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
        'pakan_id',
        'jumlah',
        'frekuensi',
        'waktu_pemberian',
        'tanggal_mulai',
        'tanggal_selesai',
        'catatan',
    ];

    protected function initialize(): void
    {
        if (session()->get('userId')) {
            $this->where('dosis_pakan.user_id', session()->get('userId'));
        }
    }

    protected $validationRules = [
        'ternak_id' => 'required|integer',
        'pakan_id' => 'required|integer',
        'jumlah' => 'required|decimal',
        'frekuensi' => 'required|integer',
        'tanggal_mulai' => 'required|valid_date',
    ];

    /**
     * Get dosis with ternak and pakan names joined
     */
    public function getWithRelations()
    {
        return $this->select('dosis_pakan.*, ternak.nama as nama_ternak, ternak.kode_ternak, ternak.jenis as jenis_ternak, pakan.nama_pakan, pakan.satuan')
            ->join('ternak', 'ternak.id = dosis_pakan.ternak_id')
            ->join('pakan', 'pakan.id = dosis_pakan.pakan_id')
            ->findAll();
    }

    public function getByIdWithRelations($id)
    {
        return $this->select('dosis_pakan.*, ternak.nama as nama_ternak, ternak.kode_ternak, pakan.nama_pakan, pakan.satuan')
            ->join('ternak', 'ternak.id = dosis_pakan.ternak_id')
            ->join('pakan', 'pakan.id = dosis_pakan.pakan_id')
            ->find($id);
    }
}
