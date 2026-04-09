<?php
namespace App\Controllers;

use App\Models\CategoriaModel;

class AdminCategoriasController extends BaseController
{
    protected $categoriasModel;
    public function __construct()
    {
        $this->categoriasModel = new CategoriaModel();
    }
    public function index()
    {
        $categorias = $this->categoriasModel->findAll();
        $data = ['title'=> 'Administrar categorias', 'categorias' => $categorias];
        return view('cms_cmm/admin_categorias', $data);
    }
    public function new()
    {
        return view('cms_cmm/nueva_categoria');
    }
}