<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumKecamatanSehatFotoModel extends Model
{
    protected $table = 'forum_kecamatan_sehat_foto';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = [
        'kecamatan_id',
        'nama_file',
        'nama_asli',
        'file_path',
        'ukuran_file',
    ];

    protected $useTimestamps = true;
}