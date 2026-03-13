<?php

namespace App\Modules\Pakan\Controllers;

use App\Controllers\BaseController;
use App\Modules\Pakan\Models\PakanModel;
use App\Modules\Pakan\Models\PengeluaranPakanModel;

class PakanController extends BaseController
{
    protected $pakanModel;
    protected $pengeluaranModel;

    public function __construct()
    {
        $this->pakanModel = new PakanModel();
        $this->pengeluaranModel = new PengeluaranPakanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pakan',
            'pakan' => $this->pakanModel->orderBy('created_at', 'DESC')->findAll(),
            'pengeluaran' => $this->pengeluaranModel->getWithPakan(),
            'pakanList' => $this->pakanModel->findAll(),
        ];
        return view('App\Modules\Pakan\Views\index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pakan',
        ];
        return view('App\Modules\Pakan\Views\form', $data);
    }

    public function store()
    {
        $rules = [
            'nama_pakan' => 'required|max_length[100]',
            'jenis' => 'required|max_length[50]',
            'satuan' => 'required|max_length[20]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $this->pakanModel->save($postData);
        return redirect()->to('/pakan')->with('success', 'Data pakan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pakan',
            'pakan' => $this->pakanModel->find($id),
        ];

        if (!$data['pakan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pakan tidak ditemukan');
        }

        return view('App\Modules\Pakan\Views\form', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_pakan' => 'required|max_length[100]',
            'jenis' => 'required|max_length[50]',
            'satuan' => 'required|max_length[20]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['id'] = $id;
        $postData['user_id'] = session()->get('userId');
        $this->pakanModel->save($postData);
        return redirect()->to('/pakan')->with('success', 'Data pakan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->pakanModel->delete($id);
        return redirect()->to('/pakan')->with('success', 'Data pakan berhasil dihapus!');
    }

    // Pengeluaran Pakan
    public function pengeluaran()
    {
        return redirect()->to('/pakan');
    }

    public function storePengeluaran()
    {
        $rules = [
            'pakan_id' => 'required|integer',
            'jumlah' => 'required|decimal',
            'tanggal' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $this->pengeluaranModel->save($postData);

        // Update stok pakan
        $pakan = $this->pakanModel->find($this->request->getPost('pakan_id'));
        if ($pakan) {
            $newStok = $pakan['stok'] - $this->request->getPost('jumlah');
            $this->pakanModel->update($pakan['id'], ['stok' => max(0, $newStok)]);
        }

        return redirect()->to('/pakan')->with('success', 'Pengeluaran pakan berhasil dicatat!');
    }

    public function deletePengeluaran($id)
    {
        $this->pengeluaranModel->delete($id);
        return redirect()->to('/pakan')->with('success', 'Data pengeluaran berhasil dihapus!');
    }
}
