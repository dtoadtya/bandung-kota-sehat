<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumKecamatanSehatRealisasiModel extends Model
{
    protected $table = 'forum_kecamatan_sehat_realisasi';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'kecamatan_id',
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