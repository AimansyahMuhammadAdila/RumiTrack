<?php

namespace App\Modules\Pertumbuhan\Controllers;

use App\Controllers\BaseController;
use App\Modules\Pertumbuhan\Models\PertumbuhanModel;
use App\Modules\Ternak\Models\TernakModel;

class PertumbuhanController extends BaseController
{
    protected $pertumbuhanModel;
    protected $ternakModel;

    public function __construct()
    {
        $this->pertumbuhanModel = new PertumbuhanModel();
        $this->ternakModel = new TernakModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pertumbuhan',
            'pertumbuhan' => $this->pertumbuhanModel->getWithTernak(),
        ];
        return view('App\Modules\Pertumbuhan\Views\index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pertumbuhan',
            'ternak' => $this->ternakModel->where('status', 'Aktif')->findAll(),
        ];
        return view('App\Modules\Pertumbuhan\Views\form', $data);
    }

    public function store()
    {
        $rules = [
            'ternak_id' => 'required|integer',
            'tanggal' => 'required|valid_date',
            'berat' => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $this->pertumbuhanModel->save($postData);
        return redirect()->to('/pertumbuhan')->with('success', 'Data pertumbuhan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Pertumbuhan',
            'pertumbuhan' => $this->pertumbuhanModel->find($id),
            'ternak' => $this->ternakModel->where('status', 'Aktif')->findAll(),
        ];

        if (!$data['pertumbuhan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pertumbuhan tidak ditemukan');
        }

        return view('App\Modules\Pertumbuhan\Views\form', $data);
    }

    public function update($id)
    {
        $rules = [
            'ternak_id' => 'required|integer',
            'tanggal' => 'required|valid_date',
            'berat' => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['id'] = $id;
        $postData['user_id'] = session()->get('userId');
        $this->pertumbuhanModel->save($postData);
        return redirect()->to('/pertumbuhan')->with('success', 'Data pertumbuhan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->pertumbuhanModel->delete($id);
        return redirect()->to('/pertumbuhan')->with('success', 'Data pertumbuhan berhasil dihapus!');
    }
}
