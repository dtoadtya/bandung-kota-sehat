<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumBandungSehatRencanaKerjaModel extends Model
{
    protected $table = 'forum_bandung_sehat_rencana_kerja';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'tahun',
        'data_rencana',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}