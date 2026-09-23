<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumBandungSehatModel extends Model
{
    protected $table = 'forum_bandung_sehat';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_kegiatan',
        'tahun',
        'tanggal',
        'lokasi',
        'keterangan'
    ];

    protected $useTimestamps = true;
}