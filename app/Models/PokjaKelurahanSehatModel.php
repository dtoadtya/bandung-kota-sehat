<?php

namespace App\Models;

use CodeIgniter\Model;

class PokjaKelurahanSehatModel extends Model
{
    protected $table = 'pokja_kelurahan_sehat';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'kelurahan_id',
        'nama_pokja',
        'tahun',
        'ketua',
        'keterangan'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}