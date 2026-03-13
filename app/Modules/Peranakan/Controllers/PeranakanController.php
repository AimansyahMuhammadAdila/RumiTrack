<?php

namespace App\Modules\Peranakan\Controllers;

use App\Controllers\BaseController;
use App\Modules\Peranakan\Models\PeranakanModel;
use App\Modules\Kandang\Models\KandangModel;

class PeranakanController extends BaseController
{
    protected $peranakanModel;
    protected $kandangModel;

    public function __construct()
    {
        $this->peranakanModel = new PeranakanModel();
        $this->kandangModel = new KandangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Peranakan',
            'peranakan' => $this->peranakanModel->getWithKandang(),
            'totalJantan' => $this->peranakanModel->countByGender('Jantan'),
            'totalBetina' => $this->peranakanModel->countByGender('Betina'),
        ];
        return view('App\Modules\Peranakan\Views\index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Peranakan',
            'kandangList' => $this->kandangModel->findAll(),
        ];
        return view('App\Modules\Peranakan\Views\form', $data);
    }

    public function store()
    {
        $rules = [
            'kandang_id' => 'required|integer',
            'kode_ternak' => 'required|max_length[20]',
            'jenis_ruminan' => 'required|max_length[50]',
            'jenis_kelamin' => 'required|in_list[Jantan,Betina]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $this->peranakanModel->save($postData);
        return redirect()->to('/peranakan')->with('success', 'Data peranakan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Peranakan',
            'peranakan' => $this->peranakanModel->find($id),
            'kandangList' => $this->kandangModel->findAll(),
        ];

        if (!$data['peranakan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Peranakan tidak ditemukan');
        }

        return view('App\Modules\Peranakan\Views\form', $data);
    }

    public function update($id)
    {
        $rules = [
            'kandang_id' => 'required|integer',
            'kode_ternak' => 'required|max_length[20]',
            'jenis_ruminan' => 'required|max_length[50]',
            'jenis_kelamin' => 'required|in_list[Jantan,Betina]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['id'] = $id;
        $postData['user_id'] = session()->get('userId');
        $this->peranakanModel->save($postData);
        return redirect()->to('/peranakan')->with('success', 'Data peranakan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->peranakanModel->delete($id);
        return redirect()->to('/peranakan')->with('success', 'Data peranakan berhasil dihapus!');
    }
}
