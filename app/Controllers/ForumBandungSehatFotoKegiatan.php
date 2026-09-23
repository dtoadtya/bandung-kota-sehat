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

    private function isAdmin(): bool
    {
        return in_array(session()->get('role'), [
            'user',
            'admin'
        ], true);
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $data = $this->fotoModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('forum_bandung_sehat_foto/index', [
            'title' => 'Foto Kegiatan Forum Bandung Sehat',
            'data'  => $data,
        ]);
    }

    public function create()
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $foto = $this->fotoModel->first();

        return view('forum_bandung_sehat_foto/create', [
            'title' => 'Tambah Foto Kegiatan Forum Bandung Sehat',
            'foto'  => $foto,
        ]);
    }

    public function store()
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        if ($this->fotoModel->countAllResults() >= 1) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Foto kegiatan Forum Bandung Sehat sudah tersedia. Hapus foto lama jika ingin mengganti.');
        }

        $file = $this->request->getFile('foto');

        if (!$file || !$file->isValid()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Silakan pilih file foto yang valid.');
        }

        if ($file->getSizeByUnit('mb') > 5) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Ukuran foto maksimal 5 MB.');
        }

        $allowedExtensions = [
            'jpg',
            'jpeg',
            'png',
            'webp'
        ];

        $extension = strtolower($file->getClientExtension());

        if (!in_array($extension, $allowedExtensions, true)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Format foto harus JPG, JPEG, PNG, atau WEBP.');
        }

        $uploadPath = FCPATH . 'uploads/forum_bandung_sehat/foto';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $namaFile = $file->getRandomName();

        $file->move($uploadPath, $namaFile);

        $this->fotoModel->insert([
            'nama_file'   => $namaFile,
            'nama_asli'   => $file->getClientName(),
            'file_path'   => 'uploads/forum_bandung_sehat/foto/' . $namaFile,
            'ukuran_file' => $file->getSize(),
        ]);

        return redirect()->to('/forum-bandung-sehat/foto-kegiatan')
            ->with('success', 'Foto kegiatan berhasil diupload.');
    }

    public function view($id)
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $foto = $this->fotoModel->find($id);

        if (!$foto) {
            return redirect()->back()
                ->with('error', 'Foto tidak ditemukan.');
        }

        $path = FCPATH . $foto['file_path'];

        if (!is_file($path)) {
            return redirect()->back()
                ->with('error', 'File foto tidak ditemukan di server.');
        }

        return $this->response
            ->download($path, null)
            ->setFileName($foto['nama_asli']);
    }

    public function delete($id)
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $foto = $this->fotoModel->find($id);

        if (!$foto) {
            return redirect()->back()
                ->with('error', 'Foto tidak ditemukan.');
        }

        $path = FCPATH . $foto['file_path'];

        if (is_file($path)) {
            unlink($path);
        }

        $this->fotoModel->delete($id);

        return redirect()->to('/forum-bandung-sehat/foto-kegiatan')
            ->with('success', 'Foto kegiatan berhasil dihapus.');
    }
}