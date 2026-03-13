<?php

namespace App\Modules\Peranakan\Models;

use CodeIgniter\Model;

class PeranakanModel extends Model
{
    protected $table = 'peranakan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'user_id',
        'kandang_id',
        'kode_ternak',
        'jenis_ruminan',
        'jenis_kelamin',
        'tanggal_perolehan',
        'umur_bulan',
        'catatan',
    ];

    protected function initialize(): void
    {
        if (session()->get('userId')) {
            $this->where('peranakan.user_id', session()->get('userId'));
        }
    }

    protected $validationRules = [
        'kandang_id' => 'required|integer',
        'kode_ternak' => 'required|max_length[20]',
        'jenis_ruminan' => 'required|max_length[50]',
        'jenis_kelamin' => 'required|in_list[Jantan,Betina]',
    ];

    public function getWithKandang()
    {
        return $this->select('peranakan.*, kandang.nama_kandang, kandang.kode_kandang as kode_kandang_ref')
            ->join('kandang', 'kandang.id = peranakan.kandang_id')
            ->orderBy('peranakan.created_at', 'DESC')
            ->findAll();
    }

    public function countByGender($gender)
    {
        return $this->where('jenis_kelamin', $gender)->countAllResults();
    }
}
