<?php

namespace App\Controllers;

use App\Models\TimPembinaModel;

class TimPembina extends BaseController
{
    protected $timPembinaModel;

    public function __construct()
    {
        $this->timPembinaModel = new TimPembinaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tim Pembina',
            'data'  => $this->timPembinaModel->findAll()
        ];

        return view('tim_pembina/index', $data);
    }

    public function create()
    {
        return view('tim_pembina/create', [
            'title' => 'Tambah Tim Pembina'
        ]);
    }

    public function store()
    {
        $this->timPembinaModel->save([
            'nama'       => $this->request->getPost('nama'),
            'jabatan'    => $this->request->getPost('jabatan'),
            'keterangan' => $this->request->getPost('keterangan')
        ]);

        return redirect()->to('/tim-pembina')
            ->with('success', 'Data Tim Pembina berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = $this->timPembinaModel->find($id);

        if (!$data) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('tim_pembina/edit', [
            'title' => 'Edit Tim Pembina',
            'data'  => $data
        ]);
    }

    public function update($id)
    {
        $this->timPembinaModel->update($id, [
            'nama'       => $this->request->getPost('nama'),
            'jabatan'    => $this->request->getPost('jabatan'),
            'keterangan' => $this->request->getPost('keterangan')
        ]);

        return redirect()->to('/tim-pembina')
            ->with('success', 'Data Tim Pembina berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->timPembinaModel->delete($id);

        return redirect()->to('/tim-pembina')
            ->with('success', 'Data Tim Pembina berhasil dihapus.');
    }
}