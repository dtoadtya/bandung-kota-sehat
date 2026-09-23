<?php

namespace App\Controllers;

use App\Models\ForumBandungSehatModel;

class ForumBandungSehat extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ForumBandungSehatModel();
    }

    /**
     * Halaman utama Forum Bandung Sehat
     */
    public function index()
    {
        $data = $this->model
            ->orderBy('tahun', 'DESC')
            ->orderBy('tanggal', 'DESC')
            ->findAll();

        return view('forum_bandung_sehat/index', [
            'title' => 'Forum Bandung Sehat',
            'data'  => $data,
        ]);
    }

    /**
     * Halaman menu pilihan:
     * 1. SK
     * 2. Rencana Kerja
     * 3. Realisasi Kegiatan
     * 4. Foto Kegiatan
     */
    public function create()
    {
        return view('forum_bandung_sehat/create', [
            'title' => 'Menu Forum Bandung Sehat',
        ]);
    }

    /**
     * Method lama tetap dipertahankan agar route lama
     * tidak menyebabkan error.
     */
    public function store()
    {
        $rules = [
            'nama_kegiatan' => 'required|max_length[255]',
            'tahun'         => 'required|numeric',
            'tanggal'       => 'permit_empty|valid_date[Y-m-d]',
            'lokasi'        => 'permit_empty|max_length[255]',
            'keterangan'    => 'permit_empty',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'tahun'         => $this->request->getPost('tahun'),
            'tanggal'       => $this->request->getPost('tanggal'),
            'lokasi'        => $this->request->getPost('lokasi'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ];

        $this->model->insert($data);

        return redirect()
            ->to(site_url('forum-bandung-sehat'))
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Hapus data lama.
     */
    public function delete($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return redirect()
                ->to(site_url('forum-bandung-sehat'))
                ->with('error', 'Data tidak ditemukan.');
        }

        $this->model->delete($id);

        return redirect()
            ->to(site_url('forum-bandung-sehat'))
            ->with('success', 'Data berhasil dihapus.');
    }
}