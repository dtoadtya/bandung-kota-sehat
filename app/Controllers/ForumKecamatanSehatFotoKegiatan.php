<?php

namespace App\Controllers;

use App\Models\ForumKecamatanSehatFotoModel;

class ForumKecamatanSehatFotoKegiatan extends BaseController
{
    protected $fotoModel;

    public function __construct()
    {
        $this->fotoModel =
            new ForumKecamatanSehatFotoModel();
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
            'forum_kecamatan_sehat_foto/index',
            [
                'title' =>
                    'Foto Sekretariat Forum Kecamatan Sehat',
                'foto' => $foto,
            ]
        );
    }

    public function create()
    {
        return redirect()->to(
            '/forum-kecamatan-sehat/foto-kegiatan'
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
                    '|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]' .
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

        $uploadPath =
            FCPATH . 'uploads/forum_kecamatan_sehat/foto';

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
            'kecamatan_id' => null,
            'nama_file'    => $namaFile,
            'nama_asli'    => $file->getClientName(),
            'file_path'    =>
                'uploads/forum_kecamatan_sehat/foto/'
                . $namaFile,
            'ukuran_file'  => $file->getSize(),
        ]);

        return redirect()
            ->to('/forum-kecamatan-sehat/foto-kegiatan')
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

        $foto = $this->fotoModel->find($id);

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

        $foto = $this->fotoModel->find($id);

        if ($foto) {

            $path = FCPATH . $foto['file_path'];

            if (is_file($path)) {
                unlink($path);
            }

            $this->fotoModel->delete($id);
        }

        return redirect()
            ->to('/forum-kecamatan-sehat/foto-kegiatan')
            ->with(
                'success',
                'Foto Sekretariat berhasil dihapus.'
            );
    }
}