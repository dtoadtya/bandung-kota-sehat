<?php

namespace App\Controllers;

use App\Models\TimPembinaFotoModel;

class TimPembinaFotoKegiatan extends BaseController
{
    protected $fotoModel;

    public function __construct()
    {
        $this->fotoModel = new TimPembinaFotoModel();
    }

    /**
     * Halaman Foto Sekretariat
     */
    public function index()
    {
        $role = session()->get('role');

        if (!in_array($role, ['user', 'admin'], true)) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Foto Sekretariat Tim Pembina',
            'foto'  => $this->filterByUser($this->fotoModel)->first(),
        ];

        return view(
            'tim_pembina_foto_kegiatan/index',
            $data
        );
    }

    /**
     * Upload / ganti Foto Sekretariat
     */
    public function store()
    {
        $role = session()->get('role');

        if (!in_array($role, ['user', 'admin'], true)) {
            return redirect()->to('/dashboard');
        }

        /*
        |--------------------------------------------------------------------------
        | VALIDASI FILE
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | FILE
        |--------------------------------------------------------------------------
        */

        $file = $this->request->getFile('foto');

        if (!$file || !$file->isValid()) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'File foto tidak valid.'
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

        /*
        |--------------------------------------------------------------------------
        | CEK FOTO LAMA
        |--------------------------------------------------------------------------
        */

        $fotoLama = $this->fotoModel->first();

        /*
        |--------------------------------------------------------------------------
        | FOLDER UPLOAD
        |--------------------------------------------------------------------------
        */

        $folder = FCPATH . 'uploads/tim_pembina_foto';

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS FOTO LAMA
        |--------------------------------------------------------------------------
        */

        if ($fotoLama) {

            $oldPath = FCPATH . $fotoLama['file_path'];

            if (is_file($oldPath)) {
                unlink($oldPath);
            }

            $this->fotoModel->delete(
                $fotoLama['id']
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN FOTO BARU
        |--------------------------------------------------------------------------
        */

        $newName = $file->getRandomName();

        $file->move(
            $folder,
            $newName
        );

        $relativePath =
            'uploads/tim_pembina_foto/' . $newName;

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATABASE
        |--------------------------------------------------------------------------
        */

        $this->fotoModel->insert([
            'user_id'      => $this->currentUserId(),
            'kecamatan_id' => null,
            'nama_file'    => $newName,
            'nama_asli'    => $file->getClientName(),
            'file_path'    => $relativePath,
            'ukuran_file'  => $file->getSize(),
        ]);

        return redirect()
            ->to('/tim-pembina/foto-kegiatan')
            ->with(
                'success',
                'Foto Sekretariat berhasil diunggah.'
            );
    }
}