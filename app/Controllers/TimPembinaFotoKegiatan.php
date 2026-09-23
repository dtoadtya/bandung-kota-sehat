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

    private function isAdmin(): bool
    {
        return in_array(
            session()->get('role'),
            ['admin', 'super_admin'],
            true
        );
    }

    private function getUserKecamatanId()
    {
        if ($this->isAdmin()) {
            return null;
        }

        $username = strtolower(trim((string) session()->get('username')));

        $db = db_connect();

        $kecamatanList = $db->table('kecamatan')
            ->orderBy('nama_kecamatan', 'ASC')
            ->get()
            ->getResultArray();

        foreach ($kecamatanList as $kecamatan) {
            $namaKecamatan = $kecamatan['nama_kecamatan'] ?? '';

            $kodeKecamatan = strtolower(
                str_replace(' ', '_', trim($namaKecamatan))
            );

            if ($kodeKecamatan === $username) {
                return $kecamatan['id'];
            }
        }

        return null;
    }

    private function getKecamatanList(): array
    {
        return db_connect()
            ->table('kecamatan')
            ->orderBy('nama_kecamatan', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function index()
    {
        $builder = $this->fotoModel
            ->select('tim_pembina_foto.*, kecamatan.nama_kecamatan')
            ->join(
                'kecamatan',
                'kecamatan.id = tim_pembina_foto.kecamatan_id',
                'left'
            )
            ->orderBy('tim_pembina_foto.id', 'DESC');

        if (!$this->isAdmin()) {
            $kecamatanId = $this->getUserKecamatanId();

            if (!$kecamatanId) {
                return redirect()
                    ->to('/dashboard')
                    ->with('error', 'Kecamatan akun tidak ditemukan.');
            }

            $builder->where(
                'tim_pembina_foto.kecamatan_id',
                $kecamatanId
            );
        }

        $data = $builder->findAll();

        return view('tim_pembina_foto/index', [
            'title' => 'Foto Kegiatan Tim Pembina',
            'data' => $data,
            'kecamatanList' => $this->isAdmin()
                ? $this->getKecamatanList()
                : [],
            'isAdmin' => $this->isAdmin(),
        ]);
    }

    public function store()
    {
        $isAdmin = $this->isAdmin();

        if ($isAdmin) {
            $kecamatanId = $this->request->getPost('kecamatan_id');

            if (!$kecamatanId) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Kecamatan wajib dipilih.');
            }
        } else {
            $kecamatanId = $this->getUserKecamatanId();

            if (!$kecamatanId) {
                return redirect()
                    ->back()
                    ->with('error', 'Kecamatan akun tidak ditemukan.');
            }
        }

        $existing = $this->fotoModel
            ->where('kecamatan_id', $kecamatanId)
            ->first();

        $file = $this->request->getFile('file_foto');

        if (!$file || !$file->isValid()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'File foto wajib diunggah.');
        }

        if ($file->getSize() > 5 * 1024 * 1024) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Ukuran foto maksimal 5 MB.');
        }

        $extension = strtolower($file->getClientExtension());

        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp'], true)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Format foto harus JPG, JPEG, PNG, atau WEBP.');
        }

        if (!$file->isImage()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'File yang diunggah harus berupa gambar.');
        }

        $uploadPath = WRITEPATH . 'uploads/tim_pembina_foto/';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $namaFileBaru = $file->getRandomName();

        if (!$file->move($uploadPath, $namaFileBaru)) {
            return redirect()
                ->back()
                ->with('error', 'Foto gagal diunggah.');
        }

        if ($existing) {
            $fileLama = WRITEPATH . $existing['file_path'];

            if (is_file($fileLama)) {
                unlink($fileLama);
            }

            $this->fotoModel->update($existing['id'], [
                'nama_file' => $namaFileBaru,
                'nama_asli' => $file->getClientName(),
                'file_path' => 'uploads/tim_pembina_foto/' . $namaFileBaru,
                'ukuran_file' => $file->getSize(),
            ]);
        } else {
            $this->fotoModel->insert([
                'kecamatan_id' => $kecamatanId,
                'nama_file' => $namaFileBaru,
                'nama_asli' => $file->getClientName(),
                'file_path' => 'uploads/tim_pembina_foto/' . $namaFileBaru,
                'ukuran_file' => $file->getSize(),
            ]);
        }

        return redirect()
            ->to('/tim-pembina/foto-kegiatan')
            ->with('success', 'Foto kegiatan berhasil disimpan.');
    }

    public function view($id)
    {
        $foto = $this->fotoModel->find($id);

        if (!$foto) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Foto tidak ditemukan.'
            );
        }

        if (!$this->isAdmin()) {
            $kecamatanId = $this->getUserKecamatanId();

            if ((int) $foto['kecamatan_id'] !== (int) $kecamatanId) {
                return redirect()
                    ->to('/tim-pembina/foto-kegiatan')
                    ->with('error', 'Anda tidak memiliki akses.');
            }
        }

        $path = WRITEPATH . $foto['file_path'];

        if (!is_file($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'File foto tidak ditemukan.'
            );
        }

        return $this->response
            ->download($path, null)
            ->setFileName($foto['nama_asli']);
    }

    public function delete($id)
    {
        $foto = $this->fotoModel->find($id);

        if (!$foto) {
            return redirect()
                ->back()
                ->with('error', 'Foto tidak ditemukan.');
        }

        if (!$this->isAdmin()) {
            $kecamatanId = $this->getUserKecamatanId();

            if ((int) $foto['kecamatan_id'] !== (int) $kecamatanId) {
                return redirect()
                    ->back()
                    ->with('error', 'Anda tidak memiliki akses.');
            }
        }

        $path = WRITEPATH . $foto['file_path'];

        if (is_file($path)) {
            unlink($path);
        }

        $this->fotoModel->delete($id);

        return redirect()
            ->to('/tim-pembina/foto-kegiatan')
            ->with('success', 'Foto kegiatan berhasil dihapus.');
    }
}