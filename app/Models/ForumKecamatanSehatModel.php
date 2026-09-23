<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumKecamatanSehatModel extends Model
{
    protected $table = 'forum_kecamatan_sehat';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kecamatan_id',
        'nama_forum',
        'tahun',
        'ketua',
        'keterangan'
    ];

    protected $useTimestamps = true;
}