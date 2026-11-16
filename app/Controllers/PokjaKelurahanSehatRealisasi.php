<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PokjaKelurahanSehatRealisasiModel;

class PokjaKelurahanSehatRealisasi extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PokjaKelurahanSehatRealisasiModel();
    }

    public function index()
    {
        return view('pokja_kelurahan_sehat_realisasi/index', [
            'title' => 'Realisasi Kegiatan Pokja Kelurahan Sehat',
        ]);
    }

    public function periode($periode)
    {
        if (!in_array($periode, ['ganjil', 'genap'], true)) {
            return redirect()
                ->to('/pokja-kelurahan-sehat/realisasi')
                ->with('error', 'Periode tidak valid.');
        }

        $tahun = $periode === 'ganjil' ? 'Ganjil' : 'Genap';

        $data = $this->filterByUser($this->model)
            ->select(
                'pokja_kelurahan_sehat_realisasi.*,
                 kelurahan.nama_kelurahan,
                 kecamatan.nama_kecamatan'
            )
            ->join(
                'kelurahan',
                'kelurahan.id = pokja_kelurahan_sehat_realisasi.kelurahan_id',
                'left'
            )
            ->join(
                'kecamatan',
                'kecamatan.id = kelurahan.kecamatan_id',
                'left'
            )
            ->where(
                'pokja_kelurahan_sehat_realisasi.tahun',
                $tahun
            )
            ->orderBy('kecamatan.nama_kecamatan', 'ASC')
            ->orderBy('kelurahan.nama_kelurahan', 'ASC')
            ->orderBy(
                'pokja_kelurahan_sehat_realisasi.id',
                'DESC'
            )
            ->findAll();

        return view('pokja_kelurahan_sehat_realisasi/periode', [
            'title' => 'Realisasi Kegiatan Pokja Kelurahan Sehat - '
                . 'Tahun ' . $tahun,
            'periode' => $periode,
            'tahun' => $tahun,
            'data' => $data,
        ]);
    }

    /**
     * URL periode dari nilai tahun.
     */
    private function periodeDariTahun($tahun): string
    {
        $nilai = strtolower(trim((string) $tahun));

        if (!in_array($nilai, ['ganjil', 'genap'], true)) {
            return '';
        }

        return '/' . $nilai;
    }

    public function create()
    {
        $tahun = $this->request->getGet('tahun');

        if (!in_array($tahun, ['Ganjil', 'Genap'], true)) {
            return redirect()
                ->to('/pokja-kelurahan-sehat/realisasi')
                ->with(
                    'error',
                    'Pilih terlebih dahulu Tahun Ganjil atau Tahun Genap.'
                );
        }

        $kelurahan = $this->userKelurahan();
        $isAdmin = $this->isAdminUser();

        if (!$kelurahan && !$isAdmin) {
            return redirect()
                ->to('/pokja-kelurahan-sehat/realisasi')
                ->with(
                    'error',
                    'Hanya akun kelurahan yang dapat menambah data realisasi kegiatan.'
                );
        }

        $viewData = [
            'title' => 'Tambah Realisasi Kegiatan',
            'tahun' => $tahun,
            'isAdmin' => $isAdmin,
        ];

        /*
         * Admin tidak memiliki kelurahan,
         * jadi admin memilih melalui dropdown.
         */
        if ($isAdmin) {
            $viewData['kelurahanList'] = $this->kelurahanModel
                ->select('kelurahan.*, kecamatan.nama_kecamatan')
                ->join(
                    'kecamatan',
                    'kecamatan.id = kelurahan.kecamatan_id',
                    'left'
                )
                ->orderBy('kecamatan.nama_kecamatan', 'ASC')
                ->orderBy('kelurahan.nama_kelurahan', 'ASC')
                ->findAll();
        }

        return view(
            'pokja_kelurahan_sehat_realisasi/create',
            $viewData
        );
    }

    public function store()
    {
        $kelurahan = $this->userKelurahan();
        $isAdmin = $this->isAdminUser();

        if (!$kelurahan && !$isAdmin) {
            return redirect()
                ->to('/pokja-kelurahan-sehat/realisasi')
                ->with(
                    'error',
                    'Hanya akun kelurahan yang dapat menambah data realisasi kegiatan.'
                );
        }

        $rules = [
            'tahun' => 'required|in_list[Ganjil,Genap]',
            'nama_kegiatan' => 'required|max_length[255]',
            'waktu_kegiatan' => 'required|valid_date[Y-m-d]',
            'peserta' => 'permit_empty|max_length[255]',
            'hasil_pelaksanaan' => 'permit_empty',
            'anggaran' => 'permit_empty|numeric',
            'sumber_pendanaan' => 'permit_empty|max_length[100]',
            'link_drive' => 'permit_empty|valid_url',
            'data_dukung' => 'permit_empty'
        ];

        /*
         * Admin memilih kelurahan melalui form.
         */
        if ($isAdmin) {
            $rules['kelurahan_id'] = 'required|integer';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        if ($isAdmin) {
            $kelurahanId = (int) $this->request->getPost('kelurahan_id');
        } else {
            $kelurahanId = (int) $kelurahan['id'];
        }

        $anggaran = str_replace('.', '', $this->request->getPost('anggaran'));

        $this->model->insert([
            'user_id' => $this->currentUserId(),
            'kelurahan_id' => $kelurahanId,
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
            ->to('/pokja-kelurahan-sehat/realisasi'
                . $this->periodeDariTahun($this->request->getPost('tahun')))
            ->with('success', 'Realisasi kegiatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return redirect()->back()
                ->with('error', 'Data tidak ditemukan.');
        }

        $kelurahan = $this->userKelurahan();
        $isAdmin = $this->isAdminUser();

        if (!$kelurahan && !$isAdmin) {
            return redirect()
                ->to('/pokja-kelurahan-sehat/realisasi')
                ->with(
                    'error',
                    'Hanya akun kelurahan yang dapat mengubah data realisasi kegiatan.'
                );
        }

        $viewData = [
            'title' => 'Edit Realisasi Kegiatan',
            'data' => $data,
            'tahun' => $data['tahun'] ?? '',
            'isAdmin' => $isAdmin,
        ];

        if ($isAdmin) {
            $viewData['kelurahanList'] = $this->kelurahanModel
                ->select('kelurahan.*, kecamatan.nama_kecamatan')
                ->join(
                    'kecamatan',
                    'kecamatan.id = kelurahan.kecamatan_id',
                    'left'
                )
                ->orderBy('kecamatan.nama_kecamatan', 'ASC')
                ->orderBy('kelurahan.nama_kelurahan', 'ASC')
                ->findAll();
        }

        return view(
            'pokja_kelurahan_sehat_realisasi/edit',
            $viewData
        );
    }

    public function update($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return redirect()->back()
                ->with('error', 'Data tidak ditemukan.');
        }

        $kelurahan = $this->userKelurahan();
        $isAdmin = $this->isAdminUser();

        if (!$kelurahan && !$isAdmin) {
            return redirect()
                ->to('/pokja-kelurahan-sehat/realisasi')
                ->with(
                    'error',
                    'Hanya akun kelurahan yang dapat mengubah data realisasi kegiatan.'
                );
        }

        $rules = [
            'tahun' => 'required|in_list[Ganjil,Genap]',
            'nama_kegiatan' => 'required|max_length[255]',
            'waktu_kegiatan' => 'required|valid_date[Y-m-d]',
            'peserta' => 'permit_empty|max_length[255]',
            'hasil_pelaksanaan' => 'permit_empty',
            'anggaran' => 'permit_empty|numeric',
            'sumber_pendanaan' => 'permit_empty|max_length[100]',
            'link_drive' => 'permit_empty|valid_url',
            'data_dukung' => 'permit_empty'
        ];

        if ($isAdmin) {
            $rules['kelurahan_id'] = 'required|integer';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        if ($isAdmin) {
            $kelurahanId = (int) $this->request->getPost('kelurahan_id');
        } else {
            $kelurahanId = (int) $kelurahan['id'];
        }

        $anggaran = str_replace('.', '', $this->request->getPost('anggaran'));

        $this->model->update($id, [
            'kelurahan_id' => $kelurahanId,
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
            ->to('/pokja-kelurahan-sehat/realisasi'
                . $this->periodeDariTahun($this->request->getPost('tahun')))
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
            ->to('/pokja-kelurahan-sehat/realisasi'
                . $this->periodeDariTahun($tahun))
            ->with('success', 'Realisasi kegiatan berhasil dihapus.');
    }
}