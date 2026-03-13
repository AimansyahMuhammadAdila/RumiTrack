<?php

namespace App\Modules\CatatanRekomendasi\Controllers;

use App\Controllers\BaseController;
use App\Modules\CatatanRekomendasi\Models\CatatanRekomendasiModel;

class CatatanRekomendasiController extends BaseController
{
    protected $catatanModel;

    public function __construct()
    {
        $this->catatanModel = new CatatanRekomendasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Catatan Rekomendasi',
            'catatan' => $this->catatanModel->getAll(),
        ];
        return view('App\Modules\CatatanRekomendasi\Views\index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Catatan Rekomendasi',
        ];
        return view('App\Modules\CatatanRekomendasi\Views\form', $data);
    }

    public function store()
    {
        $rules = [
            'bulan' => 'required|integer|greater_than[0]|less_than[13]',
            'tahun' => 'required|integer|greater_than[2020]',
            'kesimpulan' => 'required|in_list[Baik,Cukup Baik,Obesitas,Kekurangan Nutrisi,Inbreeding,Lainnya]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $this->catatanModel->save($postData);
        return redirect()->to('/catatan-rekomendasi')->with('success', 'Catatan rekomendasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Catatan Rekomendasi',
            'catatan' => $this->catatanModel->find($id),
        ];

        if (!$data['catatan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Catatan tidak ditemukan');
        }

        return view('App\Modules\CatatanRekomendasi\Views\form', $data);
    }

    public function update($id)
    {
        $rules = [
            'bulan' => 'required|integer|greater_than[0]|less_than[13]',
            'tahun' => 'required|integer|greater_than[2020]',
            'kesimpulan' => 'required|in_list[Baik,Cukup Baik,Obesitas,Kekurangan Nutrisi,Inbreeding,Lainnya]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['id'] = $id;
        $postData['user_id'] = session()->get('userId');
        $this->catatanModel->save($postData);
        return redirect()->to('/catatan-rekomendasi')->with('success', 'Catatan rekomendasi berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->catatanModel->delete($id);
        return redirect()->to('/catatan-rekomendasi')->with('success', 'Catatan rekomendasi berhasil dihapus!');
    }
}
