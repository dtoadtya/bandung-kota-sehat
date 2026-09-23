<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TimPembinaRencanaKerjaModel;

class TimPembinaRencanaKerja extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TimPembinaRencanaKerjaModel();
    }

    public function index()
    {
        $tahun = $this->request->getGet('tahun');

        $builder = $this->model
            ->orderBy('id', 'DESC');

        if ($tahun !== null && $tahun !== '') {
            $builder->where('tahun', $tahun);
        }

        $data = $builder->findAll();

        return view('tim_pembina_rencana_kerja/index', [
            'title' => 'Rencana Kerja Tim Pembina',
            'data'  => $data,
            'tahun' => $tahun
        ]);
    }

    public function create()
    {
        $tahun = $this->request->getGet('tahun');

        return view('tim_pembina_rencana_kerja/create', [
            'title' => 'Tambah Rencana Kerja',
            'tahun' => $tahun
        ]);
    }

    public function store()
    {
        $rules = [
            'tahun' => 'required|max_length[50]',
            'nama_kegiatan' => 'required|max_length[255]',
            'waktu_kegiatan' => 'required|valid_date[Y-m-d]',
            'peserta' => 'permit_empty|max_length[255]',
            'hasil_pelaksanaan' => 'permit_empty',
            'anggaran' => 'permit_empty|numeric',
            'sumber_pendanaan' => 'permit_empty|max_length[100]',
            'link_drive' => 'permit_empty|valid_url',
            'data_dukung' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $anggaran = $this->request->getPost('anggaran');

        $anggaran = str_replace('.', '', $anggaran);

        $this->model->insert([
            'tahun' => $this->request->getPost('tahun'),
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'waktu_kegiatan' => $this->request->getPost('waktu_kegiatan'),
            'peserta' => $this->request->getPost('peserta'),
            'hasil_pelaksanaan' => $this->request->getPost('hasil_pelaksanaan'),
            'anggaran' => $anggaran !== '' ? $anggaran : null,
            'sumber_pendanaan' => $this->request->getPost('sumber_pendanaan'),
            'link_drive' => $this->request->getPost('link_drive'),
            'data_dukung' => $this->request->getPost('data_dukung'),
        ]);

        return redirect()
            ->to(base_url('tim-pembina/rencana-kerja?tahun=' . $this->request->getPost('tahun')))
            ->with('success', 'Rencana kerja berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return redirect()
                ->to(base_url('tim-pembina/rencana-kerja'))
                ->with('error', 'Data rencana kerja tidak ditemukan.');
        }

        return view('tim_pembina_rencana_kerja/edit', [
            'title' => 'Edit Rencana Kerja',
            'data' => $data,
            'tahun' => $data['tahun'] ?? ''
        ]);
    }

    public function update($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return redirect()
                ->to(base_url('tim-pembina/rencana-kerja'))
                ->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'tahun' => 'required|max_length[50]',
            'nama_kegiatan' => 'required|max_length[255]',
            'waktu_kegiatan' => 'required|valid_date[Y-m-d]',
            'peserta' => 'permit_empty|max_length[255]',
            'hasil_pelaksanaan' => 'permit_empty',
            'anggaran' => 'permit_empty|numeric',
            'sumber_pendanaan' => 'permit_empty|max_length[100]',
            'link_drive' => 'permit_empty|valid_url',
            'data_dukung' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $anggaran = str_replace(
            '.',
            '',
            $this->request->getPost('anggaran')
        );

        $this->model->update($id, [
            'tahun' => $this->request->getPost('tahun'),
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'waktu_kegiatan' => $this->request->getPost('waktu_kegiatan'),
            'peserta' => $this->request->getPost('peserta'),
            'hasil_pelaksanaan' => $this->request->getPost('hasil_pelaksanaan'),
            'anggaran' => $anggaran !== '' ? $anggaran : null,
            'sumber_pendanaan' => $this->request->getPost('sumber_pendanaan'),
            'link_drive' => $this->request->getPost('link_drive'),
            'data_dukung' => $this->request->getPost('data_dukung'),
        ]);

        return redirect()
            ->to(base_url('tim-pembina/rencana-kerja?tahun=' . $this->request->getPost('tahun')))
            ->with('success', 'Rencana kerja berhasil diperbarui.');
    }

    public function delete($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return redirect()
                ->back()
                ->with('error', 'Data tidak ditemukan.');
        }

        $tahun = $data['tahun'] ?? '';

        $this->model->delete($id);

        return redirect()
            ->to(base_url('tim-pembina/rencana-kerja?tahun=' . $tahun))
            ->with('success', 'Rencana kerja berhasil dihapus.');
    }
}