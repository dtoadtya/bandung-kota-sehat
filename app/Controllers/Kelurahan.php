<?php

namespace App\Controllers;

use App\Models\KelurahanModel;
use App\Models\KecamatanModel;

class Kelurahan extends BaseController
{
    protected $kelurahanModel;
    protected $kecamatanModel;

    public function __construct()
    {
        $this->kelurahanModel = new KelurahanModel();
        $this->kecamatanModel = new KecamatanModel();
    }


    // =========================
    // DATA POKJA PER KELURAHAN
    // =========================

    public function index()
    {
        $pokja = db_connect()
            ->table('pokja_kelurahan_sehat')
            ->select(
                'pokja_kelurahan_sehat.*, '
                . 'kelurahan.nama_kelurahan, '
                . 'kecamatan.nama_kecamatan'
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
            ->get()
            ->getResultArray();

        return view(
            'kelurahan/index',
            [
                'title' => 'Pokja Kelurahan Sehat',
                'pokja' => $pokja
            ]
        );
    }
    // =========================
    // FORM TAMBAH
    // =========================

    public function create()
    {
        $kecamatan = $this->kecamatanModel
            ->orderBy('nama_kecamatan', 'ASC')
            ->findAll();

        return view('kelurahan/create', [
            'title'     => 'Tambah Kelurahan',
            'kecamatan' => $kecamatan
        ]);
    }


    // =========================
    // SIMPAN
    // =========================

    public function store()
    {
        $kecamatanId = $this->request->getPost('kecamatan_id');
        $nama        = $this->request->getPost('nama_kelurahan');


        if (!$this->validate([
            'kecamatan_id' => [
                'rules' => 'required'
            ],

            'nama_kelurahan' => [
                'rules' => 'required'
            ]

        ])) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Kecamatan dan nama kelurahan wajib diisi.'
                );
        }


        $this->kelurahanModel->insert([
            'kecamatan_id'   => $kecamatanId,
            'nama_kelurahan' => $nama
        ]);


        return redirect()
            ->to(base_url('kelurahan'))
            ->with(
                'success',
                'Kelurahan berhasil ditambahkan.'
            );
    }


    // =========================
    // HAPUS
    // =========================

    public function delete($id)
    {
        $kelurahan = $this->kelurahanModel->find($id);


        if (!$kelurahan) {

            return redirect()
                ->to(base_url('kelurahan'))
                ->with(
                    'error',
                    'Data kelurahan tidak ditemukan.'
                );
        }


        $this->kelurahanModel->delete($id);


        return redirect()
            ->to(base_url('kelurahan'))
            ->with(
                'success',
                'Kelurahan berhasil dihapus.'
            );
    }
}