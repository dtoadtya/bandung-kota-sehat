<?php

namespace App\Controllers;

use App\Models\TimPembinaRencanaKerjaModel;

class TimPembinaRencanaKerja extends BaseController
{
    protected $rencanaModel;

    public function __construct()
    {
        $this->rencanaModel =
            new TimPembinaRencanaKerjaModel();
    }

    /**
     * Cek role.
     */
    private function allowedRoles(): bool
    {
        return in_array(
            session()->get('role'),
            ['user', 'admin'],
            true
        );
    }

    /**
     * Halaman pilihan Tahun Ganjil / Tahun Genap.
     */
    public function index()
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        return view(
            'tim_pembina_rencana_kerja/index',
            [
                'title' =>
                    'Rencana Kerja Tim Pembina',
            ]
        );
    }

    /**
     * Halaman Rencana Kerja berdasarkan periode.
     */
    public function periode($periode)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        if (
            !in_array(
                $periode,
                ['ganjil', 'genap'],
                true
            )
        ) {
            return redirect()
                ->to('/tim-pembina/rencana-kerja')
                ->with(
                    'error',
                    'Periode tidak valid.'
                );
        }

        $namaPeriode =
            $periode === 'ganjil'
                ? 'Tahun Ganjil'
                : 'Tahun Genap';

        $rencana = $this->rencanaModel
            ->where(
                'periode',
                $periode
            )
            ->orderBy(
                'tahun',
                'DESC'
            )
            ->orderBy(
                'id',
                'DESC'
            )
            ->findAll();

        return view(
            'tim_pembina_rencana_kerja/periode',
            [
                'title' =>
                    'Rencana Kerja Tim Pembina - '
                    . $namaPeriode,

                'periode' =>
                    $periode,

                'namaPeriode' =>
                    $namaPeriode,

                'rencana' =>
                    $rencana,
            ]
        );
    }

    /**
     * Form tambah file.
     */
    public function create($periode)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        if (
            !in_array(
                $periode,
                ['ganjil', 'genap'],
                true
            )
        ) {
            return redirect()
                ->to('/tim-pembina/rencana-kerja')
                ->with(
                    'error',
                    'Periode tidak valid.'
                );
        }

        $namaPeriode =
            $periode === 'ganjil'
                ? 'Tahun Ganjil'
                : 'Tahun Genap';

        return view(
            'tim_pembina_rencana_kerja/create',
            [
                'title' =>
                    'Tambah Rencana Kerja - '
                    . $namaPeriode,

                'periode' =>
                    $periode,

                'namaPeriode' =>
                    $namaPeriode,
            ]
        );
    }

    /**
     * Simpan file.
     */
    public function store()
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $periode =
            $this->request->getPost(
                'periode'
            );

        if (
            !in_array(
                $periode,
                ['ganjil', 'genap'],
                true
            )
        ) {
            return redirect()
                ->to('/tim-pembina/rencana-kerja')
                ->with(
                    'error',
                    'Periode tidak valid.'
                );
        }

        $rules = [
            'tahun' => [
                'label' =>
                    'Tahun',

                'rules' =>
                    'required|max_length[20]',

                'errors' => [
                    'required' =>
                        'Tahun wajib diisi.',

                    'max_length' =>
                        'Tahun maksimal 20 karakter.',
                ],
            ],

            'file' => [
                'label' =>
                    'File Rencana Kerja',

                'rules' =>
                    'uploaded[file]'
                    . '|max_size[file,10240]'
                    . '|ext_in[file,pdf,doc,docx,xls,xlsx]',

                'errors' => [
                    'uploaded' =>
                        'File Rencana Kerja wajib diupload.',

                    'max_size' =>
                        'Ukuran file maksimal 10 MB.',

                    'ext_in' =>
                        'File harus PDF, DOC, DOCX, XLS, atau XLSX.',
                ],
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

        if (
            !$file
            || !$file->isValid()
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'File tidak valid.'
                );
        }

        /*
         * Folder upload.
         */
        $uploadPath =
            FCPATH
            . 'uploads/tim_pembina/rencana_kerja/';

        if (!is_dir($uploadPath)) {
            mkdir(
                $uploadPath,
                0777,
                true
            );
        }

        /*
         * Nama file random.
         */
        $namaFile =
            $file->getRandomName();

        /*
         * Pindahkan file.
         */
        $file->move(
            $uploadPath,
            $namaFile
        );

        /*
         * Simpan database.
         */
        $this->rencanaModel->insert([
            'periode' =>
                $periode,

            'tahun' =>
                $this->request->getPost(
                    'tahun'
                ),

            'nama_file' =>
                $namaFile,

            'nama_asli' =>
                $file->getClientName(),

            'file_path' =>
                'uploads/tim_pembina/rencana_kerja/'
                . $namaFile,

            'ukuran_file' =>
                $file->getSize(),
        ]);

        return redirect()
            ->to(
                '/tim-pembina/rencana-kerja/'
                . $periode
            )
            ->with(
                'success',
                'Rencana Kerja berhasil diupload.'
            );
    }

    /**
     * Lihat / download file.
     */
    public function view($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard');
        }

        $rencana =
            $this->rencanaModel->find($id);

        if (!$rencana) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data Rencana Kerja tidak ditemukan.'
                );
        }

        $path =
            FCPATH
            . $rencana['file_path'];

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
                $rencana['nama_asli']
            );
    }

    /**
     * Download file.
     */
    public function download($id)
    {
        return $this->view($id);
    }

    /**
     * Hapus file.
     */
    public function delete($id)
    {
        if (!$this->allowedRoles()) {
            return redirect()
                ->to('/dashboard');
        }

        $rencana =
            $this->rencanaModel->find($id);

        if (!$rencana) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data tidak ditemukan.'
                );
        }

        $path =
            FCPATH
            . $rencana['file_path'];

        if (is_file($path)) {
            unlink($path);
        }

        $this->rencanaModel->delete($id);

        $periode =
            $rencana['periode'] ?? 'ganjil';

        return redirect()
            ->to(
                '/tim-pembina/rencana-kerja/'
                . $periode
            )
            ->with(
                'success',
                'Rencana Kerja berhasil dihapus.'
            );
    }
}