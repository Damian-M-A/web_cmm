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
        $data = ['title'=> 'Añadiendo nueva categoria'];
        return view('cms_cmm/nueva_categoria', $data);
    }
    public function save()
    {
        helper('form');
        $reglas = [
            'nombre' => 'required|is_unique[categorias.nombre]'
        ];
        if(!$this->validate($reglas))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = $this->request->getPost('nombre');
        $this->categoriasModel->insert
        (
          [
            'nombre'=> $data['nombre']
          ]  
        );
        return redirect()->to('admin/categorias');
    }
}