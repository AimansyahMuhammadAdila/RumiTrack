<?php

namespace App\Controllers;

use App\Modules\Ternak\Models\TernakModel;
use App\Modules\Pakan\Models\PakanModel;
use App\Modules\Dosis\Models\DosisPakanModel;
use App\Modules\Pertumbuhan\Models\PertumbuhanModel;
use App\Modules\Kesehatan\Models\KesehatanModel;
use App\Modules\Kandang\Models\KandangModel;
use App\Modules\Peranakan\Models\PeranakanModel;
use App\Modules\Keuangan\Models\KeuanganModel;

class Home extends BaseController
{
    public function index(): string
    {
        $userId = session()->get('userId');
        $period = $this->request->getGet('period') ?? 'all';

        $keuanganModel = new KeuanganModel();
        $pemasukan = $keuanganModel->getPemasukan($period, $userId);
        $pengeluaran = (new KeuanganModel())->getPengeluaran($period, $userId);

        $data = [
            'title' => 'Dashboard',
            'period' => $period,
            // Keuangan
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'profit' => $pemasukan - $pengeluaran,
            // Kandang
            'totalKandang' => (new KandangModel())->where('user_id', $userId)->countAllResults(),
            'kandangList' => (new KandangModel())->getWithCount($userId),
            // Peranakan
            'totalPeranakan' => (new PeranakanModel())->where('user_id', $userId)->countAllResults(),
            'totalJantan' => (new PeranakanModel())->where('user_id', $userId)->where('jenis_kelamin', 'Jantan')->countAllResults(),
            'totalBetina' => (new PeranakanModel())->where('user_id', $userId)->where('jenis_kelamin', 'Betina')->countAllResults(),
            // Ternak
            'totalTernak' => (new TernakModel())->where('user_id', $userId)->countAllResults(),
            'ternakAktif' => (new TernakModel())->where('user_id', $userId)->where('status', 'Aktif')->countAllResults(),
            'ternakSakit' => (new TernakModel())->where('user_id', $userId)->where('status', 'Sakit')->countAllResults(),
            // Pakan
            'totalPakan' => (new PakanModel())->where('user_id', $userId)->countAllResults(),
        ];

        return view('dashboard', $data);
    }

    public function landing(): string
    {
        return view('landing');
    }

    public function login(): string
    {
        return view('login');
    }
}
