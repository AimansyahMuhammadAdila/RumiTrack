<?php

namespace App\Modules\Kandang\Controllers;

use App\Controllers\BaseController;
use App\Modules\Kandang\Models\KandangModel;

class KandangController extends BaseController
{
    protected $kandangModel;

    public function __construct()
    {
        $this->kandangModel = new KandangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kandang',
            'kandang' => $this->kandangModel->getWithCount(),
        ];
        return view('App\Modules\Kandang\Views\index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kandang',
        ];
        return view('App\Modules\Kandang\Views\form', $data);
    }

    public function store()
    {
        $rules = [
            'nama_kandang' => 'required|max_length[100]',
            'jenis_ruminan' => 'required|max_length[50]',
            'kode_kandang' => 'required|max_length[20]|is_unique[kandang.kode_kandang]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $this->kandangModel->save($postData);
        return redirect()->to('/kandang')->with('success', 'Data kandang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Kandang',
            'kandang' => $this->kandangModel->find($id),
        ];

        if (!$data['kandang']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kandang tidak ditemukan');
        }

        return view('App\Modules\Kandang\Views\form', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_kandang' => 'required|max_length[100]',
            'jenis_ruminan' => 'required|max_length[50]',
            'kode_kandang' => "required|max_length[20]|is_unique[kandang.kode_kandang,id,{$id}]",
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['id'] = $id;
        $postData['user_id'] = session()->get('userId');
        $this->kandangModel->save($postData);
        return redirect()->to('/kandang')->with('success', 'Data kandang berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->kandangModel->delete($id);
        return redirect()->to('/kandang')->with('success', 'Data kandang berhasil dihapus!');
    }
}
