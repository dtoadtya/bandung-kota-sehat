<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TimPembinaSkModel;

class TimPembinaSk extends BaseController
{
    protected $timPembinaSkModel;

    public function __construct()
    {
        $this->timPembinaSkModel = new TimPembinaSkModel();
    }

    /*
    |--------------------------------------------------------------------------
    | CEK ADMIN
    |--------------------------------------------------------------------------
    */

    private function isAdmin()
    {
        return session()->get('role') === 'admin';
    }

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = $this->timPembinaSkModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('tim_pembina_sk/index', [
            'data' => $data
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('tim_pembina_sk/create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        $rules = [
            'no_sk' => [
                'label' => 'Nomor Surat Keputusan',
                'rules' => 'required|max_length[100]'
            ],

            'periode' => [
                'label' => 'Periode',
                'rules' => 'required|max_length[50]'
            ],

            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'permit_empty'
            ],

            'file' => [
                'label' => 'Berkas Surat Keputusan',
                'rules' =>
                    'uploaded[file]'
                    . '|max_size[file,2048]'
                    . '|ext_in[file,pdf]'
                    . '|mime_in[file,application/pdf]'
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    implode('<br>', $this->validator->getErrors())
                );
        }

        $file = $this->request->getFile('file');

        if (!$file || !$file->isValid()) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Berkas PDF tidak valid.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | FOLDER UPLOAD
        |--------------------------------------------------------------------------
        */

        $uploadPath = FCPATH . 'uploads/tim_pembina_sk/';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        /*
        |--------------------------------------------------------------------------
        | NAMA FILE
        |--------------------------------------------------------------------------
        */

        $namaAsli = $file->getClientName();
        $namaFile = $file->getRandomName();

        /*
        |--------------------------------------------------------------------------
        | UPLOAD
        |--------------------------------------------------------------------------
        */

        try {
            $file->move(
                $uploadPath,
                $namaFile
            );
        } catch (\Throwable $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal mengunggah berkas PDF.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATABASE
        |--------------------------------------------------------------------------
        */

        $this->timPembinaSkModel->insert([

            'no_sk' =>
                trim($this->request->getPost('no_sk')),

            'periode' =>
                trim($this->request->getPost('periode')),

            'keterangan' =>
                trim($this->request->getPost('keterangan')),

            'nama_file' =>
                $namaFile,

            'nama_asli' =>
                $namaAsli,

            'file_path' =>
                'uploads/tim_pembina_sk/' . $namaFile,

            'ukuran_file' =>
                $file->getSize(),

            /*
            | Status awal
            */

            'status' =>
                'pending',

            'keterangan_penolakan' =>
                null,

            'verified_at' =>
                null,

            'verified_by' =>
                null,

            'created_at' =>
                date('Y-m-d H:i:s'),

            'updated_at' =>
                date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to(base_url('tim-pembina/sk'))
            ->with(
                'success',
                'SK Tim Pembina berhasil ditambahkan dan menunggu pemeriksaan Admin.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $data = $this->timPembinaSkModel->find($id);

        if (!$data) {
            return redirect()
                ->to(base_url('tim-pembina/sk'))
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        return view(
            'tim_pembina_sk/edit',
            [
                'data' => $data
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update($id)
    {
        $data = $this->timPembinaSkModel->find($id);

        if (!$data) {
            return redirect()
                ->to(base_url('tim-pembina/sk'))
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        $rules = [
            'no_sk' => [
                'label' => 'Nomor Surat Keputusan',
                'rules' => 'required|max_length[100]'
            ],

            'periode' => [
                'label' => 'Periode',
                'rules' => 'required|max_length[50]'
            ],

            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'permit_empty'
            ],

            'file' => [
                'label' => 'Berkas Surat Keputusan',
                'rules' =>
                    'permit_empty'
                    . '|max_size[file,2048]'
                    . '|ext_in[file,pdf]'
                    . '|mime_in[file,application/pdf]'
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    implode('<br>', $this->validator->getErrors())
                );
        }

        /*
        |--------------------------------------------------------------------------
        | DATA DASAR
        |--------------------------------------------------------------------------
        */

        $updateData = [

            'no_sk' =>
                trim($this->request->getPost('no_sk')),

            'periode' =>
                trim($this->request->getPost('periode')),

            'keterangan' =>
                trim($this->request->getPost('keterangan')),

            'updated_at' =>
                date('Y-m-d H:i:s')
        ];

        /*
        |--------------------------------------------------------------------------
        | CEK FILE BARU
        |--------------------------------------------------------------------------
        */

        $file = $this->request->getFile('file');

        if (
            $file &&
            $file->isValid() &&
            !$file->hasMoved()
        ) {

            $uploadPath =
                FCPATH . 'uploads/tim_pembina_sk/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $namaAsli =
                $file->getClientName();

            $namaFile =
                $file->getRandomName();

            /*
            | Hapus file lama
            */

            if (!empty($data['file_path'])) {

                $oldFile =
                    FCPATH . $data['file_path'];

                if (is_file($oldFile)) {
                    @unlink($oldFile);
                }
            }

            /*
            | Upload file baru
            */

            try {

                $file->move(
                    $uploadPath,
                    $namaFile
                );

            } catch (\Throwable $e) {

                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Gagal mengunggah berkas PDF baru.'
                    );
            }

            /*
            | Update informasi file
            */

            $updateData['nama_file'] =
                $namaFile;

            $updateData['nama_asli'] =
                $namaAsli;

            $updateData['file_path'] =
                'uploads/tim_pembina_sk/' . $namaFile;

            $updateData['ukuran_file'] =
                $file->getSize();

            /*
            |--------------------------------------------------------------------------
            | BERKAS BERUBAH
            | KEMBALI PENDING
            |--------------------------------------------------------------------------
            */

            $updateData['status'] =
                'pending';

            $updateData['keterangan_penolakan'] =
                null;

            $updateData['verified_at'] =
                null;

            $updateData['verified_by'] =
                null;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $this->timPembinaSkModel->update(
            $id,
            $updateData
        );

        return redirect()
            ->to(base_url('tim-pembina/sk'))
            ->with(
                'success',
                'SK Tim Pembina berhasil diperbarui.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | LIHAT BERKAS PDF
    |--------------------------------------------------------------------------
    */

    public function view($id)
    {
        $data =
            $this->timPembinaSkModel->find($id);

        if (!$data) {
            return redirect()
                ->to(base_url('tim-pembina/sk'))
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | CEK PATH FILE
        |--------------------------------------------------------------------------
        */

        $relativePath =
            trim($data['file_path'] ?? '');

        /*
        | Kalau file_path kosong, coba gunakan nama_file
        */

        if ($relativePath === '') {

            if (!empty($data['nama_file'])) {

                $relativePath =
                    'uploads/tim_pembina_sk/' .
                    $data['nama_file'];

            } else {

                return redirect()
                    ->to(base_url('tim-pembina/sk'))
                    ->with(
                        'error',
                        'Berkas SK tidak tersedia.'
                    );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | NORMALISASI PATH
        |--------------------------------------------------------------------------
        */

        $relativePath =
            str_replace('\\', '/', $relativePath);

        $relativePath =
            ltrim($relativePath, '/');

        /*
        |--------------------------------------------------------------------------
        | PATH FISIK
        |--------------------------------------------------------------------------
        */

        $filePath =
            FCPATH . $relativePath;

        /*
        |--------------------------------------------------------------------------
        | CEK FILE
        |--------------------------------------------------------------------------
        */

        if (!is_file($filePath)) {

            return redirect()
                ->to(base_url('tim-pembina/sk'))
                ->with(
                    'error',
                    'File SK tidak ditemukan di server: ' .
                    $relativePath
                );
        }

        /*
        |--------------------------------------------------------------------------
        | NAMA FILE
        |--------------------------------------------------------------------------
        */

        $namaTampil =
            $data['nama_asli']
            ?? $data['nama_file']
            ?? 'SK_Tim_Pembina.pdf';

        /*
        |--------------------------------------------------------------------------
        | BUKA PDF DI BROWSER
        |--------------------------------------------------------------------------
        */

        return $this->response

            ->setHeader(
                'Content-Type',
                'application/pdf'
            )

            ->setHeader(
                'Content-Disposition',
                'inline; filename="' .
                basename($namaTampil) .
                '"'
            )

            ->setHeader(
                'Content-Length',
                (string) filesize($filePath)
            )

            ->setHeader(
                'Cache-Control',
                'private, max-age=0, must-revalidate'
            )

            ->setBody(
                file_get_contents($filePath)
            );
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        /*
        |--------------------------------------------------------------------------
        | USER TIDAK BOLEH HAPUS
        |--------------------------------------------------------------------------
        */

        if (!$this->isAdmin()) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Hanya Admin yang dapat menghapus SK.'
                );
        }

        $data =
            $this->timPembinaSkModel->find($id);

        if (!$data) {

            return redirect()
                ->to(base_url('tim-pembina/sk'))
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS FILE
        |--------------------------------------------------------------------------
        */

        if (!empty($data['file_path'])) {

            $filePath =
                FCPATH . $data['file_path'];

            if (is_file($filePath)) {
                @unlink($filePath);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS DATABASE
        |--------------------------------------------------------------------------
        */

        $this->timPembinaSkModel->delete($id);

        return redirect()
            ->to(base_url('tim-pembina/sk'))
            ->with(
                'success',
                'SK Tim Pembina berhasil dihapus.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DITERIMA + DIVERIFIKASI
    |--------------------------------------------------------------------------
    |
    | HANYA ADMIN
    |
    */

    public function verifikasi($id)
    {
        if (!$this->isAdmin()) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Hanya Admin yang dapat menerima dan memverifikasi SK.'
                );
        }

        $data =
            $this->timPembinaSkModel->find($id);

        if (!$data) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | TERIMA + VERIFIKASI
        |--------------------------------------------------------------------------
        */

        $this->timPembinaSkModel->update(
            $id,
            [

                'status' =>
                    'disetujui',

                'keterangan_penolakan' =>
                    null,

                'verified_at' =>
                    date('Y-m-d H:i:s'),

                'verified_by' =>
                    session()->get('user_id'),

                'updated_at' =>
                    date('Y-m-d H:i:s')
            ]
        );

        return redirect()
            ->to(base_url('tim-pembina/sk'))
            ->with(
                'success',
                'SK Tim Pembina berhasil diverifikasi (Disetujui).'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | TOLAK
    |--------------------------------------------------------------------------
    |
    | HANYA ADMIN
    | KETERANGAN WAJIB
    |
    */

    public function tolak($id)
    {
        if (!$this->isAdmin()) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Hanya Admin yang dapat menolak SK.'
                );
        }

        $data =
            $this->timPembinaSkModel->find($id);

        if (!$data) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | ALASAN PENOLAKAN
        |--------------------------------------------------------------------------
        */

        $alasan =
            trim(
                (string)
                $this->request->getPost(
                    'keterangan_penolakan'
                )
            );

        if ($alasan === '') {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Keterangan alasan penolakan wajib diisi.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DITOLAK
        |--------------------------------------------------------------------------
        */

        $this->timPembinaSkModel->update(
            $id,
            [

                'status' =>
                    'ditolak',

                'keterangan_penolakan' =>
                    $alasan,

                'verified_at' =>
                    null,

                'verified_by' =>
                    null,

                'updated_at' =>
                    date('Y-m-d H:i:s')
            ]
        );

        return redirect()
            ->to(base_url('tim-pembina/sk'))
            ->with(
                'success',
                'SK Tim Pembina ditolak dan alasan penolakan telah disimpan.'
            );
    }
}