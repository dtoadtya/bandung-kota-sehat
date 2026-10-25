<?php

namespace App\Controllers;

use App\Models\PokjaKelurahanSehatFotoModel;

class PokjaKelurahanSehatFoto extends BaseController
{
    protected $fotoModel;

    public function __construct()
    {
        $this->fotoModel =
            new PokjaKelurahanSehatFotoModel();
    }

    private function allowedRoles(): bool
    {
        return in_array(
            session()->get('role'),
            ['user', 'admin'],
            true
        );
    }

    public function index()
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $foto = $this->fotoModel
            ->orderBy('id', 'DESC')
            ->first();

        return view(
            'pokja_kelurahan_sehat_foto/index',
            [
                'title' =>
                    'Foto Sekretariat Pokja Kelurahan Sehat',
                'foto' => $foto,
            ]
        );
    }

    public function create()
    {
        return redirect()->to(
            '/pokja-kelurahan-sehat/foto-kegiatan'
        );
    }

    public function store()
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard');
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
            FCPATH . 'uploads/pokja_kelurahan_sehat/foto';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS FOTO LAMA
        |--------------------------------------------------------------------------
        */

        $fotoLama = $this->fotoModel->findAll();

        foreach ($fotoLama as $foto) {

            $path = FCPATH . $foto['file_path'];

            if (is_file($path)) {
                unlink($path);
            }

            $this->fotoModel->delete(
                $foto['id']
            );
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
            'kelurahan_id' => null,
            'nama_file'    => $namaFile,
            'nama_asli'    => $file->getClientName(),
            'file_path'    =>
                'uploads/pokja_kelurahan_sehat/foto/'
                . $namaFile,
            'ukuran_file'  => $file->getSize(),
        ]);

        return redirect()
            ->to('/pokja-kelurahan-sehat/foto-kegiatan')
            ->with(
                'success',
                'Foto Sekretariat berhasil diupload.'
            );
    }

    public function delete($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard');
        }

        $foto = $this->fotoModel->find($id);

        if ($foto) {

            $path = FCPATH . $foto['file_path'];

            if (is_file($path)) {
                unlink($path);
            }

            $this->fotoModel->delete($id);
        }

        return redirect()
            ->to('/pokja-kelurahan-sehat/foto-kegiatan')
            ->with(
                'success',
                'Foto Sekretariat berhasil dihapus.'
            );
    }
}