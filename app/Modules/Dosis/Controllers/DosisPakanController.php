<?php

namespace App\Modules\Dosis\Controllers;

use App\Controllers\BaseController;
use App\Modules\Dosis\Models\DosisPakanModel;
use App\Modules\Ternak\Models\TernakModel;
use App\Modules\Pakan\Models\PakanModel;

class DosisPakanController extends BaseController
{
    protected $dosisModel;
    protected $ternakModel;
    protected $pakanModel;

    public function __construct()
    {
        $this->dosisModel = new DosisPakanModel();
        $this->ternakModel = new TernakModel();
        $this->pakanModel = new PakanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dosis Pakan',
            'dosis' => $this->dosisModel->getWithRelations(),
        ];
        return view('App\Modules\Dosis\Views\index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Dosis Pakan',
            'ternak' => $this->ternakModel->where('status', 'Aktif')->findAll(),
            'pakan' => $this->pakanModel->findAll(),
        ];
        return view('App\Modules\Dosis\Views\form', $data);
    }

    public function store()
    {
        $rules = [
            'ternak_id' => 'required|integer',
            'pakan_id' => 'required|integer',
            'jumlah' => 'required|decimal',
            'frekuensi' => 'required|integer',
            'tanggal_mulai' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $this->dosisModel->save($postData);
        return redirect()->to('/dosis')->with('success', 'Dosis pakan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Dosis Pakan',
            'dosis' => $this->dosisModel->find($id),
            'ternak' => $this->ternakModel->where('status', 'Aktif')->findAll(),
            'pakan' => $this->pakanModel->findAll(),
        ];

        if (!$data['dosis']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Dosis tidak ditemukan');
        }

        return view('App\Modules\Dosis\Views\form', $data);
    }

    public function update($id)
    {
        $rules = [
            'ternak_id' => 'required|integer',
            'pakan_id' => 'required|integer',
            'jumlah' => 'required|decimal',
            'frekuensi' => 'required|integer',
            'tanggal_mulai' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['id'] = $id;
        $postData['user_id'] = session()->get('userId');
        $this->dosisModel->save($postData);
        return redirect()->to('/dosis')->with('success', 'Dosis pakan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->dosisModel->delete($id);
        return redirect()->to('/dosis')->with('success', 'Dosis pakan berhasil dihapus!');
    }
}
