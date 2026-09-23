<?php

namespace App\Models;

use CodeIgniter\Model;

class PokjaKelurahanSehatSkModel extends Model
{
    protected $table = 'pokja_kelurahan_sehat_sk';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'kelurahan_id',
        'no_sk',
        'periode',
        'keterangan',
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