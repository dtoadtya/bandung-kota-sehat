<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ForumKecamatanSehatRealisasiModel;
use App\Models\KecamatanModel;

class ForumKecamatanSehatRealisasi extends BaseController
{
    protected $model;
    protected $kecamatanModel;

    public function __construct()
    {
        $this->model = new ForumKecamatanSehatRealisasiModel();
        $this->kecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $tahun = $this->request->getGet('tahun');

        $builder = $this->model
            ->select('forum_kecamatan_sehat_realisasi.*, kecamatan.nama_kecamatan')
            ->join(
                'kecamatan',
                'kecamatan.id = forum_kecamatan_sehat_realisasi.kecamatan_id',
                'left'
            )
            ->orderBy('kecamatan.nama_kecamatan', 'ASC')
            ->orderBy('forum_kecamatan_sehat_realisasi.id', 'DESC');

        if ($tahun !== null && $tahun !== '') {
            $builder->where(
                'forum_kecamatan_sehat_realisasi.tahun',
                $tahun
            );
        }

        return view('forum_kecamatan_sehat_realisasi/index', [
            'title' => 'Realisasi Kegiatan Forum Kecamatan Sehat',
            'data' => $builder->findAll(),
            'tahun' => $tahun
        ]);
    }

    public function create()
    {
        return view('forum_kecamatan_sehat_realisasi/create', [
            'title' => 'Tambah Realisasi Kegiatan',
            'tahun' => $this->request->getGet('tahun'),
            'kecamatanList' => $this->kecamatanModel
                ->orderBy('nama_kecamatan', 'ASC')
                ->findAll()
        ]);
    }

    public function store()
    {
        if (!$this->validate([
            'kecamatan_id' => 'required|integer',
            'tahun' => 'required|max_length[50]',
            'nama_kegiatan' => 'required|max_length[255]',
            'waktu_kegiatan' => 'required|valid_date[Y-m-d]',
            'peserta' => 'permit_empty|max_length[255]',
            'hasil_pelaksanaan' => 'permit_empty',
            'anggaran' => 'permit_empty|numeric',
            'sumber_pendanaan' => 'permit_empty|max_length[100]',
            'link_drive' => 'permit_empty|valid_url',
            'data_dukung' => 'permit_empty'
        ])) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $anggaran = str_replace('.', '', $this->request->getPost('anggaran'));

        $this->model->insert([
            'kecamatan_id' => $this->request->getPost('kecamatan_id'),
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
            ->to(base_url(
                'forum-kecamatan-sehat/realisasi?tahun=' .
                $this->request->getPost('tahun')
            ))
            ->with('success', 'Realisasi kegiatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return redirect()->back()
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('forum_kecamatan_sehat_realisasi/edit', [
            'title' => 'Edit Realisasi Kegiatan',
            'data' => $data,
            'tahun' => $data['tahun'] ?? '',
            'kecamatanList' => $this->kecamatanModel
                ->orderBy('nama_kecamatan', 'ASC')
                ->findAll()
        ]);
    }

    public function update($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return redirect()->back()
                ->with('error', 'Data tidak ditemukan.');
        }

        if (!$this->validate([
            'kecamatan_id' => 'required|integer',
            'tahun' => 'required|max_length[50]',
            'nama_kegiatan' => 'required|max_length[255]',
            'waktu_kegiatan' => 'required|valid_date[Y-m-d]',
            'peserta' => 'permit_empty|max_length[255]',
            'hasil_pelaksanaan' => 'permit_empty',
            'anggaran' => 'permit_empty|numeric',
            'sumber_pendanaan' => 'permit_empty|max_length[100]',
            'link_drive' => 'permit_empty|valid_url',
            'data_dukung' => 'permit_empty'
        ])) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $anggaran = str_replace('.', '', $this->request->getPost('anggaran'));

        $this->model->update($id, [
            'kecamatan_id' => $this->request->getPost('kecamatan_id'),
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
            ->to(base_url(
                'forum-kecamatan-sehat/realisasi?tahun=' .
                $this->request->getPost('tahun')
            ))
            ->with('success', 'Realisasi kegiatan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return redirect()->back()
                ->with('error', 'Data tidak ditemukan.');
        }

        $tahun = $data['tahun'] ?? '';

        $this->model->delete($id);

        return redirect()
            ->to(base_url(
                'forum-kecamatan-sehat/realisasi?tahun=' . $tahun
            ))
            ->with('success', 'Realisasi kegiatan berhasil dihapus.');
    }
}