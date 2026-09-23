<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumBandungSehatRealisasiModel extends Model
{
    protected $table            = 'forum_bandung_sehat_realisasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement  = true;
    protected $returnType       = 'array';

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
    ];

    protected $useTimestamps = true;
}