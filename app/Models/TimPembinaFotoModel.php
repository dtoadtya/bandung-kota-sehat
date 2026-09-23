<?php

namespace App\Models;

use CodeIgniter\Model;

class TimPembinaFotoModel extends Model
{
    protected $table = 'tim_pembina_foto';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'kecamatan_id',
        'nama_file',
        'nama_asli',
        'file_path',
        'ukuran_file',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}