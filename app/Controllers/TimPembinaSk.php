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

    /**
     * =========================================================
     * DAFTAR SK
     * =========================================================
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

    /**
     * =========================================================
     * FORM TAMBAH SK
     * =========================================================
     */
    public function create()
    {
        return view('tim_pembina_sk/create');
    }

    /**
     * =========================================================
     * SIMPAN SK BARU
     * =========================================================
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
                'rules' => 'uploaded[file]'
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

        /*
         * Folder upload
         */
        $uploadPath = FCPATH . 'uploads/tim_pembina_sk/';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        /*
         * Nama file
         */
        $namaAsli = $file->getClientName();

        $namaFile = $file->getRandomName();

        /*
         * Upload file
         */
        $file->move(
            $uploadPath,
            $namaFile
        );

        /*
         * Simpan ke database
         */
        $this->timPembinaSkModel->insert([
            'no_sk' => $this->request->getPost('no_sk'),

            'periode' => $this->request->getPost('periode'),

            'keterangan' => $this->request->getPost('keterangan'),

            'nama_file' => $namaFile,

            'nama_asli' => $namaAsli,

            'file_path' => 'uploads/tim_pembina_sk/' . $namaFile,

            'ukuran_file' => $file->getSize(),

            'created_at' => date('Y-m-d H:i:s'),

            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to(base_url('tim-pembina/sk'))
            ->with(
                'success',
                'SK Tim Pembina berhasil ditambahkan.'
            );
    }

    /**
     * =========================================================
     * FORM EDIT SK
     * =========================================================
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

    /**
     * =========================================================
     * UPDATE SK
     * =========================================================
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
                'rules' => 'permit_empty'
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

        /*
         * Data yang akan diperbarui
         */
        $updateData = [

            'no_sk' => $this->request->getPost('no_sk'),

            'periode' => $this->request->getPost('periode'),

            'keterangan' => $this->request->getPost('keterangan'),

            'updated_at' => date('Y-m-d H:i:s')
        ];

        /*
         * Ambil file baru
         */
        $file = $this->request->getFile('file');

        /*
         * Jika user memilih file PDF baru
         */
        if (
            $file &&
            $file->isValid() &&
            !$file->hasMoved()
        ) {

            /*
             * Folder upload
             */
            $uploadPath = FCPATH . 'uploads/tim_pembina_sk/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            /*
             * Nama file baru
             */
            $namaAsli = $file->getClientName();

            $namaFile = $file->getRandomName();

            /*
             * Hapus file lama
             */
            if (!empty($data['file_path'])) {

                $oldFile = FCPATH . $data['file_path'];

                if (is_file($oldFile)) {
                    unlink($oldFile);
                }
            }

            /*
             * Upload file baru
             */
            $file->move(
                $uploadPath,
                $namaFile
            );

            /*
             * Update informasi file
             */
            $updateData['nama_file'] = $namaFile;

            $updateData['nama_asli'] = $namaAsli;

            $updateData['file_path'] =
                'uploads/tim_pembina_sk/' . $namaFile;

            $updateData['ukuran_file'] =
                $file->getSize();
        }

        /*
         * Update database
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

    /**
     * =========================================================
     * LIHAT BERKAS
     * =========================================================
     */
    public function view($id)
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

        if (empty($data['file_path'])) {

            return redirect()
                ->to(base_url('tim-pembina/sk'))
                ->with(
                    'error',
                    'Berkas SK tidak tersedia.'
                );
        }

        $filePath = FCPATH . $data['file_path'];

        if (!is_file($filePath)) {

            return redirect()
                ->to(base_url('tim-pembina/sk'))
                ->with(
                    'error',
                    'File SK tidak ditemukan di server.'
                );
        }

        /*
         * Tampilkan PDF langsung di browser
         */
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

    /**
     * =========================================================
     * HAPUS SK
     * =========================================================
     */
    public function delete($id)
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

        /*
         * Hapus file fisik
         */
        if (!empty($data['file_path'])) {

            $filePath = FCPATH . $data['file_path'];

            if (is_file($filePath)) {
                unlink($filePath);
            }
        }

        /*
         * Hapus data database
         */
        $this->timPembinaSkModel->delete($id);

        return redirect()
            ->to(base_url('tim-pembina/sk'))
            ->with(
                'success',
                'SK Tim Pembina berhasil dihapus.'
            );
    }
}