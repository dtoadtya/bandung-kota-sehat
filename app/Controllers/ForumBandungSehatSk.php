<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ForumBandungSehatSkModel;

class ForumBandungSehatSk extends BaseController
{
    protected $skModel;

    public function __construct()
    {
        $this->skModel = new ForumBandungSehatSkModel();
    }


    /* =========================================================
       CEK AKSES
    ========================================================= */

    private function isAllowed(): bool
    {
        return in_array(
            session()->get('role'),
            ['user', 'admin'],
            true
        );
    }


    /* =========================================================
       INDEX
    ========================================================= */

    public function index()
    {
        if (!$this->isAllowed()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $data = $this->skModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view(
            'forum_bandung_sehat_sk/index',
            [
                'title' => 'SK Forum Bandung Sehat',
                'data'  => $data
            ]
        );
    }


    /* =========================================================
       CREATE
    ========================================================= */

    public function create()
    {
        if (!$this->isAllowed()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        return view(
            'forum_bandung_sehat_sk/create',
            [
                'title' => 'Tambah SK Forum Bandung Sehat'
            ]
        );
    }


    /* =========================================================
       STORE
    ========================================================= */

    public function store()
    {
        if (!$this->isAllowed()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $rules = [
            'no_sk' => [
                'label' => 'Nomor Surat Keputusan',
                'rules' => 'required|max_length[255]'
            ],

            'periode' => [
                'label' => 'Periode',
                'rules' => 'required|max_length[100]'
            ],

            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'permit_empty'
            ],

            'file' => [
                'label' => 'Berkas Surat Keputusan',
                'rules' =>
                    'uploaded[file]'
                    . '|max_size[file,10240]'
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
                    implode(
                        '<br>',
                        $this->validator->getErrors()
                    )
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

        $uploadPath =
            WRITEPATH . 'uploads/forum_bandung_sehat_sk/';

        if (!is_dir($uploadPath)) {
            mkdir(
                $uploadPath,
                0777,
                true
            );
        }

        $namaAsli = $file->getClientName();

        $namaFile = $file->getRandomName();

        $file->move(
            $uploadPath,
            $namaFile
        );

        $this->skModel->insert([
            'no_sk' =>
                $this->request->getPost('no_sk'),

            'periode' =>
                $this->request->getPost('periode'),

            'keterangan' =>
                $this->request->getPost('keterangan'),

            'nama_file' =>
                $namaFile,

            'nama_asli' =>
                $namaAsli,

            'file_path' =>
                'uploads/forum_bandung_sehat_sk/'
                . $namaFile,

            'ukuran_file' =>
                $file->getSize(),

            'created_at' =>
                date('Y-m-d H:i:s'),

            'updated_at' =>
                date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to('/forum-bandung-sehat/sk')
            ->with(
                'success',
                'SK Forum Bandung Sehat berhasil ditambahkan.'
            );
    }


    /* =========================================================
       EDIT
    ========================================================= */

    public function edit($id)
    {
        $data = $this->skModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/forum-bandung-sehat/sk')
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        return view(
            'forum_bandung_sehat_sk/edit',
            [
                'title' => 'Edit SK Forum Bandung Sehat',
                'data'  => $data
            ]
        );
    }


    /* =========================================================
       UPDATE
    ========================================================= */

    public function update($id)
    {
        $data = $this->skModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/forum-bandung-sehat/sk')
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        $rules = [
            'no_sk' => [
                'label' => 'Nomor Surat Keputusan',
                'rules' => 'required|max_length[255]'
            ],

            'periode' => [
                'label' => 'Periode',
                'rules' => 'required|max_length[100]'
            ],

            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'permit_empty'
            ],

            'file' => [
                'label' => 'Berkas Surat Keputusan',
                'rules' =>
                    'permit_empty'
                    . '|max_size[file,10240]'
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
                    implode(
                        '<br>',
                        $this->validator->getErrors()
                    )
                );
        }

        $updateData = [
            'no_sk' =>
                $this->request->getPost('no_sk'),

            'periode' =>
                $this->request->getPost('periode'),

            'keterangan' =>
                $this->request->getPost('keterangan'),

            'updated_at' =>
                date('Y-m-d H:i:s')
        ];

        $file = $this->request->getFile('file');

        if (
            $file &&
            $file->isValid() &&
            !$file->hasMoved()
        ) {

            $uploadPath =
                WRITEPATH . 'uploads/forum_bandung_sehat_sk/';

            if (!is_dir($uploadPath)) {
                mkdir(
                    $uploadPath,
                    0777,
                    true
                );
            }

            /*
             * Hapus file lama
             */

            if (!empty($data['file_path'])) {

                $oldFile =
                    WRITEPATH . $data['file_path'];

                if (is_file($oldFile)) {
                    unlink($oldFile);
                }
            }

            $namaAsli =
                $file->getClientName();

            $namaFile =
                $file->getRandomName();

            $file->move(
                $uploadPath,
                $namaFile
            );

            $updateData['nama_file'] =
                $namaFile;

            $updateData['nama_asli'] =
                $namaAsli;

            $updateData['file_path'] =
                'uploads/forum_bandung_sehat_sk/'
                . $namaFile;

            $updateData['ukuran_file'] =
                $file->getSize();
        }

        $this->skModel->update(
            $id,
            $updateData
        );

        return redirect()
            ->to('/forum-bandung-sehat/sk')
            ->with(
                'success',
                'SK Forum Bandung Sehat berhasil diperbarui.'
            );
    }


    /* =========================================================
       VIEW
    ========================================================= */

    public function view($id)
    {
        $data = $this->skModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/forum-bandung-sehat/sk')
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        if (empty($data['file_path'])) {
            return redirect()
                ->to('/forum-bandung-sehat/sk')
                ->with(
                    'error',
                    'Berkas SK tidak tersedia.'
                );
        }

        $filePath =
            WRITEPATH . $data['file_path'];

        if (!is_file($filePath)) {
            return redirect()
                ->to('/forum-bandung-sehat/sk')
                ->with(
                    'error',
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
                    ?? $data['nama_file']
                ) .
                '"'
            )
            ->setBody(
                file_get_contents($filePath)
            );
    }


    /* =========================================================
       DELETE
    ========================================================= */

    public function delete($id)
    {
        $data = $this->skModel->find($id);

        if (!$data) {
            return redirect()
                ->to('/forum-bandung-sehat/sk')
                ->with(
                    'error',
                    'Data SK tidak ditemukan.'
                );
        }

        if (!empty($data['file_path'])) {

            $filePath =
                WRITEPATH . $data['file_path'];

            if (is_file($filePath)) {
                unlink($filePath);
            }
        }

        $this->skModel->delete($id);

        return redirect()
            ->to('/forum-bandung-sehat/sk')
            ->with(
                'success',
                'SK Forum Bandung Sehat berhasil dihapus.'
            );
    }
}