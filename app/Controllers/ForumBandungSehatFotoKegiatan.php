<?php

namespace App\Controllers;

use App\Models\ForumBandungSehatFotoModel;

class ForumBandungSehatFotoKegiatan extends BaseController
{
    protected $fotoModel;

    public function __construct()
    {
        $this->fotoModel = new ForumBandungSehatFotoModel();
    }

    private function allowedRoles(): bool
    {
        return in_array(
            session()->get('role'),
            ['admin', 'admin_fbs'],
            true
        );
    }

    public function index()
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $foto = $this->filterByUser($this->fotoModel)
            ->orderBy('id', 'DESC')
            ->first();

        /*
         * Form upload hanya tampil saat belum ada foto,
         * atau saat user memilih "Ubah Foto".
         */
        $showUpload = !$foto
            || $this->request->getGet('ubah') === '1';

        return view(
            'forum_bandung_sehat_foto/index',
            [
                'title' => 'Foto Sekretariat Forum Bandung Sehat',
                'foto'  => $foto,
                'showUpload' => $showUpload,
            ]
        );
    }

    public function create()
    {
        return redirect()->to(
            '/forum-bandung-sehat/foto-kegiatan'
        );
    }

    public function store()
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $rules = [
            'foto' => [
                'label' => 'Foto Sekretariat',
                'rules' =>
                    'uploaded[foto]' .
                    '|is_image[foto]' .
                    '|mime_in[foto,image/jpg,image/jpeg]' .
                    '|max_size[foto,2048]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    $this->validator->getErrors()
                );
        }

        $file = $this->request->getFile('foto');

        if (!$file || !$file->isValid()) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Silakan pilih file foto yang valid.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | CEK TITIK KOORDINAT (GPS)
        |--------------------------------------------------------------------------
        |
        | Foto wajib memiliki titik koordinat yang
        | tersimpan pada EXIF. Dilewati jika ekstensi
        | EXIF PHP tidak tersedia.
        |
        */

        if (
            foto_exif_tersedia()
            && foto_koordinat($file->getTempName()) === null
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Foto wajib memiliki titik koordinat (GPS) pada EXIF. Gunakan foto yang diambil dengan lokasi aktif.'
                );
        }

        $uploadPath =
            FCPATH . 'uploads/forum_bandung_sehat/foto';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS FOTO LAMA (milik user yang login)
        |--------------------------------------------------------------------------
        */

        $fotoLama = $this->filterByUser($this->fotoModel)
            ->orderBy('id', 'DESC')
            ->findAll();

        foreach ($fotoLama as $foto) {

            $path = FCPATH . $foto['file_path'];

            if (is_file($path)) {
                unlink($path);
            }

            $this->fotoModel->delete($foto['id']);
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN FOTO BARU
        |--------------------------------------------------------------------------
        */

        $namaFile = $file->getRandomName();

        $file->move(
            $uploadPath,
            $namaFile
        );

        $this->fotoModel->insert([
            'user_id'     => $this->currentUserId(),
            'nama_file'   => $namaFile,
            'nama_asli'   => $file->getClientName(),
            'file_path'   =>
                'uploads/forum_bandung_sehat/foto/'
                . $namaFile,
            'ukuran_file' => $file->getSize(),
        ]);

        return redirect()
            ->to('/forum-bandung-sehat/foto-kegiatan')
            ->with(
                'success',
                'Foto Sekretariat berhasil diupload.'
            );
    }

    public function view($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard');
        }

        $foto = $this->filterByUser($this->fotoModel)
            ->find($id);

        if (!$foto) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Foto tidak ditemukan.'
                );
        }

        $path = FCPATH . $foto['file_path'];

        if (!is_file($path)) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'File foto tidak ditemukan.'
                );
        }

        return $this->response
            ->download($path, null)
            ->setFileName($foto['nama_asli']);
    }

    public function delete($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard');
        }

        $foto = $this->filterByUser($this->fotoModel)
            ->find($id);

        if (!$foto) {

            return redirect()
                ->to('/forum-bandung-sehat/foto-kegiatan')
                ->with(
                    'error',
                    'Foto tidak ditemukan.'
                );
        }

        $path = FCPATH . $foto['file_path'];

        if (is_file($path)) {
            unlink($path);
        }

        $this->fotoModel->delete($id);

        return redirect()
            ->to('/forum-bandung-sehat/foto-kegiatan')
            ->with(
                'success',
                'Foto Sekretariat berhasil dihapus.'
            );
    }
}