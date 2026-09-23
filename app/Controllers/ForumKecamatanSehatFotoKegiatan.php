<?php

namespace App\Controllers;

use App\Models\ForumKecamatanSehatFotoModel;
use App\Models\KecamatanModel;

class ForumKecamatanSehatFotoKegiatan extends BaseController
{
    protected $fotoModel;
    protected $kecamatanModel;

    public function __construct()
    {
        $this->fotoModel = new ForumKecamatanSehatFotoModel();
        $this->kecamatanModel = new KecamatanModel();
    }

    private function isAdmin(): bool
    {
        return in_array(session()->get('role'), [
            'admin',
            'super_admin',
        ], true);
    }

    private function allowedRoles(): bool
    {
        return in_array(session()->get('role'), [
            'user',
            'admin',
            'super_admin',
        ], true);
    }

    private function getUserKecamatanId()
    {
        if ($this->isAdmin()) {
            return null;
        }

        $username = strtolower(
            trim((string) session()->get('username'))
        );

        if ($username === '') {
            return null;
        }

        $kecamatanList = $this->kecamatanModel
            ->orderBy('nama_kecamatan', 'ASC')
            ->findAll();

        foreach ($kecamatanList as $kecamatan) {
            $nama = strtolower(
                trim($kecamatan['nama_kecamatan'] ?? '')
            );

            $kode = str_replace(' ', '_', $nama);

            if ($kode === $username) {
                return (int) $kecamatan['id'];
            }
        }

        return null;
    }

    private function getKecamatanList(): array
    {
        return $this->kecamatanModel
            ->orderBy('nama_kecamatan', 'ASC')
            ->findAll();
    }

    public function index()
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard');
        }

        $builder = $this->fotoModel
            ->select(
                'forum_kecamatan_sehat_foto.*, ' .
                'kecamatan.nama_kecamatan'
            )
            ->join(
                'kecamatan',
                'kecamatan.id = forum_kecamatan_sehat_foto.kecamatan_id',
                'left'
            )
            ->orderBy(
                'forum_kecamatan_sehat_foto.id',
                'DESC'
            );

        $kecamatanId = $this->getUserKecamatanId();

        if (!$this->isAdmin()) {
            if (!$kecamatanId) {
                return redirect()->to('/dashboard')
                    ->with(
                        'error',
                        'Kecamatan akun Anda tidak ditemukan.'
                    );
            }

            $builder->where(
                'forum_kecamatan_sehat_foto.kecamatan_id',
                $kecamatanId
            );
        }

        $data = $builder->findAll();

        return view(
            'forum_kecamatan_sehat_foto/index',
            [
                'title'   => 'Foto Kegiatan Forum Kecamatan Sehat',
                'data'    => $data,
                'isAdmin' => $this->isAdmin(),
            ]
        );
    }

    public function create()
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard');
        }

        $kecamatanId = $this->getUserKecamatanId();

        if (!$this->isAdmin() && !$kecamatanId) {
            return redirect()->to('/dashboard')
                ->with(
                    'error',
                    'Kecamatan akun Anda tidak ditemukan.'
                );
        }

        return view(
            'forum_kecamatan_sehat_foto/create',
            [
                'title'         => 'Tambah Foto Kegiatan Forum Kecamatan Sehat',
                'isAdmin'       => $this->isAdmin(),
                'kecamatanList' => $this->isAdmin()
                    ? $this->getKecamatanList()
                    : [],
                'kecamatanUser' => $kecamatanId,
            ]
        );
    }

    public function store()
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard');
        }

        $rules = [
            'foto' => [
                'label' => 'Foto Kegiatan',
                'rules' => 'uploaded[foto]'
                    . '|is_image[foto]'
                    . '|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]'
                    . '|max_size[foto,5120]',
            ],
        ];

        if ($this->isAdmin()) {
            $rules['kecamatan_id'] = [
                'label' => 'Kecamatan',
                'rules' => 'required|is_not_unique[kecamatan.id]',
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with(
                    'errors',
                    $this->validator->getErrors()
                );
        }

        if ($this->isAdmin()) {
            $kecamatanId = (int) $this->request
                ->getPost('kecamatan_id');
        } else {
            $kecamatanId = $this->getUserKecamatanId();

            if (!$kecamatanId) {
                return redirect()->back()
                    ->with('error', 'Kecamatan akun tidak ditemukan.');
            }
        }

        $existing = $this->fotoModel
            ->where('kecamatan_id', $kecamatanId)
            ->first();

        if ($existing) {
            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Foto kegiatan untuk kecamatan ini sudah tersedia. Hapus foto lama terlebih dahulu jika ingin mengganti.'
                );
        }

        $file = $this->request->getFile('foto');

        if (!$file || !$file->isValid()) {
            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'File foto tidak valid.'
                );
        }

        $uploadPath = FCPATH . 'uploads/forum_kecamatan_sehat/foto';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $namaFile = $file->getRandomName();

        $file->move($uploadPath, $namaFile);

        $this->fotoModel->insert([
            'kecamatan_id' => $kecamatanId,
            'nama_file'    => $namaFile,
            'nama_asli'    => $file->getClientName(),
            'file_path'    => 'uploads/forum_kecamatan_sehat/foto/' . $namaFile,
            'ukuran_file'  => $file->getSize(),
        ]);

        return redirect()->to('/forum-kecamatan-sehat/foto-kegiatan')
            ->with(
                'success',
                'Foto kegiatan berhasil diunggah.'
            );
    }

    public function view($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard');
        }

        $data = $this->fotoModel->find($id);

        if (!$data) {
            return redirect()->to('/forum-kecamatan-sehat/foto-kegiatan')
                ->with('error', 'Foto tidak ditemukan.');
        }

        if (!$this->isAdmin()) {
            $kecamatanId = $this->getUserKecamatanId();

            if (
                !$kecamatanId ||
                (int) $data['kecamatan_id'] !== (int) $kecamatanId
            ) {
                return redirect()->to('/forum-kecamatan-sehat/foto-kegiatan')
                    ->with(
                        'error',
                        'Anda tidak dapat melihat foto kecamatan lain.'
                    );
            }
        }

        $path = FCPATH . $data['file_path'];

        if (!is_file($path)) {
            return redirect()->to('/forum-kecamatan-sehat/foto-kegiatan')
                ->with('error', 'File foto tidak ditemukan di server.');
        }

        return $this->response
            ->download($path, null);
    }

    public function delete($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()->to('/dashboard');
        }

        $data = $this->fotoModel->find($id);

        if (!$data) {
            return redirect()->to('/forum-kecamatan-sehat/foto-kegiatan')
                ->with('error', 'Foto tidak ditemukan.');
        }

        if (!$this->isAdmin()) {
            $kecamatanId = $this->getUserKecamatanId();

            if (
                !$kecamatanId ||
                (int) $data['kecamatan_id'] !== (int) $kecamatanId
            ) {
                return redirect()->to('/forum-kecamatan-sehat/foto-kegiatan')
                    ->with(
                        'error',
                        'Anda tidak dapat menghapus foto kecamatan lain.'
                    );
            }
        }

        $path = FCPATH . $data['file_path'];

        if (is_file($path)) {
            unlink($path);
        }

        $this->fotoModel->delete($id);

        return redirect()->to('/forum-kecamatan-sehat/foto-kegiatan')
            ->with(
                'success',
                'Foto kegiatan berhasil dihapus.'
            );
    }
}