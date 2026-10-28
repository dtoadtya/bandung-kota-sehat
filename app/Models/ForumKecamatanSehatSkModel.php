<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumKecamatanSehatSkModel extends Model
{
    protected $table = 'forum_kecamatan_sk';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'user_id',
        'kecamatan_id',
        'no_sk',
        'periode',
        'keterangan',
        'nama_file',
        'nama_asli',
        'file_path',
        'ukuran_file',
        'status',
        'keterangan_penolakan',
        'verified_at',
        'verified_by',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}