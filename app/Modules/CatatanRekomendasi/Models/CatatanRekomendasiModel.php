<?php

namespace App\Modules\CatatanRekomendasi\Models;

use CodeIgniter\Model;

class CatatanRekomendasiModel extends Model
{
    protected $table = 'catatan_rekomendasi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'user_id',
        'bulan',
        'tahun',
        'kesimpulan',
        'analisis',
        'rekomendasi',
    ];

    protected function initialize(): void
    {
        if (session()->get('userId')) {
            $this->where('catatan_rekomendasi.user_id', session()->get('userId'));
        }
    }

    protected $validationRules = [
        'bulan' => 'required|integer|greater_than[0]|less_than[13]',
        'tahun' => 'required|integer|greater_than[2020]',
        'kesimpulan' => 'required|in_list[Baik,Cukup Baik,Obesitas,Kekurangan Nutrisi,Inbreeding,Lainnya]',
    ];

    public function getAll()
    {
        return $this->orderBy('tahun', 'DESC')
            ->orderBy('bulan', 'DESC')
            ->findAll();
    }
}
