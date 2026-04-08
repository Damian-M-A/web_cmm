<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoCmmModel extends Model
{
    protected $table            = 'info_cmm';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    // Relación FK: id_tipo -> tipo_info(id)
    protected $allowedFields    = ['id_tipo', 'texto', 'imagen', 'activo'];
}