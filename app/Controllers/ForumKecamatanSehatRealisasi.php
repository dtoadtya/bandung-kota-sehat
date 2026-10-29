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
        return view('forum_kecamatan_sehat_realisasi/index', [
            'title' => 'Realisasi Kegiatan Forum Kecamatan Sehat',
        ]);
    }

    /**
     * Halaman data realisasi kegiatan berdasarkan periode
     * tahun ganjil / tahun genap.
     */
    public function periode($periode)
    {
        if (!in_array($periode, ['ganjil', 'genap'], true)) {
            return redirect()
                ->to('/forum-kecamatan-sehat/realisasi')
                ->with('error', 'Periode tidak valid.');
        }

        $tahun = $this->tahunFromPeriode($periode);

        $data = $this->filterByUser($this->model)
            ->select('forum_kecamatan_sehat_realisasi.*, kecamatan.nama_kecamatan')
            ->join(
                'kecamatan',
                'kecamatan.id = forum_kecamatan_sehat_realisasi.kecamatan_id',
                'left'
            )
            ->where('forum_kecamatan_sehat_realisasi.tahun', $tahun)
            ->orderBy('kecamatan.nama_kecamatan', 'ASC')
            ->orderBy('forum_kecamatan_sehat_realisasi.id', 'DESC')
            ->findAll();

        return view('forum_kecamatan_sehat_realisasi/periode', [
            'title' => 'Realisasi Kegiatan Forum Kecamatan Sehat',
            'periode' => $periode,
            'tahun' => $tahun,
            'data' => $data,
        ]);
    }

    private function tahunFromPeriode(string $periode): string
    {
        return $periode === 'genap' ? 'Genap' : 'Ganjil';
    }

    private function periodeFromTahun($tahun): string
    {
        return strtolower((string) $tahun) === 'genap'
            ? 'genap'
            : 'ganjil';
    }

    /**
     * Kecamatan untuk data realisasi:
     * admin memilih melalui form, user kecamatan
     * diambil dari akun yang login.
     */
    private function kecamatanIdFromRequest(): ?int
    {
        if ($this->isAdminUser()) {
            $posted = $this->request->getPost('kecamatan_id');

            if (!empty($posted)) {
                return (int) $posted;
            }
        }

        $kecamatan = $this->userKecamatan();

        return $kecamatan ? (int) $kecamatan['id'] : null;
    }

    public function create()
    {
        $periode = $this->request->getGet('periode');

        if (!in_array($periode, ['ganjil', 'genap'], true)) {
            $periode = null;
        }

        $tahun = $this->request->getGet('tahun');

        if ($periode) {
            $tahun = $this->tahunFromPeriode($periode);
        } elseif (in_array($tahun, ['Ganjil', 'Genap'], true)) {
            $periode = $this->periodeFromTahun($tahun);
        }

        /*
         * Periode ditentukan pada halaman awal
         * (pilihan Tahun Ganjil / Tahun Genap).
         */
        if (!$periode) {
            return redirect()
                ->to('/forum-kecamatan-sehat/realisasi')
                ->with('error', 'Pilih terlebih dahulu Tahun Ganjil atau Tahun Genap.');
        }

        return view('forum_kecamatan_sehat_realisasi/create', [
            'title' => 'Tambah Realisasi Kegiatan',
            'periode' => $periode,
            'tahun' => $tahun,
            'kecamatanList' => $this->kecamatanModel
                ->orderBy('nama_kecamatan', 'ASC')
                ->findAll()
        ]);
    }

    public function store()
    {
        if (!$this->validate([
            'kecamatan_id' => 'permit_empty|integer',
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

        $kecamatanId = $this->kecamatanIdFromRequest();

        if ($kecamatanId === null) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Kecamatan akun pengguna tidak ditemukan.');
        }

        $anggaran = str_replace('.', '', $this->request->getPost('anggaran'));

        $this->model->insert([
            'user_id' => $this->currentUserId(),
            'kecamatan_id' => $kecamatanId,
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
                'forum-kecamatan-sehat/realisasi/'
                . $this->periodeFromTahun($this->request->getPost('tahun'))
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
            'periode' => $this->periodeFromTahun($data['tahun'] ?? ''),
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
            'kecamatan_id' => 'permit_empty|integer',
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

        $kecamatanId = $this->kecamatanIdFromRequest()
            ?? (int) ($data['kecamatan_id'] ?? 0);

        if ($kecamatanId <= 0) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Kecamatan akun pengguna tidak ditemukan.');
        }

        $anggaran = str_replace('.', '', $this->request->getPost('anggaran'));

        $this->model->update($id, [
            'kecamatan_id' => $kecamatanId,
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
                'forum-kecamatan-sehat/realisasi/'
                . $this->periodeFromTahun($this->request->getPost('tahun'))
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

        $periode = $this->periodeFromTahun($data['tahun'] ?? '');

        $this->model->delete($id);

        return redirect()
            ->to(base_url(
                'forum-kecamatan-sehat/realisasi/' . $periode
            ))
            ->with('success', 'Realisasi kegiatan berhasil dihapus.');
    }
}