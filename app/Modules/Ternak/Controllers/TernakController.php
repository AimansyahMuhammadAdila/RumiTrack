<?php

namespace App\Modules\Ternak\Controllers;

use App\Controllers\BaseController;
use App\Modules\Ternak\Models\TernakModel;

class TernakController extends BaseController
{
    protected $ternakModel;

    public function __construct()
    {
        $this->ternakModel = new TernakModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Ternak',
            'ternak' => $this->ternakModel->orderBy('created_at', 'DESC')->findAll(),
        ];
        return view('App\Modules\Ternak\Views\index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Ternak',
        ];
        return view('App\Modules\Ternak\Views\form', $data);
    }

    public function store()
    {
        $rules = [
            'kode_ternak' => 'required|max_length[20]|is_unique[ternak.kode_ternak]',
            'nama' => 'required|max_length[100]',
            'jenis' => 'required|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $this->ternakModel->save($postData);
        return redirect()->to('/ternak')->with('success', 'Data ternak berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Ternak',
            'ternak' => $this->ternakModel->find($id),
        ];

        if (!$data['ternak']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ternak tidak ditemukan');
        }

        return view('App\Modules\Ternak\Views\form', $data);
    }

    public function update($id)
    {
        $rules = [
            'kode_ternak' => "required|max_length[20]|is_unique[ternak.kode_ternak,id,{$id}]",
            'nama' => 'required|max_length[100]',
            'jenis' => 'required|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['id'] = $id;
        $postData['user_id'] = session()->get('userId');
        $this->ternakModel->save($postData);
        return redirect()->to('/ternak')->with('success', 'Data ternak berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->ternakModel->delete($id);
        return redirect()->to('/ternak')->with('success', 'Data ternak berhasil dihapus!');
    }
}
