<?php

namespace App\Models;

use CodeIgniter\Model;

class InovasiKecamatanModel extends Model
{
    protected $table = 'inovasi_kecamatan';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'kecamatan_id',
        'nama_inovasi',
        'tahun',
        'deskripsi',
        'tujuan',
        'manfaat',
        'link_data_dukung',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}