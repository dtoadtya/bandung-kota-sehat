<?php

namespace App\Models;

use CodeIgniter\Model;

class TimPembinaRealisasiModel extends Model
{
    protected $table = 'tim_pembina_realisasi';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'tahun',
        'nama_kegiatan',
        'waktu_kegiatan',
        'peserta',
        'hasil_pelaksanaan',
        'anggaran',
        'sumber_pendanaan',
        'link_drive',
        'data_dukung',
        'data_rencana',
        'tanggal',
        'lokasi',
        'keterangan',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}