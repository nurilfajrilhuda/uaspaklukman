<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jurusan';
    protected $primaryKey       = 'kd_jurusan';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['kd_jurusan', 'nama_jurusan', 'harga_umum', 'harga_pelajar', 'keberangkatan'];
}
