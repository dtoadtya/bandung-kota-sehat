<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumBandungSehatFotoModel extends Model
{
    protected $table            = 'forum_bandung_sehat_foto';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'user_id',
        'nama_file',
        'nama_asli',
        'file_path',
        'ukuran_file',
    ];
}