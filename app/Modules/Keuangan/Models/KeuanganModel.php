<?php

namespace App\Modules\Keuangan\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table = 'keuangan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'user_id',
        'tanggal',
        'jenis',
        'kategori',
        'jumlah',
        'keterangan',
    ];

    protected function initialize(): void
    {
        if (session()->get('userId')) {
            $this->where('keuangan.user_id', session()->get('userId'));
        }
    }

    protected $validationRules = [
        'tanggal' => 'required|valid_date',
        'jenis' => 'required|in_list[Pemasukan,Pengeluaran]',
        'jumlah' => 'required|decimal',
    ];

    public function getPemasukan($period = 'all', $userId = null)
    {
        $builder = $this->where('jenis', 'Pemasukan');
        if ($userId)
            $builder->where('keuangan.user_id', $userId);
        $this->applyPeriodFilter($builder, $period);
        return $builder->selectSum('jumlah')->first()['jumlah'] ?? 0;
    }

    public function getPengeluaran($period = 'all', $userId = null)
    {
        $builder = $this->where('jenis', 'Pengeluaran');
        if ($userId)
            $builder->where('keuangan.user_id', $userId);
        $this->applyPeriodFilter($builder, $period);
        return $builder->selectSum('jumlah')->first()['jumlah'] ?? 0;
    }

    public function getMonthlyData($year = null, $userId = null)
    {
        if (!$year)
            $year = date('Y');
        if (!$userId)
            $userId = session()->get('userId');

        $result = [];
        for ($m = 1; $m <= 12; $m++) {
            $q = $this->where('jenis', 'Pemasukan')
                ->where('YEAR(tanggal)', $year)
                ->where('MONTH(tanggal)', $m);
            if ($userId)
                $q->where('keuangan.user_id', $userId);
            $pemasukan = $q->selectSum('jumlah')->first()['jumlah'] ?? 0;

            $q2 = $this->where('jenis', 'Pengeluaran')
                ->where('YEAR(tanggal)', $year)
                ->where('MONTH(tanggal)', $m);
            if ($userId)
                $q2->where('keuangan.user_id', $userId);
            $pengeluaran = $q2->selectSum('jumlah')->first()['jumlah'] ?? 0;

            $result[] = [
                'bulan' => $m,
                'pemasukan' => (float) $pemasukan,
                'pengeluaran' => (float) $pengeluaran,
                'profit' => (float) $pemasukan - (float) $pengeluaran,
            ];
        }
        return $result;
    }

    public function getTransactions($period = 'all')
    {
        $builder = $this->orderBy('tanggal', 'DESC');
        $this->applyPeriodFilter($builder, $period);
        return $builder->findAll();
    }

    protected function applyPeriodFilter($builder, $period)
    {
        if ($period === 'month') {
            $builder->where('MONTH(tanggal)', date('m'))
                ->where('YEAR(tanggal)', date('Y'));
        } elseif ($period === 'year') {
            $builder->where('YEAR(tanggal)', date('Y'));
        }
        return $builder;
    }
}
