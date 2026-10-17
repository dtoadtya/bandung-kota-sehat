<?php

namespace App\Models;

use CodeIgniter\Model;

class TimPembinaSkModel extends Model
{
    protected $table = 'tim_pembina_sk';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nomor_sk',
        'periode',
        'keterangan',
        'nama_file',
        'status',
        'keterangan_penolakan',
        'verified_at',
        'verified_by',
    ];

    protected $useTimestamps = true;
}