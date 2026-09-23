<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ForumBandungSehatRencanaKerjaModel;

class ForumBandungSehatRencanaKerja extends BaseController
{
    protected $rencanaModel;

    public function __construct()
    {
        $this->rencanaModel =
            new ForumBandungSehatRencanaKerjaModel();
    }

    private function isAdmin(): bool
    {
        return in_array(
            session()->get('role'),
            ['admin','user'],
            true
        );
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $data = $this->rencanaModel
            ->orderBy('tahun', 'DESC')
            ->orderBy('id', 'DESC')
            ->findAll();

        return view(
            'forum_bandung_sehat_rencana_kerja/index',
            [
                'title' => 'Rencana Kerja Forum Bandung Sehat',
                'data'  => $data,
            ]
        );
    }

    public function create()
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        return view(
            'forum_bandung_sehat_rencana_kerja/create',
            [
                'title' => 'Tambah Rencana Kerja',
            ]
        );
    }

    public function store()
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $rules = [
            'tahun' => [
                'rules' => 'required|regex_match[/^\d{4}$/]',
                'errors' => [
                    'required' =>
                        'Tahun wajib diisi.',
                    'regex_match' =>
                        'Tahun harus berupa 4 angka, contoh 2026.',
                ],
            ],

            'data_rencana' => [
                'rules' => 'required',
                'errors' => [
                    'required' =>
                        'Rencana kerja wajib diisi.',
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

        $tahun = trim(
            (string) $this->request->getPost('tahun')
        );

        $dataRencana = trim(
            (string) $this->request->getPost('data_rencana')
        );

        $existing = $this->rencanaModel
            ->where('tahun', $tahun)
            ->first();

        $data = [
            'tahun'       => $tahun,
            'data_rencana' => $dataRencana,
        ];

        if ($existing) {
            $this->rencanaModel->update(
                $existing['id'],
                $data
            );

            $message = 'Rencana kerja tahun tersebut berhasil diperbarui.';
        } else {
            $this->rencanaModel->insert($data);

            $message = 'Rencana kerja berhasil ditambahkan.';
        }

        return redirect()
            ->to('/forum-bandung-sehat/rencana-kerja')
            ->with(
                'success',
                $message
            );
    }

    public function edit($id)
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $data = $this->rencanaModel->find((int) $id);

        if (!$data) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data rencana kerja tidak ditemukan.'
                );
        }

        return view(
            'forum_bandung_sehat_rencana_kerja/edit',
            [
                'title' => 'Edit Rencana Kerja',
                'data'  => $data,
            ]
        );
    }

    public function update($id)
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $dataLama = $this->rencanaModel->find((int) $id);

        if (!$dataLama) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data tidak ditemukan.'
                );
        }

        $rules = [
            'tahun' => [
                'rules' => 'required|regex_match[/^\d{4}$/]',
                'errors' => [
                    'required' =>
                        'Tahun wajib diisi.',
                    'regex_match' =>
                        'Tahun harus berupa 4 angka.',
                ],
            ],

            'data_rencana' => [
                'rules' => 'required',
                'errors' => [
                    'required' =>
                        'Rencana kerja wajib diisi.',
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

        $tahun = trim(
            (string) $this->request->getPost('tahun')
        );

        $dataRencana = trim(
            (string) $this->request->getPost('data_rencana')
        );

        $duplikat = $this->rencanaModel
            ->where('tahun', $tahun)
            ->where('id !=', (int) $id)
            ->first();

        if ($duplikat) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Rencana kerja untuk tahun tersebut sudah tersedia.'
                );
        }

        $this->rencanaModel->update(
            (int) $id,
            [
                'tahun'       => $tahun,
                'data_rencana' => $dataRencana,
            ]
        );

        return redirect()
            ->to('/forum-bandung-sehat/rencana-kerja')
            ->with(
                'success',
                'Rencana kerja berhasil diperbarui.'
            );
    }

    public function delete($id)
    {
        if (!$this->isAdmin()) {
            return redirect()
                ->to('/dashboard')
                ->with(
                    'error',
                    'Anda tidak memiliki akses.'
                );
        }

        $data = $this->rencanaModel->find((int) $id);

        if (!$data) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data tidak ditemukan.'
                );
        }

        $this->rencanaModel->delete((int) $id);

        return redirect()
            ->to('/forum-bandung-sehat/rencana-kerja')
            ->with(
                'success',
                'Rencana kerja berhasil dihapus.'
            );
    }
}