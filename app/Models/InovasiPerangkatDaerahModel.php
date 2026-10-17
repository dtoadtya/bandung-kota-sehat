<?php

namespace App\Models;

use CodeIgniter\Model;

class InovasiPerangkatDaerahModel extends Model
{
    protected $table            = 'inovasi_perangkat_daerah';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';

    protected $allowedFields = [
        'nama_perangkat_daerah',
        'nama_inovasi',
        'penjelasan',
        'waktu_awal_penerapan',
        'waktu_terakhir_pengembangan',
        'dampak_inovasi',
        'link_data_dukung',
    ];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}