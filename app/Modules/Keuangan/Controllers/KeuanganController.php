<?php

namespace App\Modules\Keuangan\Controllers;

use App\Controllers\BaseController;
use App\Modules\Keuangan\Models\KeuanganModel;

class KeuanganController extends BaseController
{
    protected $keuanganModel;

    public function __construct()
    {
        $this->keuanganModel = new KeuanganModel();
    }

    public function index()
    {
        $period = $this->request->getGet('period') ?? 'all';
        $userId = session()->get('userId');

        $pemasukan = $this->keuanganModel->getPemasukan($period, $userId);
        $pengeluaran = (new KeuanganModel())->getPengeluaran($period, $userId);

        $data = [
            'title' => 'Keuangan',
            'period' => $period,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'profit' => $pemasukan - $pengeluaran,
            'monthlyData' => json_encode((new KeuanganModel())->getMonthlyData(null, $userId)),
            'transactions' => (new KeuanganModel())->getTransactions($period),
        ];
        return view('App\Modules\Keuangan\Views\index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Transaksi',
        ];
        return view('App\Modules\Keuangan\Views\form', $data);
    }

    public function store()
    {
        $rules = [
            'tanggal' => 'required|valid_date',
            'jenis' => 'required|in_list[Pemasukan,Pengeluaran]',
            'jumlah' => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $this->keuanganModel->save($postData);
        return redirect()->to('/keuangan')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Transaksi',
            'keuangan' => $this->keuanganModel->find($id),
        ];

        if (!$data['keuangan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan');
        }

        return view('App\Modules\Keuangan\Views\form', $data);
    }

    public function update($id)
    {
        $rules = [
            'tanggal' => 'required|valid_date',
            'jenis' => 'required|in_list[Pemasukan,Pengeluaran]',
            'jumlah' => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['id'] = $id;
        $postData['user_id'] = session()->get('userId');
        $this->keuanganModel->save($postData);
        return redirect()->to('/keuangan')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->keuanganModel->delete($id);
        return redirect()->to('/keuangan')->with('success', 'Transaksi berhasil dihapus!');
    }
}
