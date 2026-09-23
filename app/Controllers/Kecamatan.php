<?php

namespace App\Controllers;

use App\Models\KecamatanModel;

class Kecamatan extends BaseController
{
    protected $kecamatanModel;

    public function __construct()
    {
        $this->kecamatanModel = new KecamatanModel();
    }


    // =========================
    // TAMPIL DATA KECAMATAN
    // =========================

    public function index()
    {
        $data = $this->kecamatanModel
            ->orderBy('nama_kecamatan', 'ASC')
            ->findAll();

        return view('kecamatan/index', [
            'title' => 'Forum Kecamatan Sehat',
            'data'  => $data
        ]);
    }


    // =========================
    // FORM TAMBAH KECAMATAN
    // =========================

    public function create()
    {
        return view('kecamatan/create', [
            'title' => 'Tambah Kecamatan'
        ]);
    }


    // =========================
    // SIMPAN KECAMATAN
    // =========================

    public function store()
    {
        $kode = $this->request->getPost('kode');
        $nama = $this->request->getPost('nama_kecamatan');


        // VALIDASI

        if (!$this->validate([
            'kode' => [
                'rules' => 'required'
            ],

            'nama_kecamatan' => [
                'rules' => 'required'
            ]

        ])) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Kode dan nama kecamatan wajib diisi.');
        }


        // SIMPAN

        $this->kecamatanModel->insert([
            'kode'            => $kode,
            'nama_kecamatan'  => $nama
        ]);


        return redirect()
            ->to(base_url('kecamatan'))
            ->with('success', 'Kecamatan berhasil ditambahkan.');
    }


    // =========================
    // HAPUS KECAMATAN
    // =========================

    public function delete($id)
    {
        $kecamatan = $this->kecamatanModel->find($id);


        if (!$kecamatan) {

            return redirect()
                ->to(base_url('kecamatan'))
                ->with('error', 'Data kecamatan tidak ditemukan.');
        }


        $this->kecamatanModel->delete($id);


        return redirect()
            ->to(base_url('kecamatan'))
            ->with('success', 'Kecamatan berhasil dihapus.');
    }
}