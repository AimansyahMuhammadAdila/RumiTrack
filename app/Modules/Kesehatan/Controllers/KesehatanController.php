<?php

namespace App\Modules\Kesehatan\Controllers;

use App\Controllers\BaseController;
use App\Modules\Kesehatan\Models\KesehatanModel;
use App\Modules\Ternak\Models\TernakModel;
use CodeIgniter\Model;

class KesehatanController extends BaseController
{
    protected $kesehatanModel;
    protected $ternakModel;

    public function __construct()
    {
        $this->kesehatanModel = new KesehatanModel();
        $this->ternakModel = new TernakModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();

        // Vaksin data
        $vaksin = [];
        if ($db->tableExists('vaksin')) {
            $builder = $db->table('vaksin')
                ->select('vaksin.*, ternak.nama as nama_ternak, ternak.kode_ternak')
                ->join('ternak', 'ternak.id = vaksin.ternak_id')
                ->orderBy('vaksin.tanggal', 'DESC');
            if (session()->get('userId')) {
                $builder->where('vaksin.user_id', session()->get('userId'));
            }
            $vaksin = $builder->get()->getResultArray();
        }

        // Pengobatan data
        $pengobatan = [];
        if ($db->tableExists('pengobatan')) {
            $builder = $db->table('pengobatan')
                ->select('pengobatan.*, ternak.nama as nama_ternak, ternak.kode_ternak')
                ->join('ternak', 'ternak.id = pengobatan.ternak_id')
                ->orderBy('pengobatan.tanggal', 'DESC');
            if (session()->get('userId')) {
                $builder->where('pengobatan.user_id', session()->get('userId'));
            }
            $pengobatan = $builder->get()->getResultArray();
        }

        // Rutinan / stats
        $totalTernak = $this->ternakModel->countAll();
        $totalSakit = $this->ternakModel->where('status', 'Sakit')->countAllResults();
        $totalPemulihan = $this->kesehatanModel->where('kondisi', 'Dalam Perawatan')->countAllResults();

        $data = [
            'title' => 'Kesehatan',
            'kesehatan' => $this->kesehatanModel->getWithTernak(),
            'vaksin' => $vaksin,
            'pengobatan' => $pengobatan,
            'ternakList' => $this->ternakModel->findAll(),
            'totalTernak' => $totalTernak,
            'totalSakit' => $totalSakit,
            'totalPemulihan' => $totalPemulihan,
            'totalSehat' => $totalTernak - $totalSakit,
        ];
        return view('App\Modules\Kesehatan\Views\index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Catatan Kesehatan',
            'ternak' => $this->ternakModel->findAll(),
        ];
        return view('App\Modules\Kesehatan\Views\form', $data);
    }

    public function store()
    {
        $rules = [
            'ternak_id' => 'required|integer',
            'tanggal' => 'required|valid_date',
            'kondisi' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $this->kesehatanModel->save($postData);
        return redirect()->to('/kesehatan')->with('success', 'Catatan kesehatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Catatan Kesehatan',
            'kesehatan' => $this->kesehatanModel->find($id),
            'ternak' => $this->ternakModel->findAll(),
        ];

        if (!$data['kesehatan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kesehatan tidak ditemukan');
        }

        return view('App\Modules\Kesehatan\Views\form', $data);
    }

    public function update($id)
    {
        $rules = [
            'ternak_id' => 'required|integer',
            'tanggal' => 'required|valid_date',
            'kondisi' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postData = $this->request->getPost();
        $postData['id'] = $id;
        $postData['user_id'] = session()->get('userId');
        $this->kesehatanModel->save($postData);
        return redirect()->to('/kesehatan')->with('success', 'Catatan kesehatan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->kesehatanModel->delete($id);
        return redirect()->to('/kesehatan')->with('success', 'Catatan kesehatan berhasil dihapus!');
    }

    // Vaksin
    public function storeVaksin()
    {
        $rules = [
            'ternak_id' => 'required|integer',
            'jenis_vaksin' => 'required|max_length[100]',
            'dosis' => 'required|max_length[50]',
            'tanggal' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $db->table('vaksin')->insert($postData);
        return redirect()->to('/kesehatan')->with('success', 'Data vaksin berhasil ditambahkan!');
    }

    public function deleteVaksin($id)
    {
        $db = \Config\Database::connect();
        $db->table('vaksin')->where('id', $id)->delete();
        return redirect()->to('/kesehatan')->with('success', 'Data vaksin berhasil dihapus!');
    }

    // Pengobatan
    public function storePengobatan()
    {
        $rules = [
            'ternak_id' => 'required|integer',
            'jenis_pengobatan' => 'required|max_length[100]',
            'dosis' => 'required|max_length[50]',
            'tanggal' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $postData = $this->request->getPost();
        $postData['user_id'] = session()->get('userId');
        $db->table('pengobatan')->insert($postData);
        return redirect()->to('/kesehatan')->with('success', 'Data pengobatan berhasil ditambahkan!');
    }

    public function deletePengobatan($id)
    {
        $db = \Config\Database::connect();
        $db->table('pengobatan')->where('id', $id)->delete();
        return redirect()->to('/kesehatan')->with('success', 'Data pengobatan berhasil dihapus!');
    }
}
