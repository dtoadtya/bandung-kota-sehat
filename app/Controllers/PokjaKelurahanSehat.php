<?php

namespace App\Controllers;

use App\Models\PokjaKelurahanSehatModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;

class PokjaKelurahanSehat extends BaseController
{
    protected $pokjaModel;
    protected $kecamatanModel;
    protected $kelurahanModel;

    public function __construct()
    {
        $this->pokjaModel = new PokjaKelurahanSehatModel();
        $this->kecamatanModel = new KecamatanModel();
        $this->kelurahanModel = new KelurahanModel();
    }

    /**
     * Halaman utama Pokja Kelurahan Sehat
     */
    public function index()
    {
        $dataPokja = $this->pokjaModel
            ->select(
                'pokja_kelurahan_sehat.*,
                 kelurahan.nama_kelurahan,
                 kecamatan.nama_kecamatan'
            )
            ->join(
                'kelurahan',
                'kelurahan.id = pokja_kelurahan_sehat.kelurahan_id',
                'left'
            )
            ->join(
                'kecamatan',
                'kecamatan.id = kelurahan.kecamatan_id',
                'left'
            )
            ->orderBy(
                'kecamatan.nama_kecamatan',
                'ASC'
            )
            ->orderBy(
                'kelurahan.nama_kelurahan',
                'ASC'
            )
            ->findAll();

        return view(
            'pokja_kelurahan_sehat/index',
            [
                'title' => 'Pokja Kelurahan Sehat',
                'dataPokja' => $dataPokja
            ]
        );
    }


    public function create()
    {
        return view(
            'pokja_kelurahan_sehat/create',
            [
                'title' => 'Pokja Kelurahan Sehat'
            ]
        );
    }

    /**
     * Ambil kelurahan berdasarkan kecamatan
     */
    public function getKelurahan($kecamatanId)
    {
        $kelurahan = $this->kelurahanModel
            ->where(
                'kecamatan_id',
                $kecamatanId
            )
            ->orderBy(
                'nama_kelurahan',
                'ASC'
            )
            ->findAll();

        return $this->response
            ->setJSON($kelurahan);
    }

    /**
     * Simpan data
     */
    public function store()
    {
        $rules = [
            'kelurahan_id' => 'required|integer',
            'nama_pokja' => 'required',
            'tahun' => 'required|integer',
            'ketua' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    implode(
                        '<br>',
                        $this->validator->getErrors()
                    )
                );
        }

        $data = [
            'kelurahan_id' => $this->request
                ->getPost('kelurahan_id'),

            'nama_pokja' => trim(
                (string) $this->request
                    ->getPost('nama_pokja')
            ),

            'tahun' => $this->request
                ->getPost('tahun'),

            'ketua' => trim(
                (string) $this->request
                    ->getPost('ketua')
            ),

            'keterangan' => trim(
                (string) $this->request
                    ->getPost('keterangan')
            ),
        ];

        $this->pokjaModel->insert($data);

        return redirect()
            ->to('/pokja-kelurahan-sehat')
            ->with(
                'success',
                'Data Pokja Kelurahan Sehat berhasil ditambahkan.'
            );
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        $data = $this->pokjaModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/pokja-kelurahan-sehat')
                ->with(
                    'error',
                    'Data Pokja tidak ditemukan.'
                );
        }

        $kecamatan = $this->kecamatanModel
            ->orderBy(
                'nama_kecamatan',
                'ASC'
            )
            ->findAll();

        $kelurahan = $this->kelurahanModel
            ->where(
                'kecamatan_id',
                $this->getKecamatanId(
                    $data['kelurahan_id']
                )
            )
            ->orderBy(
                'nama_kelurahan',
                'ASC'
            )
            ->findAll();

        return view(
            'pokja_kelurahan_sehat/form',
            [
                'title' => 'Edit Data Pokja Kelurahan Sehat',
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
                'data' => $data
            ]
        );
    }

    /**
     * Mendapatkan ID kecamatan dari kelurahan
     */
    protected function getKecamatanId($kelurahanId)
    {
        $kelurahan = $this->kelurahanModel
            ->find($kelurahanId);

        if (!$kelurahan) {
            return null;
        }

        return $kelurahan['kecamatan_id'];
    }

    /**
     * Update data
     */
    public function update($id)
    {
        $dataLama = $this->pokjaModel->find($id);

        if (!$dataLama) {
            return redirect()
                ->to('/pokja-kelurahan-sehat')
                ->with(
                    'error',
                    'Data Pokja tidak ditemukan.'
                );
        }

        $rules = [
            'kelurahan_id' => 'required|integer',
            'nama_pokja' => 'required',
            'tahun' => 'required|integer',
            'ketua' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    implode(
                        '<br>',
                        $this->validator->getErrors()
                    )
                );
        }

        $data = [
            'kelurahan_id' => $this->request
                ->getPost('kelurahan_id'),

            'nama_pokja' => trim(
                (string) $this->request
                    ->getPost('nama_pokja')
            ),

            'tahun' => $this->request
                ->getPost('tahun'),

            'ketua' => trim(
                (string) $this->request
                    ->getPost('ketua')
            ),

            'keterangan' => trim(
                (string) $this->request
                    ->getPost('keterangan')
            ),
        ];

        $this->pokjaModel->update(
            $id,
            $data
        );

        return redirect()
            ->to('/pokja-kelurahan-sehat')
            ->with(
                'success',
                'Data Pokja Kelurahan Sehat berhasil diperbarui.'
            );
    }

    /**
     * Hapus data
     */
    public function delete($id)
    {
        $data = $this->pokjaModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/pokja-kelurahan-sehat')
                ->with(
                    'error',
                    'Data Pokja tidak ditemukan.'
                );
        }

        $this->pokjaModel->delete($id);

        return redirect()
            ->to('/pokja-kelurahan-sehat')
            ->with(
                'success',
                'Data Pokja Kelurahan Sehat berhasil dihapus.'
            );
    }
}