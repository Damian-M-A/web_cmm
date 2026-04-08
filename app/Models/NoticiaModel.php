<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticiaModel extends Model
{
    protected $table            = 'noticias';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    // Relaciones FK: id_categoria -> categorias(id), subido_por -> users(id)
    protected $allowedFields    = [
        'titulo', 
        'id_categoria', 
        'contenido', 
        'imagen', 
        'subido_por', 
        'estado',     // Tipo ENUM
        'activo', 
        'adjunto'
    ];

    // Configuración de Fechas
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modificacion';
}