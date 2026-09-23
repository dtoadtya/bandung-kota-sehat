<?php

namespace App\Controllers;

use App\Models\ForumKecamatanSehatModel;
use App\Models\KecamatanModel;

class ForumKecamatanSehat extends BaseController
{
    protected $model;
    protected $kecamatanModel;

    public function __construct()
    {
        $this->model = new ForumKecamatanSehatModel();
        $this->kecamatanModel = new KecamatanModel();
    }

    /**
     * Menentukan kecamatan berdasarkan username user.
     *
     * Contoh:
     * andir           -> Andir
     * babakan_ciparay -> Babakan Ciparay
     * bandung_kidul   -> Bandung Kidul
     */
    private function getUserKecamatan()
    {
        $session = session();

        $username = $session->get('username');

        if (!$username) {
            return null;
        }

        $username = strtolower(trim($username));

        $kecamatan = $this->kecamatanModel
            ->where(
                'LOWER(REPLACE(nama_kecamatan, " ", "_"))',
                $username
            )
            ->first();

        return $kecamatan;
    }

    /**
     * Mengecek apakah user merupakan admin atau super admin.
     */
    private function isAdmin()
    {
        $role = session()->get('role');

        return in_array(
            $role,
            ['admin', 'super_admin'],
            true
        );
    }

    /**
     * Halaman daftar Forum Kecamatan Sehat.
     */
    public function index()
    {
        $query = $this->model
            ->select(
                'forum_kecamatan_sehat.*, kecamatan.nama_kecamatan'
            )
            ->join(
                'kecamatan',
                'kecamatan.id = forum_kecamatan_sehat.kecamatan_id'
            );

        /*
         * User biasa hanya melihat data kecamatannya sendiri.
         */
        if (!$this->isAdmin()) {

            $kecamatan = $this->getUserKecamatan();

            if (!$kecamatan) {
                return view(
                    'forum_kecamatan_sehat/index',
                    [
                        'title' => 'Forum Kecamatan Sehat',
                        'data'  => [],
                    ]
                );
            }

            $data = $query
                ->where(
                    'forum_kecamatan_sehat.kecamatan_id',
                    $kecamatan['id']
                )
                ->orderBy(
                    'kecamatan.nama_kecamatan',
                    'ASC'
                )
                ->orderBy(
                    'tahun',
                    'DESC'
                )
                ->findAll();

            return view(
                'forum_kecamatan_sehat/index',
                [
                    'title' => 'Forum Kecamatan Sehat',
                    'data'  => $data,
                ]
            );
        }

        /*
         * Admin dan super_admin melihat semua data.
         */
        $data = $query
            ->orderBy(
                'kecamatan.nama_kecamatan',
                'ASC'
            )
            ->orderBy(
                'tahun',
                'DESC'
            )
            ->findAll();

        return view(
            'forum_kecamatan_sehat/index',
            [
                'title' => 'Forum Kecamatan Sehat',
                'data'  => $data,
            ]
        );
    }

    /**
     * Halaman menu utama Forum Kecamatan Sehat.
     *
     * Saat klik Tambah Data, halaman ini menampilkan:
     * 1. SK
     * 2. Rencana Kerja
     * 3. Realisasi Kegiatan
     * 4. Foto Kegiatan
     */
    public function create()
    {
        return view(
            'forum_kecamatan_sehat/create',
            [
                'title' => 'Tambah Forum Kecamatan Sehat',
            ]
        );
    }

    /**
     * Menyimpan data Forum Kecamatan Sehat lama.
     *
     * Method ini tetap dipertahankan agar tidak merusak
     * fungsi atau route lama yang mungkin masih digunakan.
     */
    public function store()
    {
        $postedKecamatanId = $this->request
            ->getPost('kecamatan_id');

        /*
         * Admin dan super_admin boleh memilih kecamatan.
         */
        if ($this->isAdmin()) {

            $kecamatan = $this->kecamatanModel
                ->find($postedKecamatanId);

            if (!$kecamatan) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Kecamatan yang dipilih tidak ditemukan.'
                    );
            }

            $kecamatanId = $kecamatan['id'];
        }

        /*
         * User biasa tidak boleh menentukan kecamatan melalui POST.
         */
        else {

            $kecamatan = $this->getUserKecamatan();

            if (!$kecamatan) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Kecamatan akun pengguna tidak ditemukan.'
                    );
            }

            $kecamatanId = $kecamatan['id'];
        }

        $namaForum = trim(
            (string) $this->request->getPost('nama_forum')
        );

        $tahun = trim(
            (string) $this->request->getPost('tahun')
        );

        $ketua = trim(
            (string) $this->request->getPost('ketua')
        );

        $keterangan = trim(
            (string) $this->request->getPost('keterangan')
        );

        if ($namaForum === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Nama forum wajib diisi.'
                );
        }

        if ($tahun === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Tahun wajib diisi.'
                );
        }

        $this->model->insert(
            [
                'kecamatan_id' => $kecamatanId,
                'nama_forum'   => $namaForum,
                'tahun'        => $tahun,
                'ketua'        => $ketua,
                'keterangan'   => $keterangan,
            ]
        );

        return redirect()
            ->to('/forum-kecamatan-sehat')
            ->with(
                'success',
                'Data berhasil ditambahkan.'
            );
    }

    /**
     * Menghapus data Forum Kecamatan Sehat.
     */
    public function delete($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return redirect()
                ->to('/forum-kecamatan-sehat')
                ->with(
                    'error',
                    'Data tidak ditemukan.'
                );
        }

        /*
         * User biasa hanya boleh menghapus data kecamatannya sendiri.
         */
        if (!$this->isAdmin()) {

            $kecamatan = $this->getUserKecamatan();

            if (!$kecamatan) {
                return redirect()
                    ->to('/forum-kecamatan-sehat')
                    ->with(
                        'error',
                        'Kecamatan akun pengguna tidak ditemukan.'
                    );
            }

            if (
                (int) $data['kecamatan_id']
                !==
                (int) $kecamatan['id']
            ) {
                return redirect()
                    ->to('/forum-kecamatan-sehat')
                    ->with(
                        'error',
                        'Anda tidak memiliki akses ke data kecamatan tersebut.'
                    );
            }
        }

        $this->model->delete($id);

        return redirect()
            ->to('/forum-kecamatan-sehat')
            ->with(
                'success',
                'Data berhasil dihapus.'
            );
    }
}