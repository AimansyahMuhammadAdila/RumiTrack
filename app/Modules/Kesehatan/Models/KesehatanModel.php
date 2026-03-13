<?php

namespace App\Modules\Kesehatan\Models;

use CodeIgniter\Model;

class KesehatanModel extends Model
{
    protected $table = 'kesehatan';
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
        'kondisi',
        'gejala',
        'diagnosa',
        'penanganan',
        'obat',
        'biaya',
        'dokter',
        'catatan',
    ];

    protected function initialize(): void
    {
        if (session()->get('userId')) {
            $this->where('kesehatan.user_id', session()->get('userId'));
        }
    }

    protected $validationRules = [
        'ternak_id' => 'required|integer',
        'tanggal' => 'required|valid_date',
        'kondisi' => 'required|in_list[Sehat,Sakit,Dalam Perawatan,Sembuh]',
    ];

    public function getWithTernak()
    {
        return $this->select('kesehatan.*, ternak.nama as nama_ternak, ternak.kode_ternak, ternak.jenis as jenis_ternak')
            ->join('ternak', 'ternak.id = kesehatan.ternak_id')
            ->orderBy('kesehatan.tanggal', 'DESC')
            ->findAll();
    }

    public function getByIdWithTernak($id)
    {
        return $this->select('kesehatan.*, ternak.nama as nama_ternak, ternak.kode_ternak')
            ->join('ternak', 'ternak.id = kesehatan.ternak_id')
            ->find($id);
    }
}
