<?php

namespace App\Controllers;

use App\Models\ForumBandungSehatRencanaKerjaModel;

class ForumBandungSehatRencanaKerja extends BaseController
{
    protected $rencanaModel;

    public function __construct()
    {
        $this->rencanaModel =
            new ForumBandungSehatRencanaKerjaModel();
    }


    private function allowedRoles(): bool
    {
        return in_array(
            session()->get('role'),
            ['admin', 'admin_fbs'],
            true
        );
    }


    /*
    |--------------------------------------------------------------------------
    | HALAMAN UTAMA
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        return view(
            'forum_bandung_sehat_rencana_kerja/index',
            [
                'title' => 'Rencana Kerja Forum Bandung Sehat',
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PERIODE GANJIL / GENAP
    |--------------------------------------------------------------------------
    */

    public function periode($periode)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        if (!in_array($periode, ['ganjil', 'genap'], true)) {
            return redirect()
                ->to('/forum-bandung-sehat/rencana-kerja')
                ->with(
                    'error',
                    'Periode tidak valid.'
                );
        }

        $data = $this->rencanaModel
            ->where('periode', $periode)
            ->orderBy('tahun', 'DESC')
            ->orderBy('id', 'DESC')
            ->findAll();

        return view(
            'forum_bandung_sehat_rencana_kerja/periode',
            [
                'title'   => 'Rencana Kerja Forum Bandung Sehat',
                'periode' => $periode,
                'data'    => $data,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | FORM UPLOAD
    |--------------------------------------------------------------------------
    */

    public function create($periode)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        if (!in_array($periode, ['ganjil', 'genap'], true)) {
            return redirect()
                ->to('/forum-bandung-sehat/rencana-kerja')
                ->with(
                    'error',
                    'Periode tidak valid.'
                );
        }

        return view(
            'forum_bandung_sehat_rencana_kerja/create',
            [
                'title'   => 'Upload Rencana Kerja Forum Bandung Sehat',
                'periode' => $periode,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        $periode =
            $this->request->getPost('periode');

        if (!in_array($periode, ['ganjil', 'genap'], true)) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Periode tidak valid.'
                );
        }

        $rules = [
            'tahun' => [
                'label' => 'Tahun',
                'rules' =>
                    'required|integer|greater_than_equal_to[2000]|less_than_equal_to[2100]',
            ],

            'file' => [
                'label' => 'File Rencana Kerja',
                'rules' =>
                    'uploaded[file]|max_size[file,10240]|ext_in[file,pdf,doc,docx,xls,xlsx]',
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

        $file =
            $this->request->getFile('file');

        if (!$file || !$file->isValid()) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'File belum dipilih atau tidak valid.'
                );
        }

        $uploadPath =
            FCPATH .
            'uploads/forum_bandung_sehat/rencana_kerja';

        if (!is_dir($uploadPath)) {
            mkdir(
                $uploadPath,
                0777,
                true
            );
        }

        $namaFile =
            $file->getRandomName();

        $namaAsli =
            $file->getClientName();

        $file->move(
            $uploadPath,
            $namaFile
        );

        $this->rencanaModel->insert([
            'tahun' =>
                $this->request->getPost('tahun'),

            'periode' =>
                $periode,

            'nama_file' =>
                $namaFile,

            'nama_asli' =>
                $namaAsli,

            'file_path' =>
                'uploads/forum_bandung_sehat/rencana_kerja/'
                . $namaFile,

            'ukuran_file' =>
                $file->getSize(),
        ]);

        return redirect()
            ->to(
                '/forum-bandung-sehat/rencana-kerja/'
                . $periode
            )
            ->with(
                'success',
                'File Rencana Kerja berhasil diupload.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | LIHAT FILE
    |--------------------------------------------------------------------------
    */

    public function view($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard');
        }

        $data =
            $this->rencanaModel->find($id);

        if (!$data) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data tidak ditemukan.'
                );
        }

        $path =
            FCPATH .
            $data['file_path'];

        if (!is_file($path)) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'File tidak ditemukan.'
                );
        }

        return $this->response
            ->download(
                $path,
                null
            )
            ->setFileName(
                $data['nama_asli']
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DOWNLOAD
    |--------------------------------------------------------------------------
    */

    public function download($id)
    {
        return $this->view($id);
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard');
        }

        $data =
            $this->rencanaModel->find($id);

        if (!$data) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data tidak ditemukan.'
                );
        }

        $path =
            FCPATH .
            $data['file_path'];

        if (is_file($path)) {
            unlink($path);
        }

        $this->rencanaModel->delete($id);

        return redirect()
            ->back()
            ->with(
                'success',
                'File Rencana Kerja berhasil dihapus.'
            );
    }
}