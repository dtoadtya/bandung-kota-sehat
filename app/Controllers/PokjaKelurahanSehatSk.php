<?php

namespace App\Controllers;

use App\Models\PokjaKelurahanSehatSkModel;
use App\Models\KelurahanModel;

class PokjaKelurahanSehatSk extends BaseController
{
    protected $skModel;
    protected $kelurahanModel;

    public function __construct()
    {
        $this->skModel = new PokjaKelurahanSehatSkModel();
        $this->kelurahanModel = new KelurahanModel();
    }

    /**
     * Cek apakah pengguna adalah admin
     */
    protected function isAdmin(): bool
    {
        $role = session()->get('role');

        return in_array($role, ['admin', 'super_admin'], true);
    }

    /**
     * Halaman daftar SK
     */
    public function index()
    {
        $builder = $this->skModel
            ->select(
                'pokja_kelurahan_sehat_sk.*,
                 kelurahan.nama_kelurahan,
                 kecamatan.nama_kecamatan'
            )
            ->join(
                'kelurahan',
                'kelurahan.id = pokja_kelurahan_sehat_sk.kelurahan_id',
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
            );

        return view(
            'pokja_kelurahan_sehat/sk/index',
            [
                'title'   => 'SK Pokja Kelurahan Sehat',
                'data'    => $builder->findAll(),
                'isAdmin' => $this->isAdmin(),
            ]
        );
    }

    /**
     * Form tambah SK
     */
    public function create()
    {
        $kelurahanList = $this->kelurahanModel
            ->select(
                'kelurahan.*,
                 kecamatan.nama_kecamatan'
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
            'pokja_kelurahan_sehat/sk/create',
            [
                'title'         => 'Tambah SK Pokja Kelurahan Sehat',
                'kelurahanList' => $kelurahanList,
                'isAdmin'       => $this->isAdmin(),
            ]
        );
    }

    /**
     * Simpan SK
     */
    public function store()
    {
        $kelurahanId = $this->request
            ->getPost('kelurahan_id');

        if (!$kelurahanId) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Kelurahan wajib dipilih.'
                );
        }

        $file = $this->request
            ->getFile('file_sk');

        if (!$file || !$file->isValid()) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'File SK wajib dipilih.'
                );
        }

        /**
         * Pastikan file PDF
         */
        if (
            $file->getClientMimeType()
            !== 'application/pdf'
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'File SK harus berformat PDF.'
                );
        }

        /**
         * Maksimal 5 MB
         */
        if (
            $file->getSize()
            > 5 * 1024 * 1024
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Ukuran file maksimal 5 MB.'
                );
        }

        /**
         * Cek apakah kelurahan sudah memiliki SK
         */
        $existing = $this->skModel
            ->where(
                'kelurahan_id',
                $kelurahanId
            )
            ->first();

        /**
         * Folder upload
         */
        $uploadPath =
            FCPATH .
            'uploads/pokja_kelurahan_sehat_sk/';

        if (!is_dir($uploadPath)) {
            mkdir(
                $uploadPath,
                0777,
                true
            );
        }

        /**
         * Hapus file lama jika ada
         */
        if (
            $existing &&
            !empty($existing['nama_file'])
        ) {
            $oldPath =
                $uploadPath .
                $existing['nama_file'];

            if (is_file($oldPath)) {
                unlink($oldPath);
            }
        }

        /**
         * Buat nama file baru
         */
        $namaFile =
            $file->getRandomName();

        $file->move(
            $uploadPath,
            $namaFile
        );

        /**
         * Data yang disimpan
         */
        $data = [
            'kelurahan_id' => $kelurahanId,

            'no_sk' => trim(
                (string)
                $this->request
                    ->getPost('no_sk')
            ),

            'periode' => trim(
                (string)
                $this->request
                    ->getPost('periode')
            ),

            'keterangan' => trim(
                (string)
                $this->request
                    ->getPost('keterangan')
            ),

            'nama_file' =>
                $namaFile,

            'nama_asli' =>
                $file->getClientName(),

            'file_path' =>
                'uploads/pokja_kelurahan_sehat_sk/'
                . $namaFile,

            'ukuran_file' =>
                $file->getSize(),
        ];

        /**
         * Jika sudah ada, update.
         * Jika belum ada, insert.
         */
        if ($existing) {

            $this->skModel->update(
                $existing['id'],
                $data
            );

            $message =
                'SK Pokja Kelurahan Sehat berhasil diperbarui.';

        } else {

            $this->skModel->insert(
                $data
            );

            $message =
                'SK Pokja Kelurahan Sehat berhasil disimpan.';
        }

        return redirect()
            ->to(
                '/pokja-kelurahan-sehat/sk'
            )
            ->with(
                'success',
                $message
            );
    }

    /**
     * Membuka / melihat PDF
     */
    public function view($id)
    {
        $data =
            $this->skModel->find($id);

        if (!$data) {
            throw
                \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                    'File SK tidak ditemukan.'
                );
        }

        $path =
            FCPATH .
            $data['file_path'];

        if (!is_file($path)) {
            throw
                \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                    'File SK tidak ditemukan di server.'
                );
        }

        return $this->response
            ->setHeader(
                'Content-Type',
                'application/pdf'
            )
            ->setHeader(
                'Content-Disposition',
                'inline; filename="' .
                basename(
                    $data['nama_asli']
                ) .
                '"'
            )
            ->setBody(
                file_get_contents($path)
            );
    }

    /**
     * Hapus SK
     */
    public function delete($id)
    {
        $data =
            $this->skModel->find($id);

        if (!$data) {
            return redirect()
                ->to(
                    '/pokja-kelurahan-sehat/sk'
                )
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        /**
         * Hapus file PDF
         */
        if (!empty($data['file_path'])) {

            $path =
                FCPATH .
                $data['file_path'];

            if (is_file($path)) {
                unlink($path);
            }
        }

        /**
         * Hapus data database
         */
        $this->skModel->delete($id);

        return redirect()
            ->to(
                '/pokja-kelurahan-sehat/sk'
            )
            ->with(
                'success',
                'SK Pokja Kelurahan Sehat berhasil dihapus.'
            );
    }
}