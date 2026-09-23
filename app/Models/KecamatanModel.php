<?php

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
    protected $table = 'kecamatan';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kode',
        'nama_kecamatan'
    ];

    protected $useTimestamps = false;
}