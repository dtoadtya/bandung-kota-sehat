<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumBandungSehatRencanaKerjaModel extends Model
{
    protected $table = 'forum_bandung_sehat_rencana_kerja';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'user_id',
        'tahun',
        'periode',
        'nama_file',
        'nama_asli',
        'file_path',
        'ukuran_file',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}