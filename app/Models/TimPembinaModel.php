<?php

namespace App\Models;

use CodeIgniter\Model;

class TimPembinaModel extends Model
{
    protected $table            = 'tim_pembina';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'nama',
        'jabatan',
        'keterangan'
    ];
}