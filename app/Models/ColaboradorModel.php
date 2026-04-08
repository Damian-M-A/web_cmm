<?php

namespace App\Models;

use CodeIgniter\Model;

class ColaboradorModel extends Model
{
    protected $table            = 'colaboradores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    // Relaciones FK: id_cargo -> cargos(id), id_equipo -> equipos(id)
    protected $allowedFields    = [
        'nombre', 
        'profesion', 
        'id_cargo', 
        'imagen', 
        'activo', 
        'id_equipo', 
        'descripcion'
    ];
}